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
        <h2 align="center">Comment on student</h2><br><br>
        <table align="center">
            <tr>
                <th align="left">Enter the student USN:</th>
                <th><input type="text" name="usn" size="15" placeholder="usn"></th>
            </tr>
            <tr>
                <th align="left"> Comment on whether this student is graduated?(yes/no)</th>
                <th><input type="text" name="comment" size="15" placeholder="yes/no"></th>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
                <th align="right" colspan="2">
                    <input type="submit" name="submit" value="Add Comment">
                </th>
            </tr>
        </table>
        </form>
        <?php
        if(isset($_POST['submit']))
        {
          $usn=$_POST['usn'];
          $comment=$_POST['comment'];
          if($usn=='')
          {
            echo "<script>
            alert('Please Enter any USN!!!');
            </script> ";
      //window.location.href='remove_stud.php'

          }
          if($comment=='')
          {
            echo "<script>
            alert('Please Enter comment!!!');
            </script> ";
      //window.location.href='remove_stud.php'

          }
          if(strcmp($comment,'yes')==0 || strcmp($comment,'no')==0)
          {
                   include 'connect_db.php';
            $query="update student SET comment='$comment' where USN='$usn'";
            trim($query);
            $query=stripcslashes($query);
            $query_html=htmlspecialchars($query);

            $result=mysql_query($query);
            $row=mysql_affected_rows();
            if(!$row)
            {
                echo "<script>
                alert('USN not found!!!');
                </script> ";
            }
            else
            {
                echo "<script>";
                echo "alert('Your comment is Successfully added');
              </script> ";
             }
           }
           else
           {
                     echo "<script>
                   alert('Please Enter any valid Comment!!!');
                   </script> ";
           }
              

}
?>
    </body>
</html>
