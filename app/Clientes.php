<?php

namespace Task;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{
    use SoftDeletes;
    protected $table = 'clientes';

    protected $fillable = ['name'];

    protected $dates = ['deleted_at'];

    public function tareas(){
        return $this->hasMany('Task\Tareas', 'id');
    }
}
