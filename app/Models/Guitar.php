<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guitar extends Model
{
    use HasFactory;

    protected $table = 'guitar_list';

    protected $primaryKey = 'id_list';

    protected $fillable = [
        'id_list', 
        'name', 
        'description', 
        'image_url', 
        'brand', 
        'price'
    ];

    public function types()
    {
        return $this->hasOne(Types::class, 'id_type', 'id_list');
    }
    
}
