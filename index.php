<?php


require_once __DIR__.'/Controllers/ClientController.php';
require_once __DIR__.'/Controllers/AdminController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

$ClientController = new ClientController();
$AdminController = new AdminController(); 
switch ($action) {
    case 'traiterSoumissionCommande':
        $ClientController->traiterSoumissionCommande();
        break;
    case 'passerC':
        $ClientController->passerCommande();
        break;
    case 'detailsCommande':
        $commandeId = isset($_GET['commande_id']) ? $_GET['commande_id'] : '';
        $ClientController->detailsCommande($commandeId);
        break;
    case 'create':
        $AdminController->create();
        break;
        case 'updateform':
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $AdminController->updateform($id);
        break;
        case 'update':
            $AdminController->update();
            break;
    case 'delete':
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $AdminController->delete($id);
        break;
    case 'adminAccueill':
        $AdminController->login();
        break;
        case 'adminAccueil':
            $AdminController->Accueil();
            break;
        case 'client':
            $AdminController->afficherListeClients();
            break;
    default:
        $ClientController->accueil(); 
        break;
}
?>
