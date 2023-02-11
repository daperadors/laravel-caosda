@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Enterprises') }} - CaOsDa</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Mobile phone</th>
                        <th scope="col">E-mail</th>
                        @if($coordinator)
                        <th scope="col"></th>
                        <th scope="col"></th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($enterprises as $enterprise)
                    <tr>
                        <td>{{$enterprise->nom}}</td>
                        <td>{{$enterprise->adreça}}</td>
                        <td>{{$enterprise->telefon}}</td>
                        <td>{{$enterprise->correu}}</td>
                        @if($coordinator)
                        <td title="Edit shipment {{$enterprise->id}}" data-table="{{$enterprise}}" data-toggle="modal" data-target="#editCompany" id="btnEdit" class="editEmpresaBtn"><i class="fa-solid fa-pen-to-square"></i></td>
                        <td title="Delete shipment {{$enterprise->id}}" data-id="{{$enterprise->id}}" data-toggle="modal" data-target="#alertDeleteCompany" class="deleteEmpresaBtn"><i class="fa-solid fa-trash"></i></td>
                        @endif
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($enterprises)<5)
                <p class="text-center text-secondary">No more data</p>
                @endif
                </div>
                <div class="d-flex justify-content-center mt-2">
                    {{ $enterprises->links() }}
                </div>
                @if($coordinator)
                <button type="submit" title="Add new enterprise" class="bg-dark text-white border-0 rounded w-100 mt-2 p-2" data-toggle="modal" data-target="#addCompany"><i class="fa-solid fa-plus"></i> Add new enterprise</button>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="editCompany" tabindex="-1" role="dialog" aria-labelledby="editCompany" aria-hidden="true">
        <form method="POST" action="/empresa/update/1" class="modal-dialog modal-dialog-centered" role="form" id="editForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTitle"></h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                    </button>
                </div>
                <div id="idCompany" name="idCompany" class="d-none"></div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control border-0 shadow" name="name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>
                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control border-0 shadow" name="email">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control border-0 shadow" name="address">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="mobile" class="col-md-4 col-form-label text-md-end">Mobile</label>
                        <div class="col-md-6">
                            <input id="mobile" type="text" class="form-control border-0 shadow" name="mobile">
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

<!-- Add -->
<div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="addCompany" aria-hidden="true">
    <form method="POST" action="{{ route('addEmpresa') }}" class="modal-dialog modal-dialog-centered" role="form" id="addForm">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTitle">Create new company</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                </button>
            </div>
            <div id="idCompany" name="idCompany" class="d-none"></div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>
                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control" name="email">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>
                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control" name="address">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="mobile" class="col-md-4 col-form-label text-md-end">Mobile</label>
                    <div class="col-md-6">
                        <input id="mobile" type="text" class="form-control" name="mobile">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit2" class="btn btn-dark">Create new company</button>
            </div>
        </div>
    </form>
</div>

<!-- Alert delete -->
<div class="modal fade modal-sm" id="alertDeleteCompany" tabindex="-1" role="dialog" aria-labelledby="alertDeleteCompany" aria-hidden="true">
    <form method="POST" action="/empresa/delete/1" class="modal-dialog modal-dialog-centered" role="form" id="deleteForm">
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
@endsection
