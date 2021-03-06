<?php


class ModelMyAccess
{
    private $email;
    private $title;
    private $description;
    private $title_project;
    private $mysql;

    function __construct($title, $title_project, $description, $mysql)
    {
        $this->email = $_SESSION['email'];
        $this->title = $title;
        $this->title_project = $title_project;
        $this->description = $description;
        $this->mysql = $mysql;
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
    public function addAcсountBD()
    {
        $mysql = $this->mysql;
        $title = $this->checkTitle($this->title);
        $title_project = $this->checkTitle($this->title_project);
        $description = $this->checkDescription($this->description);
        $query1 = "INSERT INTO access (title, title_project, title_description)
  VALUES ('$title', '$title_project', '$description');";
        $result = mysqli_query($mysql, $query1) or die("Ошибка " . mysqli_error($mysql));
        if ($result) {
            echo "<span>Данные добавлены</span>";
        }
        if ($query1) {
            $query2 = mysqli_query($this->mysql, "SELECT id FROM users WHERE email = '$this->email'");
            $num = mysqli_num_rows($query2);
            if ($num > 0) {
                while ($row = mysqli_fetch_array($query2)) {
                    echo $user_id = $row['id'];
                }
            }
            $query3 = mysqli_query($this->mysql, "SELECT id FROM access ORDER BY ID DESC LIMIT 1");
            while ($row3 = mysqli_fetch_array($query3)) {
                echo $acces_id = $row3['id'];
            }
            $query4 = "INSERT INTO users_access (id_users, id_access)
  VALUES ('$user_id', '$acces_id');";
            $result4 = mysqli_query($mysql, $query4) or die("Ошибка " . mysqli_error($mysql));
            if ($result4) {
                echo "<span>Данные добавлены</span>";
            }
        }
    }
}