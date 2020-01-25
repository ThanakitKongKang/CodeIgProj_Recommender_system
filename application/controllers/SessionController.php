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
                        'required' => 'username is required.',
                    ),
                ),
                array(
                    'field' => 'password',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'password is required.',
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
                    $this->load->model('rate_model');

                    $this->session->set_userdata('count_all_saved_list', $this->bookmark_model->get_saved_list($data[0]->username, "count"));
                    $this->session->set_userdata('count_all_rating_history', $this->rate_model->get_all_num_rows_username($data[0]->username));
                    $this->session->set_userdata('user', $sessionArr);
                    $this->session->set_userdata('logged_in', TRUE);
                    $this->session->set_flashdata('flash_success', TRUE);
                    redirect(base_url());
                    // hci event
                    // redirect(base_url('browse/human-computer-interaction'));
                } else if ($data == FALSE) {
                    $data['title'] = "Login";
                    $data["feedback"] = "Username or Password wrong!";
                    $this->load->view('sessions/login', $data);
                }
            }
        } else {
?>
            <script type="text/javascript">
                window.history.go(-1);
            </script>
<?php
            $this->session->set_flashdata('already_logged_in', TRUE);
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
                    'required' => 'username is required.',
                ),
            ),
            array(
                'field' => 'password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'password is required.',
                ),
            ),
            array(
                'field' => 'passconf',
                'rules' => 'trim|required|matches[password]',
                'errors' => array(
                    'required' => 'please confirm your password.',
                    'matches' => 'password does not match',
                    'trim' => 'password does not match',
                ),
            ),
            array(
                'field' => 'firstname',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'firsname is required.',
                ),
            ),
            array(
                'field' => 'lastname',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'lastname is required.',
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
                'first_name' => $post_data['first_name'],
                'last_name' => $post_data['last_name']
            );
            $this->session->set_userdata('user', $sessionArr);
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_flashdata('register_success', TRUE);
            redirect(base_url());
            // hci event
            // redirect(base_url('browse/human-computer-interaction'));
        }
    }
    public function username_check($str)
    {
        $username_exists = $this->users_model->check_exist($str);

        if ($username_exists != FALSE) {
            $this->form_validation->set_message('username_check', 'username already taken');
            return FALSE;
        } else if ($username_exists == FALSE) {
            return TRUE;
        }
    }

    public function user_get_one()
    {
        $data = array(
            'username' => $this->session->userdata('user')['username'],
            'first_name' =>  $this->session->userdata('user')['first_name'],
            'last_name' => $this->session->userdata('user')['last_name'],
        );

        echo json_encode($data);
    }

    public function user_update_self()
    {
        $old_username = $this->input->post('old_username');
        $post_data = array(
            'username' => $this->input->post('username'),
            'first_name' =>  $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
        );

        $this->users_model->user_update($old_username, $post_data);

        // Update session data
        $this->session->unset_userdata('user');

        $sessionArr = $this->users_model->get_by_id($this->input->post('username'));
        $this->session->set_userdata('user', $sessionArr);
    }


    public function password_match()
    {
        $post_data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        );
        $data = $this->users_model->login($post_data['username'], $post_data['password']);

        if ($data != FALSE) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function isUsernameExists()
    {
        $username = $this->input->post('username');
        $row = $this->users_model->get_by_id($username);

        if ($row != FALSE) {
            echo "true";
        }
    }

    public function password_change()
    {
        $post_data = array(
            'username' => $this->session->userdata('user')['username'],
            'password' => $this->input->post('password'),
        );

        $data = $this->users_model->login($post_data['username'], $post_data['password']);

        if ($data != FALSE) {
            $username = $this->session->userdata('user')['username'];
            $password  = $this->input->post('password');
            $new_password = $this->input->post('new_password');

            $this->users_model->user_password_change($username, $password, $new_password);
        } else {
            echo "false";
        }
    }
}
