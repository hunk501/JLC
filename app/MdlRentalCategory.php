<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdlRentalCategory extends Model
{
    protected $table = 'tbl_rental_category';

    protected $primaryKey = 'rc_id';
    
    protected $guarded = [];


    public function getProducts() {
        return $this->hasMany('App\MdlRentalProduct', 'rc_idfk', 'rc_id');
    }
}
