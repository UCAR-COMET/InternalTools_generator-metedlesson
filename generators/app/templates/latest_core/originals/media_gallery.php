<!doctype html>
<?php 
require_once('cometAPI.inc.php'); 
    $mm = new MediaItemManager();
    $items = $mm->getMediaGalleryUTF8(<%= lessonID %>);
    $moduleManager = new ModuleManager();
    $module = $moduleManager->getModule(<%= lessonID %>);
?>
<html lang="<% if (lessonLang === 'ES') { %>es<% } else if (lessonLang === 'FR') { %>fr<% } else { %>en<% } %>">
<head>
    <meta charset="UTF-8">
    <title><%= lessonTitle %></title>
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
    // Specify Print View.  [true] for PRINT, or [false] for DYNAMIC content.
    var printVersion = true;
    $(document).ready(function() {
        // Media Gallery - fancybox all image items
        $("a[href$='.jpg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox({
            helpers: {
                title: { type: 'inside'},
                buttons: {}
            }
        });
        // Media Gallery - fancybox video and htm loop
        $(".media-thumbnail > a[href$='.htm'], .media-thumbnail > a[href$='.html'], a[href$='.mp4']").attr(
            'rel', 'gallery-anim').fancybox({
            type: 'iframe',
            helpers: {
                title: {type: 'inside'},
                buttons: {}
            }
        });
    });
    </script>

