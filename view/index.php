<?php

require_once 'C:\xampp\htdocs\covid\controllers\country.controller.php';
require_once 'C:\xampp\htdocs\covid\view\bootstrap.php';
$pais = new CountryController();
$paises = $pais->getCountries();
// print_r($paises);
?>

<div class="container-fluid">

    <h1 class="text-center">Parcial Aplicaciones para Internet</h1>
    <hr>
    <h1 class="text-center">COVID-19</h1>
    <hr>

    <div class="mt-2 row">
        <div class="col align-self-center">
            <h3 class="text-center">
                Paises:
            </h3>
            <select class="form-select" aria-label="Default select example" id="pais" name="pais">
                <?php
                foreach ($paises as $pais) {
                    echo "<option value=" . $pais->getId() . ">" . $pais->getCountry() . "</option>";
                }
                ?>

            </select>
        </div>
    </div>

    <div id="resultados">

    </div>

</div>


<script>
    $(document).on('change', '#pais', function(event) {
        var value = $("#pais option:selected").val();
        url = "tablaAjax.php?filtro=" + value;
        $("#resultados").load(url);
    });
</script>