<?php

$navListItems = '';
if (!isset($_SESSION['isLoggedIn'])) {
    $navLinks = array('About Us' => 'about-us.php', 'Program & Services' => 'programs-services.php', 'Login' => 'login.php', 'Sign Up' => 'signup-page.php');
} else if (isset($_SESSION['isLoggedIn'])) {
    $navLinks = array('About Us' => 'about-us.php', 'Program & Services' => 'programs-services.php', 'Logout' => 'logout.php');
}
foreach ($navLinks as $linkName => $page) {
    $navListItems .= "<li class=\"nav-item\"><a class=\"nav-link\" href=\"$page\">$linkName</a></li>";
}

require_once 'Database/Soccer.php';

$tournamentId = $_GET['tournament'];
$s = new Soccer();
$result = $s->getTournament($tournamentId);
?>
<?php require_once 'view/header.php'?>
<body>
<main>
    <table class="table table-hover">
        <thead class="thead-light table-header">
        <tr>
            <th scope="col">Home Team</th>
            <th scope="col">Away Team</th>
            <th scope="col">Details</th>
        </tr>
        </thead>
        <tbody class="trow-text">
        <?php
        foreach ($result->matches as $match) {
            ?>
            <tr >
                <td><?= $match->homeTeam->name ?></td>
                <td><?= $match->awayTeam->name ?></td>
                <td><a href="game.php?id=<?= $match->id ?>">View</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</main>
<footer class="bg-secondary text-white text-center border-top p-2">
    <div>
        <p class="text-center ">&#169 Copyright, <?php echo date("Y"); ?> Hui Ser Choo. </p>
    </div>
</footer>
</body>
</html>
