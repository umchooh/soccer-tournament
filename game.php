<?php

require_once 'Database/Soccer.php';
require_once 'Database/Weather.php';

$s = new Soccer();
$matchId = $_GET['id'];
$match = $s->getMatch($matchId);

$homeTeam = $s->getTeam($match->homeTeam->id);
$awayTeam = $s->getTeam($match->awayTeam->id);

$w = new Weather();
$homeTeamLocation = $w->getLocation($homeTeam->address);
$currentWeather = $w->getCurrentWeather($homeTeamLocation->Key);

?>
<?php require_once 'view/header.php'?>
<body>
<main>
    <div class="p-3 text-right mb-3 trow-text">
        <div>Venue: <span class="font-weight-bold"><?= $homeTeam->venue ?></span></div>
        <div>Current Weather: <a href="<?= $currentWeather->Link ?>"><?= $currentWeather->WeatherText ?></a></div>
        <div>Temperature: <?= $currentWeather->Temperature->Metric->Value?>&#176;<?=$currentWeather->Temperature->Metric->Unit ?>
            / <?= $currentWeather->Temperature->Imperial->Value?>&#176;<?=$currentWeather->Temperature->Imperial->Unit ?></div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="text-center">
                <?php
                if (isset($homeTeam->website)) {
                ?>
                <a href="<?= $homeTeam->website ?>">
                    <?php
                    }
                    ?>
                    <img width="200px" height="150px" src="<?= $homeTeam->crestUrl ?>"/>
                    <p class="text-center team-link"><?= $homeTeam->name ?></p>
                    <?php
                    if (isset($homeTeam->website)) {
                    ?>
                </a>
            <?php
            }
            ?>
            </div>
        </div>
        <div class=" col-lg-4 col-md-4 col-sm-12">
            <p class="text-center vs">VS</p>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="text-center">
                <?php
                if (isset($awayTeam->website)) {
                ?>
                <a href="<?= $awayTeam->website ?>">
                    <?php
                    }
                    ?>
                    <?php

                    ?>
                    <img width="200px" height="150px" src="<?= $awayTeam->crestUrl ?>"/>
                    <p class="text-center team-link"><?= $awayTeam->name ?></p>
                    <?php
                    if (isset($awayTeam->website)) {
                    ?>
                </a>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class=" col-lg-6 col-md-6 col-sm-12">
            <h2 class="team-header text-center">Home Team Information</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="player-header">
                    <tr>
                        <th class="col-md-1">Name</th>
                        <th class="col-md-1">Position</th>
                        <th class="col-md-1">Nationality</th>
                        <th class="col-md-1">Role</th>
                    </tr>
                    </thead>
                    <tbody class="trow-text">
                    <?php
                    foreach ($homeTeam->squad as $team) {
                        ?>
                        <tr>
                            <td class="col-md-12"><?= $team->name ?></td>
                            <td class="col-md-1"><?= $team->position ?></td>
                            <td class="col-md-12"><?= $team->nationality ?></td>
                            <td class="col-md-12"><?= $team->role ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="  col-lg-6 col-md-6 col-sm-12">
            <h2 class="team-header text-center">Away Team Information</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="player-header">
                    <tr>
                        <th class="col-md-1">Name</th>
                        <th class="col-md-1">Position</th>
                        <th class="col-md-1">Nationality</th>
                        <th class="col-md-3">Role</th>
                    </tr>
                    </thead>
                    <tbody class="trow-text">
                    <?php
                    foreach ($awayTeam->squad as $team) {
                        ?>
                        <tr>
                            <td class="col-md-1"><?= $team->name ?></td>
                            <td class="col-md-1"><?= $team->position ?></td>
                            <td class="col-md-1"><?= $team->nationality ?></td>
                            <td class="col-md-3"><?= $team->role ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        </tbody>
        </table>
    </div>


</body>
</html>
