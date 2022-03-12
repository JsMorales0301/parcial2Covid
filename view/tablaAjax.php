<?php
require_once 'C:\xampp\htdocs\covid\controllers\report.controller.php';

$filtro = $_GET["filtro"];
$reportController = new ReportController();
$reports = $reportController->getReportsByFilter($filtro);

?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Casos acumlados</th>
            <th scope="col">Muertes acumulados</th>
            <th scope="col">Casos del último día reportado</th>
            <th scope="col">Muertes del último día reportado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($reports as $report) {
            echo "<tr>";
            echo "<td>" . $report->getCumulative_cases() . "</td>";
            echo "<td>" . $report->getCumulative_deaths() . "</td>";
            echo "<td>" . $report->getnew_cases() . "</td>";
            echo "<td>" . $report->getnew_deaths() . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>