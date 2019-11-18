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
  include 'sanitize.php';
  
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
  
  $text_id = $_POST["textID"];
  $path_parts = pathinfo($text_id);
  $file_name = $path_parts['dirname']."/".$path_parts['filename']."_comments.txt";
  $comment_date = $_POST["commentDate"];
  $input_username = $_POST["inputUsername"];
  $input_content = sanitize_paranoid_string($_POST["inputContent"]);
  $input_content = str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"<br/>",$input_content);
  
  $current = file_get_contents($file_name);
  $current .= "\r\n";
  $current .= "$input_username\r\n";
  $current .= "$comment_date\r\n";
  $current .= "$input_content\r\n";
  file_put_contents($file_name, $current);

  echo "<!-- Navigation -->
  <nav class=\"navbar fixed-top navbar-expand-lg navbar-dark bg-dark\">
    <div class=\"container\">
      <a class=\"navbar-brand d-none d-sm-block\" href=\"index.php\">$site_name > $thankyou_name</a>
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
        <h1 class=\"mt-5\">$thankyou_name</h1>
        <p>$commentsubmitted_name</p>
		<a class=\"btn btn-primary\" href=\"view_article.php?name=$text_id\" role=\"button\">Wroć do artykułu</a>
      </div>
    </div>
  </div>";
  
?>
  
<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
