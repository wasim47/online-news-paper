<?php
if(!empty($_POST["keyword"])) {
?>
<ul id="country-list">
<?php
	
	$keyword = $datasource;
	$sql = "SELECT * FROM news_manage WHERE headline LIKE '" . $_POST["keyword"] . "%' ";
	$dataquery = $this->db->query($sql);
	foreach($dataquery->result() as $res){
 ?>
		<li onClick="selectCountry('<?php echo $res->headline; ?>');"><?php echo $res->headline; ?></li>
<?php } ?>
</ul>
<?php } ?>