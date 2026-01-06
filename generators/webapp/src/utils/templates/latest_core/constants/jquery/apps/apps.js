/* CONSOLIDATED APPS: drag-drop, drawing, image-comparison, image-magnifier */

// ================
// DRAG-DROP JQUERY
// ================
$(document).ready(function(){
    $(".drag-container").each(function(){
      var fileName = $(this).attr('title');
      var ext = fileName.slice(-4);
      var name = fileName.slice(0, -4);
      var feedback_filename = name + "_feedback" + ext;
      $(this).children('.image_holder').append('<img src="' +fileName+ '" class="img-responsive center-block" />');
      $(this).children('.image_holder').append('<img src="' +feedback_filename+ '" class="img-responsive center-block hidden" />');
    });
    
    $(".done_drag").removeAttr("disabled");
    
    $("input").click(function() {
        if ($(this).is(".done_drag")) {
            // Disable the DONE button
            $(this).closest(".question-wrap-drag").find(".answer").show();
            $(this).attr("disabled","disabled");
            $(this).siblings("input.clear").addClass("reset_drag").removeClass("clear").attr("value","Reset");
            
            // Create: Feedback Image again
            var fileName = $(this).parents(".drag-container").attr('title');
            var ext = fileName.slice(-4);
            var name = fileName.slice(0, -4);
            var feedback_filename = name + "_feedback" + ext;
            
            // Remove original image when Done
            $(this).parents('.drag_controls_holder').siblings('.image_holder').children('img').remove();
            $(this).parents('.drag_controls_holder').siblings('.image_holder').append('<img src="' +feedback_filename+ '" class="img-responsive center-block" />');
            
        // Reset Button
          } else if ($(this).is(".reset_drag")) {	
              $(this).closest(".question-wrap-drag").find(".answer").hide();	  
            $(this).siblings("input.done_drag").removeAttr("disabled");
      
            if ($(this).parents(".drag_controls_holder").siblings(".image_holder")) {
                $(this).parents(".drag_controls_holder").siblings(".image_holder").children(".draggable").remove();
            }
            // Create variable for the feedback image
            var fileName = $(this).parents(".drag-container").attr('title');
            // Remove feedback image on Reset
            $(this).parents('.drag_controls_holder').siblings('.image_holder').children('img').remove();
            // Restore original image on Reset
            $(this).parents('.drag_controls_holder').siblings('.image_holder').append('<img src="' +fileName+ '" class="img-responsive center-block" />');
            // Restore draggable items on Reset
            $(this).parents(".drag_controls_holder").children(".drag_controls").children(".draggable").each(function () {
                $(this).css({
                    "left":"0px",
                    "top":"0px"
                });
            });
          }
    });
   
    // draggable UI fx
    $(".draggable").each(function() {
        $(this).draggable({
          containment: $(this).parent().parent().parent(),
          scroll: false, // No-Scroll for touch screen devices while dragging.
          helper: "original",
          stack: ".drag_controls div"
        })
        if ($(this).hasClass("replenish")) {
            $(this).draggable({
              helper: "clone",
              stop: function ( event, ui ) {
                 if ($(this).hasClass("replenish")) {
                     $(ui.helper).clone().draggable({
                          containment: $(this).parent().parent().parent(),
                          scroll: false, // No-Scroll for touch screen devices while dragging.
                          stack: ".drag_controls div"
                     }).css({
                         left: ui.position.left,
                         top: ui.position.top
                     }).appendTo($(this).closest(".drag_controls_holder").siblings(".image_holder"));
                     $(ui.helper).remove();
                 }
              }
            });
        }
    });  
});



// ===================
// DRAWING TOOL JQUERY
// ===================
$(document).ready(function () {
	$('.drawing-question').each(function() {
	   // Default Parameters
       var drw3Image = $(this).data('image');
	   var drw3Path = 'media/graphics/';
	   var drw3BrushSize = '4, 6, 8';	   		
	   var drw3Colors = '#f00, blue';
	   var drw3Labels = '';
	   
	   // Check if parameters are present, else use default
	   if ( $(this).data('path') ) {
		   drw3Path = $(this).data('path');
	   } else {}
	
	   // Brush Colors
	   var allBrushColors = '';
	   var h;
	   if ( $(this).data('colors') )
	   {
		    drw3Colors = $(this).data('colors');
		   	var colorData = drw3Colors.split(', ');
		    for (h = 0; h < colorData.length; h++){
		   		allBrushColors += '<div class="drawtool-swatch" style="background-color:' + colorData[h] + ';"></div>';
		   }
	   } else {
		   	var defaultColors = drw3Colors.split(', ');
	        for (h = 0; h < defaultColors.length; h++){
		   		allBrushColors += '<div class="drawtool-swatch" style="background-color:' + defaultColors[h] + ';"></div>';
		   }
	   }
	   
	   // Brush Sizes
	   var allBrushSizes = drw3BrushSize;
	   var i;
	   if ( $(this).data('sizes') )
	   {
		   drw3BrushSize = $(this).data('sizes');
		   var sizeData = drw3BrushSize.split(', ');
		   for (i = 0; i < sizeData.length; i++){
		   		allBrushSizes += '<option value="' + sizeData[i] + '">' + sizeData[i] + '</option>';
		   }
		   
	   } else {
		   var defaultSizes = drw3BrushSize.split(', ');
		   for (i = 0; i < defaultSizes.length; i++){
		   		allBrushSizes += '<option value="' + defaultSizes[i] + '">' + defaultSizes[i] + '</option>';
		   }
	   }
	   $(this).find('option:first').attr('selected');
	   
	   
	   // Brush Labels
	   var labelsArray = [];	
	   var j;
	   if ( $(this).data('labels') )
	   {
		   drw3Labels = $(this).data('labels');
		   		var labelsData = drw3Labels.split(', ');
		   
		   for (j = 0; j < labelsData.length; j++){
			   labelsArray.push(labelsData[j]);		   
		   }
	   } else {}
	   	   
	   
	   // Construct HTML Object
	   $(this).addClass('question-wrap-draw panel panel-default');
	   $(this).append('<div class="drawing-container center-block" title="' + drw3Path + drw3Image + '" ></div>');
			$(this).children('.drawing-container').append('<div class="canvas-wrap"></div>');
			$(this).children('.drawing-container').children('.canvas-wrap').append('<canvas class="drawing-canvas center-block" ></canvas>');
			$(this).children('.drawing-container').append('<div class="drawtool-controls row"></div>');
			$(this).children('.drawing-container').children('.drawtool-controls').append('<div class="drawtool-buttons col-xs-4"><input class="done btn btn-primary" type="button" value="Done"> <input class="reset btn btn-default" type="button" value="Reset"></div>');
	   		$(this).children('.drawing-container').children('.drawtool-controls').append('<div class="drawtool-toolset col-xs-8"><table class="table table-bordered"><thead><tr><th>Tool:</th><th>Tool Size:</th><th>Color:</th></tr></thead><tbody><tr><td class="drawtool-brushes"><div class="radio"><form class="brush-select"><label><input class="draw-pen" type="radio" name="draw-brush" checked="true" value="Pen"><span class="pen-icon"></span>Pen </label><label><input class="draw-eraser" type="radio" name="draw-brush" value="Eraser"><span class="eraser-icon"></span>Eraser </label></form></div></td><td class="drawtool-drawsize"><select class="drawsize form-control">' + allBrushSizes + '</select></td><td class="drawtool-palette">' + allBrushColors + '</td></tr></tbody></table></div>');
				
		// Push labels to brush colors [if colors and labels present]
		if ( $(this).data('colors') && $(this).data('labels') ) {
			for (h = 0; h < labelsArray.length; h++) {
				$(this).find('.drawtool-swatch').eq(h).attr('title', '' + labelsArray[h] + '');
			}
		} else {}
		
		// Move feedback after the drawing interaction
		$(this).children('.answer').appendTo(this);

	});
    // Run!
	start();
});


// Run start function
// ONLY after all content has been created and loaded.
$(window).on('load', function(){
	window.setTimeout(start, 100); //100ms to wait for build
});

// For IE
window.onload=start;

