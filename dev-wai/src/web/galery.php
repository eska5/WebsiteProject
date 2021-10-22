<?php
echo '</br>';


$no_of_records_per_page = 3;
                
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $offset = ($pageno-1) * $no_of_records_per_page;
                $no_of_records_per_page = 3;

include 'mongo.php';

$command = new MongoDB\Driver\Command(["count" => "images", "query" => []]);
$result = $manager->executeCommand('wai', $command);
$total_images_count = $result->toArray()[0]->n;
$total_pages = ceil($total_images_count / $no_of_records_per_page);

$filter=array();
$options=array();
$query = new MongoDB\Driver\Query($filter,$options);
$rows = $manager->executeQuery('wai.images',$query);
        $i = 1;
        echo'<center>';
            foreach ($rows as $r)
            {
                if(($i>$offset)&&($i <= $offset + $no_of_records_per_page))
                {
                    if(($r->private=="0")||($_SESSION['id']===$r->private)){
                        echo $_SESSION['id'];
                        echo $r->private;
                    echo '<tr> <td> <a href="watermark/watermark-'.$r->filename.'"> <img src="thumbnail/min-'.$r->filename.'"> </a> </td></tr>';
                    echo '<tr><td><p>'."autor: ".$r->autor.'  </tr></td>';
                    echo '<tr><td>'."| tytuł: ".$r->tytul.' </tr></td>';
                    if($r->private==$_SESSION['id']){
                    echo '<tr><td>'."| private".'  </tr></td>';
                    
                    }
                    else
                    {
                        echo '<tr><td>'."| public".'  </tr></td>';
                    }
                    echo '<input type="checkbox" name="rdbtn[]" value="?'.$r->_id .' ?"></p>';
                    echo '</br>';
                }

                }

                $i++;
            }
            
            require 'paging.html';
            ?>