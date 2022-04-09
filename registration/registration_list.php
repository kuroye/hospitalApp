<?php
include '../base.php';
require_once '../utils.php';

date_default_timezone_set('UTC');

$pdo = connect_database();


$search_by_name = isset($_GET['search-by-name']) ? $_GET['search-by-name'] : '';
if ($search_by_name) {
    $statement=$pdo->prepare('SELECT * FROM patient WHERE name LIKE :name');
    $statement->bindValue(':name',"%$search_by_name%");
} else {
    $statement=$pdo->prepare('SELECT * FROM patient ORDER BY time DESC ');
}


$statement->execute();
$patients = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<?php startblock('title');?>
挂号列表
<?php endblock();?>


<?php startblock('body');?>

<div style="padding: 50px">



    <div class="container" style="padding-left: 6%">
        <div class="row">
            <div class="col-sm">

                <!--Back to Main Page-->
                <p>
                    <a href="../index.php" class="btn btn-outline-primary">返回首页</a>
                </p>


            </div>
            <div class="col-sm">

                <h2>挂号列表</h2>

            </div>
            <div class="col-sm">

                <p>
                    <a href="add/add_patient.php" class="btn btn-outline-success">添加患者</a>
                </p>

            </div>
        </div>
    </div>


    <!-- Search Bar -->
    <form >
        <div class="input-group mb-3">
            <input type="text" class="form-control"
                   placeholder="查找病人"
                   name="search-by-name" value="<?php echo $search_by_name?>">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">搜索</button>
            </div>
        </div>
    </form>


    <form action="">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="年/月/日" name="search-by-date" value="">
            </div>
            <div class="col">
                <button class="btn btn-outline-secondary" type="submit">日期筛选</button>
            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
    </form>


    <div style="padding: 12px"></div>
    <!-- Table -->
    <table class="table" data>
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">患者名</th>
            <th scope="col">患者姓</th>
            <th scope="col">医生</th>
            <th scope="col">科系</th>
            <th scope="col">挂号类型</th>
            <th scope="col">时间</th>
            <th scope="col">日期</th>
            <th scope="col"></th>
            <th scope="col">支付状态</th>
            <th scope="col">病人详情</th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>

        </thead>
        <tbody>
        <?php foreach ($patients as  $patient) : ?>
            <?php if ($patient['date']>=date("Y-m-d")){?>
                <tr>
                    <th scope="row"></th>
                    <td><?php echo $patient['name']?></td>
                    <td><?php echo $patient['lName']?></td>

                    <td> <?php include_once('../../function.php');
                        echo doctor_numToStr($patient)?>
                    </td>

                    <td>
                        <?php include_once('../../function.php');
                        echo subject_numToStr($patient)?>
                    </td>

                    <td>
                        <?php include_once('../../function.php');
                        echo regisType_boolToAlph($patient)?>
                    </td>

                    <td><?php echo $patient['time']?></td>
                    <td><?php echo $patient['date']?></td>
                    <td><?php if ($patient['isReserved']==0){
                            echo "现挂";}else{
                            echo "预约";}?></td>

                    <td><?php include_once('../../function.php');
                        echo paymentStatus($patient)?>
                    </td>
                    <td>
                        <a href="Info/patientDetail.php?id=<?php echo $patient['id']?>" type="button" class="btn btn-outline-success">信息</a>
                    </td>

                    <td>
                        <a href="Edit/editPatient.php?id=<?php echo $patient['id']?>" type="button" class="btn btn-outline-primary">换号</a>
                    </td>
                    <td>

                        <form action="Delete/deletePatient.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $patient['id']?>">
                            <button type="submit" class="btn btn-outline-danger">退号</button>
                        </form>
                    </td>

                </tr>
            <?php }?>
        <?php endforeach;?>
        </tbody>
    </table>

</div>



<?php endblock();?>

