// Custom Javascript for satmet/sat_apps_marine_fog/
//========================
// Multiselect sweeper
//========================

// Setup sweeper functionality
$(document).ready(function () {
	$('#data-view-form-1').change(function () {
		// Setup vars
		var leftProduct = $('select[name=ld-1]').val();
		var rightProduct = $('select[name=rd-1]').val();

		// Left image comp switch
		switch (leftProduct) {
			case 'ir':
				$('#left-bsi-image').attr('src', 'media/graphics/band_m15-opacity-100---20250925185304.jpg').attr('alt', 'VIIRS IR 10.3µm channel image over the Arctic from 2025-09-25T18:53');
				break;
			case 'wv':
				$('#left-bsi-image').attr('src', 'media/graphics/cris_6_9-opacity-100---20250925185256.jpg').attr('alt', 'CrIS WV 6.9µm Image from 2025-09-25T18:52');
				break;
			case 'airmass-rgb':
				$('#left-bsi-image').attr('src', 'media/graphics/cris_airmass-opacity-100---20250925185256.jpg').attr('alt', 'CrIS Airmass RGB from 2025-09-25T18:52');
				break;
			case 'so2':
				$('#left-bsi-image').attr('src', 'media/graphics/cris_so2_ash-opacity-100---20250925185256.jpg').attr('alt', 'CrIS SO2/Ash RGB from 2025-09-25T18:52');
				break;

			default:
				//$('#left-bsi-image').attr('src', 'media/graphics/' + leftProduct  + '.jpg').attr('alt', ''); JUST BREAK!
				break;
		}

		// Right image comp switch
		switch (rightProduct) {
			case 'ir':
				$('#right-bsi-image').attr('src', 'media/graphics/band_m15-opacity-100---20250925185304.jpg').attr('alt', 'VIIRS IR 10.3µm channel image over the Arctic from 2025-09-25T18:53');
				break;
			case 'wv':
				$('#right-bsi-image').attr('src', 'media/graphics/cris_6_9-opacity-100---20250925185256.jpg').attr('alt', 'CrIS WV 6.9µm Image from 2025-09-25T18:52');
				break;
			case 'airmass-rgb':
				$('#right-bsi-image').attr('src', 'media/graphics/cris_airmass-opacity-100---20250925185256.jpg').attr('alt', 'CrIS Airmass RGB from 2025-09-25T18:52');
				break;
			case 'so2':
				$('#right-bsi-image').attr('src', 'media/graphics/cris_so2_ash-opacity-100---20250925185256.jpg').attr('alt', 'CrIS SO2/Ash RGB from 2025-09-25T18:52');
				break;

			default:
				//$('#right-bsi-image').attr('src', 'media/graphics/' + rightProduct  + '.jpg').attr('alt', ''); JUST BREAK!
				break;
		}

	}).change();


	// Initialize sweeper for interactive version
	$(document).ready(function(){
		$('.bsi-sweeper').twentytwenty({
			default_offset_pct: 0.5
		});
	});


	// $(".rollover").fancybox({
	// 	'showCloseButton': false
	// }).hover(function () {
	// 	$(this).click();
	// 	$(".fancybox-overlay").mouseout(function () {
	// 		$.fancybox.close();
	// 	});
	// });

});