
<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>

</head>
<main class="main-content">
    <header>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <a href="./category.php" class="btn btn-sm" style="background: white; border: 1px solid var(--border); color: var(--text-muted);">
                <i class="ri-arrow-left-s-line"></i> Retour
            </a>
            <h1>Nouvelle Catégorie</h1>
        </div>
    </header>

    <div class="form-container">
        <div class="card">
            
            <div class="form-header">
                <div class="icon-circle">
                    <i class="ri-add-circle-fill"></i>
                </div>
                <h2>Créer une catégorie</h2>
                <p class="stat-label">Ajoutez une catégorie pour organiser vos dépenses.</p>
            </div>

            <form action="../../Controllers/addCategory.php" method="POST">
                
                <input type="hidden" name="wallet_id" value="<?= $_SESSION['wallet_id'] ?>">

                <div class="form-group">
                    <label for="category_name">Nom de la catégorie</label>
                    <input 
                        type="text" 
                        id="category_name" 
                        name="name" 
                        placeholder="Ex: Santé, Éducation, Tech..." 
                        required 
                        autofocus
                    >
                </div>

                <div class="form-actions">
                    <a href="category.php" class="btn btn-danger btn-full" style="background: white; border: 1px solid #fee2e2; text-decoration: none; display:flex;">
                        Annuler
                    </a>
                    <button type="submit" class="btn btn-primary btn-full">
                        <i class="ri-save-line"></i> Enregistrer
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>
