<?php
class Academic
{
    private $institution;
    private $period;
    private $formation;
    private $studyArea;
    private $note;
    private $activitiesGroups;
    private $description;
    private $codAcademic;

    /**
     * @return mixed
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * @param mixed $institution
     * @return User
     */
    public function setInstitution($institution)
    {
        $this->institution = $institution;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     * @return User
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * @param mixed $formation
     * @return User
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudyArea()
    {
        return $this->studyArea;
    }

    /**
     * @param mixed $studyArea
     * @return User
     */
    public function setStudyArea($studyArea)
    {
        $this->studyArea = $studyArea;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     * @return User
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getactivitiesGroups()
    {
        return $this->activitiesGroups;
    }

    /**
     * @param mixed $activitiesGroups
     * @return User
     */
    public function setactivitiesGroups($activitiesGroups)
    {
        $this->activitiesGroups = $activitiesGroups;
        return $this;
    }
     /**
     * @return mixed
     */
    public function getCodAcademic()
    {
        return $this->codAcademic;
    }

    /**
     * @param mixed $codAcademic
     * @return User
     */
    public function setCodAcademic($codAcademic)
    {
        $this->codAcademic = $codAcademic;
        return $this;
    }

    public function __construct($institution, $period,
                                $formation, $studyArea,$note,
                                $activitiesGroups, $codAcademic, $description )
    {
        $this->institution = $institution;
        $this->period = $period;
        $this->formation = $formation;
        $this->studyArea = $studyArea;
        $this->note = $note;
        $this->activitiesGroups = $activitiesGroups;
        $this->codAcademic = $codAcademic;
        $this->description = $description;

    }

}