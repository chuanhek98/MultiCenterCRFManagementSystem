<?php

namespace App\Http\Controllers;

use App\Patient;
use App\SP1_AQuestionnaire;
use App\SP1_BAT;
use App\SP1_BMVS;
use App\SP1_Discharge;
use App\SP1_DQuestionnaire;
use App\SP1_IQ36;
use App\SP1_IQ48;
use App\SP1_PDynamicAnalysis;
use App\SP1_PDynamicSampling;
use App\SP1_PKineticSampling;
use App\SP1_UrineTest;
use App\SP1_VitalSigns;
use App\studySpecific;
use Illuminate\Http\Request;
use App\PatientStudySpecific;
use App\StudyPeriod1;
use App\SP1_Admission;
use DB;
use Alert;

class SP1_Admission_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request,$study_id)
    {
        $PID = $request->patient_id;
        $this->initaliseForms($PID,$study_id);
        //find Patient Study Specific table
        $findPSS =PatientStudySpecific::with('StudyPeriod1')
                                        ->where('patient_id',$PID)
                                        ->where('study_id',$study_id)
                                        ->first();

       if($findPSS !=NULL){
           //find SP1_ID to access the SP1_Admission
           //find admission table and update it
           $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
           $findSP1_Admission = SP1_Admission::where('SP1_Admission_ID',$findSP1->SP1_Admission)->first();
           //custom messages load for validation
           $custom = [
            'AdmissionDateTaken.required' => 'Please enter the admission date taken',
            'AdmissionTimeTaken.required' => 'Please enter the admission time taken',
            'ConsentDateTaken.required' => 'Please enter the consent date taken',
            'ConsentTimeTaken.required' => 'Please enter the consent time taken',
           ];

           //validation for required fields
           $validatedData=$this->validate($request,[
            'AdmissionDateTaken' => 'required',
            'AdmissionTimeTaken' => 'required',
            'ConsentDateTaken' => 'required',
            'ConsentTimeTaken' => 'required',
        ],$custom);

            //admission date and time
           $findSP1_Admission->AdmissionDateTaken = $request->AdmissionDateTaken;
           $findSP1_Admission->AdmissionTimeTaken = $request->AdmissionTimeTaken;
            //consent date and time
           $findSP1_Admission->ConsentDateTaken = $request->ConsentDateTaken;
           $findSP1_Admission->ConsentTimeTaken = $request->ConsentTimeTaken;

           $findSP1_Admission->save();

           return redirect(route('studySpecific.input',$study_id))->with('success','You have successfully save the study period details for Admission!');
       }else{
           alert()->error('Error!','This subject is not enrolled into any study!');
           return redirect(route('studySpecific.input',$study_id));
       }

    }

    public function edit(Request $request,$study_id)
    {
        $PID = $request->patient_id;
        $patient = Patient::where('id',$PID)->first();
       $findPSS = PatientStudySpecific::with('StudyPeriod1')
                                       ->where('patient_id',$PID)
                                       ->where('study_id',$study_id)
                                        ->first();
       if($findPSS !=NULL)
       {
           $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
           $admission = SP1_Admission::where('SP1_Admission_ID',$findSP1->SP1_Admission)->first();

           return view('SubjectStudySpecific',compact('admission','study_id','patient'));
       }

    }

    public function update(Request $request,$patient_id,$study_id)
    {
        $flag=false;
        $findPSS = PatientStudySpecific::with('StudyPeriod1')
                                        ->where('patient_id',$patient_id)
                                        ->where('study_id',$study_id)
                                        ->first();
        if($findPSS !=NULL)
        {
            $findSP1 = StudyPeriod1::where('SP1_ID',$findPSS->SP1_ID)->first();
            $admission = SP1_Admission::where('SP1_Admission_ID',$findSP1->SP1_Admission)->first();
        }
        $data = $request->except('_token','_method');
        foreach($data as $key=>$value)
        {
            if($value != NULL)
            {
                $admission[$key]=$value;
                $flag=true;
            }
        }
        if($flag)
        {
            $admission->save();
          return redirect(route('studySpecific.admin'))->with('success','You updated the subject study period details!');
        }


    }

    public function initaliseForms($id, $study_id)
    {
        //find patient's PSS
        $findPSS = PatientStudySpecific::where('patient_id',$id)
                                        ->where('study_id',$study_id)
                                        ->first();

        //get study's subject count number
        $findStudy = studySpecific::where('study_id',$study_id)->first();
        $subjectLimit = $findStudy->patient_Count;

        //find how many subject in the study
        $findPSSCount = PatientStudySpecific::where('study_id',$study_id)->get();


        if(count($findPSSCount) < $subjectLimit){

            //Initialise a new SP1 once the subject enroll into the study
            $SP1 = new StudyPeriod1;
            $SP1->save();

            //Initialise SP1_Admission
            $Admission = new SP1_Admission;
            $Admission->save();

            //Initialise SP1_BMVS
            $BMVS = new SP1_BMVS;
            $BMVS->save();

            //Initialise SP1_BAT
            $BAT=new SP1_BAT;
            $BAT->save();

            //Initialise SP1_AQuestionnaire
            $AQuestionnaire=new SP1_AQuestionnaire;
            $AQuestionnaire->save();

            //Initialise SP1_UrineTest
            $UrineTest = new SP1_UrineTest;
            $UrineTest->save();

            //Initialise SP1_PKineticSampling
            $PKineticSampling = new SP1_PKineticSampling;
            $PKineticSampling->save();

            //Initialise SP1_PDynamicSampling
            $PDynamicSampling = new SP1_PDynamicSampling();
            $PDynamicSampling->save();

            //Initialise SP1_PDynamicAnalysis
            $PDynamicAnalysis=new SP1_PDynamicAnalysis;
            $PDynamicAnalysis->save();

            //Initialise SP1_VitalSign
            $VitalSign=new SP1_VitalSigns;
            $VitalSign->save();

            //Initialise SP1_Discharge
            $Discharge=new SP1_Discharge;
            $Discharge->save();

            //Initialise SP1_DQuestionnaire
            $DQuestionnaire=new SP1_DQuestionnaire;
            $DQuestionnaire->save();

            //Initialise SP1_IQ36
            $IQ36 = new SP1_IQ36;
            $IQ36->save();

            //Initialise SP1_IQ48
            $IQ48 = new SP1_IQ48;
            $IQ48->save();

            //Bind SP1's ID into PSS
            $findPSS->SP1_ID = $SP1->SP1_ID;
            $findPSS->save();

            //bind SP1's form into SP1
            $SP1->SP1_Admission=$Admission->SP1_Admission_ID;
            $SP1->SP1_BMVS = $BMVS->SP1_BMVS_ID;
            $SP1->SP1_BATER = $BAT->SP1_BAT_ID;
            $SP1->SP1_AQuestionnaire=$AQuestionnaire->SP1_AQuestionnaire_ID;
            $SP1->SP1_UrineTest = $UrineTest->SP1_UrineTest_ID;
            $SP1->SP1_PKineticSampling = $PKineticSampling->SP1_PKineticSampling_ID;
            $SP1->SP1_PDynamicAnalysis=$PDynamicAnalysis->SP1_PDynamicAnalysis_ID;
            $SP1->SP1_Discharge=$Discharge->SP1_Discharge_ID;
            $SP1->Sp1_DQuestionnaire=$DQuestionnaire->SP1_DQuestionnaire_ID;
            $SP1->SP1_PDynamicSampling=$PDynamicSampling->SP1_PDynamicSampling_ID;
            $SP1->SP1_VitalSign=$VitalSign->SP1_VitalSign_ID;
            $SP1->SP1_IQ36 = $IQ36->SP1_IQ36_ID;
            $SP1->SP1_IQ48 = $IQ48->SP1_IQ48_ID;

            $SP1->save();

            //if all thing is saved and return true.
            return true;
        }else
        {
            //if reach limited it will return false
            return false;
        }

    }
}
