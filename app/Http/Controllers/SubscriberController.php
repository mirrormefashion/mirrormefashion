<?php

namespace App\Http\Controllers;

use App\Mail\EmailManager;
use Illuminate\Http\Request;
use App\Subscriber;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscriber::orderBy('created_at', 'desc')->paginate(15);
        return view('backend.marketing.subscribers.index', compact('subscribers'));
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
        $subscriber = Subscriber::where('email', $request->email)->first();
        if($subscriber == null){
            $subscriber = new Subscriber;
            $subscriber->email = $request->email;
            $subscriber->save();
            $array['view'] = 'emails.subscribe';
            $array['subject'] = "Mirrorme fashion";
            $array['from'] = env('MAIL_FROM_ADDRESS');
            $array['content'] = "Thanks For subscribe.";

            try {
                Mail::to($request->email)->queue(new EmailManager($array));
            } catch (\Exception $e) {
                dd($e);
            }


            flash(translate('You have subscribed successfully'))->success();
        }
        else{
            flash(translate('You are  already a subscriber'))->success();
        }
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subscriber::destroy($id);
        flash(translate('Subscriber has been deleted successfully'))->success();
        return redirect()->route('subscribers.index');
    }
}
