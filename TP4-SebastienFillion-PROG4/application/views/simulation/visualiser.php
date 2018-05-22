 <div class="sidebar">
	  <nav>
	  <?php $user = $this->ion_auth->user()->row();?>
	    <div >
          <ul id="nav">
             <?php if($this->ion_auth->logged_in()):?> 
            <li><?= anchor('simulation/visualiser', 'Recul')?> </li>
               <?php endif; ?>
               <?php if($this->ion_auth->logged_in()):?> 
             <li><?= anchor('simulation/visualiser', 'Avance')?></li> 
              <?php endif; ?>
             <?php if($this->ion_auth->logged_in()):?> 
            <li><?= anchor('simulation/scenario', 'Choisir Scénario')?></li> 
            <?php endif; ?>
          </ul>
        </div><!--close menubar-->	
      </nav>
</div>
 <?php 
 if(isset($_SESSION['scenario'])){
 	if($_SESSION['scenario'] != null){
 		?>
 		<table>
 		<caption style="color: white;"> <?php echo $scenario['scenario_nom']; ?> </caption>
 		
 		 <tbody> <!-- Corps du tableau -->
 	<?php for($i = 0; $i < $scenario['size_x']; $i++){?>
       <tr>
        <?php for($y = 0; $y < $scenario['size_y']; $y++){?>
        
           <td>
           
           <img src="<?php echo base_url('assets/images/sol.jpg');?>" height="120" width="90"></img>
           
           </td>
           
          <?php }?>
       </tr>
       <?php }?>
   </tbody>
</table>
 	
 	
 	
 	<?php
 	}
 }
 else 
 {?>
 	<p>Vous devez choisir  une simulation</p>
 	
 
 <?php
 }?>