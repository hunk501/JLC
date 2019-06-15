<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdlRequestQuote extends Model
{
    protected $table = 'tbl_request_quote';

    protected $primaryKey = 'id';
    
    protected $guarded = [];

    public function getProduct() {
        return $this->hasOne('App\MdlProduct', 'p_id', 'service_id');
    }

    public function product_category() {
        return $this->belongsTo('App\MdlProduct', 'p_id', 'service_id');
    }
}
