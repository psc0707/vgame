<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\VideogameModel;

class VideogameController extends Controller
{
	/**
	 * Page detail du jeux
	 */
        /*  * URL : http://micromonio.dev/consoles/1/PC/21/day-of-the-tentacle/
		** 1 est l'id de la console
		** PC est le nom de la console
		** 21 est l'id du jeu video
		** day-of-the-tentacle est le titre reformaté du jeu vidéo */    
	public function detail($vidId)
	{
            $videogameModel = new VideogameModel();             
            $vidGame        = $videogameModel->find($vidId);
            $vidGame ['genre']   = $videogameModel->getGenreNameFromValue($vidGame['vid_genre']);
            $vidGame ['console'] = $videogameModel->getConsoleNameFromValue($vidGame['vid_console']);
            //[i:consoleId/[a:consoleName]/[i:vidId]/[:vidName]
            
            //debug($vidGame);                          
            $this->show('consoles/detail',['vidGame' => $vidGame 
                                    ]);		
	}
	public function console($consoleId)
	{
            $videogameModel = new VideogameModel();             
            $allConsoleVidGame   = $videogameModel->getVidGameByVConsole($consoleId);
            //debug($allConsoleVidGame);  
            $consoleName = $videogameModel->getConsoleNameFromValue($allConsoleVidGame[0]['vid_console']);
            $allVidGamesByCons = array();            
            foreach ($allConsoleVidGame as $currenGame) {      
                $currenGame ['genre']   = $videogameModel->getGenreNameFromValue($currenGame['vid_genre']);
                $currenGame ['console'] = $videogameModel->getConsoleNameFromValue($currenGame['vid_console']);     
                $currenGame ['vidName'] = join('-', array($currenGame['vid_name']));
                $allVidGamesByCons[]    = $currenGame;
            }
            //debug($allVidGamesByCons);  
            
            // consoles/[i:consoleId]/[:consoleName]                                              
            $this->show('consoles/consoles',['allVidGamesByCons' => $allVidGamesByCons,
                                            'consoleName' => $consoleName   
                                    ]);		
	}
        


}