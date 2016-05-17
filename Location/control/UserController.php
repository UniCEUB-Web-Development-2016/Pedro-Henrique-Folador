<?php
include_once "model/Request.php";
include_once "model/User.php";
include_once "database/DatabaseConnector.php";
class UserController
{
    public function register($request)
    {
        $params = $request->get_params();
        $user = new User($params["name"],
            $params["lastName"],
            $params["email"],
            $params["password"]);
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($user));
    }
    private function generateInsertQuery($user)
    {
        $query =  "INSERT INTO user (name, lastName, email,  password) VALUES ('".$user->getName()."','".
            $user->getLastName()."','".
            $user->getEmail()."','".
            $user->getPassword()."')";
        return $query;
    }
    public function search($request)
    {
        $params = $request->get_params();
        $sear = $this->generateCriteria($params);
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();
        $result = $conn->query("SELECT name, lastName, email,  password FROM user WHERE ".$sear);
        //foreach($result as $row)
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    private function generateCriteria($params)
    {
        $criteria = "";
        foreach($params as $key => $value)
        {
            $criteria = $criteria.$key." LIKE '%".$value."%' OR ";
        }
        return substr($criteria, 0, -4);
    }
    public function delete ($request)
    {
        $params = $request->get_params();
        $cond = $this->generateDelete($params);
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("DELETE FROM user WHERE " .$cond);
    }
    private function generateDelete($params)
    {
        $criteria = "";
        foreach($params as $key => $value)
        {
            $criteria = $criteria.$key." = '".$value."' AND ";
        }
        return substr($criteria, 0, -4);
    }
}