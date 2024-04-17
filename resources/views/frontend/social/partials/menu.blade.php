<section class="middle_menu">
    <div class="nav_toggle" onclick="toggleMenu('#leftSide')">

        <svg viewBox="0 0 50 50" width="30px" height="30px" fill="black">
            <path
                d="M 0 7.5 L 0 12.5 L 50 12.5 L 50 7.5 Z M 0 22.5 L 0 27.5 L 50 27.5 L 50 22.5 Z M 0 37.5 L 0 42.5 L 50 42.5 L 50 37.5 Z" />
            </svg>
    </div>
    <div class="nav">
         <a href="{{route('get-user-profile-page',Auth::user()->user_name)}}">Your Posts</a> <a href="">Favorites</a> <a
            href=" ">Shopping Cart</a> <a href="">Settings</a>
    </div>
</section>