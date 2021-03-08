<div class="products" style="padding-top: 50px;">
    <a href="/home/add-product">Добавить новый товар!</a>
    <p>Все товары:</p>
    <div class="products-table">
        <table border="1" cellspacing="0" cellpadding="15" width="100%">

            <?php
            foreach ($products as $product):
                ?>
                <tr>
                    <td><img alt src="<?= $product->getImage()?>" width="50" height="50"></td>
                    <td><?= $product->getName();?></td>
                    <td><?= $product->getUserName();?></td>
                    <td>0</td> <!--GET REVIEW COUNT FROM DB-->
                    <td><?= date_format($product->getCreationDate(), 'Y-m-d H:i:s');?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>