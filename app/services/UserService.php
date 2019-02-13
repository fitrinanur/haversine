<?php
/**
 * Created by PhpStorm.
 * User: eggy
 * Date: 10/24/18
 * Time: 8:59 PM
 */

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function store($request)
    {
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'address' => $request->address
        ]);
        return $user;
    }

    public function update($request, $user)
    {
        if ($request->password) {
            $user->password = $request->password;
        }

        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->update();

        return $user;
    }

}
