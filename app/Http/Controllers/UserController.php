<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $sql = "SELECT 
                    *
                FROM
                    users";

        $users = DB::select($sql);

        return response()->json($users, 200);
    }

    public function select($id)
    {
        $sql = "SELECT * FROM
                    users
                WHERE
                    id = $id";

        $user = DB::select($sql);

        return response()->json($user, 200);
    }

    public function register(Request $request)
    {
        $name = $request->input('name');
        $cpf = $request->input('cpf');
        $academico = $request->input('academico');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $phone = $request->input('phone');

        $sql = "INSERT INTO 
                    users (NAME, cpf, academico, email, password, phone) 
                VALUES 
                    ( '$name',  $cpf,  $academico, '$email', '$password', $phone )";

        DB::insert($sql);

        return response()->json('Usuario cadastrado com sucesso!', 201);
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $cpf = $request->input('cpf');
        $academico = $request->input('academico');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $phone = $request->input('phone');

        $sql = "UPDATE users 
                SET 
                    name = '$name',
                    cpf = $cpf,
                    academico = $academico,
                    email = '$email',
                    password = '$password',
                    phone = $phone
                WHERE
                    id = $id";

        DB::update($sql);

        return response()->json('Usuario atualizado com sucesso!', 200);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM 
                    users 
                WHERE
                    id = $id";

        DB::delete($sql);

        return response()->json('Usuario deletado com sucesso', 200);
    }
}