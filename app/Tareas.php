<?php

namespace Task;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tareas extends Model
{
    use SoftDeletes;
    protected $table = 'tareas';

    protected $fillable = ['user_id', 'cliente_id', 'descripcion', 'fecha_tarea', 'tiempo'];

    protected $dates = ['deleted_at'];

    public function cliente(){
        return $this->belongsTo('Task\Clientes', 'cliente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario(){
        return $this->belongsTo('Task\User', 'user_id');
    }

}
