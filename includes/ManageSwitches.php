<?php
if (isset($_GET['ManageSwitches'])) {
    if ($_GET['ManageSwitches'] == "1") {
//Determine if user is adding, modifying, or deleting Switches
        ?>
        <div id="content">
            <h1>Switch Management</h1>
            <br/>
            <center>
                <p class="menu"><a class="menu" href="index.php?ManageSwitches=2&AddSwitch=1">Add Switch</a></p>

                <p class="menu"><a class="menu" href="index.php?ManageSwitches=2&ModifySwitch=1">Modify Switch</a></p>

                <p class="menu"><a class="menu" href="index.php?ManageSwitches=2&DeleteSwitch=1">Delete Switch</a></p>
            </center>
        </div>
    <?php
    }
    if (isset($_GET['AddSwitch'])) {
        if ($_GET['ManageSwitches'] == "2" and $_GET['AddSwitch'] == "1") {
            //Add New Cisco Switch -- Add Switch Step 1
            $conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
            mysql_select_db($dbname) or die(mysql_error());

            $sql = "SELECT * FROM Models ORDER BY ModelNumber ASC";
            ?>
            <div id="content">
                <center>
                    <h1>Add Cisco Switch</h1>
                    <br/>

                    <form method="GET" action="index.php">
                        <p>Please select the Cisco Chassis you would like to use to add:</p>
                        <select name="ID"
                                style="border: 1px solid #000000; width: 250px; padding: 5px; background-color: #EFEFEF;">
                            <?php
                            $result = mysql_query($sql);
                            while ($row = mysql_fetch_assoc($result)) {
                                echo '<option value="' . $row["ID"] . '">'
                                    . $row["ModelNumber"] . '</option>';
                            }
                            ?>
                        </select>
                        <br/>
                        <input name="ManageSwitches" value="2" type="hidden"/>
                        <input name="AddSwitch" value="2" type="hidden"/>
                        <input name="submit" type="submit" value="Submit" class="submit">
                    </form>
                </center>
            </div>
            <?php
            mysql_close();
        }
        if ($_GET['ManageSwitches'] == "2" and $_GET['AddSwitch'] == "2") {
            //Add New Cisco Switch -- Add Switch Step 2
            $conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
            mysql_select_db($dbname) or die(mysql_error());
            $ID = $_GET['ID'];

            $sql = "SELECT * FROM Models WHERE ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $NumSlots = $row["NumSlots"];
                $ModelNumber = $row['ModelNumber'];
            }

            ?>
            <div id="content">
                <center>
                    <h1>Add Cisco Switch - Step 2</h1>
                    <br/>

                    <form method="GET" action="index.php">
                        <p>Build your selected switch as physically built below:</p>
                        <table>
                            <tr>
                                <td class="tdheader"></td>
                                <td class="tdheader">Value</td>
                            </tr>
                            <tr>
                                <td class="tdheader">Model Number</td>
                                <td><?php echo $ModelNumber ?></td>
                            </tr>
                            <tr>
                                <td class="tdheader"><label for="FriendlyName">Friendly Name</label></td>
                                <td><input id="FriendlyName" name="FriendlyName" type="text" class="text"></td>
                            </tr>
                            <tr>
                                <td class="tdheader"><label for="Hostname">Hostname</label></td>
                                <td><input id="Hostname" name="Hostname" type="text" class="text"></td>
                            </tr>
                            <tr>
                                <td class="tdheader"><label for="IPAddress">IPAddress</label></td>
                                <td><input id="IPAddress" name="IPAddress" type="text" class="text"></td>
                            </tr>
                            <tr>
                                <td class="tdheader"><label for="SubnetMask">Friendly Name</label></td>
                                <td><select name="SubnetMask" id="SubnetMask" class="text">
                                        <option value="255.255.255.255">255.255.255.255</option>
                                        <option value="255.255.255.254">255.255.255.254</option>
                                        <option value="255.255.255.252">255.255.255.252</option>
                                        <option value="255.255.255.248">255.255.255.248</option>
                                        <option value="255.255.255.240">255.255.255.240</option>
                                        <option value="255.255.255.224">255.255.255.224</option>
                                        <option value="255.255.255.192">255.255.255.192</option>
                                        <option value="255.255.255.128">255.255.255.128</option>
                                        <option value="255.255.255.0">255.255.255.0</option>
                                        <option value="255.255.254.0">255.255.254.0</option>
                                        <option value="255.255.252.0">255.255.252.0</option>
                                        <option value="255.255.248.0">255.255.248.0</option>
                                        <option value="255.255.240.0">255.255.240.0</option>
                                        <option value="255.255.224.0">255.255.224.0</option>
                                        <option value="255.255.192.0">255.255.192.0</option>
                                        <option value="255.255.128.0">255.255.128.0</option>
                                        <option value="255.255.0.0">255.255.0.0</option>
                                        <option value="255.254.0.0">255.254.0.0</option>
                                        <option value="255.252.0.0">255.252.0.0</option>
                                        <option value="255.248.0.0">255.248.0.0</option>
                                        <option value="255.240.0.0">255.240.0.0</option>
                                        <option value="255.224.0.0">255.224.0.0</option>
                                        <option value="255.192.0.0">255.192.0.0</option>
                                        <option value="255.128.0.0">255.128.0.0</option>
                                        <option value="255.0.0.0">255.0.0.0</option>
                                        <option value="254.0.0.0">254.0.0.0</option>
                                        <option value="252.0.0.0">252.0.0.0</option>
                                        <option value="248.0.0.0">248.0.0.0</option>
                                        <option value="240.0.0.0">240.0.0.0</option>
                                        <option value="224.0.0.0">224.0.0.0</option>
                                        <option value="192.0.0.0">192.0.0.0</option>
                                        <option value="128.0.0.0">128.0.0.0</option>
                                        <option value="0.0.0.0">0.0.0.0</option>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdheader"><label for="DefaultGateway">Default Gateway</label></td>
                                <td><input id="DefaultGateway" name="DefaultGateway" type="text" class="text"></td>
                            </tr>

                            <?php
                            $count = 1;
                            while ($count <= $NumSlots) {
                                ?>
                                <tr>
                                    <td class="tdheader"><label for="<?php echo 'Module' . $count ?>">Module in
                                            Slot <?php echo $count ?></label></td>
                                    <td>
                                        <select name="<?php echo 'Module' . $count ?>"
                                                id="<?php echo 'Module' . $count ?>" class="text">
                                            <option value="0">--Empty--</option>
                                            <?php
                                            $sql = "SELECT * FROM Modules";
                                            $result = mysql_query($sql);
                                            while ($row = mysql_fetch_assoc($result)) {
                                                ?>
                                                <option
                                                    value="<?php echo $row['ID'] ?>"><?php echo $row['ModelNumber'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php
                                $count++;
                            }

                            ?>
                        </table>
                        <br/>
                        <input name="ModelNumber" value="<?php echo $ModelNumber ?>" type="hidden"/>
                        <input name="NumSlots" value="<?php echo $NumSlots ?>" type="hidden"/>
                        <input name="ManageSwitches" value="2" type="hidden"/>
                        <input name="AddSwitch" value="3" type="hidden"/>
                        <input name="submit" type="submit" value="Submit" class="submit">
                    </form>
                </center>
            </div>
            <?php
            mysql_close();
        }

        if ($_GET['ManageSwitches'] == "2" and $_GET['AddSwitch'] == "3") {
            //Add New Cisco Switch
            $NumSlots = $_GET['NumSlots'];
            $ModelNumber = $_GET['ModelNumber'];
            $FriendlyName = $_GET['FriendlyName'];
            $Hostname = $_GET['Hostname'];
            $IPAddress = $_GET['IPAddress'];
            $SubnetMask = $_GET['SubnetMask'];
            $DefaultGateway = $_GET['DefaultGateway'];

            if (isset($_GET['Module1'])) {
                $Module1 = $_GET['Module1'];
            } else {
                $Module1 = "0";
            }
            if (isset($_GET['Module2'])) {
                $Module2 = $_GET['Module2'];
            } else {
                $Module2 = "0";
            }
            if (isset($_GET['Module3'])) {
                $Module3 = $_GET['Module3'];
            } else {
                $Module3 = "0";
            }
            if (isset($_GET['Module4'])) {
                $Module4 = $_GET['Module4'];
            } else {
                $Module4 = "0";
            }
            if (isset($_GET['Module5'])) {
                $Module5 = $_GET['Module5'];
            } else {
                $Module5 = "0";
            }
            if (isset($_GET['Module6'])) {
                $Module6 = $_GET['Module6'];
            } else {
                $Module6 = "0";
            }
            if (isset($_GET['Module7'])) {
                $Module7 = $_GET['Module7'];
            } else {
                $Module7 = "0";
            }
            if (isset($_GET['Module8'])) {
                $Module8 = $_GET['Module8'];
            } else {
                $Module8 = "0";
            }
            if (isset($_GET['Module9'])) {
                $Module9 = $_GET['Module9'];
            } else {
                $Module9 = "0";
            }
            if (isset($_GET['Module10'])) {
                $Module10 = $_GET['Module10'];
            } else {
                $Module10 = "0";
            }
            if (isset($_GET['Module11'])) {
                $Module11 = $_GET['Module11'];
            } else {
                $Module11 = "0";
            }
            if (isset($_GET['Module12'])) {
                $Module12 = $_GET['Module12'];
            } else {
                $Module12 = "0";
            }
            if (isset($_GET['Module13'])) {
                $Module13 = $_GET['Module13'];
            } else {
                $Module13 = "0";
            }


            $conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
            mysql_select_db($dbname) or die(mysql_error());

            $sql = "SELECT ID FROM Models WHERE ModelNumber = '$ModelNumber'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $ModelsID = $row['ID'];
            }

            $sql = "INSERT INTO Switches " .
                "(ModelsID,FriendlyName,Hostname,IPAddress,SubnetMask,DefaultGateway,Module1,Module2,Module3,Module4,Module5,Module6,Module7,Module8,Module9,Module10,Module11,Module12,Module13) " .
                "VALUES('$ModelsID','$FriendlyName','$Hostname','$IPAddress','$SubnetMask','$DefaultGateway','$Module1','$Module2','$Module3','$Module4','$Module5','$Module6','$Module7','$Module8','$Module9','$Module10','$Module11','$Module12','$Module13')";

            $retval = mysql_query($sql);
            if (!$retval) {
                die('Could not enter data: ' . mysql_error());
            }
            mysql_close($conn);
            ?>
            <div id="content">
                <center>
                    <h1>Add Cisco Switch - Complete</h1>
                    <br/>

                    <p>Data has been successfully added to the database.</p>
                </center>
            </div>
        <?php
        }
    }
    if (isset($_GET['ModifySwitch'])) {
        if ($_GET['ManageSwitches'] == "2" and $_GET['ModifySwitch'] == "1") {
            //Modify Cisco Switch -- Modify Switch Step 1
            $conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
            mysql_select_db($dbname) or die(mysql_error());

            $sql = "SELECT * FROM Switches ORDER BY FriendlyName ASC";
            ?>
            <div id="content">
                <center>
                    <h1>Modify Cisco Switch</h1>
                    <br/>

                    <form method="GET" action="index.php">
                        <p>Please select the Cisco Switch item from the list below which you would like to modify:</p>
                        <select name="ID" class="text">
                            <?php
                            $result = mysql_query($sql);
                            while ($row = mysql_fetch_assoc($result)) {
                                echo '<option value="' . $row["ID"] . '">'
                                    . $row["FriendlyName"] . '</option>';
                            }
                            ?>
                        </select>
                        <br/>
                        <input name="ManageSwitches" value="2" type="hidden"/>
                        <input name="ModifySwitch" value="2" type="hidden"/>
                        <input name="submit" type="submit" value="Submit" class="submit">
                    </form>
                </center>
            </div>
            <?php
            mysql_close();
        }
        if ($_GET['ManageSwitches'] == "2" and $_GET['ModifySwitch'] == "2") {
            //Modify Cisco Switch -- Add Switch Step 2
            $conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
            mysql_select_db($dbname) or die(mysql_error());
            $ID = $_GET['ID'];

            $sql = "SELECT Switches.FriendlyName,Switches.Hostname,Switches.IPAddress,Switches.SubnetMask,Switches.DefaultGateway,Models.ModelNumber,Models.NumSlots FROM Switches INNER JOIN Models ON Switches.ModelsID = Models.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $ModelNumber = $row["ModelNumber"];
                $OldFriendlyName = $row['FriendlyName'];
                $OldHostname = $row['Hostname'];
                $OldIPAddress = $row['IPAddress'];
                $OldSubnetMask = $row['SubnetMask'];
                $OldDefaultGateway = $row['DefaultGateway'];
                $NumSlots = $row['NumSlots'];
            }
            $sql = "SELECT Modules.ModelNumber FROM Switches INNER JOIN Modules ON Switches.Module1 = Modules.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $OldModule1 = $row["ModelNumber"];
            }
            $sql = "SELECT Modules.ModelNumber FROM Switches INNER JOIN Modules ON Switches.Module2 = Modules.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $OldModule2 = $row["ModelNumber"];
            }
            $sql = "SELECT Modules.ModelNumber FROM Switches INNER JOIN Modules ON Switches.Module3 = Modules.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $OldModule3 = $row["ModelNumber"];
            }
            $sql = "SELECT Modules.ModelNumber FROM Switches INNER JOIN Modules ON Switches.Module4 = Modules.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $OldModule4 = $row["ModelNumber"];
            }
            $sql = "SELECT Modules.ModelNumber FROM Switches INNER JOIN Modules ON Switches.Module5 = Modules.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $OldModule5 = $row["ModelNumber"];
            }
            $sql = "SELECT Modules.ModelNumber FROM Switches INNER JOIN Modules ON Switches.Module6 = Modules.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $OldModule6 = $row["ModelNumber"];
            }
            $sql = "SELECT Modules.ModelNumber FROM Switches INNER JOIN Modules ON Switches.Module7 = Modules.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $OldModule7 = $row["ModelNumber"];
            }
            $sql = "SELECT Modules.ModelNumber FROM Switches INNER JOIN Modules ON Switches.Module8 = Modules.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $OldModule8 = $row["ModelNumber"];
            }
            $sql = "SELECT Modules.ModelNumber FROM Switches INNER JOIN Modules ON Switches.Module9 = Modules.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $OldModule9 = $row["ModelNumber"];
            }
            $sql = "SELECT Modules.ModelNumber FROM Switches INNER JOIN Modules ON Switches.Module10 = Modules.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $OldModule10 = $row["ModelNumber"];
            }
            $sql = "SELECT Modules.ModelNumber FROM Switches INNER JOIN Modules ON Switches.Module11 = Modules.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $OldModule11 = $row["ModelNumber"];
            }
            $sql = "SELECT Modules.ModelNumber FROM Switches INNER JOIN Modules ON Switches.Module12 = Modules.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $OldModule12 = $row["ModelNumber"];
            }
            $sql = "SELECT Modules.ModelNumber FROM Switches INNER JOIN Modules ON Switches.Module13 = Modules.ID WHERE Switches.ID = '$ID'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $OldModule13 = $row["ModelNumber"];
            }

            ?>
            <div id="content">
                <center>
                    <h1>Modify Cisco Switch - Step 2</h1>
                    <br/>

                    <form method="GET" action="index.php">
                        <p>Build your selected switch as physically built below:</p>
                        <table>
                            <tr>
                                <td class="tdheader"></td>
                                <td class="tdheader">Old Value</td>
                                <td class="tdheader">Value</td>
                            </tr>
                            <tr>
                                <td class="tdheader">Model Number</td>
                                <td><?php echo $ModelNumber ?></td>
                                <td><?php echo $ModelNumber ?></td>
                            </tr>
                            <tr>
                                <td class="tdheader"><label for="FriendlyName">Friendly Name</label></td>
                                <td><?php echo $OldFriendlyName ?></td>
                                <td><input id="FriendlyName" name="FriendlyName" type="text" class="text"></td>
                            </tr>
                            <tr>
                                <td class="tdheader"><label for="Hostname">Hostname</label></td>
                                <td><?php echo $OldHostname ?></td>
                                <td><input id="Hostname" name="Hostname" type="text" class="text"></td>
                            </tr>
                            <tr>
                                <td class="tdheader"><label for="IPAddress">IPAddress</label></td>
                                <td><?php echo $OldIPAddress ?></td>
                                <td><input id="IPAddress" name="IPAddress" type="text" class="text"></td>
                            </tr>
                            <tr>
                                <td class="tdheader"><label for="SubnetMask">Friendly Name</label></td>
                                <td><?php echo $OldSubnetMask ?></td>
                                <td><select name="SubnetMask" id="SubnetMask" class="text">
                                        <option value="255.255.255.255">255.255.255.255</option>
                                        <option value="255.255.255.254">255.255.255.254</option>
                                        <option value="255.255.255.252">255.255.255.252</option>
                                        <option value="255.255.255.248">255.255.255.248</option>
                                        <option value="255.255.255.240">255.255.255.240</option>
                                        <option value="255.255.255.224">255.255.255.224</option>
                                        <option value="255.255.255.192">255.255.255.192</option>
                                        <option value="255.255.255.128">255.255.255.128</option>
                                        <option value="255.255.255.0">255.255.255.0</option>
                                        <option value="255.255.254.0">255.255.254.0</option>
                                        <option value="255.255.252.0">255.255.252.0</option>
                                        <option value="255.255.248.0">255.255.248.0</option>
                                        <option value="255.255.240.0">255.255.240.0</option>
                                        <option value="255.255.224.0">255.255.224.0</option>
                                        <option value="255.255.192.0">255.255.192.0</option>
                                        <option value="255.255.128.0">255.255.128.0</option>
                                        <option value="255.255.0.0">255.255.0.0</option>
                                        <option value="255.254.0.0">255.254.0.0</option>
                                        <option value="255.252.0.0">255.252.0.0</option>
                                        <option value="255.248.0.0">255.248.0.0</option>
                                        <option value="255.240.0.0">255.240.0.0</option>
                                        <option value="255.224.0.0">255.224.0.0</option>
                                        <option value="255.192.0.0">255.192.0.0</option>
                                        <option value="255.128.0.0">255.128.0.0</option>
                                        <option value="255.0.0.0">255.0.0.0</option>
                                        <option value="254.0.0.0">254.0.0.0</option>
                                        <option value="252.0.0.0">252.0.0.0</option>
                                        <option value="248.0.0.0">248.0.0.0</option>
                                        <option value="240.0.0.0">240.0.0.0</option>
                                        <option value="224.0.0.0">224.0.0.0</option>
                                        <option value="192.0.0.0">192.0.0.0</option>
                                        <option value="128.0.0.0">128.0.0.0</option>
                                        <option value="0.0.0.0">0.0.0.0</option>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdheader"><label for="DefaultGateway">Default Gateway</label></td>
                                <td><?php echo $OldDefaultGateway ?></td>
                                <td><input id="DefaultGateway" name="DefaultGateway" type="text" class="text"></td>
                            </tr>

                            <?php
                            $count = 1;
                            while ($count <= $NumSlots) {
                                ?>
                                <tr>
                                    <td class="tdheader"><label for="<?php echo 'Module' . $count ?>">Module in
                                            Slot <?php echo $count ?></label></td>
                                    <td>
                                        <?php
                                        if ($count == '1') {
                                            echo $OldModule1;
                                        }
                                        if ($count == '2') {
                                            echo $OldModule2;
                                        }
                                        if ($count == '3') {
                                            echo $OldModule3;
                                        }
                                        if ($count == '4') {
                                            echo $OldModule4;
                                        }
                                        if ($count == '5') {
                                            echo $OldModule5;
                                        }
                                        if ($count == '6') {
                                            echo $OldModule6;
                                        }
                                        if ($count == '7') {
                                            echo $OldModule7;
                                        }
                                        if ($count == '8') {
                                            echo $OldModule8;
                                        }
                                        if ($count == '9') {
                                            echo $OldModule9;
                                        }
                                        if ($count == '10') {
                                            echo $OldModule10;
                                        }
                                        if ($count == '11') {
                                            echo $OldModule11;
                                        }
                                        if ($count == '12') {
                                            echo $OldModule12;
                                        }
                                        if ($count == '13') {
                                            echo $OldModule13;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <select name="<?php echo 'Module' . $count ?>"
                                                id="<?php echo 'Module' . $count ?>" class="text">
                                            <option value="0">--Empty--</option>
                                            <?php
                                            $sql = "SELECT * FROM Modules";
                                            $result = mysql_query($sql);
                                            while ($row = mysql_fetch_assoc($result)) {
                                                ?>
                                                <option
                                                    value="<?php echo $row['ID'] ?>"><?php echo $row['ModelNumber'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php
                                $count++;
                            }

                            ?>
                        </table>
                        <br/>
                        <input name="ModelNumber" value="<?php echo $ModelNumber ?>" type="hidden"/>
                        <input name="ID" value="<?php echo $ID ?>" type="hidden"/>
                        <input name="ManageSwitches" value="2" type="hidden"/>
                        <input name="ModifySwitch" value="3" type="hidden"/>
                        <input name="submit" type="submit" value="Submit" class="submit">
                    </form>
                </center>
            </div>
            <?php
            mysql_close();
        }
        if ($_GET['ManageSwitches'] == "2" and $_GET['ModifySwitch'] == "3") {
            //Modify Cisco Switch
            $ID = $_GET['ID'];
            $ModelNumber = $_GET['ModelNumber'];
            $FriendlyName = $_GET['FriendlyName'];
            $Hostname = $_GET['Hostname'];
            $IPAddress = $_GET['IPAddress'];
            $SubnetMask = $_GET['SubnetMask'];
            $DefaultGateway = $_GET['DefaultGateway'];

            if (isset($_GET['Module1'])) {
                $Module1 = $_GET['Module1'];
            } else {
                $Module1 = "0";
            }
            if (isset($_GET['Module2'])) {
                $Module2 = $_GET['Module2'];
            } else {
                $Module2 = "0";
            }
            if (isset($_GET['Module3'])) {
                $Module3 = $_GET['Module3'];
            } else {
                $Module3 = "0";
            }
            if (isset($_GET['Module4'])) {
                $Module4 = $_GET['Module4'];
            } else {
                $Module4 = "0";
            }
            if (isset($_GET['Module5'])) {
                $Module5 = $_GET['Module5'];
            } else {
                $Module5 = "0";
            }
            if (isset($_GET['Module6'])) {
                $Module6 = $_GET['Module6'];
            } else {
                $Module6 = "0";
            }
            if (isset($_GET['Module7'])) {
                $Module7 = $_GET['Module7'];
            } else {
                $Module7 = "0";
            }
            if (isset($_GET['Module8'])) {
                $Module8 = $_GET['Module8'];
            } else {
                $Module8 = "0";
            }
            if (isset($_GET['Module9'])) {
                $Module9 = $_GET['Module9'];
            } else {
                $Module9 = "0";
            }
            if (isset($_GET['Module10'])) {
                $Module10 = $_GET['Module10'];
            } else {
                $Module10 = "0";
            }
            if (isset($_GET['Module11'])) {
                $Module11 = $_GET['Module11'];
            } else {
                $Module11 = "0";
            }
            if (isset($_GET['Module12'])) {
                $Module12 = $_GET['Module12'];
            } else {
                $Module12 = "0";
            }
            if (isset($_GET['Module13'])) {
                $Module13 = $_GET['Module13'];
            } else {
                $Module13 = "0";
            }


            $conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
            mysql_select_db($dbname) or die(mysql_error());

            $sql = "SELECT ID FROM Models WHERE ModelNumber = '$ModelNumber'";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)) {
                $ModelsID = $row['ID'];
            }

            $sql = "UPDATE Switches SET ModelsID='$ModelsID',FriendlyName='$FriendlyName',Hostname='$Hostname',IPAddress='$IPAddress',SubnetMask='$SubnetMask',DefaultGateway='$DefaultGateway',Module1='$Module1', Module2='$Module2', Module3='$Module3', Module4='$Module4', Module5='$Module5', Module6='$Module6', Module7='$Module7', Module8='$Module8', Module9='$Module9', Module10='$Module10', Module11='$Module11', Module12='$Module12', Module13='$Module13' WHERE ID='$ID'";

            $retval = mysql_query($sql);
            if (!$retval) {
                die('Could not enter data: ' . mysql_error());
            }
            mysql_close($conn);
            ?>
            <div id="content">
                <center>
                    <h1>Modification of Cisco Switch - Complete</h1>
                    <br/>

                    <p>Data has been successfully added to the database.</p>
                </center>
            </div>
        <?php
        }
    }
    if (isset($_GET['DeleteSwitch'])) {
        if ($_GET['ManageSwitches'] == "2" and $_GET['DeleteSwitch'] == "1") {
            $conn = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
            mysql_select_db($dbname) or die(mysql_error());
            $sql = "SELECT * FROM Switches ORDER BY FriendlyName ASC";
            ?>
            <div id="content">
                <h1>Delete Cisco Switch</h1>
                <br/>

                <form method="GET" action="index.php">
                    <p>Please select the switch you would like to delete.</p>
                    <select name="ID" style="margin: 10px; padding: 10px; width: 200px;">
                        <option value="Select">--Select--</option>
                        <?php
                        $result = mysql_query($sql);
                        while ($row = mysql_fetch_assoc($result)) {
                            echo '<option value="' . $row["ID"] . '">'
                                . $row["FriendlyName"] . '</option>';
                        }
                        ?>
                    </select>
                    <br/>
                    <input name="ManageSwitches" value="2" type="hidden"/>
                    <input name="DeleteSwitch" value="2" type="hidden"/>
                    <input name="submit" type="submit" value="Submit" class="submit">
                </form>
            </div>
        <?php
        }
        if ($_GET['ManageSwitches'] == "2" and $_GET['DeleteSwitch'] == "2") {
            $ID = $_GET['ID'];
            $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

            $sql = "DELETE FROM Switches WHERE ID = '$ID'";

            ?>
            <div id="content">
                <h1>Delete Cisco Switch</h1>
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

                <p>The Cisco Switch has been deleted.</p>
            </div>

        <?php
        }
    }
}//Close}InnerFunction
?>