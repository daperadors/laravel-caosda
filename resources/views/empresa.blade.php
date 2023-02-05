@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!--Enviaments-->
            <h1>Enterprises</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Mobile phone</th>
                    <th scope="col">E-mail</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($enterprises as $enterprise)
                <tr>
                    <th scope="row">{{$enterprise->id}}</th>
                    <td>{{$enterprise->nom}}</td>
                    <td>{{$enterprise->adreça}}</td>
                    <td>{{$enterprise->telefon}}</td>
                    <td>{{$enterprise->correu}}</td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            <!--<div class="card">
                <div class="card-header">CaOsDa - {{ __('Dashboard') }}</div>

                <div class="card-body d-flex flex-column">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="mt-4 mb-4" id="linksUsers">
                        <h2 class="mb-3">/getAll</h2>
                        <a href="/getAllUsers" target="routes" class="text-black p-2 bg-secondary rounded shadow text-white" style="text-decoration: none; user-select: none">Usuaris</a>
                        <a href="/getAllAlumnes" target="routes" class="text-black p-2 bg-secondary rounded shadow text-white" style="text-decoration: none; user-select: none">Alumnes</a>
                        <a href="/getAllEmpresas" target="routes" class="text-black p-2 bg-secondary rounded shadow text-white" style="text-decoration: none; user-select: none">Empresas</a>
                        <a href="/getAllEstudis" target="routes" class="text-black p-2 bg-secondary rounded shadow text-white" style="text-decoration: none; user-select: none">Estudis</a>
                        <a href="/getAllEnviaments" target="routes" class="text-black p-2 bg-secondary rounded shadow text-white" style="text-decoration: none; user-select: none">Enviamentes</a>
                    </div>
                    <iframe name="routes" src="" width="100%" height="100%"></iframe>
                </div>-->
            </div>
        </div>
    </div>
</div>
@endsection
