<?php

namespace App\Http\Controllers;

use Validator;
use Hash;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\UserDetail;
use App\UserBodyShape;

class PublicController extends Controller
{
    public function  is_unique_mail($email)
    {
        $user = User::where('email', $email)->first();
        if ($user == null) {
            return 1;
        } else {
            return 0;
        }
    }

    public function register()
    {
        return view('pages.register');
    }



    public function blog()
    {
        return view('frontend.pages.blog');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function privacy()
    {
        return view('frontend.pages.privacy');
    }


    public function terms()
    {
        return view('frontend.pages.terms');
    }

    public function alpha()
    {
        return view('frontend.pages.alpha');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function webstore()
    {
        return view('frontend.pages.webstore');
    }

    public function feedback()
    {
        return view('frontend.pages.feedback');
    }

    public function fashion()
    {
        $title = 'Fasion Dictionary';
        return view('frontend.pages.fashion-dictionary', compact('title'));
    }
    public function metric_conversion()
    {
        return view('frontend.pages.metric-conversion');
    }
}
