<?php
include_once "model/Request.php";
include_once "model/Endereco.php";
include_once "database/DatabaseConnector.php";
class enderecoController
{
    public function register($request)
    {
        $params = $request->get_params();
        $endereco = new endereco($params["bairro"],
            $params["cidade"],
            $params["estado"],
            $params["logradouro"]);
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($endereco));
    }
    private function generateInsertQuery($endereco)
    {
        $query =  "INSERT INTO endereco (bairro, cidade, estado, logradouro) VALUES 
        ('".$endereco->getbairro()."','".
            $endereco->getcidade()."','".
            $endereco->getestado()."','".
            $endereco->getlogradouro()."')";
        return $query;
    }
    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT bairro, cidade, estado, logradouro FROM endereco WHERE " . $crit);

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
            $result = $conn->query("UPDATE endereco SET " . $key . " =  '" . $value . "' WHERE bairro = '" . $params["bairro"] . "'");
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