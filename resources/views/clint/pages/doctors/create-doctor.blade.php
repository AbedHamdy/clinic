@extends("clint.layout.app")
@section("title" , "Create Doctor")
@section("clint_content")
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <h3 class="text-center mb-4">Enter Your Name</h3>
                    <form action="{{ route("store-doctor") }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="major_id" class="form-label fw-bold">Specialty</label>
                            <select class="form-select" id="major_id" name="major_id" required>
                                <option value="" disabled selected>Select Specialty</option>
                                @foreach($majors as $major)
                                    <option value="{{ $major->id }}">{{ $major->name_specialty }}</option>
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