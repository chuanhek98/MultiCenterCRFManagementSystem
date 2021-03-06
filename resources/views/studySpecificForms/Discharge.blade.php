{!! Form::open(['route' => ['sp_Discharge.store',$study->study_id]]) !!}
@csrf
{{-- Discharge --}}
<div class="form-group row">
    <div class="col-md-5">
        @if(Auth::check() && Auth::user()->hasAnyRoles(['Admin','superAdmin']))
            <div class="row">
                <div class="col-md-2">
                    <h4>{!! Form::label('SubjectName', 'Subject: ') !!}</h4>
                </div>
                <div class="col-md-6">
                    {!! Form::select('patient_id',$oriPatientName,null,['class'=>'form-control']) !!}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-2">
                    {!! Form::label('Admin view of name', 'Subject: ') !!}
                </div>
                <div class="col-md-8">
                    {!! Form::select('patient_id',$newName,null,['class'=>'form-control']) !!}
                </div>
            </div>
        @endif
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-4">
                <h4> {!! Form::label('studyPeriod', 'Study Period: ') !!}</h4>
            </div>
            <div class="col-md-3">
                <h4>{!! Form::select('studyPeriod',$studyPeriod,null,['class'=>'form-control']) !!}</h4>
            </div>
        </div>
    </div>
</div>
<h3>Discharge</h3>
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
        {!! Form::label('DischargeDate', 'Date: ') !!}
    </div>
    <div class="col-md-3">
        {!! Form::date('DischargeDate', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        {!! Form::label('unscheduledDischarge', 'Is this an unscheduled discharge? ') !!}
    </div>
    <div class="col-md-2">
            {!! Form::radio('unscheduledDischarge', 'No','',['id'=>'No']) !!}
            {!! Form::label('No', 'No') !!}
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2">
            {!! Form::radio('unscheduledDischarge', 'Yes','',['id'=>'Yes']) !!}
            {!! Form::label('Yes', 'Yes ') !!}
            </div>
            <div class="col-md-7">
            {!! Form::text('unscheduledDischarge_Text', '',['class'=>'form-control','placeholder'=>'If yes, please explain']) !!}
            </div>
        </div>
    </div>
</div>
<h4>Vital Signs</h4>
<hr>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Position</th>
        <th scope="col">Reading Time (24-hour clock)</th>
        <th scope="col" class="col-md-2">Blood Pressure (systolic/diastolic) (mmHg)</th>
        <th scope="col">Heart Rate (beats per min)</th>
        <th scope="col">Respiratory Rate (breaths per min)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
        <td>{!! Form::time('Sitting_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>
            {!! Form::number('Sitting_BP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::number('Sitting_BP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>{!! Form::number('Sitting_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('Sitting_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row">
            {!! Form::radio('SittingRepeat', 'No','checked',['id'=>'SittingRepeatNA']) !!}
            {!! Form::label('SittingRepeatNA','Not Applicable') !!}
            {!! Form::radio('SittingRepeat', 'Yes','',['id'=>'SittingRepeatYes']) !!}
            {!! Form::label('SittingRepeatYes','Sitting Repeated') !!}
        </th>
        <td>{!! Form::time('SittingRepeat_ReadingTime', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i'),['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>
            {!! Form::number('SittingRepeat_BP_S', '',['class'=>'form-control col-md-6','placeholder'=>'systolic']) !!}
            {!! Form::number('SittingRepeat_BP_D', '',['class'=>'form-control col-md-6','placeholder'=>'diastolic']) !!}
        </td>
        <td>{!! Form::number('SittingRepeat_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
        <td>{!! Form::number('SittingRepeat_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    <tr>
        <th scope="row" colspan="4"
            class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
        <td>{!! Form::text('Initial', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
    </tr>
    </tbody>
</table>
<div class="row col">
    <p>Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100 (latest reading only).</p>
</div>
<div class="form-group row col-md-6">
    {!! Form::label('Comment','Comments/ Remarks: ') !!}
    {!! Form::text('Comment','',['class'=>'form-control']) !!}
</div>
{{-- Body measurements and vital signs ends--}}
<div class="row col">
    {!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
</div>
{!! Form::close() !!}

