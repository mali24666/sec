<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTranseformerRequest;
use App\Http\Requests\StoreTranseformerRequest;
use App\Http\Requests\UpdateTranseformerRequest;
use App\Models\Allnote;
use App\Models\Box;
use App\Models\Cb;
use App\Models\City;
use App\Models\User;

use App\Models\Line;
use App\Models\Transeformer;
use App\Models\Minibller;
use App\Models\Cable;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TranseformerController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('transeformer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $transeformers = Transeformer::with(['cbs', 'city_name', 'feeder_transeformers', 'transe_notes', 'side_scan_by', 'data_intery_by', 'media'])->get();

        $cbs = Cb::get();

        $cities = City::get();

        $lines = Line::get();

        $allnotes = Allnote::get();

        $users = User::get();

        return view('admin.transeformers.index', compact('allnotes', 'cbs', 'cities', 'lines', 'transeformers', 'users'));
    }
    public function fetchTranse($id)
    {
        abort_if(Gate::denies('transeformer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // dd($id);

        $transeformers = Transeformer::where('id' ,$id)->with(['cbs', 'city_name', 'feeder_transeformers', 'transe_notes', 'side_scan_by', 'data_intery_by', 'media'])->get();

        $cbs = Cb::get();

        $cities = City::get();

        $lines = Line::get();

        $allnotes = Allnote::get();

        $users = User::get();

        return view('admin.transeformers.index', compact('allnotes', 'cbs', 'cities', 'lines', 'transeformers', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('transeformer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feeder_transeformers = Line::pluck('line_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transe_notes = Allnote::pluck('t_notes', 'id');

        return view('admin.transeformers.create', compact('feeder_transeformers', 'transe_notes'));
    }

    public function add($id)
    {
        abort_if(Gate::denies('transeformer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cb_nos = Cb::pluck('trans_cb_fider_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $feeder_transeformers = Line::find($id);
        $box_transeformers = Box::pluck('box_number', 'id');

        $boxes = Box::pluck('box_number', 'id');
        $transe_cbs = Cb::pluck('trans_cb_fider_number', 'id');
        $transe_miniblars = Minibller::pluck('minibller_number', 'id');
        $lv_cables = Cable::pluck('cable_size', 'id')->prepend(trans('global.pleaseSelect'), '');
        $side_scan_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transe_notes = Allnote::pluck('t_notes', 'id');
       $city_names = City::pluck('city_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $data_intery_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transeformers.add',compact('box_transeformers','side_scan_bies','data_intery_bies','lv_cables','city_names','boxes', 'transe_cbs', 'cb_nos', 'feeder_transeformers', 'transe_notes', 'transe_miniblars'));
    }

    public function store(StoreTranseformerRequest $request)
    {
        $transeformer = Transeformer::create($request->all());
        $transeformer->cbs()->sync($request->input('cbs', []));
        $transeformer->transe_notes()->sync($request->input('transe_notes', []));
        foreach ($request->input('transformer_temperature_picture', []) as $file) {
            $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('transformer_temperature_picture');
        }

        foreach ($request->input('picture_befor', []) as $file) {
            $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('picture_befor');
        }

        foreach ($request->input('photo_after', []) as $file) {
            $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo_after');
        }

        foreach ($request->input('noise_r_picture', []) as $file) {
            $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('noise_r_picture');
        }

        foreach ($request->input('noise_l_picture', []) as $file) {
            $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('noise_l_picture');
        }

        foreach ($request->input('noise_o_picture', []) as $file) {
            $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('noise_o_picture');
        }

        foreach ($request->input('noise_t_picture', []) as $file) {
            $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('noise_t_picture');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $transeformer->id]);
        }
                $id = $transeformer ->id ; 
        return redirect()->route('admin.transeformers.fetchTranse', compact('id'));
    }

    public function edit(Transeformer $transeformer)
    {
        abort_if(Gate::denies('transeformer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cbs = Cb::pluck('trans_cb_fider_number', 'id');

        $city_names = City::pluck('city_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $feeder_transeformers = Line::pluck('line_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transe_notes = Allnote::pluck('t_notes', 'id');

        $side_scan_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $data_intery_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transeformer->load('cbs', 'city_name', 'feeder_transeformers', 'transe_notes', 'side_scan_by', 'data_intery_by');
        // dd( $transeformer);

        return view('admin.transeformers.edit', compact('cbs', 'city_names', 'data_intery_bies', 'feeder_transeformers', 'side_scan_bies', 'transe_notes', 'transeformer'));
    }

    public function update(UpdateTranseformerRequest $request, Transeformer $transeformer)
    {
        $transeformer->update($request->all());
        $transeformer->cbs()->sync($request->input('cbs', []));
        $transeformer->transe_notes()->sync($request->input('transe_notes', []));
        if (count($transeformer->transformer_temperature_picture) > 0) {
            foreach ($transeformer->transformer_temperature_picture as $media) {
                if (! in_array($media->file_name, $request->input('transformer_temperature_picture', []))) {
                    $media->delete();
                }
            }
        }
        $media = $transeformer->transformer_temperature_picture->pluck('file_name')->toArray();
        foreach ($request->input('transformer_temperature_picture', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('transformer_temperature_picture');
            }
        }

        if (count($transeformer->picture_befor) > 0) {
            foreach ($transeformer->picture_befor as $media) {
                if (! in_array($media->file_name, $request->input('picture_befor', []))) {
                    $media->delete();
                }
            }
        }
        $media = $transeformer->picture_befor->pluck('file_name')->toArray();
        foreach ($request->input('picture_befor', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('picture_befor');
            }
        }

        if (count($transeformer->photo_after) > 0) {
            foreach ($transeformer->photo_after as $media) {
                if (! in_array($media->file_name, $request->input('photo_after', []))) {
                    $media->delete();
                }
            }
        }
        $media = $transeformer->photo_after->pluck('file_name')->toArray();
        foreach ($request->input('photo_after', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo_after');
            }
        }

        if (count($transeformer->noise_r_picture) > 0) {
            foreach ($transeformer->noise_r_picture as $media) {
                if (! in_array($media->file_name, $request->input('noise_r_picture', []))) {
                    $media->delete();
                }
            }
        }
        $media = $transeformer->noise_r_picture->pluck('file_name')->toArray();
        foreach ($request->input('noise_r_picture', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('noise_r_picture');
            }
        }

        if (count($transeformer->noise_l_picture) > 0) {
            foreach ($transeformer->noise_l_picture as $media) {
                if (! in_array($media->file_name, $request->input('noise_l_picture', []))) {
                    $media->delete();
                }
            }
        }
        $media = $transeformer->noise_l_picture->pluck('file_name')->toArray();
        foreach ($request->input('noise_l_picture', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('noise_l_picture');
            }
        }

        if (count($transeformer->noise_o_picture) > 0) {
            foreach ($transeformer->noise_o_picture as $media) {
                if (! in_array($media->file_name, $request->input('noise_o_picture', []))) {
                    $media->delete();
                }
            }
        }
        $media = $transeformer->noise_o_picture->pluck('file_name')->toArray();
        foreach ($request->input('noise_o_picture', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('noise_o_picture');
            }
        }

        if (count($transeformer->noise_t_picture) > 0) {
            foreach ($transeformer->noise_t_picture as $media) {
                if (! in_array($media->file_name, $request->input('noise_t_picture', []))) {
                    $media->delete();
                }
            }
        }
        $media = $transeformer->noise_t_picture->pluck('file_name')->toArray();
        foreach ($request->input('noise_t_picture', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $transeformer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('noise_t_picture');
            }
        }

        return redirect()->route('admin.transeformers.index');
    }
    public function show(Transeformer $transeformer)
    {
        abort_if(Gate::denies('transeformer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transeformer->load('cbs', 'city_name', 'feeder_transeformers', 'transe_notes', 'side_scan_by', 'data_intery_by',  'transDiagrams');

        return view('admin.transeformers.show', compact('transeformer'));
    }

    public function destroy(Transeformer $transeformer)
    {
        abort_if(Gate::denies('transeformer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transeformer->delete();

        return back();
    }

    public function massDestroy(MassDestroyTranseformerRequest $request)
    {
        $transeformers = Transeformer::find(request('ids'));

        foreach ($transeformers as $transeformer) {
            $transeformer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('transeformer_create') && Gate::denies('transeformer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Transeformer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}