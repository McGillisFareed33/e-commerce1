<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Form verilerini al
        $username = $request->input('username');
        $password = $request->input('password');

        // Kullanıcı adı ve şifre alanlarını kontrol et
        if (empty($username)) {
            $errors[] = 'Kullanıcı adı gerekli.';
        }

        if (empty($password)) {
            $errors[] = 'Şifre gerekli.';
        }

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('Username', $username)->first();
        if(empty($user)){
            $errors[]= 'Kullanıcı adı yanlış.';
        }    

        $user = User::where('Username', $username)->where('password',$password)->first();
        if(empty($user)){
          $errors[]= 'Şifre yanlış.';
        }

        if (Auth::attempt(['Username' => $username, 'password' => $password])) {
           return redirect('/anasayfa'); 
           
        }else{
            return redirect('/login')
            ->withErrors($errors);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        
        // Oturum sonlandırıldığında kullanıcıyı giriş sayfasına yönlendir
        return redirect('/login');
    }

}
