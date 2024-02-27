<div class="flex p-2">
    <img id="imagePreview" class="w-24 h-24 mt-2 rounded-full shadow-lg" src="<?php echo 'uploads/' . $SelectData['Data'][0]->profile_picture; ?>" alt="Profile image" />
    <h3 class="text-3xl font-bold mt-10 pl-5 text-center">Please Contact Your Admin For Update</h3>
</div>
<div id="imagePreviewContainer">
</div>

<div class="container mx-auto max-w-screen-md mt-0 p-6 bg-white rounded-lg shadow-lg">

    <form method="POST" class="space-y-4" enctype="multipart/form-data">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="first_name" value="<?php echo $SelectData['Data'][0]->first_name; ?>" name="first_name" class="mt-1 p-2 w-full border rounded-md" disabled>
            </div>

            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="last_name" value="<?php echo $SelectData['Data'][0]->last_name; ?>" name="last_name" class="mt-1 p-2 w-full border rounded-md" disabled>
            </div>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $SelectData['Data'][0]->email; ?>" class="mt-1 p-2 w-full border rounded-md" disabled>
        </div>

        <div>
            <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
            <input type="tel" id="contact_number" name="contact_number" value="<?php echo $SelectData['Data'][0]->contact_number; ?>" class="mt-1 p-2 w-full border rounded-md" disabled>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                <select id="gender" name="gender" class="mt-1 p-2 w-full border rounded-md" disabled>
                    <option value="Male" <?php
                                            if ($SelectData['Data'][0]->gender == 'male') {
                                                echo "checked";
                                            }
                                            ?>>Male</option>
                    <option value="Female" <?php
                                            if ($SelectData['Data'][0]->gender == 'female') {
                                                echo "checked";
                                            }
                                            ?>>Female</option>
                    <option value="Other" <?php
                                            if ($SelectData['Data'][0]->gender == 'other') {
                                                echo "checked";
                                            }
                                            ?>>Other</option>
                </select>
            </div>

            <div>
                <label for="state" class="block text-sm font-medium text-gray-700">Select a State:</label>
                <select id="stateSelect" class="mt-1 p-2 w-full border rounded-md name="state" disabled>
                    <?php
                    // Assuming $SelectData['Data'][0]->state contains the selected state
                    $selectedState = $SelectData['Data'][0]->state;

                    // Array of Indian states
                    $indianStates = array(
                        'andhra_pradesh', 'arunachal_pradesh', 'assam', 'bihar', 'chhattisgarh', 'goa', 'gujarat', 'haryana', 'himachal_pradesh',
                        'jharkhand', 'karnataka', 'kerala', 'madhya_pradesh', 'maharashtra', 'manipur', 'meghalaya', 'mizoram', 'nagaland',
                        'odisha', 'punjab', 'rajasthan', 'sikkim', 'tamil_nadu', 'telangana', 'tripura', 'uttar_pradesh', 'uttarakhand', 'west_bengal'
                    );

                    // Loop through states to generate options
                    foreach ($indianStates as $state) {
                        echo "<option value=\"$state\"";
                        if ($selectedState == $state) {
                            echo " selected";
                        }
                        echo ">" . ucwords(str_replace('_', ' ', $state)) . "</option>";
                    }
                    ?>

                </select>
            </div>
        </div>

        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" id="address" name="address" value="<?php echo $SelectData['Data'][0]->address; ?>" class="mt-1 p-2 w-full border rounded-md" disabled>
        </div>

        <div>
            <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
            <input type="file" id="imageInput" name="profile_picture" onchange="previewImage()" class="mt-1 p-2 w-full border rounded-md" disabled>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Hobbies</label>
            <div class="space-y-2">
                <?php $hobbies_arr = explode(',',$SelectData['Data'][0]->hobbies); ?>
                
                <label><input type="checkbox" name="hobbies[]" value="reading" <?php if(in_array('reading', $hobbies_arr)){echo "checked"; } ?> disabled> Reading</label>
                <label><input type="checkbox" name="hobbies[]" value="writing" <?php if(in_array('writing', $hobbies_arr)){echo "checked"; } ?> disabled> Writing</label>
                <label><input type="checkbox" name="hobbies[]" value="coding" <?php if(in_array('coding', $hobbies_arr)){echo "checked"; } ?> disabled> Coding</label>
                <label><input type="checkbox" name="hobbies[]" value="music" <?php if(in_array('music', $hobbies_arr)){echo "checked"; } ?> disabled> Music</label>
            </div>
        </div>
        <div class="flex justify-center pb-10 items-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white mt-3 mb-3 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline " type="submit" name="ragister" id="updateButton">
                UPDATE
            </button>
        </div>
        <!-- <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700">Register</button> -->

    </form>

</div>