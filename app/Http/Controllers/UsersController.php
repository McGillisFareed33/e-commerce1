<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Form verilerini doğrula
        $request->validate([
            'Username' => 'required|alpha_num|unique:users',
            'password' => 'required|min:6',
        ]);

        // Yeni kullanıcı oluştur ve veritabanına kaydet
        $user = User::create([
            'Username' => $request->Username,
            'password' => Hash::make($request->password),
            'UserTitle' => $request->UserTitle
        ]);
    
        $user->save();
    
        // Başarılı bir şekilde kaydedildi mesajı ve yönlendirme
        return redirect()->route('user.list')->with('success', 'Kullanıcı başarıyla kaydedildi!');
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
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Form verilerini doğrula
        $request->validate([
            'password' => 'nullable|string|min:6',
            'UserTitle' => 'nullable|string'
        ]);
        // Kullanıcıyı ID'sine göre al
        $user = User::findOrFail($id);

        if($user->Username !== $request->Username){
        $request->validate([
            'Username' => 'required|string|alpha_num|unique:users'
        ]);
        }

        $user->Username = $request->Username;
        
        if ($request->filled('UserTitle')) {
            $user->UserTitle = $request->UserTitle;
            }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password); // Şifreyi hashle
        }
        
        $user->save();

        // Başarılı bir şekilde güncellendi mesajı ve yönlendirme
        return redirect()->route('user.edit', $id)->with('success', 'Kullanıcı başarılıyla güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.list', $id)->with('success', 'Kullanıcı başarılıyla silindi!');
    }
}
