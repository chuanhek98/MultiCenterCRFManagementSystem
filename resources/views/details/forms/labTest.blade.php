{!! Form::model($LabTest,['route' => ['update.labtest',$patient->id]]) !!}
@method('PUT')
@csrf
<div class="form-group">
    <h3>Laboratory Tests</h3>
    <p>(Laboratory Test Report attached in Appendix)</p>
    <h5>Blood (Haematology and Chemistry)</h5>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateBTaken', 'Date Blood Taken: ') !!}
            {!! Form::date('dateBTaken') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateLMTaken', 'Date Last Meal Taken: ') !!}
            {!! Form::date('dateLMTaken') !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('TimeLMTaken', 'Time Last Meal Taken: ') !!}
            {!! Form::time('TimeLMTaken') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('describemeal', 'If within 8 hours, describe meal taken: ') !!}
            {!! Form::text('describemeal', $LabTest->describemeal) !!}
        </div>
    </div>
    <div>
        {!! Form::label('Blood_Laboratory', 'Laboratory: ') !!}

        {!! Form::radio('blood_laboratory', 'B.P. Clinical Lab Sdn Bhd',($LabTest->Blood_Laboratory=='B.P. Clinical Lab Sdn Bhd')? 'checked' : '') !!}
        {!! Form::label('blood_laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}

        {!! Form::radio('blood_laboratory',($LabTest->Blood_Laboratory!='B.P. Clinical Lab Sdn Bhd' && $LabTest->Blood_Laboratory==NULL)? 'checked' : '') !!}
        {!! Form::label('blood_laboratory', 'Other, specify: ') !!}

        {!! Form::text('blood_laboratory_Text',($LabTest->Blood_Laboratory!='B.P. Clinical Lab Sdn Bhd')? $LabTest->Blood_Laboratory : '') !!}
    </div>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('Blood_NAtest', 'Not Applicable') !!}
            {!! Form::checkbox('Blood_NAtest', 'Not Applicable') !!}
            {!! Form::label('Blood_NAtest', 'Repeated test: ') !!}
            {!! Form::text('Blood_NAtest', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('Repeat_dateBCollected', 'Date Blood Collected: ') !!}
            {!! Form::date('Repeat_dateBCollected') !!}
        </div>
    </div>
    <div>
        {!! Form::label('bloodrepeat_laboratory', 'Laboratory: ') !!}

        {!! Form::radio('bloodrepeat_laboratory', 'B.P. Clinical Lab Sdn Bhd',($LabTest->BloodRepeat_Laboratory=='B.P. Clinical Lab Sdn Bhd')?'checked':'') !!}
        {!! Form::label('bloodrepeat_laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}

        {!! Form::radio('bloodrepeat_laboratory', 'Other',($LabTest->BloodRepeat_Laboratory!='Sarawak General Hospital Heart Centre' && $LabTest->BloodRepeat_Laboratory!=NULL)?'checked':'') !!}
        {!! Form::label('bloodrepeat_laboratory', 'Other, specify: ') !!}

        {!! Form::text('bloodrepeat_laboratory_Text', ($LabTest->BloodRepeat_Laboratory!='B.P. Clinical Lab Sdn Bhd' && $LabTest->BloodRepeat_Laboratory!=NULL)? $LabTest->BloodRepeat_Laboratory: '') !!}
    </div>

    <h5>Urine (Microbiology)</h5>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('dateUTaken', 'Date Urine Collected: ') !!}
            {!! Form::date('dateUTaken') !!}
        </div>
    </div>
    <div>
        {!! Form::label('urine_laboratory', 'Laboratory: ') !!}

        {!! Form::radio('urine_laboratory', 'B.P. Clinical Lab Sdn Bhd',($LabTest->Urine_Laboratory=='B.P. Clinical Lab Sdn Bhd')? 'checked' : '') !!}
        {!! Form::label('urine_laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}

        {!! Form::radio('urine_laboratory','Other',($LabTest->Urine_Laboratory!='B.P. Clinical Lab Sdn Bhd' &&  $LabTest->Urine_Laboratory!=NULL)? 'checked' : '') !!}
        {!! Form::label('urine_laboratory', 'Other, specify: ') !!}

        {!! Form::text('urine_laboratory_Text',($LabTest->Urine_Laboratory!='B.P. Clinical Lab Sdn Bhd')? $LabTest->Urine_Laboratory : '') !!}
    </div>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('Urine_NAtest', 'Not Applicable') !!}
            {!! Form::checkbox('Urine_NAtest', 'Not Applicable') !!}
            {!! Form::label('Urine_RepeatTest', 'Repeated test: ') !!}
            {!! Form::text('Urine_RepeatTest', '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('Repeat_dateUCollected', 'Date Blood Collected: ') !!}
            {!! Form::date('Repeat_dateUCollected') !!}
        </div>
    </div>
    <div>
        {!! Form::label('urinerepeat_laboratory', 'Laboratory: ') !!}

        {!! Form::radio('urinerepeat_laboratory', 'B.P. Clinical Lab Sdn Bhd',($LabTest->UrineRepeat_Laboratory=='Sarawak General Hospital Heart Centre')?'checked':'') !!}
        {!! Form::label('urinerepeat_laboratory', 'B.P. Clinical Lab Sdn Bhd') !!}

        {!! Form::radio('urinerepeat_laboratory', 'Other',($LabTest->UrineRepeat_Laboratory!='Sarawak General Hospital Heart Centre' && $LabTest->UrineRepeat_Laboratory!=NULL)?'checked':'') !!}
        {!! Form::label('urinerepeat_laboratory', 'Other, specify: ') !!}

        {!! Form::text('urinerepeat_laboratory_Text',($LabTest->UrineRepeat_Laboratory!='B.P. Clinical Lab Sdn Bhd')? $LabTest->UrineRepeat_Laboratory : '') !!}
    </div>
    </div>
        <a href="{{url('preScreening/admin')}}" class="btn btn-primary">Back</a>
        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
