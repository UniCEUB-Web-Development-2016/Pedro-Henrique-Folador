<?php
include_once "model/Request.php";
include_once "control/UserController.php";
include_once "control/AcademicController.php";
include_once "control/ExperienceController.php";
include_once "control/EnderecoController.php";
include_once "control/ExperienceChartController.php";

class ResourceController
{
    private $controlMap =
        [
            "experience" => "ExperienceController",
            "experienceChart" => "ExperienceChartController",
            "user" => "UserController",
            "academic" => "AcademicController",
            "endereco" => "EnderecoController",
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