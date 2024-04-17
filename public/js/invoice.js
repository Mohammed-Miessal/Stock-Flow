let total = [];
let products = [];

const productInput = document.getElementById('product-input');

document.addEventListener('DOMContentLoaded', function () {
    const addProductBtn = document.querySelector('.add-product-btn');

    addProductBtn.addEventListener('click', function (event) {
        event.preventDefault();

        const productID = document.getElementById('select-product').value;
        const productName = productNames[productID];
        const quantity = document.getElementsByName('quantity')[0].value;
        const price = productPrices[productID];
        const total_price = (quantity * price).toFixed(2);
        const productInput = document.getElementById('product-input');

        total.push(total_price);
        products.push({
            product_id: productID,
            quantity: quantity,
            total: total_price
        });


        productInput.value = JSON.stringify(products);


        const newRowHtml = `
        <tr class="border-b border-slate-200">
        <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
            <div class="font-medium dark:text-gray-400">${productName}</div>
        </td>
        <td class="px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">${quantity}</td>
        <td class="px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">${price}</td>
        <td class="px-3 py-4 text-sm text-right text-slate-500 sm:table-cell"></td>
        <td class="py-4 pl-3 pr-4 text-sm text-right text-gray-400 sm:pr-6 md:pr-0">${total_price}</td>
        <td class="py-4 pl-3 pr-4 text-sm text-right text-gray-400 sm:pr-6 md:pr-0">
            <button class="remove-product-btn text-red-500" data-index="${total.length - 1}">Remove</button>
        </td>
        </tr>
        `;

        const productTable = document.querySelector('.product-table');
        productTable.insertAdjacentHTML('beforeend', newRowHtml);

        document.getElementById('select-product').value = '';
        document.getElementsByName('quantity')[0].value = '';

        updateTotal();
    });

    // Ajouter un écouteur d'événements de suppression pour le bouton supprimer
    const productTable = document.querySelector('.product-table');
    productTable.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-product-btn')) {
            const button = event.target;
            const index = parseInt(button.getAttribute('data-index'));
            const price = parseFloat(button.parentNode.previousElementSibling.textContent);
            total.splice(index, 1);

            const row = button.closest('tr');
            row.parentNode.removeChild(row);

            updateTotal();
        }
    });


});

function updateTotal() {
    const totalCellFooter1 = document.querySelector('.total-cell1');
    const totalCellFooter2 = document.querySelector('.total-cell2');
    const totalInput = document.querySelector('input[name="total"]');
    const totalValue = total.reduce((acc, curr) => parseFloat(acc) + parseFloat(curr), 0).toFixed(2);
    totalInput.value = totalValue;
    totalCellFooter1.textContent = totalValue + ' DH';
    totalCellFooter2.textContent = totalValue + ' DH';
}

// Ajouter un écouteur d'événements de suppression pour le bouton supprimer
const productTable = document.querySelector('.product-table');
productTable.addEventListener('click', function (event) {
    if (event.target.classList.contains('remove-product-btn')) {
        const button = event.target;
        const index = parseInt(button.getAttribute('data-index'));
        const price = parseFloat(button.parentNode.previousElementSibling.textContent);
        total.splice(index, 1);
        products.splice(index, 1); // Supprimer le produit de la liste des produits

        const row = button.closest('tr');
        row.parentNode.removeChild(row);

        updateTotal();

        // Mettre à jour la valeur de l'input product-input après avoir supprimé un produit
        productInput.value = JSON.stringify(products);
    }
});