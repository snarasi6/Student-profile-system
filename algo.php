<?php
for($i=0;$i<5;$i++)
{
for($j=0;$j<8;$j++)
{
    $tim[$i][$j]='-';
}
}
function print_time($time)
{
for($i=0;$i<5;$i++)
{
  for($j=0;$j<8;$j++)
    {
       echo $time[$i][$j];
       echo "\t";
     }
echo "<br>";
}   
}

//session checking
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srp";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 $sql = "select sub_name,sub_id,hrs,staff_name,semester,year,lab from generation";
$result = $conn->query($sql);
$k=0;
if ($result->num_rows > 0) 
{
     while($row = $result->fetch_assoc()) 
     {
            $subject_name[$k]=$row['sub_name'];
            $subject_id[$k]=$row['sub_id'];
            $hrs[$k]=$row['hrs'];

            $staff[$k]=$row['staff_name'];
            $sem[$k]=$row['semester'];
            $yr[$k]=$row['year'];
            $lab[$k]=$row['lab'];
              $k++;
     }
}
$sub_count=$k/2;
for($s1=0;$s1<5;$s1++)
{
    for($s2=0;$s2<8;$s2++)
    {
    $flag[$s1][$s2]=0;
    }
}

$sub_c=$k/2;
$i=0;//day
$j=0;//hour
$k=0;//subjectid
$l=0;
//$l is id for lab during next day
$dayfree=array(8,8,8,8,8);


//while($sub_count>0)
{
    for($k=0;$k<$sub_c;$k++)
    {
        if($flag[$i][$j]==0)
        {
     if($lab[$k]==1)
     {//$j=0; 
        if($l==0)//assigning lab during next day
        {
         while($hrs[$k]>0)
         {
             $tim[$i][$j]=$subject_name[$k];
             $j++; $hrs[$k]--;$dayfree[$i]--;$l++;$flag[$i][$j]=1;
         }
         $sub_count--;
        $temp1=$j;
        } 
      
        else
        {
            //$i++;
         while($hrs[$k]>0)
         {
             $tim[$i][$j]=$subject_name[$k];
             $j++; $hrs[$k]--;$dayfree[$i]--;$flag[$i][$j]=1;
         }
         $sub_count--;
            $j=0;$l=0;
        } 
     
     $i++;
     }}
     else
     {
       $j++;  
     }
    }//end of lab assignment
     $j=0;
for($k=0;$k<$sub_c;$k++)
{
      if($j<8&&$i<5)
  {
    if($hrs[$k]==4&&$flag[$i][$j]==0)
    {          
      
        while($hrs[$k]>2)
         {
             $tim[$i][$j]=$subject_name[$k];
             $j++; $hrs[$k]--;$dayfree[$i]--;$l++;
 
         }
        
    }
    else if($hrs[$k]==3&&$flag[$i][$j]==0)
    {
        while($hrs[$k]>1)
         {
             $tim[$i][$j]=$subject_name[$k];
             $j++; $hrs[$k]--;$dayfree[$i]--;$l++;
 
         }
        
    }
    else if($hrs[$k]==2&&$flag[$i][$j]==0)
    {
        while($hrs[$k]>0)
         {
             $tim[$i][$j]=$subject_name[$k];
             $j++; $hrs[$k]--;$dayfree[$i]--;$l++;
 
         }
        
    }
   else if($hrs[$k]==1&&$flag[$i][$j]==0)
    {
        while($hrs[$k]>0)
         {
             $tim[$i][$j]=$subject_name[$k];
             $j++; $hrs[$k]--;$dayfree[$i]--;$l++;
 
         }
        
    }
}
    else
    {
        $i=$i%5;
    $j=$j%8;$i++;$j++;

    }

}





   
}

//print_time($tim);
Header("Location: admintimeview.php ");

$day=array('Monday','Tueday','Wednesday','Thursday','Friday');

/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srp";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
for($k=0;$k<5;$k++)
{
$sql = "insert into  timetable values('$day[$k]','$tim[$k][0]','$tim[$k][1]','$tim[$k][2]','$tim[$k][3]','$tim[$k][4]','$tim[$k][5]','$tim[$k][6]','$tim[$k][7]',3,'R',0)";
$result = $conn->query($sql);
}

//if ($conn->query($sql) === TRUE) {
//    echo "Record updated successfully";
  //header("Location: adminentermark.php"); 
//} else {
  //  echo "Error updating record: " . $conn->error;

//}
*/
//printing db
/*for($i=0;$i<18;$i++)
{
echo $subject_name[$i];echo "\t";
echo $subject_id[$i];echo "\t";
echo $hrs[$i];echo "\t";
echo $staff[$i];echo "\t";
echo $sem[$i];echo "\t";
echo $yr[$i];echo "\t";
echo $lab[$i];echo "\t";
echo "<br>";            
}
echo "<br>";
*/






?>