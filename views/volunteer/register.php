<?php include('../views/layouts/header.php'); ?>
    <main>
        <div class="content">
            <h1>Volunteer Registration</h1>
            <?php if (!empty($error_message)) { ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php } // end if ?>
            <form action="." method="post">
                <input type="hidden" name="action" value="add_parent">
                <div id="data">
                    <label>First Name:</label>
                    <input type="text" name="first_name">
                    <br>

                    <label>Last Name:</label>
                    <input type="text" name="last_name">
                    <br>

                    <label>Email:</label>
                    <input type="email" name="email">
                    <br>
                    
                    <label>Phone Number:</label>
                    <input type='tel' name="phone">
                    <br>
                    
                    <label>Child's Name:</label>
                    <input type="text" name="child_name">
                    <br>

                    <input type="checkbox" name="mentor"> I would like a staff mentor. <br>
                    
                    <label>Interested Games:</label>
                    <select name="game">
                         
                            <?php foreach ($games as $game) : ?>
                
                            <option value="<?php echo $game['id']; ?>"><?php echo $game['name']; ?></option>
                            <?php endforeach; ?>
                    </select><br>

                    <textarea name='comment' rows='4' cols='50'>Additional Comments</textarea><br>                   
                
                </div>

                <div id="buttons">
                    <label>&nbsp;</label>
                    <input type="submit" value="Register"/><br>
                </div>

            </form>
        </div>
    </main>
<?php include('../views/layouts/footer.php');?>