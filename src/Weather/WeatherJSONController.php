<?php

namespace Anax\Weather;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Models\WeatherForecast;
use Anax\Models\GetGeo;

class WeatherJSONController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function checkWeatherRestAction()
    {
        $location = $_GET["location"];

        $weather = $this->di->get("weather");
        $geo = new GetGeo();


        if (strpos($location, ",") == true) {
            $exploded = explode(",", $location);
            $data = $weather->checkWeather($exploded[0], $exploded[1]);
        } else {
            $res = $geo->getGeo($location);
            if ($res["longitude"] !== null) {
                $data = $weather->checkWeather($res["latitude"], $res["longitude"]);
            } else {
                $error = "Felaktig input, prova igen!";
            }
        }


        $data = [
            "forecast" => $data ?? null,
            "error" => $error ?? null
        ];

        json_encode($data, true);

        return [[ $data ]];
    }
}
