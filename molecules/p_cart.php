<?php

//keep variable
session_start();

//repeat for columuns and data storage
for($row = 1; $row <= intdiv(count($_POST), 4); $row++){
    //if cart is not null
    if(isset($_SESSION["cart"])){
        $array=$_SESSION["cart"];
        //if quantity more than 0 add product
        if($_POST["quantity{$row}"] > 0){
            //get the key and value by specifying the key form the $array then substitution product_name in an $array_product_name
            $array_product_name = array_column( $array, "product_name");
            //if the same item already included in the cart
            if(in_array($_POST["product_name{$row}"], $array_product_name)){
                //substitution arrayNo in a $index
                $index = array_search($_POST["product_name{$row}"], $array_product_name);
                //add quantity
                $array[$index]["quantity"] += $_POST["quantity{$row}"];
            //if different products are added
            }else{
                //soter key and value an $array
                $array[] = [
                    "product_name" => $_POST["product_name{$row}"] ,
                    "origin" => $_POST["origin{$row}"] ,
                    "price" => $_POST["price{$row}"] ,
                    "quantity" => $_POST["quantity{$row}"]
                ];
            }
        }
    //if first add in cart 
    }else{
        //store key and value in an $array
        $array[] = [
            "product_name" => $_POST["product_name{$row}"] ,
            "origin" => $_POST["origin{$row}"] ,
            "price" => $_POST["price{$row}"] ,
            "quantity" => $_POST["quantity{$row}"]
        ];
    }
    //store array in session["cart"]
    $_SESSION["cart"] = $array;
}
?>

<form action="index.html" method="post">
    <div class="table" style="margin: 30px 0;">
        <table width="80%" height="200">
            <!--columns name-->
            <tr>
                <?php for ($col = 1; $col <= 4; $col++){ ?>
                    <th align="left"><?php include("./atoms/t_col0".$col.".html")?></th>
                <?php } ?>
            </tr>
            <!--output data-->
            <?php
                $sum = 0;
                for($row = 0; $row < count($array); $row++){
                    //add price * quantity in a $sum
                    $sum += $array[$row]["price"] * $array[$row]["quantity"];
            ?>
            <tr>
                <!--output columns-->
                <td><?php echo $array[$row]["product_name"] ?></td>
                <td><?php echo $array[$row]["origin"] ?></td>
                <td><?php echo $array[$row]["price"] ?></td>
                <td><?php echo $array[$row]["quantity"] ?></td>
            </tr>
            <?php
                };
                echo "合計金額は{$sum}円です。";
            ?>
        </table>
    </div>
    <!--output buttons-->
    <div class="button" style="text-align: right; margin-right: 25%;">
        <?php 
            include("./atoms/button_continue.html");
            if($sum > 0){
                include("./atoms/button_empty_cart.html");
                include("./atoms/button_purchase.html");
            }
        ?>
    </div>
</form>