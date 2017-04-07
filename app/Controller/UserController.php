<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;

class UserController extends Controller
{

	public function signin()
	{           
            $this->show('user\signin');
	}
	public function signinPost()
	{
                $email = self::filterStringInputPost('emailUser');
                $password1 = self::filterStringInputPost('password1');
                
                $errorList = array();
                //Validation des données
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    $errorList[] = 'Adresse email incorrecte';
                }
                
                if (strlen($password1) < 6) {
                    $errorList[] = 'Mot de passe invalide < 6 caractères';
                }            
                //debug($errorList);
                if (count($errorList)== 0) {                                        
                    $authModel = new AuthentificationModel();
                    //Vérification du user en DB
                    $userId = $authModel->isValidLoginInfo($email, $password1);    
                    if ($userId > 0) {
                        //Recherche les infos du user en DB
                        $usersModel = new UsersModel();
                        $userInfos = $usersModel->find($userId);
                        //Ajout du user en session
                        $authModel->logUserIn($userInfos);
                        //Connexion réussie
                        $this->flash('User '.$userInfos['usr_email'].' connecté','success');
                        //Redirect to home
                        $this->redirectToRoute('default_home');
                    } else {
                        
                    }
                } else {
                    $this->flash(join('<br>',$errorList),'danger');
                }                
                
                $this->show('user\signin');
        }                         
	
	public function signup()
	{
            //Vidage des alert en Session
            unset($_SESSION['flash']);
            
            if (!empty($_POST)) {
                $email = self::filterStringInputPost('emailUser');
                $password1 = self::filterStringInputPost('password1');
                $password2 = self::filterStringInputPost('password2');
                
                $errorList = array();
                //Validation des données
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    $errorList[] = 'Adresse email incorrecte';
                }
                
                if (strlen($password1) < 6) {
                    $errorList[] = 'Mot de passe invalide < 6 caractères';
                }
                
                if ($password1 != $password2) {
                    $errorList[] = 'Les deux mot de passe sont différents';
                }
                //debug($errorList);
                if (sizeof($errorList)==0) {                                        
                    //INSERT user en DB
                    $userModel = new UsersModel();
                    
                    if ($userModel->emailExists($email)) {
                       $this->flash('L\'email existe déja', 'danger');
                    } else {                        
                       //Cryptage du mot de pass
                       $authModel = new AuthentificationModel();                        
                       $hashPassword = $authModel->hashPassword($password1);
                       $row = [                           
                           'usr_email' => $email,
                           'usr_role' => 'user',
                           'usr_password' => $hashPassword
                       ];
                       //Création du user                       
                       $insertedUser = $userModel->insert($row);
                       //debug($insertedUser);
                       if (!empty($insertedUser)) {
                           //Message de succès
                           $this->flash('User enregistré','success');
                           //Redirection vers la page signin
                           //debug($_SESSION['flash']);
                           $this->redirectToRoute('user_signin');
                       } else {
                           $this->flash('Register Error','danger');
                       }
                    }
                    
                } else {
                    $this->flash(join('<br>',$errorList),'danger');
                }                
            } 
            
            $this->show('user\signup');
	}	

        public static function filterStringInputPost($name, $defaultValue='') {
                $getValue = filter_input(INPUT_POST, $name);
                if ($getValue !== false) {
                        return trim(strip_tags($getValue));
                }
                return $defaultValue;
        }
        public static function filterIntInputPost($name, $defaultValue=0) {
                $getValue = filter_input(INPUT_POST, $name);
                if ($getValue !== false) {
                        return intval(trim($getValue));
                }
                return $defaultValue;
        }        
        
        public function passwordForgot($param) {
            
        }
        
        public function logout($param) {
            $authModel = new AuthentificationModel();
            //Suppression du user en session
            $authModel->logUserOut();
            
            //Vidage des alert en Session
            unset($_SESSION['flash']);
            //Home redirection
            $this->redirectToRoute('default_home');
        }
        
}