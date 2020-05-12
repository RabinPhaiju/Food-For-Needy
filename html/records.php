<?php
include 'session.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/loginindex.css">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/index.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>Records</title>
    <style>
               body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}
        .input-files {
            position: relative;
            overflow: hidden;
            width: 150px;
            height: 40px;
            border: none;
            background-color: #0077CC;
            border-radius: 3px;
            box-shadow: 1px 1px 2px rgba(0, 0, 0, .5);
            cursor: pointer;
            transition: background-color .3s ease;
            margin-bottom:5px;
        }
        
        .input-files:hover {
            background-color: #1788d8;
        }
        
        .input-files [type=file] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        
        .input-files label {
            font-family: 'arial';
            color: #F1F1F1;
            font-weight: bold;
            font-size: 17px;
            cursor: pointer;
        }
.panel table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  table-layout: fixed;
  /* width: 100%; */
}
.panel table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}
.panel table tr {
  border: 1px solid #ddd;
  padding: .35em;
}
.panel table tr:nth-child(even) {
  background: #f8f8f8;  
}
.panel table th,
.panel table td {
  padding: .625em;
  text-align: left;
}
.panel table th {
  background: #999;
  color: #fff;
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}
.panel table td {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
		@media only screen and (max-width: 1300px) {
            .panel td,.panel th{
					font-size: 14px;
				}
				.panel img{
		    height:30px;
        }
    }
    .contains {
        margin-left:5%;
    }
    </style>
</head>

<body>
<?php include 'navbar1.html';?>
    <div class="body_wrapper">
    <?php include 'navbar2.html';?>

        <div class="container">
            <div class="col-md-8 col-sm-9 contains">
                <div class="panel profile-panel">
                    <!-- <div class="panel-heading">
                        <div class="text-left">
                            <h2>Joe Doe</h2>
                        </div>
                    </div> -->
                    <!-- panel body -->
    <?php
    $count=1;
    require_once("DBConnect.php");
	if($conn-> connect_error){
		die("Connection failed:". $conn-> connect_error);
    }
    $session_reg_id=$_SESSION['reg_id'];
        $sql = "SELECT * from records ";
	$result = $conn-> query($sql);
    // echo $result-> num_rows;
	if($result-> num_rows >0){
        if($result-> num_rows>20){
            $del1=$result-> num_rows-20;
            // $del=$result-> num_rows-$del1;
            $del_count=0;
            while($del_count<$del1){
                $row = $result-> fetch_assoc();
                $record_ids=$row["record_id"];
               $sql0= "DELETE FROM `records` WHERE `record_id`='$record_ids'";
               require_once("DBConnect.php");
               mysqli_query($conn, $sql0);
               $del_count++;
            }}
            $sql = "SELECT * from records ORDER BY `date` DESC ";
            $result = $conn-> query($sql);
        ?>
        <table>
        <caption><b style="font-size:25px">Recent Records (20)</b></caption>
        <thead>
            <th scope="col"><strong>Sn.</strong></th>
            <th scope="col"><strong>Detail</strong></th>
        </thead>
        <tbody>
    <?php
        
        while($row = $result-> fetch_assoc()){?>
    <tr>
    <td scope="row"><?=$count?></td>
    <td><?=$row["description"]?></td>
    </tr>

         <?php   $count++;
				}}
		
        echo "</tbody></table>";
    
        ?>
                    <!-- end panel body -->
                </div>
            </div>
        </div>
    </div>
    <script>
</script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/editprofile.js"></script>

    <script src="js/index1.js"></script>


</body>

</html>