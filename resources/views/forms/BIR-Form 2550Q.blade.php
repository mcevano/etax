@extends('layouts.app')
@section('title', '| BIR Form No. 2550Q')

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
        <button type="button" class="btn btn-danger btn-exit" id="2550Q" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="2550Q" company='{{$company->id}}'>Okay</button>
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
			<button type="button" class="btn btn-danger btn-filing-success" form='2550Q' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 801px;">

                <table border="0" width="747" cellspacing="0" cellpadding="0" align="center" style="background-repeat: repeat-x;">
                    <tr>
                        <td>

                            <div id="formPaper">
                                <div id="mainContent">
                                    <table width="747" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>
                                                <div align='center' style="display: inline; width: 741px !important; height: 61px !important">
                                                    <img id="frm2550Q:header" src="{{ asset('images/header/2550q_header.jpg') }}" width="741" height="61" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td width="174" valign="top" class="tblFormTd" style="height=20px">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td colspan="2" align="left" style="height=20px" nowrap>
                                                                        <font size="0.75" style="font-size: 11px;">Year Ended</font>
                                                                        <input
                                                                            id="frm2550q:optAmend:_1" name="frm2550q:optAmend" value="Y" type="radio" onclick="enableMonth(this);changeMonth(); " />
                                                                        <label for="frm2550q:optAmend:_1" style="font-size: 10px;">Calendar&nbsp;&nbsp;</label>
                                                                        <input
                                                                            id="frm2550q:optAmend:_2" name="frm2550q:optAmend"
                                                                            value="N"
                                                                            type="radio" onclick="changeMonth(); enableMonth(this);" />
                                                                        <label
                                                                            for="frm2550q:optAmend:_2" style="font-size: 10px;">
                                                                            Fiscal</label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="100%" align="left" nowrap colspan="2" style="height=20px">
                                                                        <font size="0.75" style="font-size: 11px;">(MM/YYYY)</font>
                                                                        <select size="1" name="frm2550q:RtnMonth" id="frm2550q:RtnMonth" onchange="changeMonth()">
                                                                            <option value="0"></option>
                                                                            <option value="01">January</option>
                                                                            <option value="02">February</option>
                                                                            <option value="03">March</option>
                                                                            <option value="04">April</option>
                                                                            <option value="05">May</option>
                                                                            <option value="06">June</option>
                                                                            <option value="07">July</option>
                                                                            <option value="8">August</option>
                                                                            <option value="9">September</option>
                                                                            <option value="10">October</option>
                                                                            <option value="11">November</option>
                                                                            <option value="12">December</option>
                                                                        </select>
                                                                        <input type="text" value="" size="2" name="frm2550q:txtYear" maxlength="4" id="frm2550q:txtYear" onblur="blockletterWithout2Decimal(this);changeYear()" onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>

                                                        <td width="143" valign="top" class="tblFormTd" style="height=20px">
                                                            <table width="137" border="0" cellspacing="0" cellpadding="0" style="height=20px">
                                                                <tr>
                                                                    <td width="24"><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;2&nbsp;&nbsp;</font></td>
                                                                    <td width="113"><font size="1" style="font-size: 11px;">Quarter</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                       <div align="center" style="padding: 0px 0 0px 0;">
                                                                            <table cellspacing="0" cellpadding="0" border="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <input type="radio" value="1" name="frm2550q:OptQuarter" id="frm2550q:OptQuarter1" checked onclick="changeYear()" />
                                                                                            <label for="frm2550q:OptQuarter1" style="font-size: 10px;">1st</label>
                                                                                            &nbsp;&nbsp;</td>
                                                                                        <td align="center">
                                                                                            <input type="radio" value="2" name="frm2550q:OptQuarter" id="frm2550q:OptQuarter2" onclick="changeYear()" />
                                                                                            <label for="frm2550q:OptQuarter2" style="font-size: 10px;">2nd</label>
                                                                                            &nbsp;&nbsp;</td>
                                                                                        <td align="center">
                                                                                            <input type="radio" value="3" name="frm2550q:OptQuarter" id="frm2550q:OptQuarter3" onclick="changeYear()" />
                                                                                            <label for="frm2550q:OptQuarter3" style="font-size: 10px;">3rd</label>
                                                                                            &nbsp;&nbsp;</td>
                                                                                        <td align="center">
                                                                                            <input type="radio" value="4" name="frm2550q:OptQuarter" id="frm2550q:OptQuarter4" onclick="changeYear()" />
                                                                                            <label for="frm2550q:OptQuarter4" style="font-size: 10px;">4th</label>
                                                                                            &nbsp;&nbsp;</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <!-- </fieldset>-->
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="169" valign="top" class="tblFormTd" style="height=20px">
                                                            <table width="159" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="17" nowrap><font size="1.5" style="font-weight: bold;">&nbsp;3&nbsp;</font></td>
                                                                    <td colspan="3" nowrap align="center"><font size="1" style="font-size: 11px;">Return Period(MM/DD/YYYY)</font></td>

                                                                </tr>
                                                                <tr>
                                                                    <td width="31" nowrap><font size="1" style="font-size: 11px;">From:</font></td>
                                                                    <td width="80" nowrap>
                                                                        <input type="text" style="background-color: rgb(220, 220, 220); text-align: right;" size="6" maxlength="10" id="frm2550q:RtnPeriodFrom" name="frm2550q:RtnPeriodFrom" disabled="true" /></td>
                                                                    <td nowrap><font size="1" style="font-size: 11px;">To:</font></td>
                                                                    <td nowrap>
                                                                        <input type="text" style="background-color: rgb(220, 220, 220); text-align: right;" size="6" maxlength="10" id="frm2550q:RtnPeriodTo" name="frm2550q:RtnPeriodTo" disabled="true" /></td>

                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="122" valign="top" class="tblFormTd" style="height=20px">
                                                            <table width="110" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="23"><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;4&nbsp;&nbsp;</font></td>
                                                                    <td width="87"><label size="1">Amended Return?</label></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <!--<fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm2550q:j_id217" class="iceSelOneRb-dis fieldText1-dis">-->
                                                                        <div align="center" style="padding: 0px 0 0px 0;">
                                                                            <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td align="center">&nbsp;<input type="radio" value="Y" name="frm2550q:AmendedRtn" id="frm2550q:AmendedRtnY" onclick="d.getElementById('frm2550q:txtTax26E').value = '0.00';d.getElementById('frm2550q:txtTax26E').disabled = false;compute26H();" />
                                                                                            <label for="frm2550q:j_id217:_1" style="font-size: 10px;">Yes</label>
                                                                                        </td>
                                                                                        <td align="center">
                                                                                            <input type="radio" value="N" name="frm2550q:AmendedRtn" id="frm2550q:AmendedRtnN" checked="checked" onclick="d.getElementById('frm2550q:txtTax26E').value = '0.00';d.getElementById('frm2550q:txtTax26E').disabled = true;compute26H();" />
                                                                                            <label for="frm2550q:j_id217:_2" style="font-size: 10px;">No</label>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <!--</fieldset>-->
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="133" valign="top" class="tblFormTd" style="height=20px">
                                                            <table width="125" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="23"><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;5&nbsp;&nbsp;</font></td>
                                                                    <td width="102"><label size="1">Short Period Return?</label></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <!--<fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm2550q:j_id217" class="iceSelOneRb-dis fieldText1-dis">-->
                                                                        <div align="center" style="padding: 0px 0 0px 0;">
                                                                            <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td align="center">&nbsp;<input type="radio" value="Y" name="frm2550q:OptShortPrd" id="frm2550q:OptShortPrd1" onclick='enableShortPeriod("yes");' />
                                                                                            <label for="frm2550q:j_id217:_1" style="font-size: 12px;">Yes</label>
                                                                                        </td>
                                                                                        <td align="center">
                                                                                            <input type="radio" value="N" name="frm2550q:OptShortPrd" id="frm2550q:OptShortPrd2" checked="checked" onclick='enableShortPeriod("no");' />
                                                                                            <label for="frm2550q:j_id217:_2" style="font-size: 12px;">No</label>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <!--</fieldset>-->
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
                                                <table style="width: 741px" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td width="25%" valign="top" class="tblFormTd">
                                                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                <tr>
                                                                    <td width="5%" nowrap><font size="1.5" style="font-weight: bold">&nbsp;6&nbsp;</font></td>
                                                                    <td width="95%" nowrap>
                                                                        <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                                                                        <input type="text" value="{{$company->tin1}}" size="1" name="frm2550q:txtTIN1" maxlength="3" id="frm2550q:txtTIN1" onkeypress="return wholenumber(this, event)" />
                                                                        <input type="text" value="{{$company->tin2}}" size="1" name="frm2550q:txtTIN2" maxlength="3" id="frm2550q:txtTIN2" onkeypress="return wholenumber(this, event)" />
                                                                        <input type="text" value="{{$company->tin3}}" size="1" name="frm2550q:txtTIN3" maxlength="3" id="frm2550q:txtTIN3" onkeypress="return wholenumber(this, event)" />
                                                                        <input type="text" value="{{$company->tin4}}" size="1" name="frm2550q:txtBranchCode" maxlength="3" id="frm2550q:txtBranchCode" onkeypress="return letternumber(event)" />
                                                                    </td>
                                                                </tr>

                                                            </table>
                                                        </td>
                                                        <td width="20%" valign="top" class="tblFormTd">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="5%" nowrap><font size="1.5" style="font-weight: bold">&nbsp;7&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                                    <td width="95%" id="rdoSelect" nowrap>
                                                                   		<select class='iceSelOneMnu' id='frm2550q:txtRDOCode' name='frm2550q:txtRDOCode' size='1' disabled="">
                                                                   			<option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                                   		</select>
                                                                    </td>
                                                                </tr>

                                                            </table>
                                                        </td>
                                                        <td width="25%" valign="top" class="tblFormTd">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="5%" nowrap><font size="1.5" style="font-weight: bold;">&nbsp;8&nbsp;&nbsp;&nbsp;</font></td>
                                                                    <td width="95%" nowrap>
                                                                        <font size="1" style="font-size: 11px;">No. of Sheets Attached</font>
                                                                        <input type="text" value="0" style="text-align: right" size="1" name="frm2550q:txtSheets" maxlength="2" id="frm2550q:txtSheets" onkeypress="return wholenumber(this, event)" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="30%" valign="top" class="tblFormTd">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="5%" nowrap><font size="1.5" style="font-weight: bold">&nbsp;9&nbsp;</font></td>
                                                                    <td width="95%" nowrap>
                                                                        <font size="1" style="font-size: 11px;">Line of Business&nbsp;&nbsp;</font>
                                                                        <font size="1" face="Arial">
                                                                            <input type="text" value="{{$company->line_business}}" size="25" name="frm2550q:txtLineBus" maxlength="60" id="frm2550q:txtLineBus" disabled="" />
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
                                                <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td width="65%" valign="top" class="tblFormTd">
                                                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                <tr>
                                                                    <td width="100%">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tr>
                                                                                <td width="3%" nowrap><font size="1.5" style="font-weight: bold;">&nbsp;10</font></td>
                                                                                <td width="97%" nowrap>&nbsp;&nbsp;
																		<font size="1" style="font-size: 11px;">Taxpayer's Name 
                                                                        </font>
                                                                                    <input type="text" value="{{$company->registered_name}}" size="60" maxlength="60" id="frm2550q:TaxPayer" name="frm2550q:TaxPayer" onblur="return capital(this, event)" disabled="" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="35%" valign="top" class="tblFormTd">
                                                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                <tr>
                                                                    <td width="100%">
                                                                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                            <tr>
                                                                                <td width="35%" nowrap><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;11&nbsp;</font><font size="1">Telephone No.</font></td>
                                                                                <td width="65%" nowrap align="right">
                                                                                    <input type="text" value="{{$company->tel_number}}" size="15" name="frm2550q:txtTelNum" maxlength="15" id="frm2550q:txtTelNum" onkeypress="return wholenumber(this, event)" disabled="" />
                                                                                </td>
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
                                                <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td width="60%" valign="top" class="tblFormTd">
                                                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                <tr>
                                                                    <td width="100%">
                                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                            <tr>
                                                                                <td width="3%" nowrap><font size="1.5" style="font-weight: bold;">&nbsp;12</font></td>
                                                                                <td width="97%" nowrap>
                                                                                    <font size="1" style="font-size: 11px;">Registered Address</font>
                                                                                    <input type="text" value="{{$company->address}}" size="60" name="frm2550q:txtAddress" maxlength="150" id="frm2550q:txtAddress" onblur="return capital(this, event)" disabled="" />
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="40%" valign="top" class="tblFormTd">
                                                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                <tr>
                                                                    <td width="100%" nowrap>
                                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                            <tr>
                                                                                <td width="35%" nowrap><font size="1.5" style="font-weight: bold;">&nbsp;13&nbsp;</font><font size="1">Zip Code</font></td>
                                                                                <td width="65%" nowrap align="right">
                                                                                    <input type="text" value="{{$company->zip_code}}" size="15" maxlength="8" id="frm2550q:txtZipCode" name="frm2550q:txtZipCode" onkeypress="return wholenumber(this, event)" disabled />
                                                                                </td>
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
                                                <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTdPart">
                                                            <table width="" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">&nbsp;14&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1" style="font-size: 11px;">Are you availing of tax relief under Special Law / International Tax Treaty?</font></td>
                                                                    <td width="19">&nbsp;</td>
                                                                    <td width="56">
                                                                        <input type="radio" value="Y" name="frm2550q:OptTreaty" id="frm2550q:OptTreaty1" onclick="enableSelTreaty()" />
                                                                        <label for="frm2550q:OptTreaty1" style="font-size: 10px;">Yes</label>&nbsp;&nbsp;&nbsp;
                                                                    </td>
                                                                    <td width="42">
                                                                        <input type="radio" value="N" name="frm2550q:OptTreaty" id="frm2550q:OptTreaty2" checked="checked" onclick="disableSelTreaty()" />
                                                                        <label for="frm2550q:OptTreaty2" style="font-size: 10px;">No</label>
                                                                    </td>
                                                                    <td width="10">&nbsp;</td>
                                                                    <td width="232"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">If yes, specify&nbsp;
                                                                <select disabled="disabled"
                                                                    id="frm2550q:lstTaxTreaty" name="frm2550q:lstTaxTreaty" size="1">
                                                                    <option selected="selected" value="0"></option>
                                                                    <option value="1">Special Rate</option>
                                                                    <option value="2">International Tax Treaty</option>
                                                                </select>
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
                                            <td style="text-align: center;border-top: 1px solid rgb(170, 170, 170);" width="100%" border="0.1" cellspacing="0" cellpadding="0">
                                                <font size="2" style="font-weight:bold;text-align: center;" >Part II - Computation of Tax</font>
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                            <td>
                                                <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td class="tblFormTd">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="26">&nbsp;</td>
                                                                    <td colspan="2" align="center"><font size="1" style="font-size: 11px;">Sales/Receipts for the Quarter (Exclusive of VAT)</font></td>
                                                                    <td align="center"><font size="1" style="font-size: 11px;">Output Tax Due for the Quarter</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="26"><font size="1.5" style="font-weight: bold;">&nbsp;15&nbsp;&nbsp;</font></td>
                                                                    <td width="297"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Vatable Sales/Receipt - Private  ( <a href="#" id='btnSched1' onclick="showSched1()">Sch. 1</a> )</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">15A</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 2px;" size="20" maxlength="25" id="frm2550q:txtTax15A" name="frm2550q:txtTax15A" />
                                                                    </span></td>

                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">15B</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" maxlength="25" id="frm2550q:txtTax15B" name="frm2550q:txtTax15B" />
                                                                    </span></td>
                                                                </tr>


                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;16&nbsp;</font></td>
                                                                    <td><font size="1"></font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Sales to Government</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">16A</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 2px;" size="20" maxlength="25" id="frm2550q:txtTax16A"  name="frm2550q:txtTax16A" onblur='round(this,2);compute16B();compute19AB();changedTxtTax16A();valuesSched4and5();' onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">16B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm2550q:txtTax16B" name="frm2550q:txtTax16B" onblur='round(this,2);compute19AB()' onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;17</font></td>
                                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Zero Rated Sales/Receipts</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;margin-left: 3px;">17</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 6px;" size="20" maxlength="25" id="frm2550q:txtTax17" name="frm2550q:txtTax17" onblur='round(this,2);compute19AB()' onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                    <td width="219"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;18</font></td>
                                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Exempt Sales/Receipts</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;margin-left: 3px;">18</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 6px;" size="20" maxlength="25" id="frm2550q:txtTax18" name="frm2550q:txtTax18" onblur='round(this,2);compute19AB();valuesSched4and5();' onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                    <td width="219"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;19</font></td>
                                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Sales/Receipts and Output Tax Due</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">19A</font>
                                                                        <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 2px;" size="20" maxlength="25" id="frm2550q:txtTax19A" name="frm2550q:txtTax19A" onblur='valuesSched4and5();' />
                                                                    </span></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;margin-left: 2px;">19B</font>
                                                                        <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" maxlength="25" id="frm2550q:txtTax19B" name="frm2550q:txtTax19B" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;20&nbsp;</font></td>
                                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Allowable Input Tax</font></td>
                                                                    <td width="198"><span class="spacePadder"></span></td>
                                                                    <td width="219"><span class="spacePadder"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">20</font><font size="1.5" style="font-weight: bold;">A&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Input Tax Carried Over from Previous Period</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">20A</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 3px;" size="20" maxlength="25" id="frm2550q:txtTax20A" name="frm2550q:txtTax20A" onblur="round(this,2);compute20F() " onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">20</font><font size="1.5" style="font-weight: bold;">B&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Input Tax Deferred on Capital Goods Exceeding P1Million from Previous Period</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">20B</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 3px;" size="20" maxlength="25" id="frm2550q:txtTax20B" name="frm2550q:txtTax20B" onblur="round(this,2);compute20F()" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>


                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1.5" style="font-weight: bold;">20</font><font size="1.5" style="font-weight: bold;">C&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Transitional Input Tax</font></td>
                                                                    <td width="198"></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">20C</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 3px;" size="20" maxlength="25" id="frm2550q:txtTax20C" name="frm2550q:txtTax20C" onblur="round(this,2);compute20F()" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1.5" style="font-weight: bold;">20</font><font size="1.5" style="font-weight: bold;">D&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Presumptive Input Tax</font></td>
                                                                    <td width="198"></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">20D</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 3px;" size="20" maxlength="25" id="frm2550q:txtTax20D" name="frm2550q:txtTax20D" onblur="round(this,2);compute20F()" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1.5" style="font-weight: bold;">20</font><font size="1.5" style="font-weight: bold;">E&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Others</font></td>
                                                                    <td width="198"></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">20E</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 3px;" size="20" maxlength="25" id="frm2550q:txtTax20E" name="frm2550q:txtTax20E" onblur="round(this,2);compute20F()" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1.5" style="font-weight: bold;">20</font><font size="1.5" style="font-weight: bold;">F&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total (Sum of Item 20A, 20B, 20C, 20D &  20E)</font></td>
                                                                    <td width="198"></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">20F</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax20F" name="frm2550q:txtTax20F" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;21&nbsp;</font></td>
                                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Current Transactions</font></td>
                                                                    <td align="center"><font size="1">Purchases</font></td>
                                                                    <td width="219"><span class="spacePadder"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <!--<td><font size="1.5" style="font-weight:bold;">21</font><font size="1.5" style="font-weight:bold;">A/B&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif">	Purchase of Capital Goods not exceeding P1Million  (See <input type="button" class="printButtonClass" value='Sch. 2' id='btnSched2' onclick="showSched2()" /> )</font></td>-->
                                                                    <td nowrap><font size="1.5" style="font-weight: bold;">21</font><font size="1.5" style="font-weight: bold;">A/B&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">	Purchase of Capital Goods not exceeding P1Million  ( <a href="#" id='btnSched2' onclick="showSched2()">Sch. 2</a> )</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21A</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax21A" name="frm2550q:txtTax21A" />
                                                                    </span></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21B</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax21B" name="frm2550q:txtTax21B" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <!--<td> <font size="1.5" style="font-weight:bold;">21</font><font size="1.5" style="font-weight:bold;">C/D&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif">	Purchase of Capital Goods exceeding P1Million  (See <input type="button" class="printButtonClass" value='Sch. 3' id='btnSched3A' onclick="showSched3();" /> )</font></td>-->
                                                                    <td><font size="1.5" style="font-weight: bold;">21</font><font size="1.5" style="font-weight: bold;">C/D&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">	Purchase of Capital Goods exceeding P1Million  ( <a href="#" id='btnSched3A' onclick="showSched3();">Sch. 3</a> )</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21C</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax21C" name="frm2550q:txtTax21C" />
                                                                    </span></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21D</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax21D" name="frm2550q:txtTax21D" />
                                                                    </span></td>
                                                                </tr>


                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1.5" style="font-weight: bold;">21</font><font size="1.5" style="font-weight: bold;">E/F&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Domestic Purchases of Goods Other than Capital Goods</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21E</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax21E" name="frm2550q:txtTax21E" onblur="round(this,2);compute21P();compute21TransactionbyRow('E')" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21F</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 5px;" size="20" maxlength="25" id="frm2550q:txtTax21F" name="frm2550q:txtTax21F" onblur="round(this,2);compute22()" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1.5" style="font-weight: bold;">21</font><font size="1.5" style="font-weight: bold;">G/H&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Importation of Goods Other than Capital Goods</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21G</font>
                                                                        <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 3px;" size="20" maxlength="25" id="frm2550q:txtTax21G" name="frm2550q:txtTax21G" onblur="round(this,2);compute21P();compute21TransactionbyRow('G')" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21H</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax21H" name="frm2550q:txtTax21H" onblur="round(this,2);compute22()" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1.5" style="font-weight: bold;">21</font><font size="1.5" style="font-weight: bold;">I/J&nbsp;&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Domestic Purchase of Services</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21I</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 8px;" size="20" maxlength="25" id="frm2550q:txtTax21I" name="frm2550q:txtTax21I" onblur="round(this,2);compute21P();compute21TransactionbyRow('I')" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21J</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 6px;" size="20" maxlength="25" id="frm2550q:txtTax21J" name="frm2550q:txtTax21J" onblur="round(this,2);compute22()" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1.5" style="font-weight: bold;">21</font><font size="1.5" style="font-weight: bold;">K/L&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Services rendered by Non-residents</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21K</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax21K" name="frm2550q:txtTax21K" onblur="round(this,2);compute21P();compute21TransactionbyRow('K')" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21L</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 5px;" size="20" maxlength="25" id="frm2550q:txtTax21L" name="frm2550q:txtTax21L" onblur="round(this,2);compute22()" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1.5" style="font-weight: bold;">21</font><font size="1.5" style="font-weight: bold;">M&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Purchases Not Qualified for Input Tax</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21M</font>
                                                                        <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 3px;" size="20" maxlength="25" id="frm2550q:txtTax21M" name="frm2550q:txtTax21M" onblur="round(this,2);compute21P()" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                    <td width="219"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1.5" style="font-weight: bold;">21</font><font size="1.5" style="font-weight: bold;">N/O&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Others</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21N</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax21N" name="frm2550q:txtTax21N" onblur="round(this,2);compute21P();compute21TransactionbyRow('N')" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21O</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm2550q:txtTax21O" name="frm2550q:txtTax21O" onblur="round(this,2);compute22()" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1.5" style="font-weight: bold;">21</font><font size="1.5" style="font-weight: bold;">P&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">	Total Current Purchases (Sum of Item 21A, 21C, 21E, 21G, 21I, 21K, 21M & 21N)</font></td>
                                                                    <td width="198"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">21P</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax21P" name="frm2550q:txtTax21P" />
                                                                    </span></td>
                                                                    <td width="219"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;22&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Available Input Tax (Sum of Item 20F, 21B, 21D, 21F, 21H, 21J, 21L & 21O)</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">22</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" maxlength="25" id="frm2550q:txtTax22" name="frm2550q:txtTax22" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;23&nbsp;</font></td>
                                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Deductions from Input Tax</font></td>
                                                                    <td width="198"><span class="spacePadder"></span></td>
                                                                    <td width="219"><span class="spacePadder"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <!--<td colspan="2"> <font size="1.5" style="font-weight:bold;">23A&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif">Input Tax on Purchases of Capital Goods exceeding P1Million deferred for      the succeeding period  (See <input type="button" class="printButtonClass" value='Sch. 3' id='btnSched3B' onclick="showSched3();" /> )</font></td>-->
                                                                    <td colspan="2" nowrap><font size="1.5" style="font-weight: bold;">23A&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Input Tax on Purchases of Capital Goods exceeding P1Million deferred for the succeeding period  ( <a href="#" id='btnSched3B' onclick="showSched3();">Sch. 3</a> )</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">23A</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax23A" name="frm2550q:txtTax23A" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <!--<td colspan="2"> <font size="1.5" style="font-weight:bold;">23B&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif">Input Tax on Sale to Gov't. closed to expense  ( <input type="button" class="printButtonClass" value='Sch. 4' id='btnSched4' onclick="showSched4()" /> )</font></td>-->
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">23B&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Input Tax on Sale to Gov't. closed to expense  ( <a href="#" id='btnSched4' onclick="showSched4()">Sch. 4</a> )</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">23B</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax23B" name="frm2550q:txtTax23B" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <!--<td colspan="2"> <font size="1.5" style="font-weight:bold;">23C&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif">Input Tax allocable to Exempt Sales  ( <input type="button" class="printButtonClass" value='Sch. 5' id='btnSched5' onclick="showSched5()" /> )</font></td>-->
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">23C&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Input Tax allocable to Exempt Sales  ( <a href="#" id='btnSched5' onclick="showSched5()">Sch. 5</a> )</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">23C</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax23C" name="frm2550q:txtTax23C" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">23D&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">VAT Refund/TCC claimed</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">23D</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax23D" name="frm2550q:txtTax23D" onblur="round(this,2);compute23F()" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">23E&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Others</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">23E</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax23E" name="frm2550q:txtTax23E" onblur="round(this,2);compute23F()" onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">23F&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total (Sum of Item 23A, 23B, 23C, 23D & 23E)</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">23F</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 5px;" size="20" maxlength="25" id="frm2550q:txtTax23F" name="frm2550q:txtTax23F" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;24&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Allowable Input Tax (Item 22 less Item 23F)</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;margin-left: 3px;">24</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 8px;" size="20" maxlength="25" id="frm2550q:txtTax24" name="frm2550q:txtTax24" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;25&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Net VAT Payable (item 19B less Item 24)</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">25</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 11px;" size="20" maxlength="25" id="frm2550q:txtTax25" name="frm2550q:txtTax25" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;26&nbsp;</font></td>
                                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Tax Credits/Payments</font></td>
                                                                    <td width="198"><span class="spacePadder"></span></td>
                                                                    <td width="219"><span class="spacePadder"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">26A&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Monthly VAT Payments - previous two months</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">26A</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax26A" name="frm2550q:txtTax26A" onblur='round(this,2);compute26H()' onkeypress="return numbersonly(this, event)" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <!--<td colspan="2"> <font size="1.5" style="font-weight:bold;">26B&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif">Creditable Value-Added Tax Withheld (See <input type="button" class="printButtonClass" value='Sch. 6' id='btnSched6' onclick="showSched6();" /> )</font></td>-->
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">26B&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Creditable Value-Added Tax Withheld ( <a href="#" id='btnSched6' onclick="showSched6();">Sch. 6</a> )</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">26B</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax26B" name="frm2550q:txtTax26B" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <!--<td colspan="2"> <font size="1.5" style="font-weight:bold;">26C&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif">Advance Payment for Sugar and Flour Industries( <input type="button" class="printButtonClass" value='Sch. 7' id='btnSched7' onclick="showSched7();" /> )</font></td>-->
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">26C&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Advance Payment for Sugar and Flour Industries( <a href="#" id='btnSched7' onclick="showSched7();">Sch. 7</a> )</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">26C</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax26C" name="frm2550q:txtTax26C" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <!--<td colspan="2"> <font size="1.5" style="font-weight:bold;">26D&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif">VAT withheld on Sales to Government  ( <input type="button" class="printButtonClass" value='Sch. 8' id='btnSched8' onclick="showSched8();" /> )</font></td>-->
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">26D&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">VAT withheld on Sales to Government  ( <a href="#" id='btnSched8' onclick="showSched8();">Sch. 8</a> )</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">26D</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax26D" name="frm2550q:txtTax26D" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">26E&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">VAT paid in return previously filed, if this is an amended return</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">26E</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax26E" name="frm2550q:txtTax26E" onblur='round(this,2);compute26H()' onkeypress='return numbersonly(this, event)' />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">26F&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Advance Payments made (please attach proof of payments - BIR Form No. 0605)</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">26F</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 1px;margin-left: 5px;" size="20" maxlength="25" id="frm2550q:txtTax26F" name="frm2550q:txtTax26F" onblur='round(this,2);compute26H()' onkeypress='return numbersonly(this, event)' />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">26G&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Others</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">26G</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 3px;" size="20" maxlength="25" id="frm2550q:txtTax26G" name="frm2550q:txtTax26G" onblur='round(this,2);compute26H()' onkeypress='return numbersonly(this, event)' />
                                                                    </span></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1.5" style="font-weight: bold;">26H&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Tax Credits/Payments(Sum of Item 26A, 26B, 26C, 26D, 26E, 26F, & 26G)</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">26H</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550q:txtTax26H" name="frm2550q:txtTax26H" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;27&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Still Payable/ (Overpayment) (Item 25 less Item 26H)</font></td>
                                                                    <td width="219"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">27</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 11px;" size="20" maxlength="25" id="frm2550q:txtTax27" name="frm2550q:txtTax27" />
                                                                    </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <table width="732">
                                                                            <tr>
                                                                                <td width="22"><font size="1.5" style="font-weight: bold;">&nbsp;28&nbsp;</font></td>
                                                                                <td width="75" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">&nbsp;Add Penalties </font></td>
                                                                                <td align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Surcharge</font></td>
                                                                                <td align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Interest</font></td>
                                                                                <td align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Compromise</font></td>
                                                                                <td align="center"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="22"><font size="1.5" style="font-weight: bold;">&nbsp;&nbsp;</font></td>
                                                                                <td width="75" align="center">&nbsp;</td>
                                                                                <td width="130"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">28A</font>
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="17" maxlength="15" id="frm2550q:txtTax28A" name="frm2550q:txtTax28A" onblur="round(this,2);computePenalties()" onkeypress="return numbersonly(this, event)" />
                                                                                </span></td>
                                                                                <td width="130"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">28B</font>
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="17" maxlength="15" id="frm2550q:txtTax28B" name="frm2550q:txtTax28B" onblur="round(this,2);computePenalties()" onkeypress="return numbersonly(this, event)" />
                                                                                </span></td>
                                                                                <td width="130"><span class="spacePadder"><font size="1.5" style="font-weight: bold;">28C</font>
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="17" maxlength="15" id="frm2550q:txtTax28C" name="frm2550q:txtTax28C" onblur="round(this,2);computePenalties()" onkeypress="return numbersonly(this, event)" />
                                                                                </span></td>
                                                                                <td width="206"><div class="spacePadder" style="margin-top: 10px;"><font size="1.5" style="font-weight: bold;">28D</font>
                                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" maxlength="25" id="frm2550q:txtTax28D" name="frm2550q:txtTax28D" />
                                                                                </div></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><font size="1.5" style="font-weight: bold;">&nbsp;29&nbsp;&nbsp;</font></td>
                                                                    <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Amount Payable (Overpayment) (Sum of Item 27& 28D)</font></td>
                                                                    <td width="219">
                                                                        <span class="spacePadder">
                                                                            <font size="1.5" style="font-weight: bold;">29</font>&nbsp;&nbsp;&nbsp;
                                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" maxlength="25" id="frm2550q:txtTax29" name="frm2550q:txtTax29" />
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
                                                <div class="imgClass" align='center' style="display: none; width: 741px !important;">
                                                    <table style="border-top: 3px solid black; border-collapse: collapse; font-family: arial; font-size: 10px; text-align: center; table-layout: fixed; background-color: white;">
                                                        <col width="33%" />
                                                        <col width="19%" />
                                                        <col width="19%" />
                                                        <col width="29%" />
                                                        <tr>
                                                            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge, and 
								  					<br />
                                                                belief, is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
								  					<br />
                                                                &nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><b>30</b>______________________________________________________________________________
									  				&nbsp;&nbsp;&nbsp;&nbsp;
									  				<br />
                                                                President/Vice President/Principal Officer/Accredited Tax Agent/
								    				<br />
                                                                Authorized Representative/Taxpayer
								    				<br />
                                                                (Signature Over Printed Name)</td>
                                                            <td><b>31</b>_____________________________
								    				<br />
                                                                Treasurer/Assistant Treasurer
								    				<br />
                                                                (Signature Over Printed Name)
								    				<br />
                                                                &nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>_______________________________________
							    					<br />
                                                                Title/Position of Signatory</td>
                                                            <td colspan="2">______________________________________
								    				<br />
                                                                TIN of Signatory</td>
                                                            <td>______________________________
									    			<br />
                                                                Title/Position of Signatory</td>
                                                        </tr>
                                                        <tr>
                                                            <td>_______________________________________
								    				<br />
                                                                Tax Agent Acc. No./Atty's Roll No.(if applicable)</td>
                                                            <td>_______________
								    				<br />
                                                                Date of Issuance</td>
                                                            <td>_______________
								    				<br />
                                                                Date of Expiry</td>
                                                            <td>______________________________
									    			<br />
                                                                TIN of Signatory</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="imgClass" align='center' style="display: none; width: 741px !important;">
                                                    <img id="frm2550Q:jurat" src="{{ asset('images/bottom_img/2550Q_new.jpg') }}" width="741" />
                                                </div>
                                                <div class="imgClass" align='center' style="display: none; width: 741px !important;">
                                                    <table style="font-size: 10px; text-align: left; vertical-align: top; background-color: white;">
                                                        <tr>
                                                            <td>&nbsp;Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br />
                                                                <br />
                                                                <br />
                                                                <br />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                                    <tr>
                                                        <td class="tblFormTdPart">
                                                            <table width="" border="0" cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                    <tr valign="middle">
                                                                        <td width="55"></td>
                                                                        <td width="697">
                                                                            <div align="center">
                                                                                @if($action != 'view')
                                                                                    <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm2550q:cmdValidate" id="frm2550q:cmdValidate" onclick="validate()" />
                                                                                    <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm2550q:cmdEdit" id="frm2550q:cmdEdit" onclick="AllControlDisabled(false)" />
                                                                                    <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                    <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                    <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2550q:btnFinalCopy" id="frm2550q:btnFinalCopy" onclick="submitForm();" />
                                                                                    <div id="msg" class="printButtonClass" style="display: none;"></div>
                                                                                @else
                                                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                    <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                                @endif  
                                                                            </div>
                                                                        </td>
                                                                        <div id="DummyTxt" style='display: none;'></div>
                                                                    </tr>
                                                                </tbody>
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
                        <td valign="top">
                            <img id="frm2550Q:bcsImg" src="{{ asset('images/BCS.jpg') }}" /></td>
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

        <!-- modal Sched1  -->
        <div id="modalSched1" class="printSignFooterClass aBox2550mSched1" style="width: 94%; display: none;padding: 10px; min-height: 500px; position: relative; top: 3%; left: 3%; right: auto; overflow-y: auto; overflow-x: hidden; background: #fff;" align="center">
            <br />
            <br />

            <table border="1" cellspacing="3" cellpadding="3" style="position: static; width: 100%" id="tblTax">
                <tr>
                    <td class="modalHeader" colspan="4">Schedule 1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Schedule of Sales/Receipts and Output Tax (Attach additional sheet, if necessary) </td>
                </tr>
                <tr class="modalColumnHeader text-center">
                    <td width='50%' align="center"><b>Industry Covered by VAT </b></td>
                    <td width='10%'>
                        <a href="#" id="btnSched1ATC" onclick="showModalAtc()">ATC</a>
                    </td>
                    <td width='20%'><b>Amount of Sales/Receipts For the Period </b></td>
                    <td width='20%'><b>Output Tax for the Period </b></td>

                </tr>
                <tr>
                    <td class="modalContent" colspan="4">
                        <table id="tblSched1Atc" cellspacing="3" cellpadding="3" width="100%">
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table style="position: static; width: 100%" border="1">
                <tr>
                    <td class="modalColumnHeader" width="60%" colspan="2">To Item 15A/B</td>
                    <td width="20%">
                        <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodaltxtTotal15A" name="txtmodaltxtTotal15A" size="20" value="0.00" disabled />
                    </td>
                    <td width="20%">
                        <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodaltxtTotal15B" name="txtmodaltxtTotal15B" size="20" value="0.00" disabled />
                    </td>
                </tr>
            </table>
            <br />
            <br />
            <div align="center">
                <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop1" style="width: 120px; height: 30px;" value="OK" onclick="getSched1Modal()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop" id="btnClearPop" style="width: 120px; height: 30px;" value="CLEAR" onclick="clearSched1Modal()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop" id="btnCancelPop" style="width: 120px; height: 30px;" value="CANCEL" onclick="cancelSched1Modal()" />
            </div>
            <br />
            <br />
        </div>

        <!-- modal Atc List  -->
        <div id="modalAtc" class="aBox2550mAtc" style="width: 70%; display: none; min-height: 500px; position: relative; top: 3%; left: 15%; right: auto; overflow-y: auto; overflow-x: hidden; background: #fff;" align="center">
            <br />
            <br />
            <table border="0" cellspacing="3" cellpadding="3" style="position: static; width: 100%">
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr class="modalColumnHeader" style="text-align: center;">
                    <td width="20%"><b>ATC </b></td>

                    <td width="80%"><b>INDUSTRIES COVERED BY VAT </b></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr />
                    </td>
                </tr>

            </table>

            <div style="height: 80%; overflow: auto; width: 90%">
                <table class="modalContent" id="tbllistAtcCode" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div align="center">
                <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop" style="width: 120px; height: 30px;" value="OK" onclick="getATCCode()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <br />
            <br />
        </div>

        <!-- modal Sched2  -->
        <div id="modalSched2" class="printSignFooterClass aBox2550mSched2" style="width: 94%;padding: 10px; display: none; min-height: 500px; position: relative; top: 3%; left: 3%; right: auto; overflow-y: auto; overflow-x: hidden; background: #fff;" align="center">
            <br />
            <br />

            <table border="1" cellspacing="3" cellpadding="3" width="100%">
                <tr class="modalHeader">
                    <td>Schedule 2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Purchases/Importation of Capital Goods (Aggregate Amount Not Exceeding P1Million)   </td>
                </tr>

                <tr>
                    <table border="1" cellspacing="3" cellpadding="3" width="100%" id="tblSched2">
                        <thead>
                            <tr class="modalColumnHeader">
                                <td width="4%">&nbsp;  </td>
                                <td width='20%' align="center"><b>Date Purchased </b></td>
                                <td width='30%' align="center"><b>Description </b></td>
                                <td width='20%' align="center"><b>Amount (Net of VAT) </b></td>
                                <td width='20%' align="center"><b>Input Tax </b></td>
                            </tr>
                        </thead>
                        <tbody id="tbodyllistSched2">
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </tr>
                <tr>
                    <table border="1" cellspacing="3" cellpadding="3" width="100%" id="tblSched2">
                        <tr>
                            <td colspan='3' class="modalColumnHeader" align="left" width='54%'>&nbsp;&nbsp;&nbsp;&nbsp;Total (To Item 21C/D)</td>
                            <td width='20%' align="center">
                                <input type="text" disabled id="txtmodalTotalAmt" name="txtmodalTotalAmt" style="text-align: right; background-color: rgb(220, 220, 220);" size="20" value="0.00" /></td>
                            <td width='20%' align="center">
                                <input type="text" disabled id="txtmodalTotalInputTax" name="txtmodalTotalInputTax" style="text-align: right; background-color: rgb(220, 220, 220);" size="20" value="0.00" /></td>
                        </tr>
                    </table>
                </tr>
            </table>

            <br />
            <br />
            <div align="center">
                <td width='20%' align="center">
                    <input type='button' class="printButtonClass" id="btnAdd1" value='Add' onclick="addlistSched2()" /></td>
                <td width='20%' align="center">
                    <input type='button' class="printButtonClass" id="btnDelete1" value='Delete' onclick="deletelistSched2()" /></td>
                <br />
                <br />
                <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop2" style="width: 120px; height: 30px;" value="OK" onclick="getSched2Modal()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop2" id="btnClearPop2" style="width: 120px; height: 30px;" value="CLEAR" onclick="clearSched2Modal()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop2" id="btnCancelPop2" style="width: 120px; height: 30px;" value="CANCEL" onclick="cancelSched2Modal()" />
            </div>
            <br />
            <br />
        </div>

        <!-- modal Sched3  -->
       <div id="modalSched3" class="printSignFooterClass aBox2550mSched3" style="width: 100%;padding: 10px; display: none; min-height: 500px; position: relative; top: 3%; right: auto; overflow-y: auto; overflow-x: hidden; background: #fff;" align="center">
            <br />
            <br />

            <div style="width: 100%" align="center">
                <table border="1" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td>
                          
                            <table border="0" cellspacing="3" cellpadding="3" width="100%" align="center">
                                <tr class="modalHeader">
                                    <td>Schedule 3 Purchases/Importation of Capital Goods (Aggregate Amount Exceeds P1 Million)</td>
                                </tr>
                                <tr class="modalColumnHeader">
                                    <td align="left">A) Purchases/Importations This Period</td>
                                </tr>
                            </table>
                            <table border="0" cellspacing="3" cellpadding="3" width="100%" id="tblSched3A" align="center">
                                <thead>
                                    <tr class="modalColumnHeader">
                                        <td width='4%'>&nbsp;</td>
                                        <td width='12%' align="center"><b>Date Purchased</b></td>
                                        <td width='12%' align="center"><b>Description</b></td>
                                        <td width='12%' align="center"><b>Amount (Net of VAT)</b></td>
                                        <td width='12%' align="center"><b>Input Tax (C*TaxRate)</b></td>
                                        <td width='12%' align="center"><b>Est. Life (in months)</b></td>
                                        <td width='12%' align="center"><b>Recognized Life (In Months)Useful life or 60 mos. (whichever is shorter)</b></td>
                                        <td width='12%' align="center"><b>Allowable Input Tax for the Period (D) divided by (F)</b></td>
                                        <td width='12%' align="center"><b>Balance of Input Tax to be carried to Next Period (D) less (G)</b></td>
                                    </tr>
                                    <tr class="modalColumnHeader">
                                        <td width='4%'>&nbsp;</td>
                                        <td width='12%' align="center">A</td>
                                        <td width='12%' align="center">B</td>
                                        <td width='12%' align="center">C</td>
                                        <td width='12%' align="center">D</td>
                                        <td width='12%' align="center">E</td>
                                        <td width='12%' align="center">F</td>
                                        <td width='12%' align="center">G</td>
                                        <td width='12%' align="center">H</td>
                                    </tr>
                                </thead>
                                <tbody id="tbodyllistSched3A">
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="modalColumnHeader" colspan="3" align="left">Total (To Item 21C/D)</td>
                                        <td width='12%' align="center">
                                            <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodalTotalAmountSched3" name="txtmodalTotalAmountSched3" size="20" value="0.00" /></td>
                                        <td width='12%' align="center">
                                            <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodalTotalInputTaxSched3" name="txtmodalTotalInputTaxSched3" size="20" value="0.00" /></td>
                                        <td colspan="3">&nbsp;</td>
                                        <!--<td width="12%" align="center"><input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodalTotalInputDdivFTaxSched" size="20" value="0.00"/></td> JTrac767-->
                                        <td width='12%' align="center">
                                            <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodalTotalBalanceSched3A" name="txtmodalTotalBalanceSched3A" size="20" value="0.00" /></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div align="center">

                                <input type='button' class="printButtonClass" class="printButtonClass" id="btnAdd2" value='Add' onclick="addlistSched3A()" />
                                <input type='button' class="printButtonClass" id="btnDelete2" value='Delete' onclick="deletelistSched3A()" />

                            </div>
                            
                            <table border="0" cellspacing="3" cellpadding="3" width="100%" align="center">
                                <tr class="modalColumnHeader">
                                    <td align="left">B) Purchases/Importations Previous Period</td>
                                </tr>
                            </table>
                            <table border="0" cellspacing="3" cellpadding="3" width="100%" id="tblSched3B" align="center">
                                <thead>
                                    <tr class="modalColumnHeader">
                                        <td width='4%'>&nbsp;</td>
                                        <td width='12%' align="center"><b>Date Purchased</b></td>
                                        <td width='12%' align="center"><b>Description</b></td>
                                        <td width='12%' align="center"><b>Amount (Net of VAT)</b></td>
                                        <td width='12%' align="center"><b>Balance of Input Tax from previous period</b></td>
                                        <td width='12%' align="center"><b>Est. Life (in months)</b></td>
                                        <td width='12%' align="center"><b>Recognized Life (In Months)Useful life or 60 mos. (whichever is shorter)</b></td>
                                        <td width='12%' align="center"><b>Allowable Input Tax for the Period (D) divided by (F)</b></td>
                                        <td width='12%' align="center"><b>Balance of Input Tax to be carried to Next Period (D) less (G)</b></td>
                                    </tr>
                                    <tr class="modalColumnHeader">
                                        <td width='4%'>&nbsp;</td>
                                        <td width='12%' align="center">A</td>
                                        <td width='12%' align="center">B</td>
                                        <td width='12%' align="center">C</td>
                                        <td width='12%' align="center">D</td>
                                        <td width='12%' align="center">E</td>
                                        <td width='12%' align="center">F</td>
                                        <td width='12%' align="center">G</td>
                                        <td width='12%' align="center">H</td>
                                    </tr>
                                </thead>
                                <tbody id="tbodyllistSched3B">
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="modalColumnHeader" colspan="8" align="left">Total</td>
                                        <td>
                                            <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodalTotalBalanceSched3B" name="txtmodalTotalBalanceSched3B" size="20" value="0.00" />
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div align="center">
                                <!--<br />-->
                                <input type='button' class="printButtonClass" id="btnAdd3" value='Add' onclick="addlistSched3B()" />
                                <input type='button' class="printButtonClass" id="btnDelete3" value='Delete' onclick="deletelistSched3B()" />
                                <!--<br />-->
                            </div>
                            <table border="0" cellspacing="3" cellpadding="3" width="100%" align="center">
                                <!--<br />-->
                                <tr>
                                    <td class="modalColumnHeader" align="left" width="88%">C) Total Input Tax Deferred for future period from current and previous purchase (To item 23A)
                            <br />
                                        * - D divided by F multiplied by Number of months in use during the quarter
                                    </td>
                                    <td align="center" width="12%">
                                        <input type='text' style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodalTotalInputTax20ASched3" name="txtmodalTotalInputTax20ASched3" size="20" value='0.00' /></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <br />
            <br />
            <br />
            <br />
            <div align="center">
                <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop3" style="width: 120px; height: 30px;" value="OK" onclick="getSched3Modal()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop3" id="btnClearPop3" style="width: 120px; height: 30px;" value="CLEAR" onclick="clearSched3Modal()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop3" id="btnCancelPop3" style="width: 120px; height: 30px;" value="CANCEL" onclick="cancelSched3Modal()" />
                <br />
                <br />
            </div>
        </div>

        <!-- modal Sched4  -->
        <div id="modalSched4" class="printSignFooterClass aBox2550mSched4" style="width: 94%; display: none; min-height: 500px; position: relative;padding: 10px; top: 3%; left: 3%; right: auto; overflow-y: auto; overflow-x: hidden; background: #fff;" align="center">
            <br />
            <br />
           
            <div style="width: 90%">
                <table border="1" cellspacing="3" cellpadding="3" width="90%" id="tblTax">
                    <tr class="modalHeader">
                        <td colspan="5">Schedule 4 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Input Tax Attributable Sale to Government   </td>
                    </tr>
                    <tr>
                        <td class="modalContent" rowspan="2" colspan="4" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Input Tax directly attributable to sale to government 
                            <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Add: Ratable portion of Input Tax not directly attributable to any activity:
                        </td>
                        <td align="center">
                            <input type="text" style="text-align: right" id="txtinputtaxSched4" name="txtinputtaxSched4" size="20" value="0.00" onblur="round(this,2);computeInputTaxSched4()" onkeypress="return numbersonly(this, event)" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center">&nbsp; </td>
                    </tr>
                    <tr class="modalContent">
                        <td align="right">Taxable sales to government </td>
                        <td>
                            <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtTaxableSaleSched4" name="txtTaxableSaleSched4" size="20" value="0.00" />
                        </td>
                        <td rowspan="2">X Amount of Input Tax not
                            <br />
                            directly attributable   </td>
                        <td rowspan="2">
                            <input type="text" style="text-align: right;" id="txtInputTaxnotDirectSched4" name="txtInputTaxnotDirectSched4" size="20" value="0.00" onblur="round(this,2);computeInputTaxSched4()" onkeypress="return numbersonly(this, event)" />
                        </td>
                        <td rowspan="2">
                            <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtTotalInputTaxnotDirectSched4" name="txtTotalInputTaxnotDirectSched4" size="20" value="0.00" />
                        </td>
                    </tr>
                    <tr class="modalContent">
                        <td align="right">----------------------------------------------
                            <br />
                            Total Sales             </td>
                        <td>
                            <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtTotalSaleSched4" name="txtTotalSaleSched4" size="20" value="0.00" />
                        </td>
                    </tr>
                    <tr>
                        <td class="modalContent" colspan="4" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Total Input Tax attributable to sale to government</td>
                        <td>
                            <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtTotalInputSaletoGovernmentSched4" name="txtTotalInputSaletoGovernmentSched4" size="20" value="0.00" />
                        </td>
                    </tr>
                    <tr>
                        <td class="modalContent" colspan="4" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Less: Standard Input Tax to sale to government</td>
                        <td>
                            <input type="text" style="text-align: right" id="txtlessStdTaxSched4" name="txtlessStdTaxSched4" size="20" value="0.00" onblur="round(this,2);computeInputTaxSched4()" onkeypress="return numbersonly(this, event)" />
                        </td>
                    </tr>
                    <tr>
                        <td class="modalContent" colspan="4" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Input Tax on Sale to Govt. closed to expense (To Item 20B)</td>
                        <td>
                            <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtTotal20BSched4" name="txtTotal20BSched4" size="20" value="0.00" />
                        </td>
                    </tr>
                </table>

            </div>
            <br />
            <br />
            <div align="center">
                <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop4" style="width: 120px; height: 30px;" value="OK" onclick="getSched4Modal()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop4" id="btnClearPop4" style="width: 120px; height: 30px;" value="CLEAR" onclick="clearSched4Modal()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop4" id="btnCancelPop4" style="width: 120px; height: 30px;" value="CANCEL" onclick="cancelSched4Modal()" />
            </div>
            <br />
            <br />
        </div>

        <!-- modal Sched5  -->
        <div id="modalSched5" class="printSignFooterClass aBox2550mSched5" style="width: 94%; display: none; min-height: 500px; position: relative;padding: 10px; top: 3%; left: 3%; right: auto; overflow-y: auto; overflow-x: hidden; background: #fff;" align="center">
            <br />
            <br />
            <div style="width: 90%">
                <table border="1" cellspacing="3" cellpadding="3" width="90%" id="tblTax">
                    <tr class="modalHeader">
                        <td colspan="6">Schedule 5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Input Tax Attributable to Exempt Sales   </td>
                    </tr>
                    <tr class="modalContent">
                        <td rowspan="2" colspan="5" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Input Tax directly attributable to exempt sale  
                            <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Add: Ratable portion of Input Tax not directly attributable to any activity:
                        </td>
                        <td align="center">
                            <input type="text" style="text-align: right" id="txtinputtaxSched5" name="txtinputtaxSched5" size="20" value="0.00" onblur="round(this,2);computeInputTaxSched5()" onkeypress="return numbersonly(this, event)" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center">&nbsp; </td>
                    </tr>
                    <tr>
                        <td class="modalContent">Total Sales  </td>
                        <td>
                            <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtTotSaleSched5" name="txtTotSaleSched5" size="20" value="0.00" />
                        </td>
                        <td>&nbsp; </td>
                    </tr>
                    <tr class="modalContent">
                        <td colspan="2">Total Exempt sale 
                            <br />
                            -----------------------------------------X  </td>
                        <td rowspan="2">Amount of Input Tax not directly attributable   </td>
                        <td rowspan="2">
                            <input type="text" style="text-align: right" id="txtAmountInputnotDirectSched5" name="txtAmountInputnotDirectSched5" size="20" value="0.00" onblur="round(this,2);computeInputTaxSched5()" onkeypress="return numbersonly(this, event)" />
                        </td>
                        <td rowspan="2">
                            <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtProductnotDirectSched5" name="txtProductnotDirectSched5" size="20" value="0.00" />
                        </td>
                        <td></td>
                    </tr>
                    <tr class="modalContent">
                        <td>Total Sales  
                            <br />
                        </td>
                        <td>
                            <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtSumTotalSaleSched5" name="txtSumTotalSaleSched5" size="20" value="0.00" />
                        </td>
                    </tr>
                    <tr class="modalContent">
                        <td colspan="5">Total input tax attributable to exempt sale (To item 20 C)
                        </td>
                        <td>
                            <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtTotal20CSched5" name="txtTotal20CSched5" size="20" value="0.00" />
                        </td>
                    </tr>
                </table>
            </div>
            <br />
            <br />
            <div align="center">
                <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop5" style="width: 120px; height: 30px;" value="OK" onclick="getSched5Modal()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop5" id="btnClearPop5" style="width: 120px; height: 30px;" value="CLEAR" onclick="clearSched5Modal()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            
			<input type="button" class="printButtonClass" name="btnCancelPop5" id="btnCancelPop5" style="width: 120px; height: 30px;" value="CANCEL" onclick="cancelSched5Modal()" />
            </div>
            <br />
            <br />
        </div>

        <!-- modal Sched6  -->
        <div id="modalSched6" class="printSignFooterClass aBox2550qSched6" style="width: 94%; display: none; min-height: 500px; position: relative; padding: 10px; top: 3%; left: 3%; right: auto; overflow-y: auto; overflow-x: hidden; background: #fff;" align="center">
            <br />
            <br />
            <table border="1" width="100%">
                <tr class="modalHeader">
                    <td>Schedule 6 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Tax Withheld Claimed as Tax Credit </td>
                </tr>
            </table>
            <table border="1" cellspacing="0" cellpadding="0" width="100%" id="tblSched6">
                <thead>
                    <tr class="modalColumnHeader">
                        <td width='4%'>&nbsp;  </td>
                        <td width='16%' align='center'><b>Period Covered </b></td>
                        <td width='16%' align='center'><b>Name of Withholding Agent </b></td>
                        <td width='16%' align='center'><b>Income Payment </b></td>
                        <td width='16%' align='center'><b>Total Tax Withheld</b></td>
                        <td width='16%' align='center'><b>Previous 2 mos</b></td>
                        <td width='16%' align='center'><b>Applied Current mo.</b></td>
                    </tr>
                </thead>
                <tbody id="tbodyllistSched6">
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table cellspacing="3" cellpadding="3" width="100%" border="1">
                <tr>
                    <td width="66%" class="modalColumnHeader" align="left" colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;Total (To Item 26B)</td>
                    <td width="17%" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodalTotal23A" name="txtmodalTotal23A" value="0.00" disabled style="width: 150px" />
                    </td>
                    <td width="17%" align="center">&nbsp;&nbsp;<input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodalTotalSched6AppliedCurrent" name="txtmodalTotalSched6AppliedCurrent" value="0.00" disabled style="width: 150px" />
                    </td>
                </tr>
            </table>
            <div>
                <input type='button' class="printButtonClass" id="btnAdd4" value='Add' onclick="addlistSched6()" />
                <input type='button' class="printButtonClass" id="btnDelete4" value='Delete' onclick="deletelistSched6()" />
            </div>
            <br />
            <br />
            <div align="center">
                <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop6" style="width: 120px; height: 30px;" value="OK" onclick="getSched6Modal()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop6" id="btnClearPop6" style="width: 120px; height: 30px;" value="CLEAR" onclick="clearSched6Modal()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop6" id="btnCancelPop6" style="width: 120px; height: 30px;" value="CANCEL" onclick="cancelSched6Modal()" />
            </div>
            <br />
            <br />
        </div>

        <!-- modal Sched7  -->
        <div id="modalSched7" class="printSignFooterClass aBox2550qSched7" style="width: 94%; display: none; min-height: 500px; position: relative;padding: 10px; top: 3%; left: 3%; right: auto; overflow-y: auto; overflow-x: hidden; background: #fff;" align="center">
            <br />
            <br />
            <table border="1" width="100%" align="center">
                <tr class="modalHeader">
                    <td>Schedule 7 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Schedule of Advance Payment </td>
                </tr>
            </table>
            <table border="1" width="100%" id="tblSched7">
                <thead>
                    <tr class="modalColumnHeader">
                        <td width='2%'>&nbsp;  </td>
                        <td width='14%' align='center'><b>Period Covered </b></td>
                        <td width='14%' align='center'><b>Name of Miller </b></td>
                        <td width='14%' align='center'><b>Name of Tax Payer </b></td>
                        <td width='14%' align='center'><b>Official Reciept Number</b></td>
                        <td width='14%' align='center'><b>Amount Paid</b></td>
                        <td width='14%' align='center'><b>Previous 2 mos</b></td>
                        <td width='14%' align='center'><b>Applied Current mo.</b></td>
                    </tr>
                </thead>
                <tbody id="tbodyllistSched7">
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table border="1" width="100%">
                <tr>
                    <td width="60%" class="modalColumnHeader" align="left" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;Total (To Item 26C)</td>
                    <td width="40%" align="right">
                        <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodalTotal23B" name="txtmodalTotal23B" value="0.00" disabled style="width: 150px" />&nbsp;&nbsp;
                    <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodalTotalSched7AppliedCurrent" name="txtmodalTotalSched7AppliedCurrent" value="0.00" disabled style="width: 150px" />&nbsp;</td>
                </tr>
            </table>
            <div align="center">
                <input type='button' class="printButtonClass" id="btnAdd5" value='Add' onclick="addlistSched7()" />
                <input type='button' class="printButtonClass" id="btnDelete5" value='Delete' onclick="deletelistSched7()" />
                <br />
                <br />
                <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop7" style="width: 120px; height: 30px;" value="OK" onclick="getSched7Modal()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop7" id="btnClearPop7" style="width: 120px; height: 30px;" value="CLEAR" onclick="clearSched7Modal()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop7" id="btnCancelPop7" style="width: 120px; height: 30px;" value="CANCEL" onclick="cancelSched7Modal()" />
            </div>
            <br />
            <br />
        </div>
        <!-- modal Sched8  -->
        <div id="modalSched8" class="printSignFooterClass aBox2550qSched8" style="width: 94%; display: none; min-height: 500px; position: relative;padding: 10px; top: 3%; left: 3%; right: auto; overflow-y: auto; overflow-x: hidden; background: #fff;" align="center">
            <br />
            <br />
            <table border="1" width="100%" align="center">
                <tr class="modalHeader">
                    <td>Schedule 8 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                VAT Withheld on Sales to Government </td>
                </tr>
            </table>

            <table border="1" width="100%" id="tblSched8">
                <thead>
                    <tr class="modalColumnHeader">
                        <td width="4%">&nbsp;  </td>
                        <td width='16%' align="center"><b>Period Covered </b></td>
                        <td width='16%' align="center"><b>Name of Withholding Agent </b></td>
                        <td width='16%' align="center"><b>Income Payment </b></td>
                        <td width='16%' align="center"><b>Total Tax Withheld</b></td>
                        <td width='16%' align="center"><b>Previous 2 mos</b></td>
                        <td width='16%' align="center"><b>Applied Current mo.</b></td>
                    </tr>
                </thead>
                <tbody id="tbodyllistSched8">
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" border="1">
                <tr>
                    <td width="68%" class="modalColumnHeader" align="left" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;Total (To Item 26D)</td>
                    <td width="16%">
                        <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodalTotal23C" name="txtmodalTotal23C" value="0.00" disabled style="width: 150px" />
                    </td>
                    <td width="16%">
                        <input type="text" style="text-align: right; background-color: rgb(220, 220, 220);" id="txtmodalTotalSched8AppliedCurrent" name="txtmodalTotalSched8AppliedCurrent" value="0.00" disabled style="width: 150px" />
                    </td>
                </tr>
            </table>
            <div>
                <input type='button' class="printButtonClass" id="btnAdd6" value='Add' onclick="addlistSched8()" />
                <input type='button' class="printButtonClass" id="btnDelete6" value='Delete' onclick="deletelistSched8()" />
            </div>
            <br />
            <br />
            <div align="center">
                <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop8" style="width: 120px; height: 30px;" value="OK" onclick="getSched8Modal()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop8" id="btnClearPop8" style="width: 120px; height: 30px;" value="CLEAR" onclick="clearSched8Modal()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop8" id="btnCancelPop8" style="width: 120px; height: 30px;" value="CANCEL" onclick="cancelSched8Modal()" />
            </div>
            <br />
            <br />
        </div>

        <div id="hiddenEnroll" style="display: none;">
            <input id="txtFinalFlag" class="FinalFlag" name="txtFinalFlag" type="text" onblur="" onkeypress="" value="0" maxlength="60" />
            <input id="txtEnroll" name="txtEnroll" type="text" onblur="" onkeypress="" value="N" maxlength="60" />
        </div>
        
        <div id="hiddenEmail" style="display: none;">
            <input id="txtEmail" class="emailClass" value="{{$company->email_address}}" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60" />
        </div>
        <!-- Send Email -->
        
    </form>
    <textarea id='responsetext' style="display: none;"></textarea>
    <!-- XML retrieval -->
    <div style="display: none;">
        <xmp id='xmlFormat'>	
            </xmp>
        <!--format the doc -->
        <span id='xmlClose'>All Rights Reserved BIR 2012.</span>
    </div>
    <div id="responseBG" style="display: none;">
        <!--loaded files render here-->
    </div>
    <div id="response" style="display: none;">
        <!--loaded files render here-->
    </div>
    <div id="responseATC" style="display: none;">
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
	
	var fileName = "";
	var existingXMLFileName = "";
	
	var gIsReadOnly = false;
	
	/*----------------------------------*/
    var d=document,XMLBGFile='',data='',XMLFile='', XMLATCFile='',msg = d.getElementById('msg'),flag=true,flag2=true,flag3A=true,flag3B=true,flag6=true,flag7=true,flag8=true;
	var loader=d.getElementById('loader');
	/*----------------------------------*/	
	
    var viewUploadFlag = false;
    var tempRowSizeSched1 = 0;
    var tempAtcCode = new Array();
    var tempAmtSales = new Array();
    var tempOutputTax = new Array();

    var tempRowSizeSched2 = 0;
    var tempTempPurDate = new Array();
    var tempDescription = new Array();
    var tempPurAmt = new Array();
    var tempInputTax = new Array();

    var tempRowSizeSched3a = 0;
    var tempTempPeriodCovered = new Array();
    var description = new Array();
    var purAmt = new Array();
    var inputTax = new Array();
    var estMo = new Array();
    var recMo = new Array();
    var allowInput = new Array();
    var balInputTax = new Array();
    var tempPartATotalBal = new Array();

    var tempRowSizeSched3b = 0;
    var tempTempPeriodCoveredB = new Array();
    var tempDescriptionB = new Array();
    var tempPurAmtB = new Array();
    var tempInputTaxB = new Array();
    var tempEstMoB = new Array();
    var tempRecMoB = new Array();
    var tempAllowInputB = new Array();
    var tempBalInputTaxB = new Array();
    var tempTempPartBTotalBalB = new Array();

    var tempDirInputTax = "0.00";
    var tempInputNotAttrib = "0.00";
    var tempRatInputTax = "0.00";
    var tempTotalInputTaxSched4 = "0.00";
    var tempStanInputTax = "0.00";
    var tempInputSaleExp = "0.00";

    var inputTaxExmpt = d.getElementById("txtinputtaxSched5").value = "0.00";
    var inputNotAttribSched5 = d.getElementById("txtAmountInputnotDirectSched5").value = "0.00";
    var ratInputTaxSched5 = d.getElementById("txtProductnotDirectSched5").value = "0.00";
    var totalInputExmpt = d.getElementById("txtTotal20CSched5").value = "0.00";

    var tempRowSizeSched6 = 0;
    var tempTempPeriodCovered = new Array();
    var tempAgentNm = new Array();
    var tempIncPaymnt = new Array();
    var totalTaxWithld = new Array();
    var appPrev = new Array();
    var appCurr = new Array();
    var sched7TotalPrev = new Array();
    var sched7TotalCurr = new Array();

    var tempRowSizeSched7 = 0;
    var tempTempPeriodCovered7 = new Array();
    var tempMillerNm7 = new Array();
    var tempAgentNm7 = new Array();
    var tempOrNumber7 = new Array();
    var tempAmtPaid7 = new Array();
    var tempAppPrev7 = new Array();
    var tempAppCurr7 = new Array();
    var tempSched8TotalPrev7 = new Array();
    var tempSched8TotalCurr7 = new Array();

    var tempRowSizeSched8 = 0;
    var tempTempPeriodCovered8 = new Array();
    var tempAgentNm8 = new Array();
    var tempIncPaymnt8 = new Array();
    var tempTotalTaxWithld8 = new Array();
    var tempAppPrev8 = new Array();
    var tempAppCurr8 = new Array();
    var tempSched9TotalPrev8 = new Array();
    var tempSched9TotalCurr8 = new Array();

	var atcList = new Array();
	var atcCount=0;
	
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
	var globalEmail = "";
    var isReload = false;
    setTimeout("sleeptime()", 300);

	
	function sleeptime()
    {
        isReload = true;
        init();
		
		var xmlFileName = document.getElementById('file_name').value; 
        fileName = xmlFileName;
		if (fileName != null && fileName.indexOf('.xml') > -1) {
			var tin = fileName.split("/")[1].split("-");
			
			loadXML(fileName); 
			
			d.getElementById('frm2550q:RtnMonth').disabled = true;
			d.getElementById('frm2550q:txtYear').disabled = true;
			
			existingXMLFileName = fileName;
			if (gIsReadOnly) { 
			window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false;",1000); 
			}
			//loadXMLWellFormed("savefile/2550Q-wellformed.xml");			
		} else {
			window.setTimeout("$('#loader').hide('blind');",100);
		}
		if ( $('#printMenu').css('display') != 'none' ) {	
			$('#printMenu').hide('blind');
		}
		document.getElementById('frm2550q:txtTIN1').disabled = true; document.getElementById('frm2550q:txtTIN2').disabled = true; document.getElementById('frm2550q:txtTIN3').disabled = true; document.getElementById('frm2550q:txtBranchCode').disabled = true;
	    window.setTimeout("checkFinalCopyBtn('2550Q'); isReload = false;", 2000);
   }
	
	function rdoPropertyJS(rdoCode, description) 
	{
	 this.rdoCode=rdoCode;
	 this.description=description;
	}
	 
	var rdoList = new Array();


    function toggleDisabled(el) {
        try {
            el.disabled = true;
        }
        catch(e){
        }
        if (el.childNodes && el.childNodes.length > 0) {
            for (var x = 0; x < el.childNodes.length; x++) {
                toggleDisabled(el.childNodes[x]);
            }
        }
    }

    function toggleAllDisabled() {
        toggleDisabled(d.getElementById("modalSched1"));
        toggleDisabled(d.getElementById("modalSched2"));
        toggleDisabled(d.getElementById("modalSched3"));
        toggleDisabled(d.getElementById("modalSched4"));
        toggleDisabled(d.getElementById("modalSched5"));
        toggleDisabled(d.getElementById("modalSched6"));
        toggleDisabled(d.getElementById("modalSched7"));
        toggleDisabled(d.getElementById("modalSched8"));
    }

    function init()
    {
        var date = new Date();
		var month = new Date();
		var year = new Date();
		
		d.getElementById('frm2550q:RtnMonth').selectedIndex = month.getMonth() + 1; 
		d.getElementById('frm2550q:txtYear').value = date.getFullYear();
		
		d.getElementById('frm2550q:optAmend:_1').disabled = false;
        d.getElementById('frm2550q:optAmend:_2').disabled = false;
        if( d.getElementById('frm2550q:OptShortPrd2').checked ) {
            d.getElementById('frm2550q:RtnMonth').disabled = false;
        }

        d.getElementById('frm2550q:RtnPeriodFrom').disabled = true;
        d.getElementById('frm2550q:RtnPeriodTo').disabled = true;
        d.getElementById('frm2550q:AmendedRtnY').disabled = false;
        d.getElementById('frm2550q:AmendedRtnN').disabled = false;
		
		d.getElementById('frm2550q:optAmend:_1').checked = true;
        d.getElementById('frm2550q:optAmend:_1').onclick();
		
        if(d.getElementById('frm2550q:OptTreaty2').checked ) {
            d.getElementById('frm2550q:lstTaxTreaty').disabled = true;
        }
        if( d.getElementById('frm2550q:OptTreaty1').checked ) {
            d.getElementById('frm2550q:OptQuarter1').disabled = true;
            d.getElementById('frm2550q:OptQuarter2').disabled = true;
            d.getElementById('frm2550q:OptQuarter3').disabled = true;
            d.getElementById('frm2550q:OptQuarter4').disabled = true;
        }
        d.getElementById('frm2550q:txtTax15A').disabled = true;
        d.getElementById('frm2550q:txtTax15B').disabled = true;
        d.getElementById('frm2550q:txtTax19A').disabled = true;
        d.getElementById('frm2550q:txtTax19B').disabled = true;
        d.getElementById('frm2550q:txtTax20F').disabled = true;
        d.getElementById('frm2550q:txtTax21A').disabled = true;
        d.getElementById('frm2550q:txtTax21B').disabled = true;
        d.getElementById('frm2550q:txtTax21C').disabled = true;
        d.getElementById('frm2550q:txtTax21D').disabled = true;
        d.getElementById('frm2550q:txtTax21P').disabled = true;
        d.getElementById('frm2550q:txtTax22').disabled = true;
        d.getElementById('frm2550q:txtTax23A').disabled = true;
        d.getElementById('frm2550q:txtTax23A').disabled = true;
        d.getElementById('frm2550q:txtTax23B').disabled = true;
        d.getElementById('frm2550q:txtTax23C').disabled = true;
        d.getElementById('frm2550q:txtTax23F').disabled = true;
        d.getElementById('frm2550q:txtTax24').disabled = true;
        d.getElementById('frm2550q:txtTax25').disabled = true;
        d.getElementById('frm2550q:txtTax26B').disabled = true;
        d.getElementById('frm2550q:txtTax26C').disabled = true;
        d.getElementById('frm2550q:txtTax26D').disabled = true;
        d.getElementById('frm2550q:txtTax26E').disabled = true;
        d.getElementById('frm2550q:txtTax26H').disabled = true;
        d.getElementById('frm2550q:txtTax27').disabled = true;
        d.getElementById('frm2550q:txtTax28A').disabled = false;
        d.getElementById('frm2550q:txtTax28B').disabled = false;
        d.getElementById('frm2550q:txtTax28C').disabled = false;
        d.getElementById('frm2550q:txtTax28D').disabled = true;
        d.getElementById('frm2550q:txtTax29').disabled = true;

        @if($action != 'view')
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2550q:cmdEdit').disabled = true;
		d.getElementById('frm2550q:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @endif
        
        $('#tbllistAtcCode').html("");
		$('#tblSched1Atc').html("");
		$('#tbodyllistSched2').html("");
		$('#tbodyllistSched3A').html("");
		$('#tbodyllistSched3B').html("");
		$('#tbodyllistSched6').html("");
		$('#tbodyllistSched7').html("");
		$('#tbodyllistSched8').html("");
		
		loadXMLATC('/xml/atcCodes.xml');
        ATCList();
        changeMonth();
	
    }
	
	
	/*--------------------------------------------------------------*/
	//Added By dgarfin
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
       	d.getElementById('responseATC').innerHTML=xmlHTTP.responseText;
       	loadATC();                       
                
        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
        }

	}	
	
	var atcCount=0;
	
	function loadATC() {
		var response = d.getElementById("responseATC");
		
		var atcCnt = String(response.innerHTML).split('atcCount=');
		atcCount = atcCnt[1]; 	
		var j = 0;
		
		for (var i = 1; i <= atcCount; i++) { 
			
			var atc = String(response.innerHTML).split('atc'+i+':');
			var atcStr = atc[1];		
			
			if (atcStr.indexOf('2550Q') >= 0) {
			    var atcValues = atcStr.split('~');				
				
				var formType = "2550Q";
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
			} else {		
				continue;
			}
		}					
	}	
	
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

	/*--------------------------------------------------------------*/		
	
	function setInputTextControl_HorizontalAlignment(id,align) {
		if (d.getElementById(id) != null) {
			d.getElementById(id).style.textAlign = "right";
		}
	}
	function setInputTextControl_NumberFormatter(id,limit,deci) {
		if (d.getElementById(id) != null) {
			d.getElementById(id).size = parseInt(limit);
			d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed( parseInt(deci) );		
		}
	}
	function setInputTextControl_NumberFormatterNonNegative(id,limit,deci) {
		if (d.getElementById(id) != null) {
			d.getElementById(id).size = parseInt(limit);
			d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed( parseInt(deci) );		
		}	
	}		
	
	function loadXMLWellFormed(loadWhere) {
		try {
			var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
			XMLFile = fsoXML.OpenTextFile(loadWhere,1);	

			if (XMLFile.AtEndOfStream)
				data = "";
			else {
				var response = d.getElementById('response'); //render file and write to hidden div
				response.innerHTML = XMLFile.ReadAll(); //remove XML tag
			}
			XMLFile.Close(); //alert( response.innerHTML ); //Debug				

			if (loadWhere != null && loadWhere != "") {
			
				loadWFData();	/*This will load data onto fields*/								
				
			if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
				gIsReadOnly = true;
			}
		
			if (gIsReadOnly) {
				d.getElementById('frm2550q:cmdValidate').disabled = true;
				d.getElementById('btnSave').disabled = true;
			}

				
				/*-------------Schedule 1 : Find Instances of Dynamic Rows within the XML and add to modal-----------*/			
				getATCCode();					
				window.setTimeout("loadWFDataWithATC();",300);					
				window.setTimeout("loadWFData();",410);
				window.setTimeout("loadWFDataATCRow();getSched1Modal();",450); //flag=true;			
				/*------------- modalSched2 -----------*/
				flag2=false;
				var count=0;
				var responses = d.getElementById('response').getElementsByTagName('*');
				var sPar = 'chxSched2'; 		
				
				do {
				    if (responses.item(count).tagName.indexOf('/') == -1 && responses.item(count).tagName.indexOf(sPar.toUpperCase()) != -1) {  	
						var temp = String(responses.item(count).tagName);
						temp = temp.substring(0,sPar.length+1); //substring to length of search param for index - check files
						temp = temp.substring(sPar.length,sPar.length+1); //get the last character for checking
						if ( !isNaN(temp) ) addlistSched2Reload(); //if last char is a number, add modal section
					} count++;
				} while (count!=responses.length);
				loadWFData();
				getSched2Modal();
				flag2=true;	
				
				/*--------------------------------------------------------------------------------------*/

				/*------------- modalSched3 -----------*/
				flag3A=false;
				var count3A=0;
				var responses3A = d.getElementById('response').getElementsByTagName('*');
				var sPar3A = 'txtAmt3A'; 					
				do {
					if (responses3A.item(count3A).tagName.indexOf('/') == -1 && responses3A.item(count3A).tagName.indexOf(sPar3A.toUpperCase()) != -1) { 
						var temp = String(responses3A.item(count3A).tagName);
						temp = temp.substring(0,sPar3A.length+1); //substring to length of search param for index - check files
						temp = temp.substring(sPar3A.length,sPar3A.length+1); //get the last character for checking
						if ( !isNaN(temp) ) addlistSched3AReload(); //if last char is a number, add modal section
					} count3A++;
				} while (count3A!=responses3A.length);
				
				flag3B=false;
				var count3B=0;
				var responses3B = d.getElementById('response').getElementsByTagName('*');
				var sPar3B = 'txtAmt3B'; 					
				do {
					if (responses3B.item(count3B).tagName.indexOf('/') == -1 && responses3B.item(count3B).tagName.indexOf(sPar3B.toUpperCase()) != -1) { 					
						var temp = String(responses3B.item(count3B).tagName);
						temp = temp.substring(0,sPar3B.length+1); //substring to length of search param for index - check files
						temp = temp.substring(sPar3B.length,sPar3B.length+1); //get the last character for checking
						if ( !isNaN(temp) ) addlistSched3BReload(); //if last char is a number, add modal section
					} count3B++;
				} while (count3B!=responses3B.length);					
				loadWFData();
				getSched3Modal();
				flag3A=true;
				flag3B=true;				
				/*--------------------------------------------------------------------------------------*/	

				/*------------- modalSched6 -----------*/
				flag6=false;
				var count6=0;
				var responses6 = d.getElementById('response').getElementsByTagName('*');
				var sPar6 = 'txtPeriodCovered'; 		
				
				do {
					if (responses6.item(count6).tagName.indexOf('/') == -1 && responses6.item(count6).tagName.indexOf(sPar6.toUpperCase()) != -1) { 					
						var temp = String(responses6.item(count6).tagName);
						temp = temp.substring(0,sPar6.length+1); //substring to length of search param for index - check files
						temp = temp.substring(sPar6.length,sPar6.length+1); //get the last character for checking
						if ( !isNaN(temp) ) addlistSched6Reload(); //if last char is a number, add modal section
					} count6++;
				} while (count6!=responses6.length);
				loadWFData();
				getSched6Modal();
				flag6=true;				
				/*--------------------------------------------------------------------------------------*/			
				
				/*------------- modalSched7 -----------*/
				flag7=false;
				var count7=0;
				var responses7 = d.getElementById('response').getElementsByTagName('*');
				var sPar7 = 'txtPeriodCoveredSch7'; 		
				
				do {
					if (responses7.item(count7).tagName.indexOf('/') == -1 && responses7.item(count7).tagName.indexOf(sPar7.toUpperCase()) != -1) { 								
						var temp = String(responses7.item(count7).tagName);
						temp = temp.substring(0,sPar7.length+1); //substring to length of search param for index - check files
						temp = temp.substring(sPar7.length,sPar7.length+1); //get the last character for checking
						if ( !isNaN(temp) ) addlistSched7Reload(); //if last char is a number, add modal section
					} count7++;
				} while (count7!=responses7.length);
				loadWFData();
				getSched7Modal();
				flag7=true;					
				/*--------------------------------------------------------------------------------------*/		

				/*------------- modalSched8 -----------*/
				flag8=false;
				var count8=0;
				var responses8 = d.getElementById('response').getElementsByTagName('*');
				var sPar8 = 'txtNameAgentSch8'; 		
				
				do {
					if (responses8.item(count8).tagName.indexOf('/') == -1 && responses8.item(count8).tagName.indexOf(sPar8.toUpperCase()) != -1) { 							
						var temp = String(responses8.item(count8).tagName);
						temp = temp.substring(0,sPar8.length+1); //substring to length of search param for index - check files
						temp = temp.substring(sPar8.length,sPar8.length+1); //get the last character for checking
						if ( !isNaN(temp) ) addlistSched8Reload(); //if last char is a number, add modal section
					} count8++;
				} while (count8!=responses8.length);
				loadWFData();
				getSched8Modal();
				flag8=true;	
				/*--------------------------------------------------------------------------------------*/				
				window.setTimeout("$('#loader').hide('blind');",2000);	
			}			
			
		} catch(e) {
			msg.innerHTML = ""; //"Save File not Found.";
		} //this will Alert File not Found if it doesn't exist	
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
        loadData();

        if (loadWhere != null && loadWhere != "") {
            
                loadData(); /*This will load data onto fields*/                             
                
                if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
                gIsReadOnly = true;
            }
        
            if (gIsReadOnly) {
                    d.getElementById('frm2550q:cmdValidate').disabled = true;
                    d.getElementById('btnSave').disabled = true;
            }

            /*-------------Schedule 1 : Find Instances of Dynamic Rows within the XML and add to modal-----------*/         
                getATCCode();
                window.setTimeout("loadDataWithATC();",300);                    
                window.setTimeout("loadData();",410);
                window.setTimeout("loadDataATCRow();getSched1Modal();",450); //flag=true;       
                
                /*------------- modalSched2 -----------*/
                flag2=false;
                var count=0;
                var responses = d.getElementById('response').getElementsByTagName('div');
                var sPar = 'chxSched2';         
                
                do {
                    if (responses.item(count).innerHTML.indexOf(sPar) != -1) {
                        var temp = String(responses.item(count).innerHTML);
                        temp = temp.substring(0,sPar.length+1); //substring to length of search param for index - check files
                        temp = temp.substring(sPar.length,sPar.length+1); //get the last character for checking
                        if ( !isNaN(temp) ) addlistSched2Reload(); //if last char is a number, add modal section
                    } count++;
                } while (count!=responses.length);
                window.setTimeout("loadData();getSched2Modal();flag2=true;",300);   

                flag3A=false;
                var count3A=0;
                var responses3A = d.getElementById('response').getElementsByTagName('div');
                var sPar3A = 'txtAmt3A';                    
                do {
                    if (responses3A.item(count3A).innerHTML.indexOf(sPar3A) != -1) {
                        var temp = String(responses3A.item(count3A).innerHTML);
                        temp = temp.substring(0,sPar3A.length+1); //substring to length of search param for index - check files
                        temp = temp.substring(sPar3A.length,sPar3A.length+1); //get the last character for checking
                        if ( !isNaN(temp) ) addlistSched3AReload(); //if last char is a number, add modal section
                    } count3A++;
                } while (count3A!=responses3A.length);
                
                flag3B=false;
                var count3B=0;
                var responses3B = d.getElementById('response').getElementsByTagName('div');
                var sPar3B = 'txtAmt3B';                    
                do {
                    if (responses3B.item(count3B).innerHTML.indexOf(sPar3B) != -1) {
                        var temp = String(responses3B.item(count3B).innerHTML);
                        temp = temp.substring(0,sPar3B.length+1); //substring to length of search param for index - check files
                        temp = temp.substring(sPar3B.length,sPar3B.length+1); //get the last character for checking
                        if ( !isNaN(temp) ) addlistSched3BReload(); //if last char is a number, add modal section
                    } count3B++;
                } while (count3B!=responses3B.length);
                window.setTimeout("loadData();getSched3Modal();flag3A=true;flag3B=true;",300);              
                //window.setTimeout("loadDataATCRow();",610);   
                /*--------------------------------------------------------------------------------------*/  

                /*------------- modalSched6 -----------*/
                flag6=false;
                var count6=0;
                var responses6 = d.getElementById('response').getElementsByTagName('div');
                var sPar6 = 'txtPeriodCovered';         
                
                do {
                    if (responses6.item(count6).innerHTML.indexOf(sPar6) != -1) {
                        var temp = String(responses6.item(count6).innerHTML);
                        temp = temp.substring(0,sPar6.length+1); //substring to length of search param for index - check files
                        temp = temp.substring(sPar6.length,sPar6.length+1); //get the last character for checking
                        if ( !isNaN(temp) ) addlistSched6Reload(); //if last char is a number, add modal section
                    } count6++;
                } while (count6!=responses6.length);
                window.setTimeout("loadData();getSched6Modal();flag6=true;",300);   
                /*--------------------------------------------------------------------------------------*/          
                
                /*------------- modalSched7 -----------*/
                flag7=false;
                var count7=0;
                var responses7 = d.getElementById('response').getElementsByTagName('div');
                var sPar7 = 'txtPeriodCoveredSch7';         
                
                do {
                    if (responses7.item(count7).innerHTML.indexOf(sPar7) != -1) {
                        var temp = String(responses7.item(count7).innerHTML);
                        temp = temp.substring(0,sPar7.length+1); //substring to length of search param for index - check files
                        temp = temp.substring(sPar7.length,sPar7.length+1); //get the last character for checking
                        if ( !isNaN(temp) ) addlistSched7Reload(); //if last char is a number, add modal section
                    } count7++;
                } while (count7!=responses7.length);
                window.setTimeout("loadData();getSched7Modal();flag7=true;",300);   
                /*--------------------------------------------------------------------------------------*/      

                /*------------- modalSched8 -----------*/
                flag8=false;
                var count8=0;
                var responses8 = d.getElementById('response').getElementsByTagName('div');
                var sPar8 = 'txtNameAgentSch8';         
                
                do {
                    if (responses8.item(count8).innerHTML.indexOf(sPar8) != -1) {
                        var temp = String(responses8.item(count8).innerHTML);
                        temp = temp.substring(0,sPar8.length+1); //substring to length of search param for index - check files
                        temp = temp.substring(sPar8.length,sPar8.length+1); //get the last character for checking
                        if ( !isNaN(temp) ) addlistSched8Reload(); //if last char is a number, add modal section
                    } count8++;
                } while (count8!=responses8.length);
                window.setTimeout("loadData();getSched8Modal();flag8=true;",300);   
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
					if (fieldVal != null && fieldVal.length > 1) {					
						elem[i].value = ''; 
						elem[i].selectedIndex = 0;
						if(elem[i].id == 'frm2550q:TaxPayer' || elem[i].id == 'frm2550q:txtLineBus' || elem[i].id == 'frm2550q:txtAddress'){
							elem[i].value = unescape(fieldVal[1]);
						}
						else{
							elem[i].value = fieldVal[1]; //all select-one and text values		 		
						}

					}
				}				
			}				
        }
	}	
	
	function loadWFDataATCRow() {
		/*This will load data onto fields*/
		var response = d.getElementById("response");		
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++) {
			
			if (elem[i].type != 'hidden' && elem[i].type != 'undefined') { 
				if (elem[i].type == 'text' || elem[i].type == 'select-one') {
					var fieldVal = String(response.innerHTML).split(elem[i].id+'>');
					if (fieldVal != null && fieldVal.length > 1) {					
						elem[i].value = ''; 
						elem[i].selectedIndex = 0;
						elem[i].value = fieldVal[1].substring(0, fieldVal[1].indexOf("</")); //all select-one and text values

					}
				}				
			}				
        }
		
	}	
	
	function loadWFDataWithATC() {
		var response = d.getElementById("response");
	
        var elem = d.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {

			if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {	//elem[i].type != 'button' &&  			
				if (elem[i].type == 'text' || elem[i].type == 'select-one') {
					var fieldVal = String(response.innerHTML).split(elem[i].id+'>'); 
					if (fieldVal != null && fieldVal.length > 1) {
						elem[i].value = fieldVal[1].substring(0, fieldVal[1].indexOf("</")); //all select-one and text values		  
					} 	
				}
				if (elem[i].type == 'radio') {
					var rdoVal = String(response.innerHTML).split(elem[i].id+'>');				
					if (rdoVal[1].substring(0, rdoVal[1].indexOf("</")) == 'true') {
						elem[i].checked = rdoVal[1].substring(0, rdoVal[1].indexOf("</"));
					}						
				}	
				if (elem[i].type == 'checkbox') {
					var chkboxVal = String(response.innerHTML).split(elem[i].id+'>');	

					if (chkboxVal[1].substring(0, chkboxVal[1].indexOf("</")) == 'true') {
						elem[i].checked = chkboxVal[1].substring(0, chkboxVal[1].indexOf("</"));						
					}	
				}			
			}

        } 			
	}
	
	function loadDataWithATC() {
		/*This will load data onto fields*/
		var response = d.getElementById("response");
		
        var elem = d.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
			
			if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {	//elem[i].type != 'button' &&  			
				if (elem[i].type == 'text' || elem[i].type == 'select-one') {
					var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
						if (fieldVal != null && fieldVal.length > 1) {
							if(elem[i].id == 'frm2550q:TaxPayer' || elem[i].id == 'frm2550q:txtLineBus' || elem[i].id == 'frm2550q:txtAddress'){
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
						//if (elem[i].id != 'frm2550q:OptShortPrd1' || ) { 
						//	elem[i].onclick();													
						//}
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
	
	function loadWFData() {
		/*This will load data onto fields*/
		var response = d.getElementById("response");

        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {

			try{
				if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {	//elem[i].type != 'button' &&  			
					if (elem[i].type == 'text' || elem[i].type == 'select-one') {
						var fieldVal = String(response.innerHTML).split(elem[i].id+'>'); 
						//elem[i].value = fieldVal[1]; //all select-one and text values		 		
						if (fieldVal != null && fieldVal.length > 1) {
							elem[i].value = fieldVal[1].substring(0, fieldVal[1].indexOf("</"));
						}		
					}

					if (elem[i].type == 'radio') {
						var rdoVal = String(response.innerHTML).split(elem[i].id+'>');				
						if (rdoVal[1].substring(0, rdoVal[1].indexOf("</")) == 'true') {
							elem[i].checked = rdoVal[1].substring(0, rdoVal[1].indexOf("</"));
						}					
					}	
					if (elem[i].type == 'checkbox') {
						var chkboxVal = String(response.innerHTML).split(elem[i].id+'>');				
						if (chkboxVal[1].substring(0, chkboxVal[1].indexOf("</")) == 'true') {
							elem[i].checked = chkboxVal[1].substring(0, chkboxVal[1].indexOf("</"));
						}						
					}
				
				}
			} catch(e) {
				//alert('exception thrown : e : '+e.description);
			}

        } 			
	}	
	
	function loadData() {
		/*This will load data onto fields*/
		var response = d.getElementById("response");

        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
			try{
				if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {	//elem[i].type != 'button' &&  			
					if (elem[i].type == 'text' || elem[i].type == 'select-one') {
						var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
						if(elem[i].id == 'frm2550q:TaxPayer' || elem[i].id == 'frm2550q:txtLineBus' || elem[i].id == 'frm2550q:txtAddress'){
							elem[i].value = unescape(fieldVal[1]);
						}
						else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
						}
						else{
							elem[i].value = fieldVal[1]; //all select-one and text values		 		
						}
					}
					if (elem[i].type == 'radio') {
						var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');				
						if (rdoVal[1] == 'true') {
							elem[i].checked = rdoVal[1];
							//if (elem[i].id != 'frm2550q:OptShortPrd1') {
							//	elem[i].onclick();
							//}
						}					
					}	
					if (elem[i].type == 'checkbox') {
						var chkboxVal = String( $("#response").html() ).split(elem[i].id+'=');				
						if (chkboxVal[1] == 'true') {
							elem[i].checked = chkboxVal[1];
						}					
					}
				
				}
			} catch(e) {
				//alert('exception thrown : e : '+e.description);
			}

        } 			
	if(d.getElementById('frm2550q:AmendedRtnY').checked){
			d.getElementById('frm2550q:txtTax26E').disabled = false
		}
		document.getElementById('txtEmail').value = globalEmail;
	}
	
	function isItAnAmendedReturn(xmlFile) {	
		if(d.getElementById('frm2550q:AmendedRtnY').checked) {
			return true;
		} else {
			return false;
		}		
	}
	
    function Schedule2()
    {
        this.txtDatePurchase = '';
        this.txtDescription = '';
        this.txtAmt = '0.00';
        this.txtInputTax = '0.00';
    }

    function Schedule3()
    {
        this.txtDatePurchase = '';
        this.txtDescription = '';
        this.txtAmt = '0.00';
        this.txtInputTax = '0.00';
        this.txtEstLife = '0';
        this.txtRecogLife = '1';
        this.txtAllowInputTax = '0.00';
        this.txtBalInputTax = '0.00';
    }

    function Schedule6and8()
    {
        this.txtPeriodCovered = '';
        this.txtNameAgent = '';
        this.txtIncomePayment = '0.00';
        this.txtTotalWithheld = '0.00';
        this.txtPrevious2Mo = '0.00';
        this.txtAppliedCurrMo = '0.00';
    }

    function Schedule7()
    {
        this.txtPeriodCovered = '';
        this.txtNameMiller = '';
        this.txtNameTaxPayer = '';
        this.txtORNumber = '';
        this.txtAmountPaid = '0.00';
        this.txtPrevious2Mo = '0.00';
        this.txtAppliedCurrMo = '0.00';
    }

    var sched2 = new Array();
    var sched2ToCommit = new Array();
    var sched3A = new Array();
    var sched3AToCommit = new Array();
    var sched3B = new Array();
    var sched3BToCommit = new Array();
    var sched6 = new Array();
    var sched6ToCommit = new Array();
    var sched7 = new Array();
    var sched7ToCommit = new Array();
    var sched8 = new Array();
    var sched8ToCommit = new Array();


    var ATCnameCode = new Array() ;
    var NaturePayment = new Array();

    function getPopulateATC()
    {

        ATCnameCode = new Array() ;
        NaturePayment = new Array() ;

        var atcSize = atcList.length;
        var i = 0;
        var j = 1;
        for(i = 0; i < atcSize; i++) {
            var atc = atcList[i];
            if(atc.formType == "2550Q") {
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j++] = atc.description;
            }
        }
    }

    function ATCList()
    {
   
        var i;
        getPopulateATC();
		$('#tbllistAtcCode').html("");
        for(i = 1 ; i < ATCnameCode.length ; i++  )
        {
            $('#tbllistAtcCode').html(  d.getElementById('tbllistAtcCode').innerHTML +
                "<tr class='atc' style='font-size: 11px;'><td width='20%' class='atc'> <input id='AtcCode"+i+"' name='AtcCode"+i+"' type='checkbox' value='"+ATCnameCode[i]+"' /> "+ATCnameCode[i]+ " </td> <td align='left' width='80%' class='atc atcNames' id='AtcNaturePayment"+i+"' >"+ NaturePayment[i]+ " </td> </tr>");
        }
    }

    function enableSelTreaty()
    {
        d.getElementById('frm2550q:lstTaxTreaty').disabled = false;
        d.getElementById('frm2550q:lstTaxTreaty').selectedIndex = 1;

    }

    function disableSelTreaty()
    {
        d.getElementById('frm2550q:lstTaxTreaty').disabled = true;
        d.getElementById('frm2550q:lstTaxTreaty').selectedIndex = 0;
    }

    function blockletter(e)
    {
        var number = parseFloat(e.value).toFixed(2);
        if(isNaN(number)) {
            //var zero = 0;
            //e.value = parseFloat(zero).toFixed(2);
            e.value = "0.00";
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
    
    function showSched1(){
        saveTempSched1Data();

        d.getElementById('mainContent').style.display = "none";
        $('#modalSched1').show('blind');		
    	$('#wrapper').css({'display':'none' });		

        for(var x = 0; x < d.getElementById('tblSched1Atc').rows.length; x++) {
            setTimeout("setInputTextControl_HorizontalAlignment('frm2550q:txtAmountSales" + (x + 1) + "', 4);", 100);
            setTimeout("setInputTextControl_HorizontalAlignment('frm2550q:txtOutputTax" + (x + 1) + "', 4);", 100);
            }
			
			setTimeout("d.getElementById('txtmodaltxtTotal15A').disabled = true; setInputTextControl_HorizontalAlignment('txtmodaltxtTotal15A', 4);" +
            "d.getElementById('txtmodaltxtTotal15B').disabled = true; setInputTextControl_HorizontalAlignment('txtmodaltxtTotal15B', 4);", 100);

        if(viewUploadFlag) {
            setTimeout("d.getElementById('btnSched1ATC').disabled = true;", 100);
            setTimeout("d.getElementById('btnClearPop').disabled = true;", 100);
            setTimeout("d.getElementById('btnCancelPop').disabled = true;", 100);
            setTimeout("toggleAllDisabled();", 100);
            setTimeout("d.getElementById('btnOkPop1').disabled = false;", 100);
        }
    }

    var tempATC = new Array();
    var tempATCAmount = new Array();
    var tempATCOutput = new Array();
    function showModalAtc() {
        tempATC = new Array();
        tempATCAmount = new Array();
        tempATCOutput = new Array();
        for(var i = 0; i < d.getElementById('tblSched1Atc').rows.length; i++) { 
            tempATC[i] = d.getElementById('frm2550q:txtAtcCde'+ (i + 1)).value;
            tempATCAmount[i] = d.getElementById('frm2550q:txtAmountSales'+ (i + 1)).value;
            tempATCOutput[i] = d.getElementById('frm2550q:txtOutputTax'+(i +1)).value;

        }

		d.getElementById('modalSched1').style.display = "none";
        $('#modalAtc').show('blind');
        $('#wrapper').css({'display':'none' });		
    }

    function getATCCode() {
        d.getElementById('modalSched1').style.display = 'block';
		if ( $('#modalAtc').css('display') != 'none' ) {
			$('#modalAtc').hide('blind');
		}
		$('#tblSched1Atc').html("");
		
        var x = 1;
        var listATCtable =   d.getElementById('tbllistAtcCode');
        for(var i = 1 ; i <= listATCtable.rows.length; i++ )
        {
            if(d.getElementById('AtcCode'+i) != null)
            {
                if (d.getElementById('AtcCode'+i).checked == true )
                {
                    var taxAmounttemp = "0.00";
                    var taxOutputtemp = "0.00";
                    for(var tempCount = 0 ; tempCount < tempATC.length; tempCount++) {
                        if(tempATC[tempCount] == d.getElementById('AtcCode'+i).value){
                            taxAmounttemp = tempATCAmount[tempCount];
                            taxOutputtemp = tempATCOutput[tempCount];
                            break;
                        }
                    }

                    $('#tblSched1Atc').html(  d.getElementById('tblSched1Atc').innerHTML + 
                        "<tr><td id='txtNaturePayment"+x+"' width='50%' > "+ d.getElementById('AtcNaturePayment'+i).innerHTML + " </td>" +
                        "<td width='10%'> <input type='text' id='frm2550q:txtAtcCde"+x+"' name='frm2550q:txtAtcCde[]' style='width: 50px' class='styletxtAtcCode' value='"+ d.getElementById('AtcCode'+i).value + "' />  </td>" +
                        "<td width='20%'> <input type='text' id='frm2550q:txtAmountSales"+x+"' name='frm2550q:txtAmountSales[]' class='styletxtAmountSales' value='"+taxAmounttemp +"' style='text-align:right' onkeypress='return numbersonly(this, event)' size='20' onblur='round(this,2);getRequiredWithheld("+x+");totalAmountandOutputTax()' /> </td>" +
                        "<td width='30%'> <input type='text' id='frm2550q:txtOutputTax"+x+"' name='frm2550q:txtOutputTax[]' class='styletxtOutputTax' value='"+taxOutputtemp +"'style='text-align:right; background-color: rgb(220, 220, 220)'  size='20'  disabled onblur='totalAmountandOutputTax();'/> </td>" +
                        "</tr>");
					
					setTimeout("d.getElementById('frm2550q:txtAtcCde"+x+"').disabled = true; " +
                        "setInputTextControl_HorizontalAlignment('frm2550q:txtAmountSales"+x+"', 4);" +
                        "setInputTextControl_HorizontalAlignment('frm2550q:txtOutputTax"+x+"', 4);" +
                        "getRequiredWithheld("+x+");" , 100);
                    setTimeout("d.getElementById('frm2550q:txtAmountSales"+x+"').value += '';" +
                        "d.getElementById('frm2550q:txtOutputTax"+x+"').value += '';", 100);
                    x++;
                }

            }
        }
        totalAmountandOutputTax();
    }

    function saveTempSched1Data() {
        var x = 0;
        tempRowSizeSched1 = d.getElementById("tblSched1Atc").rows.length;

        for(x = 0; x < tempRowSizeSched1; x++){
            tempAtcCode[x] = d.getElementById("frm2550q:txtAtcCde" + (x + 1)).value;
            tempAmtSales[x] = d.getElementById("frm2550q:txtAmountSales" + (x + 1)).value;
            tempOutputTax[x] = d.getElementById("frm2550q:txtOutputTax" + (x + 1)).value;
        }
    }

    function restoreTempSched1Data() {
        if(tempRowSizeSched1 > 0) {
            var x = 0;

            var i;
            getPopulateATC();
			$('#tbllistAtcCode').html("");
			
            for(i = 1 ; i < ATCnameCode.length ; i++  )
            {
                var checkFlag = "";
                for(x = 0; x < tempRowSizeSched1; x++){
                    var atccode = "" + tempAtcCode[x];
                    if(ATCnameCode[i] == atccode) {
                        checkFlag = "checked";
                        break;
                    }
                }
                $('#tbllistAtcCode').html(  d.getElementById('tbllistAtcCode').innerHTML + 
                    "<tr class='atc'><td width='20%' class='atc'> <input id='AtcCode"+i+"' name='AtcCode' type='checkbox' value='"+ATCnameCode[i]+"' " + checkFlag + " /> "+ATCnameCode[i]+ " </td> <td align='left' width='80%' class='atc atcNames' id='AtcNaturePayment"+i+"' >"+ NaturePayment[i]+ " </td> </tr>");
            }

            getATCCode();

            for(x = 0; x < tempRowSizeSched1; x++){
                d.getElementById("frm2550q:txtAtcCde" + (x + 1)).value = tempAtcCode[x];
                d.getElementById("frm2550q:txtAmountSales" + (x + 1)).value = tempAmtSales[x];
                d.getElementById("frm2550q:txtOutputTax" + (x + 1)).value = tempOutputTax[x];
            }

            totalAmountandOutputTax();
        }
    }

    function clearSched1Modal() {
        d.getElementById('txtmodaltxtTotal15A').value = "0.00"
		d.getElementById('txtmodaltxtTotal15B').value = "0.00"
		
		var x = 0;
        var rowSizeSched1 = d.getElementById("tblSched1Atc").rows.length;
        
        for(x = 0; x < rowSizeSched1; x++){
            //d.getElementById("frm2550q:txtAtcCde" + (x + 1)).value = "";
            d.getElementById("frm2550q:txtAmountSales" + (x + 1)).value = "0.00";
            d.getElementById("frm2550q:txtOutputTax" + (x + 1)).value = "0.00";
        }
    }

    function cancelSched1Modal() {
        restoreTempSched1Data();

		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched1').css('display') != 'none' ) {
			$('#modalSched1').hide('blind');
			$('#wrapper').css({'display':'block' });
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");			

        isModalTurnOn = false;
    }

    function getSched1Modal(){
        if (checkifFieldEmptySched1() )
        {
			 d.getElementById('mainContent').style.display = 'block';
			 if ( $('#modalSched1').css('display') != 'none' ) {
				$('#modalSched1').hide('blind');
				$('#wrapper').css({'display':'block' });
			 }
			 $('#DummyTxt').html("Creator");
			 $('#DummyTxt').html("");
			
            d.getElementById('frm2550q:txtTax15A').value  = d.getElementById('txtmodaltxtTotal15A').value;
            d.getElementById('frm2550q:txtTax15B').value  = d.getElementById('txtmodaltxtTotal15B').value;
            compute19AB();
        }
    }

    function getRequiredWithheld(numIndex)
    {
        d.getElementById('frm2550q:txtOutputTax'+numIndex).value = formatCurrency(NumWithComma( d.getElementById('frm2550q:txtAmountSales'+numIndex).value) * 0.12 );
    }

    function totalAmountandOutputTax() {
        var tbl =  d.getElementById('tblSched1Atc')
        var txt12A = 0;
        var txt12B = 0;
        for(var i = 1 ; i <= tbl.rows.length ; i ++){
            txt12A = txt12A +  NumWithComma(d.getElementById('frm2550q:txtAmountSales'+i).value);
            txt12B = txt12B +  NumWithComma(d.getElementById('frm2550q:txtOutputTax'+i).value);
        }
        d.getElementById('txtmodaltxtTotal15A').value = formatCurrency(txt12A);
        d.getElementById('txtmodaltxtTotal15B').value = formatCurrency(txt12B);
    }

    function checkifFieldEmptySched1()
    {
        var tbl =  d.getElementById('tblSched1Atc')
        for(var i = 1 ; i <= tbl.rows.length ; i ++){
            if( d.getElementById('frm2550q:txtAmountSales'+i).value <= 0 || d.getElementById('frm2550q:txtOutputTax'+i).value <= 0 )
            {
                alert("Please enter valid value for the Amount of Sales/Receipt for the period on row " + i); return;
            }
        }
        return true;
    }

	function prevalidateReturnPeriod() {
		var validated = false;
		
		if (d.getElementById('frm2550q:RtnPeriodFrom').value != "" && d.getElementById('frm2550q:RtnPeriodTo').value != "") {
			validated = true;
		}
		
		return validated;
	}
	
    function showSched2(){
        saveTempSched2Data();
		
		if (prevalidateReturnPeriod()) {
			if(d.getElementById('frm2550q:txtYear').value <= 2000 || d.getElementById('frm2550q:txtYear').value >= 2020 ) {
				alert("Please enter a valid year for Item 1. Valid year is 2001 and beyond."); return;
			} else {
				
				d.getElementById('mainContent').style.display = "none";
				$('#modalSched2').show('blind');	
				$('#wrapper').css({'display':'none' });
				
				for(var x = 0; x < d.getElementById("tblSched2").rows.length; x++) {
					setTimeout("setInputTextControl_HorizontalAlignment('txtAmt" + x + "', 4);", 100);
					setTimeout("setInputTextControl_HorizontalAlignment('txtInputTax" + x + "', 4);", 100);
				}

				setTimeout("d.getElementById('txtmodalTotalAmt').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalAmt', 4);" +
					"d.getElementById('txtmodalTotalInputTax').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalInputTax', 4);", 100);

			}

			if(viewUploadFlag) {
				setTimeout("d.getElementById('btnAdd1').disabled = true;", 100);
				setTimeout("d.getElementById('btnDelete1').disabled = true;", 100);
				setTimeout("d.getElementById('btnClearPop2').disabled = true;", 100);
				setTimeout("d.getElementById('btnCancelPop2').disabled = true;", 100);
				setTimeout("toggleAllDisabled();", 100);
				setTimeout("d.getElementById('btnOkPop2').disabled = false;", 100);
			}
		} else { alert("Please enter a valid date for Item 1."); return; }
    }

    function saveTempSched2Data() {
        var x = 0;
        tempRowSizeSched2 = d.getElementById("tblSched2").rows.length - 1;

        for(x = 0; x < tempRowSizeSched2; x++){
            tempTempPurDate[x] = d.getElementById("txtDatePurchased" + x).value;
            tempDescription[x] = d.getElementById("txtDescription" + x).value;
            tempPurAmt[x] = d.getElementById("txtAmt" + x).value;
            tempInputTax[x] = d.getElementById("txtInputTax" + x).value;
        }
    }

    function restoreTempSched2Data() {
        if(tempRowSizeSched2 > 0) {
            sched2ToCommit = new Array();
			$('#tbodyllistSched2').html("");
            var x = 0;
          
            for(x = 0; x < tempRowSizeSched2; x++){
                addlistSched2();

                d.getElementById("txtDatePurchased" + x).value = tempTempPurDate[x];
                d.getElementById("txtDescription" + x).value = tempDescription[x];
                d.getElementById("txtAmt" + x).value = tempPurAmt[x];

                getInputTaxCompute(x);

                d.getElementById("txtInputTax" + x).value = tempInputTax[x];

                computeSumTax();
            }
        }
    }

    function clearSched2Modal() {
        d.getElementById('txtmodalTotalAmt').value = "0.00"
		d.getElementById('txtmodalTotalInputTax').value = "0.00"
		
		var x = 0;
        var rowSizeSched2 = d.getElementById("tblSched2").rows.length - 1;
        
        for(x = 0; x < rowSizeSched2; x++){
            d.getElementById("txtDatePurchased" + x).value = "";
            d.getElementById("txtDescription" + x).value = "";
            d.getElementById("txtAmt" + x).value = "0.00";
            d.getElementById("txtInputTax" + x).value = "0.00";
        }
    }

    function cancelSched2Modal() {
        isReload = true;
        restoreTempSched2Data();

		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched2').css('display') != 'none' ) {
			$('#modalSched2').hide('blind');
			$('#wrapper').css({'display':'block' });
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");
		
		isModalTurnOn = false;
		isReload = false;
    }

    function getSched2Modal(){
        if (checkifEmptyFieldSched2() && checkSched2Data())
        {
            
			 d.getElementById('mainContent').style.display = 'block';
			 if ( $('#modalSched2').css('display') != 'none' ) {
				$('#modalSched2').hide('blind');
				$('#wrapper').css({'display':'block' });
			 }
			 $('#DummyTxt').html("Creator");
			 $('#DummyTxt').html("");	
			
            d.getElementById('frm2550q:txtTax21A').value  = d.getElementById('txtmodalTotalAmt').value;
            d.getElementById('frm2550q:txtTax21B').value  = d.getElementById('txtmodalTotalInputTax').value;
            compute21P();
            compute22();
        }
    }

    function checkSched2Data() {
        var size = sched2ToCommit.length; 
        for(var i = 0 ; i < size ; i++) {
            if((d.getElementById('txtAmt'+i).value * 1) > 1000000) {
                alert("The aggregate amount on row " + (i + 1) + " should not be greater than P1 Million.");
                return false;
            }
        }

        if((d.getElementById('txtmodalTotalAmt').value * 1) > 1000000) {
            alert("The total aggregate amount should be greater than 1 Million.");
            return false;
        }

        return true;
    }

    function checkifEmptyFieldSched2() {

        var size = sched2ToCommit.length;
        var firstAggregate = 0;
        var secondAggregate = 0;
        var thirdAggregate = 0;

        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtDatePurchased'+ i).value == "" || d.getElementById('txtDescription'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 2.\n" +
                    "Empty fields are not allowed."); return ;
            }
			
			if (NumWithComma(d.getElementById('txtAmt'+i).value) > 1000000) {
				alert("Please enter valid data.\n Aggregate amount should not exceed P1 Million."); return ;
			}

            strmmddyyy = d.getElementById('txtDatePurchased'+i).value;
            var aggregateAmount =  d.getElementById('txtAmt'+i).value;
			
			
			//--Benjie Manalaysay 11/06/2013
			if(strmmddyyy != ""){
				var result = strmmddyyy.split("/")
				if(result.length == 3 ){
					//Variables
					var month = result[0];
					var day = result[1];
					var year = result[2];
					
					var isLeap = new Date(year, 1, 29).getMonth() == 1;
						
					if(isNaN(month) || isNaN(day) || isNaN(year)){
						alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
						"Please enter a date in the MM/DD/YYYY format.");
					return;
					}else{ // Validate of valid Day for the month
						//Check if valid date
						var month31 = (['01', '03', '05', '07', '08', '10', '12']);
						var month30 = (['04', '06', '09', '11']);
						if (month == 2) {
						    //Special Handling for Leap Year
						    if (!isLeap && day == 29) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only.");
						        return;
						    }
						    if (!isLeap && day > 29) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only.");
						        return;
						    }
						    if (isLeap && day > 29) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only.");
						        return;
						    }

						}
						if (month31.contains(month) && day > 31)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}
						else if (month30.contains(month) && day > 30)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}
						else {
							//Validation if year is within the period
							//Initialize value
							var strmmddyyyFrom = d.getElementById('frm2550q:RtnPeriodFrom').value;
							var strmmddyyyTo= d.getElementById('frm2550q:RtnPeriodTo').value;
							//var resultFrom = strmmddyyyFrom.split("/");
							//var resultTo = strmmddyyyTo.split("/");
							
							var purchaseDate = new Date(strmmddyyy);
							
							if (purchaseDate < new Date(strmmddyyyFrom) || purchaseDate > new Date(strmmddyyyTo)) {
                                alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only."); return;
							}


                            //If valid Date of Purchase, get the sum of Amount (Net of Vat) field per month 12/10/2015
							if (month == 1 || month == 4 || month == 7 || month == 10) {
                                firstAggregate += NumWithComma(aggregateAmount);
							} else if (month == 2 || month == 5 || month == 8 || month == 11) {
                                secondAggregate += NumWithComma(aggregateAmount);
							} else if (month == 3 || month == 6 || month == 9 || month == 12) {
                                thirdAggregate += NumWithComma(aggregateAmount);
                            }
                            
							if (!isReload && (firstAggregate > 1000000 || secondAggregate > 1000000 || thirdAggregate > 1000000)) {
                                var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                alert("Please enter valid data.\n Sum of Aggregate amount for the month of " + months[month - 1]  + " should not exceed P1 Million."); 
                                return;
							}
						
						}

					}
				}else{
				alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
				"Please enter a date in the MM/DD/YYYY format.");
				return;
				}
			}

			
            // check if the string is within the return period
            //  if(result[0] != d.getElementById('frm2550q:RtnMonth').value) {
            //      alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only."); return;
            //  }
            if( d.getElementById('txtAmt'+ i).value <= 0 ) {
                alert("Please enter amount for Net of VAT on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
        }

        return true;
    }

    function addlistSched2Reload()
    {
            var size = sched2ToCommit.length; 
            for(var i = 0 ; i < size ; i++)
            {
                sched2ToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased'+i).value;
                sched2ToCommit[i].txtDescription = d.getElementById('txtDescription'+i).value;
                sched2ToCommit[i].txtAmt = d.getElementById('txtAmt'+i).value;
                sched2ToCommit[i].txtInputTax = d.getElementById('txtInputTax'+i).value;
            }
            i = sched2ToCommit.length;
            sched2ToCommit[i] = new Schedule2();

            //d.getElementById("tbodyllistSched2").innerHTML = "";
			$('#tbodyllistSched2').html("");
			
            for(i = 0; i < sched2ToCommit.length; i++) {

                //d.getElementById("tbodyllistSched2").innerHTML += "<tr>" +
				$('#tbodyllistSched2').html(  d.getElementById('tbodyllistSched2').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' id='chxSched2"+i+"' name='chxSched2"+i+"' /> </td>" +
                    "<td> <input type='text'  id='txtDatePurchased"+i+"' style='width: 150px' value='"+ sched2ToCommit[i].txtDatePurchase +"' maxlength='10' onkeypress='return dateOnly(this, event)'  > </td>" +
                    "<td> <input type='text'  id='txtDescription"+i+"' style='width: 190px' value='"+ sched2ToCommit[i].txtDescription +"'  maxlength='50' > </td> " +
                    "<td><input type='text' id='txtAmt"+i+"' style='width: 150px' value='"+ sched2ToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getInputTaxCompute("+i+")' size='20' maxlength='25' /> </td> " +
                    "<td><input type='text' id='txtInputTax"+i+"' style='width: 150px'  value='"+ sched2ToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumTax()' size='20' maxlength='25' /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtAmt"+i+"',4);" +
                    "setInputTextControl_HorizontalAlignment('txtInputTax"+i+"',4);",100);
              //  setTimeout("setInputTextControl_NumberFormatter('txtAmt"+i+"',12,2);" +
               //     "setInputTextControl_NumberFormatter('txtInputTax"+i+"',12,2);",100);
                setTimeout("d.getElementById('txtAmt"+i+"').value += '';" +
                    "d.getElementById('txtInputTax"+i+"').value += '';",100);
            }
    }	
	
    function addlistSched2()
    {
        if(checkifEmptyFieldSched2()) {
            var size = sched2ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched2ToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased'+i).value;
                sched2ToCommit[i].txtDescription = d.getElementById('txtDescription'+i).value;
                sched2ToCommit[i].txtAmt = d.getElementById('txtAmt'+i).value;
                sched2ToCommit[i].txtInputTax = d.getElementById('txtInputTax'+i).value;
            }
            i = sched2ToCommit.length;
            sched2ToCommit[i] = new Schedule2();

            //d.getElementById("tbodyllistSched2").innerHTML = "";
			$('#tbodyllistSched2').html("");
			
            for(i = 0; i < sched2ToCommit.length; i++) {

                //d.getElementById("tbodyllistSched2").innerHTML += "<tr>" +
				$('#tbodyllistSched2').html(  d.getElementById('tbodyllistSched2').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' id='chxSched2"+i+"' name='chxSched2"+i+"'  /> </td>" +
                    "<td> <input type='text'  id='txtDatePurchased"+i+"' name='txtDatePurchased[]' style='width: 150px' value='"+ sched2ToCommit[i].txtDatePurchase +"' maxlength='10' onkeypress='return dateOnly(this, event)'  > </td>" +
                    "<td> <input type='text'  id='txtDescription"+i+"' name='txtDescription[]' style='width: 190px' value='"+ sched2ToCommit[i].txtDescription +"'  maxlength='50' > </td> " +
                    "<td><input type='text' id='txtAmt"+i+"' name='txtAmt[]' style='width: 150px' value='"+ sched2ToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getInputTaxCompute("+i+")' size='20' maxlength='25' /> </td> " +
                    "<td><input type='text' id='txtInputTax"+i+"' name='txtInputTax[]' style='width: 150px'  value='"+ sched2ToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumTax()' size='20' maxlength='25' /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtAmt"+i+"',4);" +
                    "setInputTextControl_HorizontalAlignment('txtInputTax"+i+"',4);",100);
                setTimeout("d.getElementById('txtAmt"+i+"').value += '';" +
                    "d.getElementById('txtInputTax"+i+"').value += '';",100);
            }
        }
    }

    function deletelistSched2()
    {
        var sched2Temp = new Array();
        var i = 0;
        var size = sched2ToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            sched2ToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased'+i).value;
            sched2ToCommit[i].txtDescription = d.getElementById('txtDescription'+i).value;
            sched2ToCommit[i].txtAmt = d.getElementById('txtAmt'+i).value;
            sched2ToCommit[i].txtInputTax = d.getElementById('txtInputTax'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched2" + j).checked) {
                sched2Temp[i++] = sched2ToCommit[j];
            }
        }

        if(sched2Temp.length > 0) {
            sched2ToCommit = new Array();
            sched2ToCommit = sched2Temp;
            //d.getElementById("tbodyllistSched2").innerHTML = "";
			$('#tbodyllistSched2').html("");
            for(i = 0; i < sched2Temp.length; i++) {
                sched2ToCommit[i] = sched2Temp[i];
                //d.getElementById("tbodyllistSched2").innerHTML += "<tr>" +
				$('#tbodyllistSched2').html(  d.getElementById('tbodyllistSched2').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' id='chxSched2"+i+"' /> </td>" +
                    "<td> <input type='text'  id='txtDatePurchased"+i+"' style='width: 150px' value='"+ sched2ToCommit[i].txtDatePurchase +"'  maxlength='10' onkeypress='return dateOnly(this, event)'  > </td>" +
                    "<td> <input type='text'  id='txtDescription"+i+"' style='width: 190px' value='"+ sched2ToCommit[i].txtDescription +"' maxlength='50' > </td> " +
                    "<td><input type='text' id='txtAmt"+i+"' style='width: 150px' value='"+ sched2ToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getInputTaxCompute("+i+")' maxlength='17' /> </td> " +
                    "<td><input type='text' id='txtInputTax"+i+"' style='width: 150px'  value='"+ sched2ToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumTax()' maxlength='17' /> </td>");


                setTimeout("setInputTextControl_HorizontalAlignment('txtAmt"+i+"',4);" +
                    "setInputTextControl_HorizontalAlignment('txtInputTax"+i+"',4);",100);
              //  setTimeout("setInputTextControl_NumberFormatter('txtAmt"+i+"',12,2);" +
              //      "setInputTextControl_NumberFormatter('txtInputTax"+i+"',12,2);",100);
            }
        } else {
            sched2ToCommit = new Array();
            //d.getElementById("tbodyllistSched2").innerHTML = "";
			$('#tbodyllistSched2').html("");
        }
        computeSumTax();
    }

    function showSched3(){
        saveTempSched3Data();
        
        if(d.getElementById('frm2550q:txtYear').value <= 2000 && d.getElementById('frm2550q:txtYear').value <= 2020 ) {
            alert("Please  enter a valid year for the Return Period. Only values 2000 and beyond will be accepted."); return;
        } else {
			d.getElementById('mainContent').style.display = "none";
			$('#modalSched3').show('blind');	
			$('#wrapper').css({'display':'none' });
				
            for(var x = 0; x < d.getElementById("tblSched3A").rows.length; x++) {
                setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3A" + x + "', 4);", 100);
                setTimeout("setInputTextControl_HorizontalAlignment('txtInputTax3A" + x + "', 4);", 100);
                setTimeout("setInputTextControl_HorizontalAlignment('txtAllowInputTax3A" + x + "', 4);", 100);
                setTimeout("setInputTextControl_HorizontalAlignment('txtBalInputTax3A" + x + "', 4);", 100);
			}

            for(var x = 0; x < d.getElementById("tblSched3B").rows.length; x++) {
                setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3B" + x + "', 4);", 100);
                setTimeout("setInputTextControl_HorizontalAlignment('txtBalInputTaxPrevious3B" + x + "', 4);", 100);
                setTimeout("setInputTextControl_HorizontalAlignment('txtAllowInputTax3B" + x + "', 4);", 100);
                setTimeout("setInputTextControl_HorizontalAlignment('txtBalInputTax3B" + x + "', 4);", 100);
			}


            setTimeout("d.getElementById('txtmodalTotalAmountSched3').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalAmountSched3', 4);" +
                "d.getElementById('txtmodalTotalInputTaxSched3').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalInputTaxSched3', 4);" +
                "d.getElementById('txtmodalTotalBalanceSched3A').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalBalanceSched3A', 4);" +
                "d.getElementById('txtmodalTotalBalanceSched3B').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalBalanceSched3B', 4);" +
                "d.getElementById('txtmodalTotalInputTax20ASched3').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalInputTax20ASched3', 4);", 100);

        }

        if(viewUploadFlag) {
            setTimeout("d.getElementById('btnAdd2').disabled = true;", 100);
            setTimeout("d.getElementById('btnDelete2').disabled = true;", 100);
            setTimeout("d.getElementById('btnAdd3').disabled = true;", 100);
            setTimeout("d.getElementById('btnDelete3').disabled = true;", 100);
            setTimeout("d.getElementById('btnClearPop3').disabled = true;", 100);
            setTimeout("d.getElementById('btnCancelPop3').disabled = true;", 100);
            setTimeout("toggleAllDisabled();", 100);
            setTimeout("d.getElementById('btnOkPop3').disabled = false;", 100);
        }
    }

    function checkifEmptyFieldSched3(nameTable) {
        if(nameTable == "A" || nameTable == "AandB" ) {
            var size = sched3AToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                if(d.getElementById('txtDatePurchased3A'+ i).value == "" || d.getElementById('txtDescription3A'+ i).value == "" ||
                    d.getElementById('txtAllowInputTax3A'+ i).value == 0  ) {
                    alert("Please enter valid row " + (i + 1) + " data for Schedule 3A.\n" +
                        "Empty fields are not allowed.");
                    return ;
                } strmmddyyy = d.getElementById('txtDatePurchased3A'+i).value;

				
				
			//--Benjie Manalaysay 11/06/2013
			if(strmmddyyy != ""){
				var result = strmmddyyy.split("/")
				if(result.length == 3 ){
					//Variables
					var month = result[0];
					var day = result[1];
					var year = result[2];
					
					var isLeap = new Date(year, 1, 29).getMonth() == 1;
						
					if(isNaN(month) || isNaN(day) || isNaN(year)){
					    alert("Please enter a valid date for Date of Purchase on row " + (i + 1) + " Part A.\n" +
						"Please enter a date in the MM/DD/YYYY format.");
					return;
					}else{ // Validate of valid Day for the month
						//Check if valid date
						var month31 = (['01', '03', '05', '07', '08', '10', '12']);
						var month30 = (['04', '06', '09', '11']);
						if (month == 2) {
						    //Special Handling for Leap Year
						    if (!isLeap && day == 29) {
						        alert("Invalid entry on row " + (i + 1) + " Part A. Date of Purchase must be within the Return Period only.");
						        return;
						    }
						    if (!isLeap && day > 29) {
						        alert("Invalid entry on row " + (i + 1) + " Part A. Date of Purchase must be within the Return Period only.");
						        return;
						    }
						    if (isLeap && day > 29) {
						        alert("Invalid entry on row " + (i + 1) + " Part A. Date of Purchase must be within the Return Period only.");
						        return;
						    }

						}
						if (month31.contains(month) && day > 31)
						{
						    alert("Invalid entry on row " + (i + 1) + " Part A. Date of Purchase must be within the Return Period only.");
							return;
						}
						else if (month30.contains(month) && day > 30)
						{
						    alert("Invalid entry on row " + (i + 1) + " Part A. Date of Purchase must be within the Return Period only.");
							return;
						}
						else {
						    //Validation if year is within the period
						    //Initialize value
						    var strmmddyyyFrom = d.getElementById('frm2550q:RtnPeriodFrom').value;
						    var strmmddyyyTo = d.getElementById('frm2550q:RtnPeriodTo').value;
						    //var resultFrom = strmmddyyyFrom.split("/");
						    //var resultTo = strmmddyyyTo.split("/");

						    var purchaseDate = new Date(strmmddyyy);

						    if (purchaseDate < new Date(strmmddyyyFrom) || purchaseDate > new Date(strmmddyyyTo)) {
						        alert("Invalid entry on row " + (i + 1) + " Part A. Date of Purchase must be within the Return Period only."); return;
						    }

						}
					}
				}else{
				    alert("Please enter a valid date for Date of Purchase on row " + (i + 1) + " Part A.\n" +
				"Please enter a date in the MM/DD/YYYY format.");
				return;
				}
			}
                if( d.getElementById('txtAmt3A'+ i).value <= 0 ) {
                    alert("Please enter amount for Net of VAT on row " + ( i + 1) + ".\n" +
                        "Value must be greater than 0.");
                    return;
                }
                if( d.getElementById('txtEstLife3A'+ i).value <= 0 || d.getElementById('txtEstLife3A'+ i).value > 999 ) {
                    alert("Please enter a value 1 to 999 for Estimated Life on row " + ( i + 1) + " Schedule 3" +
                        " Part A.");
                    return;
                }
                if( d.getElementById('txtRecogLife3A'+ i).value <= 0 || d.getElementById('txtRecogLife3A'+ i).value > 60 ) {
                    alert("Please enter a value 1 to 60 for Recognized Life on row " + ( i + 1) +
                        " Part A.");
                    return;
                }
            }
			
            // check if above 1M the table A.
            if(nameTable == "AandB") { 
				if(sched3AToCommit.length > 0) { 
					if(NumWithComma(d.getElementById('txtmodalTotalAmountSched3').value) <= 1000000 ) {
						alert("The total aggregate amount does not exceed 1 Million.\n Please re-enter the values of Schedule 3.");
						return;
					}
				}
            }
        }
        if(nameTable == "B" || nameTable == "AandB") {
            var size = sched3BToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                if(d.getElementById('txtDatePurchased3B'+ i).value == "" || d.getElementById('txtDescription3B'+ i).value == "" ) {
                    alert("If you don't have any entries for Schedule 3b,\n" +
                        "please delete the row on this schedule if not applicable.");
                    return ;
                } strmmddyyy = d.getElementById('txtDatePurchased3B'+i).value;
                var ifyearless = "false";

				//--Benjie Manalaysay							
				if(strmmddyyy != ""){
					var result = strmmddyyy.split("/")
					if(result.length == 3 ){
						//Variables
						var month = result[0];
						var day = result[1];
						var year = result[2];
						
						var isLeap = new Date(year, 1, 29).getMonth() == 1;
							
						if(isNaN(month) || isNaN(day) || isNaN(year)){
						    alert("Please enter a valid date for Date of Purchase on row " + (i + 1) + " Part B.\n" +
							"Please enter a date in the MM/DD/YYYY format.");
						return;
						}else{ // Validate of valid Day for the month
						
						//check if year is < current Year
						if(year < d.getElementById('frm2550q:txtYear').value  ){
						ifyearless = "true";
						}
							
							//Check if valid date
							var month31 = (['01', '03', '05', '07', '08', '10', '12']);
							var month30 = (['04', '06', '09', '11']);
							if (month == 2) {
							    //Special Handling for Leap Year
							    if (!isLeap && day == 29) {
							        alert("Invalid entry on row " + (i + 1) + " Part B. Date of Purchase must be within the Return Period only.");
							        return;
							    }
							    if (!isLeap && day > 29) {
							        alert("Invalid entry on row " + (i + 1) + " Part B. Date of Purchase must be within the Return Period only.");
							        return;
							    }
							    if (isLeap && day > 29) {
							        alert("Invalid entry on row " + (i + 1) + " Part B. Date of Purchase must be within the Return Period only.");
							        return;
							    }

							}
							if (month31.contains(month) && day > 31)
							{
							    alert("Invalid entry on row " + (i + 1) + " Part B. Date of Purchase must be within the Return Period only.");
								return;
							}
							else if (month30.contains(month) && day > 30)
							{
							    alert("Invalid entry on row " + (i + 1) + " Part B. Date of Purchase must be within the Return Period only.");
								return;
							}
							else {
							    //Validation if year is within the period
							    //Initialize value
							    var strmmddyyyFrom = d.getElementById('frm2550q:RtnPeriodFrom').value;
							    var strmmddyyyTo = d.getElementById('frm2550q:RtnPeriodTo').value;
							    //var resultFrom = strmmddyyyFrom.split("/");
							    //var resultTo = strmmddyyyTo.split("/");

							    var purchaseDate = new Date(strmmddyyy);

							    if (purchaseDate >= new Date(strmmddyyyFrom) || purchaseDate > new Date(strmmddyyyTo)) {
							        alert("Invalid entry on row " + (i + 1) + " Part B. Date of Purchase must be within the Previous Period only."); return;
							    }

							}
						}
					}else{
					    alert("Please enter a valid date for Date of Purchase on row " + (i + 1) + " Part B.\n" +
					"Please enter a date in the MM/DD/YYYY format.");
					return;
					}
				}
				
                if( d.getElementById('txtAmt3B'+ i).value <= 0 ) {
                    alert("Please enter amount for Net of VAT on row " + ( i + 1) + ".\n" +
                        "Value must be greater than 0 in Part B.");
                    return;
                }
                if( d.getElementById('txtEstLife3B'+ i).value <= 0 || d.getElementById('txtEstLife3B'+ i).value > 999 ) {
                    alert("Please enter a value 1 to 999 for Estimated Life on row " + ( i + 1) + " Schedule 3" +
                        " Part B.");
                    return;
                }
                if( d.getElementById('txtRecogLife3B'+ i).value <= 0 || d.getElementById('txtRecogLife3B'+ i).value > 60 ) {
                    alert("Please enter a value 1 to 60 for Recognized Life on row " + ( i + 1) +
                        " Part B.");
                    return;
                }
            }
        }
        return true;
    }

    function saveTempSched3Data() {
        var x = 0;
        tempRowSizeSched3a = d.getElementById("tblSched3A").rows.length - 3;
        for(x = 0; x < tempRowSizeSched3a; x++){
            tempTempPeriodCovered[x] = d.getElementById("txtDatePurchased3A" + x).value;
            description[x] = d.getElementById("txtDescription3A" + x).value;
            purAmt[x] = d.getElementById("txtAmt3A" + x).value;
            inputTax[x] = d.getElementById("txtInputTax3A" + x).value;
            estMo[x] = d.getElementById("txtEstLife3A" + x).value;
            recMo[x] = d.getElementById("txtRecogLife3A" + x).value;
            allowInput[x] = d.getElementById("txtAllowInputTax3A" + x).value;
            balInputTax[x] = d.getElementById("txtBalInputTax3A" + x).value;
            tempPartATotalBal[x] =  d.getElementById("txtmodalTotalBalanceSched3A").value;
        }

        tempRowSizeSched3b = d.getElementById("tblSched3B").rows.length - 3;
        for(x = 0; x < tempRowSizeSched3b; x++){
            tempTempPeriodCoveredB[x] = d.getElementById("txtDatePurchased3B" + x).value;
            tempDescriptionB[x] = d.getElementById("txtDescription3B" + x).value;
            tempPurAmtB[x] = d.getElementById("txtAmt3B" + x).value;
            tempInputTaxB[x] = d.getElementById("txtBalInputTaxPrevious3B" + x).value;
            tempEstMoB[x] = d.getElementById("txtEstLife3B" + x).value;
            tempRecMoB[x] = d.getElementById("txtRecogLife3B" + x).value;
            tempAllowInputB[x] = d.getElementById("txtAllowInputTax3B" + x).value;
            tempBalInputTaxB[x] = d.getElementById("txtBalInputTax3B" + x).value;
            tempTempPartBTotalBalB[x] = d.getElementById("txtmodalTotalBalanceSched3B").value;
        }
    }

    function restoreTempSched3Data() {
        if(tempRowSizeSched3a > 0) {
            sched3AToCommit = new Array();
			$('#tbodyllistSched3A').html("");
			
            var x = 0;
            var initCount = 0;
            for(x = 0; x < tempRowSizeSched3a; x++){
                addlistSched3A();

                d.getElementById("txtDatePurchased3A" + x).value = tempTempPeriodCovered[x];
                d.getElementById("txtDescription3A" + x).value = description[x];
                d.getElementById("txtAmt3A" + x).value = purAmt[x];
                getInputTaxCompute3A(x);
                d.getElementById("txtInputTax3A" + x).value = inputTax[x];
                d.getElementById("txtEstLife3A" + x).value = estMo[x];
                d.getElementById("txtRecogLife3A" + x).value = recMo[x];
                d.getElementById("txtAllowInputTax3A" + x).value = allowInput[x];
                d.getElementById("txtBalInputTax3A" + x).value = balInputTax[x];

                if(initCount == (tempRowSizeSched3a - 1)){
                    d.getElementById("txtmodalTotalBalanceSched3A").value = tempPartATotalBal[x];
                }

                initCount++;
                computeSumTax3A();
            }
        }

        if(tempRowSizeSched3b > 0) {
            sched3BToCommit = new Array();
            //d.getElementById("tbodyllistSched3B").innerHTML = "";
			$('#tbodyllistSched3B').html("");
			
            var x = 0;
            x = 0;
            var initCount = 0;

            for(x = 0; x < tempRowSizeSched3b; x++){
                addlistSched3B();

                d.getElementById("txtDatePurchased3B" + x).value = tempTempPeriodCoveredB[x];
                d.getElementById("txtDescription3B" + x).value = tempDescriptionB[x];
                d.getElementById("txtAmt3B" + x).value = tempPurAmtB[x];
                d.getElementById("txtBalInputTaxPrevious3B" + x).value = tempInputTaxB[x];
                d.getElementById("txtEstLife3B" + x).value = tempEstMoB[x];
                d.getElementById("txtRecogLife3B" + x).value = tempRecMoB[x];
                d.getElementById("txtAllowInputTax3B" + x).value = tempAllowInputB[x];
                d.getElementById("txtBalInputTax3B" + x).value = tempBalInputTaxB[x];

                if(initCount == (tempRowSizeSched3b - 1)){
                    d.getElementById("txtmodalTotalBalanceSched3B").value = tempTempPartBTotalBalB[x];
                }

                initCount++;
                computeSumTax3B();
            }
        }
    }

    function clearSched3Modal() {
        var x = 0;
        var rowSizeSched3a = d.getElementById("tblSched3A").rows.length - 3;
        var rowSizeSched3b = d.getElementById("tblSched3B").rows.length - 3;

        for(x = 0; x < rowSizeSched3a; x++){
            d.getElementById("txtDatePurchased3A" + x).value = "";
            d.getElementById("txtDescription3A" + x).value = "";
            d.getElementById("txtAmt3A" + x).value = "0.00";
            d.getElementById("txtInputTax3A" + x).value = "0.00";
            d.getElementById("txtEstLife3A" + x).value = "0";
            d.getElementById("txtRecogLife3A" + x).value = "1";
            d.getElementById("txtAllowInputTax3A" + x).value = "0.00";
            d.getElementById("txtBalInputTax3A" + x).value = "0.00";
            d.getElementById("txtmodalTotalBalanceSched3A").value = "0.00";
        }

        for(x = 0; x < rowSizeSched3b; x++){
            d.getElementById("txtDatePurchased3B" + x).value = "";
            d.getElementById("txtDescription3B" + x).value = "";
            d.getElementById("txtAmt3B" + x).value = "0.00";
            d.getElementById("txtBalInputTaxPrevious3B" + x).value = "0.00";
            d.getElementById("txtEstLife3B" + x).value = "0";
            d.getElementById("txtRecogLife3B" + x).value = "1";
            d.getElementById("txtAllowInputTax3B" + x).value = "0.00";
            d.getElementById("txtBalInputTax3B" + x).value = "0.00";
            d.getElementById("txtmodalTotalBalanceSched3B").value = "0.00";
        }
		
		d.getElementById("txtmodalTotalAmountSched3").value = "0.00";
		d.getElementById("txtmodalTotalInputTaxSched3").value = "0.00";
		d.getElementById("txtmodalTotalBalanceSched3A").value = "0.00";

		d.getElementById("txtmodalTotalBalanceSched3B").value = "0.00";

		d.getElementById("txtmodalTotalInputTax20ASched3").value = "0.00";
		
    }

    function cancelSched3Modal() {
        restoreTempSched3Data();

		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched3').css('display') != 'none' ) {
			$('#modalSched3').hide('blind');
			$('#wrapper').css({'display':'block' });
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");	
		
        isModalTurnOn = false;
    }

    function getSched3Modal(){
        if (checkifEmptyFieldSched3("AandB") )
        {   
            
			 d.getElementById('mainContent').style.display = 'block';
			 if ( $('#modalSched3').css('display') != 'none' ) {
				$('#modalSched3').hide('blind');
				$('#wrapper').css({'display':'block' });
			 }
			 $('#DummyTxt').html("Creator");
			 $('#DummyTxt').html("");				
			
            d.getElementById('frm2550q:txtTax21C').value  = d.getElementById('txtmodalTotalAmountSched3').value;
            d.getElementById('frm2550q:txtTax21D').value  = d.getElementById('txtmodalTotalInputTaxSched3').value;
            d.getElementById('frm2550q:txtTax23A').value  = d.getElementById('txtmodalTotalInputTax20ASched3').value;
            compute21P();
            compute22();
            compute23F();
        }
    }

    function addlistSched3AReload()
    {
            var size = sched3AToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched3AToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased3A'+i).value;
                sched3AToCommit[i].txtDescription = d.getElementById('txtDescription3A'+i).value;
                sched3AToCommit[i].txtAmt = d.getElementById('txtAmt3A'+i).value;
                sched3AToCommit[i].txtInputTax = d.getElementById('txtInputTax3A'+i).value;
                sched3AToCommit[i].txtEstLife = d.getElementById('txtEstLife3A'+i).value;
                sched3AToCommit[i].txtRecogLife = d.getElementById('txtRecogLife3A'+i).value;
                sched3AToCommit[i].txtAllowInputTax = d.getElementById('txtAllowInputTax3A'+i).value;
                sched3AToCommit[i].txtBalInputTax = d.getElementById('txtBalInputTax3A'+i).value;
            }
            i = sched3AToCommit.length;
            sched3AToCommit[i] = new Schedule3();

           
			$('#tbodyllistSched3A').html("");
			
            for(i = 0; i < sched3AToCommit.length; i++) {

				$('#tbodyllistSched3A').html(  d.getElementById('tbodyllistSched3A').innerHTML + "<tr>" +
                    "<td width='4%'> <input type='checkbox' class='printButtonClass' id='chxSched3A"+i+"' /> </td>" +
                    "<td width='12%'> <input type='text'  id='txtDatePurchased3A"+i+"' name='txtDatePurchased3A[]' style='width: 100px' value='"+ sched3AToCommit[i].txtDatePurchase +"' maxlength='10' onkeypress='return dateOnly(this, event)'  > </td>" +
                    "<td width='12%'> <input type='text'  id='txtDescription3A"+i+"' name='txtDescription3A[]' style='width: 150px' value='"+ sched3AToCommit[i].txtDescription +"' maxlength='50' > </td> " +
                    "<td width='12%'><input type='text' id='txtAmt3A"+i+"' name='txtAmt3A[]' value='"+ sched3AToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getInputTaxCompute3A("+i+")' size='20' maxlength='25' /> </td> " +
                    "<td width='12%'><input type='text' id='txtInputTax3A"+i+"' name='txtInputTax3A[]' value='"+ sched3AToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3A()' size='20' maxlength='25'  /> </td>" +
                    "<td width='12%'><input type='text' id='txtEstLife3A"+i+"' name='txtEstLife3A[]' style='width: 80px'  value='"+ sched3AToCommit[i].txtEstLife +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);' maxlength='3'  /> </td>" +
                    "<td width='12%'><input type='text' id='txtRecogLife3A"+i+"' name='txtRecogLife3A[]' style='width: 80px'  value='"+ sched3AToCommit[i].txtRecogLife +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);computeSumTax3A();' maxlength='2'  /> </td>" +
                    "<td width='12%'><input type='text' id='txtAllowInputTax3A"+i+"' name='txtAllowInputTax3A[]' onblur='round(this,2); computeSumTax3A()' size='20' value='"+ sched3AToCommit[i].txtAllowInputTax +"'  /> </td>" +
                    "<td width='12%'><input type='text' id='txtBalInputTax3A"+i+"' name='txtBalInputTax3A[]' style='background-color: rgb(220, 220, 220)' size='20' value='"+ sched3AToCommit[i].txtBalInputTax +"'  /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3A"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtInputTax3A"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAllowInputTax3A"+i+"',4 ); " +
                    "d.getElementById('txtBalInputTax3A"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtBalInputTax3A"+i+"',4 ); " +
                    "",100);

            }
    }
	
	
    function addlistSched3A()
    {
        if(checkifEmptyFieldSched3("A")) {
            var size = sched3AToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched3AToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased3A'+i).value;
                sched3AToCommit[i].txtDescription = d.getElementById('txtDescription3A'+i).value;
                sched3AToCommit[i].txtAmt = d.getElementById('txtAmt3A'+i).value;
                sched3AToCommit[i].txtInputTax = d.getElementById('txtInputTax3A'+i).value;
                sched3AToCommit[i].txtEstLife = d.getElementById('txtEstLife3A'+i).value;
                sched3AToCommit[i].txtRecogLife = d.getElementById('txtRecogLife3A'+i).value;
                sched3AToCommit[i].txtAllowInputTax = d.getElementById('txtAllowInputTax3A'+i).value;
                sched3AToCommit[i].txtBalInputTax = d.getElementById('txtBalInputTax3A'+i).value;
            }
            i = sched3AToCommit.length;
            sched3AToCommit[i] = new Schedule3();

            //d.getElementById("tbodyllistSched3A").innerHTML = "";
			$('#tbodyllistSched3A').html("");
			
            for(i = 0; i < sched3AToCommit.length; i++) {

                //d.getElementById("tbodyllistSched3A").innerHTML += "<tr>" +
				$('#tbodyllistSched3A').html(  d.getElementById('tbodyllistSched3A').innerHTML + "<tr>" +
                    "<td width='4%'> <input type='checkbox' class='printButtonClass' id='chxSched3A"+i+"' name='chxSched3A[]' /> </td>" +
                    "<td width='12%'> <input type='text'  id='txtDatePurchased3A"+i+"' name='txtDatePurchased3A[]' style='width: 100px' value='"+ sched3AToCommit[i].txtDatePurchase +"' maxlength='10' onkeypress='return dateOnly(this, event)'  > </td>" +
                    "<td width='12%'> <input type='text'  id='txtDescription3A"+i+"' name='txtDescription3A[]' style='width: 150px' value='"+ sched3AToCommit[i].txtDescription +"' maxlength='50' > </td> " +
                    "<td width='12%'><input type='text' id='txtAmt3A"+i+"' name='txtAmt3A[]' value='"+ sched3AToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getInputTaxCompute3A("+i+")' size='20' maxlength='25' /> </td> " +
                    "<td width='12%'><input type='text' id='txtInputTax3A"+i+"' name='txtInputTax3A[]' value='"+ sched3AToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3A()' size='20' maxlength='25'  /> </td>" +
                    "<td width='12%'><input type='text' id='txtEstLife3A"+i+"' name='txtEstLife3A[]' style='width: 80px'  value='"+ sched3AToCommit[i].txtEstLife +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);' maxlength='3'  /> </td>" +
                    "<td width='12%'><input type='text' id='txtRecogLife3A"+i+"' name='txtRecogLife3A[]' style='width: 80px'  value='"+ sched3AToCommit[i].txtRecogLife +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);computeSumTax3A();' maxlength='2'  /> </td>" +
                    "<td width='12%'><input type='text' id='txtAllowInputTax3A"+i+"' name='txtAllowInputTax3A[]' onblur='round(this,2); computeSumTax3A()' size='20' value='"+ sched3AToCommit[i].txtAllowInputTax +"'  /> </td>" +
                "<td width='12%'><input type='text' id='txtBalInputTax3A"+i+"' name='txtBalInputTax3A[]' style='background-color: rgb(220, 220, 220)' size='20' value='"+ sched3AToCommit[i].txtBalInputTax +"'  /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3A"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtInputTax3A"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAllowInputTax3A"+i+"',4 ); " +
                    "d.getElementById('txtBalInputTax3A"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtBalInputTax3A"+i+"',4 ); " +
                    "",100);

             //   setTimeout("setInputTextControl_NumberFormatter('txtAmt3A"+i+"',12,2 );" +
             //       "setInputTextControl_NumberFormatter('txtInputTax3A"+i+"',12,2 ); " +
             //       "setInputTextControl_NumberFormatter('txtAllowInputTax3A"+i+"',12,2 ); " +
             //       "setInputTextControl_NumberFormatter('txtBalInputTax3A"+i+"',12,2 ); " +
             //       "",100);
            }
        }
    }

    function deletelistSched3A()
    {
        var sched3ATemp = new Array();
        var i = 0;
        var size = sched3AToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            sched3AToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased3A'+i).value;
            sched3AToCommit[i].txtDescription = d.getElementById('txtDescription3A'+i).value;
            sched3AToCommit[i].txtAmt = d.getElementById('txtAmt3A'+i).value;
            sched3AToCommit[i].txtInputTax = d.getElementById('txtInputTax3A'+i).value;
            sched3AToCommit[i].txtEstLife = d.getElementById('txtEstLife3A'+i).value;
            sched3AToCommit[i].txtRecogLife = d.getElementById('txtRecogLife3A'+i).value;
            sched3AToCommit[i].txtAllowInputTax = d.getElementById('txtAllowInputTax3A'+i).value;
            sched3AToCommit[i].txtBalInputTax = d.getElementById('txtBalInputTax3A'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched3A" + j).checked) {
                sched3ATemp[i++] = sched3AToCommit[j];
            }
        }

        if(sched3ATemp.length > 0) {
            sched3AToCommit = new Array();
            sched3AToCommit = sched3ATemp;
            //d.getElementById("tbodyllistSched3A").innerHTML = "";
			$('#tbodyllistSched3A').html("");

            for(i = 0; i < sched3ATemp.length; i++) {
                sched3AToCommit[i] = sched3ATemp[i];
                //d.getElementById("tbodyllistSched3A").innerHTML += "<tr>" +
				$('#tbodyllistSched3A').html(  d.getElementById('tbodyllistSched3A').innerHTML + "<tr>" +
                    "<td width='4%'> <input type='checkbox' class='printButtonClass' id='chxSched3A"+i+"' name='chxSched3A[]' style='width: 20px' /> </td>" +
                    "<td width='12%'> <input type='text'  id='txtDatePurchased3A"+i+"' name='txtDatePurchased3A[]' style='width: 100px' value='"+ sched3AToCommit[i].txtDatePurchase +"' maxlength='10' onkeypress='return dateOnly(this, event)'  > </td>" +
                    "<td width='12%'> <input type='text'  id='txtDescription3A"+i+"' name='txtDescription3A[]'  style='width: 150px' value='"+ sched3AToCommit[i].txtDescription +"' maxlength='50' > </td> " +
                    "<td width='12%'><input type='text' id='txtAmt3A"+i+"' name='txtAmt3A[]'  value='"+ sched3AToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getInputTaxCompute3A("+i+")' size='20' maxlength='25' /> </td> " +
                    "<td width='12%'><input type='text' id='txtInputTax3A"+i+"' name='txtInputTax3A[]'  value='"+ sched3AToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3A()' size='20' maxlength='25'  /> </td>" +
                    "<td width='12%'><input type='text' id='txtEstLife3A"+i+"' name='txtEstLife3A[]'  style='width: 80px'  value='"+ sched3AToCommit[i].txtEstLife +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);' maxlength='3'  /> </td>" +
                    "<td width='12%'><input type='text' id='txtRecogLife3A"+i+"'  name='txtRecogLife3A[]' style='width: 80px'  value='"+ sched3AToCommit[i].txtRecogLife +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);computeSumTax3A();' maxlength='2'  /> </td>" +
                    "<td width='12%'><input type='text' id='txtAllowInputTax3A"+i+"'  name='txtAllowInputTax3A[]' onblur='round(this,2); computeSumTax3A()' size='20' value='"+ sched3AToCommit[i].txtAllowInputTax +"'  /> </td>" +
                    "<td width='12%'><input type='text' id='txtBalInputTax3A"+i+"' name='txtBalInputTax3A[]' style='background-color: rgb(220, 220, 220)' size='20' value='"+ sched3AToCommit[i].txtBalInputTax +"'  /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3A"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtInputTax3A"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAllowInputTax3A"+i+"',4 ); " +
                    "d.getElementById('txtBalInputTax3A"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtBalInputTax3A"+i+"',4 ); " +
                    "",100);
            
            }
        } else {
            sched3AToCommit = new Array();
			$('#tbodyllistSched3A').html("");
        }
        computeSumTax3A();
    }

    function addlistSched3BReload()
    {
            var size = sched3BToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched3BToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased3B'+i).value;
                sched3BToCommit[i].txtDescription = d.getElementById('txtDescription3B'+i).value;
                sched3BToCommit[i].txtAmt = d.getElementById('txtAmt3B'+i).value;
                sched3BToCommit[i].txtInputTax = d.getElementById('txtBalInputTaxPrevious3B'+i).value;
                sched3BToCommit[i].txtEstLife = d.getElementById('txtEstLife3B'+i).value;
                sched3BToCommit[i].txtRecogLife = d.getElementById('txtRecogLife3B'+i).value;
                sched3BToCommit[i].txtAllowInputTax = d.getElementById('txtAllowInputTax3B'+i).value;
                sched3BToCommit[i].txtBalInputTax = d.getElementById('txtBalInputTax3B'+i).value;
            }
            i = sched3BToCommit.length;
            sched3BToCommit[i] = new Schedule3();

          
			$('#tbodyllistSched3B').html("");
			
            for(i = 0; i < sched3BToCommit.length; i++) {

              
				$('#tbodyllistSched3B').html(  d.getElementById('tbodyllistSched3B').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' class='printButtonClass' id='chxSched3B"+i+"' name='chxSched3B[]' /> </td>" +
                    "<td> <input type='text'  id='txtDatePurchased3B"+i+"' name='txtDatePurchased3B[]' style='width: 100px' value='"+ sched3BToCommit[i].txtDatePurchase +"' maxlength='10' onkeypress='return dateOnly(this, event)'  > </td>" +
                    "<td> <input type='text'  id='txtDescription3B"+i+"' name='txtDescription3B[]' style='width: 150px' value='"+ sched3BToCommit[i].txtDescription +"' maxlength='50' > </td> " +
                    "<td><input type='text' id='txtAmt3B"+i+"' name='txtAmt3B[]' value='"+ sched3BToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' size='20' maxlength='25' /> </td> " +
                    "<td><input type='text' id='txtBalInputTaxPrevious3B"+i+"' name='txtBalInputTaxPrevious3B[]' value='"+ sched3BToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3B()' size='20' maxlength='25'  /> </td>" +
                    "<td><input type='text' id='txtEstLife3B"+i+"' name='txtEstLife3B[]' style='width: 80px'  value='"+ sched3BToCommit[i].txtEstLife +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);' maxlength='3'  /> </td>" +
                    "<td><input type='text' id='txtRecogLife3B"+i+"' name='txtRecogLife3B[]' style='width: 80px'  value='"+ sched3BToCommit[i].txtRecogLife +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);computeSumTax3B();' maxlength='2'  /> </td>" +
                    "<td><input type='text' id='txtAllowInputTax3B"+i+"' name='txtAllowInputTax3B[]' onblur='round(this,2); computeSumTax3B()' size='20' value='"+ sched3BToCommit[i].txtAllowInputTax +"'  /> </td>" +
                    "<td><input type='text' id='txtBalInputTax3B"+i+"' name='txtBalInputTax3B[]' style='background-color: rgb(220, 220, 220)' size='20'  value='"+ sched3BToCommit[i].txtBalInputTax +"'  /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3B"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtBalInputTaxPrevious3B"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAllowInputTax3B"+i+"',4 ); " +
                    "d.getElementById('txtBalInputTax3B"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtBalInputTax3B"+i+"',4 ); " +
                    "",100);

            }
    }	
	
    function addlistSched3B()
    {
        if(checkifEmptyFieldSched3("B")) {
            var size = sched3BToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched3BToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased3B'+i).value;
                sched3BToCommit[i].txtDescription = d.getElementById('txtDescription3B'+i).value;
                sched3BToCommit[i].txtAmt = d.getElementById('txtAmt3B'+i).value;
                sched3BToCommit[i].txtInputTax = d.getElementById('txtBalInputTaxPrevious3B'+i).value;
                sched3BToCommit[i].txtEstLife = d.getElementById('txtEstLife3B'+i).value;
                sched3BToCommit[i].txtRecogLife = d.getElementById('txtRecogLife3B'+i).value;
                sched3BToCommit[i].txtAllowInputTax = d.getElementById('txtAllowInputTax3B'+i).value;
                sched3BToCommit[i].txtBalInputTax = d.getElementById('txtBalInputTax3B'+i).value;
            }
            i = sched3BToCommit.length;
            sched3BToCommit[i] = new Schedule3();

			$('#tbodyllistSched3B').html("");
			
            for(i = 0; i < sched3BToCommit.length; i++) {

				$('#tbodyllistSched3B').html(  d.getElementById('tbodyllistSched3B').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' class='printButtonClass' id='chxSched3B"+i+"' name='chxSched3B[]' /> </td>" +
                    "<td> <input type='text'  id='txtDatePurchased3B"+i+"' name='txtDatePurchased3B[]' style='width: 100px' value='"+ sched3BToCommit[i].txtDatePurchase +"' maxlength='10' onkeypress='return dateOnly(this, event)'  > </td>" +
                    "<td> <input type='text'  id='txtDescription3B"+i+"' name='txtDescription3B[]'  style='width: 150px' value='"+ sched3BToCommit[i].txtDescription +"' maxlength='50' > </td> " +
                    "<td><input type='text' id='txtAmt3B"+i+"' name='txtAmt3B[]'  value='"+ sched3BToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' size='20' maxlength='25' /> </td> " +
                    "<td><input type='text' id='txtBalInputTaxPrevious3B"+i+"' name='txtBalInputTaxPrevious3B[]'  value='"+ sched3BToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumTax3B()' size='20' maxlength='25'  /> </td>" +
                    "<td><input type='text' id='txtEstLife3B"+i+"' name='txtEstLife3B[]'  style='width: 80px'  value='"+ sched3BToCommit[i].txtEstLife +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);' maxlength='3'  /> </td>" +
                    "<td><input type='text' id='txtRecogLife3B"+i+"' name='txtRecogLife3B[]'  style='width: 80px'  value='"+ sched3BToCommit[i].txtRecogLife +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);computeSumTax3B();' maxlength='2'  /> </td>" +
                    "<td><input type='text' id='txtAllowInputTax3B"+i+"' name='txtAllowInputTax3B[]'  onblur='round(this,2); computeSumTax3B()' size='20' value='"+ sched3BToCommit[i].txtAllowInputTax +"'  /> </td>" +
                    "<td><input type='text' id='txtBalInputTax3B"+i+"' name='txtBalInputTax3B[]' style='background-color: rgb(220, 220, 220)' size='20'  value='"+ sched3BToCommit[i].txtBalInputTax +"'  /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3B"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtBalInputTaxPrevious3B"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAllowInputTax3B"+i+"',4 ); " +
                    "d.getElementById('txtBalInputTax3B"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtBalInputTax3B"+i+"',4 ); " +
                    "",100);

            }
        }
    }

    function deletelistSched3B()
    {
        var sched3BTemp = new Array();
        var i = 0;
        var size = sched3BToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            sched3BToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased3B'+i).value;
            sched3BToCommit[i].txtDescription = d.getElementById('txtDescription3B'+i).value;
            sched3BToCommit[i].txtAmt = d.getElementById('txtAmt3B'+i).value;
            sched3BToCommit[i].txtInputTax = d.getElementById('txtBalInputTaxPrevious3B'+i).value;
            sched3BToCommit[i].txtEstLife = d.getElementById('txtEstLife3B'+i).value;
            sched3BToCommit[i].txtRecogLife = d.getElementById('txtRecogLife3B'+i).value;
            sched3BToCommit[i].txtAllowInputTax = d.getElementById('txtAllowInputTax3B'+i).value;
            sched3BToCommit[i].txtBalInputTax = d.getElementById('txtBalInputTax3B'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched3B" + j).checked) {
                sched3BTemp[i++] = sched3BToCommit[j];
            }
        }

        if(sched3BTemp.length > 0) {
            sched3BToCommit = new Array();
            sched3BToCommit = sched3BTemp;
            //d.getElementById("tbodyllistSched3B").innerHTML = "";
			$('#tbodyllistSched3B').html("");
			
            for(i = 0; i < sched3BTemp.length; i++) {
                sched3BToCommit[i] = sched3BTemp[i];
                //d.getElementById("tbodyllistSched3B").innerHTML += "<tr>" +
				$('#tbodyllistSched3B').html(  d.getElementById('tbodyllistSched3B').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' class='printButtonClass' id='chxSched3B"+i+"' /> </td>" +
                    "<td> <input type='text'  id='txtDatePurchased3B"+i+"' style='width: 100px' value='"+ sched3BToCommit[i].txtDatePurchase +"' maxlength='10' onkeypress='return dateOnly(this, event)'  > </td>" +
                    "<td> <input type='text'  id='txtDescription3B"+i+"' style='width: 150px' value='"+ sched3BToCommit[i].txtDescription +"' maxlength='50' > </td> " +
                    "<td><input type='text' id='txtAmt3B"+i+"' style='width: 100px' value='"+ sched3BToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' size='20' maxlength='25' /> </td> " +
                    "<td><input type='text' id='txtBalInputTaxPrevious3B"+i+"' style='width: 100px'  value='"+ sched3BToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumTax3B()' size='20' maxlength='25'  /> </td>" +
                    "<td><input type='text' id='txtEstLife3B"+i+"' style='width: 80px'  value='"+ sched3BToCommit[i].txtEstLife +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);' maxlength='3'  /> </td>" +
                    "<td><input type='text' id='txtRecogLife3B"+i+"' style='width: 80px'  value='"+ sched3BToCommit[i].txtRecogLife +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);computeSumTax3B();' maxlength='2'  /> </td>" +
                    "<td><input type='text' id='txtAllowInputTax3B"+i+"' onblur='round(this,2); computeSumTax3B()' size='20' value='"+ sched3BToCommit[i].txtAllowInputTax +"'  /> </td>" +
                    "<td><input type='text' id='txtBalInputTax3B"+i+"'style='background-color: rgb(220, 220, 220)' size='20' value='"+ sched3BToCommit[i].txtBalInputTax +"'  /> </td>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3B"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtBalInputTaxPrevious3B"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAllowInputTax3B"+i+"',4 ); " +
                    "d.getElementById('txtBalInputTax3B"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtBalInputTax3B"+i+"',4 ); " +
                    "",100);

            }
        } else {
            sched3BToCommit = new Array();
          
			$('#tbodyllistSched3B').html("");
        }
        computeSumTax3B();
    }
	
	//jtrac 1311 rpangan 21May2013
	function valuesSched4and5(){
		d.getElementById('txtTaxableSaleSched4').value = d.getElementById('frm2550q:txtTax16A').value;
		d.getElementById('txtTotalSaleSched4').value = d.getElementById('frm2550q:txtTax19A').value;

		d.getElementById('txtTotSaleSched5').value = d.getElementById('frm2550q:txtTax18').value;
		d.getElementById('txtSumTotalSaleSched5').value = d.getElementById('frm2550q:txtTax19A').value;
	}
	
    function showSched4(){
        saveTempSched4Data();
        
        if(d.getElementById('frm2550q:txtTax16A').value <= 0 ) {
            alert("Please enter a valid value on Item 16A to be able to load the Schedule 4."); return;
        } else {
           
			d.getElementById('mainContent').style.display = "none";
			$('#modalSched4').show('blind');	
			$('#wrapper').css({'display':'none' });				

            d.getElementById('txtTaxableSaleSched4').value = d.getElementById('frm2550q:txtTax16A').value;
            d.getElementById('txtTotalSaleSched4').value = d.getElementById('frm2550q:txtTax19A').value;
         
            computeInputTaxSched4();
            setTimeout("setInputTextControl_HorizontalAlignment('txtinputtaxSched4', 4);" +
                "d.getElementById('txtTaxableSaleSched4').disabled = true; setInputTextControl_HorizontalAlignment('txtTaxableSaleSched4', 4);" +
                "setInputTextControl_HorizontalAlignment('txtInputTaxnotDirectSched4', 4);" +
                "d.getElementById('txtTotalInputTaxnotDirectSched4').disabled = true; setInputTextControl_HorizontalAlignment('txtTotalInputTaxnotDirectSched4', 4);" +
                "d.getElementById('txtTotalSaleSched4').disabled = true; setInputTextControl_HorizontalAlignment('txtTotalSaleSched4', 4);" +
                "d.getElementById('txtTotalInputSaletoGovernmentSched4').disabled = true; setInputTextControl_HorizontalAlignment('txtTotalInputSaletoGovernmentSched4', 4);" +
                "setInputTextControl_HorizontalAlignment('txtlessStdTaxSched4', 4);" +
                "d.getElementById('txtTotal20BSched4').disabled = true; setInputTextControl_HorizontalAlignment('txtTotal20BSched4', 4);", 100);


        }

        if(viewUploadFlag) {
            setTimeout("d.getElementById('btnClearPop4').disabled = true;", 100);
            setTimeout("d.getElementById('btnCancelPop4').disabled = true;", 100);
            setTimeout("toggleAllDisabled();", 100);
            setTimeout("d.getElementById('btnOkPop4').disabled = false;", 100);
        }

    }

    function checkifEmptyFieldSched4(){
        return true;
    }

    function saveTempSched4Data() {
        tempDirInputTax = d.getElementById("txtinputtaxSched4").value;
        tempInputNotAttrib = d.getElementById("txtInputTaxnotDirectSched4").value;
        tempRatInputTax = d.getElementById("txtTotalInputTaxnotDirectSched4").value;
        tempTotalInputTaxSched4 = d.getElementById("txtTotalInputSaletoGovernmentSched4").value;
        tempStanInputTax = d.getElementById("txtlessStdTaxSched4").value;
        tempInputSaleExp = d.getElementById("txtTotal20BSched4").value;
    }

    function restoreTempSched4Data() {
        d.getElementById("txtinputtaxSched4").value = tempDirInputTax;
        d.getElementById("txtInputTaxnotDirectSched4").value = tempInputNotAttrib;
        d.getElementById("txtTotalInputTaxnotDirectSched4").value = tempRatInputTax;
        d.getElementById("txtTotalInputSaletoGovernmentSched4").value = tempTotalInputTaxSched4;
        d.getElementById("txtlessStdTaxSched4").value = tempStanInputTax;
        d.getElementById("txtTotal20BSched4").value = tempInputSaleExp;
    }

    function clearSched4Modal() {
        d.getElementById("txtinputtaxSched4").value = "0.00";
        d.getElementById("txtInputTaxnotDirectSched4").value = "0.00";
        d.getElementById("txtTotalInputTaxnotDirectSched4").value = "0.00";
        d.getElementById("txtTotalInputSaletoGovernmentSched4").value = "0.00";
        d.getElementById("txtlessStdTaxSched4").value = "0.00";
        d.getElementById("txtTotal20BSched4").value = "0.00";
    }

    function cancelSched4Modal() {
        restoreTempSched4Data();

		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched4').css('display') != 'none' ) {
			$('#modalSched4').hide('blind');
			$('#wrapper').css({'display':'block' });
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");			

        isModalTurnOn = false;
    }

    function getSched4Modal(){
        if (checkifEmptyFieldSched4() )
        {
            d.getElementById('mainContent').style.display = 'block';
            d.getElementById('modalSched4').style.display = 'none';
            $('#wrapper').css({'display':'block' });
            d.getElementById('DummyTxt').innerHTML = "Creator";
            d.getElementById('DummyTxt').innerHTML = "";

            d.getElementById('frm2550q:txtTax23B').value  = d.getElementById('txtTotal20BSched4').value;
            compute23F();
        }
    }

    function showSched5(){
        saveTempSched5Data();
        
        if(d.getElementById('frm2550q:txtTax18').value <= 0 ) {
            alert("Please enter a valid value on Item 18 to be able to load the Schedule 5."); return;
        } else {
          
			d.getElementById('mainContent').style.display = "none";
			$('#modalSched5').show('blind');
			$('#wrapper').css({'display':'none' });				

            d.getElementById('txtTotSaleSched5').value = d.getElementById('frm2550q:txtTax18').value;
            d.getElementById('txtSumTotalSaleSched5').value = d.getElementById('frm2550q:txtTax19A').value;

            setTimeout("setInputTextControl_HorizontalAlignment('txtinputtaxSched5', 4);" +
                "d.getElementById('txtTotSaleSched5').disabled = true; setInputTextControl_HorizontalAlignment('txtTotSaleSched5', 4);" +
                "setInputTextControl_HorizontalAlignment('txtAmountInputnotDirectSched5', 4);" +
                "d.getElementById('txtProductnotDirectSched5').disabled = true; setInputTextControl_HorizontalAlignment('txtProductnotDirectSched5', 4);" +
                "d.getElementById('txtSumTotalSaleSched5').disabled = true; setInputTextControl_HorizontalAlignment('txtSumTotalSaleSched5', 4);" +
                "d.getElementById('txtTotal20CSched5').disabled = true; setInputTextControl_HorizontalAlignment('txtTotal20CSched5', 4);", 100);

        }

        if(viewUploadFlag) {
            setTimeout("d.getElementById('btnClearPop5').disabled = true;", 100);
            setTimeout("d.getElementById('btnCancelPop5').disabled = true;", 100);
            setTimeout("toggleAllDisabled();", 100);
            setTimeout("d.getElementById('btnOkPop5').disabled = false;", 100);
        }
    }

    function checkifEmptyFieldSched5(){
        return true;
    }

    function saveTempSched5Data() {
        inputTaxExmpt = d.getElementById("txtinputtaxSched5").value;
        inputNotAttribSched5 = d.getElementById("txtAmountInputnotDirectSched5").value;
        ratInputTaxSched5 = d.getElementById("txtProductnotDirectSched5").value;
        totalInputExmpt = d.getElementById("txtTotal20CSched5").value;
    }

    function restoreTempSched5Data() {
        d.getElementById("txtinputtaxSched5").value = inputTaxExmpt;
        d.getElementById("txtAmountInputnotDirectSched5").value = inputNotAttribSched5;
        d.getElementById("txtProductnotDirectSched5").value = ratInputTaxSched5;
        d.getElementById("txtTotal20CSched5").value = totalInputExmpt;
    }

    function clearSched5Modal() {
        d.getElementById("txtinputtaxSched5").value = "0.00";
        d.getElementById("txtAmountInputnotDirectSched5").value = "0.00";
        d.getElementById("txtProductnotDirectSched5").value = "0.00";
        d.getElementById("txtTotal20CSched5").value = "0.00";
    }

    function cancelSched5Modal() {
        restoreTempSched5Data();

		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched5').css('display') != 'none' ) {
			$('#modalSched5').hide('blind');
			$('#wrapper').css({'display':'block' });
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");
		
        isModalTurnOn = false;
    }

    function getSched5Modal(){
        if (checkifEmptyFieldSched5() )
        {
        
			 d.getElementById('mainContent').style.display = 'block';
			 if ( $('#modalSched5').css('display') != 'none' ) {
				$('#modalSched5').hide('blind');
				$('#wrapper').css({'display':'block' });
			 }
			 $('#DummyTxt').html("Creator");
			 $('#DummyTxt').html("");	
			
            d.getElementById('frm2550q:txtTax23C').value  = d.getElementById('txtTotal20CSched5').value;
            compute23F();
        }
    }

    function checkifEmptyFieldSched6() {

        var size = sched6ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtPeriodCovered'+ i).value == "" || d.getElementById('txtNameAgent'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 6.\n" +
                    "Empty fields are not allowed."); return ;
            } strmmddyyy = d.getElementById('txtPeriodCovered'+i).value;
           
			if(strmmddyyy != ""){
				var result = strmmddyyy.split("/")
				if(result.length == 3 ){
					//Variables
					var month = result[0];
					var day = result[1];
					var year = result[2];
					
					var isLeap = new Date(year, 1, 29).getMonth() == 1;
						
					if(isNaN(month) || isNaN(day) || isNaN(year)){
						alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
						"Please enter a date in the MM/DD/YYYY format.");
					return;
					}else{ 
						
						var month31 = (['01', '03', '05', '07', '08', '10', '12']);
						var month30 = (['04', '06', '09', '11']);
						if (month == 2) {
						    //Special Handling for Leap Year
						    if (!isLeap && day == 29) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only.");
						        return;
						    }
						    if (!isLeap && day > 29) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only.");
						        return;
						    }
						    if (isLeap && day > 29) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only.");
						        return;
						    }

						}
						if (month31.contains(month) && day > 31)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}
						else if (month30.contains(month) && day > 30)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						} 
						else {
						   
						    var strmmddyyyFrom = d.getElementById('frm2550q:RtnPeriodFrom').value;
						    var strmmddyyyTo = d.getElementById('frm2550q:RtnPeriodTo').value;
						 
						    var purchaseDate = new Date(strmmddyyy);

						    if (purchaseDate < new Date(strmmddyyyFrom) || purchaseDate > new Date(strmmddyyyTo)) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only."); return;
						    }

						}
					}
				}else{
				alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
				"Please enter a date in the MM/DD/YYYY format.");
				return;
				}
			}


            if( d.getElementById('txtIncomePayment'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Income Payment on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( d.getElementById('txtTotalWithheld'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Total Tax Withheld on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( d.getElementById('txtAppliedCurr'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Applied Current Month on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( NumWithComma(d.getElementById('txtAppliedCurr'+ i).value) > NumWithComma(d.getElementById('txtTotalWithheld'+ i).value)   ) {
                alert("The Applied Current Month on row " + ( i + 1) + " should not be greater than the Total Tax Withheld." ); return;
            }
        }

        return true;
    }

    function addlistSched6Reload()
    {
            var size = sched6ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched6ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCovered'+i).value;
                sched6ToCommit[i].txtNameAgent = d.getElementById('txtNameAgent'+i).value;
                sched6ToCommit[i].txtIncomePayment = d.getElementById('txtIncomePayment'+i).value;
                sched6ToCommit[i].txtTotalWithheld = d.getElementById('txtTotalWithheld'+i).value;
                sched6ToCommit[i].txtPrevious2Mo = d.getElementById('txtPrevious2Mo'+i).value;
                sched6ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurr'+i).value;
            }
            i = sched6ToCommit.length;
            sched6ToCommit[i] = new Schedule6and8();

            //d.getElementById("tbodyllistSched6").innerHTML = "";
			$('#tbodyllistSched6').html("");
			
            for(i = 0; i < sched6ToCommit.length; i++) {

                //d.getElementById("tbodyllistSched6").innerHTML += "<tr>" +
				$('#tbodyllistSched6').html(  d.getElementById('tbodyllistSched6').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' id='chxSched6"+i+"' name='chxSched6[]' /> </td>" +
                    "<td> <input type='text'  id='txtPeriodCovered"+i+"' name='txtPeriodCovered[]' style='width: 150px' value='"+ sched6ToCommit[i].txtPeriodCovered  +"' maxlength='10' onkeypress='return dateOnly(this, event)'  > </td>" +
                    "<td> <input type='text'  id='txtNameAgent"+i+"' name='txtNameAgent[]'  style='width: 190px' value='"+ sched6ToCommit[i].txtNameAgent +"'  maxlength='50' > </td> " +
                    "<td><input type='text' id='txtIncomePayment"+i+"' name='txtIncomePayment[]'  style='width: 150px' value='"+ sched6ToCommit[i].txtIncomePayment +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td><input type='text' id='txtTotalWithheld"+i+"' name='txtTotalWithheld[]'  style='width: 150px'  value='"+ sched6ToCommit[i].txtTotalWithheld +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtPrevious2Mo"+i+"' name='txtPrevious2Mo[]'  style='width: 150px'  value='"+ sched6ToCommit[i].txtPrevious2Mo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldApp()' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtAppliedCurr"+i+"' name='txtAppliedCurr[]'  style='width: 150px'  value='"+ sched6ToCommit[i].txtAppliedCurrMo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldApp()' maxlength='17' /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePayment"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtTotalWithheld"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtPrevious2Mo"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurr"+i+"',4 );",100);

            }
    }	
	
    function addlistSched6()
    {
        if(checkifEmptyFieldSched6()) {
            var size = sched6ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched6ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCovered'+i).value;
                sched6ToCommit[i].txtNameAgent = d.getElementById('txtNameAgent'+i).value;
                sched6ToCommit[i].txtIncomePayment = d.getElementById('txtIncomePayment'+i).value;
                sched6ToCommit[i].txtTotalWithheld = d.getElementById('txtTotalWithheld'+i).value;
                sched6ToCommit[i].txtPrevious2Mo = d.getElementById('txtPrevious2Mo'+i).value;
                sched6ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurr'+i).value;
            }
            i = sched6ToCommit.length;
            sched6ToCommit[i] = new Schedule6and8();

            //d.getElementById("tbodyllistSched6").innerHTML = "";
			$('#tbodyllistSched6').html("");
			
            for(i = 0; i < sched6ToCommit.length; i++) {

                //d.getElementById("tbodyllistSched6").innerHTML += "<tr>" +
				$('#tbodyllistSched6').html(  d.getElementById('tbodyllistSched6').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' id='chxSched6"+i+"' name='chxSched6[]' /> </td>" +
                    "<td> <input type='text'  id='txtPeriodCovered"+i+"' name='txtPeriodCovered[]'  style='width: 150px' value='"+ sched6ToCommit[i].txtPeriodCovered  +"' maxlength='10' onkeypress='return dateOnly(this, event)'  > </td>" +
                    "<td> <input type='text'  id='txtNameAgent"+i+"'  name='txtNameAgent[]' style='width: 190px' value='"+ sched6ToCommit[i].txtNameAgent +"'  maxlength='50' > </td> " +
                    "<td><input type='text' id='txtIncomePayment"+i+"' name='txtIncomePayment[]'  style='width: 150px' value='"+ sched6ToCommit[i].txtIncomePayment +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td><input type='text' id='txtTotalWithheld"+i+"' name='txtTotalWithheld[]'  style='width: 150px'  value='"+ sched6ToCommit[i].txtTotalWithheld +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtPrevious2Mo"+i+"' name='txtPrevious2Mo[]'  style='width: 150px'  value='"+ sched6ToCommit[i].txtPrevious2Mo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldApp()' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtAppliedCurr"+i+"' name='txtAppliedCurr[]'  style='width: 150px'  value='"+ sched6ToCommit[i].txtAppliedCurrMo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldApp()' maxlength='17' /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePayment"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtTotalWithheld"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtPrevious2Mo"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurr"+i+"',4 );",100);

            }
        }
    }

    function deletelistSched6()
    {
        var sched6Temp = new Array();
        var i = 0;
        var size = sched6ToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            sched6ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCovered'+i).value;
            sched6ToCommit[i].txtNameAgent = d.getElementById('txtNameAgent'+i).value;
            sched6ToCommit[i].txtIncomePayment = d.getElementById('txtIncomePayment'+i).value;
            sched6ToCommit[i].txtTotalWithheld = d.getElementById('txtTotalWithheld'+i).value;
            sched6ToCommit[i].txtPrevious2Mo = d.getElementById('txtPrevious2Mo'+i).value;
            sched6ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurr'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched6" + j).checked) {
                sched6Temp[i++] = sched6ToCommit[j];
            }
        }

        if(sched6Temp.length > 0) {
            sched6ToCommit = new Array();
            sched6ToCommit = sched6Temp;
			$('#tbodyllistSched6').html("");
			
            for(i = 0; i < sched6Temp.length; i++) {
                sched6ToCommit[i] = sched6Temp[i];
				$('#tbodyllistSched6').html(  d.getElementById('tbodyllistSched6').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' id='chxSched6"+i+"' /> </td>" +
                    "<td> <input type='text'  id='txtPeriodCovered"+i+"' style='width: 150px' value='"+ sched6ToCommit[i].txtPeriodCovered  +"' maxlength='10' onkeypress='return dateOnly(this, event)'  > </td>" +
                    "<td> <input type='text'  id='txtNameAgent"+i+"' style='width: 190px' value='"+ sched6ToCommit[i].txtNameAgent +"'  maxlength='50' > </td> " +
                    "<td><input type='text' id='txtIncomePayment"+i+"' style='width: 150px' value='"+ sched6ToCommit[i].txtIncomePayment +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td><input type='text' id='txtTotalWithheld"+i+"' style='width: 150px'  value='"+ sched6ToCommit[i].txtTotalWithheld +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtPrevious2Mo"+i+"' style='width: 150px'  value='"+ sched6ToCommit[i].txtPrevious2Mo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldApp()' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtAppliedCurr"+i+"' style='width: 150px'  value='"+ sched6ToCommit[i].txtAppliedCurrMo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldApp()' maxlength='17' /> </td>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePayment"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtTotalWithheld"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtPrevious2Mo"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurr"+i+"',4 );",100);
           
            }
        } else {
            sched6ToCommit = new Array();
			$('#tbodyllistSched6').html("");
        }
        computeSumWithheldApp();
    }

    function showSched6(){
        saveTempSched6Data();
        
		if (prevalidateReturnPeriod()) {
			if(d.getElementById('frm2550q:txtYear').value <= 2000 || d.getElementById('frm2550q:txtYear').value >= 2020 ) {
				alert("Please  enter a valid year for the Return Period. Only values 2000 and beyond will be accepted.") 
			} else {
				d.getElementById('mainContent').style.display = "none";
				$('#modalSched6').show('blind');	
				$('#wrapper').css({'display':'none' });
				
				for(var x = 0; x < d.getElementById("tblSched6").rows.length; x++) {
					setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePayment" + x + "', 4);", 100);
					setTimeout("setInputTextControl_HorizontalAlignment('txtTotalWithheld" + x + "', 4);", 100);
					setTimeout("setInputTextControl_HorizontalAlignment('txtPrevious2Mo" + x + "', 4);", 100);
					setTimeout("setInputTextControl_HorizontalAlignment('txtAppliedCurr" + x + "', 4);", 100);
				}

				setTimeout("d.getElementById('txtmodalTotal23A').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotal23A', 4);" +
					"d.getElementById('txtmodalTotalSched6AppliedCurrent').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalSched6AppliedCurrent', 4);" , 100);
				}

			if(viewUploadFlag) {
				setTimeout("d.getElementById('btnAdd4').disabled = true;", 100);
				setTimeout("d.getElementById('btnDelete4').disabled = true;", 100);
				setTimeout("d.getElementById('btnClearPop6').disabled = true;", 100);
				setTimeout("d.getElementById('btnCancelPop6').disabled = true;", 100);
				setTimeout("toggleAllDisabled();", 100);
				setTimeout("d.getElementById('btnOkPop6').disabled = false;", 100);
			}
		} else { alert("Please enter a valid date for Item 1."); return; }

    }

    function saveTempSched6Data() {
        var x;
        tempRowSizeSched6 = d.getElementById("tblSched6").rows.length - 1;

        for(x = 0; x < tempRowSizeSched6; x++){
            tempTempPeriodCovered[x] = d.getElementById("txtPeriodCovered" + x).value;
            tempAgentNm[x] = d.getElementById("txtNameAgent" + x).value;
            tempIncPaymnt[x] = d.getElementById("txtIncomePayment" + x).value;
            totalTaxWithld[x] = d.getElementById("txtTotalWithheld" + x).value;
            appPrev[x] = d.getElementById("txtPrevious2Mo" + x).value;
            appCurr[x] = d.getElementById("txtAppliedCurr" + x).value;
            sched7TotalPrev[x] = d.getElementById("txtmodalTotal23A").value;
            sched7TotalCurr[x] = d.getElementById("txtmodalTotalSched6AppliedCurrent").value;
        }
    }

    function restoreTempSched6Data() {
        if(tempRowSizeSched6 > 0) {
            sched6ToCommit = new Array();
			$('#tbodyllistSched6').html("");
			
            var x = 0;

            x = 0;
            var initCount = 0;

            for(x = 0; x < tempRowSizeSched6; x++){
                addlistSched6();

                d.getElementById("txtPeriodCovered" + x).value = tempTempPeriodCovered[x];
                d.getElementById("txtNameAgent" + x).value = tempAgentNm[x];
                d.getElementById("txtIncomePayment" + x).value = tempIncPaymnt[x];
                d.getElementById("txtTotalWithheld" + x).value = totalTaxWithld[x];
                d.getElementById("txtPrevious2Mo" + x).value = appPrev[x];
                d.getElementById("txtAppliedCurr" + x).value = appCurr[x];

                if(initCount == (tempRowSizeSched6 - 1)){
                    d.getElementById("txtmodalTotal23A").value = sched7TotalPrev[x];
                    d.getElementById("txtmodalTotalSched6AppliedCurrent").value = sched7TotalCurr[x];
                }

                initCount++;
                computeSumWithheldApp();
            }
        }
    }

    function clearSched6Modal() {
        var x;
        var rowSizeSched6 = d.getElementById("tblSched6").rows.length - 1;
        
        for(x = 0; x < rowSizeSched6; x++){
            d.getElementById("txtPeriodCovered" + x).value = "";
            d.getElementById("txtNameAgent" + x).value = "";
            d.getElementById("txtIncomePayment" + x).value = "0.00";
            d.getElementById("txtTotalWithheld" + x).value = "0.00";
            d.getElementById("txtPrevious2Mo" + x).value = "0.00";
            d.getElementById("txtAppliedCurr" + x).value = "0.00";
            d.getElementById("txtmodalTotal23A").value = "0.00";
            d.getElementById("txtmodalTotalSched6AppliedCurrent").value = "0.00";
        }
    }

    function cancelSched6Modal() {
        restoreTempSched6Data();

		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched6').css('display') != 'none' ) {
			$('#modalSched6').hide('blind');
			$('#wrapper').css({'display':'block' });
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");
		
        isModalTurnOn = false;
    }

    function getSched6Modal(){
        if (checkifEmptyFieldSched6() )
        {
			d.getElementById('mainContent').style.display = 'block';
			if ( $('#modalSched6').css('display') != 'none' ) {
				$('#modalSched6').hide('blind');
				$('#wrapper').css({'display':'block' });
			}
			$('#DummyTxt').html("Creator");
			$('#DummyTxt').html("");				

			d.getElementById('frm2550q:txtTax26B').value = formatCurrency(NumWithComma(d.getElementById('txtmodalTotalSched6AppliedCurrent').value) + NumWithComma(d.getElementById('txtmodalTotal23A').value));
            compute26H();
        }
    }

    function checkifEmptyFieldSched7() {

        var size = sched7ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtPeriodCoveredSch7'+ i).value == "" || d.getElementById('txtNameMillerSch7'+ i).value == "" ||
                d.getElementById('txtNameTaxPayerSch7'+ i).value == "" || d.getElementById('txtORNumSch7'+ i).value == ""  ) {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 7.\n" +
                    "Empty fields are not allowed."); return ;
            } strmmddyyy = d.getElementById('txtPeriodCoveredSch7'+i).value;
 
			if(strmmddyyy != ""){
				var result = strmmddyyy.split("/")
				if(result.length == 3 ){
					//Variables
					var month = result[0];
					var day = result[1];
					var year = result[2];
					
					var isLeap = new Date(year, 1, 29).getMonth() == 1;
						
					if(isNaN(month) || isNaN(day) || isNaN(year)){
						alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
						"Please enter a date in the MM/DD/YYYY format.");
					return;
					}else{ 
						var month31 = (['01', '03', '05', '07', '08', '10', '12']);
						var month30 = (['04', '06', '09', '11']);
						if (month == 2) {
						   
						    if (!isLeap && day == 29) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only.");
						        return;
						    }
						    if (!isLeap && day > 29) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only.");
						        return;
						    }
						    if (isLeap && day > 29) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only.");
						        return;
						    }

						}
						if (month31.contains(month) && day > 31)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}
						else if (month30.contains(month) && day > 30)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						} 
						else {
						  
						    var strmmddyyyFrom = d.getElementById('frm2550q:RtnPeriodFrom').value;
						    var strmmddyyyTo = d.getElementById('frm2550q:RtnPeriodTo').value;
						   

						    var purchaseDate = new Date(strmmddyyy);

						    if (purchaseDate < new Date(strmmddyyyFrom) || purchaseDate > new Date(strmmddyyyTo)) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only."); return;
						    }

						}
					}
				}else{
				alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
				"Please enter a date in the MM/DD/YYYY format.");
				return;
				}
			}

			
            if( d.getElementById('txtAmountPaidSch7'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Amount Paid on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( d.getElementById('txtAppliedCurrSch7'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Applied Current Month on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( NumWithComma(d.getElementById('txtAppliedCurrSch7'+ i).value) > NumWithComma(d.getElementById('txtAmountPaidSch7'+ i).value)   ) {
                alert("The Applied Current Month on row " + ( i + 1) + " should not be greater than the Total Tax Withheld." ); return;
            }
        }

        return true;
    }

    function addlistSched7Reload()
    {
            var size = sched7ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched7ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCoveredSch7'+i).value;
                sched7ToCommit[i].txtNameMiller = d.getElementById('txtNameMillerSch7'+i).value;
                sched7ToCommit[i].txtNameTaxPayer = d.getElementById('txtNameTaxPayerSch7'+i).value;
                sched7ToCommit[i].txtORNumber = d.getElementById('txtORNumSch7'+i).value;
                sched7ToCommit[i].txtAmountPaid = d.getElementById('txtAmountPaidSch7'+i).value;
                sched7ToCommit[i].txtPrevious2Mo = d.getElementById('txtPrevious2MoSch7'+i).value;
                sched7ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurrSch7'+i).value;
            }
            i = sched7ToCommit.length;
            sched7ToCommit[i] = new Schedule7();

           
			$('#tbodyllistSched7').html("");
			
            for(i = 0; i < sched7ToCommit.length; i++) {

				$('#tbodyllistSched7').html(  d.getElementById('tbodyllistSched7').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' id='chxSched7"+i+"' name='chxSched7[]' /> </td>" +
                    "<td> <input type='text'  id='txtPeriodCoveredSch7"+i+"' name='txtPeriodCoveredSch7[]' style='width: 150px' value='"+ sched7ToCommit[i].txtPeriodCovered  +"' maxlength='10' onkeypress='return dateOnly(this, event)'  > </td>" +
                    "<td> <input type='text'  id='txtNameMillerSch7"+i+"' name='txtNameMillerSch7[]'  style='width: 190px' value='"+ sched7ToCommit[i].txtNameMiller +"'  maxlength='50' > </td> " +
                    "<td><input type='text' id='txtNameTaxPayerSch7"+i+"' name='txtNameTaxPayerSch7[]'  style='width: 150px' value='"+ sched7ToCommit[i].txtNameTaxPayer +"'   maxlength='17' /> </td> " +
                    "<td><input type='text' id='txtORNumSch7"+i+"' name='txtORNumSch7[]'  style='width: 150px'  value='"+ sched7ToCommit[i].txtORNumber +"'  maxlength='20' /> </td>" +
                    "<td><input type='text' id='txtAmountPaidSch7"+i+"' name='txtAmountPaidSch7[]'  style='width: 150px'  value='"+ sched7ToCommit[i].txtAmountPaid +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtPrevious2MoSch7"+i+"' name='txtPrevious2MoSch7[]'  style='width: 150px'  value='"+ sched7ToCommit[i].txtPrevious2Mo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldAppSch7()' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtAppliedCurrSch7"+i+"' name='txtAppliedCurrSch7[]'  style='width: 150px'  value='"+ sched7ToCommit[i].txtAppliedCurrMo  +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldAppSch7()' maxlength='17' /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtAmountPaidSch7"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtPrevious2MoSch7"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurrSch7"+i+"',4 );",100);
				 }
    }	
	
    function addlistSched7()
    {
        if(checkifEmptyFieldSched7()) {
            var size = sched7ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched7ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCoveredSch7'+i).value;
                sched7ToCommit[i].txtNameMiller = d.getElementById('txtNameMillerSch7'+i).value;
                sched7ToCommit[i].txtNameTaxPayer = d.getElementById('txtNameTaxPayerSch7'+i).value;
                sched7ToCommit[i].txtORNumber = d.getElementById('txtORNumSch7'+i).value;
                sched7ToCommit[i].txtAmountPaid = d.getElementById('txtAmountPaidSch7'+i).value;
                sched7ToCommit[i].txtPrevious2Mo = d.getElementById('txtPrevious2MoSch7'+i).value;
                sched7ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurrSch7'+i).value;
            }
            i = sched7ToCommit.length;
            sched7ToCommit[i] = new Schedule7();

			$('#tbodyllistSched7').html("");
			
            for(i = 0; i < sched7ToCommit.length; i++) {

				$('#tbodyllistSched7').html(  d.getElementById('tbodyllistSched7').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' id='chxSched7"+i+"' name='chxSched7[]' /> </td>" +
                    "<td> <input type='text'  id='txtPeriodCoveredSch7"+i+"'  name='txtPeriodCoveredSch7[]' style='width: 150px' value='"+ sched7ToCommit[i].txtPeriodCovered  +"' maxlength='10'  onkeypress='return dateOnly(this, event)' > </td>" +
                    "<td> <input type='text'  id='txtNameMillerSch7"+i+"'  name='txtNameMillerSch7[]' style='width: 190px' value='"+ sched7ToCommit[i].txtNameMiller +"'  maxlength='50' > </td> " +
                    "<td><input type='text' id='txtNameTaxPayerSch7"+i+"'  name='txtNameTaxPayerSch7[]' style='width: 150px' value='"+ sched7ToCommit[i].txtNameTaxPayer +"'   maxlength='17' /> </td> " +
                    "<td><input type='text' id='txtORNumSch7"+i+"'  name='txtORNumSch7[]' style='width: 150px'  value='"+ sched7ToCommit[i].txtORNumber +"'  maxlength='20' /> </td>" +
                    "<td><input type='text' id='txtAmountPaidSch7"+i+"'  name='txtAmountPaidSch7[]' style='width: 150px'  value='"+ sched7ToCommit[i].txtAmountPaid +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtPrevious2MoSch7"+i+"' name='txtPrevious2MoSch7[]'  style='width: 150px'  value='"+ sched7ToCommit[i].txtPrevious2Mo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldAppSch7()' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtAppliedCurrSch7"+i+"'  name='txtAppliedCurrSch7[]' style='width: 150px'  value='"+ sched7ToCommit[i].txtAppliedCurrMo  +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldAppSch7()' maxlength='17' /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtAmountPaidSch7"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtPrevious2MoSch7"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurrSch7"+i+"',4 );",100);

          
            }
        }
    }

    function deletelistSched7()
    {
        var sched7Temp = new Array();
        var i = 0;
        var size = sched7ToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            sched7ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCoveredSch7'+i).value;
            sched7ToCommit[i].txtNameMiller = d.getElementById('txtNameMillerSch7'+i).value;
            sched7ToCommit[i].txtNameTaxPayer = d.getElementById('txtNameTaxPayerSch7'+i).value;
            sched7ToCommit[i].txtORNumber = d.getElementById('txtORNumSch7'+i).value;
            sched7ToCommit[i].txtAmountPaid = d.getElementById('txtAmountPaidSch7'+i).value;
            sched7ToCommit[i].txtPrevious2Mo = d.getElementById('txtPrevious2MoSch7'+i).value;
            sched7ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurrSch7'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched7" + j).checked) {
                sched7Temp[i++] = sched7ToCommit[j];
            }
        }

        if(sched7Temp.length > 0) {
            sched7ToCommit = new Array();
            sched7ToCommit = sched7Temp;
			$('#tbodyllistSched7').html("");
			
            for(i = 0; i < sched7Temp.length; i++) {
                sched7ToCommit[i] = sched7Temp[i];
				$('#tbodyllistSched7').html(  d.getElementById('tbodyllistSched7').innerHTML + 
                    "<td> <input type='checkbox' id='chxSched7"+i+"' /> </td>" +
                    "<td> <input type='text'  id='txtPeriodCoveredSch7"+i+"' style='width: 150px' value='"+ sched7ToCommit[i].txtPeriodCovered  +"' maxlength='10'  onkeypress='return dateOnly(this, event)' > </td>" +
                    "<td> <input type='text'  id='txtNameMillerSch7"+i+"' style='width: 190px' value='"+ sched7ToCommit[i].txtNameMiller +"'  maxlength='50' > </td> " +
                    "<td><input type='text' id='txtNameTaxPayerSch7"+i+"' style='width: 150px' value='"+ sched7ToCommit[i].txtNameTaxPayer +"'   maxlength='17' /> </td> " +
                    "<td><input type='text' id='txtORNumSch7"+i+"' style='width: 150px'  value='"+ sched7ToCommit[i].txtORNumber +"'  maxlength='20' /> </td>" +
                    "<td><input type='text' id='txtAmountPaidSch7"+i+"' style='width: 150px'  value='"+ sched7ToCommit[i].txtAmountPaid +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtPrevious2MoSch7"+i+"' style='width: 150px'  value='"+ sched7ToCommit[i].txtPrevious2Mo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldAppSch7()' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtAppliedCurrSch7"+i+"' style='width: 150px'  value='"+ sched7ToCommit[i].txtAppliedCurrMo  +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldAppSch7()' maxlength='17' /> </td>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtAmountPaidSch7"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtPrevious2MoSch7"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurrSch7"+i+"',4 );",100);
             }
        } else {
            sched7ToCommit = new Array();
            
			$('#tbodyllistSched7').html("");
        }
        computeSumWithheldAppSch7();
    }

    function showSched7(){
        saveTempSched7Data();

        if(d.getElementById('frm2550q:txtYear').value <= 2000 && d.getElementById('frm2550q:txtYear').value <= 2020 ) {
            alert("Please  enter a valid year for the Return Period. Only values 2000 and beyond will be accepted."); return;
        } else {
           
			d.getElementById('mainContent').style.display = "none";
			$('#modalSched7').show('blind');	
			$('#wrapper').css({'display':'none' });			

            for(var x = 0; x < d.getElementById("tblSched7").rows.length; x++) {
                setTimeout("setInputTextControl_HorizontalAlignment('txtAmountPaidSch7" + x + "', 4);", 100);
                setTimeout("setInputTextControl_HorizontalAlignment('txtPrevious2MoSch7" + x + "', 4);", 100);
                setTimeout("setInputTextControl_HorizontalAlignment('txtAppliedCurrSch7" + x + "', 4);", 100);
			}

            setTimeout("d.getElementById('txtmodalTotal23B').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotal23B', 4);" +
                "d.getElementById('txtmodalTotalSched7AppliedCurrent').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalSched7AppliedCurrent', 4);" , 100);
			}

        if(viewUploadFlag) {
            setTimeout("d.getElementById('btnAdd5').disabled = true;", 100);
            setTimeout("d.getElementById('btnDelete5').disabled = true;", 100);
            setTimeout("d.getElementById('btnClearPop7').disabled = true;", 100);
            setTimeout("d.getElementById('btnCancelPop7').disabled = true;", 100);
            setTimeout("toggleAllDisabled();", 100);
            setTimeout("d.getElementById('btnOkPop7').disabled = false;", 100);
        }
    }

    function saveTempSched7Data() {
        var x;
        tempRowSizeSched7 = d.getElementById("tblSched7").rows.length - 1;

        for(x = 0; x < tempRowSizeSched7; x++){
            tempTempPeriodCovered7[x] = d.getElementById("txtPeriodCoveredSch7" + x).value;
            tempMillerNm7[x] = d.getElementById("txtNameMillerSch7" + x).value;
            tempAgentNm7[x] = d.getElementById("txtNameTaxPayerSch7" + x).value;
            tempOrNumber7[x] = d.getElementById("txtORNumSch7" + x).value;
            tempAmtPaid7[x] = d.getElementById("txtAmountPaidSch7" + x).value;
            tempAppPrev7[x] = d.getElementById("txtPrevious2MoSch7" + x).value;
            tempAppCurr7[x] = d.getElementById("txtAppliedCurrSch7" + x).value;
            tempSched8TotalPrev7[x] = d.getElementById("txtmodalTotal23B").value;
            tempSched8TotalCurr7[x] = d.getElementById("txtmodalTotalSched7AppliedCurrent").value;
        }
    }

    function restoreTempSched7Data() {
        if(tempRowSizeSched7 > 0) {
            sched7ToCommit = new Array();
            //d.getElementById("tbodyllistSched7").innerHTML = "";
			$('#tbodyllistSched7').html("");
            var x = 0;

            x = 0;
            var initCount = 0;

            for(x = 0; x < tempRowSizeSched7; x++){
                addlistSched7();

                d.getElementById("txtPeriodCoveredSch7" + x).value = tempTempPeriodCovered7[x];
                d.getElementById("txtNameMillerSch7" + x).value = tempMillerNm7[x];
                d.getElementById("txtNameTaxPayerSch7" + x).value = tempAgentNm7[x];
                d.getElementById("txtORNumSch7" + x).value = tempOrNumber7[x];
                d.getElementById("txtAmountPaidSch7" + x).value = tempAmtPaid7[x];
                d.getElementById("txtPrevious2MoSch7" + x).value = tempAppPrev7[x];
                d.getElementById("txtAppliedCurrSch7" + x).value = tempAppCurr7[x];

                if(initCount == (tempRowSizeSched7 - 1)){
                    d.getElementById("txtmodalTotal23B").value = tempSched8TotalPrev7[x];
                    d.getElementById("txtmodalTotalSched7AppliedCurrent").value = tempSched8TotalCurr7[x];
                }

                initCount++;
                computeSumWithheldAppSch7();
            }
        }
    }

    function clearSched7Modal() {
        var x;
        var rowSizeSched7 = d.getElementById("tblSched7").rows.length - 1;

        for(x = 0; x < rowSizeSched7; x++){
            d.getElementById("txtPeriodCoveredSch7" + x).value = "";
            d.getElementById("txtNameMillerSch7" + x).value = "";
            d.getElementById("txtNameTaxPayerSch7" + x).value = "";
            d.getElementById("txtORNumSch7" + x).value = "";
            d.getElementById("txtAmountPaidSch7" + x).value = "0.00";
            d.getElementById("txtPrevious2MoSch7" + x).value = "0.00";
            d.getElementById("txtAppliedCurrSch7" + x).value = "0.00";
            d.getElementById("txtmodalTotal23B").value = "0.00";
            d.getElementById("txtmodalTotalSched7AppliedCurrent").value = "0.00";
        }
    }

    function cancelSched7Modal() {
        restoreTempSched7Data();

		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched7').css('display') != 'none' ) {
			$('#modalSched7').hide('blind');
			$('#wrapper').css({'display':'block' });
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");
		
        isModalTurnOn = false;
    }

    function getSched7Modal(){
        if (checkifEmptyFieldSched7() )
        {
			d.getElementById('mainContent').style.display = 'block';
			if ( $('#modalSched7').css('display') != 'none' ) {
				$('#modalSched7').hide('blind');
				$('#wrapper').css({'display':'block' });
			}
			$('#DummyTxt').html("Creator");
			$('#DummyTxt').html("");
			
			d.getElementById('frm2550q:txtTax26C').value = formatCurrency(NumWithComma(d.getElementById('txtmodalTotalSched7AppliedCurrent').value) + NumWithComma(d.getElementById('txtmodalTotal23B').value));
            compute26H();
        }
    }

    function checkifEmptyFieldSched8() {

        var size = sched8ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtPeriodCoveredSch8'+ i).value == "" || d.getElementById('txtNameAgentSch8'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 8.\n" +
                    "Empty fields are not allowed."); return ;
            } strmmddyyy = d.getElementById('txtPeriodCoveredSch8'+i).value;

			//--Benjie Manalaysay 11/06/2013
			if(strmmddyyy != ""){
				var result = strmmddyyy.split("/")
				if(result.length == 3 ){
					//Variables
					var month = result[0];
					var day = result[1];
					var year = result[2];
					
					var isLeap = new Date(year, 1, 29).getMonth() == 1;
						
					if(isNaN(month) || isNaN(day) || isNaN(year)){
						alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
						"Please enter a date in the MM/DD/YYYY format.");
					return;
					}else{ 
						
						var month31 = (['01', '03', '05', '07', '08', '10', '12']);
						var month30 = (['04', '06', '09', '11']);
						if (month == 2) {
						    //Special Handling for Leap Year
						    if (!isLeap && day == 29) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only.");
						        return;
						    }
						    if (!isLeap && day > 29) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only.");
						        return;
						    }
						    if (isLeap && day > 29) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only.");
						        return;
						    }

						}
						if (month31.contains(month) && day > 31)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}
						else if (month30.contains(month) && day > 30)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						} 
						else {
						    var strmmddyyyFrom = d.getElementById('frm2550q:RtnPeriodFrom').value;
						    var strmmddyyyTo = d.getElementById('frm2550q:RtnPeriodTo').value;
						   

						    var purchaseDate = new Date(strmmddyyy);

						    if (purchaseDate < new Date(strmmddyyyFrom) || purchaseDate > new Date(strmmddyyyTo)) {
						        alert("Invalid entry on row " + (i + 1) + ". Date of Purchase must be within the Return Period only."); return;
						    }

						}
					}
				}else{
				alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
				"Please enter a date in the MM/DD/YYYY format.");
				return;
				}
			}

            
            if( d.getElementById('txtIncomePaymentSch8'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Income Payment on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( d.getElementById('txtTotalWithheldSch8'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Total Tax Withheld on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( d.getElementById('txtAppliedCurrSch8'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Applied Current Month on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( NumWithComma(d.getElementById('txtAppliedCurrSch8'+ i).value) > NumWithComma(d.getElementById('txtTotalWithheldSch8'+ i).value)   ) {
                alert("The Applied Current Month on row " + ( i + 1) + " should not be greater than the Total Tax Withheld." ); return;
            }
        }

        return true;
    }

    function addlistSched8Reload()
    {
            var size = sched8ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched8ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCoveredSch8'+i).value;
                sched8ToCommit[i].txtNameAgent = d.getElementById('txtNameAgentSch8'+i).value;
                sched8ToCommit[i].txtIncomePayment = d.getElementById('txtIncomePaymentSch8'+i).value;
                sched8ToCommit[i].txtTotalWithheld = d.getElementById('txtTotalWithheldSch8'+i).value;
                sched8ToCommit[i].txtPrevious2Mo = d.getElementById('txtPrevious2MoSch8'+i).value;
                sched8ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurrSch8'+i).value;
            }
            i = sched8ToCommit.length;
            sched8ToCommit[i] = new Schedule6and8();

            //d.getElementById("tbodyllistSched8").innerHTML = "";
			$('#tbodyllistSched8').html("");
			
            for(i = 0; i < sched8ToCommit.length; i++) {

                //d.getElementById("tbodyllistSched8").innerHTML += "<tr>" +
				$('#tbodyllistSched8').html(  d.getElementById('tbodyllistSched8').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' id='chxSched8"+i+"' name='chxSched8[]' /> </td>" +
                    "<td> <input type='text'  id='txtPeriodCoveredSch8"+i+"' name='txtPeriodCoveredSch8[]'  style='width: 150px' value='"+ sched8ToCommit[i].txtPeriodCovered  +"' maxlength='10'  onkeypress='return dateOnly(this, event)' > </td>" +
                    "<td> <input type='text'  id='txtNameAgentSch8"+i+"'  name='txtNameAgentSch8[]' style='width: 190px' value='"+ sched8ToCommit[i].txtNameAgent +"'  maxlength='50' > </td> " +
                    "<td><input type='text' id='txtIncomePaymentSch8"+i+"' name='txtIncomePaymentSch8[]'  style='width: 150px' value='"+ sched8ToCommit[i].txtIncomePayment +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td><input type='text' id='txtTotalWithheldSch8"+i+"' name='txtTotalWithheldSch8[]'  style='width: 150px'  value='"+ sched8ToCommit[i].txtTotalWithheld +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtPrevious2MoSch8"+i+"' name='txtPrevious2MoSch8[]'  style='width: 150px'  value='"+ sched8ToCommit[i].txtPrevious2Mo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldAppSch8()' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtAppliedCurrSch8"+i+"' name='txtAppliedCurrSch8[]'  style='width: 150px'  value='"+ sched8ToCommit[i].txtAppliedCurrMo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldAppSch8()' maxlength='17' /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePaymentSch8"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtTotalWithheldSch8"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtPrevious2MoSch8"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurrSch8"+i+"',4 );",100);

         }
    }	
	
    function addlistSched8()
    {
        if(checkifEmptyFieldSched8()) {
            var size = sched8ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched8ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCoveredSch8'+i).value;
                sched8ToCommit[i].txtNameAgent = d.getElementById('txtNameAgentSch8'+i).value;
                sched8ToCommit[i].txtIncomePayment = d.getElementById('txtIncomePaymentSch8'+i).value;
                sched8ToCommit[i].txtTotalWithheld = d.getElementById('txtTotalWithheldSch8'+i).value;
                sched8ToCommit[i].txtPrevious2Mo = d.getElementById('txtPrevious2MoSch8'+i).value;
                sched8ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurrSch8'+i).value;
            }
            i = sched8ToCommit.length;
            sched8ToCommit[i] = new Schedule6and8();

            
			$('#tbodyllistSched8').html("");
			
            for(i = 0; i < sched8ToCommit.length; i++) {

               
				$('#tbodyllistSched8').html(  d.getElementById('tbodyllistSched8').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' id='chxSched8"+i+"' name='chxSched8[]'/> </td>" +
                    "<td> <input type='text'  id='txtPeriodCoveredSch8"+i+"' name='txtPeriodCoveredSch8[]' style='width: 150px' value='"+ sched8ToCommit[i].txtPeriodCovered  +"' maxlength='10'  onkeypress='return dateOnly(this, event)' > </td>" +
                    "<td> <input type='text'  id='txtNameAgentSch8"+i+"' name='txtNameAgentSch8[]' style='width: 190px' value='"+ sched8ToCommit[i].txtNameAgent +"'  maxlength='50' > </td> " +
                    "<td><input type='text' id='txtIncomePaymentSch8"+i+"'  name='txtIncomePaymentSch8[]'style='width: 150px' value='"+ sched8ToCommit[i].txtIncomePayment +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td><input type='text' id='txtTotalWithheldSch8"+i+"' name='txtTotalWithheldSch8[]' style='width: 150px'  value='"+ sched8ToCommit[i].txtTotalWithheld +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtPrevious2MoSch8"+i+"' name='txtPrevious2MoSch8[]' style='width: 150px'  value='"+ sched8ToCommit[i].txtPrevious2Mo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldAppSch8()' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtAppliedCurrSch8"+i+"' name='txtAppliedCurrSch8[]' style='width: 150px'  value='"+ sched8ToCommit[i].txtAppliedCurrMo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldAppSch8()' maxlength='17' /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePaymentSch8"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtTotalWithheldSch8"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtPrevious2MoSch8"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurrSch8"+i+"',4 );",100);
				}
        }
    }

    function deletelistSched8()
    {
        var sched8Temp = new Array();
        var i = 0;
        var size = sched8ToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            sched8ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCoveredSch8'+i).value;
            sched8ToCommit[i].txtNameAgent = d.getElementById('txtNameAgentSch8'+i).value;
            sched8ToCommit[i].txtIncomePayment = d.getElementById('txtIncomePaymentSch8'+i).value;
            sched8ToCommit[i].txtTotalWithheld = d.getElementById('txtTotalWithheldSch8'+i).value;
            sched8ToCommit[i].txtPrevious2Mo = d.getElementById('txtPrevious2MoSch8'+i).value;
            sched8ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurrSch8'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched8" + j).checked) {
                sched8Temp[i++] = sched8ToCommit[j];
            }
        }

        if(sched8Temp.length > 0) {
            sched8ToCommit = new Array();
            sched8ToCommit = sched8Temp;
           
			$('#tbodyllistSched8').html("");
			
            for(i = 0; i < sched8Temp.length; i++) {
                sched8ToCommit[i] = sched8Temp[i];
				$('#tbodyllistSched8').html(  d.getElementById('tbodyllistSched8').innerHTML + "<tr>" +
                    "<td> <input type='checkbox' id='chxSched8"+i+"' name='chxSched8[]' /> </td>" +
                    "<td> <input type='text'  id='txtPeriodCoveredSch8"+i+"' name='txtPeriodCoveredSch8[]'  style='width: 150px' value='"+ sched8ToCommit[i].txtPeriodCovered  +"' maxlength='10'  onkeypress='return dateOnly(this, event)' > </td>" +
                    "<td> <input type='text'  id='txtNameAgentSch8"+i+"' name='txtNameAgentSch8[]'  style='width: 190px' value='"+ sched8ToCommit[i].txtNameAgent +"'  maxlength='50' > </td> " +
                    "<td><input type='text' id='txtIncomePaymentSch8"+i+"' name='txtIncomePaymentSch8[]'  style='width: 150px' value='"+ sched8ToCommit[i].txtIncomePayment +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td><input type='text' id='txtTotalWithheldSch8"+i+"' name='txtTotalWithheldSch8[]'  style='width: 150px'  value='"+ sched8ToCommit[i].txtTotalWithheld +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtPrevious2MoSch8"+i+"' name='txtPrevious2MoSch8[]'  style='width: 150px'  value='"+ sched8ToCommit[i].txtPrevious2Mo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldAppSch8()' maxlength='17' /> </td>" +
                    "<td><input type='text' id='txtAppliedCurrSch8"+i+"' name='txtAppliedCurrSch8[]'  style='width: 150px'  value='"+ sched8ToCommit[i].txtAppliedCurrMo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeSumWithheldAppSch8()' maxlength='17' /> </td>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePaymentSch8"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtTotalWithheldSch8"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtPrevious2MoSch8"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurrSch8"+i+"',4 );",100);
				}
        } else {
            sched8ToCommit = new Array();
			$('#tbodyllistSched8').html("");
        }
        computeSumWithheldAppSch8();
    }

    function showSched8(){
        saveTempSched8Data();

        if(d.getElementById('frm2550q:txtYear').value <= 2000 && d.getElementById('frm2550q:txtYear').value <= 2020 ) {
            alert("Please  enter a valid year for the Return Period. Only values 2000 and beyond will be accepted."); return;
        } else {
           
			d.getElementById('mainContent').style.display = "none";		
			$('#modalSched8').show('blind');
			$('#wrapper').css({'display':'none' });
			
            for(var x = 0; x < d.getElementById("tblSched8").rows.length; x++) {
                setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePaymentSch8" + x + "', 4);", 100);
                setTimeout("setInputTextControl_HorizontalAlignment('txtTotalWithheldSch8" + x + "', 4);", 100);
                setTimeout("setInputTextControl_HorizontalAlignment('txtPrevious2MoSch8" + x + "', 4);", 100);
                setTimeout("setInputTextControl_HorizontalAlignment('txtAppliedCurrSch8" + x + "', 4);", 100);

       	 }

            setTimeout("d.getElementById('txtmodalTotal23C').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotal23C', 4);" +
                "d.getElementById('txtmodalTotalSched8AppliedCurrent').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalSched8AppliedCurrent', 4);" , 100);

        }

        if(viewUploadFlag) {
            setTimeout("d.getElementById('btnAdd6').disabled = true;", 100);
            setTimeout("d.getElementById('btnDelete6').disabled = true;", 100);
            setTimeout("d.getElementById('btnClearPop8').disabled = true;", 100);
            setTimeout("d.getElementById('btnCancelPop8').disabled = true;", 100);
            setTimeout("toggleAllDisabled();", 100);
            setTimeout("d.getElementById('btnOkPop8').disabled = false;", 100);
        }
    }

    function saveTempSched8Data() {
        var x;
        tempRowSizeSched8 = d.getElementById("tblSched8").rows.length - 1;

        for(x = 0; x < tempRowSizeSched8; x++){
            tempTempPeriodCovered8[x] = d.getElementById("txtPeriodCoveredSch8" + x).value;
            tempAgentNm8[x] = d.getElementById("txtNameAgentSch8" + x).value;
            tempIncPaymnt8[x] = d.getElementById("txtIncomePaymentSch8" + x).value;
            tempTotalTaxWithld8[x] = d.getElementById("txtTotalWithheldSch8" + x).value;
            tempAppPrev8[x] = d.getElementById("txtPrevious2MoSch8" + x).value;
            tempAppCurr8[x] = d.getElementById("txtAppliedCurrSch8" + x).value;
            tempSched9TotalPrev8[x] = d.getElementById("txtmodalTotal23C").value;
            tempSched9TotalCurr8[x] = d.getElementById("txtmodalTotalSched8AppliedCurrent").value;
        }
    }

    function restoreTempSched8Data() {
        if(tempRowSizeSched8 > 0) {
            sched8ToCommit = new Array();
            //d.getElementById("tbodyllistSched8").innerHTML = "";
			$('#tbodyllistSched8').html("");
			
            var x = 0;

            x = 0;
            var initCount = 0;

            for(x = 0; x < tempRowSizeSched8; x++){
                addlistSched8();

                d.getElementById("txtPeriodCoveredSch8" + x).value = tempTempPeriodCovered8[x];
                d.getElementById("txtNameAgentSch8" + x).value = tempAgentNm8[x];
                d.getElementById("txtIncomePaymentSch8" + x).value = tempIncPaymnt8[x];
                d.getElementById("txtTotalWithheldSch8" + x).value = tempTotalTaxWithld8[x];
                d.getElementById("txtPrevious2MoSch8" + x).value = tempAppPrev8[x];
                d.getElementById("txtAppliedCurrSch8" + x).value = tempAppCurr8[x];

                if(initCount == (tempRowSizeSched8 - 1)){
                    d.getElementById("txtmodalTotal23C").value = tempSched9TotalPrev8[x];
                    d.getElementById("txtmodalTotalSched8AppliedCurrent").value = tempSched9TotalCurr8[x];
                }

                initCount++;
                computeSumWithheldAppSch8();
            }
        }
    }

    function clearSched8Modal() {
        var x;
        var rowSizeSched8 = d.getElementById("tblSched8").rows.length - 1;
        for(x = 0; x < rowSizeSched8; x++){
            d.getElementById("txtPeriodCoveredSch8" + x).value = "";
            d.getElementById("txtNameAgentSch8" + x).value = "";
            d.getElementById("txtIncomePaymentSch8" + x).value = "0.00";
            d.getElementById("txtTotalWithheldSch8" + x).value = "0.00";
            d.getElementById("txtPrevious2MoSch8" + x).value = "0.00";
            d.getElementById("txtAppliedCurrSch8" + x).value = "0.00";
            d.getElementById("txtmodalTotal23C").value = "0.00";
            d.getElementById("txtmodalTotalSched8AppliedCurrent").value = "0.00";
        }
    }

    function cancelSched8Modal() {
        restoreTempSched8Data();

       
		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched8').css('display') != 'none' ) {
			$('#modalSched8').hide('blind');
			$('#wrapper').css({'display':'block' });
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");	
		
        isModalTurnOn = false;
    }

    function getSched8Modal(){
        if (checkifEmptyFieldSched8() )
        {
           
			d.getElementById('mainContent').style.display = 'block';
			if ( $('#modalSched8').css('display') != 'none' ) {
				$('#modalSched8').hide('blind');
				$('#wrapper').css({'display':'block' });
			}
			$('#DummyTxt').html("Creator");
			$('#DummyTxt').html("");
			
			d.getElementById('frm2550q:txtTax26D').value = formatCurrency(NumWithComma(d.getElementById('txtmodalTotalSched8AppliedCurrent').value) + NumWithComma(d.getElementById('txtmodalTotal23C').value));
            compute26H();
        }
    }

    function getInputTaxCompute(index) {

        d.getElementById('txtInputTax' + index).value = formatCurrency( NumWithComma(d.getElementById('txtAmt' + index).value) * 0.12 );
        computeSumTax();
    }

    function computeSumTax(){
        var size = sched2ToCommit.length;
        var totalAmountTax = 0;
        var totalInputTax = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtAmt' + i).value)*1 ;
            totalInputTax = totalInputTax*1  + NumWithComma(d.getElementById('txtInputTax' + i).value)*1;
        }
        d.getElementById('txtmodalTotalAmt').value = formatCurrency(totalAmountTax);
        d.getElementById('txtmodalTotalInputTax').value = formatCurrency(totalInputTax);
    }
    function getInputTaxCompute3A(index) {

        d.getElementById('txtInputTax3A' + index).value = formatCurrency( NumWithComma(d.getElementById('txtAmt3A' + index).value) * 0.12 );
        computeSumTax3A();
    }

    function computeSumTax3A(){
        var size = sched3AToCommit.length;
        var totalAmountTax = 0;
        var totalInputTax = 0;
        var totalBalanceSched = 0;

        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtAmt3A' + i).value)*1 ;
            totalInputTax = totalInputTax*1  + NumWithComma(d.getElementById('txtInputTax3A' + i).value)*1;

            //d.getElementById('txtAllowInputTax3A' + i).value = formatCurrency( NumWithComma(d.getElementById('txtInputTax3A' + i).value) / NumWithComma(d.getElementById('txtRecogLife3A' + i).value) );
            d.getElementById('txtBalInputTax3A' + i).value = formatCurrency( NumWithComma(d.getElementById('txtInputTax3A' + i).value) - NumWithComma(d.getElementById('txtAllowInputTax3A' + i).value) );
            totalBalanceSched = totalBalanceSched*1 + (NumWithComma(d.getElementById('txtBalInputTax3A' + i).value)*1);
		}
        d.getElementById('txtmodalTotalAmountSched3').value = formatCurrency(totalAmountTax);
        d.getElementById('txtmodalTotalInputTaxSched3').value = formatCurrency(totalInputTax);
        d.getElementById('txtmodalTotalBalanceSched3A').value = formatCurrency(totalBalanceSched);
        computeSumModal20A();
    }

    function computeSumModal20A() {
        d.getElementById('txtmodalTotalInputTax20ASched3').value = formatCurrency( NumWithComma(d.getElementById('txtmodalTotalBalanceSched3A').value) + NumWithComma(d.getElementById('txtmodalTotalBalanceSched3B').value) );
    }
    
    function computeSumTax3B(){
        var size = sched3BToCommit.length;
        var totalBalanceSched = 0;
        for(var i = 0 ; i < size ; i++){

            //d.getElementById('txtAllowInputTax3B' + i).value = formatCurrency( NumWithComma(d.getElementById('txtBalInputTaxPrevious3B' + i).value) / NumWithComma(d.getElementById('txtRecogLife3B' + i).value) );
            d.getElementById('txtBalInputTax3B' + i).value = formatCurrency( NumWithComma(d.getElementById('txtBalInputTaxPrevious3B' + i).value) - NumWithComma(d.getElementById('txtAllowInputTax3B' + i).value) );
            totalBalanceSched = totalBalanceSched*1 + (NumWithComma(d.getElementById('txtBalInputTax3B' + i).value)*1);
        }
        d.getElementById('txtmodalTotalBalanceSched3B').value = formatCurrency(totalBalanceSched);
        computeSumModal20A();
    }

    function computeInputTaxSched4() {
        // d.getElementById('txtlessStdTaxSched4').value = formatCurrency(NumWithComma(d.getElementById('frm2550q:txtTax16A').value) * 5 / 100);
        d.getElementById('txtTotalInputTaxnotDirectSched4').value = formatCurrency( NumWithComma(d.getElementById('txtTaxableSaleSched4').value) / NumWithComma(d.getElementById('txtTotalSaleSched4').value) * NumWithComma(d.getElementById('txtInputTaxnotDirectSched4').value)  );
        d.getElementById('txtTotalInputSaletoGovernmentSched4').value = formatCurrency( NumWithComma(d.getElementById('txtinputtaxSched4').value) + NumWithComma(d.getElementById('txtTotalInputTaxnotDirectSched4').value)  );
        d.getElementById('txtTotal20BSched4').value = formatCurrency( NumWithComma(d.getElementById('txtTotalInputSaletoGovernmentSched4').value) - NumWithComma(d.getElementById('txtlessStdTaxSched4').value)  );
    }
	
	function changedTxtTax16A() {
		d.getElementById('txtlessStdTaxSched4').value = formatCurrency((NumWithComma(d.getElementById('frm2550q:txtTax16A').value)) * 7 / 100);
	}

    function computeInputTaxSched5() {
        d.getElementById('txtProductnotDirectSched5').value = formatCurrency( NumWithComma(d.getElementById('txtTotSaleSched5').value) / NumWithComma(d.getElementById('txtSumTotalSaleSched5').value) * NumWithComma(d.getElementById('txtAmountInputnotDirectSched5').value)  );
        d.getElementById('txtTotal20CSched5').value = formatCurrency( NumWithComma(d.getElementById('txtinputtaxSched5').value) + NumWithComma(d.getElementById('txtProductnotDirectSched5').value)  );
    }

    function computeSumWithheldApp() {
        var size = sched6ToCommit.length;
        var totalWithheld = 0;
        var totalApplied = 0;
        for(var i = 0 ; i < size ; i++){
            totalWithheld = totalWithheld*1 + NumWithComma(d.getElementById('txtPrevious2Mo'+i).value)*1;
            totalApplied = totalApplied*1 + NumWithComma(d.getElementById('txtAppliedCurr'+i).value)*1;
        }
        d.getElementById('txtmodalTotal23A').value =  formatCurrency(totalWithheld) ;
        d.getElementById('txtmodalTotalSched6AppliedCurrent').value = formatCurrency(totalApplied);
    }

    function computeSumWithheldAppSch7() {
        var size = sched7ToCommit.length;
        var totalAmountPaid = 0;
        var totalApplied = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountPaid = totalAmountPaid*1 + NumWithComma(d.getElementById('txtPrevious2MoSch7'+i).value)*1;
            totalApplied = totalApplied*1 + NumWithComma(d.getElementById('txtAppliedCurrSch7'+i).value)*1;
        }
        d.getElementById('txtmodalTotal23B').value =  formatCurrency(totalAmountPaid) ;
        d.getElementById('txtmodalTotalSched7AppliedCurrent').value = formatCurrency(totalApplied);
    }

    function computeSumWithheldAppSch8() {
        var size = sched8ToCommit.length;
        var totalWithheld = 0;
        var totalApplied = 0;
        for(var i = 0 ; i < size ; i++){
            totalWithheld = totalWithheld*1 + NumWithComma(d.getElementById('txtPrevious2MoSch8'+i).value)*1;
            totalApplied = totalApplied*1 + NumWithComma(d.getElementById('txtAppliedCurrSch8'+i).value)*1;
        }
        d.getElementById('txtmodalTotal23C').value =  formatCurrency(totalWithheld) ;
        d.getElementById('txtmodalTotalSched8AppliedCurrent').value = formatCurrency(totalApplied);
    }

    function computePenalties() {
        d.getElementById('frm2550q:txtTax28D').value = formatCurrency(NumWithComma(d.getElementById('frm2550q:txtTax28A').value) + NumWithComma(d.getElementById('frm2550q:txtTax28B').value) + NumWithComma(d.getElementById('frm2550q:txtTax28C').value));
        compute29();
    }

    function compute16B(){
        d.getElementById('frm2550q:txtTax16B').value = formatCurrency(NumWithComma(d.getElementById('frm2550q:txtTax16A').value) * 0.12 );
        compute19AB();
    }

    function compute20F() {
        d.getElementById('frm2550q:txtTax20F').value = formatCurrency( NumWithComma(d.getElementById('frm2550q:txtTax20A').value) + NumWithComma(d.getElementById('frm2550q:txtTax20B').value) +  NumWithComma(d.getElementById('frm2550q:txtTax20C').value) +
            NumWithComma(d.getElementById('frm2550q:txtTax20D').value) + NumWithComma(d.getElementById('frm2550q:txtTax20E').value) );

        compute22();
    }

    function compute21TransactionbyRow(letter) {
        var indexAlpha = '';
        if(letter =="E"){
            indexAlpha = "F";
        }else if(letter == "G"){
            indexAlpha = "H";
        }else if(letter == "I"){
            indexAlpha = "J";
        }else if(letter == "K"){
            indexAlpha = "L";
        }else if(letter == "N"){
            indexAlpha = "O";
        }
        d.getElementById('frm2550q:txtTax21'+indexAlpha).value = formatCurrency( NumWithComma(d.getElementById('frm2550q:txtTax21'+letter).value) * 0.12 );
        compute22();
    }
    
    function compute19AB(){
        d.getElementById('frm2550q:txtTax19A').value = formatCurrency( NumWithComma(d.getElementById('frm2550q:txtTax15A').value) + NumWithComma(d.getElementById('frm2550q:txtTax16A').value) +
            NumWithComma(d.getElementById('frm2550q:txtTax17').value) + NumWithComma(d.getElementById('frm2550q:txtTax18').value));

        d.getElementById('frm2550q:txtTax19B').value = formatCurrency( NumWithComma(d.getElementById('frm2550q:txtTax15B').value) + NumWithComma(d.getElementById('frm2550q:txtTax16B').value) );
        compute25();
    }

    function compute21P() {
        d.getElementById('frm2550q:txtTax21P').value = formatCurrency( NumWithComma(d.getElementById('frm2550q:txtTax21A').value) + NumWithComma(d.getElementById('frm2550q:txtTax21C').value) +
            NumWithComma(d.getElementById('frm2550q:txtTax21E').value) + NumWithComma(d.getElementById('frm2550q:txtTax21G').value) + NumWithComma(d.getElementById('frm2550q:txtTax21I').value) +
            NumWithComma(d.getElementById('frm2550q:txtTax21K').value) + NumWithComma(d.getElementById('frm2550q:txtTax21M').value) + NumWithComma(d.getElementById('frm2550q:txtTax21N').value));
    }

    function compute22() {
        d.getElementById('frm2550q:txtTax22').value = formatCurrency( NumWithComma(d.getElementById('frm2550q:txtTax20F').value) + NumWithComma(d.getElementById('frm2550q:txtTax21B').value) +
            NumWithComma(d.getElementById('frm2550q:txtTax21D').value) + NumWithComma(d.getElementById('frm2550q:txtTax21F').value) + NumWithComma(d.getElementById('frm2550q:txtTax21H').value) +
            NumWithComma(d.getElementById('frm2550q:txtTax21J').value) + NumWithComma(d.getElementById('frm2550q:txtTax21L').value) + NumWithComma(d.getElementById('frm2550q:txtTax21O').value));
        compute24();
    }
    function compute23F() {
        d.getElementById('frm2550q:txtTax23F').value = formatCurrency( NumWithComma(d.getElementById('frm2550q:txtTax23A').value) + NumWithComma(d.getElementById('frm2550q:txtTax23B').value)  +
            NumWithComma(d.getElementById('frm2550q:txtTax23C').value) + NumWithComma(d.getElementById('frm2550q:txtTax23D').value)  + NumWithComma(d.getElementById('frm2550q:txtTax23E').value)  );
        compute24()
    }
    function compute24() {
        d.getElementById('frm2550q:txtTax24').value   = formatCurrency( NumWithComma(d.getElementById('frm2550q:txtTax22').value) - NumWithComma(d.getElementById('frm2550q:txtTax23F').value) );
        compute25();
    }
    function compute25() {
        d.getElementById('frm2550q:txtTax25').value   = formatCurrency( NumWithComma(d.getElementById('frm2550q:txtTax19B').value) - NumWithComma(d.getElementById('frm2550q:txtTax24').value) );
        compute27();
    }
    function compute26H() {
        d.getElementById('frm2550q:txtTax26H').value = formatCurrency( NumWithComma(d.getElementById('frm2550q:txtTax26A').value) + NumWithComma(d.getElementById('frm2550q:txtTax26B').value) +
            NumWithComma(d.getElementById('frm2550q:txtTax26C').value) + NumWithComma(d.getElementById('frm2550q:txtTax26D').value) + NumWithComma(d.getElementById('frm2550q:txtTax26E').value) +
            NumWithComma(d.getElementById('frm2550q:txtTax26G').value) + NumWithComma(d.getElementById('frm2550q:txtTax26F').value) );
        compute27();
    }

    function compute27() {
        d.getElementById('frm2550q:txtTax27').value = formatCurrency( NumWithComma(d.getElementById('frm2550q:txtTax25').value) - NumWithComma(d.getElementById('frm2550q:txtTax26H').value) );
        compute29();
    }
    
    function compute29(){
        d.getElementById('frm2550q:txtTax29').value = formatCurrency( NumWithComma(d.getElementById('frm2550q:txtTax27').value) + NumWithComma(d.getElementById('frm2550q:txtTax28D').value) );
		capital();
	}
	
    function enableShortPeriod(answer) { 
        if(answer == "yes") {
            if(confirm("Choosing Yes means you are filing for a short-period \n" +
                "return. You are required to change the Month field to \n" +
                "correspond with your New quarter period. Please \n" +
                "update your Registration details by filing BIR \n"+
                "Form 1905 at the RDO where you are registered.")) {
                d.getElementById('frm2550q:RtnMonth').disabled = false;
                d.getElementById('frm2550q:OptQuarter1').disabled = true;
                d.getElementById('frm2550q:OptQuarter2').disabled = true;
                d.getElementById('frm2550q:OptQuarter3').disabled = true;
                d.getElementById('frm2550q:OptQuarter4').disabled = true;
            }else {
                d.getElementById('frm2550q:OptShortPrd2').checked = true;
            }
        }else {
            d.getElementById('frm2550q:RtnMonth').disabled = true;
            d.getElementById('frm2550q:OptQuarter1').disabled = false;
            d.getElementById('frm2550q:OptQuarter2').disabled = false;
            d.getElementById('frm2550q:OptQuarter3').disabled = false;
            d.getElementById('frm2550q:OptQuarter4').disabled = false;
        }
    }

    function validate(){
		if(!d.getElementById('frm2550q:optAmend:_1').checked && !d.getElementById('frm2550q:optAmend:_2').checked){
			alert("Please choose a year type on Item 1.");
			return;
		}
		
        var dt = new Date();
		if(d.getElementById('frm2550q:RtnMonth').value == "0"){
			alert("Please enter a valid Month."); return;
		}
		if(d.getElementById('frm2550q:RtnMonth').value == "12" && d.getElementById('frm2550q:optAmend:_2').checked ){
			alert("Fiscal Month cannot be equal to December."); return;
		}
        if(d.getElementById('frm2550q:txtYear').value == "" )
        {
            alert("Please indicate a valid Year."); return;
        }
       
        if( d.getElementById('frm2550q:txtYear').value*1 < 2000   )
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 2000.")
            return;
        }
		
        if( (d.getElementById('frm2550q:txtTIN1').value == "" || d.getElementById('frm2550q:txtTIN2').value == "" || d.getElementById('frm2550q:txtTIN3').value == "" || d.getElementById('frm2550q:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 6.");
            return;
        }		
      
        if( (d.getElementById('frm2550q:txtLineBus').value == "")  )
        {
            alert("Please enter a valid Line of Business/Occupation on Item 9.");
            return;
        }			
		if( (d.getElementById('frm2550q:TaxPayer').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 10.");
            return;
        }	
		if( (d.getElementById('frm2550q:txtTelNum').value == "")  )
        {
            alert("Please enter a valid Telephone Number on Item 11.");
            return;
        }			
		if( (d.getElementById('frm2550q:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 12.");
            return;
        }	
		if( (d.getElementById('frm2550q:txtZipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip Code on Item 13.");
            return;
        }
		
        if( d.getElementById('frm2550q:OptTreaty1').checked ) {
            if(d.getElementById('frm2550q:lstTaxTreaty').value == 0) {
                alert("Please select an option from item no. 14. Entry must not be empty."); return;
            }
        }
        AllControlDisabled(true);
		disableAmendedReturn();

        alert("Validation successful. Click on Edit if you wish to modify your entries."); return;
    }

	var disableElem = true;
	var enableElem = false;

    function AllControlDisabled(state){

        d.getElementById('frm2550q:btnFinalCopy').disabled = false;
		d.getElementById('frm2550q:cmdValidate').disabled = state;
		d.getElementById('frm2550q:optAmend:_1').disabled = state;
		d.getElementById('frm2550q:optAmend:_2').disabled = state;
		d.getElementById('frm2550q:RtnMonth').disabled = state;
		d.getElementById('frm2550q:txtSheets').disabled = state;
        d.getElementById('btnPrint').disabled = !state;
        d.getElementById('frm2550q:cmdEdit').disabled = !state;
		d.getElementById('frm2550q:txtTIN1').disabled = state;
		d.getElementById('frm2550q:txtTIN2').disabled = state;
		d.getElementById('frm2550q:txtTIN3').disabled = state;
		d.getElementById('frm2550q:txtBranchCode').disabled = state;
		d.getElementById('frm2550q:txtRDOCode').disabled = state;
		d.getElementById('frm2550q:txtLineBus').disabled = state;
		d.getElementById('frm2550q:TaxPayer').disabled = state;
		d.getElementById('frm2550q:txtTelNum').disabled = state;
		d.getElementById('frm2550q:txtAddress').disabled = state;
		d.getElementById('frm2550q:txtZipCode').disabled = state;
        d.getElementById('btnUpload').disabled = !state;

        d.getElementById('frm2550q:txtYear').disabled = state;
        if ( d.getElementById('frm2550q:OptShortPrd1').checked ) {
            d.getElementById('frm2550q:RtnMonth').disabled = state;
        }else {
            d.getElementById('frm2550q:OptQuarter1').disabled = state;
            d.getElementById('frm2550q:OptQuarter2').disabled = state;
            d.getElementById('frm2550q:OptQuarter3').disabled = state;
            d.getElementById('frm2550q:OptQuarter4').disabled = state;
        }

        d.getElementById('frm2550q:txtYear').disabled = state;
        d.getElementById('frm2550q:OptShortPrd1').disabled = state;
        d.getElementById('frm2550q:OptShortPrd2').disabled = state;

        d.getElementById('frm2550q:OptTreaty1').disabled = state;
        d.getElementById('frm2550q:OptTreaty2').disabled = state;
        if( d.getElementById('frm2550q:OptTreaty1').checked ) {
            d.getElementById('frm2550q:lstTaxTreaty').disabled = state;
        }
        d.getElementById('btnSched1').disabled = state;
        d.getElementById('frm2550q:txtTax16A').disabled = state;
        d.getElementById('frm2550q:txtTax16B').disabled = state;
        d.getElementById('frm2550q:txtTax17').disabled = state;
        d.getElementById('frm2550q:txtTax18').disabled = state;
        d.getElementById('frm2550q:txtTax20A').disabled = state;
        d.getElementById('frm2550q:txtTax20B').disabled = state;
        d.getElementById('frm2550q:txtTax20C').disabled = state;
        d.getElementById('frm2550q:txtTax20D').disabled = state;
        d.getElementById('frm2550q:txtTax20E').disabled = state;
        d.getElementById('frm2550q:txtTax21E').disabled = state;
        d.getElementById('frm2550q:txtTax21F').disabled = state;
        d.getElementById('frm2550q:txtTax21G').disabled = state;
        d.getElementById('frm2550q:txtTax21H').disabled = state;
        d.getElementById('frm2550q:txtTax21I').disabled = state;
        d.getElementById('frm2550q:txtTax21J').disabled = state;
        d.getElementById('frm2550q:txtTax21K').disabled = state;
        d.getElementById('frm2550q:txtTax21L').disabled = state;
        d.getElementById('frm2550q:txtTax21M').disabled = state;
        d.getElementById('frm2550q:txtTax21N').disabled = state;
        d.getElementById('frm2550q:txtTax21O').disabled = state;
        d.getElementById('frm2550q:txtTax23D').disabled = state;
        d.getElementById('frm2550q:txtTax23E').disabled = state;
        d.getElementById('frm2550q:txtTax23F').disabled = state;
        d.getElementById('frm2550q:txtTax26A').disabled = state;
        d.getElementById('frm2550q:txtTax26F').disabled = state;
        d.getElementById('frm2550q:txtTax26G').disabled = state;
        d.getElementById('btnSched2').disabled = state;
        d.getElementById('btnSched3A').disabled = state;
        d.getElementById('btnSched3B').disabled = state;
        d.getElementById('btnSched4').disabled = state;
        d.getElementById('btnSched5').disabled = state;
        d.getElementById('btnSched6').disabled = state;
        d.getElementById('btnSched7').disabled = state;
        d.getElementById('btnSched8').disabled = state;

        d.getElementById('frm2550q:AmendedRtnY').disabled = state;
        d.getElementById('frm2550q:AmendedRtnN').disabled = state;
		d.getElementById('frm2550q:txtTax28A').disabled = state;
		d.getElementById('frm2550q:txtTax28B').disabled = state;
        d.getElementById('frm2550q:txtTax28C').disabled = state;
		if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
			d.getElementById('frm2550q:RtnMonth').disabled = true;
			d.getElementById('frm2550q:txtYear').disabled = true;	
		}
		disableElem;
		enableElem;
		document.getElementById('frm2550q:txtTIN1').disabled = true; document.getElementById('frm2550q:txtTIN2').disabled = true; document.getElementById('frm2550q:txtTIN3').disabled = true; document.getElementById('frm2550q:txtBranchCode').disabled = true;
    }
	function disableAmendedReturn(){
		d.getElementById('frm2550q:txtTax26E').disabled = true;
	}
	function enableAmendedReturn(){
		if(d.getElementById('frm2550q:AmendedRtnY').checked)
			d.getElementById('frm2550q:txtTax26E').disabled = false;
		else
			d.getElementById('frm2550q:txtTax26E').disabled = true;
	}
    function changeMonth(){
        var month = d.getElementById('frm2550q:RtnMonth');

        if(parseInt(month.value) >= 1 && parseInt(month.value) <= 3){
            d.getElementById('frm2550q:OptQuarter1').checked = true;
        }else if(parseInt(month.value) >= 4 && parseInt(month.value) <= 6){
            d.getElementById('frm2550q:OptQuarter2').checked = true;
        }else if(parseInt(month.value) >= 7 && parseInt(month.value) <= 9){
            d.getElementById('frm2550q:OptQuarter3').checked = true;
        }else if(parseInt(month.value) >= 10 && parseInt(month.value) <= 12){
            d.getElementById('frm2550q:OptQuarter4').checked = true;
        }

        changeYear();
    }
	
	function enableMonth(elem){
		var month = d.getElementById('frm2550q:RtnMonth');
		
		if(elem.id == "frm2550q:optAmend:_1"){
			month.value = "12";
			month.disabled = true;
		} else {
			month.value = "0";
			month.disabled = false;
		}
	}
    
    function changeYear(){
        var month = d.getElementById('frm2550q:RtnMonth');
        var year = d.getElementById('frm2550q:txtYear');
        var days = daysInMonth((month.value - 1), year.value);
        if( year.value != "" ) {
            //alert(daysInMonth((month.value - 1), year.value))

            //AC Corp. 1/11/2012
            if(d.getElementById('frm2550q:optAmend:_1').checked){
                if(d.getElementById('frm2550q:OptQuarter1').checked) {
                    d.getElementById('frm2550q:RtnPeriodFrom').value = "01/01/" + (d.getElementById('frm2550q:txtYear').value) ;
                    d.getElementById('frm2550q:RtnPeriodTo').value = "03/" + 31 + "/" + (d.getElementById('frm2550q:txtYear').value) ;
                }else if(d.getElementById('frm2550q:OptQuarter2').checked) {
                    d.getElementById('frm2550q:RtnPeriodFrom').value = "04/01/" + (d.getElementById('frm2550q:txtYear').value) ;
                    d.getElementById('frm2550q:RtnPeriodTo').value = "06/" + 30 + "/" + (d.getElementById('frm2550q:txtYear').value) ;
                }else if(d.getElementById('frm2550q:OptQuarter3').checked) {
                    d.getElementById('frm2550q:RtnPeriodFrom').value = "07/01/" + (d.getElementById('frm2550q:txtYear').value) ;
                    d.getElementById('frm2550q:RtnPeriodTo').value = "09/" + 30 + "/" + (d.getElementById('frm2550q:txtYear').value ) ;
                }else if(d.getElementById('frm2550q:OptQuarter4').checked) {
                    d.getElementById('frm2550q:RtnPeriodFrom').value = "10/01/" + (d.getElementById('frm2550q:txtYear').value) ;
                    d.getElementById('frm2550q:RtnPeriodTo').value = "12/" + 31 + "/" + (d.getElementById('frm2550q:txtYear').value) ;
                }
            }else if(d.getElementById('frm2550q:optAmend:_2').checked){
                var monthFrom = parseInt(month.value);
                var yearFrom = parseInt(year.value) - 1;
                var monthTo;
                var yearTo;
                var tempMonthDay;


                if(d.getElementById('frm2550q:OptQuarter1').checked) {
                    monthFrom = monthFrom + 1;
                    if(monthFrom > 12){
                        monthFrom = (monthFrom - 12);
                        monthTo = monthFrom + 2;
                        yearFrom = yearFrom + 1;
                    }

                    if(monthFrom == 11){
                        monthTo = 1;
                    }else if(monthFrom == 12){
                        monthTo = 2;
                    }else {
                        monthTo = monthFrom + 2;
                    }

                    if(monthFrom > monthTo){
                        yearTo = yearFrom + 1;
                    }else {
                        yearTo = yearFrom;
                    }

                    monthFrom = addzero(monthFrom);
                    monthTo = addzero(monthTo);

                    tempMonthDay = monthTo - 1;

                    d.getElementById('frm2550q:RtnPeriodFrom').value = monthFrom + "/01/" + yearFrom;
                    d.getElementById('frm2550q:RtnPeriodTo').value = monthTo + "/" + daysInMonth(tempMonthDay, yearTo) + "/" + yearTo;
                }else if(d.getElementById('frm2550q:OptQuarter2').checked) {
                    monthFrom = monthFrom + 4;
                    if(monthFrom > 12){
                        monthFrom = (monthFrom - 12);
                        monthTo = monthFrom + 2;
                        yearFrom = yearFrom + 1;
                    }

                    if(monthFrom == 11){
                        monthTo = 1;
                    }else if(monthFrom == 12){
                        monthTo = 2;
                    }else {
                        monthTo = monthFrom + 2;
                    }

                    if(monthFrom > monthTo){
                        yearTo = yearFrom + 1;
                    }else {
                        yearTo = yearFrom;
                    }

                    monthFrom = addzero(monthFrom);
                    monthTo = addzero(monthTo);

                    tempMonthDay = monthTo - 1;

                    d.getElementById('frm2550q:RtnPeriodFrom').value = monthFrom + "/01/" + yearFrom;
                    d.getElementById('frm2550q:RtnPeriodTo').value = monthTo + "/" + daysInMonth(tempMonthDay, yearTo) + "/" + yearTo;
                }else if(d.getElementById('frm2550q:OptQuarter3').checked) {
                    monthFrom = monthFrom + 7;
                    if(monthFrom > 12){
                        monthFrom = (monthFrom - 12);
                        monthTo = monthFrom + 2;
                        yearFrom = yearFrom + 1;
                    }

                    if(monthFrom == 11){
                        monthTo = 1;
                    }else if(monthFrom == 12){
                        monthTo = 2;
                    }else {
                        monthTo = monthFrom + 2;
                    }

                    if(monthFrom > monthTo){
                        yearTo = yearFrom + 1;
                    }else {
                        yearTo = yearFrom;
                    }

                    monthFrom = addzero(monthFrom);
                    monthTo = addzero(monthTo);

                    tempMonthDay = monthTo - 1;

                    d.getElementById('frm2550q:RtnPeriodFrom').value = monthFrom + "/01/" + yearFrom;
                    d.getElementById('frm2550q:RtnPeriodTo').value = monthTo + "/" + daysInMonth(tempMonthDay, yearTo) + "/" + yearTo;
                }else if(d.getElementById('frm2550q:OptQuarter4').checked) {
                    monthFrom = monthFrom + 10;
                    if(monthFrom > 12){
                        monthFrom = (monthFrom - 12);
                        monthTo = monthFrom + 2;
                        yearFrom = yearFrom + 1;
                    }

                    if(monthFrom == 11){
                        monthTo = 1;
                    }else if(monthFrom == 12){
                        monthTo = 2;
                    }else {
                        monthTo = monthFrom + 2;
                    }

                    if(monthFrom > monthTo){
                        yearTo = yearFrom + 1;
                    }else {
                        yearTo = yearFrom;
                    }

                    monthFrom = addzero(monthFrom);
                    monthTo = addzero(monthTo);

                    tempMonthDay = monthTo - 1;

                    d.getElementById('frm2550q:RtnPeriodFrom').value = monthFrom + "/01/" + yearFrom;
                    d.getElementById('frm2550q:RtnPeriodTo').value = monthTo + "/" + daysInMonth(tempMonthDay, yearTo) + "/" + yearTo;
                }
            }

        }
    }

    function addzero(num){
        if(parseInt(num) < 10){
            num = "0" + num;
        }
        return num;
    }

    function daysInMonth(iMonth, iYear)
    {
        return 32 - new Date(iYear, iMonth, 32).getDate();
    }
	function initialValidateBeforeSave() {
			if( (d.getElementById('frm2550q:txtTIN1').value == "" || d.getElementById('frm2550q:txtTIN2').value == "" || d.getElementById('frm2550q:txtTIN3').value == "" || d.getElementById('frm2550q:txtBranchCode').value == "")  )
			{
				alert("Please enter a valid TIN number on Item 6.");
				return false;
			}	
			if ((d.getElementById('frm2550q:txtRDOCode').value == "000")) {
			    alert("Please enter a valid RDO Code on Item 7.");
			    return false;
			}
			if( (d.getElementById('frm2550q:TaxPayer').value == "")  )
			{
				alert("Please enter a valid Taxpayer Name on Item 10.");
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
	function printme() {

		$('#bg').hide(); 
		$('.printSignFooterClass').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always', 'background':'#ffffff' });	
		$('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
		
		$('#formPaper').css({'max-width':'8.3in !important', 'border':'#000 3px solid' });
		$('#wrapper').css({'max-width':'8.3in !important', 'font-size': '75% !important'});
		$('#container').css({'max-width':'8.3in !important', 'font-size': '75% !important'});	
		
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
                    document.getElementById(elem[i].id).style.height="15px";
                    document.getElementById(elem[i].id).style.fontSize="12px";		
					document.getElementById(elem[i].id).disabled = false;
					document.getElementById(elem[i].id).style.backgroundColor = '#FFFFFF';
					document.getElementById(elem[i].id).style.color = '#000000';
				}				
				if (elem[i].type == 'radio' || elem[i].type == 'checkbox') { 
					if (document.getElementById(elem[i].id).disabled) {
						disabledItems[x] = elem[i].id;
						x++;
					}
					document.getElementById(elem[i].id).disabled = true;
					document.getElementById(elem[i].id).style.height="10px";
					document.getElementById(elem[i].id).style.fontSize="8px";
				}	
				if(elem[i].type == 'select-one'){
					$( elem[i] ).hide();
					var label = "<span class='labels'>".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</span>");
					$( elem[i] ).after(label);
				}
			}
	    }	
		
        $('#formPaper').css({'border':'#000 3px solid', 'margin-top': '-50px' });
        $('#modalSched1').css({'left': '0%', 'border': '1px solid #fff','min-height': '250px' }); 
        $('#modalSched2').css({'left': '0%', 'border': '1px solid #fff', 'width': '850px'});  
        $('#modalSched3').css({'left': '0%', 'border': '1px solid #fff', 'width': '100%'}); 
        $('#modalSched4').css({'left': '0%', 'border': '1px solid #fff', 'padding': '0px'}); 
        $('#modalSched5').css({'left': '0%', 'border': '1px solid #fff', 'padding': '0px'}); 
        $('#modalSched6').css({'left': '0%', 'border': '1px solid #fff', 'padding': '0px'}); 
        $('#modalSched7').css({'left': '0%', 'border': '1px solid #fff', 'padding': '0px'});  
        $('#modalSched8').css({'left': '0%', 'border': '1px solid #fff', 'padding': '0px'}); 

        $('.printButtonClass').hide();
        $("#formPaper").show();
        
        window.print();

        $('#formPaper').css({'border':'#000 1px solid', 'margin-top': '0px' });
        $('.printButtonClass').show();
        $('.imgClass').css({'display': 'none' });
        $('#modalSched1').css({'display': 'none' }); 

        $('#modalSched2').css({'display': 'none' }); 
        $('#modalSched3').css({'display': 'none' }); 
        $('#modalSched4').css({'display': 'none' }); 
        $('#modalSched5').css({'display': 'none' });  
        $('#modalSched6').css({'display': 'none' }); 
        $('#modalSched7').css({'display': 'none' }); 
        $('#modalSched8').css({'display': 'none' });
	}	

	var onExit = false;
	function isOnExit() {
		onExit = true;
	}

	function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
               	console.log(form.serializeArray());
                var data = form.serialize();
                save('2550Q',data);
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
        saveAndExit('2550Q',data);
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

        submitAndSave('2550Q', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2550Q';
    }
</script>
@endsection