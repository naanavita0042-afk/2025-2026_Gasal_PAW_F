<form action="formData.php" method="post">
    <label for="surname">Masukkan Nama (Surname):</label><br>
    <input type="text" id="surname" name="surname"
            value="<?php echo htmlspecialchars($surname); ?>">
    <?php if (isset($errors['surname'])) echo "<div class='error'>{$errors['surname']}</div>"; ?>
    <br><br>

    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"
           value="<?php echo htmlspecialchars($email); ?>">
    <?php if (isset($errors['email'])) echo "<div class='error'>{$errors['email']}</div>"; ?>
    <br><br>

    <label for="age">Usia:</label><br>
    <input type="text" id="age" name="age"
           value="<?php echo htmlspecialchars($age); ?>">
    <?php if (isset($errors['age'])) echo "<div class='error'>{$errors['age']}</div>"; ?>
    <br><br>
    
    <input type="submit" value="Submit">
</form>
