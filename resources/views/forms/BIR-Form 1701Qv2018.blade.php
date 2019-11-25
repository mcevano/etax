@extends('layouts.app')
@section('title', '| BIR Form No. 1701Qv2018')
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
        <button type="button" class="btn btn-danger btn-exit" id="1701Qv2018" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1701Qv2018" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1701Qv2018' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 897px; ">
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
                                                <img src="{{ asset('images/header_logo.png') }}" width="210" height="50px" />
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
                                                <label face="Arial" size="1px">BIR Form No.</label>
                                                <br/><font size="5px" style="font-weight:bold;">1701Q</font>
                                                <br/><label face="Arial" size="1px">January 2018 (ENCS)</label>
                                                <br/><label face="Arial" size="1px" style="font-weight:bold;">Page 1</label>
                                            </td>
                                            <td width="0" valign="center" style="text-align: center;">
                                                <font size="5px" style="font-weight:bold;">Quarterly Income Tax Return</font>
                                                <br/><font size="4px" style="font-weight:bold;">for Individuals, Estates and Trusts</font>
                                                <br><label face="Arial" size="1px">Enter all required information in CAPITAL LETTERS using BLACK ink. Mark all applicable boxes with an "X". Two copies MUST be filed with the BIR and one held by the Tax Filer.</label>
                                            </td>
                                            <td width="200" valign="center">
                                                    <p><img class="barcodes" src="{{ asset('images/Bar Codes/1701Q_p1.png') }}" width="220" height="75px" /> </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="152" valign="top" class="tblFormTd">
                                                <table width="150" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="60"><font size="1" style="font-size: 11px;">For the Year</font></td>
                                                        <td width="60">
                                                            <input type="text" value="" size="4" name="frm1701q:txtYear" maxlength="4" id="frm1701q:txtYear" onblur="blockletterWithout2Decimal(this);computetxt46('taxpayer');validateYear();computetxt46('taxspouse');" onkeypress="return wholenumber(this, event)" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="260" valign="top" class="tblFormTd">
                                                <table width="249" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="40"><font size="1"  style="font-size: 11px;">Quarter</font></td>
                                                        <td width="180">
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1701q:j_id217">
                                                                <table cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="1" name="frm1701q:DateQuarter" id="frm1701q:DateQuarter_1"/>
                                                                                <label for="frm1701q:DateQuarter_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >First</label>&nbsp;
                                                                            </td>
                                                                            <td><input type="radio" value="2"  name="frm1701q:DateQuarter" id="frm1701q:DateQuarter_2"  />
                                                                                <label for="frm1701q:DateQuarter_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Second</label>&nbsp;
                                                                            </td>
                                                                            <td><input type="radio" value="3"  name="frm1701q:DateQuarter" id="frm1701q:DateQuarter_3" />
                                                                                <label for="frm1701q:DateQuarter_3" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Third</label>&nbsp;
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="181" valign="top" class="tblFormTd">
                                                <table width="176" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="60"><label size="1"  style="font-size: 11px;">Amended Return?</label></td>
                                                        <td width="100">
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1701q:j_id217">
                                                                <table cellspacing="0" cellpadding="0" border="0">
                                                                    <tr>
                                                                        <td><input type="radio" value="Y" name="frm1701q:AmendedRtn" id="frm1701q:AmendedRtn_1" onclick="processAmend();" disabled="disabled" />
                                                                            <label for="frm1701q:AmendedRtn_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Yes</label>&nbsp;
                                                                        </td>
                                                                        <td><input type="radio" value="N"  name="frm1701q:AmendedRtn" id="frm1701q:AmendedRtn_2" onclick="processAmend();" disabled="disabled" checked="checked" />
                                                                            <label for="frm1701q:AmendedRtn_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >No</label>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="168" valign="top" class="tblFormTd">
                                                <table width="152" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="80"><label size="1"  style="font-size: 11px;"> Number of Sheet/s Attached</label></td>
                                                        <td width="50" rowspan="2"><input type="text" value="0" style="text-align: right;" size="2" name="frm1701q:txtSheets" maxlength="2" id="frm1701q:txtSheets"  class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
                                                        
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
                                                            <div align="center"><font size="2" style="font-weight:bold;">PART I - BACKGROUND INFORMATION ON TAXPAYER/FILER</font></div>
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
                                            <td width="600" valign="top" class="tblFormTd">
                                                <table width="500" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;&nbsp;</font></td>
                                                        <td width="180">
                                                            <font size="1" style="font-size: 11px;">Taxpayer Identification Number (TIN)&nbsp;</font>
                                                        </td>
                                                        <td width="300">
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->tin1}}" size="3" name="frm1701q:txtTIN1" maxlength="3" id="frm1701q:txtTIN1" onkeypress="return wholenumber(this, event)" />-
                                                                <input type="text" value="{{$company->tin2}}" size="3" name="frm1701q:txtTIN2" maxlength="3" id="frm1701q:txtTIN2" onkeypress="return wholenumber(this, event)" />-
                                                                <input type="text" value="{{$company->tin3}}" size="3" name="frm1701q:txtTIN3" maxlength="3" id="frm1701q:txtTIN3" onkeypress="return wholenumber(this, event)" />-
                                                                <input type="text" value="{{$company->tin4}}" size="5" name="frm1701q:txtBranchCode" maxlength="3" id="frm1701q:txtBranchCode" onkeypress="return letternumber(event)"/>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="200" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font>
                                                        <td width="60"><font size="1"  style="font-size: 11px;">RDO Code</font></td></td>
                                                        <td width="70" nowrap id="rdoSelect">
                                                        	<select class='iceSelOneMnu' id='frm1701q:txtRDOCode' name='frm1701q:txtRDOCode' size='1' disabled >
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
                                            <td width="100%" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;7&nbsp;&nbsp;</font></td>
                                                        <td width="100"><font size="1"  style="font-size: 11px;">Taxpayer/Filer Type</font></td>
                                                        <td width="500">
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1701q:j_id217">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="Single" name="frm1701q:optTaxpayerType" id="frm1701q:optType_1" onclick="processTaxType('taxpayer')" />
                                                                                <label for="frm1701q:optType_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Single Proprietor</label>&nbsp;
                                                                            </td>
                                                                            <td><input type="radio" value="Professional"  name="frm1701q:optTaxpayerType" id="frm1701q:optType_2" onclick="processTaxType('taxpayer')" />
                                                                                <label for="frm1701q:optType_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Professional</label>&nbsp;
                                                                            </td>
                                                                            <td><input type="radio" value="Estate"  name="frm1701q:optTaxpayerType" id="frm1701q:optType_3" onclick="processTaxType('taxpayer')" />
                                                                                <label for="frm1701q:optType_3" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Estate</label>&nbsp;
                                                                            </td>
                                                                            <td><input type="radio" value="Trust"  name="frm1701q:optTaxpayerType" id="frm1701q:optType_4" onclick="processTaxType('taxpayer')" />
                                                                                <label for="frm1701q:optType_4" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Trust</label>&nbsp;
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
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
                                            <td width="100%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="139"><font size="1"  style="font-size: 11px;">Alphanumeric Tax Code (ATC)</font></td>
                                                        <td width="190"><input type="radio" value="II012"  name="frm1701q:optATC" id="frm1701q:optATC_1" onclick="processATC('taxpayer')" />
                                                            <label for="frm1701q:optATC_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >II012 Business Income-Graduated IT Rates</label>&nbsp;
                                                        </td>
                                                        <td width="230"><input type="radio" value="II014"  name="frm1701q:optATC" id="frm1701q:optATC_2" onclick="processATC('taxpayer')" />
                                                            <label for="frm1701q:optATC_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >II014 Income from Profession-Graduated IT Rates</label>&nbsp;
                                                        </td>
                                                        <td width="213"><input type="radio" value="II013"  name="frm1701q:optATC" id="frm1701q:optATC_3" onclick="processATC('taxpayer')" />
                                                            <label for="frm1701q:optATC_3" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >II013 Mixed Income-Graduated IT Rates</label>&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td><input type="radio" value="II015"  name="frm1701q:optATC" id="frm1701q:optATC_4" onclick="processATC('taxpayer')" />
                                                            <label for="frm1701q:optATC_4" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >II015 Business Income-8% IT Rate</label>&nbsp;
                                                        </td>
                                                        <td><input type="radio" value="II017"  name="frm1701q:optATC" id="frm1701q:optATC_5" onclick="processATC('taxpayer')" />
                                                            <label for="frm1701q:optATC_5" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >II017 Income from Profession-8% IT Rate</label>&nbsp;
                                                        </td>
                                                        <td><input type="radio" value="II016"  name="frm1701q:optATC" id="frm1701q:optATC_6" onclick="processATC('taxpayer')" />
                                                            <label for="frm1701q:optATC_6" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >II016 Mixed Income-8% IT Rate</label>&nbsp;
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
                                            <td width="100%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font></td>
                                                        <td><font size="1"  style="font-size: 11px;">Taxpayer/Filer's Name </font><font style="font-size:10px">(Last Name, First Name, Middle Name for Individual)/ESTATE of (First Name, Middle Name, Last Name)/TRUST FAO:(First Name, Middle Name, Last Name)</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td><input type="text" value="{{$company->registered_name}}" size="120" name="frm1701q:txtTaxpayerName" maxlength="50" id="frm1701q:txtTaxpayerName" onblur="return capital(this, event)" disabled /></td>
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
                                            <td width="100%" valign="top" class="tblFormTd" colspan="2">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1"  style="font-size: 11px;">Registered Address </font><font style="font-size:10px">(Indicate complete address. If branch, indicate the branch address. If the registered address is different from the current address, go to the RDO to update registered address by using BIR Form No. 1905)</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->address}}" size="120" maxlength="100" id="frm1701q:txtAddress" name="frm1701q:txtAddress" onblur = "return capital(this, event)" disabled /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="600" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                            <td width="25">&nbsp;</td>
                                                        <td>
                                                                <input type="text" value="" size="85" maxlength="50" id="frm1701q:txtAddress2" onblur = "return capital(this, event)" disabled />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="198" class="tblFormTd">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;10A&nbsp;</font></td>
                                                        <td width="60">
                                                            <font size="1"  style="font-size: 11px;">Zip Code</font>
                                                        </td>
                                                        <td>
                                                            <div align="center">
                                                                <input type="text" value="{{$company->zip_code}}" size="4" name="frm1701q:txtZipCode" maxlength="4" id="frm1701q:txtZipCode" onkeypress="return wholenumber(this, event)" disabled />
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
                                            <td width="200" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font></td>
                                                        <td width="142"><font size="1"  style="font-size: 11px;">Date of Birth (MM/DD/YYYY)</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td width="153" nowrap>
                                                            <div align="left">&nbsp;<font size="2" face="Arial, Helvetica, sans-serif">
                                                                    <input id="frm1701q:txtBirthMonth" maxlength="2" name="frm1701q:txtBirthMonth"  size="1"  type="text" onkeypress="return wholenumber(this, event)" />
                                                                    <input maxlength="2" id="frm1701q:txtBirthDay" name="frm1701q:txtBirthDay" size="1"  type="text" onkeypress="return wholenumber(this, event)" />
                                                                    <input id="frm1701q:txtBirthYear" maxlength="4" name="frm1701q:txtBirthYear"  size="2"  type="text" onkeypress="return wholenumber(this, event)" />
                                                            </font></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="600" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font></td>
                                                        <td width="142"><font size="1" style="font-size: 11px;">Email Address</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td>
                                                            <input type="text" value="{{$company->email_address}}" size="87" name="txtEmail" maxlength="60" id="txtEmail" disabled="true" />
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
                                            <td width="200" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font></td>
                                                        <td width="142"><font size="1" style="font-size: 11px;">Citizenship</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td width="153">
                                                            <input type="text" value="" id="frm1701q:txtCitizenship" name="frm1701q:txtCitizenship" maxlength="20" onkeypress="" onblur="return capital(this, event)" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="200" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;</font></td>
                                                        <td width="182"><font size="1" style="font-size: 11px;">Foreign Tax Number (if applicable)</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td width="153">
                                                            <input type="text" value="" id="frm1701q:txtForeignTaxNumber" name="frm1701q:txtForeignTaxNumber" maxlength="20" onkeypress="return letternumber(event)" onblur="" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="200" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;15&nbsp;</font></td>
                                                        <td width="152"><font size="1" style="font-size: 11px;">Claiming Foreign Tax Credits?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td width="153">
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1701q:j_id217">
                                                                <table cellspacing="0" cellpadding="0" border="0">
                                                                    <tr>
                                                                        <td><input type="radio" value="Y" name="frm1701q:optForeignTaxCredits" id="frm1701q:optForeignTaxCredits_1" onclick="" />
                                                                            <label for="frm1701q:optForeignTaxCredits_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Yes</label>&nbsp;
                                                                        </td>
                                                                        <td><input type="radio" value="N"  name="frm1701q:optForeignTaxCredits" id="frm1701q:optForeignTaxCredits_2" onclick="" />
                                                                            <label for="frm1701q:optForeignTaxCredits_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >No</label>
                                                                        </td>
                                                                    </tr>
                                                                </table>
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
                                            <td class="tblFormTd">
                                                <table>
                                                    <tr>
                                                        <td width="100" rowspan="2">
                                                                <font size="2" style="font-weight:bold;">&nbsp;16&nbsp;&nbsp;&nbsp;</font>
                                                                <font size="1" style="font-size: 11px;">Tax Rate* (choose one, for income from business/ profession)</font>
                                                        </td>
                                                        <td width="750">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="250">
                                                                        <input type="radio" value="Graduated" style="vertical-align: super;" name="frm1701q:optTaxRate" id="frm1701q:optTaxRate_1" onclick="enableSchedule1('taxpayer');ItemizedDeduct();" />
                                                                        <label for="frm1701q:optTaxRate_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;width: 235px;" >Graduated Rates per Tax Table -page 2 (Choose Method of Deduction in Item 16A)</label>
                                                                    </td>
                                                                    <td  width="500" valign="top" style="border-bottom: #AAAAAA 1px solid; border-left: #AAAAAA 1px solid;">
                                                                        <table>
                                                                            <tr>
                                                                                <td width="11"><font size="2" style="font-weight:bold;">&nbsp;16A&nbsp;</font></td>
                                                                                <td width="489" colspan="2"><font size="1" style="font-size: 11px;">Method of Deduction</font></td>
                                                                            </tr>
                                                                            <tr valign="top">
                                                                                <td></td>
                                                                                <td width="239">
                                                                                    <input type="radio" value="I"  name="frm1701q:optMethodOfDeduction" id="frm1701q:optMethodOfDeduction:_1" onclick="ItemizedDeduct()" />
                                                                                    <label for="frm1701q:optMethodOfDeduction:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >Itemized Deduction [Sec. 34(A-J), NIRC]</label>
                                                                                </td>
                                                                                <td width="250">
                                                                                    <input type="radio" value="O" style="vertical-align: super;" name="frm1701q:optMethodOfDeduction" id="frm1701q:optMethodOfDeduction:_2" onclick="OptionalDeduct()" />
                                                                                    <label for="frm1701q:optMethodOfDeduction:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;width: 227px;" >Optional Standard Deduction (OSD) [40% of Gross Sales/Receipts/Revenues/Fees [Sec. 34(L), NIRC]]</label>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="750">
                                                                <input type="radio" value="Percentage" style="vertical-align: super;"  name="frm1701q:optTaxRate" id="frm1701q:optTaxRate_2" onclick="enableSchedule2('taxpayer')" />
                                                                <label for="frm1701q:optTaxRate_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px; width: 700px;" >8% on gross sales/receipts & other non-operating income in lieu of Graduated Rates under Sec. 24(A)(2)(a) & Percentage Tax under Sec. 116 of the NIRC, 
                                                                    as amended [available if gross sales/receipts and other non-operating income do not exceed Three million pesos (P3M)]</label>
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
                                                            <div align="center"><font size="2" style="font-weight:bold;">PART II - BACKGROUND INFORMATION ON SPOUSE</font><font size="1">(if applicable)</font></div>
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
                                            <td width="600" valign="top" class="tblFormTd">
                                                <table width="500" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="10"><font size="2" style="font-weight:bold">&nbsp;17&nbsp;&nbsp;</font></td>
                                                        <td width="180">
                                                            <font size="1" style="font-size: 11px;">Spouse's TIN </font>
                                                        </td>
                                                        <td width="300">
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="" size="2" name="frm1701q:txtSpouseTIN1" maxlength="3" id="frm1701q:txtSpouseTIN1" onkeypress="return wholenumber(this, event)" />-
                                                                <input type="text" value="" size="2" name="frm1701q:txtSpouseTIN2" maxlength="3" id="frm1701q:txtSpouseTIN2" onkeypress="return wholenumber(this, event)" />-
                                                                <input type="text" value="" size="2" name="frm1701q:txtSpouseTIN3" maxlength="3" id="frm1701q:txtSpouseTIN3" onkeypress="return wholenumber(this, event)" />-
                                                                <input type="text" value="" size="5" name="frm1701q:txtSpouseBranchCode" maxlength="3" id="frm1701q:txtSpouseBranchCode" onkeypress="return letternumber(event)"/>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="198" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;18&nbsp;</font>
                                                        <td width="60"><font size="1" style="font-size: 11px;">RDO Code</font></td></td>
                                                        <td width="70" nowrap id="rdoSelect2">

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
                                            <td width="100%" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;&nbsp;</font></td>
                                                        <td width="100"><font size="1" style="font-size: 11px;">Filer's Spouse Type</font></td>
                                                        <td width="500">
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1701q:j_id217">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="Single" name="frm1701q:optSpouseType" id="frm1701q:optSpouseType_1" onclick="clearCheck('frm1701q:optSpouseType_1');processTaxType('taxspouse');" waschecked="true" />
                                                                                <label for="frm1701q:optSpouseType_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Single Proprietor</label>&nbsp;
                                                                            </td>
                                                                            <td><input type="radio" value="Professional"  name="frm1701q:optSpouseType" id="frm1701q:optSpouseType_2" onclick="clearCheck('frm1701q:optSpouseType_2');processTaxType('taxspouse');" waschecked="true" />
                                                                                <label for="frm1701q:optSpouseType_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Professional</label>&nbsp;
                                                                            </td>
                                                                            <td><input type="radio" value="Compensation"  name="frm1701q:optSpouseType" id="frm1701q:optSpouseType_3" onclick="clearCheck('frm1701q:optSpouseType_3');processTaxType('taxspouse');" waschecked="true" />
                                                                                <label for="frm1701q:optSpouseType_3" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Compensation Earner</label>&nbsp;
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
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
                                            <td width="100%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="19"><font size="1" style="font-size: 11px;">ATC</font></td>
                                                        <td width="190"><input type="radio" value="II012"  name="frm1701q:optSpouseATC" id="frm1701q:optSpouseATC_1" onclick="processATC('taxspouse')" />
                                                            <label for="frm1701q:optSpouseATC_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >II012 Business Income-Graduated IT Rates</label>&nbsp;
                                                        </td>
                                                        <td width="213"><input type="radio" value="II014"  name="frm1701q:optSpouseATC" id="frm1701q:optSpouseATC_2" onclick="processATC('taxspouse')" />
                                                            <label for="frm1701q:optSpouseATC_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >II014 Income from Profession-Graduated IT Rates</label>&nbsp;
                                                        </td>
                                                        <td width="180"><input type="radio" value="II013"  name="frm1701q:optSpouseATC" id="frm1701q:optSpouseATC_3" onclick="processATC('taxspouse')" />
                                                            <label for="frm1701q:optSpouseATC_3" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >II013 Mixed Income-Graduated IT Rates</label>&nbsp;
                                                        </td>
                                                        <td width="130"><input type="radio" value="II011"  name="frm1701q:optSpouseATC" id="frm1701q:optSpouseATC_4" onclick="processATC('taxspouse')" />
                                                            <label for="frm1701q:optSpouseATC_4" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >II011 Compensation Income</label>&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td><input type="radio" value="II015"  name="frm1701q:optSpouseATC" id="frm1701q:optSpouseATC_5" onclick="processATC('taxspouse')" />
                                                            <label for="frm1701q:optSpouseATC_5" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >II015 Business Income-8% IT Rate</label>&nbsp;
                                                        </td>
                                                        <td><input type="radio" value="II017"  name="frm1701q:optSpouseATC" id="frm1701q:optSpouseATC_6" onclick="processATC('taxspouse')" />
                                                            <label for="frm1701q:optSpouseATC_6" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >II017 Income from Profession-8% IT Rate</label>&nbsp;
                                                        </td>
                                                        <td><input type="radio" value="II016"  name="frm1701q:optSpouseATC" id="frm1701q:optSpouseATC_7" onclick="processATC('taxspouse')" />
                                                            <label for="frm1701q:optSpouseATC_7" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >II016 Mixed Income-8% IT Rate</label>&nbsp;
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
                                            <td width="100%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Spouse's Name </font><font style="font-size:11px">(Last Name, First Name, Middle Name)</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td><input type="text" value="" size="120" name="frm1701q:txtSpouseName" maxlength="50" id="frm1701q:txtSpouseName" onblur="return capital(this, event)" /></td>
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
                                            <td width="200" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;</font></td>
                                                        <td width="142"><font size="1" style="font-size: 11px;">Citizenship</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td width="153">
                                                            <input type="text" value="" id="frm1701q:txtSpouseCitizenship" name="frm1701q:txtSpouseCitizenship" maxlength="20" onkeypress="" onblur="return capital(this, event)" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="200" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;</font></td>
                                                        <td width="182"><font size="1" style="font-size: 11px;">Foreign Tax Number, if applicable </font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td width="153">
                                                            <input type="text" value="" id="frm1701q:txtSpouseForeignTaxNum" name="frm1701q:txtSpouseForeignTaxNum" maxlength="20" onkeypress="return letternumber(event)" onblur="" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="200" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;</font></td>
                                                        <td width="152"><font size="1" style="font-size: 11px;">Claiming Foreign Tax Credits?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td width="153">
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1701q:j_id217">
                                                                <table cellspacing="0" cellpadding="0" border="0">
                                                                    <tr>
                                                                        <td><input type="radio" value="Y" name="frm1701q:optSpouseForeignTaxCred" id="frm1701q:optSpouseForeignTaxCred_1" onclick="" />
                                                                            <label for="frm1701q:optSpouseForeignTaxCred_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Yes</label>&nbsp;
                                                                        </td>
                                                                        <td><input type="radio" value="N"  name="frm1701q:optSpouseForeignTaxCred" id="frm1701q:optSpouseForeignTaxCred_2" onclick="" />
                                                                            <label for="frm1701q:optSpouseForeignTaxCred_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >No</label>
                                                                        </td>
                                                                    </tr>
                                                                </table>
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
                                            <td class="tblFormTd">
                                                <table>
                                                    <tr>
                                                        <td width="100" rowspan="2">
                                                                <font size="2" style="font-weight:bold;">&nbsp;25&nbsp;&nbsp;&nbsp;</font>
                                                                <font size="1" style="font-size: 11px;">Tax Rate* (choose one, for income from business/ profession)</font>
                                                        </td>
                                                        <td width="750">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="250">
                                                                        <input type="radio" value="Graduated" style="vertical-align: super;"  name="frm1701q:optSpouseTaxRate" id="frm1701q:optSpouseTaxRate_1" onclick="enableSchedule1('taxspouse');ItemizedDeductSpouse();" />
                                                                        <label for="frm1701q:optSpouseTaxRate_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;width: 235px;" >Graduated Rates per Tax Table -page 2 (Choose Method of Deduction in Item 25A)</label>
                                                                    </td>
                                                                    <td  width="500" valign="top" style="border-bottom: #AAAAAA 1px solid; border-left: #AAAAAA 1px solid;">
                                                                        <table>
                                                                            <tr>
                                                                                <td width="11"><font size="2" style="font-weight:bold;">&nbsp;25A&nbsp;</font></td>
                                                                                <td width="489" colspan="2"><font size="1"  style="font-size: 11px;">Method of Deduction</font></td>
                                                                            </tr>
                                                                            <tr valign="top">
                                                                                <td>&nbsp;</td>
                                                                                <td width="239">
                                                                                    <input type="radio" value="I"  name="frm1701q:optSpouseMethod" id="frm1701q:optSpouseMethod:_1" onclick="ItemizedDeductSpouse()" />
                                                                                    <label for="frm1701q:optSpouseMethod:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;" >Itemized Deduction [Sec. 34(A-J), NIRC]</label>
                                                                                </td>
                                                                                <td width="250">
                                                                                    <input type="radio" value="O" style="vertical-align: super;"  name="frm1701q:optSpouseMethod" id="frm1701q:optSpouseMethod:_2" onclick="OptionalDeductSpouse()" />
                                                                                    <label for="frm1701q:optSpouseMethod:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:10px;width: 230px;" >Optional Standard Deduction (OSD) [40% of Gross Sales/Receipts/Revenues/Fees [Sec. 34(L), NIRC]]</label>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="750">
                                                                <input type="radio" value="Percentage"  name="frm1701q:optSpouseTaxRate" id="frm1701q:optSpouseTaxRate_2" onclick="enableSchedule2('taxspouse')" style="vertical-align: super;" />
                                                                <label for="frm1701q:optSpouseTaxRate_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;width: 700px;" >8% on gross sales/receipts & other non-operating income in lieu of Graduated Rates under Sec. 24(A)(2)(a) & Percentage Tax under Sec. 116 of the NIRC, 
                                                                    as amended [available if gross sales/receipts and other non-operating income do not exceed Three million pesos (P3M)]</label>
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
                                                            <div align="center"><font size="2" style="font-weight:bold;">PART III - TOTAL TAX PAYABLE </font><font style="font-size:8px;">(DO NOT enter Centavos; 49 Centavos or less drop down; 50 or more round up)</font></div>
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
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="26">&nbsp;</td>
                                                        <td width="324" align="center"><font size="2" style="font-weight:bold; text-align: right;">Particulars</font></td>
                                                        <td width="195" align="center"><font size="2" style="font-weight:bold; text-align: right;">A) Taxpayer/Filer</font></td>
                                                        <td width="194" align="center"><font size="2" style="font-weight:bold; text-align: right;">B) Spouse</font></td>
                                                    </tr>											
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;26&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Due </font><font style="font-size: 11px;"><a href="javascript:void(0)" id="btnNavigatePage2_1" class="xsmallItalic"  onclick="processNext()">(From Part V, Schedule 1-Item 46 OR Schedule II-Item 54)</a></font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">26A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt26A" name="frm1701q:txt26A" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">26B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt26B" name="frm1701q:txt26B" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;27&nbsp;</font></td>
                                                        <td class="padder"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Tax Credits/Payments </font><font style="font-size: 11px;"><a href="javascript:void(0)" id="btnNavigatePage2_2" class="xsmallItalic"  onclick="processNext()">(From Part V, Schedule III-Item 62)</a></font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">27A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt27A" name="frm1701q:txt27A" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">27B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt27B" name="frm1701q:txt27B" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;28</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Payable/(Overpayment) </font><font style="font-size: 11px;">(Item 26 Less Item 27)<a href="javascript:void(0)" id="btnNavigatePage2_3" class="xsmallItalic"  onclick="processNext()">(From Part V, Item 63) </a></font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">28A</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701q:txt28A" name="frm1701q:txt28A" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">28B</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701q:txt28B" name="frm1701q:txt28B" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;29</font></td>
                                                        <td class="padder"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Add: Total Penalties </font><font style="font-size: 8px;"><a href="javascript:void(0)" id="btnNavigatePage2_4" class="xsmallItalic"  onclick="processNext()">(From Part V, Schedule IV-Item 67)</a></font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">29A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt29A" name="frm1701q:txt29A" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">29B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt29B" name="frm1701q:txt29B" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;30</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Amount Payable/(Overpayment) </font><font style="font-size: 11px;">(Sum of Items 28 and 29)<a href="javascript:void(0)" id="btnNavigatePage2_5" class="xsmallItalic"  onclick="processNext()">(From Part V, Item 68)</a></font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">30A</font>&nbsp; 
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt30A" name="frm1701q:txt30A" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">30B</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt30B" name="frm1701q:txt30B" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;31&nbsp;</font></td>
                                                        <td class="padder"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Aggregate Amount Payable/(Overpayment) </font><font style="font-size: 11px;">(Sum of Items 30A and 30B)</font></td>
                                                        <td colspan="2" align="center"><span class="spacePadder"><font size="2" style="font-weight:bold;">&nbsp;</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt31" name="frm1701q:txt31" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
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
                                            <td colspan="4" style="text-align: left; ">&nbsp;&nbsp;&nbsp;&nbsp;I declare under the penalties of perjury that this remittance return, and all its attachments, have been made in good faith, verified by me, and to the best of my knowledge and belief, are 
                                                true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof. Further, I give my consent to the processing of my information as contemplated under the *Data Privacy 
                                                Act of 2012 (R.A. No. 10173) for legitimate and lawful purposes. (If Authorized Representative, attach authorization letter and indicate TIN)<br></td>
                                            </tr>
                                            <tr>
                                            <td colspan="4" style="text-align: center; ">
                                                <br><br><br>__________________________________________________________________
                                                <br>Signature and Printed Name of Taxpayer/Authorized Representative/Tax Agent
                                                <br>(Indicate Title/Designation and TIN)
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <table width="" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100%">
                                                            <div align="center"><font size="2" style="font-weight:bold;">PART IV - DETAILS OF PAYMENT</font></div>
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
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;32&nbsp;&nbsp;&nbsp;</font><font size="1">Cash/Bank Debit Memo </font></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm1701q:txtAgency32" maxlength="50" id="frm1701q:txtAgency32" disabled="true"  /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm1701q:txtNumber32" maxlength="50" id="frm1701q:txtNumber32" disabled="true"  /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm1701q:txtDate32" maxlength="10" id="frm1701q:txtDate32" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1701q:txtAmount32" maxlength="50" id="frm1701q:txtAmount32" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;33&nbsp;&nbsp;&nbsp;</font><font size="1">Check </font></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm1701q:txtAgency33" maxlength="50" id="frm1701q:txtAgency33" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm1701q:txtNumber33" maxlength="50" id="frm1701q:txtNumber33" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm1701q:txtDate33" maxlength="10" id="frm1701q:txtDate33" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1701q:txtAmount33" maxlength="50" id="frm1701q:txtAmount33" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><font size="2" style="font-weight:bold;">&nbsp;34&nbsp;&nbsp;&nbsp;</font><font size="1">Tax Debit Memo </font></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm1701q:txtNumber34" maxlength="50" id="frm1701q:txtNumber34" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm1701q:txtDate34" maxlength="10" id="frm1701q:txtDate34" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1701q:txtAmount34" maxlength="50" id="frm1701q:txtAmount34" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5"><font size="2" style="font-weight:bold;">&nbsp;35&nbsp;&nbsp;&nbsp;</font><font size="1">Others (specify) </font></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" value="" size="20" name="frm1701q:txtParticular35" maxlength="50" id="frm1701q:txtParticular35" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm1701q:txtAgency35" maxlength="50" id="frm1701q:txtAgency35" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm1701q:txtNumber35" maxlength="50" id="frm1701q:txtNumber35" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm1701q:txtDate35" maxlength="10" id="frm1701q:txtDate35" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1701q:txtAmount35" maxlength="50" id="frm1701q:txtAmount35" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="1" width="800" cellspacing="0" cellpadding="0" style="font-size:10px; text-align: left; vertical-align: top;">
                                    <tr>
                                        <td width="57%">Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br /><br /><br /></td>
                                        <td width="43%">Stamp of Receiving Office/AAB and Date of Receipt (RO's Signature/Bank Teller's Initial)<br /><br /><br /></td>
                                    </tr>
                                    </table>
                                    <!--</div>-->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>
                                        <font style="font-size:8px;">* I understand that this choice is irrevocable for this taxable year. However, the 8% Income Tax (IT) Rate option if initially selected shall automatically be changed to graduated IT rates 
                                        when taxpayer's gross sales/receipts and other non-operating income exceed Three million pesos (P3M) <br>
                                    </font>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                        
                    <div id="Page2Content" style="display:none;">
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
                                                <br/><font size="5px" style="font-weight:bold;">1701Q</font>
                                                <br/><font face="Arial" size="1px">January 2018 (ENCS)</font>
                                                <br/><font face="Arial" size="1px" style="font-weight:bold;">Page 2</font>
                                            </td>
                                            <td width="0" valign="center" style="text-align: center;">
                                                <font size="5px" style="font-weight:bold;">Quarterly Income Tax Return</font>
                                                <br/><font size="4px" style="font-weight:bold;">for Individuals, Estates and Trusts</font>
                                            </td>
                                            <td width="200" valign="center">
                                                    <p><img  class="barcodes" src="{{ asset('images/Bar Codes/1701Q_p2.png') }}" width="220" height="75px" /> </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="40%"><font size="1" face="Arial, Helvetica, sans-serif">TIN</font></td>
                                            <td width="60%"><font size="1" face="Arial, Helvetica, sans-serif">Taxpayer/Filer's Last Name</font></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <font size="2" face="Arial">
                                                    <input type="text" value="{{$company->tin1}}" size="3" name="frm1701q:txtPg2TIN1" maxlength="3" id="frm1701q:txtPg2TIN1" onkeypress="return wholenumber(this, event)" disabled />
                                                    <input type="text" value="{{$company->tin2}}" size="3" name="frm1701q:txtPg2TIN2" maxlength="3" id="frm1701q:txtPg2TIN2" onkeypress="return wholenumber(this, event)" disabled />
                                                    <input type="text" value="{{$company->tin3}}" size="3" name="frm1701q:txtPg2TIN3" maxlength="3" id="frm1701q:txtPg2TIN3" onkeypress="return wholenumber(this, event)" disabled />
                                                    <input type="text" value="{{$company->tin4}}" size="5" name="frm1701q:txtPg2BranchCode" maxlength="5" id="frm1701q:txtPg2BranchCode" onkeypress="return letternumber(event)" disabled />
                                                </font>
                                            </td>
                                            <?php 
                                                $lastname = explode(",", $company['registered_name'])
                                            ?>
                                            <td><input type="text" value="{{ $lastname[0] }}" size="80" name="frm1701q:txtPg2TaxpayerName" maxlength="50" id="frm1701q:txtPg2TaxpayerName" onblur="return capital(this, event)" disabled /></td>
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
                                                            <div align="center"><font size="2" style="font-weight:bold;">PART V - COMPUTATION OF TAX DUE </font><font style="font-size:11px;">(DO NOT enter Centavos; 49 Centavos or less drop down; 50 or more round up)</font></div>
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
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td colspan="4">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="350" align="center"><font size="2" style="font-weight:bold; text-align: right;">Declaration this Quarter</font></td>
                                                                    <td width="195" align="center"><font size="2" style="font-weight:bold; text-align: right;">A) Taxpayer/Filer</font></td>
                                                                    <td width="194" align="center"><font size="2" style="font-weight:bold; text-align: right;">B) Spouse</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" class="tblFormTd"><font size="1" style="font-weight:bold; text-align: right;font-size: 11px;">If graduated rate, fill in items 36 to 46; if 8%, fill in items 47 to 54</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                            <div><font size="1" style="font-weight:bold;font-size: 11px;">Schedule I </font><font size= "1" style="font-size: 11px;">- For Graduated IT Rate</font></div>
                                                        </td>
                                                    </tr>											
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;36&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Sales/Revenues/Receipts/Fees </font><font style="font-size: 11px;">(net of sales returns, allowances and discounts)</font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">36A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt36A" name="frm1701q:txt36A" onblur="round(this,2);computetxt38('taxpayer');computetxt40('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">36B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt36B" name="frm1701q:txt36B" onblur="round(this,2);computetxt38('taxspouse');computetxt40('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;37&nbsp;&nbsp;</font></td>
                                                        <td class="padder"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Cost of Sales/Services </font><font style="font-size: 11px;">(applicable only if availing Itemized Deductions)</font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">37A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt37A" name="frm1701q:txt37A" onblur="round(this,2);computetxt38('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">37B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt37B" name="frm1701q:txt37B" onblur="round(this,2);computetxt38('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;38&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Gross Income/(Loss) from Operation </font><font style="font-size: 11px;">(Item 36 Less Item 37) </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">38A</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701q:txt38A" name="frm1701q:txt38A" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">38B</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701q:txt38B" name="frm1701q:txt38B" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="spacePadder">&nbsp;</td>
                                                        <td colspan="3"><label size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Allowable Deductions </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="spacePadder">&nbsp;</td>
                                                        <td class="padder"><font size="2" style="font-weight:bold;">&nbsp;39&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Allowable Itemized Deductions </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">39A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt39A" name="frm1701q:txt39A" onblur="round(this,2);computetxt41('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">39B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt39B" name="frm1701q:txt39B"  onblur="round(this,2);computetxt41('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="spacePadder">&nbsp;</td>
                                                        <td colspan="3" align>
                                                            <div style="padding-left: 75px;">
                                                                <font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;"> OR </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="spacePadder">&nbsp;</td>
                                                        <td class="padder"><font size="2" style="font-weight:bold;">&nbsp;40&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Optional Standard Deduction (OSD) </font><font style="font-size: 11px;">(40% of Item 36) </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">40A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt40A" name="frm1701q:txt40A" onblur="round(this,2);" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">40B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt40B" name="frm1701q:txt40B"  onblur="round(this,2);" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;41</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Net Income/(Loss) This Quarter </font><font style="font-size: 11px;">(Item 38 Less Either Item 39 OR 40) </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">41A</font>&nbsp; 
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt41A" name="frm1701q:txt41A" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">41B</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt41B" name="frm1701q:txt41B" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="spacePadder">&nbsp;</td>
                                                        <td class="padder"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Add: </font><font size="2" style="font-weight:bold;">&nbsp;42&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Taxable Income/(Loss) Previous Quarter/s </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">42A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt42A" name="frm1701q:txt42A" onblur="round(this,2);computetxt45('taxpayer');" onkeypress="return numbersWithNegative(this, event)" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">42B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt42B" name="frm1701q:txt42B" onblur="round(this,2);computetxt45('taxspouse');" onkeypress="return numbersWithNegative(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="spacePadder">&nbsp;</td>
                                                        <td class="padder">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td class="spacePadder">&nbsp;</td>
                                                                    <td><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font><font size="2" style="font-weight:bold;">&nbsp;43&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Non-Operating Income </font><font style="font-size: 11px;">(specify) </font>
                                                                    <input type="text" value="" maxlength="25" size="20" id="frm1701q:txt43Desc" name="frm1701q:txt43Desc" disabled />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">43A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt43A" name="frm1701q:txt43A" onblur="round(this,2);computetxt45('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">43B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt43B" name="frm1701q:txt43B"  onblur="round(this,2);computetxt45('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="spacePadder">&nbsp;</td>
                                                        <td class="padder">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td class="spacePadder">&nbsp;</td>
                                                                    <td><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font><font size="2" style="font-weight:bold;">&nbsp;44&nbsp;&nbsp;</font><font face="Arial, Helvetica, sans-serif" style="font-size:11px;">Amount Received/Share in Income by a Partner from General Professional Partnership (GPP) </font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">44A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt44A" name="frm1701q:txt44A" onblur="round(this,2);computetxt45('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">44B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt44B" name="frm1701q:txt44B" onblur="round(this,2);computetxt45('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;45</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;font-size: 11px;">Total Taxable Income/(Loss) To Date </font><font style="font-size: 11px;">(Sum of Items 41 to 44) </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">45A</font>&nbsp; 
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt45A" name="frm1701q:txt45A" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">45B</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt45B" name="frm1701q:txt45B" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;46</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;font-size: 11px;">Tax Due </font><font style="font-size: 11px;">(Item 45 x Applicable Tax Rate based on Tax Table below)<a href="javascript:void(0)" id="btnNavigatePage1_1" class="xsmallItalic"  onclick="processPrev()">(To Part III, Item 26) </a></font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">46A</font>&nbsp; 
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt46A" name="frm1701q:txt46A" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">46B</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt46B" name="frm1701q:txt46B" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                            <div><font size="1" style="font-weight:bold;font-size: 11px;">Schedule II </font><font size= "1" style="font-size: 11px;">- For 8% IT Rate</font></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;47&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Sales/Revenues/Receipts/Fees </font><font style="font-size: 11px;">(net of sales returns, allowances and discounts)</font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">47A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt47A" name="frm1701q:txt47A"  onblur="round(this,2);computetxt49('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">47B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt47B" name="frm1701q:txt47B" onblur="round(this,2);computetxt49('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;48&nbsp;&nbsp;</font></td>
                                                        <td class="padder"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Add: Non-Operating Income </font><font style="font-size: 11px;">(specify) </font>
                                                            <input type="text" value="" maxlength="25" size="20" id="frm1701q:txt48Desc" name="frm1701q:txt48Desc" disabled />
                                                        </td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">48A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt48A" name="frm1701q:txt48A" onblur="round(this,2);computetxt49('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">48B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt48B" name="frm1701q:txt48B"  onblur="round(this,2);computetxt49('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;49</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Income for the quarter </font><font style="font-size: 11px;">(Sum of Items 47 and 48) </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">49A</font>&nbsp; 
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt49A" name="frm1701q:txt49A" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">49B</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt49B" name="frm1701q:txt49B" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;50&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Add: Total Taxable Income/(Loss) Previous Quarter </font><font style="font-size: 11px;">(Item 51 of previous quarter)</font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">50A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt50A" name="frm1701q:txt50A" onblur="round(this,2);computetxt51('taxpayer');" onkeypress="return numbersWithNegative(this, event)" disabled />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">50B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt50B" name="frm1701q:txt50B" onblur="round(this,2);computetxt51('taxspouse');" onkeypress="return numbersWithNegative(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;51</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Cumulative Taxable Income/(Loss) as of This Quarter </font><font style="font-size: 11px;">(Sum of Items 49 and 50) </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">51A</font>&nbsp; 
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt51A" name="frm1701q:txt51A" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">51B</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt51B" name="frm1701q:txt51B" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;52&nbsp;&nbsp;</font></td>
                                                        <td width="324">
                                                            <table width="324" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="24"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: </font></td>
                                                                    <td width="300"><label style="font-size:11px;"> Allowable reduction from gross sales/receipts and other non-operating income of purely self-employed individuals and/or professionals in the amount of P250,000 </label></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">52A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt52A" name="frm1701q:txt52A" onblur="round(this,2);item52Validate('taxpayer');computetxt53('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">52B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt52B" name="frm1701q:txt52B" onblur="round(this,2);item52Validate('taxspouse');computetxt53('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;53</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;font-size: 11px;">Taxable Income/(Loss) To Date </font><font style="font-size: 11px;">(Items 51 Less Item 52) </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">53A</font>&nbsp; 
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt53A" name="frm1701q:txt53A" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">53B</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt53B" name="frm1701q:txt53B" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;54</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;font-size: 11px;">Tax Due </font><font style="font-size: 11px;">(Item 53 x 8% Tax Rate)<a href="javascript:void(0)" id="btnNavigatePage1_2" class="xsmallItalic"  onclick="processPrev()" style="font-size: 11px;">(To Part III, Item 26) </a></font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">54A</font>&nbsp; 
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt54A" name="frm1701q:txt54A" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">54B</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt54B" name="frm1701q:txt54B" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                            <div><font size="1" style="font-weight:bold;font-size: 11px;">Schedule III </font><font size= "1" style="font-size: 11px;">- Tax Credits/Payments </font></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;55&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif"  style="font-size: 11px;">Prior Year's Excess Credits </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">55A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt55A" name="frm1701q:txt55A" onblur="round(this,2);computetxt62('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">55B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt55B" name="frm1701q:txt55B" onblur="round(this,2);computetxt62('taxspouse');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;56&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Payment/s for the Previous Quarter/s </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">56A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt56A" name="frm1701q:txt56A" onblur="round(this,2);computetxt62('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">56B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt56B" name="frm1701q:txt56B"  onblur="round(this,2);computetxt62('taxspouse');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;57&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Creditable Tax Withheld for the Previous Quarter/s </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">57A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt57A" name="frm1701q:txt57A" onblur="round(this,2);computetxt62('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">57B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt57B" name="frm1701q:txt57B" onblur="round(this,2);computetxt62('taxspouse');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;58&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Creditable Tax Withheld per BIR Form No. 2307 for this Quarter </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">58A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt58A" name="frm1701q:txt58A" onblur="round(this,2);computetxt62('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">58B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt58B" name="frm1701q:txt58B" onblur="round(this,2);computetxt62('taxspouse');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;59&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Paid in Return Previously Filed, if this is an Amended Return </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">59A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt59A" name="frm1701q:txt59A" onblur="round(this,2);computetxt62('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">59B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt59B" name="frm1701q:txt59B" onblur="round(this,2);computetxt62('taxspouse');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;60&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Foreign Tax Credits, if applicable </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">60A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt60A" name="frm1701q:txt60A" onblur="round(this,2);computetxt62('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">60B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt60B" name="frm1701q:txt60B" onblur="round(this,2);computetxt62('taxspouse');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;61&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Other Tax Credits/Payments </font><font style="font-size:11px;">(specify) </font><input type="text" value="" maxlength="25" size="20" id="frm1701q:txt61Desc" name="frm1701q:txt61Desc"></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">61A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt61A" name="frm1701q:txt61A" onblur="round(this,2);computetxt62('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">61B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt61B"  name="frm1701q:txt61B" onblur="round(this,2);computetxt62('taxspouse');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;62</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Tax Credits/Payments </font><font style="font-size: 11px;">(Sum of Items 55 to 61)<a href="javascript:void(0)" id="btnNavigatePage1_3" class="xsmallItalic"  onclick="processPrev()">(To Part III, Item 27) </a></font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">62A</font>&nbsp; 
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt62A" name="frm1701q:txt62A" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">62B</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt62B" name="frm1701q:txt62B" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" class="tblFormTdPart" style="border-top: #000000 2px solid;">
                                                            <table width="800" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td><font size="2" style="font-weight:bold;">&nbsp;63</font></td>
                                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;" style="font-size: 11px;">Tax Payable/(Overpayment) </font><font style="font-size: 11px;">(Item 46 or 54, Less Item 62)<a href="javascript:void(0)" id="btnNavigatePage1_4" class="xsmallItalic"  onclick="processPrev()">(To Part III, Item 28) </a></font></td>
                                                                    <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">63A</font>&nbsp; 
                                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt63A" name="frm1701q:txt63A" disabled />
                                                                        </span></td>
                                                                    <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">63B</font>&nbsp;
                                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt63B" name="frm1701q:txt63B" disabled />
                                                                        </span></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                            <div><font size="1" style="font-weight:bold; font-size: 11px;">Schedule IV </font><font size= "1" style="font-size: 11px;">- Penalties </font></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;64&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Surcharge </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">64A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt64A" name="frm1701q:txt64A" onblur="round(this,2);computetxt67('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">64B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt64B" name="frm1701q:txt64B" onblur="round(this,2);computetxt67('taxspouse');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;65&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Interest </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">65A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt65A" name="frm1701q:txt65A" onblur="round(this,2);computetxt67('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">65B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt65B" name="frm1701q:txt65B" onblur="round(this,2);computetxt67('taxspouse');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;66&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Compromise </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">66A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm1701q:txt66A" name="frm1701q:txt66A" onblur="round(this,2);computetxt67('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">66B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm1701q:txt66B" name="frm1701q:txt66B" onblur="round(this,2);computetxt67('taxspouse');" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;67</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Penalties </font><font style="font-size: 11px;">(Sum of Items 64 to 66)<a href="javascript:void(0)" id="btnNavigatePage1_5" class="xsmallItalic"  onclick="processPrev()">(To Part III, Item 29) </a></font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">67A</font>&nbsp; 
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt67A" name="frm1701q:txt67A" disabled />
                                                            </span></td>
                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">67B</font>&nbsp;
                                                                <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt67B" name="frm1701q:txt67B" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                            <table width="800" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="26"><font size="2" style="font-weight:bold;">&nbsp;68</font></td>
                                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;font-size: 11px;">Total Amount Payable/(Overpayment) </font><font style="font-size: 11px;">(Sum of Items 63 and 67)<a href="javascript:void(0)" id="btnNavigatePage1_6" class="xsmallItalic"  onclick="processPrev()">(To Part III, Item 30) </a></font></td>
                                                                    <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">68A</font>&nbsp; 
                                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt68A" name="frm1701q:txt68A" disabled />
                                                                        </span></td>
                                                                    <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">68B</font>&nbsp;
                                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701q:txt68B" name="frm1701q:txt68B" disabled />
                                                                        </span></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <tr>
                                                            <td colspan="4">
                                                                <br>
                                                                <table width="800" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td width="395">
                                                                            <table width="395" border="1" cellspacing="0" cellpadding="0" style="background-color:white; border: #000 1px solid;">
                                                                                <tr>
                                                                                    <td colspan="2" align="center"><font style="font-weight:bold; font-size:8px;">TABLE 1 - Tax Rates (effective January 1, 2018 to December 31, 2022)</font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="50%" align="center"><font style="font-weight:bold; font-size:8px;">If Taxable Income is: </font></td>
                                                                                    <td width="50%" align="center"><font style="font-weight:bold; font-size:8px;">Tax Due is: </font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"><font style="font-size:8px;">Not over P250,000 </font></td>
                                                                                    <td align="center"><font style="font-size:8px;">0% </font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"><font style="font-size:8px;">Over P250,000 but not over P400,000 </font></td>
                                                                                    <td align="center"><font style="font-size:8px;">20% of the excess over P250,000 </font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"><font style="font-size:8px;">Over P400,000 but not over P800,000 </font></td>
                                                                                    <td align="center"><font style="font-size:8px;">P30,000 + 25% of the excess over P400,000 </font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"><font style="font-size:8px;">Over P800,000 but not over P2,000,000 </font></td>
                                                                                    <td align="center"><font style="font-size:8px;">P130,000 + 30% of the excess over P800,000 </font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"><font style="font-size:8px;">Over P2,000,000 but not over P8,000,000 </font></td>
                                                                                    <td align="center"><font style="font-size:8px;">P490,000 + 32% of the excess over P2,000,000 </font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"><font style="font-size:8px;">Over P8,000,000 </font></td>
                                                                                    <td align="center"><font style="font-size:8px;">P2,410,000 + 35% of the excess over P8,000,000 </font></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td class="spacePadder">&nbsp;</td>
                                                                        <td width="395">
                                                                            <table width="395" border="1" cellspacing="0" cellpadding="0" style="background-color:white; border: #000 1px solid;">
                                                                                <tr>
                                                                                    <td colspan="2" align="center"><font style="font-weight:bold; font-size:8px;">TABLE 2 - Tax Rates (effective January 1, 2023 and onwards)</font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="50%" align="center"><font style="font-weight:bold; font-size:8px;">If Taxable Income is: </font></td>
                                                                                    <td width="50%" align="center"><font style="font-weight:bold; font-size:8px;">Tax Due is: </font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"><font style="font-size:8px;">Not over P250,000 </font></td>
                                                                                    <td align="center"><font style="font-size:8px;">0% </font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"><font style="font-size:8px;">Over P250,000 but not over P400,000 </font></td>
                                                                                    <td align="center"><font style="font-size:8px;">15% of the excess over P250,000 </font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"><font style="font-size:8px;">Over P400,000 but not over P800,000 </font></td>
                                                                                    <td align="center"><font style="font-size:8px;">22,500 + 20% of the excess over P400,000 </font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"><font style="font-size:8px;">Over P800,000 but not over P2,000,000 </font></td>
                                                                                    <td align="center"><font style="font-size:8px;">102,500 + 25% of the excess over P800,000 </font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"><font style="font-size:8px;">Over P2,000,000 but not over P8,000,000 </font></td>
                                                                                    <td align="center"><font style="font-size:8px;">402,500 + 30% of the excess over P2,000,000 </font></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"><font style="font-size:8px;">Over P8,000,000 </font></td>
                                                                                    <td align="center"><font style="font-size:8px;">P2,202,500 + 35% of the excess over P8,000,000 </font></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
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
                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                        <tr align="center">
                            <td class="tblFormTdPart">
                                <table width="897" cellspacing="0" cellpadding="0" border="0">
                                    <tr align="center">
                                        <td width="100%" colspan="2">
                                            <div align="center">
                                                <br />
                                                <input class="printButtonClass" type="button" value="Prev" style="width: 100px;"
                                                    name="frm1701q:btnPrevPage" id="frm1701q:btnPrevPage" onclick="processPrev();" />
                                                <input id="frm1701q:txtCurrentPage" name="frm1701q:txtCurrentPage" size="1" type="text" style="text-align:center;" onkeyup="goToPage();" />
                                                <span class=large>/&nbsp;</span><input type="text" id="frm1701q:txtMaxPage" readonly="true" size="2"  value="2" style="text-align:center;" disabled />&nbsp;
                                                <input class="printButtonClass" type="button" value="Next" style="width: 100px;"
                                                    name="frm1701q:btnNextPage" id="frm1701q:btnNextPage"  onclick="processNext();" />
                                                <br /><br />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr valign="middle" align="center">
                                        <td>
                                            <div align="center">
                                                @if($action != 'view')
                                                <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm1701q:cmdValidate" id="frm1701q:cmdValidate" onclick="validate()" />
                                                <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm1701q:cmdEdit" id="frm1701q:cmdEdit" onclick="enableAllControl()"/>
                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1701q:btnFinalCopy" id="frm1701q:btnFinalCopy" onclick="submitForm();" />
                                                @else
                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                @endif
                                                <div id="msg" class="printButtonClass" style="display:none;"></div>																		
                                            </div>
                                            <br />
                                        </td>
                                        <div id="DummyTxt" style='display:none;'>  </div>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
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
        <div id="hiddenProfile" style="display:none;"  > 
            <input type="text" value="{{$company->line_business}}" size="15" maxlength="50" id="frm1701q:txtLOB" name="frm1701q:txtLOB" onblur = "return capital(this, event)" /><br>
            <input id="frm1701q:txtTelno" name="frm1701q:txtTelno" maxlength="7"  size="7" value="{{$company->tel_number}}"  type="text" onkeypress="return wholenumber(this, event)" />
        </div>
</form>
	
	          	
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
    var isSubmitFinal = false;
    var isSubmit = false;

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
    var d = document, XMLBGFile = '', data = '', XMLFile = '', XMLATCFile = '', msg = d.getElementById('msg');
    var loader = d.getElementById('loader');
    /*----------------------------------*/
    var globalEmail = "";
    setTimeout("sleeptime()", 200);
    function sleeptime() {
        init();

        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
            var tin = fileName.split("/")[1].split("-");
          
            loadXML(fileName);
            existingXMLFileName = fileName;
            
            d.getElementById('frm1701q:txtYear').disabled = true;
            d.getElementById('frm1701q:DateQuarter_1').disabled = true;
            d.getElementById('frm1701q:DateQuarter_2').disabled = true;
            d.getElementById('frm1701q:DateQuarter_3').disabled = true;

            if (gIsReadOnly) {
                window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false; d.getElementById('frm1701q:txtCurrentPage').disabled = false; d.getElementById('frm1701q:btnPrevPage').disabled = false; d.getElementById('frm1701q:btnNextPage').disabled = false;", 1000);
            }
        } else {
            window.setTimeout("$('#loader').hide('blind');", 100);
        }
        if ($('#printMenu').css('display') != 'none') {
            $('#printMenu').hide('blind');
        }
		document.getElementById('frm1701q:txtTIN1').disabled = true; document.getElementById('frm1701q:txtTIN2').disabled = true; document.getElementById('frm1701q:txtTIN3').disabled = true; document.getElementById('frm1701q:txtBranchCode').disabled = true;
         
         // Disable pasting
        $(document).ready(function () {
            $('input').bind('paste', function (e) {
                e.preventDefault();
            });
        });
	}

	function rdoPropertyJS(rdoCode, description) {
        this.rdoCode = rdoCode;
        this.description = description;
    }

	var rdoList = new Array();

    function init() {

    	loadXMLrdo('/xml/rdo.xml');
    	getRdo();

        var year = new Date();
        d.getElementById('frm1701q:txtYear').value = year.getFullYear();
        
        currentPage = 1;
		d.getElementById('frm1701q:txtCurrentPage').value = currentPage;

        d.getElementById('frm1701q:AmendedRtn_1').disabled = false;
        d.getElementById('frm1701q:AmendedRtn_2').disabled = false;

        d.getElementById('frm1701q:txt28A').disabled = true;
        d.getElementById('frm1701q:txt28B').disabled = true;
        d.getElementById('frm1701q:txt30A').disabled = true;
        d.getElementById('frm1701q:txt30B').disabled = true;

        @if($action != 'view')
        d.getElementById('frm1701q:cmdEdit').disabled = true;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1701q:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @endif
        

        processAmend();
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
            loadWFData();	/*This will load data onto fields*/
            if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
                gIsReadOnly = true;
            }

            if (gIsReadOnly) {
                d.getElementById('frm1701q:cmdValidate').disabled = true;
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
        var fieldVal = "";
        for (var i = 0; i < elem.length; i++) {

            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {	//elem[i].type != 'button' &&  			
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    if(elem[i].id != 'frm1701q:txtAddress2'){
						fieldVal = String(response.innerHTML).split(elem[i].id + '>');
					}
					else{
						fieldVal = String(response.innerHTML).split("frm1701q:txtAddress>");
					}
                    // elem[i].value = fieldVal[1]; //all select-one and text values		 
                    if (fieldVal != null && fieldVal.length > 1) {
                        if(elem[i].id == 'frm1701q:txtAddress'){
                            if(fieldVal[1].length <= 100){
                                elem[i].value = fieldVal[1].substring(0, fieldVal[1].indexOf("</"));
                            }
                            else {
                                elem[i].value = unescape(fieldVal[1].substring(0, 100));
                            }
                        }
                        else if(elem[i].id == 'frm1701q:txtAddress2'){
                            if(fieldVal[1].length <= 100){
                                elem[i].value = '';
                            }
                            else {
                                elem[i].value = unescape(fieldVal[1].substring(100, fieldVal[1].indexOf("</")));
                            }
                        }
                        else {
                            elem[i].value = fieldVal[1].substring(0, fieldVal[1].indexOf("</"));
                        }
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
                //	elem[i].onclick();				
                //}					
            }

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
                d.getElementById('frm1701q:cmdValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
        }
        
    }

    function loadData() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");
        var elem = d.getElementById('frmMain').elements;
        var fieldVal = "";
        for (var i = 0; i < elem.length; i++) {

            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {	
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {

                    if(elem[i].id != 'frm1701q:txtAddress2'){
						fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
					}
					else{
						fieldVal = String( $("#response").html() ).split("frm1701q:txtAddress=");
					}

                    if (elem[i].id == 'frm1701q:txtTaxpayerName' || elem[i].id == 'frm1701q:txtLOB') {
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    else if(elem[i].id == 'frm1701q:txtAddress'){
                        if(fieldVal[1].length <= 100){
                            elem[i].value = unescape(fieldVal[1]);
                        }
                        else {
                            elem[i].value = unescape(fieldVal[1].substring(0, 100));
                        }
                    }
                    else if(elem[i].id == 'frm1701q:txtAddress2'){
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
                        elem[i].value = fieldVal[1]; 	
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
        if (d.getElementById('frm1701q:txtTIN1').value != "") {
            d.getElementById('frm1701q:txtSpouseRDOCode').disabled = false;
            d.getElementById('frm1701q:txtSpouseName').disabled = false;
            d.getElementById('frm1701q:optSpouseATC_1').disabled = false;
            d.getElementById('frm1701q:optSpouseATC_2').disabled = false;
            d.getElementById('frm1701q:optSpouseATC_3').disabled = false;
            d.getElementById('frm1701q:optSpouseATC_4').disabled = false;
            d.getElementById('frm1701q:optSpouseATC_5').disabled = false;
            d.getElementById('frm1701q:optSpouseATC_6').disabled = false;
            d.getElementById('frm1701q:optSpouseATC_7').disabled = false;
            d.getElementById('frm1701q:optSpouseMethod:_1').disabled = false;
            d.getElementById('frm1701q:optSpouseMethod:_2').disabled = false;
        }

       
    }
 
    function isItAnAmendedReturn(xmlFile) {
        if (d.getElementById('frm1701q:AmendedRtn_1').checked) {
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
            //e.value = "";
        } else {
            e.value = '' + number;
            if (e.value < 0) {
                var zero = 0;
                e.value = parseFloat(zero).toFixed(2);
            }

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

    //validate date
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

    function item52Validate(person) {
        if (person == "taxpayer") {
            if (NumWithComma(d.getElementById("frm1701q:txt52A").value) > 250000) {
                alert ("Item 52A cannot be more than P250,000.");
                d.getElementById("frm1701q:txt52A").value = (0).toFixed(2);
            }
        }
        else {
            if (NumWithComma(d.getElementById("frm1701q:txt52B").value) > 250000) {
                alert ("Item 52A cannot be more than P250,000.");
                d.getElementById("frm1701q:txt52B").value = (0).toFixed(2);
            }
        }
    }

    function validateYear() {
        var dt = new Date();
        if( d.getElementById('frm1701q:txtYear').value*1 > dt.getFullYear()*1   )
        {
            alert("Year (Item 1) cannot be greater than or equal to current year.")
            d.getElementById('frm1701q:txtYear').value = "";
            return;
        }
    }

    function validate() {
        var dt = new Date();
        if (d.getElementById('frm1701q:txtYear').value == "") {
            alert("Please enter a valid year in Item 1."); return;
        }
        if( d.getElementById('frm1701q:txtYear').value*1 > dt.getFullYear()*1   )
        {
            alert("Invalid date entry on Item no.1. Entry should not be later than Current Date.")
            return;
        }
        if (d.getElementById('frm1701q:txtYear').value * 1 < 1900) {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }
        if (d.getElementById('frm1701q:DateQuarter_1').checked == false && d.getElementById('frm1701q:DateQuarter_2').checked == false && d.getElementById('frm1701q:DateQuarter_3').checked == false) {
            alert("Please select quarter in Item 2."); return;
        }// can be optional

        //--- dgarfin : Added 'Background Information' field validation for Phase 2
        if ((d.getElementById('frm1701q:txtTIN1').value == "" || d.getElementById('frm1701q:txtTIN2').value == "" || d.getElementById('frm1701q:txtTIN3').value == "" || d.getElementById('frm1701q:txtBranchCode').value == "")) {
            alert("Please enter a valid TIN number on Item 5.");
            return;
        }

        if ((d.getElementById('frm1701q:txtTIN1').value.length != 3 || d.getElementById('frm1701q:txtTIN2').value.length != 3 || d.getElementById('frm1701q:txtTIN3').value.length != 3 || d.getElementById('frm1701q:txtBranchCode').value.length < 3)) {
            alert("Please enter a valid TIN number on Item 5.");
            return;
        }
        
        if ((d.getElementById('frm1701q:txtTaxpayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 9.");
            return;
        }
        if ((d.getElementById('frm1701q:txtAddress').value == "")) {
            alert("Please enter Taxpayer's Registered Address on Item 10.");
            return;
        }
     
        if (d.getElementById('frm1701q:txtBirthMonth').value != "" || d.getElementById('frm1701q:txtBirthDay').value != "" || d.getElementById('frm1701q:txtBirthYear').value != "") {
            if (validateMonthDayYearDate(d.getElementById('frm1701q:txtBirthMonth').value + "/" + d.getElementById('frm1701q:txtBirthDay').value + "/" + d.getElementById('frm1701q:txtBirthYear').value)) {
                alert("Invalid birth date on item 11 of Taxpayer.  Please check date format.");
                return true;
            }
        } else {
            alert("Please indicate Birth Date of Taxpayer on item 11.");
            return true;
        }
        if (document.getElementById('frm1701q:txtBirthYear').value * 1 > dt.getFullYear() * 1) {
            alert("Birth Year on Item 11 should not be later than current year.");
            return false;
        }
        if (document.getElementById('frm1701q:txtZipCode').value == "") {
            alert("Please enter Zip Code on Item 10A.");
            return;
        }

        //Spouse	
        if ((d.getElementById('frm1701q:txtSpouseTIN1').value != "" || d.getElementById('frm1701q:txtSpouseTIN2').value != "" || d.getElementById('frm1701q:txtSpouseTIN3').value != "")) {
            if ((d.getElementById('frm1701q:txtSpouseTIN1').value.length != 3 || d.getElementById('frm1701q:txtSpouseTIN2').value.length != 3 || d.getElementById('frm1701q:txtSpouseTIN3').value.length != 3 || d.getElementById('frm1701q:txtSpouseBranchCode').value.length != 3)) {
                alert("Please enter a valid TIN number on Item 17.");
                return;
            }
            var tinChkCode = getTinChkCode($('#frm1701q\\:txtSpouseTIN1').val(),$('#frm1701q\\:txtSpouseTIN2').val(),$('#frm1701q\\:txtSpouseTIN3').val());
            if ( tinChkCode !== 0) {
            	alert(getChkTinErrDesc(tinChkCode) + " on Item 17.");
            	return;
            } 
            if ((d.getElementById('frm1701q:txtSpouseRDOCode').selectedIndex == 0)) {
                alert("Please enter a valid RDO Code on Item 18.");
                return;
            }
            if ((d.getElementById('frm1701q:txtSpouseName').value == "")) {
                alert("Please enter Spouse Name on Item 21.");
                return;
            }
            if (d.getElementById('frm1701q:optSpouseATC_1').checked == false && d.getElementById('frm1701q:optSpouseATC_2').checked == false && d.getElementById('frm1701q:optSpouseATC_3').checked == false && d.getElementById('frm1701q:optSpouseATC_4').checked == false && d.getElementById('frm1701q:optSpouseATC_5').checked == false && d.getElementById('frm1701q:optSpouseATC_6').checked == false && d.getElementById('frm1701q:optSpouseATC_7').checked == false) {
                alert("Please select an option for Item 20."); return;
            }
        }

        //--- dgarfin : Added 'Background Information' field validation for Phase 2		

        if (d.getElementById('frm1701q:optType_1').checked == false && d.getElementById('frm1701q:optType_2').checked == false && d.getElementById('frm1701q:optType_3').checked == false && d.getElementById('frm1701q:optType_4').checked == false) {
            alert("Please select an option for Item 7."); return;
        }
        if (d.getElementById('frm1701q:optATC_1').checked == false && d.getElementById('frm1701q:optATC_2').checked == false && d.getElementById('frm1701q:optATC_3').checked == false && d.getElementById('frm1701q:optATC_4').checked == false && d.getElementById('frm1701q:optATC_5').checked == false && d.getElementById('frm1701q:optATC_6').checked == false) {
            alert("Please select an option for Item 8."); return;
        }// can
        if (d.getElementById('frm1701q:optTaxRate_1').checked == false && d.getElementById('frm1701q:optTaxRate_2').checked == false) {
            alert("Please select an option for Item 16."); return;
        }
        if (d.getElementById('frm1701q:optTaxRate_1').checked == true && d.getElementById('frm1701q:optMethodOfDeduction:_1').checked == false && d.getElementById('frm1701q:optMethodOfDeduction:_2').checked == false) {
            alert("Please select an option for Item 16A."); return;
        }
        if (d.getElementById("frm1701q:txtSpouseName").value != "") {
            if (d.getElementById('frm1701q:optSpouseType_1').checked == false && d.getElementById('frm1701q:optSpouseType_2').checked == false && d.getElementById('frm1701q:optSpouseType_3').checked == false) {
                alert("Please select an option for Item 19."); return;
            }
            if (d.getElementById('frm1701q:optSpouseATC_1').checked == false && d.getElementById('frm1701q:optSpouseATC_2').checked == false && d.getElementById('frm1701q:optSpouseATC_3').checked == false && d.getElementById('frm1701q:optSpouseATC_4').checked == false && d.getElementById('frm1701q:optSpouseATC_5').checked == false && d.getElementById('frm1701q:optSpouseATC_6').checked == false && d.getElementById('frm1701q:optSpouseATC_7').checked == false) {
                alert("Please select an option for Item 20."); return;
            }
            if (d.getElementById('frm1701q:optSpouseTaxRate_1').checked == false && d.getElementById('frm1701q:optSpouseTaxRate_2').checked == false) {
                if (d.getElementById('frm1701q:optSpouseType_3').checked == false) {
                    alert("Please select an option for Item 25."); return;
                }
            }
        }

        disableAllControl();
        alert("Validation successful. Click on Edit if you wish to modify your entries.");
        return;
    }

    var disableElem = true;
    var enableElem = false;
    function disableAllControl() {
        d.getElementById('frm1701q:txtSheets').disabled = true;
        d.getElementById('frm1701q:txtTIN1').disabled = true;
        d.getElementById('frm1701q:txtTIN2').disabled = true;
        d.getElementById('frm1701q:txtTIN3').disabled = true;
        d.getElementById('frm1701q:txtBranchCode').disabled = true;
        d.getElementById('frm1701q:txtRDOCode').disabled = true;
        d.getElementById('frm1701q:txtSpouseTIN1').disabled = true;
        d.getElementById('frm1701q:txtSpouseTIN2').disabled = true;
        d.getElementById('frm1701q:txtSpouseTIN3').disabled = true;
        d.getElementById('frm1701q:txtSpouseBranchCode').disabled = true;
        d.getElementById('frm1701q:txtSpouseRDOCode').disabled = true;
        d.getElementById('frm1701q:txtTaxpayerName').disabled = true;
        d.getElementById('frm1701q:txtSpouseName').disabled = true;
        d.getElementById('frm1701q:txtAddress').disabled = true;
        d.getElementById('frm1701q:txtBirthMonth').disabled = true;
        d.getElementById('frm1701q:txtBirthDay').disabled = true;
        d.getElementById('frm1701q:txtBirthYear').disabled = true;
        d.getElementById('frm1701q:txtZipCode').disabled = true;
        d.getElementById('txtEmail').disabled = true;
        d.getElementById('frm1701q:txtCitizenship').disabled = true;
        d.getElementById('frm1701q:txtForeignTaxNumber').disabled = true;
        d.getElementById('frm1701q:optForeignTaxCredits_1').disabled = true;
        d.getElementById('frm1701q:optForeignTaxCredits_2').disabled = true;
        d.getElementById('frm1701q:optTaxRate_1').disabled = true;
        d.getElementById('frm1701q:optTaxRate_2').disabled = true;
        d.getElementById("frm1701q:txt59A").disabled = true;
        d.getElementById("frm1701q:txt59B").disabled = true;
        d.getElementById('frm1701q:AmendedRtn_1').disabled = true;
        d.getElementById('frm1701q:AmendedRtn_2').disabled = true;
        d.getElementById('frm1701q:txtYear').disabled = true;
        d.getElementById('frm1701q:DateQuarter_1').disabled = true;
        d.getElementById('frm1701q:DateQuarter_2').disabled = true;
        d.getElementById('frm1701q:DateQuarter_3').disabled = true;
        d.getElementById('frm1701q:optType_1').disabled = true;
        d.getElementById('frm1701q:optType_2').disabled = true;
        d.getElementById('frm1701q:optType_3').disabled = true;
        d.getElementById('frm1701q:optType_4').disabled = true;
        d.getElementById('frm1701q:optATC_1').disabled = true;
        d.getElementById('frm1701q:optATC_2').disabled = true;
        d.getElementById('frm1701q:optATC_3').disabled = true;
        d.getElementById('frm1701q:optATC_4').disabled = true;
        d.getElementById('frm1701q:optATC_5').disabled = true;
        d.getElementById('frm1701q:optATC_6').disabled = true;
        d.getElementById('frm1701q:optMethodOfDeduction:_1').disabled = true;
        d.getElementById('frm1701q:optMethodOfDeduction:_2').disabled = true;
        
        d.getElementById('frm1701q:optSpouseType_1').disabled = true;
        d.getElementById('frm1701q:optSpouseType_2').disabled = true;
        d.getElementById('frm1701q:optSpouseType_3').disabled = true;
        d.getElementById('frm1701q:txtSpouseCitizenship').disabled = true;
        d.getElementById('frm1701q:txtSpouseForeignTaxNum').disabled = true;
        d.getElementById('frm1701q:optSpouseForeignTaxCred_1').disabled = true;
        d.getElementById('frm1701q:optSpouseForeignTaxCred_2').disabled = true;
        d.getElementById('frm1701q:optSpouseATC_1').disabled = true;
        d.getElementById('frm1701q:optSpouseATC_2').disabled = true;
        d.getElementById('frm1701q:optSpouseATC_3').disabled = true;
        d.getElementById('frm1701q:optSpouseATC_4').disabled = true;
        d.getElementById('frm1701q:optSpouseATC_5').disabled = true;
        d.getElementById('frm1701q:optSpouseATC_6').disabled = true;
        d.getElementById('frm1701q:optSpouseATC_7').disabled = true;
        d.getElementById('frm1701q:optSpouseMethod:_1').disabled = true;
        d.getElementById('frm1701q:optSpouseMethod:_2').disabled = true;
        d.getElementById('frm1701q:optSpouseTaxRate_1').disabled = true;
        d.getElementById('frm1701q:optSpouseTaxRate_2').disabled = true;

        d.getElementById('frm1701q:txt43Desc').disabled = true;
        d.getElementById('frm1701q:txt48Desc').disabled = true;
        d.getElementById('frm1701q:txt61Desc').disabled = true;

        for (index = 36; index < 69 ; index++) {
            d.getElementById("frm1701q:txt" + index + "A").disabled = true;
        }
        for (index = 36; index < 69 ; index++) {
        d.getElementById("frm1701q:txt" + index + "B").disabled = true;
        }

        d.getElementById('frm1701q:txtCurrentPage').disabled = true;
        d.getElementById('frm1701q:cmdValidate').disabled = true;
        d.getElementById('frm1701q:cmdEdit').disabled = false;
        d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm1701q:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;
        disableElem;
        enableElem;
    }

    function enableAllControl() {
        d.getElementById('frm1701q:txtSheets').disabled = false;
        d.getElementById('frm1701q:txtSpouseTIN1').disabled = false;
        d.getElementById('frm1701q:txtSpouseTIN2').disabled = false;
        d.getElementById('frm1701q:txtSpouseTIN3').disabled = false;
        d.getElementById('frm1701q:txtSpouseBranchCode').disabled = false;
        d.getElementById('frm1701q:txtSpouseRDOCode').disabled = false;
        d.getElementById('frm1701q:txtSpouseName').disabled = false;
        //d.getElementById('frm1701q:txtBirthDate').disabled = false;
        d.getElementById('frm1701q:txtBirthMonth').disabled = false;
        d.getElementById('frm1701q:txtBirthDay').disabled = false;
        d.getElementById('frm1701q:txtBirthYear').disabled = false;
        d.getElementById('frm1701q:AmendedRtn_1').disabled = false;
        d.getElementById('frm1701q:AmendedRtn_2').disabled = false;
        d.getElementById('frm1701q:txtYear').disabled = false;
        d.getElementById('frm1701q:DateQuarter_1').disabled = false;
        d.getElementById('frm1701q:DateQuarter_2').disabled = false;
        d.getElementById('frm1701q:DateQuarter_3').disabled = false;
        d.getElementById('frm1701q:txtCitizenship').disabled = false;
        d.getElementById('frm1701q:txtForeignTaxNumber').disabled = false;
        d.getElementById('frm1701q:optForeignTaxCredits_1').disabled = false;
        d.getElementById('frm1701q:optForeignTaxCredits_2').disabled = false;
        d.getElementById('frm1701q:optTaxRate_1').disabled = false;
        d.getElementById('frm1701q:optTaxRate_2').disabled = false;
        d.getElementById('frm1701q:optType_1').disabled = false;
        d.getElementById('frm1701q:optType_2').disabled = false;
        d.getElementById('frm1701q:optType_3').disabled = false;
        d.getElementById('frm1701q:optType_4').disabled = false;
        d.getElementById('frm1701q:optATC_1').disabled = false;
        d.getElementById('frm1701q:optATC_2').disabled = false;
        d.getElementById('frm1701q:optATC_3').disabled = false;
        d.getElementById('frm1701q:optATC_4').disabled = false;
        d.getElementById('frm1701q:optATC_5').disabled = false;
        d.getElementById('frm1701q:optATC_6').disabled = false;
        d.getElementById('frm1701q:optMethodOfDeduction:_1').disabled = false;
        d.getElementById('frm1701q:optMethodOfDeduction:_2').disabled = false;
        
        d.getElementById('frm1701q:optSpouseType_1').disabled = false;
        d.getElementById('frm1701q:optSpouseType_2').disabled = false;
        d.getElementById('frm1701q:optSpouseType_3').disabled = false;
        d.getElementById('frm1701q:txtSpouseCitizenship').disabled = false;
        d.getElementById('frm1701q:txtSpouseForeignTaxNum').disabled = false;
        d.getElementById('frm1701q:optSpouseForeignTaxCred_1').disabled = false;
        d.getElementById('frm1701q:optSpouseForeignTaxCred_2').disabled = false;
        d.getElementById('frm1701q:optSpouseATC_1').disabled = false;
        d.getElementById('frm1701q:optSpouseATC_2').disabled = false;
        d.getElementById('frm1701q:optSpouseATC_3').disabled = false;
        d.getElementById('frm1701q:optSpouseATC_4').disabled = false;
        d.getElementById('frm1701q:optSpouseATC_5').disabled = false;
        d.getElementById('frm1701q:optSpouseATC_6').disabled = false;
        d.getElementById('frm1701q:optSpouseATC_7').disabled = false;
        d.getElementById('frm1701q:optSpouseMethod:_1').disabled = false;
        d.getElementById('frm1701q:optSpouseMethod:_2').disabled = false;
        d.getElementById('frm1701q:optSpouseTaxRate_1').disabled = false;
        d.getElementById('frm1701q:optSpouseTaxRate_2').disabled = false;
        
        
        //schedule 1
        if (d.getElementById("frm1701q:optTaxRate_1").checked == true) {
            for (index = 36; index < 47 ; index++) {
                if (d.getElementById("frm1701q:optMethodOfDeduction:_1").checked == true) {
                    if (index == 37 || index == 39) {
                        d.getElementById("frm1701q:txt" + index + "A").disabled = false;
                    }
                }
                if (index == 36 || index == 42 || index == 43 || index == 44) {
                    d.getElementById("frm1701q:txt" + index + "A").disabled = false;
                }
            }
            d.getElementById("frm1701q:txt43Desc").disabled = false;
        }

        //schedule 2
        if (d.getElementById("frm1701q:optTaxRate_2").checked == true) {
            for (index = 47; index < 55 ; index++) {
                if (index == 47 || index == 48 || index == 50 || index == 52) {
                    d.getElementById("frm1701q:txt" + index + "A").disabled = false;
                }
            }
            d.getElementById("frm1701q:txt48Desc").disabled = false;
        }

        //Spouse
        if (d.getElementById("frm1701q:txtSpouseName").value != "") {
            //schedule 1
            if (d.getElementById("frm1701q:optTaxRate_1").checked == true) {
                for (index = 36; index < 47 ; index++) {
                    if (d.getElementById("frm1701q:optMethodOfDeduction:_1").checked == true) {
                        if (index == 37 || index == 39) {
                            d.getElementById("frm1701q:txt" + index + "B").disabled = false;
                        }
                    }
                    if (index == 36 || index == 42 || index == 43 || index == 44) {
                        d.getElementById("frm1701q:txt" + index + "B").disabled = false;
                    }
                }
            }

            //schedule 2
            if (d.getElementById("frm1701q:optTaxRate_2").checked == true) {
                for (index = 47; index < 55 ; index++) {
                    if (index == 47 || index == 48 || index == 50 || index == 52) {
                        d.getElementById("frm1701q:txt" + index + "B").disabled = false;
                    }
                }
            }
        }

        for (index = 55; index < 69; index++) {
            if (index == 62 || index == 63 || index == 67 || index == 68) {
                d.getElementById("frm1701q:txt" + index + "A").disabled = true;
            d.getElementById("frm1701q:txt" + index + "B").disabled = true;
            }
            else {
            d.getElementById("frm1701q:txt" + index + "A").disabled = false;
            d.getElementById("frm1701q:txt" + index + "B").disabled = false;
            }
        }
        d.getElementById("frm1701q:txt61Desc").disabled = false;

        if (d.getElementById('frm1701q:optMethodOfDeduction:_1').checked == true) {
            ItemizedDeduct();
        } else if (d.getElementById('frm1701q:optMethodOfDeduction:_2').checked == true) {
            OptionalDeduct();
        }

        if (d.getElementById("frm1701q:txtSpouseName").value != "") {
            if (d.getElementById('frm1701q:optSpouseMethod:_1').checked == true) {
                ItemizedDeductSpouse();
            } else if (d.getElementById('frm1701q:optSpouseMethod:_2').checked == true) {
                ItemizedDeductSpouse();
                OptionalDeductSpouse();
            }
        }

        if (d.getElementById('frm1701q:AmendedRtn_1').checked) {
            if (d.getElementById("frm1701q:txtSpouseName").value != "") {
                d.getElementById("frm1701q:txt59A").disabled = false;
                d.getElementById("frm1701q:txt59B").disabled = false;
            } else {
                d.getElementById("frm1701q:txt59A").disabled = false;
                d.getElementById("frm1701q:txt59B").disabled = true;
            }
        } else {
            d.getElementById("frm1701q:txt59A").disabled = true;
            d.getElementById("frm1701q:txt59B").disabled = true;
        }

        d.getElementById('frm1701q:txtCurrentPage').disabled = false;
        d.getElementById('frm1701q:cmdValidate').disabled = false;
        d.getElementById('frm1701q:cmdEdit').disabled = true;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1701q:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;

        if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
            d.getElementById('frm1701q:txtYear').disabled = true;
            d.getElementById('frm1701q:DateQuarter_1').disabled = true;
            d.getElementById('frm1701q:DateQuarter_2').disabled = true;
            d.getElementById('frm1701q:DateQuarter_3').disabled = true;
        }

        disableElem;
        enableElem;
		document.getElementById('frm1701q:txtTIN1').disabled = true; document.getElementById('frm1701q:txtTIN2').disabled = true; document.getElementById('frm1701q:txtTIN3').disabled = true; document.getElementById('frm1701q:txtBranchCode').disabled = true;
    }

    function loadXMLrdo(fileLocation) {

    	var url = document.getElementsByName('base_url')[0].getAttribute('content');
    	console.log(url + fileLocation);
        var xmlHTTP = new XMLHttpRequest();
        try
        {
            xmlHTTP.open("GET", url + fileLocation, false);
            xmlHTTP.send(null);
        }
        catch (e) {
            window.alert("Unable to load the requested file.");
            return;
        }
        var responseRdo = d.getElementById('responseRdo');
        responseRdo.innerHTML = xmlHTTP.responseText; //remove XML tag
        loadRdo();
    }

    var rdoCount = 0;

    function loadRdo() {
        /*This will load data onto an array*/
        var response = d.getElementById("responseRdo");

        var rdoCnt = String(response.innerHTML).split('rdoCount=');
        rdoCount = rdoCnt[1];

        var k = 0;
        //loads rdoList from xml
        for (var i = 1; i <= rdoCount; i++) {

            var rdo = String(response.innerHTML).split('rdo' + i + ':');
            var rdoStr = rdo[1];

            //Ensure that before writing to rdoPropertyJS the formType 1701Q is traceable in rdoStr
            if (rdoStr.indexOf('1701Q') >= 0) {
                var rdoValues = rdoStr.split('~');
                var rdoCode = rdoValues[0];
                var description = rdoValues[1];

                var objRdo = new rdoPropertyJS(rdoCode, description);
                rdoList[k] = objRdo;
                k++;
                //alert('1701Q successfully created array #'+i);

            } else {
                //alert('1701Q not found in array #'+i);
                continue;
            }
        }
    }

    function getRdo() {
        var data2 = "<select class='iceSelOneMnu' id='frm1701q:txtSpouseRDOCode' name='frm1701q:txtSpouseRDOCode' size='1'><option value='000'> </option>";
        for (var i = 0; i < rdoList.length; i++) {
            var rdo = rdoList[i];
            data2 = data2 + "<option value='" + rdo.rdoCode + "'>" + rdo.description + "</option>";
        }
        data2 = data2 + "</select>"
        $('#rdoSelect2').html(data2);
    }
    function clearCheck(id) {
        if (d.getElementById(id).waschecked == true) {
            d.getElementById(id).checked = false;
            d.getElementById(id).waschecked = false;
        }
        else {
            d.getElementById(id).waschecked = true;
        }
    }

    function enableSpouse() {
        d.getElementById("frm1701q:txtSpouseTIN1").disabled = false;
        d.getElementById("frm1701q:txtSpouseTIN2").disabled = false;
        d.getElementById("frm1701q:txtSpouseTIN3").disabled = false;
        d.getElementById("frm1701q:txtSpouseBranchCode").disabled = false;
        d.getElementById('frm1701q:txtSpouseRDOCode').disabled = false;
        d.getElementById('frm1701q:txtSpouseName').disabled = false;
        d.getElementById('frm1701q:txtSpouseCitizenship').disabled = false;
        d.getElementById('frm1701q:txtForeignTaxNumber').disabled = false;
        d.getElementById('frm1701q:optSpouseForeignTaxCred_1').disabled = false;
        d.getElementById('frm1701q:optSpouseForeignTaxCred_2').disabled = false;
        d.getElementById("frm1701q:optSpouseType_1").disabled = false;
        d.getElementById("frm1701q:optSpouseType_2").disabled = false;
        d.getElementById("frm1701q:optSpouseType_3").disabled = false;
        d.getElementById('frm1701q:optSpouseATC_1').disabled = false;
        d.getElementById('frm1701q:optSpouseATC_2').disabled = false;
        d.getElementById('frm1701q:optSpouseATC_3').disabled = false;
        d.getElementById('frm1701q:optSpouseATC_4').disabled = false;
        d.getElementById('frm1701q:optSpouseATC_5').disabled = false;
        d.getElementById('frm1701q:optSpouseATC_6').disabled = false;
        d.getElementById('frm1701q:optSpouseATC_7').disabled = false;
        d.getElementById('frm1701q:optSpouseTaxRate_1').disabled = false;
        d.getElementById('frm1701q:optSpouseTaxRate_2').disabled = false;
        d.getElementById('frm1701q:optSpouseMethod:_1').disabled = false;
        d.getElementById('frm1701q:optSpouseMethod:_2').disabled = false;
        
    }

    function disableSpouse() {
        d.getElementById("frm1701q:txtSpouseTIN1").value = "";
        d.getElementById("frm1701q:txtSpouseTIN2").value = "";
        d.getElementById("frm1701q:txtSpouseTIN3").value = "";
        d.getElementById("frm1701q:txtSpouseBranchCode").value = "00000";
        d.getElementById("frm1701q:txtSpouseRDOCode").value = "";
        d.getElementById('frm1701q:txtSpouseName').value = "";
        d.getElementById('frm1701q:txtSpouseCitizenship').value = "";
        d.getElementById('frm1701q:txtSpouseForeignTaxNum').value = "";
        d.getElementById('frm1701q:optSpouseForeignTaxCred_1').checked = false;
        d.getElementById('frm1701q:optSpouseForeignTaxCred_2').checked = false;
        d.getElementById("frm1701q:txtSpouseTIN1").disabled = true;
        d.getElementById("frm1701q:txtSpouseTIN2").disabled = true;
        d.getElementById("frm1701q:txtSpouseTIN3").disabled = true;
        d.getElementById("frm1701q:txtSpouseBranchCode").disabled = true;
        d.getElementById('frm1701q:txtSpouseRDOCode').disabled = true;
        d.getElementById('frm1701q:txtSpouseName').disabled = true;
        d.getElementById('frm1701q:txtSpouseCitizenship').disabled = true;
        d.getElementById('frm1701q:txtSpouseForeignTaxNum').disabled = true;
        d.getElementById('frm1701q:optSpouseForeignTaxCred_1').disabled = true;
        d.getElementById('frm1701q:optSpouseForeignTaxCred_2').disabled = true;

        for (var i= 1; i< 4; i++) {
            d.getElementById("frm1701q:optSpouseType_"+i).checked = false;
            d.getElementById("frm1701q:optSpouseType_"+i).disabled = true;
        }

        for (var j= 1; j< 8; j++) {
            d.getElementById("frm1701q:optSpouseATC_"+j).checked = false;
            d.getElementById("frm1701q:optSpouseATC_"+j).disabled = true;
        }

        d.getElementById('frm1701q:optSpouseTaxRate_1').checked = false;
        d.getElementById('frm1701q:optSpouseTaxRate_2').checked = false;
        d.getElementById('frm1701q:optSpouseTaxRate_1').disabled = true;
        d.getElementById('frm1701q:optSpouseTaxRate_2').disabled = true;

        d.getElementById('frm1701q:optSpouseMethod:_1').checked = false;
        d.getElementById('frm1701q:optSpouseMethod:_2').checked = false;
        d.getElementById('frm1701q:optSpouseMethod:_1').disabled = true;
        d.getElementById('frm1701q:optSpouseMethod:_2').disabled = true;
    }

    function processAmend() {
         if (d.getElementById('frm1701q:AmendedRtn_1').checked) {
            if (d.getElementById("frm1701q:txtSpouseName").value != "") {
                d.getElementById("frm1701q:txt59A").disabled = false;
                d.getElementById("frm1701q:txt59B").disabled = false;
            } else {
                d.getElementById("frm1701q:txt59A").disabled = false;
                d.getElementById("frm1701q:txt59B").disabled = true;
            }
        } else {
            d.getElementById("frm1701q:txt59A").disabled = true;
            d.getElementById("frm1701q:txt59B").disabled = true;
        } 
    }

    function processTaxType(person) {
        if (person == "taxpayer") {
            for (var i= 1; i< 7; i++) {
                d.getElementById("frm1701q:optATC_" + i).checked = false;
            }
            
            d.getElementById("frm1701q:optTaxRate_1").checked = false;
            d.getElementById("frm1701q:optTaxRate_2").checked = false;
            d.getElementById("frm1701q:optMethodOfDeduction:_1").checked = false;
            d.getElementById("frm1701q:optMethodOfDeduction:_2").checked = false;
            d.getElementById("frm1701q:optMethodOfDeduction:_1").disabled = false;
            d.getElementById("frm1701q:optMethodOfDeduction:_2").disabled = false;

            d.getElementById("frm1701q:txt37A").disabled = true;
            d.getElementById("frm1701q:txt39A").disabled = true;
            d.getElementById("frm1701q:txt37A").value = (0).toFixed(2);
            d.getElementById("frm1701q:txt39A").value = (0).toFixed(2);
            d.getElementById("frm1701q:txt40A").value = (0).toFixed(2);

            computetxt38(person);
            computetxt40(person);
            computetxt41(person);

            //if single proprietor or professional
            if (d.getElementById("frm1701q:optType_1").checked == true || d.getElementById("frm1701q:optType_2").checked == true) {   //single proprietor or professional
                for (var j= 2; j< 7; j++) {
                    d.getElementById("frm1701q:optATC_" + j).disabled = false;
                }
                d.getElementById("frm1701q:optTaxRate_2").disabled = false;

                disableSchedule1(person);
                disableSchedule2(person);

                enableSpouse();

            //if estate or trust
            } else if (d.getElementById("frm1701q:optType_3").checked == true || d.getElementById("frm1701q:optType_4").checked == true) {  //estate or trust
                
                d.getElementById("frm1701q:optATC_1").checked = true;
                for (var j= 2; j< 7; j++) {
                    d.getElementById("frm1701q:optATC_" + j).disabled = true;
                }
                d.getElementById("frm1701q:optTaxRate_1").disabled = false;
                d.getElementById("frm1701q:optTaxRate_1").checked = true;
                d.getElementById("frm1701q:optTaxRate_2").disabled = true;

                enableSchedule1(person);

                disableSpouse();
            }
        }
        else {
            //spouse to do
            for (var i= 1; i< 8; i++) {
                d.getElementById("frm1701q:optSpouseATC_" + i).checked = false;
                d.getElementById("frm1701q:optSpouseATC_" + i).disabled = false;
            }
            
            d.getElementById("frm1701q:optSpouseTaxRate_1").checked = false;
            d.getElementById("frm1701q:optSpouseTaxRate_2").checked = false;
            d.getElementById("frm1701q:optSpouseMethod:_1").checked = false;
            d.getElementById("frm1701q:optSpouseMethod:_2").checked = false;
            d.getElementById("frm1701q:optSpouseTaxRate_1").disabled = false;
            d.getElementById("frm1701q:optSpouseTaxRate_2").disabled = false;
            d.getElementById("frm1701q:optSpouseMethod:_1").disabled = false;
            d.getElementById("frm1701q:optSpouseMethod:_2").disabled = false;

            d.getElementById("frm1701q:txt37B").disabled = true;
            d.getElementById("frm1701q:txt39B").disabled = true;
            d.getElementById("frm1701q:txt37B").value = (0).toFixed(2);
            d.getElementById("frm1701q:txt39B").value = (0).toFixed(2);
            d.getElementById("frm1701q:txt40B").value = (0).toFixed(2);

            computetxt38(person);
            computetxt40(person);
            computetxt41(person);

            disableSchedule1(person);
            disableSchedule2(person);

            for (var j = 55; j < 69; j++) {
                if (j != 59 && j != 62 && j != 63 && j != 67 && j != 68) {
                    d.getElementById("frm1701q:txt" + j + "B").disabled = false;
                } else if (j == 59) {
                    if (d.getElementById("frm1701q:AmendedRtn_1").checked == true)
                        d.getElementById("frm1701q:txt" + j + "B").disabled = false;
                    else
                    d.getElementById("frm1701q:txt" + j + "B").disabled = true;
                }
            }
            
            //if compensation earner
            if (d.getElementById("frm1701q:optSpouseType_3").checked == true) {
                d.getElementById("frm1701q:optSpouseATC_4").checked = true; 

                for (var i= 1; i< 8; i++) {
                    if (i != 4) {
                        d.getElementById("frm1701q:optSpouseATC_" + i).disabled = true;
                    }
                }

                d.getElementById("frm1701q:optSpouseTaxRate_1").checked = false;
                d.getElementById("frm1701q:optSpouseTaxRate_2").checked = false;
                d.getElementById("frm1701q:optSpouseMethod:_1").checked = false;
                d.getElementById("frm1701q:optSpouseMethod:_2").checked = false;
                d.getElementById("frm1701q:optSpouseTaxRate_1").disabled = true;
                d.getElementById("frm1701q:optSpouseTaxRate_2").disabled = true;
                d.getElementById("frm1701q:optSpouseMethod:_1").disabled = true;
                d.getElementById("frm1701q:optSpouseMethod:_2").disabled = true;
            
                for (var j = 55; j < 69; j++) {
                    d.getElementById("frm1701q:txt" + j + "B").value = (0).toFixed(2);
                    d.getElementById("frm1701q:txt" + j + "B").disabled = true;
                }

                computetxt62(person);
                computetxt67(person);

            }
            
            var count = 0;
            //check if selected more than 1
            for (var k=1; k< 4; k++) {
                if (d.getElementById("frm1701q:optSpouseType_" + k).checked == true)
                    count++;
            }

            if (count > 1) {
                d.getElementById("frm1701q:optSpouseATC_3").disabled = false;
                d.getElementById("frm1701q:optSpouseATC_7").disabled = false;
                d.getElementById("frm1701q:optSpouseTaxRate_1").disabled = false;
                d.getElementById("frm1701q:optSpouseTaxRate_2").disabled = false;
            }
        }
    }

    function processATC(person) {
        if (person == "taxpayer") {
            //if II012, II014, II013 and single proprietor, professional
            if ((d.getElementById("frm1701q:optATC_1").checked == true || d.getElementById("frm1701q:optATC_2").checked == true || d.getElementById("frm1701q:optATC_3").checked == true) && (d.getElementById("frm1701q:optType_1").checked == true || d.getElementById("frm1701q:optType_2").checked == true)) {
                d.getElementById("frm1701q:optTaxRate_1").disabled = false;
                d.getElementById("frm1701q:optTaxRate_1").checked = true;
                d.getElementById("frm1701q:optTaxRate_2").disabled = true;

                d.getElementById("frm1701q:optMethodOfDeduction:_1").disabled = false;
                d.getElementById("frm1701q:optMethodOfDeduction:_2").disabled = false;

                enableSchedule1(person);
            //if II012, II014, II013
            } else if (d.getElementById("frm1701q:optATC_1").checked == true || d.getElementById("frm1701q:optATC_2").checked == true || d.getElementById("frm1701q:optATC_3").checked == true) {
                d.getElementById("frm1701q:optTaxRate_1").disabled = false;
                d.getElementById("frm1701q:optTaxRate_1").checked = true;
                d.getElementById("frm1701q:optTaxRate_2").disabled = true;

                d.getElementById("frm1701q:optMethodOfDeduction:_1").disabled = false;
                d.getElementById("frm1701q:optMethodOfDeduction:_2").disabled = false;

                enableSchedule1(person);
            }
            else {
                d.getElementById("frm1701q:optTaxRate_2").disabled = false;
                d.getElementById("frm1701q:optTaxRate_2").checked = true;
                d.getElementById("frm1701q:optTaxRate_1").disabled = true;

                d.getElementById("frm1701q:optMethodOfDeduction:_1").checked = false;
                d.getElementById("frm1701q:optMethodOfDeduction:_2").checked = false;
                d.getElementById("frm1701q:optMethodOfDeduction:_1").disabled = true;
                d.getElementById("frm1701q:optMethodOfDeduction:_2").disabled = true;

                enableSchedule2(person);
            }
        }
        else {
            //if II012, II014, II013
            if (d.getElementById("frm1701q:optSpouseATC_1").checked == true || d.getElementById("frm1701q:optSpouseATC_2").checked == true || d.getElementById("frm1701q:optSpouseATC_3").checked == true) {
                d.getElementById("frm1701q:optSpouseTaxRate_1").disabled = false;
                d.getElementById("frm1701q:optSpouseTaxRate_1").checked = true;
                d.getElementById("frm1701q:optSpouseTaxRate_2").disabled = true;

                d.getElementById("frm1701q:optSpouseMethod:_1").disabled = false;
                d.getElementById("frm1701q:optSpouseMethod:_2").disabled = false;

                enableSchedule1(person);

                for (var j = 55; j < 69; j++) {
                    if (j != 59 && j != 62 && j != 63 && j != 67 && j != 68) {
                        d.getElementById("frm1701q:txt" + j + "B").disabled = false;
                    } else if (j == 59) {
                        if (d.getElementById("frm1701q:AmendedRtn_1").checked == true)
                            d.getElementById("frm1701q:txt" + j + "B").disabled = false;
                        else
                        d.getElementById("frm1701q:txt" + j + "B").disabled = true;
                    }
                }
            //if II015, II017, II016
            } else if (d.getElementById("frm1701q:optSpouseATC_5").checked == true || d.getElementById("frm1701q:optSpouseATC_6").checked == true || d.getElementById("frm1701q:optSpouseATC_7").checked == true) {
                d.getElementById("frm1701q:optSpouseTaxRate_2").disabled = false;
                d.getElementById("frm1701q:optSpouseTaxRate_2").checked = true;
                d.getElementById("frm1701q:optSpouseTaxRate_1").disabled = true;

                d.getElementById("frm1701q:optSpouseMethod:_1").checked = false;
                d.getElementById("frm1701q:optSpouseMethod:_2").checked = false;
                d.getElementById("frm1701q:optSpouseMethod:_1").disabled = true;
                d.getElementById("frm1701q:optSpouseMethod:_2").disabled = true;

                enableSchedule2(person);

                for (var j = 55; j < 69; j++) {
                    if (j != 59 && j != 62 && j != 63 && j != 67 && j != 68) {
                        d.getElementById("frm1701q:txt" + j + "B").disabled = false;
                    } else if (j == 59) {
                        if (d.getElementById("frm1701q:AmendedRtn_1").checked == true)
                            d.getElementById("frm1701q:txt" + j + "B").disabled = false;
                        else
                        d.getElementById("frm1701q:txt" + j + "B").disabled = true;
                    }
                }
            }
            else {
                //II011
                d.getElementById("frm1701q:optSpouseTaxRate_1").checked = false;
                d.getElementById("frm1701q:optSpouseTaxRate_2").checked = false;
                d.getElementById("frm1701q:optSpouseTaxRate_1").disabled = true;
                d.getElementById("frm1701q:optSpouseTaxRate_2").disabled = true;

                d.getElementById("frm1701q:optSpouseMethod:_1").disabled = true;
                d.getElementById("frm1701q:optSpouseMethod:_2").disabled = true;

                disableSchedule1(person);
                disableSchedule2(person);

                for (var j = 55; j < 69; j++) {
                    d.getElementById("frm1701q:txt" + j + "B").value = (0).toFixed(2);
                    d.getElementById("frm1701q:txt" + j + "B").disabled = true;
                }

                computetxt62(person);
                computetxt67(person);
            }
        }
    }

    function enableSchedule1(person) {

        d.getElementById("frm1701q:txt43Desc").disabled = false;

        if (person == "taxpayer") {

            d.getElementById("frm1701q:optMethodOfDeduction:_1").checked = false;
            d.getElementById("frm1701q:optMethodOfDeduction:_2").checked = false;
            d.getElementById("frm1701q:optMethodOfDeduction:_1").disabled = false;
            d.getElementById("frm1701q:optMethodOfDeduction:_2").disabled = false;

            for(var i=36; i<45; i++) {
                if (i != 38 && i != 40 && i != 41) {
                    d.getElementById("frm1701q:txt" + i + "A").disabled = false;
                    
                    if ((i == 37 || i == 39) && d.getElementById("frm1701q:optMethodOfDeduction:_1").checked == false) {
                        d.getElementById("frm1701q:txt" + i + "A").disabled = true;
                    }
                }
            }
        }
        else {
            d.getElementById("frm1701q:optSpouseMethod:_1").checked = false;
            d.getElementById("frm1701q:optSpouseMethod:_2").checked = false;
            d.getElementById("frm1701q:optSpouseMethod:_1").disabled = false;
            d.getElementById("frm1701q:optSpouseMethod:_2").disabled = false;

            for(var i=36; i<45; i++) {
                if (i != 38 && i != 40 && i != 41) {
                    d.getElementById("frm1701q:txt" + i + "B").disabled = false;

                    if ((i == 37 || i == 39) && d.getElementById("frm1701q:optMethodOfDeduction:_1").checked == false) {
                        d.getElementById("frm1701q:txt" + i + "B").disabled = true;
                    }
                }
            }
        }

        disableSchedule2(person);
        computetxt63(person);
    }

    function disableSchedule1(person) {
        if (person == "taxpayer") {
            for(var i=36; i<47; i++) {
                if (i != 38 && i != 40 && i != 41 && i != 45 && i != 46) {
                    d.getElementById("frm1701q:txt" + i + "A").disabled = true;
                }
                d.getElementById("frm1701q:txt" + i + "A").value = (0).toFixed(2);
            }
        }
        else {
            for(var i=36; i<47; i++) {
                if (i != 38 && i != 40 && i != 41 && i != 45 && i != 46) {
                    d.getElementById("frm1701q:txt" + i + "B").disabled = true;
                }
                d.getElementById("frm1701q:txt" + i + "B").value = (0).toFixed(2);
            }
        }

        d.getElementById("frm1701q:txt43Desc").disabled = true;
        d.getElementById("frm1701q:txt43Desc").value = "";
    }

    function enableSchedule2(person) {
        d.getElementById("frm1701q:txt48Desc").disabled = false;

        if (person == "taxpayer") {
            d.getElementById("frm1701q:optMethodOfDeduction:_1").checked = false;
            d.getElementById("frm1701q:optMethodOfDeduction:_2").checked = false;
            d.getElementById("frm1701q:optMethodOfDeduction:_1").disabled = true;
            d.getElementById("frm1701q:optMethodOfDeduction:_2").disabled = true;
            
            for(var i=47; i<53; i++) {
                if (i != 49 && i != 51) {
                    d.getElementById("frm1701q:txt" + i + "A").disabled = false;
                }
            }

            if (d.getElementById("frm1701q:optATC_6").checked == true) {
                d.getElementById("frm1701q:txt52A").value = "0.00";
                d.getElementById("frm1701q:txt52A").disabled = true;

                computetxt53(person);
            }
        }
        else {
            d.getElementById("frm1701q:optSpouseMethod:_1").checked = false;
            d.getElementById("frm1701q:optSpouseMethod:_2").checked = false;
            d.getElementById("frm1701q:optSpouseMethod:_1").disabled = true;
            d.getElementById("frm1701q:optSpouseMethod:_2").disabled = true;

            for(var i=47; i<53; i++) {
                if (i != 49 && i != 51) {
                    d.getElementById("frm1701q:txt" + i + "B").disabled = false;
                }
            }

            if (d.getElementById("frm1701q:optSpouseATC_7").checked == true && d.getElementById("frm1701q:optSpouseType_3").checked == false) {
                d.getElementById("frm1701q:txt52B").value = "0.00";
                d.getElementById("frm1701q:txt52B").disabled = true;

                computetxt53(person);
            }
        }

        disableSchedule1(person);
        computetxt63(person);
    }

    function disableSchedule2(person) {
        if (person == "taxpayer") {
            

            for(var i=47; i<55; i++) {
                if (i != 49 && i != 51 && i != 53 && i != 54) {
                    d.getElementById("frm1701q:txt" + i + "A").disabled = true;
                }
                d.getElementById("frm1701q:txt" + i + "A").value = (0).toFixed(2);
            }
        }
        else {
            for(var i=47; i<55; i++) {
                if (i != 49 && i != 51 && i != 53 && i != 54) {
                    d.getElementById("frm1701q:txt" + i + "B").disabled = true;
                }
                d.getElementById("frm1701q:txt" + i + "B").value = (0).toFixed(2);
            }
        }

        d.getElementById("frm1701q:txt48Desc").disabled = true;
        d.getElementById("frm1701q:txt48Desc").value = "";
    }

    function ItemizedDeduct() {
        if (d.getElementById("frm1701q:optMethodOfDeduction:_1").checked == true) {
            if (d.getElementById("frm1701q:optTaxRate_1").checked == true) {
                d.getElementById("frm1701q:txt37A").disabled = false;
                d.getElementById("frm1701q:txt39A").disabled = false;
                d.getElementById("frm1701q:txt40A").value = (0).toFixed(2);

                computetxt41("taxpayer");
            }
        }
    }

    function OptionalDeduct() {
        // disabled then compute less  deduction
        if (d.getElementById("frm1701q:optMethodOfDeduction:_2").checked == true) {
            d.getElementById("frm1701q:txt37A").disabled = true;
            d.getElementById("frm1701q:txt39A").disabled = true;
            d.getElementById("frm1701q:txt37A").value = (0).toFixed(2);
            d.getElementById("frm1701q:txt39A").value = (0).toFixed(2);

            computetxt38("taxpayer");
            computetxt40("taxpayer");
        }
    }

    function ItemizedDeductSpouse() {
        if (d.getElementById("frm1701q:optSpouseMethod:_1").checked == true) {
            if (d.getElementById("frm1701q:optSpouseTaxRate_1").checked == true) {
                d.getElementById("frm1701q:txt37B").disabled = false;
                d.getElementById("frm1701q:txt39B").disabled = false;
                d.getElementById("frm1701q:txt40B").value = (0).toFixed(2);

                computetxt41("taxspouse");
            }
        }
    }

    function OptionalDeductSpouse() {
        // disabled then compute less  deduction
        if (d.getElementById("frm1701q:optSpouseMethod:_2").checked == true) {
            d.getElementById("frm1701q:txt37B").disabled = true;
            d.getElementById("frm1701q:txt39B").disabled = true;
            d.getElementById("frm1701q:txt37B").value = (0).toFixed(2);
            d.getElementById("frm1701q:txt39B").value = (0).toFixed(2);

            computetxt40("taxspouse");
            computetxt38("taxspouse");
        }
    }

    /*-----Computations-----*/
    function computePartIII(person) {
        computetxt26(person);

        if (person == "taxpayer") {
            d.getElementById("frm1701q:txt27A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt62A").value)).toFixed(2));
            d.getElementById("frm1701q:txt28A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt26A").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt27A").value) * 1).toFixed(2));
            d.getElementById("frm1701q:txt29A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt67A").value)).toFixed(2));
            d.getElementById("frm1701q:txt30A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt28A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt29A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById("frm1701q:txt27B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt62B").value)).toFixed(2));
            d.getElementById("frm1701q:txt28B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt26B").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt27B").value) * 1).toFixed(2));
            d.getElementById("frm1701q:txt29B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt67B").value)).toFixed(2));
            d.getElementById("frm1701q:txt30B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt28B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt29B").value) * 1).toFixed(2));         
        }
        computetxt31(person);
    }

    function computetxt26(person) {
        if (person == "taxpayer") {
            if (d.getElementById("frm1701q:optTaxRate_1").checked == true) {
                d.getElementById("frm1701q:txt26A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt46A").value)).toFixed(2));
            }
            else {
                d.getElementById("frm1701q:txt26A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt54A").value)).toFixed(2));
            }
        } else if (person == "taxspouse") {
            if (d.getElementById("frm1701q:optSpouseTaxRate_1").checked == true) {
                d.getElementById("frm1701q:txt26B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt46B").value)).toFixed(2));
            }
            else {
                d.getElementById("frm1701q:txt26B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt54B").value)).toFixed(2));
            }
        }
    }

    function computetxt31() {
        d.getElementById("frm1701q:txt31").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt30A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt30B").value) * 1).toFixed(2));
        capital();
    }

    function computetxt38(person) {
        if (person == "taxpayer") {
            d.getElementById("frm1701q:txt38A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt36A").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt37A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById("frm1701q:txt38B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt36B").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt37B").value) * 1).toFixed(2));
        }
        computetxt41(person);
    }

    function computetxt40(person) {
        if (d.getElementById("frm1701q:optMethodOfDeduction:_2").checked == true || d.getElementById("frm1701q:optSpouseMethod:_2").checked == true) {
            if (person == "taxpayer") {
                d.getElementById("frm1701q:txt40A").value = formatCurrency((parseFloat(NumWithComma(d.getElementById("frm1701q:txt36A").value)) * 40 / 100).toFixed(2));
            } else if (person == "taxspouse") {
                d.getElementById("frm1701q:txt40B").value = formatCurrency((parseFloat(NumWithComma(d.getElementById("frm1701q:txt36B").value)) * 40 / 100).toFixed(2));
            }
            computetxt41(person);
        }
    }

    function computetxt41(person) {
        if (person == "taxpayer") {
            if (d.getElementById("frm1701q:optMethodOfDeduction:_1").checked == true) {
                d.getElementById("frm1701q:txt41A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt38A").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt39A").value) * 1).toFixed(2));
            }
            else {
                d.getElementById("frm1701q:txt41A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt38A").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt40A").value) * 1).toFixed(2));
            }
        } else if (person == "taxspouse") {
            if (d.getElementById("frm1701q:optSpouseMethod:_1").checked == true) {
                d.getElementById("frm1701q:txt41B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt38B").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt39B").value) * 1).toFixed(2));
            }
            else {
                d.getElementById("frm1701q:txt41B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt38B").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt40B").value) * 1).toFixed(2));
            }
        }
        computetxt45(person);
    }

    function computetxt45(person) {
        if (person == "taxpayer") {
            d.getElementById("frm1701q:txt45A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt41A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt42A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt43A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt44A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById("frm1701q:txt45B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt41B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt42B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt43B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt44B").value) * 1).toFixed(2));
        }
        computetxt46(person);
    }

    function computetxt46(person) {
        if (d.getElementById("frm1701q:txtYear").value >= 2018 && d.getElementById("frm1701q:txtYear").value <= 2022) {
            if (person == "taxpayer") {
                var v45a = NumWithComma(d.getElementById("frm1701q:txt45A").value) * 1;
                var total = 0.0;
                if (v45a <= 0) {
                    total = 0;
                } else if (v45a <= 250000) {
                    total = (0).toFixed(2);
                } else if (v45a > 250000 && v45a <= 400000) {
                    total = ((v45a - 250000) * (20 / 100)).toFixed(2);
                } else if (v45a > 400000 && v45a <= 800000) {
                    total = ((v45a - 400000) * (25 / 100) + 30000).toFixed(2);
                } else if (v45a > 800000 && v45a <= 2000000) {
                    total = ((v45a - 800000) * (30 / 100) + 130000).toFixed(2);
                } else if (v45a > 2000000 && v45a <= 8000000) {
                    total = ((v45a - 2000000) * (32 / 100) + 490000).toFixed(2);
                } else if (v45a > 8000000) {
                    total = ((v45a - 8000000) * (35 / 100) + 2410000).toFixed(2);
                }

                d.getElementById("frm1701q:txt46A").value = formatCurrency(total);
            } else if (person == "taxspouse") {
                var v45b = NumWithComma(d.getElementById("frm1701q:txt45B").value) * 1;
                var total = 0.0;
                if (v45b <= 0) {
                    total = 0;
                } else if (v45b <= 250000) {
                    total = (0).toFixed(2);
                } else if (v45b > 250000 && v45b <= 400000) {
                    total = ((v45b - 250000) * (20 / 100)).toFixed(2);
                } else if (v45b > 400000 && v45b <= 800000) {
                    total = ((v45b - 400000) * (25 / 100) + 30000).toFixed(2);
                } else if (v45b > 800000 && v45b <= 2000000) {
                    total = ((v45b - 800000) * (30 / 100) + 130000).toFixed(2);
                } else if (v45b > 2000000 && v45b <= 8000000) {
                    total = ((v45b - 2000000) * (32 / 100) + 490000).toFixed(2);
                } else if (v45b > 8000000) {
                    total = ((v45b - 8000000) * (35 / 100) + 2410000).toFixed(2);
                }

                d.getElementById("frm1701q:txt46B").value = formatCurrency(total);
            }
        }
        else if (d.getElementById("frm1701q:txtYear").value > 2022) {
            if (person == "taxpayer") {
                var v45a = NumWithComma(d.getElementById("frm1701q:txt45A").value) * 1;
                var total = 0.0;
                if (v45a <= 0) {
                    total = 0;
                } else if (v45a <= 250000) {
                    total = (0).toFixed(2);
                } else if (v45a > 250000 && v45a <= 400000) {
                    total = ((v45a - 250000) * (15 / 100)).toFixed(2);
                } else if (v45a > 400000 && v45a <= 800000) {
                    total = ((v45a - 400000) * (20 / 100) + 22500).toFixed(2);
                } else if (v45a > 800000 && v45a <= 2000000) {
                    total = ((v45a - 800000) * (25 / 100) + 102500).toFixed(2);
                } else if (v45a > 2000000 && v45a <= 8000000) {
                    total = ((v45a - 2000000) * (30 / 100) + 402500).toFixed(2);
                } else if (v45a > 8000000) {
                    total = ((v45a - 8000000) * (35 / 100) + 2202500).toFixed(2);
                }

                d.getElementById("frm1701q:txt46A").value = formatCurrency(total);
            } else if (person == "taxspouse") {
                var v45b = NumWithComma(d.getElementById("frm1701q:txt45B").value) * 1;
                var total = 0.0;
                if (v45b <= 0) {
                    total = 0;
                } else if (v45b <= 250000) {
                    total = (0).toFixed(2);
                } else if (v45b > 250000 && v45b <= 400000) {
                    total = ((v45b - 250000) * (15 / 100)).toFixed(2);
                } else if (v45b > 400000 && v45b <= 800000) {
                    total = ((v45b - 400000) * (20 / 100) + 22500).toFixed(2);
                } else if (v45b > 800000 && v45b <= 2000000) {
                    total = ((v45b - 800000) * (25 / 100) + 102500).toFixed(2);
                } else if (v45b > 2000000 && v45b <= 8000000) {
                    total = ((v45b - 2000000) * (30 / 100) + 402500).toFixed(2);
                } else if (v45b > 8000000) {
                    total = ((v45b - 8000000) * (35 / 100) + 2202500).toFixed(2);
                }

                d.getElementById("frm1701q:txt46B").value = formatCurrency(total);
            }
        }
        else if (d.getElementById("frm1701q:txtYear").value < 2018) {
            if (person == "taxpayer") {
                var v45a = NumWithComma(d.getElementById("frm1701q:txt45A").value) * 1;
                var total = 0.0;
                if (v45a <= 0) {
                    total = 0;
                } else if (v45a < 10000) {
                    total = (v45a * (5 / 100)).toFixed(2);
                } else if (v45a >= 10000 && v45a < 30000) {
                    total = ((v45a - 10000) * (10 / 100) + 500).toFixed(2);
                } else if (v45a >= 30000 && v45a < 70000) {
                    total = ((v45a - 30000) * (15 / 100) + 2500).toFixed(2);
                } else if (v45a >= 70000 && v45a < 140000) {
                    total = ((v45a - 70000) * (20 / 100) + 8500).toFixed(2);
                } else if (v45a >= 140000 && v45a < 250000) {
                    total = ((v45a - 140000) * (25 / 100) + 22500).toFixed(2);
                } else if (v45a >= 250000 && v45a < 500000) {
                    total = ((v45a - 250000) * (30 / 100) + 50000).toFixed(2);
                } else if (v45a >= 500000) {
                    total = ((v45a - 500000) * (32 / 100) + 125000).toFixed(2);
                }

                d.getElementById("frm1701q:txt46A").value = formatCurrency(total);
            } else if (person == "taxspouse") {
                var v45b = NumWithComma(d.getElementById("frm1701q:txt45B").value) * 1;
                var total = 0.0;
                if (v45b <= 0) {
                    total = 0;
                } else if (v45b < 10000) {
                    total = (v45b * (5 / 100)).toFixed(2);
                } else if (v45b >= 10000 && v45b < 30000) {
                    total = ((v45b - 10000) * (10 / 100) + 500).toFixed(2);
                } else if (v45b >= 30000 && v45b < 70000) {
                    total = ((v45b - 30000) * (15 / 100) + 2500).toFixed(2);
                } else if (v45b >= 70000 && v45b < 140000) {
                    total = ((v45b - 70000) * (20 / 100) + 8500).toFixed(2);
                } else if (v45b >= 140000 && v45b < 250000) {
                    total = ((v45b - 140000) * (25 / 100) + 22500).toFixed(2);
                } else if (v45b >= 250000 && v45b < 500000) {
                    total = ((v45b - 250000) * (30 / 100) + 50000).toFixed(2);
                } else if (v45b >= 500000) {
                    total = ((v45b - 500000) * (32 / 100) + 125000).toFixed(2);
                }
                d.getElementById("frm1701q:txt46B").value = formatCurrency(total);
            }
        }
        
        computetxt63(person);
    }

    function computetxt49(person) {
        if (person == "taxpayer") {
            d.getElementById("frm1701q:txt49A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt47A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt48A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById("frm1701q:txt49B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt47B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt48B").value) * 1).toFixed(2));
        }
        computetxt51(person);
    }

    function computetxt51(person) {
        if (person == "taxpayer") {
            d.getElementById("frm1701q:txt51A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt49A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt50A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById("frm1701q:txt51B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt49B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt50B").value) * 1).toFixed(2));
        }
        computetxt53(person);
    }

    function computetxt53(person) {
        if (person == "taxpayer") {
            d.getElementById("frm1701q:txt53A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt51A").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt52A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById("frm1701q:txt53B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt51B").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt52B").value) * 1).toFixed(2));
        }
        computetxt54(person);
    }

    function computetxt54(person) {
        if (person == "taxpayer") {
            d.getElementById("frm1701q:txt54A").value = formatCurrency((parseFloat(NumWithComma(d.getElementById("frm1701q:txt53A").value)) * 8 / 100).toFixed(2));

            if (NumWithComma(d.getElementById("frm1701q:txt54A").value) < 0) {
                d.getElementById("frm1701q:txt54A").value = (0).toFixed(2);
            }
        } else if (person == "taxspouse") {
            d.getElementById("frm1701q:txt54B").value = formatCurrency((parseFloat(NumWithComma(d.getElementById("frm1701q:txt53B").value)) * 8 / 100).toFixed(2));

            if (NumWithComma(d.getElementById("frm1701q:txt54B").value) < 0) {
                d.getElementById("frm1701q:txt54B").value = (0).toFixed(2);
            }
        }
        computetxt63(person);
    }

    function computetxt62(person) {
        if (person == "taxpayer") {
            d.getElementById("frm1701q:txt62A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt55A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt56A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt57A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt58A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt59A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt60A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt61A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById("frm1701q:txt62B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt55B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt56B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt57B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt58B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt59B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt60B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt61B").value) * 1).toFixed(2));
        }
        computetxt63(person);
    }

    function computetxt63(person) {
        if (person == "taxpayer") {
            if (d.getElementById("frm1701q:optTaxRate_1").checked == true) {
                d.getElementById("frm1701q:txt63A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt46A").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt62A").value) * 1).toFixed(2));
            }
            else {
                d.getElementById("frm1701q:txt63A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt54A").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt62A").value) * 1).toFixed(2));
            }
        } else if (person == "taxspouse") {
            if (d.getElementById("frm1701q:optSpouseTaxRate_1").checked == true) {
                d.getElementById("frm1701q:txt63B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt46B").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt62B").value) * 1).toFixed(2));
            }
            else {
                d.getElementById("frm1701q:txt63B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt54B").value) * 1 - NumWithComma(d.getElementById("frm1701q:txt62B").value) * 1).toFixed(2));
            }
        }
        computetxt68(person);
    }

    function computetxt67(person) {
        if (person == "taxpayer") {
            d.getElementById("frm1701q:txt67A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt64A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt65A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt66A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById("frm1701q:txt67B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt64B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt65B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt66B").value) * 1).toFixed(2));
        }
        computetxt68(person);
    }

    function computetxt68(person) {
        if (person == "taxpayer") {
            d.getElementById("frm1701q:txt68A").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt63A").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt67A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById("frm1701q:txt68B").value = formatCurrency((NumWithComma(d.getElementById("frm1701q:txt63B").value) * 1 + NumWithComma(d.getElementById("frm1701q:txt67B").value) * 1).toFixed(2));
        }
        computePartIII(person);
    }
    /*-----END-----*/

    function validateMonthDayYearDate(dateID) {
        strmmddyyyy = dateID;

        if (strmmddyyyy != "") {
            var result = strmmddyyyy.split("/");
            var isLeap = new Date(result[2], 1, 29).getMonth() == 1;
            var month31 = (['01', '03', '05', '07', '08', '10', '12']);
            var month30 = (['04', '06', '09', '11']);
            var month = result[0];
            var day = result[1];
            if (result.length == 3) {
                if (isNaN(result[0] || result[1] || result[2])) {
                    return true;
                }
                else if ((result[0].length != 2 || (result[0] > 12 || result[0] < 0))) {
                    // numeric check if greater not than 31 - Month.
                    return true;
                }
                else if (result[1].length != 2 || (result[1] > 31 || result[1] < 1)) {
                    // numeric check if Date.
                    return true;
                }
                else if (result[2].length != 4) {
                    return true;
                }
                else if (month == 2) {
                    if (!isLeap && day == 29) {
                        return true;
                    }
                    else if (!isLeap && day > 29) {
                        return true;
                    }
                    else if (isLeap && day > 29) {
                        return true;
                    }
                }
                else if (month31.contains(month) && day > 31) {
                    return true;
                }
                else if (month30.contains(month) && day > 30) {
                    return true;
                }
            } else {
                return true;
            }
        }
    }

    function initialValidateBeforeSave() {
        if (d.getElementById('frm1701q:DateQuarter_1').checked == false && d.getElementById('frm1701q:DateQuarter_2').checked == false && d.getElementById('frm1701q:DateQuarter_3').checked == false) {
            alert("Please select quarter in Item 2.");
            return false;
        }
        if ((d.getElementById('frm1701q:txtTIN1').value == "" || d.getElementById('frm1701q:txtTIN2').value == "" || d.getElementById('frm1701q:txtTIN3').value == "" || d.getElementById('frm1701q:txtBranchCode').value == "")) {
            alert("Please enter a valid TIN number on Item 5.");
            return false;
        }
        if ((d.getElementById('frm1701q:txtTaxpayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 9.");
            return false;
        }
        return true;
    }

    function goToPage() {

        var newVal = document.getElementById("frm1701q:txtCurrentPage").value;
        //var printType = !isFromPrint ? "Page" : "Print";
        var printType = "Page";

        if ((newVal <= MaxPage) && (newVal > 0) && (newVal !== currentPage.toString())) {
            $('#' + printType + currentPage + 'Content').hide('blind');
            $('#' + printType + newVal + 'Content').show('blind');
            currentPage = (document.getElementById("frm1701q:txtCurrentPage").value) * 1;
        }
        else if ((newVal > MaxPage) || (newVal <= 0)) {
            alert("Invalid page");

            document.getElementById("frm1701q:txtCurrentPage").value = currentPage;
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
            if(currentPage == '2'){
                $('.footer1701Q').hide();
            }else if(currentPage == '1'){
                $('.footer1701Q').show();
            }
            document.getElementById('frm1701q:txtCurrentPage').value = currentPage;

        }
    }
    function processNext() {
        if (currentPage == MaxPage) {
        //          $('#Page4Content').show('blind');
        //          $('#Page1Content').hide('blind');
        //          $('#Page2Content').hide('blind');
        //          $('#Page3Content').hide('blind');
        }
        else {
        currentPage++;
        $('#Page' + currentPage + 'Content').show('blind');
        $('#Page' + (currentPage - 1) + 'Content').hide('blind');
        if(currentPage == '2'){
            $('.footer1701Q').hide();
        }else if(currentPage == '1'){
            $('.footer1701Q').show();
        }
        document.getElementById('frm1701q:txtCurrentPage').value = currentPage;
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
    var isFromPrint = false;
    function printme() {

        $('#bg').hide();
        $('.printSignFooterClass').css({ 'width': '94%', 'margin': 'auto', 'margin-top': '15px', 'display': 'block', 'position': 'relative', 'overflow': 'visible', 'page-break-before': 'always' });
        $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
        
        $('#formPaper').css({ 'max-width': '8.3in !important'});
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
                    document.getElementById(elem[i].id).style.backgroundColor = '#FFFFFF';
                    document.getElementById(elem[i].id).style.color = '#000000';
                    document.getElementById(elem[i].id).style.fontSize = "8px";
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
                    var label = "<span class='labels'>".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</span>");
                    $(elem[i]).after(label);
                }
            }
        }

        var activePage = document.getElementById('frm1701q:txtCurrentPage').value;

        $('#Page1Content').show();
        $('#Page2Content').show();

        $("#Page1Content").css({'background': '#FFFFFF','border': '3px solid #000','margin-top': '-80px',});
        $("#Page2Content").css({ 'margin-top': '50px', 'border': '3px solid #000' });

        $("#formPaper").css({'border': '1px solid #fff' });
        $('.printButtonClass').hide();
        $("#formPaper").show();

        window.print();

        $("#Page"+activePage+"Content").css({ 'border': 'none' });

        $("#Page1Content").css({ 'margin-top': '0px','background': '#FFFFFF','border': 'none'});
        $("#Page2Content").css({ 'margin-top': '0px', 'border': 'none' });

        $('.printButtonClass').show();
        
        if(activePage == "1"){
            $('#Page1Content').show();
            $('#Page2Content').hide();
        }else {
            $('#Page1Content').hide();
            $('#Page2Content').show();
        }

        for (var i = 0; i < elem.length; i++) {
            if (elem[i].type != 'hidden') { // && elem[i].type != 'undefined' 
                if (elem[i].type == 'text') {
                    
                    document.getElementById(elem[i].id).style.height = "18px";
                    document.getElementById(elem[i].id).style.fontSize = "11px";
                }
                
            }
        }

        $('#printMenu').show('blind');
        if ($('#formMenu').css('display') != 'none') {
            $('#formMenu').hide('blind');
        }

        isFromPrint = true;
        document.getElementById('frm1701q:txtCurrentPage').disabled = false;
        document.getElementById('frm1701q:txtCurrentPage').readOnly = false;
    }

    function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                console.log(form.serializeArray());
                var data = form.serialize();
                save('1701Qv2018',data);
                
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
        saveAndExit('1701Qv2018',data);
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

        submitAndSave('1701Qv2018', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1701Qv2018';
    }

</script>

@endsection