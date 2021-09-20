<?php
include_once("./includes/header.php")
?>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Рецепты блюд</h4>
                        <button class="btn btn-primary" id="add">+</button>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Код</th>
                                    <th>Рецепт</th>
                                    <th>Ингредиент</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                include('dbcon.php');
                                $ref_table = 'recipe';
                                $fetch_data = $database->getReference($ref_table)->getValue();
                                $i = 1;
                                if ($fetch_data > 0) {
                                    foreach ($fetch_data as $key => $row) {
                                        ?>
                                        <tr>

                                            <td><?= $i++; ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['ingredient'] ?></td>
                                            <td>
                                                <div style="display: flex;align-items: center; justify-content: center;">
                                                    <button data-kod="<?= $key ?>" class="btn btn-warning editBtn m-1">
                                                        Редактировать
                                                    </button>

                                                    <form action="code.php" method="post">
                                                        <button type="submit" name="delete_btn" value="<?= $key ?>"
                                                                class="btn btn-danger">Удалить
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php

                                    }
                                } else {
                                    ?>
                                    <tr col="4">
                                        <td>нет записей</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php
include_once("./includes/footer.php")
?>