@extends('layouts.app')

@section('title', 'Women')

@section('content')
    <div class="container">
        <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
        <div class="row">
            <div class="mt-3 mb-3 me-3 d-flex">
                <a class="btn btn-success justify-content-end" href=" {{route('women.create')}}">Add Woman</a>
            </div>
        </div>
        <div class="row d-flex">
            <table class="table table-bordered table-hover table-responsive">
                <thead class="table-success">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Biography</th>
                    <th scope="col">Field of Work</th>
                    <th scope="col">Image</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                @foreach ($women as $woman)
                    <tr>
                        <td>{{ $woman->id }}</td>
                        <td>{{ $woman->name }}</td>
                        <td>{{ $woman->biography }}</td>
                        <td>{{ $woman->field_of_work }}</td>
                        <td>
                            <img src="{{ asset($woman->image) }}" alt="placeholder image"></td>
                        <td>{{ $woman->birth_date }}</td>
                        <td>
                            <a class="btn" href="{{route('women.edit', $woman->id)}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                        </td>
                        <td>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#deleteWomanModal-{{ $woman->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <div class="modal fade" id="deleteWomanModal-{{ $woman->id }}" tabindex="-1" aria-labelledby="deleteWomanModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteWomanModalLabel">Delete Woman</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('women.destroy', $woman->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-warning">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="position-fixed bottom-0 end-0 p-3">
            <div id="liveToast_success" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-success">
                    <strong id="toastTitle_success" class="me-auto text-light"></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div id="toastContent_success" class="toast-body"></div>
            </div>
        </div>
    </div>
@endsection
