@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm">
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
                        <form method="POST" action="/students/curriculum/download/{{$student->id}}" class="modal-dialog modal-dialog-centered" role="form" id="CV">
                            @csrf
                            <td title="Upload or view cv of {{$student->nom}}" data-id="{{$student->id}}"  class="downloadCV" ><button type="submit" name="submit2" class="btn btn-dark d-none downloadCvBtn">Create new student</button><i class="fa-solid fa-file-arrow-up"></i></td>
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
            @if($message = Session::get('status'))
                <div class="alert {{Session::get('status')}} mt-2" id="alert">
                    <strong>Yep!</strong> {{$message = Session::get('value')}}
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Add User -->
<div class="modal fade modal-lg" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="addStudent" aria-hidden="true">
    <form method="POST" action="{{route('addStudents')}}" class="modal-dialog modal-dialog-centered" role="form" id="addForm" enctype="multipart/form-data">
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
                    <label for="nameAdd" class="col-md-4 col-form-label text-md-end">Name</label>
                    <div class="col-md-6">
                        <input id="nameAdd" type="text" class="form-control" name="nameAdd" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="surnameAdd" class="col-md-4 col-form-label text-md-end">Surname</label>
                    <div class="col-md-6">
                        <input id="surnamesAdd" type="text" class="form-control" name="surnamesAdd" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="emailAdd" class="col-md-4 col-form-label text-md-end">E-mail</label>
                    <div class="col-md-6">
                        <input id="emailAdd" type="text" class="form-control" name="emailAdd" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="dniAdd" class="col-md-4 col-form-label text-md-end">DNI</label>
                    <div class="col-md-6">
                        <input id="dniAdd" type="text" class="form-control" name="dniAdd" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="coursAdd" class="col-md-4 col-form-label text-md-end">Cours</label>
                    <div class="col-md-6">
                        <input id="coursAdd" type="number" class="form-control" name="cursAdd">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="mobileAdd" class="col-md-4 col-form-label text-md-end">Mobile</label>
                    <div class="col-md-6">
                        <input id="mobileAdd" type="number" class="form-control" name="mobileAdd" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="groupAdd" class="col-md-4 col-form-label text-md-end">Group</label>
                    <div class="col-md-6">
                        <select id="groupAdd" name="groupAdd" class="form-select" aria-label="Select your group">
                            <option selected disabled>Group selector</option>
                            @foreach($groupsInfo as $groupInfo)
                                <option value="{{$groupInfo->id}}">{{$groupInfo->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="curriculumAdd" class="col-md-4 col-form-label text-md-end">Curriculum</label>
                    <div class="col-md-6">
                        <input id="curriculumAdd" type="file" class="form-control" name="curriculumAdd" accept="application/pdf">
                    </div>
                </div>

                <div class="row mb-3 d-flex align-items-center">
                    <label for="practiquesAddStudent" class="form-check-label col-md-4 col-form-label text-md-end">Practices</label>
                    <div class="form-check form-switch mx-3 col-md-6">
                        <input class="form-check-input px-4 pt-4" type="checkbox" id="practiquesAddStudent" name="practiquesAdd">                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit2" class="btn btn-dark">Create new student</button>
            </div>
        </div>
    </form>
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



<!-- Edit -->
<div class="modal fade modal-lg" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="editStudent" aria-hidden="true">
    <form method="POST" action="/student/update/1" class="modal-dialog modal-dialog-centered" role="form" id="editStudentForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentTitle"></h5>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                </button>
            </div>
            <div id="idStudentEdit" name="idStudentEdit" class="d-none"></div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="nameStudentEdit" class="col-md-4 col-form-label text-md-end">Name</label>
                    <div class="col-md-6">
                        <input id="nameStudentEdit" type="text" class="form-control border-0 shadow" name="nameEdit">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="surnamesStudentEdit" class="col-md-4 col-form-label text-md-end">Surname</label>
                    <div class="col-md-6">
                        <input id="surnamesStudentEdit" type="text" class="form-control border-0 shadow" name="surnamesEdit">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="emailStudentEdit" class="col-md-4 col-form-label text-md-end">E-mail</label>
                    <div class="col-md-6">
                        <input id="emailStudentEdit" type="text" class="form-control border-0 shadow" name="emailEdit">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="dniStudentEdit" class="col-md-4 col-form-label text-md-end">DNI</label>
                    <div class="col-md-6">
                        <input id="dniStudentEdit" type="text" class="form-control border-0 shadow" name="dniEdit">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="cursStudentEdit" class="col-md-4 col-form-label text-md-end">Curs</label>
                    <div class="col-md-6">
                        <input id="cursStudentEdit" type="number" class="form-control border-0 shadow" name="cursEdit">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="telefonStudentEdit" class="col-md-4 col-form-label text-md-end">Telefon</label>
                    <div class="col-md-6">
                        <input id="telefonStudentEdit" type="number" class="form-control border-0 shadow" name="telefonEdit">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="groupEdit" class="col-md-4 col-form-label text-md-end">Group</label>
                    <div class="col-md-6">
                        <select id="groupEdit" name="groupEdit" class="form-select" aria-label="Select your group">
                            <option selected disabled>Group selector</option>
                            @foreach($groupsInfo as $groupInfo)
                                <option value="{{$groupInfo->id}}">{{$groupInfo->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="curriculumEdit" class="col-md-4 col-form-label text-md-end">Curriculum</label>
                    <div class="col-md-6">
                        <input id="curriculumEdit" type="file" class="form-control" name="curriculumEdit" accept="application/pdf">
                    </div>
                </div>

                <div class="row mb-3 d-flex align-items-center">
                    <label for="practiquesStudentEdit" class="form-check-label col-md-4 col-form-label text-md-end">Practices</label>
                    <div class="form-check form-switch mx-3 col-md-6">
                        <input class="form-check-input px-4 pt-4" type="checkbox" id="practiquesStudentEdit" name="practiquesEdit">
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
