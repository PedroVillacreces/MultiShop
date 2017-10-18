<?php

class Links{

	public function linksController(){

		if(isset($_GET["action"])){
			$links = $_GET["action"];
		}

		else{
			$links = "index";
		}

		$response = LinksModels::linksModel($links);
		include $response;

	}


}