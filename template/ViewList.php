<?php
include "template/header.php"
?>
<body>

<?php
include "template/nav.php"
?>


<h1>List</h1>

<?php
foreach (SPDO::getInstance()->query('SELECT * FROM participant') as $membre)
{
 echo  $membre[lastname];
 //echo '<pre>', print_r($membre) ,'</pre>';
}
?>


<body>
