<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Ubicacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ubicacion', 'Ubicacion:') !!}
    {!! Form::text('ubicacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Ean Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ean', 'Ean:') !!}
    {!! Form::number('ean', null, ['class' => 'form-control']) !!}
</div>

<!-- Upc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('upc', 'Upc:') !!}
    {!! Form::number('upc', null, ['class' => 'form-control']) !!}
</div>

<!-- Peso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('peso', 'Peso:') !!}
    {!! Form::number('peso', null, ['class' => 'form-control','step' => '0.1']) !!}
</div>

<!-- Alto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alto', 'Alto:') !!}
    {!! Form::number('alto', null, ['class' => 'form-control','step' => '0.1']) !!}
</div>

<!-- Ancho Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ancho', 'Ancho:') !!}
    {!! Form::number('ancho', null, ['class' => 'form-control','step' => '0.1']) !!}
</div>

<!-- Profundidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profundidad', 'Profundidad:') !!}
    {!! Form::number('profundidad', null, ['class' => 'form-control','step' => '0.1']) !!}
</div>

<!-- Volumen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('volumen', 'Volumen:') !!}
    {!! Form::number('volumen', null, ['class' => 'form-control','step' => '0.1']) !!}
</div>

<!-- Familia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('familia', 'Familia:') !!}
    {!! Form::text('familia', null, ['class' => 'form-control']) !!}
</div>

<!-- Categoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria', 'Categoria:') !!}
    {!! Form::text('categoria', null, ['class' => 'form-control']) !!}
</div>

<!-- Unid Caja Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unid_caja', 'Unid Caja:') !!}
    {!! Form::number('unid_caja', null, ['class' => 'form-control']) !!}
</div>

<!-- Caja Pallet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('caja_pallet', 'Caja Pallet:') !!}
    {!! Form::number('caja_pallet', null, ['class' => 'form-control']) !!}
</div>

<!-- Cajas Nivel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cajas_nivel', 'Cajas Nivel:') !!}
    {!! Form::number('cajas_nivel', null, ['class' => 'form-control']) !!}
</div>

<!-- Altura Nivel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('altura_nivel', 'Altura Nivel:') !!}
    {!! Form::number('altura_nivel', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cadastros.index') !!}" class="btn btn-default">Cancel</a>
</div>
