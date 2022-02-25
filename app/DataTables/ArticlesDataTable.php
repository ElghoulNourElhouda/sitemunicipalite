<?php

namespace App\DataTables;

use App\Article;
use App\Offre;
use Yajra\Datatables\Services\DataTable;

class ArticlesDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->make(true);
        
        // $articles = Article::select(['id', 'title', 'body', 'created_at', 'updated_at']);
       // return Datatables::of($articles)->editColumn('title', '{{ $title."-title" }}')->make();
        
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        //$query = Article::query();
        $query = Offre::query()->select(['id', 'work', 'level', 'formation', 'location']);

        //return $this->applyScopes($query);
        
        return $query;
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
                    ->ajax('')
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return ['id', 'work', 'level', 'formation', 'location'];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'articlesdatatables_' . time();
    }
}
