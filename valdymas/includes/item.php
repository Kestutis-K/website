<?php

Class Item extends Main_class {

    protected static $db_table = "items";
    protected static $db_table_fields = array('id', 'title', 'description');
    public $id;
    public $title;
    public $description;


    public function delete_item() {
        global $database;
        $sql = "DELETE FROM  " .static::$db_table . "  ";
        $sql .= "WHERE id=" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";
        $database->myquery($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    public function create_item_photo($input) {
        if($input) {
            $this->title = $input['title'];
            $this->description = $input['description'];
            $this->save();

            }
        }
    }

?>