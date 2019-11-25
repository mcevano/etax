@extends('layouts.app')
@section('title', '| BIR Form No. 2200M')

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
        <button type="button" class="btn btn-danger btn-exit" id="2200M" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="2200M" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='2200M' company='{{$company->id}}'>Okay</button>
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
        <div id="container" class="mainContent2200M">
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 746px; ">
                <div id="formPaper">
                    <table width="746" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="746" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
                                    <tr>
                                        <td width="82"  style='padding:0px;' valign="middle" align="center">                    
                        <p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p>
                      </td>
                                        <td width="147" valign="middle">
                                            <label face="Arial" size="1px">Republika ng Pilipinas
                                            <br/>Kagawaran ng Pananalapi
                                            <br/>Kawanihan ng Rentas Internas</label>
                                        </td>
                                        <td width="0" align="center">
                                            <font size="5px" style="font-weight:bold;">EXCISE TAX
                      <br/>RETURN
                      <br/>for MINERAL PRODUCTS</font>
                                        </td>
                                        <td width="145" valign="center">
                                            <font face="Arial" size="1px">BIR Form No.<br/></font>
                                            <font face="Arial" size="6px">2200-M<br/></font>
                                            <font face="Arial" size="1px">October 2002 (ENCS)</font>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="259" valign="top" class="tblFormTd">
                                            <table width="254" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="23"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td colspan="2"><font size="1" style="font-size: 11px;">Date (MM/DD/YYYY)</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td width="100%">
                                                        <font color="black" face="Arial" size="2">
                                                            <select id="frm2200M:txtMonth1" name="frm2200M:txtMonth1" size="1">
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
                                                        <input id="frm2200M:txtDate" maxlength="2" name="frm2200M:txtDate" size="1" style="" type="text" value="" onkeypress="return wholenumber(this, event)" />
                                                        <input id="frm2200M:txtForYr" maxlength="4" name="frm2200M:txtForYr" size="3" style="" type="text" value="" onkeypress="return wholenumber(this, event)" />
                                                    </td>
                                                    <td width="25">&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="153" valign="top" class="tblFormTd"><table width="138" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="23"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td width="115"><font size="1" style="font-size: 11px;">Amended Return</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm2200M:j_id217">
                                                            <div align="center" style="padding: 5px 0 5px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0" >
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="Y" name="frm2200M:amendedRtn" id="frm2200M:amendedRtn_1" onclick="d.getElementById('frm2200M:txtTax20').disabled = false;" disabled="disabled" />
                                                                                <label for="frm2200M:j_id217:_1" style="font-size:12px;" >Yes</label>
                                                                                &nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" value="N"  name="frm2200M:amendedRtn" id="frm2200M:amendedRtn_2" onclick="d.getElementById('frm2200M:txtTax20').disabled = true;d.getElementById('frm2200M:txtTax20').value = '0.00';compute21();" disabled="disabled" checked="checked" />
                                                                                <label for="frm2200M:j_id217:_2" style="font-size:12px;" >No</label></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset></td>
                                                </tr>
                                            </table></td>
                                        <td width="153" valign="top" class="tblFormTd"><table width="138" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="23"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td width="115"><font size="1" style="font-size: 11px;"> Quarterly Return</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm2200M:j_id217">
                                                            <div align="center" style="padding: 5px 0 5px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="Y" name="frm2200M:quarterlyRtn" id="frm2200M:quarterlyRtn_1" />
                                                                                <label for="frm2200M:j_id217:_1" style="font-size:12px;" >Yes</label>
                                                                                &nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" value="N"  name="frm2200M:quarterlyRtn" id="frm2200M:quarterlyRtn_2" checked="checked" />
                                                                                <label for="frm2200M:j_id217:_2" style="font-size:12px;" >No</label></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="175" valign="top" class="tblFormTd">
                                            <table width="152" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">No. of Sheets Attached?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><input type="text" value="0" style="text-align: right;" size="4" name="frm2200M:txtSheets" maxlength="2" id="frm2200M:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
                                                </tr>
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
                                <table style="width: 740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="250" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="{{$company->tin1}}"  size="2" name="frm2200M:txtTIN1" maxlength="3" id="frm2200M:txtTIN1" onkeypress="return numbersonly(this, event)" />
                                                            <input type="text" value="{{$company->tin2}}"  size="2" name="frm2200M:txtTIN2" maxlength="3" id="frm2200M:txtTIN2" onkeypress="return numbersonly(this, event)" />
                                                            <input type="text" value="{{$company->tin3}}"  size="2" name="frm2200M:txtTIN3" maxlength="3" id="frm2200M:txtTIN3" onkeypress="return numbersonly(this, event)" />
                                                            <input type="text" value="{{$company->tin4}}"  size="2" name="frm2200M:txtBranchCode" maxlength="3" id="frm2200M:txtBranchCode" onkeypress="return letternumber(event)" />
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="132" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font><font size="1">RDO Code&nbsp;</font></td>
                                                    <td id="rdoSelect">
                                                        <select class='iceSelOneMnu' disabled="" id='frm2200M:txtRDOCode' name='frm2200M:txtRDOCode' size='1' >
                                                        <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="354" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">Line of Business&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" disabled="" value="{{$company->line_business}}"  size="20" name="frm2200M:txtLineBus" maxlength="30" id="frm2200M:txtLineBus" />
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
                                <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="583" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font></td>
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
                                                                <td><input type="text" disabled="" value="{{$company->registered_name != '' ? $company->registered_name : $company->lastname.','. $company->firstname.' '.$company->middlename}}"  size="70" name="frm2200M:txtTaxpayerName" maxlength="70" id="frm2200M:txtTaxpayerName" onblur = "return capital(this, event)"/></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="157" valign="top" class="tblFormTd">
                                            <table width="149" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="149"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font><font size="1" style="font-size: 11px;">Telephone
                                                            Number</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" disabled value="{{$company->tel_number}}"  size="15" name="frm2200M:txtTelNum" maxlength="20" id="frm2200M:txtTelNum" onkeypress="return wholenumber(this, event)" />
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
                                <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="583" valign="top" class="tblFormTd">
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
                                                                <td><input type="text" disabled="" value="{{$company->address}}"  size="70" name="frm2200M:txtAddress" maxlength="70" id="frm2200M:txtAddress" onblur = "return capital(this, event)"/></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="157" valign="top" class="tblFormTd">
                                            <table width="148" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="148"><font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font><font size="1" style="font-size: 11px;">Zip
                                                            Code</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" disabled value="{{$company->zip_code}}"  size="15" name="frm2200M:txtZipCode" maxlength="12" id="frm2200M:txtZipCode" onkeypress="return wholenumber(this, event)" />
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
                                                    <td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">12&nbsp; &nbsp;</font></strong></font></td>
                                                    <td width="28%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Region<br /></font>
                                                        <select id="frm2200MoptRegion" name="frm2200MoptRegion" size="1" style="width: 160px" onchange="getProvince(this.value, 'frm2200MoptProvince', 'frm2200MoptCity')">
                                                            <option value="00">(Select Region)</option>
                                                        </select>
                                                    </td>
                                                    <td width="25%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Province<br /></font>
                                                        <select id="frm2200MoptProvince" name="frm2200MoptProvince" size="1" style="width: 155px" onchange="getCity('frm2200MoptRegion', 'frm2200MoptProvince', 'frm2200MoptCity')">
                                                            <option value="00">(Select Province)</option>
                                                        </select>
                                                    </td>
                                                    <td width="24%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">City<br /></font>
                                                        <select id="frm2200MoptCity" name="frm2200MoptCity" size="1" style="width: 150px">
                                                            <option value="00">(Select City)</option>
                                                        </select>
                                                    </td>
                                                    <td width="20%">
                                                        <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Place of Production<br />
                                                        </font>
                                                        <input id="frm2200M:txtPlaceofProd" maxlength="60" name="frm2200M:txtPlaceofProd" size="15" style="background-color: white; color: black" type="text" value="" onblur = "return capital(this, event)"/>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top" class="tblFormTd">
                                            <table border="0" cellpadding="0" cellspacing="0" width="735"><tr><td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">13&nbsp; &nbsp;</font></strong></font></td>
                                                    <td width="28%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Region<br /></font>
                                                        <select id="frm2200MoptRegion1" name="frm2200MoptRegion1" size="1" style="width:160px" onchange="getProvince(this.value, 'frm2200MoptProvince1', 'frm2200MoptCity1')">
                                                            <option value="00">(Select Region)</option>
                                                        </select>
                                                    </td>
                                                    <td width="25%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Province<br /></font>
                                                        <select id="frm2200MoptProvince1" name="frm2200MoptProvince1" size="1" style="width: 155px" onchange="getCity('frm2200MoptRegion1', 'frm2200MoptProvince1', 'frm2200MoptCity1')">
                                                            <option value="00">(Select Province)</option>
                                                        </select>
                                                    </td>
                                                    <td width="24%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">City<br /></font>
                                                        <select id="frm2200MoptCity1" name="frm2200MoptCity1" size="1" style="width: 150px">
                                                            <option value="00">(Select City)</option>
                                                        </select>
                                                    </td>
                                                    <td width="20%">
                                                        <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Place of Removal<br /></font>
                                                        <input id="frm2200M:txtPlaceofRem" maxlength="60" name="frm2200M:txtPlaceofRem" size="15" style="background-color: white; color: black" type="text" value="" onblur = "return capital(this, event)"/>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top" class="tblFormTd">
                                            <table border="0" cellpadding="0" cellspacing="0" width="704"><tr><td width="20"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">14</font></strong></font></td>
                                                    <td width="217"><label face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Are you availing of tax relief under&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td><td width="131"></td><td width="19"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">15</font></strong></font></td>
                                                    <td width="87"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">If yes, please&nbsp;&nbsp;</font></td><td width="218"></td></tr>
                                                <tr>
                                                    <td width="20">&nbsp;</td>
                                                    <td valign="top" width="217"><label face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Special Law or International Tax Treaty?</label></td>
                                                    <td valign="top" width="131">
                                                        <fieldset id="frm2200M:optTreaty" style="font-family: Arial, Helvetica, sans-serif; font-size : 10px;">
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td>
                                                                        <input id="frm2200M:optTreaty_1" name="frm2200M:optTreaty" type="radio" value="Y" onclick="changeTreaty()" />
                                                                        <label for="frm2200M:optTreaty:_1" style="font-size: 11px;">Yes</label>
                                                                    </td>
                                                                    <td>
                                                                        <input checked="checked" id="frm2200M:optTreaty_2" name="frm2200M:optTreaty" type="radio" value="N" onclick="changeTreaty()" />
                                                                        <label for="frm2200M:optTreaty:_2" style="font-size: 11px;">No</label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </fieldset>
                                                    </td>
                                                    <td width="19">&nbsp;</td>
                                                    <td valign="top" width="87">&nbsp;<font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">specify</font></td>
                                                    <td valign="top" width="218">
                                                        <select disabled="disabled" id="frm2200M:lstTaxTreaty" name="frm2200M:lstTaxTreaty" size="1" style="background-color: white; font-family: Arial, Helvetica, sans-serif;">
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
                                        <td colspan="2" valign="top" class="tblFormTd"><table border="0" width="718">
                                                <tr>
                                                    <td width="66"><font color="black" face="Arial, Helvetica, sans-serif" size="2"><b>Part II</b></font></td>
                                                    <td align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>MANNER OF PAYMENT</b></font><font color="black" face="Arial, Helvetica, sans-serif" size="2">&nbsp;</font></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top" class="tblFormTd">
                                            <table width="679" height="51" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">16</font></strong></font></td>
                                                    <td colspan="2" width="54%">
                                                        <fieldset id="frm2200M:chkPymntManner"  style="font-family: Arial, Helvetica, sans-serif; font-size : 10px;">
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td>
                                                                        <input id="frm2200M:chkPymntManner_1" name="frm2200M:chkPymntManner"  type="radio" value="Y" onclick="changeMannerOfPayment()" />
                                                                        <label for="frm2200M:chkPymntManner:_1" style="font-size: 11px;">Payment on Actual Removal </label>
                                                                    </td>
                                                                    <td>
                                                                        <input id="frm2200M:chkPymntManner_2" name="frm2200M:chkPymntManner"  type="radio" value="N" onclick="changeMannerOfPayment()" />
                                                                        <label for="frm2200M:chkPymntManner:_2" style="font-size: 11px;">Prepayment/Advance deposit/</label>
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
                                                            <input disabled="true" id="frm2200M:txtOthMannerofPymnt" maxlength="50" name="frm2200M:txtOthMannerofPymnt" size="25" style="background-color: white; font: 10pt Arial, Helvetica, sans-serif;" type="text" value="" onblur = "return capital(this, event)"/>
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
                                <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table width="" border="0" cellspacing="0" cellpadding="0">
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
                                <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTd">
                                            <table width="738" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td><div align="center"><font color="black" face="Arial" size="1" style="font-size: 11px;">Amount</font></div></td>
                                                </tr>
                                                <tr>
                                                    <td width="26"><font size="2" style="font-weight:bold;">&nbsp;17&nbsp;&nbsp;</font></td>
                                                    <td width="355"><font color="black" face="Arial" size="1" style="font-size: 11px;">Excise Tax Due </font>
                                                        <!--<input type="button" class="printButtonClass" name="frm2200M:btnSched1" id="frm2200M:btnSched1" value="Schedule 1" onclick="showSched1()" />-->
                            <a href="#" id="frm2200M:btnSched1" onclick="showSched1()" style="font-size: 11px;">Schedule 1</a>
                                                    </td>
                                                    <td width="163">
                                                        <div class="spacePadder"></div>
                                                    </td>
                                                    <td width="194"><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 14px;">17</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="15" name="frm2200M:txtTax17" maxlength="15" id="frm2200M:txtTax17" />
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;</font></td>
                                                    <td><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: Balance Carried Over from Previous Return</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                                                    <td>
                                                        <div class="spacePadder"><font size="2" style="font-weight:bold;">18A</font>
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="13" name="frm2200M:txtTax18A" maxlength="15" id="frm2200M:txtTax18A" onblur="round(this,2); compute18C()" onkeypress="return numbersonly(this, event)" />
                                                        </div>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Creditable Excise Tax, if applicable</font></td>
                                                    <td><span class="spacePadder"><font size="2" style="font-weight:bold;">18B</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="13" name="frm2200M:txtTax18B" maxlength="15" id="frm2200M:txtTax18B" disabled="true" />
                                                        </span></td>
                                                    <td><div align="justify"><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 5px;">18C</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="15" name="frm2200M:txtTax18C" maxlength="15" id="frm2200M:txtTax18C" disabled="true" />
                                                            </span></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;</font></td>
                                                    <td colspan="2"><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Net Tax Due / (Overpayment)</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font>
                                                    </td>
                                                    <td><div align="justify"><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 14px;">19</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="15" name="frm2200M:txtTax19" maxlength="17" id="frm2200M:txtTax19" disabled="true" />
                                                            </span></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: Payment on Returns Previously Filed for the Same Period, if amended return</font></td>
                                                    <td><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 14px;">20</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="15" name="frm2200M:txtTax20" maxlength="15" id="frm2200M:txtTax20" onblur="round(this,2);compute21()" disabled="true" />
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Tax Still Due / (Overpayment)</font></td>
                                                    <td><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 14px;">21</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="15" name="frm2200M:txtTax21" maxlength="17" id="frm2200M:txtTax21" disabled="true" />
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;</font></td>
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
                                                                        <font size="2" face="Arial"><b>22A</b>&nbsp;
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="14" name="frm2200M:txtTax22A" maxlength="15" id="frm2200M:txtTax22A" onblur="round(this,2); compute22D()" onkeypress="return numbersonly(this, event)" />
                                                                            <input type="hidden" value="" name="frm2200M:inputSurcharge" id="frm2200M:inputSurcharge" />
                                                                        </font>
                                                                    </td>
                                                                    <td width="161" align="center">
                                                                        <font size="2" face="Arial"><b>22B</b>&nbsp;
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="14" name="frm2200M:txtTax22B" maxlength="15" id="frm2200M:txtTax22B" onblur="round(this,2); compute22D()" onkeypress="return numbersonly(this, event)" />
                                                                        </font>
                                                                    </td>
                                                                    <td width="174" align="center">
                                                                        <font size="2" face="Arial"><b>22C</b>&nbsp;
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="14" name="frm2200M:txtTax22C" maxlength="15" id="frm2200M:txtTax22C" onblur="round(this,2); compute22D()" onkeypress="return numbersonly(this, event)" />
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <div class="spacePadder">
                                                            <font size="2" style="font-weight:bold;margin-right: 5px;">22D</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="15" name="frm2200M:txtTax22D" maxlength="15" id="frm2200M:txtTax22D" disabled="true" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Amount Payable </font></td>
                                                    <td>
                                                        <div class="spacePadder">
                                                            <font size="2" style="font-weight:bold;margin-right: 15px">23</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="15" name="frm2200M:txtTax23" maxlength="17" id="frm2200M:txtTax23" disabled="true" class="iceInpTxt-dis" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: &nbsp;&nbsp;&nbsp; Payment Made Today</font></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                                        <table width="512">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="161" ><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tax Payment / Deposit</font></td>
                                                                    <td width="161" align="center">&nbsp;</td>
                                                                    <td width="174" align="center"><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 3px;">24A</font>
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="15" name="frm2200M:txtTax24A" maxlength="15" id="frm2200M:txtTax24A" onblur="round(this,2); compute24C()" onkeypress="return numbersonly(this, event)" />
                                                                        </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td ><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Penalties (from 22D)</font></td>
                                                                    <td align="center"><input class="iceSelBoolChkbx-dis" id="frm2200M:PayPenalties" name="frm2200M:PayPenalties" value="Y" type="checkbox" onclick="payPenalties()" /><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Pay Penalties?</font></td>
                                                                    <td align="center"><font size="2" face="Arial"><b>24B</b>&nbsp;
                                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="15" name="frm2200M:txtTax24B" maxlength="15" id="frm2200M:txtTax24B" disabled="true" />
                                                                        </font></td>
                                                                </tr>
                                                            </tbody>
                                                        </table></td>
                                                    <td valign="bottom"><span class="spacePadder"><font size="2" style="font-weight:bold;">24C</font>&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="15" name="frm2200M:txtTax24C" maxlength="15" id="frm2200M:txtTax24C" disabled="true" class="iceInpTxt-dis" />
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;25&nbsp;</font></td>
                                                    <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Balance to be Carried Over to Next Return</font></td>
                                                    <td><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 17px;">25</font>
                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="15" name="frm2200M:txtTax25" maxlength="17" id="frm2200M:txtTax25" disabled="true" class="iceInpTxt-dis" />
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
                <div class="imgClass" align='center' style="display:none; width:740px !important;">
                  <table  style="border-top: 3px solid black; border-collapse: collapse; font-family:arial; font-size:11px; text-align: center; table-layout: fixed; background-color: white;">
                    <col width="33%" />
                      <col width="19%" />
                    <col width="19%" />
                      <col width="29%" />
                      <tr>
                        <td style="text-align: left"><b>PART IV</b></td>
                      </tr>
                      <tr>
                        <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge and 
                          <br/>belief, is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
                          </td>
                      </tr>
                      <tr>
                        <td colspan="3"><b>26</b>______________________________________________________________________________
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <br/>President/Vice President/Principal Officer/Accredited Tax Agent/
                          <br/>Authorized Representative/Taxpayer
                          <br/>(Signature Over Printed Name)</td>
                        <td><b>27</b>_____________________________
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
                <div class="imgClass" align='center' style="display:none; width:740px !important;">
                  <img id="frm2200M:jurat" src="{{ asset('images/bottom_img/2200M_new.jpg') }}" width="740"/>
                </div>
                <div class="imgClass" align='center' style="display:none; width:740px !important;">
                  <table style="font-size:12px; text-align: left; vertical-align: top;background-color: white;">
                    <tr>
                      <td>&nbsp;Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br/><br/><br/><br/><br/></td>
                    </tr>
                  </table>
                </div>
                                <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table width="735" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr valign="middle">
                                                                    <td width="40"></td>
                                                                    <td width="616">
                                                                        <div id="frm2200M:j_id743" class="icePnlGrp">
                                                                            <div align="center">
                                                                            @if($action != 'view')
                                                                                <input type="button" value="Validate" style="width: 100px;" name="frm2200M:cmdValidate" id="frm2200M:cmdValidate" onclick="validateForm()" />
                                                                                <input type="button" value="Edit" style="width: 100px;" name="frm2200M:cmdEdit" id="frm2200M:cmdEdit" onclick="editForm()"/>
                                                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2200M:btnFinalCopy" id="frm2200M:btnFinalCopy" onclick="submitForm();" />
                                                                                <div id="msg" class="printButtonClass" style="display:none;"></div>
                                                                            @else
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                            @endif
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td width="79"></td>
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
                                            <div class="footer footer2200M" style="padding:6px; text-align: center; font-size: 11px; background-color: white;">
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
        <div id="modalSched1" class="printSignFooterClass aBox" style="z-index: 1;width:94%; display:none; height:90%; position:relative; top:3%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="center"> 
        <table width="100%" class="tblSched1_2200M" border="1">
                    <tr class="modalHeader">
                        <td colspan="15" width="100%" style="text-align: center;font-weight: bold">SCHEDULE 1: SUMMARY OF REMOVALS AND EXCISE TAX DUE ON MINERAL PRODUCTS CHARGEABLE AGAINST PAYMENTS</td>
                    </tr>
                    <tr>
                        <td colspan="15">&nbsp;</td>
                    </tr>
                    <tr class="modalColumnHeader">
                        <td align="center" width="4%" >&nbsp;</td>
                        <td align="center" width="9%" >&nbsp;</td>
                        <td align="center" width="7%" >&nbsp;</td>
                        <td colspan="2" width="14%" align="center">Volume of</td>
                        <td colspan="4" width="25%" align="center">Provisional</td>
                        <td colspan="4" width="25%" align="center">Final</td>
                        <td align="center" width="7%" >Tax Due</td>
                        <td align="center" width="9%" >Total</td>
                    </tr>
                    <tr class="modalColumnHeader">
                        <td align="center" width="4%" >&nbsp;</td>
                        <td align="center" width="9%" >&nbsp;</td>
                        <td align="center" width="7%" >&nbsp;</td>
                        <td colspan="2" width="14%" align="center">Mineral Removed</td>
                        <td colspan="2" width="14%" align="center">Actual/Fair Market Value</td>
                        <td align="center" width="4%" >Tax Rate</td>
                        <td align="center" width="7%" >Tax Due</td>
                        <td colspan="2" width="14%" align="center">Actual/Fair Market Value</td>
                        <td align="center" width="4%" >Tax Rate</td>
                        <td align="center" width="7%" >Tax Due</td>
                        <td align="center" width="7%" >Adjustment per Final</td>
                        <td align="center" width="9%" >Tax Due</td>
                    </tr>
                    <tr class="modalColumnHeader">
                        <td align="center" width="4%" >ATC</td>
                        <td align="center" width="9%" >Description</td>
                        <td align="center" width="7%" >Place of Removal</td>
                        <td align="center" width="7%" >Taxable(A)</td>
                        <td align="center" width="7%" >Exempt(B)</td>
                        <td align="center" width="7%" >Taxable(C)</td>
                        <td align="center" width="7%" >Exempt(D)</td>
                        <td align="center" width="4%" >(E %)</td>
                        <td align="center" width="7%" >(F)</td>
                        <td align="center" width="7%" >Taxable(G)</td>
                        <td align="center" width="7%" >Exempt(H)</td>
                        <td align="center" width="4%" >(I %)</td>
                        <td align="center" width="7%" >(J)</td>
                        <td align="center" width="7%" >Value(K)</td>
                        <td align="center" width="9%" nowrap>(L)=(F +<br/>J + K)</td>
                    </tr>
                    <tr class="modalContent">
                        <td align="center" width="4%" >XM010</td>
                        <td align="center" width="9%" >Coal and Coke</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtPlaceOfExtract1" id="frm2200M:txtPlaceOfExtract1" size="11" value="" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtA1" id="frm2200M:txtA1" size="11" style="text-align: right" value="0.00" onblur="round(this,2); getPlaceToSched1(1)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtB1" id="frm2200M:txtB1" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtC1" id="frm2200M:txtC1" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtD1" id="frm2200M:txtD1" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="4%" nowrap>10.00/MT</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtF1" id="frm2200M:txtF1" size="11" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtG1" id="frm2200M:txtG1" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtH1" id="frm2200M:txtH1" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="4%" nowrap>10.00MT</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtJ1" id="frm2200M:txtJ1" size="11" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtK1" id="frm2200M:txtK1" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="9%" nowrap><input type="text" name="frm2200M:txtL1" id="frm2200M:txtL1" size="11" style="background-color: rgb(220, 220, 220); text-align: right; font-weight: bold;" value="0.00" onkeypress="return numbersonly(this, event)" disabled />&nbsp;&nbsp;</td>
                    </tr>
                    <tr class="modalContent">
                        <td align="center" width="4%" nowrap>XM020</td>
                        <td align="center" width="9%" >Non-metallic minerals and quarry resources</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtPlaceOfExtract2" id="frm2200M:txtPlaceOfExtract2" size="11" value="" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtA2" id="frm2200M:txtA2" size="11" style="text-align: right" value="0.00" onblur="round(this,2); getPlaceToSched1(2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtB2" id="frm2200M:txtB2" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtC2" id="frm2200M:txtC2" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtD2" id="frm2200M:txtD2" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="4%" nowrap>2.00%</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtF2" id="frm2200M:txtF2" size="11" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtG2" id="frm2200M:txtG2" size="11" style="text-align: right" value="0.00" onblur="round(this,2); computeJ(2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtH2" id="frm2200M:txtH2" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="4%" nowrap>2.00%</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtJ2" id="frm2200M:txtJ2" size="11" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtK2" id="frm2200M:txtK2" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="9%" nowrap><input type="text" name="frm2200M:txtL2" id="frm2200M:txtL2" size="11" style="background-color: rgb(220, 220, 220); text-align: right; font-weight: bold;" value="0.00" onkeypress="return numbersonly(this, event)" disabled />&nbsp;&nbsp;</td>
                    </tr>
                    <tr class="modalContent">
                        <td align="center" width="4%" >XM030</td>
                        <td align="center" width="9%" >Copper and Other Metallic Minerals</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtPlaceOfExtract3" id="frm2200M:txtPlaceOfExtract3" size="11" value="" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtA3" id="frm2200M:txtA3" size="11" style="text-align: right" value="0.00" onblur="round(this,2); getPlaceToSched1(3)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtB3" id="frm2200M:txtB3" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtC3" id="frm2200M:txtC3" size="11" style="text-align: right" value="0.00" onblur="round(this,2); computeF(3)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtD3" id="frm2200M:txtD3" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="4%" nowrap>2.00%</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtF3" id="frm2200M:txtF3" size="11" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtG3" id="frm2200M:txtG3" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtH3" id="frm2200M:txtH3" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="4%" nowrap>2.00%</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtJ3" id="frm2200M:txtJ3" size="11" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtK3" id="frm2200M:txtK3" size="11" style="text-align: right" value="0.00" onblur="round(this,2); computeL(3)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="9%" nowrap><input type="text" name="frm2200M:txtL3" id="frm2200M:txtL3" size="11" style="background-color: rgb(220, 220, 220); text-align: right; font-weight: bold;" value="0.00" onkeypress="return numbersonly(this, event)" disabled />&nbsp;&nbsp;</td>
                    </tr>
                    <tr class="modalContent">
                        <td align="center" width="4%" >XM040</td>
                        <td align="center" width="9%" >Gold and Chromite</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtPlaceOfExtract4" id="frm2200M:txtPlaceOfExtract4" size="11" value="" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtA4" id="frm2200M:txtA4" size="11" style="text-align: right" value="0.00" onblur="round(this,2); getPlaceToSched1(4)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtB4" id="frm2200M:txtB4" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtC4" id="frm2200M:txtC4" size="11" style="text-align: right" value="0.00" onblur="round(this,2); computeF(4)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtD4" id="frm2200M:txtD4" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="4%" nowrap>2.00%</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtF4" id="frm2200M:txtF4" size="11" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtG4" id="frm2200M:txtG4" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtH4" id="frm2200M:txtH4" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="4%" nowrap>2.00%</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtJ4" id="frm2200M:txtJ4" size="11" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtK4" id="frm2200M:txtK4" size="11" style="text-align: right" value="0.00" onblur="round(this,2); computeL(4)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="9%" nowrap><input type="text" name="frm2200M:txtL4" id="frm2200M:txtL4" size="11" style="background-color: rgb(220, 220, 220); text-align: right; font-weight: bold;" value="0.00" onkeypress="return numbersonly(this, event)" disabled />&nbsp;&nbsp;</td>
                    </tr>
                    <tr class="modalContent">
                        <td align="center" width="4%" >XM050</td>
                        <td align="center" width="9%" >Indigenous Petroleum</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtPlaceOfExtract5" id="frm2200M:txtPlaceOfExtract5" size="11" value="" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtA5" id="frm2200M:txtA5" size="11" style="text-align: right" value="0.00" onblur="round(this,2); getPlaceToSched1(5)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtB5" id="frm2200M:txtB5" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtC5" id="frm2200M:txtC5" size="11" style="text-align: right" value="0.00" onblur="round(this,2); computeF(5)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtD5" id="frm2200M:txtD5" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="4%" nowrap>3.00%</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtF5" id="frm2200M:txtF5" size="11" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtG5" id="frm2200M:txtG5" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtH5" id="frm2200M:txtH5" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="4%" nowrap>3.00%</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtJ5" id="frm2200M:txtJ5" size="11" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtK5" id="frm2200M:txtK5" size="11" style="text-align: right" value="0.00" onblur="round(this,2); computeL(5)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="9%" nowrap><input type="text" name="frm2200M:txtL5" id="frm2200M:txtL5" size="11" style="background-color: rgb(220, 220, 220); text-align: right; font-weight: bold;" value="0.00" onkeypress="return numbersonly(this, event)" disabled />&nbsp;&nbsp;</td>
                    </tr>
                    <tr class="modalContent">
                        <td align="center" width="4%" >XM051</td>
                        <td align="center" width="9%" >Natural Gas or Liquefied Natural Gas(locally extracted)</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtPlaceOfExtract6" id="frm2200M:txtPlaceOfExtract6" size="11" value="" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtA6" id="frm2200M:txtA6" size="11" style="text-align: right" value="0.00" onblur="round(this,2); getPlaceToSched1(6)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtB6" id="frm2200M:txtB6" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtC6" id="frm2200M:txtC6" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtD6" id="frm2200M:txtD6" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="4%" nowrap>0.00%</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtF6" id="frm2200M:txtF6" size="11" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtG6" id="frm2200M:txtG6" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtH6" id="frm2200M:txtH6" size="11" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="4%" nowrap>0.00%</td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtJ6" id="frm2200M:txtJ6" size="11" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                        <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtK6" id="frm2200M:txtK6" size="11" style="text-align: right" value="0.00" onblur="round(this,2); computeL(6)" onkeypress="return numbersonly(this, event)" /></td>
                        <td align="center" width="9%" nowrap><input type="text" name="frm2200M:txtL6" id="frm2200M:txtL6" size="11" style="background-color: rgb(220, 220, 220); text-align: right; font-weight: bold;" value="0.00" onkeypress="return numbersonly(this, event)" disabled />&nbsp;&nbsp;</td>
                    </tr>
                </table>
                <br />
        <table width="100%" class="tblSched1_2200M" border="1">
                    <tr>
                        <td class="modalColumnHeader" colspan="16" style="text-align: left;font-weight: bold">Others (Please Specify)</td>
                    </tr>
                    <tr class="modalColumnHeader">
                        <td align="center" width="5%" style="width: 18px">&nbsp;</td>
                        <td align="center" width="3%" style="width: 29px">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center" width="15%" colspan="2">Volume of</td>           
                        <td align="center" width="24%" colspan="4">Provisional</td>
                        <td align="center" width="24%" colspan="4">Final</td>                        
            <td align="center" width="7%">Tax Due</td>
                        <td align="center" width="8%">Total</td>
                    </tr>
                    <tr class="modalColumnHeader">
                        <td align="center" width="5%">&nbsp;</td>
                        <td align="center" width="3%">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center" >&nbsp;</td>
                        <td align="center" width="15%" colspan="2">Mineral Removed</td>
                        <td align="center" width="15%" colspan="2">Actual/Fair Market Value</td>
                        <td align="center" width="2%">Tax Rate</td>
                        <td align="center" width="7%">Tax Due</td>
                        <td align="center" width="15%" colspan="2">Actual/Fair Market Value</td>
                        <td align="center" width="2%">Tax Rate</td>
                        <td align="center" width="7%">Tax Due</td>
                        <td align="center" width="7%" >Adjustment per Final</td>
                        <td align="center" width="8%">Tax Due</td>
                    </tr>
                    <tr class="modalColumnHeader">
                        <td align="center" width="5%">&nbsp;</td>
                        <td align="center" width="3%">ATC</td>
                        <td align="center">Description</td>
                        <td align="center">Place of Removal</td>
                        <td align="center" width="8%">Taxable(A)</td>
                        <td align="center" width="7%">Exempt(B)</td>
                        <td align="center" width="8%">Taxable(C)</td>
                        <td align="center" width="7%">Exempt(D)</td>
                        <td align="center" width="2%">(E %)</td>
                        <td align="center" width="7%">(F)</td>
                        <td align="center" width="8%">Taxable(G)</td>
                        <td align="center" width="7%">Exempt(H)</td>
                        <td align="center" width="2%">(I %)</td>
                        <td align="center" width="7%">(J)</td>
                        <td align="center" width="7%">Value(K)</td>
                        <td align="center" width="8%" >(L)=(F + J + K)</td>

                    </tr>
                    <!--<tbody>-->
          <tr><td colspan="16" width="100%">
                        <table width="100%" id="frm2200MadditionalSched1" border="1">
                            <tr>
                                <td align="center" width="2%" nowrap><input type="checkbox" class="printButtonClass" name="frm2200M:sched1Chk0" id="frm2200M:sched1Chk0" value="" /></td>
                                <td align="center" width="3%" style="width: 45px;" nowrap><input type="text" name="frm2200M:txtsched1Atc[]" id="frm2200M:txtsched1Atc0" size="2" value="" maxlength="5"/></td>
                                <td align="center" style="width: 117px;" nowrap><input type="text" name="frm2200M:txtsched1Desc0" id="frm2200M:txtsched1Desc0" size="8" value=""/></td>
                                <td align="center" width="8%" nowrap><input type="text" name="frm2200M:txtsched1PlaceOfExtract0" id="frm2200M:txtsched1PlaceOfExtract0" size="8" value="" /></td>
                                <td align="center" width="8%" nowrap><input type="text" name="frm2200M:txtsched1A0" id="frm2200M:txtsched1A0" size="10" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                                <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtsched1B0" id="frm2200M:txtsched1B0" size="10" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                                <td align="center" width="8%" nowrap><input type="text" name="frm2200M:txtsched1C0" id="frm2200M:txtsched1C0" size="10" style="text-align: right" value="0.00" onblur="round(this,2); computeFDynamic(0)" onkeypress="return numbersonly(this, event)" /></td>
                                <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtsched1D0" id="frm2200M:txtsched1D0" size="10" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                                <td align="center" width="2%" nowrap><input type="text" name="frm2200M:txtsched1E0" id="frm2200M:txtsched1E0" size="2" style="text-align: right" value="0.00" onblur="round(this,2); computeFDynamic(0)" onkeypress="return numbersonly(this, event)" /></td>
                                <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtsched1F0" id="frm2200M:txtsched1F0" size="10" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                                <td align="center" width="8%" nowrap><input type="text" name="frm2200M:txtsched1G0" id="frm2200M:txtsched1G0" size="10" style="text-align: right" value="0.00" onblur="round(this,2); computeJDynamic(0)" onkeypress="return numbersonly(this, event)" /></td>
                                <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtsched1H0" id="frm2200M:txtsched1H0" size="10" style="text-align: right" value="0.00" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                                <td align="center" width="2%" nowrap><input type="text" name="frm2200M:txtsched1I0" id="frm2200M:txtsched1I0" size="2" style="text-align: right" value="0.00" onblur="round(this,2); computeJDynamic(0)" onkeypress="return numbersonly(this, event)" /></td>
                                <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtsched1J0" id="frm2200M:txtsched1J0" size="10" style="background-color: rgb(220, 220, 220); text-align: right" value="0.00" onkeypress="return numbersonly(this, event)" disabled /></td>
                                <td align="center" width="7%" nowrap><input type="text" name="frm2200M:txtsched1K0" id="frm2200M:txtsched1K0" size="10" style="text-align: right" value="0.00" onblur="round(this,2); computeLDynamic(0)" onkeypress="return numbersonly(this, event)" /></td>
                                <td align="center" width="8%" nowrap><input type="text" name="frm2200M:txtsched1L0" id="frm2200M:txtsched1L0" size="10" style="background-color: rgb(220, 220, 220); text-align: right; font-weight: bold;" value="0.00" onkeypress="return numbersonly(this, event)" disabled />&nbsp;&nbsp;</td>
                            </tr>
                        </table>
          </td></tr>  
                    <!--</tbody>-->
                </table>
        
        <table width="100%">
          <tr>
            <td class="modalColumnHeader" style="text-align:left">
              <b>TOTAL TAX DUE</b>
            </td>
            <td align="right">
              <input type="text" name="frm2200M:totalTaxDue" id="frm2200M:totalTaxDue" style="background-color: rgb(220, 220, 220); text-align: right; font-weight: bold;" value="0.00" disabled />
            </td>
          </tr>       
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td style="text-align:right" colspan="2">
                <input type="button" class="printButtonClass" name="frm2200M:btnAdd" id="frm2200M:btnAdd" value="     Add     " onClick="addFieldsForSched1()" />&nbsp;&nbsp;&nbsp;
                <input type="button" class="printButtonClass" name="frm2200M:btnDelete" id="frm2200M:btnDelete" value="   Delete   " onClick="deleteFieldForSched1()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            </td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" colspan="2">
              <input type="button" class="printButtonClass" name="frm2200M:btnOK" id="frm2200M:btnOK" value="       OK       " onClick="sched1OK()" />&nbsp;&nbsp;&nbsp;
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
    <div id="responseRegion" style="display:none;"><!--loaded files render here--></div>  
    <div id="responseProvince" style="display:none;"><!--loaded files render here--></div>  
    <div id="responseCity" style="display:none;"><!--loaded files render here--></div>
    <div id="responseRdo" style="display:none;"><!--loaded files render here--></div> 
