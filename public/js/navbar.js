function showOptions(id) {
    const options = document.querySelector(`#${id}`);

    if (Array.from(options.classList).includes('hidden')) {
        options.classList.remove('hidden');
    } else {
        options.classList.add('hidden');
    }
}