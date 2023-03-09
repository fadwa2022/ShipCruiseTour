<?php
class Articles extends Controller
{ public $articleModel;
    public function __construct()
    { 
        // verifier login d admin
        if (!isLoggdIn()) {
            redirect('users/login');
        }
        $this->articleModel = $this->model('Article');
    }
    public function index()
    {
        // Get articles
        $Croisieres = $this->articleModel->getCroisieres();
        $data = [
            'articles' => $Croisieres
        ];
        $this->view('articles/index', $data);
    }

    public function tables()
    {
        // Get articles

        $Croisieres = $this->articleModel->getCroisieres();
        $navires = $this->articleModel->getNavires();
        $ports = $this->articleModel->getPorts();
        $chambre = $this->articleModel->getChambre();
        $reservation = $this->articleModel->getReservation();
        // $i = 0;
        // foreach ($Croisieres as $c) :
        //     $Croisieres[$i]->ID_navire = $this->articleModel->getOneNavires($c->ID_navire)[0]->Nom_navire;
        //     $i++;
        // endforeach;

        $data = [
            'Croisieres' => $Croisieres,
            'navires' => $navires,
            'ports' => $ports,
            'chambre' => $chambre,
            'reservation' => $reservation,
        ];

        $this->view('articles/tables', $data);
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
                if ($this->articleModel->addCroisiere($data)) {
                    flash('message', 'croisiere Added');
                    redirect('articles/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('articles/addcroisieres', $data);
            }
        } else {
            $Navires = $this->articleModel->getNavires();
            $ports = $this->articleModel->getPorts();
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

            $this->view('articles/addcroisieres', $data);
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
                if ($this->articleModel->addNavire($data)) {
                    flash('message', 'navire Added');
                    redirect('articles/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('articles/addnavire', $data);
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

            $this->view('articles/addnavire', $data);
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
                if ($this->articleModel->addport($data)) {
                    flash('message', 'port Added');
                    redirect('articles/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('articles/addports', $data);
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

            $this->view('articles/addports', $data);
        }
    }
    public function addchambre(){
        
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
            if (empty($data['ID_navire_err']) && empty($data['ID_type_err']) ) {
                if ($this->articleModel->addchambre($data)) {
                    flash('message', 'chambre Added');
                    redirect('articles/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('articles/addchambre', $data);
            }
        } else {
            $Navires = $this->articleModel->getNavires();
            $type = $this->articleModel->gettype();
            $data = [
                'ID_type' =>'' ,
                'ID_navire' => '',
                'ID_type_err' => '',
                'ID_navire_err' => '',
                'type' => $type,
                'Navires' => $Navires,
            ];

            $this->view('articles/addchambre', $data);
        }

    }
    public function addreservation($ID_croisiere){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ID_user' => $_SESSION['ID_user'],
                'ID_croisiere' => $ID_croisiere,
                'Prix_reservation' => trim($_POST['prixreservation']) ,
            ];
                     
            // make sure no errors
            if (!empty($data['ID_croisiere']) && !empty($data['Prix_reservation']) ) {
                if ($this->articleModel->addreservation($data)) {
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
                'ID_user' =>'',
                'ID_croisiere' => '',
                'Prix_reservation'=>''
            ];

            $this->view('pages/detaille', $data);
        }
    }
    //   delet croi
    public function deletecroisiere($ID_croisiere)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->articleModel->deleteCroisiere($ID_croisiere)) {
                flash('message', 'Croisiere Removed ');
                redirect('articles/tables');
            } else {
                flash('message', 'Somthing went wrong');
                redirect('articles/tables');
            }
        } else {
            $Croisieres = $this->articleModel->getCroisiereById($ID_croisiere);
            if ($Croisieres->ID_user != $_SESSION['ID_user']) {
                flash('message', 'you are not the same creator admin of this croisiere ');
                redirect('articles/tables');
            } else {
                if ($this->articleModel->deleteCroisiere($ID_croisiere)) {
                    flash('message', 'Croisiere Removed ');
                    redirect('articles/tables');
                } else {
                    flash('message', 'Somthing went wrong');
                    redirect('articles/tables');
                }
            }
        }
    }

    public function deletenavire($ID_navire)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->articleModel->deleteNavire($ID_navire)) {
                flash('message', 'navire Removed ');
                redirect('articles/tables');
            } else {
                flash('message', 'Somthing went wrong');
                redirect('articles/tables');
            }
        } else {
            $Croisieres = $this->articleModel->getNavireById($ID_navire);
            if ($Croisieres->ID_user != $_SESSION['ID_user']) {
                flash('message', 'you are not the same creator admin of this navire ');
                redirect('articles/tables');
            } else {
                if ($this->articleModel->deleteNavire($ID_navire)) {
                    flash('message', 'navire Removed ');
                    redirect('articles/tables');
                } else {
                    flash('message', 'Somthing went wrong');
                    redirect('articles/tables');
                }
            }
        }
    }
    public function deletePort($ID_port)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->articleModel->deletePort($ID_port)) {
                flash('message', 'Port Removed');
                redirect('articles/tables');
            } else {
                flash('message', 'Somthing went wrong');
                redirect('articles/tables');
            }
        } else {
            $Porte = $this->articleModel->getPortById($ID_port);
            if ($Porte->ID_user != $_SESSION['ID_user']) {
                flash('message', 'you are not the same creator admin of this Port ');
                redirect('articles/tables');
            } else {
                if ($this->articleModel->deletePort($ID_port)) {
                    flash('message', 'Port Removed ');
                    redirect('articles/tables');
                } else {
                    flash('message', 'Somthing went wrong');
                    redirect('articles/tables');
                }
            }
        }
    }
    public function deletechambre($ID_chambre)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->articleModel->deletechambre($ID_chambre)) {
                flash('message', 'chambre Removed');
                redirect('articles/tables');
            } else {
                flash('message', 'Somthing went wrong');
                redirect('articles/tables');
            }
        } else {
            $Porte = $this->articleModel->getchambreById($ID_chambre);
            if ($Porte->ID_user != $_SESSION['ID_user']) {
                flash('message', 'you are not the same creator admin of this chambre ');
                redirect('articles/tables');
            } else {
                if ($this->articleModel->deletechambre($ID_chambre)) {
                    flash('message', 'chambre Removed ');
                    redirect('articles/tables');
                } else {
                    flash('message', 'Somthing went wrong');
                    redirect('articles/tables');
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
                if ($this->articleModel->updateCroisiere($data)) {
                    flash('message', 'croisiere updated');
                    redirect('articles/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('articles/updatecroisiere', $data);
            }
        } else {
            $Navires = $this->articleModel->getNavires();
            $ports = $this->articleModel->getPorts();
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

            $this->view('articles/updatecroisieres', $data);
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
                if ($this->articleModel->updateNavire($data)) {
                    flash('message', 'navire Added');
                    redirect('articles/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('articles/updatenavire', $data);
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

            $this->view('articles/updatenavire', $data);
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
                if ($this->articleModel->updatePorts($data)) {
                    flash('message', 'port Added');
                    redirect('articles/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('articles/updateports', $data);
            }
        } else {

            $data = [
                'ID_port' =>'',
                'Nom_port' => '',
                'pays' => '',
                'image' => '',
                'Nom_port_err' => '',
                'pays_err' => '',
                'image_err' => '',
            ];

            $this->view('articles/updateports', $data);
        }
    }
    public function updatecroisiere($ID_croisiere){
        
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
                    if ($this->articleModel->updateCroisiere($data)) {
                        flash('message', 'croisiere Edit');
                        redirect('articles/tables');
                    } else {
                        die('wrong');
                    }
                } else {
                    $this->view('articles/updatecroisiere', $data);
                }
            } else {
                // $croi
                $Croisieres = $this->articleModel->getCroisiereById($ID_croisiere);
                $Navires = $this->articleModel->getNavires();
                $ports = $this->articleModel->getPorts();
             
                if ($Croisieres->ID_user != $_SESSION['ID_user']) {
                    flash('message', 'you are not the same creator admin of this croisiere ');
                    redirect('articles/tables');
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
    
                $this->view('articles/updatecroisiere', $data);
            }
        
    }
  
}
