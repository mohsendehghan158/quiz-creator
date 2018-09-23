<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'option_question_id',
        'option_content',
        'option_is_true',
    ];
    public $timestamps = false;
    protected $primaryKey = 'option_id';

    public function question()
    {
        return $this->belongsTo(Question::class,'question_id','option_id');
    }
}
