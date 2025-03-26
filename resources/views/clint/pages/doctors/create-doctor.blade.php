@extends("clint.layout.app")
@section("title" , "Create Doctor")
@section("clint_content")
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <h3 class="text-center mb-4">Enter Your Name</h3>
                    @if (session("success"))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session("success") }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route("store-doctor") }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Your Name</label>
                            <input type="text" class="form-control" value="{{ old('name', $data['name'] ?? '') }}" id="name" name="name" placeholder="Enter your full name" >
                        </div>
                        <div class="mb-3">
                            <label for="major_id" class="form-label fw-bold">Specialty</label>
                            <select class="form-select" id="major_id" name="major" required>
                                <option value="" disabled selected>Select Specialty</option>
                                @foreach($majors as $major)
                                    <option value="{{ $major->id }}" {{ old('major', $data['major'] ?? '') == $major->id ? 'selected' : '' }}>
                                        {{ $major->name_specialty }}
                                    </option>
                                @endforeach
                            </select>
                        </div>                        
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection