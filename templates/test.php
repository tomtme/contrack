<?php
script('contrack', 'script');
style('contrack', 'style');
?>

<div id="app">
	<div id="app-navigation">
		<?php print_unescaped($this->inc('part.navigation')); ?>
		<?php print_unescaped($this->inc('part.settings')); ?>
	</div>

	<div id="app-content">
		<div id="app-content-wrapper">
			<table border="0">
				<tr><td>Company:</td>		<td><select id="company"></select></td>		<td><button id="addcompany">+</button></td></tr>
				<tr><td>Type:</td>			<td><select id="type"></select></td>			<td><button id="addtype">+</button></td></tr>
				<tr><td>Date:</td>			<td><select id="date"></select></td>			<td></td></tr>
				<tr><td>Incident:</td>	<td><select id="incident"></select></td>	<td><button id="addincident">+</button></td></tr>
				<tr><td>Data:</td>			<td><select id="data"></select></td>			<td><button id="adddata">+</button></td></tr>
			</table>
			Drop down box selects which type to add, after clicking, click Add. Below it is added.<br>
			Data1 option (Allows to name it, and add/edit/append data, or remove it)<br>
		</div>
	</div>
</div>
