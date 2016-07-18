<?php include '../views/layouts/header.php'; ?>
<main>
   <div class="content"
    <section>
        <!-- display a table of games -->
        <h1>Games</h1>
        <table id="gamelist">
            <tr>
                <th class="first">Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Child Name</th>
                <th>Game</th>
                <th>Mentor</th>
                <th>Comments</th>

            </tr>
            <?php foreach ($parents as $parent) : ?>
            <tr>
                <td class="first"><?php echo $parent['first_name']; ?></td>
                <td><?php echo $parent['last_name']; ?></td>

                <td><?php echo $parent['email']; ?></td>
                <td><?php echo $parent['phone']; ?></td>
                <td><?php echo $parent['child_name']; ?></td>
                <td><?php echo $mentor_request; ?></td>
                <td><?php echo $parent['game']; ?></td>
                <td><?php echo $parent['comments']; ?></td>
                
                 <td><form action="." method="post">
                          <input type="hidden" name="action"
                           value="show_edit_form">
                    
                    <input type="hidden" name="name"
                           value="<?php echo $game['name']; ?>">
                   
                  
                    <input type="hidden" name="id"
                           value="<?php echo $game['id']; ?>">
                    
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_game">
                    <input type="hidden" name="id"
                           value="<?php echo $game['id']; ?>">
                  
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=add_game_form">Add Game</a></p>
              
    </section>
    </div>
</main>
<?php include '../views/layouts/footer.php'; ?>