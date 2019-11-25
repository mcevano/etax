@extends('layouts.app')
@section('title', '| BIR Form No. 1603Qv2018')
@section('content')

<!-- <div class="loader"></div> -->
<!-- Styles -->
<link href="{{ asset('css/forms.css') }}" rel="stylesheet">
<!-- Modals -->
<div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Alert Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info message">
            Do you want to save the changes you've made in this form?
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-exit" id="1603Qv2018" company='{{$company->id}}'>No</button>
        <button type="button" class="btn btn-primary" onclick="saveBeforeExit()" >Yes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="savedAlertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Success!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body message"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-exit" id="1603Qv2018" company='{{$company->id}}'>Okay</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="fillingSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            Submit successful. Subject to validation by BIR.<br> 
             A notification will be sent to your email address. Please print or save the email as an evidence of efiled return.
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-filing-success" form='1603Qv2018' company='{{$company->id}}'>Okay</button>
        </div>
    </div>
  </div>
</div>
<form id="frmMain" name="frmMain">
  @csrf
        <input type="hidden" name="company" value="{{ $company->id}}">
        <input type="hidden" name="form_no" value="{{ $action == 'new' ? $form_no : $data->form_no }}">
        <input type="hidden" name="form_id" value="{{ $action == 'new' ? '' : $data->id }}">
        <input type="hidden" name="file_name" id="file_name" value="{{ $action == 'new' ? '' : '/savefile/'.$xml[0]->file_name }}">
        <div id="container">
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 880px; ">
      
        <table border="0" width="800" cellspacing="0" cellpadding="0" align="center" style="background-repeat: repeat-x;">
        <tr><td>
      
                <div id="formPaper">
                  <div id="Page1Content">
                    <table width="800" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="800" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="300" valign="bottom">
                                            <p><img src="{{ asset('images/bcs_new.png') }}" width="80" /> </p>
                                        </td>
                                        <td>
                                            <p><img src="{{ asset('images/header_logo.png') }}" width="210" height="50px" /> </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="800" border="1" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="120" valign="middle" style="text-align: center;">
                                            <font face="Arial" size="1px">BIR Form No.</font>
                                            <br/><font size="5px" style="font-weight:bold;">1603Q</font>
                                            <br/><font face="Arial" size="1px">January 2018 (ENCS)</font>
                                            <br/><font face="Arial" size="1px" style="font-weight:bold;">Page 1</font>
                                        </td>
                                        <td width="0" valign="center" style="text-align: center;">
                                            <font size="5px" style="font-weight:bold;">Quarterly Remittance Return</font>
                                            <br/><font size="3px" style="font-weight:bold;">of Final Income Taxes Withheld on Fringe Benefits</font>
                                            <br/><font size="3px" style="font-weight:bold;">Paid to Employees Other Than Rank and File</font>
                                            <br><label face="Arial" size="1px">Enter all required information in CAPITAL LETTERS using BLACK ink. Mark all applicable boxes with an "X". Two copies MUST be filed with the BIR and one held by the Tax Filer.</label>
                                        </td>
                                        <td width="200" valign="center">
                                                <p><img class="barcodes" src="{{ asset('images/Bar Codes/1603Q_p1.png') }}" width="220" height="75px" /> </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="120" valign="top" class="tblFormTd">
                                            <table width="100" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="23"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td colspan="3"><font size="1" style="font-size: 11px;">For the Year</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td width="92" align="left"> <input type="text" value="" size="4" name="frm1603Q:txtYear" maxlength="4" id="frm1603Q:txtYear" style="width:61px" onblur="blockletterWithout2Decimal(this);validateYear();" onkeypress="return wholenumber(this, event)" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="190" valign="top" class="tblFormTd" style="height:20px">
                                            <table width="188" border="0" cellspacing="0" cellpadding="0" style="height:20px">
                                                <tr>
                                                    <td width="24"><font size="2" style="font-weight: bold;">&nbsp;&nbsp;2&nbsp;&nbsp;</font></td>
                                                    <td width="146"><font size="1" style="font-size: 11px;">Quarter</font></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div align="center" style="padding: 0px 0 0px 0;">
                                                            <table cellspacing="0" cellpadding="0" border="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center">
                                                                            <input type="radio" value="1" name="frm1603Q:optQuarter" id="frm1603Q:optQuarter1" onclick="" />
                                                                            <label for="frm1603Q:optQuarter1" style="font-size: 11px;">1st</label>
                                                                            &nbsp;&nbsp;
                                                                        </td>
                                                                        <td align="center">
                                                                            <input type="radio" value="2" name="frm1603Q:optQuarter" id="frm1603Q:optQuarter2" onclick="" />
                                                                            <label for="frm1603Q:optQuarter2" style="font-size: 11px;">2nd</label>
                                                                            &nbsp;&nbsp;
                                                                        </td>
                                                                        <td align="center">
                                                                            <input type="radio" value="3" name="frm1603Q:optQuarter" id="frm1603Q:optQuarter3" onclick="" />
                                                                            <label for="frm1603Q:optQuarter3" style="font-size: 11px;">3rd</label>
                                                                            &nbsp;&nbsp;
                                                                        </td>
                                                                        <td align="center">
                                                                            <input type="radio" value="4" name="frm1603Q:optQuarter" id="frm1603Q:optQuarter4" onclick="" />
                                                                            <label for="frm1603Q:optQuarter4" style="font-size: 11px;">4th</label>
                                                                            &nbsp;&nbsp;
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- </fieldset>-->
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="160" valign="top" class="tblFormTd">
                                            <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1603Q:j_id217" class="iceSelOneRb-dis fieldText1-dis">
                                                            <div align="center" style="padding: 1px 0 1px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="Y" name="frm1603Q:AmendedRtn" id="frm1603Q:AmendedRtn_1" onclick="d.getElementById('frm1603Q:txtTax15').disabled = false;" /><label for="frm1603Q:AmendedRtn_1" style="font-size:11px;" >Yes</label></td>
                                                                            <td><input type="radio" value="N"  name="frm1603Q:AmendedRtn" id="frm1603Q:AmendedRtn_2" onclick="d.getElementById('frm1603Q:txtTax15').disabled = true;d.getElementById('frm1603Q:txtTax15').value = '0.00';computeTaxStillDue()" checked="checked" /><label for="frm1603Q:AmendedRtn_2" style="font-size:11px;" >No</label></td>
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
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">Any Taxes Withheld?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1603Q:j_id252" class="iceSelOneRb fieldText1">
                                                            <div align="center" style="padding: 1px 0 1px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="Y" name="frm1603Q:TaxWithheld" id="frm1603Q:TaxWithheld_1" onclick="changeTaxWitheld(1)" /><label for="frm1603Q:TaxWithheld_1" style="font-size:11px;" >Yes</label></td>
                                                                            <td><input type="radio" value="N" name="frm1603Q:TaxWithheld" id="frm1603Q:TaxWithheld_2" onclick="changeTaxWitheld(2)" /><label for="frm1603Q:TaxWithheld_2" style="font-size:11px;" >No</label></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="160" valign="top" class="tblFormTd">
                                            <table width="140" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;5&nbsp;&nbsp;&nbsp;</font></td>
                                                    
                                                    <td><font size="1" style="font-size: 11px;">No. of Sheet/s Attached</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><input type="text" value="0" style="text-align: right;" size="4" name="frm1603Q:txtSheets" maxlength="2" id="frm1603Q:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
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
                                        <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                            <table width="" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100%">
                                                        <div align="center"><font size="2" style="font-weight:bold;">PART I - BACKGROUND INFORMATION</font></div>
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
                                        <td width="550" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">Taxpayer Identification Number (TIN)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="{{$company->tin1}}" size="3" name="frm1603Q:txtTIN1" maxlength="3" id="frm1603Q:txtTIN1" onkeypress="return wholenumber(this, event)" disabled />&nbsp;/&nbsp;
                                                            <input type="text" value="{{$company->tin2}}" size="3" name="frm1603Q:txtTIN2" maxlength="3" id="frm1603Q:txtTIN2" onkeypress="return wholenumber(this, event)" disabled />&nbsp;/&nbsp;
                                                            <input type="text" value="{{$company->tin3}}" size="3" name="frm1603Q:txtTIN3" maxlength="3" id="frm1603Q:txtTIN3" onkeypress="return wholenumber(this, event)" disabled />&nbsp;/&nbsp;
                                                            <input type="text" value="{{$company->tin4}}" size="5" name="frm1603Q:txtBranchCode" maxlength="3" id="frm1603Q:txtBranchCode" onkeypress="return letternumber(event)" disabled />
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="150" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="80"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;&nbsp;&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                    <td id="rdoSelect">
                                                        <select class='iceSelOneMnu' id='frm1603Q:rdoCode' name='frm1603Q:rdoCode' size='1' disabled >
                                                          <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                        </select>
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
                                                                <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;&nbsp;&nbsp;</font></td>
                                                                <td><font size="1" style="font-size: 11px;">Withholding Agent's Name <i>(Last Name, First Name, Middle Name for Individual OR Registered Name for Non-Individual)</i></font></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="25">&nbsp;</td>
                                                                <td><input type="text" value="{{$company->registered_name}}" size="120" name="frm1603Q:txtTaxpayerName" maxlength="50" id="frm1603Q:txtTaxpayerName" onblur="return capital(this, event)" disabled /></td>
                                                            </tr>
                                                        </table>
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
                                        <td width="80%" valign="top" class="tblFormTd" colspan="2">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="11"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;&nbsp;&nbsp;</font></td>
                                                                <td><font size="1" style="font-size: 11px;">Registered Address </font><font style="font-size:8px"><i>(Indicate complete address. If branch, indicate the branch address. If the registered address is different from the current address, go to the RDO to update registered address by using BIR Form No. 1905)</i></font></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="25">&nbsp;</td>
                                                                <td><input type="text" value="{{$company->address}}" size="120" name="frm1603Q:txtAddress" maxlength="100" id="frm1603Q:txtAddress" onblur="return capital(this, event)" disabled /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="580" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                        <td width="25">&nbsp;</td>
                                                    <td>
                                                            <input type="text" value="" size="85" name="frm1603Q:txtAddress2" maxlength="50" id="frm1603Q:txtAddress2" onblur="return capital(this, event)" disabled="true" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="140" class="tblFormTd">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td>
                                                        <font size="2" style="font-weight:bold;">&nbsp;9A&nbsp;&nbsp;&nbsp;</font><font size="1" style="font-size: 11px;">Zip
                                                            Code</font>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" value="{{$company->zip_code}}" size="2" name="frm1603Q:txtZipCode" maxlength="12" id="frm1603Q:txtZipCode" onkeypress="return wholenumber(this, event)" disabled="true" />
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
                                    <td width="40%" class="tblFormTd">
                                        <table width="320" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td width="115">
                                                    <font size="2" style="font-weight:bold;">&nbsp;10&nbsp;&nbsp;&nbsp;</font><font size="1" style="font-size: 11px;">Contact
                                                        Number</font></td>
                                                <td>
                                                    <input type="text" value="{{$company->tel_number}}" size="28" name="frm1603Q:txtTelNum" maxlength="20" id="frm1603Q:txtTelNum" onkeypress="return wholenumber(this, event)" disabled />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="60%" class="tblFormTd">
                                        <table width="400" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td width="200">
                                                    <font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font><font size="1" style="font-size: 11px;">Category
                                                        of Withholding Agent</font>
                                                </td>
                                                <td>
                                                    <div align="left">
                                                        <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:180px;" id="frm1603Q:j_id392" class="iceSelOneRb fieldText1">
                                                            <div align="center" style="padding: 5px 0 5px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="P" name="frm1603Q:CatAgent" id="frm1603Q:CatAgent_P" onclick="" /><label for="frm1603Q:CatAgent_P" style="font-size:11px;" >Private</label>&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" value="G" name="frm1603Q:CatAgent" id="frm1603Q:CatAgent_G" onclick="" /><label for="frm1603Q:CatAgent_G" style="font-size:11px;" >Government</label></td>
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
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <td class="tblFormTd">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">Email Address</font></td>
                                                    <td width="21"></td>
                                                    <td><input type="text" style="margin-left: 1px;" value="{{$company->email_address}}" size="104" name="txtEmail" maxlength="60" id="txtEmail" disabled /></td>
                                            </tr>
                                        </table>
                                        </td>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="800">
                                    <tr>
                                        <td class="tblFormTd" valign="top" width="750">
                                            <table width="750" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="300"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font><label size="1" style="font-size: 11px;">Are there payees availing of tax relief under <br> Special Law or International Tax Treaty?</label>
                                                    </td>
                                                    <td width="150">
                                                        <div>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:150px" id="frm1603Q:j_id398" class="iceSelOneRb-dis fieldText1-dis">
                                                                <div align="center" style="padding: 5px 0 5px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="radio" value="Y" name="frm1603Q:SpecialTax" id="frm1603Q:SpecialTax_1"  onclick="enableSelTreaty()" /><label for="frm1603Q:SpecialTax_1" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                <td><input type="radio" value="N" name="frm1603Q:SpecialTax" id="frm1603Q:SpecialTax_2"  onclick="disableSelTreaty()" checked="checked" /><label for="frm1603Q:SpecialTax_2" style="font-size:11px;" >No</label></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </td>
                                                    <td width="25">&nbsp;</td>
                                                    <td width="300">
                                                        <font size="2" style="font-weight:bold;">&nbsp;13A&nbsp;</font>
                                                        <label id="frm1603Q:j_id401" class="iceOutLbl fieldLabel1" style="font-size: 11px;">If yes, specify</label>
                                                        <select style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; background-color: rgb(220, 220, 220);" size="1" name="frm1603Q:selTreaty" id="frm1603Q:selTreaty" disabled >
                                                            <option value="0" selected="selected"> </option>
                                                            <option value="1">Special Rate</option>
                                                            <option value="2">International Tax Treaty</option>
                                                            <option value="3">Both</option>
                                                        </select>
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
                                        <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                            <table width="" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100%">
                                                        <div align="center"><font size="2" style="font-weight:bold;">PART II - COMPUTATION OF TAX</font></div>
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
                                        <td class="tblFormTd">
                                            <table width="740" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="26"><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td width="426"><font size="1">&nbsp;</font><font size="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Taxes Withheld <a href="javascript:void(0)" id="btnNavigatePage2_1" class="xsmallItalic"  onclick="processNext()">(From Part IV-Schedule 1) </a></font></td>
                                                    <td width="94">
                                                        <div class="spacePadder">                                                    </div>
                                                    </td>
                                                    <td width="193">
                                                        <span class="spacePadder">
                                                            <font size="2" style="font-weight:bold;">14</font>&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" name="frm1603Q:txtTax14" maxlength="25" id="frm1603Q:txtTax14" disabled  />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;15&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1">&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Tax Remitted in Return Previously Filed, if this is an amended return </font>
                                                    </td>
                                                    <td>
                                                        <div class="spacePadder">                                                    </div>
                                                    </td>
                                                    <td><span class="spacePadder">
                                                            <font size="2" style="font-weight:bold;">15</font>&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" name="frm1603Q:txtTax15" maxlength="25" id="frm1603Q:txtTax15" onblur="round(this,2);computeTax17();" onkeypress="return numbersonly(this, event)" disabled />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;16&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1">&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Other Remittances Made (specify) </font>
                                                        <input type="text" value="" maxlength="25" size="20" id="frm1603Q:txt16Other" name="frm1603Q:txt16Other" />
                                                    </td>
                                                    <td>
                                                        <div class="spacePadder">                                                    </div>
                                                    </td>
                                                    <td><span class="spacePadder">
                                                            <font size="2" style="font-weight:bold;">16</font>&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" name="frm1603Q:txtTax16" maxlength="25" id="frm1603Q:txtTax16" onblur="round(this,2);computeTax17();" onkeypress="return numbersonly(this, event)" />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;17&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1">&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Remittances Made (Sum of Items 15 and 16) </font>
                                                    </td>
                                                    <td>
                                                        <div class="spacePadder">                                                    </div>
                                                    </td>
                                                    <td><span class="spacePadder">
                                                            <font size="2" style="font-weight:bold;">17</font>&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" name="frm1603Q:txtTax17" maxlength="25" id="frm1603Q:txtTax17" disabled />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1">&nbsp;</font><font size="1" style="font-weight:bold;" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Still Due</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">/(Over-remittance) (Item 14 Less Item 17) </font>
                                                    </td>
                                                    <td>
                                                        <div class="spacePadder">                                                    </div>
                                                    </td>
                                                    <td><span class="spacePadder">
                                                            <font size="2" style="font-weight:bold;">18</font>&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220);text-align: right;" size="20" name="frm1603Q:txtTax18" maxlength="25" id="frm1603Q:txtTax18" disabled />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <table width="400" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="100">
                                                                    <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Add: Penalties </font>
                                                                </td>
                                                                <td>
                                                                    <font size="2" style="font-weight:bold;">&nbsp;19&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"> Surcharge</font>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <span class="spacePadder">
                                                            <font size="2" style="font-weight:bold;">19</font>&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1603Q:txtTax19" maxlength="25" id="frm1603Q:txtTax19" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <table width="400" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="100">&nbsp;</td>
                                                                <td>
                                                                    <font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Interest</font>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <span class="spacePadder">
                                                            <font size="2" style="font-weight:bold;">20</font>&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1603Q:txtTax20" maxlength="25" id="frm1603Q:txtTax20" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <table width="400" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="100">&nbsp;</td>
                                                                <td>
                                                                    <font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Compromise</font>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <span class="spacePadder">
                                                            <font size="2" style="font-weight:bold;">21</font>&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1603Q:txtTax21" maxlength="25" id="frm1603Q:txtTax21" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <table width="400" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="100">&nbsp;</td>
                                                                <td>
                                                                    <font size="2" style="font-weight:bold;">&nbsp;22&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Penalties (Sum of Items 19 to 21)</font>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <span class="spacePadder">
                                                            <font size="2" style="font-weight:bold;">22</font>&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" id="frm1603Q:txtTax22" name="frm1603Q:txtTax22" disabled />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1">&nbsp;</font><font size="1" style="font-weight:bold;" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">TOTAL AMOUNT STILL DUE </font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"> (Sum of Items 18 and 22) </font>
                                                    </td>
                                                    <td>
                                                        <div class="spacePadder">                                                    </div>
                                                    </td>
                                                    <td><span class="spacePadder">
                                                            <font size="2" style="font-weight:bold;">23</font>&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220);text-align: right;" size="20" name="frm1603Q:txtTax23" maxlength="25" id="frm1603Q:txtTax23" disabled />
                                                        </span>
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
                                <table width="800" border="1" cellspacing="0" cellpadding="0" style="font-family:arial; font-size:10px; text-align: center; vertical-align: top; table-layout: fixed;">
                                <col width="25%" />
                                <col width="25%" />
                                <col width="25%" />
                                <col width="25%" />
                                <tr>
                                    <td colspan="4" style="text-align: left; ">&nbsp;&nbsp;&nbsp;&nbsp;I/We declare under the penalties of perjury that this remittance return, and all its attachments, have been made in good faith, verified by me/us, and to the best of my/our knowledge and belief, is 
                                        true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof. Further, I give my consent to the processing of my information as contemplated under the *Data Privacy Act of 2012 (R.A. No. 10173) 
                                        for legitimate and lawful purposes. (If Authorized Representative, attach authorization letter)<br></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: left; ">For Individual:
                                        <br><br><br><br>
                                    </td>
                                    <td colspan="2" style="text-align: left; ">For Non-Individual:
                                        <br><br><br><br></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Signature over Printed Name of Taxpayer/Authorized Representative/Tax Agent<br>
                                        (Indicate Title/Designation and TIN)</td>
                                    <td colspan="2">Signature over Printed Name of President/Vice President/ <br>
                                        Authorized Officer or Representative/Tax Agent <font style="font-size: 8px;">(Indicate Title/Designation and TIN)</font></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>
                                                    Tax Agent Accreditation No./ <br>
                                                    Attorney's Roll No. (If applicable)
                                                </td>
                                                <td>
                                                    <input type="text" value="" id="txtTaxAgentNo" size="25" maxlength="20" disabled="true" >
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>
                                                    Date of Issue <br>
                                                    (MM/DD/YYYY)
                                                </td>
                                                <td>
                                                    <input type="text" value="" id="txtDateIssue" maxlength="10" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" style="width: 141px;" >
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>
                                                    Date of Expiry <br>
                                                    (MM/DD/YYYY)
                                                </td>
                                                <td>
                                                    <input type="text" value="" id="txtDateExpiry" maxlength="10" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true"  style="width: 141px;"  />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </table>
                                <!--</div>-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                            <table width="" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100%">
                                                        <div align="center"><font size="2" style="font-weight:bold;">PART III - DETAILS OF PAYMENT</font></div>
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
                                        <td valign="top" class="tblFormTd">
                                            <table border="1" cellpadding="0" cellspacing="0" width="100%" class="tblForm">
                                                <tr>
                                                    <td width="20%"><div align="center"><font size="1" style="font-weight:bold;">Particulars </font></div></td>
                                                    <td width="15%"><div align="center"><font size="1" style="font-weight:bold;">Drawee Bank/Agency </font></div></td>
                                                    <td width="20%"><div align="center"><font size="1" style="font-weight:bold;">Number </font></div></td>
                                                    <td width="20%"><div align="center"><font size="1" style="font-weight:bold;">Date (MM/DD/YYYY) </font></div></td>
                                                    <td width="25%"><div align="center"><font size="1" style="font-weight:bold;">Amount </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;&nbsp;&nbsp;</font><font size="1">Cash/Bank Debit Memo </font></td>
                                                    <td align="center"><input type="text" value="" size="20" name="frm1603Q:txtAgency24" maxlength="50" id="frm1603Q:txtAgency24" disabled  /></td>
                                                    <td align="center"><input type="text" value="" size="20" name="frm1603Q:txtNumber24" maxlength="50" id="frm1603Q:txtNumber24" disabled  /></td>
                                                    <td align="center"><input type="text" value="" size="20" name="frm1603Q:txtDate24" maxlength="10" id="frm1603Q:txtDate24" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled /></td>
                                                    <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1603Q:txtAmount24" maxlength="50" id="frm1603Q:txtAmount24" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled /></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;25&nbsp;&nbsp;&nbsp;</font><font size="1">Check </font></td>
                                                    <td align="center"><input type="text" value="" size="20" name="frm1603Q:txtAgency25" maxlength="50" id="frm1603Q:txtAgency25" disabled="true" /></td>
                                                    <td align="center"><input type="text" value="" size="20" name="frm1603Q:txtNumber25" maxlength="50" id="frm1603Q:txtNumber25" disabled="true" /></td>
                                                    <td align="center"><input type="text" value="" size="20" name="frm1603Q:txtDate25" maxlength="10" id="frm1603Q:txtDate25" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled /></td>
                                                    <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1603Q:txtAmount25" maxlength="50" id="frm1603Q:txtAmount25" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled /></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><font size="2" style="font-weight:bold;">&nbsp;26&nbsp;&nbsp;&nbsp;</font><font size="1">Tax Debit Memo </font></td>
                                                    <td align="center"><input type="text" value="" size="20" name="frm1603Q:txtNumber26" maxlength="50" id="frm1603Q:txtNumber26" disabled="true" /></td>
                                                    <td align="center"><input type="text" value="" size="20" name="frm1603Q:txtDate26" maxlength="10" id="frm1603Q:txtDate26" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled /></td>
                                                    <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1603Q:txtAmount26" maxlength="50" id="frm1603Q:txtAmount26" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled /></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"><font size="2" style="font-weight:bold;">&nbsp;27&nbsp;&nbsp;&nbsp;</font><font size="1">Others (specify below) </font></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" value="" size="20" name="frm1603Q:txtParticular27" maxlength="50" id="frm1603Q:txtParticular27" disabled="true" /></td>
                                                    <td align="center"><input type="text" value="" size="20" name="frm1603Q:txtAgency27" maxlength="50" id="frm1603Q:txtAgency27" disabled="true" /></td>
                                                    <td align="center"><input type="text" value="" size="20" name="frm1603Q:txtNumber27" maxlength="50" id="frm1603Q:txtNumber27" disabled="true" /></td>
                                                    <td align="center"><input type="text" value="" size="20" name="frm1603Q:txtDate27" maxlength="10" id="frm1603Q:txtDate27" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled /></td>
                                                    <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1603Q:txtAmount27" maxlength="50" id="frm1603Q:txtAmount27" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled /></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <!--<div class="imgClass" align='center' style="width:800px !important;">-->
                                <table border="1" width="800" cellspacing="0" cellpadding="0" style="font-size:10px; text-align: left; vertical-align: top;">
                                <tr>
                                    <td width="57%">Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br /><br /><br /><br /><br /><br /><br /></td>
                                    <td width="43%">Stamp of Receiving Office/AAB and Date of Receipt (RO's Signature/Bank Teller's Initial)<br /><br /><br /><br /><br /><br /><br /></td>
                                </tr>
                                </table>
                                <!--</div>-->
                            </td>
                        </tr>
                    </table>
                  </div>
                <div id="Page2Content" style="display:none;">
                    <table width="800" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="800" border="1" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="120" valign="middle" style="text-align: center;">
                                            <font face="Arial" size="1px">BIR Form No.</font>
                                            <br/><font size="5px" style="font-weight:bold;">1603Q</font>
                                            <br/><font face="Arial" size="1px">January 2018 (ENCS)</font>
                                            <br/><font face="Arial" size="1px" style="font-weight:bold;">Page 2</font>
                                        </td>
                                        <td width="0" valign="center" style="text-align: center;">
                                            <font size="5px" style="font-weight:bold;">Quarterly Remittance Return</font>
                                            <br/><font size="3px" style="font-weight:bold;">of Final Income Taxes Withheld on Fringe Benefits</font>
                                            <br/><font size="3px" style="font-weight:bold;">Paid to Employees Other Than Rank and File</font>
                                            <br><label face="Arial" size="1px">Enter all required information in CAPITAL LETTERS using BLACK ink. Mark all applicable boxes with an "X". Two copies MUST be filed with the BIR and one held by the Tax Filer.</label>
                                        </td>
                                        <td width="200" valign="center">
                                                <p><img class="barcodes" src="{{ asset('images/Bar Codes/1603Q_p2.png') }}" width="220" height="75px" /> </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="40%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">TIN</font></td>
                                        <td width="60%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Withholding Agent's Name (Last Name for Individual OR Registered Name for Non-Individual)</font></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <font size="2" face="Arial">
                                                <input type="text" value="{{$company->tin1}}" size="3" name="frm1603Q:txtPg2TIN1" maxlength="3" id="frm1603Q:txtPg2TIN1" onkeypress="return wholenumber(this, event)" disabled />
                                                <input type="text" value="{{$company->tin2}}" size="3" name="frm1603Q:txtPg2TIN2" maxlength="3" id="frm1603Q:txtPg2TIN2" onkeypress="return wholenumber(this, event)" disabled />
                                                <input type="text" value="{{$company->tin3}}" size="3" name="frm1603Q:txtPg2TIN3" maxlength="3" id="frm1603Q:txtPg2TIN3" onkeypress="return wholenumber(this, event)" disabled />
                                                <input type="text" value="{{$company->tin4}}" size="5" name="frm1603Q:txtPg2BranchCode" maxlength="5" id="frm1603Q:txtPg2BranchCode" onkeypress="return letternumber(event)" disabled />
                                            </font>
                                        </td>
                                        <?php 
                                                $lastname = explode(",", $company['registered_name'])
                                        ?>
                                        <td><input type="text" value="{{ $lastname[0] }}" size="80" name="frm1603Q:txtPg2TaxpayerName" maxlength="50" id="frm1603Q:txtPg2TaxpayerName" onblur="return capital(this, event)" disabled /></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                            <table width="" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100%">
                                                        <div align="center"><font size="2" style="font-weight:bold;">PART IV - DETAILS OF TAXES WITHHELD </font></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                <div><font size="1" style="font-weight:bold;font-size: 11px;">Schedule I </font><font size= "1" style="font-size: 11px;">- Computation of Tax</font></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tblFormTd">
                                <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="480" align="center" colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Recipients <br> (A) </font></th>
                                            <th width="70" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">ATC <br> (B)</th>
                                            <th width="250" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Monetary Value of Fringe Benefit <br> (C)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="5"><font size="1" style="font-weight:bold">&nbsp;1&nbsp;&nbsp;</font></td>
                                            <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 10px;">In General, for Citizen, Resident Alien and Non-Resident Alien Engaged in Trade or Business Within the Philippines </font></td>
                                            <td align="center"><input name="frm1603Q:Sched1:txtATC1" type="text" disabled class="iceInpTxt-dis disabled-dis" id="frm1603Q:Sched1:txtATC1" value="WF360" size="5" maxlength="20" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1603Q:Sched1:txtValue1" name="frm1603Q:Sched1:txtValue1" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTaxBase360();" disabled tabindex="1" /></td>
                                        </tr>
                                        <tr>
                                            <td><font size="1" style="font-weight:bold">&nbsp;2&nbsp;&nbsp;</font></td>
                                            <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 10px;">Non-Resident Alien Not Engaged in Trade or Business Within the Philippines </font></td>
                                            <td align="center"><input name="frm1603Q:Sched1:txtATC2" type="text" disabled class="iceInpTxt-dis disabled-dis" id="frm1603Q:Sched1:txtATC2" value="WF330" size="5" maxlength="20" /></td>
                                            <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1603Q:Sched1:txtValue2" name="frm1603Q:Sched1:txtValue2" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTaxBase330();" disabled tabindex="3" /></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                <div><font size="1" style="font-weight:bold;font-size: 11px;">Schedule I </font><font size= "1" style="font-size: 11px;">(continuation) </font></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tblFormTd">
                                <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="150" align="center" colspan="2"><label size="1" face="Arial, Helvetica, sans-serif">Percentage Divisor <br> (D) </label></th>
                                            <th width="300" align="center"><label size="1" face="Arial, Helvetica, sans-serif">Tax Base Grossed-up Monetary Value <br> (E) </label></th>
                                            <th width="100" align="center"><label size="1" face="Arial, Helvetica, sans-serif">Tax Rate <br> (F) </label></th>
                                            <th width="250" align="center"><label size="1" face="Arial, Helvetica, sans-serif">Taxes Withheld <br> (G) = (E x F) </label></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="5"><font size="1" style="font-weight:bold">&nbsp;1</font></td>
                                            <td align="center"><input name="frm1603Q:Sched1:txtDivisor1" type="text" disabled class="iceInpTxt-dis disabled-dis" id="frm1603Q:Sched1:txtDivisor1" style="text-align: right;" value="65%" size="5" maxlength="20" /></td>
                                            <td align="center"><input name="frm1603Q:Sched1:txtTaxBase1" type="text" value="0.00"  disabled class="iceInpTxt-dis disabled-dis" style="text-align: right;" size="20" maxlength="25" id="frm1603Q:Sched1:txtTaxBase1" /></td>
                                            <td align="center"><input name="frm1603Q:Sched1:txtTaxRate1" type="text" disabled class="iceInpTxt-dis disabled-dis" id="frm1603Q:Sched1:txtTaxRate1" style="text-align: right;" value="35%" size="5" maxlength="20" /></td>
                                            <td align="center"><input name="frm1603Q:Sched1:txtTaxWithheld1" type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" maxlength="25" id="frm1603Q:Sched1:txtTaxWithheld1" disabled /></td>
                                        </tr>
                                        <tr>
                                            <td><font size="1" style="font-weight:bold">&nbsp;2</font></td>
                                            <td align="center"><input name="frm1603Q:Sched1:txtDivisor2" type="text" disabled class="iceInpTxt-dis disabled-dis" id="frm1603Q:Sched1:txtDivisor2" style="text-align: right;" value="75%" size="5" maxlength="20" /></td>
                                            <td align="center"><input name="frm1603Q:Sched1:txtTaxBase2" type="text" value="0.00"  disabled class="iceInpTxt-dis disabled-dis" style="text-align: right;" size="20" maxlength="25" id="frm1603Q:Sched1:txtTaxBase2" /></td>
                                            <td align="center"><input name="frm1603Q:Sched1:txtTaxRate2" type="text" disabled class="iceInpTxt-dis disabled-dis" id="frm1603Q:Sched1:txtTaxRate2" style="text-align: right;" value="25%" size="5" maxlength="20" /></td>
                                            <td align="center"><input name="frm1603Q:Sched1:txtTaxWithheld2" type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" maxlength="25" id="frm1603Q:Sched1:txtTaxWithheld2" disabled /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"><font size="1" style="font-weight:bold" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">&nbsp;3 Total Taxes Withheld </font><font size="1" face="Arial, Helvetica, sans-serif">(Sum of Items 1 and 2) <a href="javascript:void(0)" id="btnNavigatePage1_1" class="xsmallItalic"  onclick="processPrev()">(To Part II, Item 14) </a> </font></td>
                                            <td align="center"><input type="text" name="frm1603Q:Sched1:txtTotalTax" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" maxlength="25" id="frm1603Q:Sched1:txtTotalTax" disabled /></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <!--To do Guidelines-->
                        <tr>
                            <td>
                                <div class="smallSubtitle" align="center">Guidelines and Instructions for BIR Form No. 1603Q [January 2018(ENCS)]</div>
                                <div class="smallSubtitle" align="center">Quarterly Remittance Return of Final Income Taxes Withheld</div>
                                <div class="smallSubtitle" align="center">on Fringe Benefits Paid to Employees Other Than Rank and File</div>
                               
                                <table id="inserted" width="800">
                                    <tr>
                                        <td class="firstcol">
                                            <dt>Who Shall File </dt>
                                            <p style="font-weight:normal;margin-bottom: 5px;line-height: 10px;; font-size: 11px; line-height: 10px;">This quarterly withholding tax remittance return shall be filed in triplicate 
                                                by every withholding agent (WA)/payor required to deduct and withhold taxes on fringe benefits furnished 
                                                or granted to employees other than rank and file employees subject to Final Withholding Taxes. </p>
                                            <p style="font-weight:normal;margin-bottom: 5px; font-size: 11px; line-height: 10px;">If the person required to withhold and pay/remit the tax is a corporation, the 
                                                return shall be made in the name of the corporation and shall be signed and verified by the president, 
                                                vice-president, or any authorized officer.</p>
                                            <p style="font-weight:normal; margin-bottom: 5px;font-size: 11px; line-height: 10px;">If the Government of the Philippines or any of its agencies, political 
                                                subdivisions or instrumentalities, or a government-owned or controlled corporation, is the withholding 
                                                agent/payor, the return shall be accomplished and signed by the officer or employee having control of 
                                                disbursement of income payments or other officer or employee appropriately designated for the purpose.</p>
                                            <p style="font-weight:normal;margin-bottom: 5px; font-size: 11px; line-height: 10px;">With respect to a fiduciary, the return shall be made in the name of the 
                                                individual, estate or trust for which such fiduciary acts and shall be signed and verified by such fiduciary. 
                                                In case of two or more joint fiduciaries, the return shall be signed and verified by one of such 
                                                fiduciaries. </p>
                                            <p style="font-weight:normal;margin-bottom: 5px; font-size: 11px; line-height: 10px;">Authorized Representative and Accredited Tax Agent filing, in behalf of the 
                                                taxpayer, shall also use this return to pay/remit the final taxes withheld. </p>
                                            
                                            <dt>When and Where to File and Pay/Remit</dt>
                                            <p style="font-weight:normal; margin-bottom: 5px;font-size: 11px; line-height: 10px;">The quarterly withholding tax remittance return shall be filed and the tax 
                                                paid/remitted not later than the last day of the month following the close of the quarter during which 
                                                withholding was made. </p>
                                            <p style="font-weight:normal; margin-bottom: 5px;font-size: 11px; line-height: 10px;">Provided, however, that with respect to non-large and large taxpayers who shall 
                                                file through the Electronic Filing and Payment System (eFPS), the deadline for electronically filing the 
                                                return and paying/remitting the taxes due thereon shall be in accordance with the provisions of existing 
                                                applicable revenue issuances. </p>
                                            <p style="font-weight:normal; margin-bottom: 5px;font-size: 11px; line-height: 10px;">The return shall be filed and the tax paid/remitted with the Authorized Agent 
                                                Bank (AAB) of the Revenue District Office (RDO) having jurisdiction over the withholding agent's place of 
                                                business/office.  In places where there are no Authorized Agent Banks, the return shall be filed and the 
                                                tax paid/remitted with the Revenue Collection Officer (RCO) of the RDO having jurisdiction over the WAâ€™s 
                                                place of business/office, who will issue an Electronic Revenue Official Receipt (eROR) therefor. </p>
                                            <p style="font-weight:normal; margin-bottom: 5px;font-size: 11px; line-height: 10px;">When the return is filed with an AAB, taxpayer must accomplish and submit 
                                                BIR-prescribed deposit slip, which the bank teller shall machine validate as evidence that payment/remittance 
                                                was received by the AAB. The AAB receiving the tax return shall stamp mark the word â€œReceivedâ€ on the return 
                                                and also machine validate the return as proof of filing and payment/remittance of the tax by the taxpayer. 
                                                The machine validation shall reflect the date of payment/remittance, amount paid/remitted and transactions 
                                                code, the name of the bank, branch code, tellerâ€™s code and tellerâ€™s initial. Bank debit memo number and date 
                                                should be indicated in the return for taxpayers paying/remitting under the bank debit system. </p>
                                            <p style="font-weight:normal;margin-bottom: 5px; font-size: 11px; line-height: 10px;">Payment/Remittance may also be made thru the epayment channels of AABs thru either 
                                                their online facility, credit/debit/prepaid cards, and mobile payments. </p>
                                            <p style="font-weight:normal;margin-bottom: 5px; font-size: 11px; line-height: 10px;">A taxpayer may file a separate return for the head office and for each branch or 
                                                place of business/office or a consolidated return for the head office and all the branches/offices. In the 
                                                case of large taxpayers only one consolidated return is required. </p>
                                            
                                            <dt>Fringe Benefit Defined </dt>
                                            <p style="font-weight:normal; margin-bottom: 5px;font-size: 11px; line-height: 10px;">Fringe Benefit means any good, service or other benefit furnished or granted by an 
                                                employer in cash or in kind, in addition to basic salaries to employees (except rank and file employees) such 
                                                as, but not limited to the following:</p>

                                            <table>
                                                <tr>
                                                    <td>
                                                        <ol class="indent">
                                                            <li style="font-weight:normal; font-size: 11px;line-height: 10px;">Housing;</li>
                                                            <li style="font-weight:normal; font-size: 11px;line-height: 10px;">Expense Account;</li>
                                                            <li style="font-weight:normal; font-size: 11px;line-height: 10px;">Vehicle of any kind;</li>
                                                            <li style="font-weight:normal; font-size: 11px;line-height: 10px;">Household personnel, such as maid, driver and others;</li>
                                                            <li style="font-weight:normal; font-size: 11px;line-height: 10px;">Interest on loan at less than market rate to the extent of the 
                                                                difference between the market rate and actual rate granted;</li>
                                                            <li style="font-weight:normal; font-size: 11px;line-height: 10px;">Expenses for foreign travel;</li>
                                                            <li style="font-weight:normal; font-size: 11px;line-height: 10px;">Holiday and vacation expenses;</li>
                                                        </ol>
                                                    </td>
                                                    <td>
                                                        <ol class="indent" start="8">
                                                            <li style="font-weight:normal; font-size: 11px;line-height: 10px;">Membership fees, dues and others expense 
                                                                borne by the employer for the employees in 
                                                                social and athletic clubs or other similar 
                                                                organizations;</li>
                                                            <li style="font-weight:normal; font-size: 11px;line-height: 10px;">Educational assistance to the employee or his
                                                                dependents; and </li>
                                                            <li style="font-weight:normal; font-size: 11px;line-height: 10px;">Life or health insurance and other non-life insurance 
                                                                premiums or similar amounts in excess of what the law allows.</li>
                                                        </ol>
                                                    </td>
                                                </tr>
                                            </table>
                                            <dt>ATC and Tax Rate</dt>
                                            <p style="font-weight:normal; font-size: 11px;">The fringe benefit tax shall be imposed at the following rates: </p>

                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th style="font-size: 11px;">ATC</th>
                                                        <th style="font-size: 11px;">Recipient</th>
                                                        <th style="font-size: 11px;">Tax Rate</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="font-weight:normal; font-size: 11px">WF360</td>
                                                        <td style="font-weight:normal; font-size: 11px">In General, for Citizen, Resident Alien and Non-Resident Alien Engaged 
                                                            in Trade or Business Within the Philippines</td>
                                                        <td style="font-weight:normal; font-size: 11px">35%</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight:normal; font-size: 11px">WF330</td>
                                                        <td style="font-weight:normal; font-size: 11px">Non-Resident Alien Not Engaged in Trade or Business Within the Phils.</td>
                                                        <td style="font-weight:normal; font-size: 11px">25%</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <dt>Computation of Tax</dt>
                                            <p style="font-weight:normal;margin-bottom: 5px; font-size: 11px; line-height: 10px;">The final withholding tax on fringe benefit shall be computed based on the taxable 
                                                grossed-up monetary value multiplied by the applicable tax rate. The grossed-up monetary value of the fringe 
                                                benefit shall be determined by dividing the monetary value of the fringe benefit as provided in Revenue 
                                                Regulations No. 3-98, as amended, by the percentage divisor in accordance with the following schedule: </p>
                                          
                                        </td>
                                        <td class="secondcol">
                                        <dt>Penalties</dt>
                                        <table>
                                                <thead>
                                                    <tr>
                                                        <th style="font-size: 11px;">Recipient</th>
                                                        <th style="font-size: 11px;">Tax Rate</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="font-weight:normal; margin-bottom: 5px;font-size: 11px;line-height: 10px">In General, for Citizen, Resident Alien and Non-Resident Alien Engaged in 
                                                            Trade or Business Within the Philippines</td>
                                                        <td style="font-weight:normal; font-size: 11px">65%</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight:normal; margin-bottom: 5px;font-size: 11px; line-height: 10px;">Non-Resident Alien Not Engaged in Trade or Business Within the Philippines</td>
                                                        <td style="font-weight:normal; font-size: 11px">75%</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <p style="font-weight:normal; margin-bottom: 5px;font-size: 11px; line-height: 10px;">There shall be imposed and collected as part of the tax: </p>
                                        <ol>
                                            <li style="font-weight:normal; margin-bottom: 5px;font-size: 11px; line-height: 10px;">A surcharge of twenty-five percent (25%) for the following violations:</li>
                                            <ol class="indent" type="a">
                                                <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Failure to file any return and pay/remit the amount of tax or installment due on 
                                                    or before the due date; </li>
                                                <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Filing a return with a person or office other than those with whom it is required to 
                                                    be filed, unless otherwise authorized by the Commissioner; </li>
                                                    <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Failure to pay/remit the full or part of the amount of tax shown on the return, 
                                                        or the full amount of tax due for which no return is required to be filed on or before the due date; </li>
                                                    <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Failure to pay/remit the deficiency tax within the time prescribed for its 
                                                        payment/remittance in the notice of assessment.</li>
                                            </ol>
                                            <li style="font-weight:normal; font-size: 11px; line-height: 10px;">A surcharge of fifty percent (50%) of the tax or of the deficiency tax, in case any 
                                                payment/remittance has been made before the discovery of the falsity or fraud, for each of the following violations:</li>
                                        </ol>
                                        <ol class="indent" type="a">
                                            <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Willful neglect to file the return within the period prescribed by the Code or by rules 
                                                and regulations; or</li>
                                            <li style="font-weight:normal; font-size: 11px; line-height: 10px;">A false or fraudulent return is willfully made.</li>
                                        </ol>
                                        <ol start="3">
                                            <li style="font-weight:normal;margin-bottom: 5px; font-size: 11px; line-height: 10px;">Interest at the rate of double the legal interest rate for loans or forbearance of any 
                                                money in the absence of an express stipulation as set by the Bangko Sentral ng Pilipinas from the date prescribed for 
                                                payment/remittance until the amount is fully paid/remitted: Provided, That in no case shall the deficiency and the 
                                                delinquency interest prescribed under Section 249 Subsections (B) and (C) of the National Internal Revenue Code, as 
                                                amended, be imposed simultaneously.</li>
                                            <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Compromise penalty as provided under applicable rules and regulations. </li>
                                        </ol>
                                        <dt>Violation of Withholding Tax Provisions</dt>
    
                                        <p style="font-weight:normal;margin-bottom: 5px; font-size: 11px; line-height: 10px;">Any person required to withhold, account for, and pay/remit any tax imposed by the National Internal 
                                            Revenue Code (NIRC), as amended, or who willfully fails to withhold such tax, or account for and pay/remit such tax, or aids 
                                            or abets in any manner to evade any such tax or the payment/remittance thereof, shall, in addition to other penalties provided 
                                            for under the Law, be liable upon conviction to a penalty equal to the total amount of the tax not withheld, or not accounted 
                                            for and paid/remitted.</p>
                                        <p style="font-weight:normal;margin-bottom: 5px; font-size: 11px; line-height: 10px;">Any person required under the NIRC, as amended, or by rules and regulations promulgated thereunder 
                                            to pay/remit any tax, make a return, keep any record, or supply correct and accurate information, who willfully fails to 
                                            pay/remit such tax, make such return, keep such record, or supply such correct and accurate information, or withhold or 
                                            pay/remit taxes withheld, or refund excess taxes withheld on compensation, at the time or times required by law or rules and 
                                            regulations shall, in addition to the other penalties provided by law, upon conviction thereof, be punished by a fine of not 
                                            less than ten thousand pesos (P= 10,000.00) and suffer imprisonment of not less than one (1) year but not more than ten (10) 
                                            years. </p>
                                        <p style="font-weight:normal;margin-bottom: 5px; font-size: 11px; line-height: 10px;">Every officer or employee of the Government of the Republic of the Philippines or any of its agencies 
                                            and instrumentalities, its political subdivisions, as well as government-owned or controlled corporations, including the Bangko 
                                            Sentral ng Pilipinas, who, under the provisions of the NIRC, as amended, or regulations promulgated thereunder, is charged with 
                                            the duty to deduct and withhold any internal revenue tax and to pay/remit the same in accordance with the provisions of the NIRC, 
                                            as amended, and other laws and who is found guilty of any offense herein below specified shall, upon conviction of each act or 
                                            omission,  be fined  in  a  sum  not  less  than  five  thousand  pesos (P= 5,000) but not more than fifty thousand pesos 
                                            (P= 50,000) or imprisoned for a term of not less than six (6) months  and  one day  but  not  more  than  two (2) years, or 
                                            both: </p>
                                        <ol class="indent" type="a">
                                            <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Those who fail or cause the failure to deduct and withhold any internal revenue tax under any of 
                                                the withholding tax laws and implementing regulations;</li>
                                            <li style="font-weight:normal; font-size: 11px; line-height: 10px;">Those who fail or cause the failure to pay/remit taxes deducted and withheld within the time 
                                                prescribed by law, and implementing regulations; and</li>
                                            <li style="font-weight:normal; margin-bottom: 5px;font-size: 11px; line-height: 10px;">Those who fail or cause the failure to file a return or statement within the time prescribed, 
                                                or render or furnish a false or fraudulent return or statement required under the withholding tax laws and regulations. </li>
                                            
                                        </ol>
                                        <p style="font-weight:normal;margin-bottom: 5px; font-size: 11px; line-height: 10px;">If the withholding agent is the Government or any of its agencies, political subdivisions or 
                                            instrumentalities, or a government-owned or controlled corporation, the employee thereof responsible for the withholding and 
                                            payment/remittance of tax shall be personally liable for the additions to the tax prescribed by the NIRC, as amended. </p>
                                        
                                        <dt>Note: All background information must be properly filled out.</dt>
                                        <ul>
                                            <li style="font-weight:normal; font-size: 11px; line-height: 10px;">The last 5 digits of the 14-digit TIN refers to the branch code
    </li>
                                            <li style="font-weight:normal; font-size: 11px; line-height: 10px;">All returns filed by an accredited tax agent on behalf of a 
    taxpayer shall bear the following information:
    </li>
                                            <ol class="indent" type="A">
                                                <li style="font-weight:normal; font-size: 11px; line-height: 10px;">For Individual (CPAs, members of GPPs, and others)
    </li>
                                                    <dd style="font-size: 11px;line-height: 10px;">a.1 Taxpayer Identification Number (TIN); and </dd>
                                                    <dd style="font-size: 11px;line-height: 10px;">a.2 BIR Accreditation Number, Date of Issue, and Date of Expiry.</dd>
                                                <li style="font-weight:normal; font-size: 11px; line-height: 10px;">For members of the Philippine Bar (Lawyers)
    </li>
                                                    <dd style="font-size: 11px;line-height: 10px;">b.1 Taxpayer Identification Number (TIN); </dd>
                                                    <dd style="font-size: 11px;line-height: 10px;">b.2 Attorneyâ€™s Roll Number;</dd>
                                                    <dd style="font-size: 11px;line-height: 10px;">b.3 Mandatory Continuing Legal Education (MCLE) Compliance Number; and</dd>
                                                    <dd style="font-size: 11px;line-height: 10px;">b.4 BIR Accreditation Number, Date of Issue, and Date of Expiry.</dd>
                                            </ol>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        </td>
        </tr>
        <tr>
            <td>
                <table width="880" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                    <tr align="center">
                        <td class="tblFormTdPart">
                            <table width="800" border="0" cellspacing="0" cellpadding="0">
                                <tr align="center">
                                    <td width="100%" colspan="2">
                                        <div align="center">
                                            <br />
                                            <input class="printButtonClass" type="button" value="Prev" style="width: 100px;"
                                                name="frm1603Q:btnPrevPage" id="frm1603Q:btnPrevPage" onclick="processPrev();" />
                                            <input id="frm1603Q:txtCurrentPage" name="frm1603Q:txtCurrentPage" size="1" type="text" style="text-align:center;" onkeyup="goToPage();" />
                                            <span class=large>/&nbsp;</span><input type="text" id="frm1603Q:txtMaxPage" readonly="true" size="2"  value="2" style="text-align:center;" disabled />&nbsp;
                                            <input class="printButtonClass" type="button" value="Next" style="width: 100px;"
                                                name="frm1603Q:btnNextPage" id="frm1603Q:btnNextPage"  onclick="processNext();" />
                                            <br /><br />
                                        </div>
                                    </td>
                                </tr>
                                <tr valign="middle" align="center">
                                    <td>
                                        <div align="center">
                                             @if($action != 'view')
                                                <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm1603Q:cmdValidate" id="frm1603Q:cmdValidate" onclick="validateForm()" />
                                                <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm1603Q:cmdEdit" id="frm1603Q:cmdEdit" onclick="enabledControls()"/>
                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1603Q:btnFinalCopy" id="frm1603Q:btnFinalCopy" onclick="submitForm();" />
                                            @else
                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                            @endif                                                                       
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
                <div id="DummyTxt" style='display:none;'>  </div>
            </td>
        </tr>
        <tr>
                        <td>
                            <div class="footer" style="padding:6px; text-align: center; font-size: 11px; background-color: white; width: 100%;">
                                <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                            </div>
                        </td>
                    </tr>
    </table>
