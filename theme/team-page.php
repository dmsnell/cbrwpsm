<?php

use RavensEgg\Rugby\Team as Team;

$players = Team\get_players();
$game_players = Game\get_players( $game_id );

$prefill_player_form = function( $player_id ) {
  return function() use ( $player_id ) {
    return Player\prefill_gf_form_for( $player_id );
  }
}

add_action( 'gf_prefill', prefill_player_form( $player_id ) );
echo gf_spew_form( 'player' );
