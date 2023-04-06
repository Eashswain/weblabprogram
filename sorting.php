<html>
<head>
   <meta charset="UTF-8">
   <style>
      table,td,th {
         border:1px solid blue;width:66%;
         text-align:center;
         border-colllapse:collapse;background-color:lightgrey;
      }
      table{margin:auto;}
   </style>
</head>
<body>
      <?php
          $servername="localhost";
          $username="root";
          $password="";
          $dbname="studentdata";
          $a=[];
          $conn=mysqli_connect($servername,$username,$password,$dbname);
          if($conn->connect_error)
             die("connection failed:". $conn->connect_error);
          $sql="SELECT *FROM student";
          $result=$conn->query($sql);
          echo"<br>";
          echo"<center><h2>BEFORE SORTING</h2></center>";echo"<table border='2'>";
          echo"<tr>";
          echo"<th>USN</th><th>NAME</th><th>ADDRESS</th></tr>"; 
          if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
                 echo"<tr>";
                 echo"<td>".$row["USN"]."</td>";
                 echo"<td>".$row["NAME"]."</td>";
                 echo"<td>".$row["ADDRESS"]."</td></tr>";array_push($a,$row["USN"]);
             }
           }
           else
             echo"table is empty";echo"</table>";
           $n=count($a);
           for($i=0;$i<($n-1);$i++){
               $pos=$i;
               for($j=$i+1;$j<$n;$j++){
                   if($a[$pos]>$a[$j])
                      $pos=$j;
               }
               if($pos!=$i){
                   $temp=$a[$i];
                   $a[$i]=$a[$pos];
                   $a[$pos]=$temp;
               }
            }
            $c=[];
            $d=[];
            $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                   for($i=0;$i<$n;$i++){
                       if($row["USN"]==$a[$i]){
                            $c[$i]=$row["NAME"];
                            $d[$i]=$row["ADDRESS"];
                       }
                    }
                 }
             }
             echo"<br>";
             echo"<center><h3>After sorting</h3></center>";
             echo"<table border='2'>";
             echo"<tr>";
             echo"<th>USN</th><th>NAME</th><th>ADDRESS</th></tr>";
             for($i=0;$i<$n;$i++){
                 echo"<tr>";
                 echo"<td>".$a[$i]."</td>";
                 echo"<td>".$c[$i]."</td>";
                 echo"<td>".$d[$i]."</td></tr>";
              }
              echo"</table>";
              $conn->close();
       ?>
</body>
</html>


