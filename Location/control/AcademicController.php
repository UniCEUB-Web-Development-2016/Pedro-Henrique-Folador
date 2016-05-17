<?php
include_once "model/Request.php";
include_once "model/Academic.php";
include_once "database/DatabaseConnector.php";
class AcademicController
{
    public function register($request)
    {
        $params = $request->get_params();
        $academic = new Academic ($params["institution"],
            $params["period"],
            $params["formation"],
            $params["studyArea"],
            $params["note"],
            $params["activitiesGroups"],
            $params["description"]);
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($academic));
    }
    private function generateInsertQuery($academic)
    {
        $query =  "INSERT INTO academiceducation (institution, period, formation, studyArea, note, activitiesGroups, description ) VALUES 
        ('".$academic->getInstitution()."','".
            $academic->getPeriod()."','".
            $academic->getFormation()."','".
            $academic->getStudyArea()."','".
            $academic->getNote()."','".
            $academic->getActivitiesGropus()."','".
            $academic->getDescription()."')";
        return $query;
    }
}