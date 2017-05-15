<?php

class Photo extends Main_class
{
    protected static $db_table = "photos";
    protected static $db_table_fields = array('id', 'item_id', 'filename', 'type', 'size', "show_title");
    public $id;
    public $item_id;
    public $filename;
    public $type;
    public $size;
    public $show_title;
    public $tmp_path;

    public $errors = array();
    public $upload_errors_array = array(


        UPLOAD_ERR_OK           => "There is no error",
        UPLOAD_ERR_INI_SIZE		=> "The uploaded file exceeds the upload_max_filesize directive in php.ini",
        UPLOAD_ERR_FORM_SIZE    => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
        UPLOAD_ERR_PARTIAL      => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE      => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR   => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE   => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION    => "A PHP extension stopped the file upload."


    );


    public function set_file($file)
    {
        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {
            $this->filename = $file['filename'];
            $this->size = $file['size'];
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
        }
    }





    public function delete_photo()
    {
        if ($this->delete()) {
            $target_path = SITE_ROOT . DS . $this->picture_path();
            return unlink($target_path) ? true : false;
        } else {
            return false;
        }
    }


    public static function find_all_title()
    {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE show_title=1 ORDER BY rand() LIMIT 8");
    }


    public function add_photo_item($file, $show_title, $itm_id)
    {
        $handle = new upload($file);
//        $this->item_id = $itm_id;
//        $this->filename = $key . $file['name'][$key];
//        $this->size = $file['size'][$key];
//        $this->tmp_path = $file['tmp_name'][$key];
//        $this->type = $file['type'][$key];
        if ($handle->uploaded) {
            $temp = explode(".", $handle->file_src_name);
            $newfilename = round(microtime(true));

            $handle->file_new_name_body   = 'eziukas'.$newfilename;
            $handle->file_auto_rename     = true;
            $handle->png_compression      = 3;
            $handle->jpeg_quality         = 70;
            $handle->image_resize         = true;
            $handle->image_x              = 700;
            $handle->image_ratio_y        = true;
            $this->filename               = $handle->file_new_name_body.'.'.$handle->file_src_name_ext;
            $this->size                   = $handle->file_src_size;
            $this->type                   = $handle->file_src_name_ext;
            $this->item_id                = $itm_id;
            if (isset($show_title) && $show_title == '1') {
            $this->show_title             = 1;
                }
            $handle->process(SITE_ROOT. DS.'/images/');
            if ($handle->processed) {
                $handle->clean();
                $this->create();
                $this->id++;
            } else {
                echo 'error : ' . $handle->error;
            }
        }

        //Senas veikiantis kodas - Pradžia
//        foreach ($files['tmp_name'] as $key => $tmp_name) {
//            $this->item_id = $itm_id;
//            $this->filename = $key . $files['name'][$key];
//            $this->size = $files['size'][$key];
//            $this->tmp_path = $files['tmp_name'][$key];
//            $this->type = $files['type'][$key];
//
//            $target_path = SITE_ROOT . DS  . $this->picture_path();
//
//            $temp = explode(".", $this->filename);
//            $newfilename = round(microtime(true)) . '.' . end($temp);
//            $this->filename = basename($target_path) . $newfilename;
//            move_uploaded_file($this->tmp_path, $target_path . $newfilename);
//            unset($this->tmp_path);
//
//            $this->create();
//            $this->id++;
//        }
        //Senas veikiantis kodas - Pabaiga
    }
    public function show_title($id, $show_title) {
        global $database;
        $sql = "UPDATE photos ";
        $sql .= "SET show_title=" . $show_title ." ";
        $sql .= "WHERE id=" . $id;
        $database->myquery($sql);
        //$this->save();
    }
}

?>