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
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
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
                        <form method="POST" action="/student/curriculum/download/{{$student->id}}" class="modal-dialog modal-dialog-centered" role="form" id="CV">
                            <td title="Upload or view cv of {{$student->nom}}" data-id="{{$student->id}}"  class="donwloadCV" ><button type="submit" name="submit2" class="btn btn-dark">Create new student</button><i class="fa-solid fa-file-arrow-up"></i></td>
                            @csrf
                        </form>
                        <td title="Edit user {{$student->nom}}" data-table="{{$student}}" data-toggle="modal" data-target="#editStudent" id="btnEdit" class="editStudentBtn"><i class="fa-solid fa-pen-to-square"></i></td>
                        <td title="Delete user {{$student->nom}}" data-id="{{$student->id}}" data-toggle="modal" data-target="#alertDeleteStudent" class="deleteStudentBtn"><i class="fa-solid fa-trash"></i></td>
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

<!-- Upload/View CV -->

<div class="modal fade " id="edit_show_CV" tabindex="-1" role="dialog" aria-labelledby="edit_show_CV" aria-hidden="true">
    <form method="POST" action="/student/update/CV/1" class="modal-dialog modal-dialog-centered" role="form" id="editShow_CV_Form">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTitle">Your curriculum</h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                </button>
            </div>
            <div id="nameUser" name="nameUser" class="d-none"></div>
            <div class="modal-body">
                <div class="row mb-3 d-flex justify-content-center">
                    <button type="button" href="student/curriculum/download/1" class="btn btn-secondary w-50" id="donwloadCV">View actual curriculum</button>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
</div>
</div>


<!-- Add User -->
<div class="modal fade modal-lg" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="addStudent" aria-hidden="true">
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

                <div class="row mb-3">
                    <label for="mobile" class="col-md-4 col-form-label text-md-end">Curriculum</label>
                    <div class="col-md-6">
                        <input id="mobile" type="file" class="form-control" name="mobile" accept="application/pdf">
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

<!--Delete User-->
<div class="modal fade modal-sm" id="alertDeleteStudent" tabindex="-1" role="dialog" aria-labelledby="alertDeleteStudent" aria-hidden="true">
    <form method="POST" action="/student/delete/1" class="modal-dialog modal-dialog-centered" role="form" id="deleteStudentForm">
        @csrf
        <div class="modal-content">
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
<div class="modal fade modal-lg" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="editStudent" aria-hidden="true">
    <form method="POST" action="/student/update/1" class="modal-dialog modal-dialog-centered" role="form" id="editStudentForm">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentTitle"></h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                </button>
            </div>
            <div id="idStudent" name="idStudentEdit" class="d-none"></div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="nameEditStudent" class="col-md-4 col-form-label text-md-end">Name</label>
                    <div class="col-md-6">
                        <input id="nameEditStudent" type="text" class="form-control border-0 shadow" name="name">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="surnamesEditStudent" class="col-md-4 col-form-label text-md-end">Surnames</label>
                    <div class="col-md-6">
                        <input id="surnamesEditStudent" type="text" class="form-control border-0 shadow" name="surnames">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="dniEditStudent" class="col-md-4 col-form-label text-md-end">DNI</label>
                    <div class="col-md-6">
                        <input id="dniEditStudent" type="text" class="form-control border-0 shadow" name="dni">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="cursEditStudent" class="col-md-4 col-form-label text-md-end">Curs</label>
                    <div class="col-md-6">
                        <input id="cursEditStudent" type="text" class="form-control border-0 shadow" name="curs">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="telefonEditStudent" class="col-md-4 col-form-label text-md-end">Telefon</label>
                    <div class="col-md-6">
                        <input id="telefonEditStudent" type="number" class="form-control border-0 shadow" name="telefon">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="emailEditStudent" class="col-md-4 col-form-label text-md-end">E-mail</label>
                    <div class="col-md-6">
                        <input id="emailEditStudent" type="text" class="form-control border-0 shadow" name="email">
                    </div>
                </div>

                <div class="row mb-3 d-flex align-items-center">
                    <label for="practiquesEditStudent" class="form-check-label col-md-4 col-form-label text-md-end">Practices</label>
                    <div class="form-check form-switch col-md-6">
                        <input class="form-check-input" type="checkbox" id="practiquesEditStudent" name="practiques">
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

@endsection
