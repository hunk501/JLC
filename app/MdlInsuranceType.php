<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdlInsuranceType extends Model
{
    protected $table = "tbl_insurance_type";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'insurance_type', 'net_rate', 'bipd', 'other', 'tax'
    // ];

    protected $guarded = [];

    public function getInsurance() {
        return $this->belongsTo('App\MdlInsurance', 'insurance_id_fk', 'id');
    }
}
