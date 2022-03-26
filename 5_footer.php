<?php /* copyright and contact info., including social media links */ ?>

<!-- <?php echo "<hr />This is footer.<hr />"; ?> -->

<footer>

    <div class="class_div_footer_container">
        <span class="class_span_copyright_socialmedia">Sumit Grover &copy; 2022. All rights reserved.<br /><br /> <a href="mailto:sumitgrover123@gmail.com" target="_blank">Gmail</a> &nbsp; <a href="facebook.com/sumitgrover123">Facebbok</a> &nbsp; <a href="twitter.com/sumitgrover1234">Twitter</a></span>
        <span class="class_span_feedbackform">            
            <form action="<?php $_PHP_SELF ?>" method="post" autocomplete="on"> <!-- "feedback_processing.php" receives the data entered by the user from the following form. -->
                <legend>Feedback</legend>
                <fieldset>
                    <input type="text"   id="id_form_input_fname" name="name_form_input_fname" placeholder="First Name *" required> <!-- "name_form_input_fname" is the identifier used to send this input data to "feedback_processing.php" -->
                    <input type="text"   id="id_form_input_lname" name="name_form_input_lname" placeholder="Last Name"><br />
                    <input type="number" id="id_form_input_age" name="name_form_input_age" placeholder="Age" min="1" max="120">
                    <input type="email"  id="id_form_input_email" name="name_form_input_email" placeholder="E-mail ID" size="35"><br /> 

                    Rating&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="class_form_input_label" for="id_form_input_radio_0">&nbsp;&nbsp;&nbsp;&nbsp;0&nbsp;<input type="radio" class="class_form_input_radio" id="id_form_input_radio_0" name="name_form_input_radio"></label> <!-- "name_form_input_radio" is the identifier used to send this input data to "feedback_processing.php" -->
                    <label class="class_form_input_label" for="id_form_input_radio_1">&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;<input type="radio" class="class_form_input_radio" id="id_form_input_radio_1" name="name_form_input_radio"></label>
                    <label class="class_form_input_label" for="id_form_input_radio_2">&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;<input type="radio" class="class_form_input_radio" id="id_form_input_radio_2" name="name_form_input_radio"></label>
                    <label class="class_form_input_label" for="id_form_input_radio_3">&nbsp;&nbsp;&nbsp;&nbsp;3&nbsp;<input type="radio" class="class_form_input_radio" id="id_form_input_radio_3" name="name_form_input_radio"></label>	  
                    <label class="class_form_input_label" for="id_form_input_radio_4">&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;<input type="radio" class="class_form_input_radio" id="id_form_input_radio_4" name="name_form_input_radio"></label>
                    <label class="class_form_input_label" for="id_form_input_radio_5">&nbsp;&nbsp;&nbsp;&nbsp;5&nbsp;<input type="radio" class="class_form_input_radio" id="id_form_input_radio_5" name="name_form_input_radio" checked="checked"></label><br />

                    <input type="text" id="id_input_feedback" name="name_input_feedback" placeholder="Feedback *" size="47" required><br />

                    <input type="submit" id="id_input_submit" name="name_input_submit" value="Submit">
                    <input type="reset" id="id_input_reset" name="name_input_reset" value="Reset">
                </fieldset>
            </form>
        </span>
    </div>

</footer>

</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
/* save all the data received from the website form */
$php_var_1 = $_POST['name_form_input_fname']; /* name_form_input_fname = First Name */
$php_var_2 = $_POST['name_form_input_lname']; /* name_form_input_lname = Last Name */
$php_var_3 = $_POST['name_form_input_age']; /* name_form_input_age = Age */
$php_var_4 = $_POST['name_form_input_email']; /* name_form_input_email = E-mail ID */
$php_var_5 = $_POST['name_form_input_radio']; /* name_form_input_radio = Rating */
$php_var_6 = $_POST['name_input_feedback']; /* name_input_feedback = Feedback */

/* validate the data received from the website table. */
if ( empty($php_var_1) ||  empty($php_var_6) ) {
	echo "First Name or Feedback should not be empty!"; 
	header('Location: '.$_SERVER['PHP_SELF']);
	die();
}
else {
	/* get database and table info from cpanel. */
	$db_host = "localhost"; 
	$db_user = "root"; 
	$password = "1234"; 
	$db_name = "dbfeedback"; 
	$table_name = "tablefeedback"; 

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
		
		$db_conn->query($sqlquery); /* the query is executed here. */
		
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
    if (($result = $db_conn->query($sql)) !== FALSE) {
    echo nl2br ("S. No. | First Name | Last Name | Age | E-mail ID | Rating | Feedback | \n");
      while($row = $result->fetch_assoc()) {
            echo $row["S_No"]." | ".$row["First_Name"]." | ".$row["Last_Name"]." | ".$row["Age"]." | ".$row["Email_ID"]." | ".$row["Rating"]." | ".$row["Feedback"]." | <br />";
        }
    } else {
        echo "Query failure!";
        echo "Error: " . $sql . "<br>" . $db_conn->error;
    }
    */
    /*==========================================================================================*/

    /* close the database connection in the end. */
    $db_conn->close();
    header('Location: '.$_SERVER['PHP_SELF']);
	}
}
?>