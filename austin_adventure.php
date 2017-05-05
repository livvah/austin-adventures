<?php
// toDo.php
  // a script that receives a choice
  // returns a list of things for that choice 
  // a simple demo for javascript and xml request
 
    include('../adodb519/adodb5/adodb.inc.php'); 
    
    if (isset($_GET['myAustin'])) {
    
    	$table = $_GET['myAustin'];
        printTable($table);
        
    }
    
    else {
        printTop(); 
        printTableForm();   
        printBottom();        
    }
    
// -----------------------------------------------------------------    
// printForm() 
// Print the form to allow the  user to select a song to purchase
// -----------------------------------------------------------------    
function printTable($table) {
        
        // Open a connection to the database
        //
        $db = ADONewConnection('mysql'); // Create a connection handle to the local database
        $db->PConnect('127.0.0.1',  // Host to connect to
            'ovahsenc_phpUser',     // Database user name
                                     // Password
            'ovahsenc_cosc2328');   // Database
	
        // Format and execute a SQL statement
        //
        $sql = "select * from $table";
        $rs = $db->Execute($sql);
	
        $dbName = "";
        $rowName = "";
        $id = "";
 
        
        print 
            " <table> \n" .
            "       <thead> \n" .
            "           <th>Name</th> \n" .
            "       </thead> \n".
            "	<tbody>\n";
    
        // Make sure we have results
        //
        
        if ($table == "restaurants") {
        	$rowName = "Restaurant";
        }
        if ($table == "Theatres") {
        	$rowName = "Theatre";
        }
        if ($table == "Activities") {
        	$rowName = "Activity";
        }
        
        if ($rs == false) {
            print_r($rs);
            print "<br>SQL select failed \n";
        }
        else {
            
            // While rows are returned, store the values in local variables
            //
            while (!$rs->EOF) {
     	
     		
                $dbName   = $rs->fields[$rowName];
                print "<tr>\n";
                print "<td>$dbName </td>";
                $rs->MoveNext();
            }
            
            print "</tbody>\n";
            print "</table>\n";
            print "</div>\n";
	}
        print "</table> \n";
}
// -----------------------------------------------------------------    
// printTop() 
// Print the top of the web page
// -----------------------------------------------------------------        
function printTop() {
    print     
    " <!DOCTYPE html> \n" .
    " <html lang='en'>  \n" .
    "   <head>  \n" .
    "     <meta charset='utf-8'>  \n" .
    "     <title>Things to do in Austin</title>  \n" .
    "  \n" .
    "     <!-- Latest compiled and minified CSS -->  \n" .
    " 	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>  \n" .
    "  \n" .
    " 	<!-- Optional theme -->  \n" .
    " 	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css'>  \n" .
    "   <link rel='stylesheet' type='text/css' href='./css/ajaxExample.css'> \n" .
    " 	<!-- Latest compiled and minified JavaScript -->  \n" .
    " 	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>  \n" .
   	"<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script> \n".
    "   <script src='./js/asg9.js'></script>  \n" .
    "  </head>  \n" .
    "  \n" .
    "  \n" .
    " <body>   \n"  ;
    
    
    
}    
//-------------
function printTableForm(){
print
 
     "<div class='container'>  \n".
         "<div class='row'>  \n".
             "<div class='col-md-10 col-md-offset-1'>  \n".   
                   "<h1>Things To Do In Austin </h1> \n".
                       "<select name='choices' id ='choices' size = 4 > \n".
                           " <option value='restaurants'> Restaurants </option> \n".
                           " <option value='Theatres'> Theatres </option> \n".
                            "<option value='Activities'> Activities</option> \n".
                        "</select> \n".
                    "<br><button type='button' onclick='printTable()'>Find</button> \n".
                 
		 "<p id='myAustin'> Items will be listed here... Beware of zombies... </p> \n".
                "<button class='btn1'>Zombie Beware Fade Out</button> \n".
		"<button class='btn2'>Zombie Beware Fade In</button> \n";
}
// -----------------------------------------------------------------    
// printBottom()
// Print the bottom of the web page
// -----------------------------------------------------------------        
function printBottom() {    
    
print
    "            </div> \n".
    "       </div> \n".
    "   </div> \n" .
    "  </body> \n".
    "</html> \n";
}
 
?>