<!-- IE SUPPORT ===================================-->
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
				<% if (lessonLang === 'ES') { %>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.htm">Inicio</a></li>
					<% if (templateType === 'articulate-shell') { %>
					<li><a href="storyline/story.html" target="_blank">Lección <span
								class="glyphicon glyphicon-new-window"></span></a></li>
					<% } else { %>
					<li><a href="navmenu.php">Lección</a></li>
					<% } %>
					<li><a href="download.php">Descargar</a></li>
					<li class="active"><a href="media_gallery.php">Galería multimedia</a></li>
					<li><a href="#userQuiz" data-toggle="modal">Prueba</a></li>
					<li><a href="#userSurvey" data-toggle="modal">Encuesta</a></li>
					<li><a href="" id="booster-link">Refuerzo</a></li>
					<% if (templateType === 'multi-print' || templateType === 'articulate-shell') { %><li><a
							href="contributors.htm">Colaboradores</a></li>
					<% } %>
				</ul>
				<% } else if (lessonLang === 'FR') { %>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.htm">Accueil</a></li>
					<% if (templateType === 'articulate-shell') { %>
					<li><a href="storyline/story.html" target="_blank">Leçon <span
								class="glyphicon glyphicon-new-window"></span></a></li>
					<% } else { %>
					<li><a href="navmenu.php">Leçon</a></li>
					<% } %>
					<li><a href="download.php">Télécharger</a></li>
					<li class="active"><a href="media_gallery.php">Médiathèque</a></li>
					<li><a href="#userQuiz" data-toggle="modal">Questionnaire</a></li>
					<li><a href="#userSurvey" data-toggle="modal">Sondage</a></li>
					<li><a href="" id="booster-link">Questions de suivi</a></li>
					<% if (templateType === 'multi-print' || templateType === 'articulate-shell') { %><li><a
							href="contributors.htm">Contributeurs</a></li>
					<% } %>
				</ul>
				<% } else { %>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.htm">Home</a></li>
					<% if (templateType === 'articulate-shell') { %>
					<li><a href="storyline/story.html" target="_blank">Lesson <span
								class="glyphicon glyphicon-new-window"></span></a></li>
					<% } else { %>
					<li><a href="navmenu.php">Lesson</a></li>
					<% } %>
					<li><a href="download.php">Download</a></li>
					<li class="active"><a href="media_gallery.php">Gallery</a></li>
					<li><a href="#userQuiz" data-toggle="modal">Quiz</a></li>
					<li><a href="#userSurvey" data-toggle="modal">Survey</a></li>
					<li><a href="" id="booster-link">Booster</a></li>
					<% if (templateType === 'multi-print' || templateType === 'articulate-shell') { %><li><a
							href="contributors.htm">Contributors</a></li>
					<% } %>
				</ul>
				<% } %>
			</div>
		</div>
	</nav>

	<main id="master-container" class="container">

		<div class="row">
			<div id="lesson-content" class="col-sm-12">
				<h2 id="lesson-sidebar-title" class="module-title-text"></h2>
				<!--  Table of Contents -->
				<div id="menu" class="sidebar-toc">
					<h4 id="lesson-sidebar-unit-title"><% if (lessonLang === 'ES') { %> Galería multimedia<% } else if (lessonLang === 'FR') { %>Médiathèque<% } else { %>Media Gallery<% } %></h4>
				</div>
				<hr>
				<% if (lessonLang === 'ES') { %>
				<p>Los elementos multimedia empleados en esta lección están protegidos por diversas licencias de
					propiedad intelectual (<i>copyright</i>). Para obtener más información al respecto, utilice el
					enlace «Términos de derechos de autor» asociado a cada elemento a continuación.</p>
				<% } else if (lessonLang === 'FR') { %>
				<p>Les supports graphiques utilisés dans ce leçon sont protégés par différents droits d'auteurs.
					Veuillez svp utiliser le lien «&nbsp;termes des droits d'auteurs&nbsp;» associé à chaque élément
					ici-bas pour plus d'informations.</p>
				<% } else { %>
				<p>Media elements used in this module are protected by a variety of copyright licenses. Please use the
					"copyright terms" link associated with each item below for more information.</p>
				<% } %>

    <div id="image_gallery" class="gallery-container row">
        <?php foreach($items as $item) { ?>
        
        <?php $item->description = str_replace( '"', '&quot;', $item->description ); ?>
            <!--?php $item->description = str_replace( '&', '&amp;', $item->description ); ?-->
            <!--?php $item->credits = str_replace( '&', '&amp;', $item->credits ); ?-->
        <?php $item->credits = str_replace( '"', '&quot;', $item->credits ); 
            $pattern =  "/" . preg_quote($module->path, "/") . "/";
            $item->path = preg_replace($pattern, "", $item->path);
        ?>
    </div>
                
    <div class="gallery-container">
        <div id="a<?php echo $item->id; ?>" class="col-md-4 col-xs-6 gallery-item">
        <% if (lessonLang === 'ES') { %>
            <article class="panel panel-default">
                <section class="media-thumbnail">
                    <?php /*START_PHP_SIRFCIT*/ if ($item->extension != "swf" && $item->extension != "mp4" && $item->extension != "htm") { ?>
                        <a href="<?php echo $item->path . "/" . $item->name . "." . $item->extension; ?>" target="_blank">
                            <img src="<?php echo $item->path . "/" . $item->name . "." . $item->extension; ?>" alt="<?php echo $item->description; ?>" height="130" class="center-block" />
                        </a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->extension == "swf") { ?>
                        <a href="<?php echo $item->path . "/" . $item->name . "." . $item->extension; ?>" target="_blank">
                            <img src="<?php echo $item->path . "/" . $item->name . ".jpg" ?>" alt="<?php echo $item->description; ?>" height="130" />
                        </a><br /><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->extension == "mp4") { ?>
                        <a href="<?php echo $item->path . "/" . $item->name . "." . $item->extension; ?>" target="_blank">
                            <img src="<?php echo $item->path . "/" . $item->name . ".jpg" ?>" alt="<?php echo $item->description; ?>" height="130" />
                        </a><br /><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->extension == "htm") { ?>
                        <a href="<?php echo $item->path . "/index." . $item->extension; ?>" target="_blank">
                            <img src="<?php echo $item->path . "/" . $item->name . ".jpg" ?>" alt="<?php echo $item->description; ?>" height="130" />
                        </a><br />
                        <a href="<?php echo $item->path . "/index." . $item->extension; ?>" target="_blank">Ver animación</a> <?php } /*END_PHP_SIRFCIT*/ ?>
                </section>
                <section class="media-description">
                    <div class="media-description-text">
                        <p><strong>Descripción:</strong><br> <?php echo $item->description; ?></p>
                    </div>

                    <p class="media-filename"><strong>Nombre de archivo:</strong><br><?php echo $item->name ?>.<?php echo $item->extension; ?></p>
                    <p><strong>Créditos:</strong><br><?php echo $item->credits; ?></p>
                    <p><strong>Términos de derechos de autor:</strong> <br>
                        <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type == "COMET Standard Terms of Use") { ?>
                        <a href="http://www.meted.ucar.edu/legal_es.htm" target="_blank">Términos de uso estándar de COMET</a> <?php } /*END_PHP_SIRFCIT*/ ?>
                        <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type == "COMET Standard Terms of Use - NCU") { ?>
                        <a href="http://www.meted.ucar.edu/legal_es.htm" target="_blank">Términos de uso estándar de COMET - Uso no comercial</a> <?php } /*END_PHP_SIRFCIT*/ ?>
                        <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type == "Creative Commons BY 4.0 International") { ?>
                        <a href="http://creativecommons.org/licenses/by/4.0/" target="_blank">Creative Commons BY 4.0 Internacional</a> <?php } /*END_PHP_SIRFCIT*/ ?>
                        <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type == "Creative Commons Attribution-ShareAlike 3.0 IGO") { ?>
                        <a href="http://creativecommons.org/licenses/by-sa/3.0/igo/" target="_blank">Creative Commons, Atribución-Compartir Igual 3.0 IGO</a> <?php } /*END_PHP_SIRFCIT*/ ?>
                        <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type == "Creative Commons Attribution-ShareAlike 3.0 Unported") { ?>
                        <a href="http://creativecommons.org/licenses/by-sa/3.0/" target="_blank">Creative Commons, Atribución-Compartir Igual 3.0</a> <?php } /*END_PHP_SIRFCIT*/ ?>
                        <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type == "Creative Commons Attribution-ShareAlike 2.5") { ?>
                        <a href="http://creativecommons.org/licenses/by-sa/2.5/" target="_blank">Creative Commons, Atribución-Compartir Igual 2.5</a> <?php } /*END_PHP_SIRFCIT*/ ?>
                        <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type == "Creative Commons Attribution-ShareAlike 2.0") { ?>
                        <a href="http://creativecommons.org/licenses/by-sa/2.0/" target="_blank">Creative Commons, Atribución-Compartir Igual 2.0</a> <?php } /*END_PHP_SIRFCIT*/ ?>
                        <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type == "Creative Commons Attribution-Noncommercial-Share Alike 2.0 Generic") { ?>
                        <a href="http://creativecommons.org/licenses/by-nc-sa/2.0/" target="_blank">Creative Commons, Atribución-No comercial-Compartir igual 2.0 Genérica</a> <?php } /*END_PHP_SIRFCIT*/ ?>
                        <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type == "Creative Commons Attribution-Noncommercial 2.0 Generic") { ?>
                        <a href="http://creativecommons.org/licenses/by-nc/2.0/" target="_blank">Creative Commons Atribución-No comercial 2.0 Genérica</a> <?php } /*END_PHP_SIRFCIT*/ ?>
                        <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type == "Creative Commons Attribution 2.0") { ?>
                        <a href="http://creativecommons.org/licenses/by/2.0/" target="_blank">Creative Commons Atribución 2.0</a> <?php } /*END_PHP_SIRFCIT*/ ?>
                        <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type == "Creative Commons Attribution 2.0 Generic") { ?>
                        <a href="http://creativecommons.org/licenses/by/2.0/" target="_blank">Creative Commons Atribución 2.0 Genérica</a> <?php } /*END_PHP_SIRFCIT*/ ?>
                    </p>
                </section>
            </article>
        <% } else if (lessonLang === 'FR') { %>
            <article class="panel panel-default">
                <section class="media-thumbnail">
                    <?php /*START_PHP_SIRFCIT*/ if ($item->extension != "swf" && $item->extension !="mp4" && $item->extension !="htm"){ ?>
                        <a href="<?php echo $item->path . "/" . $item->name . "." . $item->extension;?>" target="_blank">
                            <img src="<?php echo $item->path . "/" . $item->name . "." . $item->extension; ?>" alt="<?php echo $item->description; ?>" height="130" class="center-block" />
                        </a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->extension == "swf"){ ?>
                        <a href="<?php echo $item->path . "/" . $item->name . "." . $item->extension;?>" target="_blank">
                            <img src="<?php echo $item->path . "/" . $item->name . ".jpg" ?>" alt="<?php echo $item->description; ?>" height="130" />
                        </a> <br /><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->extension=="mp4"){ ?>
                        <a href="<?php echo $item->path . "/" . $item->name . "." . $item->extension;?>"
                            target="_blank">
                            <img src="<?php echo $item->path . "/" . $item->name . ".jpg" ?>" alt="<?php echo $item->description; ?>" height="130" />
                        </a> <br /><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->extension=="htm"){ ?>
                        <a href="<?php echo $item->path . "/index." . $item->extension; ?>" target="_blank">
                            <img src="<?php echo $item->path . "/" . $item->name . ".jpg" ?>" alt="<?php echo $item->description; ?>" height="130" />
                        </a><br />
                        <a href="<?php echo $item->path . "/index." . $item->extension; ?>" target="_blank">Regarder l'animation</a><?php } /*END_PHP_SIRFCIT*/ ?>
                </section>
                <section class="media-description">
                    <div class="media-description-text">
                        <p><strong>Description&nbsp;:</strong><br><?php echo $item->description; ?></p>
                    </div>
                        <p class="media-filename"><strong>Nom du fichier&nbsp;:</strong><br><?php echo $item->name ?>.<?php echo $item->extension; ?></p>
                        <p><strong>Source&nbsp;:</strong><br><?php echo $item->credits; ?></p>
                        <p><strong>Droits d'auteurs&nbsp;:</strong><br>
                            <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="COMET Standard Terms of Use"){ ?>
                                <a href="http://www.meted.ucar.edu/legal.htm" target="_blank">COMET Standard Terms of Use</a><?php } /*END_PHP_SIRFCIT*/ ?>
                            <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="COMET Standard Terms of Use - NCU"){ ?>
                                <a href="http://www.meted.ucar.edu/legal.htm" target="_blank">COMET Standard Terms of Use - NCU</a><?php } /*END_PHP_SIRFCIT*/ ?>
                            <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons BY 4.0 International"){ ?>
                                <a href="http://creativecommons.org/licenses/by/4.0/" target="_blank">Creative Commons BY 4.0 International</a><?php } /*END_PHP_SIRFCIT*/ ?>
                            <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution-ShareAlike 3.0 IGO"){ ?>
                                <a href="http://creativecommons.org/licenses/by-sa/3.0/igo/" target="_blank">Creative Commons Attribution-ShareAlike 3.0 IGO</a><?php } /*END_PHP_SIRFCIT*/ ?>
                            <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution-ShareAlike 3.0 Unported"){ ?>
                                <a href="http://creativecommons.org/licenses/by-sa/3.0/" target="_blank">Creative Commons Attribution-ShareAlike 3.0</a><?php } /*END_PHP_SIRFCIT*/ ?>
                            <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution-ShareAlike 2.5"){ ?>
                                <a href="http://creativecommons.org/licenses/by-sa/2.5/" target="_blank">Creative Commons Attribution-ShareAlike 2.5</a><?php } /*END_PHP_SIRFCIT*/ ?>
                            <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution-ShareAlike 2.0"){ ?>
                                <a href="http://creativecommons.org/licenses/by-sa/2.0/" target="_blank">Creative Commons Attribution-ShareAlike 2.0</a><?php } /*END_PHP_SIRFCIT*/ ?>
                            <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution-Noncommercial-Share Alike 2.0 Generic"){ ?>
                                <a href="http://creativecommons.org/licenses/by-nc-sa/2.0/" target="_blank">Creative Commons Attribution-Noncommercial-Share Alike 2.0 Generic</a><?php } /*END_PHP_SIRFCIT*/ ?>
                            <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution-Noncommercial 2.0 Generic"){ ?>
                                <a href="http://creativecommons.org/licenses/by-nc/2.0/" target="_blank">Creative Commons Attribution-Noncommercial 2.0 Generic</a><?php } /*END_PHP_SIRFCIT*/ ?>
                            <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution 2.0"){ ?>
                                    <a href="http://creativecommons.org/licenses/by/2.0/" target="_blank">Creative Commons Attribution 2.0</a><?php } /*END_PHP_SIRFCIT*/ ?>
                            <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution 2.0 Generic"){ ?>
                                    <a href="http://creativecommons.org/licenses/by/2.0/" target="_blank">Creative Commons Attribution 2.0 Generic</a>
                            <?php } /*END_PHP_SIRFCIT*/ ?>
                        </p>
                </section>
            </article>
        <% } else { %>
            <article class="panel panel-default">
                <section class="media-thumbnail">
                    <?php /*START_PHP_SIRFCIT*/ if ($item->extension != "swf" && $item->extension !="mp4" && $item->extension !="htm"){ ?>
                        <a href="<?php echo $item->path . "/" . $item->name . "." . $item->extension;?>" target="_blank">
                            <img src="<?php echo $item->path . "/" . $item->name . "." . $item->extension; ?>" alt="<?php echo $item->description; ?>" height="130" class="center-block" />
                        </a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->extension == "swf"){ ?>
                        <a href="<?php echo $item->path . "/" . $item->name . "." . $item->extension;?>" target="_blank">
                            <img src="<?php echo $item->path . "/" . $item->name . ".jpg" ?>" alt="<?php echo $item->description; ?>" height="130" />
                        </a><br /><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->extension=="mp4"){ ?>
                        <a href="<?php echo $item->path . "/" . $item->name . "." . $item->extension;?>" target="_blank">
                            <img src="<?php echo $item->path . "/" . $item->name . ".jpg" ?>" alt="<?php echo $item->description; ?>" height="130" />
                        </a> <br /><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->extension=="htm"){ ?>
                        <a href="<?php echo $item->path . "/index." . $item->extension; ?>" target="_blank">
                            <img src="<?php echo $item->path . "/" . $item->name . ".jpg" ?>" alt="<?php echo $item->description; ?>" height="130" /></a> <br />
                        <a href="<?php echo $item->path . "/index." . $item->extension; ?>" target="_blank">view loop</a><?php } /*END_PHP_SIRFCIT*/ ?>
                </section>
                <section class="media-description">
                    <div class="media-description-text">
                        <p><strong>Description:</strong><br><?php echo $item->description; ?></p>
                    </div>
                    <p class="media-filename"><strong>File Name:</strong><br><?php echo $item->name ?>.<?php echo $item->extension; ?></p>
                    <p><strong>Credits:</strong><br><?php echo $item->credits; ?></p>
                    <p><strong>Copyright Terms:</strong><br>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="COMET Standard Terms of Use"){ ?>
                        <a href="http://www.meted.ucar.edu/legal.htm" target="_blank">COMET Standard Terms of Use</a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="COMET Standard Terms of Use - NCU"){ ?>
                        <a href="http://www.meted.ucar.edu/legal.htm" target="_blank">COMET Standard Terms of Use - NCU</a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons BY 4.0 International"){ ?>
                        <a href="http://creativecommons.org/licenses/by/4.0/" target="_blank">Creative Commons BY 4.0 International</a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution-ShareAlike 3.0 IGO"){ ?>
                        <a href="http://creativecommons.org/licenses/by-sa/3.0/igo/" target="_blank">Creative Commons Attribution-ShareAlike 3.0 IGO</a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution-ShareAlike 3.0 Unported"){ ?>
                        <a href="http://creativecommons.org/licenses/by-sa/3.0/" target="_blank">Creative Commons Attribution-ShareAlike 3.0</a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution 3.0 Unported"){ ?>
                        <a href="http://creativecommons.org/licenses/by/3.0/" target="_blank">Creative Commons Attribution 3.0 Unported</a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution-ShareAlike 2.5"){ ?>
                        <a href="http://creativecommons.org/licenses/by-sa/2.5/" target="_blank">Creative Commons Attribution-ShareAlike 2.5</a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution-ShareAlike 2.0"){ ?>
                        <a href="http://creativecommons.org/licenses/by-sa/2.0/" target="_blank">Creative Commons Attribution-ShareAlike 2.0</a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution-Noncommercial-Share Alike 2.0 Generic"){ ?>
                        <a href="http://creativecommons.org/licenses/by-nc-sa/2.0/" target="_blank">Creative Commons Attribution-Noncommercial-Share Alike 2.0 Generic</a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Attribution-NonCommercial-NoDerivs 2.0 Generic"){ ?>
                        <a href="https://creativecommons.org/licenses/by-nc-nd/2.0/" target="_blank">Attribution-NonCommercial-NoDerivs 2.0 Generic</a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution-Noncommercial 2.0 Generic"){ ?>
                        <a href="http://creativecommons.org/licenses/by-nc/2.0/" target="_blank">Creative Commons Attribution-Noncommercial 2.0 Generic</a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution 2.0"){ ?>
                        <a href="http://creativecommons.org/licenses/by/2.0/" target="_blank">Creative Commons Attribution 2.0</a><?php } /*END_PHP_SIRFCIT*/ ?>
                    <?php /*START_PHP_SIRFCIT*/ if ($item->copyright_type =="Creative Commons Attribution 2.0 Generic"){ ?>
                        <a href="http://creativecommons.org/licenses/by/2.0/" target="_blank">Creative Commons Attribution 2.0 Generic</a><?php } /*END_PHP_SIRFCIT*/ ?>
                    </p>
                </section>
            </article>
        </div>
        <% } %>
        </div>
            <div>
                <!-- start table -->
                <!-- close column after each -->
                <!-- close row after 2 columns -->
                <?php } ?><!-- close row if ending on something other than 4 -->
            </div><!-- end maincontent -->

        </div>
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
    </main><!-- end master container -->


    <!-- Quiz and Survey prompt -->
    <div id="quiz-prompt"></div>
</body>
</html>