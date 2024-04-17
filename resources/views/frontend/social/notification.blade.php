@extends('frontend.layouts.app')
@section('content')
   
    @include('frontend/social/partials/menu')
    <main class="container col_2">
        @include('frontend/social/partials/left_sidebar')
        <!-- ================== Middle Section Start============= -->
        <div class="middle_side">

            <!-- ================== All Friends Start============= -->
            <div class="sender_list mt_1">

                @foreach (auth()->user()->notifications as $notification)
               
                    @if ($notification->type == 'App\Notifications\FriendRequestNotification')
                        @php
                            $user = App\User::find($notification->data['user_id']);

                        @endphp

                        <a href="{{ route('get-user-profile-page', $user->user_name) }}">
                            <div class="profile">
                                <div class="profile_picture">
                                    @if ($user->avatar == null || uploaded_asset($user->avatar) == '')
                                    <img src="{{ asset('public/uploads/avatar.png') }}" alt="{{ $user->name }}"
                                        class="img-responsive img-circle avatar">
                                @else
                                    <img src="{{ uploaded_asset($user->avatar) }}" alt="{{ $user->name }}"
                                        class="img-responsive img-circle avatar">
                                @endif
                                </div>
                                <div class="content">
                                    <div class="name">{{$user->name}}</div>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach

            </div>

        </div>
        <!-- ================== Middle Section End============= -->
        <!-- ================== Right Section Side Start============= -->
     
        <!-- ================== Right Section Side End============= -->
    </main>
@endsection
