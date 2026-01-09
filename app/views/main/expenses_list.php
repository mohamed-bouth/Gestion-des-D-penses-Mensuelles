<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<main class="main-content">
    <header>
        <h1>Mes Dépenses</h1>
    </header>

    <div class="card">
        <h2>Ajouter une dépense</h2>
        <form style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr auto; gap: 10px; align-items: end;">
            <div class="form-group">
                <label>Titre</label>
                <input type="text" placeholder="Ex: Café">
            </div>
            <div class="form-group">
                <label>Montant (MAD)</label>
                <input type="number" placeholder="0.00">
            </div>
            <div class="form-group">
                <label>Catégorie</label>
                <select>
                    <option>Nourriture</option>
                    <option>Transport</option>
                    <option>Loisirs</option>
                </select>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Essence Shell</td>
                    <td>Transport</td>
                    <td><strong>300 MAD</strong></td>
                    <td>10 Jan 2024</td>
                    <td>
                        <button class="btn btn-sm btn-danger"><i class="ri-delete-bin-line"></i></button>
                    </td>
                </tr>
                    <tr>
                    <td>Loyer Appartement <span style="font-size:0.8em; background:#e0e7ff; padding:2px 5px; border-radius:4px; color:var(--primary)">Auto</span></td>
                    <td>Loyer</td>
                    <td><strong>1500 MAD</strong></td>
                    <td>01 Jan 2024</td>
                    <td>
                        <button class="btn btn-sm btn-danger"><i class="ri-delete-bin-line"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
<?php require_once "../partials/footer.php"; ?>