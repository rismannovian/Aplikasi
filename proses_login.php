<?php

                session_start();

                include 'koneksi.php';

                $id=$_POST['id'];

                $password=$_POST['password'];

                $query=mysql_query("select * from petugas where id='$id' and password='$password'");

                $xxx=mysql_num_rows($query);

                if($xxx==TRUE)

                {

                                $_SESSION['id']=$id;

                                header("location:index.php");

                }

                else

                {

                                echo "gagal login";

                }

?>