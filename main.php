
<form method="post">
    <input type="text" placeholder="Nom produit" name="nomp"><br>
    <input type="text" placeholder="Prix" name="prix"><br>
    <input type="text" placeholder="Quantité" name="qte"><br>
    <input type="submit" value="Submit" name="submit">
</form>

<?php
if (isset($_POST["submit"])) {
    $nom = $_POST["nomp"];
    $prix = $_POST["prix"];
    $qte = $_POST["qte"];

    $data = array("nomp" => $nom, "prix" => $prix, "qte" => $qte);
    $data_json = json_encode($data);

    $options = array(
        'http' => array(
            'header'  => "Content-Type: application/json\r\n",
            'method'  => 'POST',
            'content' => $data_json,
        ),
    );

    $context  = stream_context_create($options);
    $result = file_get_contents('http://localhost:3000/endpoint', false, $context);

    if ($result === FALSE) { 
        echo "Error";
    }

    echo $result;
}
?>