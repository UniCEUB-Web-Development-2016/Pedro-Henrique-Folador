<?php
include_once "model/Request.php";
include_once "model/User.php";
include_once "database/DatabaseConnector.php";
class UserController

{
    private $requiredParameters = array('firstName', 'lastName', 'email', 'password'     );

    public function register($request)
    {
        $params = $request->get_params();
        $user = new User($params["firstName"],
            $params["lastName"],
            $params["email"],
            $params["password"]);

        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");

        $conn = $db->getConnection();

        ($user);

        $conn->exec($this->generateInsertQuery($user));

    }

    private function generateInsertQuery($user)
    {

        $query = "INSERT INTO user (firstName, lastName, email, password) VALUES ('" . $user->getfirstName() . "','" .
            $user->getlastName() . "','" .
            $user->getEmail() . "','" .
            $user->getpassword() . "')";

        return $query;
    }

    public function findById($iduser)
    {
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT iduser, firstName, lastName, email, password FROM user WHERE iduser = " .$iduser);

        //foreach($result as $row)

        return $result->fetch(PDO::FETCH_OBJ);

    }

    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT iduser, firstName, lastName, email, password FROM user WHERE " . $crit);

        //foreach($result as $row)

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    private function generateCriteria($params)
    {
        $criteria = "";
        foreach ($params as $key => $value) {
            $criteria = $criteria . $key . " LIKE '%" . $value . "%' OR ";
        }

        return substr($criteria, 0, -4);
    }

    public function update($request)
    {
        $params = $request->get_params();
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();
        foreach ($params as $key => $value) {
            $result = $conn->query("UPDATE user SET " . $key . " =  '" . $value . "' WHERE email = '" . $params["email"] . "'");
        }
        return $result;
    }

    public function delete($request)
    {
        $params = $request->get_params();
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();
        $result = $conn->query("DELETE FROM user WHERE iduser = '" . $params["iduser"] . "'");
        return $result;
    }

    private function isValid($parameters)
    {
        $keys = array_keys($parameters);
        $diff1 = array_diff($keys, $this->requiredParameters);
        $diff2 = array_diff($this->requiredParameters, $keys);
        if (empty($diff2) && empty($diff1))
            return false;
    }
}