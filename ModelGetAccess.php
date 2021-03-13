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
    public function checkTitle($title){
        $maintitle = strip_tags($title);
        if(strlen($maintitle)<30){
            return $maintitle;
        }else{
            return substr($maintitle, 0, 30);
        }
    }
    public function checkDescription($description){
        $descriptions =  strip_tags($description);
        if(strlen($descriptions)<200){
            return $description;
        }else{
            return substr($descriptions,0,200);
        }
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
            echo "<ul class='access-list'>" . "<div class='li-item-access-a'><a class='delete-access' href='?del={$result['id_access']}'>Удалить</a><a class='delete-access' href='edit_access.php?edit={$result['id_access']}'>Изменить</a></div>" . "<div class='li-item-access'><li class='title'>" . $this->checkTitle($result['title']) .
                "</li>" . "<li class='title-project'>" . $this->checkTitle($result['title_project']) . "</li>" .
                "<li class='title_description'>" . $this->checkDescription($result['title_description']) . "</li></div>" .
                "</ul><br>";
        }
    }

    public function getAccess()
    {
        $mysql = $this->mysql;
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $query = "SELECT * FROM access WHERE id=$id";
            $result = mysqli_query($mysql, $query) or die("Ошибка " . mysqli_error($mysql));
        }
        $query = mysqli_query($this->mysql, "SELECT * FROM access 
INNER JOIN users_access ua ON access.id = ua.id_access 
INNER JOIN users u ON ua.id_users = u.id WHERE u.email = '$this->session' and access.id = '$id'");
        for ($data = []; $row = mysqli_fetch_assoc($query); $data[] = $row) ;
        foreach ($data as $result) {
            $id_access = $result['id_access'];
            echo "<div class='content-access'><div class='edit-title'>" . $result['title'] . "</div><div class='edit-title_project'>" . $result['title_project'] . "</div><div class='edit-title_description'> " . $result['title_description'] . "</div></div>";
        }
        if (!empty($_POST['title']) || !empty($_POST['title_project']) || !empty($_POST['description'])) {
            $title = $this->checkTitle($_POST['title']);
            $title_project = $this->checkTitle($_POST['title_project']);
            $title_description = $this->checkDescription($_POST['description']);
            $query = mysqli_query($this->mysql, "UPDATE access SET title = '$title',title_project = '$title_project',title_description = '$title_description' WHERE id = '$id_access'") or die("Ошибка " . mysqli_error($mysql));
            if ($query) {
                header("Location: edit_access.php?edit=$id_access");
            }
        }
    }
}