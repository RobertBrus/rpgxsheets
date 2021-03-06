// level.js

// Maintains level dependent fields.

// Dependencies:
//     general.js

// Updates all level dependencies.
function OnLevelChanged()
{
  // All we need to do is update the max ranks for the skills.

  if (disable_autocalc())
    return;

  // Determine the toal level of the character.
  var levels = sheet().Level.value.split("/");
  var totalLevel = 0;
  for (var i = 0; i < levels.length; ++i)
    totalLevel += isNaN(parseInt(levels[i])) ? 0 : parseInt(levels[i]);
  if (!totalLevel)
    return;

  sheet().MaxRank.value = totalLevel;

  debug.trace("Calculated max ranks.");
}
