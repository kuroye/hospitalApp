<?php
include '../../base.php';
require_once '../../utils.php';

$doctor= isset($_GET['doctor']) ? $_GET['doctor'] : null;

$pdo = connect_database();

$statementDr=$pdo->prepare('SELECT * FROM patient WHERE doctor = :doctor');
$statementDr->bindValue(':doctor', $doctor);
$statementDr->execute();
$timeDrs = $statementDr->fetchAll(PDO::FETCH_ASSOC);


$errors = [];

$name = '';
$time = '';
$subject = isset($_GET['subject']) ? $_GET['subject'] : null;
$lName = '';
$gender = '';
$phoneNum = '';
$age= '';
$idNum = '';
$regisType = isset($_GET['regisType']) ? $_GET['regisType'] : null;
$resBill='';

//$bool=false;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $time = $_POST['time'];
    $date = date("Y-m-d");
    $lName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $phoneNum = $_POST['phoneNum'];
    $age = $_POST['age'];
    $idNum = $_POST['idNum'];
    $regisType = $_POST['regisType'];
    $doctor = $_POST['doctor'];

    if ($regisType==0){
        $resBill=5000;
    }else{
        $resBill=7500;
    }


    if (!$name) {
        $errors[] = 'Name is required';
    }




    if (empty($errors)) {
//        $bool=true;

        $statement = $pdo->prepare("INSERT INTO patient (name,subject,time,date,lName,gender,age,phoneNum,idNum,regisType,doctor,resBill)
                    VALUES (:name, :subject, :time, :date, :lName, :gender, :age, :phoneNum, :idNum, :regisType, :doctor, :resBill)");



        $statement->bindValue(':name', $name);
        $statement->bindValue(':subject', $subject);
        $statement->bindValue(':time', $time);
        $statement->bindValue(':date', $date);
        $statement->bindValue(':lName', $lName);
        $statement->bindValue(':age', $age);
        $statement->bindValue(':gender', $gender);
        $statement->bindValue(':phoneNum', $phoneNum);
        $statement->bindValue(':idNum', $idNum);
        $statement->bindValue(':regisType', $regisType);
        $statement->bindValue(':doctor', $doctor);
        $statement->bindValue(':resBill', $resBill);




        try {
            // PDO statements
            $statement->execute();

        } catch (PDOException $e) {
            // handle error
            echo $e->getmessage();
            exit;
        }


        header('Location: ../registeredList.php');
    }


}

?>

<?php startblock('title');?>
????????????
<?php endblock();?>

<?php startblock('body');?>

<div style="padding: 50px">



    <div class="container" style="padding-left: 6%">
        <div class="row">
            <div class="col-sm">

                <!--Back to Main Page-->
                <p>
                    <a href="frontPage.php" class="btn btn-outline-primary">???????????????</a>
                </p>


            </div>
            <div class="col-sm">

                <h2>????????????</h2>

            </div>
            <div class="col-sm">


            </div>
        </div>
    </div>


    <?php if (!empty($errors)):?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error):?>
                <div><?php echo $error?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <div style="padding: 12px"></div>


    <div style="padding: 1% 30% 0 24% ">

        <!--form-->
        <form method="post">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="???" value="<?php echo $name?>" name="name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="???" value="<?php echo $lName?>" name="lastName">
                </div>
            </div>

            <div style="padding: 12px"></div>

            <div class="row">
                <div class="col">
                    <select class="form-control" name="gender">
                        <option value="1">???</option>
                        <option value="0">???</option>
                    </select>
                </div>

                <div class="col">
                    <input type="text" class="form-control" placeholder="??????" name="age" value="<?php echo $age?>">
                </div>

            </div>

            <div style="padding: 12px"></div>

            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="?????????" value="<?php echo $phoneNum?>" name="phoneNum">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="????????????" value="<?php echo $idNum?>" name="idNum">
                </div>

            </div>

            <div style="padding: 12px"></div>

            <div class="row">
                <!--                --><?php //if ($bool==false){?>
                <div class="col">
                    <lable>??????</lable>
                    <select class="form-control" name="subject">
                        <option value="1">??????</option>
                        <option value="2">??????</option>
                        <option value="3">??????</option>
                        <option value="4">??????</option>
                        <option value="5">?????????</option>
                        <option value="6">?????????</option>
                        <option value="7">?????????</option>
                        <option value="8">??????</option>
                    </select>
                </div>
                <div class="col">
                    <lable>????????????</lable>
                    <?php if ($doctor==1){
                        $regisType=1;
                    }else {
                        $regisType=0;
                    }?>
                    <input type="hidden" class="form-control" placeholder="??????" value="<?php echo $regisType?>" name="regisType">
                    <br>
                    <b><?php if ($doctor==1){
                            echo "????????????";
                        }else {
                            echo "????????????";
                        } ?></b>
                </div>

                <div class="col">
                    <lable>??????</lable>
                    <input type="hidden" class="form-control" placeholder="??????" value="<?php echo $doctor?>" name="doctor">
                    <br>
                    <b><?php include('../../utils.php'); echo doctor_num_to_str_single($doctor)?></b>
                </div>

                <!--                --><?php //}?>
            </div>

            <div style="padding: 12px"></div>


            <div class="row">
                <!--                --><?php //if ($bool==false){?>
                <div class="col">
                    <select class="form-control" name="time">
                        <?php $hour=9; $min="00" ; $half="30";$isParallel=true;
                        for ($i=0;$i<16;$i++) {

                            $isParallel=true;

                            if ($i % 2 == 0) {
                                $timeT = $hour . ":" . $min;

                            }else{

                                $timeT = $hour . ":" . $half;
                            }

                            if ($i%2==1 )
                                $hour+=1;

                            foreach ($timeDrs as $timeDr):

                                if ($timeT==$timeDr['time'] && date("Y-m-d")==$timeDr['date'])
                                    $isParallel = false;

                            endforeach;

                            if ( $isParallel==true &&$timeT!="12:30"&&$timeT!="13:00"&&$timeT!="13:30"){
                                ?>

                                <option value="<?php echo $timeT?>"><?php echo $timeT?></option>

                            <?php }?>


                        <?php }?>

                    </select>
                </div>
                <!--                --><?php //}?>
                <div class="col">

                </div>

            </div>

            <div style="padding: 12px"></div>

            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-outline-success">??????</button>
                </div>

        </form>


    </div>


</div>


<?php endblock();?>
