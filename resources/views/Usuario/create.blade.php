@extends('layouts.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Reguistro de Usuarios</h3>
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
{!!Form::open(array('url'=>'Usuario','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">

      <div class="form-group">
          <br><label for="nombres">Nombres del usuario:</label>
<input type="text"name="nombres"id="nombres"class="form-control"placeholder= "Digite el nombre del usuario">
        </div> 
        
        <div class="form-group">
          <br><label for="cuerpo">Email:</label><br>
          <input type="email" name="email" class="form-control" placeholder="xxx@ddff.xxx">
        </div> 
      
       <div class="col-lg-11 col-md-6 col-sm-6 col-xs-12">
       <div class="form-group"> <br>
       <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> 
       Guardar</button>
       <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar 
       Campos</button>
       <a class="btn btn-info" type="reset" href="{{url('Usuario')}}"><span class="glyphicon glyphicon-
       home"></span> Regresar </a>
                </div>
            </div>
        </div>
    {!!Form::close()!!}      
@endsection