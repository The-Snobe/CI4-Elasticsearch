<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement des profession</title>
</head>
<body>
<h1>Enregistrement des promotions</h1>

<?php echo form_open('save-promotion'); ?>
    <label for="promotion">Promotion :</label>
    <input type="text" name="promotion" id="promotion" required>
    <br><br>
    <input type="submit" value="Enregistrer">
<?php echo form_close(); ?>
</body>
</html>