<?php

namespace App\Http\Controllers;



use Notification;
use Mail ;
use App\Notifications\MyFirstNotification;
use App\Models\Career;
use App\Models\Position;
use Illuminate\Http\Request;

class CarrerController extends Controller
{


public function GetPositions() {
    $position = new Position();
    $allPositions = $position::where('Available' ,1)->get();
    return View('welcome', ['allPositions' => $allPositions]) ;
}



public function AddCareerInfo(Request $request) {

    $FirstName=$request->input('FirstName') ;
    $LastName=$request->input('LastName') ;
    $email = $request->input('email');
    $positionId=$request->input('position');
    $description=$request->input('description') ;



    $cv = $request->file('cv');
    $extension = $cv->getClientOriginalExtension();
    $filename = $email.'_CV.'.$extension;
    $cv->move('Files/',$filename);

    $link="http://127.0.0.1:8000/Files/".$filename ;
    if($extension=="pdf" || $extension=="docx"){

        $NewCareer=new Career() ;
        $NewCareer->FisrtName=$FirstName ;
        $NewCareer->LastName=$LastName ;
        $NewCareer->Email=$email ;
        $NewCareer->Cv=$filename ;
        $NewCareer->Description=$description ;
        $NewCareer->PositionId=$positionId ;
        $NewCareer->save() ;

        Mail::send([ ], [], function($message) use ($email, $FirstName , $LastName, $link ) {
            $message->to("charbel.eid@hotmail.co.uk");
            // Set the sender

            $message->setBody('Hello admin , the user : '.$FirstName.' '.$LastName.' submitted his career information . This is his personal email :'.$email.'Plus the CV is attachde below .
             Please check it: ' .$link. '');
        });
        return redirect()->route('Home') ;
    }else{

        echo '<script language="javascript">';
        echo 'alert("Please enter the asked format of the cv file.")';
        echo '</script>';

    }




}






}
