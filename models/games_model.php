<?php 
function get_games() {
    global $db;
    $query = 'SELECT * FROM games
              ORDER BY `id`';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
} 

function add_game($name) {
    global $db;
    $query = 'INSERT INTO games
                 (id, name)
              VALUES
                 (null, :name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}
function edit_game($id, $name) {
    global $db;
      $query = "UPDATE games
                SET name = :name,
                WHERE id = :id";
            
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    
}
function delete_game($id) {
    global $db;
    $query = 'DELETE FROM games
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}
?>
