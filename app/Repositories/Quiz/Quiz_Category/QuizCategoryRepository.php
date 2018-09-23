<?php
/**
 * Created by PhpStorm.
 * User: Mohsen
 * Date: 8/25/2018
 * Time: 12:26 AM
 */

namespace App\Repositories\Quiz\Quiz_Category;


use App\Models\QuizCategory;
use App\Repositories\Contract\BaseRepository;

class QuizCategoryRepository extends BaseRepository
{
    protected $model = QuizCategory::class;
}