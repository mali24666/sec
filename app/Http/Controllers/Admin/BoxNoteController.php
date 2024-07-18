<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBoxNoteRequest;
use App\Http\Requests\StoreBoxNoteRequest;
use App\Http\Requests\UpdateBoxNoteRequest;
use App\Models\BoxNote;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BoxNoteController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('box_note_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boxNotes = BoxNote::all();

        return view('admin.boxNotes.index', compact('boxNotes'));
    }

    public function create()
    {
        abort_if(Gate::denies('box_note_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.boxNotes.create');
    }

    public function store(StoreBoxNoteRequest $request)
    {
        $boxNote = BoxNote::create($request->all());

        return redirect()->route('admin.box-notes.index');
    }

    public function edit(BoxNote $boxNote)
    {
        abort_if(Gate::denies('box_note_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.boxNotes.edit', compact('boxNote'));
    }

    public function update(UpdateBoxNoteRequest $request, BoxNote $boxNote)
    {
        $boxNote->update($request->all());

        return redirect()->route('admin.box-notes.index');
    }

    public function show(BoxNote $boxNote)
    {
        abort_if(Gate::denies('box_note_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boxNote->load('boxNoteBoxes');

        return view('admin.boxNotes.show', compact('boxNote'));
    }

    public function destroy(BoxNote $boxNote)
    {
        abort_if(Gate::denies('box_note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boxNote->delete();

        return back();
    }

    public function massDestroy(MassDestroyBoxNoteRequest $request)
    {
        $boxNotes = BoxNote::find(request('ids'));

        foreach ($boxNotes as $boxNote) {
            $boxNote->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
