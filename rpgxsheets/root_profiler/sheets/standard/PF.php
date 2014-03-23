<?php echo('<?xml version="1.0" encoding="iso-5589-1"?>');?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <?php

  // Textual help and links for english translation
  include_once("help_PF.php");

  function GetStaticHelp( $name, $staticHelp, $class = "help" )
  {
    $helpArray = $staticHelp[ strtolower( $name ) ];
    echo '<a href="' . $helpArray[ 2 ] . '" target="_blank" onmouseover="return overlib(\'';
    echo $helpArray[ 0 ];
    echo '\')" onmouseout="return nd();">';
      echo '<span class="' . $class . '">';
      echo $helpArray[ 1 ];
      echo '</span>';
    echo '</a>';
  }

  ?>

  <head>
    <title><?php echo $TITLE; PF ?></title>
    <link type="text/css" rel="stylesheet" href="PF/main.css" media="screen,print" />
    <!-- <link type="text/css" rel="stylesheet" href="PF/print.css" media="print" /> 
    <style type="text/css" media="print">
 
      #save
      , #notes tr.header span
      {
          display: none;
      }
    </style>-->
    <script type="text/javascript">var READONLY = <?php echo $READONLY ? "true" : "false"; ?>;</script>
    <script type="text/javascript" src="./PF/general.js"></script>
    <script type="text/javascript" src="./PF/debug.js"></script>
    <script type="text/javascript" src="./PF/prototype.js"></script>
    <script type="text/javascript" src="./PF/ogl/skills.js"></script>
    <script type="text/javascript" src="./PF/ogl/size.js"></script>
    <script type="text/javascript" src="./PF/ogl/capacity.js"></script>
    <script type="text/javascript" src="./PF/ogl/class.js"></script>
    <script type="text/javascript" src="./PF/skills.js"></script>
    <script type="text/javascript" src="./PF/ac.js"></script>
    <script type="text/javascript" src="./PF/ab.js"></script>
    <script type="text/javascript" src="./PF/saves.js"></script>
    <script type="text/javascript" src="./PF/capacity.js"></script>
    <script type="text/javascript" src="./PF/init.js"></script>
    <script type="text/javascript" src="./PF/gear.js"></script>
    <script type="text/javascript" src="./PF/abilities.js"></script>
    <script type="text/javascript" src="./PF/sheet.js"></script>
    <script type="text/javascript" src="./PF/spells.js"></script>
    <script type="text/javascript" src="./PF/xp.js"></script>
    <script type="text/javascript" src="./PF/level.js"></script>
    <script type="text/javascript" src="./PF/size.js"></script>
    <script type="text/javascript" src="./PF/class.js"></script>
    <script type="text/javascript" src="./PF/pic.js"></script>
    <script type="text/javascript" src="./PF/notes.js"></script>
    <script type="text/javascript" src="./PF/PF_statblock.js"></script>   	
    <script type="text/javascript" src="./PF/overlib.js"></script>
  </head>
  <body onload="init()" onunload="cleanup()">
  <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
 <form action="ajax_save.php" method="post" id="charactersheet">

<?php if ($SHOWSAVE) { ?>
<div id="buttons">
    <input type="image" src="./PF/save.png" title="Save Character" onclick="SetSaveDate(); Save(); return false;"/><br/>
    <input type="image" src="./PF/undo.png" title="Reset Changes" onclick="if( confirm('Are you sure you want to reset the character sheet? You will lose all changes you made since you last saved.')) { $('charactersheet').reset(); } return false;" /><br/>
</div>
<div id="processing">
    <img src="./PF/loading.gif" alt="loading..."/>
</div>
<?php } ?>

  <div>
    <input type="hidden" name="firstload" value="<?php echo isset($DATA['firstload']) ? "false" : "true"; ?>" />
    <input type="hidden" <?php getnv('PicURL'); ?> />
    <input type="hidden" name="id" value="<?php echo $CHARID; ?>" />
    <input type="hidden" <?php getnv('LastSaveDate'); ?> />
  </div>
<?php
$agent = $_SERVER['HTTP_USER_AGENT'];
$firefox = eregi("Firefox", $agent);
if( $firefox ) { echo ''; } ?>
 
    <table id="maintable">
      <tr>
        <td>
        </td>
        <td id="main">
<?php if( $firefox ) { echo ''; } ?>
          <!--
            table#info contains all the general information on the
            character that's found at the top of the character sheet.
          -->
		  <div class="break">
          <table id="logos"> 
          <tr>


<td class="edition">
<a href="/" target="_blank"><img src="./PF/logowithtext_white.png" border="0" alt="rpgcrossing.com" width="100" /></a></br>
<!-- <img src="./PF/pathfinder-logo-text2.gif" alt="pathfinder sheet" width="109" height="12" /> -->
PATHFINDER
</td>



