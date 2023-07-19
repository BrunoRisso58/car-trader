let brandsRequest = async function () {
    const url = 'https://car-data.p.rapidapi.com/cars/makes';
    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': '69429c6d52mshbf884f8d222d712p12bb0djsne05d7c0b5898',
            'X-RapidAPI-Host': 'car-data.p.rapidapi.com'
        }
    };

    const selectBrand = document.getElementById('brand');

    fetch(url, options)
        .then(
            response => response.json()
        )
        .then(data => {
            data.forEach(element => {
                let option = document.createElement('option');
                option.id = element.split(" ").join("");
                option.value = element;
                option.textContent = element;

                selectBrand.appendChild(option);
            });
        })
        .catch(error => {
            console.log('Error: ', error);
        })

}

brandsRequest();