<?
class PagesController extends SiteController {
	var $name = 'Pages';
	var $helpers = array('articles.HtmlArticle', 'ArticleVars');
	var $uses = array('articles.Article', 'SiteNews');

	function home() {
		/*
		$aFeaturedNews = $this->Article->find('first', array(
			'conditions' => array('Article.object_type' => 'news', 'Article.published' => 1, 'Article.featured' => 1),
			'order' => 'Article.created DESC'
		));
		
		$exceptID = 0;
		$limit = 2;
		if ($aFeaturedNews) {
			$exceptID = $aFeaturedNews['Article']['id'];
		} else {
			$limit = 3;
		}
		$aNews = $this->Article->find('all', array(
			'conditions' => array('Article.object_type' => 'news', 'Article.published' => 1, 'Article.id <>' => $exceptID),
			'order' => 'Article.created DESC',
			'limit' => $limit
		));
		if ($aNews && !$aFeaturedNews) {
			$aFeaturedNews = $aNews[0];
			array_shift($aNews);
		}
		$this->set('aFeaturedNews', $aFeaturedNews);
		*/
		$conditions = array('Article.object_type' => 'news', 'Article.published' => 1);
		if ($this->aEvents) {
			$conditions['Article.id <> '] = $this->aEvents[0]['Article']['id'];
		}
		$aNews = $this->Article->find('all', array(
			'conditions' => $conditions,
			'order' => array('Article.featured DESC', 'Article.created DESC'),
			'limit' => 3
		));
		$this->set('aNews', $aNews);
		
		$aID = array();
		foreach($this->aFeaturedProducts as $article) {
			$aID[] = $article['Article']['id'];
		}
		$aFeaturedProducts = $this->Article->find('all', array(
			'conditions' => array('Article.object_type' => 'products', 'Article.featured' => 1, 'Article.published' => 1, 'NOT' => array('Article.id' => $aID)),
			'order' => 'Article.created DESC',
			'limit' => 3
		));
		
		$this->set('aFeaturedProducts2', $aFeaturedProducts);
		
		$aID = array();
		foreach($aFeaturedProducts as $row) {
			$aID[] = $row['Article']['id'];
		}
		$aLastProducts = $this->Article->find('all', array(
			'conditions' => array('Article.object_type' => 'products', 'Article.published' => 1, 'NOT' => array('Article.id' => $aID)),
			'order' => 'Article.created DESC',
			'limit' => 8
		));
		$this->set('aLastProducts', $aLastProducts);
	}
	/*
	function show($pageID) {
		$pageID = str_replace('.html', '', $pageID);
		$aArticle = $this->Article->findByPage_id($pageID);
		$this->set('aArticle', $aArticle);
		
		$this->aBreadCrumbs = array('/' => 'Главная', $aArticle['Article']['title']);
	}
	*/
	function customers() {
		$this->currMenu = 'products';
		$this->aBreadCrumbs = array('/' => 'Home', '/products/' => 'Products', 'For our customers');
	}
	
	function history() {
		$this->currMenu = 'about';
		$this->aBreadCrumbs = array('/' => 'Home', '/pages/mission' => 'About', 'History');
	}
	
	function mission() {
		$this->currMenu = 'about';
		$this->aBreadCrumbs = array('/' => 'Home', '/pages/mission' => 'About', 'Our mission');
	}
	
	function partners() {
		$this->currMenu = 'partner';
		$this->aBreadCrumbs = array('/' => 'Home', 'Dealers');
	}
	
	function roadmap() {
		$this->currMenu = 'contacts';
		$this->aBreadCrumbs = array('/' => 'Home', '/contacts/' => 'Contacts', 'Roadmap');
	}
	
	function sales() {
		$this->currMenu = 'contacts';
		$this->aBreadCrumbs = array('/' => 'Home', '/contacts/' => 'Contacts', 'Contact us');
	}
	
	function inprogress() {
	}

	function nonExist() {
	}
}
