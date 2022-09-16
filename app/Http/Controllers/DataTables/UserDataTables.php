<?php

namespace App\Http\Controllers\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;

class UserDataTables extends DataTable
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
            ->addColumn('roles', function($user){
                $roleLabels = "";
                foreach($user->roles()->pluck('name') as $role){
                    $roleLabels .= "<span class='label label-info label-many'>".$role."</span> ";
                }
                return view('backend.user.include.roles', ['roleLabels' => $roleLabels]);
            })
            ->addColumn('action', function ($data) {
                return '<center>
                       <a href="javascript:;" onclick="edit(this)" data-id="'.$data->id.'"
                                           data-name="'.$data->name.'"
                                           data-email="'.$data->email.'"
                                           data-role="'.$data->role.'"

                                           class="mx-3"
                                           data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                            <i class="fas fa-user-edit text-secondary" aria-hidden="true"></i>
                                        </a>
                        <a onclick= "deleteItem('.$data->id.')" href="javascript:;"data-bs-toggle="tooltip" data-bs-original-title="Delete role"><i class="fas fa-trash text-danger" aria-hidden="true"></i></a>
                        </center>';
            })
            ->rawColumns(['roles','action'])
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = User::query();
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
            'email' => ['data' => 'email', 'name' => 'email'],
            'Role' => ['data' => 'roles', 'name' => 'roles'],

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


