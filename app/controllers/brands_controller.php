<?
class BrandsController extends SiteController {
	var $components = array('articles.PCArticle');
	var $helpers = array('core.PHA', 'Time', 'core.PHTime', 'articles.HtmlArticle');
	var $uses = array('articles.Article', 'media.Media', 'seo.Seo', 'Brand');
	
	function index() {
		$aArticles = $this->Brand->find('all', array('conditions' => array('Brand.object_type' => 'brands', 'published' => 1), 'order' => 'sorting'));
		$this->set('aArticles', $aArticles);
		$this->aBreadCrumbs = array('/' => 'Home', 'Brands');
	}

	function view($id) {
		$aArticle = $this->Brand->findById($id);
		$aArticle['Article'] = $aArticle['Brand'];
		$this->set('aArticle', $aArticle);
		
		$this->pageTitle = (isset($aArticle['Seo']['title']) && $aArticle['Seo']['title']) ? $aArticle['Seo']['title'] : $aArticle['Article']['title'];
		$this->data['SEO'] = $aArticle['Seo'];
		
		$this->aBreadCrumbs = array('/' => 'Home', '/brands/' => 'Brands', 'View brand');
	}
}
