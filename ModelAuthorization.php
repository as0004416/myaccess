<?php


class modelAuthorization
{
    public $error = [];
    private $email;
    private $password;
    private $mysql;

    function __construct($email, $password, $mysql)
    {
        $this->email = $email;
        $this->password = $password;
        $this->mysql = $mysql;
    }
    public function index(){
        if($this->checkData()){
            return true;
        }else{
            return $this->errorOutput();
        }
    }
    public function checkData()
    {
        $_SESSION['email'] = $this->email;
        $_SESSION['password'] = $this->password;
        $query = mysqli_query($this->mysql, "SELECT  * FROM users WHERE email = '$this->email'");
        $num = mysqli_num_rows($query);
        if ($num > 0) {
            while ($row = mysqli_fetch_array($query)) {
                if (password_verify($this->password, $row['password'])) {
                    return true;
                } else {
                    print_r($this->password);
                    $this->error[] = 'Не верно введен email или пароль!';
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    public function errorOutput()
    {
        foreach ($this->error as $value) {
            return $value;
        }
    }
}