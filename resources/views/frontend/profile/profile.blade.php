@extends('frontend.layouts.app')
@section('content')
@php
     $friendsOfFriends = Auth::user()->getFriendsOfFriends($perPage = 3);
@endphp
<main class="container">
    <div class="left_side sticky" id="leftSide">
        <div class="left_side_warpper">
            <div class="profile">
                <div class="profile_picture">
                    <a href="{{ route('get-user-profile-page',Auth::user()->user_name) }}">
                        @if (Auth::user()->avatar == null || uploaded_asset(Auth::user()->avatar) == '')
                        <img src="{{ asset('public/uploads/avatar.png') }}" alt="{{ Auth::user()->name }}"
                            class="img-responsive img-circle avatar">
                        @else
                        <img src="{{ uploaded_asset(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}"
                            class="img-responsive img-circle avatar">
                        @endif
                    </a>

                </div>
                <div class="name">{{Auth::user()->name}}</div>
            </div>

            <div class="left_side_bar">
                <a href="" class="item">
                    <div class="icon"><svg height="24" viewBox="0 -960 960 960" width="24">
                            <path
                                d="M120-440v-320q0-33 23.5-56.5T200-840h240v400H120Zm240-80Zm160-320h240q33 0 56.5 23.5T840-760v160H520v-240Zm0 720v-400h320v320q0 33-23.5 56.5T760-120H520ZM120-360h320v240H200q-33 0-56.5-23.5T120-200v-160Zm240 80Zm240-400Zm0 240Zm-400-80h160v-240H200v240Zm400-160h160v-80H600v80Zm0 240v240h160v-240H600ZM200-280v80h160v-80H200Z" />
                        </svg></div>
                    <div class="title">Business Page</div>
                </a>
                <a href="" class="item">
                    <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                            <path
                                d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
                        </svg> </div>
                    <div class="title">Notifications</div>
                </a>
                <a href="" class="item">
                    <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                            <path
                                d="M240-400h320v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z" />
                        </svg> </div>
                    <div class="title">Messages</div>
                </a>
                <a href="" class="item">
                    <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                            <path
                                d="m160-800 80 160h120l-80-160h80l80 160h120l-80-160h80l80 160h120l-80-160h120q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800Zm0 240v320h640v-320H160Zm0 0v320-320Z" />
                        </svg> </div>
                    <div class="title">Media</div>
                </a>
                <a href="friend.html" class="item">
                    <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                            <path
                                d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z" />
                        </svg> </div>
                    <div class="title">Friends</div>
                </a>
                <a href="" class="item">
                    <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                            <path
                                d="M430-200h100v-180h60v-184q0-27-28.5-41.5T480-620q-53 0-81.5 14.5T370-564v184h60v180Zm50 120q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-155.5t86-127Q252-817 325-848.5T480-880q83 0 155.5 31.5t127 86q54.5 54.5 86 127T880-480q0 82-31.5 155t-86 127.5q-54.5 54.5-127 86T480-80Zm0-80q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Zm0-480q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0 160Z" />
                        </svg> </div>
                    <div class="title">Your Body Shape</div>
                </a>
                <a href="" class="item">
                    <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                            <path
                                d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                        </svg> </div>
                    <div class="title">About</div>
                </a>
                <a href="" class="item">
                    <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                            <path
                                d="M480-120q-138 0-240.5-91.5T122-440h82q14 104 92.5 172T480-200q117 0 198.5-81.5T760-480q0-117-81.5-198.5T480-760q-69 0-129 32t-101 88h110v80H120v-240h80v94q51-64 124.5-99T480-840q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480q0 75-28.5 140.5t-77 114q-48.5 48.5-114 77T480-120Zm112-192L440-464v-216h80v184l128 128-56 56Z" />
                        </svg> </div>
                    <div class="title">Recommendation History</div>
                </a>
                <a href="settings.html" class="item">
                    <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                            <path
                                d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" />
                            </svg> </div>
                    <div class="title">Settings</div>
                </a>
                <a href="" class="item">
                    <div class="icon"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg> </div>
                    <div class="title">Help & Support</div>
                </a>
                <a href="" class="item">
                    <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                            <path
                                d="M240-400h122l200-200q9-9 13.5-20.5T580-643q0-11-5-21.5T562-684l-36-38q-9-9-20-13.5t-23-4.5q-11 0-22.5 4.5T440-722L240-522v122Zm280-243-37-37 37 37ZM300-460v-38l101-101 20 18 18 20-101 101h-38Zm121-121 18 20-38-38 20 18Zm26 181h273v-80H527l-80 80ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z" />
                            </svg> </div>
                    <div class="title">Send Feedback</div>
                </a>
                <a href="{{route('logout')}}" class="item">
                    <div class="icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg> </div>
                    <div class="title">Log Out</div>
                </a>
            </div>
        </div>

    </div>
    <!-- ================== Middle Section Start============= -->
    <div class="middle_side">
        <!-- ================== Middle Menu Start============= -->

        <section class="middle_menu">
            <div class="nav_toggle" onclick="toggleMenu('#leftSide')">

                <svg viewBox="0 0 50 50" width="30px" height="30px" fill="black">
                    <path
                        d="M 0 7.5 L 0 12.5 L 50 12.5 L 50 7.5 Z M 0 22.5 L 0 27.5 L 50 27.5 L 50 22.5 Z M 0 37.5 L 0 42.5 L 50 42.5 L 50 37.5 Z" />
                    </svg>
            </div>
            <div class="nav">
                <a href="" class="active"> News Feed</a> <a href="">Your Posts</a> <a href="">Favorites</a> <a
                    href=" ">Shopping Cart</a> <a href="">Checkout</a>
            </div>
        </section>
        <!-- ================== Middle Menu End============= -->
        <!-- ================== Create Post Start============= -->
        <section class="post_box">
            <form action="{{ route('create-post') }}" method="POST" enctype="multipart/form-data" class="post_box_form">
