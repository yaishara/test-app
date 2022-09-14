<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory, SoftDeletes,HasRoles;

    protected $fillable = ['name', 'guard_name'];
}
