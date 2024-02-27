<!-- <footer class="bg-gray-800 text-white">
  <div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap">
      <div class="w-full md:w-1/3 text-center md:text-left">
        <h2 class="text-xl font-bold mb-4">Company</h2>
        <p class="mb-4">Our mission is to provide high-quality products and services that exceed our customers' expectations.</p>
        <p>&copy; 2023 Company. All rights reserved.</p>
      </div>
      <div class="w-full md:w-1/3 text-center md:text-left">
        <h2 class="text-xl font-bold mb-4">Quick Links</h2>
        <ul class="list-unstyled mb-4">
          <li><a href="#" class="text-gray-400 hover:text-gray-500 hover:underline">Home</a></li>
          <li><a href="#" class="text-gray-400 hover:text-gray-500 hover:underline">About</a></li>
          <li><a href="#" class="text-gray-400 hover:text-gray-5 -->
<script>
  document.getElementById('updateButton').addEventListener('click', function() {
    // window.location.href = 'UserHome';
    alert('You cannot edit your profile. Please contact your admin.');
  });
</script>
</body>
<script>
  function previewImage() {
    var input = document.getElementById('imageInput');
    var previewContainer = document.getElementById('imagePreviewContainer');
    var previewImage = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
      var file = input.files[0];

      // Create a FileReader object to read the file
      var reader = new FileReader();

      // Set up the FileReader onload event to display the image when loaded
      reader.onload = function(e) {
        previewImage.src = e.target.result; // Set the source of the preview image
      };

      // Read the selected file as a data URL, triggering the onload event
      reader.readAsDataURL(file);

      // Show the image preview container
      previewContainer.style.display = 'block';
    } else {
      // If no file is selected, hide the image preview container
      previewContainer.style.display = 'none';
    }
  }
</script>

</html>