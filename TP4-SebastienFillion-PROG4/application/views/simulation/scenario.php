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

<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('simulation/scenario') ?>

 <p>
       <select name="simulation" id="scenario_nom">
       	 <option value="null">----</option>
<?php foreach($options as $cle => $element){ ?>
           <option value="<?php echo $cle ?>"><?php echo $element ?></option>
   <?php } ?>
     </select>
   </p>
   <input type="submit" name="submit" value="Submit simulation" />
</form>
