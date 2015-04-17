<?php
if(isset($_GET['ManageModules'])){
if ($_GET['ManageModules'] == "1"){
//Determine if user is adding, modifying, or deleting modules
?>
<div id="content">
<h1>Module Management</h1>
<br/>
<center>
<p style="text-align: center; width: 150px; margin: 10px; height: 35px; line-height: 35px; font-size: 16px; vertical-align: middle; background: #000000; color: #FFFFFF;"><a style="color: #FFFFFF; text-decoration:none;" href="index.php?ManageModules=2&AddModule=1">Add Module</a></p>
<p style="text-align: center; width: 150px; margin: 10px; height: 35px; line-height: 35px; font-size: 16px; vertical-align: middle; background: #000000; color: #FFFFFF;"><a style="color: #FFFFFF; text-decoration:none;" href="index.php?ManageModules=2&ModifyModule=1">Modify Module</a></p>
<p style="text-align: center; width: 150px; margin: 10px; height: 35px; line-height: 35px; font-size: 16px; vertical-align: middle; background: #000000; color: #FFFFFF;"><a style="color: #FFFFFF; text-decoration:none;" href="index.php?ManageModules=2&DeleteModule=1">Delete Module</a></p>
</center>
</div>
<?php
}
if(isset($_GET['AddModule'])){
if ($_GET['ManageModules'] == "2" and $_GET['AddModule'] == "1"){
//Add New Cisco Module
?>
<div id="content">
<center>
<h1>Module Management</h1>
<br/>
<h2>Add Cisco Module</h2>
<form method="GET" action="index.php">
<table style="width: 500px; margin: 0 auto;" cellspacing="1" cellpadding="2">
<tr>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">Model Number</td>
<td style="width: 250px;"><input name="ModelNumber" type="text" id="ModelNumber" style="border: 1px solid #000000; width: 250px; padding: 5px; background-color: #EFEFEF;"></td>
</tr>
<tr>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">Description</td>
<td style="width: 250px;"><input name="Description" type="text" id="Description" style="border: 1px solid #000000; width: 250px; padding: 5px; background-color: #EFEFEF;"></td>
</tr>

<tr>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">Number of Ports</td>
<td style="width: 250px;"><select name="NumPorts" style="border: 1px solid #000000; width: 250px; padding: 5px; background-color: #EFEFEF;">
<option selected="" value="0">0</option><option value="2">2</option>
<option value="8">8</option><option value="16">16</option><option value="24">24</option>
<option value="48">48</option></select></td>
</tr>
<tr>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">Port Speed</td>
<td style="width: 250px;"><select name="PortSpeed" style="border: 1px solid #000000; width: 250px; padding: 5px; background-color: #EFEFEF;"><option selected="" value="gigabitethernet">--select--</option><option value="fastethernet">100</option><option value="gigabitethernet">1000</option><option value="tengigabitethernet">10000</option></select></td>
</tr>
<tr>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">PoE Capable</td>
<td style="width: 250px;"><select name="PoE" style="border: 1px solid #000000; width: 250px; padding: 5px; background-color: #EFEFEF;">
<option selected="" value="0">--select--</option><option value="0">no</option><option value="1">yes</option></select></td>
</tr>
<tr>
<td></td>
<td>
<input name="ManageModules" value="2" type="hidden" />
<input name="AddModule" value="2" type="hidden" />
<input name="submit" type="submit" value="Submit" style="background-color: #000000; color: #FFFFFF; padding: 10px;">
</td>
</tr>
</table>
</form>
</center>
</div>
<?php
}
if ($_GET['ManageModules'] == "2" and $_GET['AddModule'] == "2"){
//Add New Cisco Module
$ModelNumber = $_GET['ModelNumber'];
$NumPorts = $_GET['NumPorts'];
$PortSpeed = $_GET['PortSpeed'];
$PoE = $_GET['PoE'];
$Description = $_GET['Description'];

$conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$sql = "INSERT INTO Modules ".
       "(ModelNumber,NumPorts,PortSpeed,PoE,Description) ".
       "VALUES('$ModelNumber','$NumPorts','$PortSpeed','$PoE','$Description')";

$retval = mysql_query($sql);
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
mysql_close($conn);
?>
<div id="content">
<center>
<h1>Add Cisco Module - Complete</h1>
<br/>
<p>Data has been successfully added to the database.</p>
</center>
</div>
<?php
}
}
//Modify Module Management
//Select the Module to Modify
if(isset($_GET['ModifyModule'])){
if ($_GET['ManageModules'] == "2" and $_GET['ModifyModule'] == "1"){
$conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$sql = "SELECT * FROM Modules ORDER BY ModelNumber ASC";
?>
<div id="content">
<center>
<h1>Modify Cisco Module</h1>
<br/>
<form method="GET" action="index.php">
<p>Please select the Cisco Module item from the list below which you would like to modify:</p>
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
<input name="ManageModules" value="2" type="hidden" />
<input name="ModifyModule" value="2" type="hidden" />
<input name="submit" type="submit" value="Submit" style="background-color: #000000; color: #FFFFFF; padding: 10px; margin: 10px;">
</form>
</center>
</div>
<?php
mysql_close();
}

//Review module parameters and change as needed
if ($_GET['ManageModules'] == "2" and $_GET['ModifyModule'] == "2"){
$ID = $_GET['ID'];

$conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$sql = "SELECT * FROM Modules WHERE ID = '$ID' LIMIT 1";
$result = mysql_query($sql);
while ($row = mysql_fetch_assoc($result)) {
$OldModelNumber = $row['ModelNumber'];
$OldDescription = $row['Description'];
$OldNumPorts = $row['NumPorts'];
$OldPortSpeed = $row['PortSpeed'];
$OldPoE = $row['PoE'];
}?>
<div id="content">
<center>
<h1>Modify Cisco Module - Step 2</h1>
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
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">Description</td>
<td style="width: 250px;"><?php echo $OldDescription ?></td>
<td style="width:250px;"><input name="Description" type="text" value="<?php echo $OldDescription ?>" id="Description" style="border: 1px solid #000000; width: 160px; padding: 5px; background-color: #EFEFEF;"></td>
</tr>
<tr>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">Number of Ports</td>
<td style="width: 250px;"><?php echo $OldNumPorts ?></td>
<td style="width: 250px;"><select name="NumPorts" style="border: 1px solid #000000; width: 250px; padding: 5px; background-color: #EFEFEF;">
<option selected="" value="0">0</option><option value="2">2</option>
<option value="8">8</option><option value="16">16</option><option value="24">24</option>
<option value="48">48</option></select></td>
</tr>
<tr>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">Port Speed</td>
<td style="width: 250px;"><?php echo $OldPortSpeed ?></td>
<td style="width: 250px;"><select name="PortSpeed" style="border: 1px solid #000000; width: 250px; padding: 5px; background-color: #EFEFEF;"><option selected="" value="gigabitethernet">--select--</option><option value="fastethernet">100</option><option value="gigabitethernet">1000</option><option value="tengigabitethernet">10000</option></select></td>
</tr>
<tr>
<td style="background: #000000; color: #FFFFFF; font-size: 16px; font-weight: bold; width: 250px;">PoE Capable</td>
<td style="width: 250px;"><?php echo $OldPoE ?></td>
<td style="width: 250px;"><select name="PoE" style="border: 1px solid #000000; width: 250px; padding: 5px; background-color: #EFEFEF;">
<option selected="" value="0">--select--</option><option value="0">no</option><option value="1">yes</option></select></td>
</tr>
<tr>
<td></td>
<td>
<input name="ID" value="<?php echo $ID ?>" type="hidden" />
<input name="ManageModules" value="2" type="hidden" />
<input name="ModifyModule" value="3" type="hidden" />
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
if ($_GET['ManageModules'] == "2" and $_GET['ModifyModule'] == "3"){
$conn = mysql_connect($dbserver, $dbuser, $dbpass);
mysql_select_db($dbname);

$ModelNumber = $_GET['ModelNumber'];
$Description = $_GET['Description'];
$NumPorts = $_GET['NumPorts'];
$PortSpeed = $_GET['PortSpeed'];
$PoE = $_GET['PoE'];
$ID = $_GET['ID'];

$sql = "UPDATE Modules SET ModelNumber='$ModelNumber',Description='$Description',NumPorts='$NumPorts',PortSpeed='$PortSpeed',PoE='$PoE' WHERE ID = '$ID'";


$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
?>
<div id="content">
<center>
<h1>Modify Cisco Module - Complete</h1>
<br/>
<p>Data has been successfully updated in the database.</p>
</center>
</div>
<?php
mysql_close($conn);
}
}
if(isset($_GET['DeleteModule'])){
if ($_GET['ManageModules'] == "2" and $_GET['DeleteModule'] == "1"){
$conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
$sql = "SELECT * FROM Modules ORDER BY ModelNumber ASC";
?>
<div id="content">
<h1>Delete Cisco Module</h1>
<br/>
<form method="GET" action="index.php">
<p>Please select the module you would like to delete.</p>
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
<input name="ManageModules" value="2" type="hidden" />
<input name="DeleteModule" value="2" type="hidden" />
<input name="submit" type="submit" value="Submit" style="background-color: #000000; color: #FFFFFF; padding: 10px; margin: 10px;">
</form>
</div>
<?php
}
if ($_GET['ManageModules'] == "2" and $_GET['DeleteModule'] == "2"){
$ID = $_GET['ID'];
$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

$sql = "DELETE FROM Modules WHERE ID = '$ID'";

?>
<div id="content">
<h1>Delete Cisco Module</h1>
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
<p>The Cisco Module has been deleted.</p>
</div>

<?php
}//CloseInnerFunction
}//CloseDeleteModule
}
?>