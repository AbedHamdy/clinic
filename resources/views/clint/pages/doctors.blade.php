@extends("clint.layout.app")
@section("title" , "Doctors")
@section("clint_content")
{{-- {{ $doctors }} --}}
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route("clint-home") }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">doctors</li>
            </ol>
        </nav>
        <div class="doctors-grid">
            @foreach($doctors as $doctor)
                <div class="card p-2" style="width: 18rem;">
                    <img src="../assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"alt="Image Doctor">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">{{ $doctor["name"] }}</h4>
                        <h6 class="card-title fw-bold text-center">{{ $doctor["major"]["name_specialty"] }}</h6>
                        <a href="{{ route("clint-booking" , $doctor->id) }}" class="btn btn-outline-primary card-button">
                            Book an appointment
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route("delete-doctor" , $doctor->id) }}">
                    @method("delete")
                    @csrf
                    <button class="btn btn-outline-primary" type="submit">Delete</button>
                </form>
            @endforeach
        </div>
        {{-- <nav class="mt-5" aria-label="navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link page-prev" href="#" aria-label="Previous">
                        <span aria-hidden="true">
                            < </span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link page-next" href="#" aria-label="Next">
                        <span aria-hidden="true"> > </span>
                    </a>
                </li>
            </ul>
        </nav> --}}
    </div>
@endsection