<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCbRequest;
use App\Http\Requests\StoreCbRequest;
use App\Http\Requests\UpdateCbRequest;
use App\Models\Cb;
use App\Models\Minibller;
use App\Models\Transeformer;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;


class CbController extends Controller
{
        use MediaUploadingTrait;

      public function index()
    {
        abort_if(Gate::denies('cb_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cbs = Cb::with(['transformer', 'minbilars', 'media'])->get();

        $transeformers = Transeformer::get();

        $minibllers = Minibller::get();

        return view('admin.cbs.index', compact('cbs', 'minibllers', 'transeformers'));
    }

        public function fetchCb($id)
    {
        abort_if(Gate::denies('cb_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cbs = Cb::where('transformer_id' ,$id )->with(['transformer', 'minbilars', 'media'])->get();


        $transeformers = Transeformer::get();

        $minibllers = Minibller::get();

        return view('admin.cbs.index', compact('cbs', 'minibllers', 'transeformers'));
    }
    public function create()
    {
        abort_if(Gate::denies('cb_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transes = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $minbilars = Minibller::pluck('minibller_number', 'id');
        $transformers = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cbs.create', compact('minbilars', 'transformers'));
    }
        public function add($id)
    {
        abort_if(Gate::denies('cb_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $transes = Transeformer::find($id);
// dd($transes);
        $transformers = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $minbilars = Minibller::pluck('minibller_number', 'id');

        return view('admin.cbs.add', compact('minbilars','transformers', 'transes'));
    }
    public function store(StoreCbRequest $request)
    {
        $cb = Cb::create($request->all());
        $cb->minbilars()->sync($request->input('minbilars', []));
        foreach ($request->input('temperature_picture', []) as $file) {
            $cb->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('temperature_picture');
        }

        foreach ($request->input('refrence_pic', []) as $file) {
            $cb->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('refrence_pic');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $cb->id]);
        }
        $id  = $cb ->transformer_id ; 

        return redirect()->route('admin.cbs.fetchCb', compact('id'));
    }
    public function save(StoreCbRequest $request)
    {
        // dd($request);
        $cb = Cb::create($request->all());
        $cb->minbilars()->sync($request->input('minbilars', []));
        foreach ($request->input('temperature_picture', []) as $file) {
            $cb->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('temperature_picture');
        }

        foreach ($request->input('refrence_pic', []) as $file) {
            $cb->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('refrence_pic');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $cb->id]);
        }
        $id  = $cb ->transformer_id ; 

        return redirect()->route('admin.cbs.add', compact('id'));
    }

    public function edit(Cb $cb)
    {
        abort_if(Gate::denies('cb_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transformers = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $minbilars = Minibller::pluck('minibller_number', 'id');

        $cb->load('transformer', 'minbilars');

        return view('admin.cbs.edit', compact('cb', 'minbilars', 'transformers'));
    }

    public function update(UpdateCbRequest $request, Cb $cb)
    {
        $cb->update($request->all());
        $cb->minbilars()->sync($request->input('minbilars', []));
        if (count($cb->temperature_picture) > 0) {
            foreach ($cb->temperature_picture as $media) {
                if (! in_array($media->file_name, $request->input('temperature_picture', []))) {
                    $media->delete();
                }
            }
        }
        $media = $cb->temperature_picture->pluck('file_name')->toArray();
        foreach ($request->input('temperature_picture', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $cb->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('temperature_picture');
            }
        }

        if (count($cb->refrence_pic) > 0) {
            foreach ($cb->refrence_pic as $media) {
                if (! in_array($media->file_name, $request->input('refrence_pic', []))) {
                    $media->delete();
                }
            }
        }
        $media = $cb->refrence_pic->pluck('file_name')->toArray();
        foreach ($request->input('refrence_pic', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $cb->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('refrence_pic');
            }
        }

        return redirect()->route('admin.cbs.index');
    }

    public function show(Cb $cb)
    {
        abort_if(Gate::denies('cb_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cb->load('transformer', 'minbilars');

        return view('admin.cbs.show', compact('cb'));
    }

    public function destroy(Cb $cb)
    {
        abort_if(Gate::denies('cb_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cb->delete();

        return back();
    }

    public function massDestroy(MassDestroyCbRequest $request)
    {
        $cbs = Cb::find(request('ids'));

        foreach ($cbs as $cb) {
            $cb->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('cb_create') && Gate::denies('cb_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Cb();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}