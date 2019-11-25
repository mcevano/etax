@extends('layouts.app')
@section('title', '| BIR Form No. 2000v2018')
@section('content')

<div class="loader"></div>
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
        <button type="button" class="btn btn-danger btn-exit" id="2000v2018" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="2000v2018" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='2000v2018' company='{{$company->id}}'>Okay</button>
        </div>
    </div>
  </div>
</div>

<form id="frmMain" name="frmMain">
 @csrf
        <input type="hidden" name="company" value="{{ $company->id }}">
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
                                                <label face="Arial" size="1px">BIR Form No.</label>
                                                <br/><font size="5px" style="font-weight:bold;">2000</font>
                                                <br/><label face="Arial" size="1px">January 2018 (ENCS)</label>
                                                <br/><label face="Arial" size="1px" style="font-weight:bold;">Page 1</label>
                                            </td>
                                            <td width="0" valign="center" style="text-align: center;">
                                                <font size="5px" style="font-weight:bold;">Monthly Documentary Stamp</font>
                                                <br/><font size="5px" style="font-weight:bold;">Tax Declaration/Return</font>
                                                <br><label face="Arial" size="1px">Enter all required information in CAPITAL LETTERS using BLACK ink. Mark all applicable boxes with an "X". Two copies MUST be filed with the BIR and one held by the Tax Filer.</label>
                                            </td>
                                            <td width="200" valign="center">
                                                    <p><img class="barcodes" src="{{ asset('images/Bar Codes/2000_p1.png') }}" width="220" height="75px" /> </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="300" valign="top" class="tblFormTd">
                                                <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</label></td>
                                                        <td width="150"><font size="1" style="font-size: 11px;">For the month of (MM/YYY) </label></td>
                                                        <td width="40">
                                                        <font color="black" face="Arial" size="2">
                                                            <select id="frm2000:txtMonth" name="frm2000:txtMonth" size="1">
                                                                <option value="00"></option>
                                                                <option value="01">01</option>
                                                                <option value="02">02</option>
                                                                <option value="03">03</option>
                                                                <option value="04">04</option>
                                                                <option value="05">05</option>
                                                                <option value="06">06</option>
                                                                <option value="07">07</option>
                                                                <option value="08">08</option>
                                                                <option value="09">09</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                        </font>
                                                        <td width="82" align="left"> <input type="text" value="" size="4" name="frm2000:txtYear" maxlength="4" id="frm2000:txtYear" style="width:61px" onblur="blockletterWithout2Decimal(this);" onkeypress="return wholenumber(this, event)" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="250" valign="top" class="tblFormTd">
                                                <table width="250" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</label></td>
                                                        <td><font size="1" style="font-size: 11px;">Amended Return?</label></td>
                                                        <td width="127">
                                                            <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><input type="radio" value="Y" name="frm2000:AmendedRtn" id="frm2000:AmendedRtn_1" onclick="processAmended();" /><label for="frm2000:AmendedRtn_1" style="font-size:11px;" >Yes</label></td>
                                                                        <td><input type="radio" value="N"  name="frm2000:AmendedRtn" id="frm2000:AmendedRtn_2" onclick="processAmended();" checked /><label for="frm2000:AmendedRtn_2" style="font-size:11px;" >No</label></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="250" valign="top" class="tblFormTd">
                                                <table width="250" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</label></td>
                                                        
                                                        <td><font size="1" style="font-size: 11px;">No. of Sheet/s Attached</label></td>
                                                        <td><input type="text" value="0" style="text-align: right;" size="4" name="frm2000:txtSheets" maxlength="2" id="frm2000:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
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
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;4&nbsp;&nbsp;&nbsp;</label></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">Taxpayer Identification Number (TIN)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->tin1}}" size="3" name="frm2000:txtTIN1" maxlength="3" id="frm2000:txtTIN1" onkeypress="return wholenumber(this, event)" disabled />&nbsp;-&nbsp;
                                                                <input type="text" value="{{$company->tin2}}" size="3" name="frm2000:txtTIN2" maxlength="3" id="frm2000:txtTIN2" onkeypress="return wholenumber(this, event)" disabled />&nbsp;-&nbsp;
                                                                <input type="text" value="{{$company->tin3}}" size="3" name="frm2000:txtTIN3" maxlength="3" id="frm2000:txtTIN3" onkeypress="return wholenumber(this, event)" disabled />&nbsp;-&nbsp;
                                                                <input type="text" value="{{$company->tin4}}" size="5" name="frm2000:txtBranchCode" maxlength="5" id="frm2000:txtBranchCode" onkeypress="return letternumber(event)" disabled />
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="150" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="80"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;&nbsp;&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</label></td>
                                                        <td id="rdoSelect">
                                                            <select class='iceSelOneMnu' id='frm2000:txtRDOCode' name='frm2000:txtRDOCode' size='1' disabled>
                                                            <option value='{{$company->rdo_code}}' >{{$company->rdo_code}}</option>
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
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;6&nbsp;&nbsp;&nbsp;</label></td>
                                                                    <td><font size="1" style="font-size: 11px;">Taxpayer's Name <i>(Last Name, First Name, Middle Name for Individual OR Registered Name for Non-Individual)</i></label></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->registered_name}}" size="120" name="frm2000:txtTaxpayerName" maxlength="50" id="frm2000:txtTaxpayerName" onblur="return capital(this, event)" disabled /></td>
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
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;7&nbsp;&nbsp;&nbsp;</label></td>
                                                                    <td><font size="1" style="font-size: 11px;">Registered Address </font><font style="font-size:8px"><i>(Indicate complete address. If branch, indicate the branch address. If the registered address is different from the current address, go to the RDO to update registered address by using BIR Form No. 1905)</i></label></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->address}}" size="120" name="frm2000:txtAddress" maxlength="100" id="frm2000:txtAddress" onblur="return capital(this, event)" disabled /></td>
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
                                                                <input type="text" value="" size="100" name="frm2000:txtAddress2" maxlength="50" id="frm2000:txtAddress2" onblur="return capital(this, event)" disabled="true" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="140" class="tblFormTd">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <font size="2" style="font-weight:bold;">&nbsp;7A&nbsp;&nbsp;&nbsp;</font><font size="1" style="font-size: 11px;">Zip
                                                                Code</font>
                                                        </td>
                                                        <td>
                                                            <div align="center">
                                                                <input type="text" value="{{$company->zip_code}}" size="2" name="frm2000:txtZipCode" maxlength="12" id="frm2000:txtZipCode" onkeypress="return wholenumber(this, event)" disabled="true" />
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
                                            <td width="30%" class="tblFormTd">
                                                <table width="200" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;&nbsp;&nbsp;</label></td>
                                                        <td width="170">
                                                            <font size="1" style="font-size: 11px;">Contact Number </font><font style="font-size:11px"><i>(Landline/Cellphone No.)</i></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td>
                                                            <input type="text" value="{{$company->tel_number}}" size="20" name="frm2000:txtTelNum" maxlength="20" id="frm2000:txtTelNum" onkeypress="return wholenumber(this, event)" disabled />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="70%" class="tblFormTd">
                                                <table width="550" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;&nbsp;&nbsp;</label></td>
                                                        <td width="200">
                                                            <font size="1" style="font-size: 11px;">Email Address</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td>
                                                            <input type="text" value="{{$company->email_address}}" size="78" name="txtEmail" maxlength="60" id="txtEmail" disabled />
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
                                    <table width="800" border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                        <tr>
                                            <td width="800"  class="tblFormTd">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="200">
                                                            <font size="2" style="font-weight:bold;">&nbsp;10&nbsp;&nbsp;&nbsp;</font><font size="1" style="font-size: 11px;">Other Party to the transaction </font>
                                                        </td>
                                                        <td width="200">
                                                            <input type="radio" value="Creditor"  name="frm2000:optParty" id="frm2000:optParty_1" onclick="processOtherParty()" />
                                                                <label for="frm2000:optParty_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Creditor/Mortgagor/etc. </label>&nbsp;
                                                        </td>
                                                        <td width="200">
                                                            <input type="radio" value="Debtor"  name="frm2000:optParty" id="frm2000:optParty_2" onclick="processOtherParty()" />
                                                                <label for="frm2000:optParty_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Debtor/Mortgagee/etc. </label>&nbsp;
                                                        </td>
                                                        <td width="200">
                                                            <input type="radio" value="None"  name="frm2000:optParty" id="frm2000:optParty_3" onclick="processOtherParty()" />
                                                                <label for="frm2000:optParty_3" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >None </label>&nbsp;
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
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;11&nbsp;&nbsp;&nbsp;</label></td>
                                                                    <td><font size="1" style="font-size: 11px;">Name <i>(Last Name, First Name, Middle Name for Individual OR Registered Name for Non-Individual)</i></label></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="" size="120" name="frm2000:txtOtherName" maxlength="81" id="frm2000:txtOtherName" onkeyup="hitMaxLength(this, 'frm2000:txtOtherName2')" onblur="return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="500" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                            <td width="5"></td>
                                                        <td>
                                                                <input type="text" value="" size="60" name="frm2000:txtOtherName2" maxlength="50" id="frm2000:txtOtherName2" onblur="return capital(this, event)" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="220" class="tblFormTd">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <font size="2" style="font-weight:bold;">&nbsp;12&nbsp;&nbsp;&nbsp;</font><font size="1" style="font-size: 11px;">TIN</font>
                                                        </td>
                                                        <td>
                                                            <div align="center">
                                                                <input type="text" value="" size="20" name="frm2000:txtOtherTIN" maxlength="12" id="frm2000:txtOtherTIN" onkeypress="return wholenumber(this, event)" />
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
                                    <table width="800" border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                        <tr>
                                            <td width="800" class="tblFormTd">
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td width="200">
                                                                <font size="2" style="font-weight:bold;">&nbsp;13&nbsp;&nbsp;&nbsp;</font><font size="1" style="font-size:11px;">Mode of Affixture </font>
                                                            </td>
                                                            <td width="200">
                                                                <input type="checkbox" value="Mode1"  name="frm2000:optMode_1" id="frm2000:optMode_1" onclick="clearCheck('frm2000:optMode_1');processModeAffixture();" waschecked="true" />
                                                                    <label for="frm2000:optMode_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >eDST System </label>&nbsp;
                                                            </td>
                                                            <td width="200">
                                                                <input type="checkbox" value="Mode2"  name="frm2000:optMode_2" id="frm2000:optMode_2" onclick="clearCheck('frm2000:optMode_2');processModeAffixture();" waschecked="true" />
                                                                    <label for="frm2000:optMode_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Constructive Affixture </label>&nbsp;
                                                            </td>
                                                            <td width="200">
                                                                <input type="checkbox" value="Mode3"  name="frm2000:optMode_3" id="frm2000:optMode_3" onclick="clearCheck('frm2000:optMode_3');processModeAffixture();" waschecked="true" />
                                                                    <label for="frm2000:optMode_3" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >LooseStamps </label>&nbsp;
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
                                                            <div align="center"><font size="2" style="font-weight:bold;">PART II - COMPUTATION OF PAYABLE</font></div>
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
                                                <font size="2">&nbsp;<i>A. For Electronic Documentary Stamp Tax (eDST) System and Constructive Affixture of Documentary Stamp </i></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="740" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;&nbsp;&nbsp;</label></td>
                                                        <td width="426"><font size="1" style="font-weight:bold;font-size: 11px;">Tax Due</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">&nbsp;For the Month <a href="javascript:void(0)" id="btnNavigatePage2_1" class="xsmallItalic"  onclick="processNext()">(From Schedule 1) </a></label></td>
                                                        <td width="94">
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td width="193">
                                                            <span class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 13px;">14</font>
                                                                <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2000:txtTax14" maxlength="25" id="frm2000:txtTax14" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">&nbsp;Less:</label></td>
                                                        <td width="422"><font size="2" style="font-weight:bold;">15A&nbsp;&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif"  style="font-size: 11px;">&nbsp;Balance Carried Over from Previous Return </label></td>
                                                        <td width="94">
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td width="193">
                                                            <span class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 4px;">15A</font>
                                                                <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2000:txtTax15A" maxlength="25" id="frm2000:txtTax15A" onblur="round(this,2);computeTax15D();" onkeypress="return numbersonly(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</label></td>
                                                        <td width="422"><font size="2" style="font-weight:bold;">15B&nbsp;&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">&nbsp;Payment thru Constructive Affixture <a href="javascript:void(0)" id="btnNavigatePage2_2" class="xsmallItalic"  onclick="processNext()">(From Schedule 2) </a></label></td>
                                                        <td width="94">
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td width="193">
                                                            <span class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 4px;">15B</font>
                                                                <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2000:txtTax15B" maxlength="25" id="frm2000:txtTax15B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</label></td>
                                                        <td width="422"><font size="2" style="font-weight:bold;">15C&nbsp;&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">&nbsp;Advance Payment during the month <a href="javascript:void(0)" id="btnNavigatePage2_3" class="xsmallItalic"  onclick="processNext()">(From Schedule 3) </a></label></td>
                                                        <td width="94">
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td width="193">
                                                            <span class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 4px;">15C</font>
                                                                <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2000:txtTax15C" maxlength="25" id="frm2000:txtTax15C" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</label></td>
                                                        <td width="422"><font size="2" style="font-weight:bold;">15D&nbsp;&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">&nbsp;Total (Sum of Items 15A to 15C) </label></td>
                                                        <td width="94">
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td width="193">
                                                            <span class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 4px;">15D</font>
                                                                <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2000:txtTax15D" maxlength="25" id="frm2000:txtTax15D" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;16&nbsp;&nbsp;&nbsp;</label></td>
                                                        <td width="525" colspan="2"><font size="1" style="font-weight:bold;font-size: 11px;">Net Tax Payable/(OverPayment)/(Balance to be carried over to the Next Return)</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">&nbsp;(Item 14 Less Item 15D) </label></td>
                                                        <td width="188">
                                                            <span class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 13px;">16</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2000:txtTax16" maxlength="25" id="frm2000:txtTax16" disabled />
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
                                                                        <font size="2" style="font-weight:bold;">&nbsp;17A&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"> Surcharge</font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <span class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 4px;">17A</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2000:txtTax17A" maxlength="25" id="frm2000:txtTax17A" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
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
                                                                        <font size="2" style="font-weight:bold;">&nbsp;17B&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Interest</font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <span class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 4px;">17B</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2000:txtTax17B" maxlength="25" id="frm2000:txtTax17B" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
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
                                                                        <font size="2" style="font-weight:bold;">&nbsp;17C&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Compromise</font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <span class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 4px;">17C</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2000:txtTax17C" maxlength="25" id="frm2000:txtTax17C" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
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
                                                                        <font size="2" style="font-weight:bold;">&nbsp;17D&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Penalties (Sum of Items 32 to 34)</font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <span class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 4px;">17D</font>
                                                                <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm2000:txtTax17D" name="frm2000:txtTax17D" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;&nbsp;&nbsp;</label></td>
                                                        <td width="525" colspan="2"><font size="1" style="font-weight:bold;font-size: 11px;">Total Amount Payable/(Overpayment)/(Balance to be carried over to the next return)</font><font size="1" face="Arial, Helvetica, sans-serif"  style="font-size: 11px;">&nbsp;(Sum of Items 16 & 17D) </label></td>
                                                        <td width="188">
                                                            <span class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 13px;">18</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2000:txtTax18" maxlength="25" id="frm2000:txtTax18" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTd">
                                                <font size="2">&nbsp;<i>B. For Sale of loose Documentary Stamp tax by Revenue District Office </i></font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="740" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;&nbsp;&nbsp;</label></td>
                                                        <td width="422"><font size="1" style="font-weight:bold;font-size: 11px;">Total Amount of Documentary Stamps Sold for the Month</font><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;<a href="javascript:void(0)" id="btnNavigatePage2_4" class="xsmallItalic"  onclick="processNext()">(From Schedule 4) </a></label></td>
                                                        <td width="94">
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td width="193">
                                                            <span class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 13px;">19</font>
                                                                <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2000:txtTax19" maxlength="25" id="frm2000:txtTax19" disabled />
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
                                        <!--<col width="32%" />-->
                                        <tr>
                                        <td colspan="4" style="text-align: left; ">&nbsp;&nbsp;&nbsp;&nbsp;I/We declare, under the penalties of perjury that this remittance return, and all its attachments, have been made in good faith, verified by me/us, and to the best of my/our knowledge and belief, is 
                                            true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof. Further, I/we give my/our consent to the processing of my/our information as contemplated under the *Data Privacy Act of 2012 (R.A. No. 10173) for legitimate and lawful purposes. <i>(If Authorized Representative, attach authorization letter)</i><br></td>
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
                                            Authorized Officer or Representative/Tax Agent (Indicate Title/Designation and TIN)</td>
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
                                                        <input type="text" value="" id="txtDateIssue" style="width: 146px;" maxlength="10" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" >
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
                                                        <input type="text" value="" id="txtDateExpiry"  style="width: 146px;"  maxlength="10" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" />
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
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;&nbsp;&nbsp;</font><font size="1">Cash/Bank Debit Memo </label></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm2000:txtAgency20" maxlength="50" id="frm2000:txtAgency20" disabled="true"  /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm2000:txtNumber20" maxlength="50" id="frm2000:txtNumber20" disabled="true"  /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm2000:txtDate20" maxlength="10" id="frm2000:txtDate20" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm2000:txtAmount20" maxlength="50" id="frm2000:txtAmount20" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;&nbsp;&nbsp;</font><font size="1">Check </label></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm2000:txtAgency21" maxlength="50" id="frm2000:txtAgency21" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm2000:txtNumber21" maxlength="50" id="frm2000:txtNumber21" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm2000:txtDate21" maxlength="10" id="frm2000:txtDate21" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm2000:txtAmount21" maxlength="50" id="frm2000:txtAmount21" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;&nbsp;&nbsp;</font><font size="1">Tax Debit Memo </label></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm2000:txtAgency22" maxlength="50" id="frm2000:txtAgency22" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm2000:txtNumber22" maxlength="50" id="frm2000:txtNumber22" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm2000:txtDate22" maxlength="10" id="frm2000:txtDate22" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm2000:txtAmount22" maxlength="50" id="frm2000:txtAmount22" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5"><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;&nbsp;&nbsp;</font><font size="1">Others (specify below) </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" value="" size="20" name="frm2000:txtParticular23" maxlength="50" id="frm2000:txtParticular36" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm2000:txtAgency23" maxlength="50" id="frm2000:txtAgency23" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm2000:txtNumber23" maxlength="50" id="frm2000:txtNumber23" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" size="20" name="frm2000:txtDate23" maxlength="10" id="frm2000:txtDate23" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
                                                        <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm2000:txtAmount23" maxlength="50" id="frm2000:txtAmount23" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
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
                                        <td width="59%">Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br /><br /><br /><br /><br /><br /><br /></td>
                                        <td width="41%">Stamp of Receiving Office/AAB and Date of Receipt (RO's Signature/Bank Teller's Initial)<br /><br /><br /><br /><br /><br /><br /></td>
                                        </tr>
                                    </table>
                                    <!--</div>-->
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: left; font-family:arial; font-size:10px;">NOTE: *Please read the BIR Data Privacy Policy found in the BIR website (www.bir.gov.ph) <br></td> 
                            </tr>
                        </table>
                    </div>
                    <div id="Page2Content" style="display: none">
                        <table width="800" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table width="800" border="1" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="120" valign="middle" style="text-align: center;">
                                                <label face="Arial" size="1px">BIR Form No.</label>
                                                <br/><font size="5px" style="font-weight:bold;">2000</font>
                                                <br/><label face="Arial" size="1px">January 2018 (ENCS)</label>
                                                <br/><label face="Arial" size="1px" style="font-weight:bold;">Page 2</label>
                                            </td>
                                            <td width="0" valign="center" style="text-align: center;">
                                                <font size="5px" style="font-weight:bold;">Monthly Documentary Stamp</font>
                                                <br/><font size="5px" style="font-weight:bold;">Tax Declaration/Return</font>
                                                <br><label face="Arial" size="1px">Enter all required information in CAPITAL LETTERS using BLACK ink. Mark all applicable boxes with an "X". Two copies MUST be filed with the BIR and one held by the Tax Filer.</label>
                                            </td>
                                            <td width="200" valign="center">
                                                    <p><img src="{{ asset('images/Bar Codes/2000_p2.png') }}" width="220" height="75px" /> </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="40%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">TIN</label></td>
                                            <td width="60%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Taxpayer's Name</label></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <font size="2" face="Arial">
                                                    <input type="text" value="{{$company->tin1}}" size="3" name="frm2000:txtPg2TIN1" maxlength="3" id="frm2000:txtPg2TIN1" onkeypress="return wholenumber(this, event)" disabled />
                                                    <input type="text" value="{{$company->tin2}}" size="3" name="frm2000:txtPg2TIN2" maxlength="3" id="frm2000:txtPg2TIN2" onkeypress="return wholenumber(this, event)" disabled />
                                                    <input type="text" value="{{$company->tin3}}" size="3" name="frm2000:txtPg2TIN3" maxlength="3" id="frm2000:txtPg2TIN3" onkeypress="return wholenumber(this, event)" disabled />
                                                    <input type="text" value="{{$company->tin4}}" size="5" name="frm2000:txtPg2BranchCode" maxlength="5" id="frm2000:txtPg2BranchCode" onkeypress="return letternumber(event)" disabled />
                                                </font>
                                            </td>
                                            <td><input type="text" value="{{$company->registered_name}}" size="80" name="frm2000:txtPg2TaxpayerName" maxlength="50" id="frm2000:txtPg2TaxpayerName" onblur="return capital(this, event)" disabled /></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                    <div><font size="1" style="font-weight:bold;font-size: 11px;">Schedule 1 - Summary of Computation of Taxes Due for the Month </font><font size= "1" style="font-size: 11px;"> (use additional sheet/s, if necessary)</font></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tblFormTd">
                                    <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <thead class="text-center">
                                            <tr>
                                                <th width="15%" align="center" colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">ATC </font></th>
                                                <th width="20%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Base </font></th>
                                                <th width="40%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Rate </font></th>
                                                <th width="25%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Due </font></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tblSched1">
                                            <tr class="text-center">
                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkSchedule1Delete0" name="chkSchedule1Delete0"></label></td>
                                                <td width="13%" align="center">
                                                    <select id="drpATCCode0" name="drpATCCode[]" style="width: 70px" onchange="getATCdrpTaxRate(0);computeSched1TaxDue(0)" >
                                                        <option value="-" selected > - </option>
                                                    </select>
                                                </td>
                                                    
                                                <td align="center"><input type="text" value="0.00" name="frm2000:sched1:txtTaxBase[]" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched1:txtTaxBase0" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSched1TaxDue(0)" /></td>
                                                <td align="center"><input type="text" value="" name="frm2000:sched1:txtTaxRate[]"  style="color: black; text-align: right;" size="40" maxlength="20" id="frm2000:sched1:txtTaxRate0" disabled /></td>
                                                <td align="center"><input type="text" value="0.00" name="frm2000:sched1:txtTaxDue[]"  style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched1:txtTaxDue0" disabled /></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkSchedule1Delete1"  name="chkSchedule1Delete1"></label></td>
                                                <td width="13%" align="center">
                                                    <select id="drpATCCode1" name="drpATCCode[]" style="width: 70px" onchange="getATCdrpTaxRate(1);computeSched1TaxDue(1)" >
                                                        <option value="-" selected > - </option>
                                                    </select>
                                                </td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched1:txtTaxBase1" name="frm2000:sched1:txtTaxBase[]"  onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSched1TaxDue(1)" /></td>
                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="40" maxlength="20" id="frm2000:sched1:txtTaxRate1"  name="frm2000:sched1:txtTaxRate[]" disabled /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched1:txtTaxDue1"  name="frm2000:sched1:txtTaxDue[]" disabled /></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkSchedule1Delete2" name="chkSchedule1Delete2"></label></td>
                                                <td width="13%" align="center">
                                                    <select id="drpATCCode2" name="drpATCCode[]" style="width: 70px" onchange="getATCdrpTaxRate(2);computeSched1TaxDue(2)" >
                                                        <option value="-" selected > - </option>
                                                    </select>
                                                </td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched1:txtTaxBase2" name="frm2000:sched1:txtTaxBase[]" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSched1TaxDue(2)" /></td>
                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="40" maxlength="20" id="frm2000:sched1:txtTaxRate2" name="frm2000:sched1:txtTaxRate[]"  disabled /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched1:txtTaxDue2" name="frm2000:sched1:txtTaxDue[]"  disabled /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td>
                                                <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="16"><font size="1" style="font-weight:bold">&nbsp;</label></td>
                                                        <td width="661"><font size="1">&nbsp;</font><font size="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">TOTAL TAX DUE <a href="javascript:void(0)" id="btnNavigatePage1_1" class="xsmallItalic"  onclick="processPrev()">(To Item 14) </a></label></td>
                                                        <td><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched1:txtTotalDue1" name="frm2000:sched1:txtTotalDue1" disabled /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <input class="printButtonClass" type="button" value="Add" style="width: 100px;" name="frm2000:btnSched1Add" id="frm2000:btnSched1Add" onclick="addSchedule1()" />&nbsp;&nbsp;&nbsp;
                                                <input class="printButtonClass" type="button" value="Delete" style="width: 100px;" name="frm2000:btnSched1Delete" id="frm2000:btnSched1Delete" onclick="deleteSchedule1()" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                    <div><font size="1" style="font-weight:bold;font-size: 11px;">Schedule 2 - Summary of Constructive Affixture for the Month </font><font size= "1" style="font-size: 11px;"> (use additional sheet/s, if necessary)</font></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tblFormTd">
                                    <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="30%" align="center" colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Payment Date/s (MM/DD/YYYY) </font></th>
                                                <th width="40%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Revenue Official Receipt No. (if payment is made to RCO) </font></th>
                                                <th width="30%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Amount Paid </font></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tblSched2">
                                            <tr>
                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkSchedule2Delete0" name="chkSchedule2Delete0"></label></td>  
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="20" maxlength="10" id="frm2000:sched2:txtPaymentDate0" name="frm2000:sched2:txtPaymentDate[]" onkeypress="return wholenumber(this, event)" onkeydown="dateMasking(this);" /></td>
                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="40" maxlength="20" id="frm2000:sched2:txtReceipt0"  name="frm2000:sched2:txtReceipt[]" onkeypress="return letternumber(event)" /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched2:txtAmountPaid0" name="frm2000:sched2:txtAmountPaid[]"  onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule2()" /></td>
                                            </tr>
                                            <tr>
                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkSchedule2Delete1" name="chkSchedule2Delete1"></label></td>  
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="20" maxlength="10" id="frm2000:sched2:txtPaymentDate1" name="frm2000:sched2:txtPaymentDate[]" onkeypress="return wholenumber(this, event)" onkeydown="dateMasking(this);" /></td>
                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="40" maxlength="20" id="frm2000:sched2:txtReceipt1" name="frm2000:sched2:txtReceipt[]"  onkeypress="return letternumber(event)" /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched2:txtAmountPaid1" name="frm2000:sched2:txtAmountPaid[]"  onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule2()" /></td>
                                            </tr>
                                            <tr>
                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkSchedule2Delete2" name="chkSchedule2Delete2"></label></td>  
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="20" maxlength="10" id="frm2000:sched2:txtPaymentDate2" name="frm2000:sched2:txtPaymentDate[]" onkeypress="return wholenumber(this, event)" onkeydown="dateMasking(this);" /></td>
                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="40" maxlength="20" id="frm2000:sched2:txtReceipt2" name="frm2000:sched2:txtReceipt[]"  onkeypress="return letternumber(event)" /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched2:txtAmountPaid2" name="frm2000:sched2:txtAmountPaid[]"  onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule2()" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td>
                                                <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="16"><font size="1" style="font-weight:bold">&nbsp;</label></td>
                                                        <td width="639"><font size="1">&nbsp;</font><font size="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">TOTAL PAYMENT/S <a href="javascript:void(0)" id="btnNavigatePage1_2" class="xsmallItalic"  onclick="processPrev()">(To Item 15B) </a></label></td>
                                                        <td><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched2:txtTotalPayment1" name="frm2000:sched2:txtTotalPayment1" disabled /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <input class="printButtonClass" type="button" value="Add" style="width: 100px;" name="frm2000:btnSched2Add" id="frm2000:btnSched2Add" onclick="addSchedule2()" />&nbsp;&nbsp;&nbsp;
                                                <input class="printButtonClass" type="button" value="Delete" style="width: 100px;" name="frm2000:btnSched2Delete" id="frm2000:btnSched2Delete" onclick="deleteSchedule2()" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                    <div><font size="1" style="font-weight:bold;font-size: 11px;">Schedule 3 - Summary of DST Payments/Purchases for the Month </font><font size= "1" style="font-size: 11px;"> (use additional sheet/s, if necessary)</font></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tblFormTd">
                                    <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="30%" align="center" colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Payment Date/s (MM/DD/YYYY) </font></th>
                                                <th width="40%" align="center"><label size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Payment Reference No, (if paid thru eFPS)/Revenue <br> Official Receipt No. (if payment is made to RCO) </label></th>
                                                <th width="30%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Amount Paid </font></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tblSched3">
                                            <tr>
                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkSchedule3Delete0" name="chkSchedule3Delete0"></label></td>  
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="20" maxlength="10" id="frm2000:sched3:txtPaymentDate0" name="frm2000:sched3:txtPaymentDate[]" onkeypress="return wholenumber(this, event)" onkeydown="dateMasking(this);" /></td>
                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="40" maxlength="20" id="frm2000:sched3:txtReceipt0"  name="frm2000:sched3:txtReceipt[]" onkeypress="return letternumber(event)" /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched3:txtAmountPaid0" name="frm2000:sched3:txtAmountPaid[]"  onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule3()" /></td>
                                            </tr>
                                            <tr>
                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkSchedule3Delete1" name="chkSchedule3Delete1"></label></td>  
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="20" maxlength="10" id="frm2000:sched3:txtPaymentDate1" name="frm2000:sched3:txtPaymentDate[]"  onkeypress="return wholenumber(this, event)" onkeydown="dateMasking(this);" /></td>
                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="40" maxlength="20" id="frm2000:sched3:txtReceipt1"  name="frm2000:sched3:txtReceipt[]" onkeypress="return letternumber(event)" /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched3:txtAmountPaid1" name="frm2000:sched3:txtAmountPaid[]"  onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule3()" /></td>
                                            </tr>
                                            <tr>
                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkSchedule3Delete2" name="chkSchedule3Delete2"></label></td>  
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="20" maxlength="10" id="frm2000:sched3:txtPaymentDate2" name="frm2000:sched3:txtPaymentDate[]"  onkeypress="return wholenumber(this, event)" onkeydown="dateMasking(this);" /></td>
                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="40" maxlength="20" id="frm2000:sched3:txtReceipt2" name="frm2000:sched3:txtReceipt[]"  onkeypress="return letternumber(event)" /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched3:txtAmountPaid2"  name="frm2000:sched3:txtAmountPaid[]" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule3()" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td>
                                                <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="16"><font size="1" style="font-weight:bold">&nbsp;</label></td>
                                                        <td width="639"><font size="1">&nbsp;</font><font size="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">TOTAL PAYMENT/S <a href="javascript:void(0)" id="btnNavigatePage1_3" class="xsmallItalic"  onclick="processPrev()">(To Item 15C) </a></label></td>
                                                        <td><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched3:txtTotalPayment1" name="frm2000:sched3:txtTotalPayment" disabled /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <input class="printButtonClass" type="button" value="Add" style="width: 100px;" name="frm2000:btnSched3Add" id="frm2000:btnSched3Add" onclick="addSchedule3()" />&nbsp;&nbsp;&nbsp;
                                                <input class="printButtonClass" type="button" value="Delete" style="width: 100px;" name="frm2000:btnSched3Delete" id="frm2000:btnSched3Delete" onclick="deleteSchedule3()" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                    <div><font size="1" style="font-weight:bold;font-size: 11px;">Schedule 4 - Summary of Remittance from Collection on Sale of Loose Documentary Stamps </font><font size= "1" style="font-size: 11px;"> (use additional sheet/s, if necessary)</font></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tblFormTd">
                                    <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <thead>
                                            <tr class="text-center">
                                                <!--<td width="5%" align="center">&nbsp;</td>-->
                                                <th width="15%" align="center" colspan="2" rowspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">RCO Code </font></th>
                                                <th width="15%" align="center" rowspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Remittance Date/s (MM/DD/YYYY) </font></th>
                                                <th width="15%" align="center" rowspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Authorized Agent Bank </font></th>
                                                <th width="25%" align="center" rowspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Amount Remitted </font></th>
                                                <th width="30%" align="center" colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Inclusive Numbers of Loose Stamps </font></th>
                                            </tr>
                                            <tr class="text-center">
                                                <th width="15%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">From </font></th>
                                                <th width="15%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">To </font></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tblSched4">
                                            <tr>
                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkSchedule4Delete0" name="chkSchedule4Delete0"></label></td> 
                                                <td width="13%" align="center"><input type="text" value="" style="color: black; text-align: right;" size="8" maxlength="10" id="frm2000:sched4:txtRCOCode0" name="frm2000:sched4:txtRCOCode[]" /></td>
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="10" maxlength="10" id="frm2000:sched4:txtRemittanceDate0" name="frm2000:sched4:txtRemittanceDate[]"  onkeypress="return wholenumber(this, event)" onkeydown="dateMasking(this);" /></td>
                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="10" maxlength="20" id="frm2000:sched4:txtBank0"  name="frm2000:sched4:txtBank[]" /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched4:txtAmountRemitted0" name="frm2000:sched4:txtAmountRemitted[]"  onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule4()" /></td>
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="10" maxlength="10" id="frm2000:sched4:txtNumberFrom0" name="frm2000:sched4:txtNumberFrom[]"  onkeypress="return wholenumber(this, event)" /></td>
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="10" maxlength="10" id="frm2000:sched4:txtNumberTo0" name="frm2000:sched4:txtNumberTo[]"  onkeypress="return wholenumber(this, event)" /></td>
                                            </tr>
                                            <tr>
                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkSchedule4Delete1" name="chkSchedule4Delete1" ></label></td> 
                                                <td width="13%" align="center"><input type="text" value="" style="color: black; text-align: right;" size="8" maxlength="10" id="frm2000:sched4:txtRCOCode1"  name="frm2000:sched4:txtRCOCode[]" /></td>
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="10" maxlength="10" id="frm2000:sched4:txtRemittanceDate1" name="frm2000:sched4:txtRemittanceDate[]"  onkeypress="return wholenumber(this, event)" onkeydown="dateMasking(this);" /></td>
                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="10" maxlength="20" id="frm2000:sched4:txtBank1"  name="frm2000:sched4:txtBank[]" /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched4:txtAmountRemitted1" name="frm2000:sched4:txtAmountRemitted[]"  onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule4()" /></td>
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="10" maxlength="10" id="frm2000:sched4:txtNumberFrom1" name="frm2000:sched4:txtNumberFrom[]"  onkeypress="return wholenumber(this, event)" /></td>
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="10" maxlength="10" id="frm2000:sched4:txtNumberTo1" name="frm2000:sched4:txtNumberTo[]"  onkeypress="return wholenumber(this, event)" /></td>
                                            </tr>
                                            <tr>
                                                <td width="2%"><font size="1" style="font-weight:bold"><input type='checkbox'  id="chkSchedule4Delete2" name="chkSchedule4Delete2" ></label></td> 
                                                <td width="13%" align="center"><input type="text" value="" style="color: black; text-align: right;" size="8" maxlength="10" id="frm2000:sched4:txtRCOCode2"  name="frm2000:sched4:txtRCOCode[]" /></td>
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="10" maxlength="10" id="frm2000:sched4:txtRemittanceDate2"  name="frm2000:sched4:txtRemittanceDate[]" onkeypress="return wholenumber(this, event)" onkeydown="dateMasking(this);" /></td>
                                                <td align="center"><input type="text" value="" style="color: black; text-align: right;" size="10" maxlength="20" id="frm2000:sched4:txtBank2" name="frm2000:sched4:txtBank[]"  /></td>
                                                <td align="center"><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched4:txtAmountRemitted2" name="frm2000:sched4:txtAmountRemitted[]"  onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeSchedule4()" /></td>
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="10" maxlength="10" id="frm2000:sched4:txtNumberFrom2" name="frm2000:sched4:txtNumberFrom[]"  onkeypress="return wholenumber(this, event)" /></td>
                                                <td align="center"><input onblur="" type="text" style="color: black; text-align: right;" size="10" maxlength="10" id="frm2000:sched4:txtNumberTo2" name="frm2000:sched4:txtNumberTo[]"  onkeypress="return wholenumber(this, event)" /></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td>
                                                <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="16"><font size="1" style="font-weight:bold">&nbsp;</label></td>
                                                        <td width="344"><font size="1">&nbsp;</font><font size="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">TOTAL REMITTANCE <a href="javascript:void(0)" id="btnNavigatePage1_4" class="xsmallItalic"  onclick="processPrev()">(To Item 19) </a></label></td>
                                                        <td><input type="text" value="0.00" style="color: black; text-align: right;" size="21" maxlength="25" id="frm2000:sched4:txtTotalRemittance1" name="frm2000:sched4:txtTotalRemittance1" disabled /></td>
                                                        <td width="240"><font size="1" style="font-weight:bold">&nbsp;</label></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <input class="printButtonClass" type="button" value="Add" style="width: 100px;" name="frm2000:btnSched4Add" id="frm2000:btnSched4Add" onclick="addSchedule4()" />&nbsp;&nbsp;&nbsp;
                                                <input class="printButtonClass" type="button" value="Delete" style="width: 100px;" name="frm2000:btnSched4Delete" id="frm2000:btnSched4Delete" onclick="deleteSchedule4()" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" style="border:#000000 2px solid;" cellspacing="0" cellpadding="0">
                                        <tr class="text-center">
                                            <th colspan="2">
                                                <font size="1" style="font-weight:bold;font-size: 11px;">Documentary Stamp Tax (DST)/ Alphanumeric Tax Code (ATC) Table</font>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td width="400">
                                                <table width="400" border="1" style="border:#000000 2px solid;" cellspacing="0" cellpadding="0">
                                                    <tr class="text-center">
                                                        <th width="50"><font size="1" style="font-weight:bold;font-size: 11px;">ATC</font></th>
                                                        <th width="200"><font size="1" style="font-weight:bold;font-size: 11px;">Documents/Transactions</font></th>
                                                        <th width="150"><font size="1" style="font-weight:bold;font-size: 11px;">Tax Rate</font></th>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 010</label></td>
                                                        <td><label size="1">&nbsp;</label></td>
                                                        <td><label size="1">In general</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 101</label></td>
                                                        <td><label size="1">Original Issue of Shares of Stocks</label></td>
                                                        <td><label size="1">P2.00/P200</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 102</label></td>
                                                        <td><label size="1">Sales, Agreements to Sell, Memoranda of Sales, Deliveries or Transfer of Shares or Certificates of Stock with par value</label></td>
                                                        <td><label size="1">P1.50/P200</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 125</label></td>
                                                        <td><label size="1">In case Stock without par value</label></td>
                                                        <td><label size="1">50% of DST paid on original issue</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 103</label></td>
                                                        <td><label size="1">Bonds, Debentures, Certificates of Stock or Indebtedness issued in Foreign Countries</label></td>
                                                        <td><label size="1">Same tax rate on similar instrument</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 104</label></td>
                                                        <td><label size="1">Certificates of Profits or Intrest in Property or Accumulations</label></td>
                                                        <td><label size="1">P1.00/P200</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 105</label></td>
                                                        <td><label size="1">Bank Checks, Drafts, Certificates of Deposit not Bearing Interest, and Other Instruments</label></td>
                                                        <td><label size="1">P3.00/piece of check, draft, certificate, etc.</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 106</label></td>
                                                        <td><label size="1">Original issue of all Debt Instruments</label></td>
                                                        <td><label size="1">P1.50/200 of issue price or a fraction of 365 days for instruments with term of less than one (1) year</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 107</label></td>
                                                        <td><label size="1">Acceptance of Bills of Exchange or Order drawn in a Foreign Country but payable in the Philippines</label></td>
                                                        <td><label size="1">P0.60/200</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 108</label></td>
                                                        <td><label size="1">Foreign Bills of Exchange and Letters of Credit</label></td>
                                                        <td><label size="1">P0.60/200</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 109</label></td>
                                                        <td>
                                                            <label size="1">
                                                                Life Insurance Policies amount: <br>
                                                                Does not exceed P100,000 <br>
                                                                Exceeds P100,000 but does not exceed P300,000 <br>
                                                                Exceeds P300,000 but does not exceed P500,000 <br>
                                                                Exceeds P500,000 but does not exceed P750,000 <br>
                                                                Exceeds P750,000 but does not exceed P1,000,000 <br>
                                                                Exceeds P1,000,000
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label size="1">
                                                                &nbsp; <br>
                                                                Exempt <br>
                                                                P20.00 <br><br>
                                                                P50.00 <br><br>
                                                                P100.00 <br><br>
                                                                P150.00 <br><br>
                                                                P200.00 <br>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 110</label></td>
                                                        <td><label size="1">Policies of Insurance upon Property</label></td>
                                                        <td><label size="1">P0.50/P4.00</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 111</label></td>
                                                        <td><label size="1">Fidelity Bonds and Other Insurance Policies</label></td>
                                                        <td><label size="1">P0.50/P4.00</label></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="400">
                                                <table width="400" border="1" style="border:#000000 2px solid;" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <th width="50"><font size="1" style="font-weight:bold">ATC</font></th>
                                                        <th width="200"><font size="1" style="font-weight:bold">Documents/Transactions</font></th>
                                                        <th width="150"><font size="1" style="font-weight:bold">Tax Rate</font></th>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2"><font size="1">DS 112</label></td>
                                                        <td><label size="1">Policies of Annuities</label></td>
                                                        <td><label size="1">P1.00/P200 of the premium or installment payment on Contract Price collected</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">Pre-need Plans</label></td>
                                                        <td><label size="1">P0.40/P200 of the premium or contribution collected</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 113</label></td>
                                                        <td><label size="1">Indemnity Bonds</label></td>
                                                        <td><label size="1">P0.30/P4.00</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 114</label></td>
                                                        <td><label size="1">Certificates (Sec. 188 of the <br> Tax code)</label></td>
                                                        <td><label size="1">P30.00/certificate</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 115</label></td>
                                                        <td><label size="1">Warehouse Receipts</label></td>
                                                        <td><label size="1">P30 w/ value above P200</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 116</label></td>
                                                        <td><label size="1">Jai-alai, Horse Race Tickets, <br> Lotto, or Other Authorized <br> Number Games</label></td>
                                                        <td><label size="1">P1.00 & below P0.20 above P1.00 P0.20/P1.00</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 117</label></td>
                                                        <td><label size="1">Bills of Lading or Receipts</label></td>
                                                        <td><label size="1">P100 to P1,000 P2.00 above P1,000 P20.00</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 118</label></td>
                                                        <td><label size="1">Proxies for Voting at Any <br> Election</label></td>
                                                        <td><label size="1">P30.00/issued proxy</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 119</label></td>
                                                        <td><label size="1">Powers of Attorney</label></td>
                                                        <td><label size="1">P10.00/power of attorney</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 120</label></td>
                                                        <td><label size="1">Leases and Other Hiring Agreements</label></td>
                                                        <td><label size="1">1st P2,000 P6.00 in excess P2.00/P1,000</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 121</label></td>
                                                        <td><label size="1">Mortgages, Pledges and Deeds of Trust</label></td>
                                                        <td><label size="1">1st P5,000 P40 in excess P20/P5,000</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 124</label></td>
                                                        <td><label size="1">On Assignments & Renewals of Certain Instruments</label></td>
                                                        <td><label size="1">Same rate as original instrument</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 126</label></td>
                                                        <td><label size="1">Bills of Exchange or Drafts</label></td>
                                                        <td><label size="1">P0.60 on each P200</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">&nbsp;</label></td>
                                                        <td><label size="1">Charter Parties and Similar Instrument if gross tonnage of the Ship, Vessel or Steamer is:</label></td>
                                                        <td><label size="1">&nbsp;</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 130</label></td>
                                                        <td><label size="1">1,000 tons and below</label></td>
                                                        <td><label size="1">1st 6 months P1,000 in excess + P100/month</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 131</label></td>
                                                        <td><label size="1">1,001 to 10,000 tons</label></td>
                                                        <td><label size="1">1st 6 months P2,000 in excess + P200/month</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">DS 132</label></td>
                                                        <td><label size="1">Over 10,000 tons</label></td>
                                                        <td><label size="1">1st 6 months P3,000 in excess + P300/month</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label size="1">&nbsp;</label></td>
                                                        <td><label size="1">&nbsp;</label></td>
                                                        <td><label size="1">&nbsp;</label></td>
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
                                                    <input class="printButtonClass" type="button" value="Prev" style="width: 100px;"
                                                        name="frm2000:btnPrevPage" id="frm2000:btnPrevPage" onclick="processPrev();" />
                                                    <input id="frm2000:txtCurrentPage" name="frm2000:txtCurrentPage" size="1" type="text" style="text-align:center;" onkeyup="goToPage();" />
                                                    <span class=large>/&nbsp;</span><input type="text" id="frm2000:txtMaxPage" readonly="true" size="2"  value="2" style="text-align:center;" disabled />&nbsp;
                                                    <input class="printButtonClass" type="button" value="Next" style="width: 100px;"
                                                        name="frm2000:btnNextPage" id="frm2000:btnNextPage"  onclick="processNext();" />
                                                    <br /><br />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr valign="middle" align="center">
                                            <td>
                                                <div align="center">
                                                @if($action != 'view')
                                                    <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm2000:cmdValidate" id="frm2000:cmdValidate" onclick="validate()" />
                                                    <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm2000:cmdEdit" id="frm2000:cmdEdit" onclick="enableAllControl()"/>
                                                    <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                    <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                    <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2000:btnFinalCopy" id="frm2000:btnFinalCopy" onclick="submitForm();" />
                                                    <div id="msg" class="printButtonClass" style="display:none;"></div>                                         
                                                    <div id="DummyTxt" style='display:none;'>  </div>
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
                    </td>
                </tr>
                 <tr>
                        <td>
                            <div class="footer footer2000" style="padding:6px; text-align: center; font-size: 11px; background-color: white;">
                             <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                            </div>
                        </td>
                    </tr>
        </table>
        
            </div>
        </div>
        
        <div id="hiddenEmail" style="display:none;"  > 
                <input type="text" value="{{$company->line_business}}"  size="20" name="frm2000:txtLineBus" maxlength="30" id="frm2000:txtLineBus" onblur="" />
        </div>
        <input type="hidden" id="hATCSelectedIndex" style="width: 0px" />
   
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
    <div id="responseATC" style="display:none;"><!--loaded files render here--></div> 
    <div id="responseRdo" style="display:none;"><!--loaded files render here--></div> 
@endsection
@section('scripts')
<script type="text/javascript">
  
    setTimeout("sleeptime()", 1000);
  var isSubmitFinal = false;
  
  var atcList = new Array();
  var gIsReadOnly = false;
  var fileNameToExport = ""; var fileName = "";
  var fnNew = "";
  
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
  var p3TPZip = "";   var globalEmail = "";

    function Schedule1() {
        this.selATC = '-';
        this.txtTaxBase = '0.00';
        this.txtTaxRate = '';
        this.txtTaxDue = '0.00';
    }

    function Schedule2() {
        this.txtPaymentDate = '';
        this.txtReceiptNo = '';
        this.txtAmountPaid = '0.00';
    }

    function Schedule3() {
        this.txtPaymentDate = '';
        this.txtReceiptNo = '';
        this.txtAmountPaid = '0.00';
    } 

    function Schedule4() {
        this.txtRCOCode = '';
        this.txtRemittanceDate = '';
        this.txtBank = '';
        this.txtAmountRemitted = '0.00';
        this.txtNumberFrom = '';
        this.txtNumberTo = '';
    }

    var schedule1ToCommit = new Array();
    var schedule2ToCommit = new Array();
    var schedule3ToCommit = new Array();
    var schedule4ToCommit = new Array();

    var currentPage;
  var MaxPage = 2;
  
  function atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum, formatRate)
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
    this.formatRate=formatRate;
  }
  /*----------------------------------*/
    var d=document,XMLBGFile='',data='',XMLFile='', XMLATCFile='',msg = d.getElementById('msg'),flag=true;
  var loader=d.getElementById('loader');
  /*----------------------------------*/
  
    function sleeptime()
    {   
        init();
   
    var xmlFileName = document.getElementById('file_name').value;        
    fileName = xmlFileName;
    if (fileName != null && fileName.indexOf('.xml') > -1) {
      loadXML(fileName);  

      if (gIsReadOnly) { 
      window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false; d.getElementById('frm2000:txtCurrentPage').disabled = false; d.getElementById('frm2000:btnPrevPage').disabled = false; d.getElementById('frm2000:btnNextPage').disabled = false;",1000); 
      }
    } else {
      window.setTimeout("$('#loader').hide('blind');",100);
    }
    if ( $('#printMenu').css('display') != 'none' ) { 
      $('#printMenu').hide('blind');
    }

        if (d.getElementById("frm2000:AmendedRtn_1").checked) {
            d.getElementById("frm2000:txtTax15A").disabled = false;
        }
    
        processOtherParty();
    }
  
    
  var rdoList = new Array();

    function init()
    {
        d.getElementById('frm2000:AmendedRtn_1').disabled = false;
        d.getElementById('frm2000:AmendedRtn_2').disabled = false;
        d.getElementById('frm2000:txtSheets').disabled = false;
        
        var dt = new Date();
        d.getElementById('frm2000:txtMonth').selectedIndex = dt.getMonth()+1;
        d.getElementById('frm2000:txtYear').value = dt.getFullYear();
    
        currentPage = 1;
        d.getElementById('frm2000:txtCurrentPage').value = currentPage;

        loadXMLATC('/xml/atcCodes.xml');
        for (var i=0;i<d.getElementById('tblSched1').rows.length;i++) {
        loadATCDropDown(i, '-');  //load ATC in schedule1 dropdown and set selected to default    
        }
        processModeAffixture(); //disable schedules if mode of affixture not tick
        
        @if($action != 'view')
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2000:cmdEdit').disabled = true;
        d.getElementById('frm2000:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @endif
    }
  

  function loadXMLATC(fileLocation) {
    var url = document.getElementsByName('base_url')[0].getAttribute('content');

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
        var responseATC = d.getElementById('responseATC'); //render file and write to hidden div
        responseATC.innerHTML = xmlHTTP.responseText; //remove XML tag
        loadATC();
  } 
  
  var atcCount=0;
  
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
      
      //Ensure that before writing to atcPropertyJS the formType 2000 is traceable in atcStr
      if (atcStr.indexOf('2000^') >= 0) {
          var atcValues = atcStr.split('~');        
        
        var formType = "2000";
        var atcCode = atcValues[0];
        var description = atcValues[1];
        var rate = atcValues[2];
        var category = atcValues[3];    
        
        var base = atcValues[4];  
        var compType = atcValues[5];  
        var constTaxDue = atcValues[6]; 
        var minimum = atcValues[7]; 
        var maximum = atcValues[8]; 
        var formatRate = atcValues[9];  
        
        var objATC = new atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum, formatRate);
        atcList[j] = objATC; 
        j++;
        //alert('2000 successfully created array #'+i);
        
      } else {    
        //alert('2000 not found in array #'+i);
        continue;
      }
    }     
  } 

  
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
          d.getElementById('frm2000:cmdValidate').disabled = true;
          d.getElementById('btnSave').disabled = true;
        }
        window.setTimeout("loadSchedule1();loadSchedule2();loadSchedule3();loadSchedule4();processModeAffixture();", 500);
      
  }
  
  function loadData() {
    /*This will load data onto fields*/
    var response = d.getElementById("response");
    
        var elem = document.getElementById('frmMain').elements;
        var fieldVal = "";
        for(var i = 0; i < elem.length; i++)
        {
      
      if (elem[i].type != 'undefined') {  //elem[i].type != 'button' && elem[i].type != 'hidden' &&       
        if (elem[i].type == 'text' || elem[i].type == 'select-one' || elem[i].type == 'hidden' && elem[i].id != "") {
          
                    if(elem[i].id == 'frm2000:txtAddress2'){
                        fieldVal = String( $("#response").html() ).split("frm2000:txtAddress=");
                    }
                    else if (elem[i].id == 'frm2000:txtOtherName2') {
                        fieldVal = String( $("#response").html() ).split("frm2000:txtOtherName=");
                    }else{
                    fieldVal = String( $("#response").html() ).split(elem[i].id+'=');

                    }

                  elem[i].value = '';
                  if (fieldVal != null && fieldVal.length > 1  && fieldVal[1] != 'undefined') {
                      if(elem[i].id == 'frm2000:txtTaxpayerName' || elem[i].id == 'frm2000:txtLineBus'){
                          elem[i].value = unescape(fieldVal[1]);
                        }
                        else if(elem[i].id == 'frm2000:txtAddress'){
                            if(fieldVal[1].length <= 100){
                                elem[i].value = unescape(fieldVal[1]);
                            }
                            else {
                                elem[i].value = unescape(fieldVal[1]).substring(0, 100);
                            }
                        }
                        else if(elem[i].id == 'frm2000:txtAddress2'){
                            if(fieldVal[1].length <= 100){
                                elem[i].value = '';
                            }
                            else {
                                elem[i].value = unescape(fieldVal[1]).substring(100, fieldVal[1].length);
                            }
                        }
                        else if(elem[i].id == 'frm2000:txtOtherName'){
                            if(fieldVal[1].length <= 80){
                                elem[i].value = unescape(fieldVal[1]);
                            }
                            else {
                                elem[i].value = unescape(fieldVal[1]).substring(0, 80);
                            }
                        }
                        else if(elem[i].id == 'frm2000:txtOtherName2'){
                            if(fieldVal[1].length <= 80){
                                elem[i].value = '';
                            }
                            else {
                                elem[i].value = unescape(fieldVal[1]).substring(80, fieldVal[1].length);
                            }
                        }
            else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                        }
            else{
              elem[i].value = typeof (fieldVal[1]) === "undefined" ? "" : fieldVal[1];
                              //all select-one and text values        
            }
          }         
        }
        if (elem[i].type == 'radio') {
          var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');       
          if (rdoVal[1] == 'true') {
            elem[i].checked = rdoVal[1];
            
            //elem[i].onclick();
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
        var fieldVal = "";
        for(var i = 0; i < elem.length; i++) {
      
      if (elem[i].type != 'undefined') { //elem[i].type != 'hidden' && 
        if (elem[i].type == 'text' || elem[i].type == 'select-one' || elem[i].type == 'hidden') {
          
                    if(elem[i].id == 'frm2000:txtAddress2'){
                        fieldVal = String( $("#response").html() ).split("frm2000:txtAddress=");
          }
                    else if (elem[i].id == 'frm2000:txtOtherName2') {
                        fieldVal = String( $("#response").html() ).split("frm2000:txtOtherName=");
                    }
          else{
            fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
          }

          elem[i].value = ''; elem[i].selectedIndex = 0;
          if(elem[i].id == 'frm2000:txtTaxpayerName' || elem[i].id == 'frm2000:txtLineBus'){
            elem[i].value = unescape(fieldVal[1]);
          }
                    else if(elem[i].id == 'frm2000:txtAddress'){
                        if(fieldVal[1].length <= 100){
                            elem[i].value = unescape(fieldVal[1]);
                        }
                        else {
                            elem[i].value = unescape(fieldVal[1]).substring(0, 100);
                        }
                    }
                    else if(elem[i].id == 'frm2000:txtAddress2'){
                        if(fieldVal[1].length <= 100){
                            elem[i].value = '';
                        }
                        else {
                            elem[i].value = unescape(fieldVal[1]).substring(100, fieldVal[1].length);
                        }
                    }
                    else if(elem[i].id == 'frm2000:txtOtherName'){
                        if(fieldVal[1].length <= 80){
                            elem[i].value = unescape(fieldVal[1]);
                        }
                        else {
                            elem[i].value = unescape(fieldVal[1]).substring(0, 80);
                        }
                    }
                    else if(elem[i].id == 'frm2000:txtOtherName2'){
                        if(fieldVal[1].length <= 80){
                            elem[i].value = '';
                        }
                        else {
                            elem[i].value = unescape(fieldVal[1]).substring(80, fieldVal[1].length);
                        }
                    }
          else{
            elem[i].value = typeof (fieldVal[1]) === "undefined" ? "" : fieldVal[1];
                              //all select-one and text values        
          }
        }       
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
    if (d.getElementById(id) != null) {
      d.getElementById(id).size = parseInt(limit);
      d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed( parseInt(deci) );    
    }
  } 
    
    function getPopulateATC()
    {
        ATCnameCode = new Array();
        NaturePayment = new Array();
        AtcRate = new Array();
        AtcBase = new Array();
        AtcFormatRate = new Array();
        AtcCompType = new Array();
        AtcConstantTaxDue = new Array();
        AtcMaximum = new Array();
        AtcMinimum = new Array();

        //var atcSize = atcList.getSize();
        var atcSize = atcList.length;
        var i = 0;
        var j = 1;
        
        for(i = 0; i < atcSize; i++) {
            //var atc = atcList.get(i);  
            var atc = atcList[i];  
            if(atc.formType == "2000") {
               
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                AtcFormatRate[j] = atc.formatRate;
                AtcBase[j] = atc.base; //alert("a "  + atc.constTaxDue() + " " +   atc.maximum() + " " +  atc.compType() + " " +  atc.minimum());
                AtcCompType[j] = atc.compType;
                AtcConstantTaxDue[j] = atc.constTaxDue;
                AtcMaximum[j] = atc.maximum;
                AtcMinimum[j] = atc.minimum;
                AtcRate[j++] = atc.rate;
            }
        }        
    }
    
    function blockletter(e)
    {
        var number = parseFloat(e.value).toFixed(2);
        if(isNaN(number))
        {
            var zero = 0;
            e.value = parseFloat(zero).toFixed(2);
            //e.value = "";
        }else {
            e.value = '' + number;
            if( e.value < 0 ) 
            {
                var zero = 0;
                e.value = parseFloat(zero).toFixed(2);
            }

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
        } else {
            e.value = '' + number.toFixed(0);
        }
    }

    function blockLetterInt(e)
    {
        var number = e.value;
        if(isNaN(number))
        {
            e.value = "";
        } else {
            e.value = '' + number;
        }
    }

    function hitMaxLength(e, target) {
        if (e.value.length == 80) {
            
            document.getElementById(target).focus();
        }
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

    function processAmended() {
        if (d.getElementById("frm2000:AmendedRtn_1").checked) {
            d.getElementById("frm2000:txtTax15A").disabled = false;
        } else {
            d.getElementById("frm2000:txtTax15A").disabled = true;
        }
    }

    function processOtherParty() {
        if (d.getElementById("frm2000:optParty_1").checked == true || d.getElementById("frm2000:optParty_2").checked == true) {
            d.getElementById("frm2000:txtOtherName").disabled = false;
            d.getElementById("frm2000:txtOtherName2").disabled = false;
            d.getElementById("frm2000:txtOtherTIN").disabled = false;
            d.getElementById("frm2000:txtOtherName").style.backgroundColor = "#FFFFFF";
            d.getElementById("frm2000:txtOtherName2").style.backgroundColor = "#FFFFFF";
            d.getElementById("frm2000:txtOtherTIN").style.backgroundColor = "#FFFFFF";
        }
        else {
            
            d.getElementById("frm2000:txtOtherName").value = "";
            d.getElementById("frm2000:txtOtherName2").value = "";
            d.getElementById("frm2000:txtOtherTIN").value = "";
            d.getElementById("frm2000:txtOtherName").disabled = true;
            d.getElementById("frm2000:txtOtherName2").disabled = true;
            d.getElementById("frm2000:txtOtherTIN").disabled = true;
            d.getElementById("frm2000:txtOtherName").style.backgroundColor = "#F0F0F0";
            d.getElementById("frm2000:txtOtherName2").style.backgroundColor = "#F0F0F0";
            d.getElementById("frm2000:txtOtherTIN").style.backgroundColor = "#F0F0F0";
            
        }
    }

    function processModeAffixture() {
        if (d.getElementById("frm2000:optMode_1").checked == true) {
            enableSchedule3();
        } else {
            disableSchedule3();
        }

        if (d.getElementById("frm2000:optMode_2").checked == true) {
            enableSchedule2();
        } else {
            disableSchedule2();
        }

        if (d.getElementById("frm2000:optMode_3").checked == true) {
            enableSchedule4();
        } else {
            disableSchedule4();
        }
    }

    /*----------Schedules----------*/

    function loadSchedule1() {
        var selAtc = String($("#response").html()).split("drpATCCode");  //atc
        var taxBase = String($("#response").html()).split("frm2000:sched1:txtTaxBase");  //taxbase
        var taxRate = String($("#response").html()).split("frm2000:sched1:txtTaxRate");  //taxrate
        var taxDue = String($("#response").html()).split("frm2000:sched1:txtTaxDue");  //taxdue

        $('#tblSched1').html("");

        var i = 0;
        for(var j = 0; j < selAtc.length; j++) {
            if (j % 2 != 0) {//to not get other div splits
                
                //get values
                schedule1ToCommit[i] = new Schedule1();
                schedule1ToCommit[i].selATC = selAtc[j].split('=')[1];
                schedule1ToCommit[i].txtTaxBase = taxBase[j].split('=')[1];
                schedule1ToCommit[i].txtTaxRate = taxRate[j].split('=')[1];
                schedule1ToCommit[i].txtTaxDue = taxDue[j].split('=')[1];
                
                i++;
            }
        }

        for (x=0;x< schedule1ToCommit.length;x++) {  

            $('#tblSched1').html(d.getElementById('tblSched1').innerHTML + "<tr>" +
            "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkSchedule1Delete" + x + "'></font></td>" + 
            "<td width='13%' align='center'>" + 
            "<select id='drpATCCode" + x + "' style='width: 70px' onchange='getATCdrpTaxRate(" + x + ");computeSched1TaxDue(" + x + ")' >" + 
            "<option value='-' selected > - </option>" + 
            "</select></td>" + 
            "<td align='center'><input type='text' value='" + schedule1ToCommit[x].txtTaxBase + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched1:txtTaxBase" + x + "' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSched1TaxDue("+ x +")' /></td>" + 
            "<td align='center'><input type='text' value='" + schedule1ToCommit[x].txtTaxRate + "' style='color: black; text-align: right;' size='40' maxlength='20' id='frm2000:sched1:txtTaxRate" + x + "' disabled /></td>" + 
            "<td align='center'><input type='text' value='" + schedule1ToCommit[x].txtTaxDue + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched1:txtTaxDue" + x + "' disabled /></td>" + 
            "</tr>");

            loadATCDropDown(x, schedule1ToCommit[x].selATC);
        }
    }

    function loadATCDropDown(index, selValue) {
        
        getPopulateATC();
        $('#drpATCCode' + index).html("");
  
        var x = 1;
        for (var i=0;i < ATCnameCode.length + 2; i++) {
            var str = "";   //selected
            if((i == 0 && selValue == '-') || (i == 1 && selValue == 'DS010') || ATCnameCode[x] == selValue ) {
                str = "selected";
            }
            
            if(i == 0) { 
                $('#drpATCCode'+index).html(  d.getElementById('drpATCCode'+index).innerHTML + "<option value='-' " + str + " > - </option>"); //alert("i = 0 " + str)
            } else if(i == 1) {
                $('#drpATCCode'+index).html(  d.getElementById('drpATCCode'+index).innerHTML + "<option value='DS010' " + str + " >DS010 - GENERAL </option>"); //alert("i = 1 " + str)
            } else {
                if(i <= ATCnameCode.length) {
                    $('#drpATCCode'+index).html(  d.getElementById('drpATCCode'+index).innerHTML + "<option value='"+ATCnameCode[x]+"' " + str + "> "+ATCnameCode[x]+" - " + NaturePayment[x]+"</option>");
                    x++; //alert("atc selected i =  " + i + " " + str)
                }
            }
        }
    }

    function getATCdrpTaxRate(i) {

        getPopulateATC();
        for(var j = 0; j < ATCnameCode.length ; j++) {
            if(d.getElementById('drpATCCode'+i).value == ATCnameCode[j]) {
                if (d.getElementById('drpATCCode'+i).value == "DS109") {
                    d.getElementById('frm2000:sched1:txtTaxRate'+i).value = "Exempt, P20, P50, P100, P150, P200";
                } else if (d.getElementById('drpATCCode'+i).value == "DS112" && d.getElementById('drpATCCode'+i).selectedIndex == j + 2) {
                    d.getElementById('frm2000:sched1:txtTaxRate'+i).value = AtcFormatRate[j+1]; //DS112 pre-need plans
                } else {
                    d.getElementById('frm2000:sched1:txtTaxRate'+i).value = AtcFormatRate[j]; 
                }
                return;
            } else {
                d.getElementById('frm2000:sched1:txtTaxRate'+i).value =  "";
            }
        }
    }

    function addSchedule1() {

        var rowCount = d.getElementById("tblSched1").rows.length;
        for(var i = 0; i < rowCount; i++ ) {
            
            schedule1ToCommit[i] = new Schedule1();
            schedule1ToCommit[i].selATC = d.getElementById("drpATCCode"+i).value;
            schedule1ToCommit[i].txtTaxBase = d.getElementById("frm2000:sched1:txtTaxBase"+i).value;
            schedule1ToCommit[i].txtTaxRate = d.getElementById("frm2000:sched1:txtTaxRate"+i).value;
            schedule1ToCommit[i].txtTaxDue = d.getElementById("frm2000:sched1:txtTaxDue"+i).value;
        }

        i = schedule1ToCommit.length;
        schedule1ToCommit[i] = new Schedule1();
        $('#tblSched1').html("");

        for(i = 0; i < schedule1ToCommit.length; i++) {

            $('#tblSched1').html(d.getElementById('tblSched1').innerHTML + "<tr>" +
            "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkSchedule1Delete" + i + "' name='chkSchedule1Delete" + i + "'></font></td>" + 
            "<td width='13%' align='center'>" + 
            "<select id='drpATCCode" + i + "'  name='drpATCCode[]' style='width: 70px' onchange='getATCdrpTaxRate(" + i + ");computeSched1TaxDue(" + i + ")' >" + 
            "<option value='-' selected > - </option>" + 
            "</select></td>" + 
            "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtTaxBase + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched1:txtTaxBase" + i + "'  name='frm2000:sched1:txtTaxBase[]' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSched1TaxDue(" + i + ")' /></td>" + 
            "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtTaxRate + "' style='color: black; text-align: right;' size='40' maxlength='20' id='frm2000:sched1:txtTaxRate" + i + "' name='frm2000:sched1:txtTaxRate[]'  disabled /></td>" + 
            "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtTaxDue + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched1:txtTaxDue" + i + "' name='frm2000:sched1:txtTaxDue[]'  disabled /></td>" + 
            "</tr>");

            loadATCDropDown(i, schedule1ToCommit[i].selATC);
        }
    }

    function deleteSchedule1() {

        var scheduleTemp = new Array();
        var rowCount = d.getElementById("tblSched1").rows.length;
        for(var i = 0; i < rowCount; i++ ) {
            
            schedule1ToCommit[i] = new Schedule1();
            schedule1ToCommit[i].selATC = d.getElementById("drpATCCode"+i).value;
            schedule1ToCommit[i].txtTaxBase = d.getElementById("frm2000:sched1:txtTaxBase"+i).value;
            schedule1ToCommit[i].txtTaxRate = d.getElementById("frm2000:sched1:txtTaxRate"+i).value;
            schedule1ToCommit[i].txtTaxDue = d.getElementById("frm2000:sched1:txtTaxDue"+i).value;
        }
        i = 0;
        for(var j = 0; j < rowCount; j++ ) {
            if(!d.getElementById("chkSchedule1Delete" + j).checked) {
                scheduleTemp[i++] = schedule1ToCommit[j];
            }
        }

        if(scheduleTemp.length > 0) {
            schedule1ToCommit = new Array();
            
            $('#tblSched1').html("");

            for(i = 0; i < scheduleTemp.length; i++) {
                schedule1ToCommit[i] = scheduleTemp[i];

                $('#tblSched1').html(d.getElementById('tblSched1').innerHTML + "<tr>" +
                "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkSchedule1Delete" + i + "'></font></td>" + 
                "<td width='13%' align='center'>" + 
                "<select id='drpATCCode" + i + "' style='width: 70px' onchange='getATCdrpTaxRate(" + i + ");computeSched1TaxDue(" + i + ")' >" + 
                "<option value='-' selected > - </option>" + 
                "</select></td>" + 
                "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtTaxBase + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched1:txtTaxBase" + i + "' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSched1TaxDue(" + i + ")' /></td>" + 
                "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtTaxRate + "' style='color: black; text-align: right;' size='40' maxlength='20' id='frm2000:sched1:txtTaxRate" + i + "' disabled /></td>" + 
                "<td align='center'><input type='text' value='" + schedule1ToCommit[i].txtTaxDue + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched1:txtTaxDue" + i + "' disabled /></td>" + 
                "</tr>");

                loadATCDropDown(i, schedule1ToCommit[i].selATC);
            }
        } else {
            schedule1ToCommit = new Array();
            $('#tblSched1').html("");
        }
        computeSchedule1();
    }

    function enableSchedule2() {
        for (var i=0;i<d.getElementById("tblSched2").rows.length;i++) {
            d.getElementById("frm2000:sched2:txtPaymentDate"+i).disabled = false;
            d.getElementById("frm2000:sched2:txtReceipt"+i).disabled = false;
            d.getElementById("frm2000:sched2:txtAmountPaid"+i).disabled = false;
        }

        d.getElementById("frm2000:btnSched2Add").disabled = false;
        d.getElementById("frm2000:btnSched2Delete").disabled = false;
    }

    function disableSchedule2() {
        for (var i=0;i<d.getElementById("tblSched2").rows.length;i++) {
            d.getElementById("frm2000:sched2:txtPaymentDate"+i).disabled = true;
            d.getElementById("frm2000:sched2:txtPaymentDate"+i).value = "";
            d.getElementById("frm2000:sched2:txtReceipt"+i).disabled = true;
            d.getElementById("frm2000:sched2:txtReceipt"+i).value = "";
            d.getElementById("frm2000:sched2:txtAmountPaid"+i).disabled = true;
            d.getElementById("frm2000:sched2:txtAmountPaid"+i).value = "0.00";
        } 

        d.getElementById("frm2000:btnSched2Add").disabled = true;
        d.getElementById("frm2000:btnSched2Delete").disabled = true;
        computeSchedule2();
    }

    function loadSchedule2() {
        var paymentDate = String($("#response").html()).split("frm2000:sched2:txtPaymentDate");  //paymentdate
        var receipt = String($("#response").html()).split("frm2000:sched2:txtReceipt");  //receipt
        var amountPaid = String($("#response").html()).split("frm2000:sched2:txtAmountPaid");  //amountpaid

        $('#tblSched2').html("");

        var i = 0;
        for(var j = 0; j < paymentDate.length; j++) {
            if (j % 2 != 0) {//to not get other div splits
                
                //get values
                schedule2ToCommit[i] = new Schedule2();
                schedule2ToCommit[i].txtPaymentDate = paymentDate[j].split('=')[1];
                schedule2ToCommit[i].txtReceiptNo = receipt[j].split('=')[1];
                schedule2ToCommit[i].txtAmountPaid = amountPaid[j].split('=')[1];
                
                i++;
            }
        }

        for (x=0;x< schedule2ToCommit.length;x++) {  

            $('#tblSched2').html(d.getElementById('tblSched2').innerHTML + "<tr>" +
            "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkSchedule2Delete" + x + "'></font></td>" + 
            "<td align='center'><input onblur='' type='text' value='" + schedule2ToCommit[x].txtPaymentDate + "' style='color: black; text-align: right;' size='20' maxlength='10' id='frm2000:sched2:txtPaymentDate" + x + "' onkeypress='return wholenumber(this, event)' onkeydown='dateMasking(this);' /></td>" +
            "<td align='center'><input type='text' value='" + schedule2ToCommit[x].txtReceiptNo + "' style='color: black; text-align: right;' size='40' maxlength='20' id='frm2000:sched2:txtReceipt" + x + "' onkeypress='return letternumber(event)' /></td>" + 
            "<td align='center'><input type='text' value='" + schedule2ToCommit[x].txtAmountPaid + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched2:txtAmountPaid" + x + "' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSchedule2()' /></td>" + 
            "</tr>");
        }
    }

    function addSchedule2() {

        var rowCount = d.getElementById("tblSched2").rows.length;
        for(var i = 0; i < rowCount; i++ ) {
            
            schedule2ToCommit[i] = new Schedule2();
            schedule2ToCommit[i].txtPaymentDate = d.getElementById("frm2000:sched2:txtPaymentDate"+i).value;
            schedule2ToCommit[i].txtReceiptNo = d.getElementById("frm2000:sched2:txtReceipt"+i).value;
            schedule2ToCommit[i].txtAmountPaid = d.getElementById("frm2000:sched2:txtAmountPaid"+i).value;
        }

        i = schedule2ToCommit.length;
        schedule2ToCommit[i] = new Schedule2();
        $('#tblSched2').html("");
        
        for(i = 0; i < schedule2ToCommit.length; i++) {

            $('#tblSched2').html(d.getElementById('tblSched2').innerHTML + "<tr>" +
            "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkSchedule2Delete" + i + "' name='chkSchedule2Delete" + i + "'></font></td>" + 
            "<td align='center'><input onblur='' type='text' value='" + schedule2ToCommit[i].txtPaymentDate + "' style='color: black; text-align: right;' size='20' maxlength='10' id='frm2000:sched2:txtPaymentDate" + i + "' name='frm2000:sched2:txtPaymentDate[]' onkeypress='return wholenumber(this, event)' onkeydown='dateMasking(this);' /></td>" +
            "<td align='center'><input type='text' value='" + schedule2ToCommit[i].txtReceiptNo + "' style='color: black; text-align: right;' size='40' maxlength='20' id='frm2000:sched2:txtReceipt" + i + "'  name='frm2000:sched2:txtReceipt[]'onkeypress='return letternumber(event)' /></td>" + 
            "<td align='center'><input type='text' value='" + schedule2ToCommit[i].txtAmountPaid + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched2:txtAmountPaid" + i + "' name='frm2000:sched2:txtAmountPaid[]' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSchedule2()' /></td>" + 
            "</tr>");
        }
    }

    function deleteSchedule2() {

        var scheduleTemp = new Array();
        var rowCount = d.getElementById("tblSched2").rows.length;
        for(var i = 0; i < rowCount; i++ ) {
            
            schedule2ToCommit[i] = new Schedule2();
            schedule2ToCommit[i].txtPaymentDate = d.getElementById("frm2000:sched2:txtPaymentDate"+i).value;
            schedule2ToCommit[i].txtReceiptNo = d.getElementById("frm2000:sched2:txtReceipt"+i).value;
            schedule2ToCommit[i].txtAmountPaid = d.getElementById("frm2000:sched2:txtAmountPaid"+i).value;
        }
        i = 0;
        for(var j = 0; j < rowCount; j++ ) {
            if(!d.getElementById("chkSchedule2Delete" + j).checked) {
                scheduleTemp[i++] = schedule2ToCommit[j];
            }
        }

        if(scheduleTemp.length > 0) {
            schedule2ToCommit = new Array();
            
            $('#tblSched2').html("");

            for(i = 0; i < scheduleTemp.length; i++) {
                schedule2ToCommit[i] = scheduleTemp[i];

                $('#tblSched2').html(d.getElementById('tblSched2').innerHTML + "<tr>" +
                "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkSchedule2Delete" + i + "'></font></td>" + 
                "<td align='center'><input onblur='' type='text' value='" + schedule2ToCommit[i].txtPaymentDate + "' style='color: black; text-align: right;' size='20' maxlength='10' id='frm2000:sched2:txtPaymentDate" + i + "' onkeypress='return wholenumber(this, event)' onkeydown='dateMasking(this);' /></td>" +
                "<td align='center'><input type='text' value='" + schedule2ToCommit[i].txtReceiptNo + "' style='color: black; text-align: right;' size='40' maxlength='20' id='frm2000:sched2:txtReceipt" + i + "' onkeypress='return letternumber(event)' /></td>" + 
                "<td align='center'><input type='text' value='" + schedule2ToCommit[i].txtAmountPaid + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched2:txtAmountPaid" + i + "' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSchedule2()' /></td>" + 
                "</tr>");
            }
        } else {
            schedule2ToCommit = new Array();
            $('#tblSched2').html("");
        }
        computeSchedule2();
    } 

    function enableSchedule3() {
        for (var i=0;i<d.getElementById("tblSched3").rows.length;i++) {
            d.getElementById("frm2000:sched3:txtPaymentDate"+i).disabled = false;
            d.getElementById("frm2000:sched3:txtReceipt"+i).disabled = false;
            d.getElementById("frm2000:sched3:txtAmountPaid"+i).disabled = false;
        }

        d.getElementById("frm2000:btnSched3Add").disabled = false;
        d.getElementById("frm2000:btnSched3Delete").disabled = false;
    }

    function disableSchedule3() {
        for (var i=0;i<d.getElementById("tblSched3").rows.length;i++) {
            d.getElementById("frm2000:sched3:txtPaymentDate"+i).disabled = true;
            d.getElementById("frm2000:sched3:txtPaymentDate"+i).value = "";
            d.getElementById("frm2000:sched3:txtReceipt"+i).disabled = true;
            d.getElementById("frm2000:sched3:txtReceipt"+i).value = "";
            d.getElementById("frm2000:sched3:txtAmountPaid"+i).disabled = true;
            d.getElementById("frm2000:sched3:txtAmountPaid"+i).value = "0.00";
        } 

        d.getElementById("frm2000:btnSched3Add").disabled = true;
        d.getElementById("frm2000:btnSched3Delete").disabled = true;
        computeSchedule3();
    }

    function loadSchedule3() {
        var paymentDate = String($("#response").html()).split("frm2000:sched3:txtPaymentDate");  //paymentdate
        var receipt = String($("#response").html()).split("frm2000:sched3:txtReceipt");  //receipt
        var amountPaid = String($("#response").html()).split("frm2000:sched3:txtAmountPaid");  //amountpaid

        $('#tblSched3').html("");

        var i = 0;
        for(var j = 0; j < paymentDate.length; j++) {
            if (j % 2 != 0) {//to not get other div splits
                
                //get values
                schedule3ToCommit[i] = new Schedule3();
                schedule3ToCommit[i].txtPaymentDate = paymentDate[j].split('=')[1];
                schedule3ToCommit[i].txtReceiptNo = receipt[j].split('=')[1];
                schedule3ToCommit[i].txtAmountPaid = amountPaid[j].split('=')[1];
                
                i++;
            }
        }

        for (x=0;x< schedule3ToCommit.length;x++) {  

            $('#tblSched3').html(d.getElementById('tblSched3').innerHTML + "<tr>" +
            "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkSchedule3Delete" + x + "'></font></td>" + 
            "<td align='center'><input onblur='' type='text' value='" + schedule3ToCommit[x].txtPaymentDate + "' style='color: black; text-align: right;' size='20' maxlength='10' id='frm2000:sched3:txtPaymentDate" + x + "' onkeypress='return wholenumber(this, event)' onkeydown='dateMasking(this);' /></td>" +
            "<td align='center'><input type='text' value='" + schedule3ToCommit[x].txtReceiptNo + "' style='color: black; text-align: right;' size='40' maxlength='20' id='frm2000:sched3:txtReceipt" + x + "' onkeypress='return letternumber(event)' /></td>" + 
            "<td align='center'><input type='text' value='" + schedule3ToCommit[x].txtAmountPaid + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched3:txtAmountPaid" + x + "' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSchedule3()' /></td>" + 
            "</tr>");
        }
    }  

    function addSchedule3() {

        var rowCount = d.getElementById("tblSched3").rows.length;
        for(var i = 0; i < rowCount; i++ ) {
            
            schedule3ToCommit[i] = new Schedule3();
            schedule3ToCommit[i].txtPaymentDate = d.getElementById("frm2000:sched3:txtPaymentDate"+i).value;
            schedule3ToCommit[i].txtReceiptNo = d.getElementById("frm2000:sched3:txtReceipt"+i).value;
            schedule3ToCommit[i].txtAmountPaid = d.getElementById("frm2000:sched3:txtAmountPaid"+i).value;
        }

        i = schedule3ToCommit.length;
        schedule3ToCommit[i] = new Schedule3();
        $('#tblSched3').html("");

        for(i = 0; i < schedule3ToCommit.length; i++) {

            $('#tblSched3').html(d.getElementById('tblSched3').innerHTML + "<tr>" +
            "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkSchedule3Delete" + i + "' name='chkSchedule3Delete" + i + "'></font></td>" + 
            "<td align='center'><input onblur='' type='text' value='" + schedule3ToCommit[i].txtPaymentDate + "' style='color: black; text-align: right;' size='20' maxlength='10' id='frm2000:sched3:txtPaymentDate" + i + "' name='frm2000:sched3:txtPaymentDate[]' onkeypress='return wholenumber(this, event)' onkeydown='dateMasking(this);' /></td>" +
            "<td align='center'><input type='text' value='" + schedule3ToCommit[i].txtReceiptNo + "' style='color: black; text-align: right;' size='40' maxlength='20' id='frm2000:sched3:txtReceipt" + i + "'  name='frm2000:sched3:txtReceipt[]' onkeypress='return letternumber(event)' /></td>" + 
            "<td align='center'><input type='text' value='" + schedule3ToCommit[i].txtAmountPaid + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched3:txtAmountPaid" + i + "'  name='frm2000:sched3:txtAmountPaid[]' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSchedule3()' /></td>" + 
            "</tr>");
        }
    }

    function deleteSchedule3() {

        var scheduleTemp = new Array();
        var rowCount = d.getElementById("tblSched3").rows.length;
        for(var i = 0; i < rowCount; i++ ) {
            
            schedule3ToCommit[i] = new Schedule3();
            schedule3ToCommit[i].txtPaymentDate = d.getElementById("frm2000:sched3:txtPaymentDate"+i).value;
            schedule3ToCommit[i].txtReceiptNo = d.getElementById("frm2000:sched3:txtReceipt"+i).value;
            schedule3ToCommit[i].txtAmountPaid = d.getElementById("frm2000:sched3:txtAmountPaid"+i).value;
        }
        i = 0;
        for(var j = 0; j < rowCount; j++ ) {
            if(!d.getElementById("chkSchedule3Delete" + j).checked) {
                scheduleTemp[i++] = schedule3ToCommit[j];
            }
        }

        if(scheduleTemp.length > 0) {
            schedule3ToCommit = new Array();
            
            $('#tblSched3').html("");

            for(i = 0; i < scheduleTemp.length; i++) {
                schedule3ToCommit[i] = scheduleTemp[i];

                $('#tblSched3').html(d.getElementById('tblSched3').innerHTML + "<tr>" +
                "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkSchedule3Delete" + i + "'></font></td>" + 
                "<td align='center'><input onblur='' type='text' value='" + schedule3ToCommit[i].txtPaymentDate + "' style='color: black; text-align: right;' size='20' maxlength='10' id='frm2000:sched3:txtPaymentDate" + i + "' onkeypress='return wholenumber(this, event)' onkeydown='dateMasking(this);' /></td>" +
                "<td align='center'><input type='text' value='" + schedule3ToCommit[i].txtReceiptNo + "' style='color: black; text-align: right;' size='40' maxlength='20' id='frm2000:sched3:txtReceipt" + i + "' onkeypress='return letternumber(event)' /></td>" + 
                "<td align='center'><input type='text' value='" + schedule3ToCommit[i].txtAmountPaid + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched3:txtAmountPaid" + i + "' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSchedule3()' /></td>" + 
                "</tr>");
            }
        } else {
            schedule3ToCommit = new Array();
            $('#tblSched3').html("");
        }
        computeSchedule3();
    } 

    function enableSchedule4() {
        for (var i=0;i<d.getElementById("tblSched4").rows.length;i++) {
            d.getElementById("frm2000:sched4:txtRCOCode"+i).disabled = false;
            d.getElementById("frm2000:sched4:txtRemittanceDate"+i).disabled = false;
            d.getElementById("frm2000:sched4:txtBank"+i).disabled = false;
            d.getElementById("frm2000:sched4:txtAmountRemitted"+i).disabled = false;
            d.getElementById("frm2000:sched4:txtNumberFrom"+i).disabled = false;
            d.getElementById("frm2000:sched4:txtNumberTo"+i).disabled = false;
        }

        d.getElementById("frm2000:btnSched4Add").disabled = false;
        d.getElementById("frm2000:btnSched4Delete").disabled = false;
    }

    function disableSchedule4() {
        for (var i=0;i<d.getElementById("tblSched4").rows.length;i++) {
            d.getElementById("frm2000:sched4:txtRCOCode"+i).disabled = true;
            d.getElementById("frm2000:sched4:txtRCOCode"+i).value = "";
            d.getElementById("frm2000:sched4:txtRemittanceDate"+i).disabled = true;
            d.getElementById("frm2000:sched4:txtRemittanceDate"+i).value = "";
            d.getElementById("frm2000:sched4:txtBank"+i).disabled = true;
            d.getElementById("frm2000:sched4:txtBank"+i).value = "";
            d.getElementById("frm2000:sched4:txtAmountRemitted"+i).disabled = true;
            d.getElementById("frm2000:sched4:txtAmountRemitted"+i).value = "0.00";
            d.getElementById("frm2000:sched4:txtNumberFrom"+i).disabled = true;
            d.getElementById("frm2000:sched4:txtNumberFrom"+i).value = "";
            d.getElementById("frm2000:sched4:txtNumberTo"+i).disabled = true;
            d.getElementById("frm2000:sched4:txtNumberTo"+i).value = "";
        } 

        d.getElementById("frm2000:btnSched4Add").disabled = true;
        d.getElementById("frm2000:btnSched4Delete").disabled = true;
        computeSchedule4();
    }

    function loadSchedule4() {
        var rcoCode = String($("#response").html()).split("frm2000:sched4:txtRCOCode");  //rcocode
        var remittanceDate = String($("#response").html()).split("frm2000:sched4:txtRemittanceDate");  //remittancedate
        var bank = String($("#response").html()).split("frm2000:sched4:txtBank");  //bank
        var amountRemitted = String($("#response").html()).split("frm2000:sched4:txtAmountRemitted");  //amountremitted
        var numberFrom = String($("#response").html()).split("frm2000:sched4:txtNumberFrom");  //numberfrom
        var numberTo = String($("#response").html()).split("frm2000:sched4:txtNumberTo");  //numberto

        $('#tblSched4').html("");

        var i = 0;
        for(var j = 0; j < rcoCode.length; j++) {
            if (j % 2 != 0) {//to not get other div splits
                
                //get values
                schedule4ToCommit[i] = new Schedule4();
                schedule4ToCommit[i].txtRCOCode = rcoCode[j].split('=')[1];
                schedule4ToCommit[i].txtRemittanceDate = remittanceDate[j].split('=')[1];
                schedule4ToCommit[i].txtBank = bank[j].split('=')[1];
                schedule4ToCommit[i].txtAmountRemitted = amountRemitted[j].split('=')[1];
                schedule4ToCommit[i].txtNumberFrom = numberFrom[j].split('=')[1];
                schedule4ToCommit[i].txtNumberTo = numberTo[j].split('=')[1];
                
                i++;
            }
        }

        for (x=0;x< schedule4ToCommit.length;x++) {  

            $('#tblSched4').html(d.getElementById('tblSched4').innerHTML + "<tr>" +
            "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkSchedule4Delete" + x + "'></font></td>" + 
            "<td width='13%' align='center'><input type='text' value='" + schedule4ToCommit[x].txtRCOCode + "' style='color: black; text-align: right;' size='8' maxlength='10' id='frm2000:sched4:txtRCOCode" + x + "' /></td>" + 
            "<td align='center'><input onblur='' type='text' value='" + schedule4ToCommit[x].txtRemittanceDate + "' style='color: black; text-align: right;' size='10' maxlength='10' id='frm2000:sched4:txtRemittanceDate" + x + "' onkeypress='return wholenumber(this, event)' onkeydown='dateMasking(this);' /></td>" + 
            "<td align='center'><input type='text' value='" + schedule4ToCommit[x].txtBank + "' style='color: black; text-align: right;' size='10' maxlength='20' id='frm2000:sched4:txtBank"+ x +"' /></td>" + 
            "<td align='center'><input type='text' value='" + schedule4ToCommit[x].txtAmountRemitted + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched4:txtAmountRemitted" + x + "' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSchedule4()' /></td>" + 
            "<td align='center'><input onblur='' type='text' value='" + schedule4ToCommit[x].txtNumberFrom + "' style='color: black; text-align: right;' size='10' maxlength='10' id='frm2000:sched4:txtNumberFrom" + x + "' onkeypress='return wholenumber(this, event)' /></td>" + 
            "<td align='center'><input onblur='' type='text' value='" + schedule4ToCommit[x].txtNumberTo + "' style='color: black; text-align: right;' size='10' maxlength='10' id='frm2000:sched4:txtNumberTo" + x + "' onkeypress='return wholenumber(this, event)' /></td>" + 
            "</tr>");
        }
    } 

    function addSchedule4() {

        var rowCount = d.getElementById("tblSched4").rows.length;
        for(var i = 0; i < rowCount; i++ ) {
            
            schedule4ToCommit[i] = new Schedule4();
            schedule4ToCommit[i].txtRCOCode = d.getElementById("frm2000:sched4:txtRCOCode"+i).value;
            schedule4ToCommit[i].txtRemittanceDate = d.getElementById("frm2000:sched4:txtRemittanceDate"+i).value;
            schedule4ToCommit[i].txtBank = d.getElementById("frm2000:sched4:txtBank"+i).value;
            schedule4ToCommit[i].txtAmountRemitted = d.getElementById("frm2000:sched4:txtAmountRemitted"+i).value;
            schedule4ToCommit[i].txtNumberFrom = d.getElementById("frm2000:sched4:txtNumberFrom"+i).value;
            schedule4ToCommit[i].txtNumberTo = d.getElementById("frm2000:sched4:txtNumberTo"+i).value;
        }

        i = schedule4ToCommit.length;
        schedule4ToCommit[i] = new Schedule4();
        $('#tblSched4').html("");

        for(i = 0; i < schedule4ToCommit.length; i++) {

            $('#tblSched4').html(d.getElementById('tblSched4').innerHTML + "<tr>" +
            "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkSchedule4Delete" + i + "' name='chkSchedule4Delete" + i + "'></font></td>" + 
            "<td width='13%' align='center'><input type='text' value='" + schedule4ToCommit[i].txtRCOCode + "' style='color: black; text-align: right;' size='8' maxlength='10' id='frm2000:sched4:txtRCOCode" + i + "' name='frm2000:sched4:txtRCOCode[]' /></td>" + 
            "<td align='center'><input onblur='' type='text' value='" + schedule4ToCommit[i].txtRemittanceDate + "' style='color: black; text-align: right;' size='10' maxlength='10' id='frm2000:sched4:txtRemittanceDate" + i + "' name='frm2000:sched4:txtRemittanceDate[]' onkeypress='return wholenumber(this, event)' onkeydown='dateMasking(this);' /></td>" + 
            "<td align='center'><input type='text' value='" + schedule4ToCommit[i].txtBank + "' style='color: black; text-align: right;' size='10' maxlength='20' id='frm2000:sched4:txtBank"+ i +"' name='frm2000:sched4:txtBank[]'  /></td>" + 
            "<td align='center'><input type='text' value='" + schedule4ToCommit[i].txtAmountRemitted + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched4:txtAmountRemitted" + i + "' name='frm2000:sched4:txtAmountRemitted[]' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSchedule4()' /></td>" + 
            "<td align='center'><input onblur='' type='text' value='" + schedule4ToCommit[i].txtNumberFrom + "' style='color: black; text-align: right;' size='10' maxlength='10' id='frm2000:sched4:txtNumberFrom" + i + "'  name='frm2000:sched4:txtNumberFrom[]' onkeypress='return wholenumber(this, event)' /></td>" + 
            "<td align='center'><input onblur='' type='text' value='" + schedule4ToCommit[i].txtNumberTo + "' style='color: black; text-align: right;' size='10' maxlength='10' id='frm2000:sched4:txtNumberTo" + i + "' name='frm2000:sched4:txtNumberTo[]'  onkeypress='return wholenumber(this, event)' /></td>" + 
            "</tr>");
        }
    }

    function deleteSchedule4() {

        var scheduleTemp = new Array();
        var rowCount = d.getElementById("tblSched4").rows.length;
        for(var i = 0; i < rowCount; i++ ) {
            
            schedule4ToCommit[i] = new Schedule4();
            schedule4ToCommit[i].txtRCOCode = d.getElementById("frm2000:sched4:txtRCOCode"+i).value;
            schedule4ToCommit[i].txtRemittanceDate = d.getElementById("frm2000:sched4:txtRemittanceDate"+i).value;
            schedule4ToCommit[i].txtBank = d.getElementById("frm2000:sched4:txtBank"+i).value;
            schedule4ToCommit[i].txtAmountRemitted = d.getElementById("frm2000:sched4:txtAmountRemitted"+i).value;
            schedule4ToCommit[i].txtNumberFrom = d.getElementById("frm2000:sched4:txtNumberFrom"+i).value;
            schedule4ToCommit[i].txtNumberTo = d.getElementById("frm2000:sched4:txtNumberTo"+i).value;
        }
        i = 0;
        for(var j = 0; j < rowCount; j++ ) {
            if(!d.getElementById("chkSchedule4Delete" + j).checked) {
                scheduleTemp[i++] = schedule4ToCommit[j];
            }
        }

        if(scheduleTemp.length > 0) {
            schedule4ToCommit = new Array();
            
            $('#tblSched4').html("");

            for(i = 0; i < scheduleTemp.length; i++) {
                schedule4ToCommit[i] = scheduleTemp[i];

                $('#tblSched4').html(d.getElementById('tblSched4').innerHTML + "<tr>" +
                "<td width='2%'><font size='1' style='font-weight:bold'><input type='checkbox'  id='chkSchedule4Delete" + i + "'></font></td>" + 
                "<td width='13%' align='center'><input type='text' value='" + schedule4ToCommit[i].txtRCOCode + "' style='color: black; text-align: right;' size='8' maxlength='10' id='frm2000:sched4:txtRCOCode" + i + "' /></td>" + 
                "<td align='center'><input onblur='' type='text' value='" + schedule4ToCommit[i].txtRemittanceDate + "' style='color: black; text-align: right;' size='10' maxlength='10' id='frm2000:sched4:txtRemittanceDate" + i + "' onkeypress='return wholenumber(this, event)' onkeydown='dateMasking(this);' /></td>" + 
                "<td align='center'><input type='text' value='" + schedule4ToCommit[i].txtBank + "' style='color: black; text-align: right;' size='10' maxlength='20' id='frm2000:sched4:txtBank"+ i +"' /></td>" + 
                "<td align='center'><input type='text' value='" + schedule4ToCommit[i].txtAmountRemitted + "' style='color: black; text-align: right;' size='21' maxlength='25' id='frm2000:sched4:txtAmountRemitted" + i + "' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSchedule4()' /></td>" + 
                "<td align='center'><input onblur='' type='text' value='" + schedule4ToCommit[i].txtNumberFrom + "' style='color: black; text-align: right;' size='10' maxlength='10' id='frm2000:sched4:txtNumberFrom" + i + "' onkeypress='return wholenumber(this, event)' /></td>" + 
                "<td align='center'><input onblur='' type='text' value='" + schedule4ToCommit[i].txtNumberTo + "' style='color: black; text-align: right;' size='10' maxlength='10' id='frm2000:sched4:txtNumberTo" + i + "' onkeypress='return wholenumber(this, event)' /></td>" + 
                "</tr>");
            }
        } else {
            schedule4ToCommit = new Array();
            $('#tblSched4').html("");
        }
        computeSchedule4();
    } 

    
    function computeTax15D() {
        d.getElementById("frm2000:txtTax15D").value = formatCurrency(NumWithComma(d.getElementById("frm2000:txtTax15A").value)*1 + NumWithComma(d.getElementById("frm2000:txtTax15B").value)*1 + NumWithComma(d.getElementById("frm2000:txtTax15C").value)*1);
        computeTax16();
    }

    function computeTax16() {
        d.getElementById("frm2000:txtTax16").value = formatCurrency(NumWithComma(d.getElementById("frm2000:txtTax14").value)*1 - NumWithComma(d.getElementById("frm2000:txtTax15D").value)*1);
        computeTotalAmtPayable();
    }

  function computePenalties()
  {        
        d.getElementById("frm2000:txtTax17D").value = formatCurrency(NumWithComma(d.getElementById("frm2000:txtTax17A").value)*1 + NumWithComma(d.getElementById("frm2000:txtTax17B").value)*1 + NumWithComma(d.getElementById("frm2000:txtTax17C").value)*1);
        computeTotalAmtPayable();
  }

    function computeTotalAmtPayable() {
        d.getElementById("frm2000:txtTax18").value = formatCurrency(NumWithComma(d.getElementById("frm2000:txtTax16").value)*1 + NumWithComma(d.getElementById("frm2000:txtTax17D").value)*1);
    }

    function computeSched1TaxDue(i) {

        var atcInputTaxbase = NumWithComma(d.getElementById('frm2000:sched1:txtTaxBase'+i).value);
        switch (d.getElementById('drpATCCode'+i).value) {
            case "DS101":
                var roundTaxBase = (atcInputTaxbase / 200) * 2;                
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma(roundTaxBase.toFixed(2).toString()));
                break;

            case "DS102":
                var roundTaxBase = (atcInputTaxbase / 200) * 1.50;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma(roundTaxBase.toFixed(2).toString()));
                break;

            case "DS103":
                var roundTaxBase = (atcInputTaxbase) * 0.75;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value =  formatCurrency(NumWithComma((roundTaxBase).toFixed(2)));
                break;

            case "DS104":
                var roundTaxBase = (atcInputTaxbase / 200) * 1;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma(roundTaxBase.toFixed(2).toString()));
                break;

            case "DS105":
                var taxBase = (atcInputTaxbase) * 3;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value =  formatCurrency(NumWithComma((taxBase).toFixed(2)));
                break;

            case "DS106":
                var roundTaxBase = (atcInputTaxbase / 200) * 1.50;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma(roundTaxBase.toFixed(2).toString()));
                break;

            case "DS107":               
            case "DS108":
            case "DS126":
                var roundTaxBase = (atcInputTaxbase / 200) * 0.60;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma(roundTaxBase.toFixed(2).toString()));
                break;

            case "DS109":
                /* original code */
                // var roundTaxBase = Math.ceil(atcInputTaxbase / 200) * 0.50;
                // d.getElementById('frm2000:txt12D').value = formatCurrency(NumWithComma(roundTaxBase.toFixed(2).toString()));
                // new code as of January 2018
                if(atcInputTaxbase <= 100000) {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((0).toFixed(2)));
                } else if(atcInputTaxbase > 100000 && atcInputTaxbase <= 300000) {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((20).toFixed(2)));
                } else if(atcInputTaxbase > 300000 && atcInputTaxbase <= 500000) {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((50).toFixed(2)));
                } else if(atcInputTaxbase > 500000 && atcInputTaxbase <= 750000) {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((100).toFixed(2)));
                } else if(atcInputTaxbase > 750000 && atcInputTaxbase <= 1000000) {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((150).toFixed(2)));
                } else if(atcInputTaxbase > 1000000){
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((200).toFixed(2)));
                }
                break;

            case "DS110":
            case "DS111":
                var roundTaxBase = (atcInputTaxbase / 4) * 0.50;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma(roundTaxBase.toFixed(2).toString()));
                break;

            case "DS112":
                if (document.getElementById('frm2000:sched1:txtTaxRate'+i).value == 'P1.00/P200') {
                    var roundTaxBase = (atcInputTaxbase / 200) * 1;
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma(roundTaxBase.toFixed(2).toString()));
                } else if (document.getElementById('frm2000:sched1:txtTaxRate'+i).value == 'P0.40/P200') {
                    var roundTaxBase = (atcInputTaxbase / 200) * 0.40;
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma(roundTaxBase.toFixed(2).toString()));
                }
                break;

            case "DS113":
                var roundTaxBase = (atcInputTaxbase / 4) * 0.30;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma(roundTaxBase.toFixed(2).toString()));
                break;

            case "DS114":
                var taxDue = atcInputTaxbase * 30;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((taxDue).toFixed(2)));
                break;
            
            case "DS115":
                if (atcInputTaxbase <= 200) {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((0).toFixed(2)));
                } else if (atcInputTaxbase > 200) {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((30).toFixed(2)));
                }
                break;

            case "DS116":
                var roundTaxBase = (atcInputTaxbase / 1) * 0.20;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma(roundTaxBase.toFixed(2).toString()));
                break;

            case "DS117":
                // added January 10, 2018
                if (atcInputTaxbase < 100) {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((0).toFixed(2)));
                } else if (atcInputTaxbase > 100 && atcInputTaxbase <= 1000) {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((2).toFixed(2)));
                } else if (atcInputTaxbase > 1000) {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((20).toFixed(2)));
                }
                break;

            case "DS118":
                var taxDue = atcInputTaxbase * 30;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value =  formatCurrency(NumWithComma((taxDue).toFixed(2)));
                break;

            case "DS119":
                var taxDue = atcInputTaxbase * 10;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value =  formatCurrency(NumWithComma((taxDue).toFixed(2)));
                break;

            case "DS120":
                if(atcInputTaxbase <= 2000 && atcInputTaxbase >= 1 ){
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((6).toFixed(2)));
                }else if(atcInputTaxbase > 2000){
                    var taxDue = 6 + (((atcInputTaxbase - 2000) / 1000) * 2);
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((taxDue).toFixed(2)));
                }else{
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((0).toFixed(2)));
                }
                break;
                // var roundTaxBase = Math.ceil(atcInputTaxbase / 1) * 0.10;
                // d.getElementById('frm2000:txt12D').value = formatCurrency(NumWithComma(roundTaxBase.toFixed(2).toString()));

                // if (atcInputTaxbase <= 2000)
                //     d.getElementById('frm2000:txt12D').value = formatCurrency(NumWithComma((6).toFixed(2).toString()));
                // else if (atcInputTaxbase > 2000) {
                //     var roundTaxBase = Math.ceil((atcInputTaxbase - 2000) / 1000) * 2;
                //     d.getElementById('frm2000:txt12D').value = formatCurrency(NumWithComma((6 + roundTaxBase).toFixed(2)).toString());
                // }

                // break;

            case "DS121":
                if(atcInputTaxbase <= 5000 && atcInputTaxbase >= 1 ){
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((40).toFixed(2)));
                }else if(atcInputTaxbase > 5000){
                    var taxDue = 40 + (((atcInputTaxbase - 5000) / 5000) * 20);
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((taxDue).toFixed(2)));
                }else{
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((0).toFixed(2)));
                }
                break;
                // if (atcInputTaxbase == 5000){
                //     d.getElementById('frm2000:txt12D').value = formatCurrency(NumWithComma((40).toFixed(2).toString()));
                // }
                // else if (atcInputTaxbase > 5000) {
                //     var roundTaxBase = Math.ceil((atcInputTaxbase - 5000) / 5000) * 20;
                //     d.getElementById('frm2000:txt12D').value = formatCurrency(NumWithComma((40 + roundTaxBase).toFixed(2)).toString());
                // } else {
                //     d.getElementById('frm2000:txt12D').value = formatCurrency(NumWithComma((0).toFixed(2)));
                // }
                // break;

            case "DS124":
                var taxDue = atcInputTaxbase * 0.15;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value =  formatCurrency(NumWithComma((taxDue).toFixed(2)));
                break;

            // DS130, DS131, DS132 added January 10, 2018
            case "DS130":
                if (atcInputTaxbase == 6) {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((1000).toFixed(2).toString()));
                } else if (atcInputTaxbase > 6) {
                    var excessMonth = (atcInputTaxbase - 6) * 100;
                    var tax = 1000 + excessMonth;
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((tax).toFixed(2).toString()));
                } else {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((0).toFixed(2).toString()));
                }
                break;
            case "DS131":
                if (atcInputTaxbase == 6) {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((2000).toFixed(2).toString()));
                } else if (atcInputTaxbase > 6) {
                    var excessMonth = (atcInputTaxbase - 6) * 200;
                    var tax = 2000 + excessMonth;
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((tax).toFixed(2).toString()));
                } else {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((0).toFixed(2).toString()));
                }
                break;
            case "DS132":
                if (atcInputTaxbase == 6) {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((3000).toFixed(2).toString()));
                } else if (atcInputTaxbase > 6) {
                    var excessMonth = (atcInputTaxbase - 6) * 300;
                    var tax = 3000 + excessMonth;
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((tax).toFixed(2).toString()));
                } else {
                    d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((0).toFixed(2).toString()));
                }
                break;
            case "DS125":
                var result = atcInputTaxbase * 0.50;
                d.getElementById('frm2000:sched1:txtTaxDue'+i).value = formatCurrency(NumWithComma((result).toFixed(2).toString()));
                break;
            default:
                break;
        }

        computeSchedule1();
    }

    //TO DO
    function computeSchedule1() {
        d.getElementById("frm2000:sched1:txtTotalDue1").value = "0.00";

        for(var i=0;i<d.getElementById("tblSched1").rows.length;i++) {
            d.getElementById("frm2000:sched1:txtTotalDue1").value = formatCurrency(NumWithComma(d.getElementById("frm2000:sched1:txtTotalDue1").value)*1 + NumWithComma(d.getElementById("frm2000:sched1:txtTaxDue"+i).value)*1);
        }

        d.getElementById("frm2000:txtTax14").value = d.getElementById("frm2000:sched1:txtTotalDue1").value;
        computeTax16();
    }

    function computeSchedule2() {
        d.getElementById("frm2000:sched2:txtTotalPayment1").value = "0.00";

        for(var i=0;i<d.getElementById("tblSched2").rows.length;i++) {
            d.getElementById("frm2000:sched2:txtTotalPayment1").value = formatCurrency(NumWithComma(d.getElementById("frm2000:sched2:txtTotalPayment1").value)*1 + NumWithComma(d.getElementById("frm2000:sched2:txtAmountPaid"+i).value)*1);
        }

        d.getElementById("frm2000:txtTax15B").value = d.getElementById("frm2000:sched2:txtTotalPayment1").value;
        computeTax15D();
    }

    function computeSchedule3() {
        d.getElementById("frm2000:sched3:txtTotalPayment1").value = "0.00";

        for(var i=0;i<d.getElementById("tblSched3").rows.length;i++) {
            d.getElementById("frm2000:sched3:txtTotalPayment1").value = formatCurrency(NumWithComma(d.getElementById("frm2000:sched3:txtTotalPayment1").value)*1 + NumWithComma(d.getElementById("frm2000:sched3:txtAmountPaid"+i).value)*1);
        }

        d.getElementById("frm2000:txtTax15C").value = d.getElementById("frm2000:sched3:txtTotalPayment1").value;
        computeTax15D();
    }

    function computeSchedule4() {
        d.getElementById("frm2000:sched4:txtTotalRemittance1").value = "0.00";

        for(var i=0;i<d.getElementById("tblSched4").rows.length;i++) {
            d.getElementById("frm2000:sched4:txtTotalRemittance1").value = formatCurrency(NumWithComma(d.getElementById("frm2000:sched4:txtTotalRemittance1").value)*1 + NumWithComma(d.getElementById("frm2000:sched4:txtAmountRemitted"+i).value)*1);
        }

        d.getElementById("frm2000:txtTax19").value = d.getElementById("frm2000:sched4:txtTotalRemittance1").value;
    }

    /*-------------------------------*/
  
    function ifAllowedSched1()
    {   var tax13B = parseInt(d.getElementById('frm2000:txt13B').value);
        var tax13C = parseInt(d.getElementById('frm2000:txt13C').value);
        if(tax13B > 0 || tax13C > 0) {
            d.getElementById("btnSched1ATC").disabled = false;
        }else {
            d.getElementById("btnSched1ATC").disabled = true;
        }
    }

    function checkDateSched2() {

        var dt = new Date();

        for (var i=0;i<d.getElementById("tblSched2").rows.length;i++) {
            var payDate = d.getElementById("frm2000:sched2:txtPaymentDate"+i).value;

            if (payDate != "") {
                var resultPayDate = payDate.split("/");
                var isLeap = new Date(resultPayDate[2], 1, 29).getMonth() === 1;
                var month31 = (['01', '1', '03', '3', '05', '5', '07', '7', '08', '8', '10', '12']);
                var month30 = (['04', '4', '06', '6', '09', '9', '11']);

                if (resultPayDate.length != 3) {
                    alert("Invalid date entry in Schedule 2, column 1 row "+i+".Format should be MM/DD/YYYY");
                    return false;
                } else if (resultPayDate[0] > 12 || resultPayDate[0] < 1) {
                    alert("Please enter a valid date in Schedule 2, column 1 row "+i+".");
                    return false;
                } else if(resultPayDate[1] > 31 || resultPayDate[1] < 1) {
                    alert("Please enter a valid date in Schedule 2, column 1 row "+i+".");
                    return false;
                } else if(resultPayDate[2] > dt.getFullYear()) {
                    alert("Please enter a valid date in Schedule 2, column 1 row "+i+".");
                    return false;
                } else if((resultPayDate[0] == 2 || resultPayDate[0] == 02) && (!isLeap && resultPayDate[1] == 29)) {
                    alert("Please enter a valid date in Schedule 2, column 1 row "+i+".");
                    return false;
                } else if((resultPayDate[0] == 2 || resultPayDate[0] == 02) && (!isLeap && resultPayDate[1] > 29)) {
                    alert("Please enter a valid date in Schedule 2, column 1 row "+i+".");
                    return false;
                } else if((resultPayDate[0] == 2 || resultPayDate[0] == 02) && (isLeap && resultPayDate[1] > 29)) {
                    alert("Please enter a valid date in Schedule 2, column 1 row "+i+".");
                    return false;  
                } else if(month31.contains(resultPayDate[0]) && resultPayDate[1] > 31) {
                    alert("Please enter a valid date in Schedule 2, column 1 row "+i+".");
                    return false;
                } else if(month30.contains(resultPayDate[0]) && resultPayDate[1] > 30) {
                    alert("Please enter a valid date in Schedule 2, column 1 row "+i+".");
                    return false;
                }
            }
        }
        return true;
    }

    function checkDateSched3() {

        var dt = new Date();

        for (var i=0;i<d.getElementById("tblSched3").rows.length;i++) {
            var payDate = d.getElementById("frm2000:sched3:txtPaymentDate"+i).value;

            if (payDate != "") {
                var resultPayDate = payDate.split("/");
                var isLeap = new Date(resultPayDate[2], 1, 29).getMonth() === 1;
                var month31 = (['01', '1', '03', '3', '05', '5', '07', '7', '08', '8', '10', '12']);
                var month30 = (['04', '4', '06', '6', '09', '9', '11']);

                if (resultPayDate.length != 3) {
                    alert("Invalid date entry in Schedule 3, column 1 row "+i+".Format should be MM/DD/YYYY");
                    return false;
                } else if (resultPayDate[0] > 12 || resultPayDate[0] < 1) {
                    alert("Please enter a valid date in Schedule 3, column 1 row "+i+".");
                    return false;
                } else if(resultPayDate[1] > 31 || resultPayDate[1] < 1) {
                    alert("Please enter a valid date in Schedule 3, column 1 row "+i+".");
                    return false;
                } else if(resultPayDate[2] > dt.getFullYear()) {
                    alert("Please enter a valid date in Schedule 3, column 1 row "+i+".");
                    return false;
                } else if((resultPayDate[0] == 2 || resultPayDate[0] == 02) && (!isLeap && resultPayDate[1] == 29)) {
                    alert("Please enter a valid date in Schedule 3, column 1 row "+i+".");
                    return false;
                } else if((resultPayDate[0] == 2 || resultPayDate[0] == 02) && (!isLeap && resultPayDate[1] > 29)) {
                    alert("Please enter a valid date in Schedule 3, column 1 row "+i+".");
                    return false;
                } else if((resultPayDate[0] == 2 || resultPayDate[0] == 02) && (isLeap && resultPayDate[1] > 29)) {
                    alert("Please enter a valid date in Schedule 3, column 1 row "+i+".");
                    return false;  
                } else if(month31.contains(resultPayDate[0]) && resultPayDate[1] > 31) {
                    alert("Please enter a valid date in Schedule 3, column 1 row "+i+".");
                    return false;
                } else if(month30.contains(resultPayDate[0]) && resultPayDate[1] > 30) {
                    alert("Please enter a valid date in Schedule 3, column 1 row "+i+".");
                    return false;
                }
            }
        }
        return true;
    }

    function checkDateSched4() {

        var dt = new Date();

        for (var i=0;i<d.getElementById("tblSched4").rows.length;i++) {
            var payDate = d.getElementById("frm2000:sched4:txtRemittanceDate"+i).value;

            if (payDate != "") {
                var resultPayDate = payDate.split("/");
                var isLeap = new Date(resultPayDate[2], 1, 29).getMonth() === 1;
                var month31 = (['01', '1', '03', '3', '05', '5', '07', '7', '08', '8', '10', '12']);
                var month30 = (['04', '4', '06', '6', '09', '9', '11']);

                if (resultPayDate.length != 3) {
                    alert("Invalid date entry in Schedule 4, column 2 row "+i+".Format should be MM/DD/YYYY");
                    return false;
                } else if (resultPayDate[0] > 12 || resultPayDate[0] < 1) {
                    alert("Please enter a valid date in Schedule 4, column 2 row "+i+".");
                    return false;
                } else if(resultPayDate[1] > 31 || resultPayDate[1] < 1) {
                    alert("Please enter a valid date in Schedule 4, column 2 row "+i+".");
                    return false;
                } else if(resultPayDate[2] > dt.getFullYear()) {
                    alert("Please enter a valid date in Schedule 4, column 2 row "+i+".");
                    return false;
                } else if((resultPayDate[0] == 2 || resultPayDate[0] == 02) && (!isLeap && resultPayDate[1] == 29)) {
                    alert("Please enter a valid date in Schedule 4, column 2 row "+i+".");
                    return false;
                } else if((resultPayDate[0] == 2 || resultPayDate[0] == 02) && (!isLeap && resultPayDate[1] > 29)) {
                    alert("Please enter a valid date in Schedule 4, column 2 row "+i+".");
                    return false;
                } else if((resultPayDate[0] == 2 || resultPayDate[0] == 02) && (isLeap && resultPayDate[1] > 29)) {
                    alert("Please enter a valid date in Schedule 4, column 2 row "+i+".");
                    return false;  
                } else if(month31.contains(resultPayDate[0]) && resultPayDate[1] > 31) {
                    alert("Please enter a valid date in Schedule 4, column 2 row "+i+".");
                    return false;
                } else if(month30.contains(resultPayDate[0]) && resultPayDate[1] > 30) {
                    alert("Please enter a valid date in Schedule 4, column 2 row "+i+".");
                    return false;
                }
            }
        }
        return true;
    }

    function validate() {
        var dt = new Date();
        //var day = d.getElementById("frm2000:txtDate").value;
        var year =  parseInt(d.getElementById("frm2000:txtYear").value);

        if(d.getElementById("frm2000:txtMonth").value == "00"){
            alert("Please select a valid month in Item 1.");
            return;
        }
        if(d.getElementById("frm2000:txtYear").value.length ==0){
            alert("Please enter a valid year in Item 1.");
            return;
        }else if(year < 2018){
            alert("Please file using the old version of the form.");
            return;
        }
        else if(year > dt.getFullYear()){
            alert("Year (Item 1) cannot be greater than or equal to current year.");
            return;
        } 

        if( (d.getElementById('frm2000:txtTIN1').value == "" || d.getElementById('frm2000:txtTIN2').value == "" || d.getElementById('frm2000:txtTIN3').value == "" || d.getElementById('frm2000:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 4.");
            return;
        }   
     
    if( (d.getElementById('frm2000:txtTaxpayerName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 6.");
            return;
        }
    if( (d.getElementById('frm2000:txtTelNum').value == "")  )
        {
            alert("Please enter a valid Telephone Number on Item 8.");
            return;
        }
    if( (d.getElementById('frm2000:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 7.");
            return;
        }     
    if( (d.getElementById('frm2000:txtZipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip Code on Item 7A.");
            return;
        }
        if (d.getElementById('frm2000:optParty_1').checked == false && d.getElementById('frm2000:optParty_2').checked == false && d.getElementById('frm2000:optParty_3').checked == false) {
            alert("Please select an option in Item 10.");
            return;
        }
        if ((d.getElementById('frm2000:optParty_1').checked == true || d.getElementById('frm2000:optParty_2').checked == true) && d.getElementById('frm2000:txtOtherTIN').value == "") {
            alert("Please enter a valid TIN in Item 12.");
            return;
        }
        if (d.getElementById('frm2000:optMode_1').checked == false && d.getElementById('frm2000:optMode_2').checked == false && d.getElementById('frm2000:optMode_3').checked == false) {
            alert("Please select an option in Item 13.");
            return;
        }
        if (d.getElementById('frm2000:optMode_1').checked == true && d.getElementById('frm2000:optMode_3').checked == true && d.getElementById('frm2000:txtTax18').value == "0.00") {
            alert("Zero payment shall not be allowed in Item 18 if eDST System and Loose Stamp are selected.");
            return;
        }
        if (d.getElementById('frm2000:optMode_2').checked == true) {
            if(!checkDateSched2() ) {
                return;
            }
        }
        if (d.getElementById('frm2000:optMode_1').checked == true) {
            if(!checkDateSched3() ) {
                return;
            }
        }
        if (d.getElementById('frm2000:optMode_3').checked == true) {
            if(!checkDateSched4() ) {
                return;
            }
        }
        
        
        disableAllControl();

        alert("Validation successful. Click on 'Edit' if you wish to modify your entries.");
    return;
    }

  var disableElem = true;
  var enableElem = false;
    function disableAllControl(){
        d.getElementById('frm2000:AmendedRtn_1').disabled = true;
        d.getElementById('frm2000:AmendedRtn_2').disabled = true;

        d.getElementById('frm2000:txtCurrentPage').disabled = true;
        d.getElementById("frm2000:cmdValidate").disabled = true;
        d.getElementById('btnPrint').disabled = false;
        d.getElementById("frm2000:cmdEdit").disabled = false;
        d.getElementById('frm2000:btnFinalCopy').disabled = false;
        d.getElementById("btnUpload").disabled = false;

        d.getElementById("frm2000:txtMonth").disabled = true;
        d.getElementById("frm2000:txtYear").disabled = true;
        d.getElementById('frm2000:txtSheets').disabled = true;
    
        d.getElementById('frm2000:txtTIN1').disabled = true;
        d.getElementById('frm2000:txtTIN2').disabled = true;
        d.getElementById('frm2000:txtTIN3').disabled = true;
        d.getElementById('frm2000:txtBranchCode').disabled = true;
        d.getElementById('frm2000:txtTaxpayerName').disabled = true;
        //d.getElementById('frm2000:txtLineBus').disabled = true;
        d.getElementById('txtEmail').disabled = true;
        d.getElementById('frm2000:txtRDOCode').disabled = true;
        d.getElementById('frm2000:txtTelNum').disabled = true;
        d.getElementById('frm2000:txtAddress').disabled = true;
        d.getElementById('frm2000:txtZipCode').disabled = true; 
    
        d.getElementById('frm2000:txtTax15A').disabled = true;  
        d.getElementById('frm2000:txtTax17A').disabled = true;  
        d.getElementById('frm2000:txtTax17B').disabled = true;  
        d.getElementById('frm2000:txtTax17C').disabled = true;  

        //schedule 1
        for (var i=0;i<d.getElementById("tblSched1").rows.length;i++) {
            d.getElementById("drpATCCode"+i).disabled = true;
            d.getElementById("frm2000:sched1:txtTaxBase"+i).disabled = true;
        } 
        d.getElementById("frm2000:btnSched1Add").disabled = true;
        d.getElementById("frm2000:btnSched1Delete").disabled = true;

        //schedule 2
        for (var i=0;i<d.getElementById("tblSched2").rows.length;i++) {
            d.getElementById("frm2000:sched2:txtPaymentDate"+i).disabled = true;
            d.getElementById("frm2000:sched2:txtReceipt"+i).disabled = true;
            d.getElementById("frm2000:sched2:txtAmountPaid"+i).disabled = true;
        } 
        d.getElementById("frm2000:btnSched2Add").disabled = true;
        d.getElementById("frm2000:btnSched2Delete").disabled = true;

        //schedule 3
        for (var i=0;i<d.getElementById("tblSched3").rows.length;i++) {
            d.getElementById("frm2000:sched3:txtPaymentDate"+i).disabled = true;
            d.getElementById("frm2000:sched3:txtReceipt"+i).disabled = true;
            d.getElementById("frm2000:sched3:txtAmountPaid"+i).disabled = true;
        } 
        d.getElementById("frm2000:btnSched3Add").disabled = true;
        d.getElementById("frm2000:btnSched3Delete").disabled = true;

        //schedule 4
        for (var i=0;i<d.getElementById("tblSched4").rows.length;i++) {
            d.getElementById("frm2000:sched4:txtRCOCode"+i).disabled = true;
            d.getElementById("frm2000:sched4:txtRemittanceDate"+i).disabled = true;
            d.getElementById("frm2000:sched4:txtBank"+i).disabled = true;
            d.getElementById("frm2000:sched4:txtAmountRemitted"+i).disabled = true;
            d.getElementById("frm2000:sched4:txtNumberFrom"+i).disabled = true;
            d.getElementById("frm2000:sched4:txtNumberTo"+i).disabled = true;
        } 
        d.getElementById("frm2000:btnSched4Add").disabled = true;
        d.getElementById("frm2000:btnSched4Delete").disabled = true;

    disableElem;
    enableElem;
    }

    function enableAllControl()
    {
        d.getElementById('frm2000:AmendedRtn_1').disabled = false;
        d.getElementById('frm2000:AmendedRtn_2').disabled = false;

        d.getElementById('frm2000:txtCurrentPage').disabled = false;
        d.getElementById("frm2000:cmdValidate").disabled = false;
        d.getElementById("btnPrint").disabled = true;
        d.getElementById("frm2000:cmdEdit").disabled = true;
        d.getElementById('frm2000:btnFinalCopy').disabled = true;
        d.getElementById("btnUpload").disabled = true;

        d.getElementById("frm2000:txtMonth").disabled = false;
        d.getElementById("frm2000:txtYear").disabled = false;
        d.getElementById('frm2000:txtSheets').disabled = false;
        
        if (d.getElementById("frm2000:AmendedRtn_1").checked) {
            d.getElementById('frm2000:txtTax15A').disabled = false; 
        }
        d.getElementById('frm2000:txtTax17A').disabled = false; 
        d.getElementById('frm2000:txtTax17B').disabled = false; 
        d.getElementById('frm2000:txtTax17C').disabled = false; 
    
        //schedule 1
        for (var i=0;i<d.getElementById("tblSched1").rows.length;i++) {
            d.getElementById("drpATCCode"+i).disabled = false;
            d.getElementById("frm2000:sched1:txtTaxBase"+i).disabled = false;
        } 
        d.getElementById("frm2000:btnSched1Add").disabled = false;
        d.getElementById("frm2000:btnSched1Delete").disabled = false;

        //schedule 2
        for (var i=0;i<d.getElementById("tblSched2").rows.length;i++) {
            d.getElementById("frm2000:sched2:txtPaymentDate"+i).disabled = false;
            d.getElementById("frm2000:sched2:txtReceipt"+i).disabled = false;
            d.getElementById("frm2000:sched2:txtAmountPaid"+i).disabled = false;
        } 
        d.getElementById("frm2000:btnSched2Add").disabled = false;
        d.getElementById("frm2000:btnSched2Delete").disabled = false;

        //schedule 3
        for (var i=0;i<d.getElementById("tblSched3").rows.length;i++) {
            d.getElementById("frm2000:sched3:txtPaymentDate"+i).disabled = false;
            d.getElementById("frm2000:sched3:txtReceipt"+i).disabled = false;
            d.getElementById("frm2000:sched3:txtAmountPaid"+i).disabled = false;
        } 
        d.getElementById("frm2000:btnSched3Add").disabled = false;
        d.getElementById("frm2000:btnSched3Delete").disabled = false;

        //schedule 4
        for (var i=0;i<d.getElementById("tblSched4").rows.length;i++) {
            d.getElementById("frm2000:sched4:txtRCOCode"+i).disabled = false;
            d.getElementById("frm2000:sched4:txtRemittanceDate"+i).disabled = false;
            d.getElementById("frm2000:sched4:txtBank"+i).disabled = false;
            d.getElementById("frm2000:sched4:txtAmountRemitted"+i).disabled = false;
            d.getElementById("frm2000:sched4:txtNumberFrom"+i).disabled = false;
            d.getElementById("frm2000:sched4:txtNumberTo"+i).disabled = false;
        } 
        d.getElementById("frm2000:btnSched4Add").disabled = false;
        d.getElementById("frm2000:btnSched4Delete").disabled = false;

    disableElem;
    enableElem;
    }

    function goToPage() {
        var newVal = document.getElementById("frm2000:txtCurrentPage").value;
        //var printType = !isFromPrint ? "Page" : "Print";
        var printType = "Page";

        if ((newVal <= MaxPage) && (newVal > 0) && (newVal !== currentPage.toString())) {
            $('#' + printType + currentPage + 'Content').hide('blind');
            $('#' + printType + newVal + 'Content').show('blind');
            currentPage = (document.getElementById("frm2000:txtCurrentPage").value) * 1;
        }
        else if ((newVal > MaxPage) || (newVal <= 0)) {
            alert("Invalid page");

            document.getElementById("frm2000:txtCurrentPage").value = currentPage;
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
            document.getElementById('frm2000:txtCurrentPage').value = currentPage;

        }
    }
    function processNext() {
        if (currentPage == MaxPage) {
       
        }
        else {
        currentPage++;
        $('#Page' + currentPage + 'Content').show('blind');
        $('#Page' + (currentPage - 1) + 'Content').hide('blind');
        document.getElementById('frm2000:txtCurrentPage').value = currentPage;
        }
    }
   
  function initialValidateBeforeSave() {
      if( (d.getElementById('frm2000:txtTIN1').value == "" || d.getElementById('frm2000:txtTIN2').value == "" || d.getElementById('frm2000:txtTIN3').value == "" || d.getElementById('frm2000:txtBranchCode').value == "")  )
      {
        alert("Please enter a valid TIN number on Item 5.");
        return false;
      } 
     
      if( (d.getElementById('frm2000:txtTaxpayerName').value == "")  )
      {
        alert("Please enter a valid Taxpayer's Name on Item 8.");
        return false;
      }   
      return true;
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
  var isFromPrint = false;
  function printme() {

    $('#bg').hide(); //852
    $('.printSignFooterClass').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always' });  
    $('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
  
    
    $('#checkATC').css({ 'display':'none' });
    $('#formPaper').css({'max-width':'8.3in !important', 'border':'#fff 1px solid' });
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
          document.getElementById(elem[i].id).style.color = '#000000';
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
         
        }
      }
    } 
    
    var activePage = document.getElementById('frm2000:txtCurrentPage').value;

    $('.printButtonClass').hide();
    $("#formPaper").show();
    
    $('#Page1Content').show();
    $('#Page2Content').show();
    
    $("#Page1Content").css({ 'border': '3px solid #000','margin-top': '-80px', });
    $("#Page2Content").css({ 'margin-top': '50px', 'border': '3px solid #000' });

    window.print();

    $('.printButtonClass').show();
    $("#Page"+activePage+"Content").css({ 'border': 'none' });
    $("#Page1Content").css({'margin-top': '0px', });

    if(activePage == "1"){
        $('#Page1Content').show();
        $('#Page2Content').hide();
    }else {
        $('#Page1Content').hide();
        $('#Page2Content').show();
    }

    $('#printMenu').show('blind');
    if ( $('#formMenu').css('display') != 'none' ) {  
      $('#formMenu').hide('blind');
    } 

      isFromPrint = true;
      document.getElementById('frm2000:txtCurrentPage').disabled = false;
      document.getElementById('frm2000:txtCurrentPage').readOnly = false;
  }   

  function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                console.log(form.serializeArray());
                var data = form.serialize();
                save('2000v2018',data);
                
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
        saveAndExit('2000v2018',data);
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

        submitAndSave('2000v2018', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2000v2018';
    }
</script>
@endsection