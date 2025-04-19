{{-- {{ dd($majors) }} --}}
@extends("clint.layout.app")
@section("title" , "Majors")
@section("clint_content")
    @if (session('success-update-major'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success-update-major') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route("clint-home") }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">majors</li>
            </ol>
        </nav>
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
        <div class="majors-grid">
            @forelse($majors as $major)
                <div class="card p-2" style="width: 18rem;">
                    <img src="assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">{{ $major["name_specialty"] }}</h4>
                        <a href="{{ route("show-doctors" , $major->id) }}" class="btn btn-outline-primary card-button">Browse Doctors</a>
                    </div>
                </div>
                @if (Auth::check() && Auth::user()->role == "admin")
                    <div class="d-flex flex-column mt-2" style="width:14rem;">
                        <form method="POST" action="{{ route("delete-major", $major->id) }}">
                            @csrf
                            @method("delete")
                            <button class="btn btn-outline-danger w-100 mb-2" type="submit">Delete</button>
                        </form>

                        <a href="{{ route('show-major', $major->id) }}" class="btn btn-outline-primary w-100">Update</a>
                    </div>
                @endif
            @empty
                <div class="alert alert-info text-center" role="alert">
                    No majors available.
                </div>
            @endforelse
            {{ $majors->links() }}
        </div>
@endsection