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
            $params["iduser"],
            $params["description"]);
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($academic));
    }
    private function generateInsertQuery($academic)
    {
        $query =  "INSERT INTO academiceducation (institution, period, formation, studyArea, note, activitiesGroups, iduser, description ) VALUES 
        ('".$academic->getInstitution()."','".
            $academic->getPeriod()."','".
            $academic->getFormation()."','".
            $academic->getStudyArea()."','".
            $academic->getNote()."','".
            $academic->getactivitiesGroups()."','".
            $academic->getiduser()."','".
            $academic->getDescription()."')";
        return $query;
    }
    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");

        $conn = $db->getConnection();

        $result = $conn->query("SELECT institution, period, formation, studyArea, note, activitiesGroups, iduser, description  FROM academiceducation WHERE " . $crit);

        //foreach($result as $row)

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    private function generateCriteria($params)
    {
        $criteria = "";
        foreach ($params as $key => $value) {
            
            if (!empty($criteria)) $criteria .= " OR ";

            $criteria = $criteria . $key . " LIKE '%" . $value . "%' ";
        }

        return substr($criteria, 0, -4);
    }

    public function update($request)
    {
        $params = $request->get_params();
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();
        foreach ($params as $key => $value) {
            $result = $conn->query("UPDATE academiceducation SET " . $key . " =  '" . $value . "' WHERE iduser = '" . $params["iduser"] . "'");
        }
        return $result;
    }

    public function delete($request)
    {
        $params = $request->get_params();
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();
        $result = $conn->query("DELETE FROM academiceducation WHERE idacademic = '" . $params["idacademic"] . "'");
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