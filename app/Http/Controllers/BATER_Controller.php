<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Patient_BreathAlcoholTestAndElectrocardiogram;
use DB;

class BATER_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function storeBATER(Request $request,$id)
    {
        $bater = new Patient_BreathAlcoholTestAndElectrocardiogram;

        $lab = $request->Laboratory;
        if($lab==NULL)
        {
            $bater->laboratory = $request->Laboratory_text;
        }else{
            $bater->laboratory = $request->Laboratory;
        }
        $bater->patient_id=$id;
        $bater->dateTaken=$request->dateTaken;
        $bater->timeTaken=$request->timeTaken;
        $bater->breathalcohol=$request->breathalcohol;
        $bater->breathalcoholResult=$request->breathalcoholResult;
        $bater->Usertranscribed=$request->Usertranscribed;
        $bater->ECGdateTaken=$request->ECGdateTaken;
        $bater->conclusion=$request->Conclusion;


        $bater->save();

        return redirect(route('details.create',$id));
    }
    public function updateBATER(Request $request,$id)
    {
        $lab=$request->Laboratory;

       DB::table('patient_breath_alcohol_test_and_electrocardiograms')
            ->where('patient_id',$id)
            ->update([
            'dateTaken'=>$request->dateTaken,
            'timeTaken'=>$request->timeTaken,
            'breathalcohol'=>$request->breathalcohol,
            'breathalcoholResult'=>$request->breathalcoholResult,
            'Usertranscribed'=>$request->Usertranscribed,
            'ECGdateTaken'=>$request->ECGdateTaken,
            'conclusion'=>$request->Conclusion
        ]);

           if($lab==NULL)
            {
                DB::table('patient_breath_alcohol_test_and_electrocardiograms')
                    ->where('patient_id',$id)
                    ->update([
                        'laboratory'=>$request->Laboratory_text
                    ]);

            }else{
                DB::table('patient_breath_alcohol_test_and_electrocardiograms')
                    ->where('patient_id',$id)
                    ->update([
                        'laboratory'=>$request->Laboratory
                    ]);
            }

        return redirect(route('details.edit',$id));
    }
}