<?php

class Controller_user extends Controller{

    public function action_user()
    {
        // Vérifier si l'utilisateur est connecté et si c'est un "user"
        if (!isset($_SESSION['login']) || $_SESSION['role'] != 'user') {
            header('Location: ?controller=signin');
            exit();
        }

        // Récupérer le prénom de l'utilisateur connecté
        $welcome = htmlspecialchars($_SESSION['prenom']);

        $data = ['welcome' => $welcome];
        $this->render('user', $data);
    }

    public function action_default()
    {
        $this->action_user();
    }
}
