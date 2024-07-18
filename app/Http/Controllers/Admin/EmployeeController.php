<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Car;
use App\Models\Employee;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('employee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Employee::with(['car', 'en_flow', 'supervisor'])->select(sprintf('%s.*', (new Employee)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'employee_show';
                $editGate      = 'employee_edit';
                $deleteGate    = 'employee_delete';
                $crudRoutePart = 'employees';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('emp_name', function ($row) {
                return $row->emp_name ? $row->emp_name : '';
            });
            $table->editColumn('branch', function ($row) {
                return $row->branch ? Employee::BRANCH_SELECT[$row->branch] : '';
            });
            $table->editColumn('nationlaty', function ($row) {
                return $row->nationlaty ? $row->nationlaty : '';
            });
            $table->editColumn('emp', function ($row) {
                return $row->emp ? $row->emp : '';
            });

            $table->addColumn('car_car_number', function ($row) {
                return $row->car ? $row->car->car_number : '';
            });

            $table->editColumn('id_photo', function ($row) {
                if (! $row->id_photo) {
                    return '';
                }
                $links = [];
                foreach ($row->id_photo as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('occupation', function ($row) {
                return $row->occupation ? $row->occupation : '';
            });
            $table->editColumn('occupation_agree', function ($row) {
                return $row->occupation_agree ? Employee::OCCUPATION_AGREE_SELECT[$row->occupation_agree] : '';
            });
            $table->editColumn('occupation_insite', function ($row) {
                return $row->occupation_insite ? $row->occupation_insite : '';
            });
            $table->editColumn('persion_pic', function ($row) {
                if ($photo = $row->persion_pic) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->addColumn('en_flow_emp_name', function ($row) {
                return $row->en_flow ? $row->en_flow->emp_name : '';
            });

            $table->addColumn('supervisor_emp_name', function ($row) {
                return $row->supervisor ? $row->supervisor->emp_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'car', 'id_photo', 'persion_pic', 'en_flow', 'supervisor']);

            return $table->make(true);
        }

        $cars      = Car::get();
        $employees = Employee::get();

        return view('admin.employees.index', compact('cars', 'employees'));
    }

    public function create()
    {
        abort_if(Gate::denies('employee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cars = Car::pluck('car_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $en_flows = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $supervisors = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.employees.create', compact('cars', 'en_flows', 'supervisors'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->all());

        foreach ($request->input('id_photo', []) as $file) {
            $employee->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('id_photo');
        }

        if ($request->input('persion_pic', false)) {
            $employee->addMedia(storage_path('tmp/uploads/' . basename($request->input('persion_pic'))))->toMediaCollection('persion_pic');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $employee->id]);
        }

        return redirect()->route('admin.employees.index');
    }

    public function edit(Employee $employee)
    {
        abort_if(Gate::denies('employee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cars = Car::pluck('car_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $en_flows = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $supervisors = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employee->load('car', 'en_flow', 'supervisor');

        return view('admin.employees.edit', compact('cars', 'employee', 'en_flows', 'supervisors'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        if (count($employee->id_photo) > 0) {
            foreach ($employee->id_photo as $media) {
                if (! in_array($media->file_name, $request->input('id_photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $employee->id_photo->pluck('file_name')->toArray();
        foreach ($request->input('id_photo', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $employee->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('id_photo');
            }
        }

        if ($request->input('persion_pic', false)) {
            if (! $employee->persion_pic || $request->input('persion_pic') !== $employee->persion_pic->file_name) {
                if ($employee->persion_pic) {
                    $employee->persion_pic->delete();
                }
                $employee->addMedia(storage_path('tmp/uploads/' . basename($request->input('persion_pic'))))->toMediaCollection('persion_pic');
            }
        } elseif ($employee->persion_pic) {
            $employee->persion_pic->delete();
        }

        return redirect()->route('admin.employees.index');
    }

    public function show(Employee $employee)
    {
        abort_if(Gate::denies('employee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->load('car', 'en_flow', 'supervisor', 'employeeNameCustodies', 'employeeNameCertificates', 'driverCars', 'enFlowEmployees', 'supervisorEmployees', 'lastDriverCarMoves');

        return view('admin.employees.show', compact('employee'));
    }

    public function destroy(Employee $employee)
    {
        abort_if(Gate::denies('employee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployeeRequest $request)
    {
        $employees = Employee::find(request('ids'));

        foreach ($employees as $employee) {
            $employee->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('employee_create') && Gate::denies('employee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Employee();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
