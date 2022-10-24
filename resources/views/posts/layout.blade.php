<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="/fontawesome/css/fontawesome.css">
<link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="/css/argon-dashboard.css">
    <link rel="stylesheet" href="/css/animate.css">
@yield('css')
</head>

<body class="bg-primary">
    <nav
  class=" mb-5 navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3">
  <div class="container">
    <a class="navbar-brand" href="" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
      Argon Dashboard
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav navbar-nav-hover ms-auto">
        <div class="row">
          <div class="col-auto m-auto">
            <a class="cursor-pointer">
              <i class="fas fa-cog fixed-plugin-button-nav"></i>
            </a>
          </div>
          <div class="col-auto m-auto">
            <div class="dropdown">
              <a class="cursor-pointer" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-right px-2 py-3 ms-n4" aria-labelledby="dropdownMenuButton">
                ...
              </ul>
            </div>
          </div>
          <div class="col-auto">
            <div class="bg-white border-radius-lg d-flex me-2">

                <form class=""  method="POST" action="/logout">
                    @csrf

              <input type="submit" value="Logout" class="btn bg-gradient-primary my-1 me-1" >

                </form>
            </div>
          </div>
        </div>
      </ul>
    </div>
  </div>
</nav>

@yield('content')

@yield('js')
</body>
</html>
