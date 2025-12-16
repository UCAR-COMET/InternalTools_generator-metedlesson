<?php
require_once( 'cometAPI.inc.php' );
$mm = new MediaItemManager();
?>
<!doctype html>
<html lang="en">
<head>
    <title><%= lessonTitle %></title>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <meta name="author" content="UCAR/COMET">
    <meta name="dcterms.rightsHolder" content="UCAR/COMET">
    <meta name="robots" content="all">
    <meta name="Description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="src/css/legacy_styles.css">
    <link rel="stylesheet" href="src/css/layout.css">
    <link rel="stylesheet" href="src/css/core.css">
    <!--<link rel="stylesheet" href="src/css/printable.css">-->
    <script src="src/js/jquery.min.js"></script>
    <script src="src/js/jquery-ui.min.js"></script>
    <script src="src/js/jquery-plugins.min.js"></script>
    <script src="src/js/defaults.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>

<body>
<nav class="sticky top-0 z-50 w-full h-16 border-b backdrop-filter backdrop-blur-xl bg-opacity-5 md:px-4 px-2">
    <div class="mx-auto flex h-full items-center justify-between p-1 sm:p-3 md:gap-2">
        <div class="flex items-center gap-5"><button
                class="items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 md:hidden flex"
                type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:Raqj6:"
                data-state="closed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-align-left">
                    <line x1="21" x2="3" y1="6" y2="6"></line>
                    <line x1="15" x2="3" y1="12" y2="12"></line>
                    <line x1="17" x2="3" y1="18" y2="18"></line>
                </svg></button>
            <div class="flex items-center gap-6">
                <div class="hidden md:flex"><a href="index.htm" class="text-md font-semibold"><%= lessonTitle %></a></div>
                <div class="hidden md:flex items-center gap-5 text-sm font-medium text-muted-foreground">
                    <!-- additional links -->
                </div>
            </div>
        </div>
        <div class="flex sm:ml-0 gap-2">
            <!-- print/download links removed from inner pages -->
                <p>Printable Version</p>
        </div>
    </div>
</nav>    
<main class="px-5 sm:px-8 h-auto">
    <div class="flex items-start gap-14">
        <!-- desktop toc sidebar -->
        <aside class="md:flex hidden flex-[1] min-w-[230px] sticky top-16 flex-col h-[94.5vh] overflow-y-auto">
            <div dir="ltr" class="relative overflow-hidden py-4" style="position: relative; --radix-scroll-area-corner-width: 0px; --radix-scroll-area-corner-height: 0px;">
                <div data-radix-scroll-area-viewport="" class="h-full w-full rounded-[inherit]" style="overflow: hidden scroll;">
                    <div style="min-width: 100%; display: table;">
                        <div class="flex flex-col gap-3.5 mt-5 pb-6">
                            <div class="mb-2">
                                <h2 class="text-sm font-bold mb-2">Table of Contents</h2>
                                <!-- TABLE OF CONTENTS: start -->
                                <nav id="tableofcontents">
                                <ul class="nav lc-docs-sidenav">
                                    <li><a href="#page_1-0-0">Page_1-0-0</a></li>
                                    <li><a href="#page_2-0-0">Page_2-0-0 Sample</a></li>
                                    <li><a href="#page_contributors">Contributors</a></li>
                                </ul>
                                </nav>
                                <!-- TABLE OF CONTENTS: end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- page content -->
        <div class="flex-1 md:flex-[6]">
            <div class="flex items-start gap-14">
                <div class="flex-[3] pt-10">
                    <!-- breadcrumbs here-->
                    <div class="typography">
                        
                        <!-- LESSON CONTENT: start -->
                        <section id="page_1-0-0" class="page">
                            <h3>Page 1-0-0 Title</h3>
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
                                <img class="img-responsive center-block" src="https://images.unsplash.com/photo-1737412358025-160a0c22e6c5?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="CAPTION_TEXT">
                                <img class="img-responsive center-block" src="https://images.unsplash.com/photo-1684262483735-1101bcb10f0d?q=80&w=1335&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    alt="CAPTION_TEXT">
                            </div>
        
                            <h4>Questions</h4>
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
                                                    <label for="q04a" class="sr-only">selectable options:</label>
                                                    <select id="q04a" name="q04a">
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
                                                    <label for="dropdown_q04b" class="sr-only">selectable options:</label>
                                                    <select name="q04b" id="dropdown_q04b">
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
        
                            <div id="car-0000" class="carousel slide" data-ride="carousel" data-wrap="false"
                                data-interval="false">
                                <!-- Indicators -->
                                <ol class="carousel-indicators print_hide">
                                    <li data-target="#car-0000" data-slide-to="0" class="active"></li>
                                    <li data-target="#car-0000" data-slide-to="1"></li>
                                    <li data-target="#car-0000" data-slide-to="2"></li>
                                </ol>
        
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        
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
                            <h3>Contributors</h3>
                            ...
                        </section>
                       
                        <!-- LESSON CONTENT: end -->

                    </div>
                </div>
                <div class="hidden xl:flex xl:flex-col sticky top-16 gap-3 py-8 min-w-[230px] h-[94.5vh] toc">
                    <button class="flex items-center ml-2 transition opacity-0 mt-6 self-start text-sm text-neutral-800 dark:text-neutral-300/85"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="inline-block w-4 h-4 mr-1 align-middle" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="m5 12 7-7 7 7"></path>
                            <path d="M12 19V5"></path>
                        </svg><span>Scroll to top</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="w-full h-16 border-t">
    <div
        class="flex flex-wrap items-center justify-center sm:justify-between gap-4 sm:gap-0 w-full h-full px-2 sm:py-0 py-3 sm:px-4 lg:px-8 text-sm text-muted-foreground">
        <p class="text-center">© <%= copyrightYear %>, <a class="font-semibold"
                href="https://www.meted.ucar.edu/">COMET MetEd</a> - All Rights Reserved.</p>
        <div class="text-center hidden md:block"></div>
    </div>
</footer>
</body>
</html>