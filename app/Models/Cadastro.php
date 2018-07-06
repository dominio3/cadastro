<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cadastro extends Model
{
    use SoftDeletes;

    public $table = 'cadastros';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'codigo',
        'descripcion',
        'ubicacion',
        'ean',
        'upc',
        'peso',
        'alto',
        'ancho',
        'profundidad',
        'volumen',
        'familia',
        'categoria',
        'unid_caja',
        'caja_pallet',
        'cajas_nivel',
        'altura_nivel'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigo' => 'string',
        'descripcion' => 'string',
        'ubicacion' => 'string',
        'ean' => 'string',
        'upc' => 'string',
        'peso' => 'float',
        'alto' => 'float',
        'ancho' => 'float',
        'profundidad' => 'float',
        'volumen' => 'float',
        'familia' => 'string',
        'categoria' => 'string',
        'unid_caja' => 'integer',
        'caja_pallet' => 'integer',
        'cajas_nivel' => 'integer',
        'altura_nivel' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

      'codigo' => 'required',
      'ubicacion' => 'required',

    ];


}
