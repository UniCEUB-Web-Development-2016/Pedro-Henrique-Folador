<?php
include_once "model/Request.php";
include_once "model/Experience.php";
include_once "database/DatabaseConnector.php";
class ExperienceChartController
{
    

    
    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);

        $db = new DatabaseConnector("localhost", "location", "mysql", "", "root", "");

        $conn = $db->getConnection();

         $sql = "SELECT description,count(*) as qtd FROM experience inner join endereco on (endereco.idendereco = experience.idendereco ) inner join user on (user.iduser = experience.iduser)";
        
        if(count($params)>0)
            $sql .= " WHERE " . $crit;

        $sql .=" group by description ";

        $result = $conn->query($sql);

        //foreach($result as $row)

        $dados = $result->fetchAll(PDO::FETCH_ASSOC);
        
        $retorno = array();

        foreach ($dados as $key => $value) {
            $retorno[$key]['label'] = $value['description'];
            $retorno[$key]['value'] = (int) $value['qtd'];
        }
        return $retorno;

    }
    private function generateCriteria($params)
    {
        $criteria = "";
        foreach ($params as $key => $value) {
            $criteria = $criteria . $key . " LIKE '%" . $value . "%' and ";
        }

        return substr($criteria, 0, -4);
    }

    
    
}