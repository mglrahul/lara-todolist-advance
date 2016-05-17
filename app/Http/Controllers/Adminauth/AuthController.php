<?php

namespace App\Http\Controllers\Adminauth;

use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;

class AuthController extends Controller {

    use AuthenticatesAndRegistersUsers,
        ThrottlesLogins;

    protected $redirectTo = '/admin/dashboard';
    protected $guard = 'admin';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'username' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return Admin::create([
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

    public function showLoginForm() {
        if (Auth::guard('admin')->user() ) {
            return redirect('/admin/dashboard');
        }else{
           // echo 'test'; die;
            return view('admin.auth.login');
        }

        
    }

    public function showRegistrationForm() {
        return view('admin.auth.register');
    }

    public function resetPassword() {
        return view('admin.auth.passwords.email');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

}