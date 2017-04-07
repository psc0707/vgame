<?php $this->layout('layout', ['title' => 'Detail',
                               'currentPage' => 'Detail']) ?>

<?php $this->start('main_content') ?>
<div class="row">  
  <div id="posterDetailsMovies" style=" background-image: url( <?php echo $vidGame['vid_image']; ?> )" class="col-md-4">
  </div>
  <div class="col-md-offset-1"></div>
  <div class="col-md-7">
    <div class="row">
      <div class="col-md-8">
        <h1> <?= $vidGame['vid_name'].' / '.$vidGame['vid_year']; ?></h1>
      </div>
      <div class="col-md-4">
        <h2> <?php echo ' - '.$vidGame['genre'] ?> </h2>        
      </div>
    </div><br><br>        
      <p><strong>Editor  : </strong><?php echo $vidGame['vid_editor'] ?> </p>
      <p><strong>Console : </strong><?php echo $vidGame['console']    ?></p>
      
      
    </div>
</div>
	
<?php $this->stop('main_content') ?>
