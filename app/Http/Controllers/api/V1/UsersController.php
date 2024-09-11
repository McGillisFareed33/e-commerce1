<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Resources\V1\UserResource;
use App\Http\Resources\V1\UserCollection;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\V1\StoreUserRequest;
use App\Http\Requests\V1\UpdateUserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return new UserCollection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        return new UserResource(User::create($request->all()));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        
        $user->update($request->all());
        return response()->json(['message' => 'Kullanıcı başarıyla güncellendi']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Kullanıcı bulunamadı']);
        }

        $user->delete();

        return response()->json(['message' => 'Kullanıcı başarıyla silindi']);
    }
}

