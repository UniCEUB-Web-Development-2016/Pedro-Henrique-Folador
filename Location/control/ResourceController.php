<?php
include_once "model/Request.php";
include_once "control/UserController.php";
include_once "control/AcademicController.php";
include_once "control/ExperienceController.php";
include_once "control/MapController.php";

class ResourceController
{
    private $controlMap =
        [
            "experience" => "ExperienceController",
            "user" => "UserController",
            "academic" => "AcademicController",
            "map" => "MapController",
        ];
    public function createResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->register($request);
    }
}