<?
class TestsController extends AppController {
	var $helpers = array();
	var $uses = array('media.Media', 'tags.TagObject', 'articles.Article', 'SiteProduct');
	var $layout = 'empty';

	function beforeFilter() {
		echo '<html>';
		echo '<head>';
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		echo '</head>';
		echo '<body>';
	}

	function beforeRender() {
		echo '</body>';
		echo '</html>';
		exit;
	}

	function showA($a) {
		echo '<div align="left">'.nl2br(str_replace("  ", "&nbsp;&nbsp;", htmlspecialchars(print_r($a, true)))).'</div>';
	}

	function index() {
		$this->showA($this->SiteProduct->paginate('SiteProduct', array(
			'fields' => array('Article.modified', 'Brand.title', 'Category.title', 'Article.title', 'Article.featured', 'Article.published'), 
			'conditions' => array('Article.object_type' => 'products'))
		));
		// $this->showA($this->SiteArticle->find('all', array('conditions' => array('Article.id >= ' => 184), 'limit' => 2)));
		/*
		$modelName = 'TestArticle';
		$method = 'find';
		$this->loadModel($modelName);
		$this->showA($this->$modelName->$method('all'));
		*/
		// echo $this->Media->getUrl('article', 178, '100x', 'image.jpg.gif');
		// $path = '/home/fyre/domains/mcasterlive.ru/public_html/app/webroot/files/article/2/209/';
		/*
		$this->showA(
			$this->TagObject->find('all', array(
				'fields' => array('object_type', 'object_id', 'COUNT(*) as count'),
				'conditions' => array('tag_id' => array(4, 5, 6), 'NOT' => array(array('object_type' => 'Article', 'object_id' => 729))),
				'group' => array('object_type', 'object_id'),
				'order' => 'count DESC'
			))
		);
		*/
		/*
		App::import('Vendor', 'path', array('file' => '../plugins/core/vendors/path.php'));
		
		$path = 'D:/Projects/mcasterlive.dev/wwwroot/app/webroot/files/article/1/181/';
		$aPath = getPathContent($path);
		
		$this->showA($aPath);
		foreach($aPath['files'] as $file) {
			echo $aPath['path'].$file.'<br/>';
			unlink($aPath['path'].$file);
		}
		rmdir($path);
		*/
		// $this->showA($this->Comment->find('all', array('fields' => array('object_type', 'object_id', 'COUNT(*) AS comment_count'), 'conditions' => array('Comment.id' => array(1, 2, 3, 4)), 'group' => array('object_type', 'object_id'))));
	}

	function server() {
		$this->showA($_SERVER);
	}

	function session() {
		// $this->showA($this->Session);
		$this->showA($_SESSION);
		//unset($_SESSION['Message']);
	}

	function cookies() {
		$this->showA($_COOKIE);
	}
}