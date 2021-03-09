<?php


class modelRegistration
{
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $minLenghtPassword;
    private $maxLenghtPassword;
    private $minLengthName;
    private $maxLengthName;
    private $mysql;
    public $error = [];

    function __construct($first_name, $last_name, $email, $password, $mysql)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->mysql = $mysql;
        $this->minLenghtPassword = 7;
        $this->maxLenghtPassword = 20;
        $this->minLengthName = 3;
        $this->maxLengthName = 20;

    }

    public function index()
    {
        if ($this->checkEmailBD()) {
            if ($this->checkEmail()) {
                if ($this->checkFirstName()) {
                    if ($this->checkLastName()) {
                        if ($this->checkPassword()) {
                            if ($this->addAcсountBD()) {
                                return true;
                            }
                        }
                    }
                }
            }
        } else {
            $this->errorOutput();
            return false;
        }
    }

    public function checkFirstName()
    {
        if (isset($this->first_name)) {
            if (strlen($this->first_name) < $this->minLengthName || strlen($this->first_name) > $this->maxLengthName) {
                $this->error[] = 'Длина имени от 3 до 20 символов';
                return false;
            } else {
                $first_name = htmlspecialchars($this->first_name, ENT_QUOTES);
                return $first_name;
            }
        }
    }

    public function checkLastName()
    {
        if (isset($this->last_name)) {
            if (strlen($this->last_name) < $this->minLengthName || strlen($this->last_name) > $this->maxLengthName) {
                $this->error[] = 'Длина фамилии от 3 до 20 символов';
                return false;
            } else {
                $last_name = htmlspecialchars($this->last_name, ENT_QUOTES);
                return $last_name;
            }
        }
    }

    public function checkEmail()
    {
        if (isset($this->email)) {
            if (!preg_match("/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i", $this->email)) {
                $this->error[] = 'Вы ввели неверный email';
                return false;
            } else {
                return true;
            }
        }
    }

    public function checkPassword()
    {
        if (isset($this->password)) {
            if (strlen($this->password) > $this->minLenghtPassword || strlen($this->password) < $this->maxLenghtPassword) {
                if (preg_match("/^\S*(?=\S{7,30})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $this->password)) {
                    return true;
                } else {
                    $this->error[] = 'Пароль должен содержать цифры и буквы латинского алфавита, хотябы с одной буквой верхнего регистра!';
                    return false;
                }
            } else {
                $this->error[] = 'Пароль от 7 до 14 символов';
                return false;
            }
        }
    }

    public function addAcсountBD()
    {
        $first_name = $this->first_name;
        $last_name = $this->last_name;
        $email = $this->email;
        $password = $this->password;
        $mysql = $this->mysql;
        $password = password_hash($this->password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (first_name, last_name, email, password)
  VALUES ( '$first_name' , '$last_name' ,'$email' , '$password' )";
        $result = mysqli_query($mysql, $query) or die("Ошибка " . mysqli_error($mysql));
        if ($result) {
            header('Location: success_auth.php');
        }
        mysqli_close($mysql);
    }

    public function checkEmailBD()
    {
        $email = $this->email;
        $mysql = $this->mysql;
        $query = mysqli_query($mysql, "SELECT email FROM users WHERE email = '$email'");
        if ($query->num_rows > 0) {
            $this->error[] = 'Данный email уже зарегестрирован!';
            return false;
        } else {
            return true;
        }
    }

    public function errorOutput()
    {
        foreach ($this->error as $value) {
            return $value;
        }
    }
}