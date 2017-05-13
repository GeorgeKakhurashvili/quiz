function ShowPopUp(wtd,catid,catpic) {
	if (wtd == 'addchild') {
		catname = document.getElementById('addchcatname_'+catid).value;
		CloseOther();
		document.getElementById('addchild').style.display = 'block';
		document.getElementById('addchcatname').innerHTML = catname;
		document.getElementById('parentid').value = catid;
	}
	if (wtd == 'rencat') {
		catname = document.getElementById('rencatname_'+catid).value;
		CloseOther();
		document.getElementById('rencat').style.display = 'block';
		document.getElementById('rencatname').innerHTML = catname;
		document.getElementById('rencatid').value = catid;
		document.getElementById('newtitle').value = catname;
		document.getElementById('catid').value = catid;
		document.getElementById('catpic').src = catpic;
		document.getElementById('catpiclink').href = catpic;
		//document.getElementById('newparentid').value = catid;
	}
}

function ShowHide(blockid) { // Expand or collapse the Item/Cat tree
	blockelid = 'catholder_' + blockid;
	imageelid = 'expcall_' + blockid;
	block = document.getElementById(blockelid).style.display;
	
	if (block == 'none') {
		document.getElementById(blockelid).style.display = 'block';
		document.getElementById(imageelid).src = '/images/collapse.png';
		document.getElementById(imageelid).alt = 'Collapse';
		document.getElementById(imageelid).title = 'Collapse';
	}
	
	if (block == 'block') {
		document.getElementById(blockelid).style.display = 'none';
		document.getElementById(imageelid).src = '/images/expand.png';
		document.getElementById(imageelid).alt = 'Expand';
		document.getElementById(imageelid).title = 'Expand';
	}
	
}

function ShowItemPopUp(wtd,catid,rate,hours,pic) {
	if (wtd == 'additem') {
		catname = document.getElementById('additmcatname_'+catid).value;
		CloseOther();
		document.getElementById('additem').style.display = 'block';
		document.getElementById('additemcatname').innerHTML = catname;
		document.getElementById('itemparentid').value = catid;
	}
	if (wtd == 'renitem') {
		catname = document.getElementById('renitmcatname_'+catid).value;
		itemname = document.getElementById('renitmname_'+catid).value;
		itemdesc = document.getElementById('renitmdesc_'+catid).value;
		CloseOther();
		document.getElementById('renitem').style.display = 'block';
		document.getElementById('renitemcatname').innerHTML = catname;
		document.getElementById('renitemid').value = catid;
		document.getElementById('itemid').value = catid;
		document.getElementById('newitemtitle').value = itemname;
		document.getElementById('edititemdesc').value = itemdesc;
		document.getElementById('editrate').value = rate;
		document.getElementById('edithours').value = hours;
		document.getElementById('itempic').src = upfilesdir2 + pic;
		document.getElementById('imagelink').href = upfilesdir2 + pic;
	}
}

function CopyItemPopUp(copyitemid) {
	CloseOther();
	copyitemname = document.getElementById('copyitemname_'+copyitemid).value;;
	document.getElementById('copyitem').style.display = 'block';
	document.getElementById('copyitemname').innerHTML = copyitemname;
	document.getElementById('copyitemid').value = copyitemid;
}

function DelItemPopUp(delitemid) {
	CloseOther();
	document.getElementById('delitem').style.display = 'block';
	document.getElementById('delitemid').value = delitemid;
}

function DelCatPopUp(delcatid) {
	CloseOther();
	document.getElementById('delcat').style.display = 'block';
	document.getElementById('delcatid').value = delcatid;
}

function CantDelCatPopUp() {
	CloseOther();
	document.getElementById('cantdelcat').style.display = 'block';
}

function CloseBlock(wtcid) {
	document.getElementById(wtcid).style.display = 'none';
}

function CloseOther() {
	document.getElementById('addchild').style.display = 'none';
	document.getElementById('rencat').style.display = 'none';
	document.getElementById('additem').style.display = 'none';
	document.getElementById('renitem').style.display = 'none';
	document.getElementById('copyitem').style.display = 'none';
	document.getElementById('delitem').style.display = 'none';
	
	/* Hide alert mesages */
	for(i=1;i<=10;i++) {
		msgid = 'msg'+i;
		document.getElementById(msgid).style.display = 'none';
	}
	/* ------------------ */
}


/* --- Event handlers --- */
function CheckCMCatFld() {
	if(document.getElementById('mcatname').value == '') {
		document.getElementById('mcatname').style.backgroundColor = '#F33';
		alert('Please, enter the category name!');
	} else { SubmitForm('cnmcat'); }
}

