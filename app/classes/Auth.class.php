<?php

class Auth{
    protected $database;

    protected $hash;
    protected $table = "users";
    protected $authSession = "user";

    public function __construct(Database $database, Hash $hash){
        $this->database = $database;
        $this->hash = $hash;
    }

    // public function build(){
    //     return $this->database->query("CREATE TABLE IF NOT EXISTS {$this->table}(id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, email VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(20) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL)");
    // }

    public function create($data){
        if(isset($data['password'])){
            $data['password'] = $this->hash->make($data['password']);
        }
        return $this->database->table($this->table)->insert($data);
    }

    public function signIn($data){
        $user = $this->database->table($this->table)->where('email','=',$data['email'])->executeWhere();

        if($user->count() == 1){
            $user = $user->first();

            if($this->hash->verify($data['password'], $user->password)){
                $this->setAuthSession($user->id);
                return true;
            }
        }
        return false;
    }

    public function setAuthSession($id){
        $_SESSION[$this->authSession] = $id;
    }

    public function check(){
        return isset($_SESSION[$this->authSession]);
    }

    public function signout(){
        setcookie('token','',time()-5000);
        $user_id = $_SESSION[$this->authSession];

        $sql = "DELETE FROM tokens WHERE user_id = {$user_id} and is_remember = 1 ";
        $this->database->query($sql);

        //die($user_id)

        unset($_SESSION[$this->authSession]);

        //

    }

    public function resetUserPassword(string $token, string $password){
        $password = $this->hash->make($password);

        return $this->database->query("UPDATE users, tokens SET users.password = '$password' WHERE users.id = tokens.user_id and tokens.token = '$token'");
    }

    /**
     * User function
     * Returns 
     *      User    -   If user found
     *      false   -   If user is NOT found 
     */

    public function user(){
        if(!$this->check()){
            //die(var_dump('hi-'));
            return false;
        }
        //die(var_dump('hi-'));
        $user = $this->database->table($this->table)->where('id','=',$_SESSION[$this->authSession])->executeWhere()->first();
        return $user;
    }

}

?>