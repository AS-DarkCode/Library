<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 pl-10">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 pl-10">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($book_list as $key) {

            ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="<?php echo 'books/' . $key->cover_image; ?>" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-base font-semibold"><?php echo $key->book_name ?></div>
                            <div class="font-normal text-gray-500"><?php echo $key->author_name; ?></div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <a href="Books_Edit?book=<?php echo $key->id; ?>" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" class="font-medium p-3 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="Books_Delete?book=<?php echo $key->id ?>" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                    </td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>