@extends('layouts.plantilla') 
@section('contenido') 

<h1>Publicaciones
        
        <small></small>
      </h1>
<div class="row">
       <div class="col-md-8 col-xs-12">
       <h4>ingrese el id de usuario o el titulo de la publicacion para consultar:</h4>
            @include('Publicacion.search')
            </div>
            <div class="col-md-2 ">
            <a href="Publicacion/create" class="pull-right">
                <button class="btn btn-success">Nueva</button>
                </a>
            </div>
            <div class="col-md-1 ">
            <a href="Usuario" class="pull-right">
                <button class="btn btn-success">usuarios</button>
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
                <th>Titulo</th>
                <th>Contenido</th>
                <th>Opciones</th>
            </thead>
            <tbody>
            @foreach($Publicacion as $sv)
            <tr>
            <td>{{$sv->usuarios->id}}</td>
            <td>{{$sv->usuarios->nombres}}</td>
            <td>{{$sv->usuarios->email}}</td>
            <td>{{$sv->titulo}}</td>
            <td>{{$sv->cuerpo}}</td>
    <td>
    <a href="{{URL::action('PublicacionController@edit',$sv->id)}}"><button class="btn btn-primary">Actualizar</button></a>
    <a href="" data-target="#modal-delete-{{$sv->id}}"data-toggle="modal">
       <button class="btn btn-danger">Eliminar</button>
       </a>
    
           </td>
              </tr>
              @include('Publicacion.modal')
                @endforeach
               </tbody>
           </table>
       </div>
       {{$Publicacion->links()}}
    </div>
</div>

@endsection