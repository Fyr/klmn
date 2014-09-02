<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?=$pageTitle?></title>
	<meta name="language" content="en" />
<?=$this->element('seo_info', array('plugin' => 'seo', 'data' => $this->PHA->read($this->data, 'SEO')))?>
<?=$this->Html->charset()?>
<?=$this->Html->css(array('global', 'logos-move', 'additional'))?>
<?=$this->Html->script(array('jquery', 'jquery.lorem', 'custom', 'logos-move'))?>
<?=$scripts_for_layout?>
</head>
<body>
	<div id="body-wrapper">
        
        <div id="content-wrapper">
        
        	<div class="header">
				<div class="topline"></div>
				<div class="main">
					<a href="#" class="logo"></a>
					<div class="phone">+0 /000/ <span>000-00-00</span></div>
					<a href="#" class="car1"></a>
					<a href="#" class="car2"></a>
					<a href="#" class="car3"></a>
					<a href="#" class="car4"></a>
				</div>
				<div class="menu"><div class="l"><div class="r">
					<?=$this->element('main_menu')?>
					<div class="car-arm"></div>
				</div></div></div>
				<div class="bread">
				<?// $this->element('bread_crumbs')?>
				</div>
			</div><!-- .header -->
        	
        	<div class="sidebar">
        		<?// $this->element('sidebar_left')?>
			</div><!-- .sidebar -->
			
        	<div class="content">
<?
	if (TEST_ENV) {
		echo $content_for_layout;
	} else {
?>
				<h2>Page is not found</h2>
				<p>Sorry, requested page is not found.</p>
				<p>Please enter a correct URL or click here to contact administrator.</p>
<?
	}
?>
				<div class="clear"></div>
			</div><!-- .content -->
			
			<div class="clear"></div>
			<!--
			<div class="logos-move-wrapper">
				<div class="arrow-left"></div>
				<div class="arrow-right"></div>
				<div class="title"></div>
				<div class="logos-move">
	        		<div class="left"></div>
	        		<div class="view">
		        		<div class="mover">
		        			<div class="mover-in">
								
				        		<img src="http://insuru.ru/images/stories/rosgos-b.jpg" alt="" />
				        		<img src="http://insuru.ru/images/stories/igs-b.jpg" alt="" />
				        		<img src="http://insuru.ru/images/stories/reso-b.gif" alt="" />
				        		<img src="http://family-kasko.ru/images/stories/rosno_s.png" alt="" />
				        		<img src="http://insuru.ru/images/stories/alpha-b.jpg" alt="" />
				        		<img src="http://insuru.ru/images/stories/vtb-b.jpg" alt="" />
				        		<img src="http://family-kasko.ru/images/stories/uralsib_p.png" alt="" />
				        		<img src="http://insuru.ru/images/stories/renins-b.jpg" alt="" />
				        		<img src="http://insuru.ru/images/stories/vsk-b.jpg" alt="" />
				        		<img src="http://family-kasko.ru/images/stories/soglas_p.png" alt="" />
				        		<img src="http://family-kasko.ru/images/stories/msk_s.png" alt="" />
				        		<img src="http://family-kasko.ru/images/stories/progress_p.gif" alt="" />
				        		<img src="http://insuru.ru/images/stories/ergo-russ.gif" alt="" />
				        		<img src="http://insuru.ru/images/stories/sogaz.jpg" alt="" />
				        		<img src="http://insuru.ru/images/stories/guta-b.jpg" alt="" />
				        		<img src="http://insuru.ru/images/stories/rostra.jpg" alt="" />
				        		<img src="http://insuru.ru/images/stories/max-b.jpg" alt="" />
				        		<img src="http://insuru.ru/images/stories/ugoria-b.jpg" alt="" />
				        		<img src="http://insuru.ru/images/stories/oranta-b.jpg" alt="" />
				        		<img src="http://family-kasko.ru/images/stories/zurich_p.png" alt="" />
				        		<img src="http://insuru.ru/images/stories/syrgyt.jpg" alt="" />
				        		<img src="http://insuru.ru/images/stories/osnova_logo_stroke.jpg" alt="" />
				        		<img src="http://insuru.ru/images/stories/energogarant-l.jpg" alt="" />
				        		<img src="http://family-kasko.ru/images/stories/i.jpg" alt="" />
			        		</div>
		        		</div>
					</div>
	        		<div class="right"></div>
	        	</div>
			</div>
			-->
			<div class="footer">
				<div class="nav">
					<?=$this->element('bottom_links')?>
				</div>
				<div class="contacts"><span>Address:</span> 000000, City, Street <span>Phone:</span> +0 (000) 000 00 00</div>
				<div class="copy">2012 &copy; KLUYTMANS</div>
			</div>
           
        </div><!-- #content-wrapper -->
        
    </div><!-- #body-wrapper -->

</body>
</html>
