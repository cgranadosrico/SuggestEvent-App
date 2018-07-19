<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Policies\TaskPolicy;

class AuthController extends Controller {

    public function register(Request $request, User $user) {
        $this->validate($request, ['username' => 'required|unique:users', 'name' => 'required', 'email' => 'required|email|unique:users', 'password' => 'required|min:6']);
        $user->create(['username' => $request->username, 'name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password)]);
        return response()->json(null, 201);
    }

    public function getUser(User $user, $id) {
        return $user->find($id)->toArray();
    }

    public function deleteUser(User $user, $id) {
        $userFound = User::find($id);
        $userFound->delete();
        return response()->json(['message' => "Usuario borrado correctamente!"]);
    }

    public function editUsers(Request $request, $id) {
         User::find($id)->update($request->all());
        return response()->json(['message' => "Usuario actualizdo correctamente!"]);
    }

    public function getAll(User $user) {
        return $user->all()->toArray();
    }
}

