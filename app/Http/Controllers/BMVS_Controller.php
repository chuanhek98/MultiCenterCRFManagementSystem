<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Patient_BodyAndVitalSigns;
use DB;

class BMVS_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($id)
    {
        $patient = Patient::find($id);
        return view('details.create',compact('patient'));
    }
    public function store(Request $request,$id)
    {

      $bmvs = new Patient_BodyAndVitalSigns;

        $bmvs->patient_id=$id;
        $bmvs->dateTaken=$request->dateTaken;
        $bmvs->timeTaken=$request->timeTaken;
        $bmvs->weight=$request->weight;
        $bmvs->height=$request->height;
        $bmvs->bmi=$request->bmi;
        $bmvs->temperature=$request->temperature;
        $bmvs->Supine_ReadingTime=$request->Supine_ReadingTime;
        $bmvs->Supine_BP=$request->Supine_BP;
        $bmvs->Supine_HR=$request->Supine_HR;
        $bmvs->Supine_RespiratoryRate=$request->Supine_RespiratoryRate;
        $bmvs->Sitting_ReadingTime=$request->Sitting_ReadingTime;
        $bmvs->Sitting_BP=$request->Sitting_BP;
        $bmvs->Sitting_HR=$request->Sitting_HR;
        $bmvs->Sitting_RespiratoryRate=$request->Sitting_RespiratoryRate;
        $bmvs->Standing_ReadingTime=$request->Standing_ReadingTime;
        $bmvs->Standing_BP=$request->Standing_BP;
        $bmvs->Standing_HR=$request->Standing_HR;
        $bmvs->Standing_RespiratoryRate=$request->Standing_RespiratoryRate;
        $bmvs->Initial=$request->Initial;

        $validatedData=$this->validate($request,[
            'dateTaken' => 'required',
            'timeTaken' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'bmi' => 'required',
            'temperature' => 'required',
            'Supine_ReadingTime' => 'required',
            'Supine_BP' => 'required',
            'Supine_HR' => 'required',
            'Supine_RespiratoryRate' => 'required',
            'Sitting_ReadingTime' => 'required',
            'Sitting_BP' => 'required',
            'Sitting_HR' => 'required',
            'Sitting_RespiratoryRate' => 'required',
            'Standing_ReadingTime' => 'required',
            'Standing_BP' => 'required',
            'Standing_HR' => 'required',
            'Standing_RespiratoryRate' => 'required',
            'Initial' => 'required',
        ]);

        $bmvs->save();

        return redirect('preScreening/admin');
    }

    public function show($id)
    {
        $patient = Patient::find($id);
        $BodyAndVitals =$patient->bodyandvitalsigns;
        return view('details.show',compact('BodyAndVitals'))->with('patient',$patient);
    }

    public function edit($id)
    {
        $patient = Patient::find($id);
        $BodyAndVitals =$patient->bodyandvitalsigns;
        $BATER =$patient->BreathAlcoholTestAndElectrocardiogram;
        $Medical=$patient->MedicalHistory;
        $Physical=$patient->PhysicalExam;
        $UrineTest=$patient->UrineTest;
        $LabTest=$patient->LabTest;
        $Serology=$patient->SerologyTest;
        $InclusionExclusion=$patient->InclusionExclusion;
        $Conclu=$patient->Conclu;
        return view('details.edit',compact(
            'BodyAndVitals',
            'BATER',
            'Medical',
            'Physical',
            'UrineTest',
            'LabTest',
            'Serology',
            'InclusionExclusion',
            'Conclu'))->with('patient',$patient);
    }

    public function update(Request $request,$id)
    {
       DB::table('patient_body_and_vital_signs')
                        ->where('patient_id',$id)
                        ->update([
                                'dateTaken'=>$request->dateTaken,
                                'timeTaken'=>$request->timeTaken,
                                'weight'=>$request->weight,
                                'height'=>$request->height,
                                'bmi'=>$request->bmi,
                                'temperature'=>$request->temperature,
                                'Supine_ReadingTime'=>$request->Supine_ReadingTime,
                                'Supine_BP'=>$request->Supine_BP,
                                'Supine_HR'=>$request->Supine_HR,
                                'Supine_RespiratoryRate'=>$request->Supine_RespiratoryRate,
                                'Sitting_ReadingTime'=>$request->Sitting_ReadingTime,
                                'Sitting_BP'=>$request->Sitting_BP,
                                'Sitting_HR'=>$request->Sitting_HR,
                                'Sitting_RespiratoryRate'=>$request->Sitting_RespiratoryRate,
                                'Standing_ReadingTime'=>$request->Standing_ReadingTime,
                                'Standing_BP'=>$request->Standing_BP,
                                'Standing_HR'=>$request->Standing_HR,
                                'Standing_RespiratoryRate'=>$request->Standing_RespiratoryRate,
                                'Initial'=>$request->Initial
                        ]);

                        $validatedData=$this->validate($request,[
                            'dateTaken' => 'required',
                            'timeTaken' => 'required',
                            'weight' => 'required',
                            'height' => 'required',
                            'bmi' => 'required',
                            'temperature' => 'required',
                            'Supine_ReadingTime' => 'required',
                            'Supine_BP' => 'required',
                            'Supine_HR' => 'required',
                            'Supine_RespiratoryRate' => 'required',
                            'Sitting_ReadingTime' => 'required',
                            'Sitting_BP' => 'required',
                            'Sitting_HR' => 'required',
                            'Sitting_RespiratoryRate' => 'required',
                            'Standing_ReadingTime' => 'required',
                            'Standing_BP' => 'required',
                            'Standing_HR' => 'required',
                            'Standing_RespiratoryRate' => 'required',
                            'Initial' => 'required',
                        ]);
                        
        return redirect('preScreening/admin');

/*        $bmvs->patient_id =$patient_id;
        $bmvs->dateTaken=$request->dateTaken;
        $bmvs->timeTaken=$request->timeTaken;
        $bmvs->weight=$request->weight;
        $bmvs->height=$request->height;
        $bmvs->bmi=$request->bmi;
        $bmvs->temperature=$request->temperature;
        $bmvs->Supine_ReadingTime=$request->Supine_ReadingTime;
        $bmvs->Supine_BP=$request->Supine_BP;
        $bmvs->Supine_HR=$request->Supine_HR;
        $bmvs->Supine_RespiratoryRate=$request->Supine_RespiratoryRate;
        $bmvs->Sitting_ReadingTime=$request->Sitting_ReadingTime;
        $bmvs->Sitting_BP=$request->Sitting_BP;
        $bmvs->Sitting_HR=$request->Sitting_HR;
        $bmvs->Sitting_RespiratoryRate=$request->Sitting_RespiratoryRate;
        $bmvs->Standing_ReadingTime=$request->Standing_ReadingTime;
        $bmvs->Standing_BP=$request->Standing_BP;
        $bmvs->Standing_HR=$request->Standing_HR;
        $bmvs->Standing_RespiratoryRate=$request->Standing_RespiratoryRate;
        $bmvs->Initial=$request->Initial;

      $bmvs->save();*/
    }
/*    public function delete($id)
    {
        DB::table('patient_body_and_vital_signs')->where('patient_id',$id)->delete();

        return redirect('preScreening/admin')->with('Messages',"You had deleted the patient's details!");
    }*/
}
