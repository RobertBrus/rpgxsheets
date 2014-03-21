<?php

  /*

     staticHelp is a multi-dimensional array that contains the links for static help.
   The first dimension is the "name" of the static help.  IT SHOULD NOT BE CHANGED.
   For example, in:

      staticHelp[ "ac" ][0]

   "ac" is the name of the help.

   The second dimension has 3 values, 0-2.
      0 - This is the title (i.e. tooltip) for the link.
      1 - Text of the link.
      2 - Link

   To change the help to a different language, the only thing that needs to be changed
   are the values in the second dimension of the array.


  */

  $staticHelp = array();

  $staticHelp[ "ac" ]        = array( "Armor Class", "AC", "http://paizo.com/pathfinderRPG/prd/combat.html#armor-Class" );
  $staticHelp[ "action points" ] = array( "Hero Points", "HERO POINTS", "http://paizo.com/pathfinderRPG/prd/advanced/advancedNewRules.html#hero-points" );
  $staticHelp[ "age" ]       = array( "Age of character",
                                        "Age",
                                       "http://paizo.com/pathfinderRPG/prd/additionalRules.html#age" );
  $staticHelp[ "alignment" ] = array( "Lawful/Neutral/Chaotic-Good/Neutral/Evil",
                                        "Alignment",
                                          "http://paizo.com/pathfinderRPG/prd/additionalRules.html#alignment" );
  $staticHelp[ "armor1" ]    = array( "Main armor owned by character",
                                        "Armor/Protective Item",
                                          "http://paizo.com/pathfinderRPG/prd/equipment.html#armor" );
  $staticHelp[ "armor2" ]    = array( "Secondary armor owned by character",
                                        "Protective Item",
                                          "http://paizo.com/pathfinderRPG/prd/equipment.html#armor" );
  $staticHelp[ "armor check penalty" ] = array( "Help on Armor Check Penalty",
                                        "Armor check penalty",
                                       "http://paizo.com/pathfinderRPG/prd/equipment.html#armor-Check-Penalty" );
  $staticHelp[ "bonus spells" ] = array( "Bonus spells based on ability.",
                                        "Bonus <br />Spells",
                                       "http://paizo.com/pathfinderRPG/prd/gettingStarted.html#table-1-3-ability-modifiers-and-bonus-spells" );
  $staticHelp[ "cha" ]       = array( "Charisma",
                                        "CHA",
                                       "http://paizo.com/pathfinderRPG/prd/gettingStarted.html#charisma-new" );
  $staticHelp[ "class" ]     = array( "Supported classes: barbarian (bbn), bard (brd), cleric (clr), druid (drd), fighter (ftr), monk (mnk), paladin (pal), ranger (rgr), rogue (rog), sorcerer (sor), wizard (wiz); a slash (&#47;) separated list works for multi-classed characters; numbers and spaces are fine",
                                        "Class",
                                       "http://paizo.com/pathfinderRPG/prd/classes.html" );
  $staticHelp[ "con" ]       = array( "Constitution",
                                        "CON",
                                       "http://paizo.com/pathfinderRPG/prd/gettingStarted.html#constitution" );
  $staticHelp[ "dex" ]       = array( "Dexterity",
                                        "DEX",
                                       "http://paizo.com/pathfinderRPG/prd/gettingStarted.html#dexterity" );
  $staticHelp[ "dmg red" ]   = array( "Damage Reduction",
                                        "Damage Reduction",
                                       "http://paizo.com/pathfinderRPG/prd/gettingStarted.html#damage-Reduction" );
  $staticHelp[ "encumbrance" ] = array( "Help on encumbrance penalty",
                                        "encumbrance penalty",
                                       "http://paizo.com/pathfinderRPG/prd/additionalRules.html#carrying-Capacity");
  $staticHelp[ "feats" ]     = array( "Feats usable by the character",
                                        "Feats",
                                       "http://paizo.com/pathfinderRPG/prd/feats.html" );
  $staticHelp[ "flat" ]      = array( "Flat-footed AC",
                                        "FLAT",
                                       "http://paizo.com/pathfinderRPG/prd/combat.html#flat-Footed" );
  $staticHelp[ "fortitude" ] = array( "Saving throw against vitality and health attacks",
                                        "FORTITUDE",
                                       "http://paizo.com/pathfinderRPG/prd/combat.html#saving-Throws" );
  $staticHelp[ "grapple" ]   = array( "Total attack bonus for grapple attacks",
                                        "GRAPPLE",
                                       "http://paizo.com/pathfinderRPG/prd/combat.html#grapple" );
  $staticHelp[ "height" ]    = array( "Height and weight of character",
                                        "Height",
                                       "http://paizo.com/pathfinderRPG/prd/additionalRules.html#vital-statistics" );
  $staticHelp[ "hp" ]        = array( "Hit Points",
                                        "HP",
                                       "http://paizo.com/pathfinderRPG/prd/gettingStarted.html#hit-Points" );
  $staticHelp[ "init" ]      = array( "Initiative check",
                                        "INIT",
                                       "http://paizo.com/pathfinderRPG/prd/gettingStarted.html#initiative" );
  $staticHelp[ "int" ]       = array( "Intelligence",
                                        "INT",
                                       "http://paizo.com/pathfinderRPG/prd/gettingStarted.html#intelligence" );
  $staticHelp[ "melee" ]     = array( "Total attack bonus for melee",
                                        "MELEE",
                                       "http://paizo.com/pathfinderRPG/prd/combat.html#melee-attacks" );
  $staticHelp[ "nonlethal damage" ] = array( "Nonlethal Damage",
                                        "Nonlethal Damage",
                                       "http://paizo.com/pathfinderRPG/prd/equipment.html#nonlethal" );
  $staticHelp[ "other possessions" ] = array( "Characters possessions",
                                        "Other Possessions",
                                       "http://paizo.com/pathfinderRPG/prd/equipment.html#goods-And-Services" );
  $staticHelp[ "race" ]      = array( "Race of character",
                                        "Race",
                                       "http://paizo.com/pathfinderRPG/prd/races.html" );
  $staticHelp[ "ranged" ]    = array( "Total attack bonus for ranged attacks",
                                        "RANGED",
                                       "http://paizo.com/pathfinderRPG/prd/combat.html#ranged-attacks" );
  $staticHelp[ "reflex" ]    = array( "Saving throw to dodge area attacks",
                                        "REFLEX",
                                       "http://paizo.com/pathfinderRPG/prd/combat.html#saving-Throws" );
  $staticHelp[ "save dc" ]   = array( "Saving throw DC for spells",
                                        "Save<br />DC",
                                          "http://paizo.com/pathfinderRPG/prd/combat.html#saving-Throws" );
  $staticHelp[ "shield" ]    = array( "Shield owned by character",
                                        "Shield/Protective Item",
                                          "http://paizo.com/pathfinderRPG/prd/equipment/armor.htm#armorDescriptions" );
  $staticHelp[ "size" ]      = array( "Supported classes: (F)ine, (D)iminutive, (T)iny, (S)mall, (M)edium, (L)arge, (H)uge, (G)argantuan, (C)olossal",
                                        "Size",
                                       "http://paizo.com/pathfinderRPG/prd/combat/movementPositionAndDistance.htm#special-movement-rules" );
  $staticHelp[ "skills" ]    = array( "Character skills",
                                        "Skills",
                                          "http://paizo.com/pathfinderRPG/prd/skillDescriptions.html" );
  $staticHelp[ "special abilities" ] = array( "Special and class-related abilities",
                                        "Special abilities",
                                       "http://paizo.com/pathfinderRPG/prd/classes.html" );
  $staticHelp[ "spell resist" ] = array( "Spell resistance",
                                        "SPELL RESIST",
                                          "http://paizo.com/pathfinderRPG/prd/magic.html#spell-Resistance" );
  $staticHelp[ "spells" ]    = array( "Spells",
                                        "Spells",
                                          "http://paizo.com/pathfinderRPG/prd/spellLists.html" );
  $staticHelp[ "spellsknown"] = array( "Spells/Powers Known (Bards, Sorcerers, Psions &amp; Psi Warriors)",
                                       "Spells/Powers Known",
                                       "#");
  $staticHelp[ "str" ]       = array( "Strength",
                                        "STR",
                                       "http://paizo.com/pathfinderRPG/prd/gettingStarted.html#strength" );
  $staticHelp[ "total weight" ] = array( "Total weight of gear carried",
                                        "Total <br /> Weight",
                                       "http://paizo.com/pathfinderRPG/prd/additionalRules.html#carrying-Capacity" );
  $staticHelp[ "touch" ]     = array( "AC against Touch attacks",
                                        "TOUCH",
                                       "http://paizo.com/pathfinderRPG/prd/combat.html#Touch-Attacks" );
  $staticHelp[ "untrained skill" ] = array( "Skill check help for untrained skill",
                                        "untrained",
                                       "http://paizo.com/pathfinderRPG/prd/usingSkills.html" );
  $staticHelp[ "weapon" ]    = array( "Weapon owned by character",
                                        "Weapon",
                                       "http://paizo.com/pathfinderRPG/prd/equipment.html#weapons" );
  $staticHelp[ "weight" ]    = array( "Height and weight of character",
                                        "Weight",
                                       "http://paizo.com/pathfinderRPG/prd/additionalRules.html#vital-statistics" );
  $staticHelp[ "will" ]      = array( "Saving throw to resist magical/mental attacks",
                                        "WILL",
                                       "http://paizo.com/pathfinderRPG/prd/combat.html#saving-Throws" );
  $staticHelp[ "wis" ]       = array( "Wisdom",
                                        "WIS",
                                       "http://paizo.com/pathfinderRPG/prd/gettingStarted.html#wisdom" );

  $staticHelp[ "cmb" ]        = array ( "Combat Maneuver Bonus",
                                          "CMB",
                                          "http://paizo.com/pathfinderRPG/prd/combat.html#combat-maneuver-bonus" );


  $staticHelp[ "cmd" ]        = array ( "Combat Maneuver Defense",
                                          "CMD",
                                          "http://paizo.com/pathfinderRPG/prd/combat.html#combat-maneuver-defense" );

?>



