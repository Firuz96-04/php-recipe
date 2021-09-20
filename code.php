<?php
include('dbcon.php');

if (isset($_POST["update_recipe"])) {
    $key = $_POST['key'];

    $ingredient = $_POST['ingredient'];
    $get_old = $database->getReference('recipe')->getChild($key)->getValue();
    $updateData = [
        'ingredient' => $ingredient . " " . $get_old['ingredient']
    ];
    $ref_tables = 'recipe/' . $key;

    $update_query = $database->getReference($ref_tables)->update($updateData);
    if ($update_query) {
        header("Location: index.php");
    }
}

if (isset($_POST["add_recipe"])) {
    $name = $_POST['name'];
    $ingredient = $_POST['ingredient'];
    $postData = [
        'name' => $name,
        'ingredient' => $ingredient
    ];
    $ref_table = "recipe";
    $result = $database->getReference($ref_table)->push($postData);
    if ($result) {
        header('Location: index.php');
    }
}

if ($_POST['delete_btn']) {
    $del_id = $_POST['delete_btn'];
    $ref_tables = 'recipe/' . $del_id;
    $resultquery = $database->getReference($ref_tables)->remove();

    if ($resultquery) {
        header("Location: index.php");
    }

}


?>