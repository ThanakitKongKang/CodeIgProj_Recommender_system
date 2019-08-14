<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('books_model', '', TRUE);
	}
	
	public function index()
	{
		if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('user');
			$id = $session_data['id'];
            $path = base_url();
            exec("Rscript ".$path."R/RatingBasedRecommendation.R $id ", $res);
            print_r($res);
            $res = substr($res[0], 1, (strlen($res[0]) - 2));
            $paperIDs =  explode(",", $res);
            
            $paperDetail = array();
            foreach ($paperIDs as $id) {
                $paperID = substr($id, 1, (strlen($id) - 2));
                $result = $this->books_model->getPaper($paperID);

                $tempDetail = array(
                    "PaperID" => $paperID,
                    "Title" => $result[0]->title
                );
                array_push($paperDetail, $tempDetail);
                //$paperTitle[]=$result;

            }

            $HeaderData['username'] = $session_data['username'];
            $HeaderData['keywords'] = $session_data['keywords'];
            $HeaderData['paperDetail'] = $paperDetail;

            $this->load->view('header');
            $this->load->view('home',$HeaderData);
            $this->load->view('footer');
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
	}
	public function about()
	{
		$this->load->view('about_us');
	}
}
