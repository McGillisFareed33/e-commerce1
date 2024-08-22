<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.userList', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.userAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Form verilerini doğrula
        $request->validate([
            'Username' => 'required|alpha_num|unique:users',
            'Password' => 'required|min:6',
        ]);

        // Yeni kullanıcı oluştur ve veritabanına kaydet
        $user = User::create([
            'Username' => $request->Username,
            'Password' => $request->Password,
        ]);
    
        // UserTitle'ı oluştur ve güncelle
        $user->UserTitle = $user->Username . '-' . $user->id;
        $user->save();
    
        // Başarılı bir şekilde kaydedildi mesajı ve yönlendirme
        return redirect()->route('kullanici.listesi')->with('success', 'Kullanıcı başarıyla kaydedildi!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Kullanıcıyı ID'sine göre al
        $user = User::findOrFail($id);

        // Düzenleme formunu döndür
        return view('user.useradj', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Form verilerini doğrula
        $request->validate([
            'Username' => 'required|string|alpha_num|unique:users',
            'Password' => 'nullable|string|min:6',
        ]);
        // Kullanıcıyı ID'sine göre al
        $user = User::findOrFail($id);

        // Kullanıcı bilgilerini güncelle
        $user->Username = $request->Username;

        if ($request->filled('Password')) {
            $user->Password = $request->Password;
        }

        $user->UserTitle = $user->Username . '-' . $user->id;
        $user->save();

        // Başarılı bir şekilde güncellendi mesajı ve yönlendirme
        return redirect()->route('kullanici.duzenleme', $id)->with('success', 'Kullanıcı başarılıyla güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('kullanici.listesi', $id)->with('success', 'Kullanıcı başarılıyla silindi!');
    }
}
