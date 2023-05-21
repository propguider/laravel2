<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use App\Models\view;
use App\Models\send;
use App\Models\tag;


class tagcontroller extends Controller
{
    public function tag()
     {
        //   $send = send::find(1);
        //  $tag = new tag;
        //    $tag->name = 'php tutorial';
        //  $tag->save;
        //    $send->tags()->save($tag);
        //   return 'send created successfully';
    //    $send = send::find(1);
    //    dd($send);

          $view = view::find(1);
          $tag = tag::find(4);
          $view->tags()->save($tag);
          return ' view tag created!';



    //    $view = view::find(1);
    //     dd($view);
    }
}
