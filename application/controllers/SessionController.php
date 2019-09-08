<?php defined('BASEPATH') or exit('No direct script access allowed');

class SessionController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('users_model');
    }

    public function index()
    {

        $this->load->view('sessions/index');
    }

    public function flash_message()
    {
        $this->session->set_flashdata('msg', 'Welcome to CodeIgniter Flash Messages');
        redirect(base_url('flash_index'));
    }

    public function login()
    {
        if (!$this->session->userdata('logged_in')) {
            $rules = array(
                array(
                    'field' => 'username',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'กรุณากรอกชื่อผู้ใช้.',
                    ),
                ),
                array(
                    'field' => 'password',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'กรุณากรอกรหัสผ่าน.',
                    ),
                )
            );
            $this->form_validation->set_rules($rules);
            $this->form_validation->set_error_delimiters('', '');

            if ($this->form_validation->run() == FALSE) {
                $header['title'] = "Login";
                $this->load->view('sessions/login', $header);
            } else {
                $post_data = array(
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                );
                $data = $this->users_model->login($post_data['username'], $post_data['password']);

                if ($data != FALSE) {
                    $sessionArr = array(
                        'username' => $data[0]->username,
                        'firstname' => $data[0]->first_name,
                        'lastname' => $data[0]->last_name
                    );
                    $this->load->model('bookmark_model');

                    $this->session->set_userdata('count_all_saved_list', $this->bookmark_model->get_saved_list($data[0]->username, "count"));
                    $this->session->set_userdata('user', $sessionArr);
                    $this->session->set_userdata('logged_in', TRUE);
                    $this->session->set_flashdata('flash_success', TRUE);
                    redirect(base_url());
                } else if ($data == FALSE) {
                    $data['title'] = "Login";
                    $data["feedback"] = "ชื่อผู้ใช้หรือรหัสผ่านผิด";
                    $this->load->view('sessions/login', $data);
                }
            }
        } else {
            redirect(base_url());
        }
    }

    public function dashboard()
    {
        $this->check_auth('dashboard');
        $this->load->view('sessions/dashboard');
    }

    public function settings()
    {
        $this->check_auth('settings');
        $this->load->view('sessions/settings');
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('logged_in');
        $this->session->set_flashdata('flash_logout', TRUE);
        redirect($_SERVER['HTTP_REFERER']); //redirect at previous page
        // redirect(base_url('login'));
    }
    public function signup()
    {
        $rules = array(
            array(
                'field' => 'username',
                'rules' => 'required|min_length[3]|max_length[24]|callback_username_check',
                'errors' => array(
                    'required' => 'กรุณากรอกชื่อผู้ใช้.',
                ),
            ),
            array(
                'field' => 'password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'กรุณากรอกรหัสผ่าน.',
                ),
            ),
            array(
                'field' => 'passconf',
                'rules' => 'trim|required|matches[password]',
                'errors' => array(
                    'required' => 'กรุณายืนยันรหัสผ่าน.',
                    'matches' => 'รหัสผ่านไม่ตรงกัน',
                    'trim' => 'รหัสผ่านไม่ตรงกัน',
                ),
            ),
            array(
                'field' => 'firstname',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'กรุณากรอกชื่อ.',
                ),
            ),
            array(
                'field' => 'lastname',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'กรุณากรอกนามสกุล.',
                ),
            ),
        );

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() == FALSE) {
            $header['title'] = "Sign Up";
            $this->load->view('sessions/signup', $header);
        } else {
            $post_data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'first_name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'),
            );
            $this->users_model->insert($post_data);
            $sessionArr = array(
                'username' => $post_data['username'],
                'firstname' => $post_data['first_name'],
                'lastname' => $post_data['last_name']
            );
            $this->session->set_userdata('user', $sessionArr);
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_flashdata('register_success', TRUE);
            redirect(base_url());
        }
    }
    public function username_check($str)
    {
        $username_exists = $this->users_model->check_exist($str);

        if ($username_exists != FALSE) {
            $this->form_validation->set_message('username_check', 'ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว');
            return FALSE;
        } else if ($username_exists == FALSE) {
            return TRUE;
        }
    }
}
