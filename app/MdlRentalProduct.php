<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdlRentalProduct extends Model
{
    protected $table = 'tbl_rental_products';

    protected $primaryKey = 'rp_id';
    
    protected $guarded = [];
}
