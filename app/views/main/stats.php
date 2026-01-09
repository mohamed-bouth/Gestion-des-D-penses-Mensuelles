<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<main class="main-content">
    <header>
        <h1>Analyse des dépenses</h1>
        <select style="width: 200px;">
            <option>Janvier 2024</option>
            <option>Février 2024</option>
        </select>
    </header>

    <div class="card">
        <h2>Répartition par Catégorie</h2>
        <br>
        
        <div style="margin-bottom: 1.5rem;">
            <div style="display:flex; justify-content:space-between;">
                <span><i class="ri-restaurant-line"></i> Nourriture</span>
                <strong>45% (1,440 MAD)</strong>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 45%; background-color: #f59e0b;"></div>
            </div>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <div style="display:flex; justify-content:space-between;">
                <span><i class="ri-home-4-line"></i> Loyer</span>
                <strong>30% (1,500 MAD)</strong>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 30%; background-color: #4f46e5;"></div>
            </div>
        </div>

            <div style="margin-bottom: 1.5rem;">
            <div style="display:flex; justify-content:space-between;">
                <span><i class="ri-car-line"></i> Transport</span>
                <strong>15% (480 MAD)</strong>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 15%; background-color: #10b981;"></div>
            </div>
        </div>

            <div style="margin-bottom: 1.5rem;">
            <div style="display:flex; justify-content:space-between;">
                <span><i class="ri-gamepad-line"></i> Loisirs</span>
                <strong>10% (320 MAD)</strong>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 10%; background-color: #ef4444;"></div>
            </div>
        </div>
    </div>
</main>
<?php require_once "../partials/footer.php"; ?>
