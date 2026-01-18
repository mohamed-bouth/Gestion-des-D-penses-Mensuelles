<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<?php 
require_once __DIR__ . '/../../../vendor/autoload.php';
use Models\Category;
$categoryObj = new Category;
$results = $categoryObj->all();
?>
<main class="main-content">
    <header>
        <h1>Gestion des Catégories</h1>
        <a href='./addCategory.php' class="btn btn-primary"><i class="ri-add-line"></i> Nouvelle Catégorie</a>
    </header>
    <div class="category-grid">
    <?php foreach ($results as $category) { ?>
    
        <div class="cat-card">
            <form action="../../Controllers/removeCategory.php" method="POST">
                <input type="hidden" name="category_id" value="<?= $category['id'] ?>">
                <button class="btn-remove-cat"><i class="ri-close-line"></i></button>
            </form>
            
            <h3><?= $category['name'] ?></h3>
            <p style="color:var(--text-muted); margin-top:5px;">12 dépenses</p>
        </div>
    
    <?php } ?>
    </div>
</main>
<?php require_once "../partials/footer.php"; ?>
