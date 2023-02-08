@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!--Enviaments-->
            <div class="card">
                <div class="card-header">{{ __('Open Shipments') }} - CaOsDa</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Alumn</th>
                        <th scope="col">Offers</th>
                        <th scope="col">Observations</th>
                        <th scope="col">Shipping status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($shipments as $ship)
                    <tr>
                        <td>{{$ship->alumne}}</td>
                        <td>{{$ship->oferta}}</td>
                        <td>{{$ship->observacions}}</td>
                        <td>{{$ship->estatEnviaments}}</td>
                        <td title="Edit shipment {{$ship->id}}"><i class="fa-solid fa-pen-to-square"></i></td>
                        <td title="Delete shipment {{$ship->id}}"><i class="fa-solid fa-trash"></i></td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
