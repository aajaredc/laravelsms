<!DOCTYPE html>
<html lang="en">
	<head>
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"> </script>
		<![endif]-->
		<title>Caruso</title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Website of Jared Caruso">

		<!-- Scripts and Libs -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
 		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
		<link type="text/css" href="{{ URL::asset('css/main.css') }}" rel="stylesheet">

		<!-- Font -->
		 <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	</head>

  <body>
    <div class="wrapper navbar-main">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-main">
          <a class="navbar-brand" href="#">uFunny</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="col-lg-7 mr-auto ml-auto form-inline my-2 my-lg-0">
              <input style="width: 100%;" type="text" class="form-control" placeholder="Search" aria-label="" aria-describedby="basic-addon1">
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Login<span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>

    <div class="container pt-5">
      <div class="col-lg-3">
        <div class="area-block px-4 py-3">
          <p class="font-size-20">Trending Tags</p>
          <hr />
          <ul class="popular-tags-list">
            <a class="popular-tags-item">Spice</a>
            <a class="popular-tags-item">Cats</a>
            <a class="popular-tags-item">Funny</a>
            <a class="popular-tags-item">Music</a>
            <a class="popular-tags-item">Shopping Carts</a>
            <a class="popular-tags-item">Food</a>
            <a class="popular-tags-item">Video Games</a>
            <a class="popular-tags-item">Integrity</a>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>
