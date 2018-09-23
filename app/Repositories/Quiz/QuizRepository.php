<?php
/**
 * Created by PhpStorm.
 * User: Mohsen
 * Date: 8/25/2018
 * Time: 12:05 AM
 */

namespace App\Repositories\Quiz;



use App\Models\Quiz;
use App\Repositories\Contract\BaseRepository;

class QuizRepository extends BaseRepository
{
    protected $model = Quiz::class;
}