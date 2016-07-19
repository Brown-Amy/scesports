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

function get_parents() {
    global $db;
    $query = 'SELECT * FROM parents
    		  JOIN games
    		  ON parents.game = games.id;
              ORDER BY `id`';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
} 

function delete_parent($id) {
    global $db;
    $query = 'DELETE FROM parents
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

function edit_parent($id, $first_name, $last_name, $email, $phone, $child_name, $game, $mentor, $comment) {
    global $db;
      $query = "UPDATE parents
                SET first_name = :first_name,
                    last_name = :last_name,
                    email = :email,
                    phone = :phone,
                    child_name = :child_name,
                    game = :game,
                    mentor = :mentor,
                    comment = :comment
                WHERE id = :id";

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
?>
