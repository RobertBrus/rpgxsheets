// xp.js

// Handles changes of XP.

// Dependencies:
//    general.js

// Event handler for changing the XP Change.
// The function reads the change in XP, then applies it to the current
// XP slot, also verifing if the next level XP should change.
function ApplyXPChange()
{
  if (disable_autocalc())
    return;

  // Ensure we have a value to change.
  if (!sheet().XPChange.value.length)
    return;

  // Parse the proper values from the sheet.
  var change = parseInt(sheet().XPChange.value);
  if (isNaN(change))
    return;

  var current = parseInt(sheet().XPCurrent.value);
  if (isNaN(current))
    current = 0;

  var updated = current + change;
  var XPRate = parseInt(sheet().XPRate.value);
  if (isNaN(XPRate))
    return;

  // Set the sheet.
  sheet().XPCurrent.value = updated;

  recalculatedValues = _XPForNextLevel(updated, XPRate);
  sheet().XPNext.value = recalculatedValues[0];
  sheet().cLevel.value = recalculatedValues[1]; // update hidden field
  document.getElementById('cLevel').innerHTML = recalculatedValues[1];

  debug.trace("Calculated total XP.");
  debug.trace("Calculated next level XP.");
}

// Sets the next level XP if the XP Rate is changed
function ApplyXPRateChange()
{
  if (disable_autocalc())
    return;

  // Ensure a rate is set, and that the rate is expected
  if (!sheet().XPRate.value in {'1':'','2':'','3':''})
    return;

  // Parse the proper values from the sheet.
  if (!sheet().XPCurrent.value.length)
    return;
  
  var XPCurrent = parseInt(sheet().XPCurrent.value);
  if (isNaN(XPCurrent))
    return;
  var XPRate = parseInt(sheet().XPRate.value);
  if (isNaN(XPRate))
    return;

  // Update the sheet
  recalculatedValues = _XPForNextLevel(XPCurrent, XPRate);
  sheet().XPNext.value = recalculatedValues[0];
  sheet().cLevel.value = recalculatedValues[1]; // update hidden field
  document.getElementById('cLevel').innerHTML = recalculatedValues[1];

}


// Sets the next level XP if the current XP is edited directly.
function ApplyXPNext()
{
  if (disable_autocalc())
    return;

  // Parse the proper values from the sheet.
  if (!sheet().XPCurrent.value.length)
    return;

  // Ensure a rate is set, and that the rate is expected
  if (!sheet().XPRate.value in {'1':'','2':'','3':''})
    return;

  var XPCurrent = parseInt(sheet().XPCurrent.value);
  if (isNaN(XPCurrent))
    return;
  var XPRate = parseInt(sheet().XPRate.value);
  if (isNaN(XPRate))
    return;

  // Update the sheet.
  var XPNext;
  var level;
  recalculatedValues = _XPForNextLevel(XPCurrent, XPRate);
  sheet().XPNext.value = recalculatedValues[0];
  sheet().cLevel.value = recalculatedValues[1]; // update hidden field
  document.getElementById('cLevel').innerHTML = recalculatedValues[1];
}

// Calculates the XP for the next level, based on the current XP.
function _XPForNextLevel(currentXP, rateOfXP)
{
  // Sanity check.
  if (typeof currentXP != "number")
    return "?";
  if (typeof rateOfXP != "number")
    return "?";

  slowArray = [0,3,7.5,14,23,35,53,77,115,160,235,330,475,665,955,1350,1900,2700,3850,5350];
  medArray = [0,2,5,9,15,23,35,52,75,105,155,220,315,445,635,890,1300,1800,2550,3600];
  fastArray = [0,1.3,3.3,6,10,15,23,34,50,71,105,145,210,295,425,600,850,1200,1700,2400];
  combinedArray = [ slowArray, medArray, fastArray];

  var level = 0;
  var nextLevelXP = 0;
  while (currentXP >= nextLevelXP)
    nextLevelXP = combinedArray[rateOfXP-1][level++]*1000;
  return [nextLevelXP, level-1];
}
