<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'message';
    protected $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'content',
        'student_id',
        'teacher_id',
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\User', 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'teacher_id');
    }
}
