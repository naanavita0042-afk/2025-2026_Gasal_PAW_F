<form action="formData.php" method="post">
    <label for="surname">Nama Lengkap:</label>
    <input type="text" id="surname" name="surname" value="<?php echo htmlspecialchars($surname); ?>">
    <?php if (isset($errors['surname'])) echo "<div class='error'>{$errors['surname']}</div>"; ?>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <?php if (isset($errors['email'])) echo "<div class='error'>{$errors['email']}</div>"; ?>

    <label for="url">Website (URL):</label>
    <input type="text" id="url" name="url" value="<?php echo htmlspecialchars($url); ?>">
    <?php if (isset($errors['url'])) echo "<div class='error'>{$errors['url']}</div>"; ?>

    <label for="age">Usia:</label>
    <input type="text" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>">
    <?php if (isset($errors['age'])) echo "<div class='error'>{$errors['age']}</div>"; ?>

    <label for="birth">Tanggal Lahir (dd/mm/yyyy):</label>
    <input type="text" id="birth" name="birth" value="<?php echo htmlspecialchars($birth); ?>">
    <?php if (isset($errors['birth'])) echo "<div class='error'>{$errors['birth']}</div>"; ?>

    <br><br>
    <input type="submit" value="Kirim">
</form>
