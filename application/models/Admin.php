<?php
class Admin extends CI_Model 
{
        //touched
        public function exists($email)
        {
            $this->db->from('admins');  
            $this->db->where('email', $email);

            return ($this->db->get()->num_rows() == 1);
        }
        
        //touched
        public function signup_new_user($first_name, $last_name, $phone, $dob, $email, $password)
        {
            $admin_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone_number' => $phone,
                'dob' => $dob,
                'email' => $email,
                'password' => $password
            );
            return $this->db->insert('admins', $admin_data);          
        }

        //touched
        public function login_admin($email, $password)
        {
            $query = $this->db->get_where('admins', array('email' => $email, 'password' => $password, 'deleted' => 0), 1);

                if($query->num_rows() == 1)
                {
                    $row = $query->row();
                    $this->session->set_userdata('admin_id', $row->admin_id);
                    //var_dump($row);
                    return TRUE;
                }
                return FALSE;
        }

    //touched
    public function get_admin($admin_id){
        $this->db->from('admins');
        $this->db->where('admin_id',$admin_id);
        $this->db->where('deleted',0);
        $query = $this->db->get();

        return $query->row();
    }

    //touched
    public function get_all_papers()
    {
        $this->db->from('papers');
        $this->db->join('paper_author','paper_author.paper_id = papers.paper_id');
        $this->db->where('deleted',0);
        $query=$this->db->get();
        return $query->result();
    }

    //touche
    public function get_last_query(){
        return $this->db->last_query();
    }

    //touched
    public function get_paper_by_id($paper_id){
        $this->db->from('papers');
        $this->db->where('paper_id',$paper_id);
        $query = $this->db->get();
        return $query->row();
    }

    //touched
      public function delete_by_id($paper_id)
      {
        $this->db->trans_start();
        $deleted = array('deleted' => 1);  
        $this->db->where('paper_id', $paper_id);
        $this->db->update('papers',$deleted);

        $this->db->delete('paper_author', array('paper_id' => $paper_id));

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