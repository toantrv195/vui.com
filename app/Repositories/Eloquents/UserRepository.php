<?php

namespace App\Repositories\Eloquents;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\BaseRepositoryInterface;
use App\User;

class UserRepository extends BaseRepository implements BaseRepositoryInterface
{
    function model()
    {
        return 'App\User';
    }
}
