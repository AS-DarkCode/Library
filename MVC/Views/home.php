<header class="text-center py-16">
  <h3 class="text-5xl font-bold">Welcome to the Library Management System</h3>
  <p class="text-gray-600">Find, reserve, and manage books with ease.</p>
</header>
<main class="px-4">
  <?php
  foreach ($getHomeBook as $HomeBook) {
    // echo "<pre>"; print_r($getHomeBook); exit();

  ?>
    <section class="mb-8">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Latest Books</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-white rounded-lg shadow-lg p-4">
          <img src="books/<?php echo $HomeBook->cover_image; ?>" alt="Book cover" class="w-full h-48 object-cover rounded-lg mb-4">
          <h3 class="text-xl font-bold text-gray-800 mb-2"><?php echo $HomeBook->book_name; ?></h3>
          <p class="text-gray-600 mb-4"><?php echo $HomeBook->author_name; ?></p>
          <a href="books/<?php echo $HomeBook->file ?>" target="_blank"><button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700">View</button></a>
        </div>
      </div>
    </section>
    
  <?php
  }
  ?>
</main>
<section class="p-5 mb-10">
<h2 class="text-3xl font-bold text-gray-800 mb-4">About Us</h2>
<p class="text-gray-600">Welcome to our Library Project! We are dedicated to fostering knowledge and accessibility. Our platform seamlessly manages books, enhances user experience, and promotes a love for reading. Join us on this journey of exploration and learning.</p>
<p class="text-gray-600 mb-10">If you have any questions or suggestions, please don't hesitate to contact us at <a href="mailto:library@example.com" class="text-blue-500">akashshar985@gmail.com</a>.</p>
</section>
</body>

</html>