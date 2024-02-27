<?php

namespace App\Models;

use CodeIgniter\Model;

class GenderModel extends Model

{
    protected $table='gender';
    protected $primaryKey='gender_id';
    protected $allowedFields= ['gender'];
    
    protected $returnType='object'
}