<?php
include "template/header.php"
?>
<body>

<?php
include "template/nav.php"
?>


<h1>Liste Participants</h1>

     
   
<div class="container">
<a class="btn btn-success" href="?action=new">new</a>
<table style="width:100%" class="table-striped">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Mail</th>
  </tr>
  <?php
foreach (SPDO::getInstance()->query('SELECT * FROM participant') as $membre)
{
 echo "<tr><td>".$membre['firstname']."</td><td>".$membre['lastname']
 ."</td><td>".$membre['mail']
 ." <a type='button' href='?action=edit&participant=".$membre['id']
 ."' class='btn btn-warning'>modifier</a> <a class='btn btn-danger' href='?action=delete'>efacer</a></tr></td>";
 //echo '<pre>', print_r($membre) ,'</pre>';
}
?>
  
</table>
</div>


<body>
