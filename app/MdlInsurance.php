<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdlInsurance extends Model
{
    protected $table = "tbl_insurance";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'image_url'
    ];

    protected $guarded = [];

    public function getInsuranceType() {
        return $this->hasMany('App\MdlInsuranceType', 'insurance_id_fk');
    }
}
