<?php
include_once "model/Request.php";
include_once "model/Map.php";
include_once "database/DatabaseConnector.php";
class MapController
{
    public function register($request)
    {
        $params = $request->get_params();
        $map = new Map($params["location"],
            $params["latitude"],
            $params["longitude"]);
        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");
        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($map));
    }
    private function generateInsertQuery($map)
    {
        $query =  "INSERT INTO map (location, latitude, longitude) VALUES 
        ('".$map->getLocation()."','".
            $map->getLatitude()."','".
            $map->getLongitude()."')";
        return $query;
    }
}