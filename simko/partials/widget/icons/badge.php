<?

$brand = is_brand();
// Dietmeier || Chapman
if(in_array($brand->ID,[13032, 13590])) {
	$text = 'Flexible 0% interest financing';
}
?>
<div class="widget badge">
	<div class="icon-container">
		<div>
			<i class="icon-badge smaller top-left"></i>
			<i class="icon-badge larger active"></i>
			<i class="icon-badge smaller bottom-right"></i>
		</div>
	</div>
	<p><?= !empty($text) ? $text : (!empty($content) ? $content : 'Flexible $0 down <br class="desktop">&amp; 0% interest financing'); ?></p>
</div>
