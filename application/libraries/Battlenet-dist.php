<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Brian
 * Date: 11/12/2014
 * Time: 12:37 AM
 */

class Battlenet {

    //Battlenet API Key
    private $_apikey         = '';

    //Static App Params
    private $_baseRequestURI = '';
    private $_serverName     = '';
    private $_guildName      = '';
    private $_locale         = '';


    /**
     * This method is used to get guild profile information from the Battle.net API
     *
     * This function invoked when the CRON is run to update guild information in the 'battlenet_*' synced tables
     * @access: public
     * @param:  string $fields - optional, CSV list of fields to call from API [members, achievements, news, challenge]
     * @return: array - json_decode of the returned json object
     */
    public function guildProfileApi($fields = '') {
        $uri = $this->_baseRequestURI . 'guild/' . $this->_serverName . '/' . $this->_guildName . '?' . $this->_locale . '&' . $this->_apikey;

        if(isset($fields) && !empty($fields)) {
            $uri = $uri . '&fields=' . $fields;
        }

        return $this->makeApiCall($uri);
    }


    /**
     * This method used to actually make the API call
     *
     * This function invoked when any of the api methods are called
     * @access: private
     * @param:  string $uri
     * @return: array - json_decode of the returned json object
     */
    private function makeApiCall($uri) {

        //  Initiate curl
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$uri);
        // Execute
        $result=curl_exec($ch);
        // Closing
        curl_close($ch);

        return json_decode($result,true);
    }
}

/* End of file Battlenet.php */