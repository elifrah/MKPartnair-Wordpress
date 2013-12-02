<?php
/*
Template Name: Print
*/
?>

<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<style>
* {
	margin: 0;
}
</style>
<body>
<iframe id="exPDF" src="<?php echo $_GET['pdf'] ?>" width="100%" height="100%" border="0"></iframe>
</body>
</html>