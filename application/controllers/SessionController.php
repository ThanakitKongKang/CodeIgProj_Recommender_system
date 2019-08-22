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
        $header['title'] = "Login";
        $this->load->view('sessions/login', $header);
    }

    public function authenticate()
    {
        $rules = array(
            array(
                'field' => 'username',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            )
        );
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('books_model');
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
                    'id' =>$data[0]->id,
                    'username' => $data[0]->username,
                    'keywords' => $data[0]->keywords
                );
                $this->session->set_userdata('user', $sessionArr);
                $this->session->set_userdata('logged_in', TRUE);
            }

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
        redirect($_SERVER['HTTP_REFERER']); //redirect at previous page
    }
}
