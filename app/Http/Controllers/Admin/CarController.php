<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCarRequest;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\Employee;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CarController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('car_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cars = Car::with(['driver', 'media'])->get();

        $employees = Employee::get();

        return view('admin.cars.index', compact('cars', 'employees'));
    }

    public function create()
    {
        abort_if(Gate::denies('car_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cars.create', compact('drivers'));
    }

    public function store(StoreCarRequest $request)
    {
        $car = Car::create($request->all());

        if ($request->input('estmara', false)) {
            $car->addMedia(storage_path('tmp/uploads/' . basename($request->input('estmara'))))->toMediaCollection('estmara');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $car->id]);
        }

        return redirect()->route('admin.cars.index');
    }

    public function edit(Car $car)
    {
        abort_if(Gate::denies('car_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drivers = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $car->load('driver');

        return view('admin.cars.edit', compact('car', 'drivers'));
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->all());

        if ($request->input('estmara', false)) {
            if (! $car->estmara || $request->input('estmara') !== $car->estmara->file_name) {
                if ($car->estmara) {
                    $car->estmara->delete();
                }
                $car->addMedia(storage_path('tmp/uploads/' . basename($request->input('estmara'))))->toMediaCollection('estmara');
            }
        } elseif ($car->estmara) {
            $car->estmara->delete();
        }

        return redirect()->route('admin.cars.index');
    }

    public function show(Car $car)
    {
        abort_if(Gate::denies('car_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car->load('driver', 'carEmployees', 'carNumberRepairs', 'carNoCarMoves');

        return view('admin.cars.show', compact('car'));
    }

    public function destroy(Car $car)
    {
        abort_if(Gate::denies('car_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarRequest $request)
    {
        $cars = Car::find(request('ids'));

        foreach ($cars as $car) {
            $car->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('car_create') && Gate::denies('car_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Car();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
