@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!--Enviaments-->
            <div class="card">
                <div class="card-header">{{ __('Users') }} - CaOsDa</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Coordinator</th>
                        <th scope="col">Group</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->coordinator}}</td>
                        <td>{{$user->groupname}}</td>
                        <td title="Edit user {{$user->id}}"><i class="fa-solid fa-pen-to-square"></i></td>
                        <td title="Delete user {{$user->id}}"><i class="fa-solid fa-trash"></i></td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

<!--{{$users->links()}}-->

@endsection
