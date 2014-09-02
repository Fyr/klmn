					<form id="searchForm" name="searchForm" action="/products/index/" method="get">
						<div class="label">Type:</div>
						<select class="autocompleteOff" name="data[filter][Article.object_id]">
							<option value="">- <?__('All types')?> -</option>
<?
	echo $this->element('choose_type', array('aTypes' => $aTypes, 'selected' => $this->PHA->read($aFilter, 'Article\.object_id')));
?>
						</select>
						<div class="label">Brand:</div>
						<select name="data[filter][Article.brand_id]">
							<option value="">- <?__('All brands')?> -</option>
<?
	$options = array();
	foreach($aBrands as $article) {
		$id = $article['Article']['id'];
		$title = $article['Article']['title'];
		$options[$id] = $title;
	}
	echo $this->element('options', array('plugin' => 'core', 'options' => $options, 'selected' => $this->PHA->read($aFilter, 'Article\.brand_id')));
?>
						</select>
						<div class="label">Category:</div>
						<select class="autocompleteOff" name="data[filter][Tag.id]" multiple="multiple" size="3" style="height: auto">
							<!-- option value="">- <?__('All categories')?> -</option -->
<?
	echo $this->element('options', array('plugin' => 'core', 'options' => $aTags, 'selected' => $this->PHA->read($aFilter, 'Tag\.id')));
?>
						</select>
						<div class="clear"></div>
						<div class="submit-wrapper">
							<?=$this->element('button', array('caption' => 'Search', 'onclick' => 'document.searchForm.submit()'))?>
						</div>
					</form>
