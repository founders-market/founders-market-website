@extends('layouts.default')

@section('body')
<div class="row">

    <div class="col-md-6 col-md-offset-3">
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>

        <h2>Register here</h2>
        {!! Form::open(array('route' => array('user/store'), 'method' => 'post')) !!}
            <div class="row">
                <div class="six columns" >
                    {!! Form::label('username','Username')                              !!}
                    {!! Form::text('username', null,array('class' => 'form-control', 'placeholder' => 'bobbyTables'))     !!}
                </div>

                <div class="six columns">
                    {!! Form::label('email','Email')                                        !!}
                    {!! Form::text('email', null,array('class' => 'form-control', 'placeholder' => 'bobby@tables.com')) !!}
                </div>
            </div>
            
            <div class="row">
                <div class="six columns" >
                    {!! Form::label('first_name','First Name')                              !!}
                    {!! Form::text('first_name', null,array('class' => 'form-control', 'placeholder' => 'Bobby'))     !!}
                </div>

                <div class="six columns">
                    {!! Form::label('last_name','Last Name')                                !!}
                    {!! Form::text('last_name', null,array('class' => 'form-control', 'placeholder' => 'Drop-Tables'))      !!}
                </div>
            </div>

            <div class="row">
                {!! Form::label('password','Password') 									!!}
                {!! Form::password('password',array('class' => 'form-control')) 		!!}
            </div>
            
            <div class="row">
                {!! Form::label('password_confirmation','Password Confirm')                     !!}
                {!! Form::password('password_confirmation',array('class' => 'form-control'))    !!}
            </div>
            
            <div class="row">
                <div class="six columns"> 
                    {!! Form::label('country','Country')                     !!}
                    {!! Form::select('country', $data['countries'], 'Ireland')  !!}
                </div>

                <div class="six columns">
                    {!! Form::label('main_skill','Main Skill')            !!}
                    {!! Form::select('main_skill', $data['main_skills'])  !!}
                </div>
            </div>
            
            <div class="row">
                {!! Form::label('intention','Intention')         !!}
                {!! Form::select('intention', $data['intents'])  !!}
            </div>
            

        <div class="row">
            {!! Form::submit('Register', array('class' => 'button u-pull-right')) 		!!}
            {!! Form::close()  														!!}
        </div>
    </div>
</div>
@stop
