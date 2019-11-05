<?php

class Controller {
  protected $f3;
  protected $db;
  protected $btrx;
  protected $model;

  const FIELDS = array(
    'USER_PHONE_INNER',
    'PHONE_NUMBER',
    'TYPE',
    'ASTERISK_CALL_ID',
    'RECORD_URL',
    'CALL_ANSWER_DATE',
    'STATUS_CODE'
  );

  public function get_post_data() {
    $post = $this->f3->get('POST');
    $data = array();
    foreach ( $this::FIELDS as $property) {
      if ( array_key_exists($property, $post) && !empty($post[$property]) ) {
        $data[$property] = $post[$property];
      }
    }
    return $data;
  }

  function __construct($model) {
    $this->f3 = Base::instance();
    $this->db = new DB\Jig('db/');
    $this->btrx = new BtrxHelper($this->f3->get('bitrixApiUrl'));
    $this->model = new $model($this->db, $this->f3->get('db'));
  }
}

?>