<?php

namespace App\Http\Controllers;

use App\Models\Usuario; // Importe o Model Usuario
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all(); // Pega todos os usuários da tabela usuarios_cad
        return response()->json($usuarios); // Retorna a lista como JSON
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validação dos dados de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'email' => 'required|string|email|max:255|unique:usuarios_cad,email', // 'unique:tabela,coluna'
        ]);

        $usuarios = Usuario::create($request->all()); // Cria um novo usuário com os dados recebidos
        return response()->json($usuarios, 201); // Retorna o usuário criado com status 201 Created
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // app/Http/Controllers/UsuarioController.php

    public function destroy($id)
    {
        $usuario = Usuario::find($id); // Tenta encontrar o usuário pelo ID

        if (!$usuario) {
            // Se não encontrar, retorna 404 aqui. Isso é esperado e correto.
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $usuario->delete(); // Deleta o usuário

        return response()->json(null, 204); // Retorna 204 No Content (sucesso sem conteúdo)
    }
}
