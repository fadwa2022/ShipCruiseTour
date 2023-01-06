<?php
class Admin extends Controller
{
    public $CroisiereModel;
    public $NavireModel;
    public $PortsModel;
    public $ReservationModel;
    public $TypeModel;
    public $ChambreModel;

    public function __construct()
    {
        // verifier login d admin
        if (!isLoggdIn()) {
            redirect('users/login');
        }
        $this->CroisiereModel = $this->model('Croisiere');
        $this->NavireModel = $this->model('Navire');
        $this->PortsModel = $this->model('Ports');
        $this->ReservationModel = $this->model('Reservation');
        $this->TypeModel = $this->model('Type');
        $this->ChambreModel = $this->model('Chambre');
    }
    public function index()
    {
        $numbrCroisieres = $this->CroisiereModel->numbercroisiere(); 
        $numbrusers = $this->CroisiereModel->numberusers();       
        $nbrport = $this->CroisiereModel->numbeport();
        $chiffre_affaire = $this->CroisiereModel->chiffre_affaire();

        $data = [
            'numbrCroisieres' => $numbrCroisieres,
            'numbrusers' => $numbrusers,
            'nbrport' => $nbrport,
            'chiffre_affaire' => $chiffre_affaire

        ];
        $this->view('admin/index', $data);
    }

    public function tables($page = "")
    {       
         if($page == "") $page = 1;
         $portPerPage = 4;
         $offset = $portPerPage*($page - 1);


        // $Croisieres = $this->CroisiereModel->getCroisieres();
        $navires = $this->NavireModel->getNavires();
        $ports = $this->PortsModel->getPortsPaginated($offset, $portPerPage);
        $chambre = $this->ChambreModel->getChambre();
        $reservation = $this->ReservationModel->getReservation();

        $Croisieres   = $this->CroisiereModel->getCroisierePaginated($offset, $portPerPage);
      
        $data = [
            'Croisieres' => $Croisieres,
            'navires' => $navires,
            'ports' => $ports,
            'chambre' => $chambre,
            'reservation' => $reservation,
        ];

        $this->view('admin/tables', $data);
    }
    
