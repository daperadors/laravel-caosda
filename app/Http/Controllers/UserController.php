<?php

namespace App\Http\Controllers;

use App\Models\Estudis;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $groups = Estudis::where('id' ,'>' ,0)->pluck('id')->toArray();
        $users = User::addSelect(['groupname' => Estudis::select('nom') -> whereColumn('id', 'users.group')])
            ->whereIn('group', $groups)->paginate(5);
        $groupsInfo = Estudis::all();
        return view('users', compact('users', 'groupsInfo'));
    }
}
