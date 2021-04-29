<?php

class Database{
    protected $host = "localhost";
    protected $db = "blog_management";
    // protected $db = "practice";
    protected $username = "riddhesh";
    protected $password = "riddhesh";

    protected $table;
    protected $stmt;
    protected $pdo;

    protected $debug = true;

    public function __construct(){
        try{
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->username, $this->password);
            // if($this->debug){
            //     $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // }
        }catch(PDOException $e){
            //die($this->debug ? $e->message() : "Some Error While Connecting");
        }
    }

    public function query($sql){
        //die($sql);
        //die(var_dump($this->pdo->query($sql)));
        return $this->pdo->query($sql); //executes the DDL statements
        //return $stmt->fetchAll();
    }

    public function table($tableName){
        $this->table = $tableName;
        return $this;
    }

    public function insert($data){
        $keys = array_keys($data);

        $fields = "`".implode("`, `", $keys)."`";
        $placeholder = ":".implode(", :", $keys);
        $sql = "INSERT INTO `{$this->table}` ({$fields}) VALUES ({$placeholder})";

        //die($sql);
        $this->stmt = $this->pdo->prepare($sql);
        //die(var_dump($this->stmt));
        return $this->stmt->execute($data);
    }

    public function rawQueryExecutor($sql){
        //In consistency in rawQueryExecutor as most of the methods are return objects and this method is returning associative array
        //die(var_dump($sql));
        return $this->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function delete(){
        // $where = [
        //     id => ["=", 1]
        // ]
    }

    public function update($table, $data, $condition="1"){
        $columnKeyValue = "";
        $i = 0;
        foreach($data as $key=>$value)
        {
            $columnKeyValue .= "$key = :$key";
            $i++;
            if($i < count($data))
            {
                $columnKeyValue .= ", ";
            }
        }
        $sql = "UPDATE {$table} SET {$columnKeyValue} WHERE {$condition}";
        $this->stmt = $this->pdo->prepare($sql);
        //die(var_dump($this->stmt));
        $this->stmt->execute($data);
        
        return $this;
    }

    protected $whereFields = array();
    protected $whereOperators = array();
    protected $whereValues = array();
    protected $whereConditions = array();
    protected $index = 0;

    // public function where($field, $operator, $value){
    //     $this->stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE {$field} {$operator} :value");

    //     $this->stmt->execute(["value" => $value]);

    //     return $this;
    // }

    public function where($field, $operator, $value){

        $this->whereFields = array();
        $this->whereOperators = array();
        $this->whereValues = array();
        $this->whereConditions = array();
        $this->index = 0;

        //$this->index = 0;
        
        array_push($this->whereFields, $field);
        array_push($this->whereOperators, $operator);
        // array_push($this->whereValues, ["$value" => $value]);
        //$this->whereValues += ["$value" => $value];
        //$this->whereValues["$this->index"] = $value;
        //$this->whereValues += [strval($this->index) => $value];
        // $number = $this->index;
        // settype($number, "string");

        $this->whereValues += [
            ($field."_".$this->index) => $value
        ];
        $this->index++;

        //die(var_dump($this->whereValues));
        //die(var_dump(array_keys($this->whereValues)[0]));
        //$this->index++;

        return $this;
    }

    public function andWhere($field, $operator, $value){
        //var_dump("In AND");
        array_push($this->whereFields, $field);
        array_push($this->whereOperators, $operator);

        $this->whereValues += [
            ($field."_".$this->index) => $value
        ];
        $this->index++;

        // array_push($this->whereValues, ["$value" => $value]);
        //$this->whereValues += ["$value" => $value];
        //$this->whereValues[strval($this->index)] = $value;
        //$this->whereValues += [strval($this->index) => $value];
        //$this->index++;
        array_push($this->whereConditions, "AND");

        return $this;
    }

    public function orWhere($field, $operator, $value){
        //var_dump("In OR");
        array_push($this->whereFields, $field);
        array_push($this->whereOperators, $operator);

        $this->whereValues += [
            ($field."_".$this->index) => $value
        ];
        $this->index++;

        //array_push($this->whereValues, ["$value" => $value]);
        //$this->whereValues += ["$value" => $value];
        //$this->whereValues[strval($this->index)] = $value;
        //$this->whereValues += [strval($this->index) => $value];
        //$this->index++;
        array_push($this->whereConditions, "OR");

        return $this;
    }

    public function executeWhere(){    

        //dd($this->whereConditions);
        //dd("length is : " . sizeof($this->whereFields));
        //dd($this->whereValues);
        //dd($this->whereOperators);
        $whereSentence = "WHERE";
        $keys = array_keys($this->whereValues);
        //var_dump($keys);
        //die(var_dump($keys[0]));
        //var_dump($this->whereValues["1"]);
        //dd($keys);
        
        $whereSentence .= " {$this->whereFields[0]} {$this->whereOperators[0]} :{$keys[0]}";
        //dd($this->whereFields[0]);

        for($i = 1;$i<sizeof($this->whereFields);$i++){

            //dd($this->whereFields);
            //dd("inside for " . sizeof($this->whereFields));
            // if($i == 0){
            //     $whereSentence .= " {$this->whereFields[$i]} {$this->whereOperators[$i]} :$keys[$i]";
            // }else{
            //     $whereSentence .= " {$this->whereConditions[$i - 1]} {$this->whereFields[$i]} {$this->whereOperators[$i]} :$keys[$i]";
            // }

            //var_dump();
            //dd($this->whereConditions);
            //dd($this->whereOperators);
            //dd($keys);
            //dd($whereSentence);
            $whereSentence .= " {$this->whereConditions[$i - 1]} {$this->whereFields[$i]} {$this->whereOperators[$i]} :{$keys[$i]}";

        }

        $sql = "SELECT * FROM {$this->table} " . $whereSentence;
        //dd($sql);
        // die(var_dump($keys));   
        //die(var_dump($this->whereValues));  
        //die($sql);

        // dd($this->whereValues);
        //dd($sql);
        //var_dump($this);
        //var_dump(" ----- " . $sql);

        $this->stmt = $this->pdo->prepare($sql);

        //die(var_dump($this->whereValues));

        // dd($this);
        $this->stmt->execute($this->whereValues);
        //dd();

        // dd($this->whereFields);
        return $this;

    }

    //Warning: PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: parameter was not defined
    //This warning appears when :placeholder consists of '.'



    public function exists($data){
        $field = array_keys($data)[0];

        return $this->where($field,"=",$data[$field])->executeWhere()->count() ? true : false;
    }

    public function count(){
        return $this->stmt->rowCount();
    }

    public function get(){
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function first(){
        return $this->get()[0];
    }

    public function last(){
        return $this->get()[$this->count() - 1];
    }

    public function lastInsertId(){
        $sql = "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'blog_management' AND TABLE_NAME = '$this->table'"; 
        $id = $this->rawQueryExecutor($sql)[0]->AUTO_INCREMENT;
        return $id;
    }

}

?>
