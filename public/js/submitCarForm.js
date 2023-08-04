function submitForm() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    const selectedValues = [];
    
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            selectedValues.push(checkbox.value);
        }
    });
    
    const groupedFeatures = selectedValues.join(',');
    
    // Add a hidden input field to the form with the grouped features value
    const form = document.querySelector('form');
    const groupedFeaturesInput = document.getElementById('features');
    groupedFeaturesInput.value = selectedValues;

    const requiredFields = document.querySelectorAll('[required]');

    let isFormValid = true;
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isFormValid = false;
        }
    })

    if (!isFormValid) {
        event.preventDefault();
        alert('Please fill out all required fields.');
    } else {
        form.submit();
    }
}