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
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($shipments as $ship)
                    <tr>
                        <td>{{$ship->alumne}}</td>
                        <td>{{$ship->oferta}}</td>
                        <td>{{$ship->observacions}}</td>
                        <td>{{$ship->estatEnviaments}}</td>
                        <td title="Edit shipment {{$ship->id}}" data-table="{{$ship}}" data-toggle="modal" data-target="#updateStateEnviament" class="updateStateEnviamentBtn"><i class="fa-solid fa-pen-to-square"></i></td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($shipments)<5)
                    <p class="text-center text-secondary">No more data</p>
                @endif
            </div>
            <div class="d-flex justify-content-center mt-2">
                {{ $shipments->links() }}
            </div>
            @if($message = Session::get('status'))
                <div class="alert {{Session::get('status')}} mt-2" id="alert">
                    <strong>Yep!</strong> {{$message = Session::get('value')}}
                </div>
            @endif
            </div>
        </div>
    </div>
</div>

<!-- Update State -->
<div class="modal fade" id="updateStateEnviament" tabindex="-1" role="dialog" aria-labelledby="updateStateEnviament" aria-hidden="true">
    <form method="POST" action="/enviament/state/update/1" class="modal-dialog modal-dialog-centered" role="form" id="editShipmentForm">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStateEnviamentTitle">Change shipment state</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                </button>
            </div>
            <div id="idEnviament" name="idEnviament" class="d-none"></div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="enviament" class="col-md-4 col-form-label text-md-end">Enviament</label>
                    <div class="col-md-6">
                        <input id="enviament" type="text" class="form-control border-0 shadow" name="enviament" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="stateOffer" class="col-md-4 col-form-label text-md-end">Estados</label>
                    <div class="col-md-6">
                        <select id="stateOffer" name="stateOffer" class="form-select form-control border-0 shadow" aria-label="Select the user for send this offer">
                            <option selected disabled>Select the state</option>
                            @foreach($statesShipment as $stateship)
                                <option value="{{$stateship}}">{{$stateship}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-dark">Save changes</button>
            </div>
        </div>
    </form>
</div>


@endsection
