<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;

    protected $table = 'guitar_types';
    protected $primaryKey = 'id_type';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_type',
        'type_name',
        'type_description',
    ];

    public function guitar()
    {
        return $this->belongsTo(Guitar::class, 'id_type', 'id_list');
    }    
}
