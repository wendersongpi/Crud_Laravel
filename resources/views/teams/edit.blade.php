@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 ">
                <h1>Editar Time</h1>
            </div>
        
            <div class="col-sm-12 col-md-6 ">
                <a href="{{ route('teams-index') }}" class="btn btn-md btn-primary float-right">Voltar</a>
            </div>
        </div>
            <div class="bg-white pt-2  mt-2">
                <div class="col-sm-12">
                    <h5>Edição do time id: {{ $team->id }}</h5>
                    <br/>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-sm-12">
                    <form method="POST" action="{{ route('teams-update', ['id'=>$team->id]) }}">
                        @csrf 
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" id="name" name="name" required value="{{ $team->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="country">País</label>
                            <input type="text" id="country" name="country" required value="{{$team->country}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="foundation_year">Ano de Fundação</label>
                            <input type="number" id="foundation_year" name="foundation_year" required value="{{$team->foundation_year}}" step="1" class="form-control">
                        </div>
                        <div class="form-group float-right mt-2">
                            <button type="submit" class="btn btn-md btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>

         
   </div>
@endsection