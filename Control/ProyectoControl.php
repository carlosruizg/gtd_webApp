<?php
    require_once '../Objects/Proyecto.php';
    require_once '../Model/ProyectoModel.php';
    require_once '../Model/StuffModel.php';

    
    class ProyectoControl {
        
    public function getAllProyectoByIdUsuario($idUsuario){
        if(!is_numeric($idUsuario)){
            die("Id Usuario no es tipo entero valido.");
        }
        else{
            $stuffModel = new StuffModel();
            $stuffList = $stuffModel->selectStuffByUduarioId($idUsuario);
            
            $projectModel = new ProyectoModel();
            $projectList = $projectModel->selectAllProyecto();
            
            $res = array();
            foreach($stuffList as $stf){
              
                foreach($projectList as $prj){
                    //Nos quedamos solo con los proyectos de los Stuff de un usuario especifico
                    if($prj->getIdStuff() == $stf->getIdStuff()){
                        $res[]=$prj;
                    }
                }
            }
            
            return $res;
            
        }
    }
    }
?>
