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
  $file_name = "articles.txt";
  $from = $_GET["from"];
  $to = $_GET["to"];
  $page = $_GET["page"];
  $file = fopen($file_name,"r");
  $article_number = fgets($file);
  $pageno = 0;
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
      <a class=\"navbar-brand\" href=\"index.php\">CMSik > Archiwum: strona $page</a>
      <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
        <ul class=\"navbar-nav ml-auto\">
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"index.php\">Główna</a>
          </li>
          <li class=\"nav-item active\">
            <a class=\"nav-link\" href=\"archive.php?from=6&to=10&page=1\">Archiwum
				<span class=\"sr-only\">(current)</span>
			</a>
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
        <h1 class=\"mt-5\">Archiwum: strona $page</h1>
        <section id=\"screenshots\" class=\"screenshots-section\">
		<div class=\"container screenshots\">";
				
				for($i=$from; $i<=$to; $i++){
				echo "<br>
						<div class=\"row\">
						<div class=\"card top-buffer\" style=\"width: 60rem;\">
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
									<a href=\"view_article.php?name=$article_filename[$i]\" class=\"btn btn-primary\">Pokaż więcej</a>
								</div>
							</div>
						</div>
					</div>
					</div>";
				}
			echo "</div> 
	</section>
	  <br>";
	  
	  for($i=6; $i<=$article_number; $i+=5) {
	  $pageplus5 = min($i + 4, $article_number);
	  $pageno += 1;
	  if ($page != $pageno) {
	  echo "<a href=\"archive.php?from=$i&to=$pageplus5&page=$pageno\">$pageno </a>";
      }
	  else {
	  echo "$pageno ";  
	  }
	  }
	  
	  echo "</div>
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
