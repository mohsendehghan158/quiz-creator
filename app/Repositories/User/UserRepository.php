<?php
/**
 * Created by PhpStorm.
 * User: Mohsen
 * Date: 8/24/2018
 * Time: 6:57 PM
 */

namespace App\Repositories\User;


use App\Repositories\Contract\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository
{
    protected $model = User::class;
}