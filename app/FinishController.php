<?php

class FinishController extends Controller {

  public function __construct() {
    parent::__construct('Call');
  }

  public function get() {}

  public function post() {
    $post = $this->get_post_data();
    if ( $this->model->load_by_id($post['ASTERISK_CALL_ID']) ) {
      $this->model->copyfrom($post);
      $data = array_merge($this->model->cast(), array(
        'DURATION' => date('c') - strtotime($this->model['CALL_START_DATE']),
        'ADD_TO_CHAT' => 1
      ));
      $response = $this->btrx->request($data, 'telephony.externalcall.finish');
      $this->model->erase();
    } else {

    }
  }

  public function put() {}

  public function delete() {}
}
?>