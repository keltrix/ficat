<?php
include "../php/conexao.php";
    $from = $_POST['from'];
    $to = $_POST['to'];
    $rs000 = mysql_query("SELECT * FROM newareadoconhecimento WHERE COD_AREA_CONHECIMENTO BETWEEN $from and $to ORDER BY id ASC");
?>

<?php
while($reg2 = mysql_fetch_object($rs000)):?>
<li>
<img class="dummyclass" src="assets/imgs/f.gif" alt="search term"/>
<a href="javascript:void(null);" onclick="javascript: i(this);" class="value" value="<?php echo $reg2->COD_AREA_CONHECIMENTO;
?>"><?php echo $reg2->DESC_AREA_CONHECIMENTO;
?>
<?php endwhile;
?>
</a>