<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Publicacion;

use App\Usuario;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\PublicacionCreateRequest;

class PublicacionController extends Controller
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
            $Publicacion = Publicacion::orderBy('id', 'DESC')
                ->paginate(3);

            $Publicacion = Publicacion::where('titulo', 'LIKE', '%' . $query . '%')
                ->orwhere('usuarios_id', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'DESC')->paginate(3);

            return view('Publicacion.index', ["Publicacion" => $Publicacion, "searchText" => $query]);
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
        return view('Publicacion.create')->with('Publicacion', $usuario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicacionCreateRequest $request)
    {
        //require 'db_connection.php';
        $query = $request->get('Id');

        //validacion de que el usuario exixta en el sistema

        /**$get_data = mysqli_query($conn, "SELECT id FROM `usuarios` where usuarios.id = '$query'");


        $row = mysqli_fetch_assoc($get_data);*/
        $profession = Usuario::select('id')
            ->where('id', '=', $query)->first();

        $id_u = $profession;

        if (strlen($id_u) == 0) {
            echo '<script type="text/javascript">
              alert("usuario no registrado en el sistema");
              window.location.href="Publicacion/create";
                  </script>';
        } else {

            $titulo = $request->get('titulo');

            /**$get_data = mysqli_query($conn, "SELECT titulo FROM `publicacions` where publicacions.usuarios_id not in ('$query') and publicacions.titulo='$titulo'");

            $roww = mysqli_fetch_assoc($get_data);*/
            $profession = Publicacion::select('titulo')
                ->where('titulo', '=', $titulo)->first();

            $dato = $profession;

            if (strlen($dato) == 0) {
                $dato = $profession;
                $Publicacion = new Publicacion;
                $Publicacion->usuarios_id = $request->get('Id');
                $Publicacion->titulo = $request->get('titulo');
                $Publicacion->cuerpo = $request->get('cuerpo');
                $Publicacion->save();
                return Redirect::to('Publicacion');
            } else {
                echo '<script type="text/javascript">
              alert("titulo ya registrado por otro usuario");
              window.location.href="Publicacion/create";
                  </script>';
            }
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
        $Publicacion = Publicacion::findOrFail($id);
        return view("Publicacion.edit", ["sv" => $Publicacion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublicacionCreateRequest $request, $id)
    {

        $query = $request->get('Id');
        $titulo = $request->get('titulo');
        
        $sv = Publicacion::findOrFail($id);
        $sv->titulo = $request->get('titulo');
        $sv->cuerpo = $request->get('cuerpo');
        $sv->update();
        return Redirect::to('Publicacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Publicacion = Publicacion::findOrFail($id);
        $Publicacion->delete();
        return Redirect::to('Publicacion');
    }
}
