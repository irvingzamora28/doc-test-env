<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfBrands extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'jl_conf_brands';
    protected $primaryKey = 'id_conf_brand';
    protected $fillable = [
        'id_brand',
        'commission_type',
        'amount',
        'mp_token',
        'mp_collector_id',
        'commission_brand_type',
        'amount_commission_brand',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'mp_token',
        'mp_collector_id',
    ];

}
