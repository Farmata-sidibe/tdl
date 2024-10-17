// document.addEventListener('DOMContentLoaded', function() {
//     const loadMoreBtn = document.getElementById('load-more-btn');
//     let currentPage = 1;
//     const limit = 10; // Nombre de produits par page (tu peux l'ajuster)

//     // Fonction pour charger plus de produits via AJAX
//     // loadMoreBtn.addEventListener('click', function() {
//     //     currentPage++; // Incrémenter le numéro de page

//     //     // Effectuer une requête AJAX pour récupérer les produits
//     //     fetch(`/product?page=${currentPage}&limit=${limit}`)
//     //         .then(response => response.json())
//     //         .then(data => {
//     //             if (data.data && data.data.modes.length > 0) {
//     //                 const productContainer = document.getElementById('product-container');

//     //                 // Ajouter chaque nouveau produit
//     //                 data.data.modes.forEach(mode => {
//     //                     const productHtml = `
//     //                         <x-card-product
//     //                             image="${mode.img || ''}"
//     //                             marque="${mode.brand || ''}"
//     //                             price="${mode.price || ''}"
//     //                             title="${mode.title || ''}"
//     //                             url="${mode.link || ''}"
//     //                             titleProduct="${mode.title ? mode.title.substring(0, 20) : ''}${mode.title && mode.title.length > 20 ? '...' : ''}">
//     //                         </x-card-product>
//     //                     `;
//     //                     productContainer.innerHTML += productHtml;
//     //                 });

//     //                 // Si on atteint la dernière page, cacher le bouton
//     //                 if (currentPage >= data.totalPagesMode) {
//     //                     loadMoreBtn.style.display = 'none';
//     //                 }
//     //             } else {
//     //                 // Cacher le bouton si aucune donnée n'est retournée
//     //                 loadMoreBtn.style.display = 'none';
//     //             }
//     //         })
//     //         .catch(error => {
//     //             console.error('Error fetching more products:', error);
//     //         });
//     // });

//     loadMoreBtn.addEventListener('click', function() {
//         loadMoreBtn.textContent = "Chargement..."; // Modifier le texte du bouton
//         loadMoreBtn.disabled = true; // Désactiver le bouton pour éviter les multiples clics

//         // Effectuer la requête AJAX
//         fetch(`/product?page=${currentPage}&limit=${limit}`)
//             .then(response => response.json())
//             .then(data => {
//                 // Réactiver le bouton et modifier le texte une fois le chargement terminé
//                 loadMoreBtn.textContent = "Charger plus";
//                 loadMoreBtn.disabled = false;

//                 if (data.data && data.data.modes.length > 0) {
//                     const productContainer = document.getElementById('product-container');

//                     // Ajouter chaque nouveau produit
//                     data.data.modes.forEach(mode => {
//                         const productHtml = `
//                             <x-card-product
//                                 image="${mode.img || ''}"
//                                 marque="${mode.brand || ''}"
//                                 price="${mode.price || ''}"
//                                 title="${mode.title || ''}"
//                                 url="${mode.link || ''}"
//                                 titleProduct="${mode.title ? mode.title.substring(0, 20) : ''}${mode.title && mode.title.length > 20 ? '...' : ''}">
//                             </x-card-product>
//                         `;
//                         productContainer.innerHTML += productHtml;
//                     });

//                     // Si on atteint la dernière page, cacher le bouton
//                     if (currentPage >= data.totalPagesMode) {
//                         loadMoreBtn.style.display = 'none';
//                     }
//                 } else {
//                     // Cacher le bouton si aucune donnée n'est retournée
//                     loadMoreBtn.style.display = 'none';
//                 }
//             })
//             .catch(error => {
//                 console.error('Error fetching more products:', error);
//                 loadMoreBtn.textContent = "Erreur lors du chargement";
//             });
//     });
// });





