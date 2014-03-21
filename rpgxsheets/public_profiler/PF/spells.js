// spells.js

// Defines scripts used to maintain the spell list table.

function SpellSort(sortfunc)
{
  var tblrows = 
  [
    // Three child tables of the spells table, the  one is the spells
    // known table, which we don't care about, but get a reference to the
    // the rows of the remaining two tables.
    document.getElementById("spells").getElementsByTagName("table")[0].rows,
    document.getElementById("spells").getElementsByTagName("table")[1].rows
  ];
  
  // Copy the data from each of the items in the rows.
  debug.trace("Copying spell data...");
  var data = new Array();
  for (var i = 1; i <= 90; i++)
  {
    var num = FormatNumber(i);
    var thisdata = new Object();
    thisdata.spell = sheet()["Spell" + num].value;
    thisdata.mem = sheet()["Spell" + num + "Cast"].value;
    thisdata.level = sheet()["Spell" + num + "Level"].value;
    data.push(thisdata);
  }

  // Now sort the data according to the given sortfunc.
  debug.trace("Sorting spell data...");
  data.sort(sortfunc);

  // Finally, re-copy all the data.
  debug.trace("Copying sorted spell data...");
  for (var i = 1; i <= 90; i++)
  {
    var thisdata = data.shift();
    var num = FormatNumber(i);
    sheet()["Spell" + num].value = thisdata.spell;
    sheet()["Spell" + num + "Cast"].value = thisdata.mem;
    sheet()["Spell" + num + "Level"].value = thisdata.level;
  }

  debug.trace("Sorting complete.");
}

SpellSort.ByName = function(a, b)
{
  if ((a.spell.length == 0) && (b.spell.length == 0))
    return 0;
  else if (a.spell.length == 0)
    return 1;
  else if (b.spell.length == 0)
    return -1;
  return a.spell.localeCompare(b.spell);
}

SpellSort.ByLevel = function(a, b)
{
  if ((a.level.length == 0) && (b.level.length == 0))
    return SpellSort.ByName(a, b);
  else if (a.level.length == 0)
    return 1;
  else if (b.level.length == 0)
    return -1;
  var comp = a.level.localeCompare(b.level);
  if (comp)
    return comp;
  else
    return SpellSort.ByName(a, b);
}

SpellSort.ByMem = function(a, b)
{
  if ((a.mem.length == 0) && (b.mem.length == 0))
    return SpellSort.ByName(a, b);
  else if (a.mem.length == 0)
    return 1;
  else if (b.mem.length == 0)
    return -1;
  var comp = a.mem.localeCompare(b.mem);
  if (comp)
    return comp;
  else
    return SpellSort.ByName(a, b);
}

// Pops up a new window displaying help for a skill.  'node' is the name of the
// input element that contains the name of the skill.
function ShowSpellHelp(node)
{
  var skillName = document.getElementsByName(node)[0].value;
  var URL;

  URL = _RetrieveMatchingURL( skillName, spellsHelpURL )

  // Check to see if a matching skill was found.
  if ( URL == "" )
    return;

  window.open( URL );
  return;
}

/*

    Checks to see if a skill has a help URL associated with it.  If it does
    then the "help" link will be set to a '?'.  If there is no URL, then the
    link is set to a null string, basically hiding it.

    'node' is the name of the input field containing the skill text.

*/
function CheckForSpellHelp(node)
{
  var skillName = document.getElementsByName(node)[0].value;
  var link      = document.getElementsByName(node + "Link")[ 0 ];

  if ( _RetrieveMatchingURL( skillName, spellsHelpURL ) != "" )
  {
    link.innerHTML = "?";
  }
  else
  {
    link.innerHTML = "";
  }

  return;
}

