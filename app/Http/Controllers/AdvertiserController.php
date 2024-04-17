<?php

namespace App\Http\Controllers;

use App\Models\Advertiser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertiserController extends Controller
{
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_advertiser(Request $request)
    {
       
       $advertiser = new Advertiser();
      
       $advertiser->email = $request->email;
       $advertiser->company_name = $request->company_name;
       $advertiser->description = $request->description;
       if($advertiser->save()){
        flash(translate('Registration successfull.'))->success();
        return back();
       }else{
        flash(translate('Registration Filed.'))->warning();
       }
    }

}
