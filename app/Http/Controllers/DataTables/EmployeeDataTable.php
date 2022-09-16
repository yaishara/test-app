<?php

namespace App\Http\Controllers\DataTables;

use App\Models\Employee;
use Yajra\DataTables\Services\DataTable;

class EmployeeDataTable extends DataTable
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
            ->addColumn('imageView', function ($data) {
                return '<img src="' . $data->getMedia('images')->first() . '" alt="" width="100" height=" " > ';
            })
            ->addColumn('action', function ($data) {
                return '<center>
                       <a href="javascript:;" onclick="edit(this)" data-id="' . $data->id . '"
                                           data-first_name="' . $data->first_name . '"
                                           data-last_name="' . $data->last_name . '"
                                           data-email="' . $data->email . '"
                                           data-phone="' . $data->phone . '"
                                           data-company_id="' . $data->company_id . '"
                                           class="mx-3"
                                           data-bs-toggle="tooltip" data-bs-original-title="Edit Employee">
                                            <i class="fas fa-user-edit text-secondary" aria-hidden="true"></i>
                                        </a>
                        <a onclick= "deleteItem(' . $data->id . ')" href="javascript:;"data-bs-toggle="tooltip" data-bs-original-title="Delete role"><i class="fas fa-trash text-danger" aria-hidden="true"></i></a>
                        </center>';
            })
            ->rawColumns(['imageView', 'action'])
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Employee::with('company');

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
//            'Image' => ['data' => 'imageView', 'name' => 'imageView'],
            'Company' => ['data' => 'company.name', 'name' => 'company.name'],
            'First Name' => ['data' => 'first_name', 'name' => 'first_name'],
            'Last Name' => ['data' => 'last_name', 'name' => 'first_name'],
            'email' => ['data' => 'email', 'name' => 'email'],
            'telephone' => ['data' => 'phone', 'name' => 'phone'],

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


