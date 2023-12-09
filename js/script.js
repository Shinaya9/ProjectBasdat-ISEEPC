// Sample JavaScript code to generate a list of laptops
document.addEventListener('DOMContentLoaded', function() {
    const laptopList = document.querySelector('.laptop-list');

    // Sample laptop data (you can fetch from a server)
    const laptops = [
        { name: 'Laptop 1', price: 699.99, image: 'laptop1.jpg' },
        { name: 'Laptop 2', price: 849.99, image: 'laptop2.jpg' },
        { name: 'Laptop 3', price: 999.99, image: 'laptop3.jpg' },
        // Add more laptop data here
    ];

    laptops.forEach(laptop => {
        const laptopCard = document.createElement('div');
        laptopCard.classList.add('laptop-card');
        laptopCard.innerHTML = `
            <img src="${laptop.image}" alt="${laptop.name}">
            <h2>${laptop.name}</h2>
            <p>$${laptop.price.toFixed(2)}</p>
            <button>Add to Cart</button>
        `;
        laptopList.appendChild(laptopCard);
    });
});
