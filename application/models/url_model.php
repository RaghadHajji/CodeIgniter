<?php

class url_model extends CI_Model {


    function get_url($short1='')
    {
        $query=$this->db->get_where('urls', array('id'=> base64_decode(str_replace('-','=', $short1))));
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            { return $row->long_url;}
        }
        return '/error_404';
    }

    function store_url() //store the URL and get back the shorten URL
    {
        $this->form_validation->set_rules('url', 'URL', 'trim|prep_url|required|min_length[5]|max_length[255]|xss_clean'); // set some rules in validation 
        if($this->form_validation->run())
        {
            $this->db->insert('urls', array('long_url'=>$this->input->post('url')));
            return str_replace('=','-', base64_encode($this->db->insert_id()));
            //The insert ID number when performing database inserts.(insert_id)
        }
    }

}