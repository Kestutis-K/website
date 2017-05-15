<?php

class Post extends Main_class {

    protected static $db_table = "posts";
    protected static $db_table_fields = array('id', 'title', 'content', 'photo', 'active', 'created_at');
    public $id;
    public $title;
    public $content;
    public $photo;
    public $active;
    public $created_at;
    public $tmp_path;

    public static function find_active_3() {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE active = 1 LIMIT 3");
}

    public static function find_active() {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE active = 1 ");
    }

    public function picture_path()
    {
        return $this->upload_directory . DS . $this->photo;
    }

    public function poster($post, $file) {
        if(isset($file) && ($file['size'] > 0)) {
            $this->photo = $file['name'];
            $this->size =$file['size'];
            $this->tmp_path =$file['tmp_name'];
            $this->type =$file['type'];

            $target_path = SITE_ROOT . DS . $this->picture_path();
            $temp = explode(".", $this->photo);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $this->photo = basename($target_path).$newfilename;
            move_uploaded_file($this->tmp_path, $target_path . $newfilename);
            unset($this->tmp_path);
        }
        $this->title = $post['title'];
        $this->content = $post['content'];
        $this->active = $post['active'];
        $this->created_at = date("Y/m/d");
        $this->save();
    }



}


?>
