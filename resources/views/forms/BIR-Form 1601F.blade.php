@extends('layouts.app')

@section('content')
    <!-- Styles -->
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
    <!-- Modals -->
            <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Success!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body message">
                        
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Okay</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Submit / Final Copy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                   <div class="modal-body">
                        <div class="alert alert-info message">
                            Are you sure you want to submit this form?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="submitData();">Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    </div>
                </div>
              </div>
            </div>

    <form id="frmMain" name="frmMain">
        @csrf
        <input type="hidden" name="company" value="{{ $company->id}}">
        <input type="hidden" name="form_no" value="{{ $action == 'new' ? $form_no : $data->form_no }}">
        <input type="hidden" name="form_id" value="{{ $action == 'new' ? '' : $data->id }}">

        <div id="container">
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 909px; ">
            
                <table border="0" width="806" cellspacing="0" cellpadding="0" align="center">
                <tr><td>
            
                <div id="formPaper">
                    <div id="mainContent">
                        <table width="806" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table width="806" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
                                        <tr>
                                            <td width="82"  style='padding:0px;' valign="middle" align="center">                                        
                                                <p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p>
                                            </td>
                                            <td width="158" valign="middle">
                                                <label face="Arial" size="1px">Republika ng Pilipinas
                                                <br/>Kagawaran ng Pananalapi
                                                <br/>Kawanihan ng Rentas Internas</label>
                                            </td>
                                            <td width="0" valign="center">
                                                <font size="5px" style="font-weight:bold;">Monthly Remittance Return of
                                                <br/>Final Income Taxes Withheld</font>
                                            </td>
                                            <td width="145" valign="center">
                                                <label face="Arial" size="1px">BIR Form No.<br/></label>
                                                <font face="Arial" size="6px">1601-F<br/></font>
                                                <label face="Arial" size="1px">September 2005 (ENCS)</label>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="230" valign="top" class="tblFormTd">
                                                <table width="225" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td colspan="3"><font size="1" style="font-size: 11px;">For the Month (MM/YYYY)</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td width="110">
                                                            <select size="1" name="frm1601F:j_id201" id="frm1601F:j_id201" >
                                                                    <option value="01" selected="selected">01 - January</option>
                                                                    <option value="02">02 - February</option>
                                                                    <option value="03">03 - March</option>
                                                                    <option value="04">04 - April</option>
                                                                    <option value="05">05 - May</option>
                                                                    <option value="06">06 - June</option>
                                                                    <option value="07">07 - July</option>
                                                                    <option value="08">08 - August</option>
                                                                    <option value="09">09 - September</option>
                                                                    <option value="10">10 - October</option>
                                                                    <option value="11">11 - November</option>
                                                                    <option value="12">12 - December</option>
                                                            </select>
                                                        </td>
                                                        <td width="92" align="left"> <input type="text" value="{{ $action != 'new' ? $data->item1B : ''}}" size="4" name="frm1601F:txtYear" maxlength="4" id="frm1601F:txtYear" style="width:61px" onblur="blockletterWithout2Decimal(this)" onkeypress="return wholenumber(this, event)" /></td>

                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="160" valign="top" class="tblFormTd">
                                                <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1601F:j_id217" class="iceSelOneRb-dis fieldText1-dis">
                                                                <div align="center" style="padding: 1px 0 1px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                        <tbody>
                                                                            <tr>
                                                                                    <td><input style="vertical-align: text-top;" type="radio" value="Y" name="frm1601F:AmendedRtn" id="frm1601F:AmendedRtn_1" onclick="d.getElementById('frm1601F:txtTax17').disabled = false;"  /><label for="frm1601F:AmendedRtn_1" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                    <td><input style="vertical-align: text-top;" type="radio" value="N"  name="frm1601F:AmendedRtn" id="frm1601F:AmendedRtn_2" onclick="d.getElementById('frm1601F:txtTax17').disabled = true;d.getElementById('frm1601F:txtTax17').value = '0.00';computeofTotalWithheldTax()" checked="checked" /><label for="frm1601F:AmendedRtn_2" style="font-size:12px;" >No</label></td>
                                                                               
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="170" valign="top" class="tblFormTd">
                                                <table width="152" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">No. of Sheets Attached?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" value="0" style="text-align: right;" size="4" name="frm1601F:txtSheets" maxlength="2" id="frm1601F:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="180" valign="top" class="tblFormTd">
                                                <table width="140" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Any Taxes Withheld?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1601F:j_id252" class="iceSelOneRb fieldText1">
                                                                <div align="center" style="padding: 1px 0 1px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                        <tbody>
                                                                            <tr>
                                                                                    <td><input style="vertical-align: text-top;" type="radio" value="Y" name="frm1601F:TaxWithheld" id="frm1601F:TaxWithheld_1"  /><label for="frm1601F:j_id252:_1" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                    <td><input style="vertical-align: text-top;" type="radio" value="N" name="frm1601F:TaxWithheld" id="frm1601F:TaxWithheld_2"  onclick="cancelAllCompute()" /><label for="frm1601F:j_id252:_2" style="font-size:12px;" >No</label></td>
                                                                             
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="799" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="12%">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part I</font></td>
                                                        <td width="88%">
                                                            <div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;">Background Information</font></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width = "800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="250" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{ $company->tin1 }}" size="2" name="frm1601F:txtTIN1" maxlength="3" id="frm1601F:txtTIN1" onkeypress="return wholenumber(this, event)" disabled />
                                                                <input type="text" value="{{ $company->tin2 }}" size="2" name="frm1601F:txtTIN2" maxlength="3" id="frm1601F:txtTIN2" onkeypress="return wholenumber(this, event)" disabled />
                                                                <input type="text" value="{{ $company->tin3 }}" size="2" name="frm1601F:txtTIN3" maxlength="3" id="frm1601F:txtTIN3" onkeypress="return wholenumber(this, event)" disabled />
                                                                <input type="text" value="{{ $company->tin4 }}" size="2" name="frm1601F:txtBranchCode" maxlength="3" id="frm1601F:txtBranchCode" onkeypress="return letternumber(event)" disabled />
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="132" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                        <td id="rdoSelect">
                                                            <select class='iceSelOneMnu' id='frm1601F:txtRDOCode' name='frm1601F:txtRDOCode' size='1'>
                                                                <option value='{{ $company->rdo_code }}'>{{ $company->rdo_code }}</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="355" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">Line of Business/Occupation&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{ $company->line_business }}" size="25" name="frm1601F:txtLineBus" maxlength="60" id="frm1601F:txtLineBus" onblur="return capital(this, event)" disabled="" />
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="80%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Withholding Agent's Name (Last Name, First Name, Middle Name for Individuals) /(Registered Name for Non-Individuals)</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{ $company->registered_name }}" size="70" name="frm1601F:txtTaxpayerName" maxlength="50" id="frm1601F:txtTaxpayerName" onblur="return capital(this, event)" disabled="" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="20%" valign="top" class="tblFormTd">
                                                <table width="149" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="149"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font><font size="1" style="font-size: 11px;">Telephone
                                                                Number</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <input type="text" value="{{ $company->tel_number }}" size="15" name="frm1601F:txtTelNum" maxlength="20" id="frm1601F:txtTelNum" onkeypress="return wholenumber(this, event)" disabled="" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="90%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Registered Address</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{ $company->address }}" style="width: 99%" name="frm1601F:txtAddress" maxlength="150" id="frm1601F:txtAddress" onblur="return capital(this, event)" disabled /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="10%" valign="top" class="tblFormTd">
                                                <table width="149" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="149"><font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font><font size="1" style="font-size: 11px;">Zip
                                                                Code</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <input type="text" value="{{ $company->zip_code }}" size="2" name="frm1601F:txtZipCode" maxlength="12" id="frm1601F:txtZipCode" onkeypress="return wholenumber(this, event)" disabled/>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="800">
                                        <tr>
                                            <td class="tblFormTd" valign="top" width="265">
                                                <table width="174" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="174"><font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font><font size="1" style="font-size: 11px;">Category
                                                                of Withholding Agent</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:160px;" id="frm1601F:j_id392" class="iceSelOneRb fieldText1">
                                                                    <div align="center" style="padding: 5px 0 5px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                            <tbody>
                                                                                <tr>
                                                                                        <td><input style="vertical-align: text-top;" type="radio" value="P" name="frm1601F:CatAgent" id="frm1601F:CatAgent_P" onclick="changedrpATCList(this)" /><label for="frm1601F:CatAgent_1" style="font-size:11px;" >Private</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                        <td><input style="vertical-align: text-top;" type="radio" value="G" name="frm1601F:CatAgent" id="frm1601F:CatAgent_G" onclick="changedrpATCList(this)" /><label for="frm1601F:CatAgent_2" style="font-size:11px;" >Government</label></td>
                                                                                 
                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td class="tblFormTd" valign="top" width="474">
                                                <table width="382" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="382"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font><font size="1" style="font-size: 11px;">Are
                                                                there payees availing of tax relief under Special Law
                                                                or International Tax Treaty?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:300px" id="frm1601F:j_id398" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <div align="center" style="padding: 5px 0 5px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                            <tbody>
                                                                                <tr>
                                                                                        <td><input style="vertical-align: text-top;" type="radio" value="Y" name="frm1601F:SpecialTax" id="frm1601F:SpecialTax_1"  onclick="enableSelTreaty()" /><label for="frm1601F:SpecialTax_1" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                            <div align="center" style="width: 300px; padding-top: 8px;">
                                                                <label id="frm1601F:j_id401" class="iceOutLbl fieldLabel1" style="font-size: 11px;">If yes, specify</label>
                                                                <select style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; background-color: rgb(220, 220, 220);" size="1" name="frm1601F:drpSpecialTax" id="frm1601F:drpSpecialTax" >
                                                                        <option value="0" selected="selected"> </option>
                                                                        <option value="1">Special Rate</option>
                                                                        <option value="2">International Tax Treaty</option>
                                                                        <option value="3">Both</option>
                                                                   
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="800" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="100">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part
                                                                II</font></td>
                                                        <td width="">
                                                            <div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;">Computation
                                                                    of Tax</font></div>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- add - by lovell -->
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td valign="top" class="tblFormTd">
                                                <table id="tblPartIIComputeTax" style="margin-left:5px;"  border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <td width="40%"><font size="2" style="font-weight:bold;">&nbsp;</font><font size="1" style="font-weight:bold;font-size: 12px;">NATURE OF INCOME PAYMENT </font></td>
                                                            <td width="10%" style="text-align: center;"><a href="#" id="btnAddATCPartII" onclick="showPartIIATC()" style="font-size: 12px;">ATC <!--<input type="button" class="printButtonClass" id="btnAddATCPartII" value="ATC" onclick="showPartIIATC()" />--></a> </td>
                                                            <td width="21%" style="text-align: center;"><font size="1" style="font-weight:bold;font-size: 12px;">TAX BASE</font></td>
                                                            <td width="9%"  style="text-align: center;"><font size="1" style="font-weight:bold;font-size: 12px;">TAX RATE</font></td>
                                                            <td width="20%" style="text-align: center;"><label size="1" style="font-weight:bold;font-size: 12px;">TAX REQUIRED TO <br/> BE  WITHHELD</label></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyComputeTax">
                                                         <tr><td></td></tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;&nbsp;</font></td>
                                                        <td width="426"><font size="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Tax Required to be Withheld</font></font> <font size="1" face="Arial, Helvetica, sans-serif">based on Regular Rates</font></td>
                                                        <td width="94">
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td width="193"><span class="spacePadder"><font size="2" style="font-weight:bold;">14</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220);color: black; text-align: right;" size="20" name="frm1601F:txtTax14" maxlength="25" id="frm1601F:txtTax14"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;15&nbsp;</font></td>
                                                        <td><font size="1">&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Tax Required to be Withheld based on Tax Treaty Rates (from</font>
                                                            <a href="#" id="btnAddSchedI" onclick="showAddSchedI()" style="font-size: 11px;">Schedule 1<!--<input type="button" class="printButtonClass" id="btnAddSchedI" value="Schedule 1" onclick="showAddSchedI();" />--></a>)  </td>
                                                        <td>
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">15</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220);color: black; text-align: right;" size="20" name="frm1601F:txtTax15" maxlength="25" id="frm1601F:txtTax15"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;16&nbsp;</font></td>
                                                        <td><font size="1">&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total (Sum of Items 14 and 15)</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                                                        <td>
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">16</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20"  maxlength="25" name="frm1601F:txtTax16" id="frm1601F:txtTax16" disabled="true" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;17&nbsp;</font></td>
                                                        <td><font size="1">&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;">Less : Tax Remitted in Return Previously Filed, if this is an amended return</font></td>
                                                        <td>&nbsp;</td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">17</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeofTotalWithheldTax()" name="frm1601F:txtTax17" id="frm1601F:txtTax17" disabled="true" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;</font></td>
                                                        <td><font size="1">&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Still Due (Overremittance)</font></td>
                                                        <td>&nbsp;</td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">18</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20"  maxlength="25" id="frm1601F:txtTax18" name="frm1601F:txtTax18" disabled="true" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">&nbsp;Add: Penalties</font></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <table width="511">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="161" align="center"><font size="1" face="Arial" style="font-size: 11px;">Surcharge</font></td>
                                                                        <td width="160" align="center"><font size="1" face="Arial" style="font-size: 11px;">Interest</font></td>
                                                                        <td width="174" align="center"><font size="1" face="Arial" style="font-size: 11px;">Compromise</font></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <table width="512">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="161" align="center">
                                                                            <font size="2" face="Arial"><b>19A</b>&nbsp;
                                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="15" name="frm1601F:txtTax19A" maxlength="25" id="frm1601F:txtTax19A" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                                            </font>
                                                                        </td>
                                                                        <td width="161" align="center">
                                                                            <font size="2" face="Arial"><b>19B</b>&nbsp;
                                                                                <input type="text" value="0.00" style="text-align: right;" size="15" maxlength="25" name="frm1601F:txtTax19B" id="frm1601F:txtTax19B" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                                            </font>
                                                                        </td>
                                                                        <td width="174" align="center">
                                                                            <font size="2" face="Arial"><b>19C</b>&nbsp;
                                                                                <input type="text" value="0.00" style="text-align: right;" size="15" name="frm1601F:txtTax19C" maxlength="25" id="frm1601F:txtTax19C" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">19D</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" name="frm1601F:txtTax19D" id="frm1601F:txtTax19D" disabled="true" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font></td>
                                                        <td colspan="2"><font size="1">&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Amount Still Du</font><font size="1" face="Arial" style="font-size: 11px;">e/ (Overremittance) (Sum of Items 18 and 19D)</font></td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">20</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" id="frm1601F:txtTax20" name="frm1601F:txtTax20" disabled="true" class="iceInpTxt-dis" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="imgClass" align='center' style="display:none; width:800px !important;">
                                        <table style="border-top: 3px solid black; font-family:arial; font-size:10px; text-align: center; vertical-align: top; table-layout: fixed;">
                                          <col width="17%" />
                                          <col width="17%" />
                                          <col width="17%" />
                                          <col width="17%" />
                                          <col width="32%" />
                                          <tr>
                                            <td colspan="5" style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge and belief,is true and correct, 
                                                        <br>pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.<br></td>
                                          </tr>
                                          <tr>
                                            <td colspan="4"><b>21</b>_____________________________________________________________________
                                                            <br>President/Vice President/Principal Officer/Accredited Tax Agent/
                                                            <br>Authorized Representative/Taxpayer
                                                            <br>(Signature Over Printed Name)</td>
                                            <td><b>22</b>__________________________________
                                                <br>Treasurer/Assistant Treasurer
                                                <br>(Signature Over Printed Name)
                                                <br>&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td colspan="2">__________________________________
                                                            <br>Title/Position of Signatory</td>
                                            <td colspan="2">__________________________________
                                                            <br>TIN of Signatory</td>
                                            <td>__________________________________
                                                <br>Title/Position of Signatory</td>
                                          </tr>
                                          <tr>
                                            <td colspan="2">______________________________________
                                                            <br>Tax Agent Acc. No./ Atty's Roll No. (If Applicable)</td>
                                            <td>______________
                                                <br>Date of Issuance</td>
                                            <td>______________
                                                <br>Date of Expiry</td>
                                            <td>__________________________________
                                                <br>TIN of Signatory</td>
                                          </tr>
                                        </table>
                                    </div>
                                    <div class="imgClass" align='center' style="display:none; width:800px !important;">
                                        <img id="frm1601F:jurat" src="{{ asset('images/bottom_img/1601F_new.jpg') }}" width="800"/>
                                    </div>
                                    <div class="imgClass" align='center' style="display:none; width:800px !important;">
                                        <table style="font-size:12px; text-align: left; vertical-align: top;">
                                          <tr>
                                            <td>Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br /><br /><br /><br /><br /></td>
                                          </tr>
                                        </table>
                                    </div>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table width="789" cellspacing="0" cellpadding="0" border="0">
                                                                <tbody>
                                                                    <tr valign="middle">
                                                                        <td width="46"></td>
                                                                        <td width="640" style="width: 100%">
                                                                            <div align="center">
                                                                                <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm0601F:cmdValidate" id="frm0601F:cmdValidate" onclick="validate()" />
                                                                                <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm0601F:cmdEdit" id="frm0601F:cmdEdit" onclick="enableAllControl()"/>
                                                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm0601F:btnFinalCopy" id="frm0601F:btnFinalCopy" onclick="openAlertEmail();" />
                                                                                <div id="msg" class="printButtonClass" style="display:none;"></div>                                                                             
                                                                            </div>
                                                                        </td>
                                                                        <div id="DummyTxt" style='display:none;'>  </div>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                </td>
                <td valign="top"><img id="frm1601F:bcsImg" src="{{ asset('images/BCS.jpg') }}"/></td>
                </tr>
                </table>
                
            </div>
        </div>
        <!-- Lovell modal ComputeTax  -->
        <div id="modalAtc" class="aBox" style="width:94%; display:none; height:85%; position:fixed; top:14%; left:3%; right:auto; overflow-y:auto; overflow-x:hidden; background:#fff;" align="left"> 
            <br/>
            <div class="modalContent" align="left">
                
            </div>
            <div class="modalHeader" align="center" style="width: 100%">
                <table cellspacing="3" cellpadding="3" style="position: static;width: 100%">
                    <tr>
                        <td align="left" colspan="3">Please click a row to select and deselect ATC.</td>
                    </tr>
                    <tr>
                        <td align="left" width="auto">&nbsp;&nbsp;&nbsp;<b>ATC</b></td>
                        <td align="left" width="auto"><b>Description</b></td>
                        <td align="right" width="auto"><b>Rate %</b>&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3"><hr/></td>
                    </tr>
                </table>
            </div>

            <div class="modalColumnHeader" style="height:auto;width: auto; overflow:visible;padding: 0px 12px;">
                <table id="tbllistAtcCode" cellspacing="0" cellpadding="0" style="width: 100%;padding:1%;">
                     <tr><td></td></tr>
                </table>
                <div align="center">
                    <input type="button" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getATCCode()" />
                </div>
            </div>            
            <br />
        </div>

        <!-- Schedule I -->
        <div id="modalScheduleI" class="printSignFooterClass SchedI-1601F" style="width:90%; display:none; height:60%; position:fixed; top:15%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="center"> 
            <br/>
            <br/>
            <div class="modalColumnHeader" style="width: 90%">
            <table border="1" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td class="modalHeader" colspan="3">Details of Final Tax Based on Tax Treaty Rates (Please select the checkbox to delete a row.)</td>
                </tr>
            </table>            
            <table id="tbllistSchedI"  cellspacing="0" cellpadding="0" width="100%" border="1">
                    <tr><td width="4%" align="center">&nbsp;  </td>
                        <td width='20%' align="center"> Treaty Code </td>
                        <td width='40%' align="center"> ATC </td>
                        <td width='13%' align="center"> Amount of Income Payment </td>
                        <td width='8%' align="center">Tax Rates (%)</td>
                        <td width='15%' align="center"> Tax Required To be Withheld </td>
                    </tr>
                    <tbody id="tbodyllistSchedI">
                        
                    </tbody>
            </table>
            
            <table class="modalColumnHeader" cellspacing="0" cellpadding="0" width="100%" border="1" >
                <tr>
                    <td align="right" height="30">Total </td>
                    <td align="right" height="30"> 
                        <input type="text" style="background-color: rgb(220, 220, 220)" id="txtDvTotalSchedI" maxlength="20" size="17" value="0.00" disabled /> 
                    </td>
                </tr>
                <tr>
                    <td align="center" class='printButtonClass' colspan="2"><input type='button' style="margin-right: 10px;" id="btnAdd" value='Add' onclick="addlistSchedI()" /><input type='button'  class='printButtonClass' id="btnDelete" value='Delete' onclick="deletelistSched1()" />  </td>
                </tr>
            </table>
            </div>
            <div align="center">
                <br/><br />
                <br />
                <input type="button" name="btnOkPop"  class="printButtonClass" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getSchedI()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" name="btnCancelPop"  class="printButtonClass" id="btnCancelPop" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched1()" />
            </div>
        </div>
        
        <!-- Send Email -->
        <div id="hiddenEmail" style="display:none;"><input id="txtEmail" value="{{$company->email_address}}" class="emailClass" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60"   /></div>
    </form> 
@endsection

@section('scripts')

<script type="text/javascript">

    var isSubmitFinal = false;
    var isSubmit = false;
    
    var gIsReadOnly = false;
    var atcList = new Array();
    var treatyList = new Array();
    
    var fileName = "";
    var existingXMLFileName = "";
    var fileNameToExport = "";
    
    var savedReturn = "";
    var p3Compromise = "";
    var p3Surcharge = "";
    var p3Interest = "";
    var p3IsAmended = "";
    var p3FilingDate = "";
    var p3ReturnPeriod = "";
    var p3ReturnPeriodEnd = "";
    
    var p3BasicTax = "";
    var p3TotalPenalties = "";
    var p3TotalAmountPayable = "";
    
    var p3TPTIN1 = "";
    var p3TPTIN2 = "";
    var p3TPTIN3 = "";
    var p3TPTIN = "";
    var p3TPBranchCode = "";
    var p3TPRDOCode = "";
    var p3TPLineBus = "";
    var p3TPName = "";
    var p3TPTelNum = "";
    var p3TPAddress = "";
    var p3TPZip = "";   
    
    function atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum)
    {
        this.formType=formType;
        this.atcCode=atcCode;
        this.description=description;
        this.rate=rate;
        this.category=category;
        this.base=base;
        this.compType=compType;
        this.constTaxDue=constTaxDue;
        this.minimum=minimum;
        this.maximum=maximum;
    }
    
    function treatyPropertyJS(treatyCode, treatyDescription) 
    {
        this.treatyCode=treatyCode;
        this.treatyDescription=treatyDescription;
    }


    var TreatynameCode = new Array()
    var TreatynameDesc = new Array()
    var disabledSchedField = "";
    /*----------------------------------*/
    //Added by MPISCOSO
    var d=document,XMLBGFile='',data='',XMLFile='', XMLATCFile='', XMLTreatyFile='',msg = d.getElementById('msg'),flag=true;
    var loader=d.getElementById('loader');
    /*----------------------------------*/
    
    function Schedule1()
    {
        this.SelTreatyCode =-1;
        this.SelATC = -1;
        this.TxtAmtIncomePayment = '0.00';
        this.TxtTaxRate = '0.00';
        this.TxtRequiredWithheld = '0.00';
    }

    var sched1 = new Array();
    var sched1ToCommit = new Array();

    var str;
    str = window.setTimeout("sleeptime()", 1000);
    var globalEmail = "";
    function sleeptime()
    {
        init();     
        
        var bgFileName =  qs('xmlBGInfoFileName'); 
        if (bgFileName != null && bgFileName.indexOf('.xml') > -1) {
            loadBGXML(bgFileName);  
            
        }
        
        fileName =  qs('xmlFileName'); 
        if (fileName != null && fileName.indexOf('.xml') > -1) {
            var tin = fileName.split("/")[1].split("-");
            loadBGXML("profile/"+ tin[0]+".xml");
            loadXML(fileName);
            
            d.getElementById('frm1601F:j_id201').disabled = true;
            d.getElementById('frm1601F:txtYear').disabled = true;
            
            existingXMLFileName = fileName;
            if (gIsReadOnly) { 
            window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false;",1000); 
            }
        } else {
            window.setTimeout("$('#loader').hide('blind');",100);
        }
        
        if ( $('#printMenu').css('display') != 'none' ) {   
            $('#printMenu').hide('blind');
        }
        document.getElementById('frm1601F:txtTIN1').disabled = true; document.getElementById('frm1601F:txtTIN2').disabled = true; document.getElementById('frm1601F:txtTIN3').disabled = true; document.getElementById('frm1601F:txtBranchCode').disabled = true;
         window.setTimeout("checkFinalCopyBtn('1601F')", 2000);
    }
    
    function rdoPropertyJS(rdoCode, description) 
    {
        this.rdoCode=rdoCode;
        this.description=description;
    }
        
    var rdoList = new Array();

    /*--------------------------------------------------------------*/
    //Added By dgarfin
    function loadXMLATC(fileLocation) {
        try {
            //This will load the ATC file with filename 'fileLocation' if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            XMLATCFile = fsoXML.OpenTextFile(fileLocation,1);   
    
            if (XMLATCFile.AtEndOfStream)
                data = "";
            else {
                var responseATC = d.getElementById('responseATC'); //render file and write to hidden div
                responseATC.innerHTML = XMLATCFile.ReadAll(); //remove XML tag
            }
            XMLATCFile.Close(); //alert( responseATC.innerHTML ); //Debug           
            loadATC();  /*This will load ATC onto an array*/    
        } catch(e) {
            msg.innerHTML = e.message; //"ATC File not Found.";
        } //this will Alert File not Found if it doesn't exist
    }   
    
    function loadXMLTreaty(fileLocation) {
        try {
            //This will load the TreatyCode file with filename 'fileLocation' if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            XMLTreatyFile = fsoXML.OpenTextFile(fileLocation,1);    
    
            if (XMLTreatyFile.AtEndOfStream)
                data = "";
            else {
                var responseTreaty = d.getElementById('responseTreatyCode'); //render file and write to hidden div
                responseTreaty.innerHTML = XMLTreatyFile.ReadAll(); //remove XML tag
            }
            XMLTreatyFile.Close(); //alert( responseTreaty.innerHTML ); //Debug         
            loadTreaty();   /*This will load ATC onto an array*/    
        } catch(e) {
            msg.innerHTML = ""; //"Treaty Code File not Found.";
        } //this will Alert File not Found if it doesn't exist
    }       
    
    var atcCount=0;
    var treatyCount=0;

    function loadTreaty() {
        /*This will load data onto an array*/
        var response = d.getElementById("responseTreatyCode");
        
        var treatyCnt = String(response.innerHTML).split('treatyCount=');
        treatyCount = treatyCnt[1]; 
    
        var k = 0;
        //loads treatyList from xml
        for (var i = 1; i <= treatyCount; i++) { 
            
            var treaty = String(response.innerHTML).split('treaty'+i+':');
            var treatyStr = treaty[1];
        
            //Ensure that before writing to atcPropertyJS the formType 1601F is traceable in treatyStr
            if (treatyStr.indexOf('1601F') >= 0) {
                var treatyValues = treatyStr.split('~');                            
                var treatyCode = treatyValues[0];
                var treatyDescription = treatyValues[1];                
                
                var objTreaty = new treatyPropertyJS(treatyCode, treatyDescription);
                treatyList[k] = objTreaty; 
                k++;
                //alert('1601F successfully created array #'+i);
                
            } else {        
                //alert('1601F not found in array #'+i);
                continue;
            }
        }                   
    }
    
    function loadATC() {
        /*This will load data onto an array*/
        var response = d.getElementById("responseATC");
        
        var atcCnt = String(response.innerHTML).split('atcCount=');
        atcCount = atcCnt[1]; 
        
        var j = 0;
        //loads atcList from xml
        for (var i = 1; i <= atcCount; i++) { 
            
            var atc = String(response.innerHTML).split('atc'+i+':');
            var atcStr = atc[1];
            
            //Ensure that before writing to atcPropertyJS the formType 1601F is traceable in atcStr
            if (atcStr.indexOf('1601F') >= 0) {
                var atcValues = atcStr.split('~');              
                
                var formType = "1601F";
                var atcCode = atcValues[0];
                var description = atcValues[1];
                var rate = atcValues[2];
                var category = atcValues[3];
                
                var base = '';
                var compType = '';
                var constTaxDue = '';
                var minimum = '';
                var maximum = '';
                
                var objATC = new atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum);
                atcList[j] = objATC; 
                j++;
                //alert('1601F successfully created array #'+i);
                
            } else {        
                //alert('1601F not found in array #'+i);
                continue;
            }
        }                   
    }   

    /*--------------------------------------------------------------*/      
    
    /*--------------------------------------------------------------*/
    function loadXML(loadWhere) {
        try {
            //This will load the file with filename loadWhere if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            XMLFile = fsoXML.OpenTextFile(loadWhere,1); 
    
            if (XMLFile.AtEndOfStream)
                data = "";
            else {
                var response = d.getElementById('response'); //render file and write to hidden div
                response.innerHTML = XMLFile.ReadAll(); //remove XML tag
            }
            XMLFile.Close(); //alert( response.innerHTML ); //Debug             
            
            loadData(); /*This will load data onto fields*/ 
            
            if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
                gIsReadOnly = true;
            }
        
            if (gIsReadOnly) {
                d.getElementById('frm0601F:cmdValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
            }
            
            /*-----Edited by MPISCOSO-----*/
            getATCCode();
            window.setTimeout("loadDataWithATC();",300);                                    
                                    
            /*-------------Find Instances of Dynamic Rows within the XML and add to modal-----------*/
            //5-27-2012
            flag=false; //added param for loading - false
            var count=0;
            var responses = d.getElementById('response').getElementsByTagName('div');
            var sPar = 'chxSchedI'; //'txtAmtIncomePay'; //modal section A      
            
            do {
                if (responses.item(count).innerHTML.indexOf(sPar) != -1) {
                    var temp = String(responses.item(count).innerHTML);
                    temp = temp.substring(0,sPar.length+1); //substring to length of search param for index - check files
                    temp = temp.substring(sPar.length,sPar.length+1); //get the last character for checking
                    if ( !isNaN(temp) ) window.setTimeout("addlistSchedIReload();",300); //if last char is a number, add modal section
                } count++;
            } while (count<responses.length);
            /*--------------------------------------------------------------------------------------*/
            window.setTimeout("loadData();",410);
            window.setTimeout("loadDataATCRow();onchangeATCrow();getSchedI();flag=true;",450); //read onchangeATCrow();
            window.setTimeout("$('#loader').hide('blind');",2000);
            //Apparently the action after loading must be commited, we programatically auto-click the OK button - getSectionA           
            
            //window.setTimeout("loadDataATCRow();",600);
        } catch(e) {
            msg.innerHTML = ""; //"Save File not Found.";
        } //this will Alert File not Found if it doesn't exist
    }
    
    function loadData() {
        /*This will load data onto fields*/     
        
        var response = d.getElementById("response");
        
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
            
            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&           
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
                        if (fieldVal != null && fieldVal.length > 1) {
                            if(elem[i].id == 'frm1601F:txtTaxpayerName' || elem[i].id == 'frm1601F:txtLineBus' || elem[i].id == 'frm1601F:txtAddress'){
                                elem[i].value = unescape(fieldVal[1]);
                            }
                            else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
                            else{
                                elem[i].value = fieldVal[1]; //all select-one and text values               
                            }
                        }               
                }
                if (elem[i].type == 'radio') {
                    var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');             
                    if (rdoVal[1] == 'true') {
                        elem[i].checked = rdoVal[1];
                        
                        if (elem[i].id == 'frm1601F:CatAgent_P' || elem[i].id == 'frm1601F:CatAgent_G') {                       
                            elem[i].onclick();
                        }                           
                    
                    }                   
                }   
                if (elem[i].type == 'checkbox') {
                    var chkboxVal = String( $("#response").html() ).split(elem[i].id+'=');              
                    if (chkboxVal[1] == 'true') {
                        elem[i].checked = chkboxVal[1];
                    }                   
                }
            
            }

        }           
    }   
    
    function loadDataWithATC() {
        /*This will load data onto fields*/
        //window.setTimeout("getATCCode();",105);               
        
        var response = d.getElementById("response");
        
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
            
            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&           
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
                        if (fieldVal != null && fieldVal.length > 1) {
                            if(elem[i].id == 'frm1601F:txtTaxpayerName' || elem[i].id == 'frm1601F:txtLineBus' || elem[i].id == 'frm1601F:txtAddress'){
                                elem[i].value = unescape(fieldVal[1]);
                            }
                            else{
                                elem[i].value = fieldVal[1]; //all select-one and text values               
                            }
                        }               
                }
                if (elem[i].type == 'radio') {
                    var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');             
                    if (rdoVal[1] == 'true') {
                        elem[i].checked = rdoVal[1];
                        
                        if (elem[i].id == 'frm1601F:CatAgent_P' || elem[i].id == 'frm1601F:CatAgent_G') {                       
                            elem[i].onclick();
                        }                           
                    
                    }                   
                }   
                if (elem[i].type == 'checkbox') {
                    var chkboxVal = String( $("#response").html() ).split(elem[i].id+'=');              
                    if (chkboxVal[1] == 'true') {
                        elem[i].checked = chkboxVal[1];
                    }                   
                }           
            }

        }           
    }
    
    
    function loadDataATCRow() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");        
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++) {
            
            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') { 
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
                    elem[i].value = ''; elem[i].selectedIndex = 0;
                    if(elem[i].id == 'frm1601F:txtTaxpayerName' || elem[i].id == 'frm1601F:txtLineBus' || elem[i].id == 'frm1601F:txtAddress'){
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    else{
                        elem[i].value = fieldVal[1]; //all select-one and text values               
                    }
                }               
            }
        }
        document.getElementById('txtEmail').value = globalEmail;
    }
    function onchangeATCrow() {
        /*This will programatically fire onchange for Select-one in modal*/
        var response = d.getElementById("response");        
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++) {          
            if ( String(elem[i].id).indexOf('drpTreatyCode') != -1 || String(elem[i].id).indexOf('drpATCCode') != -1 )
                elem[i].onchange();
        }
    }   
    
    function createEncXMLFileName(subFolder) {
        var xmlFileName = "";
        var titleTin1 = d.getElementById('frm1601F:txtTIN1');
        var titleTin2 = d.getElementById('frm1601F:txtTIN2');
        var titleTin3 = d.getElementById('frm1601F:txtTIN3');
        var titleBranchCode = d.getElementById('frm1601F:txtBranchCode');   
        var titleTPName = d.getElementById('frm1601F:txtTaxpayerName');

        var returnPeriod = d.getElementById('frm1601F:j_id201').value + d.getElementById('frm1601F:txtYear').value;
            
            xmlFileName = subFolder + titleTin1.value + titleTin2.value + titleTin3.value + titleBranchCode.value +
            "-1601F-" +
            returnPeriod +
            ".xml"; 

        fileName = titleTin1.value + titleTin2.value + titleTin3.value + titleBranchCode.value +
        "-1601F-" +
        returnPeriod +
        ".xml"; 
        
        return xmlFileName;
    }   
    
    function createXMLFileName(subFolder) {
        var xmlFileName = "";
        var titleTin1 = d.getElementById('frm1601F:txtTIN1');
        var titleTin2 = d.getElementById('frm1601F:txtTIN2');
        var titleTin3 = d.getElementById('frm1601F:txtTIN3');
        var titleBranchCode = d.getElementById('frm1601F:txtBranchCode');   
        var titleTPName = d.getElementById('frm1601F:txtTaxpayerName');
        var isAmendedReturn = isItAnAmendedReturn();

        var returnPeriod = d.getElementById('frm1601F:j_id201').value + d.getElementById('frm1601F:txtYear').value;
        
        if (existingXMLFileName != null && existingXMLFileName.length > 0) {
            xmlFileName = existingXMLFileName;
            
        } else {        
                xmlFileName = subFolder + titleTin1.value + titleTin2.value + titleTin3.value + titleBranchCode.value +
                "-1601F-" +
                returnPeriod +
                ".xml"; 
        }
            fileName = titleTin1.value + titleTin2.value + titleTin3.value + titleBranchCode.value +
            "-1601F-" +
            returnPeriod +
            ".xml"; 
        
        return xmlFileName;
    }   
    
    function saveEncryptedProfile(isFromSubmit) {
        
        var isSaveSuccessful = saveXML(true);   
            //saveXMLProfile(trufunction saveEncryptedProfile(isFromSubmit) {e);    
        var fnNew = ""; 
            
        if (isSaveSuccessful) {     
        
            if (existingXMLFileName.indexOf('/') > -1) { //Means existingXMLFileName is the same as the preloaded file yyy
                fnNew = existingXMLFileName.substring(existingXMLFileName.indexOf('/')+1, existingXMLFileName.length);
            } else {
                if (fileName.indexOf('/') > -1) { //Means fileName is the same as the preloaded file
                    fnNew = fileName.substring(fileName.indexOf('/')+1, fileName.length);
                } else {
                    fnNew = fileName;
                }
            }   
            } else {
            return;
        }

            if(document.getElementById('txtFinalFlag').value == "3"){ fnNew = fnNew.split(".xml")[0] + "#" + globalEmail + "#.xml"; }      var xmlFileName =  "IAF_RDO_Copy/" + fnNew; //createXMLFileName("IAF_RDO_Copy/");//
            msg.innerHTML='Generating File...';
            var fileSys = new ActiveXObject("Scripting.FileSystemObject");
            var xmlFile = "";
            //dgarfin todo: alert user that it will overwrite existing zzz
            if (doesFileExists(xmlFileName)) {
                //alert("File '"+xmlFileName+"' already exists!\n\nThis will overwrite existing data.");                
            }
            xmlFile = fileSys.CreateTextFile(xmlFileName);
            fileNameToExport = fnNew;
            var allXML = "<?xml version='1.0'?>",tab=d.getElementById('xmlFormat').innerHTML;
            allXML += tab; //adds line break
            
            /*--------------------- follow this format for parsing --------------------------- */
            var elem = document.getElementById('frmMain').elements;
            for(var i = 0; i < elem.length; i++)
            {
                if (elem[i].type != 'button' && elem[i].type != 'hidden' && elem[i].type != 'undefined') {              
                    if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                        allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab; //all select-one and text values
                    }
                    if (elem[i].type == 'radio' || elem[i].type == 'checkbox') {
                        allXML += "<div>"+elem[i].id+"=" +elem[i].checked+elem[i].id+"=</div>"+tab; //all radio and checkbox values         
                    }   
                    
                }
            }               
            /*--------------------- follow this format for parsing --------------------------- */
            
            allXML += tab+d.getElementById('xmlClose').innerHTML+"0";
            
            //Encryption of data content 'allXML' 
            //allXML = LZString.compress(allXML);
            //var encryptedAllXML = encrypt(allXML);
            
             xmlFile.write(allXML); 
            xmlFile.close();
            // External compression and encryption
            var succ = EncryptFile(xmlFileName);
            
            msg.innerHTML = '';
            if (typeof(isFromSubmit) === "undefined") {
                if (confirm('File saved and encrypted.\nDo you want to save this in USB flash drive or CD-RW?')) {
                    //alert("Make sure you already inserted your USB flash drive or CD-RW before proceeding.");     
                    //show modal "Have Disk"...
                    showModalExport();              
                    //window.history.go(0);
                } else { // return; //cancel finalcopy
                    //exportTPFileInC();
                    //alert("You have not saved the file to either your USB flash drive or CD-RW.\n\n In case you want to submit it via email,\nyou may locate it under : 'C:\\IAF_RDO_Copy'");
                    //window.history.go(0);
                    
                    //refresh HTA page here. to address: 
                    //Issue#380: A return tagged as final copy should not be edited by tp, rdo, rdc. Currently, user can still modify entries.
                    //document.location.reload(true);
                    disableAllElementIDs();
                    d.getElementById('btnUpload').disabled = false;
                }
            }
            else
            {
                disableAllElementIDs();
                    d.getElementById('btnUpload').disabled = false;
            }
            return fileSys.GetAbsolutePathName(xmlFileName);
    }   
    
    function doesFileExists(xmlFile) {
        var fileSysObj = new ActiveXObject("Scripting.FileSystemObject");
        if (fileSysObj.FileExists(xmlFile)) {
            return true;
        } else {
            return false;
        }       
    }
    
    function isItAnAmendedReturn(xmlFile) { 
        if(d.getElementById('frm1601F:AmendedRtn_1').checked) {
            return true;
        } else {
            return false;
        }       
    }
    
    function isItAFinalCopy(xmlFile) {  
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            fn = fsoXML.OpenTextFile(xmlFile,1);
            var fnContent = fn.ReadAll();
            fn.Close(); 

            if (fnContent.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
                return true;
            } else {
                return false;
            }   
    }   
    
    function createNewXMLFileName(subFolder, xmlFileName) {
        //Conditions met here: (isFileExists && isFinalCopy && isAmendedReturn) 
        var fso = new ActiveXObject("Scripting.FileSystemObject");
        var fileNm = "";
        var newFileNm = "";

        if (xmlFileName.indexOf('V') == -1) {
            fileNm = xmlFileName.substring(xmlFileName.indexOf('/')+1, xmlFileName.indexOf('.xml'));            
        } else {
            fileNm = xmlFileName.substring(xmlFileName.indexOf('/')+1, xmlFileName.indexOf('V'));           
        }
            
        var sameFileNameCtr = 0;
        var subFileName = "";
        var version = 0;
        //if (fso.FileExists(xmlFileName)) {
            if(subFolder.length>0 && fso.FolderExists(subFolder)) {
                var objEnum = new Enumerator(fso.GetFolder(subFolder).Files);               
                for(i=0;!objEnum.atEnd();objEnum.moveNext()) {
                    if (objEnum.item().name.indexOf(fileNm) > -1 && objEnum.item().name.indexOf("V") > -1) {
                        //sameFileNameCtr++;
                        //as of 10/21/2016
                        //no longer counts the file but gets the highest version number and add plus 1
                        var isAFinalCopy = isItAFinalCopy(subFolder+objEnum.item().name);
                        //if (isAFinalCopy && document.getElementById('txtFinalFlag').value == '0') {
                            subFileName = objEnum.item().name.substring(objEnum.item().name.indexOf('V')+1, objEnum.item().name.indexOf('.xml'));
                                version = parseInt(subFileName);
                            if (version >= sameFileNameCtr) {
                                sameFileNameCtr = version+1;
                            }
                        //}
                    }
                }   
                
                if (sameFileNameCtr > 0) {
                    newFileNm = subFolder + fileNm + "V" + sameFileNameCtr + ".xml";            
                } else {
                    //amended default
                    newFileNm = subFolder + fileNm + "V1.xml";
                }
                return newFileNm;
            }
        //} else {
            //unlikely to happend since saveXML() altered filtered out the scenario that will call this function
        //}     
    }
    
    function saveXML(isFinalCopy) { 
        var isFileExists = false;
        var isAmendedReturn = false;
        var isAFinalCopy = false;
        if (gIsReadOnly && document.getElementById("txtFinalFlag").value != "2") {
            if (confirm('You will no longer be allowed to modify since this is already the final copy.\nDo you want to save this in USB flash drive or CD-RW instead?')) {
                var xmlFileName = createEncXMLFileName("IAF_RDO_Copy/");
                msg.innerHTML='Generating File...';
                var fileSys = new ActiveXObject("Scripting.FileSystemObject");
                var xmlFile=fileSys.CreateTextFile(xmlFileName); //(saveWhere);
                //
                fileNameToExport = fileName;
                var allXML = "<?xml version='1.0'?>",tab=d.getElementById('xmlFormat').innerHTML;
                allXML += tab; //adds line break
                
                /*--------------------- follow this format for parsing --------------------------- */
                var elem = document.getElementById('frmMain').elements;
                for(var i = 0; i < elem.length; i++)
                {
                    if (elem[i].type != 'button' && elem[i].type != 'hidden' && elem[i].type != 'undefined') {              
                        if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                            if(elem[i].id == 'frm1601F:txtTaxpayerName' || elem[i].id == 'frm1601F:txtLineBus' || elem[i].id == 'frm1601F:txtAddress'){
                                allXML += "<div>"+elem[i].id+"=" +escape(elem[i].value)+elem[i].id+"=</div>"+tab;
                            }
                            else{
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab; //all select-one and text values
                            }
                        }
                        if (elem[i].type == 'radio' || elem[i].type == 'checkbox') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].checked+elem[i].id+"=</div>"+tab; //all radio and checkbox values         
                        }   
                        
                    }
                }               
                /*--------------------- follow this format for parsing --------------------------- */
                
                allXML += tab+d.getElementById('xmlClose').innerHTML+"0";
                
                //Encryption of data content 'allXML' 
                //allXML = LZString.compress(allXML);
                //var encryptedAllXML = encrypt(allXML);
                
                 xmlFile.write(allXML); 
                xmlFile.close();
                // External compression and encryption
            var succ = EncryptFile(xmlFileName);
            
                msg.innerHTML = '';
                
                showModalExport();
                
                saveXMLProfile(true);       
                // saveXML(true); 
            } else {
                return false;
            }
        } else {    
            var valid = initialValidateBeforeSave();
        
            if (valid == true) {
            
                var xmlFileName = createXMLFileName("savefile/");
                msg.innerHTML='Generating File...';
                var fileSys = new ActiveXObject("Scripting.FileSystemObject");
                var xmlFile = "";
                var xmlFileNameValidate = "";
                var isFinalFlag2 = false;
                //---------------------------------------------------------------
                //START:  New logic in handling amended returns         
                isFileExists = doesFileExists(xmlFileName); 
                isAmendedReturn = isItAnAmendedReturn();

                //as of 10/21/2016
                //if there is already amended filed and will file a not amended,
                //it will restrict it
                if (isAmendedReturn == false) {
                    
                    if (xmlFileName.indexOf('V') == -1) {
                        xmlFileNameValidate = xmlFileName.substring(xmlFileName.indexOf('/')+1, xmlFileName.indexOf('.xml'));           
                    } else {
                        xmlFileNameValidate = xmlFileName.substring(xmlFileName.indexOf('/')+1, xmlFileName.indexOf('V'));          
                    }
                    
                    var hasVersion = false;
                    var objEnum = new Enumerator(fileSys.GetFolder("savefile/").Files);
                    for(i=0;!objEnum.atEnd();objEnum.moveNext()) {
                        if (objEnum.item().name.indexOf(xmlFileNameValidate) > -1 && objEnum.item().name.indexOf("V") > -1) {
                            hasVersion = true;
                        }
                    }   
                    if (hasVersion) {
                        if (!onExit)
                            alert("If your intention is to make an amended return, kindly tick Amended Return to 'Yes' before hitting 'Save' or 'Final Copy' or 'Submit'.");
                        return false;
                    }
                }
                
                if (isFileExists) {
                    isAFinalCopy = isItAFinalCopy(xmlFileName);  if(document.getElementById('txtFinalFlag').value == '2'){isAFinalCopy = false;
                    isFinalFlag2 = true;
                    }   
                }
                
                //1) check if fileExists, if not regular routine
                if (isFileExists  == false) {
                    //as of 10/21/2016
                        if (isAmendedReturn) {
                            var fn = createNewXMLFileName("savefile/", xmlFileName);
                            xmlFile = fileSys.CreateTextFile(fn);
                            xmlFileName = fn;
                            existingXMLFileName = fn;
                        }
                        else
                    xmlFile = fileSys.CreateTextFile(xmlFileName); //xmlFileName should be the newly created xml filename here.
                }               
                //2) if (fileExists && FinalCopy  && Amended) {versionFile} 
                else if (isFileExists && isAFinalCopy && isAmendedReturn) {
                    //as of 10/21/2016
                    if (existingXMLFileName != null && existingXMLFileName.length > 0) {
                        xmlFile = fileSys.CreateTextFile(xmlFileName); //xmlFileName should be the preloaded xml filename here.
                        }
                        else {
                    //versionFile xxx
                
                    var fn = createNewXMLFileName("savefile/", xmlFileName);
                    xmlFile = fileSys.CreateTextFile(fn);
                    xmlFileName = fn;
                    existingXMLFileName = fn;
                    }
                }               
                //3)if (fileExists && FinalCopy  && Not Amended) {throw error message: "If your intention is to make an amended return, kindly tick Amended Return to 'Yes'".} 
                else if (isFileExists && isAFinalCopy && isAmendedReturn == false && document.getElementById('txtFinalFlag').value != '3') {
                    if (!onExit)
                         alert("If your intention is to make an amended return, kindly tick Amended Return to 'Yes' before hitting 'Save' or 'Final Copy' or 'Submit'.");
                    return false;
                }                   
                //4) if (fileExists && Not FinalCopy  && Not Amended/Amended) {regular routine}                 
                else if (isFileExists && isAFinalCopy == false) {
                    //as of 10/21/2016
                    if (existingXMLFileName != null && existingXMLFileName.length > 0) {
                        xmlFile = fileSys.CreateTextFile(xmlFileName); //xmlFileName should be the preloaded xml filename here.
                        }
                        else {
                    if (isAmendedReturn && isFinalFlag2 == false) {
                        var fn = createNewXMLFileName("savefile/", xmlFileName);
                        xmlFile = fileSys.CreateTextFile(fn);
                        xmlFileName = fn;
                        existingXMLFileName = fn;
                    }
                    else
                    xmlFile = fileSys.CreateTextFile(xmlFileName); //xmlFileName should be the preloaded xml filename here.
                    }
                }   
                else {          
                    xmlFile = fileSys.CreateTextFile(xmlFileName);
                }
                //END:  New logic in handling amended returns                       
                //---------------------------------------------------------------
                //
                var allXML = "<?xml version='1.0'?>",tab=d.getElementById('xmlFormat').innerHTML;
                allXML += tab; //adds line break
                
                /*--------------------- follow this format for parsing --------------------------- */
                var elem = document.getElementById('frmMain').elements;
                for(var i = 0; i < elem.length; i++)
                {
                    if (elem[i].type != 'button' && elem[i].type != 'hidden' && elem[i].type != 'undefined') {              
                        if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                            if (elem[i].id == 'frm1601F:txtTaxpayerName') {
                                allXML += "<div>"+elem[i].id+"=" +escape(elem[i].value)+elem[i].id+"=</div>"+tab;
                                p3TPName = escape(elem[i].value);
                            }
                            else if (elem[i].id == 'frm1601F:txtLineBus') {
                                allXML += "<div>"+elem[i].id+"=" +escape(elem[i].value)+elem[i].id+"=</div>"+tab;
                                p3TPLineBus = escape(elem[i].value);
                            }
                            else if (elem[i].id == 'frm1601F:txtAddress') {
                                allXML += "<div>"+elem[i].id+"=" +escape(elem[i].value)+elem[i].id+"=</div>"+tab;
                                p3TPAddress = escape(elem[i].value);
                            }
                            
                            //Get surcharge, compromise, interest, returnPeriod, filingDate
                            //basicTax, total penalties, total amount payable
                            //TIN, branchCode, rdoCode, TPClass, LOB, TPName, TelNo, Addr, Zip
                            else if (elem[i].id == 'frm1601F:txtTax19A') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3Surcharge = elem[i].value;
                            } else if (elem[i].id == 'frm1601F:txtTax19B') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3Interest = elem[i].value;
                            } else if (elem[i].id == 'frm1601F:txtTax19C') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3Compromise = elem[i].value;
                            } else if (elem[i].id == 'frm1601F:txtTax18') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3BasicTax = elem[i].value;
                            } else if (elem[i].id == 'frm1601F:txtTax19D') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3TotalPenalties = elem[i].value;
                            } else if (elem[i].id == 'frm1601F:txtTax20') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3TotalAmountPayable = elem[i].value;
                            } else if (elem[i].id == 'frm1601F:txtTIN1') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3TPTIN1 = elem[i].value;
                            } else if (elem[i].id == 'frm1601F:txtTIN2') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3TPTIN2 = elem[i].value;
                            } else if (elem[i].id == 'frm1601F:txtTIN3') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3TPTIN3 = elem[i].value;
                            } else if (elem[i].id == 'frm1601F:txtBranchCode') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3TPBranchCode = elem[i].value;
                            } else if (elem[i].id == 'frm1601F:txtRDOCode') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3TPRDOCode = elem[i].value;
                            } else if (elem[i].id == 'frm0605:txtClassification:_1') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3TPClassIndi = elem[i].checked;
                            } else if (elem[i].id == 'frm0605:txtClassification:_2') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3TPClassNonIndi = elem[i].checked;
                            } 
                            /*else if (elem[i].id == 'frm1601F:txtLineBus') {
                                p3TPLineBus = escape(elem[i].value);
                            } else if (elem[i].id == 'frm1601F:txtTaxpayerName') {
                                p3TPName = escape(elem[i].value);
                            }*/ 
                            else if (elem[i].id == 'frm1601F:txtTelNum') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3TPTelNum = elem[i].value;
                            } 
                            /*else if (elem[i].id == 'frm1601F:txtAddress') {
                                p3TPAddress = escape(elem[i].value);
                            }*/ 
                            else if (elem[i].id == 'frm1601F:txtZipCode') {
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                                p3TPZip = elem[i].value;
                            }
                            else{
                                allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab; //all select-one and text values
                            }
                        }
                        if (elem[i].type == 'radio' || elem[i].type == 'checkbox') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].checked+elem[i].id+"=</div>"+tab; //all radio and checkbox values
                            if (d.getElementById('frm1601F:AmendedRtn_1').checked == true) {
                                p3IsAmended = "Yes";
                            } else if (d.getElementById('frm1601F:AmendedRtn_2').checked == true) {
                                p3IsAmended = "No";
                            }
                        }   
                        
                    }
                }           
                var retPeriodSubStr = xmlFileName.substring(xmlFileName.lastIndexOf('-')+1, xmlFileName.indexOf('.xml')); //111111111111-0605-09122011115519.xml (09/12/2011 11:55:19)
                p3ReturnPeriod = retPeriodSubStr.substring(0,2) + "/" + retPeriodSubStr.substring(2,6);                 
                
                p3ReturnPeriodEnd = getLastDateOfMonthAndReturnMMDDYYYY(retPeriodSubStr.substring(2,6), retPeriodSubStr.substring(0,2));
                
                p3TPTIN = p3TPTIN1 + p3TPTIN2 + p3TPTIN3;
                /*--------------------- follow this format for parsing --------------------------- */
                
                if (isFinalCopy) {
                    allXML += tab+d.getElementById('xmlClose').innerHTML+"0";
                    gIsReadOnly = true; 
                } else {    
                    allXML += tab+d.getElementById('xmlClose').innerHTML;
                }
                
                //Phase 3: This 'savefile' will be uploaded to IAF Infra for DI processing
                savedReturn = allXML;
                
                xmlFile.write(allXML);
                xmlFile.close();
                msg.innerHTML = '';
                
                if (isFinalCopy == false) {
                    alert('BIR Form saved successfully as : '+xmlFileName);
                }
                saveXMLProfile(false);
                return true;
                
            }
        }
        return true;
    }
    
    function saveXMLsubmit(submit){
        var valid = initialValidateBeforeSave();
        var isBFinalCopy = false;
        if (valid == true) {
        
            var xmlFileName = createXMLFileName("savefile/");
            msg.innerHTML='Generating File...';
            var fileSys = new ActiveXObject("Scripting.FileSystemObject");
            var xmlFile = "";
            var xmlFileNameValidate = "";
            //---------------------------------------------------------------
            //START:  New logic in handling amended returns         
            isFileExists = doesFileExists(xmlFileName); 
            isAmendedReturn = isItAnAmendedReturn();    
            
            //as of 10/21/2016
            //if there is already amended filed and will file a not amended,
            //it will restrict it
            if (isAmendedReturn == false) {
                    if (xmlFileName.indexOf('V') == -1) {
                        xmlFileNameValidate = xmlFileName.substring(xmlFileName.indexOf('/')+1, xmlFileName.indexOf('.xml'));           
                    } else {
                        xmlFileNameValidate = xmlFileName.substring(xmlFileName.indexOf('/')+1, xmlFileName.indexOf('V'));          
                    }
                    
                var hasVersion = false;
                var objEnum = new Enumerator(fileSys.GetFolder("savefile/").Files);
                for(i=0;!objEnum.atEnd();objEnum.moveNext()) {
                    if (objEnum.item().name.indexOf(xmlFileName) > -1 && objEnum.item().name.indexOf("V") > -1) {
                        hasVersion = true;
                    }
                }   
                   if (hasVersion) {
                    if (!onExit && !isSubmit)
                        alert("If your intention is to make an amended return, kindly tick Amended Return to 'Yes' before hitting 'Save' or 'Final Copy' or 'Submit'.");
                    return false;
                }
            }
            
            if (isFileExists) {
                if(document.getElementById('txtFinalFlag').value == '2'){isAFinalCopy = false;} 
            }
            
            //1) check if fileExists, if not regular routine
            if (isFileExists  == false) {

                xmlFile = fileSys.CreateTextFile(xmlFileName); //xmlFileName should be the newly created xml filename here.
            }               
            //2) if (fileExists && FinalCopy  && Amended) {versionFile} 
            else if (isFileExists && isBFinalCopy && isAmendedReturn) {
                //versionFile xxx
            
                var fn = createNewXMLFileName("savefile/", xmlFileName);
                xmlFile = fileSys.CreateTextFile(fn);
                xmlFileName = fn;
                existingXMLFileName = fn;
            }               
            //3)if (fileExists && FinalCopy  && Not Amended) {throw error message: "If your intention is to make an amended return, kindly tick Amended Return to 'Yes'".} 
            else if (isFileExists && isBFinalCopy && isAmendedReturn == false && document.getElementById('txtFinalFlag').value != '3') {
                if (!onExit && !isSubmit){
                     alert("If your intention is to make an amended return, kindly tick Amended Return to 'Yes' before hitting 'Save' or 'Final Copy' or 'Submit'.");
                    return false;
                }
                else {
                    xmlFile = fileSys.CreateTextFile(xmlFileName);
                }
            }                   
            //4) if (fileExists && Not FinalCopy  && Not Amended/Amended) {regular routine}                 
            else if (isFileExists && isBFinalCopy == false) {

                xmlFile = fileSys.CreateTextFile(xmlFileName); //xmlFileName should be the preloaded xml filename here.
            }   
            else {          
                xmlFile = fileSys.CreateTextFile(xmlFileName);
            }
            //END:  New logic in handling amended returns                       
            //---------------------------------------------------------------
            //
            var allXML = "<?xml version='1.0'?>",tab=d.getElementById('xmlFormat').innerHTML;
            allXML += tab; //adds line break
            
            /*--------------------- follow this format for parsing --------------------------- */
            var elem = document.getElementById('frmMain').elements;
            for(var i = 0; i < elem.length; i++)
            {
                if (elem[i].type != 'button' && elem[i].type != 'hidden' && elem[i].type != 'undefined') {              
                    if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                        if (elem[i].id == 'frm1601F:txtTaxpayerName') {
                            allXML += "<div>"+elem[i].id+"=" +escape(elem[i].value)+elem[i].id+"=</div>"+tab;
                            p3TPName = escape(elem[i].value);
                        }
                        else if (elem[i].id == 'frm1601F:txtLineBus') {
                            allXML += "<div>"+elem[i].id+"=" +escape(elem[i].value)+elem[i].id+"=</div>"+tab;
                            p3TPLineBus = escape(elem[i].value);
                        }
                        else if (elem[i].id == 'frm1601F:txtAddress') {
                            allXML += "<div>"+elem[i].id+"=" +escape(elem[i].value)+elem[i].id+"=</div>"+tab;
                            p3TPAddress = escape(elem[i].value);
                        }
                        
                        //Get surcharge, compromise, interest, returnPeriod, filingDate
                        //basicTax, total penalties, total amount payable
                        //TIN, branchCode, rdoCode, TPClass, LOB, TPName, TelNo, Addr, Zip
                        else if (elem[i].id == 'frm1601F:txtTax19A') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3Surcharge = elem[i].value;
                        } else if (elem[i].id == 'frm1601F:txtTax19B') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3Interest = elem[i].value;
                        } else if (elem[i].id == 'frm1601F:txtTax19C') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3Compromise = elem[i].value;
                        } else if (elem[i].id == 'frm1601F:txtTax18') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3BasicTax = elem[i].value;
                        } else if (elem[i].id == 'frm1601F:txtTax19D') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3TotalPenalties = elem[i].value;
                        } else if (elem[i].id == 'frm1601F:txtTax20') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3TotalAmountPayable = elem[i].value;
                        } else if (elem[i].id == 'frm1601F:txtTIN1') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3TPTIN1 = elem[i].value;
                        } else if (elem[i].id == 'frm1601F:txtTIN2') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3TPTIN2 = elem[i].value;
                        } else if (elem[i].id == 'frm1601F:txtTIN3') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3TPTIN3 = elem[i].value;
                        } else if (elem[i].id == 'frm1601F:txtBranchCode') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3TPBranchCode = elem[i].value;
                        } else if (elem[i].id == 'frm1601F:txtRDOCode') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3TPRDOCode = elem[i].value;
                        } else if (elem[i].id == 'frm0605:txtClassification:_1') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3TPClassIndi = elem[i].checked;
                        } else if (elem[i].id == 'frm0605:txtClassification:_2') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3TPClassNonIndi = elem[i].checked;
                        } 
                        /*else if (elem[i].id == 'frm1601F:txtLineBus') {
                            p3TPLineBus = escape(elem[i].value);
                        } else if (elem[i].id == 'frm1601F:txtTaxpayerName') {
                            p3TPName = escape(elem[i].value);
                        }*/ 
                        else if (elem[i].id == 'frm1601F:txtTelNum') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3TPTelNum = elem[i].value;
                        } 
                        /*else if (elem[i].id == 'frm1601F:txtAddress') {
                            p3TPAddress = escape(elem[i].value);
                        }*/ 
                        else if (elem[i].id == 'frm1601F:txtZipCode') {
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab;
                            p3TPZip = elem[i].value;
                        }
                        else{
                            allXML += "<div>"+elem[i].id+"=" +elem[i].value+elem[i].id+"=</div>"+tab; //all select-one and text values
                        }
                    }
                    if (elem[i].type == 'radio' || elem[i].type == 'checkbox') {
                        allXML += "<div>"+elem[i].id+"=" +elem[i].checked+elem[i].id+"=</div>"+tab; //all radio and checkbox values
                        if (d.getElementById('frm1601F:AmendedRtn_1').checked == true) {
                            p3IsAmended = "Yes";
                        } else if (d.getElementById('frm1601F:AmendedRtn_2').checked == true) {
                            p3IsAmended = "No";
                        }
                    }   
                    
                }
            }           
            var retPeriodSubStr = xmlFileName.substring(xmlFileName.lastIndexOf('-')+1, xmlFileName.indexOf('.xml')); //111111111111-0605-09122011115519.xml (09/12/2011 11:55:19)
            p3ReturnPeriod = retPeriodSubStr.substring(0,2) + "/" + retPeriodSubStr.substring(2,6);                 
            
            p3ReturnPeriodEnd = getLastDateOfMonthAndReturnMMDDYYYY(retPeriodSubStr.substring(2,6), retPeriodSubStr.substring(0,2));
            
            p3TPTIN = p3TPTIN1 + p3TPTIN2 + p3TPTIN3;
            /*--------------------- follow this format for parsing --------------------------- */
            
            if (submit) {
                allXML += tab+d.getElementById('xmlClose').innerHTML+"0";
            } else {    
                allXML += tab+d.getElementById('xmlClose').innerHTML;
            }
            
            //Phase 3: This 'savefile' will be uploaded to IAF Infra for DI processing
            savedReturn = allXML;
            
            xmlFile.write(allXML);
            xmlFile.close();
            msg.innerHTML = '';
            
            if (submit == false) {
                alert('BIR Form saved successfully as : '+xmlFileName);
            }
            
        }
        return true;
    }
    var XMLrdoFile='';

    function loadXMLrdo(fileLocation) {
        try {
            //This will load the Region file with filename 'fileLocation' if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            XMLrdoFile = fsoXML.OpenTextFile(fileLocation,1);   
    
            if (XMLrdoFile.AtEndOfStream)
                data = "";
            else {
                var responseRdo = d.getElementById('responseRdo'); //render file and write to hidden div
                responseRdo.innerHTML = XMLrdoFile.ReadAll(); //remove XML tag
                //responseRdo = replaceHtml(responseRdo, XMLrdoFile.ReadAll()); //Pattern:  el = replaceHtml(el, newHtml)
            }
            XMLrdoFile.Close(); //alert( responseRdo.innerHTML ); //Debug           
            loadRdo();  /*This will load ATC onto an array*/    
        } catch(e) {
            msg.innerHTML = ""; //"Region File not Found.";
        } //this will Alert File not Found if it doesn't exist
    }
    
    var rdoCount=0;

    function loadRdo() {
        /*This will load data onto an array*/
        var response = d.getElementById("responseRdo");
        
        var rdoCnt = String(response.innerHTML).split('rdoCount=');
        rdoCount = rdoCnt[1]; 
    
        var k = 0;
        //loads rdoList from xml
        for (var i = 1; i <= rdoCount; i++) { 
            
            var rdo = String(response.innerHTML).split('rdo'+i+':');
            var rdoStr = rdo[1];
        
            //Ensure that before writing to rdoPropertyJS the formType 1601F is traceable in rdoStr
            if (rdoStr.indexOf('1601F') >= 0) {
                var rdoValues = rdoStr.split('~');                          
                var rdoCode = rdoValues[0];
                var description = rdoValues[1];             
                
                var objRdo = new rdoPropertyJS(rdoCode, description);
                rdoList[k] = objRdo; 
                k++;
                //alert('1601F successfully created array #'+i);
                
            } else {        
                //alert('1601F not found in array #'+i);
                continue;
            }
        }                   
    }
    
    /*--------------------------------------------------------------*/
        

    function init()
    {  
        var month = new Date();
        var year3 = new Date();
        d.getElementById('frm1601F:j_id201').selectedIndex = 0;
        d.getElementById('frm1601F:txtYear').value = 2017;
        
        d.getElementById('frm1601F:AmendedRtn_1').disabled = false;
        d.getElementById('frm1601F:AmendedRtn_2').disabled = false;
        d.getElementById('frm1601F:txtSheets').disabled = false;
        //d.getElementById('frm1601F:txtTIN1').disabled = true;
        //d.getElementById('frm1601F:txtTIN2').disabled = true;
        //d.getElementById('frm1601F:txtTIN3').disabled = true;
        //d.getElementById('frm1601F:txtBranchCode').disabled = true;
        //d.getElementById('frm1601F:txtRDOCode').disabled = true;
        //d.getElementById('frm1601F:txtLineBus').disabled = true;
        //d.getElementById('frm1601F:txtTaxpayerName').disabled = true;
        //d.getElementById('frm1601F:txtTelNum').disabled = true;
        //d.getElementById('frm1601F:txtAddress').disabled = true;
        //d.getElementById('frm1601F:txtZipCode').disabled = true;
        d.getElementById('frm1601F:drpSpecialTax').disabled = true;
        d.getElementById('frm1601F:txtTax14').disabled = true;
        d.getElementById('frm1601F:txtTax15').disabled = true;
        d.getElementById('frm1601F:txtTax16').disabled = true;
        d.getElementById('frm1601F:txtTax17').disabled = true;
        d.getElementById('frm1601F:txtTax18').disabled = true;
        d.getElementById('frm1601F:txtTax19A').disabled = false;
        d.getElementById('frm1601F:txtTax19B').disabled = false;
        d.getElementById('frm1601F:txtTax19C').disabled = false;
        d.getElementById('frm1601F:txtTax19D').disabled = true;
        d.getElementById('frm1601F:txtTax20').disabled = true;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm0601F:cmdEdit').disabled = true;
        d.getElementById('frm0601F:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        $('#tbllistAtcCode').html("");  
        $('#tbodyComputeTax').html(""); 
        
        d.getElementById('txtDvTotalSchedI').disabled = true;
        setInputTextControl_HorizontalAlignment("txtDvTotalSchedI",4 );
        d.getElementById('modalScheduleI').style.display = 'none';
        
        loadXMLATC('xml/atcCodes.xml');
        getPrivateWithholdingAgentATC();
        
        loadXMLTreaty('xml/treatyCodes.xml');       

        for(var i = 0; i < treatyList.length; i++) {
            var treaty = treatyList[i]; //treatyList.get(i);
            TreatynameCode[i] = treaty.treatyCode;
            TreatynameDesc[i] = treaty.treatyDescription;
        }
        getDrives();    
        loadXMLrdo('xml/rdo.xml');
        getRdo();
    }
    var disableElem = true;
    var enableElem = false;
    function disableAllControl()
    {
        d.getElementById('frm1601F:txtSheets').disabled = true;
        d.getElementById('frm1601F:txtTIN1').disabled = true;
        d.getElementById('frm1601F:txtTIN2').disabled = true;
        d.getElementById('frm1601F:txtTIN3').disabled = true;
        d.getElementById('frm1601F:txtBranchCode').disabled = true;
        d.getElementById('frm1601F:txtRDOCode').disabled = true;
        d.getElementById('frm1601F:txtLineBus').disabled = true;
        d.getElementById('frm1601F:txtTaxpayerName').disabled = true;
        d.getElementById('frm1601F:txtTelNum').disabled = true;
        d.getElementById('frm1601F:txtAddress').disabled = true;
        d.getElementById('frm1601F:txtZipCode').disabled = true;
        
        d.getElementById('frm1601F:AmendedRtn_1').disabled = true;
        d.getElementById('frm1601F:AmendedRtn_2').disabled = true;
        d.getElementById('frm1601F:j_id201').disabled = true;
        d.getElementById('frm1601F:txtYear').disabled = true;
        d.getElementById('frm1601F:TaxWithheld_1').disabled = true;
        d.getElementById('frm1601F:TaxWithheld_2').disabled = true;
        d.getElementById('frm1601F:CatAgent_P').disabled = true;
        d.getElementById('frm1601F:CatAgent_G').disabled = true;
        d.getElementById('frm1601F:drpSpecialTax').disabled = true;
        d.getElementById('btnAddATCPartII').disabled = true;
        d.getElementById('btnAddSchedI').disabled = true;
        
        d.getElementById('frm1601F:txtTax19A').disabled = true;
        d.getElementById('frm1601F:txtTax19B').disabled = true;
        d.getElementById('frm1601F:txtTax19C').disabled = true;
        
        for (i = 1 ; i <= d.getElementById('tblPartIIComputeTax').rows.length -1; i++) {
            d.getElementById('frm1601F:txtTaxBase'+i).disabled = true;
            d.getElementById('frm1601F:txtTaxRate'+i).disabled = true;
        }
        d.getElementById('frm0601F:cmdValidate').disabled = true;
        d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm0601F:cmdEdit').disabled = false;
        d.getElementById('frm0601F:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;
        d.getElementById('frm1601F:SpecialTax_1').disabled = true;
        d.getElementById('frm1601F:SpecialTax_2').disabled = true;
        d.getElementById('frm1601F:txtTax17').disabled = true;
        disableElem;
        enableElem;
    }

    function enableAllControl()
    {
        d.getElementById('frm1601F:txtSheets').disabled = false;
        d.getElementById('frm1601F:txtTIN1').disabled = false;
        d.getElementById('frm1601F:txtTIN2').disabled = false;
        d.getElementById('frm1601F:txtTIN3').disabled = false;
        d.getElementById('frm1601F:txtBranchCode').disabled = false;
        d.getElementById('frm1601F:txtRDOCode').disabled = false;
        d.getElementById('frm1601F:txtLineBus').disabled = false;
        d.getElementById('frm1601F:txtTaxpayerName').disabled = false;
        d.getElementById('frm1601F:txtTelNum').disabled = false;
        d.getElementById('frm1601F:txtAddress').disabled = false;
        d.getElementById('frm1601F:txtZipCode').disabled = false;
        
        d.getElementById('frm1601F:txtTax19A').disabled = false;
        d.getElementById('frm1601F:txtTax19B').disabled = false;
        d.getElementById('frm1601F:txtTax19C').disabled = false;
        
        d.getElementById('frm1601F:AmendedRtn_1').disabled = false;
        d.getElementById('frm1601F:AmendedRtn_2').disabled = false;
        d.getElementById('frm1601F:j_id201').disabled = false;
        d.getElementById('frm1601F:txtYear').disabled = false;
        d.getElementById('frm1601F:TaxWithheld_1').disabled = false;
        d.getElementById('frm1601F:TaxWithheld_2').disabled = false;
        d.getElementById('frm1601F:CatAgent_P').disabled = false;
        d.getElementById('frm1601F:CatAgent_G').disabled = false;
        d.getElementById('frm1601F:drpSpecialTax').disabled = false;
        d.getElementById('btnAddATCPartII').disabled = false;
        d.getElementById('btnAddSchedI').disabled = false;
        for (i = 1 ; i <= d.getElementById('tblPartIIComputeTax').rows.length -1; i++) {
            d.getElementById('frm1601F:txtTaxBase'+i).disabled = false;
        }
        d.getElementById('frm0601F:cmdValidate').disabled = false;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm0601F:cmdEdit').disabled = true;
        d.getElementById('frm0601F:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        d.getElementById('frm1601F:SpecialTax_1').disabled = false;
        d.getElementById('frm1601F:SpecialTax_2').disabled = false;

        if(d.getElementById('frm1601F:AmendedRtn_1').checked) {
            d.getElementById('frm1601F:txtTax17').disabled = false;
        } else {
            d.getElementById('frm1601F:txtTax17').disabled = true;
        }
        
        if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
        d.getElementById('frm1601F:j_id201').disabled = true;
        d.getElementById('frm1601F:txtYear').disabled = true;
        }
        
        disableElem;
        enableElem;
        
        document.getElementById('frm1601F:txtTIN1').disabled = true; document.getElementById('frm1601F:txtTIN2').disabled = true; document.getElementById('frm1601F:txtTIN3').disabled = true; document.getElementById('frm1601F:txtBranchCode').disabled = true;
    }
    
    function getRdo()
    {
        var data = "<select class='iceSelOneMnu' id='frm1601F:txtRDOCode' name='frm1601F:txtRDOCode' size='1' ><option value='000'> </option>";
        
        for(var i = 0; i < rdoList.length; i++) {
            var rdo = rdoList[i];
            data = data + "<option value='" + rdo.rdoCode + "'>" + rdo.description + "</option>";
            
        }
        data = data + "</select>"
        
        $('#rdoSelect').html(data);     
        
    }
    
    var previoustbllistAtcCode=null;
    var tbllistSchedIIAtcCodeFlag = false;
    function enableSelTreaty()
    {
        d.getElementById('frm1601F:drpSpecialTax').disabled = false;
        d.getElementById('frm1601F:drpSpecialTax').selectedIndex = 1;
        
        var i = d.getElementById('tbllistAtcCode').rows.length + 1;
        
        if (previoustbllistAtcCode==null)
            previoustbllistAtcCode = d.getElementById('tbllistAtcCode').innerHTML;
        
        $('#tbllistAtcCode').html(  d.getElementById('tbllistAtcCode').innerHTML +
            "<tr class='atc'><td width='350px' class='atc'> <input id='AtcCd"+i+"' name='AtcCd"+i+"' type='checkbox' value='N/A' /> N/A </td> <td width='300px' id='AtcNaturePayment"+i+"'  class='atc atcNames'>SPECIAL LAW</td> <td width='90px' id='txtRate"+i+"' class='atc'> 0.0 </td> </tr>");
        tbllistSchedIIAtcCodeFlag = true; 
        }
    
    
    function disableSelTreaty()
    {
        d.getElementById('frm1601F:drpSpecialTax').disabled = true;
        d.getElementById('frm1601F:drpSpecialTax').selectedIndex = 0;
    }

    function confirmDisableTreaty() {
        if(confirm("Warning: pressing OK will clear all values in Schedule 1.\nPress OK to do so.")) {
            disableSelTreaty();
            sched1ToCommit = new Array();
            sched1 = new Array();
            //d.getElementById("tbodyllistSchedI").innerHTML = "";
            $('#tbodyllistSchedI').html("");
            
            if (previoustbllistAtcCode!=null)
                $('#tbllistAtcCode').html(previoustbllistAtcCode);
            
            d.getElementById('frm1601F:txtTax15').value = (0).toFixed(2);
            computeofTotalWithheldTax();
        } else {
            d.getElementById("frm1601F:SpecialTax_1").checked = true;
        }
    }

    var tempATC = new Array();
    var tempATCTaxbase = new Array();
    var tempATCTaxRate = new Array();
    function showPartIIATC()
    {
        if(d.getElementById('btnAddATCPartII').disabled == false){
            tempATC = new Array();
            tempATCTaxbase = new Array();
            tempATCTaxRate = new Array();
            for(var i = 0; i < d.getElementById('tblPartIIComputeTax').rows.length - 1; i++) {
                tempATC[i] = d.getElementById('frm1601F:txtAtcCode'+ (i + 1)).value;
                tempATCTaxbase[i] = d.getElementById('frm1601F:txtTaxBase'+(i +1)).value;
                tempATCTaxRate[i] = d.getElementById('frm1601F:txtTaxRate'+(i +1)).value;
               
            }

            if( checkiftaxwheldisYes() == true )
            {
                //d.getElementById('mainContent').style.display = "inline";
                //d.getElementById('modalAtc').style.display = "block";
                
                d.getElementById('mainContent').style.display = "none";
                $('#modalAtc').show('blind');           
            }else {
                alert(checkiftaxwheldisYes());
            }
        }
        else{
            return false;
        }
    }
    function checkiftaxwheldisYes()
    {
        if(d.getElementById('frm1601F:TaxWithheld_1').checked == false && d.getElementById('frm1601F:TaxWithheld_2').checked == false )
        {
            return "Select any tax withheld on item 4.";
        }
        else if( d.getElementById('frm1601F:CatAgent_P').checked == false && d.getElementById('frm1601F:CatAgent_G').checked == false  )
        {
            return "Please select an option for Item 12.";
        }
        else if( d.getElementById('frm1601F:TaxWithheld_1').checked == true )
        {
            return true;
        }else
        {
            return "Selecting an ATC is not necessary when item no. 4 is set to ' NO '";
        }
    }
    function showAddSchedI()
    {
        if(d.getElementById('btnAddSchedI').disabled == false){
            if(d.getElementById('frm1601F:SpecialTax_2').checked == true)
            {
                alert("You are not availing of tax relief under Special Law or International Tax Treaty. There is no need to\nfill up schedule 1."); return;
            }else if(d.getElementById('frm1601F:SpecialTax_1').checked == true )
            {
                if(d.getElementById('frm1601F:drpSpecialTax').value == 0)
                {
                    alert("Invalid entry on Item no.13. Please specify a treaty."); return;
                }else {

                    if(d.getElementById('frm1601F:TaxWithheld_1').checked == false && d.getElementById('frm1601F:TaxWithheld_2').checked == false )
                    {
                        alert("Please select an option for Item 4."); return;
                    }else if(d.getElementById('frm1601F:TaxWithheld_2').checked == true)
                    {
                        alert("You have no taxed withheld. There is no need to fill up Schedule 1."); return;
                    }else {
                        //d.getElementById('mainContent').style.display = "inline";
                        //d.getElementById('modalScheduleI').style.display = 'block';
                        d.getElementById('mainContent').style.display = "none";
                        $('#modalScheduleI').show('blind');                    
                    }
                }
            }
        }
        else{
            return false;
        }
    }

    function changedrpATCList(e)
    {
        var i;
        if(e.value == "P") {   // change ATClist
            getPrivateWithholdingAgentATC();
        } else if(e.value == "G") {
            // change ATClist
            getGovernmentWithholdingAgentATC();
        }
        $('#tbllistAtcCode').html("");
        for(i = 1 ; i < ATCnameCode.length ; i++  )
        {
            $('#tbllistAtcCode').html(d.getElementById('tbllistAtcCode').innerHTML +
                "<tr class='atc'><td width='20%' class='atc'> <input id='AtcCd"+i+"' name='AtcCd"+i+"' type='checkbox' value='"+ATCnameCode[i]+"' /> "+ATCnameCode[i]+ " </td> <td width='70%' id='AtcNaturePayment"+i+"'  class='atc atcNames'>"+ NaturePayment[i]+ " </td> <td width='10%' class='atc' id='tbllistAtcCode:txtRate"+i+"'> " + taxRate[i] + "</td> </tr>");
        }   
        
    }
    
    var ATCnameCode = new Array() ;
    var NaturePayment = new Array() ;
    var taxRate = new Array();
    function getPrivateWithholdingAgentATC() {
        ATCnameCode = new Array() ;
        NaturePayment = new Array() ;
        taxRate = new Array();

        //var atcSize = atcList.getSize();
        var atcSize = atcList.length;
    
        var i = 0;
        var j = 1;
        for(i = 0; i < atcSize; i++) {
            //var atc = atcList.get(i);
            var atc = atcList[i];
            if(atc.formType == "1601F" && atc.category == 'P') {            
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                taxRate[j++] = atc.rate;                
            }
        } 
    }
    
    function getGovernmentWithholdingAgentATC() {
        ATCnameCode = new Array() ;
        NaturePayment = new Array() ;
        taxRate = new Array();

        //var atcSize = atcList.getSize(); 
        var atcSize = atcList.length;
        
        var i;
        var j=1;
        for(i = 0; i < atcSize; i++) {
            var atc = atcList[i];
            //if(atc.getFormType() == "1601F" && atc.getCategory() == 'G') {
            if(atc.formType == "1601F" && atc.category == 'G') {    
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                taxRate[j++] = atc.rate;        
            }
        }
    }

    function cancelPartIIATC() {
        d.getElementById('mainContent').style.display = 'block';
        if ( $('#modalAtc').css('display') != 'none' ) {
            $('#modalAtc').hide('blind');
        }       
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
        for(i =1 ; i < d.getElementById('tbllistAtcCode').rows.length; i++) {
            if(ATCCodeList[i] != null) {
                d.getElementById('AtcCd'+i).checked = ATCCodeList[i];
            } else {
                d.getElementById('AtcCd'+i).checked = false;
            }
        }
            
    }
    
    function setInputTextControl_HorizontalAlignment(id,align) {
        if (d.getElementById(id) != null) {
        //d.getElementById(id).textIndent = parseInt(align);
        d.getElementById(id).style.textAlign = "right";
        }
    }
    function setInputTextControl_NumberFormatter(id,limit,deci) {
        d.getElementById(id).size = parseInt(limit);
        d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed( parseInt(deci) );      
    }   
    
    var ATCCodeList = new Array();
    function getATCCode()
    {
    try{    
        var listATCtable = d.getElementById('tbllistAtcCode');

        $('#tbodyComputeTax').html("");
        
        for(var i = 1 ; i <= listATCtable.rows.length; i++ )
        {
            var table = d.getElementById("tblPartIIComputeTax");
            var iCtr = table.rows.length;
            var rowCount = table.rows.length - 1;
            if(d.getElementById('AtcCd'+i) != null)
            {
                ATCCodeList[i] = d.getElementById('AtcCd'+i).checked;

                // check if checked id'ed ATC
                if (d.getElementById('AtcCd'+i).checked == true)
                {
                    var taxbasetemp = "0.00";
                    var taxbaseRate = "0.00";
                    for(var tempCount = 0 ; tempCount < tempATC.length; tempCount++) {
                        if(tempATC[tempCount] == d.getElementById('AtcCd'+i).value){
                            taxbasetemp = tempATCTaxbase[tempCount];
                            taxbaseRate = tempATCTaxRate[tempCount];
                            break;
                        }
                    }
                    
                    if (d.getElementById('AtcNaturePayment'+i).innerHTML == 'SPECIAL LAW') {
                    
                        $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +
                            "<tr><td id='txtNaturePayment"+iCtr+"' width='40%' class='modalContent'>" + d.getElementById('AtcNaturePayment'+i).innerHTML + "</td>" +
                            "<td width='10%'> <input type='text' id='frm1601F:txtAtcCode"+iCtr+"' class='styletxtAtcCode' value='"+ d.getElementById('AtcCd'+i).value + "' />  </td>" +
                            "<td width='21%'> <input type='text' id='frm1601F:txtTaxBase"+iCtr+"' style='text-align: right' size='17' maxlength='25' onblur='round(this,2); getRequiredWithheld("+iCtr+");' value='" + taxbasetemp + "' onkeypress='return numbersonly(this, event)'/> </td>" +
                            "<td width='9%'> <input type='text' id='frm1601F:txtTaxRate"+iCtr+"' style='text-align: right; background-color:#FFFFFF' class='styletxtTaxRate' value='"+ taxbaseRate +"' onblur='round(this,2); getRequiredWithheld("+iCtr+"); computeofTotalWithheldTax()' onkeypress='return numbersonly(this, event)' /> </td>" +
                            "<td width='20%'> <input type='text' id='frm1601F:txtTaxbeWithHeld"+iCtr+"' style='text-align: right' value='0.00' size='16' maxlength='25' disabled /> </td>" +
                            "</tr>");
                    
                    
                    }   else{
                    $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +
                        "<tr><td id='txtNaturePayment"+iCtr+"' width='40%' class='modalContent'> "+ d.getElementById('AtcNaturePayment'+i).innerHTML + " </td>" +
                        "<td width='10%'><input type='text' id='frm1601F:txtAtcCode"+iCtr+"' class='styletxtAtcCode' value='"+ d.getElementById('AtcCd'+i).value + "' />  </td>" +
                        "<td width='21%'><input type='text' id='frm1601F:txtTaxBase"+iCtr+"' style='text-align: right' size='17'  maxlength='25' onkeypress='return numbersonly(this, event)' onblur='round(this,2);getRequiredWithheld("+iCtr+")' value='"+taxbasetemp +"'/> </td>" +
                        "<td width='9%'><input type='text' id='frm1601F:txtTaxRate"+iCtr+"' style='text-align: right' class='styletxtTaxRate' value='"+ d.getElementById('tbllistAtcCode:txtRate'+i).innerHTML +"' disabled /> </td>" +
                        "<td width='20%'><input type='text' id='frm1601F:txtTaxbeWithHeld"+iCtr+"' style='text-align: right' size='16' maxlength='25' value='0.00' disabled /> </td>" +
                        "</tr>");
                        }

                    waitstr = setTimeout("d.getElementById('frm1601F:txtAtcCode"+iCtr+"').disabled = true; setInputTextControl_HorizontalAlignment('frm1601F:txtTaxBase"+iCtr+"', 4);" , 100);
                    waitstr = setTimeout("d.getElementById('frm1601F:txtTaxbeWithHeld"+iCtr+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601F:txtTaxbeWithHeld"+iCtr+"', 4);" , 100);
                    waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm1601F:txtTaxRate"+iCtr+"', 4);" +
                          "" , 100);
                    
                    /* setTimeout("d.getElementById('frm1601F:txtAtcCode"+iCtr+"').disabled = true; setInputTextControl_HorizontalAlignment('frm1601F:txtTaxBase"+iCtr+"', 4);" +
                        "d.getElementById('frm1601F:txtTaxbeWithHeld"+iCtr+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601F:txtTaxbeWithHeld"+iCtr+"', 4);" +
                        "d.getElementById('frm1601F:txtTaxRate"+iCtr+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601F:txtTaxRate"+iCtr+"', 4);" +
                        "getRequiredWithheld("+iCtr+");" , 100); */
                    setTimeout("getRequiredWithheld("+iCtr+");", 100);
                    
                   /* waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601F:txtTaxBase"+iCtr+"', 17, 2); d.getElementById('frm1601F:txtTaxBase"+iCtr+"').value = '" + taxbasetemp + "'" , 200);
                    waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601F:txtTaxbeWithHeld"+iCtr+"', 17, 2); getRequiredWithheld(" + iCtr + ");", 200); */
                    

                }
            }
        }
        setTimeout("computeofTotalWithheldTax()", 200); 
        cancelPartIIATC();
    } catch (e) {
        alert('exception : '+e.message);
    }
    }
    
    function blockletter(e)
    {
        var number = parseFloat(e.value).toFixed(2);
        if(isNaN(number)) {
            //var zero = 0;
            //e.value = parseFloat(zero).toFixed(2);
            e.value = "";
        } else {
            e.value = '' + number;
        }
    }

    function blockletterWithout2Decimal(e)
    {
        var number = parseFloat(e.value);
        if(isNaN(number))
        {
            //var zero = 0;
            //e.value = parseFloat(zero).toFixed(2);
            e.value = "";
        }else {
            e.value = '' + number.toFixed(0);
        }
    }

    function cancelAllCompute()
    {
        if( (d.getElementById("tblPartIIComputeTax").rows.length - 1) >= 1 )
        {
            var answer = confirm("You are about to change the value to 'No'. Doing this will clear the entries in Part II and Schedule II. ")
            if(answer)
            {
                //d.getElementById('tbodyComputeTax').value = ""; 
                $('#tbodyComputeTax').html("");
                for(i =1 ; i < d.getElementById('tbllistAtcCode').rows.length; i++) {
                    d.getElementById('AtcCd'+i).checked = false;}
                computeofTotalWithheldTax();
            }else{
                d.getElementById('frm1601F:TaxWithheld_1').checked = true;
            }
        }
    }

    function getRequiredWithheld(numIndex)
    {   
        d.getElementById('frm1601F:txtTaxbeWithHeld'+numIndex).value = formatCurrency(NumWithComma(d.getElementById('frm1601F:txtTaxBase'+numIndex).value) * NumWithComma(d.getElementById('frm1601F:txtTaxRate'+numIndex).value) / 100 );
        computeofTotalWithheldTax();
    }
    
    function computeofTotalWithheldTax()
    {   
        var i;
        var totalsum = 0;
        for(i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        { 
            var taxwithheld = NumWithComma(d.getElementById('frm1601F:txtTaxbeWithHeld'+i).value)*1 ;
            totalsum = totalsum*1 + NumWithComma(d.getElementById('frm1601F:txtTaxbeWithHeld'+i).value)*1;
        } 
        d.getElementById('frm1601F:txtTax14').value = formatCurrency(totalsum);

        d.getElementById('frm1601F:txtTax16').value = formatCurrency(NumWithComma(d.getElementById('frm1601F:txtTax14').value)*1 + NumWithComma(d.getElementById('frm1601F:txtTax15').value)*1);
        d.getElementById('frm1601F:txtTax18').value = formatCurrency(NumWithComma(d.getElementById('frm1601F:txtTax16').value)*1 - NumWithComma(d.getElementById('frm1601F:txtTax17').value)*1);
       // var tax19a = d.getElementById('frm1601F:txtTax19A').value;
       // var tax19b = d.getElementById('frm1601F:txtTax19B').value;
       // var tax19c = d.getElementById('frm1601F:txtTax19C').value;
        
        d.getElementById("frm1601F:txtTax19D").value = formatCurrency(NumWithComma(d.getElementById('frm1601F:txtTax19A').value)*1 + NumWithComma(d.getElementById('frm1601F:txtTax19B').value)*1 + NumWithComma(d.getElementById('frm1601F:txtTax19C').value)*1);
        d.getElementById("frm1601F:txtTax20").value = formatCurrency(NumWithComma(d.getElementById('frm1601F:txtTax18').value)*1 + NumWithComma(d.getElementById('frm1601F:txtTax19D').value)*1);
        capital();
    }

    function computePenalties()
    {
        var tax19D = formatCurrency(NumWithComma(d.getElementById("frm1601F:txtTax19A").value)*1 + NumWithComma(d.getElementById("frm1601F:txtTax19B").value)*1 + NumWithComma(d.getElementById("frm1601F:txtTax19C").value)*1);
        d.getElementById("frm1601F:txtTax19D").value = formatCurrency(tax19D);
    computeofTotalWithheldTax();
        
    }
    
    function addATCCodeInDropDown(index, selvalue) {
        //d.getElementById("drpATCCode"+index).innerHTML = "";
        $('#drpATCCode'+index).html("");
        
        var x = 1;
        for(var i = 0; i < ATCnameCode.length + 2 ; i++) {
            var str = "";
            if(i == selvalue ) {
                str = "selected";
            }

            if(i == 0) { 
                //d.getElementById("drpATCCode"+index).innerHTML += "<option value='-' " + str + " > - </option>"; //alert("i = 0 " + str)
                $('#drpATCCode'+index).html(  d.getElementById('drpATCCode'+index).innerHTML + "<option value='-' " + str + " > - </option>"); //alert("i = 0 " + str)
            } else if(i == 1) {
                //d.getElementById("drpATCCode"+index).innerHTML += "<option value='NA' " + str + " >NA - Not Applicable </option>"; //alert("i = 1 " + str)
                $('#drpATCCode'+index).html(  d.getElementById('drpATCCode'+index).innerHTML + "<option value='NA' " + str + " >NA - Not Applicable </option>"); //alert("i = 1 " + str)
            } else {
                if(i <= ATCnameCode.length) {
                    //d.getElementById("drpATCCode"+index).innerHTML += "<option value='"+ATCnameCode[x]+"' " + str + "> "+ATCnameCode[x]+" - " + NaturePayment[x]+"</option>";
                    $('#drpATCCode'+index).html(  d.getElementById('drpATCCode'+index).innerHTML + "<option value='"+ATCnameCode[x]+"' " + str + "> "+ATCnameCode[x]+" - " + NaturePayment[x]+"</option>");
                    x++; //alert("atc selected i =  " + i + " " + str)
                }
            }
        }
    }

    function addTreatyCodeInDropDown(index, selvalue)
    { 
        //d.getElementById('drpTreatyCode'+index).innerHTML = "";
        $('#drpTreatyCode'+index).html("");
        var x = 0; //1 dgarfin
        
        for(var i = 0 ; i < TreatynameCode.length + 2 ; i++)
        {
            var str = "";
            if(i == selvalue) {
                str = "selected";
            }
            if(i == 0) {
                //d.getElementById("drpTreatyCode"+index).innerHTML += "<option value='-' " + str + " > - </option" ;
                $('#drpTreatyCode'+index).html(  d.getElementById('drpTreatyCode'+index).innerHTML + "<option value='-' " + str + " > - </option");
            } else if( i == 1) {
                //d.getElementById("drpTreatyCode" + index).innerHTML += "<option value='NA' " + str + " > NA - Not Applicable </option>";
                $('#drpTreatyCode'+index).html(  d.getElementById('drpTreatyCode'+index).innerHTML + "<option value='NA' " + str + " >NA - Not Applicable </option>");
            } else {
                if(i <= TreatynameCode.length) { //+1 dgarfin
                    //d.getElementById('drpTreatyCode' + index).innerHTML += "<option value='"+TreatynameCode[x]+"' " + str + "> " + TreatynameCode[x] + " - " + TreatynameDesc[x] + "</option>";
                    $('#drpTreatyCode'+index).html(  d.getElementById('drpTreatyCode'+index).innerHTML + "<option value='"+TreatynameCode[x]+"' " + str + "> " + TreatynameCode[x] + " - " + TreatynameDesc[x] + "</option>");
                    x++;
                }
            }
        }  
    }

    function setTreatyCodeSched1(index)
    {
        sched1ToCommit[index].SelTreatyCode = d.getElementById('drpTreatyCode'+index).selectedIndex;
    }

    function setATCCodeSched1(index) {
        /*    for(var i = 0; i < sched1.length; i++) {
            // alert("I " + i + " sched1[]=" + sched1[i].SelATC);
        }
        var tempValueSched1Bug = 0;
        if(sched1.length > 0) {
            //  alert("index " +  sched1[index].SelATC);
            tempValueSched1Bug = sched1[index].SelATC;
        } */
        sched1ToCommit[index].SelATC = d.getElementById('drpATCCode'+index).selectedIndex;
        /* for(var i = 0; i < sched1.length; i++) {
            //alert("I " + i + " sched1[]=" + sched1[i].SelATC);
        }
        // BUG of dropdown to be set again in sched1
        if(sched1.length > 0) {
            //  sched1[index].SelATC = tempValueSched1Bug;
            //alert("index " +  sched1[index].SelATC);
        } */
    }

    function addlistSchedI()
    {   
        var size = sched1ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {   
            //sched1ToCommit[i].SelTreatyCode = d.getElementById('drpTreatyCode'+i).selectedIndex;
            // sched1ToCommit[i].SelATC = d.getElementById('drpATCCode'+i).value;
            sched1ToCommit[i].TxtAmtIncomePayment = d.getElementById('txtAmtIncomePay'+i).value;
            sched1ToCommit[i].TxtTaxRate = d.getElementById('txtRate'+i).value;
            sched1ToCommit[i].TxtRequiredWithheld = d.getElementById('txtReqWithheld'+i).value;
        }
        i = sched1ToCommit.length;
        sched1ToCommit[i] = new Schedule1();
      
        //d.getElementById("tbodyllistSchedI").innerHTML = "";
        $('#tbodyllistSchedI').html("");
        
        for(i = 0; i < sched1ToCommit.length; i++) {
        
                
        
            $('#tbodyllistSchedI').html(  d.getElementById('tbodyllistSchedI').innerHTML + "<tr>" +
            //d.getElementById("tbodyllistSchedI").innerHTML += "<tr>" +
                "<td width='4%'> <input type='checkbox' class='printButtonClass' id='chxSchedI"+i+"' /> </td>" +
                "<td width='20%' align='left'> <select  id='drpTreatyCode"+i+"' style='width: 150px' onchange='setTreatyCodeSched1("+i+")' ></select> </td>" +
                "<td width='40%' align='left'> <select id='drpATCCode"+i+"' style='width: 240px' onchange='setATCCodeSched1("+i+");getATCdrpTaxRate("+i+");getReqWithheldCompute("+i+");'  ></select></td> " +
                "<td width='13%' align='right'><input type='text' style='width: 95%' id='txtAmtIncomePay"+i+"' value='"+ sched1ToCommit[i].TxtAmtIncomePayment +"' size='17' maxlength='25' onkeypress='return numbersonly(this, event)' onblur='round(this,2);getReqWithheldCompute("+i+")'  /> </td> " +
                "<td width='8%' align='right'><input type='text' id='txtRate"+i+"' value='"+ sched1ToCommit[i].TxtTaxRate +"' size='6' onblur='round(this,2);getReqWithheldCompute("+i+")' maxlength='10' onkeypress='return numbersonly(this, event)' style='width: 95%' /> </td>" +
                "<td width='15%' align='right'><input type='text' style='background-color: rgb(220, 220, 220); width: 95%' id='txtReqWithheld"+i+"' value='"+ sched1ToCommit[i].TxtRequiredWithheld +"' size='17' maxlength='25'   /> </td> ") ;

            addTreatyCodeInDropDown(i, sched1ToCommit[i].SelTreatyCode);
            addATCCodeInDropDown(i, sched1ToCommit[i].SelATC);
            setTimeout("d.getElementById('txtReqWithheld"+i+"').disabled = true;" +
                "setInputTextControl_HorizontalAlignment('txtReqWithheld"+i+"',4 ); setInputTextControl_NumberFormatter('txtReqWithheld"+i+"',17,2); d.getElementById('txtReqWithheld"+i+"').value = '" + sched1ToCommit[i].TxtRequiredWithheld + "';" +
                "setInputTextControl_HorizontalAlignment('txtRate"+i+"',4 ); setInputTextControl_NumberFormatter('txtRate"+i+"',17,2); d.getElementById('txtRate"+i+"').value = '" + sched1ToCommit[i].TxtTaxRate + "';" +
                "setInputTextControl_HorizontalAlignment('txtAmtIncomePay"+i+"',4 ); setInputTextControl_NumberFormatter('txtAmtIncomePay"+i+"',17,2); d.getElementById('txtAmtIncomePay"+i+"').value = '" +  sched1ToCommit[i].TxtAmtIncomePayment + "';",100);

            if(disabledSchedField == "disabled") {
                setTimeout("d.getElementById('chxSchedI"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('drpTreatyCode"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('drpATCCode"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('txtAmtIncomePay"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('txtRate"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('txtReqWithheld"+i+"').disabled = true;", 100);
            }
        }       
    }
    
    function addlistSchedIReload()
    {   
        var size = sched1ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {   
            //sched1ToCommit[i].SelTreatyCode = d.getElementById('drpTreatyCode'+i).selectedIndex;
            // sched1ToCommit[i].SelATC = d.getElementById('drpATCCode'+i).value;
            sched1ToCommit[i].TxtAmtIncomePayment = d.getElementById('txtAmtIncomePay'+i).value;
            sched1ToCommit[i].TxtTaxRate = d.getElementById('txtRate'+i).value;
            sched1ToCommit[i].TxtRequiredWithheld = d.getElementById('txtReqWithheld'+i).value;
        }
        i = sched1ToCommit.length;
        sched1ToCommit[i] = new Schedule1();
      
        //d.getElementById("tbodyllistSchedI").innerHTML = "";
        $('#tbodyllistSchedI').html("");
        
        for(i = 0; i < sched1ToCommit.length; i++) {
        
                
        
            $('#tbodyllistSchedI').html(  d.getElementById('tbodyllistSchedI').innerHTML + "<tr>" +
            //d.getElementById("tbodyllistSchedI").innerHTML += "<tr>" +
                "<td width='4%'> <input type='checkbox' class='printButtonClass' id='chxSchedI"+i+"' /> </td>" +
                "<td width='20%' align='left'> <select  id='drpTreatyCode"+i+"' style='width: 150px' onchange='setTreatyCodeSched1("+i+")' ></select> </td>" +
                "<td width='40%' align='left'> <select id='drpATCCode"+i+"' style='width: 240px' onchange='setATCCodeSched1("+i+");getATCdrpTaxRateReload("+i+");getReqWithheldCompute("+i+");'  ></select></td> " +
                "<td width='13%' align='right'><input type='text' style='width: 95%' id='txtAmtIncomePay"+i+"' value='"+ sched1ToCommit[i].TxtAmtIncomePayment +"' size='17' maxlength='25' onkeypress='return numbersonly(this, event)' onblur='round(this,2);getReqWithheldCompute("+i+")'  /> </td> " +
                "<td width='8%' align='right'><input type='text' id='txtRate"+i+"' value='"+ sched1ToCommit[i].TxtTaxRate +"' size='6' onblur='round(this,2);getReqWithheldCompute("+i+")' maxlength='10' onkeypress='return numbersonly(this, event)' style='width: 95%' /> </td>" +
                "<td width='15%' align='right'><input type='text' style='background-color: rgb(220, 220, 220); width: 95%' id='txtReqWithheld"+i+"' value='"+ sched1ToCommit[i].TxtRequiredWithheld +"' size='17' maxlength='25'   /> </td> ") ;

            addTreatyCodeInDropDown(i, sched1ToCommit[i].SelTreatyCode);
            addATCCodeInDropDown(i, sched1ToCommit[i].SelATC);
            setTimeout("d.getElementById('txtReqWithheld"+i+"').disabled = true;" +
                "setInputTextControl_HorizontalAlignment('txtReqWithheld"+i+"',4 ); setInputTextControl_NumberFormatter('txtReqWithheld"+i+"',17,2); d.getElementById('txtReqWithheld"+i+"').value = '" + sched1ToCommit[i].TxtRequiredWithheld + "';" +
                "setInputTextControl_HorizontalAlignment('txtRate"+i+"',4 ); setInputTextControl_NumberFormatter('txtRate"+i+"',17,2); d.getElementById('txtRate"+i+"').value = '" + sched1ToCommit[i].TxtTaxRate + "';" +
                "setInputTextControl_HorizontalAlignment('txtAmtIncomePay"+i+"',4 ); setInputTextControl_NumberFormatter('txtAmtIncomePay"+i+"',17,2); d.getElementById('txtAmtIncomePay"+i+"').value = '" +  sched1ToCommit[i].TxtAmtIncomePayment + "';",100);

            if(disabledSchedField == "disabled") {
                setTimeout("d.getElementById('chxSchedI"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('drpTreatyCode"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('drpATCCode"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('txtAmtIncomePay"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('txtRate"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('txtReqWithheld"+i+"').disabled = true;", 100);
            }
        }       
    }   
    
    function deletelistSched1()
    {   
        var sched1Temp = new Array();
        var i = 0;
        var size = sched1ToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            //sched1ToCommit[i].SelTreatyCode = d.getElementById('drpTreatyCode'+i).selectedIndex;
            //sched1ToCommit[i].SelATC = d.getElementById('drpATCCode'+i).selectedIndex;
            sched1ToCommit[i].TxtAmtIncomePayment = d.getElementById('txtAmtIncomePay'+i).value;
            sched1ToCommit[i].TxtTaxRate = d.getElementById('txtRate'+i).value;
            sched1ToCommit[i].TxtRequiredWithheld = d.getElementById('txtReqWithheld'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSchedI" + j).checked) {
                sched1Temp[i++] = sched1ToCommit[j];
            }
        }

        if(sched1Temp.length > 0) {
            sched1ToCommit = new Array();
            sched1ToCommit = sched1Temp;
            //d.getElementById("tbodyllistSchedI").innerHTML = "";
            $('#tbodyllistSchedI').html("");

            for(i = 0; i < sched1Temp.length; i++) {
                sched1ToCommit[i] = sched1Temp[i];
                //d.getElementById("tbodyllistSchedI").innerHTML += "<tr>" +
                $('#tbodyllistSchedI').html(  d.getElementById('tbodyllistSchedI').innerHTML + "<tr>" +
                    "<td width='4%'> <input type='checkbox' class='printButtonClass' id='chxSchedI"+i+"' /> </td>" +
                    "<td width='20%' align='left'> <select  id='drpTreatyCode"+i+"' style='width: 150px' onchange='setTreatyCodeSched1("+i+")'  ></select> </td>" +
                    "<td width='40%' align='left'> <select id='drpATCCode"+i+"' style='width: 240px' onchange='setATCCodeSched1("+i+");getATCdrpTaxRate("+i+");getReqWithheldCompute("+i+");'  ></select></td> " +
                    "<td width='13%' align='right'><input type='text' style='width: 95%' id='txtAmtIncomePay"+i+"' value='"+ sched1ToCommit[i].TxtAmtIncomePayment +"' size='17' maxlength='25' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getReqWithheldCompute("+i+")'   /> </td> " +
                    "<td width='8%' align='right'><input type='text' id='txtRate"+i+"' value='"+ sched1ToCommit[i].TxtTaxRate +"' size='6' onblur='round(this,2);getReqWithheldCompute("+i+")' maxlength='10' onkeypress='return numbersonly(this, event)' style='width: 95%' /> </td>" +
                    "<td width='15%' align='right'><input type='text' style='background-color: rgb(220, 220, 220); width: 95%' id='txtReqWithheld"+i+"' value='"+ sched1ToCommit[i].TxtRequiredWithheld +"' size='17' maxlength='25' /> </td> ") ;

                    
                addTreatyCodeInDropDown(i, sched1ToCommit[i].SelTreatyCode);
                addATCCodeInDropDown(i, sched1ToCommit[i].SelATC);
                setTimeout("d.getElementById('txtReqWithheld"+i+"').disabled = true;" +
                    "setInputTextControl_HorizontalAlignment('txtReqWithheld"+i+"',4 ); setInputTextControl_NumberFormatter('txtReqWithheld"+i+"',12,2); d.getElementById('txtReqWithheld"+i+"').value = '" + sched1ToCommit[i].TxtRequiredWithheld + "';" +
                    "setInputTextControl_HorizontalAlignment('txtRate"+i+"',4 ); setInputTextControl_NumberFormatter('txtRate"+i+"',12,2); d.getElementById('txtRate"+i+"').value = '" + sched1ToCommit[i].TxtTaxRate + "';" +
                    "setInputTextControl_HorizontalAlignment('txtAmtIncomePay"+i+"',4 ); setInputTextControl_NumberFormatter('txtAmtIncomePay"+i+"',12,2); d.getElementById('txtAmtIncomePay"+i+"').value = '" + sched1ToCommit[i].TxtAmtIncomePayment + "';",100);
                if(disabledSchedField == "disabled") {
                    setTimeout("d.getElementById('chxSchedI"+i+"').disabled = true;", 100);
                    setTimeout("d.getElementById('drpTreatyCode"+i+"').disabled = true;", 100);
                    setTimeout("d.getElementById('drpATCCode"+i+"').disabled = true;", 100);
                    setTimeout("d.getElementById('txtAmtIncomePay"+i+"').disabled = true;", 100);
                    setTimeout("d.getElementById('txtRate"+i+"').disabled = true;", 100);
                    setTimeout("d.getElementById('txtReqWithheld"+i+"').disabled = true;", 100);
                }
            }
        } else {
            sched1ToCommit = new Array();
            //.getElementById("tbodyllistSchedI").innerHTML = "";
            $('#tbodyllistSchedI').html("");
        }
        getTotalTaxWithheld();
    }
    
    function getCommittedSched1()
    {  
        //d.getElementById("tbodyllistSchedI").innerHTML = "";
        $('#tbodyllistSchedI').html("");
        sched1ToCommit = new Array();
        var tempATC = 0;
        var tempTreaty = 0;
        var tempAmtIncomePayment = "";
        var tempTaxRate = "";
        var tempRequireWithheld = "";
        for(var i = 0; i < sched1.length; i++) {
            tempATC = sched1[i].SelATC;
            tempTreaty = sched1[i].SelTreatyCode;
            tempAmtIncomePayment = sched1[i].TxtAmtIncomePayment;
            tempTaxRate = sched1[i].TxtTaxRate;
            tempRequireWithheld = sched1[i].TxtRequiredWithheld;
            sched1ToCommit[i] = new Schedule1();
            sched1ToCommit[i].SelATC = tempATC;
            sched1ToCommit[i].SelTreatyCode = tempTreaty;
            sched1ToCommit[i].TxtAmtIncomePayment = tempAmtIncomePayment;
            sched1ToCommit[i].TxtTaxRate = tempTaxRate;
            sched1ToCommit[i].TxtRequiredWithheld = tempRequireWithheld;
            // comment by lovell Bug in two variable sched1toCommit and sched1
            // sched1ToCommit[i] = sched1[i];
            
            //d.getElementById("tbodyllistSchedI").innerHTML += "<tr>" +
            $('#tbodyllistSchedI').html(  d.getElementById('tbodyllistSchedI').innerHTML + "<tr>" +
                "<td width='4%'> <input type='checkbox' class='printButtonClass' id='chxSchedI"+i+"' /> </td>" +
                "<td width='20%' align='left'> <select  id='drpTreatyCode"+i+"' style='width: 150px' onchange='setTreatyCodeSched1("+i+")'  ></select> </td>" +
                "<td width='40%' align='left'> <select id='drpATCCode"+i+"' style='width: 240px' onchange='setATCCodeSched1("+i+");getATCdrpTaxRate("+i+");getReqWithheldCompute("+i+");' ></select></td> " +
                "<td width='13%' align='right'><input type='text' style='width: 95%' id='txtAmtIncomePay"+i+"' value='"+ sched1[i].TxtAmtIncomePayment +"' size='17' maxlength='25' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getReqWithheldCompute("+i+")'  /> </td> " +
                "<td width='8%' align='right'><input type='text' id='txtRate"+i+"' value='"+ sched1[i].TxtTaxRate +"' size='6' onblur='round(this,2);getReqWithheldCompute("+i+")' maxlength='10' onkeypress='return numbersonly(this, event)' style='width: 95%' /> </td>" +
                "<td width='15%' align='right'><input type='text' style='background-color: rgb(220, 220, 220); width: 95%' id='txtReqWithheld"+i+"' value='"+ sched1[i].TxtRequiredWithheld +"' size='17' maxlength='25'  /> </td> ") ;
                
            addTreatyCodeInDropDown(i, sched1[i].SelTreatyCode);
            addATCCodeInDropDown(i, sched1[i].SelATC);
            //alert("ATC LOADed " + sched1[i].SelATC )
            setTimeout("d.getElementById('txtReqWithheld"+i+"').disabled = true;" +
                "setInputTextControl_HorizontalAlignment('txtReqWithheld"+i+"',4 ); setInputTextControl_NumberFormatter('txtReqWithheld"+i+"',12,2); d.getElementById('txtReqWithheld"+i+"').value = '" + sched1[i].TxtRequiredWithheld + "';" +
                "setInputTextControl_HorizontalAlignment('txtRate"+i+"',4 ); setInputTextControl_NumberFormatter('txtRate"+i+"',12,2); d.getElementById('txtRate"+i+"').value = '" + sched1[i].TxtTaxRate + "';" +
                "setInputTextControl_HorizontalAlignment('txtAmtIncomePay"+i+"',4 );  setInputTextControl_NumberFormatter('txtAmtIncomePay"+i+"',12,2); d.getElementById('txtAmtIncomePay"+i+"').value = '" + sched1[i].TxtAmtIncomePayment + "';",100);
            
            if(disabledSchedField == "disabled") {
                setTimeout("d.getElementById('chxSchedI"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('drpTreatyCode"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('drpATCCode"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('txtAmtIncomePay"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('txtRate"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('txtReqWithheld"+i+"').disabled = true;", 100);
            }
        }
    }

    function getSchedI()
    {   
        if(ifRequirementMeetSched1()) {
            var size = sched1ToCommit.length;
            sched1 = new Array();
            for(var i = 0 ; i < size ; i++)
            {
                sched1[i] = new Schedule1();
                sched1[i].SelTreatyCode = sched1ToCommit[i].SelTreatyCode;
                sched1[i].SelATC = sched1ToCommit[i].SelATC;
                // sched1[i].SelATC = d.getElementById('drpATCCode'+i).value;
                sched1[i].TxtAmtIncomePayment = d.getElementById('txtAmtIncomePay'+i).value;
                sched1[i].TxtTaxRate = d.getElementById('txtRate'+i).value;
                sched1[i].TxtRequiredWithheld = d.getElementById('txtReqWithheld'+i).value;
            
            }
            
            cancelSched1();
        }
    }

    function cancelSched1() {
        getCommittedSched1();
        d.getElementById('frm1601F:txtTax15').value = formatCurrency(NumWithComma(d.getElementById("txtDvTotalSchedI").value));
        computeofTotalWithheldTax();
            
        if (flag) { //param for loading - does not hide when loading
        setTimeout("d.getElementById('mainContent').style.display = 'block';" +
            "$('#modalScheduleI').hide('blind');" +
            "d.getElementById('DummyTxt').innerHTML = 'Lgawaran'; " +
            "d.getElementById('DummyTxt').innerHTML = ''; ", 500);
        }           
    }

    function ifRequirementMeetSched1()
    {   var rowSize = d.getElementById('tbllistSchedI');
        
        for(var i = 0 ; i < ( rowSize.rows.length - 1); i++)
        {   
            if(d.getElementById('drpTreatyCode'+ i).value == "-") {
                alert("Please choose a Treaty Code from the list."); return;
            }
            if(d.getElementById('drpATCCode'+ i).value == "-") {
                alert("Please choose an ATC Code from the list."); return;
            }
            if(d.getElementById('txtAmtIncomePay'+ i).value == 0) {
                alert("Please enter Amount of Income Payment."); return;
            }
        }
        return true;
    }
    
    function getATCdrpTaxRate(i) {
        for(var j = 0; j < ATCnameCode.length ; j++) {
            if(d.getElementById('drpATCCode'+i).value == ATCnameCode[j]) {
                d.getElementById('txtRate'+i).value = (taxRate[j] *1 ).toFixed(2); return;
            } else {
                d.getElementById('txtRate'+i).value =  "0.00";
            }

        }
    }
    
    function getATCdrpTaxRateReload(i) {
        for(var j = 0; j < ATCnameCode.length ; j++) { //xxx
             d.getElementById('txtRate'+i).value = d.getElementById('txtRate'+i).value;
        }
    }   

    function getReqWithheldCompute(numIndex) {
        d.getElementById('txtReqWithheld'+numIndex).value = formatCurrency(NumWithComma(d.getElementById('txtAmtIncomePay'+numIndex).value) * NumWithComma(d.getElementById('txtRate'+numIndex).value) / 100 );
        getTotalTaxWithheld();
    }

    function getTotalTaxWithheld() {
        var tblrow = d.getElementById('tbllistSchedI');
        var totalSum = 0; 
        for(var i = 0; i < tblrow.rows.length - 1 ; i++)
        {   
            totalSum = ( totalSum * 1 +  NumWithComma(d.getElementById('txtReqWithheld'+i).value) *1 );
        } 
        d.getElementById('txtDvTotalSchedI').value = formatCurrency(totalSum * 1); 
    }


    function validate()
    {   var dt = new Date(); 
        if(d.getElementById('frm1601F:txtYear').value == "")
        {
            alert("Please enter a valid year on Item 1."); return;
        }
        /*if( d.getElementById('frm1601F:txtYear').value*1 > dt.getFullYear()*1)
        {
            alert("Invalid date entry on Item no.1. Entry should not be later than Current Date.")
            return;
        }
        if(d.getElementById('frm1601F:j_id201').selectedIndex > dt.getMonth() && d.getElementById('frm1601F:txtYear').value == dt.getFullYear())
        {
            alert("Invalid date entry on Item no.1. Entry should not be later than Current Date."); return;
        }*/
        if( d.getElementById('frm1601F:txtYear').value*1 < 1900)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }
        //Added 05/03/2018: mark p. based on TRAIN LAW this Form should not file return period from 2018 onwards, use BIR Form 0619-F instead.
        if( d.getElementById('frm1601F:txtYear').value >= 2018   )
        {
            alert("If you wish to remit withholding tax from year 2018 onwards, please use BIR Form 0619-F.");
            d.getElementById('frm1601F:txtYear').value = 2017;
            return;
        }
        if(d.getElementById('frm1601F:TaxWithheld_1').checked == false && d.getElementById('frm1601F:TaxWithheld_2').checked == false )
        {
            alert( "Please select an option for Item 4.");
            return;
        }   
        
        if( (d.getElementById('frm1601F:txtTIN1').value == "" || d.getElementById('frm1601F:txtTIN2').value == "" || d.getElementById('frm1601F:txtTIN3').value == "" || d.getElementById('frm1601F:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 5.");
            return;
        }       
        //if( (d.getElementById('frm1601F:txtRDOCode').value == "")  )
        if( (d.getElementById('frm1601F:txtRDOCode').selectedIndex == 0)  )
        {
            alert("Please enter a valid RDO Code on Item 6.");
            return;
        }       
        if( (d.getElementById('frm1601F:txtLineBus').value == "")  )
        {
            alert("Please enter a valid Line of Business/Occupation on Item 7.");
            return;
        }   
        if( (d.getElementById('frm1601F:txtTaxpayerName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 8.");
            return;
        }
        if( (d.getElementById('frm1601F:txtTelNum').value == "")  )
        {
            alert("Please enter a valid Telephone Number on Item 9.");
            return;
        }           
        if( (d.getElementById('frm1601F:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 10.");
            return;
        }       
        if( (d.getElementById('frm1601F:txtZipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip Code on Item 11.");
            return;
        }
        if( d.getElementById('frm1601F:CatAgent_P').checked == false && d.getElementById('frm1601F:CatAgent_G').checked == false  )
        {
            alert("Please select an option for Item 12.");
            return;
        }
        if( d.getElementById('frm1601F:TaxWithheld_1').checked == true )
        {
            //if(d.getElementById('tblPartIIComputeTax').rows.length < 2 && d.getElementById('tbodyllistSchedI').innerHTML == "")
            
            
            //for (indexwithheld = 1; indexwithheld <  d.getElementById('tblPartIIComputeTax').rows.length; indexwithheld++){
            var indexwithheld = 1;
            for (indexwithheld = 1; indexwithheld < (d.getElementById('tblPartIIComputeTax').rows.length)  ; indexwithheld++) {             
                if( d.getElementById('frm1601F:txtAtcCode'+indexwithheld).value != "") {                    
                    if( d.getElementById('frm1601F:txtTaxBase'+ indexwithheld).value == "" ) {
                        alert("Please enter a valid value for tax base for " + d.getElementById('frm1601F:txtAtcCode'+indexwithheld).value + "." )
                        //alert("Please enter a valid value for tax base for " + d.getElementById('AtcCd'+indexwithheld).value + "." )
                        return;
                    }
                    if( d.getElementById('frm1601F:txtTaxBase'+ indexwithheld).value <= 0 ) {
                        //alert("Please enter Tax Base for ATC " + d.getElementById('AtcCd'+ indexwithheld).value + ".")
                        alert("Please enter Tax Base for ATC " + d.getElementById('frm1601F:txtAtcCode'+indexwithheld).value + ".")
                        return;
                    }
                }
            }
            
            //JTrac#391: QA Mary Ann Garcia said "User should be able to file return online even if only sked 1 has data in Part 2."        
            //if(d.getElementById('tblPartIIComputeTax').rows.length < 2 && $('#tbodyllistSchedI').html(""))        
            if($('#tbodyllistSchedI').html() == "" && d.getElementById('frm1601F:txtTax14').value == 0)
            {
                alert("Please fill up Part II Computation of Tax if item 4 is set to Yes."); 
                return;
            }
                        
        }
        if(d.getElementById('frm1601F:SpecialTax_1').checked == true )
        {
            if(d.getElementById('frm1601F:drpSpecialTax').value == 0)
            {
                alert("Invalid entry on Item no.13. Please specify a treaty."); 
                return;
            }
            if(d.getElementById('tbllistSchedI').rows.length < 2)
            {
                alert("Please fill up Schedule 1."); 
                return;
            }
        }

        disableAllControl();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
        return;
    }
    
    function initialValidateBeforeSave() {
            if( (d.getElementById('frm1601F:txtTIN1').value == "" || d.getElementById('frm1601F:txtTIN2').value == "" || d.getElementById('frm1601F:txtTIN3').value == "" || d.getElementById('frm1601F:txtBranchCode').value == "")  )
            {
                alert("Please enter a valid TIN number on Item 5.");
                return false;
            }   
            if ((d.getElementById('frm1601F:txtRDOCode').value == "000")) {
                alert("Please enter a valid RDO Code on Item 6.");
                return false;
            }
            if( (d.getElementById('frm1601F:txtTaxpayerName').value == "")  )
            {
                alert("Please enter a valid Withholding Agent's Name on Item 8.");
                return false;
            }       
            return true;
    }   

    /*
    function enableAllElementsBeforePrint() {
        var elem = document.getElementById('frmMain').elements;     
        for(var i = 0; i < elem.length; i++)
        {
            if (elem[i].type != 'button' && elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
                d.getElementById(elem[i].id).disabled = false;
                d.getElementById(elem[i].id).readOnly = true;
            }
        } 
    }   */
    

    //topNav
    $(document).ready(function(){    
        $("ul.subnav").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled (Adds empty span tag after ul.subnav*)  
        $("ul.topnav li span").click(function() { //When trigger is clicked...            
            //Following events are applied to the subnav itself (moving subnav up and down)  
            $(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click    
            $(this).parent().hover(function() {  
            }, function(){    
                $(this).parent().find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up  
            });  
            //Following events are applied to the trigger (Hover events for the trigger)  
            }).hover(function() {   
                $(this).addClass("subhover"); //On hover over, add class "subhover"  
            }, function(){  //On Hover Out  
                $(this).removeClass("subhover"); //On hover out, remove class "subhover"  
        });
        $("ul.topnav .toplevel").click(function() { //When trigger is clicked...            
            //Following events are applied to the subnav itself (moving subnav up and down)  
            $(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click    
            $(this).parent().hover(function() {  
            }, function(){    
                $(this).parent().find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up  
            });  
            //Following events are applied to the trigger (Hover events for the trigger)  
            }).hover(function() {   
                $(this).addClass("subhover"); //On hover over, add class "subhover"  
            }, function(){  //On Hover Out  
                $(this).removeClass("subhover"); //On hover out, remove class "subhover"  
            });

        //added 07/25/2015
        $('#ebirOnlineConfirmUsername, #ebirOnlineConfirmPassword, #ebirOnlinePassword, #ebirOnlineUsername').bind('paste drag drop', function (e) {
            e.preventDefault();
        });
    });     
function loadBGXML(loadWhere) {
        try {
            //This will load the file with filename loadWhere if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");   
            XMLBGFile = fsoXML.OpenTextFile(loadWhere,1);   
            if (XMLBGFile.AtEndOfStream) {
                data = "";          
            } else {
                var responseBG = d.getElementById('responseBG'); //render file and write to hidden div
                responseBG.innerHTML = XMLBGFile.ReadAll(); //remove XML tag            
            }       
            XMLBGFile.Close();      
            //alert( responseBG.innerHTML ); //Debug                
            loadBGData();   /*This will load data onto fields*/         
        } catch(e) {
            msg.innerHTML = ""; 
        } 
}
    
function loadBGData() { 
        /*This will load data onto Background Information fields*/
        var responseBG = d.getElementById("responseBG");

        var formTypeVal = String(responseBG.innerHTML).split('formType='); //form_type

        if (formTypeVal[1] == '1601F') {
        
            var fnVal = String(responseBG.innerHTML).split('fn=');              
            d.getElementById('frm1601F:txtTaxpayerName').value =    unescape(fnVal[1]); 
        
            var tin1Val = String(responseBG.innerHTML).split('tin1=');              
            d.getElementById('frm1601F:txtTIN1').value =    tin1Val[1]; 
            
            var tin2Val = String(responseBG.innerHTML).split('tin2=');                  
            d.getElementById('frm1601F:txtTIN2').value =    tin2Val[1]; 
            
            var tin3Val = String(responseBG.innerHTML).split('tin3=');                  
            d.getElementById('frm1601F:txtTIN3').value =    tin3Val[1]; 
            
            var tin4Val = String(responseBG.innerHTML).split('tin4=');                  
            d.getElementById('frm1601F:txtBranchCode').value =  tin4Val[1];         

            var rdoVal = String(responseBG.innerHTML).split('rdo=');                
            d.getElementById('frm1601F:txtRDOCode').value =     rdoVal[1];   
            
            var lobVal = String(responseBG.innerHTML).split('lob=');                
            d.getElementById('frm1601F:txtLineBus').value =     unescape(lobVal[1]);    

            var regAddrVal = String(responseBG.innerHTML).split('regAddr=');            
            d.getElementById('frm1601F:txtAddress').value =     unescape(regAddrVal[1]);    
            
            var zipVal = String(responseBG.innerHTML).split('zip=');                
            d.getElementById('frm1601F:txtZipCode').value =     zipVal[1];              
            
            var telNoVal = String(responseBG.innerHTML).split('telNo=');                
            d.getElementById('frm1601F:txtTelNum').value =  telNoVal[1];            

                
            
        }       
        var emailVal = String(responseBG.innerHTML).split('email=');
            if(emailVal[1] === undefined)
            {
                document.getElementById('txtEmail').value = "";
            }
            else
            {
                document.getElementById('txtEmail').value = emailVal[1];
                globalEmail = emailVal[1];
            }
}   
function createXMLProfileName() {
    try {
        var xmlFileName = "";
        
        var titleTin1 = d.getElementById('frm1601F:txtTIN1');
        var titleTin2 = d.getElementById('frm1601F:txtTIN2');
        var titleTin3 = d.getElementById('frm1601F:txtTIN3');
        var titleBranchCode = d.getElementById('frm1601F:txtBranchCode');   
        var titleTPName = d.getElementById('frm1601F:txtTaxpayerName'); 
        var formType = "1601F";     
        
        xmlFileName = "profile/" + titleTin1.value + titleTin2.value + titleTin3.value + titleBranchCode.value + ".xml";        
    
        return xmlFileName;
    } catch(e) {
        alert('Exception : '+e.description);
    }   
}   
    
function saveXMLProfile(isFinalCopy) {  
    if (gIsReadOnly == false) {
        var xmlFileName = createXMLProfileName();
    
        msg.innerHTML='Generating File...';
        var fileSys = new ActiveXObject("Scripting.FileSystemObject");
        var xmlFile=fileSys.CreateTextFile(xmlFileName); //(saveWhere);

        var allXML = "<?xml version='1.0'?>",tab=d.getElementById('xmlFormat').innerHTML;
        allXML += tab; //adds line break            
        
        allXML += "<div>fn="+escape(d.getElementById('frm1601F:txtTaxpayerName').value)+"fn=</div>"+tab;
        allXML += "<div>tin1="+d.getElementById('frm1601F:txtTIN1').value+"tin1=</div>"+tab;
        allXML += "<div>tin2="+d.getElementById('frm1601F:txtTIN2').value+"tin2=</div>"+tab;
        allXML += "<div>tin3="+d.getElementById('frm1601F:txtTIN3').value+"tin3=</div>"+tab;
        allXML += "<div>tin4="+d.getElementById('frm1601F:txtBranchCode').value+"tin4=</div>"+tab;  
        allXML += "<div>rdo="+d.getElementById('frm1601F:txtRDOCode').value+"rdo=</div>"+tab;       
        allXML += "<div>lob="+escape(d.getElementById('frm1601F:txtLineBus').value)+"lob=</div>"+tab;       
        allXML += "<div>regAddr="+escape(d.getElementById('frm1601F:txtAddress').value)+"regAddr=</div>"+tab;   
        allXML += "<div>zip="+d.getElementById('frm1601F:txtZipCode').value+"zip=</div>"+tab;               
        allXML += "<div>telNo="+d.getElementById('frm1601F:txtTelNum').value+"telNo=</div>"+tab;    
        allXML += "<div>email="+document.getElementById('txtEmail').value+"email=</div>"+tab;allXML += "<div>confirmemail="+document.getElementById('txtEmail').value+"confirmemail=</div>"+tab;
        allXML += "<div>confirmtin1=" + d.getElementById('frm1601F:txtTIN1').value + "confirmtin1=</div>" + tab;
            allXML += "<div>confirmtin2=" + d.getElementById('frm1601F:txtTIN2').value + "confirmtin2=</div>" + tab;
            allXML += "<div>confirmtin3=" + d.getElementById('frm1601F:txtTIN3').value + "confirmtin3=</div>" + tab;
            allXML += "<div>confirmtin4=" + d.getElementById('frm1601F:txtBranchCode').value + "confirmtin4=</div>" + tab;
        allXML += "<div>formType=1601FformType=</div>"+tab;         
        
        allXML += tab+d.getElementById('xmlClose').innerHTML;
        
        xmlFile.write(allXML);
        xmlFile.close();
        msg.innerHTML = '';
        
        if (isFinalCopy == false) {
        alert('Background information saved/updated successfully as : '+xmlFileName);
        }   
    }   
}
function cancel() {
    $('#bg').show();
    $('.printSignFooterClass').css({ 'width':'90%', 'height':'60%','display':'none','position':'fixed','overflow-y':'auto', 'background':'#e2e2e2', 'top':'3%', 'left':'3%', 'right':'auto' }); 
    $('.printSignFooterClass').hide();
    
    $('.imgClass').hide();
    $('body').css('background','#FFF');
    
    $('#formPaper').css({'width':'800px', 'border':'#CCC 1px solid', 'margin':'0 auto', 'background':'#FFF' });
    $('#wrapper').css({'width':'800px', 'padding':'1%', 'margin':'0 auto'});
    $('#container').css({'width':'800px', 'padding':'1%', 'margin':'0 auto'});      
    $('.labels').remove();
    
    var elem = document.getElementById('frmMain').elements;
    for(var i = 0; i < elem.length; i++) {          
        if (elem[i].type != 'hidden') { // && elem[i].type != 'undefined' 
            if (elem[i].type == 'text') {
                document.getElementById(elem[i].id).readOnly = false;
                document.getElementById(elem[i].id).style.height="15px";
                document.getElementById(elem[i].id).style.fontSize="12px";
                if(d.getElementById('frm0601F:cmdValidate').disabled == false){
                    if (disabledItems.contains(elem[i].id)){
                        document.getElementById(elem[i].id).disabled = true;}
                    else{
                        document.getElementById(elem[i].id).disabled = false;}
                }
                else{
                    if (disabledItems.contains(elem[i].id)){
                        document.getElementById(elem[i].id).disabled = true;}
                    else{
                        document.getElementById(elem[i].id).disabled = false;}
                }
            }               
            if (elem[i].type == 'radio' || elem[i].type == 'checkbox') { 
                if(d.getElementById('frm0601F:cmdValidate').disabled == false){
                    if (disabledItems.contains(elem[i].id)){
                        document.getElementById(elem[i].id).disabled = true;}
                    else{
                        document.getElementById(elem[i].id).disabled = false;}
                }
                else{
                    if (disabledItems.contains(elem[i].id)){
                        document.getElementById(elem[i].id).disabled = true;}
                    else{
                        document.getElementById(elem[i].id).disabled = false;}
                }
            }   
            if ( elem[i].type == 'select-one'){
                $( elem[i] ).show();
            }
        }
    }   
    
    $('input').each(function(){
      if (this.type == 'button') {
        if (this.id != 'test') {
            $(this).removeClass('previewButtonClass');
        }   
      } 
    }); 
    
    $('a').each(function(){
        if (this.id.length > 1) {
            if(d.getElementById('frm0601F:cmdValidate').disabled == false){
                if (enableElem){
                d.getElementById(this.id).disabled = true;}
                else if(disableElem){
                d.getElementById(this.id).disabled = false;}
            }
            else{
                if (disableElem){
                d.getElementById(this.id).disabled = true;}
                else if(enableElem){
                d.getElementById(this.id).disabled = false;}
                }
        }
    });     

    $('#formMenu').show('blind');       
    if ( $('#printMenu').css('display') != 'none' ) {   
        $('#printMenu').hide('blind');
    }   
    
    if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
        d.getElementById('frm1601F:j_id201').disabled = true;
        d.getElementById('frm1601F:txtYear').disabled = true;
    }
    
}
Array.prototype.contains = Array.prototype.indexOf ?
    function(val) {
        return this.indexOf(val) > -1;
    } :
    function(val) {
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

    $('#bg').hide(); //800
    $('.printSignFooterClass').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always', 'background':'#ffffff' });    
    $('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
    $('body').css('background','#FFF');
    
    $('#formPaper').css({'max-width':'8.3in !important', 'border':'#000 3px solid' });
    $('#wrapper').css({'max-width':'8.3in !important'});
    $('#container').css({'max-width':'8.3in !important'});  
    
    var elem = document.getElementById('frmMain').elements;
    var x=0;
    disabledItems = new Array();
    for(var i = 0; i < elem.length; i++) {          
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
                document.getElementById(elem[i].id).style.height="10px";
                document.getElementById(elem[i].id).style.fontSize="8px";
            }               
            if (elem[i].type == 'radio' || elem[i].type == 'checkbox') { 
                if (document.getElementById(elem[i].id).disabled) {
                    disabledItems[x] = elem[i].id;
                    x++;
                }
                document.getElementById(elem[i].id).disabled = true;
            }   
            if(elem[i].type == 'select-one'){
                $( elem[i] ).hide();
                var label = "<div class='labels'>".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</div>");
                $( elem[i] ).after(label);
            }
        }
    }   
    
    $('input').each(function(){
      if (this.type == 'button') {
        if (this.id != 'test') {
            $(this).addClass('previewButtonClass');
        }   
      } 
    }); 
    
    $('a').each(function(){
        if (this.id.length > 1) {
            d.getElementById(this.id).disabled = true;
        }
    }); 

    $('#printMenu').show('blind');
    if ( $('#formMenu').css('display') != 'none' ) {    
        $('#formMenu').hide('blind');
    }   
}       

$(document).ready(function(){    
    $("ul.subnav").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled (Adds empty span tag after ul.subnav*)  
    $("ul.topnav li span").click(function() { //When trigger is clicked...            
        //Following events are applied to the subnav itself (moving subnav up and down)  
        $(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click    
        $(this).parent().hover(function() {  
        }, function(){    
            $(this).parent().find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up  
        });  
        //Following events are applied to the trigger (Hover events for the trigger)  
        }).hover(function() {   
            $(this).addClass("subhover"); //On hover over, add class "subhover"  
        }, function(){  //On Hover Out  
            $(this).removeClass("subhover"); //On hover out, remove class "subhover"  
    });
    $("ul.topnav .toplevel").click(function() { //When trigger is clicked...            
        //Following events are applied to the subnav itself (moving subnav up and down)  
        $(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click    
        $(this).parent().hover(function() {  
        }, function(){    
            $(this).parent().find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up  
        });  
        //Following events are applied to the trigger (Hover events for the trigger)  
        }).hover(function() {   
            $(this).addClass("subhover"); //On hover over, add class "subhover"  
        }, function(){  //On Hover Out  
            $(this).removeClass("subhover"); //On hover out, remove class "subhover"  
    });
    
    $("ul.asubnav").parent().append("<span style='display:none;'></span>"); //Only shows drop down trigger when js is enabled (Adds empty span tag after ul.subnav*)  
    $("ul.atopnav li span").click(function() { //When trigger is clicked...            
        //Following events are applied to the subnav itself (moving subnav up and down)  
        $(this).parent().find("ul.asubnav").slideDown('fast').show(); //Drop down the subnav on click    
        $(this).parent().hover(function() {  
        }, function(){    
            $(this).parent().find("ul.asubnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up  
        });  
        //Following events are applied to the trigger (Hover events for the trigger)  
        }).hover(function() {   
            $(this).addClass("subhover"); //On hover over, add class "subhover"  
        }, function(){  //On Hover Out  
            $(this).removeClass("subhover"); //On hover out, remove class "subhover"  
    });
    $("ul.atopnav .atoplevel").click(function() { //When trigger is clicked...            
        //Following events are applied to the subnav itself (moving subnav up and down)  
        $(this).parent().find("ul.asubnav").slideDown('fast').show(); //Drop down the subnav on click    
        $(this).parent().hover(function() {  
        }, function(){    
            $(this).parent().find("ul.asubnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up  
        });  
        //Following events are applied to the trigger (Hover events for the trigger)  
        }).hover(function() {   
            $(this).addClass("subhover"); //On hover over, add class "subhover"  
        }, function(){  //On Hover Out  
            $(this).removeClass("subhover"); //On hover out, remove class "subhover"  
    }); 
});

function encrypt(val) {

    //var bf = new Blowfish('i@f0ffl1n3F0rm$');
    //var ciphertext = bf.encrypt(val);

    var ciphertext = Aes.Ctr.encrypt(val, aesPW, 256);
    return ciphertext;
}

function showModalExport() {
        document.getElementById('container').style.display = "none"; //mainContent
        
        document.getElementById('driveSelectTPExport').disabled = false;
        document.getElementById('btnOkExport').disabled = false;
        document.getElementById('btnCancelExport').disabled = false;
        
        $('#modalExport').show('blind');        
}

function cancelExportModal() {  
        if ( $('#modalExport').css('display') != 'none' ) {
            
            document.getElementById('container').style.display = 'block';       
            $('#modalExport').hide('blind');
        }
        
        //refresh HTA page here. to address: 
        //Issue#380: A return tagged as final copy should not be edited by tp, rdo, rdc. Currently, user can still modify entries.
        //document.location.reload(true);
        disableAllElementIDs();
        d.getElementById('btnUpload').disabled = false;
    }
    
function showModalImport() {
        $('#modalImport').show('blind');        
}

function cancelImportModal() {
        if ( $('#modalImport').css('display') != 'none' ) {
            $('#modalImport').hide('blind');
        }
}
function exportTPFiles(fnToExport) {
    try {
        var drive = d.getElementById('driveSelectTPExport').value;
        if (drive=='0') {
        alert("Please select the drive name of your USB flash drive or CD-RW."); return;
        }

        var fso, fldr;
        var sourceDir = "IAF_RDO_Copy/";
        var destDir   = "IAF_RDO_Copy";
        fso = new ActiveXObject("Scripting.FileSystemObject");
        if (fso.FolderExists(sourceDir)) {
              if (fso.FolderExists(drive+destDir)) {
                   //do nothing here...
              } else {
                   fso.CreateFolder(drive+destDir); 
              }           
              fso.CopyFile(sourceDir+fnToExport, drive+destDir+"/");        
        } else {
              alert("Please insert a recordable media [diskette/universal serial bus (USB) flash drive, compact disc (cd), digital video disc (dvd)] in drive "+drive); return;
        }
     
        alert("Successfully copied files to "+drive+destDir);
        cancelExportModal();

    } catch(e) {
        alert("There is not enough space in drive "+drive); return;
    }
     
}
function exportTPFileInC() {
    try {
        var drive = "C:/";
        if (drive=='0') {
            alert("Please select the drive name of your USB flash drive or CD-RW."); return;
        }

        var fso, fldr;
        var sourceDir = "IAF_RDO_Copy/";
        var destDir   = "IAF_RDO_Copy";
        fso = new ActiveXObject("Scripting.FileSystemObject");
        if (fso.FolderExists(sourceDir)) { //TODO: need to trap non-existing drive to avoid : "Error: Path not found"
              if (fso.FolderExists(drive+destDir)) {
                   //do nothing here...
              } else {
                   fso.CreateFolder(drive+destDir); //TODO: need to trap non-existing drive to avoid : "Error: Path not found"
              }           
              fso.CopyFile(sourceDir+"*", drive+destDir+"/");       
        } else {
              alert("Copy Failed. No such directory: "+sourceDir); return;
        }
     
        cancelExportModal();

    } catch(e) {
        alert("No such drive or directory."); return;
    }
     

}
var onExit = false;
function isOnExit() {
    onExit = true;
}
function saveBeforeExit() {
    var y=confirm( "Are you sure you want to exit?" );
    if (y) {
        saveXML(false);
        //saveXMLProfile(false);
        try {
            deleteTemp();
            window.close(); self.close();
        }
        catch (err) {
            window.close(); self.close();
        }
    }
}
function ShowContainer(param) {
        $('#' + param ).show();
        //$('#container').hide();
    }

function HideContainer(param) {
        if ($('#' + param).css('display') != 'none') {
            $('#' + param).hide();
        }
    }
        
//Final Copy Button:
function openAlertEmail() {       
    var tinNumber = $('#frm1601F\\:txtTIN1').val() + $('#frm1601F\\:txtTIN2').val() + $('#frm1601F\\:txtTIN3').val();
    conService.initConConfig(tinNumber, '1601F');
    /*
    if (conService.canSendToEFPS()) {
        //Only '1700', '1701', '1702EX', '1702MX', '1702RT', '2200A', '2200T' are allowed to submit through eFPS
        //this block will never get executed.
        submitEbir();
    } else {
    */
        if(document.getElementById('txtFinalFlag').value == '2'){   reSendEmail();  return;  }      
        var xmlFileName = createXMLFileName("savefile/");
        var isFileExists = doesFileExists(xmlFileName);
        var isAmendedReturn = isItAnAmendedReturn();
        var fileSys = new ActiveXObject("Scripting.FileSystemObject");
        var xmlFileNameValidate = "";
        
        //as of 10/21/2016
            //if there is already amended filed and will file a not amended,
            //it will restrict it
            if (isAmendedReturn == false) {
                
                if (xmlFileName.indexOf('V') == -1) {
                    xmlFileNameValidate = xmlFileName.substring(xmlFileName.indexOf('/')+1, xmlFileName.indexOf('.xml'));           
                    } else {
                        xmlFileNameValidate = xmlFileName.substring(xmlFileName.indexOf('/')+1, xmlFileName.indexOf('V'));          
                    }
                    
                var hasVersion = false;
                var objEnum = new Enumerator(fileSys.GetFolder("savefile/").Files);
                for(i=0;!objEnum.atEnd();objEnum.moveNext()) {
                    if (objEnum.item().name.indexOf(xmlFileNameValidate) > -1 && objEnum.item().name.indexOf("V") > -1) {
                        hasVersion = true;
                    }
                }   
                   if (hasVersion) {
                    if (!onExit)
                        alert("If your intention is to make an amended return, kindly tick Amended Return to 'Yes' before hitting 'Save' or 'Final Copy' or 'Submit'.");
                    return false;
                }
            }

        if (isFileExists) {
            isAFinalCopy = isItAFinalCopy(xmlFileName);  if(document.getElementById('txtFinalFlag').value == '2'){isAFinalCopy = false;}
        }

        if (isFileExists && isAFinalCopy && isAmendedReturn == false && document.getElementById('txtFinalFlag').value != '3') {
             alert("If your intention is to make an amended return, kindly tick Amended Return to 'Yes' before hitting 'Save' or 'Final Copy' or 'Submit'."); ShowContainer('container');
            return false;
        }
        else{
            if (confirm("Please ensure that you have INTERNET access and a VALID email address is indicated in your tax return.\n\n" +
                   "Are you sure you want to submit?") === true) {
                
                    if (checkNetConnection() === true) {    HideContainer("container");  if(document.getElementById('txtFinalFlag').value == "3"){document.getElementById('txtFinalFlag').value = "2"}else{document.getElementById('txtFinalFlag').value = "0"};    initializeOnOpenAlertEmail();
                        ShowContainer("ebirEnroll");
                    }
                    else {
                        alert("The system detected that you have no internet connection.\nPlease contact your internet service provider."); document.getElementById('txtFinalFlag').value = "3";  saveEncryptedProfile(); checkFinalCopyBtn('1601F');
                        ShowContainer('container');//alert("There is no internet connection, please make sure that an internet connection is available before making a final copy.");
                    }
            }
        }
    
    //}
}


    
    
    
    function sendEmail(sourceElement) {
    
        var isRegisteredTP = (sourceElement.id !== "ebirOnlineConfirmSubmit") ? "N" : "Y";  if(isRegisteredTP == "Y" && (ValidateConfirm() == false)){return;}
        var isAutoEnroll = (sourceElement.id == "ebirEnrollYes") ? "Y" : "N";
        if(isAutoEnroll == "Y"){
            document.getElementById("txtEnroll").value = "Y";
        }

        document.getElementById("ebirOnlineSecret").value = document.getElementById("ebirOnlinePassword").value;  initializeOnSendEmail();
        
        
        
        
        
        
        
        
         
        
        var emailFilePath = saveEncryptedProfile(true);
        
        var dateSubmitted = new Date();
        
        var tpRDOCode = document.getElementById('frm1601F:txtRDOCode').value;
        var formType = "1601F";
        var tpTIN = document.getElementById('frm1601F:txtTIN1').value + document.getElementById('frm1601F:txtTIN2').value + document.getElementById('frm1601F:txtTIN3').value + document.getElementById('frm1601F:txtBranchCode').value;
        var tpMonth = document.getElementById('frm1601F:j_id201').value;
        var tpYear = document.getElementById('frm1601F:txtYear').value;
        
        var fileNameEmail = emailFilePath.substring(emailFilePath.lastIndexOf("\\") + 1, emailFilePath.length);
        var versionNumber = fileNameEmail.lastIndexOf("V") > -1 ? fileNameEmail.substring(fileNameEmail.lastIndexOf("V"), fileNameEmail.lastIndexOf(".")) : "";
        
        //var emailTaxPayer = document.getElementById('frm1702MX:txtPg1Pt1I12Email').value;
        var emailTaxPayer =  document.getElementById('txtEmail').value;
        var emailSubject = tpRDOCode + "_" + formType + "_" + tpTIN + "_" + tpMonth + tpYear + versionNumber;
        
        var emailBody = "Received Email subject to validation of BIR. <br> With attachment '" + fileNameEmail + "' <br> Date and time submitted: " + dateSubmitted +
                        " <br><br> TIN: " + tpTIN +
                        " <br> Name: " + document.getElementById("frm1601F:txtTaxpayerName").value +
                        " <br> Tax Type: Income Tax" +
                        " <br> Form Type: " + formType +
                        " <br> Return Period: " + tpMonth + "/" + tpYear +
                        " <br> <br> Penalties may be imposed for any violation to the provisions of the NIRC and issuances thereof." +
                        " <br> <br> FOR RETURNS WITH PAYMENT" +
                        " <br> Please print the said email together with the Income Tax Return and then Proceed to Pay in the Authorized Agent Bank / Collection Agent under RDO where registered following existing issuances.";
        
        //alert("BIRSendEmail Initiated");
    
        // Display loader to show that an email is being sent
        $('#loader').css('background', 'transparent'); disableDropDown("before");
        $('#loader').show('blind');
        
            try
            {
                //BIRSendEmail('1601F@birgovph.org', '1601F@bir.gov.ph', emailTaxPayer, emailSubject, emailBody, emailFilePath, '1601F', 'smtp1.birgovph.org', '25', isRegisteredTP);
                var ftpFolder = enviService.getFtpFolder('1601F');
                var wsData = conService.getConConfig(); 
                var returnCode = RenameAndSendFile(emailFilePath, emailTaxPayer, ftpFolder, wsData.mode, wsData.srv, wsData.sslport, wsData.port, wsData.usr, wsData.pass); clearFileNameWOemail();
                $('#container').hide();
                if (returnCode == 0) {
                    document.getElementById('txtFinalFlag').value = "1";  updateFinalFlagOnSaveFile(fileNameEmail);    alert("Submit Successful. Subject to validation by BIR. \n\n A notification will be sent to your email ("+ emailTaxPayer +"). Please print or save the email as an evidence of efiled return.");
                    $('#paymentOption').show();
                    $('#paymentOptionCloseBtn').on('click', function () {
                        $('#paymentOption').hide();
                        $('#container').show();
                    });
                }
                else {
                    document.getElementById('txtFinalFlag').value = "2";  updateFinalFlagOnSaveFile(fileNameEmail);   alert('Your Tax Return was not submitted online due to any of the \n following reasons that may interrupt the submission process: \n - No internet connection \n - Slow internet connection \n - Overly restrictive firewall');
                    $('#container').show();
                }
            }
            catch(e)
            {
                    document.getElementById('txtFinalFlag').value = "2";  updateFinalFlagOnSaveFile(fileNameEmail);   alert('Your Tax Return was not submitted online due to any of the \n following reasons that may interrupt the submission process: \n - No internet connection \n - Slow internet connection \n - Overly restrictive firewall');
                    $('#container').show();
            }
            finally
            {
            }
            // Hide loader
        $('#loader').hide('blind');
         $('#loader').css('background', '#FFF'); checkFinalCopyBtn(formType); disableDropDown("after");
        HideContainer('ebirConfirmOnline');
    }
//--------------------------START:  Rollbase REST API using 'create2' and 'setBinaryData' --------------------------
var sessionId;
var respMsg;
var create2Id;

xmlHttp = new XMLHttpRequest(), loginXML = new XMLHttpRequest(), binReturnsUploadXML = new XMLHttpRequest();
/*
var gAdminUser = "";
var gAdminPass = "";

function getAdminUser(val) {
    gAdminUser = val;
}
function getAdminPass(val) {
    gAdminPass = val;
}
function validateAdminLogon() {

    if (gAdminUser.length > 0 && gAdminPass.length > 0) {

        var login = "https://ebirforms.bir.gov.ph:443/rest/api/login?loginName="+gAdminUser+"&password="+gAdminPass;        
        loginXML.open( "GET", login, true);     
        loginXML.send(null);        

    } else {
        alert("Please provide Username and Password.");
        return;
    }   
}

function gotoAdmin() {
    showModalRollbaseLogin();   
}
function showModalRollbaseLogin() {
        document.getElementById('container').style.display = "none";
        $('#modalRollbaseLogin').show('blind');     
} 
        
function cancelModalRollbaseLogin() {
        if ( $('#modalRollbaseLogin').css('display') != 'none' ) {
            document.getElementById('container').style.display = 'block';   
            $('#modalRollbaseLogin').hide('blind');
        }
}*/

var api,x, gRBSessionId;
    function openLogin() {  document.getElementById('txtFinalFlag').value = '3'
        isSubmit = true;
        isSubmitFinal = true;
        if (gIsReadOnly) { 
            isSubmitFinal = false;
        }
        var hasSavedReturn = saveXMLsubmit(true);
        if (hasSavedReturn) {   
            var loginURL = geteBIRFormsOnlineLoginURL();
            x = window.open(loginURL, 'Login_Screen', 'resizable=1,scrollbars=1,height=850,width=900');
            api = window.setInterval(getAPI, 500);
        }
    }
    function getAPI() {
        try {
            if (x.closed) {
                if (api) {
                    if(isSubmitFinal){
                        window.clearInterval(api);
                        api = null;
                        saveXMLsubmit(false);
                    }
                    else{
                        window.clearInterval(api);
                        api = null;
                        saveXMLsubmit(true);
                    }
                }
                return;
            }
            
            if ( $("#response",x.document).length > 0 )
                $("#responsetext").val( $("#response",x.document).val() );
            else return;
            var response = String( $("#responsetext").val() );
            gRBSessionId = response; 
            
            /* sessionId = gRBSessionId.split('sessionId');
            sessionId = String(sessionId[1]);
            sessionId = sessionId.substring(1,sessionId.length-2);          
            
            if (response.length != 0 && sessionId != 'ndefin') {

                //x.close();
                window.clearInterval(api);
                //alert("Session ID : '"+sessionId+"' successfully created!");
                createRecord(); 
            } 
            //else if (response.length != 0 && sessionId == 'ndefin') {
                //alert("Invalid username and password!");
            //} */
            sessionId = gRBSessionId.split('<sessionId>');
            sessionId = String(sessionId[1]);
            sessionId = sessionId.split('</sessionId>');
            sessionId = String(sessionId[0]);               
            //alert('sessionId = '+sessionId);

            if (response.length != 0 && (sessionId != 'undefined' || sessionId != '<?xml ver')) {
                createRecord();                         
                window.clearInterval(api);
            } 
        }
        catch (e) {
            return;
        }
    }
    
/* Commented for logon IAF 
function uploadMe() {   
    saveXML(true);
    gotoAdmin();
}
function uploadMe() {   
    saveXML(true);
    //dgarfin TODO: username/password should not be hard-coded here.  It should verify first if there's an IAF session.  
    //If it has, then supply it with 'loginName' and 'password'.  
    //Otherwise, popup a new window asking user to login to IAF then if logged in successfully, supply credentials to params
    var login = "https://ebirforms.bir.gov.ph:443/rest/api/login?loginName=dgarfin_tester@bir_dev&password=142857";
    loginXML.open( "GET", login, true);
    loginXML.send(null); 
}

loginXML.onreadystatechange = function() { 
    if ( loginXML.readyState == 4 && loginXML.status==200 ) { //Request Complete    
        sessionId = String(loginXML.responseText).split('sessionId');
        sessionId = String(sessionId[1]);
        sessionId = sessionId.substring(1,sessionId.length-2);      
        

        // Commented for logon IAF
        if ( $('#modalRollbaseLogin').css('display') != 'none' ) {
            document.getElementById('container').style.display = 'block';   
            $('#modalRollbaseLogin').hide('blind');
        }///        
        alert("Session ID : '"+sessionId+"' successfully created!");
        createRecord();
     
    }
    else if ( loginXML.readyState == 3 && loginXML.status!=200 ) {
        //alert('readyState = '+loginXML.readyState+' status = '+loginXML.status);  //2/403;3/403;
        alert('Wrong credentials provided.  Pls try again.');
        return;
    }   
}*/

    xmlFileForCreate2X = new Date();
    //getURL() is defined in string-util.js
    var rbURL = getURL();
function createRecord () {

    createURL = rbURL + "/rest/api/create2?sessionId="+sessionId+"&objName=upload1&tax_due="+p3BasicTax+"&total_penalties="+p3TotalPenalties+"&total_amount_payable="+p3TotalAmountPayable+"&tp_zip="+p3TPZip+"&tp_addr="+p3TPAddress+"&tp_telnum="+p3TPTelNum+"&tp_name="+p3TPName+"&tp_lob="+p3TPLineBus+"&tp_rdo_code="+p3TPRDOCode+"&tp_branch_code="+p3TPBranchCode+"&tp_tin="+p3TPTIN+"&surcharge="+p3Surcharge+"&compromise="+p3Compromise+"&interest="+p3Interest+"&is_amended_return="+p3IsAmended+"&return_period="+p3ReturnPeriod+"&return_period_end="+p3ReturnPeriodEnd+"&useIds=false&form_type_text=1601F-Sep2005&load="+xmlFileForCreate2X; //FOR create2
 
    // xmlHttp.open( "GET", encodeURI(createURL), true); //xxx
    // xmlHttp.send(null); 

    xmlHttp.open( "POST", createURL, false);
    xmlHttp.send();

    var respXMLMsg = xmlHttp.responseText; 

    create2Id = respXMLMsg;
    create2Id = create2Id.split('id=');
    create2Id = String(create2Id[1]).replace(/"/gi,'');
    create2Id = String( parseInt(create2Id) ).replace(/ /,'');
    
    //alert("Form ID : '"+create2Id+"' successfully created!");
    x.document.theForm.submit();
    uploadXMLFile();
} 

/* xmlHttp.onreadystatechange = function() {
    if ( xmlHttp.readyState == 4 && xmlHttp.status==200 ) { //Request Complete

        var respXMLMsg = xmlHttp.responseText;
        //Get ID of response from Create2
        create2Id = respXMLMsg.substring(respXMLMsg.indexOf('data  id=')+10, respXMLMsg.indexOf(' objName=')-1); //should be at least 8-digit ID here       
        //alert("Form ID : '"+create2Id+"' successfully created!"); 

        if (isNaN(create2Id)) {
                //alert('Tax return filing is unsuccessful!');
                x.close();
                openLogin();
        } else {
                //alert("Form ID : '"+create2Id+"' successfully created!");     
                uploadXMLFile();                
        }

    }
} */

function uploadXMLFile () { 
    var binDataURL;
    
    //Dev Note: frmMainSrc contains the HTML and content of the form
    //frmMainSrc should get the print preview version
    // $('#frmMain').html(); //content of the loop
    printme();

    if (savedReturn != null && savedReturn.length > 0) {
        var intervalCnt = 1000;
    
        var xmlFileForUpload = savedReturn.replace(/&nbsp;/g,"<span style='padding-left:0.25em'> </span>"); 
        xmlFileForUpload = xmlFileForUpload.replace(/&amp;/g,"AND");
        xmlFileForUpload = xmlFileForUpload.replace(/&/g,"_AND_");
        xmlFileForUpload = xmlFileForUpload.replace(/\+/g,"_PLUS_");        
        var savedReturnLen = xmlFileForUpload.length;   

        //Loop Begin - create submit_return_data records, related to Created Upload File -      
        var numOfSRLoops = Math.ceil(savedReturnLen*1 / intervalCnt);   
        var loopSRCnt = numOfSRLoops+1;
        var startSRPost = 0;
        var endSRPost = intervalCnt;
        var partSRCnt = 1;
        
        for(var i = 0; i < numOfSRLoops; i++) { 
            
            binDataURL = rbURL + "/rest/api/create2?sessionId="+sessionId+"&objName=submit_return_data&useIds=false&index_="+partSRCnt+"&name=1601F_part"+partSRCnt+"&R95607586="+create2Id+"&content="+xmlFileForUpload.substring(startSRPost, endSRPost);
            var binDataUploadXML = new XMLHttpRequest();
            // binDataUploadXML.open( "GET", encodeURI(binDataURL) , false); 
            // binDataUploadXML.send(null);
            
            binDataUploadXML.open( "POST", encodeURI(binDataURL) , false); 
            binDataUploadXML.send();
            
            //xmlFn.writeLine(xmlFileInBase64.substring(startSRPost, endSRPost)+"\n\ncompleted\n\n");           
            //alert('i = '+i+' startSRPost = '+startSRPost+' endSRPost = '+endSRPost);  
            
            startSRPost = startSRPost + intervalCnt;
            if (i == numOfSRLoops-1) {
                endSRPost = savedReturnLen;         
            } else {
                endSRPost = endSRPost + intervalCnt;
            }   
            partSRCnt++;
        }
        //alert("A total of "+loopSRCnt+" iterations are uploaded in 'submit_return_data' object for this form!");  
        cancel();
        disableAllElementIDs();
        //Open a new page, displaying the created form
        //alert("Finished Loading REST 'create2' request for FORMS object.");
        
        //getDisplayPageURL() is defined in string-util2014.js
        var redirectURL = x.window.location.href;
        var formURL = getDisplayPageURL(redirectURL, create2Id);
        if( parseInt(create2Id) > 0 ) window.open(formURL,'Login_Screen','resizable=1,scrollbars=1,height=850,width=900');
    } else {
        alert("Tax Return file does not exists.  Cannot proceed with submission.");     
        return;
    }
    
//xmlFn.close();        

} 
//--------------------------END:  Rollbase REST API using 'create2' and 'setBinaryData' --------------------------

</script>
@endsection