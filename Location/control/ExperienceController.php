<?php
include_once "model/Request.php";
include_once "model/Experience.php";
include_once "database/DatabaseConnector.php";
class ExperienceController
{
    public function register($request)
    {
        $params = $request->get_params();
        $experience = new Experience($params["companyName"],
            $params["title"],
            $params["location"],
            $params["period"],
            $params["codExperience"],
            $params["description"]);

        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($experience));
    }
    private function generateInsertQuery($experience)
    {
        $query =  "INSERT INTO experience (companyName, title, location,  period, codExperience, description) VALUES 
        ('".$experience->getCompanyName()."','".
            $experience->getTitle()."','".
            $experience->getLocation()."','".
            $experience->getPeriod()."','".
            $experience->getCodExperience()."','".
            $experience->getDescription()."')";
        return $query;
    }
    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT companyName, title, location,  period, codExperience, description FROM experience WHERE " . $crit);

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
            $result = $conn->query("UPDATE experience SET " . $key . " =  '" . $value . "' WHERE codExperience = '" . $params["codExperience"] . "'");
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