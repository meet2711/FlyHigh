<?php

namespace App\Http\Controllers;

use Goutte\Client;

class ScrapperController extends Controller
{
    private $results = array();
    private $data = array();
    public function scraper_hotel($city)
    {
        $client = new Client();
        $city_name = strtolower($this->city($city));
        $url = 'https://www.holidify.com/places/' . $city_name . '/hotels-where-to-stay.html';
        $page = $client->request('GET', $url);
        $page->filter('.hotel-metadata')->each(function ($item) {
            $this->results[$item->filter('h3')->text()] = $item->filter('.readMoreSmall')->text();
        });

        return $this->results;
    }

    public function scraper_places($city)
    {
        $client = new Client();
        $city_name = strtolower($this->city($city));
        $url = 'https://www.holidify.com/places/' . $city_name . '/sightseeing-and-things-to-do.html';
        $page = $client->request('GET', $url);
        $page->filter('.pr-md-3')->each(function ($item) {
            $this->results[$item->filter('h3')->text()] = $item->filter('.card-text')->text();
        });
        return $this->results;
    }

    public function hotel_image($city)
    {
        $client = new Client();
        $city_name = strtolower($this->city($city));
        $url = 'https://www.holidify.com/places/' . $city_name . '/hotels-where-to-stay.html';
        $page = $client->request('GET', $url);
        $page->filter('.collection-scrollable')->each(function ($node) {
            $link = $node->filter('img')->attr('data-original');
            array_push($this->data, $link);
        });
        return $this->data;
    }
    public function places_image($city)
    {
        $client = new Client();
        $city_name = strtolower($this->city($city));
        $url = 'https://www.holidify.com/places/' . $city_name . '/sightseeing-and-things-to-do.html';
        $page = $client->request('GET', $url);
        $page->filter('.collection-scrollable')->each(function ($node) {
            $link = $node->filter('img')->attr('data-original');
            array_push($this->data, $link);
        });
        return $this->data;
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
