// require('./bootstrap');
require('./jquery-3.6.0.min.js');
require('./bootstrap.bundle.min.js');

import $ from './jquery-3.6.0.min.js';
window.$ = window.jQuery = $;

$(document).ready(function () {
	// console.log($("#schedules_table").html());
	$('#schedules_table').collapse({
		toggle: false
	  })
	// jQuery('#schedules_table').collapse();
});