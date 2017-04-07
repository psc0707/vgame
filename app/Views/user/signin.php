<?php 
    $session_flash = array();
    if (isset($_SESSION['flash']) && !empty($w_flash_message->message)) {
        $session_flash = [
            'message' => $w_flash_message->message,
            'level' => $w_flash_message->level        
        ];
        //Vidage des alert en Session
        unset($_SESSION['flash']);
    }          
?>
<?php $this->layout('layout', ['title' => 'Signin',
                               'currentPage' => 'signin',
                               'session' => $session_flash
                                ]) ?>

<?php $this->start('main_content') ?>
    <h2>Signin</h2>
    <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-0"></div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="page-header">
                        <h1>Sign in <small><a href="<?= $this->url('user_signup'); ?>">Créer un compte</a></small></h1>
                    </div>
                
                    <!-- <?php debug($session_flash); ?> -->
                    <form action="" method="post">
                            <fieldset>
                                    <input type="email" class="form-control" name="emailUser" value="" placeholder="Email address" /><br />
                                    <input type="password" class="form-control" name="password1" value="" placeholder="Your password" /><br />
                                    <input type="submit" class="btn btn-success btn-block" value="Sign in" />
                            </fieldset>
                    </form>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-0"></div>
    </div>
    <br>
    <br>
    <br>
<?php $this->stop('main_content') ?>
