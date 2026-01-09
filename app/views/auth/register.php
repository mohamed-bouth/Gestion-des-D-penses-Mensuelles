<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="../../../assets/css/register.css">
</head>
<body>

    <div class="login-wrapper">
        <div class="login-card">
            
            <div class="card-header">
                <h3>Créer un compte</h3>
            </div>

            <div class="card-body">
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert error">
                        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="../../Controllers/register_action.php">
                    <div class="form-group">
                        <label for="name">Nom complet</label>
                        <input type="text" class="form-input" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-input" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-input" id="password" name="password" required minlength="6">
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirmer le mot de passe</label>
                        <input type="password" class="form-input" id="confirm_password" name="confirm_password" required>
                    </div>

                    <button type="submit" class="btn-submit btn-green">Créer le compte</button>
                </form>
                
                <div class="login-footer">
                    <p>Déjà un compte ? <a href="login.php">Se connecter</a></p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>