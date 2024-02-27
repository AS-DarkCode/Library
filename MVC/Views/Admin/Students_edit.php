<div class="flex p-2">
    <img id="imagePreview" class="w-24 h-24 mt-2 rounded-full shadow-lg" src="<?php echo 'uploads/' . $Admin_Student_edit->profile_picture; ?>" alt="Profile image" />
    <h3 class="text-3xl font-bold mt-10 pl-5 text-center">Edit Profile LMS</h3>
</div>
<div id="imagePreviewContainer">
</div>

<div class="container mx-auto max-w-screen-md mt-0 p-6 bg-white rounded-lg shadow-lg">

    <form method="POST" class="space-y-4" enctype="multipart/form-data">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="first_name" value="<?php echo $Admin_Student_edit->first_name; ?>" name="first_name" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="last_name" value="<?php echo $Admin_Student_edit->last_name; ?>" name="last_name" class="mt-1 p-2 w-full border rounded-md">
            </div>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $Admin_Student_edit->email; ?>" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div>
            <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
            <input type="tel" id="contact_number" name="contact_number" value="<?php echo $Admin_Student_edit->contact_number; ?>" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                <select id="gender" name="gender" class="mt-1 p-2 w-full border rounded-md">
                    <option value="Male" <?php
                                            if ($Admin_Student_edit->gender == 'male') {
                                                echo "checked";
                                            }
                                            ?>>Male</option>
                    <option value="Female" <?php
                                            if ($Admin_Student_edit->gender == 'female') {
                                                echo "checked";
                                            }
                                            ?>>Female</option>
                    <option value="Other" <?php
                                            if ($Admin_Student_edit->gender == 'other') {
                                                echo "checked";
                                            }
                                            ?>>Other</option>
                </select>
            </div>

            <div>
                <?php
                $States = [
                    'AP' => 'Andhra Pradesh',
                    'AR' => 'Arunachal Pradesh',
                    'AS' => 'Assam',
                    'BR' => 'Bihar',
                    'CG' => 'Chhattisgarh',
                    'GA' => 'Goa',
                    'GJ' => 'Gujarat',
                    'HR' => 'Haryana',
                    'HP' => 'Himachal Pradesh',
                    'JH' => 'Jharkhand',
                    'KA' => 'Karnataka',
                    'KL' => 'Kerala',
                    'MP' => 'Madhya Pradesh',
                    'MH' => 'Maharashtra',
                    'MN' => 'Manipur',
                    'ML' => 'Meghalaya',
                    'MZ' => 'Mizoram',
                    'NL' => 'Nagaland',
                    'OD' => 'Odisha',
                    'PB' => 'Punjab',
                    'RJ' => 'Rajasthan',
                    'SK' => 'Sikkim',
                    'TN' => 'Tamil Nadu',
                    'TG' => 'Telangana',
                    'TR' => 'Tripura',
                    'UP' => 'Uttar Pradesh',
                    'UK' => 'Uttarakhand',
                    'WB' => 'West Bengal',
                    'AN' => 'Andaman and Nicobar Islands',
                    'CH' => 'Chandigarh',
                    'DN' => 'Dadra and Nagar Haveli and Daman and Diu',
                    'LD' => 'Lakshadweep',
                    'DL' => 'Delhi',
                    'PY' => 'Puducherry'
                ];
                ?>
                <label for="state" class="block text-sm font-medium text-gray-700">Select a State:</label>
                <select name="state" id="state">
                    <option selected disabled>Select State</option>
                    <?php
                    foreach ($States as $key => $value) {
                        echo "<option value=\"$key\"";
                        echo ($Admin_Student_edit->state == $key) ? ' selected' : '';
                        echo ">$value</option>";
                    }
                    ?>
                </select>

            </div>
        </div>

        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" id="address" name="address" value="<?php echo $Admin_Student_edit->address; ?>" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div>
            <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
            <input type="file" id="imageInput" name="profile_picture" onchange="previewImage()" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Hobbies</label>
            <div class="space-y-2">
                <?php $hobbies_arr = explode(',', $Admin_Student_edit->hobbies); ?>

                <label><input type="checkbox" name="hobbies[]" value="reading" <?php if (in_array('reading', $hobbies_arr)) {
                                                                                    echo "checked";
                                                                                } ?>> Reading</label>
                <label><input type="checkbox" name="hobbies[]" value="writing" <?php if (in_array('writing', $hobbies_arr)) {
                                                                                    echo "checked";
                                                                                } ?>> Writing</label>
                <label><input type="checkbox" name="hobbies[]" value="coding" <?php if (in_array('coding', $hobbies_arr)) {
                                                                                    echo "checked";
                                                                                } ?>> Coding</label>
                <label><input type="checkbox" name="hobbies[]" value="music" <?php if (in_array('music', $hobbies_arr)) {
                                                                                    echo "checked";
                                                                                } ?>> Music</label>
            </div>
        </div>
        <div class="flex justify-center pb-10 items-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white mt-3 mb-3 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline " type="submit" name="update">
                UPDATE
            </button>
        </div>
        <!-- <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700">Register</button> -->

    </form>

</div>