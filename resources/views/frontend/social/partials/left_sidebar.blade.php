<div class="left_side sticky" id="leftSide">
    <div class="left_side_warpper">
        <div class="profile">
            <div class="profile_picture">
                <a href="{{ route('get-user-profile-page', Auth::user()->user_name) }}">
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

        <div class="left_side_bar">
            <a href="{{ route('get-user-profile-page', Auth::user()->user_name) }}"
                class="item {{ Request::routeIs('get-user-profile-page') ? 'active_left_sidebar_menu' : '' }}">
                <div class="icon"><svg height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M120-440v-320q0-33 23.5-56.5T200-840h240v400H120Zm240-80Zm160-320h240q33 0 56.5 23.5T840-760v160H520v-240Zm0 720v-400h320v320q0 33-23.5 56.5T760-120H520ZM120-360h320v240H200q-33 0-56.5-23.5T120-200v-160Zm240 80Zm240-400Zm0 240Zm-400-80h160v-240H200v240Zm400-160h160v-80H600v80Zm0 240v240h160v-240H600ZM200-280v80h160v-80H200Z" />
                    </svg></div>
                <div class="title">View Profile</div>
            </a>
            <a href="{{ route('get-notification-page') }}"
                class="item {{ Request::routeIs('get-notification-page') ? 'active_left_sidebar_menu' : '' }}">
                <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
                    </svg> </div>
                <div class="title">Notifications</div>
            </a>
            <a href="{{ route('get-messanger-page') }}"
                class="item {{ Request::routeIs('get-messanger-page') ? 'active_left_sidebar_menu' : '' }}">
                <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M240-400h320v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z" />
                    </svg> </div>
                <div class="title">Messages</div>
            </a>
            <a href="{{ route('get-media-page') }}"
                class="item {{ Request::routeIs('get-media-page') ? 'active_left_sidebar_menu' : '' }}">
                <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="m160-800 80 160h120l-80-160h80l80 160h120l-80-160h80l80 160h120l-80-160h120q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800Zm0 240v320h640v-320H160Zm0 0v320-320Z" />
                    </svg> </div>
                <div class="title">Media</div>
            </a>
            <a href="{{ route('get-friend-page') }}"
                class="item {{ Request::routeIs('get-friend-page') ? 'active_left_sidebar_menu' : '' }}">
                <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z" />
                    </svg> </div>
                <div class="title">Friends</div>
            </a>
            <a href="{{ route('get-body-shape-page') }}"
                class="item {{ Request::routeIs('get-body-shape-page') ? 'active_left_sidebar_menu' : '' }}">
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
            <a href="" class="item ">
                <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M480-120q-138 0-240.5-91.5T122-440h82q14 104 92.5 172T480-200q117 0 198.5-81.5T760-480q0-117-81.5-198.5T480-760q-69 0-129 32t-101 88h110v80H120v-240h80v94q51-64 124.5-99T480-840q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480q0 75-28.5 140.5t-77 114q-48.5 48.5-114 77T480-120Zm112-192L440-464v-216h80v184l128 128-56 56Z" />
                    </svg> </div>
                <div class="title">Recommendation History</div>
            </a>
            <a href="{{ route('get-user-settings') }}"
                class="item {{ Request::routeIs('get-user-settings') ? 'active_left_sidebar_menu' : '' }}">
                <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" />
                    </svg> </div>
                <div class="title">Settings</div>
            </a>
            <a href="" class="item ">
                <div class="icon"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg> </div>
                <div class="title">Help & Support</div>
            </a>
            <a href="" class="item ">
                <div class="icon"> <svg height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M240-400h122l200-200q9-9 13.5-20.5T580-643q0-11-5-21.5T562-684l-36-38q-9-9-20-13.5t-23-4.5q-11 0-22.5 4.5T440-722L240-522v122Zm280-243-37-37 37 37ZM300-460v-38l101-101 20 18 18 20-101 101h-38Zm121-121 18 20-38-38 20 18Zm26 181h273v-80H527l-80 80ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z" />
                    </svg> </div>
                <div class="title">Send Feedback</div>
            </a>
            <a href="{{ route('logout') }}"
                class="item {{ Request::routeIs('logout') ? 'active_left_sidebar_menu' : '' }}">
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


@section('script')
   
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdownMenu");
            if (dropdown.style.display === "none") {
                dropdown.style.display = "block";
            } else {
                dropdown.style.display = "none";
            }
        }
        let _token = $('meta[name="csrf-token"]').attr('content');

        function send_friend_request(id) {

            let element = document.getElementById(`friendRequest${id}`).style.display = 'none';
            console.log(element);


            $.ajax({
                url: "{{ route('send-friend-request') }}",
                type: "POST",
                data: {
                    id: id,
                    _token: _token
                },
                success: function(response) {



                },
                error: function(error) {
                    console.log(error);
                }
            });

        }

        function send_unfriend_request(id) {

            let element = document.getElementById(`unFriendRequest${id}`).style.display = 'none';


            $.ajax({
                url: "{{ route('remove-friend') }}",
                type: "POST",
                data: {
                    id: id,
                    _token: _token
                },
                success: function(response) {



                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    
        function commentLike(id, type, likeType) {


            var commentLikePriview = '#' + type + 'Comment-' + id;

            let svgElement = document.querySelector(commentLikePriview).previousElementSibling.querySelector('path');
            console.log(svgElement);
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
                    if (response.is_liked) {

                        svgElement.setAttribute('fill', '#ff0000'); // Change the fill color to red (#ff0000)
                    } else {
                        svgElement.setAttribute('fill', '#000000');
                    }

                    $(commentLikePriview).html(response.count);

                },
                error: function(error) {
                    console.log(error);
                }
            });

        }
        // Post Like by ajax
        function postLike(id, type, likeType) {
            var count = '#' + type + 'Post-' + id;
            let svgElement = document.querySelector(count).previousElementSibling.querySelector('path');
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

                    if (response.is_liked) {

                        svgElement.setAttribute('fill', '#ff0000'); // Change the fill color to red (#ff0000)
                    } else {
                        svgElement.setAttribute('fill', '#000000');
                    }
                    console.log(response);
                    $(count).html(response.count);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection
