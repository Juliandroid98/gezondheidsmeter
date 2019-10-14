<?php
/**
 * Created by PhpStorm.
 * User: TGumm
 * Date: 14-10-2019
 * Time: 11:43 AM
 */
include 'Connection.php';
class getDrinksFoodData
{
    function getDrinksData(){

        $sql = "SELECT naam FROM drinken";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo " ";
            }
        } else {
            echo "0 results";
        }
    }
}