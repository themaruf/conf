<?php
class Author extends CI_Model 
{

        public function exists($email)
        {
            $this->db->from('authors');  
            $this->db->where('email', $email);

            return ($this->db->get()->num_rows() == 1);
        }
        
        public function signup_new_user($first_name, $last_name, $phone, $dob, $email, $password)
        {
            $author_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone_number' => $phone,
                'dob' => $dob,
                'email' => $email,
                'password' => $password
            );
            return $this->db->insert('authors', $author_data);          
        }

        public function login_author($email, $password)
        {
            $query = $this->db->get_where('authors', array('email' => $email, 'password' => $password, 'deleted' => 0), 1);

                if($query->num_rows() == 1)
                {
                    $row = $query->row();
                    $this->session->set_userdata('author_id', $row->author_id);
                    //var_dump($row);
                    return TRUE;
                }
                return FALSE;
        }

        public function get_logged_in_author(){
            if($this->session->userdata('author_id') != null){
                return $this->session->userdata('author_id');
            }
            else{
                return 0;
            }
        }

        public function get_author($author_id){
            $this->db->from('authors');
            $this->db->where('author_id',$author_id);
            $this->db->where('deleted',0);
            $query = $this->db->get();

            return $query->row();
        }

        public function upload_file($filedata){
            $paper_data = array(
                'paper_name' => $filedata['file_name'],
                'file_url' => $filedata['full_path']
            );
            return $this->db->insert('papers', $paper_data);  
        }
        

}
?>