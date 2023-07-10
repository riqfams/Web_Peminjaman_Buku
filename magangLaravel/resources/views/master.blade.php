<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Laravel</title>
    <!-- <link rel="stylesheet" type="text/css" href="asset/css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/content.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">

    <!--Bootstrap CSS-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    rel = "stylesheet" crossorigin="anonymus">
</head>
<body>
    <header>
		<nav>
            <ul>
                <li><a href="/buku/list">Data Buku</a></li>
                <li><a href="/anggota/list">Data Anggota</a></li>
                <li><a href="/peminjamanBuku/list">Peminjaman Buku</a></li>
                <li><a href="/kembalikan-buku">Pengembalian Buku</a></li>
            </ul>
		</nav> 
        <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Navbar</a>
          
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </nav> -->
	</header>
	<hr/>

	<!-- bagian judul halaman blog -->
	<h3> @yield('judul_halaman') </h3>
 
    <div class="content">
        <!-- bagian konten blog -->
	    @yield('konten')
    </div>
	
	<hr/>
	<footer>
		<p>By Ariq</p>
	</footer>
</body>
</html>