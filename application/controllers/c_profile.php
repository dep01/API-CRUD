<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_profile extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('m_profile','pro');
}
    public function delete()
    {
        $id = array('id_profile'=>$_POST['id_profile']);
        $data=$this->pro->delete($id);
        if($data > 0){
            $response=array(
                'msg'   =>'deleted',
                'status'=>true,
            );
        }else{
            $response=array(
                'msg'   =>'rejected',
                'status'=>false,
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response,true);
    }
    public function update()
    {
        $insert = array(
            'nama'=>$_POST['nama'],
            'nohp'=>$_POST['nohp'],
            'alamat'=>$_POST['alamat']
        );
        $id = array('id_profile'=>$_POST['id_profile']);
        $data=$this->pro->update($id,$insert);
        if($data > 0){
            $response=array(
                'msg'   =>'updated',
                'status'=>true,
            );
        }else{
            $response=array(
                'msg'   =>'rejected',
                'status'=>false,
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response,true);
    }
    public function add()
    {
        $insert = array(
            'nama'=>$_POST['nama'],
            'nohp'=>$_POST['nohp'],
            'alamat'=>$_POST['alamat']
        );
        $data=$this->pro->add($insert);
        if($data > 0){
            $response=array(
                'msg'   =>'inserted',
                'status'=>true,
            );
        }else{
            $response=array(
                'msg'   =>'rejected',
                'status'=>false,
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response,true);
    }
    public function get_all()
    {
        $data=$this->pro->get_all();
        $response=array(
            'msg'   =>'Profile',
            'status'=>true,
            'data'  =>$data
        );
        header('Content-Type: application/json');
        echo json_encode($response,true);
    }
    public function get_by_id()
    {
        $id_profile = $_POST['id_profile'];
        $data=$this->pro->get_by_id($id_profile);
        if($data){
            $response=array(
                'msg'   =>'Profile',
                'status'=>true,
                'data'  =>$data
            );
        }else{
            $response=array(
                'msg'   =>'Profile not found',
                'status'=>false,
                'data'  =>$data
            ); 
        }

        header('Content-Type: application/json');
        echo json_encode($response,true);
    }

}

/* End of file c_profile.php */
