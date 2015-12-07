<?php
class BuildController{

	public static function run() {
		
		//BuildView::show();
		$user = (array_key_exists('user', $_SESSION))?$_SESSION['user']: NULL;
		$action = (array_key_exists ( 'action', $_SESSION )) ? $_SESSION ['action'] : "";
		$answers = (array_key_exists ( 'answers', $_SESSION )) ? $_SESSION ['answers'] :array();
		$arguments = (array_key_exists ( 'arguments', $_SESSION )) ? $_SESSION ['arguments'] :array();
		
		//echo '<br><br><br><br><br>'.$_SESSION['arguments'];
		print_r($_SESSION);
		switch ($action) {
			case "cpu" :
				$_SESSION ['motherboardID'] = $_SESSION ['arguments'];
				MasterView::showHeader2();
				MasterView::showUsernavbar();
				MasterView::showCategories();
				$parts = PartsDB::getPartRowSetsByType("cpus");
				foreach($parts as $part){
					MasterView::showCPU($part);
				}
				MasterView::showFooter();
				break;
			case "memory" :
				$_SESSION ['cpuID'] = $_SESSION['arguments'];
				MasterView::showHeader2();
				MasterView::showUsernavbar();
				MasterView::showCategories();
				$parts = PartsDB::getPartRowSetsByType("memory");
				foreach($parts as $part){
					MasterView::showMemory($part);
				}
				MasterView::showFooter();
				break;
			case "gpu" :
				$_SESSION ['memoryID'] = $_SESSION ['arguments'];
				MasterView::showHeader2();
				MasterView::showUsernavbar();
				MasterView::showCategories();
				$parts = PartsDB::getPartRowSetsByType("gpus");
				foreach($parts as $part){
					MasterView::showGPU($part);
				}
				MasterView::showFooter();
				break;
			case "harddrive" :
				$_SESSION ['gpuID'] = $_SESSION ['arguments'];
				MasterView::showHeader2();
				MasterView::showUsernavbar();
				MasterView::showCategories();
				$parts = PartsDB::getPartRowSetsByType("harddrives");
				foreach($parts as $part){
					MasterView::showHardDrive($part);
				}
				MasterView::showFooter();
				break;
			case "powersupply" :
				$_SESSION ['harddriveID'] = $_SESSION ['arguments'];
				MasterView::showHeader2();
				MasterView::showUsernavbar();
				MasterView::showCategories();
				$parts = PartsDB::getPartRowSetsByType("psupplies");
				foreach($parts as $part){
					MasterView::showPowerSupply($part);
				}
				MasterView::showFooter();
				break;
			case "case" :
				$_SESSION ['powersupplyID'] = $_SESSION ['arguments'];
				MasterView::showHeader2();
				MasterView::showUsernavbar();
				MasterView::showCategories();
				$parts = PartsDB::getPartRowSetsByType("cases");
				foreach($parts as $part){
					MasterView::showCase($part);
				}
				MasterView::showFooter();
				break;
			case "finish" :
				$_SESSION ['caseID'] = $_SESSION ['arguments'];
				MasterView::showHeader2();
				MasterView::showUsernavbar();
				MasterView::showCategories();
				
						
						
						echo "<br><br>Case: ";	
						$part = PartsDB::getPartRowSetsBy("cases", "caseId", $_SESSION ['caseID']);
						echo $part[0]['Make']." ".$part[0]['Model']." $".$part[0]['Price']."<br>";			
						
						echo "<br>CPU: ";
						//echo $_SESSION ['cpuID'];
						$part = PartsDB::getPartRowSetsBy("cpus", "cpuId", $_SESSION ['cpuID']);
						echo $part[0]['Make']." ".$part[0]['Model']." ".$part[0]['Speed(GHz)']."GHz $".$part[0]['Price']."<br>";
						
						echo "<br>GPU: ";
						$part = PartsDB::getPartRowSetsBy("gpus", "gpuId", $_SESSION['gpuID']);
						echo $part[0]['Make']." ".$part[0]['Model']." ".$part[0]['Speed(GHz)']."GHz ".$part[0]['Memory(GB)']."GB $".$part[0]['price']."<br>";
						
						echo "<br>Hard Drive: ";
						$part = PartsDB::getPartRowSetsBy("harddrives", "hdriveId", $_SESSION['harddriveID']);
						echo $part[0]['Make']." ".$part[0]['Model']." ".$part[0]['Size']." ".$part[0]['Speed']."RPM $".$part[0]['price']."<br>";
						
						echo "<br>Memory: ";
						$part = PartsDB::getPartRowSetsBy("memory", "ramId", $_SESSION['memoryID']);
						echo $part[0]['Make']." ".$part[0]['Model']." ".$part[0]['Size(GB)']." ".$part[0]['Type']." $".$part[0]['price']."<br>";
						
						echo "<br>Motherboard: ";
						$part = PartsDB::getPartRowSetsBy("motherboards", "mboardId", $_SESSION['motherboardID']);
						echo $part[0]['Make']." ".$part[0]['Model']." ".$part[0]['PCI Slots']." PCI Slots ".$part[0]['Memory Slots']." Memory Slots ".$part[0]['USB Ports']." USB Ports $".$part[0]['price']."<br>";
						
						echo "<br>Power Supply: ";
						$part = PartsDB::getPartRowSetsBy("psupplies", "psupplyId", $_SESSION['powersupplyID']);
						echo $part[0]['Make']." ".$part[0]['Model']." ".$part[0]['Watts']." Watts $".$part[0]['price']."<br>";

					
					echo '<img src="../images/'.$answers->getCasecolor() . '.jpg" alt="userImage"> <br>';
					echo '<p><a class="btn btn-primary btn-lg" href="/'.$base.'/save" role="button">Save &raquo;</a></p>';
				
				MasterView::showFooter();
				break;
			default :
				BuildView::show();
		}
		
	}
}
?>