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
     public function about(){
          $data=[
               'title' => 'About Us'
          ];
          $this->view('pages/about',$data);
     }
     public function croisieres(){
          $data=[
          ];
          $this->view('pages/croisieres',$data);
     }
     public function navire(){
          $data=[
           
          ];
          $this->view('pages/navire',$data);
     }
     public function home(){
          $data=[
          ];
          $this->view('pages/home',$data);
     }
     public function dashbord(){
          $data=[
          ];
          $this->view('pages/dashbord',$data);
     }
     public function tables(){
          $data=[
          ];
          $this->view('pages/tables',$data);
     }
}
