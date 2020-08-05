<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupInvitationRequest;
use App\Group;
use App\User;

class GroupInvitationsController extends Controller
{
     /**
     * Invite a new user to the group.
     */
    public function store(Group $group,GroupInvitationRequest $request)
    {
        $user = User::whereEmail(request('email'))->first();

       $invtie= $group->invite($user);

      return response()->json([$invtie,204]);
    }
}
