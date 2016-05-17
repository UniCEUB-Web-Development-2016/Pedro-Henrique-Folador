<?php
class DatabaseConnector
{
    private $ip;
    private $db_name;
    private $type;
    private $port;
    private $user;
    private $password;
    public function __construct($ip, $db_name, $type,$port, $user, $password)
    {
        $this->ip = $ip;
        $this->db_name = $db_name;
        $this->type = $type;
        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getDbName()
    {
        return $this->db_name;
    }

    /**
     * @param mixed $db_name
     */
    public function setDbName($db_name)
    {
        $this->db_name = $db_name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getConnection()
    {
        $stringPDO = $this->type.":host=".$this->ip.";dbname=".$this->db_name;

        try{
            $connection = new PDO($stringPDO,
                $this->user,
                $this->password);
        }catch(PDOException $e)
        {
            var_dump($e);
        }
        return $connection;
    }

}