<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "header.php";
require "config/conexion.php";

$db = conexion();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check for required fields and set default values if needed
    $id = !empty($_POST["id"]) ? $_POST["id"] : NULL;
    $title = !empty($_POST["title"]) ? $_POST["title"] : NULL;
    $price = !empty($_POST["price"]) ? $_POST["price"] : NULL;
    $image = !empty($_POST["image"]) ? $_POST["image"] : NULL;
    $description = !empty($_POST["description"]) ? $_POST["description"] : NULL;
    $rooms = !empty($_POST["rooms"]) ? $_POST["rooms"] : NULL;
    $wc = !empty($_POST["wc"]) ? $_POST["wc"] : NULL;
    $garage = !empty($_POST["garage"]) ? $_POST["garage"] : NULL;
    $timestamp = !empty($_POST["timestamp"]) ? $_POST["timestamp"] : NULL;
    $seller = !empty($_POST["seller"]) ? $_POST["seller"] : NULL;

    // Check if essential fields are not empty
    if ($title && $price && $description && $rooms && $wc && $garage && $timestamp && $seller) {
        // Use prepared statements to prevent SQL injection
        $stmt = $db->prepare("INSERT INTO propierties (id, title, price, image, description, rooms, wc, garages, timestamp, id_seller) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isissiiisi", $id, $title, $price, $image, $description, $rooms, $wc, $garage, $timestamp, $seller);

        if ($stmt->execute()) {
            echo "Property created correctly";
        } else {
            echo "Property not created";
        }

        $stmt->close();
    } else {
        echo "Please fill in all required fields.";
    }
}
?>

<section>
    <h2>Properties Form</h2>
    <div>
        <form action="createProperties.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Fill all the form fields</legend>
                <div>
                    <label for="id">ID</label>
                    <input type="number" name="id" id="id">
                </div>
                <div>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Property Title">
                </div>
                <div>
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price">
                </div>
                <div>
                    <label for="image">Image</label>
                    <input type="file" accept="image/*" id="image" name="image">
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea name="description" id="description"></textarea>
                </div>
                <div>
                    <label for="rooms">Rooms</label>
                    <input type="number" name="rooms" id="rooms">
                </div>
                <div>
                    <label for="wc">WC</label>
                    <input type="number" name="wc" id="wc">
                </div>
                <div>
                    <label for="garage">Garage</label>
                    <input type="number" name="garage" id="garage">
                </div>
                <div>
                    <label for="timestamp">Timestamp</label>
                    <input type="date" name="timestamp" id="timestamp">
                </div>
                <div>
                    <label for="seller">Seller</label>
                    <input type="number" name="seller" id="seller">
                </div>
                <div>
                    <button type="submit">Create a new property</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>


<?php
include "footer.php";
?>