@endsection

@section('scripts')
<script src="{{ asset('js/forms/2200M.js') }}" ></script>
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
      d.getElementById('frm2200M:txtTIN1').disabled = true;
        d.getElementById('frm2200M:txtTIN2').disabled = true;
      d.getElementById('frm2200M:txtTIN3').disabled = true;
      d.getElementById('frm2200M:txtBranchCode').disabled = true;
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
    var d=document,XMLBGFile='',data='',XMLFile='',XMLRegionFile='',XMLProvinceFile='',XMLCityFile='',msg = d.getElementById('msg'),flag1=true;
  var loader=d.getElementById('loader');
  /*----------------------------------*/  
  
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
          var sPar1 = 'frm2200M:sched1Chk';     
          
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
          window.setTimeout("loadData();sched1OK();flag1=true;",710);
        }

        if (gIsReadOnly) {
          d.getElementById('frm2200M:cmdValidate').disabled = true;
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
          if(elem[i].id == 'frm2200M:txtTaxpayerName' || elem[i].id == 'frm2200M:txtLineBus' || elem[i].id == 'frm2200M:txtAddress'){
            elem[i].value = unescape(fieldVal[1]);
          }
          else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
          else{
            elem[i].value = fieldVal[1]; //all select-one and text values       
          }

          if ( String(elem[i].id).indexOf('frm2200MoptRegion') != -1 || String(elem[i].id).indexOf('frm2200MoptProvince') != -1  || String(elem[i].id).indexOf('frm2200MoptRegion1') != -1  || String(elem[i].id).indexOf('frm2200MoptProvince1') != -1 ) {
            elem[i].onchange();     
          }
        }       
        
        if (elem[i].type == 'radio') {
          var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');       
          if (rdoVal[1] == 'true') {            
            elem[i].checked = rdoVal[1];
            //elem[i].onclick();  // this doesn't work when trying to load data from XML although this works in other forms. temporarily commented. 
  
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
  
    function init()
    {
    var year = new Date();
    d.getElementById('frm2200M:txtMonth1').selectedIndex = year.getMonth();
    //d.getElementById('frm2200M:txtDate').value = year.getDate();
    dd = "" + year.getDate();
    if (dd.length == 1) 
    { 
      dd = "0" + dd; 
      d.getElementById('frm2200M:txtDate').value = dd;
    }
    else
    {
      d.getElementById('frm2200M:txtDate').value = year.getDate();
    }
    d.getElementById('frm2200M:txtForYr').value = year.getFullYear();
  
        d.getElementById('frm2200M:amendedRtn_1').disabled = false;
        d.getElementById('frm2200M:amendedRtn_2').disabled = false;
        
        d.getElementById('frm2200M:optTreaty_2').checked = true;
        d.getElementById('frm2200M:lstTaxTreaty').disabled = true;

        d.getElementById('frm2200M:txtTax17').disabled = true;
        d.getElementById('frm2200M:txtTax18B').disabled = true;
        d.getElementById('frm2200M:txtTax18C').disabled = true;
        d.getElementById('frm2200M:txtTax19').disabled = true;
        d.getElementById('frm2200M:txtTax20').disabled = true;
        d.getElementById('frm2200M:txtTax21').disabled = true;
        d.getElementById('frm2200M:txtTax22D').disabled = true;
        d.getElementById('frm2200M:txtTax23').disabled = true;
        d.getElementById('frm2200M:txtTax24B').disabled = true;
        d.getElementById('frm2200M:txtTax24C').disabled = true;
        d.getElementById('frm2200M:txtTax25').disabled = true;

        @if($action != 'view')
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2200M:cmdEdit').disabled = true;
        d.getElementById('frm2200M:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @endif

        loadXMLRegion('/xml/region.xml');
        getRegion();
       
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
        if(d.getElementById('frm2200M:optTreaty_1').checked){
            d.getElementById('frm2200M:lstTaxTreaty').disabled = false;
        }else {
            d.getElementById('frm2200M:lstTaxTreaty').disabled = true;
            d.getElementById('frm2200M:lstTaxTreaty').selectedIndex = 0;
        }
    }
  
    function changeMannerOfPayment()
    {
    var today = new Date();
        if(d.getElementById('frm2200M:chkPymntManner_1').checked){
            d.getElementById('frm2200M:txtOthMannerofPymnt').disabled = true;
            d.getElementById('frm2200M:txtOthMannerofPymnt').value = "";
      d.getElementById('frm2200M:btnSched1').disabled = false;
      
      d.getElementById('frm2200M:txtMonth1').disabled = false;
      d.getElementById('frm2200M:txtDate').disabled = false;
      d.getElementById('frm2200M:txtForYr').disabled = false;
      if (showFillupSched1Alert) {
        alert("Please fill up Schedule 1."); 
      }
        }else {
            d.getElementById('frm2200M:txtOthMannerofPymnt').disabled = false;
      d.getElementById('frm2200M:btnSched1').disabled = true;
      
      for (i = 0; i<d.getElementById('frm2200M:txtMonth1').options.length; i++) {
        if (d.getElementById('frm2200M:txtMonth1').options[i].value == today.getMonth() + 1) {
          d.getElementById('frm2200M:txtMonth1').options[i].selected = true;
          break;
        }
      }
      //d.getElementById('frm2200M:txtDate').value = today.getDate();
      dd = "" + today.getDate();
        if (dd.length == 1) 
        { 
          dd = "0" + dd; 
          d.getElementById('frm2200M:txtDate').value = dd;
        }
        else
        {
          d.getElementById('frm2200M:txtDate').value = today.getDate();
        }
      d.getElementById('frm2200M:txtForYr').value = today.getFullYear();
      
      d.getElementById('frm2200M:txtMonth1').disabled = true;
      d.getElementById('frm2200M:txtDate').disabled = true;
      d.getElementById('frm2200M:txtForYr').disabled = true;
        }
    }

    

    function showSched1()
    {
      if(d.getElementById('frm2200M:chkPymntManner_1').checked){
        d.getElementById('formPaper').style.display = "none";
        $('#modalSched1').show('blind');  

        var x = 1;
        while(x < 7){
        
          x++;
        }

        dynamicTimeOut(0);

        x = 1;
        while(x < 7){
          getPlaceToSched1(x);
          x++;
        }

      }else if(d.getElementById('frm2200M:chkPymntManner_2').checked) {
        alert("Schedule 1 is not required for Prepayment/Advance Deposit.");
        return;
      } else {
        alert("Choose Manner of Payment.");
        return;
      }

      if(isViewUploaded) {
        setTimeout("d.getElementById('frm2200M:txtA1').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtB1').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtC1').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtD1').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtG1').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtH1').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtK1').disabled = true", 100);

        setTimeout("d.getElementById('frm2200M:txtA2').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtB2').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtC2').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtD2').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtG2').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtH2').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtK2').disabled = true;", 100);

        setTimeout("d.getElementById('frm2200M:txtA3').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtB3').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtC3').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtD3').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtG3').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtH3').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtK3').disabled = true;", 100);

        setTimeout("d.getElementById('frm2200M:txtA4').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtB4').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtC4').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtD4').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtG4').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtH4').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtK4').disabled = true;", 100);

        setTimeout("d.getElementById('frm2200M:txtA5').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtB5').disabled = true", 100);
        setTimeout("d.getElementById('frm2200M:txtC5').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtD5').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtG5').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtH5').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtK5').disabled = true;", 100);

        setTimeout("d.getElementById('frm2200M:txtA6').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtB6').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtC6').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtD6').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtG6').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtH6').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:txtK6').disabled = true;", 100);

        var x = 0;
        var rowSize = d.getElementById("frm2200MadditionalSched1").rows.length;
        for(x = 0; x < rowSize; x++){
          waitstr = setTimeout("d.getElementById(\"frm2200M:txtsched1Atc\" + " + x + ").disabled = true;", 100);
          waitstr = setTimeout("d.getElementById(\"frm2200M:txtsched1Desc\" + " + x + ").disabled = true;", 100);
          waitstr = setTimeout("d.getElementById(\"frm2200M:txtsched1PlaceOfExtract\" + " + x + ").disabled = true;", 100);
          waitstr = setTimeout("d.getElementById(\"frm2200M:txtsched1A\" + " + x + ").disabled = true;", 100);
          waitstr = setTimeout("d.getElementById(\"frm2200M:txtsched1B\" + " + x + ").disabled = true;", 100);
          waitstr = setTimeout("d.getElementById(\"frm2200M:txtsched1C\" + " + x + ").disabled = true;", 100);
          waitstr = setTimeout("d.getElementById(\"frm2200M:txtsched1D\" + " + x + ").disabled = true;", 100);
          waitstr = setTimeout("d.getElementById(\"frm2200M:txtsched1E\" + " + x + ").disabled = true;", 100);
          waitstr = setTimeout("d.getElementById(\"frm2200M:txtsched1G\" + " + x + ").disabled = true;", 100);
          waitstr = setTimeout("d.getElementById(\"frm2200M:txtsched1H\" + " + x + ").disabled = true;", 100);
          waitstr = setTimeout("d.getElementById(\"frm2200M:txtsched1I\" + " + x + ").disabled = true;", 100);
          waitstr = setTimeout("d.getElementById(\"frm2200M:txtsched1K\" + " + x + ").disabled = true;", 100);
         }

        setTimeout("d.getElementById('frm2200M:btnAdd').disabled = true;", 100);
        setTimeout("d.getElementById('frm2200M:btnDelete').disabled = true;", 100);
      }
    }

    function hideSched1()
    {
        d.getElementById('formPaper').style.display = 'block';
        $('#modalSched1').hide('blind');
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
    }

    function addFieldsForSched1Reload()
    {
        var sched1Field = d.getElementById('frm2200MadditionalSched1');
        addRow(sched1Field, sched1Fields());
    } 
  
    function addFieldsForSched1()
    {
        var sched1Field = d.getElementById('frm2200MadditionalSched1');
        if(isValidDataOnSched1()){
            addRow(sched1Field, sched1Fields());
        }
    }

    function addRow(tbody, text) {
      $('#frm2200MadditionalSched1').append(text);      
    }

    function deleteFieldForSched1()
    {
        var sched1Field = d.getElementById('frm2200MadditionalSched1');
        var x = 0;
        var xFlag = false;
        while(x < sched1Field.rows.length){
            if(d.getElementById('frm2200M:sched1Chk' + x).checked){
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
        var sched1Field = d.getElementById('frm2200MadditionalSched1');
        var chkBox;
        var atc;
        var desc;
        var sched1PlaceOfExtract;
        var sched1A;
        var sched1B;
        var sched1C;
        var sched1D;
        var sched1E;
        var sched1F;
        var sched1G;
        var sched1H;
        var sched1I;
        var sched1J;
        var sched1K;
        var sched1L;
        while(indexParam < sched1Field.rows.length){
            chkBox = d.getElementById('frm2200M:sched1Chk' + ((indexParam*1) + 1));
            atc = d.getElementById('frm2200M:txtsched1Atc' + ((indexParam*1) + 1));
            desc = d.getElementById('frm2200M:txtsched1Desc' + ((indexParam*1) + 1));
            sched1PlaceOfExtract = d.getElementById('frm2200M:txtsched1PlaceOfExtract' + ((indexParam*1) + 1));
            sched1A = d.getElementById('frm2200M:txtsched1A' + ((indexParam*1) + 1));
            sched1B = d.getElementById('frm2200M:txtsched1B' + ((indexParam*1) + 1));
            sched1C = d.getElementById('frm2200M:txtsched1C' + ((indexParam*1) + 1));
            sched1D = d.getElementById('frm2200M:txtsched1D' + ((indexParam*1) + 1));
            sched1E = d.getElementById('frm2200M:txtsched1E' + ((indexParam*1) + 1));
            sched1F = d.getElementById('frm2200M:txtsched1F' + ((indexParam*1) + 1));
            sched1G = d.getElementById('frm2200M:txtsched1G' + ((indexParam*1) + 1));
            sched1H = d.getElementById('frm2200M:txtsched1H' + ((indexParam*1) + 1));
            sched1I = d.getElementById('frm2200M:txtsched1I' + ((indexParam*1) + 1));
            sched1J = d.getElementById('frm2200M:txtsched1J' + ((indexParam*1) + 1));
            sched1K = d.getElementById('frm2200M:txtsched1K' + ((indexParam*1) + 1));
            sched1L = d.getElementById('frm2200M:txtsched1L' + ((indexParam*1) + 1));

            chkBox.name = "frm2200M:sched1Chk" + indexParam;
            chkBox.id = "frm2200M:sched1Chk" + indexParam;
            atc.name = "frm2200M:txtsched1Atc" + indexParam;
            atc.id = "frm2200M:txtsched1Atc" + indexParam;
            desc.name = "frm2200M:txtsched1Desc" + indexParam;
            desc.id = "frm2200M:txtsched1Desc" + indexParam;
            sched1PlaceOfExtract.name = "frm2200M:txtsched1PlaceOfExtract" + indexParam;
            sched1PlaceOfExtract.id = "frm2200M:txtsched1PlaceOfExtract" + indexParam;
            sched1A.name = "frm2200M:txtsched1A" + indexParam;
            sched1A.id = "frm2200M:txtsched1A" + indexParam;
            sched1B.name = "frm2200M:txtsched1B" + indexParam;
            sched1B.id = "frm2200M:txtsched1B" + indexParam;
            sched1C.name = "frm2200M:txtsched1C" + indexParam;
            sched1C.id = "frm2200M:txtsched1C" + indexParam;
            sched1D.name = "frm2200M:txtsched1D" + indexParam;
            sched1D.id = "frm2200M:txtsched1D" + indexParam;
            sched1E.name = "frm2200M:txtsched1E" + indexParam;
            sched1E.id = "frm2200M:txtsched1E" + indexParam;
            sched1F.name = "frm2200M:txtsched1F" + indexParam;
            sched1F.id = "frm2200M:txtsched1F" + indexParam;
            sched1G.name = "frm2200M:txtsched1G" + indexParam;
            sched1G.id = "frm2200M:txtsched1G" + indexParam;
            sched1H.name = "frm2200M:txtsched1H" + indexParam;
            sched1H.id = "frm2200M:txtsched1H" + indexParam;
            sched1I.name = "frm2200M:txtsched1I" + indexParam;
            sched1I.id = "frm2200M:txtsched1I" + indexParam;
            sched1J.name = "frm2200M:txtsched1J" + indexParam;
            sched1J.id = "frm2200M:txtsched1J" + indexParam;
            sched1K.name = "frm2200M:txtsched1K" + indexParam;
            sched1K.id = "frm2200M:txtsched1K" + indexParam;
            sched1L.name = "frm2200M:txtsched1L" + indexParam;
            sched1L.id = "frm2200M:txtsched1L" + indexParam;

            indexParam++;
        }

        computeTotalTaxDueSched1();
    }

    function sched1Fields()
    {
        var fields = "";
        fields = "<tr><td align='center' width='2%' nowrap><input class='printButtonClass' type='checkbox' name='frm2200M:sched1Chk" + sched1Index + "' id='frm2200M:sched1Chk" + sched1Index + "' value='' /></td>" +
            "<td align='center' width='3%' nowrap><input type='text' name='frm2200M:txtsched1Atc[]' id='frm2200M:txtsched1Atc" + sched1Index + "' size='2' value='' maxlength='5'/></td>" +
            "<td align='center' width='9%' nowrap><input type='text' name='frm2200M:txtsched1Desc" + sched1Index + "' id='frm2200M:txtsched1Desc" + sched1Index + "' size='8' value='' /></td>" +
            "<td align='center' width='8%' nowrap><input type='text' name='frm2200M:txtsched1PlaceOfExtract" + sched1Index + "' id='frm2200M:txtsched1PlaceOfExtract" + sched1Index + "' size='8' value='' /></td>" +
            "<td align='center' width='8%' nowrap><input type='text' name='frm2200M:txtsched1A" + sched1Index + "' id='frm2200M:txtsched1A" + sched1Index + "' style='text-align: right' size='10' value='0.00' onblur='round(this,2)' onkeypress='return numbersonly(this, event)' /></td>" +
            "<td align='center' width='7%' nowrap><input type='text' name='frm2200M:txtsched1B" + sched1Index + "' id='frm2200M:txtsched1B" + sched1Index + "' style='text-align: right' size='10' value='0.00' onblur='round(this,2)' onkeypress='return numbersonly(this, event)' /></td>" +
            "<td align='center' width='8%' nowrap><input type='text' name='frm2200M:txtsched1C" + sched1Index + "' id='frm2200M:txtsched1C" + sched1Index + "' style='text-align: right' size='10' value='0.00' onblur='round(this,2); computeFDynamic(" + sched1Index + ")' onkeypress='return numbersonly(this, event)' /></td>" +
            "<td align='center' width='7%' nowrap><input type='text' name='frm2200M:txtsched1D" + sched1Index + "' id='frm2200M:txtsched1D" + sched1Index + "' style='text-align: right' size='10' value='0.00' onblur='round(this,2)' onkeypress='return numbersonly(this, event)' /></td>" +
            "<td align='center' width='2%' nowrap><input type='text' name='frm2200M:txtsched1E" + sched1Index + "' id='frm2200M:txtsched1E" + sched1Index + "' style='text-align: right' size='2' value='0.00' onblur='round(this,2); computeFDynamic(" + sched1Index + ")' onkeypress='return numbersonly(this, event)' /></td>" +
            "<td align='center' width='7%' nowrap><input type='text' name='frm2200M:txtsched1F" + sched1Index + "' id='frm2200M:txtsched1F" + sched1Index + "' style='text-align: right; background-color: rgb(220, 220, 220)' size='10' value='0.00' onkeypress='return numbersonly(this, event)' disabled /></td>" +
            "<td align='center' width='8%' nowrap><input type='text' name='frm2200M:txtsched1G" + sched1Index + "' id='frm2200M:txtsched1G" + sched1Index + "' style='text-align: right' size='10' value='0.00' onblur='round(this,2); computeJDynamic(" + sched1Index + ")' onkeypress='return numbersonly(this, event)' /></td>" +
            "<td align='center' width='7%' nowrap><input type='text' name='frm2200M:txtsched1H" + sched1Index + "' id='frm2200M:txtsched1H" + sched1Index + "' style='text-align: right' size='10' value='0.00' onblur='round(this,2)' onkeypress='return numbersonly(this, event)' /></td>" +
            "<td align='center' width='2%' nowrap><input type='text' name='frm2200M:txtsched1I" + sched1Index + "' id='frm2200M:txtsched1I" + sched1Index + "' style='text-align: right' size='2' value='0.00' onblur='round(this,2); computeJDynamic(" + sched1Index + ")' onkeypress='return numbersonly(this, event)' /></td>" +
            "<td align='center' width='7%' nowrap><input type='text' name='frm2200M:txtsched1J" + sched1Index + "' id='frm2200M:txtsched1J" + sched1Index + "' style='text-align: right; background-color: rgb(220, 220, 220)' size='10' value='0.00' onkeypress='return numbersonly(this, event)' disabled /></td>" +
            "<td align='center' width='7%' nowrap><input type='text' name='frm2200M:txtsched1K" + sched1Index + "' id='frm2200M:txtsched1K" + sched1Index + "' style='text-align: right' size='10' value='0.00' onblur='round(this,2); computeLDynamic(" + sched1Index + ")' onkeypress='return numbersonly(this, event)' /></td>" +
            "<td align='center' width='8%' nowrap><input type='text' name='frm2200M:txtsched1L" + sched1Index + "' id='frm2200M:txtsched1L" + sched1Index + "' style='text-align: right; background-color: rgb(220, 220, 220); font-weight: bold;' size='10' value='0.00' onkeypress='return numbersonly(this, event)' disabled /></td>&nbsp;&nbsp;</tr>";
      
        //dynamicTimeOut(sched1Index);
        sched1Index++;
        return fields;
    }

    function dynamicTimeOut(index)
    {
    }

    function isValidDataOnSched1()
    {
        var result = true;

        if(!isViewUploaded) {
            var sched1Field = d.getElementById('frm2200MadditionalSched1');
            if(sched1Field.rows.length > 0){
                var index = (sched1Index*1) - 1;
                var sched1Total = parseFloat("" + d.getElementById('frm2200M:txtsched1L' + index).value);
               
                    if(d.getElementById('frm2200M:txtsched1Atc' + index).value == ""){
            if(index > 0) {
              alert("Please enter a valid ATC for the specified row.");
              result = false;
            }
                    }else if(d.getElementById('frm2200M:txtsched1Atc' + index).value != "") {
                        var strText = d.getElementById('frm2200M:txtsched1Atc' + index).value;
                        d.getElementById('frm2200M:txtsched1Atc' + index).value = strText.toUpperCase();
                        if(strText.toUpperCase().substring(0, 2) != "XM"){
                            alert("The supplied ATC code should start with 'XM'.");
                            result = false;
            }
              
                    
          }
          if(result){
            if(d.getElementById('frm2200M:txtsched1Desc' + index).value == ""){
              if(index > 0) {
                alert("Please enter a valid description for the Schedule 1.");
                result = false;
              } 
            }
          }
                
            }
        }

        return result;
    }

    function getPlaceToSched1(index)
    {
        if(d.getElementById('frm2200M:txtA' + index).value != 0){
            d.getElementById('frm2200M:txtPlaceOfExtract' + index).value = d.getElementById('frm2200M:txtPlaceofRem').value;
        }else {
            d.getElementById('frm2200M:txtPlaceOfExtract' + index).value = "";
        }

        computeJ(index);
    }

    function computeJ(index)
    {
        var total = 0;
        if(index == 1){
            total = (NumWithComma(d.getElementById('frm2200M:txtA' + index).value)*1) * 10;
            d.getElementById('frm2200M:txtJ' + index).value = formatCurrency(total);
        }
        total = 0;
        if(index == 2){
            total = (NumWithComma(d.getElementById('frm2200M:txtG' + index).value)*1) * 0.02;
            d.getElementById('frm2200M:txtJ' + index).value = formatCurrency(total);
        }

        computeL(index);
    }

    function computeF(index)
    {
        var total = 0;
        if(index == 3 || index == 4){
            total = (NumWithComma(d.getElementById('frm2200M:txtC' + index).value)*1) * 0.02;
            d.getElementById('frm2200M:txtF' + index).value = formatCurrency(total);
        }
        total = 0;
        if(index == 5){
            total = (NumWithComma(d.getElementById('frm2200M:txtC' + index).value)*1) * 0.03;
            d.getElementById('frm2200M:txtF' + index).value = formatCurrency(total);
        }

        computeL(index);
    }

    function computeL(index)
    {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm2200M:txtF' + index).value)*1) + (NumWithComma(d.getElementById('frm2200M:txtJ' + index).value)*1) +
            (NumWithComma(d.getElementById('frm2200M:txtK' + index).value)*1);

        d.getElementById('frm2200M:txtL' + index).value = formatCurrency(total);

        computeTotalTaxDueSched1();
    }

    function computeFDynamic(index)
    {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm2200M:txtsched1C' + index).value)*1) * (NumWithComma(d.getElementById('frm2200M:txtsched1E' + index).value)*1);
        total = total / 100;
        d.getElementById('frm2200M:txtsched1F' + index).value = formatCurrency(total);

        computeLDynamic(index);
    }

    function computeJDynamic(index)
    {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm2200M:txtsched1G' + index).value)*1) * (NumWithComma(d.getElementById('frm2200M:txtsched1I' + index).value)*1);
        total = total / 100;
        d.getElementById('frm2200M:txtsched1J' + index).value = formatCurrency(total);

        computeLDynamic(index);
    }

    function computeLDynamic(index)
    {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm2200M:txtsched1F' + index).value)*1) + (NumWithComma(d.getElementById('frm2200M:txtsched1J' + index).value)*1) +
            (NumWithComma(d.getElementById('frm2200M:txtsched1K' + index).value)*1);

        d.getElementById('frm2200M:txtsched1L' + index).value = formatCurrency(total);

        computeTotalTaxDueSched1();
    }

    function computeTotalTaxDueSched1()
    {
        var total = 0;
        var x = 1;
        while(x < 7){
            total = (total*1) + (NumWithComma(d.getElementById('frm2200M:txtL' + x).value)*1);
            x++;
        }

        var rowsize = d.getElementById('frm2200MadditionalSched1').rows.length;
        x = 0;
        while(x < rowsize){
            total = (total*1) + (NumWithComma(d.getElementById('frm2200M:txtsched1L' + x).value)*1);
            x++;
        }

        d.getElementById('frm2200M:totalTaxDue').value = formatCurrency(total);
    }

    function validateForm()
    {
        var dt = new Date();
    var isLeap = new Date(document.getElementById('frm2200M:txtForYr').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm2200M:txtMonth1').value==2 && document.getElementById('frm2200M:txtDate').value==29) {
      alert("Filing year is not a leap year.");
      return;
    }
    if (!isLeap && document.getElementById('frm2200M:txtMonth1').value==2 && document.getElementById('frm2200M:txtDate').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    if (isLeap && document.getElementById('frm2200M:txtMonth1').value==2 && document.getElementById('frm2200M:txtDate').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    
        if(d.getElementById('frm2200M:txtForYr').value == "")
        {
            alert("Please enter valid year on item 1.");
            return;
        }
       
        if(d.getElementById('frm2200M:txtForYr').value*1 < 1900)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }
        if(d.getElementById('frm2200M:txtDate').value == "")
        {
            alert("Please indicate a valid Day.")
            return;
        }
    
    if(d.getElementById('frm2200M:txtDate').value < 1){
            alert("Please enter a valid day in Item 1.");
            return;
        }


    var month31 = (['01', '03', '05', '07', '08', '10', '12']);
    var month30 = (['04', '06', '09', '11']);
    var month = document.getElementById('frm2200M:txtMonth1').value
    if (month31.contains(month) && document.getElementById('frm2200M:txtDate').value > 31)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    else if (month30.contains(month) && document.getElementById('frm2200M:txtDate').value > 30)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    
    
        if(d.getElementById('frm2200M:txtDate').value.length == 1)
        {
            alert("Please enter a valid day on item 1. Format should be MM/DD/YYYY.")
            return;
        }   
     if( (d.getElementById('frm2200M:txtTIN1').value == "" || d.getElementById('frm2200M:txtTIN2').value == "" || d.getElementById('frm2200M:txtTIN3').value == "" || d.getElementById('frm2200M:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 5.");
            return;
        }   
          
        if( (d.getElementById('frm2200M:txtLineBus').value == "")  )
        {
            alert("Please enter a valid Line of Business/Occupation on Item 7.");
            return;
        } 
    if( (d.getElementById('frm2200M:txtTaxpayerName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 8.");
            return;
        } 
    if( (d.getElementById('frm2200M:txtTelNum').value == "")  )
        {
            alert("Please enter Telephone Number on Item 9.");
            return;
        }
    if( (d.getElementById('frm2200M:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 10.");
            return;
        } 
    if( (d.getElementById('frm2200M:txtZipCode').value == "")  )
        {
            alert("Please enter Zip Code on Item 11.");
            return;
        }
    
    if(d.getElementById('frm2200MoptRegion').selectedIndex < 1 || d.getElementById('frm2200MoptProvince').selectedIndex < 1 ||
            d.getElementById('frm2200MoptCity').selectedIndex < 1 || d.getElementById('frm2200M:txtPlaceofProd').value == "")
        {
            alert("Please enter a value on item no. 12. Entry must not be empty.")
            return;
        }
        if(d.getElementById('frm2200MoptRegion1').selectedIndex < 1 || d.getElementById('frm2200MoptProvince1').selectedIndex < 1 ||
            d.getElementById('frm2200MoptCity1').selectedIndex < 1 || d.getElementById('frm2200M:txtPlaceofRem').value == "")
        {
            alert("Please enter a value on item no. 13. Entry must not be empty.")
            return;
        }
    
        var tax25total = parseFloat("" + d.getElementById('frm2200M:txtTax25').value);
        if(tax25total > 0) {
            alert("Balance to be carried over to Next return must not be positive.\nPlease adjust Tax Payment/Deposit accordingly.");
            return;
        }

        d.getElementById('frm2200M:cmdValidate').disabled = true;
    d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm2200M:cmdEdit').disabled = false;
    d.getElementById('frm2200M:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;

        enabledDisabled(true);

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
    return;
    }

    function editForm()
    {
        d.getElementById('frm2200M:cmdValidate').disabled = false;
    d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2200M:cmdEdit').disabled = true;
    d.getElementById('frm2200M:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;

        enabledDisabled(false);
    d.getElementById('frm2200M:txtTIN1').disabled = true;
      d.getElementById('frm2200M:txtTIN2').disabled = true;
    d.getElementById('frm2200M:txtTIN3').disabled = true;
    d.getElementById('frm2200M:txtBranchCode').disabled = true;
    }

  var disableElem = true;
  var enableElem = false;
    function enabledDisabled(param)
    {
        d.getElementById('frm2200M:amendedRtn_1').disabled = param;
        d.getElementById('frm2200M:amendedRtn_2').disabled = param;
        d.getElementById('frm2200M:txtMonth1').disabled = param;
        d.getElementById('frm2200M:txtDate').disabled = param;
        d.getElementById('frm2200M:txtForYr').disabled = param;
    d.getElementById('frm2200M:txtSheets').disabled = param;
    d.getElementById('frm2200M:txtTIN1').disabled = param;
    d.getElementById('frm2200M:txtTIN2').disabled = param;
    d.getElementById('frm2200M:txtTIN3').disabled = param;
    d.getElementById('frm2200M:txtBranchCode').disabled = param;
    d.getElementById('frm2200M:txtRDOCode').disabled = param;
    d.getElementById('frm2200M:txtLineBus').disabled = param;
    d.getElementById('frm2200M:txtTaxpayerName').disabled = param;
    d.getElementById('frm2200M:txtTelNum').disabled = param;
    d.getElementById('frm2200M:txtAddress').disabled = param;
    d.getElementById('frm2200M:txtZipCode').disabled = param;
        d.getElementById('frm2200MoptRegion').disabled = param;
        d.getElementById('frm2200MoptProvince').disabled = param;
        d.getElementById('frm2200MoptCity').disabled = param;
        d.getElementById('frm2200M:txtPlaceofProd').disabled = param;
        d.getElementById('frm2200MoptRegion1').disabled = param;
        d.getElementById('frm2200MoptProvince1').disabled = param;
        d.getElementById('frm2200MoptCity1').disabled = param;
        d.getElementById('frm2200M:txtPlaceofRem').disabled = param;
        d.getElementById('frm2200M:optTreaty_1').disabled = param;
        d.getElementById('frm2200M:optTreaty_2').disabled = param;

        if(d.getElementById('frm2200M:optTreaty_1').checked){
            d.getElementById('frm2200M:lstTaxTreaty').disabled = param;
        }

        d.getElementById('frm2200M:chkPymntManner_1').disabled = param;
        d.getElementById('frm2200M:chkPymntManner_2').disabled = param;

        if( d.getElementById('frm2200M:chkPymntManner_2').checked){
            d.getElementById('frm2200M:txtOthMannerofPymnt').disabled = param;
        }

        d.getElementById('frm2200M:btnSched1').disabled = param;
        d.getElementById('frm2200M:txtTax18A').disabled = param;
        d.getElementById('frm2200M:txtTax24A').disabled = param;
        d.getElementById('frm2200M:txtTax20').disabled = param;
    d.getElementById('frm2200M:txtTax22A').disabled = param;
    d.getElementById('frm2200M:txtTax22B').disabled = param;
    d.getElementById('frm2200M:txtTax22C').disabled = param;

        if(!param) {
            if(d.getElementById('frm2200M:amendedRtn_1').checked) {
                d.getElementById('frm2200M:txtTax20').disabled = false;
            } else {
                d.getElementById('frm2200M:txtTax20').disabled = true;
            }
        }
    disableElem;
    enableElem;
    }
  
  
    function sched1OK()
    {
        if(isValidDataOnSched1()){
            d.getElementById('frm2200M:txtTax17').value = d.getElementById('frm2200M:totalTaxDue').value;

            hideSched1();

            compute19();
        }
    }

    function compute18C()
    {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm2200M:txtTax18A').value)*1) + (NumWithComma(d.getElementById('frm2200M:txtTax18B').value)*1);

        d.getElementById('frm2200M:txtTax18C').value = formatCurrency((total).toFixed(2));

        compute19();
    }

    function compute19()
    {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm2200M:txtTax17').value)*1) - (NumWithComma(d.getElementById('frm2200M:txtTax18C').value)*1);

        d.getElementById('frm2200M:txtTax19').value = formatCurrency((total).toFixed(2));

        compute21();
    }

    function compute21()
    {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm2200M:txtTax19').value)*1) - (NumWithComma(d.getElementById('frm2200M:txtTax20').value)*1);

        d.getElementById('frm2200M:txtTax21').value = formatCurrency((total).toFixed(2));

        compute23();
    }
  function compute22D()
  {
    d.getElementById('frm2200M:txtTax22D').value = formatCurrency((NumWithComma(d.getElementById('frm2200M:txtTax22A').value)*1) + (NumWithComma(d.getElementById('frm2200M:txtTax22B').value)*1) + (NumWithComma(d.getElementById('frm2200M:txtTax22C').value)*1));
    compute23();
    payPenalties();
  }
  function payPenalties()
  {
    if(d.getElementById('frm2200M:PayPenalties').checked){
      d.getElementById('frm2200M:txtTax24B').value = d.getElementById('frm2200M:txtTax22D').value;
    }
    else{
      d.getElementById('frm2200M:txtTax24B').value = "0.00";
    }
    compute24C();
  }
    function compute23()
    {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm2200M:txtTax21').value)*1) + (NumWithComma(d.getElementById('frm2200M:txtTax22D').value)*1);
    //total = (NumWithComma(d.getElementById('frm2200M:txtTax21').value)*1);

        d.getElementById('frm2200M:txtTax23').value = formatCurrency((total).toFixed(2));

        compute25();
    }

    function compute24C()
    {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm2200M:txtTax24A').value)*1) + (NumWithComma(d.getElementById('frm2200M:txtTax24B').value)*1);

        d.getElementById('frm2200M:txtTax24C').value = formatCurrency((total).toFixed(2));

        compute25();
    }

    function compute25()
    {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm2200M:txtTax23').value)*1) - (NumWithComma(d.getElementById('frm2200M:txtTax24C').value)*1);

        d.getElementById('frm2200M:txtTax25').value = formatCurrency((total).toFixed(2));
    capital();
    }
  function initialValidateBeforeSave() {
    var dt = new Date();
    var isLeap = new Date(document.getElementById('frm2200M:txtForYr').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm2200M:txtMonth1').selectedIndex==1 && document.getElementById('frm2200M:txtDate').value>28) {
      alert("Filing year is not a leap year.");
      return;
    }
    
    if (isLeap && document.getElementById('frm2200M:txtMonth1').selectedIndex==1 && document.getElementById('frm2200M:txtDate').value>29) {
      alert("Invalid date entry.");
      return;
    }
    
        if(d.getElementById('frm2200M:txtForYr').value == "")
        {
            alert("Please enter valid year on item 1.");
            return;
        }
       
        if(d.getElementById('frm2200M:txtForYr').value*1 < 1900)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }
        if(d.getElementById('frm2200M:txtDate').value*1 > 31 || d.getElementById('frm2200M:txtDate').value == "")
        {
            alert("Please indicate a valid Day.")
            return;
        }
        if(d.getElementById('frm2200M:txtDate').value.length == 1)
        {
            alert("Please indicate a valid Day format.")
            return;
        }
    if( (d.getElementById('frm2200M:txtTIN1').value == "" || d.getElementById('frm2200M:txtTIN2').value == "" || d.getElementById('frm2200M:txtTIN3').value == "" || d.getElementById('frm2200M:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 5.");
            return false;
    }
    
    if( (d.getElementById('frm2200M:txtTaxpayerName').value == "")  )
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
  $('.printSignFooterClass').css({ 'align':'center', 'width':'94%','display':'block','position':'relative','overflow':'visible','page-break-before':'avoid', 'background':'#ffffff' }); 
  $('.printSignFooterClass table').css({ 'width':'98% !important', 'max-width':'98% !important' }); 
  $('.printSignFooterClass td, .printSignFooterClass tr').css({ 'border':'1px !important' }); 
  $('.printSignFooterClass input, .printSignFooterClass select .printSignFooterClass label').css({ 'border':'0.1px !important', 'font-family': 'Arial, Helvetica, sans-serif !important', 'font-size': '7px !important', 'padding': '1px !important' });    
  
  $('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
 
  
  $('#formPaper').css({ 'border':'#000 3px solid' });
  
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
      
    }
    } 
  
    $('.printButtonClass').hide();
    $("#formPaper").show();
    $('#modalSched1').css({ 'display':'none' });

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
  
  //hideSchedulesOnPreview();
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
        document.getElementById(elem[i].id).style.fontSize="10px";        
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
    if ( $('#spanSchedules').css('display') != 'none' ) {
      
      document.getElementById('spanPage1').style.display = 'block';   
      $('#spanSchedules').hide('blind');
    }
}
function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                
                var data = form.serialize();
                save('2200M',data);
                
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
        saveAndExit('2200M',data);
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

        submitAndSave('2200M', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2200M';
    } 
</script>
@endsection