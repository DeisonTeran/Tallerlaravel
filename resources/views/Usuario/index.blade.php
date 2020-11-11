@extends('layouts.plantilla') 
@section('contenido') 

<h1>Usuarios
        
        <small></small>
      </h1>
      @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
<div class="row">
       <div class="col-md-8 col-xs-12">
       <h4>ingrese el id de usuario o el nombre del usuario para consultar:</h4>
            @include('Usuario.search')
            </div>
            <div class="col-md-1 ">
            <a href="Usuario/create" class="pull-right">
                <button class="btn btn-success">Nuevo</button>
                </a>
            </div>

            <div class="col-md-2 ">
            <a href="Publicacion" class="pull-right">
                <button class="btn btn-success">Publicaciones</button>
                </a>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12"> 
            <div class="table-responsive">
            <table class="table table-striped table-hover"> 
                <thead>
                <th>Id</th>
                <th>Nombres</th>
                <th>Email</th>
                <th>Opciones</th>
            </thead>
            <tbody>
            @foreach($Usuario as $sv)
            <tr>
            <td>{{$sv->id}}</td>
            <td>{{$sv->nombres}}</td>
            <td>{{$sv->email}}</td>
    <td>
    <a href="{{URL::action('UsuarioController@edit',$sv->id)}}"><button class="btn btn-primary">Actualizar</button></a>
    <a href="" data-target="#modal-delete-{{$sv->id}}"data-toggle="modal">
       <button class="btn btn-danger">Eliminar</button>
       </a>
    
           </td>
              </tr>
              @include('Usuario.modal')
                @endforeach
               </tbody>
           </table>
       </div>
       {{$Usuario->links()}}
    </div>
</div>

@endsection