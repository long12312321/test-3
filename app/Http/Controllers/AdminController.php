<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Http\Resources\ListBlog;
use App\Http\Resources\ListUser;
use App\Http\Resources\ListComment;
use App\Http\Requests\addUserRequest;
use App\Http\Requests\addPostRequest;
use App\Http\Requests\addCommentRequest;
use App\Http\Requests\EditUser;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\EditCommentRequest;

use DB;

class AdminController extends Controller
{
    public function getBlog(Request $request){
        $data =  DB::table('posts')->paginate(2);
        return ListBlog::collection($data);

    }
    public function addPost(addPostRequest $request){
        $post = new Post;
        $post->title = $request->input("title");
        $post->short_des =  $request->input("short");
        $post->description= $request->input("description");
        $post->image= $request->input("image");

        $post->save();
       
        $post =  Post::get();
        return ListBlog::collection($post);
    }
     public function deletePost(Request $request){
       
        $post = Post::find($request->id)->delete();
       
        $post =  DB::table('posts')->paginate(2);
        return ListBlog::collection($post);

    }
    public function getEditPost(Request $request,$id ){
        $post = Post::where('id', $id)->get();
     
         return ListBlog::collection($post);
     
    }
    public function editPost(EditPostRequest $request,$id ){
       
        $post =Post::find($id);
        $post->id = $id;
        $post->title = $request->input('title');
        $post->short_des = $request->input('short_des');
         $post->description = $request->input('description');
         $post->image = $request->input('image');
        $post ->save();
      

    }
    // ADmin user
    
    public function getUser(Request $request){
        $user =  DB::table('users')->paginate(2);
        return ListUser::collection($user);

    }
    public function addUser(addUserRequest $request){
       
        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name= $request->name;
        $user->save();
       
        $user =  User::get();
        return ListUser::collection($user);

        

    }
  
    public function deleteUser(Request $request){
       
        $user = User::find($request->id)->delete();
       
       
        $user =  User::get();
        return ListUser::collection($user);

    }
    public function getEditUser(Request $request,$id ){
        $user = User::where('id', $id)->get();
     
         return ListUser::collection($user);
     
    }
    public function editUser(EditUser $request,$id ){
       
        $user =User::find($id);
        $user->id = $id;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
         $user->password = bcrypt($request->input('password'));
         $user->role = $request->input('role');
        $user ->save();
       

    }
    // Admin Comment
    public function getComment(Request $request){
        $data =  DB::table('comments')->paginate(2);
        return ListComment::collection($data);

    }
    public function addComment(addCommentRequest $request){
        $comment = new Comment;
        $comment->users_id = $request->input("user_id");
        $comment->posts_id =  $request->input("post_id");
        $comment->content= $request->input("content");

        $comment->save();
       
        $comment =  Comment::get();
        return ListComment::collection($comment);
    }
     public function deleteComment(Request $request){
       
        $comment = Comment::find($request->id)->delete();
       
        $comment =  DB::table('comments')->paginate(2);
        return ListComment::collection($comment);

    }
    public function getEditComment(Request $request,$id ){
        $comment = Comment::where('id', $id)->get();
     
         return ListComment::collection($comment);
     
    }
    public function editComment(EditCommentRequest $request,$id ){
       
        $comment = Comment::find($id);
        $comment->id = $id;
        $comment->users_id = $request->input('user_id');
        $comment->posts_id = $request->input('post_id');
         $comment->content = $request->input('content');
        $comment ->save();

    }

   
}
