<?php
require_once( 'cometAPI.inc.php' );
$mm = new MediaItemManager();
?>
<!doctype html>
<html lang="en">
<head>
    <title>Sample Chapter 1</title>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <meta name="author" content="UCAR/COMET">
    <meta name="dcterms.rightsHolder" content="UCAR/COMET">
    <meta name="robots" content="all">
    <meta name="Description" content=" Build your skills using GeoColor red-green-blue (RGB) product imagery to identify atmospheric and surface features in land and ocean/lake settings. GeoColor product imagery provides several benefits, offering forecasters or others a fast, qualitative view of what&#39;s happening in an area. Some users of satellite imagery might be under-utilizing this quick look view or might not be aware of when it can be most useful. This lesson explores examples of the uses and benefits as well as limitations of GeoColor imagery, and includes a short overview of aerosol scattering by sunlight and the impact of Sun-satellite geometry from GOES-West and GOES-East perspectives. ">
    <meta name="keywords" content="GOES, GOES-R, geostationary satellite, GeoColor, RGB, red-green-blue, composite, atmosphere, surface, cloud, convective system, convection, smoke, dust, meteorology, meteorological, volcano, eruption, vog, vegetation, bare ground, water, fog, daytime, nighttime, imagery  ">
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
                <h1 id="module-title" class="module-title-text "></h1>
                <h3 id="module-credit" class="hidden-sm hidden-xs">
                    Produced by The COMET&reg; Program
                </h3>
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
                    <h3>Sample Page 1-0-0</h3>
                    <p>Cat ipsum dolor sit amet, check cat door for ambush 10 times before coming in. More napping, more
                        napping all the napping is exhausting hide from vacuum cleaner but fight own tail or man running
                        from cops stops to pet cats, goes to jail. Poop on grasses your pillow is now my pet bed x i
                        hate cucumber pls dont throw it at me. Paw at your fat belly morning beauty routine of licking
                        self sun bathe, and somehow manage to catch a bird but have no idea what to do next, so play
                        with it until it dies of shock meowing non stop for food and lick the other cats, no, you can't
                        close the door, i haven't decided whether or not i wanna go out. Mark territory purr yet you are
                        a captive audience while sitting on the toilet, pet me.</p>
                    <?php echo $mm->getPrintMediaItemWrapper(84180); ?>

                    <h4>Collapsible Panel</h4>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse000-1">Collapsible Panel Heading<span
                                        class="glyphicon glyphicon-plus-sign pull-right"></span></a>
                            </h4>
                        </div>
                        <div id="collapse000-1" class="panel-collapse collapse">
                            <div class="panel-body">
                                Content here...
                            </div>
                        </div>
                    </div>

                    <h4>Tabs</h4>

                    <div class="tabs-container">
                        <ul id="tab-set-0001" class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#tab0001-1" data-toggle="tab" class="tab-switch">Tab 1</a></li>
                            <li><a href="#tab0001-2" data-toggle="tab" class="tab-switch">Tab 2</a></li>
                            <li><a href="#tab0001-3" data-toggle="tab" class="tab-switch">Tab 3</a></li>
                            <li><a href="#tab0001-4" data-toggle="tab" class="tab-switch">Tab 4</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab0001-1">
                                <h3>TAB1TITLE</h3>
                                Tab 1 Content here...
                                <p>You should make sure the sensor is clean by checking the specific conductance
                                    measurement in air. You can view live sonde readings either on the handheld device
                                    or the computer. Let’s use the computer so I can show you the Kor Software - the
                                    platform used by hydrologic technicians to manage EXO2 sonde calibrations and water
                                    quality data. The software will allow you to see the measurements from the sensor in
                                    real-time.</p>
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane fade" id="tab0001-2">
                                <h3>TAB2TITLE</h3>
                                Tab 2 Content here...
                                <p>After completing the 5-point check for the conductivity/temperature sensor and
                                    ensuring it is measuring temperature properly, you are going to do a calibration
                                    check on the conductivity/temperature sensor and calibrate the sensor, if needed, to
                                    get it ready for taking specific conductance measurements in the Grand River.</p>
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane fade" id="tab0001-3">
                                <h3>TAB3TITLE</h3>
                                Tab 3 Content here...
                                <p>To perform a calibration check on the conductivity/temperature sensor, you will need
                                    two standards that bracket the expected specific conductance of your sample valid
                                    for the day of your field visit. One of the two standards will be used for the
                                    one-point calibration on the sensor. You can roughly determine the expected specific
                                    conductance of your sample by looking at the recorded gage data for a particular
                                    field site. Take a look at the range in the recorded gage data above for the Grand
                                    River over the past month. Based on the observations, which two standards should you
                                    use for the calibration check? Choose the best answers.</p>
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane fade" id="tab0001-4">
                                <h3>TAB4TITLE</h3>
                                Tab 4 Content here...
                                <p>Check the details on the label of your chosen standards to make sure you are using
                                    fresh standards. Can you proceed with using these standards for your calibration
                                    check? Choose the best answer.</p>
                            </div>
                            <!-- end tab pane -->
                        </div>
                    </div>

                    <h4>Image Sweep</h4>

                    <div class="image-sweep center-block" style="max-width:700px;">
                        <img class="img-responsive center-block" src="media/graphics/sample27.jpg" alt="CAPTION_TEXT">
                        <img class="img-responsive center-block" src="media/graphics/sample27_feedback.jpg"
                            alt="CAPTION_TEXT">
                    </div>
                </section>
                <section id="page_2-0-0" class="page">
                    <h3>Sample Page 2-0-0</h3>
                    <p>A spirited Cairn Terrier prances but then snickersnacks. A lively Bichon Frise sashays in the
                        gentle breeze. In a quiet village, a Bichon Frise spins every morning. The Pekingese scampers
                        nonetheless then it scurries. The Pekingese leaps nor whispered secrets.</p>
                    <?php echo $mm->getPrintMediaItemWrapper(55391); ?>

                </section>
                <section id="page_2-1-0" class="page">
                    <h3 class="sub_head"><small>Sample Page 2-0-0 » </small>Sample Child Page 2-1-0</h3>
                    <div class="panel panel-default interaction-question">
                        <div class="panel-body">
                            <div class="question-wrap radio">
                                <h4>Question</h4>
                                <p>INSERT QUESTION TEXT HERE</p>
                                <form action="#">
                                    <fieldset>
                                        <div class="response-group-item"><input id="q01a" name="q01" value="a"
                                                type="radio"><label for="q01a"> <strong>a) </strong>Option 1
                                                Incorrect</label>
                                        </div>
                                        <div class="response-group-item correct"><input id="q01b" name="q01" value="b"
                                                type="radio"><label for="q01b"> <strong>b) </strong>Option 2
                                                Correct</label>
                                        </div>
                                        <div class="response-group-item"><input id="q01c" name="q01" value="c"
                                                type="radio"><label for="q01c"> <strong>c) </strong>Option 3
                                                Incorrect</label>
                                        </div>
                                        <div class="response-group-item"><input id="q01d" name="q01" value="d"
                                                type="radio"><label for="q01d"> <strong>d) </strong>Option 4
                                                Incorrect</label>
                                        </div>
                                        <input class="submit-button btn btn-primary" name="submit-button" value="Done"
                                            type="button">
                                    </fieldset>
                                </form>
                                <div class="answer">
                                    <p class="response">The correct answer is b.</p>
                                    <p class="explanation">INSERT YOUR FEEDBACK HERE.</p>
                                </div>
                                <div class="message">Please make a selection.</div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default interaction-question">
                        <div class="panel-body">
                            <div class="question-wrap checkboxes">
                                <h4>Question</h4>
                                <p>INSERT QUESTION TEXT HERE</p>
                                <form action="#">
                                    <fieldset>
                                        <div class="response-group-item correct"><input id="q02a" name="q02" value="a"
                                                type="checkbox"><label for="q02a"> <strong>a) </strong>Option 1
                                                Correct</label></div>
                                        <div class="response-group-item correct"><input id="q02b" name="q02" value="b"
                                                type="checkbox"><label for="q02b"> <strong>b) </strong>Option 2
                                                Correct</label></div>
                                        <div class="response-group-item"><input id="q02c" name="q02" value="c"
                                                type="checkbox"><label for="q02c"> <strong>c) </strong>Option 3
                                                Incorrect</label></div>
                                        <div class="response-group-item"><input id="q02d" name="q02" value="d"
                                                type="checkbox"><label for="q02d"> <strong>d) </strong>Option 4
                                                Incorrect</label></div>
                                        <input class="submit-button btn btn-primary" name="submit-button" value="Done"
                                            type="button">
                                    </fieldset>
                                </form>
                                <div class="answer">
                                    <p class="response">The correct answers are a and b.</p>
                                    <p class="explanation">INSERT YOUR FEEDBACK HERE.</p>
                                </div>
                                <div class="message">Please make a selection.</div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default interaction-question">
                        <div class="panel-body">
                            <div class="question-wrap textentry">
                                <h4>Question</h4>
                                <p class="question">INSERT QUESTION TEXT HERE</p>
                                <form action="#">
                                    <fieldset>
                                        <textarea class="textbox" name="textarea01" cols="60" rows="5"
                                            id="textarea01"></textarea>
                                        <br>
                                        <input class="submit-button btn btn-primary" name="submit-button" value="Done"
                                            type="button">
                                    </fieldset>
                                </form>
                                <div class="answer">
                                    <p class="explanation">INSERT YOUR FEEDBACK HERE.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default interaction-question">
                        <div class="panel-body">
                            <div class="question-wrap inlinedropdowns">
                                <h4>Question</h4>
                                <p class="question">INSERT QUESTION TEXT HERE</p>
                                <form action="#">
                                    <fieldset>
                                        <div class="response-group-item"> <strong>a) </strong>MAKE AN ORDERED OR
                                            UNORDERED LIST HERE LEAVING 5 UNDERSCORES
                                            <select name="q04a">
                                                <option>--</option>
                                                <option>answer option1</option>
                                                <option>answer option2 correct</option>
                                                <option>answer option3</option>
                                            </select> FOLLOWED BY A PARENTHETICAL LIST OF ANSWER OPTIONS HIGHLIGHTING
                                            THE CORRECT ANSWER IN BOLD.
                                        </div>
                                        <div class="correct response-group-item dropdown_correct answer">answer option2
                                            correct</div>
                                        <div class="response-group-item"><strong> b) </strong>MAKE AN ORDERED OR
                                            UNORDERED LIST HERE LEAVING 5 UNDERSCORES
                                            <select name="q04b">
                                                <option>--</option>
                                                <option>answer option1</option>
                                                <option> answer option2</option>
                                                <option> answer option3 correct</option>
                                            </select> FOLLOWED BY A PARENTHETICAL LIST OF ANSWER OPTIONS HIGHLIGHTING
                                            THE CORRECT ANSWER IN BOLD.
                                        </div>
                                        <div class="correct response-group-item dropdown_correct answer">answer option3
                                            correct</div>
                                        <input class="submit-button btn btn-primary" name="submit-button" value="Done"
                                            type="button">
                                    </fieldset>
                                </form>
                                <div class="answer">
                                    <p class="explanation">Feedback here.</p>
                                </div>
                                <div class="message">Please make a selection.</div>
                            </div>
                        </div>
                    </div>

                    <div class="drawing-question panel-body" data-image="sample27.jpg" data-colors="red, green, black"
                        data-labels="Red, Green, Black">
                        <h4>Question</h4>
                        <p>INSERT QUESTION TEXT HERE</p>
                    </div>

                    <div class="panel panel-default interaction-question">
                        <div class="panel-body">
                            <div class="question-wrap-drag">
                                <h4>Exercise</h4>
                                <p>QUESTION_TEXT</p>
                                <div class="drag-container" title="media/graphics/sample27.jpg">
                                    <div class="image_holder"></div>
                                    <p class="drag_directions"></p>
                                    <div class="drag_controls_holder">
                                        <div class="drag_controls">
                                            <div
                                                class="draggable ui-widget-content ui-draggable drag_item ui-draggable-handle">
                                                <span class="glyphicon glyphicon-th"></span>DRAGGABLE_1
                                            </div>
                                            <div
                                                class="draggable ui-widget-content ui-draggable drag_item ui-draggable-handle">
                                                <span class="glyphicon glyphicon-th"></span>DRAGGABLE_2
                                            </div>
                                            <div
                                                class="draggable ui-widget-content ui-draggable drag_item ui-draggable-handle">
                                                <span class="glyphicon glyphicon-th"></span>DRAGGABLE_3
                                            </div>
                                            <div
                                                class="draggable ui-widget-content ui-draggable drag_item ui-draggable-handle">
                                                <span class="glyphicon glyphicon-th"></span>DRAGGABLE_4
                                            </div>
                                        </div>
                                        <input class="done_drag btn btn-primary" value="Done" type="button">
                                        <input class="reset_drag btn btn-default" value="Reset" type="button">
                                    </div>
                                </div>
                                <div class="answer">
                                    <p>FEEDBACK_TEXT</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default interaction-question">
                        <div class="panel-body">
                            <div class="question-wrap reordering">
                                <h4>Question</h4>
                                <p>INSERT QUESTION TEXT HERE</p>
                                <form action="#">
                                    <fieldset>
                                        <div class="response-group-item">
                                            <ol class="sortable sortIt ui-sortable" start="1">
                                                <li class="ui-state-default ui-sortable-handle"><span
                                                        class="glyphicon glyphicon-th"></span> INSERT ORDERED LIST ITEMS
                                                    HERE FOR REORDERING.<span class="glyphicon glyphicon-sort"></span>
                                                </li>
                                                <li class="ui-state-default ui-sortable-handle"><span
                                                        class="glyphicon glyphicon-th"></span> INSERT ORDERED LIST ITEMS
                                                    HERE FOR REORDERING.<span class="glyphicon glyphicon-sort"></span>
                                                </li>
                                                <li class="ui-state-default ui-sortable-handle"><span
                                                        class="glyphicon glyphicon-th"></span> INSERT ORDERED LIST ITEMS
                                                    HERE FOR REORDERING.<span class="glyphicon glyphicon-sort"></span>
                                                </li>
                                            </ol>
                                        </div>
                                        <input class="submit-button btn btn-primary" name="submit-button" value="Done"
                                            type="button">
                                    </fieldset>
                                </form>
                                <div class="answer response-group-item correct">
                                    <p class="explanation">INSER YOUR FEEDBACK HERE.</p>
                                </div>
                                <div class="message">Please make a selection.</div>
                            </div>
                        </div>
                    </div>

                </section>
                <section id="page_2-1-1" class="page">
                    <h3 class="sub_head"><small>Sample Page 2-0-0 » Sample Child Page 2-1-0 » </small> Sample Child Page
                        2-1-1</h3>
                    <div id="car-0000" class="carousel slide" data-ride="carousel" data-wrap="false"
                        data-interval="false">
                        <!-- Indicators -->
                        <ol class="carousel-indicators print_hide">
                            <li data-target="#car-0000" data-slide-to="0" class="active"></li>
                            <li data-target="#car-0000" data-slide-to="1"></li>
                            <li data-target="#car-0000" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                PANE_CONTENT
                                <div id="q32003" class="panel panel-default interaction-question">
                                    <div class="panel-body">
                                        <div class="question-wrap radio">
                                            <h4>Question</h4>
                                            <p> INSERT QUESTION TEXT HERE</p>
                                            <form action="#">
                                                <fieldset>
                                                    <div class="response-group-item correct"><input id="o32003-0"
                                                            type="radio" name="q32003"><label for="o32003-0"> <strong>a)
                                                            </strong>MAKE LIST HERE HIGHLIGHTING THE CORRECT ANSWER IN
                                                            BOLD</label></div>
                                                    <div class="response-group-item "><input id="o32003-1" type="radio"
                                                            name="q32003"><label for="o32003-1"> <strong>b)
                                                            </strong>MAKE LIST HERE HIGHLIGHTING THE CORRECT ANSWER IN
                                                            BOLD</label></div><input
                                                        class="submit-button btn btn-primary" name="submit-button"
                                                        type="button" value="Done">
                                                </fieldset>
                                            </form>
                                            <div class="answer">
                                                <p class="response">The correct answer is b.</p>
                                                <p> INSERT YOUR FEEDBACK HERE</p>
                                            </div>
                                            <div class="message">Please make a selection.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                PANE_CONTENT
                                <div id="q32004" class="panel panel-default interaction-question">
                                    <div class="panel-body">
                                        <div class="question-wrap inlinedropdowns">
                                            <h4>Question</h4>
                                            <form action="#">
                                                <fieldset>
                                                    <div class="response-group-item">
                                                        <div><strong>a) </strong> LIST WITH <select name="q32004-00">
                                                                <option>--</option>
                                                                <option>LIST WITH CORRECT ANSWER IN BOLD</option>
                                                                <option>LIST WITH CORRECT ANSWER IN BOLD</option>
                                                            </select> WHERE THE DROPDOWN <select name="q32004-01">
                                                                <option>--</option>
                                                                <option>LIST WITH CORRECT ANSWER IN BOLD</option>
                                                                <option>LIST WITH CORRECT ANSWER IN BOLD</option>
                                                            </select> SHOULD GO </div>
                                                    </div>
                                                    <div class="response-group-item correct dropdown_correct answer">
                                                        <p>LIST WITH CORRECT ANSWER IN BOLD, LIST WITH CORRECT ANSWER IN
                                                            BOLD</p>
                                                    </div><input class="submit-button btn btn-primary"
                                                        name="submit-button" type="button" value="Done">
                                                </fieldset>
                                            </form>
                                            <div class="answer">
                                                <p> INSERT YOUR FEEDBACK HERE</p>
                                            </div>
                                            <div class="message">Please make a selection.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                PANE_CONTENT
                                <div id="q32005" class="panel panel-default interaction-question">
                                    <div class="panel-body">
                                        <div class="question-wrap textentry">
                                            <h4>Question</h4>
                                            <p> INSERT QUESTION TEXT HERE</p>
                                            <form action="#">
                                                <fieldset><textarea id="q32005" class="textbox" name="q32005" cols="60"
                                                        rows="4"></textarea><br><input
                                                        class="submit-button btn btn-primary" name="submit-button"
                                                        type="button" value="Done"></fieldset>
                                            </form>
                                            <div class="answer">
                                                <p> INSERT YOUR FEEDBACK HERE</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <div class="print_hide">
                            <a class="left carousel-control" href="#car-0000" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#car-0000" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </section>
                <section id="page_contributors" class="page">
                    <h3 class="sub_head">Contributors</h3>
                    <div id="comet-sponsors">
                        <h4 id="sponsors">COMET Sponsors</h4>
                        <p>MetEd and the COMET® Program are a part of the <a
                                href="https://www.ucar.edu/community-programs">University Corporation for Atmospheric
                                Research's (UCAR's) Community Programs (UCP)</a> and are sponsored by</p>
                        <ul>
                            <li><a href="https://www.weather.gov/about/" target="_blank" rel="noreferrer">NOAA's
                                    National Weather Service (NWS)</a><br>with additional funding by:</li>
                            <li><a href="http://www.aihec.org/" target="_blank" rel="noopener noreferrer">American
                                    Indian Higher Education Consortium (AIHEC)</a></li>
                            <li><a href="https://www.eumetsat.int/" target="_blank" rel="noreferrer">European
                                    Organisation for the Exploitation of Meteorological Satellites (EUMETSAT)</a></li>
                            <li><a href="http://weather.gc.ca/" target="_blank" rel="noreferrer">Meteorological Service
                                    of Canada (MSC)</a></li>
                            <li><a href="http://www.nesdis.noaa.gov/" target="_blank" rel="noreferrer">NOAA's National
                                    Environmental Satellite, Data and Information Service (NESDIS)</a></li>
                            <li><a href="http://www.ngs.noaa.gov/" target="_blank" rel="noreferrer">NOAA's National
                                    Geodetic Survey (NGS)</a></li>
                            <li><a href="https://www.my.gov.sa/wps/portal/snp/agencies/agencyDetails/AC040"
                                    target="_blank" rel="noopener noreferrer">National Center for Meteorology (NCM) of
                                    Saudi Arabia</a></li>
                            <li><a href="http://www.nsf.gov" target="_blank" rel="noreferrer">National Science
                                    Foundation (NSF)</a></li>
                            <li><a href="https://www.usaid.gov/" target="_blank" rel="noopener noreferrer">US Agency for
                                    International Development (USAID)</a></li>
                            <li><a href="https://www.usgs.gov/mission-areas/water-resources" target="_blank"
                                    rel="noopener noreferrer">US Geological Survey (USGS) Water Resources Mission
                                    Area</a></li>
                            <li><a href="https://www.worldbank.org/en/home" target="_blank"
                                    rel="noopener noreferrer">World Bank (WB)</a></li>
                            <li><a href="https://public.wmo.int/en" target="_blank" rel="noreferrer">World
                                    Meteorological Organization (WMO)</a></li>
                        </ul>
                        <p>To learn more about us, please visit the <a href="http://www.comet.ucar.edu">COMET
                                website</a>.</p>
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
                        <h5>Audio/Video Editing/Production</h5>
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                    <div id="comet-staff">
                        <h4>COMET Staff, MONTH YEAR</h4>
                    </div>
                </section>
            </div>
            <!-- END MODULE CONTENT ==============================-->
        </div>

    <!-- MODULE FOOTER ==================================-->
    <footer id="module-footer" class="row">
        <div class="col-md-10 col-sm-12">
        
            <p class="footer-text">&copy; 2025, <a href="https://www.ucar.edu/" target="_blank">The University Corporation for Atmospheric Research</a><br>All Rights Reserved. <a href="https://meted.ucar.edu/legal" target="_blank">Legal notices</a></p>
        
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
        <a href="#top"><span class="glyphicon glyphicon-upload"></span>Back to Top</a>
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