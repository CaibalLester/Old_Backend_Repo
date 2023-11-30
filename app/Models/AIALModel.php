<?php

namespace App\Models;

use CodeIgniter\Model;

class AIALModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'aial';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
      'nonlife',
  'life',
  'varlife',
  'accaAndHealth',
  'othercb',
  'othertb',
  'agencyname',
  'fname',
  'nickname',
  'birthdate',
  'placeOfBirth',
  'gender',
  'bloodType',
  'homeAddress',
  'mobileNo',
  'landline',
  'email',
  'citizenship',
  'othersCitizenship',
  'naturalizationInfo',
  'maritalStatus',
  'maidenName',
  'spouseName',
  'sssNo',
  'tin',

  
    ];

    // Dates
    protected $useTimestamps = false;
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
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
