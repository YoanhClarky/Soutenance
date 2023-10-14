// Effectuer une requête GET vers l'API pour récupérer les produits existants
axios.get('http://127.0.0.1:8002/api/hello')
            .then(response => {
                const products = response.data;

                const productsList = document.getElementById('products-list');
                products.forEach(product => {
                    const row = document.createElement('tr');
                    const productIdCell = document.createElement('td');
                    const productNameCell = document.createElement('td');
                    const productCategoryCell = document.createElement('td');

                    productIdCell.textContent = id;
                    productNameCell.textContent = product.nom;
                    productCategoryCell.textContent = product.cat.categorie;

                    row.appendChild(productIdCell);
                    row.appendChild(productNameCell);
                    row.appendChild(productCategoryCell);
                    productsList.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Une erreur s\'est produite lors de la récupération des produits:', error);
            });
            
