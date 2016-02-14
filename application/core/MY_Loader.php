<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Loader extends CI_Loader{
    function __construct()
    {
        parent::__construct();

    }

    function module($name, $file)
    {
        $mod_path = MODULE_PATH . DS . $name;
        if (!is_dir($mod_path)) {
            //module does not exists. throw new Exception(module does not exist.) or simply return false
            return false;
        }
        $act_path = $mod_path . DS . $file;
        if (!is_dir($mod_path)) {
            //module does not exists. throw new Exception(module does not exist.) or simply return false
            return false;
        }

        $file_path = $act_path . DS . rtrim($file, '.php') . '.php';

        if(!file_exists($file_path)){
            //module file does not exist.
            return false;
        }

        require_once $file_path;

        $class = ucfirst(strtolower($name)).ucfirst(strtolower($file));

        if(!class_exists($class)){
            //throw new Exception(class does not exist);
            return false;
        }
       	return new $class();
    }
}

?>
