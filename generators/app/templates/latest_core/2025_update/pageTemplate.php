<!doctype html>
<html lang="<% if (lessonLang === 'ES') { %>es<% } else if (lessonLang === 'FR') { %>fr<% } else { %>en<% } %>">
<head>
    <meta charset="UTF-8">
    <title>$templateTitle</title>
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
    <link rel="stylesheet" type="text/css" media="screen" href="jquery/meted-player/mediaelementplayer.min.css">
    <script src="jquery/meted-player/mediaelement-and-player.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="jquery/apps/fancybox/fancybox.min.css">
    <script src="jquery/apps/fancybox/fancybox.min.js"></script>
    <script src="jquery/apps/elevatezoom/elevatezoom.min.js"></script>
    <script src="jquery/apps/drag/drag.js"></script>
    <script src="jquery/apps/draw/draw.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="jquery/apps/image-sweep/image-sweep.css">
    <script src="jquery/apps/image-sweep/image-sweep.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/module-absorb.css">
    <link rel="stylesheet" type="text/css" media="print" href="css/module-print.css">
    <script type="text/javascript" src="jquery/defaults.js"></script>
    <script type="text/javascript" src="jquery/module-custom.js"></script>
<!-- =CORE TAGS END= -->
    <script type="text/javascript">
    var printVersion = $typeBoolean; // Specify Print View.  [true] for PRINT, or [false] for DYNAMIC content.
    </script>

<!-- IE SUPPORT ===================================-->
<!--[if lte IE 9]>
    <script type="text/javascript" src="jquery/apps/draw/excanvas.js"></script>
    <script type="text/javascript" src="ie-support/respond.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="ie-support/ie-support.css" />
<![endif]-->
</head>
<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid" style="max-width: 1200px;">
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
            <% if (lessonLang === 'ES') { %>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.htm">Inicio</a></li>
                    <li class="active"><a href="navmenu.php">Lección</a></li>
                    <li><a href="download.php">Descargar</a></li>
                    <li><a href="media_gallery.php">Galería multimedia</a></li>
                <% if (templateType === 'multi-print' || templateType === 'articulate-shell') { %>
                    <li><a href="contributors.htm">Colaboradores</a></li>
            <% } %>
                </ul>
            <% } else if (lessonLang === 'FR') { %>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.htm">Accueil</a></li>
                    <li class="active"><a href="navmenu.php">Leçon</a></li>
                    <li><a href="download.php">Télécharger</a></li>
                    <li><a href="media_gallery.php">Médiathèque</a></li>
                <% if (templateType === 'multi-print' || templateType === 'articulate-shell') { %>
                    <li><a href="contributors.htm">Contributeurs</a></li>
            <% } %>
                </ul>
            <% } else { %>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.htm">Home</a></li>
                    <li class="active"><a href="navmenu.php">Lesson</a></li>
                    <li><a href="download.php">Download</a></li>
                    <li><a href="media_gallery.php">Gallery</a></li>
                <% if (templateType === 'multi-print' || templateType === 'articulate-shell') { %>
                    <li><a href="contributors.htm">Contributors</a></li>
            <% } %>
                </ul>
            <% } %>
            </div>
        </div>
    </nav>

    <main id="master-container" class="container-fluid" style="max-width: 1200px;">
        <div class="row">
            <div id="lesson-sidebar" class="col-sm-3">
                <h2 id="lesson-sidebar-title">$templateTitle</h2>
                <hr>
                <!--  Table of Contents -->
                <nav id="menu" class="sidebar-toc">
                    <!-- Multi-print Lesson Selector -->
                    <div class="btn-group">
                    <% if (templateType === 'multi-print') { %>
                        <a href="#" data-toggle="dropdown"><h4 id="lesson-sidebar-unit-title">$titleTag <span class="caret"></span></h4></a>
                        $tabMenu
                    <% } %>
                    </div>
                    <% if (narratedSwitch) { %>
                    <!-- Narrated/Text Switch -->
                    <div id="toggle_text" class="module-nav">
                        $typeLink
                    </div>
                    <% } %>
                    
                    <!--<div class="dropdown">
                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Section
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="navmenu.php?tab=1">Section 1</a></li>
                        <li><a href="navmenu.php?tab=2">Section 2</a></li>
                    </ul>
                    </div>-->

                    <br>
                    $templateMenu
                    <hr>
                    <!--<div class="module-nav">
                        <ul class="nav">
                            <li><a href="#.htm" class="fbox-res-iframe">ADDITIONAL RESOURCES</a></li>
                        </ul> 
                    </div>-->
                </nav>
            </div>

            <section id="lesson-content" class="col-sm-9">
                <div id="print-button">
                    <a href="$printLink"><span class="glyphicon glyphicon-print"></span> <% if (lessonLang === 'ES') { %>Imprimir<% } else if (lessonLang === 'FR') { %>Imprimer<% } else { %>Print<% } %></a>
                </div>
                $templateContent
                
            </section>
        </div>

        <!--FOOTER-->
        <footer id="lesson-footer" class="row">
            <div class="col-md-8">
            <% if (lessonLang === 'ES') { %>
                <p id="lesson-copyright">&copy; <%= copyrightYear %>, <a href="https://www.ucar.edu/" target="_blank">The University Corporation for Atmospheric Research</a> - Reservados todos los derechos.</p>
            <% } else if (lessonLang === 'FR') { %>
                <p id="lesson-copyright">&copy; <%= copyrightYear %>, <a href="https://www.ucar.edu/" target="_blank">The University Corporation for Atmospheric Research</a> - Tous droits réservés.</p>
            <% } else { %>
                <p id="lesson-copyright">&copy; <%= copyrightYear %>, <a href="https://www.ucar.edu/" target="_blank">The University Corporation for Atmospheric Research</a> - All Rights Reserved.</p>
            <% } %>
            </div>
            <div class="col-md-4">
            <% if (lessonLang === 'ES') { %>
                <ul id="parent-links">
                    <li><a href="https://www.meted.ucar.edu/legal" target="_blank">Avisos legales</a></li>
                    <li><a href="https://www.comet.ucar.edu/" target="_blank">COMET</a></li>
                    <li><a href="https://www.meted.ucar.edu/index_es.php" target="_blank">MetEd</a></li>
                </ul>
            <% } else if (lessonLang === 'FR') { %>
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

    <!-- Quiz/Survey Prompts -->
    <div id="quiz-prompt"></div>
</body>
</html>