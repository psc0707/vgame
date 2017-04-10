<?php $this->layout('layout', ['title' => 'Signup',
                               'currentPage' => 'signup'
                                ]) ?>

<?php $this->start('main_content') ?>    
    <div class="row">
        <div class="col-md-2 col-sm-2 col-xs-0"></div>
        <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="page-header">
                        <h1>Sign up</h1>
                </div>
                                    
                <form action="" method="post">
                        <fieldset>
                                <input type="email" class="form-control" name="emailUser" value="" placeholder="Email address" /><br />
                                <input type="password" class="form-control" name="password1" value="" placeholder="Your password" /><br />
                                <input type="password" class="form-control" name="password2" value="" placeholder="Confirm your password" /><br />
                                <input type="submit" class="btn btn-success btn-block" value="Sign up" />
                        </fieldset>
                </form>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-0"></div>
    </div>
    <br>
    <br>
    <br>
<?php $this->stop('main_content') ?>
