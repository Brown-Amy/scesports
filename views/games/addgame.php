<?php include '../views/layouts/header.php'; ?>
<main>
    <h1>Add Game</h1>
    <form action="index.php" method="post" id="add_game_form">
        <input type="hidden" name="action" value="add_game">


        <label>Name:</label>
        <input type="text" name="name" />
        <br>


        <label>&nbsp;</label>
        <input type="submit" value="Add Game" />
        <br>
    </form>
   	<p class="last_paragraph">
        <a href="index.php?action=list_games">View Game List</a>
    </p>

</main>
<?php include '../views/layouts/footer.php'; ?>