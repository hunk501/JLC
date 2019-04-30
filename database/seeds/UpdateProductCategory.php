<?php

use App\MdlProductCategory;
use Illuminate\Database\Seeder;

class UpdateProductCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $lists = [
            'Services',
            'Projects'
        ];

        foreach($lists as $list) {
            $cp = new MdlProductCategory;
            $cp->name = $list;
            $cp->page_type = strtolower($list);
            $cp->save();
        }
        
    }
}
