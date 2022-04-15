<?php

namespace App\Http\Controllers\Admin;

use App\Publication;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPublicationRequest;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Service;
use App\User;
use App\About;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PublicationsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Publication::select(sprintf('%s.*', (new Publication)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'publication_show';
                $editGate      = 'publication_edit';
                $deleteGate    = 'publication_delete';
                $crudRoutePart = 'publications';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.publications.index');
    }

    public function create()
    {
        abort_if(Gate::denies('publication_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        

        return view('admin.publications.create');
    }

    public function store(Request $request)
    {
        $useridvalue=auth()->user()->id;
             
        $publication = Publication::create($request->all());
       
        return redirect()->route('admin.publications.index');
    }

    public function edit(Publication $publication)
    {
        abort_if(Gate::denies('publication_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.publications.edit', compact('publication'));
    }

    public function update(Request $request, Publication $publication)
    {
        $useridvalue=auth()->user()->id;
       
        $publication->update($request->all());

        return redirect()->route('admin.publications.index');
    }

    public function show(Publication $publication)
    {
        abort_if(Gate::denies('publication_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

   

        return view('admin.publications.show', compact('publication'));
    }

    public function destroy(Publication $publication)
    {
        abort_if(Gate::denies('publication_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publication->delete();

        return back();
    }

    public function massDestroy(MassDestroyPublicationRequest $request)
    {
         Publication::whereIn('id', request('ids'))->delete();

        // $updateProduct = Publication::whereIn('id',request('ids'))
        //           ->update(['phone' => '0921212121']);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
