<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function login(){
       return view('admin.login');
    }

    public function post_login(Request $request){
        //validate
        $request->validate([
            'email'    => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        $data = [
           'email'    => $request->input('email'),
           'password' => $request->input('password')
        ];

        if  (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('msg', 'Email hoặc Password không chính xác');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
    public function create(){
        if (Auth::check()){
           if (Auth::user()->role_id == 1){
              return view('admin.user.create');
           } else
           {
             return redirect()->back()->with('msg', 'Bạn không có quyền');
           }
        }

    }
    public function index(){
        $data = User::latest()->paginate(20);

        return view('admin.user.index',['data' => $data]);
    }
    public function store(Request $request){
        $request->validate([
            'email' => 'required|email|min:4',
            'name' => 'required|max:255',
            'password' => 'required|string|min:6'
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');
        $password = $request->input('password');
        $user->password = bcrypt("$password");
        $user->save();

        return redirect()->route('user.index');
    }
    public function search(Request $request){
        if (Auth::user()->role_id == 1){
            $keyword = $request->input('tu-khoa');
            $data = [];
            $data = User::where(['name', 'like', '%' . $keyword . '%'])
                          ->orWhere(['email', 'like', '%' . $keyword . '%'])->paginate(10);

            return view('admin.user.index',
                    [
                        'data' => $data
                    ]);
        } else
        {
            return redirect()->back()->with('msg', 'Bạn không có quyền');
        }
    }

}

