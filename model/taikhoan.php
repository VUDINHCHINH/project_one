<?php
function insert_taikhoan($email,$user,$pass){
    $sql = "INSERT INTO taikhoan(email,user,pass) values('$email','$user','$pass')";
    pdo_execute($sql);
}
function checkuser($user,$pass){
    $sql = "SELECT * from taikhoan where user='".$user."' AND pass='".$pass."'";
    $tk = pdo_query_one($sql);
    return $tk;
}
function checkemail($email){
    $sql = "SELECT * from taikhoan where email='".$email."'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function loadall_taikhoan(){
    $sql = "SELECT * FROM taikhoan order by id desc";
    $listtaikhoan =  pdo_query($sql);
    return $listtaikhoan;
}
function delete_taikhoan(){
    $sql = "DELETE FROM taikhoan where id=".$_GET['id'];
    pdo_execute($sql);
}
?>