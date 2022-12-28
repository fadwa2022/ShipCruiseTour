<?php
class Articles extends Controller
{
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
        $navirinfo = $this->articleModel->getnavirinfo();
        $i = 0;
        foreach ($Croisieres as $c) :
            $Croisieres[$i]->ID_navire = $this->articleModel->getOneNavires($c->ID_navire)[0]->Nom_navire;
            $i++;
        endforeach;

        $data = [
            'Croisieres' => $Croisieres,
            'navires' => $navires,
            'ports' => $ports,
            'chambre' => $chambre,
            'reservation' => $reservation,
            'navirinfo' => $navirinfo,
        ];

        $this->view('articles/tables', $data);
    }

    public function ports()
    {
        // Get articles
        $Ports = $this->articleModel->getPorts();

        $data = [
            'Ports' => $Ports,
        ];
        $this->view('articles/ports', $data);
    }

    public function Croisiere()
    {
        // Get articles
        $Croisieres = $this->articleModel->getCroisieres();
        $i = 0;
        foreach ($Croisieres as $c) :
            $Croisieres[$i]->ID_navire = $this->articleModel->getOneNavires($c->ID_navire)[0]->Nom_navire;
            $i++;
        endforeach;

        $data = [
            'Croisieres' => $Croisieres,
        ];
        $this->view('articles/Croisieres', $data);
    }



    // add croisieres
    public function addcroisieres()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ID_user' => $_SESSION['ID_user'],
                'Image' => $_FILES['image']['name'],
                'nbr_nuits' => trim($_POST['nbr_nuits']),
                'Port_dep' => trim($_POST['Port_dep']),
                'Port_Pause' => trim($_POST['Port_Pause']),
                'Port_Finale' => trim($_POST['Port_Finale']),
                'Date_dep' => trim($_POST['Date_dep']),
                'Image_err' => '',
                'nbr_nuits_err' => '',
                'Port_dep_err' => '',
                'Port_Pause_err' => '',
                'Port_Finale_err' => '',
                'Date_dep_err' => '',
            ];

            // validation 
            if (empty($data['Image'])) {
                $data['Image_err'] = 'please enter image';
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
            if (empty($data['Image_err']) && empty($data['nbr_nuits']) && empty($data['Port_dep']) && empty($data['Port_Pause']) && empty($data['Port_Finale']) && empty($data['Date_dep'])) {
                if ($this->articleModel->addCroisiere($data)) {
                    flash('article_message', 'croisiere Added');
                    redirect('articles/tables');
                } else {
                    die('wrong');
                }
            } else {
                $this->view('articles/addcroisieres', $data);
            }
        } else {
            $Navires = $this->articleModel->getNavires();
            $data = [
                'name_prod' => '',
                'quantite' => '',
                'prix' => '',
                'image' => '',
                'user_id' => '',
                'name_prod_err' => '',
                'quantite_err' => '',
                'prix_err' => '',
                'image_err' => '',
                'Navires' => $Navires,
            ];

            $this->view('articles/addcroisieres', $data);
        }
    }

    // public function add()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //         $data = [
    //             'name_prod' => trim($_POST['name']),
    //             'quantite' => trim($_POST['quantite']),
    //             'prix' => trim($_POST['prix']),
    //             'image' =>$_FILES['image']['name'],
    //             'user_id' => $_SESSION['user_id'],
    //             'name_prod_err' => '',
    //             'quantite_err' => '',
    //             'prix_err' => '',
    //             // 'image_err' => '',
    //         ];

    //         // validation 
    //         if (empty($data['name_prod'])) {
    //             $data['name_prod_err'] = 'please enter name article';
    //         }
    //         if (empty($data['quantite'])) {
    //             $data['quantite_err'] = 'please enter quantite';
    //         }
    //         if (empty($data['prix'])) {
    //             $data['prix_err'] = 'please enter prix';
    //         }
    //         // if(empty($data['image'])){
    //         // //     $data['image_err'] = 'please enter image';
    //         // }

    //         // make sure no errors
    //         if (empty($data['name_prod_err']) && empty($data['quantite_err']) && empty($data['prix_err'])) {
    //             if ($this->articleModel->addArticle($data)) {
    //                 flash('article_message', 'Article Added');
    //                 redirect('articles/dashbord');
    //             } else {
    //                 die('wrong');
    //             }
    //         } else {
    //             $this->view('articles/add', $data);
    //         }
    //     } else {
    //         $data = [
    //             'name_prod' => '',
    //             'quantite' => '',
    //             'prix' => '',
    //             'image' => '',
    //             'user_id' => '',
    //             'name_prod_err' => '',
    //             'quantite_err' => '',
    //             'prix_err' => '',
    //             'image_err' => '',
    //         ];

    //         $this->view('articles/add', $data);
    //     }
    // }
    public function detaille($ID_croisiere)
    {
        $Croisieres = $this->articleModel->getCroisiereById($ID_croisiere);
       
        $data = [
            'Croisieres' => $Croisieres
        ];
        $this->view('articles/detaille', $data);
    }
    // public function edit($id_prod)
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //         $data = [
    //             'id_prod' => $id_prod,
    //             'name_prod' => trim($_POST['name']),
    //             'quantite' => trim($_POST['quantite']),
    //             'image' =>$_FILES['image']['name'],
    //             'prix' => trim($_POST['prix']),
    //             'name_prod_err' => '',
    //             'quantite_err' => '',
    //             'prix_err' => '',
    //             'image_err' => '',
    //         ];

    //         // validation 
    //         if (empty($data['name_prod'])) {
    //             $data['name_prod_err'] = 'please enter name article';
    //         }
    //         if (empty($data['quantite'])) {
    //             $data['quantite_err'] = 'please enter quantite';
    //         }
    //         if (empty($data['prix'])) {
    //             $data['prix_err'] = 'please enter prix';
    //         }
    //         // if(empty($data['image'])){
    //         // //     $data['image_err'] = 'please enter image';
    //         // }

    //         // make sure no errors
    //         if (empty($data['name_prod_err']) && empty($data['quantite_err']) && empty($data['prix_err'])) {
    //             if ($this->articleModel->updateArticle($data)) {
    //                 flash('article_message', 'Article Edit');
    //                 redirect('articles/dashbord');
    //             } else {
    //                 die('wrong');
    //             }
    //         } else {
    //             $this->view('articles/edit', $data);
    //         }
    //     } else {

    //         $article = $this->articleModel->getPostById($id_prod);
    //         if ($article->admin_id != $_SESSION['user_id']) {
    //             flash('article_message', 'you are not the same creator admin of this article ');
    //             redirect('articles/dashbord');
    //         }
    //         $data = [
    //             'id_prod' => $id_prod,
    //             'name_prod' => $article->name_prod,
    //             'quantite' => $article->quantite,
    //             'prix' => $article->prix,
    //             'image' => '',
    //         ];
    //         $this->view('articles/edit', $data);
    //     }
    // }
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
                flash('message', 'you are not the same creator admin of this article ');
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
                flash('message', 'Navire Removed');
                redirect('articles/tables');
            } else {
                flash('message', 'Somthing went wrong');
                redirect('articles/tables');
            }
        } else {
            $Navires = $this->articleModel->getNavireById($ID_navire);
            if ($Navires->ID_user  != $_SESSION['user_id']) {
                flash('message', 'you are not the same creator admin of this navire ');
                redirect('articles/tables');
            } else {
                if ($this->articleModel->deleteNavire($ID_navire)) {
                    flash('message', 'Navire Removed ');
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
            if ($Porte->ID_user  != $_SESSION['ID_user']) {
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
    public function deleteReservation($ID_Reservation)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->articleModel->deleteReservation($ID_Reservation)) {
                flash('message', 'Reservation Removed');
                redirect('articles/tables');
            } else {
                flash('message', 'Somthing went wrong');
                redirect('articles/tables');
            }
        } else {
            if ($this->articleModel->deleteReservation($ID_Reservation)) {
                flash('message', 'Reservation Removed ');
                redirect('articles/tables');
            } else {
                flash('message', 'Somthing went wrong');
                redirect('articles/tables');
            }
        }
    }
}
