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
?>
