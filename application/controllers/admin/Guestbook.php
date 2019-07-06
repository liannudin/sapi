<?php
class Guestbook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
    }

    function index()
    {
        //set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        
        //run validation on post data
        if ($this->form_validation->run() == FALSE)
        {   //validation fails
            $this->load->view('admin/contact');
        }
        else
        {
            //insert the contact form data into database
            $data = array(
                'nama' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'subjek' => $this->input->post('subject'),
                'pesan' => $this->input->post('message')
            );

            if ($this->db->insert('guestbook', $data))
            {
                // success
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">We received your message! Will get back to you shortly!!!</div>');
                redirect('contact');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Some Error.  Please try again later!!!</div>');
                redirect('contact');
            }
        }
    }
    
    //custom callback to accept only alphabets and space input
    function alpha_space_only($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/",$str))
        {
            $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
?>