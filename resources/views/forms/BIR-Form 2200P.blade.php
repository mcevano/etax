@extends('layouts.app')
@section('title', '| BIR Form No. 2200P')

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
        <button type="button" class="btn btn-danger btn-exit" id="2200P" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="2200P" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='2200P' company='{{$company->id}}'>Okay</button>
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
  <span id="spanPage1">
        <div id="container">
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 806px; ">
                <div id="formPaper">
                    <table width="806" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="806" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
                                    <tr>
                                        <td width="82"  style='padding:0px;' valign="middle" align="center">                    
                        <p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p>
                      </td>
                                        <td width="175" valign="middle" nowrap>
                                            <label face="Arial" size="1px">Republika ng Pilipinas
                                            <br/>Kagawaran ng Pananalapi
                                            <br/>Kawanihan ng Rentas Internas</label>
                                        </td>
                                        <td width="374" align="center" nowrap>
                                            <font size="5px" style="font-weight:bold;">EXCISE TAX
                                            <br/>RETURN
                      <br/>for PETROLEUM PRODUCTS</font>
                                        </td>
                                        <td width="200" valign="center">
                                            <font face="Arial" size="1px">BIR Form No.<br/></font>
                                            <font face="Arial" size="6px">2200-P<br/></font>
                                            <font face="Arial" size="1px">September 2005 (ENCS)</font>
                    </td> 
                                    </tr>
                  
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="320" valign="top" class="tblFormTd">
                                            <table width="254" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="23"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td colspan="2"><font size="1" style="font-size: 11px;">Date (MM/DD/YYYY)</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td width="100%">
                                                        <font color="black" face="Arial" size="2">
                                                            <select class="iceSelOneMnu input" id="frm2200P:txtMonth1" name="frm2200P:txtMonth1" size="1">
                                                                <option value="01">01 - January</option>
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
                                                        </font>
                                                        <input class="iceInpTxt input" id="frm2200P:txtDate" maxlength="2" name="frm2200P:txtDate" size="1" style="" type="text" value="" onblur="blockLetterInt(this)" onkeypress="return wholenumber(this, event)" />
                                                        <input class="iceInpTxt input" id="frm2200P:txtForYr" maxlength="4" name="frm2200P:txtForYr" size="3" style="" type="text" value="" onblur="blockLetterInt(this)" onkeypress="return wholenumber(this, event)" />
                                                    </td>
                                                    <td width="25">&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="199" valign="top" class="tblFormTd">
                                            <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm2200P:j_id217">
                                                            <div align="center" style="padding: 5px 0 5px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="Y" name="frm2200P:amendedRtn" id="frm2200P:amendedRtn_1" onclick="d.getElementById('frm2200P:txtTax19').disabled = false;" disabled="disabled" /><label for="frm2200P:j_id217:_1" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" value="N"  name="frm2200P:amendedRtn" id="frm2200P:amendedRtn_2" onclick="d.getElementById('frm2200P:txtTax19').disabled = true; d.getElementById('frm2200P:txtTax19').value='0.00'; compute20();" disabled="disabled" checked="checked" /><label for="frm2200P:j_id217:_2" style="font-size:12px;" >No</label></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="221" valign="top" class="tblFormTd">
                                            <table width="152" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">No. of Sheets Attached?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><input type="text" value="0" style="text-align: right;" size="4" name="frm2200P:txtSheets" maxlength="2" id="frm2200P:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
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
                                            <table width="739" height="17" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="86">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part I</font></td>
                                                    <td width="649">
                                                        <div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;">B a c k g r o u n d &nbsp; I n f o r m a t i o n</font></div>
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
                                <table style="width: 800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="250" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;4&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="{{$company->tin1}}" size="2" name="frm2200P:txtTIN1" maxlength="3" id="frm2200P:txtTIN1" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin2}}" size="2" name="frm2200P:txtTIN2" maxlength="3" id="frm2200P:txtTIN2" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin3}}" size="2" name="frm2200P:txtTIN3" maxlength="3" id="frm2200P:txtTIN3" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin4}}" size="2" name="frm2200P:txtBranchCode" maxlength="3" id="frm2200P:txtBranchCode" onkeypress="return letternumber(event)"/>
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="132" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font><font size="1"  style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                    <td id="rdoSelect">
                                                        <select class='iceSelOneMnu' disabled="" id='frm2200P:txtRDOCode' name='frm2200P:txtRDOCode' size='1' >
                                                          <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="354" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">Line of Business&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" disabled="" value="{{$company->line_business}}" size="20" name="frm2200P:txtLineBus" maxlength="30" id="frm2200P:txtLineBus" onblur="return capital(this, event)" />
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
                                        <td width="583" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="11"><font size="2" style="font-weight:bold;">&nbsp;7&nbsp;</font></td>
                                                                <td><font size="1" style="font-size: 11px;">Taxpayer's Name (Last Name, First Name, Middle Name for Individuals) /(Registered Name for Non-Individuals)</font></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="25">&nbsp;</td>
                                                                <td><input type="text" disabled="" value="{{$company->registered_name != '' ? $company->registered_name : $company->lastname.','. $company->firstname.' '.$company->middlename }}" size="70" name="frm2200P:taxpayerName" maxlength="70" id="frm2200P:taxpayerName" onblur="return capital(this, event)" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="157" valign="top" class="tblFormTd">
                                            <table width="149" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="149"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font><font size="1"  style="font-size: 11px;">Telephone
                                                            Number</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" disabled="" value="{{$company->tel_number}}" size="15" name="frm2200P:txtTelNum" maxlength="20" id="frm2200P:txtTelNum" onkeypress="return wholenumber(this, event)" />
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
                                        <td width="583" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="11"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font></td>
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
                                                                <td><input type="text" disabled="" value="{{$company->address}}" size="70" name="frm2200P:txtAddress" maxlength="70" id="frm2200P:txtAddress" onblur="return capital(this, event)" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="157" valign="top" class="tblFormTd">
                                            <table width="148" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="148"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font><font size="1" style="font-size: 11px;">Zip
                                                            Code</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" disabled="" value="{{$company->zip_code}}" size="15" name="frm2200P:txtZipCode" maxlength="12" id="frm2200P:txtZipCode" onkeypress="return wholenumber(this, event)" />
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top" class="tblFormTd">
                                            <table border="0" cellpadding="0" cellspacing="0" width="735">
                                                <tr>
                                                    <td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">11&nbsp; &nbsp;</font></strong></font></td>
                                                    <td width="28%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Region<br /></font>
                                                        <select id="frm2200PoptRegion" name="frm2200PoptRegion" size="1" style="width: 160px" onchange="getProvince(this.value, 'frm2200PoptProvince', 'frm2200PoptCity')">
                                                            <option value="00">(Select Region)</option>
                                                        </select>
                                                    </td>
                                                    <td width="25%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Province<br /></font>
                                                        <select id="frm2200PoptProvince" name="frm2200PoptProvince" size="1" style="width: 155px" onchange="getCity('frm2200PoptRegion', 'frm2200PoptProvince', 'frm2200PoptCity')">
                                                            <option value="00">(Select Province)</option>
                                                        </select>
                                                    </td>
                                                    <td width="24%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">City<br /></font>
                                                        <select id="frm2200PoptCity" name="frm2200PoptCity" size="1" style="width: 150px">
                                                            <option value="00">(Select City)</option>
                                                        </select>
                                                    </td>
                                                    <td width="20%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Place of Production<br /></font>
                                                        <input id="frm2200P:txtPlaceofProd" maxlength="60" name="frm2200P:txtPlaceofProd" size="15" style="background-color: white; color: black" type="text" value="" onblur="return capital(this, event)" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top" class="tblFormTd">
                                            <table border="0" cellpadding="0" cellspacing="0" width="735"><tr><td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">12&nbsp; &nbsp;</font></strong></font></td>
                                                    <td width="28%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Region<br /></font>
                                                        <select id="frm2200PoptRegion1" name="frm2200PoptRegion1" size="1" style="width:160px" onchange="getProvince(this.value, 'frm2200PoptProvince1', 'frm2200PoptCity1')">
                                                            <option value="00">(Select Region)</option>
                                                        </select></td>
                                                    <td width="25%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Province<br /></font>
                                                        <select id="frm2200PoptProvince1" name="frm2200PoptProvince1" size="1" style="width: 155px" onchange="getCity('frm2200PoptRegion1', 'frm2200PoptProvince1', 'frm2200PoptCity1')">
                                                            <option value="00">(Select Province)</option></select>
                                                    </td>
                                                    <td width="24%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">City<br /></font>
                                                        <select id="frm2200PoptCity1" name="frm2200PoptCity1" size="1" style="width: 150px">
                                                            <option value="00">(Select City)</option></select>
                                                    </td>
                                                    <td width="20%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Place of Removal<br /></font>
                                                        <input id="frm2200P:txtPlaceofRem" maxlength="60" name="frm2200P:txtPlaceofRem" size="15" style="background-color: white; color: black" type="text" value="" onblur="return capital(this, event)" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top" class="tblFormTd">
                                            <table border="0" cellpadding="0" cellspacing="0" width="800"><tr><td width="20"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">13</font></strong></font></td><td width="217"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Are you availing of tax relief under&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td><td width="131"></td><td width="19"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">14</font></strong></font></td><td width="87"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">If yes, please&nbsp;&nbsp;</font></td><td width="218"></td></tr>
                                                <tr>
                                                    <td width="20">&nbsp;</td>
                                                    <td valign="top" width="217"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Special Law or International Tax Treaty?</font></td>
                                                    <td valign="top" width="131">
                                                        <fieldset id="frm2200P:optTreaty" style="font-family: Arial, Helvetica, sans-serif; font-size : 10px;">
                                                            <table border="0" cellpadding="0" cellspacing="0" class="iceSelOneRb">
                                                                <tr>
                                                                    <td>
                                                                        <input id="frm2200P:optTreaty_1" name="frm2200P:optTreaty" type="radio" value="Y" onclick="changeTreaty()" />
                                                                        <label class="iceSelOneRb" for="frm2200P:optTreaty:_1">Yes</label>
                                                                    </td>
                                                                    <td>
                                                                        <input checked="checked" id="frm2200P:optTreaty_2" name="frm2200P:optTreaty" type="radio" value="N" onclick="changeTreaty()" />
                                                                        <label class="iceSelOneRb" for="frm2200P:optTreaty:_2">No</label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </fieldset>
                                                    </td>
                                                    <td width="19">&nbsp;</td>
                                                    <td valign="top" width="87">&nbsp;<font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">specify</font></td>
                                                    <td valign="top" width="218">
                                                        <select disabled="disabled" id="frm2200P:lstTaxTreaty" name="frm2200P:lstTaxTreaty" size="1" style="background-color: white; font-family: Arial, Helvetica, sans-serif;">
                                                            <option value="0"></option>
                                                            <option value="1">Special Rate</option>
                                                            <option value="2">International Tax Treaty</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top" class="tblFormTd"><table border="0" width="800">
                                                <tr>
                                                    <td width="66"><font color="black" face="Arial, Helvetica, sans-serif" size="2"><b>Part II</b></font></td>
                                                    <td align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>MANNER OF PAYMENT</b></font><font color="black" face="Arial, Helvetica, sans-serif" size="2">&nbsp;</font></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top" class="tblFormTd">
                                            <table width="800" height="51" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">15</font></strong></font></td>
                                                    <td colspan="2" width="54%">
                                                        <fieldset id="frm2200P:chkPymntManner"  style="font-family: Arial, Helvetica, sans-serif; font-size : 10px;">
                                                            <table border="0" cellpadding="0" cellspacing="0" class="iceSelOneRb">
                                                                <tr>
                                                                    <td>
                                                                        <input id="frm2200P:chkPymntManner_1" name="frm2200P:chkPymntManner"  type="radio" value="Y" onclick="changeMannerOfPayment(); dateMonthYear()" />
                                                                        <label class="iceSelOneRb" for="frm2200P:chkPymntManner:_1">Payment on Actual Removal </label>
                                                                    </td>
                                                                    <td>
                                                                        <input id="frm2200P:chkPymntManner_2" name="frm2200P:chkPymntManner"  type="radio" value="N" onclick="changeMannerOfPayment(); dateMonthYear()" />
                                                                        <label class="iceSelOneRb" for="frm2200P:chkPymntManner:_2">Prepayment/Advance deposit/</label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </fieldset>
                                                    </td>
                                                    <td width="43%">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="3%">&nbsp;</td>
                                                    <td width="26%">&nbsp;</td>
                                                    <td width="28%"><div align="left"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Other
                                                                similar schemes (please specify)</font></div></td>
                                                    <td width="43%">
                                                        <font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input disabled="true" id="frm2200P:txtOthMannerofPymnt" maxlength="50" name="frm2200P:txtOthMannerofPymnt" size="25" style="background-color: white; font: 10pt Arial, Helvetica, sans-serif;" type="text" value="" onblur="return capital(this, event)" />
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
                                        <td class="tblFormTdPart">
                                            <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part
                                                            III</font></td>
                                                    <td width="618">
                                                        <div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>PAYMENTS AND APPLICATION</b></font></div>
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
                                            <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td><div align="center"><font color="black" face="Arial" size="1" style="font-size: 11px;">Amount</font></div></td>
                                                </tr>
                                                <tr>
                                                    <td width="26"><font size="2" style="font-weight:bold;">&nbsp;16&nbsp;&nbsp;</font></td>
                                                    <td width="355"><font color="black" face="Arial" size="1" style="font-size: 11px;">Excise Tax Due </font>
                                                        <font color="black" face="Arial" size="1">
                                                            <a href="#" id="frm2200P:btnSchedule1" onclick="showSched1()" style="font-size: 11px;">Schedule 1</a>
                                                        </font>
                                                    </td>
                                                    <td width="170">
                                                        <div class="spacePadder"></div>
                                                    </td>
                                                    <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 10px">16</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" name="frm2200P:txtTax16" maxlength="25" id="frm2200P:txtTax16" />
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;17&nbsp;</font></td>
                                                    <td><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: Balance Carried Over from Previous Return</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                                                    <td>
                                                        <div class="spacePadder"><font size="2" style="font-weight:bold;">17A</font>
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="15" name="frm2200P:txtTax17A" maxlength="25" id="frm2200P:txtTax17A" onblur="round(this,2); compute17C()" onkeypress="return numbersonly(this, event)"/>
                                                        </div>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Creditable Excise Tax, if applicable</font></td>
                                                    <td><span class="spacePadder"><font size="2" style="font-weight:bold;">17B</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="15" name="frm2200P:txtTax17B" maxlength="25" id="frm2200P:txtTax17B" onblur="compute17C()" />
                                                        </span></td>
                                                    <td><div align="justify"><span class="spacePadder"><font size="2" style="font-weight:bold;">17C</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200P:txtTax17C" maxlength="25" id="frm2200P:txtTax17C" disabled="true" />
                                                            </span></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;</font></td>
                                                    <td colspan="2"><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Net Tax Due / (Overpayment)</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font>
                                                    </td>
                                                    <td><div align="justify"><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 9px">18</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200P:txtTax18" maxlength="25" id="frm2200P:txtTax18" disabled="true" />
                                                            </span></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: Payment on Returns Previously Filed for the Same Period, if amended return</font></td>
                                                    <td><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 9px">19</font>
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2200P:txtTax19" maxlength="25" onblur="round(this,2); compute20();" id="frm2200P:txtTax19" disabled="true"/>
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Tax Still Due / (Overpayment)</font></td>
                                                    <td><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 9px">20</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200P:txtTax20" maxlength="25" id="frm2200P:txtTax20" disabled="true" />
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font></td>
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
                                                        <table border="0" width="555" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="161" align="center">
                                                                        <font size="2" face="Arial"><b>21A</b>
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="15" name="frm2200P:txtTax21A" maxlength="25" id="frm2200P:txtTax21A" onblur="round(this,2); compute21D()" onkeypress="return numbersonly(this, event)" />
                                                                            <input type="hidden" value="" name="frm2200P:inputSurcharge" id="frm2200P:inputSurcharge" />
                                                                        </font>
                                                                    </td>
                                                                    <td width="155" align="center">
                                                                        <font size="2" face="Arial"><b>21B</b>
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="15" name="frm2200P:txtTax21B" maxlength="25" id="frm2200P:txtTax21B" onblur="round(this,2); compute21D()" onkeypress="return numbersonly(this, event)" />
                                                                        </font>
                                                                    </td>
                                                                    <td width="180" align="left">
                                                                        <font size="2" face="Arial"><b>21C</b>
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200P:txtTax21C" maxlength="25" id="frm2200P:txtTax21C" onblur="round(this,2); compute21D()" onkeypress="return numbersonly(this, event)" />
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <div class="spacePadder">
                                                            <font size="2" style="font-weight:bold;">21D</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200P:txtTax21D" maxlength="25" id="frm2200P:txtTax21D" disabled="true" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Amount Payable </font></td>
                                                    <td>
                                                        <div class="spacePadder">
                                                            <font size="2" style="font-weight:bold;margin-right: 9px;">22</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200P:txtTax22" maxlength="25" id="frm2200P:txtTax22" disabled="true" class="iceInpTxt-dis" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1"  style="font-size: 11px;">Less: &nbsp;&nbsp;&nbsp; Payment Made Today</font></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                                        <table border="0" width="571">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="161" ><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tax Payment / Deposit</font></td>
                                                                    <td width="155" align="center">&nbsp;</td>
                                                                    <td width="180" align="right"><font size="2" style="font-weight:bold;">23A</font>
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200P:txtTax23A" maxlength="25" id="frm2200P:txtTax23A" onblur="round(this,2); compute23C()" onkeypress="return numbersonly(this, event)"/>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="161" ><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Penalties (from 21D)</font></td>
                                                                    <td width="155" align="center"><input class="iceSelBoolChkbx-dis" id="frm2200P:PayPenalties" name="frm2200P:PayPenalties" value="Y" type="checkbox" onclick="payPenalties()" /><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Pay Penalties?</font></td>
                                                                    <td width="180" align="right"><font size="2" face="Arial"><b>23B</b>
                                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200P:txtTax23B" maxlength="25" id="frm2200P:txtTax23B" disabled="true" />
                                                                        </font></td>
                                                                </tr>
                                                            </tbody>
                                                        </table></td>
                                                    <td valign="bottom"><span class="spacePadder"><font size="2" style="font-weight:bold;">23C</font>&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200P:txtTax23C" maxlength="25" id="frm2200P:txtTax23C" disabled="true" class="iceInpTxt-dis" />
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Balance to be Carried Over to Next Return</font></td>
                                                    <td><span class="spacePadder"><font size="2" style="font-weight:bold;">24</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200P:txtTax24" maxlength="25" id="frm2200P:txtTax24" disabled="true" class="iceInpTxt-dis" />
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
                <div class="imgClass" align='center' style="display:none; width:800px !important;">
                  <table  style="border-top: 3px solid black; border-collapse: collapse; font-family:arial; font-size:11px; text-align: center; table-layout: fixed; background-color: white;">
                    <col width="33%" />
                      <col width="19%" />
                    <col width="19%" />
                      <col width="29%" />
                      <tr>
                        <td colspan="4" style="border-bottom: 3px solid black; text-align: left"><b>PART IV</b></td>
                      </tr>
                      <tr>
                        <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge and 
                          <br/>belief, is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
                          </td>
                      </tr>
                      <tr>
                        <td colspan="3"><b>25</b>______________________________________________________________________________
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <br/>President/Vice President/Principal Officer/Accredited Tax Agent/
                          <br/>Authorized Representative/Taxpayer
                          <br/>(Signature Over Printed Name)</td>
                        <td><b>26</b>_____________________________
                          <br/>Treasurer/Assistant Treasurer
                          <br/>(Signature Over Printed Name)
                          <br/>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>_______________________________________
                          <br/>Title/Position of Signatory</td>
                        <td colspan="2">______________________________________
                          <br/>TIN of Signatory</td>
                        <td>______________________________
                          <br/>Title/Position of Signatory</td>
                      </tr>
                      <tr>
                        <td>_______________________________________
                          <br/>Tax Agent Acc. No./Atty's Roll No.(if applicable)</td>
                        <td>_______________
                          <br/>Date of Issuance</td>
                        <td>_______________
                          <br/>Date of Expiry</td>
                        <td>______________________________
                          <br/>TIN of Signatory</td>
                      </tr>
                  </table>
                </div>
                <div class="imgClass" align='center' style="display:none; width:800px !important;">
                  <img id="frm2200P:jurat" src="{{ asset('images/bottom_img/2200P_new.jpg') }}" width="800"/>
                </div>
                <div class="imgClass" align='center' style="display:none; width:800px !important;">
                  <table style="font-size:12px; text-align: left; vertical-align: top;background-color: white;">
                    <tr>
                      <td>&nbsp;Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br/><br/><br/><br/><br/></td>
                    </tr>
                  </table>
                </div>
                                <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table width="800" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr valign="middle">
                                                                    <td width="72"></td>
                                                                    <td width="641">
                                                                        <div id="frm2200P:j_id743" class="icePnlGrp">
                                                                            <div align="center">
                                                                              @if($action != 'view')
                                                                                <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm2200P:cmdValidate" id="frm2200P:cmdValidate" onclick="validateForm()" />
                                                                                <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm2200P:cmdEdit" id="frm2200P:cmdEdit" onclick="editForm()"/>
                                                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2200P:btnFinalCopy" id="frm2200P:btnFinalCopy" onclick="submitForm();" />
                                                                              <div id="msg" class="printButtonClass" style="display:none;"></div>
                                                                              @else
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                              @endif
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td width="87"></td>
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
                        <tr>
                                        <td>
                                            <div class="footer footer2200P" style="padding:6px; text-align: center; font-size: 11px; background-color: white;">
                                                <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                                            </div>
                                        </td>
                                    </tr>
                    </table>

                    <div id="DummyTxt" style='display:none;'>  </div>

                </div>
            </div>
        </div>
    </span>
    <span id="spanSchedules">
    <div id="modalSched1" class="printSignFooterClass" style="margin:auto; width:94%; display:none; height:90%; position:relative; top:3%; overflow-y:auto; background:#fff;" align="center">    
        <table width="94%" border="1">
                    <tr class="modalHeader">
          <td colspan="14">
            <table width="100%" cellspacing="0" cellpadding="0">
              <tr>  
              <td width="7%" style="text-align: left;font-weight: bold" nowrap>&nbsp;&nbsp;SCHEDULE 1</td>
              <td width="93%" style="text-align: center;font-weight: bold">SUMMARY OF REMOVALS AND EXCISE TAX DUE ON PETROLEUM PRODUCTS CHARGEABLE AGAINST PAYMENTS</td>
            </tr> 
            </table>  
                    </td>
          </tr>
                    <tr>
                        <td colspan="14" width="100%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" width="4%">&nbsp;</td>
                        <td align="center" width="10%">&nbsp;</td>
                        <td align="center" width="4%">&nbsp;</td>
                        <td align="center" width="4%">&nbsp;</td>
            <td align="center" width="8%">&nbsp;</td>
                        <td class="modalColumnHeader" colspan="8" align="center" width="62%">Tax Base ( Volume of Removals )</td>
                        <td align="center" width="8%">&nbsp;</td>
                    </tr>
                    <tr class="modalColumnHeader">
                        <td align="center" width="4%">&nbsp;</td>
                        <td align="center" width="10%">&nbsp;</td>
                        <td align="center" width="4%">Tax Bracket</td>
                        <td align="center" width="4%">&nbsp;</td>
            <td align="center" width="8%">&nbsp;</td>
                        <td colspan="2" align="center" width="16%">Taxable</td>
                        <td align="center" width="8%">Total</td>
                        <td colspan="4" align="center" width="31%">Tax-Paid/Exempt/Conditional Tax Free</td>
                        <td align="center" width="7%">Total Tax-Paid / Exempt/</td>
                        <td align="center" width="8%">Basic<br/>Excise<br/>Tax Due</td>
                    </tr>
                    <tr class="modalColumnHeader">
                        <td align="center" width="4%">ATC</td>
                        <td align="center" width="10%">Description</td>
                        <td align="center" width="4%">Unit of Measure</td>
                        <td align="center" width="4%">Applicable Rate</td>
            <td align="center" width="8%">Place of Removal</td>
                        <td align="center" width="8%">Locally<br/>Manufactured<br/>/Produced</td>
                        <td align="center" width="8%">Imported</td>
                        <td align="center" width="8%">Taxable Removals</td>
                        <td align="center" width="8%">Tax-Paid<br/>Imported<br/>Stocks</td>
                        <td align="center" width="8%">Underbond</td>
                        <td align="center" width="8%">Exports</td>
                        <td align="center" width="7%">Others<br/>(Under<br/>Special Law<br/>or<br/>International<br/>Agreement)</td>
                        <td align="center" width="7%">Conditional<br/>Tax-Free<br/>Removals</td>
                        <td align="center" width="8%">&nbsp;</td>
                    </tr>
                    <tbody class="modalContent" id="frm2200PtbodySched1">

                    </tbody>
                </table>
                <br />
                <table width="94%">
                    <tr>
                        <td class="modalColumnHeader" colspan="15" style="text-align: left;font-weight: bold">&nbsp;&nbsp;OTHERS (Please Specify)</td>
                    </tr>
        </table>
                <table width="94%">
                    <tr>
                        <td class="modalColumnHeader" colspan="15" style="text-align: left;font-weight: bold">        
              <table width="100%" border="1">
              <!--<thead>-->
                <tr>
                  <td colspan="15" width="100%">&nbsp;</td>
                </tr>
                <tr>
                  <td align="center" width="2%">&nbsp;</td>
                  <td align="center" width="4%">&nbsp;</td>
                  <td align="center" width="8%">&nbsp;</td>
                  <td align="center" width="4%">&nbsp;</td>
                  <td align="center" width="4%">&nbsp;</td>
                  <td align="center" width="8%">&nbsp;</td>
                  <td class="modalColumnHeader" colspan="8" align="center" width="62%">Tax Base ( Volume of Removals )</td>
                  <td align="center" width="8%">&nbsp;</td>
                </tr>
                <tr class="modalColumnHeader">
                  <td align="center" width="2%">&nbsp;</td>
                  <td align="center" width="4%">&nbsp;</td>
                  <td align="center" width="8%">&nbsp;</td>
                  <td align="center" width="4%">Tax Bracket</td>
                  <td align="center" width="4%">&nbsp;</td>
                  <td align="center" width="8%">&nbsp;</td>
                  <td colspan="2" align="center" width="16%">Taxable</td>
                  <td align="center" width="8%">Total</td>
                  <td colspan="4" align="center" width="31%">Tax-Paid/Exempt/Conditional Tax Free</td>
                  <td align="center" width="7%">Total Tax-Paid/Exempt/</td>
                  <td align="center" width="8%">Basic Excise Tax Due</td>
                </tr>
                <tr class="modalColumnHeader">
                  <td align="center" width="2%">&nbsp;</td>
                  <td align="center" width="4%">ATC</td>
                  <td align="center" width="8%">Description</td>
                  <td align="center" width="4%">Unit of Measure</td>
                  <td align="center" width="4%">Applicable Rate</td>
                  <td align="center" width="8%">Place of Removal</td>
                  <td align="center" width="8%">Locally<br/>Manufactured<br/>/Produced</td>
                  <td align="center" width="8%">Imported</td>
                  <td align="center" width="8%">Taxable Removals</td>
                  <td align="center" width="8%">Tax-Paid<br/>Imported<br/>Stocks</td>
                  <td align="center" width="8%">Underbond</td>
                  <td align="center" width="8%">Exports</td>
                  <td align="center" width="7%">Others<br/>(Under<br/>Special Law<br/>or<br/>International<br/>Agreement)</td>
                  <td align="center" width="7%">Conditional Tax- Free Removals</td>
                  <td align="center" width="8%">&nbsp;</td>
              
                </tr>
              <!--</thead>-->
              <tbody class="modalContent" width="100%" id="frm2200PadditionalSched1">
                <tr>
                      <td align="center" width="2%"><input class="printButtonClass" type="checkbox" name="frm2200P:sched1Chk[]" id="frm2200P:sched1Chk0" value="" /></td>
                      <td align="center" width="4%"><input type="text" name="frm2200P:txtsched1Atc[]" id="frm2200P:txtsched1Atc0" size="2" value="" maxlength="5"/></td>
                      <td align="center" width="8%"><input type="text" name="frm2200P:txtsched1Desc[]" id="frm2200P:txtsched1Desc0" size="10" value=""/></td>
                      <td align="center" width="4%"><input type="text" name="frm2200P:txtsched1UnitOfMeasure[]" id="frm2200P:txtsched1UnitOfMeasure0" size="5" value="" /></td>
                      <td align="center" width="4%"><input type="text" style="text-align:right" name="frm2200P:txtsched1AppRate[]" id="frm2200P:txtsched1AppRate0" size="5" value="0.00" onblur="round(this,2); sched1TotalTaxRem(0)" onkeypress="return numbersonly(this, event)" /></td>
                      <td align="center" width="8%"><input type="text" name="frm2200P:txtsched1PlaceOfRemoval[]" id="frm2200P:txtsched1PlaceOfRemoval0" size="15" value=""/></td>
                      <td align="center" width="8%"><input type="text" style="text-align:right" name="frm2200P:txtsched1Locally[]" id="frm2200P:txtsched1Locally0" size="15" value="0.00" onblur="round(this,2); sched1TotalTaxRem(0)" onkeypress="return numbersonly(this, event)" /></td>
                      <td align="center" width="8%"><input type="text" style="text-align:right" name="frm2200P:txtsched1Imported[]" id="frm2200P:txtsched1Imported0" size="15" value="0.00" onblur="round(this,2); sched1TotalTaxRem(0)" onkeypress="return numbersonly(this, event)" /></td>
                      <td align="center" width="8%"><input type="text" name="frm2200P:txtsched1TaxRem[]" id="frm2200P:txtsched1TaxRem0" style="background-color: rgb(220, 220, 220); text-align:right" size="15" value="" /></td>
                      <td align="center" width="8%"><input type="text" style="text-align:right" name="frm2200P:txtsched1TaxPaid[]" id="frm2200P:txtsched1TaxPaid0" size="15" value="0.00" onblur="round(this,2); sched1TotalConTaxFreeRem(0)" onkeypress="return numbersonly(this, event)" /></td>
                      <td align="center" width="8%"><input type="text" style="text-align:right" name="frm2200P:txtsched1Underbond[]" id="frm2200P:txtsched1Underbond0" size="15" value="0.00" onblur="round(this,2); sched1TotalConTaxFreeRem(0)" onkeypress="return numbersonly(this, event)" /></td>
                      <td align="center" width="8%"><input type="text" style="text-align:right" name="frm2200P:txtsched1Exports[]" id="frm2200P:txtsched1Exports0" size="15" value="0.00" onblur="round(this,2); sched1TotalConTaxFreeRem(0)" onkeypress="return numbersonly(this, event)" /></td>
                      <td align="center" width="7%"><input type="text" style="text-align:right" name="frm2200P:txtsched1Others[]" id="frm2200P:txtsched1Others0" size="15" value="0.00" onblur="round(this,2); sched1TotalConTaxFreeRem(0)" onkeypress="return numbersonly(this, event)" /></td>
                      <td align="center" width="7%"><input type="text" name="frm2200P:txtsched1Conditional[]" id="frm2200P:txtsched1Conditional0" style="background-color: rgb(220, 220, 220); text-align:right" size="15" value="0.00" /></td>
                      <td align="right" width="8%" nowrap><input type="text" name="frm2200P:txtsched1BasicTaxDue[]" id="frm2200P:txtsched1BasicTaxDue0" style="background-color: rgb(220, 220, 220); text-align:right" size="15" value="0.00" />&nbsp;</td>  
                </tr>               
              </tbody>
              </table>
            </td>
          </tr>     
        </table>
        <table width="94%" cellspacing="0" cellpadding="0">
            <tr>
              <td style="text-align:right" colspan="2">
                <input type="button" class="printButtonClass" name="frm2200P:btnAdd" id="frm2200P:btnAdd" value="     Add     " onClick="addFieldsForSched1()" />&nbsp;&nbsp;&nbsp;
                      <input type="button" class="printButtonClass" name="frm2200P:btnDelete" id="frm2200P:btnDelete" value="   Delete   " onClick="deleteFieldForSched1()" />&nbsp;
              </td>
            </tr>
            <tr>
              <td colspan="2" height="10">&nbsp;</td>
            </tr>         
            <tr>
              <td class="modalColumnHeader" style="text-align:left">
                <b>TOTAL TAX DUE</b>
              </td>
              <td align="right">
                <input type="text" name="frm2200P:totalTaxDue" id="frm2200P:totalTaxDue" size="16" maxlength="25" style="background-color: rgb(220, 220, 220); text-align:right" value="0.00" />&nbsp;
              </td>
            </tr>
          
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" colspan="2">
                <input type="button" class="printButtonClass" name="frm2200P:btnOK" id="frm2200P:btnOK" value="       OK       " onClick="sched1OK()" />&nbsp;&nbsp;&nbsp;
              </td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
        </table>
    </div>
    </span>
    
    <div id="hiddenEnroll" style="display:none;"  > <input id="txtFinalFlag" class="FinalFlag" name="txtFinalFlag" type="text" onblur="" onkeypress="" value="0" maxlength="60"   />
            <input id="txtEnroll" name="txtEnroll" type="text" onblur="" onkeypress="" value="N" maxlength="60"   />
      </div>
      
    <div id="hiddenEmail" style="display:none;"  > 
            <input id="txtEmail" class="emailClass" name="txtEmail" value="{{$company->email_address}}" type="text" onblur="" onkeypress="" maxlength="60"   />
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
    <div id="responseATC" style="display:none;"><!--loaded ATC files render here--></div>       
    <div id="responseRegion" style="display:none;"><!--loaded files render here--></div>  
    <div id="responseProvince" style="display:none;"><!--loaded files render here--></div>  
    <div id="responseCity" style="display:none;"><!--loaded files render here--></div>  
    <div id="responseRdo" style="display:none;"><!--loaded files render here--></div> 
