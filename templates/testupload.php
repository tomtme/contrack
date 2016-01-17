<?php
script('contrack', 'upload');
style('contrack', 'style');
?>

<div id="app">
	<div id="app-navigation">
		<?php print_unescaped($this->inc('part.navigation')); ?>
	</div>

	<div id="app-content">
		<div id="app-content-wrapper">
			<form action="upload" method="post" enctype="multipart/form-data">
					<input type="file" name="data" id="data"><br>
					<input type="hidden" name="filename" id="filename" value="testfile">
					<input type="submit" value="Upload File" name="submit">
			</form>
			<br><br>
<br><br><br>
			<table border="0">
				<tr><td>Type:</td>			<td><select id="type"></select></td>			<td><button id="addtype">+</button></td></tr>
				<tr><td>Data:</td>			<td><select id="data"></select></td>			<td><button id="datatest" type="file" name="files[]" multiple />+</button></td></tr>
			</table>						<input style='height: 0px;width:0px; overflow:hidden;'type="file" id="adddata" name="files[]" multiple />
			<div id="files"></div>
				<p>			TODO:
				<p>			Upload file, have filename changed to something sensible based on the information available, but that won't change.
				<p>			Maybe Date_IncidentID.ext, if duplicates DATE_IncidentID-1.ext, etc.
				<p>			In system to ensure that one file can be used for multiple incident ID's or companys ETC, refernce by FileID.
				<p>
				<p>			FileTable:
				<p>			FileID, UserID, FileName, FriendlyName, Hash
				<p>
				<p>			Hash, Can be used to ensure no duplicate files exist.
				<p>			FriendlyName may or may not be better in another table as one file may be referenced for two different reasons. But a friendlyname would be like "USPS return reciept"
				<p>			FileName would be 2016_01_15-Clearwater_Police_Ticket.pdf
				<p>			FileID and UserID are automatically generated.
				<p>
				<p>
				<p>			*Ability to upload multiple files, and then each one is put in a list where you can select what kind of file they are.
<br><br><br>
									<p>			Need to add storage, or files, or file to the top, and also have it auto included. Then need to figure out what namespace to use and include that to make it go.

									<p>			After the ability to upload files is in place, use this:
									<p>			<b>http://www.html5rocks.com/en/tutorials/file/dndfiles/</b>
									<p>			And as you add a new file, or upload multiple files use ajax to upload them all, and show a little upload meter next to them as they go.
									<p>			After they are done uploading, allow the ability to save the contact record.
					<br>

		</div>
	</div>
</div>
