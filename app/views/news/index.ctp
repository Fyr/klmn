<h2><? __('News')?></h2>
<?
	foreach($aArticles as $article) {
		$this->ArticleVars->init($article, $url, $title, $teaser, $src, '150x', $featured);		
?>
				<div class="box">
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
						<!-- div class="date">26.12.2011</div -->
						<h4><a href="<?=$url?>"><?=$title?></a></h4>
						<br />
						<p><?=$teaser?></p>
						<a class="more" href="<?=$url?>"><span><?__('read more')?></span></a>
					</div>
					<div class="clear"></div>
				</div>
<?
	}
?>

<?=$this->element('pagination')?>
