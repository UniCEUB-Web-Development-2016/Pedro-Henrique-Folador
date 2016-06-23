<?php
include_once "model/Request.php";
include_once "control/UserController.php";
include_once "control/AcademicController.php";
include_once "control/ExperienceController.php";
include_once "control/EnderecoController.php";

class ResourceController
{
    private $controlMap =
        [
            "experience" => "ExperienceController",
            "user" => "UserController",
            "academic" => "AcademicController",
            "end" => "EndController",
        ];
    public function createResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->register($request);
    }
    public function searchResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->search($request);
    }

    public function updateResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->update($request);
    }

    public function deleteResource($request)
    {
        return (new $this->controlMap[$request->get_resource()]())->delete($request);
    }
}