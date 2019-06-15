<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdlProduct extends Model
{
    protected $table = 'tbl_product';

    protected $primaryKey = 'p_id';
    
    protected $guarded = [];

    public function category() {
        return $this->hasOne('App\MdlProductCategory', 'pc_id', 'pc_idfk');
    }
}
