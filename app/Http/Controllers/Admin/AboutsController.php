<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAboutRequest;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AboutsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = About::select(sprintf('%s.*', (new About)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'about_show';
                $editGate      = 'about_edit';
                $deleteGate    = 'about_delete';
                $crudRoutePart = 'abouts';

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

        return view('admin.abouts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('about_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $useridvalue = auth()->user()->id;
        // dd($request);
        $usersetting  = About::withoutTrashed()->get();

        if (count($usersetting) != null) {
            return redirect()->route('admin.abouts.index')->with('message', "not Allowed" . "\t, Please Edit Your Setting: " . "");
        }

        return view('admin.abouts.create');
    }

    public function store(StoreAboutRequest $request)
    {
        // dd($request);
        
        $about = About::create($request->all());
    
        return redirect()->route('admin.abouts.index');
    }

    public function edit(About $about)
    {
        abort_if(Gate::denies('about_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

              return view('admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
    
        $about->update($request->all());

        return redirect()->route('admin.abouts.index');
    }

    public function show(About $about)
    {
        abort_if(Gate::denies('about_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.abouts.show', compact('about'));
    }

    public function destroy(About $about)
    {
        abort_if(Gate::denies('about_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $about->delete();

        return back();
    }

    public function massDestroy(MassDestroyAboutRequest $request)
    {
         About::whereIn('id', request('ids'))->delete();

        // $updateProduct = About::whereIn('id',request('ids'))
        //           ->update(['phone' => '0921212121']);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
