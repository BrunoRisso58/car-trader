function validateCellphone(input) {
  // Remove any non-numeric characters
  let formattedPrice = input.value.replace(/[^0-9\s]/g, '');

  // Set the formatted value back to the input field
  input.value = formattedPrice;
}
