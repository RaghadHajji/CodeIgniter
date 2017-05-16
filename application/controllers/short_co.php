<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Short_co extends CI_Controller { 

    public function index() 
    {
        $data=array(); //to store data for view 
        if($this->input->post('url')) // did he write a url 
        {
            $this->load->model('url_model');//load the model which deals with data for short URLs
            $short_url=$this->url_model->store_url();
            if($short_url)
            {
                $data['short_url']=$short_url;
            }
            else 
            {
                $data['error']=validation_errors();
            }
        }

        $this->load->view('url_view', $data);// send data to it
    }

   public function get_short() //called by the routes file 
    {
        $this->load->model('url_model'); 
        $short1=$this->uri->segment(1);//information from your URI strings (!) for controller
        redirect($this->url_model->get_url($short1));
    }

}