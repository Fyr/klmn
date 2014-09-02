<?
	$this->PHCore->css(array('grid/grid', 'fancybox'));
	$this->PHCore->js(array('jquery.fancybox.js' , 'custom2')); //
?>
<h2><?=$aArticle['Article']['title']?></h2>
<div>
<?
	if (isset($aArticle['Media'])) {
		$aMedia = $aArticle['Media'];
		foreach($aMedia as $media) {
			if ($media['ext'] == '.pdf') {
?>
	<div style="float: right">
		<a href="<?=$this->PHMedia->getRawUrl('article', $media['id'], $media['file'].$media['ext'])?>">Download <b><?=$media['file'].$media['ext']?></b></a>
	</div>
<?
				break;
			}
		}
	}
?>
	<b>Type</b> : <?=$aArticle['Category']['title']?><br />
	<b>Brand</b> : <?=$aArticle['Brand']['title']?>
</div>
<br />
<div>
	<?=$this->element('article_view', array('plugin' => 'articles'))?>
	<div class="clear"></div>
</div>
			<div id="products" class="logos-move-wrapper" style="width: 600px; margin: 20px 0 0 0">
				<div class="arrow-left"></div>
				<div class="arrow-right" style="left: 593px;"></div>
				<div class="logos-move">
	        		<div class="left"></div>
	        		<div class="view">
		        		<div class="mover">
		        			<div class="mover-in">
<?
	foreach($aArticle['Media'] as $media) {
		if ($media['media_type'] == 'image') {
			$src = $this->PHMedia->getUrl($media['object_type'], $media['id'], '150x100', $media['file'].$media['ext']);
			$src2 = $this->PHMedia->getUrl($media['object_type'], $media['id'], '600x', $media['file'].$media['ext']);
?>
				        		<a href="<?=$src2?>" rel="photoalbum"><img src="<?=$src?>" /></a>
<?
		}
	}
?>
			        		</div>
		        		</div>
					</div>
	        		<div class="right"></div>
	        	</div>
			</div>

<div class="box">
	<h3><?__('Technical parameters')?></h3>
	<table class="grid" cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th><?__('Parameter')?></th>
		<th><?__('Value')?></th>
	</tr>
	</thead>
	<tbody>
<?
	$class = '';
	foreach($aParamValues as $param) {
		$class = ($class == 'odd') ? 'even' : 'odd';
?>
	<tr class="gridRow <?=$class?> td">
		<td nowrap="nowrap"><?=$param['Param']['title']?></td>
		<td><b><?=$this->element('param_render', array('plugin' => 'params', 'param' => $param))?></b></td>
	</tr>
<?		
	}
?>
	</tbody>
	</table>
</div>

<br />
<?
	if ($aSimilar) {
?>
<div class="box">
	<h3><?__('Similar products')?></h3>
<?
		foreach($aSimilar as $article) {
			$this->ArticleVars->init($article, $url, $title, $teaser, $src, '150x', $featured);
?>
	<a href="<?=$url?>"><?=$title?></a><br />
<?
		}
?>
</div>
<?
	}
?>
<script type="text/javascript">
$(document).ready(function(){
	$(".mover-in a").fancybox({
		'transitionIn'	: 'elastic',
		'speedIn' : 1000,
		'speedOut' : 1000,
		'overlayOpacity': 0.7,
		'overlayColor'  : '#000',
		'padding'       : 5,
		'centerOnScroll': false,
		'opacity'       : true,
		'autoScale'		: false,
		
		'onStart': function() {
			$("html").css("overflow","hidden");
			$("#fancybox-wrap").wrap('<div id="fancybox-wrap-outer" style="width: '+$("body").outerWidth()+'px;height: '+$(window).height()+'px;"></div>');
		},
		
		'onCleanup' : function() {
			$("#fancybox-wrap").unwrap();
		},
		
		'onClosed': function() {
			$("html").css("overflow","auto");
		},
		
		'onComplete' : function() {
			var height = $("#fancybox-content").height();
			$("#fancybox-left").height($('#fancybox-img').height());
			$("#fancybox-right").height($('#fancybox-img').height());
			var height = $("#fancybox-content").height();
		}
	});
});

</script>