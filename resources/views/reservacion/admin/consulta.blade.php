@extends('templates.mainInterno')
@section('content')
@include('templates.errors')
<h1>
    Consultar Reserva:
</h1>
<form action="{{route('consultarReservas')}}" id="consultarReserva" method="GET">
        {{csrf_field()}}
    <div class="control-group">
        <div class="form-group row">
            <label for="numero_de_reserva" class="col-sm-2 col-form-label">Escriba el Numero de Reserva que Busca:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="numero_de_reserva" id="numero_de_reserva" cols="30" rows="10"></input>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="form-group row">
            <label for="nombreoapellido" class="col-sm-2 col-form-label">Escriba el Nombre o apellido que busca:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nombreoapellido" id="nombreoapellido" cols="30" rows="10"></input>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="form-group row">
            <label for="fecha" class="col-sm-2 col-form-label">Fecha del Paseo:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control datePicker" name="fecha" id="fecha2" cols="30" rows="10"></input>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="form-group row">
            <label for="horas" class="col-sm-2 col-form-label">Hora(s):</label>
            <div class="col-sm-10">
                <select name="horas[]" class="form-control" id="horas" multiple>
                    @foreach ($paseos as $key=>$paseo)
                        <option value="{{$key}}" >{{$paseo}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="form-group row">
            <label for="embarcaciones" class="col-sm-2 col-form-label">Embarcacion(es):</label>
            <div class="col-sm-10">
                <select name="embarcaciones[]" class="form-control"  id="embarcaciones" multiple>
                    @foreach ($embarcaciones as $key=>$embarcacion)
                    <option value="{{$key}}" >{{$embarcacion}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
<button type="submit" class="btn btn-primary">Consultar</button>
</form>                        
                        
                        
                        @endsection
                        