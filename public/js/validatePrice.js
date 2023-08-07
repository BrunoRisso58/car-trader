function validatePrice(input) {
    // Remove any non-numeric characters
    let formattedPrice = input.value.replace(/[^0-9]/g, '');

    formattedPrice = new Intl.NumberFormat('en-US').format(formattedPrice);
  
    // Set the formatted value back to the input field
    input.value = formattedPrice;
  }
  