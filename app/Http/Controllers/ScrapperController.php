<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ScrapperController extends Controller
{
    private $results = array();
    public function scraper_hotel($city)
    {
        $client = new Client();
        $city_name = strtolower($this->city($city));
        $url = 'https://www.holidify.com/places/' . $city_name . '/hotels-where-to-stay.html';
        $page = $client->request('GET', $url);
        // echo $page->filter('.card')->text();
        $page->filter('.hotel-metadata')->each(function ($item) {
            $this->results[$item->filter('h3')->text()] = $item->filter('.readMoreSmall')->text();
        });

        return $this->results;
        // return view('new');
    }

    public function image($city)
    {
        $ch = curl_init();
        $city_name = strtolower($this->city($city));
        $url = 'https://www.holidify.com/places/' . $city_name . '/hotels-where-to-stay.html';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);
        preg_match_all('!www.holidify.com/images/cmsuploads/compressed/(.*).jpg!', $res, $data);
        return $data[0];
    }

    public function city($city)
    {
        $params = array();
        $api_base = "https://airlabs.co/api/v9/";
        $params["city_code"] = $city;
        $params["api_key"] = "25c1f351-25c4-4c4c-83e0-6428a40a7c9a";
        $c = curl_init(sprintf('%s%s?%s', $api_base, 'cities', http_build_query($params)));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $res = json_decode(curl_exec($c), true);
        curl_close($c);
        return $res['response'][0]['name'];
    }

    public function lat_long($city)
    {
        $queryString = http_build_query([
            'access_key' => '2b7c82ee26a02a5692e2e4e52782cd7a',
            'query' => strtolower($city),
            'output' => 'json',
            'limit' => 1,
        ]);

        $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);

        curl_close($ch);

        $apiResult = json_decode($json, true);
        $lat = $apiResult['data'][0]['latitude'];
        $long = $apiResult['data'][0]['longitude'];
        $result = $this->getWeather($lat, $long);
        $weather = $result['weather'][0]['main'];
        $temp = $result['main']['temp'];
        $humid = $result['main']['humidity'];
        return array('humid' => $humid, 'temp' => $temp, 'condition' => $weather);
    }
    public function getWeather($lat, $long)
    {
        $queryString = http_build_query([
            'lat' => $lat,
            'lon' => $long,
            'appid' => '51f8cb167ea0766c9ce3b0e6103f666d',
        ]);

        $ch = curl_init(sprintf('%s?%s', 'https://api.openweathermap.org/data/2.5/weather', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);

        curl_close($ch);

        $apiResult = json_decode($json, true);
        return $apiResult;
    }
}
