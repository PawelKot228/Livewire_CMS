<?php

namespace App\DataTables;

use App\Models\ArticleCategory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ArticleCategoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($item) {
                return view('admin._datatables.actions', [
                    'edit' => route('admin.article-category.edit', ['id' => $item->getKey()]),
                    'delete' => route('admin.article-category.delete', ['id' => $item->getKey()]),
                ]);
            })
            ->addColumn('article_category_title', function ($item) {
                return $item->article_category_title;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ArticleCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ArticleCategory $model)
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
            ->setTableId('articlecategory-table')
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
            Column::make('id_article_category')
                ->title('#')
                ->width('50px'),
            Column::make('article_category_title'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            //Column::make('created_at'),
            //Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ArticleCategory_' . date('YmdHis');
    }
}
