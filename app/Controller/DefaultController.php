<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\VideogameModel;
//use \W\Security\AuthentificationModel;

class DefaultController extends Controller
{        
	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
            $this->allowTo(array('user','admin'));
            //$userRefresh = new AuthentificationModel();
            //debug($_SESSION['user']);
            //debug($_SESSION['user']['usr_role']);
            //$userRefresh->refreshUser();
            $userConnected = $this->getUser();
                            
            $videogameModel = new VideogameModel();             
            $allVidGame = $videogameModel->findAll();

            $vidGames = array();
            foreach ($allVidGame as $currenGame) {                     
                //debug( $currenGame);
                $currenGame ['genre']   = $videogameModel->getGenreNameFromValue($currenGame['vid_genre']);
                $currenGame ['console'] = $videogameModel->getConsoleNameFromValue($currenGame['vid_console']);
                $currenGame ['vidName'] = join('-', array($currenGame['vid_name']));
                $vidGames [] = $currenGame;                            
            }
            //debug($vidGames);                          
            $this->show('default/home',['allVidGame' => $vidGames,
                                        'userConnected' => $userConnected['usr_role']
                                            ]);		
	}

}