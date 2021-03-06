// class.js

// Implements global functions relating to the class input.

// Dependencies:
//    ogl/class.js

function _getClassBitSet()
{
  // Determine which classes the character has and return the bitset.
  var classes = sheet().Class.value.toLowerCase().split("/");
  var classbits = 0;
  for (var i = 0; i < classes.length; ++i)
  {
    classes[i] = classes[i].replace( /(\s+)|(\d+)/g, "" );
    if (classIndex[classes[i]])
      classbits |= classIndex[classes[i]];
  }
  return classbits;
}
