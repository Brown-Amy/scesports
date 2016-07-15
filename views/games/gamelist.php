<?php include '../views/layouts/header.php'; ?>
<main>
   <div class="content"
    <section>
        <!-- display a table of games -->
        <h1>Games</h1>
        <table id="gamelist">
            <tr>
                <th class="first">Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
             
            </tr>
            <?php foreach ($games as $game) : ?>
            <tr>
                <td class="first"><?php echo $game['name']; ?></td>
                
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_game">
                    <input type="hidden" name="id"
                           value="<?php echo $game['id']; ?>">
                  
                    <input type="submit" value="Delete">
                </form></td>
                 <td><form action="." method="post">
                          <input type="hidden" name="action"
                           value="show_edit_form">
                    
                    <input type="hidden" name="name"
                           value="<?php echo $game['name']; ?>">
                   
                  
                    <input type="hidden" name="id"
                           value="<?php echo $game['id']; ?>">
                    
                    <input type="submit" value="Edit">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=add_game_form">Add Game</a></p>
              
    </section>
    </div>
</main>
<?php include '../views/layouts/footer.php'; ?>