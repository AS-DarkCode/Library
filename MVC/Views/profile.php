<div class="w-full max-w-sm mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-col items-center pb-10">
        <a href="#">
            <img class="rounded-t-lg" src="https://wallpapercave.com/wp/wp4937017.jpg" alt="" />
        </a>
        <div class="p-5">
            <a href="#" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">AS - DarkCode <br><h3>Knowledge in every page turned</h3></a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">In the heart of our library, stories come to life, knowledge unfolds, and every book is a portal to a new adventure. Discover the magic within our shelves.</p>
        </div>
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="<?php echo 'uploads/'.$SelectData['Data'][0]->profile_picture; ?>" alt="Bonnie image"/>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?php echo $SelectData['Data'][0]->first_name." ".$SelectData['Data'][0]->last_name; ?></h5>
        <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo $SelectData['Data'][0]->email; ?></span>
        <div class="flex mt-4 md:mt-6">
            <a href="Edit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-green-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View Profile</a>
            <a href="LogOut" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white-500 bg-red-400 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-danger-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">LogOut</a>
        </div>
</div>
