<?php

class RegisterController extends Controller {

  public function __construct() {
    parent::__construct('Call');
  }

  public function get() {}

  public function post() {
    $data = array_merge($this->get_post_data(), array(
      'CALL_START_DATE' => date('c'),
      'CRM_CREATE' => 1,
      'SHOW' => 1
    ));

    $response = $this->btrx->request($data, 'telephony.externalcall.register');
    $call_response = $response['result'];
    if ( $call_response['CALL_ID'] ) {
      $result = array_merge($data, $call_response);
      $this->model->copyfrom( $result );
      $this->model->save();
      if ( $call_response['CRM_ENTITY_ID'] ) {
        $contact_query = array(
          'FILTER' => array('ID' => $call_response['CRM_ENTITY_ID']),
          'SELECT' => array('NAME', 'LAST_NAME')
        );
        $response = $this->btrx->request($contact_query, 'crm.contact.list');
        $contact_response = $response['result'][0];
        echo $contact_response['NAME'] . $contact_response['LAST_NAME'];
      } else {
        echo $this->model['PHONE_NUMBER'];
      }
    }
    return;
  }

  public function put() {
    $id = $this->f3->get('PARAMS.id');
    if ( $this->not_correct($id) ) {
      $this->response(400, 'Id incorrect or empty');
    }
    elseif ( $this->not_exist($id) ) {
      $this->response(400, 'Id does not exist' );
    }
    else {
      $data = array();
      parse_str($this->f3->get('BODY'), $data);
      $chk_result = $this->model->check($data);
      if ( empty($data) ) {
        $this->response(400, 'Empty request');
      }
      elseif ( $chk_result !== true ) {
        $this->response(400, 'Bad Request', $chk_result);
      }
      else {
        $this->response(200, 'Record updated', $this->model->put_by_id($data));
      }
    }
  }

  public function delete() {}
}
?>