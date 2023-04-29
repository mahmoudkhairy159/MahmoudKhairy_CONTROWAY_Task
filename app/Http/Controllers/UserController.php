<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

define('paginationCount', 10);

class UserController extends Controller
{

    public function index()
    {
        $users = User::select('id', 'name', 'email', 'status')->paginate(paginationCount);
        return view('adminDashboard.dashboard')->with('users', $users);
    }



    public function verify($id)
    {
        $user = User::find($id);
        $user->update([
            'status' => true
        ]);
        session()->flash('success', 'user verified successfully');
        return redirect()->route('users.index');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
