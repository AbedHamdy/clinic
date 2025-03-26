<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js"
            integrity="sha512-4TcjHXQMLM7Y6eqfiasrsnRCc8D/unDeY1UGKGgfwyLUCTsHYMxF7/UHayjItKQKIoP6TTQ6AMamb9w2GMAvNg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @include("clint.layout.links")

        <title>@yield("title")</title>
    </head>

    <body>
        <div class="page-wrapper">
            @include("clint.layout.nav")
            @yield("clint_content");
        </div>


        <footer class="container-fluid bg-blue text-white py-3">
            <div class="row gap-2">

                <div class="col-sm order-sm-1">
                    <h1 class="h1">About Us</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                        laborum
                        saepe
                        enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur
                        cum
                        iure
                        quod facere.</p>
                </div>
                <div class="col-sm order-sm-2">
                    <h1 class="h1">Links</h1>
                    <div class="links d-flex gap-2 flex-wrap">
                        <a href="{{ route("clint-home") }}" class="link text-white">Home</a>
                        <a href="{{ route("clint-majors") }}" class="link text-white">Majors</a>
                        <a href="{{ route("clint-doctors") }}" class="link text-white">Doctors</a>
                        <a href="{{ route("create-major") }}" class="link text-white">Create Major</a>
                        <a href="{{ route("create-doctor") }}" class="link text-white">Create Doctor</a>
                        @auth
                            <a href="{{ route("logout") }}" class="link text-white">Logout</a>
                        @else
                            <a href="{{ route('login') }}" class="link text-white">Login</a>
                            <a href="{{ route('register') }}" class="link text-white">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </footer>
        @include("clint.layout.scripts")
    </body>

</html>