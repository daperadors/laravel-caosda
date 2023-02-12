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
                            <th scope="col"></th>
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
                                <td title="Edit offer {{$offer->descripcio}}" data-table="{{$offer}}" data-toggle="modal" data-target="#editOffer" class="editOfferBtn2"><i class="fa-solid fa-pen-to-square"></i></td>
                                <td title="Delete offer {{$offer->descripcio}}" data-id="{{$offer->id}}" data-toggle="modal" data-target="#alertDeleteOffer" class="deleteOfferBtn"><i class="fa-solid fa-trash"></i></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    @if(count($offers)<5)
                        <p class="text-center text-secondary">No more data</p>
                    @endif
                </div>
                <div class="d-flex justify-content-center mt-2">
                    {{ $offers->links() }}
                </div>

                <button type="submit" title="Add new offer" class="bg-dark text-white border-0 rounded w-100 mt-2 p-2" data-toggle="modal" data-target="#addOffer"><i class="fa-solid fa-plus"></i> Add new offer</button>
            </div>
        </div>
    </div>

    <!-- Alert delete -->
    <div class="modal fade modal-sm" id="alertDeleteOffer" tabindex="-1" role="dialog" aria-labelledby="alertDeleteOffer" aria-hidden="true">
        <form method="GET" action="/empresa/oferta/delete/1" class="modal-dialog modal-dialog-centered" role="form" id="deleteOfferForm">
            @csrf
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTitle">Are you sure you want to delete it?</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <button type="submit" name="submit3" class="btn btn-danger w-100 mb-1">Yes</button>
                    <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">No</button>
                </div>
            </div>
        </form>
    </div>
    </div>


    <!-- Edit -->
    <div class="modal fade" id="editOffer" tabindex="-1" role="dialog" aria-labelledby="editOffer" aria-hidden="true">
        <form method="POST" action="/empresa/oferta/update/1" class="modal-dialog modal-dialog-centered" role="form" id="editOfferForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOfferTitle"></h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                    </button>
                </div>
                <div id="idEditOffer" name="idEditOffer" class="d-none"></div>
                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="descripcioOfferEdit" class="col-md-4 col-form-label text-md-end">Oferta</label>
                        <div class="col-md-6">
                            <input id="descripcioOfferEdit" type="text" class="form-control border-0 shadow" name="descripcio">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="groupOfferEdit" class="col-md-4 col-form-label text-md-end">Group</label>
                        <div class="col-md-6">
                            <select id="groupOfferEdit" name="group" class="form-select" aria-label="Select your group">
                                <option selected disabled>Select the group</option>
                                @foreach($groupsInfo as $groupInfo)
                                    <option value="{{$groupInfo->id}}">{{$groupInfo->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="vacantsOfferEdit" class="col-md-4 col-form-label text-md-end">Vacants</label>
                        <div class="col-md-6">
                            <input id="vacantsOfferEdit" type="text" class="form-control border-0 shadow" name="vacants">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="cursOfferEdit" class="col-md-4 col-form-label text-md-end">Curs</label>
                        <div class="col-md-6">
                            <input id="cursOfferEdit" type="number" class="form-control border-0 shadow" name="curs">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nomContacteEditOffer" class="col-md-4 col-form-label text-md-end">Nom Contacte</label>
                        <div class="col-md-6">
                            <input id="nomContacteEditOffer" type="text" class="form-control border-0 shadow" name="nomContacte">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="cognomContacteEditOffer" class="col-md-4 col-form-label text-md-end">Cognom Contacte</label>
                        <div class="col-md-6">
                            <input id="cognomContacteEditOffer" type="text" class="form-control border-0 shadow" name="cognomContacte">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="correuContacteEditOffer" class="col-md-4 col-form-label text-md-end">Correu Contatcte</label>
                        <div class="col-md-6">
                            <input id="correuContacteEditOffer" type="text" class="form-control border-0 shadow" name="correuContacte">
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
    </div>


    <!-- Add Offer -->
    <div class="modal fade modal-lg" id="addOffer" tabindex="-1" role="dialog" aria-labelledby="addOffer" aria-hidden="true">
        <form method="POST" action="{{route('addOferta')}}" class="modal-dialog modal-dialog-centered" role="form" id="addForm" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOfferTitle"></h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                    </button>
                </div>
                <div id="idAddOffer" name="idAddOffer" class="d-none"></div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="empresaOfferAdd" class="col-md-4 col-form-label text-md-end">Group</label>
                        <div class="col-md-6">
                            <select id="empresaOfferAdd" name="empresa" class="form-select" aria-label="Select the enterprise">
                                <option selected disabled>Select enterprise</option>
                                @foreach($enterprisesInfo as $enterpriseInfo)
                                    <option value="{{$enterpriseInfo->id}}">{{$enterpriseInfo->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="descripcioOfferAdd" class="col-md-4 col-form-label text-md-end">Oferta</label>
                        <div class="col-md-6">
                            <input id="descripcioOfferAdd" type="text" class="form-control border-0 shadow" name="descripcio">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="groupOfferEdit" class="col-md-4 col-form-label text-md-end">Group</label>
                        <div class="col-md-6">
                            <select id="groupOfferAdd" name="group" class="form-select" aria-label="Select your group">
                                <option selected disabled>Select the group</option>
                                @foreach($groupsInfo as $groupInfo)
                                    <option value="{{$groupInfo->id}}">{{$groupInfo->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="vacantsOfferAdd" class="col-md-4 col-form-label text-md-end">Vacants</label>
                        <div class="col-md-6">
                            <input id="vacantsOfferAdd" type="number" class="form-control border-0 shadow" name="vacants">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="cursOfferAdd" class="col-md-4 col-form-label text-md-end">Curs</label>
                        <div class="col-md-6">
                            <input id="cursOfferAdd" type="number" class="form-control border-0 shadow" name="curs">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nomContacteAddOffer" class="col-md-4 col-form-label text-md-end">Nom Contacte</label>
                        <div class="col-md-6">
                            <input id="nomContacteAddOffer" type="text" class="form-control border-0 shadow" name="nomContacte">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="cognomContacteAddOffer" class="col-md-4 col-form-label text-md-end">Cognom Contacte</label>
                        <div class="col-md-6">
                            <input id="cognomContacteAddOffer" type="text" class="form-control border-0 shadow" name="cognomContacte">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="correuContacteAddOffer" class="col-md-4 col-form-label text-md-end">Correu Contatcte</label>
                        <div class="col-md-6">
                            <input id="correuContacteAddOffer" type="text" class="form-control border-0 shadow" name="correuContacte">
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit2" class="btn btn-dark">Create new student</button>
                </div>
            </div>
        </form>
    </div>



@endsection
