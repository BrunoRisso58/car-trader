function previewImage(event, measure, roundOption) {
    const input = event.target;
    const imagePreview = document.getElementById("image-preview");

    for (const child of imagePreview.children) {
        child.remove();
    }

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            let img = document.createElement('img');
            img.src = e.target.result;
            img.classList.add('mx-auto', `h-${measure}`, `w-${measure}`, 'object-cover', 'm-4', `rounded-${roundOption}`);
            imagePreview.append(img);
        };
        reader.readAsDataURL(input.files[0]);
    }
}