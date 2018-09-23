<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizStatistics extends Model
{
    protected $fillable = [
        'quiz_statistic_user_id',
        'quiz_statistic_quiz_id',
        'quiz_statistic_true_answers',
        'quiz_statistic_false_answers',
        'quiz_statistic_percent'
    ];
    public $timestamps = false;
    public $primaryKey = 'quiz_statistic_id';
}
