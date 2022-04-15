<?php

namespace App\Http\Controllers\Admin;

use App\Facility;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySlideRequest;
use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FacilitiesController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Facility::select(sprintf('%s.*', (new Facility)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'facility_show';
                $editGate      = 'facility_edit';
                $deleteGate    = 'facility_delete';
                $crudRoutePart = 'facilities';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });
            
            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
                 
            

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.facilities.index');
    }

    public function create()
    {
        abort_if(Gate::denies('facility_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $services = Service::all()->pluck('name', 'id');

        return view('admin.facilities.create');
    }

    public function store(Request $request)
    {
        $useridvalue=auth()->user()->id;
        
        $picturename = time().'.'.request()->facimage->getClientOriginalExtension();
       // $request->request->add(['user_id' =>$useridvalue]);
        $request->request->add(['imageid' =>$picturename]);
        if($request->facimage==null){
            return redirect()->route('admin.slides.index')->with('message', "NOT RECORDED"."\t, Please Upload valid picture: "."");

                }

        $facility = Facility::create($request->all());
        if($request->facimage!=null){
            request()->facimage->move(public_path('facility'), $picturename);
             $number = $request->sku;
             }
        return redirect()->route('admin.facilities.index')->with('message', "v"."\t, Your Data Recorded: "."");
    }

    public function edit(Facility $facility)
    {
        abort_if(Gate::denies('facility_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $facility->all();

        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        abort_if(Gate::denies('facility_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    //    dd($slide);
        $image1=null;
        if($request->facimage!=null){
            $image1 = time().'.'.request()->facimage->getClientOriginalExtension();
            $request->request->add(['imageid' =>$image1]);

        }

        //dd($request);
        $facility->update($request->all());
        if($image1!=null){
        request()->facimage->move(public_path('facility'), $image1);
        $number = $request->sku;
        }
        return redirect()->route('admin.facilities.index');
    }

    public function show(Facility $facility)
    {
        abort_if(Gate::denies('facility_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.facility.show', compact('facility'));
    }

    public function destroy(Facility $facility)
    {
        abort_if(Gate::denies('facility_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facility->delete();

        return back();
    }

    public function massDestroy(MassDestroySlideRequest $request)
    {
         Slide::whereIn('id', request('ids'))->delete();

        // $updateProduct = Slide::whereIn('id',request('ids'))
        //           ->update(['phone' => '0921212121']);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
