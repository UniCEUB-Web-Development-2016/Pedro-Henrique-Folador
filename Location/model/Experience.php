<?php
class Experience
{
    private $companyName;
    private $title;
    private $location;
    private $period;
    private $description;
    private $codExperience;
    public function __construct($companyName, $title,
                                $location, $period,$codExperience,$description)
    {
        $this->companyName = $companyName;
        $this->title = $title;
        $this->location = $location;
        $this->period = $period;
        $this->codExperience = $codExperience;
        $this->description = $description;

    }

    /**
     * @return mixed
     */
    public function getCodExperience()
    {
        return $this->codExperience;
    }

    /**
     * @param mixed $codExperience
     */
    public function setCodExperience($codExperience)
    {
        $this->codExperience = $codExperience;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     * @return User
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return User
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     * @return User
     */
    public function setLocation($location)
    {
        $this->location = $location;
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

}