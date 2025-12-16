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
    <link rel="stylesheet" type="text/css" media="screen" href="css/module-custom.css">
    <!-- lc2024: module-print.css, defaults.js -->
    <link rel="stylesheet" type="text/css" media="print" href="css/module-print.css">
    <script type="text/javascript" src="jquery/defaults.js"></script>
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
            <% if (lessonLang === 'ES') { %>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.htm">Inicio</a></li>
                    <li class="active"><a href="navmenu.php">Lección</a></li>
                    <li><a href="download.php">Descargar</a></li>
                    <li><a href="media_gallery.php">Galería multimedia</a></li>
                    <li><a href="#userQuiz" data-toggle="modal">Prueba</a></li>
                    <li><a href="#userSurvey" data-toggle="modal">Encuesta</a></li>
                    <li><a href="" id="booster-link">Refuerzo</a></li>
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
                    <li><a href="#userQuiz" data-toggle="modal">Questionnaire</a></li>
                    <li><a href="#userSurvey" data-toggle="modal">Sondage</a></li>
                    <li><a href="" id="booster-link">Questions de suivi</a></li>
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
                    <li><a href="#userQuiz" data-toggle="modal">Quiz</a></li>
                    <li><a href="#userSurvey" data-toggle="modal">Survey</a></li>
                    <li><a href="" id="booster-link">Booster</a></li>
                <% if (templateType === 'multi-print' || templateType === 'articulate-shell') { %>
                    <li><a href="contributors.htm">Contributors</a></li>
            <% } %>
                </ul>
            <% } %>
            </div>
        </div>
    </nav>

    <main id="master-container" class="container">
        <div class="row">
            <div id="lesson-sidebar" class="col-sm-3">
                <h2 id="lesson-sidebar-title">$templateTitle</h2>
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
                    <hr>
                    $templateMenu
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
                <p id="lesson-copyright">&copy; <%= copyrightYear %>, <a href="https://www.ucar.edu/">The University Corporation for Atmospheric Research</a> - Reservados todos los derechos.</p>
            <% } else if (lessonLang === 'FR') { %>
                <p id="lesson-copyright">&copy; <%= copyrightYear %>, <a href="https://www.ucar.edu/">The University Corporation for Atmospheric Research</a> - Tous droits réservés.</p>
            <% } else { %>
                <p id="lesson-copyright">&copy; <%= copyrightYear %>, <a href="https://www.ucar.edu/">The University Corporation for Atmospheric Research</a> - All Rights Reserved.</p>
            <% } %>
            </div>
            <div class="col-md-4">
            <% if (lessonLang === 'ES') { %>
                <ul id="parent-links">
                    <li><a href="https://www.meted.ucar.edu/legal_es.htm">Avisos legales</a></li>
                    <li><a href="https://www.comet.ucar.edu/">COMET</a></li>
                    <li><a href="https://www.meted.ucar.edu/index_es.php">MetEd</a></li>
                </ul>
            <% } else if (lessonLang === 'FR') { %>
                <ul id="parent-links">
                    <li><a href="https://www.meted.ucar.edu/legal.htm">Mentions juridiques</a></li>
                    <li><a href="https://www.comet.ucar.edu/">COMET</a></li>
                    <li><a href="https://www.meted.ucar.edu/">MetEd</a></li>
                </ul>
            <% } else { %>
                <ul id="parent-links">
                    <li><a href="https://www.meted.ucar.edu/legal.htm">Legal Notices</a></li>
                    <li><a href="https://www.comet.ucar.edu/">COMET</a></li>
                    <li><a href="https://www.meted.ucar.edu/">MetEd</a></li>
                </ul>
            <% } %>
            </div>
        </footer>
    </main>

    <!-- Quiz/Survey Prompts -->
    <div id="quiz-prompt"></div>
</body>
</html>