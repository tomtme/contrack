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
	document.getElementById('adddata').addEventListener('change', handleFileSelect, false);
	document.getElementById('datatest').addEventListener('click', function(){document.getElementById("adddata").click();}, false);


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
	document.getElementById('files').innerHTML = '<ul>' + output.join('') + '</ul>';
}
