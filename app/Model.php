<?php

class Model extends \DB\Jig\Mapper {

  protected $table;

  public function __construct($db, $file) {
    $this->file = $file;
    parent::__construct($db, $file);
  }

  // public function getRules() {
  //   return $this->rules;
  // }

  // public function gen_uid($l = 5) {
  //   return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, $l);
  // }

  // public function is_unique($id) {
  //   return empty( $this->db->exec('SELECT * FROM ' . $this->table . 
  //     ' WHERE id=?', $id ) );
  // }

  // public function get_all() {
  //   return $this->db->exec('SELECT * FROM ' . $this->table . ' WHERE deleted<>1');
  // }

  // public function get_by_id($id) {
  //   return $this->db->exec('SELECT * FROM ' . $this->table . ' WHERE id=? AND deleted<>1', $id);
  // }

  // public function put_by_id($data = array()) {
  //   foreach ( $this->rules as $property => $value) {
  //     if ( array_key_exists($property, $data) ) {
  //       $this->set($property, $data[$property]);
  //     }
  //   }
  //   $this->save();
  //   return $this->cast();
  // }

  // public function delete_by_id($id) {
  //   return $this->db->exec('UPDATE ' . $this->table . ' SET deleted=1 WHERE id=?', $id);
  // }

}

?>