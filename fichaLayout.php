<link href="<?php echo INCLUDE_PATH; ?>style/ficha.css" rel="stylesheet">

<?php
if(isset($_GET['ID_ficha'])) {
    $conn = mysqli_connect("localhost", "root", "");

    mysqli_select_db($conn,"museu");

    $sql = "SELECT * FROM fichas WHERE ID_ficha = ".$_GET['ID_ficha'];
    $stmt = $conn->prepare('SELECT * FROM fichas WHERE ID_ficha = ?');

    $stmt->bind_param('i', $_GET['ID_ficha']);
    $stmt->execute();

    $result = $stmt->get_result();

    $row = $result->fetch_assoc();
}
?>

<div class="content">
    <div class="header-ficha">
        <div class="header-info">
            <p id="especie"><?php echo $row['especie'] ?></p>
            <p id="nome_popular"><?php echo $row['nome_popular'] ?></p>
            <p id="autor"><?php echo $row['autor_ano'] ?></p>
        </div>
        <div class="header-image">
            <div class="header-image-background"></div>
        </div>
    </div>
    <div class="content-ficha">
        <div class="content-cards">
            <div class="ficha-card">
                <div class="ficha-unit">
                    <p>Ordem:</p><p><?php echo $row['ordem'] ?></p>
                </div>
                <div class="ficha-unit">
                    <p>Família: </p><p><?php echo $row['familia'] ?></p>
                </div>
                <div class="ficha-unit">
                    <p>Gênero: </p><p><?php echo $row['genero'] ?></p>
                </div>
                <div class="ficha-unit">
                    <p>Subfamília: </p><p><?php echo $row['subfamilia'] ?></p>
                </div>
                <div class="ficha-unit">
                    <p>Epiteto específico: </p><p><?php echo $row['epiteto_especifico'] ?></p>
                </div>    
            </div>
            
            <div class="ficha-card">
                <div class="ficha-unit">
                    <p>Etimologia: </p><p><?php echo $row['etimologia_epiteto'] ?></p>
                </div>
                <div class="ficha-unit">
                    <p>Localidade: </p><p><?php echo $row['localidade_tipo'] ?></p>
                </div>
                <div class="ficha-unit">
                    <p>Biomas: </p><p><?php echo $row['biomas_especimes_MHNBA'] ?></p>
                </div>
                <div class="ficha-unit">
                    <p>Atividade: </p><p><?php echo $row['atividade'] ?></p>
                </div>       
            </div>
            
            <div class="ficha-card">
                <div class="ficha-unit">
                    <p>Grau de ameaça (IUCN): </p><p><?php echo $row['grau_ameaca_IUCN'] ?></p>
                </div> 
                <div class="ficha-unit">
                    <p>Grau de ameaça (ICMBio): </p><p><?php echo $row['grau_ameaca_ICMBio'] ?></p>
                </div> 
                <div class="ficha-unit">
                    <p>Grau de ameaça (SEMA 2017): </p><p><?php echo $row['grau_ameaca_SEMA_2017'] ?></p>
                </div> 
                <div class="ficha-unit">
                    <p>Série - Tipo (?): </p><p><?php echo $row['serie_tipo'] ?></p>
                </div> 
            </div>
        </div>
        <div class="ficha-card-w100">
            <div class="ficha-unit">
                <p>Referências: </p><p><?php echo $row['referencias'] ?></p>
            </div>
        </div>
         <div class="ficha-card-w100">
            <div class="ficha-unit">
                <p>Comentários: </p><p><?php echo $row['comentarios'] ?></p>
            </div> 
         </div>
         
    </div>
</div>
