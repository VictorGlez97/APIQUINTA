<?php 

function DropAnySession($name_session){
    
    if (isset($_SESSION[$name_session])){

        $_SESSION[$name_session] = null;
        unset( $_SESSION[$name_session] );

    }

}

function CloseSession(){
    
    if ( is_null($_SESSION['identity']) || !$_SESSION['adm'] || empty($_SESSION['identity']) ){
        return true;
    } else {
        return false;
    }

}