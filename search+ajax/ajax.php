<?php 
$svName = "localhost";
$userName ="root";
$passWord = "";
$DbName= "demo";
$conn = new mysqli($svName,$userName,$passWord,$DbName);
mysqli_set_charset($conn,"utf8");
if($conn->error)
{
          echo "loi ket noi csdl".$con->error;
}

          if(isset($_GET['val']))
          {         
                    $sql = "SELECT * FROM countries WHERE name LIKE ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_Param("s",$val);
                    $val = $_GET['val'].'%';
                    $stmt->execute();
                    $result = $stmt->get_result();
          
                    // var_dump($stmt->());
                    // exit();


                    if($result->num_rows >0)
                    {
                    // while($arr = $result->fetch_assoc())
                    // {
                    //           echo"<p>".$arr['name']."</p>";
                    // }
                    foreach($result as $row)
                    {
                              echo"<p style='color:#4B9C84;'>".$row['name']."</p>";
                    }
                            
                    }
                    else{
                              echo"<p style='color:red;'> khong thay ket qua nao </p>"; 
                    }
                   

                    

          }

?>
