/**
 * ownCloud - Contrack
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Tom Tijerina <tom@tomt.me>
 * @copyright Tom Tijerina 2015
 */

window.addEventListener("load", initialize);

//function is ran after page is loaded.
function initialize(){
	document.getElementById("addcompany").addEventListener("click",addCompany);
	getData('company');

}

/* This function will get and refresh the company drop down box.
 *
 */
function getData($data){
	$('#'+$data).html('');
	$.getJSON("ajax/"+$data, function(data){
	  $.each(data, function(index, text) {
			window.alert('Im here\n' + index + '\n' + name);
	    $('#'+$data).append(
	        $('<option></option>').val(index).html(text)
	    );
	  });
	});

}
function addCompany(){
	var name = window.prompt("Company to add?");
	//use JSON to add the company here. Once that is complete, call getCompany
	getData('company');
	return true;
}
(function ($, OC) {

	$(document).ready(function () {
		$('#hello').click(function () {
			alert('Hello from your script file');
		});

		$('#echo').click(function () {
			var url = OC.generateUrl('/apps/contrack/echo');
			var data = {
				echo: $('#echo-content').val()
			};

			$.post(url, data).success(function (response) {
				$('#echo-result').text(response.echo);
			});

		});
	});

})(jQuery, OC);
