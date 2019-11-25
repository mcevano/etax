@extends('layouts.app')
@section('title', '| BIR Form No. 1600')
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
        <button type="button" class="btn btn-danger btn-exit" id="1600" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1600" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1600' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 990px; ">
			
				<table border="0" width="990" cellspacing="0" cellpadding="0" align="center" style=" background-repeat: repeat-x;">
				<tr><td>
			
                <div id="formPaper">
                    <div id="mainContent">
                        <table width="990" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table width="990" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
                                        <tr>
                                            <td width="82"  style='padding:0px;' valign="middle" align="center">										
												<p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /><p>
											</td>
                                            <td width="158" valign="middle">
                                                <label face="Arial" size="1px">Republika ng Pilipinas
												<br/>Kagawaran ng Pananalapi
												<br/>Kawanihan ng Rentas Internas</label>
                                            </td>
                                            <td width="0" align="center">
                                                <label size="5px" style="font-weight:bold;font-size: 19px;">Monthly Remittance Return of<br/>Value-Added Tax and Other<br/>Percentage Taxes Withheld</label>
                                            </td>
                                            <td width="145" valign="center">
                                                <font face="Arial" size="1px">BIR Form No.<br/></font>
                                                <font face="Arial" size="6px">1600<br/></font>
                                                <font face="Arial" size="1px">September 2005 (ENCS)</font>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="990" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td colspan="4" valign="top" style="background-color:#FFFFFF" ><div align="left"><font face="Arial, Helvetica, sans-serif" size="2">Under RAs 1051, 7649, 8241, 8424 and 9337</font></div></td>
                                        </tr>
                                        <tr>
                                            <td width="313" valign="top" class="tblFormTd">
                                                <table width="234" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">For the Month (MM/YYYY)</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <select size="1" name="frm1600:j_id201" id="frm1600:j_id201" class="iceSelOneMnu fieldSelect1">
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
                                                            <input type="text" value="" size="4" name="frm1600:txtYear" maxlength="4" id="frm1600:txtYear" onkeypress="return wholenumber(this, event)"/>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="236" valign="top" class="tblFormTd">
                                                <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1600:j_id217" class="iceSelOneRb-dis fieldText1-dis">
                                                                <div align="center" style="padding: 5px 0 5px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="radio" value="Y" name="frm1600:j_id217" id="frm1600:j_id217:_1" onclick="d.getElementById('frm1600:txtTax15').disabled = false;d.getElementById('frm1600:txtTax15').style.background='#FFFFFF';" /><label for="frm1600:j_id217:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                <td><input type="radio" value="N"  name="frm1600:j_id217" id="frm1600:j_id217:_2" onclick="d.getElementById('frm1600:txtTax15').disabled = true; d.getElementById('frm1600:txtTax15').value = '0.00';d.getElementById('frm1600:txtTax15').style.background='#E2E2E2'; computeofTotalWithheldTax()" checked="checked" /><label for="frm1600:j_id217:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >No</label></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="244" valign="top" class="tblFormTd">
                                                <table width="152" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">No. of Sheets Attached?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" value="0" style="text-align: right;" size="4" name="frm1600:txtSheets" maxlength="2" id="frm1600:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)"/></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="197" valign="top" class="tblFormTd">
                                                <table width="140" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Any Taxes Withheld?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1600:j_id252" class="iceSelOneRb fieldText1">
                                                                <div align="center" style="padding: 5px 0 5px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="radio" value="Y" name="frm1600:j_id252" id="frm1600:j_id252:_1" onclick="enableallShedIIATC()"/><label for="frm1600:j_id252:_1" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                <td><input type="radio" value="N" name="frm1600:j_id252" id="frm1600:j_id252:_2"   onclick="cancelAllCompute()"  /><label for="frm1600:j_id252:_2" style="font-size:12px;" >No</label></td>
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
                                    <table width="990" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="721" style="height: 22px" border="0" cellpadding="0" cellspacing="0">
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
                                    <table width="990" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="415" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                            <input type="text" value="{{$company->tin1}}" size="2" name="frm1600:txtTIN1" maxlength="3" id="frm1600:txtTIN1" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin2}}" size="2" name="frm1600:txtTIN2" maxlength="3" id="frm1600:txtTIN2" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin3}}" size="2" name="frm1600:txtTIN3" maxlength="3" id="frm1600:txtTIN3" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin4}}" size="2" name="frm1600:txtBranchCode" maxlength="4" id="frm1600:txtBranchCode" onkeypress="return letternumber(event)"/>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="270" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                        <td id="rdoSelect">
                                                            <select class='iceSelOneMnu' disabled id='frm1600:txtRDOCode' name='frm1600:txtRDOCode' size='1' >
                                                                <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="305" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">Line of Business/Occupation&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                            <input type="text" disabled="" value="{{$company->line_business}}" size="20" name="frm1600:txtLineBus" maxlength="60" id="frm1600:txtLineBus" />
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
                                    <table width="990" border="0" cellspacing="0" cellpadding="0" class="tblForm">
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
                                                                    <td><input type="text" disabled="" value="{{$company->registered_name != '' ? $company->registered_name : $company->lastname.','. $company->firstname.' '.$company->middlename }}" size="70" name="frm1600:txtPayerName" maxlength="50" id="frm1600:txtPayerName" /></td>
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
                                                                <input type="text" disabled="" value="{{$company->tel_number}}"  size="15" name="frm1600:txtTelNum" maxlength="20" id="frm1600:txtTelNum" onkeypress="return wholenumber(this, event)" />
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
                                    <table width="990" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="80%" valign="top" class="tblFormTd">
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
                                                                    <td><input type="text" disabled value="{{$company->address}}"  size="70" name="frm1600:txtAddress" maxlength="150" id="frm1600:txtAddress" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="20%" valign="top" class="tblFormTd">
                                                <table width="149" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="149"><font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font><font size="1" style="font-size: 11px;">Zip Code</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <input type="text" disabled="" value="{{$company->zip_code}}" id="frm1600:txtZipCode" name="frm1600:txtZipCode"  size="12"  maxlength="12" onkeypress="return wholenumber(this, event)" />
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
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="990" style="height: 23px">
                                        <tr>
                                            <td class="tblFormTd" valign="top" width="49%">
                                                <table width="174" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="174"><font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font><font size="1" style="font-size: 11px;">Category
                                                            of Withholding Agent</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:160px;" id="frm1600:j_id392" class="iceSelOneRb fieldText1">
                                                                    <div align="center" style="padding: 5px 0 5px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><input type="radio" value="P" name="frm1600:j_id392" id="frm1600:j_id392:_1"  onclick="changedrpATCList(this)"/><label for="frm1600:j_id392:_1" class="iceSelOneRb fieldText1" style="font-size:11px;" >Private</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                    <td><input type="radio" value="G" name="frm1600:j_id392" id="frm1600:j_id392:_2" onclick="changedrpATCList(this)"/><label for="frm1600:j_id392:_2"  class="iceSelOneRb fieldText1" style="font-size:11px;" >Government</label></td>
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
                                            <td class="tblFormTd" valign="top" width="51%">
                                                <table width="382" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="382"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font><font size="1" style="font-size: 11px;">Are
                                                            there payees availing of tax relief under Special Law
                                                            or International Tax Treaty?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center" style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:300px;padding: 5px 0 5px 0">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="Y" name="frm1600:rdTreaty" id="frm1600:rdTreaty:_1" onclick="enableSelTreaty()" /><label for="frm1600:j_id398:_1" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" value="N" name="frm1600:rdTreaty" id="frm1600:rdTreaty:_2" onclick="disableSelTreaty();" checked /><label for="frm1600:j_id398:_2" style="font-size:12px;" >No</label></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div align="center" style="width: 300px; padding-top: 8px;">
                                                                If yes, specify
                                                                <select id="frm1600:selTreaty" name="frm1600:selTreaty" style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" size="1"  disabled="disabled">
                                                                    <option value="0" selected="selected"> - </option>
                                                                    <option value="1">Special Law</option>
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
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="990">
                                        <tr>
                                            <td class="tblFormTd" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="250">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part II</font></td>
                                                        <td width="250" > <font size="2" style="font-weight:bold;letter-spacing: 3px;text-align:center">Computation of Tax</font></td>
                                                        <td> <a href="#" id="btnAddATCPartII" onclick="showPartIIATC()"  style="font-size: 11px;">ATC</a> </td>
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
                                    <table width="990" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td valign="top" class="tblFormTd">
                                                <table id="tblPartIIComputeTax"  border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <td width="40%" class='padder1Em'><font size="1" style="font-weight:bold;font-size: 11px;">NATURE OF INCOME PAYMENT </font></td>
                                                            <td width="10%"><font size="1" style="font-weight:bold;font-size: 11px;">ATC</font></td>
                                                            <td width="21%"><font size="1" style="font-weight:bold;font-size: 11px;">TAX BASE</font></td>
                                                            <td width="9%"><font size="1" style="font-weight:bold;font-size: 11px;">TAX RATE</font></td>
                                                            <td width="20%"><font size="1" style="font-weight:bold;font-size: 11px;">TAX REQUIRED TO <br/> BE  WITHHELD</font></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="modalContent" id="tbodyComputeTax">

                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <table width="990" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="987" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="18"><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;&nbsp;</font></td>
                                                        <td width="317"><font size="1"></font><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Total Tax Required to be Withheld and Remitted</font></td>
                                                        <td width="202">
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td width="199" ><span class="spacePadder"><font size="2" style="font-weight:bold;">14</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: #dcdcdc;  text-align: right;" size="20" name="frm1600:txtTax14" maxlength="25" id="frm1600:txtTax14" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;15&nbsp;</font></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"> Less: Tax Remitted in Return Previously Filed, if this is an amended return</font></td>
                                                        <td>
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">15</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: #dcdcdc;text-align:right;" size="20" name="frm1600:txtTax15" maxlength="25" id="frm1600:txtTax15" onblur="round(this,2); computeofTotalWithheldTax()" onkeypress="return numbersonly(this, event)" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;16&nbsp;</font></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Still Due / (Overremittance)</font></td>
                                                        <td>
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">16</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1600:txtTax16" maxlength="25" id="frm1600:txtTax16" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;"> &nbsp;17&nbsp;</font></td>
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
                                                                            <font size="2" face="Arial"><b>17A</b>&nbsp;
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="15" name="frm1600:txtTax17A" maxlength="25" id="frm1600:txtTax17A" onblur="round(this,2); computePenalties()" onkeypress="return numbersonly(this, event)" />
                                                                            </font>
                                                                        </td>
                                                                        <td width="161" align="center">
                                                                            <font size="2" face="Arial"><b>17B</b>&nbsp;
                                                                            <input type="text" value="0.00" style="text-align: right;" size="15" name="frm1600:txtTax17B" maxlength="25" id="frm1600:txtTax17B" onblur="round(this,2); computePenalties()" onkeypress="return numbersonly(this, event)" />
                                                                            </font>
                                                                        </td>
                                                                        <td width="174" align="center">
                                                                            <font size="2" face="Arial"><b>17C</b>&nbsp;
                                                                            <input type="text" value="0.00" style="text-align: right;" size="15" name="frm1600:txtTax17C" maxlength="25" id="frm1600:txtTax17C" onblur="round(this,2); computePenalties()" onkeypress="return numbersonly(this, event)" />
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">17D</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1600:txtTax17D" maxlength="15" id="frm1600:txtTax17D" disabled="true" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;</font></td>
                                                        <td colspan="2"><font size="1">&nbsp;</font><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Total Amount Still Due/(Overremittance) (Sum of items 16 & 17D)</font></td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">18</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1600:txtTax18" maxlength="15" id="frm1600:txtTax18" disabled="true" class="iceInpTxt-dis" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">For late filers with overremittance, extend amount of Penalties (Item 17D to 18)</font></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="940" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td valign="top" class="tblFormTd">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0"  id="tblScheduleII" class="tblForm">
                                                    <tr>
                                                        <td colspan="2"  style="font-size: 12px;"> Schedule II </td>
                                                        <td colspan="6" align="center"  style="font-size: 12px;"> ALPHABETICAL LIST OF PAYEES FROM WHOM TAXES WERE WITHHELD <br/>(Attach additional sheet/s if necessary)</td>
                                                    </tr>
                                                    <tr>
                                                        <td> </td>
                                                        <td colspan="2" style="text-align:center;font-weight:bold"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">PAYEE DETAILS</font></td>
                                                        <td style="text-align:center" >&nbsp;</td>
                                                        <td colspan="4" style="text-align:center;font-weight:bold"  ><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">INCOME PAYMENT/TAX WITHHELD DETAILS</font></td>
                                                    </tr>

                                                    <tr><td valign="top" style="text-align:center" ><label face="Arial, Helvetica, sans-serif" size="1">(1)     <br/> SEQ <br/>NO. </label> </td>
                                                        <td valign="top"style="text-align:center" >
                                                            <font face="Arial, Helvetica, sans-serif" size="1">(2) TIN</font>
                                                        </td>
                                                        <td valign="top">
                                                            <label face="Arial, Helvetica, sans-serif" size="1" style="font-size: 9px;">
                                                            (3) INDIVIDUAL/ CORPORATION (LAST NAME, FIRST NAME, MIDDLE NAME FOR INDIVIDUALS OR REGISTERED NAME FOR NON-INDIVIDUALS)
                                                            </label>
                                                        </td>
                                                        <td> </td>
                                                        <td valign="top" style="text-align:center" ><font face="Arial, Helvetica, sans-serif" size="1">(4) ATC</font></td>
                                                        <td valign="top" style="text-align:center" ><font face="Arial, Helvetica, sans-serif" size="1">(5) NATURE OF PAYMENT</font></td>
                                                        <td valign="top" style="text-align:center"><font face="Arial, Helvetica, sans-serif" size="1">(6) AMOUNT</font> </td>
                                                        <td valign="top" style="text-align:center" ><label face="Arial, Helvetica, sans-serif" size="1" style="font-size: 9px;">(7) TAX RATE(%) </label></td>
                                                        <td valign="top" style="text-align:center" ><label face="Arial, Helvetica, sans-serif" size="1" style="font-size: 9px;">(8) TAX REQUIRED TO BE<br>WITHHELD </label> </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="4%">1</td>
                                                        <td width="16%"><input id='frm1600:dtSched:txtTin1' maxlength='12' name='frm1600:dtSched:txtTin1'  style='width: 98%' type='text' value='' onblur="blockLetterInt(this);" onkeypress="return numbersonly(this, event)"  /></td>
                                                        <td width="18%"><input id='frm1600:dtSched:txtFullname1' style='width: 98%' maxlength='50' name='frm1600:dtSched:txtFullname1' type='text' /></td>
                                                        <!--<td width="6%"><input id='frm1600:dtSched:btnATCcode1' type="button" class="printButtonClass" value='ATC' onclick='showSchedIIATC(1)' /></td>-->
														<td width="6%"  style="text-align:center"><a href="#" id='frm1600:dtSched:btnATCcode1' onclick='showSchedIIATC(1)' style="font-size: 11px;" >ATC</a></td>
                                                        <td width="9%"><input type="text" id='frm1600:dtSched:drpAtcCode:1' name="frm1600:dtSched:drpAtcCode1" style='width:67px' /></td>
                                                        <td width="14%"><input id='frm1600:dtSched:naturePayment1' type='text' name="frm1600:dtSched:naturePayment1" value='' /></td>
                                                        <td width="16%" class="text-center"><input type='text' id='frm1600:dtSched:amount1' name="frm1600:dtSched:amount1" style="text-align: right" onblur='round(this,2); computeDtShedTaxWithheld()' value='' size="15" maxlength='25' onkeypress="return numbersonly(this, event)" /></td>
                                                        <td width="6%"><input type='text' id='frm1600:dtSched:txtRatePercent1' name="frm1600:dtSched:txtRatePercent1" style='width:50px;background-color: #dcdcdc; color: black;' onblur='round(this,2); computeDtShedTaxWithheld();' onkeypress='return numbersonly(this, event)' /></td>
                                                        <td width="14%"> <input type='text' disabled id='frm1600:dtSched:taxWithheld1' name="frm1600:dtSched:taxWithheld1" style='background-color: #dcdcdc; color: black; text-align: right;' value='0.00' size="20" maxlength="25" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td><input id='frm1600:dtSched:txtTin2' name="frm1600:dtSched:txtTin2" maxlength='12' type='text' value='' style='width: 98%' onblur="blockLetterInt(this)" onkeypress="return numbersonly(this, event)"  /></td>
                                                        <td><input id='frm1600:dtSched:txtFullname2' name="frm1600:dtSched:txtFullname2" maxlength='50'  type='text' style='width: 98%' /></td>
                                                        <!--<td > <input id='frm1600:dtSched:btnATCcode2'  type="button" class="printButtonClass" value='ATC' onClick='showSchedIIATC(2)' /></td>-->
														<td style="text-align:center"><a href="#" id='frm1600:dtSched:btnATCcode2' onclick='showSchedIIATC(2)' style="font-size: 11px;">ATC</a></td>
                                                        <td><input type="text" id='frm1600:dtSched:drpAtcCode:2' name="frm1600:dtSched:drpAtcCode2"  style='width:67px' /></td>
                                                        <td><input id='frm1600:dtSched:naturePayment2' name="frm1600:dtSched:naturePayment2"  type='text' value='' /></td>
                                                        <td class="text-center"><input  type='text' id='frm1600:dtSched:amount2' name="frm1600:dtSched:amount2"  style="text-align: right" onBlur='round(this,2); computeDtShedTaxWithheld()' value='' size="15" maxlength='25' onkeypress="return numbersonly(this, event)" /></td>
                                                        <td><input type='text' id='frm1600:dtSched:txtRatePercent2' name="frm1600:dtSched:txtRatePercent2"  style='background-color: #dcdcdc; color: black;width:50px;' onblur='round(this,2); computeDtShedTaxWithheld();' onkeypress='return numbersonly(this, event)' /></td>
                                                        <td> <input type='text' disabled id='frm1600:dtSched:taxWithheld2' name="frm1600:dtSched:taxWithheld2"    style='background-color: #dcdcdc; color: black; text-align: right;'  value='0.00' size="20" maxlength="25"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td><input id='frm1600:dtSched:txtTin3' name="frm1600:dtSched:txtTin3" maxlength='12' type='text' value='' style='width: 98%' onblur="blockLetterInt(this)" onkeypress="return numbersonly(this, event)"  /></td>
                                                        <td><input id='frm1600:dtSched:txtFullname3' name="frm1600:dtSched:txtFullname3"  maxlength='50'  type='text' style='width: 98%'/></td>
                                                        <!--<td> <input id='frm1600:dtSched:btnATCcode3'  type="button" class="printButtonClass" value='ATC' onClick='showSchedIIATC(3)' /></td>-->
														<td style="text-align:center"><a href="#" id='frm1600:dtSched:btnATCcode3'  onclick='showSchedIIATC(3)' style="font-size: 11px;">ATC</a></td>
                                                        <td><input type="text" id='frm1600:dtSched:drpAtcCode:3'  name="frm1600:dtSched:drpAtcCode3"  style='width:67px'/></td>
                                                        <td><input id='frm1600:dtSched:naturePayment3'  name="frm1600:dtSched:naturePayment3" type='text' value='' /></td>
                                                        <td class="text-center"><input  type='text' id='frm1600:dtSched:amount3' name="frm1600:dtSched:amount3"  style="text-align: right" onblur='round(this,2); computeDtShedTaxWithheld()' value='' size="15" maxlength='25' onkeypress="return numbersonly(this, event)" /></td>
                                                        <td><input type='text' id='frm1600:dtSched:txtRatePercent3'  name="frm1600:dtSched:txtRatePercent3" style='background-color: #dcdcdc; color: black;width:50px;' onblur='round(this,2); computeDtShedTaxWithheld();' onkeypress='return numbersonly(this, event)' /></td>
                                                        <td> <input type='text' disabled id='frm1600:dtSched:taxWithheld3' name="frm1600:dtSched:taxWithheld3"    style='background-color: #dcdcdc; color: black; text-align: right;'  value='0.00' size="20" maxlength="25"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td><input id='frm1600:dtSched:txtTin4' name="frm1600:dtSched:txtTin4" maxlength='12' type='text' value='' style='width: 98%' onblur="blockLetterInt(this)" onkeypress="return numbersonly(this, event)"  /></td>
                                                        <td><input id='frm1600:dtSched:txtFullname4' name="frm1600:dtSched:txtFullname4" maxlength='50'  type='text' style='width: 98%' /></td>
                                                        <!--<td> <input id='frm1600:dtSched:btnATCcode4' type="button" class="printButtonClass" value='ATC' onclick='showSchedIIATC(4)' /></td>-->
														<td style="text-align:center"><a href="#" id='frm1600:dtSched:btnATCcode4' onclick='showSchedIIATC(4)' style="font-size: 11px;">ATC</a></td>
                                                        <td><input type="text" id='frm1600:dtSched:drpAtcCode:4' name="frm1600:dtSched:drpAtcCode4"  style='width:67px' /></td>
                                                        <td><input id='frm1600:dtSched:naturePayment4' name="frm1600:dtSched:naturePayment4"  type='text' value='' /></td>
                                                        <td class="text-center"><input type='text' id='frm1600:dtSched:amount4' name="frm1600:dtSched:amount4"  style="text-align: right" onblur='round(this,2); computeDtShedTaxWithheld()' value='' size="15"  maxlength='25' onkeypress="return numbersonly(this, event)" /></td>
                                                        <td><input type='text' id='frm1600:dtSched:txtRatePercent4' name="frm1600:dtSched:txtRatePercent4"  style='background-color: #dcdcdc; color: black;width:50px;' onblur='round(this,2); computeDtShedTaxWithheld();' onkeypress='return numbersonly(this, event)' /></td>
                                                        <td> <input type='text' disabled id='frm1600:dtSched:taxWithheld4'  name="frm1600:dtSched:taxWithheld4"   style='background-color: #dcdcdc; color: black; text-align: right;'  value='0.00' size="20" maxlength="25"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td><input id='frm1600:dtSched:txtTin5' name="frm1600:dtSched:txtTin5" maxlength='12' type='text' value=''  style='width: 98%' onblur="blockLetterInt(this)" onkeypress="return numbersonly(this, event)"  /></td>
                                                        <td><input id='frm1600:dtSched:txtFullname5' name="frm1600:dtSched:txtFullname5"  maxlength='50'  type='text' style='width: 98%'/></td>
                                                        <!--<td> <input id='frm1600:dtSched:btnATCcode5'  type="button" class="printButtonClass" value='ATC' onclick='showSchedIIATC(5)' /></td>-->
														<td style="text-align:center"><a href="#" id='frm1600:dtSched:btnATCcode5' onclick='showSchedIIATC(5)' style="font-size: 11px;">ATC</a></td>
                                                        <td><input type="text" id='frm1600:dtSched:drpAtcCode:5' name="frm1600:dtSched:drpAtcCode5"  style='width:67px'  /></td>
                                                        <td><input id='frm1600:dtSched:naturePayment5' name="frm1600:dtSched:naturePayment5"  type='text' value='' /></td>
                                                        <td class="text-center"><input type='text' id='frm1600:dtSched:amount5' name="frm1600:dtSched:amount5"  style="text-align: right" onblur='round(this,2); computeDtShedTaxWithheld()' value='' size="15" maxlength='25' onkeypress="return numbersonly(this, event)" /></td>
                                                        <td><input type='text' id='frm1600:dtSched:txtRatePercent5' name="frm1600:dtSched:txtRatePercent5"  style='background-color: #dcdcdc; color: black;width:50px;' onblur='round(this,2); computeDtShedTaxWithheld();' onkeypress='return numbersonly(this, event)' /></td>
                                                        <td> <input type='text' disabled id='frm1600:dtSched:taxWithheld5'  name="frm1600:dtSched:taxWithheld5"   style='background-color: #dcdcdc; color: black; text-align: right;'  value='0.00' size="20" maxlength="25"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td><input id='frm1600:dtSched:txtTin6' name="frm1600:dtSched:txtTin6" maxlength='12' type='text' value='' style='width: 98%' onblur="blockLetterInt(this)" onkeypress="return numbersonly(this, event)"  /></td>
                                                        <td><input id='frm1600:dtSched:txtFullname6' name="frm1600:dtSched:txtFullname6"  maxlength='50'  type='text' style='width: 98%'/></td>
                                                        <!--<td ><input id='frm1600:dtSched:btnATCcode6'  type="button" class="printButtonClass" value='ATC' onclick='showSchedIIATC(6)' /></td>-->
														<td style="text-align:center"><a href="#" id='frm1600:dtSched:btnATCcode6' onclick='showSchedIIATC(6)' style="font-size: 11px;">ATC</a></td>
                                                        <td><input type="text" id='frm1600:dtSched:drpAtcCode:6' name="frm1600:dtSched:drpAtcCode6"  style='width:67px' /></td>
                                                        <td><input id='frm1600:dtSched:naturePayment6' name="frm1600:dtSched:naturePayment6"  type='text' value='' /></td>
                                                        <td class="text-center"><input  type='text' id='frm1600:dtSched:amount6' name="frm1600:dtSched:amount6"  style="text-align: right" onblur='round(this,2); computeDtShedTaxWithheld()' value='' size="15" maxlength='25' onkeypress="return numbersonly(this, event)" /></td>
                                                        <td><input type='text' id='frm1600:dtSched:txtRatePercent6' name="frm1600:dtSched:txtRatePercent6"  style='background-color: #dcdcdc; color: black;width:50px;' onblur='round(this,2); computeDtShedTaxWithheld();' onkeypress='return numbersonly(this, event)' /></td>
                                                        <td> <input type='text' disabled id='frm1600:dtSched:taxWithheld6' name="frm1600:dtSched:taxWithheld6"    style='background-color: #dcdcdc; color: black; text-align: right;'  value='0.00' size="20" maxlength="25"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td><input id='frm1600:dtSched:txtTin7' name="frm1600:dtSched:txtTin7" maxlength='12' type='text' value='' style='width: 98%' onblur="blockLetterInt(this)" onkeypress="return numbersonly(this, event)"  /></td>
                                                        <td><input id='frm1600:dtSched:txtFullname7' name="frm1600:dtSched:txtFullname7"  maxlength='50'  type='text' style='width: 98%' /></td>
                                                        <!--<td > <input id='frm1600:dtSched:btnATCcode7'  type="button" class="printButtonClass" value='ATC' onclick='showSchedIIATC(7)' /></td>-->
														<td style="text-align:center"><a href="#" id='frm1600:dtSched:btnATCcode7' onclick='showSchedIIATC(7)' style="font-size: 11px;">ATC</a></td>
                                                        <td><input type="text" id='frm1600:dtSched:drpAtcCode:7' name="frm1600:dtSched:drpAtcCode7"  style='width:67px' /></td>
                                                        <td><input id='frm1600:dtSched:naturePayment7' name="frm1600:dtSched:naturePayment7"  type='text' value='' /></td>
                                                        <td class="text-center"><input  type='text' id='frm1600:dtSched:amount7'  name="frm1600:dtSched:amount7" style="text-align: right" onblur='round(this,2); computeDtShedTaxWithheld()' value='' size="15" maxlength='25' onkeypress="return numbersonly(this, event)" /></td>
                                                        <td><input type='text' id='frm1600:dtSched:txtRatePercent7' name="frm1600:dtSched:txtRatePercent7"  style='background-color: #dcdcdc; color: black;width:50px;' onblur='round(this,2); computeDtShedTaxWithheld();' onkeypress='return numbersonly(this, event)' /></td>
                                                        <td> <input type='text' disabled id='frm1600:dtSched:taxWithheld7'  name="frm1600:dtSched:taxWithheld7"   style='background-color: #dcdcdc; color: black; text-align: right;'  value='0.00' size="20" maxlength="25"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>8</td>
                                                        <td><input id='frm1600:dtSched:txtTin8' name="frm1600:dtSched:txtTin8" maxlength='12' type='text' value='' style='width: 98%' onblur="blockLetterInt(this)" onkeypress="return numbersonly(this, event)"  /></td>
                                                        <td><input id='frm1600:dtSched:txtFullname8' name="frm1600:dtSched:txtFullname8"  maxlength='50'  type='text'style='width: 98%' /></td>
                                                        <!--<td> <input id='frm1600:dtSched:btnATCcode8'  type="button" class="printButtonClass" value='ATC' onclick='showSchedIIATC(8)' /></td>-->
														<td style="text-align:center"><a href="#" id='frm1600:dtSched:btnATCcode8' onclick='showSchedIIATC(8)' style="font-size: 11px;">ATC</a></td>
                                                        <td><input type="text" id='frm1600:dtSched:drpAtcCode:8' name="frm1600:dtSched:drpAtcCode8"  style='width:67px' /></td>
                                                        <td><input id='frm1600:dtSched:naturePayment8' name="frm1600:dtSched:naturePayment8"  type='text' value='' /></td>
                                                        <td class="text-center"><input type='text' id='frm1600:dtSched:amount8' name="frm1600:dtSched:amount8"  style="text-align: right" onblur='round(this,2); computeDtShedTaxWithheld()' value='' size="15" maxlength='25' onkeypress="return numbersonly(this, event)" /></td>
                                                        <td><input type='text' id='frm1600:dtSched:txtRatePercent8' name="frm1600:dtSched:txtRatePercent8"  style='background-color: #dcdcdc; color: black;width:50px;' onblur='round(this,2); computeDtShedTaxWithheld();' onkeypress='return numbersonly(this, event)' /></td>
                                                        <td> <input type='text' disabled id='frm1600:dtSched:taxWithheld8' name="frm1600:dtSched:taxWithheld8"    style='background-color: #dcdcdc; color: black; text-align: right;'  value='0.00' size="20" maxlength="25"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>9</td>
                                                        <td><input id='frm1600:dtSched:txtTin9' name="frm1600:dtSched:txtTin9" maxlength='12' type='text' value=''  style='width: 98%' onblur="blockLetterInt(this)" onkeypress="return numbersonly(this, event)"  /></td>
                                                        <td><input id='frm1600:dtSched:txtFullname9' name="frm1600:dtSched:txtFullname9" maxlength='50'  type='text' style='width: 98%'/></td>
                                                        <td style="text-align:center"><a href="#" id='frm1600:dtSched:btnATCcode9' onclick='showSchedIIATC(9)' style="font-size: 11px;" >ATC</a></td>
                                                        <td><input type="text" id='frm1600:dtSched:drpAtcCode:9' name="frm1600:dtSched:drpAtcCode9" style='width:67px' /></td>
                                                        <td><input id='frm1600:dtSched:naturePayment9' name="frm1600:dtSched:naturePayment9" type='text' value='' /></td>
                                                        <td class="text-center"><input  type='text' id='frm1600:dtSched:amount9' name="frm1600:dtSched:amount9" style="text-align: right" onblur='round(this,2); computeDtShedTaxWithheld()' value='' size="15" maxlength='25' onkeypress="return numbersonly(this, event)" /></td>
                                                        <td><input type='text' id='frm1600:dtSched:txtRatePercent9'  name="frm1600:dtSched:txtRatePercent9" style='background-color: #dcdcdc; color: black;width:50px;' onblur='round(this,2); computeDtShedTaxWithheld();' onkeypress='return numbersonly(this, event)' /></td>
                                                        <td> <input type='text' disabled id='frm1600:dtSched:taxWithheld9'   name="frm1600:dtSched:taxWithheld9" style='background-color: #dcdcdc; color: black; text-align: right;'  value='0.00' size="20" maxlength="25"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td><input id='frm1600:dtSched:txtTin10' name="frm1600:dtSched:txtTin10" maxlength='12' type='text' value='' style='width: 98%' onblur="blockLetterInt(this)" onkeypress="return numbersonly(this, event)"  /></td>
                                                        <td><input id='frm1600:dtSched:txtFullname10' name="frm1600:dtSched:txtFullname10"  maxlength='50'  type='text' style='width: 98%' /></td>
                                                        <td style="text-align:center"><a href="#" id='frm1600:dtSched:btnATCcode10' onclick='showSchedIIATC(10)' style="font-size: 11px;">ATC</a></td>
                                                        <td><input type="text" id='frm1600:dtSched:drpAtcCode:10' name="frm1600:dtSched:drpAtcCode:10"  style='width:67px'/></td>
                                                        <td><input id='frm1600:dtSched:naturePayment10' name="frm1600:dtSched:naturePayment10"  type='text' value='' /></td>
                                                        <td class="text-center"><input  type='text' id='frm1600:dtSched:amount10' name="frm1600:dtSched:amount10"  style="text-align: right" onblur='round(this,2); computeDtShedTaxWithheld()' size="15" maxlength='25' onkeypress="return numbersonly(this, event)" /></td>
                                                        <td><input type='text' id='frm1600:dtSched:txtRatePercent10'  name="frm1600:dtSched:txtRatePercent10" style='background-color: #dcdcdc; color: black;width:50px;' onblur='round(this,2); computeDtShedTaxWithheld();' onkeypress='return numbersonly(this, event)' /></td>
                                                        <td> <input type='text' disabled id='frm1600:dtSched:taxWithheld10' name="frm1600:dtSched:taxWithheld10"    style='background-color: #dcdcdc; color: black; text-align: right;'  value='0.00' size="20" maxlength="25" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">Total</td>
                                                        <td colspan="6"></td>
                                                        <td><input type="text" name="frm1600:dtSched:TotaltaxWithheld"  id="frm1600:dtSched:TotaltaxWithheld" style="background-color: #dcdcdc; color: black; text-align: right;" value="0.00" size="20" maxlength="25" /> </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>
								<table style="border-top: 3px solid black; font-family:arial; font-size:12px; text-align: center; vertical-align: top; table-layout: fixed;">
									  <col width="17%" />
									  <col width="17%" />
									  <col width="17%" />
									  <col width="17%" />
									  <col width="32%" />
									  <tr>
									    <td colspan="5">I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge, and belief,
									    				<br>is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.<br></td>
									  </tr>
									  <tr>
									    <td colspan="4"><b>19</b>_____________________________________________________________________
									    				<br>President/Vice President/Principal Officer/Accredited Tax Agent/
									    				<br>Authorized Representative/Taxpayer
									    				<br>(Signature Over Printed Name)</td>
									    <td><b>20</b>_____________________________
								    		<br>Treasurer/Assistant Treasurer
								    		<br>(Signature Over Printed Name)
								    		<br>&nbsp;</td>
									  </tr>
									  <tr>
									    <td colspan="2">______________________________
									    				<br>Title/Position of Signatory</td>
									    <td colspan="2">______________________________
									    				<br>TIN of Signatory</td>
									    <td>______________________________
									    	<br>Title/Position of Signatory</td>
									  </tr>
									  <tr>
									    <td colspan="2">______________________________________
									    				<br>Tax Agent Acc. No./ Atty's Roll No. (If Applicable)</td>
									    <td>______________
									    	<br>Date of Issuance</td>
									    <td>______________
									    	<br>Date of Expiry</td>
									    <td>______________________________
									    	<br>TIN of Signatory</td>
									  </tr>
									</table>
								</div>
								<div class="imgClass" align='center' style="display:none; width:983px !important;">
									<img id="frm1600:jurat" src="{{ asset('images/bottom_img/1600_new.jpg') }}" width="983"/>
								</div>
								<div class="imgClass" align='left' style="display:none; width:983px !important;">
									<table style="font-size:12px; text-align: left; vertical-align: top;">
									  <tr>
									    <td>Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br /><br /><br /><br /><br /></td>
									  </tr>
									</table>
								</div>
                                    <table width="940" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="940" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td> 
                                                            <table width="990" cellspacing="0" cellpadding="0" border="0">
                                                                <tbody>
                                                                    <tr valign="middle">
                                                                        <td width="148"></td>
                                                                        <td width="710">
                                                                            <div align="center">
                                                                                @if($action != 'view')
                                                                                    <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm0600:cmdValidate" id="frm0600:cmdValidate" onclick="validate()" />
                                                                                    <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm0600:cmdEdit" id="frm0600:cmdEdit" onclick="enableAllControl()"/>
                                                                                    <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                    <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
    																				<input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
    																				<input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1600:btnFinalCopy" id="frm1600:btnFinalCopy" onclick="submitForm();" />
                                                                                	<div id="msg" class="printButtonClass" style="display:none;"></div>																				
                                                                                @else
                                                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                    <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                                @endif   
                                                                            </div>
                                                                        </td>
                                                                        <td width="122"></td>
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
                </div>
				
				</td>
				<td valign="top"><img id="frm1600:bcsImg" src="{{ asset('images/BCS.jpg') }}"/></td>
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
		<!-- Lovell modal ComputeTax  -->
        <div id="modalAtc" class="aBox" style="width:94%; display:none; height:60%; position:relative;padding: 10px; top:3%; left:3%; right:auto; overflow-y:auto; overflow-x:hidden; background:#fff;" align="left">

            <br/>
            <br/>
            <table border="0" cellspacing="3" cellpadding="3" style="position: static" width="90%">
                <tr>
                    <td class="modalColumnHeader" colspan="3">Please click a row to select and deselect ATC.</td>
                </tr>
                <tr class="modalColumnHeader">
                    <td width="20%"><b> ATC </b></td>

                    <td width="70%"> <b> Description </b> </td>
                    <td width="10%"> <b> Rate % </b> </td>
                </tr>
                <tr>
                    <td colspan="3"> <hr/></td>
                </tr>

            </table>

            <div style="height:300px;overflow:auto;width: 90%">
                <table class="modalContent" id="tbllistAtcCode" cellspacing="0" cellpadding="0" style="width: 100%;padding:1%;">
                    <tr><td></td></tr>
                </table>
            </div>
			<br/>
			<div align="center">
            <input type="button" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getATCCode()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
			<br />
            <br />
        </div>
        <!-- modal Sched II ATC -->
		<div id="modalSchedIIAtc" class="aBox1600SchedII" style="width:94%; display:none; height:60%; position:relative;padding: 10px; top:3%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="left">  
            <br/>
            <br/>
            <table border="0" cellspacing="3" cellpadding="3" width="90%">
                <tr>
                    <td class="modalColumnHeader" colspan="3"></td>
                </tr>
                <tr class="modalColumnHeader">
                    <td width="20%"><b> ATC </b></td>

                    <td width="70%"> <b> Description </b> </td>
                    <td width="10%"> <b> Rate % </b> </td>
                </tr>
                <tr>
                    <td colspan="3"> <hr/></td>
                </tr>

            </table>

            <div style="height:300px;overflow:auto;width: 90%">
                <table class="modalContent" id="tbllistSchedIIAtcCode"  cellspacing="3" cellpadding="3" width="100%" >
                    <tr><td></td></tr>
                </table>
            </div>
			<br/>
			<div align="center">
            <input type="button" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getSchedIIATCCode()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
			<br />
            <br />
        </div>
		
    <div id="hiddenEmail" style="display:none;"  >
		<input id="txtEmail" class="emailClass" value="{{$company->email_address}}" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60"   />
	    <input type="hidden" id="sessionIdFromPopUp" name="sessionIdFromPopUp" value=""/>
        <input type="text" id="hPartIITableSize" name="hPartIITableSize"  value="" />
    </div>
	
