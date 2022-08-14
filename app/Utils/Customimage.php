<?php

class Customimage 
{


    public $input_name = "";
    public $required = 0;
    public $selected = 0;
    public $new_name = "none";
    public $full_path = "";

    
    public function __construct($input_name, $required = 0, $previous_name = "none")
    {
        $this->input_name = $input_name;
        $this->required = $required;
        $this->previous_name = $previous_name;
        $this->setDirectory();
    }

    private function setDirectory()
    {
        $project_dir = ($_ENV["PROJECT_PATH"] == "/") ? "" : "{$_ENV["PROJECT_NAME"]}/";
        $root_dir = ROOT_DIR;
        $this->full_path = $root_dir . $project_dir;
    }
}