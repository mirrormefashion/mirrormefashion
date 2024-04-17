<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Resources\V2\CustomerResource;
use App\Models\Customer;
use App\User;

class CustomerController extends Controller
{
    public function show($id)
    {
        return new CustomerResource(Customer::find($id));
    }
    public function get_user_by_email($email){
$user = User::where('email',$email)->first();
$data = $user->bodyData;


return response()->json($data);
    }
}
