<?php

namespace App\Http\Controllers;

use Goutte\Client;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TempController extends Controller
{

    private $results = array();
    private $data = array();
    public function image()
    {
        $client = new Client();
        // $city_name = strtolower($this->city($city));
        $url = 'https://www.holidify.com/places/delhi/hotels-where-to-stay.html';
        $page = $client->request('GET', $url);
        $page->filter('.collection-scrollable')->each(function ($node) {
            $link = $node->filter('img')->attr('data-original');
            // dd($link);
            array_push($this->data, $link);
        });
        return $this->data;
        // $ch = curl_init();
        // $url = 'https://www.holidify.com/places/delhi/sightseeing-and-things-to-do.html';
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $res = curl_exec($ch);
        // curl_close($ch);
        // preg_match_all('!www.holidify.com/images/cmsuploads/(.*).jpg!', $res, $data);
        // echo "<pre>";
        // print_r($data[0]);
        // return $data[0];
        // $the_site = "https://www.holidify.com/places/delhi/sightseeing-and-things-to-do.html";
        // $the_tag = "div"; #
        // $the_class = "slick-track";

        // $html = file_get_contents($the_site);
        // libxml_use_internal_errors(true);
        // $dom = new \DOMDocument();
        // $dom->loadHTML($html);
        // $xpath = new \DOMXPath($dom);

        // foreach ($xpath->query('//' . $the_tag . '[contains(@class,"' . $the_class . '")]/img') as $item) {

        //     $img_src =  $item->getAttribute('src');
        //     dd($img_src);
        // }
    }
    public function scraper()
    {
        $client = new Client();
        // $city_name = strtolower($this->city($city));
        $url = 'https://www.holidify.com/places/delhi/sightseeing-and-things-to-do.html';
        $page = $client->request('GET', $url);
        // echo $page->filter('.card')->text();
        $page->filter('.pr-md-3')->each(function ($item) {
            $this->results[$item->filter('h3')->text()] = $item->filter('.card-text')->text();
        });
        echo "<pre>";
        print_r($this->results);
        // return $this->results;
        // return view('new');
    }
    public function city()
    {
        $params = array();
        $api_base = "https://airlabs.co/api/v9/";
        $params["city_code"] = "DEL";
        $params["api_key"] = "25c1f351-25c4-4c4c-83e0-6428a40a7c9a";
        // dd($params);
        // $params = json_encode($params);
        $c = curl_init(sprintf('%s%s?%s', $api_base, 'cities', http_build_query($params)));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $res = json_decode(curl_exec($c), true);
        curl_close($c);
        echo "<pre>";
        print_r(strtolower($res['response'][0]['name']));
        // print_r($res);
        // dd($c);
    }

    public function confirm(Request $req)
    {
        $names = "";
        for ($i = 1; $i < $req->adults; $i++) {
            $temp_f = "f_name_" . $i;
            $temp_m = "m_name_" . $i;
            $temp_l = "l_name_" . $i;
            $name = $req->$temp_f;
            $name .= '_';
            $name .= $req->$temp_m;
            $name .= '_';
            $name .= $req->$temp_l;
            $names .= $name . ',';
        }
        $temp_f = "f_name_" . $req->adults;
        $temp_m = "m_name_" . $req->adults;
        $temp_l = "l_name_" . $req->adults;
        $name = $req->$temp_f;
        $name .= '_';
        $name .= $req->$temp_m;
        $name .= '_';
        $name .= $req->$temp_l;
        $names .= $name;

        $num0 = (rand(1, 10));
        $num1 = date("Ymd");
        // $num2 = (rand(100, 1000));
        $num3 = date('is');
        $randnum = $num0 . $num1 . $num3;

        $booking = new Booking();
        $booking->id = $randnum;
        $booking->email = Auth::user()->email;
        $booking->flight_id = $req->flights;
        $booking->number = $req->adults;
        $booking->passengers = $names;
        $booking->booking_date = date("Y/m/d");
        $booking->fare = $req->fare;
        $result = $booking->save();
        Session::put('bid', $randnum);
        return $result;
    }

    public function api1()
    {
        $ch = curl_init();
        $url = 'https://fakestoreapi.com/products?limit=10';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);
        echo "<pre>";
        print_r($res);
        // exit;
    }

    public function api2()
    {
        $ch = curl_init();
        $url = 'https://api.tvmaze.com/search/shows?q=boys';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);
        echo "<pre>";
        print_r($res);
        // exit;
    }

    public function temp()
    {
        // $id = Session::get('bid');
        // $name = Auth::user()->name;
        // $flights_info = Booking::find($id)->value('flight_id');
        // // $flights_info = "5";
        // $flights = explode(",", $flights_info);
        // print_r(sizeof($flights));
        $flight = DB::table('flight_info')->where('id', "2")->get();
        // $return_flight = DB::table('flight_info')->where('id', $flights[1])->get();
        // $data = [
        //     "bid" => $id,
        //     "name" => $name,
        //     "flight" => $flight,
        //     "rflight" => $return_flight,
        // ];
        // return view('confirmation', ["data" => $data]);
        print_r($flight[0]->dep);
    }

    public function show_bk()
    {
        $flights = array();
        $email = Auth::user()->email;
        $bk = Booking::where('email', $email)->get();
        $bk_count = $bk->count();
        for ($i = 0; $i < $bk_count; $i++) {
            $data = array();
            $f = $bk[$i]->flight_id;
            $f1 = explode(",", $f);
            $flight = DB::table('flight_info')->where('id', $f1[0])->get();
            array_push($data, $bk[$i]->id, $bk[$i]->booking_date, $flight);
            array_push($flights, $data);
            $data = array();
            $return_flight = DB::table('flight_info')->where('id', $f1[1])->get();
            array_push($data, $bk[$i]->id, $bk[$i]->booking_date, $return_flight);
            array_push($flights, $data);
        }
        // echo "<pre>";
        // print_r($flights);
        return view('bookings', compact('flights'));
    }

    public function lat_long()
    {
        $queryString = http_build_query([
            'access_key' => '2b7c82ee26a02a5692e2e4e52782cd7a',
            'query' => 'delhi',
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
