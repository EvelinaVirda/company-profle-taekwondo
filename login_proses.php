     <?php session_start();
    ob_start();
    include "koneksi.php";
    $username = $_POST['username'];
    $pass     = md5($_POST['password']);

    $login=mysqli_query($connect, "SELECT * FROM admin WHERE username='$username' AND password='$pass'");
    $ketemu = mysqli_num_rows($login);
    $r=mysqli_fetch_array($login);

    if ($ketemu > 0) {

        $_SESSION[username] = $r[username];

        $_SESSION[password] = $r[password];

    header('location:table.php');
    }else{
    ?><script>alert("Login gagal!");document.location.href="index.php"</script>
    <?php
    echo mysqli_error();
    }
    ?>