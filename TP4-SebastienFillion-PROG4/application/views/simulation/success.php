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
<p style="color: white;">Bravo ! la simulation à été choisi avec succès.
</p>