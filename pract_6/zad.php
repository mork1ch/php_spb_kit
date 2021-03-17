    Здравствуйте, <?php echo htmlspecialchars($_POST['lname']); echo " "; echo htmlspecialchars($_POST['fname']); echo " "; echo htmlspecialchars($_POST['tname']); ?>.
    <br>
    Ваш телефон <?php echo (int)$_POST['telephone']; ?>
    <br>
    Ваш email <?php echo htmlspecialchars($_POST['email']); ?>