<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Controller {
    function __construct() {
        parent::__construct();
        $udata = $this->session->userdata();
        if((!isset($udata['username'])) && (!isset($udata['id'])))die;
    }

    private function check(){
    }

    public function delete($table, $id) {
        $this->db->where('id', $id)->delete($table);
        echo "done";
    }

    public function insert($table) {
        $data = $this->input->post();
        if($table == "users"){
            if(!isset($data['username']))die;
            if(!isset($data['password']))die;
            $us = $this->db->where('username', $data['username'])->get('users')->result();

            if(isset($us[0])){
                echo 'OOPS, Username has been used by another user!';
                die;
            }
        }
        foreach($data as $key => $val ){
            if($key == "password"){
                $data[$key] = password_hash($val,PASSWORD_DEFAULT);
            } else {
                $data[$key] = htmlspecialchars($val);
            }
        }
        $this->db->insert($table, $data);
        echo "done";
    }
    
    public function edit($table, $id) {
        $data = $this->input->post();
        foreach($data as $key => $val ){
            if($key == "password"){
                if($val == ""){
                    unset($data[$key]);
                } else {
                    $data[$key] = password_hash($val,PASSWORD_DEFAULT);
                }
            } else {
                $data[$key] = htmlspecialchars($val);
            }
        }
        $this->db->set($data)->where('id', $id)->update($table);
        echo "done";
    }
}