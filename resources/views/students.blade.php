@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!--Enviaments-->
            <div class="card">
                <div class="card-header">{{ __('Students') }} - CaOsDa</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Cours</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Group</th>
                        <th scope="col">Practices</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                    <tr>
                        <td>{{$student->nom}}</td>
                        <td>{{$student->cognoms}}</td>
                        <td>{{$student->correu}}</td>
                        <td>{{$student->dni}}</td>
                        <td>{{$student->curs}}</td>
                        <td>{{$student->telefon}}</td>
                        <td>{{$student->groupname}}</td>
                        <td>{{$student->practiques === 1 ? "Yes" : "No" }}</td>

                        <td title="Upload or view cv of {{$student->nom}}"><i class="fa-solid fa-file-arrow-up"></i></td>
                        <td title="Edit user {{$student->nom}}"><i class="fa-solid fa-pen-to-square"></i></td>
                        <td title="Delete user {{$student->nom}}"><i class="fa-solid fa-trash"></i></td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            @if(count($students)<5)
                <p class="text-center text-secondary">No more data</p>
            @endif
            </div>
            <div class="d-flex justify-content-center mt-2">
                {{ $students->links() }}
            </div>
            <button type="submit" title="Add new student" class="bg-dark text-white text- border-0 rounded w-100 mt-2 p-2" data-toggle="modal" data-target="#addStudent"><i class="fa-solid fa-plus"></i> Add new student</button>
        </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User -->
<div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="addStudent" aria-hidden="true">
    <form method="POST" action="" class="modal-dialog modal-dialog-centered" role="form" id="addForm">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTitle">Create new student</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                </button>
            </div>
            <div id="idUser" name="idUser" class="d-none"></div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="surname" class="col-md-4 col-form-label text-md-end">Surname</label>
                    <div class="col-md-6">
                        <input id="surname" type="text" class="form-control" name="surname" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>
                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control" name="email" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="dni" class="col-md-4 col-form-label text-md-end">DNI</label>
                    <div class="col-md-6">
                        <input id="dni" type="text" class="form-control" name="dni" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="cours" class="col-md-4 col-form-label text-md-end">Cours</label>
                    <div class="col-md-6">
                        <input id="cours" type="text" class="form-control" name="cours">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="mobile" class="col-md-4 col-form-label text-md-end">Mobile</label>
                    <div class="col-md-6">
                        <input id="mobile" type="text" class="form-control" name="mobile" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="group" class="col-md-4 col-form-label text-md-end">Group</label>
                    <div class="col-md-6">
                        <select id="group" name="group" class="form-select" aria-label="Select your group">
                            <option selected disabled>Select your group</option>
                            @foreach($groupsInfo as $groupInfo)
                                <option value="{{$groupInfo->id}}">{{$groupInfo->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit2" class="btn btn-dark">Create new student</button>
            </div>
        </div>
    </form>
</div>
</div>

@endsection
