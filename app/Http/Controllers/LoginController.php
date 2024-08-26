<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

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
        // Kullanıcıyı veritabanında ara
        $user = User::where('Username', $username)->where('Password',$password)->first();

        

        if(empty($user)){
            $errors[]= 'Şifre yanlış.';
        }

        if (empty($errors)) {
            // Giriş başarılı, oturum başlat
            return redirect('/anasayfa'); // Giriş sonrası yönlendirme
        }
        else{
            return redirect('/')
            ->withErrors($errors);
        }
    }

}
