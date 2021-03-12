<?php


class ModelSharingAccess
{
    private $mysql;
    private $session;

    public function __construct($mysql, $session)
    {
        $this->mysql = $mysql;
        $this->session = $session;
    }

    public function getUserFromBD()
    {
        $query = mysqli_query($this->mysql, "SELECT * FROM users");
        for ($data = []; $row = mysqli_fetch_assoc($query); $data[] = $row) ;
        foreach ($data as $result) {
            if ($result['email'] != $this->session) {
                echo "<div class='list-users'><input type='checkbox' name='user_list[]' value=" . $result['id'] . " /><li><div class='fio-list'>" . $result['first_name'] . " " . $result['last_name'] . "</div><div class='email-list'><p>Email для связи:</p><h2>" . $result['email'] . "</h2></div></li></div>";
            }
        }
    }

    public function getAccessFromBD()
    {
        $query = mysqli_query($this->mysql, "SELECT * FROM access 
INNER JOIN users_access ua ON access.id = ua.id_access 
INNER JOIN users u ON ua.id_users = u.id WHERE u.email = '$this->session'");
        for ($data = []; $row = mysqli_fetch_assoc($query); $data[] = $row) ;
        foreach ($data as $result) {
            echo "<div class='list-users'><input type='checkbox' name='access_list[]' value=" . $result['id_access'] . " /><li><div class='access-title'>" . $result['title'] . "</div><div class='project-title'>" . $result['title_project'] . "</div></li></div>";
        }
    }

    public function getArray()
    {
        $user_list = $_POST['user_list'];
        $access_list = $_POST['access_list'];
        foreach ($user_list as $value) {
            foreach ($access_list as $item) {
                $query = "INSERT INTO users_access (id_users, id_access)
  VALUES ('$value', '$item');";
                $result = mysqli_query($this->mysql, $query) or die("<div class='success-added-access'><h1>Эти данные уже есть у этого пользователя!</h1></div><div class='error-access'><a href='sharing_access.php'>Вернуться к обмену доступами</a></div>");
            }
        }
        if ($result) {
            echo "<div class='success-added-access'><h1>Данные успешно переданы!</h1></div>";
            echo "<div class='error-access'><a href='sharing_access.php'>Вернуться к обмену доступами</a></div>";
        }
    }
}