<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Permission extends Model
{
    use UUID;
    use HasFactory;

    protected $table = 'permissions';
    protected $primaryKey = 'id';

    public $timestamps = true;
    
    public function roles()
    {
        return $this->belongsToMany(Role::class,'roles_permissions');
    }
}
