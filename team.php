<?php

namespace RavensEgg\Rugby\Team;
use RavensEgg\Rugby\Player as Player;

function get_players() {
  return Player\get_players_for_team( $team_id );
}
