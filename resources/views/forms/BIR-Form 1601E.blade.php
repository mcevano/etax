@extends('layouts.app')
@section('title', '| BIR Form No. 1601E')
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
                    <button type="button" class="btn btn-danger btn-exit" id="1601E" company='{{$company->id}}'>No</button>
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
                    <button type="button" class="btn btn-success btn-exit" id="1601E" company='{{$company->id}}'>Okay</button>
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
                        <button type="button" class="btn btn-danger btn-filing-success" form='1601E' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 836px; ">
			
				<table border="0" width="836" cellspacing="0" cellpadding="0" align="center" style=" background-repeat: repeat-x;">
				<tr><td>
			
                <div id="formPaper">
                    <table width="836" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="836" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
                                    <tr>
                                        <td width="82"  style='padding:0px;' valign="middle" align="center">										
												<p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p>
										</td>
                                        <td width="158" valign="middle">
                                            <label face="Arial" size="1px">Republika ng Pilipinas
                                            <br/>Kagawaran ng Pananalapi
                                            <br/>Kawanihan ng Rentas Internas</label>
                                        </td>
                                        <td width="323" align="center">
                                            <font size="5px" style="font-weight:bold;">Monthly Remittance Return
                                                <br/>of Creditable Income Taxes
                                                <br/>Withheld (Expanded)</font>
                                        </td>
                                        <td width="145" valign="center">
                                            <label face="Arial" size="1px">BIR Form No.<br/></label><br>
                                            <font face="Arial" size="6px">1601-E<br/></font>
                                            <label face="Arial" size="1px">September 2007 (ENCS)</label>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="230" valign="top" class="tblFormTd">
                                            <table width="230" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td colspan="2"><font size="1" style="font-size: 11px;">For the Month (MM/YYYY)</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td colspan="2">
                                                        <select size="1" name="frm1601E:j_id201" id="frm1601E:j_id201" class="iceSelOneMnu fieldSelect1">
                                                            @if($action == 'new')
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
                                                            @else
                                                                <option value="01" {{ $data->item1A == '01' ? 'selected' : ''}} >01 - January</option>
                                                                <option value="02" {{ $data->item1A == '02' ? 'selected' : ''}} >02 - February</option>
                                                                <option value="03" {{ $data->item1A == '03' ? 'selected' : ''}} >03 - March</option>
                                                                <option value="04" {{ $data->item1A == '04' ? 'selected' : ''}} >04 - April</option>
                                                                <option value="05" {{ $data->item1A == '05' ? 'selected' : ''}} >05 - May</option>
                                                                <option value="06" {{ $data->item1A == '06' ? 'selected' : ''}} >06 - June</option>
                                                                <option value="07" {{ $data->item1A == '07' ? 'selected' : ''}} >07 - July</option>
                                                                <option value="08" {{ $data->item1A == '08' ? 'selected' : ''}} >08 - August</option>
                                                                <option value="09" {{ $data->item1A == '09' ? 'selected' : ''}} >09 - September</option>
                                                                <option value="10" {{ $data->item1A == '10' ? 'selected' : ''}} >10 - October</option>
                                                                <option value="11" {{ $data->item1A == '11' ? 'selected' : ''}} >11 - November</option>
                                                                <option value="12" {{ $data->item1A == '12' ? 'selected' : ''}} >12 - December</option>
                                                            @endif
                                                        </select>
                                                        <input type="text" value="{{ $action != 'new' ? $data->item1B : ''}}" size="4" name="frm1601E:txtYear" maxlength="4" id="frm1601E:txtYear" onkeypress="return wholenumber(this, event)"/>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="154" valign="top" class="tblFormTd">
                                            <table width="145" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1601E:j_id217" class="iceSelOneRb-dis fieldText1-dis">
                                                            <div align="center" style="padding: 1px 0 1px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <tbody>
                                                                        <tr>
                                                                            @if($action == 'new')
                                                                            <td><input type="radio" value="Y" name="frm1601E:j_id217" style="vertical-align: sub" id="frm1601E:j_id217:_1" onclick="d.getElementById('frm1601E:txtTax15A').disabled = false;" /><label for="frm1601E:j_id217:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >&nbsp;Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" value="N"  name="frm1601E:j_id217" style="vertical-align: sub" id="frm1601E:j_id217:_2" onclick="d.getElementById('frm1601E:txtTax15A').disabled = true;d.getElementById('frm1601E:txtTax15A').value = '0.00';computeTotalTaxCredit()" checked="true" /><label for="frm1601E:j_id217:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >&nbsp;No</label></td>
                                                                            @else
                                                                            <td><input type="radio" value="Y" {{ $data->item2 == 'Y' ? 'checked' : ''}} name="frm1601E:j_id217" style="vertical-align: sub" id="frm1601E:j_id217:_1" onclick="d.getElementById('frm1601E:txtTax15A').disabled = false;" /><label for="frm1601E:j_id217:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >&nbsp;Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" value="N" {{ $data->item2 == 'N' ? 'checked' : ''}} name="frm1601E:j_id217" style="vertical-align: sub" id="frm1601E:j_id217:_2" onclick="d.getElementById('frm1601E:txtTax15A').disabled = true;d.getElementById('frm1601E:txtTax15A').value = '0.00';computeTotalTaxCredit()" /><label for="frm1601E:j_id217:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >&nbsp;No</label></td>
                                                                            @endif
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="171" valign="top" class="tblFormTd">
                                            <table width="150" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">No. of Sheets Attached?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><input type="text" value="{{ $action != 'new' ? $data->item3 : '0'}}" style="text-align: right;" size="4" name="frm1601E:txtSheets" maxlength="2" id="frm1601E:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="185" valign="top" class="tblFormTd">
                                            <table width="140" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">Any Taxes Withheld?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1601E:j_id252" class="iceSelOneRb fieldText1">
                                                            <div align="center" style="padding: 1px 0 1px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                    <tbody>
                                                                        <tr>
                                                                            @if($action == 'new')
                                                                            <td><input type="radio" style="vertical-align: sub" value="Y" name="frm1601E:j_id252" id="frm1601E:j_id252:_1" onclick="taxWheldFlag = true;" /><label for="frm1601E:j_id252:_1" style="font-size:11px;" >&nbsp;Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" style="vertical-align: sub" value="N" name="frm1601E:j_id252" id="frm1601E:j_id252:_2" onclick="changeTaxWithheldNO()" /><label for="frm1601E:j_id252:_2" style="font-size:11px;" >&nbsp;No</label></td>
                                                                            @else
                                                                            <td><input type="radio" {{ $data->item4 == 'Y' ? 'checked' : ''}} style="vertical-align: sub" value="Y" name="frm1601E:j_id252" id="frm1601E:j_id252:_1" onclick="taxWheldFlag = true;" /><label for="frm1601E:j_id252:_1" style="font-size:11px;" >&nbsp;Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" {{ $data->item4 == 'N' ? 'checked' : ''}} style="vertical-align: sub" value="N" name="frm1601E:j_id252" id="frm1601E:j_id252:_2" onclick="changeTaxWithheldNO()" /><label for="frm1601E:j_id252:_2" style="font-size:11px;" >&nbsp;No</label></td>
                                                                            @endif
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
                                <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table width="" border="0" cellspacing="0" cellpadding="0">
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
                                <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="250" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="{{ $company->tin1}}" size="2" name="frm1601E:txtTIN1" maxlength="3" id="frm1601E:txtTIN1" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{ $company->tin2}}" size="2" name="frm1601E:txtTIN2" maxlength="3" id="frm1601E:txtTIN2" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{ $company->tin3}}" size="2" name="frm1601E:txtTIN3" maxlength="3" id="frm1601E:txtTIN3" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{ $company->tin4}}" size="2" name="frm1601E:txtBranchCode" maxlength="3" id="frm1601E:txtBranchCode" onkeypress="return letternumber(event)" />
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="133" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="90"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                    <td id="rdoSelect">
															<select class="iceSelOneMnu" id="frm1601E:txtRDOCode" name="frm1601E:txtRDOCode" size="1" disabled>
                                                                <option value="{{ $company->rdo_code}}">{{ $company->rdo_code }}</option>
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
                                                            <input type="text" value="{{ $company->line_business}}" size="28" name="frm1601E:txtLineBus" maxlength="60" id="frm1601E:txtLineBus" class="iceInpTxt-dis disabled-dis" onblur="return capital(this, event)" disabled/>
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
                                <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
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
                                                                <td><input type="text" value="{{$company->registered_name != '' ? $company->registered_name : $company->lastname.','. $company->firstname.' '.$company->middlename }}" size="70" name="frm1601E:txtTaxpayerName" maxlength="50" id="frm1601E:txtTaxpayerName" onblur="return capital(this, event)" disabled/></td>
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
                                                            <input type="text" value="{{ $company->tel_number}}" size="15" name="frm1601E:txtTelNum" maxlength="20" id="frm1601E:txtTelNum" class="iceInpTxt-dis disabled-dis" onkeypress="return wholenumber(this, event)" disabled />
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
                                <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
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
                                                                <td><input type="text" value="{{ $company->address}}" size="95" name="frm1601E:txtAddress" maxlength="150" id="frm1601E:txtAddress" class="iceInpTxt-dis disabled-dis" onblur="return capital(this, event)" disabled/></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="8%" valign="top" class="tblFormTd">
                                            <table width="149" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="149"><font size="2" style="font-weight:bold;fon">&nbsp;11&nbsp;</font><font size="1" style="font-size: 11px;">Zip
                                                            Code</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" value="{{ $company->zip_code}}" size="2" name="frm1601E:txtZipCode" maxlength="12" id="frm1601E:txtZipCode" onkeypress="return wholenumber(this, event)" disabled/>
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
                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="830" height="23">
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
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:160px;" id="frm1601E:j_id392" class="iceSelOneRb fieldText1">
                                                                <div align="center" style="padding: 5px 0 5px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                        <tbody>
                                                                            <tr>
                                                                                @if($action == 'new')
                                                                                <td><input type="radio" style="vertical-align: text-top;" value="P" name="frm1601E:j_id392" id="frm1601E:j_id392:_1" onclick="changedrpATCList(this)" /><label for="frm1601E:j_id392:_1" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Private</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                <td><input type="radio" style="vertical-align: text-top;" value="G" name="frm1601E:j_id392" id="frm1601E:j_id392:_2" onclick="changedrpATCList(this)" /><label for="frm1601E:j_id392:_2" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Government</label></td>
                                                                                @else
                                                                                <td><input type="radio" {{ $data->item12 == 'P' ? 'checked' : ''}} style="vertical-align: text-top;" value="P" name="frm1601E:j_id392" id="frm1601E:j_id392:_1" onclick="changedrpATCList(this)" /><label for="frm1601E:j_id392:_1" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Private</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                <td><input type="radio" {{ $data->item12 == 'G' ? 'checked' : ''}} style="vertical-align: text-top;" value="G" name="frm1601E:j_id392" id="frm1601E:j_id392:_2" onclick="changedrpATCList(this)" /><label for="frm1601E:j_id392:_2" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Government</label></td>
                                                                                @endif
                                                                                
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
                                                        <font size="1" face="Arial">
                                                            <div align="center">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:300px" id="frm1601E:j_id398" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <div align="center" style="padding: 1px 0 1px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                            <tbody>
                                                                                <tr>
                                                                                @if($action == 'new')
                                                                                    <td><input type="radio" style="vertical-align: text-top;" value="Y" name="frm1601E:j_id398" id="frm1601E:j_id398:_1" onclick="enableSelTreaty()" /><label for="frm1601E:j_id398:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >&nbsp;Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                    <td><input type="radio" style="vertical-align: text-top;" value="N" name="frm1601E:j_id398" id="frm1601E:j_id398:_2" onclick="disableSelTreaty()" checked /><label for="frm1601E:j_id398:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >&nbsp;No</label></td>
                                                                                @else
                                                                                    <td><input type="radio" {{ $data->item13 == 'Y' ? 'checked' : '' }} style="vertical-align: text-top;" value="Y" name="frm1601E:j_id398" id="frm1601E:j_id398:_1" onclick="enableSelTreaty()" /><label for="frm1601E:j_id398:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >&nbsp;Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                    <td><input type="radio" {{ $data->item13 == 'N' ? 'checked' : '' }} style="vertical-align: text-top;" value="N" name="frm1601E:j_id398" id="frm1601E:j_id398:_2" onclick="disableSelTreaty()" /><label for="frm1601E:j_id398:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >&nbsp;No</label></td>
                                                                                @endif
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                            <div align="center" style="width: 300px; padding-top: 8px;">
                                                                <label id="frm1601E:j_id401" class="iceOutLbl fieldLabel1" style="font-size: 11px;">If yes, specify</label>
                                                                <select style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; background-color: rgb(220, 220, 220);" size="1" name="frm1601E:j_id402" id="frm1601E:j_id402" disabled="disabled">
                                                                    @if($action == 'new')
                                                                        <option value="" selected="selected"> - </option>
                                                                        <option value="1">Special Law</option>
                                                                    @else
                                                                        <option value="" {{ $data->item13A == "" ? 'selected' : ''}}> - </option>
                                                                        <option value="1" {{ $data->item13A == "1" ? 'selected' : ''}}>Special Law</option>
                                                                    @endif
                                                                    
                                                                </select>
                                                            </div>
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
                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="830">
                                    <tr>
                                        <td class="tblFormTd" valign="top">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="250">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part II</font></td>
                                                    <td width="250" > <font size="2" style="font-weight:bold;letter-spacing: 3px;text-align:center">Computation of Tax</font></td>
                                                    <td><a href="#" id="btnAddATCPartII" onclick="showPartIIATC()">ATC <!--<input type="button" class="printButtonClass" id="btnAddATCPartII" value="ATC" onclick="showPartIIATC()" />--></a> </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- add - by AC Corp -->
                        <tr>
                            <td>
                                <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td valign="top" class="tblFormTd">
                                            <table id="tblPartIIComputeTax" style="margin-left:5px;"  border="0" cellpadding="0" cellspacing="0" width="93%">
                                                <thead>
                                                    <tr>
                                                        <td width="45%"><label size="1" style="font-weight:bold;font-size: 11px;">NATURE OF INCOME PAYMENT</label></td>
                                                        <td width="10%"><label size="1" style="font-weight:bold;font-size: 11px;">ATC</label></td>
                                                        <td width="18%"><label size="1" style="font-weight:bold;font-size: 11px;">TAX BASE</label></td>
                                                        <td width="9%"><label size="1" style="font-weight:bold;font-size: 11px;">TAX RATE</label></td>
                                                        <td width="18%"><label size="1" style="font-weight:bold;font-size: 11px;">TAX REQUIRED TO <br/> BE  WITHHELD</label></td>
                                                    </tr>
                                                </thead>
												
													<tbody id="tbodyComputeTax">
                                                        @if($action != 'new')
                                                            <?php $no = 0;?>
                                                            @forelse($schedules as $each)
                                                                <?php $no++; ?>
                                                                 <tr>
                                                                    <td id='txtNaturePayment{{$no}}' class='modalContent'>{{ $each->description }}</td>
                                                                    <input type='hidden' name='txtNaturePayment[]' value='{{ $each->description }}'/>
                                                                    <td width='10%'>
                                                                        <input type='text' name='frm1601E:txtAtcCd[]'  id='frm1601E:txtAtcCd{{$no}}' style='width: 60px' class='styletxtAtcCode' value='{{ $each->atc }}' disabled/>
                                                                    </td>
                                                                    <td width='15%'>
                                                                        <input type='text' name='frm1601E:txtTaxBase[]' id='frm1601E:txtTaxBase{{$no}}' class='styletxtTaxBase' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld({{$no}}); computeofTotalWithheldTax()' size='15' value='{{ $each->tax_base }}' style="text-align: right;" />
                                                                    </td>
                                                                    <td width='9%'>
                                                                        <input type='text' name='frm1601E:txtTaxRate[]' id='frm1601E:txtTaxRate{{$no}}' style='width: 40px; text-align: right' class='styletxtTaxRate' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld({{$no}}); computeofTotalWithheldTax()' value='{{ $each->rate }}' disabled />
                                                                    </td>
                                                                    <td width='15%'>
                                                                        <input type='text' name='frm1601E:txtTaxbeWithHeld[]' id='frm1601E:txtTaxbeWithHeld{{$no}}' class='styletxtTaxWithheld' size='15' value='{{ $each->withheld }}' disabled style="text-align: right;" />
                                                                    </td>
                                                                </tr>
                                                            @empty

                                                            @endforelse
                                                        @endif
													</tbody>
												
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        
                        <tr>
                            <td>
                                <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTd">
                                            <table width="828" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="26"><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;&nbsp;</font></td>
                                                    <td width="431"><font size="1" style="font-size: 11px;">&nbsp;Total Tax Required to be Withheld and Remitted </font></td>
                                                    <td width="95">
                                                        <div class="spacePadder">                                                        </div>
                                                    </td>
                                                    <td width="187"><table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;"> &nbsp;14</font>&nbsp;</font></td>
                                                                <td><font size="1">
                                                                        <input type="text" value="{{ $action != 'new' ? $data->item14 : '0.00'}}" style="color: black; text-align: right;" size="20" name="frm1601E:txtTax14" maxlength="25" id="frm1601E:txtTax14" onblur="" />
                                                                    </font><font size="2" face="Arial">&nbsp; </font> </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;15&nbsp;</font></td>
                                                    <td><font size="1">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif"><font size="1" style="font-size: 11px;">Less : Tax Credits/Payments</font></font></td>
                                                    <td>
                                                        <div class="spacePadder">                                                        </div>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;15A&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif"><font size="1" style="font-size: 11px;">Tax Remitted in Return Previously Filed, if this is an amended return</font></font></td>
                                                    <td>
                                                        <div class="spacePadder">                                                      </div>
                                                    </td>
                                                    <td><table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;15A</font>&nbsp;</font></td>
                                                                <td><font size="1">
                                                                        <input type="text" value="{{ $action != 'new' ? $data->item15A : '0.00'}}" style="color: black; text-align: right;" size="20" name="frm1601E:txtTax15A" maxlength="25" id="frm1601E:txtTax15A" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTotalTaxCredit()" />
                                                                        &nbsp;</font> <font size="2" face="Arial">&nbsp; </font> </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;15B&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif"><font size="1" style="font-size: 11px;" >Advance Payments Made (please attach proof of payment - BIR Form No. 0605)</font></font></td>
                                                    <td>
                                                        <div class="spacePadder">                                                    </div>
                                                    </td>
                                                    <td><table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;15B</font>&nbsp;</font></td>
                                                                <td><font size="1">
                                                                        <input type="text" value="{{ $action != 'new' ? $data->item15B : '0.00'}}" style="color: black; text-align: right;" size="20" name="frm1601E:txtTax15B" maxlength="25" id="frm1601E:txtTax15B" onblur="round(this,2);computeTotalTaxCredit()" onkeypress="return numbersonly(this, event)" />
                                                                        &nbsp;</font> <font size="2" face="Arial">&nbsp; </font> </td>
                                                            </tr>
                                                        </table></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;15C&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif"><font size="1" style="font-size: 11px;">Total Tax Credits/Payments (Sum of Items 15A and 15B)</font></font></td>
                                                    <td>
                                                        <div class="spacePadder">                                                    </div>
                                                    </td>
                                                    <td><table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;15C</font>&nbsp;</font></td>
                                                                <td><font size="1">
                                                                        <input type="text" value="{{ $action != 'new' ? $data->item15C : '0.00'}}" style="color: black; text-align: right;" size="20" name="frm1601E:txtTax15C" maxlength="15" id="frm1601E:txtTax15C" onblur="" />
                                                                        &nbsp;</font> <font size="2" face="Arial">&nbsp; </font> </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;16&nbsp;</font></td>
                                                    <td><font size="1">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif"><font size="1" style="font-size: 11px;">Tax Still Due/(Overremittance) </font><font face="Arial, Helvetica, sans-serif" size="2"><font size="1" style="font-size: 11px;"> (Item 14 less Item 15C)</font></font></font></td>
                                                    <td>
                                                        <div class="spacePadder">                                                    </div>
                                                    </td>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;16</font>&nbsp;</font></td>
                                                                <td><font size="1">
                                                                        <input type="text" value="{{ $action != 'new' ? $data->item16 : '0.00'}}" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm1601E:txtTax16" maxlength="25" id="frm1601E:txtTax16" disabled="true" />
                                                                        &nbsp;</font> <font size="2" face="Arial">&nbsp; </font> </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;17&nbsp;</font></td>
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
                                                        <table width="587">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="190" align="center">
                                                                        <font size="2" face="Arial"><b>17A</b>&nbsp;
                                                                            <input type="text" value="{{ $action != 'new' ? $data->item17A : '0.00'}}" style="color: black; text-align: right;" size="20" name="frm1601E:txtTax17A" maxlength="25" id="frm1601E:txtTax17A" onblur="round(this,2);computePenalties()" />
                                                                            <input type="hidden" value="" name="frm1601E:inputSurcharge" id="frm1601E:inputSurcharge" />

                                                                        </font>
                                                                    </td>
                                                                    <td width="190" align="center">
                                                                        <font size="2" face="Arial"><b>17B</b>&nbsp;
                                                                            <input type="text" value="{{ $action != 'new' ? $data->item17B : '0.00'}}" style="text-align: right;" size="20" name="frm1601E:txtTax17B" maxlength="25" id="frm1601E:txtTax17B" onblur="round(this,2);computePenalties()" />
                                                                        </font>
                                                                    </td>
                                                                    <td width="191" align="center">
                                                                        <font size="2" face="Arial"><b>17C</b>&nbsp;
                                                                            <input type="text" value="{{ $action != 'new' ? $data->item17C : '0.00'}}" style="text-align: right;" size="20" name="frm1601E:txtTax17C" maxlength="25" id="frm1601E:txtTax17C" onblur="round(this,2);computePenalties()" />
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <div class="spacePadder"> 
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;<font size="2" style="font-weight:bold;">17D</font></font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                            <input type="text" value="{{ $action != 'new' ? $data->item17D : '0.00'}}" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm1601E:txtTax17D" maxlength="25" id="frm1601E:txtTax17D" disabled="true" />
                                                                            &nbsp;</font> <font size="2" face="Arial">&nbsp; </font> </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;</font></td>
                                                    <td colspan="2"><font size="1">&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;">Total Amount Still Due/(Overremittance) (Sum of Items 16 &amp; 17D)</font></td>
                                                    <td>
                                                        <div class="spacePadder"> 
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;<font size="2" style="font-weight:bold;">18</font></font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                            <input type="text" value="{{ $action != 'new' ? $data->item18 : '0.00'}}" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm1601E:txtTax18" maxlength="25" id="frm1601E:txtTax18" disabled="true" class="iceInpTxt-dis" />
                                                                            &nbsp;</font> <font size="2" face="Arial">&nbsp; </font> </td>
                                                                </tr>
                                                            </table>
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
								<div class="imgClass" align='center' style="display:none; width:830px !important;">
									<table style="border-top: 3px solid black; font-family:arial; font-size:11px; text-align: center; vertical-align: top; table-layout: fixed;">
									  <col width="17%" />
									  <col width="17%" />
									  <col width="17%" />
									  <col width="17%" />
									  <col width="32%" />
									  <tr>
									    <td colspan="5">We declare, under the penalties of perjury, that this return has been made in good faith, verified by me/us, and to the best of my/our knowledge, and
									    				<br/> belief, is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
									    				<br/>&nbsp;</td>
									  </tr>
									  <tr>
									    <td colspan="4"><b>19</b>_____________________________________________________________________
									    				<br/>President/Vice President/Principal Officer/Accredited Tax Agent/
									    				<br/>Authorized Representative/Taxpayer
									    				<br/>(Signature Over Printed Name)</td>
									    <td><b>20</b>_____________________________
								    		<br/>Treasurer/Assistant Treasurer
								    		<br/>(Signature Over Printed Name)
								    		<br/>&nbsp;</td>
									  </tr>
									  <tr>
									    <td colspan="2">____________________________________
									    				<br/>Title/Position of Signatory
														<br/>&nbsp;</td>
									    <td colspan="2">____________________________________
									    				<br/>TIN of Signatory
									    				<br/>&nbsp;</td>
									    <td>______________________________
									    	<br/>Title/Position of Signatory
											<br/>&nbsp;</td>
									  </tr>
									  <tr>
									    <td colspan="2">______________________________________
									    				<br/>Tax Agent Acc. No./ Atty's Roll No. (If Applicable)</td>
									    <td>______________
									    	<br/>Date of Issuance</td>
									    <td>______________
									    	<br/>Date of Expiry</td>
									    <td>______________________________
									    	<br/>TIN of Signatory</td>
									  </tr>
									</table>
								</div>
								<div class="imgClass" align='center' style="display:none; width:830px !important;">
									<img id="frm1601E:jurat" src="{{ asset('images/bottom_img/1601E_new.jpg') }}" width="830"/>
								</div>
								<div class="imgClass" align='center' style="display:none; width:830px !important;">
									<table style="font-size:12px; text-align: left; vertical-align: top;">
									  <tr>
									    <td>Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br /><br /><br /><br /><br /></td>
									  </tr>
									</table>
								</div>
                                <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table width="820" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr valign="middle">
                                                                    <td width="55"></td>
                                                                    <td width="697" style="width: 100%">
                                                                        <div id="frm1601E:j_id743" class="icePnlGrp">
                                                                            <div align="center">
                                                                                @if($action != 'view')
                                                                                <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm1601E:cmdValidate" id="frm1601E:cmdValidate" onclick="validateForm()" />
                                                                                <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm1601E:cmdEdit" id="frm1601E:cmdEdit" onclick="enableAllControl()"/>
                                                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
																				<input class="printButtonClass" type="button" value="{{ $action == 'new' ? 'Save' : 'Update'}}" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
																				<input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                            	<input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1601E:btnFinalCopy" id="frm1601E:btnFinalCopy" onclick="submitForm();" />
																				@else
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                                @endif
                                                                                <div id="msg" class="printButtonClass" style="display:none;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td width="105"></td>
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
                    <div id="DummyTxt" style='display:none;'>  </div>
                </div>
				
				</td>
				<td valign="top"><img id="frm1601E:bcsImg" src="{{ asset('images/BCS.jpg') }}"/></td>
                
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

        <!--Start Modal for ATC-->
        <div id="modalAtc" class="aBox" style="width:90%; display:none; height:85%; position:relative; top:13%; left:5%; right:auto; overflow-y:auto; overflow-x:hidden; background:#fff;z-index: 1" align="left">            
            <br/>
            <div class="modalContent" align="left">
                
            </div>
            <div align="center" style="width: 90%; margin:auto;">
                <table cellspacing="3" cellpadding="3" style="position: static;width: 100%">
                    <tr>
                        <td class="modalContent" align="left" colspan="3" style="font-size: 11px;">Please click a check box to select and deselect an ATC.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="modalHeader" align="left" width="auto">&nbsp;&nbsp;&nbsp;<b>ATC</b></td>
                        <td class="modalHeader" align="left" width="auto"><b>Description</b></td>
                        <td class="modalHeader" align="right" width="auto"><b>Rate %</b>&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3"><hr/></td>
                    </tr>
                </table>
            </div>

            <div class="modalColumnHeader" style="height:auto;width: auto; overflow:visible;">
				<table id="tbllistAtcCode" cellspacing="0" cellpadding="0" style="width: 90%;padding:1%;margin:auto;">
                    @if($action != 'new')
                        <?php $no = 0;?>
                        @foreach ($atc as $each)
                           <?php 
                                $no++; 
                                $selected = \eTax\tbl_1601E_schedule::where('form_id', $data->id)
                                                                    ->where('atc', $each->atc)
                                                                    ->where('description', $each->description)
                                                                    ->value('description');
                           ?>
                        <tr class='atc'>
                        	<td width='auto' class='atc'> <input id='AtcCode{{$no}}' {{ !empty($selected) ? 'checked' : '' }} name='AtcCode{{$no}}' type='checkbox' value='{{ $each->atc }}' style="vertical-align: middle" /> {{ $each->atc }}</td>
                        	<td style="width: 90%;" id='AtcNaturePayment{{$no}}' class='atc atcNames' >{{ $each->description }}</td>
                        	<td width='auto' id='txtRate{{$no}}' class='atc'>{{ $each->rate }}</td>
                        </tr>
                        @endforeach
                    @else
                        <?php $no = 0;?>
                        @foreach ($atc as $each)
                             <?php $no++; ?>
                            <tr class='atc'>
                                <td width='auto' class='atc'> <input id='AtcCode{{$no}}' name='AtcCode{{$no}}' type='checkbox' value='{{ $each->atc }}' style="vertical-align: middle" /> {{ $each->atc }}</td>
                                <td style="width: 90%;" id='AtcNaturePayment{{$no}}' class='atc atcNames' >{{ $each->description }}</td>
                                <td width='auto' id='txtRate{{$no}}' class='atc'>{{ $each->rate }}</td>
                            </tr>
                        @endforeach
                    @endif
                </table>
				<div align="center">
					<input type="button" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getATCCode()" />
				</div>
            </div>            
            <br />
        </div>
        <!--End Modal for ATC-->
        <input type="text" id="hPartIITableSize" name="hPartIITableSize"  value="" style="visibility: hidden;width: 0px"/>
		<!-- import modal -->
        <div id="modalImport" style="width:50%; display:none; height:40%; position:fixed; top:3%; left:25%; right:auto; overflow-y:auto; overflow-x:hidden; background:#e2e2e2;" align="center">
            <br/>
            <br/>
			<table border="0" width="60%" align="center">
				<tr class="modalHeader">
					<td>Import</td>
				</tr>
			</table>
            <table border="0" cellspacing="3" cellpadding="3" width="60%">
                <tr><td>&nbsp;</td></tr>
            </table>
			<div align="center">
				<br />
				<br />
				<input type="button" class="printButtonClass" name="btnOkImport" id="btnOkImport" style="width:120px; height:30px;" value="OK" onclick="importFiles()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" class="printButtonClass" name="btnCancelImport" id="btnCancelImport" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelImportModal()" />
			</div>
            <br />
            <br />
        </div>
	
	
	<div id="hiddenEmail" style="display:none;"  > 
					<input id="txtEmail" value="{{ $company->email_address}}" class="emailClass" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60"   />
		</div>
	
	<!-- export modal -->
        <div id="modalExport" style="width:50%; display:none; height:43%; position:fixed; top:3%; left:25%; right:auto; overflow-y:auto; overflow-x:hidden; background:#e2e2e2;" align="center">
            <br/>
            <br/>
			<table border="0" width="60%" align="center">
				<tr class="modalHeader">
					<td>Have Disk</td>
				</tr>
			</table>
            <table border="0" cellspacing="3" cellpadding="3" width="60%">
                <tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr> 
                    <td class="modalColumnHeader">Make sure that a recordable media [diskette/universal serial bus (USB) flash drive, compact disc (cd), digital video disc (dvd)] is already inserted.</td>
                </tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
                    <td class="modalColumnHeader">Drive: 
						<select class="driveSelect" id="driveSelectTPExport" name="driveSelectTPExport" size="1" class="modalContent">
							
						</select>
					</td>
                </tr>
            </table>
			<div align="center">
				<br />
				<br />
				<input type="button" class="printButtonClass" name="btnOk" id="btnOkExport" style="width:120px; height:30px;" value="OK" onclick="exportTPFiles(fileNameToExport); checkFinalCopyBtn('1601E');"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" class="printButtonClass" name="btnCancel" id="btnCancelExport" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelExportModal(); checkFinalCopyBtn('1601E');" />
			</div>
            <br />
            <br />
        </div>
		</form>
