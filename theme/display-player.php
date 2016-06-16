<?php
function display_fields( $player ) {  
  $identity = function( $a ) { return $a; };
  $formatDate = function( $d ) { return strftime( '%b', $d ); };
  
  $playerFields = [
    [ 'firstName', 'First Name' ],
    [ 'lastName', 'Last Name' ],
    [ 'birthDate', 'Birth Date', $formatDate ]
  ];

  $display_fields = array_filter( $playerFields, function( $field ) use ( $player ) {
    return isset( $player->$field[0] );
  } );

  return array_map( function( $field ) use ( $identity, $player ) {
    list( $name, $label, $transform ) = array_pad( $field, 3, $identity );

    return [ 'label' => $label, 'value' => $transform( $player->$name ) ];
  }, $playerFields );
}
?>

<?php if ( isset( $player->position ) ) : ?>
  <h3>Positon: <?= $player->position ?></h3>
<?php endif; ?>

<?php if ( isset( $player->position ) ) { ?>
  <h3>Position: <?= $player->position ?></h3>
<?php } ?>

<h2>Player</h2>
<?php 
  $display_fields = display_fields( $player );
  foreach( $display_fields as $label => $value ) {
    ?><h3><?= $label ?>: <?= $value ?></h3><?php
  }
?>
