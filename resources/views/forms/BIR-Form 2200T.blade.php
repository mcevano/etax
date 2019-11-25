@extends('layouts.app')
@section('title', '| BIR Form No. 2200T')

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
        <button type="button" class="btn btn-danger btn-exit" id="2200T" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="2200T" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='2200T' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 857px; ">
                <div id="formPaper">
                    <div id="MainContent" class="noCellSpace" style="display:block;">
                        <table style="width: 856px;" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table style="width: 856px;" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
                                        <tr>
                                            <td style="width:82px;"  style='padding:0px;' valign="middle" align="center">                   
                            <p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p>
                          </td>
                                            <td style="width:180px;" valign="middle" nowrap>
                          <label face="Arial" size="1px">Republika ng Pilipinas
                                                <br/>Kagawaran ng Pananalapi
                                                <br/>Kawanihan ng Rentas Internas</label>
                                            </td>
                                            <td style="width:424px;" align="center">
                                                <font size="5px" style="font-weight:bold;">EXCISE TAX
                          <br/>RETURN
                          <br/>for TOBACCO PRODUCTS</font>
                                            </td>
                                            <td style="width:200px;" valign="center">
                                                <font face="Arial" size="1px">BIR Form No.<br/></font>
                                                <font face="Arial" size="6px">2200-T<br/></font>
                                                <font face="Arial" size="1px">April 2014 (ENCS)</font>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="width:856px;" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td style="width:317px;" valign="top" class="tblFormTd">
                                                <table style="width:254px;" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="10%"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width="20%" nowrap><font size="1" style="font-size: 11px;">Date (MM/DD/YYYY)</font></td>
                                                        <td width="70%" nowrap>
                                                            <font color="black" face="Arial" size="2">
                                                                <select id="frm2200T:txtMonth1" name="frm2200T:txtMonth1" size="1" onblur="validateDate();"
                                                                style="width: 40px">
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
                                                            <input id="frm2200T:txtDate" maxlength="2" name="frm2200T:txtDate" size="1" style="" type="text" value="" onblur="blockLetterInt(this);validateDate();" onkeypress="return wholenumber(this, event)" />
                                                            <input id="frm2200T:txtForYr" maxlength="4" name="frm2200T:txtForYr" size="3" style="" type="text" value="" onblur="blockLetterInt(this);validateDate();setATCSchedule1(this.value);changeTaxRatePerYear();" onkeypress="return wholenumber(this, event)" />
                                                        </td>
                                                    </tr>   
                                                </table>
                                            </td>
                                            <td valign="top" class="tblFormTd">
                                                <table style="width:202px;" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td style="width:10px;" nowrap><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td style="width:110px;" nowrap><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm2200T:j_id217" >
                                                                <div align="center" style="padding: 0px 0 0px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="radio" value="Y" name="frm2200T:amendedRtn" id="frm2200T:amendedRtn_1" onclick="d.getElementById('frm2200T:txtTax19').disabled = false;d.getElementById('frm2200T:txtTax19').style.backgroundColor = '#ffffff';" disabled="disabled" /><label for="frm2200T:j_id217:_1" style="font-size:10px;">Yes</label></td>
                                                                                <td><input type="radio" value="N"  name="frm2200T:amendedRtn" id="frm2200T:amendedRtn_2" onclick="d.getElementById('frm2200T:txtTax19').disabled = true;d.getElementById('frm2200T:txtTax19').value = '0.00';compute20();d.getElementById('frm2200T:txtTax19').style.backgroundColor = '#e2e2e2';" disabled="disabled" checked="checked" /><label for="frm2200T:j_id217:_2" style="font-size:10px;">No</label></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td valign="top" class="tblFormTd">
                                                <table style="width:250px;" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td style="width:8px;" nowrap><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Number of Sheet/s Attached?</font></td>
                                                        <td><input type="text" value="0" style="text-align: right;" size="4" name="frm2200T:txtSheets" maxlength="2" id="frm2200T:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)"  disabled/></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="width:856px;" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table style="width:854px;" height="17" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <div align="center"><font size="2px"><b>Part I - Background Information</b></font></div>
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
                                    <table style="width:856px;" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td style="width:690px;" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td style="width:11px;"><font size="2" style="font-weight:bold">&nbsp;4&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">Taxpayer Identification Number (TIN)&nbsp;&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->tin1}}"  size="2" name="frm2200T:txtTIN1" maxlength="3" id="frm2200T:txtTIN1" onkeypress="return wholenumber(this, event)"  disabled/>
                                                                <input type="text" value="{{$company->tin2}}"  size="2" name="frm2200T:txtTIN2" maxlength="3" id="frm2200T:txtTIN2" onkeypress="return wholenumber(this, event)"  disabled/>
                                                                <input type="text" value="{{$company->tin3}}"  size="2" name="frm2200T:txtTIN3" maxlength="3" id="frm2200T:txtTIN3" onkeypress="return wholenumber(this, event)"  disabled/>
                                                                <input type="text" value="{{$company->tin4}}"  size="2" name="frm2200T:txtBranchCode" maxlength="3" id="frm2200T:txtBranchCode" onkeypress="return letternumber(event)" disabled/>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="width:160px;" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td style="width:80px;"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                        <td id="rdoSelect"> 
                                                            <select class='iceSelOneMnu' id='frm2200T:txtRDOCode' name='frm2200T:txtRDOCode' size='1' disabled>
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
                                    <table style="width:856px;" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td style="width:856px;" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td style="width:11px;"><font size="2" style="font-weight:bold;">&nbsp;6&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Taxpayer's Name <em>(Last Name, First Name, Middle Name for Individual) / (Registered Name for Non-Individual)</em></font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td colspan="2">&nbsp;<input type="text" value="{{$company->registered_name}}" style="width:98%" name="frm2200T:taxpayerName" maxlength="70" id="frm2200T:taxpayerName" onblur="checkIfValidValues(this); return capitalize(this, event)" onkeypress="return Name(this, event)"  disabled/></td>
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
                                    <table style="width:856px;" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td style="width:630px;" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td style="width:11px;"><font size="2" style="font-weight:bold;">&nbsp;7&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Registered Address <em>(indicate complete registered address)</em></font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>                                                                   
                                                                    <td colspan="2">&nbsp;<input type="text" value="{{$company->address}}"  style="width:98%;" name="frm2200T:txtAddress" maxlength="70" id="frm2200T:txtAddress" onblur="checkIfValidValues(this); return capitalize(this, event)" onkeypress="return Address(this, event)" disabled/></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="width:226px;" valign="top" class="tblFormTd">
                                                <table  border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td ><font size="2" style="font-weight:bold;">&nbsp;7A&nbsp;</font><font size="1" style="font-size: 11px;">&nbsp;Zip Code</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                          <input type="text" value="{{$company->zip_code}}"  style="width:98%;" name="frm2200T:txtZipCode" maxlength="4" id="frm2200T:txtZipCode" onkeypress="return wholenumber(this, event)" onblur="checkIfValidValues(this);" disabled/>
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
                                    <table style="width:856px;" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td style="width:353px;" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td style="width:11px;"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Contact Number</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                  <td colspan="2"><input type="text" value="{{$company->tel_number}}" style="width:99%;" name="frm2200T:txtTelNum" maxlength="20" id="frm2200T:txtTelNum" onkeypress="return wholenumber(this, event)" onblur="checkIfValidValues(this);" disabled/></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="width:352px;" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td style="width:11px;"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Main Line of Business</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td colspan="2"><input type="text" value="{{$company->line_business}}" disabled=""  style="width:99%;" name="frm2200T:txtLineBus" maxlength="30" id="frm2200T:txtLineBus" onblur="checkIfValidValues(this); return capitalize(this, event)" onkeypress="return Name(this, event)"/></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="width:145px;" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td style="width:11px;"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font></td>
                                                                    <td><font size="1">PSIC</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td colspan="2"><input type="text" value="" style="width:98%;" name="frm2200T:txtPSIC" maxlength="6" id="frm2200T:txtPSIC" onblur="checkIfValidValues(this);" onkeypress="return wholenumber(this, event)"/></td>
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
                            <!--As of 04/28/2014 New Requirement (new field: Email Address) based on SRS-->
                            <tr>
                                <td>
                                    <table style="width:856px;" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">11&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Email Address</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    
                                                                    <td colspan="2">&nbsp;<input type="text" value="{{$company->email_address}}" style="width:98%;"  name="frm2200T:txtEmailAddress" maxlength="60" id="frm2200T:txtEmailAddress" disabled="disabled" onkeypress="return emailAddress(this);" onblur="validateEmail(this);"/></td>
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
                                    <table style="width:856px;" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>                                        
                                            <td colspan="2" valign="top" class="tblFormTd">
                                                
                                                <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><font size="2"><strong>12&nbsp;</strong></font>Place of Production</font>
                                                
                                            </td>                                                  
                                        </tr>
                                        <tr>
                                            <td colspan="2" valign="top" class="tblFormTd">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <!--<td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">&nbsp; &nbsp;</font></strong></font></td>-->
                                                        <td width="31%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;&nbsp;Region<br /></font>&nbsp;
                                                            <select id="frm2200ToptRegion" name="frm2200ToptRegion" size="1" style="width: 200px" onchange="getProvince(this.value, 'frm2200ToptProvince', 'frm2200ToptCity');">
                                                                <option value="00">(Select Region)</option>
                                                            </select>
                                                        </td>
                                                        <td width="32%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Province<br /></font>
                                                            <select id="frm2200ToptProvince" name="frm2200ToptProvince" size="1" style="width: 195px" onchange="getCity('frm2200ToptRegion', 'frm2200ToptProvince', 'frm2200ToptCity');">
                                                                <option value="00">(Select Province)</option>
                                                            </select>
                                                        </td>
                                                        <td width="31%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">City<br /></font>
                                                            <select id="frm2200ToptCity" name="frm2200ToptCity" size="1" style="width: 190px">
                                                                <option value="00">(Select City)</option>
                                                            </select>
                                                        </td>
                                                        <td width="6%">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table style="width:856px;" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                                    <tr>
                                                        <td colspan="2" valign="top" class="tblFormTd">
                                                           <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><font size="2"><strong>13&nbsp;</strong></font>Place of Removal</font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" valign="top" class="tblFormTd">
                                                <table border="0" cellpadding="0" cellspacing="0" style="width:856px;" >
                                                    <tr>
                                                        <!--<td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">&nbsp; &nbsp;</font></strong></font></td>-->
                                                        <td width="31%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;&nbsp;Region<br /></font>&nbsp;
                                                            <select id="frm2200ToptRegion1" name="frm2200ToptRegion1" size="1" style="width:200px" onchange="getProvince(this.value, 'frm2200ToptProvince1', 'frm2200ToptCity1')" >
                                                                <option value="00">(Select Region)</option>
                                                            </select></td>
                                                        <td width="32%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Province<br /></font>
                                                            <select id="frm2200ToptProvince1" name="frm2200ToptProvince1" size="1" style="width: 195px" onchange="getCity('frm2200ToptRegion1', 'frm2200ToptProvince1', 'frm2200ToptCity1')" >
                                                                <option value="00">(Select Province)</option>
                                                            </select>
                                                        </td>
                                                        <td width="31%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">City<br /></font>
                                                            <select id="frm2200ToptCity1" name="frm2200ToptCity1" size="1"  style="width: 190px">
                                                                <option value="00">(Select City)</option>
                                                            </select>
                                                        </td>
                                                        <td width="6%">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" valign="top" class="tblFormTd">
                                                <table border="0" cellpadding="0" cellspacing="0" style="width:856px;">
                                                    <tr>
                                                        <td style="width:20px;"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">14</font></strong></font></td>
                                                        <td style="width:198px;">
                                                          <label face="Arial, Helvetica, sans-serif" size="1">
                                                          Are you availing of tax relief under Special Law or International Tax Treaty?
                                                          </label>
                                                        </td>
                                                        <td style="width:156px;">
                                                            <fieldset id="frm2200T:optTreaty" style="font-family: Arial, Helvetica, sans-serif; font-size : 10px;">
                                                                <table border="0" cellpadding="0" cellspacing="0" >
                                                                    <tr>
                                                                        <td>
                                                                            <input id="frm2200T:optTreaty_1" name="frm2200T:optTreaty" type="radio" value="Y" onclick="changeTreaty()"/>
                                                                            <label for="frm2200T:optTreaty:_1">Yes</label>
                                                                        </td>
                                                                        <td>
                                                                            <input checked="checked" id="frm2200T:optTreaty_2" name="frm2200T:optTreaty" type="radio" value="N" onclick="changeTreaty()"/>
                                                                            <label for="frm2200T:optTreaty:_2">No</label>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </fieldset>
                                                        </td>
                                                        <td style="width:19px;"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">14A</font></strong></font></td>
                                                        <td style="width:67px;"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">If yes, specify</font></td>
                                                        <td style="width:238px;">
                                                             <select disabled="disabled" id="frm2200T:lstTaxTreaty" name="frm2200T:lstTaxTreaty" size="1" style="background-color: white; font-family: Arial, Helvetica, sans-serif;">
                                                                <option value="0"></option>
                                                                <option value="1">Special Law</option>
                                                                <option value="2">International Tax Treaty</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" valign="top" class="tblFormTd"><table border="0" style="width:856px;">
                                                    <tr>
                                                        <td><div align="center"><font size="2px"><b>Part II - Manner Of Payment</b></font></div></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" valign="top" class="tblFormTd" style="font-family: Arial, Helvetica, sans-serif; font-size : 10px;">
                                                <table style="width:856px;" height="25" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">15</font></strong></font></td>
                                                        <td colspan="2" width="47%" nowrap>
                                                            <table border="0" cellpadding="0" cellspacing="0" >
                                                                <tr>
                                                                    <td>
                                                                        <input id="frm2200T:chkPymntManner_1" name="frm2200T:chkPymntManner"  type="radio" value="Y" onclick="changeMannerOfPayment(); dateMonthYear(); disableItem22();recomputePaymentActual();d.getElementById('frm2200T:txtForYr').onblur()" />
                                                                        <label for="frm2200T:chkPymntManner:_1">Payment on Actual Removal </label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="50%" nowrap>
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">16</font></strong></font>
                                                            <input id="frm2200T:chkPymntManner_2" name="frm2200T:chkPymntManner"  type="radio" value="N1" 
                                                                onclick="changeMannerOfPayment(); dateMonthYear();disableItem22();recomputePrepayment();d.getElementById('frm2200T:txtTax23A').focus();" />
                                                            <label for="frm2200T:chkPymntManner:_2">Prepayment/Advance Deposit</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">17</font></strong></font></td>
                                                         <td colspan="3"  nowrap>
                                                             <input id="frm2200T:chkPymntManner_3" name="frm2200T:chkPymntMannerOther"  type="checkbox" value="N2" onclick="changeMannerOfPayment(); dateMonthYear()" disabled/>
                                                             <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Other Similar Schemes <em>(specify)</em></font>&nbsp;&nbsp;
                                                             <input disabled="true" id="frm2200T:txtOthMannerofPymnt" maxlength="50" name="frm2200T:txtOthMannerofPymnt" size="25"
                                                                type="text" value="" onblur="return capitalize(this, event)"  disabled="disabled" onkeypress="return Name(this, event)"
                                                                style="background-color: rgb(220, 220, 220);"/>
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
                                    <table style="width:856px;" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                
                                                <div align="center"><font size="2px"><b>Part III - Payments and Application</b></font></div>
                                                       
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="width:856px;" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table style="width:856px;" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td><div align="center"><font color="black" face="Arial" size="1" style="font-size: 11px;">Amount</font></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:29px;"><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;&nbsp;</font></td>
                                                        <td style="width:408px;"><font color="black" face="Arial" size="1" style="font-size: 11px;">Excise Tax Due </font>
                                                            <font color="black" face="Arial" size="1">
                                                              <a href="#" id="frm2200T:btnSchedule1" onclick="showSched1();enabledDisabled(d.getElementById('frm2200T:cmdValidate').disabled);"><em>(from Schedule 1)</em></a>
                                                            </font>
                                                        </td>
                                                        <td style="width:217px;">
                                                            <div class="spacePadder"></div>
                                                        </td>
                                                        
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 10px;">18</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" name="frm2200T:txtTax18" maxlength="25" id="frm2200T:txtTax16" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;</font></td>
                                                        <td><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Less:&nbsp;&nbsp; <b>19A</b> Balance Carried Over from Previous Return</font></td>
                                                        <td>
                                                            &nbsp;
                                                        </td>
                                                        <td><font size="2" style="font-weight:bold;">19A</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200T:txtTax19A" maxlength="25" id="frm2200T:txtTax17A" onblur="roundDownWithAlert(this); compute17C(this)" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>19B</b> Creditable Excise Tax, if applicable</font></td>
                                                        <td>&nbsp;</td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">19B</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200T:txtTax19B" maxlength="25" id="frm2200T:txtTax17B" disabled="true" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>19C</b> Total <em>(Sum of Items 19A and 19B)</em></font></td>
                                                        <td>&nbsp;</td>
                                                        <td><div align="justify"><span class="spacePadder"><font size="2" style="font-weight:bold;">19C</font>
                                                                    <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200T:txtTax19C" maxlength="25" id="frm2200T:txtTax17C" disabled="true" />
                                                                </span></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font></td>
                                                        <td colspan="2"><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Net Tax Due / (Overpayment) <em>(Item 18 less Item 19C)</em></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font>
                                                        </td>
                                                        <td><div align="justify"><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 10px;">20</font>
                                                                    <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200T:txtTax20" maxlength="25" id="frm2200T:txtTax18" disabled="true" />
                                                                </span></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: Payment on Returns Previously Filed for the Same Period, if amended return</font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 10px;">21</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200T:txtTax21" maxlength="25" id="frm2200T:txtTax19" onblur="roundDownWithAlert(this);compute20(this);" disabled="true" onkeypress="return numbersonly(this, event);"/>
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Tax Still Due / (Overpayment) <em>(Item 20 less Item 21)</em></font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 10px;">22</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200T:txtTax22" maxlength="25" id="frm2200T:txtTax20" disabled="true" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">&nbsp;Add: Penalties</font></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>23A</b> Surcharge</font></td>
                                                        <td>
                                                             <span class="spacePadder"><font size="2" style="font-weight:bold;">23A</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200T:txtTax23A" maxlength="25" id="frm2200T:txtTax21A" onblur="roundDownWithAlert(this); compute21D(this);" onkeypress="return numbersonly(this, event)"  />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>23B</b> Interest</font></td>
                                                        <td>
                                                            <span class="spacePadder"><font size="2" style="font-weight:bold;">23B</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200T:txtTax23B" maxlength="25" id="frm2200T:txtTax21B" onblur="roundDownWithAlert(this); compute21D(this);" onkeypress="return numbersonly(this, event)" />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>23C</b> Compromise</font></td>
                                                        <td>
                                                            <span class="spacePadder"><font size="2" style="font-weight:bold;">23C</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200T:txtTax23C" maxlength="25" id="frm2200T:txtTax21C" onblur="roundDownWithAlert(this); compute21D(this);" onkeypress="return numbersonly(this, event)" />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>23D</b> Total Penalties <em>(Sum of Items 23A to 23C)</em></font></td>
                                                        <td>
                                                            <font size="2" style="font-weight:bold;">23D</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200T:txtTax23D" maxlength="25" id="frm2200T:txtTax21D" disabled="true" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Amount Payable <em>(Sum of Items 22 and 23D)</em></font></td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 10px;">24</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200T:txtTax24" maxlength="25" id="frm2200T:txtTax22" disabled="true" class="iceInpTxt-dis" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;25&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: &nbsp;&nbsp;&nbsp; Payment Made Today</font></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>25A</b> Tax Payment / Deposit</em></font></td>
                                                        <td>
                                                            <span class="spacePadder"><font size="2" style="font-weight:bold;">25A</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200T:txtTax25A" maxlength="25" id="frm2200T:txtTax23A" onblur="roundDownWithAlert(this); compute23C(this)" onkeypress="return numbersonly(this, event)" />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2">
                                                            <font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>25B</b> Penalties <em>(from Item 23D)</em></font>&nbsp;
                                                             <input id="frm2200T:PayPenalties" name="frm2200T:PayPenalties" type="checkbox" onclick="payPenalties(this)" disabled/>
                                                            <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Pay Penalties?</font>
                                                        </td>
                                                        <td>
                                                            <span class="spacePadder"><font size="2" style="font-weight:bold;">25B</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200T:txtTax25B" maxlength="25" id="frm2200T:txtTax23B" disabled="true" />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>25C</b> Total Payment Made Today <em>(Sum of Items 25A & 25B)</em></font></td>
                                                        <td>
                                                            <span class="spacePadder"><font size="2" style="font-weight:bold;">25C</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200T:txtTax25C" maxlength="25" id="frm2200T:txtTax23C" disabled="true" />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;26&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Balance to be Carried Over to Next Return <em>(Item 24 less Item 25C)</em></font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 10px;">26</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200T:txtTax26" maxlength="25" id="frm2200T:txtTax24" disabled="true" />
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
                                    <table width="850" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table width="850" cellspacing="0" cellpadding="0" border="0">
                                                                <tbody>
                                                                    <tr valign="middle">
                                                                        <td width="73"></td>
                                                                        <td width="640">
                                                                            <div id="frm2200T:j_id743" class="icePnlGrp">
                                                                                <div align="center">
                                                                                    @if($action != 'view')
                                                                                    <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm2200T:cmdValidate" id="frm2200T:cmdValidate" onclick="validateForm()" />
                                                                                    <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm2200T:cmdEdit" id="frm2200T:cmdEdit" onclick="editForm()"/>
                                                                                    <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                    <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printOCR();" />
                                                                                    <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2200T:btnFinalCopy" id="frm2200T:btnFinalCopy" onclick="submitForm();" />
                                                                                      @else
                                                                                     <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printOCR();" />
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

                        </table>

                    </div>
                    <table> 
                        <tr>
                                  <td>
                                    <div class="footer footer2200S" style="padding:6px; text-align: center; font-size: 11px; background-color: white; width: 855px;">
                                      <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                                    </div>
                                  </td>
                                </tr>
                    </table>

                    <div id="PrintMainContent" style="display:none;width:850px; height:1300px;font-family: Arial; margin:0; overflow: hidden;">
                        <img src="{{ asset('images/Print/2200-T-Pg1.png') }}" style="position: absolute; background-color: white; top: -17px; left: -25px; width: 850px; height: 1300px; margin: 0; padding: 0;" />
                            
                                <div>                                  
                                    <div style=" float:left; position:absolute; left:151px; top:135px; letter-spacing:8px; "><span id="txtMonth1" class='smallBold'>01</span></div>         
                                    <div style=" float:left; position:absolute; left:216px; top:135px; letter-spacing:8px; right: 648px;"><span id="txtDate" class='smallBold'>02</span></div>  
                                    <div style=" float:left; position:absolute; left:278px; top:135px; letter-spacing:12px;"><span id="txtForYr" class='smallBold'>2013</span></div>  
                                    <div style=" float:left; position:absolute; left:482px; top:135px; "><span id="amendedRtn_1" class='smallBold'>X</span></div>
                                    <div style=" float:left; position:absolute; left:530px; top:135px; right: 334px;"><span id="amendedRtn_2" class='smallBold'>X</span></div>  
                                    <div style=" float:left; position:absolute; top:135px; letter-spacing:5px; width: 8px; left: 760px;"><span id="txtSheets" class='smallBold'>12</span></div> 
                                </div>
                                <div> 
                                    <div style=" float:left; position:absolute; left:297px; top:175px; letter-spacing:13px;"><span id="txtTIN1" class='smallBold'>123</span></div>  
                                    <div style=" float:left; position:absolute; left:380px; top:175px; letter-spacing:13px; right: 367px;"><span id="txtTIN2" class='smallBold'>123</span></div>  
                                    <div style=" float:left; position:absolute; left:464px; top:175px; letter-spacing:13px;"><span id="txtTIN3" class='smallBold'>123</span></div>  
                                    <div style=" float:left; position:absolute; left:552px; top:175px; letter-spacing:13px; width: 57px;"><span id="txtBranchCode" class='smallBold'>0000</span></div>
                                    <div style=" float:left; position:absolute; left:742px; top:175px; letter-spacing:5px; width: 35px;"><span id="txtRDOCode" class='smallBold'>456</span></div>
                                </div>  
                                <div>
                                    <div style=" float:left; position:absolute; left:19px; top:211px; width:770px; overflow:hidden; white-space: nowrap;"><span id="taxpayerName" class='smallBold' style="letter-spacing:2pt;">ACE DELA CRUZ</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:19px; top:248px; width:770px; overflow:hidden; white-space: nowrap;"><span id="txtAddress" class='smallBold' style="letter-spacing:2pt;">ACE DELA CRUZ</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:19px;  top:268px; width:600px; overflow:hidden; white-space: nowrap;"><span id="txtAddress2" class='smallBold' style="letter-spacing:2pt;">ACD EDKASL</span></div>
                                    <div style=" float:left; position:absolute; left:727px; top:268px; width:45px; overflow:hidden; white-space: nowrap;"><span id="txtZipCode" class='smallBold' style="letter-spacing:5px;">1234</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:19px;  top:309px; width:245px;"><span id="txtTelNum" class='smallBold'  style="letter-spacing:2pt;">09183751314</span></div>
                                    <div style=" float:left; position:absolute; left:279px; top:309px; width:383px; overflow:hidden; white-space: nowrap;  "><span id="txtLineBus" class='smallBold' style="letter-spacing:2pt;">MAIN LINE OF BUSINESS</span></div>
                                    <div style=" float:left; position:absolute; left:674px; top:309px; width:68px; overflow:hidden; white-space: nowrap;"><span id="txtPSIC" class='smallBold' style="letter-spacing:5px;">101158</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:19px; top:345px; width:770px; overflow:hidden; white-space: nowrap; "><span id="txtEmailAddress" class='smallBold' style="letter-spacing:2pt;">sampleEmail@yahoo.com.ph</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:15px;  top:398px; width:95px; overflow:hidden; white-space: nowrap; "><span id="optRegion" class='smallBold' style="letter-spacing:1pt;">REGION 1</span></div>
                                    <div style=" float:left; position:absolute; left:124px; top:398px; width:378px; overflow:hidden; white-space: nowrap; "><span id="optProvince" class='smallBold' style="letter-spacing:2pt;">SAMPLE PROVINCE</span></div>
                                    <div style=" float:left; position:absolute; left:516px; top:398px; width:270px; overflow:hidden; white-space: nowrap; "><span id="optCity" class='smallBold' style="letter-spacing:2pt;">SAMPLE CITY</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:15px;  top:450px; width:95px; overflow:hidden; white-space: nowrap; "><span id="optRegion1" class='smallBold' style="letter-spacing:1pt;">REGION 1</span></div>
                                    <div style=" float:left; position:absolute; left:124px; top:450px; width:378px; overflow:hidden; white-space: nowrap; "><span id="optProvince1" class='smallBold' style="letter-spacing:2pt;">SAMPLE PROVINCE</span></div>
                                    <div style=" float:left; position:absolute; left:516px; top:450px; width:270px; overflow:hidden; white-space: nowrap; "><span id="optCity1" class='smallBold' style="letter-spacing:2pt;">SAMPLE CITY</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:194px; top:483px; right: 577px;"><span id="optTreaty_1" class='smallBold' style="letter-spacing:8px;">X</span></div>
                                    <div style=" float:left; position:absolute; left:253px; top:484px; "><span id="optTreaty_2" class='smallBold' style="letter-spacing:8px;">X</span></div>
                                    <div style=" float:left; position:absolute; left:339px; top:489px; width:448px; overflow:hidden; white-space: nowrap; "><span id="lstTaxTreaty" class='smallBold' style="letter-spacing:2pt;">PLEASE SPECIFY</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:44px; top:527px; right: 711px;"><span id="chkPymntManner_1" class='smallBold' style="letter-spacing:8px;">X</span></div>
                                    <div style=" float:left; position:absolute; left:278px; top:529px; "><span id="chkPymntManner_2" class='smallBold' style="letter-spacing:8px;">X</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:44px; top:552px; right: 712px;"><span  id="chkPymntManner_3" class='smallBold' style="letter-spacing:8px;">X</span></div>
                                    <div style=" float:left; position:absolute; left:254px; top:553px; width:535px; overflow:hidden; white-space: nowrap; "><span  id="txtOthMannerofPymnt" class='smallBold' style="letter-spacing:2pt;">PLEASE SPECIFY</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:548px; top:592px; width: 175px;text-align: right;"><span id="txtTax16" class='smallBold' style="letter-spacing:1pt;">1234567891</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:614px; width: 175px;text-align: right;"><span id="txtTax17A" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:635px; width: 175px;text-align: right;"><span id="txtTax17B" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:657px; width: 175px;text-align: right;"><span id="txtTax17C" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:678px; width: 175px;text-align: right;"><span id="txtTax18" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:700px; width: 175px;text-align: right;"><span id="txtTax19" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:720px; width: 175px;text-align: right;"><span id="txtTax20" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:741px; width: 175px;text-align: right;"><span id="txtTax21A" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:762px; width: 175px;text-align: right;"><span id="txtTax21B" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:782px; width: 175px;text-align: right;"><span id="txtTax21C" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:804px; width: 175px;text-align: right;"><span id="txtTax21D" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:824px; width: 175px;text-align: right;"><span id="txtTax22" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:847px; width: 175px;text-align: right;"><span id="txtTax23A" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:868px; width: 175px;text-align: right;"><span id="txtTax23B" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:889px; width: 175px;text-align: right;"><span id="txtTax23C" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                    <div style=" float:left; position:absolute; left:548px; top:910px; width: 175px;text-align: right;"><span id="txtTax24" class='smallBold' style="letter-spacing:1pt;">1234567890</span></div>
                                
                                   <!-- DECIMAL PLACES -->
                                    <div style=" float:left; position:absolute; left:754px; top:592px; width: 30px;"><span id="txtTax16_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:614px; width: 30px;"><span id="txtTax17A_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:635px; width: 30px;"><span id="txtTax17B_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:657px; width: 30px;"><span id="txtTax17C_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:678px; width: 30px;"><span id="txtTax18_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:700px; width: 30px;"><span id="txtTax19_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:720px; width: 30px;"><span id="txtTax20_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:741px; width: 30px;"><span id="txtTax21A_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:762px; width: 30px;"><span id="txtTax21B_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:782px; width: 30px;"><span id="txtTax21C_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:804px; width: 30px;"><span id="txtTax21D_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:824px; width: 30px;"><span id="txtTax22_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:847px; width: 30px;"><span id="txtTax23A_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:868px; width: 30px;"><span id="txtTax23B_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:889px; width: 30px;"><span id="txtTax23C_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                    <div style=" float:left; position:absolute; left:754px; top:910px; width: 30px;"><span id="txtTax24_2" class='smallBold' style="letter-spacing:1pt;">00</span></div>
                                </div>
                       <!-- </div>-->
                    </div>
                   
                    <div id="PrintmodalSched1" style="display:none;width:850px; height:1300px;font-family: Arial; margin:0; overflow: hidden;">
                        <img src="{{ asset('images/Print/2200-T-Pg2.png') }}"  style="position: absolute; background-color: white; top: -24px; left: -25px; width: 850px; height: 1300px; margin: 0; padding: 0;" />

                            
                            <div style="position: absolute; left:436px; top:86px; height: 16px; width: 106px;">
                                <div style=" float:left; position:absolute; left:-1px; top:77px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt02013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:90px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt02014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:103px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt02015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:116px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt02016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:130px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt02017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:192px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt12013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:205px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt12014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:219px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt12015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:232px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt12016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:246px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt12017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:296px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt22013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:310px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt22014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:323px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt22015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:336px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt22016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:350px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt22017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:388px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt32013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:401px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt32014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:415px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt32015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:428px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt32016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:442px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt32017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:516px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt42013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:530px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt42014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:543px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt42015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:557px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt42016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:570px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt42017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:608px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt52013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:621px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt52014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:635px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt52015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:648px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt52016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:662px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt52017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:700px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt62013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:714px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt62014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:727px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt62015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:740px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt62016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:754px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt62017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:816px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt72013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:829px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt72014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:842px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt72015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:856px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt72016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:870px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt72017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:897px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt82013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:911px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt82014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:924px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt82015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:937px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt82016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:950px;  width: 106px; text-align: right; height: 15px;"><span id="txtProExempt82017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:977px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsExempt0" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:991px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsExempt1" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1004px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsExempt2" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1023px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsExempt3" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:1065px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsExempt4" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1078px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsExempt5" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                            </div>

                             
                            <div style="position: absolute; left:563px; top:86px; height: 16px; width: 106px;">
                                <div style=" float:left; position:absolute; left:-1px; top:77px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable02013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:90px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable02014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:103px;  width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable02015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:116px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable02016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:130px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable02017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:192px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable12013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:205px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable12014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:219px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable12015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:232px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable12016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:246px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable12017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:296px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable22013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:310px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable22014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:323px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable22015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:336px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable22016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:350px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable22017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:388px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable32013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:401px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable32014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:415px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable32015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:428px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable32016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:442px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable32017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:516px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable42013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:530px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable42014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:543px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable42015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:557px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable42016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:570px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable42017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:608px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable52013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:621px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable52014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:635px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable52015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:648px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable52016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:662px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable52017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:700px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable62013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:714px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable62014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:727px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable62015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:740px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable62016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:754px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable62017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:816px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable72013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:829px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable72014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:842px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable72015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:856px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable72016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:870px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable72017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:897px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable82013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:911px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable82014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:924px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable82015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:937px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable82016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:950px;   width: 106px; text-align: right; height: 15px;"><span id="txtProTaxable82017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:977px;   width: 106px; text-align: right; height: 15px;"><span id="txtInsTaxable0" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:991px;   width: 106px; text-align: right; height: 15px;"><span id="txtInsTaxable1" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1004px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsTaxable2" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1023px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsTaxable3" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>

                                <div style=" float:left; position:absolute; left:-1px; top:1065px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsTaxable4" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1078px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsTaxable5" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                            </div>

                            
                            <div style="position: absolute; left:684px; top:86px; height: 16px; width: 106px;">
                                <div style=" float:left; position:absolute; left:-1px; top:77px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue02013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:90px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue02014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:103px;  width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue02015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:116px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue02016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:130px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue02017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                                                                       
                                <div style=" float:left; position:absolute; left:-1px; top:192px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue12013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:205px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue12014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:219px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue12015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:232px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue12016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:246px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue12017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                                                                       
                                <div style=" float:left; position:absolute; left:-1px; top:296px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue22013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:310px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue22014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:323px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue22015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:336px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue22016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:350px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue22017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                                                                       
                                <div style=" float:left; position:absolute; left:-1px; top:388px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue32013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:401px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue32014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:415px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue32015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:428px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue32016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:442px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue32017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                                                                       
                                <div style=" float:left; position:absolute; left:-1px; top:516px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue42013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:530px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue42014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:543px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue42015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:557px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue42016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:570px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue42017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                                                                       
                                <div style=" float:left; position:absolute; left:-1px; top:608px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue52013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:621px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue52014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:635px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue52015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:648px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue52016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:662px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue52017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                                                                       
                                <div style=" float:left; position:absolute; left:-1px; top:700px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue62013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:714px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue62014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:727px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue62015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:740px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue62016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:754px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue62017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                                                                       
                                <div style=" float:left; position:absolute; left:-1px; top:816px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue72013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:829px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue72014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:842px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue72015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:856px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue72016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:870px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue72017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                                                                       
                                <div style=" float:left; position:absolute; left:-1px; top:897px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue82013" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:911px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue82014" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:924px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue82015" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:937px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue82016" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:950px;   width: 106px; text-align: right; height: 15px;"><span id="txtProBasicTaxDue82017" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                                                                       
                                <div style=" float:left; position:absolute; left:-1px; top:977px;   width: 106px; text-align: right; height: 15px;"><span id="txtInsBasicTaxDue0" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:991px;   width: 106px; text-align: right; height: 15px;"><span id="txtInsBasicTaxDue1" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1004px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsBasicTaxDue2" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1023px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsBasicTaxDue3" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                                                                       
                                <div style=" float:left; position:absolute; left:-1px; top:1065px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsBasicTaxDue4" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1078px;  width: 106px; text-align: right; height: 15px;"><span id="txtInsBasicTaxDue5" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                            </div>

                            <div style="position: absolute; left:15px; top:1176px; height: 16px; width: 106px;">
                                <div style=" float:left; position:absolute; left:19px; top:14px;  width: 14px; height: 15px;"><span id="txtsched1Atc0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:43px; top:14px;  width: 205px; height: 15px;"><span id="txtsched1Desc0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:255px; top:14px;  width: 87px; text-align: center; height: 14px;"><span id="txtsched1TaxBracket0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:349px; top:14px;  width: 56px; text-align: center; height: 12px;"><span id="txtsched1AppTaxRate0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:411px; top:14px;  width: 119px; text-align: right; height: 14px;"><span id="txtsched1Exempt0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:533px; top:14px;  width: 122px; text-align: right; height: 12px;"><span id="txtsched1Taxable0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:658px; top:14px;  width: 118px; text-align: right; height: 11px;"><span id="txtsched1BasicTaxDue0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:660px; top:30px;  width: 117px; text-align: right; height: 16px;"><span id="totalTaxDue" class='smallBold' style="font-size:11px;">000</span></div>
                            </div>

                    </div>

                    <div id="DummyTxt" style='display:none;'></div>

                </div>
                
            </div>
        </div>

        <!--Start Modal for Schedule 1-->
    <div id="modalSched1" class="printSignFooterClass modalSched1" style="background: #fff;width: 85%;margin: auto;display:none;position:relative;min-height: 500px; "> 
                <br/><br/>
        <table width="100%" class="tblSched1_2200T" border="1">
                    <tr class="modalHeader">
                        <td colspan="2" style="text-align: left;font-weight: bold" width="10%">
              &nbsp;SCHEDULE 1 
            </td>
                        <td colspan="5" align="left" width="90%">
              SUMMARY OF REMOVALS AND EXCISE TAX DUE ON TOBACCO PRODUCTS CHARGEABLE AGAINST PAYMENT
            </td>           
                    </tr>         
                    <tr class="columnHeader">
                        <td colspan="7" width="100%">&nbsp;</td>
                    </tr>         
                    <tr class="columnHeader">
                        <td align="center" width="2%">&nbsp;</td>
                        <td align="center" width="8%">&nbsp;</td>
                        <td align="center" width="8%">&nbsp;</td>
                        <td align="center" width="8%">&nbsp;</td>

                        <!--As of 04/30/2014 new requirement Schedule 1 "Tax Base (Quantity)" header will now be "Tax Base (Value/Volume of Removals)" based on SRS-->
                        <td class="modalColumnHeader" colspan="2" align="center" width="44%">Tax Base (Value/Volume of Removal)</td>
                        <td align="center" width="30%">&nbsp;</td>
                    </tr>
                    <tr class="modalColumnHeader columnHeader">
                        <td align="center" width="2%">ATC</td>
                        <td align="center" width="8%">Description</td>
                        <td align="center" width="8%">Tax Bracket/ Unit of Measure</td>
                        <td align="center" width="8%">Applicable Tax Rate</td>
                        <td align="center" width="22%">Export/Exempt</td>
                        <td align="center" width="22%">Taxable</td>
                        <td align="center" width="30%">Basic Excise Tax Due</td>
                    </tr>
                    <tr class="columnHeader">
                        <td colspan="7" width="100%" class="modalColumnHeader" style="text-align: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TOBACCO PRODUCTS</td>
                    </tr>
                    <tbody class="modalContent" id="frm2200TProducts">

                    </tbody>
                    <tr class="columnHeader">
                        <td colspan="7" width="100%" class="modalColumnHeader" style="text-align: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TOBACCO INSPECTION FEES</td>
                    </tr>
                    <tbody class="modalContent" id="frm2200TInspection">

                    </tbody>
                    <tr>
                        <td colspan="7" width="100%" class="modalColumnHeader" style="text-align: left">OTHERS <em>(specify)</em></td>
                    </tr>
          <tbody class="modalContent" >
            <tr>
                            <table width="100%" class="tblSched1_2200T" border="1" id="frm2200TadditionalSched1">
                                <tr>
                      <td align="center" width="2%"><input type="checkbox" name="frm2200T:sched1Chk0" id="frm2200T:sched1Chk0" value="" style="display: none;" /></td>
                    <td align="center" width="6%"><input type="text" name="frm2200T:txtsched1Atc[]" id="frm2200T:txtsched1Atc0" size="5" value="XT" maxlength="5" onfocus="onFocusIterate(this);" onblur="checkIfValidValues(this);capitalize(this);checkATCValue(this);onBlurIterate(this);otherRateCheck(0);" onkeypress="return letternumber(event)"/></td>
                      <td align="center" width="14%"><input type="text" name="frm2200T:txtsched1Desc0" id="frm2200T:txtsched1Desc0" size="18" value="" onfocus="onFocusIterate(this);" onkeypress="return Name(this, event)" onblur="checkIfValidValues(this);onBlurIterate(this);"/></td>
                      <td align="center" width="10%"><input type="text" name="frm2200T:txtsched1TaxBracket0" id="frm2200T:txtsched1TaxBracket0" size="11" value="" onfocus="onFocusIterate(this);" onkeypress="return Name(this, event)" onblur="checkIfValidValues(this);onBlurIterate(this);"/></td>
                      <td align="center" width="6%"><input type="text" style="text-align:right" name="frm2200T:txtsched1AppTaxRate0" id="frm2200T:txtsched1AppTaxRate0" maxlength="6" size="5" value="0.00" onfocus="onFocusIterate(this);" onblur="setApplicableTaxrate(this);otherRateCheck(0);computeSched1BasicTaxDue(0);onBlurIterate(this);" onkeypress="return numbersonly(this, event)" /></td>
                      <td align="center" width="22%"><input type="text" style="text-align:right" name="frm2200T:txtsched1Exempt0" id="frm2200T:txtsched1Exempt0" maxlength="25" size="25" value="0.00" onfocus="onFocusIterate(this);" onblur="roundDownWithAlert(this);onBlurIterate(this);" onkeypress="return numbersonly(this, event)" /></td>
                      <td align="center" width="22%"><input type="text" style="text-align:right" name="frm2200T:txtsched1Taxable0" id="frm2200T:txtsched1Taxable0" maxlength="25" size="25" value="0.00" onfocus="onFocusIterate(this);" onblur="roundDownWithAlert(this);computeSched1BasicTaxDue(0);onBlurIterate(this);" onkeypress="return numbersonly(this, event)" /></td>
                      <td align="center" width="19%"><input type="text" style="text-align:right" name="frm2200T:txtsched1BasicTaxDue0" style="background-color: rgb(220, 220, 220);" maxlength="25" id="frm2200T:txtsched1BasicTaxDue0" size="25" value="0.00" disabled/></td>
                                </tr>
                            </table>
            </tr>
                    </tbody>
                </table>
                
                <table width="100%">
                    <tr>
                        <td  colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right">
                            <input type="button" class="printButtonClass" name="frm2200T:btnAdd" id="frm2200T:btnAdd" value="     Add     " onClick="addFieldsForSched1()" />&nbsp;&nbsp;&nbsp;
                            <input type="button" class="printButtonClass" name="frm2200T:btnDelete" id="frm2200T:btnDelete" value="   Delete   " onClick="deleteFieldForSched1()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr class="columnHeader">
                        <td class="modalColumnHeader" style="text-align:left" width="84%">
                            <b>TOTAL TAX DUE <font style="font-style:italic;">(to Item 18)</font></b>
                        </td>
                        <td align="center" width="16%">
                            <input type="text" name="frm2200T:totalTaxDue" id="frm2200T:totalTaxDue" style="background-color: rgb(220, 220, 220); text-align:right" size="25" value="0.00" maxlength="25" disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <input type="button" class="printButtonClass" name="frm2200T:btnPrintPreview" id="frm2200T:btnPrintPreview" value="  PRINT PREVIEW  " onClick="printOCR();" />&nbsp;&nbsp;&nbsp;
                            <input type="button" class="printButtonClass enabledButton" name="frm2200T:btnOK" id="frm2200T:btnOK" value="       OK       " onClick="sched1OK('blind')"/>&nbsp;&nbsp;&nbsp;
                            <input type="button" class="printButtonClass" name="frm2200T:btnClear" id="frm2200T:btnClear" value="   CLEAR   " onClick="clearSchedule1();" />&nbsp;&nbsp;&nbsp;
                            <input type="button" class="printButtonClass" name="frm2200T:btnCancel" id="frm2200T:btnCancel" value="   CANCEL   " onClick="cancelSchedule1();" />&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                </table>
        </div>
    <!--End Modal for Schedule 1-->

         <!--Date Computed Container -->
        <div style="display:none;">   
            <input type="text" size="10" id="frm2200T:txtmodalCalculatorXT35DateComputed"  name="frm2200T:txtmodalCalculatorXT35DateComputed"  value="" />
            <input type="text" size="10" id="frm2200T:txtmodalCalculatorXT36DateComputed"  name="frm2200T:txtmodalCalculatorXT36DateComputed"  value="" />
            <input type="text" size="10" id="frm2200T:txtmodalCalculatorXT40DateComputed"  name="frm2200T:txtmodalCalculatorXT40DateComputed"  value="" />
            <input type="text" size="10" id="frm2200T:txtmodalCalculatorXT140DateComputed" name="frm2200T:txtmodalCalculatorXT140DateComputed" value="" />
            <input type="text" size="10" id="frm2200T:txtmodalCalculatorXT150DateComputed" name="frm2200T:txtmodalCalculatorXT150DateComputed" value="" />
       </div>

        <!--Calculator Modal Row Counter -->
        <div id="modalRowCounter" style="display:none;">  
            <input type="text" size="10" id="frm2200T:txtCtrmodalCalculatorXT35"  name="calculatorXT35ModalLayout()" value="0" />
        <input type="text" size="10" id="frm2200T:txtCtrmodalCalculatorXT36"  name="calculatorXT36ModalLayout()"value="0" />
        <input type="text" size="10" id="frm2200T:txtCtrmodalCalculatorXT40"  name="calculatorXT40ModalLayout()"value="0" / >
        <input type="text" size="10" id="frm2200T:txtCtrmodalCalculatorXT140" name="calculatorXT140ModalLayout()" value="0" />
        <input type="text" size="10" id="frm2200T:txtCtrmodalCalculatorXT150" name="calculatorXT150ModalLayout()" value="0" />
       </div>

        <!-- AVT Calculator – ATC XA 035 -->
        <div id="modalCalculatorXT35" class="modalShow" style="display:none;">    
          <div class="modalInner" style="background: #fff">      
            <table id="tblmodalCalculatorXT35" style="display:none;"  width="100%" class="tblForm">
                    <tr>
                        <td class="tblForm" width="20%" align="left"><b>TIN:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT35UserTIN"></span></td>
                    </tr>          
                    <tr style="display: none;">           
                        <td class="tblForm" width="20%" align="left"><b>Name:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT35UserName"></span></td>
                    </tr>          
                    <tr>           
                        <td class="tblForm" width="20%" align="left"><b>Date Computed:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT35DateComputed"></span></td>
                    </tr>
                </table>

            <table width="100%" class="tblForm">
              <tr>
                <td class="scheduleTd">AD VALOREM TAX CALCULATOR FOR XT035</td>
              </tr>
            </table>

            <table border="0" style="width:100%;border-left: 1px solid #aaaaaa;" class="tblForm noCellSpace">
              <tr>
                        <td class="tblFormTd" width="3%" align="center" rowspan="3"><input id="frm2200T:chkXT35SelectAll" name="frm2200T:chkXT35SelectAll" type="checkbox" onclick="selectAllCheckbox(this, 'tblCalculatorXT35')" /></td>
                <td class="tblFormTd" width="22%" align="center" rowspan="3"><span class="small">Description</span></td>
                <td class="tblFormTd" width="25%" align="center"><span class="small">QUANTITY</span></td>
                <td class="tblFormTd" width="50%" align="center" colspan="2" ><span class="small">AD VALOREM TAX</span></td>
              </tr>
                    <tr>
                <td class="tblFormTd" align="center" width="25%"><span class="small">Total No. of Cigars</span></td>
                        <td class="tblFormTd" align="center" width="25%"><span class="small">NRP Per Cigar PHP</span></td>
                <td class="tblFormTd" align="center" width="25%"><span class="small">Tax Base</span></td>
              </tr>
                    <tr>
                <td class="tblFormTd" align="center" width="25%"><span class="small">A</span></td>
                        <td class="tblFormTd" align="center" width="25%"><span class="small">B</span></td>
                <td class="tblFormTd" align="center" width="25%"><span class="small">A * B</span></td>
              </tr>
            </table>

                <table id="tblCalculatorXT35" class="tblForm noCellSpace" border="0" style="width:100%;border-left: 1px solid #aaaaaa;">
            </table>

                <table border="0" style="width:100%;border-left: 1px solid #aaaaaa;" class="tblForm noCellSpace">
                    <tr>
                        <td class="tblFormTd" width="3%">&nbsp;</td>
                        <td class="tblFormTd" colspan="2" align="left" width="32%" style="border-right-style: none;">&nbsp;
                            <input type="button" name="frm2200T:btnXT35Add" id="frm2200T:btnXT35Add" style="width: 100px;" value="ADD" onclick="addModalRow('calculatorXT35ModalLayout()');"  />
                            <input type="button" name="frm2200T:btnXT35Delete" id="frm2200T:btnXT35Delete" style="width: 100px;" value="DELETE" onclick="deleteModalRow('tblCalculatorXT35');computeCalculatorSubTotal(false, 'tblCalculatorXT35', 'C5', 'frm2200T:txtXT35Total', 'frm2200T:txtProTaxable4', 2);"  />
                        </td>
                        <td class="tblFormTd" colspan="4" width="65%">&nbsp;</td>
                     </tr>
                </table>
            
                <table border="0" width="100%" class="tblForm noCellSpace" style="border-left: 1px solid #aaaaaa;">
                    <tr>
                        <td class="tblFormTd" width="3%">&nbsp;</td>
                <td class="tblFormTd" width="29%" align="center" style="text-align:left; border-right-style: none;">&nbsp;<span class="small">TOTAL TAX BASE</span></td>
                        <td class="tblFormTd" width="43%" align="center">&nbsp;</td>
                <td class="tblFormTd" width="26%" align="center"><input type="text" class="disableByDefault" size="19" maxlength="12" style="text-align: right; width: 95%; background-color: rgb(220, 220, 220);" id="frm2200T:txtXT35Total" name="frm2200T:txtXT35Total" value="0.00" disabled /></td>
              </tr>
            </table>    
            
                <table class="modalAction noCellSpace">
              <tr>
                <td class="tblFormTd" align="center" width="100%" colspan="3" valign="middle" style="width: 1000px;border-top: 1px solid darkgrey">
                    <input type="button" name="frm2200T:btnXT35Compute" id="frm2200T:btnXT35Compute" value="COMPUTE" onclick="isComputeButtonClick=true; computeCalculatorSubTotal(true,'tblCalculatorXT35', 'C5', 'frm2200T:txtXT35Total', 'frm2200T:txtProTaxable4', 2);computeModal(this, 'modalCalculatorXT35');"  />
                            <input class="printButtonClass enabledButton" type="button" value="PRINT" style="width: 100px;" name="frm2200T:btnPrintModal" id="frm2200T:btnXT35Print" onclick="printModal('modalCalculatorXT35');"/>
                    <input type="button" name="frm2200T:btnXT35Cancel" id="frm2200T:btnXT35Cancel" value="CLOSE" onclick="cancelModal('modalCalculatorXT35')" class="enabledButton" />
                            <input type="button" name="frm2200T:btnXT35Clear" id="frm2200T:btnXT35Clear" value="CLEAR" onclick="clearModal('tblCalculatorXT35', 'frm2200T:txtProTaxable4')"/>
                </td>
              </tr>
            </table>    
            </div>            
        </div>

        <!-- ST Calculator – ATC XT 036 -->
        <div id="modalCalculatorXT36" class="modalShow" style="display:none;">    
          <div class="modalInner">      
            <table id="tblmodalCalculatorXT36" style="display:none;"  width="100%" class="tblForm">
                    <tr>
                        <td class="tblForm" width="20%" align="left"><b>TIN:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT36UserTIN"></span></td>
                    </tr>          
                    <tr style="display: none;">           
                        <td class="tblForm" width="20%" align="left"><b>Name:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT36UserName"></span></td>
                    </tr>          
                    <tr>           
                        <td class="tblForm" width="20%" align="left"><b>Date Computed:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT36DateComputed"></span></td>
                    </tr>
                </table>

            <table width="100%" class="tblForm">
              <tr>
                <td class="scheduleTd">SPECIFIC TAX CALCULATOR FOR XT036</td>
              </tr>
            </table>

            <table border="0" style="width:100%;border-left: 1px solid #aaaaaa;" class="tblForm noCellSpace">
              <tr>
                        <td class="tblFormTd" width="5%" align="center" rowspan="3"><input id="frm2200T:chkXT36SelectAll" name="frm2200T:chkXT36SelectAll" type="checkbox" onclick="selectAllCheckbox(this, 'tblCalculatorXT36')" /></td>
                <td class="tblFormTd" width="48%" align="center" rowspan="3"><span class="small">Description</span></td>
                <td class="tblFormTd" width="47%" align="center" colspan="3"><span class="small">QUANTITY</span></td>
              </tr>
                    <tr>
                <td class="tblFormTd" align="center" width="47%"><span class="small">Total No. of Cigars / Tax Base </span></td>
              </tr>
                    <tr>
                <td class="tblFormTd" align="center" width="47%"><span class="small">A</span></td>
              </tr>
                     <tr>
                        <td colspan="7" ></td>
                    </tr>
            </table>

                <table id="tblCalculatorXT36" class="tblForm noCellSpace" border="0" style="width:100%;;border-left: 1px solid #aaaaaa;">
            </table>

                <table border="0" style="width:100%;border-left: 1px solid #aaaaaa;" class="tblForm noCellSpace">
                    <tr>
                        <td class="tblFormTd" width="5%"></td>
                        <td class="tblFormTd" colspan="6" align="left" width="95%">&nbsp;
                            <input type="button" name="frm2200T:btnXT36Add" id="frm2200T:btnXT36Add" style="width: 100px;" value="ADD" onclick="addModalRow('calculatorXT36ModalLayout()');"  />
                            <input type="button" name="frm2200T:btnXT36Delete" id="frm2200T:btnXT36Delete" style="width: 100px;" value="DELETE" onclick="deleteModalRow('tblCalculatorXT36');computeCalculatorSubTotal(false, 'tblCalculatorXT36', 'C3', 'frm2200T:txtXT36Total', 'frm2200T:txtProTaxable5', 0);"  /></td>
                     </tr>
                </table>
            
                <table border="0" width="100%" class="tblForm noCellSpace modalSubtotal" style="border-left: 1px solid #aaaaaa;border-bottom:1px solid #aaaaaa; ">
                    <tr>
                        <td class="tblFormTd" width="5%" align="center" style="vertical-align: top;"></td>
                <td class="tblFormTd" width="48%" align="center" style="text-align:left;padding-right:30px;" >&nbsp;<span class="small">TOTAL TAX BASE</span></td>
                <td class="tblFormTd" width="47%" align="center"><input type="text" class="disableByDefault" maxlength="12" style="text-align: right; width: 80%; background-color: rgb(220, 220, 220);" id="frm2200T:txtXT36Total" name="frm2200T:txtXT36Total" value="0" disabled /></td>
              </tr>
            </table>    
            
                <table class="modalAction noCellSpace" style="width: 100%;background: #fff;">
              <tr height="30px;">
                <td class="tblFormTd" align="center" width="100%" colspan="3" valign="middle">
                    <input type="button" name="frm2200T:btnXT36Compute" id="frm2200T:btnXT36Compute" value="COMPUTE" onclick="isComputeButtonClick=true;computeCalculatorSubTotal(true,'tblCalculatorXT36', 'C3', 'frm2200T:txtXT36Total', 'frm2200T:txtProTaxable5', 0);computeModal(this, 'modalCalculatorXT36');"  />
                            <input class="printButtonClass enabledButton" type="button" value="PRINT" style="width: 100px;" name="frm2200T:btnPrintModal" id="frm2200T:btnXT36Print" onclick="printModal('modalCalculatorXT36');"/>
                    <input type="button" name="frm2200T:btnXT36Cancel" id="frm2200T:btnXT36Cancel" value="CLOSE" onclick="cancelModal('modalCalculatorXT36')" class="enabledButton" />
                    <input type="button" name="frm2200T:btnXT36Clear" id="frm2200T:btnXT36Clear" value="CLEAR" onclick="clearModal('tblCalculatorXT36', 'frm2200T:txtProTaxable5')"/>
                        </td>
              </tr>
            </table>    
            </div>            
        </div>

        <!-- Cigarette Calculator – ATC XT 040 -->
        <div id="modalCalculatorXT40" class="modalShow" style="display:none;">    
          <div class="modalInner">      
            <table id="tblmodalCalculatorXT40" style="display:none;"  width="100%" class="tblForm">
                    <tr>
                        <td class="tblForm" width="20%" align="left"><b>TIN:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT40UserTIN"></span></td>
                    </tr>          
                    <tr style="display: none;">           
                        <td class="tblForm" width="20%" align="left"><b>Name:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT40UserName"></span></td>
                    </tr>          
                    <tr>           
                        <td class="tblForm" width="20%" align="left"><b>Date Computed:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT40DateComputed"></span></td>
                    </tr>
                </table>

            <table width="100%" class="tblForm">
              <tr>
                <td class="scheduleTd">TAXABLE CALCULATOR FOR XT040</td>
              </tr>
            </table>

            <table border="0" style="width:100%;border-left: 1px solid #aaaaaa;" class="tblForm noCellSpace">
              <tr>
                        <td class="tblFormTd" width="3%" align="center"><input id="frm2200T:chkXT40SelectAll" name="frm2200T:chkXT40SelectAll" type="checkbox" onclick="selectAllCheckbox(this, 'tblCalculatorXT40')" /></td>
                <td class="tblFormTd" width="20%" align="center"><span class="small">Description</span></td>
                <td class="tblFormTd" width="15%" align="center" ><span class="small">Cases</span></td>
                <td class="tblFormTd" width="15%" align="center" ><span class="small">Reams / Case</span></td>
                        <td class="tblFormTd" width="17%" align="center" ><span class="small">Reams</span></td>
                        <td class="tblFormTd" width="13%" align="center" ><span class="small">Packs / Reams</span></td>
                        <td class="tblFormTd" width="17%" align="center" ><span class="small">Packs</span></td>
              </tr>
                    <tr>
                        <td class="tblFormTd" width="3%" align="center"></td>
                        <td class="tblFormTd" width="20%" align="center"></td>
                <td class="tblFormTd" align="center" width="15%"><span class="small">A</span></td>
                <td class="tblFormTd" align="center" width="15%"><span class="small">B</span></td>
                        <td class="tblFormTd" align="center" width="17%"><span class="small">A * B = C</span></td>
                        <td class="tblFormTd" align="center" width="13%"><span class="small">D</span></td>
                <td class="tblFormTd" align="center" width="17%"><span class="small">C * D = E</span></td>
              </tr>
            </table>

                <table id="tblCalculatorXT40" class="tblForm noCellSpace" border="0" style="width:100%;border-left: 1px solid #aaaaaa;"></table>

                <table border="0" style="width:100%;border-left: 1px solid #aaaaaa;" class="tblForm noCellSpace">
                    <tr>
                        <td class="tblFormTd" width="3%"></td>
                        <td class="tblFormTd" colspan="2" align="left" width="32%" style="border-right-style: none;">&nbsp;
                            <input type="button" name="frm2200T:btnXT40Add" id="frm2200T:btnXT40Add" style="width: 100px;" value="ADD" onclick="addModalRow('calculatorXT40ModalLayout()');"  />
                            <input type="button" name="frm2200T:btnXT40Delete" id="frm2200T:btnXT40Delete" style="width: 100px;" value="DELETE" onclick="deleteModalRow('tblCalculatorXT40');computeCalculatorSubTotal(false, 'tblCalculatorXT40', 'C7', 'frm2200T:txtXT40Total', 'frm2200T:txtProTaxable6', 0);"  />
                        </td>
                        <td class="tblFormTd" colspan="4" width="60%">&nbsp;</td>
                     </tr>
                </table>
            
                <table border="0" width="100%" class="tblForm noCellSpace modalSubtotal" style="border-left: 1px solid #aaaaaa;border-bottom: 1px solid #aaaaaa;">
                    <tr>
                        <td class="tblFormTd" width="3%" align="center" style="vertical-align: top;"></td>
                <td class="tblFormTd" width="80%" align="center" style="text-align:left;padding-right:30px;">&nbsp;<span class="small">TOTAL TAX BASE</span></td>
                <td class="tblFormTd" width="17%" align="center"><input type="text" class="disableByDefault" size="18" maxlength="12" style="text-align: right; width: 95%; background-color: rgb(220, 220, 220);" id="frm2200T:txtXT40Total" name="frm2200T:txtXT40Total" value="0" disabled /></td>
              </tr>
            </table>    
            
                <table class="modalAction noCellSpace" style="width: 100%;background: #fff">
              <tr height="30px;">
                <td class="tblFormTd" align="center" width="100%" colspan="3" valign="middle">
                    <input type="button" name="frm2200T:btnXT40Compute" id="frm2200T:btnXT40Compute" value="COMPUTE" onclick="isComputeButtonClick=true;computeCalculatorSubTotal(true,'tblCalculatorXT40', 'C7', 'frm2200T:txtXT40Total', 'frm2200T:txtProTaxable6', 0);computeModal(this, 'modalCalculatorXT40');"  />
                            <input class="printButtonClass enabledButton" type="button" value="PRINT" style="width: 100px;" name="frm2200T:btnPrintModal" id="frm2200T:btnXT40Print" onclick="printModal('modalCalculatorXT40');"/>
                    <input type="button" name="frm2200T:btnXT40Cancel" id="frm2200T:btnXT40Cancel" value="CLOSE" onclick="cancelModal('modalCalculatorXT40')" class="enabledButton" />
                    <input type="button" name="frm2200T:btnXT40Clear" id="frm2200T:btnXT40Clear" value="CLEAR" onclick="clearModal('tblCalculatorXT40', 'frm2200T:txtProTaxable6')"/>
                        </td>
              </tr>
            </table>    
            </div>            
        </div>

        <!-- Cigarette Calculator – ATC XT 140 -->
        <div id="modalCalculatorXT140" class="modalShow" style="display:none;">     
          <div class="modalInner">      
            <table id="tblmodalCalculatorXT140" style="display:none;"  width="100%" class="tblForm">
                    <tr>
                        <td class="tblForm" width="20%" align="left"><b>TIN:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT140UserTIN"></span></td>
                    </tr>          
                    <tr style="display: none;">           
                        <td class="tblForm" width="20%" align="left"><b>Name:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT140UserName"></span></td>
                    </tr>          
                    <tr>           
                        <td class="tblForm" width="20%" align="left"><b>Date Computed:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT140DateComputed"></span></td>
                    </tr>
                </table>

            <table width="100%" class="tblForm">
              <tr>
                <td class="scheduleTd">TAXABLE CALCULATOR FOR XT140</td>
              </tr>
            </table>

            <table border="0" style="width:100%;border-left: 1px solid #aaaaaa;" class="tblForm noCellSpace">
              <tr>
                        <td class="tblFormTd" width="3%" align="center"><input id="frm2200T:chkXT140SelectAll" name="frm2200T:chkXT140SelectAll" type="checkbox" onclick="selectAllCheckbox(this, 'tblCalculatorXT140')" /></td>
                <td class="tblFormTd" width="20%" align="center"><span class="small">Description</span></td>
                <td class="tblFormTd" width="15%" align="center" ><span class="small">Cases</span></td>
                <td class="tblFormTd" width="15%" align="center" ><span class="small">Reams / Case</span></td>
                        <td class="tblFormTd" width="17%" align="center" ><span class="small">Reams</span></td>
                        <td class="tblFormTd" width="13%" align="center" ><span class="small">Packs / Reams</span></td>
                        <td class="tblFormTd" width="17%" align="center" ><span class="small">Packs</span></td>
              </tr>
                    <tr>
                        <td class="tblFormTd" width="3%" align="center"></td>
                        <td class="tblFormTd" width="20%" align="center"></td>
                <td class="tblFormTd" align="center" width="15%"><span class="small">A</span></td>
                <td class="tblFormTd" align="center" width="15%"><span class="small">B</span></td>
                        <td class="tblFormTd" align="center" width="17%"><span class="small">A * B = C</span></td>
                        <td class="tblFormTd" align="center" width="13%"><span class="small">D</span></td>
                <td class="tblFormTd" align="center" width="17%"><span class="small">C * D = E</span></td>
              </tr>
            </table>

                <table id="tblCalculatorXT140" class="tblForm noCellSpace" border="0" style="width:100%;border-left: 1px solid #aaaaaa;"></table>

                <table border="0" style="width:100%;border-left: 1px solid #aaaaaa;" class="tblForm noCellSpace">
                    <tr>
                        <td class="tblFormTd" width="3%"></td>
                        <td class="tblFormTd" colspan="2" align="left" width="32%" style="border-right-style: none;">&nbsp;
                            <input type="button" name="frm2200T:btnXT140Add" id="frm2200T:btnXT140Add" style="width: 100px;" value="ADD" onclick="addModalRow('calculatorXT140ModalLayout()');"  />
                            <input type="button" name="frm2200T:btnXT140Delete" id="frm2200T:btnXT140Delete" style="width: 100px;" value="DELETE" onclick="deleteModalRow('tblCalculatorXT140');computeCalculatorSubTotal(false, 'tblCalculatorXT140', 'C7', 'frm2200T:txtXT140Total', 'frm2200T:txtProTaxable7', 0);"  />
                        </td>
                        <td class="tblFormTd" colspan="4" width="60%">&nbsp;</td>
                     </tr>
                </table>
            
                <table border="0" width="100%" class="tblForm noCellSpace modalSubtotal" style="border-bottom: 1px solid #aaaaaa;border-left: 1px solid #aaaaaa;">
                    <tr>
                        <td class="tblFormTd" width="3%" align="center" style="vertical-align: top;"></td>
                <td class="tblFormTd" width="80%" align="center" style="text-align:left;padding-right:30px;" >&nbsp;<span class="small">TOTAL TAX BASE</span></td>
                <td class="tblFormTd" width="17%" align="center"><input type="text" class="disableByDefault" size="18" maxlength="12" style="text-align: right; width: 95%; background-color: rgb(220, 220, 220);" id="frm2200T:txtXT140Total" name="frm2200T:txtXT140Total" value="0" disabled /></td>
              </tr>
            </table>    
            
                <table class="modalAction noCellSpace" style="width: 100%;background: #fff;">
              <tr height="30px;">
                <td class="tblFormTd" align="center" width="100%" colspan="3" valign="middle">
                    <input type="button" name="frm2200T:btnXT140Compute" id="frm2200T:btnXT140Compute" value="COMPUTE" onclick="isComputeButtonClick=true;computeCalculatorSubTotal(true,'tblCalculatorXT140', 'C7', 'frm2200T:txtXT140Total', 'frm2200T:txtProTaxable7', 0);computeModal(this, 'modalCalculatorXT140');"  />
                            <input class="printButtonClass enabledButton" type="button" value="PRINT" style="width: 100px;" name="frm2200T:btnPrintModal" id="frm2200T:btnXT140Print" onclick="printModal('modalCalculatorXT140');"/>
                    <input type="button" name="frm2200T:btnXT140Cancel" id="frm2200T:btnXT140Cancel" value="CLOSE" onclick="cancelModal('modalCalculatorXT140')" class="enabledButton" />
                    <input type="button" name="frm2200T:btnXT140Clear" id="frm2200T:btnXT140Clear" value="CLEAR" onclick="clearModal('tblCalculatorXT140', 'frm2200T:txtProTaxable7')"/>
                        </td>
              </tr>
            </table>    
            </div>            
        </div>

        <!-- Cigarette Calculator – ATC XT 150 -->
        <div id="modalCalculatorXT150" class="modalShow" style="display:none;">     
          <div class="modalInner">      
            <table id="tblmodalCalculatorXT150" style="display:none;"  width="100%" class="tblForm">
                    <tr>
                        <td class="tblForm" width="20%" align="left"><b>TIN:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT150UserTIN"></span></td>
                    </tr>          
                    <tr style="display: none;">           
                        <td class="tblForm" width="20%" align="left"><b>Name:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT150UserName"></span></td>
                    </tr>          
                    <tr>           
                        <td class="tblForm" width="20%" align="left"><b>Date Computed:</b></td>
                        <td class="tblForm" width="80%" align="left"><span id="frm2200T:lblmodalCalculatorXT150DateComputed"></span></td>
                    </tr>
                </table>

            <table width="100%" class="tblForm">
              <tr>
                <td class="scheduleTd">TAXABLE CALCULATOR FOR XT150</td>
              </tr>
            </table>

            <table border="0" style="width:100%;border-left: 1px solid #aaaaaa;" class="tblForm noCellSpace">
              <tr>
                        <td class="tblFormTd" width="3%" align="center"><input id="frm2200T:chkXT150SelectAll" name="frm2200T:chkXT150SelectAll" type="checkbox" onclick="selectAllCheckbox(this, 'tblCalculatorXT150')" /></td>
                <td class="tblFormTd" width="20%" align="center"><span class="small">Description</span></td>
                <td class="tblFormTd" width="15%" align="center" ><span class="small">Cases</span></td>
                <td class="tblFormTd" width="15%" align="center" ><span class="small">Reams / Case</span></td>
                        <td class="tblFormTd" width="17%" align="center" ><span class="small">Reams</span></td>
                        <td class="tblFormTd" width="13%" align="center" ><span class="small">Packs / Reams</span></td>
                        <td class="tblFormTd" width="17%" align="center" ><span class="small">Packs</span></td>
              </tr>
                    <tr>
                        <td class="tblFormTd" width="3%" align="center"></td>
                        <td class="tblFormTd" width="20%" align="center"></td>
                <td class="tblFormTd" align="center" width="15%"><span class="small">A</span></td>
                <td class="tblFormTd" align="center" width="15%"><span class="small">B</span></td>
                        <td class="tblFormTd" align="center" width="17%"><span class="small">A * B = C</span></td>
                        <td class="tblFormTd" align="center" width="13%"><span class="small">D</span></td>
                <td class="tblFormTd" align="center" width="17%"><span class="small">C * D = E</span></td>
              </tr>
            </table>

                <table id="tblCalculatorXT150" class="tblForm noCellSpace" border="0" style="width:100%;border-left: 1px solid #aaaaaa;"></table>

                <table border="0" style="width:100%;border-left: 1px solid #aaaaaa;" class="tblForm noCellSpace">
                    <tr>
                        <td class="tblFormTd" width="3%"></td>
                        <td class="tblFormTd" colspan="2" align="left" width="32%" style="border-right-style: none;">&nbsp;
                            <input type="button" name="frm2200T:btnXT150Add" id="frm2200T:btnXT150Add" style="width: 100px;" value="ADD" onclick="addModalRow('calculatorXT150ModalLayout()');"  />
                            <input type="button" name="frm2200T:btnXT150Delete" id="frm2200T:btnXT150Delete" style="width: 100px;" value="DELETE" onclick="deleteModalRow('tblCalculatorXT150');computeCalculatorSubTotal(false, 'tblCalculatorXT150', 'C7', 'frm2200T:txtXT150Total', 'frm2200T:txtProTaxable8', 0);"  />
                        </td>
                        <td class="tblFormTd" colspan="4" width="60%">&nbsp;</td>
                     </tr>
                </table>
            
                <table border="0" width="100%" class="tblForm noCellSpace modalSubtotal" style="border-bottom: 1px solid #aaaaaa;border-left: 1px solid #aaaaaa;">
                    <tr>
                        <td class="tblFormTd" width="3%" align="center" style="vertical-align: top;"></td>
                <td class="tblFormTd" width="80%" align="center" style="text-align:left;padding-right:30px;" >&nbsp;<span class="small">TOTAL TAX BASE</span></td>
                <td class="tblFormTd" width="17%" align="center"><input type="text" class="disableByDefault" size="18" maxlength="12" style="text-align: right; width: 95%; background-color: rgb(220, 220, 220);" id="frm2200T:txtXT150Total" name="frm2200T:txtXT150Total" value="0" disabled /></td>
              </tr>
            </table>    
            
                <table class="modalAction noCellSpace" style="width: 100%;background: #fff;">
              <tr height="30px;">
                <td class="tblFormTd" align="center" width="100%" colspan="3" valign="middle">
                    <input type="button" name="frm2200T:btnXT150Compute" id="frm2200T:btnXT150Compute" value="COMPUTE" onclick="isComputeButtonClick=true;computeCalculatorSubTotal(true,'tblCalculatorXT150', 'C7', 'frm2200T:txtXT150Total', 'frm2200T:txtProTaxable8', 0);computeModal(this, 'modalCalculatorXT150');"  />
                            <input class="printButtonClass enabledButton" type="button" value="PRINT" style="width: 100px;" name="frm2200T:btnPrintModal" id="frm2200T:btnXT150Print" onclick="printModal('modalCalculatorXT150');"/>
                    <input type="button" name="frm2200T:btnXT150Cancel" id="frm2200T:btnXT150Cancel" value="CLOSE" onclick="cancelModal('modalCalculatorXT150')" class="enabledButton" />
                    <input type="button" name="frm2200T:btnXT150Clear" id="frm2200T:btnXT150Clear" value="CLEAR" onclick="clearModal('tblCalculatorXT150', 'frm2200T:txtProTaxable8')"/>
                        </td>
              </tr>
            </table>    
            </div>            
        </div>

    
  </form>           
  <textarea id='responsetext' style="display:none;"></textarea>
        <!-- XML retrieval -->
        <div style="display:none;">
            <xmp id='xmlFormat'>  
            </xmp> <!--format the doc -->
            <span id='xmlClose'>All Rights Reserved BIR 2014.</span>
        </div>
        <div id="responseBG" style="display:none;"><!--loaded files render here--></div>
        <div id="response" style="display:none;"><!--loaded files render here--></div>    
        <div id="responseRegion" style="display:none;"><!--loaded files render here--></div>  
        <div id="responseProvince" style="display:none;"><!--loaded files render here--></div>  
        <div id="responseCity" style="display:none;"><!--loaded files render here--></div>
        <div id="responseRdo" style="display:none;"><!--loaded files render here--></div> 
        <div id="responseATC" style="display: none;"><!--loaded ATC files render here--></div>
@endsection

@section('scripts')
<script src="{{ asset('js/forms/2200T.js') }}" ></script>
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
  var p3GrossSales = "";
  
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
    function sleeptime() {

       
        clearInterval(str);
        init();
        loadXMLProvince('/xml/province.xml');
        loadArrayCity();
        
        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
          
          loadXML(fileName);  

          if (gIsReadOnly) {
          //Added as of 04/29/2014 (based on 1700's series) - Enable Print button, Disable Save button
          window.setTimeout("disableAllElementIDs();d.getElementById('btnUpload').disabled = false;d.getElementById('btnPrint').disabled = false;document.getElementById('frm2200T:btnPrintPreview').disabled = false;d.getElementById('lnkPrintPreview').disabled = false;d.getElementById('Button3').disabled = false;d.getElementById('frm2200T:btnSchedule1').disabled = !d.getElementById('frm2200T:chkPymntManner_1').checked; $('a[id*=\"lnkXT\"]').attr('disabled', !d.getElementById('frm2200T:chkPymntManner_1').checked);", 1000);
            }
        } else {
          window.setTimeout("$('#loader').hide('blind');",100);
        } 
        if ( $('#printMenu').css('display') != 'none' ) { 
          $('#printMenu').hide('blind');
        }
        loadXMLATC('/xml/atcCodes.xml');
        d.getElementById('frm2200T:txtTIN1').disabled = true;
          d.getElementById('frm2200T:txtTIN2').disabled = true;
        d.getElementById('frm2200T:txtTIN3').disabled = true;
        d.getElementById('frm2200T:txtBranchCode').disabled = true; 
        document.getElementById('frm2200T:txtEmailAddress').disabled = true;
    }
  
  
  $(document).ready(function(){
      $('input').bind('paste drag drop', function (e) {
      e.preventDefault();
        });
  });

    //Disable CTRL + P, ESC, CTRL + Z
  jQuery(document).bind("keyup keydown", function (e) {
      if (e.ctrlKey && e.keyCode == 80) {
          alert("Please use the Print / Print Preview buttons for printing.");
          return false;
      } else if (e.keyCode == 27) {
          return false;
      } else if (e.ctrlKey && (e.which === 90 || e.which === 88 || e.which === 67)) {
          return false;
      }
  });

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
      
        /*------------- modalSched1 -----------*/
        flag1=false;
        var count1=0;
        var responses1 = d.getElementById('response').getElementsByTagName('div');
        var sPar1 = 'frm2200T:sched1Chk';     
        
        do {
          if (responses1.item(count1).innerHTML.indexOf(sPar1) != -1) {
            var temp = String(responses1.item(count1).innerHTML);
            temp = temp.substring(0,sPar1.length+1); //substring to length of search param for index - check files
            temp = temp.substring(sPar1.length,sPar1.length+1); //get the last character for checking
            if ( !isNaN(temp) && temp != 0) {
              addFieldsForSched1Reload();
            } //if last char is a number, add modal section
          } count1++;
                } while (count1 != responses1.length);

                //Added 05/02/2014
                //isReload - set to false to activate modal validation
                window.setTimeout("loadData();sched1OK('');flag1=true;isReload = false;", 710); //changeMannerOfPaymentReload()
      } 
      if (response.innerHTML.indexOf("All Rights Reserved BIR 2014.0") >= 0) {
        gIsReadOnly = true;
      }
    
      if (gIsReadOnly) { 
        d.getElementById('frm2200T:cmdValidate').disabled = true;
        d.getElementById('btnSave').disabled = true;
        d.getElementById('Button3').disabled = false;
      }
  }

  function getGrossSales() {
      var sum = 0;

      if (d.getElementById("frm2200T:chkPymntManner_1").checked) {
          //txtProTaxable, txtInsTaxable, txtsched1Taxable
          $(".tblSched1_2200T input[id*='Taxable'][type='text']").each(function () {
              sum = sum + NumWithComma($.trim($(this).attr('value')));
          });
      }

      return sum;
  }

  var isReload = false;

  function loadData() {
    /*This will load data onto fields*/
    var response = d.getElementById("response");
    var elem = d.getElementById('frmMain').elements;

    //Added 05/02/2014
    //isReload - set to true to bypass modal validation
    isReload = true;

    //Create modal rows based on counter  
    var modalRowCounter = d.getElementById('modalRowCounter').getElementsByTagName('input');

    for (var i = 0; i < modalRowCounter.length; i++) {
        if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1) {
            counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
            var layoutFunction = modalRowCounter[i].name.toString();

            for (var k = 0; k < counter; k++) {
                    addModalRow('' + layoutFunction + '');
            }
        }
    }

        for(var i = 0; i < elem.length; i++)
        {
      
      if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
        if (elem[i].type == 'text' || elem[i].type == 'select-one') {
          var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
          elem[i].value = ''; elem[i].selectedIndex = 0;
          if(elem[i].id == 'frm2200T:taxpayerName' || elem[i].id == 'frm2200T:txtLineBus' || elem[i].id == 'frm2200T:txtAddress'){
            elem[i].value = unescape(fieldVal[1]);
          }
          else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
          else{
            elem[i].value = (typeof fieldVal[1] === "undefined") ?  "" : fieldVal[1]; //all select-one and text values        
          }

          if ( String(elem[i].id).indexOf('frm2200ToptRegion') != -1 || String(elem[i].id).indexOf('frm2200ToptProvince') != -1  || String(elem[i].id).indexOf('frm2200ToptRegion1') != -1  || String(elem[i].id).indexOf('frm2200ToptProvince1') != -1 ) {
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
    d.getElementById('frm2200T:txtMonth1').selectedIndex = year.getMonth();
    //d.getElementById('frm2200T:txtDate').value = year.getDate();
    dd = "" + year.getDate();
    if (dd.length == 1) 
    { 
      dd = "0" + dd; 
      d.getElementById('frm2200T:txtDate').value = dd;
    }
    else
    {
      d.getElementById('frm2200T:txtDate').value = year.getDate();
    }
    d.getElementById('frm2200T:txtForYr').value = year.getFullYear();
    
        d.getElementById('frm2200T:amendedRtn_1').disabled = false;
        d.getElementById('frm2200T:amendedRtn_2').disabled = false;
        //d.getElementById('frm2200T:txtSheets').disabled = true;
        d.getElementById('frm2200T:txtTIN1').disabled = true;
        d.getElementById('frm2200T:txtTIN2').disabled = true;
        d.getElementById('frm2200T:txtTIN3').disabled = true;
        d.getElementById('frm2200T:txtBranchCode').disabled = true;
        /*d.getElementById('frm2200T:txtRDOCode').disabled = true;*/
        //d.getElementById('frm2200T:txtLineBus').disabled = true;
        d.getElementById('frm2200T:taxpayerName').disabled = true;
        d.getElementById('frm2200T:txtTelNum').disabled = true;
        d.getElementById('frm2200T:txtAddress').disabled = true;
        d.getElementById('frm2200T:txtZipCode').disabled = true;
        d.getElementById('frm2200T:optTreaty_2').checked = true;
        d.getElementById('frm2200T:lstTaxTreaty').disabled = true;

        d.getElementById('frm2200T:txtTax16').disabled = true;
        d.getElementById('frm2200T:txtTax17B').disabled = true;
        d.getElementById('frm2200T:txtTax17C').disabled = true;
        d.getElementById('frm2200T:txtTax18').disabled = true;
        d.getElementById('frm2200T:txtTax19').disabled = true;
        d.getElementById('frm2200T:txtTax20').disabled = true;
        d.getElementById('frm2200T:txtTax21D').disabled = true;
        d.getElementById('frm2200T:txtTax22').disabled = true;
        d.getElementById('frm2200T:txtTax23B').disabled = true;
        d.getElementById('frm2200T:txtTax23C').disabled = true;
        d.getElementById('frm2200T:txtTax24').disabled = true;

        @if($action != 'view')
        d.getElementById('frm2200T:cmdEdit').disabled = true;
        d.getElementById('frm2200T:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
   
        d.getElementById('btnPrint').disabled = true;

        document.getElementById('frm2200T:btnPrintPreview').disabled = true;
        @endif

        loadXMLRegion('/xml/region.xml');
        getRegion();

        createStaticFieldForSched1();
    
       
        d.getElementById('frm2200T:txtEmailAddress').disabled = true;
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

    function changeTreaty() {
        if (d.getElementById('frm2200T:optTreaty_1').checked) {
            d.getElementById('frm2200T:lstTaxTreaty').disabled = false;
            d.getElementById('frm2200T:lstTaxTreaty').style.backgroundColor = "#ffffff";
        } else {
            d.getElementById('frm2200T:lstTaxTreaty').disabled = true;
            d.getElementById('frm2200T:lstTaxTreaty').selectedIndex = 0;
            d.getElementById('frm2200T:lstTaxTreaty').style.backgroundColor = "#ededed";
        }
    }

    function changeMannerOfPayment()
    {
        if (d.getElementById('frm2200T:chkPymntManner_3').checked) {
            d.getElementById('frm2200T:txtOthMannerofPymnt').disabled = false;
            d.getElementById('frm2200T:txtOthMannerofPymnt').style.background = "ffffff";
            d.getElementById('frm2200T:txtOthMannerofPymnt').focus();
        }
        if (d.getElementById('frm2200T:chkPymntManner_2').checked && !d.getElementById('frm2200T:chkPymntManner_3').checked) {

            //set item 17
            d.getElementById('frm2200T:chkPymntManner_3').disabled = false;
            d.getElementById('frm2200T:txtOthMannerofPymnt').disabled = true;
            d.getElementById('frm2200T:txtOthMannerofPymnt').value = "";
            d.getElementById('frm2200T:txtOthMannerofPymnt').style.background = "ededed";

            d.getElementById('frm2200T:btnSchedule1').disabled = true;
            
            d.getElementById('frm2200T:PayPenalties').checked = false;
            setTimeout("d.getElementById('frm2200T:txtMonth1').disabled = true;", 100);
            d.getElementById('frm2200T:txtTax23A').focus();
        }
        else if(d.getElementById('frm2200T:chkPymntManner_1').checked){
            d.getElementById('frm2200T:txtOthMannerofPymnt').disabled = true;
            d.getElementById('frm2200T:txtOthMannerofPymnt').value = "";
            d.getElementById('frm2200T:btnSchedule1').disabled = false;
           
            //set item 17
            d.getElementById('frm2200T:chkPymntManner_3').disabled = true;
            d.getElementById('frm2200T:txtOthMannerofPymnt').disabled = true;
            d.getElementById('frm2200T:txtOthMannerofPymnt').value = "";
            d.getElementById('frm2200T:txtOthMannerofPymnt').style.background = "ededed";
            d.getElementById('frm2200T:chkPymntManner_3').checked = false;

            if (showFillupSched1Alert && !isReload) {
                alert("Please fill up Schedule 1.");
                d.getElementById("frm2200T:btnSchedule1").onclick();
      }
            if(sched1Mess) {
                alert("Please fill up the fields for Schedule 1.");
                sched1Mess = false;
            }
        } 
    }
  
  function dateMonthYear()
  {
    if(d.getElementById('frm2200T:chkPymntManner_2').checked)
    {
      var month = new Date();
      var date1 = new Date();
      var year = new Date();
      d.getElementById('frm2200T:txtMonth1').selectedIndex = month.getMonth();
      d.getElementById('frm2200T:txtMonth1').disabled = true;
      //d.getElementById('frm2200T:txtDate').value = date1.getDate();
      dd = "" + date1.getDate();
        if (dd.length == 1) 
        { 
          dd = "0" + dd; 
          d.getElementById('frm2200T:txtDate').value = dd;
        }
        else
        {
          d.getElementById('frm2200T:txtDate').value = date1.getDate();
        }
      d.getElementById('frm2200T:txtDate').disabled = true;
      d.getElementById('frm2200T:txtForYr').value = year.getFullYear();
      d.getElementById('frm2200T:txtForYr').disabled = true;
    }
    else
    {
      d.getElementById('frm2200T:txtMonth1').disabled = false;
      d.getElementById('frm2200T:txtDate').disabled = false;
      d.getElementById('frm2200T:txtForYr').disabled = false;
    }
}
   
    function disableItem22() {
        if (d.getElementById('frm2200T:chkPymntManner_2').checked) {
            d.getElementById('frm2200T:txtTax21A').disabled = true;
            d.getElementById('frm2200T:txtTax21B').disabled = true;
            d.getElementById('frm2200T:txtTax21C').disabled = true;
            d.getElementById('frm2200T:txtTax21A').value = "0.00";
            d.getElementById('frm2200T:txtTax21B').value = "0.00";
            d.getElementById('frm2200T:txtTax21C').value = "0.00";
        }
        else {
            d.getElementById('frm2200T:txtTax21A').disabled = false;
            d.getElementById('frm2200T:txtTax21B').disabled = false;
            d.getElementById('frm2200T:txtTax21C').disabled = false;
        }

        
        compute21D();
    }

   

    function showSched1()
    {
        if(d.getElementById('frm2200T:chkPymntManner_1').checked){
      
            $('#formPaper').hide();
          d.getElementById('MainContent').style.display = "none";
          $('#modalSched1').show();

                sched1Temp = $("#modalSched1").html();
                $("#modalSched1").animate({ scrollTop: 0 }, 0);
        }else if(d.getElementById('frm2200T:chkPymntManner_2').checked) {
          alert("Schedule 1 is not required for Prepayment/Advance Deposit.");
          return;
        } else {
          alert("Choose Manner of Payment.");
          return;
        }
    }

    function hideSched1(hideEffect)
    {
       
        $('#formPaper').show();
      d.getElementById('MainContent').style.display = 'block';
        d.getElementById('modalSched1').style.display = 'none';
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
    }

    function createStaticFieldForSched1()
    {
        var x = 0;
        var fields = "";
        while(x <= 8){
            fields = fields + getProducts(x);

            fields = fields + "<td align='center' width='18%'><input type='text' style='text-align:right' name='frm2200T:txtProExempt" + x + "' id='frm2200T:txtProExempt" + x + "' value='0.00' maxlength='25' size='25' onfocus='onFocusIterate(this);' onblur='roundDownWithAlert(this);onBlurIterate(this);' onkeypress='return numbersonly(this, event)'/></td>" +
                "<td align='center' width='18%'><input type='text' style='text-align:right' name='frm2200T:txtProTaxable" + x + "' id='frm2200T:txtProTaxable" + x + "' value='0.00' maxlength='25' size='25' onfocus='onFocusIterate(this);' onblur='roundDownWithAlert(this);computeProBasicTaxDue(" + x + ");onBlurIterate(this);' onkeypress='return numbersonly(this, event)' /></td>" +
                "<td align='center' width='18%'><input type='text' name='frm2200T:txtProBasicTaxDue" + x + "' id='frm2200T:txtProBasicTaxDue" + x + "'style='background-color: rgb(220, 220, 220); text-align:right' value='0.00' maxlength='25' size='25' disabled/></td></tr>";
          
      x++;
        }
    $('#frm2200TProducts').html(fields);

        x = 0;
        fields = "";
        while(x < 6){
            fields = fields + getInspectionFee(x);

            fields = fields + "<td align='center' width='18%'><input type='text' style='text-align:right' name='frm2200T:txtInsExempt" + x + "' id='frm2200T:txtInsExempt" + x + "' value='0.00' maxlength='25' size='25' onfocus='onFocusIterate(this);' onblur='roundDownWithAlert(this);onBlurIterate(this);' onkeypress='return numbersonly(this, event)'/></td>" +
                "<td align='center' width='18%'><input type='text' style='text-align:right' name='frm2200T:txtInsTaxable" + x + "' id='frm2200T:txtInsTaxable" + x + "' value='0.00' maxlength='25' size='25' onfocus='onFocusIterate(this);' onblur='roundDownWithAlert(this);computeInsBasicTaxDue(" + x + ");onBlurIterate(this);' onkeypress='return numbersonly(this, event)' /></td>" +
                "<td align='center' width='18%'><input type='text' name='frm2200T:txtInsBasicTaxDue" + x + "' id='frm2200T:txtInsBasicTaxDue" + x + "'style='background-color: rgb(220, 220, 220); text-align:right' value='0.00' maxlength='25' size='25' disabled/></td></tr>";

            x++;
        }
        $('#frm2200TInspection').html(fields);

        $('#frm2200TProducts, #frm2200TInspection input').bind('paste drag drop', function (e) {
            e.preventDefault();
        });
    }

    function getProducts(indexCount) {
        setATCSchedule1(d.getElementById('frm2200T:txtForYr').value);
        var text = "";
        var atcCode = new Array();
        var description = new Array();
        var rate = new Array();
        var year = (parseInt(d.getElementById('frm2200T:txtForYr').value) - 2017);
        var rateXT010 = parseFloat('2.05')
        var rateXT020 = parseFloat('1.75');
        var rateXT036 = parseFloat('5.85');
        var rateXT040 = parseFloat('30.00');
        var rateXT140 = parseFloat('30.00');
        var rateXT150 = parseFloat('30.00');

        for (x = 0; x < year; x++) {
            rateXT010 += rateXT010 * .04;
            rateXT020 += rateXT020 * .04;
            rateXT036 += rateXT036 * .04;
            rateXT040 += rateXT040 * .04;
            rateXT140 += rateXT140 * .04;
            rateXT150 += rateXT150 * .04;
        }

        if (sched1ATCList.length === 0) {
            switch (indexCount) {
                case 0:
                    atcCode[0] = 'XT010';
                    description[0] = '<b>1.) Tobacco Products</b><br/>a. Tobacco twisted by hand or reduced into a condition to be consumed in any manner other than the ordinary mode of drying or curing';
                    rate[0] = rateXT010.toFixed(2);
                    break;
                case 1:
                    atcCode[1] = 'XT010';
                    description[1] = 'b. Tobacco prepared or partially prepared with or without the use of any machine or instrument or without being pressed or sweetened';
                    rate[1] = rateXT010.toFixed(2);
                    break;
                case 2:
                    atcCode[2] = 'XT010';
                    description[2] = 'c. Fine-shorts and refuse, scraps, clippings, cuttings, stems, midribs and sweepings of tobacco';
                    rate[2] = rateXT010.toFixed(2);
                    break;
                case 3:
                    atcCode[3] = 'XT020';
                    description[3] = '<b>2.) Chewing tobacco unsuitable for use in any other manner</b>';
                    rate[3] = rateXT020.toFixed(2);
                    break;
                case 4:
                    atcCode[4] = 'XT035';
                    description[4] = '<b>3.) Cigars</b> <br/>a. Ad Valorem Tax - Based on the net retail price (NRP) per Cigar [excluding the excise and value-added tax (VAT)]';
                    rate[4] = .20;
                    break;
                case 5:
                    atcCode[5] = 'XT036';
                    description[5] = 'b. In addition to Ad Valorem Tax, a Specific Tax per Cigar';
                    rate[5] = rateXT036.toFixed(2);
                    break;
                case 6:
                    atcCode[6] = 'XT040';
                    description[6] = '<b>4.) Cigarettes</b> <br/> Cigarettes packed by hand';
                    rate[6] = rateXT040.toFixed(2);
                    break;
                case 7:
                    atcCode[7] = 'XT140';
                    description[7] = 'b. Cigarettes packed by machine, where the NRP (excluding the excise and VAT) per pack is PHP11.50 and below';
                    rate[7] = rateXT140.toFixed(2);
                    break;
                case 8:
                    atcCode[8] = 'XT150';
                    description[8] = 'More than Php11.50';
                    rate[8] = rateXT150.toFixed(2);
                    break;
            }
        }
        else {
            for (i = 0; i <= 8; i++) {
                atcCode[i] = sched1ATCList[i].atcCode;
                description[i] = sched1ATCList[i].description;
                rate[i] = sched1ATCList[i].rate;
            }
        }

        switch (indexCount) {
                        
            case 0:
                text = "<tr><td align='center' width='4%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='18%' style='text-align: left'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='10%'>Per Kilogram</td>" +
                    "<td align='center' width='8%'>" + rate[0] + "<input type='hidden' name='frm2200T:hideProAppRate" + indexCount + "' id='frm2200T:hideProAppRate" + indexCount + "' value='" + rate[0] + "'></td>";
                break;
            case 1:
                text = "<tr><td align='center' width='4%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='18%' style='text-align: left'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='10%'>Per Kilogram</td>" +
                    "<td align='center' width='8%'>" + rate[1] + "<input type='hidden' name='frm2200T:hideProAppRate" + indexCount + "' id='frm2200T:hideProAppRate" + indexCount + "' value='" + rate[1] + "'></td>";
                break;
            case 2:
                text = "<tr><td align='center' width='4%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='18%' style='text-align: left'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='10%'>Per Kilogram</td>" +
                    "<td align='center' width='8%'>" + rate[2] + "<input type='hidden' name='frm2200T:hideProAppRate" + indexCount + "' id='frm2200T:hideProAppRate" + indexCount + "' value='" + rate[2] + "'></td>";
                break;
            case 3:
                text = "<tr><td align='center' width='4%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='18%' style='text-align: left'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='10%'>Per Kilogram</td>" +
                    "<td align='center' width='8%'>" + rate[3] + "<input type='hidden' name='frm2200T:hideProAppRate" + indexCount + "' id='frm2200T:hideProAppRate" + indexCount + "' value='" + rate[3] + "'></td>";
                break;
//      
            case 4:
                text = "<tr><td align='center' width='4%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='18%' style='text-align: left'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='10%'>NRP per Cigar<br/><a href='#' id='frm2200T:lnkXT35' onclick='openModal(this, \"modalCalculatorXT35\");'>Calculator</a></td>" +
                    "<td align='center' width='8%'>" + "20%" + "<input type='hidden' name='frm2200T:hideProAppRate" + indexCount + "' id='frm2200T:hideProAppRate" + indexCount + "' value='" + rate[4] + "'></td>";
                break;
            case 5:
                text = "<tr><td align='center' width='4%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='18%' style='text-align: left'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='10%'>Per Cigar<br/><a href='#' id='frm2200T:lnkXT36' onclick='openModal(this, \"modalCalculatorXT36\");'>Calculator</a></td>" +
                    "<td align='center' width='8%'>" + rate[5] + "<input type='hidden' name='frm2200T:hideProAppRate" + indexCount + "' id='frm2200T:hideProAppRate" + indexCount + "' value='" + rate[5] + "'></td>";
                break;
            case 6:
                text = "<tr><td align='center' width='4%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='18%' style='text-align: left'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='10%'>Per Pack<br/><a href='#' id='frm2200T:lnkXT40' onclick='openModal(this, \"modalCalculatorXT40\");'>Calculator</a></td>" +
                    "<td align='center' width='8%'>" + rate[6] + "<input type='hidden' name='frm2200T:hideProAppRate" + indexCount + "' id='frm2200T:hideProAppRate" + indexCount + "' value='" + rate[6] + "'></td>";
                break;
            case 7:
                text = "<tr><td align='center' width='4%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='18%' style='text-align: left'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='10%'>Per Pack<br/><a href='#' id='frm2200T:lnkXT140' onclick='openModal(this, \"modalCalculatorXT140\");'>Calculator</a></td>" +
                    "<td align='center' width='8%'>" + rate[7] + "<input type='hidden' name='frm2200T:hideProAppRate" + indexCount + "' id='frm2200T:hideProAppRate" + indexCount + "' value='" + rate[7] + "'></td>";
                break;      
            case 8:
                text = "<tr><td align='center' width='4%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='18%' style='text-align: left'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='10%'>Per Pack<br/><a href='#' id='frm2200T:lnkXT150' onclick='openModal(this, \"modalCalculatorXT150\");'>Calculator</a></td>" +
                    "<td align='center' width='8%'>" + rate[8] + "<input type='hidden' name='frm2200T:hideProAppRate" + indexCount + "' id='frm2200T:hideProAppRate" + indexCount + "' value='" + rate[8] + "'></td>";
                break;
//          
        }
        return text;
    }
  
    function getInspectionFee(indexCount){
        var text = "";
        switch(indexCount){
            case 0:
                text = "<tr><td align='center' width='4%'>XT080</td>" +
                    "<td align='center' width='18%' style='text-align: left'>(1) For Cigars</td>" +
                    "<td align='center' width='10%'>Per 1,000 cigars</td>" +
                    "<td align='center' width='8%'>P0.50<input type='hidden' name='frm2200T:hideInsAppRate" + indexCount + "' id='frm2200T:hideInsAppRate" + indexCount + "' value='0.50'></td>";
                break;
            case 1:
                text = "<tr><td align='center' width='4%'>XT090</td>" +
                    "<td align='center' width='18%' style='text-align: left'>(2) For Cigarettes</td>" +
                    "<td align='center' width='10%'>Per 1,000 sticks</td>" +
                    "<td align='center' width='8%'>P0.10<input type='hidden' name='frm2200T:hideInsAppRate" + indexCount + "' id='frm2200T:hideInsAppRate" + indexCount + "' value='0.10'></td>";
                break;
            case 2:
                text = "<tr><td align='center' width='4%'>XT100</td>" +
                    "<td align='center' width='18%' style='text-align: left'>(3) For Leaf Tobacco</td>" +
                    "<td align='center' width='10%'>Per kilogram</td>" +
                    "<td align='center' width='8%'>P0.02<input type='hidden' name='frm2200T:hideInsAppRate" + indexCount + "' id='frm2200T:hideInsAppRate" + indexCount + "' value='0.02'></td>";
                break;
            case 3:
                text = "<tr><td align='center' width='4%'>XT110</td>" +
                    "<td align='center' width='18%' style='text-align: left'>(4) For scraps and other manufactured tobacco products</td>" +
                    "<td align='center' width='10%'>Per kilogram</td>" +
                    "<td align='center' width='8%'>P0.03<input type='hidden' name='frm2200T:hideInsAppRate" + indexCount + "' id='frm2200T:hideInsAppRate" + indexCount + "' value='0.03'></td>";
                break;
            case 4:
                text = "<tr><td align='center' width='4%'>XT120</td>" +
                    "<td align='center' width='18%' style='text-align: left'>(5) Additional imported blending tobacco inspection and monitoring fee <br/>- leaf</td>" +
                    "<td align='center' width='10%'>Per kilogram</td>" +
                    "<td align='center' width='8%'>P0.02<input type='hidden' name='frm2200T:hideInsAppRate" + indexCount + "' id='frm2200T:hideInsAppRate" + indexCount + "' value='0.02'></td>";
                break;
            case 5:
                text = "<tr><td align='center' width='4%'>XT120</td>" +
                    "<td align='center' width='18%' style='text-align: left'>- partially manufactured (scraps & strips)</td>" +
                    "<td align='center' width='10%'>Per kilogram</td>" +
                    "<td align='center' width='8%'>P0.03<input type='hidden' name='frm2200T:hideInsAppRate" + indexCount + "' id='frm2200T:hideInsAppRate" + indexCount + "' value='0.03'></td>";
                break;
        }
        return text;
    }

    function isValidDataOnSched1()
    {
        var sched1FieldRows = d.getElementById('frm2200TadditionalSched1').rows.length;
        var index = 0;

    if (sched1FieldRows > 0 && !isReload) {
            while (index < sched1FieldRows) {
                var atc = $.trim(d.getElementById('frm2200T:txtsched1Atc' + index).value),
                    desc = $.trim(d.getElementById('frm2200T:txtsched1Desc' + index).value),
                    taxBracket = $.trim(d.getElementById('frm2200T:txtsched1TaxBracket' + index).value),
                    taxRate = (atc === "XT035") ? parseFloat($.trim(d.getElementById('frm2200T:txtsched1AppTaxRate' + index).value).split("%")[0]) / 100 : $.trim(d.getElementById('frm2200T:txtsched1AppTaxRate' + index).value),
                    taxBase = $.trim(d.getElementById('frm2200T:txtsched1Taxable' + index).value);
                
                if ((atc == "" || $.trim(atc) == "XT")) {
                    alert("Please enter a valid ATC at Row " + (index + 1) + ".");
                    return false;
                }
                else if (atc != "") {
                    d.getElementById('frm2200T:txtsched1Atc' + index).value = atc.toUpperCase();

                    if (atc.toUpperCase().substring(0, 2) != "XT") {
                        alert("The supplied ATC code at Row " + (index + 1) + " should start with 'XT'.");
                        return false;
                    }
                } 
               
                if (desc === "") {
                    alert("Please enter a Description at Row " + (index + 1) + ".");
                    return false;
                } 
                else if (taxBracket === "") {
                    alert("Please enter a Tax Bracket at Row " + (index + 1) + ".");
                    return false;
                } 
                else if (taxRate == 0.00) { 
                    alert("Please enter a valid Applicable rate at Row " + (index + 1) + ".");
                    return false;
                } 
                else if (taxBase == 0.00) {
                    alert("Please enter a valid Tax Base at Row " + (index + 1) + ".");
                    return false;
                } 
                else {
                    if (checkTaxRate($.trim(atc), $.trim(taxRate))) {
                        alert("Please enter a unique Applicable rate at Row " + (index + 1) + ".");
                        return false;
                    }
                }

                index++;
            }
        }
        return true;
    }

    function addFieldsForSched1Reload()
    {
        var sched1Field = d.getElementById('frm2200TadditionalSched1');
        addRow(sched1Field, sched1Fields());
    } 
  
    function addFieldsForSched1()
    {
        var sched1Field = d.getElementById('frm2200TadditionalSched1');

        if(isValidDataOnSched1()){
            addRow(sched1Field, sched1Fields());
        }
    }

    function addRow(tbody, text) {
        
        $('#frm2200TadditionalSched1').append(text);

        $('#frm2200TadditionalSched1 tr:last input').bind('paste drag drop', function (e) {
            e.preventDefault();
        });
    }

    function sched1Fields() {
        var sched1FieldRows = d.getElementById('frm2200TadditionalSched1').rows.length;
        sched1Index = sched1FieldRows;

        var fields = "";
        fields = "<tr><td align='center' width='2%'><input type='checkbox' id='frm2200T:sched1Chk" + sched1Index + "' name='frm2200T:sched1Chk" + sched1Index + "' value='' /></td>" +
            "<td align='center' width='6%'><input type='text' id='frm2200T:txtsched1Atc" + sched1Index + "' name='frm2200T:txtsched1Atc[]' size='5' value='XT' maxlength='5' onfocus='onFocusIterate(this);' onblur='checkIfValidValues(this);onBlurIterate(this);checkATCValue(this);capitalize(this);otherRateCheck(" + sched1Index + ");' onkeypress='return letternumber(event)'/></td>" +
            "<td align='center' width='14%'><input type='text' id='frm2200T:txtsched1Desc" + sched1Index + "' name='frm2200T:txtsched1Desc" + sched1Index + "' size='18' value='' onfocus='onFocusIterate(this);' onblur='checkIfValidValues(this);onBlurIterate(this);' onkeypress='return Name(this, event)'/></td>" +
            "<td align='center' width='10%'><input type='text' id='frm2200T:txtsched1TaxBracket" + sched1Index + "' name='frm2200T:txtsched1TaxBracket" + sched1Index + "'  size='11' value='' onfocus='onFocusIterate(this);' onblur='checkIfValidValues(this);onBlurIterate(this);' onkeypress='return Name(this, event)'/></td>" +
            "<td align='center' width='6%'><input type='text' style='text-align:right' id='frm2200T:txtsched1AppTaxRate" + sched1Index + "' name='frm2200T:txtsched1AppTaxRate" + sched1Index + "'  maxlength='6' size='5' value='0.00' onblur='setApplicableTaxrate(this);otherRateCheck(" + sched1Index + "); computeSched1BasicTaxDue(" + sched1Index + ");onBlurIterate(this);' onfocus='onFocusIterate(this);' onkeypress='return numbersonly(this, event)'/></td>" +
            "<td align='center' width='22%'><input type='text' style='text-align:right' id='frm2200T:txtsched1Exempt" + sched1Index + "' name='frm2200T:txtsched1Exempt" + sched1Index + "'  maxlength='25' size='25' value='0.00' onblur='roundDownWithAlert(this);onBlurIterate(this);' onkeypress='return numbersonly(this, event)' onfocus='onFocusIterate(this);'/></td>" +
            "<td align='center' width='22%'><input type='text' style='text-align:right' id='frm2200T:txtsched1Taxable" + sched1Index + "' name='frm2200T:txtsched1Taxable" + sched1Index + "'  maxlength='25' size='25' value='0.00' onblur='roundDownWithAlert(this);computeSched1BasicTaxDue(" + sched1Index + ");onBlurIterate(this);' onkeypress='return numbersonly(this, event)' onfocus='onFocusIterate(this);'  onkeypress='return numbersonly(this, event)'/></td>" +
            "<td align='center' width='19%'><input type='text' style='text-align:right' id='frm2200T:txtsched1BasicTaxDue" + sched1Index + "' name='frm2200T:txtsched1BasicTaxDue" + sched1Index + "' style='background-color: rgb(220, 220, 220)' maxlength='25' size='25' value='0.00' onfocus='onFocusIterate(this);' onblur='onBlurIterate(this);' disabled/></td></tr>";

        dynamicTimeOut(sched1Index);    
      
        return fields;
    }

    function dynamicTimeOut(index)
    {
       
    
        var waitString = "setInputTextControl_NumberFormatter('frm2200T:txtsched1AppTaxRate" + index + "', 5, 2);" +
            "setInputTextControl_NumberFormatter('frm2200T:txtsched1Exempt" + index + "', 25, 2);" +
            "setInputTextControl_NumberFormatter('frm2200T:txtsched1Taxable" + index + "', 25, 2);" +
            "setInputTextControl_NumberFormatter('frm2200T:txtsched1BasicTaxDue" + index + "', 25, 2);";
      
        waitstr = setTimeout(waitString, 100);
    }

    function deleteFieldForSched1() {
        var sched1Field = d.getElementById('frm2200TadditionalSched1'),
      sched1FieldRows = sched1Field.rows.length, indexCtr, rowsToDelete = [];

        for (indexCtr = 0; indexCtr < sched1FieldRows; indexCtr++) {
            var sched1FieldInputs = sched1Field.rows[indexCtr].getElementsByTagName('input');

            if (sched1FieldInputs[0].type === "checkbox" && sched1FieldInputs[0].checked) {
                if (indexCtr > 0) {
                    // Push the index of the row to delete to the 'rowsToDelete' array
                    rowsToDelete.push(indexCtr);
                } else {
                    alert("First row cannot be deleted.");
                    break;
                }
            }
        }

     
        if (rowsToDelete.length > 0) {
            for (indexCtr = (rowsToDelete.length - 1); indexCtr >= 0; indexCtr--) {
                sched1Field.deleteRow(rowsToDelete[indexCtr]);
            }

            sched1Input();
        }
    }

    function sched1Input() {
        var sched1Field = d.getElementById('frm2200TadditionalSched1'),
      sched1FieldRows = sched1Field.rows.length, indexCtr;

        for (indexCtr = 1; indexCtr < sched1FieldRows; indexCtr++) {
            var sched1FieldInputs = sched1Field.rows[indexCtr].getElementsByTagName('input');

            // Checkbox
            sched1FieldInputs[0].id = "frm2200T:sched1Chk" + indexCtr;

            // ATC textbox
            sched1FieldInputs[1].id = "frm2200T:txtsched1Atc" + indexCtr;
            sched1FieldInputs[1].onblur = addBlurEventSchedule1(sched1FieldInputs[1], parseInt(indexCtr));

            // Description textbox
            sched1FieldInputs[2].id = "frm2200T:txtsched1Desc" + indexCtr;

            // Tax Bracket textbox
            sched1FieldInputs[3].id = "frm2200T:txtsched1TaxBracket" + indexCtr;

            // Applicable Rate textbox
            sched1FieldInputs[4].id = "frm2200T:txtsched1AppTaxRate" + indexCtr;
            sched1FieldInputs[4].onblur = addBlurEventSchedule1(sched1FieldInputs[4], parseInt(indexCtr));

            // Exempt textbox
            sched1FieldInputs[5].id = "frm2200T:txtsched1Exempt" + indexCtr;

            // Taxable textbox
            sched1FieldInputs[6].id = "frm2200T:txtsched1Taxable" + indexCtr;
            sched1FieldInputs[6].onblur = addBlurEventSchedule1(sched1FieldInputs[6], parseInt(indexCtr));

            // Excise Tax Due textbox
            sched1FieldInputs[7].id = "frm2200T:txtsched1BasicTaxDue" + indexCtr;
        }

        totalTaxDue(0,"DUMMY");
    }

    function computeProBasicTaxDue(index)
    {
        var total = 0.0;

        total = roundDownComputation((NumWithComma(d.getElementById('frm2200T:hideProAppRate' + index).value) * 1) * (NumWithComma(d.getElementById('frm2200T:txtProTaxable' + index).value) * 1));
        if (total.length > 18) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Basic Excise Tax Due.");
            d.getElementById('frm2200T:txtProExempt' + index).value = "0.00";
            d.getElementById('frm2200T:txtProTaxable' + index).value = "0.00";
            d.getElementById('frm2200T:txtProBasicTaxDue' + index).value = "0.00";
            d.getElementById('frm2200T:txtProTaxable' + index).focus();
        }
        else {
            d.getElementById('frm2200T:txtProBasicTaxDue' + index).value = total;
        }

        totalTaxDue(index, "product");
    }

    function computeInsBasicTaxDue(index)
    {
        var total = 0.0;

        total = roundDownComputation((NumWithComma(d.getElementById('frm2200T:hideInsAppRate' + index).value) * 1) * (NumWithComma(d.getElementById('frm2200T:txtInsTaxable' + index).value) * 1));
        if (total.length > 18) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Basic Excise Tax Due.");
            d.getElementById('frm2200T:txtInsExempt' + index).value = "0.00";
            d.getElementById('frm2200T:txtInsTaxable' + index).value = "0.00";
            d.getElementById('frm2200T:txtInsBasicTaxDue' + index).value = "0.00";
            d.getElementById('frm2200T:txtInsTaxable' + index).focus();
        }
        else {
            d.getElementById('frm2200T:txtInsBasicTaxDue' + index).value = total;
        }
        totalTaxDue(index,"inspection");
    }

    function computeSched1BasicTaxDue(index)
    {
        var total = 0.0;
        var rowOthers = $('#frm2200TadditionalSched1').find('tr');
        var atc = d.getElementById("frm2200T:txtsched1Atc" + index).value;
        var rate = (atc === "XT035") ? NumWithComma(d.getElementById('frm2200T:txtsched1AppTaxRate' + index).value.split("%")[0]) * 1 / 100 : NumWithComma(d.getElementById('frm2200T:txtsched1AppTaxRate' + index).value) * 1;
        
        total = roundDownComputation(rate * (NumWithComma(d.getElementById('frm2200T:txtsched1Taxable' + index).value) * 1));
        if (total.length > 18) {

            var inputs = $(rowOthers[index]).find('input');

            alert("Exceeded maximum amount of 999,999,999,999.99 on Basic Excise Tax Due.");
            for (x = 0; x < inputs.length; x++) {
                if (x == 1) {
                    inputs[x].value = "XT";
                }
                else if (x == 2 || x == 3) {
                    inputs[x].value = "";
                }
                else {
                    inputs[x].value = "0.00";
                }
            }

            d.getElementById('frm2200T:txtsched1Taxable' + index).focus();
        }
        else {
            d.getElementById('frm2200T:txtsched1BasicTaxDue' + index).value = total;
        }
        totalTaxDue(index,"others");
    }
  
    function totalTaxDue(index, part) {
        if (!isPrintingOthers) {
            var total = 0.0;
            var x = 0;

            var rowProduct = $('#frm2200TProducts').find('tr');
            var rowInspection = $('#frm2200TInspection').find('tr');
            var rowOthers = $('#frm2200TadditionalSched1').find('tr');

            while (x <= 8) {
                total = (total * 1) + (NumWithComma(d.getElementById('frm2200T:txtProBasicTaxDue' + x).value) * 1);
                x++;
            }

            x = 0;
            while (x < 6) {
                total = (total * 1) + (NumWithComma(d.getElementById('frm2200T:txtInsBasicTaxDue' + x).value) * 1);
                x++;
            }

            x = 0;
            while (x < d.getElementById("frm2200TadditionalSched1").rows.length) {
                total = (total * 1) + (NumWithComma(d.getElementById('frm2200T:txtsched1BasicTaxDue' + x).value) * 1);
                x++;
            }

            var item16 = (NumWithComma(d.getElementById('frm2200T:txtTax16').value) * 1);
            var item26 = (NumWithComma(d.getElementById('frm2200T:txtTax24').value) * 1);
            var id = (part == 'product') ? "frm2200T:txtProTaxable" : ((part == 'inspection') ? "frm2200T:txtInsTaxable" : "frm2200T:txtsched1Taxable");
            var item26Total = ((item26 - item16) + total);
            var isExceedItem26 = (roundDownComputation(item26Total).toString().replace(/-/g, '').length > 18) ? true : false;

            d.getElementById('frm2200T:totalTaxDue').value = roundDownComputation(total);

            if (roundDownComputation(total).toString().length > 18 || (isExceedItem26 && total != 0)) {
                if (roundDownComputation(total).toString().length > 18) {
                    alert("Exceeded maximum amount of 999,999,999,999.99 on Total Tax Due.");
                } else if (isExceedItem26 && total != 0) {
                    alert("Exceeded maximum amount of 999,999,999,999.99 on Item 26 Balance to be Carried Over to Next Return.");
                }

                if (part == "product") {
                    var inputs = $(rowProduct[index]).find('input');
                    total = total - parseFloat(NumWithComma(inputs[inputs.length - 1].value));
                    d.getElementById('frm2200T:totalTaxDue').value = roundDownComputation(total);
                    for (x = 1; x < inputs.length; x++) {
                        inputs[x].value = "0.00";
                    }
                }
                else if (part == "inspection") {
                    var inputs = $(rowInspection[index]).find('input');
                    total = total - parseFloat(NumWithComma(inputs[inputs.length - 1].value));
                    d.getElementById('frm2200T:totalTaxDue').value = roundDownComputation(total);
                    for (x = 1; x < inputs.length; x++) {
                        inputs[x].value = "0.00";
                    }
                }
                else {
                    var inputs = $(rowOthers[index]).find('input');
                    total = total - parseFloat(NumWithComma(inputs[inputs.length - 1].value));
                    d.getElementById('frm2200T:totalTaxDue').value = roundDownComputation(total);
                    for (x = 0; x < inputs.length; x++) {
                        if (x == 1) {
                            inputs[x].value = "XT";
                        }
                        else if (x == 2 || x == 3) {
                            inputs[x].value = "";
                        }
                        else {
                            inputs[x].value = "0.00";
                        }
                    }
                }

                if (total != 0) {
                    d.getElementById(id + index).focus();
                }
            }
        }
    }

    function sched1OK(hideEffect) {
        if (d.getElementById('frm2200T:chkPymntManner_1').checked) {
            var isValid = $.trim(d.getElementById('frm2200T:txtsched1Atc0').value) == "XT" && $.trim(d.getElementById('frm2200T:txtsched1Desc0').value) == "" && $.trim(d.getElementById('frm2200T:txtsched1TaxBracket0').value) == "" && $.trim(d.getElementById('frm2200T:txtsched1AppTaxRate0').value) == "0.00" && d.getElementById('frm2200T:txtsched1Exempt0').value == "0.00" && $.trim(d.getElementById('frm2200T:txtsched1Taxable0').value) == "0.00",
          xt035exempt = d.getElementById("frm2200T:txtProExempt4"),
          xt035taxable = d.getElementById("frm2200T:txtProTaxable4"),
          xt036exempt = d.getElementById("frm2200T:txtProExempt5"),
          xt036taxable = d.getElementById("frm2200T:txtProTaxable5");

            //For checking of XT035 and XT036
            if (($.trim(xt035taxable.value) !== "0.00" && $.trim(xt036taxable.value) === "0.00")) {// || ($.trim(xt035exempt.value) !== "0.00" && $.trim(xt036exempt.value) === "0.00")) {
                alert("Tax Base column for XT036 must have a value.");
                xt036taxable.focus();
            }
            else if (($.trim(xt036taxable.value) !== "0.00" && $.trim(xt035taxable.value) === "0.00")) {// || ($.trim(xt036exempt.value) !== "0.00" && $.trim(xt035exempt.value) === "0.00")) {
                alert("Tax Base column for XT035 must have a value.");
                xt035taxable.focus();
            } 
            else if (isValid || isValidDataOnSched1()) {
                d.getElementById('frm2200T:txtTax16').value = d.getElementById('frm2200T:totalTaxDue').value;
                hideSched1(hideEffect);
                compute18();
                
                //Clear sched1Temp
                sched1Temp = "";
            }
        }
    }

    function compute17C(sender)
    {
        var total = 0.0;

        total = ((NumWithComma(d.getElementById('frm2200T:txtTax17A').value)*1) + (NumWithComma(d.getElementById('frm2200T:txtTax17B').value)*1));

        d.getElementById('frm2200T:txtTax17C').value = roundDownComputation(total);

        compute18(sender);
    }

    function compute18(sender)
    {
        var total = 0.0;

        total = ((NumWithComma(d.getElementById('frm2200T:txtTax16').value)*1) - (NumWithComma(d.getElementById('frm2200T:txtTax17C').value)*1));

        d.getElementById('frm2200T:txtTax18').value = roundDownComputation(total);

        compute20(sender);
    }

    function compute20(sender)
    {
        var total = 0.0;

        total = roundDownComputation((NumWithComma(d.getElementById('frm2200T:txtTax18').value) * 1) - (NumWithComma(d.getElementById('frm2200T:txtTax19').value) * 1));

        d.getElementById('frm2200T:txtTax20').value = total;

        if (total.toString().replace(/-/g, '').length > 18) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Item 22 Tax Still Due/Overpayment.");

            if (typeof sender === "object") {
                sender.value = "0.00";
                sender.onblur();
                sender.focus();
            } else if (d.getElementById('frm2200T:txtTax17A').value !== "0.00") {
                d.getElementById('frm2200T:txtTax17A').value = "0.00";
                d.getElementById('frm2200T:txtTax17A').onblur();
            } else if (!d.getElementById('frm2200T:txtTax19').disabled && d.getElementById('frm2200T:txtTax19').value !== "0.00") {
                d.getElementById('frm2200T:txtTax19').value = "0.00";
                d.getElementById('frm2200T:txtTax19').onblur();
            } 
        } else {
            compute22(sender);
        }
    }
  function compute21D(sender) {

      var total = 0.00;

      total = roundDownComputation(NumWithComma(d.getElementById('frm2200T:txtTax21A').value) * 1 + NumWithComma(d.getElementById('frm2200T:txtTax21B').value) * 1 + NumWithComma(d.getElementById('frm2200T:txtTax21C').value) * 1);
      
        d.getElementById('frm2200T:txtTax21D').value = total;

        if (total.toString().replace(/-/g, '').length > 18 && typeof sender === "object") {
          alert("Exceeded maximum amount of 999,999,999,999.99 on Item 23D Total Penalties.");
          sender.value = "0.00";
          sender.onblur();
          sender.focus();
      } else {
          d.getElementById('frm2200T:PayPenalties').checked = total != 0.00 ? true : false;

          payPenalties(sender);
          compute22(sender);
      }
  }
  function payPenalties(sender)
  {
    if(d.getElementById('frm2200T:PayPenalties').checked){
      d.getElementById('frm2200T:txtTax23B').value = d.getElementById('frm2200T:txtTax21D').value;
    }
    else{
      d.getElementById('frm2200T:txtTax23B').value = "0.00";
    }
    compute23C(sender);
  }
    function compute22(sender)
    {
        var total = 0.0;

        total = ((NumWithComma(d.getElementById('frm2200T:txtTax20').value)*1) + (NumWithComma(d.getElementById('frm2200T:txtTax21D').value)*1));
    //total = formatCurrency((NumWithComma(d.getElementById('frm2200T:txtTax20').value)*1));
        total = roundDownComputation(total);

        d.getElementById('frm2200T:txtTax22').value = total;

        if (total.toString().replace(/-/g, '').length > 18) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Item 24 Amount Payable.");

            if (typeof sender === "object") {
                d.getElementById('frm2200T:txtTax22').value = roundDownComputation((NumWithComma(total) * 1) - (NumWithComma(sender.value) * 1));
                sender.value = "0.00";
                sender.onblur();
                sender.focus();
            } 
        } else {
            compute24(sender);
        }
    }

    function compute23C(sender)
    {
        var total = 0.0;

        total = ((NumWithComma(d.getElementById('frm2200T:txtTax23A').value)*1) + (NumWithComma(d.getElementById('frm2200T:txtTax23B').value)*1));

        d.getElementById('frm2200T:txtTax23C').value = roundDownComputation(total);

        compute24(sender);
    }

    function compute24(sender)
    {
        var total = 0.0;

        total = ((NumWithComma(d.getElementById('frm2200T:txtTax22').value)*1) - (NumWithComma(d.getElementById('frm2200T:txtTax23C').value)*1));

        total = roundDownComputation(total);

        d.getElementById('frm2200T:txtTax24').value = total;
        
        if (total.toString().replace(/-/g, '').length > 18) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Item 26 Balance to be Carried Over to Next Return.");

            if (typeof sender === "object" && sender.id == 'frm2200T:PayPenalties') {
                d.getElementById('frm2200T:txtTax23B').value = "0.00";
                compute23C();
                sender.checked = false;
            } else if (typeof sender === "object") {
                sender.value = "0.00";
                sender.onblur();
                sender.focus();
            }
        } 
    }

    function validateForm()
    {
    var dt = new Date();
    var isLeap = new Date(document.getElementById('frm2200T:txtForYr').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm2200T:txtMonth1').value==2 && document.getElementById('frm2200T:txtDate').value==29) {
      alert("Filing year is not a leap year.");
      return;
    }
    if (!isLeap && document.getElementById('frm2200T:txtMonth1').value==2 && document.getElementById('frm2200T:txtDate').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    if (isLeap && document.getElementById('frm2200T:txtMonth1').value==2 && document.getElementById('frm2200T:txtDate').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
        
    if(d.getElementById('frm2200T:txtDate').value == "" || d.getElementById('frm2200T:txtDate').value*1 == 0)
        {
            alert("Please enter valid day on item 1.");
            return;
        }
    if(d.getElementById('frm2200T:txtForYr').value == "")
        {
            alert("Please enter valid year on item 1.");
            return;
        } 
          
        if(d.getElementById('frm2200T:txtForYr').value*1 < 2013)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        } 
        if(d.getElementById('frm2200T:txtDate').value == "")
        {
            alert("Please indicate a valid Day.")
            return;
        }
    if(d.getElementById('frm2200T:txtDate').value.length == 1)
        {
            alert("Please enter a valid day on item 1. Format should be MM/DD/YYYY.")
            return;
        }
    
    
    if(d.getElementById('frm2200T:txtDate').value < 1){
            alert("Please enter a valid day in Item 1.");
            return;
        }


    //Check if valid date
    var month31 = (['01', '03', '05', '07', '08', '10', '12']);
    var month30 = (['04', '06', '09', '11']);
    var month = document.getElementById('frm2200T:txtMonth1').value
    if (month31.contains(month) && document.getElementById('frm2200T:txtDate').value > 31)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    else if (month30.contains(month) && document.getElementById('frm2200T:txtDate').value > 30)
    {
      alert("Invalid date entry on Item no.1.");
      return;
        }

        // Check if date is not future date
          var item1Date = new Date(d.getElementById('frm2200T:txtForYr').value, (d.getElementById('frm2200T:txtMonth1').value) - 1, d.getElementById('frm2200T:txtDate').value);
          if (item1Date > dt) {
            alert("Date on Item 1 cannot be a future date.");
            return;
        }

      if( (d.getElementById('frm2200T:txtTIN1').value == "" || d.getElementById('frm2200T:txtTIN2').value == "" || d.getElementById('frm2200T:txtTIN3').value == "" || d.getElementById('frm2200T:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 4.");
            return;
        }   
          
        if ((d.getElementById('frm2200T:taxpayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 6.");
            return;
        }
         if ((d.getElementById('frm2200T:txtAddress').value == "")) {
            alert("Please enter Taxpayer's Registered Address on Item 7.");
            return;
        }
        if ((d.getElementById('frm2200T:txtZipCode').value == "") || (d.getElementById('frm2200T:txtZipCode').value.length < 4)) {
            alert("Please enter Taxpayer's Zip Code on Item 7A.");
            return;
        }
        if ((d.getElementById('frm2200T:txtTelNum').value == "")) {
            alert("Please enter Contact Number on Item 8.");
            return;
        }
        if( (d.getElementById('frm2200T:txtLineBus').value == "")  )
        {
            alert("Please enter a valid Main Line of Business on Item 9.");
            return;
        }
        if ((d.getElementById('frm2200T:txtPSIC').value == "" || (d.getElementById('frm2200T:txtPSIC').value).length < 4))
        {
            alert("Please enter a valid PSIC on Item 10.");
            return;
        }
        if ((d.getElementById('frm2200T:txtEmailAddress').value == "")) {
            alert("Please enter Email Address on Item 11.");
            return;
        }         
        if(d.getElementById('frm2200ToptRegion').selectedIndex < 1 || d.getElementById('frm2200ToptProvince').selectedIndex < 1 ||
            d.getElementById('frm2200ToptCity').selectedIndex < 1) // || d.getElementById('frm2200T:txtPlaceofProd').value == ""
        {
            alert("Please enter values on item no. 12. All entries must not be empty.")
            return;
        } 
        if(d.getElementById('frm2200ToptRegion1').selectedIndex < 1 || d.getElementById('frm2200ToptProvince1').selectedIndex < 1 ||
            d.getElementById('frm2200ToptCity1').selectedIndex < 1) //|| d.getElementById('frm2200T:txtPlaceofRem').value == ""
        {
            alert("Please enter values on item no. 13. All entries must not be empty.")
            return;
        }


        //Added as of 04/29/2014 based on SRS
        if (d.getElementById('frm2200T:optTreaty_1').checked && d.getElementById('frm2200T:lstTaxTreaty').value == 0) {
            alert("Please select If yes, please specify on Item 14A.");
            return;
        }

        if(!d.getElementById('frm2200T:chkPymntManner_1').checked && !d.getElementById('frm2200T:chkPymntManner_2').checked) {
            alert("Please select an option on Part II Manner of Payment");
            return;
        }
        if (d.getElementById('frm2200T:chkPymntManner_3').checked && d.getElementById('frm2200T:txtOthMannerofPymnt').value == "") {
            alert("Please enter a value on Item 17.");
            return;
        }
        //Added as of 06/04/2014 based on SRS Bug #3785
        var tax22 =  parseFloat(NumWithComma(d.getElementById("frm2200T:txtTax22").value));
        var tax23A = parseFloat(NumWithComma(d.getElementById("frm2200T:txtTax23A").value));
        //if (d.getElementById('frm2200T:chkPymntManner_2').checked && d.getElementById('frm2200T:amendedRtn_2').checked && tax23A <= 0) { //&& tax22 > 0
    // 2014/07/11 - Bug #4230
        if (d.getElementById('frm2200T:chkPymntManner_2').checked && tax23A <= 0) { //&& tax22 > 0
            alert("Please enter Tax Payment / Deposit on Item 25A.")
            return;
        }

        //Added as of 05/12/2014 based on SRS new requirement
        var tax24total = parseFloat("" + d.getElementById('frm2200T:txtTax24').value);
        if(tax24total > 0) {
            alert("Payment not sufficient to cover amount payable. Please check amount in Item 25C.");
                d.getElementById("frm2200T:txtTax23A").focus();
          
            return;
        }

        //05/29/2014 Bug #3732
        var isValidSched1 = validateSchedule1();
        if (!isValidSched1) {
            d.getElementById("frm2200T:btnSchedule1").onclick();
            return;
        }

        enabledDisabled(true);
        setDisabledBackgroundColor();
        alert("Validation successful. Click on Edit if you wish to modify your entries.");

    return;
    }

    function editForm()
    {
      enableAllControl();
      enabledDisabled(false);

      d.getElementById('frm2200T:cmdValidate').disabled = false;
      d.getElementById('frm2200T:cmdEdit').disabled = true;
      d.getElementById('frm2200T:btnFinalCopy').disabled = true;
      d.getElementById('btnUpload').disabled = true;
      //Added as of 04/29/2014 (based on 1700's series)
      d.getElementById('btnPrint').disabled = true;
        
      setEnabledBackgroundColor();
      d.getElementById('frm2200T:txtTIN1').disabled = true;
      d.getElementById('frm2200T:txtTIN2').disabled = true;
      d.getElementById('frm2200T:txtTIN3').disabled = true;
      d.getElementById('frm2200T:txtBranchCode').disabled = true; 
      document.getElementById('frm2200T:txtEmailAddress').disabled = true;
    }
    
  var disableElem = true;
  var enableElem = false;
  function enabledDisabled(param)
  {
        d.getElementById('frm2200T:amendedRtn_1').disabled = param;
        d.getElementById('frm2200T:amendedRtn_2').disabled = param;
        d.getElementById('frm2200T:txtMonth1').disabled = param;
        d.getElementById('frm2200T:txtDate').disabled = param;
        d.getElementById('frm2200T:txtForYr').disabled = param;
        d.getElementById('frm2200T:txtSheets').disabled = true;
        
        d.getElementById('frm2200T:txtEmailAddress').disabled = param;
        d.getElementById('frm2200ToptRegion').disabled = param;
        d.getElementById('frm2200ToptProvince').disabled = param;
        d.getElementById('frm2200ToptCity').disabled = param;
        d.getElementById('frm2200ToptRegion1').disabled = param;
        d.getElementById('frm2200ToptProvince1').disabled = param;
        d.getElementById('frm2200ToptCity1').disabled = param;
        d.getElementById('frm2200T:optTreaty_1').disabled = param;
        d.getElementById('frm2200T:optTreaty_2').disabled = param;
        d.getElementById('frm2200T:txtTax21A').disabled = param;
        d.getElementById('frm2200T:txtTax21B').disabled = param;
        d.getElementById('frm2200T:txtTax21C').disabled = param;

        if(d.getElementById('frm2200T:optTreaty_1').checked){
            d.getElementById('frm2200T:lstTaxTreaty').disabled = param;
        }

        d.getElementById('frm2200T:chkPymntManner_1').disabled = param;
        d.getElementById('frm2200T:chkPymntManner_2').disabled = param;

        if (d.getElementById('frm2200T:chkPymntManner_2').checked) {
           
            d.getElementById('frm2200T:txtTax21A').disabled = true;
            d.getElementById('frm2200T:txtTax21B').disabled = true;
            d.getElementById('frm2200T:txtTax21C').disabled = true;
            d.getElementById('frm2200T:btnSchedule1').disabled = true;
            d.getElementById('frm2200T:PayPenalties').disabled = true;
            dateMonthYear();
        }
        if (d.getElementById('frm2200T:chkPymntManner_2').checked && d.getElementById('frm2200T:chkPymntManner_3').checked) {
            d.getElementById('frm2200T:txtOthMannerofPymnt').disabled = false;
        }
        if (d.getElementById('frm2200T:chkPymntManner_2').checked && !d.getElementById('frm2200T:chkPymntManner_3').checked) {
            d.getElementById('frm2200T:txtOthMannerofPymnt').disabled = true;
        }

        //d.getElementById('frm2200T:btnSchedule1').disabled = param;
        d.getElementById('frm2200T:txtTax17A').disabled = param;

        if (d.getElementById('frm2200T:amendedRtn_2').checked) {
            d.getElementById('frm2200T:txtTax23A').disabled = param;
        }

        d.getElementById("frm2200T:txtTax19").disabled = param;

        if(!param) {
            if(d.getElementById("frm2200T:amendedRtn_1").checked) {
                d.getElementById("frm2200T:txtTax19").disabled = false;
            } else {
                d.getElementById("frm2200T:txtTax19").disabled = true;
            }
        }

        if (param) {
            //Added as of 4/30/2014
            getEnabledText();
            if (!d.getElementById('frm2200T:cmdValidate').disabled) {
                getDisabledText();
            }

            $("input:text", $("#frmMain")).attr("disabled", true);
            $("input:radio", $("#frmMain")).attr("disabled", true);
            $("input:checkbox", $("#frmMain")).attr("disabled", true);
            $("input:button", $("#frmMain")).attr("disabled", true);
            $("select", $("#frmMain")).attr("disabled", true);
            $(".enabledButton").attr("disabled", false);

            if (!gIsReadOnly) {
                d.getElementById('frm2200T:cmdValidate').disabled = true;
                d.getElementById('frm2200T:cmdEdit').disabled = false;
                d.getElementById('frm2200T:btnFinalCopy').disabled = false;
                d.getElementById('btnUpload').disabled = false;
                //Added as of 04/29/2014 (based on 1700's series)
                d.getElementById('btnSave').disabled = false;
                d.getElementById('btnPrint').disabled = false;
                document.getElementById('frm2200T:btnPrintPreview').disabled = false;
            }
            else if (gIsReadOnly) {
                d.getElementById('btnUpload').disabled = false;
                d.getElementById('btnPrint').disabled = false;
                document.getElementById('frm2200T:btnPrintPreview').disabled = false;
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
    var isLeap = new Date(document.getElementById('frm2200T:txtForYr').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm2200T:txtMonth1').selectedIndex==1 && document.getElementById('frm2200T:txtDate').value>28) {
      alert("Filing year is not a leap year.");
      return;
    }
    
    if (isLeap && document.getElementById('frm2200T:txtMonth1').selectedIndex==1 && document.getElementById('frm2200T:txtDate').value>29) {
      alert("Invalid date entry.");
      return;
    }
    
    if(d.getElementById('frm2200T:txtDate').value == "" || d.getElementById('frm2200T:txtDate').value*1 == 0)
        {
            alert("Please enter valid day on item 1.");
            return;
        }
    if(d.getElementById('frm2200T:txtForYr').value == "")
        {
            alert("Please enter valid year on item 1.");
            return;
        } 
        if(d.getElementById('frm2200T:txtForYr').value*1 < 1900)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        } 
        if(d.getElementById('frm2200T:txtDate').value*1 > 31 || d.getElementById('frm2200T:txtDate').value == "")
        {
            alert("Please indicate a valid Day.")
            return;
        }

    if( (d.getElementById('frm2200T:txtTIN1').value == "" || d.getElementById('frm2200T:txtTIN2').value == "" || d.getElementById('frm2200T:txtTIN3').value == "" || d.getElementById('frm2200T:txtBranchCode').value == "")  )
    {
      alert("Please enter a valid TIN number on Item 4.");
      return false;
        }

        
        if ((d.getElementById('frm2200T:taxpayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 6.");
            return false;
        }
      
        //Registered Address must be valid
        if (d.getElementById('frm2200T:txtAddress').value === "") {
            alert("Please enter a valid Registered Address on Item 7.");
            return false;
        }

    //ZipCode
    if ((d.getElementById('frm2200T:txtZipCode').value == "") || (d.getElementById('frm2200T:txtZipCode').value.length < 4)) {
            alert("Please enter Taxpayer's Zip Code on Item 7A.");
            return;
        }

        //Contact Number must be valid
        if (d.getElementById('frm2200T:txtTelNum').value === "") {
            alert("Please enter a valid Contact Number on Item 8.");
            return false;
        }

        if ((d.getElementById('frm2200T:txtLineBus').value == "")) {
            alert("Please enter a valid Main Line of Business on Item 9.");
            return false;
        }
    return true;
  } 
//enable rdo, name, address, contact number if from main screen, it is empty as of 04/28/2014 (Based on 1700's series)
function enableFieldsIfEmptyFromMainScreen(rdoCode, fullname, address, zipCode, contact, lineOfBusiness) {

    if (rdoCode == "000") {
        d.getElementById('frm2200T:txtRDOCode').disabled = false;
    }

    if (fullname.toString() === "") {
        d.getElementById('frm2200T:taxpayerName').disabled = false;
    }

    if (address.toString() === "") {

        d.getElementById('frm2200T:txtAddress').disabled = false;
    }

    if (zipCode.toString() === "" || (zipCode.length < 4)) {

        d.getElementById('frm2200T:txtZipCode').disabled = false;
    }

    if (contact.toString() === "") {

        d.getElementById('frm2200T:txtTelNum').disabled = false;
    }

    if (lineOfBusiness.toString() === "") {

        d.getElementById('frm2200T:txtLineBus').disabled = false;
    }
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

var isPrintingOthers = false;
function printOCR() {
    $("#formPaper").show();
  
    isPrintingModal = false;

    if ($("div[id*='modalCalculator']").is(":visible")) {
        $("#MainContent").hide();
        printModal($("div[id*='modalCalculator']:visible").attr("id"));
    }
    else {
        var isSchedule1 = ($('#modalSched1').is(":visible")) ? true : false;

        var currentPageContent = (isSchedule1) ? "modalSched1" : "MainContent";
        var currentPrintContent = "Print" + currentPageContent;

        var currentPrintElems = d.getElementById("Print" + currentPageContent).getElementsByTagName("span");
        var index, currentPrintElemsLen = currentPrintElems.length;
        for (index = 0; index < currentPrintElemsLen; index++) {
            currentPrintElems[index].innerHTML = "";
        }

        $("#" + currentPageContent).hide();
        $("#" + currentPrintContent).show();

        //Others
        if (isSchedule1 && d.getElementById('frm2200TadditionalSched1').rows.length > 1) {
            $('#frm2200TProducts').hide();
            $('#frm2200TInspection').hide();
            $('.columnHeader').hide();
            $('#frm2200TadditionalSched1 tr:eq(0)').hide();

            $( "#frm2200TadditionalSched1" ).prepend( '<tr class="modalColumnHeader printColumnHeader"><td align="center"  width="2%">&nbsp;</td><td align="center"  width="6%">&nbsp;</td>' +
                '<td align="center"  width="14%">&nbsp;</td>' +
                '<td align="center"  width="10%">&nbsp;</td>' +
                '<td align="center"  width="6%">&nbsp;</td>' +
                '<td align="center"  width="44%" colspan="2">Tax Base (Value/Volume of Removals)</td>' +
                '<td align="center"  width="19%">&nbsp;</td></tr>' +
                '<tr class="modalColumnHeader printColumnHeader">' +
                '<td align="center"  width="2%">&nbsp;</td>' +
                '<td align="center"  width="6%">ATC</td>' +
                '<td align="center"  width="14%">Description</td>' +
                '<td align="center"  width="10%">Tax Bracket/ Unit of Measure</td>' +
                '<td align="center"  width="6%">Applicable Tax Rate</td>' +
                '<td align="center"  width="22%">Export/Exempt</td>' +
                '<td align="center"  width="22%">Taxable</td>' +
                '<td align="center"  width="19%">Basic Excise Tax Due</td>' +
            '</tr>');

            $("#frm2200TadditionalSched1 input:disabled").attr("disabled", false);
            $("#frm2200TadditionalSched1 input[type='text']").attr("readonly", true).css({ "background-color": "White" });
            $("#frm2200TadditionalSched1 input[type='checkbox']").attr("disabled", true);
            isPrintingOthers = true;
        } else {
            $('#modalSched1').removeClass("printSignFooterClass");
        }

        $('#bg').hide();
        $('.printSignFooterClass').css({ 'width': '94%', 'margin': 'auto', 'margin-top': '40px', 'display': 'block', 'position': 'relative', 'overflow': 'visible', 'page-break-before': 'always', 'background': '#ffffff' });
        $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
  

        //Re-assign css for Schedule 1 05/02/20142px
        $('#modalSched1').css({ 'width': '800px', 'left': '-25px', 'margin-top': '-100px', 'top': '0' });

        var elems = d.getElementById(currentPageContent).getElementsByTagName("*");

        var i, len = elems.length, tempElem = {}, tempVal = {};
        for (i = 0; i < len; i++) {

            if (elems[i] !== null && elems[i].type !== "undefined" && elems[i].type !== "hidden" && elems[i].type != 'button' && elems[i].id !== "") {
                var elementID = elems[i].id;

                tempElem = $("#" + ((elems[i].id.indexOf('frm2200T:') != -1) ? elems[i].id : elems[i].id.split("frm2200T")[1]));

                if (typeof (tempElem) !== "undefined" || tempElem !== null) {
                    if (elems[i].id.indexOf("txtTax") > -1) {
                        tempVal = elems[i].value.split(".");
                        if (tempVal.length > 0) {
                            $("#" + elementID.split(":")[1]).html(tempVal[0]);
                            $("#" + elementID.split(":")[1] + "_2").html(tempVal[1]);
                        }
                    }
                    else if (elementID == 'frm2200T:txtAddress') {
                        var address = d.getElementById('frm2200T:txtAddress').value;

                        if (address.length > 71) {
                            d.getElementById('txtAddress').innerHTML = address.substring(0, 71);
                            d.getElementById('txtAddress2').innerHTML = address.substring(71, (address.length <= 125) ? address.length : 125);
                        } else {
                            d.getElementById('txtAddress').innerHTML = address;
                        }
                    }
                    else if (elems[i].type === "radio" || elems[i].type === "checkbox") {
                        if (d.getElementById(elementID.split(":")[1]) != null) {
                            d.getElementById(elementID.split(":")[1]).innerHTML = (elems[i].checked) ? "X" : "";
                        }
                    }
                    else if (elems[i].type === "select-one") {
                        var drpValue = (elementID.indexOf("frm2200T:") != -1 && elementID.indexOf("lstTaxTreaty") == -1) ? elems[i].value : ((elementID.indexOf("lstTaxTreaty") != -1) ? $("#frm2200T\\:" + elementID.split("frm2200T:")[1] + " option:selected").text() : $("#" + elementID + " option:selected").text());
                        elementID = (elementID.indexOf("frm2200T:") != -1) ? elementID.split("frm2200T:")[1] : elementID.split("frm2200T")[1];

                    if (d.getElementById(elementID) != null) {
                        d.getElementById(elementID).innerHTML = drpValue;
                    }
                }
                else if (elems[i].type === "text") {
                    if (d.getElementById(elementID.split(":")[1]) != null) {
                        if (elementID.split(":")[1] == "txtsched1Atc0") {
                            d.getElementById(elementID.split(":")[1]).innerHTML = elems[i].value.split("XT")[1];
                        }
                        else {
                            d.getElementById(elementID.split(":")[1]).innerHTML = elems[i].value;
                        }
                    }
                    else if (elementID.indexOf("txtPro") != -1 && parseInt(d.getElementById('frm2200T:txtForYr').value) < 2018) {
                        d.getElementById(elementID.split(":")[1] + d.getElementById('frm2200T:txtForYr').value).innerHTML = elems[i].value;
                    }
                }
            }
        }
    }

        alert("This form must be printed on Legal Size Paper. Please update your Printer Settings (Set Paper Size to Legal under Preferences -> Advanced) to ensure the correct printout of the form.\n\n" +
              "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166, Enable Shrink-to-Fit must be unchecked, and all Headers & Footers must be set to empty.");
        
        $('#formPaper').css({ 'border': 'none' });
        $("#PrintMainContent").show();
        window.print();

        $("#PrintMainContent").hide();
        $("#formPaper").show();
        $("#MainContent").show();
        $('.defaultBtns').show();

    }
}
  var atcList = new Array();
  var sched1ATCList = [];
  var atcCount = 0;

function atcPropertyJS(atcCode, description, rate) {
    this.atcCode = atcCode;
    this.description = description;
    this.rate = rate;
}

function filteredATCPropertyJS(atcCode, description, year, rate) {
    this.atcCode = atcCode;
    this.description = description;
    this.year = year;
    this.rate = rate;
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

function loadATC() {
    /*This will load data onto an array*/
    var response = d.getElementById("responseATC");

    var atcCnt = String(response.innerHTML).split('atcCount=');
    atcCount = atcCnt[1];
    //var j = 0;
    //loads atcList from xml
    for (var i = 1; i <= atcCount; i++) {
        var atc = String(response.innerHTML).split('atc' + i + ':');
        var atcStr = atc[1];

        //Ensure that before writing to atcPropertyJS the formType 1702MX is traceable in atcStr
        if (atcStr.indexOf('2200T') >= 0) {
            var atcValues = atcStr.split('~');

            var atcCode = atcValues[0];
            var description = atcValues[1];
            var rate = atcValues[2];

            var objATC = new atcPropertyJS(atcCode, description, rate);

            atcList.push(objATC);
        }
        else {
            continue;
        }
    }
}

function setATCSchedule1(year) {
    //if ((year * 1) >= 2013) {
    var i = 0; len = atcList.length;

    sched1ATCList = [];

    for (i; i < len; i++) {
        var atcDescYear = atcList[i].description.split("==");

        if (atcDescYear.length === 2 && atcDescYear[1].toString() === year.toString()) {
            var filteredATC = new filteredATCPropertyJS(atcList[i].atcCode, atcDescYear[0], atcDescYear[1], atcList[i].rate);

            sched1ATCList.push(filteredATC);
        }
    }
}

function changeTaxRatePerYear() {
    var row = $('#frm2200TProducts').find('tr');

    var atcCode = new Array();
    var description = new Array();
    var rate = new Array();

    var year = (parseInt(d.getElementById('frm2200T:txtForYr').value) - 2017);
    var rateXT010 = parseFloat('2.05')
    var rateXT020 = parseFloat('1.75');
    var rateXT036 = parseFloat('5.85');
    var rateXT040 = parseFloat('30.00');
    var rateXT140 = parseFloat('30.00');
    var rateXT150 = parseFloat('30.00');

    for (x = 0; x < year; x++) {
        rateXT010 += rateXT010 * .04;
        rateXT020 += rateXT020 * .04;
        rateXT036 += rateXT036 * .04;
        rateXT040 += rateXT040 * .04;
        rateXT140 += rateXT140 * .04;
        rateXT150 += rateXT150 * .04;
    }

    

    if (d.getElementById('frm2200T:txtForYr').value != "") {
        for (i = 0; i <= 8; i++) {

            if (sched1ATCList.length === 0) {
                switch (i) {
                    case 0:
                        atcCode[0] = 'XT010';
                        description[0] = '<b>1.) Tobacco Products</b><br/>a. Tobacco twisted by hand or reduced into a condition to be consumed in any manner other than the ordinary mode of drying and curing';
                        rate[0] = rateXT010.toFixed(2);
                        break;
                    case 1:
                        atcCode[1] = 'XT010';
                        description[1] = 'b. Tobacco prepared or partially prepared with or without the use of any machine or instrument or without being pressed or sweetened';
                        rate[1] = rateXT010.toFixed(2);
                        break;
                    case 2:
                        atcCode[2] = 'XT010';
                        description[2] = 'c. Fine-cut shorts and refuse, scraps, clippings, cuttings, stems, midribs and sweepings of tobacco';
                        rate[2] = rateXT010.toFixed(2);
                        break;
                    case 3:
                        atcCode[3] = 'XT020';
                        description[3] = '<b>2.) Chewing tobacco unsuitable for use in any other manner</b>';
                        rate[3] = rateXT020.toFixed(2);
                        break;
                    case 4:
                        atcCode[4] = 'XT035';
                        description[4] = '<b>3.) Cigars</b> <br/>a. Ad Valorem Tax - Based on the net retail price (NRP) per Cigar [excluding the excise and value-added tax (VAT)]';
                        rate[4] = .20;
                        break;
                    case 5:
                        atcCode[5] = 'XT036';
                        description[5] = 'b. In addition to Ad Valorem Tax, a Specific Tax per Cigar';
                        rate[5] = rateXT036.toFixed(2);
                        break;
                    case 6:
                        atcCode[6] = 'XT040';
                        description[6] = '<b>4.) Cigarettes</b> <br/> Cigarettes packed by hand';
                        rate[6] = rateXT040.toFixed(2);
                        break;
                    case 7:
                        atcCode[7] = 'XT140';
                        description[7] = 'b. Cigarettes packed by machine, where the NRP (excluding the excise and VAT) per pack is PHP11.50 and below';
                        rate[7] = rateXT140.toFixed(2);
                        break;
                    case 8:
                        atcCode[8] = 'XT150';
                        description[8] = 'More than Php11.50';
                        rate[8] = rateXT150.toFixed(2);
                        break;
                }
            }
            else {
                for (x = 0; x <= 8; x++) {
                    atcCode[x] = sched1ATCList[x].atcCode;
                    description[x] = sched1ATCList[x].description;
                    rate[x] = sched1ATCList[x].rate;
                }
            }

            row[i].cells[0].innerHTML = atcCode[i];
            row[i].cells[1].innerHTML = description[i];
            row[i].cells[3].innerHTML = rate[i] + "<input type='hidden' name='frm2200T:hideProAppRate" + i + "' id='frm2200T:hideProAppRate" + i + "' value='" + rate[i] + "'>";

            if (i == 4) {
                row[i].cells[3].innerHTML = "20%" + "<input type='hidden' name='frm2200T:hideProAppRate" + i + "' id='frm2200T:hideProAppRate" + i + "' value='" + rate[i] + "'>";
            }

            computeProBasicTaxDue(i);
        }
    }

    d.getElementById('frm2200T:txtTax16').value = d.getElementById('frm2200T:totalTaxDue').value;
    compute18();
}

    function validateDate() {
        var strmmddyyyy = d.getElementById('frm2200T:txtMonth1').value + "/" + d.getElementById('frm2200T:txtDate').value + "/" + d.getElementById('frm2200T:txtForYr').value;
       var isValid = true;
       var currentDate = new Date();
       var inputDate = new Date();
       var result = strmmddyyyy.split("/");

       if (strmmddyyyy != "") {
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
               else if ($.inArray(month, month31) > -1 && day > 31) {
                   isValid = false;
               }
               else if ($.inArray(month, month30) > -1 && day > 30) {
                   isValid = false;
               }

               inputDate = new Date(result[2], month - 1, day);
           }
           else {
               isValid = false;
           }
       }

       var currentDateString = currentDate.getDate().toString();

       currentDateString = currentDateString.length < 2 ? "0" + currentDateString : currentDateString;

       if (!isValid) {
           alert('Please provide a valid date (MM/DD/YYYY).');
           d.getElementById('frm2200T:txtMonth1').selectedIndex = currentDate.getMonth();
           d.getElementById('frm2200T:txtDate').value = currentDateString;
           d.getElementById('frm2200T:txtForYr').value = currentDate.getFullYear();
       }
       else if (inputDate > currentDate) {
           alert('This date cannot be a future date.');
           d.getElementById('frm2200T:txtMonth1').selectedIndex = currentDate.getMonth();
           d.getElementById('frm2200T:txtDate').value = currentDateString;
           d.getElementById('frm2200T:txtForYr').value = currentDate.getFullYear();
       }
       else if (result[2] < 2013) {
           alert('The year cannot be less than 2013.');
           d.getElementById('frm2200T:txtForYr').value = currentDate.getFullYear();
       }

       return isValid;
   }
   function validateEmail(sender) {
       var mailformat = /\b[a-zA-Z0-9._%+-]+@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}\b/;
       sender.value = (sender.value).split(' ').join('');
       if (sender.value.match(mailformat) == null && $.trim(sender.value) != "") {
           alert("Please enter a valid Email Address on Item 11.");
           sender.value = '';
           sender.focus();
       }
   }
function recomputePrepayment() {
       d.getElementById('frm2200T:txtTax16').value = "0.00";
       compute18();
   }
function recomputePaymentActual() {
       d.getElementById('frm2200T:txtTax16').value = d.getElementById('frm2200T:totalTaxDue').value;
       compute18();
   }
   function calculatorXT35ModalLayout() {
        var tableID = "tblCalculatorXT35";
        var i = d.getElementById(tableID).rows.length;
        var cell = [];
        cell[0] = tableID;
        cell[1] = '<tr><td  id="td_' + (i + 1) + 'C1" width="03%"><input id="frm2200T:chkXT35Delete_' + (i + 1) + 'C1" name="frm2200T:chkXT35Delete[]" type="checkbox" width="05%"/></td>';
        cell[2] = '<td id="td_' + (i + 1) + 'C2" width="22%"><input type="text" style="width: 95%" value=""  maxlength="30" id="frm2200T:txtXT35_' + (i + 1) + 'C2" name="frm2200T:txtXT35_desc[]" onfocus="onFocusIterate(this);" onblur ="checkIfValidValues(this);capitalize(this);onBlurIterate(this);" onkeypress="return Name(this, event)"/></td>';
        cell[3] = '<td id="td_' + (i + 1) + 'C3" width="25%"><input type="text" style="text-align: right; width: 95%" value="0" maxlength="12" id="frm2200T:txtXT35_' + (i + 1) + 'C3" name="frm2200T:txtXT35_cigars[]"  onfocus="onFocusIterate(this);" onkeypress="return wholenumber(this, event);" onblur="setToZeroIfEmpty(this);computeCalculatorXT35(' + (i + 1) + ');onBlurIterate(this);"/></td>';
        cell[4] = '<td id="td_' + (i + 1) + 'C4" width="25%"><input type="text" style="text-align: right; width: 95%" value="0.00" maxlength="12" id="frm2200T:txtXT35_' + (i + 1) + 'C4" name="frm2200T:txtXT35_nrp[]"  onfocus="onFocusIterate(this);" onkeypress="return numbersonly(this, event);" onblur="roundDownWithAlert(this);computeCalculatorXT35(' + (i + 1) + ');onBlurIterate(this);"/></td>';
        cell[5] = '<td id="td_' + (i + 1) + 'C5" width="25%"><input type="text" style="text-align: right; width: 95%" value="0.00" maxlength="12" id="frm2200T:txtXT35_' + (i + 1) + 'C5"  name="frm2200T:txtXT35_base[]" disabled class="disableByDefault" onfocus="onFocusIterate(this);" onblur="onBlurIterate(this);" /></td></tr>';

        return cell;
    }

    function calculatorXT36ModalLayout() {
        var tableID = "tblCalculatorXT36";
        var i = d.getElementById(tableID).rows.length;
        var cell = [];
        cell[0] = tableID;
        cell[1] = '<tr><td width="05%"><input id="frm2200T:chkXT36Delete_' + (i + 1) + 'C1" name="frm2200T:chkXT36Delete[]" type="checkbox" width="05%"/></td>';
        cell[2] = '<td width="48%"><input type="text" style="width: 90%;" value="" maxlength="30" id="frm2200T:txtXT36_' + (i + 1) + 'C2"  name="frm2200T:txtXT36_desc[]"  onfocus="onFocusIterate(this);" onblur ="checkIfValidValues(this);capitalize(this);onBlurIterate(this);" onkeypress="return Name(this, event)"/></td>';
        cell[3] = '<td width="47%"><input type="text" style="text-align: right;  width: 80%;" value="0" maxlength="12" id="frm2200T:txtXT36_' + (i + 1) + 'C3"  name="frm2200T:txtXT36_cigars[]"  onfocus="onFocusIterate(this);" onkeypress="return wholenumber(this, event);" onblur="setToZeroIfEmpty(this);computeCalculatorXT36(' + (i + 1) + ');onBlurIterate(this);"/></td></tr>';

        return cell;
    }

    function calculatorXT40ModalLayout() {
        var tableID = "tblCalculatorXT40";
        var i = d.getElementById(tableID).rows.length;
        var cell = [];
        //cell[0], always set to table ID
        cell[0] = tableID;
        cell[1] = '<tr><td  id="td_' + (i + 1) + 'C1" width="03%"><input id="frm2200T:chkXT40Delete_' + (i + 1) + 'C1" name="frm2200T:chkXT40Delete[]" type="checkbox"/></td>';
        cell[2] = '<td id="td_' + (i + 1) + 'C2" width="20%"><input type="text" style="width: 95%;" value="" maxlength="30" id="frm2200T:txtXT40_' + (i + 1) + 'C2" name="frm2200T:txtXT40_desc[]"  onfocus="onFocusIterate(this);" onblur ="checkIfValidValues(this);capitalize(this);onBlurIterate(this);" onkeypress="return Name(this, event)"/></td>';
        cell[3] = '<td id="td_' + (i + 1) + 'C3" width="15%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT40_' + (i + 1) + 'C3" name="frm2200T:txtXT40_cases[]"  onfocus="onFocusIterate(this);" onkeypress="return wholenumber(this, event);" onblur="setToZeroIfEmpty(this);computeCalculatorXT40(' + (i + 1) + ');onBlurIterate(this);"/></td>';
        cell[4] = '<td id="td_' + (i + 1) + 'C4" width="15%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT40_' + (i + 1) + 'C4" name="frm2200T:txtXT40_r_case[]"  onfocus="onFocusIterate(this);" onkeypress="return wholenumber(this, event);" onblur="setToZeroIfEmpty(this);computeCalculatorXT40(' + (i + 1) + ');onBlurIterate(this);"/></td>';
        cell[5] = '<td id="td_' + (i + 1) + 'C5" width="17%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT40_' + (i + 1) + 'C5" name="frm2200T:txtXT40_reams[]"  disabled class="disableByDefault" onfocus="onFocusIterate(this);" onblur="onBlurIterate(this);"/></td>';
        cell[6] = '<td id="td_' + (i + 1) + 'C6" width="13%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT40_' + (i + 1) + 'C6" name="frm2200T:txtXT40_p_reams[]"  onfocus="onFocusIterate(this);" onkeypress="return wholenumber(this, event);" onblur="setToZeroIfEmpty(this);computeCalculatorXT40(' + (i + 1) + ');onBlurIterate(this);"/></td>';
        cell[7] = '<td id="td_' + (i + 1) + 'C7" width="17%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT40_' + (i + 1) + 'C7" name="frm2200T:txtXT40_packs[]"  disabled class="disableByDefault" onfocus="onFocusIterate(this);" onblur="onBlurIterate(this);"/></td></tr>';

        return cell;
    }

    function calculatorXT140ModalLayout() {
        var tableID = "tblCalculatorXT140";
        var i = d.getElementById(tableID).rows.length;
        var cell = [];
        //cell[0], always set to table ID
        cell[0] = tableID;
        cell[1] = '<tr><td  id="td_' + (i + 1) + 'C1" width="03%"><input id="frm2200T:chkXT140Delete_' + (i + 1) + 'C1" name="frm2200T:chkXT140Delete[]" type="checkbox"/></td>';
        cell[2] = '<td id="td_' + (i + 1) + 'C2" width="20%"><input type="text" style="width: 95%;" value="" maxlength="30" id="frm2200T:txtXT140_' + (i + 1) + 'C2" name="frm2200T:txtXT140_desc[]"  onfocus="onFocusIterate(this);" onblur ="checkIfValidValues(this);capitalize(this);onBlurIterate(this);" onkeypress="return Name(this, event)"/></td>';
        cell[3] = '<td id="td_' + (i + 1) + 'C3" width="15%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT140_' + (i + 1) + 'C3" name="frm2200T:txtXT140_cases[]"  onfocus="onFocusIterate(this);" onkeypress="return wholenumber(this, event);" onblur="setToZeroIfEmpty(this);computeCalculatorXT140(' + (i + 1) + ');onBlurIterate(this);"/></td>';
        cell[4] = '<td id="td_' + (i + 1) + 'C4" width="15%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT140_' + (i + 1) + 'C4" name="frm2200T:txtXT140_r_cases[]"  onfocus="onFocusIterate(this);" onkeypress="return wholenumber(this, event);" onblur="setToZeroIfEmpty(this);computeCalculatorXT140(' + (i + 1) + ');onBlurIterate(this);"/></td>';
        cell[5] = '<td id="td_' + (i + 1) + 'C5" width="17%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT140_' + (i + 1) + 'C5" name="frm2200T:txtXT140_reams[]"  disabled class="disableByDefault" onfocus="onFocusIterate(this);" onblur="onBlurIterate(this);"/></td>';
        cell[6] = '<td id="td_' + (i + 1) + 'C6" width="13%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT140_' + (i + 1) + 'C6" name="frm2200T:txtXT140_p_reams[]"  onfocus="onFocusIterate(this);" onkeypress="return wholenumber(this, event);" onblur="setToZeroIfEmpty(this);computeCalculatorXT140(' + (i + 1) + ');onBlurIterate(this);"/></td>';
        cell[7] = '<td id="td_' + (i + 1) + 'C7" width="17%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT140_' + (i + 1) + 'C7" name="frm2200T:txtXT140_packs[]"  disabled class="disableByDefault" onfocus="onFocusIterate(this);" onblur="onBlurIterate(this);"/></td></tr>';

        return cell;
    }

    function calculatorXT150ModalLayout() {
        var tableID = "tblCalculatorXT150";
        var i = d.getElementById(tableID).rows.length;
        var cell = [];
        //cell[0], always set to table ID
        cell[0] = tableID;
        cell[1] = '<tr><td  id="td_' + (i + 1) + 'C1" width="03%"><input id="frm2200T:chkXT150Delete_' + (i + 1) + 'C1" name="frm2200T:chkXT150Delete[]" type="checkbox"/></td>';
        cell[2] = '<td id="td_' + (i + 1) + 'C2" width="20%"><input type="text" style="width: 95%;" value="" maxlength="30" id="frm2200T:txtXT150_' + (i + 1) + 'C2" name="frm2200T:txtXT150_desc[]"  onfocus="onFocusIterate(this);" onblur ="checkIfValidValues(this);capitalize(this);onBlurIterate(this);" onkeypress="return Name(this, event)"/></td>';
        cell[3] = '<td id="td_' + (i + 1) + 'C3" width="15%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT150_' + (i + 1) + 'C3" name="frm2200T:txtXT150_cases[]"  onfocus="onFocusIterate(this);" onkeypress="return wholenumber(this, event);" onblur="setToZeroIfEmpty(this);computeCalculatorXT150(' + (i + 1) + ');onBlurIterate(this);"/></td>';
        cell[4] = '<td id="td_' + (i + 1) + 'C4" width="15%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT150_' + (i + 1) + 'C4" name="frm2200T:txtXT150_r_case[]"  onfocus="onFocusIterate(this);" onkeypress="return wholenumber(this, event);" onblur="setToZeroIfEmpty(this);computeCalculatorXT150(' + (i + 1) + ');onBlurIterate(this);"/></td>';
        cell[5] = '<td id="td_' + (i + 1) + 'C5" width="17%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT150_' + (i + 1) + 'C5" name="frm2200T:txtXT150_reams[]"  disabled class="disableByDefault" onfocus="onFocusIterate(this);" onblur="onBlurIterate(this);"/></td>';
        cell[6] = '<td id="td_' + (i + 1) + 'C6" width="13%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT150_' + (i + 1) + 'C6" name="frm2200T:txtXT150_p_reams[]"  onfocus="onFocusIterate(this);" onkeypress="return wholenumber(this, event);" onblur="setToZeroIfEmpty(this);computeCalculatorXT150(' + (i + 1) + ');onBlurIterate(this);"/></td>';
        cell[7] = '<td id="td_' + (i + 1) + 'C7" width="17%"><input type="text" style="text-align: right; width: 95%;" value="0" maxlength="12" id="frm2200T:txtXT150_' + (i + 1) + 'C7" name="frm2200T:txtXT150_packs[]"  disabled class="disableByDefault" onfocus="onFocusIterate(this);" onblur="onBlurIterate(this);"/></td></tr>';

        return cell;
    }
    function computeCalculatorXT35(i) {
        //getProduct('frm2200T:txtXT35_' + (i) + 'C3', 'frm2200T:txtXT35_' + (i) + 'C4', 'frm2200T:txtXT35_' + (i) + 'C5',0, i);
        getProduct('frm2200T:txtXT35_' + (i) + 'C3','frm2200T:txtXT35_' + (i) + 'C4','frm2200T:txtXT35_' + (i) + 'C5',2, i);
        computeCalculatorSubTotal(false, 'tblCalculatorXT35', 'C5', 'frm2200T:txtXT35Total', 'frm2200T:txtProTaxable4', 2, i);
    }

    function computeCalculatorXT36(i) {
        //getProduct('frm2200T:txtXT36_' + (i) + 'C3', 'frm2200T:txtXT36_' + (i) + 'C4', 'frm2200T:txtXT36_' + (i) + 'C5', 0, i);
        computeCalculatorSubTotal(false, 'tblCalculatorXT36', 'C3', 'frm2200T:txtXT36Total', 'frm2200T:txtProTaxable5', 0, i);
    }

    function computeCalculatorXT40(i) {
        getProduct('frm2200T:txtXT40_' + (i) + 'C3', 'frm2200T:txtXT40_' + (i) + 'C4', 'frm2200T:txtXT40_' + (i) + 'C5', 0, i);
        getProduct('frm2200T:txtXT40_' + (i) + 'C5', 'frm2200T:txtXT40_' + (i) + 'C6', 'frm2200T:txtXT40_' + (i) + 'C7', 0, i);
        computeCalculatorSubTotal(false, 'tblCalculatorXT40', 'C7', 'frm2200T:txtXT40Total', 'frm2200T:txtProTaxable6', 0, i);
    }

    function computeCalculatorXT140(i) {
        getProduct('frm2200T:txtXT140_' + (i) + 'C3', 'frm2200T:txtXT140_' + (i) + 'C4', 'frm2200T:txtXT140_' + (i) + 'C5', 0, i);
        getProduct('frm2200T:txtXT140_' + (i) + 'C5', 'frm2200T:txtXT140_' + (i) + 'C6', 'frm2200T:txtXT140_' + (i) + 'C7', 0, i);
        computeCalculatorSubTotal(false, 'tblCalculatorXT140', 'C7', 'frm2200T:txtXT140Total', 'frm2200T:txtProTaxable7', 0, i);
    }

    function computeCalculatorXT150(i) {
        getProduct('frm2200T:txtXT150_' + (i) + 'C3', 'frm2200T:txtXT150_' + (i) + 'C4', 'frm2200T:txtXT150_' + (i) + 'C5', 0, i);
        getProduct('frm2200T:txtXT150_' + (i) + 'C5', 'frm2200T:txtXT150_' + (i) + 'C6', 'frm2200T:txtXT150_' + (i) + 'C7', 0, i);
        computeCalculatorSubTotal(false, 'tblCalculatorXT150', 'C7', 'frm2200T:txtXT150Total', 'frm2200T:txtProTaxable8', 0, i);
    }

    //decimalPlace - decimal places to be rounded off
    function getProduct(elementID1, elementID2, outputID, decimalPlace, rowIndex) {
        var element1 = NumWithComma(d.getElementById(elementID1).value) * 1;
        var element2 = NumWithComma(d.getElementById(elementID2).value) * 1;

        var product = element1 * element2;
        product = (decimalPlace == 0) ? formatCurrencyWOC(product) : roundDownComputation(product);
        //product = (decimalPlace == 0) ? formatCurrencyWOC(product.toFixed(decimalPlace)) : formatCurrency(product.toFixed(decimalPlace));

        d.getElementById(outputID).value = product;

        if ((product.toString().indexOf(".") != -1 && product.length > 18) ||
            (product.toString().indexOf(".") == -1 && product.length > 15)) {
            var atc = (elementID1.split("_")[0]).split("XT")[1];
            var tableID = "tblCalculatorXT" + atc;
            var column = (atc === "35" || atc === "36") ? "Tax Base" : "Packs";

            alert("Exceeded maximum amount of 999,999,999,999.99 on " + column + ".");
            clearValuePerRow(tableID, rowIndex);  
        } 
    }

    var isComputeButtonClick = false;
    var isValidComputeCalculatorSubTotal = false;
    var isDeleteButtonClick = false;
    function computeCalculatorSubTotal(isToComputeSched1, tableID, column, outputIDModal, outputIDSched1, decimalPlace, rowIndex) {
        //columnsToValidate - column indexes to validate
        var columnsToValidate = (tableID === "tblCalculatorXT36") ? [1, 2] : [1, 2, 3, 5];
        //var isValid = validateModal(tableID, columnsToValidate);

        if (!isComputeButtonClick || (isComputeButtonClick && validateModal(tableID, columnsToValidate))) {
            var total = 0;

            $("#" + tableID + " input[id$='" + column + "']").each(function () {
                if (!isNaN(NumWithComma(this.value)) && NumWithComma(this.value).length != 0) {
                    total += parseFloat(NumWithComma(this.value));
                }
            });

            //var formattedTotal = (decimalPlace == 0) ? formatCurrencyWOC(total.toFixed(decimalPlace)) : formatCurrency(total.toFixed(decimalPlace));
            var rateFieldID = (outputIDSched1.indexOf('Pro') != -1) ? "frm2200T:hideProAppRate" : "frm2200T:hideInsAppRate";
            var rate = parseFloat(d.getElementById(rateFieldID + outputIDSched1.split("Taxable")[1]).value * 1);
            var basicTaxDueID = (outputIDSched1.indexOf('Pro') != -1) ? "frm2200T:txtProBasicTaxDue" : "frm2200T:txtInsBasicTaxDue";
            var formattedTotal = (decimalPlace == 0) ? formatCurrencyWOC(total) : roundDownComputation(total);
            var sched1Total = roundDownComputation((NumWithComma(d.getElementById('frm2200T:totalTaxDue').value) + (total * rate)) - NumWithComma(d.getElementById(basicTaxDueID + outputIDSched1.split("Taxable")[1]).value));
            var item26Total = (NumWithComma(d.getElementById('frm2200T:txtTax24').value) * 1) + (NumWithComma(sched1Total) * 1);
            var isExceedItem26 = (roundDownComputation(item26Total).toString().replace(/-/g, '').length > 18) ? true : false;

            d.getElementById(outputIDModal).value = formattedTotal;

            if ((formattedTotal.toString().indexOf(".") != -1 && formattedTotal.length > 18) ||
                (formattedTotal.toString().indexOf(".") == -1 && formattedTotal.length > 15)) {
                alert("Exceeded maximum amount of 999,999,999,999.99 on Total Tax Base.");
                clearValuePerRow(tableID, rowIndex);
                total = 0;
            } else if (sched1Total.length > 18) {
                alert("Exceeded maximum amount of 999,999,999,999.99 on Total Tax Due.");
                clearValuePerRow(tableID, rowIndex);
                total = 0;
            } else if (isExceedItem26) {
                alert("Exceeded maximum amount of 999,999,999,999.99 on Item 26 Balance to be Carried Over to Next Return.");
                clearValuePerRow(tableID, rowIndex);
                total = 0;
            }

            if (total == 0) {
                $("#" + tableID + " input[id$='" + column + "']").each(function () {
                    if (!isNaN(NumWithComma(this.value)) && NumWithComma(this.value).length != 0) {
                        total += parseFloat(NumWithComma(this.value));
                    }
                });
            }

            formattedTotal = (decimalPlace == 0) ? formatCurrencyWOC(total) : roundDownComputation(total);
            d.getElementById(outputIDModal).value = formattedTotal;

            if (isToComputeSched1 || (isDeleteButtonClick && parseFloat(formattedTotal).toFixed(2) == 0.00)) {
                //Copy value to Schedule 1
                d.getElementById(outputIDSched1).value = formattedTotal;
                d.getElementById(outputIDSched1).onblur();
            }
            isValidComputeCalculatorSubTotal = true;
        } else {
            isValidComputeCalculatorSubTotal = false;
        }

        isComputeButtonClick = false;
        isDeleteButtonClick = false;
    }

    function computeModal(sender, modalID) {

        var tableID = d.getElementById(modalID).getElementsByTagName('table').item(3).getAttribute("id");

        if (d.getElementById(tableID).rows.length > 0) {
            //columnsToValidate - column indexes to validate
            var columnsToValidate = (tableID === "tblCalculatorXT36") ? [1, 2, 3] : [1, 2, 3, 5];
            //var isValid = validateModal(tableID, columnsToValidate);

            if (isValidComputeCalculatorSubTotal && validateModal(tableID, columnsToValidate)) {
                var today = new Date();
                var yyyy = today.getFullYear().toString();
                var mm = (today.getMonth() + 1).toString();
                var dd = today.getDate().toString();
                var time = today.getHours() + ":" + today.getMinutes();
                var dateComputed = mm + "/" + dd + "/" + yyyy + "  " + formatTime(today);

                d.getElementById('frm2200T:txt' + modalID + 'DateComputed').value = dateComputed;

                if (confirm('You are advised to print this computation.')) {
                    printModal(modalID);
                } //else {
                //    closeModal(modalID);
                //}
            }
        }
        else {
            alert("Please provide valid data.");
        }

        isValidComputeCalculatorSubTotal = false;
    }

    function addModalRow(modalLayout) {
        //call the function needed
        var layoutCell = [];
        layoutCell = eval(modalLayout + ";");

        //layoutCell[0] is always table ID
        var tableRepository = d.getElementById(layoutCell[0].toString());

        //columnsToValidate - column indexes to validate
        var columnsToValidate = (tableRepository.id === "tblCalculatorXT36") ? [1, 2, 3] : [1, 2, 3, 5];

        var isValid = validateModal(tableRepository.id, columnsToValidate); 

        if (isValid) {

            var row = tableRepository.insertRow(tableRepository.rows.length);

            var cell = [];
            var layoutCalc = '';
            for (var i = 0; i < (layoutCell.length - 1); i++) {
                cell[i] = row.insertCell(i);
                //start with index 1, index 0 is tableID
                cell[i].innerHTML = layoutCell[i + 1];

                //Re-assign column width
                var trWidth = (layoutCell[i + 1].split("%")[0]).substring((layoutCell[i + 1].split("%")[0]).length - 2, (layoutCell[i + 1].split("%")[0]).length) + "%";
                $('#' + tableRepository.id + ' tr:eq(' + (tableRepository.rows.length - 1) + ') td:eq(' + i + ')').css("width", trWidth);
            };

            $('#' + tableRepository.id + ' tr td').addClass("tblFormTd");
            $('#' + tableRepository.id + ' tr td').attr("align", "center");

            $('#' + tableRepository.id + ' tr:last input').bind('paste drag drop', function (e) {
                e.preventDefault();
            });
        }

    }

    function deleteModalRow(tableID) {

        if (d.getElementById(tableID).rows.length > 0) {
            $('#' + tableID + ' input[type="checkbox"]:checked').closest("tr").remove();
            $("input[name='frm2200T\\:SelectAll']").removeAttr('checked');

            renameModalRowInputIDs(tableID);
            isDeleteButtonClick = true;
        }
    }

    function clearModal(tableID, outputSched1ID) {
        if (d.getElementById(tableID).rows.length > 0) {
            if (isClearSchedule1 || confirm('Values inputted will be deleted. Do you want to continue?')) {
                $("#" + tableID).empty();
                
                var modalID = $("#" + tableID).parent().parent().attr("id");
                $("#" + modalID + " input[id*='Total']").val((tableID === "tblCalculatorXT35") ? "0.00" : "0");
            }

            var modalSubTotal = d.getElementById("frm2200T:txtXT" + tableID.split("tblCalculatorXT")[1] + "Total").value;
            
            if (typeof outputSched1ID !== "undefined" && parseFloat(modalSubTotal).toFixed(2) == 0.00) {   
                d.getElementById(outputSched1ID).value = "0.00";
                d.getElementById(outputSched1ID).onblur();   
            } 
        }
    }

    function saveModalRowCount(modalID, tableID) {
        var trMainTable = d.getElementById(tableID).getElementsByTagName('tr');
        d.getElementById("frm2200T:txtCtr" + modalID).value = trMainTable.length;
    }

    function renameModalRowInputIDs(tableID) {
        //Get the ATC Number ex. 35, 36, 40, 140, 150
        var atcNumber = tableID.split('tblCalculatorXT')[1]; 
        var table = d.getElementById(tableID);
        var rowCount = table.rows.length;
      
        for (var r = 0; r < rowCount; r++) {
            var inputs = table.rows[r].getElementsByTagName('input');

            for (var c = 0; c < inputs.length; c++) {
                var id = (inputs[c].type == 'checkbox') ? "frm2200T:chkXT" + atcNumber + "Delete_" : "frm2200T:txtXT" + atcNumber + "_";
                d.getElementById(inputs[c].id).id = id + (r + 1) + "C" + (c + 1);
                
                if (c == 2 || c == 3 || c == 5) {
                    inputs[c].onblur = addBlurEventModal(atcNumber, inputs[c], (r + 1));
                }
            }
        }
    }

    function selectAllCheckbox(sender, tableID) {
        var checkboxes = $("#" + tableID + " input[type=checkbox]");
        if (sender.checked) {
            checkboxes.attr('checked', 'checked');
        } else {
            checkboxes.removeAttr('checked');
        }
    }
    var calculatorTemp = "";
    function openModal(sender, modalID) {
        d.getElementById('modalSched1').style.display = "none";
        $('#' + modalID).show();
        calculatorTemp = $("#" + modalID).html();
    }

    //** Close Modal ====================================================================================*//

    function closeModal(senderID) {
        //Validate Modal
        //get table id from modal
        var tableID = d.getElementById(senderID).getElementsByTagName('table').item(3).getAttribute("id");
        
        //
        //columnsToValidate - column indexes to validate
        var columnsToValidate = (tableID === "tblCalculatorXT36") ? [1, 2, 3] : [1, 2, 3, 5];
        var isValid = (isCancelModal) ? true : validateModal(tableID, columnsToValidate);

        if (isValid) {
            d.getElementById('modalSched1').style.display = "block";
            $('#' + senderID).hide();

            saveModalRowCount(senderID, tableID);
            calculatorTemp = "";
            isCancelModal = false;
        }
    }

    //** Disregard changes made and close modal ====================================================================================*//
    var isCancelModal = false;
    function cancelModal(modalID) {
        isCancelModal = true;
        //$("#" + modalID).html(calculatorTemp);
        closeModal(modalID);
    } 

    //** Modal Printing ====================================================================================*//
    //isPrintingModal - Set to true if printing Calculator Modal 
    var isPrintingModal = false;
    var modalIDPrinting = "";

    function printModal(modalID) {
        //Validate Modal
        //get table id from modal
        var tableID = d.getElementById(modalID).getElementsByTagName('table').item(3).getAttribute("id");

        if (d.getElementById(tableID).rows.length > 0) {
            //columnsToValidate - column indexes to validate
            var columnsToValidate = (tableID === "tblCalculatorXT36") ? [1, 2, 3] : [1, 2, 3, 5];
            var isValid = validateModal(tableID, columnsToValidate);

            if (isValid) {
                isPrintingModal = true;
                $('#bg').hide();
                //$('#' + modalID).removeClass("modalShow");
                $('#' + modalID).removeClass("modalInner");
                $('#modalSched1').removeClass("printSignFooterClass");

                //$('#' + modalID).addClass("modalPrint");
                modalIDPrinting = modalID;

                $('.modalAction').css({ 'border': '0 none white' });

                //Display User Details
                var userTIN = d.getElementById('frm2200T:txtTIN1').value + "-" + d.getElementById('frm2200T:txtTIN2').value + "-" + d.getElementById('frm2200T:txtTIN3').value + "-" + d.getElementById('frm2200T:txtBranchCode').value;
                var dateComputed = d.getElementById('frm2200T:txt' + modalID + 'DateComputed').value;

                d.getElementById('frm2200T:lbl' + modalIDPrinting + 'UserTIN').innerHTML = userTIN;
                d.getElementById('frm2200T:lbl' + modalIDPrinting + 'UserName').innerHTML = d.getElementById('frm2200T:taxpayerName').value;
                d.getElementById('frm2200T:lbl' + modalIDPrinting + 'DateComputed').innerHTML = (dateComputed === "undefined") ? "" : dateComputed;
                $("#tbl" + modalIDPrinting).show();

               // $("#" + modalIDPrinting + " input:disabled").addClass('disabledInputs');
                //$("#" + modalIDPrinting + " input").attr("disabled", true);
                //$("#" + modalIDPrinting + " input[type!='text']").attr("disabled", true);
                //$("#" + modalIDPrinting + " input[type='text']:disabled").attr("disabled", false);
                //$("#" + modalIDPrinting + " input[type='text']").attr("readonly", true).css({ "background-color": "White" });
                $("#" + modalIDPrinting + " input[type='button']").hide();

                $('#printMenu').show('blind');
                if ($('#formMenu').css('display') != 'none') {
                    $('#formMenu').hide('blind');
                }

                setDisabledBackgroundColor();

                d.getElementById('container').style.display = "none";

                alert("This form must be printed on Legal Size Paper. Please update your Printer Settings (Set Paper Size to Legal under Preferences -> Advanced) to ensure the correct printout of the form.\n\n" +
                      "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166, Enable Shrink-to-Fit must be unchecked, and all Headers & Footers must be set to empty.");
                
                window.print();

                $("#" + modalIDPrinting + " input[type='button']").show();
            }
        }
        else {
            if (!d.getElementById('frm2200T:cmdValidate').disabled) {
                alert("Please provide valid data.");
            }
        }
    }
    
    //** Add Background color on focus ====================================================================================*//
    function onFocusIterate(elem) {
        $(elem).css({ 'background': '#ffffcc' });
        $(elem).select();
    }
    
    function onBlurIterate(elem) {
        $(elem).css({ 'background': '#ffffff' });
    }

    function setDisabledBackgroundColor() {
        $("input[type=text]:disabled, select:disabled").css({ 'background': '#ededed' });
    }

    function setEnabledBackgroundColor() {
        $("input[type=text]:enabled, select:not(:disabled)").css({ 'background': '#ffffff' });
    }

    function checkIfValidValues(sender) {
        var value = sender.value;

        if (sender.maxLength == 4 || sender.maxLength == 6 || sender.maxLength == 20) {
            var isNumeric = !isNaN(sender.value);
            value = (!isNumeric) ? "" : value;
        } else {
            value = value.replace(/[^a-zA-Z 0-9.,#@'()_-]/g, "");
        }

        sender.value = $.trim(value);
    }


    //** Check for duplicate Tax Rate in Schedule 1 ====================================================================================*//
    function checkTaxRate(atc, value) {
        var frm2200TProductsRowCount = d.getElementById('frm2200TProducts').rows.length;
        var frm2200TInspectionRowCount = d.getElementById('frm2200TInspection').rows.length;
        var frm2200TadditionalSched1RowCount = d.getElementById('frm2200TadditionalSched1').rows.length;
        var frm2200TProductsRow = $('#frm2200TProducts').find('tr');
        var frm2200TInspectionRow = $('#frm2200TInspection').find('tr');
        var frm2200TadditionalSched1Row = $('#frm2200TadditionalSched1').find('tr');
        value = (atc === "XT035") ? parseFloat($.trim(value).split("%")[0]) / 100 : $.trim(value);

        for (var i = 0; i < frm2200TProductsRowCount; i++) {
            if (atc == $.trim(frm2200TProductsRow[i].cells[0].innerText) && value == $.trim(frm2200TProductsRow[i].cells[3].children[0].value)) {
                return true;
            }
        }

        for (var i = 0; i < frm2200TInspectionRowCount; i++) {
            if (atc == $.trim(frm2200TInspectionRow[i].cells[0].innerText) && value == $.trim(frm2200TInspectionRow[i].cells[3].children[0].value)) {
                return true;
            }
        }

        var duplicateCtr = 0;
        for (var i = 0; i < frm2200TadditionalSched1RowCount; i++) {
            var sched1atc = $.trim(frm2200TadditionalSched1Row[i].cells[1].children[0].value);
            var sched1rate =  (sched1atc === "XT035") ? parseFloat($.trim(frm2200TadditionalSched1Row[i].cells[4].children[0].value).split("%")[0]) / 100 : $.trim(frm2200TadditionalSched1Row[i].cells[4].children[0].value);

            if (atc == sched1atc && value === sched1rate) {
                duplicateCtr++;

                if (duplicateCtr == 2) {
                    return true;
                }
            }
        }

        return false;
    }

    //** Re-assign blur function  Schedule 1 ====================================================================================*//
    function addBlurEventSchedule1(elem, indexCtr) {
        return function () {

            if (elem.id.indexOf("txtsched1Atc") != -1) {
                checkIfValidValues(elem);
                onBlurIterate(elem);
                checkATCValue(elem);
                capitalize(elem); 
                otherRateCheck(indexCtr);
            } else {
                if (elem.id.indexOf("AppTaxRate") != -1) {
                    if (d.getElementById("frm2200T:txtsched1AppTaxRate" + indexCtr).value === "XT035") {
                        setPercentage(elem);
                    } else {
                        setApplicableTaxrate(elem);
                    }

                    otherRateCheck(indexCtr);
                } else {
                    roundDownWithAlert(elem);
                }

                computeSched1BasicTaxDue(indexCtr);
                onBlurIterate(elem);
            }
        };
    }

    //** Re-assign blur function Modal ====================================================================================*//
    function addBlurEventModal(atcNumber, input, rowIndex) {
        return function () {           
            if (input.id.indexOf("txtXT35_") != -1 && input.id.indexOf("C4") != -1) {
                roundDownWithAlert(this);
            } else if (input.maxLength == 12) {
                setToZeroIfEmpty(this);
            } else {
                capitalize(this);
            }

            switch (atcNumber) {
                case '35': computeCalculatorXT35(rowIndex);
                    break;
                case '36': computeCalculatorXT36(rowIndex);
                    break;
                case '40': computeCalculatorXT40(rowIndex);
                    break;
                case '140': computeCalculatorXT140(rowIndex);
                    break;
                case '150': computeCalculatorXT150(rowIndex);
                    break;
                default: onBlurIterate(input);
            }

            onBlurIterate(input);
        };
    }

    //** Validate Modal per Row ====================================================================================*//

    function validateModal(modalTableID, columnsToValidate) {
        var table = d.getElementById(modalTableID);
        var rowCount = table.rows.length;

        for (r = 0; r < rowCount && !isReload; r++) {
            var columnCount = table.rows[0].cells.length;

            for (var c = 1; c < columnCount; c++) {

                if ($.inArray(c, columnsToValidate) != -1) {
                    var input = table.rows[r].cells[c].children[0];
                    var label = "";

                    if (input.maxLength !== 12 && $.trim(input.value) === "") {
                        label = getColumnHeader(c, modalTableID);
                        alert("Please enter a valid " + label + " at Row " + (r + 1) + ".");
                        return false;
                    }
                    else if (input.maxLength === 12 && parseFloat(input.value).toFixed(2) == 0.00) {
                        label = getColumnHeader(c, modalTableID);
                        alert(label + " at Row " + (r + 1) + " should be greater than zero.");
                        return false;
                    }
                }
            }
        }

        return true;
    }

    //** Get column header of Modal ====================================================================================*//

    function getColumnHeader(c, modalTableID) {
        var label = "";

        if (c == 1) {
            label = "Description";
        } else {
            var modalID = $("#" + modalTableID).parent().parent().attr("id");
            label = (modalTableID.indexOf("3") != -1) ? $('#' + modalID).find('table:eq(2) tr:eq(1) td:eq(' + (c - 2) + ') span').text() : $('#' + modalID).find('table:eq(2) tr:eq(0) td:eq(' + c + ') span').text();
        }

        return label;
    }

    //** Format time in 12-Hour format ====================================================================================*//

    var formatTime = (function () {
        function addZero(num) {
            return (num >= 0 && num < 10) ? "0" + num : num + "";
        }

        return function (dt) {
            var formatted = '';

            if (dt) {
                var hours24 = dt.getHours();
                var hours = ((hours24 + 11) % 12) + 1;
                formatted = [formatted, [addZero(hours), addZero(dt.getMinutes())].join(":"), hours24 > 11 ? "pm" : "am"].join(" ");
            }
            return formatted;
        }
    })();


    //** Clear value per row index ====================================================================================*//
    function clearValuePerRow(tableName, rowIndex) {
        var input = $("#" + tableName + " tr:eq(" + (rowIndex - 1) + ") input[type='text']");

        for (var i = 0; i < input.length; i++) {
            
            if (input[i].id.indexOf("XT35") != -1 && (input[i].id.indexOf("C6") != -1 || input[i].id.indexOf("C7") != -1)) {
                input[i].value = "0.00";
            } else if (input[i].maxLength == 12) {
                input[i].value = 0;
            } else {
                input[i].value = "";
            }
        }
    }
    function setToZeroIfEmpty(e) {
        var isNumber = false;

        if (e.value.toString().indexOf('(') == -1 || e.value.toString().indexOf(')') == -1) {
            isNumber = isNumeric((removeCommaParenthesis(e.id)));
        }

        if ($.trim(e.value.toString()) === "" || !isNumber) {
            e.value = "0";
        }
        else if (parseInt(e.value) < 0) {
            e.value = "0";
        }
        else {
            e.value = formatCurrencyWOC(Math.round((removeCommaParenthesis(e.id))));
        }
    }

    function removeCommaParenthesis(senderID) {
        var senderValue = d.getElementById(senderID).value;

        if (senderValue.toString().indexOf('(') != -1 || senderValue.toString().indexOf(')') != -1) {
            senderValue = NumWithParenthesis(senderValue);
        }

        if (senderValue.toString().indexOf(',') != -1) {
            senderValue = WholeNumWithComma(senderValue);
        }

        if (!isNaN(senderValue)) {
            return (senderValue * 1);
        }
        else {
            return senderValue;
        }
    }

    //** Disabling/Enabling Elements ====================================================================================*//
    function getEnabledText() {

        //remove
        $(".enabledInputs").removeClass("enabledInputs");
        //add again
        $("input[type!=button]:not(:disabled)").addClass("enabledInputs");
        $("select:not(:disabled)").addClass("enabledInputs");
    }

    function getDisabledText() {

        //remove
        $(".disabledInputs").removeClass("disabledInputs");
        //add again
        $("input[type!=button]:disabled").addClass("disabledInputs");
        $("select:disabled").addClass("disabledInputs");
    }

    function enableAllControl() {

        $("input:text", $("#frmMain")).attr("disabled", false);
        $("input:radio", $("#frmMain")).attr("disabled", false);
        $("input:checkbox", $("#frmMain")).attr("disabled", false);
        $("input:button", $("#frmMain")).attr("disabled", false);
        $("select", $("#frmMain")).attr("disabled", false);

        $(".disabledInputs").attr("disabled", true);
        $(".disableByDefault").attr("disabled", true);

        disableElem;
        enableElem

        //remove
        $(".disabledInputs").removeClass("disabledInputs");
    }

    function disableItem24A() {
        if (d.getElementById('frm2200T:amendedRtn_1').checked) {
            d.getElementById('frm2200T:txtTax23A').disabled = true;
            d.getElementById('frm2200T:txtTax23A').value = '0.00';
            d.getElementById('frm2200T:txtTax23A').style.backgroundColor = '#e2e2e2';
            compute23C();
        }
        else {
            d.getElementById('frm2200T:txtTax23A').disabled = false;
            d.getElementById('frm2200T:txtTax23A').style.backgroundColor = '#ffffff';
        }
    }

    function otherRateCheck(e) {
        if (!isPrintingOthers) {
            var rowOthers = $('#frm2200TadditionalSched1').find('tr');
            var rowProduct = $('#frm2200TProducts').find('tr');
            var rowInspection = $('#frm2200TInspection').find('tr');
            var rateArray = new Array();
            var atcArray = new Array();

            var otherText = $(rowOthers[e]).find('input');
            var atc = otherText[1].value;
            var rate = (atc === "XT035") ? parseFloat(otherText[4].value.split("%")[0]) / 100 : otherText[4].value;

            for (i = 0; i < rowProduct.length; i++) {
                atcArray[i] = rowProduct[i].cells[0].innerHTML;

            }
            for (i = 0; i < rowInspection.length; i++) {
                atcArray[i + 9] = rowInspection[i].cells[0].innerHTML;
            }

            var year = (parseInt(d.getElementById('frm2200T:txtForYr').value) - 2017);
            var rateXT010 = parseFloat('2.05')
            var rateXT020 = parseFloat('1.75');
            var rateXT036 = parseFloat('5.85');
            var rateXT040 = parseFloat('30.00');
            var rateXT140 = parseFloat('30.00');
            var rateXT150 = parseFloat('30.00');

            for (x = 0; x < year; x++) {
                rateXT010 += rateXT010 * .04;
                rateXT020 += rateXT020 * .04;
                rateXT036 += rateXT036 * .04;
                rateXT040 += rateXT040 * .04;
                rateXT140 += rateXT140 * .04;
                rateXT150 += rateXT150 * .04;
            }
            if (sched1ATCList.length === 0) {
                rateArray[0] = rateXT010.toFixed(2);
                rateArray[1] = rateXT010.toFixed(2);
                rateArray[2] = rateXT010.toFixed(2);
                rateArray[3] = rateXT020.toFixed(2);
                rateArray[4] = 0.20;
                rateArray[5] = rateXT036.toFixed(2);
                rateArray[6] = rateXT040.toFixed(2);
                rateArray[7] = rateXT140.toFixed(2);
                rateArray[8] = rateXT150.toFixed(2);
                rateArray[9] = 0.50;
                rateArray[10] = 0.10;
                rateArray[11] = 0.02;
                rateArray[12] = 0.03;
                rateArray[13] = 0.02;
                rateArray[14] = 0.03;

            }
            else {

                for (i = 0; i <= 8; i++) {
                    rateArray[i] = sched1ATCList[i].rate;
                }
                rateArray[9] = 0.50;
                rateArray[10] = 0.10;
                rateArray[11] = 0.02;
                rateArray[12] = 0.03;
                rateArray[13] = 0.02;
                rateArray[14] = 0.03;

            }



            for (x = 0; x <= 14; x++) {
                // alert(atc + " == " + atcArray[x]+" and " +rate + " == " + rateArray[x]);
                if (atc == atcArray[x] && rate == rateArray[x]) {
                    alert('Rate should be unique per ATC.');
                    otherText[4].value = '';
                    otherText[4].focus();
                    break;
                }
            }

            var duplicateCtr = 0;
            var frm2200TadditionalSched1RowCount = d.getElementById('frm2200TadditionalSched1').rows.length;
            var frm2200TadditionalSched1Row = $('#frm2200TadditionalSched1').find('tr');

            for (var i = 0; i < frm2200TadditionalSched1RowCount; i++) {
                var sched1atc = $.trim(frm2200TadditionalSched1Row[i].cells[1].children[0].value);
                var sched1rate = (sched1atc === "XT035") ? parseFloat($.trim(frm2200TadditionalSched1Row[i].cells[4].children[0].value).split("%")[0]) / 100 : $.trim(frm2200TadditionalSched1Row[i].cells[4].children[0].value);

                if (atc == sched1atc && rate === sched1rate) {
                    duplicateCtr++;
                }

                if (duplicateCtr == 2) {
                    alert('Rate should be unique per ATC.');
                    otherText[4].value = '';
                    otherText[4].focus();
                    break;
                }
            }
        }
    }

    //** Clear all values in Schedule 1 ====================================================================================*//

    var isClearSchedule1 = false;
    function clearSchedule1() {
        if (confirm('Values inputted will be deleted. Do you want to continue?')) {
            isClearSchedule1 = true;
            
            //Clear all values in Calculator
            clearModal('tblCalculatorXT35');
            clearModal('tblCalculatorXT36');
            clearModal('tblCalculatorXT40');
            clearModal('tblCalculatorXT140');
            clearModal('tblCalculatorXT150');
            
            //Remove all rows excpet first row
            $("#frm2200TadditionalSched1").find("tr:gt(0)").remove();

            $("#modalSched1 input[type=text][maxlength='25']").val("0.00");
            $("#modalSched1 input[type=text][maxlength!='25']").val("");
            $("#frm2200TadditionalSched1 input[id*='sched1Atc']").val("XT");
            $("#frm2200T\\:txtsched1AppTaxRate0").val("0.00");

            isClearSchedule1 = false;
        }
    }

    //** Disregard changes made and close Schedule 1 ====================================================================================*//

    var sched1Temp = "";
    function cancelSchedule1() {
        $("#modalSched1").html(sched1Temp);
        sched1OK('blind');

        $('#modalSched1 input').bind('paste drag drop', function (e) {
            e.preventDefault();
        });
    }

    //** Check values for Schedule 1 ====================================================================================*//

    function checkTextboxValues(tableID, inputID) {
        var input = $("#" + tableID + " input[id*='" + inputID + "']");

        for (var i = 0; i < input.length; i++){
            if($.trim(input[i].value) !== "0.00"){
                return true;
            }
        }

        return false;
    }

    //** Validate Schedule 1 Others(Row 1) values if Payment on Actual Removal ====================================================================================*//

    function validateSchedule1() {
        //05/26/2014 Schedule 1 is mandatory
        if (d.getElementById('frm2200T:chkPymntManner_1').checked) {
            var isValidProduct = checkTextboxValues("frm2200TProducts", "txtProTaxable") || checkTextboxValues("frm2200TProducts", "txtProExempt");
            var isValidInspection = checkTextboxValues("frm2200TInspection", "txtInsTaxable") || checkTextboxValues("frm2200TInspection", "txtInsExempt");
            var isValidOthersRow1 = d.getElementById("frm2200T:txtsched1AppTaxRate0").value !== "0.00" && (d.getElementById("frm2200T:txtsched1Exempt0").value !== "0.00" || d.getElementById("frm2200T:txtsched1Taxable0").value !== "0.00");

            if (!isValidProduct && !isValidInspection && !isValidOthersRow1) {
                alert("Please fill up Schedule 1.");
                return false;
            }
        }

        return true;
    }

    //** Check ATC if null Schedule 1 ====================================================================================*//
    function checkATCValue(sender) {
        var val = (sender.value.toUpperCase().replace(/-/g, '&mdash;')).split("XT");
        var index = sender.id.split("txtsched1Atc")[1];
        var rate = d.getElementById("frm2200T:txtsched1AppTaxRate" + index).value;

        if ($.trim(sender.value) !== "XT" && ($.trim(sender.value) === "" || (val.length > 0 && (isNaN(val[1]) || val[1] === "" || $.trim(sender.value).length != 5)))) {
            alert("Invalid ATC.");
            sender.value = "XT";
            sender.focus();
        } else if ($.trim(sender.value) === "XT035") {
            d.getElementById("frm2200T:txtsched1AppTaxRate" + index).onblur = function () { setPercentage(this); otherRateCheck(index); computeSched1BasicTaxDue(index); onBlurIterate(this); }
            d.getElementById("frm2200T:txtsched1AppTaxRate" + index).value = rate.replace(/%/g, '') + "%";
            d.getElementById("frm2200T:txtsched1AppTaxRate" + index).onblur();
        }
        else {
            d.getElementById("frm2200T:txtsched1AppTaxRate" + index).onblur = function () { setApplicableTaxrate(this); otherRateCheck(index); computeSched1BasicTaxDue(index); onBlurIterate(this); }
            d.getElementById("frm2200T:txtsched1AppTaxRate" + index).value = (rate.indexOf("%") != -1) ? "0.00" : rate;
      d.getElementById("frm2200T:txtsched1AppTaxRate" + index).onblur();
        }
    }

    //** Check if Applicable Tax Rate (if ATC is XT035) exceeds 100% ====================================================================================*//
    function isNumeric(num) {
        return !isNaN(num)
    }

    function convertToNumber(value) {
        var xNumber = (value) * 1;

        if (xNumber.toString() === "NaN") {
            xNumber = 0;
        }

        return xNumber;
    }

    function setPercentage(e) {
        var isNumber = isNumeric(e.value.split("%")[0]);
        var value = e.value.split("%")[0];

        if (($.trim(value) === "") || !isNumber) {
      alert("Invalid value for percentage.");
            e.value = "0.00";
            e.select();
        }
        else if ((convertToNumber(value) < 0) || (convertToNumber(value) > 100)) {
      alert("Invalid value for percentage.");
            e.value = "0.00";
            e.select();
        }
        else {
            var temp = value.split('.');
            if (temp.length === 2) {

                if (temp[1].length > 1) {
                    e.value = Number(temp[0]) + '.' + temp[1].substring(0, 2);
                }
                else if (temp[1].length == 1) {

                    e.value = addCommas(Number(temp[0])) + "." + temp[1] + "0";
                }

                else if (temp[1].length == 0) {
                    e.value = addCommas(Number(temp[0])) + ".00";
                }

            }
            else if (temp[0].length > 0 && (temp.length === 1)) {

                e.value = addCommas(Number(temp[0])) + ".00";
            }
        }

        e.value = e.value.replace(/%/g, '') + "%";
    }

    function valueIsString(elementIdWithoutfrm) {

        var field = (elementIdWithoutfrm.indexOf('frm2200T') != -1) ? d.getElementById(elementIdWithoutfrm) : d.getElementById('frm2200T:' + elementIdWithoutfrm);
        
        if (field != null) {
            var stringValue =field.value.toString();

            stringValue = stringValue.replace(/&/g, '&amp;');
            stringValue = stringValue.replace(/</g, '&lt;');
            stringValue = stringValue.replace(/>/g, '&gt;');
        } else {
            alert("[error] valueIsString() null on :" + elementIdWithoutfrm);
        }
        //alert(elementIdWithoutfrm + "===" + stringValue);
        return stringValue;
    }

    function valueIsInt(elementIdWithoutfrm) {

        var field = d.getElementById('frm2200T:' + elementIdWithoutfrm);
        var intValue = 0;

        if (field != null) {
            intValue = (NumWithComma(field.value)).toFixed(2);
        } else {
            alert("[error] valueIsInt() null on :" + elementIdWithoutfrm);
        }
        //alert(elementIdWithoutfrm + "===" + intValue);
        return intValue;
    }

    function radioCheckYesNo(element) {

        var status = '';

        if (d.getElementById('frm2200T:' + element).checked) {
            status = 'y';
        } else {
            status = 'n';
        }
        //alert(element + "===" + status);
        return status;
    }

    function dropdownTextValue(elementID) {
        var field = d.getElementById(elementID);
        var stringValue = "";

        if (field != null) {
            stringValue = (elementID.indexOf("frm2200T:") != -1 && elementID.indexOf("lstTaxTreaty") == -1) ? field.value : ((elementID.indexOf("lstTaxTreaty") != -1) ? $("#frm2200T\\:" + elementID.split("frm2200T:")[1] + " option:selected").text() : $("#" + elementID + " option:selected").text());
            
            stringValue = stringValue.replace(/&/g, '&amp;');
            stringValue = stringValue.replace(/</g, '&lt;');
            stringValue = stringValue.replace(/>/g, '&gt;');
        } else {
            alert("[error] valueIsString() null on :" + elementID);
        }

        //alert(elementID + "===" + stringValue);
        return stringValue;
    }

    function mannerOfPayment(elementName) {

        var status = '';

        var radioButtons = d.getElementsByName(elementName);

        if (radioButtons[0].checked) {
            status = '1';
        }
        else if (radioButtons[1].checked) {
            status = '2';
        }
      
        return status;
    }

    //format :: 2011-01-01 [YYYY-MM-DD]
    function getFormattedDate(id) {

        var field = d.getElementById("frm2200T:" + id);
        var formattedDate = ""
        if (field != null) {

            //fullDate format :: MM/DD/YYYY
            var fullDate = field.value.toString().trim().split("/");
            formattedDate = fullDate[2] + "-" + fullDate[0] + "-" + fullDate[1];
        }

        return formattedDate;
    }
    function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                console.log(form.serializeArray());
                var data = form.serialize();
                save('2200T',data);
                
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
        saveAndExit('2200T',data);
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

        submitAndSave('2200T', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2200T';
    } 
</script>
@endsection