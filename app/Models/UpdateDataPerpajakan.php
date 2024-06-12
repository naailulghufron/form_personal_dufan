<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateDataPerpajakan extends Model
{
    use HasFactory;
    protected $table = 'update_data_perpajakan';
    protected $fillable = ['nik', 'name', 'npwp_15', 'npwp_16', 'file_npwp', 'is_active'];
}
