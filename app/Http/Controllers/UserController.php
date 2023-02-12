<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use App\Models\Estudis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
    public function fitxa(Request $request, $id){
        $user = User::findOrFail($id);
        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> coordinator = $request->coordinator === "on" ? 1 : 0;
        $user -> group = $request->group;
        $user -> save();
        if(Auth::user()->coordinator===1) return redirect()->back();
        return Redirect::to('empresa');
    }
}
