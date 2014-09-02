<?
class NewsController extends SiteController {
	const PER_PAGE = 5;
	
	// var $name = 'news';
	var $components = array('articles.PCArticle', 'grid.PCGrid');
	var $helpers = array('core.PHA', 'Time', 'core.PHTime', 'articles.HtmlArticle', 'ArticleVars');
	var $uses = array('articles.Article', 'media.Media', 'seo.Seo', 'SiteNews');
	
	function index() {
		$this->grid['SiteNews'] = array(
			'conditions' => array('Article.object_type' => 'news', 'Article.published' => 1),
			'fields' => array('Article.object_type', 'Article.title', 'Article.teaser', 'Article.featured'),
			'order' => array('Article.created' => 'desc'),
			'limit' => self::PER_PAGE
		);
		
		$aArticles = $this->PCGrid->paginate('SiteNews');
		// fdebug($aArticles);
		$this->set('aArticles', $aArticles);
		
		$this->aBreadCrumbs = array('/' => 'Home', 'News');
	}

	function view($id) {
		$aArticle = $this->PCArticle->view($id);
		$this->set('aArticle', $aArticle);
		
		$this->pageTitle = (isset($aArticle['Seo']['title']) && $aArticle['Seo']['title']) ? $aArticle['Seo']['title'] : $aArticle['Article']['title'];
		$this->data['SEO'] = $aArticle['Seo'];
		
		$this->aBreadCrumbs = array('/' => 'Home', '/news/' => 'News', 'View article');
	}
}
