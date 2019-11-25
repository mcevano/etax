
    function openDialog(modalOuter, modalInner) {
     
        $('#' + 'container').hide();
        $('#' + modalOuter).show();
        document.getElementById(modalInner).style.display = 'block';
        if (currentRow.childNodes.length == 5) {
            document.getElementById(modalOuter).style.width = "1200px";
        }
        else {
            document.getElementById(modalOuter).style.width = "826px";
        }
        centerMe('#' + modalOuter);
    }
    function closeDialog() {
        $('#' + "modalOuter").hide("fade");
        $('#' + 'container').show();
        document.getElementById(currentModalInner).style.display = 'none';
    }

    function openDialog2(element) {
        $('#' + element).show("fade");
        $('#' + element).css('margin', 'auto');
        window.scrollTo(0, 300);
        $('#containerPage').hide();
        $('#wrapper').hide();
        $('#PageFooter').hide();
    }

    function closeDialog2(element) {
        $('#' + element).hide("fade");
        $('#containerPage').show();
        
        $('#wrapper').show();
        $('#PageFooter').show();
    }

    function centerMe(element) {
        var pWidth = $(window).width();
        var pTop = $(window).scrollTop()
        var eWidth = $(element).width()
        var height = $(element).height()
        $(element).css('top', '130px')
        $(element).css('left', parseInt((pWidth / 2) - (eWidth / 2)) + 'px')
    }

    function openDialog3(element) {
        $('#' + element).show("fade");
        centerMe2('#' + element);

        $('#containerPage').hide();
        $('#wrapper').hide();
        $('#PageFooter').hide();
    }

    function closeDialog3(element) {
        $('#' + element).hide("fade");
        $('#containerPage').show();

        $('#wrapper').show();
        $('#PageFooter').show();
    }
    function centerMe2(element) {
        //pass element name to be centered on screen
        var pWidth = $(window).width();
        var pTop = $(window).scrollTop()
        var eWidth = $(element).width()
        var height = $(element).height()
        $(element).css('top', '130px')
        $(element).css('left', parseInt((pWidth / 2) - (eWidth / 2)) + 'px')
    }


    function LetterIteration(param, typeOfDescription) {
        var i = parseInt(param, 10);
        var Col = new Array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        var str = new String();
        var stringDescription = '';
        if (typeOfDescription == 1) {
            stringDescription = ') Sale/Exchange #';
        }
        else if (typeOfDescription == 2) {
            stringDescription = ') Other Income #';
        }
        else if (typeOfDescription == 3) {
            stringDescription = ') Personal/Real Properties #';
        }
        else if (typeOfDescription == 4) {
            stringDescription = ') Other Exempt Income #';
        }

        if (i >= 1 && i <= 26) {
            str = (Col[i - 1] + stringDescription + i);
        }
        //27 to 52 .2
        else if (i >= 27 && i <= 52) {
            str = ('A' + Col[i - 27] + stringDescription + i);
        }
        //53 to 78 .3
        else if (i >= 53 && i <= 78) {
            str = ('B' + Col[i - 53] + stringDescription + i);
        }
        //79 to 104 .4
        else if (i >= 79 && i <= 104) {
            str = ('C' + Col[i - 79] + stringDescription + i);
        }
        //105 to 130 .5
        else if (i >= 105 && i <= 130) {
            str = ('D' + Col[i - 105] + stringDescription + i);
        }
        //131 to 156 .6
        else if (i >= 131 && i <= 156) {
            str = ('E' + Col[i - 131] + stringDescription + i);
        }
        //157 to 182 .7
        else if (i >= 157 && i <= 182) {
            str = ('F' + Col[i - 157] + stringDescription + i);
        }
        //183 to 208 .8
        else if (i >= 183 && i <= 208) {
            str = ('G' + Col[i - 183] + stringDescription + i);
        }
        //209 to 234 .9
        else if (i >= 209 && i <= 234) {
            str = ('H' + Col[i - 209] + stringDescription + i);
        }
        //235 to 260 .10
        else if (i >= 235 && i <= 260) {
            str = ('I' + Col[i - 235] + stringDescription + i);
        }
        //261 to 286 .11
        else if (i >= 261 && i <= 286) {
            str = ('J' + Col[i - 261] + stringDescription + i);
        }
        //287 to 312 .12
        else if (i >= 287 && i <= 312) {
            str = ('K' + Col[i - 287] + stringDescription + i);
        }
        //313 to 338 .13
        else if (i >= 313 && i <= 338) {
            str = ('L' + Col[i - 313] + stringDescription + i);
        }
        //339 to 364 .14
        else if (i >= 339 && i <= 364) {
            str = ('M' + Col[i - 339] + stringDescription + i);
        }
        //365 to 390 .15
        else if (i >= 365 && i <= 390) {
            str = ('N' + Col[i - 365] + stringDescription + i);
        }
        //391 to 416 .16
        else if (i >= 391 && i <= 416) {
            str = ('O' + Col[i - 391] + stringDescription + i);
        }
        //417 to 442 .17
        else if (i >= 417 && i <= 442) {
            str = ('P' + Col[i - 417] + stringDescription + i);
        }
        //443 to 468 .18
        else if (i >= 443 && i <= 468) {
            str = ('Q' + Col[i - 443] + stringDescription + i);
        }
        //469 to 494 .19
        else if (i >= 469 && i <= 494) {
            str = ('R' + Col[i - 469] + stringDescription + i);
        }
        //495 to 520 .20
        else if (i >= 495 && i <= 520) {
            str = ('S' + Col[i - 495] + stringDescription + i);
        }
        //521 to 546 .21
        else if (i >= 521 && i <= 546) {
            str = ('T' + Col[i - 521] + stringDescription + i);
        }
        //547 to 572 .22
        else if (i >= 547 && i <= 572) {
            str = ('U' + Col[i - 547] + stringDescription + i);
        }
        //573 to 598 .23
        else if (i >= 573 && i <= 598) {
            str = ('V' + Col[i - 573] + stringDescription + i);
        }
        //599 to 624 .24
        else if (i >= 599 && i <= 624) {
            str = ('W' + Col[i - 599] + stringDescription + i);
        }
        //625 to 650 .25
        else if (i >= 625 && i <= 650) {
            str = ('X' + Col[i - 625] + stringDescription + i);
        }
        //651 to 676 .26
        else if (i >= 651 && i <= 676) {
            str = ('Y' + Col[i - 651] + stringDescription + i);
        }
        //677 to 702  .27
        else if (i >= 677 && i <= 702) {
            str = ('Z' + Col[i - 677] + stringDescription + i);
        }
        else {
            str = (" out of range ");
        }

        return str;
    }
    function addXMLRowModalTable(loadModal, totalElements, item, checkrow, rowID) {
        numRows = document.getElementById(loadModal).rows.length;
        table = document.getElementById(loadModal);

        if (totalElements == "frm1702RT:txtPg8Sc12I4") {
            var row = table.insertRow(numRows);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            cell1.innerHTML = '<tr><td class="tblFormTd"><span class="smallBold">' + item + "." + (numRows + 1) + '</span> <input type="text" id="' + rowID + '.' + (numRows + 1) + 'C1" style="text-align:right;width:176px" value="0" maxlength="12" onkeypress="return wholenumber(this, event)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)"/></td>';
            cell2.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowID + '.' + (numRows + 1) + 'C2" style="text-align:right;width:176px;" value="0" maxlength="12" onkeypress="return wholenumber(this, event)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
            cell3.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowID + '.' + (numRows + 1) + 'C3" style="text-align:right;width:176px;" value="0" maxlength="12" onkeypress="return wholenumber(this, event)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
            cell4.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowID + '.' + (numRows + 1) + 'C4" style="text-align:right;width:176px;" value="0" maxlength="12" onkeypress="return wholenumber(this, event)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
            cell5.innerHTML = '<td class="tblFormTd"><input type="button" style="width:67px" value="Remove" onclick="deleteRow(this)"/></td></tr>';
        }
        else if (totalElements == 3) {
            var row = table.insertRow(numRows);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);

            cell1.innerHTML = '<tr><td class="tblFormTd"><span class="smallBold">' + item + "." + (numRows + 1) + '</span> <input type="text" maxlength="50" style="width:497px" id="' + rowID + '.' + (numRows + 1) + 'C1" onkeypress="return Name(this, event);" onblur="capitalize(this)"/></td>';
            cell2.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowID + '.' + (numRows + 1) + 'C2" style="text-align:right;width:205px;" value="0" maxlength="12" onkeypress="return wholenumber(this, event)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
            cell3.innerHTML = '<td class="tblFormTd"><input type="button" style="width:67px" value="Remove" onclick="deleteRow(this)"/></td></tr>';
        }
        else if (totalElements == 4) {
            if (checkrow.childNodes.length == 4) {
                var row = table.insertRow(numRows);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);

                cell1.innerHTML = '<tr><td class="tblFormTd"><span class="smallBold">' + item + "." + (numRows + 1) + '</span> <input type="text" style="width:330px" maxlength="50" id="' + rowID + '.' + (numRows + 1) + 'C1" onkeypress="return Name(this, event);" onblur="capitalize(this)" /></td>';
                cell2.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowID + '.' + (numRows + 1) + 'C2" style="width:180px;" maxlength="50" onkeypress="return Name(this, event);" onblur="capitalize(this)" /></td>';
                cell3.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowID + '.' + (numRows + 1) + 'C3" style="text-align:right;width:205px;" value="0" onkeypress="return wholenumber(this, event)"  maxlength="12" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                cell4.innerHTML = '<td class="tblFormTd"><input type="button" style="width:67px" value="Remove" onclick="deleteRow(this)"/></td></tr>';

            }
            else if (checkrow.childNodes.length == 5) {
                var row = table.insertRow(numRows);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var cell6 = row.insertCell(5);
                var cell7 = row.insertCell(6);

                cell1.innerHTML = '<tr><td class="tblFormTd"><span class="smallBold">' + item + "." + (numRows + 1) + '</span> <input type="text" style="width:150px;text-align:center" id="' + rowID + '.' + (numRows + 1) + 'C1" maxlength="4" onkeypress="return wholenumber(this, event)" /></td>';
                cell2.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowID + '.' + (numRows + 1) + 'C2" style="text-align:right;width:235px;" maxlength="12" value="0" onkeypress="return wholenumber(this, event)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                cell3.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowID + '.' + (numRows + 1) + 'C3" style="text-align:right;width:171px;" maxlength="12" value="0" onkeypress="return wholenumber(this, event)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                cell4.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowID + '.' + (numRows + 1) + 'C4" style="text-align:right;width:171px;" maxlength="12" value="0" onkeypress="return wholenumber(this, event)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                cell5.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowID + '.' + (numRows + 1) + 'C5" style="text-align:right;width:171px;" maxlength="12" value="0" onkeypress="return wholenumber(this, event)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                cell6.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowID + '.' + (numRows + 1) + 'C6" style="text-align:right;width:171px;" maxlength="12" value="0" disabled="disabled" /></td>';
                cell7.innerHTML = '<td class="tblFormTd"><input type="button" style="width:67px" value="Remove" onclick="deleteRow(this)"/></td></tr>';
            }
        }
    }
    function saveXMLRowModalTable(loadModal, totalElements, container, row) {
        numRows = document.getElementById(loadModal).rows.length;
        table = document.getElementById(loadModal);

        if (totalElements == "frm1702RT:txtPg8Sc12I4") {
            window[container + "C1"] = new Array();
            window[container + "C2"] = new Array();
            window[container + "C3"] = new Array();
            window[container + "C4"] = new Array();
            for (x = 0; x < numRows; x++) {
                window[container + "C1"].push(table.rows[x].cells[0].children[1].value);
                window[container + "C2"].push(table.rows[x].cells[1].children[0].value);
                window[container + "C3"].push(table.rows[x].cells[2].children[0].value);
                window[container + "C4"].push(table.rows[x].cells[3].children[0].value);
            }
        }
        else if (totalElements == 3) {
            window[container + "C1"] = new Array();
            window[container + "C2"] = new Array();
            for (x = 0; x < numRows; x++) {
                str = table.rows[x].cells[0].children[1].value;
                if ($.trim(str) != "") {
                    window[container + "C1"].push(table.rows[x].cells[0].children[1].value);
                    window[container + "C2"].push(table.rows[x].cells[1].children[0].value);
                }
            }
        }
        else if (totalElements == 4) {
            if (row.childNodes.length == 4) {
                window[container + "C1"] = new Array();
                window[container + "C2"] = new Array();
                window[container + "C3"] = new Array();

                for (x = 0; x < numRows; x++) {
                    str = table.rows[x].cells[0].children[1].value;
                    str2 = table.rows[x].cells[1].children[0].value;
                    if ($.trim(str) != "" && $.trim(str2) != "") {
                        window[container + "C1"].push(table.rows[x].cells[0].children[1].value);
                        window[container + "C2"].push(table.rows[x].cells[1].children[0].value);
                        window[container + "C3"].push(table.rows[x].cells[2].children[0].value);
                    }
                }
            }
            else if (row.childNodes.length == 5) {
                for (x = 0; x < numRows; x++) {
                    str = table.rows[x].cells[0].children[1].value;
                }
                window[container + "C1"] = new Array();
                window[container + "C2"] = new Array();
                window[container + "C3"] = new Array();
                window[container + "C4"] = new Array();
                window[container + "C5"] = new Array();
                window[container + "C6"] = new Array();

                for (x = 0; x < numRows; x++) {
                    str = table.rows[x].cells[0].children[1].value;
                    if ($.trim(str) != "") {
                        window[container + "C1"].push(table.rows[x].cells[0].children[1].value);
                        window[container + "C2"].push(table.rows[x].cells[1].children[0].value);
                        window[container + "C3"].push(table.rows[x].cells[2].children[0].value);
                        window[container + "C4"].push(table.rows[x].cells[3].children[0].value);
                        window[container + "C5"].push(table.rows[x].cells[4].children[0].value);
                        window[container + "C6"].push(table.rows[x].cells[5].children[0].value);
                    }
                }
            }
        }
    }
    //Global Variables for Modals
    var containertxtPg5Sc4I39C1 = new Array();
    var containertxtPg5Sc4I39C2 = new Array();

    var containertxtPg5Sc5I4C1 = new Array();
    var containertxtPg5Sc5I4C2 = new Array();
    var containertxtPg5Sc5I4C3 = new Array();

    var containertxtPg5Sc6AI7C1 = new Array();
    var containertxtPg5Sc6AI7C2 = new Array();
    var containertxtPg5Sc6AI7C3 = new Array();
    var containertxtPg5Sc6AI7C4 = new Array();
    var containertxtPg5Sc6AI7C5 = new Array();
    var containertxtPg5Sc6AI7C6 = new Array();

    var containertxtPg6Sc7I11C1 = new Array();
    var containertxtPg6Sc7I11C2 = new Array();

    var containertxtPg6Sc9I3C1 = new Array();
    var containertxtPg6Sc9I3C2 = new Array();

    var containertxtPg6Sc9I6C1 = new Array();
    var containertxtPg6Sc9I6C2 = new Array();

    var containertxtPg6Sc9I8C1 = new Array();
    var containertxtPg6Sc9I8C2 = new Array();

    var containertxtPg4Sc3I3C1 = new Array();
    var containertxtPg4Sc3I3C2 = new Array();

    var containertxtPg4Sc4I4C1 = new Array();
    var containertxtPg4Sc4I4C2 = new Array();

    var containertxtPg8Sc12I4C1 = new Array();
    var containertxtPg8Sc12I4C2 = new Array();
    var containertxtPg8Sc12I4C3 = new Array();
    var containertxtPg8Sc12I4C4 = new Array();

    var currentParam1 = "";
    var currentParam2 = "";
    var currentParam3 = "";
    var currentParam4 = "";
    var currentParam5 = "";
    var currentParam6 = "";

    var currentContainerParam1 = "";
    var currentContainerParam2 = "";
    var currentContainerParam3 = "";
    var currentContainerParam4 = "";
    var currentContainerParam5 = "";
    var currentContainerParam6 = "";

    var tempContainerC1 = new Array();
    var tempContainerC2 = new Array();
    var tempContainerC3 = new Array();
    var tempContainerC4 = new Array();
    var tempContainerC5 = new Array();
    var tempContainerC6 = new Array();

    var currentModal = "";
    var currentModalInner = "";
    var rowName = "";
    var currentItem = "";
    var currentTotalElements = 0;
    var currentRow = null;
    // END of Global Variables

    function checkFieldValue(checkValue) {
        var btnMore = (document.getElementById(checkValue.parentNode.children[1].id));
        //    checkValue.value = checkValue.value.replace(/^\s+|\s+$/g, '');
        if ($.trim(checkValue.value) == "") {
            checkValue.value = "";
            btnMore.disabled = true;
        }
        else
            btnMore.disabled = false;
    }
    function checkFieldValuePg5Sc5I4() {
        var btnMore = document.getElementById('btnPg5Sc5I4More');
        var description = document.getElementById('frm1702RT:txtPg5Sc5I4C1');
        var legalBasis = document.getElementById('frm1702RT:txtPg5Sc5I4C2');

        if ($.trim(description.value) != "" && $.trim(legalBasis.value) != "") {
            btnMore.disabled = false;
        }
        else
            btnMore.disabled = true;
    }

    function checkFieldNumValue() {
        var btnMore = document.getElementById('btnPg5Sc6AI7More');
        var yearIncurred = document.getElementById('frm1702RT:txtPg5Sc6AI7C1');
       
        if (yearIncurred.value != "") {
            btnMore.disabled = false;
        }
      
        else
            btnMore.disabled = true;
    }

    function loadModalTable(btnMoreLocation) {
       
        if (btnMoreLocation.id == "btnPg8Sc12I4More") {
            var params = new Array();
            currentItem = "4";
            rowName = "frm1702RT:txtPg8Sc12I4";
            var containerParam1 = "containertxtPg8Sc12I4C1";
            var containerParam2 = "containertxtPg8Sc12I4C2";
            var containerParam3 = "containertxtPg8Sc12I4C3";
            var containerParam4 = "containertxtPg8Sc12I4C4";

            currentContainerParam1 = containerParam1;
            currentContainerParam2 = containerParam2;
            currentContainerParam3 = containerParam3;
            currentContainerParam4 = containerParam4;
            currentButton = btnMoreLocation;
            
            currentModal = rowName + "ModalTable";
            currentModalInner = rowName + "ModalInner";
            currentRow = btnMoreLocation.parentNode.parentNode;
            var Parent = document.getElementById(currentModal);
            while (Parent.hasChildNodes()) {
                Parent.removeChild(Parent.firstChild);
            }
            for (i = 0; i < window[containerParam1].length; i++) {
                addRowModalTable();
                document.getElementById(rowName + "." + (i + 1) + "C1").value = window[containerParam1][i];
                document.getElementById(rowName + "." + (i + 1) + "C2").value = window[containerParam2][i];
                document.getElementById(rowName + "." + (i + 1) + "C3").value = window[containerParam3][i];
                document.getElementById(rowName + "." + (i + 1) + "C4").value = window[containerParam4][i];
            }
            saveModalTable(0, 0);
        }else {
          
            currentRow = btnMoreLocation.parentNode.parentNode;
           
            currentTotalElements = 0; // this will contain the total elements.
            for (var i = 0; i < currentRow.childNodes.length; i++) {
                var node = currentRow.childNodes[i];
                if (node.nodeName == "TD") {
                    for (var j = 0; j < node.childNodes.length; j++) {
                        if ((node.childNodes[j].nodeName) == "INPUT") {
                            currentTotalElements++;
                        };
                    }
                }
            }
            if (currentTotalElements == 3) {
                var params = new Array();
                params[0] = btnMoreLocation.parentNode.parentNode.children[1].children[0];
                params[1] = btnMoreLocation.parentNode.parentNode.children[3].children[0];
                currentItem = btnMoreLocation.parentNode.parentNode.children[0].innerHTML;
                rowName = params[0].id.split("C")[0];
                var containerParam1 = "container" + params[0].id.split(":")[1];
                var containerParam2 = "container" + params[1].id.split(":")[1];
                currentContainerParam1 = containerParam1;
                currentContainerParam2 = containerParam2;
                currentButton = btnMoreLocation;
                currentParam1 = params[0];
                currentParam2 = params[1];
                currentModal = rowName + "ModalTable";
                currentModalInner = rowName + "ModalInner";
             
                var Parent = document.getElementById(currentModal);

                while (Parent.hasChildNodes()) {
                    Parent.removeChild(Parent.firstChild);
                }

                if (params[0].disabled == false) {
                    addRowModalTable();
                    document.getElementById(rowName + "." + 1 + "C1").value = params[0].value;
                    document.getElementById(rowName + "." + 1 + "C2").value = params[1].value;
                }
                else {
                    for (i = 0; i < window[containerParam1].length; i++) {
                        addRowModalTable();
                        document.getElementById(rowName + "." + (i + 1) + "C1").value = window[containerParam1][i];
                        document.getElementById(rowName + "." + (i + 1) + "C2").value = window[containerParam2][i];
                    }
                }
                saveModalTable(0, 0);
            }

            else if (currentTotalElements == 4) {
                if (currentRow.childNodes.length == 7) {
                    var params = new Array();
                    params[0] = btnMoreLocation.parentNode.parentNode.children[1].children[0];
                    params[1] = btnMoreLocation.parentNode.parentNode.children[2].children[0];
                    params[2] = btnMoreLocation.parentNode.parentNode.children[3].children[0];
                    currentItem = btnMoreLocation.parentNode.parentNode.children[0].innerHTML;

                    rowName = params[0].id.split("C")[0];
                    var containerParam1 = "container" + params[0].id.split(":")[1];
                    var containerParam2 = "container" + params[1].id.split(":")[1];
                    var containerParam3 = "container" + params[2].id.split(":")[1];

                    currentContainerParam1 = containerParam1;
                    currentContainerParam2 = containerParam2;
                    currentContainerParam3 = containerParam3;
                    currentButton = btnMoreLocation;
                    currentParam1 = params[0];
                    currentParam2 = params[1];
                    currentParam3 = params[2];
                    currentModal = rowName + "ModalTable";
                    currentModalInner = rowName + "ModalInner";
                
                    var Parent = document.getElementById(currentModal);

                    while (Parent.hasChildNodes()) {
                        Parent.removeChild(Parent.firstChild);
                    }
                    if (params[0].disabled == false) {
                        addRowModalTable();
                        document.getElementById(rowName + "." + 1 + "C1").value = params[0].value;
                        document.getElementById(rowName + "." + 1 + "C2").value = params[1].value;
                        document.getElementById(rowName + "." + 1 + "C3").value = params[2].value;
                    }
                    else {
                        for (i = 0; i < window[containerParam1].length; i++) {
                            addRowModalTable();
                            document.getElementById(rowName + "." + (i + 1) + "C1").value = window[containerParam1][i];
                            document.getElementById(rowName + "." + (i + 1) + "C2").value = window[containerParam2][i];
                            document.getElementById(rowName + "." + (i + 1) + "C3").value = window[containerParam3][i];
                        }
                    }
                    //                    currentParam1.disabled = true;
                    //                    currentParam2.disabled = true;
                    //                    currentParam3.disabled = true;
                    //                    currentParam1.value = "OTHERS";
                    //                    currentButton.disabled = false;
                    saveModalTable(0, 0);
                }
                else if (currentRow.childNodes.length == 5) {
                    var params = new Array();
                    params[0] = btnMoreLocation.parentNode.parentNode.children[1].children[0];
                    params[1] = btnMoreLocation.parentNode.parentNode.children[3].children[0];
                    params[2] = btnMoreLocation.parentNode.parentNode.children[4].children[0];
                    params[3] = document.getElementById(params[0].id.split("C")[0] + "C4");
                    params[4] = document.getElementById(params[0].id.split("C")[0] + "C5");
                    params[5] = document.getElementById(params[0].id.split("C")[0] + "C6");
                    currentItem = btnMoreLocation.parentNode.parentNode.children[0].innerHTML;
                    rowName = params[0].id.split("C")[0];
                    var containerParam1 = "container" + params[0].id.split(":")[1];
                    var containerParam2 = "container" + params[1].id.split(":")[1];
                    var containerParam3 = "container" + params[2].id.split(":")[1];
                    var containerParam4 = "container" + params[3].id.split(":")[1];
                    var containerParam5 = "container" + params[4].id.split(":")[1];
                    var containerParam6 = "container" + params[5].id.split(":")[1];
                    currentContainerParam1 = containerParam1;
                    currentContainerParam2 = containerParam2;
                    currentContainerParam3 = containerParam3;
                    currentContainerParam4 = containerParam4;
                    currentContainerParam5 = containerParam5;
                    currentContainerParam6 = containerParam6;

                    currentButton = btnMoreLocation;

                    currentParam1 = params[0];
                    currentParam2 = params[1];
                    currentParam3 = params[2];
                    currentParam4 = params[3];
                    currentParam5 = params[4];
                    currentParam6 = params[5];
                    currentModal = rowName + "ModalTable";
                    currentModalInner = rowName + "ModalInner";

                    var Parent = document.getElementById(currentModal);
                    while (Parent.hasChildNodes()) {
                        Parent.removeChild(Parent.firstChild);
                    }
                    if (params[0].disabled == false) {
                        addRowModalTable();
                        document.getElementById(rowName + "." + 1 + "C1").value = params[0].value;
                        document.getElementById(rowName + "." + 1 + "C2").value = params[1].value;
                        document.getElementById(rowName + "." + 1 + "C3").value = params[2].value;
                        document.getElementById(rowName + "." + 1 + "C4").value = params[3].value;
                        document.getElementById(rowName + "." + 1 + "C5").value = params[4].value;
                        document.getElementById(rowName + "." + 1 + "C6").value = params[5].value;
                    }
                    else {
                        for (i = 0; i < window[containerParam1].length; i++) {
                            addRowModalTable();
                            document.getElementById(rowName + "." + (i + 1) + "C1").value = window[containerParam1][i];
                            document.getElementById(rowName + "." + (i + 1) + "C2").value = window[containerParam2][i];
                            document.getElementById(rowName + "." + (i + 1) + "C3").value = window[containerParam3][i];
                            document.getElementById(rowName + "." + (i + 1) + "C4").value = window[containerParam4][i];
                            document.getElementById(rowName + "." + (i + 1) + "C5").value = window[containerParam5][i];
                            document.getElementById(rowName + "." + (i + 1) + "C6").value = window[containerParam6][i];
                        }
                    }
                    saveModalTable(0, 0);
                }
            }
            modalSubtotal();
        }
        openDialog("modalOuter", rowName + "ModalInner");
        $('input[maxlength="12"]').each(function () {
            this.value = addCommas(NegativeValue(this.value));
        })

        checkFormValidated();
    }

    function addRowModalTable() {
        numRows = document.getElementById(currentModal).rows.length;

        table = document.getElementById(currentModal);
        alertItemNum = "";
        var checkRows = true;

        var i = document.getElementById(rowName + "ModalTable").rows.length;

        if (rowName == "frm1702RT:txtPg8Sc12I4") {
            for (var i = 0; i < numRows; i++) {
                if (document.getElementById(rowName + "." + (i + 1) + "C1").value == "") {
                    alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Gross Income / Receipts Subjected to Final Withholding should not be blank.";
                    checkRows = false;
                    break;
                }
                else if (document.getElementById(rowName + "." + (i + 1) + "C4").value == 0) {
                    alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Final Tax Withheld / Paid should not be zero.";
                    checkRows = false;
                    break;
                }
            }
            if (checkRows == true) {
                var row = table.insertRow(i);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                cell1.innerHTML = '<tr><td class="tblFormTd"><span class="smallBold">' + currentItem + "." + (i + 1) + '</span> <input type="text" id="' + rowName + '.' + (i + 1) + 'C1" name="' + rowName + '_gross[]" style="width:176px" onkeypress="return Name(this, event);" onblur="capitalize(this)" maxlength="23"/></td>';
                cell2.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowName + '.' + (i + 1) + 'C2" name="' + rowName + '_exempt[]" style="text-align:right;width:176px;" value="0" onkeypress="return wholenumber(this, event)" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                cell3.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowName + '.' + (i + 1) + 'C3" name="' + rowName + '_amount[]" style="text-align:right;width:176px;" value="0" onkeypress="return wholenumber(this, event)" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                cell4.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowName + '.' + (i + 1) + 'C4" name="' + rowName + '_tax[]" style="text-align:right;width:176px;" value="0" onkeypress="return wholenumber(this, event)" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                cell5.innerHTML = '<td class="tblFormTd"><input type="button" style="width:67px" value="Remove" onclick="deleteRow(this)"/></td></tr>';
            }
            else {
                alert(alertItemNum);
            }
        }
        else if (currentTotalElements == 3) {
            for (var i = 0; i < numRows; i++) {
                if (document.getElementById(rowName + "." + (i + 1) + "C1").value == "") {
                    alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Description should not be blank.";
                    checkRows = false;
                    break;
                }
                else if (document.getElementById(rowName + "." + (i + 1) + "C2").value == 0) {
                    alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Amount should not be zero.";
                    checkRows = false;
                    break;
                }
            }

            if (checkRows == true) {
                var row = table.insertRow(i);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                cell1.innerHTML = '<tr><td class="tblFormTd"><span class="smallBold">' + currentItem + "." + (i + 1) + '</span> <input type="text" maxlength="45" style="width:497px" id="' + rowName + '.' + (i + 1) + 'C1" name="' + rowName + '_description[]" onkeypress="return Name(this, event);" onblur="capitalize(this)"/></td>';
                cell2.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowName + '.' + (i + 1) + 'C2" name="' + rowName + '_amount[]" style="text-align:right;width:205px;" value="0" maxlength="12" onkeypress="return wholenumber(this, event)" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                cell3.innerHTML = '<td class="tblFormTd"><input type="button" style="width:67px" value="Remove" onclick="deleteRow(this)"/></td></tr>';
            }
            else {
                alert(alertItemNum);
            }
        }
        else if (currentTotalElements == 4) {
            if (currentRow.childNodes.length == 7) {
                for (var i = 0; i < numRows; i++) {
                    if (document.getElementById(rowName + "." + (i + 1) + "C1").value == "") {
                        alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Description should not be blank.";
                        checkRows = false;
                        break;
                    }
                    else if (document.getElementById(rowName + "." + (i + 1) + "C2").value == "") {
                        alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Legal Basis should not be blank.";
                        checkRows = false;
                        break;
                    }
                    else if (document.getElementById(rowName + "." + (i + 1) + "C3").value == 0) {
                        alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Amount should not be zero.";
                        checkRows = false;
                        break;
                    }
                }

                if (checkRows == true) {
                    var row = table.insertRow(i);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    cell1.innerHTML = '<tr><td class="tblFormTd"><span class="smallBold">' + currentItem + "." + (i + 1) + '</span> <input type="text" style="width:330px" maxlength="26" id="' + rowName + '.' + (i + 1) + 'C1" name="' + rowName + '_description[]" onkeypress="return Name(this, event);" onblur="capitalize(this)" /></td>';
                    cell2.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowName + '.' + (i + 1) + 'C2" name="' + rowName + '_legal[]" style="width:180px;" maxlength="15" onkeypress="return Name(this, event);" onblur="capitalize(this)" /></td>';
                    cell3.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowName + '.' + (i + 1) + 'C3" name="' + rowName + '_amount[]" style="text-align:right;width:205px;" value="0" onkeypress="return wholenumber(this, event)"  maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                    cell4.innerHTML = '<td class="tblFormTd"><input type="button" style="width:64px" value="Remove" onclick="deleteRow(this)"/></td></tr>';
                    

                }
                else {
                    alert(alertItemNum);
                }
            }
            else if (currentRow.childNodes.length == 5) {
                for (var i = 0; i < numRows; i++) {
                    if (document.getElementById(rowName + "." + (i + 1) + "C1").value == "") {
                        checkRows = false;
                        break;
                    }
                }

                if (checkRows == true) {
                    var row = table.insertRow(i);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    var cell6 = row.insertCell(5);
                    var cell7 = row.insertCell(6);

                    cell1.innerHTML = '<tr><td class="tblFormTd"><span class="smallBold">' + currentItem + "." + (i + 1) + '</span> <input type="text" style="width:150px;text-align:center" id="' + rowName + '.' + (i + 1) + 'C1" maxlength="4" onkeypress="return wholenumber(this, event)" /></td>';
                    cell2.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowName + '.' + (i + 1) + 'C2" style="text-align:right;width:235px;" maxlength="12" value="0" onkeypress="return wholenumber(this, event)" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                    cell3.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowName + '.' + (i + 1) + 'C3" style="text-align:right;width:171px;" maxlength="12" value="0" onkeypress="return wholenumber(this, event)" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                    cell4.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowName + '.' + (i + 1) + 'C4" style="text-align:right;width:171px;" maxlength="12" value="0" onkeypress="return wholenumber(this, event)" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                    cell5.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowName + '.' + (i + 1) + 'C5" style="text-align:right;width:171px;" maxlength="12" value="0" onkeypress="return wholenumber(this, event)" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),modalSubtotal(),this.value=addCommas(this.value)" /></td>';
                    cell6.innerHTML = '<td class="tblFormTd"><input type="text" id="' + rowName + '.' + (i + 1) + 'C6" style="text-align:right;width:171px;" maxlength="12" value="0" disabled="disabled" /></td>';
                    cell7.innerHTML = '<td class="tblFormTd"><input type="button" style="width:67px" value="Remove" onclick="deleteRow(this)"/></td></tr>';
                }
                else {
                    alert('Please fill-up all fields before you can add more.');
                }
            }
        }
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });
        //        document.getElementById(currentModalInner).scrollTop = document.getElementById(currentModalInner).scrollHeight;
    }

    function saveModalTable(checkProcess, checkSaveClose) {
        numRows = document.getElementById(currentModal).rows.length;

        table = document.getElementById(currentModal);
        var checkRows = true;
        var alertItemNum = "";

        if (rowName == "frm1702RT:txtPg8Sc12I4") {
            for (var i = 0; i < numRows; i++) {
                if (document.getElementById(rowName + "." + (i + 1) + "C1").value != "" || document.getElementById(rowName + "." + (i + 1) + "C4").value != 0) {
                    if (document.getElementById(rowName + "." + (i + 1) + "C1").value == "") {
                        alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Gross Income / Receipts Subjected to Final Withholding should not be blank.";
                        checkRows = false;
                        break;
                    }
                    else if (document.getElementById(rowName + "." + (i + 1) + "C4").value == 0) {
                        alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Final Tax Withheld / Paid should not be zero.";
                        checkRows = false;
                        break;
                    }
                }
            }
            if (checkRows == true) {
                window[currentContainerParam1] = new Array();
                window[currentContainerParam2] = new Array();
                window[currentContainerParam3] = new Array();
                window[currentContainerParam4] = new Array();
                for (x = 0; x < numRows; x++) {
                    str = table.rows[x].cells[0].children[1].value;
                    if ($.trim(str) != "") {
                        window[currentContainerParam1].push(table.rows[x].cells[0].children[1].value);
                        window[currentContainerParam2].push(table.rows[x].cells[1].children[0].value);
                        window[currentContainerParam3].push(table.rows[x].cells[2].children[0].value);
                        window[currentContainerParam4].push(table.rows[x].cells[3].children[0].value);
                    }
                }
                //Compute Others Modal Amount Total
                var total = 0;
                numRows = window[currentContainerParam4].length;
                for (x = 0; x < numRows; x++) {
                    total += WholeNumWithComma(window[currentContainerParam4][x]);
                }
                document.getElementById(rowName + 'SubTotal').value = addCommas(total);
                othersSubtotal();
             
            }
            else {
                alert(alertItemNum);
            }
        }
        else if (currentTotalElements == 3) {
            for (var i = 0; i < numRows; i++) {
                if (document.getElementById(rowName + "." + (i + 1) + "C1").value != "" || document.getElementById(rowName + "." + (i + 1) + "C2").value != 0) {
                    if (document.getElementById(rowName + "." + (i + 1) + "C1").value == "") {
                        alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Description should not be blank.";
                        checkRows = false;
                        break;
                    }
                    else if (document.getElementById(rowName + "." + (i + 1) + "C2").value == 0) {
                        alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Amount should not be zero.";
                        checkRows = false;
                        break;
                    }
                }
            }

            if (checkRows == true) {

                window[currentContainerParam1] = new Array();
                window[currentContainerParam2] = new Array();
                for (x = 0; x < numRows; x++) {
                    str = table.rows[x].cells[0].children[1].value;
                    if ($.trim(str) != "") {
                        window[currentContainerParam1].push(table.rows[x].cells[0].children[1].value);
                        window[currentContainerParam2].push(table.rows[x].cells[1].children[0].value);
                    }
                }

                //Compute Others Modal Amount Total
                var total = 0;
                numRows = window[currentContainerParam2].length;
                table = document.getElementById(window[currentContainerParam2]);

                for (x = 0; x < numRows; x++) {
                    total += WholeNumWithComma(NumWithParenthesis(window[currentContainerParam2][x]));
                }
                document.getElementById(rowName + 'SubTotal').value = NegativeValue(formatCurrencyWOC(total));
                othersSubtotal();
               
                //END Compute Others Modal Amount Total

                if (window[currentContainerParam1].length <= 1) {
                    currentParam1.disabled = false;
                    currentParam2.disabled = false;
                    if (window[currentContainerParam1].length == 0) {
                        currentParam1.value = "";
                        currentParam2.value = "0";
                        currentButton.disabled = true;
                    }
                    else {
                        currentParam1.value = window[currentContainerParam1][0];
                        currentParam2.value = window[currentContainerParam2][0];
                        currentButton.disabled = false;
                    }
                }
                else {
                    currentParam1.disabled = true;
                    currentParam2.disabled = true;
                    currentParam1.value = "OTHERS";
                    currentButton.disabled = false;
                }
            }
            else {
                alert(alertItemNum);
            }
        }
        else if (currentTotalElements == 4) {
            if (currentRow.childNodes.length == 7) {
                for (var i = 0; i < numRows; i++) {
                    if (document.getElementById(rowName + "." + (i + 1) + "C1").value != "" || document.getElementById(rowName + "." + (i + 1) + "C2").value != "" || document.getElementById(rowName + "." + (i + 1) + "C3").value != 0) {
                        if (document.getElementById(rowName + "." + (i + 1) + "C1").value == "") {
                            alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Description should not be blank.";
                            checkRows = false;
                            break;
                        }
                        else if (document.getElementById(rowName + "." + (i + 1) + "C2").value == "") {
                            alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Legal Basis should not be blank.";
                            checkRows = false;
                            break;
                        }
                        else if (document.getElementById(rowName + "." + (i + 1) + "C3").value == 0) {
                            alertItemNum = "Page " + document.getElementById("frm1702RT:txtCurrentPage").value + " Item " + currentItem + "." + (i + 1) + " Amount should not be zero.";
                            checkRows = false;
                            break;
                        }
                    }
                }
                if (checkRows == true) {
                    window[currentContainerParam1] = new Array();
                    window[currentContainerParam2] = new Array();
                    window[currentContainerParam3] = new Array();

                    for (x = 0; x < numRows; x++) {
                        str = table.rows[x].cells[0].children[1].value;
                        if ($.trim(str) != "") {
                            //                        str2 = table.rows[x].cells[1].children[0].value;
                            //                        if ($.trim(str) != "" && $.trim(str2) != "") {
                            window[currentContainerParam1].push(table.rows[x].cells[0].children[1].value);
                            window[currentContainerParam2].push(table.rows[x].cells[1].children[0].value);
                            window[currentContainerParam3].push(table.rows[x].cells[2].children[0].value);
                        }
                    }

                    //Compute Others Modal Amount Total
                    var total = 0;
                    numRows = window[currentContainerParam3].length;
                    table = document.getElementById(window[currentContainerParam3]);

                    for (x = 0; x < numRows; x++) {
                        total += WholeNumWithComma(window[currentContainerParam3][x]);
                    }
                    document.getElementById(rowName + 'SubTotal').value = addCommas(total);
                    othersSubtotal();
                    //END Compute Others Modal Amount Total
                    if (window[currentContainerParam1].length <= 1) {
                        currentParam1.disabled = false;
                        currentParam2.disabled = false;
                        currentParam3.disabled = false;
                        if (window[currentContainerParam1].length == 0) {
                            currentParam1.value = "";
                            currentParam2.value = "";
                            currentParam3.value = "0";
                            currentButton.disabled = true;
                        }
                        else {
                            currentParam1.value = window[currentContainerParam1][0];
                            currentParam2.value = window[currentContainerParam2][0];
                            currentParam3.value = window[currentContainerParam3][0];
                            currentButton.disabled = false;
                        }
                    }
                    else {
                        currentParam1.disabled = true;
                        currentParam2.disabled = true;
                        currentParam3.disabled = true;
                        currentParam1.value = "OTHERS";
                        currentParam2.value = "OTHERS";
                        currentButton.disabled = false;
                    }
                }
                else {
                    alert(alertItemNum);
                }
            }
            else if (currentRow.childNodes.length == 5) {
                for (x = 0; x < numRows; x++) {
                    str = table.rows[x].cells[0].children[1].value;
                    strAmount = table.rows[x].cells[1].children[0].value;
                }
                window[currentContainerParam1] = new Array();
                window[currentContainerParam2] = new Array();
                window[currentContainerParam3] = new Array();
                window[currentContainerParam4] = new Array();
                window[currentContainerParam5] = new Array();
                window[currentContainerParam6] = new Array();

                for (x = 0; x < numRows; x++) {
                    str = table.rows[x].cells[0].children[1].value;
                    if ($.trim(str) != "") {
                        window[currentContainerParam1].push(table.rows[x].cells[0].children[1].value);
                        window[currentContainerParam2].push(table.rows[x].cells[1].children[0].value);
                        window[currentContainerParam3].push(table.rows[x].cells[2].children[0].value);
                        window[currentContainerParam4].push(table.rows[x].cells[3].children[0].value);
                        window[currentContainerParam5].push(table.rows[x].cells[4].children[0].value);
                        window[currentContainerParam6].push(table.rows[x].cells[5].children[0].value);
                    }
                }

                //Compute Others Modal Amount Total
                var totalC2 = 0;
                var totalC3 = 0;
                var totalC4 = 0;
                var totalC5 = 0;
                var totalC6 = 0;

                numRows = window[currentContainerParam6].length;
                table = document.getElementById(window[currentContainerParam6]);

                for (x = 0; x < numRows; x++) {
                    totalC2 += WholeNumWithComma(window[currentContainerParam2][x]);
                    totalC3 += WholeNumWithComma(window[currentContainerParam3][x]);
                    totalC4 += WholeNumWithComma(window[currentContainerParam4][x]);
                    totalC5 += WholeNumWithComma(window[currentContainerParam5][x]);
                    totalC6 += WholeNumWithComma(window[currentContainerParam6][x]);
                }
                document.getElementById(rowName + 'C2' + 'SubTotal').value = addCommas(totalC2);
                document.getElementById(rowName + 'C3' + 'SubTotal').value = addCommas(totalC3);
                document.getElementById(rowName + 'C4' + 'SubTotal').value = addCommas(totalC4);
                document.getElementById(rowName + 'C5' + 'SubTotal').value = addCommas(totalC5);
                document.getElementById(rowName + 'C6' + 'SubTotal').value = addCommas(totalC6);
                othersSubtotal();
                //END Compute Others Modal Amount Total

                if (window[currentContainerParam1].length == 0) {
                    currentParam1.disabled = false;
                    currentParam2.disabled = false;
                    currentParam3.disabled = false;
                    currentParam4.disabled = false;
                    currentParam5.disabled = false;
                    currentParam1.value = "";
                    currentParam2.value = "0";
                    currentParam3.value = "0";
                    currentParam4.value = "0";
                    currentParam5.value = "0";
                    currentParam6.value = "0";
                    currentButton.disabled = true;
                }
                else {
                    currentParam1.disabled = true;
                    currentParam2.disabled = true;
                    currentParam3.disabled = true;
                    currentParam4.disabled = true;
                    currentParam5.disabled = true;
                    currentParam1.value = "OTHERS";
                    currentButton.disabled = false;
                }
            }
        }
        if (checkRows == true) {
            count = window[currentContainerParam1].length;
            if (count > 0) {
                document.getElementById(rowName + "CtrModal").value = count;
            }
            else if (count == 0) {
                document.getElementById(rowName + "CtrModal").value = count;
            }
            populateSavedModalTable();
            if (checkProcess == 1) {
                alert('Data has been saved successfully!');
            }
            if (checkSaveClose == 1) {
                closeDialog();
            }
        }
    }

    function confirmClose() {
        var r = confirm("Are you sure to want to close? Any changes without saving will be lost.");
        if (r == true) {
            populateSavedModalTable();
            closeDialog();
        }
    }
    function confirmCancel() {
        var r = confirm("Are you sure to want to cancel? This will restore currently saved information.");
        if (r == true) {
            populateSavedModalTable();

            $('.modalInnerRT').find('input').each(function () {
                this.value = addCommas(NegativeValue(this.value));
            })
        }
    }
    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
        populateItems();
        modalSubtotal();
        //        populateSavedModalTable();
        //        othersSubtotal();
        alert('Data has been removed succesfully!');
    }
    function populateItems() {
        numRows = document.getElementById(currentModal).rows.length;
        table = document.getElementById(currentModal);

        if (rowName == "frm1702RT:txtPg8Sc12I4") {
            tempContainerC1 = new Array();
            tempContainerC2 = new Array();
            tempContainerC3 = new Array();
            tempContainerC4 = new Array();

            for (x = 0; x < numRows; x++) {
                str = table.rows[x].cells[1].children[0].value;
                tempContainerC1.push(table.rows[x].cells[0].children[1].value);
                tempContainerC2.push(table.rows[x].cells[1].children[0].value);
                tempContainerC3.push(table.rows[x].cells[2].children[0].value);
                tempContainerC4.push(table.rows[x].cells[3].children[0].value);
            }

            var modalElement = document.getElementById(currentModal);
            var i = tempContainerC1.length;

            while (modalElement.hasChildNodes()) {
                modalElement.removeChild(modalElement.firstChild);
            }
            for (x = 0; x < i; x++) {
                addRowModalTable();
                document.getElementById(rowName + "." + (x + 1) + "C1").value = tempContainerC1[x];
                document.getElementById(rowName + "." + (x + 1) + "C2").value = tempContainerC2[x];
                document.getElementById(rowName + "." + (x + 1) + "C3").value = tempContainerC3[x];
                document.getElementById(rowName + "." + (x + 1) + "C4").value = tempContainerC4[x];
            }
        }

        else if (currentTotalElements == 3) {
            tempContainerC1 = new Array();
            tempContainerC2 = new Array();

            for (x = 0; x < numRows; x++) {
                str = table.rows[x].cells[0].children[1].value;
                tempContainerC1.push(table.rows[x].cells[0].children[1].value);
                tempContainerC2.push(table.rows[x].cells[1].children[0].value);
            }

            var modalElement = document.getElementById(currentModal);
            var i = tempContainerC1.length;

            while (modalElement.hasChildNodes()) {
                modalElement.removeChild(modalElement.firstChild);
            }

            for (x = 0; x < i; x++) {
                addRowModalTable();
                document.getElementById(rowName + "." + (x + 1) + "C1").value = tempContainerC1[x];
                document.getElementById(rowName + "." + (x + 1) + "C2").value = tempContainerC2[x];
            }
           
        }
        else if (currentTotalElements == 4) {
            if (currentRow.childNodes.length == 7) {
                tempContainerC1 = new Array();
                tempContainerC2 = new Array();
                tempContainerC3 = new Array();

                for (x = 0; x < numRows; x++) {
                    str = table.rows[x].cells[0].children[1].value;
                    tempContainerC1.push(table.rows[x].cells[0].children[1].value);
                    tempContainerC2.push(table.rows[x].cells[1].children[0].value);
                    tempContainerC3.push(table.rows[x].cells[2].children[0].value);
                }

                var modalElement = document.getElementById(currentModal);
                var i = tempContainerC1.length;

                while (modalElement.hasChildNodes()) {
                    modalElement.removeChild(modalElement.firstChild);
                }

                //                if (i != 0) {
                for (x = 0; x < i; x++) {
                    addRowModalTable();
                    document.getElementById(rowName + "." + (x + 1) + "C1").value = tempContainerC1[x];
                    document.getElementById(rowName + "." + (x + 1) + "C2").value = tempContainerC2[x];
                    document.getElementById(rowName + "." + (x + 1) + "C3").value = tempContainerC3[x];
                }
               
            }
            if (currentRow.childNodes.length == 5) {
                tempContainerC1 = new Array();
                tempContainerC2 = new Array();
                tempContainerC3 = new Array();
                tempContainerC4 = new Array();
                tempContainerC5 = new Array();
                tempContainerC6 = new Array();

                for (x = 0; x < numRows; x++) {
                    str = table.rows[x].cells[1].children[0].value;
                    tempContainerC1.push(table.rows[x].cells[0].children[1].value);
                    tempContainerC2.push(table.rows[x].cells[1].children[0].value);
                    tempContainerC3.push(table.rows[x].cells[2].children[0].value);
                    tempContainerC4.push(table.rows[x].cells[3].children[0].value);
                    tempContainerC5.push(table.rows[x].cells[4].children[0].value);
                    tempContainerC6.push(table.rows[x].cells[5].children[0].value);
                }

                var modalElement = document.getElementById(currentModal);
                var i = tempContainerC2.length;

                while (modalElement.hasChildNodes()) {
                    modalElement.removeChild(modalElement.firstChild);
                }

                //                if (i != 0) {
                for (x = 0; x < i; x++) {
                    addRowModalTable();
                    document.getElementById(rowName + "." + (x + 1) + "C1").value = tempContainerC1[x];
                    document.getElementById(rowName + "." + (x + 1) + "C2").value = tempContainerC2[x];
                    document.getElementById(rowName + "." + (x + 1) + "C3").value = tempContainerC3[x];
                    document.getElementById(rowName + "." + (x + 1) + "C4").value = tempContainerC4[x];
                    document.getElementById(rowName + "." + (x + 1) + "C5").value = tempContainerC5[x];
                    document.getElementById(rowName + "." + (x + 1) + "C6").value = tempContainerC6[x];
                }
            }
        }
    }
    function othersSubtotal() {
        if (rowName == "frm1702RT:txtPg8Sc12I4") {
            document.getElementById(rowName + "C3")['onblur'](document.getElementById(rowName + "C3"));
            //            modalSubtotal();
        }
        else if (currentTotalElements == 3) {
            var modalSubTotal = document.getElementById(rowName + 'SubTotal');
            var othersSubTotal = currentParam2;
            othersSubTotal.value = modalSubTotal.value;
            currentParam2['onblur'](currentParam2);
        }
        else if (currentTotalElements == 4) {
            if (currentRow.childNodes.length == 7) {
                var modalSubTotal = document.getElementById(rowName + 'SubTotal');
                var othersSubTotal = currentParam3;
                othersSubTotal.value = modalSubTotal.value;
                currentParam3['onblur'](currentParam3);
            }
            else if (currentRow.childNodes.length == 5) {
                var C2SubTotal = document.getElementById(rowName + "C" + 2 + 'SubTotal');
                var C3SubTotal = document.getElementById(rowName + "C" + 3 + 'SubTotal');
                var C4SubTotal = document.getElementById(rowName + "C" + 4 + 'SubTotal');
                var C5SubTotal = document.getElementById(rowName + "C" + 5 + 'SubTotal');
                var C6SubTotal = document.getElementById(rowName + "C" + 6 + 'SubTotal');
                var othersC2SubTotal = currentParam2;
                var othersC3SubTotal = currentParam3;
                var othersC4SubTotal = currentParam4;
                var othersC5SubTotal = currentParam5;
                var othersC6SubTotal = currentParam6;
                othersC2SubTotal.value = C2SubTotal.value;
                othersC3SubTotal.value = C3SubTotal.value;
                othersC4SubTotal.value = C4SubTotal.value;
                othersC5SubTotal.value = C5SubTotal.value;
                othersC6SubTotal.value = C6SubTotal.value;

                window["currentParam" + 2]['onblur'](window["currentParam" + 2]);
                window["currentParam" + 5]['onblur'](window["currentParam" + 5]);
            }
        }
    }
    function modalSubtotal() {
        var totalC = 0;
        var totalC2 = 0;
        var totalC3 = 0;
        var totalC4 = 0;
        var totalC5 = 0;
        var totalC6 = 0;
        numRows = document.getElementById(currentModal).rows.length;
        table = document.getElementById(currentModal);
        if (rowName == "frm1702RT:txtPg8Sc12I4") {
            for (x = 0; x < numRows; x++) {
                totalC += WholeNumWithComma(table.rows[x].cells[3].children[0].value);
            }
            document.getElementById(rowName + 'SubTotal').value = addCommas(totalC);
            //            document.getElementById('hidden-frm1702RT:txtPg8Sc12I4SubTotal').value = addCommas(totalC);
        }
        else if (currentTotalElements == 3) {
            for (x = 0; x < numRows; x++) {
                totalC += WholeNumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value));
            }
            document.getElementById(rowName + 'SubTotal').value = NegativeValue(formatCurrencyWOC(totalC));
        }
        else if (currentTotalElements == 4 || rowName == "frm1702RT:txtPg8Sc12I4") {
            if (currentRow.childNodes.length == 7 || rowName == "frm1702RT:txtPg8Sc12I4") {
                for (x = 0; x < numRows; x++) {
                    totalC += WholeNumWithComma(table.rows[x].cells[2].children[0].value);
                }
                document.getElementById(rowName + 'SubTotal').value = addCommas(totalC);
            }
            else if (currentRow.childNodes.length == 5) {

                var totalR = 0;
                var totalR2 = 0;
                var totalR3 = 0;
                var totalR4 = 0;
                var totalR5 = 0;

                for (i = 0; i < numRows; i++) {
                    var totalR2 = WholeNumWithComma(table.rows[i].cells[1].children[0].value);
                    var totalR3 = WholeNumWithComma(table.rows[i].cells[2].children[0].value);
                    var totalR4 = WholeNumWithComma(table.rows[i].cells[3].children[0].value);
                    var totalR5 = WholeNumWithComma(table.rows[i].cells[4].children[0].value);
                    totalR = totalR2 - totalR3 - totalR4 - totalR5;
                    table.rows[i].cells[5].children[0].value = addCommas(NegativeValue(totalR));
                }

                for (x = 0; x < numRows; x++) {
                    totalC2 += WholeNumWithComma(table.rows[x].cells[1].children[0].value);
                    totalC3 += WholeNumWithComma(table.rows[x].cells[2].children[0].value);
                    totalC4 += WholeNumWithComma(table.rows[x].cells[3].children[0].value);
                    totalC5 += WholeNumWithComma(table.rows[x].cells[4].children[0].value);
                    totalC6 += WholeNumWithComma(NumWithParenthesis(table.rows[x].cells[5].children[0].value));
                }
                document.getElementById(rowName + 'C2' + 'SubTotal').value = addCommas(totalC2);
                document.getElementById(rowName + 'C3' + 'SubTotal').value = addCommas(totalC3);
                document.getElementById(rowName + 'C4' + 'SubTotal').value = addCommas(totalC4);
                document.getElementById(rowName + 'C5' + 'SubTotal').value = addCommas(totalC5);
                document.getElementById(rowName + 'C6' + 'SubTotal').value = addCommas(NegativeValue(totalC6));
            }
        }
    }
    function populateSavedModalTable() {
        var Parent = document.getElementById(currentModal);
        while (Parent.hasChildNodes()) {
            Parent.removeChild(Parent.firstChild);
        }
        if (rowName == "frm1702RT:txtPg8Sc12I4") {
            for (i = 0; i < window[currentContainerParam1].length; i++) {
                addRowModalTable();
                document.getElementById(rowName + "." + (i + 1) + "C1").value = window[currentContainerParam1][i];
                document.getElementById(rowName + "." + (i + 1) + "C2").value = window[currentContainerParam2][i];
                document.getElementById(rowName + "." + (i + 1) + "C3").value = window[currentContainerParam3][i];
                document.getElementById(rowName + "." + (i + 1) + "C4").value = window[currentContainerParam4][i];
            }

        }
        else if (currentTotalElements == 3) {
            for (i = 0; i < window[currentContainerParam1].length; i++) {
                addRowModalTable();
                document.getElementById(rowName + "." + (i + 1) + "C1").value = window[currentContainerParam1][i];
                document.getElementById(rowName + "." + (i + 1) + "C2").value = window[currentContainerParam2][i];
           
            }
        }
        else if (currentTotalElements == 4) {
            if (currentRow.childNodes.length == 7) {
                for (i = 0; i < window[currentContainerParam1].length; i++) {
                    addRowModalTable();
                    document.getElementById(rowName + "." + (i + 1) + "C1").value = window[currentContainerParam1][i];
                    document.getElementById(rowName + "." + (i + 1) + "C2").value = window[currentContainerParam2][i];
                    document.getElementById(rowName + "." + (i + 1) + "C3").value = window[currentContainerParam3][i];
                   
                }
            }
            else if (currentRow.childNodes.length == 5) {
                
                for (i = 0; i < window[currentContainerParam2].length; i++) {
                    addRowModalTable();
                    document.getElementById(rowName + "." + (i + 1) + "C1").value = window[currentContainerParam1][i];
                    document.getElementById(rowName + "." + (i + 1) + "C2").value = window[currentContainerParam2][i];
                    document.getElementById(rowName + "." + (i + 1) + "C3").value = window[currentContainerParam3][i];
                    document.getElementById(rowName + "." + (i + 1) + "C4").value = window[currentContainerParam4][i];
                    document.getElementById(rowName + "." + (i + 1) + "C5").value = window[currentContainerParam5][i];
                    document.getElementById(rowName + "." + (i + 1) + "C6").value = window[currentContainerParam6][i];
                }
            }
        }
        modalSubtotal();
    }
    function AddrowChecking_ModalColumn(modalDiv, paramFunction, desc) {
        var str1 = "";
        var str2 = "";
        var count = 0;
        var divlength = $(modalDiv).length;
        for (i = 0; i < divlength; i++) {
            var currentDivTable = $(modalDiv).eq(i).find('table');
            var tdCount = currentDivTable.eq(0).find("td input").length;
            str1 = currentDivTable.eq(0).find("td input")[0].value;
            str2 = currentDivTable.eq(0).find("td input")[1].value;

            for (a = 0; a < tdCount; a++) {
                var fieldToCheck = currentDivTable.eq(0).find("td input")[a].value;
                if (fieldToCheck == "" || fieldToCheck == 0) {
                    count += 1;
                }
            }
        }
        if (count != 0) {
            if (desc == 1) {
                alert("Kindly fill up the empty fields/zero amounts before you can add more items");
            }
            if (desc == 2) {
                alert("Kindly fill up the empty fields/zero amounts before you can add more items");
            }
            if (desc == 3) {
                alert("Kindly fill up the empty fields/zero amounts before you can add more items");
            }
            if (desc == 4) {
                alert("Kindly fill up the empty fields/zero amounts before you can add more items");
            }
        }
        else if (count == 0) {
            paramFunction();
        }
    }

    function AddrowChecking_ModalColumnRT(modalDiv, paramFunction) {
        var errMessage = 0;
        var count = 0;
        var divlength = $(modalDiv).length;

        for (i = 0; i < divlength; i++) {
            var currentDivTable = $(modalDiv).eq(i).find('table');
            var tdCount = currentDivTable.eq(0).find("td input").length;

            if (modalDiv == '#tempModalDivPg8Sc12II div') {
                for (a = 0; a < tdCount; a++) {
                    var fieldToCheck = currentDivTable.eq(0).find("td input")[a].value;
                    if (a == 0 || a == 1) {
                        if (fieldToCheck == "") {
                            count += 1;
                            errMessage = 1;
                        }
                    }
                    else if (a == 2 || a == 3) {
                        if (fieldToCheck == "") {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 2;
                            }
                        }
                    }
                    else if (a == 4 || a == 5) {
                        if (fieldToCheck == "") {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 3;
                            }
                        }
                    }
                    else if (a == 6 || a == 7) {
                        if (fieldToCheck == 0) {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 4;
                            }
                        }
                    }
                    else if (a == 8 || a == 9) {
                        if (fieldToCheck == 0) {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 5;
                            }
                        }
                    }
                }
            }
            if (modalDiv == '#tempModalDivPg8Sc12III div') {
                for (a = 0; a < tdCount; a++) {
                    var fieldToCheck = currentDivTable.eq(0).find("td input")[a].value;
                    if (a == 0 || a == 1) {
                        if (fieldToCheck == "") {
                            count += 1;
                            errMessage = 6;
                        }
                    }
                    else if (a == 2 || a == 3) {
                        if (fieldToCheck == "") {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 7;
                            }
                        }
                    }
                    else if (a == 4 || a == 5) {
                        if (fieldToCheck == 0) {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 8;
                            }
                        }
                    }
                    else if (a == 6 || a == 7) {
                        if (fieldToCheck == "") {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 9;
                            }
                        }
                    }
                    else if (a == 8 || a == 9) {
                        if (fieldToCheck == 0) {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 4;
                            }
                        }
                    }
                    else if (a == 10 || a == 11) {
                        if (fieldToCheck == 0) {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 5;
                            }
                        }
                    }
                }
            }
            if (modalDiv == '#tempModalDivPg8Sc12IV div') {
                for (a = 0; a < tdCount; a++) {
                    var fieldToCheck = currentDivTable.eq(0).find("td input")[a].value;
                    if (a == 0 || a == 1) {
                        if (fieldToCheck == "") {
                            count += 1;
                            errMessage = 10;
                        }
                    }
                    else if (a == 2 || a == 3) {
                        if (fieldToCheck == 0) {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 4;
                            }
                        }
                    }
                    else if (a == 4 || a == 5) {
                        if (fieldToCheck == 0) {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 5;
                            }
                        }
                    }
                }
            }
            if (modalDiv == '#tempModalDivPg8Sc13I div') {
                for (a = 0; a < tdCount; a++) {
                    var fieldToCheck = currentDivTable.eq(0).find("td input")[a].value;
                    if (a == 0 || a == 1) {
                        if (fieldToCheck == "") {
                            count += 1;
                            errMessage = 1;
                        }
                    }
                    else if (a == 2 || a == 3) {
                        if (fieldToCheck == 0) {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 11;
                            }
                        }
                    }
                    else if (a == 4 || a == 5) {
                        if (fieldToCheck == 0) {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 3;
                            }
                        }
                    }
                    else if (a == 6 || a == 7) {
                        if (fieldToCheck == 0) {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 12;
                            }
                        }
                    }
                }
            }
            if (modalDiv == '#tempModalDivPg8Sc13II div') {
                for (a = 0; a < tdCount; a++) {
                    var fieldToCheck = currentDivTable.eq(0).find("td input")[a].value;
                    if (a == 0 || a == 1) {
                        if (fieldToCheck == "") {
                            count += 1;
                            errMessage = 13;
                        }
                    }
                    else if (a == 2 || a == 3) {
                        if (fieldToCheck == 0) {
                            count += 1;
                            if (errMessage == 0) {
                                errMessage = 4;
                            }
                        }
                    }
                }
            }
        }
        if (count != 0) {
            if (errMessage == 1) {
                alert("Kindly fill up the empty 'Description of Property' field");
            }
            if (errMessage == 2) {
                alert("Kindly fill up the empty 'OCT/TCT/CCT/Tax Declaration No.' field");
            }
            if (errMessage == 3) {
                alert("Kindly fill up the empty 'Certificate Authorizing Registration(CAR) No.' field");
            }
            if (errMessage == 4) {
                alert("Actual Amount/Fair Market Value/Net Capital Gains cannot be equal to zero");
            }
            if (errMessage == 5) {
                alert("Final Tax Withheld/Paid cannot be zero");
            }
            if (errMessage == 6) {
                alert("Kindly fill up the empty 'Kind (PS/CS) Stock Certificate Series No.' field");
            }
            if (errMessage == 7) {
                alert("Kindly fill up the empty 'Certificate Authorizing Registration (CAR) No.' field");
            }
            if (errMessage == 8) {
                alert("Number of Shares cannot be zero");
            }
            if (errMessage == 9) {
                alert("Kindly fill up the empty 'Date of Issue (MM/DD/YYY)' field");
            }
            if (errMessage == 10) {
                alert("Kindly fill up the empty 'Other Income Subject to Final Tax Under Sections 57' field");
            }
            if (errMessage == 11) {
                alert("Kindly fill up the empty 'Mode of Transfer' field");
            }
            if (errMessage == 12) {
                alert("Actual Amount/Fair Market Value cannot be zero");
            }
            if (errMessage == 13) {
                alert("Kindly fill up the empty 'Other Exempt Income/Receipts Under Sections 32 (B) of the Tax Code' field");
            }
        }
        else if (count == 0) {
            paramFunction();
        }
    }
    Array.prototype.contains = Array.prototype.indexOf ?
    function (val) {
        return this.indexOf(val) > -1;
    } :
    function (val) {
        var i = this.length;
        while (i--) {
            if (this[i] === val) {
                return true;
            }
        }
        return false;
    };
    var disabledItems = new Array();
    function printme() {
        alert("This form must be printed on an A4 Size Paper. Please update your Printer Settings to ensure the correct printout of the form.\n\n" +
                  "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166 and all Headers & Footers must be set to empty.");

        var inputs = document.getElementsByTagName("input");

        for (a = 0; a < inputs.length; a++) {
            if ((inputs[a].type == "checkbox" || inputs[a].type == "radio")) {
                $(inputs[a]).removeClass("styled");
                $(inputs[a].previousSibling).remove();
                inputs[a].style.display = "none";
                var img = Array();
                img[a] = document.createElement("img");
                if (inputs[a].checked == false) {
                    img[a].src = "../img/emptycheckbox.png";
                }
                else {
                    img[a].src = "../img/withX.png";
                }
                inputs[a].parentNode.insertBefore(img[a], inputs[a]);
            }
        }

        $('#bg').hide();
        $('.printSignFooterClass').css({ 'width': '94%', 'margin': 'auto', 'margin-top': '15px', 'display': 'block', 'position': 'relative', 'overflow': 'visible', 'page-break-before': 'always' });
        $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
        $('body').css({ 'background': '#FFF' });

        $('#formPaper').css({ 'width': '8.2in !important', 'padding': '0px 2px 0px 2px', 'border': 'solid 2px #000', 'margin-top': '25px' });
        $('#container').css({ 'max-width': '8.2in !important', 'padding': '0px' });
        $('#wrapper').css({ 'width': '8.2in !important', 'margin': '0px auto', 'position': 'relative', 'padding': '0px 8px 0px 0px' });

        var elem = document.getElementById('frmMain').elements;
        var x = 0;
        disabledItems = new Array();
        for (var i = 0; i < elem.length; i++) {
            if (elem[i].type != 'hidden') { // && elem[i].type != 'undefined' 
                if (elem[i].type == 'text') {
                    if (document.getElementById(elem[i].id).disabled) {
                        disabledItems[x] = elem[i].id;
                        x++;
                    }
                    document.getElementById(elem[i].id).disabled = false;
                    document.getElementById(elem[i].id).readOnly = true;
                    document.getElementById(elem[i].id).style.backgroundColor = '#FFFFFF';
                    document.getElementById(elem[i].id).style.color = '#000000';
                    //document.getElementById(elem[i].id).style.height = "9px"
                    document.getElementById(elem[i].id).style.fontSize = "12px"
                }
                if (elem[i].type == 'radio' || elem[i].type == 'checkbox') {
                    if (document.getElementById(elem[i].id).disabled) {
                        disabledItems[x] = elem[i].id;
                        x++;
                    }
                    document.getElementById(elem[i].id).disabled = true;
                    document.getElementById(elem[i].id).style.height = "9px"
                    document.getElementById(elem[i].id).style.fontSize = "8px"
                }
                if (elem[i].type == 'select-one') {
                    if (elem[i].id == 'frm1702RT:ddlPg1I2Month') {
                        $(elem[i]).hide();
                        var label = "<div class='labels'>".concat(elem[i].value).concat("&nbsp;</div>");
                        $(elem[i]).after(label);
                    }
                    else {
                        $(elem[i]).hide();
                        var label = "<div class='labels'>".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</div>");
                        $(elem[i]).after(label);
                    }
                }
            }
        }

        $('input').each(function () {
            if (this.type == 'button') {
                if (this.name == 'navButton') {
                    $(this).attr("disabled", "disabled");
                }
                else if (this.id != 'test') {
                    $(this).addClass('previewButtonClass');
                }
            }
        });


        $('a').each(function () {
            if (this.id.length > 1) {
                document.getElementById(this.id).disabled = true;
            }
        });

        $('#printMenu').show('blind');
        if ($('#formMenu').css('display') != 'none') {
            $('#formMenu').hide('blind');
        }
    }

    function printModal(modalID) {
        alert("This form must be printed on an A4 Size Paper. Please update your Printer Settings to ensure the correct printout of the form.\n\n" +
                  "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166 and all Headers & Footers must be set to empty.");

        globalcancelModalInit = 1;
        globalcurrentDiv = modalID;
        $('#bg').hide();
        $('body').css({ 'zoom': '94%' });
        $('#' + modalID).removeClass("modalShow");
        $('#' + modalID).addClass("modalPrint");

        $('input').each(function () {
            if (this.type == 'button') {
                if (this.id != 'test') {
                    $(this).addClass('previewButtonClass');
                }
            }
        });

        $('a').each(function () {
            if (this.id.length > 1) {
                document.getElementById(this.id).disabled = true;
            }
        });

        $('#printMenu').show('blind');
        if ($('#formMenu').css('display') != 'none') {
            $('#formMenu').hide('blind');
        }
        window.print();
    }

    function cancelPrintOCR() {
        if (globalcancelModalInit == 1) {
            $('#bg').show();
            $('body').css({ 'zoom': '100%' });
            $('#' + globalcurrentDiv).removeClass("modalPrint");
            $('#' + globalcurrentDiv).addClass("modalShow");

            $('input').each(function () {
                if (this.type == 'button') {
                    if (this.id != 'test') {
                        $(this).removeClass('previewButtonClass');
                    }
                }
            });

            $('a').each(function () {
                if (this.id.length > 1) {
                    if (document.getElementById('frm1702RT:cmdValidate').disabled == false) {
                        if (enableElem) {
                            document.getElementById(this.id).disabled = true;
                        }
                        else if (disableElem) {
                            document.getElementById(this.id).disabled = false;
                        }
                    }
                    else {
                        if (disableElem) {
                            document.getElementById(this.id).disabled = true;
                        }
                        else if (enableElem) {
                            document.getElementById(this.id).disabled = false;
                        }
                    }
                }
            });

            $('#formMenu').show('blind');
            if ($('#printMenu').css('display') != 'none') {
                $('#printMenu').hide('blind');
            }

            if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
                // refer to SRS for this part
                //document.getElementById('frm1702RT:txtPg1I2Year').disabled = true;
                //document.getElementById('frm1702RT:ddlPg1I2Month').disabled = true;
            }
            globalcancelModalInit = 0;
            globalcurrentDiv = "";
        }
        else {
            $("#Print" + currentPage + "Content").hide();
            $("#Page" + currentPage + "Content").show();

            $('#bg').show();
            $('.printSignFooterClass').hide();
            $('.imgClass').hide();
            $('body').css({ 'background': '#FFF', 'zoom': '100%' });

            $('.labels').remove();

            var elems = $_Id("Print" + currentPage + "Content").getElementsByTagName("span");
            var i, len = elems.length;
            for (i = 0; i < len; i++) {
                elems[i].innerHTML = "";
            }

            $('input').each(function () {
                if (this.type == 'button') {
                    if (this.id != 'test') {
                        $(this).removeClass('previewButtonClass');
                    }
                }
            });

            $('a').each(function () {
                if (this.id.length > 1) {
                    if (document.getElementById('frm1702RT:cmdValidate').disabled == false) {
                        if (enableElem) {
                            document.getElementById(this.id).disabled = true;
                        }
                        else if (disableElem) {
                            document.getElementById(this.id).disabled = false;
                        }
                    }
                    else {
                        if (disableElem) {
                            document.getElementById(this.id).disabled = true;
                        }
                        else if (enableElem) {
                            document.getElementById(this.id).disabled = false;
                        }
                    }
                }
            });

            $('#formMenu').show('blind');
            if ($('#printMenu').css('display') != 'none') {
                $('#printMenu').hide('blind');
            }
        }

        $_Id('mnuPrint').disabled = false;
        isFromPrint = false;
    }

    var isFromPrint = false;

    function printOCR() {
        alert("This form must be printed on an A4 Size Paper. Please update your Printer Settings to ensure the correct printout of the form.\n\n" +
                  "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166 and all Headers & Footers must be set to empty.");

        $('#bg').hide();
        $('.printSignFooterClass').css({ 'width': '94%', 'margin': 'auto', 'margin-top': '15px', 'display': 'block', 'position': 'relative', 'overflow': 'visible', 'page-break-before': 'always' });
        $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
        
        var elems = $_Id("Page" + currentPage + "Content").getElementsByTagName("*");
        var i, len = elems.length, tempElem = {}, tempVal = {}, tempVar = "";

        disabledItems = new Array();
        for (i = 0; i < len; i++) {
            if (elems[i] != null && elems[i].type != 'hidden') {
                tempElem = $("#" + elems[i].id.split(":")[1]);
                tempVar = elems[i].id.split(":")[1];
                if (typeof (tempElem) !== "undefined" || tempElem !== null) {
                    if (elems[i].type == 'text') {
                        tempElem.html($_Id(elems[i].id).value);
                      
                        if (elems[i].id.indexOf("txtPg1Pt1I8") > -1 || elems[i].id.indexOf("Date") > -1) {
                            tempVal = elems[i].value.split("/");
                            if (tempVal.length > 0) {
                                $("#" + tempVar + "M").html(tempVal[0]);
                                $("#" + tempVar + "D").html(tempVal[1]);
                                $("#" + tempVar + "Y").html(tempVal[2]);
                            }
                        }
                        if (elems[i].id.indexOf("txtPg1Pt1I10Address") > -1) {
                            var address1 = $_Id(elems[i].id).value.substring(0, 70);
                            var address2 = $_Id(elems[i].id).value.substring(70);
                            $("#" + tempVar + "1").html(address1);
                            $("#" + tempVar + "2").html(address2);
                        }
                        //contact number
                        if (elems[i].id.indexOf("txtPg1Pt1I11Contact") > -1) {
                            var contactPrefix = $_Id(elems[i].id).value.substring(0, 4);
                            var contactNumber = $_Id(elems[i].id).value.substring(4);
                            $("#" + tempVar + "1").html(contactPrefix);
                            $("#" + tempVar + "2").html(contactNumber);
                        }
                    }
                    else if (elems[i].type == 'select-one') {
                        if (elems[i].id.indexOf("drpPg1I5AtcOther") > -1 && $_Id("frm1702RT:rdoPg1I5AtcOther").checked === true) {
                            tempVal = elems[i].options[elems[i].selectedIndex].text.split("-");
                            $("#drpPg1I5AtcOther1").html(tempVal[0]);
                            $("#drpPg1I5AtcOther2").html(tempVal[1] + ' - ' + tempVal[2]);
                        }
                        else {
                            tempElem.html(elems[i].value);
                        }
                    }
                    else if (elems[i].type == 'radio' || elems[i].type == 'checkbox') {
                        tempElem.html(!!elems[i].checked ? "X" : "");
                    }
                }
            }
        }
        $('#formPaper').css({ 'border': '1px solid #fff' });
        $('.printButtonClass').hide();
        $("#Page" + currentPage + "Content").hide();
        $("#Print1Content").show();
        $("#Print2Content").show();
        $("#Print3Content").show();
        $("#Print4Content").show();
        $("#Print5Content").show();
        $("#Print6Content").show();
        $("#Print7Content").show();

        $("#Print2Content").css({ 'margin-top': '150px'});
        $("#Print3Content").css({ 'margin-top': '150px'});
        $("#Print4Content").css({ 'margin-top': '150px'});
        $("#Print5Content").css({ 'margin-top': '150px'});
        $("#Print6Content").css({ 'margin-top': '150px'});
        $("#Print7Content").css({ 'margin-top': '150px'});

        window.print();

        $('.printButtonClass').hide('blind');
        $("#Page" + currentPage + "Content").show();
        $("#Print1Content").hide();
        $("#Print2Content").hide();
        $("#Print3Content").hide();
        $("#Print4Content").hide();
        $("#Print5Content").hide();
        $("#Print6Content").hide();
        $("#Print7Content").hide();
         $('.printButtonClass').show();
        $('#printMenu').show('blind');
        if ($('#formMenu').css('display') != 'none') {
            $('#formMenu').hide('blind');
        }

        isFromPrint = true;
    }
    function AddRow_modalTablePg8Sc12II() {
        var myDiv = document.getElementById("tempModalDivPg8Sc12II");
        i = $("#tempModalDivPg8Sc12II div").length;
        var lastTabIndex = $("#tempModalDivPg8Sc12IIinput[type=text]").last().attr('tabindex');
        var tabindex = (typeof lastTabIndex === 'undefined') ? 2100 + (10 * i) : lastTabIndex + 1;
        var tabindex2 = tabindex + 5;
        $('#tempModalDivPg8Sc12II').append('<div id="tempModalDivPg8Sc12II' + (i + 1) + '" >'
                        + '                <table class="tblForm" style="width: 100%;">'
                        + '                    <tr>'
                        + '                        <td class="tblFormTd ContentBold">'
                        + '                        </td>'
                        + '                        <td class="tblFormTd">'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <span style="font-weight: bold; font-size: small;">' + LetterIteration((i * 2) + 3, 1) + '</span>'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <span style="font-weight: bold; font-size: small;">' + LetterIteration((i * 2) + 4, 1) + '</span>'
                        + '                        </td>'
                        + '                    </tr>'
                        + '                    <tr>'
                        + '                        <td class="tblFormTd ContentBold">'
                        + '                            <span style="font-weight: bold;">5</span>'
                        + '                        </td>'
                        + '                        <td class="tblFormTd">'
                        + '                            <span style="font-size: small;">Description of Property</span> <span style="font-size: x-small;">'
                        + '                                (e.g., land, improvement, etc.)</span>'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I5CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I5CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I5CA[]" size="26" maxlength="23" onkeypress="return Name(this, event);"  onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + tabindex + '"/>'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I5CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I5CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I5CB[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + tabindex2 + '"/>'
                        + '                        </td>'
                        + '                    </tr>'
                        + '                    <tr>'
                        + '                        <td class="tblFormTd ContentBold">'
                        + '                            <span style="font-weight: bold;">6</span>'
                        + '                        </td>'
                        + '                        <td class="tblFormTd">'
                        + '                            <span style="font-size: small;">OCT/TCT/CCT/Tax Declaration No.</span>'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I6CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I6CA-' + (i + 1) + '"  name="frm1702RT:txtPg8Sc12I6CA[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + (tabindex + 1) + '" />'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I6CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I6CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I6CB[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + (tabindex2 + 1) + '"/>'
                        + '                        </td>'
                        + '                    </tr>'
                        + '                    <tr>'
                        + '                        <td class="tblFormTd ContentBold">'
                        + '                            <span style="font-weight: bold;">7</span>'
                        + '                        </td>'
                        + '                        <td class="tblFormTd">'
                        + '                            <span style="font-size: small;">Certificate Authorizing Registration (CAR) No.</span>'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I7CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I7CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I7CA[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + (tabindex + 2) + '" />'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I7CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I7CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I7CB[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + (tabindex2 + 2) + '"/>'
                        + '                        </td>'
                        + '                    </tr>'
                        + '                    <tr>'
                        + '                        <td class="tblFormTd ContentBold">'
                        + '                            <span style="font-weight: bold;">8</span>'
                        + '                        </td>'
                        + '                        <td class="tblFormTd">'
                        + '                            <span style="font-size: small;">Actual Amount/Fair Market Value/Net Capital Gains</span>'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I8CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I8CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I8CA[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id,this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true);getAttributeValue(this.value);"'
                        + '                                value="0" style="text-align: right;" tabIndex="' + (tabindex + 3) + '"/>'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I8CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I8CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I8CB[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id,this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"'
                        + '                                value="0" style="text-align: right;" tabIndex="' + (tabindex2 + 3) + '"/>'
                        + '                        </td>'
                        + '                    </tr>'
                        + '                    <tr>'
                        + '                        <td class="tblFormTd ContentBold">'
                        + '                            <span style="font-weight: bold;">9</span>'
                        + '                        </td>'
                        + '                        <td class="tblFormTd">'
                        + '                            <span style="font-size: small;">Final Tax Withheld/Paid</span>'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <input type="text"  id="frm1702RT:txtPg8Sc12I9CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I9CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I9CA[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id,this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"'
                        + '                                  value="0" style="text-align: right;" tabIndex="' + (tabindex + 4) + '"/>'
                        + '                 </td>'
                        + '                     <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                         <input type="text"  id="frm1702RT:txtPg8Sc12I9CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I9CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I9CB[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id,this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"'
                        + '                              value="0" style="text-align: right;" tabIndex="' + (tabindex2 + 4) + '"/>'
                        + '                     </td>'
                        + '                   </tr> '
                        + '             </table>'
                        + '             <table class="tblForm" style="width: 100%;"> '
                        + '                    <tr>'
                        + '                        <td class="tblFormTd ContentBold">'
                        + '                        </td>'
                        + '                        <td class="tblFormTd">'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                         </td>'
                        + '                         <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                         <input type="button" value="Remove" onclick="deleteDiv(this),FixId_modalDivPg8Sc12II()"/> '
                        + '                         </td>'
                        + '                   </tr> '
                        + '             </table>'
                        + '         </div> '
                        );

        //Adds highlight and select all in inputs
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

    }

    function FixId_modalDivPg8Sc12II() {
        var length = $("#tempModalDivPg8Sc12II div").length;

        for (i = 0; i < length; i++) {
            var currentDivTable = $("#tempModalDivPg8Sc12II div").eq(i).find('table');
            $("#tempModalDivPg8Sc12II div")[i].setAttribute("id", "tempModalDivPg8Sc12II-" + (i + 1));
            // First column header
            currentDivTable.eq(0).find("td span").eq(0).html(LetterIteration((i * 2) + 3, 1));
            //second column header
            currentDivTable.eq(0).find("td span").eq(1).html(LetterIteration((i * 2) + 4, 1));
            //DescriptionofProperty
            currentDivTable.eq(0).find("td input")[0].setAttribute("id", "frm1702RT:txtPg8Sc12I5CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[1].setAttribute("id", "frm1702RT:txtPg8Sc12I5CB-" + (i + 1));
            //OCT
            currentDivTable.eq(0).find("td input")[2].setAttribute("id", "frm1702RT:txtPg8Sc12I6CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[3].setAttribute("id", "frm1702RT:txtPg8Sc12I6CB-" + (i + 1));
            //CAR
            currentDivTable.eq(0).find("td input")[4].setAttribute("id", "frm1702RT:txtPg8Sc12I7CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[5].setAttribute("id", "frm1702RT:txtPg8Sc12I7CB-" + (i + 1));
            //ActualAmount
            currentDivTable.eq(0).find("td input")[6].setAttribute("id", "frm1702RT:txtPg8Sc12I8CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[7].setAttribute("id", "frm1702RT:txtPg8Sc12I8CB-" + (i + 1));
            //FinalTax
            currentDivTable.eq(0).find("td input")[8].setAttribute("id", "frm1702RT:txtPg8Sc12I9CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[9].setAttribute("id", "frm1702RT:txtPg8Sc12I9CB-" + (i + 1));

        }
    }

    function getAttributeValue(item,value){
        list = document.getElementsByClassName(item);
        for (index = 0; index < list.length; ++index) {
            list[index].setAttribute('value',value);
        }
       
    }
    function getSelectedValue(item){
        if(item.value == 'CS'){
            $('.'+item.value,item).attr('selected', 'selected');
            $('.PS').removeAttr('selected')
        }else{
            $('.'+item.value,item).attr('selected', 'selected');
            $('.CS').removeAttr('selected')
        }
    
    }
    function Save_modalDivPg8Sc12II() {
        FixId_modalDivPg8Sc12II();

        $("#mainModalDivPg8Sc12II").html(function () {
            return $("#tempModalDivPg8Sc12II").html();
        });

        $("#tempModalDivPg8Sc12II div").remove();
        computePg8Sc12I19II();
        computePg8Sc12I19();
        Load_modalDivPg8Sc12II();
        count = $("#mainModalDivPg8Sc12II div").length;
     
        if (count > 0) {
            document.getElementById("frm1702RT:txtCtrmodalPg8Sc12II").value = count;
        }
        else {
            document.getElementById("frm1702RT:txtCtrmodalPg8Sc12II").value = 0;
        }
    }

    function Load_modalDivPg8Sc12II() {
        $("#tempModalDivPg8Sc12II").html(function () {
            return $("#mainModalDivPg8Sc12II").html();
        });

        //Adds highlight and select all in inputs
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        checkFormValidated();
    }

    function Cancel_modalDivPg8Sc12II() {
        var r = confirm("Are you sure to want to cancel? This will restore currently saved information.");
        if (r == true) {
            $("#tempModalDivPg8Sc12II").html(function () {
                return $("#mainModalDivPg8Sc12II").html();
            });
        }
    }

    function deleteDiv(btn) {
        $(btn).closest('div').remove();
    }

    function AddRow_modalTablePg8Sc12III() {
        var myDiv = document.getElementById("tempModalDivPg8Sc12III");
        i = $("#tempModalDivPg8Sc12III div").length;
        var lastTabIndex = $("#tempModalDivPg8Sc12IIIinput[type=text]").last().attr('tabindex');
        var tabindex = (typeof lastTabIndex === 'undefined') ? 2100 + (14 * i) : lastTabIndex + 1;
        var tabindex2 = tabindex + 7;
        $('#tempModalDivPg8Sc12III').append('<div id="tempModalDivPg8Sc12III' + (i + 1) + '" >'
                    + '         <table class="tblForm" style="width: 100%;">                                                                                                                                             '
                    + '                   <tr>                                                                                                                                  '
                    + '                       <td class="tblFormTd ContentBold">                                                                                                '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd">                                                                                                            '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                    + '                           <span style="font-weight: bold; font-size: small;">' + LetterIteration((i * 2) + 3, 1) + '</span>                                                 '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                    + '                           <span style="font-weight: bold; font-size: small;">' + LetterIteration((i * 2) + 4, 1) + '</span>                                                 '
                    + '                       </td>                                                                                                                             '
                    + '                   </tr>                                                                                                                                 '
                    + '                                                                                                                                                         '
                    + '                   <tr>                                                                                                                                  '
                    + '                       <td class="tblFormTd ContentBold">                                                                                                '
                    + '                           <span style="font-weight: bold;">10</span>                                                                                    '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd">                                                                                                            '
                    + '                           <span style="font-size: small;">Kind (PS/CS) Stock Certificate Series No.</span>                                              '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd ColumnHeader"  style="width: 27%;">                                                                           '
                    + '                           <select onchange="getSelectedValue(this);" id="frm1702RT:drpPg8Sc12I10CA-1-' + (i + 1) + '" class="frm1702RT:drpPg8Sc12I10CA-1-' + (i + 1) + '" name="frm1702RT:drpPg8Sc12I10CA-1[]" tabIndex="' + tabindex + '">                                                                                     '
                    + '                               <option class="PS" value="PS" selected="selected">PS</option>                                                                                            '
                    + '                               <option class="CS" value="CS">CS</option>                                                                                            '
                    + '                           </select>/                                                                                                                    '
                    + '                           <input type="text" id="frm1702RT:txtPg8Sc12I10CA-2-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I10CA-2-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I10CA-2[]" size="18" maxlength="18" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id, this.value);" tabIndex="' + (tabindex + 1) + '"/>                                                               '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                    + '                           <select onchange="getSelectedValue(this);"  id="frm1702RT:drpPg8Sc12I10CB-1-' + (i + 1) + '" class="frm1702RT:drpPg8Sc12I10CB-1-' + (i + 1) + '" name="frm1702RT:drpPg8Sc12I10CB-1[]" tabIndex="' + tabindex2 + '">                                                                                     '
                    + '                               <option class="PS" value="PS" selected="selected">PS</option>                                                                                            '
                    + '                               <option class="CS" value="CS">CS</option>                                                                                            '
                    + '                           </select>/                                                                                                                    '
                    + '                           <input type="text" id="frm1702RT:txtPg8Sc12I10CB-2-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I10CB-2-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I10CB-2[]" size="18" maxlength="18" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id, this.value);" tabIndex="' + (tabindex2 + 1) + '"/>                                                               '
                    + '                       </td>                                                                                                                             '
                    + '                   </tr>                                                                                                                                 '
                    + '                                                                                                                                                         '
                    + '                   <tr>                                                                                                                                  '
                    + '                       <td class="tblFormTd ContentBold">                                                                                                '
                    + '                           <span style="font-weight: bold;">11</span>                                                                                    '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd">                                                                                                            '
                    + '                           <span style="font-size: small;">Certificate Authorizing Registration (CAR) No.</span>                                                 '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                    + '                           <input type="text" id="frm1702RT:txtPg8Sc12I11CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I11CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I11CA[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id, this.value);" tabIndex="' + (tabindex + 2) + '"/>                                                                          '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                    + '                           <input type="text" id="frm1702RT:txtPg8Sc12I11CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I11CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I11CB[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id, this.value);" tabIndex="' + (tabindex2 + 2) + '"/>                                                                          '
                    + '                       </td>                                                                                                                             '
                    + '                   </tr>                                                                                                                                 '
                    + '                                                                                                                                                         '
                    + '                   <tr>                                                                                                                                  '
                    + '                       <td class="tblFormTd ContentBold">                                                                                                '
                    + '                           <span style="font-weight: bold;">12</span>                                                                                    '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd">                                                                                                            '
                    + '                           <span style="font-size: small;">Number of Shares</span>                                                                       '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                    + '                           <input type="text" id="frm1702RT:txtPg8Sc12I12CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I12CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I12CA[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id, this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                 '
                    + '                               value="0" style="text-align: right;" tabIndex="' + (tabindex + 3) + '"/>                                                                                   '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                    + '                           <input type="text" id="frm1702RT:txtPg8Sc12I12CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I12CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I12CB[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id, this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                 '
                    + '                               value="0" style="text-align: right;" tabIndex="' + (tabindex2 + 3) + '"/>                                                                                   '
                    + '                       </td>                                                                                                                             '
                    + '                   </tr>                                                                                                                                 '
                    + '                                                                                                                                                         '
                    + '                   <tr>                                                                                                                                  '
                    + '                       <td class="tblFormTd ContentBold">                                                                                                '
                    + '                           <span style="font-weight: bold;">13</span>                                                                                    '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd">                                                                                                            '
                    + '                           <span style="font-size: small;">Date of Issue </span><span style="font-size: x-small;                                         '
                    + '                               font-style: italic">(MM/DD/YYY)</span>                                                                                    '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                    + '                           <input id="frm1702RT:txtPg8Sc12I13CADate' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I13CADate' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I13CADate[]" type="text" size="26" style="text-align:center"  onkeypress="dateMasking(this);return wholenumber(event, false);" maxlength="10" onblur="validateIssueDateSchedule12(this);getAttributeValue(this.id, this.value);" tabIndex="' + (tabindex + 4) + '"/>       '
                    + '                        </td>                                                                                                                            '
                    + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                    + '                           <input id="frm1702RT:txtPg8Sc12I13CBDate' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I13CBDate' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I13CBDate[]" type="text" size="26" style="text-align:center"  onkeypress="dateMasking(this);return wholenumber(event, false);" maxlength="10" onblur="validateIssueDateSchedule12(this);getAttributeValue(this.id, this.value);" tabIndex="' + (tabindex2 + 4) + '"/>       '
                    + '                       </td>                                                                                                                             '
                    + '                   </tr>                                                                                                                                 '
                    + '                                                                                                                                                         '
                    + '                   <tr>                                                                                                                                  '
                    + '                       <td class="tblFormTd ContentBold">                                                                                                '
                    + '                           <span style="font-weight: bold;">14</span>                                                                                    '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd">                                                                                                            '
                    + '                           <span style="font-size: small;">Actual Amount/Fair Market Value/ Net Capital Gains</span>                                     '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                    + '                           <input type="text" id="frm1702RT:txtPg8Sc12I14CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I14CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I14CA[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id, this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                 '
                    + '                               value="0" style="text-align: right;" tabIndex="' + (tabindex + 5) + '"/>                                                                                   '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                    + '                           <input type="text" id="frm1702RT:txtPg8Sc12I14CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I14CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I14CB[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id, this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                 '
                    + '                               value="0" style="text-align: right;" tabIndex="' + (tabindex2 + 5) + '"/>                                                                                   '
                    + '                       </td>                                                                                                                             '
                    + '                   </tr>                                                                                                                                 '
                    + '                                                                                                                                                         '
                    + '                   <tr>                                                                                                                                  '
                    + '                       <td class="tblFormTd ContentBold">                                                                                                '
                    + '                           <span style="font-weight: bold;">15</span>                                                                                    '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd">                                                                                                            '
                    + '                           <span style="font-size: small;">Final Tax Withheld/Paid</span>                                                                '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                    + '                           <input type="text" id="frm1702RT:txtPg8Sc12I15CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I15CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I15CA[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id, this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                 '
                    + '                                Name="frm1702RT:txtPg8Sc12I19name-III"  value="0" style="text-align: right;" tabIndex="' + (tabindex + 6) + '"/>                                                     '
                    + '                       </td>                                                                                                                             '
                    + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                    + '                           <input type="text" id="frm1702RT:txtPg8Sc12I15CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I15CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I15CB[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id, this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                 '
                    + '                               Name="frm1702RT:txtPg8Sc12I19name-III"  value="0" style="text-align: right;" tabIndex="' + (tabindex2 + 6) + '"/>                                                     '
                    + '                       </td>                                                                                                                             '
                    + '                   </tr>                                                                                                                                 '
                    + '               </table>                                                                                                                                  '
                    + '             <table class="tblForm" style="width: 100%;">                                                                                                                    '
                    + '                    <tr>                                                                                                                                 '
                    + '                        <td class="tblFormTd ContentBold">                                                                                               '
                    + '                        </td>'
                    + '                        <td class="tblFormTd">'
                    + '                        </td>'
                    + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                    + '                         </td>'
                    + '                         <td class="tblFormTd ColumnHeader" style="width: 27%;">'

                    + ' <input type="button" value="Remove" onclick="deleteDiv(this),FixId_modalDivPg8Sc12III()"/> '
                    + '                         </td>'
                    + '                   </tr> '
                    + ' </table> '
                    + ' </div>'
                    );

        //Adds highlight and select all in inputs
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });
    }

    function FixId_modalDivPg8Sc12III() {

        var length = $("#tempModalDivPg8Sc12III div").length;
        for (i = 0; i < length; i++) {
            var currentDivTable = $("#tempModalDivPg8Sc12III div").eq(i).find('table');
            $("#tempModalDivPg8Sc12III div")[i].setAttribute("id", "tempModalDivPg8Sc12III-" + (i + 1));
            // First column header
            currentDivTable.eq(0).find("td span").eq(0).html(LetterIteration((i * 2) + 3, 1));
            //second column header
            currentDivTable.eq(0).find("td span").eq(1).html(LetterIteration((i * 2) + 4, 1));
            //dropdown
            currentDivTable.eq(0).find("td select")[0].setAttribute("id", "frm1702RT:drpPg8Sc12I10CA-1-" + (i + 1));
            currentDivTable.eq(0).find("td select")[1].setAttribute("id", "frm1702RT:drpPg8Sc12I10CB-1-" + (i + 1));
            //textbox
            currentDivTable.eq(0).find("td input")[0].setAttribute("id", "frm1702RT:txtPg8Sc12I10CA-2-" + (i + 1));
            currentDivTable.eq(0).find("td input")[1].setAttribute("id", "frm1702RT:txtPg8Sc12I10CB-2-" + (i + 1));

            currentDivTable.eq(0).find("td input")[2].setAttribute("id", "frm1702RT:txtPg8Sc12I11CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[3].setAttribute("id", "frm1702RT:txtPg8Sc12I11CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[4].setAttribute("id", "frm1702RT:txtPg8Sc12I12CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[5].setAttribute("id", "frm1702RT:txtPg8Sc12I12CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[6].setAttribute("id", "frm1702RT:txtPg8Sc12I13CADate" + (i + 1));
            currentDivTable.eq(0).find("td input")[7].setAttribute("id", "frm1702RT:txtPg8Sc12I13CBDate" + (i + 1));

            currentDivTable.eq(0).find("td input")[8].setAttribute("id", "frm1702RT:txtPg8Sc12I14CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[9].setAttribute("id", "frm1702RT:txtPg8Sc12I14CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[10].setAttribute("id", "frm1702RT:txtPg8Sc12I15CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[11].setAttribute("id", "frm1702RT:txtPg8Sc12I15CB-" + (i + 1));

        }
    }
    function Save_modalDivPg8Sc12III() {

        FixId_modalDivPg8Sc12III();

        $("#mainModalDivPg8Sc12III").html(function () {
            return $("#tempModalDivPg8Sc12III").html();
        });

        $("#tempModalDivPg8Sc12III div").remove();
        computePg8Sc12I19III();
        computePg8Sc12I19();
        Load_modalDivPg8Sc12III();
        count = $("#mainModalDivPg8Sc12III div").length;
        if (count > 0) {
            document.getElementById("frm1702RT:txtCtrmodalPg8Sc12III").value = count;
        }
        else {
            document.getElementById("frm1702RT:txtCtrmodalPg8Sc12III").value = 0;
        }

    }
    function Load_modalDivPg8Sc12III() {
        $("#tempModalDivPg8Sc12III").html(function () {
            return $("#mainModalDivPg8Sc12III").html();
        });

        //Adds highlight and select all in inputs
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        checkFormValidated();
    }
    function Cancel_modalDivPg8Sc12III() {
        var r = confirm("Are you sure to want to cancel? This will restore currently saved information.");
        if (r == true) {
            $("#tempModalDivPg8Sc12III").html(function () {
                return $("#mainModalDivPg8Sc12III").html();
            });
        }
    }

    function AddRow_modalTablePg8Sc12IV() {
        var myDiv = document.getElementById("tempModalDivPg8Sc12IV");
        i = $("#tempModalDivPg8Sc12IV div").length;
        var lastTabIndex = $("#tempModalDivPg8Sc12IVinput[type=text]").last().attr('tabindex');
        var tabindex = (typeof lastTabIndex === 'undefined') ? 2100 + (6 * i) : lastTabIndex + 1;
        var tabindex2 = tabindex + 3;
        $('#tempModalDivPg8Sc12IV').append('<div id="tempModalDivPg8Sc12IV' + (i + 1) + '" >'
        + '         <table class="tblForm" style="width: 100%;">                                                                                                                                '
                        + '                    <tr>                                                                                                                                        '
                        + '                        <td class="tblFormTd ContentBold">                                                                                                      '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd">                                                                                                                  '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                 '
                        + '                            <span style="font-weight: bold; font-size: small;">' + LetterIteration((i * 2) + 3, 2) + '</span>                                                                          '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                 '
                        + '                            <span style="font-weight: bold; font-size: small;">' + LetterIteration((i * 2) + 4, 2) + '</span>                                                                          '
                        + '                        </td>                                                                                                                                   '
                        + '                    </tr>                                                                                                                                       '
                        + '                    <tr>                                                                                                                                        '
                        + '                        <td class="tblFormTd ContentBold">                                                                                                      '
                        + '                            16                                                                                                                                  '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd">                                                                                                                  '
                        + '                            <span style="font-size: small;">Other Income Subject to Final Tax Under Sections 57(A)/127/others                                       '
                        + '                                of the Tax Code, as amended</span> <span style="font-style: italic; font-size: x-small;">                                       '
                        + '                                    (Specify)</span>                                                                                                            '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                 '
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I16CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I16CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I16CA[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + tabindex + '"/>                                                                                '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                 '
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I16CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I16CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I16CB[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + tabindex2 + '"/>                                                                                '
                        + '                        </td>                                                                                                                                   '
                        + '                    </tr>                                                                                                                                       '
                        + '                    <tr>                                                                                                                                        '
                        + '                        <td class="tblFormTd ContentBold">                                                                                                      '
                        + '                            17                                                                                                                                  '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd">                                                                                                                  '
                        + '                            <span style="font-size: small;">Actual Amount/Fair Market Value/Net Capital Gains</span>                                            '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                 '
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I17CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I17CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I17CA[]" size="26" onblur="checkNumValue(this); this.value=addCommas(this.value);getAttributeValue(this.id,this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                       '
                        + '                                value="0" style="text-align: right;" tabIndex="' + (tabindex + 1) + '"/>                                                                                         '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                 '
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I17CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I17CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I17CB[]" size="26" onblur="checkNumValue(this); this.value=addCommas(this.value);getAttributeValue(this.id,this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                       '
                        + '                                value="0" style="text-align: right;" tabIndex="' + (tabindex2 + 1) + '"/>                                                                                         '
                        + '                        </td>                                                                                                                                   '
                        + '                    </tr>                                                                                                                                       '
                        + '                    <tr>                                                                                                                                        '
                        + '                        <td class="tblFormTd ContentBold">                                                                                                      '
                        + '                            18                                                                                                                                  '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd">                                                                                                                  '
                        + '                            <span style="font-size: small;">Final Tax Withheld/Paid</span>                                                                      '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                 '
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I18CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I18CA-' + (i + 1) + '"  name="frm1702RT:txtPg8Sc12I18CA[]" size="26" onblur="checkNumValue(this); this.value=addCommas(this.value);getAttributeValue(this.id,this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                       '
                        + '                                 Name="frm1702RT:txtPg8Sc12I19name-IV"  value="0" style="text-align: right;" tabIndex="' + (tabindex + 2) + '"/>                                                           '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                 '
                        + '                            <input type="text" id="frm1702RT:txtPg8Sc12I18CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc12I18CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc12I18CB[]" size="26" onblur="checkNumValue(this); this.value=addCommas(this.value);getAttributeValue(this.id,this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                       '
                        + '                                 Name="frm1702RT:txtPg8Sc12I19name-IV"  value="0" style="text-align: right;" tabIndex="' + (tabindex2 + 2) + '"/>                                                           '
                        + '                        </td>                                                                                                                                   '
                        + '                    </tr>                                                                                                                                       '
                        + '     </table>                                            '
                        + '             <table class="tblForm" style="width: 100%;"> '
                        + '                    <tr>'
                        + '                        <td class="tblFormTd ContentBold">'
                        + '                        </td>'
                        + '                        <td class="tblFormTd">'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                         </td>'
                        + '                         <td class="tblFormTd ColumnHeader" style="width: 27%;">'

                        + ' <input type="button" value="Remove" onclick="deleteDiv(this),FixId_modalDivPg8Sc12IV()"/> '
                        + '                         </td>'
                        + '                   </tr> '
                        + '             </table>'
                        + ' </div> '
                        );

        //Adds highlight and select all in inputs
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });
    }

    function FixId_modalDivPg8Sc12IV() {

        var length = $("#tempModalDivPg8Sc12IV div").length;
        for (i = 0; i < length; i++) {
            var currentDivTable = $("#tempModalDivPg8Sc12IV div").eq(i).find('table');
            $("#tempModalDivPg8Sc12IV div")[i].setAttribute("id", "tempModalDivPg8Sc12IV-" + (i + 1));
            // First column header
            currentDivTable.eq(0).find("td span").eq(0).html(LetterIteration((i * 2) + 3, 2));
            //second column header
            currentDivTable.eq(0).find("td span").eq(1).html(LetterIteration((i * 2) + 4, 2));

            currentDivTable.eq(0).find("td input")[0].setAttribute("id", "frm1702RT:txtPg8Sc12I16CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[1].setAttribute("id", "frm1702RT:txtPg8Sc12I16CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[2].setAttribute("id", "frm1702RT:txtPg8Sc12I17CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[3].setAttribute("id", "frm1702RT:txtPg8Sc12I17CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[4].setAttribute("id", "frm1702RT:txtPg8Sc12I18CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[5].setAttribute("id", "frm1702RT:txtPg8Sc12I18CB-" + (i + 1));


        }
    }
    function Save_modalDivPg8Sc12IV() {

        FixId_modalDivPg8Sc12IV();

        $("#mainModalDivPg8Sc12IV").html(function () {
            return $("#tempModalDivPg8Sc12IV").html();
        });
        $("#tempModalDivPg8Sc12IV div").remove();
        computePg8Sc12I19IV();
        computePg8Sc12I19();
        Load_modalDivPg8Sc12IV();
        count = $("#mainModalDivPg8Sc12IV div").length;
        if (count > 0) {
            document.getElementById("frm1702RT:txtCtrmodalPg8Sc12IV").value = count;
        }
        else {
            document.getElementById("frm1702RT:txtCtrmodalPg8Sc12IV").value = 0;
        }


    }
    function Load_modalDivPg8Sc12IV() {
        $("#tempModalDivPg8Sc12IV").html(function () {
            return $("#mainModalDivPg8Sc12IV").html();
        });

        //Adds highlight and select all in inputs
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        checkFormValidated();
    }

    function Cancel_modalDivPg8Sc12IV() {
        var r = confirm("Are you sure to want to cancel? This will restore currently saved information.");
        if (r == true) {
            $("#tempModalDivPg8Sc12IV").html(function () {
                return $("#mainModalDivPg8Sc12IV").html();
            });
        }
    }

    function AddRow_modalTablePg8Sc13I() {
        var myDiv = document.getElementById("tempModalDivPg8Sc13I");
        i = $("#tempModalDivPg8Sc13I div").length;
        var lastTabIndex = $("#tempModalDivPg8Sc13Iinput[type=text]").last().attr('tabindex');
        var tabindex = (typeof lastTabIndex === 'undefined') ? 2100 + (8 * i) : lastTabIndex + 1;
        var tabindex2 = tabindex + 4;
        $('#tempModalDivPg8Sc13I').append('<div id="tempModalDivPg8Sc13I' + (i + 1) + '" >'
            + '                            <table class="tblForm RowSubTable" style="width: 100%;">                                                                                                                 '
            + '                                <tr>                                                                                                                                            '
            + '                                    <td class="tblFormTd ContentBold">                                                                                                          '
            + '                                                                                                                                                                              '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd">                                                                                                                      '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
            + '                                        <span style="font-weight: bold; font-size: small;">' + LetterIteration((i * 2) + 3, 3) + '</span>                                                '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
            + '                                        <span style="font-weight: bold; font-size: small;">' + LetterIteration((i * 2) + 4, 3) + '</span>                                                '
            + '                                    </td>                                                                                                                                       '
            + '                                </tr>                                                                                                                                           '
            + '                                <tr>                                                                                                                                            '
            + '                                    <td class="tblFormTd ContentBold">                                                                                                          '
            + '                                        2                                                                                                                                       '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd">                                                                                                                      '
            + '                                        <span style="font-size: small;">Description of Property</span> <span style="font-size: x-small;                                         '
            + '                                            font-style: italic;">(e.g., land, improvement, etc.)</span>                                                                         '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
            + '                                        <input type="text" id="frm1702RT:txtPg8Sc13I2CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc13I2CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc13I2CA[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + tabindex + '"/>                                                                                     '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
            + '                                        <input type="text" id="frm1702RT:txtPg8Sc13I2CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc13I2CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc13I2CB[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + tabindex2 + '"/>                                                                                     '
            + '                                    </td>                                                                                                                                       '
            + '                                </tr>                                                                                                                                           '
            + '                                <tr>                                                                                                                                            '
            + '                                    <td class="tblFormTd ContentBold">                                                                                                          '
            + '                                        3                                                                                                                                       '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd">                                                                                                                      '
            + '                                        <span style="font-size: small;">Mode of Transfer</span> <span style="font-size: x-small;                                                '
            + '                                            font-style: italic;">(e.g., Donation)</span>                                                                                        '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
            + '                                        <input type="text" id="frm1702RT:txtPg8Sc13I3CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc13I3CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc13I3CA[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + (tabindex + 1) + '"/>                                                                                     '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
            + '                                        <input type="text" id="frm1702RT:txtPg8Sc13I3CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc13I3CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc13I3CB[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + (tabindex2 + 1) + '"/>                                                                                     '
            + '                                    </td>                                                                                                                                       '
            + '                                </tr>                                                                                                                                           '
            + '                                <tr>                                                                                                                                            '
            + '                                    <td class="tblFormTd ContentBold">                                                                                                          '
            + '                                        4                                                                                                                                       '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd">                                                                                                                      '
            + '                                        <span style="font-size: small;">Certificate Authorizing Registration (CAR) No.</span>                                                   '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
            + '                                        <input type="text" id="frm1702RT:txtPg8Sc13I4CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc13I4CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc13I4CA[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + (tabindex + 2) + '"/>                                                                                     '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
            + '                                        <input type="text" id="frm1702RT:txtPg8Sc13I4CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc13I4CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc13I4CB[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + (tabindex2 + 2) + '"/>                                                                                     '
            + '                                    </td>                                                                                                                                       '
            + '                                </tr>                                                                                                                                           '
            + '                                <tr>                                                                                                                                            '
            + '                                    <td class="tblFormTd ContentBold">                                                                                                          '
            + '                                        5                                                                                                                                       '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd">                                                                                                                      '
            + '                                        <span style="font-size: small;">Actual Amount/Fair Market Value</span>                                                                  '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
            + '                                        <input type="text" id="frm1702RT:txtPg8Sc13I5CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc13I5CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc13I5CA[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id,this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                            '
            + '                                            Name="frm1702RT:txtPg8Sc13I8name-I" value="0" style="text-align: right;" tabIndex="' + (tabindex + 3) + '"/>                                                                '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
            + '                                        <input type="text" id="frm1702RT:txtPg8Sc13I5CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc13I5CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc13I5CB[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id,this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                            '
            + '                                            Name="frm1702RT:txtPg8Sc13I8name-I" value="0" style="text-align: right;" tabIndex="' + (tabindex2 + 3) + '"/>                                                                '
            + '                                    </td>                                                                                                                                       '
            + '                                </tr>                                                                                                                                           '
            + '                             </table>                                                                                                                                                       '
            + '                             <table class="tblForm" style="width: 100%;"> '
            + '                                 <tr>'
            + '                                     <td class="tblFormTd ContentBold">'
            + '                                     </td>'
            + '                                     <td class="tblFormTd">'
            + '                                     </td>'
            + '                                     <td class="tblFormTd ColumnHeader" style="width: 27%;">'
            + '                                     </td>'
            + '                                     <td class="tblFormTd ColumnHeader" style="width: 27%;">'
            + '                                         <input type="button" value="Remove" onclick="deleteDiv(this),FixId_modalDivPg8Sc13I()"/> '
            + '                                     </td>'
            + '                                 </tr> '
            + '                             </table>'
            + '                         </div> '
            );

        //Adds highlight and select all in inputs
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });
    }
    function FixId_modalDivPg8Sc13I() {

        var length = $("#tempModalDivPg8Sc13I div").length;
        for (i = 0; i < length; i++) {
            var currentDivTable = $("#tempModalDivPg8Sc13I div").eq(i).find('table');
            $("#tempModalDivPg8Sc13I div")[i].setAttribute("id", "tempModalDivPg8Sc13I-" + (i + 1));
            // First column header
            currentDivTable.eq(0).find("td span").eq(0).html(LetterIteration((i * 2) + 3, 3));
            //second column header
            currentDivTable.eq(0).find("td span").eq(1).html(LetterIteration((i * 2) + 4, 3));

            currentDivTable.eq(0).find("td input")[0].setAttribute("id", "frm1702RT:txtPg8Sc13I2CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[1].setAttribute("id", "frm1702RT:txtPg8Sc13I2CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[2].setAttribute("id", "frm1702RT:txtPg8Sc13I3CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[3].setAttribute("id", "frm1702RT:txtPg8Sc13I3CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[4].setAttribute("id", "frm1702RT:txtPg8Sc13I4CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[5].setAttribute("id", "frm1702RT:txtPg8Sc13I4CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[6].setAttribute("id", "frm1702RT:txtPg8Sc13I5CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[7].setAttribute("id", "frm1702RT:txtPg8Sc13I5CB-" + (i + 1));


        }
    }
    function Save_modalDivPg8Sc13I() {

        FixId_modalDivPg8Sc13I();

        $("#mainModalDivPg8Sc13I").html(function () {
            return $("#tempModalDivPg8Sc13I").html();
        });
        $("#tempModalDivPg8Sc13I div").remove();
        computePg8Sc13I8I();
        computePg8Sc13I8();
        Load_modalDivPg8Sc13I();
        count = $("#mainModalDivPg8Sc13I div").length;
        if (count > 0) {
            document.getElementById("frm1702RT:txtCtrmodalPg8Sc13I").value = count;
        }
        else {
            document.getElementById("frm1702RT:txtCtrmodalPg8Sc13I").value = 0;
        }

    }
    function Load_modalDivPg8Sc13I() {
        $("#tempModalDivPg8Sc13I").html(function () {
            return $("#mainModalDivPg8Sc13I").html();
        });

        //Adds highlight and select all in inputs
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        checkFormValidated();
    }

    function Cancel_modalDivPg8Sc13I() {
        var r = confirm("Are you sure to want to cancel? This will restore currently saved information.");
        if (r == true) {
            $("#tempModalDivPg8Sc13I").html(function () {
                return $("#mainModalDivPg8Sc13I").html();
            });
        }
    }

    function AddRow_modalTablePg8Sc13II() {
        var myDiv = document.getElementById("tempModalDivPg8Sc13II");
        i = $("#tempModalDivPg8Sc13II div").length;
        var lastTabIndex = $("#tempModalDivPg8Sc13IIinput[type=text]").last().attr('tabindex');
        var tabindex = (typeof lastTabIndex === 'undefined') ? 2100 + (4 * i) : lastTabIndex + 1;
        var tabindex2 = tabindex + 2;
        $('#tempModalDivPg8Sc13II').append('<div id="tempModalDivPg8Sc13II' + (i + 1) + '" >'
                                + '         <table class="tblForm RowSubTable" style="width: 100%;">                                                                                                                '
                    + '                        <tr>                                                                                                                                '
                    + '                            <td class="tblFormTd ContentBold">                                                                                              '
                    + '                                                                                                                                                         '
                    + '                            </td>                                                                                                                           '
                    + '                            <td class="tblFormTd">                                                                                                          '
                    + '                            </td>                                                                                                                           '
                    + '                            <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                         '
                    + '                                <span style="font-weight: bold; font-size: small;">' + LetterIteration((i * 2) + 3, 4) + '</span>                                         '
                    + '                            </td>                                                                                                                           '
                    + '                            <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                         '
                    + '                                <span style="font-weight: bold; font-size: small;">' + LetterIteration((i * 2) + 4, 4) + '</span>                                         '
                    + '                            </td>                                                                                                                           '
                    + '                        </tr>                                                                                                                               '
                    + '                        <tr>                                                                                                                                '
                    + '                            <td class="tblFormTd ContentBold">                                                                                              '
                    + '                                <span style="font-weight: bold;">6</span>                                                                                   '
                    + '                            </td>                                                                                                                           '
                    + '                            <td class="tblFormTd">                                                                                                          '
                    + '                                <span style="font-size: small;">Other Exempt Income/Receipts Under Sections 32 (B) of the                                       '
                    + '                                    Tax Code, as amended</span> <span style="font-style: italic; font-size: x-small;">(Specify)</span>                      '
                    + '                            </td>                                                                                                                           '
                    + '                            <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                         '
                    + '                                <input type="text" id="frm1702RT:txtPg8Sc13I6CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc13I6CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc13I6CA[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + tabindex + '"/>                                                                         '
                    + '                            </td>                                                                                                                           '
                    + '                            <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                         '
                    + '                                <input type="text" id="frm1702RT:txtPg8Sc13I6CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc13I6CB-' + (i + 1) + '" name="frm1702RT:txtPg8Sc13I6CB[]" size="26" maxlength="23" onkeypress="return Name(this, event);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabIndex="' + tabindex2 + '"/>                                                                         '
                    + '                            </td>                                                                                                                           '
                    + '                        </tr>                                                                                                                               '
                    + '                        <tr>                                                                                                                                '
                    + '                            <td class="tblFormTd ContentBold">                                                                                              '
                    + '                                <span style="font-weight: bold;">7</span>                                                                                   '
                    + '                            </td>                                                                                                                           '
                    + '                            <td class="tblFormTd">                                                                                                          '
                    + '                                <span style="font-size: small;">Actual Amount/Fair Market Value/Net Capital Gains</span>                                    '
                    + '                            </td>                                                                                                                           '
                    + '                            <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                         '
                    + '                                <input type="text" id="frm1702RT:txtPg8Sc13I7CA-' + (i + 1) + '" class="frm1702RT:txtPg8Sc13I7CA-' + (i + 1) + '" name="frm1702RT:txtPg8Sc13I7CA[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id,this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                '
                    + '                                    value="0" style="text-align: right;" tabIndex="' + (tabindex + 1) + '"/>                                                    '
                    + '                            </td>                                                                                                                           '
                    + '                            <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                         '
                    + '                                <input type="text" id="frm1702RT:txtPg8Sc13I7CB-' + (i + 1) + '" class="frm1702RT:txtPg8Sc13I7CB-' + (i + 1) + '"  name="frm1702RT:txtPg8Sc13I7CB[]" size="26" onblur="checkNumValue(this);this.value=addCommas(this.value);getAttributeValue(this.id,this.value);" maxlength="12" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(event, true)"                '
                    + '                                     value="0" style="text-align: right;" tabIndex="' + (tabindex2 + 1) + '"/>                                                    '
                    + '                            </td>                                                                                                                           '
                    + '                        </tr>                                                                                                                               '
                    + '             </table>                                                                                                                                       '
                    + '             <table class="tblForm" style="width: 100%;"> '
                    + '                 <tr>'
                    + '                     <td class="tblFormTd ContentBold">'
                    + '                     </td>'
                    + '                     <td class="tblFormTd">'
                    + '                     </td>'
                    + '                     <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                    + '                     </td>'
                    + '                     <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                    + '                         <input type="button" value="Remove" onclick="deleteDiv(this),FixId_modalDivPg8Sc13II()"/> '
                    + '                     </td>'
                    + '                 </tr> '
                    + '             </table>'
                    + '         </div> '
                        );

        //Adds highlight and select all in inputs
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });
    }

    function FixId_modalDivPg8Sc13II() {

        var length = $("#tempModalDivPg8Sc13II div").length;
        for (i = 0; i < length; i++) {
            var currentDivTable = $("#tempModalDivPg8Sc13II div").eq(i).find('table');
            $("#tempModalDivPg8Sc13II div")[i].setAttribute("id", "tempModalDivPg8Sc13II-" + (i + 1));
            // First column header
            currentDivTable.eq(0).find("td span").eq(0).html(LetterIteration((i * 2) + 3, 4));
            //second column header
            currentDivTable.eq(0).find("td span").eq(1).html(LetterIteration((i * 2) + 4, 4));

            currentDivTable.eq(0).find("td input")[0].setAttribute("id", "frm1702RT:txtPg8Sc13I6CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[1].setAttribute("id", "frm1702RT:txtPg8Sc13I6CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[2].setAttribute("id", "frm1702RT:txtPg8Sc13I7CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[3].setAttribute("id", "frm1702RT:txtPg8Sc13I7CB-" + (i + 1));
        }
    }
    function Save_modalDivPg8Sc13II() {

        FixId_modalDivPg8Sc13II();

        $("#mainModalDivPg8Sc13II").html(function () {
            return $("#tempModalDivPg8Sc13II").html();
        });
        $("#tempModalDivPg8Sc13II div").remove();
        computePg8Sc13I8II();
        computePg8Sc13I8();
        Load_modalDivPg8Sc13II();
        count = $("#mainModalDivPg8Sc13II div").length;
        if (count > 0) {
            document.getElementById("frm1702RT:txtCtrmodalPg8Sc13II").value = count;
        }
        else {
            document.getElementById("frm1702RT:txtCtrmodalPg8Sc13II").value = 0;
        }

    }
    function Load_modalDivPg8Sc13II() {
        $("#tempModalDivPg8Sc13II").html(function () {
            return $("#mainModalDivPg8Sc13II").html();
        });

        //Adds highlight and select all in inputs
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        checkFormValidated();
    }

    function Cancel_modalDivPg8Sc13II() {
        var r = confirm("Are you sure to want to cancel? This will restore currently saved information.");
        if (r == true) {
            $("#tempModalDivPg8Sc13II").html(function () {
                return $("#mainModalDivPg8Sc13II").html();
            });
        }
    }

    function convertToNumber(value) {
        var xNumber = (value) * 1;

        if (xNumber.toString() === "NaN") {
            xNumber = 0;
        }
        return xNumber;
    };

    function removeCommaParenthesis(senderValue) {
        if (senderValue.toString().indexOf('(') != -1 || senderValue.toString().indexOf(')') != -1) {
            senderValue = NumWithParenthesis(senderValue);
        }

        if (senderValue.toString().indexOf(',') != -1) {
            senderValue = NumWithComma(senderValue);
        }

        return senderValue;
    }

    function setToZeroIfEmpty(e) {
        var isNumber = isNumeric(removeCommaParenthesis(e.value));

        if (($.trim(e.value) === "") || !isNumber) {
            e.value = "0";
        }
        else if (convertToNumber(removeCommaParenthesis(e.value)) <= 0 && e.getAttribute("data-type") !== "negative") {
            e.value = "0";
        }
        else if (e.getAttribute("data-type") === "negative") {
            e.value = NegativeValue(formatCurrencyWOC(NumWithParenthesis(e.value)));
        }
        else {
            e.value = Math.round(removeCommaParenthesis(e.value));
        }
    }

    function setPercentage(e, decimalPlaces) {
        var isNumber = isNumeric(e.value);

        if (($.trim(e.value) === "") || !isNumber) {
            e.value = "0.0";
            e.select();
        }
        else if ((convertToNumber(e.value) < 0) || (convertToNumber(e.value) >= 100)) {
            alert("Percentage cannot be greater than or equal to 100%");
            e.value = "0.0";
            e.onblur();
            e.select();
        }
        else {
            var temp = e.value.split('.');
            if ((temp.length === 2) && (temp[1].length > 2)) {
                e.value = (e.value * 1).toFixed(2);
            }
            else if (decimalPlaces !== 0) {
                e.value = (e.value * 1).toFixed(decimalPlaces);
            }
        }
    }

    function negativeInput(elem, maxLength) {
        var key, keychar;

        if (window.event) {
            key = window.event.keyCode;
        }
        else if (e) {
            key = e.which;
        }
        keychar = String.fromCharCode(key);

        if (elem.value.indexOf("-") === 0) {
            elem.maxLength = maxLength + 1;
        }
        else {
            elem.maxLength = maxLength;
        }
    }

    function enableCompleteRows(param1, param2, output) {

        var strArray = param1.split(',');
        var intArray = param2.split(',');
        var outputArray = output.split(',');
        var isValid = true;
        //        if (param1!='') {
        for (var i = 0; i < strArray.length; i++) {
            if ($.trim($_Id('frm1702RT:' + strArray[i]).value) == '') {
                isValid = false;
                break;
            }
        }
        //        }
        if (isValid) {
            for (var j = 0; j < intArray.length; j++) {
                if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + intArray[j]).value)) == 0) {
                    isValid = false;
                    break;
                }
            }
        }
        if (isValid) {
            for (var k = 0; k < outputArray.length; k++) {
                if ($.trim($_Id(outputArray[k]).value) != 'OTHERS') {
                    $_Id(outputArray[k]).disabled = false;
                }
                else {
                    break;
                }
            }
        }
        else {
            for (var k = 0; k < outputArray.length; k++) {
                if($_Id(outputArray[k]) == null){

                }else if ($_Id(outputArray[k]).type == "button") {
                        $_Id(outputArray[k]).disabled = true;
                        break;
                }
            }
        }
        return isValid;
    }
    
    function checkMandatory(elem, msg) {
        var myMandatory = document.getElementById(elem).value;
        if ($.trim(myMandatory) == "") {
            alert(msg);
            return false;
        }
        else {
            return true;
        }
    }

    function goTo(page) {
        document.getElementById("frm1702RT:txtCurrentPage").value = page;
        goToPage();
    }

    function goToControl(page, control) {
        document.getElementById("frm1702RT:txtCurrentPage").value = page;
        goToPage();
        $_Id(control).focus();
    }

    function giveFocus(name) {
        document.forms[0].elements[name].focus();
    }

    function getSum(params, output) {
        var total = 0;
        var array1 = params.split(',');

        var array2 = output.split(',');
        for (var i = 0; i < array1.length; i++) {
            total += (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + array1[i]).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + array1[i]).value)));
        }

        for (var i = 0; i < array2.length; i++) {
            $_Id('frm1702RT:' + array2[i]).value = NegativeValue(formatCurrency(total).slice(0, -3));
        }
    }

    function getSum2(params, output) {
        var total = 0;
        var array1 = params.split(',');
        var array2 = output.split(',');
        for (var i = 0; i < array1.length; i++) {
            total += (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + array1[i]).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + array1[i]).value)));
        }

        for (var i = 0; i < array2.length; i++) {
            $_Id('frm1702RT:' + array2[i]).value = NegativeValue(formatCurrencyWOC(total));
        }
    }

    function getDifference(minuend, subtrahend, output) {
        var total = 0, total2 = 0;
        var min = minuend.split(',');
        var sub = subtrahend.split(',');
        for (var i = 0; i < min.length; i++) {
            total += (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + min[i]).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + min[i]).value)));
        }
        for (var i = 0; i < sub.length; i++) {
            total2 += (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + sub[i]).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + sub[i]).value)));
        }
        $_Id('frm1702RT:' + output).value = NegativeValue(formatCurrency(total - total2).slice(0, -3));
    }

    function getProduct(param1, param2, outputProduct) {
        var product = 0;
        //multiply
        product = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + param1).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + param1).value)))
                  * (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + param2).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + param2).value)));
        //Get the output product
        $_Id('frm1702RT:' + outputProduct).value = NegativeValue(formatCurrency(Math.round(product)).slice(0, -3));
    }

    function getProduct2(param1, param2, outputProduct) {
        var product = 0;
        //multiply
        product = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + param1).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + param1).value))) * param2;
        //Get the output product
        $_Id('frm1702RT:' + outputProduct).value = NegativeValue(formatCurrency(Math.round(product)).slice(0, -3));
    }

    function allFormat(param, output) {
        $_Id('frm1702RT:' + output).value = NegativeValue(formatCurrency(NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + param).value))).slice(0, -3));
    }

    function sumThenDifference(param1, param2, param3, outputProduct) {
        var sumThenDiff = 0;
        //multiply
        sumThenDiff = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + param1).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + param1).value)))
                  + (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + param2).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + param2).value)))
                  - (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + param3).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + param3).value)));
        //Get the output product
        $_Id('frm1702RT:' + outputProduct).value = NegativeValue(formatCurrency(Math.round(sumThenDiff)).slice(0, -3));
    }

    function disableLinkIfEmptyControls(IDs, linkID) {
        var IDContainer = IDs.split(',');
        var linkContainer = linkID.split(',');
        //var link = d.getElementById(linkID);
        var disabled = false;

        for (var a = 0; a < IDContainer.length; a++) {
            var iterateID = d.getElementById(IDContainer[a]);
            var trimmedValue = $.trim($(iterateID).val());
            //if (iterateID.value.toString().trim() == "") {
            if (trimmedValue == "") {
                disabled = true;
            }
        }
        for (var b = 0; b < linkContainer.length; b++) {
            d.getElementById(linkContainer[b]).disabled = disabled;
        }
    }

    function validateDate(element) {
        var strmmddyyyy = element.value;
        var isValid = true;
        var currentDate = new Date();
        var inputDate = new Date();

        if (strmmddyyyy != "") {
            var result = strmmddyyyy.split("/");
            var isLeap = new Date(result[2], 1, 29).getMonth() === 1;
            var month31 = (['01', '03', '05', '07', '08', '10', '12']);
            var month30 = (['04', '06', '09', '11']);
            var month = result[0];
            var day = result[1];
            if (result.length === 3) {
                if (isNaN(result[0] || result[1] || result[2])) {
                    isValid = false;
                }
                else if ((result[0].length != 2 || (result[0] > 12 || result[0] < 1))) {
                    // numeric check if greater not than 31 - Month.
                    isValid = false;
                }
                else if (result[1].length != 2 || (result[1] > 31 || result[1] < 1)) {
                    // numeric check if Date.
                    isValid = false;
                }
                else if ((result[2].length != 4) || ((result[2] * 1) < 1800)) {
                    isValid = false;
                }
                else if (month == 2) {
                    if (!isLeap && day == 29) {
                        isValid = false;
                    }
                    else if (!isLeap && day > 29) {
                        isValid = false;
                    }
                    else if (isLeap && day > 29) {
                        isValid = false;
                    }
                }
                else if (month31.contains(month) && day > 31) {
                    isValid = false;
                }
                else if (month30.contains(month) && day > 30) {
                    isValid = false;
                }

                inputDate = new Date(result[2], month - 1, day);
            }
            else {
                isValid = false;
            }
        }

        if (!isValid) {
            alert('Please provide a valid date. (MM/DD/YYYY format).');
            element.value = '';
            element.focus();
        }
        else if (inputDate > currentDate) {
            alert('This date cannot be a future date.');
            element.value = '';
            element.focus();
        }

        return isValid;
    }

    function validateFutureDate(element) {
        var strmmddyyyy = element.value;
        var isValid = true;
        var currentDate = new Date();
        var inputDate = new Date();

        if (strmmddyyyy != "") {
            var result = strmmddyyyy.split("/");
            var isLeap = new Date(result[2], 1, 29).getMonth() === 1;
            var month31 = (['01', '03', '05', '07', '08', '10', '12']);
            var month30 = (['04', '06', '09', '11']);
            var month = result[0];
            var day = result[1];
            if (result.length === 3) {
                if (isNaN(result[0] || result[1] || result[2])) {
                    isValid = false;
                }
                else if ((result[0].length != 2 || (result[0] > 12 || result[0] < 0))) {
                    // numeric check if greater not than 31 - Month.
                    isValid = false;
                }
                else if (result[1].length != 2 || (result[1] > 31 || result[1] < 1)) {
                    // numeric check if Date.
                    isValid = false;
                }
                else if ((result[2].length != 4) || ((result[2] * 1) < 1800)) {
                    isValid = false;
                }
                else if (month == 2) {
                    if (!isLeap && day == 29) {
                        isValid = false;
                    }
                    else if (!isLeap && day > 29) {
                        isValid = false;
                    }
                    else if (isLeap && day > 29) {
                        isValid = false;
                    }
                }
                else if (month31.contains(month) && day > 31) {
                    isValid = false;
                }
                else if (month30.contains(month) && day > 30) {
                    isValid = false;
                }

                inputDate = new Date(result[2], month - 1, day);
            }
            else {
                isValid = false;
            }
        }

        if (!isValid) {
            alert('Please provide a valid date. (MM/DD/YYYY format).');
            element.value = '';
            element.focus();
        }

        return isValid;
    }

    function validate_nullDescription(param1, param2, paramAlert) {
        var array1 = param1.split(',');
        var array2 = param2.split(',');
        var counter1 = 0;

        var isValid = true;

        for (var j = 0; j < array1.length; j++) {
            if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + array1[j]).value)) === 0) {
                counter1++;
            }
        }

        for (var i = 0; i < array2.length; i++) {
            // If description is empty and there are amounts with values
            if (($.trim($_Id('frm1702RT:' + array2[i]).value) === '') && (counter1 < array1.length)) {
                isValid = false;
                break;
            }
            // If description is not empty and there are amounts without values
            else if (($.trim($_Id('frm1702RT:' + array2[i]).value) !== '') && (counter1 === array1.length)) {
                isValid = false;
                break;
            }
        }

        if (!isValid) {
            alert('Please provide data on ' + paramAlert + '.');
        }

        return isValid;
    }

    function validate_nullDescriptionColumns(param1, param2, paramAlert) {
        var strArray = param1.split(',');
        var intArray = param2.split(',');
        var totalLength = strArray.length + intArray.length;
        var counter = 0;
        var isValid = true;

        for (var i = 0; i < strArray.length; i++) {
            if ($.trim($_Id('frm1702RT:' + strArray[i]).value) != '') {
                counter += 1;
            }
        }
        for (var j = 0; j < intArray.length; j++) {
            if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:' + intArray[j]).value)) != 0) {
                counter += 1;
            }
        }
        if (counter != 0 && counter != totalLength) {
            alert('Please fill up empty/zero data on ' + paramAlert + '.');
            isValid = false;
        }
        return isValid;
    }

    function validateTIN(elem, checkFull) {
        var isValid = true;

        if (elem.value.length < 3 && elem.value !== "" && !checkFull) {
            alert("Please provide a valid TIN (must have 3 numbers per box).");
            elem.select();

            //isValid = false;
        }
        else if (!!checkFull) {
            var tinArray = $_Name(elem.name);
            var totalTIN = 0;
            var tinToFocus = {};

            for (var i = (tinArray.length - 1) ; i >= 0; i--) {
                totalTIN += tinArray[i].value.length;
                if (tinArray[i].value.length < 3) {
                    tinToFocus = tinArray[i];
                }
            }
            if (totalTIN < 12) {
                //alert("Please provide a valid TIN (must have 3 numbers per box).");
                //tinToFocus.select();
                isValid = false;
            }
        }

        return isValid;
    }

    function checkNullP7Sc11(param, row, perRow, message) {
        var params = param;
        var arrayRow = params.split(',');
        var count = 0;
        var isValid = true;

        for (var i = 0; i < row; i++) {
            var arrayPerRow = arrayRow[i].split('.');
            for (var x = 0; x < perRow; x++) {
                if (document.getElementById('frm1702RT:' + arrayPerRow[x]).value == "") {
                    count += 1;
                }
            }
            if (document.getElementById('frm1702RT:' + arrayPerRow[perRow - 2]).value == 0) {
                count += 1;
            }
            if (document.getElementById('frm1702RT:' + arrayPerRow[perRow - 1]).value == 0) {
                count += 1;
            }
        }
        if (count != 0) {
            isValid = false;
            alert(message);
        }
        return isValid;
    }

    function countValidRowsPg7Sc11() {
        var validCount = 0;
        var isValid = false;

        for (var i = 1; i <= 20; i++) {
            //As of 10/08/2015 HD2014-1246020 : If the TP selects “Member”, system should accept zero (0) in ‘Capital Contribution’
            if ($_Id('frm1702RT:chkPg7Sc11Members').checked == true) {
                if ($.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'C1').value) != "" && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin1').value) != "" && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin2').value) != "" && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin3').value) != "" && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin4').value) != "") {
                    validCount = validCount + 1;
                }
            }
            else {
                if ($.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'C1').value) != "" && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin1').value) != "" && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin2').value) != "" && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin3').value) != "" && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin4').value) != "" && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'C3').value) != '0' && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'C4').value) != '0') {
                    validCount = validCount + 1;
                }
            }
        }

        if ($_Id('frm1702RT:chkPg7Sc11Stockholders').checked == true || $_Id('frm1702RT:chkPg7Sc11Members').checked == true) {
            if (validCount >= 1) {
                isValid = true;
            }
        }
        if ($_Id('frm1702RT:chkPg7Sc11Partners').checked == true) {
            if (validCount >= 2) {
                isValid = true;
            }
        }

        return isValid;
    }

    //to eFPS
    function getValAmount(param) {
        return removeCommaParenthesis(document.getElementById('frm1702RT:' + param).value)
    }

    function getVal(param) {
        alpha = document.getElementById('frm1702RT:' + param).value

        alpha = alpha.replace(/&/g, '&amp;');
        alpha = alpha.replace(/</g, '&lt;');
        alpha = alpha.replace(/>/g, '&gt;');

        return alpha;
    }

    function convertDateXML(element) {
        //alert(d.getElementById('frm1702RT:'+element).value);
        var date = '';
        var dateSplit = d.getElementById('frm1702RT:' + element).value.split('/');
        var date = dateSplit[2] + '-' + dateSplit[0] + '-' + dateSplit[1];
        return date;
    }

    function returnPeriod() {
        var yyyyR = "20" + d.getElementById('frm1702RT:txtPg1I2Year').value;
        var mmR = (d.getElementById('frm1702RT:ddlPg1I2Month').value.toString());
        var ddR = new Date(yyyyR, mmR, 0).getDate();
        var returnPeriodFormat = yyyyR + "-" + (mmR) + "-" + ddR;
        return returnPeriodFormat;
    }

    function eFPSOverPayment() {
        var overpaymentType;

        if ($_Id('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded').checked == true) {
            overpaymentType = "R";
        }
        else if ($_Id('frm1702RT:rdoPg1Pt2I21OverpaymentIssued').checked == true) {
            overpaymentType = "T";
        }
        else if ($_Id('frm1702RT:rdoPg1Pt2I21OverpaymentCarried').checked == true) {
            overpaymentType = "C";
        }
        return overpaymentType;
    }

    function eFPSContributorType() {
        var contributorType;

        if ($_Id('frm1702RT:chkPg7Sc11Members').checked == true && $_Id('frm1702RT:chkPg7Sc11Members').checked == true) {
            contributorType = "SM";
        }
        else if ($_Id('frm1702RT:chkPg7Sc11Stockholders').checked == true) {
            contributorType = "S";
        }
        else if ($_Id('frm1702RT:chkPg7Sc11Partners').checked == true) {
            contributorType = "P";
        }
        else if ($_Id('frm1702RT:chkPg7Sc11Members').checked == true) {
            contributorType = "M";
        }
        return contributorType;
    }
    function validateIssueDateSchedule12(element) {
        if (!!validateDate(element) && ($.trim(element.value) !== "")) {
            var issueDate = new Date(element.value),
                filingDate = new Date((2000 + ($_Id("frm1702RT:txtPg1I2Year").value * 1)), ($_Id("frm1702RT:ddlPg1I2Month").value * 1), 0),
                validDate = new Date((2000 + ($_Id("frm1702RT:txtPg1I2Year").value * 1)), ($_Id("frm1702RT:ddlPg1I2Month").value * 1), 1),
                filingDateString = "", validDateString = "";

            validDate = new Date(validDate.setMonth(validDate.getMonth() - 12));

            filingDateString = (filingDate.getMonth() + 1) + "/" + filingDate.getDate() + "/" + filingDate.getFullYear();
            validDateString = (validDate.getMonth() + 1) + "/" + validDate.getDate() + "/" + validDate.getFullYear();

            if (issueDate < validDate || issueDate > filingDate) {
                alert("Valid Issue Date is from " + validDateString + " up to " + filingDateString + ".");
                element.value = "";
                element.focus();
            }
        }
    }

    function validateDateOfIssue() {
        var strmmddyyyy = $_Id("frm1702RT:txtPg1Pt2I23Date").value;
        var selectedItem22 = !!($_Id("frm1702RT:rdoPg1Pt2I22CTC").checked) ? "CTC" : "SEC";

        var isValid = true;
        var currentDate = new Date();
        var inputDate = new Date();
        var result = strmmddyyyy.split("/");

        if (strmmddyyyy != "") {
            var isLeap = new Date(result[2], 1, 29).getMonth() === 1;
            var month31 = (['01', '03', '05', '07', '08', '10', '12']);
            var month30 = (['04', '06', '09', '11']);
            var month = result[0];
            var day = result[1];
            if (result.length === 3) {
                if (isNaN(result[0] || result[1] || result[2])) {
                    isValid = false;
                }
                else if ((result[0].length != 2 || (result[0] > 12 || result[0] < 1))) {
                    // numeric check if greater not than 31 - Month.
                    isValid = false;
                }
                else if (result[1].length != 2 || (result[1] > 31 || result[1] < 1)) {
                    // numeric check if Date.
                    isValid = false;
                }
                else if (result[2].length != 4) {
                    isValid = false;
                }
                else if (month == 2) {
                    if (!isLeap && day == 29) {
                        isValid = false;
                    }
                    else if (!isLeap && day > 29) {
                        isValid = false;
                    }
                    else if (isLeap && day > 29) {
                        isValid = false;
                    }
                }
                else if (month31.contains(month) && day > 31) {
                    isValid = false;
                }
                else if (month30.contains(month) && day > 30) {
                    isValid = false;
                }

                inputDate = new Date(result[2], month - 1, day);
            }
            else {
                isValid = false;
            }

            if (!isValid) {
                alert('Please provide a valid date. (MM/DD/YYYY format)');
                $_Id("frm1702RT:txtPg1Pt2I23Date").value = '';
                $_Id("frm1702RT:txtPg1Pt2I23Date").focus();
            }
            else if (inputDate > currentDate) {
                alert('This date cannot be a future date.');
                $_Id("frm1702RT:txtPg1Pt2I23Date").value = '';
                $_Id("frm1702RT:txtPg1Pt2I23Date").focus();
            }
            else if ((result[2] !== currentDate.getFullYear().toString()) && (selectedItem22 === "CTC")) {
                alert('CTC year should be ' + currentDate.getFullYear() + ' only (Page 1 Item 23).');
                $_Id("frm1702RT:txtPg1Pt2I23Date").value = '';
                $_Id("frm1702RT:txtPg1Pt2I23Date").focus();
            }
        }
        return isValid;
    }

    function validateMCITYear(elem) {
        var mcitYear = $.trim(elem.value) * 1;
        var returnPeriodYear = 2000 + ($_Id("frm1702RT:txtPg1I2Year").value * 1);
        var isValid = true;

        if (($.trim(elem.value) !== "") && checkDateOfIncorporation(false) && (returnPeriodYear !== 2000)) {
            var incorpYear = ($_Id("frm1702RT:txtPg1Pt1I8").value.split("/")[2] * 1);
            var mcitYears = $_Name(elem.name);
            var dup = 0, i, len = mcitYears.length;

            // Get values in Year Incurred fields
            for (var i = 0; i < len; i++) {
                if (mcitYears[i].value === elem.value) {
                    dup++;
                }
            }

            // Cannot have duplicates
            if (dup > 1) {
                alert("Year cannot have duplicates.");

                elem.value = "";
                elem.focus();

                isValid = false;
            }
            else if ((mcitYear >= returnPeriodYear) || (mcitYear < (returnPeriodYear - 3))) {
                alert("Please enter a value for the year between " + (returnPeriodYear - 3) + " and " + (returnPeriodYear - 1) + ".");

                elem.value = "";
                elem.focus();

                isValid = false;
            }
                // Year Incurred cannot be lower than Date (year) of Incorporation
            else if (mcitYear < incorpYear) {
                alert("Year incurred cannot be lower than Year of Incorporation [" + incorpYear + "] (Page 1 Item 8).");

                elem.value = "";
                elem.focus();

                isValid = false;
            }
        }
        else if (returnPeriodYear === 2000) {
            alert("Please provide Filing Year (Page 1 Item 2) before providing Year for MCIT.");
            elem.value = "";

            changeCurrentPage(1);
        }
        else if (checkDateOfIncorporation() === false) {
            alert("Please provide Date of Incorporation (Page 1 Item 8) before providing Year Incurred for MCIT.");
            elem.value = "";

            changeView(false);
            changeCurrentPage(1);
        }
        return isValid;
    }

    function enableFieldOnLoad() {
        enableCompleteRows('txtPg4Sc3I1OtherTaxIncome', 'txtPg4Sc3I1OtherTaxAmount', 'frm1702RT:txtPg4Sc3I3C1,frm1702RT:txtPg4Sc3I3C2');
        enableCompleteRows('txtPg4Sc3I2OtherTaxIncome', 'txtPg4Sc3I2OtherTaxAmount', 'frm1702RT:txtPg4Sc3I3C1,frm1702RT:txtPg4Sc3I3C2');
        enableCompleteRows('txtPg4Sc3I3C1', 'txtPg4Sc3I3C2', 'btnPg4Sc3I3More')
        enableCompleteRows('txtPg4Sc4I2Amortization', 'txtPg4Sc4I2AmortizationAmount', 'frm1702RT:txtPg4Sc4I3Amortization,frm1702RT:txtPg4Sc4I3AmortizationAmount');
        enableCompleteRows('txtPg4Sc4I3Amortization', 'txtPg4Sc4I3AmortizationAmount', 'frm1702RT:txtPg4Sc4I4C1,frm1702RT:txtPg4Sc4I4C2');
        enableCompleteRows('txtPg4Sc4I4C1', 'txtPg4Sc4I4C2', 'btnPg4Sc4I4More')
        enableCompleteRows('txtPg5Sc4I36C1', 'txtPg5Sc4I36C2', 'frm1702RT:txtPg5Sc4I37C1,frm1702RT:txtPg5Sc4I37C2');
        enableCompleteRows('txtPg5Sc4I37C1', 'txtPg5Sc4I37C2', 'frm1702RT:txtPg5Sc4I38C1,frm1702RT:txtPg5Sc4I38C2');
        enableCompleteRows('txtPg5Sc4I38C1', 'txtPg5Sc4I38C2', 'frm1702RT:txtPg5Sc4I39C1,frm1702RT:txtPg5Sc4I39C2');
        enableCompleteRows('txtPg5Sc4I39C1', 'txtPg5Sc4I39C2', 'btnPg5Sc4I39More');
        enableCompleteRows('txtPg5Sc5I1C1,txtPg5Sc5I1C2', 'txtPg5Sc5I1C3', 'frm1702RT:txtPg5Sc5I2C1,frm1702RT:txtPg5Sc5I2C2,frm1702RT:txtPg5Sc5I2C3');
        enableCompleteRows('txtPg5Sc5I2C1,txtPg5Sc5I2C2', 'txtPg5Sc5I2C3', 'frm1702RT:txtPg5Sc5I3C1,frm1702RT:txtPg5Sc5I3C2,frm1702RT:txtPg5Sc5I3C3');
        enableCompleteRows('txtPg5Sc5I3C1,txtPg5Sc5I3C2', 'txtPg5Sc5I3C3', 'frm1702RT:txtPg5Sc5I4C1,frm1702RT:txtPg5Sc5I4C2,frm1702RT:txtPg5Sc5I4C3');
        enableCompleteRows('txtPg5Sc5I4C1,txtPg5Sc5I4C2', 'txtPg5Sc5I4C3', 'btnPg5Sc5I4More');
        enableCompleteRows('txtPg5Sc6AI5C1', 'txtPg5Sc6AI5C2', 'frm1702RT:txtPg5Sc6AI6C1,frm1702RT:txtPg5Sc6AI6C2,frm1702RT:txtPg5Sc6AI6C3,frm1702RT:txtPg5Sc6AI6C4,frm1702RT:txtPg5Sc6AI6C5');
        enableCompleteRows('txtPg5Sc6AI6C1', 'txtPg5Sc6AI6C2', 'frm1702RT:txtPg5Sc6AI7C1,frm1702RT:txtPg5Sc6AI7C2,frm1702RT:txtPg5Sc6AI7C3,frm1702RT:txtPg5Sc6AI7C4,frm1702RT:txtPg5Sc6AI7C5');
        enableCompleteRows('txtPg5Sc6AI7C1', 'txtPg5Sc6AI7C2', 'btnPg5Sc6AI7More');
        enableCompleteRows('txtPg6Sc7I10C1', 'txtPg5Sc7I10C2', 'frm1702RT:txtPg6Sc7I11C1,frm1702RT:txtPg6Sc7I11C2');
        enableCompleteRows('txtPg6Sc7I11C1', 'txtPg6Sc7I11C2', 'btnPg6Sc7I11More');
        enableCompleteRows('txtPg6Sc9I2C1', 'txtPg6Sc9I2C2', 'frm1702RT:txtPg6Sc9I3C1,frm1702RT:txtPg6Sc9I3C2');
        enableCompleteRows('txtPg6Sc9I3C1', 'txtPg6Sc9I3C2', 'btnPg6Sc9I3More');
        enableCompleteRows('txtPg6Sc9I5C1', 'txtPg6Sc9I5C2', 'frm1702RT:txtPg6Sc9I6C1,frm1702RT:txtPg6Sc9I6C2');
        enableCompleteRows('txtPg6Sc9I6C1', 'txtPg6Sc9I6C2', 'btnPg6Sc9I6More');
        enableCompleteRows('txtPg6Sc9I7C1', 'txtPg6Sc9I7C2', 'frm1702RT:txtPg6Sc9I8C1,frm1702RT:txtPg6Sc9I8C2');
        enableCompleteRows('txtPg6Sc9I8C1', 'txtPg6Sc9I8C2', 'btnPg6Sc9I8More');
    }

    function setSchedule11Tick() {
        var isPartner = $_Id("frm1702RT:chkPg7Sc11Partners").checked;
        var chkMember = $_Id("frm1702RT:chkPg7Sc11Members");
        if (!!isPartner && !!chkMember.checked) {
            alert("You cannot tick Members Information if Partners is ticked.\nTick Stockholders if you need to tick Members Information.");
            chkMember.checked = false;
        }
    }

    function populateAllNames() {
        $_Id('frm1702RT:txtPg2RegisteredName').value = $_Id('frm1702RT:txtPg1Pt1I9Name').value;
        $_Id('frm1702RT:txtPg3RegisteredName').value = $_Id('frm1702RT:txtPg1Pt1I9Name').value;
        $_Id('frm1702RT:txtPg4RegisteredName').value = $_Id('frm1702RT:txtPg1Pt1I9Name').value;
        $_Id('frm1702RT:txtPg5RegisteredName').value = $_Id('frm1702RT:txtPg1Pt1I9Name').value;
        $_Id('frm1702RT:txtPg6RegisteredName').value = $_Id('frm1702RT:txtPg1Pt1I9Name').value;
        $_Id('frm1702RT:txtPg7RegisteredName').value = $_Id('frm1702RT:txtPg1Pt1I9Name').value;
        $_Id('frm1702RT:txtPg8RegisteredName').value = $_Id('frm1702RT:txtPg1Pt1I9Name').value;
    }

    function validatePSIC() {
        if ($_Id('frm1702RT:txtPg1Pt1I14PSIC').value.length < 4) {
            $_Id('frm1702RT:txtPg1Pt1I14PSIC').value = "";
            alert('Page 1 Part I Item 14 PSIC code cannot be less than 4 characters');
        }
    }

    var defaultYear = new Date().getYear().toString().substring(2);
    var taxableYear = defaultYear - 1;

    function validateYearEnd() {
        var element = $_Id('frm1702RT:txtPg1I2Year');
        var inputYear = 2000 + (element.value * 1);
        var inputMonth = ($_Id('frm1702RT:ddlPg1I2Month').value * 1) - 1;
        var currentDate = new Date();
        var isValid = true;
        if (element.value !== "") {
            if (($_Id("frm1702RT:rdoPg1I1Fiscal").checked === true) &&
                (inputYear > currentDate.getFullYear() || (inputMonth > currentDate.getMonth() && inputYear === currentDate.getFullYear()))) {
                alert('Date (Page 1 Item 2) cannot be greater than current date when filing for Fiscal Year.');
                element.value = '';
                element.focus();

                isValid = false;
            }
            else if (($_Id("frm1702RT:rdoPg1I1Fiscal").checked === true) && inputMonth == 11) {
                alert('Date (Page 1 Item 2) Month cannot be equal to December.');
                $_Id('frm1702RT:ddlPg1I2Month').value = "";
                $_Id('frm1702RT:ddlPg1I2Month').focus();
                isValid = false;
            }
            // MONTH: JANUARY = 0, FEBRUARY = 1, MARCH = 2 ... NOVEMBER = 10, DECEMBER = 11
            else if ((inputYear < 2013) || (inputYear <= 2013 && (inputMonth < 8))) {
                alert("Date (Page 1 Item 2) should not be earlier than September 2013.");
                element.value = '';
                $_Id('frm1702RT:ddlPg1I2Month').focus();
                isValid = false;
            }
            else if (($_Id("frm1702RT:rdoPg1I1Calendar").checked === true)) {
                if (($_Id("frm1702RT:rdoPg1I4ShortPeriodNo").checked === true) && (inputYear >= currentDate.getFullYear())) {
                    alert('Year (Page 1 Item 2) cannot be greater than or equal to current year when filing for Calendar Year.');
                    element.value = '';
                    element.focus();

                    isValid = false;
                }
                else if (($_Id("frm1702RT:rdoPg1I4ShortPeriodYes").checked === true)) {
                    if ((inputYear > currentDate.getFullYear())) {
                        alert('Year (Page 1 Item 2) cannot be greater than the current year when filing for Calendar Year.');
                        element.value = '';
                        element.select();
                        isValid = false;
                    }
                    else if ((inputYear === currentDate.getFullYear()) && (inputMonth > currentDate.getMonth())) {
                        alert('Month (Page 1 Item 2) cannot be greater than  current month date when filing for Calendar Year  and  Short Period Return.');
                        $_Id('frm1702RT:ddlPg1I2Month').value = '';
                        $_Id('frm1702RT:ddlPg1I2Month').focus();
                        isValid = false;
                    }
                    else if ((inputYear === currentDate.getFullYear()) && (inputMonth == 11)) {
                        alert('Month (Page 1 Item 2) cannot be equal to december  when filing for Calendar Year and  Short Period Return.');
                        $_Id('frm1702RT:ddlPg1I2Month').value = '';
                        $_Id('frm1702RT:ddlPg1I2Month').focus();
                        isValid = false;
                    }
                    else if (inputMonth < 0) {
                        alert('(Page 1 Item 2)Month is invalid.');
                        $_Id('frm1702RT:ddlPg1I2Month').focus();
                        isValid = false;
                    }
                }
            }

        }
        if (element.value !== '' && (element.value * 1) > -1 && (element.value * 1) < 10) {
            element.value = '0' + element.value * 1;

        }
        if (isValid == true) {
            var netOperatingLoss = $_Id('frm1702RT:txtPg5Sc6I3NetOperatingLoss');
            var yearIncurred = $_Id('frm1702RT:txtPg5Sc6AI4C1');
            if (element.value != "") {
                if (WholeNumWithComma(NumWithParenthesis(netOperatingLoss.value)) >= 0) {
                    yearIncurred.value = "";
                }
                else {
                    if (inputYear != yearIncurred.value) {
                        $_Id('frm1702RT:txtPg5Sc6AI5C1').value = "";
                        $_Id('frm1702RT:txtPg5Sc6AI6C1').value = "";
                        $_Id('frm1702RT:txtPg5Sc6AI7C1').value = "";
                    }
                    yearIncurred.value = "20" + element.value;
                }
            }
            else {
                yearIncurred.value = "";
            }
        }
        return isValid;
    }

    function checkFilingYear() {
        var txtYearEnd = $_Id("frm1702RT:txtPg1I2Year");
        var ddlDate = $_Id('frm1702RT:ddlPg1I2Month');
        var currentDate = new Date();

        var isAmendedReturn = $_Id("frm1702RT:rdoPg1I2AmmendYes").checked; // If Amended Return Yes option is selected, set to true else false
        var isShortPeriod = $_Id("frm1702RT:rdoPg1I4ShortPeriodYes").checked; // If Short Period Return Yes option is selected, set to true else false

        // CALENDAR YEAR
        if ($_Id("frm1702RT:rdoPg1I1Calendar").checked === true) {
            if ((!isAmendedReturn && !isShortPeriod) || (!isShortPeriod && !!isAmendedReturn)) {
                ddlDate.options[12].selected = true;
                ddlDate.disabled = true;

                txtYearEnd.value = (currentDate.getFullYear() - 2000) - 1;
                txtYearEnd.disabled = false;
            }else if ((!!isShortPeriod && !!isAmendedReturn) || (!!isShortPeriod && !isAmendedReturn)) {
                ddlDate.disabled = false;
                ddlDate.options[0].selected = true;
                ddlDate.focus();

                txtYearEnd.value = (currentDate.getFullYear() - 2000) - 1;
                txtYearEnd.disabled = false;
            }
        }
        // FISCAL YEAR
        else if ($_Id("frm1702RT:rdoPg1I1Fiscal").checked === true) {
            ddlDate.options[0].selected = true;
            ddlDate.disabled = false;
            ddlDate.focus();

            txtYearEnd.disabled = false;
            txtYearEnd.value = "";
        }
        //Year Incurred
        var netOperatingLoss = $_Id('frm1702RT:txtPg5Sc6I3NetOperatingLoss');
        var yearIncurred = $_Id('frm1702RT:txtPg5Sc6AI4C1');
        var inputYear = 2000 + (txtYearEnd.value * 1);
        if (txtYearEnd.value != "") {
            if (WholeNumWithComma(NumWithParenthesis(netOperatingLoss.value)) >= 0) {
                yearIncurred.value = "";
            }
            else {
                if (inputYear != yearIncurred.value) {
                    $_Id('frm1702RT:txtPg5Sc6AI5C1').value = "";
                    $_Id('frm1702RT:txtPg5Sc6AI6C1').value = "";
                    $_Id('frm1702RT:txtPg5Sc6AI7C1').value = "";
                }
                yearIncurred.value = "20" + txtYearEnd.value;
            }
        }
        else {
            yearIncurred.value = "";
        }
    }

    function shortPeriodReturnYes() {
        if ($_Id('frm1702RT:rdoPg1I4ShortPeriodYes').checked == true) {
            $_Id('frm1702RT:rdoPg1I4ShortPeriodNo').checked = false;
            $_Id('frm1702RT:ddlPg1I2Month').disabled = false;
            alert('Choosing ‘Yes’ means you are filing for a short-period return. You are required to change the Month field to correspond with your New return period. If this is incorrect, please update your Registration details by filing BIR Form 1905 at the RDO where you are registered within five (5) working days. Otherwise, this return will be considered un-filed.”');
            $_Id('frm1702RT:ddlPg1I2Month').focus();
        }
    }

    function shortPeriodReturnNo() {
        if ($_Id('frm1702RT:rdoPg1I4ShortPeriodNo').checked == true) {
            $_Id('frm1702RT:rdoPg1I4ShortPeriodYes').checked = false;
            $_Id('frm1702RT:ddlPg1I2Month').disabled = true;
        }
    }

    function checkDateOfIncorporation(isFromEdit) {
        var element = $_Id("frm1702RT:txtPg1Pt1I8");
        var isValid = true;

        if (!!validateDate(element) && ($.trim(element.value) !== "")) {
            var elemValue = element.value.split("/");
            var incorpDate = new Date(elemValue[2], (elemValue[0] - 1), elemValue[1]);
            var currentDate = new Date();

            var incorpMonth = elemValue[0] * 1;
            var incorpYear = elemValue[2] * 1;
            var filingMonth = $_Id("frm1702RT:ddlPg1I2Month").value * 1;
            var filingYear = 2000 + ($_Id("frm1702RT:txtPg1I2Year").value * 1);
            var filingDate = new Date(filingYear, (filingMonth - 1), 1);

            var elapsedTime = (filingDate.getTime() - incorpDate.getTime()) / 31536000000;

            var filingDateIsEmpty = ((($.trim($_Id("frm1702RT:ddlPg1I2Month").value)) || ($.trim($_Id("frm1702RT:txtPg1I2Year").value))) === "");

            if (!filingDateIsEmpty && ((incorpYear > filingYear) || ((incorpMonth > filingMonth) && (incorpYear === filingYear)))) {
                if (!isFromEdit) {
                    alert("Date of Incorporation cannot be greater than Page 1 Item 2 Date.");
                }
                element.value = "";
                element.focus();

                isValid = false;
            }
            else if (((filingYear - incorpYear) === 4) && ($_Id("frm1702RT:rdoPg1I5Atc").checked === false)) {
                if (!isFromEdit) {
                    alert("The Year of Incorporation is " + incorpYear + ", ATC - IC 055 of Page 1 Item will be marked.");
                }
                $_Id("frm1702RT:rdoPg1I5Atc").checked = true;
              
            }
                //else if ((elapsedTime < 4) && ($_Id("frm1702MX:chkPg1I5ATCR1").checked === true)) {
            else if (((filingYear - incorpYear) < 4) && ($_Id("frm1702RT:rdoPg1I5Atc").checked === true || $_Id("frm1702RT:rdoPg1I5Atc").disabled === false)) {
                if (!isFromEdit) {
                    alert("Less than 4 years has passed since Date of Incorporation and the Filing Year, the mark in ATC - IC 055 of Page 1 Item 5 will be removed.");
                }
                $_Id("frm1702RT:rdoPg1I5Atc").checked = false;
                $_Id("frm1702RT:rdoPg1I5Atc").disabled = true;
           
                isValid = false;
            }
            else if ((elapsedTime >= 4) && ($_Id("frm1702RT:rdoPg1I5Atc").checked === false)) {
                if (!isFromEdit) {
                    alert("It has been 4 years or more since the Date of Incorporation and the Filing year, ATC - IC 055 of Page 1 Item will be marked.");
                }
                $_Id("frm1702RT:rdoPg1I5Atc").checked = true;
              

            }
        }
        else if ($.trim(element.value) === "") {
            $_Id("frm1702RT:rdoPg1I5Atc").checked = false;
           
            isValid = false;
        }

        if (!isFromEdit) {
            enableMCITFields();
        }
        return isValid;
    }

    function enableMCITFields() {
        var isSubjectToMCIT = $_Id('frm1702RT:rdoPg1I5Atc').checked;
        //Schedule 7 Item 2
        $_Id('frm1702RT:txtPg6Sc7I2IncomeTaxPaymentUnderMCIT').disabled = !isSubjectToMCIT;
        //Schedule 8
        $_Id('frm1702RT:txtPg6Sc8I1C1').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I2C1').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I3C1').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I1C2').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I2C2').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I3C2').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I1C3').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I2C3').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I3C3').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I1C5').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I2C5').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I3C5').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I1C6').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I2C6').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I3C6').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I1C7').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I2C7').disabled = !isSubjectToMCIT;
        $_Id('frm1702RT:txtPg6Sc8I3C7').disabled = !isSubjectToMCIT;

        if (!isSubjectToMCIT) {
            //Schedule 7
            $_Id('frm1702RT:txtPg6Sc7I2IncomeTaxPaymentUnderMCIT').value = 0;
            //Schedule 8
            $_Id('frm1702RT:txtPg6Sc8I1C1').value = '';
            $_Id('frm1702RT:txtPg6Sc8I2C1').value = '';
            $_Id('frm1702RT:txtPg6Sc8I3C1').value = '';
            $_Id('frm1702RT:txtPg6Sc8I1C2').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I2C2').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I3C2').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I1C3').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I2C3').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I3C3').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I1C4').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I2C4').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I3C4').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I1C5').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I2C5').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I3C5').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I1C6').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I2C6').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I3C6').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I1C7').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I2C7').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I3C7').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I1C8').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I2C8').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I3C8').value = 0;
            $_Id('frm1702RT:txtPg6Sc8I4TotalExcessMCIT').value = 0;
        }
        computeP6Sc7I12TotalTaxCredits();
        computeP2Pt4I43();
    }

    function atc() {
        if ($_Id('frm1702RT:hdnATC').value == 0) {
            $_Id('frm1702RT:rdoPg1I5Atc').checked = true;
            $_Id('frm1702RT:hdnATC').value = 1;
        }
        else {
            $_Id('frm1702RT:rdoPg1I5Atc').checked = false;
            $_Id('frm1702RT:hdnATC').value = 0;
        }
    }

    function atcOthers() {
        if ($_Id('frm1702RT:hdnATCOthers').value == 0) {
            $_Id('frm1702RT:drpPg1I5AtcOther').disabled = false;
            $_Id('frm1702RT:rdoPg1I5AtcOther').checked = true;
            $_Id('frm1702RT:hdnATCOthers').value = 1;
        }
        else {
            $_Id('frm1702RT:drpPg1I5AtcOther').disabled = true;
            $_Id('frm1702RT:rdoPg1I5AtcOther').checked = false;
            $_Id('frm1702RT:hdnATCOthers').value = 0;
        }
    }

    function methodOfDeductionsItemized() {
        $_Id('frm1702RT:rdoPg1Pt1I15OptionalStandard').checked = false;
        //Page 4 Schedule 4
        enableField('txtPg4Sc4I1Advertising,txtPg4Sc4I2AmortizationAmount,txtPg4Sc4I5BadDebts,txtPg4Sc4I6CharitableContributions,txtPg4Sc4I7Commissions,txtPg4Sc4I8Communication');
        enableField('txtPg4Sc4I9Depletion,txtPg4Sc4I10Depreciation,txtPg4Sc4I11DirectorsFee,txtPg4Sc4I12FringeBenefits,txtPg4Sc4I13Fuel,txtPg4Sc4I14Insurance,txtPg4Sc4I15Interest,txtPg4Sc4I16Janitorial,txtPg4Sc4I17Losses,txtPg4Sc4I18Management');
        enableField('txtPg4Sc4I19Miscellaneous,txtPg4Sc4I20OfficeSupplies,txtPg4Sc4I21OtherServices,txtPg4Sc4I22ProfessionalFees,txtPg4Sc4I23Rental,txtPg4Sc4I24Repairs,txtPg4Sc4I25Repairs,txtPg4Sc4I26Representation,txtPg4Sc4I27Research');
        enableField('txtPg4Sc4I28Royalties,txtPg4Sc4I29Salaries,txtPg5Sc4I30SecurityServices,txtPg4Sc4I2Amortization');
        //Page 5 Schedule 4
        enableField('txtPg5Sc4I31Contributions,txtPg5Sc4I32TaxesandLicenses,txtPg5Sc4I33TollingFees,txtPg5Sc4I34TrainingandSeminars,txtPg5Sc4I35TransportationandTravel,txtPg5Sc4I36C2');
        enableField('txtPg5Sc4I36C1');
        //Page 5 Schedule 5
        enableField('txtPg5Sc5I1C1,txtPg5Sc5I1C2,txtPg5Sc5I1C3');
        //Page 5 Schedule 6A
        enableField('txtPg5Sc6AI5C1,txtPg5Sc6AI5C2,txtPg5Sc6AI5C3');
        enableField('txtPg5Sc6AI5C4,txtPg5Sc6AI5C5');
        $_Id('frm1702RT:hndTriggerCompute').blur(recomputeForOptional());
    }


    function methodOfDeductionsOptional() {
        $_Id('frm1702RT:rdoPg1Pt1I15ItemizedDeduction').checked = false;
        disableField('txtPg4Sc4I1Advertising,txtPg4Sc4I2AmortizationAmount,txtPg4Sc4I3AmortizationAmount,txtPg4Sc4I4C2,txtPg4Sc4I5BadDebts,txtPg4Sc4I6CharitableContributions,txtPg4Sc4I7Commissions,txtPg4Sc4I8Communication');
        disableField('txtPg4Sc4I9Depletion,txtPg4Sc4I10Depreciation,txtPg4Sc4I11DirectorsFee,txtPg4Sc4I12FringeBenefits,txtPg4Sc4I13Fuel,txtPg4Sc4I14Insurance,txtPg4Sc4I15Interest,txtPg4Sc4I16Janitorial,txtPg4Sc4I17Losses,txtPg4Sc4I18Management');
        disableField('txtPg4Sc4I19Miscellaneous,txtPg4Sc4I20OfficeSupplies,txtPg4Sc4I21OtherServices,txtPg4Sc4I22ProfessionalFees,txtPg4Sc4I23Rental,txtPg4Sc4I24Repairs,txtPg4Sc4I25Repairs,txtPg4Sc4I26Representation,txtPg4Sc4I27Research');
        disableField('txtPg4Sc4I28Royalties,txtPg4Sc4I29Salaries,txtPg5Sc4I30SecurityServices,txtPg4Sc4I2Amortization,txtPg4Sc4I3Amortization,txtPg4Sc4I4C1');
        //Page 5 Schedule 4
        disableField('txtPg5Sc4I31Contributions,txtPg5Sc4I32TaxesandLicenses,txtPg5Sc4I33TollingFees,txtPg5Sc4I34TrainingandSeminars,txtPg5Sc4I35TransportationandTravel,txtPg5Sc4I36C2,txtPg5Sc4I37C2,txtPg5Sc4I38C2,txtPg5Sc4I39C2');
        disableField('txtPg5Sc4I36C1,txtPg5Sc4I37C1,txtPg5Sc4I38C1,txtPg5Sc4I39C1');
        //Page 5 Schedule 5
        disableField('txtPg5Sc5I1C1,txtPg5Sc5I2C1,txtPg5Sc5I3C1,txtPg5Sc5I4C1,txtPg5Sc5I1C2,txtPg5Sc5I2C2,txtPg5Sc5I3C2,txtPg5Sc5I4C2,txtPg5Sc5I1C3,txtPg5Sc5I2C3,txtPg5Sc5I3C3,txtPg5Sc5I4C3');
        //Page 5 Schedule 6A
        disableField('txtPg5Sc6AI5C1,txtPg5Sc6AI5C2,txtPg5Sc6AI5C3,txtPg5Sc6AI6C1,txtPg5Sc6AI6C2,txtPg5Sc6AI6C3,txtPg5Sc6AI7C1,txtPg5Sc6AI7C2,txtPg5Sc6AI7C3');
        disableField('txtPg5Sc6AI4C5,txtPg5Sc6AI5C4,txtPg5Sc6AI5C5,txtPg5Sc6AI6C4,txtPg5Sc6AI6C5,txtPg5Sc6AI7C4,txtPg5Sc6AI7C5');
        $_Id('frm1702RT:txtPg4Sc4I1Advertising').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I2AmortizationAmount').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I3AmortizationAmount').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I4C2').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I5BadDebts').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I6CharitableContributions').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I7Commissions').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I8Communication').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I9Depletion').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I10Depreciation').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I11DirectorsFee').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I12FringeBenefits').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I13Fuel').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I14Insurance').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I15Interest').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I16Janitorial').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I17Losses').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I18Management').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I19Miscellaneous').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I20OfficeSupplies').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I21OtherServices').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I22ProfessionalFees').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I23Rental').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I24Repairs').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I25Repairs').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I26Representation').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I27Research').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I28Royalties').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I29Salaries').value = 0;
        $_Id('frm1702RT:txtPg5Sc4I30SecurityServices').value = 0;
        $_Id('frm1702RT:txtPg5Sc4I31Contributions').value = 0;
        $_Id('frm1702RT:txtPg5Sc4I32TaxesandLicenses').value = 0;
        $_Id('frm1702RT:txtPg5Sc4I33TollingFees').value = 0;
        $_Id('frm1702RT:txtPg5Sc4I34TrainingandSeminars').value = 0;
        $_Id('frm1702RT:txtPg5Sc4I35TransportationandTravel').value = 0;
        $_Id('frm1702RT:txtPg4Sc4I2Amortization').value = '';
        $_Id('frm1702RT:txtPg4Sc4I3Amortization').value = '';
        $_Id('frm1702RT:txtPg4Sc4I4C1').value = '';
        $_Id('frm1702RT:txtPg5Sc4I36C1').value = '';
        $_Id('frm1702RT:txtPg5Sc4I37C1').value = '';
        $_Id('frm1702RT:txtPg5Sc4I38C1').value = '';
        $_Id('frm1702RT:txtPg5Sc4I39C1').value = '';
        $_Id('frm1702RT:txtPg5Sc5I1C1').value = '';
        $_Id('frm1702RT:txtPg5Sc5I1C2').value = '';
        $_Id('frm1702RT:txtPg5Sc5I2C1').value = '';
        $_Id('frm1702RT:txtPg5Sc5I2C2').value = '';
        $_Id('frm1702RT:txtPg5Sc5I3C1').value = '';
        $_Id('frm1702RT:txtPg5Sc5I3C2').value = '';
        $_Id('frm1702RT:txtPg5Sc5I4C1').value = '';
        $_Id('frm1702RT:txtPg5Sc5I4C2').value = '';
        $_Id('frm1702RT:txtPg5Sc4I36C2').value = 0;
        $_Id('frm1702RT:txtPg5Sc4I37C2').value = 0;
        $_Id('frm1702RT:txtPg5Sc4I38C2').value = 0;
        $_Id('frm1702RT:txtPg5Sc4I39C2').value = 0;
        $_Id('frm1702RT:txtPg5Sc5I1C3').value = 0;
        $_Id('frm1702RT:txtPg5Sc5I2C3').value = 0;
        $_Id('frm1702RT:txtPg5Sc5I3C3').value = 0;
        $_Id('frm1702RT:txtPg5Sc5I4C3').value = 0;
        $_Id('frm1702RT:txtPg5Sc6I2TotalDeductions').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI4C3').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI5C1').value = '';
        $_Id('frm1702RT:txtPg5Sc6AI5C2').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI5C3').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI6C1').value = '';
        $_Id('frm1702RT:txtPg5Sc6AI6C2').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI6C3').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI7C1').value = '';
        $_Id('frm1702RT:txtPg5Sc6AI7C2').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI7C3').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI4C4').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI4C5').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI4C6').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI5C4').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI5C5').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI5C6').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI6C4').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI6C5').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI6C6').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI7C4').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI7C5').value = 0;
        $_Id('frm1702RT:txtPg5Sc6AI7C6').value = 0;
        $_Id('frm1702RT:txtPg5Sc5I4C3').value = 0;
        $_Id('btnPg4Sc4I4More').disabled = true;
        $_Id('btnPg5Sc4I39More').disabled = true;
        $_Id('btnPg5Sc5I4More').disabled = true;
        $_Id('frm1702RT:hndTriggerCompute').blur(recomputeForOptional());
    }

    function recomputeForOptional() {
        computeP2Pt4I32();
        computeP2Pt4I34();
        computeP2Pt4I38();
        computeP2Pt4I39();
        computeP2Pt4I40();
        computeP2Pt4I42();
        computeP2Pt4I43();
        computeP2Pt4I44();
        computeP2Pt4I46();
        computeP2Pt4I50();
        computeP2Pt4I51();
        computeP2Pt5I52();
        computeP2Pt5I54();
        computeP3Sc1I4();
        computeP3Sc1I6();
        computeP3Sc2I3();
        computeP3Sc2I5();
        computeP3Sc2I8();
        computeP3Sc2I10();
        computeP3Sc2I13();
        computeP3Sc2I16();
        computeP3Sc2I19();
        computeP3Sc2I26();
        P3Sc1();
        P3Sc2();
        Sc3();
        computeP5Sc4I40TotalOrdinaryAllowable();
        computeP5Sc5I5TotalSpecialAllowable();
        computePg5Sc6I3NetOperatingLoss();
        checkp5Sc6I3NetOperatingLoss();
        computeP5Sc6AI4C6();
        computeP5Sc6AI5C6(0);
        computeP5Sc6AI6C6(0);
        computeP5Sc6AI7C6(0);
        computeP5Sc6AI8TotalNOLCO();
        computeP6Sc7I12TotalTaxCredits();
    }

    function overPayment() {
        if ($_Id('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded').checked) {
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentIssued').checked = false;
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentCarried').checked = false;
        } else if ($_Id('frm1702RT:rdoPg1Pt2I21OverpaymentIssued').checked) {
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded').checked = false;
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentCarried').checked = false;
        } else if ($_Id('frm1702RT:rdoPg1Pt2I21OverpaymentCarried').checked = true) {
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded').checked = false;
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentIssued').checked = false;
        }
    }
    //Page 1 Item 21
    function untickRefunded() {
        if ($_Id('frm1702RT:hdnRefunded').value == 0) {
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded').checked = true;
            $_Id('frm1702RT:hdnRefunded').value = 1;
        }
        else {
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded').checked = false;
            $_Id('frm1702RT:hdnRefunded').value = 0;
        }
    }

    function untickIssued() {
        if ($_Id('frm1702RT:hdnIssued').value == 0) {
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentIssued').checked = true;
            $_Id('frm1702RT:hdnIssued').value = 1;
        }
        else {
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentIssued').checked = false;
            $_Id('frm1702RT:hdnIssued').value = 0;
        }
    }

    function untickCarried() {
        if ($_Id('frm1702RT:hdnCarried').value == 0) {
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentCarried').checked = true;
            $_Id('frm1702RT:hdnCarried').value = 1;
        }
        else {
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentCarried').checked = false;
            $_Id('frm1702RT:hdnCarried').value = 0;
        }
    }

    function validatePg1Pt2I22(isFromLoad) {
        var isCTC = $_Id("frm1702RT:rdoPg1Pt2I22CTC").checked;
        var isSEC = $_Id("frm1702RT:rdoPg1Pt2I22SEC").checked;

        if (!isFromLoad) {
            $("input[id$='txtPg1Pt2I23Date']").val("");
            $("input[id$='txtPg1Pt2I22CTC']").val("");
        }

        if (!!isCTC) {
            $("input[id$='txtPg1Pt2I22CTC']").attr("maxlength", "8");
            $_Id("frm1702RT:txtPg1Pt2I22CTC").onkeypress = function () { return wholenumber(event, false); };
            $_Id("frm1702RT:txtPg1Pt2I25AmountCTC").disabled = false;
        }
        else if (!!isSEC) {
            $("input[id$='txtPg1Pt2I22CTC']").attr("maxlength", "10");
            $_Id("frm1702RT:txtPg1Pt2I22CTC").onkeypress = function () { return Code(this); };
            $_Id("frm1702RT:txtPg1Pt2I25AmountCTC").value = 0;
            $_Id("frm1702RT:txtPg1Pt2I25AmountCTC").disabled = true;
        }
    }

    function checkPg2Pt6I60(elem) {
        var item61 = $_Id('frm1702RT:txtPg2Pt6I61ExpiryDate');


        if (!!validateDate(elem) && ($.trim(elem.value) !== "")) {
            var elemValue = elem.value.split("/");

            elemValue[2] = parseInt(elemValue[2]) + 3;
            elemValue = elemValue.join("/");
            item61.value = elemValue;
        }
        else {
            item61.value = "";
        }
    }

    function checkPg2Pt6I6061(elem) {
        var item60 = $_Id('frm1702RT:txtPg2Pt6I60IssueDate');
        var item61 = $_Id('frm1702RT:txtPg2Pt6I61ExpiryDate');
        var item60Year = item60.value.split("/")[2];
        var item61Year = item61.value.split("/")[2];

        if (item60.value == "" && item61.value != "") {
            alert("Page 2 Part VI Item 60 must have a valid date before entering a Date of Expiry.");
            item61.value = "";
            item60.value = "";
            item60.focus();
        }

        else if ((validateFutureDate(item60) && validateFutureDate(item61)) && ("" !== (item60.value && item61.value))) {

            if (item61Year - item60Year <= 0) {
                alert("Expiry Date (Page 2 Part VI Item 61) year should not be less than or equal to Issue Date (Page 2 Part VI Item 60) year.");
                item61.value = "";
                item61.focus();
            }
            else if (item61Year - item60Year > 3) {
                alert("Expiry Date (Page 2 Part VI Item 61) should not be greater than 3 years from Issue Date (Page 2 Part VI Item 60).");
                item61.value = "";
                item61.focus();
            }
        }
    }

    function tickStockholdersMembers() {
        for (var i = 1; i <= 1; i++) {
            enableField('txtPg7Sc11I' + i + 'C1');
            enableField('txtPg7Sc11I' + i + 'Tin1');
            enableField('txtPg7Sc11I' + i + 'Tin2');
            enableField('txtPg7Sc11I' + i + 'Tin3');
            enableField('txtPg7Sc11I' + i + 'Tin4');
            enableField('txtPg7Sc11I' + i + 'C3');
            enableField('txtPg7Sc11I' + i + 'C4');
        }

        document.getElementById('frm1702RT:chkPg7Sc11Partners').checked = false;
    }

    function tickPartners() {
        for (var i = 1; i <= 1; i++) {
            enableField('txtPg7Sc11I' + i + 'C1');
            enableField('txtPg7Sc11I' + i + 'Tin1');
            enableField('txtPg7Sc11I' + i + 'Tin2');
            enableField('txtPg7Sc11I' + i + 'Tin3');
            enableField('txtPg7Sc11I' + i + 'Tin4');
            enableField('txtPg7Sc11I' + i + 'C3');
            enableField('txtPg7Sc11I' + i + 'C4');
        }

        document.getElementById('frm1702RT:chkPg7Sc11Stockholders').checked = false;
        document.getElementById('frm1702RT:chkPg7Sc11Members').checked = false;
    }

    //page 7 Schedule 11
    function checkNullP7Sc11I6toI20() {
        var count = 0;
        var isValid = true;

        for (var i = 1; i < 21; i++) {
            //As of 10/08/2015 HD2014-1246020 : If the TP selects “Member”, system should accept zero (0) in ‘Capital Contribution’
            var isNotValidCapitalTotal = $_Id('frm1702RT:chkPg7Sc11Members').checked == true ? false : ($_Id('frm1702RT:txtPg7Sc11I' + i + 'C3').value == 0 || $_Id('frm1702RT:txtPg7Sc11I' + i + 'C4').value == 0);

            //if registered name has a value and other column is null or 0 ,count
            if ($.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'C1').value) != "") {
                if ($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin1').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin2').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin3').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin4').value == "" || isNotValidCapitalTotal) {
                    count += 1;
                }
            }
            //if TIN1 has a value and other column is null or 0 ,count
            if ($.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin1').value) != "") {
                if ($_Id('frm1702RT:txtPg7Sc11I' + i + 'C1').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin2').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin3').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin4').value == "" || isNotValidCapitalTotal) {
                    count += 1;
                }
            }
            //if TIN2 has a value and other column is null or 0 ,count
            if ($.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin2').value) != "") {
                if ($_Id('frm1702RT:txtPg7Sc11I' + i + 'C1').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin1').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin3').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin4').value == "" || isNotValidCapitalTotal) {
                    count += 1;
                }
            }
            //if TIN3 has a value and other column is null or 0 ,count
            if ($.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin3').value) != "") {
                if ($_Id('frm1702RT:txtPg7Sc11I' + i + 'C1').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin1').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin2').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin4').value == "" || isNotValidCapitalTotal) {
                    count += 1;
                }
            }
            //if TIN4 has a value and other column is null or 0 ,count
            if ($.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin4').value) != "") {
                if ($_Id('frm1702RT:txtPg7Sc11I' + i + 'C1').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin1').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin2').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin3').value == "" || isNotValidCapitalTotal) {
                    count += 1;
                }
            }
            //if  Capital Contribution is greater than zero and other column is null or 0 ,count
            if ($_Id('frm1702RT:txtPg7Sc11I' + i + 'C3').value > '0') {
                if ($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin1').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin2').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin3').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin4').value == "" || $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'C1').value) == "" || ($_Id('frm1702RT:txtPg7Sc11I' + i + 'C4').value == 0 && $_Id('frm1702RT:chkPg7Sc11Members').checked == false)) {
                    count += 1;
                }
            }
            //if  % to Total is greater than zero and other column is null or 0 ,count
            if ($_Id('frm1702RT:txtPg7Sc11I' + i + 'C4').value > '0') {
                if ($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin1').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin2').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin3').value == "" || $_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin4').value == "" || $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'C1').value) == "" || ($_Id('frm1702RT:txtPg7Sc11I' + i + 'C3').value == 0 &&  $_Id('frm1702RT:chkPg7Sc11Members').checked == false)) {
                    count += 1;
                }
            }
        }
        if (count != 0) {
            isValid = false;
            var msg = $_Id('frm1702RT:chkPg7Sc11Members').checked == true ? "Please fill up empty data on Page 7 Schedule 11" : "Please fill up empty data or Capital Contribution must be greater than zero on Page 7 Schedule 11";
            alert(msg);
        }
        return isValid;
    }

    function checkNullPg7Sc11I6toI20Enable() {
        for (var i = 1; i <= 19; i++) {
            var isValidCapitalTotal = $_Id('frm1702RT:chkPg7Sc11Members').checked == true ? true : ($.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'C3').value) != '0' && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'C4').value) != '0');
            if ($.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'C1').value) != "" && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin1').value) != "" && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin2').value) != "" && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin3').value) != "" && $.trim($_Id('frm1702RT:txtPg7Sc11I' + i + 'Tin4').value) != "" && isValidCapitalTotal) {
                enableField('txtPg7Sc11I' + (i + 1) + 'C1');
                enableField('txtPg7Sc11I' + (i + 1) + 'Tin1');
                enableField('txtPg7Sc11I' + (i + 1) + 'Tin2');
                enableField('txtPg7Sc11I' + (i + 1) + 'Tin3');
                enableField('txtPg7Sc11I' + (i + 1) + 'Tin4');
                enableField('txtPg7Sc11I' + (i + 1) + 'C3');
                enableField('txtPg7Sc11I' + (i + 1) + 'C4');
            }
        }
    }

    function checkPg4Sc3I3() {
        disableLinkIfEmptyControls('frm1702RT:txtPg4Sc3I1OtherTaxIncome,frm1702RT:txtPg4Sc3I2OtherTaxIncome,frm1702RT:txtPg4Sc3I3C1', 'btnPg4Sc3I3More');
        if ($_Id('frm1702RT:txtPg4Sc3I3CtrModal').value > 0) {
            $_Id('btnPg4Sc3I3More').disabled = false;
        }
    }
    function checkPg4Sc4I4() {
        disableLinkIfEmptyControls('frm1702RT:txtPg4Sc4I2Amortization,frm1702RT:txtPg4Sc4I3Amortization,frm1702RT:txtPg4Sc4I4C1', 'btnPg4Sc4I4More');
        if ($_Id('frm1702RT:txtPg4Sc4I4CtrModal').value > 0) {
            $_Id('btnPg4Sc4I4More').disabled = false;
        }
    }
    function checkPg5Sc4I39() {
        disableLinkIfEmptyControls('frm1702RT:txtPg5Sc4I36C1,frm1702RT:txtPg5Sc4I37C1,frm1702RT:txtPg5Sc4I38C1,frm1702RT:txtPg5Sc4I39C1', 'btnPg5Sc4I39More');
        if ($_Id('frm1702RT:txtPg5Sc4I39CtrModal').value > 0) {
            $_Id('btnPg5Sc4I39More').disabled = false;
        }
    }
    function checkPg5Sc5I4() {
        disableLinkIfEmptyControls('frm1702RT:txtPg5Sc5I1C1,frm1702RT:txtPg5Sc5I2C1,frm1702RT:txtPg5Sc5I3C1,frm1702RT:txtPg5Sc5I4C1,frm1702RT:txtPg5Sc5I1C2,frm1702RT:txtPg5Sc5I2C2,frm1702RT:txtPg5Sc5I3C2,frm1702RT:txtPg5Sc5I4C2', 'btnPg5Sc5I4More');
        if ($_Id('frm1702RT:txtPg5Sc5I4CtrModal').value > 0) {
            $_Id('btnPg5Sc5I4More').disabled = false;
        }
    }
    function checkPg5Sc6I7() {
        disableLinkIfEmptyControls('frm1702RT:txtPg5Sc6AI5C1,frm1702RT:txtPg5Sc6AI6C1,frm1702RT:txtPg5Sc6AI7C1', 'btnPg5Sc6AI7More');
        if ($_Id('frm1702RT:txtPg5Sc6AI7CtrModal').value > 0) {
            $_Id('btnPg5Sc6AI7More').disabled = false;
        }
    }
    function checkPg6Sc7I11() {
        disableLinkIfEmptyControls('frm1702RT:txtPg6Sc7I10C1,frm1702RT:txtPg6Sc7I11C1', 'btnPg6Sc7I11More');
        if ($_Id('frm1702RT:txtPg6Sc7I11CtrModal').value > 0) {
            $_Id('btnPg6Sc7I11More').disabled = false;
        }
    }
    function checkPg6Sc9I3() {
        disableLinkIfEmptyControls('frm1702RT:txtPg6Sc9I2C1,frm1702RT:txtPg6Sc9I3C1', 'btnPg6Sc9I3More');
        if ($_Id('frm1702RT:txtPg6Sc9I3CtrModal').value > 0) {
            $_Id('btnPg6Sc9I3More').disabled = false;
        }
    }
    function checkPg6Sc9I6() {
        disableLinkIfEmptyControls('frm1702RT:txtPg6Sc9I5C1,frm1702RT:txtPg6Sc9I6C1', 'btnPg6Sc9I6More');
        if ($_Id('frm1702RT:txtPg6Sc9I6CtrModal').value > 0) {
            $_Id('btnPg6Sc9I6More').disabled = false;
        }
    }
    function checkPg6Sc9I8() {
        disableLinkIfEmptyControls('frm1702RT:txtPg6Sc9I7C1,frm1702RT:txtPg6Sc9I8C1', 'btnPg6Sc9I8More');
        if ($_Id('frm1702RT:txtPg6Sc9I8CtrModal').value > 0) {
            $_Id('btnPg6Sc9I8More').disabled = false;
        }
    }
    //Page 8
    function checkPg8Sc12Pt2C1() {
        enableCompleteRows('txtPg8Sc12I5C1,txtPg8Sc12I6C1,txtPg8Sc12I7C1', 'txtPg8Sc12I8C1,txtPg8Sc12I9C1', 'frm1702RT:txtPg8Sc12I5C2,frm1702RT:txtPg8Sc12I6C2,frm1702RT:txtPg8Sc12I7C2,frm1702RT:txtPg8Sc12I8C2,frm1702RT:txtPg8Sc12I9C2');
        if ($_Id('frm1702RT:txtCtrmodalPg8Sc12II').value > 0) {
            $_Id('frm1702RT:btnModalPg8Sc12II').disabled = false;
        }
    }
    function checkPg8Sc12Pt2C2() {
        enableCompleteRows('txtPg8Sc12I5C1,txtPg8Sc12I6C1,txtPg8Sc12I7C1,txtPg8Sc12I5C2,txtPg8Sc12I6C2,txtPg8Sc12I7C2', 'txtPg8Sc12I8C1,txtPg8Sc12I9C1,txtPg8Sc12I8C2,txtPg8Sc12I9C2', 'frm1702RT:btnModalPg8Sc12II');
        if ($_Id('frm1702RT:txtCtrmodalPg8Sc12II').value > 0) {
            $_Id('frm1702RT:btnModalPg8Sc12II').disabled = false;
        }
    }
    function checkPg8Sc12Pt3C1() {
        enableCompleteRows('txtPg8Sc12I10C1,txtPg8Sc12I11C1,txtPg8Sc12I13C1Date', 'txtPg8Sc12I12C1,txtPg8Sc12I14C1,txtPg8Sc12I15C1', 'frm1702RT:ddlPg8Sc12I10C2,frm1702RT:txtPg8Sc12I10C2,frm1702RT:txtPg8Sc12I11C2,frm1702RT:txtPg8Sc12I13C2Date,frm1702RT:txtPg8Sc12I12C2,frm1702RT:txtPg8Sc12I14C2,frm1702RT:txtPg8Sc12I15C2');
        if ($_Id('frm1702RT:txtCtrmodalPg8Sc12III').value > 0) {
            $_Id('frm1702RT:btnModalPg8Sc12III').disabled = false;
        }
    }
    function checkPg8Sc12Pt3C2() {
        enableCompleteRows('txtPg8Sc12I10C1,txtPg8Sc12I11C1,txtPg8Sc12I13C1Date,txtPg8Sc12I10C2,txtPg8Sc12I11C2,txtPg8Sc12I13C2Date', 'txtPg8Sc12I12C1,txtPg8Sc12I14C1,txtPg8Sc12I15C1,txtPg8Sc12I12C2,txtPg8Sc12I14C2,txtPg8Sc12I15C2', 'frm1702RT:btnModalPg8Sc12III');
        if ($_Id('frm1702RT:txtCtrmodalPg8Sc12III').value > 0) {
            $_Id('frm1702RT:btnModalPg8Sc12III').disabled = false;
        }
    }
    function checkPg8Sc12Pt4C1() {
        enableCompleteRows('txtPg8Sc12I16C1', 'txtPg8Sc12I17C1,txtPg8Sc12I18C1', 'frm1702RT:txtPg8Sc12I16C2,frm1702RT:txtPg8Sc12I17C2,frm1702RT:txtPg8Sc12I18C2');
        if ($_Id('frm1702RT:txtCtrmodalPg8Sc12IV').value > 0) {
            $_Id('frm1702RT:btnModalPg8Sc12IV').disabled = false;
        }
    }
    function checkPg8Sc12Pt4C2() {
        enableCompleteRows('txtPg8Sc12I16C1,txtPg8Sc12I16C2', 'txtPg8Sc12I17C1,txtPg8Sc12I18C1,txtPg8Sc12I17C2,txtPg8Sc12I18C2', 'frm1702RT:btnModalPg8Sc12IV');
        if ($_Id('frm1702RT:txtCtrmodalPg8Sc12IV').value > 0) {
            $_Id('frm1702RT:btnModalPg8Sc12IV').disabled = false;
        }
    }
    function checkPg8Sc13Pt1C1() {
        enableCompleteRows('txtPg8Sc13I2C1,txtPg8Sc13I3C1,txtPg8Sc13I4C1', 'txtPg8Sc13I5C1', 'frm1702RT:txtPg8Sc13I2C2,frm1702RT:txtPg8Sc13I3C2,frm1702RT:txtPg8Sc13I4C2,frm1702RT:txtPg8Sc13I5C2');
        if ($_Id('frm1702RT:txtCtrmodalPg8Sc13I').value > 0) {
            $_Id('frm1702RT:btnModalPg8Sc13I').disabled = false;
        }
    }
    function checkPg8Sc13Pt1C2() {
        enableCompleteRows('txtPg8Sc13I2C1,txtPg8Sc13I3C1,txtPg8Sc13I4C1,txtPg8Sc13I2C2,txtPg8Sc13I3C2,txtPg8Sc13I4C2', 'txtPg8Sc13I5C1,txtPg8Sc13I5C2', 'frm1702RT:btnModalPg8Sc13I');
        if ($_Id('frm1702RT:txtCtrmodalPg8Sc13I').value > 0) {
            $_Id('frm1702RT:btnModalPg8Sc13I').disabled = false;
        }
    }
    function checkPg8Sc13Pt2C1() {
        enableCompleteRows('txtPg8Sc13I6C1', 'txtPg8Sc13I7C1', 'frm1702RT:txtPg8Sc13I6C2,frm1702RT:txtPg8Sc13I7C2');
        if ($_Id('frm1702RT:txtCtrmodalPg8Sc13II').value > 0) {
            $_Id('frm1702RT:btnModalPg8Sc13II').disabled = false;
        }
    }
    function checkPg8Sc13Pt2C2() {
        enableCompleteRows('txtPg8Sc13I6C1,txtPg8Sc13I6C2', 'txtPg8Sc13I7C1,txtPg8Sc13I7C2', 'frm1702RT:btnModalPg8Sc13II');
        if ($_Id('frm1702RT:txtCtrmodalPg8Sc13II').value > 0) {
            $_Id('frm1702RT:btnModalPg8Sc13II').disabled = false;
        }
    }

    function checkFormValidated() {
        if ($_Id('frm1702RT:cmdValidate').disabled === true) {
            $('.modalShow').find('input, select').attr("disabled", true);
            $('input[value=" Close "]').attr("disabled", false);
            $('input[value=" Print "]').attr("disabled", false);
        }
        else if ($_Id('frm1702RT:cmdValidate').disabled === false) {
            $('.modalShow').find('input, select').attr("disabled", false);
            $_Id('frm1702RT:txtPg4Sc3I3SubTotal').disabled = true;
            $_Id('frm1702RT:txtPg4Sc4I4SubTotal').disabled = true;
            $_Id('frm1702RT:txtPg5Sc4I39SubTotal').disabled = true;
            $_Id('frm1702RT:txtPg5Sc5I4SubTotal').disabled = true;
            $_Id('frm1702RT:txtPg6Sc7I11SubTotal').disabled = true;
            $_Id('frm1702RT:txtPg6Sc9I3SubTotal').disabled = true;
            $_Id('frm1702RT:txtPg6Sc9I6SubTotal').disabled = true;
            $_Id('frm1702RT:txtPg6Sc9I8SubTotal').disabled = true;
            $_Id('frm1702RT:txtPg8Sc12I4SubTotal').disabled = true;
            $('input[value=" Print "]').attr("disabled", true);
        }
    }

    function computeP2Pt4I32() {
        getDifference('txtPg2Pt4I30NetSales', 'txtPg2Pt4I31LessCost', 'txtPg2Pt4I32GrossIncome');
    }

    function computeP2Pt4I34() {
        //        $_Id('frm1702RT:txtPg5Sc6I1GrossIncome').value = addCommas(WholeNumWithComma($_Id('frm1702RT:txtPg2Pt4I34TotalGross').value));
        getSum('txtPg2Pt4I32GrossIncome,txtPg4Sc3I4OtherTaxTotalAmount', 'txtPg2Pt4I34TotalGross');
        //        $_Id('frm1702RT:txtPg5Sc6I1GrossIncome').value = $_Id('frm1702RT:txtPg2Pt4I34TotalGross').value;
    }

    function computeP2Pt4I38() {
        $_Id('frm1702RT:txtPg2Pt4I38TotalItemized').value = 0;
        if ($_Id('frm1702RT:rdoPg1Pt1I15ItemizedDeduction').checked == true) {
            getSum('txtPg2Pt4I35OrdinaryAllowable,txtPg2Pt4I36SpecialAllowable,txtPg2Pt4I37Nolco', 'txtPg2Pt4I38TotalItemized');
        }
    }

    function computeP2Pt4I39() {
        $_Id('frm1702RT:txtPg2Pt4I39OptionalStandard').value = 0;
        if ($_Id('frm1702RT:rdoPg1Pt1I15OptionalStandard').checked == true && NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg2Pt4I34TotalGross').value)) > 0) {
            getProduct2('txtPg2Pt4I34TotalGross', 0.40, 'txtPg2Pt4I39OptionalStandard');
        }
        else if ($_Id('frm1702RT:rdoPg1Pt1I15OptionalStandard').checked == true && NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg2Pt4I34TotalGross').value)) < 0) {
            $_Id('frm1702RT:txtPg2Pt4I39OptionalStandard').value = 0;
        }
    }
    function computeP2Pt4I40() {
        if ($_Id('frm1702RT:rdoPg1Pt1I15OptionalStandard').checked == true) {
            getDifference('txtPg2Pt4I34TotalGross', 'txtPg2Pt4I39OptionalStandard', 'txtPg2Pt4I40NetTaxable');
            $_Id('frm1702RT:txtPg5Sc6I1GrossIncome').value = "0";


        }
        else if ($_Id('frm1702RT:rdoPg1Pt1I15ItemizedDeduction').checked == true) {
            getDifference('txtPg2Pt4I34TotalGross', 'txtPg2Pt4I38TotalItemized', 'txtPg2Pt4I40NetTaxable');

            if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg2Pt4I34TotalGross').value)) < NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg2Pt4I35OrdinaryAllowable').value))) {
                $_Id('frm1702RT:txtPg5Sc6I1GrossIncome').value = $_Id('frm1702RT:txtPg2Pt4I34TotalGross').value;
                $_Id('frm1702RT:txtPg5Sc6I2TotalDeductions').value = $_Id('frm1702RT:txtPg2Pt4I35OrdinaryAllowable').value;
         
            }
            else {
                $_Id('frm1702RT:txtPg5Sc6I1GrossIncome').value = "0";
                $_Id('frm1702RT:txtPg5Sc6I2TotalDeductions').value = "0";
                //                $_Id('frm1702RT:txtPg5Sc6AI4C3').value = "0";
                //                $_Id('frm1702RT:txtPg5Sc6AI4C4').value = "0";
                $_Id('frm1702RT:txtPg5Sc6AI4C5').value = "0";
                $_Id('frm1702RT:txtPg5Sc6AI4C6').value = "0";
                //                $_Id('frm1702RT:txtPg5Sc6AI4C3').disabled = true;
                //                $_Id('frm1702RT:txtPg5Sc6AI4C4').disabled = true;
                $_Id('frm1702RT:txtPg5Sc6AI4C5').disabled = true;
            }
        }
    }

    function computeP2Pt4I42() {
        getProduct2('txtPg2Pt4I40NetTaxable', 0.3, 'txtPg2Pt4I42IncomeTaxDue');
        if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg2Pt4I42IncomeTaxDue').value)) < 0) {
            $_Id('frm1702RT:txtPg2Pt4I42IncomeTaxDue').value = "0";
        }
    }

    function computeP2Pt4I43() {
        getProduct2('txtPg2Pt4I34TotalGross', 0.02, 'txtPg2Pt4I43MinimumCorporate');
        if ($_Id('frm1702RT:rdoPg1I5Atc').checked == false) {
            $_Id('frm1702RT:txtPg2Pt4I43MinimumCorporate').value = "0";
        }
        if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg2Pt4I34TotalGross').value)) < 0) {
            $_Id('frm1702RT:txtPg2Pt4I43MinimumCorporate').value = "0";
        }
    }

    function computeP2Pt4I44() {
        if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg2Pt4I42IncomeTaxDue').value)) >= NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg2Pt4I43MinimumCorporate').value))) {
            allFormat('txtPg2Pt4I42IncomeTaxDue', 'txtPg2Pt4I44TotalIncomeTax');
            allFormat('txtPg6Sc8I4TotalExcessMCIT', 'txtPg6Sc7I4ExcessMCIT');
        }
        else {
            allFormat('txtPg2Pt4I43MinimumCorporate', 'txtPg2Pt4I44TotalIncomeTax');
            $_Id('frm1702RT:txtPg6Sc7I4ExcessMCIT').value = "0";
        }
        allFormat('txtPg2Pt4I44TotalIncomeTax', 'txtPg1Pt2I16IncomeTax');
    }

    function computeP2Pt4I46() {
        getDifference('txtPg2Pt4I44TotalIncomeTax', 'txtPg2Pt4I45LessTotalTax', 'txtPg2Pt4I46NetTax');
        $_Id('frm1702RT:txtPg1Pt2I18NetTax').value = $_Id('frm1702RT:txtPg2Pt4I46NetTax').value;
    }

    function computeP2Pt4I50() {
        getSum('txtPg2Pt4I47Surcharge,txtPg2Pt4I48Interest,txtPg2Pt4I49Compromise', 'txtPg2Pt4I50TotalPenalties');
        $_Id('frm1702RT:txtPg1Pt2I19TotalPenalties').value = $_Id('frm1702RT:txtPg2Pt4I50TotalPenalties').value;
        computeP2Pt4I51();
    }

    function computeP2Pt4I51() {
        if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg2Pt4I46NetTax').value)) >= 0) {
            getSum('txtPg2Pt4I46NetTax,txtPg2Pt4I50TotalPenalties', 'txtPg2Pt4I51TotalAmount');
        }
        else if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg2Pt4I46NetTax').value)) < 0) {
            allFormat('txtPg2Pt4I46NetTax', 'txtPg2Pt4I51TotalAmount');
        }
        $_Id('frm1702RT:txtPg1Pt2I20TotalAmount').value = $_Id('frm1702RT:txtPg2Pt4I51TotalAmount').value;

        //for Page 1 Item 21
        if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt2I20TotalAmount').value)) < 0) {
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded').disabled = false;
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentIssued').disabled = false;
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentCarried').disabled = false;
        }
        else if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt2I20TotalAmount').value)) >= 0) {
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded').checked = false;
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentIssued').checked = false;
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentCarried').checked = false;
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded').disabled = true;
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentIssued').disabled = true;
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentCarried').disabled = true;
        }
    }

    function computeP2Pt5I52() {
        getProduct2('txtPg2Pt4I36SpecialAllowable', 0.30, 'txtPg2Pt5I52SpecialAllowable');
    }

    function computeP2Pt5I54() {
        getSum('txtPg2Pt5I52SpecialAllowable,txtPg2Pt5I53AddSpecialTax', 'txtPg2Pt5I54TotalTax');
    }
    //End of page 2 js

    //Page 3 js
    function computeP3Sc1I4() {
        getSum('txtPg3Sc1I1GoodsProp,txtPg3Sc1I2SaleServices,txtPg3Sc1I3LeaseProp', 'txtPg3Sc1I4Total');
    }

    function computeP3Sc1I6() {
        getDifference('txtPg3Sc1I4Total', 'txtPg3Sc1I5LessSales', 'txtPg3Sc1I6NetSales');
    }

    function computeP3Sc2I3() {
        getSum('txtPg3Sc2I1MerchInventory,txtPg3Sc2I2AddPurchases', 'txtPg3Sc2I3TotalGoods');
    }

    function computeP3Sc2I5() {
        getDifference('txtPg3Sc2I3TotalGoods', 'txtPg3Sc2I4LessMerch', 'txtPg3Sc2I5CostofSales');
    }

    function computeP3Sc2I8() {
        getSum('txtPg3Sc2I6DirectMaterials,txtPg3Sc2I7AddPurchases', 'txtPg3Sc2I8MaterialsAvaliable');
    }

    function computeP3Sc2I10() {
        getDifference('txtPg3Sc2I8MaterialsAvaliable', 'txtPg3Sc2I9LessDirectMat', 'txtPg3Sc2I10RawMatUsed');
    }

    function computeP3Sc2I13() {
        getSum('txtPg3Sc2I10RawMatUsed,txtPg3Sc2I11DirectLabor,txtPg3Sc2I12ManOverhead', 'txtPg3Sc2I13TotalManCost');
    }

    function computeP3Sc2I16() {
        sumThenDifference('txtPg3Sc2I13TotalManCost', 'txtPg3Sc2I14WorkProcess', 'txtPg3Sc2I15LessWorkProcess', 'txtPg3Sc2I16CostOfGoods');
    }

    function computeP3Sc2I19() {
        sumThenDifference('txtPg3Sc2I16CostOfGoods', 'txtPg3Sc2I17FinishedGoods', 'txtPg3Sc2I18LessFinishGoods', 'txtPg3Sc2I19CostOfGoods');
    }

    function computeP3Sc2I26() {
        getSum('txtPg3Sc2I20DirectSalaries,txtPg3Sc2I21DirectMaterials,txtPg3Sc2I22DirectDepreciation,txtPg3Sc2I23DirectRental,txtPg3Sc2I24DirectOutside,txtPg3Sc2I25DirectOthers', 'txtPg3Sc2I26TotalService');
    }
    function P3Sc1() {
        computeP3Sc1I4();
        computeP3Sc1I6();
        //Page2 To P4I30
        //$_Id('frm1702RT:txtPg2Pt4I30NetSales').value = $_Id('frm1702RT:txtPg3Sc1I6NetSales').value;
        allFormat('txtPg3Sc1I6NetSales', 'txtPg2Pt4I30NetSales');
        computeP2Pt4I32();
        computeP2Pt4I34();
        computeP2Pt4I39();
        computeP2Pt4I40();
        computeP2Pt4I42();
        computeP2Pt4I43();
        computeP2Pt4I44();
        computeP2Pt4I46();
        computeP2Pt4I51();
        computePg5Sc6I3NetOperatingLoss();
        //        document.getElementById('frm1702RT:txtPg5Sc6AI4C2').value = document.getElementById('frm1702RT:txtPg5Sc6I3NetOperatingLoss').value;
        //        computeP5Sc6AI4C6();
    }

    function P3Sc2() {
        computeP3Sc2I3();
        computeP3Sc2I5();
        computeP3Sc2I8();
        computeP3Sc2I10();
        computeP3Sc2I13();
        computeP3Sc2I16();
        computeP3Sc2I19();
        computeP3Sc2I26();
        //To Item 27
        getSum('txtPg3Sc2I5CostofSales,txtPg3Sc2I19CostOfGoods,txtPg3Sc2I26TotalService', 'txtPg3Sc2I27TotalSales');
        //Page2 To Pt4I31
        //$_Id('frm1702RT:txtPg2Pt4I31LessCost').value = $_Id('frm1702RT:txtPg3Sc2I27TotalSales').value;
        allFormat('txtPg3Sc2I27TotalSales', 'txtPg2Pt4I31LessCost');
        computeP2Pt4I32();
        computeP2Pt4I34();
        computeP2Pt4I38();
        computeP2Pt4I39();
        computeP2Pt4I40();
        computeP2Pt4I42();
        computeP2Pt4I43();
        computeP2Pt4I44();
        computeP2Pt4I46();
        computeP2Pt4I51();
        computePg5Sc6I3NetOperatingLoss();
        //        document.getElementById('frm1702RT:txtPg5Sc6AI4C2').value = document.getElementById('frm1702RT:txtPg5Sc6I3NetOperatingLoss').value;
        //        computeP5Sc6AI4C6();
    }
    //End of page 3 js

    //Page 4 js
    function Sc3() {
        //Compute P4 Sc3 I3
        //$_Id('frm1702RT:txtPg4Sc3I4OtherTaxTotalAmount').value = addCommas(WholeNumWithComma($_Id('frm1702RT:txtPg4Sc3I1OtherTaxAmount').value) + WholeNumWithComma($_Id('frm1702RT:txtPg4Sc3I2OtherTaxAmount').value) + WholeNumWithComma($_Id('frm1702RT:txtPg4Sc3I3OtherTaxAmount').value));
        getSum('txtPg4Sc3I1OtherTaxAmount,txtPg4Sc3I2OtherTaxAmount,txtPg4Sc3I3C2', 'txtPg4Sc3I4OtherTaxTotalAmount');
        //To P2 Pt4 I4
        //$_Id('frm1702RT:txtPg2Pt4I33AddOtherTaxable').value = $_Id('frm1702RT:txtPg4Sc3I4OtherTaxTotalAmount').value;
        allFormat('txtPg4Sc3I4OtherTaxTotalAmount', 'txtPg2Pt4I33AddOtherTaxable');
        computeP2Pt4I34();
        computeP2Pt4I38();
        computeP2Pt4I39();
        computeP2Pt4I40();
        computeP2Pt4I42();
        computeP2Pt4I43();
        computeP2Pt4I44();
        computeP2Pt4I46();
        computeP2Pt4I51();
        computePg5Sc6I3NetOperatingLoss();
        //        document.getElementById('frm1702RT:txtPg5Sc6AI4C2').value = document.getElementById('frm1702RT:txtPg5Sc6I3NetOperatingLoss').value;
        //        computeP5Sc6AI4C6();
    }
    //End of Page 4 js

    //Start of Page 5 js
    function computeP5Sc4I40TotalOrdinaryAllowable() {
        getSum('txtPg4Sc4I1Advertising,txtPg4Sc4I2AmortizationAmount,txtPg4Sc4I3AmortizationAmount,txtPg4Sc4I4C2,txtPg4Sc4I5BadDebts,txtPg4Sc4I6CharitableContributions,txtPg4Sc4I7Commissions,txtPg4Sc4I8Communication,txtPg4Sc4I9Depletion,txtPg4Sc4I10Depreciation,txtPg4Sc4I11DirectorsFee,txtPg4Sc4I12FringeBenefits,txtPg4Sc4I13Fuel,txtPg4Sc4I14Insurance,txtPg4Sc4I15Interest,txtPg4Sc4I16Janitorial,txtPg4Sc4I17Losses,txtPg4Sc4I18Management,txtPg4Sc4I19Miscellaneous,txtPg4Sc4I20OfficeSupplies,txtPg4Sc4I21OtherServices,txtPg4Sc4I22ProfessionalFees,txtPg4Sc4I23Rental,txtPg4Sc4I24Repairs,txtPg4Sc4I25Repairs,txtPg4Sc4I26Representation,txtPg4Sc4I27Research,txtPg4Sc4I28Royalties,txtPg4Sc4I29Salaries,txtPg5Sc4I30SecurityServices,txtPg5Sc4I31Contributions,txtPg5Sc4I32TaxesandLicenses,txtPg5Sc4I33TollingFees,txtPg5Sc4I34TrainingandSeminars,txtPg5Sc4I35TransportationandTravel,txtPg5Sc4I36C2,txtPg5Sc4I37C2,txtPg5Sc4I38C2,txtPg5Sc4I39C2', 'txtPg5Sc4I40TotalOrdinaryAllowable');
        //$_Id('frm1702RT:txtPg2Pt4I35OrdinaryAllowable').value = $_Id('frm1702RT:txtPg5Sc4I40TotalOrdinaryAllowable').value;
        allFormat('txtPg5Sc4I40TotalOrdinaryAllowable', 'txtPg2Pt4I35OrdinaryAllowable');
        computeP2Pt4I38();
        computeP2Pt4I39();
        computeP2Pt4I40();
        computeP2Pt4I42();
        computeP2Pt4I43();
        computeP2Pt4I44();
        computeP2Pt4I46();
        computeP2Pt4I51();
        computeP2Pt5I52();
        computeP2Pt5I54();
        computePg5Sc6I3NetOperatingLoss();
    }
    function computeP5Sc5I5TotalSpecialAllowable() {
        getSum('txtPg5Sc5I1C3,txtPg5Sc5I2C3,txtPg5Sc5I3C3,txtPg5Sc5I4C3', 'txtPg5Sc5I5TotalSpecialAllowable');
        //$_Id('frm1702RT:txtPg2Pt4I36SpecialAllowable').value = $_Id('frm1702RT:txtPg5Sc5I5TotalSpecialAllowable').value;
        allFormat('txtPg5Sc5I5TotalSpecialAllowable', 'txtPg2Pt4I36SpecialAllowable');
        computeP2Pt4I38();
        computeP2Pt4I39();
        computeP2Pt4I40();
        computeP2Pt4I42();
        computeP2Pt4I43();
        computeP2Pt4I44();
        computeP2Pt4I46();
        computeP2Pt4I51();
        computeP2Pt5I52();
        computeP2Pt5I54();
        computePg5Sc6I3NetOperatingLoss();
    }
    function computeP5Sc6AI8TotalNOLCO() {
        //To Part4 Item 37
        //$_Id('frm1702RT:txtPg2Pt4I37Nolco').value = $_Id('frm1702RT:txtPg5Sc6AI8TotalNOLCO');

        //Compute Net Operating Loss
        if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI4C5').value)) > WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI4C2').value))) {
            alert('Page 5 Schedule 6A Item 4 Column D (NOLCO Applied Current Year) cannot be more than Page 5 Schedule 6A Item 4 Column A (Amount)');
            $_Id('frm1702RT:txtPg5Sc6AI4C5').value = "0";
        }
        else if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C5').value)) > WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C2').value))) {
            alert('Page 5 Schedule 6A Item 5 Column D (NOLCO Applied Current Year) cannot be more than Page 5 Schedule 6A Item 5 Column A (Amount)');
            $_Id('frm1702RT:txtPg5Sc6AI5C5').value = "0";
        }
        else if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C5').value)) > WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C2').value))) {
            alert('Page 5 Schedule 6A Item 6 Column D (NOLCO Applied Current Year) cannot be more than Page 5 Schedule 6A Item 6 Column A (Amount)');
            $_Id('frm1702RT:txtPg5Sc6AI6C5').value = "0";
        }
        else if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C5').value)) > WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C2').value))) {
            alert('Page 5 Schedule 6A Item 7 Column D (NOLCO Applied Current Year) cannot be more than Page 5 Schedule 6A Item 7 Column A (Amount)');
            $_Id('frm1702RT:txtPg5Sc6AI7C5').value = "0";
        }
        else if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C3').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C4').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C5').value)) > WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C2').value))) {
            alert('Page 5 Schedule 6A Item 5: Column B + C + D cannot be greater than Column A');
            $_Id('frm1702RT:txtPg5Sc6AI5C5').value = "0";
        }
        else if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C3').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C4').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C5').value)) > WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C2').value))) {
            alert('Page 5 Schedule 6A Item 6: Column B + C + D cannot be greater than Column A');
            $_Id('frm1702RT:txtPg5Sc6AI6C5').value = "0";
        }
        else if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C3').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C4').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C5').value)) > WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C2').value))) {
            alert('Page 5 Schedule 6A Item 6: Column B + C + D cannot be greater than Column A');
            $_Id('frm1702RT:txtPg5Sc6AI7C5').value = "0";
        }

        getDifference('txtPg5Sc6AI5C2', 'txtPg5Sc6AI5C3,txtPg5Sc6AI5C4,txtPg5Sc6AI5C5', 'txtPg5Sc6AI5C6');
        getDifference('txtPg5Sc6AI6C2', 'txtPg5Sc6AI6C3,txtPg5Sc6AI6C4,txtPg5Sc6AI6C5', 'txtPg5Sc6AI6C6');
        getDifference('txtPg5Sc6AI7C2', 'txtPg5Sc6AI7C3,txtPg5Sc6AI7C4,txtPg5Sc6AI7C5', 'txtPg5Sc6AI7C6');
        getSum('txtPg5Sc6AI4C5,txtPg5Sc6AI5C5,txtPg5Sc6AI6C5,txtPg5Sc6AI7C5', 'txtPg5Sc6AI8TotalNOLCO');
        allFormat('txtPg5Sc6AI8TotalNOLCO', 'txtPg2Pt4I37Nolco');

        computeP2Pt4I38();
        computeP2Pt4I40();
        computeP2Pt4I42();
        computeP2Pt4I43();
        computeP2Pt4I44();
        computeP2Pt4I46();
        computeP2Pt4I51();
        computeP2Pt5I52();
        computeP2Pt5I54();

        computeP5Sc6AI4C6();
        computePg5Sc6I3NetOperatingLoss();

    }
    function computePg5Sc6I3NetOperatingLoss() {
        var totalDeductions = $_Id('frm1702RT:txtPg5Sc6I2TotalDeductions');
        var netOperatingLoss = $_Id('frm1702RT:txtPg5Sc6I3NetOperatingLoss');
        var yearIncurred = $_Id('frm1702RT:txtPg5Sc6AI4C1');
        var amount = $_Id('frm1702RT:txtPg5Sc6AI4C2');
        getDifference('txtPg5Sc6I1GrossIncome', 'txtPg5Sc6I2TotalDeductions', 'txtPg5Sc6I3NetOperatingLoss');
        if (WholeNumWithComma(NumWithParenthesis(netOperatingLoss.value)) >= 0) {
            amount.value = "0";
            yearIncurred.value = "";
            
        }
        else {
            if ($_Id('frm1702RT:txtPg1I2Year').value != "") {
                yearIncurred.value = "20" + $_Id('frm1702RT:txtPg1I2Year').value;
            }
            amount.value = addCommas(Math.abs(WholeNumWithComma(NumWithParenthesis(netOperatingLoss.value))));
        }
        computeP5Sc6AI4C6();
    }
    function checkp5Sc6I3NetOperatingLoss() {
        var returnPeriod = $_Id('frm1702RT:txtPg1I2Year');
        var netOperatingLoss = $_Id('frm1702RT:txtPg5Sc6I3NetOperatingLoss');
        var p5Sc6AI4C1 = $_Id('frm1702RT:txtPg5Sc6AI4C1');
        var p5Sc6AI4C2 = $_Id('frm1702RT:txtPg5Sc6AI4C2');
        var p5Sc6AI5C1 = $_Id('frm1702RT:txtPg5Sc6AI5C1');
        var p5Sc6AI5C2 = $_Id('frm1702RT:txtPg5Sc6AI5C2');
        var p5Sc6AI6C1 = $_Id('frm1702RT:txtPg5Sc6AI6C1');
        var p5Sc6AI6C2 = $_Id('frm1702RT:txtPg5Sc6AI6C2');
        var p5Sc6AI7C1 = $_Id('frm1702RT:txtPg5Sc6AI7C1');
        var p5Sc6AI7C2 = $_Id('frm1702RT:txtPg5Sc6AI7C2');

        //Compute Net Operating Loss
        computeP5Sc6AI4C6();
        computeP5Sc6AI5C6(0);
        computeP5Sc6AI6C6(0);
        computeP5Sc6AI7C6(0);
    }

    function checkYear(year) {
        var p5Sc6AI4C1 = $_Id('frm1702RT:txtPg5Sc6AI4C1').value;
        var p5Sc6AI5C1 = $_Id('frm1702RT:txtPg5Sc6AI5C1').value;
        var p5Sc6AI6C1 = $_Id('frm1702RT:txtPg5Sc6AI6C1').value;
        var p5Sc6AI7C1 = $_Id('frm1702RT:txtPg5Sc6AI7C1').value;
        var returnPeriod = $_Id('frm1702RT:txtPg1I2Year');
        var dateOfIncorporation = $_Id('frm1702RT:txtPg1Pt1I8').value;
        var ctr = 0;
        var yearIncurred = new Array();
        yearIncurred[1] = p5Sc6AI4C1;
        yearIncurred[2] = p5Sc6AI5C1;
        yearIncurred[3] = p5Sc6AI6C1;
        yearIncurred[4] = p5Sc6AI7C1;

        if ($_Id('frm1702RT:ddlPg1I2Month').value == 0 || $_Id('frm1702RT:txtPg1I2Year').value == 0 && year.value != '') {
            alert('Please provide a valid Year Ended on Page 1 Item 2');
            year.value = '';
            goToControl(1, 'frm1702RT:txtPg1I2Year');
        }

        else if (dateOfIncorporation == "" && year.value != '') {
            alert('You must fill-up Page 1 Part 1 Item 8 (Date of Incorporation/Organization) before you can add Year Incurred.');
            year.value = '';
        }
        else if (year.value == "20" + returnPeriod.value) {
            alert('Page 5 Schedule 6A Item 5-7 Year Incurred cannot be equal to Page 1 Item 2 Year Ended.');
            year.value = '';
        }
        else if (year.value >= ("20" + returnPeriod.value - 3) && year.value <= "20" + returnPeriod.value) {
            dateOfIncorporationArray = dateOfIncorporation.split("/");

            if (dateOfIncorporationArray[2] <= year.value) {
                for (var i = 1; i < yearIncurred.length; i++) {
                    if (year.value == yearIncurred[i]) {
                        ctr = ctr + 1;
                    }
                }
                if (ctr != 1) {
                    alert('Year Incurred per row must be unique.');
                    year.value = '';
                }
            }
            else {
                alert('Year Incurred cannot be less than year in Page 1 Part 1 Item 8 (Date of Incorporation/Organization)');
                year.value = '';
            }
        }
        else if (year.value > "20" + returnPeriod.value) {
            alert('Year Incurred cannot be more than Page 1 Part 1 Item 2 (Year Ended)');
            year.value = '';
        }
        else if (year.value != '') {
            alert('Year Incurred Cannot be less than 3 years in Page 1 Item 2 (Year Ended)');
            year.value = '';
        }
    }

    function computeP5Sc6AI4C6() {
        getDifference('txtPg5Sc6AI4C2', 'txtPg5Sc6AI4C3,txtPg5Sc6AI4C4,txtPg5Sc6AI4C5', 'txtPg5Sc6AI4C6');
    }

    function computeP5Sc6AI5C6(fieldID) {
        if (fieldID != 0) {
            if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C3').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C4').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C5').value)) > WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C2').value))) {
                alert('Page 5 Schedule 6A Item 5: Column B + C + D cannot be greater than Column A');
                fieldID.value = "0";
            }
        }
        else if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C3').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C4').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C5').value)) > WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI5C2').value))) {
            alert('Page 5 Schedule 6A Item 5: Column B + C + D cannot be greater than Column A');
            $_Id('frm1702RT:txtPg5Sc6AI5C3').value = "0";
            $_Id('frm1702RT:txtPg5Sc6AI5C4').value = "0";
            $_Id('frm1702RT:txtPg5Sc6AI5C5').value = "0";
        }
        getDifference('txtPg5Sc6AI5C2', 'txtPg5Sc6AI5C3,txtPg5Sc6AI5C4,txtPg5Sc6AI5C5', 'txtPg5Sc6AI5C6');
    }
    function computeP5Sc6AI6C6(fieldID) {
        if (fieldID != 0) {
            if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C3').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C4').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C5').value)) > WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C2').value))) {
                alert('Page 5 Schedule 6A Item 6: Column B + C + D cannot be greater than Column A');
                fieldID.value = "0";
            }
        }
        else if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C3').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C4').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C5').value)) > WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI6C2').value))) {
            alert('Page 5 Schedule 6A Item 6: Column B + C + D cannot be greater than Column A');
            $_Id('frm1702RT:txtPg5Sc6AI6C3').value = "0";
            $_Id('frm1702RT:txtPg5Sc6AI6C4').value = "0";
            $_Id('frm1702RT:txtPg5Sc6AI6C5').value = "0";
        }
        getDifference('txtPg5Sc6AI6C2', 'txtPg5Sc6AI6C3,txtPg5Sc6AI6C4,txtPg5Sc6AI6C5', 'txtPg5Sc6AI6C6');
    }
    function computeP5Sc6AI7C6(fieldID) {
        if (fieldID != 0) {
            if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C3').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C4').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C5').value)) > WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C2').value))) {
                alert('Page 5 Schedule 6A Item 7: Column B + C + D cannot be greater than Column A');
                fieldID.value = "0";
            }
        }
        else if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C3').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C4').value)) + WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C5').value)) > WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg5Sc6AI7C2').value))) {
            alert('Page 5 Schedule 6A Item 7: Column B + C + D cannot be greater than Column A');
            $_Id('frm1702RT:txtPg5Sc6AI7C3').value = "0";
            $_Id('frm1702RT:txtPg5Sc6AI7C4').value = "0";
            $_Id('frm1702RT:txtPg5Sc6AI7C5').value = "0";
        }
        getDifference('txtPg5Sc6AI7C2', 'txtPg5Sc6AI7C3,txtPg5Sc6AI7C4,txtPg5Sc6AI7C5', 'txtPg5Sc6AI7C6');
    }
    //end of Page 5 js

    //Page 6 js
    function computeP6Sc7I12TotalTaxCredits() {
        getSum('txtPg6Sc7I1ExcessCredits,txtPg6Sc7I2IncomeTaxPaymentUnderMCIT,txtPg6Sc7I3IncomeTaxUnderRegular,txtPg6Sc7I4ExcessMCIT,txtPg6Sc7I5CreditableTaxWithheldFromPrevious,txtPg6Sc7I6CreditableTaxWithheldFor4thQuarter,txtPg6Sc7I7ForeignTaxCredits,txtPg6Sc7I8TaxPaidInReturn,txtPg6Sc7I9SpecialTaxCredits,txtPg5Sc7I10C2,txtPg6Sc7I11C2', 'txtPg6Sc7I12TotalTaxCredits');
        //(To Part V Item 53)
        //$_Id('frm1702RT:txtPg2Pt5I53AddSpecialTax').value = $_Id('txtPg6Sc7I9SpecialTaxCredits').value;
        allFormat('txtPg6Sc7I9SpecialTaxCredits', 'txtPg2Pt5I53AddSpecialTax');
        //(To Schedule 7 Item 4)
        //$_Id('frm1702RT:txtPg2Pt4I45LessTotalTax').value = $_Id('txtPg6Sc7I12TotalTaxCredits').value;
        allFormat('txtPg6Sc7I12TotalTaxCredits', 'txtPg2Pt4I45LessTotalTax');
        allFormat('txtPg6Sc7I12TotalTaxCredits', 'txtPg1Pt2I17TotalTaxCredits');
        computeP2Pt4I46();
        computeP2Pt4I51();
        computeP2Pt5I54();
    }

    function computeP6Sc8I1C4() {
        getDifference('txtPg6Sc8I1C3', 'txtPg6Sc8I1C2', 'txtPg6Sc8I1C4');
        if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg6Sc8I1C4').value)) < 0) {
            $_Id('frm1702RT:txtPg6Sc8I1C4').value = "0";
            computeP6Sc8I1C8();
        }
        computeP6Sc8I1C8();
    }
    function computeP6Sc8I2C4() {
        getDifference('txtPg6Sc8I2C3', 'txtPg6Sc8I2C2', 'txtPg6Sc8I2C4');
        if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg6Sc8I2C4').value)) < 0) {
            $_Id('frm1702RT:txtPg6Sc8I2C4').value = "0";
        }
        computeP6Sc8I2C8();
    }
    function computeP6Sc8I3C4() {
        getDifference('txtPg6Sc8I3C3', 'txtPg6Sc8I3C2', 'txtPg6Sc8I3C4');
        if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg6Sc8I3C4').value)) < 0) {
            $_Id('frm1702RT:txtPg6Sc8I3C4').value = "0";
        }
        computeP6Sc8I3C8();
    }


    function computeP6Sc8I1C8() {
        getDifference('txtPg6Sc8I1C4', 'txtPg6Sc8I1C5,txtPg6Sc8I1C6,txtPg6Sc8I1C7', 'txtPg6Sc8I1C8');
        if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg6Sc8I1C8').value)) < 0) {
            $_Id('frm1702RT:txtPg6Sc8I1C8').value = "0";
        }
        computeP6Sc8I4TotalExcessMCIT();
    }
    function computeP6Sc8I2C8() {
        getDifference('txtPg6Sc8I2C4', 'txtPg6Sc8I2C5,txtPg6Sc8I2C6,txtPg6Sc8I2C7', 'txtPg6Sc8I2C8');
        if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg6Sc8I2C8').value)) < 0) {
            $_Id('frm1702RT:txtPg6Sc8I2C8').value = "0";
        }
        computeP6Sc8I4TotalExcessMCIT();
    }
    function computeP6Sc8I3C8() {
        getDifference('txtPg6Sc8I3C4', 'txtPg6Sc8I3C5,txtPg6Sc8I3C6,txtPg6Sc8I3C7', 'txtPg6Sc8I3C8');
        if (WholeNumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg6Sc8I3C8').value)) < 0) {
            $_Id('frm1702RT:txtPg6Sc8I3C8').value = "0";
        }
        computeP6Sc8I4TotalExcessMCIT();
    }
    function computeP6Sc8I4TotalExcessMCIT() {
        getSum('txtPg6Sc8I1C7,txtPg6Sc8I2C7,txtPg6Sc8I3C7', 'txtPg6Sc8I4TotalExcessMCIT');
        //$_Id('frm1702RT:txtPg6Sc7I4ExcessMCIT').value = $_Id('frm1702RT:txtPg6Sc8I4TotalExcessMCIT').value;
        computeP2Pt4I44();
        computeP6Sc7I12TotalTaxCredits();
    }
    function computeP6Sc9I4Total() {
        getSum('txtPg6Sc9I1NetIncome,txtPg6Sc9I2C2,txtPg6Sc9I3C2', 'txtPg6Sc9I4Total');
        computeP6Sc9I10NetTaxableIncome();
    }
    function computeP6Sc9I9Total() {
        getSum('txtPg6Sc9I5C2,txtPg6Sc9I6C2,txtPg6Sc9I7C2,txtPg6Sc9I8C2', 'txtPg6Sc9I9Total');
        computeP6Sc9I10NetTaxableIncome();
    }
    function computeP6Sc9I10NetTaxableIncome() {
        getDifference('txtPg6Sc9I4Total', 'txtPg6Sc9I9Total', 'txtPg6Sc9I10NetTaxableIncome');
    }
    //end of Page 6 js

    //Page 7 js
    function computeP7Sc10I7TotalAssets() {
        getSum2('txtPg7Sc10I1CurrentAssets,txtPg7Sc10I2LongTermInvestment,txtPg7Sc10I3PropertyPlantEquipment,txtPg7Sc10I4LongTermReceivables,txtPg7Sc10I5IntangibleAssets,txtPg7Sc10I6OtherAssets', 'txtPg7Sc10I7TotalAssets');
    }
    function computeP7Sc10I12TotalLiabilities() {
        //(Sum of Items 12 & 16)
        getSum2('txtPg7Sc10I8CurrentLiabilities,txtPg7Sc10I9LongTermLiabilities,txtPg7Sc10I10DeferredCredits,txtPg7Sc10I11OtherLiabilities', 'txtPg7Sc10I12TotalLiabilities');
        getSum2('txtPg7Sc10I12TotalLiabilities,txtPg7Sc10I16TotalEquity', 'txtPg7Sc10I17TotalLiabilitiesEquity');
    }
    function computeP7Sc10I16TotalEquity() {
        getSum2('txtPg7Sc10I13CapitalStock,txtPg7Sc10I14AdditionalCapital,txtPg7Sc10I15RetainedEarnings', 'txtPg7Sc10I16TotalEquity');
        //(Sum of Items 12 & 16)
        getSum2('txtPg7Sc10I12TotalLiabilities,txtPg7Sc10I16TotalEquity', 'txtPg7Sc10I17TotalLiabilitiesEquity');
    }
    //end of Page 7 js

    //Page 8 js
    function computeTotalTaxSch1219() {
        getSum('txtPg8Sc12I1C3,txtPg8Sc12I2C3,txtPg8Sc12I3C3,txtPg8Sc12I4C3,txtPg8Sc12I9C1,txtPg8Sc12I9C2,txtPg8Sc12I15C1,txtPg8Sc12I15C2,txtPg8Sc12I18C1,txtPg8Sc12I18C2', 'txtSc12I19TotalFinalTaxWitheld');
    }
    function computeP8Sc13II8C1() {
        getSum('txtPg8Sc13I1ReturnOfPremium,txtPg8Sc13I5C1,txtPg8Sc13I5C2,txtPg8Sc13I7C1,txtPg8Sc13I7C2', 'txtPg8Sc13I8TotalIncome');
    }

    //iteration
    function computePg8Sc12I19I() {
        var subtotal = 0;
        var nameArray0 = $_Name('frm1702RT:txtPg8Sc12I19name-I');
        for (var i = 0; i < nameArray0.length; i++) {
            subtotal += WholeNumWithComma(nameArray0[i].value);
        }
        $_Id('hidden-frm1702RT:txtPg8Sc12-I').value = subtotal;
    }
    function computePg8Sc12I19II() {
        var subtotal1 = 0;
        var nameArray1 = $_Name('frm1702RT:txtPg8Sc12I9CA[]');
        for (var i = 0; i < nameArray1.length; i++) {
            subtotal1 += WholeNumWithComma(nameArray1[i].value);
        }

        var subtotal2 = 0;
        var nameArray2 = $_Name('frm1702RT:txtPg8Sc12I9CB[]');
        for (var i = 0; i < nameArray2.length; i++) {
            subtotal2 += WholeNumWithComma(nameArray2[i].value);
        }
        var subtotal = subtotal1 + subtotal2;
        $_Id('hidden-frm1702RT:txtPg8Sc12-II').value = subtotal;

    }
    function computePg8Sc12I19III() {
       
        var subtotal1 = 0;
        var nameArray1 = $_Name('frm1702RT:txtPg8Sc12I15CA[]');
        for (var i = 0; i < nameArray1.length; i++) {
            subtotal1 += WholeNumWithComma(nameArray1[i].value);
        }

        var subtotal2 = 0;
        var nameArray2 = $_Name('frm1702RT:txtPg8Sc12I15CB[]');
        for (var i = 0; i < nameArray2.length; i++) {
            subtotal2 += WholeNumWithComma(nameArray2[i].value);
        }
        var subtotal = subtotal1 + subtotal2;

        $_Id('hidden-frm1702RT:txtPg8Sc12-III').value = subtotal;

    }
    function computePg8Sc12I19IV() {
        var subtotal1 = 0;
        var nameArray1 = $_Name('frm1702RT:txtPg8Sc12I18CA[]');
        for (var i = 0; i < nameArray1.length; i++) {
            subtotal1 += WholeNumWithComma(nameArray1[i].value);
        }

        var subtotal2 = 0;
        var nameArray2 = $_Name('frm1702RT:txtPg8Sc12I18CB[]');
        for (var i = 0; i < nameArray2.length; i++) {
            subtotal2 += WholeNumWithComma(nameArray2[i].value);
        }
        var subtotal = subtotal1 + subtotal2;

        $_Id('hidden-frm1702RT:txtPg8Sc12-IV').value = subtotal;

    }
    function computePg8Sc12I19() {
        var txtPg8Sc12I1C3 = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc12I1C3').value);
        var txtPg8Sc12I2C3 = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc12I2C3').value);
        var txtPg8Sc12I3C3 = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc12I3C3').value);
        var txtPg8Sc12I4C3 = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc12I4C3').value);

        var colA_Pg8Sc12II = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc12I9C1').value);
        var colB_Pg8Sc12II = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc12I9C2').value);
        var colA_Pg8Sc12III = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc12I15C1').value);
        var colB_Pg8Sc12III = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc12I15C2').value);
        var colA_Pg8Sc12IV = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc12I18C1').value);
        var colB_Pg8Sc12IV = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc12I18C2').value);
        var total = 0;
        var subtotal1 = WholeNumWithComma($_Id('hidden-frm1702RT:txtPg8Sc12-I').value);
        var subtotal2 = WholeNumWithComma($_Id('hidden-frm1702RT:txtPg8Sc12-II').value);
        var subtotal3 = WholeNumWithComma($_Id('hidden-frm1702RT:txtPg8Sc12-III').value);
        var subtotal4 = WholeNumWithComma($_Id('hidden-frm1702RT:txtPg8Sc12-IV').value);
        var Pg8Sc12I4SubTotal = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc12I4SubTotal').value);
        total = subtotal1 + subtotal2 + subtotal3 + subtotal4 + txtPg8Sc12I1C3 + txtPg8Sc12I2C3 + txtPg8Sc12I3C3 + txtPg8Sc12I4C3 + Pg8Sc12I4SubTotal + colA_Pg8Sc12II + colB_Pg8Sc12II + colA_Pg8Sc12III + colB_Pg8Sc12III + colA_Pg8Sc12IV + colB_Pg8Sc12IV;

        $_Id('frm1702RT:txtSc12I19TotalFinalTaxWitheld').value = addCommas(NegativeValue(total));

    }

    function computePg8Sc13I8I() {
        
        var subtotal1 = 0;
        var nameArray1 = $_Name('frm1702RT:txtPg8Sc13I5CA[]');
        for (var i = 0; i < nameArray1.length; i++) {
            subtotal1 += WholeNumWithComma(nameArray1[i].value);
        }

        var subtotal2 = 0;
        var nameArray2 = $_Name('frm1702RT:txtPg8Sc13I5CB[]');
        for (var i = 0; i < nameArray2.length; i++) {
            subtotal2 += WholeNumWithComma(nameArray2[i].value);
        }
        var subtotal = subtotal1 + subtotal2;

        $_Id('hidden-frm1702RT:txtPg8Sc13-I').value = subtotal;
    }
    function computePg8Sc13I8II() {
        var subtotal1 = 0;
        var nameArray1 = $_Name('frm1702RT:txtPg8Sc13I7CA[]');
        for (var i = 0; i < nameArray1.length; i++) {
            subtotal1 += WholeNumWithComma(nameArray1[i].value);
        }

        var subtotal2 = 0;
        var nameArray2 = $_Name('frm1702RT:txtPg8Sc13I7CB[]');
        for (var i = 0; i < nameArray2.length; i++) {
            subtotal2 += WholeNumWithComma(nameArray2[i].value);
        }
        var subtotal = subtotal1 + subtotal2;

        $_Id('hidden-frm1702RT:txtPg8Sc13-II').value = subtotal;

    }
    function computePg8Sc13I8() {
        var colA_Pg8Sc13I = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc13I5C1').value);
        var colB_Pg8Sc13I = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc13I5C2').value);
        var colA_Pg8Sc13II = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc13I7C1').value);
        var colB_Pg8Sc13II = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc13I7C2').value);
        var subtotal1 = WholeNumWithComma($_Id('frm1702RT:txtPg8Sc13I1ReturnOfPremium').value);
        var subtotal2 = WholeNumWithComma($_Id('hidden-frm1702RT:txtPg8Sc13-I').value);
        var subtotal3 = WholeNumWithComma($_Id('hidden-frm1702RT:txtPg8Sc13-II').value);
        var total = subtotal1 + subtotal2 + subtotal3 + colA_Pg8Sc13I + colB_Pg8Sc13I + colA_Pg8Sc13II + colB_Pg8Sc13II;
        $_Id('frm1702RT:txtPg8Sc13I8TotalIncome').value = addCommas(NegativeValue(total));
    }

