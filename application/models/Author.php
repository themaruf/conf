<?php
class Author extends CI_Model 
{

        public function exists($email)
        {
            $this->db->from('authors');  
            $this->db->where('email', $email);

            return ($this->db->get()->num_rows() == 1);
        }

        public function paper_exists($paper_id)
        {
            $this->db->from('papers');  
            $this->db->where('paper_id', $paper_id);

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
        $this->db->select('author_id, first_name, last_name, phone_number, dob, address_line_1, address_line_2, city, country, website, affiliation, description, email, deleted');
        $this->db->from('authors');
        $this->db->where('author_id',$author_id);
        $this->db->where('deleted',0);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_review_history($paper_id){
        $this->db->from('review_history');
        $this->db->join('reviews','reviews.review_id = review_history.review_id');
        $this->db->join('reviewers','reviewers.reviewer_id = review_history.reviewer_id');
        $this->db->where('review_history.paper_id',$paper_id);
        $this->db->order_by('review_history.timestamp', 'ASC');
        
        $query=$this->db->get();
        return $query->result();
    }

    public function saveinfo($author_id, $author_data){
        $this->db->where('authors.author_id',$author_id);
        return $this->db->update('authors', $author_data);
    }

    public function get_search_suggestions_author($search, $limit = 10)
    {
        $suggestions = array();

        $this->db->select('author_id, first_name, last_name');
        $this->db->from('authors');
        $this->db->where('deleted', 0);
        $this->db->like('author_id', $search);
        $this->db->or_like('first_name', $search);
        $this->db->or_like('last_name', $search);
        $this->db->order_by('author_id', 'asc');
        foreach($this->db->get()->result() as $row)
        {
            $suggestions[] = array('value' => $row->author_id, 'label' => $row->author_id."-".$row->first_name." ".$row->last_name);
        }
        //only return $limit suggestions
        if(count($suggestions > $limit))
        {
            $suggestions = array_slice($suggestions, 0,$limit);
        }
        return $suggestions;
    }

        public function upload_file($filedata){
            $paper_data = array(
                'paper_name' => $filedata['file_name'],
                'file_url' => $filedata['full_path']
            );
            return $this->db->insert('papers', $paper_data);  
        }

        public function get_author_data($author_id){

        }

    public function get_co_author_by_id($paper_id){
        $this->db->select('co_author_name0,co_author_email0,co_author_name1,co_author_email1,co_author_name2,co_author_email2,co_author_name3,co_author_email3');
        $this->db->from('paper_author');
        $this->db->where('paper_id',$paper_id);
        $query = $this->db->get();
        return $query->row();
    }

        public function get_all_papers($author_id)
        {
            $this->db->from('papers');
            $this->db->join('paper_author','paper_author.paper_id = papers.paper_id');
            $this->db->where('paper_author.author_id',$author_id);
            $this->db->where('deleted',0);
            $query=$this->db->get();
            return $query->result();
        }

        public function get_last_query(){
            return $this->db->last_query();
        }

        public function get_paper_by_id($paper_id){
            $this->db->from('papers');
            $this->db->where('paper_id',$paper_id);
            $query = $this->db->get();
            return $query->row();
        }

        public function add_paper($paper_data,$paper_author_data,$names,$emails){
            $this->db->trans_start();
            $this->db->insert('papers', $paper_data);
            $this->db->insert('paper_author',$paper_author_data);
            $insertId = $this->db->insert_id();

            foreach ($emails as $key => $value) {
                $co_author_data = array(
                    'co_author_name'.$key => $names[$key],
                    'co_author_email'.$key => $emails[$key],
                );
                $this->db->where('paper_author_id', $insertId);
                $this->db->update('paper_author',$co_author_data);
                if ($key == 3) { break; }
            }
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE){
                return false;
            }
            else{
                return true;
            }
        }

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