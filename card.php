<link href="<?php echo INCLUDE_PATH; ?>style/card.css" rel="stylesheet">
<div class="content">

<?php

    $conn = mysqli_connect("localhost", "root", "");

    mysqli_select_db($conn,"museu");

    $by_ordem = $_POST['by_ordem'];
    $by_familia = $_POST['by_familia'];
    $by_genero = $_POST['by_genero'];
    $by_especie = $_POST['by_especie'];

    $query = "SELECT * FROM fichas";
    $preparation = array();
    $search_params = array();
    $type_string = '';

    if(! empty($by_ordem)) {
      $preparation[] = "ordem LIKE CONCAT('%',?,'%')";
      $search_params[] = $by_ordem;
      $type_string .= 's';
    }
    if(! empty($by_familia)) {
      $preparation[] = "familia LIKE CONCAT('%',?,'%')";
      $search_params[] = $by_familia;
      $type_string .= 's';
    }
    if(! empty($by_genero)) {
      $preparation[] = "genero LIKE CONCAT('%',?,'%')";
      $search_params[] = $by_genero;
      $type_string .= 's';
    }
    if(! empty($by_especie)) {
      $preparation[] = "especie LIKE CONCAT('%',?,'%')";
      $search_params[] = $by_especie;
      $type_string .= 's';
    }

    $sql = $query;
    $sql_prep = $query;
    if (count($preparation) > 0) {
      $sql_prep .= " WHERE " . implode(' AND ', $preparation);
    }

    if (count($preparation) > 0) {
      $stmt = $conn->prepare($sql_prep);
      $stmt->bind_param($type_string, ...$search_params);
      $stmt->execute();
    }
    else {
      $stmt = $conn->prepare($sql);
      $stmt->execute();
    }

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          ?>
          <a href='<?php echo INCLUDE_PATH; ?>fichaLayout?ID_ficha=<?php echo $row['ID_ficha']; ?>' class="card-link">
            <div class="card">
                <div class="card-image">
                  <div class="card-image-background"></div>
                </div>
                <div class="card-info">
                  <p id="ordem_familia"><?php echo $row['ordem'] . ' - ' . $row['familia']; ?></p>
                  <p id="especie"><?php echo $row['especie'] ?></p>
                  <p id="autor_ano"><?php echo $row['autor_ano'] ?></p>
                </div>
            </div>
          </a>
          <?php
        }
    } else {
        echo "0 results";
    }
    $conn->close();


  /*Sobre o layout, pelo visto, eu e o professor concordamos com esse aqui. 

Com rela????o ??s informa????es dos cards, acho que bastam a ordem e fam??lia (no lugar do "ANIMALIA - ACTINOPTERYGII),
 o nome da esp??cie em destaque (no lugar do "Red-tail Tinfoil Bard"), autor/ano abaixo do nome da esp??cie
  (no lugar do Barbonymus altus) e os graus de amea??a no canto inferior direito de cada card mesmo
   (s?? que, ao inv??s de somente em n??vel global, constar tamb??m os status ?? n??vel nacional e estadual das esp??cies que tiverem).
    O que acha, */

 ?>
</div>

 