// DRAW TOOL 3.0 - Revised 11/28/17 Last change log: Fixed for LC3 - Gary
function start(){
	// This array will store the restoration points of the canvas
	var restorePoints = [];
	var a=false;
	var b,c="";
	
	$(".drawing-canvas").each(function() {
		var i=$(this).index(".drawing-canvas");
		var d=$(".drawing-canvas")[i];
		var e=d.getContext("2d");	
		
		// Pick Initial Color and Initial Size
		e.strokeStyle=$(this).parent(".canvas-wrap").parent(".drawing-container").find(".drawtool-palette div:eq(0)").css("background-color");
		e.lineWidth=$(this).parent(".canvas-wrap").parent(".drawing-container").find(".drawsize").val();
		e.lineCap="round";
		
        // Redraw if window size changes
		$(window).resize( saveResizeAndRedisplay );
		
		function saveResizeAndRedisplay(){
			// save the canvas content as imageURL
			var data=d.toDataURL();
		
			// resize the canvas
			$(d).css("margin-top",-parseInt($(d).siblings("img").innerHeight(), 10));
			var w = parseInt($(d).siblings("img").innerWidth(), 10);
			var h = parseInt($(d).siblings("img").innerHeight(), 10);
			d.width = w;
			d.height = h;
		
			// scale and redraw the canvas content
			var img = new Image();
				img.onload=function(){
					e.drawImage(img,0,0,w,h);
				};
			
				img.src=data;
			
			e.strokeStyle=$(d).parents(".drawing-container").find(".drawtool-palette").children("div:eq(0)").css("background-color");
			e.lineWidth=$(d).parents(".drawing-container").find(".drawtool-drawsize").children("select:first").val();
			e.lineCap="round";			
		}
		
		saveResizeAndRedisplay();	
		
		//if IE8 or older
		if (window.attachEvent){
			$(this).mousedown(function(d){
				a=true;
				e.save();
				b=d.pageX-$(this).offset().left;
				c=d.pageY-$(this).offset().top;
			});
			$(this).mouseout(function(){ a=false; });
			$(document).mouseup(function(){ a=false; });
			$(document).click(function(){ a=false });			
			$(this).mousemove(function(d){
				if (a==true) {
					e.beginPath();
					e.moveTo(d.pageX-$(this).offset().left,d.pageY-$(this).offset().top);
					e.lineTo(b,c);
					e.stroke();
					e.closePath();
					b=d.pageX-$(this).offset().left;
					c=d.pageY-$(this).offset().top
				}
			});
				
		//else use this
		} else {
			
		var drawer = {
			isDrawing: false,
			touchstart: function(coors){
				e.beginPath();
				e.moveTo(coors.x, coors.y);
				this.isDrawing = true;
			},
			touchmove: function(coors){
				if (this.isDrawing) {
			        e.lineTo(coors.x, coors.y);
			        e.stroke();
				}
			},
			touchend: function(coors){
				if (this.isDrawing) {
			        this.touchmove(coors);
			        this.isDrawing = false;
				}
			},		
			mousedown: function(coors){
				e.beginPath();
				e.moveTo(coors.x, coors.y);
				this.isDrawing = true;
			},
			mousemove: function(coors){
				if (this.isDrawing) {
			        e.lineTo(coors.x, coors.y);
			        e.stroke();
				}
			},
			mouseup: function(coors){
				if (this.isDrawing) {
			        this.mousemove(coors);
			        this.isDrawing = false;
				}
			},
			mouseout: function(coors){
				if (this.isDrawing) {
			        this.mousemove(coors);
			        this.isDrawing = false;
				}
			}
		};
		// create a function to pass touch events and coordinates to drawer
		function drawTouch(event){
			// get the touch coordinates
			var coors = {
				x: event.targetTouches[0].pageX-$(this).offset().left,
				y: event.targetTouches[0].pageY-$(this).offset().top
			};
			// pass the coordinates to the appropriate handler
			drawer[event.type](coors);
		}
		
		function drawMouse(event){
			// get the mouse coordinates
			var coors = {
				x: event.pageX-$(this).offset().left,
				y: event.pageY-$(this).offset().top
			};
			// pass the coordinates to the appropriate handler
			drawer[event.type](coors);
		}
		
		// attach the touchstart, touchmove, touchend event listeners.
	    this.addEventListener('touchstart',drawTouch, false);
	    this.addEventListener('touchmove',drawTouch, false);
	    this.addEventListener('touchend',drawTouch, false);

		// attach the mousedown, mousemove, mouseup event listeners.
	    this.addEventListener('mousedown',drawMouse, false);
	    this.addEventListener('mousemove',drawMouse, false);
	    this.addEventListener('mouseup',drawMouse, false);
	    this.addEventListener('mouseout',drawMouse, false);
		
		// prevent elastic scrolling
		this.addEventListener('touchmove',function(event){
			event.preventDefault();
		},false);
		
		}
		
		
		// DRAW 2.0 || Pen/Eraser Switch
		$(".drawtool-swatch").click(function() {
			$(this).parents(".drawtool-palette").siblings(".drawtool-brushes").find(".draw-pen").click();
		});
		
		// DRAW 2.0 || Brush Size
		$(".drawsize").change(function(a){
			var i=$(this).parents(".drawtool-controls").siblings(".canvas-wrap").children(".drawing-canvas").index(".drawing-canvas");
			var d=$(".drawing-canvas")[i];
			var e=d.getContext("2d");
			e.lineWidth=this.value;
		});
		
		// DRAW 2.0 || Color Palette
		$(".drawtool-palette").change(function(a){
			var i=$(this).parents(".drawtool-controls").siblings(".canvas-wrap").children(".drawing-canvas").index(".drawing-canvas");
			var d=$(".drawing-canvas")[i];
			var e=d.getContext("2d");
			e.strokeStyle=this.value
		});
		
		// DRAW 2.0 || Color Swatch Pick
		$(".drawtool-swatch").click(function(){
			var i=$(this).parents(".drawtool-controls").siblings(".canvas-wrap").children(".drawing-canvas").index(".drawing-canvas");
			var d=$(".drawing-canvas")[i];
			var e=d.getContext("2d");
			e.globalCompositeOperation = "source-over";
			e.strokeStyle=$(this).css("background-color");
			// Return to Pen Selected
			$(this).parents(".drawtool-palette").siblings(".drawtool-brushes").children(".draw-pen").prop("checked", true);
		});
		
		// DRAW 2.0 || Tooltip on Color Swatch hover
		$(".drawtool-swatch").tooltip();
		
		// DRAW 2.0 || Brush/Pen Selector
		$(".draw-pen").click(function() {
			var i=$(this).parents(".drawtool-controls").siblings(".canvas-wrap").children(".drawing-canvas").index(".drawing-canvas");
			var d=$(".drawing-canvas")[i];
			var e=d.getContext("2d");
			e.globalCompositeOperation = "source-over";
			e.strokeStyle=$(this).parents(".drawing-container").find(".drawtool-palette").children("div:eq(0)").css("background-color");
		});
		
		// DRAW 2.0 || Eraser Selector
		$(".draw-eraser").click(function() {
			var i=$(this).parents(".drawtool-controls").siblings(".canvas-wrap").children(".drawing-canvas").index(".drawing-canvas");
			var d=$(".drawing-canvas")[i];
			var e=d.getContext("2d");
			e.globalCompositeOperation = "destination-out";  
			e.strokeStyle = ("rgba(0,0,0,1.0)");
		});
		
		// DRAW 2.0 || Reset button
		$(".reset").click(function(){
			var i=$(this).parents(".drawtool-controls").siblings(".canvas-wrap").children(".drawing-canvas").index(".drawing-canvas");
			var d=$(".drawing-canvas")[i];
			var e=d.getContext("2d");
			e.globalCompositeOperation = "source-over";
			e.strokeStyle=$(this).parents(".drawing-container").find(".drawtool-palette").children("div:eq(0)").css("background-color");
			$(this).parents(".drawing-container").find(".drawtool-drawsize").find("select:first option").prop("selected","").closest("select").find("option:first").prop("selected","selected");
			e.lineWidth=$(this).parents(".drawing-container").find(".drawtool-drawsize").children("select:first").val();
			e.lineCap="round";
			e.clearRect(0,0,d.width,d.height);
		});
	
	});
}


