<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Repositories\TaskRepository;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
    }
    
    public function profile(Request $request){
//        if ($request->user())
//        {
//            echo '<pre>'; print_r($request->user());
//            // $request->user() returns an instance of the authenticated user...
//        }
        
        $user = Auth::user();
        if ($user)
        {
           // echo '<pre>'; print_r($user);
            return view('users.profile',[
                'users' => $user,
            ]);
            //echo "Hello $user->name";
        }else{
            $errors = 'no record found';
        }
//        if (Auth::check())
//        {
//            echo 'hello';
//        }
//         
//        echo '<pre>'; print_r($this->user->get());
        //die;
        
    }
        
    public function profile_update(Request $request){
        $user = Auth::user();
        if ($user)
        {
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
            ]);
 
            $request->user()->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $landing = 'profile/';
            return redirect($landing);
        }
        
    }
}
