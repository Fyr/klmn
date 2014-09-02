<?
	echo $this->element('sbl_block', array('class' => 'types', 'content' => $this->element('sb_types')));
	if ($upcomingEvent) {
		echo $this->element('sbl_block', array('class' => 'news', 'content' => $this->element('sb_news', array('article' => $upcomingEvent))));
	}
	echo $this->element('sbl_block', array('class' => 'search', 'content' => $this->element('sb_search')));
	if ($aFeaturedProducts) {
		echo $this->element('sbl_block', array('class' => 'products', 'content' => $this->element('sb_products')));
	}
?>
