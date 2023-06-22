<?php

namespace App\Models;

use CodeIgniter\Model;

class M_login_pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $allowedFields = ['id', 'nama_pelanggan', 'alamat', 'nohp', 'email', 'username', 'password'];
}
