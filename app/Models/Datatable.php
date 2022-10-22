<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datatable extends Model
{
    use UUID, HasFactory;

    protected $table = 'datatables';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'users',
        'clients',
        'products',
        'todo',
    ];
}
