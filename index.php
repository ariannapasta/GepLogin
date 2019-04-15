<html>
    <body>
        <form action="index.php" method="post">
            Inserisci la tua mail:
            <input type="text" name="email">
            Inserisci la password:
            <input type="text" name="password">
            <input type="submit" value="Invia">
        </form>
    </body>
</html>

<?php
    $host="localhost";
    $username="root";
    $password="";
    $database="accesso";

    $conn= new mysqli($host, $username, $password, $database);
    if($conn->connect_error){
        die("Connessione fallita ". $conn->connect_error);
    }

    $email=$_POST["email"];
    $pass=$_POST["password"];
    
    $query="SELECT * FROM utente WHERE email='$email' AND password='$password'";
    $result = $mysqli->query( $query );
    $num_results = $result->num_rows;
    if($num_results>0){
        $queryAccessi="UPDATE utente SET accessi = accessi + 1 WHERE email= '".$email."'";
        $resultSql=$conn->query($queryAccessi);
        $row = mysqli_fetch_array($resultSql);
        echo("Il numero di accessi e' di: ".$row['accessi'] . " volte.");
    }
    else {
        $query="SELECT * FROM utente WHERE email='$email'";
        $result = $mysqli->query( $query );
        $num_results = $result->num_rows;
        if($num_results>0){
            echo "Password Errata";
        }
        else{
            echo "Email non presente!";
        }

    }
    
?>