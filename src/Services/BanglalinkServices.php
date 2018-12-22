<?php

namespace Arifsajal\BanglalinkSmsGatewayLaravel\Services;

use GuzzleHttp\Client;

class BanglalinkServices
{
    protected $config;

    protected $userID;

    protected $password;

    protected $fullApiUrl = "https://vas.banglalinkgsm.com/sendSMS/sendSMS";

    protected $contacts;

    protected $message;

    protected $contactsString;

    protected $sender;

    protected $apiResponse;

    protected $formattedServerResponse;

    public function contacts($contacts){
        if(is_string($contacts)):
            $this->contacts = $contacts;
        elseif(is_array($contacts)):
            $this->contacts = $contacts;
        endif;

        if(is_array($contacts) && count($contacts) > 0):
            $string = "";
            foreach($contacts as $contact):
                $string .= $contact.';';
            endforeach;
            $this->contactsString = str_replace('+','',rtrim($string,';'));
        else:
            $this->contactsString = str_replace('+','',$contacts);
        endif;

        return $this;
    }

    public function message($message){
        if($message):
            $this->message = $message;
        endif;
        return $this;
    }

    public function sender($sender){
        if($sender):
            $this->sender = $sender;
        endif;
        return $this;
    }

    public function send(){
        $queries = ['msisdn'=>$this->contactsString,'message'=>$this->message,'userID'=>$this->userID,'passwd'=>$this->password,'sender'=>$this->sender];
        $client = new Client();
        $response = $client->request('GET',$this->fullApiUrl,['query'=>$queries]);
        $this->apiResponse = ['statusCode'=>$response->getStatusCode(),'reasonPhrase'=>$response->getReasonPhrase(),'serverResponse'=>$response->getBody()->getContents()];
        return $this;
    }

    public function config($array){
        $this->__setConfig($array);
        return $this;
    }

    public function formatServerResponse(){
        $response = explode('and',$this->apiResponse['serverResponse']);
        foreach($response as $str):
            $strexplode = explode(':',$str);
            $res[camel_case(trim($strexplode[0]))] = trim($strexplode[1]);
        endforeach;

        $this->formattedServerResponse = $res;
        return $this->formattedServerResponse;
    }

    protected function __setConfig($array){
        if(array_key_exists('user_id',$array) && array_key_exists('password',$array)):
            $this->config = $array;
            $this->userID = $array['user_id'];
            $this->password = $array['password'];

            if(array_key_exists('full_api_url',$array)):
                $this->fullApiUrl = $array['full_api_url'];
            endif;
        endif;
        return $this;
    }

    protected function __prepareContactsForUrl($contacts){
        if(is_array($contacts) && count($contacts) > 0):
            $string = "";
            foreach($contacts as $contact):
                $string .= $contact.';';
            endforeach;
            $this->contactsString = str_replace('+','',rtrim($string,';'));
        endif;
        return $this;
    }
}