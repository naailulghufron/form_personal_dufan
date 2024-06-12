<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKeluarga extends Model
{
    use HasFactory;

    protected $table = 'detail_keluargas';

    protected $fillable = [
        'form_id',
        'relation',
        'fullname',
        'no_dufan_card',
        'file_dufan_card',
    ];
}
