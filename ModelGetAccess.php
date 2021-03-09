<?php


class ModelGetAccess
{
    private $mysql;
    private $session;

    public function __construct($mysql, $session)
    {
        $this->mysql = $mysql;
        $this->session = $session;
    }

    public function getFromBD()
    {
        $mysql = $this->mysql;
        if (isset($_GET['del'])) {
            $id = $_GET['del'];
            $query = "DELETE FROM access WHERE id=$id";
            $result = mysqli_query($mysql, $query) or die("Ошибка " . mysqli_error($mysql));
        }
        $query = mysqli_query($this->mysql, "SELECT * FROM access 
INNER JOIN users_access ua ON access.id = ua.id_access 
INNER JOIN users u ON ua.id_users = u.id WHERE u.email = '$this->session'");
        for ($data = []; $row = mysqli_fetch_assoc($query); $data[] = $row) ;
        foreach ($data as $result) {
            echo "<ul class='access-list'>" . "<div class='li-item-access-a'><a class='delete-access' href='?del={$result['id_access']}'>Удалить</a></div>" . "<div class='li-item-access'><li class='title'>" . $result['title'] .
                "</li>" . "<li class='title-project'>" . $result['title_project'] . "</li>" .
                "<li class='title_description'>" . $result['title_description'] . "</li></div>" .
                "</ul><br>";
        }
    }
}