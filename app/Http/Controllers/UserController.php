<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        return view('users.index', [
            'users' => DB::table('users')->orderBy('name')->paginate(5),
            // 'usuarios' => User::all(),  
        ]);
    }

    public function edit($id){
        return view('users.edit', [
            'user' => User::findOrFail($id)
            // vai procurar o user pelo id informado  
        ]);
    }

    public function update(Request $id){

        User::findOrFail($id->id)->update($id->all());
        // vai procurar o usuario pelo id informado e atualiza os dados
        return redirect()->route('users.index');
        // serve para retornar para a pagina users.index
    }
}
