<?php

namespace App\Http\Controllers\DataTables;

use App\Models\Permission;
use Yajra\DataTables\Services\DataTable;

class PermissionDataTable extends DataTable
{

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('count', function ($data){
                return $data->permissions->count();
            })
            ->addColumn('action', function ($data) {
                return '<center>
                     <a href="javascript:;" onclick="edit(this)" data-id="'.$data->id.'"
                                           data-name="'.$data->name.'"
                                           data-guard_name="'.$data->guard_name.'"
                                           data-permission_group="'.$data->permission_group_id.'"
                                           class="mx-3"
                                           data-bs-toggle="tooltip" data-bs-original-title="Edit Employee">
                                            <i class="fas fa-user-edit text-secondary" aria-hidden="true"></i>
                                        </a>
                        <a onclick= "deleteItem('.$data->id.')" href="javascript:;"data-bs-toggle="tooltip" data-bs-original-title="Delete role"><i class="fas fa-trash text-danger" aria-hidden="true"></i></a>
                        </center>';
            })
            ->rawColumns(['count','action'])
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Permission::with('group');

        return $this->applyScopes($query);
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
            ->ajax('')
            ->addAction(['width' => '100px'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['data' => 'id', 'name' => 'id', 'searchable' => false],
            'Name' => ['data' => 'name', 'name' => 'name'],
            'Permission Group' => ['data' => 'group.name', 'name' => 'group.name'],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'towndatatables_' . time();
    }
}
