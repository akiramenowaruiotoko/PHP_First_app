<div class="p_page">
    <?php
    //page_name switching
    if($_POST['cart']){
        include("./atoms/c_page02.html");
    } elseif ($_POST['purchase']){
        include("./atoms/c_page03.html");
    } else {
        include("./atoms/c_page01.html");
    }
    ?> 
</div>