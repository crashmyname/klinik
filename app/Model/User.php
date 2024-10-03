<?php

namespace App\Model;
use Support\BaseModel;

class User extends BaseModel
{
    // Model logic here
    public $table = 'tb_user';
    protected $primaryKey = 'user_id';
}
