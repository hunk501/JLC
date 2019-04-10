<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdlCart extends Model
{
    protected $table = 'tbl_cart';

    protected $primaryKey = 'transaction_id';
    
    protected $guarded = [];

    public function getUser() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function getProduct() {
        return $this->hasOne('App\MdlRentalProduct', 'rp_id', 'rp_idfk');
    }
}
