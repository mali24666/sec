<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMinibllerRequest;
use App\Http\Requests\StoreMinibllerRequest;
use App\Http\Requests\UpdateMinibllerRequest;
use App\Models\Cable;
use App\Models\Cb;
use App\Models\Minibllarnote;
use App\Models\Minibller;
use App\Models\Transeformer;
use App\Models\City;

use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class MinibllerController extends Controller
{
    use MediaUploadingTrait;
 public function index()
    {
        abort_if(Gate::denies('minibller_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $minibllers = Minibller::with(['transformer', 'cb', 'cable_size', 'minibllar_notes', 'area_name', 'media'])->get();

        $transeformers = Transeformer::get();

        $cbs = Cb::get();

        $cables = Cable::get();

        $minibllarnotes = Minibllarnote::get();

        $cities = City::get();

        return view('admin.minibllers.index', compact('cables', 'cbs', 'cities', 'minibllarnotes', 'minibllers', 'transeformers'));
    }

        public function add($id )
    {
        abort_if(Gate::denies('minibller_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $transformers = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');
        $cbs = Cb::find($id);
        $transformers_no=  $cbs->transformer_id;
        $transformers_no = DB::table('transeformers') 
        ->where('id', $transformers_no)
        ->first();
        $minibllar_notes = Minibllarnote::pluck('notes', 'id');
        $cable_sizes = Cable::pluck('cable_size', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.minibllers.add', compact('transformers_no','cable_sizes', 'cbs', 'minibllar_notes', 'transformers'));
    }
        public function addloop($id )
    {
        
        abort_if(Gate::denies('minibller_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $transformers = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');
        $Minibller = Minibller::find($id);
        $transformers_no=  $Minibller->transformer_id;
        // dd($transformers_no);
        $cbs=  $Minibller->cb_id ;
        $minibller_number=  $Minibller->minibller_number ;
        $transformers_no = DB::table('transeformers') 
        ->where('id', $transformers_no)
        ->first();
        $cbs = DB::table('cbs') 
        ->where('id', $cbs)
        ->first();

        $minibllar_notes = Minibllarnote::pluck('notes', 'id');
        $cable_sizes = Cable::pluck('cable_size', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.minibllers.addloop', compact('minibller_number','transformers_no','cable_sizes', 'cbs', 'minibllar_notes', 'transformers'));
    }

    public function create()
    {
        abort_if(Gate::denies('minibller_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transformers = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cbs = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $minibllar_notes = Minibllarnote::pluck('notes', 'id');

        $cable_sizes = Cable::pluck('cable_size', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.minibllers.create', compact('cable_sizes', 'cbs', 'minibllar_notes', 'transformers'));
    }
    public function store(StoreMinibllerRequest $request)
    {
        // dd($request);
       $minibller = Minibller::create($request->all());
        $minibller->minibllar_notes()->sync($request->input('minibllar_notes', []));
        foreach ($request->input('minibller_photo', []) as $file) {
            $minibller->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('minibller_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $minibller->id]);
        }
        return redirect()->route('admin.minibllers.index');
    }

    public function edit(Minibller $minibller)
    {
        abort_if(Gate::denies('minibller_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transformers = Transeformer::pluck('t_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cbs = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cable_sizes = Cable::pluck('cable_size', 'id')->prepend(trans('global.pleaseSelect'), '');

        $minibllar_notes = Minibllarnote::pluck('notes', 'id');

        $area_names = City::pluck('city_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $minibller->load('transformer', 'cb', 'cable_size', 'minibllar_notes', 'area_name');

        return view('admin.minibllers.edit', compact('area_names', 'cable_sizes', 'cbs', 'minibllar_notes', 'minibller', 'transformers'));
    }

    public function update(UpdateMinibllerRequest $request, Minibller $minibller)
    {
        $minibller->update($request->all());
        $minibller->minibllar_notes()->sync($request->input('minibllar_notes', []));
        if (count($minibller->minibller_photo) > 0) {
            foreach ($minibller->minibller_photo as $media) {
                if (! in_array($media->file_name, $request->input('minibller_photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $minibller->minibller_photo->pluck('file_name')->toArray();
        foreach ($request->input('minibller_photo', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $minibller->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('minibller_photo');
            }
        }

        return redirect()->route('admin.minibllers.index');
    }

    public function show(Minibller $minibller)
    {
        abort_if(Gate::denies('minibller_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $minibller->load('transformer', 'cb', 'cable_size', 'minibllar_notes', 'area_name', 'minibilerFouses', 'minibllerNoBoxes', 'minbilarCbs');

        return view('admin.minibllers.show', compact('minibller'));
    }

    public function destroy(Minibller $minibller)
    {
        abort_if(Gate::denies('minibller_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $minibller->delete();

        return back();
    }

    public function massDestroy(MassDestroyMinibllerRequest $request)
    {
        $minibllers = Minibller::find(request('ids'));

        foreach ($minibllers as $minibller) {
            $minibller->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('minibller_create') && Gate::denies('minibller_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Minibller();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}