<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Role extends Model
{
    use UUID;
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id';

    public $timestamps = true;
    
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }
}
