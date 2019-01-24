<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GenerateHTMLController extends Controller
{

    public function index($iContentsID,$iCategoryID)
    {
      if($iCategoryID==2)
      {
        //$myFile ='http://media/html/'."home-welcome.htm";
       // $fh = fopen($myFile, "w");
       // $sData = "";

        //$sData .= '<div class="panel-body acps-panel-body text-justify margin-top0">'$iContentsID'</div>';

        //fwrite($fh, $sData);fclose($fh);
        
       // $request->session()->flash('alert-success', 'Contents information is successfully added');
        //return redirect('contents-information');
      }

      if($iCategoryID=='Principal')
      {
        $qItem=DB::table('cms_messages')->select('mess_eng_title','mess_small_img')->where('id',$iContentsID)->where('mess_is_active','Y')->first();
        $myFile = '/wamp/www/ipsc.edu.bd/media/html/'."principal-message.htm";
        $fh = fopen($myFile, "w");
        $sData = "";

        $sData .= '<div class="col-sm-4">
                      <img src="{{asset('.$qItem->mess_small_img.')}}" class="img-responsive">
                      <p>'.$qItem->mess_eng_title.'</p>
                      <a href="#" class="btn btn-primary margin-top5P">Read Message</a>
                  </div>';

        fwrite($fh, $sData);fclose($fh);
        return redirect('messages');
      }

      if($iCategoryID=='Notice')
      {
        $myFile = public_path('/documents/html/')."notice.htm";
        $fh = fopen($myFile, "w");
        $sData = "";

        $sData .= '<div class="panel-body acps-panel-body text-justify margin-top0">Hello...</div>';

        fwrite($fh, $sData);fclose($fh);
        return redirect()->action('AdministrationController@index',['id' => 'all']);
      }

    }


}
