<?php

namespace App\DataTables\Admin;

use datatables;
use App\Models\Admin\Liste;
use App\Models\emplacement;
use function PHPSTORM_META\type;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class ListeDataTable extends DataTable
{ 
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'listes.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Liste $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Liste $model)
    {
        $emplacement_id = $this->id;
        if($emplacement_id == "-1" || $emplacement_id == ""){
            return $model->newQuery();
        }else{
            return $model->Where('emplacement_id', $emplacement_id)->newQuery();
        }
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],

                'language' => [
                    'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/French.json'),
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'nom',
            // ['data' => 'frequence', 'name' => 'frequence', 'title' => 'Frequence', 'searchable' => false, 'orderable' => false],
            // ['data' => 'indication', 'name' => 'indication', 'title' => 'Indication', 'searchable' => false, 'orderable' => false],
            // 'emplacement'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'listes_datatable_' . time();
    }
}
