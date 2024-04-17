@extends('frontend.layouts.app')
@section('content')

@include('frontend/social/partials/menu')
<main class="container col_2">
   @include('frontend/social/partials/left_sidebar')
    <!-- ================== Middle Section Start============= -->
    <div class="middle_side">
    
        <!-- ================== All Friends Start============= -->
        <section class="friends_section">
            <div class="friends">

                @if (Auth::user()->getFriends()->count() > 0)


                @foreach (Auth::user()->getFriends() as $friend)
                <div class="friend_wrapper" id="unFriendRequest{{$friend->id}}">
                    <div class="friend_photo">
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
                    <div class="friend_name"> {{$friend->name}}</div>
                    <div class="friend_action_btn">
                        <button class="btn" onclick="send_unfriend_request({{$friend->id}})">Unfriend</button>
                        <a href="{{ route('get-messanger', $friend->user_name) }}" class="btn">Message</a>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </section>

    </div>
    <!-- ================== Middle Section End============= -->
    <!-- ================== Right Section Side Start============= -->

    <!-- ================== Right Section Side End============= -->
</main>


@endsection
