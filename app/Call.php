<?php

class Call extends Model {

  const PROPERTIES = array(
    'phoneFrom' => 'numeric|min_length,2|max_length,11',
    'phoneTo' => 'numeric|min_length,2|max_length,11',
    'startAt' => 'regex,/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})?$/',
    'endAt' => 'regex,/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})?$/',
    'answeredAt' => 'regex,/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})?$/',
    'status' => 'numeric|max_length,2',
    'record' => 'url',
    'deleted' => 'numeric|max_length,2'
  );

  public function __construct(DB\Jig $db, $id) {
    parent::__construct($db, $id);
  }

  public function post_create($data) {
    $this->load(array('@_id = ?', 'qweqweqweqwe'));
    $this->user = $data['user'];
    $this->phone = $data['phone'];
    $this->startAt = date('c');
    $this->type = 2;
    $this->save();
    return 2;
  }

  public function load_by_id($id) {
    $query = array('@ASTERISK_CALL_ID = ?', $id);
    return $this->load($query);
  }

  // public function get_by_phone($phone) {
  //   return $this->db->exec('SELECT * FROM calls WHERE phoneFrom LIKE :phone OR phoneTo LIKE :phone', array(':phone'=>"%$phone%"));
  // }

}

?>