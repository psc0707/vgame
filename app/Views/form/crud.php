<?php $this->layout('layout', ['title' => 'Home',
                               'currentPage' => '',
                               'userConnected' => $userConnected 
                                ]) ?>

<?php $this->start('main_content') ?>
<br>
 <table class="table">  
     <thead>
         <th></th>
         <th>Game Name</th>
         <th>Release Year</th>
         <th>Editor</th>
         <th>Type</th>
         <th>Games console</th>
     </thead>
     <tbody>                        
         <?php foreach ($allVidGame as $game) : ?>      
           <tr>                                            
             <td><img src="<?= $game['vid_image']; ?>" alt="img"></td> 
             <td><a href="<?= $this->url('videogame_detail',[
                                                            'consoleId'    => $game['vid_console'], 
                                                            'consoleName'  => $game['console'],   
                                                            'vidId'        => $game['vid_id'], 
                                                            'vidName'      => $game['vidName']                                  
                                                            ]); ?>">
                    <?= $game['vid_name']; ?>
                 </a>
             </td>
             <td><?= $game['vid_year'] ?></td>             
             <td><?= $game['vid_editor']; ?></td>            
             <td><?= $game['genre']; ?></td>                                                       
             <td><a href="<?= $this->url('videogame_console',[
                                                            'consoleId'    => $game['vid_console'], 
                                                            'consoleName'  => $game['console']   
                                                            ]); ?>">                 
                 <?= $game['console']; ?>
                 </a>
             </td>
             <td>
                 <a class="btn btn-xs btn-success" href="<?= $this->url('videogame_detail',[
                                                            'consoleId'    => $game['vid_console'], 
                                                            'consoleName'  => $game['console'],   
                                                            'vidId'        => $game['vid_id'], 
                                                            'vidName'      => $game['vidName']                                  
                                                            ]); ?>">
                     Détails..
                 </a>
                 <br>
                 <br>
                 <?php if (isset($userConnected) && $userConnected == 'admin') :?> 
                    <a class="btn btn-xs btn-success" href="<?= $this->url('videogame_detail',['vidId' => $game['vid_id']]); ?>">Modifier</a>            
                 <?php endif; ?>
             </td>        

           </tr>
         <?php endforeach; ?>

     </tbody>
 </table>		
<?php $this->stop('main_content') ?>
