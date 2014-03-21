// ab.js

// Implements functions used for maintining the attack bonus table.

// Dependencies:
//    debug.js
//    general.js

// void MBABCalc(void)
// Calculates the melee attack bonus.
function MBABCalc()
{
  if (disable_autocalc())
    return;

  ZeroFill(
    sheet().MABBase,
    sheet().MABStr,
    sheet().MABSize,
    sheet().MABMisc,
    sheet().MABTemp);

  sheet().MBAB.value = ParsedAdd(
    sheet().MABBase.value,
    sheet().MABStr.value,
    sheet().MABSize.value,
    sheet().MABMisc.value,
    sheet().MABTemp.value);

  debug.trace("Calculated melee base attack bonus.");
}

// void CMBBABCalc(void)
// Calculates the Combat Maneuver attack bonus.
function CMBBABCalc()
{
  if (disable_autocalc())
    return;
    
  ZeroFill(
    sheet().CMBBase,
    sheet().CMBStr,
    sheet().CMBSize,
    sheet().CMBMisc,
    sheet().CMBTemp);

  sheet().CMBBAB.value = ParsedAdd(
    sheet().CMBBase.value,
    sheet().CMBStr.value,
    sheet().CMBSize.value,
    sheet().CMBMisc.value,
    sheet().CMBTemp.value);

  debug.trace("Calculated CMB.");
}

// void CMDBABCalc(void)
// Calculates the Combat Maneuver attack bonus.
function CMDBABCalc() {
    if (disable_autocalc())
        return;

    ZeroFill(
    sheet().CMDBase,
    sheet().CMDStr,
    sheet().CMDDex,
    sheet().CMDSize,
    sheet().CMDMisc,
    sheet().CMDTemp);

    sheet().CMDBAB.value = 10 + Clean(ParsedAdd(
    sheet().CMDBase.value,
    sheet().CMDStr.value,
    sheet().CMDDex.value,
    sheet().CMDSize.value,
    sheet().CMDMisc.value,
    sheet().CMDTemp.value));

    debug.trace("Calculated CMD.");
}

// string ParsedAdd(string, ...)
// Parses the first string for multiple attack ratings, splitting it on
// each "/". Each attack fetched from this string is then parsed for an
// integer, which is summed with all consectutive inputs which are also
// scanned for integers.
function ParsedAdd(attackBase)
{
  var attackBases = attackBase.split("/");

  var attackBonuses = new Array();
  for (var i = 0; i < attackBases.length; ++i)
  {
    var addString = "\"" + attackBases[i] + "\"";
    for (var j = 1; j < arguments.length; j++) {
      addString += (", \"" + arguments[j] + "\"");
    }
    eval("attackBonuses[i] = Add(" + addString+ ");");
  }

  return attackBonuses.join("/");
}

// void RBABCalc(void)
// Calculates the ranged attack bonus.
function RBABCalc()
{
  if (disable_autocalc())
    return;

  ZeroFill(
    sheet().RABBase,
    sheet().RABDex,
    sheet().RABSize,
    sheet().RABMisc,
    sheet().RABTemp);

  sheet().RBAB.value = ParsedAdd(
    sheet().RABBase.value,
    sheet().RABDex.value,
    sheet().RABSize.value,
    sheet().RABMisc.value,
    sheet().RABTemp.value);

  debug.trace("Calculated ranged base attack bonus.");
}

// void SetBAB(node)
// Sets the MABBase input if the node passed is the RABBase input, or
// vice versa, then trigger the other inputs onchange event.
function SetBAB(node)
{
  var mod = node.value;
  if (node.name == "MABBase")
  {
    sheet().RABBase.value = mod;
    sheet().CMBBase.value = mod;
    sheet().CMDBase.value = mod;
    debug.trace("Copied BAB to the Grapple/Ranged BAB input.");
    RBABCalc();
    CMDBABCalc();
    CMBBABCalc();
  }
  else if (node.name == "CMDBase")
  {
    sheet().MABBase.value = mod;
    sheet().RABBase.value = mod;
    sheet().CMBBase.value = mod;
    debug.trace("Copied BAB to Melee/Range BAB input.");
    MBABCalc();
    RBABCalc();
    CMBBABCalc();
}
else if (node.name == "CMBBase") {
    sheet().MABBase.value = mod;
    sheet().RABBase.value = mod;
    sheet().CMDBase.value = mod;
    debug.trace("Copied BAB to Melee/Range BAB input.");
    MBABCalc();
    RBABCalc();
    CMDBABCalc();
}
  else if (node.name == "RABBase")
  {
    sheet().MABBase.value = mod;
    sheet().CMBBase.value = mod;
    sheet().CMDBase.value = mod;
    debug.trace("Copied BAB to Melee/Grapple BAB input.");
    MBABCalc();
    CMDBABCalc();
    CMBBABCalc();
  }
  else
    debug.traceErr("Incorrect node passed to <code>SetBAB</code>");
}
