
<a href="<?php echo base_url();?>login/logout">logout</a>

<?php

echo $title;
echo '<br />';
echo "Bienvenido";

?>

<script>
setTimeout ('window.location.assign("<?php echo base_url();?>")',3000);
</script>