<td>
          <table id="info" cellspacing="0">
            <tr>
              <td colspan="3"><input type="text" <?php getnv('Name'); ?> /><br />Character Name</td>
              <td colspan="2"><input type="text" <?php getnv('Player'); ?> /><br />Player</td>
              <td colspan="2"><input type="text" <?php getnv('Campaign'); ?> /><br />Campaign</td>
           </tr>
            <tr>
              <td colspan="3"><input type="text" <?php getnv('Class'); ?> /><br /><?php GetStaticHelp( "Class", $staticHelp ); ?></td>
              <td colspan="2"><input type="text" <?php getnv('Race'); ?> /><br /><?php GetStaticHelp( "Race", $staticHelp ); ?></td>
              <td colspan="1"><input type="text" <?php getnv('Alignment'); ?> /><br /><?php GetStaticHelp( "Alignment", $staticHelp ); ?></td>
              <td colspan="1"><input type="text" <?php getnv('Deity'); ?> /><br />Deity</td>

            </tr>
            <tr>
             <td class="smallunit"><input type="text" <?php getnv('Size'); ?> onchange="OnSizeChanged()" /><br /><?php GetStaticHelp( "Size", $staticHelp ); ?></td>
              <td class="smallunit"><input type="text" <?php getnv('Age'); ?> /><br /><?php GetStaticHelp( "Age", $staticHelp ); ?></td>
              <td class="smallunit"><input type="text" <?php getnv('Gender'); ?> /><br />Gender</td>
              <td class="unit"><input type="text" <?php getnv('Height'); ?> /><br /><?php GetStaticHelp( "Height", $staticHelp ); ?></td>
              <td class="unit"><input type="text" <?php getnv('Weight'); ?> /><br /><?php GetStaticHelp( "Weight", $staticHelp ); ?></td>
              <td class="unit"><input type="text" <?php getnv('Eyes'); ?> /><br />Eyes</td>
              <td class="unit"><input type="text" <?php getnv('Hair'); ?> /><br />Hair</td>
            </tr>
            <tr>
              <td class="smallunit">
                <span>CL </span><span id="cLevel"><?php getv('cLevel'); ?> </span>
                <input type="hidden" <?php getnv('cLevel'); ?> />
              </td>
              <td class="smallunit">
                <input type="text" <?php getnv('Level'); ?> onchange="OnLevelChanged()" /><br />HD
              </td>
              <td></td>

              <td><input type="text" <?php getnv('XPCurrent'); ?> onchange="ApplyXPNext()" /><br />Current XP</td>
              <td><input type="text" <?php getnv('XPChange'); ?> onchange="ApplyXPChange()" /><br />XP Change</td>
               <td><input type="text" <?php getnv('XPNext'); ?> /><br />Next Level XP</td>
              <td><select id="XPRate" name="XPRate" onchange="ApplyXPRateChange()">
            <option value="1" <?php if ($DATA['XPRate'] == '1') echo 'selected="selected"'; ?>>slow</option>
                <option value="2" <?php if ($DATA['XPRate'] == '2') echo 'selected="selected"'; ?>>medium</option>
                <option value="3" <?php if ($DATA['XPRate'] == '3') echo 'selected="selected"'; ?>>fast</option>
              </select>
              <br />XP Rate</td>
 
            </tr>
            </table> <!-- info -->
          
          </td></tr>

          </table> <!-- logos -->

          <!--
            table#stats contains the statblock, saves, the picture...
            The layout is 3 columns, 3 rows.

            *************************  1: Ability scores (rowspan=2)
            *       *               *  2: AC, HP (colspan=2)
            *       *       2       *  3: Initiative, speed, armor type
            *       *               *  4: Image, load (rowspan=2)
            *   1   *****************  5: Saves (colspan=2)
            *       *       *       *
            *       *   3   *       *
            *       *       *       *
            *****************   4   *
            *               *       *
            *       5       *       *
            *               *       *
            *************************
          -->

          <table id="stats" cellspacing="0">
            <tr>
              <td rowspan="2" class="unit top">

                <table id="statblock">
                  <tr>
                    <td class="header">Ability</td>
                    <td class="header">Score</td>
                    <td class="header">Mod</td>
                    <td class="header">Temp<br />Score</td>
                    <td class="header">Temp<br />Mod</td>
                  </tr>
                  <tr>
                    <td class="tag"><?php GetStaticHelp( "STR", $staticHelp ); ?></td>
                    <td><input type="text" <?php getnv('Str'); ?> class="mod" onchange="OnAbilityChanged(this)" /></td>
                    <td><input type="text" <?php getnv('StrMod'); ?> class="mod" /></td>
                    <td><input type="text" <?php getnv('StrTemp'); ?> class="tempmod" onchange="OnAbilityChanged(this)" /></td>
                    <td><input type="text" <?php getnv('StrTempMod'); ?> class="tempmod" /></td>
                  </tr>
                  <tr>
                    <td class="tag"><?php GetStaticHelp( "DEX", $staticHelp ); ?></td>
                    <td><input type="text" <?php getnv('Dex'); ?> class="mod" onchange="OnAbilityChanged(this)" /></td>
                    <td><input type="text" <?php getnv('DexMod'); ?> class="mod" /></td>
                    <td><input type="text" <?php getnv('DexTemp'); ?> class="tempmod" onchange="OnAbilityChanged(this)" /></td>
                    <td><input type="text" <?php getnv('DexTempMod'); ?> class="tempmod" /></td>
                  </tr>
                  <tr>
                    <td class="tag"><?php GetStaticHelp( "CON", $staticHelp ); ?></td>
                    <td><input type="text" <?php getnv('Con'); ?> class="mod" onchange="OnAbilityChanged(this)" /></td>
                    <td><input type="text" <?php getnv('ConMod'); ?> class="mod" /></td>
                    <td><input type="text" <?php getnv('ConTemp'); ?> class="tempmod" onchange="OnAbilityChanged(this)" /></td>
                    <td><input type="text" <?php getnv('ConTempMod'); ?> class="tempmod" /></td>
                  </tr>
                  <tr>
                    <td class="tag"><?php GetStaticHelp( "INT", $staticHelp ); ?></td>
                    <td><input type="text" <?php getnv('Int'); ?> class="mod" onchange="OnAbilityChanged(this)" /></td>
                    <td><input type="text" <?php getnv('IntMod'); ?> class="mod" /></td>
                    <td><input type="text" <?php getnv('IntTemp'); ?> class="tempmod" onchange="OnAbilityChanged(this)" /></td>
                    <td><input type="text" <?php getnv('IntTempMod'); ?> class="tempmod" /></td>
                  </tr>
                  <tr>
                    <td class="tag"><?php GetStaticHelp( "WIS", $staticHelp ); ?></td>
                    <td><input type="text" <?php getnv('Wis'); ?> class="mod" onchange="OnAbilityChanged(this)" /></td>
                    <td><input type="text" <?php getnv('WisMod'); ?> class="mod" /></td>
                    <td><input type="text" <?php getnv('WisTemp'); ?> class="tempmod" onchange="OnAbilityChanged(this)" /></td>
                    <td><input type="text" <?php getnv('WisTempMod'); ?> class="tempmod" /></td>
                  </tr>
                  <tr>
                    <td class="tag"><?php GetStaticHelp( "CHA", $staticHelp ); ?></td>
                    <td><input type="text" <?php getnv('Cha'); ?> class="mod" onchange="OnAbilityChanged(this)" /></td>
                    <td><input type="text" <?php getnv('ChaMod'); ?> class="mod" /></td>
                    <td><input type="text" <?php getnv('ChaTemp'); ?> class="tempmod" onchange="OnAbilityChanged(this)" /></td>
                    <td><input type="text" <?php getnv('ChaTempMod'); ?> class="tempmod" /></td>
                  </tr>
        <tr>
		<td class="tag" colspan="3"><?php GetStaticHelp( "HERO POINTS", $staticHelp ); ?></td>		
		<td colspan="2"><input type="text" class="mod" <?php getnv('AP'); ?> /></td>
        </tr>
        <tr>
             	<td colspan="5">&nbsp;</td>
        </tr>
        </table> <!-- statblock -->

              </td>
              <td colspan="2" class="top">

                <table id="hp">
                  <tr>
                    <td />
                    <td class="header" colspan="2">TOTAL</td>
                    <td />
                    <td class="header" colspan="2">Current HP</td>
                    <td />
                    <td class="header" colspan="2"><?php GetStaticHelp( "Nonlethal Damage", $staticHelp, "helplink" ); ?></td>
                    <td />
                    <td class="header" colspan="10"><?php GetStaticHelp( "Dmg Red", $staticHelp, "helplink" ); ?></td>
                  </tr>
                  <tr>
                    <td class="tag"><?php GetStaticHelp( "HP", $staticHelp ); ?></td>
                    <td colspan="2"><input type="text" <?php getnv('HP'); ?> /></td>
                    <td />
                    <td colspan="2"><input type="text" <?php getnv('HPWounds'); ?> /></td>
                    <td />
                    <td colspan="2"><input type="text" <?php getnv('HPSub'); ?> /></td>
                    <td />
                    <td colspan="10"><input type="text" <?php getnv('DamageRed'); ?> /></td>
                  </tr>
                  <tr>
                    <td class="tag"><?php GetStaticHelp( "AC", $staticHelp ); ?></td>
                    <td class="unit"><input type="text" <?php getnv('AC'); ?> /></td>
                    <td class="char">=</td>
                    <td class="basenum"><span>10</span></td>
                    <td class="char">+</td>
                    <td class="unit"><input type="text" <?php getnv('ACArmor'); ?> onchange="ACCalc()" /></td>
                    <td class="char">+</td>
                    <td class="unit"><input type="text" <?php getnv('ACShield'); ?> onchange="ACCalc()" /></td>
                    <td class="char">+</td>
                    <td class="unit"><input type="text" <?php getnv('ACOther'); ?> onchange="ACCalc()" /></td>
                    <td class="char">+</td>
                    <td class="unit"><input type="text" <?php getnv('ACDex'); ?> onchange="ACCalc();" /></td>
                    <td class="char">+</td>
                    <td class="unit"><input type="text" <?php getnv('ACSize'); ?> onchange="ACCalc()" /></td>
                    <td class="char">+</td>
                    <td class="unit"><input type="text" <?php getnv('ACNat'); ?> onchange="ACCalc()" /></td>
                    <td class="char">+</td>
                    <td class="unit"><input type="text" <?php getnv('ACDeflect'); ?> onchange="ACCalc()" /></td>
                    <td class="char"><span class="dark">+</span></td>
                    <td class="unit"><input type="text" <?php getnv('ACMisc'); ?> onchange="ACCalc()" /></td>
                  </tr>
                  <tr>
                    <td />
                    <td class="footer">TOTAL</td>
                    <td />
                    <td />
                    <td />
                    <td class="footer">Armor</td>
                    <td />
                    <td class="footer">Shield</td>
                    <td />
                    <td class="footer">Other</td>
                    <td />
                    <td class="footer">Dex</td>
                    <td />
                    <td class="footer">Size</td>
                    <td />
                    <td class="footer">Natural</td>
                    <td />
                    <td class="footer">Deflect</td>
                    <td />
                    <td class="footer">Misc</td>
                  </tr>
                  </table> <!-- hp -->

              </td>
            </tr>
            <tr>
              <td class="unit bottom">

                <table id="init">
                  <tr>
                    <td class="tag"><?php GetStaticHelp( "TOUCH", $staticHelp ); ?></td>
                    <td class="unit"><input type="text" <?php getnv('TouchAC'); ?> /></td>
                    <td class="char"> </td>
                    <td class="tag"><?php GetStaticHelp( "FLAT", $staticHelp ); ?></td>
                    <td class="char"> </td>
                    <td class="unit"><input type="text" <?php getnv('FFAC'); ?> /></td>
                  </tr>
                  <tr>
                    <td />
                    <td class="header">Total</td>
                    <td />
                    <td class="header">Dex</td>
                    <td />
                    <td class="header">Misc</td>
                  </tr>
                  <tr>
                    <td class="tag"><?php GetStaticHelp( "INIT", $staticHelp ); ?></td>
                    <td class="unit"><input type="text" <?php getnv('Init'); ?> /></td>
                    <td class="char">=</td>
                    <td class="unit"><input type="text" <?php getnv('InitDex'); ?> onchange="InitCalc()" /></td>
                    <td class="char">+</td>
                    <td class="unit"><input type="text" <?php getnv('InitMisc'); ?> onchange="InitCalc()" /></td>
                  </tr>
                </table> <!-- init -->

                <table id="speed">
                  <tr>
                    <td><input type="text" <?php getnv('Speed'); ?> /></td>
                    <td><input type="text" <?php getnv('Armor'); ?> /></td>
                  </tr>
                  <tr>
                    <td class="footer">Speed</td>
                    <td class="footer">Armor Type</td>
                  </tr>
                  </table> <!-- speed -->

              </td>
              <td rowspan="2">

                <table id="imgload">
                  <tr>
                    <td rowspan="7" class="piccell"><img id="pic" src="PF/click.png" alt="Character Portrait" onclick="SetPic()" /></td>
                    <td class="loadtext title"><?php GetStaticHelp( "Total Weight", $staticHelp, "helplink"); ?></td>
                    <td><input type="text" <?php getnv('TotalWeight'); ?> /></td>
                  </tr>
                  <tr>
                    <td class="loadtext title">Light<br />Load</td>
                    <td class="loadinputs"><input type="text" <?php getnv('LightLoad'); ?> /></td>
                  </tr>
                  <tr>
                    <td class="loadtext title">Med<br />Load</td>
                    <td><input type="text" <?php getnv('MediumLoad'); ?> /></td>
                  </tr>
                  <tr>
                    <td class="loadtext title">Max<br />Load</td>
                    <td><input type="text" <?php getnv('HeavyLoad'); ?> /></td>
                  </tr>
                  <tr>
                    <td class="loadtext title">Over<br />Head</td>
                    <td><input type="text" <?php getnv('LiftOverHead'); ?> /></td>
                  </tr>
                  <tr>
                    <td class="loadtext title">Off<br />Ground</td>
                    <td><input type="text" <?php getnv('LiftOffGround'); ?> /></td>
                  </tr>
                  <tr>
                    <td class="loadtext title">Push/<br />Drag</td>
                    <td><input type="text" <?php getnv('LiftPushDrag'); ?> /></td>
                  </tr>
                  </table> <!-- imgload -->

              </td>
            </tr>
            <tr>
              <td colspan="2" class="bottom">

                <table id="saves">
                  <tr>
                    <td class="header">Saving Throws</td>
                    <td />
                    <td class="header">Total</td>
                    <td />
                    <td class="header">Base</td>
                    <td />
                    <td class="header">Ability<br />Mod</td>
                    <td />
                    <td class="header">Magic<br />Mod</td>
                    <td />
                    <td class="header">Misc<br />Mod</td>
                    <td />
                    <td class="header">Temp<br />Mod</td>
                  </tr>
                  <tr>
                    <td class="tag"><?php GetStaticHelp( "FORTITUDE", $staticHelp ); ?></td>
                    <td />
                    <td class="unit"><input type="text" <?php getnv('Fort'); ?> /></td>
                    <td class="char"><span class="dark">=</span></td>
                    <td class="unit"><input type="text" <?php getnv('FortBase'); ?> onchange="SaveCalc('Fort')" /></td>
                    <td class="char"><span class="dark">+</span></td>
                    <td class="unit"><input type="text" <?php getnv('FortAbility'); ?> onchange="SaveCalc('Fort')" /></td>
                    <td class="char"><span class="dark">+</span></td>
                    <td class="unit"><input type="text" <?php getnv('FortMagic'); ?> onchange="SaveCalc('Fort')" /></td>
                    <td class="char"><span class="dark">+</span></td>
                    <td class="unit"><input type="text" <?php getnv('FortMisc'); ?> onchange="SaveCalc('Fort')" /></td>
                    <td class="char"><span class="dark">+</span></td>
                    <td class="unit"><input type="text" class="temp" <?php getnv('FortTemp'); ?> onchange="SaveCalc('Fort')" /></td>
                  </tr>
                  <tr>
                    <td class="tag"><?php GetStaticHelp( "REFLEX", $staticHelp ); ?></td>
                    <td />
                    <td><input type="text" <?php getnv('Reflex'); ?> /></td>
                    <td class="char"><span class="dark">=</span></td>
                    <td><input type="text" <?php getnv('ReflexBase'); ?> onchange="SaveCalc('Reflex')" /></td>
                    <td class="char"><span class="dark">+</span></td>
                    <td><input type="text" <?php getnv('ReflexAbility'); ?> onchange="SaveCalc('Reflex')" /></td>
                    <td class="char"><span class="dark">+</span></td>
                    <td><input type="text" <?php getnv('ReflexMagic'); ?> onchange="SaveCalc('Reflex')" /></td>
                    <td class="char"><span class="dark">+</span></td>
                    <td><input type="text" <?php getnv('ReflexMisc'); ?> onchange="SaveCalc('Reflex')" /></td>
                    <td class="char"><span class="dark">+</span></td>
                    <td><input type="text" class="temp" <?php getnv('ReflexTemp'); ?> onchange="SaveCalc('Reflex')" /></td>
                  </tr>
                  <tr>
                    <td class="tag"><?php GetStaticHelp( "WILL", $staticHelp, "big help" ); ?></td>
                    <td />
                    <td><input type="text" <?php getnv('Will'); ?> /></td>
                    <td class="char"><span class="dark">=</span></td>
                    <td><input type="text" <?php getnv('WillBase'); ?> onchange="SaveCalc('Will')" /></td>
                    <td class="char"><span class="dark">+</span></td>
                    <td><input type="text" <?php getnv('WillAbility'); ?> onchange="SaveCalc('Will')" /></td>
                    <td class="char"><span class="dark">+</span></td>
                    <td><input type="text" <?php getnv('WillMagic'); ?> onchange="SaveCalc('Will')" /></td>
                    <td class="char"><span class="dark">+</span></td>
                    <td><input type="text" <?php getnv('WillMisc'); ?> onchange="SaveCalc('Will')" /></td>
                    <td class="char"><span class="dark">+</span></td>
                    <td><input type="text" class="temp" <?php getnv('WillTemp'); ?> onchange="SaveCalc('Will')" /></td>
                  </tr>
                  </table> <!-- saves -->

              </td>
            </tr>
            </table> <!-- stats -->

          <!--
            table#attacks contains the base melee and ranged attack bonuses.
          -->

   <table id="attacks">
      <tr>
              <td />
              <td class="header">Total Bonus</td>
              <td />
              <td class="header">BAB</td>
              <td />
              <td class="header">Str Mod</td>
              <td />
              <td class="header">Dex Mod</td>
              <td />
              <td class="header">Size Mod</td>
              <td />
              <td class="header">Misc Mod</td>
              <td />
              <td class="header">Temp Mod</td>
              <td></td>
              <td></td>
              <td></td>
      </tr>
      <tr>
              <td class="tag"><?php GetStaticHelp( "MELEE", $staticHelp ); ?></td>
              <td class="medwide"><input type="text" <?php getnv('MBAB'); ?> /></td>
              <td class="char">=</td>
              <td class="unit"><input type="text" <?php getnv('MABBase'); ?> onchange="MBABCalc(); SetBAB(this);" /></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" <?php getnv('MABStr'); ?> onchange="MBABCalc()" /></td>
              <td class="char">+</td>
              <td class="gray"></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" <?php getnv('MABSize'); ?> onchange="MBABCalc()" /></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" <?php getnv('MABMisc'); ?> onchange="MBABCalc()" /></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" class="temp" <?php getnv('MABTemp'); ?> onchange="MBABCalc()" /></td>
              <td class="char"></td>
              
              <td class="tag" colspan="2"><?php GetStaticHelp( "SPELL RESIST", $staticHelp ); ?></td>
      </tr>
      <tr>
              <td class="tag"><?php GetStaticHelp( "RANGED", $staticHelp ); ?></td>
              <td class="medwide"><input type="text" <?php getnv('RBAB'); ?> /></td>
              <td class="char">=</td>
              <td class="unit"><input type="text" <?php getnv('RABBase'); ?> onchange="RBABCalc(); SetBAB(this)" /></td>
              <td class="char">+</td>
              <td class="gray"></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" <?php getnv('RABDex'); ?> onchange="RBABCalc()" /></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" <?php getnv('RABSize'); ?> onchange="RBABCalc()" /></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" <?php getnv('RABMisc'); ?> onchange="RBABCalc()" /></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" class="temp" <?php getnv('RABTemp'); ?> onchange="RBABCalc()" /></td>
              <td class="char"></td>
              <td class="wide" colspan="2"><input type="text" <?php getnv('SpellResist'); ?> /></td>
        </tr>
       <tr>
              <td class="tag"><?php GetStaticHelp( "CMB", $staticHelp ); ?></td>
              <td class="medwide"><input type="text" <?php getnv('CMBBAB'); ?> /></td>
              <td class="char">=</td>
              <td class="unit"><input type="text" <?php getnv('CMBBase'); ?> onchange="CMBBABCalc(); SetBAB(this);" /></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" <?php getnv('CMBStr'); ?> onchange="CMBBABCalc()" /></td>
              <td class="char">+</td>
              <td class="gray"></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" <?php getnv('CMBSize'); ?> onchange="CMBBABCalc()" /></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" <?php getnv('CMBMisc'); ?> onchange="CMBBABCalc()" /></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" class="temp" <?php getnv('CMBTemp'); ?> onchange="CMBBABCalc()" /></td>
              <td class="char"></td>

              <td class="unit" align="left" nowrap="nowrap">Weapons:
              </td>
              <td class="unit" align="center" nowrap="nowrap">

         <?php for ( $i = 1; $i <= 4; $i++ ) { ?>
<input type="checkbox" <?php getnc('Wep'.$i.'Disp'); ?> onclick="ToggleDisplay('we<?php echo $i ?>', this);" style="width:15px; border:none;"/>
         <?php } ?>

              </td>
      </tr>
              
 
			<tr>
              <td class="tag"><?php GetStaticHelp( "CMD", $staticHelp ); ?></td>
              <td class="medwide"><input type="text" <?php getnv('CMDBAB'); ?> /></td>
              <td class="char">=</td>
              <td class="unit">
                <table>
                  <tr>
                    <td class="basenum"><span>10</span></td>
                    <td class="char">+</td>
                    <td width="100%"><input type="text" <?php getnv('CMDBase'); ?> onchange="CMDBABCalc(); SetBAB(this);" /></td>
                  </tr>
                </table>
              </td>
              <td class="char">+</td>
              <td class="unit"><input type="text" <?php getnv('CMDStr'); ?> onchange="CMDBABCalc()" /></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" <?php getnv('CMDDex'); ?> onchange="CMDBABCalc()" /></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" <?php getnv('CMDSize'); ?> onchange="CMDBABCalc()" /></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" <?php getnv('CMDMisc'); ?> onchange="CMDBABCalc()" /></td>
              <td class="char">+</td>
              <td class="unit"><input type="text" class="temp" <?php getnv('CMDTemp'); ?> onchange="CMDBABCalc()" /></td>

              <td class="char"></td>
              <td class="unit" nowrap="nowrap">Armor:&nbsp;&nbsp;&nbsp;&nbsp;
              </td>
              <td class="unit" align="center" nowrap="nowrap">
         <?php for ( $i = 1; $i <= 4; $i++ ) { ?>
<input type="checkbox" <?php getnc('Arm'.$i.'Disp'); ?> onclick="ToggleDisplay('ar<?php echo $i ?>', this);" style="width:15px; border:none;"/>
         <?php } ?>
              </td>
     </tr>
     </table> <!-- attacks -->

          <!--
            table.weapon are weapon slots.
          -->

          <?php
          for ( $i = 1; $i <= 4; $i++ )
          {
             $weaponName = sprintf( "Weapon%d", $i );
          ?>

     <div id="we<?php echo $i ?>">
          <table class="weapon" cellspacing="0">
            <tr class="header">
              <td class="type wide"><?php GetStaticHelp( "Weapon", $staticHelp ); ?></td>
              <td class="small">Wielded</td>
              <td class="small">Carried</td>
              <td class="medium">Total Attack Bonus</td>
              <td class="small">Damage</td>
              <td class="small">Critical</td>
              <td class="small">Range</td>
            </tr>
            <tr>
              <td><input class="left" <?php getnv($weaponName); ?> /></td>
              <td><input type="checkbox" <?php getnc($weaponName . 'Wielded'); ?> onchange="ChangeWeapon(true)"/></td>
              <td><input type="checkbox" <?php getnc($weaponName . 'Carried'); ?> onchange="ChangeWeapon(false)"/></td>
              <td><input <?php getnv($weaponName . 'AB'); ?> /></td>
              <td><input <?php getnv($weaponName . 'Damage'); ?> /></td>
              <td><input <?php getnv($weaponName . '1Crit'); ?> /></td>
              <td><input <?php getnv($weaponName . 'Range'); ?> /></td>
            </tr>
            <tr class="header">
              <td colspan="3">Special Properties</td>
              <td>Ammunition</td>
              <td>Weight</td>
              <td>Size</td>
              <td>Type</td>
            </tr>
            <tr>
              <td colspan="3"><input class="left" <?php getnv($weaponName . 'Special'); ?> /></td>
              <td><input <?php getnv($weaponName . 'Ammo'); ?> /></td>
              <td><input <?php getnv($weaponName . 'Weight'); ?> onchange="CalcWeight();" /></td>
              <td><input <?php getnv($weaponName . 'Size'); ?> /></td>
              <td><input <?php getnv($weaponName . 'Type'); ?> /></td>
            </tr>
          </table>
          </div>
          <?php
          }
          ?>

          <!--
            table.armor are armor slots.
          -->

          <?php
          for ( $i = 1; $i <= 4; $i++ )
          {
             $armorName = sprintf( "Armor%d", $i );

             if ( $i == 1 )
                $armorTitle = "armor1";
             else if ( $i == 2 )
                $armorTitle = "Shield";
             else
                $armorTitle = "armor2";
          ?>
          <div id="ar<?php echo $i ?>">
          <table class="armor" cellspacing="0">
            <tr class="header">
              <td class="type wide"><?php GetStaticHelp( $armorTitle, $staticHelp ); ?></td>
                <td class="small">Worn</td>
                <td class="small">Carried</td>
              <td class="medium">Type</td>
              <td class="small">AC Bonus</td>
              <td class="small">Check Pen</td>
            </tr>
            <tr>
              <td><input class="left" <?php getnv($armorName . 'Name'); ?> /></td>
              <td class="small"><input type="checkbox" <?php getnc($armorName . 'Worn'); ?> onchange="ACChangeArmor(); SkillsUpdateCheckPen()" /></td>
              <td class="small"><input type="checkbox" <?php getnc($armorName . 'Carried'); ?> onchange="ACChangeCarried()"  /></td>
              <td><input <?php getnv($armorName . 'Type'); ?> /></td>
              <td class="medium"><input <?php getnv($armorName . 'Bonus'); ?> onchange="ACChangeArmor()" /></td>
              <td class="medium"><input <?php getnv($armorName . 'Check'); ?> onchange="SkillsUpdateCheckPen()" /></td>
            </tr>
            <tr class="header">
              <td colspan="2">Special Properties</td>
              <td>Weight</td>
              <td>Speed</td>
              <td>Spell Fail</td>
              <td class="small">Max Dex</td>
            </tr>
            <tr>
              <td colspan="2"><input class="left" <?php getnv($armorName . 'Special'); ?> /></td>
              <td><input <?php getnv($armorName . 'Weight'); ?> onchange="CalcWeight();" /></td>
              <td><input <?php getnv($armorName . 'Speed'); ?> /></td>
              <td><input <?php getnv($armorName . 'Spell'); ?> /></td>
              <td><input <?php getnv($armorName . 'Dex'); ?> onchange="ACCheckMaxDex();" /></td>
            </tr>
          </table>
          </div>
          <?php
          }
          ?>
          </div>
          <div class="break">


          <!--
            table#skillsandgear holds both the skills and gear tables
          -->

          <table id="skillsandgear">
            <tr>
              <td id="skillcontainer">

                <table id="skills" cellspacing="0" cellpadding="0" onmouseover="Show('skillcontext', true)" onmouseout="Show('skillcontext', false)">
                  <tr class="title">
                    <td></td>
                    <td colspan="14">
                      <div id="skillranks">
                        <div>
                          <input type="text" <?php getnv('MaxRank'); ?> />
                        </div>
                        Max Rank
                      </div>
                      <?php GetStaticHelp( "Skills", $staticHelp ); ?>
                      <span id="skillcontext">
                      <?php if (!$READONLY) { ?>
                        [ <a href="javascript:SkillAutoFill()" title="Fill table with the core 3.5E skills.">Auto Fill</a> | <a href="javascript:SkillsUpdateCC();" title="Determine which skills are class skills.">Update CS</a> | <a href="javascript:SkillClear()" title="Clear the entire contents of this table.">Clear</a> ]
                      <?php } ?>
                      </span>
                    </td>
                  </tr>

                  <tr class="header">
                    <td></td>
                    <td class="name"><a href="javascript:SkillSort(SkillSort.ByName)" title="Sort by Skill Name">Skill Name</a></td>
                    <td><a href="javascript:SkillSort(SkillSort.ByAbility)" title="Sort by Key Ability">Key<br />Ab</a></td>
                    <td><a href="javascript:SkillSort(SkillSort.ByCC)" title="Sort by Class">CS</a></td>
                    <td><a href="javascript:SkillSort(SkillSort.ByMod)" title="Sort by Skill Modifier">Skill<br />Mod</a></td>
                    <td />
                    <td><a href="javascript:SkillSort(SkillSort.ByAbMod)" title="Sort by Ability Modifier">Ab<br />Mod</a></td>
                    <td />
                    <td><a href="javascript:SkillSort(SkillSort.ByRank)" title="Sort by Rank">Rank</a></td>
                    <td />
                    <td><a href="javascript:SkillSort(SkillSort.ByMisc)" title="Sort by Miscelaneous Modifier">Misc<br />Mod</a></td>
                    <td />
                    <td>Check<br />Pen</td>
                    <td />
                    <td>CS<br />Mod</td>
                  </tr>

                  <?php

                   // Loop 41 times and output the skills lines.
                   for ( $i = 1; $i <= 41; $i++ )
                   {
                     $skillName = sprintf( "Skill%02d", $i );
                  ?>

                  <tr class="skillslot">
                    <td>
                    <a href="#" name="<?php echo $skillName; ?>Link"
                       onclick="ShowHelp('<?php echo $skillName; ?>');return false;"></a>
                    </td>
                    <td class="name">
                       <input class="text" type="text" <?php getnv($skillName); ?>
                              onchange="SkillLookUp(this)" />
                    </td>
                    <td class="unit">
                      <input class="text" type="text" <?php getnv($skillName . 'Ab'); ?>
                      onchange="SkillLookUpKeyAb('<?php echo $skillName; ?>');"  />
                      
                      </td>
                    <td class="char">
                      <input class="chk" type="checkbox" <?php getnc($skillName . 'CC'); ?>
                      onchange="SkillLookUpKeyAb('<?php echo $skillName; ?>');" />
                    </td>
                    <td class="unit">
                      <input class="text" type="text" <?php getnv($skillName . 'Mod'); ?> />
                    </td>
                    <td class="char">=</td>
                    <td class="unit">
                      <input class="text" type="text" <?php getnv($skillName . 'AbMod'); ?>
                             onchange="SkillCalc(this)" />
                    </td>
                    <td class="char">+</td>
                    <td class="unit">
                      <input class="text" type="text" <?php getnv($skillName . 'Rank'); ?>
                             onchange="SkillCalc(this);SkillCalcRanks();" />
                    </td>
                    <td class="char">+</td>
                    <td class="unit">
                      <input class="text" type="text" <?php getnv($skillName . 'MiscMod'); ?>
                             onchange="SkillCalc(this)" />
                    </td>
                    <td class="char">+</td>
                    <td class="unit">
                      <input class="text" type="text" <?php getnv($skillName . 'CheckPen'); ?>
                             onchange="SkillCalc(this)" readonly="readonly" />
                    </td>
                    <td class="char">+</td>
                    <td class="unit">
                      <input class="text" type="text" <?php getnv($skillName . 'CSMod'); ?>
                             onchange="SkillCalc(this)" readonly="readonly" />
                    </td>

                  </tr>

                  <?php
                   } // for...
                  ?>

                  <tr class="footer">
                    <td></td>
                    <td>Total Skill Points:</td>
                    <td />
                    <td />
                    <td />
                    <td />
                    <td />
                    <td />
                    <td class="total"><span id="totalranks">0</span></td>
                    <td />
                    <td />
                    <td />
                    <td />
                    <td />
                  </tr>


                </table>
              </td>

              <td class="spacer"></td>

              <td id="gearcontainer">

                <table id="gear" cellspacing="0">
                  <tr class="title">
                    <td colspan="3"><?php GetStaticHelp( "Other Possessions", $staticHelp ); ?></td>
                  </tr>
                  <tr class="header">
                    <td class="name"><a href="javascript:GearSort(GearSort.ByName)" title="Sort by Item">Item</a></td>
                    <td class="unit"><a href="javascript:GearSort(GearSort.ByWeight)" title="Sort by Weight">Weight<br />(lbs)</a></td>
                    <td class="unit"><a href="javascript:GearSort(GearSort.ByLoc)" title="Sort by Location">Loc</a></td>
                  </tr>

<?php for ( $i = 1; $i <= 43; $i++ ) { $gearName = sprintf( "Gear%02d", $i ); ?>
                  <tr class="slot">
                    <td><input class="name" type="text" <?php getnv($gearName); ?> /></td>
                    <td><input type="text" <?php getnv($gearName . 'W'); ?> onchange="CalcWeight()" /></td>
                    <td><input type="text" <?php getnv($gearName . 'Loc'); ?> /></td>
                  </tr>
<?php } ?>
                  <tr class="footer">
                    <td>Total Weight:</td>
                    <td class="total"><span id="bagWeight">0</span></td>
                    <td />
                  </tr>
                </table>

              </td>
            </tr>
          </table> <!-- skillsandgear -->
		  </div>
          <div class="break">
                <!--
                  table#feats is the feats table.
                -->
                <table id="feats">
                  <tr class="title">
                    <td colspan="3"><?php GetStaticHelp( "Feats", $staticHelp ); ?> &amp; <?php GetStaticHelp( "Special Abilities", $staticHelp ); ?></td>
                  </tr>
                  <tr>
                    <td>

                      <!--
                        Keep each column in a table to enforce a vertical tab order.
                        It's easier to do this rather than specify the tab order of
                        each of the thousand or so inputs.
                      -->

                      <table cellspacing="0">
                        <?php

                         // Loop 30 times and output the feats/abilities lines.
                         for ( $i = 1; $i <= 51; $i++ ) {
                           $featName = sprintf( "Feat%02d", $i );
                         ?>

                           <tr>
                              <td class="featshelp">
                                 <a href="#" name="<?php echo $featName; ?>Link"
                                        onclick="ShowHelp('<?php echo $featName; ?>');return false;"></a>
                              </td>
                              <td><input type="text" onchange="CheckForHelp('<?php echo $featName; ?>')"
                                         <?php getnv( $featName ); ?> />
                              </td>
                           </tr>

                           <?php
                            // After the 17th and 34th feat start a new table.
                           if ( $i == 17 || $i == 34 ) {
                           ?>

                             </table>
                             </td><td>
                             <table cellspacing="0">
                        <?php
                           }
                          } // for...
                        ?>

                      </table>

                    </td>

                  </tr>
                </table>


          <p />
          <p><input type="checkbox" <?php getnc('MagicDisp'); ?> onchange="ToggleDisplay('magic', this);" style="width:15px; border:none;"/>
          Display Spells &amp; Powers</p>
          </div>
		  <div class="break">
		  <div id="magic">

          

          <!--
            Page 3 stuff, Spell Saves, Spells & Powers, Currency, Language...
          -->

          <table id="spellstuff" cellspacing="0">
            <tr>
              <td class="saves">

                <table id="spellsaves" cellspacing="0">
                  <tr class="title">
                    <td colspan="5">Spell Saves</td>
                  </tr>
                  <tr class="header">
                    <td><?php GetStaticHelp( "save dc", $staticHelp, "helplink" ); ?></td>
                    <td class="level">LEVEL</td>
                    <td>Spells<br />/Day</td>
                    <td><?php GetStaticHelp( "bonus spells", $staticHelp, "helplink" ); ?></td>
                    <td>Cast<br />/Mem</td>
                  </tr>
                  <?php for ( $i = 0; $i <= 9; $i++ ) { ?>

                  <tr class="save">
                    <td><input type="text" <?php getnv('SpellDC' . $i ); ?> /></td>
                    <td class="level" onclick="ShowSpellListHelp(<?php echo $i; ?>)"
                        title="Level <?php echo $i; ?> spells">
                         <?php echo $i; ?>
                    </td>
                    <td><input type="text" <?php getnv('SpellPerDay' . $i ); ?> /></td>
                  <?php if ( $i == 0 ) { ?>
                    <td class="noinput"><?php echo $i; ?></td>
                  <?php } else { ?>
                    <td><input type="text" <?php getnv('BonusSpells' . $i); ?> /></td>
                  <?php } ?>
                    <td><input type="text" readonly="readonly" style="border:none; font-size:1em;" <?php getnv('SpellCast' . $i); ?>/></td>
                  </tr>

                  <?php } ?>

                  <tr class="header">
                    <td colspan="5">
                      <table cellspacing="0" class="spellsknown">
                        <tr class="title">
                          <td colspan="5"><?php GetStaticHelp("spellsKnown",$staticHelp ); ?></td>
                        </tr>
                        <?php for( $sp = 0; $sp <= 9; $sp++ ) { ?>
                        <tr>
                          <td><?php echo 'Level ' . $sp; ?>
                            <input type="text" <?php getnv('SpellsKnown' . $sp); ?> />
                          </td>
                        </tr>
                        <?php } ?>
                      </table>

                    </td>
                  </tr>

                </table>

              </td>
              <td class="list" rowspan="3">

                <table id="spells" cellspacing="0">
                  <tr class="title">
                    <td colspan="3"><?php GetStaticHelp( "Spells", $staticHelp ); ?> &amp; Powers</td>
                  </tr>
                  <tr>

         <?php
          for ( $i = 1; $i <= 135; $i++ ) {
            $spellName = sprintf( "Spell%02d", $i );
            if ( $i % 45 == 1 ) { ?>

                    <td>
                      <table cellspacing="0" class="spelllist">
                        <tr class="header">
                          <td>&nbsp;</td>
                          <td><a href="javascript:SpellSort(SpellSort.ByName)" title="Sort by Spell Name">Spell Name</a></td>
                          <td><a href="javascript:SpellSort(SpellSort.ByLevel)" title="Sort by Spell Level">Level</a></td>
                          <td class="mem"><a href="javascript:SpellSort(SpellSort.ByMem)" title="Sort by Number of times cast, memorized, or manifested"># Cast<br />/Mem</a></td>
                        </tr>
      <?php } ?>

                        <tr>
                          <td>
                             <a href="#" name="<?php echo $spellName; ?>Link"
                                  onclick="ShowSpellHelp('<?php echo $spellName; ?>');return false;"></a>
                          </td>
                          <td class="name"><input type="text" <?php getnv($spellName); ?>
                              onchange="CheckForSpellHelp('<?php echo $spellName; ?>')" /></td>
                          <td class="mem"><input type="text" <?php getnv($spellName . 'Level' ); ?> /></td>
                          <td class="mem"><input type="text" <?php getnv($spellName . 'Cast' ); ?> onchange="updateCast();"/></td>
                        </tr>

                     <?php
                          if ( $i % 45 == 0 )
                          {
                     ?>

                      </table>
                    </td>
                     <?php
                          }
                       }
                     ?>
                  </tr>
                </table>

              </td>
            </tr>
          </table>
     </div>

	 </div>
     <div class="break">

     <table id="notes">
       <tr class="header">
         <td width="25%">Currency</td>
         <td width="75%">Other Notes <span>[ <a href="javascript:ShowNotes();">Show Printable Version</a> ]</span></td>
       </tr>
        <tr class="spellsknown">
         <td align="center">
          <table>
           <tr><th>Personal</th><th>Party</th></tr>
           <tr><td><input onchange="SumCash();" class="cash" <?php getnv('CashPP' ); ?> /> pp</td>
               <td><input onchange="SumCash();" class="cash" <?php getnv('CashPPParty' ); ?> /> pp</td></tr>
           <tr><td><input onchange="SumCash();" class="cash" <?php getnv('CashGP' ); ?> /> gp</td>
               <td><input onchange="SumCash();" class="cash" <?php getnv('CashGPParty' ); ?> /> gp</td></tr>
           <tr><td><input onchange="SumCash();" class="cash" <?php getnv('CashSP' ); ?> /> sp</td>
               <td><input onchange="SumCash();" class="cash" <?php getnv('CashSPParty' ); ?> /> sp</td></tr>
           <tr><td><input onchange="SumCash();" class="cash" <?php getnv('CashCP' ); ?> /> cp</td>
               <td><input onchange="SumCash();" class="cash" <?php getnv('CashCPParty' ); ?> /> cp</td></tr>
           <tr><td colspan="2"><hr /></td></tr>
           <tr><td><input class="cash" readonly="readonly" <?php getnv('CashTotal' ); ?> /> gp</td>
               <td><input class="cash" <?php getnv('CashTotalParty' ); ?> /> gp</td></tr>
          </table>
            <textarea <?php getn('Cash'); ?> style="width:160px; height:50px;"><?php getv('Cash'); ?></textarea></td>
              <td rowspan="2"><textarea name="Notes" title="Notes" style="width:500px; height:500px;"><?php getv('Notes'); ?></textarea></td>
       </tr>
            <tr>
         <td>
      <table id="languages" cellspacing="0">
                  <tr class="title"><td>Languages</td></tr>
        <?php for( $i = 1; $i <= 8; $i++ ) { ?>
        <tr><td><input type="text" <?php getnv('Lang' . $i); ?> /></td></tr>
        <?php } ?>
                </table>
         </td>
            </tr>
     </table>

	<!-- Private notes and Stat Block will not be displayed unless we are in edit mode -->
		<?php if ($SHOWSAVE) { ?>
				  
	<table id="statsummary" onmouseover="Show('statblockcontext', true)" onmouseout="Show('statblockcontext', false)" style="width: 100%;">
		<tr class="header">
			<td colspan="2">
				Statistic Block 
				<span id="statblockcontext">
					[ <a href="javascript:GenerateStatblock()" title="Fill the Statblock with your current character's statistics.">Generate Statblock</a> ]
				</span>
			</td>
		</tr>
		<tr>
			<td colspan="2"><textarea name="statsummary" title="statsummary" cols="10" rows="20" style="height:260px;"><?php getv('statsummary'); ?></textarea></td>
		</tr>
		<tr class="header">
			<td width="50%">Conditions</td>
			<td width="50%">Additional Stat Block Information</td>
		</tr>
		<tr>
			<td width="25%"><textarea  name="text1" title="text1" cols="10" rows="10"><?php getv('text1'); ?></textarea></td>
			<td width="25%"><textarea  name="text2" title="text2" cols="10" rows="10"><?php getv('text2'); ?></textarea></td>
		</tr>
	</table>
          	  
          	  
	<table id="notes">
		<tr class="header">
			<td>
				Private Notes <span>(Will not be displayed publically)</span>
			</td>
		</tr>
		<tr>
			<td><textarea  name="PrivateNotes" title="PrivateNotes" cols="10" rows="5"><?php getv('PrivateNotes'); ?></textarea></td>
		</tr>
	</table>
	
          <?php } ?>

          <div id="footer">
            <table width="100%" cellspacing="0">
               <tr>
                  <td align="left">Last saved = <?php getv("LastSaveDate"); ?></td>
                  <TD align="right">3.5 sheet RPG Crossing - 2014</TD>
               </TR>
               <TR>
                  <TD></TD>
                  <TD align="right">Piazo Pathfinder SRD help compiled by JJ Wolven</TD>
               </TR>
            </table>
          </div>

          <?php if ($SHOWSAVE) { ?>
          <div id="save">
            <input type="reset" value="Reset Changes" onclick="return confirm('Are you sure you want to reset the character sheet? You will lose all changes you made since you last saved.')" />
            &nbsp;&nbsp;
            <input type="submit" value="Save Changes" onclick="SetSaveDate(); Save(); return false;" />
          </div>
          <?php } ?>

<?php if( $firefox ) { echo ''; } ?>
          </td>
        <td>
        </td>
      </tr>
    </table>
<?php if( $firefox ) { echo ''; } ?>
</div>
  </form>

</html>
