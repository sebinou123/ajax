<title>Upload Form</title>

<?php if(isset($error)){echo $error;} ?>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('simulation/loadXML');?>
<?php echo form_upload('userfile','upload');?>
<?php echo form_submit('transmettre','upload');?>


<br /><br />

</form>