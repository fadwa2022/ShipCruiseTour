<?php
class Pages extends Controller{
    public $CroisiereModel;
    public $NavireModel;
    public $PortsModel;
    public $ReservationModel;
    public $TypeModel;

     public function __construct()
     {
          $this->CroisiereModel = $this->model('Croisiere');
          $this->NavireModel = $this->model('Navire');
          $this->PortsModel = $this->model('Ports');
          $this->ReservationModel = $this->model('Reservation');
          $this->TypeModel = $this->model('Type');
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
     public function croisieres($Nom_port = "")
     {
        $ports = $this->PortsModel->getPorts();

        if($Nom_port == "" ){
            $Croisieres = $this->CroisiereModel->getCroisieres();
            $portsc = $this->PortsModel->gettrajet();
        }else {
            $Croisieres = $this->CroisiereModel->getCroisiereByPort($Nom_port);
            $portsc = $this->PortsModel->gettrajet();
                }
         $data = [
             'Croisieres' => $Croisieres,
             'portsc'=> $portsc,
             'ports' =>$ports,
         ];
        //  die(print_r($data['portsc'][0]->Nom_navire));

         $this->view('pages/croisieres', $data);
     }
     public function croisieresdate($Date_dep = "")
     {

        if($Date_dep == "" ){
            $Croisieres = $this->CroisiereModel->getCroisieres();
            $portsc = $this->PortsModel->gettrajet();

        }else {
            $Croisieres = $this->CroisiereModel->getCroisiereBydate($Date_dep);
            $portsc = $this->PortsModel->gettrajet();

        }
      
         $data = [
             'Croisieres' => $Croisieres,
             'portsc'=> $portsc,

         ];
         $this->view('pages/croisieres', $data);
     }
     public function croisieresnavire($nom_navire = "")
     {

        if($nom_navire == "" ){
            $Croisieres = $this->CroisiereModel->getCroisieres();
            $portsc = $this->PortsModel->gettrajet();

        }else {
            $Croisieres = $this->CroisiereModel->getCroisiereBynavire($nom_navire);
            $portsc = $this->PortsModel->gettrajet();

        }
      
         $data = [
             'Croisieres' => $Croisieres,
             'portsc'=> $portsc,

         ];
         $this->view('pages/croisieres', $data);
     }
     public function filter() {

        if((isset($_POST['port-depart']))&&($_POST['port-depart'] !== "")){

            $this->croisieres($_POST['port-depart']);
        }
        elseif((isset($_POST['Date_dep']))&&($_POST['Date_dep'] !== "")){
            $this->croisieresdate($_POST['Date_dep']);
        }elseif((isset($_POST['nom_navire']))&&($_POST['nom_navire'] !== ""))
        {
            $this->croisieresnavire($_POST['nom_navire']);

        }
       else{
        $this->croisieres();
    }
     }

     public function port($page = ""){
        if($page == "") $page = 1;
        $portPerPage = 3;

        $offset = $portPerPage*($page - 1);
        $Ports   = $this->PortsModel->getPortsPaginated($offset, $portPerPage);
        $data = [
            'Ports' => $Ports
        ];
        $this->view('pages/ports', $data);

     }
     public function croisiere($page = ""){
        if($page == "") $page = 1;
        $croisierePerPage = 3;
        $offset = $croisierePerPage*($page - 1);
        $Croisieres  = $this->CroisiereModel->getCroisierePaginated($offset, $croisierePerPage);
        $portsc = $this->PortsModel->gettrajet();

        $data = [
            'Croisieres' => $Croisieres,
            'portsc'=> $portsc,

        ];
        $this->view('pages/croisieres', $data);

     }
     public function detaille($ID_croisiere)
     {
         $Croisieres = $this->CroisiereModel->getCroisiereById($ID_croisiere);
         $type = $this->TypeModel->gettype();

         $data = [
             'Croisieres' => $Croisieres,
             'type'  =>$type 
         ];
         $this->view('pages/detaille', $data);
     }
     public function ports()
     {
         $Ports = $this->PortsModel->getPorts();
      //  pagination
      $nbr_posts_par_page=3;
      $nbr_de_page=ceil(count($Ports)/$nbr_posts_par_page);
         $data = [
             'Ports' => $Ports,
             'nbr_de_page' =>$nbr_de_page
         ];
         $this->view('pages/ports', $data);
   
     }
     public function reservation(){
        $ID_user=$_SESSION['ID_user'];
        $reservation = $this->ReservationModel->getoneReservation($ID_user);
         $data = [
             'reservation' =>  $reservation
         ];

        $this->view('pages/reservation', $data);
     }
     public function deletereservation($ID_Reservation)
     {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->ReservationModel->deleteReservation($ID_Reservation)) {
                flash('message', 'reservation annuler ');
                redirect('pages/reservation');
            } else {
                flash('message', 'Somthing went wrong');
                redirect('pages/reservation');
            }
        } else {
            $reservation = $this->ReservationModel->getReserationById($ID_Reservation);
            $d1=$reservation->Date_dep;
            $d2=date('y-m-d h:m:s');
            $d1=strtotime($d1);
            $d2=strtotime($d2);
            $diff=abs(round(($d2-$d1)/(24*60*60)));
           
            if ($diff < 2 ) {
                flash('message', 'you can not cancel this reservation you can contact us');
                redirect('pages/reservation');
            } else {if ($this->ReservationModel->deleteReservation($ID_Reservation)) {
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
