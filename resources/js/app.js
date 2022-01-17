// require('./bootstrap');
require('./jquery-3.6.0.min.js');
import $ from './jquery-3.6.0.min.js';
window.$ = window.jQuery = $;

require('./bootstrap.bundle.min.js');
require('./jquery.bxslider.min.js');

$(document).ready(function () {
	$('#schedules-table').collapse({
		toggle: false
	  });
	$('#gallery-slider').bxSlider({
		mode: 'fade',
		captions: true,
		randomStart: true,
	});

});