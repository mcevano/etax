@extends('layouts.app')
@section('title', '| BIR Form No. 2200AN')

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
        <button type="button" class="btn btn-danger btn-exit" id="2200AN" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="2200AN" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='2200AN' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 856px; ">
                <div id="formPaper">
                    <table width="856" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="856" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
                                    <tr>
                                        <td width="82"  style='padding:0px;' valign="middle" align="center">                    
                        <p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p>
                      </td>
                                        <td width="158" valign="middle">
                                           <label face="Arial" size="1px">Republika ng Pilipinas
                                            <br/>Kagawaran ng Pananalapi
                                            <br/>Kawanihan ng Rentas Internas</label>
                                        </td>
                                        <td width="0" align="center">
                                            <font size="4px" style="font-weight:bold;">EXCISE TAX RETURN
                      <br/>for AUTOMOBILES &
                      <br/>NON-ESSENTIAL GOODS</font>
                                        </td>
                                        <td width="145" valign="center">
                                            <font face="Arial" size="1px">BIR Form No.<br/></font>
                                            <font face="Arial" size="6px">2200-AN<br/></font>
                                            <font face="Arial" size="1px">October 2002 (ENCS)</font>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="850" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="336" valign="top" class="tblFormTd">
                                            <table width="254" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="23"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td colspan="2"><font size="1" style="font-size: 11px;">Date (MM/DD/YYYY)</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td width="100%">
                                                        <font color="black" face="Arial" size="2">
                                                            <select class="iceSelOneMnu input" id="frm2200AN:txtMonth1" name="frm2200AN:txtMonth1" size="1">
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
                                                        <input class="iceInpTxt input" id="frm2200AN:txtDate" maxlength="2" name="frm2200AN:txtDate" size="1" style="" type="text" value="" onkeypress="return wholenumber(this, event)" />
                                                        <input class="iceInpTxt input" id="frm2200AN:txtForYr" maxlength="4" name="frm2200AN:txtForYr" size="3" style="" type="text" value="" onkeypress="return wholenumber(this, event)" />
                                                    </td>
                                                    <td width="25">&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="183" valign="top" class="tblFormTd">
                                            <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm2200AN:j_id217" >
                                                            <div align="center" style="padding: 1px 0 1px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0" >
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="Y" name="frm2200AN:amendedRtn" id="frm2200AN:amendedRtn_1" onclick="d.getElementById('frm2200AN:txtTax19').disabled = false;" disabled="disabled" /><label for="frm2200AN:j_id217:_1" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" value="N"  name="frm2200AN:amendedRtn" id="frm2200AN:amendedRtn_2" onclick="d.getElementById('frm2200AN:txtTax19').disabled = true; d.getElementById('frm2200AN:txtTax19').value='0.00'; compute20();" disabled="disabled" checked="checked" /><label for="frm2200AN:j_id217:_2" style="font-size:12px;" >No</label></td>
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
                                                    <td><input type="text" value="0" style="text-align: right;" size="4" name="frm2200AN:txtSheets" maxlength="2" id="frm2200AN:txtSheets" onkeypress="return wholenumber(this, event)" /></td>
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
                                            <table width="850" height="0px" border="0" cellpadding="0" cellspacing="0">
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
                                <table style="width: 850" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="250" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;4&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="{{$company->tin1}}"  size="2" name="frm2200AN:txtTIN1" maxlength="3" id="frm2200AN:txtTIN1" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin2}}"  size="2" name="frm2200AN:txtTIN2" maxlength="3" id="frm2200AN:txtTIN2" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin3}}"  size="2" name="frm2200AN:txtTIN3" maxlength="3" id="frm2200AN:txtTIN3" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin4}}"  size="2" name="frm2200AN:txtBranchCode" maxlength="3" id="frm2200AN:txtBranchCode" onkeypress="return letternumber(event)"/>
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="132" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                    <td id="rdoSelect">
                                                        <select class='iceSelOneMnu' id='frm2200AN:txtRDOCode' disabled name='frm2200AN:txtRDOCode' size='1' >
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
                                                        <font size="1" style="font-size: 11px;">Line of Business/Occupation&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" disabled value="{{$company->line_business}}"  size="30" name="frm2200AN:txtLineBus" maxlength="30" id="frm2200AN:txtLineBus" onblur="return capital(this, event)"/>
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
                                <table width="850" border="0" cellspacing="0" cellpadding="0" class="tblForm">
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
                                                                <td><input type="text" value="{{$company->registered_name}}" disabled size="70" name="frm2200AN:txtTaxpayerName" maxlength="70" id="frm2200AN:txtTaxpayerName" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="157" valign="top" class="tblFormTd">
                                            <table width="149" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="149"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font><font size="1" style="font-size: 11px;">Telephone
                                                            Number</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" value="{{$company->tel_number}}" disabled size="15" name="frm2200AN:txtTelNum" maxlength="20" id="frm2200AN:txtTelNum" onkeypress="return wholenumber(this, event)" />
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
                                <table width="850" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="582" valign="top" class="tblFormTd">
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
                                                                <td><input type="text" value="{{$company->address}}" disabled size="70" name="frm2200AN:txtAddress" maxlength="70" id="frm2200AN:txtAddress" onblur="return capital(this, event)"/></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="158" valign="top" class="tblFormTd">
                                            <table width="148" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="148"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font><font size="1" style="font-size: 11px;">Zip
                                                            Code</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" value="{{$company->zip_code}}" disabled  size="12" name="frm2200AN:txtZipCode" maxlength="12" id="frm2200AN:txtZipCode" onkeypress="return wholenumber(this, event)" />
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top" class="tblFormTd">
                                            <table border="0" cellpadding="0" cellspacing="0" width="850">
                                                <tr>
                                                    <td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">11&nbsp; &nbsp;</font></strong></font></td>
                                                    <td width="28%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Region<br /></font>
                                                        <select id="frm2200ANoptRegion" name="frm2200ANoptRegion" size="1" style="width: 160px" onchange="getProvince(this.value, 'frm2200ANoptProvince', 'frm2200ANoptCity')">
                                                            <option value="00">(Select Region)</option>
                                                        </select>
                                                    </td>
                                                    <td width="25%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Province<br /></font>
                                                        <select id="frm2200ANoptProvince" name="frm2200ANoptProvince" size="1" style="width: 155px" onchange="getCity('frm2200ANoptRegion', 'frm2200ANoptProvince', 'frm2200ANoptCity')">
                                                            <option value="00">(Select Province)</option>
                                                        </select>
                                                    </td>
                                                    <td width="24%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">City<br /></font>
                                                        <select id="frm2200ANoptCity" name="frm2200ANoptCity" size="1" style="width: 150px">
                                                            <option value="00">(Select City)</option>
                                                        </select>
                                                    </td>
                                                    <td width="20%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Place of Production<br /></font>
                                                        <input class="iceInpTxt input" id="frm2200AN:txtPlaceofProd" maxlength="60" name="frm2200AN:txtPlaceofProd" size="15" style="background-color: white; color: black" type="text" value="" onblur="return capital(this, event)"/>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top" class="tblFormTd">
                                            <table border="0" cellpadding="0" cellspacing="0" width="850"><tr><td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">12&nbsp; &nbsp;</font></strong></font></td>
                                                    <td width="28%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Region<br /></font>
                                                        <select id="frm2200ANoptRegion1" name="frm2200ANoptRegion1" size="1" style="width:160px" onchange="getProvince(this.value, 'frm2200ANoptProvince1', 'frm2200ANoptCity1')">
                                                            <option value="00">(Select Region)</option>
                                                        </select>
                                                    </td>
                                                    <td width="25%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Province<br /></font>
                                                        <select id="frm2200ANoptProvince1" name="frm2200ANoptProvince1" size="1" style="width: 155px" onchange="getCity('frm2200ANoptRegion1', 'frm2200ANoptProvince1', 'frm2200ANoptCity1')">
                                                            <option value="00">(Select Province)</option>
                                                        </select>
                                                    </td>
                                                    <td width="24%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">City<br /></font>
                                                        <select id="frm2200ANoptCity1" name="frm2200ANoptCity1" size="1" style="width: 150px">
                                                            <option value="00">(Select City)</option>
                                                        </select>
                                                    </td>
                                                    <td width="20%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Place of Removal<br /></font>
                                                        <input id="frm2200AN:txtPlaceofRem" maxlength="60" name="frm2200AN:txtPlaceofRem" size="15" style="background-color: white; color: black" type="text" value="" onblur="return capital(this, event)"/>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top" class="tblFormTd">
                                            <table border="0" cellpadding="0" cellspacing="0" width="850"><tr><td width="20"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">13</font></strong></font></td><td width="217"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Are you availing of tax relief under&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td><td width="131"></td><td width="19"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">14</font></strong></font></td><td width="87"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">If yes, please&nbsp;&nbsp;</font></td><td width="218"></td></tr>
                                                <tr>
                                                    <td width="20">&nbsp;</td>
                                                    <td valign="top" width="217"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Special Law or International Tax Treaty?</font></td>
                                                    <td valign="top" width="131">
                                                        <fieldset id="frm2200AN:optTreaty" style="font-family: Arial, Helvetica, sans-serif; font-size : 10px;">
                                                            <table border="0" cellpadding="0" cellspacing="0" class="iceSelOneRb">
                                                                <tr>
                                                                    <td>
                                                                        <input id="frm2200AN:optTreaty_1" name="frm2200AN:optTreaty" type="radio" value="Y" onclick="changeTreaty()" />
                                                                        <label for="frm2200AN:optTreaty:_1">Yes</label>
                                                                    </td>
                                                                    <td>
                                                                        <input id="frm2200AN:optTreaty_2" name="frm2200AN:optTreaty" type="radio" value="N" onclick="changeTreaty()" />
                                                                        <label class="iceSelOneRb" for="frm2200AN:optTreaty:_2">No</label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </fieldset>
                                                    </td>
                                                    <td width="19">&nbsp;</td>
                                                    <td valign="top" width="87">&nbsp;<font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">specify</font></td>
                                                    <td valign="top" width="218">
                                                        <select disabled="disabled" id="frm2200AN:lstTaxTreaty" name="frm2200AN:lstTaxTreaty" size="1" style="background-color: white; font-family: Arial, Helvetica, sans-serif;">
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
                                        <td colspan="2" valign="top" class="tblFormTd"><table border="0" width="850">
                                                <tr>
                                                    <td width="66"><font color="black" face="Arial, Helvetica, sans-serif" size="2"><b>Part II</b></font></td>
                                                    <td align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>MANNER OF PAYMENT</b></font><font color="black" face="Arial, Helvetica, sans-serif" size="2">&nbsp;</font></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top" class="tblFormTd">
                                            <table width="850" height="0px" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">15</font></strong></font></td>
                                                    <td colspan="2" width="54%">
                                                        <fieldset id="frm2200AN:chkPymntManner"  style="font-family: Arial, Helvetica, sans-serif; font-size : 10px;">
                                                            <table border="0" cellpadding="0" cellspacing="0" class="iceSelOneRb">
                                                                <tr>
                                                                    <td>
                                                                        <input id="frm2200AN:chkPymntManner_1" name="frm2200AN:chkPymntManner"  type="radio" value="Removal" onclick="changeMannerOfPayment()" />
                                                                        <label class="iceSelOneRb" for="frm2200AN:chkPymntManner:_1" style="font-size: 11px;">Payment on Actual Removal </label>
                                                                    </td>
                                                                    <td>
                                                                        <input id="frm2200AN:chkPymntManner_2" name="frm2200AN:chkPymntManner"  type="radio" value="Deposit" onclick="changeMannerOfPayment()" />
                                                                        <label class="iceSelOneRb" for="frm2200AN:chkPymntManner:_2" style="font-size: 11px;">Prepayment/Advance deposit/</label>
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
                                                            <input disabled="true" id="frm2200AN:txtOthMannerofPymnt" maxlength="50" name="frm2200AN:txtOthMannerofPymnt" size="25" style="background-color: white; font: 10pt Arial, Helvetica, sans-serif;" type="text" value="" onblur="return capital(this, event)"/>
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
                                <table width="850" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table width="850" border="0" cellspacing="0" cellpadding="0">
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
                                            <table width="850" border="0" cellspacing="0" cellpadding="0">
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
                                                            <!--<input type="button" class="printButtonClass" name="frm2200AN:btnSched1" id="frm2200AN:btnSched1" value="Schedule 1" onclick="showSched1()" />-->
                              <a href="#" id="frm2200AN:btnSched1" onclick="showSched1()" style="font-size: 11px;">Schedule 1</a>
                                                        </font>
                                                    </td>
                                                    <td width="163">
                                                        <div class="spacePadder"></div>
                                                    </td>
                                                    <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;">16</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" name="frm2200AN:txtTax16" maxlength="25" id="frm2200AN:txtTax16"  />
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;17</font></td>
                                                    <td><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: Balance Carried Over from Previous Return</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                                                    <td>
                                                        <div class="spacePadder"><font size="2" style="font-weight:bold;">17A</font>
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="18" name="frm2200AN:txtTax17A" maxlength="25" id="frm2200AN:txtTax17A" onblur="round(this,2); compute17C()" onkeypress="return numbersonly(this, event)" />
                                                        </div>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><font color="black" face="Arial" size="1" style="font-size: 11px;">Creditable Excise Tax, if applicable</font></td>
                                                    <td><span class="spacePadder"><font size="2" style="font-weight:bold;">17B</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="18" name="frm2200AN:txtTax17B" maxlength="25" id="frm2200AN:txtTax17B" disabled="true" />
                                                        </span></td>
                                                    <td><div align="justify"><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 11px;">17C</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200AN:txtTax17C" maxlength="25" id="frm2200AN:txtTax17C" disabled="true" />
                                                            </span></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;</font></td>
                                                    <td colspan="2"><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Net Tax Due / (Overpayment)</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font>
                                                    </td>
                                                    <td><div align="justify"><span class="spacePadder"><font size="2" style="font-weight:bold;">18</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200AN:txtTax18" maxlength="25" id="frm2200AN:txtTax18" disabled="true" />
                                                            </span></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: Payment on Returns Previously Filed for the Same Period, if amended return</font></td>
                                                    <td><span class="spacePadder"><font size="2" style="font-weight:bold;">19</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2200AN:txtTax19" maxlength="25" id="frm2200AN:txtTax19" disabled="true" onblur="compute20(); round(this,2);" />
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Tax Still Due / (Overpayment)</font></td>
                                                    <td><span class="spacePadder"><font size="2" style="font-weight:bold;">20</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200AN:txtTax20" maxlength="25" id="frm2200AN:txtTax20" disabled="true" />
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
                                                                    <td width="193" align="center"><font size="1" face="Arial" style="font-size: 11px;">Surcharge</font></td>
                                                                    <td width="191" align="center"><font size="1" face="Arial" style="font-size: 11px;">Interest</font></td>
                                                                    <td width="111" align="center"><font size="1" face="Arial" style="font-size: 11px;">Compromise</font></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td colspan="2">
                                                        <table width="609">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="161" align="center">
                                                                        <font size="2" face="Arial"><b>21A</b>
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200AN:txtTax21A" maxlength="25" id="frm2200AN:txtTax21A" onblur="round(this,2); compute21D()" onkeypress="return numbersonly(this, event)"/>
                                                                            <input type="hidden" value="" name="frm2200AN:inputSurcharge" id="frm2200AN:inputSurcharge" />
                                                                        </font>
                                                                    </td>
                                                                    <td width="161" align="center">
                                                                        <font size="2" face="Arial"><b>21B</b>
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200AN:txtTax21B" maxlength="25" id="frm2200AN:txtTax21B" onblur="round(this,2); compute21D()" onkeypress="return numbersonly(this, event)"/>
                                                                        </font>
                                                                    </td>
                                                                    <td width="174" align="center">
                                                                        <font size="2" face="Arial"><b>21C</b>
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200AN:txtTax21C" maxlength="25" id="frm2200AN:txtTax21C" onblur="round(this,2); compute21D()" onkeypress="return numbersonly(this, event)"/>
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <div class="spacePadder" style="margin-top: 20px;">
                                                            <font size="2" style="font-weight:bold;">21D</font>&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200AN:txtTax21D" maxlength="25" id="frm2200AN:txtTax21D" disabled="true" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;22</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Amount Payable </font></td>
                                                    <td>
                                                        <div class="spacePadder">
                                                            <font size="2" style="font-weight:bold;margin-right: 17px;">22</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200AN:txtTax22" maxlength="25" id="frm2200AN:txtTax22" disabled="true" class="iceInpTxt-dis" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: &nbsp;&nbsp;&nbsp; Payment Made Today</font></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                                        <table width="619">
                                                            <tbody>
                                                                <tr>
                                                                    <td ><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tax Payment / Deposit</font></td>
                                                                    <td align="center">&nbsp;</td>
                                                                    <td align="center"><span class="spacePadder"><font size="2" style="font-weight:bold;">23A</font>&nbsp;
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200AN:txtTax23A" maxlength="25" id="frm2200AN:txtTax23A" onblur="round(this,2); compute23C()" onkeypress="return numbersonly(this, event)" />
                                                                        </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td ><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Penalties (from 21D)</font></td>
                                                                    <td align="center">
                                                                        <input id="frm2200AN:PayPenalties" name="frm2200AN:PayPenalties" type="checkbox" onclick="payPenalties()" />
                                                                        <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Pay Penalties?</font>
                                                                    </td>
                                                                    <td align="center"><font size="2" face="Arial"><b>23B</b>&nbsp;
                                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200AN:txtTax23B" maxlength="25" id="frm2200AN:txtTax23B" disabled="true" />
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table></td>
                                                    <td valign="bottom"><span class="spacePadder"><font size="2" style="font-weight:bold;">23C</font>&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200AN:txtTax23C" maxlength="25" id="frm2200AN:txtTax23C" disabled="true" class="iceInpTxt-dis" />
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Balance to be Carried Over to Next Return</font></td>
                                                    <td><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 17px;">24</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200AN:txtTax24" maxlength="25" id="frm2200AN:txtTax24" disabled="true" class="iceInpTxt-dis" />
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
                <div class="imgClass" align='center' style="display:none; width:850px !important;">
                  <table  style="border-top: 3px solid black; font-family:arial; font-size:12px; text-align: center; table-layout: fixed; background-color: white;">
                    <col width="60%" />
                      <col width="40%" />
                      <tr>
                      <td colspan="2"><div style="text-align: left;"><b>PART IV</b>
                        </div> 
                      </td>
                      </tr>
                      <tr>
                        <td colspan="2"><div style="margin: 4px; text-align: left;">
                          <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge and
                          <br/>belief, is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority
                          <br/>thereof.</div></td>
                      </tr>
                      <tr>
                        <td><b>25</b>____________________________________________________
                          <br/>Signature over Printed Name of Taxpayer/
                          <br/>Taxpayer Authorized Representative
                          <br/>&nbsp;</td>
                        <td><b>26</b>_____________________________________
                          <br/>Title/Position of Signatory
                          <br/><br/>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>______________________________________________________
                          <br/>TIN of Tax Agent (if applicable)</td>
                        <td>_______________________________________
                          <br/>Tax Agent Accreditation No.(if applicable)</td>
                      </tr>
                  </table>
                </div>
                <div class="imgClass" align='center' style="display:none; width:850px !important;">
                  <img id="frm2200AN:jurat" src="{{ asset('images/bottom_img/2200AN_new.jpg') }}" width="850"/>
                </div>
                <div class="imgClass" align='center' style="display:none; width:850px !important;">
                  <table style="font-size:12px; text-align: left; vertical-align: top;background-color: white;">
                    <tr>
                      <td>&nbsp;Machine Validation/Revenue Official Receipt Details (If not filed with the bank)<br/><br/><br/><br/><br/></td>
                    </tr>
                  </table>
                  <div style="font-size:10px;">&nbsp;</div>
                </div>
                                <table width="850" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table width="850" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr valign="middle">
                                                                    <td width="94"></td>
                                                                    <td width="662">
                                                                        <div id="frm2200AN:j_id743">
                                                                            <div align="center">
                                                                                @if($action != 'view')
                                                                                <input type="button" value="Validate" style="width: 100px;" name="frm2200AN:cmdValidate" id="frm2200AN:cmdValidate" onclick="validateForm()" />
                                                                                <input type="button" value="Edit" style="width: 100px;" name="frm2200AN:cmdEdit" id="frm2200AN:cmdEdit" onclick="editForm()"/>
                                                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2200AN:btnFinalCopy" id="frm2200AN:btnFinalCopy" onclick="submitForm();" />
                                                                                @else
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                                @endif
                                                                              <div id="msg" class="printButtonClass" style="display:none;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td width="94"></td>
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
                                    <div class="footer footer2200AN" style="padding:6px; text-align: center; font-size: 11px; background-color: white;">
                                        <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                                    </div>
                                </td>
                        </tr>
                    </table>

                    <div id="DummyTxt" style='display:none;'>  </div>

                </div>
            </div>
        </div>
        <!--Start Modal for Schedule 1-->
        <div id="modalSched1" class="printSignFooterClass aBox" style="width:94%; display:none; height:90%; position:relative; top:3%; left:3%; right:auto; overflow-y:auto; background:#fff;z-index: 1;" align="left"> 
      <table style="width:100% " class="tblSched1_2200AN" border="1">

                    <tr class="modalHeader">
                        <td colspan="2" style="text-align: left;font-weight: bold">
              &nbsp;&nbsp;&nbsp;SCHEDULE 1 
            </td>
                        <td colspan="7" style="text-align: center;font-weight: bold">
              SUMMARY OF REMOVALS AND EXCISE TAX DUE ON AUTOMOBILES AND NON-ESSENTIAL PRODUCTS CHARGEABLE AGAINST PAYMENTS
            </td>           
                    </tr>         
                <tr>
                    <td colspan="9">&nbsp;</td>
                </tr>       
                <tr class="modalColumnHeader">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="2" align="center">Number of Units</td>
                    <td colspan="2" align="center">Total Selling Price/Market Value</td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="modalColumnHeader">
                    <td width="8.2%" align="center">ATC</td>
                    <td width="10%" align="center">TYPES OF AUTO MOBILES</td>
                    <td width="14.8%" align="center">NET MANUFACTURER'S / IMPORTER'S PRICE BRACKET</td>
                    <td width="22%" align="center">Tax Rate<br/>(A)</td>
                    <td width="9%" align="center">Exempt/ Underbond<br/>(B)</td>
                    <td width="9%" align="center">Taxable<br/>(C)*</td>
                    <td width="9%" align="center">Exempt/ Underbond<br/>(D)</td>
                    <td width="9%" align="center">Taxable<br/>(E)*</td>
                    <td width="9%" align="center">Basic Excise Tax Due</td>
                </tr>

                <tbody>
                    <table class="modalContent" id="tempATCListx1" width="100%" border="1">

                    </table>
                </tbody>
                <br>
        <table width="100%" border="1">
          <tr class="modalColumnHeader">
            <td width="2.7%" align="center">ATC</td>
            <td colspan="2" width="26.6%" align="center">NON-ESSENTIAL PRODUCTS</td>
            <td width="21%" align="center">Tax Rate</td>
            <td width="9%" align="center">Exempt/ Underbond</td>
            <td width="9%" align="center">Taxable</td>
            <td width="9%" align="center">Exempt/ Underbond</td>
            <td width="9%" align="center">Taxable</td>
            <td width="9%" align="center">Basic Excise Tax Due</td>       
          </tr>
        </table>
                <tbody>
                    <table class="modalContent" id="tempATCListx2" width="100%" border="1">

                    </table>
                </tbody>
            </table>   
            <br>       
            <table width="100%" class="tblSched1_2200AN" border="1">
                <tr class="modalColumnHeader">
                    <td width="3.2%" align="center">&nbsp;</td>
                    <td width="5%" align="center">ATC</td>
                    <td width="9%" colspan="2" align="center">OTHERS</td>
                    <td width="9%" align="center">Tax Rate</td>
                    <td width="9%" align="center">Exempt/ Underbond </td>
                    <td width="9%" align="center">Taxable</td>
                    <td width="9%" align="center">Exempt/ Underbond</td>
                    <td width="9%" align="center">Taxable</td>
                    <td width="9%" align="center">Basic Excise Tax Due</td>
                </tr>
                <tbody>
                    <table id="frm2200ANadditionalSched1" width="100%" border="1">
                        <tr>
                            <td width="1%" align="center"><input type="checkbox" name="frm2200AN:sched1Chk0" id="frm2200AN:sched1Chk0" value="1" /></td>
                            <td width="1%" align="center"><input type="text" name="frm2200AN:sched1Atc[]" id="frm2200AN:sched1Atc0" value="" maxlength="5" size="3" /></td>
                            <td colspan="2" width="1%" align="center"><input type="text" name="frm2200AN:sched1Other0" id="frm2200AN:sched1Other0" value="" size="15" /></td>
                            <td width="1%" align="center"><input type="text" name="frm2200AN:sched1TaxRate0" id="frm2200AN:sched1TaxRate0" style="text-align: right" value="0.00" size="15" onblur="computeExciseDueSched1(0)" onkeypress="return numbersonly(this, event)" /></td>
                            <td width="1%" align="center"><input type="text" name="frm2200AN:sched1ExemptA0" id="frm2200AN:sched1ExemptA0" style="text-align: right" value="" size="15" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                            <td width="1%" align="center"><input type="text" name="frm2200AN:sched1TaxableA0" id="frm2200AN:sched1TaxableA0" style="text-align: right" value="" size="15" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                            <td width="1%" align="center"><input type="text" name="frm2200AN:sched1ExemptB0" id="frm2200AN:sched1ExemptB0" style="text-align: right" value="0.00" size="15" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                            <td width="1%" align="center"><input type="text" name="frm2200AN:sched1TaxableB0" id="frm2200AN:sched1TaxableB0" style="text-align: right" value="0.00" size="15" onblur="round(this,2); computeExciseDueSched1(0)" onkeypress="return numbersonly(this, event)" /></td>
                            <td width="1%" align="center"><input type="text" name="frm2200AN:sched1ExciseTaxDue0" id="frm2200AN:sched1ExciseTaxDue0" style="text-align: right; background-color: rgb(220, 220, 220)" value="0.00" size="15" onkeypress="return numbersonly(this, event)" disabled /></td>
                        </tr>
                    </table>
                </tbody>
            </table>
            <table width="100%">
                <tr>
                    <td style="text-align:right" colspan="2">
                        <input type="button" class="printButtonClass" name="frm2200AN:btnAdd" id="frm2200AN:btnAdd" value="     Add     " onClick="addFieldsForSched1()" />&nbsp;&nbsp;&nbsp;
                        <input type="button" class="printButtonClass" name="frm2200AN:btnDelete" id="frm2200AN:btnDelete" value="   Delete   " onClick="deleteFieldForSched1()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left">
                        <b>TOTAL TAX DUE</b>
                    </td>
                    <td align="right">
                        <input type="text" name="frm2200AN:totalTaxDue" id="frm2200AN:totalTaxDue" style="text-align: right; background-color: rgb(220, 220, 220)" size="16" value="0.00" disabled />
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input type="button" class="printButtonClass" name="frm2200AN:btnOK" id="frm2200AN:btnOK" value="       OK       " onClick="sched1OK()" />&nbsp;&nbsp;&nbsp;
                       
                    </td>
                </tr>
            </table>
        </div>
      
    <div id="hiddenEmail" style="display:none;"  > 
          <input id="txtEmail" value="{{$company->email_address}}" class="emailClass" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60"   />
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
<script src="{{ asset('js/forms/2200AN.js') }}" ></script>
<script type="text/javascript">
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
    var tempListATCSched1 = 0;
    var tempListATCSched2 = 0;
    var isViewUploaded = false;

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

        d.getElementById('frm2200AN:txtTIN1').disabled = true;
        d.getElementById('frm2200AN:txtTIN2').disabled = true;
        d.getElementById('frm2200AN:txtTIN3').disabled = true;
        d.getElementById('frm2200AN:txtBranchCode').disabled = true;
    }
    
    function rdoPropertyJS(rdoCode, description) 
    {
        this.rdoCode=rdoCode;
        this.description=description;
    }
        
    var rdoList = new Array();


    /*----------------------------------*/
    var d=document,XMLBGFile='',data='',XMLFile='',XMLATCFile='',XMLRegionFile='',XMLProvinceFile='',XMLCityFile='',msg = d.getElementById('msg'),flag1=true;
    var loader=d.getElementById('loader');
    /*----------------------------------*/      
    
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
            
            //Ensure that before writing to atcPropertyJS the formType 2200AN is traceable in atcStr
            if (atcStr.indexOf('2200AN') >= 0) {
                var atcValues = atcStr.split('~');              
                
                var formType = "2200AN";
                var atcCode = atcValues[0];
                var description = atcValues[1];
                var rate = atcValues[2];
                var category = atcValues[3];
                
                var base = atcValues[4];
                var compType = atcValues[5];
                var constTaxDue = atcValues[6];
                var minimum = atcValues[7];
                var maximum = atcValues[8];
                
                var objATC = new atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum);
                atcList[j] = objATC; 
                j++;
                //alert('2200AN successfully created array #'+i);
                
            } else {        
                //alert('2200AN not found in array #'+i);
                continue;
            }
        }                   
    }   
        
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
    
    
    function setInputTextControl_HorizontalAlignment(id,align) {
        //d.getElementById(id).textIndent = parseInt(align);
        d.getElementById(id).style.textAlign = "right";
    }
    function setInputTextControl_NumberFormatter(id,limit,deci) {
        d.getElementById(id).size = parseInt(limit);
        d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed( parseInt(deci) );      
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

        if (loadWhere != null && loadWhere != "") {
            document.getElementById("response").innerHTML=xmlHTTP.responseText;

                flag1=false;
                var count1=0;
                var responses1 = d.getElementById('response').getElementsByTagName('div');
                var sPar1 = 'frm2200AN:sched1Chk';      
                
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
            
            if (gIsReadOnly) {
                d.getElementById('frm2200AN:cmdValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
            } 

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
                    if(elem[i].id == 'frm2200AN:txtTaxpayerName' || elem[i].id == 'frm2200AN:txtLineBus' || elem[i].id == 'frm2200AN:txtAddress'){
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
                    else{
                        elem[i].value = fieldVal[1]; //all select-one and text values               
                    }

                    if ( String(elem[i].id).indexOf('frm2200ANoptRegion') != -1 || String(elem[i].id).indexOf('frm2200ANoptProvince') != -1  || String(elem[i].id).indexOf('frm2200ANoptRegion1') != -1  || String(elem[i].id).indexOf('frm2200ANoptProvince1') != -1 ) {
                        elem[i].onchange();         
                    }
                }               
                
                if (elem[i].type == 'radio') {
                    var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');             
                    if (rdoVal[1] == 'true') {
                        elem[i].checked = rdoVal[1];
                        elem[i].onclick();
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
    
    function init()
    {      
        var year = new Date();
        d.getElementById('frm2200AN:txtMonth1').selectedIndex = year.getMonth();
        dd = "" + year.getDate();
        if (dd.length == 1) 
        { 
            dd = "0" + dd; 
            d.getElementById('frm2200AN:txtDate').value = dd;
        }
        else
        {
            d.getElementById('frm2200AN:txtDate').value = year.getDate();
        }
        d.getElementById('frm2200AN:txtForYr').value = year.getFullYear();
    
        d.getElementById('frm2200AN:amendedRtn_1').disabled = false;
        d.getElementById('frm2200AN:amendedRtn_2').disabled = false;
       
        d.getElementById('frm2200AN:lstTaxTreaty').disabled = true;

        d.getElementById('frm2200AN:txtTax16').disabled = true;
        d.getElementById('frm2200AN:txtTax17B').disabled = true;
        d.getElementById('frm2200AN:txtTax17C').disabled = true;
        d.getElementById('frm2200AN:txtTax18').disabled = true;
        d.getElementById('frm2200AN:txtTax19').disabled = true;
        d.getElementById('frm2200AN:txtTax20').disabled = true;
        d.getElementById('frm2200AN:txtTax21D').disabled = true;
        d.getElementById('frm2200AN:txtTax22').disabled = true;
        d.getElementById('frm2200AN:txtTax23B').disabled = true;
        d.getElementById('frm2200AN:txtTax23C').disabled = true;
        d.getElementById('frm2200AN:txtTax24').disabled = true;

        @if($action != 'view')
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2200AN:cmdEdit').disabled = true;
        d.getElementById('frm2200AN:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @endif
        changeMannerOfPayment();

        loadXMLRegion('/xml/region.xml');
        getRegion();
    
        loadXMLATC('/xml/atcCodes.xml');
        addATCList1();
        addATCList2();
        
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
        if(d.getElementById('frm2200AN:optTreaty_1').checked){
            d.getElementById('frm2200AN:lstTaxTreaty').disabled = false;
        }else {
            d.getElementById('frm2200AN:lstTaxTreaty').disabled = true;
            d.getElementById('frm2200AN:lstTaxTreaty').selectedIndex = 0;
        }
    }

    function changeMannerOfPayment()
    {
        if(d.getElementById('frm2200AN:chkPymntManner_1').checked){
            d.getElementById('frm2200AN:txtOthMannerofPymnt').disabled = true;
            d.getElementById('frm2200AN:txtOthMannerofPymnt').value = "";
            d.getElementById('frm2200AN:btnSched1').disabled = false;
            if (showFillupSched1Alert) {
                alert("Please fill up Schedule 1."); 
            }
        }else {
            d.getElementById('frm2200AN:txtOthMannerofPymnt').disabled = false;
            d.getElementById('frm2200AN:btnSched1').disabled = true;
        }
    }

    function getRegion()
    {
        var data = "<option value='00'>(Select Region)</option>";
        for(var i = 0; i < regionList.length; i++) {
            var region = regionList[i];
            data = data +
                "<option value=" + region.regionCode + ">" + region.description + "</option>";
        }
       
      
        $('#frm2200ANoptRegion').html(data);        
        $('#frm2200ANoptRegion1').html(data);
    }


    function showSched1()
    {
        if(d.getElementById('frm2200AN:chkPymntManner_1').checked){

                d.getElementById('formPaper').style.display = "none";
                $('#modalSched1').show('blind');    
                       
        }else if(d.getElementById('frm2200AN:chkPymntManner_2').checked) {
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
        //$('#modalSched1').hide('blind');
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");    
    }

    function addFieldsForSched1Reload()
    {
        var sched1Field = d.getElementById('frm2200ANadditionalSched1');
            addRow(sched1Field, sched1Fields(), 'frm2200ANadditionalSched1');    
    }   
    
    function addFieldsForSched1()
    {
        var sched1Field = d.getElementById('frm2200ANadditionalSched1');
        if(isValidDataOnSched1()){
            addRow(sched1Field, sched1Fields(), 'frm2200ANadditionalSched1');    
        }
    }

    function addRow(tbody, text, tblName) {
      
        if (tblName == 'frm2200ANadditionalSched1') {
            $('#frm2200ANadditionalSched1').append(text);   
        }
        if (tblName == 'tempATCListx1') {
            $('#tempATCListx1').append(text);   
        }           
        if (tblName == 'tempATCListx2') {
            $('#tempATCListx2').append(text);   
        }       
    }

    function deleteFieldForSched1()
    {
        var sched1Field = d.getElementById('frm2200ANadditionalSched1');
        var x = 0;
        var xFlag = false;
        while(x < sched1Field.rows.length){
            if(d.getElementById('frm2200AN:sched1Chk' + x).checked){
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

    function sched1Input(indexParam)
    {
        var sched1Field = d.getElementById('frm2200ANadditionalSched1');
        var chkBox;
        var atc;
        var other;
        var taxRate;
        var exemptA;
        var taxableA;
        var exemptB;
        var taxableB;
        var exciseTax;
        while(indexParam < sched1Field.rows.length){
            chkBox = d.getElementById('frm2200AN:sched1Chk' + ((indexParam*1) + 1));
            atc = d.getElementById('frm2200AN:sched1Atc' + ((indexParam*1) + 1));
            other = d.getElementById('frm2200AN:sched1Other' + ((indexParam*1) + 1));
            taxRate = d.getElementById('frm2200AN:sched1TaxRate' + ((indexParam*1) + 1));
            exemptA = d.getElementById('frm2200AN:sched1ExemptA' + ((indexParam*1) + 1));
            taxableA = d.getElementById('frm2200AN:sched1TaxableA' + ((indexParam*1) + 1));
            exemptB = d.getElementById('frm2200AN:sched1ExemptB' + ((indexParam*1) + 1));
            taxableB = d.getElementById('frm2200AN:sched1TaxableB' + ((indexParam*1) + 1));
            exciseTax = d.getElementById('frm2200AN:sched1ExciseTaxDue' + ((indexParam*1) + 1));

            chkBox.name = "frm2200AN:sched1Chk" + indexParam;
            chkBox.id = "frm2200AN:sched1Chk" + indexParam;
            atc.name = "frm2200AN:sched1Atc" + indexParam;
            atc.id = "frm2200AN:sched1Atc" + indexParam;
            other.name = "frm2200AN:sched1Other" + indexParam;
            other.id = "frm2200AN:sched1Other" + indexParam;
            taxRate.name = "frm2200AN:sched1TaxRate" + indexParam;
            taxRate.id = "frm2200AN:sched1TaxRate" + indexParam;
            exemptA.name = "frm2200AN:sched1ExemptA" + indexParam;
            exemptA.id = "frm2200AN:sched1ExemptA" + indexParam;
            taxableA.name = "frm2200AN:sched1TaxableA" + indexParam;
            taxableA.id = "frm2200AN:sched1TaxableA" + indexParam;
            exemptB.name = "frm2200AN:sched1ExemptB" + indexParam;
            exemptB.id = "frm2200AN:sched1ExemptB" + indexParam;
            taxableB.name = "frm2200AN:sched1TaxableB" + indexParam;
            taxableB.id = "frm2200AN:sched1TaxableB" + indexParam;
            exciseTax.name = "frm2200AN:sched1ExciseTaxDue" + indexParam;
            exciseTax.id = "frm2200AN:sched1ExciseTaxDue" + indexParam;

            indexParam++;
        }

        computeTotalSched1();
    }

    function sched1Fields()
    {
        var fields = "";
        fields = "<tr><td width='1%' align='center'><input type='checkbox' name='frm2200AN:sched1Chk" + sched1Index + "' id='frm2200AN:sched1Chk" + sched1Index + "' value='1' /></td>" +
            "<td width='1%' align='center'><input type='text' name='frm2200AN:sched1Atc[]' id='frm2200AN:sched1Atc" + sched1Index + "' value='' maxlength='5' size='3'/></td>" +
            "<td width='1%' colspan='2' align='center'><input type='text' name='frm2200AN:sched1Other" + sched1Index + "' id='frm2200AN:sched1Other" + sched1Index + "' value='' size='15'/></td>" +
            "<td width='1%' align='center'><input type='text' name='frm2200AN:sched1TaxRate" + sched1Index + "' id='frm2200AN:sched1TaxRate" + sched1Index + "' onkeypress='return numbersonly(this, event)' style='text-align: right' size='15' value='0.00' onblur='round(this,2); computeExciseDueSched1(" + sched1Index + ")' /></td>" +
            "<td width='1%' align='center'><input type='text' name='frm2200AN:sched1ExemptA" + sched1Index + "' id='frm2200AN:sched1ExemptA" + sched1Index + "' onkeypress='return numbersonly(this, event)' style='text-align: right' size='15' value='' onblur='round(this,2)' /></td>" +
            "<td width='1%' align='center'><input type='text' name='frm2200AN:sched1TaxableA" + sched1Index + "' id='frm2200AN:sched1TaxableA" + sched1Index + "' onkeypress='return numbersonly(this, event)' style='text-align: right' size='15' value='' onblur='round(this,2)' /></td>" +
            "<td width='1%' align='center'><input type='text' name='frm2200AN:sched1ExemptB" + sched1Index + "' id='frm2200AN:sched1ExemptB" + sched1Index + "' onkeypress='return numbersonly(this, event)' style='text-align: right' size='15' value='0.00' onblur='round(this,2)' /></td>" +
            "<td width='1%' align='center'><input type='text' name='frm2200AN:sched1TaxableB" + sched1Index + "' id='frm2200AN:sched1TaxableB" + sched1Index + "' onkeypress='return numbersonly(this, event)' style='text-align: right' size='15' value='0.00' onblur='round(this,2); computeExciseDueSched1(" + sched1Index + ")' /></td>" +
            "<td width='1%' align='center'><input type='text' name='frm2200AN:sched1ExciseTaxDue" + sched1Index + "' id='frm2200AN:sched1ExciseTaxDue" + sched1Index + "' onkeypress='return numbersonly(this, event)' style='text-align: right; background-color: rgb(220, 220, 220)' size='15' value='0.00' disabled /></td></tr>";
        sched1Index++;
        return fields;
    }

    function computeExciseDueSched1(index)
    {
        var taxRate = d.getElementById('frm2200AN:sched1TaxRate' + index);
        var taxBase = d.getElementById('frm2200AN:sched1TaxableB' + index);
        var total = (NumWithComma(taxRate.value) * NumWithComma(taxBase.value)) / 100;

        d.getElementById('frm2200AN:sched1ExciseTaxDue' + index).value = formatCurrency((total).toFixed(2));

        computeTotalSched1();
    }

    function computeTotalSched1()
    {
        var total = 0;

        var tmpList1 = d.getElementById('tempATCListx1');
        var x = 0;
        while(x < tmpList1.rows.length){
            total += parseFloat(NumWithComma(d.getElementById("frm2200AN:listSched1x1Due" + x).value));
            x++;
        }

        var tmpList2 = d.getElementById('tempATCListx2');
        var x = 0;
        while(x < tmpList2.rows.length){
            total += parseFloat(NumWithComma(d.getElementById("frm2200AN:listSched1x2Due" + x).value));
            x++;
        }

        var sched1Field = d.getElementById('frm2200ANadditionalSched1');
        var x = 0;
        while(x < sched1Field.rows.length){
            total = (total*1) + (NumWithComma(d.getElementById("frm2200AN:sched1ExciseTaxDue" + x).value)*1);
            x++;
        }

        d.getElementById('frm2200AN:totalTaxDue').value = formatCurrency((total).toFixed(2));
    }

    function sched1OK()
    {
        if(isValidDataOnSched1()){
            d.getElementById('frm2200AN:txtTax16').value = d.getElementById('frm2200AN:totalTaxDue').value;

            hideSched1();

            compute18();
        }
    }

    function compute17C()
    {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm2200AN:txtTax17A').value)*1) + (NumWithComma(d.getElementById('frm2200AN:txtTax17B').value)*1);

        d.getElementById('frm2200AN:txtTax17C').value = formatCurrency((total).toFixed(2));

        compute18();
    }

    function compute18()
    {
        var total = 0;

        total = (NumWithComma(d.getElementById('frm2200AN:txtTax16').value)*1) - (NumWithComma(d.getElementById('frm2200AN:txtTax17C').value)*1);

        d.getElementById('frm2200AN:txtTax18').value = formatCurrency((total).toFixed(2));

        compute20();
    }

    function compute20()
    {
        var total = 0;

        total = (NumWithComma(d.getElementById('frm2200AN:txtTax18').value)*1) - (NumWithComma(d.getElementById('frm2200AN:txtTax19').value)*1);

        d.getElementById('frm2200AN:txtTax20').value = formatCurrency((total).toFixed(2));

        compute22();
    }
    function compute21D()
    {
        d.getElementById('frm2200AN:txtTax21D').value = formatCurrency((NumWithComma(d.getElementById('frm2200AN:txtTax21A').value)*1) + (NumWithComma(d.getElementById('frm2200AN:txtTax21B').value)*1) + (NumWithComma(d.getElementById('frm2200AN:txtTax21C').value)*1));
        compute22();
        payPenalties();
    }
    function payPenalties()
    {
        if(d.getElementById('frm2200AN:PayPenalties').checked){
            d.getElementById('frm2200AN:txtTax23B').value = d.getElementById('frm2200AN:txtTax21D').value;
        }
        else{
            d.getElementById('frm2200AN:txtTax23B').value = "0.00";
        }
        compute23C();
    }
    function compute22()
    {
        var total = 0;

        total = (NumWithComma(d.getElementById('frm2200AN:txtTax20').value)*1) + (NumWithComma(d.getElementById('frm2200AN:txtTax21D').value)*1);
        //total = (NumWithComma(d.getElementById('frm2200AN:txtTax20').value)*1);

        d.getElementById('frm2200AN:txtTax22').value = formatCurrency((total).toFixed(2));

        compute24();
    }

    function compute23C()
    {
        var total = 0;

        total = (NumWithComma(d.getElementById('frm2200AN:txtTax23A').value)*1) + (NumWithComma(d.getElementById('frm2200AN:txtTax23B').value)*1);

        d.getElementById('frm2200AN:txtTax23C').value = formatCurrency((total).toFixed(2));

        compute24();
    }

    function compute24()
    {
        var total = 0;

        total = (NumWithComma(d.getElementById('frm2200AN:txtTax22').value)*1) - (NumWithComma(d.getElementById('frm2200AN:txtTax23C').value)*1);

        d.getElementById('frm2200AN:txtTax24').value = formatCurrency((total).toFixed(2));
        capital();
    }

    function validateForm()
    {
        var dt = new Date();
        var isLeap = new Date(document.getElementById('frm2200AN:txtForYr').value, 1, 29).getMonth() == 1;
        
        if (!isLeap && document.getElementById('frm2200AN:txtMonth1').value==2 && document.getElementById('frm2200AN:txtDate').value==29) {
            alert("Filing year is not a leap year.");
            return;
        }
        if (!isLeap && document.getElementById('frm2200AN:txtMonth1').value==2 && document.getElementById('frm2200AN:txtDate').value>29) {
            alert("Invalid date entry on item 1.");
            return;
        }
        if (isLeap && document.getElementById('frm2200AN:txtMonth1').value==2 && document.getElementById('frm2200AN:txtDate').value>29) {
            alert("Invalid date entry on item 1.");
            return;
        }
        

        if(d.getElementById('frm2200AN:txtForYr').value == "")
        {
            alert("Please enter valid year on item 1.");
            return;
        }
       
        if(d.getElementById('frm2200AN:txtForYr').value*1 < 1900)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }
        if(d.getElementById('frm2200AN:txtDate').value == "")
        {
            alert("Please indicate a valid Day.")
            return;
        }
        
        
        if(d.getElementById('frm2200AN:txtDate').value < 1){
            alert("Please enter a valid day in Item 1.");
            return;
        }


        //Check if valid date
        var month31 = (['01', '03', '05', '07', '08', '10', '12']);
        var month30 = (['04', '06', '09', '11']);
        var month = document.getElementById('frm2200AN:txtMonth1').value
        if (month31.contains(month) && document.getElementById('frm2200AN:txtDate').value > 31)
        {
            alert("Invalid date entry on Item no.1.");
            return;
        }
        else if (month30.contains(month) && document.getElementById('frm2200AN:txtDate').value > 30)
        {
            alert("Invalid date entry on Item no.1.");
            return;
        }
        

        if(d.getElementById('frm2200AN:txtDate').value.length == 1)
        {
            alert("Please enter a valid day on item 1. Format should be MM/DD/YYYY.")
            return;
        }
        //dgarfin 05/17/2012: For phase II only. 
        if( (d.getElementById('frm2200AN:txtTIN1').value == "" || d.getElementById('frm2200AN:txtTIN2').value == "" || d.getElementById('frm2200AN:txtTIN3').value == "" || d.getElementById('frm2200AN:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 4.");
            return;
        }       
           
        if( (d.getElementById('frm2200AN:txtLineBus').value == "")  )
        {
            alert("Please enter a valid Line of Business/Occupation on Item 6.");
            return;
        }   
        if( (d.getElementById('frm2200AN:txtTaxpayerName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 7.");
            return;
        }   
        if( (d.getElementById('frm2200AN:txtTelNum').value == "")  )
        {
            alert("Please enter Telephone Number on Item 8.");
            return;
        }   
        if( (d.getElementById('frm2200AN:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 9.");
            return;
        }   
        if( (d.getElementById('frm2200AN:txtZipCode').value == "")  )
        {
            alert("Please enter Zip Code on Item 10.");
            return;
        }   
        
        if(d.getElementById('frm2200ANoptRegion').selectedIndex == 0 ||
            d.getElementById('frm2200ANoptProvince').selectedIndex == 0 ||
            d.getElementById('frm2200ANoptCity').selectedIndex == 0 ||
            d.getElementById('frm2200AN:txtPlaceofProd').value == "")
        {
            alert("Please enter a value on item no. 11. Entry must not be empty.")
            return;
        }
        if(d.getElementById('frm2200ANoptRegion1').selectedIndex == 0 ||
            d.getElementById('frm2200ANoptProvince1').selectedIndex == 0 ||
            d.getElementById('frm2200ANoptCity1').selectedIndex == 0 ||
            d.getElementById('frm2200AN:txtPlaceofRem').value == "")
        {
            alert("Please enter a value on item no. 12. Entry must not be empty.")
            return;
        }
        var tax24total = parseFloat("" + d.getElementById('frm2200AN:txtTax24').value);
        if(tax24total > 0) {
            alert("Balance to be carried over to Next return must not be positive.\nPlease adjust Tax Payment/Deposit accordingly.");
            return;
        }


        d.getElementById('frm2200AN:cmdValidate').disabled = true;
        d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm2200AN:cmdEdit').disabled = false;
        d.getElementById('frm2200AN:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;

        enabledDisabled(true);

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
        return;
    }

    function editForm()
    {
        d.getElementById('frm2200AN:cmdValidate').disabled = false;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2200AN:cmdEdit').disabled = true;
        d.getElementById('frm2200AN:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;

        enabledDisabled(false);
        d.getElementById('frm2200AN:txtTIN1').disabled = true;
        d.getElementById('frm2200AN:txtTIN2').disabled = true;
        d.getElementById('frm2200AN:txtTIN3').disabled = true;
        d.getElementById('frm2200AN:txtBranchCode').disabled = true;
    }

    var disableElem = true;
    var enableElem = false;
    function enabledDisabled(param)
    {
        d.getElementById('frm2200AN:amendedRtn_1').disabled = param;
        d.getElementById('frm2200AN:amendedRtn_2').disabled = param;
        d.getElementById('frm2200AN:txtMonth1').disabled = param;
        d.getElementById('frm2200AN:txtDate').disabled = param;
        d.getElementById('frm2200AN:txtForYr').disabled = param;
        d.getElementById('frm2200AN:txtSheets').disabled = param;
        d.getElementById('frm2200AN:txtTIN1').disabled = param;
        d.getElementById('frm2200AN:txtTIN2').disabled = param;
        d.getElementById('frm2200AN:txtTIN3').disabled = param;
        d.getElementById('frm2200AN:txtBranchCode').disabled = param;
        d.getElementById('frm2200AN:txtRDOCode').disabled = param;
        d.getElementById('frm2200AN:txtLineBus').disabled = param;
        d.getElementById('frm2200AN:txtTaxpayerName').disabled = param;
        d.getElementById('frm2200AN:txtTelNum').disabled = param;
        d.getElementById('frm2200AN:txtAddress').disabled = param;
        d.getElementById('frm2200AN:txtZipCode').disabled = param;
        d.getElementById('frm2200ANoptRegion').disabled = param;
        d.getElementById('frm2200ANoptProvince').disabled = param;
        d.getElementById('frm2200ANoptCity').disabled = param;
        d.getElementById('frm2200AN:txtPlaceofProd').disabled = param;
        d.getElementById('frm2200ANoptRegion1').disabled = param;
        d.getElementById('frm2200ANoptProvince1').disabled = param;
        d.getElementById('frm2200ANoptCity1').disabled = param;
        d.getElementById('frm2200AN:txtPlaceofRem').disabled = param;
        d.getElementById('frm2200AN:optTreaty_1').disabled = param;
        d.getElementById('frm2200AN:optTreaty_2').disabled = param;
        d.getElementById('frm2200AN:txtTax21A').disabled = param;
        d.getElementById('frm2200AN:txtTax21B').disabled = param;
        d.getElementById('frm2200AN:txtTax21C').disabled = param;


        if(d.getElementById('frm2200AN:optTreaty_1').checked){
            d.getElementById('frm2200AN:lstTaxTreaty').disabled = param;
        }

        d.getElementById('frm2200AN:chkPymntManner_1').disabled = param;
        d.getElementById('frm2200AN:chkPymntManner_2').disabled = param;

        if( d.getElementById('frm2200AN:chkPymntManner_2').checked){
            d.getElementById('frm2200AN:txtOthMannerofPymnt').disabled = param;
        }

        d.getElementById('frm2200AN:btnSched1').disabled = param;
        d.getElementById('frm2200AN:txtTax17A').disabled = param;
        d.getElementById('frm2200AN:txtTax23A').disabled = param;
        d.getElementById('frm2200AN:txtTax19').disabled = param;

        if(!param) {
            if(d.getElementById('frm2200AN:amendedRtn_1').checked) {
                d.getElementById('frm2200AN:txtTax19').disabled = false;
            } else {
                d.getElementById('frm2200AN:txtTax19').disabled = true;
            }
        }
        disableElem;
        enableElem;
    }
    
    
    function isValidDataOnSched1()
    {
        var result = true;

        if(!isViewUploaded) {
            var sched1Field = d.getElementById('frm2200ANadditionalSched1');
            if(sched1Field.rows.length > 0){
                var index = (sched1Index*1) - 1;
                if(d.getElementById('frm2200AN:sched1Atc' + index).value == ""){
                    if(index > 0) {
                        alert("Please enter a valid ATC for the specified row.");
                        result = false;
                    }
                }else if(d.getElementById('frm2200AN:sched1Atc' + index).value != ""){
                    var strText = d.getElementById('frm2200AN:sched1Atc' + index).value;
                    d.getElementById('frm2200AN:sched1Atc' + index).value = strText.toUpperCase();
                    if(strText.toUpperCase().substring(0, 2) != "XG"){
                        alert("The supplied ATC code should start with 'XG'.");
                        result = false;
                    }
                //}else if(d.getElementById('frm2200AN:sched1TaxRate' + index).value == 0 || d.getElementById('frm2200AN:sched1TaxableB' + index).value == 0){
                }
                if(result){
                    if(d.getElementById('frm2200AN:sched1TaxRate' + index).value == 0 || d.getElementById('frm2200AN:sched1TaxableB' + index).value == 0){
                        if(index > 0) {
                            alert("Please enter valid values for row " + sched1Index + " of Schedule 1, \n Or delete the row if not applicable.");
                            result = false;
                        }
                    }
                }   
            }
        }

        return result;
    }

    function addATCList1(){
        var tmpList1 = d.getElementById('tempATCListx1');

        var atcSize = atcList.length;   
        for(i = 0; i < atcSize; i++) {
            var atc = atcList[i];
            if(atc.formType == "2200AN" && atc.category == "1") {       
                //if (atc.atcCode != "XG065") { 
                    addRow(tmpList1, dataATCList1(atc.atcCode, atc.description, atc.minimum, atc.maximum, atc.rate, atc.constTaxDue), 'tempATCListx1');
                
            }
        }
    }

    function dataATCList1(atcCode, desc, min, max, rate, constTax){
        var listFields = "";

        var priceBracket = "";
        var preffix = "";
        var suffix = "";
        var price = "";
        if(parseFloat(min) == 0.00){
            preffix = "Up";
        }else {
            preffix = "Over";
        }

        if(parseFloat(max) != 0.00){
            suffix = "to " + parseFloat(max);
        }else {
            suffix = "";
        }

        if(parseFloat(min) == 0.00){
            price = "";
        }else {
            price = "" + parseFloat(min);
        }

        priceBracket = preffix + " " + price + " " + suffix;
        
        //new atc codes (TRAIN LAW)
        if (atcCode == "XG068" || atcCode == "XG055") {
            priceBracket = "Exempt";
        }

        var taxRate = "";
        if(parseFloat(min) != 0.00){
            taxRate = "P " + constTax + " plus " + rate + "% of the value in excess of P " + parseFloat(min)
        }else {
            taxRate = rate + "%";
        }

        //new atc codes (TRAIN LAW)
         if (atcCode == "XG065") {
            taxRate = rate + "%";
         }

        var computeSched1BET = "computeSched1BasicExcisetax(\"" + atcCode + "\",\"" + min + "\",\"" + max + "\",\"" + rate + "\",\"" + constTax + "\"," + tempListATCSched1 + ");";

        listFields = "<tr width='5%'><td align='center' id='frm2200AN:listSched1xAtcCode" + tempListATCSched1 + "'>" + atcCode + "</td>" +
            "<td align='center' width='10%' id='frm2200AN:listSched1xDesc" + tempListATCSched1 + "'>" + desc + "</td>" +
            "<td align='center' width='15%' id='frm2200AN:listSched1x1PriceBracket" + tempListATCSched1 + "'>" + priceBracket + "</td>" +
            "<td align='center' width='22%' size='18' id='frm2200AN:listSched1x1TaxRate" + tempListATCSched1 + "'>" + taxRate + "</td>" +
            "<td align='center' width='9%'><input type='text' name='frm2200AN:listSched1x1B" + tempListATCSched1 + "' id='frm2200AN:listSched1x1B" + tempListATCSched1 + "' onkeypress='return numbersonly(this, event)' style='text-align: right' value='0' size='14' onblur='round(this,2)' /></td>" +
            "<td align='center' width='9%'><input type='text' name='frm2200AN:listSched1x1C" + tempListATCSched1 + "' id='frm2200AN:listSched1x1C" + tempListATCSched1 + "' onkeypress='return numbersonly(this, event)' style='text-align: right' value='0' size='14' onblur='round(this,2);" + computeSched1BET + "' /></td>" +
            "<td align='center' width='9%'><input type='text' name='frm2200AN:listSched1x1D" + tempListATCSched1 + "' id='frm2200AN:listSched1x1D" + tempListATCSched1 + "' onkeypress='return numbersonly(this, event)' style='text-align: right' value='0.00' size='14' onblur='round(this,2)' /></td>" +
            "<td align='center' width='9%'><input type='text' name='frm2200AN:listSched1x1E" + tempListATCSched1 + "' id='frm2200AN:listSched1x1E" + tempListATCSched1 + "' onkeypress='return numbersonly(this, event)' style='text-align: right' value='0.00' size='14' onblur='round(this,2); " + computeSched1BET + "' /></td>" +
            "<td align='center' width='9%'><input type='text' name='frm2200AN:listSched1x1Due" + tempListATCSched1 + "' id='frm2200AN:listSched1x1Due" + tempListATCSched1 + "' onkeypress='return numbersonly(this, event)' style='text-align: right; background-color: rgb(220, 220, 220)' value='0.00' size='14' onblur='' disabled /></td></tr>";

        tempListATCSched1++;
        return listFields;
    }

    function addATCList2(){
        var tmpList2 = d.getElementById('tempATCListx2');

        var atcSize = atcList.length;   
        for(i = 0; i < atcSize; i++) {
            var atc = atcList[i];
            if(atc.formType == "2200AN" && atc.category == "2") {       
                addRow(tmpList2, dataATCList2(atc.atcCode, atc.description, atc.rate), 'tempATCListx2');
            }
        }
    }

    function dataATCList2(atcCode, desc, rate){
        var listFields = "";

        var computeSched1BET = "computeSched1BasicExcisetax2(\"" + atcCode + "\",\"" + rate + "\"," + tempListATCSched2 + ");";

        listFields = "<tr width='5%'><td align='center' id='frm2200AN:listSched1x2AtcCode" + tempListATCSched2 + "'>" + atcCode + "</td>" +
            "<td align='center' width='28%' colspan='2' id='frm2200AN:listSched1x2Desc" + tempListATCSched2 + "'>" + desc + "</td>" +
            "<td align='center' width='22%' size='18' id='frm2200AN:listSched1x2TaxRate" + tempListATCSched2 + "'>" + rate + "%</td>" +
            "<td align='center' width='9%'><input type='text' name='frm2200AN:listSched1x2B" + tempListATCSched2 + "' id='frm2200AN:listSched1x2B" + tempListATCSched2 + "' onkeypress='return numbersonly(this, event)' style='text-align: right' value='0' size='15' onblur='round(this,2)' /></td>" +
            "<td align='center' width='9%'><input type='text' name='frm2200AN:listSched1x2C" + tempListATCSched2 + "' id='frm2200AN:" + tempListATCSched2 + "' onkeypress='return numbersonly(this, event)' style='text-align: right' value='0' size='15' onblur='round(this,2)' /></td>" +
            "<td align='center' width='9%'><input type='text' name='frm2200AN:listSched1x2D" + tempListATCSched2 + "' id='frm2200AN:listSched1x2D" + tempListATCSched2 + "' onkeypress='return numbersonly(this, event)' style='text-align: right' value='0.00' size='15' onblur='round(this,2)' /></td>" +
            "<td align='center' width='9%'><input type='text' name='frm2200AN:listSched1x2E" + tempListATCSched2 + "' id='frm2200AN:listSched1x2E" + tempListATCSched2 + "' onkeypress='return numbersonly(this, event)' style='text-align: right' value='0.00' size='15' onblur='round(this,2); " + computeSched1BET + "' /></td>" +
            "<td align='center' width='9%'><input type='text' name='frm2200AN:listSched1x2Due" + tempListATCSched2 + "' id='frm2200AN:listSched1x2Due" + tempListATCSched2 + "' onkeypress='return numbersonly(this, event)' style='text-align: right; background-color: rgb(220, 220, 220)' value='0.00' size='15' onblur='' disabled /></td></tr>";

        tempListATCSched2++;
        return listFields;
    }

    function alignSched1List(){ 
        var tmpList1 = d.getElementById('tempATCListx1');       
        var x = 0;
        while(x < tmpList1.rows.length){
            x++;
        }
        var tmpList2 = d.getElementById('tempATCListx2');   
        x = 0;
        while(x < tmpList2.rows.length){
            if(x < 2){              
                waitstr = setTimeout("d.getElementById('frm2200AN:listSched1x2B" + x + "').disabled = true;d.getElementById('frm2200AN:listSched1x2C" + x + "').disabled = true;", 100);                
            }
            x++;
        }       
    }

    function computeSched1BasicExcisetax(atcCode, min, max, rate, constTax, index) {
        var taxableC = parseFloat(NumWithComma(d.getElementById("frm2200AN:listSched1x1C" + index).value));
        var taxableE = parseFloat(NumWithComma(d.getElementById("frm2200AN:listSched1x1E" + index).value));
        
        if (max == 0) {
            max = 999999999999.99;
        }

        if(taxableC != 0 || taxableE != 0) {
            if(taxableC == 0) {
                alert("Please enter a valid value for the Taxable(C) for ATC " + atcCode);
                d.getElementById("frm2200AN:listSched1x1Due" + index).value = "0.00";
                computeTotalSched1();
                return;
            }
            if(taxableE == 0) {
                alert("Please enter a valid value for the Taxable(E) for ATC " + atcCode);
                d.getElementById("frm2200AN:listSched1x1Due" + index).value = "0.00";
                computeTotalSched1();
                return;
            }

            var basicTaxDue = "0.00";
            if((parseFloat(NumWithComma(d.getElementById("frm2200AN:listSched1x1E" + index).value)*1) / parseFloat(NumWithComma(d.getElementById("frm2200AN:listSched1x1C" + index).value)*1))  <= parseFloat(min*1) 
                || (parseFloat(NumWithComma(d.getElementById("frm2200AN:listSched1x1E" + index).value)*1) / parseFloat(NumWithComma(d.getElementById("frm2200AN:listSched1x1C" + index).value)*1)) > parseFloat(max*1)) {
                d.getElementById("frm2200AN:listSched1x1E" + index).value = "0.00";
    
                if(min == max) {
                    d.getElementById("frm2200AN:listSched1x1E" + index).value = max;
                } 
                
                taxableE = parseFloat(d.getElementById("frm2200AN:listSched1x1E" + index).value);
                alert("Values of Column E/Column C is out of the Net Manufacturers's / Importer's Price Bracket for ATC\n" + atcCode + ".\nPlease fill up a different ATC Row Number or check Column C and Column E values to continue." )
                
                d.getElementById("frm2200AN:listSched1x1Due" + index).value = formatCurrency("" + basicTaxDue);
                
                return;
            }
            
            if(NumWithComma(d.getElementById("frm2200AN:listSched1x1E" + index).value)*1 != 0) {
                if (min!=0)
                    var basicTaxDue = ((((parseFloat(rate) / 100) * ((taxableE/taxableC) - parseFloat(min))) + parseFloat(constTax)).toFixed(2)) * taxableC;
                }
                else
                    var basicTaxDue = (parseFloat(rate) / 100) * taxableE;

                //added new atCode (TRAIN LAW)
                if (atcCode == "XG065") {   
                    var basicTaxDue = (parseFloat(rate) / 100) * taxableE;
            }
            d.getElementById("frm2200AN:listSched1x1Due" + index).value = formatCurrency("" + basicTaxDue);
        } else {
            d.getElementById("frm2200AN:listSched1x1Due" + index).value = "0.00";
        }


        computeTotalSched1();
    }

    function computeSched1BasicExcisetax2(atcCode, rate, index) {
        var taxableE = parseFloat( NumWithComma(d.getElementById("frm2200AN:listSched1x2E" + index).value) );
        if(taxableE != 0) {
            if(taxableE == 0) {
                d.getElementById("frm2200AN:listSched1x2Due" + index).value = "0.00";
                computeTotalSched1();
                return;
            }

            var basicTaxDue = ((parseFloat(rate) / 100) * taxableE).toFixed(2);
             //var basicTaxDue = ((parseFloat(rate)) * taxableE).toFixed(2);
     
            d.getElementById("frm2200AN:listSched1x2Due" + index).value = formatCurrency("" + basicTaxDue);
        } else {
            d.getElementById("frm2200AN:listSched1x2Due" + index).value = "0.00";
        }


        computeTotalSched1();
    }
    
    function initialValidateBeforeSave() {
        var dt = new Date();
        var isLeap = new Date(document.getElementById('frm2200AN:txtForYr').value, 1, 29).getMonth() == 1;
        
        if (!isLeap && document.getElementById('frm2200AN:txtMonth1').selectedIndex==1 && document.getElementById('frm2200AN:txtDate').value>28) {
            alert("Filing year is not a leap year.");
            return;
        }
        
        if (isLeap && document.getElementById('frm2200AN:txtMonth1').selectedIndex==1 && document.getElementById('frm2200AN:txtDate').value>29) {
            alert("Invalid date entry.");
            return;
        }
        
        
        if(d.getElementById('frm2200AN:txtForYr').value == "")
        {
            alert("Please enter valid year on item 1.");
            return;
        }
        
        if(d.getElementById('frm2200AN:txtForYr').value*1 < 1900)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }
        if(d.getElementById('frm2200AN:txtDate').value*1 > 31 || d.getElementById('frm2200AN:txtDate').value == "")
        {
            alert("Please indicate a valid Day.")
            return;
        }
        if( (d.getElementById('frm2200AN:txtTIN1').value == "" || d.getElementById('frm2200AN:txtTIN2').value == "" || d.getElementById('frm2200AN:txtTIN3').value == "" || d.getElementById('frm2200AN:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 4.");
            return false;
        }
        
        if( (d.getElementById('frm2200AN:txtTaxpayerName').value == "")  )
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
    $('.printSignFooterClass').css({ 'width':'94%','display':'block','position':'relative','overflow':'visible','page-break-before':'always', 'background':'#ffffff' });    
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
                document.getElementById(elem[i].id).style.height="10px";
                document.getElementById(elem[i].id).style.fontSize="8px";
            }
            
        }
    }   
    
    $('.printButtonClass').hide();
    $("#formPaper").show();
    $('#formPaper').css({'margin-top':'-80px' });
    $('#modalSched1').css({'margin-top':'80px' });

    window.print();

    $('.printButtonClass').show();
    $("#formPaper").show();
    $("#modalSched1").hide();
    $('#formPaper').css({'border':'#a7a7a7 1px solid','margin-top':'0px' });
    $('.imgClass').css({ 'display':'none'});

    $('#printMenu').show('blind');
    if ( $('#formMenu').css('display') != 'none' ) {    
        $('#formMenu').hide('blind');
    }   
}
    function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                console.log(form.serializeArray());
                var data = form.serialize();
                save('2200AN',data);
                
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
        saveAndExit('2200AN',data);
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

        submitAndSave('2200AN', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2200AN';
    } 
</script>
@endsection