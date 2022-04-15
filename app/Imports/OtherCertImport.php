<?php

namespace App\Imports;

use App\OtherCertificate;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Redirect;
use DateTime;
use Andegna;
use DB;
use phpseclib3\Crypt\PublicKeyLoader;
class OtherCertImport implements ToModel
{
     public function  __construct($certtype,$reported_description,$reported_colawith,$picturename)
    {
        $this->certtype= ltrim($certtype);
        $this->picname=$picturename;
        // $this->check_data=$reported_data;
        $this->colawith= ltrim($reported_colawith);
        $this->reported_description= ltrim($reported_description);
      
    }
   public function getLastId(){
        
        $cert =DB::table('othercertificates')->pluck('id')->last();
        //  dd($cert);
        if($cert!=null){ 
        $id = $cert;
        return $id;
         }
        else 
        return 0;
        }
        public function getcertprefix($certtype){
            if($certtype=="Certificate of Community Service"){
                $idprfix="CoS-";
            }
            else if($certtype=="Certificate of Training"){
                $idprfix="TrC-";
            }
            else if($certtype=="Certificate of Appreciation"){
                $idprfix="ApC-";
            }
            else if($certtype=="Certificate of Recognition"){
                $idprfix="ReC-";
            }
            else if($certtype=="Certificate of Achievement"){
                $idprfix="AcC-";
            }
            else {
                $idprfix="Oth-";
            }
      return $idprfix;
    
          }
  public function getprevid(){
        
        $cert = OtherCertificate ::orderBy('id', 'DESC')->first('cert_id');
       
        if($cert!=null){ 
        $previd = $cert->cert_id;
        return $previd;
         }
        else 
        return 0;
        } 
    public function generateRandomString($length = 6) {
        $characters = '0123456789JIMMAUNIVERSITYWEAREINTHECOMMUNITY';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function ifnullrows() {
    //   dd("Hello");
    return Redirect::to('admin.othercertificates.index')->with('danger', "NULL VALUES in ROWS"."\t,  You Have ROWS WITH NULL VALUE.");
// return redirect()->route('admin.othercertificates.index')->with('danger', "NULL VALUES in ROWS"."\t,  You Have ROWS WITH NULL VALUE.");
}
   public function model(array $row)
    {
        // if($row[0]==null){
        //     return Redirect::to('admin.othercertificates.index')->with('danger', "NULL VALUES in ROWS"."\t,  You Have ROWS WITH NULL VALUE.");
        //        }
        if ($row[0]==null||(!is_string($row[0]))) {
            dd("YOU HAVE NULL ROWS or Names with Number IN YOUR IMPORTED FILE, GO BACK AND Correct the file before import"); 
        }
        $obj=new OtherCertImport( $this->certtype,$this->reported_description,$this->colawith,$this->picname);
        $today = new DateTime();
        $date = date('m/d/Y h:i:s a', time());
       
        $ethiopic = Andegna\DateTimeFactory::fromDateTime($today);
        $issueddate=$ethiopic;
        $yrvalue= $ethiopic->format('Y');
        $twodigityrvalue = substr($yrvalue, -3);
        $useridvalue=auth()->user()->id;
        $lastid=$this->getLastId()+1;
        $nonace=$this->generateRandomString();
        $varnumber=$nonace.$yrvalue.($this->getLastId());
        $certprefixcode= $obj->getcertprefix( $this->certtype);

        $certid="$certprefixcode".$yrvalue."-".($this->getLastId()+1); 
        $description=$this->reported_description;
        $certtype=$this->certtype;
        $colawith=$this->colawith;
        $picname=$this->picname;
        
        if($row[1]!=null){
            $issueddate=$row[1];
        }
        $prevblock = \DB::table('othercertificates')->latest('id')->first(); 
        // dd( $prevblock->pubencripted);
        if ($prevblock!=null) {
            $prevHash= $prevblock->pubencripted;
             }
        else {
            $prevHash="It is First Block";
               }
        $json_obj = array("full_name"=>$row[0],
                            "certid"=>$certid,
                            "issueddate"=>$issueddate,
                            "varnumber"=>$varnumber,
                            "certype"=> $certtype,
                            "description"=>$description,
                            "prevHash"=>$prevHash,
                            "colawith"=>$colawith,
                            "logoname"=>$picname,
                            "useridvalue"=>$useridvalue);

        $tempoobj =json_encode($json_obj,JSON_UNESCAPED_UNICODE);
        $tempoobjhash=md5(json_encode($json_obj,JSON_UNESCAPED_UNICODE));

        $key = auth()->user()->key;
        //$private = PublicKeyLoader::load($key->private_key);
        $public = PublicKeyLoader::load($key->public_key);
        $encvalue=base64_encode($public->encrypt($tempoobjhash));
        // $request->request->add(['pubencripted' =>$encvalue]);
    
    return new OtherCertificate([
            'othcertid' =>$certid,
            'varcode'=>$varnumber,
            'name'    => ltrim($row[0]), 
            'certtype'    => $certtype, 
            'certobj'   =>$tempoobj,
            'pubencripted' =>$encvalue,
            'amname'=> " ",
            'colawith'=> $colawith,
            'logocolawith'=> $picname,
            'description'=>$this->reported_description, 
            'creater_user_id'=>auth()->user()->id,
            'digsign' =>$tempoobjhash,
            
        ]);
    }
}
