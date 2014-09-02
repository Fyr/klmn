<h2><?=$pageTitle?></h2>
<?
	$aActions = array(
		'table' => array(
			$this->element('icon_add', array('plugin' => 'core', 'href' => '/admin/articlesEdit/Article.object_type:'.$objectType)),
			array('grid_table_showfilter', array('plugin' => 'grid'))
		),
		'row' => array(
			$this->element('icon_edit', array('plugin' => 'core', 'href' => '/admin/articlesEdit/{$id}')),
			array('grid_row_del', array('plugin' => 'grid')),
			array('article_rowaction_preview', array('plugin' => 'articles'))
		)
	);
?>
<?=$this->PHGrid->render('SiteArticle', $aActions)?>