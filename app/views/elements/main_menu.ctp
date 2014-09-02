<ul>
<?
	foreach($aMenu as $class => $menu) {
?>
	<li>
		<a class="<?=$class.(($class == $currMenu) ? ' active' : '')?>" href="<?=$menu['href']?>"></a>
<?
		if (isset($menu['submenu'])) {
?>
		<ul>
<?
			foreach($menu['submenu'] as $i => $submenu) {
				$class = (($i + 1) == count($menu['submenu'])) ? ' class="last"' : '';
?>
			<li<?=$class?>><a href="<?=$submenu['href']?>"><?=$submenu['title']?></a></li>
<?
			}
?>
		</ul>
<?
		}
?>
	</li>
<?
	}
?>
</ul>
