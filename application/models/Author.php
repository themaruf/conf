<?php
class Author extends CI_Model 
{

        public function exists($email)
        {
            $this->db->from('authors');  
            $this->db->where('email', $email);

            return ($this->db->get()->num_rows() == 1);
        }
        
        public function signup_new_user($first_name, $last_name, $phone, $dob)
        {
            $user_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone_number' => $phone,
                'dob' => $dob
            );
            $this->db->insert('users', $user_data);          
        }
        

}
?>