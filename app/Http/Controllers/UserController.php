<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $resquest)
    {
        User::where('id', auth()->user()->id)->update([
            'name' => $resquest->input('name')
        ]);

        return response()->json([
            'message' => 'usuario atualizado com sucesso!',
        ],200);
    }
}
