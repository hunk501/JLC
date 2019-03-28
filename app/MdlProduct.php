<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdlProduct extends Model
{
    protected $table = 'tbl_product';

    protected $primaryKey = 'p_id';
    
    protected $guarded = [];
        
}
