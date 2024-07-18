<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCertificateRequest;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Employee;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CertificateController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('certificate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificates = Certificate::with(['employee_name', 'course_name', 'media'])->get();

        $employees = Employee::get();

        $courses = Course::get();

        return view('admin.certificates.index', compact('certificates', 'courses', 'employees'));
    }

    public function create()
    {
        abort_if(Gate::denies('certificate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $course_names = Course::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.certificates.create', compact('course_names', 'employee_names'));
    }

    public function store(StoreCertificateRequest $request)
    {
        $certificate = Certificate::create($request->all());

        foreach ($request->input('file', []) as $file) {
            $certificate->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
        }

        foreach ($request->input('photo', []) as $file) {
            $certificate->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $certificate->id]);
        }

        return redirect()->route('admin.certificates.index');
    }

    public function edit(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employee_names = Employee::pluck('emp_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $course_names = Course::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $certificate->load('employee_name', 'course_name');

        return view('admin.certificates.edit', compact('certificate', 'course_names', 'employee_names'));
    }

    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        $certificate->update($request->all());

        if (count($certificate->file) > 0) {
            foreach ($certificate->file as $media) {
                if (! in_array($media->file_name, $request->input('file', []))) {
                    $media->delete();
                }
            }
        }
        $media = $certificate->file->pluck('file_name')->toArray();
        foreach ($request->input('file', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $certificate->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
            }
        }

        if (count($certificate->photo) > 0) {
            foreach ($certificate->photo as $media) {
                if (! in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $certificate->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $certificate->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return redirect()->route('admin.certificates.index');
    }

    public function show(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificate->load('employee_name', 'course_name');

        return view('admin.certificates.show', compact('certificate'));
    }

    public function destroy(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificate->delete();

        return back();
    }

    public function massDestroy(MassDestroyCertificateRequest $request)
    {
        $certificates = Certificate::find(request('ids'));

        foreach ($certificates as $certificate) {
            $certificate->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('certificate_create') && Gate::denies('certificate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Certificate();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