@endsection

@section('scripts')
<script type="text/javascript">
	var isSubmitFinal = false;
	var isSubmit = false;
	
	var gIsReadOnly = false;
	var atcList = new Array();
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
	
	var fileName = "";
	var existingXMLFileName = "";

	//Declare global variable
    var ATCnameCode = new Array() ;
    var NaturePayment = new Array() ;
    var taxRate = new Array();
    var ATCCodeList = new Array();
    var str;
    var previoustbllistAtcCode;
    var specialLawFlag = false;
    var taxWheldFlag = false;
    str = setInterval("sleeptime()", 300);
	var globalEmail = "";
	var d=document,data='',XMLBGFile='',XMLFile='', XMLATCFile='',msg = d.getElementById('msg');

    function sleeptime()
    {
        clearInterval(str);
        init(); 
		
		document.getElementById('frm1601E:txtTIN1').disabled = true; document.getElementById('frm1601E:txtTIN2').disabled = true; document.getElementById('frm1601E:txtTIN3').disabled = true; document.getElementById('frm1601E:txtBranchCode').disabled = true;
   }
   function init()
    {
        var month = new Date();
		var year = new Date();
		
        @if($action == 'new')
        d.getElementById('frm1601E:j_id201').selectedIndex = 0;
		d.getElementById('frm1601E:txtYear').value = 2017;
        d.getElementById('frm1601E:j_id402').disabled = true;
        @endif

        @if($action == 'edit')
            @if($data->item13 == 'Y')
                enableSelTreaty();
                d.getElementById('frm1601E:j_id402').disabled = false;
            @else
                d.getElementById('frm1601E:j_id402').disabled = true;
            @endif
        @endif

        @if($action != 'view')
            d.getElementById('frm1601E:cmdEdit').disabled = true;
            d.getElementById('frm1601E:btnFinalCopy').disabled = true;
            d.getElementById('btnUpload').disabled = true;
            d.getElementById('btnPrint').disabled = true;

            d.getElementById('frm1601E:txtTax17A').disabled = false;
            d.getElementById('frm1601E:txtTax17B').disabled = false;
            d.getElementById('frm1601E:txtTax17C').disabled = false;

            d.getElementById('frm1601E:txtTax15B').disabled = false;

            d.getElementById('frm1601E:txtSheets').disabled = false;

            d.getElementById('frm1601E:j_id217:_1').disabled = false;
            d.getElementById('frm1601E:j_id217:_2').disabled = false;
        @else
            d.getElementById('frm1601E:txtTax17A').disabled = true;
            d.getElementById('frm1601E:txtTax17B').disabled = true;
            d.getElementById('frm1601E:txtTax17C').disabled = true;

            d.getElementById('frm1601E:txtTax15B').disabled = true;

            d.getElementById('frm1601E:txtSheets').disabled = true;

            d.getElementById('frm1601E:j_id217:_1').disabled = true;
            d.getElementById('frm1601E:j_id217:_2').disabled = true;
            
            disableAllControl();
        @endif

        d.getElementById('frm1601E:txtTax14').disabled = true;
        d.getElementById('frm1601E:txtTax15C').disabled = true;
        d.getElementById('frm1601E:txtTax16').disabled = true;
       
        d.getElementById('frm1601E:txtTax17D').disabled = true;
        d.getElementById('frm1601E:txtTax18').disabled = true;

        if(d.getElementById('frm1601E:j_id217:_1').checked == true){
            d.getElementById('frm1601E:txtTax15A').disabled = false;
        } else {
            d.getElementById('frm1601E:txtTax15A').disabled = true;
        }
        
	
	}

    var valid = initialValidateBeforeSave();

	function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
               
                var data = form.serialize();
                save('1601E',data);
                
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
        saveAndExit('1601E',data);
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

        submitAndSave('1601E', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1601E';
    }

	function getPrivateWithholdingAgentATC()
    {
        ATCnameCode = new Array() ;
        NaturePayment = new Array() ;
        taxRate = new Array();

        //var atcSize = atcList.getSize();
		var atcSize = atcList.length;
		
        var i = 0;
        var j = 1;
        NaturePayment[0] = "NO VALUE";
        for(i = 0; i < atcSize; i++) {
            var atc = atcList[i];


            if(atc.formType == "1601E" && atc.category == 'P') {
                str = str + atc.atcCode + " " + atc.description + " " + atc.rate + "\n" ;
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                taxRate[j++] = atc.rate;
            }
        }
    }
    function getGovernmentWithholdingAgentATC()
    {
        ATCnameCode = new Array() ;
        NaturePayment = new Array() ;
        taxRate = new Array();


        //var atcSize = atcList.getSize();
		var atcSize = atcList.length;
	
        var i;
        var j=1;
        var str = "";
        NaturePayment[0] = "NO VALUE";
        for(i = 0; i < atcSize; i++) {
            //var atc = atcList.get(i);
			var atc = atcList[i];

            if(atc.formType == "1601E" && atc.category == 'G') {
                str = str + atc.atcCode + " " + atc.description + " " + atc.rate + "\n" ;
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                taxRate[j++] = atc.rate;
            }
			
        }
    }

    function changedrpATCList(e)
    {
        var i;
        if(e.value == "P")
        {
            // change ATClist
            getPrivateWithholdingAgentATC();
        }else if(e.value == "G")
        {
            // change ATClist
            getGovernmentWithholdingAgentATC();
        }

        for(i = 1 ; i < ATCnameCode.length ; i++  )
        {
            $('#tbllistAtcCode').html(d.getElementById('tbllistAtcCode').innerHTML +
                "<tr class='atc'>" +
                "    <td width='auto' class='atc'> <input id='AtcCode"+i+"' name='AtcCode"+i+"' type='checkbox' value='" + ATCnameCode[i] + "' /> " + ATCnameCode[i] + "</td>" +
                "    <td width='auto' id='AtcNaturePayment"+i+"' class='atc atcNames' >" + NaturePayment[i].split('<=').join('&lt;=')+ "</td>" +
                "    <td width='auto' id='txtRate"+i+"' class='atc'> " + taxRate[i] + "</td>" +
                "</tr>");
        }   
		
    }

    function cancelPartIIATC()
    {
        d.getElementById('formPaper').style.display = 'block';
        if ( $('#modalAtc').css('display') != 'none' ) {
			$('#modalAtc').hide('blind');
            $('#wrapper').css({'display':'block'});
		}
		
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
        for(i =1 ; i < d.getElementById('tbllistAtcCode').rows.length; i++)
        {
            d.getElementById('AtcCode'+i).checked = ATCCodeList[i];
        }
    }
    var tempATC = new Array();
    var tempATCTaxbase = new Array();
    function showPartIIATC()
    {
        tempATC = new Array();
            tempATCTaxbase = new Array();
            for(var i = 0; i < d.getElementById('tblPartIIComputeTax').rows.length - 1; i++) {
                tempATC[i] = d.getElementById('frm1601E:txtAtcCd'+ (i + 1)).value;
                tempATCTaxbase[i] = d.getElementById('frm1601E:txtTaxBase'+(i +1)).value;

        }
		if( checkiftaxwheldisYes() == true )
			{
				d.getElementById('formPaper').style.display = "none";
				$('#modalAtc').show('blind');
                $('#wrapper').css({'display':'none'});
			}else {
				alert(checkiftaxwheldisYes());
			}
    }

    function checkiftaxwheldisYes()
    {
        if(d.getElementById('frm1601E:j_id252:_1').checked == false && d.getElementById('frm1601E:j_id252:_2').checked == false )
        {
            return "Please select an option for Item 4.";
        }
        else if( d.getElementById('frm1601E:j_id392:_1').checked == false && d.getElementById('frm1601E:j_id392:_2').checked == false  )
        {
            return "Please select an option for Item 12.";
        }
        else if( d.getElementById('frm1601E:j_id252:_1').checked == true )
        {
            return true;
        }
        else
        {
            return "Selecting an ATC is not necessary when item no. 4 is set to ' NO '";
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
    function getATCCode()
    {
        var listATCtable =   d.getElementById('tbllistAtcCode');
        $('#tbodyComputeTax').html("");
        for(i = 1 ; i <= listATCtable.rows.length; i++ )
        {
            var table = d.getElementById("tblPartIIComputeTax");
            var iCtr = table.rows.length;
            var rowCount = table.rows.length - 1;
            ATCCodeList[i] = d.getElementById('AtcCode'+i).checked;

            // check if checked id'ed ATC
            if (d.getElementById('AtcCode'+i).checked == true )
            {
                var taxbasetemp = "";
                for(var tempCount = 0 ; tempCount < tempATC.length; tempCount++) {
                    if(tempATC[tempCount] == d.getElementById('AtcCode'+i).value){
                        taxbasetemp = tempATCTaxbase[tempCount];
                        break;
                    }
                }

                $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +
                    "<tr><td id='txtNaturePayment"+iCtr+"' class='modalContent'> "+ d.getElementById('AtcNaturePayment'+i).innerHTML + " </td> <input type='hidden' name='txtNaturePayment[]' value='"+ d.getElementById('AtcNaturePayment'+i).innerHTML + "'/>" +
                    "<td width='10%'> <input type='text' name='frm1601E:txtAtcCd[]'  id='frm1601E:txtAtcCd"+iCtr+"' style='width: 60px' class='styletxtAtcCode' value='"+ d.getElementById('AtcCode'+i).value + "' />  </td>" +
                    "<td width='18%'> <input type='text' name='frm1601E:txtTaxBase[]' id='frm1601E:txtTaxBase"+iCtr+"' class='styletxtTaxBase' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr+"); computeofTotalWithheldTax()' size='17' value='"+ taxbasetemp + "'/> </td>" +
                    "<td width='9%'> <input type='text' name='frm1601E:txtTaxRate[]' id='frm1601E:txtTaxRate"+iCtr+"' style='width: 40px; text-align: right' class='styletxtTaxRate' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr+"); computeofTotalWithheldTax()' value='"+ d.getElementById('txtRate'+i).innerHTML +"' disabled /> </td>" +
                    "<td width='18%'> <input type='text' name='frm1601E:txtTaxbeWithHeld[]' id='frm1601E:txtTaxbeWithHeld"+iCtr+"' class='styletxtTaxWithheld' size='17' value='0.00' disabled /> </td>" +
                    "</tr>") ;
                setTimeout("d.getElementById('frm1601E:txtAtcCd"+iCtr+"').disabled = true; setInputTextControl_HorizontalAlignment('frm1601E:txtTaxBase"+iCtr+"', 4);" +
                "d.getElementById('frm1601E:txtTaxbeWithHeld"+iCtr+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601E:txtTaxbeWithHeld"+iCtr+"', 4);" +
                "d.getElementById('frm1601E:txtTaxRate"+iCtr+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601E:txtTaxRate"+iCtr+"', 4);" +
                    "getRequiredWithheld("+iCtr+");", 100);
					
				if (d.getElementById('AtcCode'+i).value == "N/A") {
					setTimeout("d.getElementById('frm1601E:txtTaxRate"+iCtr+"').disabled = false;", 100);
				}

                waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601E:txtTaxBase"+iCtr+"', 15, 2); d.getElementById('frm1601E:txtTaxBase"+iCtr+"').value = '" + taxbasetemp + "'" , 100);
                waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601E:txtTaxbeWithHeld"+iCtr+"', 15, 2); getRequiredWithheld(" + iCtr + ");", 100);

            }
        }
        setTimeout("computeofTotalWithheldTax()", 100);
        cancelPartIIATC();
    }
    function computeofTotalWithheldTax()
    {
        var i;
        var totalsum = 0;
        for(i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
            var taxwithheld = (d.getElementById('frm1601E:txtTaxbeWithHeld'+i).value*1);
            totalsum = totalsum*1 + NumWithComma(d.getElementById('frm1601E:txtTaxbeWithHeld'+i).value)*1;
        }
        d.getElementById('frm1601E:txtTax14').value = formatCurrency(totalsum);

        d.getElementById('frm1601E:txtTax16').value = formatCurrency(NumWithComma(d.getElementById('frm1601E:txtTax14').value)*1 - NumWithComma(d.getElementById('frm1601E:txtTax15C').value)*1);
        computeOfTotalAmtDue();
    }

    function blockletter(e)
    {
        var number = parseFloat(e.value).toFixed(2);
        if(isNaN(number))
        {
            var zero = 0;
            e.value = parseFloat(zero).toFixed(2);
        }else {
            e.value = '' + number;
        }
    }
    function getRequiredWithheld(numIndex)
    {
       d.getElementById('frm1601E:txtTaxbeWithHeld'+numIndex).value = "" + formatCurrency(NumWithComma(d.getElementById('frm1601E:txtTaxBase' + numIndex).value) * NumWithComma(d.getElementById('frm1601E:txtTaxRate' + numIndex).value) / 100);
    }

    function computeOfTotalAmtDue()
    {
        d.getElementById('frm1601E:txtTax18').value = formatCurrency(NumWithComma(d.getElementById('frm1601E:txtTax16').value)*1 + NumWithComma(d.getElementById("frm1601E:txtTax17D").value)*1);
		capital();
	}

    function computeTotalTaxCredit()
    {
        d.getElementById('frm1601E:txtTax15C').value = formatCurrency(NumWithComma(d.getElementById('frm1601E:txtTax15A').value)*1 + NumWithComma(d.getElementById('frm1601E:txtTax15B').value)*1);
		d.getElementById('frm1601E:txtTax16').value = formatCurrency(NumWithComma(d.getElementById('frm1601E:txtTax14').value)*1 - NumWithComma(d.getElementById('frm1601E:txtTax15C').value)*1);

        computeOfTotalAmtDue();
    }
	
	function computePenalties() {
		var tax17D = NumWithComma(d.getElementById("frm1601E:txtTax17A").value)*1 + NumWithComma(d.getElementById("frm1601E:txtTax17B").value)*1 + NumWithComma(d.getElementById("frm1601E:txtTax17C").value)*1;
        d.getElementById("frm1601E:txtTax17D").value = formatCurrency(tax17D);
		computeOfTotalAmtDue();
	}
	function validateForm()
    {
        var dt = new Date();

        if( (d.getElementById('frm1601E:txtYear').value == "")  )
        {
            alert("Please enter a valid year on Item 1.");
            return;
        }
       
        if( d.getElementById('frm1601E:txtYear').value*1 < 1900   )
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }
		if( d.getElementById('frm1601E:txtYear').value >= 2018   )
        {
            alert("If you wish to remit withholding tax from year 2018 onwards, please use BIR Form 0619-E.");
			d.getElementById('frm1601E:txtYear').value = 2017;
            return;
        }
        if(d.getElementById('frm1601E:j_id252:_1').checked == false && d.getElementById('frm1601E:j_id252:_2').checked == false )
        {
            alert("Please select an option for Item 4.")
            return;
        }
		
        if( (d.getElementById('frm1601E:txtTIN1').value == "" || d.getElementById('frm1601E:txtTIN2').value == "" || d.getElementById('frm1601E:txtTIN3').value == "" || d.getElementById('frm1601E:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 5.");
            return;
        }		
				
        if( (d.getElementById('frm1601E:txtLineBus').value == "")  )
        {
            alert("Please enter a valid Line of Business/Occupation on Item 7.");
            return;
        }	
		if( (d.getElementById('frm1601E:txtTaxpayerName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 8.");
            return;
        }
		if( (d.getElementById('frm1601E:txtTelNum').value == "")  )
        {
            alert("Please enter a valid Telephone Number on Item 9.");
            return;
        }
		if( (d.getElementById('frm1601E:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 10.");
            return;
        }			
		if( (d.getElementById('frm1601E:txtZipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip Code on Item 11.");
            return;
        }
        if( d.getElementById('frm1601E:j_id392:_1').checked == false && d.getElementById('frm1601E:j_id392:_2').checked == false  )
        {
            alert("Please select an option for Item 12.");
            return;
        }
        if ( d.getElementById('frm1601E:j_id252:_1').checked == true  )
        {    // count of Compute Tax
            if ( 1 >= ( d.getElementById('tblPartIIComputeTax').rows.length)  )
            {
                alert("Please fill up Part II Computation of Tax if item 4 is set to Yes.")
                return;
            }
            var indexwithheld = 1;
            for (indexwithheld = 1 ; indexwithheld < ( d.getElementById('tblPartIIComputeTax').rows.length)  ; indexwithheld++)
            {
                if( d.getElementById('frm1601E:txtAtcCd'+indexwithheld).value != "")
                {
                    if( d.getElementById('frm1601E:txtTaxBase'+ indexwithheld).value == "" )
                    {
                        alert("Please enter a valid value for tax base for " + d.getElementById('frm1601E:txtAtcCd'+indexwithheld).value + "." )
                        return;
                    }
                }else {
                    alert("Please fill up Part II Computation of Tax if item 4 is set to Yes.")
                    return;
                }
            }
        }

        var rowSize = d.getElementById('tblPartIIComputeTax').rows.length;
        for(var i = 0; i < (rowSize - 1); i++){
            if(d.getElementById("frm1601E:txtTaxBase" + (i + 1)).value <= 0) {
                alert("Please enter Tax Base for ATC " + d.getElementById("frm1601E:txtAtcCd" + (i + 1)).value + ". Value must be greater than 0.00.");
                return;
            }
        }

        d.getElementById('hPartIITableSize').value = d.getElementById('tblPartIIComputeTax').rows.length - 1;
        d.getElementById('frm1601E:cmdValidate').disabled = true;
        d.getElementById('frm1601E:cmdEdit').disabled = false;
        d.getElementById('btnUpload').disabled = false;

        disableAllControl();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
		return;
    }
    var disableElem = true;
	var enableElem = false;
    function disableAllControl()
    {
		d.getElementById('btnPrint').disabled = false;
        @if($action != 'view')
		      d.getElementById('frm1601E:cmdEdit').disabled = false;
            d.getElementById('frm1601E:btnFinalCopy').disabled = false;
        @endif
		d.getElementById('frm1601E:txtSheets').disabled = true;
        d.getElementById('frm1601E:txtTIN1').disabled = true;
        d.getElementById('frm1601E:txtTIN2').disabled = true;
        d.getElementById('frm1601E:txtTIN3').disabled = true;
        d.getElementById('frm1601E:txtBranchCode').disabled = true;
        d.getElementById('frm1601E:txtRDOCode').disabled = true;
        d.getElementById('frm1601E:txtLineBus').disabled = true;
        d.getElementById('frm1601E:txtTaxpayerName').disabled = true;
        d.getElementById('frm1601E:txtTelNum').disabled = true;
        d.getElementById('frm1601E:txtAddress').disabled = true;
        d.getElementById('frm1601E:txtZipCode').disabled = true;
			
		d.getElementById('frm1601E:j_id217:_1').disabled = true;
        d.getElementById('frm1601E:j_id217:_2').disabled = true;
        d.getElementById('frm1601E:j_id201').disabled = true;
        d.getElementById('frm1601E:txtYear').disabled = true;
        d.getElementById('frm1601E:j_id252:_1').disabled = true;
        d.getElementById('frm1601E:j_id252:_2').disabled = true;
        d.getElementById('frm1601E:j_id392:_1').disabled = true;
        d.getElementById('frm1601E:j_id392:_2').disabled = true;
        d.getElementById('frm1601E:j_id398:_1').disabled = true;
        d.getElementById('frm1601E:j_id398:_2').disabled = true;
        d.getElementById('frm1601E:j_id402').disabled = true;
		d.getElementById('frm1601E:txtTax17A').disabled = true;
        d.getElementById('frm1601E:txtTax17B').disabled = true;
        d.getElementById('frm1601E:txtTax17C').disabled = true;

        for(i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
            d.getElementById('frm1601E:txtTaxBase'+i).disabled = true;
        }

        d.getElementById('frm1601E:txtTax15A').disabled = true;
        d.getElementById('frm1601E:txtTax15B').disabled = true;
        d.getElementById('btnAddATCPartII').disabled = true;
		disableElem;
		enableElem;
    }

    function enableAllControl()
    {
        d.getElementById('frm1601E:j_id217:_1').disabled = false;
        d.getElementById('frm1601E:j_id217:_2').disabled = false;
        d.getElementById('frm1601E:j_id201').disabled = false;
        d.getElementById('frm1601E:txtYear').disabled = false;
        d.getElementById('frm1601E:j_id252:_1').disabled = false;
        d.getElementById('frm1601E:j_id252:_2').disabled = false;
        d.getElementById('frm1601E:j_id392:_1').disabled = false;
        d.getElementById('frm1601E:j_id392:_2').disabled = false;
        d.getElementById('frm1601E:j_id398:_1').disabled = false;
        d.getElementById('frm1601E:j_id398:_2').disabled = false;
        d.getElementById('frm1601E:j_id402').disabled = false;
		
		d.getElementById('frm1601E:txtTax17A').disabled = false;
        d.getElementById('frm1601E:txtTax17B').disabled = false;
        d.getElementById('frm1601E:txtTax17C').disabled = false;

        for(i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
            d.getElementById('frm1601E:txtTaxBase'+i).disabled = false;
        }

        if(d.getElementById('frm1601E:j_id217:_1').checked == true){
            d.getElementById('frm1601E:txtTax15A').disabled = false;
        } else {
            d.getElementById('frm1601E:txtTax15A').disabled = true;
        }
        d.getElementById('frm1601E:txtTax15B').disabled = false;
        d.getElementById('btnAddATCPartII').disabled = false;
        d.getElementById('frm1601E:cmdValidate').disabled = false;
		d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1601E:cmdEdit').disabled = true;
		d.getElementById('frm1601E:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
		
		if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
		d.getElementById('frm1601E:j_id201').disabled = true;
		d.getElementById('frm1601E:txtYear').disabled = true;	
		}
		
		disableElem;
		enableElem;
		document.getElementById('frm1601E:txtTIN1').disabled = true; document.getElementById('frm1601E:txtTIN2').disabled = true; document.getElementById('frm1601E:txtTIN3').disabled = true; document.getElementById('frm1601E:txtBranchCode').disabled = true;
    }

    function printme() {

        $('#bg').hide(); //830
        $('.printSignFooterClass').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always' });    
        $('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
        
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
                  
                }               
                if (elem[i].type == 'radio' || elem[i].type == 'checkbox') { 
                    if (document.getElementById(elem[i].id).disabled) {
                        disabledItems[x] = elem[i].id;
                        x++;
                    }
                }   
                if(elem[i].type == 'select-one'){
                    $( elem[i] ).hide();
                    if(elem[i].options[elem[i].selectedIndex] != undefined){
                        var label = "<div class='labels' style='width: 105px;float: left;'>".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</div>");
                        $( elem[i] ).after(label);
                    }
                }
            }
        }   
        
        $('.printButtonClass').hide();
        $("#formPaper").show();
    
        window.print();

        $('.printButtonClass').show();
        $('#formPaper').css({'max-width':'8.3in !important', 'border':'#a7a7a7 1px solid' });
        $('.imgClass').css({ 'display':'none' });

        $('#printMenu').show('blind');
        if ( $('#formMenu').css('display') != 'none' ) {    
            $('#formMenu').hide('blind');
        }   
    }

    function enabletaxrate(){
		for(i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
			if (d.getElementById('frm1601E:txtAtcCd'+i).value == "N/A")
				d.getElementById('frm1601E:txtTaxRate'+i).disabled = false;
        }
	}
	
	function disabletaxrate(){
		for(i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
            d.getElementById('frm1601E:txtTaxRate'+i).disabled = true;
        }
	}
	function clearpart2(){
		for(i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
            d.getElementById('frm1601E:txtTaxBase'+i).value = formatCurrency(0.00);
			d.getElementById('frm1601E:txtTaxbeWithHeld'+i).value = formatCurrency(0.00);
        }
		
		d.getElementById('frm1601E:txtTax14').value = formatCurrency(0.00);
		d.getElementById('frm1601E:txtTax15A').value = formatCurrency(0.00);
        d.getElementById('frm1601E:txtTax15B').value = formatCurrency(0.00);
        d.getElementById('frm1601E:txtTax15C').value = formatCurrency(0.00);
		d.getElementById('frm1601E:txtTax16').value = formatCurrency(0.00);
        
		d.getElementById('frm1601E:inputSurcharge').value = formatCurrency(0.00);
        d.getElementById('frm1601E:txtTax17B').value = formatCurrency(0.00);
        d.getElementById('frm1601E:txtTax17C').value = formatCurrency(0.00);
        d.getElementById('frm1601E:txtTax17D').value = formatCurrency(0.00);
		
        d.getElementById('frm1601E:txtTax18').value = formatCurrency(0.00);
	}
	function enableSelTreaty() {
		try {
			
        if (d.getElementById('frm1601E:j_id392:_1').checked == false &&
			d.getElementById('frm1601E:j_id392:_2').checked == false  ) {
            alert("Please select an option for Item 12.");
			d.getElementById('frm1601E:j_id398:_2').checked = true;
			return;
        } else {
            d.getElementById('frm1601E:j_id402').disabled = false;
            d.getElementById('frm1601E:j_id402').selectedIndex = 1;
            if(!specialLawFlag){
                var i = d.getElementById('tbllistAtcCode').rows.length + 1;
                
                previoustbllistAtcCode = d.getElementById('tbllistAtcCode').innerHTML;
                $('#tbllistAtcCode').html( d.getElementById('tbllistAtcCode').innerHTML +
                    "<tr><td width='auto'> <input id='AtcCode"+i+"' name='AtcCode"+i+"' type='checkbox' value='N/A' /> N/A </td> <td width='auto' id='AtcNaturePayment"+i+"' > Others </td> <td width='auto' id='txtRate"+i+"'> 0.0 </td> </tr>");
                specialLawFlag = true;
            }
        }
		} catch(e) { /*msg.innerHTML = "enableSelTreaty :: " + e.message;*/ }
	    enabletaxrate();	
    }
    function disableSelTreaty()
    {
        d.getElementById('frm1601E:j_id402').disabled = true;
        d.getElementById('frm1601E:j_id402').selectedIndex = 0;

        if(specialLawFlag){
            $('#tbllistAtcCode').html( previoustbllistAtcCode );
            specialLawFlag = false;
        }
		disabletaxrate();
	}
	function changeTaxWithheldNO() {				
        if(taxWheldFlag){
            if(confirm("You are about to change the value . Doing this will clear all \n computation fields Do you wish to proceed?")){
                d.getElementById('frm1601E:txtTax14').value = (0).toFixed(2);
                d.getElementById('frm1601E:txtTax15A').value = (0).toFixed(2);
                d.getElementById('frm1601E:txtTax15B').value = (0).toFixed(2);
                d.getElementById('frm1601E:txtTax15C').value = (0).toFixed(2);
                d.getElementById('frm1601E:txtTax16').value = (0).toFixed(2);
                d.getElementById('frm1601E:txtTax17A').value = (0).toFixed(2);
                d.getElementById('frm1601E:txtTax17B').value = (0).toFixed(2);
                d.getElementById('frm1601E:txtTax17C').value = (0).toFixed(2);
                d.getElementById('frm1601E:txtTax17D').value = (0).toFixed(2);
                d.getElementById('frm1601E:txtTax18').value = (0).toFixed(2);
                $('#tbodyComputeTax').html("");				
				for(i =1 ; i < d.getElementById('tbllistAtcCode').rows.length; i++) {
					d.getElementById('AtcCode'+i).checked = false;
				}				
            } else {
                d.getElementById('frm1601E:j_id252:_1').checked = true;
            }
        } taxWheldFlag = true;				
    }
    function initialValidateBeforeSave() {
			if( (d.getElementById('frm1601E:txtTIN1').value == "" || d.getElementById('frm1601E:txtTIN2').value == "" || d.getElementById('frm1601E:txtTIN3').value == "" || d.getElementById('frm1601E:txtBranchCode').value == "")  )
			{
				alert("Please enter a valid TIN number on Item 5.");
				return false;
			}	
			if ((d.getElementById('frm1601E:txtRDOCode').value == "000")) {
			    alert("Please enter a valid RDO Code on Item 6.");
			    return false;
			}
			if( (d.getElementById('frm1601E:txtTaxpayerName').value == "")  )
			{
				alert("Please enter a valid Withholding Agent's Name on Item 8.");
				return false;
			}		
			return true;
	}
</script>
@endsection

