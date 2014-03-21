<?php
	$skillNames = array();
	$skills = array();
	// Loop 51 times and output the skills lines.
    for ( $i = 1; $i <= 51; $i++ )
	{
		$skillNames[] = sprintf( "Skill%02d", $i );
		$skills[] = sprintf( "Skill%02d", $i ) . 'Mod';
	}

	$specialAbilities = array();
	for ( $i = 1; $i <= 30; $i++ )
		$specialAbilities[] = sprintf( "Feat%02d", $i );

	$items = array();
	for ( $i = 1; $i <= 34; $i++ )
		$items[] = sprintf( "Gear%02d", $i );
	
	global $statblockMap;
	$statblockMap = array('Name' => 'Name', 'Gender' => 'Gender', 'Race' => 'Race', 'Class' => 'Class',
						  'CR' => 'Level', 'ECL' => 'Level', 'Size' => 'Size', 'HD' => 'Level', 'HP' => 'HP',
						  'Init' => 'Init', 'Speed' => 'Speed', 'AC' => 'AC', 'WeaponName' => 'Weapon1',
						  'WeaponAttack' => 'Weapon1AB', 'WeaponDamage' => 'Weapon1Damage', 'WeaponCrit' => 'Weapon11Crit',
						  'SpecialAbilities' => $specialAbilities, 'Alignment' => 'Alignment', 'Fort' => 'Fort', 'Ref' => 'Reflex',
						  'Will' => 'Will', 'Str' => 'Str', 'Dex' => 'Dex', 'Con' => 'Con', 'Int' => 'Int', 'Wis' => 'Wis', 'Cha' => 'Cha',
						  'SkillNames' => $skillNames, 'Skills' => $skills, 'Items' => $items);
?>