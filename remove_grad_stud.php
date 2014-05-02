<html>
    <head>
        <style>
             table
            {
                font-family: Georgia;
            }
            th
            {
                font-size: 16px;
                color: blue;
            }
            td
            {
                font-size: 12px;
            }
            body
            {
                font-family: georgia;
                font-size: 16px;
                color: blue;
            }
        </style>
    </head>
    <body>
        <form action="<?php ?>" method="post">
       <br><br>
        <table align="center">
            <tr>
                <th align="left">Click to Remove graduated students</th>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
                <th align="right" colspan="2">
                    <input type="submit" name="submit" value="Remove">
                </th>
            </tr>
        </table>
        </form>

<?php
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST['submit']))
  {

    include 'connect_db.php';
    $query="delete from student where comment='yes'";
    trim($query);
    $query=stripcslashes($query);
    $query_html=htmlspecialchars($query);

    $result=mysql_query($query);
    $row=mysql_affected_rows();
    if(!$row)
    {
        echo "<script>
            alert('error there No graduated students found!!!');
            </script> ";
    }
    else
        {
      // echo "<h2 align='center'>Student details after removing Graduated students<h2>";
       $query="select USN,name,sem,dept,email,year from student";
       trim($query);
       $query=stripcslashes($query);
       $query_html=htmlspecialchars($query);
       $result=mysql_query($query);
       print "<h2 align='center'>Student details After Removing graduated students</h2>";
       print "<table border='1' align='center' cellspacing='4'><caption></caption>";
       print "<tr>";
       $num_rows=mysql_num_rows($result);
       $row=mysql_fetch_array($result);
       $num_fields=mysql_num_fields($result);

       $keys=array_keys($row);
       for($index=0; $index<$num_fields; $index++)
           print "<th>".$keys[2*$index+1]."</th>";
           print "</tr>";

       for($row_num=0; $row_num<$num_rows; $row_num++)
       {
           print "<tr>";
           $values=array_values($row);
           for($index=0; $index<$num_fields; $index++)
           {
              $value=htmlspecialchars($values[2*$index+1]);
              print "<th>".$value."</th>";
           }
        print "</tr>";
        $row=mysql_fetch_array($result);
       }
       print "</table>";
    }
}
?>
    </body>
</html>