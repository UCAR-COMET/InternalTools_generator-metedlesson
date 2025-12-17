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
    <!-- lc2024: module-print.css, defaults.js -->
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
                <a id="module-title" class="module-title-text <% if (templateType === 'multi-print') { %>chapter_title<% } %>"
                    href="index.htm"><% if (templateType === 'multi-print') { %>UNIT TITLE HERE<% } %></a>
                <h3 id="module-credit" class="hidden-sm hidden-xs">
                    <% if (lessonLang === 'ES') { %>Producido por The COMET® Program
                    <% } else if (lessonLang === 'FR') { %>Produit par le programme COMET®
                    <% } else { %>Produced by The COMET&reg; Program<% } %>
                </h3>
            </header>
        </div>

        <div class="row">
            <!-- TABLE OF CONTENTS ==================================-->
            <nav id="tableofcontents" class="sidebar-toc">
                <ul class="nav lc-docs-sidenav">
                    <li><a href="#page_1-0-0">Page_sample_1</a></li>
                    <li><a href="#page_contributors">Contributors</a></li>
                </ul>
            </nav>

            <!-- MODULE CONTENT ==================================-->
            <div id="module-content" class="col-md-9">
                <div class="row unit-header"></div>
                <section id="page_1-0-0" class="page">
                    <h3 class="sub_head">Page_sample_1</h3>
                    ...
                    <div class="storyline-opener">
                        <p>Click the "Launch Interaction" button to get started.</p>
                        <div class="center">
                            <a class="btn btn-primary" href="storyline/story.html" target="_blank">Launch Interaction</a>
                        </div>
                    </div>
                </section>
                <section id="page_contributors" class="page">
                    <h3>Contributors</h3>
                    <div id="comet-sponsors">
                        <h4 id="sponsors">COMET Sponsors</h4>
                        <p>MetEd and the COMET® Program are a part of the <a href="https://www.ucar.edu/community-programs">University
                                Corporation for Atmospheric Research's (UCAR's) Community Programs (UCP)</a> and are sponsored by</p>
                        <ul>
                            <li><a href="https://www.weather.gov/about/" target="_blank" rel="noreferrer">NOAA's National Weather Service
                                    (NWS)</a><br>with additional funding by:</li>
                            <li><a href="http://www.aihec.org/" target="_blank" rel="noopener noreferrer">American Indian Higher Education
                                    Consortium (AIHEC)</a></li>
                            <li><a href="https://www.eumetsat.int/" target="_blank" rel="noreferrer">European Organisation for the
                                    Exploitation of Meteorological Satellites (EUMETSAT)</a></li>
                            <li><a href="http://weather.gc.ca/" target="_blank" rel="noreferrer">Meteorological Service of Canada (MSC)</a>
                            </li>
                            <li><a href="http://www.nesdis.noaa.gov/" target="_blank" rel="noreferrer">NOAA's National Environmental
                                    Satellite, Data and Information Service (NESDIS)</a></li>
                            <li><a href="http://www.ngs.noaa.gov/" target="_blank" rel="noreferrer">NOAA's National Geodetic Survey
                                    (NGS)</a></li>
                            <li><a href="https://www.my.gov.sa/wps/portal/snp/agencies/agencyDetails/AC040" target="_blank"
                                    rel="noopener noreferrer">National Center for Meteorology (NCM) of Saudi Arabia</a></li>
                            <li><a href="http://www.nsf.gov" target="_blank" rel="noreferrer">National Science Foundation (NSF)</a></li>
                            <li><a href="https://www.usaid.gov/" target="_blank" rel="noopener noreferrer">US Agency for International
                                    Development (USAID)</a></li>
                            <li><a href="https://www.usgs.gov/mission-areas/water-resources" target="_blank" rel="noopener noreferrer">US
                                    Geological Survey (USGS) Water Resources Mission Area</a></li>
                            <li><a href="https://www.worldbank.org/en/home" target="_blank" rel="noopener noreferrer">World Bank (WB)</a>
                            </li>
                            <li><a href="https://public.wmo.int/en" target="_blank" rel="noreferrer">World Meteorological Organization
                                    (WMO)</a></li>
                        </ul>
                        <p>To learn more about us, please visit the <a href="http://www.comet.ucar.edu">COMET website</a>.</p>
                        <h4 id="contributors">Project Contributors</h4>
                        <h5>Project Lead</h5>
                        <ul>
                            <li></li>
                        </ul>
                        <h5>Instructional Design</h5>
                        <ul>
                            <li></li>
                        </ul>
                        <h5>Science Advisors</h5>
                        <ul>
                            <li></li>
                        </ul>
                        <h5>Program Oversight</h5>
                        <ul>
                            <li></li>
                        </ul>
                        <h5>Graphics/Animations</h5>
                        <ul>
                            <li></li>
                        </ul>
                        <h5>Multimedia Authoring/Interface Design</h5>
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                    <div id="comet-staff">
                        <h4>COMET Staff, [MONTH] 2025</h4>
                        <h5>Director's Office</h5>
                        <ul>
                            <li>Dr. Elizabeth Mulvihill, Director</li>
                            <li>Dr. Wendy Gram, Deputy Director</li>
                            <li>Dr. Paul Kucera, Assistant Director International Programs</li>
                        </ul>
                        <h5>Business Administration</h5>
                        <ul>
                            <li>Lorrie Alberta, Administrator</li>
                            <li>Alayne Benson, Communications Specialist</li>
                            <li>Katie Chapman, Administrator</li>
                            <li>Tara Torres, Program Coordinator</li>
                        </ul>
                        <h5>IT Services</h5>
                        <ul>
                            <li>Bob Bubon, Systems Administrator</li>
                            <li>Meghan Neuhaus, Technical Project Manager</li>
                            <li>Joey Rener, Software Engineer</li>
                            <li>Malte Winkler, Software Engineer</li>
                        </ul>
                        <h5>Instructional Services</h5>
                        <ul>
                            <li>Abby Dowd, Instructional Designer</li>
                            <li>Keliann LaConte, Instructional Designer</li>
                            <li>Lon Goldstein, Instructional Designer</li>
                            <li>Laurel Ozersky, Instructional Designer</li>
                            <li>Sarah Ross-Lazarov, Instructional Designer</li>
                            <li>Tsvetomir Ross-Lazarov, Instructional Designer</li>
                        </ul>
                        <h5>International Programs</h5>
                        <ul>
                            <li>Kwabena Denkyi (Kwa), Project Manager</li>
                            <li>William Nicewonger, Instrument Engineer</li>
                            <li>Kathryn Payne, Project Manager</li>
                            <li>David Russi, Translations Coordinator</li>
                            <li>Martin Steinson, Project Manager</li>
                        </ul>
                        <h5>Production and Media Services</h5>
                        <ul>
                            <li>Steve Deyo, Graphic and 3D Designer</li>
                            <li>Corbin Jackson, Translator / Multimedia Specialist</li>
                            <li>Dolores Kiessling, Software Engineer</li>
                            <li>Gary Pacheco, Web Designer and Developer</li>
                            <li>Tyler Winstead, Web Developer</li>
                        </ul>
                        <h5>Science Group</h5>
                        <ul>
                            <li>Patrick Dills, Meteorologist</li>
                            <li>Bryan Guarente, Instructional Designer/Meteorologist</li>
                            <li>Adam Hirsch, Meteorologist</li>
                            <li>Erin Houlihan, Hydrologist</li>
                            <li>Dr. James Russell, Meteorologist</li>
                            <li>Lee-ann Simpson, Meteorologist</li>
                            <li>Andrea Smith, Meteorologist</li>
                            <li>Brianna Smith, Meteorologist</li>
                            <li>Amy Stevermer, Scientist/Instructional Designer </li>
                            <li>Vanessa Vincente, Meteorologist</li>
                            <li>Rebecca Zieber, Oceanographer/Hydrologist</li>
                        </ul>
                        <h5>NOAA/National Weather Service - Forecast Decision Training Division</h5>
                        <ul>
                            <li>Kevin Scharfenberg, Division Chief</li>
                            <li>Jason Jordan, Physical Scientist</li>
                            <li>Dr. Robert Rozumalski, Physical Scientist</li>
                            <li>Ross Van Til, Meteorologist</li>
                            <li>Shannon White, AWIPS Instructor</li>
                        </ul>
                    </div>
                </section>
            </div>
            <!-- END MODULE CONTENT ==============================-->
        </div>

    <!-- MODULE FOOTER ==================================-->
    <footer id="module-footer" class="row">
        <div class="col-md-10 col-sm-12">
        <% if (lessonLang === 'ES') { %>
            <p class="footer-text">&copy; <%= copyrightYear %>, <a href="https://www.ucar.edu/" target="_blank">The University Corporation for Atmospheric Research</a><br>Reservados todos los derechos. <a href="https://meted.ucar.edu/legal" target="_blank">Avisos legales</a></p>
        <% } else if (lessonLang === 'FR') { %>
            <p class="footer-text">&copy; <%= copyrightYear %>, <a href="https://www.ucar.edu/" target="_blank">The University Corporation for Atmospheric Research</a><br>Tous droits réservés. <a href="https://meted.ucar.edu/legal" target="_blank">Mentions juridiques</a></p>
        <% } else { %>
            <p class="footer-text">&copy; <%= copyrightYear %>, <a href="https://www.ucar.edu/" target="_blank">The University Corporation for Atmospheric Research</a><br>All Rights Reserved. <a href="https://meted.ucar.edu/legal" target="_blank">Legal notices</a></p>
        <% } %>
        </div>
        <div class="col-md-2 hidden-sm hidden-xs">
            <ul class="footer-links list-unstyled">
                <li><a href="https://www.meted.ucar.edu/" target="_blank"><span class="glyphicon glyphicon-link"></span>MetEd</a></li>
                <li><a href="https://comet.ucar.edu" target="_blank"><span class="glyphicon glyphicon-link"></span>COMET</a></li>
            </ul>
        </div>
    </footer>
    <!-- END MODULE FOOTER ==================================-->

    </main>
    <!-- END MODULE WRAPPER (container) ==================================-->

    <!-- BACK TO TOP BUTTON =========================== -->
    <p class="back-top">
        <a href="#top"><span class="glyphicon glyphicon-upload"></span><% if (lessonLang === 'ES') { %>Arriba<% } else if (lessonLang === 'FR') { %>Haut de la page<% } else { %>Back to Top<% } %></a>
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