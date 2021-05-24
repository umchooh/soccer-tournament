<?php
// Start or resume a session
//session_start();
require_once 'Database/Soccer.php';
$s = new Soccer();
//Declare variable
$tournament = filter_input(INPUT_POST, 'tournament');
//
if(isset($_GET['submit'])){
    $flag = true;
    if (empty($_GET['tournament']) && $_GET['tournament']== '0') {
        $tournament_err = 'Please select one of the tournament.';
        $flag = false;
    } else {
        $tournament = $_GET['tournament'];
    }
    if($flag) {
        header('Location:tournament.php?tournament=' . $_GET['tournament']);
    }
//
}
?>
<?php require_once 'view/header.php'?>
<body>
<main>
    <div class="bg container-fluid d-flex justify-content-center align-items-center">
        <div class="index-text bg-white p-4 shadow">
            <div><h2 class=" font-weight-bold py-3">Welcome to Soccer Board</h2></div>
            <div class="tournament-form">
                <form action="" method="GET" class="py-3">
                    <p><span style="color:#ff0000;"><?= isset($tournament_err) ? $tournament_err : ''; ?></span></p>
                    <label for="tournament"> Tournament :</label>
                    <select name="tournament" id="tournament" class="form-select" aria-required="true">
                        <option value="0">--select a tournament--</option>
                        <option value="2000">FIFA World Cup</option>
                        <option value="2001">UEFA Champions League</option>
                        <option value="2002">Bundesliga</option>
                        <option value="2003">Eredivisie</option>
                        <option value="2013">Série A</option>
                        <option value="2014">Primera Division</option>
                        <option value="2015">Ligue 1</option>
                        <option value="2016">Championship</option>
                        <option value="2017">Primeira Liga</option>
                        <option value="2018">European Championship</option>
                        <option value="2019">Serie A</option>
                        <option value="2021">Premier League</option>
                    </select>
                    <div class="text-center py-3">
                        <button type="submit" class="button btn-primary btn-responsive " name="submit">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</main>
<?php require './view/footer.php'; ?>
