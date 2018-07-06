<?php

namespace App\DataTables;

use App\Models\Cadastro;
use Form;
use Yajra\Datatables\Services\DataTable;

class CadastroDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'cadastros.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $cadastros = Cadastro::query();

        return $this->applyScopes($cadastros);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => true,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             //'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'codigo' => ['name' => 'codigo', 'data' => 'codigo'],
            'descripcion' => ['name' => 'descripcion', 'data' => 'descripcion'],
            'ubicacion' => ['name' => 'ubicacion', 'data' => 'ubicacion'],
            'ean' => ['name' => 'ean', 'data' => 'ean'],
            'upc' => ['name' => 'upc', 'data' => 'upc'],
            'peso' => ['name' => 'peso', 'data' => 'peso'],
            'alto' => ['name' => 'alto', 'data' => 'alto'],
            'ancho' => ['name' => 'ancho', 'data' => 'ancho'],
            'profundidad' => ['name' => 'profundidad', 'data' => 'profundidad'],
            //'volumen' => ['name' => 'volumen', 'data' => 'volumen'],
            //'familia' => ['name' => 'familia', 'data' => 'familia'],
            //'categoria' => ['name' => 'categoria', 'data' => 'categoria'],
            'unid_caja' => ['name' => 'unid_caja', 'data' => 'unid_caja'],
            'caja_pallet' => ['name' => 'caja_pallet', 'data' => 'caja_pallet'],
            'cajas_nivel' => ['name' => 'cajas_nivel', 'data' => 'cajas_nivel'],
            //'altura_nivel' => ['name' => 'altura_nivel', 'data' => 'altura_nivel']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'cadastros';
    }
}
