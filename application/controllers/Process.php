<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('auths');
    }

    private function check(){
    }

    public function delete($table, $id) {
        if(!$this->auths->admin()) die;
        $this->db->where('id', $id)->delete($table);
        echo "done";
    }

    public function insert($table) {
        if(!$this->auths->admin()) die;
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
        if($table == "users"){
            if($id != $_SESSION['id']){
                if(!$this->auths->admin()) die;
            }

            if(!isset($data['username']))die;

            $us = $this->db->where([
                'username' => $data['username'],
                'id !='    => $id 
                ])->get('users')->result();

                if(isset($us[0])){
                echo 'OOPS, Username has been used by another user!';
                die;
            }
        } else {
            if(!$this->auths->admin()) die;
        }
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