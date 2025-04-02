@extends("clint.layout.app")
@section("title" , "Booking a doctor")
@section("clint_content")
{{-- {{ $doctor }} --}}
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb" class="fw-bold my-4 h4" >
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">
                    <a class="text-decoration-none" href="{{ route("clint-home") }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-decoration-none" href="{{ route("clint-doctors") }}">doctors</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    D / {{ $doctor["name"] }}
                </li>
            </ol>
        </nav>
        <div class="d-flex flex-column gap-3 details-card doctor-details">
        <div class="details d-flex gap-2 align-items-center">
            {{-- {{ $doctor->major["name_specialty"] }} --}}
            <img src="../assets/images/major.jpg" alt="doctor" class="img-fluid rounded-circle" height="150" width="150"/>
            <div class="details-info d-flex flex-column gap-3">
                <h4 class="card-title fw-bold">{{ $doctor->name }}</h4>
                <h6 class="card-title fw-bold">
                    The Major : {{ $doctor->major["name_specialty"] }}
                </h6>
            </div>
        </div>
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route("create-booking") }}" method="POST">
            @csrf
            <div class="form-items">
                <div class="mb-3">
                    <label class="form-label required-label" for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" />
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="phone">Phone</label>
                    <input type="tel" name="phone" class="form-control" id="phone" />
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Confirm Booking</button>
        </form>
        </div>
    </div>
    </div>
@endsection