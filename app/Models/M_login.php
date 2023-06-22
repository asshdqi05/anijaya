<?php

namespace App\Models;

use CodeIgniter\Model;

class M_login extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['id', 'nama_user', 'username', 'password', 'level'];
}
