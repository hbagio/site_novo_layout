<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//App tem de ser letra maiscula
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Informacao;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\File;
use Illuminate\Contracts\Cache\Store;

class ProdutoController extends Controller
{
    public function index()
    {
        //pega os dados do model
        $produtos  = DB::table('produtos')
            //Campos de deseja
            ->select('produtos.*', 'categorias.descricao as descricaoCategoria')
            //Join com a tabela e comparação
            ->Join('categorias', 'categorias.id', '=', 'produtos.idcategoria')
            //Ordenação
            ->orderBy('destaque', 'desc')
            //Executa
            ->get();


        $categoria = Categoria::all();
        //retorna para aviwe
        return view('welcome', ['produtos' =>  $produtos, 'categorias' => $categoria]);
    }

    public function cadastroProduto()
    {
        $categoria = Categoria::all();

        return view('events.cadastroProduto', ['categorias' => $categoria]);
    }

    public function listarProduto()
    {
        //pega os dados do model
        $produtos = Produto::all();
        $categoria = Categoria::all();
        //retorna para aviwe
        return view('events.listarProduto', ['produtos' =>  $produtos, 'categorias' => $categoria]);
    }


    public function store(Request $request)
    {
        $produto = new Produto;

        $produto->nome = $request->identificacao;
        if ($request->valor > 0) {
            $produto->valor = $request->valor;
        } else {
            $produto->valor = 0;
        }

        $produto->descricao = $request->descricao;
        $produto->destaque = $request->destaque;
        $produto->idcategoria = $request->categoria;


        //Upload controle
        //Verifica se tem uma imagem da requisição e se ela é valida
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImage = $request->imagem;
            $extensao = $requestImage->extension();
            $imagemNome = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extensao;
            $request->imagem->move(public_path('img/produtos'), $imagemNome);
            $produto->imagem = $imagemNome;
        }

        $produto->save();

        return redirect('events/listarProduto')->with('msg', 'Produto Cadastrado com Sucesso!');
    }

    public function getDadosProduto($id)
    {
        $produto   = Produto::findOrFail($id);
        $categoria = Categoria::findOrFail($produto->idcategoria);

        $retorno = DB::select('select whatsapp from informacoes where id = (select MAX(id) from informacoes)');
        $whatsapp =  $retorno[0];
        $numero =   preg_replace('/[^0-9]/', '', $whatsapp->whatsapp);
        $url = 'https://wa.me/55' . $numero. '?text=Ola! Tenho Interresse no Produto: ' . $produto->id . ' - ' . $produto->nome;

        return array(
            'nome' => $produto->nome,
            'descricao' => $produto->descricao,
            'valor' => ($produto->valor > 0) ? "R$ " . number_format($produto->valor, 2, ',') : 'À Combinar',
            'imagem' => "/img/produtos/" . $produto->imagem,
            'categoria' => $categoria->descricao,
            'urlContato' => $url
        );
    }

    public function buscaComCategoria(Request $request)
    {
        $filtro_pesquisa = $request->filtro_pesquisa;
        $categoriaSelect = $request->categoriaSelect;

        if (strlen($filtro_pesquisa) > 0) {
            $produtos = DB::select('Select produtos.*,
                                        categorias.descricao as descricaoCategoria
                                    from produtos
                                    inner join categorias on
                                    produtos.idcategoria = categorias.id
                                    where nome like ?', ['%' . $filtro_pesquisa . '%']);
        } elseif ($categoriaSelect > 0) {
            $produtos = DB::select('Select produtos.*,
                                        categorias.descricao as descricaoCategoria
                                    from produtos
                                    inner join categorias on
                                    produtos.idcategoria = categorias.id
                                    where idcategoria  = ?', [$categoriaSelect]);
        } else {
            $produtos = DB::select('select produtos.*,
                                           categorias.descricao as descricaoCategoria
                                    from produtos
                                    inner join categorias on
                                        produtos.idcategoria = categorias.id
                                    where idcategoria  >= ?', [0]);
        }

        $categoria = Categoria::all();


        return view('welcome', ['produtos' => $produtos, 'categorias' => $categoria]);
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id)->delete();

        return redirect('events/listarProduto')->with('msg', 'Produto excluido com sucesso!');
    }



    public function alterarProduto($id)
    {
        $produto = Produto::findOrFail($id);

        $categoria = Categoria::findOrFail($produto->idcategoria);

        return view('events/alterarProduto', ['produto' => $produto, 'categoria' => $categoria]);
    }

    public function update(Request $request)
    {
        $produto = Produto::findOrFail($request->id);
        $produto->nome = $request->nome;
        $produto->valor = $request->valor;
        $produto->descricao = $request->descricao;
        $produto->destaque = $request->destaque;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $produtoOld = $produto->imagem;

            $requestImage = $request->imagem;
            $extensao = $requestImage->extension();
            $imagemNome = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extensao;
            $request->imagem->move(public_path('img/produtos'), $imagemNome);
            $produto->imagem = $imagemNome;

            //Excluir a imagem antiga
            $path = "img/produtos/";
            $diretorio = dir($path);
            while ($arquivo = $diretorio->read()) {
                if (strpos($arquivo,  $produtoOld) !== false) {
                    unlink($path . $arquivo);
                }
            }

            $diretorio->close();
        }

        $produto->save();



        $produtos = Produto::all();
        //retorna para aviwe
        return view('events.listarProduto', ['produtos' =>  $produtos]);
    }
}
