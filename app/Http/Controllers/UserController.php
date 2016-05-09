<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use File;
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
      // echo '<pre>';print_r($request->all());
        $user = Auth::user();
        if ($user)
        {
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'gender' => 'required',
                'image' => 'mimes:jpeg,bmp,png|required|max:10000|unique:users,image,'.$user->id,
            ]);
 
//            var_dump(Input::all());
//            $file= Input::file('image');
    
            $file = Input::file('image');
            @unlink('uploads/images/'.$user->image); 
            //echo $user->image;
            //die;
            $destinationPath = 'uploads/images';
            $extension = $file->getClientOriginalExtension(); 
            $filename = str_random(12).".{$extension}";
            $upload_success = Input::file('image')->move($destinationPath, $filename);

            if( $upload_success ) {
                //echo 'file upload<br/>'.$filename;
            }
            
            $request->user()->update([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'image' => $filename,
            ]);
            
            //unlink('/uploads/images/'.$user->image);
           
            //DB::table('users')->toSql(); 
//            echo '<pre>'; print_r($request->file('image'));
//            $imageName = $user->id . '.' . $request->file('image')->getClientOriginalExtension();
//
//            echo $imageName;
//            $request->file('image')->move(
//                base_path() . '/uploads/images/', $imageName
//            );
//             die;
            $landing = 'profile/';
            return redirect($landing);
        }
    }
}
