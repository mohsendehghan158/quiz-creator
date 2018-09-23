<?php
/**
 * Created by PhpStorm.
 * User: Mohsen
 * Date: 9/2/2018
 * Time: 12:05 PM
 */

namespace App\Repositories\Option;


use App\Models\Option;
use App\Repositories\Contract\BaseRepository;

class OptionRepository extends BaseRepository
{
    protected $model = Option::class;
}