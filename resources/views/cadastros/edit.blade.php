@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cadastro
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cadastro, ['route' => ['cadastros.update', $cadastro->id], 'method' => 'patch']) !!}

                        @include('cadastros.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection