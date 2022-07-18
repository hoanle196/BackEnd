<link rel="stylesheet" href="./bootstrap.min.css">

<?php
require_once 'conn.php';
$pageSize = 5;
$pageNum = 1;
// isset($_GET["pageNum"]) ? $pageNum = $_GET["pageNum"] : $pageNum = 1;
if (isset($_GET["pageNum"])) {
          $pageNum = $_GET["pageNum"];
}
$starrow = ($pageNum - 1) * $pageSize;
// echo $starrow;
$sql = "SELECT count(*) FROM tin";
$ob = $conn->prepare($sql);
$ob->execute();
//$obj = $conn->prepare($sql);
//$obj->execute();
//$a = $obj->fetchColumn();
echo '<pre>';
print_r($ob);
//print_r($a);
echo '</pre>';
// var_dump($ob->rowCount());
// exit();
// $arr = $ob->fetchColumn();
$arr = $ob->rowCount();
 var_dump($arr);      


$tongtin = (int)$arr;
$tongtrang = ceil($tongtin / $pageSize);
// var_dump($tongtrang);
// exit;
$around = 3;
$next = $pageNum + $around;
if ($next > $tongtrang) {
          $next = $tongtrang;
}
$pre = $pageNum - $around;
if ($pre <= 1) $pre = 1;
$sql = "SELECT idTin, TieuDe, TomTat, Ngay FROM tin LIMIT $starrow,$pageSize";
$data = $conn->query($sql);
// var_dump($data);
// exit;

?>
<div class="container">
<div class="container ">
        
        <nav aria-label="Page navigation example">
                  <ul class="pagination">
                           
                            <?php if ($pageNum > 1) { ?>
                        
                                      <li class="page-item"><a class="page-link" href="listTin.php?pageNum=1">
                                                << </a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="listTin.php?pageNum=<?php echo $pageNum - 1 ?>">
                                                          < </a>
                                      </li>
                            <?php } ?>

                            <?php for ($i = $pre; $i <= $next; $i++) { ?>
                                      <?php if ($i == $pageNum) { ?>
                                                <li class="page-item"><a class="page-link bg-warning" href="listTin.php?pageNum=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                      <?php } else { ?>
                                                <li class="page-item"><a class="page-link" href="listTin.php?pageNum=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                      <?php } ?>


                            <?php } ?>
                            <?php if ($pageNum < $tongtrang) { ?>
                                
                                      <li class="page-item"><a class="page-link" href="listTin.php?pageNum=<?php echo $pageNum + 1 ?>"> > </a></li>
                                      <li class="page-item"><a class="page-link" href="listTin.php?pageNum=<?php echo $tongtrang ?>"> >> </a></li>
                            <?php } ?>


                           
                  </ul>
        </nav>
</div>
          <table class="table">
                              <thead>
                              <tr>
                                        <th>STT</th>
                                        <th>Id</th>
                                        <th>Tieu De</th>
                                        <th>Tom Tat</th>
                                        <th>Ngay</th>
                              </tr>
                              </thead>
                              <tbody>
                               <?php $dem=$starrow; foreach ($data as $row) { $dem++; ?>
                              <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?= $row['idTin'];  ?></td>
                                        <td><?= $row['TieuDe'];  ?></td>
                                        <td><?= $row['TomTat'];  ?></td>
                                        <td><?= $row['Ngay'];  ?></td>
                              </tr>
                               <?php } ?>
                              </tbody>


          </table>

</div>