// 35_statblock.js
// Generates a statblock with one click of ease.
// Fill the statblock field with automatically parsed stats.

function GenerateStatblock() {
    if (!confirm("Generate Statblock will replace your current Statblock textfield with information from your character sheet.\n\nAre you sure to continue?")) return;
 
    // Declares optional elements in the Statblock
    var pic = "";
    var dr = "";
    var armor1 = "";
    var armor2 = "";
    var armor3 = "";
    var armor4 = "";
    var ac = "";
    var actype = "";
    var w1 = "";
    var w2 = "";
    var w3 = "";
    var w1n = "";
    var w2n = "";
    var w3n = "";

    var finalStat = ""; // Output String.
    var statArray = new Array(); // Array of Information.
    statArray = [
    String(sheet().PicURL.value),
    String(sheet().Name.value), //01
    "SheetURL", // This is defined by a string separately.
    String(sheet().Gender.value),
    String(sheet().Alignment.value),
    String(sheet().Race.value), //05
    String(sheet().Class.value),
    String(sheet().Level.value),
    String(sheet().Init.value),
    String(sheet().HPWounds.value),
    String(sheet().HP.value), //10
    String(sheet().DamageRed.value),
    String(sheet().Armor1Name.value),
    String(sheet().Armor1Special.value),
    String(sheet().Armor2Name.value),
    String(sheet().Armor2Special.value), //15
    String(sheet().Armor3Name.value),
    String(sheet().Armor3Special.value),
    String(sheet().Armor4Name.value),
    String(sheet().Armor4Special.value),
    String(sheet().AC.value), //20
    String(sheet().ACArmor.value),
    String(sheet().ACShield.value),
    String(sheet().ACOther.value),
    String(sheet().ACDex.value),
    String(sheet().ACSize.value), //25
    String(sheet().ACDeflect.value),
    String(sheet().ACNat.value),
    String(sheet().ACMisc.value),
    String(sheet().Fort.value),
    String(sheet().Reflex.value), //30
    String(sheet().Will.value),
    String(sheet().Weapon1Special.value),
    String(sheet().Weapon1.value),
    String(sheet().Weapon1AB.value),
    String(sheet().Weapon1Damage.value), //35
    String(sheet().Weapon11Crit.value),
    String(sheet().Weapon1Ammo.value),
    String(sheet().Weapon2Special.value),
    String(sheet().Weapon2.value),
    String(sheet().Weapon2AB.value), //40
    String(sheet().Weapon2Damage.value),
    String(sheet().Weapon21Crit.value),
    String(sheet().Weapon2Ammo.value),
    String(sheet().Weapon3Special.value),
    String(sheet().Weapon3.value), //45
    String(sheet().Weapon3AB.value),
    String(sheet().Weapon3Damage.value),
    String(sheet().Weapon31Crit.value),
    String(sheet().Weapon3Ammo.value),
    String(sheet().Weapon4Special.value), //50
    String(sheet().Weapon4.value),
    String(sheet().Weapon4AB.value),
    String(sheet().Weapon4Damage.value),
    String(sheet().Weapon41Crit.value),
    String(sheet().Weapon4Ammo.value), //55
    String(sheet().MBAB.value),
    String(sheet().Str.value),
    String(sheet().Dex.value),
    String(sheet().Con.value),
    String(sheet().Int.value), //60
    String(sheet().Wis.value),
    String(sheet().Cha.value),
    String(sheet().StrTemp.value),
    String(sheet().DexTemp.value),
    String(sheet().ConTemp.value), //65
    String(sheet().IntTemp.value),
    String(sheet().WisTemp.value),
    String(sheet().ChaTemp.value),
    String(sheet().Speed.value),
    String(sheet().TouchAC.value), //70
    String(sheet().FFAC.value),
    String(sheet().text1.value), //This is Condition and Effects.		
    String(sheet().text2.value),  //This is Additional Info
    String(sheet().StrMod.value),
    String(sheet().DexMod.value),	//75
    String(sheet().ConMod.value),
    String(sheet().IntMod.value),
    String(sheet().WisMod.value),
    String(sheet().ChaMod.value),
    String(sheet().Skill29Mod.value),	//80
    String(sheet().Skill39Mod.value),
    String(sheet().Armor1Bonus.value),
    String(sheet().Armor2Bonus.value),
    String(sheet().Armor3Bonus.value),
    String(sheet().Armor4Bonus.value)];	//85	 	


    // ***** Produce the URL link of the character sheet.	 
    statArray[2] = "http://www.4ibw.com/profiler/view.php?id=" + String(sheet().id.value);

    // ***** Parse the information into individual parts. Checking for empty values. Clan some stats and prep them for Stat Block.

    // ***** Picture *****
    if (statArray[0] == " ") pic = "";
    else pic = "[IMGL]" + statArray[0] + "[/IMGL] ";

    // ***** Hit Points *****
    if (statArray[9] == " ") statArray[9] = statArray[10];

    if (statArray[9] / statArray[10] < 0.5) chp = "[COLOR='RED'][B] " + statArray[9] + "[/B][/COLOR]";
    else {
        chp = "[COLOR='GREEN'][B] " + statArray[9] + "[/B][/COLOR]";
    }

    // ***** Damage Reduction *****	

    if (statArray[11] == " ") dr = "";
    else dr = ", [B]DR[/B] " + statArray[11];

    // ***** Armor *****		

    if (statArray[12] == "") armor1 = "";
    else {
    	armor1 = "[B]Armor Slot 1:[/B] " + statArray[13] + " " + statArray[12] + " [B]AC Bonus:[/B] (" + statArray[82] + ")\n";
    }

    if (statArray[14] == "") armor2 = "";
    else {
    	armor2 = "[B]Armor Slot 2:[/B] " + statArray[15] + " " + statArray[14] + " [B]AC Bonus:[/B] (" + statArray[83] + ")\n";
    }

    if (statArray[16] == "") armor3 = "";
    else {
    	armor3 = "[B]Armor Slot 3:[/B] " + statArray[17] + " " + statArray[16] + " [B]AC Bonus:[/B] (" + statArray[84] + ")\n";
    }

    if (statArray[18] == "") armor4 = "";
    else {
    	armor4 = "[B]Armor Slot 4:[/B] " + statArray[19] + " " + statArray[18] + " [B]AC Bonus:[/B] (" + statArray[85] + ")\n";
    }

    // ***** AC *****		

    if (statArray[70] != " ") statArray[70] = ", [B]Touch:[/B] " + statArray[70];
    else statArray[70] = "";

    if (statArray[71] != " ") statArray[71] = ", [B]Flat-footed:[/B] " + statArray[71] + " (" + statArray[75] + " Dex)";
    else statArray[71] = "";

    // ***** Weapons *****

    if (statArray[37] != " ") statArray[37] = " (" + statArray[37] + ") ";

    if (statArray[43] != " ") statArray[43] = " (" + statArray[43] + ") ";

    if (statArray[49] != " ") statArray[49] = " (" + statArray[49] + ") ";

    if (statArray[55] != " ") statArray[55] = " (" + statArray[55] + ") ";

    w1n = String(statArray[32] + " , " + statArray[33] + statArray[37]);
    w2n = String(statArray[38] + " , " + statArray[39] + statArray[43]);
    w3n = String(statArray[44] + " , " + statArray[45] + statArray[49]);
    w4n = String(statArray[50] + " , " + statArray[51] + statArray[55]);

    if (statArray[33] == "") w1 = "";
    else {
        w1 = "[B]Weapon Slot 1:[/B] " + w1n + "[B]Attack/Damage: [/B]" + statArray[34] + " (" + statArray[35] + ", " + statArray[36] + ")\n";
    }

    if (statArray[39] == "") w2 = "";
    else {
        w2 = "[B]Weapon Slot 2:[/B] " + w2n + "[B]Attack/Damage: [/B]" + statArray[40] + " (" + statArray[41] + ", " + statArray[42] + ")\n";
    }

    if (statArray[45] == "") w3 = "";
    else {
        w3 = "[B]Weapon Slot 3:[/B] " + w3n + "[B]Attack/Damage: [/B]" + statArray[46] + " (" + statArray[47] + ", " + statArray[48] + ")\n";
    }

    if (statArray[51] == "") w4 = "";
    else {
        w4 = "[B]Weapon Slot 1:[/B] " + w4n + "[B]Attack/Damage: [/B]" + statArray[52] + " (" + statArray[53] + ", " + statArray[54] + ")\n";
    }

    // ***** Conditions and Additional Information *****

    if (statArray[72] != " ") statArray[72] = "[B]Conditions:[/B] " + statArray[72] + "\n";
    else {
        statArray[72] = "[B]Conditions:[/B] None \n";
    }

    if (statArray[73] != " ") statArray[73] = "[B]Additional Information:[/B] " + statArray[73] + "\n";
    else {
        statArray[73] = "[B]Additional Information:[/B] None \n";
    }

    // ***** Construct the Statblock *****

    finalStat = String(
    //pic + 
	//"[URL=" + statArray[2] + "][B][SIZE=+1]" + statArray[1] + "[/SIZE][/B][/URL]\n" + 
	//statArray[3] + " " + statArray[4] + " " + statArray[5] + " " + statArray[6] + ", [B]Level:[/B] " + statArray[7] + ", [B]Init:[/B] " + statArray[8] + ", [B]HP:[/B] " + chp + "/" + statArray[10] + dr + ", [B]Speed:[/B] " + statArray[69] + "\n" + 
	//"[B]AC:[/B] " + statArray[20] + statArray[70] + statArray[71] + ", [B]Fort:[/B] " + statArray[29] + ", [B]Ref:[/B] " + statArray[30] + ", [B]Will:[/B] " + statArray[31] + ", [B]Base Attack Bonus[/B] " + statArray[56] + "\n"	+ 
	//w1 + 
	//w2 + 
	//w3 + 
	//w4 + 
	//armor1 + 
	//armor2 + 
	//armor3 + 
	//armor4 +
    //"[B]Abilities:[/B] Str " + statArray[57] + ", Dex " + statArray[58] + ", Con " + statArray[59] + ", Int " + statArray[60] + ", Wis " + statArray[61] + ", Cha " + statArray[62] + "\n" + 
	//statArray[72] + 
	//statArray[73]);

	"[SPOILERBUTTON='Short Statblock for " + statArray[1] + "']" + "\n" + 
	"[FIELDSET='Quick Stats for " + statArray[1] + "']" + pic + "[URL=" + statArray[2] + "][B][SIZE=+1]" + statArray[1] + "[/SIZE][/B][/URL] " + statArray[3] + " " + statArray[4] + " " + statArray[5] + " " + statArray[6] + ", [B]Level:[/B] " + statArray[7] + "\n" +
	"[B]Abilities:[/B] Str " + statArray[57] + " (" + statArray[74] + ")" + ", Dex " + statArray[58] + " (" + statArray[75] + ")" +  ", Con " + statArray[59] + " (" + statArray[76] + ")" +  ", Int " + statArray[60] + " (" + statArray[77] + ")" +  ", Wis " + statArray[61] + " (" + statArray[78] + ")" +  ", Cha " + statArray[62] + " (" + statArray[79] + ")" +  
	"[hr][/hr]DEFENSE[hr][/hr]" +
	"[B]AC:[/B] " + statArray[20] + statArray[70] + statArray[71] + "\n" +
	"[B]Skills:[/B] Listen (" + statArray[80] + ") Spot (" + statArray[81] + ") [B]Init:[/B] " + statArray[8] + " " + " [B]Speed:[/B] " + statArray[69]  + dr + "\n" +
	"[B]HP:[/B] " + chp + "/" + statArray[10] + "\n" +
	"[B]Fort:[/B] " + statArray[29] + ", [B]Ref:[/B] " + statArray[30] + ", [B]Will:[/B] " + statArray[31] + "\n" + 
	armor1 + 
	armor2 + 
	armor3 + 
	armor4 +
	"[hr][/hr]OFFENSE[hr][/hr]" + 
	"[B]Base Attack Bonus[/B] " + statArray[56] + "\n"	+
	w1 + 
	w2 + 
	w3 + 
	w4 + 
	"[hr][/hr]NOTES[hr][/hr]" + 
	statArray[72] + 
	statArray[73] +
	"[/FIELDSET][/SPOILERBUTTON]");	
	
    // ***** Output the Statblock *****

    sheet().statsummary.value = finalStat;
}