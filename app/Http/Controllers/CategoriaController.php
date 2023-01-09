<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Exception;

class CategoriaController extends Controller
{
    public function cadastroCategoria()
    {

        $categorias =  Categoria::all();

        return view('events.cadastroCategoria', ['categorias' =>  $categorias]);
    }

    public function store(Request $request)
    {
        $categoria = new Categoria();

        $categoria->descricao = $request->descricaoCategoria;

        $categoria->save();

        return redirect('events/cadastroCategoria')->with('msg', 'Cadastrado com Sucesso!');
    }

    public function delete($id)
    {

        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        return redirect('events/cadastroCategoria')->with('msg', 'Excluido com Sucesso!');
    }


    public function alterarCategoria($id)
    {

        $categoria = Categoria::findOrFail($id);

        return view('events/alterarCategoria', ['categoria' =>  $categoria]);
    }

    public function update(Request $request)
    {
        $categoria = Categoria::findOrFail($request->id);
        $categoria->descricao = $request->descricao;
        $categoria->save();
        return redirect('/events/cadastroCategoria')->with('msg', 'Categoria Alterada com Sucesso!');
    }
}
