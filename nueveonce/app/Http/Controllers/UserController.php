<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UserController extends Controller
{
     public function store(Request $request)
    {
        User::create($request->all());
        return ['created' => true];
    }
    
        public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return ['updated' => true];
    }
    
    public function show($id)
    {
        return User::find($id);
    }
    
    public function destroy($id)
    {
        User::destroy($id);
        return ['deleted' => true];
    }

}
