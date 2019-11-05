<?php

class BtrxHelper {

  protected $api;
  protected $log;

  public function __construct($api) {
    $this->api = $api;
    $this->log = new \Log('seam24.log');
  }

  public function request($data, $method) {
    $url = $this->api . $method;
    $options = array(
      'timeout' => 3,
      'method'  => 'POST',
      'content' => http_build_query($data),
    );
    $this->log->write( 'Get HTTP request to ' . $url );
    $this->log->write( 'Request data ' . json_encode($data) );
    $response = \Web::instance()->request($url, $options);
    $this->log->write( 'Bitrix response ' . json_encode($response) );
    $body = $response['body'];
    return json_decode($body, true);
  }
}

?>