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
  // translate those into your language, customize those to your site
  $site_name = "CMSik";
  $mainpage_name = "Główna";
  $archive_name = "Archiwum";
  $page_name = "strona";
  $showmore_name = "Pokaż więcej";
  $moreinarchive_name = "Więcej w archiwum.";

  $file_name = "articles.txt";
  $file = fopen($file_name,"r");
  $article_number = fgets($file);
  for($i=1; $i<=$article_number; $i++){
	$article_filename[$i] = fgets($file);
	$article = fopen(trim($article_filename[$i]),"r");
	$article_title[$i] =  fgets($article);
    $article_text[$i] = fgets($article);
    $article_photo[$i] = fgets($article);
	$article_shorttext[$i] = substr($article_text[$i], 0, 100);
	fclose($article);
  }
  fclose($file);
  
  echo "<!-- Navigation -->
  <nav class=\"navbar fixed-top navbar-expand-lg navbar-dark bg-dark\">
    <div class=\"container\">
      <a class=\"navbar-brand\" href=\"index.php\">$site_name</a>
      <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
        <ul class=\"navbar-nav ml-auto\">
          <li class=\"nav-item active\">
            <a class=\"nav-link\" href=\"index.php\">$mainpage_name
              <span class=\"sr-only\">(current)</span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"archive.php?from=6&to=10&page=1\">$archive_name</a>
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
        <h1 class=\"mt-5\">$site_name</h1>
        <section id=\"screenshots\" class=\"screenshots-section\">
		<div class=\"container screenshots\">";
				
				for($i=1; $i<=5; $i++){
				echo "<br>
						<div class=\"row\">
						<div class=\"card top-buffer\" style=\"width: 100%;\">
						<div class=\"row no-gutters\">
							<div class=\"col-auto\">
								<a href=\"view_article.php?name=$article_filename[$i]\">
								<img src=\"$article_photo[$i]\" style=\"width: 12rem; height: 100%\" class=\"img-fluid d-none d-sm-block\" alt=\"\">
								</a>
							</div>
							<div class=\"col\">
								<div class=\"card-block px-2\">
									<h4 class=\"card-title\">$article_title[$i]</h4>
									<p class=\"card-text\">$article_shorttext[$i]...</p>
									<a href=\"view_article.php?name=$article_filename[$i]\" class=\"btn btn-primary\">$showmore_name</a>
								</div>
							</div>
						</div>
					</div>
					</div>";
				}
			echo "</div> 
	</section>
	  <br>
	  <a href=\"archive.php?from=6&to=10&page=1\">$moreinarchive_name</a>
      </div>
    </div>
  </div>
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
