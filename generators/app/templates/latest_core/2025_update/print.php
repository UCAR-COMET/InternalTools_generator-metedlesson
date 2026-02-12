<?php
require_once( 'cometAPI.inc.php' );
$mm = new MediaItemManager();
?>
<!doctype html>
<html lang="<% if (lessonLang === 'ES') { %>es<% } else if (lessonLang === 'FR') { %>fr<% } else { %>en<% } %>">
<head>
    <title><%= lessonTitle %></title>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <meta name="author" content="UCAR/COMET">
    <meta name="dcterms.rightsHolder" content="UCAR/COMET">
    <meta name="robots" content="all">
    <meta name="Description" content="<%= lessonDesc %>">
    <meta name="keywords" content="<%= lessonKeys %>">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="initial-scale=1.0">
<!-- =CORE TAGS START= -->
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="jquery/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/meted-base.min.css">
    <script src="jquery/jquery.min.js"></script>
    <script src="jquery/jquery-ui.min.js"></script>
    <script src="jquery/jquery-plugins.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="modernizr/modernizr.min.js"></script>
    <link rel="stylesheet" type="text/css" media="print" href="css/module-print.css">
    <script src="jquery/defaults.js"></script>
<!-- =CORE TAGS END= -->
    <script>
    var printVersion = true;
    </script>
    <!--[if lte IE 9]><script type="text/javascript" src="jquery/apps/draw/excanvas.js"></script><script type="text/javascript" src="ie-support/respond.js"></script><link rel="stylesheet" type="text/css" media="screen" href="ie-support/ie-support.css" /><![endif]-->
</head>

<body>
    <!-- MODULE WRAPPER (container) ==================================-->
    <main id="module-wrapper" class="container">
        <div class="row">
            <header id="module-topbanner">
                <h1 id="module-title" class="module-title-text "><%= lessonTitle %></h1>
                <% if (lessonLang==='ES' ) { %>
                    <h3 id="module-credit" class="hidden-sm hidden-xs">Producido por The COMET&reg; Program</h3>
                <% } else if (lessonLang==='FR' ) { %>
                    <h3 id="module-credit" class="hidden-sm hidden-xs">Produit par le programme COMET&reg;</h3>
                <% } else { %>
                <h3 id="module-credit" class="hidden-sm hidden-xs">Produced by The COMET&reg; Program</h3>
                <% } %>
            </header>
        </div>

        <div class="row">
            <!-- TABLE OF CONTENTS ==================================-->
            <nav id="tableofcontents" class="sidebar-toc">
                <ul class="nav lc-docs-sidenav">
                    <li><a href="#page_1-0-0">Sample Page 1-0-0</a></li>
                    <li><a href="#page_2-0-0">Sample Page_2-0-0</a>
                        <ul class="nav" id="ul_2-0-0">
                            <li><a href="#page_2-1-0">Page_2-1-0</a>
                                <ul class="nav" id="ul_2-1-0">
                                    <li><a href="#page_2-1-1">Page_2-1-1</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#page_contributors">Contributors</a></li>
                </ul>
            </nav>

            <!-- MODULE CONTENT ==================================-->
            <div id="module-content" class="col-md-9">
                <div class="row unit-header"></div>
                <section id="page_1-0-0" class="page">
                    <h3 class="sub_head">Sample Page 1-0-0</h3>
                    <p>INSERT PAGE CONTENT HERE</p>
                </section>
                <section id="page_2-0-0" class="page">
                    <h3 class="sub_head">Sample Page 2-0-0</h3>
                    <p>INSERT PAGE CONTENT HERE</p>
                </section>
                <section id="page_2-1-0" class="page">
                    <h3 class="sub_head">Sample Page 2-1-0</h3>
                    <p>INSERT PAGE CONTENT HERE</p>
                </section>
                <section id="page_2-1-1" class="page">
                    <h3 class="sub_head">Sample Page 2-1-1</h3>
                    <p>INSERT PAGE CONTENT HERE</p>
                </section>
                <section id="page_contributors" class="page">
                    <h3 class="sub_head">Contributors</h3>
                    <p>INSERT CONTRIBUTORS NAMES AND AFFILIATIONS HERE</p>
                </section>
            </div>
            <!-- END MODULE CONTENT ==============================-->
        </div>

    <!--FOOTER-->
      <footer id="lesson-footer" class="row splash-footer">
        <div class="col-md-8">
          <% if (lessonLang==='ES' ) { %>
            <p id="lesson-copyright">&copy; <%= copyrightYear %>, <a href="https://www.ucar.edu/" target="_blank">The University Corporation for Atmospheric Research</a> - Reservados todos los derechos.</p>
          <% } else if (lessonLang==='FR' ) { %>
              <p id="lesson-copyright">&copy; <%= copyrightYear %>, <a href="https://www.ucar.edu/" target="_blank">The University Corporation for Atmospheric Research</a> - Tous droits réservés.</p>
          <% } else { %>
            <p id="lesson-copyright">&copy; <%= copyrightYear %>, <a href="https://www.ucar.edu/" target="_blank">The University Corporation for Atmospheric Research</a> - All Rights Reserved.</p>
          <% } %>
        </div>
        <div class="col-md-4">
          <% if (lessonLang==='ES' ) { %>
            <ul id="parent-links">
              <li><a href="https://www.meted.ucar.edu/legal" target="_blank">Avisos legales</a></li>
              <li><a href="https://www.comet.ucar.edu/" target="_blank">COMET</a></li>
              <li><a href="https://www.meted.ucar.edu/index_es.php" target="_blank">MetEd</a></li>
            </ul>
          <% } else if (lessonLang==='FR' ) { %>
            <ul id="parent-links">
              <li><a href="https://www.meted.ucar.edu/legal" target="_blank">Mentions juridiques</a></li>
              <li><a href="https://www.comet.ucar.edu/" target="_blank">COMET</a></li>
              <li><a href="https://www.meted.ucar.edu/" target="_blank">MetEd</a></li>
            </ul>
          <% } else { %>
            <ul id="parent-links">
              <li><a href="https://www.meted.ucar.edu/legal" target="_blank">Legal Notices</a></li>
              <li><a href="https://www.comet.ucar.edu/" target="_blank">COMET</a></li>
              <li><a href="https://www.meted.ucar.edu/" target="_blank">MetEd</a></li>
            </ul>
          <% } %>
        </div>
      </footer>

    </main>
    <!-- END MODULE WRAPPER (container) ==================================-->

    <!-- BACK TO TOP BUTTON =========================== -->
    <p class="back-top">
    <% if (lessonLang==='ES' ) { %>
        <a href="#top"><span class="glyphicon glyphicon-upload"></span>Arriba</a>
    <% } else if (lessonLang==='FR' ) { %>
        <a href="#top"><span class="glyphicon glyphicon-upload"></span>Haut de la page</a>
    <% } else { %>
        <a href="#top"><span class="glyphicon glyphicon-upload"></span>Back to Top</a>
    <% } %>
    </p>

    <!-- MODAL PROMPTS ======================== -->
    <div id="quiz-prompt"></div>

    <!-- PRINT STYLES SCRIPT ==========================-->
    <script>
    $(document).ready(function() {
        // Remove all media stylesheets
        $('link[media~="screen"]').remove();
        // Convert print stylesheet to all-media
        $('link[media~="print"]').attr('media', 'all');
    });
    </script>
</body>
</html>