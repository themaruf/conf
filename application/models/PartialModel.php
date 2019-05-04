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

    public function is_valid_recovery_identity($recovery_identity)
    {
        $this->db->from('authors');  
        $this->db->where('recovery_identity', $recovery_identity);
        return ($this->db->get()->num_rows() == 1);
    }

    public function recovery_identity_exist($email)
    {
        $this->db->from('authors');
        $this->db->where('email', $email);
        $this->db->where('recovery_identity IS NOT NULL'); //recovery_identity is exist
        return ($this->db->get()->num_rows() == 1);
    }

    public function insert_recovery_identity($email, $recovery_identity)
    {
        $recovery_data = array(
            'recovery_identity' => $recovery_identity
        );
        $this->db->where('email',$email);
        return $this->db->update('authors', $recovery_data);
    }  

    public function change_password($recovery_identity, $password)
    {
        $this->db->trans_start();

        $this->db->where('recovery_identity',$recovery_identity);
        $this->db->update('authors', $password);

        $password_data = array(
            'recovery_identity' => NULL
        );

        $this->db->where('recovery_identity',$recovery_identity);
        $this->db->update('authors', $password_data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE){
            return false;
        }
        else{
            return true;
        }
    }  


    
}
?>