</form>	
		<textarea id='responsetext' style="display:none;"></textarea>

        <div style="display:none;">
            <xmp id='xmlFormat'>	
            </xmp> <!--format the doc -->
            <span id='xmlClose'>All Rights Reserved BIR 2012.</span>
        </div>
		<div id="responseBG" style="display:none;"><!--loaded files render here--></div>
        <div id="response" style="display:none;"><!--loaded files render here--></div>
	    <div id="responseATC" style="display:none;"><!--loaded ATC files render here--></div>     	
		<div id="responseRdo" style="display:none;"><!--loaded files render here--></div>
@endsection

@section('scripts')
<script type="text/javascript">
    var isSubmitFinal = false;
    var isSubmit = false;
	
    var gIsReadOnly = false; 
    var fileNameToExport = "";
	
    var fileName = "";
    var existingXMLFileName = "";
	
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
	
    /*
     * To change this template, choose Tools | Templates
     * and open the template in the editor.
     */
    /* Initialize values of ATC */
	
    var atcList = new Array();

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
	
    /*----------------------------------*/
    var d=document,data='',XMLBGFile='',XMLFile='', XMLATCFile='',msg = d.getElementById('msg');
    var loader=d.getElementById('loader');
   
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
			
            //Ensure that before writing to atcPropertyJS the formType 1600 is traceable in atcStr
            if (atcStr.indexOf('1600') >= 0) {
                if (atcStr.indexOf('1600WP')<0) {
                    var atcValues = atcStr.split('~');				
					
                    var formType = "1600";
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
                    //alert('1600 successfully created array #'+i);
                }
            } else {		
                //alert('1600 not found in array #'+i);
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
        loadData();

        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
        }
            
        if (gIsReadOnly) {
            d.getElementById('frm0600:cmdValidate').disabled = true;
            d.getElementById('btnSave').disabled = true;
        }

        window.setTimeout("loadDataATCRow();",1000);
    }
	
    function loadData() {
        /*This will load data onto fields*/
		
        window.setTimeout("getATCCode();",105);				

        var response = d.getElementById("response");		
        var elem = document.getElementById('frmMain').elements;		
        for(var i = 0; i < elem.length; i++)
        {

            if (elem[i].type != 'button' && elem[i].type != 'hidden' && elem[i].type != 'undefined') { //&& elem[i].id.indexOf("footer:") == -1) {	//elem[i].type != 'button' &&  		
					
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
                    if (fieldVal != null && fieldVal.length > 1) {
                        if(elem[i].id == 'frm1600:txtPayerName' || elem[i].id == 'frm1600:txtLineBus' || elem[i].id == 'frm1600:txtAddress'){
                            elem[i].value = unescape(fieldVal[1]);
                        }
						else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
                        else{
                            elem[i].value = fieldVal[1]; //all select-one and text values	
                            document.getElementById(elem[i].id).setAttribute('value',fieldVal[1]);	 		
                        }
                    }		
					
                }
                if (elem[i].type == 'radio') {
                    var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');				
                    if (rdoVal[1] == 'true') {
                        elem[i].checked = rdoVal[1];
                        if (elem[i].id == 'frm1600:j_id392:_1' || elem[i].id == 'frm1600:j_id392:_2' || elem[i].id == 'frm1600:rdTreaty:_1') {						
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
			
            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') { //&& elem[i].id.indexOf("footer:") > -1) {	//elem[i].type != 'button' &&  			
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
                    if(elem[i].id == 'frm1600:txtPayerName' || elem[i].id == 'frm1600:txtLineBus' || elem[i].id == 'frm1600:txtAddress'){
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    else{
                        elem[i].value = fieldVal[1]; //all select-one and text values		 		
                    }
                }				
            }
        }
    }

    function isItAnAmendedReturn(xmlFile) {	
        if(d.getElementById('frm1600:j_id217:_1').checked) {
            return true;
        } else {
            return false;
        }		
    }

    function setInputTextControl_HorizontalAlignment(id,align) {
        if (d.getElementById(id) != null) {
            d.getElementById(id).textIndent = parseInt(align);
        }
    }
    function setInputTextControl_NumberFormatter(id,limit,deci) {
        if (d.getElementById(id) != null) {
            d.getElementById(id).size = parseInt(limit);
            d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed( parseInt(deci) );		
        }
    }	
    function setInputSelectControl_Disabled(id, disabled) {
        if (d.getElementById(id) != null) {
            d.getElementById(id).disabled = disabled;
        }
    }	
	
	
    var ATCnameCode = new Array() ;
    var NaturePayment = new Array() ;
    var taxRate = new Array();
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
            //var atc = atcList.get(i);
            var atc = atcList[i];
            if(atc.formType == "1600" && atc.category == 'P') {
                //str = str + atc.atcCode + " " + atc.description + " " + atc.rate + "\n" ;
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
            if(atc.formType == "1600" && atc.category == 'G') {
                str = str + atc.atcCode + " " + atc.description + " " + atc.rate + "\n" ;
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                taxRate[j++] = atc.rate;

            }
        }
        
    }

    var savedReturn = "";
    var p3Compromise = "";
    var p3Surcharge = "";
    var p3Interest = "";
    var p3IsAmended = "";
    var p3FilingDate = "";
    var p3ReturnPeriod = "";
	
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
	
    var str;
    str = setTimeout("sleeptime()", 300);

    var globalEmail = "";
    function sleeptime()
    {
        loadXMLATC('/xml/atcCodes.xml');	
                  
        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
			
            loadXML(fileName);
            existingXMLFileName = fileName;
			
            d.getElementById('frm1600:j_id201').disabled = true;
            d.getElementById('frm1600:txtYear').disabled = true;
			
            if (gIsReadOnly) { 
                window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false;",1000); 
            }
        } else {
            window.setTimeout("$('#loader').hide('blind');",100);
        }		
        if ( $('#printMenu').css('display') != 'none' ) {	
            $('#printMenu').hide('blind');
        }
		document.getElementById('frm1600:txtTIN1').disabled = true; document.getElementById('frm1600:txtTIN2').disabled = true; document.getElementById('frm1600:txtTIN3').disabled = true; document.getElementById('frm1600:txtBranchCode').disabled = true;

	    init();   
    }

    function init()
    {	
        var month = new Date();
        var year = new Date();
        d.getElementById('frm1600:j_id201').selectedIndex = month.getMonth();
        d.getElementById('frm1600:txtYear').value = year.getFullYear();
		
        d.getElementById('frm1600:j_id217:_1').disabled = false;
        d.getElementById('frm1600:j_id217:_2').disabled = false;

        @if($action != 'view')
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm0600:cmdEdit').disabled = true;
        d.getElementById('frm1600:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @else 

        var taxBase = d.getElementById("hPartIITableSize").value;   
        for(var i = 1 ; i < parseInt(taxBase) + 1; i ++)
        {
            setTimeout("d.getElementById('frm1600:txtTaxBase" + i + "').disabled = true;", 100);
            setTimeout("d.getElementById('frm1600:txtTaxRate" + i + "').disabled = true;", 100);
        } 
       
        disableAllControl();
        @endif

        setInputSelectControl_Disabled("frm1600:selTreaty", true);
        d.getElementById('frm1600:txtTax14').disabled = true;
        d.getElementById('frm1600:txtTax15').disabled = true;
        d.getElementById('frm1600:txtTax16').disabled = true;
      
        d.getElementById('frm1600:txtTax17D').disabled = true;
        d.getElementById('frm1600:txtTax18').disabled = true;
        d.getElementById('frm1600:dtSched:TotaltaxWithheld').disabled = true;
        for(i=1 ; i <= 10; i ++)
        {
            d.getElementById('frm1600:dtSched:drpAtcCode:'+i).disabled = true;
            d.getElementById('frm1600:dtSched:naturePayment'+i).disabled = true;
            d.getElementById('frm1600:dtSched:txtRatePercent'+i).disabled = true;
            d.getElementById('frm1600:dtSched:taxWithheld'+i).disabled = true;
        }
       
    }

    var disableElem = true;
    var enableElem = false;
    function disableAllControl()
    {

        d.getElementById('frm1600:txtTax15').disabled = true;
        d.getElementById('frm1600:j_id217:_1').disabled = true;
        d.getElementById('frm1600:j_id217:_2').disabled = true;
        d.getElementById('frm1600:j_id201').disabled = true;
        d.getElementById('frm1600:txtYear').disabled = true;
        d.getElementById('frm1600:j_id252:_1').disabled = true;
        d.getElementById('frm1600:j_id252:_2').disabled = true;
        d.getElementById('frm1600:j_id392:_1').disabled = true;
        d.getElementById('frm1600:j_id392:_2').disabled = true;
        d.getElementById('frm1600:rdTreaty:_1').disabled = true;
        d.getElementById('frm1600:rdTreaty:_2').disabled = true;
        d.getElementById('frm1600:selTreaty').disabled = true;
        d.getElementById('frm1600:txtSheets').disabled = true;
        d.getElementById('frm1600:txtTIN1').disabled = true;
        d.getElementById('frm1600:txtTIN2').disabled = true;
        d.getElementById('frm1600:txtTIN3').disabled = true;
        d.getElementById('frm1600:txtBranchCode').disabled = true;
        d.getElementById('frm1600:txtRDOCode').disabled = true;
        d.getElementById('frm1600:txtLineBus').disabled = true;
        d.getElementById('frm1600:txtPayerName').disabled = true;
        d.getElementById('frm1600:txtTelNum').disabled = true;
        d.getElementById('frm1600:txtAddress').disabled = true;
        d.getElementById('frm1600:txtZipCode').disabled = true;
        d.getElementById('frm1600:txtTax17A').disabled = true;
        d.getElementById('frm1600:txtTax17B').disabled = true;
        d.getElementById('frm1600:txtTax17C').disabled = true;


        for(var i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
            setTimeout("d.getElementById('frm1600:txtTaxBase" + i + "').disabled = true;", 100);
            setTimeout("d.getElementById('frm1600:txtTaxRate" + i + "').disabled = true;", 100);
        }
        d.getElementById('btnAddATCPartII').disabled = true;
        disableallShedIIATC();
        for(i = 1 ; i <= 10 ; i++){
            d.getElementById('frm1600:dtSched:txtTin' + i).disabled = true;
            d.getElementById('frm1600:dtSched:txtFullname' + i).disabled = true;
            d.getElementById('frm1600:dtSched:amount' + i).disabled = true;
        }
        @if($action != 'view')
        d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm0600:cmdEdit').disabled = false;
        @endif
        disableElem;
        enableElem;
    }
	
    function enableAllControl()
    {
        d.getElementById('frm1600:j_id217:_1').disabled = false;
        d.getElementById('frm1600:j_id217:_2').disabled = false;
        d.getElementById('frm1600:j_id201').disabled = false;
        d.getElementById('frm1600:txtYear').disabled = false;
        d.getElementById('frm1600:j_id252:_1').disabled = false;
        d.getElementById('frm1600:j_id252:_2').disabled = false;
        d.getElementById('frm1600:j_id392:_1').disabled = false;
        d.getElementById('frm1600:j_id392:_2').disabled = false;
        d.getElementById('frm1600:rdTreaty:_1').disabled = false;
        d.getElementById('frm1600:rdTreaty:_2').disabled = false;
        d.getElementById('frm1600:txtSheets').disabled = false;
        d.getElementById('frm1600:txtTIN1').disabled = false;
        d.getElementById('frm1600:txtTIN2').disabled = false;
        d.getElementById('frm1600:txtTIN3').disabled = false;
        d.getElementById('frm1600:txtBranchCode').disabled = false;
        d.getElementById('frm1600:txtRDOCode').disabled = false;
        d.getElementById('frm1600:txtLineBus').disabled = false;
        d.getElementById('frm1600:txtPayerName').disabled = false;
        d.getElementById('frm1600:txtTelNum').disabled = false;
        d.getElementById('frm1600:txtAddress').disabled = false;
        d.getElementById('frm1600:txtZipCode').disabled = false;
        d.getElementById('frm1600:txtTax17A').disabled = false;
        d.getElementById('frm1600:txtTax17B').disabled = false;
        d.getElementById('frm1600:txtTax17C').disabled = false;
        if(d.getElementById('frm1600:rdTreaty:_1').checked)
        {
            d.getElementById('frm1600:selTreaty').disabled = false;
        }
        for( var i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
            d.getElementById('frm1600:txtTaxBase'+i).disabled = false;
        }
        d.getElementById('btnAddATCPartII').disabled = false;
        enableallShedIIATC();
        for(i = 1 ; i <= 10 ; i++){
            d.getElementById('frm1600:dtSched:txtTin' + i).disabled = false;
            d.getElementById('frm1600:dtSched:txtFullname' + i).disabled = false;
            d.getElementById('frm1600:dtSched:amount' + i).disabled = false;
        }

        if(d.getElementById('frm1600:j_id217:_1').checked) {
            d.getElementById('frm1600:txtTax15').disabled = false;
        } else {
            d.getElementById('frm1600:txtTax15').disabled = true;
        }
		
        if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
            d.getElementById('frm1600:j_id201').disabled = true;
            d.getElementById('frm1600:txtYear').disabled = true;	
        }

        d.getElementById('frm0600:cmdValidate').disabled = false;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm0600:cmdEdit').disabled = true;
        d.getElementById('frm1600:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        disableElem;
        enableElem;
		document.getElementById('frm1600:txtTIN1').disabled = true; document.getElementById('frm1600:txtTIN2').disabled = true; document.getElementById('frm1600:txtTIN3').disabled = true; document.getElementById('frm1600:txtBranchCode').disabled = true;

    }
	
    function validate()
    {
        var dt = new Date();
        
        if( (d.getElementById('frm1600:txtYear').value == "")  )
        {
            alert("Please enter a valid year on Item 1.");
            return;
        }
       
        if( d.getElementById('frm1600:txtYear').value*1 < 1900   )
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }
        if(d.getElementById('frm1600:j_id217:_1').checked == false && d.getElementById('frm1600:j_id217:_2').checked == false )
        {
            alert("Please choose amended return on item 2.")
            return;
        }
        if(d.getElementById('frm1600:j_id252:_1').checked == false && d.getElementById('frm1600:j_id252:_2').checked == false )
        {
            alert("Please select an option for Item 4.")
            return;
        }
		
        if( (d.getElementById('frm1600:txtTIN1').value == "" || d.getElementById('frm1600:txtTIN2').value == "" || d.getElementById('frm1600:txtTIN3').value == "" || d.getElementById('frm1600:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 5.");
            return;
        }		
       
        if( (d.getElementById('frm1600:txtLineBus').value == "")  )
        {
            alert("Please enter a valid Line of Business/Occupation on Item 7.");
            return;
        }	
        if( (d.getElementById('frm1600:txtPayerName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 8.");
            return;
        }	
        if( (d.getElementById('frm1600:txtTelNum').value == "")  )
        {
            alert("Please enter Taxpayer's Telephone Number on Item 9.");
            return;
        }	
        if( (d.getElementById('frm1600:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 10.");
            return;
        }
        if( (d.getElementById('frm1600:txtZipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip Code on Item 11.");
            return;
        }
        //dgarfin : end	
		
        if( d.getElementById('frm1600:j_id392:_1').checked == false && d.getElementById('frm1600:j_id392:_2').checked == false  )
        {
            alert("Please select an option for Item 12.");
            return;
        }
        if ( d.getElementById('frm1600:j_id252:_1').checked == true  )
        {    // count of Compute Tax
            if ( 1 >= ( d.getElementById('tblPartIIComputeTax').rows.length)  )
            {
                alert("Please fill up Part II Computation of Tax if item 4 is set to Yes.")
                return;
            }
            var indexwithheld = 1;
            for (indexwithheld = 1 ; indexwithheld < ( d.getElementById('tblPartIIComputeTax').rows.length)  ; indexwithheld++)
            {
                if( d.getElementById('frm1600:txtAtcCd'+indexwithheld).value != "")
                {
                    //alert("with held tax " + d.getElementById('frm1600:txtTaxBase'+indexwithheld).value + ".")
                    if( d.getElementById('frm1600:txtTaxBase'+ indexwithheld).value == "" )
                    {
                        alert("Please enter a valid value for tax base for " + d.getElementById('frm1600:txtAtcCd'+indexwithheld).value + "." )
                        return;
                    }
                    if( d.getElementById('frm1600:txtTaxBase'+ indexwithheld).value <= 0 ) {
                        alert("Please specify amount for ATC  <" + d.getElementById('frm1600:txtAtcCd'+ indexwithheld).value + ">.")
                        return;
                    }
                }else {
                    alert("Please fill up Part II Computation of Tax if item 4 is set to Yes.")
                    return;
                }
            }
        }
        for(var i = 1 ; i <= 10 ; i++ ) {
            if(d.getElementById('frm1600:dtSched:txtTin'+ i).value != '' || d.getElementById('frm1600:dtSched:txtFullname'+ i).value != ''
                || d.getElementById('frm1600:dtSched:drpAtcCode:'+ i).value != '' || d.getElementById('frm1600:dtSched:naturePayment'+ i).value != ''
                || d.getElementById('frm1600:dtSched:naturePayment'+ i).value != '' || d.getElementById('frm1600:dtSched:amount'+ i).value > 0) {
                if(d.getElementById('frm1600:dtSched:txtTin'+ i).value == '' ||  d.getElementById('frm1600:dtSched:txtTin'+ i).value.length < 12 ) {
                    alert("Please enter a valid TIN Number for Sequence " + i + ".");
                    return;
                } else if(d.getElementById('frm1600:dtSched:txtFullname'+ i).value == '') {
                    alert("Please enter a valid Name of Individual/Corporation for Sequence " + i + ".");
                    return;
                } else if(d.getElementById('frm1600:dtSched:drpAtcCode:'+ i).value == '' || d.getElementById('frm1600:dtSched:naturePayment'+ i).value == '') {
                    alert("Please select an ATC from the list for Sequence " + i + ".");
                    return;
                } else if(d.getElementById('frm1600:dtSched:amount'+ i).value <= 0) {
                    alert("Please specify amount for ATC " + d.getElementById('frm1600:dtSched:drpAtcCode:'+ i).value + ".");
                    return;
                }
            }
        }

        // all forms validate with entry
    
        d.getElementById('hPartIITableSize').value = d.getElementById('tblPartIIComputeTax').rows.length - 1;
        d.getElementById('frm0600:cmdValidate').disabled = true;
        d.getElementById('frm0600:cmdEdit').disabled = false;
        d.getElementById('frm1600:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;

        disableAllControl();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
        return;
    }

    var previoustbllistSchedIIAtcCode;
    var previoustbllistAtcCode;
    var tbllistSchedIIAtcCodeFlag = false;
    function enableSelTreaty()
    {
        if( d.getElementById('frm1600:j_id392:_1').checked == false && d.getElementById('frm1600:j_id392:_2').checked == false  )
        {
            alert("Please select an option for Item 12.");
            return;
            d.getElementById('frm1600:rdTreaty:_2').checked = true;
        } else {
            d.getElementById('frm1600:selTreaty').disabled = false;
            d.getElementById('frm1600:selTreaty').selectedIndex = 0;
            if(!tbllistSchedIIAtcCodeFlag){
                var i = d.getElementById('tbllistSchedIIAtcCode').rows.length + 1;
                previoustbllistSchedIIAtcCode = d.getElementById('tbllistSchedIIAtcCode').innerHTML;
				
                $('#tbllistSchedIIAtcCode').html(  d.getElementById('tbllistSchedIIAtcCode').innerHTML +
                    "<tr class='atc'><td width='350px' class='atc'> <input id='SchedIIAtcCde"+i+"' name='SchedIIAtcCde' type='radio' value='N/A' />N/A</td> <td class='atc atcNames' width='300px' id='SchedIIAtcNaturePayment"+i+"' >SPECIAL LAW</td> <td class='atc' width='90px' id='txtRate"+i+"'>0.0</td> </tr>");

                previoustbllistAtcCode = d.getElementById('tbllistAtcCode').innerHTML;			
				
                $('#tbllistAtcCode').html(  d.getElementById('tbllistAtcCode').innerHTML +
                    "<tr class='atc'><td width='350px' class='atc'> <input id='AtcCode"+i+"' name='AtcCode"+i+"' type='checkbox' value='N/A' /> N/A </td> <td width='300px' id='AtcNaturePayment"+i+"'  class='atc atcNames'>SPECIAL LAW</td> <td width='90px' id='txtRate"+i+"' class='atc'> 0.0 </td> </tr>");

                tbllistSchedIIAtcCodeFlag = true;
            }
        }
    }

    function disableSelTreaty()
    {
        d.getElementById('frm1600:selTreaty').disabled = true;
        setInputSelectControl_Disabled("frm1600:selTreaty", true);
        d.getElementById('frm1600:selTreaty').selectedIndex = 0;

        if(tbllistSchedIIAtcCodeFlag){
            $('#tbllistSchedIIAtcCode').html(previoustbllistSchedIIAtcCode);
            $('#tbllistAtcCode').html(previoustbllistAtcCode);
			
            tbllistSchedIIAtcCodeFlag = false;
        }
    }
    function disableallShedIIATC()
    {
        for(i = 1; i <= 10; i++)
        {
            d.getElementById('frm1600:dtSched:btnATCcode'+i).disabled = true;

        }
    }
    function enableallShedIIATC()
    {
        for(i = 1; i <= 10; i++)
        {
            d.getElementById('frm1600:dtSched:btnATCcode'+i).disabled = false;
        }
    }

    function getRequiredWithheld(numIndex)
    {
        d.getElementById('frm1600:txtTaxbeWithHeld'+numIndex).value = formatCurrency(NumWithComma(d.getElementById('frm1600:txtTaxBase'+numIndex).value) * (NumWithComma(d.getElementById('frm1600:txtTaxRate'+numIndex).value) / 100 ));
    }

    function blockletter(e)
    {
        var number = parseFloat(e.value).toFixed(2);
        if(isNaN(number))
        {
            //var zero = 0;
            //e.value = parseFloat(zero).toFixed(2);
            e.value = "";
        }else {
            e.value = '' + number;
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

    function blockletterWithout2Decimal(e)
    {   
        var number = parseFloat(e.value);
        if(isNaN(number))
        {
            e.value = "";
        }else {
            e.value = '' + number.toFixed(0);
        }
    }



    function cancelAllCompute()
    {
        disableallShedIIATC()
        if( (d.getElementById("tblPartIIComputeTax").rows.length - 1) >= 1 || d.getElementById('frm1600:dtSched:drpAtcCode:1').value != "" || d.getElementById('frm1600:dtSched:drpAtcCode:2').value != "" || d.getElementById('frm1600:dtSched:drpAtcCode:3').value != "" || d.getElementById('frm1600:dtSched:drpAtcCode:4').value != ""
            || d.getElementById('frm1600:dtSched:drpAtcCode:5').value != "" || d.getElementById('frm1600:dtSched:drpAtcCode:6').value != "" || d.getElementById('frm1600:dtSched:drpAtcCode:7').value != "" || d.getElementById('frm1600:dtSched:drpAtcCode:8').value != "" || d.getElementById('frm1600:dtSched:drpAtcCode:9').value != "" || d.getElementById('frm1600:dtSched:drpAtcCode:10').value != "" )
        {
            var answer = confirm("You are about to change the value to 'No'. Doing this will clear the entries in Part II and Schedule II. ")
            if(answer)
            {
               
                $('#tbodyComputeTax').html("");
				
                for(i = 1 ; i <= 10; i++)
                {
                    d.getElementById('frm1600:dtSched:txtTin'+i).value = "";
                    d.getElementById('frm1600:dtSched:txtFullname'+i).value = "";
                    d.getElementById('frm1600:dtSched:drpAtcCode:'+i).value = "";
                    d.getElementById('frm1600:dtSched:naturePayment'+i).value = "";
                    d.getElementById('frm1600:dtSched:amount'+i).value = "";
                    d.getElementById('frm1600:dtSched:txtRatePercent'+i).value = "";
                }
                computeDtShedTaxWithheld();
                computeofTotalWithheldTax();
            }else{
                d.getElementById('frm1600:j_id252:_1').checked = true;
            }
        }
    }
    function computePenalties()
    {
        var tax20a = (NumWithComma(d.getElementById('frm1600:txtTax17A').value)*1);
        var tax20b = (NumWithComma(d.getElementById('frm1600:txtTax17B').value)*1);
        var tax20c = (NumWithComma(d.getElementById('frm1600:txtTax17C').value)*1);
        d.getElementById('frm1600:txtTax17D').value =   formatCurrency(tax20a  + tax20b + tax20c);
        computeOfTotalAmtDue();
    }
    function computeOfTotalAmtDue()
    {
        var tax17D = NumWithComma(d.getElementById('frm1600:txtTax17D').value);
        var tax16 = NumWithComma(d.getElementById('frm1600:txtTax16').value)*1;
        d.getElementById('frm1600:txtTax18').value = formatCurrency(tax17D + tax16);
        //d.getElementById('frm1600:txtTax18').value = formatCurrency(tax16);
        capital();
    }

    function computeofTotalWithheldTax()
    {
        var i;
        var totalsum = 0;
        for(i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
            var taxwithheld = (NumWithComma(d.getElementById('frm1600:txtTaxbeWithHeld'+i).value)*1) ;
            totalsum = (totalsum + taxwithheld);
        }
        d.getElementById('frm1600:txtTax14').value = formatCurrency(totalsum);

        d.getElementById('frm1600:txtTax16').value = formatCurrency(NumWithComma(d.getElementById('frm1600:txtTax14').value) - NumWithComma(d.getElementById('frm1600:txtTax15').value));
        computeOfTotalAmtDue();
    }

    function checkTIN(e)
    {
        //  (d.getElementById('frm1600:dtSched:txtTin'+indexNumber).value
        if(isNaN(e.value))
        {
            alert("Please enter a valid TIN");
            e.value = "";
            return;
        }
        if(e.value.length < 12)
        {
            alert("TIN should not be less 12 digits.")
            return;
        }

    }
    function computeDtShedTaxWithheld()
    {
        var totalsum = 0;
        for(var i = 1 ; i < ( d.getElementById('tblScheduleII').rows.length - 3) ; i++)
        {
            d.getElementById('frm1600:dtSched:taxWithheld'+i).value = formatCurrency(NumWithComma(d.getElementById('frm1600:dtSched:amount'+i).value) * ( d.getElementById('frm1600:dtSched:txtRatePercent'+i).value / 100 ));
            var taxwithheld = (NumWithComma(d.getElementById('frm1600:dtSched:taxWithheld'+i).value)*1);
            totalsum = (totalsum*1 + taxwithheld*1);
        }
        d.getElementById('frm1600:dtSched:TotaltaxWithheld').value = formatCurrency(totalsum);
    }

    function changedrpATCList(e)
    {

        
        var i;
        if(e.value == "P")
        {   
            getPrivateWithholdingAgentATC();
        }else if(e.value == "G")
        {
            
            getGovernmentWithholdingAgentATC();
        }
        $('#tbllistAtcCode').html("");
        $('#tbllistSchedIIAtcCode').html("");
		
        for(i = 1 ; i < ATCnameCode.length ; i++  )
        {
            $('#tbllistAtcCode').html(  d.getElementById('tbllistAtcCode').innerHTML +
                "<tr class='atc'><td width='20%' class='atc'> <input id='AtcCode"+i+"' name='AtcCode"+i+"' type='checkbox' value='"+ATCnameCode[i]+"' /> "+ATCnameCode[i]+ " </td> <td class='atc atcNames' width='70%' id='AtcNaturePayment"+i+"' >"+ NaturePayment[i]+ " </td> <td class='atc' width='10%' id='txtRate"+i+"'> "+taxRate[i]+ "</td> </tr>");

            $('#tbllistSchedIIAtcCode').html(  d.getElementById('tbllistSchedIIAtcCode').innerHTML +
                "<tr class='atc'><td width='20%' class='atc'> <input id='SchedIIAtcCde"+i+"' name='SchedIIAtcCde' type='radio' value='"+ATCnameCode[i]+ "' /> "+ATCnameCode[i]+ " </td> <td class='atc atcNames' width='70%' id='SchedIIAtcNaturePayment"+i+"' >"+ NaturePayment[i]+ " </td> <td class='atc' width='10%' id='txtRate"+i+"'> "+taxRate[i]+ "</td> </tr>");
        }

    }

    function checkiftaxwheldisYes()
    {
        if(d.getElementById('frm1600:j_id252:_1').checked == false && d.getElementById('frm1600:j_id252:_2').checked == false )
        {
            return "Please select an option for Item 4.";
        }
        else if( d.getElementById('frm1600:j_id392:_1').checked == false && d.getElementById('frm1600:j_id392:_2').checked == false  )
        {
            return "Please select an option for Item 12.";
        }
        else if( d.getElementById('frm1600:j_id252:_1').checked == true )
        {
            return true;
        }else
        {
            return "Selecting an ATC is not necessary when item no. 4 is set to ' NO '";
        }
    }

    function deletetableSchedII()
    {
        var table1 = d.getElementById("tblScheduleII");
        var tblrow =  table1.rows.length - 2;
        // delete last row
        if( tblrow > 3)  {
            table1.deleteRow(tblrow);
        }
        computeDtShedTaxWithheld();
    }

    var tempATC = new Array();
    var tempATCTaxbase = new Array();
    var tempATCTaxRate = new Array();
    function showPartIIATC()
    {   
        tempATC = new Array();
            tempATCTaxbase = new Array();
            tempATCTaxRate = new Array();
            for(var i = 0; i < d.getElementById('tblPartIIComputeTax').rows.length - 1; i++) {
                tempATC[i] = d.getElementById('frm1600:txtAtcCd'+ (i + 1)).value;
                tempATCTaxbase[i] = d.getElementById('frm1600:txtTaxBase'+(i +1)).value;
                tempATCTaxRate[i] = d.getElementById('frm1600:txtTaxRate'+(i +1)).value;
				
            }

            if( checkiftaxwheldisYes() == true )
            {
                
                d.getElementById('formPaper').style.display = "none";
                $('#modalAtc').show('blind');	
                $('#wrapper').css({ 'display': 'none' });		
            }else {
                alert(checkiftaxwheldisYes());
            }
    }
    var SchedIIATCIndex;
    function showSchedIIATC(index)
    {
         if( checkiftaxwheldisYes() == true )
            {
                
                d.getElementById('formPaper').style.display = "none";
                $('#modalSchedIIAtc').show('blind');
                $('#wrapper').css({ 'display': 'none' });                       
                
                SchedIIATCIndex = index;            
            }else {
                alert(checkiftaxwheldisYes());
            }
    }
    function cancelPartIIATC()
    {
       
        d.getElementById('formPaper').style.display = 'block';
        if ( $('#modalAtc').css('display') != 'none' ) {
            $('#modalAtc').hide('blind');
            $('#wrapper').css({ 'display': 'block' });       
        }
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");		
		
        for(i =1 ; i < d.getElementById('tbllistAtcCode').rows.length; i++)
        {

            d.getElementById('AtcCode'+i).checked = ATCCodeList[i];

        }
    }
    function cancelSchedIIATC()
    {
       
        d.getElementById('formPaper').style.display = 'block';
        $('#modalSchedIIAtc').hide('blind');
        $('#wrapper').css({ 'display': 'block' });       
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
    }
    function getSchedIIATCCode()
    {
        var listATCtable = d.getElementById('tbllistSchedIIAtcCode');
        for(i = 1 ; i <= listATCtable.rows.length; i++ )
        {   if(  d.getElementById('SchedIIAtcCde'+i) != null )
        { if(d.getElementById('SchedIIAtcCde'+i).checked == true)
        {
            d.getElementById('frm1600:dtSched:drpAtcCode:'+SchedIIATCIndex).value = d.getElementById('SchedIIAtcCde'+i).value;
            d.getElementById('frm1600:dtSched:naturePayment'+SchedIIATCIndex).value = d.getElementById('SchedIIAtcNaturePayment'+i).innerHTML;
            d.getElementById('frm1600:dtSched:txtRatePercent'+SchedIIATCIndex).value = d.getElementById('txtRate'+i).innerHTML;	

            if (d.getElementById('frm1600:dtSched:naturePayment'+SchedIIATCIndex).value == 'SPECIAL LAW') {
                d.getElementById('frm1600:dtSched:txtRatePercent'+SchedIIATCIndex).disabled = false; 
                d.getElementById('frm1600:dtSched:txtRatePercent'+SchedIIATCIndex).style.background="#FFFFFF" ;
            } else {
                d.getElementById('frm1600:dtSched:txtRatePercent'+SchedIIATCIndex).disabled = true;
            }	
        }
        }
           
        }
       
        cancelSchedIIATC();
    }


    var ATCCodeList = new Array();
	
    function getATCCode()
    {
        try{
            var listATCtable =   d.getElementById('tbllistAtcCode');
            $('#tbodyComputeTax').html("");
		
            for(var i = 1 ; i <= listATCtable.rows.length; i++ )
            {
                if(d.getElementById('AtcCode'+i) != null)
                {
	
                    var table = d.getElementById("tblPartIIComputeTax");
                    var iCtr = table.rows.length;
                    var rowCount = table.rows.length - 1;
                    ATCCodeList[i] = d.getElementById('AtcCode'+i).checked;

                    // check if checked id'ed ATC
                    if (d.getElementById('AtcCode'+i).checked == true )
                    {
				
                        var taxbasetemp = "0.00"; //dgarfin
                        var taxbaseRate = "0.00"; 
                        for(var tempCount = 0 ; tempCount < tempATC.length; tempCount++) {
                            if(tempATC[tempCount] == d.getElementById('AtcCode'+i).value){
                                taxbasetemp = tempATCTaxbase[tempCount];
                                taxbaseRate = tempATCTaxRate[tempCount];
                                break;
                            }
                        }

                        if (d.getElementById('AtcNaturePayment'+i).innerHTML == 'SPECIAL LAW') {
					
                            $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +
                                "<tr><td id='txtNaturePayment"+iCtr+"' class='padder1Em' >" + d.getElementById('AtcNaturePayment'+i).innerHTML + "</td>" +
                                "<td class='text-center'> <input type='text' id='frm1600:txtAtcCd"+iCtr+"' name='frm1600:txtAtcCd[]' style='width: 150px;'  class='styletxtAtcCode' value='"+ d.getElementById('AtcCode'+i).value + "' />  </td>" +
                                "<td> <input type='text' id='frm1600:txtTaxBase"+iCtr+"' name='frm1600:txtTaxBase[]' style='text-align: right;width: 160px;' size='20' maxlength='25' onblur='round(this,2); getRequiredWithheld("+iCtr+"); computeofTotalWithheldTax()' value='" + taxbasetemp + "' onkeypress='return numbersonly(this, event)'/> </td>" +
                                "<td> <input type='text' id='frm1600:txtTaxRate"+iCtr+"' name='frm1600:txtTaxRate[]'  style='text-align: right;width: 160px;' background-color:#FFFFFF' class='styletxtTaxRate' value='"+ taxbaseRate +"' onblur='round(this,2); getRequiredWithheld("+iCtr+"); computeofTotalWithheldTax()' onkeypress='return numbersonly(this, event)' /> </td>" +
                                "<td> <input type='text' id='frm1600:txtTaxbeWithHeld"+iCtr+"' name='frm1600:txtTaxbeWithHeld[]'  style='text-align: right;width: 160px;' class='styletxtTaxWithheld' value='0.00' size='20' maxlength='25' /> </td>" +
                                "</tr>");
						
                        } else {
					
                            $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +
                                "<tr><td id='txtNaturePayment"+iCtr+"' class='padder1Em' >" + d.getElementById('AtcNaturePayment'+i).innerHTML + "</td>" +
                                "<td class='text-center'> <input type='text' id='frm1600:txtAtcCd"+iCtr+"' name='frm1600:txtAtcCd[]' style='width: 150px;' class='styletxtAtcCode' value='"+ d.getElementById('AtcCode'+i).value + "' />  </td>" +
                                "<td class='text-center'> <input type='text' id='frm1600:txtTaxBase"+iCtr+"'  name='frm1600:txtTaxBase[]' style='text-align: right;width: 160px;' size='20' maxlength='25' onblur='round(this,2); getRequiredWithheld("+iCtr+"); computeofTotalWithheldTax()' value='" + taxbasetemp + "' onkeypress='return numbersonly(this, event)'/> </td>" +
                                "<td class='text-center'> <input type='text' id='frm1600:txtTaxRate"+iCtr+"' name='frm1600:txtTaxRate[]'  style='text-align: right;width: 160px;' class='styletxtTaxRate' value='"+ d.getElementById('txtRate'+i).innerHTML +"'  disabled /> </td>" +
                                "<td class='text-center'> <input type='text' id='frm1600:txtTaxbeWithHeld"+iCtr+"'  name='frm1600:txtTaxbeWithHeld[]' style='text-align: right;width: 160px;' class='styletxtTaxWithheld' value='0.00' size='20' maxlength='25' /> </td>" +
                                "</tr>");
							
                        }	
					    
                        waitstr = setTimeout("d.getElementById('frm1600:txtAtcCd"+iCtr+"').disabled = true; setInputTextControl_HorizontalAlignment('frm1600:txtTaxBase"+iCtr+"', 4);" , 100);
                        waitstr = setTimeout("d.getElementById('frm1600:txtTaxbeWithHeld"+iCtr+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1600:txtTaxbeWithHeld"+iCtr+"', 4);" , 100);
                        waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm1600:txtTaxRate"+iCtr+"', 4);" +
                            "" , 100);
					
                        setTimeout("getRequiredWithheld("+iCtr+");", 100);

                    } 
                }
            }
			
            setTimeout("computeofTotalWithheldTax();",100);
		
            cancelPartIIATC();
			
        } catch (e) {
            alert('exception : '+e.message);
        }	
    }

    function checkTINlength(e){

        if(e.length < 12){
            alert("TIN not valid");
            e.onfocus;
            return;
        }
    }
    
        function initialValidateBeforeSave() {
            if( (d.getElementById('frm1600:txtTIN1').value == "" || d.getElementById('frm1600:txtTIN2').value == "" || d.getElementById('frm1600:txtTIN3').value == "" || d.getElementById('frm1600:txtBranchCode').value == "")  )
            {
                alert("Please enter a valid TIN number on Item 5.");
                return false;
            }
            
            if( (d.getElementById('frm1600:txtPayerName').value == "")  )
            {
                alert("Please enter a valid Taxpayer Name on Item 8.");
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
        $('.printSignFooterClass').css({ 'width':'990px','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always' });	
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
                    var label = "<div class='labels'>".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</div>");
                    $( elem[i] ).after(label);
                }
            }
        }	
	       
        $('.printButtonClass').hide();
        $('#formPaper').css({'margin-top':'-80px' });
        $("#formPaper").show();
       
        window.print();

        $('.printButtonClass').show();
        $("#formPaper").show();
        $('#formPaper').css({'border':'#a7a7a7 1px solid' });
        $('.imgClass').css({ 'display':'none'});

        $('#printMenu').show('blind');
        if ( $('#formMenu').css('display') != 'none' ) {	
            $('#formMenu').hide('blind');
        }	
    }	

    function saveData()
    {
        d.getElementById('hPartIITableSize').value = d.getElementById('tblPartIIComputeTax').rows.length - 1;
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                console.log(form.serializeArray());
                var data = form.serialize();
                save('1600',data);
                
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
        saveAndExit('1600',data);
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

        submitAndSave('1600', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1600';
    } 
</script>
@endsection
