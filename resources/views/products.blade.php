
@extends('layouts.app')

@section('content')
        <div class="container">

            <div class="panel panel-primary">

             <div class="panel-heading">Import and Export Data Into Excel and CSV in Laravel 5 Using maatwebsite</div>

              <div class="panel-body">

                   {!! Form::open(array('route' => 'product.import','method'=>'POST','files'=>'true')) !!}
                    <div class="row">
                       <div class="col-xs-10 col-sm-10 col-md-10">
                        @if (Session::has('success'))
                           <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif (Session::has('warnning'))
                            <div class="alert alert-warnning">{{ Session::get('warnning') }}</div>
                        @endif
                            <div class="form-group">
                                {!! Form::label('sample_file','Select File to Import:',['class'=>'col-md-3']) !!}
                                <div class="col-md-9">
                                {!! Form::file('products', array('class' => 'form-control')) !!}
                                {!! $errors->first('products', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                        {!! Form::submit('Upload',['class'=>'btn btn-success']) !!}
                        </div>
                    </div>
                   {!! Form::close() !!}


             </div>

            </div>

            </div>
@endsection
