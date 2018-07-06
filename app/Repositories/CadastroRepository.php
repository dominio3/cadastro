<?php

namespace App\Repositories;

use App\Models\Cadastro;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CadastroRepository
 * @package App\Repositories
 * @version July 5, 2018, 1:24 am UTC
 *
 * @method Cadastro findWithoutFail($id, $columns = ['*'])
 * @method Cadastro find($id, $columns = ['*'])
 * @method Cadastro first($columns = ['*'])
*/
class CadastroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Cadastro::class;
    }
}