// DRAW 2.0 || Brush Selector
$(function(){
	
  // DRAW 2.0 || Canvas Background
  $(".drawing-container").each(function() {
		var fileName = $(this).attr('title');
	    var ext = fileName.slice(-4);
	    var name = fileName.slice(0, -4);
	    var feedback_filename = name + "_feedback" + ext;
		$(this).find('.canvas-wrap').prepend('<img class="background img-responsive center-block" src="'+fileName+'" alt="background image" style="position: relative;"><img class="feedback img-responsive center-block" src="'+feedback_filename+'" alt="background image" style="position: relative; display: none;">');

		var canv = $(this).find("canvas");
		$(this).find('.canvas-wrap img:first').on("load", function () {
			var width = parseInt($(this).innerWidth(), 10);
			canv.prop("width",width);
		});
		$(this).find('.canvas-wrap img:first').on("load", function () {
			var height = parseInt($(this).innerHeight(), 10);
			var negHeight = -height;
			canv.css("margin-top",negHeight);
			canv.prop("height",height);
		});
		
		canv.css("position","relative");

		$(this).children('.controls').children(".color_controls").children('div').each(function() {
			var clr = $(this).css("background-color");
			$(this).css({
				"background-color" : "" + clr + ""
			});
		});

  });  
  
  // DRAW 2.0 || Buttons fx
  $("input").click(function() {	  
	  if ($(this).is(".done")) {
		  $(this).attr("disabled","disabled").addClass("btn-default").removeClass("btn-primary");
		  $(this).siblings("input.clear").addClass("reset").removeClass("clear").attr("value","Reset");

		  var fileName = $(this).parents(".drawing-container").attr('title');
		  var ext = fileName.slice(-4);
		  var name = fileName.slice(0, -4);
		  $(this).parents('.drawtool-controls').siblings('.canvas-wrap').children('.feedback').show();
		  $(this).parents('.drawtool-controls').siblings('.canvas-wrap').children('.background').hide();
		  
  	  } else if ($(this).is(".reset")) {	
		  $(this).siblings("input.done").removeAttr("disabled").removeClass("btn-default").addClass("btn-primary");
		   var fileName = $(this).parents(".drawing-container").attr('title');
		  $(this).parents(".drawtool-controls").siblings(".canvas-wrap").children(".background").show();
		  $(this).parents(".drawtool-controls").siblings(".canvas-wrap").children(".feedback").hide();
		  $(this).parents('.drawtool-controls').find(".brush-select input:first").prop('checked', true);
  	  }
  });
  
    // Restore Done Button
    $(".done").removeAttr("disabled");

    // CANVAS DRAWING TOOL - Resizeable Canvas
    $(function(){
        //Get the canvas & context
        var c = $('.responsive-canvas');
        var ct = c.get(0).getContext('2d');
        var container = $(c).parent();
        
        //Run function when browser  resize
        $(window).resize (respondCanvas);
        
        function respondCanvas(){
            c.attr('width', $(container).width() ); //max width
            c.attr('height', $(container).height() ); //max height
            
            //Redraw & reposition content
            var x = c.width();
            var y = c.height();
            ct.font = "20px Calibri";
            
            ct.fillStyle = "#222"; // Canvas Background
            ct.fillRect( 0, 0, x, y); // fill the canvas
            
            var resizeText = "Canvas Width: "+c.width()+"px";
            ct.textAlign = "center";
            ct.fillStyle = "#fff"; // Text Color
            ct.fillText(resizeText, (x/2), (y/2) );
    }
    
    // Initial call
    respondCanvas();
});

});




// ====================================
// IMAGE COMPARISON TWENTYTWENTY PLUGIN
// ====================================
(function($){$.fn.twentytwenty=function(options){var options=$.extend({default_offset_pct:0.5,orientation:'horizontal'},options);return this.each(function(){var sliderPct=options.default_offset_pct;var container=$(this);var sliderOrientation=options.orientation;var beforeDirection=(sliderOrientation==='vertical')?'down':'left';var afterDirection=(sliderOrientation==='vertical')?'up':'right';container.wrap("<div class='twentytwenty-wrapper twentytwenty-"+sliderOrientation+"'></div>");container.append("<div class='twentytwenty-overlay'></div>");var beforeImg=container.find("img:first");var afterImg=container.find("img:last");container.append("<div class='twentytwenty-handle'></div>");var slider=container.find(".twentytwenty-handle");slider.append("<span class='twentytwenty-"+beforeDirection+"-arrow'></span>");slider.append("<span class='twentytwenty-"+afterDirection+"-arrow'></span>");container.addClass("twentytwenty-container");beforeImg.addClass("twentytwenty-before");afterImg.addClass("twentytwenty-after");var overlay=container.find(".twentytwenty-overlay");overlay.append("<div class='twentytwenty-before-label'></div>");var calcOffset=function(dimensionPct){var w=beforeImg.width();var h=beforeImg.height();return{w:w+"px",h:h+"px",cw:(dimensionPct*w)+"px",ch:(dimensionPct*h)+"px"};};var adjustContainer=function(offset){if(sliderOrientation==='vertical'){beforeImg.css("clip","rect(0,"+offset.w+","+offset.ch+",0)");}else{beforeImg.css("clip","rect(0,"+offset.cw+","+offset.h+",0)");}container.css("height",offset.h);};var adjustSlider=function(pct){var offset=calcOffset(pct);slider.css((sliderOrientation==="vertical")?"top":"left",(sliderOrientation==="vertical")?offset.ch:offset.cw);adjustContainer(offset);};$(window).on("resize.twentytwenty",function(e){adjustSlider(sliderPct);});var offsetX=0;var imgWidth=0;slider.on("movestart",function(e){if(((e.distX>e.distY&&e.distX<-e.distY)||(e.distX<e.distY&&e.distX>-e.distY))&&sliderOrientation!=='vertical'){e.preventDefault();}else if(((e.distX<e.distY&&e.distX<-e.distY)||(e.distX>e.distY&&e.distX>e.distY))&&sliderOrientation==='vertical'){e.preventDefault();}container.addClass("active");offsetX=container.offset().left;offsetY=container.offset().top;imgWidth=beforeImg.width();imgHeight=beforeImg.height();});slider.on("moveend",function(e){container.removeClass("active");});slider.on("move",function(e){if(container.hasClass("active")){sliderPct=(sliderOrientation==='vertical')?(e.pageY-offsetY)/imgHeight:(e.pageX-offsetX)/imgWidth;if(sliderPct<0){sliderPct=0;}if(sliderPct>1){sliderPct=1;}adjustSlider(sliderPct);}});container.find("img").on("mousedown",function(event){event.preventDefault();});$(window).trigger("resize.twentytwenty");$('a[data-toggle="tab"]').on('shown.bs.tab',function(e){adjustSlider(sliderPct);e.preventDefault();});});};})(jQuery);
  
  // Generate Image Sweepers
  $(window).on('load', function(){
      if (printVersion) { /* Just display images (NO Action)*/ }
      else {
          // Find class and run plugin
          $('.image-sweep').twentytwenty({
            default_offset_pct: 0.7
          });
          // Add EN sweeper instructions
          $('div.image-sweep').before('<span class="image-sweep-instructions">Drag handle left or right to compare images</span>');
          $('div.image-sweep').hover(function(){
            $(this).prev('.image-sweep-instructions').css('opacity', '0');
          });
      };
      
  });



