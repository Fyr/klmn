<?
class ProductsController extends SiteController {
	const PER_PAGE = 8;
	
	var $components = array('articles.PCArticle', 'grid.PCGrid');
	var $helpers = array('core.PHA', 'core.PHCore', 'Time', 'core.PHTime', 'articles.HtmlArticle', 'ArticleVars');
	var $uses = array('category.Category', 'articles.Article', 'media.Media', 'seo.Seo', 'SiteArticle', 'SiteProduct', 'params.Param', 'params.ParamObject', 'params.ParamValue', 'tags.TagObject');
	
	function index() {
		$this->grid['SiteProduct'] = array(
			'conditions' => array('Article.object_type' => 'products', 'Article.published' => 1),
			'fields' => array('Article.object_type', 'Article.title', 'Article.teaser', 'Article.featured'),
			'order' => array('Article.featured' => 'desc', 'Article.sorting' => 'asc'),
			'limit' => self::PER_PAGE
		);
		
		$aFilters = $this->_getFilters();
		$this->grid['SiteProduct']['conditions'] = array_merge($this->grid['SiteProduct']['conditions'], $aFilters['conditions']);
		
		$aArticles = $this->PCGrid->paginate('SiteProduct');
		$this->set('aArticles', $aArticles);
		$this->set('aFilters', $aFilters);
		
		$this->aBreadCrumbs = array('/' => 'Home', 'Products');
		$page_title = __('Products', true);
		
		if (isset($this->params['url']['data']['filter']['type_id']) && $this->params['url']['data']['filter']['type_id']) {
			$categoryID = $this->params['url']['data']['filter']['type_id'];
			$category = $this->Category->findById($categoryID);
			$page_title = $category['Category']['title'];
			$this->aBreadCrumbs = array('/' => 'Home', '/products/' => 'Products', $page_title); // '/products/?data[filter][type_id]='.$categoryID => 
		} elseif (isset($this->params['url']['data']['filter']['Article.object_id']) && $this->params['url']['data']['filter']['Article.object_id']) {
			$subcategoryID = $this->params['url']['data']['filter']['Article.object_id'];
			$subcategory = $this->Category->findById($subcategoryID);
			$categoryID = $subcategory['Category']['object_id'];
			$category = $this->Category->findById($categoryID);
			
			$page_title = $subcategory['Category']['title'];
			$this->aBreadCrumbs = array('/' => 'Home', '/products/' => 'Products', '/products/?data[filter][type_id]='.$categoryID => $category['Category']['title'], $page_title); // 
		}
		$this->set('page_title', $page_title);
	}

	function view($id) {
		$aArticle = $this->SiteProduct->findById($id);
		if (!$aArticle) {
			$this->redirect('/404.html');
		}
		
		unset($aArticle['Media']);
		$aArticle['Media'] = $this->Media->getMedia('Article', $aArticle['Article']['id']);
		$this->set('aArticle', $aArticle);
		
		$this->pageTitle = (isset($aArticle['Seo']['title']) && $aArticle['Seo']['title']) ? $aArticle['Seo']['title'] : $aArticle['Article']['title'];
		$this->data['SEO'] = $aArticle['Seo'];
/*
		$aParams = $this->Param->getParamsList($this->ParamObject->getBinded('ProductParam', $aArticle['Article']['object_id']));
		$this->set('aParams', $aParams);
		*/
		$this->set('aParamValues', $this->ParamValue->getValueOptions('ProductParam', $id));
		$aSimilar = $this->SiteProduct->find('all', array(
			'conditions' => array('Article.object_type' => 'products', 'Article.published' => 1, 'Article.object_id' => $aArticle['Article']['object_id'], 'Article.id <> ' => $id)
		));
		$this->set('aSimilar', $aSimilar);
		
		$subcategory = $aArticle['Category'];
		$categoryID = $subcategory['object_id'];
		$category = $this->Category->findById($categoryID);
		
		$this->aBreadCrumbs = array('/' => 'Home', '/products/' => 'Products', '/products/?data[filter][type_id]='.$categoryID => $category['Category']['title'], __('View product', true)); // 
	}
	
	private function _getFilters() {
		$filtersData = (isset($this->params['url']['data']['filter'])) ? $this->params['url']['data']['filter'] : array();
		$aConditions = array();
		$aURL = array();
		foreach($filtersData as $key => $value) {
			if ($value !== '') {
				if (is_array($value)) {
					foreach($value as $value1) {
						$aURL[] = 'data[filter]['.$key.'][]='.$value1;
					}
				} else {
					$aURL[] = 'data[filter]['.$key.']='.$value;
				}
				
				if ($key == 'type_id') {
					$aSubtypes = $this->Category->find('list', array('conditions' => array('Category.object_id' => $value)));
					$aConditions['Article.object_id'] = array_keys($aSubtypes);
				} elseif ($key == 'Tag.id') {
					$aRows = $this->TagObject->find('list', array('fields' => array('TagObject.object_id', 'TagObject.object_type'), 'conditions' => array('TagObject.tag_id' => $value)));
					$aConditions['Article.id'] = array_keys($aRows);
				/*
				if ($key == 'pricelist') {
					$aConditions['pricelist <> '] = '""';
					$aConditions['tarif > '] = 1;
					// $aConditions[] = 'paid';
				} elseif ($key == 'paytype_id') {
					if (is_array($value)) {
						foreach($value as $paytype_id) {
							$cond = '(SELECT DISTINCT 1 FROM cat_paytypes AS CatPaytype WHERE CatPaytype.catalog_id = Catalog.id AND CatPaytype.paytype_id = '.$paytype_id.')';
							$aConditions[] = $cond;
						}
					}
				} elseif ($key == 'subsection_id') {
					$cond = '(SELECT DISTINCT 1 FROM cat_services AS CatService WHERE CatService.catalog_id = Catalog.id AND CatService.subsection_id = '.$value.')';
					$aConditions[] = $cond;
				} elseif($key == 'section_id') {
					$cond = '(SELECT DISTINCT 1 FROM cat_services AS CatService JOIN cat_subsections AS CatSubsection ON CatSubsection.id = CatService.subsection_id WHERE CatService.catalog_id = Catalog.id AND CatSubsection.section_id = '.$value.')';
					$aConditions[] = $cond;
					*/
				} else {
					$aConditions[$key] = $value;
				}
			}
		}
		return array('conditions' => $aConditions, 'url' => implode('&', $aURL));
	}

}
