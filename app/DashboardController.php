<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\User;
use App\UserDetail;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        return view('pages.profile');
    }

    /**
     * update profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile_update(Request $request)
    {
        $value = $request->value;

        if ('username' === $request->field_name) {
        	if (empty($value)) {
        		return response([
		            'status' => 0,
		            'errors' => 'The username field is required.',
		        ]);
        	}else{
        		if (User::where('username', $value)->where('id', '!=', auth()->user()->id)->count() > 0) {
        			return response([
			            'status' => 0,
			            'errors' => 'The username has already been taken.',
			        ]);
        		}
        	}
        }

        if ('email' === $request->field_name) {
        	if (empty($value)) {
        		return response([
		            'status' => 0,
		            'errors' => 'The email field is required.',
		        ]);
        	}else{
        		if (User::where('email', $value)->where('id', '!=', auth()->user()->id)->count() > 0) {
        			return response([
			            'status' => 0,
			            'errors' => 'The email has already been taken.',
			        ]);
        		}
        	}
        }

        if ('password' === $request->field_name) {
        	if (empty($value)) {
        		return response([
		            'status' => 0,
		            'errors' => 'The password field is required.',
		        ]);
        	}elseif(strlen($value) < 8){
        		return response([
		            'status' => 0,
		            'errors' => 'The password must be at least 8 characters.',
		        ]);
        	}
        }

        if ('date_of_birth' === $request->field_name) {
        	if (empty($value)) {
        		return response([
		            'status' => 0,
		            'errors' => 'The birthday field is required.',
		        ]);
        	}
        }

        if ('location' === $request->field_name || 'relationship_status' === $request->field_name || 'date_of_birth' === $request->field_name || 'about' === $request->field_name)
        {
        	auth()->user()->detail()->update([$request->field_name => trim($request->value)]);
        }else{
        	auth()->user()->update([$request->field_name => $request->value]);
        }

        if ('date_of_birth' === $request->field_name) {
        	$response_value = date('F d, Y', strtotime(auth()->user()->detail->date_of_birth));
        }else{
        	$response_value = $request->value;
        }

    	return response([
            'status' => 1,
            'response_value' => $response_value,
            'success' => 'Profile update successfully.',
        ]);
    }

    public function profile_photo_update(Request $request){

    	$validation = Validator::make($request->all(), [
	      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024'
	     ]);

	     if($validation->passes())
	     {
	      $image = $request->file('image');
	      $name = rand() . '.' . $image->getClientOriginalExtension();
	      $image->move(public_path('images/user_uploads'), $name);
	      auth()->user()->update(['image' => $name]);
	      
	      	return response([
	            'status' => 1,
	            'success' => 'Profile photo update successfully.',
        	]);
	     }

      	return response()->json([
      		'status' => 0,
       		'errors'   => $validation->errors()->all()
      	]);
    }

    public function profile_deactive(){
        auth()->user()->delete();
        return redirect()->back()->with('success', 'Success! Your account will be permanently deleted from our system in 30 days.');
    }
}
