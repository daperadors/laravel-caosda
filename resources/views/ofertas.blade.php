@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Offers') }} - CaOsDa</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Empresa</th>
                        <th scope="col">Oferta</th>
                        <th scope="col">Estudi</th>
                        <th scope="col">Vacants</th>
                        <th scope="col">Curs</th>
                        <th scope="col">Nom contacte</th>
                        <th scope="col">Cognom contacte</th>
                        <th scope="col">Correu contacte</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($offers as $offer)
                    <tr>
                        <td>{{$offer->empresa}}</td>
                        <td>{{$offer->descripcio}}</td>
                        <td>{{$offer->estudi}}</td>
                        <td>{{$offer->numVacants}}</td>
                        <td>{{$offer->curs}}</td>
                        <td>{{$offer->nomContacte}}</td>
                        <td>{{$offer->cognomContacte}}</td>
                        <td>{{$offer->correuContacte}}</td>
                        <td title="Edit shipment {{$offer->id}}"><i class="fa-solid fa-pen-to-square"></i></td>
                        <td title="Delete shipment {{$offer->id}}"><i class="fa-solid fa-trash"></i></td>
                    </tr>
                        @endforeach

                    </tbody>
                </table>
                </div>
                <button type="submit" title="Add new offer" class="bg-dark text-white text- border-0 rounded w-100 mt-2"><i class="fa-solid fa-plus"></i> Add new offer</button>
            </div>
        </div>
    </div>
</div>
@endsection
