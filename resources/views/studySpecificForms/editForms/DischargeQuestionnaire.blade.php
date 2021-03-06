{!! Form::model($DQuestionnaire,['route' => ['sp_DQuestionnaire.update',$patient->id,$study_id,$study_period]]) !!}
@method('PUT')
@csrf
<h3>Discharge Questionnaire</h3>
<div class=" form-group row">
    <div class="col-md-1">
        {!! Form::label('Absent', 'Absent:') !!}
    </div>
    <div class="col-md-1">
        {!! Form::checkbox('Absent') !!}
    </div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-1">
        {!! Form::label('time', 'Time: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('DQtimeTaken',old("DQtimeTaken",$DQuestionnaire->DQtimeTaken),['class'=>'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-5">
    </div>
    <div class="col-md-1 font-weight-bold">
        Yes
    </div>
    <div class="col-md-1 font-weight-bold">
        No
    </div>
</div>
<div class="form-group row">
    <div class="col-md-5">
        <p>1. Is the subject oriented and has steady gait?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Oriented', 'Yes',(($DQuestionnaire->Oriented)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('Oriented', 'No',(($DQuestionnaire->Oriented)=='No')? 'checked' : '') !!}</p>
    </div>
</div>
<hr>
<div class="form-group row">
    <div class="col-md-5">
        <p>2. Is the subject fit for discharge?</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('ReadyDischarge', 'Yes',(($DQuestionnaire->ReadyDischarge)=='Yes')? 'checked' : '') !!}</p>
    </div>
    <div class="col-md-1">
        <p>{!! Form::radio('ReadyDischarge', 'No',(($DQuestionnaire->ReadyDischarge)=='Yes')? 'checked' : '') !!}</p>
    </div>
</div>
<hr>

<div class="row col">
    <p>The answers for all the statements above should be “Yes” before a subject is recommended for discharge. The
        attending physician is required to exercise his clinical judgement. The above criteria serve as a minimal guide
        only.</p>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::label('AdditionalRemarks', 'Additional Remarks (where applicable)') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        {!! Form::textarea('AdditionalRemarks',old("AdditionalRemarks",$DQuestionnaire->AdditionalRemarks),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        {!! Form::label('PhysicianSign', 'Physician/Investigator’s Signature: ') !!}
        {!! Form::text('PhysicianSign',old("PhysicianSign",$DQuestionnaire->PhysicianSign),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        {!! Form::label('PhysicianName', 'Name (Printed) : ') !!}
        {!! Form::text('PhysicianName',old("PhysicianName",$DQuestionnaire->PhysicianName),['class'=>'form-control']) !!}
    </div>
</div>

{{Form::submit('Update',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
