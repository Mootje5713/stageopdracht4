<?php
    include "connection.php";
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $query = "SELECT * FROM `groups` WHERE password =  '$password'";
        $result=$conn->query($query);
        if ( $result === FALSE) {
            echo "error" . $query . "<br />" . $conn->error;
        } else {
            if ($result->num_rows>0) {
                while($row=$result->fetch_assoc())
                {
                    $_SESSION['group_id'] = $row['id'];
                    $_SESSION['grouppassword'] = $row['password'];
                    $_SESSION['groupname'] = $row['name'];
                }
            }
        }
        header("Location: login.php");
    }

?>

<?php include "header.php"; ?>

<form method="POST">
    <p>Voer je groepswachtwoord in</p>
    <input type="password" name="password" id="password">
    <input type="submit" class="btn" name="submit" value="send">
    <br>
    nog geen groep <a href="addgroup.php">klik hier</a>
</form>

<?php
    include "footer.php";
?>