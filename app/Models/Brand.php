<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'jl_brands';
    protected $primaryKey = 'id_brand';
    protected $fillable = [
        'name',
        'site',
        'description',
        'id_country',
        'logo',
        'log',
        'email_contact',
        'phone_contact',
        'name_contact',
        'lastname_contact',
        'status'
    ];


    public static function getBrands($tc = 'R') {
        return Brand::where('status', 'A')->get();
    }

    /**
     * Get the fieldsBrand for the brand.
     */
    public function fieldsBrand()
    {
        return $this->hasMany(FieldsBrand::class, "id_brand");
    }

    /**
     * Get the config of a brand
     */
    public function confs()
    {
        return $this->hasOne(ConfBrands::class, 'id_brand');
    }
}
