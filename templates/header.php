<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/images/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <!-- script -->
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <title><?= $title; ?></title>
  </head>
  <body>

    <header>

      <?php if (isset($noHeader) && $noHeader): ?>
    <?php else: ?>
      <nav class="flexbox">
          <a href="index" >
              <img id="headerLogo" src="/images/BlogIt_Logo.svg" alt="Logo" >
          </a>
            <ul class="nav__wrapper">
              <li ><a href="create">
                <img class="headerIcons" src="/images/addIcon.png" alt="+">
              </a></li>
              <li >
                <a href="#Profile">
                  <img class="headerIcons" src="/images/pb.jpg" alt="pb"/>
              </a></li>
            </ul>
          </nav>
      <?php endif; ?>
    </header>

    <main class="container">
      <!--<h1><?= $heading; ?></h1>-->
