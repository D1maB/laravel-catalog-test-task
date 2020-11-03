<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('dashboard.index') }}" style="background: white;">
        <span style="color: #000; font-weight: bold; margin-left: 5px">Dashboard</span>
    </a>
    {{--<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('dashboard.index') }}">Barbershop</a>--}}
    <input class="d-none form-control form-control-dark w-100" type="text" placeholder="" aria-label="Search">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        {{ csrf_field() }}
    </form>

    <button class="navbar-toggler d-block d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar" id="navbarSupportedContent">
            <div class="sidebar-sticky mt-5 mt-sm-0">
                <ul class="nav flex-column mt-5">
                    <li class="nav-item">
                        <a class="nav-link mt-3" href="{{ route('dashboard.product.index') }}">
                            <span data-feather="home"></span>
                            Products
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.order.index') }}">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-danger" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span data-feather="layers"></span>
                            Logout
                        </a>
                    </li>

                </ul>


            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-5 -border-bottom">
                <h1 class="h2">@yield('section-title')</h1>
            </div>
            <div>
                @yield('content')
            </div>
        </main>
    </div>
</div>

</body>
</html>
