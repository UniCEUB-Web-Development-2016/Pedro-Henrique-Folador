<?php
class Experience
{
    private $companyName;
    private $title;
    private $period;
    private $description;
    private $iduser;
    private $idendereco;
    public function __construct($companyName, $title,$period,$description,$iduser,$idendereco)
    {
        $this->companyName = $companyName;
        $this->title = $title;
        $this->period = $period;
        $this->description = $description;
        $this->iduser = $iduser;
        $this->idendereco = $idendereco;
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

    /**
     * @return mixed
     */
    public function getIdendereco()
    {
        return $this->idendereco;
    }

    /**
     * @param mixed $idendereco
     */
    public function setIdendereco($idendereco)
    {
        $this->idendereco = $idendereco;
    }

    /**
     * @return mixed
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param mixed $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }
}