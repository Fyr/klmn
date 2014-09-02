<?
	$url = '/news/view/'.$article['Article']['id'];
	$title = $article['Article']['title'];
	$body = $article['Article']['teaser'];
	$class2 = ' class="no_image"';
	if (isset($article['Media'][0])) {
		$class2 = '';
		$media = $article['Media'][0];
		$src = $this->PHMedia->getUrl($media['object_type'], $media['id'], '85x', $media['file'].$media['ext']);
?>
					<a href="<?=$url?>">
						<img src="<?=$src?>" alt="<?=$title?>" />
					</a>
<?
	}
?>
					<p<?=$class2?>><?=$body?></p>
					<div class="clear2"></div>
					<a href="<?=$url?>" class="more"><span>learn more</span></a>