function CheckRenItemForm() { // Check Rename Item form
	isempty = 'no';
	if (document.getElementById('newitemtitle').value == '') {
		document.getElementById('msg1').style.display = 'inline';
		document.getElementById('newitemtitle').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	if (document.getElementById('edititemdesc').value == '') {
		document.getElementById('msg2').style.display = 'inline';
		document.getElementById('edititemdesc').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	
	x = document.getElementById('edithours').value;
	if (!isNumeric(x)) {
		document.getElementById('msg3').style.display = 'inline';
		document.getElementById('edithours').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	
	if(isempty != 'yes') { SubmitForm('renitemform'); }
}

function CheckRenCatForm() { // Check Rename Category form
	isempty = 'no';
	if (document.getElementById('newtitle').value == '') {
		document.getElementById('msg4').style.display = 'inline';
		document.getElementById('newtitle').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	
	if(isempty != 'yes') { SubmitForm('rencatform'); }
}

function CheckCSubCatForm() {
	isempty = 'no';
	if (document.getElementById('childtitle').value == '') {
		document.getElementById('msg5').style.display = 'inline';
		document.getElementById('childtitle').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	if (document.getElementById('catpicfile1').value == '') {
		document.getElementById('msg6').style.display = 'inline';
		document.getElementById('catpicfile1').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	
	if(isempty != 'yes') { SubmitForm('addchildform'); }
}

function CheckCItemForm() {
	isempty = 'no';
	if (document.getElementById('itemtitle').value == '') {
		document.getElementById('msg7').style.display = 'inline';
		document.getElementById('itemtitle').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	if (document.getElementById('itemdesc').value == '') {
		document.getElementById('msg8').style.display = 'inline';
		document.getElementById('itemdesc').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	if (document.getElementById('itempicfile1').value == '') {
		document.getElementById('msg10').style.display = 'inline';
		document.getElementById('itempicfile1').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	
	x = document.getElementById('hours').value;
	if (!isNumeric(x)) {
		document.getElementById('msg9').style.display = 'inline';
		document.getElementById('hours').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	
	if(isempty != 'yes') { SubmitForm('additemform'); }
}

function CheckCUserForm() { // Used for both Create new user form and Edit new user form
	isempty = 'no';
	if (document.getElementById('name').value == '') {
		document.getElementById('msg11').style.display = 'inline';
		document.getElementById('name').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	if (document.getElementById('user').value == '') {
		document.getElementById('msg12').style.display = 'inline';
		document.getElementById('user').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	if (document.getElementById('pass').value == '') {
		document.getElementById('msg13').style.display = 'inline';
		document.getElementById('pass').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	if (document.getElementById('userrole').value == 'selectone') {
		document.getElementById('msg14').style.display = 'inline';
		document.getElementById('userrole').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	
	if(isempty != 'no') { return false; }
}

function CheckCCustForm() { // Used for both Create new customer form and Edit customer form
	isempty = 'no';
	if (document.getElementById('name_vic').value == '') {
		document.getElementById('msg15').style.display = 'inline';
		document.getElementById('name_vic').style.border = 'solid 1px #F33';
		//document.getElementById('login').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	if (document.getElementById('num_of_quest').value == '') {
		document.getElementById('msg16').style.display = 'inline';
		document.getElementById('num_of_quest').style.border = 'solid 1px #F33';
		//document.getElementById('email').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	// if (document.getElementById('password').value == '') {
	// 	document.getElementById('msg17').style.display = 'inline';
	// 	document.getElementById('password').style.border = 'solid 1px #F33';

	// 	//document.getElementById('password').style.backgroundColor = '#F33';
	// 	isempty = 'yes';
	// }
	// if (document.getElementById('confirm_password').value == '') {
	// 	document.getElementById('msg18').style.display = 'inline';
	// 	document.getElementById('confirm_password').style.border = 'solid 1px #F33';
	// 	//document.getElementById('confirm_password').style.backgroundColor = '#F33';
	// 	isempty = 'yes';
	// }
	
	// if (document.getElementById('firstname').value == '') {
	// 	document.getElementById('msg19').style.display = 'inline';
	// 	document.getElementById('firstname').style.border = 'solid 1px #F33';
	// 	//document.getElementById('firstname').style.backgroundColor = '#F33';
	// 	isempty = 'yes';
	// }
	// if (document.getElementById('lastname').value == '') {
	// 	document.getElementById('msg20').style.display = 'inline';
	// 	document.getElementById('lastname').style.border = 'solid 1px #F33';
	// 	//document.getElementById('lastname').style.backgroundColor = '#F33';
	// 	isempty = 'yes';
	// }
	if(isempty != 'yes') { SubmitForm('cncust'); }
	
}


function CheckCCustForm2() { // Used for both Create new customer form and Edit customer form
	isempty = 'no';

	if (document.getElementById('person_first_name').value == '') {
		document.getElementById('msg25').style.display = 'inline';
		document.getElementById('person_first_name').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	if (document.getElementById('person_last_name').value == '') {
		document.getElementById('msg26').style.display = 'inline';
		document.getElementById('person_last_name').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	if (document.getElementById('person_phone').value == '') {
		document.getElementById('msg27').style.display = 'inline';
		document.getElementById('person_phone').style.backgroundColor = '#F33';
		isempty = 'yes';
	}
	if (document.getElementById('person_extension').value == '') {
		document.getElementById('msg28').style.display = 'inline';
		document.getElementById('person_extension').style.backgroundColor = '#F33';
		isempty = 'yes';
	}	
	if (document.getElementById('person_email').value == '') {
		document.getElementById('msg29').style.display = 'inline';
		document.getElementById('person_email').style.backgroundColor = '#F33';
		isempty = 'yes';
	}	
	if (document.getElementById('person_position').value == '') {
		document.getElementById('msg30').style.display = 'inline';
		document.getElementById('person_position').style.backgroundColor = '#F33';
		isempty = 'yes';
	}	
	if(isempty != 'yes') { SubmitForm('cncust'); }
}


/* --- */
function msgOff(id,fldid) {
	msgid = 'msg'+id;
	document.getElementById(msgid).style.display = 'none';
	document.getElementById(fldid).style.borderColor = '#e5e5e5';
	document.getElementById(fldid).style.borderWidth = '2px';
	
}

function SubmitForm(formname) {
	document.getElementById(formname).submit();
}

function isNumeric(n) { // Determine if a number is a Numeric character or not
  return !isNaN(parseFloat(n)) && isFinite(n); 
}


/* --- */

/* ---------------------- */




