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
        <ul class="navbar-nav navbar-right">
          <li class="active">
            <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
          </li>
          <li><a href="print.php" target="_blank"><i class="glyphicon glyphicon-print"></i> Print Lesson</a></li>
          <li><a href="download.php"><i class="glyphicon glyphicon-download-alt"></i> Download</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!--MAIN CONTAINER-->
  <div class="container" style="margin-top: 80px;">
    <div class="row">
      <div class="col-md-12">
        
        <!-- LESSON HEADER -->
        <div class="lesson-header">
          <h1 class="lesson-title">{{lessonTitle}}</h1>
          <p class="lesson-description">{{lessonDesc}}</p>
        </div>

        <!-- LESSON CONTENT AREA -->
        <div class="lesson-content">
          <div class="alert alert-info">
            <h4>Welcome to your new MetEd lesson!</h4>
            <p>This is your generated lesson template. You can now start adding your content here.</p>
            <p><strong>Lesson ID:</strong> {{lessonID}}</p>
            <p><strong>Language:</strong> {{lessonLang}}</p>
          </div>
          
          <!-- Add your lesson content here -->
          <div class="content-placeholder">
            <p>Start building your lesson content here...</p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p>&copy; {{copyrightYear}} {{splashImageCredit}}</p>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>`;