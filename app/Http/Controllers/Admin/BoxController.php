<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBoxRequest;
use App\Http\Requests\StoreBoxRequest;
use App\Http\Requests\UpdateBoxRequest;
use App\Models\Box;
use App\Models\BoxNote;
use App\Models\Cable;
use App\Models\Cb;
use App\Models\Fouse;
use App\Models\Minibller;
use App\Models\Transeformer;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BoxController extends Controller
{
    use MediaUploadingTrait;
  public function index()
    {
        abort_if(Gate::denies('box_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boxes = Box::with(['transformer', 'transformer_cb', 'minibller_no', 'fouse', 'box_notes', 'cable', 'media'])->get();

        $transeformers = Transeformer::get();

        $cbs = Cb::get();

        $minibllers = Minibller::get();

        $fouses = Fouse::get();

        $box_notes = BoxNote::get();

        $cables = Cable::get();

        return view('admin.boxes.index', compact('box_notes', 'boxes', 'cables', 'cbs', 'fouses', 'minibllers', 'transeformers'));
    }
        public function ct($id)
    {
        abort_if(Gate::denies('box_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transformers  = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transformer_cbs = Cb::find($id);

        $minibller_nos = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        // $fouses = Fouse::find($id);

        $box_notes = BoxNote::pluck('box_note', 'id');

        $cables = Cable::pluck('cable_size', 'id')->prepend(trans('global.pleaseSelect'), '');
        // dd($fouses);
        $transformer_id = $transformer_cbs->transformer_id;
        $trans_cb_fider_number = $transformer_cbs->trans_cb_fider_number;
        // dd($fouses);
        $t_no = Transeformer::where('id' ,$transformer_id)->first();
        // $cb_number_id = $fouses->transformer_cb_id;
        // $cb_number_id = Cb::where('id' ,$cb_number_id)->first();
        // $minibller_number = $fouses->minibiler_id;
        // $minibller_number = Minibller::where('id' ,$minibller_number)->first();
        // dd($minibller_number);
        // $minibller_id = $fouses->minibiler_id;

        return view('admin.boxes.ct', compact('transformer_cbs','trans_cb_fider_number','t_no', 'box_notes', 'cables', 'transformers'));
    }

    public function add($id)
    {
        abort_if(Gate::denies('box_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transformers  = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transformer_cbs = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $minibller_nos = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fouses = Fouse::find($id);

        $box_notes = BoxNote::pluck('box_note', 'id');

        $cables = Cable::pluck('cable_size', 'id')->prepend(trans('global.pleaseSelect'), '');
        // dd($fouses);
        $transformer_id = $fouses->transformer_id;
        // dd($fouses);
        $t_no = Transeformer::where('id' ,$transformer_id)->first();
        $cb_number_id = $fouses->transformer_cb_id;
        $cb_number_id = Cb::where('id' ,$cb_number_id)->first();
        $minibller_number = $fouses->minibiler_id;
        $minibller_number = Minibller::where('id' ,$minibller_number)->first();
        // dd($minibller_number);
        $minibller_id = $fouses->minibiler_id;

        return view('admin.boxes.add', compact('minibller_id','minibller_number','cb_number_id','t_no', 'box_notes', 'cables', 'fouses','transformers', 'transformer_cbs'));
    }
    public function loop($id)
    {
        abort_if(Gate::denies('box_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transformers  = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transformer_cbs = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $minibller_nos = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $box = Box::find($id);

        $box_notes = BoxNote::pluck('box_note', 'id');

        $cables = Cable::pluck('cable_size', 'id')->prepend(trans('global.pleaseSelect'), '');
        // dd($box);
        $transformer_id = $box->transformer_id;
        // dd($fouses);
        $t_no = Transeformer::where('id' ,$transformer_id)->first();
        $cb_number_id = $box->transformer_cb_id;
        $cb_number_id = Cb::where('id' ,$cb_number_id)->first();
        $fouse_id = $box->fouse_id;
        $fouse_id = Fouse::where('id' ,$fouse_id)->first();
        $minibller_number = $box->minibller_no_id;
        $minibller_number = Minibller::where('id' ,$minibller_number)->first();
        // dd($minibller_number);
        $minibller_id = $box->minibller_no_id;

        return view('admin.boxes.loop', compact('fouse_id','minibller_id','minibller_number','cb_number_id','t_no', 'box_notes', 'cables', 'box','transformers', 'transformer_cbs'));
    }
    public function create()
    {
        abort_if(Gate::denies('box_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transformers = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transformer_cbs = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $minibller_nos = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fouses = Fouse::pluck('fouse_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $box_notes = BoxNote::pluck('box_note', 'id');

        $cables = Cable::pluck('cable_size', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.boxes.create', compact('box_notes', 'cables', 'fouses', 'minibller_nos', 'transformers', 'transformer_cbs'));
    }

    public function store(StoreBoxRequest $request)
    {
        $box = Box::create($request->all());
        $box->box_notes()->sync($request->input('box_notes', []));
        foreach ($request->input('box_photo', []) as $file) {
            $box->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('box_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $box->id]);
        }

        return redirect()->route('admin.boxes.index');
    }

    public function edit(Box $box)
    {
        abort_if(Gate::denies('box_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transformers = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transformer_cbs = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $minibller_nos = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fouses = Fouse::pluck('fouse_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $box_notes = BoxNote::pluck('box_note', 'id');

        $cables = Cable::pluck('cable_size', 'id')->prepend(trans('global.pleaseSelect'), '');

        $box->load('transformer', 'transformer_cb', 'minibller_no', 'fouse', 'box_notes', 'cable');

        return view('admin.boxes.edit', compact('box', 'box_notes', 'cables', 'fouses', 'minibller_nos', 'transformer_cbs', 'transformers'));
    }

    public function update(UpdateBoxRequest $request, Box $box)
    {
        $box->update($request->all());
        $box->box_notes()->sync($request->input('box_notes', []));
        if (count($box->box_photo) > 0) {
            foreach ($box->box_photo as $media) {
                if (! in_array($media->file_name, $request->input('box_photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $box->box_photo->pluck('file_name')->toArray();
        foreach ($request->input('box_photo', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $box->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('box_photo');
            }
        }

        return redirect()->route('admin.boxes.index');
    }
  public function show(Box $box)
    {
        abort_if(Gate::denies('box_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $box->load('transformer', 'transformer_cb', 'minibller_no', 'fouse', 'box_notes', 'cable');

        return view('admin.boxes.show', compact('box'));
    }

    public function destroy(Box $box)
    {
        abort_if(Gate::denies('box_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $box->delete();

        return back();
    }

    public function massDestroy(MassDestroyBoxRequest $request)
    {
        $boxes = Box::find(request('ids'));

        foreach ($boxes as $box) {
            $box->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('box_create') && Gate::denies('box_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Box();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}