var spellListHelp =
{
    'bard': [ /* 0 */"http://paizo.com/pathfinderRPG/prd/spellLists.html#Bard-Spells",
              /* 1 */"http://paizo.com/pathfinderRPG/prd/spellLists.html#Bard-Spells",  
              /* 2 */"http://paizo.com/pathfinderRPG/prd/spellLists.html#Bard-Spells",
              /* 3 */"http://paizo.com/pathfinderRPG/prd/spellLists.html#Bard-Spells",
              /* 4 */"http://paizo.com/pathfinderRPG/prd/spellLists.html#Bard-Spells",
              /* 5 */"http://paizo.com/pathfinderRPG/prd/spellLists.html#Bard-Spells",
              /* 6 */"http://paizo.com/pathfinderRPG/prd/spellLists.html#Bard-Spells",
              /* 7 */ "",
              /* 8 */ "",
              /* 9 */ ""],
    'cleric' : [ /* 0 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Cleric-Spells",
                 /* 1 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Cleric-Spells",
                 /* 2 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Cleric-Spells",
                 /* 3 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Cleric-Spells",
                 /* 4 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Cleric-Spells",
                 /* 5 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Cleric-Spells",
                 /* 6 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Cleric-Spells",
                 /* 7 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Cleric-Spells",
                 /* 8 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Cleric-Spells",
                 /* 9 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Cleric-Spells" ],
    'druid'  : [ /* 0 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Druid-Spells",
                 /* 1 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Druid-Spells",
                 /* 2 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Druid-Spells",
                 /* 3 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Druid-Spells",
                 /* 4 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Druid-Spells",
                 /* 5 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Druid-Spells",
                 /* 6 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Druid-Spells",
                 /* 7 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Druid-Spells",
                 /* 8 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Druid-Spells",
                 /* 9 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Druid-Spells" ],
    'paladin': [ /* 0 */ "",
                 /* 1 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Paladin-Spells",
                 /* 2 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Paladin-Spells",
                 /* 3 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Paladin-Spells",
                 /* 4 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Paladin-Spells",
                 /* 5 */ "",
                 /* 6 */ "",
                 /* 7 */ "",
                 /* 8 */ "",
                 /* 9 */ ""],
    'ranger' : [ /* 0 */ "",
                 /* 1 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Ranger-Spells",
                 /* 2 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Ranger-Spells",
                 /* 3 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Ranger-Spells",
                 /* 4 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Ranger-Spells",
                 /* 5 */ "",
                 /* 6 */ "",
                 /* 7 */ "",
                 /* 8 */ "",
                 /* 9 */ ""],
    'wizard' : [ /* 0 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Sorcerer-Wizard-Spells",
                 /* 1 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Sorcerer-Wizard-Spells",
                 /* 2 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Sorcerer-Wizard-Spells",
                 /* 3 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Sorcerer-Wizard-Spells",
                 /* 4 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Sorcerer-Wizard-Spells",
                 /* 5 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Sorcerer-Wizard-Spells",
                 /* 6 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Sorcerer-Wizard-Spells",
                 /* 7 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Sorcerer-Wizard-Spells",
                 /* 8 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Sorcerer-Wizard-Spells",
                 /* 9 */ "http://paizo.com/pathfinderRPG/prd/spellLists.html#Sorcerer-Wizard-Spells"]
};

// This table has the index into spellListHelp for each class.  This table is used
// because some classes have duplicate spell lists and because we must take into
// account the short names.
var spellClasses =
{
    'bard':     'bard',
    'brd':      'bard',
    'cleric':   'cleric',
    'clr':      'cleric',
    'druid':        'druid',
    'drd':      'druid',
    'paladin':  'paladin',
    'pal':      'paladin',
    'ranger':   'ranger',
    'rgr':      'ranger',
    'sorcerer': 'wizard',
    'sor':      'wizard',
    'wizard':   'wizard',
    'wiz':      'wizard'
};

// Default spells list page if no class/level page was found.
var spellsListPage = "http://paizo.com/pathfinderRPG/prd/spellLists.htm";

/*
    Display the list of spells for the class/level
*/
function ShowSpellListHelp( level )
{
  var link = "";  // Default to no link found.

  //  find the class name that matches a class from spellClasses.
  var className = sheet().Class.value.toLowerCase();
  for ( cl in spellClasses )
  {
    if ( className.indexOf( cl ) == 0 )
     {
       link = spellListHelp[ spellClasses[ cl ] ][ level ];
       break;
     }
  }

  if ( link == "" )
    link = spellsListPage;

  window.open( link );

}

function updateCast() {
    var i;
    for( i = 0; i <= 9; i++ ) {
        sheet()["SpellCast" + i].value = 0;
    }

    for( i = 1; i <= 90; i++ ) {
        var num = "" + i;
        if( num.length == 1 ) {
            num = "0" + num;
        }
        var spellLevel = "Spell" + num + "Level";
        var spellCast = "Spell" + num + "Cast";
        
        if( isNaN(sheet()[spellLevel].value) ) {
            continue;
        }
      
        var castCount = "SpellCast" + sheet()[spellLevel].value;

        var currentCount = parseInt("0");
        var newCount = parseInt("0");

        if( sheet()[castCount] ) {        
            currentCount = parseInt(sheet()[castCount].value);
            
            if( isNaN(currentCount) ) {
                parseInt("0");
            }
        }

        if( parseInt(sheet()[spellCast].value) ) {
            newCount = parseInt(sheet()[spellCast].value);
            if( isNaN(newCount) ) {
                newCount = parseInt("0");
            }
        }

        if( sheet()[castCount] ) {
            sheet()[castCount].value = currentCount + newCount;
        }
    }
}
