<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldsBrand extends Model
{
    use HasFactory;
    protected $table = 'jl_fields_brand';
    protected $primaryKey = 'id_field_brand';
    public $dates = ["created_at", "updated_at"];
    protected $guarded = [];

}
