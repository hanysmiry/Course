<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('FrontEnd/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('FrontEnd/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontEnd/css/style.css')}}">

    <title>Vision Courses</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="{{route('homePagee')}}">Vision Courses</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('homePagee')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('contactPage')}}">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
@yield('content')
    <footer class="py-4 text-center bg-dark text-white">
      <p class="m-0">All Copyright reserved to <a href="#">hani alsmiry </a> <i class="far fa-copyright"></i> {{date('Y')}}</p>
    </footer>

    <script src="{{asset('FrontEnd/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('FrontEnd/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('FrontEnd/js/script.js')}}"></script>
  </body>
</html>
