<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?=$pageTitle?></title>
	<meta name="language" content="en" />
<?=$this->element('seo_info', array('plugin' => 'seo', 'data' => $this->PHA->read($this->data, 'SEO')))?>
<?=$this->Html->charset()?>
<?=$this->Html->css(array('global', 'logos-move', 'additional'))?>
<?=$this->Html->script(array('jquery', 'jquery.lorem', 'custom'))?>
<?=$scripts_for_layout?>
<?
	$aImages = array(
		'menu-home.png', 'menu-home-h.png', 'menu-news.png', 'menu-news-h.png', 'menu-products.png', 'menu-products-h.png',
		'menu-brands.png', 'menu-brands-h.png', 'menu-about.png', 'menu-about-h.png', 'menu-partner.png', 'menu-partner-h.png', 
		'menu-contacts.png', 'menu-contacts-h.png', 'menu-sub-sel.png', 'more-left.gif', 'more-right.gif', 
		'carusel-left.png', 'carusel-left-h.png', 'carusel-right.png', 'carusel-right-h.png'
	);
	echo $this->element('preload', array('plugin' => 'core', 'images' => $aImages));
?>
<script type="text/javascript">
$(document).ready(function(){
	$('.autocompleteOff').attr('autocomplete', 'off');
});
</script>
</head>
<body>
	<div id="body-wrapper">
        
        <div id="content-wrapper">
        
        	<div class="header">
				<div class="topline"></div>
				<div class="main">
					<a href="/" class="logo"></a>
					<div class="phone">
						<span>
						Hazennest-oost 11<br />
						5012 TA  Tilburg<br />
						+31 13 4555915
						</span>
					</div>
					<a href="/products/?data[filter][type_id]=39" class="car1" title="Reiniging"></a>
					<a href="/products/?data[filter][type_id]=38" class="car2" title="Hoogwerkers"></a>
					<a href="/products/?data[filter][type_id]=37" class="car3" title="Kranen"></a>
					<a href="/products/?data[filter][type_id]=36" class="car4" title="Landbouw"></a>
				</div>
				<div class="menu"><div class="l"><div class="r">
					<?=$this->element('main_menu')?>
					<div class="car-arm"></div>
				</div></div></div>
				<div class="bread">
					<?=$this->element('bread_crumbs')?>
				</div>
			</div>
        	
        	<div class="sidebar">
        		<?=$this->element('sidebar_left')?>
			</div>
			
        	<div class="content">
        		<?=$content_for_layout?>
				<div class="clear"></div>
			</div>
			
			<div class="clear"></div>
<?
	if (isset($aBrands) && $aBrands) {
?>			
			<div id="footer" class="logos-move-wrapper">
				<div class="arrow-left"></div>
				<div class="arrow-right"></div>
				<div class="title"></div>
				<div class="logos-move">
	        		<div class="left"></div>
	        		<div class="view">
		        		<div class="mover" style="margin-top: 20px">
		        			<div class="mover-in">
<?
		foreach($aBrands as $article) {
			$media = $article['Media'][0];
			$src = $this->PHMedia->getUrl($media['object_type'], $media['id'], '180x60', $media['file'].$media['ext']);
?>
				        		<a href="/brands/view/<?=$article['Article']['id']?>"><img src="<?=$src?>" alt="<?=$article['Article']['title']?>" /></a>
<?		
		}
?>
			        		</div>
		        		</div>
					</div>
	        		<div class="right"></div>
	        	</div>
			</div>
<?
	}
?>
			<div class="footer">
				<div class="nav">
					<?=$this->element('bottom_links')?>
				</div>
				<div class="contacts"><span>Address:</span> Hazennest-oost 11, 5012 TA Tilburg <span>Phone:</span> +31 (0)13 4555915</div>
				<div class="copy">2012 &copy; KLUYTMANS</div>
			</div>
           
        </div><!-- #content-wrapper -->
        
    </div><!-- #body-wrapper -->

</body>
</html>
