<?php

/**
 * Links class which going to be used for providing the right view from the template
 */
class Links{

	/**
	 * linksController function used to provide the right view
	 *
	 * @return void
	 */
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