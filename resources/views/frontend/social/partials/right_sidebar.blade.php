@php
     $friendsOfFriends = Auth::user()->getFriendsOfFriends($perPage = 3);
@endphp


<div class="right_side sticky">
    <div class="card">
        <div class="card_title">
            <h2>Friend Suggestions</h2>

        </div>
        <div class="card_body">
            @if ($friendsOfFriends->count() < 0)
            @foreach ($friendsOfFriends as $friend)
            @if (Auth::user()->isFriendWith($friend) == false)
            <div class="friend"  id="friendRequest{{$friend->id}}">
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
                <a href="javascript:void(0)" onclick="send_friend_request({{$friend->id}})" class="btn add_friend">
                    Add Friend
                </a>
            </div>
            @endif
            @endforeach
            @else
            @foreach (App\User::all()->random(3) as $friend)
            @if (Auth::user()->isFriendWith($friend) == false)
            
            <div class="friend" id="friendRequest{{$friend->id}}">
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
                <a href="javascript:void(0)"  onclick="send_friend_request({{$friend->id}})" class="btn add_friend">
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
                            </svg></span>Manage</a>
            </div>

        </div>
        <div class="card_body">
            @if (App\User::whereIn('id',json_decode(Auth::user()->top_10_friends))->get()->where('status', 1)->count() > 0)
            @foreach (App\User::whereIn('id',json_decode(Auth::user()->top_10_friends))->get()->where('status', 1) as $friend)
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
