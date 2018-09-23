<?php
/**
 * Created by PhpStorm.
 * User: Mohsen
 * Date: 9/13/2018
 * Time: 11:21 AM
 */

namespace App\Repositories\Quiz;


use App\Repositories\Contract\BaseRepository;

class QuizStatisticsRepository extends BaseRepository
{
    protected $model = \App\Models\QuizStatistics::class;
}