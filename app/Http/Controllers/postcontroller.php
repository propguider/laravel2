<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class postcontroller extends Controller
{
  public function post()
  {
   $post = post::find(2)->comments;
   return$post;
  }
}
