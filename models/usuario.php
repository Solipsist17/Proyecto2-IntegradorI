<?php 

class Usuario {

    private string $username;
    private string $password;
    
    function __construct(string $username, string $password) {
        $this->username = $username;
        $this->password = $password;
    }

}

?>