@endsection

@section('scripts')
<script src="{{ asset('js/forms/2200P.js') }}" ></script>
<script type="text/javascript" >
  var isSubmitFinal = false;
  
  var gIsReadOnly = false; 
  var showFillupSched1Alert = true;
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
  var p3ReturnPeriodMonth = "";
  var p3ReturnPeriodDay = "";
  var p3ReturnPeriodYear = "";  
  
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
  
    var str;
    var sched1Index = 1;
    var sched1Mess = false;
    var disableFieldModal = false;

    str = setInterval("sleeptime()", 300);
    function sleeptime()
    {
        clearInterval(str);
        init();
        loadXMLProvince('/xml/province.xml');
        loadArrayCity();
        
        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
          showFillupSched1Alert = false;
          
          loadXML(fileName);   

          if (gIsReadOnly) { 
          window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false;",1000); 
          }

        } else {
          window.setTimeout("$('#loader').hide('blind');",100);
        } 
        if ( $('#printMenu').css('display') != 'none' ) { 
          $('#printMenu').hide('blind');
        }
        d.getElementById('frm2200P:txtTIN1').disabled = true;
        d.getElementById('frm2200P:txtTIN2').disabled = true;
        d.getElementById('frm2200P:txtTIN3').disabled = true;
        d.getElementById('frm2200P:txtBranchCode').disabled = true; 
    }
  
  function rdoPropertyJS(rdoCode, description) 
  {
    this.rdoCode=rdoCode;
    this.description=description;
  }
    
  var rdoList = new Array();

  function regionPropertyJS(regionCode, description) 
  {
    this.regionCode=regionCode;
    this.description=description;
  }
  
  function provincePropertyJS(regionCode, provinceCode, description) 
  {
    this.regionCode=regionCode;
    this.provinceCode=provinceCode;
    this.description=description;
  }

  function cityPropertyJS(regionCode, provinceCode, cityCode, description) 
  {
    this.regionCode=regionCode;
    this.provinceCode=provinceCode;
    this.cityCode=cityCode;
    this.description=description;
  } 
  
  var regionList = new Array();
  var provinceList = new Array();
  var cityList = new Array(); 
  
  /*----------------------------------*/
  var d=document,XMLBGFile='',data='',XMLFile='',XMLRegionFile='',XMLProvinceFile='',XMLCityFile='',msg = d.getElementById('msg');
  var loader=d.getElementById('loader');
  /*----------------------------------*/  
  
  function setInputTextControl_HorizontalAlignment(id,align) {
    d.getElementById(id).style.textAlign = "right";
  }
  function setInputTextControl_NumberFormatter(id,limit,deci) {
    d.getElementById(id).size = parseInt(limit);
    d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed( parseInt(deci) );    
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
      XMLFile.Close(); 
      
      if (loadWhere != null && loadWhere != "") {
       
        flag1=false;
        var count1=0;
        var responses1 = d.getElementById('response').getElementsByTagName('*');
        var sPar1 = 'frm2200P:sched1Chk';     
        
        do {
          if (responses1.item(count1).tagName.indexOf('/') == -1 && responses1.item(count1).tagName.indexOf(sPar1.toUpperCase()) != -1) {   
            var temp = String(responses1.item(count1).tagName); 
            temp = temp.substring(0,sPar1.length+1); //substring to length of search param for index - check files
            temp = temp.substring(sPar1.length,sPar1.length+1); //get the last character for checking
            if ( !isNaN(temp) && temp != 0) {
              addFieldsForSched1Reload();
            } //if last char is a number, add modal section
          } count1++;
        } while (count1!=responses1.length);
        window.setTimeout("loadWFData();sched1OK();flag1=true;",710); //changeMannerOfPaymentReload()
        /*--------------------------------------------------------------------------------------*/  
        window.setTimeout("$('#loader').hide('blind');",2000);  
      }
      if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
        gIsReadOnly = true;
      }
    
      if (gIsReadOnly) {
        d.getElementById('frm2200P:cmdValidate').disabled = true;
        d.getElementById('btnSave').disabled = true;
      }
      
    } catch(e) {
      msg.innerHTML = "Save File not Found.";
    } //this will Alert File not Found if it doesn't exist  
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

        if (loadWhere != null && loadWhere != "") {
          document.getElementById("response").innerHTML=xmlHTTP.responseText;

          flag1=false;
          var count1=0;
          var responses1 = d.getElementById('response').getElementsByTagName('div');
          var sPar1 = 'frm2200P:sched1Chk';     
          
          do {
            if (responses1.item(count1).innerHTML.indexOf(sPar1) != -1) {
              var temp = String(responses1.item(count1).innerHTML);
              temp = temp.substring(0,sPar1.length+1); //substring to length of search param for index - check files
              temp = temp.substring(sPar1.length,sPar1.length+1); //get the last character for checking
              if ( !isNaN(temp) && temp != 0) {
                addFieldsForSched1Reload();
              } //if last char is a number, add modal section
            } count1++;
          } while (count1!=responses1.length);
          window.setTimeout("loadData();sched1OK();flag1=true;",710); //changeMannerOfPaymentReload()
          /*--------------------------------------------------------------------------------------*/  
          window.setTimeout("$('#loader').hide('blind');",2000);  
        }
        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
          gIsReadOnly = true;
        }
      
        if (gIsReadOnly) {
          d.getElementById('frm2200P:cmdValidate').disabled = true;
          d.getElementById('btnSave').disabled = true;
        }

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
          elem[i].value = ''; elem[i].selectedIndex = 0;
          if(elem[i].id == 'frm2200P:taxpayerName' || elem[i].id == 'frm2200P:txtLineBus' || elem[i].id == 'frm2200P:txtAddress'){
            elem[i].value = unescape(fieldVal[1]);
          }
          else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
          else{
            elem[i].value = fieldVal[1]; //all select-one and text values       
          }

          if ( String(elem[i].id).indexOf('frm2200PoptRegion') != -1 || String(elem[i].id).indexOf('frm2200PoptProvince') != -1  || String(elem[i].id).indexOf('frm2200PoptRegion1') != -1  || String(elem[i].id).indexOf('frm2200PoptProvince1') != -1 ) {
            elem[i].onchange();     
          }
        }       
        
        if (elem[i].type == 'radio') {
          var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');       
          if (rdoVal[1] == 'true') {
            elem[i].checked = rdoVal[1];
            if ( String(elem[i].id).indexOf('frm2200P:chkPymntManner_1') == -1 || String(elem[i].id).indexOf('frm2200P:chkPymntManner_2') == -1 ) { 
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
    document.getElementById('txtEmail').value = globalEmail;
  }
  
  function loadWFData() {
    /*This will load data onto fields*/
    var response = d.getElementById("response");
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
      
      if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
        if (elem[i].type == 'text' || elem[i].type == 'select-one') {
          var fieldVal = String(response.innerHTML).split(elem[i].id+'>'); 
          if (fieldVal != null && fieldVal.length > 1) {
            elem[i].value = ''; elem[i].selectedIndex = 0;
            elem[i].value = fieldVal[1].substring(0, fieldVal[1].indexOf("</"));
          }           

          if ( String(elem[i].id).indexOf('frm2200PoptRegion') != -1 || String(elem[i].id).indexOf('frm2200PoptProvince') != -1  || String(elem[i].id).indexOf('frm2200PoptRegion1') != -1  || String(elem[i].id).indexOf('frm2200PoptProvince1') != -1 ) {
            elem[i].onchange();     
          }
        }         
        
        if (elem[i].type == 'radio') {
          var rdoVal = String(response.innerHTML).split(elem[i].id+'>');        
          if (rdoVal[1].substring(0, rdoVal[1].indexOf("</")) == 'true') {
            elem[i].checked = rdoVal[1].substring(0, rdoVal[1].indexOf("</"));  
            if ( String(elem[i].id).indexOf('frm2200P:chkPymntManner_1') == -1 || String(elem[i].id).indexOf('frm2200P:chkPymntManner_2') == -1 ) {
              elem[i].onclick();
            } 
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
    
      //Ensure that before writing to rdoPropertyJS the formType 2200P is traceable in rdoStr
      if (rdoStr.indexOf('2200P') >= 0) {
          var rdoValues = rdoStr.split('~');              
        var rdoCode = rdoValues[0];
        var description = rdoValues[1];       
        
        var objRdo = new rdoPropertyJS(rdoCode, description);
        rdoList[k] = objRdo; 
        k++;
        //alert('2200P successfully created array #'+i);
        
      } else {    
        //alert('2200P not found in array #'+i);
        continue;
      }
    }         
  }
  
  function init()
    { 
        var year = new Date();
        
        d.getElementById('frm2200P:txtMonth1').selectedIndex = year.getMonth();
        dd = "" + year.getDate();
        if (dd.length == 1) 
        { 
          dd = "0" + dd; 
          d.getElementById('frm2200P:txtDate').value = dd;
        }
        else
        {
          d.getElementById('frm2200P:txtDate').value = year.getDate();
        }
        d.getElementById('frm2200P:txtForYr').value = year.getFullYear();
    
        d.getElementById('frm2200P:amendedRtn_1').disabled = false;
        d.getElementById('frm2200P:amendedRtn_2').disabled = false;
        
        d.getElementById('frm2200P:optTreaty_2').checked = true;
        d.getElementById('frm2200P:lstTaxTreaty').disabled = true;

        d.getElementById('frm2200P:txtTax16').disabled = true;
        d.getElementById('frm2200P:txtTax17B').disabled = true;
        d.getElementById('frm2200P:txtTax17C').disabled = true;
        d.getElementById('frm2200P:txtTax18').disabled = true;
        d.getElementById('frm2200P:txtTax19').disabled = true;
        d.getElementById('frm2200P:txtTax20').disabled = true;
        
        d.getElementById('frm2200P:txtTax21D').disabled = true;
        d.getElementById('frm2200P:txtTax22').disabled = true;
        d.getElementById('frm2200P:txtTax23B').disabled = true;
        d.getElementById('frm2200P:txtTax23C').disabled = true;
        d.getElementById('frm2200P:txtTax24').disabled = true;
      
        @if($action != 'view')
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2200P:cmdEdit').disabled = true;
        d.getElementById('frm2200P:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @endif

        loadXMLRegion('/xml/region.xml');
        getRegion();

        createStaticFieldForSched1();
      
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

    function blockletterWithout2Decimal(e)
    {
        var number = parseFloat(e.value);
        if(isNaN(number))
        {
            e.value = "";
        } else {
            e.value = '' + number.toFixed(0);
        }
    }

    function changeTreaty()
    {
        if(d.getElementById('frm2200P:optTreaty_1').checked){
            d.getElementById('frm2200P:lstTaxTreaty').disabled = false;
        }else {
            d.getElementById('frm2200P:lstTaxTreaty').disabled = true;
            d.getElementById('frm2200P:lstTaxTreaty').selectedIndex = 0;
        }
    }

    function changeMannerOfPaymentReload()
    {
        if(d.getElementById('frm2200P:chkPymntManner_1').checked){
            d.getElementById('frm2200P:txtOthMannerofPymnt').disabled = true;
            d.getElementById('frm2200P:txtOthMannerofPymnt').value = "";
            
                sched1Mess = false;
        }else {
            d.getElementById('frm2200P:txtOthMannerofPymnt').disabled = false;
            setTimeout("d.getElementById('frm2200P:txtMonth1').disabled = true;", 100);
        }
    } 
  
    function changeMannerOfPayment()
    {
        if(d.getElementById('frm2200P:chkPymntManner_1').checked){
            d.getElementById('frm2200P:txtOthMannerofPymnt').disabled = true;
            d.getElementById('frm2200P:txtOthMannerofPymnt').value = "";
      d.getElementById('frm2200P:btnSchedule1').disabled = false;
    
      if (showFillupSched1Alert) {
        alert("Please fill up Schedule 1."); 
      }
      
            if(sched1Mess) {
                alert("Please fill up the fields for Schedule 1.");
                sched1Mess = false;
            }
        }else {
            d.getElementById('frm2200P:txtOthMannerofPymnt').disabled = false;
      d.getElementById('frm2200P:btnSchedule1').disabled = true;
            setTimeout("d.getElementById('frm2200P:txtMonth1').disabled = true;", 100);
        }
    }
  
  function dateMonthYear()
  {
    if(d.getElementById('frm2200P:chkPymntManner_2').checked)
    {
      var month = new Date();
      var date1 = new Date();
      var year = new Date();
      d.getElementById('frm2200P:txtMonth1').selectedIndex = month.getMonth() +1;
      d.getElementById('frm2200P:txtMonth1').disabled = true;
     
      dd = "" + date1.getDate();
        if (dd.length == 1) 
        { 
          dd = "0" + dd; 
          d.getElementById('frm2200P:txtDate').value = dd;
        }
        else
        {
          d.getElementById('frm2200P:txtDate').value = date1.getDate();
        }
      d.getElementById('frm2200P:txtDate').disabled = true;
      d.getElementById('frm2200P:txtForYr').value = year.getFullYear();
      d.getElementById('frm2200P:txtForYr').disabled = true;
    }
    else
    {
      d.getElementById('frm2200P:txtMonth1').disabled = false;
      d.getElementById('frm2200P:txtDate').disabled = false;
      d.getElementById('frm2200P:txtForYr').disabled = false;
    }
  }

    function showSched1()
    {
    if(d.getElementById('frm2200P:chkPymntManner_1').checked){
      
        d.getElementById('formPaper').style.display = "none";
        $('#modalSched1').show('blind');  

        var fieldsTemp = "";
        var x = 0;
        while(x < 26){
          fieldsTemp = fieldsTemp + "setInputTextControl_HorizontalAlignment('frm2200P:txtLocally" + x + "', 4);" +
            "setInputTextControl_HorizontalAlignment('frm2200P:txtImported" + x + "', 4);" +
            "setInputTextControl_HorizontalAlignment('frm2200P:txtTaxRem" + x + "', 4);d.getElementById('frm2200P:txtTaxRem" + x + "').disabled = true;" +
            "setInputTextControl_HorizontalAlignment('frm2200P:txtTaxPaid" + x + "', 4);" +
            "setInputTextControl_HorizontalAlignment('frm2200P:txtUnderbond" + x + "', 4);" +
            "setInputTextControl_HorizontalAlignment('frm2200P:txtExports" + x + "', 4);" +
            "setInputTextControl_HorizontalAlignment('frm2200P:txtOthers" + x + "', 4);" +
            "setInputTextControl_HorizontalAlignment('frm2200P:txtConditional" + x + "', 4);d.getElementById('frm2200P:txtConditional" + x + "').disabled = true;" +
            "setInputTextControl_HorizontalAlignment('frm2200P:txtBasicTaxDue" + x + "', 4);d.getElementById('frm2200P:txtBasicTaxDue" + x + "').disabled = true;";

          fieldsTemp = fieldsTemp + "d.getElementById('frm2200P:txtLocally" + x + "').value += '';" +
            "d.getElementById('frm2200P:txtImported" + x + "').value += '';" +
            "d.getElementById('frm2200P:txtTaxRem" + x + "').value += '';" +
            "d.getElementById('frm2200P:txtTaxPaid" + x + "').value += '';" +
            "d.getElementById('frm2200P:txtUnderbond" + x + "').value += '';" +
            "d.getElementById('frm2200P:txtExports" + x + "').value += '';" +
            "d.getElementById('frm2200P:txtOthers" + x + "').value += '';" +
            "d.getElementById('frm2200P:txtConditional" + x + "').value += '';" +
            "d.getElementById('frm2200P:txtBasicTaxDue" + x + "').value += '';";

          if(disableFieldModal) {
            fieldsTemp = fieldsTemp + "d.getElementById('frm2200P:txtLocally" + x + "').disabled = true;" +
              "d.getElementById('frm2200P:txtImported" + x + "').disabled = true;" +
              "d.getElementById('frm2200P:txtTaxRem" + x + "').disabled = true;" +
              "d.getElementById('frm2200P:txtTaxPaid" + x + "').disabled = true;" +
              "d.getElementById('frm2200P:txtUnderbond" + x + "').disabled = true;" +
              "d.getElementById('frm2200P:txtExports" + x + "').disabled = true;" +
              "d.getElementById('frm2200P:txtOthers" + x + "').disabled = true;" +
              "d.getElementById('frm2200P:txtConditional" + x + "').disabled = true;" +
              "d.getElementById('frm2200P:txtBasicTaxDue" + x + "').disabled = true;";
          }

          x++;
        }
        waitstr = setTimeout(fieldsTemp, 100);

        var dynamicText = "setInputTextControl_HorizontalAlignment('frm2200P:txtsched1AppRate0', 4);" +
          "setInputTextControl_HorizontalAlignment('frm2200P:txtsched1Locally0', 4);" +
          "setInputTextControl_HorizontalAlignment('frm2200P:txtsched1Imported0', 4);" +
          "setInputTextControl_HorizontalAlignment('frm2200P:txtsched1TaxRem0', 4);d.getElementById('frm2200P:txtsched1TaxRem0').disabled = true;" +
          "setInputTextControl_HorizontalAlignment('frm2200P:txtsched1TaxPaid0', 4);" +
          "setInputTextControl_HorizontalAlignment('frm2200P:txtsched1Underbond0', 4);" +
          "setInputTextControl_HorizontalAlignment('frm2200P:txtsched1Exports0', 4);" +
          "setInputTextControl_HorizontalAlignment('frm2200P:txtsched1Others0', 4);" +
          "setInputTextControl_HorizontalAlignment('frm2200P:txtsched1Conditional0', 4);d.getElementById('frm2200P:txtsched1Conditional0').disabled = true;" +
          "setInputTextControl_HorizontalAlignment('frm2200P:txtsched1BasicTaxDue0', 4);d.getElementById('frm2200P:txtsched1BasicTaxDue0').disabled = true;" +
          "setInputTextControl_HorizontalAlignment('frm2200P:totalTaxDue', 4);d.getElementById('frm2200P:totalTaxDue').disabled = true;";

        if(disableFieldModal) {
          dynamicText += "d.getElementById('frm2200P:txtsched1AppRate0').disabled = true;" +
            "d.getElementById('frm2200P:txtsched1Locally0').disabled = true;" +
            "d.getElementById('frm2200P:txtsched1Imported0').disabled = true;" +
            "d.getElementById('frm2200P:txtsched1TaxRem0').disabled = true;" +
            "d.getElementById('frm2200P:txtsched1TaxPaid0').disabled = true;" +
            "d.getElementById('frm2200P:txtsched1Underbond0').disabled = true;" +
            "d.getElementById('frm2200P:txtsched1Exports0').disabled = true;" +
            "d.getElementById('frm2200P:txtsched1Others0').disabled = true;" +
            "d.getElementById('frm2200P:txtsched1Conditional0').disabled = true;" +
            "d.getElementById('frm2200P:txtsched1BasicTaxDue0').disabled = true;" +
            "d.getElementById('frm2200P:txtsched1Atc0').disabled = true;" +
            "d.getElementById('frm2200P:txtsched1Desc0').disabled = true;" +
            "d.getElementById('frm2200P:txtsched1UnitOfMeasure0').disabled = true;" +
            "d.getElementById('frm2200P:totalTaxDue').disabled = true;" +
            "d.getElementById('frm2200P:btnAdd').disabled = true;" +
            "d.getElementById('frm2200P:btnDelete').disabled = true;";
        }

        waitstr = setTimeout(dynamicText, 100);
      }else if(d.getElementById('frm2200P:chkPymntManner_2').checked) {
        alert("Schedule 1 is not required for Prepayment/Advance Deposit.");
        return;
      } else {
        alert("Choose Manner of Payment.");
        return;
      }
    }

    function hideSched1()
    {
        
    d.getElementById('formPaper').style.display = 'block';
        $('#modalSched1').hide('blind');
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
    }

    function getPlaceOfRemSched1(index)
    {
        if(d.getElementById('frm2200P:txtLocally' + index).value != 0){                      
            d.getElementById('frm2200P:txtPlaceOfRemoval' + index).value = d.getElementById('frm2200P:txtPlaceofRem').value;
        }else {
            d.getElementById('frm2200P:txtPlaceOfRemoval' + index).value = "";
        }
    
    computeTotalTaxRem(index);
    } 
  
    function createStaticFieldForSched1()
    {
        var x = 0;
        var fields = "";
        while(x < 26){
            fields = fields + getStaticATC(x);

            fields = fields + "<td align='center' width='8%'><input type='text' style='text-align:right' name='frm2200P:txtPlaceOfRemoval" + x + "' id='frm2200P:txtPlaceOfRemoval" + x + "' size='15' maxlength='25' value=''  /></td>" +
                "<td align='center' width='8%'><input type='text' style='text-align:right' name='frm2200P:txtLocally" + x + "' id='frm2200P:txtLocally" + x + "' size='15' maxlength='25' value='0.00' onblur='round(this,2); getPlaceOfRemSched1(" + x + ");' onkeypress='return numbersonly(this, event)' /></td>" +
                "<td align='center' width='8%'><input type='text' style='text-align:right' name='frm2200P:txtImported" + x + "' id='frm2200P:txtImported" + x + "' size='15' maxlength='25' value='0.00' onblur='round(this,2); computeTotalTaxRem(" + x + ")' onkeypress='return numbersonly(this, event)' /></td>" +
                "<td align='center' width='8%'><input type='text' style='text-align:right' name='frm2200P:txtTaxRem" + x + "' id='frm2200P:txtTaxRem" + x + "'style='background-color: rgb(220, 220, 220)' size='15' maxlength='25' value='0.00' /></td>" +
                "<td align='center' width='8%'><input type='text' style='text-align:right' name='frm2200P:txtTaxPaid" + x + "' id='frm2200P:txtTaxPaid" + x + "' size='15' maxlength='25' value='0.00' onblur='round(this,2); computeTotalConTaxFreeRem(" + x + ")' onkeypress='return numbersonly(this, event)' /></td>" +
                "<td align='center' width='8%'><input type='text' style='text-align:right' name='frm2200P:txtUnderbond" + x + "' id='frm2200P:txtUnderbond" + x + "' size='15' maxlength='25' value='0.00' onblur='round(this,2); computeTotalConTaxFreeRem(" + x + ")' onkeypress='return numbersonly(this, event)' /></td>" +
                "<td align='center' width='8%'><input type='text' style='text-align:right' name='frm2200P:txtExports" + x + "' id='frm2200P:txtExports" + x + "' size='15' maxlength='25' value='0.00' onblur='round(this,2); computeTotalConTaxFreeRem(" + x + ")' onkeypress='return numbersonly(this, event)' /></td>" +
                "<td align='center' width='7%'><input type='text' style='text-align:right' name='frm2200P:txtOthers" + x + "' id='frm2200P:txtOthers" + x + "' size='15' maxlength='25' value='0.00' onblur='round(this,2); computeTotalConTaxFreeRem(" + x + ")' onkeypress='return numbersonly(this, event)' /></td>" +
                "<td align='center' width='7%'><input type='text' style='text-align:right' name='frm2200P:txtConditional" + x + "' id='frm2200P:txtConditional" + x + "'style='background-color: rgb(220, 220, 220)' size='15' maxlength='25' value='0.00' /></td>" +
                "<td align='center' width='8%' nowrap><input type='text' style='text-align:right' name='frm2200P:txtBasicTaxDue" + x + "' id='frm2200P:txtBasicTaxDue" + x + "'style='background-color: rgb(220, 220, 220)' size='15' maxlength='25' value='0.00' />&nbsp;&nbsp;</td></tr>";    
  
            x++;
        }   
      
    
    $('#frm2200PtbodySched1').html(fields);
    }

    

    function computeTotalTaxRem(varIndex){
        var total = 0.0;

        total = formatCurrency((NumWithComma(d.getElementById("frm2200P:txtLocally" + varIndex).value)*1) + (NumWithComma(d.getElementById("frm2200P:txtImported" + varIndex).value)*1));

        d.getElementById("frm2200P:txtTaxRem" + varIndex).value = total;

        computeBasicExciseTaxDue(varIndex);
    }

    function computeTotalConTaxFreeRem(varIndex){
        var total = 0.0;

        total = formatCurrency((NumWithComma(d.getElementById("frm2200P:txtTaxPaid" + varIndex).value)*1) + (NumWithComma(d.getElementById("frm2200P:txtUnderbond" + varIndex).value)*1) +
            (NumWithComma(d.getElementById("frm2200P:txtExports" + varIndex).value)*1) + (NumWithComma(d.getElementById("frm2200P:txtOthers" + varIndex).value)*1));

        d.getElementById("frm2200P:txtConditional" + varIndex).value = total;
    }

    function computeBasicExciseTaxDue(varIndex){
        var total = 0.0;

        total = formatCurrency((NumWithComma(d.getElementById("frm2200P:txtTaxRem" + varIndex).value)*1) * (d.getElementById("frm2200P:hideAppRate" + varIndex).value)*1);

        d.getElementById("frm2200P:txtBasicTaxDue" + varIndex).value = total;

        totalTaxDue();
    }

    function sched1TotalTaxRem(varIndex){
        var total = 0.0;

        total = formatCurrency((NumWithComma(d.getElementById("frm2200P:txtsched1Locally" + varIndex).value)*1) + (NumWithComma(d.getElementById("frm2200P:txtsched1Imported" + varIndex).value)*1));

        d.getElementById("frm2200P:txtsched1TaxRem" + varIndex).value = total;

        sched1BasicExciseTaxDue(varIndex);
    }

    function sched1TotalConTaxFreeRem(varIndex){
        var total = 0.0;

        total = formatCurrency((NumWithComma(d.getElementById("frm2200P:txtsched1TaxPaid" + varIndex).value)*1) + (NumWithComma(d.getElementById("frm2200P:txtsched1Underbond" + varIndex).value)*1) +
            (NumWithComma(d.getElementById("frm2200P:txtsched1Exports" + varIndex).value)*1) + (NumWithComma(d.getElementById("frm2200P:txtsched1Others" + varIndex).value)*1));

        d.getElementById("frm2200P:txtsched1Conditional" + varIndex).value = total;
    }

    function sched1BasicExciseTaxDue(varIndex){
        var total = 0.0;

        total = formatCurrency((NumWithComma(d.getElementById("frm2200P:txtsched1TaxRem" + varIndex).value)*1) * (d.getElementById("frm2200P:txtsched1AppRate" + varIndex).value*1));

        d.getElementById("frm2200P:txtsched1BasicTaxDue" + varIndex).value = total;

        totalTaxDue();
    }

    function totalTaxDue(){
        var total = 0.0;

        var x = 0;
        while(x < 26){
            total = (total*1) + (NumWithComma(d.getElementById("frm2200P:txtBasicTaxDue" + x).value)*1);
            x++;
        }

        x = 0;
        while(x < d.getElementById("frm2200PadditionalSched1").rows.length){
            total = (total*1) + (NumWithComma(d.getElementById("frm2200P:txtsched1BasicTaxDue" + x).value)*1);
            x++;
        }

        d.getElementById("frm2200P:totalTaxDue").value = formatCurrency(total);
    }
    
    function isValidDataOnSched1()
    {
        var result = true;
        var sched1Field = d.getElementById('frm2200PadditionalSched1');
        if(sched1Field.rows.length > 0){
            var index = (sched1Index*1) - 1;
            if(d.getElementById('frm2200P:txtsched1Atc' + index).value == ""){
                if(index > 0) {
                    alert("Please enter a valid ATC for the specified row.");
                    result = false;
                }
            }else if(d.getElementById('frm2200P:txtsched1Atc' + index).value != "") {
                var strText = d.getElementById('frm2200P:txtsched1Atc' + index).value;
                d.getElementById('frm2200P:txtsched1Atc' + index).value = strText.toUpperCase();
                if(strText.toUpperCase().substring(0, 2) != "XP"){
                    alert("The supplied ATC code should start with 'XP'.");
                    result = false;
                }
            }
            if(result){
                if(d.getElementById('frm2200P:txtsched1AppRate' + index).value == 0){
                    if(index > 0) {
                        alert("Please enter a valid Applicable rate for the specified row.");
                        result = false;
                    }
                }
            }
        }
        
        return result;
    }

    function addFieldsForSched1Reload()
    {
        var sched1Field = d.getElementById('frm2200PadditionalSched1');
            addRow(sched1Field, sched1Fields());
    } 
  
    function addFieldsForSched1()
    {
        var sched1Field = d.getElementById('frm2200PadditionalSched1');
        if(isValidDataOnSched1()){
            addRow(sched1Field, sched1Fields());
        }
    }

    function addRow(tbody, text) {
      $('#frm2200PadditionalSched1').append(text);
    }

    function deleteFieldForSched1()
    {
        var sched1Field = d.getElementById('frm2200PadditionalSched1');
        var x = 0;
        var xFlag = false;
        while(x < sched1Field.rows.length){
            if(d.getElementById('frm2200P:sched1Chk' + x).checked){
        if (x > 0) {
          sched1Field.deleteRow(x);
          sched1Input(x);
          xFlag = true;
          sched1Index--;
        } else {
          alert("First row cannot be deleted.");
          return;
        } 
            }
            x++;
            if(xFlag){
                x = 0;
                xFlag = false;
            }
        }
    }

    
    

    

    function sched1OK()
    {
        if(isValidDataOnSched1()){
            d.getElementById('frm2200P:txtTax16').value = d.getElementById('frm2200P:totalTaxDue').value;

            hideSched1();

            compute18();
        }
    }

    function compute17C()
    {
        var total = 0.0;

        total = (NumWithComma(d.getElementById('frm2200P:txtTax17A').value)*1 + NumWithComma(d.getElementById('frm2200P:txtTax17B').value)*1);

        d.getElementById('frm2200P:txtTax17C').value = formatCurrency((total).toFixed(2));

        compute18();
    }

    function compute18()
    {
        var total = 0.0;

        total = (NumWithComma(d.getElementById('frm2200P:txtTax16').value)*1 - NumWithComma(d.getElementById('frm2200P:txtTax17C').value)*1);

        d.getElementById('frm2200P:txtTax18').value = formatCurrency((total).toFixed(2));

        compute20();
    }

    function compute20()
    {
        var total = 0.0;

        total = (NumWithComma(d.getElementById('frm2200P:txtTax18').value)*1 - NumWithComma(d.getElementById('frm2200P:txtTax19').value)*1);

        d.getElementById('frm2200P:txtTax20').value = formatCurrency((total).toFixed(2));

        compute22();
    }
  function compute21D()
  {
    d.getElementById('frm2200P:txtTax21D').value = formatCurrency(NumWithComma(d.getElementById('frm2200P:txtTax21A').value)*1 + NumWithComma(d.getElementById('frm2200P:txtTax21B').value)*1 + NumWithComma(d.getElementById('frm2200P:txtTax21C').value)*1);
    compute22();
    payPenalties();
  }
  function payPenalties()
  {
    if(d.getElementById('frm2200P:PayPenalties').checked){
      d.getElementById('frm2200P:txtTax23B').value = d.getElementById('frm2200P:txtTax21D').value;
    }
    else{
      d.getElementById('frm2200P:txtTax23B').value = "0.00";
    }
    compute23C();
  }
    function compute22()
    {
        var total = 0.0;
        
        total = (NumWithComma(d.getElementById('frm2200P:txtTax20').value)*1 + NumWithComma(d.getElementById('frm2200P:txtTax21D').value)*1);
    
        d.getElementById('frm2200P:txtTax22').value = formatCurrency((total).toFixed(2));

        compute24();
    }

    function compute23C()
    {
        var total = 0.0;

        total = (NumWithComma(d.getElementById('frm2200P:txtTax23A').value)*1 + NumWithComma(d.getElementById('frm2200P:txtTax23B').value)*1);

        d.getElementById('frm2200P:txtTax23C').value = formatCurrency((total).toFixed(2));

        compute24();
    }

    function compute24()
    {
        var total = 0.0;

        total = (NumWithComma(d.getElementById('frm2200P:txtTax22').value)*1 - NumWithComma(d.getElementById('frm2200P:txtTax23C').value)*1);

        d.getElementById('frm2200P:txtTax24').value = formatCurrency((total).toFixed(2));
    capital();
    }

    function validateForm()
    {
        var dt = new Date();
    var isLeap = new Date(document.getElementById('frm2200P:txtForYr').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm2200P:txtMonth1').value==2 && document.getElementById('frm2200P:txtDate').value==29) {
      alert("Filing year is not a leap year.");
      return;
    }
    if (!isLeap && document.getElementById('frm2200P:txtMonth1').value==2 && document.getElementById('frm2200P:txtDate').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    if (isLeap && document.getElementById('frm2200P:txtMonth1').value==2 && document.getElementById('frm2200P:txtDate').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    
    
    if(d.getElementById('frm2200P:txtDate').value == "" || d.getElementById('frm2200P:txtDate').value*1 == 0)
        {
            alert("Please enter valid day on item 1.");
            return;
        }
        if(d.getElementById('frm2200P:txtForYr').value == "")
        {
            alert("Please enter valid year on item 1.");
            return;
        }
       
        if(d.getElementById('frm2200P:txtForYr').value*1 < 1900)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }
        if(d.getElementById('frm2200P:txtDate').value == "")
        {
            alert("Please indicate a valid Day.")
            return;
        }
    
    if(d.getElementById('frm2200P:txtDate').value < 1){
            alert("Please enter a valid day in Item 1.");
            return;
        }

    var month31 = (['01', '03', '05', '07', '08', '10', '12']);
    var month30 = (['04', '06', '09', '11']);
    var month = document.getElementById('frm2200P:txtMonth1').value
    if (month31.contains(month) && document.getElementById('frm2200P:txtDate').value > 31)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    else if (month30.contains(month) && document.getElementById('frm2200P:txtDate').value > 30)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    
    if(d.getElementById('frm2200P:txtDate').value.length == 1)
        {
            alert("Please enter a valid day on item 1. Format should be MM/DD/YYYY.")
            return;
        }
      if( (d.getElementById('frm2200P:txtTIN1').value == "" || d.getElementById('frm2200P:txtTIN2').value == "" || d.getElementById('frm2200P:txtTIN3').value == "" || d.getElementById('frm2200P:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 4.");
            return;
        }   
            
        if( (d.getElementById('frm2200P:txtLineBus').value == "")  )
        {
            alert("Please enter a valid Line of Business/Occupation on Item 6.");
            return;
        } 
    if( (d.getElementById('frm2200P:taxpayerName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 7.");
            return;
        } 
    if( (d.getElementById('frm2200P:txtTelNum').value == "")  )
    {
            alert("Please enter Telephone Number on Item 8.");
            return;
        }
    if( (d.getElementById('frm2200P:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 9.");
            return;
        }
    if( (d.getElementById('frm2200P:txtZipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip Code on Item 10.");
            return;
        }
        if(d.getElementById('frm2200PoptRegion').selectedIndex < 1 || d.getElementById('frm2200PoptProvince').selectedIndex < 1 ||
            d.getElementById('frm2200PoptCity').selectedIndex < 1 || d.getElementById('frm2200P:txtPlaceofProd').value == "")
        {
            alert("Please enter a value on item no. 11. Entry must not be empty.")
            return;
        }
        if(d.getElementById('frm2200PoptRegion1').selectedIndex < 1 || d.getElementById('frm2200PoptProvince1').selectedIndex < 1 ||
            d.getElementById('frm2200PoptCity1').selectedIndex < 1 || d.getElementById('frm2200P:txtPlaceofRem').value == "")
        {
            alert("Please enter a value on item no. 12. Entry must not be empty.")
            return;
        }
        if(!d.getElementById('frm2200P:chkPymntManner_1').checked && !d.getElementById('frm2200P:chkPymntManner_2').checked) {
            alert("Please select an option on item no. 15.");
            return;
        }
        var tax24total = parseFloat("" + d.getElementById('frm2200P:txtTax24').value);
        if(tax24total > 0) {
            alert("Balance to be carried over to Next return must not be positive.\nPlease adjust Tax Payment/Deposit accordingly.");
            return;
        }

        d.getElementById('frm2200P:cmdValidate').disabled = true;
        d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm2200P:cmdEdit').disabled = false;
        d.getElementById('frm2200P:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;

        enabledDisabled(true);

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
    return;
    }

    function editForm()
    {
        d.getElementById('frm2200P:cmdValidate').disabled = false;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2200P:cmdEdit').disabled = true;
        d.getElementById('frm2200P:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;

        enabledDisabled(false);
        d.getElementById('frm2200P:txtTIN1').disabled = true;
        d.getElementById('frm2200P:txtTIN2').disabled = true;
        d.getElementById('frm2200P:txtTIN3').disabled = true;
        d.getElementById('frm2200P:txtBranchCode').disabled = true; 
    }

  var disableElem = true;
  var enableElem = false;
    function enabledDisabled(param)
    {
        d.getElementById('frm2200P:amendedRtn_1').disabled = param;
        d.getElementById('frm2200P:amendedRtn_2').disabled = param;
        d.getElementById('frm2200P:txtMonth1').disabled = param;
        d.getElementById('frm2200P:txtDate').disabled = param;
        d.getElementById('frm2200P:txtForYr').disabled = param;
        d.getElementById('frm2200P:txtSheets').disabled = param;
        d.getElementById('frm2200P:txtTIN1').disabled = param;
        d.getElementById('frm2200P:txtTIN2').disabled = param;
        d.getElementById('frm2200P:txtTIN3').disabled = param;
        d.getElementById('frm2200P:txtBranchCode').disabled = param;
        d.getElementById('frm2200P:txtRDOCode').disabled = param;
        d.getElementById('frm2200P:txtLineBus').disabled = param;
        d.getElementById('frm2200P:taxpayerName').disabled = param;
        d.getElementById('frm2200P:txtTelNum').disabled = param;
        d.getElementById('frm2200P:txtAddress').disabled = param;
        d.getElementById('frm2200P:txtZipCode').disabled = param;
        d.getElementById('frm2200PoptRegion').disabled = param;
        d.getElementById('frm2200PoptProvince').disabled = param;
        d.getElementById('frm2200PoptCity').disabled = param;
        d.getElementById('frm2200P:txtPlaceofProd').disabled = param;
        d.getElementById('frm2200PoptRegion1').disabled = param;
        d.getElementById('frm2200PoptProvince1').disabled = param;
        d.getElementById('frm2200PoptCity1').disabled = param;
        d.getElementById('frm2200P:txtPlaceofRem').disabled = param;
        d.getElementById('frm2200P:optTreaty_1').disabled = param;
        d.getElementById('frm2200P:optTreaty_2').disabled = param;
        d.getElementById('frm2200P:txtTax21A').disabled = param;
        d.getElementById('frm2200P:txtTax21B').disabled = param;
        d.getElementById('frm2200P:txtTax21C').disabled = param;

        if(d.getElementById('frm2200P:optTreaty_1').checked){
            d.getElementById('frm2200P:lstTaxTreaty').disabled = param;
        }

        d.getElementById('frm2200P:chkPymntManner_1').disabled = param;
        d.getElementById('frm2200P:chkPymntManner_2').disabled = param;

        if( d.getElementById('frm2200P:chkPymntManner_2').checked){
            d.getElementById('frm2200P:txtOthMannerofPymnt').disabled = param;
        }

        d.getElementById('frm2200P:btnSchedule1').disabled = param;
        d.getElementById('frm2200P:txtTax17A').disabled = param;
        d.getElementById('frm2200P:txtTax17B').disabled = param;
        d.getElementById('frm2200P:txtTax23A').disabled = param;
        d.getElementById('frm2200P:txtTax19').disabled = param;

        if(!param) {
            if(d.getElementById('frm2200P:amendedRtn_1').checked) {
                d.getElementById('frm2200P:txtTax19').disabled = false;
            } else {
                d.getElementById('frm2200P:txtTax19').disabled = true;
            }
        }
    disableElem;
    enableElem;
    }
  
  
  
    function blockLetterInt(e) {
        var number = e.value;
        if(isNaN(number)) {
            e.value = "";
        } else {
            e.value = '' + number;
        }
    }
  
  function initialValidateBeforeSave() {
    var dt = new Date();
    var isLeap = new Date(document.getElementById('frm2200P:txtForYr').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm2200P:txtMonth1').selectedIndex==1 && document.getElementById('frm2200P:txtDate').value>28) {
      alert("Filing year is not a leap year.");
      return;
    }
    
    if (isLeap && document.getElementById('frm2200P:txtMonth1').selectedIndex==1 && document.getElementById('frm2200P:txtDate').value>29) {
      alert("Invalid date entry.");
      return;
    }
    
    if(d.getElementById('frm2200P:txtDate').value == "" || d.getElementById('frm2200P:txtDate').value*1 == 0)
        {
            alert("Please enter valid day on item 1.");
            return;
        }
        if(d.getElementById('frm2200P:txtForYr').value == "")
        {
            alert("Please enter valid year on item 1.");
            return;
        }
        
        if(d.getElementById('frm2200P:txtForYr').value*1 < 1900)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }
        if(d.getElementById('frm2200P:txtDate').value*1 > 31 || d.getElementById('frm2200P:txtDate').value == "")
        {
            alert("Please indicate a valid Day.")
            return;
        }
    if( (d.getElementById('frm2200P:txtTIN1').value == "" || d.getElementById('frm2200P:txtTIN2').value == "" || d.getElementById('frm2200P:txtTIN3').value == "" || d.getElementById('frm2200P:txtBranchCode').value == "")  )
    {
      alert("Please enter a valid TIN number on Item 4.");
      return false;
    } 
    if ((d.getElementById('frm2200P:txtRDOCode').value == "000")) {
      alert("Please enter a valid RDO Code on Item 5.");
      return false;
    }
    if( (d.getElementById('frm2200P:taxpayerName').value == "")  )
    {
      alert("Please enter a valid Taxpayer Name on Item 7.");
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
  $('.printSignFooterClass').css({ 'align':'center', 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always', 'background':'#ffffff' });  
  $('.printSignFooterClass table').css({ 'width':'98% !important', 'max-width':'98% !important' }); 
  $('.printSignFooterClass td, .printSignFooterClass tr').css({ 'border':'1px !important' }); 
  $('.printSignFooterClass input, .printSignFooterClass select .printSignFooterClass label').css({ 'border':'0.1px !important', 'font-family': 'Arial, Helvetica, sans-serif !important', 'font-size': '7px !important', 'padding': '1px !important' });  
  $('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
  
  $('#formPaper').css({'border':'#000 3px solid' });
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
       
      
    }
    } 
    
    //hideSchedulesOnPreview();
    $('.printButtonClass').hide();
    $("#formPaper").show();
    $('#modalSched1').css({ 'display':'none' });

    window.print();

    $('.printButtonClass').show();
    $("#formPaper").show();
     $("#modalSched1").hide();
    $('#formPaper').css({'border':'#a7a7a7 1px solid','margin-top':'0px' });
    $('.imgClass').css({ 'display':'none'});

  
} 

function printSchedules() {

  $('#bg').hide(); 
  $('.printSignFooterClass').css({ 'align':'center', 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'avoid', 'background':'#ffffff' }); 
  $('.printSignFooterClass table').css({ 'width':'98% !important', 'max-width':'98% !important' }); 
  $('.printSignFooterClass td, .printSignFooterClass_2200M tr').css({ 'border':'1px !important' }); 
  $('.printSignFooterClass input, .printSignFooterClass_2200M select .printSignFooterClass_2200M label').css({ 'border':'0.1px !important', 'font-family': 'Arial, Helvetica, sans-serif !important', 'font-size': '10px !important', 'padding': '1px !important' });   
  
  $('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
  $('body').css('background','#FFF');
  
  $('#formPaper').css({'max-width':'8.3in !important', 'border':'#000 3px solid' });
  $('#wrapper').css({'max-width':'8.3in !important'});
  $('#container').css({'max-width':'8.3in !important'});  
  
    var elem = document.getElementById('frmMain').elements;
    for(var i = 0; i < elem.length; i++) {      
    if (elem[i].type != 'hidden') { // && elem[i].type != 'undefined' 
      if (elem[i].type == 'text') {
          document.getElementById(elem[i].id).style.height="13px";
        document.getElementById(elem[i].id).style.fontSize="8px";       
        document.getElementById(elem[i].id).disabled = false;
        document.getElementById(elem[i].id).readOnly = true;
        document.getElementById(elem[i].id).style.backgroundColor = '#FFFFFF';
        document.getElementById(elem[i].id).style.color = '#000000';
      }       
      if (elem[i].type == 'radio' || elem[i].type == 'checkbox') { 
        document.getElementById(elem[i].id).disabled = true;
        document.getElementById(elem[i].id).style.height="10px";
        document.getElementById(elem[i].id).style.fontSize="8px";
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
  
  $('#spanSchedules').find('input').css({
    "background":"#FFF", "color":"#000"
  }); 
  
  showSchedulesOnPreview();
}   

function showSchedulesOnPreview() {
    document.getElementById('spanPage1').style.display = "none";

        $('#spanSchedules').show('blind');    
}

function hideSchedulesOnPreview() {
    document.getElementById('spanPage1').style.display = 'block'; 
      $('#spanSchedules').hide('blind');
}
function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
               
                var data = form.serialize();
                save('2200P',data);
                
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
        saveAndExit('2200P',data);
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

        submitAndSave('2200P', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2200P';
    } 
</script>
@endsection