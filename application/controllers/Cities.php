<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('cities_model');
    }

    public function index() {
        $header['title'] = 'Cities Listing';
        $data['pals'] = $this->cities_model->get_all();

        $this->load->view('header',$header);
        $this->load->view('cities/index', $data);
        $this->load->view('footer');
    }

    public function create() {
        $header['title'] = 'Create City';
        
        $this->load->view('header',$header);
        $this->load->view('cities/create');
        $this->load->view('footer');
    }

    public function store() {
        $rules = array(
            array(
                'field' => 'name',
                'label' => 'City Name',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data = array('name' => $this->input->post('name'));
            $this->cities_model->insert($data);

            redirect(base_url('cities'));
        } else {
            $header['title'] = 'Create City';
            
            $this->load->view('header',$header);
            $this->load->view('cities/create');
            $this->load->view('footer');
        }
    }

    public function edit($id) {
        $header['title'] = 'Edit City';
        $data['city'] = $this->cities_model->get_by_id($id);

        $this->load->view('header', $header);
        $this->load->view('cities/edit', $data);
        $this->load->view('footer');
    }

    public function update($id) {
        $rules = array(
            array(
                'field' => 'name',
                'label' => 'City Name',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data = array('name' => $this->input->post('name'));
            $this->cities_model->update($id,$data);

            redirect(base_url('cities'));
        } else {
            $header['title'] = 'Edit City';
            $data['city'] = $this->cities_model->get_by_id($id);
            
            $this->load->view('header',$header);
            $this->load->view('cities/create',$data);
            $this->load->view('footer');
        }
    }

    public function delete($id) {
        $header['title'] = 'Delete City';
        $data['city'] = $this->cities_model->get_by_id($id);

        $this->load->view('header', $header);
        $this->load->view('cities/delete', $data);
        $this->load->view('footer');
    }

    public function destroy($id) {
        $this->cities_model->delete($id);

        redirect(base_url('cities'));
    }
}