<?php

namespace RavensEgg\Rugby\Player;

function get_fake_db_path() {
  return wp_upload_dir()['path'] . '/fake_player.json';
}

function get_field_mappings() {
  return [
    ['firstName', '1.3'],
    ['lastName', '1.6']
  ];
}

function gf_to_object( $field_mappings, $entry ) {
  $player = [];

  foreach ( $field_mappings as $field ) {
    list( $name, $id ) = $field;

    $player[ $name ] = rgar( $entry, $id );
  }

  return (object) $player;
}

function gravityforms_to_player( $entry ) {
    return gf_to_object( get_field_mappings(), $entry );
}

/*
$query = 'INSERT INTO players ( firstName, lastName ) VALUES (%s, %s)'
$wpdb->query( $wpdb->prepare( $query, $player->firstName, $player->lastName ) );

$wpdb->get_results( $wpdb->prepare(
  'SELECT * FROM players WHERE team_id = %s',
  $team_id
) );

foreach ( $results as $row ) {
  $playerName = $row[ 'firstName' ] . ' ' . $row[ 'lastName' ];
}
*/

function save_form( $entry, $form ) {
  $player = gravityforms_to_player( $entry );

  save_player_to_file( $player );
}

function save_player_to_file( $player ) {
  file_put_contents( get_fake_db_path(), json_encode( $player ) );
}

function load_player_from_file() {
  $players = json_decode( file_get_contents( get_fake_db_path() ) );

  return $players;
}
