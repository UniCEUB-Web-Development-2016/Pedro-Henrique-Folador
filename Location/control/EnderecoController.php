<?php
include_once "model/Request.php";
include_once "model/Endereco.php";
include_once "database/DatabaseConnector.php";
class EnderecoController
{
    public function register($request)
    {
        $params = $request->get_params();
        $endereco = new Endereco ($params["logradouro"],
            $params["cidade"],
            $params["estado"],
            $params["bairro"]);
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($endereco));
    }
    private function generateInsertQuery($endereco)
    {
        $query =  "INSERT INTO endereco (logradouro, cidade, estado, bairro) VALUES 
        ('".$endereco->getLogradouro()."','".
            $endereco->getCidade()."','".
            $endereco->getEstado()."','".
            $endereco->getBairro()."')";
        return $query;
    }
    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT *  FROM endereco WHERE " . $crit);

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
            $result = $conn->query("UPDATE endereco SET " . $key . " =  '" . $value . "' WHERE idendereco = '" . $params["idendereco"] . "'");
        }
        return $result;
    }

    public function delete($request)
    {
        $params = $request->get_params();
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();
        $result = $conn->query("DELETE FROM endereco WHERE idendereco = '" . $params["idendereco"] . "'");
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