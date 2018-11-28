<?php

function getchapter(){

    echo "<table><tr><th>Numéro chapitre</th><th>Titre</th><th>Date publication</th></tr>";

    while ($donnees = $reponse->fetch())
    {
      echo  "<tr>";
      echo "<td>";
      echo $donnees['id_article'];
      echo "</td>";
      echo "<td>";
      echo $donnees['article'];
      echo "</td>";
      echo "<td>";
      echo $donnees['date_article'];
      echo "</td>";
    echo "</table>";
  };

};

?>
