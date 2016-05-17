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
            $params["description"]);

        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($experience));
    }
    private function generateInsertQuery($experience)
    {
        $query =  "INSERT INTO experience (companyName, title, location,  period, description) VALUES 
        ('".$experience->getCompanyName()."','".
            $experience->getTitle()."','".
            $experience->getLocation()."','".
            $experience->getPeriod()."','".
            $experience->getDescription()."')";
        return $query;
    }
}