</div>
</div>
<div id="hiddenEmail" style="display:none;"  > 
    <input type="text" value="{{$company->line_business }}"  size="29" name="frm1603Q:txtLineBus" maxlength="60" id="frm1603Q:txtLineBus" onblur="" />
</div>
</form>
    
  <div id="hiddenEnroll" style="display:none;"  > <input id="txtFinalFlag" class="FinalFlag" name="txtFinalFlag" type="text" onblur="" onkeypress="" value="0" maxlength="60"   />
          <input id="txtEnroll" name="txtEnroll" type="text" onblur="" onkeypress="" value="N" maxlength="60"   />
    </div>
   
    <input type="hidden" id="sessionIdFromPopUp" name="sessionIdFromPopUp" value="">
</form> 
        <!--End of Tax Rate Modal-->
  <textarea id='responsetext' style="display:none;"></textarea> 
        <!-- XML retrieval -->
        <div style="display:none;">
            <xmp id='xmlFormat'>  
            </xmp> <!--format the doc -->
            <span id='xmlClose'>All Rights Reserved BIR 2012.</span>
        </div>
    <div id="responseBG" style="display:none;"><!--loaded files render here--></div>
        <div id="response" style="display:none;"><!--loaded files render here--></div>
    <div id="responseRdo" style="display:none;"><!--loaded files render here--></div>
