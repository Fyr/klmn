<h2><? __('Brands')?></h2>
<?
	foreach($aArticles as $article) {
		$url = '/brands/view/'.$article['Brand']['id'];
		$title = $article['Brand']['title'];
		$teaser = $article['Brand']['teaser'];
?>
				<div class="box">
					<div class="news-wide">
<?
		if (isset($article['Media'][0])) {
			$media = $article['Media'][0];
			$src = $this->PHMedia->getUrl($media['object_type'], $media['id'], '150x', $media['file'].$media['ext']);
?>
						<a href="<?=$url?>"><img src="<?=$src?>" alt="<?=$title?>" /></a>
<?
		}
?>
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