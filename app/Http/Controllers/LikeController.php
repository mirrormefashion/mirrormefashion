<?php

namespace App\Http\Controllers;

use App\Http\Resources\LikeCollection;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
      $is_liked=0;
      //If Like type == like than it will be exicute
        if($request->likeType=='like'){

        $post = Post::find($request->id);
       $count = $post->likes()->where('user_id',auth()->user()->id)->where('type','like')->count();

        if($count==0){
         $is_liked=1;
            $like = new Like();
            $like->post_id = $request->id;
            $like->user_id = auth()->user()->id;
            $like->type = 'like';
            $like->save();
        }else{
           Like::where('user_id',auth()->user()->id)->where('type','like')->where('post_id',$request->id)->first()->delete();
        }
        $post_like_count = Like::where('post_id', $post->id)->where('type','like')->get()->count();
       }
     //If Like type == Love than it will be exicute

     if($request->likeType=='love'){

        $post = Post::find($request->id);
       $count = $post->likes()->where('user_id',auth()->user()->id)->where('type','love')->count();

        if($count==0){
         $is_liked=1;
            $like = new Like();
            $like->post_id = $request->id;
            $like->user_id = auth()->user()->id;
            $like->type = 'love';
            $like->save();
        }else{
           Like::where('user_id',auth()->user()->id)->where('type','love')->where('post_id',$request->id)->first()->delete();
        }
       $post_like_count = Like::where('post_id', $post->id)->where('type','love')->get()->count();
       }

//If Like type == Flag than it will be exicute
       if($request->likeType=='flag'){

        $post = Post::find($request->id);
       $count = $post->likes()->where('user_id',auth()->user()->id)->where('type','flag')->count();

        if($count==0){
         $is_liked=1;
            $like = new Like();
            $like->post_id = $request->id;
            $like->user_id = auth()->user()->id;
            $like->type = 'flag';
            $like->save();
        }else{
           Like::where('user_id',auth()->user()->id)->where('type','flag')->where('post_id',$request->id)->first()->delete();
        }
       $post_like_count = Like::where('post_id', $post->id)->where('type','flag')->get()->count();
       }
            // Return like count
       return response()->json(['count'=>$post_like_count,'is_liked'=> $is_liked]);
    }

    public function comment_like(Request $request){
         //If Like type == like than it will be exicute
         $is_liked=0;
         if($request->likeType=='like'){

            $comment = Comment::find($request->id);
           $count = $comment->likes()->where('user_id',auth()->user()->id)->where('type','like')->count();

            if($count==0){
               $is_liked=1;
                $like = new CommentLike();
                $like->comment_id = $request->id;
                $like->user_id = auth()->user()->id;
                $like->type = 'like';
                $like->save();
            }else{
               CommentLike::where('user_id',auth()->user()->id)->where('type','like')->where('comment_id',$request->id)->first()->delete();
            }
            $comment_like_count = CommentLike::where('comment_id', $comment->id)->where('type','like')->get()->count();
           }
         //If Like type == Love than it will be exicute

         if($request->likeType=='love'){

            $comment = Comment::find($request->id);
           $count = $comment->likes()->where('user_id',auth()->user()->id)->where('type','love')->count();

            if($count==0){
               $is_liked=1;
                $like = new CommentLike();
                $like->comment_id = $request->id;
                $like->user_id = auth()->user()->id;
                $like->type = 'love';
                $like->save();
            }else{
               CommentLike::where('user_id',auth()->user()->id)->where('type','love')->where('comment_id',$request->id)->first()->delete();
            }
           $comment_like_count = CommentLike::where('comment_id', $comment->id)->where('type','love')->get()->count();
           }

    //If Like type == Flag than it will be exicute
           if($request->likeType=='flag'){

            $comment = Comment::find($request->id);
           $count = $comment->likes()->where('user_id',auth()->user()->id)->where('type','flag')->count();

            if($count==0){
               $is_liked=1;
                $like = new CommentLike();
                $like->comment_id = $request->id;
                $like->user_id = auth()->user()->id;
                $like->type = 'flag';
                $like->save();
            }else{
               CommentLike::where('user_id',auth()->user()->id)->where('type','flag')->where('comment_id',$request->id)->first()->delete();
            }
           $comment_like_count = CommentLike::where('comment_id', $comment->id)->where('type','flag')->get()->count();
           }
                // Return like count
           return response()->json(['count'=>$comment_like_count,'is_liked'=> $is_liked]);
     }

}
