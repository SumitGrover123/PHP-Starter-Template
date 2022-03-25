<?php /* main content */ ?>

<?php
echo "<hr />This is body.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>Feedback</title>
</head>
<body>

    <form action="<?php $_PHP_SELF ?>" method="post" autocomplete="on"> <!-- "feedback_processing.php" receives the data entered by the user from the following form. -->
        <p style="font-family:arial; color:grey; font-size: 0.95em;">
		<input type="text"   id="id_input_1" name="name_input_1" placeholder="First Name *" required /> <!-- "name_input_1" is the identifier used to send this input data to "feedback_processing.php" -->
        <input type="text"   id="id_input_2" name="name_input_2" placeholder="Last Name" /><br /><br />
        <input type="number" id="id_input_3" name="name_input_3" placeholder="Age" min="1" max="120" />
		<input type="email"  id="id_input_4" name="name_input_4" placeholder="E-mail ID" size="35" /><br /><br /> 
		
		Rating&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;0<input type="radio" id="id_input_radio_0" name="name_input_5" value="0" /> <!-- "name_input_5" is the identifier used to send this input data to "feedback_processing.php" -->
		&nbsp;&nbsp;&nbsp;&nbsp;1<input type="radio" id="id_input_radio_1" name="name_input_5" value="1" />
		&nbsp;&nbsp;&nbsp;&nbsp;2<input type="radio" id="id_input_radio_2" name="name_input_5" value="2" />
		&nbsp;&nbsp;&nbsp;&nbsp;3<input type="radio" id="id_input_radio_3" name="name_input_5" value="3" />	  
		&nbsp;&nbsp;&nbsp;&nbsp;4<input type="radio" id="id_input_radio_4" name="name_input_5" value="4" />
		&nbsp;&nbsp;&nbsp;&nbsp;5<input type="radio" id="id_input_radio_5" name="name_input_5" value="5" checked="checked" /><br /><br />

        <textarea rows="10" cols="46" id="id_textarea_1" name="name_input_6" placeholder="Feedback *" required></textarea><br /><br /> <!-- "name_input_6" is the identifier used to send this input data to "feedback_processing.php" -->

        <input type="submit" value="Submit" />
        <input type="reset" value="Reset" />
		</p>
    </form>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
/* save all the data received from the website form */
$php_var_1 = $_POST['name_input_1']; /* name_input_1 = First Name */
$php_var_2 = $_POST['name_input_2']; /* name_input_2 = Last Name */
$php_var_3 = $_POST['name_input_3']; /* name_input_3 = Age */
$php_var_4 = $_POST['name_input_4']; /* name_input_4 = E-mail ID */
$php_var_5 = $_POST['name_input_5']; /* name_input_5 = Rating */
$php_var_6 = $_POST['name_input_6']; /* name_input_6 = Feedback */

/* validate the data received from the website table. */
if ( empty($php_var_1) ||  empty($php_var_6) ) {
	echo "First Name or Feedback should not be empty!"; 
	die();
	header("Location: 5_feedback.php");
}
else {
	/* get database and table info from cpanel. */
	$db_host = "localhost"; 
	$db_user = "root"; // get from cpanel
	$password = "1234"; //get from cpanel
	$db_name = "dbfeedback"; // get from cpanel
	$table_name = "tablefeedback"; // get from cpanel

	/* Create connection */
	$db_conn = new mysqli($db_host, $db_user, $password, $db_name);

	/* Check connection */
	if ($db_conn->connect_error) {
		die("Connection failed: " . $db_conn->connect_error);
	}
	else {
		/* save all "column_name" from the database table that are to be populated by form data. */
		/* Spaces in column names are NOT allowed. Skip all the auto-increment columns. */
		$table_column_1 = "First_Name";
		$table_column_2 = "Last_Name";
		$table_column_3 = 'Age'; 
		$table_column_4 = 'Email_ID';
		$table_column_5 = 'Rating';
		$table_column_6 = 'Feedback';

		/* create and execute sql-query to insert the validated data into the database. */
		/* write only those column-variables here for which the data is received from the website form. Arguments/variables NEED to be enclosed within single quotes. */
		/* $sqlquery = "INSERT INTO `tablefeedback` (`S_No`, `First_Name`, `Last_Name`, `Age`, `Email_ID`, `Rating`, `Feedback`) VALUES ('1', 'Sumit', 'Grover', '31', 'sumitgrover123@gmail.com', '5', 'This is good.');"; */
		$sqlquery = "INSERT INTO $table_name ($table_column_1, $table_column_2, $table_column_3, $table_column_4, $table_column_5, $table_column_6 ) VALUES ('$php_var_1', '$php_var_2', '$php_var_3', '$php_var_4', '$php_var_5', '$php_var_6');";
		
		$db_conn->query($sqlquery); /* the query should ACTUALLY run here. */
		
		/*echo nl2br ("1 row inserted! \n\n");*/
		
		/* prompt for query implementation. remove this prompt from production code. */
		/*if ($db_conn->query($sqlquery) !== FALSE) {
		echo nl2br ("New record created successfully! \n"); 
		
		} else {
			
		echo nl2br ("step 00 - Error Encountered bruh : " . $sqlquery . "<br>" . $db_conn->error . "\n");
		} */
	}

 /*==========================================================================================*/
/*
  $sql = "SELECT * FROM $table_name";
  if (($result = $db_conn->query($sql)) !== FALSE)
  {
	echo nl2br ("S. No. | First Name | Last Name | Age | E-mail ID | Rating | Feedback | \n");
    while($row = $result->fetch_assoc())
      {
          echo $row["S_No"]." | ".$row["First_Name"]." | ".$row["Last_Name"]." | ".$row["Age"]." | ".$row["Email_ID"]." | ".$row["Rating"]." | ".$row["Feedback"]." | <br />";
      }
  }
  else
  {
      echo "Query failure!";
      echo "Error: " . $sql . "<br>" . $db_conn->error;
  }
 */
 /*==========================================================================================*/
  
/* close the database connection in the end. */
$db_conn->close();
/*header("Location: index.html");*/
	}
}
?>