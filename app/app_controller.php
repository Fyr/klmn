<?php
class SiteController extends AppController {
	// var $uses = array('articles.Article', 'SiteArticle');
	var $uses = array('category.Category');
	var $aFeaturedProducts, $aEvents;
	
	// ---------------------
	// Custom variables
	// ---------------------
	function beforeFilter() {
		//Configure::write('Config.language', 'rus');
		//Security::setHash("md5");
		//$this->Auth->allow();
		$this->beforeFilterMenu();
		$this->beforeFilterLayout();
	}
	
	/**
	 * Common code for setting up current menus and bottom links (for all controllers)
	 * Variables set here will be used when menus will be rendering
	 */
	function beforeFilterMenu() {
		$this->currMenu = ($this->params['controller'] == 'pages' || $this->params['controller'] == 'userarea') ? $this->params['action'] : $this->params['controller'];
		$this->currLink = $this->currMenu;
	}
	
	/**
	 * Common code for layout (for all controllers)
	 * Variables set here will be used when layout will be rendering
	 */
	function beforeFilterLayout() {
		// Code for layout
		$this->loadModel('articles.Article');
		$this->loadModel('SiteArticle');
		
		$this->Article = $this->SiteArticle;
		
		$this->aFeaturedProducts = $this->SiteArticle->getRandomRows(3, array('Article.object_type' => 'products', 'Article.featured' => 1, 'Article.published' => 1));
		$this->set('aFeaturedProducts', $this->aFeaturedProducts);
		
		$this->aEvents = $this->Article->getRandomRows(1, array('Article.object_type' => 'news', 'Article.featured' => 1, 'Article.published' => 1));
		$this->set('upcomingEvent', ($this->aEvents) ? $this->aEvents[0] : false);
	}

	function beforeRender() {
		$this->beforeRenderMenu();
		$this->beforeRenderLayout();
	}
	
	/**
	 * Override code here for layout in specific controller 
	 *
	 */
	function beforeRenderLayout() {
		$this->set('errMsg', $this->errMsg);
		$this->set('aErrFields', $this->aErrFields);
		$this->set('aBreadCrumbs', $this->aBreadCrumbs);
		
		$brands = $this->Article->find('all', array('conditions' => array('Article.object_type' => 'brands', 'Article.published' => 1)));
		$aBrands = array();
		foreach($brands as $article) {
			if (isset($article['Media'][0])) {
				$aBrands[] = $article;
			}
		}
		$this->set('aBrands', $aBrands);
		
		$aFilter = array();
		if (isset($this->params['url']['data']['filter']['Article.object_id']) && $this->params['url']['data']['filter']['Article.object_id']) {
			$aFilter['Article.object_id'] = $this->params['url']['data']['filter']['Article.object_id'];
		}
		if (isset($this->params['url']['data']['filter']['Article.brand_id']) && $this->params['url']['data']['filter']['Article.brand_id']) {
			$aFilter['Article.brand_id'] = $this->params['url']['data']['filter']['Article.brand_id'];
		}
		if (isset($this->params['url']['data']['filter']['Tag.id']) && $this->params['url']['data']['filter']['Tag.id']) {
			$aFilter['Tag.id'] = $this->params['url']['data']['filter']['Tag.id'];
		}
		$this->set('aFilter', $aFilter);
		
		$this->loadModel('tags.Tag');
		$aTags = $this->Tag->find('list');
		$this->set('aTags', $aTags);
		
		$this->loadModel('categories.Category');
		$types = $this->Category->find('all', array(
			'conditions' => array('Category.object_type' => 'products'),
			'order' => 'object_id'
		));
		$aTypes = array();
		foreach($types as $type) {
			$aTypes['type_'.$type['Category']['object_id']][] = $type['Category'];
		}
		$this->set('aTypes', $aTypes);
		
		foreach($aTypes['type_'] as $type) {
			$this->aMenu['products']['submenu'][] = array('href' => '/products/?data[filter][type_id]='.$type['id'], 'title' => $type['title']);
		}
		$this->set('aMenu', $this->aMenu);
	}

}

class AppController extends Controller {
	// var $components = array('Auth');
	var $helpers = array('Html', 'Time', 'core.PHTime', 'core.PHA', 'media.PHMedia', 'Router'); // , 'Mybbcode', 'Ia'
	
	var $errMsg = '';
	var $aErrFields = array();

	var $homePage = array('title' => 'Главная', 'img' => 'main.gif', 'href' => '/');
	var $currMenu = '', $currLink;
	
	var $pageTitle;
	
	var $aMenu = array(
		'home' => array('href' => '/'),
		'news' => array('href' => '/news/'),
		'products' => array('href' => '/products/', 'submenu' => array(
			/*array('href' => '/pages/customers', 'title' => 'For our customers')*/
		)),
		'brands' => array('href' => '/brands/'),
		'about' => array('href' => '/pages/mission', 'submenu' => array(
			array('href' => '/pages/history', 'title' => 'History'),
			array('href' => '/pages/mission', 'title' => 'Our mission')
		)),
		'partner' => array('href' => '/pages/partners'),
		'contacts' => array('href' => '/contacts/', 'submenu' => array(
			array('href' => '/pages/roadmap', 'title' => 'Roadmap'),
			array('href' => '/pages/sales', 'title' => 'Contact us'),
			array('href' => '/contacts/', 'title' => 'Send message')
		))
	);
	
	var $aBottomLinks = array(
		'Home' => array('href' => '/'),
		'News' => array('href' => '/news/'),
		'Products' => array('href' => '/products/'),
		'Brands' => array('href' => '/brands/'),
		'About us' => array('href' => '/pages/mission'),
		'Our mission' => array('href' => '/pages/mission'),
		'Dealers' => array('href' => '/pages/partners'),
		'Roadmap' => array('href' => '/pages/roadmap'),
		'Send message' => array('href' => '/contacts/')
	);
	var $aBreadCrumbs = array();

	/**
	 * Override code here for menus in specific controller 
	 *
	 */
	function beforeRenderMenu() {
		$this->pageTitle = ($this->pageTitle) ? $this->pageTitle.' - '.SEO_SUFFIX : SEO_SUFFIX;
		
		$this->set('pageTitle', $this->pageTitle);
		
		$this->set('aMenu', $this->aMenu);
		$this->set('currMenu', $this->currMenu);

		$this->set('aBottomLinks', $this->aBottomLinks);
		$this->set('currLink', $this->currLink);

		$this->set('homePage', $this->homePage);
		$this->set('isHomePage', $this->isHomePage());
		
		$this->errMsg = (is_array($this->errMsg)) ? implode('<br/>', $this->errMsg) : $this->errMsg;
		if ($this->errMsg) {
			$this->errMsg = '<br/>'.$this->errMsg.'<br/><br/>';
		}
		$this->set('errMsg', $this->errMsg);
		$this->set('aBreadCrumbs', $this->aBreadCrumbs);
	}

	function isHomePage() {
		return $this->params['url']['url'] == '/' || $this->params['url']['url'] == 'pages/home';
	}

}
