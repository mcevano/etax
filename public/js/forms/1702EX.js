    function Save_Pg5S6I3PopTable() {
        numRows = document.getElementById("Pg5S6I3PopTable").rows.length;
        table = document.getElementById("Pg5S6I3PopTable");

        if (CheckEmptyDesc("Pg5S6I3PopTable", "3.", "save")) {

            Pg5S6I3_Col1 = new Array();
            Pg5S6I3_Col2 = new Array();

            for (x = 0; x < numRows; x++) {
                str = table.rows[x].cells[0].children[1].value;
                if ($.trim(str) != "") {
                    Pg5S6I3_Col1.push(table.rows[x].cells[0].children[1].value);
                    Pg5S6I3_Col2.push(table.rows[x].cells[1].children[0].value);
                }
            }

            Load_Pg5S6I3PopTable();

            if (Pg5S6I3_Col1.length == 0) {
                document.getElementById("frm1702EX:txtPg5S6I3Col1").value = "";
                $(document.getElementById("frm1702EX:txtPg5S6I3Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg5S6I3Col2")).prop('disabled', false);
                $('#btnPg5S6I3More').prop('disabled', true);
            }
            if (Pg5S6I3_Col1.length == 1) {
                document.getElementById("frm1702EX:txtPg5S6I3Col1").value = Pg5S6I3_Col1[0];
                document.getElementById("frm1702EX:txtPg5S6I3Col2").value = Pg5S6I3_Col2[0];
                $(document.getElementById("frm1702EX:txtPg5S6I3Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg5S6I3Col2")).prop('disabled', false);
                $('#btnPg5S6I3More').prop('disabled', false);
            }

            if (Pg5S6I3_Col1.length > 1) {
                document.getElementById("frm1702EX:txtPg5S6I3Col1").value = "OTHERS";
                $(document.getElementById("frm1702EX:txtPg5S6I3Col1")).prop('disabled', true);
                $(document.getElementById("frm1702EX:txtPg5S6I3Col2")).prop('disabled', true);
            }

            document.getElementById("frm1702EX:txtPg5S6I3Col2").value = document.getElementById("Pg5S6I3SubTotal").value;
            Compute_txtPg5S6I4Total();
            Compute_txtPg5S6I10NetTaxable();

            document.getElementById("Pg5S6I3PopLength").value = Pg5S6I3_Col1.length;
            alert('The items have been saved');
            return true;
        }
        else
            return false;
    }

    function Load_Pg5S6I3PopTable() {
        $("#Pg5S6I3PopTable tr").remove();
        var i = Pg5S6I3_Col1.length;
        if (Pg5S6I3_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_Pg5S6I3PopTable();
                document.getElementById("frm1702EX:txtPg5S6I3_" + (x + 1) + "Col1").value = Pg5S6I3_Col1[x];
                document.getElementById("frm1702EX:txtPg5S6I3_" + (x + 1) + "Col2").value = FormatValue(Pg5S6I3_Col2[x]);
            }
        }

        ConditionPrint("#Pg5S6I3Pop");
        Sum_Pg5S6I3();
    }

    function FixNumber_Pg5S6I3PopTable() {
        var i = document.getElementById("Pg5S6I3PopTable").rows.length;
        var table = document.getElementById("Pg5S6I3PopTable");
        for (x = 0; x < i; x++) {
            numbering = table.rows[x].cells[0].children[0];
            $(numbering).html("3." + (x + 1));
        }
    }

    function AddRow_Pg5S6I3PopTable() {
        var i = document.getElementById("Pg5S6I3PopTable").rows.length;
        var table = document.getElementById("Pg5S6I3PopTable");

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.innerHTML = '<tr><td class="tblFormTd" align="center" style="width:60%;"><span style="font-weight: bold; font-size: small;">&nbsp;3.' + (i + 1) + '</span> <input type="text" onkeypress="return Code(this)" onblur=" return capitalize(this), onBlurIterate(this)" onfocus="onFocusIterate(this)" maxlength="30" size="50" id="frm1702EX:txtPg5S6I3_' + (i + 1) + 'Col1" name="frm1702EX:txtPg5S6I3_Col1[]"/></td>';
        cell2.innerHTML = '<td class="tblFormTd" align="center" style="width:30%;"><input type="text" onfocus="onFocusIterate(this)" id="frm1702EX:txtPg5S6I3_' + (i + 1) + 'Col2" name="frm1702EX:txtPg5S6I3_Col2[]" style="text-align: right;" size="20" onblur="onBlurIterate(this), toComma(this), Sum_Pg5S6I3()" onkeypress="return wholenumber(this, event)"  maxlength="12" /></td>';
        cell3.innerHTML = '<td class="tblFormTd" align="center" style="width:10%;"><input type="button" value="Remove" onclick="deleteRow(this),FixNumber_Pg5S6I3PopTable(), Sum_Pg5S6I3() "/></td></tr>';
    }

    //Summation
    function Sum_Pg5S6I3() {
        var total = 0;

        numRows = document.getElementById("Pg5S6I3PopTable").rows.length;
        table = document.getElementById("Pg5S6I3PopTable");

        for (x = 0; x < numRows; x++) {
            total += removeCommaParenthesis(table.rows[x].cells[1].children[0].id) * 1;
        }
        document.getElementById("Pg5S6I3SubTotal").disabled = true;
        document.getElementById("Pg5S6I3SubTotal").value = FormatValue(total);

    }

    var Pg5S6I6_Col1 = new Array();
    var Pg5S6I6_Col2 = new Array();

    function Check_Pg5S6I6() {
        if ($.trim(document.getElementById("frm1702EX:txtPg5S6I6Col1").value) == "" || document.getElementById("frm1702EX:txtPg5S6I6Col2").value * 1 == 0 ||
            $.trim(document.getElementById("frm1702EX:txtPg5S6I5Col1").value) == "" || document.getElementById("frm1702EX:txtPg5S6I5Col2").value * 1 == 0) {
            $('#btnPg5S6I6More').prop('disabled', true);
        }
        else {
            $('#btnPg5S6I6More').prop('disabled', false);
        }
    }

    function Set_Pg5S6I6() {
        if (Pg5S6I6_Col1.length == 0) {
            Pg5S6I6_Col1[0] = document.getElementById("frm1702EX:txtPg5S6I6Col1").value;
            Pg5S6I6_Col2[0] = document.getElementById("frm1702EX:txtPg5S6I6Col2").value;

        }
    }

    function Save_Pg5S6I6PopTable() {
        numRows = document.getElementById("Pg5S6I6PopTable").rows.length;
        table = document.getElementById("Pg5S6I6PopTable");

        if (CheckEmptyDesc("Pg5S6I6PopTable", "6.", "save")) {

            Pg5S6I6_Col1 = new Array();
            Pg5S6I6_Col2 = new Array();

            for (x = 0; x < numRows; x++) {
                str = table.rows[x].cells[0].children[1].value;
                if ($.trim(str) != "") {
                    Pg5S6I6_Col1.push(table.rows[x].cells[0].children[1].value);
                    Pg5S6I6_Col2.push(table.rows[x].cells[1].children[0].value);
                }
            }

            Load_Pg5S6I6PopTable();

            if (Pg5S6I6_Col1.length == 0) {
                document.getElementById("frm1702EX:txtPg5S6I6Col1").value = "";
                $(document.getElementById("frm1702EX:txtPg5S6I6Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg5S6I6Col2")).prop('disabled', false);
                $('#btnPg5S6I6More').prop('disabled', true);
            }
            if (Pg5S6I6_Col1.length == 1) {
                document.getElementById("frm1702EX:txtPg5S6I6Col1").value = Pg5S6I6_Col1[0];
                document.getElementById("frm1702EX:txtPg5S6I6Col2").value = Pg5S6I6_Col2[0];
                $(document.getElementById("frm1702EX:txtPg5S6I6Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg5S6I6Col2")).prop('disabled', false);
                $('#btnPg5S6I6More').prop('disabled', false);
            }

            if (Pg5S6I6_Col1.length > 1) {
                document.getElementById("frm1702EX:txtPg5S6I6Col1").value = "OTHERS";
                $(document.getElementById("frm1702EX:txtPg5S6I6Col1")).prop('disabled', true);
                $(document.getElementById("frm1702EX:txtPg5S6I6Col2")).prop('disabled', true);
            }

            document.getElementById("frm1702EX:txtPg5S6I6Col2").value = document.getElementById("Pg5S6I6SubTotal").value;
            Compute_txtPg5S6I9Col2();
            Compute_txtPg5S6I10NetTaxable();

            document.getElementById("Pg5S6I6PopLength").value = Pg5S6I6_Col1.length;
            alert('The items have been saved');
            return true;
        }
        else
            return false;
    }

    function Load_Pg5S6I6PopTable() {
        $("#Pg5S6I6PopTable tr").remove();
        var i = Pg5S6I6_Col1.length;
        if (Pg5S6I6_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_Pg5S6I6PopTable();
                document.getElementById("frm1702EX:txtPg5S6I6_" + (x + 1) + "Col1").value = Pg5S6I6_Col1[x];
                document.getElementById("frm1702EX:txtPg5S6I6_" + (x + 1) + "Col2").value = FormatValue(Pg5S6I6_Col2[x]);
            }
        }
        ConditionPrint("#Pg5S6I6Pop");
        Sum_Pg5S6I6();
    }

    function FixNumber_Pg5S6I6PopTable() {
        var i = document.getElementById("Pg5S6I6PopTable").rows.length;
        var table = document.getElementById("Pg5S6I6PopTable");
        for (x = 0; x < i; x++) {
            numbering = table.rows[x].cells[0].children[0];
            $(numbering).html("6." + (x + 1));
        }
    }

    function AddRow_Pg5S6I6PopTable() {
        var i = document.getElementById("Pg5S6I6PopTable").rows.length;
        var table = document.getElementById("Pg5S6I6PopTable");

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.innerHTML = '<tr><td class="tblFormTd" align="center" style="width:60%;"><span style="font-weight: bold; font-size: small;">&nbsp;6.' + (i + 1) + '</span> <input type="text" onfocus="onFocusIterate(this)"  onkeypress="return Code(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="30" size="50" id="frm1702EX:txtPg5S6I6_' + (i + 1) + 'Col1" name="frm1702EX:txtPg5S6I6_Col1[]"/></td>';
        cell2.innerHTML = '<td class="tblFormTd" align="center" style="width:30%;"><input type="text" onfocus="onFocusIterate(this)" id="frm1702EX:txtPg5S6I6_' + (i + 1) + 'Col2" name="frm1702EX:txtPg5S6I6_Col2[]" style="text-align: right;" size="20" onblur="onBlurIterate(this), toComma(this), Sum_Pg5S6I6()" onkeypress="return wholenumber(this, event)"  maxlength="12" /></td>';
        cell3.innerHTML = '<td class="tblFormTd" align="center" style="width:10%;"><input type="button" value="Remove" onclick="deleteRow(this),FixNumber_Pg5S6I6PopTable(), Sum_Pg5S6I6()"/></td></tr>';
    }

    //Summation
    function Sum_Pg5S6I6() {
        var total = 0;

        numRows = document.getElementById("Pg5S6I6PopTable").rows.length;
        table = document.getElementById("Pg5S6I6PopTable");

        for (x = 0; x < numRows; x++) {
            total += removeCommaParenthesis(table.rows[x].cells[1].children[0].id) * 1;
        }
        document.getElementById("Pg5S6I6SubTotal").disabled = true;
        document.getElementById("Pg5S6I6SubTotal").value = FormatValue(total);

    }

    var Pg5S6I8_Col1 = new Array();
    var Pg5S6I8_Col2 = new Array();

    function Check_Pg5S6I8() {
        //  var isNotEmpty = true;
        if ($.trim(document.getElementById("frm1702EX:txtPg5S6I8Col1").value) == "" || document.getElementById("frm1702EX:txtPg5S6I8Col2").value * 1 == 0 ||
            $.trim(document.getElementById("frm1702EX:txtPg5S6I7Col1").value) == "" || document.getElementById("frm1702EX:txtPg5S6I7Col2").value * 1 == 0) {
            $('#btnPg5S6I8More').prop('disabled', true);
        }
        else {
            $('#btnPg5S6I8More').prop('disabled', false);
        }
    }

    function Set_Pg5S6I8() {
        if (Pg5S6I8_Col1.length == 0) {
            Pg5S6I8_Col1[0] = document.getElementById("frm1702EX:txtPg5S6I8Col1").value;
            Pg5S6I8_Col2[0] = document.getElementById("frm1702EX:txtPg5S6I8Col2").value;
        }
    }

    function Save_Pg5S6I8PopTable() {
        numRows = document.getElementById("Pg5S6I8PopTable").rows.length;
        table = document.getElementById("Pg5S6I8PopTable");

        if (CheckEmptyDesc("Pg5S6I8PopTable", "8.", "save")) {
            Pg5S6I8_Col1 = new Array();
            Pg5S6I8_Col2 = new Array();

            for (x = 0; x < numRows; x++) {
                str = table.rows[x].cells[0].children[1].value;
                if ($.trim(str) != "") {
                    Pg5S6I8_Col1.push(table.rows[x].cells[0].children[1].value);
                    Pg5S6I8_Col2.push(table.rows[x].cells[1].children[0].value);
                }
            }

            Load_Pg5S6I8PopTable();

            if (Pg5S6I8_Col1.length == 0) {
                document.getElementById("frm1702EX:txtPg5S6I8Col1").value = "";
                $(document.getElementById("frm1702EX:txtPg5S6I8Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg5S6I8Col2")).prop('disabled', false);
                $('#btnPg5S6I8More').prop('disabled', true);
            }
            if (Pg5S6I8_Col1.length == 1) {
                document.getElementById("frm1702EX:txtPg5S6I8Col1").value = Pg5S6I8_Col1[0];
                document.getElementById("frm1702EX:txtPg5S6I8Col2").value = Pg5S6I8_Col2[0];
                $(document.getElementById("frm1702EX:txtPg5S6I8Col1")).prop('disabled', false);
                $(document.getElementById("frm1702EX:txtPg5S6I8Col2")).prop('disabled', false);
                $('#btnPg5S6I8More').prop('disabled', false);
            }

            if (Pg5S6I8_Col1.length > 1) {
                document.getElementById("frm1702EX:txtPg5S6I8Col1").value = "OTHERS";
                $(document.getElementById("frm1702EX:txtPg5S6I8Col1")).prop('disabled', true);
                $(document.getElementById("frm1702EX:txtPg5S6I8Col2")).prop('disabled', true);
            }

            document.getElementById("frm1702EX:txtPg5S6I8Col2").value = document.getElementById("Pg5S6I8SubTotal").value;
            Compute_txtPg5S6I9Col2();
            Compute_txtPg5S6I10NetTaxable();
            document.getElementById("Pg5S6I8PopLength").value = Pg5S6I8_Col1.length;
            alert('The items have been saved');
            return true;
        }
        else
            return false;

    }

    function Load_Pg5S6I8PopTable() {
        $("#Pg5S6I8PopTable tr").remove();
        var i = Pg5S6I8_Col1.length;
        if (Pg5S6I8_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_Pg5S6I8PopTable();
                document.getElementById("frm1702EX:txtPg5S6I8_" + (x + 1) + "Col1").value = Pg5S6I8_Col1[x];
                document.getElementById("frm1702EX:txtPg5S6I8_" + (x + 1) + "Col2").value = FormatValue(Pg5S6I8_Col2[x]);
            }
        }
        ConditionPrint("#Pg5S6I8Pop");
        Sum_Pg5S6I8();
    }

    function FixNumber_Pg5S6I8PopTable() {
        var i = document.getElementById("Pg5S6I8PopTable").rows.length;
        var table = document.getElementById("Pg5S6I8PopTable");
        for (x = 0; x < i; x++) {
            numbering = table.rows[x].cells[0].children[0];
            $(numbering).html("8." + (x + 1));
        }
    }

    function AddRow_Pg5S6I8PopTable() {
        var i = document.getElementById("Pg5S6I8PopTable").rows.length;
        var table = document.getElementById("Pg5S6I8PopTable");

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.innerHTML = '<tr><td class="tblFormTd" align="center" style="width:60%;"><span style="font-weight: bold; font-size: small;">&nbsp;8.' + (i + 1) + '</span> <input type="text" onfocus="onFocusIterate(this)"  onkeypress="return Code(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="30" size="50" id="frm1702EX:txtPg5S6I8_' + (i + 1) + 'Col1" name="frm1702EX:txtPg5S6I8_Col1[]"/></td>';
        cell2.innerHTML = '<td class="tblFormTd" align="center" style="width:30%;"><input type="text" onfocus="onFocusIterate(this)" id="frm1702EX:txtPg5S6I8_' + (i + 1) + 'Col2" name="frm1702EX:txtPg5S6I8_Col2[]" style="text-align: right;" size="20" onblur="onBlurIterate(this), toComma(this), Sum_Pg5S6I8()" onkeypress="return wholenumber(this, event)"  maxlength="12" /></td>';
        cell3.innerHTML = '<td class="tblFormTd" align="center" style="width:10%;"><input type="button" value="Remove" onclick="deleteRow(this),FixNumber_Pg5S6I8PopTable(), Sum_Pg5S6I8() "/></td></tr>';
    }

    //Summation
    function Sum_Pg5S6I8() {
        var total = 0;

        numRows = document.getElementById("Pg5S6I8PopTable").rows.length;
        table = document.getElementById("Pg5S6I8PopTable");

        for (x = 0; x < numRows; x++) {
            total += removeCommaParenthesis(table.rows[x].cells[1].children[0].id) * 1;
        }
        document.getElementById("Pg5S6I8SubTotal").disabled = true;
        document.getElementById("Pg5S6I8SubTotal").value = FormatValue(total);

    }
    function deleteDiv(btn) {
        $(btn).closest('div').remove();
    }

    function Save_popDiv(saveDivId, popDivId) {

        $inputs = $(popDivId).find('input[type="text"]').each(function (idx, elem) {
            var $elem = $(elem);
            $(saveDivId + " input[id='" + $elem.attr("id") + "']").val($elem.val());
            // alert($elem.val());
        });

        $inputs.blur(function () {
            var $this = $(this);

        });

        $inputs.trigger('blur'); 
    }
    function Get_Div(saveDivId, popDivId) {

        $(saveDivId).find('input[type="text"]').each(function (idx, elem) {
            var $elem = $(elem);

            $(popDivId + " input[id='" + $elem.attr("id") + "']").val($elem.val());
            //$elem.val($(popDivId + " input[id='" + $elem.attr("id") + "']").val());
        });
        $schedTable = null;
        $origSchedTable = null;
    }
    function Empty_Temp(popDivId) {
        $(popDivId).html('');
    }
    function cancelModal2(PopDiv, IterationDiv) {
        var answer = confirm("Don't save changes?");
        if (answer == true) {
            closeDialog(PopDiv);
            $(IterationDiv).html('');
        }
        else {
            return;
        }
    }

    function CheckEmptyDivDesc(div, tabledesc) {
        var length = $(div + " div").length;

        for (i = 0; i < length; i++) {

            var currentDivTable = $(div + " div").eq(i).find('table');
            if ($.trim(currentDivTable.eq(0).find("tr input")[0].value) == "") {
                alert("Cannot add row. There is an empty description on " + LetterIteration((i * 2) + 3) + tabledesc + ((i * 2) + 3));
                return false;
            }
            else if ($.trim(currentDivTable.eq(0).find("tr input")[1].value) == "") {
                alert("Cannot add row. There is an empty description on " + LetterIteration((i * 2) + 4) + tabledesc + ((i * 2) + 4));
                return false;
            }
        }
        return true;
    }

    function ConditionAddDiv(div, tabledesc, AddDiv) {
        if (CheckEmptyDivDesc(div, tabledesc)) {
            AddDiv();
        }
    }

    function ConditionSave(saveFunction, divPopUp, popDivId) {
        if (saveFunction()) {
            closeDialog(divPopUp);
            Empty_Temp(popDivId);
        }
    }

    function maskDate(elem) {
        if (elem.value.length == 2 || elem.value.length == 4)
            return elem += elemt + "/";
    }

    function checkBtnPg7Pt2More() {
        checkPg7AddMore("frm1702EX:txtPg7Sc9I5DescriptionofPropertyC1", "frm1702EX:txtPg7Sc9I5DescriptionofPropertyC2", "btnPg7S9Pt2More");
    }
    function checkBtnPg7Pt3More() {

        checkPg7AddMore("frm1702EX:txtPg7Sc9I10PSCSC1", "frm1702EX:txtPg7Sc9I10PSCSC2", "btnPg7S9Pt3More");
    }
    function checkBtnPg7Pt4More() {

        checkPg7AddMore("frm1702EX:txtPg7Sc9I16OtherIncomeC1", "frm1702EX:txtPg7Sc9I16OtherIncomeC2", "btnPg7S9Pt4More");
    }
    function checkBtnPg7Pt5More() {

        checkPg7AddMore("frm1702EX:txtPg7Sc10I2DescriptionofPropertyC1", "frm1702EX:txtPg7Sc10I2DescriptionofPropertyC2", "btnPg7S9Pt5More");
    }
    function checkBtnPg7Pt6More() {

        checkPg7AddMore("frm1702EX:txtPg7Sc10I6OtherExemptC1", "frm1702EX:txtPg7Sc10I6OtherExemptC2", "btnPg7S9Pt6More");
    }

    function checkPg7AddMore(txt1, txt2, button) {
        if ($.trim(document.getElementById(txt1).value) != "" && $.trim(document.getElementById(txt2).value) != "") {

            document.getElementById(button).disabled = false;
        }
        else
            document.getElementById(button).disabled = true;
    }

    var Pg7S9Pt1_Col1 = new Array();
    var Pg7S9Pt1_Col2 = new Array();
    var Pg7S9Pt1_Col3 = new Array();
    var Pg7S9Pt1_Col4 = new Array();

    function Save_Pg7S9Pt1PopTable() {
        numRows = document.getElementById("Pg7S9Pt1PopTable").rows.length;
        table = document.getElementById("Pg7S9Pt1PopTable");


        if (CheckEmptyDesc("Pg7S9Pt1PopTable", "4.", "save")) {
            Pg7S9Pt1_Col1 = new Array();
            Pg7S9Pt1_Col2 = new Array();
            Pg7S9Pt1_Col3 = new Array();
            Pg7S9Pt1_Col4 = new Array();

            for (x = 0; x < numRows; x++) {
                str = table.rows[x].cells[0].children[1].value;
                if ($.trim(str) != "") {
                    Pg7S9Pt1_Col1.push(table.rows[x].cells[0].children[1].value);
                    Pg7S9Pt1_Col2.push(table.rows[x].cells[1].children[0].value);
                    Pg7S9Pt1_Col3.push(table.rows[x].cells[2].children[0].value);
                    Pg7S9Pt1_Col4.push(table.rows[x].cells[3].children[0].value);
                }
            }

            Load_Pg7S9Pt1PopTable();
            Compute_Page7_Sched9_Item19();

            document.getElementById("Pg7S9Pt1PopLength").value = Pg7S9Pt1_Col1.length;

            alert('The items have been saved');
            return true;
        }
        else
            return false;
    }

    function Load_Pg7S9Pt1PopTable() {
        $("#Pg7S9Pt1PopTable tr").remove();
        var i = Pg7S9Pt1_Col1.length;
        if (Pg7S9Pt1_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_Pg7S9Pt1PopTable();
                document.getElementById("frm1702EX:txtPg7S9Pt1_" + (x + 1) + "Col1").value = Pg7S9Pt1_Col1[x];
                document.getElementById("frm1702EX:txtPg7S9Pt1_" + (x + 1) + "Col2").value = FormatValue(Pg7S9Pt1_Col2[x]);
                document.getElementById("frm1702EX:txtPg7S9Pt1_" + (x + 1) + "Col3").value = FormatValue(Pg7S9Pt1_Col3[x]);
                document.getElementById("frm1702EX:txtPg7S9Pt1_" + (x + 1) + "Col4").value = FormatValue(Pg7S9Pt1_Col4[x]);
            }
        }
        ConditionPrint("#Pg7S9Pt1Pop");
        Sum_Pg7S9Pt1();
    }

    function FixNumber_Pg7S9Pt1PopTable() {
        var i = document.getElementById("Pg7S9Pt1PopTable").rows.length;
        var table = document.getElementById("Pg7S9Pt1PopTable");
        for (x = 0; x < i; x++) {
            numbering = table.rows[x].cells[0].children[0];
            $(numbering).html("4." + (x + 1));
        }
    }

    function AddRow_Pg7S9Pt1PopTable() {
        var i = document.getElementById("Pg7S9Pt1PopTable").rows.length;
        var table = document.getElementById("Pg7S9Pt1PopTable");

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);

        cell1.innerHTML = '<tr><td class="tblFormTd" align="center" style="width:15%;"><span style="font-weight: bold; font-size: small;">&nbsp;4.' + (i + 1) + '</span> <input type="text" onfocus="onFocusIterate(this)"  onkeypress="return Code(this)" onblur="return capitalize(this), onBlurIterate(this)" size="20" id="frm1702EX:txtPg7S9Pt1_' + (i + 1) + 'Col1" name="frm1702EX:txtPg7S9Pt1_Col1[]" maxlength="20"/></td>';

        cell2.innerHTML = '<td class="tblFormTd" align="center" style="width:25%;"><input type="text" onfocus="onFocusIterate(this)" id="frm1702EX:txtPg7S9Pt1_' + (i + 1) + 'Col2" name="frm1702EX:txtPg7S9Pt1_Col2[]" style="text-align: right;" size="20" onblur="onBlurIterate(this), toComma(this), Sum_Pg7S9Pt1()" onkeypress="return wholenumber(this, event)"  maxlength="12" /></td>';
        cell3.innerHTML = '<td class="tblFormTd" align="center" style="width:25%;"><input type="text" onfocus="onFocusIterate(this)" id="frm1702EX:txtPg7S9Pt1_' + (i + 1) + 'Col3" name="frm1702EX:txtPg7S9Pt1_Col3[]"  style="text-align: right;" size="20" onblur="onBlurIterate(this), toComma(this), Sum_Pg7S9Pt1()" onkeypress="return wholenumber(this, event)"  maxlength="12" /></td>';
        cell4.innerHTML = '<td class="tblFormTd" align="center" style="width:25%;"><input type="text" onfocus="onFocusIterate(this)" id="frm1702EX:txtPg7S9Pt1_' + (i + 1) + 'Col4" name="frm1702EX:txtPg7S9Pt1_Col4[]"  style="text-align: right;" size="20" onblur="onBlurIterate(this), toComma(this), Sum_Pg7S9Pt1()" onkeypress="return wholenumber(this, event)"  maxlength="12" /></td>';
        cell5.innerHTML = '<td class="tblFormTd" align="center" style="width:10%;"><input type="button" value="Remove" onclick="deleteRow(this),FixNumber_Pg7S9Pt1PopTable(), Sum_Pg7S9Pt1()"/></td></tr>';
    }

    //Summation
    function Sum_Pg7S9Pt1() {
        var total = 0;

        numRows = document.getElementById("Pg7S9Pt1PopTable").rows.length;
        table = document.getElementById("Pg7S9Pt1PopTable");

        for (x = 0; x < numRows; x++) {
            total += removeCommaParenthesis(table.rows[x].cells[3].children[0].id) * 1;
        }
        document.getElementById("Pg7S9Pt1SubTotal").disabled = true;
        document.getElementById("Pg7S9Pt1SubTotal").value = FormatValue(total);
    }


    function Save_Pg7S9Pt2PopDiv() {
        FixId_Pg7S9Pt2PopDiv();

        var length = $("#Pg7S9Pt2IterationDiv div").length;
        var isValid = true;

        for (i = 0; i < length; i++) {
            $("#Pg7S9Pt2IterationDiv div")[i].setAttribute("id", "Pg7S9Pt2Div_" + (i));
            var currentDivTable = $("#Pg7S9Pt2IterationDiv div").eq(i).find('table');

            if (($.trim(currentDivTable.eq(0).find("tr input")[0].value) == "" && (currentDivTable.eq(0).find("tr input")[8].value * 1 != 0)) ||
                ($.trim(currentDivTable.eq(0).find("tr input")[1].value) == "" && (currentDivTable.eq(0).find("tr input")[9].value * 1 != 0))) {
                alert('File not saved.You have entered an amount with no Description of property.');
                isValid = false;
            }

            if (($.trim(currentDivTable.eq(0).find("tr input")[0].value) != "" && (currentDivTable.eq(0).find("tr input")[8].value * 1 == 0)) ||
                ($.trim(currentDivTable.eq(0).find("tr input")[1].value) != "" && (currentDivTable.eq(0).find("tr input")[9].value * 1 == 0))) {
                alert('File not saved.You have entered a Description of property. The amount must not be zero.');
                isValid = false;
            }
        }

        if (isValid) {
            $('#Pg7S9Pt2IterationDivSaver').html($('#Pg7S9Pt2IterationDiv').html());

            Save_popDiv('#Pg7S9Pt2IterationDivSaver', '#Pg7S9Pt2IterationDiv');
            Compute_Page7_Sched9_Item19();

            var length = $("#Pg7S9Pt2IterationDivSaver div").length;
            document.getElementById("Pg7S9Pt2PopLength").value = length;
            alert('Items have been Saved');
        }
        return isValid;
    }

    function Load_Pg7S9Pt2PopDiv() {

        $('#Pg7S9Pt2IterationDiv').html($('#Pg7S9Pt2IterationDivSaver').html());
        Get_Div('#Pg7S9Pt2IterationDivSaver', '#Pg7S9Pt2IterationDiv');
        //  AddDiv_Pg7S9Pt2PopDiv();
        ConditionPrint("#Pg7S9Pt2Pop");

    }

    
    function FixId_Pg7S9Pt2PopDiv() {

        var length = $("#Pg7S9Pt2IterationDiv div").length;

        for (i = 0; i < length; i++) {
            $("#Pg7S9Pt2IterationDiv div")[i].setAttribute("id", "Pg7S9Pt2Div_" + (i));
            var currentDivTable = $("#Pg7S9Pt2IterationDiv div").eq(i).find('table');

            // First column header
            currentDivTable.eq(0).find("tr th label").eq(0).html(LetterIteration((i * 2) + 3));
            currentDivTable.eq(0).find("tr th label").eq(1).html((i * 2) + 3);
            //second column header
            currentDivTable.eq(0).find("tr th label").eq(2).html(LetterIteration((i * 2) + 4));
            currentDivTable.eq(0).find("tr th label").eq(3).html((i * 2) + 4);
            //DescriptionofProperty
            currentDivTable.eq(0).find("tr input")[0].setAttribute("id", "frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr input")[1].setAttribute("id", "frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_" + ((i * 2) + 4));
            //OCT
            currentDivTable.eq(0).find("tr input")[2].setAttribute("id", "frm1702EX:txtPg7Sc9I6OCTC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr input")[3].setAttribute("id", "frm1702EX:txtPg7Sc9I6OCTC_" + ((i * 2) + 4));
            //CAR
            currentDivTable.eq(0).find("tr input")[4].setAttribute("id", "frm1702EX:txtPg7Sc9I7CARC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr input")[5].setAttribute("id", "frm1702EX:txtPg7Sc9I7CARC_" + ((i * 2) + 4));
            //ActualAmount
            currentDivTable.eq(0).find("tr input")[6].setAttribute("id", "frm1702EX:txtPg7Sc9I8ActualAmountC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr input")[7].setAttribute("id", "frm1702EX:txtPg7Sc9I8ActualAmountC_" + ((i * 2) + 4));
            //FinalTax
            currentDivTable.eq(0).find("tr input")[8].setAttribute("id", "frm1702EX:txtPg7Sc9I9FinalTaxC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr input")[9].setAttribute("id", "frm1702EX:txtPg7Sc9I9FinalTaxC_" + ((i * 2) + 4));
        }

    }

    function AddDiv_Pg7S9Pt2PopDiv() {
        // var myDiv = document.getElementById("Pg7S9Pt2IterationDiv");        
        i = $("#Pg7S9Pt2IterationDiv div").length;

        $('#Pg7S9Pt2IterationDiv').append('<div id="Pg7S9Pt2Div_' + (i) + '" >'
                                        + '<table id="frm1702-RT:tblSchedule12II" style="width: 100%; background: #fff;">'
                                        + '<tr>'
                                        + '<th style="width: 300px; text-align: left;">'
                                        + 'II) Sale / Exchange of Real Properties'
                                        + '</th>'
                                        + '<th style="width: 190px;">'
                                        + '<label >' + LetterIteration((i * 2) + 3) + '</label>' + ') Sale / Exchange # <label >' + ((i * 2) + 3) + '</label>'
                                        + '</th>'
                                        + '<th style="width: 190px;">'
                                        + '<label >' + LetterIteration((i * 2) + 4) + '</label>' + ') Sale / Exchange # <label >' + ((i * 2) + 4) + '</label>'
                                        + '</th>'
                                        + '</tr>'
                                        + '<tr>'
                                        + '<td style="width: 300px; text-align: left;">'
                                        + '<span class="smallBold">5</span> Description of Property <span class="helpText">'
                                        + '</span><span class="xsmall"></span>'
                                        + '</td>'
                                        + '<td style="width: 190px;">'
                                        + '<input type="text" id="frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_1[]" '
                                        + 'tabindex="' + (i + "0" + 1) + '"'
                                        + 'size="30" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)" />'
                                        + '</td>'
                                        + '<td style="width: 190px;">'
                                        + '<input type="text" id="frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_2[]" '
                                         + 'tabindex="' + (i + "1" + 1) + '"'
                                        + 'size="30" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)"/>'
                                        + '</td>'
                                        + '</tr>'
                                        + '<tr>'
                                        + '<td style="width: 300px; text-align: left;">'
                                        + '<span class="smallBold">6</span> OCT/TCT/CCT/Tax Declaration No.'
                                        + '</td>'
                                        + '<td style="width: 190px;">'
                                        + '<input type="text" id="frm1702EX:txtPg7Sc9I6OCTC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc9I6OCTC_1[]" '
                                        + 'tabindex="' + (i + "0" + 2) + '"'
                                        + 'size="30" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" onkeypress="return wholenumber(this, event)" maxlength="16" onkeypress="return Code(this)" />'
                                        + '</td>'
                                        + '<td style="width: 190px;">'
                                        + '<input type="text" id="frm1702EX:txtPg7Sc9I6OCTC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc9I6OCTC_2[]"'
                                        + 'tabindex="' + (i + "1" + 2) + '"'
                                        + 'size="30" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" onkeypress="return wholenumber(this, event)" maxlength="16" onkeypress="return Code(this)" />'
                                        + '</td>'
                                        + '</tr>'
                                        + '<tr>'
                                        + '<td style="width: 300px; text-align: left;">'
                                        + '<span class="smallBold">7</span> Certificate Authorizing Registration (CAR) No.'
                                        + '</td>'
                                        + '<td style="width: 190px;">'
                                        + '<input type="text" id="frm1702EX:txtPg7Sc9I7CARC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc9I7CARC_1[]"'
                                        + 'tabindex="' + (i + "0" + 3) + '"'
                                        + 'size="30" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)" />'
                                        + '</td>'
                                        + '<td style="width: 190px;">'
                                        + '<input type="text" id="frm1702EX:txtPg7Sc9I7CARC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc9I7CARC_2[]"'
                                        + 'tabindex="' + (i + "1" + 3) + '"'
                                        + 'size="30" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)"/>'
                                        + '</td>'
                                        + '</tr>'
                                        + '<tr>'
                                        + '<td style="width: 300px; text-align: left;">'
                                        + '<span class="smallBold">8</span> Actual Amount/Fair Market Value/Net Capital Gains'
                                        + '</td>'
                                        + '<td style="width: 190px;">'
                                        + '<input type="text" id="frm1702EX:txtPg7Sc9I8ActualAmountC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc9I8ActualAmountC_1[]"'
                                        + 'tabindex="' + (i + "0" + 4) + '"'
                                        + 'size="30" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                        + 'maxlength="12" />'
                                        + '</td>'
                                        + '<td style="width: 190px;">'
                                        + '<input type="text" id="frm1702EX:txtPg7Sc9I8ActualAmountC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc9I8ActualAmountC_2[]"'
                                        + 'tabindex="' + (i + "1" + 4) + '"'
                                        + 'size="30" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                        + 'maxlength="12" />'
                                        + '</td>'
                                        + '</tr>'
                                        + '<tr>'
                                        + '<td style="width: 300px; text-align: left;">'
                                        + '<span class="smallBold">9</span> Final Tax Withheld/Paid'
                                        + '</td>'
                                        + '<td style="width: 190px;">'
                                        + '<input type="text" id="frm1702EX:txtPg7Sc9I9FinalTaxC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc9I9FinalTaxC_1[]"'
                                        + 'tabindex="' + (i + "0" + 5) + '"'
                                        + 'size="30" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                        + ' maxlength="12" />'
                                        + '</td>'
                                        + '<td style="width: 190px;">'
                                        + '<input type="text" id="frm1702EX:txtPg7Sc9I9FinalTaxC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc9I9FinalTaxC_2[]"'
                                        + 'tabindex="' + (i + "1" + 5) + '"'
                                        + 'size="30" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                        + ' maxlength="12" />'
                                        + '</td>'
                                        + '</tr>'
                                        + '</table>'
                                         + '<input type="button" value="Remove" onclick="deleteDiv(this); FixId_Pg7S9Pt2PopDiv();" style="float: right;"/>'
                                   + '</div>');
    }


    function Pg7S9Pt3ConditionSave() {
        if (Save_Pg7S9Pt3PopDiv()) {
            closeDialog('#Pg7S9Pt3Pop');
            Empty_Temp('#Pg7S9Pt3IterationDiv');
        }
    }

    function Save_Pg7S9Pt3PopDiv() {
        FixId_Pg7S9Pt3PopDiv();
        
         $('#Pg7S9Pt3IterationDivSaver').html($('#Pg7S9Pt3IterationDiv').html());
        Save_popDiv('#Pg7S9Pt3IterationDivSaver', '#Pg7S9Pt3IterationDiv');
        Compute_Page7_Sched9_Item19();
        var length = $("#Pg7S9Pt3IterationDivSaver div").length;
        document.getElementById("Pg7S9Pt3PopLength").value = length;

        alert('Items have been Saved');
        return true;
    }

    function Load_Pg7S9Pt3PopDiv() {

        $('#Pg7S9Pt3IterationDiv').html($('#Pg7S9Pt3IterationDivSaver').html());
        Get_Div('#Pg7S9Pt3IterationDivSaver', '#Pg7S9Pt3IterationDiv');
        ConditionPrint("#Pg7S9Pt3Pop");
    }

    function FixId_Pg7S9Pt3PopDiv() {

        var length = $("#Pg7S9Pt3IterationDiv div").length;

        for (i = 0; i < length; i++) {
            $("#Pg7S9Pt3IterationDiv div")[i].setAttribute("id", "Pg7S9Pt3Div_" + (i));

            var currentDivTable = $("#Pg7S9Pt3IterationDiv div").eq(i).find('table');

            currentDivTable.eq(0).find("tr th label").eq(0).html(LetterIteration((i * 2) + 3));
            currentDivTable.eq(0).find("tr th label").eq(1).html((i * 2) + 3);
            //second column header
            currentDivTable.eq(0).find("tr th label").eq(2).html(LetterIteration((i * 2) + 4));
            currentDivTable.eq(0).find("tr th label").eq(3).html((i * 2) + 4);
            //Ddl
            currentDivTable.eq(0).find("tr select")[0].setAttribute("id", "frm1702EX:ddPg7S9I10C_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr select")[1].setAttribute("id", "frm1702EX:ddPg7S9I10C_" + ((i * 2) + 4));
            //PSCS
            currentDivTable.eq(0).find("tr td input")[0].setAttribute("id", "frm1702EX:txtPg7Sc9I10PSCSC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[1].setAttribute("id", "frm1702EX:txtPg7Sc9I10PSCSC_" + ((i * 2) + 4));
            //CAR
            currentDivTable.eq(0).find("tr td input")[2].setAttribute("id", "frm1702EX:txtPg7Sc9I11CARC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[3].setAttribute("id", "frm1702EX:txtPg7Sc9I11CARC_" + ((i * 2) + 4));
            //NumberofShares
            currentDivTable.eq(0).find("tr td input")[4].setAttribute("id", "frm1702EX:txtPg7Sc9I12NumberofSharesC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[5].setAttribute("id", "frm1702EX:txtPg7Sc9I12NumberofSharesC_" + ((i * 2) + 4));

            //Date MM/DD/YYYY
            currentDivTable.eq(0).find("tr td input")[6].setAttribute("id", "frm1702EX:txtPg7Sc9I13DateofIssueC_" + ((i * 2) + 3));
            
            //Date MM/DD/YYYY
            currentDivTable.eq(0).find("tr td input")[7].setAttribute("id", "frm1702EX:txtPg7Sc9I13DateofIssueC_" + ((i * 2) + 4));
            
            //
            currentDivTable.eq(0).find("tr td input")[8].setAttribute("id", "frm1702EX:txtPg7Sc9I14ActualAmountC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[9].setAttribute("id", "frm1702EX:txtPg7Sc9I14ActualAmountC_" + ((i * 2) + 4));
            //
            currentDivTable.eq(0).find("tr td input")[10].setAttribute("id", "frm1702EX:txtPg7Sc9I15FinalTaxC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[11].setAttribute("id", "frm1702EX:txtPg7Sc9I15FinalTaxC_" + ((i * 2) + 4));

        }

    }

    function AddDiv_Pg7S9Pt3PopDiv() {
        // var myDiv = document.getElementById("Pg7S9Pt3IterationDiv");        
        i = $("#Pg7S9Pt3IterationDiv div").length;

        $('#Pg7S9Pt3IterationDiv').append('<div id="Pg7S9Pt3Div_' + (i) + '" >'
                                + ' <table id="frm1702-RT:tblSchedule12III"  style="width: 100%; background: #fff;">'
                                + '    <tr>'
                                + '        <th style="width: 340px; text-align: left;">'
                                + '            III) Sale / Exchange of Shares of Stock'
                                + '</th>'
                                        + '<th style="width: 205px;">'
                                        + '<label >' + LetterIteration((i * 2) + 3) + '</label>' + ') Sale / Exchange # <label >' + ((i * 2) + 3) + '</label>'
                                        + '</th>'
                                        + '<th style="width: 205px;">'
                                        + '<label >' + LetterIteration((i * 2) + 4) + '</label>' + ') Sale / Exchange # <label >' + ((i * 2) + 4) + '</label>'
                                        + '</th>'
                                + '    </tr>'
                                + '    <tr>'
                                + '        <td style="width: 340px; text-align: left;">'
                                + '            <span class="smallBold">10</span>&nbsp; Kind (PS/CS) / Stock Certificate Series'
                                + '            No.'
                                + '        </td>'
                                + '        <td style="width: 205px;">'
                                + '            <select id="frm1702EX:ddPg7S9I10C_' + ((i * 2) + 3) + '" tabindex="' + (i + "0" + 1) + '" name="frm1702EX:ddPg7S9I10C_1[]">'
                                + '                <option value="PS">PS</option>'
                                + '                <option value="CS">CS</option>'
                                + '            </select>'
                                + '            <span class="xlarge">/</span>'
                                + '            <input type="text" size="16" onfocus="onFocusIterate(this)"  tabindex="' + (i + "0" + 2) + '" maxlength="8" onkeypress="return Code(this)" onblur="return capitalize(this), onBlurIterate(this)" id="frm1702EX:txtPg7Sc9I10PSCSC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc9I10PSCSC_1[]"/>'
                                + '        </td>'
                                + '        <td style="width: 205px;">'
                                + '            <select id="frm1702EX:ddPg7S9I10C_' + ((i * 2) + 4) + '" tabindex="' + (i + "1" + 1) + '" name="frm1702EX:ddPg7S9I10C_2[]">'
                                + '                <option value="PS">PS</option>'
                                + '                <option value="CS">CS</option>'
                                + '            </select><span class="xlarge">/</span>'
                                + '            <input type="text" size="16" onfocus="onFocusIterate(this)"  tabindex="' + (i + "1" + 2) + '" maxlength="8" onkeypress="return Code(this)" onblur="return capitalize(this), onBlurIterate(this)" id="frm1702EX:txtPg7Sc9I10PSCSC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc9I10PSCSC_2[]"/>'
                                + '        </td>'
                                + '    </tr>'
                                + '    <tr>'
                                + '        <td style="width: 340px; text-align: left;">'
                                + '            <span class="smallBold">11</span> Certificate Authorizing Reg. (CAR) No.'
                                + '        </td>'
                                + '        <td style="width: 205px;">'
                                + '            <input type="text" id="frm1702EX:txtPg7Sc9I11CARC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc9I11CARC_1[]"'
                                + 'tabindex="' + (i + "0" + 3) + '"'
                                + '                size="25" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)"/>'
                                + '        </td>'
                                + '        <td style="width: 205px;">'
                                + '            <input type="text" id="frm1702EX:txtPg7Sc9I11CARC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc9I11CARC_2[]"'
                                 + 'tabindex="' + (i + "1" + 3) + '"'
                                + '                size="25" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)"/>'
                                + '        </td>'
                                + '    </tr>'
                                + '    <tr>'
                                + '        <td style="width: 340px; text-align: left;">'
                                + '            <span class="smallBold">12</span> Number of Shares'
                                + '        </td>'
                                + '        <td style="width: 205px;">'
                                + '            <input type="text" id="frm1702EX:txtPg7Sc9I12NumberofSharesC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc9I12NumberofSharesC_1[]"'
                                 + 'tabindex="' + (i + "0" + 4) + '"'
                                + '                size="25" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                + '                maxlength="12" />'
                                + '        </td>'
                                + '        <td style="width: 205px;">'
                                + '            <input type="text" id="frm1702EX:txtPg7Sc9I12NumberofSharesC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc9I12NumberofSharesC_2[]"'
                                 + 'tabindex="' + (i + "1" + 4) + '"'
                                + '                size="25" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                + '                maxlength="12" />'
                                + '        </td>'
                                + '    </tr>'
                                + '    <tr>'
                                + '        <td style="width: 340px; text-align: left;">'
                                + '            <span class="smallBold">13</span> Date of Issue <span style="font-style: italic;">(MM/DD/YYYY)'
                                + '            </span>'
                                + '        </td>'
                                + '        <td style="width: 205px;">'
        
                                + '              <input type="text" maxlength="10" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), validateIssueDateSched9(this);" size="20" id="frm1702EX:txtPg7Sc9I13DateofIssueC_' + ((i * 2) + 3) + '"'
                                 + 'tabindex="' + (i + "0" + 4) + '"'
                                + 'name="frm1702EX:txtPg7Sc9I13DateofIssueC_1[]" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this, event)"'

                                + '        </td>'
                                + '        <td style="width: 205px;">'
      
                                + '              <input type="text" maxlength="10" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), validateIssueDateSched9(this);" size="20" id="frm1702EX:txtPg7Sc9I13DateofIssueC_' + ((i * 2) + 4) + '"'
                                 + 'tabindex="' + (i + "1" + 4) + '"'
                                + 'name="frm1702EX:txtPg7Sc9I13DateofIssueC_2[]" onkeydown="return dateMasking(this)" onkeypress="return wholenumber(this, event)"'
                                + '                style="text-align: right;" />'
                                + '        </td>'
                                + '    </tr>'
                                + '    <tr>'
                                + '        <td style="width: 340px; text-align: left;">'
                                + '            <span class="smallBold">14</span> Actual Amount/Fair Market Value/Net Capital Gains'
                                + '        </td>'
                                + '        <td style="width: 205px;">'
                                + '            <input type="text" id="frm1702EX:txtPg7Sc9I14ActualAmountC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc9I14ActualAmountC_1[]"'
                                 + 'tabindex="' + (i + "0" + 5) + '"'
                                + '                size="25" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                + '                maxlength="12" />'
                                + '        </td>'
                                + '        <td style="width: 205px;">'
                                + '            <input type="text" id="frm1702EX:txtPg7Sc9I14ActualAmountC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc9I14ActualAmountC_2[]"'
                                 + 'tabindex="' + (i + "1" + 5) + '"'
                                + '                size="25" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                + '                maxlength="12" />'
                                + '        </td>'
                                + '    </tr>'
                                + '    <tr>'
                                + '        <td style="width: 340px; text-align: left;">'
                                + '            <span class="smallBold">15</span> Final Tax Withheld/Paid'
                                + '        </td>'
                                + '        <td style="width: 205px;">'
                                + '            <input type="text" id="frm1702EX:txtPg7Sc9I15FinalTaxC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc9I15FinalTaxC_1[]"'
                                 + 'tabindex="' + (i + "0" + 6) + '"'
                                + '                size="25" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                + '                maxlength="12" />'
                                + '        </td>'
                                + '        <td style="width: 205px;">'
                                + '            <input type="text" id="frm1702EX:txtPg7Sc9I15FinalTaxC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc9I15FinalTaxC_2[]"'
                                 + 'tabindex="' + (i + "1" + 6) + '"'
                                + '                size="25" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                + '                maxlength="12" />'
                                + '        </td>'
                                + '    </tr>'
                                + '</table>'

                                         + '<input type="button" value="Remove" onclick="deleteDiv(this); FixId_Pg7S9Pt3PopDiv();" style="float: right;"/>'
                                   + '</div>');
    }


    function Save_Pg7S9Pt4PopDiv() {
        FixId_Pg7S9Pt4PopDiv();

        $('#Pg7S9Pt4IterationDivSaver').html($('#Pg7S9Pt4IterationDiv').html());

        Save_popDiv('#Pg7S9Pt4IterationDivSaver', '#Pg7S9Pt4IterationDiv');
        Compute_Page7_Sched9_Item19();

        var length = $("#Pg7S9Pt4IterationDivSaver div").length;
        document.getElementById("Pg7S9Pt4PopLength").value = length;

        alert('Items have been Saved');
    }

    function Load_Pg7S9Pt4PopDiv() {

        $('#Pg7S9Pt4IterationDiv').html($('#Pg7S9Pt4IterationDivSaver').html());
        Get_Div('#Pg7S9Pt4IterationDivSaver', '#Pg7S9Pt4IterationDiv');
       
        ConditionPrint("#Pg7S9Pt4Pop");
    }

    function FixId_Pg7S9Pt4PopDiv() {

        var length = $("#Pg7S9Pt4IterationDiv div").length;

        for (i = 0; i < length; i++) {
            $("#Pg7S9Pt4IterationDiv div")[i].setAttribute("id", "Pg7S9Pt4Div_" + (i));
            var currentDivTable = $("#Pg7S9Pt4IterationDiv div").eq(i).find('table');
            // First column header
            currentDivTable.eq(0).find("tr th label").eq(0).html(LetterIteration((i * 2) + 3));
            currentDivTable.eq(0).find("tr th label").eq(1).html((i * 2) + 3);
            //second column header
            currentDivTable.eq(0).find("tr th label").eq(2).html(LetterIteration((i * 2) + 4));
            currentDivTable.eq(0).find("tr th label").eq(3).html((i * 2) + 4);

            //OtherIncome
            currentDivTable.eq(0).find("tr td input")[0].setAttribute("id", "frm1702EX:txtPg7Sc9I16OtherIncomeC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[1].setAttribute("id", "frm1702EX:txtPg7Sc9I16OtherIncomeC_" + ((i * 2) + 4));
            //OtherIncome
            currentDivTable.eq(0).find("tr td input")[2].setAttribute("id", "frm1702EX:txtPg7Sc9I17ActualAmountC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[3].setAttribute("id", "frm1702EX:txtPg7Sc9I17ActualAmountC_" + ((i * 2) + 4));
            //OtherIncome
            currentDivTable.eq(0).find("tr td input")[4].setAttribute("id", "frm1702EX:txtPg7Sc9I18FinalTaxC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[5].setAttribute("id", "frm1702EX:txtPg7Sc9I18FinalTaxC_" + ((i * 2) + 4));
        }

    }

    function AddDiv_Pg7S9Pt4PopDiv() {
        i = $("#Pg7S9Pt4IterationDiv div").length;


        $('#Pg7S9Pt4IterationDiv').append('<div id="Pg7S9Pt4Div_' + (i) + '" >'
                                        + ' <table id="frm1702-RT:tblSchedule12IV"  style="width: 100%; background: #e2e2e2;">'
                                        + '       <tr>'
                                        + '           <th style="text-align: left;" class="style1">'
                                        + '               IV) Other Income <span class="helpText">(Specify)</span>'
                                        + '</th>'
                                        + '<th style="width: 205px;">'
                                        + '<label >' + LetterIteration((i * 2) + 3) + '</label>' + ') Other Income # <label >' + ((i * 2) + 3) + '</label>'
                                        + '</th>'
                                        + '<th style="width: 205px;">'
                                        + '<label >' + LetterIteration((i * 2) + 4) + '</label>' + ') Other Income # <label >' + ((i * 2) + 4) + '</label>'
                                        + '</th>'
                                        + '       </tr>'
                                        + '       <tr>'
                                        + '           <td style="width: 340px; text-align: left;">'
                                        + '               <span class="smallBold">16</span> Other Income Subject to Final Tax Under Sec. 57(A)/127/others'
                                        + '               of the Tax Code, as amended <span class="helpText"></span><span class="xsmallItalic">'
                                        + '                   (Specify)</span>'
                                        + '           </td>'
                                        + '           <td style="width: 205px;">'
                                        + '               <input type="text" id="frm1702EX:txtPg7Sc9I16OtherIncomeC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc9I16OtherIncomeC_1[]"'
                                         + 'tabindex="' + (i + "0" + 1) + '"'
                                        + '                   size="25" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)" />'
                                        + '           </td>'
                                        + '           <td style="width: 205px;">'
                                        + '               <input type="text" id="frm1702EX:txtPg7Sc9I16OtherIncomeC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc9I16OtherIncomeC_2[]"'
                                         + 'tabindex="' + (i + "1" + 1) + '"'
                                        + '                   size="25" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)" />'
                                        + '           </td>'
                                        + '       </tr>'
                                        + '       <tr>'
                                        + '           <td style="width: 340px; text-align: left;">'
                                        + '               <span class="smallBold">17</span> Actual Amount/Fair Market Value/Net Capital Gains'
                                        + '           </td>'
                                        + '           <td style="width: 205px;">'
                                        + '               <input type="text" id="frm1702EX:txtPg7Sc9I17ActualAmountC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc9I17ActualAmountC_1[]"'
                                         + 'tabindex="' + (i + "0" + 2) + '"'
                                        + '                   size="25" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                        + '                   maxlength="12" />'
                                        + '           </td>'
                                        + '           <td style="width: 205px;">'
                                        + '               <input type="text" id="frm1702EX:txtPg7Sc9I17ActualAmountC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc9I17ActualAmountC_2[]"'
                                         + 'tabindex="' + (i + "1" + 2) + '"'
                                        + '                   size="25" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                        + '                   maxlength="12" />'
                                        + '           </td>'
                                        + '       </tr>'
                                        + '       <tr>'
                                        + '           <td style="width: 340px; text-align: left;">'
                                        + '               <span class="smallBold">18</span> Final Tax Withheld/Paid'
                                        + '           </td>'
                                        + '           <td style="width: 205px;">'
                                        + '               <input type="text" id="frm1702EX:txtPg7Sc9I18FinalTaxC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc9I18FinalTaxC_1[]"'
                                         + 'tabindex="' + (i + "0" + 3) + '"'
                                        + '                   size="25" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                        + '                    maxlength="12" />'
                                        + '           </td>'
                                        + '           <td style="width: 205px;">'
                                        + '               <input type="text" id="frm1702EX:txtPg7Sc9I18FinalTaxC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc9I18FinalTaxC_2[]"'
                                         + 'tabindex="' + (i + "1" + 3) + '"'
                                        + '                   size="25" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                        + '                   maxlength="12" />'
                                        + '           </td>'
                                        + '       </tr>'
                                        + '   </table>'
                                         + '<input type="button" value="Remove" onclick="deleteDiv(this); FixId_Pg7S9Pt4PopDiv();" style="float: right;"/>'
                                   + '</div>');
    }


    function Save_Pg7S9Pt5PopDiv() {
        FixId_Pg7S9Pt5PopDiv();

        $('#Pg7S9Pt5IterationDivSaver').html($('#Pg7S9Pt5IterationDiv').html());

        Save_popDiv('#Pg7S9Pt5IterationDivSaver', '#Pg7S9Pt5IterationDiv');
        Compute_Page7_Sched10_Item8();
        var length = $("#Pg7S9Pt5IterationDivSaver div").length;
        document.getElementById("Pg7S9Pt5PopLength").value = length;

        alert('Items have been Saved');
    }

    function Load_Pg7S9Pt5PopDiv() {

        $('#Pg7S9Pt5IterationDiv').html($('#Pg7S9Pt5IterationDivSaver').html());
        Get_Div('#Pg7S9Pt5IterationDivSaver', '#Pg7S9Pt5IterationDiv');
        ConditionPrint("#Pg7S9Pt5Pop");
    }

    function FixId_Pg7S9Pt5PopDiv() {

        var length = $("#Pg7S9Pt5IterationDiv div").length;

        for (i = 0; i < length; i++) {
            $("#Pg7S9Pt5IterationDiv div")[i].setAttribute("id", "Pg7S9Pt5Div_" + (i));
            var currentDivTable = $("#Pg7S9Pt5IterationDiv div").eq(i).find('table');

            // First column header
            currentDivTable.eq(0).find("tr th label").eq(0).html(LetterIteration((i * 2) + 3));
            currentDivTable.eq(0).find("tr th label").eq(1).html((i * 2) + 3);
            //second column header
            currentDivTable.eq(0).find("tr th label").eq(2).html(LetterIteration((i * 2) + 4));
            currentDivTable.eq(0).find("tr th label").eq(3).html((i * 2) + 4);

            //DescriptionofProperty
            currentDivTable.eq(0).find("tr td input")[0].setAttribute("id", "frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[1].setAttribute("id", "frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_" + ((i * 2) + 4));
            //ModeofTransfer
            currentDivTable.eq(0).find("tr td input")[2].setAttribute("id", "frm1702EX:txtPg7Sc10I3ModeofTransferC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[3].setAttribute("id", "frm1702EX:txtPg7Sc10I3ModeofTransferC_" + ((i * 2) + 4));
            //CAR
            currentDivTable.eq(0).find("tr td input")[4].setAttribute("id", "frm1702EX:txtPg7Sc10I4CARC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[5].setAttribute("id", "frm1702EX:txtPg7Sc10I4CARC_" + ((i * 2) + 4));
            //ActualAmount
            currentDivTable.eq(0).find("tr td input")[6].setAttribute("id", "frm1702EX:txtPg7Sc10I5ActualAmountC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[7].setAttribute("id", "frm1702EX:txtPg7Sc10I5ActualAmountC_" + ((i * 2) + 4));
        }

    }

    function AddDiv_Pg7S9Pt5PopDiv() {
        i = $("#Pg7S9Pt5IterationDiv div").length;


        $('#Pg7S9Pt5IterationDiv').append('<div id="Pg7S9Pt5Div_' + (i) + '" >'
                                            + '<table  style="width: 100%; background: #e2e2e2;">'
                                            + '    <tr>'
                                            + '        <th style="width: 340px; text-align: left;">'
                                            + '            I) Personal/Real Properties Received thru Gifts, Bequests, and Devises'
                                           + '</th>'
                                        + '<th style="width: 205px;">'
                                        + '<label >' + LetterIteration((i * 2) + 3) + '</label>' + ') Personal/Real Properties # <label >' + ((i * 2) + 3) + '</label>'
                                        + '</th>'
                                        + '<th style="width: 205px;">'
                                        + '<label >' + LetterIteration((i * 2) + 4) + '</label>' + ') Personal/Real Properties # <label >' + ((i * 2) + 4) + '</label>'
                                        + '</th>'
                                            + '    </tr>'
                                            + '    <tr>'
                                            + '        <td style="width: 340px; text-align: left;">'
                                            + '            <span class="smallBold">2</span> Description of Property <span class="helpText">'
                                            + '            </span><span class="xsmallItalic">(e.g., land, improvement, etc.)</span>'
                                            + '        </td>'
                                            + '        <td style="width: 205px;">'
             + '            <input type="text" id="frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_1[]"'
             + 'tabindex="' + (i + "0" + 1) + '"'
             + '                size="25" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)"/>'



                                            + '        </td>'
                                            + '        <td style="width: 205px;">'
              + '            <input type="text" id="frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_2[]"'
               + 'tabindex="' + (i + "1" + 1) + '"'
              + '                size="25" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)" />'

        

                                            + '        </td>'
                                            + '    </tr>'
                                            + '    <tr>'
                                            + '        <td style="width: 340px; text-align: left;">'
                                            + '            <span class="smallBold">3</span> Mode of Transfer <span class="helpText"></span>'
                                            + '            <span class="xsmallItalic">(e.g. Donation)</span>'
                                            + '        </td>'
                                            + '        <td style="width: 205px;">'
                                             + '            <input type="text" id="frm1702EX:txtPg7Sc10I3ModeofTransferC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc10I3ModeofTransferC_1[]"'
                                              + 'tabindex="' + (i + "0" + 2) + '"'
                                             + '                size="25" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)" />'
                                             + '        </td>'
                                             + '        <td style="width: 205px;">'
                                             + '            <input type="text" id="frm1702EX:txtPg7Sc10I3ModeofTransferC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc10I3ModeofTransferC_2[]"'
                                              + 'tabindex="' + (i + "1" + 2) + '"'
                                             + '                size="25" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)"  />'
                                             + '        </td>'
                                             + '    </tr>'
                                             + '    <tr>'
                                             + '        <td style="width: 340px; text-align: left;">'
                                             + '            <span class="smallBold">4</span> Certificate Authorizing Registration (CAR) No.'
                                             + '        </td>'
                                             + '        <td style="width: 205px;">'
                                             + '            <input type="text" id="frm1702EX:txtPg7Sc10I4CARC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc10I4CARC_1[]"'
                                              + 'tabindex="' + (i + "0" + 3) + '"'
                                             + '                size="25" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)" />'
                                             + '        </td>'
                                             + '        <td style="width: 205px;">'
                                             + '            <input type="text" id="frm1702EX:txtPg7Sc10I4CARC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc10I4CARC_2[]"'
                                              + 'tabindex="' + (i + "1" + 3) + '"'
                                             + '                size="25" onfocus="onFocusIterate(this)" onblur="return capitalize(this), onBlurIterate(this)" maxlength="16" onkeypress="return Code(this)" />'
                                             + '        </td>'
                                             + '    </tr>'
                                             + '    <tr>'
                                             + '        <td style="width: 340px; text-align: left;">'
                                             + '            <span class="smallBold">5</span> Actual Amount/Fair Market Value'
                                             + '        </td>'
                                             + '        <td style="width: 205px;">'
                                             + '            <input type="text" id="frm1702EX:txtPg7Sc10I5ActualAmountC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc10I5ActualAmountC_1[]"'
                                              + 'tabindex="' + (i + "0" + 4) + '"'
                                             + '                size="25" onfocus="onFocusIterate(this)" maxlength="12" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                             + '                 />'
                                             + '        </td>'
                                             + '        <td style="width: 205px;">'
                                             + '            <input type="text" id="frm1702EX:txtPg7Sc10I5ActualAmountC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc10I5ActualAmountC_2[]"'
                                              + 'tabindex="' + (i + "1" + 4) + '"'
                                             + '                  size="25" onfocus="onFocusIterate(this)" maxlength="12" onblur="onBlurIterate(this), toComma(this)" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                                             + '                   />'
                                             + '          </td>'
                                             + '      </tr>'
                                             + '  </table>'

                                         + '<input type="button" value="Remove" onclick="deleteDiv(this); FixId_Pg7S9Pt5PopDiv();" style="float: right;"/>'
                                   + '</div>');
    }

    function Save_Pg7S9Pt6PopDiv() {

        FixId_Pg7S9Pt6PopDiv();

        $('#Pg7S9Pt6IterationDivSaver').html($('#Pg7S9Pt6IterationDiv').html());

        Save_popDiv('#Pg7S9Pt6IterationDivSaver', '#Pg7S9Pt6IterationDiv');
        Compute_Page7_Sched10_Item8();

        var length = $("#Pg7S9Pt6IterationDivSaver div").length;
        document.getElementById("Pg7S9Pt6PopLength").value = length;

        alert('Items have been Saved');
    }

    function Load_Pg7S9Pt6PopDiv() {

        $('#Pg7S9Pt6IterationDiv').html($('#Pg7S9Pt6IterationDivSaver').html());
        Get_Div('#Pg7S9Pt6IterationDivSaver', '#Pg7S9Pt6IterationDiv');
        
        ConditionPrint("#Pg7S9Pt6Pop");
    }

    function FixId_Pg7S9Pt6PopDiv() {

        var length = $("#Pg7S9Pt6IterationDiv div").length;

        for (i = 0; i < length; i++) {
            $("#Pg7S9Pt6IterationDiv div")[i].setAttribute("id", "Pg7S9Pt6Div_" + (i));
            var currentDivTable = $("#Pg7S9Pt6IterationDiv div").eq(i).find('table');

            // First column header
            currentDivTable.eq(0).find("tr th label").eq(0).html(LetterIteration((i * 2) + 3));
            currentDivTable.eq(0).find("tr th label").eq(1).html((i * 2) + 3);
            //second column header
            currentDivTable.eq(0).find("tr th label").eq(2).html(LetterIteration((i * 2) + 4));
            currentDivTable.eq(0).find("tr th label").eq(3).html((i * 2) + 4);

            //OtherExempt
            currentDivTable.eq(0).find("tr td input")[0].setAttribute("id", "frm1702EX:txtPg7Sc10I6OtherExemptC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[1].setAttribute("id", "frm1702EX:txtPg7Sc10I6OtherExemptC_" + ((i * 2) + 4));
            //ActualAmount
            currentDivTable.eq(0).find("tr td input")[2].setAttribute("id", "frm1702EX:txtPg7Sc10I7ActualAmountC_" + ((i * 2) + 3));
            currentDivTable.eq(0).find("tr td input")[3].setAttribute("id", "frm1702EX:txtPg7Sc10I7ActualAmountC_" + ((i * 2) + 4));
        }

    }

    function AddDiv_Pg7S9Pt6PopDiv() {
        i = $("#Pg7S9Pt6IterationDiv div").length;


        $('#Pg7S9Pt6IterationDiv').append('<div id="Pg7S9Pt6Div_' + (i) + '" >'
                                        + ' <table  style="width: 100%; background: #e2e2e2;">'
                        + '          <tr>'
                        + '              <th style="width: 340px; text-align: left;">'
                        + '                  II) Other Exempt Income/Receipts'
                        + '</th>'
                                        + '<th style="width: 205px;">'
                                        + '<label >' + LetterIteration((i * 2) + 3) + '</label>' + ') Other Exempt Income # <label >' + ((i * 2) + 3) + '</label>'
                                        + '</th>'
                                        + '<th style="width: 205px;">'
                                        + '<label >' + LetterIteration((i * 2) + 4) + '</label>' + ') Other Exempt Income # <label >' + ((i * 2) + 4) + '</label>'
                                        + '</th>'
                        + '          </tr>'
                        + '          <tr>'
                        + '              <td style="width: 340px; text-align: left;">'
                        + '                  <span class="smallBold">6</span> Other Exempt Income/Receipts Under Sec. 32 (B)'
                        + '                  of the Tax Code, as amended <span class="helpText"></span><span class="xsmallItalic">'
                        + '                      (Specify)</span>'
                        + '              </td>'
                        + '              <td style="width: 205px;">'
                        + '                  <input type="text" id="frm1702EX:txtPg7Sc10I6OtherExemptC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc10I6OtherExemptC_1[]"'
                         + 'tabindex="' + (i + "0" + 1) + '"'
                        + '                      size="25" maxlength="16" onblur="return capitalize(this), onBlurIterate(this)" onfocus="onFocusIterate(this)" onkeypress="return Code(this)" />'
                        + '              </td>'
                        + '              <td style="width: 205px;">'
                        + '                  <input type="text" id="frm1702EX:txtPg7Sc10I6OtherExemptC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc10I6OtherExemptC_2[]"'
                         + 'tabindex="' + (i + "1" + 1) + '"'
                        + '                      size="25" maxlength="16" onblur="return capitalize(this), onBlurIterate(this)" onfocus="onFocusIterate(this)" onkeypress="return Code(this)" />'
                        + '              </td>'
                        + '          </tr>'
                        + '          <tr>'
                        + '              <td style="width: 340px; text-align: left;">'
                        + '                  <span class="smallBold">7</span> Actual Amount/Fair Market Value/Net Capital Gains'
                        + '              </td>'
                        + '              <td style="width: 205px;">'
                         + '                 <input type="text" id="frm1702EX:txtPg7Sc10I7ActualAmountC_' + ((i * 2) + 3) + '" name="frm1702EX:txtPg7Sc10I7ActualAmountC_1[]"'
                          + 'tabindex="' + (i + "0" + 2) + '"'
                         + '                     size="25" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                         + '                      maxlength="12" onfocus="onFocusIterate(this)" onblur="toComma(this), onBlurIterate(this)"/>'
                         + '             </td>'
                         + '             <td style="width: 205px;">'
                         + '                 <input type="text" id="frm1702EX:txtPg7Sc10I7ActualAmountC_' + ((i * 2) + 4) + '" name="frm1702EX:txtPg7Sc10I7ActualAmountC_2[]"'
                          + 'tabindex="' + (i + "1" + 2) + '"'
                         + '                     size="25" onkeypress="return wholenumber(this, event)" style="text-align: right"'
                         + '                      maxlength="12" onfocus="onFocusIterate(this)" onblur=" toComma(this), onBlurIterate(this)"/>'
                         + '             </td>'
                         + '         </tr>'
                         + '     </table>'

                                         + '<input type="button" value="Remove" onclick="deleteDiv(this); FixId_Pg7S9Pt6PopDiv();" style="float: right;"/>'
                                   + '</div>');
    }

    function LetterIteration(param) {
        var i = param * 1;
        var myLetter;
        var Col = new Array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");

        if (i >= 1 && i <= 26) {
            myLetter = (Col[i - 1]);
        }
        //27 to 52 .2
        else if (i >= 27 && i <= 52) {
            myLetter = ('A' + Col[i - 27]);
        }
        //53 to 78 .3
        else if (i >= 53 && i <= 78) {
            myLetter = ('B' + Col[i - 53]);
        }
        //79 to 104 .4
        else if (i >= 79 && i <= 104) {
            myLetter = ('C' + Col[i - 79]);
        }
        //105 to 130 .5
        else if (i >= 105 && i <= 130) {
            myLetter = ('D' + Col[i - 105]);
        }
        //131 to 156 .6
        else if (i >= 131 && i <= 156) {
            myLetter = ('E' + Col[i - 131]);
        }
        //157 to 182 .7
        else if (i >= 157 && i <= 182) {
            myLetter = ('F' + Col[i - 157]);
        }
        //183 to 208 .8
        else if (i >= 183 && i <= 208) {
            myLetter = ('G' + Col[i - 183]);
        }
        //209 to 234 .9
        else if (i >= 209 && i <= 234) {
            myLetter = ('H' + Col[i - 209]);
        }
        //235 to 260 .10
        else if (i >= 235 && i <= 260) {
            myLetter = ('I' + Col[i - 235]);
        }
        //261 to 286 .11
        else if (i >= 261 && i <= 286) {
            myLetter = ('J' + Col[i - 261]);
        }
        //287 to 312 .12
        else if (i >= 287 && i <= 312) {
            myLetter = ('K' + Col[i - 287]);
        }
        //313 to 338 .13
        else if (i >= 313 && i <= 338) {
            myLetter = ('L' + Col[i - 313]);
        }
        //339 to 364 .14
        else if (i >= 339 && i <= 364) {
            myLetter = ('M' + Col[i - 339]);
        }
        //365 to 390 .15
        else if (i >= 365 && i <= 390) {
            myLetter = ('N' + Col[i - 365]);
        }
        //391 to 416 .16
        else if (i >= 391 && i <= 416) {
            myLetter = ('O' + Col[i - 391]);
        }
        //417 to 442 .17
        else if (i >= 417 && i <= 442) {
            myLetter = ('P' + Col[i - 417]);
        }
        //443 to 468 .18
        else if (i >= 443 && i <= 468) {
            myLetter = ('Q' + Col[i - 443]);
        }
        //469 to 494 .19
        else if (i >= 469 && i <= 494) {
            myLetter = ('R' + Col[i - 469]);
        }
        //495 to 520 .20
        else if (i >= 495 && i <= 520) {
            myLetter = ('S' + Col[i - 495]);
        }
        //521 to 546 .21
        else if (i >= 521 && i <= 546) {
            myLetter = ('T' + Col[i - 521]);
        }
        //547 to 572 .22
        else if (i >= 547 && i <= 572) {
            myLetter = ('U' + Col[i - 547]);
        }
        //573 to 598 .23
        else if (i >= 573 && i <= 598) {
            myLetter = ('V' + Col[i - 573]);
        }
        //599 to 624 .24
        else if (i >= 599 && i <= 624) {
            myLetter = ('W' + Col[i - 599]);
        }
        //625 to 650 .25
        else if (i >= 625 && i <= 650) {
            myLetter = ('X' + Col[i - 625]);
        }
        //651 to 676 .26
        else if (i >= 651 && i <= 676) {
            myLetter = ('Y' + Col[i - 651]);
        }
        //677 to 702  .27
        else if (i >= 677 && i <= 702) {
            myLetter = ('Z' + Col[i - 677]);
        }
        else {
            alert(" out of range ");
            return;
        }
        return myLetter;
    }
    function removeCommaParenthesis(senderID) {
        var senderValue = d.getElementById(senderID).value;

        if (senderValue.toString().indexOf('(') != -1 || senderValue.toString().indexOf(')') != -1) {
            senderValue = NumWithParenthesis(senderValue);
        }

        if (senderValue.toString().indexOf(',') != -1) {
            senderValue = WholeNumWithComma(senderValue);
        }

        return senderValue;
    }

    function getRemoveComma(stringId) {
        return ((document.getElementById(stringId).value.indexOf(')') > 0 ? "-" : "") + document.getElementById(stringId).value.replace(/[\(\)\,]/gi, "")) * 1;
      
    }

    function isNumeric(num) {
        return !isNaN(num);
    }
    //jqueries
    $('input[maxlength="12"]').blur(function () {
        var currentId = $(this).attr('id');
        var elem = document.getElementById(currentId);
        myvalue = FormatValue(elem.value);

        if (!(currentId == "frm1702EX:txtPg5S6I1NetIncomeLoss")) {
            if (myvalue == "" || (myvalue.indexOf(')')) > 0) {
                myvalue = "0";
            }
        }

        elem.value = myvalue;
        if (typeof elem.onblur === "function") {
            elem.onblur();
        }
    });

    $('#sched8 input[maxlength="5"]').blur(function () {
        var percentVal = $(this).val();
        var floatVal = 0;

        try {
            floatVal = percentVal * 1;
        } catch (err) {
            floatVal = 0;
        }
        if (isNaN(floatVal))
            floatVal = 0;
        $(this).val(floatVal);
    });

    $('#sched7 input[maxlength="15"]').blur(function () {
        var currentId = $(this).attr('id');
        var elem = document.getElementById(currentId);
        myvalue = FormatValue(elem.value);

        if (!(currentId == "frm1702EX:txtPg6S7I15RetainedEarnings")) {
            if (myvalue == "" || (myvalue.indexOf(')')) > 0) {
                myvalue = "0";
            }
        }

        elem.value = myvalue;
        if (typeof elem.onblur === "function") {
            elem.onblur();
        }
    });

    $('input[maxlength="3"]').keyup(function () {
        var currentValue = $(this).val();
        if (currentValue.length === 3) {
            $(this).closest("input").next().select();
        }
    });

    $('input[maxlength="10"]').keydown(function () {
        dateMasking(this);
    });


    // Disable pasting
    $(document).ready(function () {
        $('input[id="frm1702EX:txtPg1Pt2I23CommunityTax"], input[maxlength="3"], input[id*=frm1702EX\\:txtPg2Pt6I49BIRAccreditedNo] ').bind('paste', function (e) {
            e.preventDefault();
        });

        //added 07/25/2015
        $('#ebirOnlineConfirmUsername, #ebirOnlineConfirmPassword, #ebirOnlinePassword, #ebirOnlineUsername').bind('paste drag drop', function (e) {
            e.preventDefault();
        });
    });

    function shortPeriodYes() {

        alert('Choosing "Yes" means you are filing for a short-period return. You are required to change the Month field to correspond with your New return period.');
        checkFilingYear();

        document.getElementById('frm1702EX:ddlPg1I2Date').focus();
    }

    function Select_CTC() {
        document.getElementById("frm1702EX:txtPg1Pt1I24DateofIssue").value = "";
        document.getElementById("frm1702EX:txtPg1Pt2I23CommunityTax").value = "";
        Select_CTCorReg();
    }
    function Select_Reg() {
        document.getElementById("frm1702EX:txtPg1Pt1I24DateofIssue").value = "";
        document.getElementById("frm1702EX:txtPg1Pt2I23CommunityTax").value = "";
        Select_CTCorReg();
    }

    function Select_CTCorReg() {
        var cert = document.getElementsByName('CTCorReg');
        var cert_value;

        for (var i = 0; i < cert.length; i++) {
            if (cert[i].checked) {
                cert_value = cert[i].value;
            }
        }
        if (cert_value == 'CTC') {
            document.getElementById("frm1702EX:txtPg1Pt2I23CommunityTax").maxLength = 8;
            document.getElementById("frm1702EX:txtPg1Pt1I26Amount").disabled = false;
            document.getElementById("frm1702EX:txtPg1Pt2I23CommunityTax").onkeypress = function () { return wholenumber(event, false); };
        }
        else if (cert_value == 'Reg') {
            document.getElementById("frm1702EX:txtPg1Pt2I23CommunityTax").maxLength = 10;
            document.getElementById("frm1702EX:txtPg1Pt1I26Amount").disabled = true;
            document.getElementById("frm1702EX:txtPg1Pt1I26Amount").value = "0";
            document.getElementById("frm1702EX:txtPg1Pt2I23CommunityTax").onkeypress = function () { return Code(this); };

        }
    }

    function DateCompare_Page1_Item19() {

        var first1 = document.getElementById("frm1702EX:txtPg1Pt1I19EffectivityFrom").value;
        var second1 = document.getElementById("frm1702EX:txtPg1Pt1I19EffectivityTo").value;

        firstDate = new Date(first1);
        secondDate = new Date(second1);

        if (firstDate >= secondDate) {
            alert("From date must be lower than To date on Page 1 Item 19.");
            document.getElementById("frm1702EX:txtPg1Pt1I19EffectivityTo").value = "";
            return false;
        }
        return true;
    }

   
    function Compute_Page1_Item22() {
        var value1 = removeCommaParenthesis("frm1702EX:txtPg1Pt2I20TotalIncome") * 1;
        var value2 = removeCommaParenthesis("frm1702EX:txtPg1Pt2I21AddPenalty") * 1;
        var computedValue = value1 + value2;

        document.getElementById("frm1702EX:txtPg1Pt2I22TotalAmount").value = FormatValue(computedValue);
    }

    function Select_rdoPg1I5ATC() {
        var rates = document.getElementsByName('frm1702EX:rdoPg1I5ATC');
        var rate_value;
        for (var i = 0; i < rates.length; i++) {
            if (rates[i].checked) {
                rate_value = rates[i].value;
            }
        }
        var chbox;
        if (rate_value == 'IC021') {
            document.getElementById("frm1702EX:chkPg6S8Partners").checked = true;
            document.getElementById("frm1702EX:chkPg6S8Partners").disabled = false;

            document.getElementById("frm1702EX:chkPg6S8StockHolders").checked = false;
            document.getElementById("frm1702EX:chkPg6S8StockHolders").disabled = true;
            document.getElementById("frm1702EX:chkPg6S8MembersInfo").checked = false;
            document.getElementById("frm1702EX:chkPg6S8MembersInfo").disabled = true;
        }
        else if (rate_value == 'IC011') {
            document.getElementById("frm1702EX:chkPg6S8StockHolders").checked = true;
            document.getElementById("frm1702EX:chkPg6S8StockHolders").disabled = false;
            //document.getElementById("frm1702EX:chkPg6S8MembersInfo").checked = false;
            document.getElementById("frm1702EX:chkPg6S8MembersInfo").disabled = false;

            document.getElementById("frm1702EX:chkPg6S8Partners").checked = false;
            document.getElementById("frm1702EX:chkPg6S8Partners").disabled = true;
        }
    }

    function Select_rdoPg1I5ATCReload() {
        var rates = document.getElementsByName('frm1702EX:rdoPg1I5ATC');
        var rate_value;
        for (var i = 0; i < rates.length; i++) {
            if (rates[i].checked) {
                rate_value = rates[i].value;
            }
        }

        var chbox;
        if (rate_value == 'IC011') {
            document.getElementById("frm1702EX:chkPg6S8Partners").disabled = true;
        }
        else if (rate_value == 'IC021') {
            document.getElementById("frm1702EX:chkPg6S8StockHolders").disabled = true;
            document.getElementById("frm1702EX:chkPg6S8MembersInfo").disabled = true;
        }
    }

    function Compute_Page2_Item33() {
        var value1 = removeCommaParenthesis("frm1702EX:txtPg2Pt4I31NetSales") * 1;
        var value2 = removeCommaParenthesis("frm1702EX:txtPg2Pt4I32LessCost") * 1;
        var computedValue = value1 - value2;

        document.getElementById("frm1702EX:txtPg2Pt4I33GrossIncome").value = FormatValue(computedValue);
        Compute_Page2_Item35();
    }

    function Compute_Page2_Item35() {
        var value1 = removeCommaParenthesis("frm1702EX:txtPg2Pt4I33GrossIncome") * 1;
        var value2 = removeCommaParenthesis("frm1702EX:txtPg2Pt4I34AddOther") * 1;
        var computedValue = value1 + value2;

        document.getElementById("frm1702EX:txtPg2Pt4I35TotalGross").value = FormatValue(computedValue);
        Compute_Page2_Item39();
    }

    function Compute_Page2_Item38() {
        var value1 = removeCommaParenthesis("frm1702EX:txtPg2Pt4I36OrdinaryAllowable") * 1;
        var value2 = removeCommaParenthesis("frm1702EX:txtPg2Pt4I37SpecialAllowable") * 1;
        var computedValue = value1 + value2;

        document.getElementById("frm1702EX:txtPg2Pt4I38TotalItemized").value = FormatValue(computedValue);
    }

    function Compute_Page2_Item39() {
        var value1 = removeCommaParenthesis("frm1702EX:txtPg2Pt4I35TotalGross") * 1;
        var value2 = removeCommaParenthesis("frm1702EX:txtPg2Pt4I38TotalItemized") * 1;
        var computedValue = value1 - value2;

        document.getElementById("frm1702EX:txtPg2Pt4I39NetTaxable").value = FormatValue(computedValue);
        Compute_Page2_Item41();
        Compute_Page2_Item42();
        Compute_Page2_Item43();
    }

    function Compute_Page2_Item41() {
        var value1 = removeCommaParenthesis("frm1702EX:txtPg2Pt4I39NetTaxable") * 1;
        var value2 = 0;
        var computedValue = value1 * value2;

        document.getElementById("frm1702EX:txtPg2Pt4I41TotalIncome").value = FormatValue(computedValue);
        document.getElementById("frm1702EX:txtPg1Pt2I20TotalIncome").value = FormatValue(computedValue);
    }

    function Compute_Page2_Item42() {
        var value1 = removeCommaParenthesis("frm1702EX:txtPg2Pt4I39NetTaxable") * 1;
        var computedValue = Math.round(value1 * 0.30);

        document.getElementById("frm1702EX:txtPg2Pt5I42RegularIncome").value = computedValue.toString().indexOf('-') > -1 ? '0' : FormatValue(computedValue);
        Compute_Page2_Item44();
    }

    function Compute_Page2_Item43() {
        var value2 = removeCommaParenthesis("frm1702EX:txtPg2Pt4I37SpecialAllowable") * 1;
        var computedValue2 = Math.round(value2 * 0.30);

        document.getElementById("frm1702EX:txtPg2Pt5I43SpecialAllowable").value = FormatValue(computedValue2);
        Compute_Page2_Item44();
    }

    function Compute_Page2_Item44() {
        var value1 = removeCommaParenthesis("frm1702EX:txtPg2Pt5I42RegularIncome") * 1;
        var value2 = removeCommaParenthesis("frm1702EX:txtPg2Pt5I43SpecialAllowable") * 1;
        var computedValue = value1 + value2;

        document.getElementById("frm1702EX:txtPg2Pt5I44TotalTax").value = FormatValue(computedValue);
    }

    function Enable_NameEntry_Item45() {
        document.getElementById("frm1702EX:txtPg2Pt6I45NameofExternalAuditor").disabled = false;
    }

    function Enable_NameEntry_Item47() {
        document.getElementById("frm1702EX:txtPg2Pt6I47NameofSigningPartner").disabled = false;
    }

  
    function set_Page2_Item51() {
        var issueDate = document.getElementById("frm1702EX:txtPg2Pt6I50IssueDate").value;

        var arrDate = issueDate.split("/");
        var expiryDate = arrDate[0] + "/" + arrDate[1] + "/" + ((arrDate[2] * 1) + (3 * 1));

        if (isNaN(arrDate[1])) {
            document.getElementById("frm1702EX:txtPg2Pt6I51ExpiryDate").value = "";
        }
        else {
            document.getElementById("frm1702EX:txtPg2Pt6I51ExpiryDate").value = expiryDate;
            DateCompare_Page2_Item50();
        }
    }

    function DateCompare_Page2_Item50() {

        var first1 = document.getElementById("frm1702EX:txtPg2Pt6I50IssueDate").value;
        var second1 = document.getElementById("frm1702EX:txtPg2Pt6I51ExpiryDate").value;

        var firstDate = new Date(first1);
        var secondDate = new Date(second1);
        var currentDate = new Date();

        var arrDate = first1.split("/");
        var expiryDate = new Date(arrDate[0] + "/" + arrDate[1] + "/" + ((arrDate[2] * 1) + (3 * 1)));

        if (firstDate >= secondDate) {
            alert("Issue date must be lower than Expiry date on Page 2 Item 50.");
            document.getElementById("frm1702EX:txtPg2Pt6I51ExpiryDate").value = "";
            return false;
        }
        else if (secondDate > expiryDate) {
            alert("Expiry date should not be more than three years from Issued Date on Page 2 Item 51.");
            document.getElementById("frm1702EX:txtPg2Pt6I51ExpiryDate").value = "";
            return false;
        }
        else if (secondDate < currentDate) {
            alert("Expiry date should not be past date.");
            document.getElementById("frm1702EX:txtPg2Pt6I50IssueDate").value = "";
            document.getElementById("frm1702EX:txtPg2Pt6I51ExpiryDate").value = "";
            document.getElementById("frm1702EX:txtPg2Pt6I50IssueDate").select();
            return false;
        }
        return true;
    }

    function Compute_txtPg3S1I4Total() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg3S1I1GoodsProp") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S1I2SaleServices") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S1I3LeaseProp") * 1;

        document.getElementById("frm1702EX:txtPg3S1I4Total").value = FormatValue(computedValue);
        Compute_Page2_Item33();
    }

    function Compute_txtPg3S1I6NetSales() {


        var computedValue = removeCommaParenthesis("frm1702EX:txtPg3S1I4Total") * 1
        - removeCommaParenthesis("frm1702EX:txtPg3S1I5LessSales") * 1;

        document.getElementById("frm1702EX:txtPg2Pt4I31NetSales").value = FormatValue(computedValue);

        document.getElementById("frm1702EX:txtPg3S1I6NetSales").value = FormatValue(computedValue);


        Compute_Page2_Item33();
    }

    function Compute_txtPg3S2I3TotalGoods() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg3S2I1MerchInventory") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S2I2AddPurchases") * 1;

        document.getElementById("frm1702EX:txtPg3S2I3TotalGoods").value = FormatValue(computedValue);
    }

    function Compute_txtPg3S2I5CostSales() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg3S2I3TotalGoods") * 1
        - removeCommaParenthesis("frm1702EX:txtPg3S2I4LessMerch") * 1;

        document.getElementById("frm1702EX:txtPg3S2I5CostSales").value = FormatValue(computedValue);
    }

    function Compute_txtPg3S2I8MaterialsAvailable() {
        var computedValue = removeCommaParenthesis("frm1702EX:txtPg3S2I6DirectMaterials") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S2I7AddPurchases") * 1;

        document.getElementById("frm1702EX:txtPg3S2I8MaterialsAvailable").value = FormatValue(computedValue);
    }

    function Compute_txtPg3S2I10RawMaterials() {
        var computedValue = removeCommaParenthesis("frm1702EX:txtPg3S2I8MaterialsAvailable") * 1
        - removeCommaParenthesis("frm1702EX:txtPg3S2I9DirectMaterials") * 1;

        document.getElementById("frm1702EX:txtPg3S2I10RawMaterials").value = FormatValue(computedValue);

    }

    function Compute_txtPg3S2I13TotalMan() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg3S2I10RawMaterials") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S2I11DirectLabor") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S2I12ManOverhead") * 1;

        document.getElementById("frm1702EX:txtPg3S2I13TotalMan").value = FormatValue(computedValue);
    }

    function Compute_txtPg3S2I16CostOfGoods() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg3S2I13TotalMan") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S2I14WorkProcess") * 1
        - removeCommaParenthesis("frm1702EX:txtPg3S2I15LessWork") * 1;

        document.getElementById("frm1702EX:txtPg3S2I16CostOfGoods").value = FormatValue(computedValue);
    }

    function Compute_txtPg3S2I19GoodsManAndSold() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg3S2I16CostOfGoods") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S2I17FinishedGoods") * 1
        - removeCommaParenthesis("frm1702EX:txtPg3S2I18LessFinished") * 1;

        document.getElementById("frm1702EX:txtPg3S2I19GoodsManAndSold").value = FormatValue(computedValue);
    }

    function Compute_txtPg3S2I26TotalCostServices() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg3S2I20DirectWage") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S2I21DirectMaterials") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S2I22DirectDepreciation") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S2I23DirectRental") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S2I24DirectOutside") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S2I25DirectOthers") * 1;

        document.getElementById("frm1702EX:txtPg3S2I26TotalCostServices").value = FormatValue(computedValue);
    }

    function Compute_txtPg3S2I27TotalCostSales() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg3S2I5CostSales") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S2I19GoodsManAndSold") * 1
        + removeCommaParenthesis("frm1702EX:txtPg3S2I26TotalCostServices") * 1;

        document.getElementById("frm1702EX:txtPg3S2I27TotalCostSales").value = FormatValue(computedValue);

        document.getElementById("frm1702EX:txtPg2Pt4I32LessCost").value = FormatValue(computedValue);


        Compute_Page2_Item33();

    }

    function OnChange_txtPg3S1I4Total() {
        Compute_txtPg3S1I6NetSales();
        Compute_Page2_Item33();
    }

    function OnChange_txtPg3S2I3TotalGoods() {
        Compute_txtPg3S2I5CostSales();
        Compute_txtPg3S2I27TotalCostSales();
    }

    function OnChange_txtPg3S2I5CostSales() {
        Compute_txtPg3S2I27TotalCostSales();
    }

    function OnChange_txtPg3S2I8MaterialsAvailable() {
        Compute_txtPg3S2I10RawMaterials();
        Compute_txtPg3S2I13TotalMan();
        Compute_txtPg3S2I16CostOfGoods();
        Compute_txtPg3S2I19GoodsManAndSold();
        Compute_txtPg3S2I27TotalCostSales();
    }

    function OnChange_txtPg3S2I10RawMaterials() {
        Compute_txtPg3S2I13TotalMan();
        Compute_txtPg3S2I16CostOfGoods();
        Compute_txtPg3S2I19GoodsManAndSold();
        Compute_txtPg3S2I27TotalCostSales();
    }

    function OnChange_txtPg3S2I13TotalMan() {
        Compute_txtPg3S2I16CostOfGoods();
        Compute_txtPg3S2I19GoodsManAndSold();
        Compute_txtPg3S2I27TotalCostSales();
    }

    function OnChange_txtPg3S2I16CostOfGoods() {
        Compute_txtPg3S2I19GoodsManAndSold();
        Compute_txtPg3S2I27TotalCostSales();
    }

    function OnChange_txtPg3S2I19GoodsManAndSold() {
        Compute_txtPg3S2I27TotalCostSales();
    }

    function OnChange_txtPg3S2I26TotalCostServices() {
        Compute_txtPg3S2I27TotalCostSales();
    }

    function Compute_txtPg4S3I4TotalTaxIncome() {

        var item1to3 = removeCommaParenthesis("frm1702EX:txtPg4S3I1Col2") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S3I2Col2") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S3I3Col2") * 1;


        document.getElementById("frm1702EX:txtPg4S3I4TotalTaxIncome").value = FormatValue(item1to3);

        document.getElementById("frm1702EX:txtPg2Pt4I34AddOther").value = FormatValue(item1to3);

        Compute_Page2_Item35();
        Compute_Page2_Item39();
    }

    function Compute_txtPg5S4I40TotalAllowableDeduction() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg4S4I1AdsAndPromotions") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I2Col2") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I3Col2") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I4Col2") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I5BadDebts") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I6CharitableContri") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I7Commissions") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I8Communication") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I9Depletion") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I10Depreciation") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I11DirectorFees") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I12FringeBenefits") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I13FuelAndOil") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I14Insurance") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I15Interest") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I16Janitorial") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I17Losses") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I18Management") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I19Insurance") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I20OfficeSupplies") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I21OtherServices") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I22PersonalFees") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I23Rental") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I24RepairLabor") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I25RepairMaterials") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I26Representation") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I27Research") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I28Royalties") * 1
        + removeCommaParenthesis("frm1702EX:txtPg4S4I29Salaries") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S4I30SecurityServices") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S4I31SSS") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S4I32TaxesAndLicense") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S4I33TollingFees") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S4I34Training") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S4I35Transportation") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S4I36Col2") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S4I37Col2") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S4I38Col2") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S4I39Col2") * 1;

        document.getElementById("frm1702EX:txtPg5S4I40TotalAllowableDeduction").value = FormatValue(computedValue);

        document.getElementById("frm1702EX:txtPg2Pt4I36OrdinaryAllowable").value = FormatValue(computedValue);


        Compute_Page2_Item38();
        Compute_Page2_Item39();
    }

    function Compute_txtPg5S5I5TotalAllowable() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg5S5I1Col3") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S5I2Col3") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S5I3Col3") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S5I4Col3") * 1;

        document.getElementById("frm1702EX:txtPg5S5I5TotalAllowable").value = FormatValue(computedValue);

        document.getElementById("frm1702EX:txtPg2Pt4I37SpecialAllowable").value = FormatValue(computedValue);

        Compute_Page2_Item38();
        Compute_Page2_Item39();

    }

    function Compute_txtPg5S6I4Total() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg5S6I1NetIncomeLoss") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S6I2Col2") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S6I3Col2") * 1;

        document.getElementById("frm1702EX:txtPg5S6I4Total").value = FormatValue(computedValue);
    }

    function Compute_txtPg5S6I9Col2() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg5S6I5Col2") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S6I6Col2") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S6I7Col2") * 1
        + removeCommaParenthesis("frm1702EX:txtPg5S6I8Col2") * 1;

        document.getElementById("frm1702EX:txtPg5S6I9Col2").value = FormatValue(computedValue);
    }

    function Compute_txtPg5S6I10NetTaxable() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg5S6I4Total") * 1
        - removeCommaParenthesis("frm1702EX:txtPg5S6I9Col2") * 1;

        document.getElementById("frm1702EX:txtPg5S6I10NetTaxable").value = FormatValue(computedValue);

    }

    function Select_StockHolders() {
        document.getElementById("frm1702EX:chkPg6S8Partners").checked = false;
        document.getElementById("frm1702EX:chkPg6S8MembersInfo").disabled = false;
        document.getElementById("frm1702EX:chkPg6S8StockHolders").disabled = false;
    }

    function Select_Partners() {
        var rates = document.getElementsByName('frm1702EX:rdoPg1I5ATC');
        var rate_value;
        for (var i = 0; i < rates.length; i++) {
            if (rates[i].checked) {
                rate_value = rates[i].value;
            }
        }

        document.getElementById("frm1702EX:chkPg6S8StockHolders").checked = false;
        document.getElementById("frm1702EX:chkPg6S8MembersInfo").checked = false;

        if (rate_value == 'IC021') {
            document.getElementById("frm1702EX:chkPg6S8Partners").checked = true;
            document.getElementById("frm1702EX:chkPg6S8StockHolders").disabled = true;
            document.getElementById("frm1702EX:chkPg6S8MembersInfo").disabled = true;
        }
    }

    function Compute_txtPg6S7I7TotalAssets() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg6S7I1CurrentAssets") * 1
        + removeCommaParenthesis("frm1702EX:txtPg6S7I2LongInvestment") * 1
        + removeCommaParenthesis("frm1702EX:txtPg6S7I3Property") * 1
        + removeCommaParenthesis("frm1702EX:txtPg6S7I4LongReceivables") * 1
        + removeCommaParenthesis("frm1702EX:txtPg6S7I5IntangibleAssets") * 1
        + removeCommaParenthesis("frm1702EX:txtPg6S7I6OtherAssets") * 1;

        document.getElementById("frm1702EX:txtPg6S7I7TotalAssets").value = FormatValue(computedValue);
    }

    function Compute_txtPg6S7I12TotalLiabilities() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg6S7I8CurrentLiabilities") * 1
        + removeCommaParenthesis("frm1702EX:txtPg6S7I9LongLiabilities") * 1
        + removeCommaParenthesis("frm1702EX:txtPg6S7I10DefferedCredits") * 1
        + removeCommaParenthesis("frm1702EX:txtPg6S7I11OtherLiablities") * 1;

        document.getElementById("frm1702EX:txtPg6S7I12TotalLiabilities").value = FormatValue(computedValue);
    }

    function Compute_txtPg6S7I16TotalEquity() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg6S7I13CapitalStock") * 1
        + removeCommaParenthesis("frm1702EX:txtPg6S7I14AdditionalCapital") * 1
        + removeCommaParenthesis("frm1702EX:txtPg6S7I15RetainedEarnings") * 1;

        document.getElementById("frm1702EX:txtPg6S7I16TotalEquity").value = FormatValue(computedValue);
    }

    function Compute_txtPg6S7I17LiabilitiesAndEquity() {

        var computedValue = removeCommaParenthesis("frm1702EX:txtPg6S7I12TotalLiabilities") * 1
        + removeCommaParenthesis("frm1702EX:txtPg6S7I16TotalEquity") * 1;

        document.getElementById("frm1702EX:txtPg6S7I17LiabilitiesAndEquity").value = FormatValue(computedValue);
    }

    function Compute_Page7_Sched9_Item19() {
        var value1a = removeCommaParenthesis("frm1702EX:txtPg7Sc9I1InterestsC3") * 1;
        var value1b = removeCommaParenthesis("frm1702EX:txtPg7Sc9I2RoyaltiesC3") * 1;
        var value1c = removeCommaParenthesis("frm1702EX:txtPg7Sc9I3DividendsC3") * 1;
        var value1d = removeCommaParenthesis("frm1702EX:txtPg7Sc9I4PrizesC3") * 1;

        var value2a = removeCommaParenthesis("frm1702EX:txtPg7Sc9I9FinalTaxC1") * 1;
        var value2b = removeCommaParenthesis("frm1702EX:txtPg7Sc9I9FinalTaxC2") * 1;

        var value3a = removeCommaParenthesis("frm1702EX:txtPg7Sc9I15FinalTaxC1") * 1;
        var value3b = removeCommaParenthesis("frm1702EX:txtPg7Sc9I15FinalTaxC2") * 1;

        var value4a = removeCommaParenthesis("frm1702EX:txtPg7Sc9I18FinalTaxC1") * 1;
        var value4b = removeCommaParenthesis("frm1702EX:txtPg7Sc9I18FinalTaxC2") * 1;

        var computedValue = value1a + value1b + value1c + value1d + value2a + value2b + value3a + value3b + value4a + value4b;

        var valuec3Iterate = removeCommaParenthesis("Pg7S9Pt1SubTotal") * 1;
        //
        var Pt2length = $("#Pg7S9Pt2IterationDivSaver div").length;
        var Pt2value = 0;
        for (i = 0; i < Pt2length; i++) {
            var currentDivTable = $("#Pg7S9Pt2IterationDivSaver div").eq(i).find('table');
            Pt2value += removeCommaParenthesis(currentDivTable.eq(0).find("tr input")[8].id) * 1;
            Pt2value += removeCommaParenthesis(currentDivTable.eq(0).find("tr input")[9].id) * 1;
        }


        var Pt3length = $("#Pg7S9Pt3IterationDivSaver div").length;
        var Pt3value = 0;
        for (i = 0; i < Pt3length; i++) {
            var currentDivTable = $("#Pg7S9Pt3IterationDivSaver div").eq(i).find('table');
            Pt3value += removeCommaParenthesis(currentDivTable.eq(0).find("tr td input")[10].id) * 1;
            Pt3value += removeCommaParenthesis(currentDivTable.eq(0).find("tr td input")[11].id) * 1;
        }

        var Pt4length = $("#Pg7S9Pt4IterationDivSaver div").length;
        var Pt4value = 0;
        for (i = 0; i < Pt4length; i++) {
            var currentDivTable = $("#Pg7S9Pt4IterationDivSaver div").eq(i).find('table');
            Pt3value += removeCommaParenthesis(currentDivTable.eq(0).find("tr td input")[4].id) * 1;
            Pt3value += removeCommaParenthesis(currentDivTable.eq(0).find("tr td input")[5].id) * 1;
        }



        var totalValue = computedValue + valuec3Iterate + Pt2value + Pt3value + Pt4value;

        document.getElementById("frm1702EX:txtPg7Sc9I19TotalFinalTax").value = FormatValue(totalValue);
    }

    function Compute_Page7_Sched10_Item8() {
        var value1 = removeCommaParenthesis("frm1702EX:txtPg7Sc10I1ReturnofPremium") * 1;
        var value2 = removeCommaParenthesis("frm1702EX:txtPg7Sc10I5ActualAmountC1") * 1;
        var value3 = removeCommaParenthesis("frm1702EX:txtPg7Sc10I5ActualAmountC2") * 1;
        var value4 = removeCommaParenthesis("frm1702EX:txtPg7Sc10I7ActualAmountC1") * 1;
        var value5 = removeCommaParenthesis("frm1702EX:txtPg7Sc10I7ActualAmountC2") * 1;

        var computedValue = value1 + value2 + value3 + value4 + value5;

        var Pt5length = $("#Pg7S9Pt5IterationDivSaver div").length;
        var Pt5value = 0;
        for (i = 0; i < Pt5length; i++) {
            var currentDivTable = $("#Pg7S9Pt5IterationDivSaver div").eq(i).find('table');
            Pt5value += removeCommaParenthesis(currentDivTable.eq(0).find("tr td input")[6].id) * 1;
            Pt5value += removeCommaParenthesis(currentDivTable.eq(0).find("tr td input")[7].id) * 1;
        }

        var Pt6length = $("#Pg7S9Pt6IterationDivSaver div").length;
        var Pt6value = 0;
        for (i = 0; i < Pt6length; i++) {
            var currentDivTable = $("#Pg7S9Pt6IterationDivSaver div").eq(i).find('table');
            Pt6value += removeCommaParenthesis(currentDivTable.eq(0).find("tr td input")[2].id) * 1;
            Pt6value += removeCommaParenthesis(currentDivTable.eq(0).find("tr td input")[3].id) * 1;
        }

        totalValue = computedValue + Pt5value + Pt6value;

        document.getElementById("frm1702EX:txtPg7Sc10I8TotalIncome").value = FormatValue(totalValue);
    }

    function printPage() {

        currentPage = document.getElementById("frm1702EX:txtCurrentPage").value;

        printPage1();
        printPage2();
        printPage3();
        printPage4();
        printPage5();
        printPage6();
        printPage7();
        
    }

    function ClosePrint() {
        $('#Page' + currentPage + 'Content').show('blind');
        $('#Print' + currentPage + 'Content').hide('blind');
        $(".divPrint").css({ 'position': 'relative', 'top': '0 px' });
    }

    function printPage1() {
        document.getElementById("p1I0").innerHTML = (document.getElementById("frm1702EX:rdoPg1I1Calendar").checked == true ? "X" : "");
        document.getElementById("p1I1").innerHTML = (document.getElementById("frm1702EX:rdoPg1I1Fiscal").checked == true ? "X" : "");
        document.getElementById("p1I2").innerHTML = (document.getElementById("frm1702EX:ddlPg1I2Date").value);
        document.getElementById("p1I3").innerHTML = (document.getElementById("frm1702EX:txtPg1I2YearEnd").value);
        document.getElementById("p1I4").innerHTML = (document.getElementById("frm1702EX:rdoPg1I3AmendedYes").checked == true ? "X" : "");
        document.getElementById("p1I5").innerHTML = (document.getElementById("frm1702EX:rdoPg1I3AmendedNo").checked == true ? "X" : "");
        document.getElementById("p1I6").innerHTML = (document.getElementById("frm1702EX:rdoPg1I4ShortPeriodYes").checked == true ? "X" : "");
        document.getElementById("p1I7").innerHTML = (document.getElementById("frm1702EX:rdoPg1I4ShortPeriodNo").checked == true ? "X" : "");
        document.getElementById("p1I8").innerHTML = (document.getElementById("frm1702EX:rdoPg1I5ATCR1C3").checked == true ? "X" : "");
        document.getElementById("p1I9").innerHTML = (document.getElementById("frm1702EX:rdoPg1I5ATCR2C3").checked == true ? "X" : "");

        document.getElementById("p1I10").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I6TINC1").value);
        document.getElementById("p1I11").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I6TINC2").value);
        document.getElementById("p1I12").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I6TINC3").value);
        document.getElementById("p1I13").innerHTML = (document.getElementById("frm1702EX:hdnPg1Pt1I7RDO").value);

        var dateOfInc = document.getElementById("frm1702EX:txtPg1Pt1I8DateofIncorporation").value.split("/");
        document.getElementById("p1I14").innerHTML = (typeof dateOfInc[0] === "undefined" ? "" : dateOfInc[0]);
        document.getElementById("p1I15").innerHTML = (typeof dateOfInc[1] === "undefined" ? "" : dateOfInc[1]);
        document.getElementById("p1I16").innerHTML = (typeof dateOfInc[2] === "undefined" ? "" : dateOfInc[2]);

        document.getElementById("p1I17").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I9RegisteredName").value.substring(0, 42));
        document.getElementById("p1I18").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I9RegisteredName").value.substring(42, 84));

        document.getElementById("p1I19").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I10RegisteredAddress").value.substring(0, 42));
        document.getElementById("p1I20").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I10RegisteredAddress").value.substring(42, 84));

        document.getElementById("p1I21").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I11ContactNumber").value.substring(0, 4));
        document.getElementById("p1I22").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I11ContactNumber").value.substring(4, 25));
        document.getElementById("p1I23").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I12Email").value.substring(0, 39));

        document.getElementById("p1I24").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I13MainLine").value.substring(0, 49));
        document.getElementById("p1I25").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I14PSICCode").value.substring(0, 6));

        document.getElementById("p1I26").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I16LegalBasis").value.substring(0, 24));
        document.getElementById("p1I27").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I17Investment").value.substring(0, 36));

        document.getElementById("p1I28").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I18RegisteredActivity").value.substring(0, 18));

        var effectFrom = document.getElementById("frm1702EX:txtPg1Pt1I19EffectivityFrom").value.split("/");
        document.getElementById("p1I29").innerHTML = (typeof effectFrom[0] === "undefined" ? "" : effectFrom[0]);
        document.getElementById("p1I30").innerHTML = (typeof effectFrom[1] === "undefined" ? "" : effectFrom[1]);
        document.getElementById("p1I31").innerHTML = (typeof effectFrom[2] === "undefined" ? "" : effectFrom[2]);

        var effectTo = document.getElementById("frm1702EX:txtPg1Pt1I19EffectivityTo").value.split("/");
        document.getElementById("p1I32").innerHTML = (typeof effectTo[0] === "undefined" ? "" : effectTo[0]);
        document.getElementById("p1I33").innerHTML = (typeof effectTo[1] === "undefined" ? "" : effectTo[1]);
        document.getElementById("p1I34").innerHTML = (typeof effectTo[2] === "undefined" ? "" : effectTo[2]);

        document.getElementById("p1I35").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt2I20TotalIncome").value);
        document.getElementById("p1I36").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt2I21AddPenalty").value);
        document.getElementById("p1I37").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt2I22TotalAmount").value);

        document.getElementById("p1I38").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt2TitleofSignatory").value.substring(0, 20));
        document.getElementById("p1I39").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt2NumberofPagesFiled").value);
        document.getElementById("p1I40").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt2I23CommunityTax").value.substring(0, 15));


        var dateOfIssue = document.getElementById("frm1702EX:txtPg1Pt1I24DateofIssue").value.split("/");
        document.getElementById("p1I41").innerHTML = (typeof dateOfIssue[0] === "undefined" ? "" : dateOfIssue[0]);
        document.getElementById("p1I42").innerHTML = (typeof dateOfIssue[1] === "undefined" ? "" : dateOfIssue[1]);
        document.getElementById("p1I43").innerHTML = (typeof dateOfIssue[2] === "undefined" ? "" : dateOfIssue[2]);

        document.getElementById("p1I44").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I25PlaceofIssue").value);
        document.getElementById("p1I45").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt1I26Amount").value);

        document.getElementById("p1I46").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt3I27CashC1").value);
        document.getElementById("p1I47").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt3I27CashC2").value.substring(0, 11));
        var dateCash = document.getElementById("frm1702EX:txtPg1Pt3I27Date").value.split("/");
        document.getElementById("p1I48").innerHTML = (typeof dateCash[0] === "undefined" ? "" : dateCash[0]);
        document.getElementById("p1I49").innerHTML = (typeof dateCash[1] === "undefined" ? "" : dateCash[1]);
        document.getElementById("p1I50").innerHTML = (typeof dateCash[2] === "undefined" ? "" : dateCash[2]);
        document.getElementById("p1I51").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt3I27CashC3").value);

        document.getElementById("p1I52").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt3I28CheckC1").value);
        document.getElementById("p1I53").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt3I28CheckC2").value.substring(0, 11));
        var dateCheck = document.getElementById("frm1702EX:txtPg1Pt3I28Date").value.split("/");
        document.getElementById("p1I54").innerHTML = (typeof dateCheck[0] === "undefined" ? "" : dateCheck[0]);
        document.getElementById("p1I55").innerHTML = (typeof dateCheck[1] === "undefined" ? "" : dateCheck[1]);
        document.getElementById("p1I56").innerHTML = (typeof dateCheck[2] === "undefined" ? "" : dateCheck[2]);
        document.getElementById("p1I57").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt3I28CheckC3").value);


        document.getElementById("p1I58").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt3I29TaxDebitC2").value);
        var dateDebit = document.getElementById("frm1702EX:txtPg1Pt3I29Date").value.split("/");
        document.getElementById("p1I59").innerHTML = (typeof dateDebit[0] === "undefined" ? "" : dateDebit[0]);
        document.getElementById("p1I60").innerHTML = (typeof dateDebit[1] === "undefined" ? "" : dateDebit[1]);
        document.getElementById("p1I61").innerHTML = (typeof dateDebit[2] === "undefined" ? "" : dateDebit[2]);
        document.getElementById("p1I62").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt3I29TaxDebitC3").value);

        document.getElementById("p1I63").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt3I30OthersC1").value);
        document.getElementById("p1I64").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt3I30OthersC2").value);
        document.getElementById("p1I65").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt3I30OthersC3").value.substring(0, 11));
        var dateOthers = document.getElementById("frm1702EX:txtPg1Pt3I30Date").value.split("/");
        document.getElementById("p1I66").innerHTML = (typeof dateOthers[0] === "undefined" ? "" : dateOthers[0]);
        document.getElementById("p1I67").innerHTML = (typeof dateOthers[1] === "undefined" ? "" : dateOthers[1]);
        document.getElementById("p1I68").innerHTML = (typeof dateOthers[2] === "undefined" ? "" : dateOthers[2]);
        document.getElementById("p1I69").innerHTML = (document.getElementById("frm1702EX:txtPg1Pt3I30OthersC4").value);

    }
    function printPage2() {
        toPrintHeader("Page2Content", "Print2Content");
        toPrint("Part4to5", "Part4to5Print");


        document.getElementById("Part6I0").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I45NameofExternalAuditor").value.substring(0, 55));
        document.getElementById("Part6I1").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I45NameofExternalAuditor").value.substring(55, 78));
        document.getElementById("Part6I2").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I46TinC1").value);
        document.getElementById("Part6I3").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I46TinC2").value);
        document.getElementById("Part6I4").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I46TinC3").value);
        document.getElementById("Part6I5").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I46TinC4").value);

        document.getElementById("Part6I6").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I47NameofSigningPartner").value.substring(0, 55));
        document.getElementById("Part6I7").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I47NameofSigningPartner").value.substring(55, 78));
        document.getElementById("Part6I8").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I48TinC1").value);
        document.getElementById("Part6I9").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I48TinC2").value);
        document.getElementById("Part6I10").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I48TinC3").value);
        document.getElementById("Part6I11").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I48TinC4").value);

        document.getElementById("Part6I12").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC1").value);
        document.getElementById("Part6I13").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC2").value);
        document.getElementById("Part6I14").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC3").value);
        document.getElementById("Part6I15").innerHTML = (document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC4").value);

        var DateFrom = document.getElementById("frm1702EX:txtPg2Pt6I50IssueDate").value.split("/");
        var DateTo = document.getElementById("frm1702EX:txtPg2Pt6I51ExpiryDate").value.split("/");

        document.getElementById("Part6I16").innerHTML = (typeof DateFrom[0] === "undefined" ? "" : DateFrom[0]);
        document.getElementById("Part6I17").innerHTML = (typeof DateFrom[1] === "undefined" ? "" : DateFrom[1]);
        document.getElementById("Part6I18").innerHTML = (typeof DateFrom[2] === "undefined" ? "" : DateFrom[2]);

        document.getElementById("Part6I19").innerHTML = (typeof DateTo[0] === "undefined" ? "" : DateTo[0]);
        document.getElementById("Part6I20").innerHTML = (typeof DateTo[1] === "undefined" ? "" : DateTo[1]);
        document.getElementById("Part6I21").innerHTML = (typeof DateTo[2] === "undefined" ? "" : DateTo[2]);
    }

    function printPage3() {
        toPrintHeader("Page3Content", "Print3Content");
        toPrint("sched1", "sched1Print");
        toPrint("sched2", "sched2Print");
    }
    function printPage4() {
        toPrintHeader("Page4Content", "Print4Content");
        toPrint("sched3", "sched3Print");
        toPrint("sched4p1", "sched4p1Print");

    }
    function printPage5() {
        toPrintHeader("Page5Content", "Print5Content");
        toPrint("sched4p2", "sched4p2Print");
        toPrint("sched5", "sched5Print");
        toPrint("sched6", "sched6Print");
    }
    function printPage6() {

        toPrintHeader("Page6Content", "Print6Content");
        toPrint("sched7", "sched7Print");
        toPrint("sched8", "sched8Print");

        $("div[id=Print6Content] span").eq(21).html(document.getElementById("frm1702EX:chkPg6S8StockHolders").checked == true ? "X" : "");
        $("div[id=Print6Content] span").eq(22).html(document.getElementById("frm1702EX:chkPg6S8Partners").checked == true ? "X" : "");
        $("div[id=Print6Content] span").eq(23).html(document.getElementById("frm1702EX:chkPg6S8MembersInfo").checked == true ? "X" : "");
    }
    function printPage7() {
        toPrintHeader("Page7Content", "Print7Content");
        toPrint("sched9Pt1", "sched9Pt1Print");
        toPrint("sched9Pt2", "sched9Pt2Print");
        //print part 3

        document.getElementById("sched9Pt3I0").innerHTML = (document.getElementById("frm1702EX:ddPg7S9I10C1").value);
        document.getElementById("sched9Pt3I1").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I10PSCSC1").value.substring(0, 7));

        document.getElementById("sched9Pt3I2").innerHTML = (document.getElementById("frm1702EX:ddPg7S9I10C2").value);
        document.getElementById("sched9Pt3I3").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I10PSCSC2").value.substring(0, 6));

        document.getElementById("sched9Pt3I4").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I11CARC1").value.substring(0, 10));
        document.getElementById("sched9Pt3I5").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I11CARC2").value.substring(0, 9));

        document.getElementById("sched9Pt3I6").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I12NumberofSharesC1").value);
        document.getElementById("sched9Pt3I7").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I12NumberofSharesC2").value);

        var dateofIssueC1 = document.getElementById("frm1702EX:txtPg7Sc9I13DateofIssueC1").value.split("/");
        document.getElementById("sched9Pt3I8").innerHTML = (typeof dateofIssueC1[0] === "undefined" ? "" : dateofIssueC1[0]);
        document.getElementById("sched9Pt3I9").innerHTML = (typeof dateofIssueC1[1] === "undefined" ? "" : dateofIssueC1[1]);
        document.getElementById("sched9Pt3I10").innerHTML = (typeof dateofIssueC1[2] === "undefined" ? "" : dateofIssueC1[2]);

        var dateofIssueC2 = document.getElementById("frm1702EX:txtPg7Sc9I13DateofIssueC2").value.split("/");
        document.getElementById("sched9Pt3I11").innerHTML = (typeof dateofIssueC2[0] === "undefined" ? "" : dateofIssueC2[0]);
        document.getElementById("sched9Pt3I12").innerHTML = (typeof dateofIssueC2[1] === "undefined" ? "" : dateofIssueC2[1]);
        document.getElementById("sched9Pt3I13").innerHTML = (typeof dateofIssueC2[2] === "undefined" ? "" : dateofIssueC2[2]);

        document.getElementById("sched9Pt3I14").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I14ActualAmountC1").value);
        document.getElementById("sched9Pt3I15").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I14ActualAmountC2").value);
        document.getElementById("sched9Pt3I16").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I15FinalTaxC1").value);
        document.getElementById("sched9Pt3I17").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I15FinalTaxC2").value);

        //toPrint("sched9Pt4", "sched9Pt4print");
        document.getElementById("sched9Pt4I0").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I16OtherIncomeC1").value.substring(0, 11));
        document.getElementById("sched9Pt4I1").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I16OtherIncomeC2").value.substring(0, 10));
        document.getElementById("sched9Pt4I2").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I16OtherIncomeC1").value.substring(11, 21));
        document.getElementById("sched9Pt4I3").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I16OtherIncomeC2").value.substring(10, 20));

        document.getElementById("sched9Pt4I4").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I17ActualAmountC1").value);
        document.getElementById("sched9Pt4I5").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I17ActualAmountC2").value);
        document.getElementById("sched9Pt4I6").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I18FinalTaxC1").value);
        document.getElementById("sched9Pt4I7").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I18FinalTaxC2").value);
        document.getElementById("sched9Pt4I8").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc9I19TotalFinalTax").value);


        toPrint("sched10Pt1", "sched10Pt1Print");
        //toPrint("sched10Pt2", "sched10Pt2print");
        document.getElementById("sched10Pt2I0").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc10I6OtherExemptC1").value.substring(0, 11));
        document.getElementById("sched10Pt2I1").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc10I6OtherExemptC2").value.substring(0, 10));
        document.getElementById("sched10Pt2I2").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc10I6OtherExemptC1").value.substring(11, 21));
        document.getElementById("sched10Pt2I3").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc10I6OtherExemptC2").value.substring(10, 20));

        document.getElementById("sched10Pt2I4").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc10I7ActualAmountC1").value);
        document.getElementById("sched10Pt2I5").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc10I7ActualAmountC2").value);

        document.getElementById("sched10Pt2I6").innerHTML = (document.getElementById("frm1702EX:txtPg7Sc10I8TotalIncome").value);

    }

    function toPrintHeader(pageDiv, printDiv) {
        $("div[id=" + printDiv + "] span").eq(0).html($("div[id=" + pageDiv + "] input[type='text']")[0].value);
        $("div[id=" + printDiv + "] span").eq(1).html($("div[id=" + pageDiv + "] input[type='text']")[1].value);
        $("div[id=" + printDiv + "] span").eq(2).html($("div[id=" + pageDiv + "] input[type='text']")[2].value);
        $("div[id=" + printDiv + "] span").eq(3).html($("div[id=" + pageDiv + "] input[type='text']")[5].value.substring(0, 36));
    }

    function toPrint(pageDiv, printDiv) {
        
        var elem, spanVal;

        $("div[id=" + pageDiv + "] input[type='text']").each(function (idx, elem) {
            switch ((elem.maxLength * 1)) {
                case 40:
                    spanVal = elem.value.substring(0, 33);
                    break;
                case 23:
                    spanVal = elem.value.substring(0, 23);
                    break;
                case 16:
                    spanVal = elem.value.substring(0, 13);
                    break;
                case 24:
                    spanVal = elem.value.substring(0, 22);
                    break;
                case 21:
                    spanVal = elem.value.substring(0, 16);
                    break;
                case 20:
                    spanVal = elem.value.substring(0, 15);
                    break;
                default:
                    spanVal = elem.value;
                    break;
            }
            document.getElementById(pageDiv + "I" + idx).innerHTML = spanVal;
        });

    }
    
    //after xml populate
    function enableEmptyMandatory() {

        enable("frm1702EX:txtPg1I2YearEnd");
        enable("frm1702EX:txtPg1Pt1I9RegisteredName");
        enable("frm1702EX:txtPg1Pt1I10RegisteredAddress");
        enable("frm1702EX:txtPg1Pt1I11ContactNumber");
        enable("frm1702EX:txtPg1Pt1I13MainLine");
        enable("frm1702EX:txtPg1Pt1I14PSICCode");


        function enable(elem) {
            if (document.getElementById(elem).value == "") {
                $(document.getElementById(elem)).prop('disabled', false);
            }
        }
    }

    //on validation click
    function validateAll() {
        //empty mandatory
        if (!checkMandatory("frm1702EX:txtPg1I2YearEnd", "Please enter a valid Year End on Page 1 Item 2")) return false;
        if (!checkYearEnd()) return false;

        if (!Check_rdoPg1I5ATC()) return false;
        if (d.getElementById('frm1702EX:rdoPg1Pt1I7RDO').value === "000") { alert("Please enter a valid RDO Code on Page 1 Item 7."); return false; }

        if (!checkMandatory("frm1702EX:txtPg1Pt1I8DateofIncorporation", "Please enter a valid Date of Incorporation on Page 1 Item 8")) return false;
        if (!checkDateOfIncorporation()) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I9RegisteredName", "Please enter a valid name on Page 1 Item 9")) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I10RegisteredAddress", "Please enter a valid Registered Address on Page 1 Item 10.")) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I11ContactNumber", "Please enter a valid Contact Number on Page 1 Item 11")) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I12Email", "Please enter a valid e-mail address on page 1 item 12")) return false;
        if (!validateEmail()) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I13MainLine", "Please enter a valid Line of Business on Page 1 Item 13")) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I14PSICCode", "Please enter a value for PSIC Code on Page 1 Item 14")) return false;
        if (document.getElementById("frm1702EX:txtPg1Pt1I14PSICCode").value.length < 4) {
            alert("Please enter a valid PSIC Code on Page 1 Item 14");
            return false;
        }

        if (!checkMandatory("frm1702EX:txtPg1Pt1I16LegalBasis", "Please enter a value Legal Bases of Tax Relief/Exemption on Page 1 Item 16")) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I17Investment", "Please enter a value for Investment Promotion Agency (IPA) Government Agency on Page 1 Item 17")) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I18RegisteredActivity", "Please enter a value for Registered Activity/Program (Reg. No.) on Page 1 Item 18")) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I19EffectivityFrom", "Please enter a valid date for Effectivity Date of Tax Relief/Exemption(FROM) on Page 1 Item 19")) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I19EffectivityTo", "Please enter a valid date for Effectivity Date of Tax Relief/Exemption(TO) on Page 1 Item 19")) return false;

        if (document.getElementById("frm1702EX:txtPg1Pt1I19EffectivityFrom").value != "" || document.getElementById("frm1702EX:txtPg1Pt1I19EffectivityTo").value != "") {
            if (!DateCompare_Page1_Item19()) return false;
        }
        if (!Check_CTCorReg()) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt2I23CommunityTax", "Please enter a value for Community Tax Certificate (CTC) on Page 1 Item 23")) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I24DateofIssue", "Please enter a valid date for Date of Issue on Page 1 Item 24")) return false;
        if (!validateCTCDate(document.getElementById("frm1702EX:txtPg1Pt1I24DateofIssue"))) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I25PlaceofIssue", "Please enter a value for Place of Issue on Page 1 Item 25")) return false;
        if (document.getElementById("frm1702EX:rdoPg1CTC").checked) {
            if (!(getRemoveComma("frm1702EX:txtPg1Pt1I26Amount") > 0)) {
                alert("Amount should not be 0 for Page 1 Item 26");
                return false;
            }
        }



        var totalPaymentPart3 = getRemoveComma("frm1702EX:txtPg1Pt3I27CashC3") + getRemoveComma("frm1702EX:txtPg1Pt3I28CheckC3")
                                + getRemoveComma("frm1702EX:txtPg1Pt3I29TaxDebitC3") + getRemoveComma("frm1702EX:txtPg1Pt3I30OthersC4");

        if (totalPaymentPart3 != 0) {
            if (getRemoveComma("frm1702EX:txtPg1Pt2I22TotalAmount") != totalPaymentPart3) {
                alert("Sum of Amount fields in Page 1 Details of Payment must be equal to TOTAL AMOUNT PAYABLE");
                return false;
            }
        }

        if (getRemoveComma("frm1702EX:txtPg2Pt4I39NetTaxable") != getRemoveComma("frm1702EX:txtPg5S6I10NetTaxable")) {
            alert("Part IV, item 39 should be equal to Schedule 6, item 10");
            return false;
        }


        if (getRemoveComma("frm1702EX:txtPg3S1I4Total") > 600000) {
            if (document.getElementById("frm1702EX:txtPg2Pt6I45NameofExternalAuditor").value == "" && document.getElementById("frm1702EX:txtPg2Pt6I47NameofSigningPartner").value == "") {
                alert("Please provide at least one name in Page 2 Part VI Item 45 OR 47");
                return false;
            }

            if (document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC1").value == "" || document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC2").value == "" || document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC3").value == "" || document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC4").value == "") {
                alert('Please provide a valid BIR Accreditation Number on Page 2 Item 49');
                return false;
            }
        }

        if ($.trim(document.getElementById("frm1702EX:txtPg2Pt6I45NameofExternalAuditor").value) != "") {
            if (checkEmptyTIN('txtPg2Pt6I46TinC')) {
                alert("Please enter valid TIN number for Page 2 Item 46.");
                return false;
            }
        }

        if ($.trim(document.getElementById("frm1702EX:txtPg2Pt6I47NameofSigningPartner").value) != "") {
            if (checkEmptyTIN('txtPg2Pt6I48TinC')) {
                alert("Please enter valid TIN number for Page 2 Item 48.");
                return false;
            }
        }

        if (!checkEmptyTIN('txtPg2Pt6I46TinC') && $.trim(document.getElementById("frm1702EX:txtPg2Pt6I45NameofExternalAuditor").value) == "") {
            alert("Please provide Name of External Auditor for Page 2 Item 45.");
            return false;
        }

        if (!checkEmptyTIN('txtPg2Pt6I48TinC') && $.trim(document.getElementById("frm1702EX:txtPg2Pt6I47NameofSigningPartner").value) == "") {
            alert("Please provide Name of Signing Partner for Page 2 Item 47.");
            return false;
        }

        if (!validateTIN("txtPg2Pt6I46TinC", "2 Item ", "46")) return false;
        if (!validateTIN("txtPg2Pt6I48TinC", "2 Item ", "48")) return false;

        if (document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC1").value == "" || document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC2").value == "" || document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC3").value == "" || document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC4").value == "") {
            if (document.getElementById("frm1702EX:txtPg2Pt6I50IssueDate").value != "" || document.getElementById("frm1702EX:txtPg2Pt6I51ExpiryDate").value != "") {
                alert('Please provide a valid BIR Accreditation Number on Page 2 Item 49');
                return false;
            }
        }

        if (document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC1").value != "" || document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC2").value != "" || document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC3").value != "" || document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC4").value != "") {
            isValid = true;

            if (document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC1").value.length != 2 || document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC2").value.length != 6 || document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC3").value.length != 3 || document.getElementById("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC4").value.length != 4) {

                alert('Please provide a valid BIR Accreditation Number on Page 2 Item 49');
                isValid = false;
                //return false;
            }
            if (isValid) {
                if (!checkMandatory("frm1702EX:txtPg2Pt6I50IssueDate", "Please enter a valid Issue Date on Page 2 Item 50")) return false;
                if (!checkMandatory("frm1702EX:txtPg2Pt6I51ExpiryDate", "Please enter a valid Expiry Date on Page 2 Item 51")) return false;
                if (!DateCompare_Page2_Item50()) return false;
            }
            if (!isValid)
                return false;
        }

        if (document.getElementById("frm1702EX:txtPg6S7I7TotalAssets").value * 1 == 0) {
            alert('Total Assets must not be zero on Page 6 Schedule 7 Item 7.');
            return false;
        }

        if (document.getElementById("frm1702EX:txtPg6S7I17LiabilitiesAndEquity").value * 1 == 0) {
            alert('Total Liabilities and equity must not be zero on Page 6 Schedule 7 Item 7.');
            return false;
        }


        if (document.getElementById("frm1702EX:txtPg6S7I7TotalAssets").value != document.getElementById("frm1702EX:txtPg6S7I17LiabilitiesAndEquity").value) {
            alert('Items 7 and 17 on Page 6 Schedule 7 must be equal. As a rule of thumb, total assets is equal to total liabilities and equity.');
            return false;
        }

        if (!validateAmountDescription()) return false;

        if ($.trim(document.getElementById("frm1702EX:txtPg6S8I1Col1Name").value) == "" || checkEmptyTIN('txtPg6S8I1Col2TIN')) { alert('Please provide data on Page 6 Schedule 8 Item 1. This is mandatory'); return false; }

        if (!document.getElementById("frm1702EX:chkPg6S8StockHolders").checked && !document.getElementById("frm1702EX:chkPg6S8Partners").checked && !document.getElementById("frm1702EX:chkPg6S8MembersInfo").checked) {
            alert("Please choose 1 on the 3 boxes \"Stockholders, Partners or Members Information\" in Page 6 Schedule 8");
            return false;
        }


        if (document.getElementById("frm1702EX:chkPg6S8Partners").checked == true)
            if ($.trim(document.getElementById("frm1702EX:txtPg6S8I2Col1Name").value) == "" || checkEmptyTIN('txtPg6S8I2Col2TIN')) { alert('Please provide data on Page 6 Schedule 8 Item 2. This is mandatory'); return false; }

      
        if (!validateSchedule8TIN()) return false;


        if (getRemoveComma("frm1702EX:txtPg7Sc9I1InterestsC1") != 0 && getRemoveComma("frm1702EX:txtPg7Sc9I1InterestsC2") == 0 && getRemoveComma("frm1702EX:txtPg7Sc9I1InterestsC3") != 0 ||
            getRemoveComma("frm1702EX:txtPg7Sc9I2RoyaltiesC1") != 0 && getRemoveComma("frm1702EX:txtPg7Sc9I2RoyaltiesC2") == 0 && getRemoveComma("frm1702EX:txtPg7Sc9I2RoyaltiesC3") != 0 ||
            getRemoveComma("frm1702EX:txtPg7Sc9I3DividendsC1") != 0 && getRemoveComma("frm1702EX:txtPg7Sc9I3DividendsC2") == 0 && getRemoveComma("frm1702EX:txtPg7Sc9I3DividendsC3") != 0 ||
            getRemoveComma("frm1702EX:txtPg7Sc9I4PrizesC1") != 0 && getRemoveComma("frm1702EX:txtPg7Sc9I4PrizesC2") == 0 && getRemoveComma("frm1702EX:txtPg7Sc9I4PrizesC3") != 0) {
            alert('If there is an amount for A) Exempt, there should be no amount for C) Final Tax Withheld/Paid, for all items on Page 7 Part I ');
            return false;
        }

        else if (getRemoveComma("frm1702EX:txtPg7Sc9I1InterestsC2") != 0 && getRemoveComma("frm1702EX:txtPg7Sc9I1InterestsC3") == 0 ||
                getRemoveComma("frm1702EX:txtPg7Sc9I2RoyaltiesC2") != 0 && getRemoveComma("frm1702EX:txtPg7Sc9I2RoyaltiesC3") == 0 ||
                getRemoveComma("frm1702EX:txtPg7Sc9I3DividendsC2") != 0 && getRemoveComma("frm1702EX:txtPg7Sc9I3DividendsC3") == 0 ||
                getRemoveComma("frm1702EX:txtPg7Sc9I4PrizesC2") != 0 && getRemoveComma("frm1702EX:txtPg7Sc9I4PrizesC3") == 0) {
            alert('If there is an amount for B) Actual Amount/ Fair Market Value/ Capital Gains, there should be an amount for C) Final Tax Withheld/Paid, for all items on Page 7 Part I ');
            return false;
        }

        else if (getRemoveComma("frm1702EX:txtPg7Sc9I1InterestsC2") == 0 && getRemoveComma("frm1702EX:txtPg7Sc9I1InterestsC3") != 0 ||
                getRemoveComma("frm1702EX:txtPg7Sc9I2RoyaltiesC2") == 0 && getRemoveComma("frm1702EX:txtPg7Sc9I2RoyaltiesC3") != 0 ||
                getRemoveComma("frm1702EX:txtPg7Sc9I3DividendsC2") == 0 && getRemoveComma("frm1702EX:txtPg7Sc9I3DividendsC3") != 0 ||
                getRemoveComma("frm1702EX:txtPg7Sc9I4PrizesC2") == 0 && getRemoveComma("frm1702EX:txtPg7Sc9I4PrizesC3") != 0) {
            alert('If there is an amount for C) Final Tax Withheld/Paid, there should be an amount for B) Actual Amount/ Fair Market Value/ Capital Gains, for all items on Page 7 Part I ');
            return false;
        }

        if (($.trim(document.getElementById('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC1').value) == "" && (getRemoveComma('frm1702EX:txtPg7Sc9I8ActualAmountC1') != 0 || getRemoveComma('frm1702EX:txtPg7Sc9I9FinalTaxC1') != 0)) ||
            ($.trim(document.getElementById('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC2').value) == "" && (getRemoveComma('frm1702EX:txtPg7Sc9I8ActualAmountC2') != 0 || getRemoveComma('frm1702EX:txtPg7Sc9I9FinalTaxC2') != 0))) {
            alert('You have entered an amount with no Description of property  on Page 7 Schedule 9 Part II, Sale/Exchange of Real Property.');
            return false;
        }

        if (($.trim(document.getElementById('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC1').value) != "" && (getRemoveComma('frm1702EX:txtPg7Sc9I8ActualAmountC1') == 0 || getRemoveComma('frm1702EX:txtPg7Sc9I9FinalTaxC1') == 0)) ||
             ($.trim(document.getElementById('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC2').value) != "" && (getRemoveComma('frm1702EX:txtPg7Sc9I8ActualAmountC2') == 0 || getRemoveComma('frm1702EX:txtPg7Sc9I9FinalTaxC2') == 0))) {
            alert('You have entered a Description of property. The amount must not be zero on Page 7 Schedule 9 Part II, Sale/Exchange of Real Property.');
            return false;
        }

        return true;
    }

    function checkDateOfIncorporation() {
        var isValid = true;
        var dateOfInc = document.getElementById("frm1702EX:txtPg1Pt1I8DateofIncorporation").value;

        var result = dateOfInc.split("/");
        if ((result[2] * 1) > (2000 + (document.getElementById("frm1702EX:txtPg1I2YearEnd").value * 1))) {

            alert("The date of incorporation should not be more than the Filing date ");
            isValid = false;
        }
        else if ((result[2] * 1) == (2000 + (document.getElementById("frm1702EX:txtPg1I2YearEnd").value * 1))) {
            if (result[0] * 1 > document.getElementById("frm1702EX:ddlPg1I2Date").value * 1) {

                alert("The date of incorporation should not be more than the Filing date ");
                isValid = false;
            }
        }

        return isValid;
    }

    function validateSchedule8TIN() {
        var isValid = true;
        for (i = 1; i < 21; i++) {
            if (($.trim(document.getElementById("frm1702EX:txtPg6S8I" + i + "Col1Name").value) != "" || getRemoveComma("frm1702EX:txtPg6S8I" + i + "Col3CapContri") != 0
                    || document.getElementById("frm1702EX:txtPg6S8I" + i + "Col4PTotal").value * 1 != 0) && checkEmptyTIN('txtPg6S8I' + i + 'Col2TIN')) {
                alert('Please enter valid tin number on Page 6 Schedule 8 Item ' + i);
                isValid = false;
                return false;
            }
            if (!checkEmptyTIN('txtPg6S8I' + i + 'Col2TIN')) {

                if (!validateTIN('txtPg6S8I' + i + 'Col2TIN', ' 6 Schedule 8  item ', i)) {
                    isValid = false;
                    return false;
                }

                if ($.trim(document.getElementById("frm1702EX:txtPg6S8I" + i + "Col1Name").value) == "") {
                    alert('Please enter a valid name on Page 6 Schedule 8  item ' + i);
                    isValid = false;
                    return false;
                }
                if (document.getElementById("frm1702EX:txtPg6S8I" + i + "Col3CapContri").value * 1 == 0 && 
                    document.getElementById("frm1702EX:chkPg6S8MembersInfo").checked == false) {
                    alert('Capital Contribution must not be zero on Page 6 Schedule 8  item ' + i);
                    isValid = false;
                    return false;
                }

                if (document.getElementById("frm1702EX:txtPg6S8I" + i + "Col4PTotal").value * 1 == 0 &&
                    document.getElementById("frm1702EX:chkPg6S8MembersInfo").checked == false) {
                    alert('Percent Total must not be zero on Page 6 Schedule 8  item ' + i);
                    isValid = false;
                    return false;
                }
            }
        }
        return isValid;
    }
    function checkEmptyTIN(tin) {
        var isEmpty = false;
        var tinID = "frm1702EX:" + tin;
        if (document.getElementById(tinID + "1").value == "" && document.getElementById(tinID + "2").value == "" && document.getElementById(tinID + "3").value == "" && document.getElementById(tinID + "4").value == "") {
            isEmpty = true;
            return true;
        }
        else if (document.getElementById(tinID + "1").value != "" || document.getElementById(tinID + "2").value != "" || document.getElementById(tinID + "3").value != "" || document.getElementById(tinID + "4").value != "") {
            isEmpty = false;
            return false;
        }

    }
    function validateTIN(tin, msg, i) {

        var tinID = "frm1702EX:" + tin;
        var isValid = true;
        if (document.getElementById(tinID + "1").value != "" || document.getElementById(tinID + "2").value != "" || document.getElementById(tinID + "3").value != "" || document.getElementById(tinID + "4").value != "") {

            if (document.getElementById(tinID + "1").value.length != document.getElementById(tinID + "1").getAttribute("maxlength") ||
                document.getElementById(tinID + "2").value.length != document.getElementById(tinID + "2").getAttribute("maxlength") ||
                document.getElementById(tinID + "3").value.length != document.getElementById(tinID + "3").getAttribute("maxlength") ||
                document.getElementById(tinID + "4").value.length != document.getElementById(tinID + "4").getAttribute("maxlength")) {
                alert('Please check TIN numbers on Page' + msg + i);
                isValid = false;
                return false;
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
                else if ((result[0].length != 2 || (result[0] > 12 || result[0] < 0))) {
                    // numeric check if greater not than 31 - Month.
                    isValid = false;
                }
                else if (result[1].length != 2 || (result[1] > 31 || result[1] < 1)) {
                    // numeric check if Date.
                    isValid = false;
                }
                else if (result[2].length != 4 || ((result[2] * 1) < 1800)) {
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
            alert('Please provide a valid date. (MM/DD/YYYY format)');
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

    
    function validateNotCurrent(element) {
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
                else if (result[2].length != 4 || ((result[2] * 1) < 1800)) {
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
            alert('Please provide a valid date. (MM/DD/YYYY format)');
            element.value = '';
            element.focus();
            isValid = false;
        }

        return isValid;
    }

    function validateIssueDateSched9(element) {
        if (validateDate(element) && element.value != "") {
            month = document.getElementById("frm1702EX:ddlPg1I2Date").value;
            yearend = document.getElementById("frm1702EX:txtPg1I2YearEnd").value;

            if (month == "" || yearend == "") {

                element.value = "";


                if (month == "") {
                    alert("Please enter a valid Month on Page 1 Item 2");
                    return false;
                }

                if (yearend == "") {
                    alert("Please enter a valid Year End on Page 1 Item 2");
                    return false;
                }

            }else {
                filingDate = new Date("20" + yearend, month, 0)

                validDate = new Date("20" + yearend, month, 01);
                validDate = new Date(validDate.setMonth(validDate.getMonth() - 12));

                issueDate = new Date(element.value);

                filingDateString = (filingDate.getMonth() + 1) + "/" + filingDate.getDate() + "/" + filingDate.getFullYear();
                validDateString = (validDate.getMonth() + 1) + "/" + validDate.getDate() + "/" + validDate.getFullYear();

                if (issueDate < validDate || issueDate > filingDate) {
                    alert("Valid Issue Date is from " + validDateString + " up to " + filingDateString + ".");
                    element.value = "";
                    element.focus();
                    return false;
                }
            }
        }


    }

    function validateEmail() {
        var mailformat = /\b[a-zA-Z0-9._%+-]+@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}\b/;
        if (document.getElementById('frm1702EX:txtPg1Pt1I12Email').value.match(mailformat) || document.getElementById('frm1702EX:txtPg1Pt1I12Email').value == '') {
            return true;
        }
        else
            alert("Please enter a valid e-mail address on page 1 item 12");
        document.getElementById('frm1702EX:txtPg1Pt1I12Email').value = '';
        document.getElementById('frm1702EX:txtPg1Pt1I12Email').focus();
        return false;
    }

    function validateCTCDate(element) {
        var ret = true;
        var inputYYYYDate = element.value.split("/")[2];
        var currentDate = new Date();

        var cert = document.getElementsByName('CTCorReg');
        var cert_value;

        for (var i = 0; i < cert.length; i++) {
            if (cert[i].checked) {
                cert_value = cert[i].value;
            }
        }

        if (!validateDate(element))
        { return false; }


        if (cert_value == 'CTC') {

            if (isNaN(inputYYYYDate) || inputYYYYDate != currentDate.getFullYear()) {
                alert('CTC year should be ' + currentDate.getFullYear() + ' only for Page 1 Item 24');
                ret = false;
                element.value = "";
            }
        }
        else if (cert_value == 'Reg') {
            if (isNaN(inputYYYYDate) || inputYYYYDate < (currentDate.getFullYear() * 1 - 50).toString()) {
                alert('CTC year should not be less than ' + (currentDate.getFullYear() * 1 - 50).toString() + ' for Page 1 Item 24');
                ret = false;
                element.value = "";
            }
        }
        return ret;
    }

    function validateAmountDescription() {
        var isValid = true;
        $(' div[id="sched3"] input[class="schedDesc"], div[id="sched4p1"] input[class="schedDesc"] , div[id="sched4p2"] input[class="schedDesc"], div[id="sched5"] input[class="schedDesc"], div[id="sched6"] input[class="schedDesc"]').each(function () {

            var currentId = $(this).attr('id');
            myCurrentvalue = document.getElementById(currentId);

            myValue = $(this).parent().parent().find('input[maxlength="12"]');

            //myValueID = myValue.attr("id");
            myFirstSplit = currentId.split("Pg")[1];
            myPage = myFirstSplit.split("S")[0];
            mySchedule = myFirstSplit.split("S")[1].split("I")[0];
            myItem = myFirstSplit.split("S")[1].split("I")[1].split("C")[0];


            if ($.trim(myCurrentvalue.value) == "" && myValue.val() != "0") {
                alert('You have an empty data on Page ' + myPage + ' Schedule ' + mySchedule + ' Item ' + myItem + '.');
                isValid = false;
                return false;
            }
            if ($.trim(myCurrentvalue.value) != "" && myValue.val() == "0") {
                alert('You entered a data on Page ' + myPage + ' Schedule ' + mySchedule + ' Item ' + myItem + '. The amount should not be zero.');
                isValid = false;
                return false;
            }
        });
        return isValid;
    }

    function checkFilingYear() {
        var txtYearEnd = document.getElementById("frm1702EX:txtPg1I2YearEnd");
        var ddlDate = document.getElementById('frm1702EX:ddlPg1I2Date');
        var currentDate = new Date();
        var isAmendedReturn = document.getElementById("frm1702EX:rdoPg1I3AmendedYes").checked; // If Amended Return Yes option is selected, set to true else false
        var isShortPeriod = document.getElementById("frm1702EX:rdoPg1I4ShortPeriodYes").checked; // If Short Period Return Yes option is selected, set to true else false

        // CALENDAR YEAR
        if (document.getElementById("frm1702EX:rdoPg1I1Calendar").checked === true) {
            if ((!isAmendedReturn && !isShortPeriod) || (!isShortPeriod && !!isAmendedReturn)) {
                ddlDate.options[12].selected = true;
                ddlDate.disabled = true;

                txtYearEnd.value = (currentDate.getFullYear() - 2000) - 1;
                txtYearEnd.disabled = false;
            }
             else if ((!!isShortPeriod && !!isAmendedReturn) || (!!isShortPeriod && !isAmendedReturn)) {
                ddlDate.disabled = false;
                ddlDate.options[0].selected = true;
                ddlDate.focus();

                txtYearEnd.value = (currentDate.getFullYear() - 2000) - 1;
                txtYearEnd.disabled = false;
            }
        }
        // FISCAL YEAR
        else if (document.getElementById("frm1702EX:rdoPg1I1Fiscal").checked === true) {
            ddlDate.options[0].selected = true;
            ddlDate.disabled = false;
            ddlDate.focus();

            txtYearEnd.disabled = false;
            txtYearEnd.value = "";
        }
    }

    function checkYearEnd() {
        var element = document.getElementById("frm1702EX:txtPg1I2YearEnd");
        var inputYear = 2000 + (element.value * 1);
        var inputMonth = (document.getElementById('frm1702EX:ddlPg1I2Date').value * 1) - 1;
        var currentDate = new Date();
        var isValid = true;

        if (element.value !== "") {
            if ((document.getElementById("frm1702EX:rdoPg1I1Fiscal").checked === true) &&
                (inputYear > currentDate.getFullYear() || (inputMonth > currentDate.getMonth() && inputYear === currentDate.getFullYear()))) {
                alert('Date (Page 1 Item 2) cannot be greater than current date when filing for Fiscal Year.');
                element.value = '';
                element.focus();

                isValid = false;
            }
            else if (document.getElementById("frm1702EX:rdoPg1I1Fiscal").checked === true && inputMonth == 11) {
                alert('Date (Page 1 Item 2) Month cannot be equal to December.');
                document.getElementById('frm1702EX:ddlPg1I2Date').value = "00";
                document.getElementById('frm1702EX:ddlPg1I2Date').focus();
                isValid = false;
            }
            // MONTH: JANUARY = 0, FEBRUARY = 1, MARCH = 2 ... NOVEMBER = 10, DECEMBER = 11
            else if ((inputYear < 2013) || (inputYear <= 2013 && (inputMonth < 8))) {
                alert("Date (Page 1 Item 2) should not be earlier than September 2013.");
                document.getElementById('frm1702EX:ddlPg1I2Date').focus();

                isValid = false;
            }
            else if ((document.getElementById("frm1702EX:rdoPg1I1Calendar").checked === true)) {
                if ((document.getElementById("frm1702EX:rdoPg1I4ShortPeriodNo").checked === true) && (inputYear >= currentDate.getFullYear())) {
                    
                    alert('Year (Page 1 Item 2) cannot be greater than or equal to current year when filing for Calendar Year.');
                    element.value = '';
                    element.focus();

                    isValid = false;
                }
                else if ((document.getElementById("frm1702EX:rdoPg1I4ShortPeriodYes").checked === true)) {
                    if ((inputYear > currentDate.getFullYear())) {
                        alert('Year (Page 1 Item 2) cannot be greater than the current year when filing for Calendar Year.');
                        
                        element.value = '';
                        element.focus();
                        isValid = false;
                    }
                    else if ((inputYear === currentDate.getFullYear()) && (inputMonth > currentDate.getMonth())) {
                        alert('Month (Page 1 Item 2) cannot be greater than  current month date when filing for Calendar Year  and  Short Period Return.');
                        document.getElementById('frm1702EX:ddlPg1I2Date').value = '';
                        document.getElementById('frm1702EX:ddlPg1I2Date').focus();
                        isValid = false;
                    }
                    else if ((inputYear === currentDate.getFullYear()) && (inputMonth == 11)) {
                        alert('Month (Page 1 Item 2) cannot be equal to december  when filing for Calendar Year and  Short Period Return.');
                        document.getElementById('frm1702EX:ddlPg1I2Date').value = '';
                        document.getElementById('frm1702EX:ddlPg1I2Date').focus();
                        isValid = false;
                    }
                }
            }
            else if (inputMonth < 0) {
                alert('(Page 1 Item 2) Month is invalid.');
                document.getElementById('frm1702EX:ddlPg1I2Date').focus();
                isValid = false;
            }
            
        }

        if (element.value !== '' && (element.value * 1) > -1 && (element.value * 1) < 10) {
            element.value = '0' + element.value * 1;
        }

        return isValid;
    }

    function Check_CTCorReg() {
        var cert = document.getElementsByName('CTCorReg');
        var cert_value;
        for (var i = 0; i < cert.length; i++) {
            if (cert[i].checked) {
                cert_value = cert[i].value;
            }
        }

        if (cert_value == 'CTC' || cert_value == 'Reg') {

            return true;
        }
        else {
            alert('Please select CTC or SEC Reg on Page 1 Item 23');
            return false;
        }
    }



    function Check_rdoPg1I5ATC() {
        var rates = document.getElementsByName('frm1702EX:rdoPg1I5ATC');
        var rate_value;
        for (var i = 0; i < rates.length; i++) {
            if (rates[i].checked) {
                rate_value = rates[i].value;
            }
        }
        var chbox;
        if (rate_value == 'IC021' || rate_value == 'IC011') {
            if (rate_value == 'IC021' && (document.getElementById("frm1702EX:chkPg6S8StockHolders").checked == true || document.getElementById("frm1702EX:chkPg6S8MembersInfo").checked == true)) {
                alert('You have selected IC021. Partners should be ticked on Page 6 Schedule 8');
                return false;
            }
            if (rate_value == 'IC011' && document.getElementById("frm1702EX:chkPg6S8Partners").checked == true) {
                alert('You have selected IC011. StockHolders should be ticked on Page 6 Schedule 8');
                return false;
            }

            return true;
        }
        else {
            alert('Please select an ATC on Page 1 Item 5');
            return false;
        }
    }
  
    function submitOnline(){
        if(confirm("You will now be redirected to eFPS Online.")){
            submitToEFPS();
        }
    }

    function checkconnection() {
        var status = navigator.onLine;
        if (status) {
            return true;
        } else {
            return false;
        }
    }

    function submitToEFPS() {

        if (checkconnection()) {
            var formVersion = Form1702EX.version;
            function getValue(stringId) {
                
                var alpha = document.getElementById(stringId).value;
                
                alpha = alpha.replace(/&/g, '&amp;');
                alpha = alpha.replace(/</g, '&lt;');
                alpha = alpha.replace(/>/g, '&gt;');
                
                return alpha;
                //if (!document.getElementById(stringId)) {
                //  console.error(stringId);
                //}
            }

            function convertDateXML(element) {
                //alert(d.getElementById('frm1702EX:'+element).value);
                var date = '';
                var dateSplit = d.getElementById('frm1702EX:' + element).value.split('/');
                var date = dateSplit[2] + '-' + dateSplit[0] + '-' + dateSplit[1];

                return date;
            }

            function getAmount(stringId) {
                return ((document.getElementById(stringId).value.indexOf(')') > 0 ? "-" : "") + document.getElementById(stringId).value.replace(/[\(\)\,]/gi, "")) * 1;
                //if (!document.getElementById(stringId)) {
                //  console.error(stringId);
                //  }
            }

            function fixAmount(elemValue) {
                return ((elemValue.indexOf(')') > 0 ? "-" : "") + elemValue.replace(/[\(\)\,]/gi, "")) * 1;
            }

            function returnPeriod() {
                var yyyyR = "20" + d.getElementById('frm1702EX:txtPg1I2YearEnd').value;
                var mmR = (d.getElementById('frm1702EX:ddlPg1I2Date').value.toString());
                var ddR = new Date(yyyyR, mmR, 0).getDate();
                var returnPeriodFormat = yyyyR + "-" + (mmR) + "-" + ddR;

                return returnPeriodFormat;
            }

            var endedyear = '20' + getValue("frm1702EX:txtPg1I2YearEnd");
            populateTaxpayer(getValue("frm1702EX:txtPg1Pt1I6TINC4"), '',
            '', '', '', '',
            '', convertDateXML("txtPg1Pt1I8DateofIncorporation"), '', '', '', getValue("frm1702EX:txtPg1Pt1I6TINC1"),
            getValue("frm1702EX:txtPg1Pt1I6TINC2"), getValue("frm1702EX:txtPg1Pt1I6TINC3"), getValue("frm1702EX:txtPg1Pt1I10RegisteredAddress"), '', '',
            returnPeriod(), getValue("frm1702EX:txtPg1Pt1I12Email"), '', (document.getElementById("frm1702EX:rdoPg1I3AmendedYes").checked == true ? "Y" : "N"), '',
            '', (document.getElementById("frm1702EX:rdoPg1I4ShortPeriodYes").checked == true ? "Y" : "N"), (document.getElementById("frm1702EX:rdoPg1I5ATCR1C3").checked == true ? "IC011" : "IC021"),
            getValue("frm1702EX:txtPg1Pt2NumberofPagesFiled"), getValue("frm1702EX:txtPg1Pt1I11ContactNumber"), getValue("frm1702EX:txtPg1Pt1I13MainLine"), getValue("frm1702EX:txtPg1Pt1I14PSICCode"), '',
            '', (document.getElementById("frm1702EX:rdoPg1I1Calendar").checked == true ? "C" : "F"), getValue("frm1702EX:ddlPg1I2Date"), endedyear, getValue("frm1702EX:rdoPg1Pt1I7RDO"),
            getValue("frm1702EX:txtPg1Pt1I18RegisteredActivity"), '', '', getValue("frm1702EX:txtPg1Pt1I9RegisteredName"), (document.getElementById("frm1702EX:rdoPg1CTC").checked == true ? "CTC" : "SEC"),
            (document.getElementById("frm1702EX:rdoPg1I3AmendedYes").checked == true ? "Y" : "N"), (document.getElementById("frm1702EX:rdoPg1I5ATCR1C3").checked == true ? "true" : "false"), (document.getElementById("frm1702EX:rdoPg1I5ATCR2C3").checked == true ? "true" : "false"), convertDateXML("txtPg1Pt1I19EffectivityFrom"),
            convertDateXML("txtPg1Pt1I19EffectivityTo"), getValue("frm1702EX:txtPg1Pt1I16LegalBasis"), getValue("frm1702EX:txtPg1Pt1I17Investment"),
            '', '', '', formVersion);

            populateTotalTaxPayable(
            getAmount("frm1702EX:txtPg1Pt2I20TotalIncome"),
            getAmount("frm1702EX:txtPg1Pt2I21AddPenalty"),
            getAmount("frm1702EX:txtPg7Sc9I19TotalFinalTax"),
            getValue("frm1702EX:txtPg1Pt2I23CommunityTax"),
            convertDateXML("txtPg1Pt1I24DateofIssue"),
            getValue("frm1702EX:txtPg1Pt1I25PlaceofIssue"),
            getAmount("frm1702EX:txtPg1Pt1I26Amount"),
            getAmount("frm1702EX:txtPg1Pt2I22TotalAmount"),
            getAmount("frm1702EX:txtPg7Sc10I8TotalIncome"));

            populateComputationOfTaxBean(getAmount("frm1702EX:txtPg2Pt4I32LessCost"),
            getAmount("frm1702EX:txtPg2Pt4I33GrossIncome"),
                '0',
                '0',
                '0',
                '0',
            getAmount("frm1702EX:txtPg2Pt4I31NetSales"),
                '0',
            getAmount("frm1702EX:txtPg2Pt4I39NetTaxable"),
                '0',
            false,
                '0',
            false,
            getAmount("frm1702EX:txtPg2Pt4I36OrdinaryAllowable"),
            true,
            getAmount("frm1702EX:txtPg2Pt4I34AddOther"),
            getAmount("frm1702EX:txtPg2Pt4I37SpecialAllowable"),
            true,
                '0',
            getAmount("frm1702EX:txtPg2Pt4I35TotalGross"),
            getAmount("frm1702EX:txtPg2Pt4I41TotalIncome"),
            getAmount("frm1702EX:txtPg2Pt4I38TotalItemized"),
            '0');

            populateTaxReliefAvailment(getAmount("frm1702EX:txtPg2Pt5I42RegularIncome"),
            getAmount("frm1702EX:txtPg2Pt5I43SpecialAllowable"),
            getAmount("frm1702EX:txtPg2Pt5I44TotalTax"));

            populateExternalAuditorAccreditedTaxAgentBean(getValue("frm1702EX:txtPg2Pt6I45NameofExternalAuditor"),
            getValue("frm1702EX:txtPg2Pt6I46TinC1") + getValue("frm1702EX:txtPg2Pt6I46TinC2") + getValue("frm1702EX:txtPg2Pt6I46TinC3"),
            getValue("frm1702EX:txtPg2Pt6I47NameofSigningPartner"),
            getValue("frm1702EX:txtPg2Pt6I48TinC1") + getValue("frm1702EX:txtPg2Pt6I48TinC2") + getValue("frm1702EX:txtPg2Pt6I48TinC3"),
            getValue("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC1") + getValue("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC2") + getValue("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC3") + getValue("frm1702EX:txtPg2Pt6I49BIRAccreditedNoC4"),
            convertDateXML("txtPg2Pt6I50IssueDate"),
            convertDateXML("txtPg2Pt6I51ExpiryDate"),
            getValue("frm1702EX:txtPg2Pt6I46TinC4"),
            getValue("frm1702EX:txtPg2Pt6I48TinC4"));

            //Schedule1                     
            populateSalesRevenueBean(getAmount("frm1702EX:txtPg3S1I1GoodsProp"),
            getAmount("frm1702EX:txtPg3S1I2SaleServices"),
            getAmount("frm1702EX:txtPg3S1I3LeaseProp"),
            getAmount("frm1702EX:txtPg3S1I4Total"),
            getAmount("frm1702EX:txtPg3S1I5LessSales"),
            getAmount("frm1702EX:txtPg3S1I6NetSales"));

            //Schedule2                     
            populateCostOfSaleBean(getAmount("frm1702EX:txtPg3S2I1MerchInventory"),
            getAmount("frm1702EX:txtPg3S2I2AddPurchases"),
            getAmount("frm1702EX:txtPg3S2I3TotalGoods"),
            getAmount("frm1702EX:txtPg3S2I4LessMerch"),
            getAmount("frm1702EX:txtPg3S2I5CostSales"),
            getAmount("frm1702EX:txtPg3S2I6DirectMaterials"),
            getAmount("frm1702EX:txtPg3S2I7AddPurchases"),
            getAmount("frm1702EX:txtPg3S2I8MaterialsAvailable"),
            getAmount("frm1702EX:txtPg3S2I9DirectMaterials"),
            getAmount("frm1702EX:txtPg3S2I10RawMaterials"),
            getAmount("frm1702EX:txtPg3S2I11DirectLabor"),
            getAmount("frm1702EX:txtPg3S2I12ManOverhead"),
            getAmount("frm1702EX:txtPg3S2I13TotalMan"),
            getAmount("frm1702EX:txtPg3S2I14WorkProcess"),
            getAmount("frm1702EX:txtPg3S2I15LessWork"),
            getAmount("frm1702EX:txtPg3S2I16CostOfGoods"),
            getAmount("frm1702EX:txtPg3S2I17FinishedGoods"),
            getAmount("frm1702EX:txtPg3S2I18LessFinished"),
            getAmount("frm1702EX:txtPg3S2I19GoodsManAndSold"),
            getAmount("frm1702EX:txtPg3S2I20DirectWage"),
            getAmount("frm1702EX:txtPg3S2I21DirectMaterials"),
            getAmount("frm1702EX:txtPg3S2I22DirectDepreciation"),
            getAmount("frm1702EX:txtPg3S2I23DirectRental"),
            getAmount("frm1702EX:txtPg3S2I24DirectOutside"),
            getAmount("frm1702EX:txtPg3S2I25DirectOthers"),
            getAmount("frm1702EX:txtPg3S2I26TotalCostServices"),
            getAmount("frm1702EX:txtPg3S2I27TotalCostSales"));
        }
    }

    function loadToArray() {
        numRows = document.getElementById("Pg4S3I3PopTable").rows.length;
        table = document.getElementById("Pg4S3I3PopTable");

        Pg4S3I3_Col1 = new Array();
        Pg4S3I3_Col2 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                Pg4S3I3_Col1.push(table.rows[x].cells[0].children[1].value);
                Pg4S3I3_Col2.push(table.rows[x].cells[1].children[0].value);
            }
        }

        numRows = document.getElementById("Pg4S4I4PopTable").rows.length;
        table = document.getElementById("Pg4S4I4PopTable");

        Pg4S4I4_Col1 = new Array();
        Pg4S4I4_Col2 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                Pg4S4I4_Col1.push(table.rows[x].cells[0].children[1].value);
                Pg4S4I4_Col2.push(table.rows[x].cells[1].children[0].value);
            }
        }


        numRows = document.getElementById("Pg5S4I39PopTable").rows.length;
        table = document.getElementById("Pg5S4I39PopTable");

        Pg5S4I39_Col1 = new Array();
        Pg5S4I39_Col2 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                Pg5S4I39_Col1.push(table.rows[x].cells[0].children[1].value);
                Pg5S4I39_Col2.push(table.rows[x].cells[1].children[0].value);
            }
        }

        numRows = document.getElementById("Pg5S5I4PopTable").rows.length;
        table = document.getElementById("Pg5S5I4PopTable");

        Pg5S5I4_Col1 = new Array();
        Pg5S5I4_Col2 = new Array();
        Pg5S5I4_Col3 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                Pg5S5I4_Col1.push(table.rows[x].cells[0].children[1].value);
                Pg5S5I4_Col2.push(table.rows[x].cells[1].children[0].value);
                Pg5S5I4_Col3.push(table.rows[x].cells[2].children[0].value);
            }
        }

        numRows = document.getElementById("Pg5S6I3PopTable").rows.length;
        table = document.getElementById("Pg5S6I3PopTable");

        Pg5S6I3_Col1 = new Array();
        Pg5S6I3_Col2 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                Pg5S6I3_Col1.push(table.rows[x].cells[0].children[1].value);
                Pg5S6I3_Col2.push(table.rows[x].cells[1].children[0].value);
            }
        }

        numRows = document.getElementById("Pg5S6I6PopTable").rows.length;
        table = document.getElementById("Pg5S6I6PopTable");

        Pg5S6I6_Col1 = new Array();
        Pg5S6I6_Col2 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                Pg5S6I6_Col1.push(table.rows[x].cells[0].children[1].value);
                Pg5S6I6_Col2.push(table.rows[x].cells[1].children[0].value);
            }
        }

        numRows = document.getElementById("Pg5S6I8PopTable").rows.length;
        table = document.getElementById("Pg5S6I8PopTable");

        Pg5S6I8_Col1 = new Array();
        Pg5S6I8_Col2 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                Pg5S6I8_Col1.push(table.rows[x].cells[0].children[1].value);
                Pg5S6I8_Col2.push(table.rows[x].cells[1].children[0].value);
            }
        }

        numRows = document.getElementById("Pg7S9Pt1PopTable").rows.length;
        table = document.getElementById("Pg7S9Pt1PopTable");

        Pg7S9Pt1_Col1 = new Array();
        Pg7S9Pt1_Col2 = new Array();
        Pg7S9Pt1_Col3 = new Array();
        Pg7S9Pt1_Col4 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                Pg7S9Pt1_Col1.push(table.rows[x].cells[0].children[1].value);
                Pg7S9Pt1_Col2.push(table.rows[x].cells[1].children[0].value);
                Pg7S9Pt1_Col3.push(table.rows[x].cells[2].children[0].value);
                Pg7S9Pt1_Col4.push(table.rows[x].cells[3].children[0].value);
            }
        }
    }

    function loadToDiv() {
        $('#Pg7S9Pt2IterationDivSaver').html($('#Pg7S9Pt2IterationDiv').html());
        Save_popDiv('#Pg7S9Pt2IterationDivSaver', '#Pg7S9Pt2IterationDiv');
        $('#Pg7S9Pt2IterationDiv').html('');

        $('#Pg7S9Pt3IterationDivSaver').html($('#Pg7S9Pt3IterationDiv').html());
        Save_popDiv('#Pg7S9Pt3IterationDivSaver', '#Pg7S9Pt3IterationDiv');
        $('#Pg7S9Pt3IterationDiv').html('');

        $('#Pg7S9Pt4IterationDivSaver').html($('#Pg7S9Pt4IterationDiv').html());
        Save_popDiv('#Pg7S9Pt4IterationDivSaver', '#Pg7S9Pt4IterationDiv');
        $('#Pg7S9Pt4IterationDiv').html('');

        $('#Pg7S9Pt5IterationDivSaver').html($('#Pg7S9Pt5IterationDiv').html());
        Save_popDiv('#Pg7S9Pt5IterationDivSaver', '#Pg7S9Pt5IterationDiv');
        $('#Pg7S9Pt5IterationDiv').html('');

        $('#Pg7S9Pt6IterationDivSaver').html($('#Pg7S9Pt6IterationDiv').html());
        Save_popDiv('#Pg7S9Pt6IterationDivSaver', '#Pg7S9Pt6IterationDiv');
        $('#Pg7S9Pt6IterationDiv').html('');
    }

    function checkMoreButtons() {
        Check_Pg4S3I3();
        if (document.getElementById("frm1702EX:txtPg4S3I3Col1").value == "OTHERS") {
            $(document.getElementById("frm1702EX:txtPg4S3I3Col1")).prop('disabled', true);
            $(document.getElementById("frm1702EX:txtPg4S3I3Col2")).prop('disabled', true);
        }

        Check_Pg4S4I4();
        if (document.getElementById("frm1702EX:txtPg4S4I4Col1").value == "OTHERS") {
            $(document.getElementById("frm1702EX:txtPg4S4I4Col1")).prop('disabled', true);
            $(document.getElementById("frm1702EX:txtPg4S4I4Col2")).prop('disabled', true);
        }

        Check_Pg5S4I39();
        if (document.getElementById("frm1702EX:txtPg5S4I39Col1").value == "OTHERS") {
            $(document.getElementById("frm1702EX:txtPg5S4I39Col1")).prop('disabled', true);
            $(document.getElementById("frm1702EX:txtPg5S4I39Col2")).prop('disabled', true);
        }

        Check_Pg5S5I4();
        if (document.getElementById("frm1702EX:txtPg5S5I4Col1").value == "OTHERS") {
            $(document.getElementById("frm1702EX:txtPg5S5I4Col1")).prop('disabled', true);
            $(document.getElementById("frm1702EX:txtPg5S5I4Col2")).prop('disabled', true);
        }

        Check_Pg5S6I3();
        if (document.getElementById("frm1702EX:txtPg5S6I3Col1").value == "OTHERS") {
            $(document.getElementById("frm1702EX:txtPg5S6I3Col1")).prop('disabled', true);
            $(document.getElementById("frm1702EX:txtPg5S6I3Col2")).prop('disabled', true);
        }
        Check_Pg5S6I6();
        if (document.getElementById("frm1702EX:txtPg5S6I6Col1").value == "OTHERS") {
            $(document.getElementById("frm1702EX:txtPg5S6I6Col1")).prop('disabled', true);
            $(document.getElementById("frm1702EX:txtPg5S6I6Col2")).prop('disabled', true);
        }
        Check_Pg5S6I8();
        if (document.getElementById("frm1702EX:txtPg5S6I8Col1").value == "OTHERS") {
            $(document.getElementById("frm1702EX:txtPg5S6I8Col1")).prop('disabled', true);
            $(document.getElementById("frm1702EX:txtPg5S6I8Col2")).prop('disabled', true);
        }

        checkBtnPg7Pt2More();
        checkBtnPg7Pt3More();
        checkBtnPg7Pt4More();
        checkBtnPg7Pt5More();
        checkBtnPg7Pt6More();
    }
    var rdoList = new Array();

    var XMLrdoFile = ''; //Object Type

    var rdoCount = 0;

    // if file is already existing
    function loadData() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");
        var elem = d.getElementById('frmMain').elements;

        //iterate Pg4S3I3Pop
        if ((response.innerHTML).indexOf('Pg4S3I3PopLength') != -1) {
            counter = (response.innerHTML).split('Pg4S3I3PopLength=')[1];
            //alert(counter);
            for (var i = 0; i < counter; i++) {
                AddRow_Pg4S3I3PopTable();
            }
        }

        if ((response.innerHTML).indexOf('Pg4S4I4PopLength') != -1) {
            counter = (response.innerHTML).split('Pg4S4I4PopLength=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                AddRow_Pg4S4I4PopTable();
            }
        }

        if ((response.innerHTML).indexOf('Pg5S4I39PopLength') != -1) {
            counter = (response.innerHTML).split('Pg5S4I39PopLength=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                AddRow_Pg5S4I39PopTable();
            }
        }

        if ((response.innerHTML).indexOf('Pg5S5I4PopLength') != -1) {
            counter = (response.innerHTML).split('Pg5S5I4PopLength=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                AddRow_Pg5S5I4PopTable();
            }
        }

        if ((response.innerHTML).indexOf('Pg5S6I3PopLength') != -1) {
            counter = (response.innerHTML).split('Pg5S6I3PopLength=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                AddRow_Pg5S6I3PopTable();
            }
        }

        if ((response.innerHTML).indexOf('Pg5S6I6PopLength') != -1) {
            counter = (response.innerHTML).split('Pg5S6I6PopLength=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                AddRow_Pg5S6I6PopTable();
            }
        }

        if ((response.innerHTML).indexOf('Pg5S6I8PopLength') != -1) {
            counter = (response.innerHTML).split('Pg5S6I8PopLength=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                AddRow_Pg5S6I8PopTable();
            }
        }

        if ((response.innerHTML).indexOf('Pg7S9Pt1PopLength') != -1) {
            counter = (response.innerHTML).split('Pg7S9Pt1PopLength=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                AddRow_Pg7S9Pt1PopTable();
            }
        }

        if ((response.innerHTML).indexOf('Pg7S9Pt2PopLength') != -1) {
            counter = (response.innerHTML).split('Pg7S9Pt2PopLength=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                AddDiv_Pg7S9Pt2PopDiv();
            }
        }

        if ((response.innerHTML).indexOf('Pg7S9Pt3PopLength') != -1) {
            counter = (response.innerHTML).split('Pg7S9Pt3PopLength=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                AddDiv_Pg7S9Pt3PopDiv();
            }
        }
        if ((response.innerHTML).indexOf('Pg7S9Pt4PopLength') != -1) {
            counter = (response.innerHTML).split('Pg7S9Pt4PopLength=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                AddDiv_Pg7S9Pt4PopDiv();
            }
        }
        if ((response.innerHTML).indexOf('Pg7S9Pt5PopLength') != -1) {
            counter = (response.innerHTML).split('Pg7S9Pt5PopLength=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                AddDiv_Pg7S9Pt5PopDiv();
            }
        }
        if ((response.innerHTML).indexOf('Pg7S9Pt6PopLength') != -1) {
            counter = (response.innerHTML).split('Pg7S9Pt6PopLength=')[1];
            // alert(counter);
            for (var i = 0; i < counter; i++) {
                AddDiv_Pg7S9Pt6PopDiv();
            }
        }

        var rdoCode;
        for (var i = 0; i < elem.length; i++) {

            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&           
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String($("#response").html()).split(elem[i].id + '=');
                    if (elem[i].id == 'frm1702EX:txtPg1Pt1I9RegisteredName' || elem[i].id == 'frm1702EX:txtPg1Pt1I13MainLine' || elem[i].id == 'frm1702EX:txtPg1Pt1I10RegisteredAddress') {
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }  else if (elem[i].id == 'frm1702EX:txtZIP') {
                        p3TPZip = fieldVal[1];
                        elem[i].value = fieldVal[1];
                        //alert("2==" + p3TPZip);
                    }
                    else {
                        elem[i].value = fieldVal[1]; //all select-one and text values               
                    }

                    if (elem[i].id == 'frm1702EX:rdoPg1Pt1I7RDO') {
                        rdoCode = fieldVal[1];
                    }

                }
                if (elem[i].type == 'radio') {
                    var rdoVal = String($("#response").html()).split(elem[i].id + '=');
                    if (rdoVal[1] == 'true') {
                        elem[i].checked = rdoVal[1];
                        //elem[i].onclick(); dgarfin: commented since it hinders the rest of the elements to load its values 
                    }
                }
                if (elem[i].type == 'checkbox') {
                    var chkboxVal = String($("#response").html()).split(elem[i].id + '=');
                    if (chkboxVal[1] == 'true') {
                        elem[i].checked = chkboxVal[1];
                    }
                }
                //dgarfin: temporarily commented until modalAtc popup show/hide 
                //if (elem[i].type == 'button' && elem[i].id == 'btnOkPop') {
                //  elem[i].onclick();              
                //}                 
            }

        }

        var data = "<select id='frm1702EX:rdoPg1Pt1I7RDO' name='frm1702EX:rdoPg1Pt1I7RDO' disabled='disabled' size='1'><option value='" + rdoCode + "' selected>" + rdoCode + "</option>";
        $('#rdoContainer').html(data);

        //document.getElementById('frm1702EX:txtPg1Pt1I12Email').value = globalEmail;
        document.getElementById('frm1702EX:txtPg1Pt1I12Email').disabled = true;

        Select_rdoPg1I5ATCReload();
    }

    function loadXMLWellFormed(loadWhere) {
        try {

            //This will load the file with filename loadWhere if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            XMLFile = fsoXML.OpenTextFile(loadWhere, 1);
            if (XMLFile.AtEndOfStream)
                data = "";
            else {
                var response = d.getElementById('response'); //render file and write to hidden div
                response.innerHTML = XMLFile.ReadAll(); //remove XML tag
            }
            XMLFile.Close(); //alert( response.innerHTML ); //Debug             
            loadWFData(); /*This will load data onto fields*/
            if (response.innerHTML.indexOf("All Rights Reserved BIR 2014.0") >= 0) {
                gIsReadOnly = true;
            }

            if (gIsReadOnly) {
                d.getElementById('frm1702EX:btnValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
            }
            window.setTimeout("$('#loader').hide('blind');", 2000);
        } catch (e) {
            //msg.innerHTML = "Save File not Found.";
        } //this will Alert File not Found if it doesn't exist
    }

    function loadWFData() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");
        var elem = d.getElementById('frmMain').elements;
        for (var i = 0; i < elem.length; i++) {

            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&           
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String(response.innerHTML).split(elem[i].id + '>');
                    // elem[i].value = fieldVal[1]; //all select-one and text values         
                    if (fieldVal != null && fieldVal.length > 1) {
                        elem[i].value = fieldVal[1].substring(0, fieldVal[1].indexOf("</"));
                    }
                }
                if (elem[i].type == 'radio') {
                    var rdoVal = String(response.innerHTML).split(elem[i].id + '>');
                    if (rdoVal[1] == 'true') {
                        // elem[i].checked = rdoVal[1];
                        if (rdoVal != null && rdoVal.length > 1) {
                            elem[i].value = rdoVal[1].substring(0, rdoVal[1].indexOf("</"));
                        }
                        //elem[i].onclick(); dgarfin: commented since it hinders the rest of the elements to load its values 
                    }
                }
                if (elem[i].type == 'checkbox') {
                    var chkboxVal = String(response.innerHTML).split(elem[i].id + '>');
                    if (chkboxVal[1] == 'true') {
                        // elem[i].checked = chkboxVal[1];
                        if (chkboxVal != null && chkboxVal.length > 1) {
                            elem[i].value = chkboxVal[1].substring(0, chkboxVal[1].indexOf("</"));
                        }
                    }
                }
                //dgarfin: temporarily commented until modalAtc popup show/hide 
                //if (elem[i].type == 'button' && elem[i].id == 'btnOkPop') {
                //  elem[i].onclick();              
                //}                 
            }

        }
    }

    // if file is already existing
    function loadXML(loadWhere) {
        var url = document.getElementsByName('base_url')[0].getAttribute('content');
    
        var xmlHTTP = new XMLHttpRequest();
        try
        {
            xmlHTTP.open("GET", url + loadWhere, false);
            xmlHTTP.send(null);
        }
        catch (e) {
            window.alert("Unable to load the requested file.");
            return;
        }
        document.getElementById("response").innerHTML=xmlHTTP.responseText;
        loadData(); /*This will load data onto fields*/                             
                
        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
        }

        if (gIsReadOnly) {
                d.getElementById('frm1702EX:btnValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
        }

    }


    function validate() {

        if (validateAll()) {
            alert("Validation successful. Click on Edit if you wish to modify your entries.");
            getDisabledText();
            disableAllControl();
            document.getElementById("frm1702EX:btnEdit").disabled = false;
            document.getElementById("btnUpload").disabled = false;
            document.getElementById("frm1702EX:btnFinalCopy").disabled = false;
            document.getElementById("frm1702EX:btnValidate").disabled = true;
            document.getElementById("frm1702EX:btnPrevPage").disabled = false;
            document.getElementById("frm1702EX:btnNextPage").disabled = false;
            document.getElementById("btnSave").disabled = false;
            document.getElementById("Pg7S9Pt1More").disabled = false;
            document.getElementById("btnPrint").disabled = false;
            return;
        }
        else {
            document.getElementById("frm1702EX:btnEdit").disabled = true;
            document.getElementById("btnUpload").disabled = true;
            document.getElementById("frm1702EX:btnFinalCopy").disabled = true;
            document.getElementById("btnPrint").disabled = true;
        };
    }

    function initialValidateBeforeSave() {
        //validation here
        //return true to save
        if (!checkMandatory("frm1702EX:txtPg1Pt1I9RegisteredName", "Please enter a valid name on Page 1 Item 9")) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I10RegisteredAddress", "Please enter a valid Registered Address on Page 1 Item 10.")) return false;
        if (!checkMandatory("frm1702EX:txtPg1Pt1I11ContactNumber", "Please enter a valid Contact Number on Page 1 Item 11")) return false;

        return true;
    }

    function printModal(modalID) {

        globalcancelModalInit = 1;
        globalcurrentDiv = modalID;
        $('#bg').hide();
        $('#' + modalID).removeClass("modalShow");
        $('#' + modalID).removeClass("modalShow2");
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
        alert("This form must be printed on an A4 Size Paper. Please update your Printer Settings to ensure the correct printout of the form.\n\n" +
              "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166 and all Headers & Footers must be set to empty.");

        window.print();
    }

    var disabledItems = new Array();
    var isPrint = false;
    function printme() {

        var inputs = document.getElementsByTagName("input");

        for (a = 0; a < inputs.length; a++) {
            if (inputs[a].id.indexOf("Pg" + currentPage) > -1) {
                if ((inputs[a].type == "checkbox" || inputs[a].type == "radio")) {
                    $(inputs[a]).removeClass("styled");
                    $(inputs[a].previousSibling).remove();
                    inputs[a].style.display = "none";
                    var img = Array();
                    img[a] = document.createElement("img");
                    
                    inputs[a].parentNode.insertBefore(img[a], inputs[a]);
                }
            }
        }
        
        $('.printSignFooterClass').css({ 'width': '94%', 'margin': 'auto', 'margin-top': '15px', 'display': 'block', 'position': 'relative', 'overflow': 'visible', 'page-break-before': 'always' });
        $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
    

        printPage();
        isPrint = true;
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
                    document.getElementById(elem[i].id).style.color = '#000000';
                    document.getElementById(elem[i].id).style.fontSize = "12px";
                }
                if (elem[i].type == 'radio' || elem[i].type == 'checkbox') {
                    if (document.getElementById(elem[i].id).disabled) {
                        disabledItems[x] = elem[i].id;
                        x++;
                    }
                }
                
            }

        }


        alert("This form must be printed on an A4 Size Paper. Please update your Printer Settings to ensure the correct printout of the form.\n\n" +
              "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166 and all Headers & Footers must be set to empty.");
                
        var currentPage = document.getElementById("frm1702EX:txtCurrentPage").value;

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

        $(document.getElementById("frm1702EX:txtCurrentPage")).attr("readonly", false);

    }
