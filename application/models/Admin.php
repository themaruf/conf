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
        public function paper_exists($paper_id)
        {
            $this->db->from('papers');  
            $this->db->where('paper_id', $paper_id);

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
        $this->db->select('admin_id, first_name, last_name, phone_number, dob, address_line_1, address_line_2, city, country, website, affiliation, description, email, deleted');
        $this->db->from('admins');
        $this->db->where('admin_id',$admin_id);
        $this->db->where('deleted',0);
        $query = $this->db->get();

        return $query->row();
    }

    //touched
    public function saveinfo($admin_id, $admin_data){
        $this->db->where('admins.admin_id',$admin_id);
        return $this->db->update('admins', $admin_data);
    }

    //created
    public function get_assigned_reviewers($paper_id){
        $this->db->select('reviewer_id');
        $this->db->from('paper_reviewer');
        $this->db->where('paper_id', $paper_id);
        $query=$this->db->get();
        return $query->result();
    }

    //created
    public function get_assigned_reviewers_details($paper_id){
        $this->db->select('*');
        $this->db->from('paper_reviewer');
        $this->db->join('reviewers','paper_reviewer.reviewer_id = reviewers.reviewer_id');
        $this->db->where('paper_id', $paper_id);
        $query=$this->db->get();
        return $query->result();
    }


    //created
    public function remove_assigned_reviewers($paper_id){
        $this->db->where('paper_id', $paper_id);
        return ($this->db->delete('paper_reviewer'));
    }

    //created
    //idea is remove assigned first, then insert selected
    public function assign_paper($paper_id, $reviewers){
        $this->db->trans_start();
        $this->remove_assigned_reviewers($paper_id);
        foreach ($reviewers as $reviewer) {
                $paper_rev = array(
                    'reviewer_id' => $reviewer,
                    'paper_id' => $paper_id
                );
                $this->db->insert('paper_reviewer', $paper_rev); 
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            return false;
        }
        else{
            return true;
        }
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

    public function get_co_author_by_id($paper_id){
        $this->db->select('co_author_name0,co_author_email0,co_author_name1,co_author_email1,co_author_name2,co_author_email2,co_author_name3,co_author_email3');
        $this->db->from('paper_author');
        $this->db->where('paper_id',$paper_id);
        $query = $this->db->get();
        return $query->row();
    }
 
    public function get_all_reviewers(){
        $this->db->select('reviewer_id, first_name, last_name, keywords, email');
        $this->db->from('reviewers');
        $query = $this->db->get();
        return $query->result();
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

    public function send_invitation($invitation_id, $email){
        $reviewer_invitation = array(
            'reviewer_invitation_id' => $invitation_id,
            'email' => $email
        );
        return $this->db->insert('reviewer_invitations', $reviewer_invitation);          
    }
        

}
?>