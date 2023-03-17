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
  <form id="userForm" method="post">
<table class="table table-striped">
<?php
$q = intval($_GET['q']); 
$event_id = $_GET['c'];
$quoteid        =$_GET['quoteid'];
$quotet        =$_GET['quotet'];
$con =  mysqli_connect('localhost', 'merimeve_event', 'user@event', 'merimeve_event') or die("connection failed" . mysqli_error($con)); 

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM tblitems WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<th>Item</th>";
  echo "<th>Stock</th>";
  echo "<th>Quantity</th>";
  echo "<th>Unit price</th>";
  echo "<th>No. of days</th>";
  echo "<th>Description</th>";

  // echo "<th colspan='2'>Date</th>";
   echo "</tr>";

  echo "<tr>";
  echo "<td> 
    <input type='hidden' name='item_id' class='form-control' value='".$_GET["q"]. "'>
    <input type='hidden' name='quoteid' class='form-control' value='".$_GET["quoteid"]. "'>
    <input type='hidden' name='quotet' class='form-control' value='".$_GET["quotet"]. "'>
    <input type='hidden' name='l_date' class='form-control' value='".$_GET["l_date"]. "'>
    <input type='hidden' name='e_date' class='form-control' value='".$_GET["e_date"]. "'>
    <input type='hidden' name='myInput' class='form-control' value='".$_GET["myInput"]. "'>
    <input type='hidden' name='quotation_status' class='form-control' value='".$_GET["quotation_status"]. "'>
    <input type='hidden' name='event_id' class='form-control' value='".$_GET["c"]. "'>
    <input type='hidden' name='txtItem_name' class='form-control' value='".$row["item_name"]. "'>" . ucwords($row['item_name']) . "</td>";
  echo "<td>" .$row['qnty'] . "</td>";
  echo "<td><input type='number' min='1' name='txtQnty' class='form-control' required style='background-color:#b3ffcc;' placeholder='0'></td>";  
  echo "<td><input type='number' name='txtPrice' value='".$row["lease_charges"] . "' class='form-control' required></td>";
  echo "<td><input type='number' name='txtDays' class='form-control' required></td>";  
  echo "<td><input type='text' name='txtDescription' value='".$row["qlty"] . "' class='form-control'></td>";
  // echo "<td><input type='date' name='lease_date' class='form-control' value='".date("Y-m-d")."' ></td>";  
  echo "<td><button type='submit' class='btn btn-primary' name='add' id='showData'>Add</button></td>";
  echo "</tr>";
}
mysqli_close($con);
?>
</table>
</form>
</body>
</html>