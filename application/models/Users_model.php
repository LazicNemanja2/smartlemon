<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Users_model Model Class
 *
 * @package  Shop
 * @subpackage Users
 * @category Users
 * @author *nbgteam <office@nbgteam.com>
 */
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
        // set query (retrieve user with email/password pair)
        $this->db->where('email', $email);
        $this->db->where('password', sha1($this->salt . $password));

        $result = $this->db->get('users');

        // check if result object contains only one row,
        // aka matching email and password
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

    public function count_users() {
        $this->db->select('COUNT(*) as number');

        $result = $this->db->get('users');

        $row = $result->row_array();

        $result->free_result();

        return (int) $row['number'];
    }

    function search_users_filter($keyword) {

        // select id and name
        $this->db->select('id, first_name, last_name, phone, email');

        // limit result count 
        $this->db->limit(30);

        // set distinct clause
        $this->db->distinct();

        // select where name like keyword
        $this->db->like('first_name', $keyword);

        // or select where phone like keyword
        $this->db->or_like('phone', $keyword);

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

    public function update_user($id, $data) {
        $this->db->where('id', $id);

        if (!empty($data['password'])) {
            $data['password'] = sha1($this->salt . $data['password']);
        }

        if (!$this->db->update('users', $data)) {
            throw new Exception(lang('user_information_not_changed'));
        }
    }

}

/* End of file: Users_model.php */
/* Location: ./system/application/models/Users_model.php */