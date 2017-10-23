@extends('app')

@section('conteudo')
    <h2 class="titulo">Definir Limitação</h2>

    <form action="" method="POST" role="form" class="fformularios">
        <div class="form-group form-contact">
            <input type="text" class="form-control" id="" placeholder="Tipo" required="required">

            <input type="number" class="form-control" id="" placeholder="Intervalo" required="required">
        </div>
        <button type="submit" class="btn btn-primary btn-contact btn-block">Confirmar</button>
    </form>
@endsection