@extends('layouts.plantilla')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar datos de la publicacion</h3> 
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
{{Form::open(array('action'=>array('PublicacionController@update',$sv->id),'method'=>'patch'))}}
<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
          <br><label for="Id">Id del usuario</label>
<input type="number"name="Id"id="Id"class="form-control" value="{{$sv->usuarios_id}}" readonly>
        </div> 

      <div class="form-group">
          <br><label for="titulo">Titulo de la publicacion</label>
<input type="text"name="titulo"id="titulo"class="form-control"value="{{$sv->titulo}}">
        </div> 
        
        <div class="form-group">
          <br><label for="cuerpo">Contenido de la publicacion</label>
          <textarea name="cuerpo" id="cuerpo" cols="80" rows="5" class="form-control">{{$sv->cuerpo}}</textarea><br>
        </div> 
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group"><br>
            <button class="btn btn-primary"type="submit"><span class="glyphicon glyphicon-refresh">
            </span>Actualizar </button>
                <a class="btn btn-info"type="reset"href="{{url('Publicacion')}}"><span class="glyphicon glyphicon-home">
                </span>Regresar </a>
                                </div>
                            </div>
                        </div>
                    {!!Form::close()!!}      
                @endsection