@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <!--Enviaments-->
            <div class="card">
                <div class="card-header">{{ __('Studies') }} - CaOsDa</div>
                <table class="table">
                    <tbody>
                        @foreach($studies as $study)
                    <tr>
                        <td>{{$study->nom}}</td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($studies)<5)
                    <p class="text-center text-secondary">No more data</p>
                @endif
            </div>
                <div class="d-flex justify-content-center mt-2">
                    {{ $studies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
