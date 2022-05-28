<?php

namespace App\DataTables;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SeoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($item) {
                return view('admin._datatables.actions', [
                    'edit' => route('admin.seo.edit', ['id' => $item->getKey()]),
                    'delete' => route('admin.seo.delete', ['id' => $item->getKey()]),
                ]);
            })
            ->addColumn('slug', function ($item) {
                $url = "<a href='$item->slug'>$item->slug</a>";

                return $url;
            })
            ->rawColumns([
                'slug',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Article $model
     * @return Builder
     */
    public function query(Article $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('seo-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id_seo')
                ->title('#')
                ->width('50px'),
            Column::make('slug')
                ->title(__('admin.label.category'))
                ->width('200px'),
            Column::make('seo_title'),
            Column::make('source_id')
                ->width('120px'),
            Column::make('source_table')
                ->width('120px'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Article_' . date('YmdHis');
    }
}
