<?php if ( isset( $player->position ) ) : ?>
  <h3>Positon: <?= $player->position ?></h3>
<?php endif; ?>

<?php if ( isset( $player->position ) ) { ?>
  <h3>Position: <?= $player->position ?></h3>
<?php } ?>

<h2>Player</h2>
<?php 
array_walk( $playerFields, function( $field ) use ( $payer ) {
  list( $fieldName, $label, $transform ) = array_pad( $field, 3, $identity );

  if ( ! isset( $player->$fieldName ) ) {
    return;
  }

  ?><h3><?= $label ?>: <?= $transform( $player->$fieldName ) ?></h3>
} );
?>

<?php
function display_fields( $player ) {  
  $identity = function( $a ) { return $a; }
  $formatDate = function( $d ) { return strftime( '%b', $d ); }
  
  $playerFields = [
    [ 'firstName', 'First Name' ],
    [ 'lastName', 'Last Name' ],
    [ 'birthDate', 'Birth Date', $formatDate ]
  ];

  $display_fields = array_filter( $playerFields, function( $field ) use ( $player ) {
    return isset( $player->$field[0] );
  } );

  $display_fields = array_reduce(
    $player_fields, 
    function( $fields, $field ) use ( $identity, $player ) {
      list( $name, $label, $transform ) = array_pad( $field, 3, $identity );

      $fields[ $label ] = $transform( $player->$name );

      return $fields;
    },
    []
  );

  $display_fields[ 'Full Name' ] = sprintf(
    '%s %s',
    $display_fields[ 'First Name' ],
    $display_fields[ 'Last Name' ]
  );
  
  return $display_fields;
}
?>

<?php 
  $display_fields = display_fields( $player );
  <h3>Name: <?= $display_fields[ 'Full Name' ] ?></h3>
  <h3>Birth Date: <?= $display_fields[ 'Birth Date' ] ?></h3>
?>
