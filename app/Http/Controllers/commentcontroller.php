<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\poster;
use App\Models\video;
use App\Models\commenter;


class commentcontroller extends Controller
{
    public function comment()
    {
      $post = poster::find(1);
      $comment  = new commenter;
      $comment->body = 'hi this is a good poster';
      $post->commenters()->save($comment);

$video = video::find(1);
$comment = new commenter;
$comment->body = "hi this video is nice";
$video->commenters()->save($comment);
return 'post and video comment created!';

    }
}
