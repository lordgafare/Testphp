<?php

namespace App\Models;

use CodeIgniter\Model;

class NameModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'names';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true; // เปลี่ยนเป็น true เพื่อใช้ Soft Deletes
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'name_is_use']; // เพิ่ม 'deleted_at' ใน allowedFields

    // Dates
    protected $useTimestamps = true; // เปลี่ยนเป็น true เพื่อใช้ Timestamps
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = ['softDelete'];
    protected $afterDelete    = [];
    
    // Callback function for Soft Delete
    protected function softDelete(array $data)
    {
        if (array_key_exists('id', $data)) {
            $this->where('id', $data['id'])->set(['deleted_at' => date('Y-m-d H:i:s')])->update();
        }
    }
}
