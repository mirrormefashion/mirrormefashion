<?php

namespace App\Http\Controllers;

use App\BodyStat;
use App\Conversation;
use App\Http\Resources\PostCollection;
use App\Mail\NotificationEmailManager;
use App\Models\BodyData;
use App\Models\Comment;
use App\Models\Post;
use App\Notifications\CommentNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use App\Traits\UserValidationTrait;
use Validator;
use App\Upload;
use App\Traits\UploadTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Response;

use Storage;
use Image;

class SocialController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use UserValidationTrait;
    use UploadTrait;
    public function index($user_name)
    {

        $user = User::where('user_name', $user_name)->first();
        // $all_uploads =  Upload::where('user_id', $user->id);
        // $all_uploads = $all_uploads->paginate(60)->appends(request()->query());
        if (!$user) {
            return abort(404);
        }


        // $bodyShapes = bodyShapes();

        // $shape = $user->bodyData->shape != '' ? $bodyShapes[$user->bodyData->shape] : $bodyShapes['empty'];


        return view('frontend.social.profile',compact('user'));
    }


    public function search_friends_ajax(Request $request)
    {


        $user = Auth::user();
        $friends = $user->getFriends();
        $search_friends = null;
        // $sort_by = null;

        if ($request->searchFriends != null) {
            $search_friends = $request->searchFriends;
            $friends =    $friends->where('name', 'like', '%' . $search_friends . '%');
        }
        return response()->json($friends);
    }

    
    public function getUserProfile(Request $request)
    {



        // $all_uploads =  Upload::where('user_id', auth()->user()->id)->orderBy('id', 'DESC');
        // $user = Auth::user();
        // $friends = $user->getFriends();
        // $find_friends = null;
        // if ($request->find_friends != null) {
        //     $find_friends = User::where('name', 'like', '%' . $request->find_friends . '%')->get();
        // }

        // $users_by_conversation = Conversation::join('users',  function ($join) {
        //     $join->on('conversations.sender_id', '=', 'users.id')
        //         ->orOn('conversations.receiver_id', '=', 'users.id');
        // })
        //     ->where(function ($q) {
        //         $q->where('conversations.sender_id', Auth::user()->id)
        //             ->orWhere('conversations.receiver_id', Auth::user()->id);
        //     })
        //     ->orderBy('conversations.created_at', 'desc')
        //     ->get()
        //     ->unique('id');
        // $all_uploads = $all_uploads->paginate(60)->appends(request()->query());


        //  $posts = Post::orderBy('created_at', 'DESC')->get();

         $top_friend = json_decode(Auth::user()->top_10_friends);

         $top_friends = User::whereIn('id',json_decode(Auth::user()->top_10_friends))->get()->where('status', 1);
        // $bodyShapes = bodyShapes();
        // $shape = $user->bodyData->shape != '' ? $bodyShapes[$user->bodyData->shape] : $bodyShapes['empty'];
       
       
        return view('frontend.social.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }
    public function commentStore(Request $request)
    {
       
      
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string',

        ]);

        if ($validator->fails()) {
            flash(translate('Something is Wrong!'))->error();
            return back();
        }
       
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user()->associate($request->user());
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);
        $user = Auth::user();

        $recipient = $post->user;

        if ($user->id != $recipient->id) {
            //sends email to User 
            if (env('MAIL_USERNAME') != null && isNotify($recipient)) {
                $array['view'] = 'emails.notification';
                $array['subject'] = 'A comment was added your post!';
                $array['from'] = env('MAIL_FROM_ADDRESS');
                $array['user_name']=$user->name;
                $array['type']="comment";

                try {
                    Mail::to($recipient->email)->queue(new NotificationEmailManager($array));
                } catch (\Exception $e) {
                }
            }

            Notification::send($recipient, new CommentNotification($user));
        }
        return back();
    }

    public function commentReplyStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',

        ]);

        if ($validator->fails()) {
            flash(translate('Something is Wrong!'))->error();
            return back();
        }
       
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function settings(){
return view('frontend/social/settings');
    }
    public function friend_page(){
        return view('frontend/social/friend');
    }
    public function media_page(){
        $medias =  Upload::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('frontend/social/media',compact('medias'));
    }
    public function messanger_page(){
        $users_by_conversation = Conversation::join('users',  function ($join) {
            $join->on('conversations.sender_id', '=', 'users.id')
                ->orOn('conversations.receiver_id', '=', 'users.id');
        })
            ->where(function ($q) {
                $q->where('conversations.sender_id', Auth::user()->id)
                    ->orWhere('conversations.receiver_id', Auth::user()->id);
            })
            ->orderBy('conversations.created_at', 'desc')
            ->get()
            ->unique('id');

       


        return view('frontend.social.messanger', compact('users_by_conversation'));

    }
    public function notification_page(){
        return view('frontend.social.notification');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_profile(Request $request)
    {
       
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',

        ]);

        if ($validator->fails()) {
            flash(translate('Something is Wrong!'))->error();
            return back();
        } else {
            $user->name = $request->name;
        }
            $user->nick_name = $request->nick_name;
        if (auth()->user()->user_name != $request->user_name) {
            $validator =    Validator::make($request->all(), ['user_name'    => ['required', 'string', 'max:255', 'unique:users']]);
            if ($validator->fails()) {
                flash(translate('The User Name is already  taken !'))->error();
                return back();
            }

            $user->user_name = $request->user_name;
        }
      
        if (auth()->user()->email != $request->email) {
            $validator =    Validator::make($request->all(), ['email'    => ['required', 'string', 'email', 'max:255', 'unique:users']]);
            if ($validator->fails()) {
                flash(translate('The email is already taken !'))->error();
                return back();
            }
            $user->email = $request->email;
        }
        
        if (auth()->user()->phone != $request->phone) {
            $validator =    Validator::make($request->all(), ['phone'    => ['required', 'string', 'max:255', 'unique:users']]);
            if ($validator->fails()) {
                flash(translate('The phone number is already taken !'))->error();
                return back();
            }
            $user->phone = $request->phone;
        }


        if ($user->update()) {
            flash('Setting has been changed')->success();
        }
        return back();
    }
    public function update_website_links(Request $request)
    {
        $user = Auth::user();
        $user->website_links =  $request->website_links;

        if ($user->update()) {
            flash('Links has been changed')->success();
        }
        return back();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function change_password(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|max:12| min:5'

        ]);

        if ($validator->fails()) {
            flash(translate('Someting is wrong!'))->error();
            return back();
        }

        $user = auth()->user();
        $user->password = Hash::make($request->password);
        if ($user->update()) {
            flash('Password has been changed')->success();
        }
        return back();
    }

    public function profilePicChange(Request $request)
    {
        $upload = $this->upload($request);

        $user = Auth::user();
        $user->avatar = $upload;
        if ($user->update()) {
            flash('Profile picture has been changed')->success();
        }
        return back();
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function privecy_setting_update(Request $request)
    {

        $user = User::find(Auth::User()->id);
        if ($request->has('is_hide_birthday')) {
            $user->is_hide_birthday = $request->is_hide_birthday;
        } else {
            $user->is_hide_birthday = 0;
        }
        if ($request->has('is_hide_body_shape')) {
            $user->is_hide_body_shape = $request->is_hide_body_shape;
        } else {
            $user->is_hide_body_shape = 0;
        }
        if ($request->has('is_hide_favorites')) {
            $user->is_hide_favorites = $request->is_hide_favorites;
        } else {
            $user->is_hide_favorites = 0;
        }
        if ($request->has('status')) {
            $user->status = $request->status;
        } else {
            $user->status = 1;
        }
        if ($user->update()) {
            flash('Setting has been changed')->success();
        }
        return back();
    }
    public function about_setting_update(Request $request)
    {
        $user = User::find(Auth::User()->id);
        $user->about = $request->about;
        $user->country = $request->country;
        $user->location = $request->location;
        $user->birthday = $request->birthday;
        $user->relationship_status = $request->relationship_status;
        if ($user->update()) {
            flash('Setting has been changed')->success();
        }
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function body_shape()
    {
        return view('frontend/social/bodyshape');
    }
  

    public function update_body_data( Request $request){
       
     
        $user = Auth::user();
        $bodydata = BodyData::where('user_id', $user->id)->first();
        $body_stat= BodyStat::where('user_id', $user->id)->first();
        //Body model Slider value 
        $bodydata->head_shape = $request->head_shape;
        $bodydata->head_size= $request->head_size;
        $bodydata->neck_shape = $request->neck_shape;
        $bodydata->neck_height = $request->neck_height;
        $bodydata->neck_width = $request->neck_width;
        $bodydata->shoulder_height = $request->shoulder_height;
        $bodydata->shoulder_width = $request->shoulder_width;
        $bodydata->arm_size = $request->arm_size;
        $bodydata->breasts_shape = $request->breasts_shape;
     
        $bodydata->stomach_shape = $request->stomach_shape;
       
        $bodydata->legs_size = $request->legs_size;
        $bodydata->hips_size = $request->hips_size;
      
     
        //Body model css possiton data 
       

         //male only
         if ($request->torso_height != null && $request->crotch_height !=null) {
            $bodydata->torso_height = $request->torso_height;
            $bodydata->crotch_height = $request->crotch_height;
            $body_stat->torso_height_val  =$request->torso_height_val;
            $body_stat->crotch_height_val  =$request->crotch_height_val;
        
        }
        $body_stat->head_shape_val = $request->head_shape_val;
        $body_stat->head_size_val = $request->head_size_val;
        $body_stat->neck_shape_val  =$request->neck_shape_val;
        $body_stat->neck_height_val  =$request->neck_height_val;
        $body_stat->neck_width_val  =$request->neck_width_val;
        $body_stat->shoulder_height_val  =$request->shoulder_height_val;
        $body_stat->shoulder_width_val  =$request->shoulder_width_val;
        $body_stat->arm_size_val  =$request->arm_size_val;
        $body_stat->breasts_shape_val  =$request->breasts_shape_val;
        $body_stat->stomach_shape_val  =$request->stomach_shape_val;
    
        $body_stat->leg_size_val  =$request->leg_size_val;
        $body_stat->hip_size_val  =$request->hip_size_val;

        $body_stat->head_bg_pos = $request->head_bg_pos;
        $body_stat->breasts_bg_pos = $request->breasts_bg_pos;
        $body_stat->neck_bg_pos = $request->neck_bg_pos;
        $body_stat->shoulders_bg_pos = $request->shoulders_bg_pos;
        $body_stat->stomach_bg_pos = $request->stomach_bg_pos;
        $body_stat->legs_bg_pos = $request->legs_bg_pos;
        $body_stat->weight_class = $request->weight_class;
        if ($bodydata->update() && $body_stat->update() ) {
            flash('Body Data has been Updated')->success();
        }
        return back();
    }
    public function notify_update(Request $request)
    {

        $user = Auth::user();
        if ($request->time == 1) {
            $user->is_notify = $request->time;
            if ($user->update()) {
                flash('Notification has been unmuted')->success();
            }
        } elseif ($request->time == 0) {
            $user->is_notify = $request->time;
            if ($user->update()) {
                flash('Notification has been muted')->warning();
            }
        } else {
            $now =  Carbon::now();
            $time  = $now->addMinutes($request->time);
            $user->is_notify = $time;
            if ($user->update()) {
                flash('Notification has been muted')->warning();
            }
        }

        return back();
    }
}
