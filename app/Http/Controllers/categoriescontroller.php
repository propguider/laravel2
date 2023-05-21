<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class categoriescontroller extends Controller
{
    public function category()
    {
        $category = category::find(2);
        $item = $category->items;
         return$item;

    }
}
