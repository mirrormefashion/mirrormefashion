@extends('frontend.layouts.app')
@section('content')
<section class="container feedback-layout">
    <h1>Mirror Me Fashion in Beta</h1>
    <h2>Feedback Form</h2>
    <p>Welcome to the Beta launch of the world's first and only <a href="">AI Powered Virtual Fashion Stylist</a>. We are extremely pleased to hear from you. Sharing the 
    device, browser, and operating system that you used to view the site today along with your feedback would be helpful. If you don't know this information, that’s okay. 
    </p>
    <p>Answer each question to the best of your ability. Attach screenshots and photos of your issue if you have any. Use the comment section at the end to give us any 
    additional feedback that you want to offer not covered in the questions. 
    </p>
    <form method="POST" action="{{route('feedback.store')}}" id="feedback_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="feedback[survey_id]" value="{{$survey->id}}">
        <div class="feedback-form-group" id="feedback_name">
            <label for="feedback_name">Your Full Name</label>
            <input type="text" required class="form-control" id="feedback_name_input" name="feedback[name]" placeholder="Enter your first and last name. Optional">
        </div>
        <div class="feedback-form-group" id="feedback_email">
            <label for="feedback_email">Your Email Address</label>
            <input type="email" required class="form-control" id="feedback_email_input" name="feedback[email]" placeholder="Enter your email address. Optional">
        </div>
     

        @foreach ($survey->questions as $key => $question)
        <input type="hidden" name="renponses[{{$key}}][question_id]" value="{{$question->id}}">
        <div class="feedback-form-group">
            <label for="">{{$question->question}}</label><br>
       
       
        @foreach ($question->answers as $answer)
        @if ($question->type=='text')
      <textarea id="answer{{$answer->id}}" name="renponses[{{$key}}][aditional_info]"  rows="4" cols="60" >
            {{$answer->answer}}
        </textarea>
        
       
        <input type="hidden" id="answer{{$answer->id}}" name="renponses[{{$key}}][answer_id]" value="{{$answer->id}}">
        @elseif ($question->type=='radio')
        <input type="radio" id="answer{{$answer->id}}" name="renponses[{{$key}}][answer_id]" value="{{$answer->id}}">
        <label for="answer{{$answer->id}}">{{$answer->answer}}</label><br>
      
        
       
        @elseif ($question->type=='select')
        <input type="checkbox" id="answer{{$answer->id}}" name="renponses[{{$key}}][answer_id][]" value="{{$answer->id}}">
        <label for="answer{{$answer->id}}">{{$answer->answer}}</label><br>
       

        @elseif ($question->type=='file')
        <label for="answer{{$answer->id}}">{{$answer->answer}}</label><br>
        <input type="hidden" name="renponses[{{$key}}][answer_id]" value="{{$answer->id}}">
        <input type="file" id="answer{{$answer->id}}" name="renponses[{{$key}}][media]" >
        @endif
        
        
        @endforeach
       
       
        @if ($question->editional_info	 !== null)
        <textarea id="answer{{$answer->id}}" name="renponses[{{$key}}][aditional_info]" rows="4" cols="60">
            {{$question->editional_info	}}
        </textarea> 
        @endif

        </div>
       
        @endforeach
     
        <input type="submit" class="btn" value="Submit" id="submit_feedback">
    </form>
</section>

@endsection