<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;
    protected $fillable =['name','guard_name','permission_group_id'];

    function group() {
        return $this->belongsTo(PermissionGroup::class,'permission_group_id');
    }
}
