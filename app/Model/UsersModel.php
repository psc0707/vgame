<?php 
namespace Model;

class VideogameModel extends \W\Model\Model 
{    
    /** @var int */
    private $genre;
    /** @var int */
    private $console;
    //Genre/Catégorie du jeu vidéo => 1=Aventure, 2=Simulation, 3=Sport, etc.            
    // Propriété statique
    protected static $genreValues = array(
        1 => 'Aventure',
        2 => 'Simulation',
        3 => 'Sport',
        4 => 'Autre'
    );
    
    const GENRE_AVENTURE    = 1; 
    const GENRE_SIMULATION  = 2; 
    const GENRE_SPORT       = 3;
    const GENRE_AUTRE       = 4;
    
    //Console du jeu vidéo => 1=PC, 2=>Megadrive 3=>SNES 
    protected static $consoleValues = array(
        1 => 'PC',
        2 => 'Megadrive',
        3 => 'SNES',
        4 => 'Autre'
    );        
    const CONSOLE_PC            = 1;
    const CONSOLE_MEGADRIVE     = 2;
    const CONSOLE_SNES          = 3;
    const CONSOLE_AUTRE         = 4;
    
    
    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('vid_id');
        
    }
    
     /**     * 
     * @return int
     */
    public function getGenreName() {
        // J'appelle ma méthode statique
        return self::getSteeringNameFromValue($this->genre);
    }
    
    // Méthode static
    public static function getGenreNameFromValue($genre) {
        if (array_key_exists($genre, self::$genreValues)) {
            return self::$genreValues[$genre];
        }
        return '0';
    }
     /**     * 
     * @return int
     */
    public function getConsoleName() {
        // J'appelle ma méthode statique
        return self::getSteeringNameFromValue($this->console);
    }
    
    // Méthode static
    public static function getConsoleNameFromValue($console) {
        if (array_key_exists($console, self::$consoleValues)) {
            return self::$consoleValues[$console];
        }
        return '0';
    }

    public function getVidGameByVConsole($consoleId)
    {
        $sql =' 
             SELECT `vid_id`, `vid_name`, `vid_year`, `vid_editor`, `vid_genre`, `vid_console`, `vid_image`, `vid_inserted`
             FROM videogame                 
             WHERE vid_console = :consoleId
         ';
         $sth = $this->dbh->prepare($sql);
         $sth->bindValue(':consoleId', $consoleId,\PDO::PARAM_INT);

         if ($sth->execute() === false) {
            debug($sth->errorInfo());           
         } else {           
            return $sth->fetchAll(\PDO::FETCH_ASSOC); 
         }
         return false;                                    
        }
    
}