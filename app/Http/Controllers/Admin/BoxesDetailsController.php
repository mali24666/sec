<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBoxesDetailRequest;
use App\Http\Requests\StoreBoxesDetailRequest;
use App\Http\Requests\UpdateBoxesDetailRequest;
use App\Models\BoxesDetail;
use App\Models\Box;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;

class BoxesDetailsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('boxes_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boxesDetails = BoxesDetail::with(['media'])->get();

        return view('admin.boxesDetails.index', compact('boxesDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('boxes_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.boxesDetails.create');
    }
    public function details($box_number)
    {
        abort_if(Gate::denies('boxes_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       if ($box_number == 0) {
        $boxesDetails = BoxesDetail::with(['media'])->get();

        return view('admin.boxesDetails.index', compact('boxesDetails'));
       }
        if (DB::table('boxes_details')->where('subscription_number', $box_number)->exists()) {
            $boxesDetail = BoxesDetail::where('subscription_number' ,  $box_number)->firstOrFail();

            return view('admin.boxesDetails.show', compact('boxesDetail'));

        }
        // $stations = Station::find($id);

        return view('admin.boxesDetails.add', compact('box_number'));
    }

    public function store(StoreBoxesDetailRequest $request)
    {
        $boxesDetail = BoxesDetail::create($request->all());

        foreach ($request->input('outside_pic', []) as $file) {
            $boxesDetail->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('outside_pic');
        }

        foreach ($request->input('inside_pic', []) as $file) {
            $boxesDetail->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('inside_pic');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $boxesDetail->id]);
        }

        return redirect()->route('admin.boxes-details.index');
    }

    public function edit(BoxesDetail $boxesDetail)
    {
        abort_if(Gate::denies('boxes_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.boxesDetails.edit', compact('boxesDetail'));
    }

    public function update(UpdateBoxesDetailRequest $request, BoxesDetail $boxesDetail)
    {
        $boxesDetail->update($request->all());

        if (count($boxesDetail->outside_pic) > 0) {
            foreach ($boxesDetail->outside_pic as $media) {
                if (! in_array($media->file_name, $request->input('outside_pic', []))) {
                    $media->delete();
                }
            }
        }
        $media = $boxesDetail->outside_pic->pluck('file_name')->toArray();
        foreach ($request->input('outside_pic', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $boxesDetail->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('outside_pic');
            }
        }

        if (count($boxesDetail->inside_pic) > 0) {
            foreach ($boxesDetail->inside_pic as $media) {
                if (! in_array($media->file_name, $request->input('inside_pic', []))) {
                    $media->delete();
                }
            }
        }
        $media = $boxesDetail->inside_pic->pluck('file_name')->toArray();
        foreach ($request->input('inside_pic', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $boxesDetail->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('inside_pic');
            }
        }

        return redirect()->route('admin.boxes-details.index');
    }

    public function show(BoxesDetail $boxesDetail)
    {
        abort_if(Gate::denies('boxes_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.boxesDetails.show', compact('boxesDetail'));
    }

    public function destroy(BoxesDetail $boxesDetail)
    {
        abort_if(Gate::denies('boxes_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boxesDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyBoxesDetailRequest $request)
    {
        $boxesDetails = BoxesDetail::find(request('ids'));

        foreach ($boxesDetails as $boxesDetail) {
            $boxesDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('boxes_detail_create') && Gate::denies('boxes_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BoxesDetail();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}