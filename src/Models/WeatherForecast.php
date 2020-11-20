<?php

namespace Anax\Models;

class WeatherForecast
{
    public function __construct()
    {
        $this->oneWeek = [];
    }


    public function checkWeather($lat, $lon)
    {
        global $di;

        $config = $di->get("configuration")->load("apikey.php");
        $access_key = $config["config"]["keyHolder"]["weatherKey"];
        $exclude = "current,minutely,hourly,alerts";

        if (!ctype_alpha($lat) || !ctype_alpha($lon)) {
            if ($lat < 90 && $lat > -90 && $lon < 180 && $lon > -180) {
                $ch = curl_init('https://api.openweathermap.org/data/2.5/onecall?lat='.$lat.'&lon='.$lon.'&exclude='.$exclude.'&units=metric&lang=sv&appid='.$access_key.'');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // Store the data:
                $json = curl_exec($ch);
                curl_close($ch);

                // Decode JSON response:
                $api_result = json_decode($json, true);

                $week = $api_result["daily"];

                foreach ($week as $value) {
                    $current = [
                        "date" => gmdate("Y-m-d", $value["dt"]),
                        "temp" => $value["temp"]["min"] . " - " . $value["temp"]["max"],
                        "description" => $value["weather"][0]["description"]
                    ];
                    $this->oneWeek[] = $current;
                }
                return $this->oneWeek;
            } else {
                $error = "Felaktig input, prova igen";
                return $error;
            }
        } else {
            $error = "Felaktig input, prova igen";
            return $error;
        }
    }
}
