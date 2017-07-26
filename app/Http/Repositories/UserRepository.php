<?php
/**
 * @author CaoQingSong<caoqingsong@wepiao.com>
 * @date 2017-07-25 17:44
 */

namespace App\Http\Repositories;

use App\User;


class UserRepository extends Repository
{

    public function model()
    {
        return app(User::class);
    }
    
    public function get($name)
    {
        return [$name];
    }

}