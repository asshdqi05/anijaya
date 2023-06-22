<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['id', 'nama_user', 'username', 'password', 'level'];

    public function getAll()
    {
        $builder = $this->db->table('user');
        $builder->select('*,user.id as id_user,level_user.level as nama_level,user.level as lvl');
        $builder->join('level_user', 'level_user.id=user.level', 'left');
        return $builder->get();
    }

    public function saveUser($data)
    {
        $query = $this->db->table('user')->insert($data);
        return $query;
    }

    public function editUser($data, $id)
    {
        $query = $this->db->table('user')->update($data, array('id' => $id));
        return $query;
    }
    public function deleteUser($id)
    {
        $query = $this->db->table('user')->delete(array('id' => $id));
        return $query;
    }
    public function getLevel()
    {
        $bulder = $this->db->table('level_user');
        return $bulder->get();
    }
}
