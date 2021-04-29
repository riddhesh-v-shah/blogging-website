<?php

class Validator{
    protected $database;
    protected $errorHandler;

    protected $rules = ["required","minlength","maxlength","unique","email"];

    protected $messages = [

        'required' => "This :field field is required",
        'minlength' => "This :field field must be a minimum of :satisfier",
        'maxlength' => "This :field field must be a maximum of :satisfier",
        'email' => "This is not a valid email adress",
        'unique' => "This :field is already taken"

    ];

    public function __construct(Database $database, ErrorHandler $errorHandler){
        $this->database = $database;
        $this->errorHandler = $errorHandler;
    }

    public function check($items, $rules){
        foreach($items as $item => $value){
            if(in_array($item, array_keys($rules))){
                $this->validate([
                    "field" => $item,
                    "value" => $value,
                    "rules" => $rules[$item]
                ]);
            }
        }
        return $this;
    }

    public function validate($item){
        $field = $item['field'];
        foreach($item['rules'] as $rule => $satisfier){
            if(!call_user_func_array([$this, $rule], [$field, $item['value'], $satisfier])){
                //Error Handling
                $this->errorHandler->addError(str_replace([':field', ':satisfier'], [$field, $satisfier], $this->messages[$rule]), $field);
            }
        }
    }

    public function required($field, $value, $satisfier){
        return !empty(trim($value));
    }

    public function minlength($field, $value, $satisfier){
        return mb_strlen($value) >= $satisfier;
    }

    public function maxlength($field, $value, $satisfier){
        return mb_strlen($value) <= $satisfier;
    }

    public function unique($field, $value, $satisfier){
        return !$this->database->table($satisfier)->exists([$field => $value]);
    }

    public function email($field, $value, $satisfier){
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function fails(){
        return $this->errorHandler->hasErrors();
    }

    public function errors(){
        return $this->errorHandler;
    }

}

?>