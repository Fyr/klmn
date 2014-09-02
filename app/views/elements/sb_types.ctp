<ul class="nav">
<?
	foreach($aTypes['type_'] as $type) {
?>
	<li id="cat-nav<?=$type['id']?>">
		<a href="javascript:void(0)" onclick="showCategories(<?=$type['id']?>)"><?=$type['title']?></a>
<?
		if (isset($aTypes['type_'.$type['id']])) {
			echo '<ul class="subnav">';
			foreach($aTypes['type_'.$type['id']] as $subtype) {
?>
			<li>
				<a href="/products/?data[filter][Article.object_id]=<?=$subtype['id']?>"><?=$subtype['title']?></a>
			</li>
<?
			}
			echo '</ul>';
		}
?>
	</li>
<?
	}
?>
</ul>
<script type="text/javascript">
function showCategories(id) {
	if ($('#cat-nav' + id + ' a').hasClass('active')) {
		$('#cat-nav' + id + ' a').removeClass('active');
		$('#cat-nav' + id + ' .subnav').slideUp();
	} else {
		$('#cat-nav' + id + ' a').addClass('active');
		$('#cat-nav' + id + ' .subnav').slideDown();
	}
}
</script>