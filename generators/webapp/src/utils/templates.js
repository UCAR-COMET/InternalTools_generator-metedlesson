// Template content for the Latest Core index.htm file
export const indexTemplate = `<!doctype html>
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

// Template for download.php
export const downloadTemplate = `<?php
/**
 * Download handler for MetEd Lesson: {{lessonTitle}}
 * Lesson ID: {{lessonID}}
 * Language: {{lessonLang}}
 * Generated: {{generatedDate}}
 */

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="{{lessonTitle}}_{{lessonID}}.zip"');
header('Content-Transfer-Encoding: binary');

// Add your download logic here
echo "Download functionality for {{lessonTitle}} (ID: {{lessonID}})";
?>`;

// Template for pageTemplate.php
export const pageTemplateTemplate = `<?php
/**
 * Page Template for MetEd Lesson: {{lessonTitle}}
 * Lesson ID: {{lessonID}}
 * Language: {{lessonLang}}
 * Narrated Version: {{narratedSwitch}}
 */

<!DOCTYPE html>
<html lang="{{lang}}">
<head>
    <meta charset="UTF-8">
    <title>{{lessonTitle}} - Page Template</title>
    <meta name="description" content="{{lessonDesc}}">
    <meta name="keywords" content="{{lessonKeys}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/meted-base.min.css">
    
    <!-- Core JS -->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>{{lessonTitle}}</h1>
            {{#if narratedSwitch}}
            <div class="narration-controls">
                <button id="textMode" class="btn btn-default">Text Mode</button>
                <button id="narratedMode" class="btn btn-default">Narrated Mode</button>
            </div>
            {{/if}}
        </header>
        
        <main>
            <!-- Page content goes here -->
        </main>
        
        <footer>
            <p>&copy; {{copyrightYear}} The COMET Program</p>
        </footer>
    </div>
</body>
</html>`;

// Template for media_gallery.php
export const mediaGalleryTemplate = `<?php
/**
 * Media Gallery for MetEd Lesson: {{lessonTitle}}
 * Lesson ID: {{lessonID}}
 * Language: {{lessonLang}}
 */
?>

<!DOCTYPE html>
<html lang="{{lang}}">
<head>
    <meta charset="UTF-8">
    <title>{{lessonTitle}} - Media Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/meted-base.min.css">
</head>
<body>
    <div class="container">
        <h1>Media Gallery - {{lessonTitle}}</h1>
        <p>Lesson ID: {{lessonID}}</p>
        
        <div class="media-gallery">
            <!-- Media items will be added here -->
        </div>
    </div>
</body>
</html>`;

// Template for print.php
export const printTemplate = `<?php
/**
 * Print Version for MetEd Lesson: {{lessonTitle}}
 * Lesson ID: {{lessonID}}
 */
?>

<!DOCTYPE html>
<html lang="{{lang}}">
<head>
    <meta charset="UTF-8">
    <title>{{lessonTitle}} - Print Version</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Print-specific CSS -->
    <link rel="stylesheet" href="css/module-print.css" media="print">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen">
</head>
<body>
    <div class="print-container">
        <header class="print-header">
            <h1>{{lessonTitle}}</h1>
            <p>Lesson ID: {{lessonID}} | Language: {{lessonLang}}</p>
            <p>&copy; {{copyrightYear}} The COMET Program</p>
        </header>
        
        <main class="print-content">
            <!-- Print content goes here -->
            <p>This is the print-friendly version of your lesson content.</p>
        </main>
        
        <footer class="print-footer">
            <p>Generated on: {{generatedDate}}</p>
        </footer>
    </div>
    
    <script>
        var printVersion = true;
        window.print();
    </script>
</body>
</html>`;
