<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CMSik</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- FA CSS and JS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Classifieds CSS -->
  <link href="style.css" rel="stylesheet">

</head>

<body>

<?php
  $site_name = "CMSik";
  $file_name = $_GET["name"];
  $file = fopen($file_name,"r");
  $title = fgets($file);
  $text = fgets($file);
  $input = "read";
  $photo_number = 0;
  while (strlen($input) > 0) {
	$photo_number++;
    $input = fgets($file);
	$photo[$photo_number] = $input;
  }
  fclose($file);
  
  echo "<!-- Navigation -->
  <nav class=\"navbar fixed-top navbar-expand-lg navbar-dark bg-dark\">
    <div class=\"container\">
      <a class=\"navbar-brand d-none d-sm-block\" href=\"index.php\">$site_name > $title</a>
      <a class=\"navbar-brand d-sm-block d-md-none\" href=\"index.php\">$site_name</a>
	  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
        <ul class=\"navbar-nav ml-auto\">
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"index.php\">Główna</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"archive.php?from=6&to=10&page=1\">Archiwum</a>
          </li>";
        echo"
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"col-lg-12 text-center\">
        <h1 class=\"mt-5\">$title</h1>
        <p style=\"text-align:justify\">$text</p>
      </div>
    </div>
  </div>
  
  <section id=\"screenshots\" class=\"screenshots-section\">
		<div class=\"container screenshots\">
			<div class=\"row\">";
				
				for($i=1; $i<$photo_number; $i++){
				echo "<div class=\"col-lg-4 col-md-4 col-sm-12 top-buffer\">
					<a href=\"$photo[$i]\">
						<img style=\"width:22rem; height:14rem;\" src=\"$photo[$i]\" class=\"text-center img-fluid\">
					</a>
				</div>";		
				}
			echo "</div>
		</div> 
	</section>
	<br>
    <br>
    <br>";
?>

  <footer class="footer fixed-bottom navbar-expand-lg navbar-dark bg-dark text-center">
		<div class="navbar-brand text-center">© 2019 CMSik.</div>
  </footer>
  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
