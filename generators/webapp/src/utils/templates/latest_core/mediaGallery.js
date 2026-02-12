export default `<!doctype html>
<?php 
require_once('cometAPI.inc.php'); 
    $mm = new MediaItemManager();
    $items = $mm->getMediaGalleryUTF8({{moduleId}});
    $moduleManager = new ModuleManager();
    $module = $moduleManager->getModule({{moduleId}});
?>
<html lang="{{lang}}">
<head>
    <meta charset="UTF-8">
    <title>{{moduleTitle}}</title>
    <meta name="copyright" content="UCAR/COMET">
    <meta name="robots" content="all">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/meted-base.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/module-absorb.css">
    <script src="jquery/jquery.min.js"></script>
    <script src="jquery/jquery-ui.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="jquery/apps/fancybox/fancybox.min.css">
    <script src="jquery/apps/fancybox/fancybox.min.js"></script>
    <link rel="stylesheet" type="text/css" media="print" href="css/module-print.css">
    <script src="jquery/defaults.js"></script>
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
				
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.htm">Home</a></li>
					<li><a href="navmenu.php">Lesson</a></li>
					<li class="active"><a href="media_gallery.php">Gallery</a></li>
				</ul>
				
			</div>
		</div>
	</nav>

	<main id="master-container" class="container">
		<div class="row">
        <div id="lesson-content" class="col-sm-12">
            <h2 id="lesson-sidebar-title" class="module-title-text">{{moduleTitle}}</h2>
            <!--  Table of Contents -->
            <div id="menu" class="sidebar-toc">
                <h4 id="lesson-sidebar-unit-title">Media Gallery</h4>
            </div>

		<hr>
				
		<p>Media elements used in this module are protected by a variety of copyright licenses. Please use the "copyright terms" link associated with each item below for more information.</p>
				
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
                <p id="lesson-copyright">&copy; {{currentYear}}, <a href="https://www.ucar.edu/" target="_blank">The University Corporation for Atmospheric Research</a> - All Rights Reserved.</p>
            </div>
            <div class="col-md-4">
            
                <ul id="parent-links">
                    <li><a href="https://www.meted.ucar.edu/legal" target="_blank">Legal Notices</a></li>
                    <li><a href="https://www.comet.ucar.edu/" target="_blank">COMET</a></li>
                    <li><a href="https://www.meted.ucar.edu/" target="_blank">MetEd</a></li>
                </ul>
            
            </div>
        </footer>
    </main><!-- end master container -->


    <!-- Quiz and Survey prompt -->
    <div id="quiz-prompt"></div>
</body>
</html>`;