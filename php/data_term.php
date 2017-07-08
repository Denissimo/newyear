<?
$proc->mod['filter'] = 'typedev = "1"';
$proc->mod['index'] = 1;
$proc->fetch('devices');


/*
$proc->mod['index'] = 1;
$proc->request = 'SELECT pa.row_id, pa.device, pa.paramname, pa.paramval FROM `engine`.devices AS dv LEFT JOIN `engine`.devparam AS pa
  ON dv.row_id = pa.device
  WHERE dv.typedev = "1"';
$proc->fetch('devparam');


	$proc->mod['filter'] = 'device = "'.$proc->tabdata['devices'][0]['row_id'].'"';
	$proc->mod['index'] = 1;
	$proc->fetch('devparam');

ech($proc->tabdata['devparam']);

	$proc->mod['filter'] = 'device = "'.$proc->tabdata['devices'][1]['row_id'].'"';
	$proc->mod['index'] = 1;
	$proc->fetch('devparam');

ech($proc->tabdata['devparam']);

	$proc->mod['filter'] = 'device = "'.$proc->tabdata['devices'][2]['row_id'].'"';
	$proc->mod['index'] = 1;
	$proc->fetch('devparam');

ech($proc->tabdata['devparam']);
*/

for($i=0;$i<$proc->tab['devices']['qty'];$i++){
	$proc->mod['filter'] = 'device = "'.$proc->tabdata['devices'][$i]['row_id'].'"';
	$proc->mod['index'] = 1;
	$proc->fetch('devparam');

	$tab='<div class="parquet"><table class="evetlist"><tr><td colspan="2">'.$proc->tabdata['devices'][$i]['device'].'</td></tr>';
	for($j=0; $j<$proc->tab['devparam']['qty'];$j++){
		$rid = $proc->tabdata['devparam'][$j]['row_id'];
		$nam = $proc->tabdata['devparam'][$j]['paramname'];
		$val = $proc->tabdata['devparam'][$j]['paramval'];
		if($val=='yes'){
			$formbut = '<form action="[{post}]" method="post" class="butt"><input type="hidden" name="row_id" value="'.$rid.'"><input type="hidden" name="paramval" value="no"><input type="image" name="cashoff" src="/i/cancel.png"></form>';
		}else{
			$formbut = '<form action="[{post}]" method="post" class="butt"><input type="hidden" name="row_id" value="'.$rid.'"><input type="hidden" name="paramval" value="yes"><input type="image" name="cashon" src="/i/accept.png"></form>';
		}
		$tab.='<tr><td>'.$nam.'</td><td>'.$formbut.'</td></tr>';
	}
	//$tab.='<tr><td>0</td><td>1</td></tr>';
	$tab.='</table></div>';
	echo $tab;
}


echo $_SESSION['sys_tmp']['message'];
//dropsess(droplist);

?>