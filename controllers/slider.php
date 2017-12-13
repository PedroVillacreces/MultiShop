<?php

require_once(__DIR__ . "/../models/slider.php");
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/12/17
 * Time: 0:11
 */
class SliderFront
{

    public function showSlider()
    {
        $response = SliderModelsFront::showSlider("slider");

        foreach ($response as $row => $item) {

            if($row == 0){
                echo '<div class="item active">
                        <h3 class="text-center">' . $item["text_header"] . '</h3>
                        <img src="backoffice/'. $item["url"] . '" alt="Los Angeles"> 
                        <div style="margin-top : 20px; margin-bottom:0;" class="alert alert-info text-center">
                            <strong>' . $item["text_footer"] . '</strong>
                        </div>
                    </div>';
            }
            else{
                echo '<div class="item">
                        <h3 class="text-center">' . $item["text_header"] . '</h3>
                        <img src="backoffice/'. $item["url"] . '" alt="Los Angeles"> 
                        <div style="margin-top : 20px; margin-bottom:0;" class="alert alert-info text-center">
                            <strong>' . $item["text_footer"] . '</strong>
                        </div>
                    </div>';
            }

        }
    }

}
