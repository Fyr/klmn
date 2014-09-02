<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>mcasterlive.ru - Социальная сеть </title>
<?=$this->Html->charset()?>
<?=$this->Html->css(array('common', 'style'))?>
<?=$this->Html->script(array('jquery', 'jquery.lorem'))?>
<?=$scripts_for_layout?>
<!--[if IE 6]>
    <script type="text/javascript" src="/js/ie6fix.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.iepngfix');
    </script>
<![endif]-->
<script type="text/javascript">
$(document).ready(function(){
	$('.lorem1').lorem({type:'paragraphs', amount:1, ptags:true});
	$('.lorem2').lorem({type:'paragraphs', amount:2, ptags:true});
});
</script>
</head>
<body>
<div class="header">
    <div class="logo_corner">
       	<div class="inner">
            <div class="logo"><a href="/"></a></div>
                <div class="slogan">
                    <div class="login" align="right">
                    	<span>
							Добро пожаловать, <b><?=$currUser['User']['username']?>!</b>
						</span>
					</div>
		            <h1>Социальная сеть McASTER</h1>
            	    <span>жизнь внутри Aster</span>
    			</div>
				<?=$this->element('main_menu')?>
            </div>
    </div>
</div>
<div class="ornam iepngfix">
    <div class="pattern">
        <div class="book">
            <div class="leaves">
	            <div class="outer iepngfix">
                    <div class="pen iepngfix">
                    	<div class="inner">
		                	<div class="content">
                                <div class="bottom_uzor">
		                			<div class="left_side">
		                				<?=$this->element('user_menu')?>
		                				<div class="top"></div>
										<?=$this->element('sidebar_left')?>
		                			</div>
		            				<div class="bread_crumbs">
        			    				<div class="corner">
		                    				<?=$this->element('bread_crumbs', array('aItems' => $aBreadCrumbs))?>
			    		                </div>
        						    </div>
		                			<div class="workarea">
						                <?=$content_for_layout?>
        			    			</div>
        				    		<div class="right_side">
					                    <?=$this->element('sidebar_right')?>
		                			</div>
                                </div>
                            </div>
                            <div class="bottom_shadow"></div>
		                </div>
        			</div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_pen"></div>
</div>
<div class="footer">
    <div class="footer_inner">
    	<?=$this->element('bottom_links')?>
    </div>
</div>
</body>
</html>
