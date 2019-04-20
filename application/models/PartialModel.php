<?php
class PartialModel extends CI_Model 
{
    public function return_score_text($score_id){
        switch ($score_id) {
            case -2:
                return "Rejected";
                break;
            case -1:
                return "Weakly Rejected";
                break;
            case 0:
                return "Neutral";
                break;
            case 1:
                return "Weakly Accepted";
                break;
            case 2:
                return "Accepted";
                break;
            
            default:
                return "";
                break;
        }
    }
    
}
?>