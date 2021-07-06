<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Auth;
use DB; 
use Response;

class DetailController extends Controller
{
    public function viewIndex($id){
        $list_post = Post::find($id);
        $comment = Comment::where('posts_id',$id)->get();
        $list = DB::table('comments')->join('users','users.id','comments.users_id')->where('posts_id', $id)->select('comments.*','users.name')->get();
        return Response::json(array(
            'list_post' => $list_post,
            'list_comment' => $list
        ));
     
    }
}
