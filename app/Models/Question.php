<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question_content',
        'question_point',
        'question_quiz_id',
    ];
    public $timestamps = false;
    public $primaryKey = 'question_id';

    public function quiz()
    {
        return $this->belongsTo(Quiz::class,'question_quiz_id','question_id');
    }

    public function options()
    {
        return $this->hasMany(Option::class,'option_question_id','question_id');
    }
}
