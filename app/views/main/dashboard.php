<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>

<?php 
require_once __DIR__ . '/../../../vendor/autoload.php';
use Models\Wallet;
$walletObj = new wallet();
$results = $walletObj->findByUserID($_SESSION['user_id']);

?>
<main class="main-content">
    <header>
        <div>
            <h1>Bonjour, <?= $_SESSION['user_name'] ?> 👋</h1>
            <p class="stat-label">Voici la situation de vos finances ce mois-ci.</p>
        </div>
        <button class="btn btn-primary"><i class="ri-add-line"></i> Nouvelle Dépense</button>
    </header>

    <div class="stats-grid">
        <div class="stat-card">
            <span class="stat-label">Budget Mensuel</span>
            <div class="stat-value"><?= $results['budget'] ?> MAD</div>
        </div>
        <div class="stat-card danger">
            <span class="stat-label">Total Dépensé</span>
            <div class="stat-value text-danger">3,200 MAD</div>
        </div>
        <div class="stat-card success">
            <span class="stat-label">Solde Restant</span>
            <div class="stat-value text-success">1,800 MAD</div>
        </div>
    </div>

    <div class="card">
        <h2>Dernières Dépenses</h2>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Date</th>
                    <th>Montant</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Courses Marjane</td>
                    <td>Nourriture</td>
                    <td>09 Jan 2024</td>
                    <td>450 MAD</td>
                    <td><span style="color:var(--text-muted)">Payé</span></td>
                </tr>
                <tr>
                    <td>Abonnement Netflix</td>
                    <td>Loisirs</td>
                    <td>08 Jan 2024</td>
                    <td>100 MAD</td>
                    <td><span style="color:var(--primary)">Auto</span></td>
                </tr>
                <tr>
                    <td>Facture d'eau</td>
                    <td>Logement</td>
                    <td>05 Jan 2024</td>
                    <td>120 MAD</td>
                    <td><span style="color:var(--text-muted)">Payé</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
<?php require_once "../partials/footer.php"; ?>