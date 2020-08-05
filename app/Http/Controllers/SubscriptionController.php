<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Subscription;

class SubscriptionController extends Controller
{
       public function store(Request $request , Group $group){

         $subscription=$group->subscriptions()->create(['user_id'=> auth()->user()->id

]);	
          return response()->json([$group->subscriptions,201]);

}
     public function destroy(Group $group, Subscription $subscription)
     {
        $subscription->delete();

        return response()->json([$subscription,204]);
      }



}


