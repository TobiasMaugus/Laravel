@extends('restrict.layout')
@section('content')

<div>
    <a href="{{url('mensagem/create')}}" class="button">Adicionar</a>
</div>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>título</th>
            <th>Mensagem</th>
            <th>Tópicos</th>
            <th>Editar</th>
            <th>Remover</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mensagens as $mesagem)
        <tr>
            <td>{{$mensagem->user->name}}</td>
            <td>{{$mensagem->titulo}}</td>
            <td>{{$mensagem->mensagem}}</td>
            <td>
                @if($mesagem->topicos)
                @foreach($mesagem->topicos as $topico)
                <div>{{$topico->topico}}</div>
                @foreach
                @endif
            </td>
            <td>
                <form method="POST" action="{{route('mesagem.detroy', $mensagem->id)}}" onsubmit="return confirm('tem certeza?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button">
                        Remover
                    </button>    
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection