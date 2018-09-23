<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizCategory extends Model
{
    protected $fillable = ['quiz_category_name'];
    protected $table = 'quiz_category';
    public $primaryKey = 'quiz_category_id';
    public $timestamps = false;

    public function quizzes()
    {
        return $this->hasMany(Quiz::class,'quiz_category_id','quiz_category');
    }
}
