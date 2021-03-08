<div class="products" style="padding-top: 50px;">
    <a href="/product/new-product">Добавить новый товар!</a>
    <p>Все товары:</p>
    <div class="products-table">
        <table id="products" class="tablesorter-blue">
            <thead>
            <tr>
                <th class="sorter-false">Картинка</th>
                <th>Название</th>
                <th>Пользователь</th>
                <th>Кол-во отзывов</th>
                <th>Дата добавления</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($products as $product):
                ?>
                <tr>
                    <td><img alt src="<?= $product[0]->getImage()?>" width="50" height="50"></td>
                    <td>
                        <a href = "/product/info/<?= $product[0]->getId();?>">
                            <?= $product[0]->getName();?>
                        </a>
                    </td>
                    <td><?= $product[0]->getUserName();?></td>
                    <td><?= $product['review_count'];?></td>
                    <td><?= $product[0]->getCreationDate()?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>