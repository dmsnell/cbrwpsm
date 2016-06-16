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
