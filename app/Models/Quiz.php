<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'quiz_name',
        'quiz_category',
        'quiz_time',
        'quiz_status',
    ];
    public $timestamps = false;

    protected $primaryKey = 'quiz_id';

    public function category()
    {
        return $this->belongsTo(QuizCategory::class, 'quiz_category', 'quiz_category_id');
    }

    public function questions()
    {
    return $this->hasMany(Question::class,'question_quiz_id','quiz_id');
    }

    public function getQuizStatusAttribute()
    {
        if ($this->attributes['quiz_status'] == 1) {
            return 'فعال';
        }
        return 'غیرفعال';
    }

    public function getQuizTimeAttribute()
    {
        return $this->attributes['quiz_time'] . " دقیقه";
    }
}
