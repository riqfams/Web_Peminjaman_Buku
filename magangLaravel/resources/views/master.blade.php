<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Laravel</title>
    <!-- <link rel="stylesheet" type="text/css" href="asset/css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <!--Bootstrap CSS-->
    <link rel = "stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymus">
</head>
<body>
    <header>
		<nav>
            <ul>
                <li><a href="list">List Buku</a></li>
                <li><a href="tambah">Tambah Buku</a></li>
                <li><a href="edit">Edit Buku</a></li>
            </ul>
		</nav>
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