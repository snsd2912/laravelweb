<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    use HasFactory;

    protected $table = 'submit';
    protected $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'filename',
        'teacher_id',
        'assignment_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'teacher_id');
    }

    public function assignment()
    {
        return $this->belongsTo('App\Models\User', 'assignment_id');
    }

}
