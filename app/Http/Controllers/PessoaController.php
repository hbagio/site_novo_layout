<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    public function consultaPessoas(){
            $pessoas = Pessoa::all();

          return view('events.consultaPessoas',['pessoas'=>  $pessoas ]);
    }

    public function cadastrarPessoas(){
        $pessoas = Pessoa::all();

      return view('events.cadastroPessoa');
}



    public function incluirPessoas(Request $request){

        $pessoa = new Pessoa();

        $pessoa->nome = $request->nome;
        $pessoa->cep = $request->cep;
        $pessoa->cpfcnpj = $request->cpfcnpj;
        $pessoa->endereco = $request->endereco;
        $pessoa->telefone = $request->telefone;
        $pessoa->bairro = $request->bairro;
        $pessoa->estado = $request->estado;
        $pessoa->tipo = $request->tipo;
        $pessoa->cidade = $request->cidade;
        $pessoa->email = $request->email;

        $pessoa->save();

        return view('events.cadastroPessoa');
  }

}
