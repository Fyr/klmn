<?
class ArticleVarsHelper extends AppHelper {
	var $helpers = array('media.PHMedia');
	
	function init($aArticle, &$url, &$title, &$teaser, &$src, $size, &$featured = false) {
		$url = '/'.$aArticle['Article']['object_type'].'/view/'.$aArticle['Article']['id'];
		$title = $aArticle['Article']['title'];
		$teaser = $aArticle['Article']['teaser'];
		$src = '';
		$featured = false;
		if (isset($aArticle['Media'][0])) {
			$media = $aArticle['Media'][0];
			$src = $this->PHMedia->getUrl($media['object_type'], $media['id'], $size, $media['file'].$media['ext']);
			$featured = $aArticle['Article']['featured'];
		}
	}
}
