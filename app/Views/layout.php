<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	
<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">        
<!--Custum-->         
        <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
        	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <div class="container">
        <!-- Fixed navbar -->
                        <nav class="navbar navbar-default navbar-fixed-top">
                          <div class="container">
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                              <a class="navbar-brand" href="<?= $this->url('default_home') ?>">Patrice&Co</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                              <ul class="nav navbar-nav">                                                                  
                                <?php if (isset($userConnected) && $userConnected == 'admin') :?> 
                                <li <?php if ($currentPage == 'crud')  :?> <?= 'class=active'; ?><?php endif;?>>
                                    <a href="<?= $this->url('crud'); ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add Game</a>
                                </li>
                                <?php endif;?>
                                <?php if (empty($w_user)) :?> 
                                    <li <?php if ($currentPage == 'signin') :?> <?= 'class=active'; ?><?php endif;?>>                                    
                                        <a href="<?= $this->url('user_signin'); ?>"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>.Signin</a>
                                    </li>
                                <?php else :?> 
                                    <li <?php if ($currentPage == 'logout') :?> <?= 'class=active'; ?><?php endif;?>>
                                        <a href="<?= $this->url('user_logout'); ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>.Logout</a>
                                    </li>
                                <?php endif;?>
                              </ul>
                                <form action="catalog.php" class="navbar-form navbar-right" method="get">
                                                    <div class="form-group">
                                                            <input type="text" name="s" class="form-control" placeholder="Search">
                                                    </div>
                                                    <button type="submit" class="btn btn-success btn-sm">Rechercher</button>
                                </form>
                            </div><!--/.nav-collapse -->
                          </div>
                        </nav>    
            </div>
        </div>
</head>
<body>
	<div class="container">
                <br>
                <br>
		<header>
			<h1><?= $this->e($title) ?></h1>
		</header>
		<ol class="breadcrumb">
			<li><a href="<?= $this->url('default_home') ?>">Home</a></li>                               
			<?php if (!empty($currentPage)) : ?>                                
				<li class="active"><a href="#"><?= $currentPage ?></a></li>                                
			<?php endif; ?>
		</ol>            
                <!-- <?php debug($w_user);?> -->
                <?php if (isset($_SESSION['flash']) && !empty($w_flash_message->message)) :?>    
                    <div class="alert alert-<?= $w_flash_message->level; ?>" role="alert">
                        <?= $w_flash_message->message; ?>
                    </div>
                <?php endif ?>
                
		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
                    <div class="panel panel-default">
                            <div class="panel-body text-center">
                                    PSC &copy; <?= date('Y') ?> - Tous droits réservés<br>
                                    <a href="<?= $socialLinks->facebook->shareUrl ?>">Facebook</a>&nbsp;|
                                    <a href="<?= $socialLinks->twitter->shareUrl ?>">Twitter</a>&nbsp;|
                                    <a href="<?= $socialLinks->linkedin->shareUrl ?>">LinkedIn</a>
                            </div>
                    </div>                                        
		</footer>
	</div>
<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
</body>
</html>