				<h2><? __('Welcome to our website!')?></h2>
<p><b><? __('Welcome to the website of Kluytmans Service B.V. , Tilburg, The Netherlands!');?></b></p>
<p><? __('Kluytmans Service B.V. is a prominent professional provider of truck cranes, elevator platforms and agricultural mechanized equipment. Our clients can be found in various sectors of industry. We provide new systems, customization and services. We also buy and sell trucks with cranes, trucks with mounted platforms and agricultural equipment.')?></p>
<?
	if ($aNews) {
?>				
				<div class="box">
					<h3>Hot News</h3>
<?
			$this->ArticleVars->init($aNews[0], $url, $title, $teaser, $src, '150x100', $featured);
?>
					<div class="news-wide">
<?
			if ($src) {
				if ($featured) {
?>
						<div class="tag-featured"></div>
<?
				}
?>
						<a href="<?=$url?>"><img src="<?=$src?>" alt="<?=$title?>" /></a>
<?
			}
?>
						<!--div class="date">26.12.2011</div-->
						<h4><a href="<?=$url?>"><?=$title?></a></h4>
						<p><?=$teaser?></p>
					</div>
					<div class="clear" style="margin-bottom: 10px"></div>
<?
		unset($aNews[0]);
		foreach($aNews as $article) {
			$this->ArticleVars->init($article, $url, $title, $teaser, $src, '70x70');

?>
					<div class="news-half">
<?
			if ($src) {
?>					
						<a href="<?=$url?>"><img src="<?=$src?>" alt="<?=$title?>" /></a>
<?
			}
?>
						<!-- div class="date">26.12.2011</div-->
						<h4><a href="<?=$url?>"><?=$title?></a></h4>
						<p><?=$teaser?></p>
						<div class="clear"></div>
					</div>
<?
		}
?>
					<div class="clear"></div>
				</div>
<?
	}
	if ($aFeaturedProducts2) {
?>
				<div class="box left">
					<h3>Featured products</h3>
<?
		foreach($aFeaturedProducts2 as $article) {
			$this->ArticleVars->init($article, $url, $title, $teaser, $src, '150x100');
?>					
					<a href="<?=$url?>" class="name"><?=$title?></a>
<?
			if ($src) {
?>
					<div class="tag-featured"></div><a href="<?=$url?>"><img src="<?=$src?>" alt="<?=$title?>" /></a>
<?
			}
?>
					<p><?=$teaser?></p>
					<a href="<?=$url?>" class="more"><span><?__('read more');?></span></a>
					<div class="clear"></div>
<?
		}
?>
				</div>
<?
	}
?>
				<div class="box right">
					<h3>Recent products</h3>
<?
	$class = '';
	foreach($aLastProducts as $article) {
		$this->ArticleVars->init($article, $url, $title, $teaser, $src, '70x70');
		if ($src) {
			$class = ($class) ? '' : ' class="l"';
?>
					<a href="<?=$url?>"><img src="<?=$src?>"<?=$class?> alt="<?=$title?>" /></a>
<?
		}
	}
?>
					<div class="clear"></div>
				</div>