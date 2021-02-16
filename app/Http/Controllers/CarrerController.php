<?php

namespace App\Http\Controllers;



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
    $description=$request->ingitput('description') ;



    $cv = $request->file('cv');
    $extension = $cv->getClientOriginalExtension();
    $filename = $email.'_CV.'.$extension;
    $cv->move('Files/',$filename);

    if($extension=="pdf" || $extension=="docx"){

        $NewCareer=new Career() ;
        $NewCareer->FisrtName=$FirstName ;
        $NewCareer->LastName=$LastName ;
        $NewCareer->Email=$email ;
        $NewCareer->Cv=$filename ;
        $NewCareer->Description=$description ;
        $NewCareer->PositionId=$positionId ;
        $NewCareer->save() ;

        return redirect()->route('Home') ;
    }else{

        echo '<script language="javascript">';
        echo 'alert("Please enter the asked format of the cv file.")';
        echo '</script>';

    }




}






}
