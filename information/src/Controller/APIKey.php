<?php

namespace Drupal\information\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Symfony\Component\HttpFoundation\Response;

/**
 * API Key controller for print json data.
 */
class APIKey extends ControllerBase {


  public function getValue( $id ){
    // Get apikey value
    $api_key = \Drupal::state()->get('siteapikey');

    // check apikey value is null or not. If null than print access denied and value is not null than its print node id and apikey in json format
    if ($api_key=='') {
      $data = array('status'=>'access denied');
    }else{
      $data = array(
                    'id' => $id,
                    'api_key' => $api_key
                  );
    }


    // Create a object of class Resonse()
    $response = new Response();
    // encode $data value in json format
    $response->setContent(json_encode($data));
    // set content type is page
    $response->headers->set('Content-Type', 'application/json');
    return $response;


  }

}
