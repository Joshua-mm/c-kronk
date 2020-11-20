<h1>Sign Up</h1>
<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <div class="alerta-ok">Registration completed successfully</div>
<?php endif; ?>
    
<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <div class="alerta-error">There was an error completing registration</div>
<?php endif; ?>
<form action="http://localhost/music-chord/usuario/save" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="lastname" placeholder="Last name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <label for="about">About me</label>
    <textarea name="about"></textarea>
    <label for="img">Picture</label>
    <input type="file" name="img" placeholder="Picture" value="picture">
    <br><br>
    <input type="submit" value="Sign up">
</form>
    
<?php Utils::delete_session('register')?>
<?php Utils::delete_session('error')?>