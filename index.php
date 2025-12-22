<?php 

error_reporting(E_ALL);
ini_set('display_errors', 'On'); 





// now here we will connect an existing database to this php webpage
 $host ='localhost'; // 127.0.0.1 
 $username = 'mysql_trainee'; // name of database user to access database 
 $password ='mphc@123'; //
  $database_name='training'; 
 
  $connection= mysqli_connect($host,$username,$password,$database_name); 
  // echo "this page is working_<br/>"; 
  if($connection){
    
    // => echo "connection is established"; 
    }else { echo "something went wrong "; } 
 

 echo print_r($_SERVER['REQUEST_METHOD']);
if($_SERVER['REQUEST_METHOD']=='POST'){
// print_r($_POST);

$trainee = $_POST['trainee'];
$contact_number = $_POST['phone'];
$display =   $_POST['availability'];

 
     $sql="insert into trainee 
	(name,contact_number,display)
	 values
	('$trainee','".$contact_number."','".$display."')
	";
	$result=mysqli_query($connection,$sql);
	if($result){
		
		$last_record="<tr><td>12</td><td>".$trainee."</td><td>".$contact_number."</td></tr>";
		echo "<span style='color:green'>Data is inserted into database</span>";
?>


<?php		
		
	}
	else {
		echo "something went wrong";
		
		
	}

}


     ?>

<html>
    <head>
        <title>Trainee Entry Form</title>
		<style type="text/css">
		.border_row 
		{
			border:3px;
		}
		
		</style>
		
    </head>
    <body>
	<table style="border:3px;">
<tr class="border_row">
<th>
ID
</th>
<th>
Name
</th>
<th>
Contact number
</th>
</tr>
<tr>

</tr>
<?php 
    $input_query="select * from trainee;"; $result=mysqli_query($connection,$input_query); 
   $array=mysqli_fetch_array($result); 
   // print_r($array);
     while($array_assoc=mysqli_fetch_assoc($result))
     { 
 echo "<tr><td>$array_assoc[id]</td>
 <td>$array_assoc[name]</td><td>$array_assoc[contact_number]</td></tr>";
 
         }
		 
		 if(isset($last_record)){
		//	 echo $last_record;
		 }

?>
</table>
	
        <form method="post" action="index.php">
            <fieldset>

            Name - <input type="text" name="trainee" placeholder="Enter trainee name"/><br/>
            Mobile - <input type="text" name="phone" placeholder="Enter contact number"/><br/>
            Availability <input type="text" name="availability" placeholder="Enter Availability"/>
<br/>
            <input type="submit" value="Insert Trainee Record">
        </fieldset>            
        </form>

    </body>
</html>






<!-- create table trainee (id integer(3), name varchar(100),contact_number varchar(10), display varchar(1));
insert into trainee values(1,'Buddhiraj','9893123456','Y');
ALTER TABLE trainee ADD PRIMARY KEY (id);
CREATE USER 'mysql_trainee'@'localhost' IDENTIFIED BY 'mphc@123';
GRANT ALL PRIVILEGES ON training.* TO 'mysql_trainee'@'localhost';
general queries commands to be used in mysql
 
create table <table_name> (field_name1 data type,field_name2 data type.....)
select * from <table_name>
alter table <table_name> add primary key <field_name>
alter table <table_name> 
 MODIFY field_name INT NOT NULL AUTO_INCREMENT; -->