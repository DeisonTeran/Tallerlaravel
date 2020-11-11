<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usuario;


use App\Publicacion;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\UsuariosRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $Usuario = Usuario::orderBy('id', 'DESC')
                ->paginate(4);

            $Usuario = Usuario::where('id', 'LIKE', '%' . $query . '%')
                ->orwhere('nombres', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'DESC')->paginate(4);

            return view('Usuario.index', ["Usuario" => $Usuario, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = Usuario::orderBy('id', 'DESC')
            ->select('usuarios.id', 'usuarios.nombres')
            ->get();
        return view('Usuario.create')->with('Usuario', $usuario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuariosRequest $request)
    {

        $query = $request->get('nombres');

        //validar nombre de usuario 

        $profession = Usuario::select('nombres')
            ->where('nombres', '=', $query)->first();

        $nombre = $profession;

        if (strlen($nombre) == 0) {

            $query = $request->get('email');

            //validar email

            $profession = Usuario::select('email')
                ->where('email', '=', $query)->first();

            $email = $profession;

            if (strlen($email) == 0) {

                $Usuario = new Usuario;
                $Usuario->nombres = $request->get('nombres');
                $Usuario->email = $request->get('email');
                $Usuario->save();
                return Redirect::to('Usuario');
            } else {

                echo '<script type="text/javascript">
              alert("Email ya registrado en el sistema");
              window.location.href="Usuario/create";
                  </script>';
            }
        } else {
            echo '<script type="text/javascript">
              alert("usuario ya registrado en el sistema");
              window.location.href="Usuario/create";
                  </script>';
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Usuario = Usuario::findOrFail($id);
        return view("Usuario.edit", ["sv" => $Usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuariosRequest $request, $id)
    {
        $query = $request->get('nombres');

        //validar nombre de usuario 
        $profession = Usuario::select('nombres')
            ->where('nombres', '=', $query)->first();

        $nombre = $profession;

        if (strlen($nombre) == 0) {

            $query = $request->get('email');

            //validar email
            
            $profession = Usuario::select('email')
                ->where('email', '=', $query)->first();

            $email = $profession;

            if (strlen($email) == 0) {

                $sv = Usuario::findOrFail($id);
                $sv->nombres = $request->get('nombres');
                $sv->email = $request->get('email');
                $sv->update();
                return Redirect::to('Usuario');
            } else {

                echo '<script type="text/javascript">
              alert("Email ya registrado en el sistema");
              window.location.href="Usuario/create";
                  </script>';
                return Redirect::to('Usuario');
            }
        } else {
            echo '<script type="text/javascript">
              alert("usuario ya registrado en el sistema");
              window.location.href="Usuario/create";
                  </script>';
            return Redirect::to('Usuario');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profession = Publicacion::select('id')
            ->where('usuarios_id', '=', $id)->first();

        $id_pu = $profession;

        if (strlen($id_pu) == 0) {
            $Usuario = Usuario::findOrFail($id);
            $Usuario->delete();
            return Redirect::to('Usuario');
        } else {
            echo '<script type="text/javascript">
              alert("El usuario tiene publicaciones registradas en el sistema. Eliminelas primero para continuar");
              window.location.href="Usuario";
                  </script>';
            return Redirect::to('Usuario');
        }
    }
}
