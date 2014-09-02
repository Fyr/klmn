<?
class RouterHelper extends AppHelper {
	var $helpers = array('articles.PHTranslit');
	
	function url($aArticle) {
		/*
		if ($aArticle['Article']['object_type'] == 'pages') {
			return '/pages/show/'.$aArticle['Article']['page_id'];
		}
		*/
		$dir = $this->getDir($aArticle['Article']['object_type']);
		$id = ($aArticle['Article']['page_id']) ? $aArticle['Article']['page_id'] : $aArticle['Article']['id'];
		
		if ($aArticle['Article']['object_type'] == 'photos') {
			return $dir.$id.'.html';
		}
		
		if ($aArticle['Article']['object_type'] == 'pages') {
			$category = 'show';
		} else {
			$category = (isset($aArticle['Category']['id']) && $aArticle['Category']['title']) ? $this->PHTranslit->convert($aArticle['Category']['title'], true).'-'.$aArticle['Category']['id'] : 'empty';
		}
		return $dir.$category.'/'.$id.'.html';
	}
	
	function catUrl($objectType, $aCategory = null) {
		$category = (isset($aCategory['id']) && $aCategory['title']) ? $aCategory['title'] : '';
		$dir = $this->getDir($objectType);
		$url = $dir.$this->PHTranslit->convert($category, true).'-'.$aCategory['id'].'/';
		return ($category) ? $url : $dir;
	}
	
	function getDir($objectType = 'articles') {
		$aDir = array(
			'articles' => 'article',
			'photos' => 'photo',
			'videos' => 'video'
		);
		$dir = (isset($aDir[$objectType])) ? $aDir[$objectType] : $objectType;
		return '/'.$dir.'/';
	}

	function transformPageParams($objectType, $url) {
		$category = (isset($this->params['category']) && $this->params['category']) ? $this->params['category'].'/' : '';
		$url = str_replace('/article/', $this->getDir($objectType), $url);
		return str_replace('page/1', '', str_replace('index/', $category, str_replace('page:', 'page/', $url)));
	}
}
