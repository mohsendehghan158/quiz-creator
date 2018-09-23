<?php
/**
 * Created by PhpStorm.
 * User: Mohsen
 * Date: 9/6/2018
 * Time: 7:04 PM
 */

namespace App\Repositories\Admin;


use App\Models\Admin;
use App\Repositories\Contract\BaseRepository;

class AdminRepository extends BaseRepository
{
    protected $model = Admin::class;
}