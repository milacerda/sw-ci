<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function response($status,$data)
{
    $ci =& get_instance();
    $ci->output->set_content_type('application/json');
    $ci->output->set_status_header($status);
    $ci->output->set_output(json_encode($data));
}