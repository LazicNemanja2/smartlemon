<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model {

    /**
     * Salt string used for secure password hashing.
     * @access private
     * @var string
     */
    private $salt = 'S&%Kag4&KW4#&*MFWS';

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }

    public function add_user($data) {
        $data['password'] = sha1($this->salt . $data['password']);

        $this->db->insert('users', $data);

        return $this->db->insert_id();
    }

    function login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', sha1($this->salt . $password));

        $result = $this->db->get('users');

        if ($result->num_rows() === 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_user_login_data($email, $password) {
        $this->db->select('id, name');
        $this->db->where('email', $email);
        $this->db->where('password', sha1($this->salt . $password));

        $result = $this->db->get('users');

        return $result->row_array();
    }

    public function check_existing_email($user_id, $email) {
        $this->db->where('id', $user_id);
        $this->db->where('email', $email);

        $result = $this->db->get('users');

        return ($result->num_rows() == 1) ? TRUE : FALSE;
    }

    public function email_used($email) {
        $this->db->where('email', $email);

        $result = $this->db->get('users');

        if ($result->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_users() {
        $this->db->select(
                'id, name, email'
        );
        $this->db->order_by('id', 'desc');

        $result = $this->db->get('users');

        $users = $result->result_array();

        $result->free_result();

        return $users;
    }

    function search_users_filter($keyword) {

        // select id and name
        $this->db->select('id, name, email');

        // select where name like keyword
        $this->db->like('name', $keyword);
        // or select where email like keyword
        $this->db->or_like('email', $keyword);

        // execute query
        $query = $this->db->get('users');

        // return data
        return $query->result_array();
    }


    /**
     * @param int $id
     *
     * @return array
     */
    public function get_user($id) {
        $this->db->select('id, name, email');
        $this->db->where('id', $id);

        $result = $this->db->get('users');

        $user = $result->row_array();

        $result->free_result();

        return $user;
    }


}
