<?php 
echo "hello"; 

// build js 
echo "<script language=\"javascript\">";
echo "var question = confirm(\"Process ?\");"; 
echo "</script>";
?>
<script language="text/javascript">
if(question){ 
 alert('its ok');
} else { 
 alert('its not ok');
};
</script>
<?
echo "world"; 
?>