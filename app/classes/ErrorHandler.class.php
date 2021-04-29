<?php

class ErrorHandler{

    protected $errors = [];

    public function addError($error, $key=null){
        echo "Error: ";
        var_dump($error);
        echo "<br> Key: ";
        var_dump($key);
        if($key){
            $this->errors[$key][] = $error;
        }else{
            $this->errors[] = $error;
        }
        echo "<br> Errors:";
        var_dump($errors);
    }

    public function hasErrors(){
        return count($this->all()) ? true : false;
    }

    public function has($key){
        return isset($this->errors[$key]);
    }

    public function all($key = null){
        return isset($this->errors[$key]) ? $this->errors[$key] : $this->errors;
    }

    public function first($key){
        return isset($this->errors[$key]) ? $this->all()[$key][0] : false;
    }

}

?>