<?php
include 'base.php';
include 'utils.php';
$bool=false;
$doctor='';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $bool=true;

    $doctor = $_POST['doctor'];


}

?>

<?php startblock('title');?>
选择医生
<?php endblock();?>

<?php startblock('body');?>
<div style="padding: 50px">



    <div class="container" style="padding-left: 6%">
        <div class="row">
            <div class="col-sm">

                <!--Back to Main Page-->
                <p>
                    <a href="../registration_list.php.php" class="btn btn-outline-primary">返回挂号列表</a>
                </p>


            </div>
            <div class="col-sm">

                <h2>选择医生</h2>

            </div>
            <div class="col-sm">


            </div>
        </div>
    </div>

    <div style="padding: 12px"></div>


    <div style="padding: 1% 30% 0 24% ">

        <!--form-->
        <form method="post">


            <div class="row">

                <div class="col">

                </div>
                <div class="col">
                    <lable>医生</lable>
                    <select class="form-control" name="doctor">
                        <option value="<?php echo $doctor?>"><?php doctor_num_to_str_single($doctor) ?></option>
                        <option value="1">别医生</option>
                        <option value="2">努医生</option>
                        <option value="3">艾登医生</option>
                        <option value="4">杰医生</option>
                        <option value="5">阿亚医生</option>
                        <option value="6">古丽医生</option>
                        <option value="7">古米医生</option>
                    </select>
                </div>

                <div class="col">

                </div>

                <!--                --><?php //}?>
            </div>

            <div style="padding: 12px"></div>



            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-outline-primary">Confirm</button>
                </div>
                <?php if ($bool==true){?>
                    <div class="col">
                        <a href="addPatient.php?doctor=<?php echo $doctor?>" class="btn btn-outline-secondary">Next</a>
                    </div>
                <?php }?>
                <!--                --><?php //if ($bool==true){?>
                <!--                <div class="col">-->
                <!--                    <a href="nextPage.php?phoneNum=--><?php //echo $phoneNum?><!--" class="btn btn-outline-secondary">下一步</a>-->
                <!--                </div>-->
                <!--                --><?php //}?>
        </form>



    </div>















</div>
<?php endblock();?>