    // add croisieres
    public function addcroisieres()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ID_user' => $_SESSION['ID_user'],
                'ID_navire' => trim($_POST['ID_navire']),
                'Image' => $_FILES['Image']['name'],
                'prix_croisiere' => trim($_POST['prix_croisiere']),
                'nbr_nuits' => trim($_POST['nbr_nuits']),
                'Port_dep' => trim($_POST['Port_dep']),
                'Port_Pause' => trim($_POST['Port_Pause']),
                'Port_Finale' => trim($_POST['Port_Finale']),
                'Date_dep' => trim($_POST['Date_dep']),
                'nom_navire_err' => '',
                'Image_err' => '',
                'prix_croisiere_err' => '',
                'nbr_nuits_err' => '',
                'Port_dep_err' => '',
                'Port_Pause_err' => '',
                'Port_Finale_err' => '',
                'Date_dep_err' => '',
            ];

            // validation 
            if (empty($data['ID_navire'])) {
                $data['ID_navire_err'] = 'please choisire une navire';
            }
            if (empty($data['Image'])) {
                $data['Image_err'] = 'please enter image';
            }
            if (empty($data['prix_croisiere'])) {
                $data['prix_croisiere_err'] = 'please enter un prix de croisiere';
            }
            if (empty($data['nbr_nuits'])) {
                $data['nbr_nuits_err'] = 'please enter nbr de nuits';
            }
            if (empty($data['Port_dep'])) {
                $data['Port_dep_err'] = 'please enter the port of departure';
            }
            if (empty($data['Port_Pause'])) {
                $data['Port_Pause_err'] = 'please enter thePause port';
            }
            if (empty($data['Port_Finale'])) {
                $data['Port_Finale_err'] = 'please enter the Last port';
            }
            if (empty($data['Date_dep'])) {
                $data['Date_dep_err'] = 'please enter Date of departure';
            }


            // make sure no errors
            if (empty($data['ID_navire_err']) && empty($data['Image_err']) && empty($data['prix_croisiere_err']) && empty($data['nbr_nuits_err']) && empty($data['Port_dep_err']) && empty($data['Port_Pause_err']) && empty($data['Port_Finale_err']) && empty($data['Date_dep_err'])) {
                if ($this->CroisiereModel->addCroisiere($data)) {
                    flash('message', 'croisiere Added');
                    redirect('admin/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('admin/addcroisieres', $data);
            }
        } else {
            $Navires = $this->NavireModel->getNavires();
            $ports = $this->PortsModel->getPorts();
            $data = [
                'ID_navire' => '',
                'Image' => '',
                'prix_croisiere' => '',
                'nbr_nuits' => '',
                'Port_dep' => '',
                'Port_Pause' => '',
                'Port_Finale' => '',
                'Date_dep' => '',
                'ID_navire_err' => '',
                'Image_err' => '',
                'prix_croisiere_err' => '',
                'nbr_nuits_err' => '',
                'Port_dep_err' => '',
                'Port_Pause_err' => '',
                'Port_Finale_err' => '',
                'Date_dep_err' => '',
                'Navires' => $Navires,
                'ports' =>  $ports,
            ];

            $this->view('admin/addcroisieres', $data);
        }
    }
    public function addnavire()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ID_user' => $_SESSION['ID_user'],
                'Nom_navire' => trim($_POST['Nom_navire']),
                'nbr_chambre' => trim($_POST['nbr_chambre']),
                'nbr_place' => trim($_POST['nbr_place']),
                'Nom_navire_err' => '',
                'nbr_chambre_err' => '',
                'nbr_place_err' => '',
            ];

            // validation 
            if (empty($data['Nom_navire'])) {
                $data['Nom_navire_err'] = 'please ajouter un nom';
            }
            if (empty($data['nbr_chambre'])) {
                $data['nbr_chambre_err'] = 'please ajouter un nombre des chambres';
            }
            if (empty($data['nbr_place'])) {
                $data['nbr_place_err'] = 'please ajouter un nombre des places';
            }
            // make sure no errors
            if (empty($data['Nom_navire_err']) && empty($data['nbr_chambre_err']) && empty($data['nbr_place_err'])) {
                if ($this->NavireModel->addNavire($data)) {
                    flash('message', 'navire Added');
                    redirect('admin/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('admin/addnavire', $data);
            }
        } else {

            $data = [
                'Nom_navire' => '',
                'nbr_chambre' => '',
                'nbr_place' => '',
                'Nom_navire_err' => '',
                'nbr_chambre_err' => '',
                'nbr_place_err' => '',
            ];

            $this->view('admin/addnavire', $data);
        }
    }
    public function addports()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ID_user' => $_SESSION['ID_user'],
                'Nom_port' => trim($_POST['Nom_port']),
                'pays' => trim($_POST['pays']),
                'image' => $_FILES['image']['name'],
                'Nom_port_err' => '',
                'pays_err' => '',
                'image_err' => '',
            ];

            // validation 
            if (empty($data['Nom_port'])) {
                $data['Nom_port_err'] = 'please entre le nom du port';
            }
            if (empty($data['pays'])) {
                $data['pays_err'] = 'please entre le nom du pays';
            }
            if (empty($data['image'])) {
                $data['image_err'] = 'please ajouter  une image';
            }
            // make sure no errors
            if (empty($data['Nom_port_err']) && empty($data['Pays_err']) && empty($data['image_err'])) {
                if ($this->PortsModel->addport($data)) {
                    flash('message', 'port Added');
                    redirect('admin/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('admin/addports', $data);
            }
        } else {

            $data = [
                'Nom_port' => '',
                'pays' => '',
                'image' => '',
                'Nom_port_err' => '',
                'pays_err' => '',
                'image_err' => '',
            ];

            $this->view('admin/addports', $data);
        }
    }
    public function addchambre()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ID_user' => $_SESSION['ID_user'],
                'ID_type' => trim($_POST['ID_type']),
                'ID_navire' => trim($_POST['ID_navire']),
                'ID_type_err' => '',
                'ID_navire_err' => '',

            ];

            // validation 
            if (empty($data['ID_navire'])) {
                $data['ID_navire_err'] = 'please choisire navire';
            }
            if (empty($data['ID_type'])) {
                $data['ID_type_err'] = 'please choisire le type du chambre';
            }

            // make sure no errors
            if (empty($data['ID_navire_err']) && empty($data['ID_type_err'])) {
                if ($this->ChambreModel->addchambre($data)) {
                    flash('message', 'chambre Added');
                    redirect('admin/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('admin/addchambre', $data);
            }
        } else {
            $Navires = $this->NavireModel->getNavires();
            $type = $this->TypeModel->gettype();
            $data = [
                'ID_type' => '',
                'ID_navire' => '',
                'ID_type_err' => '',
                'ID_navire_err' => '',
                'type' => $type,
                'Navires' => $Navires,
            ];

            $this->view('admin/addchambre', $data);
        }
    }
    public function addreservation($ID_croisiere)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ID_user' => $_SESSION['ID_user'],
                'ID_croisiere' => $ID_croisiere,
                'Prix_reservation' => trim($_POST['prixreservation']),
            ];

            // make sure no errors
            if (!empty($data['ID_croisiere']) && !empty($data['Prix_reservation'])) {
                if ($this->ReservationModel->addreservation($data)) {
                    flash('message', 'reservation reussite');
                    redirect('pages/reservation');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('pages/reservation', $data);
            }
        } else {

            $data = [
                'ID_user' => '',
                'ID_croisiere' => '',
                'Prix_reservation' => ''
            ];

            $this->view('pages/detaille', $data);
        }
    }
    //   delet croi
    public function deletecroisiere($ID_croisiere)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->CroisiereModel->deleteCroisiere($ID_croisiere)) {
                flash('message', 'Croisiere Removed ');
                redirect('admin/tables');
            } else {
                flash('message', 'Somthing went wrong');
                redirect('admin/tables');
            }
        } else {
            $Croisieres = $this->CroisiereModel->getCroisiereById($ID_croisiere);
            if ($Croisieres->ID_user != $_SESSION['ID_user']) {
                flash('message', 'you are not the same creator admin of this croisiere ');
                redirect('admin/tables');
            } else {
                if ($this->CroisiereModel->deleteCroisiere($ID_croisiere)) {
                    flash('message', 'Croisiere Removed ');
                    redirect('admin/tables');
                } else {
                    flash('message', 'Somthing went wrong');
                    redirect('admin/tables');
                }
            }
        }
    }

    public function deletenavire($ID_navire)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->NavireModel->deleteNavire($ID_navire)) {
                flash('message', 'navire Removed ');
                redirect('admin/tables');
            } else {
                flash('message', 'Somthing went wrong');
                redirect('admin/tables');
            }
        } else {
            $Croisieres = $this->NavireModel->getNavireById($ID_navire);
            if ($Croisieres->ID_user != $_SESSION['ID_user']) {
                flash('message', 'you are not the same creator admin of this navire ');
                redirect('admin/tables');
            } else {
                if ($this->NavireModel->deleteNavire($ID_navire)) {
                    flash('message', 'navire Removed ');
                    redirect('admin/tables');
                } else {
                    flash('message', 'Somthing went wrong');
                    redirect('admin/tables');
                }
            }
        }
    }
    public function deletePort($ID_port)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->PortsModel->deletePort($ID_port)) {
                flash('message', 'Port Removed');
                redirect('admin/tables');
            } else {
                flash('message', 'Somthing went wrong');
                redirect('admin/tables');
            }
        } else {
            $Porte = $this->PortsModel->getPortById($ID_port);
            if ($Porte->ID_user != $_SESSION['ID_user']) {
                flash('message', 'you are not the same creator admin of this Port ');
                redirect('admin/tables');
            } else {
                if ($this->PortsModel->deletePort($ID_port)) {
                    flash('message', 'Port Removed ');
                    redirect('admin/tables');
                } else {
                    flash('message', 'Somthing went wrong');
                    redirect('admin/tables');
                }
            }
        }
    }
    public function deletechambre($ID_chambre)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->ChambreModel->deletechambre($ID_chambre)) {
                flash('message', 'chambre Removed');
                redirect('admin/tables');
            } else {
                flash('message', 'Somthing went wrong');
                redirect('admin/tables');
            }
        } else {
            $Porte = $this->ChambreModel->getchambreById($ID_chambre);
            if ($Porte->ID_user != $_SESSION['ID_user']) {
                flash('message', 'you are not the same creator admin of this chambre ');
                redirect('admin/tables');
            } else {
                if ($this->ChambreModel->deletechambre($ID_chambre)) {
                    flash('message', 'chambre Removed ');
                    redirect('admin/tables');
                } else {
                    flash('message', 'Somthing went wrong');
                    redirect('admin/tables');
                }
            }
        }
    }

    public function editcroisiere($ID_croisiere)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ID_croisiere' => $ID_croisiere,
                'ID_user' => $_SESSION['ID_user'],
                'ID_navire' => trim($_POST['ID_navire']),
                'Image' => $_FILES['Image']['name'],
                'prix_croisiere' => trim($_POST['prix_croisiere']),
                'nbr_nuits' => trim($_POST['nbr_nuits']),
                'Port_dep' => trim($_POST['Port_dep']),
                'Port_Pause' => trim($_POST['Port_Pause']),
                'Port_Finale' => trim($_POST['Port_Finale']),
                'Date_dep' => trim($_POST['Date_dep']),
                'nom_navire_err' => '',
                'Image_err' => '',
                'prix_croisiere_err' => '',
                'nbr_nuits_err' => '',
                'Port_dep_err' => '',
                'Port_Pause_err' => '',
                'Port_Finale_err' => '',
                'Date_dep_err' => '',
            ];

            // validation 
            if (empty($data['ID_navire'])) {
                $data['ID_navire_err'] = 'please choisire une navire';
            }
            if (empty($data['Image'])) {
                $data['Image_err'] = 'please enter image';
            }
            if (empty($data['prix_croisiere'])) {
                $data['prix_croisiere_err'] = 'please enter un prix de croisiere';
            }
            if (empty($data['nbr_nuits'])) {
                $data['nbr_nuits_err'] = 'please enter nbr de nuits';
            }
            if (empty($data['Port_dep'])) {
                $data['Port_dep_err'] = 'please enter the port of departure';
            }
            if (empty($data['Port_Pause'])) {
                $data['Port_Pause_err'] = 'please enter thePause port';
            }
            if (empty($data['Port_Finale'])) {
                $data['Port_Finale_err'] = 'please enter the Last port';
            }
            if (empty($data['Date_dep'])) {
                $data['Date_dep_err'] = 'please enter Date of departure';
            }


            // make sure no errors
            if (empty($data['ID_navire_err']) && empty($data['Image_err']) && empty($data['prix_croisiere_err']) && empty($data['nbr_nuits_err']) && empty($data['Port_dep_err']) && empty($data['Port_Pause_err']) && empty($data['Port_Finale_err']) && empty($data['Date_dep_err'])) {
                if ($this->CroisiereModel->updateCroisiere($data)) {
                    flash('message', 'croisiere updated');
                    redirect('admin/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('admin/updatecroisiere', $data);
            }
        } else {
            $Navires = $this->NavireModel->getNavires();
            $ports = $this->PortsModel->getPorts();
            $data = [
                'ID_croisiere' => '',
                'ID_navire' => '',
                'Image' => '',
                'prix_croisiere' => '',
                'nbr_nuits' => '',
                'Port_dep' => '',
                'Port_Pause' => '',
                'Port_Finale' => '',
                'Date_dep' => '',
                'ID_navire_err' => '',
                'Image_err' => '',
                'prix_croisiere_err' => '',
                'nbr_nuits_err' => '',
                'Port_dep_err' => '',
                'Port_Pause_err' => '',
                'Port_Finale_err' => '',
                'Date_dep_err' => '',
                'Navires' => $Navires,
                'ports' =>  $ports,
            ];

            $this->view('admin/updatecroisieres', $data);
        }
    }
    public function editnavire($ID_navire)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ID_navire' => $ID_navire,
                'ID_user' => $_SESSION['ID_user'],
                'Nom_navire' => trim($_POST['Nom_navire']),
                'nbr_chambre' => trim($_POST['nbr_chambre']),
                'nbr_place' => trim($_POST['nbr_place']),
                'Nom_navire_err' => '',
                'nbr_chambre_err' => '',
                'nbr_place_err' => '',
            ];

            // validation 
            if (empty($data['Nom_navire'])) {
                $data['Nom_navire_err'] = 'please ajouter un nom';
            }
            if (empty($data['nbr_chambre'])) {
                $data['nbr_chambre_err'] = 'please ajouter un nombre des chambres';
            }
            if (empty($data['nbr_place'])) {
                $data['nbr_place_err'] = 'please ajouter un nombre des places';
            }
            // make sure no errors
            if (empty($data['Nom_navire_err']) && empty($data['nbr_chambre_err']) && empty($data['nbr_place_err'])) {
                if ($this->NavireModel->updateNavire($data)) {
                    flash('message', 'navire Added');
                    redirect('admin/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('admin/updatenavire', $data);
            }
        } else {

            $data = [
                'ID_navire' => '',
                'Nom_navire' => '',
                'nbr_chambre' => '',
                'nbr_place' => '',
                'Nom_navire_err' => '',
                'nbr_chambre_err' => '',
                'nbr_place_err' => '',
            ];

            $this->view('admin/updatenavire', $data);
        }
    }
    public function editports($ID_port)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ID_port' => $ID_port,
                'ID_user' => $_SESSION['ID_user'],
                'Nom_port' => trim($_POST['Nom_port']),
                'pays' => trim($_POST['pays']),
                'image' => $_FILES['image']['name'],
                'Nom_port_err' => '',
                'pays_err' => '',
                'image_err' => '',
            ];

            // validation 
            if (empty($data['Nom_port'])) {
                $data['Nom_port_err'] = 'please entre le nom du port';
            }
            if (empty($data['pays'])) {
                $data['pays_err'] = 'please entre le nom du pays';
            }
            if (empty($data['image'])) {
                $data['image_err'] = 'please ajouter  une image';
            }
            // make sure no errors
            if (empty($data['Nom_port_err']) && empty($data['Pays_err']) && empty($data['image_err'])) {
                if ($this->PortsModel->updatePorts($data)) {
                    flash('message', 'port Added');
                    redirect('admin/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('admin/updateports', $data);
            }
        } else {

            $data = [
                'ID_port' => '',
                'Nom_port' => '',
                'pays' => '',
                'image' => '',
                'Nom_port_err' => '',
                'pays_err' => '',
                'image_err' => '',
            ];

            $this->view('admin/updateports', $data);
        }
    }
    public function updatecroisiere($ID_croisiere)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ID_croisiere' => $ID_croisiere,
                'ID_navire' => trim($_POST['ID_navire']),
                'Image' => $_FILES['Image']['name'],
                'prix_croisiere' => trim($_POST['prix_croisiere']),
                'nbr_nuits' => trim($_POST['nbr_nuits']),
                'Port_dep' => trim($_POST['Port_dep']),
                'Port_Pause' => trim($_POST['Port_Pause']),
                'Port_Finale' => trim($_POST['Port_Finale']),
                'Date_dep' => trim($_POST['Date_dep']),
                'nom_navire_err' => '',
                'Image_err' => '',
                'prix_croisiere_err' => '',
                'nbr_nuits_err' => '',
                'Port_dep_err' => '',
                'Port_Pause_err' => '',
                'Port_Finale_err' => '',
                'Date_dep_err' => '',
            ];

            // validation 
            if (empty($data['ID_navire'])) {
                $data['ID_navire_err'] = 'please choisire une navire';
            }
            if (empty($data['Image'])) {
                $data['Image_err'] = 'please enter image';
            }
            if (empty($data['prix_croisiere'])) {
                $data['prix_croisiere_err'] = 'please enter un prix de croisiere';
            }
            if (empty($data['nbr_nuits'])) {
                $data['nbr_nuits_err'] = 'please enter nbr de nuits';
            }
            if (empty($data['Port_dep'])) {
                $data['Port_dep_err'] = 'please enter the port of departure';
            }
            if (empty($data['Port_Pause'])) {
                $data['Port_Pause_err'] = 'please enter thePause port';
            }
            if (empty($data['Port_Finale'])) {
                $data['Port_Finale_err'] = 'please enter the Last port';
            }
            if (empty($data['Date_dep'])) {
                $data['Date_dep_err'] = 'please enter Date of departure';
            }


            // make sure no errors
            if (empty($data['ID_navire_err']) && empty($data['Image_err']) && empty($data['prix_croisiere_err']) && empty($data['nbr_nuits_err']) && empty($data['Port_dep_err']) && empty($data['Port_Pause_err']) && empty($data['Port_Finale_err']) && empty($data['Date_dep_err'])) {
                if ($this->CroisiereModel->updateCroisiere($data)) {
                    flash('message', 'croisiere Edit');
                    redirect('admin/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('admin/updatecroisiere', $data);
            }
        } else {
            // $croi
            $Croisieres = $this->CroisiereModel->getCroisiereById($ID_croisiere);
            $Navires = $this->NavireModel->getNavires();
            $ports = $this->PortsModel->getPorts();

            if ($Croisieres->ID_user != $_SESSION['ID_user']) {
                flash('message', 'you are not the same creator admin of this croisiere ');
                redirect('admin/tables');
            }
            $data = [
                'ID_croisiere' => $ID_croisiere,
                'ID_navire' => $Croisieres->Nom_navire,
                'Image' => $Croisieres->Image,
                'prix_croisiere' => $Croisieres->prix_croisiere,
                'nbr_nuits' => $Croisieres->nbr_nuits,
                'Port_dep' => $Croisieres->Port_dep,
                'Port_Pause' => $Croisieres->Port_Pause,
                'Port_Finale' => $Croisieres->Port_Finale,
                'Date_dep' => $Croisieres->Date_dep,
                'ID_navire_err' => '',
                'Image_err' => '',
                'prix_croisiere_err' => '',
                'nbr_nuits_err' => '',
                'Port_dep_err' => '',
                'Port_Pause_err' => '',
                'Port_Finale_err' => '',
                'Date_dep_err' => '',
                'Navires' => $Navires,
                'ports' =>  $ports,
                'Croisieres' => $Croisieres,
            ];

            $this->view('admin/updatecroisiere', $data);
        }
    }
}
