@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                        <a href="/getAllUsers" target="routes" class="text-black p-2 bg-secondary rounded shadow text-white" style="text-decoration: none">Usuaris</a>
                        <a href="/getAllAlumnes" target="routes" class="text-black p-2 bg-secondary rounded shadow text-white" style="text-decoration: none">Alumnes</a>
                        <a href="/getAllEmpresas" target="routes" class="text-black p-2 bg-secondary rounded shadow text-white" style="text-decoration: none">Empresas</a>
                        <a href="/getAllEstudis" target="routes" class="text-black p-2 bg-secondary rounded shadow text-white" style="text-decoration: none">Estudis</a>
                        <a href="/getAllEnviaments" target="routes" class="text-black p-2 bg-secondary rounded shadow text-white" style="text-decoration: none">Enviamentes</a>
                    </div>
                    <iframe name="routes" src="" width="100%" height="100%"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