@csrf
                <div class="profile">
                    <div class="profile_picture">
                        <a href="{{ route('get-user-profile-page',Auth::user()->user_name) }}">
                            @if (Auth::user()->avatar == null || uploaded_asset(Auth::user()->avatar) == '')
                            <img src="{{ asset('public/uploads/avatar.png') }}" alt="{{ Auth::user()->name }}"
                                class="img-responsive img-circle avatar">
                            @else
                            <img src="{{ uploaded_asset(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}"
                                class="img-responsive img-circle avatar">
                            @endif
                        </a>
                    </div>
                    <div class="name">{{ Auth::user()->name }}</div>
                </div>
                <textarea style="width :100% " name="body" rows="3" placeholder="What's on your mind?" spellcheck="false"
                    required></textarea>
                <div class="post_action_box">

                    <div class="post_type">
                        <p>Photo or Video</p>
                        <input type="file" name="aiz_file">
                        <ul class="list">
                            <li><svg width="20.759" height="20.761" viewBox="0 0 20.759 20.761">
                                    <g id="Group_102" data-name="Group 102" transform="translate(-328.121 -456)">
                                        <g id="Group_56" data-name="Group 56" transform="translate(328.121 458.611)">
                                            <path id="Path_119" data-name="Path 119"
                                                d="M9.3,19a3.681,3.681,0,0,1-3.676-3.676V3.019l-4.179.957A1.946,1.946,0,0,0,.065,6.354L3.648,19.731a1.965,1.965,0,0,0,1.886,1.438,1.9,1.9,0,0,0,.484-.062L14.735,19Z"
                                                transform="translate(0 -3.019)" fill="#2ace82" />
                                        </g>
                                        <g id="Group_57" data-name="Group 57" transform="translate(335.04 456)">
                                            <path id="Path_120" data-name="Path 120"
                                                d="M12.73,8.46A1.73,1.73,0,1,0,11,6.73,1.732,1.732,0,0,0,12.73,8.46Z"
                                                transform="translate(-8.405 -0.675)" fill="#2ace82" />
                                            <path id="Path_121" data-name="Path 121"
                                                d="M21.839,2.595A2.6,2.6,0,0,0,19.244,0h-8.65A2.6,2.6,0,0,0,8,2.595V14.7A2.6,2.6,0,0,0,10.595,17.3h8.65A2.6,2.6,0,0,0,21.839,14.7ZM10.595,1.73h8.65a.865.865,0,0,1,.865.865V8.164l-.657-.657a1.517,1.517,0,0,0-2.145,0L13.19,11.624l-1.09-1.09a1.517,1.517,0,0,0-2.145,0l-.225.225V2.595A.865.865,0,0,1,10.595,1.73Z"
                                                transform="translate(-8)" fill="#2ace82" />
                                        </g>
                                    </g>
                                </svg> </li>
                        </ul>
                    </div>
                    <input class=" btn create_post_btn" type="submit" value="Create Post" />
                </div>
            </form>
        </section>
        <!-- ================== Create Post End============= -->
        <!-- ================== Feeds Section Start============= -->
        @foreach (App\Models\Post::orderBy('created_at', 'DESC')->get() as $post )
        <section class="feeds">

            <div class="feed mt_1" style="margin-bottom: 15px;">
                <div class="feed_header">
                  
                        <div class="profile">
                            <div class="profile_picture"> <a href="{{ route('get-user-profile-page',$post->user->user_name) }}">
                                @if ($post->user->avatar == null || uploaded_asset($post->user->avatar) == '')
                                <img src="{{ asset('public/uploads/avatar.png') }}" alt="{{ $post->user->name }}"
                                    class="img-responsive img-circle avatar">
                                @else
                                <img src="{{ uploaded_asset($post->user->avatar) }}" alt="{{ $post->user->name }}"
                                    class="img-responsive img-circle avatar">
                                @endif
                            </a> </div>
                            <div class="description">
                                <div class="name text-muted">{{$post->user->name}}</div>
                                <div class="published"> {{ $post->created_at->diffForHumans() }}</div>
                            </div>
                        </div>

                    <div class="action"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-more-horizontal">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="19" cy="12" r="1"></circle>
                            <circle cx="5" cy="12" r="1"></circle>
                        </svg> </div>
                </div>
                <div class="feed_description">
                    <div class="feed_media"> 
                        
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
                    </div>
                    <div class="feed_text"> {{ $post->body }} </div>
                </div>
                <div class="feed_footer">

                    @php
                        $likes_count = App\Models\Like::where('post_id', $post->id)
                        ->where('type', 'like')
                        ->get();
                        $love_count = App\Models\Like::where('post_id', $post->id)
                                                        ->where('type', 'love')
                                                        ->get();
                                                        $flag_count = App\Models\Like::where('post_id', $post->id)
                                            ->where('type', 'flag')
                                            ->get();
                    @endphp
                                                   
                    <div class="left">
                        <a href="javascript:void(0)" onclick="postLike({{ $post->id }},'postLike','like')">
                        <div class="like engagement_link"> <svg height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M720-120H280v-520l280-280 50 50q7 7 11.5 19t4.5 23v14l-44 174h258q32 0 56 24t24 56v80q0 7-2 15t-4 15L794-168q-9 20-30 34t-44 14Zm-360-80h360l120-280v-80H480l54-220-174 174v406Zm0-406v406-406Zm-80-34v80H160v360h120v80H80v-520h200Z" />
                                </svg> <span id="postLikePost-{{ $post->id }}">{{ $likes_count->count() }}</span> 
                            
                            </div>
                        </a>
                        <a href="javascript:void(0)" onclick="postLike({{ $post->id }},'postLove','love')">
                        <div class="love engagement_link"><svg height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z" />
                                </svg></div>
                        </a>
                        <span id="postLovePost-{{ $post->id }}">{{$love_count->count()}}</span>
                        <a href="javascript:void(0)" onclick="postLike({{ $post->id }},'postFlag','flag')">
                        <div class="flag engagement_link"><svg height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z" />
                                </svg></div> 
                        </a>
                                <span id="postFlagPost-{{ $post->id }}"> {{ $flag_count->count() }}</span>
                    </div>
                    <div class="right">
                        <div class="comment engagement_link"> <svg height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M240-400h480v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM880-80 720-240H160q-33 0-56.5-23.5T80-320v-480q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v720ZM160-320h594l46 45v-525H160v480Zm0 0v-480 480Z" />
                                </svg> <span>Comment</span> </div>
                        <div class="share engagement_link"><svg height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M720-80q-50 0-85-35t-35-85q0-7 1-14.5t3-13.5L322-392q-17 15-38 23.5t-44 8.5q-50 0-85-35t-35-85q0-50 35-85t85-35q23 0 44 8.5t38 23.5l282-164q-2-6-3-13.5t-1-14.5q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35q-23 0-44-8.5T638-672L356-508q2 6 3 13.5t1 14.5q0 7-1 14.5t-3 13.5l282 164q17-15 38-23.5t44-8.5q50 0 85 35t35 85q0 50-35 85t-85 35Zm0-640q17 0 28.5-11.5T760-760q0-17-11.5-28.5T720-800q-17 0-28.5 11.5T680-760q0 17 11.5 28.5T720-720ZM240-440q17 0 28.5-11.5T280-480q0-17-11.5-28.5T240-520q-17 0-28.5 11.5T200-480q0 17 11.5 28.5T240-440Zm480 280q17 0 28.5-11.5T760-200q0-17-11.5-28.5T720-240q-17 0-28.5 11.5T680-200q0 17 11.5 28.5T720-160Zm0-600ZM240-480Zm480 280Z" />
                                </svg></div>
                        <span>Share</span>
                    </div>
                </div>
                <div class="new_comment" style="display: block;">
                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <div class="comment_box"> 
                            <input type="text" placeholder="write comment" name="comment">
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <button type="submit"
                                class="comment_btn"><svg height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="M120-160v-640l760 320-760 320Zm80-120 474-200-474-200v140l240 60-240 60v140Zm0 0v-400 400Z" />
                                    </svg></span> </div>
                    </form>

                    <div class="comment_section mt_1">
                        @foreach ($post->comments as $comment)
                        <div class="comment">
                            <div class="main_comment">
                                <div class="comment_header">
                                    <div class="profile">
                                        <div class="profile_picture"><a href="{{ route('get-user-profile-page',$post->user->user_name) }}">
                                            @if ($post->user->avatar == null || uploaded_asset($post->user->avatar) == '')
                                            <img src="{{ asset('public/uploads/avatar.png') }}" alt="{{ $post->user->name }}"
                                                class="img-responsive img-circle avatar">
                                            @else
                                            <img src="{{ uploaded_asset($post->user->avatar) }}" alt="{{ $post->user->name }}"
                                                class="img-responsive img-circle avatar">
                                            @endif
                                           </a> 
                                       </div>

                                        <a class="name" href="{{ route('get-user-profile-page',$post->user->user_name) }}">
                                           {{$post->user->name}}
                                        </a>
                                    </div>
                                    <div class="comment_time">
                                        <h6>{{ $comment->created_at->diffForHumans() }}</h6>
                                    </div>
                                </div>
                                <div class="comment_body">

                                    <p>{{$comment->comment}}</p>

                                    @php
                                    $comment_likes_count = App\Models\CommentLike::where('comment_id', $comment->id)
                                        ->where('type', 'like')
                                        ->get();
                                        $comment_love_count = App\Models\CommentLike::where('comment_id', $comment->id)
                                                        ->where('type', 'love')
                                                        ->get();
                                    $comment_flag_count = App\Models\CommentLike::where('comment_id', $comment->id)
                                    ->where('type', 'flag')
                                    ->get();
                                  @endphp
                                    <div class="feed_footer">

                                        <div class="left">
                                            <a href="javascript:void(0)"
                                                    onclick="commentLike({{ $comment->id }},'postLike','like')">
                                            <div class="like engagement_link"> <svg height="24" viewBox="0 -960 960 960"
                                                    width="24">
                                                    <path
                                                        d="M720-120H280v-520l280-280 50 50q7 7 11.5 19t4.5 23v14l-44 174h258q32 0 56 24t24 56v80q0 7-2 15t-4 15L794-168q-9 20-30 34t-44 14Zm-360-80h360l120-280v-80H480l54-220-174 174v406Zm0-406v406-406Zm-80-34v80H160v360h120v80H80v-520h200Z" />
                                                    </svg> <span id="postLikeComment-{{ $comment->id }}">{{$comment_likes_count->count()}}</span> </div>
                                            </a>
                                            <a href="javascript:void(0)"
                                            onclick="commentLike({{ $comment->id }},'postLove','love')">
                                            <div class="love engagement_link"><svg height="24" viewBox="0 -960 960 960"
                                                    width="24">
                                                    <path
                                                        d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z" />
                                                    </svg></div>
                                            </a>
                                            <span
                                            id="postLoveComment-{{ $comment->id }}">{{ $comment_love_count->count() }}</span>
                                           
                                            <a href="javascript:void(0)"
                                            onclick="commentLike({{ $comment->id }},'postFlag','flag')">
                                            <div class="flag engagement_link"><svg height="24" viewBox="0 -960 960 960"
                                                    width="24">
                                                    <path
                                                        d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z" />
                                                    </svg></div> 
                                            </a>
                                                    
                                                    <span
                                                    id="postFlagComment-{{ $comment->id }}">{{ $comment_flag_count->count() }}</span>
                                        </div>
                                        <div class="right">
                                            <div class="comment engagement_link"> <svg height="24"
                                                    viewBox="0 -960 960 960" width="24">
                                                    <path
                                                        d="M240-400h480v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM880-80 720-240H160q-33 0-56.5-23.5T80-320v-480q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v720ZM160-320h594l46 45v-525H160v480Zm0 0v-480 480Z" />
                                                    </svg> <span>Comment</span> </div>
                                            <div class="share engagement_link"><svg height="24" viewBox="0 -960 960 960"
                                                    width="24">
                                                    <path
                                                        d="M720-80q-50 0-85-35t-35-85q0-7 1-14.5t3-13.5L322-392q-17 15-38 23.5t-44 8.5q-50 0-85-35t-35-85q0-50 35-85t85-35q23 0 44 8.5t38 23.5l282-164q-2-6-3-13.5t-1-14.5q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35q-23 0-44-8.5T638-672L356-508q2 6 3 13.5t1 14.5q0 7-1 14.5t-3 13.5l282 164q17-15 38-23.5t44-8.5q50 0 85 35t35 85q0 50-35 85t-85 35Zm0-640q17 0 28.5-11.5T760-760q0-17-11.5-28.5T720-800q-17 0-28.5 11.5T680-760q0 17 11.5 28.5T720-720ZM240-440q17 0 28.5-11.5T280-480q0-17-11.5-28.5T240-520q-17 0-28.5 11.5T200-480q0 17 11.5 28.5T240-440Zm480 280q17 0 28.5-11.5T760-200q0-17-11.5-28.5T720-240q-17 0-28.5 11.5T680-200q0 17 11.5 28.5T720-160Zm0-600ZM240-480Zm480 280Z" />
                                                    </svg></div>
                                            <span>Share</span>
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="sub_comments">
                                <div class="reply">
                                    <form method="post">
                                        <div class="comment_box"> <input type="text" placeholder="write comment"> <span
                                                type="button" class="comment_btn"><svg height="24"
                                                    viewBox="0 -960 960 960" width="24">
                                                    <path
                                                        d="M120-160v-640l760 320-760 320Zm80-120 474-200-474-200v140l240 60-240 60v140Zm0 0v-400 400Z" />
                                                    </svg></span> </div>
                                    </form>
                                </div>
                                @foreach ($comment->replies as $comment)
                                <div class="sub_comment mt_1">
                                    <div class="comment_header">
                                        <div class="profile">
                                            <div class="profile_picture"><img src="images/profile_pic.jpg" alt="">
                                            </div>

                                            <a class="name" href="#javascript">
                                                Pabelo Mukrani
                                            </a>
                                        </div>
                                        <div class="comment_time">
                                            <h6>50 mins ago</h6>
                                        </div>
                                    </div>
                                    <div class="comment_body">

                                        <p>Oooo Very Cute and Sweet Dog, happy birthday Cuty.... 🙂</p>
                                        <div class="feed_footer">

                                            <div class="left">
                                                <div class="like engagement_link"> <svg height="24"
                                                        viewBox="0 -960 960 960" width="24">
                                                        <path
                                                            d="M720-120H280v-520l280-280 50 50q7 7 11.5 19t4.5 23v14l-44 174h258q32 0 56 24t24 56v80q0 7-2 15t-4 15L794-168q-9 20-30 34t-44 14Zm-360-80h360l120-280v-80H480l54-220-174 174v406Zm0-406v406-406Zm-80-34v80H160v360h120v80H80v-520h200Z" />
                                                        </svg> <span>Like</span> </div>
                                                <div class="love engagement_link"><svg height="24"
                                                        viewBox="0 -960 960 960" width="24">
                                                        <path
                                                            d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z" />
                                                        </svg></div>
                                                <span>Love</span>
                                                <div class="flag engagement_link"><svg height="24"
                                                        viewBox="0 -960 960 960" width="24">
                                                        <path
                                                            d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z" />
                                                        </svg></div> <span>Report</span>
                                            </div>
                                            <div class="right">
                                                <div class="comment engagement_link"> <svg height="24"
                                                        viewBox="0 -960 960 960" width="24">
                                                        <path
                                                            d="M240-400h480v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM880-80 720-240H160q-33 0-56.5-23.5T80-320v-480q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v720ZM160-320h594l46 45v-525H160v480Zm0 0v-480 480Z" />
                                                        </svg> <span>Comment</span> </div>
                                                <div class="share engagement_link"><svg height="24"
                                                        viewBox="0 -960 960 960" width="24">
                                                        <path
                                                            d="M720-80q-50 0-85-35t-35-85q0-7 1-14.5t3-13.5L322-392q-17 15-38 23.5t-44 8.5q-50 0-85-35t-35-85q0-50 35-85t85-35q23 0 44 8.5t38 23.5l282-164q-2-6-3-13.5t-1-14.5q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35q-23 0-44-8.5T638-672L356-508q2 6 3 13.5t1 14.5q0 7-1 14.5t-3 13.5l282 164q17-15 38-23.5t44-8.5q50 0 85 35t35 85q0 50-35 85t-85 35Zm0-640q17 0 28.5-11.5T760-760q0-17-11.5-28.5T720-800q-17 0-28.5 11.5T680-760q0 17 11.5 28.5T720-720ZM240-440q17 0 28.5-11.5T280-480q0-17-11.5-28.5T240-520q-17 0-28.5 11.5T200-480q0 17 11.5 28.5T240-440Zm480 280q17 0 28.5-11.5T760-200q0-17-11.5-28.5T720-240q-17 0-28.5 11.5T680-200q0 17 11.5 28.5T720-160Zm0-600ZM240-480Zm480 280Z" />
                                                        </svg></div>
                                                <span>Share</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                @endforeach

                            </div>

                        </div>
                        @endforeach
                    </div>

                </div>
            </div>


        </section>
        @endforeach
        <!-- ================== Feeds Section End============= -->
    </div>
    <!-- ================== Middle Section End============= -->
    <!-- ================== Right Section Side Start============= -->
    <div class="right_side sticky">
        <div class="card">
            <div class="card_title">
                <h2>Friend Suggestions</h2>

            </div>
            <div class="card_body">
                @if ($friendsOfFriends->count() > 0)
                @foreach ($friendsOfFriends as $friend)
                @if (Auth::user()->isFriendWith($friend) == false)
                <div class="friend">
                    <div class="profile ">
                        <div class="profile_picture">
                            <a href="{{ route('get-user-profile-page',$friend->user_name) }}">
                                @if ($friend->avatar == null || uploaded_asset($friend->avatar) == '')
                                <img src="{{ asset('public/uploads/avatar.png') }}" alt="{{ $friend->name }}"
                                    class="img-responsive img-circle avatar">
                                @else
                                <img src="{{ uploaded_asset($friend->avatar) }}" alt="{{ $friend->name }}"
                                    class="img-responsive img-circle avatar">
                                @endif
                               </a> 
                        </div>
                        <a href="" class="name">{{$friend->name}}</a>
                    </div>
                    <button class="btn add_friend">
                        Add Friend
                    </button>
                </div>
                @endif
                @endforeach
                @else
                @foreach (App\User::all()->random(3) as $friend)
                @if (Auth::user()->isFriendWith($friend) == false)
                
                <div class="friend">
                    <div class="profile ">
                        <div class="profile_picture">
                            <a href="{{ route('get-user-profile-page',$friend->user_name) }}">
                                @if ($friend->avatar == null || uploaded_asset($friend->avatar) == '')
                                <img src="{{ asset('public/uploads/avatar.png') }}" alt="{{ $friend->name }}"
                                    class="img-responsive img-circle avatar">
                                @else
                                <img src="{{ uploaded_asset($friend->avatar) }}" alt="{{ $friend->name }}"
                                    class="img-responsive img-circle avatar">
                                @endif
                               </a> 
                        </div>
                        <a href="" class="name">{{$friend->name}} </a>
                    </div>
                    <a href="{{ route('send-friend-request', $friend->id) }}" class="btn add_friend">
                        Add Friend
                    </a>
                </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card_title">
                <div class="top_friend_header">
                    <h2>Top Friends</h2>
                    <a href="" class=" manage_friend_btn"><span><svg height="24" viewBox="0 -960 960 960" width="24">
                                <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                                </svg></span>Menage</a>
                </div>

            </div>
            <div class="card_body">
                @if ($top_friends->count() > 0)
                @foreach ($top_friends as $friend)
                <div class="friend">
                    <div class="profile">
                        <div class="profile_picture">
                            <a href="{{ route('get-user-profile-page',$friend->user_name) }}">
                                @if ($friend->avatar == null || uploaded_asset($friend->avatar) == '')
                                <img src="{{ asset('public/uploads/avatar.png') }}" alt="{{ $friend->name }}"
                                    class="img-responsive img-circle avatar">
                                @else
                                <img src="{{ uploaded_asset($friend->avatar) }}" alt="{{ $friend->name }}"
                                    class="img-responsive img-circle avatar">
                                @endif
                               </a> 
                        </div>
                        <a href="" class="name">{{$friend->name}} </a>
                    </div>
                    <button class="btn add_friend">
                        Message
                    </button>
                </div>
                @endforeach
                        @else
                            <a href="javascript:void(0)" >
                                <img src="{{ asset('public/uploads/plus-icon.jpg') }}" alt="" class="">
                            </a>
                 @endif

            </div>
        </div>
    </div>
    <!-- ================== Right Section Side End============= -->
</main>


@endsection
@section('script')
<!-- Include jQuery from a CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Comment Like by ajax
        function commentLike(id, type, likeType) {

            
            var commentLikePriview = '#' + type + 'Comment-' + id;
          

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