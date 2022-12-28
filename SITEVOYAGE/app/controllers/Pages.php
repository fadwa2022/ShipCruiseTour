<?php
class Pages extends Controller{
     public function __construct()
     {

          }
     public function index(){
          $data=[
               'title' => 'SITEBIJOUX',
          ];
          $this->view('pages/index',$data);

     }
     public function croisieres(){
          $data=[
          ];
          $this->view('pages/croisieres',$data);
     }
     public function home(){
          $data=[
          ];
          $this->view('pages/home',$data);
     }
     public function test(){
          $data=[
          ];
          $this->view('pages/test',$data);
     }
}
