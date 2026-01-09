<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>

<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use Repositories\UserRepository;
$userRepo = new UserRepository();
$results = $userRepo->findByEmail($_SESSION['user_email']);
?>
<main class="main-content">
    <header>
        <h1>Paramètres du compte</h1>
    </header>

    <div style="max-width: 600px;">
        <div class="card" style="border: 1px solid var(--primary);">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                <h2 style="margin:0; color:var(--primary);">Budget Mensuel</h2>
                <i class="ri-money-dollar-circle-line" style="font-size:1.5rem; color:var(--primary);"></i>
            </div>
            <p class="stat-label" style="margin-bottom:1rem;">Définissez votre limite de dépenses pour ce mois.</p>
            <form>
                <div class="form-group">
                    <label>Montant du budget (MAD)</label>
                    <div style="display:flex; gap:10px;">
                        <input type="number" value="<?= $results['id'] ?>">
                        <button class="btn btn-primary">Mettre à jour</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card">
            <h2>Informations Personnelles</h2>
            <form>
                <div class="form-group">
                    <label>Nom complet</label>
                    <input type="text" value="Utilisateur Test">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="user@example.com">
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" placeholder="Changer mot de passe">
                </div>
                <button class="btn btn-primary" style="background-color:var(--text-main)">Sauvegarder</button>
            </form>
        </div>
    </div>
</main>
<?php require_once "../partials/footer.php"; ?>