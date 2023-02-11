@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
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
                        <th scope="col"></th>
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
                        <td title="Send offer {{$offer->descripcio}}" data-offer="{{$offer}}" data-toggle="modal" data-target="#sendOffer" id="btnSendOffer" class="sendOfferBtn"><i class="fa-solid fa-share-from-square"></i></td>
                    </tr>
                        @endforeach

                    </tbody>
                </table>
                    <p class="text-center text-secondary">No more data</p>
            </div>
            <div class="d-flex justify-content-center mt-2">
                {{ $offers->links() }}
            </div>
         </div>
        </div>
    </div>
<!-- Send offer -->
<div class="modal fade" id="sendOffer" tabindex="-1" role="dialog" aria-labelledby="sendOffer" aria-hidden="true">
    <form method="POST" action="" class="modal-dialog modal-dialog-centered" role="form" id="editForm">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendOfferTitle"></h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                </button>
            </div>
            <div id="idOffer" name="idOffer" class="d-none"></div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="offer" class="col-md-4 col-form-label text-md-end">Offer</label>
                    <div class="col-md-6">
                        <input id="offer" type="text" class="form-control border-0 shadow" name="offer" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="userToSend" class="col-md-4 col-form-label text-md-end">Send to</label>
                    <div class="col-md-6">
                        <select id="userToSend" name="userToSend" class="form-select form-control border-0 shadow" aria-label="Select the user for send this offer">
                            <option selected disabled>Select the student</option>
                            @foreach($studentsInfo as $studentInfo)
                                <option value="{{$studentInfo->id}}">{{$studentInfo->nom}}</option>
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
<!-- Send offer -->
<div class="modal fade" id="sendOffer" tabindex="-1" role="dialog" aria-labelledby="sendOffer" aria-hidden="true">
    <form method="POST" action="" class="modal-dialog modal-dialog-centered" role="form" id="editForm">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendOfferTitle"></h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                </button>
            </div>
            <div id="idOffer" name="idOffer" class="d-none"></div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="offer" class="col-md-4 col-form-label text-md-end">Offer</label>
                    <div class="col-md-6">
                        <input id="offer" type="text" class="form-control border-0 shadow" name="offer" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="userToSend" class="col-md-4 col-form-label text-md-end">Send to</label>
                    <div class="col-md-6">
                        <select id="userToSend" name="userToSend" class="form-select form-control border-0 shadow" aria-label="Select the user for send this offer">
                            <option selected disabled>Select the student</option>
                            @foreach($studentsInfo as $studentInfo)
                                <option value="{{$studentInfo->id}}">{{$studentInfo->nom}}</option>
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
