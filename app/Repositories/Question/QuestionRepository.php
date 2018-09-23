<?php
/**
 * Created by PhpStorm.
 * User: Mohsen
 * Date: 8/26/2018
 * Time: 12:11 AM
 */

namespace App\Repositories\Question;


use App\Models\Question;
use App\Repositories\Contract\BaseRepository;

class QuestionRepository extends BaseRepository
{
    protected $model = Question::class;
}