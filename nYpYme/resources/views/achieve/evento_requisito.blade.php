@extends('app')

@section('conteudo')
    <h2 class="titulo">Definir Requisito</h2>

    <form action="{{ route('achieve.store') }}" method="POST" role="form" class="fformularios">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
        <div class="form-group form-contact">
            <input name="name" type="text" class="form-control" id="" placeholder="Nome" required="required">
            <select name="idTypeAchieve" id="input" class="form-control" required="required">
                @foreach ($achieves as $achieve)
                    <option value="{{ $achieve->id}}">{{ $achieve->name}}</option>
                @endforeach
            </select>
            <select id="input" type="number" name="gather" class="form-control" required="required" placeholder="Definir Limitação">
                    <option value="0">Não Acumulativo</option>
                    <option value="1">Acumulativo</option>
            </select>
            <input name="amount" type="number" class="form-control" id="" placeholder="Quantidade" required="required">
        </div>
        <button type="submit" class="btn btn-primary btn-contact btn-block">Confirmar</button>
    </form>
@endsection