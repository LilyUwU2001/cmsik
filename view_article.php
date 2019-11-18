<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CMSik</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- FA CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- CMSik CSS -->
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
  $footer_name = "© ".date("Y")." CMSik.";
  $comments_name = "Komentarze";
  $nocomments_name = "Brak komentarzy.";
  $sent_name = "Wysłano";
  $docomment_name = "Skomentuj";
  $nick_name = "Nick";
  $content_name = "Treść";
  $send_name = "Wyślij";
  $thankyou_name = "Dziękujemy.";
  $commentsubmitted_name = "Komentarz został wysłany.";

  $newcomment_date = date("r");

  $file_name = $_GET["name"];
  $file = fopen($file_name,"r");
  $title = fgets($file);
  $text = fgets($file);
  $comments_on = fgets($file);
  $path_parts = pathinfo($file_name);
  $comments_path = $path_parts['dirname']."/".$path_parts['filename']."_comments.txt";
  $input = "read";
  $photo_number = 0;
  while (strlen($input) > 0) {
	$photo_number++;
    $input = fgets($file);
	$photo[$photo_number] = $input;
  }
  fclose($file);
  
  if ($comments_on == 1) {
	$comment_number = 0;
	if (file_exists($comments_path)) {
	$comments = fopen($comments_path,"r");
	$input = "read";
    $comment_number = 0;
    while (strlen($input) > 0) {
	  $comment_number++;
	  $input = fgets($comments);
	  $comment_nick[$comment_number] = $input;
	  $input = fgets($comments);
	  $comment_date[$comment_number] = $input;
      $input = fgets($comments);
	  $comment_text[$comment_number] = $input;
    }
	fclose($comments);
	}
	else {
	  $comments_name = $nocomments_name;
	}
  }
  
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
            <a class=\"nav-link\" href=\"index.php\">$mainpage_name</a>
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
	</section>";
	
	if ($comments_on == 1) {
		echo "<div class=\"container\">
				<div class=\"row\">
					<div class=\"col-lg-12 text-center\">
						<h1 class=\"mt-5\">$comments_name</h1>";
							for($i=1; $i<$comment_number; $i++){
								echo "<h3 class=\"mt-5\">$comment_nick[$i]</h1>";
								echo "<p class=\"text-muted mt-5\">$sent_name $comment_date[$i]</h5>";
								echo "<p style=\"text-align:justify\">$comment_text[$i]</p>";
							}
					echo"
					</div>
				</div>
			</div>
			<div class=\"container\">
    <div class=\"row\">
      <div class=\"col-lg-12 col-xl-10 mx-auto\">
        <div class=\"card card-signin flex-row my-4\">
          <div class=\"card-img-left d-none d-md-flex\">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class=\"card-body\">
            <h5 class=\"text-dark card-title text-center\">$docomment_name</h5>
            <form action=\"submit_comment.php\" method=\"post\" class=\"form-signin\">

			  <input type=\"hidden\" id=\"textID\" name=\"textID\" value=\"$file_name\">
			  <input type=\"hidden\" id=\"commentDate\" name=\"commentDate\" value=\"$newcomment_date\">
              <div class=\"form-label-group\">
                <label class=\"text-dark\" for=\"inputUsername\">$nick_name</label>
                <input type=\"text\" name=\"inputUsername\" id=\"inputUsername\" class=\"form-control\" placeholder=\"$nick_name\" required>
              </div>

              <div class=\"form-label-group\">
                <label class=\"text-dark\" for=\"inputContent\">$content_name</label>
                <textarea rows=\"10\" name=\"inputContent\" id=\"inputContent\" class=\"form-control\" required></textarea>
			  </div>

              <br>

              <button class=\"btn btn-lg btn-primary btn-block text-uppercase\" type=\"submit\">$send_name</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>";
	}
	
	echo"
	<br>
    <br>
    <br>
	<footer class=\"footer fixed-bottom navbar-expand-lg navbar-dark bg-dark text-center\">
		<div class=\"navbar-brand text-center\">$footer_name</div>
    </footer>";
?>
  
<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
