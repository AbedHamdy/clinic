@extends("clint.layout.app")
@section("title" , "Update Doctor")
@section("clint_content")
    {{-- {{ dd($doctor->major->name_specialty) }} --}}
    <div class="container my-4">
        <div class="card shadow-lg p-4 mx-auto" style="max-width: 500px;">
            <h3 class="text-center mb-4 text-primary">Specialty Form</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('update-doctor') }}">
                @csrf
                @method("put")
                <div class="mb-3">
                    <label for="name_specialty" class="form-label fw-bold">Doctor Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ $doctor->name }}" value="{{ old('name') }}">
                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection