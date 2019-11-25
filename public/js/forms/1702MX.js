function continous_AddRow_modalTablePg9Sc13I() {
        i = $("#tempModalDivPg9Sc13I div").length;
        $('#tempModalDivPg9Sc13I').append('<div id="tempModalDivPg9Sc13I' + (i + 1) + '" >'
                    + '                <table class="tblForm">'
                    + '				<tr>                                                                                                                                      '
                    + '					<td class="tblFormTd" style="width: 5%;">                                                                               '
                    + '					<span style="font-weight: bold; font-size: small;"> 4.' + (i + 1) + '   '

                    + '					</td>                                                                                                                                 '
                    + '					<td class="tblFormTd" style="width: 20%;">                                                                                    '
                    + '						<input type="text" id="frm1702MX:txtPg9Sc13I4other-' + (i + 1) + '"                  '
                    + '							maxlength="21" name="frm1702MX:txtPg9Sc13I4other[]"  onkeypress="return Name(this);" onblur="capitalize(this);" value="" />                           '
                    + '					</td>                                                                                                                                 '
                    + '					<td class="tblFormTd ColumnHeader" style="width: 20%;">                                                                               '
                    + '						<input type="text" id="frm1702MX:txtPg9Sc13I4CA-' + (i + 1) + '" onchange="setToZeroIfEmpty(this)" onblur="addCommas1702MX(this);"     '
                    + '							maxlength="12" name="frm1702MX:txtPg9Sc13I4CA[]"  onkeypress="return wholenumber(event, true)" value="0" class="numbertext" />                           '
                    + '					</td>                                                                                                                                 '
                    + '					<td class="tblFormTd ColumnHeader" style="width: 20%;">                                                                               '
                    + '						<input type="text" id="frm1702MX:txtPg9Sc13I4CB-' + (i + 1) + '" onchange="setToZeroIfEmpty(this)" onblur="addCommas1702MX(this);"     '
                    + '							maxlength="12" name="frm1702MX:txtPg9Sc13I4CB[]"  onkeypress="return wholenumber(event, true)" value="0" class="numbertext" />                           '
                    + '					</td>                                                                                                                                 '
                    + '					<td class="tblFormTd ColumnHeader" style="width: 20%;">                                                                               '
                    + '						<input type="text"  name="frm1702MX:txtPg9Sc13I4CC[]" id="frm1702MX:txtPg9Sc13I4CC-' + (i + 1) + '"                        '
                    + '							onchange="setToZeroIfEmpty(this)" maxlength="12" onkeypress="return wholenumber(event, true)"                                '
                    + '							onblur="addCommas1702MX(this);summationmodalDivPg9Sc13I()" value="0" class="numbertext" />             '
                    + '					</td>                                                                                                                                 '
                    + '   				<td style="width: 5%;">			'
                    + '						 <input type="button" value="Remove" onclick="deleteDiv(this),FixId_modalDivPg9Sc13I()"/> '
                    + '                  </td> '
                    + '				</tr>                                                                                                                                     '
                    + ' </table>'

                    + ' </div> '
                    );
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function AddRow_modalTablePg9Sc13I() {
        var str1 = "";
        var str2 = 0;
        var count = 0;
        var divlength = $("#tempModalDivPg9Sc13I div").length;

        for (x = 0; x < divlength; x++) {
            var currentDivTable = $("#tempModalDivPg9Sc13I div").eq(x).find('table');

            str1 = currentDivTable.eq(0).find("td input")[0].value;
            str2 = currentDivTable.eq(0).find("td input")[3].value;
            if ($.trim(str1) == "" || str2 == 0) {
                count += 1;
            }
        }

        if (count != 0) {

            alert("Please fill up \"Description and Final Tax Withheld/ Paid\"  before you can add");
        }

        else if (count == 0) {
            i = $("#tempModalDivPg9Sc13I div").length;
            $('#tempModalDivPg9Sc13I').append('<div id="tempModalDivPg9Sc13I' + (i + 1) + '" >'
                        + '                <table class="tblForm">'
                        + '				<tr>                                                                                                                                      '
                        + '					<td class="tblFormTd" style="width: 5%;">                                                                               '
                        + '					<span style="font-weight: bold; font-size: small;"> 4.' + (i + 1) + '   '

                        + '					</td>                                                                                                                                 '
                        + '					<td class="tblFormTd" style="width: 20%;">                                                                                    '
                        + '						<input type="text" name="frm1702MX:txtPg9Sc13I4other[]" id="frm1702MX:txtPg9Sc13I4other-' + (i + 1) + '"                  '
                        + '							maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" value="" />                           '
                        + '					</td>                                                                                                                                 '
                        + '					<td class="tblFormTd ColumnHeader" style="width: 20%;">                                                                               '
                        + '						<input type="text" name="frm1702MX:txtPg9Sc13I4CA[]" id="frm1702MX:txtPg9Sc13I4CA-' + (i + 1) + '" onchange="setToZeroIfEmpty(this)" onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);"     '
                        + '							maxlength="12" onkeypress="return wholenumber(event, true)" value="0" class="numbertext" />                           '
                        + '					</td>                                                                                                                                 '
                        + '					<td class="tblFormTd ColumnHeader" style="width: 20%;">                                                                               '
                        + '						<input type="text" name="frm1702MX:txtPg9Sc13I4CB[]"  id="frm1702MX:txtPg9Sc13I4CB-' + (i + 1) + '" onchange="setToZeroIfEmpty(this)" onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);"     '
                        + '							maxlength="12" onkeypress="return wholenumber(event, true)" value="0" class="numbertext" />                           '
                        + '					</td>                                                                                                                                 '
                        + '					<td class="tblFormTd ColumnHeader" style="width: 20%;">                                                                               '
                        + '						<input type="text" name="frm1702MX:txtPg9Sc13I4CC[]"  id="frm1702MX:txtPg9Sc13I4CC-' + (i + 1) + '"               name=""          '
                        + '							onchange="setToZeroIfEmpty(this)" maxlength="12" onkeypress="return wholenumber(event, true)"                                '
                        + '							onblur="addCommas1702MX(this);summationmodalDivPg9Sc13I();getAttributeValue(this.id,this.value);" value="0" class="numbertext" />             '
                        + '					</td>                                                                                                                                 '
                        + '   				<td style="width: 5%;">			'
                        + '						 <input type="button" value="Remove" onclick="deleteDiv(this),FixId_modalDivPg9Sc13I()"/> '
                        + '                  </td> '
                        + '				</tr>                                                                                                                                     '
                        + ' </table>'

                        + ' </div> '
                        );
            $('input[type="text"]').focus(function () {
                $(this).css({ 'background': '#ffffcc' });
                this.select();
            });

            $('input[type="text"]').blur(function () {
                $(this).css({ 'background': '#ffffff' });
            });

            $(".numbertext").focus(function () {
                $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
                $(this).css({ 'background': '#ffffcc' });
                this.select();
            });
        }

    }

    function getAttributeValue(item,value){
        list = document.getElementsByClassName(item);
        document.getElementById(item).setAttribute('value',value);
    }

    function FixId_modalDivPg9Sc13I() {

        var length = $("#tempModalDivPg9Sc13I div").length;
        for (i = 0; i < length; i++) {
            var currentDivTable = $("#tempModalDivPg9Sc13I div").eq(i).find('table');
            $("#tempModalDivPg9Sc13I div")[i].setAttribute("id", "tempModalDivPg9Sc13I-" + (i + 1));
            // First column header
            currentDivTable.eq(0).find("td span").eq(0).html('4.' + (i + 1));

            //dropdown
            currentDivTable.eq(0).find("td input")[0].setAttribute("id", "frm1702MX:txtPg9Sc13I4other-" + (i + 1));
            currentDivTable.eq(0).find("td input")[1].setAttribute("id", "frm1702MX:txtPg9Sc13I4CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[2].setAttribute("id", "frm1702MX:txtPg9Sc13I4CB-" + (i + 1));
            currentDivTable.eq(0).find("td input")[3].setAttribute("id", "frm1702MX:txtPg9Sc13I4CC-" + (i + 1));

        }
    }
    function Save_modalDivPg9Sc13I() {
        var str1 = "";
        var count = 0;
        var str2 = 0;
        var divlength = $("#tempModalDivPg9Sc13I div").length;

        for (x = 0; x < divlength; x++) {
            var currentDivTable = $("#tempModalDivPg9Sc13I div").eq(x).find('table');

            str1 = currentDivTable.eq(0).find("td input")[0].value;
            str2 = currentDivTable.eq(0).find("td input")[3].value;
            if ($.trim(str1) == "" || str2 == 0) {
                count += 1;
            }
        }

        if (count != 0) {

            alert("Please fill up \"Description and Final Tax Withheld/ Paid\"  before you can save");
        }

        else if (count == 0) {
            FixId_modalDivPg9Sc13I();

            $("#mainModalDivPg9Sc13I").html(function () {
                return $("#tempModalDivPg9Sc13I").html();
            });


            $("#tempModalDivPg9Sc13I div").remove();

            computePg9Sc13I19I();
            computePg9Sc13I19();
            Load_modalDivPg9Sc13I();
            count2 = $("#mainModalDivPg9Sc13I div").length;

            if (count2 > 0) {
                document.getElementById("frm1702MX:txtCtrmodalPg9Sc13I").value = count2;
            }
        }
    }
    function Load_modalDivPg9Sc13I() {
        $("#tempModalDivPg9Sc13I").html(function () {
            return $("#mainModalDivPg9Sc13I").html();
        });


    }
    function Cancel_modalDivPg9Sc13I() {
        $("#tempModalDivPg9Sc13I").html(function () {
            return $("#mainModalDivPg9Sc13I").html();
        });

    }
    function SaveAndClose_modalDivPg9Sc13I() {
        var str1 = "";
        var str2 = 0;
        var count = 0;
        var divlength = $("#tempModalDivPg9Sc13I div").length;

        for (x = 0; x < divlength; x++) {
            var currentDivTable = $("#tempModalDivPg9Sc13I div").eq(x).find('table');

            str1 = currentDivTable.eq(0).find("td input")[0].value;
            str2 = currentDivTable.eq(0).find("td input")[3].value;
            if ($.trim(str1) == "" || str2 == 0) {
                count += 1;
            }
        }

        if (count != 0) {

            alert("Please fill up \"Description and Final Tax Withheld/ Paid\"  before you can savesave");
        }

        else if (count == 0) {
            FixId_modalDivPg9Sc13I();

            $("#mainModalDivPg9Sc13I").html(function () {
                return $("#tempModalDivPg9Sc13I").html();
            });


            $("#tempModalDivPg9Sc13I div").remove();

            computePg9Sc13I19I();
            computePg9Sc13I19();
            Load_modalDivPg9Sc13I();
            count2 = $("#mainModalDivPg9Sc13I div").length;

            if (count2 > 0) {
                document.getElementById("frm1702MX:txtCtrmodalPg9Sc13I").value = count2;
            }
            closeDialog('popModalDivPg9Sc13I');
        }
    }
    function summationmodalDivPg9Sc13I() {

        var length = $("#tempModalDivPg9Sc13I div").length;
        var subTotal = 0;
        for (i = 0; i < length; i++) {
            var currentDivTable = $("#tempModalDivPg9Sc13I div").eq(i).find('table');
            $("#tempModalDivPg9Sc13I div")[i].setAttribute("id", "tempModalDivPg9Sc13I-" + (i + 1));


            subTotal += NumWithComma(NumWithParenthesis(currentDivTable.eq(0).find("td input")[3].value));


        }

        document.getElementById('frm1702MX:txtPg9Sc13I_SubTotal').value = NegativeValue(formatCurrencyWOC(subTotal));
    }
    function deleteDiv(btn) {
        $(btn).closest('div').remove();
    }
    function clearTempHTML() {
        $("#tempModalDivPg9Sc13II div").remove();
        $("#tempModalDivPg9Sc13III div").remove();
        $("#tempModalDivPg9Sc13IV div").remove();
        $("#tempModalDivPg9Sc14I div").remove();
        $("#tempModalDivPg9Sc14II div").remove();
    }
    function AddrowChecking_ModalColumn(modalDiv, paramFunction, desc) {
        var str1 = "";
        var str2 = "";
        var count = 0;
        var divlength = $(modalDiv).length;
        for (i = 0; i < divlength; i++) {
            var currentDivTable = $(modalDiv).eq(i).find('table');

            str1 = currentDivTable.eq(0).find("td input")[0].value;
            str2 = currentDivTable.eq(0).find("td input")[1].value;
            if ($.trim(str1) == "" || $.trim(str2) == "") {
                count += 1;
            }
        }
        if (count != 0) {
            if (desc == 1) {
                alert("Please fill up \"Description of Property\" before you can add.");
            }
            if (desc == 2) {
                alert("Please fill up \"Kind (PS/CS) Stock Certificate Series No.\" before you can add.");
            }
            if (desc == 3) {
                alert("Please fill up \"Other Income Subject to Final Tax Under Sec. 57(A)/127/others of the Tax Code, as amended\" before you can add.");
            }
            if (desc == 4) {
                alert("Please fill up \"Other Exempt Income/Receipts Under Sec. 32 (B) of the Tax Code, as amended\" before you can add.");
            }

        }
        else if (count == 0) {
            paramFunction();
        }

    }
    function AddRow_modalTablePg9Sc13II() {
        var myDiv = document.getElementById("tempModalDivPg9Sc13II");
        i = $("#tempModalDivPg9Sc13II div").length;
        $('#tempModalDivPg9Sc13II').append('<div id="tempModalDivPg9Sc13II' + (i + 1) + '" >'
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
                        + '                             <input type="text" id="frm1702MX:txtPg9Sc13I5CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I5CA1[]" size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "0" + 1) + '" />'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                             <input type="text" id="frm1702MX:txtPg9Sc13I5CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I5CB2[]" size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "1" + 1) + '" />'
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
                        + '                            <input type="text"  id="frm1702MX:txtPg9Sc13I6CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I6CA1[]" size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "0" + 2) + '" />'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <input type="text"  id="frm1702MX:txtPg9Sc13I6CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I6CB2[]" size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "1" + 2) + '" />'
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
                        + '                            <input type="text"  id="frm1702MX:txtPg9Sc13I7CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I7CA1[]" size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "0" + 3) + '" />'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <input type="text"  id="frm1702MX:txtPg9Sc13I7CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I7CB2[]" size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "1" + 3) + '" />'
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
                        + '                            <input type="text" id="frm1702MX:txtPg9Sc13I8CA-' + (i + 1) + '"  name="frm1702MX:txtPg9Sc13I8CA1[]" maxlength="12" size="30" onchange="setToZeroIfEmpty(this)" onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);"  onkeypress="return wholenumber(event, true)"'
                        + '                                value="0" class="numbertext" tabindex="' + (i + "0" + 4) + '" />'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                            <input type="text" id="frm1702MX:txtPg9Sc13I8CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I8CB2[]"  maxlength="12" size="30" onchange="setToZeroIfEmpty(this)" onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);"  onkeypress="return wholenumber(event, true)"'
                        + '                                value="0" class="numbertext" tabindex="' + (i + "1" + 4) + '" />'
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
                        + '                            <input type="text" name="frm1702MX:txtPg9Sc13I9CA1[]"  onchange="setToZeroIfEmpty(this)"   id="frm1702MX:txtPg9Sc13I9CA-' + (i + 1) + '" onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);" maxlength="12" onkeypress="return wholenumber(event, true)"'
                        + '                                  value="0" class="numbertext" size="30" tabindex="' + (i + "0" + 5) + '" />'
                        + '                 </td>'
                        + '                     <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                         <input type="text" name="frm1702MX:txtPg9Sc13I9CB2[]"  onchange="setToZeroIfEmpty(this)"   id="frm1702MX:txtPg9Sc13I9CB-' + (i + 1) + '" onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);" maxlength="12" onkeypress="return wholenumber(event, true)"'
                        + '                              value="0" class="numbertext" size="30" tabindex="' + (i + "1" + 5) + '" />'
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
                        + ' <input type="button" value="Remove" onclick="deleteDiv(this),FixId_modalDivPg9Sc13II()" tabindex="' + (i + "1" + 6) + '" /> '
                        + '                         </td>'
                        + '                   </tr> '
                        + '             </table>'
                        + ' </div> '
                        );

        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function FixId_modalDivPg9Sc13II() {

        var length = $("#tempModalDivPg9Sc13II div").length;
        for (i = 0; i < length; i++) {
            var currentDivTable = $("#tempModalDivPg9Sc13II div").eq(i).find('table');
            $("#tempModalDivPg9Sc13II div")[i].setAttribute("id", "tempModalDivPg9Sc13II-" + (i + 1));
            // First column header
            currentDivTable.eq(0).find("td span").eq(0).html(LetterIteration((i * 2) + 3, 1));
            //second column header
            currentDivTable.eq(0).find("td span").eq(1).html(LetterIteration((i * 2) + 4, 1));
            //dropdown
            currentDivTable.eq(0).find("td input")[0].setAttribute("id", "frm1702MX:txtPg9Sc13I5CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[1].setAttribute("id", "frm1702MX:txtPg9Sc13I5CB-" + (i + 1));
            //OCT
            currentDivTable.eq(0).find("td input")[2].setAttribute("id", "frm1702MX:txtPg9Sc13I6CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[3].setAttribute("id", "frm1702MX:txtPg9Sc13I6CB-" + (i + 1));
            //CAR
            currentDivTable.eq(0).find("td input")[4].setAttribute("id", "frm1702MX:txtPg9Sc13I7CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[5].setAttribute("id", "frm1702MX:txtPg9Sc13I7CB-" + (i + 1));
            //ActualAmount
            currentDivTable.eq(0).find("td input")[6].setAttribute("id", "frm1702MX:txtPg9Sc13I8CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[7].setAttribute("id", "frm1702MX:txtPg9Sc13I8CB-" + (i + 1));
            //FinalTax
            currentDivTable.eq(0).find("td input")[8].setAttribute("id", "frm1702MX:txtPg9Sc13I9CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[9].setAttribute("id", "frm1702MX:txtPg9Sc13I9CB-" + (i + 1));
        }
    }
    function Save_modalDivPg9Sc13II() {

        FixId_modalDivPg9Sc13II();

        $("#mainModalDivPg9Sc13II").html(function () {
            return $("#tempModalDivPg9Sc13II").html();
        });


        $("#tempModalDivPg9Sc13II div").remove();

        computePg9Sc13I19II();
        computePg9Sc13I19();
        Load_modalDivPg9Sc13II();
        count = $("#mainModalDivPg9Sc13II div").length;
        if (count > 0) {
            document.getElementById("frm1702MX:txtCtrmodalPg9Sc13II").value = count;
        }
    }
    function Load_modalDivPg9Sc13II() {
        $("#tempModalDivPg9Sc13II").html(function () {
            return $("#mainModalDivPg9Sc13II").html();
        });


    }
    function Cancel_modalDivPg9Sc13II() {
        $("#tempModalDivPg9Sc13II").html(function () {
            return $("#mainModalDivPg9Sc13II").html();
        });

    }
    function AddRow_modalTablePg9Sc13III() {
        var myDiv = document.getElementById("tempModalDivPg9Sc13III");
        i = $("#tempModalDivPg9Sc13III div").length;
        $('#tempModalDivPg9Sc13III').append('<div id="tempModalDivPg9Sc13III' + (i + 1) + '" >'
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
                        + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                        + '                           <select id="frm1702MX:drpPg9Sc13I10CA-1-' + (i + 1) + '" onchange="getSelectedValue(this);" name="frm1702MX:drpPg9Sc13I10CA1[]" tabindex="' + (i + "0" + 1) + '">                                                                                     '
                        + '                               <option value="PS">PS</option>                                                                                            '
                        + '                               <option value="CS">CS</option>                                                                                            '
                        + '                           </select>/                                                                                                                    '
                        + '                           <input type="text" id="frm1702MX:txtPg9Sc13I10CA-2-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I10CA2[]" size="20" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id, this.value);" tabindex="' + (i + "0" + 1) + '" />                                                               '
                        + '                       </td>                                                                                                                             '
                        + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                        + '                           <select id="frm1702MX:drpPg9Sc13I10CB-1-' + (i + 1) + '" onchange="getSelectedValue(this);" name="frm1702MX:drpPg9Sc13I10CB1[]" tabindex="' + (i + "1" + 1) + '">                                                                                     '
                        + '                               <option value="PS">PS</option>                                                                                            '
                        + '                               <option value="CS">CS</option>                                                                                            '
                        + '                           </select>/                                                                                                                    '
                        + '                           <input type="text" id="frm1702MX:txtPg9Sc13I10CB-2-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I10CB2[]" size="20" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id, this.value);" tabindex="' + (i + "1" + 1) + '" />                                                               '
                        + '                       </td>                                                                                                                             '
                        + '                   </tr>                                                                                                                                 '
                        + '                                                                                                                                                         '
                        + '                   <tr>                                                                                                                                  '
                        + '                       <td class="tblFormTd ContentBold">                                                                                                '
                        + '                           <span style="font-weight: bold;">11</span>                                                                                    '
                        + '                       </td>                                                                                                                             '
                        + '                       <td class="tblFormTd">                                                                                                            '
                        + '                           <span style="font-size: small;">Certificate Authorizing Reg. (CAR) No.</span>                                                 '
                        + '                       </td>                                                                                                                             '
                        + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                        + '                           <input type="text" id="frm1702MX:txtPg9Sc13I11CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I11CA1[]" size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id, this.value);" tabindex="' + (i + "0" + 2) + '" />                                                                          '
                        + '                       </td>                                                                                                                             '
                        + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                        + '                           <input type="text" id="frm1702MX:txtPg9Sc13I11CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I11CB2[]" size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id, this.value);" tabindex="' + (i + "1" + 2) + '" />                                                                          '
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
                        + '                           <input type="text" id="frm1702MX:txtPg9Sc13I12CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I12CA1[]" size="30"  onchange="setToZeroIfEmpty(this)"  onblur="addCommas1702MX(this);getAttributeValue(this.id, this.value);" maxlength="12" onkeypress="return wholenumber(event, true)"                 '
                        + '                               value="0" class="numbertext" tabindex="' + (i + "0" + 3) + '" />                                                                                   '
                        + '                       </td>                                                                                                                             '
                        + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                        + '                           <input type="text" id="frm1702MX:txtPg9Sc13I12CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I12CB2[]" size="30"  onchange="setToZeroIfEmpty(this)"  onblur="addCommas1702MX(this);getAttributeValue(this.id, this.value);" maxlength="12" onkeypress="return wholenumber(event, true)"                 '
                        + '                               value="0" class="numbertext" tabindex="' + (i + "1" + 3) + '" />                                                                                   '
                        + '                       </td>                                                                                                                             '
                        + '                   </tr>                                                                                                                                 '
                        + '                                                                                                                                                         '
                        + '                   <tr>                                                                                                                                  '
                        + '                       <td class="tblFormTd ContentBold">                                                                                                '
                        + '                           <span style="font-weight: bold;">13</span>                                                                                    '
                        + '                       </td>                                                                                                                             '
                        + '                       <td class="tblFormTd">                                                                                                            '
                        + '                           <span style="font-size: small;">Date of Issue </span><span style="font-size: x-small;                                         '
                        + '                               font-style: italic">(MM/DD/YYYY)</span>                                                                                    '
                        + '                       </td>                                                                                                                             '
                        + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                        + '                           <input type="text" id="frm1702MX:txtPg9Sc13I13CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I13CA1[]"  maxlength="10" onkeypress="return wholenumber(event, true)"       '
                        + '                               size="30" onblur="validateIssueDateSchedule13(this);getAttributeValue(this.id, this.value);" class="dateInput" onkeydown="dateMasking(this);" tabindex="' + (i + "0" + 4) + '" />'
                        + '                        </td>                                                                                                                            '
                        + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                        + '                            <input type="text" id="frm1702MX:txtPg9Sc13I13CB-' + (i + 1) + '"name="frm1702MX:txtPg9Sc13I13CB2[]"   maxlength="10" onkeypress="return wholenumber(event, true)"     '
                        + '                               size="30" onblur="validateIssueDateSchedule13(this);getAttributeValue(this.id, this.value);" class="dateInput" onkeydown="dateMasking(this);" tabindex="' + (i + "1" + 4) + '" />'
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
                        + '                           <input type="text" id="frm1702MX:txtPg9Sc13I14CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I14CA1[]"  size="30" maxlength="12"  onblur="addCommas1702MX(this);getAttributeValue(this.id, this.value);"  onchange="setToZeroIfEmpty(this)"   onkeypress="return wholenumber(event, true)"                 '
                        + '                               value="0" class="numbertext" tabindex="' + (i + "0" + 5) + '" />                                                                                   '
                        + '                       </td>                                                                                                                             '
                        + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                        + '                           <input type="text" id="frm1702MX:txtPg9Sc13I14CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I14CB2[]" size="30" maxlength="12"  onblur="addCommas1702MX(this);getAttributeValue(this.id, this.value);"  onchange="setToZeroIfEmpty(this)"   onkeypress="return wholenumber(event, true)"                 '
                        + '                               value="0" class="numbertext" tabindex="' + (i + "1" + 5) + '" />                                                                                   '
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
                        + '                           <input type="text" id="frm1702MX:txtPg9Sc13I15CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I15CA1[]"  size="30" maxlength="12"  onblur="addCommas1702MX(this);getAttributeValue(this.id, this.value);"  onchange="setToZeroIfEmpty(this)"   onkeypress="return wholenumber(event, true)"                 '
                        + '                                Name="frm1702MX:txtPg9Sc13I19name-III"  value="0" class="numbertext" tabindex="' + (i + "0" + 6) + '" />                                                     '
                        + '                       </td>                                                                                                                             '
                        + '                       <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                           '
                        + '                           <input type="text" id="frm1702MX:txtPg9Sc13I15CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I15CB2[]"  size="30" maxlength="12"  onblur="addCommas1702MX(this);getAttributeValue(this.id, this.value);"  onchange="setToZeroIfEmpty(this)"   onkeypress="return wholenumber(event, true)"                 '
                        + '                               Name="frm1702MX:txtPg9Sc13I19name-III"  value="0" class="numbertext" tabindex="' + (i + "1" + 6) + '" />                                                     '
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

                        + ' <input type="button" value="Remove" onclick="deleteDiv(this),FixId_modalDivPg9Sc13III()" tabindex="' + (i + "1" + 7) + '" /> '
                        + '                         </td>'
                        + '                   </tr> '
                        + ' </table> '
                        + ' </div>'
                        );
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function FixId_modalDivPg9Sc13III() {

        var length = $("#tempModalDivPg9Sc13III div").length;
        for (i = 0; i < length; i++) {
            var currentDivTable = $("#tempModalDivPg9Sc13III div").eq(i).find('table');
            $("#tempModalDivPg9Sc13III div")[i].setAttribute("id", "tempModalDivPg9Sc13III-" + (i + 1));
            // First column header
            currentDivTable.eq(0).find("td span").eq(0).html(LetterIteration((i * 2) + 3, 1));
            //second column header
            currentDivTable.eq(0).find("td span").eq(1).html(LetterIteration((i * 2) + 4, 1));
            //dropdown
            currentDivTable.eq(0).find("td select")[0].setAttribute("id", "frm1702MX:drpPg9Sc13I10CA-1-" + (i + 1));
            currentDivTable.eq(0).find("td select")[1].setAttribute("id", "frm1702MX:drpPg9Sc13I10CB-1-" + (i + 1));
            //textbox
            currentDivTable.eq(0).find("td input")[0].setAttribute("id", "frm1702MX:txtPg9Sc13I10CA-2-" + (i + 1));
            currentDivTable.eq(0).find("td input")[1].setAttribute("id", "frm1702MX:txtPg9Sc13I10CB-2-" + (i + 1));

            currentDivTable.eq(0).find("td input")[2].setAttribute("id", "frm1702MX:txtPg9Sc13I11CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[3].setAttribute("id", "frm1702MX:txtPg9Sc13I11CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[4].setAttribute("id", "frm1702MX:txtPg9Sc13I12CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[5].setAttribute("id", "frm1702MX:txtPg9Sc13I12CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[6].setAttribute("id", "frm1702MX:txtPg9Sc13I13CA-" + (i + 1));
        
            currentDivTable.eq(0).find("td input")[7].setAttribute("id", "frm1702MX:txtPg9Sc13I13CB-" + (i + 1));
            
            currentDivTable.eq(0).find("td input")[8].setAttribute("id", "frm1702MX:txtPg9Sc13I14CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[9].setAttribute("id", "frm1702MX:txtPg9Sc13I14CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[10].setAttribute("id", "frm1702MX:txtPg9Sc13I15CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[11].setAttribute("id", "frm1702MX:txtPg9Sc13I15CB-" + (i + 1));

        }
    }
    function Save_modalDivPg9Sc13III() {

        FixId_modalDivPg9Sc13III();

        $("#mainModalDivPg9Sc13III").html(function () {
            return $("#tempModalDivPg9Sc13III").html();
        });

        $("#tempModalDivPg9Sc13III div").remove();
        computePg9Sc13I19III();
        computePg9Sc13I19();
        Load_modalDivPg9Sc13III();
        count = $("#mainModalDivPg9Sc13III div").length;
        if (count > 0) {
            document.getElementById("frm1702MX:txtCtrmodalPg9Sc13III").value = count;
        }
    }
    function Load_modalDivPg9Sc13III() {
        $("#tempModalDivPg9Sc13III").html(function () {
            return $("#mainModalDivPg9Sc13III").html();
        });


    }
    function Cancel_modalDivPg9Sc13III() {
        $("#tempModalDivPg9Sc13III").html(function () {
            return $("#mainModalDivPg9Sc13III").html();
        });

    }
    function AddRow_modalTablePg9Sc13IV() {
        var myDiv = document.getElementById("tempModalDivPg9Sc13IV");
        i = $("#tempModalDivPg9Sc13IV div").length;
        $('#tempModalDivPg9Sc13IV').append('<div id="tempModalDivPg9Sc13IV' + (i + 1) + '" >'
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
                        + '                            <span style="font-size: small;">Other Income Subject to Final Tax Under Sec. 57(A)/127/others                                       '
                        + '                                of the Tax Code, as amended</span> <span style="font-style: italic; font-size: x-small;">                                       '
                        + '                                    (Specify)</span>                                                                                                            '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                 '
                        + '                            <input type="text" id="frm1702MX:txtPg9Sc13I16CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I16CA1[]"  size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "0" + 1) + '" />                                                                                '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                 '
                        + '                            <input type="text" id="frm1702MX:txtPg9Sc13I16CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I16CB2[]"  size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "1" + 1) + '" />                                                                                '
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
                        + '                            <input type="text" id="frm1702MX:txtPg9Sc13I17CA-' + (i + 1) + '" size="30" name="frm1702MX:txtPg9Sc13I17CA1[]" maxlength="12" onchange="setToZeroIfEmpty(this)"  onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);"    onkeypress="return wholenumber(event, true)"                       '
                        + '                                value="0" class="numbertext" tabindex="' + (i + "0" + 2) + '" />                                                                                         '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                 '
                        + '                            <input type="text" id="frm1702MX:txtPg9Sc13I17CB-' + (i + 1) + '" size="30" name="frm1702MX:txtPg9Sc13I17CB2[]" maxlength="12" onchange="setToZeroIfEmpty(this)"  onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);"    onkeypress="return wholenumber(event, true)"                       '
                        + '                                value="0" class="numbertext" tabindex="' + (i + "1" + 2) + '" />                                                                                         '
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
                        + '                            <input type="text" id="frm1702MX:txtPg9Sc13I18CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I18CA1[]"  size="30" maxlength="12" onchange="setToZeroIfEmpty(this)"  onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);"    onkeypress="return wholenumber(event, true)"                       '
                        + '                                 Name="frm1702MX:txtPg9Sc13I19name-IV"  value="0" class="numbertext" tabindex="' + (i + "0" + 3) + '" />                                                           '
                        + '                        </td>                                                                                                                                   '
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                 '
                        + '                            <input type="text" id="frm1702MX:txtPg9Sc13I18CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc13I18CB2[]"  size="30" maxlength="12" onchange="setToZeroIfEmpty(this)"  onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);"    onkeypress="return wholenumber(event, true)"                       '
                        + '                                 Name="frm1702MX:txtPg9Sc13I19name-IV"  value="0" class="numbertext" tabindex="' + (i + "1" + 3) + '" />                                                           '
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

                        + ' <input type="button" value="Remove" onclick="deleteDiv(this),FixId_modalDivPg9Sc13IV()" tabindex="' + (i + "1" + 4) + '" /> '
                        + '                         </td>'
                        + '                   </tr> '
                        + '             </table>'
                        + ' </div> '
                        );
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function FixId_modalDivPg9Sc13IV() {

        var length = $("#tempModalDivPg9Sc13IV div").length;
        for (i = 0; i < length; i++) {
            var currentDivTable = $("#tempModalDivPg9Sc13IV div").eq(i).find('table');
            $("#tempModalDivPg9Sc13IV div")[i].setAttribute("id", "tempModalDivPg9Sc13IV-" + (i + 1));
            // First column header
            currentDivTable.eq(0).find("td span").eq(0).html(LetterIteration((i * 2) + 3, 2));
            //second column header
            currentDivTable.eq(0).find("td span").eq(1).html(LetterIteration((i * 2) + 4, 2));

            currentDivTable.eq(0).find("td input")[0].setAttribute("id", "frm1702MX:txtPg9Sc13I16CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[1].setAttribute("id", "frm1702MX:txtPg9Sc13I16CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[2].setAttribute("id", "frm1702MX:txtPg9Sc13I17CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[3].setAttribute("id", "frm1702MX:txtPg9Sc13I17CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[4].setAttribute("id", "frm1702MX:txtPg9Sc13I18CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[5].setAttribute("id", "frm1702MX:txtPg9Sc13I18CB-" + (i + 1));


        }
    }
    function Save_modalDivPg9Sc13IV() {

        FixId_modalDivPg9Sc13IV();

        $("#mainModalDivPg9Sc13IV").html(function () {
            return $("#tempModalDivPg9Sc13IV").html();
        });
        $("#tempModalDivPg9Sc13IV div").remove();
        computePg9Sc13I19IV();
        computePg9Sc13I19();
        Load_modalDivPg9Sc13IV();
        count = $("#mainModalDivPg9Sc13IV div").length;
        if (count > 0) {
            document.getElementById("frm1702MX:txtCtrmodalPg9Sc13IV").value = count;
        }
    }
    function Load_modalDivPg9Sc13IV() {
        $("#tempModalDivPg9Sc13IV").html(function () {
            return $("#mainModalDivPg9Sc13IV").html();
        });


    }
    function Cancel_modalDivPg9Sc13IV() {
        $("#tempModalDivPg9Sc13IV").html(function () {
            return $("#mainModalDivPg9Sc13IV").html();
        });

    }
    function AddRow_modalTablePg9Sc14I() {
        var myDiv = document.getElementById("tempModalDivPg9Sc14I");
        i = $("#tempModalDivPg9Sc14I div").length;
        $('#tempModalDivPg9Sc14I').append('<div id="tempModalDivPg9Sc14I' + (i + 1) + '" >'
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
            + '                                             <input type="text" id="frm1702MX:txtPg9Sc14I2CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc14I2CA1[]" size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "0" + 1) + '" />'
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
                            + '                         <input type="text" id="frm1702MX:txtPg9Sc14I2CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc14I2CB2[]" size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "1" + 1) + '" />'
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
            + '                                        <input type="text" id="frm1702MX:txtPg9Sc14I3CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc14I3CA1[]"  size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "0" + 2) + '" />                                                                                     '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
            + '                                        <input type="text" id="frm1702MX:txtPg9Sc14I3CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc14I3CB2[]"  size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "1" + 2) + '" />                                                                                     '
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
            + '                                        <input type="text" id="frm1702MX:txtPg9Sc14I4CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc14I4CA1[]"  size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "0" + 3) + '" />                                                                                     '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
            + '                                        <input type="text" id="frm1702MX:txtPg9Sc14I4CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc14I4CB2[]"  size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "1" + 3) + '" />                                                                                     '
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
            + '                                        <input type="text" id="frm1702MX:txtPg9Sc14I5CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc14I5CA1[]"  size="30" maxlength="12"  onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);"  onchange="setToZeroIfEmpty(this)"   onkeypress="return wholenumber(event, true)"                            '
            + '                                            Name="frm1702MX:txtPg9Sc14I8name-I" value="0" class="numbertext" tabindex="' + (i + "0" + 4) + '" />                                                                '
            + '                                    </td>                                                                                                                                       '
            + '                                    <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                                     '
            + '                                        <input type="text" id="frm1702MX:txtPg9Sc14I5CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc14I5CB2[]"  size="30" maxlength="12"  onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);"  onchange="setToZeroIfEmpty(this)"   onkeypress="return wholenumber(event, true)"                            '
            + '                                            Name="frm1702MX:txtPg9Sc14I8name-I" value="0" class="numbertext" tabindex="' + (i + "1" + 4) + '" />                                                                '
            + '                                    </td>                                                                                                                                       '
            + '                                </tr>                                                                                                                                           '
            + '                 </table>                                                                                                                                                       '
                        + '             <table class="tblForm" style="width: 100%;"> '
                        + '                    <tr>'
                        + '                        <td class="tblFormTd ContentBold">'
                        + '                        </td>'
                        + '                        <td class="tblFormTd">'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                         </td>'
                        + '                         <td class="tblFormTd ColumnHeader" style="width: 27%;">'

                        + ' <input type="button" value="Remove" onclick="deleteDiv(this),FixId_modalDivPg9Sc14I()" tabindex="' + (i + "1" + 5) + '" /> '
                        + '                         </td>'
                        + '                   </tr> '
                        + '             </table>'
                        + ' </div> '
                        );
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function FixId_modalDivPg9Sc14I() {

        var length = $("#tempModalDivPg9Sc14I div").length;
        for (i = 0; i < length; i++) {
            var currentDivTable = $("#tempModalDivPg9Sc14I div").eq(i).find('table');
            $("#tempModalDivPg9Sc14I div")[i].setAttribute("id", "tempModalDivPg9Sc14I-" + (i + 1));
            // First column header
            currentDivTable.eq(0).find("td span").eq(0).html(LetterIteration((i * 2) + 3, 3));
            //second column header
            currentDivTable.eq(0).find("td span").eq(1).html(LetterIteration((i * 2) + 4, 3));
            //dropdown
            // currentDivTable.eq(0).find("td select")[0].setAttribute("id", "frm1702MX:txtPg9Sc14I2CA-" + (i + 1));
            //currentDivTable.eq(0).find("td select")[1].setAttribute("id", "frm1702MX:txtPg9Sc14I2CB-" + (i + 1));
            currentDivTable.eq(0).find("td input")[0].setAttribute("id", "frm1702MX:txtPg9Sc14I2CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[1].setAttribute("id", "frm1702MX:txtPg9Sc14I2CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[2].setAttribute("id", "frm1702MX:txtPg9Sc14I3CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[3].setAttribute("id", "frm1702MX:txtPg9Sc14I3CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[4].setAttribute("id", "frm1702MX:txtPg9Sc14I4CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[5].setAttribute("id", "frm1702MX:txtPg9Sc14I4CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[6].setAttribute("id", "frm1702MX:txtPg9Sc14I5CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[7].setAttribute("id", "frm1702MX:txtPg9Sc14I5CB-" + (i + 1));


        }
    }
    function Save_modalDivPg9Sc14I() {

        FixId_modalDivPg9Sc14I();

        $("#mainModalDivPg9Sc14I").html(function () {
            return $("#tempModalDivPg9Sc14I").html();
        });
        $("#tempModalDivPg9Sc14I div").remove();
        computePg9Sc14I8I();
        computePg9Sc14I8();
        Load_modalDivPg9Sc14I();
        count = $("#mainModalDivPg9Sc14I div").length;
        if (count > 0) {
            document.getElementById("frm1702MX:txtCtrmodalPg9Sc14I").value = count;
        }

    }
    function Load_modalDivPg9Sc14I() {
        $("#tempModalDivPg9Sc14I").html(function () {
            return $("#mainModalDivPg9Sc14I").html();
        });


    }
    function Cancel_modalDivPg9Sc14I() {
        $("#tempModalDivPg9Sc14I").html(function () {
            return $("#mainModalDivPg9Sc14I").html();
        });

    }
    function AddRow_modalTablePg9Sc14II() {
        var myDiv = document.getElementById("tempModalDivPg9Sc14II");
        i = $("#tempModalDivPg9Sc14II div").length;
        $('#tempModalDivPg9Sc14II').append('<div id="tempModalDivPg9Sc14II' + (i + 1) + '" >'
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
                    + '                                <span style="font-size: small;">Other Exempt Income/Receipts Under Sec. 32 (B) of the                                       '
                    + '                                    Tax Code, as amended</span> <span style="font-style: italic; font-size: x-small;">(Specify)</span>                      '
                    + '                            </td>                                                                                                                           '
                    + '                            <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                         '
                    + '                                <input type="text" id="frm1702MX:txtPg9Sc14I6CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc14I6CA1[]"  size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "0" + 1) + '" />                                                                         '
                    + '                            </td>                                                                                                                           '
                    + '                            <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                         '
                    + '                                <input type="text" id="frm1702MX:txtPg9Sc14I6CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc14I6CB2[]"  size="30" maxlength="21"  onkeypress="return Name(this);" onblur="capitalize(this);getAttributeValue(this.id,this.value);" tabindex="' + (i + "1" + 1) + '" />                                                                         '
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
                    + '                                <input type="text" id="frm1702MX:txtPg9Sc14I7CA-' + (i + 1) + '" name="frm1702MX:txtPg9Sc14I7CA1[]" size="30" maxlength="12"  onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);"  onchange="setToZeroIfEmpty(this)"   onkeypress="return wholenumber(event, true)"                '
                    + '                                    Name="frm1702MX:txtPg9Sc14I8name-II" value="0" class="numbertext" tabindex="' + (i + "0" + 2) + '" />                                                    '
                    + '                            </td>                                                                                                                           '
                    + '                            <td class="tblFormTd ColumnHeader" style="width: 27%;">                                                                         '
                    + '                                <input type="text" id="frm1702MX:txtPg9Sc14I7CB-' + (i + 1) + '" name="frm1702MX:txtPg9Sc14I7CB2[]" size="30" maxlength="12"  onblur="addCommas1702MX(this);getAttributeValue(this.id,this.value);"  onchange="setToZeroIfEmpty(this)"   onkeypress="return wholenumber(event, true)"                '
                    + '                                    Name="frm1702MX:txtPg9Sc14I8name-II" value="0" class="numbertext" tabindex="' + (i + "1" + 2) + '" />                                                    '
                    + '                            </td>                                                                                                                           '
                    + '                        </tr>                                                                                                                               '
                    + '             </table>                                                                                                                                       '
                        + '             <table class="tblForm" style="width: 100%;"> '
                        + '                    <tr>'
                        + '                        <td class="tblFormTd ContentBold">'
                        + '                        </td>'
                        + '                        <td class="tblFormTd">'
                        + '                        </td>'
                        + '                        <td class="tblFormTd ColumnHeader" style="width: 27%;">'
                        + '                         </td>'
                        + '                         <td class="tblFormTd ColumnHeader" style="width: 27%;">'

                        + ' <input type="button" value="Remove" onclick="deleteDiv(this),FixId_modalDivPg9Sc14II()" tabindex="' + (i + "1" + 3) + '" /> '
                        + '                         </td>'
                        + '                   </tr> '
                        + '             </table>'
                        + ' </div> '
                        );
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function FixId_modalDivPg9Sc14II() {

        var length = $("#tempModalDivPg9Sc14II div").length;
        for (i = 0; i < length; i++) {
            var currentDivTable = $("#tempModalDivPg9Sc14II div").eq(i).find('table');
            $("#tempModalDivPg9Sc14II div")[i].setAttribute("id", "tempModalDivPg9Sc14II-" + (i + 1));
            // First column header
            currentDivTable.eq(0).find("td span").eq(0).html(LetterIteration((i * 2) + 3, 4));
            //second column header
            currentDivTable.eq(0).find("td span").eq(1).html(LetterIteration((i * 2) + 4, 4));

            currentDivTable.eq(0).find("td input")[0].setAttribute("id", "frm1702MX:txtPg9Sc14I6CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[1].setAttribute("id", "frm1702MX:txtPg9Sc14I6CB-" + (i + 1));

            currentDivTable.eq(0).find("td input")[2].setAttribute("id", "frm1702MX:txtPg9Sc14I7CA-" + (i + 1));
            currentDivTable.eq(0).find("td input")[3].setAttribute("id", "frm1702MX:txtPg9Sc14I7CB-" + (i + 1));
        }
    }
    function Save_modalDivPg9Sc14II() {

        FixId_modalDivPg9Sc14II();

        $("#mainModalDivPg9Sc14II").html(function () {
            return $("#tempModalDivPg9Sc14II").html();
        });
        $("#tempModalDivPg9Sc14II div").remove();
        computePg9Sc14I8II();
        computePg9Sc14I8();
        Load_modalDivPg9Sc14II();
        count = $("#mainModalDivPg9Sc14II div").length;
        if (count > 0) {
            document.getElementById("frm1702MX:txtCtrmodalPg9Sc14II").value = count;
        }
    }
    function Load_modalDivPg9Sc14II() {
        $("#tempModalDivPg9Sc14II").html(function () {
            return $("#mainModalDivPg9Sc14II").html();
        });


    }
    function Cancel_modalDivPg9Sc14II() {
        $("#tempModalDivPg9Sc14II").html(function () {
            return $("#mainModalDivPg9Sc14II").html();
        });

    }

    var temp_Array_Col1 = new Array();
    var temp_Array_Col2 = new Array();
    var temp_Array_Col3 = new Array();
    var temp_Array_Col4 = new Array();
    var temp_Array_Col5 = new Array();

    var main_modalTablePg5Sc4I3_Col1 = new Array();
    var main_modalTablePg5Sc4I3_Col2 = new Array();
    var main_modalTablePg5Sc4I3_Col3 = new Array();
    var main_modalTablePg5Sc4I3_Col4 = new Array();

    function checkNullRow_OnClick_modalTablePg5Sc4I3() {
        params = 'txtPg5Sc4I3,txtPg5Sc4I3CA,txtPg5Sc4I3CB,txtPg5Sc4I3CC';
        buttonModalID = 'btnModalPg5Sc4I3';
        var str = "";
        var str2 = 0;
        var array = params.split(',');
        if (main_modalTablePg5Sc4I3_Col1.length > 1) {
            openDialog('modalDivPg5Sc4I3');
            Load_modalTablePg5Sc4I3();
        }
        else if (main_modalTablePg5Sc4I3_Col1.length <= 1) {
            str = document.getElementById('frm1702MX:' + array[0]).value;
            str2 = document.getElementById('frm1702MX:txtPg5Sc4I3CD').value;
            if ($.trim(str) != "" && str2 != 0) {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = false;
                //disableField(params);

                main_modalTablePg5Sc4I3_Col1[0] = document.getElementById('frm1702MX:' + array[0]).value;
                //alert(main_modalTablePg5Sc4I3_Col1[0]);

                main_modalTablePg5Sc4I3_Col2[0] = document.getElementById('frm1702MX:' + array[1]).value;
                //alert(main_modalTablePg5Sc4I3_Col2[0]);

                main_modalTablePg5Sc4I3_Col3[0] = document.getElementById('frm1702MX:' + array[2]).value;
                //alert(main_modalTablePg5Sc4I3_Col3[0]);

                main_modalTablePg5Sc4I3_Col4[0] = document.getElementById('frm1702MX:' + array[3]).value;
                //alert(main_modalTablePg5Sc4I3_Col4[0]);
                //setValuesTo(array[0], 'OTHERS');

                openDialog('modalDivPg5Sc4I3');
                Load_modalTablePg5Sc4I3();
                //Save_modalTablePg5Sc4I3();
            }
            else if ($.trim(str) == "") {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = true;
                //alert("User must fill item 3 to add modal");
            }
        }
    }

    function Save_modalTablePg5Sc4I3() {
        var str = "";
        var count = 0;
        var numRows = document.getElementById("modalTablePg5Sc4I3").rows.length;
        var table = document.getElementById("modalTablePg5Sc4I3");

        main_modalTablePg5Sc4I3_Col1 = new Array();
        main_modalTablePg5Sc4I3_Col2 = new Array();
        main_modalTablePg5Sc4I3_Col3 = new Array();
        main_modalTablePg5Sc4I3_Col4 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                main_modalTablePg5Sc4I3_Col1.push(table.rows[x].cells[0].children[1].value);
                main_modalTablePg5Sc4I3_Col2.push(table.rows[x].cells[1].children[0].value);
                main_modalTablePg5Sc4I3_Col3.push(table.rows[x].cells[2].children[0].value);
                main_modalTablePg5Sc4I3_Col4.push(table.rows[x].cells[3].children[0].value);
                count += 1;
            }
        }

        if (count == 0) {
            enableField('txtPg5Sc4I3,txtPg5Sc4I3CA,txtPg5Sc4I3CB,txtPg5Sc4I3CC');
            disableField('btnModalPg5Sc4I3');
            setValuesTo('txtPg5Sc4I3', '');
            setValuesTo('txtPg5Sc4I3CA,txtPg5Sc4I3CB,txtPg5Sc4I3CC', '0');

        }
        else if (count == 1) {
            enableField('txtPg5Sc4I3,txtPg5Sc4I3CA,txtPg5Sc4I3CB,txtPg5Sc4I3CC');
            //disableField('btnModalPg5Sc4I3');

            setValuesTo('txtPg5Sc4I3', table.rows[0].cells[0].children[1].value);
            setValuesTo('txtPg5Sc4I3CA', table.rows[0].cells[1].children[0].value);
            setValuesTo('txtPg5Sc4I3CB', table.rows[0].cells[2].children[0].value);
            setValuesTo('txtPg5Sc4I3CC', table.rows[0].cells[3].children[0].value);
            main_modalTablePg5Sc4I3_Col1 = new Array();
            main_modalTablePg5Sc4I3_Col2 = new Array();
            main_modalTablePg5Sc4I3_Col3 = new Array();
            main_modalTablePg5Sc4I3_Col4 = new Array();

        }
        else {
            Load_modalTablePg5Sc4I3();
            document.getElementById("frm1702MX:txtPg5Sc4I3").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg5Sc4I3CA").value = document.getElementById("frm1702MX:txtPg5Sc4I3_SubTotalCA").value;
            document.getElementById("frm1702MX:txtPg5Sc4I3CB").value = document.getElementById("frm1702MX:txtPg5Sc4I3_SubTotalCB").value;
            document.getElementById("frm1702MX:txtPg5Sc4I3CC").value = document.getElementById("frm1702MX:txtPg5Sc4I3_SubTotalCC").value;
            document.getElementById("frm1702MX:txtPg5Sc4I3CD").value = document.getElementById("frm1702MX:txtPg5Sc4I3_SubTotalCD").value;
            disableField('txtPg5Sc4I3,txtPg5Sc4I3CA,txtPg5Sc4I3CB,txtPg5Sc4I3CC');
            //document.getElementById("frm1702MX:txtCtrmodalPg5Sc4I3").value = count;

        }

        document.getElementById("frm1702MX:txtCtrmodalPg5Sc4I3").value = count;
        getSum('txtPg5Sc4I3CA,txtPg5Sc4I3CB,txtPg5Sc4I3CC', 'txtPg5Sc4I3CD');
        computePg5Sc4I4();
        //alert("Saved!");
    }
    function Load_modalTablePg5Sc4I3() {
        $("#modalTablePg5Sc4I3 tr").remove();
        var i = main_modalTablePg5Sc4I3_Col1.length;
        if (main_modalTablePg5Sc4I3_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg5Sc4I3();
                document.getElementById("frm1702MX:txtPg5Sc4I3_" + (x + 1) + "Col1").value = main_modalTablePg5Sc4I3_Col1[x];
                document.getElementById("frm1702MX:txtPg5Sc4I3_" + (x + 1) + "Col2").value = main_modalTablePg5Sc4I3_Col2[x];
                document.getElementById("frm1702MX:txtPg5Sc4I3_" + (x + 1) + "Col3").value = main_modalTablePg5Sc4I3_Col3[x];
                document.getElementById("frm1702MX:txtPg5Sc4I3_" + (x + 1) + "Col4").value = main_modalTablePg5Sc4I3_Col4[x];
            }
        }

        summationmodalTablePg5Sc4I3();
    }

    function AddRow_modalTablePg5Sc4I3() {
        var i = document.getElementById("modalTablePg5Sc4I3").rows.length;
        var table = document.getElementById("modalTablePg5Sc4I3");

        var disabledAttributeEX = ((totalEX > 0) || !!isValidated) ? "disabled=\"disabled\"" : "";
        var disabledAttributeSP = ((totalSP > 0) || !!isValidated) ? "disabled=\"disabled\"" : "";
        var disabledAttribute2 = (!!isValidated) ? "disabled=\"disabled\"" : "";

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);

        cell1.className = "tblFormTd";
        cell2.className = "tblFormTd"; cell2.style.width = "15%"; cell2.style.textAlign = "center";
        cell3.className = "tblFormTd"; cell3.style.width = "15%"; cell3.style.textAlign = "center";
        cell4.className = "tblFormTd"; cell4.style.width = "15%"; cell4.style.textAlign = "center";
        cell5.className = "tblFormTd"; cell5.style.width = "15%"; cell5.style.textAlign = "center";
        cell6.className = "tblFormTd"; cell6.style.width = "10%"; cell6.style.textAlign = "center";

        cell1.innerHTML = '<span style="font-weight: bold; font-size: small;">&nbsp;3.' + (i + 1) + '</span> <input type="text" size="20" maxlength="18" ' + disabledAttribute2 + 'id="frm1702MX:txtPg5Sc4I3_' + (i + 1) + 'Col1" name="frm1702MX:txtPg5Sc4I3_Col1[]" onkeypress="return Name(this);" onblur="capitalize(this);" />';
        cell2.innerHTML = '<input type="text" id="frm1702MX:txtPg5Sc4I3_' + (i + 1) + 'Col2" name="frm1702MX:txtPg5Sc4I3_Col2[]" class="numbertext frm1702MX:txtColumnAExempt" value="0" size="14" ' + disabledAttributeEX + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg5Sc4I3(); addCommas1702MX(this);" onkeypress="return number(this, event)" maxlength="12" />';
        cell3.innerHTML = '<input type="text" id="frm1702MX:txtPg5Sc4I3_' + (i + 1) + 'Col3" name="frm1702MX:txtPg5Sc4I3_Col3[]" class="numbertext frm1702MX:txtColumnBSpecialRate" value="0" size="14" ' + disabledAttributeSP + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg5Sc4I3(); addCommas1702MX(this);" onkeypress="return number(this, event)" maxlength="12" />';
        cell4.innerHTML = '<input type="text" id="frm1702MX:txtPg5Sc4I3_' + (i + 1) + 'Col4" name="frm1702MX:txtPg5Sc4I3_Col4[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg5Sc4I3(); addCommas1702MX(this);" onkeypress="return number(this, event)" maxlength="12" />';
        cell5.innerHTML = '<input type="text" id="frm1702MX:txtPg5Sc4I3_' + (i + 1) + 'Col5" name="frm1702MX:txtPg5Sc4I3_Col5[]" class="numbertext" value="0" size="14" disabled="disabled" />';
        cell6.innerHTML = '<input type="button" value="Remove" onclick="deleteRow(this), removeSaveTemp_modalTablePg5Sc4I3()" ' + disabledAttribute2 + ' />';

        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $("[data-type='negative']").keypress(function () {
            if ($(this).val().indexOf("-") === 0) {
                $(this).attr("maxlength", "13");
            }
            else {
                $(this).attr("maxlength", "12");
            }
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function removeSaveTemp_modalTablePg5Sc4I3() {
        temp_Array_Col1 = new Array();
        temp_Array_Col2 = new Array();
        temp_Array_Col3 = new Array();
        temp_Array_Col4 = new Array();
        var str = "";
        var numRows = document.getElementById("modalTablePg5Sc4I3").rows.length;
        var table = document.getElementById("modalTablePg5Sc4I3");

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            //if ($.trim(str) != "") {
            temp_Array_Col1.push(table.rows[x].cells[0].children[1].value);
            temp_Array_Col2.push(table.rows[x].cells[1].children[0].value);
            temp_Array_Col3.push(table.rows[x].cells[2].children[0].value);
            temp_Array_Col4.push(table.rows[x].cells[3].children[0].value);
            //}
        }

        $("#modalTablePg5Sc4I3 tr").remove();
        var i = temp_Array_Col1.length;
        if (temp_Array_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg5Sc4I3();
                document.getElementById("frm1702MX:txtPg5Sc4I3_" + (x + 1) + "Col1").value = temp_Array_Col1[x];
                document.getElementById("frm1702MX:txtPg5Sc4I3_" + (x + 1) + "Col2").value = temp_Array_Col2[x];
                document.getElementById("frm1702MX:txtPg5Sc4I3_" + (x + 1) + "Col3").value = temp_Array_Col3[x];
                document.getElementById("frm1702MX:txtPg5Sc4I3_" + (x + 1) + "Col4").value = temp_Array_Col4[x];
            }
        }
        summationmodalTablePg5Sc4I3();

        alert("Removed!");
    }
    function Cancel_modalTablePg5Sc4I3() {
        Load_modalTablePg5Sc4I3();
        alert("Canceled!");
    }
    function summationmodalTablePg5Sc4I3() {
        var totalA = 0;
        var totalB = 0;
        var totalC = 0;
        var totalD = 0;
        var totalperRow = 0;
        numRows = document.getElementById("modalTablePg5Sc4I3").rows.length;
        table = document.getElementById("modalTablePg5Sc4I3");

        for (x = 0; x < numRows; x++) {

            totalA += NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value));   //parseInt(table.rows[x].cells[1].children[0].value, 10);
            totalB += NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value));   //parseInt(table.rows[x].cells[2].children[0].value, 10);
            totalC += NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));   //parseInt(table.rows[x].cells[3].children[0].value, 10);

            totalperRow = NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value))    //parseInt(table.rows[x].cells[1].children[0].value, 10)
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value))    //+ parseInt(table.rows[x].cells[2].children[0].value, 10)
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));   //+ parseInt(table.rows[x].cells[3].children[0].value, 10);*/

            table.rows[x].cells[4].children[0].value = NegativeValue(formatCurrencyWOC(totalperRow));

        }
        totalD = totalA + totalB + totalC;
        document.getElementById("frm1702MX:txtPg5Sc4I3_SubTotalCA").value = NegativeValue(formatCurrencyWOC(totalA));
        document.getElementById("frm1702MX:txtPg5Sc4I3_SubTotalCB").value = NegativeValue(formatCurrencyWOC(totalB));
        document.getElementById("frm1702MX:txtPg5Sc4I3_SubTotalCC").value = NegativeValue(formatCurrencyWOC(totalC));
        document.getElementById("frm1702MX:txtPg5Sc4I3_SubTotalCD").value = NegativeValue(formatCurrencyWOC(totalD));
    }
    var main_modalTablePg5Sc5I4_Col1 = new Array();
    var main_modalTablePg5Sc5I4_Col2 = new Array();
    var main_modalTablePg5Sc5I4_Col3 = new Array();
    var main_modalTablePg5Sc5I4_Col4 = new Array();

    function checkNullRow_OnClick_modalTablePg5Sc5I4() {
        params = 'txtPg5Sc5I4,txtPg5Sc5I4CA,txtPg5Sc5I4CB,txtPg5Sc5I4CC';
        buttonModalID = 'btnModalPg5Sc5I4';
        var str = "";
        var str2 = 0;
        var array = params.split(',');
        if (main_modalTablePg5Sc5I4_Col1.length > 1) {
            openDialog('modalDivPg5Sc5I4');
            Load_modalTablePg5Sc5I4();
        }
        else if (main_modalTablePg5Sc5I4_Col1.length <= 1) {
            str = document.getElementById('frm1702MX:' + array[0]).value;
            str2 = document.getElementById('frm1702MX:txtPg5Sc5I4CD').value;
            if ($.trim(str) != "" && str2 != 0) {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = false;
                //disableField(params);

                main_modalTablePg5Sc5I4_Col1[0] = document.getElementById('frm1702MX:' + array[0]).value;
                //alert(main_modalTablePg5Sc5I4_Col1[0]);

                main_modalTablePg5Sc5I4_Col2[0] = document.getElementById('frm1702MX:' + array[1]).value;
                //alert(main_modalTablePg5Sc5I4_Col2[0]);

                main_modalTablePg5Sc5I4_Col3[0] = document.getElementById('frm1702MX:' + array[2]).value;
                //alert(main_modalTablePg5Sc5I4_Col3[0]);

                main_modalTablePg5Sc5I4_Col4[0] = document.getElementById('frm1702MX:' + array[3]).value;
                //alert(main_modalTablePg5Sc5I4_Col4[0]);
                //setValuesTo(array[0], 'OTHERS');
                openDialog('modalDivPg5Sc5I4');
                Load_modalTablePg5Sc5I4();
                //Save_modalTablePg5Sc5I4();
            }
            else if ($.trim(str) == "") {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = true;
                //alert("User must fill item 4 to add modal");
            }
        }
    }

    function Save_modalTablePg5Sc5I4() {
        count = 0;
        var str = "";
        var numRows = document.getElementById("modalTablePg5Sc5I4").rows.length;
        var table = document.getElementById("modalTablePg5Sc5I4");

        main_modalTablePg5Sc5I4_Col1 = new Array();
        main_modalTablePg5Sc5I4_Col2 = new Array();
        main_modalTablePg5Sc5I4_Col3 = new Array();
        main_modalTablePg5Sc5I4_Col4 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                main_modalTablePg5Sc5I4_Col1.push(table.rows[x].cells[0].children[1].value);
                main_modalTablePg5Sc5I4_Col2.push(table.rows[x].cells[1].children[0].value);
                main_modalTablePg5Sc5I4_Col3.push(table.rows[x].cells[2].children[0].value);
                main_modalTablePg5Sc5I4_Col4.push(table.rows[x].cells[3].children[0].value);
                count += 1;

            }
        }



        if (count == 0) {
            enableField('txtPg5Sc5I4,txtPg5Sc5I4CA,txtPg5Sc5I4CB,txtPg5Sc5I4CC');
            disableField('btnModalPg5Sc5I4');
            setValuesTo('txtPg5Sc5I4', '');
            setValuesTo('txtPg5Sc5I4CA,txtPg5Sc5I4CB,txtPg5Sc5I4CC', '0');

        }
        else if (count == 1) {
            enableField('txtPg5Sc5I4,txtPg5Sc5I4CA,txtPg5Sc5I4CB,txtPg5Sc5I4CC');
            //disableField('btnModalPg5Sc4I3');

            setValuesTo('txtPg5Sc5I4', table.rows[0].cells[0].children[1].value);
            setValuesTo('txtPg5Sc5I4CA', table.rows[0].cells[1].children[0].value);
            setValuesTo('txtPg5Sc5I4CB', table.rows[0].cells[2].children[0].value);
            setValuesTo('txtPg5Sc5I4CC', table.rows[0].cells[3].children[0].value);
            main_modalTablePg5Sc5I4_Col1 = new Array();
            main_modalTablePg5Sc5I4_Col2 = new Array();
            main_modalTablePg5Sc5I4_Col3 = new Array();
            main_modalTablePg5Sc5I4_Col4 = new Array();

        }
        else {
            Load_modalTablePg5Sc5I4();
            document.getElementById("frm1702MX:txtPg5Sc5I4").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg5Sc5I4CA").value = document.getElementById("frm1702MX:txtPg5Sc5I4_SubTotalCA").value;
            document.getElementById("frm1702MX:txtPg5Sc5I4CB").value = document.getElementById("frm1702MX:txtPg5Sc5I4_SubTotalCB").value;
            document.getElementById("frm1702MX:txtPg5Sc5I4CC").value = document.getElementById("frm1702MX:txtPg5Sc5I4_SubTotalCC").value;
            document.getElementById("frm1702MX:txtPg5Sc5I4CD").value = document.getElementById("frm1702MX:txtPg5Sc5I4_SubTotalCD").value;
            disableField('txtPg5Sc5I4,txtPg5Sc5I4CA,txtPg5Sc5I4CB,txtPg5Sc5I4CC');
            //document.getElementById("frm1702MX:txtCtrmodalPg5Sc5I4").value = count;

        }

        document.getElementById("frm1702MX:txtCtrmodalPg5Sc5I4").value = count;

        getSum('txtPg5Sc5I4CA,txtPg5Sc5I4CB,txtPg5Sc5I4CC', 'txtPg5Sc5I4CD');
        computePg6Sc5I40();
        //alert("Saved!");
    }
    function Load_modalTablePg5Sc5I4() {
        $("#modalTablePg5Sc5I4 tr").remove();
        var i = main_modalTablePg5Sc5I4_Col1.length;
        if (main_modalTablePg5Sc5I4_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg5Sc5I4();
                document.getElementById("frm1702MX:txtPg5Sc5I4_" + (x + 1) + "Col1").value = main_modalTablePg5Sc5I4_Col1[x];
                document.getElementById("frm1702MX:txtPg5Sc5I4_" + (x + 1) + "Col2").value = main_modalTablePg5Sc5I4_Col2[x];
                document.getElementById("frm1702MX:txtPg5Sc5I4_" + (x + 1) + "Col3").value = main_modalTablePg5Sc5I4_Col3[x];
                document.getElementById("frm1702MX:txtPg5Sc5I4_" + (x + 1) + "Col4").value = main_modalTablePg5Sc5I4_Col4[x];
            }
        }

        summationmodalTablePg5Sc5I4();
    }
    function AddRow_modalTablePg5Sc5I4() {
        var i = document.getElementById("modalTablePg5Sc5I4").rows.length;
        var table = document.getElementById("modalTablePg5Sc5I4");

        var disabledAttributeEX = ((totalEX > 0) || !!isValidated) ? "disabled=\"disabled\"" : "";
        var disabledAttributeSP = ((totalSP > 0) || !!isValidated) ? "disabled=\"disabled\"" : "";
        var disabledAttribute2 = (!!isValidated) ? "disabled=\"disabled\"" : "";

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);

        cell1.className = "tblFormTd";
        cell2.className = "tblFormTd"; cell2.style.width = "15%"; cell2.style.textAlign = "center";
        cell3.className = "tblFormTd"; cell3.style.width = "15%"; cell3.style.textAlign = "center";
        cell4.className = "tblFormTd"; cell4.style.width = "15%"; cell4.style.textAlign = "center";
        cell5.className = "tblFormTd"; cell5.style.width = "15%"; cell5.style.textAlign = "center";
        cell6.className = "tblFormTd"; cell6.style.width = "10%"; cell6.style.textAlign = "center";

        cell1.innerHTML = '<span style="font-weight: bold; font-size: small;">&nbsp;4.' + (i + 1) + '</span> <input type="text" size="20" maxlength="18" ' + disabledAttribute2 + ' id="frm1702MX:txtPg5Sc5I4_' + (i + 1) + 'Col1" name="frm1702MX:txtPg5Sc5I4_Col1[]" onkeypress="return Name(this);" onblur="capitalize(this);" />';
        cell2.innerHTML = '<input type="text" id="frm1702MX:txtPg5Sc5I4_' + (i + 1) + 'Col2" name="frm1702MX:txtPg5Sc5I4_Col2[]" class="numbertext frm1702MX:txtColumnAExempt" value="0" size="14" ' + disabledAttributeEX + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg5Sc5I4(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)" maxlength="12" />';
        cell3.innerHTML = '<input type="text" id="frm1702MX:txtPg5Sc5I4_' + (i + 1) + 'Col3" name="frm1702MX:txtPg5Sc5I4_Col3[]" class="numbertext frm1702MX:txtColumnBSpecialRate" value="0" size="14" ' + disabledAttributeSP + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg5Sc5I4(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)" maxlength="12" />';
        cell4.innerHTML = '<input type="text" id="frm1702MX:txtPg5Sc5I4_' + (i + 1) + 'Col4" name="frm1702MX:txtPg5Sc5I4_Col4[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg5Sc5I4(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)" maxlength="12" />';
        cell5.innerHTML = '<input type="text" id="frm1702MX:txtPg5Sc5I4_' + (i + 1) + 'Col5" name="frm1702MX:txtPg5Sc5I4_Col5[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' disabled="disabled" /></td>';
        cell6.innerHTML = '<input type="button" value="Remove" onclick="deleteRow(this),removeSaveTemp_modalTablePg5Sc5I4()" ' + disabledAttribute2 + ' />';
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function removeSaveTemp_modalTablePg5Sc5I4() {
        temp_Array_Col1 = new Array();
        temp_Array_Col2 = new Array();
        temp_Array_Col3 = new Array();
        temp_Array_Col4 = new Array();
        var str = "";
        var numRows = document.getElementById("modalTablePg5Sc5I4").rows.length;
        var table = document.getElementById("modalTablePg5Sc5I4");

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            // if ($.trim(str) != "") {
            temp_Array_Col1.push(table.rows[x].cells[0].children[1].value);
            temp_Array_Col2.push(table.rows[x].cells[1].children[0].value);
            temp_Array_Col3.push(table.rows[x].cells[2].children[0].value);
            temp_Array_Col4.push(table.rows[x].cells[3].children[0].value);
            //}
        }

        $("#modalTablePg5Sc5I4 tr").remove();
        var i = temp_Array_Col1.length;
        if (temp_Array_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg5Sc5I4();
                document.getElementById("frm1702MX:txtPg5Sc5I4_" + (x + 1) + "Col1").value = temp_Array_Col1[x];
                document.getElementById("frm1702MX:txtPg5Sc5I4_" + (x + 1) + "Col2").value = temp_Array_Col2[x];
                document.getElementById("frm1702MX:txtPg5Sc5I4_" + (x + 1) + "Col3").value = temp_Array_Col3[x];
                document.getElementById("frm1702MX:txtPg5Sc5I4_" + (x + 1) + "Col4").value = temp_Array_Col4[x];
            }
        }
        summationmodalTablePg5Sc5I4();

        alert("Removed!");
    }
    function Cancel_modalTablePg5Sc5I4() {
        Load_modalTablePg5Sc5I4();
        alert("Canceled!");
    }
    function summationmodalTablePg5Sc5I4() {
        var totalA = 0;
        var totalB = 0;
        var totalC = 0;
        var totalD = 0;
        var totalperRow = 0;
        numRows = document.getElementById("modalTablePg5Sc5I4").rows.length;
        table = document.getElementById("modalTablePg5Sc5I4");

        for (x = 0; x < numRows; x++) {

            totalA += NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value));
            totalB += NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value));
            totalC += NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));
            totalperRow = NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));
            table.rows[x].cells[4].children[0].value = NegativeValue(formatCurrencyWOC(totalperRow));

        }
        totalD = totalA + totalB + totalC;
        document.getElementById("frm1702MX:txtPg5Sc5I4_SubTotalCA").value = NegativeValue(formatCurrencyWOC(totalA));
        document.getElementById("frm1702MX:txtPg5Sc5I4_SubTotalCB").value = NegativeValue(formatCurrencyWOC(totalB));
        document.getElementById("frm1702MX:txtPg5Sc5I4_SubTotalCC").value = NegativeValue(formatCurrencyWOC(totalC));
        document.getElementById("frm1702MX:txtPg5Sc5I4_SubTotalCD").value = NegativeValue(formatCurrencyWOC(totalD));
    }
    var main_modalTablePg6Sc5I39_Col1 = new Array();
    var main_modalTablePg6Sc5I39_Col2 = new Array();
    var main_modalTablePg6Sc5I39_Col3 = new Array();
    var main_modalTablePg6Sc5I39_Col4 = new Array();
    function checkNullRow_OnClick_modalTablePg6Sc5I39() {
        params = 'txtPg6Sc5I39other,txtPg6Sc5I39CA,txtPg6Sc5I39CB,txtPg6Sc5I39CC';
        buttonModalID = 'btnModalPg6Sc5I39';
        var str = "";
        var str2 = 0;
        var array = params.split(',');
        if (main_modalTablePg6Sc5I39_Col1.length > 1) {
            openDialog('modalDivPg6Sc5I39');
            Load_modalTablePg6Sc5I39();
        }
        else if (main_modalTablePg6Sc5I39_Col1.length <= 1) {
            str = document.getElementById('frm1702MX:' + array[0]).value;
            str2 = document.getElementById('frm1702MX:txtPg6Sc5I39CD').value;
            if ($.trim(str) != "" && str2 != 0) {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = false;
                //disableField(params);

                main_modalTablePg6Sc5I39_Col1[0] = document.getElementById('frm1702MX:' + array[0]).value;
                //alert(main_modalTablePg6Sc5I39_Col1[0]);

                main_modalTablePg6Sc5I39_Col2[0] = document.getElementById('frm1702MX:' + array[1]).value;
                //alert(main_modalTablePg6Sc5I39_Col2[0]);

                main_modalTablePg6Sc5I39_Col3[0] = document.getElementById('frm1702MX:' + array[2]).value;
                //alert(main_modalTablePg6Sc5I39_Col3[0]);

                main_modalTablePg6Sc5I39_Col4[0] = document.getElementById('frm1702MX:' + array[3]).value;
                //alert(main_modalTablePg6Sc5I39_Col4[0]);
                //setValuesTo(array[0], 'OTHERS');
                openDialog('modalDivPg6Sc5I39');
                Load_modalTablePg6Sc5I39();
                //Save_modalTablePg6Sc5I39();
            }
            else if ($.trim(str) == "") {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = true;
                //alert("User must fill item 39 to add modal");
            }
        }
    }
    function Save_modalTablePg6Sc5I39() {
        var str = "";
        var count = 0;
        var numRows = document.getElementById("modalTablePg6Sc5I39").rows.length;
        var table = document.getElementById("modalTablePg6Sc5I39");

        main_modalTablePg6Sc5I39_Col1 = new Array();
        main_modalTablePg6Sc5I39_Col2 = new Array();
        main_modalTablePg6Sc5I39_Col3 = new Array();
        main_modalTablePg6Sc5I39_Col4 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                main_modalTablePg6Sc5I39_Col1.push(table.rows[x].cells[0].children[1].value);
                main_modalTablePg6Sc5I39_Col2.push(table.rows[x].cells[1].children[0].value);
                main_modalTablePg6Sc5I39_Col3.push(table.rows[x].cells[2].children[0].value);
                main_modalTablePg6Sc5I39_Col4.push(table.rows[x].cells[3].children[0].value);
                count += 1;
            }
        }

        if (count == 0) {
            enableField('txtPg6Sc5I39other,txtPg6Sc5I39CA,txtPg6Sc5I39CB,txtPg6Sc5I39CC');
            disableField('btnModalPg6Sc5I39');
            setValuesTo('txtPg6Sc5I39other', '');
            setValuesTo('txtPg6Sc5I39CA,txtPg6Sc5I39CB,txtPg6Sc5I39CC', '0');
        }
        else if (count == 1) {
            enableField('txtPg6Sc5I39other,txtPg6Sc5I39CA,txtPg6Sc5I39CB,txtPg6Sc5I39CC');
            //disableField('btnModalPg5Sc4I3');

            setValuesTo('txtPg6Sc5I39other', table.rows[0].cells[0].children[1].value);
            setValuesTo('txtPg6Sc5I39CA', table.rows[0].cells[1].children[0].value);
            setValuesTo('txtPg6Sc5I39CB', table.rows[0].cells[2].children[0].value);
            setValuesTo('txtPg6Sc5I39CC', table.rows[0].cells[3].children[0].value);
            main_modalTablePg6Sc5I39_Col1 = new Array();
            main_modalTablePg6Sc5I39_Col2 = new Array();
            main_modalTablePg6Sc5I39_Col3 = new Array();
            main_modalTablePg6Sc5I39_Col4 = new Array();

        }
        else {
            Load_modalTablePg6Sc5I39();
            document.getElementById("frm1702MX:txtPg6Sc5I39other").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg6Sc5I39CA").value = document.getElementById("frm1702MX:txtPg6Sc5I39_SubTotalCA").value;
            document.getElementById("frm1702MX:txtPg6Sc5I39CB").value = document.getElementById("frm1702MX:txtPg6Sc5I39_SubTotalCB").value;
            document.getElementById("frm1702MX:txtPg6Sc5I39CC").value = document.getElementById("frm1702MX:txtPg6Sc5I39_SubTotalCC").value;
            document.getElementById("frm1702MX:txtPg6Sc5I39CD").value = document.getElementById("frm1702MX:txtPg6Sc5I39_SubTotalCD").value;
            disableField('txtPg6Sc5I39other,txtPg6Sc5I39CA,txtPg6Sc5I39CB,txtPg6Sc5I39CC');
            //document.getElementById("frm1702MX:txtCtrmodalPg6Sc5I39").value = count;
        }

        document.getElementById("frm1702MX:txtCtrmodalPg6Sc5I39").value = count;
        getSum('txtPg6Sc5I39CA,txtPg6Sc5I39CB,txtPg6Sc5I39CC', 'txtPg6Sc5I39CD');
        computePg6Sc5I40();
        //alert("Saved!");
    }
    function Load_modalTablePg6Sc5I39() {
        $("#modalTablePg6Sc5I39 tr").remove();
        var i = main_modalTablePg6Sc5I39_Col1.length;
        if (main_modalTablePg6Sc5I39_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg6Sc5I39();
                document.getElementById("frm1702MX:txtPg6Sc5I39_" + (x + 1) + "Col1").value = main_modalTablePg6Sc5I39_Col1[x];
                document.getElementById("frm1702MX:txtPg6Sc5I39_" + (x + 1) + "Col2").value = main_modalTablePg6Sc5I39_Col2[x];
                document.getElementById("frm1702MX:txtPg6Sc5I39_" + (x + 1) + "Col3").value = main_modalTablePg6Sc5I39_Col3[x];
                document.getElementById("frm1702MX:txtPg6Sc5I39_" + (x + 1) + "Col4").value = main_modalTablePg6Sc5I39_Col4[x];
            }
        }

        summationmodalTablePg6Sc5I39();
    }
    function AddRow_modalTablePg6Sc5I39() {
        var i = document.getElementById("modalTablePg6Sc5I39").rows.length;
        var table = document.getElementById("modalTablePg6Sc5I39");

        var disabledAttributeEX = ((totalEX > 0) || !!isValidated) ? "disabled=\"disabled\"" : "";
        var disabledAttributeSP = ((totalSP > 0) || !!isValidated) ? "disabled=\"disabled\"" : "";
        var disabledAttribute2 = (!!isValidated) ? "disabled=\"disabled\"" : "";

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);

        cell1.className = "tblFormTd";
        cell2.className = "tblFormTd"; cell2.style.width = "15%"; cell2.style.textAlign = "center";
        cell3.className = "tblFormTd"; cell3.style.width = "15%"; cell3.style.textAlign = "center";
        cell4.className = "tblFormTd"; cell4.style.width = "15%"; cell4.style.textAlign = "center";
        cell5.className = "tblFormTd"; cell5.style.width = "15%"; cell5.style.textAlign = "center";
        cell6.className = "tblFormTd"; cell6.style.width = "10%"; cell6.style.textAlign = "center";

        cell1.innerHTML = '<span style="font-weight: bold; font-size: small;">&nbsp;39.' + (i + 1) + '</span> <input type="text" size="20" maxlength="18" ' + disabledAttribute2 + ' id="frm1702MX:txtPg6Sc5I39_' + (i + 1) + 'Col1" name="frm1702MX:txtPg6Sc5I_Col1[]"  onkeypress="return Name(this);" onblur="capitalize(this);" />';
        cell2.innerHTML = '<input type="text" id="frm1702MX:txtPg6Sc5I39_' + (i + 1) + 'Col2" name="frm1702MX:txtPg6Sc5I_Col2[]" class="numbertext frm1702MX:txtColumnAExempt" value="0" size="14" ' + disabledAttributeEX + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg6Sc5I39(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)" maxlength="12" />';
        cell3.innerHTML = '<input type="text" id="frm1702MX:txtPg6Sc5I39_' + (i + 1) + 'Col3" name="frm1702MX:txtPg6Sc5I_Col3[]" class="numbertext frm1702MX:txtColumnBSpecialRate" value="0" size="14" ' + disabledAttributeSP + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg6Sc5I39(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)" maxlength="12" />';
        cell4.innerHTML = '<input type="text" id="frm1702MX:txtPg6Sc5I39_' + (i + 1) + 'Col4" name="frm1702MX:txtPg6Sc5I_Col4[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg6Sc5I39(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)" maxlength="12" />';
        cell5.innerHTML = '<input type="text" id="frm1702MX:txtPg6Sc5I39_' + (i + 1) + 'Col5" name="frm1702MX:txtPg6Sc5I_Col5[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' disabled="disabled" />';
        cell6.innerHTML = '<input type="button" value="Remove" onclick="deleteRow(this),removeSaveTemp_modalTablePg6Sc5I39()" ' + disabledAttribute2 + ' />';
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function removeSaveTemp_modalTablePg6Sc5I39() {
        temp_Array_Col1 = new Array();
        temp_Array_Col2 = new Array();
        temp_Array_Col3 = new Array();
        temp_Array_Col4 = new Array();
        var str = "";
        var numRows = document.getElementById("modalTablePg6Sc5I39").rows.length;
        var table = document.getElementById("modalTablePg6Sc5I39");

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            //  if ($.trim(str) != "") {
            temp_Array_Col1.push(table.rows[x].cells[0].children[1].value);
            temp_Array_Col2.push(table.rows[x].cells[1].children[0].value);
            temp_Array_Col3.push(table.rows[x].cells[2].children[0].value);
            temp_Array_Col4.push(table.rows[x].cells[3].children[0].value);
            // }
        }

        $("#modalTablePg6Sc5I39 tr").remove();
        var i = temp_Array_Col1.length;
        if (temp_Array_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg6Sc5I39();
                document.getElementById("frm1702MX:txtPg6Sc5I39_" + (x + 1) + "Col1").value = temp_Array_Col1[x];
                document.getElementById("frm1702MX:txtPg6Sc5I39_" + (x + 1) + "Col2").value = temp_Array_Col2[x];
                document.getElementById("frm1702MX:txtPg6Sc5I39_" + (x + 1) + "Col3").value = temp_Array_Col3[x];
                document.getElementById("frm1702MX:txtPg6Sc5I39_" + (x + 1) + "Col4").value = temp_Array_Col4[x];
            }
        }
        summationmodalTablePg6Sc5I39();

        alert("Removed!");
    }
    function Cancel_modalTablePg6Sc5I39() {
        Load_modalTablePg6Sc5I39();
        alert("Canceled!");
    }
    //Summation
    function summationmodalTablePg6Sc5I39() {
        var totalA = 0;
        var totalB = 0;
        var totalC = 0;
        var totalD = 0;
        var totalperRow = 0;
        var numRows = document.getElementById("modalTablePg6Sc5I39").rows.length;
        var table = document.getElementById("modalTablePg6Sc5I39");

        for (x = 0; x < numRows; x++) {

            totalA += NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value));
            totalB += NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value));
            totalC += NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));
            totalperRow = NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));
            table.rows[x].cells[4].children[0].value = NegativeValue(formatCurrencyWOC(totalperRow));

        }
        totalD = totalA + totalB + totalC;
        document.getElementById("frm1702MX:txtPg6Sc5I39_SubTotalCA").value = NegativeValue(formatCurrencyWOC(totalA));
        document.getElementById("frm1702MX:txtPg6Sc5I39_SubTotalCB").value = NegativeValue(formatCurrencyWOC(totalB));
        document.getElementById("frm1702MX:txtPg6Sc5I39_SubTotalCC").value = NegativeValue(formatCurrencyWOC(totalC));
        document.getElementById("frm1702MX:txtPg6Sc5I39_SubTotalCD").value = NegativeValue(formatCurrencyWOC(totalD));
    }
    var main_modalTablePg6Sc6_Col1 = new Array();
    var main_modalTablePg6Sc6_Col2 = new Array();
    var main_modalTablePg6Sc6_Col3 = new Array();
    var main_modalTablePg6Sc6_Col4 = new Array();
    var main_modalTablePg6Sc6_Col5 = new Array();
    function checkNullRow_OnClick_modalTablePg6Sc6() {
        params = 'txtPg6Sc6I4description,txtPg6Sc6I4legal,txtPg6Sc6I4CA,txtPg6Sc6I4CB,txtPg6Sc6I4CC';
        buttonModalID = 'btnModalPg6Sc6';
        var str1 = "";
        var str2 = "";
        var str3 = 0;
        var array = params.split(',');
        if (main_modalTablePg6Sc6_Col1.length > 1) {
            openDialog('modalDivPg6Sc6');
            Load_modalTablePg6Sc6();
        }
        else if (main_modalTablePg6Sc6_Col1.length <= 1) {
            str1 = document.getElementById('frm1702MX:' + array[0]).value;
            str2 = document.getElementById('frm1702MX:' + array[1]).value;
            str3 = document.getElementById('frm1702MX:txtPg6Sc6I4CD').value;
            if ($.trim(str1) != "" && $.trim(str2) != "" && str3 != 0) {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = false;
                //disableField(params);

                main_modalTablePg6Sc6_Col1[0] = document.getElementById('frm1702MX:' + array[0]).value;
                //alert(main_modalTablePg6Sc6_Col1[0]);

                main_modalTablePg6Sc6_Col2[0] = document.getElementById('frm1702MX:' + array[1]).value;
                //alert(main_modalTablePg6Sc6_Col2[0]);

                main_modalTablePg6Sc6_Col3[0] = document.getElementById('frm1702MX:' + array[2]).value;
                //alert(main_modalTablePg6Sc6_Col3[0]);

                main_modalTablePg6Sc6_Col4[0] = document.getElementById('frm1702MX:' + array[3]).value;
                //alert(main_modalTablePg6Sc6_Col4[0]);

                main_modalTablePg6Sc6_Col5[0] = document.getElementById('frm1702MX:' + array[4]).value;
                //alert(main_modalTablePg6Sc6_Col5[0]);

                //setValuesTo(array[0], 'OTHERS');
                //setValuesTo(array[1], 'OTHERS');
                openDialog('modalDivPg6Sc6');
                Load_modalTablePg6Sc6();
                //Save_modalTablePg6Sc6();
            }
            else if ($.trim(str1) == "" || $.trim(str2) == "") {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = true;
                //alert("User must fill item 4 to add modal");
            }
        }
    }
    function Save_modalTablePg6Sc6() {
        var str1 = "";
        var str2 = "";
        var count = 0;
        var numRows = document.getElementById("modalTablePg6Sc6").rows.length;
        var table = document.getElementById("modalTablePg6Sc6");

        main_modalTablePg6Sc6_Col1 = new Array();
        main_modalTablePg6Sc6_Col2 = new Array();
        main_modalTablePg6Sc6_Col3 = new Array();
        main_modalTablePg6Sc6_Col4 = new Array();
        main_modalTablePg6Sc6_Col5 = new Array();

        for (x = 0; x < numRows; x++) {
            str1 = table.rows[x].cells[0].children[1].value;
            str2 = table.rows[x].cells[1].children[0].value;
            if ($.trim(str1) != "" || $.trim(str2) != "") {
                main_modalTablePg6Sc6_Col1.push(table.rows[x].cells[0].children[1].value);
                main_modalTablePg6Sc6_Col2.push(table.rows[x].cells[1].children[0].value);
                main_modalTablePg6Sc6_Col3.push(table.rows[x].cells[2].children[0].value);
                main_modalTablePg6Sc6_Col4.push(table.rows[x].cells[3].children[0].value);
                main_modalTablePg6Sc6_Col5.push(table.rows[x].cells[4].children[0].value);
                count += 1;
            }
        }

        if (count == 0) {
            enableField('txtPg6Sc6I4description,txtPg6Sc6I4legal,txtPg6Sc6I4CA,txtPg6Sc6I4CB,txtPg6Sc6I4CC');
            disableField('btnModalPg6Sc6');
            setValuesTo('txtPg6Sc6I4description,txtPg6Sc6I4legal', '');
            setValuesTo('txtPg6Sc6I4CA,txtPg6Sc6I4CB,txtPg6Sc6I4CC', '0');
        }
        else if (count == 1) {
            enableField('txtPg6Sc6I4description,txtPg6Sc6I4legal,txtPg6Sc6I4CA,txtPg6Sc6I4CB,txtPg6Sc6I4CC');
            //disableField('btnModalPg5Sc4I3');

            setValuesTo('txtPg6Sc6I4description', table.rows[0].cells[0].children[1].value);
            setValuesTo('txtPg6Sc6I4legal', table.rows[0].cells[1].children[0].value);
            setValuesTo('txtPg6Sc6I4CA', table.rows[0].cells[2].children[0].value);
            setValuesTo('txtPg6Sc6I4CB', table.rows[0].cells[3].children[0].value);
            setValuesTo('txtPg6Sc6I4CC', table.rows[0].cells[4].children[0].value);
            main_modalTablePg6Sc6_Col1 = new Array();
            main_modalTablePg6Sc6_Col2 = new Array();
            main_modalTablePg6Sc6_Col3 = new Array();
            main_modalTablePg6Sc6_Col4 = new Array();
            main_modalTablePg6Sc6_Col5 = new Array();

        }
        else {
            Load_modalTablePg6Sc6();
            document.getElementById("frm1702MX:txtPg6Sc6I4description").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg6Sc6I4legal").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg6Sc6I4CA").value = document.getElementById("frm1702MX:txtPg6Sc6_SubTotalCA").value;
            document.getElementById("frm1702MX:txtPg6Sc6I4CB").value = document.getElementById("frm1702MX:txtPg6Sc6_SubTotalCB").value;
            document.getElementById("frm1702MX:txtPg6Sc6I4CC").value = document.getElementById("frm1702MX:txtPg6Sc6_SubTotalCC").value;
            document.getElementById("frm1702MX:txtPg6Sc6I4CD").value = document.getElementById("frm1702MX:txtPg6Sc6_SubTotalCD").value;
            disableField('txtPg6Sc6I4description,txtPg6Sc6I4legal,txtPg6Sc6I4CA,txtPg6Sc6I4CB,txtPg6Sc6I4CC');
            //document.getElementById("frm1702MX:txtCtrmodalPg6Sc6").value = count;

        }

        document.getElementById("frm1702MX:txtCtrmodalPg6Sc6").value = count;
        getSum('txtPg6Sc6I4CA,txtPg6Sc6I4CB,txtPg6Sc6I4CC', 'txtPg6Sc6I4CD');
        computePg6Sc6I5();
        //alert("Saved!");
    }

    function Load_modalTablePg6Sc6() {
        $("#modalTablePg6Sc6 tr").remove();
        var i = main_modalTablePg6Sc6_Col1.length;
        if (main_modalTablePg6Sc6_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg6Sc6();
                document.getElementById("frm1702MX:txtPg6Sc6_" + (x + 1) + "Col1").value = main_modalTablePg6Sc6_Col1[x];
                document.getElementById("frm1702MX:txtPg6Sc6_" + (x + 1) + "Col2").value = main_modalTablePg6Sc6_Col2[x];
                document.getElementById("frm1702MX:txtPg6Sc6_" + (x + 1) + "Col3").value = main_modalTablePg6Sc6_Col3[x];
                document.getElementById("frm1702MX:txtPg6Sc6_" + (x + 1) + "Col4").value = main_modalTablePg6Sc6_Col4[x];
                document.getElementById("frm1702MX:txtPg6Sc6_" + (x + 1) + "Col5").value = main_modalTablePg6Sc6_Col5[x];
            }
        }

        summationmodalTablePg6Sc6();
    }

    function AddRow_modalTablePg6Sc6() {
        var i = document.getElementById("modalTablePg6Sc6").rows.length;
        var table = document.getElementById("modalTablePg6Sc6");

        var disabledAttributeEX = ((totalEX > 0) || !!isValidated) ? "disabled=\"disabled\"" : "";
        var disabledAttributeSP = ((totalSP > 0) || !!isValidated) ? "disabled=\"disabled\"" : "";
        var disabledAttribute2 = (!!isValidated) ? "disabled=\"disabled\"" : "";

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);

        cell1.className = "tblFormTd";
        cell2.className = "tblFormTd"; cell2.style.textAlign = "center";
        cell3.className = "tblFormTd"; cell3.style.width = "15%"; cell3.style.textAlign = "center";
        cell4.className = "tblFormTd"; cell4.style.width = "15%"; cell4.style.textAlign = "center";
        cell5.className = "tblFormTd"; cell5.style.width = "15%"; cell5.style.textAlign = "center";
        cell6.className = "tblFormTd"; cell6.style.width = "15%"; cell6.style.textAlign = "center";
        cell7.className = "tblFormTd"; cell7.style.width = "10%"; cell7.style.textAlign = "center";

        cell1.innerHTML = '<span style="font-weight: bold; font-size: small;">&nbsp;4.' + (i + 1) + '</span> <input type="text" size="8" maxlength="8" ' + disabledAttribute2 + ' id="frm1702MX:txtPg6Sc6_' + (i + 1) + 'Col1" name="frm1702MX:txtPg6Sc6_Col1[]"  onkeypress="return Name(this);" onblur="capitalize(this);" />';
        cell2.innerHTML = '<input type="text" size="8" maxlength="8" id="frm1702MX:txtPg6Sc6_' + (i + 1) + 'Col2" name="frm1702MX:txtPg6Sc6_Col2[]"  onkeypress="return Name(this);" ' + disabledAttribute2 + ' onblur="capitalize(this);" />';
        cell3.innerHTML = '<input type="text" id="frm1702MX:txtPg6Sc6_' + (i + 1) + 'Col3" name="frm1702MX:txtPg6Sc6_Col3[]" class="numbertext frm1702MX:txtColumnAExempt" value="0" size="14" ' + disabledAttributeEX + ' name="frm1702MX:txtColumnAExempt" onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg6Sc6(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)"  maxlength="12" />';
        cell4.innerHTML = '<input type="text" id="frm1702MX:txtPg6Sc6_' + (i + 1) + 'Col4" name="frm1702MX:txtPg6Sc6_Col4[]" class="numbertext frm1702MX:txtColumnBSpecialRate" value="0" size="14" ' + disabledAttributeSP + ' name="frm1702MX:txtColumnBSpecialRate" onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg6Sc6(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)"  maxlength="12" />';
        cell5.innerHTML = '<input type="text" id="frm1702MX:txtPg6Sc6_' + (i + 1) + 'Col5" name="frm1702MX:txtPg6Sc6_Col5[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg6Sc6(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)"  maxlength="12" />';
        cell6.innerHTML = '<input type="text" id="frm1702MX:txtPg6Sc6_' + (i + 1) + 'Col6" name="frm1702MX:txtPg6Sc6_Col6[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' disabled="disabled" />';
        cell7.innerHTML = '<input type="button" value="Remove" onclick="deleteRow(this),removeSaveTemp_modalTablePg6Sc6();" ' + disabledAttribute2 + ' />';
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function removeSaveTemp_modalTablePg6Sc6() {
        temp_Array_Col1 = new Array();
        temp_Array_Col2 = new Array();
        temp_Array_Col3 = new Array();
        temp_Array_Col4 = new Array();
        var str1 = "";
        var str2 = "";
        var numRows = document.getElementById("modalTablePg6Sc6").rows.length;
        var table = document.getElementById("modalTablePg6Sc6");

        for (x = 0; x < numRows; x++) {
            str1 = table.rows[x].cells[0].children[1].value;
            str2 = table.rows[x].cells[1].children[0].value;
            //  if ($.trim(str1) != "" || $.trim(str2) != "") {
            temp_Array_Col1.push(table.rows[x].cells[0].children[1].value);
            temp_Array_Col2.push(table.rows[x].cells[1].children[0].value);
            temp_Array_Col3.push(table.rows[x].cells[2].children[0].value);
            temp_Array_Col4.push(table.rows[x].cells[3].children[0].value);
            temp_Array_Col5.push(table.rows[x].cells[4].children[0].value);
            //  }
        }

        $("#modalTablePg6Sc6 tr").remove();
        var i = temp_Array_Col1.length;
        if (temp_Array_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg6Sc6();
                document.getElementById("frm1702MX:txtPg6Sc6_" + (x + 1) + "Col1").value = temp_Array_Col1[x];
                document.getElementById("frm1702MX:txtPg6Sc6_" + (x + 1) + "Col2").value = temp_Array_Col2[x];
                document.getElementById("frm1702MX:txtPg6Sc6_" + (x + 1) + "Col3").value = temp_Array_Col3[x];
                document.getElementById("frm1702MX:txtPg6Sc6_" + (x + 1) + "Col4").value = temp_Array_Col4[x];
                document.getElementById("frm1702MX:txtPg6Sc6_" + (x + 1) + "Col5").value = temp_Array_Col5[x];
            }
        }
        summationmodalTablePg6Sc6();

        alert("Removed!");
    }
    function Cancel_modalTablePg6Sc6() {
        Load_modalTablePg6Sc6();
        alert("Canceled!");
    }
    //Summation
    function summationmodalTablePg6Sc6() {
        var totalA = 0;
        var totalB = 0;
        var totalC = 0;
        var totalD = 0;
        var totalperRow = 0;
        numRows = document.getElementById("modalTablePg6Sc6").rows.length;
        table = document.getElementById("modalTablePg6Sc6");

        for (x = 0; x < numRows; x++) {

            totalA += NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value));
            totalB += NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));
            totalC += NumWithComma(NumWithParenthesis(table.rows[x].cells[4].children[0].value));
            totalperRow = NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[4].children[0].value));
            table.rows[x].cells[5].children[0].value = NegativeValue(formatCurrencyWOC(totalperRow));

        }
        totalD = totalA + totalB + totalC;
        document.getElementById("frm1702MX:txtPg6Sc6_SubTotalCA").value = NegativeValue(formatCurrencyWOC(totalA));
        document.getElementById("frm1702MX:txtPg6Sc6_SubTotalCB").value = NegativeValue(formatCurrencyWOC(totalB));
        document.getElementById("frm1702MX:txtPg6Sc6_SubTotalCC").value = NegativeValue(formatCurrencyWOC(totalC));
        document.getElementById("frm1702MX:txtPg6Sc6_SubTotalCD").value = NegativeValue(formatCurrencyWOC(totalD));
    }
    var main_modalTablePg7Sc8_Col1 = new Array();
    var main_modalTablePg7Sc8_Col2 = new Array();
    var main_modalTablePg7Sc8_Col3 = new Array();
    var main_modalTablePg7Sc8_Col4 = new Array();
    function checkNullRow_OnClick_modalTablePg7Sc8() {
        params = 'txtPg7Sc8I12,txtPg7Sc8I12CA,txtPg7Sc8I12CB,txtPg7Sc8I12CC';
        buttonModalID = 'btnModalPg7Sc8';
        var str = "";
        var str2 = 0;
        var array = params.split(',');
        if (main_modalTablePg7Sc8_Col1.length > 1) {
            openDialog('modalDivPg7Sc8');
            Load_modalTablePg7Sc8();
        }
        else if (main_modalTablePg7Sc8_Col1.length <= 1) {
            str = document.getElementById('frm1702MX:' + array[0]).value;
            str2 = document.getElementById('frm1702MX:txtPg7Sc8I12CD').value;
            if ($.trim(str) != "" && str2 != 0) {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = false;
                //disableField(params);

                main_modalTablePg7Sc8_Col1[0] = document.getElementById('frm1702MX:' + array[0]).value;
                //alert(main_modalTablePg7Sc8_Col1[0]);

                main_modalTablePg7Sc8_Col2[0] = document.getElementById('frm1702MX:' + array[1]).value;
                //alert(main_modalTablePg7Sc8_Col2[0]);

                main_modalTablePg7Sc8_Col3[0] = document.getElementById('frm1702MX:' + array[2]).value;
                //alert(main_modalTablePg7Sc8_Col3[0]);

                main_modalTablePg7Sc8_Col4[0] = document.getElementById('frm1702MX:' + array[3]).value;
                //alert(main_modalTablePg7Sc8_Col4[0]);
                //setValuesTo(array[0], 'OTHERS');
                openDialog('modalDivPg7Sc8');
                Load_modalTablePg7Sc8();
                //Save_modalTablePg7Sc8();
            }
            else if ($.trim(str) == "") {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = true;
                //alert("User must fill item 12 to add modal");
            }
        }
    }
    function Save_modalTablePg7Sc8() {
        var str = "";
        var count = 0;
        var numRows = document.getElementById("modalTablePg7Sc8").rows.length;
        var table = document.getElementById("modalTablePg7Sc8");

        main_modalTablePg7Sc8_Col1 = new Array();
        main_modalTablePg7Sc8_Col2 = new Array();
        main_modalTablePg7Sc8_Col3 = new Array();
        main_modalTablePg7Sc8_Col4 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                main_modalTablePg7Sc8_Col1.push(table.rows[x].cells[0].children[1].value);
                main_modalTablePg7Sc8_Col2.push(table.rows[x].cells[1].children[0].value);
                main_modalTablePg7Sc8_Col3.push(table.rows[x].cells[2].children[0].value);
                main_modalTablePg7Sc8_Col4.push(table.rows[x].cells[3].children[0].value);
                count += 1;
            }
        }

        if (count == 0) {
            enableField('txtPg7Sc8I12,txtPg7Sc8I12CA,txtPg7Sc8I12CB,txtPg7Sc8I12CC');
            disableField('btnModalPg7Sc8');
            setValuesTo('txtPg7Sc8I12', '');
            setValuesTo('txtPg7Sc8I12CA,txtPg7Sc8I12CB,txtPg7Sc8I12CC', '0');
        }
        else if (count == 1) {
            enableField('txtPg7Sc8I12,txtPg7Sc8I12CA,txtPg7Sc8I12CB,txtPg7Sc8I12CC');
            //disableField('btnModalPg5Sc4I3');

            setValuesTo('txtPg7Sc8I12', table.rows[0].cells[0].children[1].value);
            setValuesTo('txtPg7Sc8I12CA', table.rows[0].cells[1].children[0].value);
            setValuesTo('txtPg7Sc8I12CB', table.rows[0].cells[2].children[0].value);
            setValuesTo('txtPg7Sc8I12CC', table.rows[0].cells[3].children[0].value);
            main_modalTablePg7Sc8_Col1 = new Array();
            main_modalTablePg7Sc8_Col2 = new Array();
            main_modalTablePg7Sc8_Col3 = new Array();
            main_modalTablePg7Sc8_Col4 = new Array();

        }
        else {
            Load_modalTablePg7Sc8();
            document.getElementById("frm1702MX:txtPg7Sc8I12").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg7Sc8I12CA").value = document.getElementById("frm1702MX:txtPg7Sc8_SubTotalCA").value;
            document.getElementById("frm1702MX:txtPg7Sc8I12CB").value = document.getElementById("frm1702MX:txtPg7Sc8_SubTotalCB").value;
            document.getElementById("frm1702MX:txtPg7Sc8I12CC").value = document.getElementById("frm1702MX:txtPg7Sc8_SubTotalCC").value;
            document.getElementById("frm1702MX:txtPg7Sc8I12CD").value = document.getElementById("frm1702MX:txtPg7Sc8_SubTotalCD").value;
            disableField('txtPg7Sc8I12,txtPg7Sc8I12CA,txtPg7Sc8I12CB,txtPg7Sc8I12CC');

        }
        document.getElementById("frm1702MX:txtCtrmodalPg7Sc8").value = count;
        getSum('txtPg7Sc8I12CA,txtPg7Sc8I12CB,txtPg7Sc8I12CC', 'txtPg7Sc8I12CD');
        computePg7Sc8I13();
        //alert("Saved!");
    }

    function Load_modalTablePg7Sc8() {
        $("#modalTablePg7Sc8 tr").remove();
        var i = main_modalTablePg7Sc8_Col1.length;
        if (main_modalTablePg7Sc8_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg7Sc8();
                document.getElementById("frm1702MX:txtPg7Sc8_" + (x + 1) + "Col1").value = main_modalTablePg7Sc8_Col1[x];
                document.getElementById("frm1702MX:txtPg7Sc8_" + (x + 1) + "Col2").value = main_modalTablePg7Sc8_Col2[x];
                document.getElementById("frm1702MX:txtPg7Sc8_" + (x + 1) + "Col3").value = main_modalTablePg7Sc8_Col3[x];
                document.getElementById("frm1702MX:txtPg7Sc8_" + (x + 1) + "Col4").value = main_modalTablePg7Sc8_Col4[x];
            }
        }

        summationmodalTablePg7Sc8();
    }

    function AddRow_modalTablePg7Sc8() {
        var i = document.getElementById("modalTablePg7Sc8").rows.length;
        var table = document.getElementById("modalTablePg7Sc8");

        var disabledAttribute2 = (!!isValidated) ? "disabled=\"disabled\"" : "";

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);

        cell1.className = "tblFormTd";
        cell2.className = "tblFormTd"; cell2.style.width = "15%"; cell2.style.textAlign = "center";
        cell3.className = "tblFormTd"; cell3.style.width = "15%"; cell3.style.textAlign = "center";
        cell4.className = "tblFormTd"; cell4.style.width = "15%"; cell4.style.textAlign = "center";
        cell5.className = "tblFormTd"; cell5.style.width = "15%"; cell5.style.textAlign = "center";
        cell6.className = "tblFormTd"; cell6.style.width = "10%"; cell6.style.textAlign = "center";

        cell1.innerHTML = '<span style="font-weight: bold; font-size: small;">&nbsp;12.' + (i + 1) + '</span> <input type="text" size="20" maxlength="18" ' + disabledAttribute2 + ' id="frm1702MX:txtPg7Sc8_' + (i + 1) + 'Col1" name="frm1702MX:txtPg7Sc8_Col1[]"  onkeypress="return Name(this);" onblur="capitalize(this);" />';
        cell2.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc8_' + (i + 1) + 'Col2" name="frm1702MX:txtPg7Sc8_Col2[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg7Sc8(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)" maxlength="12" />';
        cell3.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc8_' + (i + 1) + 'Col3" name="frm1702MX:txtPg7Sc8_Col3[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg7Sc8(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)" maxlength="12" />';
        cell4.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc8_' + (i + 1) + 'Col4" name="frm1702MX:txtPg7Sc8_Col4[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg7Sc8(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)" maxlength="12" />';
        cell5.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc8_' + (i + 1) + 'Col5" name="frm1702MX:txtPg7Sc8_Col5[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' disabled="disabled" />';
        cell6.innerHTML = '<input type="button" value="Remove" onclick="deleteRow(this),removeSaveTemp_modalTablePg7Sc8()" ' + disabledAttribute2 + ' />';
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function removeSaveTemp_modalTablePg7Sc8() {
        temp_Array_Col1 = new Array();
        temp_Array_Col2 = new Array();
        temp_Array_Col3 = new Array();
        temp_Array_Col4 = new Array();
        var str = "";
        var numRows = document.getElementById("modalTablePg7Sc8").rows.length;
        var table = document.getElementById("modalTablePg7Sc8");

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            // if ($.trim(str) != "") {
            temp_Array_Col1.push(table.rows[x].cells[0].children[1].value);
            temp_Array_Col2.push(table.rows[x].cells[1].children[0].value);
            temp_Array_Col3.push(table.rows[x].cells[2].children[0].value);
            temp_Array_Col4.push(table.rows[x].cells[3].children[0].value);
            // }
        }

        $("#modalTablePg7Sc8 tr").remove();
        var i = temp_Array_Col1.length;
        if (temp_Array_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg7Sc8();
                document.getElementById("frm1702MX:txtPg7Sc8_" + (x + 1) + "Col1").value = temp_Array_Col1[x];
                document.getElementById("frm1702MX:txtPg7Sc8_" + (x + 1) + "Col2").value = temp_Array_Col2[x];
                document.getElementById("frm1702MX:txtPg7Sc8_" + (x + 1) + "Col3").value = temp_Array_Col3[x];
                document.getElementById("frm1702MX:txtPg7Sc8_" + (x + 1) + "Col4").value = temp_Array_Col4[x];
            }
        }
        summationmodalTablePg7Sc8();

        alert("Removed!");
    }
    function Cancel_modalTablePg7Sc8() {
        Load_modalTablePg7Sc8();
        alert("Canceled!");
    }
    function summationmodalTablePg7Sc8() {
        var totalA = 0;
        var totalB = 0;
        var totalC = 0;
        var totalD = 0;
        var totalperRow = 0;
        numRows = document.getElementById("modalTablePg7Sc8").rows.length;
        table = document.getElementById("modalTablePg7Sc8");

        for (x = 0; x < numRows; x++) {

            totalA += NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value));
            totalB += NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value));
            totalC += NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));
            totalperRow = NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));
            table.rows[x].cells[4].children[0].value = NegativeValue(formatCurrencyWOC(totalperRow));

        }
        totalD = totalA + totalB + totalC;
        document.getElementById("frm1702MX:txtPg7Sc8_SubTotalCA").value = NegativeValue(formatCurrencyWOC(totalA));
        document.getElementById("frm1702MX:txtPg7Sc8_SubTotalCB").value = NegativeValue(formatCurrencyWOC(totalB));
        document.getElementById("frm1702MX:txtPg7Sc8_SubTotalCC").value = NegativeValue(formatCurrencyWOC(totalC));
        document.getElementById("frm1702MX:txtPg7Sc8_SubTotalCD").value = NegativeValue(formatCurrencyWOC(totalD));
    }
    var main_modalTablePg7Sc10I3_Col1 = new Array();
    var main_modalTablePg7Sc10I3_Col2 = new Array();
    var main_modalTablePg7Sc10I3_Col3 = new Array();
    var main_modalTablePg7Sc10I3_Col4 = new Array();
    function checkNullRow_OnClick_modalTablePg7Sc10I3() {
        params = 'txtPg7Sc10I3,txtPg7Sc10I3CA,txtPg7Sc10I3CB,txtPg7Sc10I3CC';
        buttonModalID = 'btnModalPg7Sc10I3';
        var str = "";
        var str2 = 0;
        var array = params.split(',');
        if (main_modalTablePg7Sc10I3_Col1.length > 1) {
            openDialog('modalDivPg7Sc10I3');
            Load_modalTablePg7Sc10I3();
        }
        else if (main_modalTablePg7Sc10I3_Col1.length <= 1) {
            str = document.getElementById('frm1702MX:' + array[0]).value;
            str2 = document.getElementById('frm1702MX:txtPg7Sc10I3CD').value;
            if ($.trim(str) != "" && str2 != 0) {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = false;
                //disableField(params);

                main_modalTablePg7Sc10I3_Col1[0] = document.getElementById('frm1702MX:' + array[0]).value;
                //alert(main_modalTablePg7Sc10I3_Col1[0]);

                main_modalTablePg7Sc10I3_Col2[0] = document.getElementById('frm1702MX:' + array[1]).value;
                //alert(main_modalTablePg7Sc10I3_Col2[0]);

                main_modalTablePg7Sc10I3_Col3[0] = document.getElementById('frm1702MX:' + array[2]).value;
                //alert(main_modalTablePg7Sc10I3_Col3[0]);

                main_modalTablePg7Sc10I3_Col4[0] = document.getElementById('frm1702MX:' + array[3]).value;
                //alert(main_modalTablePg7Sc10I3_Col4[0]);
                //setValuesTo(array[0], 'OTHERS');
                openDialog('modalDivPg7Sc10I3');
                Load_modalTablePg7Sc10I3();
                //Save_modalTablePg7Sc10I3();
            }
            else if ($.trim(str) == "") {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = true;
                //alert("User must fill item 3 to add modal");
            }
        }
    }
    function Save_modalTablePg7Sc10I3() {
        var str = "";
        var count = 0;
        var numRows = document.getElementById("modalTablePg7Sc10I3").rows.length;
        var table = document.getElementById("modalTablePg7Sc10I3");

        main_modalTablePg7Sc10I3_Col1 = new Array();
        main_modalTablePg7Sc10I3_Col2 = new Array();
        main_modalTablePg7Sc10I3_Col3 = new Array();
        main_modalTablePg7Sc10I3_Col4 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                main_modalTablePg7Sc10I3_Col1.push(table.rows[x].cells[0].children[1].value);
                main_modalTablePg7Sc10I3_Col2.push(table.rows[x].cells[1].children[0].value);
                main_modalTablePg7Sc10I3_Col3.push(table.rows[x].cells[2].children[0].value);
                main_modalTablePg7Sc10I3_Col4.push(table.rows[x].cells[3].children[0].value);
                count += 1;
            }
        }


        if (count == 0) {
            enableField('txtPg7Sc10I3,txtPg7Sc10I3CA,txtPg7Sc10I3CB,txtPg7Sc10I3CC');
            disableField('btnModalPg7Sc10I3');
            setValuesTo('txtPg7Sc10I3', '');
            setValuesTo('txtPg7Sc10I3CA,txtPg7Sc10I3CB,txtPg7Sc10I3CC', '0');
        }
        else if (count == 1) {
            enableField('txtPg7Sc10I3,txtPg7Sc10I3CA,txtPg7Sc10I3CB,txtPg7Sc10I3CC');
            //disableField('btnModalPg5Sc4I3');

            setValuesTo('txtPg7Sc10I3', table.rows[0].cells[0].children[1].value);
            setValuesTo('txtPg7Sc10I3CA', table.rows[0].cells[1].children[0].value);
            setValuesTo('txtPg7Sc10I3CB', table.rows[0].cells[2].children[0].value);
            setValuesTo('txtPg7Sc10I3CC', table.rows[0].cells[3].children[0].value);
            main_modalTablePg7Sc10I3_Col1 = new Array();
            main_modalTablePg7Sc10I3_Col2 = new Array();
            main_modalTablePg7Sc10I3_Col3 = new Array();
            main_modalTablePg7Sc10I3_Col4 = new Array();

        }
        else {
            Load_modalTablePg7Sc10I3();
            document.getElementById("frm1702MX:txtPg7Sc10I3").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg7Sc10I3CA").value = document.getElementById("frm1702MX:txtPg7Sc10I3_SubTotalCA").value;
            document.getElementById("frm1702MX:txtPg7Sc10I3CB").value = document.getElementById("frm1702MX:txtPg7Sc10I3_SubTotalCB").value;
            document.getElementById("frm1702MX:txtPg7Sc10I3CC").value = document.getElementById("frm1702MX:txtPg7Sc10I3_SubTotalCC").value;
            document.getElementById("frm1702MX:txtPg7Sc10I3CD").value = document.getElementById("frm1702MX:txtPg7Sc10I3_SubTotalCD").value;
            disableField('txtPg7Sc10I3,txtPg7Sc10I3CA,txtPg7Sc10I3CB,txtPg7Sc10I3CC');

        }
        document.getElementById("frm1702MX:txtCtrmodalPg7Sc10I3").value = count;
        getSum('txtPg7Sc10I3CA,txtPg7Sc10I3CB,txtPg7Sc10I3CC', 'txtPg7Sc10I3CD');
        computePg7Sc10I4();
        //alert("Saved!");
    }

    function Load_modalTablePg7Sc10I3() {
        $("#modalTablePg7Sc10I3 tr").remove();
        var i = main_modalTablePg7Sc10I3_Col1.length;
        if (main_modalTablePg7Sc10I3_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg7Sc10I3();
                document.getElementById("frm1702MX:txtPg7Sc10I3_" + (x + 1) + "Col1").value = main_modalTablePg7Sc10I3_Col1[x];
                document.getElementById("frm1702MX:txtPg7Sc10I3_" + (x + 1) + "Col2").value = main_modalTablePg7Sc10I3_Col2[x];
                document.getElementById("frm1702MX:txtPg7Sc10I3_" + (x + 1) + "Col3").value = main_modalTablePg7Sc10I3_Col3[x];
                document.getElementById("frm1702MX:txtPg7Sc10I3_" + (x + 1) + "Col4").value = main_modalTablePg7Sc10I3_Col4[x];
            }
        }

        summationmodalTablePg7Sc10I3();
    }

    function AddRow_modalTablePg7Sc10I3() {
        var i = document.getElementById("modalTablePg7Sc10I3").rows.length;
        var table = document.getElementById("modalTablePg7Sc10I3");

        var disabledAttribute2 = (!!isValidated) ? "disabled=\"disabled\"" : "";

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);

        cell1.className = "tblFormTd";
        cell2.className = "tblFormTd"; cell2.style.width = "15%"; cell2.style.textAlign = "center";
        cell3.className = "tblFormTd"; cell3.style.width = "15%"; cell3.style.textAlign = "center";
        cell4.className = "tblFormTd"; cell4.style.width = "15%"; cell4.style.textAlign = "center";
        cell5.className = "tblFormTd"; cell5.style.width = "15%"; cell5.style.textAlign = "center";
        cell6.className = "tblFormTd"; cell6.style.width = "10%"; cell6.style.textAlign = "center";

        cell1.innerHTML = '<span style="font-weight: bold; font-size: small;">&nbsp;3.' + (i + 1) + '</span> <input type="text" size="20" maxlength="18" ' + disabledAttribute2 + ' id="frm1702MX:txtPg7Sc10I3_' + (i + 1) + 'Col1" name="frm1702MX:txtPg7Sc10I3_Col1[]"  onkeypress="return Name(this);" onblur="capitalize(this);" />';
        cell2.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc10I3_' + (i + 1) + 'Col2" name="frm1702MX:txtPg7Sc10I3_Col2[]" class="numbertext" ' + disabledAttribute2 + ' value="0" size="14" onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg7Sc10I3(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)"  maxlength="12" />';
        cell3.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc10I3_' + (i + 1) + 'Col3" name="frm1702MX:txtPg7Sc10I3_Col3[]" class="numbertext" ' + disabledAttribute2 + ' value="0" size="14" onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg7Sc10I3(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)"  maxlength="12" />';
        cell4.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc10I3_' + (i + 1) + 'Col4" name="frm1702MX:txtPg7Sc10I3_Col4[]" class="numbertext" ' + disabledAttribute2 + ' value="0" size="14" onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg7Sc10I3(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)"  maxlength="12" />';
        cell5.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc10I3_' + (i + 1) + 'Col5" name="frm1702MX:txtPg7Sc10I3_Col5[]" class="numbertext" ' + disabledAttribute2 + ' value="0" size="14" disabled="disabled" />';
        cell6.innerHTML = '<input type="button" value="Remove" onclick="deleteRow(this),removeSaveTemp_modalTablePg7Sc10I3()" ' + disabledAttribute2 + ' />';

        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function removeSaveTemp_modalTablePg7Sc10I3() {
        temp_Array_Col1 = new Array();
        temp_Array_Col2 = new Array();
        temp_Array_Col3 = new Array();
        temp_Array_Col4 = new Array();
        var str = "";
        var numRows = document.getElementById("modalTablePg7Sc10I3").rows.length;
        var table = document.getElementById("modalTablePg7Sc10I3");

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            //if ($.trim(str) != "") {
            temp_Array_Col1.push(table.rows[x].cells[0].children[1].value);
            temp_Array_Col2.push(table.rows[x].cells[1].children[0].value);
            temp_Array_Col3.push(table.rows[x].cells[2].children[0].value);
            temp_Array_Col4.push(table.rows[x].cells[3].children[0].value);
            // }
        }

        $("#modalTablePg7Sc10I3 tr").remove();
        var i = temp_Array_Col1.length;
        if (temp_Array_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg7Sc10I3();
                document.getElementById("frm1702MX:txtPg7Sc10I3_" + (x + 1) + "Col1").value = temp_Array_Col1[x];
                document.getElementById("frm1702MX:txtPg7Sc10I3_" + (x + 1) + "Col2").value = temp_Array_Col2[x];
                document.getElementById("frm1702MX:txtPg7Sc10I3_" + (x + 1) + "Col3").value = temp_Array_Col3[x];
                document.getElementById("frm1702MX:txtPg7Sc10I3_" + (x + 1) + "Col4").value = temp_Array_Col4[x];
            }
        }
        summationmodalTablePg7Sc10I3();

        alert("Removed!");
    }
    function Cancel_modalTablePg7Sc10I3() {
        Load_modalTablePg7Sc10I3();
        alert("Canceled!");
    }
    function summationmodalTablePg7Sc10I3() {
        var totalA = 0;
        var totalB = 0;
        var totalC = 0;
        var totalD = 0;
        var totalperRow = 0;
        numRows = document.getElementById("modalTablePg7Sc10I3").rows.length;
        table = document.getElementById("modalTablePg7Sc10I3");

        for (x = 0; x < numRows; x++) {

            totalA += NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value));
            totalB += NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value));
            totalC += NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));
            totalperRow = NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));
            table.rows[x].cells[4].children[0].value = NegativeValue(formatCurrencyWOC(totalperRow));

        }
        totalD = totalA + totalB + totalC;
        document.getElementById("frm1702MX:txtPg7Sc10I3_SubTotalCA").value = NegativeValue(formatCurrencyWOC(totalA));
        document.getElementById("frm1702MX:txtPg7Sc10I3_SubTotalCB").value = NegativeValue(formatCurrencyWOC(totalB));
        document.getElementById("frm1702MX:txtPg7Sc10I3_SubTotalCC").value = NegativeValue(formatCurrencyWOC(totalC));
        document.getElementById("frm1702MX:txtPg7Sc10I3_SubTotalCD").value = NegativeValue(formatCurrencyWOC(totalD));
    }
    var main_modalTablePg7Sc10I6_Col1 = new Array();
    var main_modalTablePg7Sc10I6_Col2 = new Array();
    var main_modalTablePg7Sc10I6_Col3 = new Array();
    var main_modalTablePg7Sc10I6_Col4 = new Array();
    function checkNullRow_OnClick_modalTablePg7Sc10I6() {
        params = 'txtPg7Sc10I6,txtPg7Sc10I6CA,txtPg7Sc10I6CB,txtPg7Sc10I6CC';
        buttonModalID = 'btnModalPg7Sc10I6';
        var str = "";
        var str2 = 0;
        var array = params.split(',');
        if (main_modalTablePg7Sc10I6_Col1.length > 1) {
            openDialog('modalDivPg7Sc10I6');
            Load_modalTablePg7Sc10I6();
        }
        else if (main_modalTablePg7Sc10I6_Col1.length <= 1) {
            str = document.getElementById('frm1702MX:' + array[0]).value;
            str2 = document.getElementById('frm1702MX:txtPg7Sc10I6CD').value;

            if ($.trim(str) != "" && str2 != 0) {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = false;
                //disableField(params);

                main_modalTablePg7Sc10I6_Col1[0] = document.getElementById('frm1702MX:' + array[0]).value;
                //alert(main_modalTablePg7Sc10I6_Col1[0]);

                main_modalTablePg7Sc10I6_Col2[0] = document.getElementById('frm1702MX:' + array[1]).value;
                //alert(main_modalTablePg7Sc10I6_Col2[0]);

                main_modalTablePg7Sc10I6_Col3[0] = document.getElementById('frm1702MX:' + array[2]).value;
                //alert(main_modalTablePg7Sc10I6_Col3[0]);

                main_modalTablePg7Sc10I6_Col4[0] = document.getElementById('frm1702MX:' + array[3]).value;
                //alert(main_modalTablePg7Sc10I6_Col4[0]);
                //setValuesTo(array[0], 'OTHERS');
                openDialog('modalDivPg7Sc10I6');
                Load_modalTablePg7Sc10I6();
                //Save_modalTablePg7Sc10I6();
            }
            else if ($.trim(str) == "") {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = true;
                //alert("User must fill item 6 to add modal");
            }
        }
    }
    function Save_modalTablePg7Sc10I6() {
        var str = "";
        var count = 0;
        var numRows = document.getElementById("modalTablePg7Sc10I6").rows.length;
        var table = document.getElementById("modalTablePg7Sc10I6");

        main_modalTablePg7Sc10I6_Col1 = new Array();
        main_modalTablePg7Sc10I6_Col2 = new Array();
        main_modalTablePg7Sc10I6_Col3 = new Array();
        main_modalTablePg7Sc10I6_Col4 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                main_modalTablePg7Sc10I6_Col1.push(table.rows[x].cells[0].children[1].value);
                main_modalTablePg7Sc10I6_Col2.push(table.rows[x].cells[1].children[0].value);
                main_modalTablePg7Sc10I6_Col3.push(table.rows[x].cells[2].children[0].value);
                main_modalTablePg7Sc10I6_Col4.push(table.rows[x].cells[3].children[0].value);
                count += 1;
            }
        }


        if (count == 0) {
            enableField('txtPg7Sc10I6,txtPg7Sc10I6CA,txtPg7Sc10I6CB,txtPg7Sc10I6CC');
            disableField('btnModalPg7Sc10I6');
            setValuesTo('txtPg7Sc10I6', '');
            setValuesTo('txtPg7Sc10I6CA,txtPg7Sc10I6CB,txtPg7Sc10I6CC', '0');
        }
        else if (count == 1) {
            enableField('txtPg7Sc10I6,txtPg7Sc10I6CA,txtPg7Sc10I6CB,txtPg7Sc10I6CC');
            //disableField('btnModalPg5Sc4I3');

            setValuesTo('txtPg7Sc10I6', table.rows[0].cells[0].children[1].value);
            setValuesTo('txtPg7Sc10I6CA', table.rows[0].cells[1].children[0].value);
            setValuesTo('txtPg7Sc10I6CB', table.rows[0].cells[2].children[0].value);
            setValuesTo('txtPg7Sc10I6CC', table.rows[0].cells[3].children[0].value);
            main_modalTablePg7Sc10I6_Col1 = new Array();
            main_modalTablePg7Sc10I6_Col2 = new Array();
            main_modalTablePg7Sc10I6_Col3 = new Array();
            main_modalTablePg7Sc10I6_Col4 = new Array();

        }
        else {
            Load_modalTablePg7Sc10I6();
            document.getElementById("frm1702MX:txtPg7Sc10I6").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg7Sc10I6CA").value = document.getElementById("frm1702MX:txtPg7Sc10I6_SubTotalCA").value;
            document.getElementById("frm1702MX:txtPg7Sc10I6CB").value = document.getElementById("frm1702MX:txtPg7Sc10I6_SubTotalCB").value;
            document.getElementById("frm1702MX:txtPg7Sc10I6CC").value = document.getElementById("frm1702MX:txtPg7Sc10I6_SubTotalCC").value;
            document.getElementById("frm1702MX:txtPg7Sc10I6CD").value = document.getElementById("frm1702MX:txtPg7Sc10I6_SubTotalCD").value;
            disableField('txtPg7Sc10I6,txtPg7Sc10I6CA,txtPg7Sc10I6CB,txtPg7Sc10I6CC');

        }
        document.getElementById("frm1702MX:txtCtrmodalPg7Sc10I6").value = count;
        getSum('txtPg7Sc10I6CA,txtPg7Sc10I6CB,txtPg7Sc10I6CC', 'txtPg7Sc10I6CD');
        computePg7Sc10I9();
        //alert("Saved!");
    }

    function Load_modalTablePg7Sc10I6() {
        $("#modalTablePg7Sc10I6 tr").remove();
        var i = main_modalTablePg7Sc10I6_Col1.length;
        if (main_modalTablePg7Sc10I6_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg7Sc10I6();
                document.getElementById("frm1702MX:txtPg7Sc10I6_" + (x + 1) + "Col1").value = main_modalTablePg7Sc10I6_Col1[x];
                document.getElementById("frm1702MX:txtPg7Sc10I6_" + (x + 1) + "Col2").value = main_modalTablePg7Sc10I6_Col2[x];
                document.getElementById("frm1702MX:txtPg7Sc10I6_" + (x + 1) + "Col3").value = main_modalTablePg7Sc10I6_Col3[x];
                document.getElementById("frm1702MX:txtPg7Sc10I6_" + (x + 1) + "Col4").value = main_modalTablePg7Sc10I6_Col4[x];
            }
        }

        summationmodalTablePg7Sc10I6();
    }

    function AddRow_modalTablePg7Sc10I6() {
        var i = document.getElementById("modalTablePg7Sc10I6").rows.length;
        var table = document.getElementById("modalTablePg7Sc10I6");

        var disabledAttribute2 = (!!isValidated) ? "disabled=\"disabled\"" : "";

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);

        cell1.className = "tblFormTd";
        cell2.className = "tblFormTd"; cell2.style.width = "15%"; cell2.style.textAlign = "center";
        cell3.className = "tblFormTd"; cell3.style.width = "15%"; cell3.style.textAlign = "center";
        cell4.className = "tblFormTd"; cell4.style.width = "15%"; cell4.style.textAlign = "center";
        cell5.className = "tblFormTd"; cell5.style.width = "15%"; cell5.style.textAlign = "center";
        cell6.className = "tblFormTd"; cell6.style.width = "10%"; cell6.style.textAlign = "center";

        cell1.innerHTML = '<span style="font-weight: bold; font-size: small;">&nbsp;6.' + (i + 1) + '</span> <input type="text" size="20" maxlength="18" ' + disabledAttribute2 + ' id="frm1702MX:txtPg7Sc10I6_' + (i + 1) + 'Col1" name="frm1702MX:txtPg7Sc10I6_Col1[]"  onkeypress="return Name(this);" onblur="capitalize(this);" /></td>';
        cell2.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc10I6_' + (i + 1) + 'Col2" name="frm1702MX:txtPg7Sc10I6_Col2[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg7Sc10I6(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)" maxlength="12" />';
        cell3.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc10I6_' + (i + 1) + 'Col3" name="frm1702MX:txtPg7Sc10I6_Col3[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg7Sc10I6(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)" maxlength="12" />';
        cell4.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc10I6_' + (i + 1) + 'Col4" name="frm1702MX:txtPg7Sc10I6_Col4[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg7Sc10I6(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)" maxlength="12" />';
        cell5.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc10I6_' + (i + 1) + 'Col5" name="frm1702MX:txtPg7Sc10I6_Col5[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' disabled="disabled" />';
        cell6.innerHTML = '<input type="button" value="Remove" onclick="deleteRow(this),removeSaveTemp_modalTablePg7Sc10I6()" ' + disabledAttribute2 + ' />';
        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function removeSaveTemp_modalTablePg7Sc10I6() {
        temp_Array_Col1 = new Array();
        temp_Array_Col2 = new Array();
        temp_Array_Col3 = new Array();
        temp_Array_Col4 = new Array();
        var str = "";
        var numRows = document.getElementById("modalTablePg7Sc10I6").rows.length;
        var table = document.getElementById("modalTablePg7Sc10I6");

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            // if ($.trim(str) != "") {
            temp_Array_Col1.push(table.rows[x].cells[0].children[1].value);
            temp_Array_Col2.push(table.rows[x].cells[1].children[0].value);
            temp_Array_Col3.push(table.rows[x].cells[2].children[0].value);
            temp_Array_Col4.push(table.rows[x].cells[3].children[0].value);
            // }
        }

        $("#modalTablePg7Sc10I6 tr").remove();
        var i = temp_Array_Col1.length;
        if (temp_Array_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg7Sc10I6();
                document.getElementById("frm1702MX:txtPg7Sc10I6_" + (x + 1) + "Col1").value = temp_Array_Col1[x];
                document.getElementById("frm1702MX:txtPg7Sc10I6_" + (x + 1) + "Col2").value = temp_Array_Col2[x];
                document.getElementById("frm1702MX:txtPg7Sc10I6_" + (x + 1) + "Col3").value = temp_Array_Col3[x];
                document.getElementById("frm1702MX:txtPg7Sc10I6_" + (x + 1) + "Col4").value = temp_Array_Col4[x];
            }
        }
        summationmodalTablePg7Sc10I6();

        alert("Removed!");
    }
    function Cancel_modalTablePg7Sc10I6() {
        Load_modalTablePg7Sc10I6();
        alert("Canceled!");
    }
    function summationmodalTablePg7Sc10I6() {
        var totalA = 0;
        var totalB = 0;
        var totalC = 0;
        var totalD = 0;
        var totalperRow = 0;
        numRows = document.getElementById("modalTablePg7Sc10I6").rows.length;
        table = document.getElementById("modalTablePg7Sc10I6");

        for (x = 0; x < numRows; x++) {

            totalA += NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value));
            totalB += NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value));
            totalC += NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));
            totalperRow = NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));
            table.rows[x].cells[4].children[0].value = NegativeValue(formatCurrencyWOC(totalperRow));

        }
        totalD = totalA + totalB + totalC;
        document.getElementById("frm1702MX:txtPg7Sc10I6_SubTotalCA").value = NegativeValue(formatCurrencyWOC(totalA));
        document.getElementById("frm1702MX:txtPg7Sc10I6_SubTotalCB").value = NegativeValue(formatCurrencyWOC(totalB));
        document.getElementById("frm1702MX:txtPg7Sc10I6_SubTotalCC").value = NegativeValue(formatCurrencyWOC(totalC));
        document.getElementById("frm1702MX:txtPg7Sc10I6_SubTotalCD").value = NegativeValue(formatCurrencyWOC(totalD));
    }
    var main_modalTablePg7Sc10I8_Col1 = new Array();
    var main_modalTablePg7Sc10I8_Col2 = new Array();
    var main_modalTablePg7Sc10I8_Col3 = new Array();
    var main_modalTablePg7Sc10I8_Col4 = new Array();
    function checkNullRow_OnClick_modalTablePg7Sc10I8() {
        params = 'txtPg7Sc10I8,txtPg7Sc10I8CA,txtPg7Sc10I8CB,txtPg7Sc10I8CC';
        buttonModalID = 'btnModalPg7Sc10I8';
        var str = "";
        var str2 = 0;
        var array = params.split(',');
        if (main_modalTablePg7Sc10I8_Col1.length > 1) {
            openDialog('modalDivPg7Sc10I8');
            Load_modalTablePg7Sc10I8();
        }
        else if (main_modalTablePg7Sc10I8_Col1.length <= 1) {
            str = document.getElementById('frm1702MX:' + array[0]).value;
            str2 = document.getElementById('frm1702MX:txtPg7Sc10I8CD').value;
            if ($.trim(str) != "" && str2 != 0) {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = false;
                //disableField(params);

                main_modalTablePg7Sc10I8_Col1[0] = document.getElementById('frm1702MX:' + array[0]).value;
                //alert(main_modalTablePg7Sc10I8_Col1[0]);

                main_modalTablePg7Sc10I8_Col2[0] = document.getElementById('frm1702MX:' + array[1]).value;
                //alert(main_modalTablePg7Sc10I8_Col2[0]);

                main_modalTablePg7Sc10I8_Col3[0] = document.getElementById('frm1702MX:' + array[2]).value;
                //alert(main_modalTablePg7Sc10I8_Col3[0]);

                main_modalTablePg7Sc10I8_Col4[0] = document.getElementById('frm1702MX:' + array[3]).value;
                //alert(main_modalTablePg7Sc10I8_Col4[0]);
                //setValuesTo(array[0], 'OTHERS');
                openDialog('modalDivPg7Sc10I8');
                Load_modalTablePg7Sc10I8();
                //Save_modalTablePg7Sc10I8();
            }
            else if ($.trim(str) == "") {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = true;
                //alert("User must fill item 8 to add modal");
            }
        }
    }
    function Save_modalTablePg7Sc10I8() {
        var str = "";
        var count = 0;
        var numRows = document.getElementById("modalTablePg7Sc10I8").rows.length;
        var table = document.getElementById("modalTablePg7Sc10I8");

        main_modalTablePg7Sc10I8_Col1 = new Array();
        main_modalTablePg7Sc10I8_Col2 = new Array();
        main_modalTablePg7Sc10I8_Col3 = new Array();
        main_modalTablePg7Sc10I8_Col4 = new Array();

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                main_modalTablePg7Sc10I8_Col1.push(table.rows[x].cells[0].children[1].value);
                main_modalTablePg7Sc10I8_Col2.push(table.rows[x].cells[1].children[0].value);
                main_modalTablePg7Sc10I8_Col3.push(table.rows[x].cells[2].children[0].value);
                main_modalTablePg7Sc10I8_Col4.push(table.rows[x].cells[3].children[0].value);
                count += 1;
            }
        }


        if (count == 0) {
            enableField('txtPg7Sc10I8,txtPg7Sc10I8CA,txtPg7Sc10I8CB,txtPg7Sc10I8CC');
            disableField('btnModalPg7Sc10I8');
            setValuesTo('txtPg7Sc10I8', '');
            setValuesTo('txtPg7Sc10I8CA,txtPg7Sc10I8CB,txtPg7Sc10I8CC', '0');
        }
        else if (count == 1) {
            enableField('txtPg7Sc10I8,txtPg7Sc10I8CA,txtPg7Sc10I8CB,txtPg7Sc10I8CC');
            //disableField('btnModalPg5Sc4I3');

            setValuesTo('txtPg7Sc10I8', table.rows[0].cells[0].children[1].value);
            setValuesTo('txtPg7Sc10I8CA', table.rows[0].cells[1].children[0].value);
            setValuesTo('txtPg7Sc10I8CB', table.rows[0].cells[2].children[0].value);
            setValuesTo('txtPg7Sc10I8CC', table.rows[0].cells[3].children[0].value);
            main_modalTablePg7Sc10I8_Col1 = new Array();
            main_modalTablePg7Sc10I8_Col2 = new Array();
            main_modalTablePg7Sc10I8_Col3 = new Array();
            main_modalTablePg7Sc10I8_Col4 = new Array();

        }
        else {
            Load_modalTablePg7Sc10I8();
            document.getElementById("frm1702MX:txtPg7Sc10I8").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg7Sc10I8CA").value = document.getElementById("frm1702MX:txtPg7Sc10I8_SubTotalCA").value;
            document.getElementById("frm1702MX:txtPg7Sc10I8CB").value = document.getElementById("frm1702MX:txtPg7Sc10I8_SubTotalCB").value;
            document.getElementById("frm1702MX:txtPg7Sc10I8CC").value = document.getElementById("frm1702MX:txtPg7Sc10I8_SubTotalCC").value;
            document.getElementById("frm1702MX:txtPg7Sc10I8CD").value = document.getElementById("frm1702MX:txtPg7Sc10I8_SubTotalCD").value;
            disableField('txtPg7Sc10I8,txtPg7Sc10I8CA,txtPg7Sc10I8CB,txtPg7Sc10I8CC');

        }
        document.getElementById("frm1702MX:txtCtrmodalPg7Sc10I8").value = count;
        getSum('txtPg7Sc10I8CA,txtPg7Sc10I8CB,txtPg7Sc10I8CC', 'txtPg7Sc10I8CD');
        computePg7Sc10I9();
        //alert("Saved!");
    }

    function Load_modalTablePg7Sc10I8() {
        $("#modalTablePg7Sc10I8 tr").remove();
        var i = main_modalTablePg7Sc10I8_Col1.length;
        if (main_modalTablePg7Sc10I8_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg7Sc10I8();
                document.getElementById("frm1702MX:txtPg7Sc10I8_" + (x + 1) + "Col1").value = main_modalTablePg7Sc10I8_Col1[x];
                document.getElementById("frm1702MX:txtPg7Sc10I8_" + (x + 1) + "Col2").value = main_modalTablePg7Sc10I8_Col2[x];
                document.getElementById("frm1702MX:txtPg7Sc10I8_" + (x + 1) + "Col3").value = main_modalTablePg7Sc10I8_Col3[x];
                document.getElementById("frm1702MX:txtPg7Sc10I8_" + (x + 1) + "Col4").value = main_modalTablePg7Sc10I8_Col4[x];
            }
        }

        summationmodalTablePg7Sc10I8();
    }

    function AddRow_modalTablePg7Sc10I8() {
        var i = document.getElementById("modalTablePg7Sc10I8").rows.length;
        var table = document.getElementById("modalTablePg7Sc10I8");

        var disabledAttribute2 = (!!isValidated) ? "disabled=\"disabled\"" : "";

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);

        cell1.className = "tblFormTd";
        cell2.className = "tblFormTd"; cell2.style.width = "15%"; cell2.style.textAlign = "center";
        cell3.className = "tblFormTd"; cell3.style.width = "15%"; cell3.style.textAlign = "center";
        cell4.className = "tblFormTd"; cell4.style.width = "15%"; cell4.style.textAlign = "center";
        cell5.className = "tblFormTd"; cell5.style.width = "15%"; cell5.style.textAlign = "center";
        cell6.className = "tblFormTd"; cell6.style.width = "10%"; cell6.style.textAlign = "center";

        cell1.innerHTML = '<span style="font-weight: bold; font-size: small;">&nbsp;8.' + (i + 1) + '</span> <input type="text" size="25" maxlength="18" ' + disabledAttribute2 + ' id="frm1702MX:txtPg7Sc10I8_' + (i + 1) + 'Col1" name="frm1702MX:txtPg7Sc10I8_Col1[]" onkeypress="return Name(this);" onblur="capitalize(this);" />';
        cell2.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc10I8_' + (i + 1) + 'Col2" name="frm1702MX:txtPg7Sc10I8_Col2[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg7Sc10I8(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)"  maxlength="12" />';
        cell3.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc10I8_' + (i + 1) + 'Col3" name="frm1702MX:txtPg7Sc10I8_Col3[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg7Sc10I8(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)"  maxlength="12" />';
        cell4.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc10I8_' + (i + 1) + 'Col4" name="frm1702MX:txtPg7Sc10I8_Col4[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' onchange="setToZeroIfEmpty(this)" onblur="summationmodalTablePg7Sc10I8(); addCommas1702MX(this);" onkeypress="return wholenumber(this, event)"  maxlength="12" />';
        cell5.innerHTML = '<input type="text" id="frm1702MX:txtPg7Sc10I8_' + (i + 1) + 'Col5" name="frm1702MX:txtPg7Sc10I8_Col5[]" class="numbertext" value="0" size="14" ' + disabledAttribute2 + ' disabled="disabled" /></td>';
        cell6.innerHTML = '<input type="button" value="Remove" onclick="deleteRow(this),removeSaveTemp_modalTablePg7Sc10I8()" ' + disabledAttribute2 + ' />';

        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }
    function removeSaveTemp_modalTablePg7Sc10I8() {
        temp_Array_Col1 = new Array();
        temp_Array_Col2 = new Array();
        temp_Array_Col3 = new Array();
        temp_Array_Col4 = new Array();
        var str = "";
        var numRows = document.getElementById("modalTablePg7Sc10I8").rows.length;
        var table = document.getElementById("modalTablePg7Sc10I8");

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            //  if ($.trim(str) != "") {
            temp_Array_Col1.push(table.rows[x].cells[0].children[1].value);
            temp_Array_Col2.push(table.rows[x].cells[1].children[0].value);
            temp_Array_Col3.push(table.rows[x].cells[2].children[0].value);
            temp_Array_Col4.push(table.rows[x].cells[3].children[0].value);
            //  }
        }

        $("#modalTablePg7Sc10I8 tr").remove();
        var i = temp_Array_Col1.length;
        if (temp_Array_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg7Sc10I8();
                document.getElementById("frm1702MX:txtPg7Sc10I8_" + (x + 1) + "Col1").value = temp_Array_Col1[x];
                document.getElementById("frm1702MX:txtPg7Sc10I8_" + (x + 1) + "Col2").value = temp_Array_Col2[x];
                document.getElementById("frm1702MX:txtPg7Sc10I8_" + (x + 1) + "Col3").value = temp_Array_Col3[x];
                document.getElementById("frm1702MX:txtPg7Sc10I8_" + (x + 1) + "Col4").value = temp_Array_Col4[x];
            }
        }
        summationmodalTablePg7Sc10I8();

        alert("Removed!");
    }
    function Cancel_modalTablePg7Sc10I8() {
        Load_modalTablePg7Sc10I8();
        alert("Canceled!");
    }
    function summationmodalTablePg7Sc10I8() {
        var totalA = 0;
        var totalB = 0;
        var totalC = 0;
        var totalD = 0;
        var totalperRow = 0;
        numRows = document.getElementById("modalTablePg7Sc10I8").rows.length;
        table = document.getElementById("modalTablePg7Sc10I8");

        for (x = 0; x < numRows; x++) {

            totalA += NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value));
            totalB += NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value));
            totalC += NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));
            totalperRow = NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value))
                            + NumWithComma(NumWithParenthesis(table.rows[x].cells[3].children[0].value));
            table.rows[x].cells[4].children[0].value = NegativeValue(formatCurrencyWOC(totalperRow));

        }
        totalD = totalA + totalB + totalC;
        document.getElementById("frm1702MX:txtPg7Sc10I8_SubTotalCA").value = NegativeValue(formatCurrencyWOC(totalA));
        document.getElementById("frm1702MX:txtPg7Sc10I8_SubTotalCB").value = NegativeValue(formatCurrencyWOC(totalB));
        document.getElementById("frm1702MX:txtPg7Sc10I8_SubTotalCC").value = NegativeValue(formatCurrencyWOC(totalC));
        document.getElementById("frm1702MX:txtPg7Sc10I8_SubTotalCD").value = NegativeValue(formatCurrencyWOC(totalD));
    }
    var main_modalTablePg3MScF_Col1 = {};
    //var main_modalTablePg3MScF_Col2 = new Array();
    var main_modalTablePg3MScF_Col2 = {};

    function checkNullRow_OnClick_modalTablePg3MScF(attachNum) {
        params = "txtPg3" + attachNum + "ScFI3other,txtPg3" + attachNum + "ScFI3C1";
        buttonModalID = "btnModalPg3" + attachNum + "ScF";

        if ((typeof (main_modalTablePg3MScF_Col1[attachNum]) && typeof (main_modalTablePg3MScF_Col2[attachNum])) === "undefined") {
            main_modalTablePg3MScF_Col1[attachNum] = [];
            main_modalTablePg3MScF_Col2[attachNum] = [];
        }

        var str = "";
        var str2 = 0;
        var array = params.split(",");
        if (main_modalTablePg3MScF_Col1[attachNum].length > 1) {
            openDialog2("modalDivPg3" + attachNum + "ScF");
            Load_modalTablePg3MScF(attachNum);
        }
        else if (main_modalTablePg3MScF_Col1[attachNum].length <= 1) {
            str = document.getElementById("frm1702MX:" + array[0]).value;
            str2 = document.getElementById("frm1702MX:" + array[1]).value;
            if ($.trim(str) != "" && str2 != 0) {
                document.getElementById("frm1702MX:" + buttonModalID).disabled = false;
                //disableField(params);

                //main_modalTablePg3MScF_Col1[0] = document.getElementById("frm1702MX:" + array[0]).value;
                main_modalTablePg3MScF_Col1[attachNum][0] = document.getElementById("frm1702MX:" + array[0]).value;
                //alert(main_modalTablePg3MScF_Col1[0]);

                //main_modalTablePg3MScF_Col2[0] = document.getElementById("frm1702MX:" + array[1]).value;
                main_modalTablePg3MScF_Col2[attachNum][0] = document.getElementById("frm1702MX:" + array[1]).value;
                //alert(main_modalTablePg3MScF_Col2[0]);

                //setValuesTo(array[0], "SubTotal");
                //setValuesTo(array[0], "OTHERS");
                openDialog2("modalDivPg3" + attachNum + "ScF");
                Load_modalTablePg3MScF(attachNum);
                //Save_modalTablePg3MScF(attachNum);
            }
            else if ($.trim(str) == "") {
                document.getElementById("frm1702MX:" + buttonModalID).disabled = true;
                //alert("User must fill item 3 to add modal");
            }
        }
    }

    function Save_modalTablePg3MScF(attachNum) {
        var str = "";
        var count = 0;
        numRows = document.getElementById("modalTablePg3" + attachNum + "ScF").rows.length;
        table = document.getElementById("modalTablePg3" + attachNum + "ScF");

        //main_modalTablePg3MScF_Col1 = new Array();
        main_modalTablePg3MScF_Col1[attachNum] = [];
        //main_modalTablePg3MScF_Col2 = new Array();
        main_modalTablePg3MScF_Col2[attachNum] = [];

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                main_modalTablePg3MScF_Col1[attachNum].push(table.rows[x].cells[0].children[1].value);
                main_modalTablePg3MScF_Col2[attachNum].push(table.rows[x].cells[1].children[0].value);
                count += 1;
            }
        }

        if (count == 0) {
            enableField("txtPg3" + attachNum + "ScFI3other,txtPg3" + attachNum + "ScFI3C1");
            disableField("btnModalPg3" + attachNum + "ScF");
            setValuesTo("txtPg3" + attachNum + "ScFI3other", "");
            setValuesTo("txtPg3" + attachNum + "ScFI3C1", "0");
        }
        else if (count == 1) {
            enableField("txtPg3" + attachNum + "ScFI3other,txtPg3" + attachNum + "ScFI3C1");
            //disableField('btnModalPg5Sc4I3');

            setValuesTo("txtPg3" + attachNum + "ScFI3other", table.rows[0].cells[0].children[1].value);
            setValuesTo("txtPg3" + attachNum + "ScFI3C1", table.rows[0].cells[1].children[0].value);
            main_modalTablePg3MScF_Col1[attachNum] = new Array();
            main_modalTablePg3MScF_Col2[attachNum] = new Array();


        }
        else {
            Load_modalTablePg3MScF(attachNum);
            document.getElementById("frm1702MX:txtPg3" + attachNum + "ScFI3other").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg3" + attachNum + "ScFI3C1").value = document.getElementById("frm1702MX:txtPg3" + attachNum + "ScF_SubTotal").value;
            disableField("txtPg3" + attachNum + "ScFI3other,txtPg3" + attachNum + "ScFI3C1");

        }
        $_Id("frm1702MX:txt" + attachNum + "CtrPg3MScFI3").value = count;
        computePg3AttachScFI4(attachNum);
        //alert("Saved!");
    }

    function Load_modalTablePg3MScF(attachNum) {
        $("#modalTablePg3" + attachNum + "ScF tr").remove();
        var i = main_modalTablePg3MScF_Col1[attachNum].length;
        if (main_modalTablePg3MScF_Col1[attachNum].length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg3MScF(attachNum);
                //document.getElementById("frm1702MX:txtPg3" + attachNum + "ScF_" + (x + 1) + "Col1").value = main_modalTablePg3MScF_Col1[x];
                document.getElementById("frm1702MX:txtPg3" + attachNum + "ScF_" + (x + 1) + "Col1").value = main_modalTablePg3MScF_Col1[attachNum][x];
                //document.getElementById("frm1702MX:txtPg3" + attachNum + "ScF_" + (x + 1) + "Col2").value = main_modalTablePg3MScF_Col2[x];
                document.getElementById("frm1702MX:txtPg3" + attachNum + "ScF_" + (x + 1) + "Col2").value = main_modalTablePg3MScF_Col2[attachNum][x];
            }
        }

        summationmodalTablePg3MScF(attachNum);
    }

    function AddRow_modalTablePg3MScF(attachNum) {
        var i = document.getElementById("modalTablePg3" + attachNum + "ScF").rows.length;
        var table = document.getElementById("modalTablePg3" + attachNum + "ScF");

        var disabledAttribute2 = (!!isValidated) ? "disabled=\"disabled\"" : "";

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.className = "tblFormTd";
        cell2.className = "tblFormTd"; cell2.style.width = "30%"; cell2.style.textAlign = "center";
        cell3.className = "tblFormTd"; cell3.style.width = "10%"; cell3.style.textAlign = "center";

        cell1.innerHTML = "<span style='font-weight: bold; font-size: small;'>&nbsp;3." + (i + 1) + "</span> <input type='text' size='40' " + disabledAttribute2 + " id='frm1702MX:txtPg3" + attachNum + "ScF_" + (i + 1) + "Col1' name='frm1702MX:txtPg3" + attachNum + "ScF_Col1[]' onblur='capitalize(this);' />";
        cell2.innerHTML = "<input type='text' id='frm1702MX:txtPg3" + attachNum + "ScF_" + (i + 1) + "Col2' name='frm1702MX:txtPg3" + attachNum + "ScF_Col2[]' class='numbertext' value='0' size='20' " + disabledAttribute2 + " onblur=\"summationmodalTablePg3MScF('" + attachNum + "'); addCommas1702MX(this);\" onchange='setToZeroIfEmpty(this);' onkeypress='return wholenumber(this, event)' maxlength='12' />";
        cell3.innerHTML = "<input type='button' value='Remove' onclick=\"deleteRow(this),removeSaveTemp_modalTablePg3MScF('" + attachNum + "')\" " + disabledAttribute2 + " />";

        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }

    function removeSaveTemp_modalTablePg3MScF(attachNum) {
        temp_Array_Col1 = new Array();
        temp_Array_Col2 = new Array();
        var str = "";
        var numRows = document.getElementById("modalTablePg3" + attachNum + "ScF").rows.length;
        var table = document.getElementById("modalTablePg3" + attachNum + "ScF");

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            // if ($.trim(str) != "") {
            temp_Array_Col1.push(table.rows[x].cells[0].children[1].value);
            temp_Array_Col2.push(table.rows[x].cells[1].children[0].value);
            //  }
        }

        $("#modalTablePg3" + attachNum + "ScF tr").remove();
        var i = temp_Array_Col1.length;
        if (temp_Array_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg3MScF(attachNum);
                document.getElementById("frm1702MX:txtPg3" + attachNum + "ScF_" + (x + 1) + "Col1").value = temp_Array_Col1[x];
                document.getElementById("frm1702MX:txtPg3" + attachNum + "ScF_" + (x + 1) + "Col2").value = temp_Array_Col2[x];

            }
        }
        summationmodalTablePg3MScF(attachNum);

        alert("Removed!");
    }

    function Cancel_modalTablePg3MScF(attachNum) {
        //closeDialog2("modalDivPg3" + attachNum + "ScF");
        Load_modalTablePg3MScF(attachNum);
        alert("Canceled!");
    }
    function summationmodalTablePg3MScF(attachNum) {
        var total = 0;

        numRows = document.getElementById("modalTablePg3" + attachNum + "ScF").rows.length;
        table = document.getElementById("modalTablePg3" + attachNum + "ScF");

        for (x = 0; x < numRows; x++) {
            total += NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value));
        }
        document.getElementById("frm1702MX:txtPg3" + attachNum + "ScF_SubTotal").value = NegativeValue(formatCurrencyWOC(total));
    }
    var main_modalTablePg3MScGI4_Col1 = {};
    var main_modalTablePg3MScGI4_Col2 = {};
    function checkNullRow_OnClick_modalTablePg3MScGI4(attachNum) {
        params = "txtPg3" + attachNum + "ScGI4other,txtPg3" + attachNum + "ScGI4C1";
        buttonModalID = "btnModalPg3" + attachNum + "ScGI4";

        if ((typeof (main_modalTablePg3MScGI4_Col1[attachNum]) && typeof (main_modalTablePg3MScGI4_Col2[attachNum])) === "undefined") {
            main_modalTablePg3MScGI4_Col1[attachNum] = [];
            main_modalTablePg3MScGI4_Col2[attachNum] = [];
        }

        var str = "";
        var str2 = 0;
        var array = params.split(",");
        if (main_modalTablePg3MScGI4_Col1[attachNum].length > 1) {
            openDialog2("modalDivPg3" + attachNum + "ScGI4");
            Load_modalTablePg3MScGI4(attachNum);
        }
        else if (main_modalTablePg3MScGI4_Col1[attachNum].length <= 1) {
            str = document.getElementById("frm1702MX:" + array[0]).value;
            str2 = document.getElementById("frm1702MX:" + array[1]).value;
            if ($.trim(str) != "" && str2 != 0) {
                document.getElementById("frm1702MX:" + buttonModalID).disabled = false;
                //disableField(params);

                main_modalTablePg3MScGI4_Col1[attachNum][0] = document.getElementById("frm1702MX:" + array[0]).value;
                //alert(main_modalTablePg3MScGI4_Col1[attachNum][0]);

                main_modalTablePg3MScGI4_Col2[attachNum][0] = document.getElementById("frm1702MX:" + array[1]).value;
                //alert(main_modalTablePg3MScGI4_Col2[attachNum][0]);

                //setValuesTo(array[0], "SubTotal");
                //setValuesTo(array[0], "OTHERS");
                openDialog2("modalDivPg3" + attachNum + "ScGI4");
                Load_modalTablePg3MScGI4(attachNum);
                //Save_modalTablePg3MScGI4(attachNum);
            }
            else if ($.trim(str) == "") {
                document.getElementById("frm1702MX:" + buttonModalID).disabled = true;
                //alert("User must fill item 4 to add modal");
            }
        }
    }

    function Save_modalTablePg3MScGI4(attachNum) {
        var str = "";
        var count = 0;
        numRows = document.getElementById("modalTablePg3" + attachNum + "ScGI4").rows.length;
        table = document.getElementById("modalTablePg3" + attachNum + "ScGI4");

        //main_modalTablePg3MScGI4_Col1[attachNum] = new Array();
        main_modalTablePg3MScGI4_Col1[attachNum] = [];
        //main_modalTablePg3MScGI4_Col2[attachNum] = new Array();
        main_modalTablePg3MScGI4_Col2[attachNum] = [];

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                main_modalTablePg3MScGI4_Col1[attachNum].push(table.rows[x].cells[0].children[1].value);
                main_modalTablePg3MScGI4_Col2[attachNum].push(table.rows[x].cells[1].children[0].value);
                count += 1;
            }
        }

        if (count == 0) {
            enableField("txtPg3" + attachNum + "ScGI4other,txtPg3" + attachNum + "ScGI4C1");
            disableField("btnModalPg3" + attachNum + "ScGI4");
            setValuesTo("txtPg3" + attachNum + "ScGI4other", "");
            setValuesTo("txtPg3" + attachNum + "ScGI4C1", "0");
        }
        else if (count == 1) {
            enableField("txtPg3" + attachNum + "ScGI4other,txtPg3" + attachNum + "ScGI4C1");
            //disableField('btnModalPg5Sc4I3');

            setValuesTo("txtPg3" + attachNum + "ScGI4other", table.rows[0].cells[0].children[1].value);
            setValuesTo("txtPg3" + attachNum + "ScGI4C1", table.rows[0].cells[1].children[0].value);
            main_modalTablePg3MScGI4_Col1[attachNum] = new Array();
            main_modalTablePg3MScGI4_Col2[attachNum] = new Array();


        }
        else {
            Load_modalTablePg3MScGI4(attachNum);
            document.getElementById("frm1702MX:txtPg3" + attachNum + "ScGI4other").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg3" + attachNum + "ScGI4C1").value = document.getElementById("frm1702MX:txtPg3" + attachNum + "ScGI4_SubTotal").value;
            disableField("txtPg3" + attachNum + "ScGI4other,txtPg3" + attachNum + "ScGI4C1");

        }
        $_Id("frm1702MX:txt" + attachNum + "CtrPg3MScGI4").value = count;
        computePg4AttachScGI40(attachNum);
        //alert("Saved!");
    }

    function Load_modalTablePg3MScGI4(attachNum) {
        $("#modalTablePg3" + attachNum + "ScGI4 tr").remove();
        var i = main_modalTablePg3MScGI4_Col1[attachNum].length;
        if (main_modalTablePg3MScGI4_Col1[attachNum].length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg3MScGI4(attachNum);
                document.getElementById("frm1702MX:txtPg3" + attachNum + "ScGI4_" + (x + 1) + "Col1").value = main_modalTablePg3MScGI4_Col1[attachNum][x];
                document.getElementById("frm1702MX:txtPg3" + attachNum + "ScGI4_" + (x + 1) + "Col2").value = main_modalTablePg3MScGI4_Col2[attachNum][x];
            }
        }
        summationmodalTablePg3MScGI4(attachNum);
    }

    function AddRow_modalTablePg3MScGI4(attachNum) {
        var i = document.getElementById("modalTablePg3" + attachNum + "ScGI4").rows.length;
        var table = document.getElementById("modalTablePg3" + attachNum + "ScGI4");

        var disabledAttribute2 = (!!isValidated) ? "disabled=\"disabled\"" : "";

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.className = "tblFormTd";
        cell2.className = "tblFormTd"; cell2.style.width = "30%"; cell2.style.textAlign = "center";
        cell3.className = "tblFormTd"; cell3.style.width = "10%"; cell3.style.textAlign = "center";

        cell1.innerHTML = "<span style='font-weight: bold; font-size: small;'>&nbsp;4." + (i + 1) + "</span> <input type='text' size='40' " + disabledAttribute2 + " id='frm1702MX:txtPg3" + attachNum + "ScGI4_" + (i + 1) + "Col1' name='frm1702MX:txtPg3" + attachNum + "ScGI4_Col1[]' onblur='capitalize(this);' />";
        cell2.innerHTML = "<input type='text' id='frm1702MX:txtPg3" + attachNum + "ScGI4_" + (i + 1) + "Col2' name='frm1702MX:txtPg3" + attachNum + "ScGI4_Col2[]' class='numbertext' value='0' size='20' " + disabledAttribute2 + " onblur=\"summationmodalTablePg3MScGI4('" + attachNum + "'); addCommas1702MX(this);\" onchange='setToZeroIfEmpty(this);' onkeypress='return wholenumber(this, event)'  maxlength='12' />";
        cell3.innerHTML = "<input type='button' value='Remove' onclick=\"deleteRow(this),removeSaveTemp_modalTablePg3MScGI4('" + attachNum + "');\" " + disabledAttribute2 + " />";

        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }

    function removeSaveTemp_modalTablePg3MScGI4(attachNum) {
        temp_Array_Col1 = new Array();
        temp_Array_Col2 = new Array();
        var str = "";
        var numRows = document.getElementById("modalTablePg3" + attachNum + "ScGI4").rows.length;
        var table = document.getElementById("modalTablePg3" + attachNum + "ScGI4");

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            //  if ($.trim(str) != "") {
            temp_Array_Col1.push(table.rows[x].cells[0].children[1].value);
            temp_Array_Col2.push(table.rows[x].cells[1].children[0].value);
            // }
        }

        $("#modalTablePg3" + attachNum + "ScGI4 tr").remove();
        var i = temp_Array_Col1.length;
        if (temp_Array_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg3MScGI4(attachNum);
                document.getElementById("frm1702MX:txtPg3" + attachNum + "ScGI4_" + (x + 1) + "Col1").value = temp_Array_Col1[x];
                document.getElementById("frm1702MX:txtPg3" + attachNum + "ScGI4_" + (x + 1) + "Col2").value = temp_Array_Col2[x];
            }
        }
        summationmodalTablePg3MScGI4(attachNum);

        alert("Removed!");
    }

    function Cancel_modalTablePg3MScGI4(attachNum) {
        //closeDialog2("modalDivPg3" + attachNum + "ScGI4");
        Load_modalTablePg3MScGI4(attachNum);
        alert("Canceled!");
    }
    function summationmodalTablePg3MScGI4(attachNum) {
        var total = 0;

        numRows = document.getElementById("modalTablePg3" + attachNum + "ScGI4").rows.length;
        table = document.getElementById("modalTablePg3" + attachNum + "ScGI4");

        for (x = 0; x < numRows; x++) {
            total += NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value));
        }
        document.getElementById("frm1702MX:txtPg3" + attachNum + "ScGI4_SubTotal").value = NegativeValue(formatCurrencyWOC(total));
    }
    var main_modalTablePg4MScGI39_Col1 = {};
    //var main_modalTablePg4MScGI39_Col2 = new Array();
    var main_modalTablePg4MScGI39_Col2 = {};

    function checkNullRow_OnClick_modalTablePg4MScGI39(attachNum) {
        params = 'txtPg4' + attachNum + 'ScGI39other,txtPg4' + attachNum + 'ScGI39C1';
        buttonModalID = 'btnModalPg4' + attachNum + 'ScGI39';

        if ((typeof (main_modalTablePg4MScGI39_Col1[attachNum]) && typeof (main_modalTablePg4MScGI39_Col2[attachNum])) === "undefined") {
            main_modalTablePg4MScGI39_Col1[attachNum] = [];
            main_modalTablePg4MScGI39_Col2[attachNum] = [];
        }

        var str = "";
        var str2 = 0;
        var array = params.split(',');
        if (main_modalTablePg4MScGI39_Col1[attachNum].length > 1) {
            openDialog2('modalDivPg4' + attachNum + 'ScGI39');
            Load_modalTablePg4MScGI39(attachNum);
        }
        else if (main_modalTablePg4MScGI39_Col1[attachNum].length <= 1) {
            str = document.getElementById('frm1702MX:' + array[0]).value;
            str2 = document.getElementById('frm1702MX:' + array[1]).value;
            if ($.trim(str) != "" && str2 != 0) {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = false;
                //disableField(params);

                main_modalTablePg4MScGI39_Col1[attachNum][0] = document.getElementById('frm1702MX:' + array[0]).value;
                //alert(main_modalTablePg4MScGI39_Col1[attachNum][0]);

                main_modalTablePg4MScGI39_Col2[attachNum][0] = document.getElementById('frm1702MX:' + array[1]).value;
                //alert(main_modalTablePg4MScGI39_Col2[attachNum][0]);

                //setValuesTo(array[0], 'OTHERS');
                openDialog2('modalDivPg4' + attachNum + 'ScGI39');
                Load_modalTablePg4MScGI39(attachNum);
                //Save_modalTablePg4MScGI39(attachNum);
            }
            else if ($.trim(str) == "") {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = true;
                //alert("User must fill item 3 to add modal");
            }
        }
    }

    function Save_modalTablePg4MScGI39(attachNum) {
        var str = "";
        var count = 0;
        var numRows = document.getElementById("modalTablePg4" + attachNum + "ScGI39").rows.length;
        var table = document.getElementById("modalTablePg4" + attachNum + "ScGI39");

        //main_modalTablePg4MScGI39_Col1[attachNum] = new Array();
        main_modalTablePg4MScGI39_Col1[attachNum] = [];
        //main_modalTablePg4MScGI39_Col2[attachNum] = new Array();
        main_modalTablePg4MScGI39_Col2[attachNum] = [];

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            if ($.trim(str) != "") {
                main_modalTablePg4MScGI39_Col1[attachNum].push(table.rows[x].cells[0].children[1].value);
                main_modalTablePg4MScGI39_Col2[attachNum].push(table.rows[x].cells[1].children[0].value);
                count += 1;
            }
        }

        if (count == 0) {
            enableField('txtPg4' + attachNum + 'ScGI39other,txtPg4' + attachNum + 'ScGI39C1');
            disableField('btnModalPg4' + attachNum + 'ScGI39');
            setValuesTo('txtPg4' + attachNum + 'ScGI39other', '');
            setValuesTo('txtPg4' + attachNum + 'ScGI39C1', '0');
        }
        else if (count == 1) {
            enableField('txtPg4' + attachNum + 'ScGI39other,txtPg4' + attachNum + 'ScGI39C1');
            //disableField('btnModalPg5Sc4I3');

            setValuesTo("txtPg4" + attachNum + "ScGI39other", table.rows[0].cells[0].children[1].value);
            setValuesTo("txtPg4" + attachNum + "ScGI39C1", table.rows[0].cells[1].children[0].value);
            main_modalTablePg4MScGI39_Col1[attachNum] = new Array();
            main_modalTablePg4MScGI39_Col2[attachNum] = new Array();


        }

        else {
            Load_modalTablePg4MScGI39(attachNum);
            document.getElementById("frm1702MX:txtPg4" + attachNum + "ScGI39other").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg4" + attachNum + "ScGI39C1").value = document.getElementById("frm1702MX:txtPg4" + attachNum + "ScGI39_SubTotal").value;
            disableField('txtPg4' + attachNum + 'ScGI39other,txtPg4' + attachNum + 'ScGI39C1');

        }
        $_Id("frm1702MX:txt" + attachNum + "CtrPg4MScGI39").value = count;
        computePg4AttachScGI40(attachNum);
        //alert("Saved!");
    }

    function Load_modalTablePg4MScGI39(attachNum) {
        $("#modalTablePg4" + attachNum + "ScGI39 tr").remove();
        var i = main_modalTablePg4MScGI39_Col1[attachNum].length;
        if (main_modalTablePg4MScGI39_Col1[attachNum].length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg4MScGI39(attachNum);
                document.getElementById("frm1702MX:txtPg4" + attachNum + "ScGI39_" + (x + 1) + "Col1").value = main_modalTablePg4MScGI39_Col1[attachNum][x];
                document.getElementById("frm1702MX:txtPg4" + attachNum + "ScGI39_" + (x + 1) + "Col2").value = main_modalTablePg4MScGI39_Col2[attachNum][x];
            }
        }
        summationmodalTablePg4MScGI39(attachNum);
    }

    function AddRow_modalTablePg4MScGI39(attachNum) {
        var i = document.getElementById("modalTablePg4" + attachNum + "ScGI39").rows.length;
        var table = document.getElementById("modalTablePg4" + attachNum + "ScGI39");

        var disabledAttribute2 = (!!isValidated) ? "disabled=\"disabled\"" : "";

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.className = "tblFormTd";
        cell2.className = "tblFormTd"; cell2.style.width = "30%"; cell2.style.textAlign = "center";
        cell3.className = "tblFormTd"; cell3.style.width = "10%"; cell3.style.textAlign = "center";

        cell1.innerHTML = '<span style="font-weight: bold; font-size: small;">&nbsp;39.' + (i + 1) + '</span> <input type="text" size="40" maxlength="27" ' + disabledAttribute2 + ' id="frm1702MX:txtPg4' + attachNum + 'ScGI39_' + (i + 1) + 'Col1" name="frm1702MX:txtPg4' + attachNum + 'ScGI39_Col1[]"  onkeypress="return Name(this);" onblur="capitalize(this);" />';
        cell2.innerHTML = '<input type="text" id="frm1702MX:txtPg4' + attachNum + 'ScGI39_' + (i + 1) + 'Col2" name="frm1702MX:txtPg4' + attachNum + 'ScGI39_Col2[]" class="numbertext" value="0" size="20" ' + disabledAttribute2 + ' onblur="summationmodalTablePg4MScGI39(\'' + attachNum + '\'); addCommas1702MX(this);" onchange="setToZeroIfEmpty(this);" onkeypress="return wholenumber(this, event)"  maxlength="12" />';
        cell3.innerHTML = '<input type="button" value="Remove" onclick="deleteRow(this),removeSaveTemp_modalTablePg4MScGI39(\'' + attachNum + '\')" ' + disabledAttribute2 + ' />';

        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }

    function removeSaveTemp_modalTablePg4MScGI39(attachNum) {
        temp_Array_Col1 = new Array();
        temp_Array_Col2 = new Array();
        var str = "";
        var numRows = document.getElementById("modalTablePg4" + attachNum + "ScGI39").rows.length;
        var table = document.getElementById("modalTablePg4" + attachNum + "ScGI39");

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            //  if ($.trim(str) != "") {
            temp_Array_Col1.push(table.rows[x].cells[0].children[1].value);
            temp_Array_Col2.push(table.rows[x].cells[1].children[0].value);
            // }
        }

        $("#modalTablePg4" + attachNum + "ScGI39 tr").remove();
        var i = temp_Array_Col1.length;
        if (temp_Array_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg4MScGI39(attachNum);
                document.getElementById("frm1702MX:txtPg4" + attachNum + "ScGI39_" + (x + 1) + "Col1").value = temp_Array_Col1[x];
                document.getElementById("frm1702MX:txtPg4" + attachNum + "ScGI39_" + (x + 1) + "Col2").value = temp_Array_Col2[x];
            }
        }
        summationmodalTablePg4MScGI39(attachNum);

        alert("Removed!");
    }

    function Cancel_modalTablePg4MScGI39(attachNum) {
        //closeDialog2('modalDivPg4' + attachNum + 'ScGI39');
        Load_modalTablePg4MScGI39(attachNum);
        alert("Canceled!");
    }
    function summationmodalTablePg4MScGI39(attachNum) {
        var total = 0;

        numRows = document.getElementById("modalTablePg4" + attachNum + "ScGI39").rows.length;
        table = document.getElementById("modalTablePg4" + attachNum + "ScGI39");

        for (x = 0; x < numRows; x++) {
            total += NumWithComma(NumWithParenthesis(table.rows[x].cells[1].children[0].value));
        }
        document.getElementById("frm1702MX:txtPg4" + attachNum + "ScGI39_SubTotal").value = NegativeValue(formatCurrencyWOC(total));
    }
    var main_modalTablePg4MScHI4_Col1 = {};
    //var main_modalTablePg4MScHI4_Col2 = new Array();
    var main_modalTablePg4MScHI4_Col2 = {};
    //var main_modalTablePg4MScHI4_Col3 = new Array();
    var main_modalTablePg4MScHI4_Col3 = {};

    function checkNullRow_OnClick_modalTablePg4MScHI4(attachNum) {
        params = 'txtPg4' + attachNum + 'ScHI4C1,txtPg4' + attachNum + 'ScHI4C2,txtPg4' + attachNum + 'ScHI4C3';
        buttonModalID = 'btnModalPg4' + attachNum + 'ScHI4';

        if ((typeof (main_modalTablePg4MScHI4_Col1[attachNum]) && typeof (main_modalTablePg4MScHI4_Col2[attachNum]) && typeof (main_modalTablePg4MScHI4_Col3[attachNum])) === "undefined") {
            main_modalTablePg4MScHI4_Col1[attachNum] = [];
            main_modalTablePg4MScHI4_Col2[attachNum] = [];
            main_modalTablePg4MScHI4_Col3[attachNum] = [];
        }

        var str1 = "";
        var str2 = "";
        var str3 = 0;
        var array = params.split(',');
        if (main_modalTablePg4MScHI4_Col1[attachNum].length > 1) {
            openDialog2('modalDivPg4' + attachNum + 'ScHI4');
            Load_modalTablePg4MScHI4(attachNum);
        }
        else if (main_modalTablePg4MScHI4_Col1[attachNum].length <= 1) {
            str1 = document.getElementById('frm1702MX:' + array[0]).value;
            str2 = document.getElementById('frm1702MX:' + array[1]).value;
            str3 = document.getElementById('frm1702MX:' + array[2]).value;
            if ($.trim(str1) != "" && $.trim(str2) != "" && str3 != 0) {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = false;
                //disableField(params);

                main_modalTablePg4MScHI4_Col1[attachNum][0] = document.getElementById('frm1702MX:' + array[0]).value;
                //alert(main_modalTablePg4MScHI4_Col1[attachNum][0]);

                main_modalTablePg4MScHI4_Col2[attachNum][0] = document.getElementById('frm1702MX:' + array[1]).value;
                //alert(main_modalTablePg4MScHI4_Col2[attachNum][0]);

                main_modalTablePg4MScHI4_Col3[attachNum][0] = document.getElementById('frm1702MX:' + array[2]).value;
                //alert(main_modalTablePg4MScHI4_Col3[attachNum][0]);

                //setValuesTo(array[0], 'OTHERS');
                //setValuesTo(array[1], 'OTHERS');
                openDialog2('modalDivPg4' + attachNum + 'ScHI4');
                Load_modalTablePg4MScHI4(attachNum);
                //Save_modalTablePg4MScHI4(attachNum);
            }
            else if ($.trim(str1) == "" || $.trim(str2) == "") {
                document.getElementById('frm1702MX:' + buttonModalID).disabled = true;
                //alert("User must fill item 3 to add modal");
            }
        }
    }

    function Save_modalTablePg4MScHI4(attachNum) {
        var str = "";
        var count = 0;
        var numRows = document.getElementById("modalTablePg4" + attachNum + "ScHI4").rows.length;
        var table = document.getElementById("modalTablePg4" + attachNum + "ScHI4");

        //main_modalTablePg4MScHI4_Col1[attachNum] = new Array();
        main_modalTablePg4MScHI4_Col1[attachNum] = [];
        //main_modalTablePg4MScHI4_Col2[attachNum] = new Array();
        main_modalTablePg4MScHI4_Col2[attachNum] = [];
        //main_modalTablePg4MScHI4_Col3[attachNum] = new Array();
        main_modalTablePg4MScHI4_Col3[attachNum] = [];

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            //if ($.trim(str) != "") {
            main_modalTablePg4MScHI4_Col1[attachNum].push(table.rows[x].cells[0].children[1].value);
            main_modalTablePg4MScHI4_Col2[attachNum].push(table.rows[x].cells[1].children[0].value);
            main_modalTablePg4MScHI4_Col3[attachNum].push(table.rows[x].cells[2].children[0].value);
            count += 1;
            // }
        }

        if (count == 0) {
            enableField('txtPg4' + attachNum + 'ScHI4C1,txtPg4' + attachNum + 'ScHI4C2,txtPg4' + attachNum + 'ScHI4C3');
            disableField('btnModalPg4' + attachNum + 'ScHI4');
            setValuesTo('txtPg4' + attachNum + 'ScHI4C1', '');
            setValuesTo('txtPg4' + attachNum + 'ScHI4C2', '');
            setValuesTo('txtPg4' + attachNum + 'ScHI4C3', '0');
        }
        else if (count == 1) {
            enableField('txtPg4' + attachNum + 'ScHI4C1,txtPg4' + attachNum + 'ScHI4C2,txtPg4' + attachNum + 'ScHI4C3');
            //disableField('btnModalPg5Sc4I3');

            setValuesTo("txtPg4" + attachNum + "ScHI4C1", table.rows[0].cells[0].children[1].value);
            setValuesTo("txtPg4" + attachNum + "ScHI4C2", table.rows[0].cells[1].children[0].value);
            setValuesTo("txtPg4" + attachNum + "ScHI4C3", table.rows[0].cells[2].children[0].value);
            main_modalTablePg4MScHI4_Col1[attachNum] = new Array();
            main_modalTablePg4MScHI4_Col2[attachNum] = new Array();
            main_modalTablePg4MScHI4_Col3[attachNum] = new Array();


        }
        else {
            Load_modalTablePg4MScHI4(attachNum);
            document.getElementById("frm1702MX:txtPg4" + attachNum + "ScHI4C1").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg4" + attachNum + "ScHI4C2").value = 'OTHERS';
            document.getElementById("frm1702MX:txtPg4" + attachNum + "ScHI4C3").value = document.getElementById("frm1702MX:txtPg4" + attachNum + "ScHI4_SubTotal").value;
            disableField('txtPg4' + attachNum + 'ScHI4C1,txtPg4' + attachNum + 'ScHI4C2,txtPg4' + attachNum + 'ScHI4C3');

        }
        $_Id("frm1702MX:txt" + attachNum + "CtrPg4MScHI4").value = count;
        computePg4AttachScHI5(attachNum);
        //alert("Saved!");
    }

    function Load_modalTablePg4MScHI4(attachNum) {
        $("#modalTablePg4" + attachNum + "ScHI4 tr").remove();
        var i = main_modalTablePg4MScHI4_Col1[attachNum].length;
        if (main_modalTablePg4MScHI4_Col1[attachNum].length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg4MScHI4(attachNum);
                document.getElementById("frm1702MX:txtPg4" + attachNum + "ScHI4_" + (x + 1) + "Col1").value = main_modalTablePg4MScHI4_Col1[attachNum][x];
                document.getElementById("frm1702MX:txtPg4" + attachNum + "ScHI4_" + (x + 1) + "Col2").value = main_modalTablePg4MScHI4_Col2[attachNum][x];
                document.getElementById("frm1702MX:txtPg4" + attachNum + "ScHI4_" + (x + 1) + "Col3").value = main_modalTablePg4MScHI4_Col3[attachNum][x];
            }
        }

        summationmodalTablePg4MScHI4(attachNum);
    }

    function AddRow_modalTablePg4MScHI4(attachNum) {
        var i = document.getElementById("modalTablePg4" + attachNum + "ScHI4").rows.length;
        var table = document.getElementById("modalTablePg4" + attachNum + "ScHI4");

        var disabledAttribute2 = (!!isValidated) ? "disabled=\"disabled\"" : "";

        var row = table.insertRow(i);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);

        cell1.className = "tblFormTd";
        cell2.className = "tblFormTd"; cell2.style.width = "20%"; cell2.style.textAlign = "center";
        cell3.className = "tblFormTd"; cell3.style.width = "30%"; cell3.style.textAlign = "center";
        cell4.className = "tblFormTd"; cell4.style.width = "10%"; cell4.style.textAlign = "center";

        cell1.innerHTML = '<span style="font-weight: bold; font-size: small;">&nbsp;4.' + (i + 1) + '</span> <input type="text" size="25" maxlength="18" ' + disabledAttribute2 + ' id="frm1702MX:txtPg4' + attachNum + 'ScHI4_' + (i + 1) + 'Col1" name="frm1702MX:txtPg4' + attachNum + 'ScHI4_Col1[]" onkeypress="return Name(this);" onblur="capitalize(this);" />';
        cell2.innerHTML = '<input type="text" id="frm1702MX:txtPg4' + attachNum + 'ScHI4_' + (i + 1) + 'Col2" name="frm1702MX:txtPg4' + attachNum + 'ScHI4_Col2[]" maxlength="15" onkeypress="return Name(this);" ' + disabledAttribute2 + ' onblur="capitalize(this);" size="20" />';
        cell3.innerHTML = '<input type="text" id="frm1702MX:txtPg4' + attachNum + 'ScHI4_' + (i + 1) + 'Col3" name="frm1702MX:txtPg4' + attachNum + 'ScHI4_Col3[]" class="numbertext" value="0" size="20" ' + disabledAttribute2 + ' onblur="summationmodalTablePg4MScHI4(\'' + attachNum + '\'); addCommas1702MX(this);" onchange="setToZeroIfEmpty(this);" onkeypress="return wholenumber(this, event)" maxlength="12" />';
        cell4.innerHTML = '<input type="button"  value="Remove" onclick="deleteRow(this),removeSaveTemp_modalTablePg4MScHI4(\'' + attachNum + '\')" ' + disabledAttribute2 + ' />';

        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        $(".numbertext").focus(function () {
            $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });
    }

    function removeSaveTemp_modalTablePg4MScHI4(attachNum) {
        temp_Array_Col1 = new Array();
        temp_Array_Col2 = new Array();
        temp_Array_Col3 = new Array();
        var str = "";
        var numRows = document.getElementById("modalTablePg4" + attachNum + "ScHI4").rows.length;
        var table = document.getElementById("modalTablePg4" + attachNum + "ScHI4");

        for (x = 0; x < numRows; x++) {
            str = table.rows[x].cells[0].children[1].value;
            //  if ($.trim(str) != "") {
            temp_Array_Col1[x] = table.rows[x].cells[0].children[1].value;
            temp_Array_Col2[x] = table.rows[x].cells[1].children[0].value;
            temp_Array_Col3[x] = table.rows[x].cells[2].children[0].value;
            //  }
        }

        $("#modalTablePg4" + attachNum + "ScHI4 tr").remove();
        var i = temp_Array_Col1.length;
        if (temp_Array_Col1.length != 0) {
            for (x = 0; x < i; x++) {
                AddRow_modalTablePg4MScHI4(attachNum);
                document.getElementById("frm1702MX:txtPg4" + attachNum + "ScHI4_" + (x + 1) + "Col1").value = temp_Array_Col1[x];
                document.getElementById("frm1702MX:txtPg4" + attachNum + "ScHI4_" + (x + 1) + "Col2").value = temp_Array_Col2[x];
                document.getElementById("frm1702MX:txtPg4" + attachNum + "ScHI4_" + (x + 1) + "Col3").value = temp_Array_Col3[x];
            }
        }
        summationmodalTablePg4MScHI4(attachNum);

        alert("Removed!");
    }

    function Cancel_modalTablePg4MScHI4(attachNum) {
        //closeDialog2('modalDivPg4' + attachNum + 'ScHI4');
        Load_modalTablePg4MScHI4(attachNum);
        alert("Canceled!");
    }
    //Summation
    function summationmodalTablePg4MScHI4(attachNum) {
        var total = 0;

        numRows = document.getElementById("modalTablePg4" + attachNum + "ScHI4").rows.length;
        table = document.getElementById("modalTablePg4" + attachNum + "ScHI4");

        for (x = 0; x < numRows; x++) {
            total += NumWithComma(NumWithParenthesis(table.rows[x].cells[2].children[0].value));
        }

        document.getElementById("frm1702MX:txtPg4" + attachNum + "ScHI4_SubTotal").value = NegativeValue(formatCurrencyWOC(total));
    }
    $(".numbertext").focus(function () {
        $(this).val("" + NumWithComma(NumWithParenthesis($(this).val())));
    });

    $("[data-type='negative']").keypress(function () {
        var maxLength = 12;
        if ($(this).attr("name") === "balancesheet") {
            maxLength = 15;
        }
        if ($(this).val().indexOf("-") === 0) {
            $(this).attr("maxlength", (maxLength + 1));
        }
        else {
            $(this).attr("maxlength", maxLength);
        }
    });

    function $_Id(id) {
        return document.getElementById(id);
    }

    function $_Name(name) {
        return document.getElementsByName(name);
    }

    function checkItemsFromParent() {
        var regName = $_Id('frm1702MX:txtPg1Pt1I9RegisteredName');
        var regAddress = $_Id('frm1702MX:txtPg1Pt1I10RegisteredAddress');
        var rdoCodeTxt = $_Id('frm1702MX:txtPg1Pt1I7RDO');
        var rdoCodeDrp = $_Id('frm1702MX:drpPg1Pt1I7RDO');
        var contactNo = $_Id('frm1702MX:txtPg1Pt1I11ContactNumber');
        var lineBusiness = $_Id('frm1702MX:txtPg1Pt1I13MainLine');

        if (regName.value === '') {
            regName.disabled = false;
        }

        if (regAddress.value === '') {
            regAddress.disabled = false;
        }

        if (rdoCodeTxt.value === '000') {
            rdoCodeDrp.disabled = false;
        }

        if (contactNo.value === '') {
            contactNo.disabled = false;
        }

        if (lineBusiness.value === '') {
            lineBusiness.disabled = false;
        }
    }

    // =========================== Page 1 Start ===========================
    function displayShortPeriodMessage() {
        alert('Choosing ‘Yes’ means you are filing for a short-period return. You are required to change the Month field to correspond with your New return period.');

        checkFilingYear();

        $_Id('frm1702MX:ddlPg1I2Date').focus();
    }

    function computePg1Pt2I16() {
        getSum('txtPg2Pt5I37CD', 'txtPg1Pt2I16TotalIncome');
    }

    function computePg1Pt2I17() {
        getSum('txtPg2Pt5I38CD', 'txtPg1Pt2I17LessTotalTax');
    }

    function computePg1Pt2I18() {
        computePg1Pt2I16();
        computePg1Pt2I17();
        getDifference('txtPg1Pt2I16TotalIncome', 'txtPg1Pt2I17LessTotalTax', 'txtPg1Pt2I18NetTaxPayable');
        computePg1Pt2I20();
    }

    function computePg1Pt2I20() {
        getSum('txtPg1Pt2I18NetTaxPayable,txtPg1Pt2I19TotalPenalties', 'txtPg1Pt2I20TotalAmount');

        var overPayment = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg1Pt2I20TotalAmount").value));

        if (overPayment < 0) {
            $_Id("frm1702MX:rdoPg1Pt2I21Refund").disabled = false;
            $_Id("frm1702MX:rdoPg1Pt2I21IssueTCC").disabled = false;
            $_Id("frm1702MX:rdoPg1Pt2I21CarriedOver").disabled = false;
        }
        else {
            $_Id("frm1702MX:rdoPg1Pt2I21Refund").disabled = true;
            $_Id("frm1702MX:rdoPg1Pt2I21IssueTCC").disabled = true;
            $_Id("frm1702MX:rdoPg1Pt2I21CarriedOver").disabled = true;
            $_Id("frm1702MX:rdoPg1Pt2I21Refund").checked = false;
            $_Id("frm1702MX:rdoPg1Pt2I21IssueTCC").checked = false;
            $_Id("frm1702MX:rdoPg1Pt2I21CarriedOver").checked = false;
        }
    }

    function enableMCITFields() {
        var isSubjectToMCIT = $_Id("frm1702MX:chkPg1I5ATCR1").checked;

        // Page 6 Items
        $_Id("frm1702MX:txtPg6Sc8I2CA").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg6Sc8I2CB").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg6Sc8I2CC").disabled = !isSubjectToMCIT;
        getSum("txtPg6Sc8I2CA,txtPg6Sc8I2CB,txtPg6Sc8I2CC", "txtPg6Sc8I2CD");

        // Page 7 Items
        $_Id("frm1702MX:txtPg7Sc9I1").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I1CA").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I1CB").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I1CD").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I1CE").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I1CF").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I2").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I2CA").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I2CB").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I2CD").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I2CE").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I2CF").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I3").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I3CA").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I3CB").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I3CD").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I3CE").disabled = !isSubjectToMCIT;
        $_Id("frm1702MX:txtPg7Sc9I3CF").disabled = !isSubjectToMCIT;

        if (!isSubjectToMCIT) {
            // Page 6 Items
            $_Id("frm1702MX:txtPg6Sc8I2CA").value = "0";
            $_Id("frm1702MX:txtPg6Sc8I2CB").value = "0";
            $_Id("frm1702MX:txtPg6Sc8I2CC").value = "0";
            $_Id("frm1702MX:txtPg6Sc8I2CD").value = "0";

            // Page 7 Items
            $_Id("frm1702MX:txtPg7Sc9I1").value = "";
            $_Id("frm1702MX:txtPg7Sc9I1CA").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I1CB").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I1CD").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I1CC").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I1CE").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I1CF").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I2").value = "";
            $_Id("frm1702MX:txtPg7Sc9I2CA").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I2CB").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I2CC").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I2CD").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I2CE").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I2CF").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I3").value = "";
            $_Id("frm1702MX:txtPg7Sc9I3CA").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I3CB").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I3CC").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I3CD").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I3CE").value = "0";
            $_Id("frm1702MX:txtPg7Sc9I3CF").value = "0";;
        }

        computePg7Sc9I1CG();
        computePg7Sc9I2CG();
        computePg7Sc9I3CG();
        computePg7Sc9I4();
        computePg7Sc8I13()
        computePg3Sc2I1();
    }

    function enableATCList(elem) {
        var drpATC = $_Id('frm1702MX:drpPg1I5ATCR2');
        if (elem.checked === true) {
            drpATC.disabled = false;
        }
        else {
            drpATC.disabled = true;
        }

        changeSpecialTaxRate();
    }
    // ============================ Page 1 End ============================

    // =========================== Page 2 Start ===========================
    function computePg2Pt5I37() {
        getSum('txtPg3Sc1I16CB', 'txtPg2Pt5I37CB');
        getSum('txtPg3Sc1I16CC', 'txtPg2Pt5I37CC');
        getSum('txtPg3Sc1I16CD', 'txtPg2Pt5I37CD');

        computePg1Pt2I18();
        computePg2Pt5I39();
    }

    function computePg2Pt5I39() {
        getDifference('txtPg2Pt5I37CA', 'txtPg2Pt5I38CA', 'txtPg2Pt5I39CA');
        getDifference('txtPg2Pt5I37CB', 'txtPg2Pt5I38CB', 'txtPg2Pt5I39CB');
        getDifference('txtPg2Pt5I37CC', 'txtPg2Pt5I38CC', 'txtPg2Pt5I39CC');
        getSum('txtPg2Pt5I39CA,txtPg2Pt5I39CB,txtPg2Pt5I39CC', 'txtPg2Pt5I39CD');
        computePg2Pt5I44();
    }

    function computePg2Pt5I43() {
        getSum('txtPg2Pt5I40,txtPg2Pt5I41,txtPg2Pt5I42', 'txtPg2Pt5I43,txtPg1Pt2I19TotalPenalties');
        computePg2Pt5I44();
    }

    function computePg2Pt5I44() {
        var item39 = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg2Pt5I39CD").value));

        if (item39 >= 0) {
            getSum('txtPg2Pt5I39CD,txtPg2Pt5I43', 'txtPg2Pt5I44,txtPg1Pt2I20TotalAmount');
        }
        else {
            getSum('txtPg2Pt5I39CD', 'txtPg2Pt5I44,txtPg1Pt2I20TotalAmount');
        }

        computePg1Pt2I20();
    }
    // ============================ Page 2 End ============================

    // ========================= SCHEDULE 1 START =========================
    var tempVarForSc1I12 = false;

    function populatePg3Sc1I11() {
        if (totalSP === 0) {
            tempVarForSc1I12 = false;

            var specialTaxRateDDL = $_Id("frm1702MX:drpPg3Sc1I11CB");
            var specialTaxRateIPA = $_Id("frm1702MX:txtPg2Pt4I31CB").value.toUpperCase();
            var specialTaxRateLegalBasis = $_Id("frm1702MX:txtPg2Pt4I32CB").value.toUpperCase().replace(/[\. ]/g, '');
            var optionToSelect = 0;

            var IPAList = ["PEZA", "ECOZONE", "BCDA", "SBMA", "CDC", "PPMC", "JHSEZ", "MSEZ", "CEZA", "ZCSEZA", "APECO", "AFAB", "TEZ", "EPZA", "MEPZA"];
            var legalBasisList = ["RA7227", "7227", "RA9400", "9400", "RA7916", "7916", "RA8748", "8748", "RA7922", "7922", "RA7903", "7903", "RA9490", "9490", "RA10083", "10083", "RA9728", "9728", "RA9593", "9593"];

            //New if legal basis is ra10693
            var legalBasisRA10693 = ["RA10693", "10693", "R.A.10693", "RA.10693", "R.A10693", "RA 10693", "R.A. 10693", "RA. 10693", "R.A 10693"];

            // Boolean for checking if ATC is checked AND selected ATC is IC030 or IC031
            var isIC030or031 = ($_Id("frm1702MX:chkPg1I5ATCR2").checked === true) && (($_Id("frm1702MX:drpPg1I5ATCR2").value === "IC030") || ($_Id("frm1702MX:drpPg1I5ATCR2").value === "IC031"));

            // Boolean for checking if Page 2 Item 31B Special Rate is "PEZA" or "BCDA" or "ECOZONE" AND Item 34 Special tax rate is 5.0%
            var isPEZABCDAorECOZONE5 = (($.inArray(specialTaxRateIPA, IPAList) > -1) || ($.inArray(specialTaxRateLegalBasis, legalBasisList) > -1)) && (($_Id("frm1702MX:txtPg2Pt4I34SpecialTaxRate").value * 1) === 5);

            //New condition for legal basis if ra10693
            var isRA10693 = ($.inArray(specialTaxRateLegalBasis, legalBasisRA10693) > -1);

            var schedule1Item1B = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg3Sc1I1CB").value));
            var schedule1Item1C = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg3Sc1I1CC").value));
            var someValue = Math.round((schedule1Item1C / (schedule1Item1B + schedule1Item1C)) * 100);

            if ((!!isIC030or031) && (!!isPEZABCDAorECOZONE5)) {
                var item5BTimes5Percent = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg3Sc1I5CB").value)) * 0.05;
                var item10BTimes30Percent = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg3Sc1I10CB").value)) * 0.3;

                if (someValue > 50) {
                    if (item5BTimes5Percent > item10BTimes30Percent) {
                        optionToSelect = 5;
                    }
                    else {
                        optionToSelect = 30;
                    }
                }
                else {
                    optionToSelect = 5;
                }

                tempVarForSc1I12 = (optionToSelect === 5);
            }
            else if (!!isIC030or031) {
                if (someValue > 50) {
                    optionToSelect = 30;
                }
            }
            else if (!!isPEZABCDAorECOZONE5) {
                optionToSelect = 5;
                tempVarForSc1I12 = (optionToSelect === 5);
            }
            //if legal basis is ra10693
            else if (!!isRA10693) {

                $_Id("frm1702MX:txtPg2Pt4I34SpecialTaxRate").value = "2.0";

                data = "<select id='frm1702MX:drpPg3Sc1I11CB' style='width: 100%;' name='frm1702MX:drpPg3Sc1I11CB' onchange='computePg3Sc1I12();'>";
                data = data + "<option value='" + ((2 * 1) / 100) + "'>" + (2 * 1).toFixed(1) + "%</option>";
                data = data + "</select>";

                $('#atcContainer').html(data);

                for (var i = 0; i < specialTaxRateDDL.options.length; i++) {
                    if ((specialTaxRateDDL.options[i].value) === 2) {
                        specialTaxRateDDL.options[i].selected = true;
                        break;
                    }

                }
                $_Id("frm1702MX:drpPg3Sc1I11CB").disabled = true;
            }

            else {
                 specialTaxRateDDL.disabled = false;
            }

            if (optionToSelect > 0) {
                specialTaxRateDDL.disabled = false;

                if ((optionToSelect === 30) && ((specialTaxRateDDL.options[specialTaxRateDDL.selectedIndex].value * 100) !== optionToSelect)) {
                    alert("Regular is more than 50% of Special, 30% on Special Rate will be applied.");
                }
                else if ((optionToSelect === 5) && ((specialTaxRateDDL.options[specialTaxRateDDL.selectedIndex].value * 100) !== optionToSelect)) {
                    alert("Applying rule for when Page 2 Item 31B Special Rate is 'PEZA' or 'BCDA' or 'ECOZONE' and Item 34 Special Tax Rate is 5.0%.");
                }

                for (var i = 0; i < specialTaxRateDDL.options.length; i++) {
                    if ((specialTaxRateDDL.options[i].value * 100) === optionToSelect) {
                        specialTaxRateDDL.options[i].selected = true;
                        break;
                    }
                }

                specialTaxRateDDL.disabled = true;
            }

            computePg3Sc1I12();
        }
    }
    function computePg3Sc1I1() {
        // Page 1m Schedule B Item 1 name="frm1702MX:txtAttachScBI1" TOTAL
        var pg1mScBI1EX = 0;
        var pg1mScBI1SP = 0;
        // Store Page 1m Schedule B Item 1 value to 'hidden'
        var exArray = $("input[name*='EX']"); //$_Name('frm1702MX:txtAttachScBI1');
        var spArray = $("input[name*='SP']"); //$_Name('frm1702MX:txtAttachScBI1');

        // Compute for EXEMPT
        for (var i = 0; i < exArray.length; i++) {
            if (exArray[i].name.match("BI1$")) {
                pg1mScBI1EX += (isNaN(NumWithComma(NumWithParenthesis(exArray[i].value))) ? 0 : NumWithComma(NumWithParenthesis(exArray[i].value)));
            }
        }
        $_Id('frm1702MX:hidden').value = NegativeValue(formatCurrencyWOC(pg1mScBI1EX));
        getSum('txtPg4Sc3I6CA,hidden', 'txtPg3Sc1I1CA');

        // Compute for SPECIAL  RATE
        for (var i = 0; i < spArray.length; i++) {
            if (spArray[i].name.match("BI1$")) {
                pg1mScBI1SP += (isNaN(NumWithComma(NumWithParenthesis(spArray[i].value))) ? 0 : NumWithComma(NumWithParenthesis(spArray[i].value)));
            }
        }
        $_Id('frm1702MX:hidden').value = NegativeValue(formatCurrencyWOC(pg1mScBI1SP));
        getSum('txtPg4Sc3I6CB,hidden', 'txtPg3Sc1I1CB');

        getSum('txtPg4Sc3I6CC', 'txtPg3Sc1I1CC');
        getSum('txtPg3Sc1I1CA,txtPg3Sc1I1CB,txtPg3Sc1I1CC', 'txtPg3Sc1I1CD');
        computePg3Sc1I3();
        //computePg3Sc2I4();

        populatePg3Sc1I11();

        // Change value of 'hidden' back to 0
        $_Id('frm1702MX:hidden').value = 0;
    }

    function computePg3Sc1I2() {
        // Page 1m Schedule B Item 2 name="frm1702MX:txtAttachScBI2"
        var pg1mScBI2EX = 0;
        var pg1mScBI2SP = 0;
        // Store Page 1m Schedule B Item 4 value to 'hidden'
        var exArray = $("input[name*='EX']");
        var spArray = $("input[name*='SP']");

        // Compute for EXEMPT
        for (var i = 0; i < exArray.length; i++) {
            if (exArray[i].name.match("BI2$")) {
                pg1mScBI2EX += (isNaN(NumWithComma(NumWithParenthesis(exArray[i].value))) ? 0 : NumWithComma(NumWithParenthesis(exArray[i].value)));
            }
        }
        $_Id('frm1702MX:hidden').value = NegativeValue(formatCurrencyWOC(pg1mScBI2EX));
        getSum('txtPg4Sc3CI27CA,hidden', 'txtPg3Sc1I2CA');

        // Compute for SPECIAL RATE
        for (var i = 0; i < spArray.length; i++) {
            if (spArray[i].name.match("BI2$")) {
                pg1mScBI2SP += (isNaN(NumWithComma(NumWithParenthesis(spArray[i].value))) ? 0 : NumWithComma(NumWithParenthesis(spArray[i].value)));
            }
        }
        $_Id('frm1702MX:hidden').value = NegativeValue(formatCurrencyWOC(pg1mScBI2SP));
        getSum('txtPg4Sc3CI27CB,hidden', 'txtPg3Sc1I2CB');

        getSum('txtPg4Sc3CI27CC', 'txtPg3Sc1I2CC');
        getSum('txtPg3Sc1I2CA,txtPg3Sc1I2CB,txtPg3Sc1I2CC', 'txtPg3Sc1I2CD');
        computePg3Sc1I3();

        // Change value of 'hidden' back to 0
        $_Id('frm1702MX:hidden').value = 0;
    }

    function computePg3Sc1I3() {
        getDifference('txtPg3Sc1I1CA', 'txtPg3Sc1I2CA', 'txtPg3Sc1I3CA');
        getDifference('txtPg3Sc1I1CB', 'txtPg3Sc1I2CB', 'txtPg3Sc1I3CB');
        getDifference('txtPg3Sc1I1CC', 'txtPg3Sc1I2CC', 'txtPg3Sc1I3CC');
        getDifference('txtPg3Sc1I1CD', 'txtPg3Sc1I2CD', 'txtPg3Sc1I3CD');
        computePg3Sc1I5();
    }

    function computePg3Sc1I4() {
        // Page 1m Schedule B Item 4 name="frm1702MX:txtAttachScBI4"
        var pg1mScBI4EX = 0;
        var pg1mScBI4SP = 0;
        // Store Page 1m Schedule B Item 4 value to 'hidden'
        var exArray = $("input[name*='EX']");
        var spArray = $("input[name*='SP']");

        // Compute for EXEMPT
        for (var i = 0; i < exArray.length; i++) {
            if (exArray[i].name.match("BI4$")) {
                pg1mScBI4EX += (isNaN(NumWithComma(NumWithParenthesis(exArray[i].value))) ? 0 : NumWithComma(NumWithParenthesis(exArray[i].value)));
            }
        }
        $_Id('frm1702MX:hidden').value = NegativeValue(formatCurrencyWOC(pg1mScBI4EX));
        getSum('txtPg5Sc4I4CA,hidden', 'txtPg3Sc1I4CA');

        // Compute for SPECIAL RATE
        for (var i = 0; i < spArray.length; i++) {
            if (spArray[i].name.match("BI4$")) {
                pg1mScBI4SP += (isNaN(NumWithComma(NumWithParenthesis(spArray[i].value))) ? 0 : NumWithComma(NumWithParenthesis(spArray[i].value)));
            }
        }
        $_Id('frm1702MX:hidden').value = NegativeValue(formatCurrencyWOC(pg1mScBI4SP));
        getSum('txtPg5Sc4I4CB,hidden', 'txtPg3Sc1I4CB');

        getSum('txtPg5Sc4I4CC', 'txtPg3Sc1I4CC');
        getSum('txtPg3Sc1I4CA,txtPg3Sc1I4CB,txtPg3Sc1I4CC', 'txtPg3Sc1I4CD');
        computePg3Sc1I5();

        // Change value of 'hidden' back to 0
        $_Id('frm1702MX:hidden').value = 0;
    }

    function computePg3Sc1I5() {
        getSum('txtPg3Sc1I3CA,txtPg3Sc1I4CA', 'txtPg3Sc1I5CA');
        getSum('txtPg3Sc1I3CB,txtPg3Sc1I4CB', 'txtPg3Sc1I5CB');
        getSum('txtPg3Sc1I3CC,txtPg3Sc1I4CC', 'txtPg3Sc1I5CC');
        getSum('txtPg3Sc1I3CD,txtPg3Sc1I4CD', 'txtPg3Sc1I5CD');
        computePg3Sc1I10();
        computePg3Sc1I15();
    }

    function computePg3Sc1I6() {
        // Page 1m Schedule B Item 6 name="frm1702MX:txtAttachScBI6"
        var pg1mScBI6EX = 0;
        var pg1mScBI6SP = 0;
        // Store Page 1m Schedule B Item 6 value to 'hidden'
        var exArray = $("input[name*='EX']");
        var spArray = $("input[name*='SP']");

        // Compute for EXEMPT
        for (var i = 0; i < exArray.length; i++) {
            if (exArray[i].name.match("BI6$")) {
                pg1mScBI6EX += (isNaN(NumWithComma(NumWithParenthesis(exArray[i].value))) ? 0 : NumWithComma(NumWithParenthesis(exArray[i].value)));
            }
        }
        $_Id('frm1702MX:hidden').value = NegativeValue(formatCurrencyWOC(pg1mScBI6EX));
        getSum('txtPg6Sc5I40CA,hidden', 'txtPg3Sc1I6CA');

        // Compute for SPECIAL RATE
        for (var i = 0; i < spArray.length; i++) {
            if (spArray[i].name.match("BI6$")) {
                pg1mScBI6SP += (isNaN(NumWithComma(NumWithParenthesis(spArray[i].value))) ? 0 : NumWithComma(NumWithParenthesis(spArray[i].value)));
            }
        }
        $_Id('frm1702MX:hidden').value = NegativeValue(formatCurrencyWOC(pg1mScBI6SP));
        getSum('txtPg6Sc5I40CB,hidden', 'txtPg3Sc1I6CB');

        getSum('txtPg6Sc5I40CC', 'txtPg3Sc1I6CC');
        getSum('txtPg3Sc1I6CA,txtPg3Sc1I6CB,txtPg3Sc1I6CC', 'txtPg3Sc1I6CD');
        computePg3Sc1I9();

        // Change value of 'hidden' back to 0
        $_Id('frm1702MX:hidden').value = 0;
    }

    function computePg3Sc1I7() {
        // Page 1m Schedule B Item 7 name="frm1702MX:txtAttachScBI7"
        var pg1mScBI7EX = 0;
        var pg1mScBI7SP = 0;
        // Store Page 1m Schedule B Item 7 value to 'hidden'
        var exArray = $("input[name*='EX']");
        var spArray = $("input[name*='SP']");

        // Compute for EXEMPT
        for (var i = 0; i < exArray.length; i++) {
            if (exArray[i].name.match("BI7$")) {
                pg1mScBI7EX += (isNaN(NumWithComma(NumWithParenthesis(exArray[i].value))) ? 0 : NumWithComma(NumWithParenthesis(exArray[i].value)));
            }
        }
        $_Id('frm1702MX:hidden').value = NegativeValue(formatCurrencyWOC(pg1mScBI7EX));
        getSum('txtPg6Sc6I5CA,hidden', 'txtPg3Sc1I7CA');

        // Compute for SPECIAL RATE
        for (var i = 0; i < spArray.length; i++) {
            if (spArray[i].name.match("BI7$")) {
                pg1mScBI7SP += (isNaN(NumWithComma(NumWithParenthesis(spArray[i].value))) ? 0 : NumWithComma(NumWithParenthesis(spArray[i].value)));
            }
        }
        $_Id('frm1702MX:hidden').value = NegativeValue(formatCurrencyWOC(pg1mScBI7SP));
        getSum('txtPg6Sc6I5CB,hidden', 'txtPg3Sc1I7CB');

        getSum('txtPg6Sc6I5CC', 'txtPg3Sc1I7CC');
        getSum('txtPg3Sc1I7CA,txtPg3Sc1I7CB,txtPg3Sc1I7CC', 'txtPg3Sc1I7CD');
        computePg3Sc1I9();
        computePg3Sc2I2();

        // Change value of 'hidden' back to 0
        $_Id('frm1702MX:hidden').value = 0;
    }

    function computePg3Sc1I8() {
        // Page 1m Schedule B Item 8 name="frm1702MX:txtAttachScBI8"
        var pg1mScBI8EX = 0;
        var pg1mScBI8SP = 0;
        // Store Page 1m Schedule B Item 7 value to 'hidden'
        var exArray = $("input[name*='EX']");
        var spArray = $("input[name*='SP']");

        // Compute for EXEMPT
        for (var i = 0; i < exArray.length; i++) {
            if (exArray[i].name.match("BI8$")) {
                pg1mScBI8EX += (isNaN(NumWithComma(NumWithParenthesis(exArray[i].value))) ? 0 : NumWithComma(NumWithParenthesis(exArray[i].value)));
            }
        }
        $_Id('frm1702MX:hidden').value = NegativeValue(formatCurrencyWOC(pg1mScBI8EX));
        getSum('hidden', 'txtPg3Sc1I8CA');

        // Compute for SPECIAL RATE
        for (var i = 0; i < spArray.length; i++) {
            if (spArray[i].name.match("BI8$")) {
                pg1mScBI8SP += (isNaN(NumWithComma(NumWithParenthesis(spArray[i].value))) ? 0 : NumWithComma(NumWithParenthesis(spArray[i].value)));
            }
        }
        $_Id('frm1702MX:hidden').value = NegativeValue(formatCurrencyWOC(pg1mScBI8SP));
        getSum('hidden', 'txtPg3Sc1I8CB');

        getSum('txtPg6Sc7AI8', 'txtPg3Sc1I8CC');
        getSum('txtPg3Sc1I8CA,txtPg3Sc1I8CB,txtPg3Sc1I8CC', 'txtPg3Sc1I8CD');
        computePg3Sc1I9();

        // Change value of 'hidden' back to 0
        $_Id('frm1702MX:hidden').value = 0;
    }

    function computePg3Sc1I9() {
        getSum('txtPg3Sc1I6CA,txtPg3Sc1I7CA,txtPg3Sc1I8CA', 'txtPg3Sc1I9CA');
        getSum('txtPg3Sc1I6CB,txtPg3Sc1I7CB,txtPg3Sc1I8CB', 'txtPg3Sc1I9CB');
        getSum('txtPg3Sc1I6CC,txtPg3Sc1I7CC,txtPg3Sc1I8CC', 'txtPg3Sc1I9CC');
        getSum('txtPg3Sc1I6CD,txtPg3Sc1I7CD,txtPg3Sc1I8CD', 'txtPg3Sc1I9CD');
        computePg3Sc1I10();
    }

    function computePg3Sc1I10() {
        getDifference('txtPg3Sc1I5CA', 'txtPg3Sc1I9CA', 'txtPg3Sc1I10CA');
        getDifference('txtPg3Sc1I5CB', 'txtPg3Sc1I9CB', 'txtPg3Sc1I10CB');
        getDifference('txtPg3Sc1I5CC', 'txtPg3Sc1I9CC', 'txtPg3Sc1I10CC');
        getDifference('txtPg3Sc1I5CD', 'txtPg3Sc1I9CD', 'txtPg3Sc1I10CD');
        computePg3Sc1I12();
        computePg3Sc2I1()
    }

    function computePg3Sc1I12() {
        if (totalSP === 0) {
            var atcSelectedIndex = ($_Id("frm1702MX:txtATCSelectedIndex").value) * 1;

            if (atcSelectedIndex > -1) {
                $_Id("frm1702MX:drpPg3Sc1I11CB").options[atcSelectedIndex].selected = true;
                $_Id("frm1702MX:txtATCSelectedIndex").value = "-1";
            }
        }
        //else {
        //  $_Id("frm1702MX:txtATCSelectedIndex").value = $_Id("frm1702MX:drpPg3Sc1I11CB").selectedIndex;
        //}

        var pg3Sc1I10Special = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg3Sc1I10CB").value)),
            pg3Sc1I10Regular = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg3Sc1I10CC").value)),
            drpPg1I5ATCR2Value = $_Id("frm1702MX:drpPg1I5ATCR2").value,
            isIC080IC190IC191 = (drpPg1I5ATCR2Value === "IC080") || (drpPg1I5ATCR2Value === "IC190") || (drpPg1I5ATCR2Value === "IC191");

        //New for legal basis RA10693
        var specialTaxRateLegalBasis = $_Id("frm1702MX:txtPg2Pt4I32CB").value.toUpperCase().replace(/[\. ]/g, '');
        var legalBasisRA10693 = ["RA10693", "10693", "R.A.10693", "RA.10693", "R.A10693", "RA 10693", "R.A. 10693", "RA. 10693", "R.A 10693"];
        var isRA10693 = ($.inArray(specialTaxRateLegalBasis, legalBasisRA10693) > -1);

        // Special
        if (totalSP === 0) {
            if (!!tempVarForSc1I12) {
                product("txtPg3Sc1I5CB", "drpPg3Sc1I11CB", "txtPg3Sc1I12CB");
            }
            else if (!!isIC080IC190IC191) {
                product("txtPg3Sc1I1CB", "drpPg3Sc1I11CB", "txtPg3Sc1I12CB");
            }
            else if (!!isRA10693) {
                product("txtPg3Sc1I1CB", "drpPg3Sc1I11CB", "txtPg3Sc1I12CB");
            }
            else {
                if (pg3Sc1I10Special > 0) {
                    product("txtPg3Sc1I10CB", "drpPg3Sc1I11CB", "txtPg3Sc1I12CB");
                }
                else {
                    $_Id("frm1702MX:txtPg3Sc1I12CB").value = "0";
                }
            }
        }
        else {
            var pg1mScBI12SP = 0;
            var spArray = $("input[name*='SP'][name$='BI12']");

            for (var i = 0; i < spArray.length; i++) {
                //if (spArray[i].name.match("BI12$")) {
                pg1mScBI12SP += (isNaN(NumWithComma(NumWithParenthesis(spArray[i].value))) ? 0 : NumWithComma(NumWithParenthesis(spArray[i].value)));
                //}
            }

            $_Id('frm1702MX:hidden').value = NegativeValue(formatCurrencyWOC(pg1mScBI12SP));
            getSum('hidden', 'txtPg3Sc1I12CB');
        }
        // Regular
        if (pg3Sc1I10Regular > 0) {
            product('txtPg3Sc1I10CC', 'hidden30', 'txtPg3Sc1I12CC');
        }
        else {
            $_Id("frm1702MX:txtPg3Sc1I12CC").value = "0";
        }

        getSum('txtPg3Sc1I12CB,txtPg3Sc1I12CC', 'txtPg3Sc1I12CD');
        computePg3Sc1I14();
        computePg3Sc1I16();
    }

    function computePg3Sc1I13() {
        getSum('txtPg3Sc1I13CB,txtPg3Sc1I13CC', 'txtPg3Sc1I13CD');
        computePg3Sc1I14();
        computePg3Sc2I4();
    }

    function computePg3Sc1I14() {
        getDifference('txtPg3Sc1I12CB', 'txtPg3Sc1I13CB', 'txtPg3Sc1I14CB');
        getSum('txtPg3Sc1I12CC', 'txtPg3Sc1I14CC');
        getSum('txtPg3Sc1I14CB,txtPg3Sc1I14CC', 'txtPg3Sc1I14CD');
        computePg3Sc1I16();
    }

    function computePg3Sc1I15() {
        if (NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg3Sc1I5CC").value)) > 0 && $_Id("frm1702MX:chkPg1I5ATCR1").checked) {
            $_Id('frm1702MX:hidden').value = 0.02;
            product('txtPg3Sc1I5CC', 'hidden', 'txtPg3Sc1I15CC');
        }
        else {
            $_Id("frm1702MX:txtPg3Sc1I15CC").value = 0;
        }

        $_Id('frm1702MX:hidden').value = 0; // Revert to 0

        getSum('txtPg3Sc1I15CC', 'txtPg3Sc1I15CD');

        computePg3Sc1I16();
    }

    function computePg3Sc1I16() {
        $_Id('frm1702MX:txtPg3Sc1I16CB').value = $_Id('frm1702MX:txtPg3Sc1I14CB').value;

        var item12C = NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg3Sc1I12CC').value));
        var item15C = NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg3Sc1I15CC').value));

        if (item12C > item15C) {
            $_Id('frm1702MX:txtPg3Sc1I16CC').value = NegativeValue(formatCurrencyWOC(item12C));
        } else {
            $_Id('frm1702MX:txtPg3Sc1I16CC').value = NegativeValue(formatCurrencyWOC(item15C));
        }

        getSum('txtPg3Sc1I16CB,txtPg3Sc1I16CC', 'txtPg3Sc1I16CD');

        computePg2Pt5I37();
        computePg3Sc2I4();
    }
    function computePg3Sc2I1() {
        // Use hidden for computation purposes
        $_Id("frm1702MX:hidden").value = 0.02;

        var isSubjectToMCIT = $_Id("frm1702MX:chkPg1I5ATCR1").checked;

        // EXEMPT
        var exemptSc1I10 = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg3Sc1I10CA").value));
        var exemptSc1I5 = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg3Sc1I5CA").value));

        if (exemptSc1I10 >= 0) {
            product('txtPg3Sc1I10CA', 'hidden30', 'txtPg3Sc2I1CA');
        }
        else {
            $_Id("frm1702MX:txtPg3Sc2I1CA").value = 0;
        }

        // SPECIAL RATE
        var specialSc1I10 = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg3Sc1I10CB").value));
        var specialSc1I5 = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg3Sc1I5CB").value));

        if (specialSc1I10 >= 0) {
            product('txtPg3Sc1I10CB', 'hidden30', 'txtPg3Sc2I1CB');
        }
        else {
            $_Id("frm1702MX:txtPg3Sc2I1CB").value = 0;
        }

        getSum('txtPg3Sc2I1CA,txtPg3Sc2I1CB,txtPg3Sc2I1CC', 'txtPg3Sc2I1CD');
        computePg3Sc2I3();

        // Change value of hidden back to zero (0)
        $_Id("frm1702MX:hidden").value = 0;
    }

    function computePg3Sc2I2() {
        /*product('txtPg3Sc1I7CA', 'hidden30', 'txtPg3Sc2I2CA');
        product('txtPg3Sc1I7CB', 'hidden30', 'txtPg3Sc2I2CB');
        product('txtPg3Sc1I7CC', 'hidden30', 'txtPg3Sc2I2CC');*/
        product('txtPg6Sc6I5CA', 'hidden30', 'txtPg3Sc2I2CA');
        product('txtPg6Sc6I5CB', 'hidden30', 'txtPg3Sc2I2CB');
        product('txtPg6Sc6I5CC', 'hidden30', 'txtPg3Sc2I2CC');
        getSum('txtPg3Sc2I2CA,txtPg3Sc2I2CB,txtPg3Sc2I2CC', 'txtPg3Sc2I2CD');
        computePg3Sc2I3();
    }

    function computePg3Sc2I3() {
        getSum('txtPg3Sc2I1CA,txtPg3Sc2I2CA', 'txtPg3Sc2I3CA');
        getSum('txtPg3Sc2I1CB,txtPg3Sc2I2CB', 'txtPg3Sc2I3CB');
        getSum('txtPg3Sc2I1CC,txtPg3Sc2I2CC', 'txtPg3Sc2I3CC');
        getSum('txtPg3Sc2I1CD,txtPg3Sc2I2CD', 'txtPg3Sc2I3CD');
        computePg3Sc2I5();
    }

    function computePg3Sc2I4() {
        getSum('txtPg3Sc1I16CB', 'txtPg3Sc2I4CB');
        //getSum('txtPg3Sc1I16CC', 'txtPg3Sc2I4CC');
        getSum('txtPg3Sc2I4CB,txtPg3Sc2I4CC', 'txtPg3Sc2I4CD');
        computePg3Sc2I5();
    }

    function computePg3Sc2I5() {
        getDifference('txtPg3Sc2I3CA', 'txtPg3Sc2I4CA', 'txtPg3Sc2I5CA');
        getDifference('txtPg3Sc2I3CB', 'txtPg3Sc2I4CB', 'txtPg3Sc2I5CB');
        getDifference('txtPg3Sc2I3CC', 'txtPg3Sc2I4CC', 'txtPg3Sc2I5CC');
        getDifference('txtPg3Sc2I3CD', 'txtPg3Sc2I4CD', 'txtPg3Sc2I5CD');
        computePg3Sc2I7();
    }

    function computePg3Sc2I6() {
        getSum('txtPg7Sc8I10CA', 'txtPg3Sc2I6CA');
        getSum('txtPg7Sc8I10CB', 'txtPg3Sc2I6CB');
        getSum('txtPg7Sc8I10CC', 'txtPg3Sc2I6CC');
        getSum('txtPg3Sc2I6CA,txtPg3Sc2I6CB,txtPg3Sc2I6CC', 'txtPg3Sc2I6CD');
        computePg3Sc2I7();
    }

    function computePg3Sc2I7() {
        getSum('txtPg3Sc2I5CA,txtPg3Sc2I6CA', 'txtPg3Sc2I7CA');
        getSum('txtPg3Sc2I5CB,txtPg3Sc2I6CB', 'txtPg3Sc2I7CB');
        getSum('txtPg3Sc2I5CC,txtPg3Sc2I6CC', 'txtPg3Sc2I7CC');
        getSum('txtPg3Sc2I5CD,txtPg3Sc2I6CD', 'txtPg3Sc2I7CD');
    }
    function computePg4Sc3I4() {
        getSum('txtPg4Sc3I1CA,txtPg4Sc3I2CA,txtPg4Sc3I3CA', 'txtPg4Sc3I4CA');
        getSum('txtPg4Sc3I1CB,txtPg4Sc3I2CB,txtPg4Sc3I3CB', 'txtPg4Sc3I4CB');
        getSum('txtPg4Sc3I1CC,txtPg4Sc3I2CC,txtPg4Sc3I3CC', 'txtPg4Sc3I4CC');
        getSum('txtPg4Sc3I1CD,txtPg4Sc3I2CD,txtPg4Sc3I3CD', 'txtPg4Sc3I4CD');
        computePg4Sc3I6();
    }

    function computePg4Sc3I6() {
        getDifference('txtPg4Sc3I4CA', 'txtPg4Sc3I5CA', 'txtPg4Sc3I6CA');
        getDifference('txtPg4Sc3I4CB', 'txtPg4Sc3I5CB', 'txtPg4Sc3I6CB');
        getDifference('txtPg4Sc3I4CC', 'txtPg4Sc3I5CC', 'txtPg4Sc3I6CC');
        getDifference('txtPg4Sc3I4CD', 'txtPg4Sc3I5CD', 'txtPg4Sc3I6CD');
        computePg3Sc1I1();
    }

    function computePg4Sc3AI3() {
        getSum('txtPg4Sc3AI1CA,txtPg4Sc3AI2CA', 'txtPg4Sc3AI3CA');
        getSum('txtPg4Sc3AI1CB,txtPg4Sc3AI2CB', 'txtPg4Sc3AI3CB');
        getSum('txtPg4Sc3AI1CC,txtPg4Sc3AI2CC', 'txtPg4Sc3AI3CC');
        getSum('txtPg4Sc3AI1CD,txtPg4Sc3AI2CD', 'txtPg4Sc3AI3CD');
        computePg4Sc3AI5();
    }

    function computePg4Sc3AI5() {
        getDifference('txtPg4Sc3AI3CA', 'txtPg4Sc3AI4CA', 'txtPg4Sc3AI5CA');
        getDifference('txtPg4Sc3AI3CB', 'txtPg4Sc3AI4CB', 'txtPg4Sc3AI5CB');
        getDifference('txtPg4Sc3AI3CC', 'txtPg4Sc3AI4CC', 'txtPg4Sc3AI5CC');
        getDifference('txtPg4Sc3AI3CD', 'txtPg4Sc3AI4CD', 'txtPg4Sc3AI5CD');
        computePg4Sc3CI27();
    }

    function computePg4Sc3BI8() {
        getSum('txtPg4Sc3BI6CA,txtPg4Sc3BI7CA', 'txtPg4Sc3BI8CA');
        getSum('txtPg4Sc3BI6CB,txtPg4Sc3BI7CB', 'txtPg4Sc3BI8CB');
        getSum('txtPg4Sc3BI6CC,txtPg4Sc3BI7CC', 'txtPg4Sc3BI8CC');
        getSum('txtPg4Sc3BI6CD,txtPg4Sc3BI7CD', 'txtPg4Sc3BI8CD');
        computePg4Sc3BI10();
    }

    function computePg4Sc3BI10() {
        getDifference('txtPg4Sc3BI8CA', 'txtPg4Sc3BI9CA', 'txtPg4Sc3BI10CA');
        getDifference('txtPg4Sc3BI8CB', 'txtPg4Sc3BI9CB', 'txtPg4Sc3BI10CB');
        getDifference('txtPg4Sc3BI8CC', 'txtPg4Sc3BI9CC', 'txtPg4Sc3BI10CC');
        getDifference('txtPg4Sc3BI8CD', 'txtPg4Sc3BI9CD', 'txtPg4Sc3BI10CD');
        computePg4Sc3BI13();
    }

    function computePg4Sc3BI13() {
        getSum('txtPg4Sc3BI10CA,txtPg4Sc3BI11CA,txtPg4Sc3BI12CA', 'txtPg4Sc3BI13CA');
        getSum('txtPg4Sc3BI10CB,txtPg4Sc3BI11CB,txtPg4Sc3BI12CB', 'txtPg4Sc3BI13CB');
        getSum('txtPg4Sc3BI10CC,txtPg4Sc3BI11CC,txtPg4Sc3BI12CC', 'txtPg4Sc3BI13CC');
        getSum('txtPg4Sc3BI10CD,txtPg4Sc3BI11CD,txtPg4Sc3BI12CD', 'txtPg4Sc3BI13CD');
        computePg4Sc3BI16();
    }

    function computePg4Sc3BI16() {
        getDifference('txtPg4Sc3BI13CA,txtPg4Sc3BI14CA', 'txtPg4Sc3BI15CA', 'txtPg4Sc3BI16CA');
        getDifference('txtPg4Sc3BI13CB,txtPg4Sc3BI14CB', 'txtPg4Sc3BI15CB', 'txtPg4Sc3BI16CB');
        getDifference('txtPg4Sc3BI13CC,txtPg4Sc3BI14CC', 'txtPg4Sc3BI15CC', 'txtPg4Sc3BI16CC');
        getDifference('txtPg4Sc3BI13CD,txtPg4Sc3BI14CD', 'txtPg4Sc3BI15CD', 'txtPg4Sc3BI16CD');
        computePg4Sc3BI19();
    }

    function computePg4Sc3BI19() {
        getDifference('txtPg4Sc3BI16CA,txtPg4Sc3BI17CA', 'txtPg4Sc3BI18CA', 'txtPg4Sc3BI19CA');
        getDifference('txtPg4Sc3BI16CB,txtPg4Sc3BI17CB', 'txtPg4Sc3BI18CB', 'txtPg4Sc3BI19CB');
        getDifference('txtPg4Sc3BI16CC,txtPg4Sc3BI17CC', 'txtPg4Sc3BI18CC', 'txtPg4Sc3BI19CC');
        getDifference('txtPg4Sc3BI16CD,txtPg4Sc3BI17CD', 'txtPg4Sc3BI18CD', 'txtPg4Sc3BI19CD');
        computePg4Sc3CI27();
    }

    function computePg4Sc3CI26() {
        getSum('txtPg4Sc3CI20CA,txtPg4Sc3CI21CA,txtPg4Sc3CI22CA,txtPg4Sc3CI23CA,txtPg4Sc3CI24CA,txtPg4Sc3CI25CA', 'txtPg4Sc3CI26CA');
        getSum('txtPg4Sc3CI20CB,txtPg4Sc3CI21CB,txtPg4Sc3CI22CB,txtPg4Sc3CI23CB,txtPg4Sc3CI24CB,txtPg4Sc3CI25CB', 'txtPg4Sc3CI26CB');
        getSum('txtPg4Sc3CI20CC,txtPg4Sc3CI21CC,txtPg4Sc3CI22CC,txtPg4Sc3CI23CC,txtPg4Sc3CI24CC,txtPg4Sc3CI25CC', 'txtPg4Sc3CI26CC');
        getSum('txtPg4Sc3CI20CD,txtPg4Sc3CI21CD,txtPg4Sc3CI22CD,txtPg4Sc3CI23CD,txtPg4Sc3CI24CD,txtPg4Sc3CI25CD', 'txtPg4Sc3CI26CD');
        computePg4Sc3CI27();
    }

    function computePg4Sc3CI27() {
        getSum('txtPg4Sc3AI5CA,txtPg4Sc3BI19CA,txtPg4Sc3CI26CA', 'txtPg4Sc3CI27CA');
        getSum('txtPg4Sc3AI5CB,txtPg4Sc3BI19CB,txtPg4Sc3CI26CB', 'txtPg4Sc3CI27CB');
        getSum('txtPg4Sc3AI5CC,txtPg4Sc3BI19CC,txtPg4Sc3CI26CC', 'txtPg4Sc3CI27CC');
        getSum('txtPg4Sc3AI5CD,txtPg4Sc3BI19CD,txtPg4Sc3CI26CD', 'txtPg4Sc3CI27CD');
        computePg3Sc1I2();
    }

    function computePg5Sc4I4() {
        getSum('txtPg5Sc4I1CA,txtPg5Sc4I2CA,txtPg5Sc4I3CA', 'txtPg5Sc4I4CA');
        getSum('txtPg5Sc4I1CB,txtPg5Sc4I2CB,txtPg5Sc4I3CB', 'txtPg5Sc4I4CB');
        getSum('txtPg5Sc4I1CC,txtPg5Sc4I2CC,txtPg5Sc4I3CC', 'txtPg5Sc4I4CC');
        getSum('txtPg5Sc4I1CD,txtPg5Sc4I2CD,txtPg5Sc4I3CD', 'txtPg5Sc4I4CD');
        computePg3Sc1I4();
    }

    function computePg6Sc5I40() {
        getSum('txtPg5Sc5I1CA,txtPg5Sc5I2CA,txtPg5Sc5I3CA,txtPg5Sc5I4CA,txtPg5Sc5I5CA,txtPg5Sc5I6CA,txtPg5Sc5I7CA,txtPg5Sc5I8CA,txtPg5Sc5I9CA,txtPg5Sc5I10CA,txtPg5Sc5I11CA,txtPg5Sc5I12CA,txtPg5Sc5I13CA,txtPg5Sc5I14CA,txtPg5Sc5I15CA,txtPg5Sc5I16CA,txtPg5Sc5I17CA,txtPg5Sc5I18CA,txtPg5Sc5I19CA,txtPg5Sc5I20CA,txtPg5Sc5I21CA,txtPg5Sc5I22CA,txtPg5Sc5I23CA,txtPg5Sc5I24CA,txtPg5Sc5I25CA,txtPg5Sc5I26CA,txtPg5Sc5I27CA,txtPg5Sc5I28CA,txtPg5Sc5I29CA,txtPg5Sc5I30CA,txtPg5Sc5I31CA,txtPg5Sc5I32CA,txtPg5Sc5I33CA,txtPg5Sc5I34CA,txtPg5Sc5I35CA,txtPg6Sc5I36CA,txtPg6Sc5I37CA,txtPg6Sc5I38CA,txtPg6Sc5I39CA', 'txtPg6Sc5I40CA');
        getSum('txtPg5Sc5I1CB,txtPg5Sc5I2CB,txtPg5Sc5I3CB,txtPg5Sc5I4CB,txtPg5Sc5I5CB,txtPg5Sc5I6CB,txtPg5Sc5I7CB,txtPg5Sc5I8CB,txtPg5Sc5I9CB,txtPg5Sc5I10CB,txtPg5Sc5I11CB,txtPg5Sc5I12CB,txtPg5Sc5I13CB,txtPg5Sc5I14CB,txtPg5Sc5I15CB,txtPg5Sc5I16CB,txtPg5Sc5I17CB,txtPg5Sc5I18CB,txtPg5Sc5I19CB,txtPg5Sc5I20CB,txtPg5Sc5I21CB,txtPg5Sc5I22CB,txtPg5Sc5I23CB,txtPg5Sc5I24CB,txtPg5Sc5I25CB,txtPg5Sc5I26CB,txtPg5Sc5I27CB,txtPg5Sc5I28CB,txtPg5Sc5I29CB,txtPg5Sc5I30CB,txtPg5Sc5I31CB,txtPg5Sc5I32CB,txtPg5Sc5I33CB,txtPg5Sc5I34CB,txtPg5Sc5I35CB,txtPg6Sc5I36CB,txtPg6Sc5I37CB,txtPg6Sc5I38CB,txtPg6Sc5I39CB', 'txtPg6Sc5I40CB');
        getSum('txtPg5Sc5I1CC,txtPg5Sc5I2CC,txtPg5Sc5I3CC,txtPg5Sc5I4CC,txtPg5Sc5I5CC,txtPg5Sc5I6CC,txtPg5Sc5I7CC,txtPg5Sc5I8CC,txtPg5Sc5I9CC,txtPg5Sc5I10CC,txtPg5Sc5I11CC,txtPg5Sc5I12CC,txtPg5Sc5I13CC,txtPg5Sc5I14CC,txtPg5Sc5I15CC,txtPg5Sc5I16CC,txtPg5Sc5I17CC,txtPg5Sc5I18CC,txtPg5Sc5I19CC,txtPg5Sc5I20CC,txtPg5Sc5I21CC,txtPg5Sc5I22CC,txtPg5Sc5I23CC,txtPg5Sc5I24CC,txtPg5Sc5I25CC,txtPg5Sc5I26CC,txtPg5Sc5I27CC,txtPg5Sc5I28CC,txtPg5Sc5I29CC,txtPg5Sc5I30CC,txtPg5Sc5I31CC,txtPg5Sc5I32CC,txtPg5Sc5I33CC,txtPg5Sc5I34CC,txtPg5Sc5I35CC,txtPg6Sc5I36CC,txtPg6Sc5I37CC,txtPg6Sc5I38CC,txtPg6Sc5I39CC', 'txtPg6Sc5I40CC');
        getSum('txtPg5Sc5I1CD,txtPg5Sc5I2CD,txtPg5Sc5I3CD,txtPg5Sc5I4CD,txtPg5Sc5I5CD,txtPg5Sc5I6CD,txtPg5Sc5I7CD,txtPg5Sc5I8CD,txtPg5Sc5I9CD,txtPg5Sc5I10CD,txtPg5Sc5I11CD,txtPg5Sc5I12CD,txtPg5Sc5I13CD,txtPg5Sc5I14CD,txtPg5Sc5I15CD,txtPg5Sc5I16CD,txtPg5Sc5I17CD,txtPg5Sc5I18CD,txtPg5Sc5I19CD,txtPg5Sc5I20CD,txtPg5Sc5I21CD,txtPg5Sc5I22CD,txtPg5Sc5I23CD,txtPg5Sc5I24CD,txtPg5Sc5I25CD,txtPg5Sc5I26CD,txtPg5Sc5I27CD,txtPg5Sc5I28CD,txtPg5Sc5I29CD,txtPg5Sc5I30CD,txtPg5Sc5I31CD,txtPg5Sc5I32CD,txtPg5Sc5I33CD,txtPg5Sc5I34CD,txtPg5Sc5I35CD,txtPg6Sc5I36CD,txtPg6Sc5I37CD,txtPg6Sc5I38CD,txtPg6Sc5I39CD', 'txtPg6Sc5I40CD');
        computePg3Sc1I6();
    }

    function computePg6Sc6I5() {
        getSum('txtPg6Sc6I1CA,txtPg6Sc6I2CA,txtPg6Sc6I3CA,txtPg6Sc6I4CA', 'txtPg6Sc6I5CA');
        getSum('txtPg6Sc6I1CB,txtPg6Sc6I2CB,txtPg6Sc6I3CB,txtPg6Sc6I4CB', 'txtPg6Sc6I5CB');
        getSum('txtPg6Sc6I1CC,txtPg6Sc6I2CC,txtPg6Sc6I3CC,txtPg6Sc6I4CC', 'txtPg6Sc6I5CC');
        getSum('txtPg6Sc6I1CD,txtPg6Sc6I2CD,txtPg6Sc6I3CD,txtPg6Sc6I4CD', 'txtPg6Sc6I5CD');
        computePg3Sc1I7();
    }

    function computePg6Sc7I3() {
        getDifference('txtPg6Sc7I1', 'txtPg6Sc7I2', 'txtPg6Sc7I3');

        computePg6Sc7AI4();
    }

    function computePg6Sc7AI4() {
        $_Id("frm1702MX:txtPg6Sc7AI4year").value = 2000 + ($_Id("frm1702MX:txtPg1I2YearEnd").value * 1);

        var netLoss = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg6Sc7I3").value));

        if (netLoss < 0) {
            $_Id("frm1702MX:txtPg6Sc7AI4CA").value = formatCurrencyWOC(Math.abs(netLoss));
        }
        else {
            $_Id("frm1702MX:txtPg6Sc7AI4CA").value = 0;
        }

        computePg6Sc7AI4CE();
    }

    function computePg6Sc7AI4CE() {
        
        getDifference('txtPg6Sc7AI4CA', 'txtPg6Sc7AI4CB,txtPg6Sc7AI4CC,txtPg6Sc7AI4CD', 'txtPg6Sc7AI4CE');
       
    }

    function computePg6Sc7AI5CE(elem) {
        var columnA = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg6Sc7AI5CA").value));
        var columnD = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg6Sc7AI5CD").value));
        var totalBCD = getSum("txtPg6Sc7AI5CB,txtPg6Sc7AI5CC,txtPg6Sc7AI5CD", "hidden");

        if (totalBCD > columnA) {
            alert("Value of Column B + C + D cannot be greater than value of Column A. (Values for Columns B, C and D will be set back to 0)");

            $_Id("frm1702MX:txtPg6Sc7AI5CB").value = 0;
            $_Id("frm1702MX:txtPg6Sc7AI5CC").value = 0;
            $_Id("frm1702MX:txtPg6Sc7AI5CD").value = 0;
            elem.select();
        }
        else if (columnD > columnA) {
            alert("Value of Column D cannot be greater than value of Column A.");

            $_Id("frm1702MX:txtPg6Sc7AI5CD").value = 0;
            $_Id("frm1702MX:txtPg6Sc7AI5CD").select();
        }
        else {
            getDifference('txtPg6Sc7AI5CA', 'txtPg6Sc7AI5CB,txtPg6Sc7AI5CC,txtPg6Sc7AI5CD', 'txtPg6Sc7AI5CE');
        }

        // Change value of hidden back to 0
        $_Id("frm1702MX:hidden").value = 0;
    }

    function computePg6Sc7AI6CE(elem) {
        var columnA = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg6Sc7AI6CA").value));
        var columnD = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg6Sc7AI6CD").value));
        var totalBCD = getSum("txtPg6Sc7AI6CB,txtPg6Sc7AI6CC,txtPg6Sc7AI6CD", "hidden");

        if (columnD > columnA) {
            alert("Value of Column D cannot be greater than value of Column A.");

            $_Id("frm1702MX:txtPg6Sc7AI6CD").value = 0;
            $_Id("frm1702MX:txtPg6Sc7AI6CD").select();
        }
        else if (totalBCD > columnA) {
            alert("Value of Column B + C + D cannot be greater than value of Column A. (Values for Columns B, C and D will be set back to 0)");

            $_Id("frm1702MX:txtPg6Sc7AI6CB").value = 0;
            $_Id("frm1702MX:txtPg6Sc7AI6CC").value = 0;
            $_Id("frm1702MX:txtPg6Sc7AI6CD").value = 0;
            elem.select();
        }
        else {
            getDifference('txtPg6Sc7AI6CA', 'txtPg6Sc7AI6CB,txtPg6Sc7AI6CC,txtPg6Sc7AI6CD', 'txtPg6Sc7AI6CE');
        }

        // Change value of hidden back to 0
        $_Id("frm1702MX:hidden").value = 0;
    }

    function computePg6Sc7AI7CE(elem) {
        var columnA = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg6Sc7AI7CA").value));
        var columnD = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg6Sc7AI7CD").value));
        var totalBCD = getSum("txtPg6Sc7AI7CB,txtPg6Sc7AI7CC,txtPg6Sc7AI7CD", "hidden");

        if (columnD > columnA) {
            alert("Value of Column D cannot be greater than value of Column A.");

            $_Id("frm1702MX:txtPg6Sc7AI7CD").value = 0;
            $_Id("frm1702MX:txtPg6Sc7AI7CD").select();
        }
        else if (totalBCD > columnA) {
            alert("Value of Column B + C + D cannot be greater than value of Column A. (Values for Columns B, C and D will be set back to 0)");

            $_Id("frm1702MX:txtPg6Sc7AI7CB").value = 0;
            $_Id("frm1702MX:txtPg6Sc7AI7CC").value = 0;
            $_Id("frm1702MX:txtPg6Sc7AI7CD").value = 0;
            elem.select();
        }
        else {
            getDifference('txtPg6Sc7AI7CA', 'txtPg6Sc7AI7CB,txtPg6Sc7AI7CC,txtPg6Sc7AI7CD', 'txtPg6Sc7AI7CE');
        }

        // Change value of hidden back to 0
        $_Id("frm1702MX:hidden").value = 0;
    }

    function computePg6Sc7AI8() {
        getSum('txtPg6Sc7AI4CD,txtPg6Sc7AI5CD,txtPg6Sc7AI6CD,txtPg6Sc7AI7CD', 'txtPg6Sc7AI8');
        computePg3Sc1I8();
    }

    function computePg6Sc8I4CD() {
        getSum('txtPg6Sc8I4CA,txtPg6Sc8I4CB,txtPg6Sc8I4CC', 'txtPg6Sc8I4CD');
        computePg7Sc8I13();
    }

    function computePg7Sc8I13() {
        getSum('txtPg6Sc8I1CA,txtPg6Sc8I2CA,txtPg6Sc8I3CA,txtPg6Sc8I4CA,txtPg6Sc8I5CA,txtPg6Sc8I6CA,txtPg7Sc8I7CA,txtPg7Sc8I8CA,txtPg7Sc8I9CA,txtPg7Sc8I10CA,txtPg7Sc8I11CA,txtPg7Sc8I12CA', 'txtPg7Sc8I13CA,txtPg2Pt5I38CA');
        getSum('txtPg6Sc8I1CB,txtPg6Sc8I2CB,txtPg6Sc8I3CB,txtPg6Sc8I4CB,txtPg6Sc8I5CB,txtPg6Sc8I6CB,txtPg7Sc8I7CB,txtPg7Sc8I8CB,txtPg7Sc8I9CB,txtPg7Sc8I10CB,txtPg7Sc8I11CB,txtPg7Sc8I12CB', 'txtPg7Sc8I13CB,txtPg2Pt5I38CB');
        getSum('txtPg6Sc8I1CC,txtPg6Sc8I2CC,txtPg6Sc8I3CC,txtPg6Sc8I4CC,txtPg6Sc8I5CC,txtPg6Sc8I6CC,txtPg7Sc8I7CC,txtPg7Sc8I8CC,txtPg7Sc8I9CC,txtPg7Sc8I10CC,txtPg7Sc8I11CC,txtPg7Sc8I12CC', 'txtPg7Sc8I13CC,txtPg2Pt5I38CC');
        getSum('txtPg6Sc8I1CD,txtPg6Sc8I2CD,txtPg6Sc8I3CD,txtPg6Sc8I4CD,txtPg6Sc8I5CD,txtPg6Sc8I6CD,txtPg7Sc8I7CD,txtPg7Sc8I8CD,txtPg7Sc8I9CD,txtPg7Sc8I10CD,txtPg7Sc8I11CD,txtPg7Sc8I12CD', 'txtPg7Sc8I13CD,txtPg2Pt5I38CD,txtPg1Pt2I17LessTotalTax');
        computePg1Pt2I18();
        computePg2Pt5I39();
    }
    function computePg7Sc9I1CC() {
        getDifference('txtPg7Sc9I1CB', 'txtPg7Sc9I1CA', 'txtPg7Sc9I1CC');

        var cValue = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg7Sc9I1CC").value));

        if (cValue < 0) {
            $_Id("frm1702MX:txtPg7Sc9I1CC").value = 0;
        }
    }

    function computePg7Sc9I2CC() {
        getDifference('txtPg7Sc9I2CB', 'txtPg7Sc9I2CA', 'txtPg7Sc9I2CC');

        var cValue = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg7Sc9I2CC").value));

        if (cValue < 0) {
            $_Id("frm1702MX:txtPg7Sc9I2CC").value = 0;
        }
    }

    function computePg7Sc9I3CC() {
        getDifference('txtPg7Sc9I3CB', 'txtPg7Sc9I3CA', 'txtPg7Sc9I3CC');

        var cValue = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg7Sc9I3CC").value));

        if (cValue < 0) {
            $_Id("frm1702MX:txtPg7Sc9I3CC").value = 0;
        }
    }

    function computePg7Sc9I1CG() {
        getDifference('txtPg7Sc9I1CC', 'txtPg7Sc9I1CD,txtPg7Sc9I1CE,txtPg7Sc9I1CF', 'txtPg7Sc9I1CG');

        var gValue = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg7Sc9I1CG").value));

        if (gValue < 0) {
            $_Id("frm1702MX:txtPg7Sc9I1CG").value = 0;
        }
    }

    function computePg7Sc9I2CG() {
        getDifference('txtPg7Sc9I2CC', 'txtPg7Sc9I2CD,txtPg7Sc9I2CE,txtPg7Sc9I2CF', 'txtPg7Sc9I2CG');

        var gValue = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg7Sc9I2CG").value));

        if (gValue < 0) {
            $_Id("frm1702MX:txtPg7Sc9I2CG").value = 0;
        }
    }

    function computePg7Sc9I3CG() {
        getDifference('txtPg7Sc9I3CC', 'txtPg7Sc9I3CD,txtPg7Sc9I3CE,txtPg7Sc9I3CF', 'txtPg7Sc9I3CG');

        var gValue = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg7Sc9I3CG").value));

        if (gValue < 0) {
            $_Id("frm1702MX:txtPg7Sc9I3CG").value = 0;
        }
    }

    function computePg7Sc9I4() {
        getSum('txtPg7Sc9I1CF,txtPg7Sc9I2CF,txtPg7Sc9I3CF', 'txtPg7Sc9I4,txtPg6Sc8I4CC');
        computePg6Sc8I4CD();
    }
    function computePg7Sc10I4() {
        getSum('txtPg7Sc10I1CA,txtPg7Sc10I2CA,txtPg7Sc10I3CA', 'txtPg7Sc10I4CA');
        getSum('txtPg7Sc10I1CB,txtPg7Sc10I2CB,txtPg7Sc10I3CB', 'txtPg7Sc10I4CB');
        getSum('txtPg7Sc10I1CC,txtPg7Sc10I2CC,txtPg7Sc10I3CC', 'txtPg7Sc10I4CC');
        getSum('txtPg7Sc10I1CD,txtPg7Sc10I2CD,txtPg7Sc10I3CD', 'txtPg7Sc10I4CD');
        computePg7Sc10I10();
    }

    function computePg7Sc10I9() {
        getSum('txtPg7Sc10I5CA,txtPg7Sc10I6CA,txtPg7Sc10I7CA,txtPg7Sc10I8CA', 'txtPg7Sc10I9CA');
        getSum('txtPg7Sc10I5CB,txtPg7Sc10I6CB,txtPg7Sc10I7CB,txtPg7Sc10I8CB', 'txtPg7Sc10I9CB');
        getSum('txtPg7Sc10I5CC,txtPg7Sc10I6CC,txtPg7Sc10I7CC,txtPg7Sc10I8CC', 'txtPg7Sc10I9CC');
        getSum('txtPg7Sc10I5CD,txtPg7Sc10I6CD,txtPg7Sc10I7CD,txtPg7Sc10I8CD', 'txtPg7Sc10I9CD');
        computePg7Sc10I10();
    }

    function computePg7Sc10I10() {
        getDifference('txtPg7Sc10I4CA', 'txtPg7Sc10I9CA', 'txtPg7Sc10I10CA');
        getDifference('txtPg7Sc10I4CB', 'txtPg7Sc10I9CB', 'txtPg7Sc10I10CB');
        getDifference('txtPg7Sc10I4CC', 'txtPg7Sc10I9CC', 'txtPg7Sc10I10CC');
        getDifference('txtPg7Sc10I4CD', 'txtPg7Sc10I9CD', 'txtPg7Sc10I10CD');
    }
    function computePg8Sc11I7() {
        getSum('txtPg8Sc11I1,txtPg8Sc11I2,txtPg8Sc11I3,txtPg8Sc11I4,txtPg8Sc11I5,txtPg8Sc11I6', 'txtPg8Sc11I7');
    }

    function computePg8Sc11I12() {
        getSum('txtPg8Sc11I8,txtPg8Sc11I9,txtPg8Sc11I10,txtPg8Sc11I11', 'txtPg8Sc11I12');
        computePg8Sc11I17();
    }

    function computePg8Sc11I16() {
        getSum('txtPg8Sc11I13,txtPg8Sc11I14,txtPg8Sc11I15', 'txtPg8Sc11I16');
        computePg8Sc11I17();
    }

    function computePg8Sc11I17() {
        getSum('txtPg8Sc11I12,txtPg8Sc11I16', 'txtPg8Sc11I17');
    }
    function computePg9Sc13I19I() {
        var subtotal = 0;
        var nameArray0 = $_Name('frm1702MX:txtPg9Sc13I19name-I');
        for (var i = 0; i < nameArray0.length; i++) {
            subtotal += (isNaN(NumWithComma(NumWithParenthesis(nameArray0[i].value))) ? 0 : NumWithComma(NumWithParenthesis(nameArray0[i].value)));
        }
        $_Id('hidden-frm1702MX:txtPg9Sc13-I').value = NegativeValue(formatCurrencyWOC(subtotal));

    }

    function computePg9Sc13I19II() {
        var subtotal = 0;
        var nameArray1 = $_Name('frm1702MX:txtPg9Sc13I19name-II');
        for (var i = 0; i < nameArray1.length; i++) {
            subtotal += (isNaN(NumWithComma(NumWithParenthesis(nameArray1[i].value))) ? 0 : NumWithComma(NumWithParenthesis(nameArray1[i].value)));
        }
        $_Id('hidden-frm1702MX:txtPg9Sc13-II').value = NegativeValue(formatCurrencyWOC(subtotal));

    }

    function computePg9Sc13I19III() {
        var subtotal = 0;
        var nameArray2 = $_Name('frm1702MX:txtPg9Sc13I19name-III');
        for (var i = 0; i < nameArray2.length; i++) {
            subtotal += (isNaN(NumWithComma(NumWithParenthesis(nameArray2[i].value))) ? 0 : NumWithComma(NumWithParenthesis(nameArray2[i].value)));
        }
        $_Id('hidden-frm1702MX:txtPg9Sc13-III').value = NegativeValue(formatCurrencyWOC(subtotal));

    }

    function computePg9Sc13I19IV() {
        var subtotal = 0;
        var nameArray3 = $_Name('frm1702MX:txtPg9Sc13I19name-IV');
        for (var i = 0; i < nameArray3.length; i++) {
            subtotal += (isNaN(NumWithComma(NumWithParenthesis(nameArray3[i].value))) ? 0 : NumWithComma(NumWithParenthesis(nameArray3[i].value)));
        }
        $_Id('hidden-frm1702MX:txtPg9Sc13-IV').value = NegativeValue(formatCurrencyWOC(subtotal));

    }

    function computePg9Sc13I19() {

        var colA_Pg9Sc13II = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc13I9CA').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc13I9CA').value)));
        var colB_Pg9Sc13II = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc13I9CB').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc13I9CB').value)));

        var colA_Pg9Sc13III = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc13I15CA').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc13I15CA').value)));
        var colB_Pg9Sc13III = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc13I15CB').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc13I15CB').value)));

        var colA_Pg9Sc13IV = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc13I18CA').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc13I18CA').value)));
        var colB_Pg9Sc13IV = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc13I18CB').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc13I18CB').value)));

        var total = 0;

        var subtotal1 = (isNaN(NumWithComma(NumWithParenthesis($_Id('hidden-frm1702MX:txtPg9Sc13-I').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('hidden-frm1702MX:txtPg9Sc13-I').value)));
        var subtotal2 = (isNaN(NumWithComma(NumWithParenthesis($_Id('hidden-frm1702MX:txtPg9Sc13-II').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('hidden-frm1702MX:txtPg9Sc13-II').value)));
        var subtotal3 = (isNaN(NumWithComma(NumWithParenthesis($_Id('hidden-frm1702MX:txtPg9Sc13-III').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('hidden-frm1702MX:txtPg9Sc13-III').value)));
        var subtotal4 = (isNaN(NumWithComma(NumWithParenthesis($_Id('hidden-frm1702MX:txtPg9Sc13-IV').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('hidden-frm1702MX:txtPg9Sc13-IV').value)));

        total = subtotal1 + subtotal2 + subtotal3 + subtotal4 + colA_Pg9Sc13II + colB_Pg9Sc13II + colA_Pg9Sc13III + colB_Pg9Sc13III + colA_Pg9Sc13IV + colB_Pg9Sc13IV;

        $_Id('frm1702MX:txtPg9Sc13I19').value = NegativeValue(formatCurrencyWOC(total));

    }
    function computePg9Sc14I8I() {
        var subtotal = 0;
        var nameArray0 = $_Name('frm1702MX:txtPg9Sc14I8name-I');
        for (var i = 0; i < nameArray0.length; i++) {
            subtotal += (isNaN(NumWithComma(NumWithParenthesis(nameArray0[i].value))) ? 0 : NumWithComma(NumWithParenthesis(nameArray0[i].value)));
        }
        $_Id('hidden-frm1702MX:txtPg9Sc14-I').value = NegativeValue(formatCurrencyWOC(subtotal));
    }

    function computePg9Sc14I8II() {
        var subtotal = 0;
        var nameArray1 = $_Name('frm1702MX:txtPg9Sc14I8name-II');

        for (var i = 0; i < nameArray1.length; i++) {
            subtotal += (isNaN(NumWithComma(NumWithParenthesis(nameArray1[i].value))) ? 0 : NumWithComma(NumWithParenthesis(nameArray1[i].value)));
        }

        $_Id('hidden-frm1702MX:txtPg9Sc14-II').value = NegativeValue(formatCurrencyWOC(subtotal));
    }

    function computePg9Sc14I8() {
        var colA_Pg9Sc14I = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc14I5CA').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc14I5CA').value)));
        var colB_Pg9Sc14I = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc14I5CB').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc14I5CB').value)));

        var colA_Pg9Sc14II = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc14I7CA').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc14I7CA').value)));
        var colB_Pg9Sc14II = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc14I7CB').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc14I7CB').value)));

        var total = 0;
        var subtotal1 = (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc14I1').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg9Sc14I1').value)));
        var subtotal2 = (isNaN(NumWithComma(NumWithParenthesis($_Id('hidden-frm1702MX:txtPg9Sc14-I').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('hidden-frm1702MX:txtPg9Sc14-I').value)));
        var subtotal3 = (isNaN(NumWithComma(NumWithParenthesis($_Id('hidden-frm1702MX:txtPg9Sc14-II').value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('hidden-frm1702MX:txtPg9Sc14-II').value)));

        total = subtotal1 + subtotal2 + subtotal3 + colA_Pg9Sc14I + colB_Pg9Sc14I + colA_Pg9Sc14II + colB_Pg9Sc14II;

        $_Id('frm1702MX:txtPg9Sc14I8').value = NegativeValue(formatCurrencyWOC(total));
    }
    function addCommas1702MX(elem) {
        elem.value = NegativeValue(formatCurrencyWOC(NumWithComma(NumWithParenthesis(elem.value))));//(NumWithComma(NumWithParenthesis(elem.value)) + "").replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    }

    function getSum(params, output) {
        var total = 0;
        var array1 = params.split(',');
        var array2 = output.split(',');
        for (var i = 0; i < array1.length; i++) {
            total += (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + array1[i]).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + array1[i]).value)));
        }

        for (var i = 0; i < array2.length; i++) {
            $_Id('frm1702MX:' + array2[i]).value = NegativeValue(formatCurrencyWOC(total));
        }

        return total;
    }

    function getDifference(minuend, subtrahend, output) {
        var total = 0, total2 = 0;
        var min = minuend.split(',');
        var sub = subtrahend.split(',');
        for (var i = 0; i < min.length; i++) {
            total += (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + min[i]).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + min[i]).value)));
        }
        for (var i = 0; i < sub.length; i++) {
            total2 += (isNaN(NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + sub[i]).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + sub[i]).value)));
        }

        $_Id('frm1702MX:' + output).value = NegativeValue(formatCurrencyWOC(total - total2));

        return total;
    }
    function summation(params, outputSum) {
        var total = 0;
        var array = params.split(',');
        for (var i = 0; i < array.length; i++) {
            total += (isNaN(NumWithComma(NumWithParenthesis(document.getElementById('frm1702MX:' + array[i]).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + array[i]).value)));
        }

        document.getElementById('frm1702MX:' + outputSum).value = NegativeValue(formatCurrencyWOC(total));
    }
    function summationThenDifference(params, subtrahend, outputSum, outputDifference) {
        var total = 0;
        var difference = 0;

        // if (parseInt(document.getElementById('frm1702MX:' + subtrahend).value, 10) === 0) 
        var array = params.split(',');
        for (var i = 0; i < array.length; i++) {
            total += (isNaN(NumWithComma(NumWithParenthesis(document.getElementById('frm1702MX:' + array[i]).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + array[i]).value)));
        }

        //Get the output of summation
        document.getElementById('frm1702MX:' + outputSum).value = NegativeValue(formatCurrencyWOC(total));
        //Get the output difference
        difference = total
                     - (isNaN(NumWithComma(NumWithParenthesis(document.getElementById('frm1702MX:' + subtrahend).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + subtrahend).value)));
        document.getElementById('frm1702MX:' + outputDifference).value = NegativeValue(formatCurrencyWOC(difference));
    }
    function summationThenDifferenceM(params, minuend, outputSum, outputDifference) {
        var total = 0;
        var difference = 0;

        // if (parseInt(document.getElementById('frm1702MX:' + subtrahend).value, 10) === 0) 
        var array = params.split(',');
        for (var i = 0; i < array.length; i++) {
            total += (isNaN(NumWithComma(NumWithParenthesis(document.getElementById('frm1702MX:' + array[i]).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + array[i]).value)));
        }

        //Get the output of summation
        document.getElementById('frm1702MX:' + outputSum).value = NegativeValue(formatCurrencyWOC(total).slice(0, -3));
        //Get the output difference
        difference = (isNaN(NumWithComma(NumWithParenthesis(document.getElementById('frm1702MX:' + minuend).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + minuend).value)))
                     - total;

        document.getElementById('frm1702MX:' + outputDifference).value = NegativeValue(formatCurrencyWOC(difference));

    }

    //Multiplication one output two parameter
    function product(param1, param2, outputProduct) {
        var product = 0;
        //multiply
        product = (isNaN(NumWithComma(NumWithParenthesis(document.getElementById('frm1702MX:' + param1).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + param1).value)))
                  * (isNaN(NumWithComma(NumWithParenthesis(document.getElementById('frm1702MX:' + param2).value))) ? 0 : NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + param2).value)));
        //Get the output product

        if (product < 0) {
            product = 0;
        }

        document.getElementById('frm1702MX:' + outputProduct).value = NegativeValue(formatCurrencyWOC(Math.round(product)));
    }
    function computePg1AttachScBI3(attachNum) {
        summationThenDifference('txtPg1' + attachNum + 'ScBI1', 'txtPg1' + attachNum + 'ScBI2', 'hidden', 'txtPg1' + attachNum + 'ScBI3');
    }

    function computePg1AttachScBI5(attachNum) {
        //Schedule B
        //perfrom addition in Item 3 and 4
        //populate sum in item 5
        summation('txtPg1' + attachNum + 'ScBI3,txtPg1' + attachNum + 'ScBI4', 'txtPg1' + attachNum + 'ScBI5');
        //perfrom computePg1AttachScBI10(attachNum) function
        computePg1AttachScBI10(attachNum);
        //perform computePg1AttachScBI12(attachNum)function
        computePg1AttachScBI12(attachNum);
    }

    function computePg1AttachScBI9(attachNum) {
        //Schedule B
        //perfrom summation in item 6 7 8
        //populate sum in item 9
        summation('txtPg1' + attachNum + 'ScBI6,txtPg1' + attachNum + 'ScBI7,txtPg1' + attachNum + 'ScBI8', 'txtPg1' + attachNum + 'ScBI9');
        //perfrom computePg1AttachScBI10(attachNum) function
        computePg1AttachScBI10(attachNum);
        //perform computePg1AttachScBI12(attachNum) function
        computePg1AttachScBI12(attachNum);
    }

    function computePg1AttachScBI10(attachNum) {
        //Schedule B
        //perfrom subtraction in item 5 and 9
        //populate difference in item 10
        summation('txtPg1' + attachNum + 'ScBI6,txtPg1' + attachNum + 'ScBI7,txtPg1' + attachNum + 'ScBI8', 'txtPg1' + attachNum + 'ScBI9');
        summationThenDifference('txtPg1' + attachNum + 'ScBI5', 'txtPg1' + attachNum + 'ScBI9', 'hidden', 'txtPg1' + attachNum + 'ScBI10');
        //perform computePg1AttachScCI1 function
        computePg1AttachScCI1(attachNum);
    }

    function populatePg1AttachScBI11(attachNum) {
        tempVarForSc1I12 = false;

        var specialTaxRateItem4 = $_Id("frm1702MX:txtPg1" + attachNum + "ScAI4").value;
        var specialTaxRateItem11 = $_Id("frm1702MX:txtPg1" + attachNum + "ScBI11");
        var specialTaxRateIPA = $_Id("frm1702MX:txtPg1" + attachNum + "ScAI1").value.toUpperCase();
        var specialTaxRateLegalBasis = $_Id("frm1702MX:txtPg1" + attachNum + "ScAI2").value.toUpperCase().replace(/[\. ]/g, '');
        
        var IPAList = ["PEZA", "ECOZONE", "BCDA", "SBMA", "CDC", "PPMC", "JHSEZ", "MSEZ", "CEZA", "ZCSEZA", "APECO", "AFAB", "TEZ", "EPZA", "MEPZA"];
        var legalBasisList = ["RA7227", "7227", "RA9400", "9400", "RA7916", "7916", "RA8748", "8748", "RA7922", "7922", "RA7903", "7903", "RA9490", "9490", "RA10083", "10083", "RA9728", "9728", "RA9593", "9593"];

        //New if legal basis is ra10693
        var legalBasisRA10693 = ["RA10693", "10693", "R.A.10693", "RA.10693", "R.A10693", "RA 10693", "R.A. 10693", "RA. 10693", "R.A 10693"];

        var isPEZABCDAorECOZONE5 = (($.inArray(specialTaxRateIPA, IPAList) > -1) || ($.inArray(specialTaxRateLegalBasis, legalBasisList) > -1)) && ((specialTaxRateItem4 * 1) === 5);
        var isTaxCode10Percent = (specialTaxRateIPA.replace(/[\. ]/g, '') === "TAXCODE") && ((specialTaxRateItem4 * 1) === 10);
        var isIC030or031or101 = ($_Id("frm1702MX:chkPg1I5ATCR2").checked === true) && (($_Id("frm1702MX:drpPg1I5ATCR2").value === "IC030") || ($_Id("frm1702MX:drpPg1I5ATCR2").value === "IC031") || ($_Id("frm1702MX:drpPg1I5ATCR2").value === "IC101"));
        
        //New condition for legal basis if ra10693
        var isRA10693 = ($.inArray(specialTaxRateLegalBasis, legalBasisRA10693) > -1);

        // 2015/07/20 Added "RA9513" and "9513" EFPS-CR-0004-1702MX Nolco
        var isIC010 = (($_Id("frm1702MX:chkPg1I5ATCR2").checked === true) && ($_Id("frm1702MX:drpPg1I5ATCR2").value === "IC010"));
        var isRA9513and10Percent = ((((specialTaxRateIPA.replace(/[\. ]/g, '') === "RA9513") || (specialTaxRateIPA.replace(/[\. ]/g, '') === "9513")) || ((specialTaxRateLegalBasis === "RA9513") || (specialTaxRateLegalBasis === "9513"))) && ((specialTaxRateItem4 * 1) === 10));
        
        if (!!isPEZABCDAorECOZONE5 && (attachNum.indexOf("SP") > -1)) {
            specialTaxRateItem11.value = specialTaxRateItem4;

            //specialTaxRateItem11.disabled = true;
        }
        else if (!!isTaxCode10Percent && !!isIC030or031or101 && (attachNum.indexOf("SP") > -1)) {
            specialTaxRateItem11.value = specialTaxRateItem4;
            //specialTaxRateItem11.disabled = true;

            $("#" + attachNum + "ScheduleI :input").not(".notenabled").prop("disabled", false);
            $("#" + attachNum + "ScheduleIA :input").not(".notenabled").prop("disabled", false);
        }
        // 2015/07/20 Added "RA9513" and "9513" EFPS-CR-0004-1702MX Nolco
        else if (!!isRA9513and10Percent && !!isIC010 && (attachNum.indexOf("SP") > -1)) {
            specialTaxRateItem11.value = specialTaxRateItem4;
                        
            $("#" + attachNum + "ScheduleI :input").not(".notenabled").prop("disabled", false);
            $("#" + attachNum + "ScheduleIA :input").not(".notenabled").prop("disabled", false);
        }
        //if legal basis is ra10693
        else if (!!isRA10693) {

            $_Id("frm1702MX:txtPg1" + attachNum + "ScAI4").value = "2.0";

            specialTaxRateItem11.value = $_Id("frm1702MX:txtPg1" + attachNum + "ScAI4").value;

        }
        else {
            //specialTaxRateItem11.disabled = false;
            specialTaxRateItem11.value = specialTaxRateItem4;

            var scheduleIElems = $("#" + attachNum + "ScheduleI :input");
            var scheduleIAElems = $("#" + attachNum + "ScheduleIA :input");

            scheduleIElems.val("0");
            scheduleIAElems.val("0");
            scheduleIAElems.not(".numbertext").val("");

            scheduleIElems.prop("disabled", true);
            scheduleIAElems.prop("disabled", true);
        }

        specialTaxRateItem11.onblur();
        computePg1AttachScBI12(attachNum);
    }

    function computePg1AttachScBI12(attachNum) {
        //TEMPORARY 
        //Schedule B
        //multiply Item 10 and 11
        //populate product in item 12

        // Set the % value to 'hidden' for computation purposes.
        $_Id("frm1702MX:hidden").value = (($_Id("frm1702MX:txtPg1" + attachNum + "ScBI11").value) * 1) / 100;
        var specialTaxRateLegalBasis = $_Id("frm1702MX:txtPg1" + attachNum + "ScAI2").value.toUpperCase().replace(/[\. ]/g, '');

        var IPAList = ["PEZA", "ECOZONE", "BCDA", "SBMA", "CDC", "PPMC", "JHSEZ", "MSEZ", "CEZA", "ZCSEZA", "APECO", "AFAB", "TEZ", "EPZA", "MEPZA"];

        //New if legal basis is RA10693
        var legalBasisRA10693 = ["RA10693", "10693", "R.A.10693", "RA.10693", "R.A10693", "RA 10693", "R.A. 10693", "RA. 10693", "R.A 10693"];

        var pg1AttachScBI10 = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg1" + attachNum + "ScBI10").value)),
            attachIsPEZAand5Percent = ($.inArray($_Id("frm1702MX:txtPg1" + attachNum + "ScAI1").value.toUpperCase(), IPAList) > -1) && ($_Id("frm1702MX:txtPg1" + attachNum + "ScAI4").value * 1) === 5,
            drpPg1I5ATCR2Value = $_Id("frm1702MX:drpPg1I5ATCR2").value,
            isIC080IC190IC191 = (drpPg1I5ATCR2Value === "IC080") || (drpPg1I5ATCR2Value === "IC190") || (drpPg1I5ATCR2Value === "IC191");

        //New condition for legal basis if RA10693
        var isRA10693 = ($.inArray(specialTaxRateLegalBasis, legalBasisRA10693) > -1);

        if (!!attachIsPEZAand5Percent && (attachNum.indexOf("SP") > -1)) {
            product("txtPg1" + attachNum + "ScBI5", "hidden", "txtPg1" + attachNum + "ScBI12");
        }
            /*else if (!!isIC080IC190IC191) {
                product("txtPg1" + attachNum + "ScBI1", "hidden", "txtPg1" + attachNum + "ScBI12");
            }*/
        else if (!!isRA10693) {
            product("txtPg1" + attachNum + "ScBI1", "hidden", "txtPg1" + attachNum + "ScBI12");
        }
        else {
            if (pg1AttachScBI10 > 0) {
                product("txtPg1" + attachNum + "ScBI10", "hidden", "txtPg1" + attachNum + "ScBI12");
            }
            else {
                $_Id("frm1702MX:txtPg1" + attachNum + "ScBI12").value = "0";
            }
        }
        // Change 'hidden' value back to 0.
        $_Id("frm1702MX:hidden").value = 0;

        computePg3Sc1I12();
    }

    function computePg1AttachScCI1(attachNum) {
        //Schedule C
        //Multiply Sched B item 10 to 30%
        //populate product sched c item 1
        var pg1AttachScBI10 = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg1" + attachNum + "ScBI10").value));

        if (pg1AttachScBI10 > 0) {
            product('txtPg1' + attachNum + 'ScBI10', 'hidden30', 'txtPg1' + attachNum + 'ScCI1');
        }
        else {
            $_Id("frm1702MX:txtPg1" + attachNum + "ScCI1").value = "0";
        }
        //perform computePg1AttachScCI3(attachNum) function
        computePg1AttachScCI3(attachNum);
    }

    function computePg1AttachScCI2(attachNum) {
        //Schedule C
        //Multiply Sched H item 5 to 30%
        //populate product sched c item 2
        product('txtPg4' + attachNum + 'ScHI5', 'hidden30', 'txtPg1' + attachNum + 'ScCI2');
        //perform computePg1AttachScCI3(attachNum) function
        computePg1AttachScCI3(attachNum);
    }

    function computePg1AttachScCI3(attachNum) {
        //Schedule C
        //sum of item 1 and 2
        //populate sum in item 3
        summation('txtPg1' + attachNum + 'ScCI1,txtPg1' + attachNum + 'ScCI2', 'txtPg1' + attachNum + 'ScCI3');
        //perform populatePg1' + attachNum + 'ScCI5(attachNum) function
        populatePg1AttachScCI5(attachNum);
    }

    function populatePg1AttachScCI4(attachNum) {
        //populate item 4 from schedule b item 11
        //call this on blur of sched b item 11
        document.getElementById('frm1702MX:txtPg1' + attachNum + 'ScCI4').value = document.getElementById('frm1702MX:txtPg1' + attachNum + 'ScBI12').value
        //perform populatePg1' + attachNum + 'ScCI5(attachNum) function
        populatePg1AttachScCI5(attachNum);
    }

    function populatePg1AttachScCI5(attachNum) {
        //Schedule C
        //difference of item 3 and 4
        //populate in item 5
        summationThenDifference('txtPg1' + attachNum + 'ScCI3', 'txtPg1' + attachNum + 'ScCI4', 'hidden', 'txtPg1' + attachNum + 'ScCI5');

        computePg1AttachScCI7(attachNum);
    }

    function computePg1AttachScCI7(attachNum) {
        getSum('txtPg1' + attachNum + 'ScCI5,txtPg1' + attachNum + 'ScCI6', 'txtPg1' + attachNum + 'ScCI7');
    }
    function computePg2AttachScDI6(attachNum) {
        //Schedule D
        //populate sum in item 4
        //populate difference in item 6
        summationThenDifference('txtPg2' + attachNum + 'ScDI1,txtPg2' + attachNum + 'ScDI2,txtPg2' + attachNum + 'ScDI3', 'txtPg2' + attachNum + 'ScDI5', 'txtPg2' + attachNum + 'ScDI4', 'txtPg2' + attachNum + 'ScDI6');
        //populate difference in schedule b item 1
        summationThenDifference('txtPg2' + attachNum + 'ScDI1,txtPg2' + attachNum + 'ScDI2,txtPg2' + attachNum + 'ScDI3', 'txtPg2' + attachNum + 'ScDI5', 'txtPg2' + attachNum + 'ScDI4', 'txtPg1' + attachNum + 'ScBI1');
        //perform computePg1' + attachNum + 'ScBI3(attachNum) function
        computePg1AttachScBI3(attachNum);
        //perfrom computePg1AttachScBI5(attachNum) funcation
        computePg1AttachScBI5(attachNum);
        // Populate Page 3 Schedule 1 Item 1
        computePg3Sc1I1();

    }
    //Schedule D ===========================================End||
    //Schedule E ===========================================Begin||
    function computePg2AttachScE1I5(attachNum) {
        //Schedule E1
        //populate sum in item 3
        //populate difference in item 5
        summationThenDifference('txtPg2' + attachNum + 'ScE1I1,txtPg2' + attachNum + 'ScE1I2', 'txtPg2' + attachNum + 'ScE1I4', 'txtPg2' + attachNum + 'ScE1I3', 'txtPg2' + attachNum + 'ScE1I5');
    }

    function computePg2AttachScE2I19(attachNum) {
        //Schedule E2
        //populate sum in item 8
        //populate difference in item 10
        summationThenDifference('txtPg2' + attachNum + 'ScE2I6,txtPg2' + attachNum + 'ScE2I7', 'txtPg2' + attachNum + 'ScE2I9', 'txtPg2' + attachNum + 'ScE2I8', 'txtPg2' + attachNum + 'ScE2I10');
        //Schedule E2
        //summation of item 10,11,12
        //populate sum in item 13
        summation('txtPg2' + attachNum + 'ScE2I10,txtPg2' + attachNum + 'ScE2I11,txtPg2' + attachNum + 'ScE2I12', 'txtPg2' + attachNum + 'ScE2I13');
        //summation of item 13,14 and subtract item 15
        //populate difference in item 16
        summationThenDifference('txtPg2' + attachNum + 'ScE2I13,txtPg2' + attachNum + 'ScE2I14', 'txtPg2' + attachNum + 'ScE2I15', 'hidden', 'txtPg2' + attachNum + 'ScE2I16');
        //Schedule E2
        //summation of item 16 17 and subtract item 18
        //populate difference in item 19
        summationThenDifference('txtPg2' + attachNum + 'ScE2I16,txtPg2' + attachNum + 'ScE2I17', 'txtPg2' + attachNum + 'ScE2I18', 'hidden', 'txtPg2' + attachNum + 'ScE2I19');
    }

    function computePg2AttachScE3I26(attachNum) {
        //Schedule E3
        //summation of item 20 21 22 23 24 25
        //populate sum in item 26
        summation('txtPg2' + attachNum + 'ScE3I20,txtPg2' + attachNum + 'ScE3I21,txtPg2' + attachNum + 'ScE3I22,txtPg2' + attachNum + 'ScE3I23,txtPg2' + attachNum + 'ScE3I24,txtPg2' + attachNum + 'ScE3I25', 'txtPg2' + attachNum + 'ScE3I26');
    }

    function computePg2AttachScE3I27(attachNum) {
        computePg2AttachScE1I5(attachNum);
        computePg2AttachScE2I19(attachNum);
        computePg2AttachScE3I26(attachNum);
        //Schedule E3
        //summation of item 5 19 26
        //populate sum in item 27
        summation('txtPg2' + attachNum + 'ScE1I5,txtPg2' + attachNum + 'ScE2I19,txtPg2' + attachNum + 'ScE3I26', 'txtPg2' + attachNum + 'ScE3I27');
        //populate sum in item 27 to Schedule B item 2
        summation('txtPg2' + attachNum + 'ScE1I5,txtPg2' + attachNum + 'ScE2I19,txtPg2' + attachNum + 'ScE3I26', 'txtPg1' + attachNum + 'ScBI2');
        //perfrom computePg1AttachScBI3(attachNum) function
        computePg1AttachScBI3(attachNum);
        //perfrom computePg1AttachScBI5(attachNum) function
        computePg1AttachScBI5(attachNum);
        computePg3Sc1I2();
    }
    //Schedule E ===========================================End||
    //Schedule F ===========================================Begin||
    function computePg3AttachScFI4(attachNum) {
        //Schedule F
        //summation of item 1 2 3 
        //populate sum in item 4
        summation('txtPg3' + attachNum + 'ScFI1C1,txtPg3' + attachNum + 'ScFI2C1,txtPg3' + attachNum + 'ScFI3C1', 'txtPg3' + attachNum + 'ScFI4C1');
        //populate sum in item 4 to Schedule B item 4
        getSum('txtPg3' + attachNum + 'ScFI1C1,txtPg3' + attachNum + 'ScFI2C1,txtPg3' + attachNum + 'ScFI3C1', 'txtPg1' + attachNum + 'ScBI4');
        computePg1AttachScBI5(attachNum);
        computePg3Sc1I4();
    }

    //Schedule F ===========================================End||
    //Schedule G ===========================================Begin||
    function computePg4AttachScGI40(attachNum) {
        //Schedule G
        //summation of item 1  to 39 
        //populate sum in item 40
        summation('txtPg3' + attachNum + 'ScGI1,txtPg3' + attachNum + 'ScGI2C1,txtPg3' + attachNum + 'ScGI3C1,txtPg3' + attachNum + 'ScGI4C1,txtPg3' + attachNum + 'ScGI5,txtPg3' + attachNum + 'ScGI6,txtPg3' + attachNum + 'ScGI7,txtPg3' + attachNum + 'ScGI8,txtPg3' + attachNum + 'ScGI9,txtPg3' + attachNum + 'ScGI10,txtPg3' + attachNum + 'ScGI11,txtPg3' + attachNum + 'ScGI12,txtPg3' + attachNum + 'ScGI13,txtPg3' + attachNum + 'ScGI14,txtPg3' + attachNum + 'ScGI15,txtPg3' + attachNum + 'ScGI16,txtPg3' + attachNum + 'ScGI17,txtPg3' + attachNum + 'ScGI18,txtPg3' + attachNum + 'ScGI19,txtPg3' + attachNum + 'ScGI20,txtPg3' + attachNum + 'ScGI21,txtPg3' + attachNum + 'ScGI22,txtPg3' + attachNum + 'ScGI23,txtPg3' + attachNum + 'ScGI24,txtPg3' + attachNum + 'ScGI25,txtPg3' + attachNum + 'ScGI26,txtPg3' + attachNum + 'ScGI27,txtPg3' + attachNum + 'ScGI28,txtPg3' + attachNum + 'ScGI29,txtPg4' + attachNum + 'ScGI30,txtPg4' + attachNum + 'ScGI31,txtPg4' + attachNum + 'ScGI32,txtPg4' + attachNum + 'ScGI33,txtPg4' + attachNum + 'ScGI34,txtPg4' + attachNum + 'ScGI35,txtPg4' + attachNum + 'ScGI36C1,txtPg4' + attachNum + 'ScGI37C1,txtPg4' + attachNum + 'ScGI38C1,txtPg4' + attachNum + 'ScGI39C1', 'txtPg4' + attachNum + 'ScGI40');
        //populate sum in item 40 to schedule B item 6
        summation('txtPg3' + attachNum + 'ScGI1,txtPg3' + attachNum + 'ScGI2C1,txtPg3' + attachNum + 'ScGI3C1,txtPg3' + attachNum + 'ScGI4C1,txtPg3' + attachNum + 'ScGI5,txtPg3' + attachNum + 'ScGI6,txtPg3' + attachNum + 'ScGI7,txtPg3' + attachNum + 'ScGI8,txtPg3' + attachNum + 'ScGI9,txtPg3' + attachNum + 'ScGI10,txtPg3' + attachNum + 'ScGI11,txtPg3' + attachNum + 'ScGI12,txtPg3' + attachNum + 'ScGI13,txtPg3' + attachNum + 'ScGI14,txtPg3' + attachNum + 'ScGI15,txtPg3' + attachNum + 'ScGI16,txtPg3' + attachNum + 'ScGI17,txtPg3' + attachNum + 'ScGI18,txtPg3' + attachNum + 'ScGI19,txtPg3' + attachNum + 'ScGI20,txtPg3' + attachNum + 'ScGI21,txtPg3' + attachNum + 'ScGI22,txtPg3' + attachNum + 'ScGI23,txtPg3' + attachNum + 'ScGI24,txtPg3' + attachNum + 'ScGI25,txtPg3' + attachNum + 'ScGI26,txtPg3' + attachNum + 'ScGI27,txtPg3' + attachNum + 'ScGI28,txtPg3' + attachNum + 'ScGI29,txtPg4' + attachNum + 'ScGI30,txtPg4' + attachNum + 'ScGI31,txtPg4' + attachNum + 'ScGI32,txtPg4' + attachNum + 'ScGI33,txtPg4' + attachNum + 'ScGI34,txtPg4' + attachNum + 'ScGI35,txtPg4' + attachNum + 'ScGI36C1,txtPg4' + attachNum + 'ScGI37C1,txtPg4' + attachNum + 'ScGI38C1,txtPg4' + attachNum + 'ScGI39C1', 'txtPg1' + attachNum + 'ScBI6');
        //perform computePg1AttachScBI9(attachNum)(attachNum) function
        computePg1AttachScBI9(attachNum);
        computePg3Sc1I6();
    }
    //Schedule G ===========================================End||
    //Schedule H ===========================================Begin||
    function computePg4AttachScHI5(attachNum) {
        //Schedule H
        //summation of item 1 2 3 4 
        //populate sum in item 5
        summation('txtPg4' + attachNum + 'ScHI1C3,txtPg4' + attachNum + 'ScHI2C3,txtPg4' + attachNum + 'ScHI3C3,txtPg4' + attachNum + 'ScHI4C3', 'txtPg4' + attachNum + 'ScHI5');
        //populate sum in item 5 to schedule B item 7
        summation('txtPg4' + attachNum + 'ScHI1C3,txtPg4' + attachNum + 'ScHI2C3,txtPg4' + attachNum + 'ScHI3C3,txtPg4' + attachNum + 'ScHI4C3', 'txtPg1' + attachNum + 'ScBI7');
        //perform computePg1AttachScBI9(attachNum)(attachNum) function
        computePg1AttachScBI9(attachNum);
        //perform computePg1AttachScCI2(attachNum) function
        computePg1AttachScCI2(attachNum);
        computePg3Sc1I7();
    }
    //Schedule H ===========================================End||
    //Schedule I ===========================================Begin||
    function computePg4AttachScIAI4(attachNum) {
        $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI4year").value = 2000 + ($_Id("frm1702MX:txtPg1I2YearEnd").value * 1);

        var netLoss = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg4" + attachNum + "ScII3").value));

        if (netLoss < 0) {
            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI4CA").value = formatCurrencyWOC(Math.abs(netLoss));
            //$_Id("frm1702MX:txtPg4" + attachNum + "ScIAI4CD").disabled = false;
        }
        else {
            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI4CA").value = 0;
            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI4CD").value = 0;
            //$_Id("frm1702MX:txtPg4" + attachNum + "ScIAI4CD").disabled = true;
        }

        computePg4AttachScIAI8(attachNum);
    }

    function computePg4AttachScII3(attachNum) {
        //Schedule I
        //difference of item 1 and 2 
        //populate difference in item 3
        getDifference('txtPg4' + attachNum + 'ScII1', 'txtPg4' + attachNum + 'ScII2', 'txtPg4' + attachNum + 'ScII3');

        computePg4AttachScIAI4(attachNum);
    }

    function computePg4AttachScIAI4CE(attachNum) {
        var columnA = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg4" + attachNum + "ScIAI4CA").value));
        var columnD = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg4" + attachNum + "ScIAI4CD").value));

        if (columnD > columnA) {
            alert("Value of Column D cannot be greater than value of Column A.");

            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI4CD").value = 0;
            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI4CD").select();
        }
        else {
            getDifference('txtPg4' + attachNum + 'ScIAI4CA', 'txtPg4' + attachNum + 'ScIAI4CB,txtPg4' + attachNum + 'ScIAI4CC,txtPg4' + attachNum + 'ScIAI4CD', 'txtPg4' + attachNum + 'ScIAI4CE');
        }

        computePg4AttachScIAI4(attachNum);
    }

    function computePg4AttachScIAI5CE(elem, attachNum) {
        var columnA = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg4" + attachNum + "ScIAI5CA").value));
        var columnD = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg4" + attachNum + "ScIAI5CD").value));
        var totalBCD = getSum('txtPg4' + attachNum + 'ScIAI5CB,txtPg4' + attachNum + 'ScIAI5CC,txtPg4' + attachNum + 'ScIAI5CD', 'hidden');

        if (columnD > columnA) {
            alert("Value of Column D cannot be greater than value of Column A.");

            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI5CD").value = 0;
            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI5CD").select();
        }
        else if (totalBCD > columnA) {
            alert("Value of Column B + C + D cannot be greater than value of Column A.");

            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI5CB").value = 0;
            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI5CC").value = 0;
            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI5CD").value = 0;
            elem.select();
        }
        else {
            getDifference('txtPg4' + attachNum + 'ScIAI5CA', 'txtPg4' + attachNum + 'ScIAI5CB,txtPg4' + attachNum + 'ScIAI5CC,txtPg4' + attachNum + 'ScIAI5CD', 'txtPg4' + attachNum + 'ScIAI5CE');
        }

        computePg4AttachScIAI4(attachNum);

        // Change value of hidden back to 0
        $_Id("frm1702MX:hidden").value = 0;
    }

    function computePg4AttachScIAI6CE(elem, attachNum) {
        var columnA = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg4" + attachNum + "ScIAI6CA").value));
        var columnD = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg4" + attachNum + "ScIAI6CD").value));
        var totalBCD = getSum('txtPg4' + attachNum + 'ScIAI6CB,txtPg4' + attachNum + 'ScIAI6CC,txtPg4' + attachNum + 'ScIAI6CD', 'hidden');

        if (columnD > columnA) {
            alert("Value of Column D cannot be greater than value of Column A.");

            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI6CD").value = 0;
            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI6CD").select();
        }
        else if (totalBCD > columnA) {
            alert("Value of Column B + C + D cannot be greater than value of Column A.");

            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI6CB").value = 0;
            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI6CC").value = 0;
            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI6CD").value = 0;
            elem.select();
        }
        else {
            getDifference('txtPg4' + attachNum + 'ScIAI6CA', 'txtPg4' + attachNum + 'ScIAI6CB,txtPg4' + attachNum + 'ScIAI6CC,txtPg4' + attachNum + 'ScIAI6CD', 'txtPg4' + attachNum + 'ScIAI6CE');
        }

        computePg4AttachScIAI4(attachNum);

        // Change value of hidden back to 0
        $_Id("frm1702MX:hidden").value = 0;
    }

    function computePg4AttachScIAI7CE(elem, attachNum) {
        var columnA = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg4" + attachNum + "ScIAI7CA").value));
        var columnD = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg4" + attachNum + "ScIAI7CD").value));
        var totalBCD = getSum('txtPg4' + attachNum + 'ScIAI7CB,txtPg4' + attachNum + 'ScIAI7CC,txtPg4' + attachNum + 'ScIAI7CD', 'hidden');

        if (columnD > columnA) {
            alert("Value of Column D cannot be greater than value of Column A.");

            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI7CD").value = 0;
            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI7CD").select();
        }
        else if (totalBCD > columnA) {
            alert("Value of Column B + C + D cannot be greater than value of Column A.");

            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI7CB").value = 0;
            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI7CC").value = 0;
            $_Id("frm1702MX:txtPg4" + attachNum + "ScIAI7CD").value = 0;
            elem.select();
        }
        else {
            getDifference('txtPg4' + attachNum + 'ScIAI7CA', 'txtPg4' + attachNum + 'ScIAI7CB,txtPg4' + attachNum + 'ScIAI7CC,txtPg4' + attachNum + 'ScIAI7CD', 'txtPg4' + attachNum + 'ScIAI7CE');
        }

        computePg4AttachScIAI4(attachNum);

        // Change value of hidden back to 0
        $_Id("frm1702MX:hidden").value = 0;
    }
    function computePg4AttachScIAI8(attachNum) {
        summation('txtPg4' + attachNum + 'ScIAI4CD,txtPg4' + attachNum + 'ScIAI5CD,txtPg4' + attachNum + 'ScIAI6CD,txtPg4' + attachNum + 'ScIAI7CD', 'txtPg4' + attachNum + 'ScIAI8CD');
        //populate sum in item 8d to Schedule B item 8
        summation('txtPg4' + attachNum + 'ScIAI4CD,txtPg4' + attachNum + 'ScIAI5CD,txtPg4' + attachNum + 'ScIAI6CD,txtPg4' + attachNum + 'ScIAI7CD', 'txtPg1' + attachNum + 'ScBI8');
        //perform computePg1AttachScBI9(attachNum)(attachNum) function
        computePg1AttachScBI9(attachNum);
        computePg3Sc1I8();
    }
    var currentPage = 1;
    var MaxPage = 9;

    function processPrev() {
        if (currentPage == 1)
            currentPage = 1;
        else {
            currentPage--;
            $('#Page' + currentPage + 'Content').show('blind');
            $('#Page' + (currentPage + 1) + 'Content').hide('blind');
            $_Id('frm1702MX:txtCurrentPage').value = currentPage;
            $_Id('frm1702MX:txtMaxPage').value = MaxPage;
        }
    }

    function processNext() {
        currentPage++;
            $('#Page' + currentPage + 'Content').show('blind');
            $('#Page' + (currentPage - 1) + 'Content').hide('blind');
            $_Id('frm1702MX:txtCurrentPage').value = currentPage;
            $_Id('frm1702MX:txtMaxPage').value = MaxPage;
    }

    // Used for navigating
    function changeCurrentPage(pageNum) {
        $_Id("frm1702MX:txtCurrentPage").value = pageNum;

        goToPage();
    }

    function goToPage() {
        var newVal = $_Id("frm1702MX:txtCurrentPage").value;
        var printType = !isFromPrint ? "Page" : "Print";

        if ((newVal <= MaxPage) && (newVal > 0) && (newVal !== currentPage.toString())) {
            $('#' + printType + currentPage + 'Content').hide('blind');
            $('#' + printType + newVal + 'Content').show('blind');
            currentPage = ($_Id("frm1702MX:txtCurrentPage").value) * 1;
        }
        else if ((newVal > MaxPage) || (newVal <= 0)) {
            alert("Invalid page");

            $_Id("frm1702MX:txtCurrentPage").value = currentPage;
        }

        if (isFromPrint) {
            printOCR();
        }
    }

    function setPagesFiled() {
        $_Id("frm1702MX:txtPg1Pt2NumberofPagesFiled").value = (9 + (totalSP * 4) + (totalEX * 4));
    }

    var totalEX = 0;
    var totalSP = 0;
    var totalEXArray = [];
    var totalSPArray = [];
    var currentAttachment = 0;
    var currentAttachmentPage = 1;

    function checkAttachments(element) {
        if (!!element.checked) {
            openDialog("attachmentModal");
            $("#addAttachment").show();
        }
        else {
            if (!!confirm("Clicking on 'OK' will delete all attachments made.")) {
                $("#addAttachment").hide();
                removeAttachments();
            }
            else {
                element.checked = true;
                
            }
        }
    }

    function removeAttachments() {
        $("#attachmentEX").html("");
        $("#attachmentSP").html("");

        totalEX = 0;
        totalEXArray = [];
        totalSP = 0;
        totalSPArray = [];

        displayTotalAttachments();
        disableAttachColumns(false, 'SP');
        disableAttachColumns(false, 'EX');
        recomputeSchedule1();

        //setPagesFiled();
    }

    function changeView(showAttachments) {
        if (showAttachments === true) {
            $("#ATTACHMENT").show();
            $("#mainPages").hide();
            $("#viewMainBtn").show();
            $("#viewAttachBtn").hide();
        }
        else if (showAttachments === false) {
            $("#mainPages").show();
            $("#ATTACHMENT").hide();
            $("#viewAttachBtn").show();
            $("#viewMainBtn").hide();
        }

        $_Id("Button1").disabled = showAttachments;
        $_Id("Button2").disabled = showAttachments;
        $_Id("frm1702MX:txtCurrentPage").disabled = showAttachments;

        isFromAttachment = showAttachments;
        displayTotalAttachments();
    }

    function viewAttachments(attachType, viewPage1) {
        var total = (attachType === "EX") ? totalEX : totalSP;

        if (total > 0) {

            if ($_Id("attachmentCurrent").value !== currentAttachment.toString()) {
                hideCurrentAttachmentPage();
            }

            if (attachType === "EX") {
                $("#attachmentHeader").html("Viewing 'EXEMPT TAX REGIME' Attachments");
                $("#attachmentEX").show();
                $("#attachmentSP").hide();
                $_Id("attachmentTotal").value = totalEXArray.length;    //totalEX;
                $_Id("attachTypeView").value = "EX";
            }
            else if (attachType === "SP") {
                $("#attachmentHeader").html("Viewing 'SPECIAL RATE TAX REGIME' Attachments");
                $("#attachmentSP").show();
                $("#attachmentEX").hide();
                $_Id("attachmentTotal").value = totalSPArray.length;    //totalSP;
                $_Id("attachTypeView").value = "SP";
            }

            currentAttachment = $_Id("attachmentCurrent").value;

            if (!viewPage1) {
                $_Id("attachmentCurrent").value = $_Id("attachmentTotal").value;
            }
            else {
                $_Id("attachmentCurrent").value = 1;
            }

            displayAttachmentByNumber();
            displayTotalAttachments();
        }
        else {
            if (totalEX === 0 && totalSP === 0) {
                alert("All attachments have been deleted, you will be redirected to the main pages.");
                disableAttachColumns(false, 'SP');
                disableAttachColumns(false, 'EX');

                changeView(false);

                $_Id("frm1702MX:chkPg2Pt4I30MoreThanOne").checked = false;
                
            }
            else {
                var attachType = attachType === "EX" ? "EXEMPT" : "SPECIAL RATE";
                alert("There are no " + attachType + " attachments available.");

                if (totalEX === 0) {
                    disableAttachColumns(false, 'EX');

                    viewAttachments("SP", true);
                }
                else if (totalSP === 0) {
                    disableAttachColumns(false, 'SP');

                    viewAttachments("EX", true);
                }
            }
        }
    }

    function addAttachment(attachType) {
        var attachment = $("#attachment" + attachType).html();
        var newAttachment = $("#attachmentPages_TEMP").html();
        var total = attachType === "EX" ? (totalEX + 1) : (totalSP + 1);

        // Replace DISPLAY: none with DISPLAY: block
        newAttachment = newAttachment.replace('DISPLAY: none', "DISPLAY: block"); // This replaces the first one

        // Rename IDs
        newAttachment = newAttachment.replace(/AttM/g, attachType + total);
        // Change type hidden to type text
        
        newAttachment = newAttachment.replace(new RegExp("type=hidden", "g"), "type=text");


        $("#attachment" + attachType).html(attachment + newAttachment);

        if (attachType === "EX") {
            //totalEX++;
            totalEX = totalEXArray.push(attachType + total);    // Store length of totalEXArray to totalEX
            $_Id("frm1702MX:rdoPg1" + attachType + total + "Exempt").checked = true;
            $_Id("frm1702MX:txtPg1" + attachType + total + "ScAI4").disabled = true;
        }
        else if (attachType === "SP") {
            //totalSP++;
            totalSP = totalSPArray.push(attachType + total);    // Store length of totalSPArray to totalSP
            $_Id("frm1702MX:rdoPg1" + attachType + total + "SpecialRate").checked = true;
        }

        $("#" + attachType + total + "ScheduleI :input").prop("disabled", true);
        $("#" + attachType + total + "ScheduleIA :input").prop("disabled", true);

        viewAttachments(attachType, false);
        changeView(true);

        // to activate checkbox
        
        $("#attachmentEX .inputAttachment").each(function(){
            document.getElementById($(this).attr('id')).setAttribute('type','text');
        });

        $("#attachmentSP .inputAttachment").each(function(){
            document.getElementById($(this).attr('id')).setAttribute('type','text');
        });

        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

        //setPagesFiled();
    }

    function displayAttachmentByNumber() {
        var attachType = $_Id("attachTypeView").value;
        var goToAttachment = parseInt($_Id("attachmentCurrent").value);
        var maxAttachment = parseInt($_Id("attachmentTotal").value);

        if (goToAttachment <= maxAttachment) {

            if (goToAttachment !== currentAttachment) {
                $("#" + attachType + currentAttachment + "Container").hide();
                $("#" + attachType + goToAttachment + "Container").show();

                displayAttachmentByPage(1);

                currentAttachment = goToAttachment;
            }
        }
        else {
            alert("The attachment you are trying to navigate to does not exist.");

            $_Id("attachmentCurrent").value = currentAttachment;
        }
    }

    function displayAttachmentByPage(pageNum) {
        var attachType = $_Id("attachTypeView").value;
        var attachNum = parseInt($_Id("attachmentCurrent").value);
        var tempArray = [];

        if (attachType === "EX") {
            tempArray = totalEXArray;
        }
        else if (attachType === "SP") {
            tempArray = totalSPArray;
        }

        $("#Page" + currentAttachmentPage + tempArray[attachNum - 1] + "Content").hide('blind');
        $("#attachmentPage" + currentAttachmentPage).prop('disabled', false);

        $("#Page" + pageNum + tempArray[attachNum - 1] + "Content").show('blind');
        $("#attachmentPage" + pageNum).prop('disabled', true);

        currentAttachmentPage = pageNum;
    }

    function hideCurrentAttachmentPage() {
        var attachType = $_Id("attachTypeView").value;
        var attachNum = parseInt($_Id("attachmentCurrent").value);
        var tempArray = [];

        if (attachType === "EX") {
            tempArray = totalEXArray;
        }
        else if (attachType === "SP") {
            tempArray = totalSPArray;
        }

        $("#" + tempArray[attachNum - 1] + "Container").hide("fade");

        $("#Page" + currentAttachmentPage + tempArray[attachNum - 1] + "Content").hide('blind');
        $("#attachmentPage" + currentAttachmentPage).prop('disabled', false);
    }

    function deleteAttachment() {
        // Attachment Type being viewed
        var attachType = $_Id("attachTypeView").value;
        // Attachment Number being viewed
        var attachNum = parseInt($_Id("attachmentCurrent").value);

        var deletedItem = "";
        var lastItem = "";

        if (attachType === "EX") {
            // Store item to be deleted to a variable
            deletedItem = totalEXArray[attachNum - 1];

            // Store last item to a variable
            lastItem = totalEXArray[totalEXArray.length - 1];
        }
        else if (attachType === "SP") {
            // Store item to be deleted item to a variable
            deletedItem = totalSPArray[attachNum - 1];

            // Store last item to a variable
            lastItem = totalSPArray[totalSPArray.length - 1];
        }

        var confirmMsg = "Are you sure you want to delete this attachment? This is irreversible.";

        if (lastItem !== deletedItem) {
            confirmMsg += " Attachment " + lastItem + " will become " + deletedItem + ".";
        }

        if (confirm(confirmMsg) === true) {
            if (attachType === "EX") {
                // Remove the div of the current attachment being viewed
                $("#" + deletedItem + "Container").remove();
                alert("Attachment " + totalEXArray[attachNum - 1] + " has been deleted.");

                // Remove last item from totalEXArray
                totalEXArray.splice(-1, 1);
                totalEX = totalEXArray.length;
            }
            else if (attachType === "SP") {
                // Remove the div of the current attachment being viewed
                $("#" + deletedItem + "Container").remove();
                alert("Attachment " + totalSPArray[attachNum - 1] + " has been deleted.");

                // Remove last item from totalSPArray
                totalSPArray.splice(-1, 1);
                totalSP = totalSPArray.length;
            }

            changeIdTransferredAttachment(attachType, lastItem, deletedItem);
            displayTotalAttachments();
            viewAttachments(attachType, false);
            recomputeSchedule1();

            //setPagesFiled();
        }
    }
    function changeIdTransferredAttachment(attachType, lastItem, deletedItem) {
        var replaceRegEx = new RegExp();

        if (attachType === "EX") {
            replaceRegEx = new RegExp(lastItem, "g");

            $("#attachmentEX").html($("#attachmentEX").html().replace(replaceRegEx, deletedItem));
        }
        else if (attachType === "SP") {
            replaceRegEx = new RegExp(lastItem, "g");

            $("#attachmentSP").html($("#attachmentSP").html().replace(replaceRegEx, deletedItem));
        }

        //var attachEX = $('[id^=EX][id$=Container]');
        //var attachSP = $('[id^=SP][id$=Container]');
    }

    function displayTotalAttachments() {
        var noAttach = (totalEX === 0 && totalSP === 0);

        $_Id("viewAttachBtn").disabled = noAttach;

        if (!noAttach) {
            $("#addAttachment").show();
        }

        $("#total").html("Total EXEMPT Attachments: " + totalEX + " Total SPECIAL Attachments: " + totalSP);

        $_Id("frm1702MX:totalEXAttach").value = totalEX;
        $_Id("frm1702MX:totalSPAttach").value = totalSP;
    }

    function openDialog2(element) {
        $('#' + element).show("fade");
        centerMe('#' + element);
        $('#PageFooter').hide();

        // Attachment Type being viewed
        var attachType = $_Id("attachTypeView").value;
        // Attachment Number being viewed
        var attachNum = parseInt($_Id("attachmentCurrent").value);

        $("#Page" + currentAttachmentPage + attachType + attachNum + "Content").hide();
        $("#attachmentPager").hide();
        $("#attachmentHeaderDiv").hide();
    }

    function closeDialog2(element) {
        $('#' + element).hide("fade");
        $('#PageFooter').show();

        // Attachment Type being viewed
        var attachType = $_Id("attachTypeView").value;
        // Attachment Number being viewed
        var attachNum = parseInt($_Id("attachmentCurrent").value);

        $("#Page" + currentAttachmentPage + attachType + attachNum + "Content").show();
        $("#attachmentPager").show();
        $("#attachmentHeaderDiv").show();
    }

    function addSpecialAttachment(isFromMain) {
        if (totalSP === 0) {
            if (confirm("Adding Special Attachments will remove current values in Column B (Special Rate Column) of Part IV Items 31-36 (Page 2), Schedules 3, 3A, 3B, 3C, 4, 5 and 6 (Page 4 to 6) and these fields will be rendered uneditable.\nContinue?")) {
                if (!!isFromMain) {
                    closeDialog('attachmentModal');
                }

                addAttachment('SP');
                disableAttachColumns(true, 'SP');
            }
            else {
                if (!!isFromMain) {
                    closeDialog('attachmentModal');
                }

                $_Id("frm1702MX:chkPg2Pt4I30MoreThanOne").checked = false;
                
            }
        }
        else {
            addAttachment('SP');
        }
    }

    function addExemptAttachment(isFromMain) {
        if (totalEX === 0) {
            if (confirm("Adding Exempt Attachments will remove current values in Column A (Exempt Column) of Part IV Items 31-36 (Page 2), Schedules 3, 3A, 3B, 3C, 4, 5 and 6 (Page 4 to 6) and these fields will be rendered uneditable.\nContinue?")) {
                if (!!isFromMain) {
                    closeDialog('attachmentModal');
                }

                addAttachment('EX');
                disableAttachColumns(true, 'EX');
            }
            else {
                if (!!isFromMain) {
                    closeDialog('attachmentModal');
                }

                $_Id("frm1702MX:chkPg2Pt4I30MoreThanOne").checked = false;
                
            }
        }
        else {
            addAttachment('EX');
        }
    }

    // This will enable/disable Exempt Column (Column A) of Part IV Items 31-36, Schedules 3, 3A, 3B, 3C, 4, 5 and 6 (Page 4 to 6)
    function disableAttachColumns(disable, type) {

        var disabledColumns = (type === "EX") ? document.getElementsByClassName('frm1702MX:txtColumnAExempt') : document.getElementsByClassName("frm1702MX:txtColumnBSpecialRate");
        var itemsFromModal = 0, i, len = disabledColumns.length,
            columnLetter = (type === "EX") ? "A" : "B";

        if (len > 0) {
            for (i = 0; i < len; i++) {
                if (disabledColumns[i].id.toString().indexOf("Pg2Pt4") > -1) {
                    if (disabledColumns[i].value.length > 0) {
                        disabledColumns[i].value = "";

                        if (typeof (disabledColumns[i].onblur) === "function") {
                            disabledColumns[i].onblur();
                        }
                    }

                    disabledColumns[i].disabled = !!disable;
                }
                else {
                    if (disabledColumns[i].value !== "0") {
                        disabledColumns[i].value = "0";

                        if (typeof (disabledColumns[i].onblur) === "function") {
                            disabledColumns[i].onblur();
                        }
                    }

                    if (disabledColumns[i].id.toString().indexOf("Col") > -1) {
                        itemsFromModal++;
                    }

                    if ((disabledColumns[i].id === "frm1702MX:txtPg5Sc5I4C" + columnLetter) || (disabledColumns[i].id === "frm1702MX:txtPg5Sc4I2C" + columnLetter) || (disabledColumns[i].id === "frm1702MX:txtPg5Sc4I3C" + columnLetter) || (disabledColumns[i].id === "frm1702MX:txtPg5Sc5I3C" + columnLetter) ||
                                (disabledColumns[i].id === "frm1702MX:txtPg5Sc5I4C" + columnLetter) || (disabledColumns[i].id === "frm1702MX:txtPg6Sc5I37C" + columnLetter) || (disabledColumns[i].id === "frm1702MX:txtPg6Sc5I38C" + columnLetter) || (disabledColumns[i].id === "frm1702MX:txtPg6Sc5I39C" + columnLetter) ||
                                (disabledColumns[i].id === "frm1702MX:txtPg6Sc6I2C" + columnLetter) || (disabledColumns[i].id === "frm1702MX:txtPg6Sc6I3C" + columnLetter) || (disabledColumns[i].id === "frm1702MX:txtPg6Sc6I4C" + columnLetter)) {
                        disabledColumns[i].disabled = true;
                    }
                    else {
                        disabledColumns[i].disabled = !!disable;
                    }
                }
            }
        }

        attachmentChecking(itemsFromModal);

        if (type === "SP") {
            changeSpecialTaxRate();
        }
    }

    function attachmentChecking(itemsFromModal) {

        checkNullRow_OnBlur3("txtPg5Sc4I1", "txtPg5Sc4I2,txtPg5Sc4I2CA,txtPg5Sc4I2CB,txtPg5Sc4I2CC");
        if ($_Id("frm1702MX:txtPg5Sc4I3").value !== "OTHERS" && $_Id("frm1702MX:txtPg5Sc4I3").value !== "") {
            checkNullRow_OnBlur3("txtPg5Sc4I2", "txtPg5Sc4I3,txtPg5Sc4I3CA,txtPg5Sc4I3CB,txtPg5Sc4I3CC");
        }

        checkNullRow_OnBlur3("txtPg5Sc5I2", "txtPg5Sc5I3,txtPg5Sc5I3CA,txtPg5Sc5I3CB,txtPg5Sc5I3CC");
        if ($_Id("frm1702MX:txtPg5Sc5I4").value !== "OTHERS" && $_Id("frm1702MX:txtPg5Sc5I4").value !== "") {
            checkNullRow_OnBlur3("txtPg5Sc5I3", "txtPg5Sc5I4,txtPg5Sc5I4CA,txtPg5Sc5I4CB,txtPg5Sc5I4CC");
        }

        checkNullRow_OnBlur3("txtPg6Sc5I36other", "txtPg6Sc5I37other,txtPg6Sc5I37CA,txtPg6Sc5I37CB,txtPg6Sc5I37CC");
        checkNullRow_OnBlur3("txtPg6Sc5I37other", "txtPg6Sc5I38other,txtPg6Sc5I38CA,txtPg6Sc5I38CB,txtPg6Sc5I38CC");
        if ($_Id("frm1702MX:txtPg6Sc5I39other").value !== "OTHERS" && $_Id("frm1702MX:txtPg6Sc5I39other").value !== "") {
            checkNullRow_OnBlur3("txtPg6Sc5I38other", "txtPg6Sc5I39other,txtPg6Sc5I39CA,txtPg6Sc5I39CB,txtPg6Sc5I39CC");
        }

        checkNullRow_OnBlur4("txtPg6Sc6I1description", "txtPg6Sc6I1legal", "txtPg6Sc6I2description,txtPg6Sc6I2legal,txtPg6Sc6I2CA,txtPg6Sc6I2CB,txtPg6Sc6I2CC");
        checkNullRow_OnBlur4("txtPg6Sc6I2description", "txtPg6Sc6I2legal", "txtPg6Sc6I3description,txtPg6Sc6I3legal,txtPg6Sc6I3CA,txtPg6Sc6I3CB,txtPg6Sc6I3CC");
        if ($_Id("frm1702MX:txtPg6Sc6I4description").value !== "OTHERS" && $_Id("frm1702MX:txtPg6Sc6I4description").value !== "") {
            checkNullRow_OnBlur4("txtPg6Sc6I3description", "txtPg6Sc6I3legal", "txtPg6Sc6I4description,txtPg6Sc6I4legal,txtPg6Sc6I4CA,txtPg6Sc6I4CB,txtPg6Sc6I4CC");
        }

        if (itemsFromModal > 0) {
            if (document.getElementById('frm1702MX:txtCtrmodalPg5Sc4I3').value > 0) {
                Save_modalTablePg5Sc4I3();
            }
            if (document.getElementById('frm1702MX:txtCtrmodalPg5Sc5I4').value > 0) {
                Save_modalTablePg5Sc5I4();
            }
            if (document.getElementById('frm1702MX:txtCtrmodalPg6Sc5I39').value > 0) {
                Save_modalTablePg6Sc5I39();
            }
            if (document.getElementById('frm1702MX:txtCtrmodalPg6Sc6').value > 0) {
                Save_modalTablePg6Sc6();
            }
        }
    }

    // Calls functions to recompute Schedule 1
    function recomputeSchedule1() {
        changeSpecialTaxRate();

        computePg3Sc1I1();
        computePg3Sc1I2();
        computePg3Sc1I4();
        computePg3Sc1I7();
        computePg3Sc1I6();
        computePg3Sc1I8();
        computePg3Sc1I12();
    }

    // For loading of saved file
    function loadAttachmentIterationData() {
        fileName = qs('xmlFileName');
        if (fileName != null && fileName.indexOf('.xml') > -1) {
            var response = document.getElementById("response");
            var modalAttachCounter = {};
            var counter = 0;

            if (totalEXArray.length > 0) {
                for (var i = 0; i < totalEXArray.length; i++) {
                    modalAttachCounter = $_Name("modal" + totalEXArray[i] + "Ctr");

                    if (modalAttachCounter.length > 0) {
                        for (var j = 0; j < modalAttachCounter.length; j++) {
                            if ((response.innerHTML).indexOf(modalAttachCounter[j].id) != -1 && j == 0) {
                                counter = (response.innerHTML).split(modalAttachCounter[j].id + "=")[1];
                                for (var k = 0; k < counter; k++) {
                                    disableField('txtPg3' + totalEXArray[i] + 'ScFI3other,txtPg3' + totalEXArray[i] + 'ScFI3C1');
                                    enableField('btnModalPg3' + totalEXArray[i] + 'ScF');
                                    AddRow_modalTablePg3MScF(totalEXArray[i]);
                                }
                            }
                            else if ((response.innerHTML).indexOf(modalAttachCounter[j].id) != -1 && j == 1) {
                                counter = (response.innerHTML).split(modalAttachCounter[j].id + "=")[1];
                                for (var k = 0; k < counter; k++) {
                                    disableField('txtPg3' + totalEXArray[i] + 'ScGI4other,txtPg3' + totalEXArray[i] + 'ScGI4C1');
                                    enableField('btnModalPg3' + totalEXArray[i] + 'ScGI4');
                                    AddRow_modalTablePg3MScGI4(totalEXArray[i]);
                                }
                            }
                            else if ((response.innerHTML).indexOf(modalAttachCounter[j].id) != -1 && j == 2) {
                                counter = (response.innerHTML).split(modalAttachCounter[j].id + "=")[1];
                                for (var k = 0; k < counter; k++) {
                                    disableField('txtPg4' + totalEXArray[i] + 'ScGI39other,txtPg4' + totalEXArray[i] + 'ScGI39C1');
                                    enableField('btnModalPg4' + totalEXArray[i] + 'ScGI39');
                                    AddRow_modalTablePg4MScGI39(totalEXArray[i]);
                                }
                            }
                            else if ((response.innerHTML).indexOf(modalAttachCounter[j].id) != -1 && j == 3) {
                                counter = (response.innerHTML).split(modalAttachCounter[j].id + "=")[1];
                                for (var k = 0; k < counter; k++) {
                                    disableField('txtPg4' + totalEXArray[i] + 'ScHI4C1,txtPg4' + totalEXArray[i] + 'ScHI4C2,txtPg4' + totalEXArray[i] + 'ScHI4C3');
                                    enableField('btnModalPg4' + totalEXArray[i] + 'ScHI4');
                                    AddRow_modalTablePg4MScHI4(totalEXArray[i]);
                                }
                            }
                        }
                    }
                }
            }

            if (totalSPArray.length > 0) {
                for (var i = 0; i < totalSPArray.length; i++) {
                    modalAttachCounter = $_Name("modal" + totalSPArray[i] + "Ctr");

                    if (modalAttachCounter.length > 0) {
                        for (var j = 0; j < modalAttachCounter.length; j++) {
                            if ((response.innerHTML).indexOf(modalAttachCounter[j].id) != -1 && j == 0) {
                                counter = (response.innerHTML).split(modalAttachCounter[j].id + "=")[1];
                                for (var k = 0; k < counter; k++) {
                                    disableField('txtPg3' + totalSPArray[i] + 'ScFI3other,txtPg3' + totalSPArray[i] + 'ScFI3C1');
                                    enableField('btnModalPg3' + totalSPArray[i] + 'ScF');
                                    AddRow_modalTablePg3MScF(totalSPArray[i]);
                                }
                            }
                            else if ((response.innerHTML).indexOf(modalAttachCounter[j].id) != -1 && j == 1) {
                                counter = (response.innerHTML).split(modalAttachCounter[j].id + "=")[1];
                                for (var k = 0; k < counter; k++) {
                                    disableField('txtPg3' + totalSPArray[i] + 'ScGI4other,txtPg3' + totalSPArray[i] + 'ScGI4C1');
                                    enableField('btnModalPg3' + totalSPArray[i] + 'ScGI4');
                                    AddRow_modalTablePg3MScGI4(totalSPArray[i]);
                                }
                            }
                            else if ((response.innerHTML).indexOf(modalAttachCounter[j].id) != -1 && j == 2) {
                                counter = (response.innerHTML).split(modalAttachCounter[j].id + "=")[1];
                                for (var k = 0; k < counter; k++) {
                                    disableField('txtPg4' + totalSPArray[i] + 'ScGI39other,txtPg4' + totalSPArray[i] + 'ScGI39C1');
                                    enableField('btnModalPg4' + totalSPArray[i] + 'ScGI39');
                                    AddRow_modalTablePg4MScGI39(totalSPArray[i]);
                                }
                            }
                            else if ((response.innerHTML).indexOf(modalAttachCounter[j].id) != -1 && j == 3) {
                                counter = (response.innerHTML).split(modalAttachCounter[j].id + "=")[1];
                                for (var k = 0; k < counter; k++) {
                                    disableField('txtPg4' + totalSPArray[i] + 'ScHI4C1,txtPg4' + totalSPArray[i] + 'ScHI4C2,txtPg4' + totalSPArray[i] + 'ScHI4C3');
                                    enableField('btnModalPg4' + totalSPArray[i] + 'ScHI4');
                                    AddRow_modalTablePg4MScHI4(totalSPArray[i]);
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    function saveAttachmentIterationData() {
        var modalAttachCounter = {};

        if (totalEXArray.length > 0) {
            for (var i = 0; i < totalEXArray.length; i++) {
                modalAttachCounter = $_Name("modal" + totalEXArray[i] + "Ctr");

                if (modalAttachCounter.length > 0) {
                    for (var j = 0; j < modalAttachCounter.length; j++) {
                        if (j === 0 && modalAttachCounter[j].value > 0) {
                            Save_modalTablePg3MScF(totalEXArray[i]);
                        }
                        else if (j === 1 && modalAttachCounter[j].value > 0) {
                            Save_modalTablePg3MScGI4(totalEXArray[i]);
                        }
                        else if (j === 2 && modalAttachCounter[j].value > 0) {
                            Save_modalTablePg4MScGI39(totalEXArray[i]);
                        }
                        else if (j === 3 && modalAttachCounter[j].value > 0) {
                            Save_modalTablePg4MScHI4(totalEXArray[i]);
                        }

                        // Schedule F Modal
                        checkNullRow_OnBlur3('txtPg3' + totalEXArray[i] + 'ScFI1other', 'txtPg3' + totalEXArray[i] + 'ScFI2other,txtPg3' + totalEXArray[i] + 'ScFI2C1');
                        checkNullRow_OnBlur3('txtPg3' + totalEXArray[i] + 'ScFI2other', 'txtPg3' + totalEXArray[i] + 'ScFI3other,txtPg3' + totalEXArray[i] + 'ScFI3C1');
                        // Schedule G Modal (Amortizations)
                        checkNullRow_OnBlur3('txtPg3' + totalEXArray[i] + 'ScGI2other', 'txtPg3' + totalEXArray[i] + 'ScGI3other,txtPg3' + totalEXArray[i] + 'ScGI3C1');
                        checkNullRow_OnBlur3('txtPg3' + totalEXArray[i] + 'ScGI3other', 'txtPg3' + totalEXArray[i] + 'ScGI4other,txtPg3' + totalEXArray[i] + 'ScGI4C1');
                        // Schedule G Modal (Others)
                        checkNullRow_OnBlur3('txtPg4' + totalEXArray[i] + 'ScGI36other', 'txtPg4' + totalEXArray[i] + 'ScGI37other,txtPg4' + totalEXArray[i] + 'ScGI37C1');
                        checkNullRow_OnBlur3('txtPg4' + totalEXArray[i] + 'ScGI37other', 'txtPg4' + totalEXArray[i] + 'ScGI38other,txtPg4' + totalEXArray[i] + 'ScGI38C1');
                        checkNullRow_OnBlur3('txtPg4' + totalEXArray[i] + 'ScGI38other', 'txtPg4' + totalEXArray[i] + 'ScGI39other,txtPg4' + totalEXArray[i] + 'ScGI39C1');
                        // Schedule H Modal
                        checkNullRow_OnBlur4('txtPg4' + totalEXArray[i] + 'ScHI1C1', 'txtPg4' + totalEXArray[i] + 'ScHI1C2', 'txtPg4' + totalEXArray[i] + 'ScHI2C1,txtPg4' + totalEXArray[i] + 'ScHI2C2,txtPg4' + totalEXArray[i] + 'ScHI2C3');
                        checkNullRow_OnBlur4('txtPg4' + totalEXArray[i] + 'ScHI2C1', 'txtPg4' + totalEXArray[i] + 'ScHI2C2', 'txtPg4' + totalEXArray[i] + 'ScHI3C1,txtPg4' + totalEXArray[i] + 'ScHI3C2,txtPg4' + totalEXArray[i] + 'ScHI3C3');
                        checkNullRow_OnBlur4('txtPg4' + totalEXArray[i] + 'ScHI3C1', 'txtPg4' + totalEXArray[i] + 'ScHI3C2', 'txtPg4' + totalEXArray[i] + 'ScHI4C1,txtPg4' + totalEXArray[i] + 'ScHI4C2,txtPg4' + totalEXArray[i] + 'ScHI4C3');

                        populatePg1AttachScBI11(totalEXArray[i]);
                    }
                }
            }
        }

        if (totalSPArray.length > 0) {
            for (var i = 0; i < totalSPArray.length; i++) {
                modalAttachCounter = $_Name("modal" + totalSPArray[i] + "Ctr");

                if (modalAttachCounter.length > 0) {
                    for (var j = 0; j < modalAttachCounter.length; j++) {
                        if (j === 0 && modalAttachCounter[j].value > 0) {
                            Save_modalTablePg3MScF(totalSPArray[i]);
                        }
                        else if (j === 1 && modalAttachCounter[j].value > 0) {
                            Save_modalTablePg3MScGI4(totalSPArray[i]);
                        }
                        else if (j === 2 && modalAttachCounter[j].value > 0) {
                            Save_modalTablePg4MScGI39(totalSPArray[i]);
                        }
                        else if (j === 3 && modalAttachCounter[j].value > 0) {
                            Save_modalTablePg4MScHI4(totalSPArray[i]);
                        }

                        // Schedule F Modal
                        checkNullRow_OnBlur3('txtPg3' + totalSPArray[i] + 'ScFI1other', 'txtPg3' + totalSPArray[i] + 'ScFI2other,txtPg3' + totalSPArray[i] + 'ScFI2C1');
                        checkNullRow_OnBlur3('txtPg3' + totalSPArray[i] + 'ScFI2other', 'txtPg3' + totalSPArray[i] + 'ScFI3other,txtPg3' + totalSPArray[i] + 'ScFI3C1');
                        // Schedule G Modal (Amortizations)
                        checkNullRow_OnBlur3('txtPg3' + totalSPArray[i] + 'ScGI2other', 'txtPg3' + totalSPArray[i] + 'ScGI3other,txtPg3' + totalSPArray[i] + 'ScGI3C1');
                        checkNullRow_OnBlur3('txtPg3' + totalSPArray[i] + 'ScGI3other', 'txtPg3' + totalSPArray[i] + 'ScGI4other,txtPg3' + totalSPArray[i] + 'ScGI4C1');
                        // Schedule G Modal (Others)
                        checkNullRow_OnBlur3('txtPg4' + totalSPArray[i] + 'ScGI36other', 'txtPg4' + totalSPArray[i] + 'ScGI37other,txtPg4' + totalSPArray[i] + 'ScGI37C1');
                        checkNullRow_OnBlur3('txtPg4' + totalSPArray[i] + 'ScGI37other', 'txtPg4' + totalSPArray[i] + 'ScGI38other,txtPg4' + totalSPArray[i] + 'ScGI38C1');
                        checkNullRow_OnBlur3('txtPg4' + totalSPArray[i] + 'ScGI38other', 'txtPg4' + totalSPArray[i] + 'ScGI39other,txtPg4' + totalSPArray[i] + 'ScGI39C1');
                        // Schedule H Modal
                        checkNullRow_OnBlur4('txtPg4' + totalSPArray[i] + 'ScHI1C1', 'txtPg4' + totalSPArray[i] + 'ScHI1C2', 'txtPg4' + totalSPArray[i] + 'ScHI2C1,txtPg4' + totalSPArray[i] + 'ScHI2C2,txtPg4' + totalSPArray[i] + 'ScHI2C3');
                        checkNullRow_OnBlur4('txtPg4' + totalSPArray[i] + 'ScHI2C1', 'txtPg4' + totalSPArray[i] + 'ScHI2C2', 'txtPg4' + totalSPArray[i] + 'ScHI3C1,txtPg4' + totalSPArray[i] + 'ScHI3C2,txtPg4' + totalSPArray[i] + 'ScHI3C3');
                        checkNullRow_OnBlur4('txtPg4' + totalSPArray[i] + 'ScHI3C1', 'txtPg4' + totalSPArray[i] + 'ScHI3C2', 'txtPg4' + totalSPArray[i] + 'ScHI4C1,txtPg4' + totalSPArray[i] + 'ScHI4C2,txtPg4' + totalSPArray[i] + 'ScHI4C3');

                        populatePg1AttachScBI11(totalSPArray[i]);
                    }
                }
            }
        }
    }
    function validateMonth(elem) {
        if ((elem.value !== "") && (((elem.value * 1) < 1) || ((elem.value * 1) > 12))) {
            alert("Please provide a valid date.");
            elem.value = "";
            elem.focus();
        }
    }

    function validatePg1Pt2I22(isFromLoad) {
        var isCTC = $_Id("frm1702MX:rdoPg1Pt2I22CTC").checked;
        var isSEC = $_Id("frm1702MX:rdoPg1Pt2I22SEC").checked;

        if (!isFromLoad) {
            $("input[id$='txtPg1Pt2I23Date']").val("");
            $("input[id$='txtPg1Pt2I22']").val("");
        }

        if (!!isCTC) {
            $("input[id$='txtPg1Pt2I22']").attr("maxlength", "8");
            $_Id("frm1702MX:txtPg1Pt2I22").onkeypress = function () { return wholenumber(event, false); };
            $_Id("frm1702MX:txtPg1Pt2I25AmountCTC").disabled = false;
        }
        else if (!!isSEC) {
            $("input[id$='txtPg1Pt2I22']").attr("maxlength", "10");
            $_Id("frm1702MX:txtPg1Pt2I22").onkeypress = function () { return Code(this); };
            $_Id("frm1702MX:txtPg1Pt2I25AmountCTC").value = 0;
            $_Id("frm1702MX:txtPg1Pt2I25AmountCTC").disabled = true;
        }
    }

    function compareFutureDate(elem, from, to) {
        from = $_Id("frm1702MX:txtPg2Pt4I" + from);
        to = $_Id("frm1702MX:txtPg2Pt4I" + to);

        // To date should be greater than or equal From date
        if ((validateFutureDate(from) && validateFutureDate(to)) && ("" !== (from.value && to.value))) {
            var fromDate = new Date(from.value);
            var toDate = new Date(to.value);

            if (toDate < fromDate) {
                alert("To date should be greater than or equal From date");
                elem.value = "";
                elem.focus();
            }
        }
    }

    function compareDate(elem, from, to) {
        from = $_Id("frm1702MX:txtPg2Pt4I" + from);
        to = $_Id("frm1702MX:txtPg2Pt4I" + to);

        // To date should be greater than or equal From date
        if ((validateDate(from) && validateDate(to)) && ("" !== (from.value && to.value))) {
            var fromDate = new Date(from.value);
            var toDate = new Date(to.value);

            if (toDate < fromDate) {
                alert("To date should be greater than or equal From date");
                elem.value = "";
                elem.focus();
            }
        }
    }

    function validateEmail() {
        var mailformat = /\b[a-zA-Z0-9._%+-]+@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}\b/;
        //var mailformat = /^\w+@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/;
        if ($_Id('frm1702MX:txtPg1Pt1I12Email').value.match(mailformat) || $_Id('frm1702MX:txtPg1Pt1I12Email').value == '') {
            return;
        }
        else
            alert("You have entered an invalid email address format!");
        $_Id('frm1702MX:txtPg1Pt1I12Email').value = '';
        $_Id('frm1702MX:txtPg1Pt1I12Email').focus();
    }

    function validateDateOfIssueItem23() {
        var strmmddyyyy = $_Id("frm1702MX:txtPg1Pt2I23Date").value;
        var selectedItem22 = !!($_Id("frm1702MX:rdoPg1Pt2I22CTC").checked) ? "CTC" : "SEC";

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

            if (!isValid) {
                alert('Please provide a valid date. (MM/DD/YYYY format)');
                $_Id("frm1702MX:txtPg1Pt2I23Date").value = '';
                $_Id("frm1702MX:txtPg1Pt2I23Date").focus();
            }
            else if (inputDate > currentDate) {
                alert('This date cannot be a future date.');
                $_Id("frm1702MX:txtPg1Pt2I23Date").value = '';
                $_Id("frm1702MX:txtPg1Pt2I23Date").focus();
            }
            else if ((result[2] !== currentDate.getFullYear().toString()) && (selectedItem22 === "CTC")) {
                alert('CTC year should be ' + currentDate.getFullYear() + ' only (Page 1 Item 23).');
                $_Id("frm1702MX:txtPg1Pt2I23Date").value = '';
                $_Id("frm1702MX:txtPg1Pt2I23Date").focus();
            }
        }

        return isValid;
    }

    function validateIssueDateSchedule13(element) {
        if (!!validateDate(element) && ($.trim(element.value) !== "")) {
            var issueDate = new Date(element.value),
                filingDate = new Date((2000 + ($_Id("frm1702MX:txtPg1I2YearEnd").value * 1)), ($_Id("frm1702MX:ddlPg1I2Date").value * 1), 0),
                validDate = new Date((2000 + ($_Id("frm1702MX:txtPg1I2YearEnd").value * 1)), ($_Id("frm1702MX:ddlPg1I2Date").value * 1), 1),
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

    function validateDate(element) {
        var strmmddyyyy = element.value;
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
        }

        return isValid;
    }

    function validateFutureDate(element, checkPastDate) {
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

            if (!isValid) {
                alert('Please provide a valid date. (MM/DD/YYYY format)');
                element.value = '';
                element.focus();
            }
            else if ((typeof (checkPastDate) !== "undefined") && (!!checkPastDate) && (inputDate <= currentDate)) {
                isValid = false;
            }
        }

        return isValid;
    }

    function checkOverPayment() {
        var isValid = true;
        var refundChecked = $_Id('frm1702MX:rdoPg1Pt2I21Refund').checked;
        var issueTCCChecked = $_Id('frm1702MX:rdoPg1Pt2I21IssueTCC').checked;
        var carriedOverChecked = $_Id('frm1702MX:rdoPg1Pt2I21CarriedOver').checked;

        var isOverPayment = 0 > NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg1Pt2I20TotalAmount").value));

        if ((!!isOverPayment) && (!refundChecked && !issueTCCChecked && !carriedOverChecked)) {
            alert("Please select an Overpayment option (Page 1 Part II Item 21).");

            isValid = false;
        }

        return isValid;
    }

    function validateYearEnd() {
        var element = $_Id("frm1702MX:txtPg1I2YearEnd");
        var inputYear = 2000 + (element.value * 1);
        var inputMonth = ($_Id('frm1702MX:ddlPg1I2Date').value * 1) - 1;
        var currentDate = new Date();
        var isValid = true;

        if (element.value !== "") {
            if (($_Id("frm1702MX:rdoPg1I1Fiscal").checked === true) &&
                (inputYear > currentDate.getFullYear() || (inputMonth > currentDate.getMonth() && inputYear === currentDate.getFullYear()))) {
                alert('Date (Page 1 Item 2) cannot be greater than current date when filing for Fiscal Year.');
                element.value = '';
                element.select();
                isValid = false;
            }
            else if ($_Id("frm1702MX:rdoPg1I1Fiscal").checked === true && inputMonth == 11) {
                alert('Date (Page 1 Item 2) Month cannot be equal to December.');
                $_Id('frm1702MX:ddlPg1I2Date').value = "";
                $_Id('frm1702MX:ddlPg1I2Date').focus();
                isValid = false;
            }
            // MONTH: JANUARY = 0, FEBRUARY = 1, MARCH = 2 ... NOVEMBER = 10, DECEMBER = 11
            else if ((inputYear < 2013) || (inputYear <= 2013 && (inputMonth < 8))) {
                alert("Date (Page 1 Item 2) should not be earlier than September 2013.");
                if (inputYear < 2013 || $_Id('frm1702MX:ddlPg1I2Date').disabled === true) {
                    element.value = '';
                    element.select();
                }
                else {
                    $_Id('frm1702MX:ddlPg1I2Date').focus();
                }

                isValid = false;
            }
            else if (($_Id("frm1702MX:rdoPg1I1Calendar").checked === true)) {
                if (($_Id("frm1702MX:rdoPg1I4ShortPeriodNo").checked === true) && (inputYear >= currentDate.getFullYear())) {
                    alert('Year (Page 1 Item 2) cannot be greater than or equal to current year when filing for Calendar Year.');
                    element.value = '';
                    element.select();
                    isValid = false;
                }
                else if (($_Id("frm1702MX:rdoPg1I4ShortPeriodYes").checked === true)) {
                    if ((inputYear > currentDate.getFullYear())) {
                        alert('Year (Page 1 Item 2) cannot be greater than the current year when filing for Calendar Year.');
                        element.value = '';
                        element.select();
                        isValid = false;
                    }
                    else if ((inputYear === currentDate.getFullYear()) && (inputMonth > currentDate.getMonth())) {
                        alert('Month (Page 1 Item 2) cannot be greater than  current month date when filing for Calendar Year  and  Short Period Return.');
                        $_Id('frm1702MX:ddlPg1I2Date').value = '';
                        $_Id('frm1702MX:ddlPg1I2Date').focus();
                        isValid = false;
                    }
                    else if ((inputYear === currentDate.getFullYear()) && (inputMonth == 11)) {
                        alert('Month (Page 1 Item 2) cannot be equal to december  when filing for Calendar Year and  Short Period Return.');
                        $_Id('frm1702MX:ddlPg1I2Date').value = '';
                        $_Id('frm1702MX:ddlPg1I2Date').focus();
                        isValid = false;
                    }
                    else if (inputMonth < 0) {
                        alert('(Page 1 Item 2) Month is invalid.');
                        $_Id('frm1702MX:ddlPg1I2Date').focus();
                        isValid = false;
                    }
                }
            }


            //checkDateOfIncorporation();
            computePg6Sc7AI4();
        }
        else if (element.value === "") {
            alert("This field cannot be empty.");
            element.select();
        }

        if (element.value !== '' && (element.value * 1) > -1 && (element.value * 1) < 10) {
            element.value = '0' + element.value * 1;
        }

        return isValid;
    }

    function checkFilingYear() {
        var txtYearEnd = $_Id("frm1702MX:txtPg1I2YearEnd");
        var ddlDate = $_Id('frm1702MX:ddlPg1I2Date');
        var currentDate = new Date();

        var isAmendedReturn = $_Id("frm1702MX:rdoPg1I3AmendedYes").checked; // If Amended Return Yes option is selected, set to true else false
        var isShortPeriod = $_Id("frm1702MX:rdoPg1I4ShortPeriodYes").checked;   // If Short Period Return Yes option is selected, set to true else false

        // CALENDAR YEAR
        if ($_Id("frm1702MX:rdoPg1I1Calendar").checked === true) {
            // If Short Period Return is No and Amended Return is No for 1701,1702 EX,MX and RT
            // then default to December + <Current Year - 1>
            // make non-editable or have validation to not proceed if not met
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
        else if ($_Id("frm1702MX:rdoPg1I1Fiscal").checked === true) {
            ddlDate.options[0].selected = true;
            ddlDate.disabled = false;
            ddlDate.focus();

            txtYearEnd.disabled = false;
            txtYearEnd.value = "";
        }
    }
    function checkDateOfIncorporation() {
        var element = $_Id("frm1702MX:txtPg1Pt1I8");
        var isValid = true;

        if (!!validateDate(element) && ($.trim(element.value) !== "")) {
            var elemValue = element.value.split("/");
            var incorpDate = new Date(elemValue[2], (elemValue[0] - 1), elemValue[1]);

            var incorpMonth = elemValue[0] * 1;
            var incorpYear = elemValue[2] * 1;
            var filingMonth = $_Id("frm1702MX:ddlPg1I2Date").value * 1;
            var filingYear = 2000 + ($_Id("frm1702MX:txtPg1I2YearEnd").value * 1);
            var filingDate = new Date(filingYear, (filingMonth - 1), 1);

            var elapsedTime = (filingDate.getTime() - incorpDate.getTime()) / 31536000000;

            var filingDateIsEmpty = ((($.trim($_Id("frm1702MX:ddlPg1I2Date").value)) || ($.trim($_Id("frm1702MX:txtPg1I2YearEnd").value))) === "");

            if (!filingDateIsEmpty && ((incorpYear > filingYear) || ((incorpMonth > filingMonth) && (incorpYear === filingYear)))) {
                alert("Date of Incorporation cannot be greater than Page 1 Item 2 Date.");
                element.value = "";
                element.focus();

                isValid = false;
            }
            else if (((filingYear - incorpYear) === 4) && ($_Id("frm1702MX:chkPg1I5ATCR1").checked === false)) {
                alert("The Year of Incorporation is " + incorpYear + ", ATC - IC 055 of Page 1 Item will be marked.");
                $_Id("frm1702MX:chkPg1I5ATCR1").checked = true;
                
            }
                //else if ((elapsedTime < 4) && ($_Id("frm1702MX:chkPg1I5ATCR1").checked === true)) {
            else if (((filingYear - incorpYear) < 4) && ($_Id("frm1702MX:chkPg1I5ATCR1").checked === true)) {
                alert("Less than 4 years has passed since Date of Incorporation and the Filing Year, the mark in ATC - IC 055 of Page 1 Item 5 will be removed.");
                $_Id("frm1702MX:chkPg1I5ATCR1").checked = false;
                

                isValid = false;
            }
            else if ((elapsedTime >= 4) && ($_Id("frm1702MX:chkPg1I5ATCR1").checked === false)) {
                alert("It has been 4 years or more since the Date of Incorporation and the Filing Year, ATC - IC 055 of Page 1 Item will be marked.");
                $_Id("frm1702MX:chkPg1I5ATCR1").checked = true;
                
            }
        }
        else if ($.trim(element.value) === "") {
            isValid = false;
        }

        computePg3Sc1I15();
        enableMCITFields();

        return isValid;
    }

    function checkPg2Pt6I5051(elem) {
        var item50 = $_Id('frm1702MX:txtPg2Pt6I50IssueDate'),
            item51 = $_Id('frm1702MX:txtPg2Pt6I51ExpiryDate'),
            item50value = $.trim(item50.value),
            item51value = $.trim(item51.value);

        if (!!validateFutureDate(item50) && ((item50value !== "") && (item51value === ""))) {
            var elemValue = item50.value.split("/");

            item51.value = "";
            elemValue[2] = parseInt(elemValue[2]) + 3;
            elemValue = elemValue.join("/");
            item51.value = elemValue;

            if (!validateFutureDate(item51, true)) {
                alert("Expiry Date (Page 2 Part VI Item 51) cannot be a past date.");
                item50.value = "";
                item51.value = "";
                item50.focus();
            }
        }
        else if (!!validateFutureDate(item51, true) && ((item50value === "") && (item51value !== ""))) {
            alert("Page 2 Part VI Item 50 (Issue Date) must have a valid date before entering a Date of Expiry (Item 51).");
            item50.value = "";
            item51.value = "";
            item50.focus();
        }
        else if ((!!validateFutureDate(item50) && !!validateFutureDate(item51, true)) && ((item50value !== "") && (item51value !== ""))) {
            var issueDate = new Date(item50.value);
            var expiryDate = new Date(item51.value);

            if (issueDate.getYear() >= expiryDate.getYear()) {
                alert("Page 2 Part VI Item 51 (Expiry Date) should not be lower than or equal to Issue Date (Item 50).");
                elem.value = "";
                elem.focus();
            }
            else if (((expiryDate.getYear() - issueDate.getYear()) > 3) || ((expiryDate.getMonth() > issueDate.getMonth()) && ((expiryDate.getYear() - issueDate.getYear()) === 3))) {
                alert("Page 2 Part VI Item 51 (Expiry Date) should not be greater than 3 years from Issue Date (Item 50).");
                item51.value = "";
                item51.focus();
            }
        }
        if (!validateFutureDate(item51, true)) {
            alert("Expiry Date (Page 2 Part VI Item 51) cannot be a past date.");
            item51.value = "";
            item51.focus();
        }
    }

    function checkSc1I10EqualSc10I10() {
        var isValid = true;
        var counter = 0;

        if ($_Id("frm1702MX:txtPg3Sc1I10CA").value !== $_Id("frm1702MX:txtPg7Sc10I10CA").value) {
            counter++;
        }
        if ($_Id("frm1702MX:txtPg3Sc1I10CB").value !== $_Id("frm1702MX:txtPg7Sc10I10CB").value) {
            counter++;
        }
        if ($_Id("frm1702MX:txtPg3Sc1I10CC").value !== $_Id("frm1702MX:txtPg7Sc10I10CC").value) {
            counter++;
        }

        if (counter > 0) {
            alert("Page 3 Schedule 1 Item 10 Columns A, B, C & D must be equal to Page 7 Schedule 10 Item 10 Columns A, B, C & D.");

            isValid = false;
        }

        return isValid;
    }

    function checkCTCSEC() {
        var isValid = true;
        var errorList = [];

        // Page 1 Part II Item 22
        if (($_Id('frm1702MX:rdoPg1Pt2I22CTC').checked === false) && ($_Id('frm1702MX:rdoPg1Pt2I22SEC').checked === false)) {
            errorList.push('Please select an item (CTC or SEC Reg. No.) on Page 1 Part II Item 22.');
        }
        // Page 1 Part II Item 22
        if ($_Id('frm1702MX:txtPg1Pt2I22').value === '') {
            errorList.push('Please provide a value for Page 1 Part II Item 22.');
        }
        // Page 1 Part II Item 23
        if ($_Id('frm1702MX:txtPg1Pt2I23Date').value === '') {
            errorList.push('Please provide a Date of Issue for Page 1 Part II Item 23.');
        }
        // Page 1 Part II Item 24
        if ($_Id('frm1702MX:txtPg1Pt2I24PlaceofIssue').value === '') {
            errorList.push('Please provide a Place of Issue for Page 1 Part II Item 24.');
        }
        // Page 1 Part II Item 25
        if (($_Id('frm1702MX:txtPg1Pt2I25AmountCTC').value === '0') && ($_Id('frm1702MX:rdoPg1Pt2I22CTC').checked === true)) {
            errorList.push('Please provide a valid amount for CTC (Page 1 Part II Item 25).');
        }

        if (errorList.length > 0) {
            isValid = false;
            alert(errorList[0]);
        }

        return isValid;
    }

    function validateDetailsOfPayment() {
        var isValid = true;

        var totalPayment = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg1Pt1I26CashC4").value)) + NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg1Pt1I27CheckC4").value))
                            + NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg1Pt1I28TaxDebitC4").value)) + NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg1Pt1I29OthersC4").value));
        var amountPayable = NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg1Pt2I20TotalAmount").value));

        //if ((amountPayable < 0) && (totalPayment > 0)) {
        //  alert("TOTAL AMOUNT PAYABLE is Overpayment, please clear Details of Payment.");
        //  
        //  isValid = false;
        //} else
        if (validate_nullDescription("txtPg1Pt1I26CashC4", "txtPg1Pt1I26CashC1,txtPg1Pt1I26CashC2,txtPg1Pt1I26CashC3", "Page 1 Part III Item 26") === false) {
            isValid = false;
        }
        else if (validate_nullDescription("txtPg1Pt1I27CheckC4", "txtPg1Pt1I27CheckC1,txtPg1Pt1I27CheckC2,txtPg1Pt1I27CheckC3", "Page 1 Part III Item 27") === false) {
            isValid = false;
        }
        else if (validate_nullDescription("txtPg1Pt1I28TaxDebitC4", "txtPg1Pt1I28TaxDebitC2,txtPg1Pt1I28TaxDebitC3", "Page 1 Part III Item 28") === false) {
            isValid = false;
        }
        else if (validate_nullDescription("txtPg1Pt1I29OthersC4", "txtPg1Pt1I29OthersC1,txtPg1Pt1I29OthersC2,txtPg1Pt1I29OthersC3,txtPg1Pt1I29Others", "Page 1 Part III Item 29") === false) {
            isValid = false;
        }
        else if ((totalPayment > 0) && (amountPayable > 0) && (totalPayment !== amountPayable)) {
            alert("Sum of Amount fields in Details of Payment (Page 1 Part III Items 26-29) Segment must be equal to TOTAL AMOUNT PAYABLE (Page 1 Part II Item 20)");

            isValid = false;
        }

        return isValid;
    }

    function validateNOLCOYear(elem) {
        var nolcoYear = $.trim(elem.value) * 1;
        var filingYear = 2000 + ($_Id("frm1702MX:txtPg1I2YearEnd").value * 1);
        var isValid = true;
        
        // 2015/07/20 Added "RA9513" and "9513" EFPS-CR-0004-1702MX Nolco
        var isRA9513and10Percent = false;
        
        if (!!(elem.id.indexOf("SP") > -1)) {
            // Get attachNum
            var attachNum = parseInt(elem.id.substring(elem.id.indexOf("SP") + 2));
            var specialTaxRateItem4 = $_Id("frm1702MX:txtPg1SP" + attachNum + "ScAI4").value;
            var specialTaxRateIPA = $_Id("frm1702MX:txtPg1SP" + attachNum + "ScAI1").value.toUpperCase();
            var specialTaxRateLegalBasis = $_Id("frm1702MX:txtPg1SP" + attachNum + "ScAI2").value.toUpperCase().replace(/[\. ]/g, '');
            
            isRA9513and10Percent = ((((specialTaxRateIPA.replace(/[\. ]/g, '') === "RA9513") || (specialTaxRateIPA.replace(/[\. ]/g, '') === "9513")) || ((specialTaxRateLegalBasis === "RA9513") || (specialTaxRateLegalBasis === "9513"))) && ((specialTaxRateItem4 * 1) === 10));
        }
                
        // Date of Incorporation must be provided before adding NOLCO year for validation
        if (($.trim(elem.value) !== "") && checkDateOfIncorporation() && (filingYear !== 2000)) {
            var incorpYear = ($_Id("frm1702MX:txtPg1Pt1I8").value.split("/")[2] * 1);
            var nolcoYears = $_Name(elem.name);
            var dup = 0;

            // Get values in Year Incurred fields
            for (var i = 0; i < nolcoYears.length; i++) {
                if (nolcoYears[i].value === elem.value) {
                    dup++;
                }
            }
            
            // Cannot have duplicates
            if (dup > 1) {
                alert("Year Incurred cannot have duplicates.");

                elem.value = "";
                elem.focus();

                isValid = false;
            }
            // 2015/07/20 Added "RA9513" and "9513" EFPS-CR-0004-1702MX Nolco
            else if ((!!isRA9513and10Percent) && (nolcoYear < (filingYear - 7))) {
                alert("The NOLCO of RE developers can only be carried over as a deduction from gross income for the next seven (7) consecutive taxable years immediately following the year of such loss pursuant to Sec.15(d) of the Renewable Energy Act of 2008 (RA 9513).");
                
                elem.value = "";
                elem.focus();

                isValid = false;
            }
                // Minimum Year Incurred is current year - 3
                // Maximum Year Incurred is current year - 1
            else if ((!isRA9513and10Percent) && ((nolcoYear >= filingYear) || (nolcoYear < (filingYear - 3)))) {
                alert("Please enter a value for the year between " + (filingYear - 3) + " and " + (filingYear - 1) + ".");

                elem.value = "";
                elem.focus();

                isValid = false;
            }
                // Year Incurred cannot be lower than Date (year) of Incorporation
            else if (nolcoYear < incorpYear) {
                alert("Year incurred cannot be lower than Year of Incorporation [" + incorpYear + "] (Page 1 Item 8).");

                elem.value = "";
                elem.focus();

                isValid = false;
            }
            else if (nolcoYear >= filingYear) {
                alert("Year incurred cannot be greater than or equal to Filing Year [" + filingYear + "] (Page 1 Item 2).");

                elem.value = "";
                elem.focus();

                isValid = false;
            }
        }
        else if (filingYear === 2000) {
            alert("Please provide Filing Year (Page 1 Item 2) before providing Year Incurred for NOLCO.");
            elem.value = "";

            changeView(false);
            changeCurrentPage(1);
        }
        else if (checkDateOfIncorporation() === false) {
            alert("Please provide Date of Incorporation (Page 1 Item 8) before providing Year Incurred for NOLCO.");
            elem.value = "";

            changeView(false);
            changeCurrentPage(1);
        }

        return isValid;
    }

    function validateMCITYear(elem) {
        var mcitYear = $.trim(elem.value) * 1;
        var returnPeriodYear = 2000 + ($_Id("frm1702MX:txtPg1I2YearEnd").value * 1);
        var isValid = true;

        if (($.trim(elem.value) !== "") && checkDateOfIncorporation() && (returnPeriodYear !== 2000)) {
            var incorpYear = ($_Id("frm1702MX:txtPg1Pt1I8").value.split("/")[2] * 1);
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

    function validateNOLCOAttachments() {
        var isValid = true;

        if ((totalEXArray.length > 0) || (totalSPArray.length > 0)) {
            if (totalEXArray.length > 0) {
                for (var i = 0; i < totalEXArray.length; i++) {
                    if (validate_nullDescription('txtPg4' + totalEXArray[i] + 'ScIAI4CA,txtPg4' + totalEXArray[i] + 'ScIAI4CB,txtPg4' + totalEXArray[i] + 'ScIAI4CC,txtPg4' + totalEXArray[i] + 'ScIAI4CD', 'txtPg4' + totalEXArray[i] + 'ScIAI4year', 'EXEMPT Attachment ' + (i + 1) + ' Page 4 Schedule IA Item 4') === false) {
                        isValid = false;
                        break;
                    }
                    if (validate_nullDescription('txtPg4' + totalEXArray[i] + 'ScIAI5CA,txtPg4' + totalEXArray[i] + 'ScIAI5CB,txtPg4' + totalEXArray[i] + 'ScIAI5CC,txtPg4' + totalEXArray[i] + 'ScIAI5CD', 'txtPg4' + totalEXArray[i] + 'ScIAI5year', 'EXEMPT Attachment ' + (i + 1) + ' Page 4 Schedule IA Item 5') === false) {
                        isValid = false;
                        break;
                    }
                    if (validate_nullDescription('txtPg4' + totalEXArray[i] + 'ScIAI6CA,txtPg4' + totalEXArray[i] + 'ScIAI6CB,txtPg4' + totalEXArray[i] + 'ScIAI6CC,txtPg4' + totalEXArray[i] + 'ScIAI6CD', 'txtPg4' + totalEXArray[i] + 'ScIAI6year', 'EXEMPT Attachment ' + (i + 1) + ' Page 4 Schedule IA Item 6') === false) {
                        isValid = false;
                        break;
                    }
                    if (validate_nullDescription('txtPg4' + totalEXArray[i] + 'ScIAI7CA,txtPg4' + totalEXArray[i] + 'ScIAI7CB,txtPg4' + totalEXArray[i] + 'ScIAI7CC,txtPg4' + totalEXArray[i] + 'ScIAI7CD', 'txtPg4' + totalEXArray[i] + 'ScIAI7year', 'EXEMPT Attachment ' + (i + 1) + ' Page 4 Schedule IA Item 7') === false) {
                        isValid = false;
                        break;
                    }
                }
            }
            else if (totalSPArray.length > 0) {
                for (var i = 0; i < totalSPArray.length; i++) {
                    if (validate_nullDescription('txtPg4' + totalSPArray[i] + 'ScIAI4CA,txtPg4' + totalSPArray[i] + 'ScIAI4CB,txtPg4' + totalSPArray[i] + 'ScIAI4CC,txtPg4' + totalSPArray[i] + 'ScIAI4CD', 'txtPg4' + totalSPArray[i] + 'ScIAI4year', 'SPECIAL RATE Attachment ' + (i + 1) + ' Page 4 Schedule IA Item 4') === false) {
                        isValid = false;
                        break;
                    }
                    if (validate_nullDescription('txtPg4' + totalSPArray[i] + 'ScIAI5CA,txtPg4' + totalSPArray[i] + 'ScIAI5CB,txtPg4' + totalSPArray[i] + 'ScIAI5CC,txtPg4' + totalSPArray[i] + 'ScIAI5CD', 'txtPg4' + totalSPArray[i] + 'ScIAI5year', 'SPECIAL RATE Attachment ' + (i + 1) + ' Page 4 Schedule IA Item 5') === false) {
                        isValid = false;
                        break;
                    }
                    if (validate_nullDescription('txtPg4' + totalSPArray[i] + 'ScIAI6CA,txtPg4' + totalSPArray[i] + 'ScIAI6CB,txtPg4' + totalSPArray[i] + 'ScIAI6CC,txtPg4' + totalSPArray[i] + 'ScIAI6CD', 'txtPg4' + totalSPArray[i] + 'ScIAI6year', 'SPECIAL RATE Attachment ' + (i + 1) + ' Page 4 Schedule IA Item 6') === false) {
                        isValid = false;
                        break;
                    }
                    if (validate_nullDescription('txtPg4' + totalSPArray[i] + 'ScIAI7CA,txtPg4' + totalSPArray[i] + 'ScIAI7CB,txtPg4' + totalSPArray[i] + 'ScIAI7CC,txtPg4' + totalSPArray[i] + 'ScIAI7CD', 'txtPg4' + totalSPArray[i] + 'ScIAI7year', 'SPECIAL RATE Attachment ' + (i + 1) + ' Page 4 Schedule IA Item 7') === false) {
                        isValid = false;
                        break;
                    }
                }
            }
        }

        return isValid;
    }

    function validate_nullDescription(param1, param2, paramAlert) {
        var array1 = param1.split(',');
        var array2 = param2.split(',');
        var counter1 = 0;

        var isValid = true;

        if (array1.length > 0) {
            for (var j = 0; j < array1.length; j++) {
                if (NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + array1[j]).value)) === 0) {
                    counter1++;
                }
            }
        }

        if (array2.length > 0) {
            for (var i = 0; i < array2.length; i++) {
                // If description is empty and there are amounts with values
                if (($.trim($_Id('frm1702MX:' + array2[i]).value) === '') && (counter1 < array1.length)) {
                    isValid = false;
                    break;
                }
                    // If description is not empty and there are amounts without values
                else if (($.trim($_Id('frm1702MX:' + array2[i]).value) !== '') && (counter1 === array1.length)) {
                    isValid = false;
                    break;
                }
            }
        }

        if (!isValid) {
            alert('Please provide complete data on ' + paramAlert + '.\n(Amount cannot be zero [0] if Description is not empty and vice versa).');
        }

        return isValid;
    }
    function checkNullP8Sc12(param, row, perRow, capitalAndTotalPercent, message) {

       
        var params = param;
        var arrayRow = params.split(',');
        var count = 0;
        var isValid = true;

        for (var i = 0; i < row; i++) {

            var arrayPerRow = arrayRow[i].split('.');
            for (var x = 0; x < perRow; x++) {
                if ($_Id('frm1702MX:' + arrayPerRow[x]).value === "") {
                    count += 1;
                }
            }
        }

        if (capitalAndTotalPercent != "") {
            var paramAmount = capitalAndTotalPercent;
            var arrayAmount = paramAmount.split(',');
            for (var y = 0; y < arrayAmount.length; y++) {
                if (NumWithComma(NumWithParenthesis($_Id('frm1702MX:' + arrayAmount[y]).value)) === 0) {
                    count += 1;
                }
            }
        }

        if (count != 0) {

            isValid = false;
            alert(message);

        }

        return isValid;
    }
    function checkNullP8Sc12I1toI20() {
        //frm1702MX:txtPg8Sc12I1C1
        //frm1702MX:txtPg8Sc12I1C2tin1
        //frm1702MX:txtPg8Sc12I1C2tin2
        //frm1702MX:txtPg8Sc12I1C2tin3
        //frm1702MX:txtPg8Sc12I1C2tin4
        //frm1702MX:txtPg8Sc12I1C3
        //frm1702MX:txtPg8Sc12I1C4
        var count = 0;
        var isValid = true;

        for (var i = 1; i < 20; i++) {
            //As of 10/08/2015 HD2014-1246020 : If the TP selects “Member”, system should accept zero (0) in ‘Capital Contribution’
            var isNotValidCapitalTotal = $_Id("frm1702MX:radPg8Sc12member").checked == true ? false : ($_Id('frm1702MX:txtPg8Sc12I' + i + 'C3').value == 0 || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C4').value == 0);

            //if registered name has a value and other column is null or 0 ,count
            if ($.trim($_Id('frm1702MX:txtPg8Sc12I' + i + 'C1').value) != "") {
                if ($_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin1').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin2').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin3').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin4').value == "" || isNotValidCapitalTotal) {
                    count++;
                }
            }
            //if TIN1 has a value and other column is null or 0 ,count
            if ($.trim($_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin1').value) != "") {
                if ($_Id('frm1702MX:txtPg8Sc12I' + i + 'C1').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin2').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin3').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin4').value == "" || isNotValidCapitalTotal) {
                    count++;
                }
            }
            //if TIN2 has a value and other column is null or 0 ,count
            if ($.trim($_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin2').value) != "") {
                if ($_Id('frm1702MX:txtPg8Sc12I' + i + 'C1').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin1').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin3').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin4').value == "" || isNotValidCapitalTotal) {
                    count++;
                }
            }
            //if TIN3 has a value and other column is null or 0 ,count
            if ($.trim($_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin3').value) != "") {
                if ($_Id('frm1702MX:txtPg8Sc12I' + i + 'C1').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin1').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin2').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin4').value == "" || isNotValidCapitalTotal) {
                    count++;
                }
            }
            //if TIN4 has a value and other column is null or 0 ,count
            if ($.trim($_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin4').value) != "") {
                if ($_Id('frm1702MX:txtPg8Sc12I' + i + 'C1').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin1').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin2').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin3').value == "" || isNotValidCapitalTotal) {
                    count++;
                }
            }
            //if  Capital Contribution is greater than zero and other column is null or 0 ,count
            if (NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg8Sc12I' + i + 'C3').value)) > 0) {
                if ($_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin1').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin2').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin3').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin4').value == "" || $.trim($_Id('frm1702MX:txtPg8Sc12I' + i + 'C1').value) == "" || ($_Id('frm1702MX:txtPg8Sc12I' + i + 'C4').value == 0 && $_Id("frm1702MX:radPg8Sc12member").checked == false)) {
                    count++;
                }
            }
            //if  % to Total is greater than zero and other column is null or 0 ,count
            if (NumWithComma(NumWithParenthesis($_Id('frm1702MX:txtPg8Sc12I' + i + 'C4').value)) > 0) {
                if ($_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin1').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin2').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin3').value == "" || $_Id('frm1702MX:txtPg8Sc12I' + i + 'C2tin4').value == "" || $.trim($_Id('frm1702MX:txtPg8Sc12I' + i + 'C1').value) == "" || ($_Id('frm1702MX:txtPg8Sc12I' + i + 'C3').value == 0 && $_Id("frm1702MX:radPg8Sc12member").checked == false)) {
                    count++;
                }
            }
        }

        if (count > 0) {

            isValid = false;
            var msg = "Please fill up the empty Registered Name or TIN on Page 8 Schedule 12"
            msg = isNotValidCapitalTotal ? msg + " and Capital Contribution must be greater than zero." : msg;

            alert(msg);

        }

        return isValid;

    }

    function checkNullP8Sc12I1toI20Enable() {

        for (var i = 1; i < 19; i++) {

            if ($.trim($_Id('frm1702MX:txtPg8Sc12I' + i + 'C1').value) != "") {
                enableField('txtPg8Sc12I' + (i + 1) + 'C1');
                enableField('txtPg8Sc12I' + (i + 1) + 'C2tin1');
                enableField('txtPg8Sc12I' + (i + 1) + 'C2tin2');
                enableField('txtPg8Sc12I' + (i + 1) + 'C2tin3');
                enableField('txtPg8Sc12I' + (i + 1) + 'C2tin4');
                enableField('txtPg8Sc12I' + (i + 1) + 'C3');
                enableField('txtPg8Sc12I' + (i + 1) + 'C4');
            }
        }
    }
    function checkNullP9Sc13I5toI9() {
        var count = 0;
        var isValid = true;

        //COLUMN A
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I5CA').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I6CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I7CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I8CA').value == 0 || $_Id('frm1702MX:txtPg9Sc13I9CA').value == 0) {
                count++;
            }
        }
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I6CA').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I5CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I7CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I8CA').value == 0 || $_Id('frm1702MX:txtPg9Sc13I9CA').value == 0) {
                count++;
            }
        }
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I7CA').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I6CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I5CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I8CA').value == 0 || $_Id('frm1702MX:txtPg9Sc13I9CA').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I8CA').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I6CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I7CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I5CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I9CA').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I9CA').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I6CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I7CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I5CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I8CA').value == 0) {
                count++;
            }
        }
        //COLUMN B
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I5CB').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I6CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I7CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I8CB').value == 0 || $_Id('frm1702MX:txtPg9Sc13I9CB').value == 0) {
                count++;
            }
        }
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I6CB').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I5CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I7CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I8CB').value == 0 || $_Id('frm1702MX:txtPg9Sc13I9CB').value == 0) {
                count++;
            }
        }
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I7CB').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I6CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I5CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I8CB').value == 0 || $_Id('frm1702MX:txtPg9Sc13I9CB').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I8CB').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I6CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I7CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I5CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I9CB').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I9CB').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I6CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I7CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I5CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I8CB').value == 0) {
                count++;
            }
        }

        if (count > 0) {

            isValid = false;
            alert("Please fill up the empty Data on Page 9  Schedule 13 Item 5 to Item 9 and amounts must be greater than zero.");

        }

        return isValid;

    }
    function checkNullP9Sc13I10toI15() {
        var count = 0;
        var isValid = true;

        //COLUMN A
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I10CA-2').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I11CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I12CA').value == 0 || $.trim($_Id('frm1702MX:txtPg9Sc13I13CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I14CA').value == 0 || $_Id('frm1702MX:txtPg9Sc13I15CA').value == 0) {
                count++;
            }
        }
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I11CA').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I10CA-2').value) == "" || $_Id('frm1702MX:txtPg9Sc13I12CA').value == 0 || $.trim($_Id('frm1702MX:txtPg9Sc13I13CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I14CA').value == 0 || $_Id('frm1702MX:txtPg9Sc13I15CA').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I12CA').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I11CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I10CA-2').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I13CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I14CA').value == 0 || $_Id('frm1702MX:txtPg9Sc13I15CA').value == 0) {
                count++;
            }
        }
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I13CA').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I11CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I12CA').value == 0 || $.trim($_Id('frm1702MX:txtPg9Sc13I10CA-2').value) == "" || $_Id('frm1702MX:txtPg9Sc13I14CA').value == 0 || $_Id('frm1702MX:txtPg9Sc13I15CA').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I14CA').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I11CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I12CA').value == 0 || $.trim($_Id('frm1702MX:txtPg9Sc13I13CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I10CA-2').value) == "" || $_Id('frm1702MX:txtPg9Sc13I15CA').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I15CA').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I11CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I12CA').value == 0 || $.trim($_Id('frm1702MX:txtPg9Sc13I13CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I10CA-2').value) == "" || $_Id('frm1702MX:txtPg9Sc13I14CA').value == 0) {
                count++;
            }
        }
        //COLUMN B
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I10CB-2').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I11CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I12CB').value == 0 || $.trim($_Id('frm1702MX:txtPg9Sc13I13CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I14CB').value == 0 || $_Id('frm1702MX:txtPg9Sc13I15CB').value == 0) {
                count++;
            }
        }
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I11CB').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I10CB-2').value) == "" || $_Id('frm1702MX:txtPg9Sc13I12CB').value == 0 || $.trim($_Id('frm1702MX:txtPg9Sc13I13CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I14CB').value == 0 || $_Id('frm1702MX:txtPg9Sc13I15CB').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I12CB').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I11CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I10CB-2').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I13CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I14CB').value == 0 || $_Id('frm1702MX:txtPg9Sc13I15CB').value == 0) {
                count++;
            }
        }
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I13CB').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I11CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I12CB').value == 0 || $.trim($_Id('frm1702MX:txtPg9Sc13I10CB-2').value) == "" || $_Id('frm1702MX:txtPg9Sc13I14CB').value == 0 || $_Id('frm1702MX:txtPg9Sc13I15CB').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I14CB').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I11CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I12CB').value == 0 || $.trim($_Id('frm1702MX:txtPg9Sc13I13CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I10CB-2').value) == "" || $_Id('frm1702MX:txtPg9Sc13I15CB').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I15CB').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I11CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I12CB').value == 0 || $.trim($_Id('frm1702MX:txtPg9Sc13I13CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc13I10CB-2').value) == "" || $_Id('frm1702MX:txtPg9Sc13I14CB').value == 0) {
                count++;
            }
        }

        if (count > 0) {

            isValid = false;
            alert("Please fill up the empty Data on Page 9  Schedule 13 Item 10 to Item 15 and amounts must be greater than zero.");

        }

        return isValid;

    }
    function checkNullP9Sc13I16toI18() {
        var count = 0;
        var isValid = true;

        //COLUMN A
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I16CA').value) != "") {
            if ($_Id('frm1702MX:txtPg9Sc13I17CA').value == 0 || $_Id('frm1702MX:txtPg9Sc13I18CA').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I17CA').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I16CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I18CA').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I18CA').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I16CA').value) == "" || $_Id('frm1702MX:txtPg9Sc13I17CA').value == 0) {
                count++;
            }
        }
        //Column B
        if ($.trim($_Id('frm1702MX:txtPg9Sc13I16CB').value) != "") {
            if ($_Id('frm1702MX:txtPg9Sc13I17CB').value == 0 || $_Id('frm1702MX:txtPg9Sc13I18CB').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I17CB').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I16CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I18CB').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc13I18CB').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc13I16CB').value) == "" || $_Id('frm1702MX:txtPg9Sc13I17CB').value == 0) {
                count++;
            }
        }

        if (count > 0) {

            isValid = false;
            alert("Please fill up the empty Data on Page 9  Schedule 13 Item 16 to Item 18 and amounts must be greater than zero.");

        }

        return isValid;

    }
    function checkNullP9Sc14I2toI5() {
        var count = 0;
        var isValid = true;

        //COLUMN A
        if ($.trim($_Id('frm1702MX:txtPg9Sc14I2CA').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc14I3CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc14I4CA').value) == "" || $_Id('frm1702MX:txtPg9Sc14I5CA').value == 0) {
                count++;
            }
        }
        if ($.trim($_Id('frm1702MX:txtPg9Sc14I3CA').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc14I2CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc14I4CA').value) == "" || $_Id('frm1702MX:txtPg9Sc14I5CA').value == 0) {
                count++;
            }
        }
        if ($.trim($_Id('frm1702MX:txtPg9Sc14I4CA').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc14I3CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc14I2CA').value) == "" || $_Id('frm1702MX:txtPg9Sc14I5CA').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc14I5CA').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc14I3CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc14I4CA').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc14I2CA').value) == "") {
                count++;
            }
        }
        //COLUMN B
        if ($.trim($_Id('frm1702MX:txtPg9Sc14I2CB').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc14I3CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc14I4CB').value) == "" || $_Id('frm1702MX:txtPg9Sc14I5CB').value == 0) {
                count++;
            }
        }
        if ($.trim($_Id('frm1702MX:txtPg9Sc14I3CB').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc14I2CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc14I4CB').value) == "" || $_Id('frm1702MX:txtPg9Sc14I5CB').value == 0) {
                count++;
            }
        }
        if ($.trim($_Id('frm1702MX:txtPg9Sc14I4CB').value) != "") {
            if ($.trim($_Id('frm1702MX:txtPg9Sc14I3CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc14I2CB').value) == "" || $_Id('frm1702MX:txtPg9Sc14I5CB').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc14I5CB').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc14I3CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc14I4CB').value) == "" || $.trim($_Id('frm1702MX:txtPg9Sc14I2CB').value) == "") {
                count++;
            }
        }

        if (count > 0) {

            isValid = false;
            alert("Please fill up the empty Data on Page 9  Schedule 14 Item 2 to Item 5 and amounts must be greater than zero.");

        }

        return isValid;

    }
    function checkNullP9Sc14I6toI7() {
        var count = 0;
        var isValid = true;

        //COLUMN A
        if ($.trim($_Id('frm1702MX:txtPg9Sc14I6CA').value) != "") {
            if ($_Id('frm1702MX:txtPg9Sc14I7CA').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc14I7CA').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc14I6CA').value) == "") {
                count++;
            }
        }
        //COLUMN B
        if ($.trim($_Id('frm1702MX:txtPg9Sc14I6CB').value) != "") {
            if ($_Id('frm1702MX:txtPg9Sc14I7CB').value == 0) {
                count++;
            }
        }
        if ($_Id('frm1702MX:txtPg9Sc14I7CB').value != 0) {
            if ($.trim($_Id('frm1702MX:txtPg9Sc14I6CB').value) == "") {
                count++;
            }
        }
        if (count > 0) {

            isValid = false;
            alert("Please fill up the empty Data on Page 9  Schedule 14 Item 6 to Item 7 and amounts must be greater than zero.");

        }

        return isValid;

    }

    function validatePartVI46to48() {
        var isValid = true;
        var external = $_Id("frm1702MX:txtPg2Pt6I45External");
        var externalTINFull = $_Name("frm1702MX:txtPg2Pt6I46TIN");
        var partner = $_Id("frm1702MX:txtPg2Pt6I47Partner");
        var partnerTINFull = $_Name("frm1702MX:txtPg2Pt6I48TIN");

        if ($.trim(external.value) !== "") {
            if (validateTIN(externalTINFull[0], true) === false) {
                alert("Please provide a valid TIN on Page 2 Part VI Item 46 (must have 3 numbers per box).");

                isValid = false;
            }
        }
        else if ($.trim(external.value) === "" && ((document.getElementById('frm1702MX:txtPg2Pt6I46TIN1').value || document.getElementById('frm1702MX:txtPg2Pt6I46TIN2').value || document.getElementById('frm1702MX:txtPg2Pt6I46TIN3').value || document.getElementById('frm1702MX:txtPg2Pt6I46TIN4').value) !== "")) {
            alert("Please provide complete data on Page 2 Part VI Item 45.");

            isValid = false;
        }

        if ($.trim(partner.value) !== "" && !!isValid) {
            if (validateTIN(partnerTINFull[0], true) === false) {
                alert("Please provide a valid TIN on Page 2 Part VI Item 48 (must have 3 numbers per box).");

                isValid = false;
            }
        }
        else if ($.trim(partner.value) === "" && ((document.getElementById('frm1702MX:txtPg2Pt6I48TIN1').value || document.getElementById('frm1702MX:txtPg2Pt6I48TIN2').value || document.getElementById('frm1702MX:txtPg2Pt6I48TIN3').value || document.getElementById('frm1702MX:txtPg2Pt6I48TIN4').value) !== "")) {
            alert("Please provide complete data on Page 2 Part VI Item 47.");

            isValid = false;
        }

        return isValid;
    }

    function validateBIRAccreditation() {
        var isValid = true, alertMsg = "Please provide complete data on Page 2 Part VI Items 49 - 51.";
        var birAccreditation = $_Id("frm1702MX:txtPg2Pt6I49BIRAccreditation");
        var birIssueDate = $_Id("frm1702MX:txtPg2Pt6I50IssueDate");
        var birExpiryDate = $_Id("frm1702MX:txtPg2Pt6I51ExpiryDate");

        if ($.trim(birAccreditation.value) !== "") {
            if (($.trim(birIssueDate.value) === "") || ($.trim(birExpiryDate.value) === "")) {
                isValid = false;
            }
            else if (birAccreditation.value.length < 15) {
                alertMsg = "Please provide a valid BIR Accreditation Number (Page 2 Part VI Item 49).";
                isValid = false;
            }
        }
        else if ($.trim(birAccreditation.value) === "" && (($.trim(birIssueDate.value) !== "") || ($.trim(birExpiryDate.value) !== ""))) {
            isValid = false;
        }

        if (!isValid) {
            alert(alertMsg);
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
                isValid = false;
            }
        }

        return isValid;
    }

    function setSchedule12Tick(elem) {
      
        var selectedATC = $_Id("frm1702MX:drpPg1I5ATCR2").value;

        if (elem.id == "frm1702MX:radPg8Sc12partner") {
            $_Id("frm1702MX:radPg8Sc12stockholder").checked = false;
            $_Id("frm1702MX:radPg8Sc12member").checked = false;

            if (selectedATC === "IC021") {
                $_Id("frm1702MX:radPg8Sc12partner").checked = true;
            }
        } else {
            $_Id("frm1702MX:radPg8Sc12partner").checked = false;
        }
    }
    var isAmendedReturn = false; //new
    var isNewEntry = false; //new

    var isSubmitFinal = false;
    var isSubmit = false;

    var gIsReadOnly = false;
    var fileName = ""
    var existingXMLFileName = ""
    var fileNameToExport = ""

    var savedReturn = ""
    var p3Compromise = ""
    var p3Surcharge = ""
    var p3Interest = ""
    var p3IsAmended = ""
    var p3FilingDate = ""
    var p3ReturnPeriod = ""
    var p3ReturnPeriodEnd = ""

    var p3BasicTax = ""
    var p3TotalPenalties = ""
    var p3TotalAmountPayable = ""
    var p3GrossSales = "";

    var p3TPTIN1 = ""
    var p3TPTIN2 = ""
    var p3TPTIN3 = ""
    var p3TPTIN = ""
    var p3TPBranchCode = ""
    var p3TPRDOCode = ""
    var p3TPLineBus = ""
    var p3TPName = ""
    var p3TPTelNum = ""
    var p3TPAddress = ""
    var p3TPZip = ""

    /*----------------------------------*/
    var d = document, XMLBGFile = '', data = '', XMLFile = '', XMLATCFile = '', msg = document.getElementById('msg');
    var loader = document.getElementById('loader');
    /*----------------------------------*/

    setTimeout("sleeptime()", 200);

    function redirectToSchedule() {
        if (confirm("Schedules need to be filled up before Part II, IV and V can have values. Do you want to fill up the Schedules first? (Clicking on 'OK' will redirect you to Schedule 1)") === true) {
            $_Id("frm1702MX:txtCurrentPage").value = 3;
            goToPage();
        }
    }
    var globalEmail = "";
    function sleeptime() {
        //var delay = 0;

        loadXMLATC('xml/atcCodes.xml');
        init();

        getDisabledText();

        var xmlFileName = document.getElementById('file_name').value;
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
            loadXML(fileName);
            existingXMLFileName = fileName;

            validatePg1Pt2I22(true);

            if (gIsReadOnly) {
                window.setTimeout(callWhenFinalCopy, 1000);
            }
        } else {
            window.setTimeout("$('#loader').hide('blind');", 200);
            isNewEntry = true;
        }
        
        if ($('#printMenu').css('display') != 'none') {
            $('#printMenu').hide('blind');
        }

        $_Id('frm1702MX:txtCurrentPage').value = 1;

        //Trigger blur in all numeric inputs with a length greater than 4 to add commas
        $('.numbertext').each(function () {
            if ((typeof (this.value) !== "undefined") && (this.value !== "0") && (this.value.indexOf(".") === -1)) {
                this.value = "" + NegativeValue(formatCurrencyWOC(this.value));
            }
        })

        checkEnableManual();
        

        // Disable pasting
        $(document).ready(function () {
            $('input').bind('paste', function (e) {
                e.preventDefault();
            });
        });

    }

    function callWhenFinalCopy() {
        disableAllControl();
        disableAllElementIDs();
        enablePaging();

        $_Id('btnUpload').disabled = false;
        $_Id('btnPrint').disabled = false;

        $_Id('driveSelectTPExport').disabled = false;
        $_Id('btnOkExport').disabled = false;
        $_Id('btnCancelExport').disabled = false;

        $_Id('ebironline').disabled = false;
        $_Id('efps').disabled = false;

        enablePrintAndAttachmentPager();
    }

    function checkEnableManual() {

        checkItemsFromParent();
        enableMCITFields();
        computePg6Sc7AI4();
        enableATCList($_Id("frm1702MX:chkPg1I5ATCR2"));

        if (document.getElementById('frm1702MX:txtCtrmodalPg5Sc4I3').value > 0) {
            Save_modalTablePg5Sc4I3();
        }
        if (document.getElementById('frm1702MX:txtCtrmodalPg5Sc5I4').value > 0) {
            Save_modalTablePg5Sc5I4();
        }
        if (document.getElementById('frm1702MX:txtCtrmodalPg6Sc5I39').value > 0) {
            Save_modalTablePg6Sc5I39();
        }
        if (document.getElementById('frm1702MX:txtCtrmodalPg6Sc6').value > 0) {
            Save_modalTablePg6Sc6();
        }
        if (document.getElementById('frm1702MX:txtCtrmodalPg7Sc8').value > 0) {
            Save_modalTablePg7Sc8();
        }
        if (document.getElementById('frm1702MX:txtCtrmodalPg7Sc10I3').value > 0) {
            Save_modalTablePg7Sc10I3();
        }
        if (document.getElementById('frm1702MX:txtCtrmodalPg7Sc10I6').value > 0) {
            Save_modalTablePg7Sc10I6();
        }
        if (document.getElementById('frm1702MX:txtCtrmodalPg7Sc10I8').value > 0) {
            Save_modalTablePg7Sc10I8();
        }
        if (document.getElementById('frm1702MX:txtCtrmodalPg9Sc13I').value > 0) {
            Save_modalDivPg9Sc13I();
        }
        if (document.getElementById('frm1702MX:txtCtrmodalPg9Sc13II').value > 0) {
            Save_modalDivPg9Sc13II();
        }
        if (document.getElementById('frm1702MX:txtCtrmodalPg9Sc13III').value > 0) {
            Save_modalDivPg9Sc13III();
        }
        if (document.getElementById('frm1702MX:txtCtrmodalPg9Sc13IV').value > 0) {
            Save_modalDivPg9Sc13IV();
        }
        if (document.getElementById('frm1702MX:txtCtrmodalPg9Sc14I').value > 0) {
            Save_modalDivPg9Sc14I();
        }
        if (document.getElementById('frm1702MX:txtCtrmodalPg9Sc14II').value > 0) {
            Save_modalDivPg9Sc14II();
        }
        //check enabled main page modal
        checkNullRow_OnBlur3('txtPg5Sc4I1', 'txtPg5Sc4I2,txtPg5Sc4I2CA,txtPg5Sc4I2CB,txtPg5Sc4I2CC');
        if (document.getElementById('frm1702MX:txtPg5Sc4I3').value != 'OTHERS') {
            checkNullRow_OnBlur3('txtPg5Sc4I2', 'txtPg5Sc4I3,txtPg5Sc4I3CA,txtPg5Sc4I3CB,txtPg5Sc4I3CC');
        }

        checkNullRow_OnBlur3('txtPg5Sc5I2', 'txtPg5Sc5I3,txtPg5Sc5I3CA,txtPg5Sc5I3CB,txtPg5Sc5I3CC');

        if (document.getElementById('frm1702MX:txtPg5Sc5I4').value != 'OTHERS') {
            checkNullRow_OnBlur3('txtPg5Sc5I3', 'txtPg5Sc5I4,txtPg5Sc5I4CA,txtPg5Sc5I4CB,txtPg5Sc5I4CC');
        }

        checkNullRow_OnBlur3('txtPg6Sc5I36other', 'txtPg6Sc5I37other,txtPg6Sc5I37CA,txtPg6Sc5I37CB,txtPg6Sc5I37CC');
        checkNullRow_OnBlur3('txtPg6Sc5I37other', 'txtPg6Sc5I38other,txtPg6Sc5I38CA,txtPg6Sc5I38CB,txtPg6Sc5I38CC');

        if (document.getElementById('frm1702MX:txtPg6Sc5I39other').value != 'OTHERS') {
            checkNullRow_OnBlur3('txtPg6Sc5I38other', 'txtPg6Sc5I39other,txtPg6Sc5I39CA,txtPg6Sc5I39CB,txtPg6Sc5I39CC');
        }

        checkNullRow_OnBlur4('txtPg6Sc6I1description', 'txtPg6Sc6I1legal', 'txtPg6Sc6I2description,txtPg6Sc6I2legal,txtPg6Sc6I2CA,txtPg6Sc6I2CB,txtPg6Sc6I2CC');
        checkNullRow_OnBlur4('txtPg6Sc6I2description', 'txtPg6Sc6I2legal', 'txtPg6Sc6I3description,txtPg6Sc6I3legal,txtPg6Sc6I3CA,txtPg6Sc6I3CB,txtPg6Sc6I3CC');

        if (document.getElementById('frm1702MX:txtPg6Sc6I4description').value != 'OTHERS') {
            checkNullRow_OnBlur4('txtPg6Sc6I3description', 'txtPg6Sc6I3legal', 'txtPg6Sc6I4description,txtPg6Sc6I4legal,txtPg6Sc6I4CA,txtPg6Sc6I4CB,txtPg6Sc6I4CC');
        }
        if (document.getElementById('frm1702MX:txtPg7Sc8I12').value != 'OTHERS') {
            checkNullRow_OnBlur3('txtPg7Sc8I11', 'txtPg7Sc8I12,txtPg7Sc8I12CA,txtPg7Sc8I12CB,txtPg7Sc8I12CC');
        }
        if (document.getElementById('frm1702MX:txtPg7Sc10I3').value != 'OTHERS') {
            checkNullRow_OnBlur3('txtPg7Sc10I2', 'txtPg7Sc10I3,txtPg7Sc10I3CA,txtPg7Sc10I3CB,txtPg7Sc10I3CC');
        }
        if (document.getElementById('frm1702MX:txtPg7Sc10I6').value != 'OTHERS') {
            checkNullRow_OnBlur3('txtPg7Sc10I5', 'txtPg7Sc10I6,txtPg7Sc10I6CA,txtPg7Sc10I6CB,txtPg7Sc10I6CC');
        }
        if (document.getElementById('frm1702MX:txtPg7Sc10I8').value != 'OTHERS') {
            checkNullRow_OnBlur3('txtPg7Sc10I7', 'txtPg7Sc10I8,txtPg7Sc10I8CA,txtPg7Sc10I8CB,txtPg7Sc10I8CC');
        }

        checkNullP8Sc12I1toI20Enable();
        verifyselectSchedule12();

        saveAttachmentIterationData();

        recomputeSchedule1();
    }



    var rdoList = new Array();
    var XMLrdoFile = ''; //Object Type
    var rdoCount = 0;

    function loadXMLrdo(fileLocation) {
        try {
            //This will load the Region file with filename 'fileLocation' if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            XMLrdoFile = fsoXML.OpenTextFile(fileLocation, 1);

            if (XMLrdoFile.AtEndOfStream)
                data = ""
            else {
                var responseRdo = document.getElementById('responseRdo'); //render file and write to hidden div
                responseRdo.innerHTML = XMLrdoFile.ReadAll(); //remove XML tag
                //responseRdo = replaceHtml(responseRdo, XMLrdoFile.ReadAll()); //Pattern:  el = replaceHtml(el, newHtml)
            }
            XMLrdoFile.Close(); //alert( responseRdo.innerHTML ); //Debug           
            loadRdo(); /*This will load ATC onto an array*/
        } catch (e) {
            msg.innerHTML = "" //"Region File not Found."
        } //this will Alert File not Found if it doesn't exist
    }

    function loadRdo() {
        /*This will load data onto an array*/
        var response = document.getElementById("responseRdo");

        var rdoCnt = String(response.innerHTML).split('rdoCount=');
        rdoCount = rdoCnt[1];

        var k = 0;
        //loads rdoList from xml
        for (var i = 1; i <= rdoCount; i++) {
            var rdo = String(response.innerHTML).split('rdo' + i + ':');
            var rdoStr = rdo[1];

            //Ensure that before writing to rdoPropertyJS the formType 1702MX is traceable in rdoStr
            if (rdoStr.indexOf('1702MX') >= 0) {
                var rdoValues = rdoStr.split('~');
                var rdoCode = rdoValues[0];
                var description = rdoValues[1];
                var objRdo = new rdoPropertyJS(rdoCode, description);
                rdoList[k] = objRdo;
                k++;
            } else {
                //alert('1702MX not found in array #'+i);
                continue;
            }
        }
    }

    function rdoPropertyJS(rdoCode, description) {
        this.rdoCode = rdoCode;
        this.description = description;
    }

    var atcList = new Array();
    var atcCount = 0;

    function atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum) {
        this.formType = formType;
        this.atcCode = atcCode;
        this.description = description;
        this.rate = rate;
        this.category = category;
        this.base = base;
        this.compType = compType;
        this.constTaxDue = constTaxDue;
        this.minimum = minimum;
        this.maximum = maximum;
    }

    function loadXMLATC(fileLocation) {
        try {
            //This will load the ATC file with filename 'fileLocation' if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            XMLATCFile = fsoXML.OpenTextFile(fileLocation, 1);

            if (XMLATCFile.AtEndOfStream)
                data = "";
            else {
                var responseATC = d.getElementById('responseATC'); //render file and write to hidden div
                responseATC.innerHTML = XMLATCFile.ReadAll(); //remove XML tag
            }
            XMLATCFile.Close(); //alert( responseATC.innerHTML ); //Debug           
            loadATC(); /*This will load ATC onto an array*/
        } catch (e) {
            //msg.innerHTML = "ATC File not Found.";
        } //this will Alert File not Found if it doesn't exist
    }

    function loadATC() {
        /*This will load data onto an array*/
        var response = d.getElementById("responseATC");

        var atcCnt = String(response.innerHTML).split('atcCount=');
        atcCount = atcCnt[1];

        //var j = 0;
        //loads atcList from xml
        for (var i = 1; i <= atcCount; i++) {

            var atc = String(response.innerHTML).split('atc' + i + ':');
            var atcStr = atc[1];

            //Ensure that before writing to atcPropertyJS the formType 1702MX is traceable in atcStr
            if (atcStr.indexOf('1702MX') >= 0) {
                var atcValues = atcStr.split('~');

                //var formType = "1702MX";
                var atcCode = atcValues[0];
                //var description = atcValues[1];
                var rate = atcValues[2];
                var objATC = new specialTaxRatesJS(atcCode, rate);
                atcList.push(objATC);
              
            } else {
                continue;
            }
        }
    }

    function specialTaxRatesJS(atcCode, rate) {
        this.atcCode = atcCode;
        this.rate = rate;
    }

    function getSpecialTaxRates() {
        var atcRates = [], i = 0;

        var pg2SpecialTaxRate = (($_Id("frm1702MX:txtPg2Pt4I34SpecialTaxRate").value) * 1);
        if ($.inArray(pg2SpecialTaxRate, atcRates) === -1) {
            atcRates.push(pg2SpecialTaxRate);
        }

        if ($_Id("frm1702MX:chkPg1I5ATCR2").checked === true) {
            for (i = 0; i < atcList.length; i++) {
                if ((atcList[i].atcCode === $_Id("frm1702MX:drpPg1I5ATCR2").value) && ($.inArray(atcList[i].rate, atcRates) === -1)) {
                    atcRates.push(atcList[i].rate);
                }
            }
        }

        // Sorts rates by ascending order
        atcRates.sort(function (a, b) { return a - b; });

        return atcRates;
    }

    function changeSpecialTaxRate() {
        if (totalSP === 0) {
            var i;
            var data = "";
            var atcRates = getSpecialTaxRates();

            data = "<select id='frm1702MX:drpPg3Sc1I11CB' style='width: 100%;' name='frm1702MX:drpPg3Sc1I11CB' onchange='computePg3Sc1I12();'>";
            for (i = 0; i < atcRates.length; i++) {
                data = data + "<option value='" + ((atcRates[i] * 1) / 100) + "'>" + (atcRates[i] * 1).toFixed(1) + "%</option>";
            }
            data = data + "</select>";

            $('#atcContainer').html(data);

            populatePg3Sc1I11();
            computePg3Sc1I12();
        }
        else {
            var i, len = totalSPArray.length;

            $("#atcContainer").html("");

            for (i = 0; i < len; i++) {
                populatePg1AttachScBI11(totalSPArray[i]);
            }
        }
    }

    function selectSchedule12(elem, atcIsChecked) {
        var selectedATC = elem.value;
        if (selectedATC === "IC011" && !!atcIsChecked) {
            $_Id("frm1702MX:radPg8Sc12stockholder").disabled = false;
            $_Id("frm1702MX:radPg8Sc12partner").disabled = true;
            $_Id("frm1702MX:radPg8Sc12member").disabled = false;
            $_Id("frm1702MX:radPg8Sc12stockholder").checked = true;
            $_Id("frm1702MX:radPg8Sc12partner").checked = false;
            $_Id("frm1702MX:radPg8Sc12member").checked = false;
        }
        else if (selectedATC === "IC021" && !!atcIsChecked) {
            $_Id("frm1702MX:radPg8Sc12stockholder").disabled = true;
            $_Id("frm1702MX:radPg8Sc12partner").disabled = false;
            $_Id("frm1702MX:radPg8Sc12member").disabled = true;
            $_Id("frm1702MX:radPg8Sc12stockholder").checked = false;
            $_Id("frm1702MX:radPg8Sc12partner").checked = true;
            $_Id("frm1702MX:radPg8Sc12member").checked = false;
        }
        else {
            $_Id("frm1702MX:radPg8Sc12stockholder").checked = false;
            $_Id("frm1702MX:radPg8Sc12partner").checked = false;
            $_Id("frm1702MX:radPg8Sc12member").checked = false;
            $_Id("frm1702MX:radPg8Sc12stockholder").disabled = false;
            $_Id("frm1702MX:radPg8Sc12partner").disabled = false;
            $_Id("frm1702MX:radPg8Sc12member").disabled = false;
        }

    }
    function verifyselectSchedule12() {
        var selectedATC = $_Id("frm1702MX:drpPg1I5ATCR2").value;

        if (selectedATC === "IC011") {
            $_Id("frm1702MX:radPg8Sc12stockholder").disabled = false;
            $_Id("frm1702MX:radPg8Sc12partner").disabled = true;
            $_Id("frm1702MX:radPg8Sc12member").disabled = false;
        }
        else if (selectedATC === "IC021") {
            $_Id("frm1702MX:radPg8Sc12stockholder").disabled = true;
            $_Id("frm1702MX:radPg8Sc12partner").disabled = false;
            $_Id("frm1702MX:radPg8Sc12member").disabled = true;
        }
    }

    // if file is already existing
    function loadData() {
        /*This will load data onto fields*/
        var response = document.getElementById("response");
        var modalCounter = document.getElementById('modalCounter').getElementsByTagName('input');
        var counter = 0;
        for (var i = 0; i < modalCounter.length; i++) {
            //locate modal for row iteration and do conditions
            if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 0) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    disableField('txtPg5Sc4I3,txtPg5Sc4I3CA,txtPg5Sc4I3CB,txtPg5Sc4I3CC');
                    enableField('btnModalPg5Sc4I3');
                    AddRow_modalTablePg5Sc4I3();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 1) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    disableField('txtPg5Sc5I4,txtPg5Sc5I4CA,txtPg5Sc5I4CB,txtPg5Sc5I4CC');
                    enableField('btnModalPg5Sc5I4');
                    AddRow_modalTablePg5Sc5I4();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 2) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    disableField('txtPg6Sc5I39other,txtPg6Sc5I39CA,txtPg6Sc5I39CB,txtPg6Sc5I39CC');
                    enableField('btnModalPg6Sc5I39');
                    AddRow_modalTablePg6Sc5I39();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 3) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    disableField('txtPg6Sc6I4description,txtPg6Sc6I4legal,txtPg6Sc6I4CA,txtPg6Sc6I4CB,txtPg6Sc6I4CC');
                    enableField('btnModalPg6Sc6');
                    AddRow_modalTablePg6Sc6();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 4) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    disableField('txtPg7Sc8I12,txtPg7Sc8I12CA,txtPg7Sc8I12CB,txtPg7Sc8I12CC');
                    enableField('btnModalPg7Sc8');
                    AddRow_modalTablePg7Sc8();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 5) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    disableField('txtPg7Sc10I3,txtPg7Sc10I3CA,txtPg7Sc10I3CB,txtPg7Sc10I3CC');
                    enableField('btnModalPg7Sc10I3');
                    AddRow_modalTablePg7Sc10I3();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 6) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    disableField('txtPg7Sc10I6,txtPg7Sc10I6CA,txtPg7Sc10I6CB,txtPg7Sc10I6CC');
                    enableField('btnModalPg7Sc10I6');
                    AddRow_modalTablePg7Sc10I6();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 7) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    disableField('txtPg7Sc10I8,txtPg7Sc10I8CA,txtPg7Sc10I8CB,txtPg7Sc10I8CC');
                    enableField('btnModalPg7Sc10I8');
                    AddRow_modalTablePg7Sc10I8();
                }
            }
                //locate modal for column iteration and do conditions
            else if ((response.innerHTML).indexOf(modalCounter[8].id) != -1 && i == 8) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {

                    continous_AddRow_modalTablePg9Sc13I();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[9].id) != -1 && i == 9) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {

                    AddRow_modalTablePg9Sc13II();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[10].id) != -1 && i == 10) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {

                    AddRow_modalTablePg9Sc13III();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[11].id) != -1 && i == 11) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {

                    AddRow_modalTablePg9Sc13IV();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[12].id) != -1 && i == 12) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {

                    AddRow_modalTablePg9Sc14I();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[13].id) != -1 && i == 13) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {

                    AddRow_modalTablePg9Sc14II();
                }
            }
                // EX attachments
            else if ((response.innerHTML).indexOf(modalCounter[14].id) != -1 && i == 14) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                if (counter > 0) {
                    for (var k = 0; k < counter; k++) {
                        addAttachment("EX");
                    }

                    disableAttachColumns(true, 'EX');
                }
                //totalEX = isNan(parseInt(counter)) ? 0 : parseInt(counter);
                changeView(false);
            }
                // SP attachments 
            else if ((response.innerHTML).indexOf(modalCounter[15].id) != -1 && i == 15) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                if (counter > 0) {
                    for (var k = 0; k < counter; k++) {
                        addAttachment("SP");
                    }

                    disableAttachColumns(true, 'SP');
                }
                //totalSP = isNan(parseInt(counter)) ? 0 : parseInt(counter);
                changeView(false);
            }
        }

        loadAttachmentIterationData();

        var elem = document.getElementById('frmMain').elements;
        for (var i = 0; i < elem.length; i++) {
            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&           
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String($("#response").html()).split(elem[i].id + '=');
                    if (elem[i].id == 'frm1702MX:txtPg1Pt1I9RegisteredName' || elem[i].id == 'frm1702MX:txtPg1Pt1I13MainLine' || elem[i].id == 'frm1702MX:txtPg1Pt1I10RegisteredAddress') {
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    else if (elem[i].id == 'frm1702MX:txtPg1Pt1I12Email') {
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    else if (elem[i].className.indexOf("numbertext") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "0" : fieldVal[1];
                    }
                    else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
                    else {
                        elem[i].value = fieldVal[1]; //all select-one and text values               
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
                
            }
        }
    }

    function loadXMLWellFormed(loadWhere) {
        try {

            //This will load the file with filename loadWhere if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            XMLFile = fsoXML.OpenTextFile(loadWhere, 1);
            if (XMLFile.AtEndOfStream)
                data = ""
            else {
                var response = document.getElementById('response'); //render file and write to hidden div
                response.innerHTML = XMLFile.ReadAll(); //remove XML tag
            }
            XMLFile.Close(); //alert( response.innerHTML ); //Debug             
            loadWFData(); /*This will load data onto fields*/
            if (response.innerHTML.indexOf("All Rights Reserved BIR 2014.0") >= 0) {
                gIsReadOnly = true;
            }

            if (gIsReadOnly) {
                document.getElementById('frm1702MX:cmdValidate').disabled = true;
                document.getElementById('btnSave').disabled = true;

                callWhenFinalCopy();
            }
            window.setTimeout("$('#loader').hide('blind');", 2000);
        } catch (e) {
            //msg.innerHTML = "Save File not Found."
        } //this will Alert File not Found if it doesn't exist
    }

    function loadWFData() {
        /*This will load data onto fields*/
        var response = document.getElementById("response");
        var elem = document.getElementById('frmMain').elements;
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
                document.getElementById('frm1702MX:cmdValidate').disabled = true;
                document.getElementById('btnSave').disabled = true;

                callWhenFinalCopy();
        }

        
    }

   

    function validate() {

        // Call initialValidateBeforeSave() function to ensure that data saved in profile.xml is not empty
        if (initialValidateBeforeSave() === false) {
            changeCurrentPage(1);
            return;
        }
        // Calendar or Fiscal
        if ($_Id('frm1702MX:rdoPg1I1Calendar').checked === false && $_Id('frm1702MX:rdoPg1I1Fiscal').checked === false) {
            alert("Please select if filing for Calendar or Fiscal Year (Page 1 Item 1).");
            changeCurrentPage(1);
            return;
        }
        // Validate Filing Year
        if (($_Id("frm1702MX:ddlPg1I2Date").value === "") || ($_Id("frm1702MX:txtPg1I2YearEnd").value === "")) {
            alert("Please select Month and Year for Year Ended (Page 1 Item 2).");
            changeCurrentPage(1);
            return;
        }
        if (validateYearEnd() === false) {
            changeCurrentPage(1);
            return;
        }
        // Validate that at least one ATC is ticked
        if (($_Id("frm1702MX:chkPg1I5ATCR1").checked || $_Id("frm1702MX:chkPg1I5ATCR2").checked) === false) {
            alert("Please tick at least one ATC option (Page 1 Item 5).");
            changeCurrentPage(1);
            return;
        }
        // Date of Incorporation / Organization
        if ($_Id('frm1702MX:txtPg1Pt1I8').value === '') {
            alert('Please provide Date of Incorporation / Organization (Part I Item 8).');
            changeCurrentPage(1);
            return;
        }
        // Validate Date of Incorporation and IC055
        if (checkDateOfIncorporation() === false) {
            changeCurrentPage(1);
            return;
        }
        // Overpayment option
        if (checkOverPayment() === false) {
            changeCurrentPage(1);
            return;
        }
        // Total of Amount in Details of Payment must be equal to Total Amount Payable if not zero
        if (validateDetailsOfPayment() === false) {
            changeCurrentPage(1);
            return;
        }
        if (checkCTCSEC() === false) {
            changeCurrentPage(1);
            return;
        }
        if ((NumWithComma(NumWithParenthesis($_Id("frm1702MX:txtPg4Sc3I4CD").value)) > 600000) && (($_Id("frm1702MX:chkPg1I5ATCR2").checked === false) || (($_Id("frm1702MX:chkPg1I5ATCR2").checked === true) && ($_Id("frm1702MX:drpPg1I5ATCR2").value !== "IC040" && $_Id("frm1702MX:drpPg1I5ATCR2").value !== "IC041")))) {

            if ($.trim($_Id("frm1702MX:txtPg2Pt6I45External").value) === "" && $.trim($_Id("frm1702MX:txtPg2Pt6I47Partner").value) === "") {
                alert("Please provide at least one name in Page 2 Part IV Items 45 & 46 OR Items 47 & 48");
                changeCurrentPage(2);
                return;
            }
            // Validate BIR Accreditation No.
            if (($.trim($_Id("frm1702MX:txtPg2Pt6I49BIRAccreditation").value) === "") || ($_Id("frm1702MX:txtPg2Pt6I49BIRAccreditation").value.length < 15)) {
                alert("Please provide a valid BIR Accreditation Number (Page 2 Part VI Item 49).");
                changeCurrentPage(2);
                return;
            }
        }
        if (validatePartVI46to48() === false) {
            changeCurrentPage(2);
            return;
        }
        if (validateBIRAccreditation() === false) {
            changeCurrentPage(2);
            return;
        }
        if (checkSc1I10EqualSc10I10() === false) {
            $_Id("frm1702MX:txtCurrentPage").value = 3;
            goToPage();
            return;
        }
        //validate description
        //Page 5 Schedule 4
        if (validate_nullDescription('txtPg5Sc4I1CD', 'txtPg5Sc4I1', 'Page 5 Schedule 4 Item 1') === false) {
            changeCurrentPage(5);
            return;
        }
        if (validate_nullDescription('txtPg5Sc4I2CD', 'txtPg5Sc4I2', 'Page 5 Schedule 4 Item 2') === false) {
            changeCurrentPage(5);
            return;
        }
        if (validate_nullDescription('txtPg5Sc4I3CD', 'txtPg5Sc4I3', 'Page 5 Schedule 4 Item 3') === false) {
            changeCurrentPage(5);
            return;
        }
        //Page 5 Schedule 5
        if (validate_nullDescription('txtPg5Sc5I2CD', 'txtPg5Sc5I2', 'Page 5 Schedule 5 Item 2') === false) {
            changeCurrentPage(5);
            return;
        }
        if (validate_nullDescription('txtPg5Sc5I3CD', 'txtPg5Sc5I3', 'Page 5 Schedule 5 Item 3') === false) {
            changeCurrentPage(5);
            return;
        }
        if (validate_nullDescription('txtPg5Sc5I4CD', 'txtPg5Sc5I4', 'Page 5 Schedule 5 Item 4') === false) {
            changeCurrentPage(5);
            return;
        }
        //Page 6 Schedule 5
        if (validate_nullDescription('txtPg6Sc5I36CD', 'txtPg6Sc5I36other', 'Page 6 Schedule 5 Item 36') === false) {
            changeCurrentPage(6);
            return;
        }
        if (validate_nullDescription('txtPg6Sc5I37CD', 'txtPg6Sc5I37other', 'Page 6 Schedule 5 Item 37') === false) {
            changeCurrentPage(6);
            return;
        }
        if (validate_nullDescription('txtPg6Sc5I38CD', 'txtPg6Sc5I38other', 'Page 6 Schedule 5 Item 38') === false) {
            changeCurrentPage(6);
            return;
        }
        if (validate_nullDescription('txtPg6Sc5I39CD', 'txtPg6Sc5I39other', 'Page 6 Schedule 5 Item 39') === false) {
            changeCurrentPage(6);
            return;
        }
        //Page 6 Schedule 6
        if (validate_nullDescription('txtPg6Sc6I1CD', 'txtPg6Sc6I1description,txtPg6Sc6I1legal', 'Page 6 Schedule 6 Item 1') === false) {
            changeCurrentPage(6);
            return;
        }
        if (validate_nullDescription('txtPg6Sc6I2CD', 'txtPg6Sc6I2description,txtPg6Sc6I2legal', 'Page 6 Schedule 6 Item 2') === false) {
            changeCurrentPage(6);
            return;
        }
        if (validate_nullDescription('txtPg6Sc6I3CD', 'txtPg6Sc6I3description,txtPg6Sc6I3legal', 'Page 6 Schedule 6 Item 3') === false) {
            changeCurrentPage(6);
            return;
        }
        if (validate_nullDescription('txtPg6Sc6I4CD', 'txtPg6Sc6I4description,txtPg6Sc6I4legal', 'Page 6 Schedule 6 Item 4') === false) {
            changeCurrentPage(6);
            return;
        }
        //Page 7 Schedule 8
        if (validate_nullDescription('txtPg7Sc8I11CD', 'txtPg7Sc8I11', 'Page 7 Schedule 8 Item 11') === false) {
            changeCurrentPage(7);
            return;
        }
        if (validate_nullDescription('txtPg7Sc8I12CD', 'txtPg7Sc8I12', 'Page 7 Schedule 8 Item 12') === false) {
            changeCurrentPage(7);
            return;
        }
        //Page 7 Schedule 10
        if (validate_nullDescription('txtPg7Sc10I2CD', 'txtPg7Sc10I2', 'Page 7 Schedule 10 Item 2') === false) {
            changeCurrentPage(7);
            return;
        }
        if (validate_nullDescription('txtPg7Sc10I3CD', 'txtPg7Sc10I3', 'Page 7 Schedule 10 Item 3') === false) {
            changeCurrentPage(7);
            return;
        }
        if (validate_nullDescription('txtPg7Sc10I5CD', 'txtPg7Sc10I5', 'Page 7 Schedule 10 Item 5') === false) {
            changeCurrentPage(7);
            return;
        }
        if (validate_nullDescription('txtPg7Sc10I6CD', 'txtPg7Sc10I6', 'Page 7 Schedule 10 Item 6') === false) {
            changeCurrentPage(7);
            return;
        }
        if (validate_nullDescription('txtPg7Sc10I7CD', 'txtPg7Sc10I7', 'Page 7 Schedule 10 Item 7') === false) {
            changeCurrentPage(7);
            return;
        }
        if (validate_nullDescription('txtPg7Sc10I8CD', 'txtPg7Sc10I8', 'Page 7 Schedule 10 Item 8') === false) {
            changeCurrentPage(7);
            return;
        }
        // If Page 3 Schedule 2 Item 7A is not zero then Page 2 Item 31A-35A should be mandatory
        if ((totalEX === 0) && (validate_nullDescription('txtPg3Sc2I7CA', 'txtPg2Pt4I31CA,txtPg2Pt4I32CA,txtPg2Pt4I33CA,txtPg2Pt4I35CA', 'Page 2 Part IV Item 31-35 Column A or Page 3 Schedule 2 Item 7 Column A') === false)) {
            changeCurrentPage(2);
            return;
        }
        // If Page 3 Schedule 2 Item 7B is not zero then Page 2 Item 31B-35B should be mandatory
        if ((totalSP === 0) && ($_Id("frm1702MX:txtPg3Sc1I12CB").value.toString() !== "0")) {
            if (validate_nullDescription('txtPg3Sc2I7CB', 'txtPg2Pt4I31CB,txtPg2Pt4I32CB,txtPg2Pt4I33CB,txtPg2Pt4I35CB', 'Page 2 Part IV Item 31-35 Column B or Page 3 Schedule 2 Item 7 Column B') === false) {
                changeCurrentPage(2);
                return;
            }
        }
        // If Page 6 Schedule 7A Item 5A is not zero then Page 6 Schedule 7A Item 4 Year Incurred must be mandatory
        if (validate_nullDescription('txtPg6Sc7AI5CA,txtPg6Sc7AI5CB,txtPg6Sc7AI5CC,txtPg6Sc7AI5CD', 'txtPg6Sc7AI5year', 'Page 6 Schedule 7A Item 5') === false) {
            changeCurrentPage(6);
            return;
        }
        // If Page 6 Schedule 7A Item 6A is not zero then Page 6 Schedule 7A Item 4 Year Incurred must be mandatory
        if (validate_nullDescription('txtPg6Sc7AI6CA,txtPg6Sc7AI6CB,txtPg6Sc7AI6CC,txtPg6Sc7AI6CD', 'txtPg6Sc7AI6year', 'Page 6 Schedule 7A Item 6') === false) {
            changeCurrentPage(6);
            return;
        }
        // If Page 6 Schedule 7A Item 7A is not zero then Page 6 Schedule 7A Item 4 Year Incurred must be mandatory
        if (validate_nullDescription('txtPg6Sc7AI7CA,txtPg6Sc7AI7CB,txtPg6Sc7AI7CC,txtPg6Sc7AI7CD', 'txtPg6Sc7AI7year', 'Page 6 Schedule 7A Item 6') === false) {
            changeCurrentPage(6);
            return;
        }
        // Page 4m NOLCO Validation (ATTACHMENTS)
        if (validateNOLCOAttachments() === false) {
            return;
        }
        // Balance Sheet must be greater than 0
        if (($_Id("frm1702MX:txtPg8Sc11I7").value.toString() === "0") || ($_Id("frm1702MX:txtPg8Sc11I12").value.toString() === "0") || ($_Id("frm1702MX:txtPg8Sc11I16").value.toString() === "0")) {
            alert("Balance Sheet (Page 8 Schedule 11 Items 7, 12 and 16) Total Assets AND Total Liabilities AND Total Equity must be greater than 0.");
            changeCurrentPage(8);
            return;
        }
        // Page 8 Item 7 (Total Assets) and Item 17 (Liabilities and Equity) must be equal
        if ($_Id("frm1702MX:txtPg8Sc11I7").value !== $_Id("frm1702MX:txtPg8Sc11I17").value) {
            alert("Balance Sheet (Page 8 Schedule 11 Item 7 and 17) Total Assets AND Total Liabilities and Equity must be equal.");
            changeCurrentPage(8);
            return;
        }
        // page 8 Schedule 12
        if ($_Id("frm1702MX:radPg8Sc12partner").checked == false && $_Id("frm1702MX:radPg8Sc12stockholder").checked == false && $_Id("frm1702MX:radPg8Sc12member").checked == false) {
            alert("Please choose 1 on the 3 boxes \"Stockholders, Partners or Members Information\" in Page 8 Schedule 12");
            changeCurrentPage(8);
            return;
        }
        if ($_Id("frm1702MX:radPg8Sc12partner").checked == true) {
            // Page 8 Schedule 12 check 2 mandatory rows 
            if (checkNullP8Sc12('txtPg8Sc12I1C1.txtPg8Sc12I1C2tin1.txtPg8Sc12I1C2tin2.txtPg8Sc12I1C2tin3.txtPg8Sc12I1C2tin4,txtPg8Sc12I2C1.txtPg8Sc12I2C2tin1.txtPg8Sc12I2C2tin2.txtPg8Sc12I2C2tin3.txtPg8Sc12I2C2tin4', '2', '5    ', 'txtPg8Sc12I1C3,txtPg8Sc12I1C4,txtPg8Sc12I2C3,txtPg8Sc12I2C4', 'Please provide at least 2 Registered Name with TIN, and Capital Contribution and Total Percent must be greater than zero. on Page 8 Schedule 12.') === false) {
                changeCurrentPage(8);
                return;
            }
        }
        else if ($_Id("frm1702MX:radPg8Sc12stockholder").checked == true && $_Id("frm1702MX:radPg8Sc12member").checked == false) {
            // Page 8 Schedule 12 check 1 mandatory rows 
            if (checkNullP8Sc12('txtPg8Sc12I1C1.txtPg8Sc12I1C2tin1.txtPg8Sc12I1C2tin2.txtPg8Sc12I1C2tin3.txtPg8Sc12I1C2tin4', '1', '5   ', 'txtPg8Sc12I1C3,txtPg8Sc12I1C4', 'Please provide at least 1 Registered Name with TIN, and Capital Contribution and Total Percent must be greater than zero. on Page 8 Schedule 12.') === false) {
                changeCurrentPage(8);
                return;
            }
        }
        //As of 10/08/2015 HD2014-1246020 : If the TP selects “Member”, system should accept zero (0) in ‘Capital Contribution’
        else if ($_Id("frm1702MX:radPg8Sc12member").checked == true) {
            // Page 8 Schedule 12 check 1 mandatory rows 
            if (checkNullP8Sc12('txtPg8Sc12I1C1.txtPg8Sc12I1C2tin1.txtPg8Sc12I1C2tin2.txtPg8Sc12I1C2tin3.txtPg8Sc12I1C2tin4', '1', '5   ', '', 'Please provide at least 1 Registered Name with TIN on Page 8 Schedule 12.') === false) {
                changeCurrentPage(8);
                return;
            }
        }
        // page 8 Schedule 12 check 6 to 20 rows if one has value 
        if (checkNullP8Sc12I1toI20() === false) {
            changeCurrentPage(8);
            return;
        }
        //page 9 check if one has value
        if (checkNullP9Sc13I5toI9() === false) {
            changeCurrentPage(9);
            return;
        }
        if (checkNullP9Sc13I10toI15() === false) {
            changeCurrentPage(9);
            return;
        }
        if (checkNullP9Sc13I16toI18() === false) {
            changeCurrentPage(9);
            return;
        }
        if (checkNullP9Sc14I2toI5() === false) {
            changeCurrentPage(9);
            return;
        }
        if (checkNullP9Sc14I6toI7() === false) {
            changeCurrentPage(9);
            return;
        }

        disableAllControl();

    
        alert("Validation successful. Click on Edit if you wish to modify your entries.");

        if (totalSP === 0) {
            $_Id("frm1702MX:txtATCSelectedIndex").value = $_Id("frm1702MX:drpPg3Sc1I11CB").selectedIndex;
        }

        return;
    }

    function initialValidateBeforeSave() { 
        var isValid = true, errorList = [];

        // RDO Code
        if ($_Id('frm1702MX:drpPg1Pt1I7RDO').value === '000') {
            errorList.push('Please select an RDO Code (Part I Item 7).');
        }
        // Registered Name
        if ($_Id('frm1702MX:txtPg1Pt1I9RegisteredName').value === '') {
            errorList.push('Please provide a Registered Name (Part I Item 9).');
        }
        // Registered Address
        if ($_Id('frm1702MX:txtPg1Pt1I10RegisteredAddress').value === '') {
            errorList.push('Please provide a Registered Address (Part I Item 10).');
        }
        // Contact Number
        if ($_Id('frm1702MX:txtPg1Pt1I11ContactNumber').value === '') {
            errorList.push('Please provide a Contact Number (Part I Item 11).');
        }
        // Email Address
        if ($_Id('frm1702MX:txtPg1Pt1I12Email').value === '') {
            errorList.push('Please provide an Email Address (Part I Item 12).');
        }
        // Main Line of Business
        if ($_Id('frm1702MX:txtPg1Pt1I13MainLine').value === '') {
            errorList.push('Please provide a Main Line of Business (Part I Item 13).');
        }
        // PSIC code
        var psicCode = $_Id('frm1702MX:txtPg1Pt1I14PSICCode').value;
        if ($.trim(psicCode) === '' || psicCode.length < 4) {
            errorList.push('Please provide a valid PSIC code (Part I Item 14).');
        }

        if (errorList.length > 0) {
            isValid = false;
            alert(errorList[0]);
            changeCurrentPage(1);
        }
        return isValid;
    }


    var globalcancelModalInit = 0;
    var globalcurrentDiv = "";
    var isFromAttachment = false;

    function cancel() {

        if (globalcancelModalInit != 1) {
            var inputs = document.getElementsByTagName("input");
            for (a = 0; a < inputs.length; a++) {
                if ((inputs[a].type == "checkbox" || inputs[a].type == "radio")) {
                    $(inputs[a].previousSibling).remove();
                    $(inputs[a]).addClass("styled");
                }
            }

            if (!!isFromAttachment) {
                $("#attachmentHeaderDiv").show();
            }

            $('#bg').show();
            $('.printSignFooterClass').hide();
            $('.imgClass').hide();
            $('body').css('background', '#FFF');

            $('#formPaper').css({ 'border': '#CCC 1px solid', 'margin': '0 auto', 'background': '#FFF' });
            $('#wrapper').css({ 'padding': '1%', 'margin': '0 auto' });
            $('#container').css({ 'padding': '1%', 'margin': '0 auto' });
            $('.labels').remove();

            var elem = document.getElementById('frmMain').elements;
            for (var i = 0; i < elem.length; i++) {
                if (elem[i].type != 'hidden') { // && elem[i].type != 'undefined' 
                    if (elem[i].type == 'text') {
                        document.getElementById(elem[i].id).readOnly = false;
                        document.getElementById(elem[i].id).style.height = "15px"
                        document.getElementById(elem[i].id).style.fontSize = "12px"
                        if (document.getElementById('frm1702MX:cmdValidate').disabled == false) {
                            if (disabledItems.contains(elem[i].id)) {
                                document.getElementById(elem[i].id).disabled = true;
                            }
                            else {
                                document.getElementById(elem[i].id).disabled = false;
                            }
                        }
                        else {
                            if (disabledItems.contains(elem[i].id)) {
                                document.getElementById(elem[i].id).disabled = true;
                            }
                            else {
                                document.getElementById(elem[i].id).disabled = false;
                            }
                        }
                    }
                    if (elem[i].type == 'radio' || elem[i].type == 'checkbox') {
                        if (document.getElementById('frm1702MX:cmdValidate').disabled == false) {
                            if (disabledItems.contains(elem[i].id)) {
                                document.getElementById(elem[i].id).disabled = true;
                            }
                            else {
                                document.getElementById(elem[i].id).disabled = false;
                            }
                        }
                        else {
                            if (disabledItems.contains(elem[i].id)) {
                                document.getElementById(elem[i].id).disabled = true;
                            }
                            else {
                                document.getElementById(elem[i].id).disabled = false;
                            }
                        }
                        document.getElementById(elem[i].id).style.height = "15px"
                        document.getElementById(elem[i].id).style.fontSize = "11px"
                    }
                    if (elem[i].type == 'select-one') {
                        $(elem[i]).show();
                    }
                }
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
                    if (document.getElementById('frm1702MX:cmdValidate').disabled == false) {
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
                document.getElementById('frm1702MX:txtPg1I2YearEnd').disabled = true;
                document.getElementById('frm1702MX:ddlPg1I2Date').disabled = true;
            }
        }
        else if (globalcancelModalInit == 1) {

            $('#bg').show();
            $('#' + globalcurrentDiv).removeClass();
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
                    if (document.getElementById('frm1702MX:cmdValidate').disabled == false) {
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
                document.getElementById('frm1702MX:txtPg1I2YearEnd').disabled = true;
                document.getElementById('frm1702MX:ddlPg1I2Date').disabled = true;
            }
            globalcancelModalInit = 0;
            globalcurrentDiv = "";
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

    function printPage(isAttachment, elems, attachmentPage) {
        var i, len = elems.length, tempElem = {}, tempVal = {}, tempVar = "";
        console.log(len);
        if (!isAttachment) {
            for (i = 0; i < len; i++) {
                if (elems[i] !== null && elems[i].type !== "hidden" && elems[i].type !== "undefined" && elems[i].id !== "") {
                    tempElem = $("#" + elems[i].id.split(":")[1]);
                    tempVar = elems[i].id.split(":")[1];
                    if (typeof (tempElem) !== "undefined" || tempElem !== null) {
                        if (elems[i].className.indexOf("dateInput") > -1) {
                            tempVal = elems[i].value.split("/");
                            if (tempVal.length > 0) {
                                $("#" + tempVar + "M").html(tempVal[0]);
                                $("#" + tempVar + "D").html(tempVal[1]);
                                $("#" + tempVar + "Y").html(tempVal[2]);
                            }
                        }
                        else if (elems[i].id.indexOf("drpPg1I5ATCR2") > -1 && elems[i].type === "select-one" && $_Id("frm1702MX:chkPg1I5ATCR2").checked === true) {
                            tempVal = elems[i].options[elems[i].selectedIndex].text.split("-");
                            $("#drpPg1I5ATCR2-1").html(tempVal[0]);
                            $("#drpPg1I5ATCR2-2").html(tempVal[1]);
                        }
                        else if (elems[i].id.indexOf("txtPg1Pt1I11ContactNumber") > -1) {
                            tempVal = elems[i].value;
                            //$("#txtPg1Pt1I11ContactNumber-1").html(tempVal.substring(0, 4));
                            //$("#txtPg1Pt1I11ContactNumber-2").html(tempVal.substring(4));
                        }
                        else if (elems[i].name === "BIRAccreditation") {
                            tempVal = elems[i].value;
                            $("#BIRAccreditation1").html(tempVal.substring(0, 2));
                            $("#BIRAccreditation2").html(tempVal.substring(2, 8));
                            $("#BIRAccreditation3").html(tempVal.substring(8, 11));
                            $("#BIRAccreditation4").html(tempVal.substring(11));
                        }
                            //else if (elems[i].className.indexOf("numbertext") > -1) {
                            //  tempElem.html(elems[i].value.replace(/,/g, ''));
                            //}
                        else if (elems[i].type === "text" || elems[i].type === "select-one" || elems[i].type === "select") {
                            tempVal = elems[i].value;
                            tempElem.html(elems[i].id === "frm1702MX:drpPg3Sc1I11CB" ? (tempVal * 100).toFixed(1) : tempVal);
                        }
                        else if (elems[i].type === "radio" || elems[i].type === "checkbox") {
                            tempElem.html(!!elems[i].checked ? "X" : "");
                        }
                    }
                }
            }
        }
        else {
            var regEx = new RegExp(attachmentPage);

            for (i = 0; i < len; i++) {
                if (elems[i] !== null && elems[i].type !== "hidden" && elems[i].type !== "undefined" && elems[i].id !== "") {
                    tempElem = $("#AttachPg" + currentAttachmentPage + elems[i].id.split(regEx)[1]);
                    tempVar = elems[i].id.split(regEx)[1];
                    if (typeof (tempElem) !== "undefined" || tempElem !== null) {
                        if (elems[i].className.indexOf("dateInput") > -1) {
                            tempVal = elems[i].value.split("/");
                            if (tempVal.length > 0) {
                                $("#" + tempVar + "M").html(tempVal[0]);
                                $("#" + tempVar + "D").html(tempVal[1]);
                                $("#" + tempVar + "Y").html(tempVal[2]);
                            }
                        }
                            //else if (elems[i].className.indexOf("numbertext") > -1) {
                            //  tempElem.html(elems[i].value.replace(/,/g, ''));
                            //}
                        else if (elems[i].type === "text" || elems[i].type === "select-one" || elems[i].type === "select") {
                            tempElem.html(elems[i].value);
                        }
                        else if (elems[i].type === "radio" || elems[i].type === "checkbox") {
                            tempElem.html(!!elems[i].checked ? "X" : "");
                        }
                    }
                }

            }
        }
    }

    var isFromPrint = false;

    function printOCR() {
        var elems, temp = "";

        if (!isFromPrint) {
            alert("This form must be printed on an A4 Size Paper. Please update your Printer Settings to ensure the correct printout of the form.\n\n" +
                  "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166 and all Headers & Footers must be set to empty.");
        }

        if (!!isFromAttachment) {
            var attachType = $_Id("attachTypeView").value;
            var attachNum = parseInt($_Id("attachmentCurrent").value);
            var tempArray = [];

            if (attachType === "EX") {
                tempArray = totalEXArray;
            }
            else if (attachType === "SP") {
                tempArray = totalSPArray;
            }

            temp = currentAttachmentPage + tempArray[attachNum - 1];

            $("#attachmentHeaderDiv").hide();
            $("#Page" + temp + "Content").hide();
            $("#Print" + currentAttachmentPage + "MContent").show();

            elems = $_Id("Page" + temp + "Content").getElementsByTagName("*");
        }
        else {
            $("#Page" + currentPage + "Content").hide();
            $("#Print" + currentPage + "Content").show();
            elems = $_Id("Page" + currentPage + "Content").getElementsByTagName("*");
        }

        var elems = $_Id("mainPages").getElementsByTagName("*");
        printPage(isFromAttachment, elems, temp);

        //var currentPage = document.getElementById("frm1702MX:txtCurrentPage").value;

        $('#bg').hide();
        $('.printSignFooterClass').css({ 'width': '94%', 'margin': 'auto', 'margin-top': '15px', 'display': 'block', 'position': 'relative', 'overflow': 'visible', 'page-break-before': 'always' });
        $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
       
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
        $("#Print8Content").show();
        $("#Print9Content").show();

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
        $("#Print8Content").hide();
        $("#Print9Content").hide();
         $('.printButtonClass').show();

        isFromPrint = true;
    }

    var disabledItems = new Array();
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
                    if (inputs[a].checked == false) {
                        img[a].src = "../img/emptycheckbox.png";
                    }
                    else {
                        img[a].src = "../img/withX.png";
                    }
                    inputs[a].parentNode.insertBefore(img[a], inputs[a]);
                }
            }
        }

        if (!!isFromAttachment) {
            $("#attachmentHeaderDiv").hide();
        }

        $('#bg').hide();
        $('.printSignFooterClass').css({ 'width': '94%', 'margin': 'auto', 'margin-top': '15px', 'display': 'block', 'position': 'relative', 'overflow': 'visible', 'page-break-before': 'always' });
        $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
        $('body').css('background', '#FFF');

        $('#formPaper').css({ 'width': '8.2in !important', 'padding': '0px 2px 0px 2px' });
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
                    //document.getElementById(elem[i].id).style.height = "9px";
                    document.getElementById(elem[i].id).style.fontSize = "12px";
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
                    $(elem[i]).hide();
                    var label = "<div class='labels'>".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</div>");
                    $(elem[i]).after(label);
                }
            }
        }

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

        
    }

    function printModal(modalID) {
        alert("This form must be printed on an A4 Size Paper. Please update your Printer Settings to ensure the correct printout of the form.\n\n" +
              "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166 and all Headers & Footers must be set to empty.");

        globalcancelModalInit = 1;
        globalcurrentDiv = modalID;
        $('#bg').hide();
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

    function getDisabledText() {
        $("input:disabled,textarea:disabled,select:disabled,button:disabled", $("#containerPage")).addClass("disabledInputs");
        $("input:disabled,textarea:disabled,select:disabled,button:disabled", $("#modalContainer")).addClass("disabledInputs");
        $("input:radio,input:checkbox").prop("class", "styled");
    }

    var disableElem = true;
    var enableElem = false;

    var isValidated = false;

    function disableAllControl() {

        getDisabledText();

        $("input,textarea,select,button", $("#containerPage")).attr("disabled", true);
        $("input,textarea,select,button", $("#modalContainer")).attr("disabled", true);
        $("input:radio,input:checkbox", $("#containerPage")).prop("disabled", true);

        setFooterControls(true);

        enablePrintAndAttachmentPager();

        disableElem;
        enableElem;

        isValidated = true;
    }

    function enableAllControl() {

        $("input,textarea,select,button", $("#containerPage")).attr("disabled", false);
        $("input,textarea,select,button", $("#modalContainer")).attr("disabled", false);
        $(".disabledInputs").attr("disabled", true);
        $(".disabledInputs").removeClass("disabledInputs");
        $("input:radio,input:checkbox", $("#containerPage")).prop("disabled", false);
        $("input:radio,input:checkbox", $("#containerPage")).prop("class", "styled");

        setFooterControls(false);

        disableElem;
        enableElem;

        //call manual checking enable 
        checkEnableManual();
        enableMCITFields();

        isValidated = false;

        
    }

    function enablePrintAndAttachmentPager() {

        $("[value=' Close ']").each(function () {
            this.disabled = false;
        });

        $("[value=' Print ']").each(function () {
            this.disabled = false;
        });

        $_Id("attachmentCurrent").disabled = false;
        $_Id("viewExempt").disabled = false;
        $_Id("viewSpecialRate").disabled = false;
        $("#attachmentPager :input").attr("disabled", false);
    }

    function setFooterControls(enable) {
        $_Id('frm1702MX:cmdValidate').disabled = enable;
        $_Id('frm1702MX:cmdEdit').disabled = !enable;
        $_Id('frm1702MX:btnFinalCopy').disabled = !enable;
        $_Id('btnUpload').disabled = !enable;
        $_Id('btnPrint').disabled = !enable;
    }

    function enablePaging() {
        //enable paging
        d.getElementById('Button1').disabled = false;
        d.getElementById('Button2').disabled = false;
        d.getElementById('frm1702MX:txtCurrentPage').disabled = false;
        d.getElementById('frm1702MX:txtMaxPage').disabled = false;
        d.getElementById('frm1702MX:txtMaxPage').readOnly = true;
        d.getElementById('viewMainBtn').disabled = false;
        d.getElementById('viewAttachBtn').disabled = false;
    }

   
    function getValAmount(param) {
        var num = 0, obj = document.getElementById('frm1702MX:' + param);

        if (obj === null || typeof (obj) === "undefined" || obj === "undefined") {
            num = 0;
        }
        else {
            num = isNaN(NumWithComma(NumWithParenthesis(obj.value))) ? 0 : NumWithComma(NumWithParenthesis(obj.value));
        }

        return num;
    }

    function getVal(param) {
        var alpha = '', obj = document.getElementById('frm1702MX:' + param);

        if (obj === null || typeof (obj) === "undefined" || obj === "undefined") {
            alpha = '';
        }
        else {
            if (obj.className.indexOf("dateInput") > -1) {
                var dateArray = obj.value.split('/');

                if (dateArray.length === 3) {
                    alpha = dateArray[2] + '-' + dateArray[0] + '-' + dateArray[1];
                }
            }
            else {
                alpha = obj.value;
            }
        }

        alpha = alpha.replace(/&/g, '&amp;');
        alpha = alpha.replace(/</g, '&lt;');
        alpha = alpha.replace(/>/g, '&gt;');

        return alpha;
    }

    function attchmPopulateScheduleA(attachNum) {
        populateScheduleA(getVal('txtPg1' + attachNum + 'ScAI1'), getVal('txtPg1' + attachNum + 'ScAI2'), getVal('txtPg1' + attachNum + 'ScAI3'), getVal('txtPg1' + attachNum + 'ScAI4'), '20' + getVal('txtPg1' + attachNum + 'ScAI5year') + '-' + getVal('txtPg1' + attachNum + 'ScAI5month') + '-01', '20' + getVal('txtPg1' + attachNum + 'ScAI6year') + '-' + getVal('txtPg1' + attachNum + 'ScAI6month') + '-01');
    }

    function attchmPopulateScheduleB(attachNum) {
        populateScheduleB(getValAmount('txtPg1' + attachNum + 'ScBI1'), getValAmount('txtPg1' + attachNum + 'ScBI2'), getValAmount('txtPg1' + attachNum + 'ScBI3'), getValAmount('txtPg1' + attachNum + 'ScBI4'), getValAmount('txtPg1' + attachNum + 'ScBI5'),
                            getValAmount('txtPg1' + attachNum + 'ScBI6'), getValAmount('txtPg1' + attachNum + 'ScBI7'), getValAmount('txtPg1' + attachNum + 'ScBI8'), getValAmount('txtPg1' + attachNum + 'ScBI9'), getValAmount('txtPg1' + attachNum + 'ScBI10'),
                            getValAmount('txtPg1' + attachNum + 'ScBI11'), getValAmount('txtPg1' + attachNum + 'ScBI12'));
    }

    function attchmPopulateScheduleC(attachNum) {
        populateScheduleC(getValAmount('txtPg1' + attachNum + 'ScCI1'), getValAmount('txtPg1' + attachNum + 'ScCI2'), getValAmount('txtPg1' + attachNum + 'ScCI3'),
                            getValAmount('txtPg1' + attachNum + 'ScCI4'), getValAmount('txtPg1' + attachNum + 'ScCI5'), getValAmount('txtPg1' + attachNum + 'ScCI6'), getValAmount('txtPg1' + attachNum + 'ScCI7'));
    }

    function attchmPopulateScheduleD(attachNum) {
        populateScheduleD(getValAmount('txtPg2' + attachNum + 'ScDI1'), getValAmount('txtPg2' + attachNum + 'ScDI2'), getValAmount('txtPg2' + attachNum + 'ScDI3'),
                            getValAmount('txtPg2' + attachNum + 'ScDI4'), getValAmount('txtPg2' + attachNum + 'ScDI5'), getValAmount('txtPg2' + attachNum + 'ScDI6'));
    }

    function attchmPopulateScheduleE1(attachNum) {
        populateScheduleE1(getValAmount('txtPg2' + attachNum + 'ScE1I1'), getValAmount('txtPg2' + attachNum + 'ScE1I2'), getValAmount('txtPg2' + attachNum + 'ScE1I3'),
                            getValAmount('txtPg2' + attachNum + 'ScE1I4'), getValAmount('txtPg2' + attachNum + 'ScE1I5'), getValAmount('txtPg2' + attachNum + 'ScE2I6'),
                            getValAmount('txtPg2' + attachNum + 'ScE2I7'), getValAmount('txtPg2' + attachNum + 'ScE2I8'), getValAmount('txtPg2' + attachNum + 'ScE2I9'),
                            getValAmount('txtPg2' + attachNum + 'ScE2I10'), getValAmount('txtPg2' + attachNum + 'ScE2I11'), getValAmount('txtPg2' + attachNum + 'ScE2I12'),
                            getValAmount('txtPg2' + attachNum + 'ScE2I13'), getValAmount('txtPg2' + attachNum + 'ScE2I14'), getValAmount('txtPg2' + attachNum + 'ScE2I15'),
                            getValAmount('txtPg2' + attachNum + 'ScE2I16'), getValAmount('txtPg2' + attachNum + 'ScE2I17'), getValAmount('txtPg2' + attachNum + 'ScE2I18'),
                            getValAmount('txtPg2' + attachNum + 'ScE2I19'), getValAmount('txtPg2' + attachNum + 'ScE3I20'), getValAmount('txtPg2' + attachNum + 'ScE3I21'),
                            getValAmount('txtPg2' + attachNum + 'ScE3I22'), getValAmount('txtPg2' + attachNum + 'ScE3I23'), getValAmount('txtPg2' + attachNum + 'ScE3I24'),
                            getValAmount('txtPg2' + attachNum + 'ScE3I25'), getValAmount('txtPg2' + attachNum + 'ScE3I26'), getValAmount('txtPg2' + attachNum + 'ScE3I27'));
    }

    function attchmPopulateScheduleF(attachNum, param) {
        populateScheduleF(getVal('txtPg3' + attachNum + 'ScFI1other'), getValAmount('txtPg3' + attachNum + 'ScFI1C1'),
                            getVal('txtPg3' + attachNum + 'ScFI2other'), getValAmount('txtPg3' + attachNum + 'ScFI2C1'),
                            (param > 1) ? '' : getVal('txtPg3' + attachNum + 'ScFI3other'), (param > 1) ? 0 : getValAmount('txtPg3' + attachNum + 'ScFI3C1'),
                            getValAmount('txtPg3' + attachNum + 'ScFI4C1'),
                            OtherTaxableIncomeNotSubjectToFinalTaxList);
    }

    function attchmPopulateScheduleG(attachNum, param1, param2) {
        populateScheduleG(getValAmount('txtPg3' + attachNum + 'ScGI1'),
                            getVal('txtPg3' + attachNum + 'ScGI2other'), getVal('txtPg3' + attachNum + 'ScGI3other'), (param1 > 1) ? '' : getVal('txtPg3' + attachNum + 'ScGI4other'),
                            getValAmount('txtPg3' + attachNum + 'ScGI2C1'), getValAmount('txtPg3' + attachNum + 'ScGI3C1'), (param1 > 1) ? 0 : getValAmount('txtPg3' + attachNum + 'ScGI4C1'),
                            AmortizationList,
                            getValAmount('txtPg3' + attachNum + 'ScGI5'), getValAmount('txtPg3' + attachNum + 'ScGI6'), getValAmount('txtPg3' + attachNum + 'ScGI7'),
                            getValAmount('txtPg3' + attachNum + 'ScGI8'), getValAmount('txtPg3' + attachNum + 'ScGI9'), getValAmount('txtPg3' + attachNum + 'ScGI9'),
                            getValAmount('txtPg3' + attachNum + 'ScGI10'), getValAmount('txtPg3' + attachNum + 'ScGI11'), getValAmount('txtPg3' + attachNum + 'ScGI12'), getValAmount('txtPg3' + attachNum + 'ScGI13'),
                            getValAmount('txtPg3' + attachNum + 'ScGI14'), getValAmount('txtPg3' + attachNum + 'ScGI15'), getValAmount('txtPg3' + attachNum + 'ScGI16'),
                            getValAmount('txtPg3' + attachNum + 'ScGI17'), getValAmount('txtPg3' + attachNum + 'ScGI18'), getValAmount('txtPg3' + attachNum + 'ScGI19'), getValAmount('txtPg3' + attachNum + 'ScGI20'),
                            getValAmount('txtPg3' + attachNum + 'ScGI21'), getValAmount('txtPg3' + attachNum + 'ScGI22'), getValAmount('txtPg3' + attachNum + 'ScGI23'),
                            getValAmount('txtPg3' + attachNum + 'ScGI24'), getValAmount('txtPg3' + attachNum + 'ScGI25'), getValAmount('txtPg3' + attachNum + 'ScGI26'),
                            getValAmount('txtPg3' + attachNum + 'ScGI27'), getValAmount('txtPg3' + attachNum + 'ScGI28'), getValAmount('txtPg3' + attachNum + 'ScGI29'),
                            getValAmount('txtPg4' + attachNum + 'ScGI30'), getValAmount('txtPg4' + attachNum + 'ScGI31'), getValAmount('txtPg4' + attachNum + 'ScGI32'),
                            getValAmount('txtPg4' + attachNum + 'ScGI33'), getValAmount('txtPg4' + attachNum + 'ScGI34'), getValAmount('txtPg4' + attachNum + 'ScGI35'),
                            getVal('txtPg4' + attachNum + 'ScGI36other'), getVal('txtPg4' + attachNum + 'ScGI37other'),
                            getVal('txtPg4' + attachNum + 'ScGI38other'), (param2 > 1) ? '' : getVal('txtPg4' + attachNum + 'ScGI39other'),
                            getValAmount('txtPg4' + attachNum + 'ScGI36C1'), getValAmount('txtPg4' + attachNum + 'ScGI37C1'), getValAmount('txtPg4' + attachNum + 'ScGI38C1'), (param2 > 1) ? 0 : getValAmount('txtPg4' + attachNum + 'ScGI39C1'),
                            OtherList);
    }

    function attchmPopulateScheduleH(attachNum, param) {
        populateScheduleH(getVal('txtPg4' + attachNum + 'ScHI1C1'), getVal('txtPg4' + attachNum + 'ScHI1C2'), getValAmount('txtPg4' + attachNum + 'ScHI1C3'),
                            getVal('txtPg4' + attachNum + 'ScHI2C1'), getVal('txtPg4' + attachNum + 'ScHI2C2'), getValAmount('txtPg4' + attachNum + 'ScHI2C3'),
                            getVal('txtPg4' + attachNum + 'ScHI3C1'), getVal('txtPg4' + attachNum + 'ScHI3C2'), getValAmount('txtPg4' + attachNum + 'ScHI3C3'),
                            (param > 1) ? '' : getVal('txtPg4' + attachNum + 'ScHI4C1'), (param > 1) ? '' : getVal('txtPg4' + attachNum + 'ScHI4C2'), (param > 1) ? 0 : getValAmount('txtPg4' + attachNum + 'ScHI4C3'),
                            getValAmount('txtPg4' + attachNum + 'ScHI5'), SpecialAllowableItemizedDeductionsList);
    }



    //Added as of 03/29/2017
    function returnPeriod() {
        var yyyyR = '20' + getVal('txtPg1I2YearEnd');
        var mmR = getVal('ddlPg1I2Date');
        var ddR = new Date(yyyyR, mmR, 0).getDate();
        var returnPeriodFormat = yyyyR + "-" + (mmR) + "-" + ddR;
        return returnPeriodFormat;
    }
    
    