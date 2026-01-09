<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<main class="main-content">
    <header>
        <h1>Gestion des Catégories</h1>
        <button class="btn btn-primary"><i class="ri-add-line"></i> Nouvelle Catégorie</button>
    </header>

    <div class="category-grid">
        <div class="cat-card">
            <button class="btn-remove-cat"><i class="ri-close-line"></i></button>
            <div class="cat-icon"><i class="ri-restaurant-line"></i></div>
            <h3>Nourriture</h3>
            <p style="color:var(--text-muted); margin-top:5px;">12 dépenses</p>
        </div>

        <div class="cat-card">
            <button class="btn-remove-cat"><i class="ri-close-line"></i></button>
            <div class="cat-icon"><i class="ri-car-line"></i></div>
            <h3>Transport</h3>
            <p style="color:var(--text-muted); margin-top:5px;">5 dépenses</p>
        </div>

        <div class="cat-card">
            <button class="btn-remove-cat"><i class="ri-close-line"></i></button>
            <div class="cat-icon"><i class="ri-home-4-line"></i></div>
            <h3>Loyer</h3>
            <p style="color:var(--text-muted); margin-top:5px;">1 dépense</p>
        </div>

        <div class="cat-card" style="border-style: dashed; display:flex; align-items:center; justify-content:center; cursor:pointer;">
            <span style="color:var(--primary); font-weight:600;">+ Ajouter</span>
        </div>
    </div>
</main>
<?php require_once "../partials/footer.php"; ?>
