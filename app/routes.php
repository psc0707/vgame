<?php
    /* detail -> consoles/1/PC/21/day-of-the-tentacle/ */
    /*  * URL : http://micromonio.dev/consoles/1/PC/21/day-of-the-tentacle/
		** 1 est l'id de la console
		** PC est le nom de la console
		** 21 est l'id du jeu video
		** day-of-the-tentacle est le titre reformaté du jeu vidéo */
    /* consoles -> consoles/1/PC/ */
    /* URL : http://micromonio.dev/consoles/1/PC/ (où 1 est l'id de la console) */
$w_routes = array(
        ['GET', '/', 'Default#home', 'default_home'],
        //consoles/1/PC/21/day-of-the-tentacle/
        ['GET', '/consoles/[i:consoleId]/[a:consoleName]/[i:vidId]/[:vidName]/', 'Videogame#detail', 'videogame_detail'],
        //consoles/1/PC/ 
        ['GET', '/consoles/[i:consoleId]/[:consoleName]', 'Videogame#console', 'videogame_console'],
        ['GET', '/', 'Videogame#genre', 'videogame_genre'],                
        ['GET', '/', 'Default#home', 'crud'],
        //micromonio.com/signin/
        ['GET', '/signin/', 'User#signin', 'user_signin'],
        ['POST', '/signin/', 'User#signinPost', 'user_signinpost'],
        //micromonio.com/signup/
        ['GET|POST','/signup/', 'User#signup', 'user_signup'],
        //micromonio.com/logout/
        ['GET','/logout/', 'User#logout', 'user_logout']
);