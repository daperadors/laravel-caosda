@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <!--Enviaments-->
            <div class="card">
                <div class="card-header">{{ __('Users') }} - CaOsDa</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="col-9">User</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <!--<th scope="col">E-mail</th>
                            <th scope="col">Role</th>
                            <th scope="col">Group</th>-->
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <!--<td>{{$user->email}}</td>
                            <td>{{$user->coordinator == 1 ? 'Coordinator FCTs/Dual' : "Practice tutor"}}</td>
                            <td>{{$user->groupname}}</td>-->
                            <td title="Edit shipment {{$user->name}}" data-user="{{$user}}" data-toggle="modal" data-target="#viewUser" id="btnUser" class="viewUser"><i class="fa-solid fa-eye"></i></td>
                            <td title="Delete user {{$user->name}}"><i class="fa-solid fa-trash"></i></td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                @if(count($users)<5)
                    <p class="text-center text-secondary">No more data</p>
                @endif
                </div>
                <div class="d-flex justify-content-center mt-2">
                    {{ $users->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- User info -->
<div class="modal fade modal-lg" id="viewUser" tabindex="-1" role="dialog" aria-labelledby="viewUser" aria-hidden="true">
    <form method="POST" action="" class="modal-dialog modal-dialog-centered" role="form" id="editForm">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                </button>
            </div>
            <div id="idUser" name="idUser" class="d-none"></div>
             <div class="modal-body w-100">
                 <div class="row">
                     <div class="col-sm-4" style="background: url('https://cdn-icons-png.flaticon.com/512/1946/1946429.png'); background-size: contain; background-repeat: no-repeat; background-position: center">
                     </div>
                     <div class="col">
                         <div class="row mb-2">
                             <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                             <div class="col-md-6">
                                 <input id="name" type="text" class="form-control border-0 shadow" name="name">
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>
                             <div class="col-md-6">
                                 <input id="email" type="text" class="form-control border-0 shadow" name="email">
                             </div>
                         </div>
                         <div class="row mb-2 d-flex align-items-center">
                             <label for="coordinator" class="form-check-label col-md-4 col-form-label text-md-end">{{ __('Coordinator') }}</label>
                             <div class="form-check form-switch col-md-6">
                                 <input class="form-check-input" type="checkbox" id="coordinator">
                             </div>
                         </div>
                         <div class="row mb-2">
                             <label for="group" class="col-md-4 col-form-label text-md-end">Group</label>
                             <div class="col-md-6">
                                 <select id="group" name="group" class="form-select border-0 shadow" aria-label="Select your group" required>
                                     <option selected disabled>Select your group</option>
                                     @foreach($groupsInfo as $groupInfo)
                                        <option value="{{$groupInfo->id}}">{{$groupInfo->nom}}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
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
