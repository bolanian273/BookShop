<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        return view('dashboard')->with('posts', $user->posts);
    }

    public function show(){
        
        $date = Carbon::now();

        $users = User::orderBy('updated_at', 'asc')->paginate(20);
            return view('admin.users')->with('users',$users);
        }
        public function destroy($id)
    {
        $user = User::find($id);
       
        $user->delete();
        return redirect('/dashboard/users')->with('success', 'User Removed Successfully');
    }
}
