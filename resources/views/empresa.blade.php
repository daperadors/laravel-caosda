@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Enterprises') }} - CaOsDa</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Mobile phone</th>
                        <th scope="col">E-mail</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($enterprises as $enterprise)
                    <tr>
                        <td>{{$enterprise->nom}}</td>
                        <td>{{$enterprise->adreça}}</td>
                        <td>{{$enterprise->telefon}}</td>
                        <td>{{$enterprise->correu}}</td>
                        <td title="Edit shipment {{$enterprise->id}}"><i class="fa-solid fa-pen-to-square"></i></td>
                        <td title="Delete shipment {{$enterprise->id}}"><i class="fa-solid fa-trash"></i></td>
                    </tr>
                        @endforeach

                    </tbody>
                </table>
                </div>
                <button type="submit" title="Add new enterprise" class="bg-dark text-white text- border-0 rounded w-100 mt-2"><i class="fa-solid fa-plus"></i> Add new enterprise</button>
            </div>
        </div>
    </div>
</div>
@endsection
