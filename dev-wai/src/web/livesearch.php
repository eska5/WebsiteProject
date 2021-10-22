<?php
require 'mongo.php';
$q=$_GET["q"];
if (strlen($q)>0) { 
  $filter=['tytul' => array('$regex' => $q)];
  $options=array();
  $query = new MongoDB\Driver\Query($filter,$options);
  $rows = $manager->executeQuery('wai.images',$query);
  $i = 0;
  foreach ($rows as $r)
  {
    echo '<tr> <td> <a href="watermark/watermark-'.$r->filename.'"> <img src="thumbnail/min-'.$r->filename.'"> </a> </td></tr>';
    $i = $i + 1;
  }
  if ($i == 0)
          echo 'No images found';
}
else
    echo 'Text too short';
?>