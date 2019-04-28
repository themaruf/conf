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


    public function is_valid_paper($paper_id){
        $this->db->from('papers');  
        $this->db->where('paper_id', $paper_id);

        return ($this->db->get()->num_rows() == 1);
    }
    
}
?>