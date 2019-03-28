<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MdlProductCategory extends Model
{
    protected $table = 'tbl_product_category';

    protected $primaryKey = 'pc_id';

    protected $guarded = [];

}
