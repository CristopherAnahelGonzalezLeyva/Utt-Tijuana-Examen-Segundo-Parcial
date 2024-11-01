<?php
include "header.php";
    require "config/conexion.php";
    
    conexion();
    $db=conexion();
    var_dump($_POST);

    $id = $_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];

    $query = "insert into seller (name, email, phone) values ('$name', '$email', '$phone');";
    $response = mysqli_query($db,$query);

    if($response){
        echo "seller created";
    }else{
        echo "seller not created";
    }
?>
<section>
    <h2>Seller Form</h2>
    <div>
        <form action="createSeller.php" method="post">
            <fieldset>
                <legend>Fill All Form Fields</legend>
                <div>
                    <label for="id">Seller ID</label>
                    <input type="number" id="id" name="id">
                </div>
                <div>
                    <label for="name">Seller name</label>
                    <input type="text" id="id" name="name">
                </div>
                <div>
                    <label for="email">Seller email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="phone">Seller Phone</label>
                    <input type="tel" name="phone" id="phone">
                </div>
                <div>
                    <button type="submit">Create a new seller</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>


<?php
include "footer.php";
?>
