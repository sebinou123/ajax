<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('index.php/news/erase') ?>
<label for="item">Dans quel pays habitez-vous ?</label><br />
 <p>
       <select name="item" id="titre">
       	 <option value="null">----</option>
<?php for($i = 1; $i <= sizeof($options); $i++){ ?>
           <option value="<?php echo $i ?>"><?php echo $options[$i] ?></option>
   <?php } ?>
     </select>
   </p>
   <input type="submit" name="submit" value="Erase item" />
</form>