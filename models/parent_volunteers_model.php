<?php

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
    // $query = 'SELECT * FROM parents
    // 		  JOIN games
    // 		  ON parents.game = games.id;
    //           ORDER BY `id`';
    $query = 'SELECT
            parent.id as id,
            parent.first_name as first_name,
            parent.last_name as last_name,
            CONCAT(parent.first_name, " ", parent.last_name) as full_name,
            parent.email as email,
            parent.phone as phone,
            parent.child_name as child_name,
            parent.mentor as mentor,
            parent.comment as comment,
            game.name as game_name,
            game.id as game_id
        FROM parents as parent
        JOIN games as game
        ON parent.game = game.id
        ORDER BY parent.id;';
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
function assign_game($parent_volunteer_id, $game_id){
    global $db;
    $query = 'INSERT INTO games_parents_volunteers
                (game_id, parent_volunteer_id)
              VALUES
                (:game_id, :parent_volunteer_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':game_id', $game_id);
    $statement->bindValue(':parent_volunteer_id', $parent_volunteer_id);
    $statement->execute();
    $statement->closeCursor();
}
?>