// ==================================
// IMAGE MAGNIFIER ELEVATEZOOM PLUGIN
// ==================================
/* jQuery elevateZoom 3.0.8 - Demo's and documentation: - www.elevateweb.co.uk/image-zoom - Copyright (c) 2013 Andrew Eades - www.elevateweb.co.uk - Dual licensed under the LGPL licenses. - http://en.wikipedia.org/wiki/MIT_License - http://en.wikipedia.org/wiki/GNU_General_Public_License */
"function"!==typeof Object.create&&(Object.create=function(d){function h(){}h.prototype=d;return new h});
(function(d,h,l,m){var k={init:function(b,a){var c=this;c.elem=a;c.$elem=d(a);c.imageSrc=c.$elem.data("zoom-image")?c.$elem.data("zoom-image"):c.$elem.attr("src");c.options=d.extend({},d.fn.elevateZoom.options,b);c.options.tint&&(c.options.lensColour="none",c.options.lensOpacity="1");"inner"==c.options.zoomType&&(c.options.showLens=!1);c.$elem.parent().removeAttr("title").removeAttr("alt");c.zoomImage=c.imageSrc;c.refresh(1);d("#"+c.options.gallery+" a").click(function(a){c.options.galleryActiveClass&&
(d("#"+c.options.gallery+" a").removeClass(c.options.galleryActiveClass),d(this).addClass(c.options.galleryActiveClass));a.preventDefault();d(this).data("zoom-image")?c.zoomImagePre=d(this).data("zoom-image"):c.zoomImagePre=d(this).data("image");c.swaptheimage(d(this).data("image"),c.zoomImagePre);return!1})},refresh:function(b){var a=this;setTimeout(function(){a.fetch(a.imageSrc)},b||a.options.refresh)},fetch:function(b){var a=this,c=new Image;c.onload=function(){a.largeWidth=c.width;a.largeHeight=
c.height;a.startZoom();a.currentImage=a.imageSrc;a.options.onZoomedImageLoaded(a.$elem)};c.src=b},startZoom:function(){var b=this;b.nzWidth=b.$elem.width();b.nzHeight=b.$elem.height();b.isWindowActive=!1;b.isLensActive=!1;b.isTintActive=!1;b.overWindow=!1;b.options.imageCrossfade&&(b.zoomWrap=b.$elem.wrap('<div style="height:'+b.nzHeight+"px;width:"+b.nzWidth+'px;" class="zoomWrapper" />'),b.$elem.css("position","absolute"));b.zoomLock=1;b.scrollingLock=!1;b.changeBgSize=!1;b.currentZoomLevel=b.options.zoomLevel;
b.nzOffset=b.$elem.offset();b.widthRatio=b.largeWidth/b.currentZoomLevel/b.nzWidth;b.heightRatio=b.largeHeight/b.currentZoomLevel/b.nzHeight;"window"==b.options.zoomType&&(b.zoomWindowStyle="overflow: hidden;background-position: 0px 0px;text-align:center;background-color: "+String(b.options.zoomWindowBgColour)+";width: "+String(b.options.zoomWindowWidth)+"px;height: "+String(b.options.zoomWindowHeight)+"px;float: left;background-size: "+b.largeWidth/b.currentZoomLevel+"px "+b.largeHeight/b.currentZoomLevel+
"px;display: none;z-index:100;border: "+String(b.options.borderSize)+"px solid "+b.options.borderColour+";background-repeat: no-repeat;position: absolute;");if("inner"==b.options.zoomType){var a=b.$elem.css("border-left-width");b.zoomWindowStyle="overflow: hidden;margin-left: "+String(a)+";margin-top: "+String(a)+";background-position: 0px 0px;width: "+String(b.nzWidth)+"px;height: "+String(b.nzHeight)+"px;float: left;display: none;cursor:"+b.options.cursor+";px solid "+b.options.borderColour+";background-repeat: no-repeat;position: absolute;"}"window"==
b.options.zoomType&&(lensHeight=b.nzHeight<b.options.zoomWindowWidth/b.widthRatio?b.nzHeight:String(b.options.zoomWindowHeight/b.heightRatio),lensWidth=b.largeWidth<b.options.zoomWindowWidth?b.nzWidth:b.options.zoomWindowWidth/b.widthRatio,b.lensStyle="background-position: 0px 0px;width: "+String(b.options.zoomWindowWidth/b.widthRatio)+"px;height: "+String(b.options.zoomWindowHeight/b.heightRatio)+"px;float: right;display: none;overflow: hidden;z-index: 999;-webkit-transform: translateZ(0);opacity:"+
b.options.lensOpacity+";filter: alpha(opacity = "+100*b.options.lensOpacity+"); zoom:1;width:"+lensWidth+"px;height:"+lensHeight+"px;background-color:"+b.options.lensColour+";cursor:"+b.options.cursor+";border: "+b.options.lensBorderSize+"px solid "+b.options.lensBorderColour+";background-repeat: no-repeat;position: absolute;");b.tintStyle="display: block;position: absolute;background-color: "+b.options.tintColour+";filter:alpha(opacity=0);opacity: 0;width: "+b.nzWidth+"px;height: "+b.nzHeight+"px;";
b.lensRound="";"lens"==b.options.zoomType&&(b.lensStyle="background-position: 0px 0px;float: left;display: none;border: "+String(b.options.borderSize)+"px solid "+b.options.borderColour+";width:"+String(b.options.lensSize)+"px;height:"+String(b.options.lensSize)+"px;background-repeat: no-repeat;position: absolute;");"round"==b.options.lensShape&&(b.lensRound="border-top-left-radius: "+String(b.options.lensSize/2+b.options.borderSize)+"px;border-top-right-radius: "+String(b.options.lensSize/2+b.options.borderSize)+
"px;border-bottom-left-radius: "+String(b.options.lensSize/2+b.options.borderSize)+"px;border-bottom-right-radius: "+String(b.options.lensSize/2+b.options.borderSize)+"px;");b.zoomContainer=d('<div class="zoomContainer" style="-webkit-transform: translateZ(0);position:absolute;left:'+b.nzOffset.left+"px;top:"+b.nzOffset.top+"px;height:"+b.nzHeight+"px;width:"+b.nzWidth+'px;"></div>');d("body").append(b.zoomContainer);b.options.containLensZoom&&"lens"==b.options.zoomType&&b.zoomContainer.css("overflow",
"hidden");"inner"!=b.options.zoomType&&(b.zoomLens=d("<div class='zoomLens' style='"+b.lensStyle+b.lensRound+"'>&nbsp;</div>").appendTo(b.zoomContainer).click(function(){b.$elem.trigger("click")}),b.options.tint&&(b.tintContainer=d("<div/>").addClass("tintContainer"),b.zoomTint=d("<div class='zoomTint' style='"+b.tintStyle+"'></div>"),b.zoomLens.wrap(b.tintContainer),b.zoomTintcss=b.zoomLens.after(b.zoomTint),b.zoomTintImage=d('<img style="position: absolute; left: 0px; top: 0px; max-width: none; width: '+
b.nzWidth+"px; height: "+b.nzHeight+'px;" src="'+b.imageSrc+'">').appendTo(b.zoomLens).click(function(){b.$elem.trigger("click")})));isNaN(b.options.zoomWindowPosition)?b.zoomWindow=d("<div style='z-index:999;left:"+b.windowOffsetLeft+"px;top:"+b.windowOffsetTop+"px;"+b.zoomWindowStyle+"' class='zoomWindow'>&nbsp;</div>").appendTo("body").click(function(){b.$elem.trigger("click")}):b.zoomWindow=d("<div style='z-index:999;left:"+b.windowOffsetLeft+"px;top:"+b.windowOffsetTop+"px;"+b.zoomWindowStyle+
"' class='zoomWindow'>&nbsp;</div>").appendTo(b.zoomContainer).click(function(){b.$elem.trigger("click")});b.zoomWindowContainer=d("<div/>").addClass("zoomWindowContainer").css("width",b.options.zoomWindowWidth);b.zoomWindow.wrap(b.zoomWindowContainer);"lens"==b.options.zoomType&&b.zoomLens.css({backgroundImage:"url('"+b.imageSrc+"')"});"window"==b.options.zoomType&&b.zoomWindow.css({backgroundImage:"url('"+b.imageSrc+"')"});"inner"==b.options.zoomType&&b.zoomWindow.css({backgroundImage:"url('"+b.imageSrc+
"')"});b.$elem.bind("touchmove",function(a){a.preventDefault();b.setPosition(a.originalEvent.touches[0]||a.originalEvent.changedTouches[0])});b.zoomContainer.bind("touchmove",function(a){"inner"==b.options.zoomType&&b.showHideWindow("show");a.preventDefault();b.setPosition(a.originalEvent.touches[0]||a.originalEvent.changedTouches[0])});b.zoomContainer.bind("touchend",function(a){b.showHideWindow("hide");b.options.showLens&&b.showHideLens("hide");b.options.tint&&"inner"!=b.options.zoomType&&b.showHideTint("hide")});
b.$elem.bind("touchend",function(a){b.showHideWindow("hide");b.options.showLens&&b.showHideLens("hide");b.options.tint&&"inner"!=b.options.zoomType&&b.showHideTint("hide")});b.options.showLens&&(b.zoomLens.bind("touchmove",function(a){a.preventDefault();b.setPosition(a.originalEvent.touches[0]||a.originalEvent.changedTouches[0])}),b.zoomLens.bind("touchend",function(a){b.showHideWindow("hide");b.options.showLens&&b.showHideLens("hide");b.options.tint&&"inner"!=b.options.zoomType&&b.showHideTint("hide")}));
b.$elem.bind("mousemove",function(a){!1==b.overWindow&&b.setElements("show");if(b.lastX!==a.clientX||b.lastY!==a.clientY)b.setPosition(a),b.currentLoc=a;b.lastX=a.clientX;b.lastY=a.clientY});b.zoomContainer.bind("mousemove",function(a){!1==b.overWindow&&b.setElements("show");if(b.lastX!==a.clientX||b.lastY!==a.clientY)b.setPosition(a),b.currentLoc=a;b.lastX=a.clientX;b.lastY=a.clientY});"inner"!=b.options.zoomType&&b.zoomLens.bind("mousemove",function(a){if(b.lastX!==a.clientX||b.lastY!==a.clientY)b.setPosition(a),
b.currentLoc=a;b.lastX=a.clientX;b.lastY=a.clientY});b.options.tint&&"inner"!=b.options.zoomType&&b.zoomTint.bind("mousemove",function(a){if(b.lastX!==a.clientX||b.lastY!==a.clientY)b.setPosition(a),b.currentLoc=a;b.lastX=a.clientX;b.lastY=a.clientY});"inner"==b.options.zoomType&&b.zoomWindow.bind("mousemove",function(a){if(b.lastX!==a.clientX||b.lastY!==a.clientY)b.setPosition(a),b.currentLoc=a;b.lastX=a.clientX;b.lastY=a.clientY});b.zoomContainer.add(b.$elem).mouseenter(function(){!1==b.overWindow&&
b.setElements("show")}).mouseleave(function(){b.scrollLock||b.setElements("hide")});"inner"!=b.options.zoomType&&b.zoomWindow.mouseenter(function(){b.overWindow=!0;b.setElements("hide")}).mouseleave(function(){b.overWindow=!1});b.minZoomLevel=b.options.minZoomLevel?b.options.minZoomLevel:2*b.options.scrollZoomIncrement;b.options.scrollZoom&&b.zoomContainer.add(b.$elem).bind("mousewheel DOMMouseScroll MozMousePixelScroll",function(a){b.scrollLock=!0;clearTimeout(d.data(this,"timer"));d.data(this,"timer",
setTimeout(function(){b.scrollLock=!1},250));var e=a.originalEvent.wheelDelta||-1*a.originalEvent.detail;a.stopImmediatePropagation();a.stopPropagation();a.preventDefault();0<e/120?b.currentZoomLevel>=b.minZoomLevel&&b.changeZoomLevel(b.currentZoomLevel-b.options.scrollZoomIncrement):b.options.maxZoomLevel?b.currentZoomLevel<=b.options.maxZoomLevel&&b.changeZoomLevel(parseFloat(b.currentZoomLevel)+b.options.scrollZoomIncrement):b.changeZoomLevel(parseFloat(b.currentZoomLevel)+b.options.scrollZoomIncrement);
return!1})},setElements:function(b){if(!this.options.zoomEnabled)return!1;"show"==b&&this.isWindowSet&&("inner"==this.options.zoomType&&this.showHideWindow("show"),"window"==this.options.zoomType&&this.showHideWindow("show"),this.options.showLens&&this.showHideLens("show"),this.options.tint&&"inner"!=this.options.zoomType&&this.showHideTint("show"));"hide"==b&&("window"==this.options.zoomType&&this.showHideWindow("hide"),this.options.tint||this.showHideWindow("hide"),this.options.showLens&&this.showHideLens("hide"),
this.options.tint&&this.showHideTint("hide"))},setPosition:function(b){if(!this.options.zoomEnabled)return!1;this.nzHeight=this.$elem.height();this.nzWidth=this.$elem.width();this.nzOffset=this.$elem.offset();this.options.tint&&"inner"!=this.options.zoomType&&(this.zoomTint.css({top:0}),this.zoomTint.css({left:0}));this.options.responsive&&!this.options.scrollZoom&&this.options.showLens&&(lensHeight=this.nzHeight<this.options.zoomWindowWidth/this.widthRatio?this.nzHeight:String(this.options.zoomWindowHeight/
this.heightRatio),lensWidth=this.largeWidth<this.options.zoomWindowWidth?this.nzWidth:this.options.zoomWindowWidth/this.widthRatio,this.widthRatio=this.largeWidth/this.nzWidth,this.heightRatio=this.largeHeight/this.nzHeight,"lens"!=this.options.zoomType&&(lensHeight=this.nzHeight<this.options.zoomWindowWidth/this.widthRatio?this.nzHeight:String(this.options.zoomWindowHeight/this.heightRatio),lensWidth=this.options.zoomWindowWidth<this.options.zoomWindowWidth?this.nzWidth:this.options.zoomWindowWidth/
this.widthRatio,this.zoomLens.css("width",lensWidth),this.zoomLens.css("height",lensHeight),this.options.tint&&(this.zoomTintImage.css("width",this.nzWidth),this.zoomTintImage.css("height",this.nzHeight))),"lens"==this.options.zoomType&&this.zoomLens.css({width:String(this.options.lensSize)+"px",height:String(this.options.lensSize)+"px"}));this.zoomContainer.css({top:this.nzOffset.top});this.zoomContainer.css({left:this.nzOffset.left});this.mouseLeft=parseInt(b.pageX-this.nzOffset.left);this.mouseTop=
parseInt(b.pageY-this.nzOffset.top);"window"==this.options.zoomType&&(this.Etoppos=this.mouseTop<this.zoomLens.height()/2,this.Eboppos=this.mouseTop>this.nzHeight-this.zoomLens.height()/2-2*this.options.lensBorderSize,this.Eloppos=this.mouseLeft<0+this.zoomLens.width()/2,this.Eroppos=this.mouseLeft>this.nzWidth-this.zoomLens.width()/2-2*this.options.lensBorderSize);"inner"==this.options.zoomType&&(this.Etoppos=this.mouseTop<this.nzHeight/2/this.heightRatio,this.Eboppos=this.mouseTop>this.nzHeight-
this.nzHeight/2/this.heightRatio,this.Eloppos=this.mouseLeft<0+this.nzWidth/2/this.widthRatio,this.Eroppos=this.mouseLeft>this.nzWidth-this.nzWidth/2/this.widthRatio-2*this.options.lensBorderSize);0>=this.mouseLeft||0>this.mouseTop||this.mouseLeft>this.nzWidth||this.mouseTop>this.nzHeight?this.setElements("hide"):(this.options.showLens&&(this.lensLeftPos=String(this.mouseLeft-this.zoomLens.width()/2),this.lensTopPos=String(this.mouseTop-this.zoomLens.height()/2)),this.Etoppos&&(this.lensTopPos=0),
this.Eloppos&&(this.tintpos=this.lensLeftPos=this.windowLeftPos=0),"window"==this.options.zoomType&&(this.Eboppos&&(this.lensTopPos=Math.max(this.nzHeight-this.zoomLens.height()-2*this.options.lensBorderSize,0)),this.Eroppos&&(this.lensLeftPos=this.nzWidth-this.zoomLens.width()-2*this.options.lensBorderSize)),"inner"==this.options.zoomType&&(this.Eboppos&&(this.lensTopPos=Math.max(this.nzHeight-2*this.options.lensBorderSize,0)),this.Eroppos&&(this.lensLeftPos=this.nzWidth-this.nzWidth-2*this.options.lensBorderSize)),
"lens"==this.options.zoomType&&(this.windowLeftPos=String(-1*((b.pageX-this.nzOffset.left)*this.widthRatio-this.zoomLens.width()/2)),this.windowTopPos=String(-1*((b.pageY-this.nzOffset.top)*this.heightRatio-this.zoomLens.height()/2)),this.zoomLens.css({backgroundPosition:this.windowLeftPos+"px "+this.windowTopPos+"px"}),this.changeBgSize&&(this.nzHeight>this.nzWidth?("lens"==this.options.zoomType&&this.zoomLens.css({"background-size":this.largeWidth/this.newvalueheight+"px "+this.largeHeight/this.newvalueheight+
"px"}),this.zoomWindow.css({"background-size":this.largeWidth/this.newvalueheight+"px "+this.largeHeight/this.newvalueheight+"px"})):("lens"==this.options.zoomType&&this.zoomLens.css({"background-size":this.largeWidth/this.newvaluewidth+"px "+this.largeHeight/this.newvaluewidth+"px"}),this.zoomWindow.css({"background-size":this.largeWidth/this.newvaluewidth+"px "+this.largeHeight/this.newvaluewidth+"px"})),this.changeBgSize=!1),this.setWindowPostition(b)),this.options.tint&&"inner"!=this.options.zoomType&&
this.setTintPosition(b),"window"==this.options.zoomType&&this.setWindowPostition(b),"inner"==this.options.zoomType&&this.setWindowPostition(b),this.options.showLens&&(this.fullwidth&&"lens"!=this.options.zoomType&&(this.lensLeftPos=0),this.zoomLens.css({left:this.lensLeftPos+"px",top:this.lensTopPos+"px"})))},showHideWindow:function(b){"show"!=b||this.isWindowActive||(this.options.zoomWindowFadeIn?this.zoomWindow.stop(!0,!0,!1).fadeIn(this.options.zoomWindowFadeIn):this.zoomWindow.show(),this.isWindowActive=
!0);"hide"==b&&this.isWindowActive&&(this.options.zoomWindowFadeOut?this.zoomWindow.stop(!0,!0).fadeOut(this.options.zoomWindowFadeOut):this.zoomWindow.hide(),this.isWindowActive=!1)},showHideLens:function(b){"show"!=b||this.isLensActive||(this.options.lensFadeIn?this.zoomLens.stop(!0,!0,!1).fadeIn(this.options.lensFadeIn):this.zoomLens.show(),this.isLensActive=!0);"hide"==b&&this.isLensActive&&(this.options.lensFadeOut?this.zoomLens.stop(!0,!0).fadeOut(this.options.lensFadeOut):this.zoomLens.hide(),
this.isLensActive=!1)},showHideTint:function(b){"show"!=b||this.isTintActive||(this.options.zoomTintFadeIn?this.zoomTint.css({opacity:this.options.tintOpacity}).animate().stop(!0,!0).fadeIn("slow"):(this.zoomTint.css({opacity:this.options.tintOpacity}).animate(),this.zoomTint.show()),this.isTintActive=!0);"hide"==b&&this.isTintActive&&(this.options.zoomTintFadeOut?this.zoomTint.stop(!0,!0).fadeOut(this.options.zoomTintFadeOut):this.zoomTint.hide(),this.isTintActive=!1)},setLensPostition:function(b){},
setWindowPostition:function(b){var a=this;if(isNaN(a.options.zoomWindowPosition))a.externalContainer=d("#"+a.options.zoomWindowPosition),a.externalContainerWidth=a.externalContainer.width(),a.externalContainerHeight=a.externalContainer.height(),a.externalContainerOffset=a.externalContainer.offset(),a.windowOffsetTop=a.externalContainerOffset.top,a.windowOffsetLeft=a.externalContainerOffset.left;else switch(a.options.zoomWindowPosition){case 1:a.windowOffsetTop=a.options.zoomWindowOffety;a.windowOffsetLeft=
+a.nzWidth;break;case 2:a.options.zoomWindowHeight>a.nzHeight&&(a.windowOffsetTop=-1*(a.options.zoomWindowHeight/2-a.nzHeight/2),a.windowOffsetLeft=a.nzWidth);break;case 3:a.windowOffsetTop=a.nzHeight-a.zoomWindow.height()-2*a.options.borderSize;a.windowOffsetLeft=a.nzWidth;break;case 4:a.windowOffsetTop=a.nzHeight;a.windowOffsetLeft=a.nzWidth;break;case 5:a.windowOffsetTop=a.nzHeight;a.windowOffsetLeft=a.nzWidth-a.zoomWindow.width()-2*a.options.borderSize;break;case 6:a.options.zoomWindowHeight>
a.nzHeight&&(a.windowOffsetTop=a.nzHeight,a.windowOffsetLeft=-1*(a.options.zoomWindowWidth/2-a.nzWidth/2+2*a.options.borderSize));break;case 7:a.windowOffsetTop=a.nzHeight;a.windowOffsetLeft=0;break;case 8:a.windowOffsetTop=a.nzHeight;a.windowOffsetLeft=-1*(a.zoomWindow.width()+2*a.options.borderSize);break;case 9:a.windowOffsetTop=a.nzHeight-a.zoomWindow.height()-2*a.options.borderSize;a.windowOffsetLeft=-1*(a.zoomWindow.width()+2*a.options.borderSize);break;case 10:a.options.zoomWindowHeight>a.nzHeight&&
(a.windowOffsetTop=-1*(a.options.zoomWindowHeight/2-a.nzHeight/2),a.windowOffsetLeft=-1*(a.zoomWindow.width()+2*a.options.borderSize));break;case 11:a.windowOffsetTop=a.options.zoomWindowOffety;a.windowOffsetLeft=-1*(a.zoomWindow.width()+2*a.options.borderSize);break;case 12:a.windowOffsetTop=-1*(a.zoomWindow.height()+2*a.options.borderSize);a.windowOffsetLeft=-1*(a.zoomWindow.width()+2*a.options.borderSize);break;case 13:a.windowOffsetTop=-1*(a.zoomWindow.height()+2*a.options.borderSize);a.windowOffsetLeft=
0;break;case 14:a.options.zoomWindowHeight>a.nzHeight&&(a.windowOffsetTop=-1*(a.zoomWindow.height()+2*a.options.borderSize),a.windowOffsetLeft=-1*(a.options.zoomWindowWidth/2-a.nzWidth/2+2*a.options.borderSize));break;case 15:a.windowOffsetTop=-1*(a.zoomWindow.height()+2*a.options.borderSize);a.windowOffsetLeft=a.nzWidth-a.zoomWindow.width()-2*a.options.borderSize;break;case 16:a.windowOffsetTop=-1*(a.zoomWindow.height()+2*a.options.borderSize);a.windowOffsetLeft=a.nzWidth;break;default:a.windowOffsetTop=
a.options.zoomWindowOffety,a.windowOffsetLeft=a.nzWidth}a.isWindowSet=!0;a.windowOffsetTop+=a.options.zoomWindowOffety;a.windowOffsetLeft+=a.options.zoomWindowOffetx;a.zoomWindow.css({top:a.windowOffsetTop});a.zoomWindow.css({left:a.windowOffsetLeft});"inner"==a.options.zoomType&&(a.zoomWindow.css({top:0}),a.zoomWindow.css({left:0}));a.windowLeftPos=String(-1*((b.pageX-a.nzOffset.left)*a.widthRatio-a.zoomWindow.width()/2));a.windowTopPos=String(-1*((b.pageY-a.nzOffset.top)*a.heightRatio-a.zoomWindow.height()/
2));a.Etoppos&&(a.windowTopPos=0);a.Eloppos&&(a.windowLeftPos=0);a.Eboppos&&(a.windowTopPos=-1*(a.largeHeight/a.currentZoomLevel-a.zoomWindow.height()));a.Eroppos&&(a.windowLeftPos=-1*(a.largeWidth/a.currentZoomLevel-a.zoomWindow.width()));a.fullheight&&(a.windowTopPos=0);a.fullwidth&&(a.windowLeftPos=0);if("window"==a.options.zoomType||"inner"==a.options.zoomType)1==a.zoomLock&&(1>=a.widthRatio&&(a.windowLeftPos=0),1>=a.heightRatio&&(a.windowTopPos=0)),a.largeHeight<a.options.zoomWindowHeight&&(a.windowTopPos=
0),a.largeWidth<a.options.zoomWindowWidth&&(a.windowLeftPos=0),a.options.easing?(a.xp||(a.xp=0),a.yp||(a.yp=0),a.loop||(a.loop=setInterval(function(){a.xp+=(a.windowLeftPos-a.xp)/a.options.easingAmount;a.yp+=(a.windowTopPos-a.yp)/a.options.easingAmount;a.scrollingLock?(clearInterval(a.loop),a.xp=a.windowLeftPos,a.yp=a.windowTopPos,a.xp=-1*((b.pageX-a.nzOffset.left)*a.widthRatio-a.zoomWindow.width()/2),a.yp=-1*((b.pageY-a.nzOffset.top)*a.heightRatio-a.zoomWindow.height()/2),a.changeBgSize&&(a.nzHeight>
a.nzWidth?("lens"==a.options.zoomType&&a.zoomLens.css({"background-size":a.largeWidth/a.newvalueheight+"px "+a.largeHeight/a.newvalueheight+"px"}),a.zoomWindow.css({"background-size":a.largeWidth/a.newvalueheight+"px "+a.largeHeight/a.newvalueheight+"px"})):("lens"!=a.options.zoomType&&a.zoomLens.css({"background-size":a.largeWidth/a.newvaluewidth+"px "+a.largeHeight/a.newvalueheight+"px"}),a.zoomWindow.css({"background-size":a.largeWidth/a.newvaluewidth+"px "+a.largeHeight/a.newvaluewidth+"px"})),
a.changeBgSize=!1),a.zoomWindow.css({backgroundPosition:a.windowLeftPos+"px "+a.windowTopPos+"px"}),a.scrollingLock=!1,a.loop=!1):(a.changeBgSize&&(a.nzHeight>a.nzWidth?("lens"==a.options.zoomType&&a.zoomLens.css({"background-size":a.largeWidth/a.newvalueheight+"px "+a.largeHeight/a.newvalueheight+"px"}),a.zoomWindow.css({"background-size":a.largeWidth/a.newvalueheight+"px "+a.largeHeight/a.newvalueheight+"px"})):("lens"!=a.options.zoomType&&a.zoomLens.css({"background-size":a.largeWidth/a.newvaluewidth+
"px "+a.largeHeight/a.newvaluewidth+"px"}),a.zoomWindow.css({"background-size":a.largeWidth/a.newvaluewidth+"px "+a.largeHeight/a.newvaluewidth+"px"})),a.changeBgSize=!1),a.zoomWindow.css({backgroundPosition:a.xp+"px "+a.yp+"px"}))},16))):(a.changeBgSize&&(a.nzHeight>a.nzWidth?("lens"==a.options.zoomType&&a.zoomLens.css({"background-size":a.largeWidth/a.newvalueheight+"px "+a.largeHeight/a.newvalueheight+"px"}),a.zoomWindow.css({"background-size":a.largeWidth/a.newvalueheight+"px "+a.largeHeight/
a.newvalueheight+"px"})):("lens"==a.options.zoomType&&a.zoomLens.css({"background-size":a.largeWidth/a.newvaluewidth+"px "+a.largeHeight/a.newvaluewidth+"px"}),a.largeHeight/a.newvaluewidth<a.options.zoomWindowHeight?a.zoomWindow.css({"background-size":a.largeWidth/a.newvaluewidth+"px "+a.largeHeight/a.newvaluewidth+"px"}):a.zoomWindow.css({"background-size":a.largeWidth/a.newvalueheight+"px "+a.largeHeight/a.newvalueheight+"px"})),a.changeBgSize=!1),a.zoomWindow.css({backgroundPosition:a.windowLeftPos+
"px "+a.windowTopPos+"px"}))},setTintPosition:function(b){this.nzOffset=this.$elem.offset();this.tintpos=String(-1*(b.pageX-this.nzOffset.left-this.zoomLens.width()/2));this.tintposy=String(-1*(b.pageY-this.nzOffset.top-this.zoomLens.height()/2));this.Etoppos&&(this.tintposy=0);this.Eloppos&&(this.tintpos=0);this.Eboppos&&(this.tintposy=-1*(this.nzHeight-this.zoomLens.height()-2*this.options.lensBorderSize));this.Eroppos&&(this.tintpos=-1*(this.nzWidth-this.zoomLens.width()-2*this.options.lensBorderSize));
this.options.tint&&(this.fullheight&&(this.tintposy=0),this.fullwidth&&(this.tintpos=0),this.zoomTintImage.css({left:this.tintpos+"px"}),this.zoomTintImage.css({top:this.tintposy+"px"}))},swaptheimage:function(b,a){var c=this,e=new Image;c.options.loadingIcon&&(c.spinner=d("<div style=\"background: url('"+c.options.loadingIcon+"') no-repeat center;height:"+c.nzHeight+"px;width:"+c.nzWidth+'px;z-index: 2000;position: absolute; background-position: center center;"></div>'),c.$elem.after(c.spinner));
c.options.onImageSwap(c.$elem);e.onload=function(){c.largeWidth=e.width;c.largeHeight=e.height;c.zoomImage=a;c.zoomWindow.css({"background-size":c.largeWidth+"px "+c.largeHeight+"px"});c.zoomWindow.css({"background-size":c.largeWidth+"px "+c.largeHeight+"px"});c.swapAction(b,a)};e.src=a},swapAction:function(b,a){var c=this,e=new Image;e.onload=function(){c.nzHeight=e.height;c.nzWidth=e.width;c.options.onImageSwapComplete(c.$elem);c.doneCallback()};e.src=b;c.currentZoomLevel=c.options.zoomLevel;c.options.maxZoomLevel=
!1;"lens"==c.options.zoomType&&c.zoomLens.css({backgroundImage:"url('"+a+"')"});"window"==c.options.zoomType&&c.zoomWindow.css({backgroundImage:"url('"+a+"')"});"inner"==c.options.zoomType&&c.zoomWindow.css({backgroundImage:"url('"+a+"')"});c.currentImage=a;if(c.options.imageCrossfade){var f=c.$elem,g=f.clone();c.$elem.attr("src",b);c.$elem.after(g);g.stop(!0).fadeOut(c.options.imageCrossfade,function(){d(this).remove()});c.$elem.width("auto").removeAttr("width");c.$elem.height("auto").removeAttr("height");
f.fadeIn(c.options.imageCrossfade);c.options.tint&&"inner"!=c.options.zoomType&&(f=c.zoomTintImage,g=f.clone(),c.zoomTintImage.attr("src",a),c.zoomTintImage.after(g),g.stop(!0).fadeOut(c.options.imageCrossfade,function(){d(this).remove()}),f.fadeIn(c.options.imageCrossfade),c.zoomTint.css({height:c.$elem.height()}),c.zoomTint.css({width:c.$elem.width()}));c.zoomContainer.css("height",c.$elem.height());c.zoomContainer.css("width",c.$elem.width());"inner"!=c.options.zoomType||c.options.constrainType||
(c.zoomWrap.parent().css("height",c.$elem.height()),c.zoomWrap.parent().css("width",c.$elem.width()),c.zoomWindow.css("height",c.$elem.height()),c.zoomWindow.css("width",c.$elem.width()))}else c.$elem.attr("src",b),c.options.tint&&(c.zoomTintImage.attr("src",a),c.zoomTintImage.attr("height",c.$elem.height()),c.zoomTintImage.css({height:c.$elem.height()}),c.zoomTint.css({height:c.$elem.height()})),c.zoomContainer.css("height",c.$elem.height()),c.zoomContainer.css("width",c.$elem.width());c.options.imageCrossfade&&
(c.zoomWrap.css("height",c.$elem.height()),c.zoomWrap.css("width",c.$elem.width()));c.options.constrainType&&("height"==c.options.constrainType&&(c.zoomContainer.css("height",c.options.constrainSize),c.zoomContainer.css("width","auto"),c.options.imageCrossfade?(c.zoomWrap.css("height",c.options.constrainSize),c.zoomWrap.css("width","auto"),c.constwidth=c.zoomWrap.width()):(c.$elem.css("height",c.options.constrainSize),c.$elem.css("width","auto"),c.constwidth=c.$elem.width()),"inner"==c.options.zoomType&&
(c.zoomWrap.parent().css("height",c.options.constrainSize),c.zoomWrap.parent().css("width",c.constwidth),c.zoomWindow.css("height",c.options.constrainSize),c.zoomWindow.css("width",c.constwidth)),c.options.tint&&(c.tintContainer.css("height",c.options.constrainSize),c.tintContainer.css("width",c.constwidth),c.zoomTint.css("height",c.options.constrainSize),c.zoomTint.css("width",c.constwidth),c.zoomTintImage.css("height",c.options.constrainSize),c.zoomTintImage.css("width",c.constwidth))),"width"==
c.options.constrainType&&(c.zoomContainer.css("height","auto"),c.zoomContainer.css("width",c.options.constrainSize),c.options.imageCrossfade?(c.zoomWrap.css("height","auto"),c.zoomWrap.css("width",c.options.constrainSize),c.constheight=c.zoomWrap.height()):(c.$elem.css("height","auto"),c.$elem.css("width",c.options.constrainSize),c.constheight=c.$elem.height()),"inner"==c.options.zoomType&&(c.zoomWrap.parent().css("height",c.constheight),c.zoomWrap.parent().css("width",c.options.constrainSize),c.zoomWindow.css("height",
c.constheight),c.zoomWindow.css("width",c.options.constrainSize)),c.options.tint&&(c.tintContainer.css("height",c.constheight),c.tintContainer.css("width",c.options.constrainSize),c.zoomTint.css("height",c.constheight),c.zoomTint.css("width",c.options.constrainSize),c.zoomTintImage.css("height",c.constheight),c.zoomTintImage.css("width",c.options.constrainSize))))},doneCallback:function(){this.options.loadingIcon&&this.spinner.hide();this.nzOffset=this.$elem.offset();this.nzWidth=this.$elem.width();
this.nzHeight=this.$elem.height();this.currentZoomLevel=this.options.zoomLevel;this.widthRatio=this.largeWidth/this.nzWidth;this.heightRatio=this.largeHeight/this.nzHeight;"window"==this.options.zoomType&&(lensHeight=this.nzHeight<this.options.zoomWindowWidth/this.widthRatio?this.nzHeight:String(this.options.zoomWindowHeight/this.heightRatio),lensWidth=this.options.zoomWindowWidth<this.options.zoomWindowWidth?this.nzWidth:this.options.zoomWindowWidth/this.widthRatio,this.zoomLens&&(this.zoomLens.css("width",
lensWidth),this.zoomLens.css("height",lensHeight)))},getCurrentImage:function(){return this.zoomImage},getGalleryList:function(){var b=this;b.gallerylist=[];b.options.gallery?d("#"+b.options.gallery+" a").each(function(){var a="";d(this).data("zoom-image")?a=d(this).data("zoom-image"):d(this).data("image")&&(a=d(this).data("image"));a==b.zoomImage?b.gallerylist.unshift({href:""+a+"",title:d(this).find("img").attr("title")}):b.gallerylist.push({href:""+a+"",title:d(this).find("img").attr("title")})}):
b.gallerylist.push({href:""+b.zoomImage+"",title:d(this).find("img").attr("title")});return b.gallerylist},changeZoomLevel:function(b){this.scrollingLock=!0;this.newvalue=parseFloat(b).toFixed(2);newvalue=parseFloat(b).toFixed(2);maxheightnewvalue=this.largeHeight/(this.options.zoomWindowHeight/this.nzHeight*this.nzHeight);maxwidthtnewvalue=this.largeWidth/(this.options.zoomWindowWidth/this.nzWidth*this.nzWidth);"inner"!=this.options.zoomType&&(maxheightnewvalue<=newvalue?(this.heightRatio=this.largeHeight/
maxheightnewvalue/this.nzHeight,this.newvalueheight=maxheightnewvalue,this.fullheight=!0):(this.heightRatio=this.largeHeight/newvalue/this.nzHeight,this.newvalueheight=newvalue,this.fullheight=!1),maxwidthtnewvalue<=newvalue?(this.widthRatio=this.largeWidth/maxwidthtnewvalue/this.nzWidth,this.newvaluewidth=maxwidthtnewvalue,this.fullwidth=!0):(this.widthRatio=this.largeWidth/newvalue/this.nzWidth,this.newvaluewidth=newvalue,this.fullwidth=!1),"lens"==this.options.zoomType&&(maxheightnewvalue<=newvalue?
(this.fullwidth=!0,this.newvaluewidth=maxheightnewvalue):(this.widthRatio=this.largeWidth/newvalue/this.nzWidth,this.newvaluewidth=newvalue,this.fullwidth=!1)));"inner"==this.options.zoomType&&(maxheightnewvalue=parseFloat(this.largeHeight/this.nzHeight).toFixed(2),maxwidthtnewvalue=parseFloat(this.largeWidth/this.nzWidth).toFixed(2),newvalue>maxheightnewvalue&&(newvalue=maxheightnewvalue),newvalue>maxwidthtnewvalue&&(newvalue=maxwidthtnewvalue),maxheightnewvalue<=newvalue?(this.heightRatio=this.largeHeight/
newvalue/this.nzHeight,this.newvalueheight=newvalue>maxheightnewvalue?maxheightnewvalue:newvalue,this.fullheight=!0):(this.heightRatio=this.largeHeight/newvalue/this.nzHeight,this.newvalueheight=newvalue>maxheightnewvalue?maxheightnewvalue:newvalue,this.fullheight=!1),maxwidthtnewvalue<=newvalue?(this.widthRatio=this.largeWidth/newvalue/this.nzWidth,this.newvaluewidth=newvalue>maxwidthtnewvalue?maxwidthtnewvalue:newvalue,this.fullwidth=!0):(this.widthRatio=this.largeWidth/newvalue/this.nzWidth,this.newvaluewidth=
newvalue,this.fullwidth=!1));scrcontinue=!1;"inner"==this.options.zoomType&&(this.nzWidth>this.nzHeight&&(this.newvaluewidth<=maxwidthtnewvalue?scrcontinue=!0:(scrcontinue=!1,this.fullwidth=this.fullheight=!0)),this.nzHeight>this.nzWidth&&(this.newvaluewidth<=maxwidthtnewvalue?scrcontinue=!0:(scrcontinue=!1,this.fullwidth=this.fullheight=!0)));"inner"!=this.options.zoomType&&(scrcontinue=!0);scrcontinue&&(this.zoomLock=0,this.changeZoom=!0,this.options.zoomWindowHeight/this.heightRatio<=this.nzHeight&&
(this.currentZoomLevel=this.newvalueheight,"lens"!=this.options.zoomType&&"inner"!=this.options.zoomType&&(this.changeBgSize=!0,this.zoomLens.css({height:String(this.options.zoomWindowHeight/this.heightRatio)+"px"})),"lens"==this.options.zoomType||"inner"==this.options.zoomType)&&(this.changeBgSize=!0),this.options.zoomWindowWidth/this.widthRatio<=this.nzWidth&&("inner"!=this.options.zoomType&&this.newvaluewidth>this.newvalueheight&&(this.currentZoomLevel=this.newvaluewidth),"lens"!=this.options.zoomType&&
"inner"!=this.options.zoomType&&(this.changeBgSize=!0,this.zoomLens.css({width:String(this.options.zoomWindowWidth/this.widthRatio)+"px"})),"lens"==this.options.zoomType||"inner"==this.options.zoomType)&&(this.changeBgSize=!0),"inner"==this.options.zoomType&&(this.changeBgSize=!0,this.nzWidth>this.nzHeight&&(this.currentZoomLevel=this.newvaluewidth),this.nzHeight>this.nzWidth&&(this.currentZoomLevel=this.newvaluewidth)));this.setPosition(this.currentLoc)},closeAll:function(){self.zoomWindow&&self.zoomWindow.hide();
self.zoomLens&&self.zoomLens.hide();self.zoomTint&&self.zoomTint.hide()},changeState:function(b){"enable"==b&&(this.options.zoomEnabled=!0);"disable"==b&&(this.options.zoomEnabled=!1)}};d.fn.elevateZoom=function(b){return this.each(function(){var a=Object.create(k);a.init(b,this);d.data(this,"elevateZoom",a)})};d.fn.elevateZoom.options={zoomActivation:"hover",zoomEnabled:!0,preloading:1,zoomLevel:1,scrollZoom:!1,scrollZoomIncrement:0.1,minZoomLevel:!1,maxZoomLevel:!1,easing:!1,easingAmount:12,lensSize:200,
zoomWindowWidth:400,zoomWindowHeight:400,zoomWindowOffetx:0,zoomWindowOffety:0,zoomWindowPosition:1,zoomWindowBgColour:"#fff",lensFadeIn:!1,lensFadeOut:!1,debug:!1,zoomWindowFadeIn:!1,zoomWindowFadeOut:!1,zoomWindowAlwaysShow:!1,zoomTintFadeIn:!1,zoomTintFadeOut:!1,borderSize:4,showLens:!0,borderColour:"#888",lensBorderSize:1,lensBorderColour:"#000",lensShape:"square",zoomType:"window",containLensZoom:!1,lensColour:"white",lensOpacity:0.4,lenszoom:!1,tint:!1,tintColour:"#333",tintOpacity:0.4,gallery:!1,
galleryActiveClass:"zoomGalleryActive",imageCrossfade:!1,constrainType:!1,constrainSize:!1,loadingIcon:!1,cursor:"default",responsive:!0,onComplete:d.noop,onZoomedImageLoaded:function(){},onImageSwap:d.noop,onImageSwapComplete:d.noop}})(jQuery,window,document);

// Instances
$(window).on('load', function() {
	$(".zoom-hover").elevateZoom({
		zoomType : "inner",
		cursor : "crosshair",
		zoomWindowFadeIn : 300,
		zoomWindowFadeOut : 300,
		lensFadeIn : 300,
		lensFadeOut : 300
	});
});
$(window).resize(function() {
	$(".zoom-hover").elevateZoom({
		zoomType : "inner",
		cursor: "crosshair",
		zoomWindowFadeIn: 300,
		zoomWindowFadeOut: 300,
		lensFadeIn: 300,
		lensFadeOut: 300
	});
});

// Image hover Zoom (Round Lens)
$(window).on('load', function() {
	$(".zoom-lens").elevateZoom({
		zoomType : "lens",
		lensShape : "round",
		responsive : true,
		lensSize : 400
	});
});
$(window).resize(function() {
	$(".zoom-lens").elevateZoom({
		zoomType : "lens",
		lensShape : "round",
		lensSize : 400
	});
});