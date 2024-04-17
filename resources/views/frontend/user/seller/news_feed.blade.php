
@extends('frontend.layouts.user_panel')

@section('panel_content')
<div class="row">
    <div class="col-md-8 order-2 order-md-1">
        <div class="newsfeed-left mt-4">
            <div class="well well-sm well-social-post mb-5">
              
                    <form action="{{ route('create-post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul class="list-inline" id='list_PostActions'>
                            <li>
                                <div class="">{{ translate('Add image or Video') }}</div>
                                <input type="file" id="FileUploadFeed" name="aiz_file" style="display: none" />
                                <div class="margin-top-10"> <a href="#" class="btn btn-link profile-btn-link"
                                        onclick="imgFileUpload('#feedPriviewImg','FileUploadFeed')" data-toggle="tooltip"
                                        data-placement="bottom" title=""><i class="fa fa-camera"></i></a>
                                    <span id="feedPriviewImg" style="height: 70px;"></span>
                                </div>
                            </li>
                        </ul>
                        <input type="hidden" value="media" name="post_type">
                        <textarea class="form-control" placeholder="What's in your mind?" name="body"></textarea>
                        <ul class='list-inline post-actions '>
                            <li class='text-right'><button type="submit" class='btn btn-primary btn-xs'>Post</button>
                            </li>
                        </ul>
                    </form>
                
            </div>
            <div class="feed-post">
                @if ($feeds->count() > 0)
                    @foreach ($feeds as $post)
                        <div class="panel panel-white post card">
                            <div class="post-heading">

                                <div class="pull-left image">
                                    <a href="{{ route('get-user-profile-page', $post->user->user_name) }}">
                                        @if ($post->user->avatar == null || uploaded_asset($post->user->avatar) == '')
                                            <img src="{{ asset('public/uploads/avatar.png') }}"
                                                alt="{{ $post->user->name }}" class="img-responsive img-circle avatar">
                                        @else
                                            <img src="{{ uploaded_asset($post->user->avatar) }}"
                                                alt="{{ $post->user->name }}" class="img-responsive img-circle avatar">
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
                                @if ($post->user->id == auth()->user()->id)
                                    <div class="dropdown float-right">
                                        <button class="btn" type="button" id="gedf-drop1" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                            <div class="h6 dropdown-header"></div>
                                            <a class="dropdown-item" onclick="return confirm('Are you sure to delete this?')" href="{{ route('remove-post', $post->id) }}">Delete</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if ($post->media != null)
                                
                                    @if (uploaded_asset($post->media) != '' && is_video($post->media))
                                    <video controls="controls">
                                        <source src=" {{uploaded_asset($post->media) }}" type="video/mp4">
                                        <source src="{{ uploaded_asset($post->media) }}" type="video/ogg">
                                        Your browser does not support the HTML5 Video element.
                                    </video>
                                   @elseif(uploaded_asset($post->media) != '')
                                   <img src="{{ uploaded_asset($post->media) }}" class="image"
                                   alt="image post">
                                   @endif
                                
                            @endif
                            <div class="post-description">
                                <p>{{ $post->body }}</p>
                                <div class="stats">
                                    @php
                                        $likes_count = App\Models\Like::where('post_id', $post->id)
                                            ->where('type', 'like')
                                            ->get();
                                    @endphp
                                    <a href="javascript:void(0)" onclick=postLike({{ $post->id }},'postLike','like')>
                                        <i class="fa fa-thumbs-up"></i>
                                        <span id="postLikePost-{{ $post->id }}">{{ $likes_count->count() }}</span>
                                    </a>
                                    @php
                                        $love_count = App\Models\Like::where('post_id', $post->id)
                                            ->where('type', 'love')
                                            ->get();
                                    @endphp
                                    <a href="javascript:void(0)" onclick=postLike({{ $post->id }},'postLove','love')>
                                        <i class="fa fa-heart"></i>
                                        <span id="postLovePost-{{ $post->id }}">{{ $love_count->count() }}</span>
                                    </a>
                                    <a href="javascript:void(0)" onclick=postLike({{ $post->id }},'postFlag','flag')>
                                        <i class="fa fa-flag"></i>
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
                                        <input type="submit" class="btn btn-sm btn-outline-danger py-0"
                                            style="font-size: 0.8em;" value="Add Comment" />
                                    </div>
                                </form>
                                @foreach ($post->comments as $comment)
                                    <div class="display-comment">
                                        <a href="{{ route('get-user-profile-page', $comment->user->user_name) }}">
                                            @if ($comment->user->avatar == null || uploaded_asset($comment->user->avatar) == '')
                                                <img src="{{ asset('public/uploads/avatar.png') }}"
                                                    alt="{{ $post->user->name }}"
                                                    class="img-responsive img-circle comment-avatar">
                                            @else
                                                <img src="{{ uploaded_asset($comment->user->avatar) }}"
                                                    alt="{{ $comment->user->name }}"
                                                    class="img-responsive img-circle comment-avatar">
                                            @endif
                                            <strong>{{ $comment->user->name }}</strong>
                                        </a>
                                        @if ($comment->user->id == auth()->user()->id)
                                            <div class="dropdown float-right">
                                                <button class="btn" type="button" id="gedf-drop1"
                                                    data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                                    <div class="h6 dropdown-header"></div>
                                                    <a class="dropdown-item" id="deleteComment"
                                                        href="{{ route('comment.destroy', $comment->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        @endif
                                        <p class="comment-text">{{ $comment->comment }}</p>
                                        <a href="" id="reply"></a>
                                        <form method="post" action="{{ route('comment-reply.add') }}">
                                            @csrf
                                            <div class="text-xs flex items-center space-x-3 ml-3">
                                                @php
                                                    $comment_likes_count = App\Models\CommentLike::where('comment_id', $comment->id)
                                                        ->where('type', 'like')
                                                        ->get();
                                                @endphp
                                                <a href="javascript:void(0)"
                                                    onclick=commentLike({{ $comment->id }},'postLike','like')>
                                                    <i class="fa fa-thumbs-up"></i>
                                                    <span
                                                        id="postLikeComment-{{ $comment->id }}">{{ $comment_likes_count->count() }}</span>
                                                </a>
                                                @php
                                                    $comment_love_count = App\Models\CommentLike::where('comment_id', $comment->id)
                                                        ->where('type', 'love')
                                                        ->get();
                                                @endphp
                                                <a href="javascript:void(0)"
                                                    onclick=commentLike({{ $comment->id }},'postLove','love')>
                                                    <i class="fa fa-heart"></i>
                                                    <span
                                                        id="postLoveComment-{{ $comment->id }}">{{ $comment_love_count->count() }}</span>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    onclick=commentLike({{ $comment->id }},'postFlag','flag')>
                                                    <i class="fa fa-flag"></i>
                                                </a>
                                                <a href="javascript:void(0)" id="commentReplyBtn{{ $comment->id }}"
                                                    onclick="commentBtn({{ $comment->id }})"> Reply </a>
                                                <span> {{ $comment->created_at->diffForhumans() }} </span>
                                            </div>
                                            <div class="comment-input-wrapper"
                                                style="  opacity:0; height:0px; transition: all 0.5s linear; visibility:hidden;"
                                                id="reply{{ $comment->id }}">
                                                <div class="form-group ml-2">
                                                    <input type="text" name="comment"
                                                        class="form-control rounded-30 bg-light" />
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
                                                @if (auth()->user()->id == $comment->user_id)
                                                    <div class="dropdown float-right">
                                                        <button class="btn" type="button" id="gedf-drop1"
                                                            data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="gedf-drop1">
                                                            <div class="h6 dropdown-header"></div>

                                                            <a class="dropdown-item" id="deleteComment"
                                                                href="{{ route('comment.destroy', $comment->id) }}">Delete</a>
                                                        </div>
                                                    </div>
                                                @endif
                                                <p class="comment-text">{{ $comment->comment }}</p>
                                                <a href="" id="reply"></a>
                                                <form method="post" action="{{ route('comment-reply.add') }}">
                                                    @csrf
                                                    <div class="form-group ml-2 d-none" id="ReplyInputBox">
                                                        <input type="text" name="comment" class="form-control" />
                                                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                                        <input type="hidden" name="comment_id"
                                                            value="{{ $comment->id }}" />
                                                    </div>
                                                    <div class="text-xs flex items-center space-x-3">
                                                        @php
                                                            $comment_likes_count = App\Models\CommentLike::where('comment_id', $comment->id)
                                                                ->where('type', 'like')
                                                                ->get();
                                                        @endphp
                                                        <a href="javascript:void(0)"
                                                            onclick=commentLike({{ $comment->id }},'postLike','like')>
                                                            <i class="fa fa-thumbs-up"></i>
                                                            <span
                                                                id="postLikeComment-{{ $comment->id }}">{{ $comment_likes_count->count() }}</span>
                                                        </a>
                                                        @php
                                                            $comment_love_count = App\Models\CommentLike::where('comment_id', $comment->id)
                                                                ->where('type', 'love')
                                                                ->get();
                                                        @endphp
                                                        <a href="javascript:void(0)"
                                                            onclick=commentLike({{ $comment->id }},'postLove','love')>
                                                            <i class="fa fa-heart"></i>
                                                            <span
                                                                id="postLoveComment-{{ $comment->id }}">{{ $comment_love_count->count() }}</span>
                                                        </a>
                                                        <a href="javascript:void(0)"
                                                            onclick=commentLike({{ $comment->id }},'postFlag','flag')>
                                                            <i class="fa fa-flag"></i>

                                                        </a>
                                                        <span> {{ $comment->created_at->diffForhumans() }} </span>
                                                    </div>
                                                </form>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
 
</div>

@endsection
@section('script')
    <script>
        // Comment Like by ajax
        function commentLike(id, type, likeType) {


            var commentLikePriview = '#' + type + 'Comment-' + id;
            console.log(commentLikePriview);

            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('comment.like') }}",
                type: "POST",
                data: {
                    id: id,
                    likeType: likeType,
                    _token: _token
                },
                success: function(response) {
                    console.log(response)
                    $(commentLikePriview).html(response);

                },
                error: function(error) {
                    console.log(error);
                }
            });

        }
        // Post Like by ajax
        function postLike(id, type, likeType) {

            var count = '#' + type + 'Post-' + id;

            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('post.like') }}",
                type: "POST",
                data: {
                    id: id,
                    likeType: likeType,
                    _token: _token
                },
                success: function(response) {
                    console.log(response)
                    $(count).html(response);

                },
                error: function(error) {
                    console.log(error);
                }
            });

        }

       
    </script>
@endsection
