<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'users.action')
            ->addColumn('jenisKelamin', function ($user) {
                switch ($user->jenisKelamin) {
                    case 0:
                        return "Pria";
                        break;
                    case 1:
                        return "Wanita";
                        break;
                }
            })
            ->addColumn('action', function (User $user) {
                return '<div class="btn-group btn-group-sm flex gap-4" role="group" aria-label="Action Buttons">
                    <a href="/user/' . $user->id . '/edit" class="btn btn-gray">View</a>
                    <a href="/userView/' . $user->id . '" class="btn btn-gray">Edit</a>
                    <a href="/users/' . $user->id . '/delete" class="btn btn-gray">Delete</a>
                </div>';
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            
            Column::make('id'),
            Column::make('fullName')->width(100),
            Column::make('email'),
            Column::make('username'),
            Column::make('address'),
            Column::make('phoneNumber'),
            Column::make('birthdate'),
            Column::make('agama'),
            Column::make('jenisKelamin'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}