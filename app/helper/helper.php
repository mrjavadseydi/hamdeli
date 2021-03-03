<?php

use App\Models\Needy;

if (!function_exists('sms')) {
    function sms($name, $phone)
    {
        try {
            $api = env('SMS_API_KEY');
            $url = "https://api.kavenegar.com/v1/$api/verify/lookup.json?receptor=$phone&sender=10009900990909&token=" . urlencode("سلام") . "&token20=" . urlencode($name) . "&template=sendWellcome";
            $cURLConnection = curl_init();

            curl_setopt($cURLConnection, CURLOPT_URL, $url);
            curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

            curl_exec($cURLConnection);
            curl_close($cURLConnection);
        } catch (Exception $e) {
        }
    }
}
if (!function_exists('UserDonate')) {
    function UserDonate()
    {
        return \App\Models\Donator::whereId(session('login')['id'])->first();
    }
}
if (!function_exists('needyUser')) {
    function needyUser()
    {
        return Needy::whereId(session('nlogin')['id'])->first();
    }
}
if (!function_exists('getOption')) {
    function getOption($title)
    {
        return \App\Models\Option::whereOption($title)->first()->description;
    }
}
