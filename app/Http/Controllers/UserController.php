<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Notifications\Notifiable;

use App\Models\Produto;
use App\Models\Categoria;
use App\Notifications\emailRecuperacaoSenha;
use Exception;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Symfony\Component\VarDumper\VarDumper;

class UserController extends Controller
{
    public function index()
    {
        return view('events.login');
    }

    public function inserirUsuario()
    {
        return view('events.cadastrarUsuario');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $userWithEmail = User::firstWhere(new Expression('UPPER(email)'), '=', strtoupper($request->email));
            return redirect('/')->with('msg', "Bem vindo de volta ".$userWithEmail->name);
        } else {
            Session::flush();
            Auth::logout();
            return redirect('/usuario')->with('msg', 'Dados Invalidos! Tente Novamente!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        session_unset();
        $request->session()->flush();
        return redirect('/');
    }

    public function consultaUsuario()
    {

        $usuarios = User::all();

        return view('events.consultaUsuario', ['usuarios' => $usuarios]);
    }

    public function alterarUsuario($id)
    {

        $usuario = User::findOrFail($id);

        return view('events.alterarUsuario', ['usuario' => $usuario]);
    }

    public function recuperacaoSenha()
    {
        return view('events.recuperarSenha');
    }

    public function update(Request $request)
    {
        $usuario = User::findOrFail($request->id);

        $usuario->name  = $request->name;
        $usuario->email = $request->email;

        if (isset($request->password) and !is_null($request->password)) {
            $usuario->password = bcrypt($request->password);
        }

        $usuario->save();

        return redirect('/events/consultaUsuario')->with('msg', 'Usuário alterado com sucesso!');
    }

    public function delete($id)
    {
        $contUsuarios = DB::select('select count(1) as contador from users;');
        if ($contUsuarios[0]->contador == 1) {
            $usuarios = User::all();
            return view('events.consultaUsuario', ['usuarios' => $usuarios])->with('msg', 'Unico usuário, não pode ser excluido');
        } else {
            $usuario = User::findOrFail($id);
            $usuario->delete();
            $usuarios = User::all();
            return view('events.consultaUsuario', ['usuarios' => $usuarios]);
        }
    }

    public function store(Request $request)
    {

        $contUsuariosNome = DB::select('select count(1) as contador from users where UPPER(name) =? ', [strtoupper($request->name)]);
        $contUsuariosEmail = DB::select('select count(1) as contador from users where UPPER(email) =? ', [strtoupper($request->email)]);

        if (($contUsuariosNome[0]->contador > 0) || ($contUsuariosEmail[0]->contador > 0)) {
            return redirect('/inserirUsuario')->with('msg', 'Já existe usuário com este Nome ou Email!');
        } else {
            $usuario = new User;

            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);
            $usuario->save();
        }
    }

    public function recuperaSenhaUsuario(Request $request)
    {
        /* $contUsuariosEmail = \DB::select('select count(1) as contador from users where UPPER(email) =? ', [strtoupper($request->email)]);
        if ($contUsuariosEmail[0]->contador == 0) {
            return redirect('/recuperacaoSenha')->with('msgError', 'Não existe Usuário cadastrado para este email! Entre em Contado com o Administrador');
        } else {
            $senhaNova = $this->stringAleatoria(7);
            $idUser = \DB::select('select id from users where UPPER(email) =? ', [strtoupper($request->email)]);
            $usuario = User::findOrFail($idUser[0]->id);
            $usuario->password = bcrypt($senhaNova);
            $usuario->save();
            $textoEnvio = 'Sua nova senha é' . $senhaNova . '.';
            //Enviar o email
            $usuario->notify(new emailRecuperacaoSenha($usuario));
            return new \App\Mail\emailRecuperarSenha($request->email, $textoEnvio);
        }*/
        return view('events.login');
    }
    //Rota chamado por ajax
    public function validaEmailUsuario(Request $request)
    {
        $contUsuariosEmail = \DB::select('select count(1) as contador from users where UPPER(email) =? ', [strtoupper($request->email)]);

        if ($contUsuariosEmail[0]->contador == 0) {
            $retorno['emailValido'] = false;
            $retorno['mensagem'] = 'Usuário não Encontrado! Contate o Administrador';
        } else {
            $retorno['emailValido'] = true;
            $retorno['mensagem'] = 'Usuário encontrado para este email!';
        }
        return Response::json($retorno);

    }

    public function stringAleatoria($size)
    {
        $keys = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        $key = '';


        for ($i = 0; $i < ($size + 10); $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return substr($key, 0, $size);
    }
}
