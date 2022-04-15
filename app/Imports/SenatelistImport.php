<?php

namespace App\Imports;

use App\Senatelist;
use App\Tempodegreechain;
use Maatwebsite\Excel\Concerns\ToModel;
use DateTime;
use Andegna;
use DB;

class SenatelistImport implements ToModel
{
     public function  __construct($reported_diploma)
    {
        $this->reported_diploma= ltrim($reported_diploma);
    }
   public function getLastId(){
        //$contacts = Contact::all();
        //if you want to get contacts on where condition use below code
        //$post = Post ::orderBy('id', 'desc')->latest('id')->first();
        // $cert = Senatelist ::orderBy('id', 'DESC')->first('id');
        $cert =DB::table('senatelists')->pluck('id')->last();
        //  dd($cert);
        if($cert!=null){ 
        $id = $cert;
        return $id;
         }
        else 
        return 0;
        }
  public function getprevid(){
        
        $cert = Senatelist ::orderBy('id', 'DESC')->first('cert_id');
       
        if($cert!=null){ 
        $previd = $cert->cert_id;
        // dd($previd);
        return $previd;
         }
        else 
        return 0;
        } 
    public function generateRandomString($length = 6) {
        $characters = '0123456789JIMMAUNIVERSITYWEAREINTHECOMMUNITY';
        //$characters=utf8_encode($characters);
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
       // $randomString=utf8_encode($randomString);
        return $randomString;
    }
   public function model(array $row)
    {
         // dd($this->reported_diploma);
        $today = new DateTime();
        $date = date('m/d/Y h:i:s a', time());
        $ethiopic = Andegna\DateTimeFactory::fromDateTime($today);
        $yrvalue= $ethiopic->format('Y');
        $twodigityrvalue = substr($yrvalue, -3);
        $useridvalue=auth()->user()->id;
        // $student_id=$request->student_id;
         $yrval1=$row[12];
         $stringParts = explode("(", $yrval1);
         $yrval1 =$stringParts[0];
         $yrval=substr($yrval1, -3);
         // dd($this->getLastId()+1);
         $lastid=$this->getLastId()+1;
        $autoid="JU-Td-"."".$yrval."-".($this->getLastId());
        $nonace=$this->generateRandomString();
        $varnumber=$nonace.$yrval.($this->getLastId());
       // dd($row[11]);
        $certid="JU-Td-".$yrval."-".($this->getLastId()+1); 
        $prevcert_id=$this->getprevid();
        // $prevcert_id="JU-Td-".$yrval."-".($this->getLastId());


    // $prevblockhashvalue = Tempodegreechain::get('blockhash')->where('certid', $prevcert_id);
    $prevblockhashvalue  = \DB::table('tempodegreechains')->where('certid',$prevcert_id) ->get(); 
       
  
     if (!$prevblockhashvalue->isEmpty()) {
        foreach ($prevblockhashvalue as $proval) 
            $prev=$proval->blockhash;
              $prevHash=$prev;
          }
     else {
             $prevHash="It is First Block";
            }
       // dd($prevHash);
        $hashednonace=md5($nonace);
        $description="This is to certify that he/she was graduated. The original diploma and transcript will be issued upon the discharge of cost-sharing duty";
        
        $json_obj = array("full_name"=>$row[2],
                            // "am_full_name"=>$request->am_full_name,
                            "student_id"=>$row[1],
                            "certid"=>$autoid,
                            "nonance"=>$nonace,
                            "varnumber"=>$varnumber,
                            "about_name"=>$this->reported_diploma,
                            "finish_time"=>$row[12],
                            "cgpa"=>$row[9],
                            "prevHash"=>$prevHash,
                            "description"=>$description,
                            "useridvalue"=>$useridvalue);

        $tempoobj =json_encode($json_obj,JSON_UNESCAPED_UNICODE);
        $tempoobjhash=md5(json_encode($json_obj,JSON_UNESCAPED_UNICODE));

        $certificatechain = Tempodegreechain::create(['certid'=> $certid, 
                                                //   'varnumber'=> $varnumber,
                                                   'tempoobj'=> $tempoobj, 
                                                   'blockhash'=> $tempoobjhash]);
                                                    // 'prevblockhash'=> $prevHash,
                                                    //  'hashednonace'=> $hashednonace]);
        

        $assignedfor="";

        
    
    return new Senatelist([
            'cert_id' =>"JU-Td-".$yrval."-".($this->getLastId()+1),
            'status'  =>"prepared",
            'varcode'=>$varnumber,
            'nonance'=>$nonace,
            'student_id'     => $row[1],
            'full_name'    => $row[2], 
            // 'amfull_name'    =>, 
            'diploma'    => $this->reported_diploma, 
            'sex'    => $row[3],
            'CGPA'    => $row[9],
            'CCR'   => $row[7],
            'CGP' =>$row[8],
            'remark' =>$row[10],
            'certified_date'  => $row[12],
            'certtype'=>"TO WHOM - Temporary Degree",
            'description'=>"በመመረቃቸው ይህ የምስክር ወረቀት ተሰጥቷችዋል። ዋናው ዲግሪ እና ትራንስክሪፕት በወጪ መጋራት ውል መሰረት ግዴታቸውን ሲወጡ የሚሥጣቸው ይሆናል። This is to certify that he/she was graduated. The original diploma and transcript will be issued upon the discharge of cost-sharing duty",
            'userid'=>auth()->user()->id,
            'assignedfor'=>$assignedfor,
        ]);
    }
}
