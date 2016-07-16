<?php include '../views/layouts/header.php'; ?>
<main>
	<div class="content">
    <h1>Edit Game</h1>
    <form action="." method="post" id="edit_game">
      	<input type='hidden' name='action' value='edit_game'>
        <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
        
      
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>"><br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Game" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_games">View Game List</a>
    </p>
	</div>
</main>
<?php include '../views/layouts/footer.php'; ?>