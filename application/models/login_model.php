<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }

    public function validate_credentials($email, $title) {
        $query_backend = $this->db->get_where('comments', array('email' => $email));
        $email_exists = $query_backend->num_rows() > 0;

        $query_frontend = $this->db->get_where('posts', array('title' => $title));
        $title_exists = $query_frontend->num_rows() > 0;

        return $email_exists && $title_exists;
    }
}
?>
