<?
function makemenu($tab){
	global $proc;
	//echo "<<<< ".$tab."<br />";
	//echo ">>>> ".$proc->tab[$tab]["qty"]."<br />";
	//$bread='<a href="/">Главная</a>';
	
		$ur=get_url();
		if($ur[2]){
			$linker=$ur[1]."/".$ur[2];
			if(!$proc->tabdata[$tab][$linker]["menu"]){
				$bread='<div text align="right" class="bread"><a href="/">Главная</a> => '.'<a href="/'.$ur[1].'/">'.$proc->tabdata[$tab][$ur[1]]["menu"].'</a></div>';
			}
			//echo "<br />++++++++++++<br />";
		}else{
			$linker=$ur[1];
		}
		$menu[":bread:"]=$bread;
		//echo ">>>".$linker." >> ".$proc->tabdata[$tab][$linker]["menu"]."<<<".$bread."<br />";
		
		if($proc->tabdata[$tab][$linker]["menu"]){
			$menu_mode="local";
			$key_address=$proc->tabdata[$tab][$linker]["address"];
		}else{
			$menu_mode="abstract";
			$key_address=$ur[1];
			$key_parent=$proc->tabdata[$tab][$linker]["parent"];
		}
		
		//echo $menu_mode;

	for($i=0; $i<$proc->tab[$tab]["qty"];$i++){
		$unit=$proc->tab[$tab]["keyfield"][$i];
		$group=$proc->tabdata[$tab][$unit]["menugroup"];
		$menus=$proc->tabdata[$tab][$unit]["menu"];
		$address=$proc->tabdata[$tab][$unit]["address"];
		$val=$proc->tabdata[$tab][$unit]["val"];
		$parent=$proc->tabdata[$tab][$unit]["parent"];
		$level=$proc->tabdata[$tab][$unit]["level"];
		
		if($val){
			$menu[":labels:"][$val]=$address;
			//echo $index." ===<br />";
		}
		
		$cls='';
		
		if($i==0){
			$cls=' class="first"';
		}
		
		switch($menu_mode){
			case "local":
			//echo $address.">>>".$key_address."<br />";
			if($address==$key_address){
				$cls=' class="active"';
			}
			break;
			
			case "abstract":
			//echo $val.">>>".$menu[":labels:"][$key_parent]."<br />";
			if($address==$menu[":labels:"][$key_parent]){
				$cls=' class="active"';
			}
			break;
		}
		
		
		if($group & $menus){
			$counter[$group]=1;
			$qty=count($counter)-1;

			$menu[$qty]=$group;
			if($address=='/' or $address=='../'){
				$menu[$group].='<li><a href="'.$address.'"'.$cls.'>'.$menus.'</a></li>';
			}else{
				$menu[$group].='<li><a href="/'.make_url($address).'/"'.$cls.'>'.$menus.'</a></li>';
			}
			
			//echo $group."	".$qty."	".$menu[$group]."<br />";
		}
		
	}
	$i=0;
	while($menu[$i]){
		$menu[$menu[$i]]="<ul>".$menu[$menu[$i]]."</ul>";
		$menu["final"].="<h5>".$menu[$i]."</h5>".$menu[$menu[$i]];
		$i++;
	}
	
	//print_r($menu);
	return $menu;
}


?>