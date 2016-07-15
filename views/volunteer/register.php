<?php include('../views/layouts/header.php'); ?>
    <main>
        <div class="content">
            <h1>Volunteer Registration</h1>
            <?php if (!empty($error_message)) { ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php } // end if ?>
            <form action="." method="post">
                <input type="hidden" name="action" value="register">
                <div id="data">
                    <label>First Name:</label>
                    <input type="text" name="parentName">
                    <br>

                    <label>Last Name:</label>
                    <input type="text" name="parentName">
                    <br>

                    <label>Email:</label>
                    <input type="email" name="parentEmail">
                    <br>
                    
                    <label>Phone Number:</label>
                    <input type='tel' name="parentPhone">
                    <br>
                    
                    <label>Child's Name:</label>
                    <input type="text" name="childName">
                    <br>
                    
                    <label>Interested Games:</label>
                    <select name="games">
                         
                            <?php foreach ($games as $game) : ?>
                
                            <option value="<?php echo $game['id']; ?>"><?php echo $game['name']; ?></option>
                            <?php endforeach; ?>
                    </select><br>
                   
                          
                    <input type="checkbox" name="mentor"> I would like a staff mentor. <br>
                    
                    <label>Additional Comments:</label>
                    <input type='text' name="comments">
                    <br>
                </div>

                <div id="buttons">
                    <label>&nbsp;</label>
                    <input type="submit" value="Register"/><br>
                </div>

            </form>
        </div>
    </main>
<?php include('../views/layouts/footer.php');?>