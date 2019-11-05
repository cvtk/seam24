<?php

class UpdateController extends Controller {

  public function __construct() {
    parent::__construct('Call');
  }

  public function post() {
    $post = $this->get_post_data();
    $query = array('@ASTERISK_CALL_ID = ?', $post['ASTERISK_CALL_ID']);
    $this->model->load($query);
    $this->model->copyfrom($post);
    $this->model->save();
    echo $this->model['CALL_ID'];
  }

  public function get() {}

  public function put() {}

  public function delete() {}
}
?>