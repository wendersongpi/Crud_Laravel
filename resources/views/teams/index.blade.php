@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 ">
                <h1>Times</h1>
            </div>
        
            <div class="col-sm-12 col-md-6 ">
                <a href="{{ route('teams-create') }}" class="btn btn-md btn-success float-right">Adicionar</a>
            </div>
        </div> 
        <div class="row bg-white pt-2 m-2 border border-rounded">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>País</th>
                                <th>Ano de fundação</th>
                                <th>Número de jogadores</th>
                                <th>Ações:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                                <tr>
                                    <th>{{ $team->id }}</th>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->country }}</td>
                                    <td>{{ $team->foundation_year }}</td>
                                    <td>{{ count($team->players) }}</td>
                                    <td>
                                        <a href="{{ route('teams-edit', ['id' => $team->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                                        <td class="d-flex">
                                            <form method="POST" action="{{ route('teams-destroy', ['id' => $team->id ]) }}">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                            </form>
                                        </td>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
@endsection