<?php 
    function _is_logged_in() {
        if(isset($_SESSION['author_id'])){
            return true;        
        } else {
            return false;
        }
    }
?>