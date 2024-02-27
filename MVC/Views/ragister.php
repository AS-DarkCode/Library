<div class="container mx-auto max-w-screen-md mt-8 p-6 bg-white rounded-lg shadow-lg">

  <h1 class="text-3xl font-bold text-center mb-8">Registration Form <br>LMS</h1>

  <form method="POST" class="space-y-4" enctype="multipart/form-data">

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <div>
        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
        <input type="text" id="first_name" name="first_name" class="mt-1 p-2 w-full border rounded-md">
      </div>

      <div>
        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
        <input type="text" id="last_name" name="last_name" class="mt-1 p-2 w-full border rounded-md">
      </div>
    </div>

    <div>
      <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
      <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <div>
      <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
      <input type="password" id="password" name="password" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <div>
      <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
      <input type="tel" id="contact_number" name="contact_number" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <div>
        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
        <select id="gender" name="gender" class="mt-1 p-2 w-full border rounded-md">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <div>
        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
        <input type="text" id="address" name="address" class="mt-1 p-2 w-full border rounded-md">
      </div>
    </div>

    <div>
      <label for="state" class="block text-sm font-medium text-gray-700">State</label>
      <select name="state" id="state">
        <option selected disabled>Select State</option>
        <option value="AP">Andhra Pradesh</option>
        <option value="AR">Arunachal Pradesh</option>
        <option value="AS">Assam</option>
        <option value="BR">Bihar</option>
        <option value="CG">Chhattisgarh</option>
        <option value="GA">Goa</option>
        <option value="GJ">Gujarat</option>
        <option value="HR">Haryana</option>
        <option value="HP">Himachal Pradesh</option>
        <option value="JH">Jharkhand</option>
        <option value="KA">Karnataka</option>
        <option value="KL">Kerala</option>
        <option value="MP">Madhya Pradesh</option>
        <option value="MH">Maharashtra</option>
        <option value="MN">Manipur</option>
        <option value="ML">Meghalaya</option>
        <option value="MZ">Mizoram</option>
        <option value="NL">Nagaland</option>
        <option value="OD">Odisha</option>
        <option value="PB">Punjab</option>
        <option value="RJ">Rajasthan</option>
        <option value="SK">Sikkim</option>
        <option value="TN">Tamil Nadu</option>
        <option value="TG">Telangana</option>
        <option value="TR">Tripura</option>
        <option value="UP">Uttar Pradesh</option>
        <option value="UK">Uttarakhand</option>
        <option value="WB">West Bengal</option>
        <option value="AN">Andaman and Nicobar Islands</option>
        <option value="CH">Chandigarh</option>
        <option value="DN">Dadra and Nagar Haveli and Daman and Diu</option>
        <option value="LD">Lakshadweep</option>
        <option value="DL">Delhi</option>
        <option value="PY">Puducherry</option>
      </select>
    </div>

    <div>
      <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
      <input type="file" id="profile_picture" name="profile_picture" class="mt-1 p-2 w-full border rounded-md">
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Hobbies</label>
      <div class="space-y-2">
        <label><input type="checkbox" name="hobbies[]" value="reading"> Reading</label>
        <label><input type="checkbox" name="hobbies[]" value="writing"> Writing</label>
        <label><input type="checkbox" name="hobbies[]" value="coding"> Coding</label>
        <label><input type="checkbox" name="hobbies[]" value="music"> Music</label>
      </div>
    </div>

    <div class="flex items-center">
      <input type="checkbox" id="terms_conditions" name="terms_conditions" class="mr-2">
      <label for="terms_conditions" class="text-sm text-gray-700">I agree to the terms and conditions</label>
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="ragister">
        Register
      </button>
      <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="login">
        Login Here
      </a>
    </div>
    <!-- <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700">Register</button> -->

  </form>

</div>