<?php

class Users extends CI_Controller
{
    public function index()
    {

        $this->load->view('welcome_message');
    }

    public function perhitungan()
    {
        redirect('crud');
    }
}