<?php

class App {

	public function App($module){
		$this->loadModule($module);

	}

	public  function loadModule($module){
			if(!isset($_GET['module'])){
				Module::setModule($module);
				include "core/modules/".$module."/init.php";
			}else{
				Module::setModule($_GET['module']);
				if(Module::isValid()){
					include "core/modules/".$_GET['module']."/init.php";
				}else {
					Module::Error();
				}
			}

	}

}



?>