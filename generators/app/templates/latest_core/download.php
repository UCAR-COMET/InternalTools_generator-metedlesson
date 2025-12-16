<?php
    $moduleTitle1 = "<%= lessonTitle %>";
	$agreeLink = "<%= pathStructure %>distribute/getZip.php?moduleID=<%= lessonID %>&type=download&structure=dynamic"; 
?>
<!doctype html>
<html lang="<% if (lessonLang === 'ES') { %>es<% } else if (lessonLang === 'FR') { %>fr<% } else { %>en<% } %>">
<head>
    <meta charset="UTF-8">
    <title><%= lessonTitle %></title>
    <meta name="author" content="">
    <meta name="copyright" content="UCAR/COMET">
    <meta name="robots" content="all">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="initial-scale=1.0">
<!-- =CORE TAGS START= -->
<link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="css/meted-base.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="css/module-custom.css">
  <script src="jquery/jquery.min.js"></script>
  <script src="jquery/jquery-ui.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- lc2024: module-print.css, defaults.js -->
  <link rel="stylesheet" type="text/css" media="print" href="css/module-print.css">
  <script src="jquery/defaults.js"></script>
<!-- =CORE TAGS END= -->
    <script>
    var printVersion = false; // Specify Print View.  [true] for PRINT, or [false] for DYNAMIC content.

    // cleans the download version markup
    $(document).ready(function() {
        // acquire real content then remove junk
        var $content_area = $('#maincontent');
        var $agreement = $('#dl_agree');
            $agreement.hide(); // hide while fussing
        var $agree_content = $agreement.find('#form1 table tr td:first').html();
        var $yes_accept = $agreement.find('input:first');
        var $no_accept = $agreement.find('input:last');
        var $notice = $agreement.find('td:last p:last');

        // create new license div
        $content_area.append('<div id="license_agree"></div>');
        var $new_license = $('#license_agree');
            $new_license.append($agree_content);
            $new_license.before('<h3 style="text-align:center"><% if (lessonLang === "ES") { %>Acuerdo de licencia<% } else if (lessonLang === "FR") { %>Contrat de license<% } else { %>License Agreement<% } %></h3>');
            $new_license.after('<div id="agree_btns"><span></span><span></span></div>');
        var $agree_btns = $('#agree_btns');
            $agree_btns.children('span:first').append($yes_accept);
            $agree_btns.children('span:last').append($no_accept);
            $agree_btns.children('span:first input').addClass('agree').attr('value', '<% if (lessonLang === "ES") { %>Acepto<% } else if (lessonLang === "FR") { %>J\'accepte<% } else { %>I Accept<% } %>');
            $agree_btns.children('span:last input').attr('value', '<% if (lessonLang === "ES") { %>No acepto<% } else if (lessonLang === "FR") { %>Je n\'accepte pas<% } else { %>I do not accept<% } %>');
        // add LC2+ styling
        $('#agree_btns input:first').addClass('btn btn-success');
        $('#agree_btns input:last').addClass('btn btn-default').css('margin-left', '6px');
            $agree_btns.after($notice);
            //$agree_btns.after('<h4>Notice!</h4>');  //This notice should be removed past JAN/2021
            $content_area.find('p:last').removeAttr('style');
            $agreement.remove();
    });
    </script>
<!-- IE SUPPORT ===================================-->
<!--[if lte IE 9]>
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
                <% if (templateType === 'articulate-shell') { %>
                <li><a href="storyline/story.html" target="_blank">Lección <span class="glyphicon glyphicon-new-window"></span></a></li>
                <% } else { %>
                <li><a href="navmenu.php">Lección</a></li>
                <% } %>
                <li class="active"><a href="download.php">Descargar</a></li>
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
                <% if (templateType === 'articulate-shell') { %>
                <li><a href="storyline/story.html" target="_blank">Leçon <span class="glyphicon glyphicon-new-window"></span></a></li>
                <% } else { %>
                <li><a href="navmenu.php">Leçon</a></li>
                <% } %>
                <li class="active"><a href="download.php">Télécharger</a></li>
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
                <% if (templateType === 'articulate-shell') { %>
                <li><a href="storyline/story.html" target="_blank">Lesson <span class="glyphicon glyphicon-new-window"></span></a></li>
                <% } else { %>  
                <li><a href="navmenu.php">Lesson</a></li>
                <% } %>
                <li class="active"><a href="download.php">Download</a></li>
                <li><a href="media_gallery.php">Gallery</a></li>
                <li><a href="#userQuiz" data-toggle="modal">Quiz</a></li>
                <li><a href="#userSurvey" data-toggle="modal">Survey</a></li>
                <li><a href="" id="booster-link">Booster</a></li>
                <% if (templateType === 'multi-print' || templateType === 'articulate-shell') { %><li><a href="contributors.htm">Contributors</a></li>
            <% } %>
            </ul>
            <% } %>
        </div>
        </div>
    </nav>
    <main id="master-container" class="container">
        <article class="row">
            <section id="lesson-content" class="col-sm-12">
                <h2 id="lesson-sidebar-title" class="module-title-text"></h2>
                <div id="menu" class="sidebar-toc">
                    <h4 id="lesson-sidebar-unit-title"><% if (lessonLang === 'ES') { %>Descargar<% } else if (lessonLang === 'FR') { %>Télécharger<% } else { %>Download<% } %></h4>
                </div>
                <hr>
                <div id="maincontent">
                    <div id="dl_agree">
                        <% if (lessonLang === 'ES') { %>
                        <?php include('<%= pathStructure %>download_agreement_es.txt'); ?>
                        <% } else if (lessonLang === 'FR') { %>
                        <?php include('<%= pathStructure %>download_agreement_fr.txt'); ?>
                        <% } else { %>
                        <?php include('<%= pathStructure %>download_agreement.txt'); ?>
                        <% } %>
                    </div>
                </div>
            </section>
        </article>

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

    <!-- QUIZ / SURVEY PROMPTS ========================-->
    <div id="quiz-prompt"></div>
</body>
</html>