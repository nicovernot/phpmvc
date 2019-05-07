<?php
include "template/header.php"
?>
<body>

<?php
include "template/nav.php"
?>


<h1>List</h1>

<div class="container">
<table style="width:100%" class="table-striped">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Mail</th>
  </tr>
  <?php
foreach (SPDO::getInstance()->query('SELECT * FROM participant') as $membre)
{
 echo "<tr><td>".$membre['firstname']."</td><td>".$membre['lastname']."</td><td>".$membre['mail']."</tr></td>";
 //echo '<pre>', print_r($membre) ,'</pre>';
}
?>
  
</table>
</div>


<body>
