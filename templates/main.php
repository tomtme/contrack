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
			<p>Hello World <?php p($_['user']) ?></p>
		</div>
	</div>
</div>
