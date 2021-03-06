{!! Form::model($BMVS,['route' => ['sp_Bmvs.update',$patient->id,$study_id,$study_period]]) !!}
@method('PUT')
@csrf
{{-- body measurements and vital signs --}}
<h3>Body Measurements and Vital Signs</h3>
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
        {!! Form::label('dateTaken', 'Date Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::date('dateTaken',old('dateTaken',$BMVS->dateTaken),['class'=>'form-control']) !!}
    </div>
    <div class=" offset-3 col-md-1">
        {!! Form::label('timeTaken', 'Time Taken: ') !!}
    </div>
    <div class="col-md-2">
        {!! Form::time('timeTaken', old('timeTaken',$BMVS->timeTaken),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        {!! Form::label('weight', 'Weight: ') !!}
    </div>
    <div class="col-md-1">
        {!! Form::number('weight',old('weight',$BMVS->weight), ['class'=>'form-control','placeholder'=>'kg']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        {!! Form::label('height', 'Height: ') !!}
    </div>
    <div class="col-md-1">
        {!! Form::number('height', old('height',$BMVS->height), ['class'=> 'form-control','placeholder'=>'cm']) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-md-4">
        {!! Form::label('bmi', 'Body Mass Index: ') !!}
    </div>
    <div class="col-md-1">
        {!! Form::text('bmi', old('bmi',$BMVS->bmi),['class'=>'form-control','placeholder'=>'kg/m2','readonly']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        {!! Form::label('temperature', 'Temperature: ') !!}
    </div>
    <div class="col-md-1">
        {!! Form::text('temperature', old('temperature',$BMVS->temperature),['class'=>'form-control','placeholder'=>'°C']) !!}
    </div>
</div>

{{-- Body measurement ends here--}}

<h4>Vital Signs</h4>
<hr>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Position</th>
        <th scope="col">Reading Time (24-hour clock)</th>
        <th scope="col" class='col-md-2'>Blood Pressure (systolic/diastolic) (mmHg)</th>
        <th scope="col">Heart Rate (beats per min)</th>
        <th scope="col">Respiratory Rate (breaths per min)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
        <td>{!! Form::time('Sitting_ReadingTime',old('Sitting_ReadingTime',$BMVS->Sitting_ReadingTime),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>
            {!! Form::number('Sitting_BP_S', old('Sitting_BP_S',$BMVS->Sitting_BP_S),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::number('Sitting_BP_D', old('Sitting_BP_D',$BMVS->Sitting_BP_D),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>{!! Form::number('Sitting_HR', old('Sitting_HR',$BMVS->Sitting_HR),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('Sitting_RespiratoryRate', old('Sitting_RespiratoryRate',$BMVS->Sitting_RespiratoryRate),['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row">
            {!! Form::radio('SittingRepeat1','Not Applicable',(old('Sitting_BP_Repeat1',$BMVS->Sitting_BP_Repeat1)==NULL)? 'checked' : '',['id'=>'SittingRepeat1NA']) !!}
            {!! Form::label('SittingRepeat1NA','Not Applicable') !!}
            {!! Form::radio('SittingRepeat1','Sitting Repeated',(old('Sitting_BP_Repeat1',$BMVS->Sitting_BP_Repeat1)!=NULL)? 'checked' : '',['id'=>'SittingRepeat1']) !!}
            {!! Form::label('SittingRepeat1','Sitting Repeated') !!}
        </th>
        <td>{!! Form::time('Sitting_ReadingTime_Repeat1',old('Sitting_ReadingTime_Repeat1',$BMVS->Sitting_ReadingTime_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>
            {!! Form::number('Sitting_BP_S_Repeat1', old('Sitting_BP_S_Repeat1',$BMVS->Sitting_BP_S_Repeat1),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::number('Sitting_BP_D_Repeat1', old('Sitting_BP_D_Repeat1',$BMVS->Sitting_BP_D_Repeat1),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>{!! Form::number('Sitting_HR_Repeat1', old('Sitting_HR_Repeat1',$BMVS->Sitting_HR_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('Sitting_RespiratoryRate_Repeat1', old('Sitting_RespiratoryRate_Repeat1',$BMVS->Sitting_RespiratoryRate_Repeat1),['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row">
            {!! Form::radio('SittingRepeat2', 'Not Applicable',(old('Sitting_BP_Repeat2',$BMVS->Sitting_BP_Repeat2)==NULL)? 'checked' : '',['id'=>'SittingRepeat2NA']) !!}
            {!! Form::label('SittingRepeat2NA','Not Applicable') !!}
            {!! Form::radio('SittingRepeat2', 'Sitting Repeated',(old('Sitting_BP_Repeat2',$BMVS->Sitting_BP_Repeat2)!=NULL)? 'checked' : '',['id'=>'SittingRepeat2']) !!}
            {!! Form::label('SittingRepeat2','Sitting Repeated') !!}
        </th>
        <td>{!! Form::time('Sitting_ReadingTime_Repeat2',old('Sitting_ReadingTime_Repeat2',$BMVS->Sitting_ReadingTime_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>
            {!! Form::number('Sitting_BP_S_Repeat2', old('Sitting_BP_S_Repeat2',$BMVS->Sitting_BP_S_Repeat2),['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::number('Sitting_BP_D_Repeat2',  old('Sitting_BP_D_Repeat2',$BMVS->Sitting_BP_D_Repeat2),['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>{!! Form::number('Sitting_HR_Repeat2', old('Sitting_HR_Repeat2',$BMVS->Sitting_HR_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('Sitting_RespiratoryRate_Repeat2', old('Sitting_RespiratoryRate_Repeat2',$BMVS->Sitting_RespiratoryRate_Repeat2),['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row" colspan="4"
            class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
        <td>{!! Form::text('Initial',($BMVS->Initial),['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    </tbody>
</table>
<p>
    {!! Form::label('note1', 'Only latest reading is transcribed.Comment below if outside Systolic 90-140, Diastolic 50-90, HR 50-100') !!}
</p>
<div class="form-group row col-md-6">
    {!! Form::label('Comment','Comments/ Remarks: ') !!}
    {!! Form::text('Comment',old('Comment',$BMVS->Comment),['class'=>'form-control']) !!}
</div>
{{-- Body measurements and vital signs ends--}}
<div class="row col">
    {!! Form::submit('Update',['class'=>'btn btn-primary'])!!}
</div>
{!! Form::close() !!}
{{-- Body measurements and vital signs ends--}}
