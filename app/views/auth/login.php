<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../../assets/css/login.css">
</head>
<body>

    <div class="login-wrapper">
        <div class="login-card">
            
            <div class="card-header">
                <h3>Connexion</h3>
            </div>

            <div class="card-body">
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert error">
                        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert success">
                        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="../../Controllers/login_action.php">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-input" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-input" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn-submit">Se connecter</button>
                </form>
                
                <div class="login-footer">
                    <p>Pas de compte ? <a href="./register.php">Créer un compte</a></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>