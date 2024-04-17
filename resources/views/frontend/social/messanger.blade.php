@extends('frontend.layouts.app')
@section('content')

@include('frontend/social/partials/menu')
<main class=" container messanger_container col_3">
 
    <!-- ================== Middle Menu End============= -->
   
    @include('frontend/social/partials/left_sidebar')
        <!-- ================== Middle Section Start============= -->
        <div class="middle_side sticky">

            <!-- ================== All Friends Start============= -->

            <div class="sender_list mt_1">
                
                @foreach ($users_by_conversation as $user_info)

                                @if (auth()->user()->id != $user_info->id)
                <a href="{{ route('get-messanger', $user_info->user_name) }}">
                    <div class="profile">
                      
                        <div class="profile_picture   @if ($user_info->is_online){{'online'}} @endif">
                            @if ($user_info->avatar == null || uploaded_asset($user_info->avatar)=='')
                            <img src="{{ asset('public/uploads/avatar.png') }}"
                                alt="{{ $user_info->name }}" class="img-responsive img-circle avatar">
                        @else
                            <img src="{{ uploaded_asset($user_info->avatar) }}"
                                alt="{{ $user_info->name }}" class="img-responsive img-circle avatar">
                        @endif
                        </div>
                        <div class="content">
                            <div class="name">{{ $user_info->name }}</div>
                            
                        </div>
                    </div>
                </a>
                

            @endif

        @endforeach

            </div>
        </div>
        <!-- ================== Middle Section End============= -->
        <div class="right_side sticky">

            <div class="messanger_chatbox">
                @isset($conversations)
                <div class="message_body" id="messageBody" style="color: #990000;">
                   
                    @foreach ($conversations as $conversation)
                    @foreach ($conversation->messages as $message)
                        
                            <div class="@if ($message->user_id == auth()->id()) talk_bubble @else user_bubble @endif">
                                {{ $message->message }}
                            </div>
                            
                            
                        
                    @endforeach


                @endforeach
           
                   
                  

                </div>


              
                  
                        <div class="messanger_footer">
                        @csrf
                        <input type="hidden" value="{{ $user->id }}" name="user_id">
       
                    <textarea spellcheck="false" id="messageInput" name="message" rows="1" placeholder="Type something here..." required></textarea>
                    <button type="submit" id="messageSubmitBtn" class="btn" onclick="send_chat_message({{$user->id}})">Send</button>
                </div>
                    
                
                @endisset
            </div>

        </div>

    </main>
  @endsection


   @section('script')
<script>
    
    var conn = new WebSocket('ws://localhost:8090/?user_id={{ auth()->user()->id }}');
    var from_user_id = "{{ Auth::user()->id }}";
     var to_user_id = "";
    

conn.onopen = function(e){

	console.log("Connection established!");
  
};
conn.onmessage = function(e){
    const data = JSON.parse(e.data);
    var newParagraph = document.createElement("div");
newParagraph.textContent = data.message;
if(from_user_id == data.from_user_id){
    newParagraph.classList.add("talk_bubble");
  let  messageBody = document.getElementById("messageBody").append(newParagraph);
}
if(from_user_id == data.to_user_id){
    newParagraph.classList.add("user_bubble");
    let  messageBody = document.getElementById("messageBody").append(newParagraph);
}
setTimeout(() => {
        scrollToBottom(messageBody, 1000);
    }, 1500);
   
}
let message = document.getElementById('messageInput');
let userIdInput = document.querySelector('input[name="user_id"]');

message.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        send_chat_message(userIdInput.value);
    }
});



function send_chat_message(to_user_id)
{
	document.querySelector('#messageSubmitBtn').disabled = true;

	let message = document.getElementById('messageInput').value.trim();
if(message=='' || message==null){
alert('Message should not empty!');
document.querySelector('#messageSubmitBtn').disabled = false;
return true;
}
	var data = {
		message : message,
		from_user_id : from_user_id,
		to_user_id : to_user_id,
		type : 'request_send_message'
	};

	conn.send(JSON.stringify(data));

	document.querySelector('#messageInput').value = '';

	document.querySelector('#messageSubmitBtn').disabled = false;
}
</script>

   <script>


    const textarea = document.querySelector("textarea");
if(textarea !== null){
    textarea.addEventListener("input", function() {
        // Reset the height to auto in order to get the actual scrollHeight
        textarea.style.height = "auto";
        // Set the height to the scrollHeight or the maximum height of 104px, whichever is smaller
        textarea.style.height = Math.min(textarea.scrollHeight, 104) + "px";
        // Toggle the overflow property based on content height
        textarea.style.overflowY = textarea.scrollHeight > 104 ? "auto" : "hidden";
    });
}
 
</script>
   @endsection

