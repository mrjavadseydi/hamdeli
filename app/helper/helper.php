<?php
if (!function_exists('sms')) {
    function sms($name,$phone){
        $api = env('SMS_API_KEY');
        $url = "https://api.kavenegar.com/v1/$api/verify/lookup.json?receptor=$phone&sender=10009900990909&token=".urlencode("سلام")."&token20=".urlencode($name)."&template=sendWellcome";
        file_get_contents($url);
    }

}
