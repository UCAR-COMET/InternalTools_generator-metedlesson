export default `<!doctype html>
<html lang="{{lang}}">
<head>
  <meta charset="UTF-8">
  <title>{{lessonTitle}}</title>
  <meta name="author" content="UCAR/COMET">
  <meta name="dcterms.rightsHolder" content="UCAR/COMET">
  <meta name="robots" content="all">
  <meta name="Description" content="{{lessonDesc}}">
  <meta name="keywords" content="{{lessonKeys}}">
  <meta name="viewport" content="width=device-width">
  <meta name="viewport" content="initial-scale=1.0">
  <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="css/meted-base.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="css/module-absorb.css">
  <script src="jquery/jquery.min.js"></script>
  <script src="jquery/jquery-ui.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" media="print" href="css/module-print.css">
  <script src="jquery/defaults.js"></script>
  <script>
    var printVersion = false; // Specify Print View.  Only [true] for print.php
  </script>

<!-- IE SUPPORT ==================================-->
<!--[if lte IE 9]>
  <script type="text/javascript" src="ie-support/html5shiv.js"></script>
  <script type="text/javascript" src="ie-support/respond.js"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="ie-support/ie-support.css" />
<![endif]-->
</head>
<body>

  <!--NAVBAR-->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
      
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="">Home</a></li>
          <li><a href="navmenu.php">Lesson</a></li>
          <li><a href="download.php">Download</a></li>
          <li><a href="media_gallery.php">Gallery</a></li>
        </ul>
      
      </div>
    </div>
  </nav>

  <main id="master-container" class="container splash-background">
    <section class="splash-overlay row">
      <section class="lesson-titles center">
        <h1 id="lesson-title">{{lessonTitle}}</h1>
        <br>
      </section>

      <section id="lesson-midrow-items" class="row">
        <div class="col-md-12">
            <div class="center"><a href="navmenu.php" class="btn btn-lg btn-primary begin-lesson-button">Begin Lesson &rarr;</a></div>
        </div>
      </section>

      <section id="lesson-splash-credits" class="row">
          <div id="lesson-producer" class="col-sm-6">Produced by The COMET&reg; Program</div>
          <div id="lesson-image-credit" class="col-sm-6">{{splashImageCredit}}</div>
      </section>


      <!--FOOTER-->
      <footer id="lesson-footer" class="row splash-footer">
        <div class="col-md-8">
            <p id="lesson-copyright">&copy; {{copyrightYear}}, <a href="https://www.ucar.edu/" target="_blank">The University Corporation for Atmospheric Research</a> - All Rights Reserved.</p>
        </div>
        <div class="col-md-4">
            <ul id="parent-links">
              <li><a href="https://www.meted.ucar.edu/legal" target="_blank">Legal Notices</a></li>
              <li><a href="https://www.comet.ucar.edu/" target="_blank">COMET</a></li>
              <li><a href="https://www.meted.ucar.edu/" target="_blank">MetEd</a></li>
            </ul>
        </div>
      </footer>

  </main>


</body>
</html>`;