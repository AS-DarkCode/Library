<div class="container mx-auto max-w-screen-lg px-4 py-8 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <h5 class="text-2xl font-bold mb-3">Library Management System</h5>
    <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 ">
        <a href="Books_List">List Books</a>
    </button>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5 mb-1">
            <div class="col-span-1 md:col-span-1">
                <div class="bg-gray-200 aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">

                    <label class="common-label mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Book Cover Image</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" onchange="previewImage()" id="imageInput" name="input_cover" type="file">

                    <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 mt-3">
                        <img class="rounded-lg" id="imagePreview" src="" alt="Book Cover">
                    </figure>

                    <div id="imagePreviewContainer"></div>
                </div>

                <label class="common-label mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload Book Pdf</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" name="input_book" type="file" multiple>

            </div>
        </div>

        <div class="mb-5">
            <label for="text" class="common-label mb-2 text-sm font-medium text-gray-900 dark:text-white">Book Title</label>
            <input type="text" id="text" name="book_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Book Title" required />
        </div>

        <div class="mb-5">
            <label for="author" class="common-label mb-2 text-sm font-medium text-gray-900 dark:text-white">Author Name</label>
            <input type="text" id="author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="author_name" required />
        </div>

        <div class="px-4 py-2 bg-gray-200 rounded-t-lg dark:bg-gray-800">
            <label for="comment" class="common-label sr-only">Book Description</label>
            <textarea id="comment" name="description" rows="4" class="w-full px-0 text-sm text-gray-900 bg-gray-50 border-0 dark:bg-gray-800 focus:ring-0 dark:text-gray dark:placeholder-gray-400" placeholder="Book Description ..." required></textarea>
        </div>

        <button type="submit" class="mb-10 mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="save_book">Save Book</button>
    </form>
</div>