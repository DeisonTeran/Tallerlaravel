@extends('layouts.plantilla')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar datos de los Usuarios</h3> 
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
{{Form::open(array('action'=>array('UsuarioController@update',$sv->id),'method'=>'patch'))}}
<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">

      <div class="form-group">
          <br><label for="nombres">Nombres del usuario:</label>
<input type="text"name="nombres"id="nombres"class="form-control"value="{{$sv->nombres}}">
        </div> 
        
        <div class="form-group">
          <br><label for="cuerpo">Email:</label><br>
          <input type="email" name="email" class="form-control" value="{{$sv->email}}">
        </div> 
      
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group"><br>
            <button class="btn btn-primary"type="submit"><span class="glyphicon glyphicon-refresh">
            </span>Actualizar </button>
                <a class="btn btn-info"type="reset"href="{{url('Usuario')}}"><span class="glyphicon glyphicon-home">
                </span>Regresar </a>
                                </div>
                            </div>
                        </div>
                    {!!Form::close()!!}      
                @endsection