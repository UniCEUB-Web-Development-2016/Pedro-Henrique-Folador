<?php
include_once "model/Request.php";
include_once "model/Experience.php";
include_once "database/DatabaseConnector.php";
class ExperienceController
{
    public function register($request)
    {
        $params = $request->get_params();

        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();

//        $endereco = new Endereco($params['logradouro'],
//            $params['cidade'],
//            $params['estado'],
//            $params['bairro']);
//
//        $conn->query($this->generateInsertQueryParaEndereco($endereco));
//
//        $idendereco = $db->lastInsertId();

        $experience = new Experience($params["companyName"],
            $params["title"],
            $params["period"],
            $params["description"],
            $params["iduser"],
            $params["idendereco"]);

        $conn->query($this->generateInsertQuery($experience));
    }

    private function generateInsertQuery($experience)
    {
        $query =  "INSERT INTO experience (companyName, title,  period, description, iduser, idendereco) VALUES 
        ('".$experience->getCompanyName()."','".
            $experience->getTitle()."','".
            $experience->getPeriod()."','".
            $experience->getDescription()."','".
            $experience->getiduser()."','".
            $experience->getidendereco()."')";
        return $query;
    }

//    private function generateInsertQueryParaEndereco($endereco)
//    {
//        $query =  "INSERT INTO endereco (logradouro, cidade) VALUES 
//        ('".$endereco->getLogradouro()."','".
//            $endereco->getCidade()."','".
//            $endereco->getEstado()."','".
//            $endereco->getBairro()."')";
//        return $query;
//    }

    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT companyName, title,  period, description, iduser, idenreco FROM experience WHERE " . $crit);

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
            $result = $conn->query("UPDATE experience SET " . $key . " =  '" . $value . "' WHERE Iduser = '" . $params["Iduser"] . "'");
        }
        return $result;
    }

    public function delete($request)
    {
        $params = $request->get_params();
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();
        $result = $conn->query("DELETE FROM experience WHERE idexperience = '" . $params["idexperience"] . "'");
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