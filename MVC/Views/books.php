<div class="container mx-auto max-w-screen-lg px-4 py-8 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <h1 class="text-4xl font-bold mb-8">Library Management System</h1>
</div>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 pl-10">
                    Book
                </th>
                <th scope="col" class="px-6 py-3 pl-10">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($get_Books as $book) {

            ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-20 h-20 rounded-full" src="<?php echo 'books/' . $book->cover_image; ?>" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-base font-semibold"><?php echo $book->book_name ?></div>
                            <div class="font-normal text-gray-500"><?php echo $book->author_name; ?></div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                            <a href="books/<?php echo $book->file ?>" target="_blank"><span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                View Book
                            </span></a>
                        </button>
                    </td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>