@endsection

@section('scripts')
<script type="text/javascript">
    //Declare global variable
    var isSubmitFinal = false;
    var isSubmit = false;

    var str;
    var gIsReadOnly = false;
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

    var currentPage;
    var MaxPage = 2;

    /*----------------------------------*/
    var d = document, XMLBGFile = '', data = '', XMLFile = '', msg = d.getElementById('msg');
    var loader = d.getElementById('loader');
    /*----------------------------------*/
    var globalEmail = "";
    str = setInterval("sleeptime()", 300);
    function sleeptime() {
        clearInterval(str);
        init();

        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
            loadXML(fileName);

            if (d.getElementById('frm1603Q:AmendedRtn_1').checked) {
                d.getElementById('frm1603Q:txtTax15').disabled = false;
            } else {
                d.getElementById('frm1603Q:txtTax15').disabled = true;
            }

            if (d.getElementById('frm1603Q:TaxWithheld_1').checked) {
                enableSched1();
            }

            if (d.getElementById('frm1603Q:SpecialTax_1').checked) {
                document.getElementById('frm1603Q:selTreaty').disabled = false;
            }

            existingXMLFileName = fileName;
            if (gIsReadOnly) {
                window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false; d.getElementById('frm1603Q:txtCurrentPage').disabled = false; d.getElementById('frm1603Q:btnPrevPage').disabled = false; d.getElementById('frm1603Q:btnNextPage').disabled = false;", 1000);
            }
        } else {
            window.setTimeout("$('#loader').hide('blind');", 100);
        }

        if ($('#printMenu').css('display') != 'none') {
            $('#printMenu').hide('blind');
        }
     document.getElementById('frm1603Q:txtTIN1').disabled = true; document.getElementById('frm1603Q:txtTIN2').disabled = true; document.getElementById('frm1603Q:txtTIN3').disabled = true; document.getElementById('frm1603Q:txtBranchCode').disabled = true;
   window.setTimeout("checkFinalCopyBtn('1603Qv2018')", 2000);
   }

    function rdoPropertyJS(rdoCode, description) {
        this.rdoCode = rdoCode;
        this.description = description;
    }

    var rdoList = new Array();

    function init() {
        var year = new Date();
        d.getElementById('frm1603Q:txtYear').value = "2018";    //2018 onwards  //year.getFullYear();

        @if($action != 'view')
        d.getElementById('frm1603Q:cmdEdit').disabled = true;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1603Q:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @else
        disabledControls();
        @endif
        d.getElementById('frm1603Q:AmendedRtn_1').disabled = false;
        d.getElementById('frm1603Q:AmendedRtn_2').disabled = false;

        currentPage = 1;
        d.getElementById('frm1603Q:txtCurrentPage').value = currentPage;

        d.getElementById('frm1603Q:selTreaty').disabled = true;

        if (d.getElementById("frm1603Q:AmendedRtn_2").checked == true) {
            d.getElementById("frm1603Q:txtTax15").disabled = true;
        } else {
            d.getElementById("frm1603Q:txtTax15").disabled = false;
        }
    }

    /*--------------------------------------------------------------*/
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
                d.getElementById('frm1603Q:cmdValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
                d.getElementById('btnUpload').disabled = true;
        }

    }

    function loadData() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");

        var elem = document.getElementById('frmMain').elements;
        var fieldVal = "";
        for (var i = 0; i < elem.length; i++) {
            try {
                if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
                    if (elem[i].type == 'text' || elem[i].type == 'select-one') {

                        if(elem[i].id != 'frm1603Q:txtAddress2'){
                            fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
                        }
                        else{
                            fieldVal = String( $("#response").html() ).split("frm1603Q:txtAddress=");
                        }

                        if (fieldVal != null && fieldVal.length > 1) {
                            if (elem[i].id == 'frm1603Q:txtTaxpayerName' || elem[i].id == 'frm1603Q:txtLineBus') {
                                elem[i].value = unescape(fieldVal[1]);
                            }
                            else if(elem[i].id == 'frm1603Q:txtAddress'){
                                if(fieldVal[1].length <= 100){
                                    elem[i].value = unescape(fieldVal[1]);
                                }
                                else {
                                    elem[i].value = unescape(fieldVal[1].substring(0, 100));
                                }
                            }
                            else if(elem[i].id == 'frm1603Q:txtAddress2'){
                                if(fieldVal[1].length <= 100){
                                    elem[i].value = '';
                                }
                                else {
                                    elem[i].value = unescape(fieldVal[1].substring(100, fieldVal[1].length));
                                }
                            }
              else if (elem[i].className.indexOf("FinalFlag") > -1) {
                                elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                            }
                            else {
                                elem[i].value = fieldVal[1]; //all select-one and text values       
                            }
                        }

                    }
                    if (elem[i].type == 'radio') {
                        var rdoVal = String($("#response").html()).split(elem[i].id + '=');
                        if (rdoVal[1] == 'true') {
                            elem[i].checked = rdoVal[1];
                            //elem[i].onclick();
                        }
                    }
                    if (elem[i].type == 'checkbox') {
                        var chkboxVal = String($("#response").html()).split(elem[i].id + '=');
                        if (chkboxVal[1] == 'true') {
                            elem[i].checked = chkboxVal[1];
                        }
                    }
                }
            } catch (e) {
            }
        }
    }

    function isItAnAmendedReturn(xmlFile) {
        if (d.getElementById('frm1603Q:AmendedRtn_1').checked) {
            return true;
        } else {
            return false;
        }
    }

    function isItAFinalCopy(xmlFile) {
        var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
        fn = fsoXML.OpenTextFile(xmlFile, 1);
        var fnContent = fn.ReadAll();
        fn.Close();

        if (fnContent.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            return true;
        } else {
            return false;
        }
    }

    function blockletter(e) {
        var number = parseFloat(e.value).toFixed(2);
        if (isNaN(number)) {
            var zero = 0;
            e.value = parseFloat(zero).toFixed(2);
        } else {
            e.value = '' + number;
        }
    }

    function blockletterWithout2Decimal(e) {
        var number = parseFloat(e.value);
        if (isNaN(number)) {
            //var zero = 0;
            //e.value = parseFloat(zero).toFixed(2);
            e.value = "";
        } else {
            e.value = '' + number.toFixed(0);
        }
    }

    function validateYear() {

        var currentYear = new Date().getYear();
        if (d.getElementById("frm1603Q:txtYear").value < 2018) {
            alert("Please file using the old version of the form.");
            d.getElementById("frm1603Q:txtYear").value = "2018";
        }
        if (d.getElementById("frm1603Q:txtYear").value > currentYear) {
            alert("Invalid year. Year should not be later than the current year.");
            d.getElementById("frm1603Q:txtYear").value = currentYear;
        }
    }

    function validateForm() {
        var dt = new Date();

        if ((d.getElementById('frm1603Q:txtYear').value == "")) {
            alert("Please enter a valid year on Item 1.");
            return;
        }
        if(d.getElementById('frm1603Q:txtYear').value*1 > dt.getFullYear()*1)
        {
            alert("Invalid date entry on Item no.1. Entry should not be later than Current Date.")
            return;
        }
        if (d.getElementById('frm1603Q:txtYear').value * 1 < 2018) {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 2018.")
            return;
        }
        if (d.getElementById('frm1603Q:optQuarter1').checked == false && d.getElementById('frm1603Q:optQuarter2').checked == false
            && d.getElementById('frm1603Q:optQuarter3').checked == false && d.getElementById('frm1603Q:optQuarter4').checked == false) {
            alert("Please select quarter on Item 2.");
            return;
        }
        if (d.getElementById('frm1603Q:TaxWithheld_1').checked == false && d.getElementById('frm1603Q:TaxWithheld_2').checked == false) {
            alert("Please select an option for Item 4.")
            return;
        }

        if ((d.getElementById('frm1603Q:txtTIN1').value == "" || d.getElementById('frm1603Q:txtTIN2').value == "" || d.getElementById('frm1603Q:txtTIN3').value == "" || d.getElementById('frm1603Q:txtBranchCode').value == "")) {
            alert("Please enter a valid TIN number on Item 6.");
            return;
        }
       
        if ((d.getElementById('frm1603Q:txtTaxpayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 8.");
            return;
        }
        if ((d.getElementById('frm1603Q:txtTelNum').value == "")) {
            alert("Please enter a valid Telephone Number  on Item 10.");
            return;
        }
        if ((d.getElementById('frm1603Q:txtAddress').value == "")) {
            alert("Please enter Taxpayer's Registered Address on Item 9.");
            return;
        }
        if ((d.getElementById('frm1603Q:txtZipCode').value == "")) {
            alert("Please enter Taxpayer's Zip Code on Item 9A.");
            return;
        }

        if (d.getElementById('frm1603Q:CatAgent_P').checked == false && d.getElementById('frm1603Q:CatAgent_G').checked == false) {
            alert("Please select an option for Item 11.");
            return;
        }
        if (d.getElementById('frm1603Q:TaxWithheld_1').checked == true) {
            if (d.getElementById('frm1603Q:txtTax14').value == 0) {
                alert("Please fill up Schedule 1.");
                return;
            }
        }

        d.getElementById('frm1603Q:cmdValidate').disabled = true;
        d.getElementById('frm1603Q:cmdEdit').disabled = false;
        d.getElementById('btnUpload').disabled = false;

        disabledControls();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
        return;
    }

    var disableElem = true;
    var enableElem = false;
    function disabledControls() {
        d.getElementById('frm1603Q:txtTIN1').disabled = true;
        d.getElementById('frm1603Q:txtTIN2').disabled = true;
        d.getElementById('frm1603Q:txtTIN3').disabled = true;
        d.getElementById('frm1603Q:txtBranchCode').disabled = true;
        d.getElementById('frm1603Q:rdoCode').disabled = true;
        d.getElementById('frm1603Q:txtTaxpayerName').disabled = true;
        d.getElementById('frm1603Q:txtTelNum').disabled = true;
        d.getElementById('frm1603Q:txtAddress').disabled = true;
        d.getElementById('frm1603Q:txtAddress2').disabled = true;
        d.getElementById('frm1603Q:txtZipCode').disabled = true;

        d.getElementById('frm1603Q:AmendedRtn_1').disabled = true;
        d.getElementById('frm1603Q:AmendedRtn_2').disabled = true;
        d.getElementById('frm1603Q:txtYear').disabled = true;
        d.getElementById('frm1603Q:TaxWithheld_1').disabled = true;
        d.getElementById('frm1603Q:TaxWithheld_2').disabled = true;
        d.getElementById('frm1603Q:CatAgent_P').disabled = true;
        d.getElementById('frm1603Q:CatAgent_G').disabled = true;
        d.getElementById('frm1603Q:SpecialTax_1').disabled = true;
        d.getElementById('frm1603Q:SpecialTax_2').disabled = true;
        d.getElementById('frm1603Q:txtSheets').disabled = true;

        d.getElementById('frm1603Q:Sched1:txtValue1').disabled = true;
        d.getElementById('frm1603Q:Sched1:txtValue2').disabled = true;
        d.getElementById('frm1603Q:Sched1:txtTaxBase1').disabled = true;
        d.getElementById('frm1603Q:Sched1:txtTaxBase2').disabled = true;

        d.getElementById('frm1603Q:txtTax15').disabled = true;
        d.getElementById('frm1603Q:txtTax16').disabled = true;
        d.getElementById('frm1603Q:txt16Other').disabled = true;

        d.getElementById('frm1603Q:optQuarter1').disabled = true;
        d.getElementById('frm1603Q:optQuarter2').disabled = true;
        d.getElementById('frm1603Q:optQuarter3').disabled = true;
        d.getElementById('frm1603Q:optQuarter4').disabled = true;

        d.getElementById('frm1603Q:txtTax19').disabled = true;
        d.getElementById('frm1603Q:txtTax20').disabled = true;
        d.getElementById('frm1603Q:txtTax21').disabled = true;
        
        d.getElementById('frm1603Q:txtCurrentPage').disabled = true;
        
        @if($action != 'view')
        d.getElementById('frm1603Q:cmdEdit').disabled = false;
        d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm1603Q:btnFinalCopy').disabled = false;
        @endif

        disableElem;
        enableElem;
    }

    function enabledControls() {
        d.getElementById('frm1603Q:txtTax19').disabled = false;
        d.getElementById('frm1603Q:txtTax20').disabled = false;
        d.getElementById('frm1603Q:txtTax21').disabled = false;

        d.getElementById('frm1603Q:AmendedRtn_1').disabled = false;
        d.getElementById('frm1603Q:AmendedRtn_2').disabled = false;
        d.getElementById('frm1603Q:txtYear').disabled = false;
        d.getElementById('frm1603Q:TaxWithheld_1').disabled = false;
        d.getElementById('frm1603Q:TaxWithheld_2').disabled = false;
        d.getElementById('frm1603Q:CatAgent_P').disabled = false;
        d.getElementById('frm1603Q:CatAgent_G').disabled = false;
        d.getElementById('frm1603Q:SpecialTax_1').disabled = false;
        d.getElementById('frm1603Q:SpecialTax_2').disabled = false;
        d.getElementById('frm1603Q:txtSheets').disabled = false;

        d.getElementById('frm1603Q:Sched1:txtValue1').disabled = false;
        d.getElementById('frm1603Q:Sched1:txtValue2').disabled = false;
        d.getElementById('frm1603Q:Sched1:txtTaxBase1').disabled = false;
        d.getElementById('frm1603Q:Sched1:txtTaxBase2').disabled = false;

        d.getElementById('frm1603Q:txtTax16').disabled = false;
        d.getElementById('frm1603Q:txt16Other').disabled = false;
        
        d.getElementById('frm1603Q:txtCurrentPage').disabled = false;
        // removed 04/24/2018 based on the new Bir-Form1603Q - mark p.
        // d.getElementById('frm1603:taxRates').disabled = false;
        d.getElementById('frm1603Q:cmdValidate').disabled = false;
        d.getElementById('frm1603Q:cmdEdit').disabled = true;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1603Q:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;

        d.getElementById('frm1603Q:optQuarter1').disabled = false;
        d.getElementById('frm1603Q:optQuarter2').disabled = false;
        d.getElementById('frm1603Q:optQuarter3').disabled = false;
        d.getElementById('frm1603Q:optQuarter4').disabled = false;

        if (d.getElementById('frm1603Q:AmendedRtn_1').checked) {
            d.getElementById('frm1603Q:txtTax15').disabled = false;
        } else {
            d.getElementById('frm1603Q:txtTax15').disabled = true;
        }

        if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
            d.getElementById('frm1603Q:txtYear').disabled = true;
            d.getElementById('frm1603Q:optQuarter1').disabled = true;
            d.getElementById('frm1603Q:optQuarter2').disabled = true;
            d.getElementById('frm1603Q:optQuarter3').disabled = true;
            d.getElementById('frm1603Q:optQuarter4').disabled = true;
        }

        disableElem;
        enableElem;
     document.getElementById('frm1603Q:txtTIN1').disabled = true; document.getElementById('frm1603Q:txtTIN2').disabled = true; document.getElementById('frm1603Q:txtTIN3').disabled = true; document.getElementById('frm1603Q:txtBranchCode').disabled = true;
    }

    function enableSelTreaty()
    {
            document.getElementById('frm1603Q:selTreaty').disabled = false;
            document.getElementById('frm1603Q:selTreaty').selectedIndex = 0;
    }
  
  function disableSelTreaty()
    {
        document.getElementById('frm1603Q:selTreaty').disabled = true;
        document.getElementById('frm1603Q:selTreaty').selectedIndex = 0;
    }

    function enableSched1()
    {
        document.getElementById('frm1603Q:Sched1:txtValue1').disabled = false;
        document.getElementById('frm1603Q:Sched1:txtValue2').disabled = false;
    }

    function disableSched1()
    {
        document.getElementById('frm1603Q:Sched1:txtValue1').disabled = true;
        document.getElementById('frm1603Q:Sched1:txtValue2').disabled = true;
    }

    //*****PAGING*****//
    function goToPage() {
        var newVal = document.getElementById("frm1603Q:txtCurrentPage").value;
        //var printType = !isFromPrint ? "Page" : "Print";
        var printType = "Page";

        if ((newVal <= MaxPage) && (newVal > 0) && (newVal !== currentPage.toString())) {
            $('#' + printType + currentPage + 'Content').hide('blind');
            $('#' + printType + newVal + 'Content').show('blind');
            currentPage = (document.getElementById("frm1603Q:txtCurrentPage").value) * 1;
        }
        else if ((newVal > MaxPage) || (newVal <= 0)) {
            alert("Invalid page");

            document.getElementById("frm1603Q:txtCurrentPage").value = currentPage;
        }

        if (isFromPrint) {
            //printOCR();
        }
    }

    function processPrev() {
        if (currentPage == 1)
            currentPage = 1;
        else {
            currentPage--;
            $('#Page' + currentPage + 'Content').show('blind');
            $('#Page' + (currentPage + 1) + 'Content').hide('blind');
            document.getElementById('frm1603Q:txtCurrentPage').value = currentPage;

        }
    }
    function processNext() {
        if (currentPage == MaxPage) {
       
        }
        else {
        currentPage++;
        $('#Page' + currentPage + 'Content').show('blind');
        $('#Page' + (currentPage - 1) + 'Content').hide('blind');
        document.getElementById('frm1603Q:txtCurrentPage').value = currentPage;
        }
    }
    
    var previousTW;
    function changeTaxWitheld(param) {
        if (confirm('Changing Item #4 will clear all computed data.\nDo you want to continue?')) {
            clearComputedData();

            if (param == 2) {
                disableSched1();
            } else if (param == 1) {
                enableSched1();
            }

            previousTW = "frm1603Q:TaxWithheld_" + param;
        } else {
            if (previousTW != null) {
                d.getElementById(previousTW).checked = true;
            }
        }
    }

    //*****COMPUTATION*****//

    function computeTax17() {
        d.getElementById("frm1603Q:txtTax17").value = formatCurrency(NumWithComma(d.getElementById("frm1603Q:txtTax15").value) * 1 + NumWithComma(d.getElementById("frm1603Q:txtTax16").value) * 1);
        computeTaxStillDue();
    }

    function computeTaxBase360() {
        d.getElementById("frm1603Q:Sched1:txtTaxBase1").value = formatCurrency(NumWithComma(d.getElementById("frm1603Q:Sched1:txtValue1").value) / (65/100));

        compute360();
    }

    function computeTaxBase330() {
        d.getElementById("frm1603Q:Sched1:txtTaxBase2").value = formatCurrency(NumWithComma(d.getElementById("frm1603Q:Sched1:txtValue2").value) / (75/100));

        compute330();
    }

    function compute360() {
        d.getElementById("frm1603Q:Sched1:txtTaxWithheld1").value = formatCurrency(NumWithComma(d.getElementById("frm1603Q:Sched1:txtTaxBase1").value) * 35 / 100);
        computeTotalSchedule();
    }

    function compute330() {
        d.getElementById("frm1603Q:Sched1:txtTaxWithheld2").value = formatCurrency(NumWithComma(d.getElementById("frm1603Q:Sched1:txtTaxBase2").value) * 25 / 100);
        computeTotalSchedule();
    }

    function computeTotalSchedule() {
        d.getElementById("frm1603Q:Sched1:txtTotalTax").value = formatCurrency(NumWithComma(d.getElementById("frm1603Q:Sched1:txtTaxWithheld1").value) * 1 + NumWithComma(d.getElementById("frm1603Q:Sched1:txtTaxWithheld2").value) * 1);
        d.getElementById("frm1603Q:txtTax14").value = d.getElementById("frm1603Q:Sched1:txtTotalTax").value;

        computeTaxStillDue();
    }

    function computeTaxStillDue() {
        d.getElementById('frm1603Q:txtTax18').value = formatCurrency(NumWithComma(d.getElementById('frm1603Q:txtTax14').value) - NumWithComma(d.getElementById('frm1603Q:txtTax17').value));
        computeTotalTaxStillDue();
    }

    function computePenalties() {
        d.getElementById("frm1603Q:txtTax22").value = formatCurrency(NumWithComma(d.getElementById("frm1603Q:txtTax19").value) * 1 + NumWithComma(d.getElementById("frm1603Q:txtTax20").value) * 1 + NumWithComma(d.getElementById("frm1603Q:txtTax21").value) * 1);
        computeTotalTaxStillDue();
    }

    function computeTotalTaxStillDue() {
        d.getElementById('frm1603Q:txtTax23').value = formatCurrency(NumWithComma(d.getElementById('frm1603Q:txtTax18').value) * 1 + NumWithComma(d.getElementById('frm1603Q:txtTax22').value) * 1);
        capital();
    }

    //*****END*****//

    function initialValidateBeforeSave() {
        if (d.getElementById('frm1603Q:optQuarter1').checked == false && d.getElementById('frm1603Q:optQuarter2').checked == false
            && d.getElementById('frm1603Q:optQuarter3').checked == false && d.getElementById('frm1603Q:optQuarter4').checked == false) {
            alert("Please select quarter on Item 2.");
            return false;
        }
        if ((d.getElementById('frm1603Q:txtTIN1').value == "" || d.getElementById('frm1603Q:txtTIN2').value == "" || d.getElementById('frm1603Q:txtTIN3').value == "" || d.getElementById('frm1603Q:txtBranchCode').value == "")) {
            alert("Please enter a valid TIN number on Item 6.");
            return false;
        }
        
        if ((d.getElementById('frm1603Q:txtTaxpayerName').value == "")) {
            alert("Please enter a valid Withholding Agent's Name on Item 8.");
            return false;
        }
        return true;
    }

    function clearYearData(yearValue) {
        if (yearValue != "") {
            if (confirm('Changing the return period will clear all computed data.\nDo you want to continue?')) {
                clearComputedData();
            } else {
                d.getElementById('frm1603Q:txtYear').value = yearValue;
            }
        }
    }

    function clearComputedData() {

        d.getElementById('frm1603Q:Sched1:txtValue1').value = formatCurrency(0.00);
        d.getElementById('frm1603Q:Sched1:txtTaxBase1').value = formatCurrency(0.00);
        d.getElementById('frm1603Q:Sched1:txtTaxWithheld1').value = formatCurrency(0.00);

        d.getElementById('frm1603Q:Sched1:txtValue2').value = formatCurrency(0.00);
        d.getElementById('frm1603Q:Sched1:txtTaxBase2').value = formatCurrency(0.00);
        d.getElementById('frm1603Q:Sched1:txtTaxWithheld2').value = formatCurrency(0.00);
        
        d.getElementById("frm1603Q:Sched1:txtTotalTax").value = formatCurrency(0.00);

        d.getElementById('frm1603Q:txtTax14').value = formatCurrency(0.00);
        d.getElementById('frm1603Q:txtTax15').value = formatCurrency(0.00);
        d.getElementById('frm1603Q:txtTax16').value = formatCurrency(0.00);
        d.getElementById('frm1603Q:txtTax17').value = formatCurrency(0.00);
        d.getElementById('frm1603Q:txtTax18').value = formatCurrency(0.00);
        d.getElementById('frm1603Q:txtTax19').value = formatCurrency(0.00);
        d.getElementById('frm1603Q:txtTax20').value = formatCurrency(0.00);
        d.getElementById('frm1603Q:txtTax21').value = formatCurrency(0.00);
        d.getElementById('frm1603Q:txtTax22').value = formatCurrency(0.00);
        d.getElementById('frm1603Q:txtTax23').value = formatCurrency(0.00);
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
    var isFromPrint = false;
    function printme() {

        $('#bg').hide(); //740  
        $('.printSignFooterClass').css({ 'width': '94%', 'margin': 'auto', 'margin-top': '15px', 'display': 'block', 'position': 'relative', 'overflow': 'visible', 'page-break-before': 'always', 'background': '#ffffff' });
        $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });

        $('#formPaper').css({ 'max-width': '8.3in !important', 'border': '#000 3px solid' });
        $('#wrapper').css({ 'max-width': '8.3in !important' });
        $('#container').css({ 'max-width': '8.3in !important' });

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
                }
                if (elem[i].type == 'radio' || elem[i].type == 'checkbox') {
                    if (document.getElementById(elem[i].id).disabled) {
                        disabledItems[x] = elem[i].id;
                        x++;
                    }
                    document.getElementById(elem[i].id).disabled = true;
                }
                if (elem[i].type == 'select-one') {
                    $(elem[i]).hide();
                    var label = "<div class='labels'>".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</div>");
                    $(elem[i]).after(label);
                }
            }
        }

        var activePage = document.getElementById('frm1603Q:txtCurrentPage').value;

        $('#Page1Content').show();
        $('#Page2Content').show();
        
        $("#formPaper").css({ 'border': '1px solid #fff' });

        $("#Page1Content").css({ 'border': '3px solid #000'});
        $("#Page2Content").css({ 'margin-top': '40px','border': '3px solid #000' });

        $('.printButtonClass').hide();
        $("#formPaper").show();
        
        window.print();

        $('.printButtonClass').show();
        $("#Page"+activePage+"Content").css({ 'border': 'none' });
        $("#Page1Content").css({'border': '1px solid #fff' });
        $("#Page2Content").css({'border': '1px solid #fff','margin-top': '0px'});

        if(activePage == "1"){
            $('#Page1Content').show();
            $('#Page2Content').hide();
        }else if(activePage == "2") {
            $('#Page1Content').hide();
            $('#Page2Content').show();
        }

        isFromPrint = true;
        document.getElementById('frm1603Q:txtCurrentPage').disabled = false;
        document.getElementById('frm1603Q:txtCurrentPage').readOnly = false;
    }
    function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                var data = form.serialize();
                console.log(form.serializeArray());
                save('1603Qv2018',data);
                
                disabled.attr('disabled','disabled');

                return false;
        }
    } 

    /*Save Before Exit Function*/
    function saveBeforeExit()
    {
        $('#saveModal').modal('hide');
        var form = $('#frmMain');
        var disabled = form.find(':input:disabled').removeAttr('disabled');
        
        var data = form.serialize();
        saveAndExit('1603Qv2018',data);
        disabled.attr('disabled','disabled');
        return false;
    }

    /*for Submit/ Final copy*/
    function submitForm()
    {
        $('#submitModal').modal('show');
    }

    function submitData()
    {
        var form = $('#frmMain');
        var disabled = form.find(':input:disabled').removeAttr('disabled');

        var data = form.serialize();
        var company_id = $('#frmMain').find('input[name="company"]').val();

        submitAndSave('1603Qv2018', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1603Qv2018';
    }
</script>
@endsection