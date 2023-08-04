selectBrand.onchange = () => {
    modelsRequest(selectBrand.value);
};

const selectModel = document.getElementById('model');

let modelsRequest = async function (make) {
    const optionModel = document.getElementsByClassName('model');

    if (optionModel) {
        Array.from(optionModel).forEach(element => {
            element.remove();
        })
    }

    const url = `https://car-data.p.rapidapi.com/cars?limit=50&page=0&make=${make}`;
    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': '69429c6d52mshbf884f8d222d712p12bb0djsne05d7c0b5898',
            'X-RapidAPI-Host': 'car-data.p.rapidapi.com'
        }
    };

    fetch(url, options)
        .then(
            response => response.json()
        )
        .then(data => {
            data.forEach(element => {
                let option = document.createElement('option');
                let model = `${element.year} ${element.make} ${element.model} ${element.type}`;
                option.id = model.split(' ').join('-');
                option.classList.add('model');
                option.value = model;
                option.textContent = model;

                selectModel.appendChild(option);
            });
        })
        .catch(error => {
            console.log('Error: ', error);
        })
}