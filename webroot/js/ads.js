document.addEventListener('DOMContentLoaded', function() {
    const apiUrl = 'http://localhost/Ads/ads/api'; 

    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error de red: ' + response.status + ' ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            const adsContainer = document.getElementById('ads-container');
            data.forEach(ad => {
                const adElement = document.createElement('div');
                adElement.style.marginBottom = '10px';

                // Corrección: Usar correctamente la interpolación de cadenas y concatenación
                adElement.innerHTML = `
                    
                    <a href="${ad.link}">
                        <img src="${ad.image_url}" alt="${ad.description}" style="max-width: 100px; height: auto;">
                    </a>
                    <h3>${ad.description}</h3>

                `;

                adsContainer.appendChild(adElement);
            });

            // Mejor manejo de la descarga: se usa un enlace invisible y temporal
            const downloadButtons = document.querySelectorAll('.download-ad');
            downloadButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const description = button.dataset.description;
                    const imageUrl = button.dataset.imageUrl;
                    const link = document.createElement('a');
                    link.href = imageUrl;
                    link.download = `${description}.jpg`;
                    link.style.display = 'none'; //Oculta el enlace
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                });
            });
        })
        .catch(error => {
            const errorElement = document.createElement('p');
            errorElement.textContent = 'Error al cargar los anuncios: ' + error.message;
            errorElement.style.color = 'red';
            document.getElementById('ads-container').appendChild(errorElement);
        });
});