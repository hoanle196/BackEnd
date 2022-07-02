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
$ob = $conn->query($sql);
$arr = $ob->fetch();
$tongtin = (int)$arr[0];
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


?>
<div style="width:400px;position:relative;top:50%;transform:translateY(-50%);" class="container m-auto">
          <?php foreach ($data as $row) { ?>
                    <p class="text-primary"><?php echo $row['TieuDe']; ?></p>
          <?php } ?>
          <nav aria-label="Page navigation example">
                    <ul class="pagination">
                              <li class="page-item"><a class="page-link" href="listTin.php?pageNum=1">
                                                  << </a>
                              </li>
                              <?php if ($pageNum > 1) { ?>
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
                              <?php } ?>


                              <li class="page-item"><a class="page-link" href="listTin.php?pageNum=<?php echo $tongtrang ?>"> >> </a></li>
                    </ul>
          </nav>
</div>

<link rel="stylesheet" href="./bootstrap.min.css">