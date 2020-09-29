{{-- body measurements and vital signs --}}
<div class="form-group row tab-content">
        <h3>Body Measurements and Vital Signs</h3>
        <hr>
        <div class="col-md-1">
            {!! Form::label('dateTaken', 'Date Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::date('dateTaken', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
        </div>
        <div class=" offset-3 col-md-1">
            {!! Form::label('timeTaken', 'Time Taken: ') !!}
        </div>
        <div class="col-md-2">
            {!! Form::time('timeTaken', \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('H:i:s'),['class'=>'form-control']) !!}
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('weight', 'Weight: ') !!}
            </div>
            <div class="col-md-1">
                {!! Form::number('weight','', ['class'=>'form-control','placeholder'=>'kg']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('height', 'Height: ') !!}
            </div>
            <div class="col-md-1">
                {!! Form::number('height', '', ['class'=> 'form-control','placeholder'=>'cm']) !!}
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('bmi', 'Body Mass Index: ') !!}
            </div>
            <div class="col-md-1">
                {!! Form::number('bmi', '',['class'=>'form-control','placeholder'=>'kg/m2']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                {!! Form::label('temperature', 'Temperature: ') !!}
            </div>
            <div class="col-md-1">
                {!! Form::number('temperature', '',['class'=>'form-control','placeholder'=>'°C']) !!}
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
                <th scope="col">Blood Pressure (systolic/diastolic) (mmHg)</th>
                <th scope="col">Heart Rate (beats per min)</th>
                <th scope="col">Respiratory Rate (breaths per min)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{!! Form::label('Supine', 'Supine: ') !!}</th>
                <td>{!! Form::number('Supine_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('Supine_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('Supine_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('Supine_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            <tr>
                <th scope="row">{!! Form::label('Sitting', 'Sitting: ') !!}</th>
                <td>{!! Form::number('Sitting_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('Sitting_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('Sitting_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('Sitting_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            <tr>
                <th scope="row">
                    {!! Form::radio('SittingRepeat1', '') !!}
                    {!! Form::label('SittingRepeat1NA','Not Applicable') !!}
                    {!! Form::radio('SittingRepeat1', '') !!}
                    {!! Form::label('SittingRepeat1','Sitting Repeated') !!}
                </th>
                <td>{!! Form::number('SittingRepeat1_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('SittingRepeat1_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('SittingRepeat1_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('SittingRepeat1_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            <tr>
                <th scope="row">
                    {!! Form::radio('SittingRepeat2', '') !!}
                    {!! Form::label('SittingRepeat2NA','Not Applicable') !!}
                    {!! Form::radio('SittingRepeat2', '') !!}
                    {!! Form::label('SittingRepeat2','Sitting Repeated') !!}
                </th>
                <td>{!! Form::number('SittingRepeat2_ReadingTime', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('SittingRepeat2_BP', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('SittingRepeat2_HR', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
                <td>{!! Form::number('SittingRepeat2_RespiratoryRate', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            <tr>
                <th scope="row" colspan="4"
                    class="text-lg-right">{!! Form::label('Initial','Initial: ',['class'=>'text-md-left']) !!}</th>
                <td>{!! Form::text('Initial', '',['class'=>'form-control','placeholder'=>'']) !!}</td>
            </tr>
            </tbody>
        </table>
        <p>
            {!! Form::label('note1', 'Only latest reading is transcribed. Please comment if outside Systolic 90-140, Diastolic 50-90, HR 50-100, or if difference of Systolic or Diastolic between two positions > 20 or 10 respectively.') !!}
        </p>
</div>
{{-- Body measurements and vital signs ends--}}