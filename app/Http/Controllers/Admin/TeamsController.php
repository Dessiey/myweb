<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTeamRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TeamsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Team::with(['user'])->select(sprintf('%s.*', (new Team)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'team_show';
                $editGate      = 'team_edit';
                $deleteGate    = 'team_delete';
                $crudRoutePart = 'teams';

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
            $table->editColumn('borderout', function ($row) {
                return $row->borderout ? $row->borderout : "";
            });
            $table->editColumn('borderinner', function ($row) {
                return $row->borderinner ? $row->borderinner : "";
            });
            $table->editColumn('titlefont', function ($row) {
                return $row->titlefont ? $row->titlefont : "";
            });
            $table->editColumn('titlefontcolor', function ($row) {
                return $row->titlefontcolor ? $row->titlefontcolor : "";
            });
           
            

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.teams.index');
    }

    public function create()
    {
        abort_if(Gate::denies('team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $useridvalue=auth()->user()->id;
        
        $picturename = time().'.'.request()->photoid->getClientOriginalExtension();
        $request->request->add(['user_id' =>$useridvalue]);
        $request->request->add(['photo' =>$picturename]);
        if($request->photoid==null){
            return redirect()->route('admin.teams.index')->with('message', "NOT RECORDED"."\t, Please Upload valid picture: "."");

                }

        $team = Team::create($request->all());
        if($request->photoid!=null){
            request()->photoid->move(public_path('teams'), $picturename);
             $number = $request->sku;
             }
        return redirect()->route('admin.teams.index')->with('message', "v"."\t, Your Setting Recorded: "."");
    }

    public function edit(Team $team)
    {
        abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $team->all();

        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    //    dd($team);
        $image1=null;
        if($request->photoid!=null){
            $image1 = time().'.'.request()->photoid->getClientOriginalExtension();
            $request->request->add(['photo' =>$image1]);

        }

        //dd($request);
        $team->update($request->all());
        if($image1!=null){
        request()->photoid->move(public_path('teams'), $image1);
        $number = $request->sku;
        }
        return redirect()->route('admin.teams.index');
    }

    public function show(Team $team)
    {
        abort_if(Gate::denies('team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.teams.show', compact('team'));
    }

    public function destroy(Team $team)
    {
        abort_if(Gate::denies('team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamRequest $request)
    {
         Team::whereIn('id', request('ids'))->delete();

        // $updateProduct = Team::whereIn('id',request('ids'))
        //           ->update(['phone' => '0921212121']);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
