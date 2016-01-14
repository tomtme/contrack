<?php
script('contrack', 'script');
style('contrack', 'style');
?>

<div id="app">
	<div id="app-navigation">
		<?php print_unescaped($this->inc('part.navigation')); ?>
	</div>

	<div id="app-content">
		<div id="app-content-wrapper">
			<table border="0">
				<tr><td>Type:</td>			<td><select id="type"></select></td>			<td><button id="addtype">+</button></td></tr>
				<tr><td>Data:</td>			<td><select id="data"></select></td>			<td><button id="adddata">+</button></td></tr>
			</table>
			TODO:
			Upload file, have filename changed to something sensible based on the information available, but that won't change.
				Maybe Date_IncidentID.ext, if duplicates DATE_IncidentID-1.ext, etc.
				In system to ensure that one file can be used for multiple incident ID's or companys ETC, refernce by FileID.

				FileTable:
				FileID, UserID, FileName, FriendlyName

				FriendlyName may or may not be better in another table as one file may be referenced for two different reasons. But a friendlyname would be like "USPS return reciept"
				FileName would be 2016_01_15-Clearwater_Police_Ticket.pdf
				FileID and UserID are automatically generated.
		</div>
	</div>
</div>
