 @extends('MasterLayout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <p>There are a few criteria that didn't fill in. Please fill in all the criteria</p>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('Messages'))
        {{-- <div class="alert alert-success">
            {{ session('Messages') }}
        </div> --}}
        <script>
            toast('Your Post as been submited!','success');
        </script>
    @endif
    @if (session('ErrorMessages'))
        <div class="alert alert-danger">
            {{ session('ErrorMessages') }}
        </div>
    @endif
    <div class="container-fluid">
        <h3>Please fill in the belows to start creating a Study-Specific</h3>
        <hr>
        {!! Form::open(['route'=>'studySpecific.store']) !!}
        @csrf
        <div class="form-group row">
            <div class="col-md-1">
                {!! Form::label('startDate', 'Start Date: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::date('startDate', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            </div>
            <div class=" offset-3 col-md-1">
                {!! Form::label('endDate', 'End Date: ') !!}
            </div>
            <div class="col-md-2">
                {!! Form::date('endDate', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('study_name', 'Please Enter the study name: ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::text('study_name', '',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('patient_Count', 'Please add in the number of participant ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::number('patient_Count',"",['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('studyPeriod_Count', 'Please add in the number of Study Periods ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::number('studyPeriod_Count',"",['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <p><strong>Name:   </strong>{{Auth::user()->name}}</p>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('MRNno', 'MRN Hopsital Registration Number: ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::text('MRNno', '',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                {!! Form::label('protocolNO', 'Protocol NO: ') !!}
            </div>
            <div class="col-md-3">
                {!! Form::text('protocolNO', '',['class'=>'form-control']) !!}
            </div>
        </div>
        <br>
        {!! Form::submit('Create',['class'=>'btn btn-primary'])!!}
        {!! Form::close() !!}
    </div>
@endsection
