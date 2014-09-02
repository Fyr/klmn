<?
	$iconset = 'iconset2';
	if ($paginator->numbers()) {
		
		if (isset($filterURL) || isset($aFilterArgs)) {
			if (isset($aFilterArgs)) {
				foreach($aFilterArgs as $pgFilterKey => $pgFilterValue) {
					$this->passedArgs[$pgFilterKey] = $pgFilterKey.':'.$pgFilterValue;
				}
			}
			if (isset($filterURL) && $filterURL) {
				$this->passedArgs['?'] = $filterURL;
			}
	
			$paginator->options(array('url' => $this->passedArgs));
		}
		
?>
<table align="center" class="pagination" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td width="49%" align="right" style="padding-right: 5px;"><? __('Pages');?>:</td>
	<!--td align="right"><?=$paginator->first('<img src="/paginate/img/'.$iconset.'/first.gif" alt=""/>', array('escape' => false))?></td-->
	<!--td><?=$paginator->prev('<img src="/paginate/img/'.$iconset.'/prev.gif" alt=""/>', array('escape' => false))?></td-->
	<td><?=$paginator->prev(__('Previous', true), array('escape' => false))?></td>
	<td align="center" nowrap="nowrap" style="padding: 0px 5px;"><?=$paginator->numbers()?></td>
	<!--td><?=$paginator->next('<img src="/paginate/img/'.$iconset.'/next.gif" alt=""/>', array('escape' => false))?></td-->
	<td><?=$paginator->next(__('Next', true), array('escape' => false))?></td>
	<!--td width="49%"><?=$paginator->last('<img src="/paginate/img/'.$iconset.'/last.gif" alt=""/>', array('escape' => false))?></td-->
</tr>
</table>
<?
	}
?>