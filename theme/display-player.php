<?php if ( isset( $player->position ) ) : ?>
  <h3>Positon: <?= $player->position ?></h3>
<?php endif; ?>

<?php if ( isset( $player->position ) ) { ?>
  <h3>Position: <?= $player->position ?></h3>
<?php } ?>

<?php 
$identity = function( $a ) { return $a; }
$formatDate = function( $d ) { return strftime( '%b', $d ); }

$playerFields = [
  [ 'firstName', 'First Name' ],
  [ 'lastName', 'Last Name' ],
  [ 'birthDate', 'Birth Date', $formatDate ]
];
?>

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
  $playerFields = [
    [ 'firstName', 'First Name' ],
    [ 'lastName', 'Last Name' ],
    [ 'birthDate', 'Birth Date', $formatDate ]
  ];

  $display_fields = array_filter( $playerFields, function( $field ) use ( $player ) {
    return isset( $player->$field[0] );
  } );

  return array_map( function( $field ) use ( $identity, $player ) {
    $identity = function( $a ) { return $a; }
    $formatDate = function( $d ) { return strftime( '%b', $d ); }
    
    list( $name, $label, $transform ) = array_pad( $field, 3, $identity );

    return [ 'label' => $label, 'value' => $transform( $player->$name ) ];
  }, $playerFields );
}
?>

<?php 
  $display_fields = RHC\Player\display_fields( $player );
  foreach( $display_fields as $label => $value ) {
    ?><h3><?= $label ?>: <?= $value ?></h3><?php
  }
?>
