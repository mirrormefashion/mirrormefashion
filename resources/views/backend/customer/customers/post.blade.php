@extends('frontend.layouts.app')

@section('content')

<div class="col-sm-6 offset-sm-3 mt-5">


    <div class="panel panel-white post card">
     <div class="post-heading">

         <div class="pull-left image">
             <a href="{{ route('get-user-profile-page', $post->user->user_name) }}">
                 @if ($post->user->avatar == null || uploaded_asset($post->user->avatar) == '')
                     <img src="{{ asset('public/uploads/avatar.png') }}" alt="{{ $post->user->name }}"
                         class="img-responsive img-circle avatar">
                 @else
                     <img src="{{ uploaded_asset($post->user->avatar) }}" alt="{{ $post->user->name }}"
                         class="img-responsive img-circle avatar">
                 @endif
             </a>
         </div>
         <div class="pull-left meta">
             <div class="title h5">
                 <a
                     href="{{ route('get-user-profile-page', $post->user->user_name) }}"><b>{{ $post->user->name }}</b></a>

             </div>

             <h6 class="text-muted time">{{ $post->created_at->diffForHumans() }}</h6>
         </div>
         <div class="dropdown float-right">
             <button class="btn" type="button" id="gedf-drop1" data-toggle="dropdown">
                 <i class="fa fa-ellipsis-h"></i>
             </button>
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                 <div class="h6 dropdown-header"></div>
                 <a class="dropdown-item" data-toggle="modal" data-target="#reportPostModal" id="reportPost"
                     post_id="{{ $post->id }}" href="#">Report Post</a>


             </div>
         </div>
     </div>

     @if ($post->media != null)
         <div class="post-image">

             @if (uploaded_asset($post->media) != '')
                 <img src="{{ uploaded_asset($post->media) }}" class="image" alt="image post">
             @endif
         </div>
     @endif

     <div class="post-description">

         <p>{{ $post->body }}</p>
         <div class="stats">
             <a href="javascript:void(0)" onclick = postLike({{$post->id}})><i class="fa fa-thumbs-up"></i>@php
                 $likes_count = App\Models\Like::where('post_id', $post->id)->get();
             @endphp
               <span id="postLikeCount-{{$post->id}}">{{ $likes_count->count() }}</span>
             </a>

         </div>
     </div>
     <div class="post-footer">
         <form method="post" action="{{ route('comment.add') }}">
             @csrf
             <div class="form-group">
                 <input type="text" name="comment" class="form-control rounded-30 bg-light" />
                 <input type="hidden" name="post_id" value="{{ $post->id }}" />
             </div>
             <div class="form-group">
                 <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;"
                     value="Add Comment" />
             </div>
         </form>

         @foreach ($post->comments as $comment)
             <div class="display-comment">

                 <a href="{{ route('get-user-profile-page', $post->user->user_name) }}">
                     @if ($post->user->avatar == null || uploaded_asset($post->user->avatar) == '')
                         <img src="{{ asset('public/uploads/avatar.png') }}" alt="{{ $post->user->name }}"
                             class="img-responsive img-circle comment-avatar">
                     @else
                         <img src="{{ uploaded_asset($post->user->avatar) }}" alt="{{ $post->user->name }}"
                             class="img-responsive img-circle comment-avatar">
                     @endif
                     <strong>{{ $comment->user->name }}</strong>
                 </a>
                 <div class="dropdown float-right">
                     <button class="btn" type="button" id="gedf-drop1" data-toggle="dropdown">
                         <i class="fa fa-ellipsis-h"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                         <div class="h6 dropdown-header"></div>
                         <a class="dropdown-item" id="deleteComment"
                             href="{{ route('comment.destroy', $comment->id) }}">Delete</a>


                     </div>
                 </div>
                 <p class="comment-text">{{ $comment->comment }}</p>
                 <a href="" id="reply"></a>
                 <form method="post" action="{{ route('comment-reply.add') }}">
                     @csrf

                     <div class="text-xs flex items-center space-x-3 ml-3">
                         @php
                             $likes_count = App\Models\CommentLike::where('comment_id', $comment->id)
                                 ->get()
                                 ->count();
                         @endphp
                         <a href="javascript:void(0)" onclick="commentLike({{$comment->id}})" class="text-red-600"> <i
                                 class="fa fa-heart"></i> Love <span id="commentLikeCount-{{$comment->id}}">({{ $likes_count }})</span> </a>
                         <a href="javascript:void(0)" id="commentReplyBtn{{ $comment->id }}"
                             onclick="commentBtn({{ $comment->id }})"> Replay </a>
                         <span> {{ $comment->created_at->diffForhumans() }} </span>
                     </div>
                     <div class="comment-input-wrapper"
                         style="  opacity:0; height:0px; transition: all 0.5s linear; visibility:hidden;"
                         id="reply{{ $comment->id }}">
                         <div class="form-group ml-2">
                             <input type="text" name="comment" class="form-control rounded-30 bg-light" />
                             <input type="hidden" name="post_id" value="{{ $post->id }}" />
                             <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                         </div>
                         <div class="form-group">
                             <input type="submit" class="btn btn-sm btn-outline-danger py-0"
                                 style="font-size: 0.8em;" value="Add Comment" />
                         </div>
                     </div>
                 </form>
                 <div class="comment-replay ml-5 mt-2">
                     @foreach ($comment->replies as $comment)
                         <a href="{{ route('get-user-profile-page', $post->user->user_name) }}">
                             @if ($post->user->avatar == null || uploaded_asset($post->user->avatar) == '')
                                 <img src="{{ asset('public/uploads/avatar.png') }}"
                                     alt="{{ $post->user->name }}"
                                     class="img-responsive img-circle comment-avatar">
                             @else
                                 <img src="{{ uploaded_asset($post->user->avatar) }}"
                                     alt="{{ $post->user->name }}"
                                     class="img-responsive img-circle comment-avatar">
                             @endif
                             <strong>{{ $comment->user->name }}</strong>

                         </a>
                         <div class="dropdown float-right">
                             <button class="btn" type="button" id="gedf-drop1"
                                 data-toggle="dropdown">
                                 <i class="fa fa-ellipsis-h"></i>
                             </button>
                             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                 <div class="h6 dropdown-header"></div>
                                 @if (auth()->user()->id == $comment->user_id)
                                     <a class="dropdown-item" id="deleteComment"
                                         href="{{ route('comment.destroy', $comment->id) }}">Delete</a>
                                 @endif


                             </div>
                         </div>
                         <p class="comment-text">{{ $comment->comment }}</p>
                         <a href="" id="reply"></a>
                         <form method="post" action="{{ route('comment-reply.add') }}">
                             @csrf
                             <div class="form-group ml-2 d-none" id="ReplyInputBox">
                                 <input type="text" name="comment" class="form-control" />
                                 <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                 <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                             </div>
                             <div class="text-xs flex items-center space-x-3">

                                 @php
                                     $likes_count = App\Models\CommentLike::where('comment_id', $comment->id)
                                         ->get()
                                         ->count();
                                 @endphp
                                 <a href="javascript:void(0)" onclick="commentLike({{$comment->id}})" id="commentLike" class="text-red-600">
                                     <i class="fa fa-heart"></i> Love <span id="commentLikeCount-{$comment->id}}">({{ $likes_count }})</span> </a>
                                 <span> {{ $comment->created_at->diffForhumans() }} </span>
                             </div>
                         </form>
                     @endforeach
                 </div>
             </div>
         @endforeach
     </div>
 </div>


 </div>




@endsection

@section('script')
<script>
    // Comment Like by ajax
    function commentLike(id){

var   commentLikeCount = '#commentLikeCount-'+id;

     let _token   = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
    url: "{{route('comment.like')}}",
    type:"POST",
    data:{
      id:id,
      _token: _token
    },
    success:function(response){
        console.log(response)
      $(commentLikeCount).html(response);

    },
    error: function(error) {
     console.log(error);
    }
   });

}
// Post Like by ajax
function postLike(id){

var   postLikeCount = '#postLikeCount-'+id;

let _token   = $('meta[name="csrf-token"]').attr('content');
$.ajax({
url: "{{route('post.like')}}",
type:"POST",
data:{
id:id,
_token: _token
},
success:function(response){
  console.log(response)
$(postLikeCount).html(response);

},
error: function(error) {
console.log(error);
}
});

}
</script>
@endsection
