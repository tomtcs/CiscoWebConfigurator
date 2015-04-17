<?php
if(isset($_GET['ManageModels'])){
if ($_GET['ManageModels'] == "1"){
//Determine if user is adding, modifying, or deleting modules
?>
<div id="content">
<h1>Manage Switch Models</h1>
<br/>
<center>
<p style="text-align: center; width: 175px; margin: 10px; height: 35px; line-height: 35px; font-size: 16px; vertical-align: middle; background: #000000; color: #FFFFFF;"><a style="color: #FFFFFF; text-decoration:none;" href="index.php?ManageModels=2&AddModel=1">Add Switch Model</a></p>
<p style="text-align: center; width: 175px; margin: 10px; height: 35px; line-height: 35px; font-size: 16px; vertical-align: middle; background: #000000; color: #FFFFFF;"><a style="color: #FFFFFF; text-decoration:none;" href="index.php?ManageModels=2&ModifyModel=1">Modify Switch Model</a></p>
<p style="text-align: center; width: 175px; margin: 10px; height: 35px; line-height: 35px; font-size: 16px; vertical-align: middle; background: #000000; color: #FFFFFF;"><a style="color: #FFFFFF; text-decoration:none;" href="index.php?ManageModels=2&DeleteModel=1">Delete Switch Model</a></p>
</center>
</div>
<?php
}
if(isset($_GET['AddModel'])){
if ($_GET['ManageModels'] == "2" and $_GET['AddModel'] == "1"){
//Add New Cisco Module
?>
<div id="content">
<center>
<h1>Model Management</h1>
<br/>
<h2>Add Cisco Switch Model</h2>
<form method="GET" action="index.php">
<table style="width: 500px; margin: 0 auto;" cellspacing="1" cellpadding="2">
<tr>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">Model Number</td>
<td style="width: 250px;"><input name="ModelNumber" type="text" id="ModelNumber" style="border: 1px solid #000000; width: 250px; padding: 5px; background-color: #EFEFEF;"></td>
</tr>
<tr>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">Number of Slots</td>
<td style="width: 250px;"><select name="NumSlots" style="border: 1px solid #000000; width: 250px; padding: 5px; background-color: #EFEFEF;">
<option selected="" value="3">3</option><option value="6">6</option>
<option value="9">9</option><option value="13">13</option></select></td>
</tr>
<tr>
<td></td>
<td>
<input name="ManageModels" value="2" type="hidden" />
<input name="AddModel" value="2" type="hidden" />
<input name="submit" type="submit" value="Submit" style="background-color: #000000; color: #FFFFFF; padding: 10px;">
</td>
</tr>
</table>
</form>
</center>
</div>
<?php
}
if ($_GET['ManageModels'] == "2" and $_GET['AddModel'] == "2"){
//Add New Cisco Module
$ModelNumber = $_GET['ModelNumber'];
$NumSlots = $_GET['NumSlots'];

$conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$sql = "INSERT INTO Models ".
       "(ModelNumber,NumSlots) ".
       "VALUES('$ModelNumber','$NumSlots')";

$retval = mysql_query($sql);
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
mysql_close($conn);
?>
<div id="content">
<center>
<h1>Model Management</h1>
<br/>
<h2>Add Cisco Switch Model</h2>
<br/>
<p>Data has been successfully added to the database.</p>
</center>
</div>
<?php
}
}
//Modify Module Management
//Select the Module to Modify
if(isset($_GET['ModifyModel'])){
if ($_GET['ManageModels'] == "2" and $_GET['ModifyModel'] == "1"){
$conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$sql = "SELECT * FROM Models ORDER BY ModelNumber ASC";
?>
<div id="content">
<center>
<h1>Model Management</h1>
<br/>
<h2>Modify Cisco Switch Model</h2>
<br/>
<form method="GET" action="index.php">
<p>Please select the Cisco Chassis Model from the list below which you would like to modify:</p>
<select name="ID" style="border: 1px solid #000000; width: 250px; padding: 5px; background-color: #EFEFEF;">
<?php 
$result = mysql_query($sql);
while ($row = mysql_fetch_assoc($result)) {
echo '<option value="'.$row["ID"].'">'
.$row["ModelNumber"].'</option>';
}
?>
</select>
<br/>
<input name="ManageModels" value="2" type="hidden" />
<input name="ModifyModel" value="2" type="hidden" />
<input name="submit" type="submit" value="Submit" style="background-color: #000000; color: #FFFFFF; padding: 10px; margin: 10px;">
</form>
</center>
</div>
<?php
mysql_close();
}

//Review module parameters and change as needed
if ($_GET['ManageModels'] == "2" and $_GET['ModifyModel'] == "2"){
$ID = $_GET['ID'];

$conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$sql = "SELECT * FROM Models WHERE ID = '$ID' LIMIT 1";
$result = mysql_query($sql);
while ($row = mysql_fetch_assoc($result)) {
$OldModelNumber = $row['ModelNumber'];
$OldNumSlots = $row['NumSlots'];
}?>
<div id="content">
<center>
<h1>Model Management</h1>
<br/>
<h2>Modify Cisco Switch Model - Step 2</h2>
<br/>
<form method="GET" action="index.php">
<table width="750px" border="0" cellspacing="1" cellpadding="2">
<tr>
<tr style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold;">
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">Setting</td>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">Old Value</td>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">New Value</td>
</tr>
<tr>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">Model Number</td>
<td style="width: 250px;"><?php echo $OldModelNumber ?></td>
<td style="width:250px;"><input name="ModelNumber" type="text" value="<?php echo $OldModelNumber ?>" id="ModelNumber" style="border: 1px solid #000000; width: 160px; padding: 5px; background-color: #EFEFEF;"></td>
</tr>
<tr>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">Number of Slots</td>
<td style="width: 250px;"><?php echo $OldNumSlots ?></td>
<td style="width: 250px;"><select name="NumSlots" style="border: 1px solid #000000; width: 250px; padding: 5px; background-color: #EFEFEF;">
<option selected="" value="3">3</option><option value="6">6</option>
<option value="9">9</option><option value="13">13</option></select></td>
</tr>
<tr>
<td></td>
<td>
<input name="ID" value="<?php echo $ID ?>" type="hidden" />
<input name="ManageModels" value="2" type="hidden" />
<input name="ModifyModel" value="3" type="hidden" />
<input name="submit" type="submit" value="Submit" style="background-color: #000000; color: #FFFFFF; padding: 10px;">
</td>
</tr>
</table>
</form>
</center>
</div>
<?php
mysql_close($conn);
}

//Submit Module Changes to Database
if ($_GET['ManageModels'] == "2" and $_GET['ModifyModel'] == "3"){
$conn = mysql_connect($dbserver, $dbuser, $dbpass);
mysql_select_db($dbname);

$ID = $_GET['ID'];
$ModelNumber = $_GET['ModelNumber'];
$NumSlots = $_GET['NumSlots'];
$sql = "UPDATE Models SET ModelNumber='$ModelNumber',NumSlots='$NumSlots' WHERE ID = '$ID'";
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
?>
<div id="content">
<center>
<h1>Model Management</h1>
<br/>
<h2>Modify Cisco Switch Model - Complete</h2>
<br/>
<p>Data has been successfully updated in the database.</p>
</center>
</div>
<?php
mysql_close($conn);
}
}
if(isset($_GET['DeleteModel'])){
if ($_GET['ManageModels'] == "2" and $_GET['DeleteModel'] == "1"){
$conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
$sql = "SELECT * FROM Modules ORDER BY ModelNumber ASC";
?>
<div id="content">
<h1>Delete Cisco Model</h1>
<br/>
<form method="GET" action="index.php">
<p>Please select the model you would like to delete.</p>
<select name="ID" style="margin: 10px; padding: 10px; width: 200px;">
<?php 
$result = mysql_query($sql);
while ($row = mysql_fetch_assoc($result)) {
echo '<option value="'.$row["ID"].'">'
.$row["ModelNumber"].'</option>';
}
?>
</select>
<br/>
<input name="ManageModels" value="2" type="hidden" />
<input name="DeleteModel" value="2" type="hidden" />
<input name="submit" type="submit" value="Submit" style="background-color: #000000; color: #FFFFFF; padding: 10px; margin: 10px;">
</form>
</div>
<?php
}
if ($_GET['ManageModels'] == "2" and $_GET['DeleteModel'] == "2"){
$ID = $_GET['ID'];
$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

$sql = "DELETE FROM Modules WHERE ID = '$ID'";

?>
<div id="content">
<h1>Delete Cisco Model</h1>
<br/>
<?php
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (mysqli_query($conn, $sql)) {
    echo "Records Processed";
    echo "<br/>";
} else {
    echo "Error deleting record:" . mysqli_error($conn);
    echo "<br/>";
}
mysqli_close($conn);
?>
<br>
<p>The Cisco Model has been deleted.</p>
</div>

<?php
}//CloseInnerFunction
}//CloseDeleteModel
}
?>