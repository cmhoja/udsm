<?php
use yii\helpers\Html;
?>

<h5 style="clear: both;float: left;">Menu Items</h5>
<?php
if (isset($menu_items) && is_array($menu_items)) {
    ?>
    <table class="item" style="width:auto; min-width:60%;max-width:90%; float: left;clear: both; border: 1px solid black;">  
        <tr> 
            <td style="border: 1px solid black;padding-left: 1%">#</td> 
            <td style="border: 1px solid black;padding-left: 1%">Menu Item Name</td> 
            <td style="border: 1px solid black;padding-left: 1%"> Destination Link/Url</td> 
            <td style="border: 1px solid black;padding-left: 1%">Parent Name</td>  
            <td style="border: 1px solid black;padding-left: 1%">List Order</td> 
            <td style="border: 1px solid black;padding-left: 1%">Options</td>  
        </tr>  

        <?php
        $i = 1;
        foreach ($menu_items as $menu_item) {
            ?>
            <tr style="border: 1px solid black;"> 
                <td style="border: 1px solid black;padding-left: 1%"><?php echo $i++; ?></td> 
                <td style="border: 1px solid black;padding-left: 1%"><?php echo $menu_item->ItemNameEn; ?></td> 
                <td style="border: 1px solid black;padding-left: 1%"><?php echo $menu_item->LinkUrl; ?></td> 
                <td style="border: 1px solid black;padding-left: 1%"><?php echo $menu_item->ParentItemID; ?></td>  
                <td style="border: 1px solid black;padding-left: 1%"><?php echo $menu_item->ListOrder; ?></td>  
                <td style="border: 1px solid black;padding-left: 1%">
                <?php
                $confirm= 'Are you sure you want to do this item?';
                ?>
                <?= Html::a('Update', ['edit-item', 'id' => $menu_item->Id], ['class' => 'btn btn-primary','data' => [
                    'confirm' => $confirm,'method' => 'post'],]) ?>  
                    <?= Html::a('Delete', ['delete-item', 'id' => $menu_item->Id], ['class' => 'btn btn-danger','data' => [
                    'confirm' => $confirm,'method' => 'post']]) ?>
                </td>  
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
?>

