<?php
require_once 'rest-client.php';

$footballDataEndpoint = 'https://api.football-data.org/v2/';
$footballDataAPIKey = 'YOUR-API-KEY';
$headers = array(
    "X-Auth-Token: $footballDataAPIKey"
);

class Soccer
{
    public function getTournament($tournamentId)
    {
        global $footballDataEndpoint, $headers;
        $competitionUrl = "${footballDataEndpoint}competitions/$tournamentId/matches";

        return get($competitionUrl, $headers);
    }

    public function getMatch($matchId)
    {
        global $footballDataEndpoint, $headers;
        $matchUrl = "${footballDataEndpoint}matches/$matchId";
        return get($matchUrl, $headers)->match;
    }

    public function getTeam($teamId)
    {
        global $footballDataEndpoint, $headers;
        $teamUrl = "${footballDataEndpoint}teams/$teamId";
        return get($teamUrl, $headers);
    }

}
