<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Client</title>
    <!-- Ajoutez le lien vers le CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Produits</h1>
        
        <!-- Formulaire pour ajouter un nouveau produit -->
        <h2 class="mb-3">Ajouter un nouveau produit</h2>
        <form method="POST" id="add-product-form" action="http://127.0.0.1:8000/api/add-product">
            @csrf
            <div class="mb-3">
                <label for="product-name" class="form-label">Nom du produit</label>
                <input name="designation" type="text" class="form-control" id="product-name" required>
            </div>
            <div class="mb-3">
                <label for="product-category" class="form-label">Catégorie du produit</label>
                <input name="categorie_id" type="text" class="form-control" id="product-category" required>
            </div>
            <button type="submit" class="btn btn-success">Ajouter produit</button>
        </form>

        <!-- Tableau pour afficher les produits -->
        <h2 class="mt-4">Liste des produits</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Catégorie</th>
                </tr>
            </thead>
            <tbody id="products-list">
                <!-- Les résultats seront ajoutés ici -->
            </tbody>
        </table>
    </div>
<script src="{{ asset('api_js/affichage.js') }}"></script>
    <script>
        // Ajout d'un événement pour gérer la soumission du formulaire
        const addProductForm = document.getElementById('add-product-form');
        addProductForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const productNameInput = document.getElementById('product-name');
            const productCategoryInput = document.getElementById('product-category');

            const productName = productNameInput.value;
            const productCategory = productCategoryInput.value;

            // Envoi d'une requête POST à l'API pour ajouter un nouveau produit
            axios.post('http://127.0.0.1:8002/api/add-product', {
                designation: productName,
                categorie_id: productCategory
            })
            .then(response => {
                // Ajout de la nouvelle ligne au tableau avec les données de la réponse
                const newRow = document.createElement('tr');
                const productIdCell = document.createElement('td');
                const productNameCell = document.createElement('td');
                const productCategoryCell = document.createElement('td');

                productIdCell.textContent = response.data.id;
                productNameCell.textContent = response.data.designation;
                productCategoryCell.textContent = response.data.categorie_id;

                newRow.appendChild(productIdCell);
                newRow.appendChild(productNameCell);
                newRow.appendChild(productCategoryCell);
                productsList.appendChild(newRow);
                // Réinitialisation des champs du formulaire
                
                productNameInput.value = '';
                productCategoryInput.value = '';
            })
            .catch(error => {
                console.error('Une erreur s\'est produite lors de l\'ajout du produit:', error);
            });
        });
    </script>
</body>
</html>