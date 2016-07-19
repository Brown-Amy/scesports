<?php include '../views/layouts/header.php'; ?>
<main>
	<div class="content">
    <h1>Edit Parent</h1>
    <form action="." method="post" id="edit_parent">
      	<input type='hidden' name='action' value='edit_parent'>
        <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
        
       <label>First Name:</label>
                    <input type="text" name="first_name" value="<?php echo $parent['first_name']; ?>">
                    <br>

                    <label>Last Name:</label>
                    <input type="text" name="last_name" value="<?php echo $parent['last_name']; ?>">
                    <br>

                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo $parent['email']; ?>">
                    <br>
                    
                    <label>Phone Number:</label>
                    <input type='tel' name="phone" value="<?php echo $parent['phone']; ?>">
                    <br>
                    
                    <label>Child's Name:</label>
                    <input type="text" name="child_name" value="<?php echo $parent['child_name']; ?>">
                    <br>
                    
                    <input type="checkbox" name="mentor" checked="<?php $parent['mentor'] ? 'checked' : ''; ?>"> I would like to be a staff mentor. <br>
                    
                    <label>Interested Game:</label>
                    <select name="game">
                    <?php foreach ($games as $game) : ?>
                    <option value="<?php echo $game['id']; ?>" <?= $game['id']  == $parent['game'] ? 'selected' : '';?>><?php echo $game['name']; ?></option>
                            <?php endforeach; ?>
                    </select><br>

                    <textarea name='comment' rows='4' cols='50' value="<?php echo $parent['comment']; ?>">Additional Comments</textarea><br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Parent" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_parents">Cancel</a>
    </p>
	</div>
</main>
<?php include '../views/layouts/footer.php'; ?>