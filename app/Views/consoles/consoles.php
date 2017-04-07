<?php $this->layout('layout', ['title' => 'ConsoleGame',
                               'currentPage' => 'Games by console']) ?>

<?php $this->start('main_content') ?>
<br>
 <table class="table">  
     <h1>Games console :<?= ' '.$consoleName; ?> </h1> 
     <thead>         
         <th>Game Name</th>
         <th>Release Year</th>
         <th>Editor</th>
         <th>Type</th>
         
     </thead>
     <tbody>                        
         <?php foreach ($allVidGamesByCons as $game) : ?>      
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
                 <a class="btn btn-xs btn-success" href="<?= $this->url('videogame_detail',['vidId' => $game['vid_id']]); ?>">Modifier</a>            
             </td>        

           </tr>
         <?php endforeach; ?>

     </tbody>
 </table>		
<?php $this->stop('main_content') ?>
