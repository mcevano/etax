@extends('layouts.app')
@section('title', '| BIR Form No. 1701A')

@section('content')
<!-- <div class="loader"></div>  -->
<!-- Styles -->
<link href="{{ asset('css/forms.css') }}" rel="stylesheet">
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
        <button type="button" class="btn btn-danger btn-exit" id="1701A" company='{{$company->id}}'>No</button>
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
      <div class="modal-body message">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-exit" id="1701A" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1701A' company='{{$company->id}}'>Okay</button>
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
                <table border="0" width="800" cellspacing="0" cellpadding="0" align="center" style=" background-repeat: repeat-x;">
                    <tr>
                        <td>
                            <div id="formPaper">
                                <!--Page 1-->
                                <div id="Page1Content">
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
                                    <table width="800" border="1" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="120" valign="middle" style="text-align: center;">
                                                <label face="Arial" size="1px">BIR Form No.</label>
                                                <br/><font size="5px" style="font-weight:bold;">1701A</font>
                                                <br/><label face="Arial" size="1px">January 2018 (ENCS)</label>
                                                <br/><label face="Arial" size="1px" style="font-weight:bold;">Page 1</label>
                                            </td>
                                            <td width="0" valign="center" style="text-align: center;">
                                                <font size="5px" style="font-weight:bold;">Annual Income Tax Return</font>
                                                <br/><label size="1px" style="font-weight:bold;">Individuals Earning Income PURELY from Business/Profession 
                                                <br/>[Those under the graduated income tax rates with OSD as mode of deductions
                                                <br/> OR those who opted to avail of the 8% flat income tax rate]</label>
                                                <br><label face="Arial" size="1px">Enter all required information in CAPITAL LETTERS using BLACK ink. Mark all applicable boxes with an "X". Two copies MUST be filed with the BIR and one held by the Tax Filer.</label>
                                            </td>
                                            <td width="200" valign="center">
                                                    <p><img src="{{ asset('images/1701A_BarCode/1701A_p1.png') }}" width="220" height="75px" /> </p>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="300" valign="top" class="tblFormTd">
                                                <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="150"><font size="1" style="font-size: 11px;">For the Year (MM/YYY) </font></td>
                                                        <td width="40">
                                                        <font color="black" face="Arial" size="2">
                                                            <select id="frm1701A:txtMonth" name="frm1701A:txtMonth" size="1" disabled>
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
                                                        <td width="82" align="left"> <input type="text" value="" size="4" name="frm1701A:txtYear" maxlength="4" id="frm1701A:txtYear" style="width:61px" onblur="blockletterWithout2Decimal(this);" onkeypress="return wholenumber(this, event)" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="250" valign="top" class="tblFormTd">
                                                <table width="250" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                        <td width="127">
                                                            <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                <tr>
                                                                    <td><input type="radio" style="vertical-align: sub" value="Y" name="frm1701A:optAmendedReturn" id="frm1701A:optAmendedReturn_1" onclick="processAmend();" /><label for="frm1701A:optAmendedReturn_1" style="font-size:11px;" >Yes</label></td>
                                                                    <td><input type="radio" style="vertical-align: sub;" value="N"  name="frm1701A:optAmendedReturn" id="frm1701A:optAmendedReturn_2" onclick="processAmend();" checked /><label for="frm1701A:optAmendedReturn_2" style="font-size:11px;" >No</label></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="250" valign="top" class="tblFormTd">
                                                <table width="250" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                        
                                                        <td><font size="1" style="font-size: 11px;">Short Period Return?</font></td>
                                                        <td width="127">
                                                            <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                <tr>
                                                                    <td><input type="radio" style="vertical-align: sub" value="Y" name="frm1701A:optShortPeriod" id="frm1701A:optShortPeriod_1" onclick="processShortPeriod();" /><label for="frm1701A:optShortPeriod_1" style="font-size:11px;" >Yes</label></td>
                                                                    <td><input type="radio" style="vertical-align: sub;" value="N"  name="frm1701A:optShortPeriod" id="frm1701A:optShortPeriod_2" onclick="processShortPeriod()" checked /><label for="frm1701A:optShortPeriod_2" style="font-size:11px;" >No</label></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <div align="center"><font size="2" style="font-weight:bold;">PART I - BACKGROUND INFORMATION ON TAXPAYER/FILER</font></div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="350" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">Taxpayer Identification Number (TIN)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->tin1}}" size="3" name="frm1701A:txtTIN1" maxlength="3" id="frm1701A:txtTIN1" onkeypress="return wholenumber(this, event)" disabled />&nbsp;-&nbsp;
                                                                <input type="text" value="{{$company->tin2}}" size="3" name="frm1701A:txtTIN2" maxlength="3" id="frm1701A:txtTIN2" onkeypress="return wholenumber(this, event)" disabled />&nbsp;-&nbsp;
                                                                <input type="text" value="{{$company->tin3}}" size="3" name="frm1701A:txtTIN3" maxlength="3" id="frm1701A:txtTIN3" onkeypress="return wholenumber(this, event)" disabled />&nbsp;-&nbsp;
                                                                <input type="text" value="{{$company->tin4}}" size="5" name="frm1701A:txtBranchCode" maxlength="5" id="frm1701A:txtBranchCode" onkeypress="return letternumber(event)" disabled />
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="150" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="150"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;&nbsp;&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td id="rdoSelect">
                                                            <select class='iceSelOneMnu' id='frm1701A:txtRDOCode' name='frm1701A:txtRDOCode' size='1' disabled >
                                                                <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="300" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td colspan="2"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;&nbsp;&nbsp;</font><font size="1" style="font-size: 11px;">Taxpayer Type&nbsp;</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                <tr>
                                                                    <td><input type="radio" style="vertical-align: sub;" value="S" name="frm1701A:optTaxType" id="frm1701A:optTaxType_1" onclick="processTaxpayerType('taxpayer');" /><label for="frm1701A:optTaxType_1" style="font-size:11px;" >Single Proprietor</label></td>
                                                                    <td><input type="radio" style="vertical-align: sub;" value="P"  name="frm1701A:optTaxType" id="frm1701A:optTaxType_2" onclick="processTaxpayerType('taxpayer');" /><label for="frm1701A:optTaxType_2" style="font-size:11px;" >Professional</label></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="100%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;7&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="209"><font size="1" style="font-size: 11px;">Alphanumeric Tax Code (ATC)</font></td>
                                                        <td width="280"><input type="radio" value="II012" style="vertical-align: sub"  name="frm1701A:optATC" id="frm1701A:optATC_1" onclick="processATC('taxpayer');" />
                                                            <label for="frm1701A:optATC_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >II012 Business Income-Graduated IT Rates</label>&nbsp;
                                                        </td>
                                                        <td width="300"><input type="radio" value="II014" style="vertical-align: sub" name="frm1701A:optATC" id="frm1701A:optATC_2" onclick="processATC('taxpayer');" />
                                                            <label for="frm1701A:optATC_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >II014 Income from Profession-Graduated IT Rates</label>&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td><input type="radio" value="II015"  style="vertical-align: sub" name="frm1701A:optATC" id="frm1701A:optATC_3" onclick="processATC('taxpayer');" />
                                                            <label for="frm1701A:optATC_3" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >II015 Business Income-8% IT Rate</label>&nbsp;
                                                        </td>
                                                        <td><input type="radio" value="II017"  style="vertical-align: sub" name="frm1701A:optATC" id="frm1701A:optATC_4" onclick="processATC('taxpayer');" />
                                                            <label for="frm1701A:optATC_4" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >II017 Income from Profession-8% IT Rate</label>&nbsp;
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Taxpayer's Name <i>(Last Name, First Name, Middle Name)</i></font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" value="{{$company->registered_name}}" size="120" name="frm1701A:txtTaxpayerName" maxlength="50" id="frm1701A:txtTaxpayerName" onblur="return capital(this, event)" disabled /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="100%" valign="top" class="tblFormTd" colspan="2">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Registered Address </font><font style="font-size:9px"><i>(Indicate complete address. If the registered address is different from the current address, go to the RDO to update registered address by using BIR Form No. 1905)</i></font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="11">&nbsp;</td>
                                                        <td><input type="text" value="{{$company->address}}" size="120" name="frm1701A:txtAddress" maxlength="100" id="frm1701A:txtAddress" onblur="return capital(this, event)" disabled /></td>
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
                                                            <input type="text" value="" size="80" name="frm1701A:txtAddress2" maxlength="50" id="frm1701A:txtAddress2" onblur="return capital(this, event)" disabled="true" />
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
                                                            <input type="text" value="{{$company->zip_code}}" size="2" name="frm1701A:txtZipCode" maxlength="12" id="frm1701A:txtZipCode" onkeypress="return wholenumber(this, event)" disabled="true" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="240" class="tblFormTd">
                                                <table width="240" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="220">
                                                            <font size="1" style="font-size: 11px;">Date of Birth </font><font style="font-size:10px"><i>(MM/DD/YYYY)</i></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td>
                                                            <input type="text" value="" size="20" name="frm1701A:txtBirthDate" id="frm1701A:txtBirthDate" maxlength="10" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="560" class="tblFormTd">
                                                <table width="550" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;11&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">Email Address</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <input type="text" value="{{$company->email_address}}" size="78" name="txtEmail" maxlength="60" id="txtEmail" disabled />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="300" class="tblFormTd">
                                                <table width="280" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;12&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="250">
                                                            <font size="1" style="font-size: 11px;">Citizenship </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td>
                                                            <input type="text" value="" size="30" name="frm1701A:txtCitizenship" id="frm1701A:txtCitizenship" maxlength="20" onblur="" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="200" class="tblFormTd">
                                                <table width="200" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="200" colspan="2">
                                                            <font size="1" style="font-size: 11px;">Claiming Foreign Tax Credits?</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td><input type="radio" value="Y" style="vertical-align: sub;" name="frm1701A:optForeignTaxCredits" id="frm1701A:optForeignTaxCredits_1" onclick="processFTC('taxpayer');" /><label for="frm1701A:optForeignTaxCredits_1" style="font-size:11px;" >Yes</label></td>
                                                        <td><input type="radio" value="N" style="vertical-align: sub"  name="frm1701A:optForeignTaxCredits" id="frm1701A:optForeignTaxCredits_2" onclick="processFTC('taxpayer');" checked /><label for="frm1701A:optForeignTaxCredits_2" style="font-size:11px;" >No</label></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="300" class="tblFormTd">
                                                <table width="280" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="250">
                                                            <font size="1" style="font-size: 11px;">Foreign Tax Number, </font><font style="font-size:11px"><i>if applicable</i></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td>
                                                            <input type="text" value="" size="30" name="frm1701A:txtForeignTaxNumber" id="frm1701A:txtForeignTaxNumber" maxlength="20" onblur="" disabled />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="240" class="tblFormTd">
                                                <table width="240" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;15&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="220">
                                                            <font size="1" style="font-size: 11px;">Contact Number </font><font style="font-size:11px"><i>(Landline/Cellphone No.)</i></font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25">&nbsp;</td>
                                                        <td>
                                                            <input type="text" value="{{$company->tel_number}}" size="20" name="frm1701A:txtTelNum" maxlength="20" id="frm1701A:txtTelNum" onkeypress="return wholenumber(this, event)" disabled />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="500" class="tblFormTd">
                                                <table width="500" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;16&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="489" colspan="4">
                                                            <font size="1" style="font-size: 11px;">Civil Status</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input type="radio" style="vertical-align: sub;" value="Single" name="frm1701A:optCivilStatus" id="frm1701A:optCivilStatus_1" onclick="processCivilStatus();" /><label for="frm1701A:optCivilStatus_1" style="font-size:11px;" >Single</label></td>
                                                        <td><input type="radio" style="vertical-align: sub;" value="Married"  name="frm1701A:optCivilStatus" id="frm1701A:optCivilStatus_2" onclick="processCivilStatus();" /><label for="frm1701A:optCivilStatus_2" style="font-size:11px;" >Married</label></td>
                                                        <td><input type="radio" style="vertical-align: sub;" value="Separated"  name="frm1701A:optCivilStatus" id="frm1701A:optCivilStatus_3" onclick="processCivilStatus();" /><label for="frm1701A:optCivilStatus_3" style="font-size:11px;" >Legally Separated</label></td>
                                                        <td><input type="radio" style="vertical-align: sub;" value="Widow"  name="frm1701A:optCivilStatus" id="frm1701A:optCivilStatus_4" onclick="processCivilStatus();" /><label for="frm1701A:optCivilStatus_4" style="font-size:11px;" >Widow/er</label></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="50%" class="tblFormTd">
                                                <table width="400" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;17&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="170">
                                                            <font size="1" style="font-size: 11px;">If married, spouse has income? </font>
                                                        </td>
                                                        <td width="100"><input type="radio" style="vertical-align: sub;" value="Y" name="frm1701A:optSpouseIncome" id="frm1701A:optSpouseIncome_1" onclick="processSpouseIncome()" disabled /><label for="frm1701A:optSpouseIncome_1" style="font-size:11px;" >Yes</label></td>
                                                        <td width="100"><input type="radio" style='vertical-align: sub' value="N" name="frm1701A:optSpouseIncome" id="frm1701A:optSpouseIncome_2" onclick="processSpouseIncome()" disabled /><label for="frm1701A:optSpouseIncome_2" style="font-size:11px;" >No</label></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="50%" class="tblFormTd">
                                                <table width="400" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="120">
                                                            <font size="1" style="font-size: 11px;">Filing Status </font>
                                                        </td>
                                                        <td width="130"><input style="vertical-align: sub" type="radio" value="Joint" name="frm1701A:optFilingStatus" id="frm1701A:optFilingStatus_1" onclick="processFilingStatus();" disabled /><label for="frm1701A:optFilingStatus_1" style="font-size:11px;" >Joint Filing</label></td>
                                                        <td width="130"><input style="vertical-align: sub" type="radio" value="Separate" name="frm1701A:optFilingStatus" id="frm1701A:optFilingStatus_2" onclick="processFilingStatus();" disabled /><label for="frm1701A:optFilingStatus_2" style="font-size:11px;" >Separate Filing</label></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table>
                                                    <tr>
                                                        <td width="50" valign="top" rowspan="2">
                                                                <font size="2" style="font-weight:bold;">&nbsp;19&nbsp;&nbsp;&nbsp;</font>
                                                                <label size="1" style="font-size: 11px;">Tax Rate </label>
                                                        </td>
                                                        <td width="750">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="300">
                                                                        <input type="radio" style="vertical-align: sub" value="G"  name="frm1701A:optTaxRate" id="frm1701A:optTaxRate_1" onclick="enablePartIVA('taxpayer'); disablePartIVB('taxpayer');" />
                                                                        <label for="frm1701A:optTaxRate_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Graduated Rates with OSD as method of deduction</label>
                                                                    </td>
                                                                    <td  width="550">
                                                                        <input type="radio" value="E"  name="frm1701A:optTaxRate" id="frm1701A:optTaxRate_2" onclick="enablePartIVB('taxpayer'); disablePartIVA('taxpayer');" />
                                                                        <label for="frm1701A:optTaxRate_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >8% in lieu of Graduated Rates under Sec. 24(A) & Percentage Tax under Sec. 116 of the NIRC, 
                                                                        <br/>[available if gross sales/receipts and other non-operating income do not exceed Three million pesos (P3M)]</label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <div align="center"><font size="2" style="font-weight:bold;">PART II - TOTAL TAX PAYABLE </font><font style="font-size:11px;">(DO NOT enter Centavos; 49 Centavos or less drop down; 50 or more round up)</font></div>
                                            </td>
                                        </tr>
                                    </table>
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
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;&nbsp;</font></td>
                                                        <td width="324"><font size="1" style="font-weight:bold;font-size: 11px;">Tax Due </font><font style="font-size: 11px;"><a href="javascript:void(0)" id="btnNavigatePage2_1" class="xsmallItalic"  onclick="processNext()">(Either from Part IV.A Item 46 OR Part IV.B Item 56)</a></font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">20A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt20A" name="frm1701A:txt20A" disabled />
                                                            </span>
                                                        </td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">20B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt20B" name="frm1701A:txt20B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font></td>
                                                        <td class="padder"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Total Tax Credits/Payments </font><font style="font-size: 8px;"><a href="javascript:void(0)" id="btnNavigatePage2_2" class="xsmallItalic"  onclick="processNext()" style="font-size: 11px;">(From Part IV.C Item 64)</a></font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">21A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt21A" name="frm1701A:txt21A" disabled />
                                                            </span>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">21B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt21B" name="frm1701A:txt21B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;22</font></td>
                                                        <td><font size="1" style="font-weight:bold;font-size: 11px;">Tax Payable/(Overpayment) </font><font style="font-size: 11px;">(Item 20 Less Item 21)<a href="javascript:void(0)" id="btnNavigatePage2_3" class="xsmallItalic"  onclick="processNext()">(From Part IV Item 65) </a></font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">22A</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" id="frm1701A:txt22A" name="frm1701A:txt22A" disabled />
                                                            </span>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">22B</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" id="frm1701A:txt22B" name="frm1701A:txt22B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;23</font></td>
                                                        <td><font style="font-size: 11px;">Less: Portion of Tax Payable Allowed for 2nd Installment to be paid on or before October 15 (50% or less of Item 20)</font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">23A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt23A" name="frm1701A:txt23A" onblur="round(this,2);computeTxt24('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">23B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt23B" name="frm1701A:txt23B" onblur="round(this,2);computeTxt24('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;24</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Amount of Tax Required to be Paid upon Filing/(Overpayment) </font><font style="font-size: 10px;">(Item 22 Less Item 23)</font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">24A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt24A" name="frm1701A:txt24A" disabled />
                                                            </span>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">24B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt24B" name="frm1701A:txt24B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <td width="100">
                                                                        <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Add: Penalties </font>
                                                                    </td>
                                                                    <td>
                                                                        <font size="2" style="font-weight:bold;">&nbsp;25&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"> Surcharge</font>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">25A</font>&nbsp;
                                                            <input type="text" value="0.00" style=" text-align: right;" size="20"  maxlength="25" id="frm1701A:txt25A" name="frm1701A:txt25A" onblur="round(this,2);computePenalties('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">25B</font>&nbsp;
                                                            <input type="text" value="0.00" style=" text-align: right;" size="20" maxlength="25" id="frm1701A:txt25B" name="frm1701A:txt25B" onblur="round(this,2);computePenalties('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <td width="100">
                                                                        <font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font>
                                                                    </td>
                                                                    <td>
                                                                        <font size="2" style="font-weight:bold;">&nbsp;26&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"> Interest</font>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">26A</font>&nbsp;
                                                            <input type="text" value="0.00" style=" text-align: right;" size="20"  maxlength="25" id="frm1701A:txt26A" name="frm1701A:txt26A" onblur="round(this,2);computePenalties('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">26B</font>&nbsp;
                                                            <input type="text" value="0.00" style=" text-align: right;" size="20" maxlength="25" id="frm1701A:txt26B" name="frm1701A:txt26B" onblur="round(this,2);computePenalties('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <td width="100">
                                                                        <font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font>
                                                                    </td>
                                                                    <td>
                                                                        <font size="2" style="font-weight:bold;">&nbsp;27&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"> Compromise</font>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">27A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt27A" name="frm1701A:txt27A" onblur="round(this,2);computePenalties('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">27B</font>&nbsp;
                                                            <input type="text" value="0.00" style=" text-align: right;" size="20" maxlength="25" id="frm1701A:txt27B" name="frm1701A:txt27B" onblur="round(this,2);computePenalties('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;28</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Penalties </font><font style="font-size: 11px;">(Sum of Items 25 to 27)</font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">28A</font>&nbsp;
                                                            <input type="text" value="0.00" style=" text-align: right;" size="20"  maxlength="25" id="frm1701A:txt28A" name="frm1701A:txt28A" disabled />
                                                            </span>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">28B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt28B" name="frm1701A:txt28B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;29</font></td>
                                                        <td><font size="1" style="font-weight:bold;font-size: 11px;">Total Amount Payable/(Overpayment) </font><font style="font-size: 11px;">(Sum of Items 24 and 28)</font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">29A</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" id="frm1701A:txt29A" name="frm1701A:txt29A" disabled />
                                                            </span>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">29B</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" id="frm1701A:txt29B" name="frm1701A:txt29B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;30</font></td>
                                                        <td><font size="1" style="font-weight:bold;font-size: 11px;">Aggregate Amount Payable/(Overpayment) </font><font style="font-size: 11px;">(Sum of Items 29A and 29B)</font></td>
                                                        <td colspan="2">
                                                            <div align="center">
                                                                <span class="spacePadder"><font size="2" style="font-weight:bold;">30</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" id="frm1701A:txt30" name="frm1701A:txt30" disabled />
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td colspan="3"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">If overpayment, mark one(1) box only. (Once the choice is made, the same is irrevocable) </font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <input type="radio" style="vertical-align: sub" value="1"  name="frm1701A:optRefund" id="frm1701A:optRefund_1" onclick="" />
                                                                        <label for="frm1701A:optRefund_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >To be refunded </label>
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" style="vertical-align: sub" value="2"  name="frm1701A:optRefund" id="frm1701A:optRefund_2" onclick="" />
                                                                        <label for="frm1701A:optRefund_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >To be issued a Tax Credit Certificate (TCC)</label>
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" style="vertical-align: sub" value="3"  name="frm1701A:optRefund" id="frm1701A:optRefund_3" onclick="" />
                                                                        <label for="frm1701A:optRefund_3" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >To be carried over as a tax credit for next year/quarter</label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table width="800" border="1" cellspacing="0" cellpadding="0" style="font-family:arial; font-size:10px; text-align: center; vertical-align: top; table-layout: fixed;">
                                                    <col width="25%" />
                                                    <col width="25%" />
                                                    <col width="25%" />
                                                    <col width="25%" />
                                                    <tr>
                                                        <td colspan="4" style="text-align: left; ">&nbsp;&nbsp;&nbsp;&nbsp;I declare under the penalties of perjury that this return, and all its attachments, have been made in good faith, verified by me, and to the best of my knowledge and belief, are 
                                                            true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof. Further, I give my consent to the processing of my information as contemplated under the *Data Privacy 
                                                            Act of 2012 (R.A. No. 10173) for legitimate and lawful purposes. (If Authorized Representative, attach authorization letter and indicate TIN)<br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" style="text-align: center; background-color: white;">
                                                            <br><br><br>__________________________________________________________________
                                                            <br>Printed Name and Signature of Taxpayer/Authorized Representative & TIN
                                                        </td>
                                                        <td>
                                                            <div align="center">
                                                                <span class="spacePadder"><font size="2" style="font-weight:bold;">31</font>&nbsp;
                                                                    <font size="1" face="Arial, Helvetica, sans-serif">Number of Attachments </font>
                                                                <input type="text" value="0" style="text-align: right;" size="1" maxlength="2" id="frm1701A:txtNumberAttachments" name="frm1701A:txtNumberAttachments" onkeypress="return wholenumber(this, event)" />
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <div align="center"><font size="2" style="font-weight:bold;">PART III - DETAILS OF PAYMENT </div>
                                            </td>
                                        </tr>
                                    </table>
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
                                            <td align="center"><input type="text" value="" size="20" name="frm1701A:txtAgency32" maxlength="50" id="frm1701A:txtAgency32" disabled="true"  /></td>
                                            <td align="center"><input type="text" value="" size="20" name="frm1701A:txtNumber32" maxlength="50" id="frm1701A:txtNumber32" disabled="true"  /></td>
                                            <td align="center"><input type="text" value="" size="20" name="frm1701A:txtDate32" maxlength="10" id="frm1701A:txtDate32" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
                                            <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1701A:txtAmount32" maxlength="50" id="frm1701A:txtAmount32" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
                                        </tr>
                                        <tr>
                                            <td><font size="2" style="font-weight:bold;">&nbsp;33&nbsp;&nbsp;&nbsp;</font><font size="1">Check </font></td>
                                            <td align="center"><input type="text" value="" size="20" name="frm1701A:txtAgency33" maxlength="50" id="frm1701A:txtAgency33" disabled="true" /></td>
                                            <td align="center"><input type="text" value="" size="20" name="frm1701A:txtNumber33" maxlength="50" id="frm1701A:txtNumber33" disabled="true" /></td>
                                            <td align="center"><input type="text" value="" size="20" name="frm1701A:txtDate33" maxlength="10" id="frm1701A:txtDate33" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
                                            <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1701A:txtAmount33" maxlength="50" id="frm1701A:txtAmount33" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><font size="2" style="font-weight:bold;">&nbsp;34&nbsp;&nbsp;&nbsp;</font><font size="1">Tax Debit Memo </font></td>
                                            <td align="center"><input type="text" value="" size="20" name="frm1701A:txtNumber34" maxlength="50" id="frm1701A:txtNumber34" disabled="true" /></td>
                                            <td align="center"><input type="text" value="" size="20" name="frm1701A:txtDate34" maxlength="10" id="frm1701A:txtDate34" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
                                            <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1701A:txtAmount34" maxlength="50" id="frm1701A:txtAmount34" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"><font size="2" style="font-weight:bold;">&nbsp;35&nbsp;&nbsp;&nbsp;</font><font size="1">Others (specify below) </font></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" value="" size="20" name="frm1701A:txtParticular35" maxlength="50" id="frm1701A:txtParticular35" disabled="true" /></td>
                                            <td align="center"><input type="text" value="" size="20" name="frm1701A:txtAgency35" maxlength="50" id="frm1701A:txtAgency35" disabled="true" /></td>
                                            <td align="center"><input type="text" value="" size="20" name="frm1701A:txtNumber35" maxlength="50" id="frm1701A:txtNumber35" disabled="true" /></td>
                                            <td align="center"><input type="text" value="" size="20" name="frm1701A:txtDate35" maxlength="10" id="frm1701A:txtDate35" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
                                            <td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1701A:txtAmount35" maxlength="50" id="frm1701A:txtAmount35" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
                                        </tr>
                                    </table>
                                    <table border="1" width="800" cellspacing="0" cellpadding="0" style="font-size:10px; text-align: left; vertical-align: top;">
                                        <tr>
                                            <td width="57%">Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br /><br /><br /><br /><br /></td>
                                            <td width="43%">Stamp of Receiving Office/AAB and Date of Receipt (RO's Signature/Bank Teller's Initial)<br /><br /><br /><br /><br /></td>
                                        </tr>
                                    </table>
                                    <p>
                                        <font size="1" style="font-weight:bold;">*NOTE: </font>
                                        <label size="1" face="Arial, Helvetica, sans-serif"> The BIR Data Privacy Policy is in the BIR website (www.bir.gov.ph)
                                    </label>
                                    </p>
                                </div>
                                <!--End of Page 1-->
                                <!--Page 2-->
                                <div id="Page2Content" style="display: none;">
                                    <table width="800" border="1" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="120" valign="middle" style="text-align: center;">
                                                <font face="Arial" size="1px">BIR Form No.</font>
                                                <br/><font size="5px" style="font-weight:bold;">1701A</font>
                                                <br/><font face="Arial" size="1px">January 2018 (ENCS)</font>
                                                <br/><font face="Arial" size="1px" style="font-weight:bold;">Page 2</font>
                                            </td>
                                            <td width="0" valign="center" style="text-align: center;">
                                                <font size="5px" style="font-weight:bold;">Annual Income Tax Return</font>
                                                <br/><label size="1px" style="font-weight:bold;">Individuals Earning Income PURELY from Business/Profession 
                                                <br/>[Those under the graduated income tax rates with OSD as mode of deductions
                                                <br/> OR those who opted to avail of the 8% flat income tax rate]</label>
                                            </td>
                                            <td width="200" valign="center">
                                                    <p><img src="{{ asset('images/1701A_BarCode/1701A_p2.png') }}" width="220" height="75px" /> </p>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="35%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">TIN</font></td>
                                            <td width="65%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Taxpayer/Filer's Last Name</font></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <font size="2" face="Arial">
                                                    <input type="text" value="{{$company->tin1}}" size="3" name="frm1701A:txtPg2TIN1" maxlength="3" id="frm1701A:txtPg2TIN1" onkeypress="return wholenumber(this, event)" disabled />
                                                    <input type="text" value="{{$company->tin2}}" size="3" name="frm1701A:txtPg2TIN2" maxlength="3" id="frm1701A:txtPg2TIN2" onkeypress="return wholenumber(this, event)" disabled />
                                                    <input type="text" value="{{$company->tin3}}" size="3" name="frm1701A:txtPg2TIN3" maxlength="3" id="frm1701A:txtPg2TIN3" onkeypress="return wholenumber(this, event)" disabled />
                                                    <input type="text" value="{{$company->tin4}}" size="5" name="frm1701A:txtPg2BranchCode" maxlength="5" id="frm1701A:txtPg2BranchCode" onkeypress="return letternumber(event)" disabled />
                                                </font>
                                            </td>
                                            <?php 
                                                $lastname = explode(",", $company['registered_name'])
                                            ?>
                                            <td>&nbsp;<input type="text" value="{{ $lastname[0] }}" size="75" name="frm1701A:txtPg2TaxpayerName" maxlength="50" id="frm1701A:txtPg2TaxpayerName" onblur="return capital(this, event)" disabled /></td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <div align="center"><font size="2" style="font-weight:bold;">PART IV - COMPUTATION OF INCOME TAX </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <font size="1" style="font-weight:bold; text-align: right;font-size: 11px;">&nbsp;If Optional Standard Deductions (OSD), fill in items 36 to 46; if 8%, fill in items 47 to 56</font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="411" colspan="2" align="left"><font size="2" style="font-weight:bold; text-align: right;">&nbsp;IV.A - For Graduated Income Tax Rates</font></td>
                                                        <td width="195" align="center"><font size="2" style="font-weight:bold; text-align: right;">A) Taxpayer/Filer</font></td>
                                                        <td width="194" align="center"><font size="2" style="font-weight:bold; text-align: right;">B) Spouse</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;36&nbsp;&nbsp;</font></td>
                                                        <td width="385"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Sales/Revenues/Receipts/Fees </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">36A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt36A" name="frm1701A:txt36A" onblur="round(this,2);computeTxt38('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">36B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt36B" name="frm1701A:txt36B" onblur="round(this,2);computeTxt38('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;37&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Sales Returns, Allowances and Discounts </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">37A</font>&nbsp;
                                                            <input type="text" value="0.00" style=" text-align: right;" size="20" maxlength="25" id="frm1701A:txt37A" name="frm1701A:txt37A" onblur="round(this,2);computeTxt38('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">37B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt37B" name="frm1701A:txt37B" onblur="round(this,2);computeTxt38('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;38&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Net Sales/Revenues/Receipts/Fees </font><font style="font-size: 10px;">(Item 36 Less Item 37) </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">38A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt38A" name="frm1701A:txt38A" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">38B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt38B" name="frm1701A:txt38B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;39&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Allowable Deduction - Optional Standard Deduction (OSD) </font><font style="font-size: 10px;">(40% of Item 38) </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">39A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt39A" name="frm1701A:txt39A" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">39B</font>&nbsp;
                                                            <input type="text" value="0.00" style=" text-align: right;" size="20"  maxlength="25" id="frm1701A:txt39B" name="frm1701A:txt39B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;40&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Net Income </font><font style="font-size: 10px;">(Item 38 Less Item 39) </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">40A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt40A" name="frm1701A:txt40A" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">40B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt40B" name="frm1701A:txt40B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="3"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Add: Other Income </font><font style="font-size: 10px;">(specify below) </font></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;41&nbsp;&nbsp;</font></td>
                                                        <td>
                                                            <input type="text" value="" maxlength="50" size="50" name="frm1701A:txt41Desc" id="frm1701A:txt41Desc" onblur="disableLinkIfEmpty('frm1701A:txt41Desc,frm1701A:txt41A,frm1701A:txt42Desc,frm1701A:txt42A', 'frm1701A:lnkPartIVAMore');" disabled />
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">41A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt41A" name="frm1701A:txt41A" onblur="round(this,2);computeTxt44('taxpayer');disableLinkIfEmpty('frm1701A:txt41Desc,frm1701A:txt41A,frm1701A:txt42Desc,frm1701A:txt42A', 'frm1701A:lnkPartIVAMore');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">41B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt41B" name="frm1701A:txt41B" onblur="round(this,2);computeTxt44('taxspouse');disableLinkIfEmpty('frm1701A:txt41Desc,frm1701A:txt41A,frm1701A:txt42Desc,frm1701A:txt42A', 'frm1701A:lnkPartIVAMore');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><font size="2" style="font-weight:bold;">&nbsp;42&nbsp;&nbsp;</font></td>
                                                        <td>
                                                            <input type="text" value="" maxlength="50" size="50" id="frm1701A:txt42Desc" name="frm1701A:txt42Desc" onblur="disableLinkIfEmpty('frm1701A:txt41Desc,frm1701A:txt41A,frm1701A:txt42Desc,frm1701A:txt42A', 'frm1701A:lnkPartIVAMore');" disabled />
                                                            <br/><a href="#" id="frm1701A:lnkPartIVAMore" onclick="openModal(this,'modalPartIVA');transferToModal('partIVAModalLayout','frm1701A:txt42Desc,frm1701A:txt42A,frm1701A:txt42B');computePartIVAModal(true);" disabled><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"> (add more...)</font></a>
                                                        </td>
                                                        <td valign="top"><span class="spacePadder"><font size="2" style="font-weight:bold;">42A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt42A" name="frm1701A:txt42A" onblur="round(this,2);computeTxt44('taxpayer');disableLinkIfEmpty('frm1701A:txt41Desc,frm1701A:txt41A,frm1701A:txt42Desc,frm1701A:txt42A', 'frm1701A:lnkPartIVAMore');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                        <td valign="top"><span class="spacePadder"><font size="2" style="font-weight:bold;">42B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt42B" name="frm1701A:txt42B" onblur="round(this,2);computeTxt44('taxspouse');disableLinkIfEmpty('frm1701A:txt41Desc,frm1701A:txt41A,frm1701A:txt42Desc,frm1701A:txt42A', 'frm1701A:lnkPartIVAMore');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;43&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Amount Received/Share in income by a Partner from General Professional Partnership (GPP) </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">43A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt43A" name="frm1701A:txt43A" onblur="round(this,2);computeTxt44('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">43B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt43B" name="frm1701A:txt43B" onblur="round(this,2);computeTxt44('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;44&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Other Income </font><font style="font-size: 10px;">(Sum of Items 41 to 43) </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">44A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt44A" name="frm1701A:txt44A" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">44B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt44B" name="frm1701A:txt44B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;45&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Taxable Income </font><font style="font-size: 10px;">(Sum of Items 40 and 44) </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">45A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt45A" name="frm1701A:txt45A" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">45B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt45B" name="frm1701A:txt45B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;46&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-weight:bold;">TAX DUE </font><font style="font-size: 10px;">(Item 45 x Applicable Tax Rate based on Tax Table below)<a href="javascript:void(0)" id="btnNavigatePage1_1" class="xsmallItalic"  onclick="processPrev()">(To Part II - Item 20)</a></font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">46A</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" id="frm1701A:txt46A" name="frm1701A:txt46A" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">46B</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20"  maxlength="25" id="frm1701A:txt46B" name="frm1701A:txt46B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <div>
                                                    <font size="2" style="font-weight:bold; text-align: right;font-size: 11px;">&nbsp;IV.B - For 8% Income Tax Rate </font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">(Those whose sales/receipts/others did not exceed P3M and opted at the initial quarter for this rate) </font>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;47&nbsp;&nbsp;</font></td>
                                                        <td width="385"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Sales/Revenues/Receipts/Fees </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">47A</font>&nbsp;
                                                            <input type="text" value="0.00" style=" text-align: right;" size="20" maxlength="25" id="frm1701A:txt47A" name="frm1701A:txt47A" onblur="round(this,2);computeTxt49('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">47B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt47B" name="frm1701A:txt47B" onblur="round(this,2);computeTxt49('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;48&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Sales Returns, Allowances and Discounts </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">48A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt48A" name="frm1701A:txt48A" onblur="round(this,2);computeTxt49('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">48B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt48B" name="frm1701A:txt48B" onblur="round(this,2);computeTxt49('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;49&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Net Sales/Revenues/Receipts/Fees </font><font style="font-size: 10px;">(Item 47 Less Item 48) </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">49A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt49A" name="frm1701A:txt49A" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">49B</font>&nbsp;
                                                            <input type="text" value="0.00" style=" text-align: right;" size="20"  maxlength="25" id="frm1701A:txt49B" name="frm1701A:txt49B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="3"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Add: Other Non-Operating Income </font><font style="font-size: 10px;">(specify below) </font></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;50&nbsp;&nbsp;</font></td>
                                                        <td>
                                                            <input type="text" value="" maxlength="50" size="50" id="frm1701A:txt50Desc" name="frm1701A:txt50Desc" onblur="disableLinkIfEmpty('frm1701A:txt50Desc,frm1701A:txt50A,frm1701A:txt51Desc,frm1701A:txt51A', 'frm1701A:lnkPartIVBMore');" disabled /> 
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">50A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt50A" name="frm1701A:txt50A" onblur="round(this,2);computeTxt52('taxpayer');disableLinkIfEmpty('frm1701A:txt50Desc,frm1701A:txt50A,frm1701A:txt51Desc,frm1701A:txt51A', 'frm1701A:lnkPartIVBMore');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">50B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt50B" name="frm1701A:txt50B" onblur="round(this,2);computeTxt52('taxspouse');disableLinkIfEmpty('frm1701A:txt50Desc,frm1701A:txt50A,frm1701A:txt51Desc,frm1701A:txt51A', 'frm1701A:lnkPartIVBMore');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><font size="2" style="font-weight:bold;">&nbsp;51&nbsp;&nbsp;</font></td>
                                                        <td>
                                                            <input type="text" value="" maxlength="50" size="50" id="frm1701A:txt51Desc" name="frm1701A:txt51Desc" onblur="disableLinkIfEmpty('frm1701A:txt50Desc,frm1701A:txt50A,frm1701A:txt51Desc,frm1701A:txt51A', 'frm1701A:lnkPartIVBMore');" disabled />
                                                            <br/><a href="#" id="frm1701A:lnkPartIVBMore" onclick="openModal(this,'modalPartIVB');transferToModal('partIVBModalLayout','frm1701A:txt51Desc,frm1701A:txt51A,frm1701A:txt51B');computePartIVBModal(true);" disabled><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"> (add more...)</font></a>
                                                        </td>
                                                        <td valign="top"><span class="spacePadder"><font size="2" style="font-weight:bold;">51A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt51A" name="frm1701A:txt51A" onblur="round(this,2);computeTxt52('taxpayer');disableLinkIfEmpty('frm1701A:txt50Desc,frm1701A:txt50A,frm1701A:txt51Desc,frm1701A:txt51A', 'frm1701A:lnkPartIVBMore');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                        <td valign="top"><span class="spacePadder"><font size="2" style="font-weight:bold;">51B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt51B" name="frm1701A:txt51B" onblur="round(this,2);computeTxt52('taxspouse');disableLinkIfEmpty('frm1701A:txt50Desc,frm1701A:txt50A,frm1701A:txt51Desc,frm1701A:txt51A', 'frm1701A:lnkPartIVBMore');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;52&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Other Non-operating Income </font><font style="font-size: 10px;">(Sum of Items 50 and 51) </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">52A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt52A" name="frm1701A:txt52A" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">52B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt52B" name="frm1701A:txt52B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;53&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Taxable Income </font><font style="font-size: 10px;">(Sum of Items 49 and 52) </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">53A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt53A" name="frm1701A:txt53A" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">53B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt53B" name="frm1701A:txt53B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;54&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: </font><font style="font-size: 10px;">Allowable reduction from gross sales/receipts and other non-operating income of PURELY self-employed individuals and/or professionals in the amount of P 250,000 </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">54A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt54A" name="frm1701A:txt54A" onblur="round(this,2);item54Validate('taxpayer');computeTxt55('taxpayer')" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">54B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt54B" name="frm1701A:txt54B" onblur="round(this,2);item54Validate('taxspouse');computeTxt55('taxspouse')" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;55&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Taxable Income/(Loss) </font><font style="font-size: 10px;">(Item 53 Less Item 54) </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">55A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt55A" name="frm1701A:txt55A" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">55B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt55B" name="frm1701A:txt55B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;56&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-weight:bold;">TAX DUE </font><font style="font-size: 10px;">(Item 55 x 8% Income Tax Rate)<a href="javascript:void(0)" id="btnNavigatePage1_2" class="xsmallItalic"  onclick="processPrev()">(To Part II - Item 20)</a></font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">56A</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" id="frm1701A:txt56A" name="frm1701A:txt56A" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">56B</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20"  maxlength="25" id="frm1701A:txt56B" name="frm1701A:txt56B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <div>
                                                    <font size="2" style="font-weight:bold; text-align: right;">&nbsp;IV.C - Tax Credits/Payments </font><font size="1" face="Arial, Helvetica, sans-serif">(attach proof) </font>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;57&nbsp;&nbsp;</font></td>
                                                        <td width="385"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Prior Year's Excess Credits </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">57A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt57A" name="frm1701A:txt57A" onblur="round(this,2);computeTxt64('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span>
                                                        </td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">57B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt57B" name="frm1701A:txt57B" onblur="round(this,2);computeTxt64('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;58&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Payments for the First Three (3) Quarters </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">58A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt58A" name="frm1701A:txt58A" onblur="round(this,2);computeTxt64('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">58B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt58B" name="frm1701A:txt58B" onblur="round(this,2);computeTxt64('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;59&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Creditable Tax Withheld for the First Three (3) Quarters </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">59A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt59A" name="frm1701A:txt59A" onblur="round(this,2);computeTxt64('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">59B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt59B" name="frm1701A:txt59B" onblur="round(this,2);computeTxt64('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;60&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Creditable Tax Withheld per BIR Form No. 2307 for the 4th Quarter </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">60A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt60A" name="frm1701A:txt60A" onblur="round(this,2);computeTxt64('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">60B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt60B" name="frm1701A:txt60B" onblur="round(this,2);computeTxt64('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;61&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Paid in Return Previously Filed, if this is an Amended Return </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">61A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt61A" name="frm1701A:txt61A" onblur="round(this,2);computeTxt64('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">61B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt61B" name="frm1701A:txt61B" onblur="round(this,2);computeTxt64('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;62&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Foreign Tax Credits, if applicable </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">62A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt62A" name="frm1701A:txt62A" onblur="round(this,2);computeTxt64('taxpayer');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">62B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt62B" name="frm1701A:txt62B" onblur="round(this,2);computeTxt64('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;63&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Other Tax Credits/Payments </font><font style="font-size: 10px;"> (specify) </font><input type="text" value="" maxlength="25" size="20" id="frm1701A:txt63Desc" name="frm1701A:txt63Desc" /></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">63A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt63A" name="frm1701A:txt63A" onblur="round(this,2);computeTxt64('taxpayer');" onkeypress="return wholenumber(this, event)" />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">63B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt63B" name="frm1701A:txt63B" onblur="round(this,2);computeTxt64('taxspouse');" onkeypress="return wholenumber(this, event)" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;64&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Tax Credits/Payments </font><font style="font-size: 10px;">(Sum of Items 57 to 63)<a href="javascript:void(0)" id="btnNavigatePage1_3" class="xsmallItalic"  onclick="processPrev()">(To Item 21)</a> </font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">64A</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" id="frm1701A:txt64A" name="frm1701A:txt64A" disabled />
                                                            </span>
                                                        </td>

                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">64B</font>&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20"  maxlength="25" id="frm1701A:txt64B" name="frm1701A:txt64B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;65&nbsp;&nbsp;</font></td>
                                                        <td width="385"><font size="1" style="font-weight:bold;" style="font-size: 11px;">Net Taxable/(Overpayment) </font><font style="font-size: 10px;">(Item 46 OR 56 Less Item 64)<a href="javascript:void(0)" id="btnNavigatePage1_3" class="xsmallItalic"  onclick="processPrev()">(To Part II - Item 22)</a> </font></td>
                                                        <td width="195"><span class="spacePadder"><font size="2" style="font-weight:bold;">65A</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" id="frm1701A:txt65A" name="frm1701A:txt65A" disabled />
                                                            </span>
                                                        </td>

                                                        <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">65B</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20"  maxlength="25" id="frm1701A:txt65B" name="frm1701A:txt65B" disabled />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
                                                <div align="center"><font size="2" style="font-weight:bold;">PART V - BACKGROUND INFORMATION ON SPOUSE </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="350" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;66&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">Spouse's Taxpayer Identification Number (TIN)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="" size="3" name="frm1701A:txtSpouseTIN1" maxlength="3" id="frm1701A:txtSpouseTIN1" onkeypress="return wholenumber(this, event)" disabled />&nbsp;-&nbsp;
                                                                <input type="text" value="" size="3" name="frm1701A:txtSpouseTIN2" maxlength="3" id="frm1701A:txtSpouseTIN2" onkeypress="return wholenumber(this, event)" disabled />&nbsp;-&nbsp;
                                                                <input type="text" value="" size="3" name="frm1701A:txtSpouseTIN3" maxlength="3" id="frm1701A:txtSpouseTIN3" onkeypress="return wholenumber(this, event)" disabled />&nbsp;-&nbsp;
                                                                <input type="text" value="" size="5" name="frm1701A:txtSpouseBranchCode" maxlength="5" id="frm1701A:txtSpouseBranchCode" onkeypress="return letternumber(event)" disabled />
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="150" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="150"><font size="2" style="font-weight:bold">&nbsp;67&nbsp;&nbsp;&nbsp;</font><font size="1">RDO Code&nbsp;</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td id="spouseRdoSelect">
                                                            
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="300" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td colspan="2"><font size="2" style="font-weight:bold">&nbsp;68&nbsp;&nbsp;&nbsp;</font><font size="1" style="font-size: 11px;">Filer's Spouse Type&nbsp;</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                <tr>
                                                                    <td><input type="radio" style="vertical-align: sub" value="S" name="frm1701A:optSpouseTaxType" id="frm1701A:optSpouseTaxType_1" onclick="processTaxpayerType('taxspouse');" disabled /><label for="frm1701A:optSpouseTaxType_1" style="font-size:11px;" >Single Proprietor</label></td>
                                                                    <td><input type="radio" style="vertical-align: sub" value="P"  name="frm1701A:optSpouseTaxType" id="frm1701A:optSpouseTaxType_2" onclick="processTaxpayerType('taxspouse');" disabled /><label for="frm1701A:optSpouseTaxType_2" style="font-size:11px;" >Professional</label></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="100%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;69&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="209"><font size="1" style="font-size: 11px;">Alphanumeric Tax Code (ATC)</font></td>
                                                        <td width="280"><input style="vertical-align: sub" type="radio" value="II012"  name="frm1701A:optSpouseATC" id="frm1701A:optSpouseATC_1" onclick="processATC('taxspouse');" disabled />
                                                            <label for="frm1701A:optSpouseATC_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >II012 Business Income-Graduated IT Rates</label>&nbsp;
                                                        </td>
                                                        <td width="300"><input style="vertical-align: sub" type="radio" value="II014"  name="frm1701A:optSpouseATC" id="frm1701A:optSpouseATC_2" onclick="processATC('taxspouse');" disabled />
                                                            <label for="frm1701A:optSpouseATC_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >II014 Income from Profession-Graduated IT Rates</label>&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td><input type="radio" style="vertical-align: sub" value="II015"  name="frm1701A:optSpouseATC" id="frm1701A:optSpouseATC_3" onclick="processATC('taxspouse');" disabled />
                                                            <label for="frm1701A:optSpouseATC_3" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >II015 Business Income-8% IT Rate</label>&nbsp;
                                                        </td>
                                                        <td><input type="radio" style="vertical-align: sub" value="II017"  name="frm1701A:optSpouseATC" id="frm1701A:optSpouseATC_4" onclick="processATC('taxspouse');" disabled />
                                                            <label for="frm1701A:optSpouseATC_4" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >II017 Income from Profession-8% IT Rate</label>&nbsp;
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;70&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Spouse's Name <i>(Last Name, First Name, Middle Name)</i></font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" value="" size="120" name="frm1701A:txtSpouseName" maxlength="50" id="frm1701A:txtSpouseName" onblur="processAmend();return capital(this, event);" disabled /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="400" class="tblFormTd">
                                                <table width="400" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;71&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="100">
                                                            <font size="1" style="font-size: 11px;">Contact Number </font>
                                                        </td>
                                                        <td width="200">
                                                            <input type="text" value="" size="30" name="frm1701A:txtSpouseTelNum" id="frm1701A:txtSpouseTelNum" maxlength="20" onblur="" disabled />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="400" class="tblFormTd">
                                                <table width="400" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;72&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="100">
                                                            <font size="1" style="font-size: 11px;">Citizenship </font>
                                                        </td>
                                                        <td width="200">
                                                            <input type="text" value="" size="30" name="frm1701A:txtSpouseCitizenship" id="frm1701A:txtSpouseCitizenship" maxlength="20" onblur="" disabled />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="400" class="tblFormTd">
                                                <table width="400" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;73&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="169">
                                                            <font size="1" style="font-size: 11px;">Claiming Foreign Tax Credits?</font>
                                                        </td>
                                                        <td><input type="radio" style="vertical-align: sub;" value="Y" name="frm1701A:optSpouseFTC" id="frm1701A:optSpouseFTC_1" onclick="processFTC('taxspouse');" disabled /><label for="frm1701A:optForeignTaxCredits_1" style="font-size:11px;" >Yes</label></td>
                                                        <td><input type="radio" style="vertical-align: sub" value="N"  name="frm1701A:optSpouseFTC" id="frm1701A:optSpouseFTC_2" onclick="processFTC('taxspouse');" disabled /><label for="frm1701A:optForeignTaxCredits_2" style="font-size:11px;" >No</label></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="400" class="tblFormTd">
                                                <table width="400" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;74&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="169">
                                                            <font size="1" style="font-size: 11px;">Foreign Tax Number, </font><font style="font-size:10px"><i>if applicable</i></font>
                                                        </td>
                                                        <td>
                                                            <input type="text" value="" size="25" name="frm1701A:txtSpouseFTN" id="frm1701A:txtSpouseFTN" maxlength="20" onblur="" disabled />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table>
                                                    <tr>
                                                        <td width="50" valign="top" rowspan="2">
                                                                <font size="2" style="font-weight:bold;">&nbsp;75&nbsp;&nbsp;&nbsp;</font>
                                                                <label size="1" style="font-size: 11px;">Tax Rate </label>
                                                        </td>
                                                        <td width="750">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="300">
                                                                        <input type="radio" value="G" style="vertical-align: sub"  name="frm1701A:optSpouseTaxRate" id="frm1701A:optSpouseTaxRate_1" onclick="enablePartIVA('taxspouse'); disablePartIVB('taxspouse');" disabled />
                                                                        <label for="frm1701A:optSpouseTaxRate_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Graduated Rates with OSD as method of deduction</label>
                                                                    </td>
                                                                    <td  width="550">
                                                                        <input type="radio" value="E"  name="frm1701A:optSpouseTaxRate" id="frm1701A:optSpouseTaxRate_2" onclick="enablePartIVB('taxspouse'); disablePartIVA('taxspouse');" disabled />
                                                                        <label for="frm1701A:optSpouseTaxRate_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >8% in lieu of Graduated Rates under Sec. 24(A) & Percentage Tax under Sec. 116 of the NIRC, 
                                                                        <br/>[available if gross sales/receipts and other non-operating income do not exceed Three million pesos (P3M)]</label>
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
                                <!--End of Page 2-->

                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                    <tr align="center">
                                        <td class="tblFormTdPart">
                                            <table width="800" cellspacing="0" cellpadding="0" border="0">
                                                <tr align="center">
                                                    <td width="100%" colspan="2">
                                                        <div align="center">
                                                            <br />
                                                            <input class="printButtonClass" type="button" value="Prev" style="width: 100px;"
                                                                name="frm1701A:btnPrevPage" id="frm1701A:btnPrevPage" onclick="processPrev();" />
                                                            <input id="frm1701A:txtCurrentPage" name="frm1701A:txtCurrentPage" size="1" type="text" style="text-align:center;" onkeyup="goToPage();" />
                                                            <span class=large>/&nbsp;</span><input type="text" id="frm1701A:txtMaxPage" readonly="true" size="2"  value="2" style="text-align:center;" disabled />&nbsp;
                                                            <input class="printButtonClass" type="button" value="Next" style="width: 100px;"
                                                                name="frm1701A:btnNextPage" id="frm1701A:btnNextPage"  onclick="processNext();" />
                                                            <br /><br />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr valign="middle" align="center">
                                                    <td>
                                                        <div align="center">
                                                        @if($action != 'view')
                                                            <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm1701A:cmdValidate" id="frm1701A:cmdValidate" onclick="validate()" />
                                                            <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm1701A:cmdEdit" id="frm1701A:cmdEdit" onclick="enableAllControl()"/>
                                                            <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                            <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                            <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                            <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1701A:btnFinalCopy" id="frm1701A:btnFinalCopy" onclick="submitForm();" />
                                                            <div id="msg" class="printButtonClass" style="display:none;"></div>                                   
                                                        @else
                                                            <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                            <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                        @endif
                                                        </div>
                                                        <br />
                                                    </td>
                                                    <div id="DummyTxt" style='display:none;'>  </div>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                        <td>
                            <div class="footer footer1701v2018" style="padding:6px; text-align: center; font-size: 11px; background-color: white; width: 100%;">
                             <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                            </div>
                        </td>
                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    
                </table>    
            </div>
        </div>
        <div id="hiddenEmail" style="display:none;"  > 
                <input type="text" value="{{$company->line_business}}"  size="20" name="frm1701A:txtLineBus" maxlength="30" id="frm1701A:txtLineBus" onblur="" />
        </div>

        <!-- Modal Row Counter -->
        <div id="modalRowCounter" class="modalShow" style="display:none;">  
            <input type="text" size="10" id="frm1701A:txtCtrmodalPartIVA" name="partIVAModalLayout()" value="0" />
            <input type="text" size="10" id="frm1701A:txtCtrmodalPartIVB" name="partIVBModalLayout()" value="0" />
        </div>

        <!-- ID container -->
        <div style="display:none;">
            <input type="text" id="frm1701A:txtZIP" name="frm1701A:Zip"/>
            <input type="text" id="frm1701A:txtEnabledInputsOnValidation"  name="frm1701A:txtEnabledInputsOnValidation" value='' />
            <input type="text" id="frm1701A:txtDisabledInputs"   name="frm1701A:txtDisabledInputs" />
            <input type="text" id="frm1701A:txtEnabledLinks"  name="frm1701A:txtEnabledLinks"   />
            <input type="text" id="frm1701A:txtIsSpouseDisabled"  name="frm1701A:txtIsSpouseDisabled" />
            <input type="text" id="frm1701A:txtIsTaxFilerDisabled"  name="frm1701A:txtIsTaxFilerDisabled" value="false"/>
            <input type="text" id="frm1701A:txtAttachmentTypes"  name="frm1701A:txtAttachmentTypes" />
            <input type="text" id="frm1701A:txtTIN4" name="frm1701A:txtTIN4"  />
            <input type="text" id="frm1701A:txtDisabledOnSave"  name="frm1701A:txtDisabledOnSave"  />
            <input type="text" id="frm1701A:txtEnabledOnSave"  name="frm1701A:txtEnabledOnSave" />

            <!-- ALWAYS CHANGE EVERY BUILD/RELEASE -->
            <input type="text" id="frm1701A:txtVersion" name="frm1701A:txtVersion" value="11112018" />

            <!-- for disabledFields() 03/20/14 -->
            <input type="text" id="frm1701A:txtdisabledID" name="frm1701A:txtdisabledID"  />
        </div>

        <!-- Part IV.A Modal -->
        <div id="modalPartIVA" class="modalShow" style="display:none;">     
            <div class="modalInner">      
                
                <table width="100%" class="tblForm">
                    <tr>
                        <td class="scheduleTd text-center" style="font-size: 15px;">Other Taxable Income</td>
                    </tr>
                </table>

                <table border="0" style="width:100%" class="tblForm noCellSpace">
                    <tr height="25px;">
                        <td class="tblFormTd" width="43%" align="center" ><span class="small">Description</span></td>
                        <td class="tblFormTd" width="23%" align="center" ><span class="small">A) Taxpayer/Filer</span></td>
                        <td class="tblFormTd" width="23%" align="center" ><span class="small">B) Spouse</span></td>
                        <td class="tblFormTd" width="" align="center" ></td>
                    </tr>
                </table>

                <table id="tblmodalPartIVA" class="tblForm" border="0" cellspacing="0" cellpadding="0" style="width:100%"></table>
                <table id="tblmodalPartIVARepository" style="display:none;"></table>
                
                <table border="0" width="100%" class="tblForm noCellSpace modalSubtotal">
                    <tr height="20px;">
                        <td width="43%" align="center" style="text-align:right;padding-right:30px;" ><span class="small">Total Other Income</span></td>
                        <td width="23%" align="center" style="padding-left:13px;" ><input type="text" class="disableByDefault" size="20" maxlength="12" style="text-align: right; background-color: rgb(220, 220, 220);" id="frm1701A:txtmodalPartIVA_C1" name="frm1701A:txtmodalPartIVA_C1" value="0.00" disabled /></td>
                        <td width="23%" align="center" style="padding-left:13px;"><input type="text" class="disableByDefault" size="20" maxlength="12" style="text-align: right; background-color: rgb(220, 220, 220);" id="frm1701A:txtmodalPartIVA_C2" name="frm1701A:txtmodalPartIVA_C2" value="0.00" disabled /></td>
                        <td width="" align="center" style="vertical-align: top;"></td>
                    </tr>
                </table>
                
                <table class="modalAction noCellSpace" style="background: #fff; width: 100%">
                    <tr height="30px;">
                        <td class="tblFormTd" align="center" width="100%" colspan="3" valign="middle">
                        <input type="button" style="margin: 10px 0px;" name="frm1701A:btnModalPartIVAAddRow" id="frm1701A:btnModalPartIVAAddRow" value="ADD ROW" onclick="addRow('partIVAModalLayout()');"  />
                        <input type="button" style="margin: 10px 0px;" name="frm1701A:btnModalPartIVASave" id="frm1701A:btnModalPartIVASave" value="SAVE" onclick="saveChanges('modalPartIVA', true);computePartIVAModal(true);"  />
                        <input type="button" style="margin: 10px 0px;" name="frm1701A:btnModalPartIVACancel" id="frm1701A:btnModalPartIVACancel" value="CANCEL" onclick="saveChanges('modalPartIVA', false);"  />
                        <input type="button" style="margin: 10px 0px;" name="frm1701A:btnModalPartIVASaveAndClose" id="frm1701A:btnModalPartIVASaveAndClose" value="SAVE AND CLOSE" onclick="saveChanges('modalPartIVA', true);closeModal('modalPartIVA');computePartIVAModal(false);"  />
                        <input type="button" style="margin: 10px 0px;" name="frm1701A:btnModalPartIVAClose" id="frm1701A:btnModalPartIVAClose" value="CLOSE" onclick="closeModal('modalPartIVA', 'CloseWithoutSaving');computePartIVAModal(false);"  />
                        <input class="printButtonClass" type="button" value="PRINT" style="width: 100px;" name="frm1701A:btnModalPartIVAPrint" id="frm1701A:btnModalPartIVAPrint" onclick="printModal('modalPartIVA');" disabled />
                        </td>
                    </tr>
                </table>
            </div>            
        </div>

        <!-- Part IV.B Modal -->
        <div id="modalPartIVB" class="modalShow" style="display:none;">     
            <div class="modalInner" style="background: #fff">      
                
                <table width="100%" class="tblForm">
                    <tr>
                        <td class="scheduleTd">Other Non-Operating Income</td>
                    </tr>
                </table>

                <table border="0" style="width:100%" class="tblForm noCellSpace">
                    <tr height="25px;">
                        <td class="tblFormTd" width="43%" align="center" ><span class="small">Description</span></td>
                        <td class="tblFormTd" width="23%" align="center" ><span class="small">A) Taxpayer/Filer</span></td>
                        <td class="tblFormTd" width="23%" align="center" ><span class="small">B) Spouse</span></td>
                        <td class="tblFormTd" width="" align="center" ></td>
                    </tr>
                </table>

                <table id="tblmodalPartIVB" class="tblForm" border="0" cellspacing="0" cellpadding="0" style="width:99%"></table>
                <table id="tblmodalPartIVBRepository" style="display:none;"></table>
                
                <table border="0" width="100%" class="tblForm noCellSpace modalSubtotal">
                    <tr height="20px;">
                        <td width="43%" align="center" style="text-align:right;padding-right:30px;" ><span class="small">Total Other Income</span></td>
                        <td width="23%" align="center" style="padding-left:13px;" ><input type="text" class="disableByDefault" size="20" maxlength="12" style="text-align: right; background-color: rgb(220, 220, 220);" id="frm1701A:txtmodalPartIVB_C1" name="frm1701A:txtmodalPartIVB_C1" value="0.00" disabled /></td>
                        <td width="23%" align="center" style="padding-left:13px;"><input type="text" class="disableByDefault" size="20" maxlength="12" style="text-align: right; background-color: rgb(220, 220, 220);" id="frm1701A:txtmodalPartIVB_C2" name="frm1701A:txtmodalPartIVB_C2"  value="0.00" disabled /></td>
                        <td width="" align="center" style="vertical-align: top;"></td>
                    </tr>
                </table>
                
                <table class="modalAction noCellSpace">
                    <tr height="30px;">
                        <td class="tblFormTd" align="center" width="100%" colspan="3" valign="middle">
                        <input type="button" name="frm1701A:btnModalPartIVBAddRow" id="frm1701A:btnModalPartIVBAddRow" value="ADD ROW" onclick="addRow('partIVBModalLayout()');"  />
                        <input type="button" name="frm1701A:btnModalPartIVBSave" id="frm1701A:btnModalPartIVBSave" value="SAVE" onclick="saveChanges('modalPartIVB', true);computePartIVBModal(true);"  />
                        <input type="button" name="frm1701A:btnModalPartIVBCancel" id="frm1701A:btnModalPartIVBCancel" value="CANCEL" onclick="saveChanges('modalPartIVB', false);"  />
                        <input type="button" name="frm1701A:btnModalPartIVBSaveAndClose" id="frm1701A:btnModalPartIVBSaveAndClose" value="SAVE AND CLOSE" onclick="saveChanges('modalPartIVB', true);closeModal('modalPartIVB');computePartIVBModal(false);"  />
                        <input type="button" name="frm1701A:btnModalPartIVBClose" id="frm1701A:btnModalPartIVBClose" value="CLOSE" onclick="closeModal('modalPartIVB', 'CloseWithoutSaving');computePartIVBModal(false);"  />
                        <input class="printButtonClass" type="button" value="PRINT" style="width: 100px;" name="frm1701A:btnModalPartIVBPrint" id="frm1701A:btnModalPartIVBPrint" onclick="printModal('modalPartIVB');" disabled />
                        </td>
                    </tr>
                </table>
            </div>            
        </div>
        <div id="hiddenEnroll" style="display:none;"  > 
            <input id="txtFinalFlag" class="FinalFlag" name="txtFinalFlag" type="text" onblur="" onkeypress="" value="0" maxlength="60"   />
            <input id="txtEnroll" name="txtEnroll" type="text" onblur="" onkeypress="" value="N" maxlength="60"   />
            
        </div>
        <div style="display: none">
            <input type="text" id="ebirOnlineConfirmUsername" maxlength="50" />
            <input type="password" id="ebirOnlineConfirmPassword" maxlength="50" />
            <input type="button" id="ebirOnlineConfirmSubmit" value="Submit" onclick="sendEmail(this); " />
            <input type="button" id="ebirOnlineConfirmCancel" value="Cancel" onclick="SetFinalFlagTo0();closeDialog('ebirConfirmOnline'); " />
            <input type="text" id="ebirOnlineUsername" maxlength="50" />
            <input type="password" id="ebirOnlinePassword" maxlength="50" />
            <input type="text" id="ebirOnlineSecret" maxlength="50" style="display: none;" />
            <input type="button" id="ebirOnlineSubmit" value="Submit" onclick="ValidateUserPass('1701A');" />
            <input type="button" id="ebirOnlineCancel" value="Cancel" onclick="SetFinalFlagTo0();closeDialog('ebirOnline'); " />
        </div>
    </form>
    <textarea id='responsetext' style="display: none;"></textarea>
   <!-- XML retrieval -->
   <div style="display: none;">
      <xmp id='xmlFormat'>  
            </xmp>
      <!--format the doc -->
      <span id='xmlClose'>All Rights Reserved BIR 2014.</span>
   </div>
   <div id="responseBG" style="display: none;">
      <!--loaded files render here-->
   </div>
   <div id="response" style="display: none;">
      <!--loaded files render here-->
   </div>
   <div id="responseRdo" style="display: none;">
      <!--loaded files render here-->
   </div>
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
            loadXML(fileName);
            existingXMLFileName = fileName;
            
            d.getElementById('frm1701A:txtYear').disabled = true;

            //if amend
            if (d.getElementById('frm1701A:optAmendedReturn_1').checked) {
                if (d.getElementById("frm1701A:txtSpouseName").value != "") {
                    d.getElementById("frm1701A:txt61A").disabled = false;
                    d.getElementById("frm1701A:txt61B").disabled = false;
                } else {
                    d.getElementById("frm1701A:txt61A").disabled = false;
                    d.getElementById("frm1701A:txt61B").disabled = true;
                }
            }

            //foreigntaxcredit
            processFTC('taxpayer');processFTC('taxspouse');
            //CivilStatus
            processCivilStatus();

            //joint filing
            if (d.getElementById("frm1701A:optFilingStatus_1").checked) {
                enableSpouse();
            }

            //if overpayment
            processOverpayment();
            
            //taxpayer
            if (d.getElementById('frm1701A:optTaxRate_1').checked == true) {
                enablePartIVA('taxpayer');
            } else if (d.getElementById('frm1701A:optTaxRate_2').checked == true) {
                enablePartIVB('taxpayer');
            }
            //spouse
            if (d.getElementById('frm1701A:optSpouseTaxRate_1').checked == true) {
                enablePartIVA('taxspouse');
            } else if (d.getElementById('frm1701A:optSpouseTaxRate_2').checked == true) {
                enablePartIVB('taxspouse');
            }

            //other disables
            //disableEnableFieldsOnReload();
            validateModalState(true);

            if (gIsReadOnly) {
                window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false; d.getElementById('frm1701A:txtCurrentPage').disabled = false; d.getElementById('frm1701A:btnPrevPage').disabled = false; d.getElementById('frm1701A:btnNextPage').disabled = false;", 1000);
            }
        } else {
            window.setTimeout("$('#loader').hide('blind');", 100);
        }
        if ($('#printMenu').css('display') != 'none') {
            $('#printMenu').hide('blind');
        }
        document.getElementById('frm1701A:txtTIN1').disabled = true; document.getElementById('frm1701A:txtTIN2').disabled = true; document.getElementById('frm1701A:txtTIN3').disabled = true; document.getElementById('frm1701A:txtBranchCode').disabled = true;
    
        
        // Disable pasting
        $(document).ready(function () {
            $('input').bind('paste', function (e) {
                e.preventDefault();
            });
        });
    }

    var rdoList = new Array();
    function init() {
        loadXMLrdo('/xml/rdo.xml');
        getRdo();
        var dt = new Date();
        d.getElementById('frm1701A:txtMonth').selectedIndex = 12;
        d.getElementById('frm1701A:txtYear').value = dt.getFullYear();
        
        d.getElementById('frm1701A:optRefund_1').disabled = true;
        d.getElementById('frm1701A:optRefund_2').disabled = true;
        d.getElementById('frm1701A:optRefund_3').disabled = true;
        
        currentPage = 1;
        d.getElementById('frm1701A:txtCurrentPage').value = currentPage;

        @if($action != 'view')
        d.getElementById('frm1701A:cmdEdit').disabled = true;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1701A:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @endif
    }

    function setIsInitialValue() {

        var response = d.getElementById("response");

        isInitial = (isReload) ? false : true;
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
                d.getElementById('frm1701A:cmdValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
        }

    }

    function loadData() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");
        var elem = d.getElementById('frmMain').elements;
        var fieldVal = "";
        var counter = 0;

        //Creata modal rows based on counter  
        var modalRowCounter = d.getElementById('modalRowCounter').getElementsByTagName('input');
        
        for (var i = 0; i < modalRowCounter.length; i++) {
            if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1) {
                counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
                var layoutFunction = modalRowCounter[i].name.toString();
                
                for (var k = 0; k < counter; k++) {
                    
                    addRow('' + layoutFunction + '');

                }
            }
        }

        for (var i = 0; i < elem.length; i++) {

            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&           
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {

                    if(elem[i].id != 'frm1701A:txtAddress2'){
                        fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
                    }
                    else{
                        fieldVal = String( $("#response").html() ).split("frm1701A:txtAddress=");
                    }

                    if (elem[i].id == 'frm1701A:txtTaxpayerName' || elem[i].id == 'frm1701A:txtLineBus') {
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    else if(elem[i].id == 'frm1701A:txtAddress'){
                        if(fieldVal[1].length <= 100){
                            elem[i].value = unescape(fieldVal[1]);
                        }
                        else {
                            elem[i].value = unescape(fieldVal[1].substring(0, 100));
                        }
                    }
                    else if(elem[i].id == 'frm1701A:txtAddress2'){
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

        //save mainPages modals
        for (var i = 0; i < modalRowCounter.length; i++) {
            if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1) {
                counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
                var len = (modalRowCounter[i].id).length;
                var modalName = (modalRowCounter[i].id).substring(15, len);
                
                if (counter > 0) {
                    //set to -1 to remove alert on saving
                    saveChanges(modalName, -1);
                    clearTable(d.getElementById("tbl" + modalName));
                }
            }
        }
        
        isReload = false;
        document.getElementById('txtEmail').value = globalEmail;
    }

    function rdoPropertyJS(rdoCode, description) {
        this.rdoCode = rdoCode;
        this.description = description;
    }

    var XMLrdoFile = '';
    function loadXMLrdo(fileLocation) {
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
                //alert('1701 successfully created array #'+i);

            } else {
                //alert('1701 not found in array #'+i);
                continue;
            }
        }
    }

    function getRdo() {
        var data2 = "<select class='iceSelOneMnu' id='frm1701A:txtSpouseRDOCode' name='frm1701A:txtSpouseRDOCode' size='1' disabled><option value='000'> </option>";
        for (var i = 0; i < rdoList.length; i++) {
            var rdo = rdoList[i];
            data2 = data2 + "<option value='" + rdo.rdoCode + "'>" + rdo.description + "</option>";
        }
        data2 = data2 + "</select>"

        $('#spouseRdoSelect').html(data2);
    }

    function disableLinkIfEmpty(e, linkID) {

        var link = d.getElementById(linkID);
        var IDs = [];
        var isValid = true;
        var changeLinkState = true;
        var paramType = (typeof e);
        var isTaxfilerDisabled = (!d.getElementById('frm1701A:optTaxRate_1').checked) ? true : false;
        var isSpouseDisabled = (!d.getElementById('frm1701A:optSpouseTaxRate_1').checked) ? true : false;

        //if parameter is string, set of IDs
        if (paramType.toString() === "string"){
            
            IDs = e.split(",");
            
            if (IDs.length > 0){
                
                //store IDs here,
                //add spouse ID which is not included in parameter
                var completeIDs = [];
                
                for (var x=0; x < IDs.length; x++) {
                    
                    completeIDs.push(IDs[x]);
                
                    //add SpouseID
                    var spouseID = "";
                    if (IDs[x].indexOf("Desc") === -1 ) {
                        spouseID = IDs[x].substring(0, IDs[x].length - 1) + "B";
                    }

                    if (spouseID != null ){
                        if (spouseID.toString().trim() != ""){
                            completeIDs.push(spouseID);
                        }
                    }
                    
                    if ( (d.getElementById(IDs[x]) != null)  &&   (d.getElementById(IDs[x]).value.toString().trim() === "OTHERS")  &&    (d.getElementById(IDs[x]).disabled)  ){
                        
                        changeLinkState = false;
                    }   
                }
                
                if (changeLinkState){
                    for (var x=0; x < completeIDs.length; x++) {

                        var ctrl = d.getElementById(completeIDs[x]);
                        
                        if (ctrl != null &&  ctrl.type=== "text"){
                        
                            //validate description
                            if ( ctrl.maxLength !== 25){
                                
                                if (ctrl.value.toString().trim() === ""){
                                    isValid = false;
                                }
                                
                            //validate amounts
                            }else{
                                //spouse
                                if (completeIDs[x].indexOf('B') !== -1) {

                                    if (!isSpouseDisabled && WholeNumWithComma(ctrl.value) <= 0) {
                                        isValid = false;
                                    }
                                //taxpayer
                                } else {
                                    if (!isTaxfilerDisabled && WholeNumWithComma(ctrl.value) <= 0) {
                                        isValid = false;
                                    }
                                
                                    if (!isValid){
                                        break;
                                    }
                                    
                                }
                            }
                        }
                    }
                }
            }
        //if parameter is 'this' [type of object]
        }else{
            
            if ((e.maxLength !== 25 && e.value.toString().trim() === "") || (e.maxLength === 25 && e.value <= 0)){
                isValid = false;
            }
        }

        link.disabled = !isValid;

        //save enabled link to frm1701A:txtEnabledLinks
        //will be used for reloading of data from XML
        if (isValid){
            enabledlinkIDs_Add(true, linkID);
        }else{
            enabledlinkIDs_Add(false, linkID);
        }
    }

    function computeTxt20(person) {
        if (person == "taxpayer") {
            if (d.getElementById("frm1701A:optTaxRate_1").checked == true) {
                d.getElementById("frm1701A:txt20A").value = d.getElementById("frm1701A:txt46A").value;
            }
            else {
                d.getElementById("frm1701A:txt20A").value = d.getElementById("frm1701A:txt56A").value;
            }
        } else if (person == "taxspouse") {
            if (d.getElementById("frm1701A:optSpouseTaxRate_1").checked == true) {
                d.getElementById("frm1701A:txt20B").value = d.getElementById("frm1701A:txt46B").value;
            }
            else {
                d.getElementById("frm1701A:txt20B").value = d.getElementById("frm1701A:txt56B").value;
            }
        }
        computeTxt24(person);
    }

    function computeTxt24(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt24A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt22A").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt23A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt24B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt22B").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt23B").value) * 1).toFixed(2));
        }
        computeTxt29(person);
    }

    function computePenalties(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt28A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt25A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt26A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt27A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt28B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt25B").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt26B").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt27B").value) * 1).toFixed(2));
        }
        computeTxt29(person);
    }

    function computeTxt29(person) {
        if (person == "taxpayer") {
            if (NumWithComma(d.getElementById('frm1701A:txt24A').value) < 0) {
                d.getElementById('frm1701A:txt29A').value = d.getElementById('frm1701A:txt24A').value;
            } else {
                d.getElementById('frm1701A:txt29A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt24A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt28A").value) * 1).toFixed(2));
            }
        } else if (person == "taxspouse") {
            if (NumWithComma(d.getElementById('frm1701A:txt24B').value) < 0) {
                d.getElementById('frm1701A:txt29B').value = d.getElementById('frm1701A:txt24B').value;
            } else {
                d.getElementById('frm1701A:txt29B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt24B").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt28B").value) * 1).toFixed(2));
            }
        }
        computeTxt30();
    }

    function computeTxt30() {
        d.getElementById('frm1701A:txt30').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt29A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt29B").value) * 1).toFixed(2));
        
        processOverpayment();
    }

    function computeTxt38(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt38A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt36A").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt37A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt38B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt36B").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt37B").value) * 1).toFixed(2));
        }
        computeTxt39(person);
    }

    function computeTxt39(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt39A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt38A").value) * 40/100).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt39B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt38B").value) * 40/100).toFixed(2));
        }
        computeTxt40(person);
    }

    function computeTxt40(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt40A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt38A").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt39A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt40B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt38B").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt39B").value) * 1).toFixed(2));
        }
        computeTxt45(person);
    }

    function computeTxt44(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt44A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt41A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt42A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt43A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt44B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt41B").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt42B").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt43B").value) * 1).toFixed(2));
        }
        computeTxt45(person);
    }

    function computeTxt45(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt45A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt40A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt44A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt45B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt40B").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt44B").value) * 1).toFixed(2));
        }
        computeTxt46(person);
    }

    function computeTxt46(person) {
        if (d.getElementById("frm1701A:txtYear").value >= 2018 && d.getElementById("frm1701A:txtYear").value <= 2022) {
            if (person == "taxpayer") {
                var v45a = NumWithComma(d.getElementById("frm1701A:txt45A").value) * 1;
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

                d.getElementById("frm1701A:txt46A").value = formatCurrency(total);
            } else if (person == "taxspouse") {
                var v45b = NumWithComma(d.getElementById("frm1701A:txt45B").value) * 1;
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

                d.getElementById("frm1701A:txt46B").value = formatCurrency(total);
            }
        }
        else if (d.getElementById("frm1701A:txtYear").value > 2022) {
            if (person == "taxpayer") {
                var v45a = NumWithComma(d.getElementById("frm1701A:txt45A").value) * 1;
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

                d.getElementById("frm1701A:txt46A").value = formatCurrency(total);
            } else if (person == "taxspouse") {
                var v45b = NumWithComma(d.getElementById("frm1701A:txt45B").value) * 1;
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

                d.getElementById("frm1701A:txt46B").value = formatCurrency(total);
            }
        }
        else if (d.getElementById("frm1701A:txtYear").value < 2018) {
            if (person == "taxpayer") {
                var v45a = NumWithComma(d.getElementById("frm1701A:txt45A").value) * 1;
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

                d.getElementById("frm1701A:txt46A").value = formatCurrency(total);
            } else if (person == "taxspouse") {
                var v45b = NumWithComma(d.getElementById("frm1701A:txt45B").value) * 1;
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
                d.getElementById("frm1701A:txt46B").value = formatCurrency(total);
            }
        }
        computeTxt65(person);
    }

    function computeTxt49(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt49A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt47A").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt48A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt49B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt47B").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt48B").value) * 1).toFixed(2));
        }
        computeTxt53(person);
    }

    function computeTxt52(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt52A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt50A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt51A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt52B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt50B").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt51B").value) * 1).toFixed(2));
        }
        computeTxt53(person);
    }

    function computeTxt53(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt53A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt49A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt52A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt53B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt49B").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt52B").value) * 1).toFixed(2));
        }
        
        item53Validate(person);
    }

    function computeTxt55(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt55A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt53A").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt54A").value) * 1).toFixed(2));
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt55B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt53B").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt54B").value) * 1).toFixed(2));
        }
        computeTxt56(person);
    }

    function computeTxt56(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt56A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt55A").value) * 8/100).toFixed(2));

            if (NumWithComma(d.getElementById("frm1701A:txt55A").value) < 0) {
                d.getElementById('frm1701A:txt56A').value = (0).toFixed(2);
            }
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt56B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt55B").value) * 8/100).toFixed(2));

            if (NumWithComma(d.getElementById("frm1701A:txt55B").value) < 0) {
                d.getElementById('frm1701A:txt56B').value = (0).toFixed(2);
            }
        }
        computeTxt65(person);
    }

    function computeTxt64(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt64A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt57A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt58A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt59A").value) * 1
            + NumWithComma(d.getElementById("frm1701A:txt60A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt61A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt62A").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt63A").value) * 1).toFixed(2));

            d.getElementById('frm1701A:txt21A').value = d.getElementById('frm1701A:txt64A').value;
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt64B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt57B").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt58B").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt59B").value) * 1
            + NumWithComma(d.getElementById("frm1701A:txt60B").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt61B").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt62B").value) * 1 + NumWithComma(d.getElementById("frm1701A:txt63B").value) * 1).toFixed(2));

            d.getElementById('frm1701A:txt21B').value = d.getElementById('frm1701A:txt64B').value;
        }
        computeTxt65(person);
    }

    function computeTxt65(person) {
        if (person == "taxpayer") {
            if (d.getElementById("frm1701A:optTaxRate_1").checked == true) {
                d.getElementById('frm1701A:txt65A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt46A").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt64A").value) * 1).toFixed(2));
            }
            else {
                d.getElementById('frm1701A:txt65A').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt56A").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt64A").value) * 1).toFixed(2));
            }

            d.getElementById('frm1701A:txt22A').value = d.getElementById('frm1701A:txt65A').value;
        } else if (person == "taxspouse") {
            if (d.getElementById("frm1701A:optSpouseTaxRate_1").checked == true) {
                d.getElementById('frm1701A:txt65B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt46B").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt64B").value) * 1).toFixed(2));
            }
            else {
                d.getElementById('frm1701A:txt65B').value = formatCurrency((NumWithComma(d.getElementById("frm1701A:txt56B").value) * 1 - NumWithComma(d.getElementById("frm1701A:txt64B").value) * 1).toFixed(2));
            }

            d.getElementById('frm1701A:txt22B').value = d.getElementById('frm1701A:txt65B').value;
        }
        computeTxt20(person);
        
    }

    function computePartIVAModal(bool) {
    
        var tableID = "";
        var  subtotalTextboxA ;
        var  subtotalTextboxB ;
        
        // if true, set subtotal inside modal
        if (bool === true){
            tableID = "tblmodalPartIVA";
            subtotalTextboxA = d.getElementById('frm1701A:txtmodalPartIVA_C1');
            subtotalTextboxB = d.getElementById('frm1701A:txtmodalPartIVA_C2');
        }
        // if false, set subtotal outside modal 
        else{
            tableID = "tblmodalPartIVARepository";
            subtotalTextboxA = d.getElementById('frm1701A:txt42A');
            subtotalTextboxB = d.getElementById('frm1701A:txt42B');
        }
        
        var tableSize = d.getElementById(tableID).rows.length;
        var table = d.getElementById(tableID);
        var taxPayerFilerSummation = 0;
        var spouseSummation = 0;
        
        for (var i = 0; i < tableSize; i++) {
            
            taxPayerFilerSummation = formatCurrency((NumWithComma(taxPayerFilerSummation) * 1 + NumWithComma(table.rows[i].cells[2].children[0].value) * 1).toFixed(2));
            spouseSummation = formatCurrency((NumWithComma(spouseSummation) * 1 + NumWithComma(table.rows[i].cells[3].children[0].value) * 1).toFixed(2));
            
            
        }

       subtotalTextboxA.value = taxPayerFilerSummation;
       subtotalTextboxB.value = spouseSummation;

       //compute textboxes outside modal
       computePartIVAOtherIncome('taxpayer');
       computePartIVAOtherIncome('taxspouse');
        
    }

    function computePartIVAOtherIncome(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt42A').value = d.getElementById('frm1701A:txtmodalPartIVA_C1').value;
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt42B').value = d.getElementById('frm1701A:txtmodalPartIVA_C2').value;
        }

        computeTxt44(person);
    }

    function computePartIVBModal(bool) {
    
        var tableID = "";
        var  subtotalTextboxA ;
        var  subtotalTextboxB ;
        
        // if true, set subtotal inside modal
        if (bool === true){
            tableID = "tblmodalPartIVB";
            subtotalTextboxA = d.getElementById('frm1701A:txtmodalPartIVB_C1');
            subtotalTextboxB = d.getElementById('frm1701A:txtmodalPartIVB_C2');
        }
        // if false, set subtotal outside modal 
        else{
            tableID = "tblmodalPartIVBRepository";
            subtotalTextboxA = d.getElementById('frm1701A:txt51A');
            subtotalTextboxB = d.getElementById('frm1701A:txt51B');
        }
        
        var tableSize = d.getElementById(tableID).rows.length;
        var table = d.getElementById(tableID);
        var taxPayerFilerSummation = 0;
        var spouseSummation = 0;
        
        for (var i = 0; i < tableSize; i++) {
            
            taxPayerFilerSummation = formatCurrency((NumWithComma(taxPayerFilerSummation) * 1 + NumWithComma(table.rows[i].cells[2].children[0].value) * 1).toFixed(2));
            spouseSummation = formatCurrency((NumWithComma(spouseSummation) * 1 + NumWithComma(table.rows[i].cells[3].children[0].value) * 1).toFixed(2));
            
            
        }

    subtotalTextboxA.value = taxPayerFilerSummation;
    subtotalTextboxB.value = spouseSummation;

    //compute textboxes outside modal
    computePartIVBOtherIncome('taxpayer');
    computePartIVBOtherIncome('taxspouse');
        
    }

    function computePartIVBOtherIncome(person) {
        if (person == "taxpayer") {
            d.getElementById('frm1701A:txt51A').value = d.getElementById('frm1701A:txtmodalPartIVB_C1').value;
        } else if (person == "taxspouse") {
            d.getElementById('frm1701A:txt51B').value = d.getElementById('frm1701A:txtmodalPartIVB_C2').value;
        }

        computeTxt52(person);
    }

    function removeCommaParenthesis(senderID) {
        var senderValue = d.getElementById(senderID).value;

        if (senderValue.toString().indexOf('(') != -1 || senderValue.toString().indexOf(')') != -1) {
            senderValue = NumWithParenthesis(senderValue);
        }

        if (senderValue.toString().indexOf(',') != -1) {
            senderValue = WholeNumWithComma(senderValue);
        }

        if(!isNaN(senderValue)){
            return (senderValue * 1);
        }
        else {
             return senderValue;
        }
    }

    //convert to Number to avoid NaN
    function convertToNumber(value) {
        var xNumber = (value) * 1;
    
        if (xNumber.toString() === "NaN") {
            xNumber = 0;
        }
        return xNumber;
    };

    /*-----End of Computation-----*/

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

    function processAmend() {
         if (d.getElementById('frm1701A:optAmendedReturn_1').checked) {
            if (d.getElementById("frm1701A:txtSpouseName").value != "") {
                d.getElementById("frm1701A:txt61A").disabled = false;
                d.getElementById("frm1701A:txt61B").disabled = false;
            } else {
                d.getElementById("frm1701A:txt61A").disabled = false;
                d.getElementById("frm1701A:txt61B").disabled = true;
            }
        } else {
            d.getElementById("frm1701A:txt61A").disabled = true;
            d.getElementById("frm1701A:txt61B").disabled = true;
            d.getElementById("frm1701A:txt61A").value = (0).toFixed(2);
            d.getElementById("frm1701A:txt61B").value = (0).toFixed(2);
        } 
    }

    function processShortPeriod() {
        if (d.getElementById("frm1701A:optShortPeriod_1").checked) {
            alert("Choosing 'YES' means you are filing for a short period return. You are required to change the Month field to correspond with your Last Return Period.");
            d.getElementById("frm1701A:txtMonth").disabled = false;
            d.getElementById("frm1701A:txtMonth").focus();
        } else {
            d.getElementById("frm1701A:txtMonth").selectedIndex = 12;
            d.getElementById("frm1701A:txtMonth").disabled = true;
        }
        
    }

    function processTaxpayerType(person) {
        if (person == "taxpayer") {
            if (d.getElementById("frm1701A:optTaxType_1").checked) {
                d.getElementById("frm1701A:optATC_1").disabled = false;
                d.getElementById("frm1701A:optATC_3").disabled = false;

                d.getElementById("frm1701A:optATC_2").checked = false;
                d.getElementById("frm1701A:optATC_4").checked = false;
                d.getElementById("frm1701A:optATC_2").disabled = true;
                d.getElementById("frm1701A:optATC_4").disabled = true;


            } else if (d.getElementById("frm1701A:optTaxType_2").checked) {
                d.getElementById("frm1701A:optATC_2").disabled = false;
                d.getElementById("frm1701A:optATC_4").disabled = false;

                d.getElementById("frm1701A:optATC_1").checked = false;
                d.getElementById("frm1701A:optATC_3").checked = false;
                d.getElementById("frm1701A:optATC_1").disabled = true;
                d.getElementById("frm1701A:optATC_3").disabled = true;
            }

            processATC(person);
        } else if (person == "taxspouse") {
            if (d.getElementById("frm1701A:optSpouseTaxType_1").checked) {
                d.getElementById("frm1701A:optSpouseATC_1").disabled = false;
                d.getElementById("frm1701A:optSpouseATC_3").disabled = false;

                d.getElementById("frm1701A:optSpouseATC_2").checked = false;
                d.getElementById("frm1701A:optSpouseATC_4").checked = false;
                d.getElementById("frm1701A:optSpouseATC_2").disabled = true;
                d.getElementById("frm1701A:optSpouseATC_4").disabled = true;
            } else if (d.getElementById("frm1701A:optSpouseTaxType_2").checked) {
                d.getElementById("frm1701A:optSpouseATC_2").disabled = false;
                d.getElementById("frm1701A:optSpouseATC_4").disabled = false;

                d.getElementById("frm1701A:optSpouseATC_1").checked = false;
                d.getElementById("frm1701A:optSpouseATC_3").checked = false;
                d.getElementById("frm1701A:optSpouseATC_1").disabled = true;
                d.getElementById("frm1701A:optSpouseATC_3").disabled = true;
            }

            processATC(person);
        }
    }

    function processFTC(person) {
        if (person == "taxpayer") {
            if (d.getElementById("frm1701A:optForeignTaxCredits_1").checked) {
                d.getElementById("frm1701A:txtForeignTaxNumber").disabled = false;
                d.getElementById("frm1701A:txt62A").disabled = false;
            } else {
                d.getElementById("frm1701A:txtForeignTaxNumber").disabled = true;
                d.getElementById("frm1701A:txt62A").disabled = true;
                d.getElementById("frm1701A:txtForeignTaxNumber").value = "";
                d.getElementById("frm1701A:txt62A").value = (0).toFixed(2);
            }
        } else if (person == "taxspouse") {
            if (d.getElementById("frm1701A:optSpouseFTC_1").checked) {
                d.getElementById("frm1701A:txtSpouseFTN").disabled = false;
                d.getElementById("frm1701A:txt62B").disabled = false;
            } else {
                d.getElementById("frm1701A:txtSpouseFTN").disabled = true;
                d.getElementById("frm1701A:txt62B").disabled = true;
                d.getElementById("frm1701A:txtSpouseFTN").value = "";
                d.getElementById("frm1701A:txt62B").value = (0).toFixed(2);
            }
        }
    }

    function processCivilStatus() {
        if (d.getElementById("frm1701A:optCivilStatus_2").checked) {
            d.getElementById("frm1701A:optSpouseIncome_1").disabled = false;
            d.getElementById("frm1701A:optSpouseIncome_2").disabled = false;
            d.getElementById("frm1701A:optFilingStatus_1").disabled = false;
            d.getElementById("frm1701A:optFilingStatus_2").disabled = false;
        } else {
            d.getElementById("frm1701A:optSpouseIncome_1").disabled = true;
            d.getElementById("frm1701A:optSpouseIncome_2").disabled = true;
            d.getElementById("frm1701A:optFilingStatus_1").disabled = true;
            d.getElementById("frm1701A:optFilingStatus_2").disabled = true;
            d.getElementById("frm1701A:optSpouseIncome_1").checked = false;
            d.getElementById("frm1701A:optSpouseIncome_2").checked = false;
            d.getElementById("frm1701A:optFilingStatus_1").checked = false;
            d.getElementById("frm1701A:optFilingStatus_2").checked = false;
        }

        processFilingStatus();
    }

    function processSpouseIncome() {
        if (d.getElementById("frm1701A:optSpouseIncome_2").checked) {
            d.getElementById("frm1701A:optFilingStatus_1").disabled = true;
            d.getElementById("frm1701A:optFilingStatus_2").disabled = true;
            d.getElementById("frm1701A:optFilingStatus_1").checked = false;
            d.getElementById("frm1701A:optFilingStatus_2").checked = false;
        } else if (d.getElementById("frm1701A:optSpouseIncome_1").checked) {
            d.getElementById("frm1701A:optFilingStatus_1").disabled = false;
            d.getElementById("frm1701A:optFilingStatus_2").disabled = false;
        }

        processFilingStatus();
    }

    function processFilingStatus() {
        if (d.getElementById("frm1701A:optFilingStatus_1").checked) {
            enableSpouse();
        } else {
            disableSpouse();
        }
    }

    function processATC(person) {
        if (person == "taxpayer") {
            if (d.getElementById("frm1701A:optATC_1").checked == true || d.getElementById("frm1701A:optATC_2").checked == true) {
                d.getElementById("frm1701A:optTaxRate_1").checked = true;
                d.getElementById("frm1701A:optTaxRate_1").disabled = false;
                d.getElementById("frm1701A:optTaxRate_2").checked = false;
                d.getElementById("frm1701A:optTaxRate_2").disabled = true;

                enablePartIVA(person);
            } else if (d.getElementById("frm1701A:optATC_3").checked == true || d.getElementById("frm1701A:optATC_4").checked == true) {
                d.getElementById("frm1701A:optTaxRate_2").checked = true;
                d.getElementById("frm1701A:optTaxRate_2").disabled = false;
                d.getElementById("frm1701A:optTaxRate_1").checked = false;
                d.getElementById("frm1701A:optTaxRate_1").disabled = true;

                enablePartIVB(person);
            } else {
                d.getElementById("frm1701A:optTaxRate_1").checked = false;
                d.getElementById("frm1701A:optTaxRate_2").checked = false;

                disablePartIVA(person);
                disablePartIVB(person);
            }
        } else if (person == "taxspouse") {
            if (d.getElementById("frm1701A:optSpouseATC_1").checked == true || d.getElementById("frm1701A:optSpouseATC_2").checked == true) {
                d.getElementById("frm1701A:optSpouseTaxRate_1").checked = true;
                d.getElementById("frm1701A:optSpouseTaxRate_1").disabled = false;
                d.getElementById("frm1701A:optSpouseTaxRate_2").checked = false;
                d.getElementById("frm1701A:optSpouseTaxRate_2").disabled = true;

                enablePartIVA(person);
            } else if (d.getElementById("frm1701A:optSpouseATC_3").checked == true || d.getElementById("frm1701A:optSpouseATC_4").checked == true) {
                d.getElementById("frm1701A:optSpouseTaxRate_2").checked = true;
                d.getElementById("frm1701A:optSpouseTaxRate_2").disabled = false;
                d.getElementById("frm1701A:optSpouseTaxRate_1").checked = false;
                d.getElementById("frm1701A:optSpouseTaxRate_1").disabled = true;

                enablePartIVB(person);
            }
        }
    }

    function processOverpayment() {
        if (NumWithComma(d.getElementById('frm1701A:txt30').value) < 0) {
            d.getElementById('frm1701A:optRefund_1').disabled = false;
            d.getElementById('frm1701A:optRefund_2').disabled = false;
            d.getElementById('frm1701A:optRefund_3').disabled = false;
        } else {
            d.getElementById('frm1701A:optRefund_1').disabled = true;
            d.getElementById('frm1701A:optRefund_2').disabled = true;
            d.getElementById('frm1701A:optRefund_3').disabled = true;
            d.getElementById('frm1701A:optRefund_1').checked = false;
            d.getElementById('frm1701A:optRefund_2').checked = false;
            d.getElementById('frm1701A:optRefund_3').checked = false;
        }
    }

    function storeDisabledinputIDs(){
    
        var container = d.getElementById("frm1701A:txtDisabledInputs");
        var str  = "";
        
        for (var i=0; i < disabledinputIDs.length; i++) {
            str += "+" + disabledinputIDs[i]
        }
        
        container.value = str;

    }
    
    function storeEnabledlinkIDs(){
        
        var container = d.getElementById("frm1701A:txtEnabledLinks");
        var str  = "";
        
        for (var i=0; i < enabledlinkIDs.length; i++) {
            str += "," + enabledlinkIDs[i]
        }
        
        container.value = str;

    }

    /*-----Modal Functions-----*/

    var activeModalLink;
    var isValidToClose = true; //for modal column iteration
    var isInitial = true; // for modal column iteration
    var isReload = false;  //modal column iteration
    var atcCounterTaxFiler = 0;
    var atcCounterSpouse = 0;
    var part8InvalidCounter = 0;

    //gets the table in the modal
    //returns array of table //table[0] = tempTable   //table[1] = mainTable 
    function getTempAndMainTable(modalID)
    {
        var tables = [];
        tables =  d.getElementById(modalID).getElementsByTagName("table");
        
        var modalTable = [];
        var tempTable = [];
        var mainTable = [];

        for (var i=0; i < (tables.length); i++) {
        if(tables[i].id.indexOf("Repository") > 0)
        {
            mainTable[0] = (tables[i]);
        }
        else
        {
            if (tables[i].id.trim() !== ""){
            tempTable[0] = (tables[i]);
            }
        }
    
        }
        
        if (tempTable.length === 0 ){
        //alert("Unable to find Temp table for modalID : " + modalID);
        } 
        else if (mainTable.length === 0 ){
        //alert("Unable to find Main table for modalID : " + modalID);
        }
        else{
        modalTable[0] = tempTable[0];
        modalTable[1] = mainTable[0];
        }
        return modalTable; 
    }

    function copyModal(opt, modalID){

        var modalTables = getTempAndMainTable(modalID);
        var tempTable = modalTables[0];
        var mainTable = modalTables[1];

        if (opt === 1){
            //tempTable to mainTable
            $("#"+mainTable.id).html(function() {
                return $("#"+tempTable.id).html();
            });
        }else{
            //mainTable to tempTable
            $("#"+tempTable.id).html(function() {
                return $("#"+mainTable.id).html();
            });
        }
    }

    function openModal(e, sender) {
        
        var mainTable = getTempAndMainTable(sender)[1];
        
        activeModalLink = [];
        activeModalLink.push(e);
        
         if (e.disabled === false){
        
            d.getElementById('formPaper').style.display = "none";
            $('#' + sender).show();

            //this will trigger to copy mainTable to tempTable
            copyModal(2,sender);
        }
    }

    function closeModal(sender, optionalMode) {
        optionalMode = (typeof (optionalMode) === "undefined") ? '' : optionalMode;

        if (isValidToClose || optionalMode == 'CloseWithoutSaving') {
            copyModal(2, sender);

            $('#' + sender).hide('fade');
            d.getElementById('formPaper').style.display = "block";

            var tableID = "tbl" + sender;
            
            clearTable(d.getElementById(tableID));
        }
    }

    var activeParentInput = [];
    function transferToModal(modalLayout,IDs){
            
        var inputID = IDs.split(',');
        
        //reset activeParentInput evert transferToModal()
        activeParentInput = [];
        activeParentInput = inputID;
        
        var doTransfer =true;
        var allowChangeOnFirstRow =false;
        var isFirstTextboxDescription = true;

        var layoutCell = [];
        layoutCell = eval(modalLayout+"('"+parameters+"');");
                
        //check for maxlength,
        if ( (d.getElementById(inputID[0]).maxLength * 1 )  === 25){
        
            for(var i = 0 ; i < inputID.length ; i ++){
            
                if (  (d.getElementById(inputID[i]).value * 1) <= 0  ){
                    
                    doTransfer = false;
                    
                }
            }
            isFirstTextboxDescription = false;
            
        }else{
            
            //do transfer to modal if there is a description
            doTransfer = (d.getElementById(inputID[0]).value.toString().trim() !== "") ? true : false

        }
        
        //check for table rows length
        //if table only has 1 row, 
        //parent input which is still enabled will overwrite current 1st row
        var table = d.getElementById(layoutCell[0].toString());
        if (table.rows.length === 1){
            allowChangeOnFirstRow = true;
        }
        
        if (  doTransfer  &&  (activeModalLink[0].disabled===false) ){

            var parameters = "";
            var isDisabled = false;
                
            //check if parent textbox[0](description) is disabled
            isDisabled = d.getElementById(inputID[0]).disabled;
            
            //add row only ONCE,
            if (isDisabled === false){
            
                //get parameters
                for (var i=0; i < inputID.length; i++) {

                    var inputValue = "";

                    //if (d.getElementById(inputID[i]).maxLength * 1 === 25) {
                    //    inputValue = removeCommaParenthesis(d.getElementById(inputID[i]).id);
                    //}else{
                        inputValue = d.getElementById(inputID[i]).value.toString().trim();
                    //}
                    
                    parameters+=inputValue+",";
                };
                
                //if parent input is still enabled and not yet "OTHERS"
                //overwrite the 1st row by deleteing the previous 1st row
                if (allowChangeOnFirstRow){
                    
                    var button = null;
                    var inputs = table.getElementsByTagName("input");
                    
                    for (var i=0; i < inputs.length; i++) {
                        
                        if (inputs[i].type === "button"){
                            button = inputs[i];
                        }
                    }
                    
                    if (button != null){
                    
                        deleteRow(button);
                    }else{
                    
                        //alert("DEV NOTE : see transferToModal(); problem with overwriting 1st row.");
                    }
                }
                
                //add row with parameters
                addRow(modalLayout+"('"+parameters+"')");
                
                //revised 03/21/14
                //save transferred row to mainTable
                var modalID = d.getElementById(layoutCell[0].toString()).parentNode.parentNode.id;
                
                //this will trigger to copy tempTable to mainTable
                copyModal(1,modalID);
                
                activeParentInput = inputID;
                
            }else {
            
            var layoutCell = [];
            layoutCell = eval(modalLayout + "('" + parameters + "');");
            var tableTemp = d.getElementById(layoutCell[0].toString());

            addFocusBlurEvent(tableTemp.id);

           
        }

        }
    }

    //Iteration Page 2 Part IV.A
    function partIVAModalLayout() {
        //set values
        var values = [];
        //check if there are values set,, used when transferToModal() is called
        if (arguments.length > 0) {
            values = arguments[0].toString().split(",");
        }
        //else, set manually,, used when clicking addRow() 
        else {
            values[0] = '';
            values[1] = '0.00';
            values[2] = '0.00';
        }
        
        var tableID = "tblmodalPartIVA";
        var i = d.getElementById(tableID).rows.length;
        var cell = [];
        //cell[0], always set to table ID
        cell[0] = tableID;
        cell[1] = '<tr valign="top" class="modalColumnHeader"><td width="3%"><span class="smallBold">42.' + (i + 1) + '</span></td>';
        cell[2] = '<td align="center" width="37%"><input type="text" size="40" value="' + values[0] + '" name="frm1701A:txtmodalPartIVADesc[]" maxlength="30" id="frm1701A:txtmodalPartIVADesc_' + (i + 1) + 'C1" onblur ="capitalize(this);getAttributeValue(this.id,this.value);" /></td>';  // onkeypress="return Name(this, event)"/></td>';
        cell[3] = '<td align="center" width="25%"><input type="text" style="text-align: right;" value="' + values[1] + '" size="20" name="frm1701A:txtmodalPartIVATaxFiler[]" maxlength="12" id="frm1701A:txtmodalPartIVA_' + (i + 1) + 'C2" onkeypress="return wholenumber(this, event);" onblur="round(this,2);computePartIVAModal(true);getAttributeValue(this.id,this.value);"/></td>';
        cell[4] = '<td align="center" width="25%"><input type="text" style="text-align: right;" value="' + values[2] + '" size="20" name="frm1701A:txtmodalPartIVASpouse[]" maxlength="12" id="frm1701A:txtmodalPartIVA_' + (i + 1) + 'C3" onkeypress="return wholenumber(this, event);" onblur="round(this,2);computePartIVAModal(true);getAttributeValue(this.id,this.value);"/></td>';
        cell[5] = '<td align="center" width="10%"><input type="button" value="Remove" onclick="deleteRow(this);computePartIVAModal(true);" id="frm1701A:btnModalPartIVARemove' + (i + 1) + '"/></td>';
        cell[6] = '</tr>';
     
        return cell;
    }

    //Iteration Page 2 Part IV.B
    function partIVBModalLayout() {
        //set values
        var values = [];
        //check if there are values set,, used when transferToModal() is called
        if (arguments.length > 0) {
            values = arguments[0].toString().split(",");
        }
        //else, set manually,, used when clicking addRow() 
        else {
            values[0] = '';
            values[1] = '0.00';
            values[2] = '0.00';
        }
        
        var tableID = "tblmodalPartIVB";
        var i = d.getElementById(tableID).rows.length;
        var cell = [];
        //cell[0], always set to table ID
        cell[0] = tableID;
        cell[1] = '<tr valign="top" class="modalColumnHeader"><td width="3%"><span class="smallBold">42.' + (i + 1) + '</span></td>';
        cell[2] = '<td align="center" width="37%"><input type="text" size="40" value="' + values[0] + '" name="frm1701A:txtmodalPartIVBDesc[]" maxlength="30" id="frm1701A:txtmodalPartIVBDesc_' + (i + 1) + 'C1" onblur ="capitalize(this);getAttributeValue(this.id,this.value);" /></td>';  // onkeypress="return Name(this, event)"/></td>';
        cell[3] = '<td align="center" width="25%"><input type="text" style="text-align: right;" value="' + values[1] + '" size="20" name="frm1701A:txtmodalPartIVBTaxFiler[]" maxlength="12" id="frm1701A:txtmodalPartIVB_' + (i + 1) + 'C2" onkeypress="return wholenumber(this, event);" onblur="round(this,2);computePartIVBModal(true);getAttributeValue(this.id,this.value);"/></td>';
        cell[4] = '<td align="center" width="25%"><input type="text" style="text-align: right;" value="' + values[2] + '" size="20" name="frm1701A:txtmodalPartIVBSpouse[]" maxlength="12" id="frm1701A:txtmodalPartIVB_' + (i + 1) + 'C3" onkeypress="return wholenumber(this, event);" onblur="round(this,2);computePartIVBModal(true);getAttributeValue(this.id,this.value);"/></td>';
        cell[5] = '<td align="center" width="10%"><input type="button" value="Remove" onclick="deleteRow(this);computePartIVBModal(true);" id="frm1701A:btnModalPartIVBRemove' + (i + 1) + '"/></td>';
        cell[6] = '</tr>';
     
        return cell;
    }

    function getAttributeValue(item,value){
        list = document.getElementById(item);
        d.getElementById(item).setAttribute('value',value);
    }

    function validateModal(modalTable, baseNumber) {

        var count = 0;
        var isValid = true;

        if (modalTable.indexOf("PartIVA") > -1)
            var isTaxpayerDisabled = (!d.getElementById('frm1701A:optTaxRate_1').checked) ? true : false;   //d.getElementById('frm1701A:txtIsTaxFilerDisabled').value;
        else if (modalTable.indexOf("PartIVB") > -1)
            var isTaxpayerDisabled = (!d.getElementById('frm1701A:optTaxRate_2').checked) ? true : false;

        var table = d.getElementById(modalTable);
        var numRows = table.rows.length;

        for (x = 0; x < numRows && !isReload; x++) {
            var str = table.rows[x].cells[1].children[0];
            var str2 = table.rows[x].cells[2].children[0];
            var numColumn = (table.rows[x].getElementsByTagName('input')).length - 1;

            count++;

            var rowItem = baseNumber + "." + count;

            if (str.maxLength !== 25 && str.value.toString().trim() === "") {
                alert("Please enter a valid Description");
                //alert("Please enter a valid Description on Page " + pageNumber + " Schedule " + scheduleNumber.trim() + " Item " + rowItem);
                isValid = false;
            }
           
            else if ((numColumn == 2 && str2.maxLength === 25 && str2.value <= 0)
                || (numColumn <= 3 && str2.maxLength === 25 && str2.value <= 0 &&  (table.rows[x].cells[3].children[0].value <= 0) && isTaxpayerDisabled == 'false')
                || (numColumn >= 4 && table.rows[x].cells[3].children[0].maxLength === 25 && table.rows[x].cells[3].children[0].value <= 0 &&  (table.rows[x].cells[4].children[0].value <= 0) && isTaxpayerDisabled == 'false')
                || (numColumn >= 4 && table.rows[x].cells[4].children[0].maxLength === 25 && (table.rows[x].cells[4].children[0].value <= 0)&& (table.rows[x].cells[3].children[0].value <= 0) && isTaxpayerDisabled == 'true') 
                || (numColumn == 3 && table.rows[x].cells[3].children[0].maxLength === 25 && (table.rows[x].cells[3].children[0].value <= 0)&& (table.rows[x].cells[2].children[0].value <= 0) && isTaxpayerDisabled == 'true')) {
                alert("Amount should not be zero.");
                //alert("Page " + pageNumber + " Schedule " + scheduleNumber.trim() + " Item " + rowItem + " Amount should not be zero.");
                isValid = false;
            }

            if (!isValid) {
                break;
            }
        }

        return isValid;
    }

    function saveChanges(modalID, bool){
    
        var tables = [];
        tables =  getTempAndMainTable(modalID);

        var tempTable = d.getElementById(tables[0].id);
        var mainTable = d.getElementById(tables[1].id);

        if ((bool == -1) || (bool === true)) {
            
            var isValid = true;
            
            //this will validate table by row
            var rows = tempTable.getElementsByTagName('tr');
            
            if (rows.length  > 0){
            
                var lastRowSpan = (rows[rows.length-1]).getElementsByTagName('span')[0];
                
                var baseNumber = lastRowSpan.innerHTML.split('.')[0];
                
                if (baseNumber.toString().trim() !== ""){
                
                    isValid = validateModal(tempTable.id, baseNumber);
                }else{
                
                    //alert("[error] invalid baseNumber, span is :" + lastRowSpan.innerHTML);
                }
                
            }
            if (isValid) {
            
                if (bool === true) { alert("Saved!"); }
                
                //set mainTable same as tempTable's content.
                $("#" + mainTable.id).html(function () {
                    return $("#" + tempTable.id).html();
                });
                //call this to reset textboxes id
                resetMainTableID(mainTable);
                
                var trMainTable = mainTable.getElementsByTagName('tr');
                var counterContainer = d.getElementById("frm1701A:txtCtr" + modalID)
                
                //setCounter
                //set if more than 2 rows
                if (mainTable.rows.length > 1){
                
                    if (counterContainer == null) {
                        
                        if (TYPE != null || TYPE.toString().trim() != ""){
                            //make sure 'TYPE; is always updated
                            updateAttachemntModalCounter("frm1701A:txtCtr" + modalID.substring(0, modalID.indexOf(TYPE)), trMainTable.length);
                        }else{
                            //alert("Dev Note : see TYPE");
                        }
                        
                    } else {

                        counterContainer.value = trMainTable.length;
                    }
                //set counter to zero
                }else{
                
                    if (counterContainer != null) {
                    
                        counterContainer.value = 0;
                    }else{
                        //make sure 'TYPE; is always updated
                        updateAttachemntModalCounter("frm1701A:txtCtr" + modalID.substring(0, modalID.indexOf(TYPE)), 0);
                    }
                }

                //activeParentInput[0] is NULL during RELOADING so add condition
                //set parent textboxes disabled
                //do only once
                //disable parent input if table contains 2 rows
                if (d.getElementById(activeParentInput[0]) != null){
                
                    if (mainTable.rows.length >= 2  && (!d.getElementById(activeParentInput[0]).disabled )){    
                        disableParentInput(activeParentInput);
                    }
                }
                
                isValidToClose = true;
                
            }else {
            
                isValidToClose = false;
            }
            
        }else if (bool === false) {

            alert("Disregard changes.");

            $("#" + tempTable.id).html(function () {
                return $("#" + mainTable.id).html();
            });

            //recompute
            //recomputeComputation(tempTable)
        }
        
        //if table only has 1 or 0 rows, enable parent input
        if (mainTable.rows.length <= 1) {
        
            //transfer description from modal to parent input
            var rowInputs = mainTable.getElementsByTagName("input");
            
            for (var i = 0 ;  i < rowInputs.length ; i ++ ){
                
                if (rowInputs[i].type === "text" && rowInputs[i].maxLength != 25){
                
                    d.getElementById(activeParentInput[i]).value = rowInputs[i].value;
                }
            }
            
            //if zero rows, set parent description to empty
            //disable add more link since parent input is empty
            if (mainTable.rows.length == 0){
            
                for (var i = 0 ;  i < activeParentInput.length ; i ++ ){
                    
                    if (d.getElementById(activeParentInput[i]).type === "text" && d.getElementById(activeParentInput[i]).maxLength != 25){
                    
                        d.getElementById(activeParentInput[i]).value = "";
                    }
                    if (d.getElementById(activeParentInput[i]).maxLength == 25) {
                        d.getElementById(activeParentInput[i]).value = (0).toFixed(2);
                    }
                }
                
                //disable modalLink
                //call disableLinkIfEmpty which needs an object with value attribute
                var emptyObject = document.createAttribute('nothingness');
                emptyObject.value = '';
                disableLinkIfEmpty(emptyObject,activeModalLink[0].id );
                
            //if only 1 row is remaining
            //update enabledinputIDs[] (if not updated, bug shows during reloading)
            }else{
            
                for (var i = 0 ;  i < activeParentInput.length ; i ++ ){
                    update_enabledInputsOnValidation(activeParentInput[i],"ADD");
                }
            }
            enableParentInput(activeModalLink[0].id.toString());
        }

    }

    //reset textbox IDs, 
    function resetMainTableID(mainTable) {

        var tr = mainTable.getElementsByTagName('tr');

        for (var i = 0; i < (tr.length); i++) {

        textbox = tr[i].getElementsByTagName('input');

            for (var x = 0; x < (textbox.length); x++) {

                id = textbox[x].id.split(":");
                //validate if input is textbox
                //if ( ($("#"+id[0]+"\\:"+id[1]).attr("type")) === "text" ){
                if (textbox[x].type === "text") {

                    //mainID is frm1701A:txtmodalPartIVA
                    var mainID = textbox[x].id.substring(0, (textbox[x].id.indexOf("_") + 1));
                    //iterationID is 1C1 or 1C1EX1 for attachments
                    var iterationID = textbox[x].id.substring((textbox[x].id.indexOf("_") + 1), (textbox[x].id.length));
                    
                    var attachmentTypeIndexEX = iterationID.indexOf("EX");
                    var attachmentTypeIndexSP = iterationID.indexOf("SP");
                    var addForAttachment = "";

                    if ((attachmentTypeIndexEX >= 0) || (attachmentTypeIndexSP >= 0)) {

                        var typeIndex = (attachmentTypeIndexEX >= 0) ? attachmentTypeIndexEX : attachmentTypeIndexSP;
                        //get EX1 from 1C1EX1
                        addForAttachment = iterationID.substring((typeIndex), iterationID.length);
                    }

                    iterationID = (i + 1) + "C" + (x + 1);

                    textbox[x].id = mainID + iterationID + addForAttachment;
                }
            };
        }
    }

    //triggered on deleteRow(), when all row is removed
    //works ONLY when ID of removeRow button & inputsToEnable have the same format (ex:"Pg2mScEI"); first 11 char is removed
    function enableParentInput(btn){
        
        var linkDescription = getDescription(btn, "More");
        //get : 'PartIVA'
        var linkMainID = linkDescription[0];
        //get : 'EX1'
        var linkAttachementType = linkDescription[1];

        if (linkMainID.indexOf("PartIVA") > -1) {
            var isTaxfilerDisabled = (!d.getElementById('frm1701A:optTaxRate_1').checked) ? true : false;
            var isSpouseDisabled = (!d.getElementById('frm1701A:optSpouseTaxRate_1').checked) ? true : false;
        } else if (linkMainID.indexOf("PartIVB") > -1) {
            var isTaxfilerDisabled = (!d.getElementById('frm1701A:optTaxRate_2').checked) ? true : false;
            var isSpouseDisabled = (!d.getElementById('frm1701A:optSpouseTaxRate_2').checked) ? true : false;
        }
        

        var enabledIndex = -1;
        
        for (var i=0; i < disabledinputIDs.length; i++) {

            //get all disabledInputs when transferToModal() was triggered
            var disabledInputs = [];
            disabledInputs = disabledinputIDs[i];

            for (var x=0; x < disabledInputs.length; x++) {
                
                var ctrl = d.getElementById(disabledInputs[x]);

                //spouse
                if (ctrl.id.indexOf('B') !== -1) {

                    if (!isSpouseDisabled) {
                        ctrl.disabled = false;
                    }
                //taxpayer
                } else if (ctrl.id.indexOf('A') !== -1 && ctrl.id.length == 15) {
                    if (!isTaxfilerDisabled) {
                        ctrl.disabled = false;
                    }
                //desc
                } else {
                    ctrl.disabled = false;
                }

                if (!ctrl.disabled){
                            
                    ctrl.style.backgroundColor = "#ffffff";
                }

                enabledIndex = i;

            }
        };
        
        disabledinputIDs.splice(enabledIndex,1);
        storeDisabledinputIDs();
    }

    function disableParentInput(activeInput){

        for (var i=0; i < activeInput.length; i++) {
            
            //disable
            d.getElementById(activeInput[i]).disabled = true;
            d.getElementById(activeInput[i]).style.backgroundColor = "#ededed";
            
            if (d.getElementById(activeInput[i]).maxLength != 25){
                
                d.getElementById(activeInput[i]).value = "OTHERS";
            }
            
            //remove enabled rows, for reloading
            if (d.getElementById(activeInput[i]).disabled){
                update_enabledInputsOnValidation(activeInput[i],"REMOVE");
            }
        }

        //add more link
        d.getElementById(activeModalLink[0].id).disabled = false;

        //if parent inputs is disabled
        //happens when it description turns into "OTHERS"
        disabledinputIDs.push(activeInput);
        storeDisabledinputIDs();
    }

    //store enabled inputs here
    var enabledinputIDs = [];

    //save all enabled inputs during row validations
    //during reloading, sched textboxes are disabled by default,
    //enable them by using the IDs saved in 'frm1701:txtEnabledInputsOnValidation'
    function update_enabledInputsOnValidation(id,action){

        if (action === "ADD"){
            var doAdd = true ;
            
            for(var i = 0 ; i < enabledinputIDs.length ; i ++){
                
                if (enabledinputIDs[i] == id){
                    doAdd = false;
                    break;
                }
            }
            
            if (doAdd){
                enabledinputIDs.push(id);
            }
        }else{

            var deleteIndex = -1;
            
            for(var i = 0 ; i < enabledinputIDs.length ; i ++){
            
                if (enabledinputIDs[i] == id){
                    deleteIndex = i;
                    break;
                }
            }
            
            enabledinputIDs.splice(deleteIndex, 1);
        }

        //store it to textbox 
        //will be used for relaoding
        var str = "";
        for(var i = 0 ; i < enabledinputIDs.length ; i ++){
            
            //do not include radio button in page 5 (on frm1701:txtEnabledInputsOnValidation)
            //conflict during reloading
            if (enabledinputIDs[i].indexOf('rdoPg5Sc1') == -1){
                str += enabledinputIDs[i] + ",";
            }
        }

        d.getElementById('frm1701A:txtEnabledInputsOnValidation').value = str;
    }

    //will return array of string
    //ex. btnID is 'frm1701:lnkPg10Sc11AI3MoreEX3'
    //description[0] is 'lnkPg10Sc11AI3'
    //description[1] is 'EX3' ,, emptyString if there is no 'EX' or 'SP' in the btnID
    function getDescription(btnID, find){

        var description = [];

        //ex. btnID = 'frm1701:lnkPg10Sc11AI3MoreEX3'
        btnID = btnID.toString().split(':')[1];

        //mainIDDescription is 'Pg10Sc11AI3'
        var mainIDDescription= btnID.substring(3,btnID.indexOf(find));
        var attachmentTYPE = "";

        if (  (btnID.indexOf("EX") >= 0)||btnID.indexOf("SP") >= 0  ){

            var typeIndex = (btnID.indexOf("EX") >= 0) ? btnID.indexOf("EX") : btnID.indexOf("SP");
            attachmentTYPE = btnID.substring(typeIndex,btnID.length);
        }

        description[0] = mainIDDescription;
        description[1] = attachmentTYPE;

        return description;
    }

    //ex. format 
    //onclick="addRow('sampleModalLayout()');"
    function addRow(modalLayout) { 
        //call the function needed
        var layoutCell = [];
        layoutCell = eval(modalLayout+";");
        
        //layoutCell[0] is always tempTableID
        //add new rows to tempTable
        var tableTemp = d.getElementById(layoutCell[0].toString());

        //***************************************************//
        var span = tableTemp.getElementsByTagName('span');
        
        var validSpan = [];
        var count = 0;
        //validate if span is format(number.number);
        for (var i = 0; i < (span.length); i++) {

            var iterationNumber = span[i].innerHTML.split('.');
            if (iterationNumber.length == 2) {

                if ((!isNaN(iterationNumber[0])) && (!isNaN(iterationNumber[1]))) {
                    validSpan[count] = span[i];
                    count++;
                }
            }
        };

        var baseNumber = 0;

        if (validSpan.length > 0) {
            baseNumber = validSpan[0].innerHTML.split('.')[0];
        }
        
        //*************************************************//

        var isValid = validateModal(tableTemp.id, baseNumber);
        //if Description/NatureOfIncome/YearIncurred is valid, insert row to tempTable
        if (isValid || isReload) {
            
            var row = tableTemp.insertRow(tableTemp.rows.length);

            var cell = [];

            for (var i = 0; i < (layoutCell.length - 1); i++) {
                cell[i] = row.insertCell(i);
                //start with index 1, index 0 is tableID
                cell[i].innerHTML = layoutCell[i + 1];
                
            //changeSpouseTaxFilerState(cell[i]);
            };
            
            addFocusBlurEvent(tableTemp.id);
        }
    }

    //ex. format
    //onclick="deleteRow(this)"
    //delete selected row, reset iterationNumber, enables parent input when all row is removed.
    function deleteRow(rowElement){

        var row = rowElement.parentNode.parentNode;
        var table = rowElement.parentNode.parentNode.parentNode.parentNode;
        var span = table.getElementsByTagName('span');

        row.parentNode.removeChild(row);

        //store valid span here,, is span is format(number.number);
        var validSpan = [];
        var count = 0;

        //validate if span is format(number.number);
        for (var i=0; i < (span.length); i++) {

            var iterationNumber = span[i].innerHTML.split('.');
            
            if (iterationNumber.length == 2){
            
                if ( (!isNaN(iterationNumber[0])) && (!isNaN(iterationNumber[1])) ){
                    validSpan[count] = span[i];
                    count++;
                }
            }
        };  
        //reset span's innerHTML
        if (validSpan.length  > 0){
        
            //get Base Number (ex. 2 for 2.1. 2.2)
            var baseNumber = validSpan[0].innerHTML.split('.')[0];
            //set iteration number (ex. baseNumber.1, baseNumber.2)
            for (var i=0; i < (validSpan.length); i++) {
                validSpan[i].innerHTML = baseNumber + "."+(i+1);
            };
        }

    }

    function addFocusBlurEvent(tableID) {

        var modalID = $("#" + tableID).parent().parent().attr("id"); //$("#" + tableID).parent().parent().parent().attr("id");

        $('#' + tableID + '').blur(function () {

            var currentId = $(this).attr('id');
            var currentValue = NumWithComma(d.getElementById(currentId).value);

            d.getElementById(currentId).value = (currentValue >= 0) ? formatCurrency(currentValue * 1) : 0;


        });

        $('#' + tableID + '').blur(function () {

            var currentId = $(this).attr('id');
            var currentValue = d.getElementById(currentId).value;
            var str = currentValue;

            if (d.getElementById(currentId).maxLength == 3 || d.getElementById(currentId).maxLength == 7) {

                if (str.match(/[a-zA-Z .,#@'()_-]/g) != null) {
                    str = "";
                }

            } else {

                str = (str.replace(/[^a-zA-Z 0-9.,#@'()_-]/g, ""));
            }

            d.getElementById(currentId).value = str;

        });
    }

    function clearTable(table){

        $("#"+table.id).html(function() {
            return "<TBODY></TBODY>";
        });
    }

    //update this when deleting attachments
    function validateModalState(isOnLoad){  
    
    var disabledInputsContainer = d.getElementById("frm1701A:txtDisabledInputs");
    var setOfDisabledIDS = disabledInputsContainer.value.toString().split("+");

    if (setOfDisabledIDS.length !== 0){
        
        for (var i=0; i < setOfDisabledIDS.length; i++) {
            
            if (setOfDisabledIDS[i].toString().trim() !== ""){

                var inputs = [];
                inputs = setOfDisabledIDS[i].toString().split(",");
            
                for (var n=0; n< inputs.length; n++) {
                    
                    if (inputs[n].toString().trim() !== ""){

                        if(d.getElementById(inputs[n]) != null)  {d.getElementById(inputs[n]).disabled = true; }
                    }
                }
                
                if (isOnLoad){
                
                    disabledinputIDs.push(inputs);
                }
            }
        }
    }

        var enabledLinksContainer = d.getElementById("frm1701A:txtEnabledLinks");
        var setOfEnabledIDS = enabledLinksContainer.value.toString().split(",");
    
        if (setOfEnabledIDS.length !== 0){
        
            for (var i=0; i < setOfEnabledIDS.length; i++) {
            
                if (setOfEnabledIDS[i].toString().trim() !== ""){

                    if (d.getElementById(setOfEnabledIDS[i]) != null) { 
                        d.getElementById(setOfEnabledIDS[i]).disabled = false; 
                        
                        if (isOnLoad){
                            enabledlinkIDs.push(setOfEnabledIDS[i]);
                        }
                    }
                }
            }
        }
    }

    /*-----Enable/Disable-----*/

    function clearTable(table){

        $("#"+table.id).html(function() {
            return "<TBODY></TBODY>";
        });
    }

    function disableEnableFieldsOnReload(){
    
        //get all inputs saved frm1701:txtDisabledOnSave
        var container = d.getElementById('frm1701A:txtDisabledOnSave')
        var inputs = container.value.toString().split(',');
        
        for (var i = 0 ; i<inputs.length; i++){
            
            //disable field
            var field = d.getElementById(inputs[i]);
            if (field != null){
                field.disabled = true;
            }
        }
        
        //get all inputs saved frm1701:txtEnabledOnSave
        var container = d.getElementById('frm1701A:txtEnabledOnSave')
        var inputs = container.value.toString().split(',');
        
        for (var i = 0 ; i<inputs.length; i++){
            
            //disable field
            var field = d.getElementById(inputs[i]);
            if (field != null){
                field.disabled = false;
            }
        }
    }

    //save all disabledInputs here when transferToModal() is triggered
    var disabledinputIDs = [];
        //save all disabledInputs here when disableLinkIfEmpty() is triggered
    var enabledlinkIDs = [];

    function enabledlinkIDs_Add(isAdd, linkID){
        

        //add
        if (isAdd){
        
            var doAdd = true;
            
            for (var i=0; i < enabledlinkIDs.length; i++) {
                
                if (enabledlinkIDs[i] == linkID.toString()){
                    doAdd = false;
                    break;
                }
            }
            if (doAdd){
                enabledlinkIDs.push(linkID.toString());
            }
            
        //remove
        }else{
            for (var i=0; i < enabledlinkIDs.length; i++) {
                
                if (enabledlinkIDs[i] == linkID.toString()){
                    enabledlinkIDs.splice(i, 1);
                }
            }
        }
        //update frm1701A:txtEnabledLinks
        storeEnabledlinkIDs();
    }

    function enableSpouse() {
        d.getElementById("frm1701A:txt23B").disabled = false;
        d.getElementById("frm1701A:txt25B").disabled = false;
        d.getElementById("frm1701A:txt26B").disabled = false;
        d.getElementById("frm1701A:txt27B").disabled = false;

        d.getElementById("frm1701A:txt57B").disabled = false;
        d.getElementById("frm1701A:txt58B").disabled = false;
        d.getElementById("frm1701A:txt59B").disabled = false;
        d.getElementById("frm1701A:txt60B").disabled = false;
        d.getElementById("frm1701A:txt63B").disabled = false;

        //Part V
        d.getElementById("frm1701A:txtSpouseTIN1").disabled = false;
        d.getElementById("frm1701A:txtSpouseTIN2").disabled = false;
        d.getElementById("frm1701A:txtSpouseTIN3").disabled = false;
        d.getElementById("frm1701A:txtSpouseBranchCode").disabled = false;
        d.getElementById("frm1701A:txtSpouseRDOCode").disabled = false;
        d.getElementById("frm1701A:optSpouseTaxType_1").disabled = false;
        d.getElementById("frm1701A:optSpouseTaxType_2").disabled = false;
        d.getElementById("frm1701A:optSpouseATC_1").disabled = false;
        d.getElementById("frm1701A:optSpouseATC_2").disabled = false;
        d.getElementById("frm1701A:optSpouseATC_3").disabled = false;
        d.getElementById("frm1701A:optSpouseATC_4").disabled = false;
        d.getElementById("frm1701A:txtSpouseName").disabled = false;
        d.getElementById("frm1701A:txtSpouseTelNum").disabled = false;
        d.getElementById("frm1701A:txtSpouseCitizenship").disabled = false;
        d.getElementById("frm1701A:optSpouseFTC_1").disabled = false;
        d.getElementById("frm1701A:optSpouseFTC_2").disabled = false;
        d.getElementById("frm1701A:txtSpouseFTN").disabled = false;
        d.getElementById("frm1701A:optSpouseTaxRate_1").disabled = false;
        d.getElementById("frm1701A:optSpouseTaxRate_2").disabled = false;
    }

    function disableSpouse() {
        d.getElementById("frm1701A:txt23B").disabled = true;
        d.getElementById("frm1701A:txt25B").disabled = true;
        d.getElementById("frm1701A:txt26B").disabled = true;
        d.getElementById("frm1701A:txt27B").disabled = true;

        d.getElementById("frm1701A:txt23B").value = (0).toFixed(2);
        d.getElementById("frm1701A:txt25B").value = (0).toFixed(2);
        d.getElementById("frm1701A:txt26B").value = (0).toFixed(2);
        d.getElementById("frm1701A:txt27B").value = (0).toFixed(2);

        d.getElementById("frm1701A:txt57B").disabled = true;
        d.getElementById("frm1701A:txt58B").disabled = true;
        d.getElementById("frm1701A:txt59B").disabled = true;
        d.getElementById("frm1701A:txt60B").disabled = true;
        d.getElementById("frm1701A:txt63B").disabled = true;

        d.getElementById("frm1701A:txt57B").value = (0).toFixed(2);
        d.getElementById("frm1701A:txt58B").value = (0).toFixed(2);
        d.getElementById("frm1701A:txt59B").value = (0).toFixed(2);
        d.getElementById("frm1701A:txt60B").value = (0).toFixed(2);
        d.getElementById("frm1701A:txt63B").value = (0).toFixed(2);

        //Part V
        d.getElementById("frm1701A:txtSpouseTIN1").disabled = true;
        d.getElementById("frm1701A:txtSpouseTIN2").disabled = true;
        d.getElementById("frm1701A:txtSpouseTIN3").disabled = true;
        d.getElementById("frm1701A:txtSpouseBranchCode").disabled = true;
        d.getElementById("frm1701A:txtSpouseRDOCode").disabled = true;
        d.getElementById("frm1701A:optSpouseTaxType_1").disabled = true;
        d.getElementById("frm1701A:optSpouseTaxType_2").disabled = true;
        d.getElementById("frm1701A:optSpouseATC_1").disabled = true;
        d.getElementById("frm1701A:optSpouseATC_2").disabled = true;
        d.getElementById("frm1701A:optSpouseATC_3").disabled = true;
        d.getElementById("frm1701A:optSpouseATC_4").disabled = true;
        d.getElementById("frm1701A:txtSpouseName").disabled = true;
        d.getElementById("frm1701A:txtSpouseTelNum").disabled = true;
        d.getElementById("frm1701A:txtSpouseCitizenship").disabled = true;
        d.getElementById("frm1701A:optSpouseFTC_1").disabled = true;
        d.getElementById("frm1701A:optSpouseFTC_2").disabled = true;
        d.getElementById("frm1701A:txtSpouseFTN").disabled = true;
        d.getElementById("frm1701A:optSpouseTaxRate_1").disabled = true;
        d.getElementById("frm1701A:optSpouseTaxRate_2").disabled = true;

        d.getElementById("frm1701A:txtSpouseTIN1").value = "";
        d.getElementById("frm1701A:txtSpouseTIN2").value = "";
        d.getElementById("frm1701A:txtSpouseTIN3").value = "";
        d.getElementById("frm1701A:txtSpouseBranchCode").value = "";
        d.getElementById("frm1701A:txtSpouseRDOCode").value = "000";
        d.getElementById("frm1701A:optSpouseTaxType_1").checked = false;
        d.getElementById("frm1701A:optSpouseTaxType_2").checked = false;
        d.getElementById("frm1701A:optSpouseATC_1").checked = false;
        d.getElementById("frm1701A:optSpouseATC_2").checked = false;
        d.getElementById("frm1701A:optSpouseATC_3").checked = false;
        d.getElementById("frm1701A:optSpouseATC_4").checked = false;
        d.getElementById("frm1701A:txtSpouseName").value = "";
        d.getElementById("frm1701A:txtSpouseTelNum").value = "";
        d.getElementById("frm1701A:txtSpouseCitizenship").value = "";
        d.getElementById("frm1701A:optSpouseFTC_1").checked = false;
        d.getElementById("frm1701A:optSpouseFTC_2").checked = false;
        d.getElementById("frm1701A:txtSpouseFTN").value = "";
        d.getElementById("frm1701A:optSpouseTaxRate_1").checked = false;
        d.getElementById("frm1701A:optSpouseTaxRate_2").checked = false;
    }
    
    function enablePartIVA(person) {

        d.getElementById("frm1701A:txt41Desc").disabled = false;

        if (person == "taxpayer") {
            d.getElementById("frm1701A:txt36A").disabled = false;
            d.getElementById("frm1701A:txt37A").disabled = false;
            d.getElementById("frm1701A:txt41A").disabled = false;

            if (d.getElementById("frm1701A:txt42Desc").value != "OTHERS") {
                d.getElementById("frm1701A:txt42Desc").disabled = false;
                d.getElementById("frm1701A:txt42A").disabled = false;
            } 

            d.getElementById("frm1701A:txt43A").disabled = false;
        } else if (person == "taxspouse") {
            d.getElementById("frm1701A:txt36B").disabled = false;
            d.getElementById("frm1701A:txt37B").disabled = false;
            d.getElementById("frm1701A:txt41B").disabled = false;

            if (d.getElementById("frm1701A:txt42Desc").value != "OTHERS") {
                d.getElementById("frm1701A:txt42Desc").disabled = false;
                d.getElementById("frm1701A:txt42B").disabled = false;
            } 

            d.getElementById("frm1701A:txt43B").disabled = false;
        }
        disablePartIVB(person);
    }

    function disablePartIVA(person) {
        var tables = [];
        tables =  getTempAndMainTable('modalPartIVA');

        var tempTable = d.getElementById(tables[0].id);
        var mainTable = d.getElementById(tables[1].id);

        if (person == "taxpayer") {
            for (var i=36; i<47; i++) {
                d.getElementById("frm1701A:txt" + i + "A").disabled = true;
                d.getElementById("frm1701A:txt" + i + "A").value = (0).toFixed(2);
            }

            //if spouse taxrate is not ticked
            if (!d.getElementById("frm1701A:optSpouseTaxRate_1").checked) {
                d.getElementById("frm1701A:txt41Desc").disabled = true;
                d.getElementById("frm1701A:txt42Desc").disabled = true;
                d.getElementById("frm1701A:txt41Desc").value = "";
                d.getElementById("frm1701A:txt42Desc").value = "";

                d.getElementById("frm1701A:lnkPartIVAMore").disabled = true;
            }
        } else if (person == "taxspouse") {
            for (var i=36; i<47; i++) {
                d.getElementById("frm1701A:txt" + i + "B").disabled = true;
                d.getElementById("frm1701A:txt" + i + "B").value = (0).toFixed(2);
            }

            //if taxpayer taxrate is not ticked
            if (!d.getElementById("frm1701A:optTaxRate_1").checked) {
                d.getElementById("frm1701A:txt41Desc").disabled = true;
                d.getElementById("frm1701A:txt42Desc").disabled = true;
                d.getElementById("frm1701A:txt41Desc").value = "";
                d.getElementById("frm1701A:txt42Desc").value = "";

                d.getElementById("frm1701A:lnkPartIVAMore").disabled = true;
            }
        }
        
        clearTable(mainTable);
        computeTxt38(person);
    }

    function enablePartIVB(person) {

        d.getElementById("frm1701A:txt50Desc").disabled = false;

        if (person == "taxpayer") {
            d.getElementById("frm1701A:txt47A").disabled = false;
            d.getElementById("frm1701A:txt48A").disabled = false;
            d.getElementById("frm1701A:txt50A").disabled = false;

            if (d.getElementById("frm1701A:txt51Desc").value != "OTHERS") {
                d.getElementById("frm1701A:txt51Desc").disabled = false;
                d.getElementById("frm1701A:txt51A").disabled = false;
            }

            d.getElementById("frm1701A:txt54A").disabled = false;
        } else if (person == "taxspouse") {
            d.getElementById("frm1701A:txt47B").disabled = false;
            d.getElementById("frm1701A:txt48B").disabled = false;
            d.getElementById("frm1701A:txt50B").disabled = false;

            if (d.getElementById("frm1701A:txt51Desc").value != "OTHERS") {
                d.getElementById("frm1701A:txt51Desc").disabled = false;
                d.getElementById("frm1701A:txt51B").disabled = false;
            }

            d.getElementById("frm1701A:txt54B").disabled = false;
        }

        disablePartIVA(person);
    }

    function disablePartIVB(person) {
        var tables = [];
        tables =  getTempAndMainTable('modalPartIVB');

        var tempTable = d.getElementById(tables[0].id);
        var mainTable = d.getElementById(tables[1].id);

        if (person == "taxpayer") {
            for (var i=47; i<57; i++) {
                d.getElementById("frm1701A:txt" + i + "A").disabled = true;
                d.getElementById("frm1701A:txt" + i + "A").value = (0).toFixed(2);
            }

            //if spouse taxrate is not ticked
            if (!d.getElementById("frm1701A:optSpouseTaxRate_2").checked) {
                d.getElementById("frm1701A:txt50Desc").disabled = true;
                d.getElementById("frm1701A:txt51Desc").disabled = true;
                d.getElementById("frm1701A:txt50Desc").value = "";
                d.getElementById("frm1701A:txt51Desc").value = "";

                d.getElementById("frm1701A:lnkPartIVBMore").disabled = true;
            }
        } else if (person == "taxspouse") {
            for (var i=47; i<57; i++) {
                d.getElementById("frm1701A:txt" + i + "B").disabled = true;
                d.getElementById("frm1701A:txt" + i + "B").value = (0).toFixed(2);
            }

            //if taxpayer taxrate is not ticked
            if (!d.getElementById("frm1701A:optTaxRate_2").checked) {
                d.getElementById("frm1701A:txt50Desc").disabled = true;
                d.getElementById("frm1701A:txt51Desc").disabled = true;
                d.getElementById("frm1701A:txt50Desc").value = "";
                d.getElementById("frm1701A:txt51Desc").value = "";

                d.getElementById("frm1701A:lnkPartIVBMore").disabled = true;
            }
        }

        clearTable(mainTable);
        computeTxt49(person);
    }

    /*-----End-----*/

    /*-----Save-----*/

    function doesFileExists(xmlFile) {
        var fileSysObj = new ActiveXObject("Scripting.FileSystemObject");
        if (fileSysObj.FileExists(xmlFile)) {
            return true;
        } else {
            return false;
        }
    }

    function isItAnAmendedReturn(xmlFile) {
        if (d.getElementById('frm1701A:optAmendedReturn_1').checked) {
            return true;
        } else {
            return false;
        }
    }

    function initialValidateBeforeSave() {
        if ((d.getElementById('frm1701A:txtTIN1').value == "" || d.getElementById('frm1701A:txtTIN2').value == "" || d.getElementById('frm1701A:txtTIN3').value == "" || d.getElementById('frm1701A:txtBranchCode').value == "")) {
            alert("Please enter a valid TIN number on Item 4.");
            return false;
        }
        if ((d.getElementById('frm1701A:txtRDOCode').value == "000")) {
            alert("Please enter a valid RDO Code on Item 5.");
            return false;
        }
        if ((d.getElementById('frm1701A:txtTaxpayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 8.");
            return false;
        }
        return true;
    }

    function item53Validate(person) {
        if (person == "taxpayer") {
            if (NumWithComma(d.getElementById("frm1701A:txt53A").value) > 3000000) {
                d.getElementById("frm1701A:txt53A").value = (0).toFixed(2);
                d.getElementById("frm1701A:optATC_3").checked = false;
                d.getElementById("frm1701A:optATC_4").checked = false;

                processATC(person);
                alert("Your Gross Sales/Receipts and Other Non-Operating Income exceeds VAT Threshold (P3M), thus, not qualified to 8% tax rate and shall be subjected to graduated rates. Please choose ATC and fill in Schedule IV.A if method of Deduction is OSD. Otherwise, use BIR Form 1701.");
            } else {
                computeTxt55(person);
            }
        }
        else if (person == "taxspouse") {
            if (NumWithComma(d.getElementById("frm1701A:txt53B").value) > 3000000) {
                d.getElementById("frm1701A:txt53B").value = (0).toFixed(2);
                d.getElementById("frm1701A:optSpouseATC_3").checked = false;
                d.getElementById("frm1701A:optSpouseATC_4").checked = false;

                processATC(person);
                alert("Your Gross Sales/Receipts and Other Non-Operating Income exceeds VAT Threshold (P3M), thus, not qualified to 8% tax rate and shall be subjected to graduated rates. Please choose ATC and fill in Schedule IV.A if method of Deduction is OSD. Otherwise, use BIR Form 1701.");
            } else {
                computeTxt55(person);
            }
        }
    }

    function item54Validate(person) {
        if (person == "taxpayer") {
            if (NumWithComma(d.getElementById("frm1701A:txt54A").value) > 250000) {
                alert ("Item 54A cannot be more than P250,000.");
                d.getElementById("frm1701A:txt54A").value = (0).toFixed(2);
            }
        }
        else {
            if (NumWithComma(d.getElementById("frm1701A:txt54B").value) > 250000) {
                alert ("Item 54B cannot be more than P250,000.");
                d.getElementById("frm1701A:txt54B").value = (0).toFixed(2);
            }
        }
    }

    function checkBirthDate() {
        var dt = new Date();

        var birthDate = d.getElementById("frm1701A:txtBirthDate").value;

        if (birthDate != "") {
            var resultBirthDate = birthDate.split("/");
            var isLeap = new Date(resultBirthDate[2], 1, 29).getMonth() === 1;
            var month31 = (['01', '1', '03', '3', '05', '5', '07', '7', '08', '8', '10', '12']);
            var month30 = (['04', '4', '06', '6', '09', '9', '11']);

            if (resultBirthDate.length != 3) {
                alert("Invalid birthdate.Format should be MM/DD/YYYY");
                return false;
            } else if (resultBirthDate[0] > 12 || resultBirthDate[0] < 1) {
                alert("Please enter a valid date in Item 10.");
                return false;
            } else if(resultBirthDate[1] > 31 || resultBirthDate[1] < 1) {
                alert("Please enter a valid date in Item 10.");
                return false;
            } else if(resultBirthDate[2] > dt.getFullYear()) {
                alert("Please enter a valid date in Item 10.");
                return false;
            } else if((resultBirthDate[0] == 2 || resultBirthDate[0] == 02) && (!isLeap && resultBirthDate[1] == 29)) {
                alert("Please enter a valid date in Item 10.");
                return false;
            } else if((resultBirthDate[0] == 2 || resultBirthDate[0] == 02) && (!isLeap && resultBirthDate[1] > 29)) {
                alert("Please enter a valid date in Item 10.");
                return false;
            } else if((resultBirthDate[0] == 2 || resultBirthDate[0] == 02) && (isLeap && resultBirthDate[1] > 29)) {
                alert("Please enter a valid date in Item 10.");
                return false;  
            } else if(month31.contains(resultBirthDate[0]) && resultBirthDate[1] > 31) {
                alert("Please enter a valid date in Item 10.");
                return false;
            } else if(month30.contains(resultBirthDate[0]) && resultBirthDate[1] > 30) {
                alert("Please enter a valid date in Item 10.");
                return false;
            }
        }
        return true;
    }

    function validate() {
        var dt = new Date();
        if (d.getElementById('frm1701A:txtYear').value == "") {
            alert("Please enter a valid year in Item 1."); return;
        }
        if( d.getElementById('frm1701A:txtYear').value*1 > dt.getFullYear()*1   )
        {
            alert("Invalid date entry on Item no.1. Entry cannot be greater than or equal to current year.")
            return;
        }
        if (d.getElementById('frm1701A:txtYear').value * 1 < 2018) {
            alert("Please file using the old version of the form.")
            return;
        }
       
        //--- dgarfin : Added 'Background Information' field validation for Phase 2
        if ((d.getElementById('frm1701A:txtTIN1').value == "" || d.getElementById('frm1701A:txtTIN2').value == "" || d.getElementById('frm1701A:txtTIN3').value == "" || d.getElementById('frm1701A:txtBranchCode').value == "")) {
            alert("Please enter a valid TIN number on Item 4.");
            return;
        }

        if ((d.getElementById('frm1701A:txtTIN1').value.length != 3 || d.getElementById('frm1701A:txtTIN2').value.length != 3 || d.getElementById('frm1701A:txtTIN3').value.length != 3 || d.getElementById('frm1701A:txtBranchCode').value.length < 3)) {
            alert("Please enter a valid TIN number on Item 4.");
            return;
        }
        
        if ((d.getElementById('frm1701A:txtTaxpayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 8.");
            return;
        }
        if ((d.getElementById('frm1701A:txtAddress').value == "")) {
            alert("Please enter Taxpayer's Registered Address on Item 9.");
            return;
        }
        if (d.getElementById('frm1701A:txtBirthDate').value == "") {
            alert("Please indicate Birth Date of Taxpayer on item 10.");
            return true;
        }
        if (d.getElementById('frm1701A:txtBirthDate').value != "") {
            if(!checkBirthDate()) {
                return false;
            }
        }
        if (document.getElementById('frm1701A:txtZipCode').value == "") {
            alert("Please enter Zip Code on Item 9A.");
            return;
        }

        if (document.getElementById('frm1701A:optFilingStatus_1').checked == true) {
            if ((d.getElementById('frm1701A:txtSpouseTIN1').value == "" || d.getElementById('frm1701A:txtSpouseTIN2').value == "" || d.getElementById('frm1701A:txtSpouseTIN3').value == "")) {
                alert("Please enter a valid TIN number on Item 66.");
                return;
            }
        }
        
        if (d.getElementById('frm1701A:txt30').value < 0) {
            if (d.getElementById('frm1701A:optRefund_1').checked == false && d.getElementById('frm1701A:optRefund_2').checked == false && d.getElementById('frm1701A:optRefund_3').checked == false) {
                alert("Please select an Overpayment option in Part II.");
                return;
            }
        }

        //Spouse    
        if ((d.getElementById('frm1701A:txtSpouseTIN1').value != "" || d.getElementById('frm1701A:txtSpouseTIN2').value != "" || d.getElementById('frm1701A:txtSpouseTIN3').value != "")) {
            if ((d.getElementById('frm1701A:txtSpouseTIN1').value.length != 3 || d.getElementById('frm1701A:txtSpouseTIN2').value.length != 3 || d.getElementById('frm1701A:txtSpouseTIN3').value.length != 3 || d.getElementById('frm1701A:txtSpouseBranchCode').value.length != 3)) {
                alert("Please enter a valid TIN number on Item 66.");
                return;
            }
            var tinChkCode = getTinChkCode($('#frm1701A\\:txtSpouseTIN1').val(),$('#frm1701A\\:txtSpouseTIN2').val(),$('#frm1701A\\:txtSpouseTIN3').val());
            if ( tinChkCode !== 0) {
                alert(getChkTinErrDesc(tinChkCode) + " on Item 17.");
                return;
            } 
            if ((d.getElementById('frm1701A:txtSpouseRDOCode').selectedIndex == 0)) {
                alert("Please enter a valid RDO Code on Item 18.");
                return;
            }
            if ((d.getElementById('frm1701A:txtSpouseName').value == "")) {
                alert("Please enter Spouse Name on Item 70.");
                return;
            }
            if (d.getElementById('frm1701A:optSpouseATC_1').checked == false && d.getElementById('frm1701A:optSpouseATC_2').checked == false && d.getElementById('frm1701A:optSpouseATC_3').checked == false && d.getElementById('frm1701A:optSpouseATC_4').checked == false) {
                alert("Please select an option for Item 69."); return;
            }
        }

        //--- dgarfin : Added 'Background Information' field validation for Phase 2     

        if (d.getElementById('frm1701A:optTaxType_1').checked == false && d.getElementById('frm1701A:optTaxType_2').checked == false) {
            alert("Please select an option for Item 6."); return;
        }
        if (d.getElementById('frm1701A:optATC_1').checked == false && d.getElementById('frm1701A:optATC_2').checked == false && d.getElementById('frm1701A:optATC_3').checked == false && d.getElementById('frm1701A:optATC_4').checked == false) {
            alert("Please select an option for Item 7."); return;
        }// can
        if (d.getElementById('frm1701A:optTaxRate_1').checked == false && d.getElementById('frm1701A:optTaxRate_2').checked == false) {
            alert("Please select an option for Item 19."); return;
        }
        if (d.getElementById("frm1701A:txtSpouseName").value != "") {
            if (d.getElementById('frm1701A:optSpouseTaxType_1').checked == false && d.getElementById('frm1701A:optSpouseTaxType_2').checked == false) {
                alert("Please select an option for Item 68."); return;
            }
            if (d.getElementById('frm1701A:optSpouseATC_1').checked == false && d.getElementById('frm1701A:optSpouseATC_2').checked == false && d.getElementById('frm1701A:optSpouseATC_3').checked == false && d.getElementById('frm1701A:optSpouseATC_4').checked == false) {
                alert("Please select an option for Item 69."); return;
            }
        }

        disableAllControl();
        alert("Validation successful. Click on Edit if you wish to modify your entries.");
        return;
    }

    var disableElem = true;
    var enableElem = false;
    function disableAllControl() {

        d.getElementById('frm1701A:txtMonth').disabled = true;
        d.getElementById('frm1701A:txtYear').disabled = true;
        d.getElementById('frm1701A:optAmendedReturn_1').disabled = true;
        d.getElementById('frm1701A:optAmendedReturn_2').disabled = true;
        d.getElementById('frm1701A:optShortPeriod_1').disabled = true;
        d.getElementById('frm1701A:optShortPeriod_2').disabled = true;
        d.getElementById('frm1701A:optTaxType_1').disabled = true;
        d.getElementById('frm1701A:optTaxType_2').disabled = true;
        d.getElementById('frm1701A:optATC_1').disabled = true;
        d.getElementById('frm1701A:optATC_2').disabled = true;
        d.getElementById('frm1701A:optATC_3').disabled = true;
        d.getElementById('frm1701A:optATC_4').disabled = true;
        d.getElementById('frm1701A:txtBirthDate').disabled = true;
        d.getElementById('frm1701A:txtCitizenship').disabled = true;
        d.getElementById('frm1701A:optForeignTaxCredits_1').disabled = true;
        d.getElementById('frm1701A:optForeignTaxCredits_2').disabled = true;
        d.getElementById('frm1701A:txtForeignTaxNumber').disabled = true;
        d.getElementById('frm1701A:optCivilStatus_1').disabled = true;
        d.getElementById('frm1701A:optCivilStatus_2').disabled = true;
        d.getElementById('frm1701A:optCivilStatus_3').disabled = true;
        d.getElementById('frm1701A:optCivilStatus_4').disabled = true;
        d.getElementById('frm1701A:optSpouseIncome_1').disabled = true;
        d.getElementById('frm1701A:optSpouseIncome_2').disabled = true;
        d.getElementById('frm1701A:optFilingStatus_1').disabled = true;
        d.getElementById('frm1701A:optFilingStatus_2').disabled = true;
        d.getElementById('frm1701A:optTaxRate_1').disabled = true;
        d.getElementById('frm1701A:optTaxRate_2').disabled = true;

        d.getElementById('frm1701A:txt23A').disabled = true;
        d.getElementById('frm1701A:txt25A').disabled = true;
        d.getElementById('frm1701A:txt26A').disabled = true;
        d.getElementById('frm1701A:txt27A').disabled = true;
        d.getElementById('frm1701A:txt23B').disabled = true;
        d.getElementById('frm1701A:txt25B').disabled = true;
        d.getElementById('frm1701A:txt26B').disabled = true;
        d.getElementById('frm1701A:txt27B').disabled = true;
        d.getElementById('frm1701A:optRefund_1').disabled = true;
        d.getElementById('frm1701A:optRefund_2').disabled = true;
        d.getElementById('frm1701A:optRefund_3').disabled = true;
        d.getElementById('frm1701A:txtNumberAttachments').disabled = true;

        //Spouse
        d.getElementById('frm1701A:txtSpouseTIN1').disabled = true;
        d.getElementById('frm1701A:txtSpouseTIN2').disabled = true;
        d.getElementById('frm1701A:txtSpouseTIN3').disabled = true;
        d.getElementById('frm1701A:txtSpouseBranchCode').disabled = true;
        d.getElementById('frm1701A:txtSpouseRDOCode').disabled = true;
        d.getElementById('frm1701A:txtSpouseName').disabled = true;
        d.getElementById('frm1701A:optSpouseTaxType_1').disabled = true;
        d.getElementById('frm1701A:optSpouseTaxType_2').disabled = true;
        d.getElementById('frm1701A:txtSpouseCitizenship').disabled = true;
        d.getElementById('frm1701A:txtSpouseFTN').disabled = true;
        d.getElementById('frm1701A:optSpouseFTC_1').disabled = true;
        d.getElementById('frm1701A:optSpouseFTC_2').disabled = true;
        d.getElementById('frm1701A:optSpouseATC_1').disabled = true;
        d.getElementById('frm1701A:optSpouseATC_2').disabled = true;
        d.getElementById('frm1701A:optSpouseATC_3').disabled = true;
        d.getElementById('frm1701A:optSpouseATC_4').disabled = true;
        d.getElementById('frm1701A:optSpouseTaxRate_1').disabled = true;
        d.getElementById('frm1701A:optSpouseTaxRate_2').disabled = true;

        //Part IV.A
        d.getElementById('frm1701A:txt36A').disabled = true;
        d.getElementById('frm1701A:txt36B').disabled = true;
        d.getElementById('frm1701A:txt37A').disabled = true;
        d.getElementById('frm1701A:txt37B').disabled = true;
        d.getElementById('frm1701A:txt41Desc').disabled = true;
        d.getElementById('frm1701A:txt41A').disabled = true;
        d.getElementById('frm1701A:txt41B').disabled = true;
        d.getElementById('frm1701A:txt42Desc').disabled = true;
        d.getElementById('frm1701A:txt42A').disabled = true;
        d.getElementById('frm1701A:txt42B').disabled = true;
        d.getElementById('frm1701A:txt43A').disabled = true;
        d.getElementById('frm1701A:txt43B').disabled = true;

        //Part IV.B
        d.getElementById('frm1701A:txt47A').disabled = true;
        d.getElementById('frm1701A:txt47B').disabled = true;
        d.getElementById('frm1701A:txt48A').disabled = true;
        d.getElementById('frm1701A:txt48B').disabled = true;
        d.getElementById('frm1701A:txt50Desc').disabled = true;
        d.getElementById('frm1701A:txt50A').disabled = true;
        d.getElementById('frm1701A:txt50B').disabled = true;
        d.getElementById('frm1701A:txt51Desc').disabled = true;
        d.getElementById('frm1701A:txt51A').disabled = true;
        d.getElementById('frm1701A:txt51B').disabled = true;
        d.getElementById('frm1701A:txt54A').disabled = true;
        d.getElementById('frm1701A:txt54B').disabled = true;

        //Part IV.C
        d.getElementById('frm1701A:txt57A').disabled = true;
        d.getElementById('frm1701A:txt57B').disabled = true;
        d.getElementById('frm1701A:txt58A').disabled = true;
        d.getElementById('frm1701A:txt58B').disabled = true;
        d.getElementById('frm1701A:txt59A').disabled = true;
        d.getElementById('frm1701A:txt59B').disabled = true;
        d.getElementById('frm1701A:txt60A').disabled = true;
        d.getElementById('frm1701A:txt60B').disabled = true;
        d.getElementById('frm1701A:txt61A').disabled = true;
        d.getElementById('frm1701A:txt61B').disabled = true;
        d.getElementById('frm1701A:txt62A').disabled = true;
        d.getElementById('frm1701A:txt62B').disabled = true;
        d.getElementById('frm1701A:txt63Desc').disabled = true;
        d.getElementById('frm1701A:txt63A').disabled = true;
        d.getElementById('frm1701A:txt63B').disabled = true;

        d.getElementById('frm1701A:txtCurrentPage').disabled = true;
        d.getElementById('frm1701A:cmdValidate').disabled = true;
        d.getElementById('frm1701A:cmdEdit').disabled = false;
        d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm1701A:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;
        
        disableElem;
        enableElem;
    }

    function enableAllControl() {

        if (d.getElementById('frm1701A:optShortPeriod_1').checked) {
            d.getElementById('frm1701A:txtMonth').disabled = false;
        }
        d.getElementById('frm1701A:txtYear').disabled = false;
        d.getElementById('frm1701A:optAmendedReturn_1').disabled = false;
        d.getElementById('frm1701A:optAmendedReturn_2').disabled = false;
        d.getElementById('frm1701A:optShortPeriod_1').disabled = false;
        d.getElementById('frm1701A:optShortPeriod_2').disabled = false;
        d.getElementById('frm1701A:optTaxType_1').disabled = false;
        d.getElementById('frm1701A:optTaxType_2').disabled = false;
        d.getElementById('frm1701A:optATC_1').disabled = false;
        d.getElementById('frm1701A:optATC_2').disabled = false;
        d.getElementById('frm1701A:optATC_3').disabled = false;
        d.getElementById('frm1701A:optATC_4').disabled = false;
        d.getElementById('frm1701A:txtBirthDate').disabled = false;
        d.getElementById('frm1701A:txtCitizenship').disabled = false;
        d.getElementById('frm1701A:optForeignTaxCredits_1').disabled = false;
        d.getElementById('frm1701A:optForeignTaxCredits_2').disabled = false;
        //d.getElementById('frm1701A:txtForeignTaxNumber').disabled = false;
        d.getElementById('frm1701A:optCivilStatus_1').disabled = false;
        d.getElementById('frm1701A:optCivilStatus_2').disabled = false;
        d.getElementById('frm1701A:optCivilStatus_3').disabled = false;
        d.getElementById('frm1701A:optCivilStatus_4').disabled = false;
        d.getElementById('frm1701A:optSpouseIncome_1').disabled = false;
        d.getElementById('frm1701A:optSpouseIncome_2').disabled = false;
        d.getElementById('frm1701A:optFilingStatus_1').disabled = false;
        d.getElementById('frm1701A:optFilingStatus_2').disabled = false;
        d.getElementById('frm1701A:optTaxRate_1').disabled = false;
        d.getElementById('frm1701A:optTaxRate_2').disabled = false;

        d.getElementById('frm1701A:txt23A').disabled = false;
        d.getElementById('frm1701A:txt25A').disabled = false;
        d.getElementById('frm1701A:txt26A').disabled = false;
        d.getElementById('frm1701A:txt27A').disabled = false;
        
        if (NumWithComma(d.getElementById('frm1701A:txt30').value) < 0) {
            d.getElementById('frm1701A:optRefund_1').disabled = false;
            d.getElementById('frm1701A:optRefund_2').disabled = false;
            d.getElementById('frm1701A:optRefund_3').disabled = false;
        }
        d.getElementById('frm1701A:txtNumberAttachments').disabled = false;

        //Spouse
        if (d.getElementById('frm1701A:optFilingStatus_1').checked) {
            enableSpouse();
        }

        //Part IV.A
        if (d.getElementById("frm1701A:optTaxRate_1").checked == true) {
            d.getElementById('frm1701A:txt36A').disabled = false;
            d.getElementById('frm1701A:txt37A').disabled = false;
            d.getElementById('frm1701A:txt41Desc').disabled = false;
            d.getElementById('frm1701A:txt41A').disabled = false;
            d.getElementById('frm1701A:txt42Desc').disabled = false;
            d.getElementById('frm1701A:txt42A').disabled = false;
            d.getElementById('frm1701A:txt43A').disabled = false;
        }

        //Part IV.B
        if (d.getElementById("frm1701A:optTaxRate_2").checked == true) {
            d.getElementById('frm1701A:txt47A').disabled = false;
            d.getElementById('frm1701A:txt48A').disabled = false;
            d.getElementById('frm1701A:txt50Desc').disabled = false;
            d.getElementById('frm1701A:txt50A').disabled = false;
            d.getElementById('frm1701A:txt51Desc').disabled = false;
            d.getElementById('frm1701A:txt51A').disabled = false;
            d.getElementById('frm1701A:txt54A').disabled = false;
        }

        //Spouse Part IV.A
        if (d.getElementById("frm1701A:optSpouseTaxRate_1").checked == true) {
            d.getElementById('frm1701A:txt36B').disabled = false;
            d.getElementById('frm1701A:txt37B').disabled = false;
            d.getElementById('frm1701A:txt41Desc').disabled = false;
            d.getElementById('frm1701A:txt41B').disabled = false;
            d.getElementById('frm1701A:txt42Desc').disabled = false;
            d.getElementById('frm1701A:txt42B').disabled = false;
            d.getElementById('frm1701A:txt43B').disabled = false;
        }

        //Spouse Part IV.B
        if (d.getElementById("frm1701A:optSpouseTaxRate_2").checked == true) {
            d.getElementById('frm1701A:txt47B').disabled = false;
            d.getElementById('frm1701A:txt48B').disabled = false;
            d.getElementById('frm1701A:txt50Desc').disabled = false;
            d.getElementById('frm1701A:txt50B').disabled = false;
            d.getElementById('frm1701A:txt51Desc').disabled = false;
            d.getElementById('frm1701A:txt51B').disabled = false;
            d.getElementById('frm1701A:txt54B').disabled = false;
        }

        //Part IV.C
        d.getElementById('frm1701A:txt57A').disabled = false;
        d.getElementById('frm1701A:txt57B').disabled = false;
        d.getElementById('frm1701A:txt58A').disabled = false;
        d.getElementById('frm1701A:txt58B').disabled = false;
        d.getElementById('frm1701A:txt59A').disabled = false;
        d.getElementById('frm1701A:txt59B').disabled = false;
        d.getElementById('frm1701A:txt60A').disabled = false;
        d.getElementById('frm1701A:txt60B').disabled = false;
       
        d.getElementById('frm1701A:txt63Desc').disabled = false;
        d.getElementById('frm1701A:txt63A').disabled = false;
        d.getElementById('frm1701A:txt63B').disabled = false;

        if(d.getElementById("frm1701A:optAmendedReturn_1").checked) {
            d.getElementById('frm1701A:txt61A').disabled = false;
            d.getElementById('frm1701A:txt61B').disabled = false;
        }
        if (d.getElementById("frm1701A:optForeignTaxCredits_1").checked) {
            d.getElementById('frm1701A:txtForeignTaxNumber').disabled = false;
            d.getElementById('frm1701A:txt62A').disabled = false;
        }
        if (d.getElementById("frm1701A:optSpouseFTC_1").checked) {
            d.getElementById('frm1701A:txtSpouseFTN').disabled = false;
            d.getElementById('frm1701A:txt62B').disabled = false;
        }

        d.getElementById('frm1701A:txtCurrentPage').disabled = false;
        d.getElementById('frm1701A:cmdValidate').disabled = false;
        d.getElementById('frm1701A:cmdEdit').disabled = true;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1701A:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;

        if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
            d.getElementById('frm1701A:txtYear').disabled = true;
        }

        validateModalState(false);
        disableElem;
        enableElem;
    }

    var disabledItems = new Array();
    var isFromPrint = false;
    function printme() {

        $('#bg').hide(); //852
        $('.printSignFooterClass').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always' });    
        $('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
        
        $('#checkATC').css({ 'display':'none' });
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
                }               
                if (elem[i].type == 'radio' || elem[i].type == 'checkbox') { 
                    if (document.getElementById(elem[i].id).disabled) {
                        disabledItems[x] = elem[i].id;
                        x++;
                    }
                    document.getElementById(elem[i].id).disabled = true;
                }   
               
            }
        }   
        
        var activePage = document.getElementById('frm1701A:txtCurrentPage').value;

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

        $('#printMenu').show('blind');
        if ( $('#formMenu').css('display') != 'none' ) {    
            $('#formMenu').hide('blind');
        }   

        isFromPrint = true;
        document.getElementById('frm1701A:txtCurrentPage').disabled = false;
        document.getElementById('frm1701A:txtCurrentPage').readOnly = false;
    }   

    function goToPage() {
        var newVal = document.getElementById("frm1701A:txtCurrentPage").value;
        //var printType = !isFromPrint ? "Page" : "Print";
        var printType = "Page";

        if ((newVal <= MaxPage) && (newVal > 0) && (newVal !== currentPage.toString())) {
            $('#' + printType + currentPage + 'Content').hide('blind');
            $('#' + printType + newVal + 'Content').show('blind');
            currentPage = (document.getElementById("frm1701A:txtCurrentPage").value) * 1;
        }
        else if ((newVal > MaxPage) || (newVal <= 0)) {
            alert("Invalid page");

            document.getElementById("frm1701A:txtCurrentPage").value = currentPage;
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
            document.getElementById('frm1701A:txtCurrentPage').value = currentPage;

        }
    }
    function processNext() {
        if (currentPage == MaxPage) {
        
        }
        else {
        currentPage++;
        $('#Page' + currentPage + 'Content').show('blind');
        $('#Page' + (currentPage - 1) + 'Content').hide('blind');
        document.getElementById('frm1701A:txtCurrentPage').value = currentPage;
        }
    }
   
    String.prototype.trim = function () {
        return this.replace(/^\s+|\s+$/g, '');
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
    function saveData()
    {
        var valid = initialValidateBeforeSave();

        var disableInputs = [];

        if (d.getElementById('frm1701A:cmdValidate').disabled){
            disableInputs  = $(".disabledInputs").not('.disableByDefault');
        }else{
            disableInputs = $("input[type!=button]:disabled").not('.disableByDefault');
        }

        for (var i = 0; i < disableInputs.length; i++) {
            d.getElementById('frm1701A:txtDisabledOnSave').value += disableInputs[i].id + ",";
        }

        //on validate
            if (d.getElementById('frm1701A:cmdValidate').disabled){
                enabledInputs  = $(".enabledInputs");
            }else{
                //get all disabled element and save to txtDisabledOnSave
                enabledInputs = $('input[type!=button]:input[type!=hidden]:not(:disabled):not([readonly])');
            }
            
        for (var i = 0; i < enabledInputs.length; i++) {
            d.getElementById('frm1701A:txtEnabledOnSave').value += enabledInputs[i].id + ",";
        }

        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                
                var data = form.serialize();
                save('1701A',data);
                
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
        saveAndExit('1701A',data);
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

        submitAndSave('1701A', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1701A';
    }
</script>
@endsection