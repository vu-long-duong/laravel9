function handleImageUpload() {
    const imageInput = document.getElementById('imageInput');
    const previewContainer = document.getElementById('previewContainer');
    const numberOfFiles = document.getElementById('numberOfFile');

// Add an event listener to the file input
    imageInput.addEventListener('change', function(event) {
        // Clear the preview container
        previewContainer.innerHTML = '';

        // Get the selected files
        const files = event.target.files;

        // Iterate over the selected files
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            // Set up the FileReader onload event
            reader.onload = function(e) {
                // Create an img element
                const img = document.createElement('img');
                img.src = e.target.result;

                // Append the img element to the preview container
                previewContainer.appendChild(img);
            };

            // Read the file as a data URL
            reader.readAsDataURL(file);
        }
    });

}
