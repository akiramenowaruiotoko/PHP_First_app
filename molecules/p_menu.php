<?php
//get DB data
    $menuData = getMenu();
?>
<form action="index.html" method="post">
    <!--output DB data-->
    <div class="table" style="margin: 30px 0;">
        <table width="80%" height="200">
            <!--columns name-->
            <tr>
                <?php for ($col = 1; $col <= 4; $col++){ ?>
                    <th align="left"><?php include("./atoms/t_col0{$col}.html")?></th>
                <?php } ?>
            </tr>
            <!--output data-->
            <?php
                $row = 0;
                //repeat for rows
                foreach($menuData as $column): 
                $row++;
            ?>
            <tr>
                <td><input type="text" name="<?php echo 'product_name'.$row ?>" value="<?php echo $column['product_name'] ?>" readonly style="border: none;"></td>
                <td><input type="text" name="<?php echo 'origin'.$row ?>" value="<?php echo $column['origin'] ?>" readonly style="border: none;"></td>
                <td><input type="text" name="<?php echo 'price'.$row ?>" value="<?php echo $column['price'] ?>" readonly style="border: none;"></td>
                <td><input type="number" name="<?php echo 'quantity'.$row ?>" value="0" min="0" style="width: 35px;"></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
    <!--output buttons-->
    <div class="button" style="text-align: right; margin-right: 25%;">
        <?php 
            include("./atoms/button_cancel.html");
            include("./atoms/button_empty_cart.html");
            include("./atoms/button_cart.html");
        ?>
    </div>
</form>