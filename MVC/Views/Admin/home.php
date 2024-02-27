<header class="text-center py-16">
  <h3 class="text-2xl font-bold">Welcome to the Library Management System </h3>
</header>
<main class="px-4">
  <section class="mb-5">
    <h2 class="text-1xl font-bold text-gray-800 mb-4">Latest Books</h2>
    <p class='text-gray-600' id='liveClock'>Find, reserve, and manage books with ease.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php
      foreach ($_books as $key) :
        $filePath = 'books/' . $key->file;

        if (file_exists($filePath)) {

      ?>
          <div class="bg-white rounded-lg shadow-lg p-4">
            <img src="<?php echo 'books/' . $key->cover_image; ?>" alt="Book cover" class="w-full h-48 object-cover rounded-lg mb-4">
            <h3 class="text-xl font-bold text-gray-800 mb-2"><?php echo $key->book_name; ?></h3>
            <h4 class="text-xl font-italic text-dark-800 mb-2"><?php echo $key->author_name; ?></h4>
            <p class="text-gray-600 mb-4"><?php echo $key->description; ?></p>
            <button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700"><a href="<?php echo $filePath ?>" target="_blank">View Book</a></button>
          </div>
      <?php
        } else {
          echo "<p class='text-red-500'>File not found: $filePath</p>";
        }
      endforeach;
      ?>
    </div>
  </section>
</main>
<section class="text-center bg-white-100 mb-10">
  <a href=""><h2 class="text-2xl font-bold text-white-800 mb-6">About AS-DarkCode Library</h2></a>
</section>
</body>
</html>
<!-- <p class="text-white-600 leading-loose">
        <strong>Unite literature and technology at AS-DarkCode Library,</strong> crafted by Akash Sharma. This digital haven, powered by HTML, CSS, Tailwind CSS, PHP, and MySQL, offers a modern, user-friendly experience. Grounded in MVC architecture, we prioritize clarity, maintainability, and scalability. Join us in embracing the synergy of books and code, fostering continuous learning. Connect with Akash Sharma to contribute to our dynamic literary sanctuary. Thank you for being part of AS-DarkCode Library, where the enchantment of books meets the precision of code.
    </p>
    <p class="text-white-600 mt-4">For inquiries and suggestions, contact us at <a href="mailto:library@example.com" class="text-blue-500">library@example.com</a>.</p> -->