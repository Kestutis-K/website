<?php

class Main_class {

  public $errors = array();
  public $upload_directory = "images";


  public static function find_all() {
    return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
  }


  public static function find_by_id($id) {
    global $database;
    $result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");
    return !empty($result_array) ? array_shift($result_array) : FALSE;
  }

    public static function find_item($id) {
        global $database;
        $result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE item_id = $id ");
        return !empty($result_array) ? array_shift($result_array) : FALSE;
    }


    public static function find_items($id) {
        global $database;
        $photos = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE item_id = $id ORDER BY id desc");
        return $photos;
    }


  public static function find_by_query($sql) {
    global $database;
    $result_set=$database->myquery($sql);
    $object_array = array();
    while ($row = mysqli_fetch_array($result_set)) {
      $object_array[] = static::instantation($row);
    }
    return $object_array;
  }

  public static function instantation($record) {
    $calling_class = get_called_class();
    $object = new $calling_class;
    foreach ($record as $attribute => $value) {
      if ($object->has_attribute($attribute)) {
        $object->$attribute = $value;
      }
    }
    return $object;
  }


  private function has_attribute($attribute) {
    return property_exists($this, $attribute);
  }

  public function pass_hash($password){
    return password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
  }

  // public function pass_verify($password){
  //   return password_verify($password, ));
  // }


  protected function properties() {
		$properties = array();
		foreach (static::$db_table_fields  as $db_field) {
			if(property_exists($this, $db_field)) {
				$properties[$db_field] = $this->$db_field;
			}
		}
		return $properties;
	}


  protected function clean_properties() {
    global $database;
    $clean_properties = array();
    foreach ($this->properties() as $key => $value) {
      $clean_properties[$key] = $database->escape_string($value);
    }
    return $clean_properties;
  }


  public function save() {
    return isset($this->id) ? $this->update() : $this->create();
  }


  public function create() {
		global $database;
		$properties = $this->clean_properties();
		$sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
		$sql .= "VALUES ('". implode("','", array_values($properties)) ."')";
		if($database->myquery($sql)) {
			$this->id = $database->the_insert_id();
			return true;
		} else {
			return false;
		}
	}


  public function update() {
    global $database;
    $properties = $this->clean_properties();
    $properties_pairs = array();
    foreach ($properties as $key => $value) {
      $properties_pairs[] = "{$key}= '{$value}'";
    }
    $sql = "UPDATE  " .static::$db_table . "  SET ";
		$sql .= implode(", ", $properties_pairs);
		$sql .= " WHERE id= " . $database->escape_string($this->id);
    $database->myquery($sql);
    return (mysqli_affected_rows($database->connection) == 1) ? TRUE : FALSE;
  }


  public function delete() {
      global $database;
      $sql = "DELETE FROM  " .static::$db_table . "  ";
      $sql .= "WHERE id=" . $database->escape_string($this->id);
      $sql .= " LIMIT 1";
      $database->myquery($sql);
      return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    public function picture_path()
    {
        return $this->upload_directory . DS . $this->filename;
    }




}

?>
