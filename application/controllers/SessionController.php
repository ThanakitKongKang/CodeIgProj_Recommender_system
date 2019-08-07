<?php defined('BASEPATH') or exit('No direct script access allowed');

class SessionController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
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
    
    public function check_auth($page)
    {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('msg', "You need to be logged in to access the $page page.");
            redirect('login');
        }
    }

    public function login()
    {
        $this->load->view('sessions/login');
    }

    public function authenticate()
    {
        $this->session->set_userdata('username', 'John Doe');
        $this->session->set_userdata('logged_in', TRUE);
        redirect(base_url('dashboard'));
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
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        redirect(base_url('login'));
    }
}
