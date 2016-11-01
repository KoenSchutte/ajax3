
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['q'];
$v = $_GET['v'];

$con = mysqli_connect('localhost','19844','qcwuhcse','19844');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con, '19844');


mysqli_select_db($con, DB_NAME);


if($v == 'search'){
 $sql="SELECT `Name` FROM country WHERE `Name` LIKE '%".$q."%'";

        $result = mysqli_query($con,$sql);
        echo "<table>
<tr><th>Name</th>";
while($row = mysqli_fetch_array($result)) {
    $vars = '"' . $row['Name'] . '"' . ' , "display"';
echo "<tr><td onclick='showUser($vars)'>" . $row['Name'] . "</td></tr>";
}
        echo "</table>";
} else if($v == 'display'){
$sql="SELECT * FROM country WHERE `Name`='".$q. "'";
        $result = mysqli_query($con,$sql);

        echo "<table>
<tr>
<th>Code</th>
<th>Name</th>
<th>Continent</th>
<th>Region</th>
<th>Surface Area</th>
<th>independance Year</th>
<th>Population</th>
<th>Life expectancy</th>
<th>GNP</th>
<th>GNP OLD</th>
<th>Local name</th>
<th>Government Form</th>
<th>Head of state</th>
<th>Capital</th>
<th>Code2</th>
</tr>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['Code'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Continent'] . "</td>";
            echo "<td>" . $row['Region'] . "</td>";
            echo "<td>" . $row['SurfaceArea'] . "</td>";
            echo "<td>" . $row['IndepYear'] . "</td>";
            echo "<td>" . $row['Population'] . "</td>";
            echo "<td>" . $row['LifeExpectancy'] . "</td>";
            echo "<td>" . $row['GNP'] . "</td>";
            echo "<td>" . $row['GNPOld'] . "</td>";
            echo "<td>" . $row['LocalName'] . "</td>";
            echo "<td>" . $row['GovernmentForm'] . "</td>";
            echo "<td>" . $row['HeadOfState'] . "</td>";
            echo "<td>" . $row['Capital'] . "</td>";
            echo "<td>" . $row['Code2'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
}



mysqli_close($con);
?>
</body>
</html>