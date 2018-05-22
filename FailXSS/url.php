<?php
if(isset($_POST['texte'])) {
echo htmlspecialchars($_POST['texte']);
}
?>

<form action="./url.php" method="post">
<p>
<textarea name="texte" rows="10" cols="50">
<script type="text/javascript">
alert('Ohoh, vous avez été piraté par `Haku!!');
</script>
</textarea>
<input type="submit" name="valid" value="go" />
</p>
</form>
