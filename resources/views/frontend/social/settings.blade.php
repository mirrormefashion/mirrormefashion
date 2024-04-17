
@extends('frontend.layouts.app')
@section('content')

@include('frontend/social/partials/menu')
<main class="container col_2">
   @include('frontend/social/partials/left_sidebar')
  
   <div class="middle_side">
    
    <!-- ================== Middle Menu End============= -->
    <div class="settings_page">
        <div class="settings">
            <div class="personal_info mt_1">
                <form class="personal_info_form flex_column" action="{{ route('user.profile-update') }}" method="POST">
                    
                    @csrf
                    <h2 class="mt_1">Personal information</h1>
                        <label for="" class="mt_1" >Full Name</label>
                        <input class="input" name="name" value="{{Auth::user()->name}}" type="text">
                        <label for="">Nick Name</label>
                        <input class="input" name="nick_name" value="{{Auth::user()->nick_name}}" type="text">
                        <label for="">Username </label>
                        <input class="input" name="user_name" value="{{Auth::user()->user_name}}" type="text">
                        <label for="">Email address</label>
                        <input class="input" name="email" value="{{Auth::user()->email}}" type="email">
                        <label for="">Phone</label>
                        <input class="input" name="phone" value="{{Auth::user()->phone}}" type="text">
                        <button type="submit" class="btn">Update</button>
                </form>
                <form action="{{ route('user.is_notify') }}" method="POST" class="notifications_form flex_column mt_1">
                    @csrf
                    <h3> How often would you like to receive notifications?</h3>
                    <select name="time" class="mt_1 select_notification_time">
                        <option value="1">Daily</option>
                        <option value="10080">Once a week</option>
                        <option value="21600">Twice a month</option>
                        <option value="0">Never</option>
                    </select>
                    <button type="submit " class="btn mt_1">Update</button>
                </form>
            </div>
            <div class="privacy_info flex_column mt_1">

                <form action="{{ route('user.change-password') }}" method="POST" class="password_form flex_column">
                    @csrf
                    <h2 class="mt_1">Change Your Password</h2>
                    <label for="" class="mt_1">Password</label>
                    <input name="password" class="input" type="password">
                    <label for="">Confirm Password</label>
                    <input name="password_confirmation" class="input" type="password">
                    <button type="submit" class="btn">Change Password</button>
                </form>
                <form action="{{ route('user.privecy-setting-update') }}" method="POST"  class="privacy_form flex_column mt_1">
                    @csrf
                    <h1>Privacy settings</h1>
                    <div class="form_group">
                        <label for="isHideBirthday">Hide birthday</label>
                        <input name="is_hide_birthday" @if (Auth::user()->is_hide_birthday === 1) {{ 'checked' }} @endif type="checkbox" id="isHideBirthday" value="1">
                    </div>
                    <div class="form_group">
                        <label for="isHideBodyShape">Hide body shape</label>
                        <input name="is_hide_body_shape"  @if (Auth::user()->is_hide_body_shape === 1) {{ 'checked' }} @endif type="checkbox" id="isHideBodyShape" value="1">
                    </div>
                    <div class="form_group">
                        <label for="isHideFavorites">Hide favorites</label>
                        <input class="" name="is_hide_favorites"  @if (Auth::user()->is_hide_favorites === 1) {{ 'checked' }} @endif type="checkbox" id="isHideFavorites" value="1">
                    </div>
                    <div class="form_group">
                        <label for="status">Deactive Account</label>
                        <input name="status" type="checkbox"  @if (auth()->user()->status === 0) {{ 'checked' }} @endif id="status" value="0">

                    </div>
                    <button type="submit" class="btn">Update</button>
                </form>

            </div>
        </div>


    </div>
</div>

</main>
@endsection