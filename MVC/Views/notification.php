<?php 
if(!empty($notificationget)){

foreach ($notificationget as $key) {
  			// 	echo "<pre>";
				// print_r($notificationget);
				// exit();
?>
  <div class="w-full max-w-2xl mx-auto p-5">
    <h2 class="text-2xl font-bold mb-4">Notifications</h2>
    <ul class="divide-y divide-gray-200">
      <li class="flex justify-between items-center py-4">
        <a href="#" class="flex-1">
          <div class="text-lg font-medium"><?php echo $notificationget[0]->type; ?></div>
          <p class="text-gray-500"><?php echo $notificationget[0]->name . " - " . date('d-m-y'); ?></p>
        </a>
        <p class="text-gray-500"><?php echo $notificationget[0]->message; ?></p>
      </li>
    </ul>
  </div>
<?php
}
}else{
 echo '<div class="w-full max-w-2xl mx-auto p-5"><h2 class="text-2xl font-bold mb-4 ">No Notifications Found</h2></div>';
}
?>