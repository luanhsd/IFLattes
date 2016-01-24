<?php
// ### LISTA ### //
require_once '../../dao/ListaDAO.php';

if (!empty($_POST['links']) && !empty($_POST['password'])){
    
    $passwdGenerated = md5($_POST['password']);
    
    if ($passwdGenerated == "9eb71ab7420eb452a22787ca4fab501b"){
        
        // Inicia o construtor da classe
        $Lista = new Lista();

        // Inicia o Data Access Object da classe
        $ListaDAO = new ListaDAO();
        
        $linkLattes = explode("\n", $_POST['links']);
        
        foreach($linkLattes as $cont => $l){
            
            $splitLattes = explode("/", $linkLattes[$cont]);
            $idLattes    = trim($splitLattes[3]);
            $urlLattes   = $linkLattes[$cont];
            
            //$returnData = $ListaDAO->GetDataCur($idLattes);
            
            $DataSetterLista = $ListaDAO->DataSetter($Lista,$idLattes,$urlLattes,null);
            
            if($ListaDAO->InsertData($DataSetterLista) == TRUE){
                $insertLattes = TRUE;
            }            
        }
        
        if($insertLattes == TRUE){
            echo ("<script>alert('curriculos inseridos com sucesso!');window.location.href='../../links.html'</script>");
        }
        
    } else {
        echo ("<script>alert('Senha incorreta!');window.location.href='../../links.html'</script>");
    }
    
}else{
    echo ("<script>alert('pagina nao permitida');window.location.href='../../index.html'</script>");
}