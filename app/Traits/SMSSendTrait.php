<?php

namespace App\Traits;

trait SMSSendTrait {

    public function SendSMS(string $Number, string $SMS) {
        $url = "https://smsapi.shiramsystem.com/user_api/";
        $post = array(
            "email" => "razin223@gmail.com",
            "password" => "rsaftert",
            "method" => "send_sms",
            "mobile" => array("88" . $Number),
            "mask" => "03590002390",
            "message" => $SMS,
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        $Error = curl_error($ch);
        curl_close($ch);
        if ($Error !== false) {
            return false;
        } else {
            $Data = json_decode($result, true);

            if ($Data['status']) {
                return true;
            } else {
                return false;
            }
        }
    }

}
