<?php

$myfile = fopen("form.php","r");
if(isset($headingForm)){

?>
<div class="shadow bg-white  flex-column rounded w-50 d-flex justify-content-center align-items-center p-4">
    <h2 class="text-secondary fw-bold mb-5"><?php echo $headingForm ?></h2>
    <form class="w-100" method="post" action="<?php echo $url; ?>">
        <div class="mb-3 w-100">
            <label for="name" class="form-label fw-bold text-secondary">NAME</label>
            <input type="text" hidden name="method" value="put" />
            <input type="text" hidden value="<?php if(isset($id)){echo $id ;} ?>" name="id" >
            <input type="text" class="form-control" value="<?php if(isset($name)){echo $name    ;} ?>" name="name" id="name" placeholder="Name">
            <span class="text-danger">
                <?php 
                if (isset($nameER)) {
                    echo $nameER;
                }   
                ?>
            </span>
        </div>
        <div class="mb-3 w-100">
            <label for="f_name" class="form-label fw-bold text-secondary">FATHER NAME</label>
            <input type="text" class="form-control" name="f_name" id="f_name" value="<?php if(isset($fatherName)){echo $fatherName ;}  ?>" placeholder="Father name">
            <span class="text-danger">
                <?php
                if (isset($fatherNameER )) {
                    echo $fatherNameER ;
                }   
                ?>
            </span>
        </div>
        <div class="mb-3 w-100">
            <label for="email" class="form-label fw-bold text-secondary">Email address</label>
            <input type="email" class="form-control" value="<?php if(isset($email)){echo $email ;} ?>" name="email" id="email" placeholder="name@example.com">
            <span class="text-danger">
                <?php
                if (isset($emailER )) {
                    echo $emailER ;
                }   
                ?>
            </span>
        </div>
        <div class="mb-3 w-100">
            <label for="pass" class="form-label fw-bold text-secondary">PASSWORD</label>
            <input type="text" value="<?php if(isset($pass)){echo $pass ;}  ?>" class="form-control" name="pass" id="pass" placeholder="password">
            <span class="text-danger">
                <?php
                if (isset($passER)) {
                    echo $passER;
                }   
                ?>
            </span>
        </div>
        <div class="mb-3 w-100">
            <input name="submit" value="<?php if(isset($btn)){echo $btn ;}  ?>" type="submit" class="btn btn-primary fw-bold form-control">
        </div>
    </form>
</div>
<?php
}else{
    header('location:login.php');
}
?>