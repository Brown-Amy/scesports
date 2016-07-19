<?php include '../views/layouts/header.php'; ?>
<main>
   <div class="content"
    <section>
        <!-- display a table of parents -->
        <h1>parents</h1>
        <table id="parentlist">
            <tr>
                <!-- <th class="first">First Name</th>
                <th>Last Name</th> -->
                <th class="first">Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Child Name</th>
                <th>Mentor</th>
                <th>Game</th>
                <th>Comments</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>

            </tr>
            <?php foreach ($parents as $parent) : ?>
            <tr>
                <td class="first"><?php echo $parent['full_name']; ?></td>

                <!-- <td><?php echo $parent['last_name']; ?></td> -->

                <td><?php echo $parent['email']; ?></td>
                <td><?php echo $parent['phone']; ?></td>
                <td><?php echo $parent['child_name']; ?></td>
                <td><?php echo $parent['mentor'] == 1?'yes': 'no'; ?></td>
                <td><?php echo $parent['game_name']; ?></td>
                <td><?php echo $parent['comment']; ?></td>

                 <td><form action="." method="post">
                          <input type="hidden" name="action"
                           value="show_edit_form">

                    <input type="hidden" name="id"
                           value="<?php echo $parent['id']; ?>">

                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_parent">
                    <input type="hidden" name="id"
                           value="<?php echo $parent['id']; ?>">

                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=add_parent_form">Add parent</a></p>

    </section>
    </div>
</main>
<?php include '../views/layouts/footer.php'; ?>