<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use Andegna;
use App\Supporter;
use App\Models\Evaluation;
use App\item;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySupporterRequest;
use App\Http\Requests\StoreSupporterRequest;
use App\Http\Requests\UpdateSupporterRequest;
use App\Service;
use Gate;
use PDF;
use phpseclib3\Crypt\PublicKeyLoader;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SupportersController extends Controller
{
    use MediaUploadingTrait;
    public function getLastId()
    {
       
        $cert = Supporter::withTrashed()->orderBy('id', 'DESC')->first('id');

        if ($cert) {
            $id = $cert->id;
            return $id;
        } else
            return 0;
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('supporter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Supporter::select(sprintf('%s.*', (new Supporter)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'supporter_show';
                $editGate      = 'supporter_edit';
                $deleteGate    = 'supporter_delete';
                $crudRoutePart = 'supporters';

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

        return view('admin.supporters.index');
    }

    public function generateRandomString($length = 5)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        //$characters=utf8_encode($characters);
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        // $randomString=utf8_encode($randomString);
        return $randomString;
    }

    public function create()
    {
        abort_if(Gate::denies('supporter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    return view('admin.supporters.create');
    }


    public function store(Request $request)
    {
        $picturename = time().'.'.request()->slideimage1->getClientOriginalExtension();
        $request->request->add(['logoid' =>$picturename]);
        $userid = auth()->user()->id;
        if($request->slideimage1!=null){
            request()->slideimage1->move(public_path('logo'), $picturename);
             $number = $request->sku;
             }
             $request->request->add(['status' => "active"]);

        $request->request->add(['user_id' => $userid]);
        
        $supporter = Supporter::create($request->all());

        return redirect()->route('admin.supporters.index')->with('messege', 'Supporter Prepared successfully');;
    }

    public function edit(Supporter $supporter)
    {
        abort_if(Gate::denies('supporter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      
        return view('admin.supporters.edit', compact('supporter'));
    }

    public function update(Request $request, Supporter $supporter)
    {
        abort_if(Gate::denies('supporter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
        $userid = auth()->user()->id;
        if($request->slideimage1!=null){
            $picturename = time().'.'.request()->slideimage1->getClientOriginalExtension();
            $request->request->add(['logoid' =>$picturename]);
            request()->slideimage1->move(public_path('logo'), $picturename);
             $number = $request->sku;
             }
        $supporter->update($request->all());
        
        return redirect()->route('admin.supporters.index');
    }

    public function show(Supporter $supporter)
    {
        abort_if(Gate::denies('supporter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.supporters.show', compact('supporter'));
    }

    public function destroy(Supporter $supporter)
    {
        abort_if(Gate::denies('supporter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supporter->delete();

        return back();
    }

    public function massDestroy(MassDestroySupporterRequest $request)
    {
        Supporter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


    public function printcert($id)
    {
        abort_if(Gate::denies('supporter_print'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $today = new DateTime();
        $date = date('m/d/Y h:i:s a', time());
        $ethiopic = Andegna\DateTimeFactory::fromDateTime($today);
        $yrvalue = $ethiopic->format('Y');
        $datevalue= $ethiopic->format('Y-m-d H:i:s');

       $supporterres= Supporter::where('id', $id)->get();
       foreach ($supporterres as $certdateval) {
        $eva_id = $certdateval->eva_id;
        $supporter_id = $certdateval->supporter_id;
        $digsign = $certdateval->digsign;
        $created_atv = $certdateval->created_at;
         }
         $created_at=  $created_atv->format('Y-m-d H:i:s');
    $evares= Evaluation::where('id', $eva_id)->get();
    foreach ($evares as $certdateval) {
        $fullNameresult = $certdateval->fullNameresult;
        $doctyperesult = $certdateval->doctyperesult;
        $gparesult = $certdateval->gparesult;
        $anymodificationexist = $certdateval->anymodificationexist;
        $othercomment = $certdateval->othercomment;
        $recordnum="et-v-000".$id;
         }
        $data = [
            'title' => 'ET-VERIFY NATIONAL DOCUMENT CHECK RESULT ',
            'recordno'=>$recordnum,
            'supporter_id'=> $supporter_id,
            'digsign'=> $digsign,
            'created_at'=> $datevalue,
            'fullNameresult'=> $fullNameresult,
            'doctyperesult'=> $doctyperesult,
            'gparesult'=> $gparesult,
            'anymodificationexist'=>$anymodificationexist,
            'othercomment'=> $othercomment,
            'footer' => "This is ET-VERIFY supporter result of your request for Document Check (a background check that confirms details of qualification)"
        ];
        $pdf = PDF::loadView('admin/supporters/supporterprint', $data)->setPaper('a4', 'portrait');
    
        return $pdf->download($recordnum.'.pdf');

        // return view('admin.supporters.EngProCert', compact('cert'), [
        //     'about' => $about, 'dateval' => $myvalue,
        //     'name' => $name,
        //     'univ' => $univ,
        //     'varcode' => $varcode,
        //     'certid' => $certid
        // ]);
    }
}
