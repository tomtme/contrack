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
	getRecords('company');
	getRecords('incident');
	getRecords('type');
	document.getElementById("addcompany").addEventListener("click", function() { addRecord("company", "What is the name of the company?"); });
	document.getElementById("addincident").addEventListener("click", function() { addRecord("incident", "What is the incident keyword?"); });
	document.getElementById("addtype").addEventListener("click", function() { addRecord("type", "What is the new type?"); });

	document.getElementById('adddata').addEventListener('change', handleFileSelect, false);


}

/*This function should take care of incoming files. 
*
*/
function handleFileSelect(evt) {
	var files = evt.target.files; // FileList object

	// files is a FileList of File objects. List some properties.
	var output = [];
	for (var i = 0, f; f = files[i]; i++) {
		output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
								f.size, ' bytes, last modified: ',
								f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
								'</li>');
	}
	document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
}


/* This function will get and refresh the company drop down box.
 *
 */
function getRecords(record){
	$('#'+record).html('');
	var url = OC.generateUrl('/apps/contrack/read');
	$.post(url,
	{ data: record},
	function(dataRecord) {
		$.each(dataRecord, function(index, text) {
	    $('#'+record).append(
	        $('<option></option>').val(text.id).html(text.name)
	    );
	  });	}
);
	return true;
}

function addRecord(record, prompt){
	var name = window.prompt(prompt);
	var url = OC.generateUrl('/apps/contrack/create');
	$.post(url,
	{ data: record, name: name },
	  function() {
	    getRecords(record);
		}
	);
	return true;
}
