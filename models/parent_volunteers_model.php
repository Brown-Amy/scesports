<?php 
function get_volunteers() {
    global $db;
    $query = 'SELECT * FROM parents_volunteers
              ORDER BY `id`';
    $statement = $db->prepare($query);
    $statement->execute();
    $volunteers = $statement->fetchAll();
    return $volunteers;
} 
function get_parent($id) {
    global $db;
    $query = 'SELECT * FROM parents
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $parent = $statement->fetch();
    $statement->closeCursor();
    return $parent;
}

function delete_volunteer($id) {
    global $db;
    $query = 'DELETE FROM parents_volunteers
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

function add_parent($id, $first_name, $last_name, $email, $phone, $child_name, $game, $mentor, $comment) {
    global $db;
    $query = 'INSERT INTO parents
                 (id, first_name, last_name, email, phone, child_name, game, mentor, comment)
              VALUES
                 (:id, :first_name, :last_name, :email, :phone, :child_name, :game, :mentor, :comment)';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':child_name', $child_name);
    $statement->bindValue(':game', $game); 
    $statement->bindValue(':mentor', $mentor);
    $statement->bindValue(':comment', $comment);
    $statement->execute();
    $statement->closeCursor();
}

function edit_product($category_id, $code, $name, $price, $productID) {
    global $db;
      $query = "UPDATE products
                SET categoryID = :category_id,
                    productCode = :code,
                    productName = :name,
                    listPrice = :price
                WHERE productID = :productID";
             

      
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':productID', $productID);
        $statement->execute();
        $statement->closeCursor();
    
}
?>
