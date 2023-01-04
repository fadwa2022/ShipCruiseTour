<?php
class Pages extends Controller{
    public $articleModel;
     public function __construct()
     {
          $this->articleModel = $this->model('Article');

          }
     public function index(){
          $data=[
               'title' => '',
          ];
          $this->view('pages/index',$data);

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
     public function croisieres($Nom_port)
     {
      
         // Get articles
         $Croisieres = $this->articleModel->getCroisiereByPort($Nom_port);
         $data = [
             'Croisieres' => $Croisieres,
         ];
         $this->view('pages/croisieres', $data);
     }
     public function detaille($ID_croisiere)
     {
         $Croisieres = $this->articleModel->getCroisiereById($ID_croisiere);
         $type = $this->articleModel->gettype();

         $data = [
             'Croisieres' => $Croisieres,
             'type'  =>$type 
         ];
         $this->view('pages/detaille', $data);
     }
     public function ports()
     {
         // Get articles
         $Ports = $this->articleModel->getPorts();
 
         $data = [
             'Ports' => $Ports,
         ];
         $this->view('pages/ports', $data);
     }
     public function reservation(){
        $ID_user=$_SESSION['ID_user'];
        $reservation = $this->articleModel->getoneReservation($ID_user);
         $data = [
             'reservation' =>  $reservation
         ];

        $this->view('pages/reservation', $data);
     }
     public function deletereservation($ID_Reservation)
     {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->articleModel->deleteReservation($ID_Reservation)) {
                flash('message', 'reservation annuler ');
                redirect('pages/reservation');
            } else {
                flash('message', 'Somthing went wrong');
                redirect('pages/reservation');
            }
        } else {
            $reservation = $this->articleModel->getReserationById($ID_Reservation);
            $d1=$reservation->Date_dep;
            $d2=date('y-m-d h:m:s');
            
            $d1=strtotime($d1);
            $d2=strtotime($d2);
            $diff=abs(round(($d2-$d1)/(24*60*60)));
            if ($diff < 2 ) {
                flash('message', 'you can not cancel this reservation you can contact us');
                redirect('pages/reservation');
            } else {if ($this->articleModel->deleteReservation($ID_Reservation)) {
                    flash('message', 'reservation annuler ');
                    redirect('pages/reservation');
                } else {
                    flash('message', 'Somthing went wrong');
                    redirect('pages/reservation');
                }
            }
        }
     
}
}
