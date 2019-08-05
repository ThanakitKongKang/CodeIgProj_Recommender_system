<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('pals_model');
    }

    public function index() {
        $header['title'] = 'Contacts List';
        $data['pals'] = $this->pals_model->get_all();

        $this->load->view('header', $header);
        $this->load->view('contacts/index', $data);
        $this->load->view('footer');
    }

    public function create() {
        $this->load->model('cities_model');
        $header['title'] = 'Create Contact';
        $data['cities'] = $this->cities_model->get_all();

        $this->load->view('header', $header);
        $this->load->view('contacts/create', $data);
        $this->load->view('footer');
    }

    public function store() {
        $rules = array(
            array(
                'field' => 'contact_name',
                'label' => 'Contact Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'contact_number',
                'label' => 'Contact Number',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'email_address',
                'label' => 'Email Address',
                'rules' => 'required'
            ),
            array(
                'field' => 'city_id',
                'label' => 'City',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('cities_model');
            $header['title'] = 'Create Contact';
            $data['cities'] = $this->cities_model->get_all();

            $this->load->view('header', $header);
            $this->load->view('contacts/create', $data);
            $this->load->view('footer');
        } else {
            $data = array(
                'city_id' => $this->input->post('city_id'),
                'contact_name' => $this->input->post('contact_name'),
                'contact_number' => $this->input->post('contact_number'),
                'email_address' => $this->input->post('email_address'),
            );

            $this->pals_model->insert($data);

            redirect(base_url('contacts'));
        }
    }

    public function edit($id) {
        $this->load->model('cities_model');
        $header['title'] = 'Edit Contact';
        $data['cities'] = $this->cities_model->get_all();

        $data['pal'] = $this->pals_model->get_by_id($id);
 
        $this->load->view('header', $header);
        $this->load->view('contacts/edit', $data);
        $this->load->view('footer');
    }

    public function update($id) {
        $rules = array(
            array(
                'field' => 'contact_name',
                'label' => 'Contact Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'contact_number',
                'label' => 'Contact Number',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'email_address',
                'label' => 'Email Address',
                'rules' => 'required'
            ),
            array(
                'field' => 'city_id',
                'label' => 'City',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('cities_model');
            $header['title'] = 'Create Contact';
            $data['cities'] = $this->cities_model->get_all();

            $data['pal'] = $this->pals_model->get_by_id($id);

            $this->load->view('header', $header);
            $this->load->view('contacts/edit', $data);
            $this->load->view('footer');
        } else {
            $data = array(
                'city_id' => $this->input->post('city_id'),
                'contact_name' => $this->input->post('contact_name'),
                'contact_number' => $this->input->post('contact_number'),
                'email_address' => $this->input->post('email_address'),
            );

            $this->pals_model->update($id, $data);

            redirect(base_url('contacts'));
        }
    }

    public function delete($id) {
        $this->load->model('cities_model');
        $header['title'] = 'Delete Contact';
        $data['cities'] = $this->cities_model->get_all();

        $data['pal'] = $this->pals_model->get_by_id($id);

        $this->load->view('header',$header);
        $this->load->view('contacts/delete',$data);
        $this->load->view('footer');
    }
    
    public function destroy($id){
        $this->pals_model->delete($id);
        
        redirect(base_url('contacts'));
    }
}