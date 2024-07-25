@extends('layouts.app')

@section('title', 'Add Woman')

@section('content')
    <div class="container">
        <div class="row mt-2 mb-2">
            <div class="col-md-1"></div>
            <div class="col-md-10 d-flex justify-content-center">
                <h1>ADD WOMAN</h1>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row d-flex">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <form action="{{ route('women.store' )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="biography" class="form-label">Biography</label>
                        <textarea class="form-control" name="biography" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="field_of_work" class="form-label">Field of Work</label>
                        <input type="text" class="form-control" name="field_of_work" required>
                    </div>
                    <div class="d-flex">
                        <div class="col-md-8 mb-3 me-2">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" accept="image/jpeg, image/png" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="previewImage" class="form-label">Image Preview</label>
                            <img id="previewImage" class="d-block border rounded" width="356" height="356" src="" alt="No Image Selected">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="birth_date" required>
                    </div>
                    <div class="d-flex justify-content-end mb-5">
                        <button type="submit" class="btn btn-warning">Save</button>
                    </div>
                </form>
                <div class="position-fixed bottom-0 end-0 p-3">
                    <div id="liveToast_failed" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-danger">
                            <strong id="toastTitle_failed" class="me-auto text-light"></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div id="toastContent_failed" class="toast-body"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <script>
        const imageInput = document.getElementsByName('image');
        console.log('running?');
        function displayPreview(event) {
            console.log('started?');
            var input = event.target;
            var image = document.getElementById('previewImage')
            console.log('finished declaration?');
            if (input.files && input.files[0]) {
                console.log('yes file');
                var reader = new FileReader();

                reader.onload = function(e) {
                    image.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
            else {
                console.log('no file')
            }
        }

        imageInput[0].addEventListener('input', displayPreview)
    </script>
@endsection
