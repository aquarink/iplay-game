<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bitly_Controller extends CI_Controller {

    public function test() {
        //$str = '{"status_code":200,"status_txt":"OK","data":{"url":"http://bit.ly/2qB4kHc","hash":"2qB4kHc","global_hash":"2qB1hib","long_url":"http://[::1]/villagech/play?g=22@air-battle","new_hash":1}}';
        //$array = json_decode(json_encode($str), True);
        //print_r(json_decode($str)->data->url);
//        foreach (json_decode($str) as $value) {
//            print_r($value);
//        }
        //$longUrl = 'http://[::1]/villagech/play?g=22@air-battles';
        $longUrl = 'http://www.www.com/villagech/play?g=22@air-battle';

        $url = 'http://api.bitly.com/v3/shorten?login=mobiwin&apiKey=R_5fe21d7da0d84f89942bd2c44a30a456&longUrl=' . $longUrl;

        $ch = curl_init($url);

        if ($ch == FALSE) {
            return array('error' => "failed");
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);

            $result = curl_exec($ch);
            echo($result);
//            
        }
    }

}
