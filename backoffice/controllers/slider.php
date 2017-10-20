<?php

/**
 * Undocumented class
 */
class Slider{

/**
 * Undocumented function
 *
 * @param [type] $data
 * @return void
 */
	public function showImageController($data){

		#getimagesize - Obtiene el tamaño de una imagen

		#LIST(): Al igual que array(), no es realmente una función, es un constructor del lenguaje. list() se utiliza para asignar una lista de variables en una sola operación.

		list($width, $height) = getimagesize($data["tempImage"]);		
		if($width < 1600 || $height < 600){
			echo 0;

		}

		else{

			$random = mt_rand(100, 999);
			$path = "../multimedia/images/slide/slide".$random.".jpg";
			#imagecreatefromjpeg — Crea una nueva imagen a partir de un fichero o de una URL

			$from = imagecreatefromjpeg($data["tempImage"]);
			#imagecrop() — Recorta una imagen usando las coordenadas, el tamaño, x, y, ancho y alto dados

			$to = imagecrop($from, ["x"=>0, "y"=>0, "width"=>1600, "height"=>600]);
			#imagejpeg() — Exportar la imagen al navegador o a un fichero

			imagejpeg($to, $path);
			GestorSlideModel::subirImagenSlideModel($path, "slide");
			$response = SliderModel::showImageSliderModel($path, "slide");

			$sendData = array("path"=>$response["path"],
				                 "title"=>$response["title"],
				                 "description"=>$response["description"]);

			echo json_encode($sendData);
		}

	}

/**
 * Undocumented function
 *
 * @return void
 */
	public function showImageViewController(){

		$response = SLiderModel::showImageViewModel("slide");

		foreach($response as $row => $item){

			echo '<li id="'.$item["id"].'" class="bloqueSlide"><span class="fa fa-times eliminarSlide" ruta="'.$item["ruta"].'"></span><img src="'.substr($item["ruta"], 6).'" class="handleImg"></li>';

		}

	}

/**
 * Undocumented function
 *
 * @return void
 */
	public function editorSliderController(){

		$response = SliderModel::showImageViewModel("slide");

		foreach($response as $row => $item){

			echo '<li id="item'.$item["id"].'">
					<span class="fa fa-pencil editarSlide" style="background:blue"></span>
					<img src="'.substr($item["ruta"], 6).'" style="float:left; margin-bottom:10px" width="80%">
					<h1>'.$item["title"].'</h1>
					<p>'.$item["description"].'</p>
				</li>';

		}

	}

/**
 * Undocumented function
 *
 * @param [type] $data
 * @return void
 */
	public function deleteSliderController($data){

		$response = SliderModel::deleteSliderModel($data, "slide");

		unlink($data["pathSlider"]);

		echo $response;

	}


/**
 * Undocumented function
 *
 * @param [type] $data
 * @return void
 */
	public function updateSliderController($data){

		SliderModel::updateSliderModel($data, "slide");
		$response = SliderModel::selectUpdateSliderModel($data, "slide");

		$sendData = array("title"=>$response["title"],
			                 "description"=>$response["description"]);
		
		echo json_encode($sendData);
	}

/**
 * Undocumented function
 *
 * @param [type] $data
 * @return void
 */
	public function updatePositionController($data){

		SliderModel::updatePositionModel($data, "slide");

		$response = SliderModel::selectPositionModel("slide");

		foreach($response as $row => $item){

			echo'<li id="item'.$item["id"].'">
			     <span class="fa fa-pencil editarSlide" style="background:blue"></span>
			     <img src="'.substr($item["ruta"], 6).'" style="float:left; margin-bottom:10px" width="80%">
			     <h1>'.$item["title"].'</h1>
			     <p>'.$item["description"].'</p>
			     </li>';

		}
	}

}