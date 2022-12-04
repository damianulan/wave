<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UUID;
use App\Models\User;
use App\Models\Client;

class Task extends Model
{
    use UUID;
    use HasFactory, SoftDeletes;

    protected $table = 'tasks';
    protected $primaryKey = 'id';

    public $timestamps = true;
    
    protected $fillable = [
        'title',
        'message',
        'priority',
        'target_id',
        'affiliated_client_id',
        'author_id',
        'deadline_at',
        'completed_at',
    ];

    protected $dates = ['deleted_at', 'updated_at', 'created_at', 'deadline_at', 'completed_at'];

    public function priority() 
    {
        return __('modules.priority_'.$this->priority);
    }

    public function priority_class()
    {
        if($this->priority == 0 || $this->priority == 1){
            return '';
        }
        if($this->priority == 2){
            return 'text-warning ';
        }
        if($this->priority == 3){
            return 'text-danger ';
        }

        return null;
    }

    public function author() {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function target() {
        return $this->belongsTo(User::class, 'target_id', 'id');
    }

    public function client() {
        return $this->belongsTo(Client::class, 'affiliated_client_id', 'id');
    }
}
