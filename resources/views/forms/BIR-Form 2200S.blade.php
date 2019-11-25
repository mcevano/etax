@extends('layouts.app')
@section('title', '| BIR Form No. 2200S')

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
        <button type="button" class="btn btn-danger btn-exit" id="2200S" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="2200S" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='2200S' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 858px;">
                <div id="formPaper">
                    <div id="MainContent" class="noCellSpace" style="display:block;">
                        <table style="" border="0" cellspacing="0" cellpadding="0">
                            

              <!--start new top header-->
              <tr>

                  <table style="height:56px;" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td width="300" valign="bottom">
                          <img width="80" height="25" src="{{ asset('images/bcs_new.png') }}">
                        </td>
                        <td valign="middle">
                          <img width="210" height="50" alt="birlogo" src="{{ asset('images/header_logo.png') }}">
                        </td>
                      </tr>
                    </tbody>
                  </table>
              </tr>
              <tr>

                <table style="height:90px;" border="1" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td width="150" valign="center" style="text-align:center !important">
                        <label face="Arial" size="1">BIR Form No.</label>
                        <br>
                        <font face="Arial" size="6" style="font-weight:bold;">2200-S</font>
                        <br>
                        <label face="Arial" size="1">January 2018</label>
                        <br>
                        <label face="Arial" size="1">
                          <b>Page 1</b>
                        </label>
                      </td>
                      <td width="580" align="center">
                        <font size="5" style="font-weight:bold;">EXCISE TAX RETURN</font>
                        <br>
                        <font size="3" style="font-weight:bold;">for Sweetened Beverages</font>
                        <br>
                        <label face="Arial" size="1">
                          <i>Enter all required information in CAPITAL LETTERS using BLACK ink. Mark all applicable boxes with an
                            "X". Two copies MUST be filled with the BIR and one held by the Taxpayer.</i>
                        </label>
                      </td>
                      <td valign="top">
                        <img width="220" height="75" src="{{ asset('images/Bar Codes/2200S.png') }}">
                      </td>
                    </tr>
                  </tbody>
                </table>

              </tr>
              <!--end new lower header-->

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
                                                                <select id="frm2200S:txtMonth1" name="frm2200S:txtMonth1" size="1" onblur="validateDate();"
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
                                                               <input id="frm2200S:txtDate" maxlength="2" name="frm2200S:txtDate" size="1" type="text" value="" onblur="blockLetterInt(this);validateDate();" onkeypress="return wholenumber(this, event)" />
                                                                <input id="frm2200S:txtForYr" maxlength="4" name="frm2200S:txtForYr" size="3" type="text" value="" onblur="blockLetterInt(this);validateDate();setATCSchedule1(this.value);" onkeypress="return wholenumber(this, event)" />
                                                         </td>
                                                    </tr>   
                                                </table>
                                            </td>
                                            <td valign="top" class="tblFormTd">
                                                <table style="width:202px;" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td style="width:10px;" nowrap><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td style="width:30px;" nowrap><label size="1" style="font-size: 11px;">Amended Return?</label></td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm2200S:j_id217" >
                                                                <div align="center" style="padding: 0px 0 0px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="radio" value="Y" name="frm2200S:amendedRtn" id="frm2200S:amendedRtn_1" onclick="d.getElementById('frm2200S:txtTax19').disabled = false;d.getElementById('frm2200S:txtTax19').style.backgroundColor = '#ffffff';" disabled="disabled" /><label for="frm2200S:j_id217:_1" style="font-size:10px;">Yes</label></td>
                                                                                <td><input type="radio" value="N"  name="frm2200S:amendedRtn" id="frm2200S:amendedRtn_2" onclick="d.getElementById('frm2200S:txtTax19').disabled = true;d.getElementById('frm2200S:txtTax19').value = '0.00';compute20();d.getElementById('frm2200S:txtTax19').style.backgroundColor = '#e2e2e2';" disabled="disabled" checked="checked" /><label for="frm2200S:j_id217:_2" style="font-size:10px;">No</label></td>
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
                                                <table style="width:221px;" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td style="width:8px;" nowrap><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><label size="1" style="font-size: 11px;">Number of Sheet/s Attached?</label></td>
                                                        <td><input type="text" value="0" style="text-align: right;" size="4" name="frm2200S:txtSheets" maxlength="2" id="frm2200S:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)"  disabled/></td>
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
                                                            <div align="center"><font size="2px" style="letter-spacing: 1px;"><b>Part I - Background Information</b></font></div>
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
                                                                <input type="text" value="{{$company->tin1}}"  size="2" name="frm2200S:txtTIN1" maxlength="3" id="frm2200S:txtTIN1" onkeypress="return wholenumber(this, event)"  disabled/>
                                                                <input type="text" value="{{$company->tin2}}"  size="2" name="frm2200S:txtTIN2" maxlength="3" id="frm2200S:txtTIN2" onkeypress="return wholenumber(this, event)"  disabled/>
                                                                <input type="text" value="{{$company->tin3}}"  size="2" name="frm2200S:txtTIN3" maxlength="3" id="frm2200S:txtTIN3" onkeypress="return wholenumber(this, event)"  disabled/>
                                                                <input type="text" value="{{$company->tin4}}"  size="2" name="frm2200S:txtBranchCode" maxlength="3" id="frm2200S:txtBranchCode" onkeypress="return letternumber(event)" disabled/>
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
                                                            <select class='iceSelOneMnu' id='frm2200S:txtRDOCode' name='frm2200S:txtRDOCode' size='1' disabled>
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
                                                                    <td colspan="2">&nbsp;<input type="text" value="{{$company->registered_name}}" style="width:98%" name="frm2200S:taxpayerName" maxlength="70" id="frm2200S:taxpayerName" onblur="checkIfValidValues(this); return capitalize(this, event)" onkeypress="return Name(this, event)"  disabled/></td>
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
                                                                    <td colspan="2">&nbsp;<input type="text" value="{{$company->address}}"  style="width:98%;" name="frm2200S:txtAddress" maxlength="70" id="frm2200S:txtAddress" onblur="checkIfValidValues(this); return capitalize(this, event)" onkeypress="return Address(this, event)" disabled/></td>
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
                                <input type="text" value="{{$company->zip_code}}"  style="width:98%;" name="frm2200S:txtZipCode" maxlength="4" id="frm2200S:txtZipCode" onkeypress="return wholenumber(this, event)" onblur="checkIfValidValues(this);" disabled/>
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
                                                                    
                                                                    <td colspan="2"><input type="text" value="{{$company->tel_number}}" style="width:99%;" name="frm2200S:txtTelNum" maxlength="20" id="frm2200S:txtTelNum" onkeypress="return wholenumber(this, event)" onblur="checkIfValidValues(this);" disabled/></td>
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
                                                                    <td colspan="2"><input type="text" value="{{$company->line_business}}"  style="width:99%;" name="frm2200S:txtLineBus" maxlength="30" id="frm2200S:txtLineBus" onblur="checkIfValidValues(this); return capitalize(this, event)" onkeypress="return Name(this, event)" disabled/></td>
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
                                                                    <td><font size="1" style="font-size: 11px;">PSIC</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td colspan="2"><input type="text" value="" style="width:98%;" name="frm2200S:txtPSIC" maxlength="6" id="frm2200S:txtPSIC" onblur="checkIfValidValues(this);" onkeypress="return wholenumber(this, event)"/></td>
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
                                                                    
                                                                    <td colspan="2">&nbsp;<input type="text" value="{{$company->email_address}}" style="width:98%;"  name="txtEmail" maxlength="60" id="txtEmail" disabled="disabled" onkeypress="return emailAddress(this);" onblur="validateEmail(this);"/></td>
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
                                                            <select id="frm2200SoptRegion" name="frm2200SoptRegion" size="1" style="width: 200px" onchange="getProvince(this.value, 'frm2200SoptProvince', 'frm2200SoptCity');">
                                                                <option value="00">(Select Region)</option>
                                                            </select>
                                                        </td>
                                                        <td width="32%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Province<br /></font>
                                                            <select id="frm2200SoptProvince" name="frm2200SoptProvince" size="1" style="width: 195px" onchange="getCity('frm2200SoptRegion', 'frm2200SoptProvince', 'frm2200SoptCity');">
                                                                <option value="00">(Select Province)</option>
                                                            </select>
                                                        </td>
                                                        <td width="31%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">City<br /></font>
                                                            <select id="frm2200SoptCity" name="frm2200SoptCity" size="1" style="width: 190px">
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
                                                            <select id="frm2200SoptRegion1" name="frm2200SoptRegion1" size="1" style="width:200px" onchange="getProvince(this.value, 'frm2200SoptProvince1', 'frm2200SoptCity1')" >
                                                                <option value="00">(Select Region)</option>
                                                            </select></td>
                                                        <td width="32%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Province<br /></font>
                                                            <select id="frm2200SoptProvince1" name="frm2200SoptProvince1" size="1" style="width: 195px" onchange="getCity('frm2200SoptRegion1', 'frm2200SoptProvince1', 'frm2200SoptCity1')" >
                                                                <option value="00">(Select Province)</option>
                                                            </select>
                                                        </td>
                                                        <td width="31%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">City<br /></font>
                                                            <select id="frm2200SoptCity1" name="frm2200SoptCity1" size="1"  style="width: 190px">
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
                                                        <td style="width:198px;"><label face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Are you availing of tax relief under Special Law or International Tax Treaty?</label></td>
                                                        <td style="width:156px;">
                                                            <fieldset id="frm2200S:optTreaty" style="font-family: Arial, Helvetica, sans-serif; font-size : 10px;">
                                                                <table border="0" cellpadding="0" cellspacing="0" >
                                                                    <tr>
                                                                        <td>
                                                                            <input id="frm2200S:optTreaty_1" name="frm2200S:optTreaty" type="radio" value="Y" onclick="changeTreaty()"/>
                                                                            <label for="frm2200S:optTreaty:_1" style="font-size: 11px;">Yes</label>
                                                                        </td>
                                                                        <td>
                                                                            <input checked="checked" id="frm2200S:optTreaty_2" name="frm2200S:optTreaty" type="radio" value="N" onclick="changeTreaty()"/>
                                                                            <label for="frm2200S:optTreaty:_2" style="font-size: 11px;">No</label>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </fieldset>
                                                        </td>
                                                        <td style="width:19px;"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">14A</font></strong></font></td>
                                                        <td style="width:67px;"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">If yes, specify</font></td>
                                                        <td style="width:238px;">
                                                             <select disabled="disabled" id="frm2200S:lstTaxTreaty" name="frm2200S:lstTaxTreaty" size="1" style="background-color: white; font-family: Arial, Helvetica, sans-serif;">
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
                                                        <td><div align="center"><font size="2px" style="letter-spacing: 1px;"><b>Part II - Manner Of Payment</b></font></div></td>
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
                                                                        <input id="frm2200S:chkPymntManner_1" name="frm2200S:chkPymntManner"  type="radio" value="Removal" onclick="changeMannerOfPayment(); dateMonthYear();recomputePaymentActual();d.getElementById('frm2200S:txtForYr').onblur()" />
                                                                        <label for="frm2200S:chkPymntManner:_1" style="font-size: 11px;">Payment on Actual Removal </label>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="50%" nowrap>
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">16</font></strong></font>
                                                            <input id="frm2200S:chkPymntManner_2" name="frm2200S:chkPymntManner"  type="radio" value="Deposit" 
                                                                onclick="changeMannerOfPayment(); dateMonthYear();recomputePrepayment();d.getElementById('frm2200S:txtTax23A').focus();" />
                                                            <label for="frm2200S:chkPymntManner:_2" style="font-size: 11px;">Prepayment/Advance Deposit</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">17</font></strong></font></td>
                                                         <td colspan="3"  nowrap>
                                                             <input id="frm2200S:chkPymntManner_3" name="frm2200S:chkPymntMannerOther"  type="checkbox" value="N2" onclick="changeMannerOfPayment(); dateMonthYear()" disabled/>
                                                             <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Other Similar Schemes <em>(specify)</em></font>&nbsp;&nbsp;
                                                             <input disabled="true" id="frm2200S:txtOthMannerofPymnt" maxlength="50" name="frm2200S:txtOthMannerofPymnt" size="25"
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
                                                
                                                <div align="center"><font size="2px" style="letter-spacing: 1px;"><b>Part III - Payments and Application</b></font></div>
                                                       
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
                                  <a href="#" id="frm2200S:btnSchedule1" onclick="showSched1();enabledDisabled(d.getElementById('frm2200S:cmdValidate').disabled);"><em>(from Schedule 1)</em></a>
                                                            </font>
                                                        </td>
                                                        <td style="width:200px;">
                                                            <div class="spacePadder"></div>
                                                        </td>
                                                        
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">18</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 5px" size="20" name="frm2200S:txtTax16" maxlength="25" id="frm2200S:txtTax16" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;</font></td>
                                                        <td><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Less:&nbsp;&nbsp; <b>19A</b> Balance Carried Over from Previous Return</font></td>
                                                        <td>
                                                            &nbsp;
                                                        </td>
                                                        <td><font size="2" style="font-weight:bold;">19A</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200S:txtTax17A" maxlength="25" id="frm2200S:txtTax17A" onblur="roundDownWithAlert(this); compute17C(this)" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>19B</b> Creditable Excise Tax, if applicable</font></td>
                                                        <td>&nbsp;</td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">19B</font>
                                                                <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2200S:txtTax17B" maxlength="25" id="frm2200S:txtTax17B" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>19C</b> Total <em>(Sum of Items 19A and 19B)</em></font></td>
                                                        <td>&nbsp;</td>
                                                        <td><div align="justify"><span class="spacePadder"><font size="2" style="font-weight:bold;">19C</font>
                                                                    <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200S:txtTax17C" maxlength="25" id="frm2200S:txtTax17C" disabled="true" />
                                                                </span></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font></td>
                                                        <td colspan="2"><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Net Tax Due / (Overpayment) <em>(Item 18 less Item 19C)</em></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font>
                                                        </td>
                                                        <td><div align="justify"><span class="spacePadder"><font size="2" style="font-weight:bold;">20</font>
                                                                    <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;margin-left: 9px;" size="20" name="frm2200S:txtTax18" maxlength="25" id="frm2200S:txtTax18" disabled="true" />
                                                                </span></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: Payment on Returns Previously Filed for the Same Period, if amended return</font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">21</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;margin-left: 9px;" size="20" name="frm2200S:txtTax19" maxlength="25" id="frm2200S:txtTax19" onblur="roundDownWithAlert(this);compute20(this);" disabled="true" onkeypress="return numbersonly(this, event);"/>
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Tax Still Due / (Overpayment) <em>(Item 20 less Item 21)</em></font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">22</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;margin-left: 9px;" size="20" name="frm2200S:txtTax20" maxlength="25" id="frm2200S:txtTax20" disabled="true" />
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
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200S:txtTax21A" maxlength="25" id="frm2200S:txtTax21A" onblur="roundDownWithAlert(this); compute21D(this);" onkeypress="return numbersonly(this, event)"  />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>23B</b> Interest</font></td>
                                                        <td>
                                                            <span class="spacePadder"><font size="2" style="font-weight:bold;">23B</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200S:txtTax21B" maxlength="25" id="frm2200S:txtTax21B" onblur="roundDownWithAlert(this); compute21D(this);" onkeypress="return numbersonly(this, event)" />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>23C</b> Compromise</font></td>
                                                        <td>
                                                            <span class="spacePadder"><font size="2" style="font-weight:bold;">23C</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200S:txtTax21C" maxlength="25" id="frm2200S:txtTax21C" onblur="roundDownWithAlert(this); compute21D(this);" onkeypress="return numbersonly(this, event)" />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>23D</b> Total Penalties <em>(Sum of Items 23A to 23C)</em></font></td>
                                                        <td>
                                                            <font size="2" style="font-weight:bold;">23D</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200S:txtTax21D" maxlength="25" id="frm2200S:txtTax21D" disabled="true" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Amount Payable <em>(Sum of Items 22 and 23D)</em></font></td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">24</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;margin-left: 5px;" size="20" name="frm2200S:txtTax22" maxlength="25" id="frm2200S:txtTax22" disabled="true" class="iceInpTxt-dis" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;25&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1"  style="font-size: 11px;">Less: &nbsp;&nbsp;&nbsp; Payment Made Today</font></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>25A</b> Tax Payment / Deposit</em></font></td>
                                                        <td>
                                                            <span class="spacePadder"><font size="2" style="font-weight:bold;">25A</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200S:txtTax23A" maxlength="25" id="frm2200S:txtTax23A" onblur="roundDownWithAlert(this); compute23C(this)" onkeypress="return numbersonly(this, event)" />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2">
                                                            <font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>25B</b> Penalties <em>(from Item 23D)</em></font>&nbsp;
                                                             <input id="frm2200S:PayPenalties" name="frm2200S:PayPenalties" type="checkbox" onclick="payPenalties(this)" disabled/>
                                                            <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Pay Penalties?</font>
                                                        </td>
                                                        <td>
                                                            <span class="spacePadder"><font size="2" style="font-weight:bold;">25B</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200S:txtTax23B" maxlength="25" id="frm2200S:txtTax23B" disabled="true" />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>25C</b> Total Payment Made Today <em>(Sum of Items 25A & 25B)</em></font></td>
                                                        <td>
                                                            <span class="spacePadder"><font size="2" style="font-weight:bold;">25C</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200S:txtTax23C" maxlength="25" id="frm2200S:txtTax23C" disabled="true" />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;26&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Balance to be Carried Over to Next Return <em>(Item 24 less Item 25C)</em></font></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">26</font>&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;margin-left: 1px;" size="20" name="frm2200S:txtTax24" maxlength="25" id="frm2200S:txtTax24" disabled="true" />
                                                            </span></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
              <!--new print name and signature-->
              <tr>
                <table width="800" style="font-family:arial; font-size:10px; text-align: center; vertical-align: top; table-layout: fixed;" border="1" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td style="text-align: left; " colspan="4">
                        <p style="text-align:justify; padding: 0px 2px;">I/we declare under the penalties of perjury that this remittance form has been made in
                        good faith, verified by me/us, and to the best of my/our knowledge and belief is true and correct, pursuant
                        to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority
                        thereof. Further I/we give my/our consent to the processing of my/our information as contemplated under the Data Privacy Act of 2012 (R.A. No. 10173)
                        for legitimate purposes. (If Authorized Representative, attach authorization letter)</p>
                      </td>
                    </tr>
                    <tr>
                      <td style="text-align: left; " colspan="2">For Individual:
                        <br>
                        <br>
                        <br>
                        <br>
                      </td>
                      <td style="text-align: left; " colspan="2">For Non-Individual:
                        <br>
                        <br>
                        <br>
                        <br>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">Signature over Printed Name of Taxpayer/Authorized Representative/Tax Agent
                        <br>
                        <i>(Indicate Title/Designation and TIN)</i>
                      </td>
                      <td colspan="2">Signature over Printed Name of President/Vice President/
                        <br> Authorized Officer or Representative/Tax Agent
                        <i>(Indicate Title/Designation and TIN)</i>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <table border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td>
                                Tax Agent Accreditation No./
                                <br> Attorney's Roll No.
                                <i>(If applicable)</i>
                              </td>
                              <td>
                                <input disabled="" id="txtTaxAgentNo" type="text" size="25" maxlength="20" value="">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                      <td>
                        <table border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td>
                                Date of Issue
                                <br>
                                <i>(MM/DD/YYYY)</i>
                              </td>
                              <td>
                                <input disabled="" id="txtDateIssue" type="text" size="15" maxlength="10" value="">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                      <td>
                        <table border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td>
                                Date of Expiry
                                <br>
                                <i>(MM/DD/YYYY)</i>
                              </td>
                              <td>
                                <input disabled="" id="txtDateExpiry" type="text" size="15" maxlength="10" value="">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </tr>
              <!--end print name and signature-->

              <!--start details pf payment-->
              <tr>
                <table width="800" class="tblForm" border="1" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td class="tblFormTdPart">
                        <table width="799" border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td width="100%">
                                <div align="center">
                                  <font size="2" style="font-weight:bold;">Part IV - Details of Payment</font>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </tr>
              <!--end details pf payment-->

              <!--start of 27, 28, 29, 30-->
              <tr>
                <td>
                  <table width="800" class="tblForm" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td class="tblFormTd" valign="top">
                          <table width="100%" class="tblForm" border="1" cellspacing="0" cellpadding="0">
                            <tbody>
                              <tr>
                                <td width="20%">
                                  <div align="center">
                                    <font size="1" style="font-weight:bold;">Particulars </font>
                                  </div>
                                </td>
                                <td width="15%">
                                  <div align="center">
                                    <font size="1" style="font-weight:bold;">Drawee Bank/Agency </font>
                                  </div>
                                </td>
                                <td width="20%">
                                  <div align="center">
                                    <font size="1" style="font-weight:bold;">Number </font>
                                  </div>
                                </td>
                                <td width="20%">
                                  <div align="center">
                                    <font size="1" style="font-weight:bold;">Date (MM/DD/YYYY) </font>
                                  </div>
                                </td>
                                <td width="25%">
                                  <div align="center">
                                    <font size="1" style="font-weight:bold;">Amount </font>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <font size="2" style="font-weight:bold;">&nbsp;27&nbsp;&nbsp;&nbsp;</font>
                                  <font size="1">Cash/Bank Debit Memo </font>
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtAgency33" disabled="" id="frm1601EQ:txtAgency33" type="text" size="15"
                                    maxlength="50" value="">
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtNumber33" disabled="" id="frm1601EQ:txtNumber33" type="text" size="15"
                                    maxlength="50" value="">
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtDate33" disabled="" id="frm1601EQ:txtDate33" type="text" size="15"
                                    maxlength="10" value="">
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtAmount33" disabled="" id="frm1601EQ:txtAmount33" style="text-align: right"
                                    type="text" size="15" maxlength="50" value="">
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <font size="2" style="font-weight:bold;">&nbsp;28&nbsp;&nbsp;&nbsp;</font>
                                  <font size="1">Check </font>
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtAgency34" disabled="" id="frm1601EQ:txtAgency34" type="text" size="15"
                                    maxlength="50" value="">
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtNumber34" disabled="" id="frm1601EQ:txtNumber34" type="text" size="15"
                                    maxlength="50" value="">
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtDate34" disabled="" id="frm1601EQ:txtDate34" type="text" size="15"
                                    maxlength="10" value="">
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtAmount34" disabled="" id="frm1601EQ:txtAmount34" style="text-align: right"
                                    type="text" size="15" maxlength="50" value="">
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <font size="2" style="font-weight:bold;">&nbsp;29&nbsp;&nbsp;&nbsp;</font>
                                  <font size="1">Tax Debit Memo </font>
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtAgency35" disabled="" id="frm1601EQ:txtAgency35" type="text" size="15"
                                    maxlength="50" value="">
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtNumber35" disabled="" id="frm1601EQ:txtNumber35" type="text" size="15"
                                    maxlength="50" value="">
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtDate35" disabled="" id="frm1601EQ:txtDate35" type="text" size="15"
                                    maxlength="10" value="">
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtAmount35" disabled="" id="frm1601EQ:txtAmount35" style="text-align: right"
                                    type="text" size="15" maxlength="50" value="">
                                </td>
                              </tr>
                              <tr>
                                <td colspan="5">
                                  <font size="2" style="font-weight:bold;">&nbsp;30&nbsp;&nbsp;&nbsp;</font>
                                  <font size="1">Others
                                    <i>(specify below)</i>
                                  </font>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtParticular36" disabled="" id="frm1601EQ:txtParticular36" type="text"
                                    size="15" maxlength="50" value="">
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtAgency36" disabled="" id="frm1601EQ:txtAgency36" type="text" size="15"
                                    maxlength="50" value="">
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtNumber36" disabled="" id="frm1601EQ:txtNumber36" type="text" size="15"
                                    maxlength="50" value="">
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtDate36" disabled="" id="frm1601EQ:txtDate36" type="text" size="15"
                                    maxlength="10" value="">
                                </td>
                                <td class="text-center">
                                  <input name="frm1601EQ:txtAmount36" disabled="" id="frm1601EQ:txtAmount36" style="text-align: right"
                                    type="text" size="15" maxlength="50" value="">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <!--end of 27, 28, 29, 30-->

              <!--start of machine validation-->
              <tr>
                <td>
                  <table style="font-size:10px; text-align: left; " border="1">
                    <tbody>
                      <tr>
                        <td width="60%">Machine Validation/Revenue Official Receipt Details
                          <br>
                          <i> (If not filed with an Authorized Agent Bank)</i>
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                        </td>
                        <td width="40%" align="center">
                          <i>Stamp of Receiving Office/AAB and Date of Receipt
                            <br>(RO's Signature/Bank Teller's Initial)</i>
                          <br>
                          <br>
                          <br>
                          <br>
                          <br>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <!--end of machine validation-->



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
                                                                            <div id="frm2200S:j_id743" class="icePnlGrp">
                                                                                <div align="center">
                                                                                 @if($action != 'view')
                                                                                    <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm2200S:cmdValidate" id="frm2200S:cmdValidate" onclick="validateForm()" />
                                                                                    <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm2200S:cmdEdit" id="frm2200S:cmdEdit" onclick="editForm()"/>
                                                                                    <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                  <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                  <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printOCR();" />
                                                                                  <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2200S:btnFinalCopy" id="frm2200S:btnFinalCopy" onclick="submitForm();" />
                                                                                  <div id="msg" class="printButtonClass" style="display:none;"></div>
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
                                <div class="footer footer2200S" style="padding:6px; text-align: center; font-size: 11px; background-color: white; width: 100%;">
                                  <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                                </div>
                              </td>
                            </tr>
                    </table>
                    <div id="PrintMainContent" style="display:none;width:850px; height:1300px;font-family: Arial; margin:0; overflow: hidden;">
                        <img src="{{ asset('images/Print/2200-S-Pg1.png') }}" style="position: absolute; background-color: white; top: -17px; left: -25px; width: 850px; height: 1300px; margin: 0; padding: 0;" />
                            <!--<div style="position:relative; top: -35px; left: -30px;">-->
                                <div>                                  
                                    <div style=" float:left; position:absolute; left:147px; top:135px; letter-spacing:8px; "><span id="txtMonth1" class='smallBold'>01</span></div>         
                                      <div style=" float:left; position:absolute; left:212px; top:135px; letter-spacing:8px; right: 648px;"><span id="txtDate" class='smallBold'>01</span></div>  
                                      <div style=" float:left; position:absolute; left:274px; top:135px; letter-spacing:12px;"><span id="txtForYr" class='smallBold'>2018</span></div>  
                                      <div style=" float:left; position:absolute; left:478px; top:133px; "><span id="amendedRtn_1" class='smallBold'>X</span></div>
                                      <div style=" float:left; position:absolute; left:526px; top:133px; right: 334px;"><span id="amendedRtn_2" class='smallBold'>X</span></div>  
                                      <div style=" float:left; position:absolute; top:135px; letter-spacing:5px; width: 8px; left: 756px;"><span id="txtSheets" class='smallBold'>12</span></div> 
                                    </div>
                                <div> 
                                    <div style=" float:left; position:absolute; left:252px; top:173px; letter-spacing:13px;"><span id="txtTIN1" class='smallBold'>123</span></div>  
                                    <div style=" float:left; position:absolute; left:338px; top:173px; letter-spacing:13px; right: 367px;"><span id="txtTIN2" class='smallBold'>123</span></div>  
                                    <div style=" float:left; position:absolute; left:425px; top:173px; letter-spacing:13px;"><span id="txtTIN3" class='smallBold'>123</span></div>  
                                    <div style=" float:left; position:absolute; left:515px; top:173px; letter-spacing:13px; width: 57px;"><span id="txtBranchCode" class='smallBold'>0000</span></div>
                                    <div style=" float:left; position:absolute; left:735px; top:173px; letter-spacing:5px; width: 35px;"><span id="txtRDOCode" class='smallBold'>456</span></div>
                                </div>  
                                <div>
                                    <div style=" float:left; position:absolute; left:19px; top:209px; width:770px; overflow:hidden; white-space: nowrap;"><span id="taxpayerName" class='smallBold' style="letter-spacing:2pt;">ACE DELA CRUZ</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:19px; top:246px; width:770px; overflow:hidden; white-space: nowrap;"><span id="txtAddress" class='smallBold' style="letter-spacing:2pt;">ACE DELA CRUZ</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:19px;  top:266px; width:600px; overflow:hidden; white-space: nowrap;"><span id="txtAddress2" class='smallBold' style="letter-spacing:2pt;">ACD EDKASL</span></div>
                                    <div style=" float:left; position:absolute; left:712px; top:266px; width:45px; overflow:hidden; white-space: nowrap;"><span id="txtZipCode" class='smallBold' style="letter-spacing:5px;">1234</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:19px;  top:307px; width:245px;"><span id="txtTelNum" class='smallBold'  style="letter-spacing:2pt;">09183751314</span></div>
                                    <div style=" float:left; position:absolute; left:279px; top:307px; width:383px; overflow:hidden; white-space: nowrap;  "><span id="txtLineBus" class='smallBold' style="letter-spacing:2pt;">MAIN LINE OF BUSINESS</span></div>
                                    <div style=" float:left; position:absolute; left:670px; top:307px; width:68px; overflow:hidden; white-space: nowrap;"><span id="txtPSIC" class='smallBold' style="letter-spacing:5px;">101158</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:19px; top:343px; width:770px; overflow:hidden; white-space: nowrap; "><span id="txtEmailAddress" class='smallBold' style="letter-spacing:2pt;">sampleEmail@yahoo.com.ph</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:15px;  top:396px; width:95px; overflow:hidden; white-space: nowrap; "><span id="optRegion" class='smallBold' style="letter-spacing:1pt;">REGION 1</span></div>
                                    <div style=" float:left; position:absolute; left:124px; top:396px; width:378px; overflow:hidden; white-space: nowrap; "><span id="optProvince" class='smallBold' style="letter-spacing:2pt;">SAMPLE PROVINCE</span></div>
                                    <div style=" float:left; position:absolute; left:516px; top:396px; width:270px; overflow:hidden; white-space: nowrap; "><span id="optCity" class='smallBold' style="letter-spacing:2pt;">SAMPLE CITY</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:15px;  top:448px; width:95px; overflow:hidden; white-space: nowrap; "><span id="optRegion1" class='smallBold' style="letter-spacing:1pt;">REGION 1</span></div>
                                    <div style=" float:left; position:absolute; left:124px; top:448px; width:378px; overflow:hidden; white-space: nowrap; "><span id="optProvince1" class='smallBold' style="letter-spacing:2pt;">SAMPLE PROVINCE</span></div>
                                    <div style=" float:left; position:absolute; left:516px; top:448px; width:270px; overflow:hidden; white-space: nowrap; "><span id="optCity1" class='smallBold' style="letter-spacing:2pt;">SAMPLE CITY</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:190px; top:481px; right: 577px;"><span id="optTreaty_1" class='smallBold' style="letter-spacing:8px;">X</span></div>
                                    <div style=" float:left; position:absolute; left:249px; top:482px; "><span id="optTreaty_2" class='smallBold' style="letter-spacing:8px;">X</span></div>
                                    <div style=" float:left; position:absolute; left:339px; top:487px; width:448px; overflow:hidden; white-space: nowrap; "><span id="lstTaxTreaty" class='smallBold' style="letter-spacing:2pt;">PLEASE SPECIFY</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:40px; top:525px; right: 711px;"><span id="chkPymntManner_1" class='smallBold' style="letter-spacing:8px;">X</span></div>
                                    <div style=" float:left; position:absolute; left:274px; top:526px; "><span id="chkPymntManner_2" class='smallBold' style="letter-spacing:8px;">X</span></div>
                                </div>
                                <div>
                                    <div style=" float:left; position:absolute; left:40px; top:551px; right: 712px;"><span  id="chkPymntManner_3" class='smallBold' style="letter-spacing:8px;">X</span></div>
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
                        <img src="{{ asset('images/Print/2200-S-Pg2.png') }}"  style="position: absolute; background-color: white; top: -24px; left: -25px; width: 850px; height: 1300px; margin: 0; padding: 0;" />

                        <div style="position: absolute; left:5px; top:150px; height: 16px; width: 850px;"> 
                          <div style=" float:left; position:absolute; left:20px; top:10px; letter-spacing:2pt;"><span id="txtSched1TIN1" class='smallBold'>123</span></div> 
                          <div style=" float:left; position:absolute; left:80px; top:10px; letter-spacing:2pt;"><span id="txtSched1TIN2" class='smallBold'>123</span></div> 
                          <div style=" float:left; position:absolute; left:136px; top:10px; letter-spacing:2pt;"><span id="txtSched1TIN3" class='smallBold'>123</span></div>
                          <div style=" float:left; position:absolute; left:190px; top:10px; letter-spacing:2pt; width: 57px;"><span id="txtSched1BranchCode" class='smallBold'>0000</span></div>
                          <div style=" float:left; position:absolute; left:284px; top:10px; width:770px; overflow:hidden; white-space: nowrap;"><span id="txtSched1TaxpayerName" class='smallBold' style="letter-spacing:2pt;">ACE DELA CRUZ</span></div>
                        </div>
                            
                            <div style="position: absolute; left:425px; top:270px; height: 16px; width: 106px;">
                                <div style=" float:left; position:absolute; left:-1px; top:79px;   width: 106px; text-align: right; height: 15px;"><span id="txtSalesValue0" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:100px;  width: 106px; text-align: right; height: 15px;"><span id="txtSalesValue1" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:121px;  width: 106px; text-align: right; height: 15px;"><span id="txtSalesValue2" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:141px;  width: 106px; text-align: right; height: 15px;"><span id="txtSalesValue3" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:163px;  width: 106px; text-align: right; height: 15px;"><span id="txtSalesValue4" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:193px;  width: 106px; text-align: right; height: 15px;"><span id="txtSalesValue5" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:231px;  width: 106px; text-align: right; height: 15px;"><span id="txtSalesValue6" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                  <div style=" float:left; position:absolute; left:-1px; top:267px;  width: 106px; text-align: right; height: 15px;"><span id="txtSalesValue7" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:320px;  width: 106px; text-align: right; height: 15px;"><span id="txtSalesValue8" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:370px;  width: 106px; text-align: right; height: 15px;"><span id="txtSalesValue9" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>               
                            </div>
                             
                            <div style="position: absolute; left:542px; top:270px; height: 16px; width: 106px;">
                                <div style=" float:left; position:absolute; left:-1px; top:79px;   width: 106px; text-align: right; height: 15px;"><span id="txtVolumeRemovals0" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:100px;   width: 106px; text-align: right; height: 15px;"><span id="txtVolumeRemovals1" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:121px;  width: 106px; text-align: right; height: 15px;"><span id="txtVolumeRemovals2" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:141px;   width: 106px; text-align: right; height: 15px;"><span id="txtVolumeRemovals3" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:163px;   width: 106px; text-align: right; height: 15px;"><span id="txtVolumeRemovals4" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:193px;   width: 106px; text-align: right; height: 15px;"><span id="txtVolumeRemovals5" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:231px;   width: 106px; text-align: right; height: 15px;"><span id="txtVolumeRemovals6" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:267px;   width: 106px; text-align: right; height: 15px;"><span id="txtVolumeRemovals7" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:320px;   width: 106px; text-align: right; height: 15px;"><span id="txtVolumeRemovals8" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:370px;   width: 106px; text-align: right; height: 15px;"><span id="txtVolumeRemovals9" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                            </div>

                            
                            <div style="position: absolute; left:679px; top:270px; height: 16px; width: 106px;">
                                <div style=" float:left; position:absolute; left:-1px; top:79px;   width: 106px; text-align: right; height: 15px;"><span id="txtBasicTaxDue0" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:100px;   width: 106px; text-align: right; height: 15px;"><span id="txtBasicTaxDue1" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:121px;  width: 106px; text-align: right; height: 15px;"><span id="txtBasicTaxDue2" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:141px;   width: 106px; text-align: right; height: 15px;"><span id="txtBasicTaxDue3" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:163px;   width: 106px; text-align: right; height: 15px;"><span id="txtBasicTaxDue4" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:193px;   width: 106px; text-align: right; height: 15px;"><span id="txtBasicTaxDue5" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:231px;   width: 106px; text-align: right; height: 15px;"><span id="txtBasicTaxDue6" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:267px;   width: 106px; text-align: right; height: 15px;"><span id="txtBasicTaxDue7" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:320px;   width: 106px; text-align: right; height: 15px;"><span id="txtBasicTaxDue8" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:370px;   width: 106px; text-align: right; height: 15px;"><span id="txtBasicTaxDue9" class='smallBold' style="font-size:12px;">99,999,999,999.00</span></div>
                            </div>

                            <div style="position: absolute; left:15px; top:679px; height: 16px; width: 106px;">
                                <div style=" float:left; position:absolute; left:5px; top:14px;  width: 14px; height: 15px;"><span id="txtsched1Atc0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:73px; top:14px;  width: 205px; height: 15px;"><span id="txtsched1Desc0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:240px; top:14px;  width: 87px; text-align: center; height: 14px;"><span id="txtsched1TaxBracket0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:339px; top:14px;  width: 56px; text-align: center; height: 12px;"><span id="txtsched1AppTaxRate0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:396px; top:14px;  width: 119px; text-align: right; height: 14px;"><span id="txtsched1SalesValue0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:509px; top:14px;  width: 122px; text-align: right; height: 12px;"><span id="txtsched1VolumeRemovals0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:651px; top:14px;  width: 118px; text-align: right; height: 11px;"><span id="txtsched1BasicTaxDue0" class='smallBold' style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:652px; top:61px;  width: 117px; text-align: right; height: 16px;"><span id="totalTaxDue" class='smallBold' style="font-size:11px;">000</span></div>
                            </div>

                    </div>

                    <div id="DummyTxt" style='display:none;'></div>

                </div>
            </div>
        </div>

        <!--Start Modal for Schedule 1-->
    <div id="modalSched1" class="printSignFooterClass modalSched1" style="width:1080px; padding: 10px;display:none;position:relative;margin: auto; background:#fff;">
        <br/><br/>
        <table id="tempContainer">
          <tr>
            <td><input type="text" size="2" value="{{$company->tin1}}" name="frm2200S:txtSched1TIN1" maxlength="3" id="frm2200S:txtSched1TIN1" disabled/></td>
            <td><input type="text" size="2" value="{{$company->tin2}}"  name="frm2200S:txtSched1TIN2" maxlength="3" id="frm2200S:txtSched1TIN2" disabled/></td>
            <td><input type="text" size="2" value="{{$company->tin3}}"  name="frm2200S:txtSched1TIN3" maxlength="3" id="frm2200S:txtSched1TIN3" disabled/></td>
            <td><input type="text" size="2" value="{{$company->tin4}}"  name="frm2200S:txtSched1BranchCode" maxlength="3" id="frm2200S:txtSched1BranchCode" disabled/></td>
            <td><input type="text"  value="{{$company->registered_name}}"  style="width:98%" name="frm2200S:txtSched1TaxpayerName" maxlength="70" id="frm2200S:txtSched1TaxpayerName" disabled/></td>
          </tr>
        </table>
        <table width="100%" class="tblSched1_2200S" border="1">
          <tr class="modalHeader">
                        <td colspan="2" style="text-align: left;font-weight: bold" width="10%">
              &nbsp;SCHEDULE 1 
            </td>
                        <td colspan="5" align="left" width="90%">
              SUMMARY OF REMOVALS AND EXCISE TAX DUE ON SWEETENED BEVERAGES CHARGEABLE AGAINST PAYMENT
            </td>           
                    </tr>         
                    <tr class="columnHeader">
                        <td colspan="7" width="100%">&nbsp;</td>
                    </tr>         
                    <tr class="modalColumnHeader columnHeader">
                        <td align="center" width="5%">ATC</td>
                        <td align="center" width="11%">Description</td>
                        <td align="center" width="7%">Tax Bracket/ Unit of Measure</td>
                        <td align="center" width="6%">Applicable Tax Rate</td>
                        <td align="center" width="22%">Sales Value (in Peso)</td>
                        <td align="center" width="22%">Volume of Removals</td>
                        <td align="center" width="27%">Basic Excise Tax Due</td>
          </tr>
          <tr class="modalContent">
              <td align="center" width="5%"></td>
              <td align="center" width="11%">
                <p style="text-align:left; padding: 2px 2px;">
                  1. Using Purely Caloric Sweeteners and Purely Non-Caloric Sweeteners, or a mix of 
                  caloric and non-caloric sweeteners <strong style="text-decoration: underline;">but shall not apply those using high fructose
                  corn syrup.</strong>
                </p>
              </td>
              <td align="center" width="7%"></td>
              <td align="center" width="6%"></td>
              <td align="center" width="22%"></td>
              <td align="center" width="22%"></td>
              <td align="center" width="27%"></td>
          </tr>
                    <tbody class="modalContent" id="frm2200SBeverages">
            
                    </tbody>
                    <tr>
                        <td colspan="7" width="100%" class="modalColumnHeader" style="text-align: left">&nbsp;&nbsp;OTHERS <em>(specify)</em></td>
                    </tr>
          <tbody class="modalContent">
            <tr>
                            <table width="100%" class="tblSched1_2200S" border="1" id="frm2200SadditionalSched1">
                                <tr> 
                      <td align="center" width="2%"><input type="checkbox" name="frm2200S:sched1Chk0" id="frm2200S:sched1Chk0" value="" style="display: none" disabled="true"/></td>
                    <td align="center" width="6%"><input type="text" name="frm2200S:txtsched1Atc[]" id="frm2200S:txtsched1Atc0" size="5" value="XB" maxlength="5" onfocus="onFocusIterate(this);" onblur="checkIfValidValues(this);capitalize(this);checkATCValue(this);onBlurIterate(this);otherRateCheck(0);" onkeypress="return letternumber(event)"/></td>
                      <td align="center" width="14%"><input type="text" name="frm2200S:txtsched1Desc[]" id="frm2200S:txtsched1Desc0" size="18" value="" onfocus="onFocusIterate(this);" onkeypress="return Name(this, event)" onblur="checkIfValidValues(this);onBlurIterate(this);"/></td>
                      <td align="center" width="10%"><input type="text" name="frm2200S:txtsched1TaxBracket[]" id="frm2200S:txtsched1TaxBracket0" size="11" value="" onfocus="onFocusIterate(this);" onkeypress="return Name(this, event)" onblur="checkIfValidValues(this);onBlurIterate(this);" /></td>
                      <td align="center" width="6%"><input type="text" style="text-align:right" name="frm2200S:txtsched1AppTaxRate[]" id="frm2200S:txtsched1AppTaxRate0" maxlength="6" size="5" value="0.00" onfocus="onFocusIterate(this);" onblur="setApplicableTaxrate(this);otherRateCheck(0);computeSched1BasicTaxDue(0);onBlurIterate(this);" onkeypress="return numbersonly(this, event)"/></td>
                      <td align="center" width="22%"><input type="text" style="text-align:right" name="frm2200S:txtsched1SalesValue[]" id="frm2200S:txtsched1SalesValue0" maxlength="25" size="25" value="0.00" onfocus="onFocusIterate(this);" onblur="roundDownWithAlert(this);onBlurIterate(this);" onkeypress="return numbersonly(this, event)" /></td>
                      <td align="center" width="22%"><input type="text" style="text-align:right" name="frm2200S:txtsched1VolumeRemovals[]" id="frm2200S:txtsched1VolumeRemovals0" maxlength="25" size="25" value="0.00" onfocus="onFocusIterate(this);" onblur="roundDownWithAlert(this);computeSched1BasicTaxDue(0);onBlurIterate(this);" onkeypress="return numbersonly(this, event)" /></td>
                      <td align="center" width="19%"><input type="text" style="text-align:right" name="frm2200S:txtsched1BasicTaxDue[]" style="background-color: rgb(220, 220, 220);" maxlength="25" id="frm2200S:txtsched1BasicTaxDue0" size="25" value="0.00" disabled="true"/></td>
                                </tr>
                            </table>
            </tr>
                    </tbody>
                </table>
                
                <table width="100%">
                    <tr height="5px"></tr>
                    <tr>
                        <td colspan="2" style="text-align: right">
                            <input type="button" class="printButtonClass" name="frm2200S:btnAdd" id="frm2200S:btnAdd" value="     Add     " onClick="addFieldsForSched1()" />&nbsp;&nbsp;&nbsp;
                            <input type="button" class="printButtonClass" name="frm2200S:btnDelete" id="frm2200S:btnDelete" value="   Delete   " onClick="deleteFieldForSched1()"/>
                        </td>
          </tr>
          <tr height="10px"></tr>
                    <tr class="columnHeader">
                        <td class="modalColumnHeader" style="text-align:left" width="84%">
                           TOTAL TAX DUE <font style="font-style:italic; font-size:10px">(To Item 18 of Part III)</font>
                        </td>
                        <td align="center" width="16%">
                            <input type="text" name="frm2200S:totalTaxDue" id="frm2200S:totalTaxDue" style="background-color: rgb(220, 220, 220); text-align:right" size="25" value="0.00" maxlength="25" disabled/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <input type="button" class="printButtonClass" name="frm2200S:btnPrintPreview" id="frm2200S:btnPrintPreview" value="  PRINT PREVIEW  " onClick="printOCR();" />&nbsp;&nbsp;&nbsp;
                            <input type="button" class="printButtonClass enabledButton" name="frm2200S:btnOK" id="frm2200S:btnOK" value="       OK       " onClick="sched1OK('blind')"/>&nbsp;&nbsp;&nbsp;
                            <input type="button" class="printButtonClass" name="frm2200S:btnClear" id="frm2200S:btnClear" value="   CLEAR   " onClick="clearSchedule1();" />&nbsp;&nbsp;&nbsp;
                            <input type="button" class="printButtonClass" name="frm2200S:btnCancel" id="frm2200S:btnCancel" value="   CANCEL   " onClick="cancelSchedule1();" />&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                </table>
        </div>
    <!--End Modal for Schedule 1-->

  <!-- Send Email -->
  <div id="hiddenEnroll" style="display:none;"  > <input id="txtFinalFlag" class="FinalFlag" name="txtFinalFlag" type="text" onblur="" onkeypress="" value="0" maxlength="60"   />
          <input id="txtEnroll" name="txtEnroll" type="text" onblur="" onkeypress="" value="N" maxlength="60"   />
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
<script src="{{ asset('js/forms/2200S.js') }}" ></script>
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
              window.setTimeout("disableAllElementIDs();d.getElementById('btnUpload').disabled = false;d.getElementById('btnPrint').disabled = false;document.getElementById('frm2200S:btnPrintPreview').disabled = false;d.getElementById('Button3').disabled = false;d.getElementById('frm2200S:btnSchedule1').disabled = !d.getElementById('frm2200S:chkPymntManner_1').checked; $('a[id*=\"lnkXT\"]').attr('disabled', !d.getElementById('frm2200S:chkPymntManner_1').checked);", 1000);
          }
        } else {
          window.setTimeout("$('#loader').hide('blind');",100);
        } 
        if ( $('#printMenu').css('display') != 'none' ) { 
          $('#printMenu').hide('blind');
        }
        loadXMLATC('/xml/atcCodes.xml');
        d.getElementById('frm2200S:txtTIN1').disabled = true;
        d.getElementById('frm2200S:txtTIN2').disabled = true;
        d.getElementById('frm2200S:txtTIN3').disabled = true;
        d.getElementById('frm2200S:txtBranchCode').disabled = true; 
        document.getElementById('txtEmail').disabled = true;
    }
  
  //Disable pasting, drag and drop of html elements values
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

        flag1=false;
        var count1=0;
        var responses1 = d.getElementById('response').getElementsByTagName('div');
        var sPar1 = 'frm2200S:sched1Chk';     
        
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

                window.setTimeout("loadData();sched1OK('');flag1=true;isReload = false;", 710); //changeMannerOfPaymentReload()

        window.setTimeout("$('#loader').hide('blind');",2000);  
      } 

        if (response.innerHTML.indexOf("All Rights Reserved BIR 2014.0") >= 0) {
          gIsReadOnly = true;
        }

        if (gIsReadOnly) { 
          d.getElementById('frm2200S:cmdValidate').disabled = true;
          d.getElementById('btnSave').disabled = true;
          d.getElementById('Button3').disabled = false;
        }

    
  }

  function getGrossSales() {
      var sum = 0;

      if (d.getElementById("frm2200S:chkPymntManner_1").checked) {
          //txtProTaxable, txtInsTaxable, txtsched1Taxable
          $(".tblSched1_2200S input[id*='Taxable'][type='text']").each(function () {
              sum = sum + NumWithComma($.trim($(this).attr('value')));
          });
      }

      return sum;
  }

  //Added 05/02/2014
    //Used in modal validation
  var isReload = false;

  function loadData() {
    /*This will load data onto fields*/
    var response = d.getElementById("response");
    var elem = d.getElementById('frmMain').elements;

    //Added 05/02/2014
    //isReload - set to true to bypass modal validation
    isReload = true;


        for(var i = 0; i < elem.length; i++)
        {
      
      if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
        if (elem[i].type == 'text' || elem[i].type == 'select-one') {
          var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
          elem[i].value = ''; elem[i].selectedIndex = 0;
          if(elem[i].id == 'frm2200S:taxpayerName' || elem[i].id == 'frm2200S:txtLineBus' || elem[i].id == 'frm2200S:txtAddress'){
            elem[i].value = unescape(fieldVal[1]);
          }
          else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
          else{
            elem[i].value = (typeof fieldVal[1] === "undefined") ?  "" : fieldVal[1]; //all select-one and text values        
          }

          if ( String(elem[i].id).indexOf('frm2200SoptRegion') != -1 || String(elem[i].id).indexOf('frm2200SoptProvince') != -1  || String(elem[i].id).indexOf('frm2200SoptRegion1') != -1  || String(elem[i].id).indexOf('frm2200SoptProvince1') != -1 ) {
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
  
  
  var regionCount=0;
  var provinceCount=0;
  var cityCount=0;

  
    function init()
    {
    var year = new Date();
    d.getElementById('frm2200S:txtMonth1').selectedIndex = year.getMonth();
    dd = "" + year.getDate();
    if (dd.length == 1) 
    { 
      dd = "0" + dd; 
      d.getElementById('frm2200S:txtDate').value = dd;
    }
    else
    {
      d.getElementById('frm2200S:txtDate').value = year.getDate();
    }
    d.getElementById('frm2200S:txtForYr').value = year.getFullYear();
    
        d.getElementById('frm2200S:amendedRtn_1').disabled = false;
        d.getElementById('frm2200S:amendedRtn_2').disabled = false;
        d.getElementById('frm2200S:txtSheets').disabled = true;
        d.getElementById('frm2200S:txtTIN1').disabled = true;
        d.getElementById('frm2200S:txtTIN2').disabled = true;
        d.getElementById('frm2200S:txtTIN3').disabled = true;
        d.getElementById('frm2200S:txtBranchCode').disabled = true;
        /*d.getElementById('frm2200S:txtRDOCode').disabled = true;*/
        d.getElementById('frm2200S:txtLineBus').disabled = true;
        d.getElementById('frm2200S:taxpayerName').disabled = true;
        d.getElementById('frm2200S:txtTelNum').disabled = true;
        d.getElementById('frm2200S:txtAddress').disabled = true;
        d.getElementById('frm2200S:txtZipCode').disabled = true;
        d.getElementById('frm2200S:optTreaty_2').checked = true;
        d.getElementById('frm2200S:lstTaxTreaty').disabled = true;

        d.getElementById('frm2200S:txtTax16').disabled = true;
        d.getElementById('frm2200S:txtTax17C').disabled = true;
        d.getElementById('frm2200S:txtTax18').disabled = true;
        d.getElementById('frm2200S:txtTax19').disabled = true;
        d.getElementById('frm2200S:txtTax20').disabled = true;

    
        d.getElementById('frm2200S:txtTax21D').disabled = true;
        d.getElementById('frm2200S:txtTax22').disabled = true;
        d.getElementById('frm2200S:txtTax23B').disabled = true;
        d.getElementById('frm2200S:txtTax23C').disabled = true;
        d.getElementById('frm2200S:txtTax24').disabled = true;

        @if($action != 'view')
        d.getElementById('frm2200S:cmdEdit').disabled = true;
        d.getElementById('frm2200S:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
   
        d.getElementById('btnPrint').disabled = true;
        @endif

        loadXMLRegion('/xml/region.xml');
        getRegion();

        createStaticFieldForSched1();
    
   
      d.getElementById('txtEmail').disabled = true;
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
        if (d.getElementById('frm2200S:optTreaty_1').checked) {
            d.getElementById('frm2200S:lstTaxTreaty').disabled = false;
            d.getElementById('frm2200S:lstTaxTreaty').style.backgroundColor = "#ffffff";
        } else {
            d.getElementById('frm2200S:lstTaxTreaty').disabled = true;
            d.getElementById('frm2200S:lstTaxTreaty').selectedIndex = 0;
            d.getElementById('frm2200S:lstTaxTreaty').style.backgroundColor = "#ededed";
        }
    }

    function changeMannerOfPayment()
    {
        if (d.getElementById('frm2200S:chkPymntManner_3').checked) {
            d.getElementById('frm2200S:txtOthMannerofPymnt').disabled = false;
            d.getElementById('frm2200S:txtOthMannerofPymnt').style.background = "ffffff";
            d.getElementById('frm2200S:txtOthMannerofPymnt').focus();
        }
        if (d.getElementById('frm2200S:chkPymntManner_2').checked && !d.getElementById('frm2200S:chkPymntManner_3').checked) {

            //set item 17
            d.getElementById('frm2200S:chkPymntManner_3').disabled = false;
            d.getElementById('frm2200S:txtOthMannerofPymnt').disabled = true;
            d.getElementById('frm2200S:txtOthMannerofPymnt').value = "";
            d.getElementById('frm2200S:txtOthMannerofPymnt').style.background = "ededed";

            //As of 04/29/2014 new requirement Item 16 is always disabled (SRS)
            //d.getElementById('frm2200S:txtOthMannerofPymnt').disabled = false;
            d.getElementById('frm2200S:btnSchedule1').disabled = true;
            //d.getElementById('frm2200S:PayPenalties').disabled = true;
            d.getElementById('frm2200S:PayPenalties').checked = false;
            setTimeout("d.getElementById('frm2200S:txtMonth1').disabled = true;", 100);
            d.getElementById('frm2200S:txtTax23A').focus();

      //woi v
      enablePenalties();
        }
        else if(d.getElementById('frm2200S:chkPymntManner_1').checked){
            d.getElementById('frm2200S:txtOthMannerofPymnt').disabled = true;
            d.getElementById('frm2200S:txtOthMannerofPymnt').value = "";
            d.getElementById('frm2200S:btnSchedule1').disabled = false;
            //d.getElementById('frm2200S:PayPenalties').disabled = false;

            //set item 17
            d.getElementById('frm2200S:chkPymntManner_3').disabled = true;
            d.getElementById('frm2200S:txtOthMannerofPymnt').disabled = true;
            d.getElementById('frm2200S:txtOthMannerofPymnt').value = "";
            d.getElementById('frm2200S:txtOthMannerofPymnt').style.background = "ededed";
            d.getElementById('frm2200S:chkPymntManner_3').checked = false;

      //woi ii 
      disablePenalties();

            if (showFillupSched1Alert && !isReload) {
                alert("Please fill up Schedule 1.");
                d.getElementById("frm2200S:btnSchedule1").onclick();
      }
            if(sched1Mess) {
                alert("Please fill up the fields for Schedule 1.");
                sched1Mess = false;
            }
        } 
    }

  //woi
  function enablePenalties()
  {
      d.getElementById('frm2200S:txtTax21A').disabled = false;
      d.getElementById('frm2200S:txtTax21B').disabled = false;
      d.getElementById('frm2200S:txtTax21C').disabled = false;

      d.getElementById('frm2200S:txtTax21A').value = "0.00";
            d.getElementById('frm2200S:txtTax21B').value = "0.00";
            d.getElementById('frm2200S:txtTax21C').value = "0.00";

      d.getElementById('frm2200S:txtTax21A').style.background = "#ffffff";
      d.getElementById('frm2200S:txtTax21B').style.background = "#ffffff";
      d.getElementById('frm2200S:txtTax21C').style.background = "#ffffff";

      compute21D();
  }

  //woi 

  function disablePenalties()
  {
    d.getElementById('frm2200S:txtTax21A').disabled = true;
    d.getElementById('frm2200S:txtTax21B').disabled = true;
    d.getElementById('frm2200S:txtTax21C').disabled = true;

    d.getElementById('frm2200S:txtTax21A').value = "0.00";
        d.getElementById('frm2200S:txtTax21B').value = "0.00";
        d.getElementById('frm2200S:txtTax21C').value = "0.00";

    d.getElementById('frm2200S:txtTax21A').style.background = "rgb(220,220,220)";
    d.getElementById('frm2200S:txtTax21B').style.background = "rgb(220,220,220)";
    d.getElementById('frm2200S:txtTax21C').style.background = "rgb(220,220,220)";

    compute21D();
  }
  



  function dateMonthYear()
  {
    if(d.getElementById('frm2200S:chkPymntManner_2').checked)
    {
      var month = new Date();
      var date1 = new Date();
      var year = new Date();
      d.getElementById('frm2200S:txtMonth1').selectedIndex = month.getMonth();
      d.getElementById('frm2200S:txtMonth1').disabled = true;
      //d.getElementById('frm2200S:txtDate').value = date1.getDate();
      dd = "" + date1.getDate();
        if (dd.length == 1) 
        { 
          dd = "0" + dd; 
          d.getElementById('frm2200S:txtDate').value = dd;
        }
        else
        {
          d.getElementById('frm2200S:txtDate').value = date1.getDate();
        }
      d.getElementById('frm2200S:txtDate').disabled = true;
      d.getElementById('frm2200S:txtForYr').value = year.getFullYear();
      d.getElementById('frm2200S:txtForYr').disabled = true;
    }
    else
    {
      d.getElementById('frm2200S:txtMonth1').disabled = false;
      d.getElementById('frm2200S:txtDate').disabled = false;
      d.getElementById('frm2200S:txtForYr').disabled = false;
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
    
    $('#frm2200SoptRegion').html(data);   
    $('#frm2200SoptRegion1').html(data);
    }

    function getProvince(regionCode, provID, cityID)
    {
        //Clear city
        var data = "<option value='00'>(Select City)</option>";
    
        //var selectCity = d.getElementById(cityID);
        //selectCity.innerHTML = data;
    if (cityID == 'frm2200SoptCity') {
      $('#frm2200SoptCity').html(data);
    } else { //frm2200SoptCity1
      $('#frm2200SoptCity1').html(data);
    }

        data = "<option value='00'>(Select Province)</option>";
        var selectProv = d.getElementById(provID);
        for(var i = 0; i < provinceList.length; i++) {
            var prov = provinceList[i];
            if(prov.regionCode == regionCode){
                data = data +
                    "<option value=" + prov.provinceCode + ">" + prov.description + "</option>";
            }
        }
        //selectProv.innerHTML = data;
    if (provID == 'frm2200SoptProvince') {
      $('#frm2200SoptProvince').html(data);
    } else { //frm2200SoptProvince1
      $('#frm2200SoptProvince1').html(data);
    }   
        selectProv.selectedIndex = 0;
    }

    function getCity(regionID, provinceID, cityID)
    {
        var data = "<option value='00'>(Select City)</option>";
        var region = d.getElementById(regionID);
        var prov = d.getElementById(provinceID);
        var selectCity = d.getElementById(cityID);
    
        for(var i = 0; i < cityList.length; i++) {
            var city = cityList[i];
            if(city.regionCode == region.value && city.provinceCode == prov.value){
                data = data +
                    "<option value=" + city.cityCode + ">" + city.description + "</option>";
            }
        }
        //selectCity.innerHTML = data;
    if (cityID == 'frm2200SoptCity') {
      $('#frm2200SoptCity').html(data);
    } else { //frm2200SoptCity1
      $('#frm2200SoptCity1').html(data);
    }   
        selectCity.selectedIndex = 0;
    }

    function showSched1()
    {
    if(d.getElementById('frm2200S:chkPymntManner_1').checked){
        
          $('#formPaper').hide();
        d.getElementById('MainContent').style.display = "none";
        $('#modalSched1').show();
        $('#tempContainer').hide();

        //setting value of TIN, Branchcode and TPName for Sched1 modal.....
        var sched1Tin1 = d.getElementById('frm2200S:txtSched1TIN1');
        var tin1 = d.getElementById('frm2200S:txtTIN1');
        sched1Tin1.value = tin1.value;

        var sched1Tin2 = d.getElementById('frm2200S:txtSched1TIN2');
        var tin2 = d.getElementById('frm2200S:txtTIN2');
        sched1Tin2.value = tin2.value;

        var sched1Tin3 = d.getElementById('frm2200S:txtSched1TIN3');
        var tin3 = d.getElementById('frm2200S:txtTIN3');
        sched1Tin3.value = tin3.value;

        var sched1BCode = d.getElementById('frm2200S:txtSched1BranchCode');
        var bcode = d.getElementById('frm2200S:txtBranchCode');
        sched1BCode.value = bcode.value;

        var sched1TpName = d.getElementById('frm2200S:txtSched1TaxpayerName');
        var tpName = d.getElementById('frm2200S:taxpayerName');
        sched1TpName.value = tpName.value;        
        
              sched1Temp = $("#modalSched1").html();
              $("#modalSched1").animate({ scrollTop: 0 }, 0);
      }else if(d.getElementById('frm2200S:chkPymntManner_2').checked) {
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
        while(x < 10){
            fields = fields + getBeverages(x);
      // MarkP.

            fields = fields + "<td align='center' width='22%'><input type='text' style='text-align:right' name='frm2200S:txtSalesValue" + x + "' id='frm2200S:txtSalesValue" + x + "' value='0.00' maxlength='25' size='25' onfocus='onFocusIterate(this);' onblur='roundDownWithAlert(this);onBlurIterate(this);' onkeypress='return numbersonly(this, event)'/></td>" +
                "<td align='center' width='22%'><input type='text' style='text-align:right' name='frm2200S:txtVolumeRemovals" + x + "' id='frm2200S:txtVolumeRemovals" + x + "' value='0.00' maxlength='25' size='25' onfocus='onFocusIterate(this);' onblur='roundDownWithAlert(this);computeBasicTaxDue(" + x + ");onBlurIterate(this);' onkeypress='return numbersonly(this, event)' /></td>" +
                "<td align='center' width='27%'><input type='text' name='frm2200S:txtBasicTaxDue" + x + "' id='frm2200S:txtBasicTaxDue" + x + "'style='background-color: rgb(220, 220, 220); text-align:right' value='0.00' maxlength='25' size='25' disabled/></td></tr>";
          
      x++;
        }
    $('#frm2200SBeverages').html(fields);

        
    }

    function getBeverages(indexCount) {
        setATCSchedule1(d.getElementById('frm2200S:txtForYr').value);
        var text = "";
        var atcCode = new Array();
        var description = new Array();
        var rate = new Array();
        var year = (parseInt(d.getElementById('frm2200S:txtForYr').value) - 2017);
        
        if (sched1ATCList.length === 0) {
            switch (indexCount) {
                case 0:
                    atcCode[0] = 'XB010';
                    description[0] = 'a. Sweetened Juice Drinks';
                    rate[0] = 6.00;
                    break;
                case 1:
                    atcCode[1] = 'XB020';
                    description[1] = 'b. Sweetened Tea';
                    rate[1] = 6.00;
                    break;
                case 2:
                    atcCode[2] = 'XB030';
                    description[2] = 'c. Carbonated Beverages';
                    rate[2] = 6.00;
                    break;
                case 3:
                    atcCode[3] = 'XB040';
                    description[3] = 'd. Flavored Water';
                    rate[3] = 6.00;
                    break;
                case 4:
                    atcCode[4] = 'XB050';
                    description[4] = 'e. Energy and Sports Drinks';
                    rate[4] = 6.00;
                    break;
                case 5:
                    atcCode[5] = 'XB060';
                    description[5] = 'f. Powdered Drinks not classified as Milk, Juice, Tea and Coffee';
                    rate[5] = 6.00;
                    break;
                case 6:
                    atcCode[6] = 'XB070';
                    description[6] = 'g. Cereal and Grain Beverages';
                    rate[6] = 6.00;
                    break;
                case 7:
                    atcCode[7] = 'XB080';
                    description[7] = 'h. Other Non-Alcoholic Beverages that contain added Sugar';
                    rate[7] = 6.00;
                    break;
                case 8:
                    atcCode[8] = 'XB090';
                    description[8] = '2. Using purely high fructose corn syrup or in combination with any caloric or non-caloric sweeteners';
                    rate[8] = 12.00;
                    break;
        case 9:
                    atcCode[9] = 'XB100';
                    description[9] = '3. Using purely coconut sap sugar and purely Steviol Glycosides';
                    rate[9] = 0.00;
                    break;
            }
        }
        else {
            for (i = 0; i < 10; i++) {
                atcCode[i] = sched1ATCList[i].atcCode;
                description[i] = sched1ATCList[i].description;
                rate[i] = sched1ATCList[i].rate;
            }
        }

        switch (indexCount) {
                        
           case 0:
                text = "<tr><td align='center' width='9%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='15%' style='text-align: left; padding: 0px 2px;'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='7%'>Per Liter</td>" +
                    "<td align='center' width='6%'> P 6.00 <input type='hidden' name='frm2200S:hideProAppRate" + indexCount + "' id='frm2200S:hideProAppRate" + indexCount + "' value='" + rate[0] + "'></td>";
                break;
            case 1:
                text = "<tr><td align='center' width='9%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='15%' style='text-align: left; padding: 0px 2px;'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='7%'>Per Liter</td>" +
                    "<td align='center' width='6%'> P 6.00 <input type='hidden' name='frm2200S:hideProAppRate" + indexCount + "' id='frm2200S:hideProAppRate" + indexCount + "' value='" + rate[1] + "'></td>";
                break;
            case 2:
                text = "<tr><td align='center' width='9%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='15%' style='text-align: left; padding: 0px 2px;'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='7%'>Per Liter</td>" +
                    "<td align='center' width='6%'> P 6.00 <input type='hidden' name='frm2200S:hideProAppRate" + indexCount + "' id='frm2200S:hideProAppRate" + indexCount + "' value='" + rate[2] + "'></td>";
                break;
            case 3:
                text = "<tr><td align='center' width='9%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='15%' style='text-align: left; padding: 0px 2px;'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='7%'>Per Liter</td>" +
                    "<td align='center' width='6%'> P 6.00 <input type='hidden' name='frm2200S:hideProAppRate" + indexCount + "' id='frm2200S:hideProAppRate" + indexCount + "' value='" + rate[3] + "'></td>";
                break;
            case 4:
                text = "<tr><td align='center' width='9%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='15%' style='text-align: left; padding: 0px 2px;'>" + description[indexCount] + "</td>" +
          "<td align='center' width='7%'>Per Liter</td>" +
                    "<td align='center' width='6%'> P 6.00 <input type='hidden' name='frm2200S:hideProAppRate" + indexCount + "' id='frm2200S:hideProAppRate" + indexCount + "' value='" + rate[4] + "'></td>";
                break;
            case 5:
                text = "<tr><td align='center' width='9%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='15%' style='text-align: left; padding: 0px 2px;'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='7%'>Per Liter</td>" +
                    "<td align='center' width='6%'> P 6.00 <input type='hidden' name='frm2200S:hideProAppRate" + indexCount + "' id='frm2200S:hideProAppRate" + indexCount + "' value='" + rate[5] + "'></td>";
                break;
            case 6:
                text = "<tr><td align='center' width='9%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='15%' style='text-align: left; padding: 0px 2px;'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='7%'>Per Liter</td>" +
                    "<td align='center' width='6%'> P 6.00 <input type='hidden' name='frm2200S:hideProAppRate" + indexCount + "' id='frm2200S:hideProAppRate" + indexCount + "' value='" + rate[6] + "'></td>";
                break;
            case 7:
                text = "<tr><td align='center' width='9%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='15%' style='text-align: left; padding: 0px 2px;'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='7%'>Per Liter</td>" +
                    "<td align='center' width='6%'> P 6.00 <input type='hidden' name='frm2200S:hideProAppRate" + indexCount + "' id='frm2200S:hideProAppRate" + indexCount + "' value='" + rate[7] + "'></td>";
                break;      
            case 8:
                text = "<tr><td align='center' width='9%'>" + atcCode[indexCount] + "</td>" +
                    "<td align='center' width='15%' style='text-align: left; padding: 0px 2px;'>" + description[indexCount] + "</td>" +
                    "<td align='center' width='7%'>Per Liter</td>" +
                    "<td align='center' width='6%'> P 12.00 <input type='hidden' name='frm2200S:hideProAppRate" + indexCount + "' id='frm2200S:hideProAppRate" + indexCount + "' value='" + rate[8] + "'></td>";
                break;
            case 9:
               text = "<tr><td align='center' width='9%'>" + atcCode[indexCount] + "</td>" +
                   "<td align='center' width='15%' style='text-align: left; padding: 0px 2px;'>" + description[indexCount] + "</td>" +
                   "<td align='center' width='7%'></td>" +
                   "<td align='center' width='6%'> Exempt <input type='hidden' name='frm2200S:hideProAppRate" + indexCount + "' id='frm2200S:hideProAppRate" + indexCount + "' value='" + rate[9] + "'></td>";
               break;

        }
        return text;
    }
  

    function isValidDataOnSched1(){
    
    var sched1FieldRows = d.getElementById('frm2200SadditionalSched1').rows.length;
    var index = 0;

    if (sched1FieldRows > 0 && !isReload) {
      while (index < sched1FieldRows) {
      var atc = $.trim(d.getElementById('frm2200S:txtsched1Atc' + index).value),
        desc = $.trim(d.getElementById('frm2200S:txtsched1Desc' + index).value),
        taxBracket = $.trim(d.getElementById('frm2200S:txtsched1TaxBracket' + index).value),
        taxRate =  $.trim(d.getElementById('frm2200S:txtsched1AppTaxRate' + index).value),
        taxBase = $.trim(d.getElementById('frm2200S:txtsched1VolumeRemovals' + index).value);

      if ((atc == "" || $.trim(atc) == "XB")) {
          alert("Please enter a valid ATC in " + '"' + "Others" + '"' + " at Row " + (index + 1) + ".");
        d.getElementById('frm2200S:txtsched1Atc'+ index).focus();
          return false;
      }
      else if (atc != "") {
          d.getElementById('frm2200S:txtsched1Atc' + index).value = atc.toUpperCase();

          if (atc.toUpperCase().substring(0, 2) != "XB") {
              alert("The supplied ATC code in " + '"' + "Others" + '"' + " at Row " + (index + 1) + " should start with 'XB'.");
          d.getElementById('frm2200S:txtsched1Atc'+ index).focus();
              return false;
          }else if(atc == "XB010" || atc == "XB020" || atc == "XB030" || atc == "XB040" || atc == "XB050" || atc == "XB060" || atc == "XB070" || atc == "XB080" || atc == "XB090" || atc == "XB100"){
          alert("Please enter a valid ATC code in " + '"' + "Others" + '"' + " at Row " + (index + 1) + ".\n\nAdded ATC code should be differ from table.");
          d.getElementById('frm2200S:txtsched1Atc'+ index).focus();
              return false;
        }
      } 
      
      if (desc === "") {
          alert("Please enter a Description in " + '"' + "Others" + '"' + " at Row " + (index + 1) + ".");
        d.getElementById('frm2200S:txtsched1Desc'+ index).focus();
          return false;
      } 
      else if (taxBracket === "") {
          alert("Please enter a Tax Bracket in " + '"' + "Others" + '"' + " at Row " + (index + 1) + ".");
        d.getElementById('frm2200S:txtsched1TaxBracket'+ index).focus();
          return false;
      } 
      else if (taxRate == 0.00) { 
          alert("Please enter a valid Applicable rate in " + '"' + "Others" + '"' + " at Row " + (index + 1) + ".");
        d.getElementById('frm2200S:txtsched1AppTaxRate'+ index).focus();
          return false;
      } 
      else if (taxBase == 0.00) {
          alert("Please enter a value on Volume Removals column in " + '"' + "Others" + '"' + " at Row " + (index + 1) + ".");
        d.getElementById('frm2200S:txtsched1VolumeRemovals'+ index).focus();
          return false;
      } 
      else {
          if (checkTaxRate($.trim(atc), $.trim(taxRate))) {
              alert("Please enter a unique Applicable rate in " + '"' + "Others" + '"' + " at Row " + (index + 1) + ".");
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
        var sched1Field = d.getElementById('frm2200SadditionalSched1');
        addRow(sched1Field, sched1Fields());
    } 
  
    function addFieldsForSched1()
    {
        var sched1Field = d.getElementById('frm2200SadditionalSched1');
        if(isValidDataOnSched1()){
            addRow(sched1Field, sched1Fields());
        }
    }

    function addRow(tbody, text) {

        $('#frm2200SadditionalSched1').append(text);

        $('#frm2200SadditionalSched1 tr:last input').bind('paste drag drop', function (e) {
            e.preventDefault();
        });
    }

    function sched1Fields() {
        var sched1FieldRows = d.getElementById('frm2200SadditionalSched1').rows.length;
        sched1Index = sched1FieldRows;

        var fields = "";
        fields = "<tr><td align='center' width='2%'><input type='checkbox' id='frm2200S:sched1Chk" + sched1Index + "' value='' /></td>" +
            "<td align='center' width='6%'><input type='text' name='frm2200S:txtsched1Atc[]' id='frm2200S:txtsched1Atc" + sched1Index + "' size='5' value='XB' maxlength='5' onfocus='onFocusIterate(this);' onblur='checkIfValidValues(this);onBlurIterate(this);checkATCValue(this);capitalize(this);otherRateCheck(" + sched1Index + ");' onkeypress='return letternumber(event)'/></td>" +
            "<td align='center' width='14%'><input type='text' name='frm2200S:txtsched1Desc[]'  id='frm2200S:txtsched1Desc" + sched1Index + "' size='18' value='' onfocus='onFocusIterate(this);' onblur='checkIfValidValues(this);onBlurIterate(this);' onkeypress='return Name(this, event)'/></td>" +
            "<td align='center' width='10%'><input type='text' name='frm2200S:txtsched1TaxBracket[]'  id='frm2200S:txtsched1TaxBracket" + sched1Index + "' size='11' value='' onfocus='onFocusIterate(this);' onblur='checkIfValidValues(this);onBlurIterate(this);' onkeypress='return Name(this, event)'/></td>" +
            "<td align='center' width='6%'><input type='text'  name='frm2200S:txtsched1AppTaxRate[]' style='text-align:right' id='frm2200S:txtsched1AppTaxRate" + sched1Index + "' maxlength='6' size='5' value='0.00' onblur='setApplicableTaxrate(this);otherRateCheck(" + sched1Index + "); computeSched1BasicTaxDue(" + sched1Index + ");onBlurIterate(this);' onfocus='onFocusIterate(this);' onkeypress='return numbersonly(this, event)'/></td>" +
            "<td align='center' width='22%'><input type='text' name='frm2200S:txtsched1SalesValue[]'  style='text-align:right' id='frm2200S:txtsched1SalesValue" + sched1Index + "' maxlength='25' size='25' value='0.00' onblur='roundDownWithAlert(this);onBlurIterate(this);' onkeypress='return numbersonly(this, event)' onfocus='onFocusIterate(this);'/></td>" +
            "<td align='center' width='22%'><input type='text' name='frm2200S:txtsched1VolumeRemovals[]'  style='text-align:right' id='frm2200S:txtsched1VolumeRemovals" + sched1Index + "' maxlength='25' size='25' value='0.00' onblur='roundDownWithAlert(this);computeSched1BasicTaxDue(" + sched1Index + ");onBlurIterate(this);' onkeypress='return numbersonly(this, event)' onfocus='onFocusIterate(this);'  onkeypress='return numbersonly(this, event)'/></td>" +
            "<td align='center' width='19%'><input type='text' name='frm2200S:txtsched1BasicTaxDue[]'  style='text-align:right' id='frm2200S:txtsched1BasicTaxDue" + sched1Index + "'style='background-color: rgb(220, 220, 220)' maxlength='25' size='25' value='0.00' onfocus='onFocusIterate(this);' onblur='onBlurIterate(this);' disabled/></td></tr>";

        dynamicTimeOut(sched1Index);    
        //sched1Index++;  
        return fields;
    }

    function dynamicTimeOut(index)
    {   
    var waitString = "setInputTextControl_NumberFormatter('frm2200S:txtsched1AppTaxRate" + index + "', 5, 2);" +
      "setInputTextControl_NumberFormatter('frm2200S:txtsched1SalesValue" + index + "', 25, 2);" +
      "setInputTextControl_NumberFormatter('frm2200S:txtsched1VolumeRemovals" + index + "', 25, 2);" +
      "setInputTextControl_NumberFormatter('frm2200S:txtsched1BasicTaxDue" + index + "', 25, 2);";

    waitstr = setTimeout(waitString, 100);
    }

    function deleteFieldForSched1() {
        var sched1Field = d.getElementById('frm2200SadditionalSched1'),
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

        // If there are rows to delete, delete them starting from the last item
        // then fix the ids of the input elements of the 'frm2200AadditionalSched1' table
        if (rowsToDelete.length > 0) {
            for (indexCtr = (rowsToDelete.length - 1); indexCtr >= 0; indexCtr--) {
                sched1Field.deleteRow(rowsToDelete[indexCtr]);
            }

            sched1Input();
        }else{
      if(sched1FieldRows <= 1){
        alert("First row cannot be deleted.");
      }else{
        alert("Please check your selected rows to be deleted!");
      }
    }
    }

    function sched1Input() {
        var sched1Field = d.getElementById('frm2200SadditionalSched1'),
      sched1FieldRows = sched1Field.rows.length, indexCtr;

        for (indexCtr = 1; indexCtr < sched1FieldRows; indexCtr++) {
            var sched1FieldInputs = sched1Field.rows[indexCtr].getElementsByTagName('input');

            // Checkbox
            sched1FieldInputs[0].id = "frm2200S:sched1Chk" + indexCtr;

            // ATC textbox
            sched1FieldInputs[1].id = "frm2200S:txtsched1Atc" + indexCtr;
            sched1FieldInputs[1].onblur = addBlurEventSchedule1(sched1FieldInputs[1], parseInt(indexCtr));

            // Description textbox
            sched1FieldInputs[2].id = "frm2200S:txtsched1Desc" + indexCtr;

            // Tax Bracket textbox
            sched1FieldInputs[3].id = "frm2200S:txtsched1TaxBracket" + indexCtr;

            // Applicable Rate textbox
            sched1FieldInputs[4].id = "frm2200S:txtsched1AppTaxRate" + indexCtr;
            sched1FieldInputs[4].onblur = addBlurEventSchedule1(sched1FieldInputs[4], parseInt(indexCtr));

            // Exempt textbox
            sched1FieldInputs[5].id = "frm2200S:txtsched1SalesValue" + indexCtr;

            // Taxable textbox
            sched1FieldInputs[6].id = "frm2200S:txtsched1VolumeRemovals" + indexCtr;
            sched1FieldInputs[6].onblur = addBlurEventSchedule1(sched1FieldInputs[6], parseInt(indexCtr));

            // Excise Tax Due textbox
            sched1FieldInputs[7].id = "frm2200S:txtsched1BasicTaxDue" + indexCtr;
        }

        totalTaxDue(0,"DUMMY"); 
    }

  // Compute basic tax due in schedule1 modal
    function computeBasicTaxDue(index)
    {
        var total = 0.0;

        total = roundDownComputation((NumWithComma(d.getElementById('frm2200S:hideProAppRate' + index).value) * 1) * (NumWithComma(d.getElementById('frm2200S:txtVolumeRemovals' + index).value) * 1));
        if (total.length > 18) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Basic Excise Tax Due.");
            d.getElementById('frm2200S:txtSalesValue' + index).value = "0.00";
            d.getElementById('frm2200S:txtVolumeRemovals' + index).value = "0.00";
            d.getElementById('frm2200S:txtBasicTaxDue' + index).value = "0.00";
            d.getElementById('frm2200S:txtVolumeRemovals' + index).focus();
        }
        else {
            d.getElementById('frm2200S:txtBasicTaxDue' + index).value = total;
        }

        totalTaxDue(index, "beverage");
    }

    function computeSched1BasicTaxDue(index)
    {
        var total = 0.0;
        var rowOthers = $('#frm2200SadditionalSched1').find('tr');
        var atc = d.getElementById('frm2200S:txtsched1Atc' + index).value;
        var rate = d.getElementById('frm2200S:txtsched1AppTaxRate' + index).value;
        
        total = roundDownComputation(rate * (NumWithComma(d.getElementById('frm2200S:txtsched1VolumeRemovals' + index).value)));
        if (total.length > 18) {

            var inputs = $(rowOthers[index]).find('input');

            alert("Exceeded maximum amount of 999,999,999,999.99 on Basic Excise Tax Due.");
            for (x = 0; x < inputs.length; x++) {
                if (x == 1) {
                    inputs[x].value = "XB";
                }
                else if (x == 2 || x == 3) {
                    inputs[x].value = "";
                }
                else {
                    inputs[x].value = "0.00";
                }
            }

            d.getElementById('frm2200S:txtsched1Taxable' + index).focus();
        }
        else {
            d.getElementById('frm2200S:txtsched1BasicTaxDue' + index).value = total;
        }
        totalTaxDue(index,"others");
    }
  
    function totalTaxDue(index, part) {
        if (!isPrintingOthers) {
            var total = 0.0;
            var x = 0;

            var rowBeverage = $('#frm2200SBeverages').find('tr');
            var rowOthers = $('#frm2200SadditionalSched1').find('tr');

            while (x <= 8) {
                total = (total + (NumWithComma(d.getElementById('frm2200S:txtBasicTaxDue' + x).value)));
                x++;
            }

            x = 0;
            while (x < d.getElementById("frm2200SadditionalSched1").rows.length) {
                total = (total * 1) + (NumWithComma(d.getElementById('frm2200S:txtsched1BasicTaxDue' + x).value) * 1);
                x++;
            }

            var item16 = (NumWithComma(d.getElementById('frm2200S:txtTax16').value) * 1);
            var item26 = (NumWithComma(d.getElementById('frm2200S:txtTax24').value) * 1);
            var id = (part == 'beverage') ? "frm2200S:txtProTaxable" : ((part == 'inspection') ? "frm2200S:txtInsTaxable" : "frm2200S:txtsched1Taxable");
            var item26Total = ((item26 - item16) + total);
            var isExceedItem26 = (roundDownComputation(item26Total).toString().replace(/-/g, '').length > 18) ? true : false;

            d.getElementById('frm2200S:totalTaxDue').value = roundDownComputation(total);

            if (roundDownComputation(total).toString().length > 18 || (isExceedItem26 && total != 0)) {
                if (roundDownComputation(total).toString().length > 18) {
                    alert("Exceeded maximum amount of 999,999,999,999.99 on Total Tax Due.");
                } else if (isExceedItem26 && total != 0) {
                    alert("Exceeded maximum amount of 999,999,999,999.99 on Item 26 Balance to be Carried Over to Next Return.");
                }

                if (part == "beverage") {
                    var inputs = $(rowBeverage[index]).find('input');
                    total = total - parseFloat(NumWithComma(inputs[inputs.length - 1].value));
                    d.getElementById('frm2200S:totalTaxDue').value = roundDownComputation(total);
                    for (x = 1; x < inputs.length; x++) {
                        inputs[x].value = "0.00";
                    }
                }
              
                else {
                    var inputs = $(rowOthers[index]).find('input');
                    total = total - parseFloat(NumWithComma(inputs[inputs.length - 1].value));
                    d.getElementById('frm2200S:totalTaxDue').value = roundDownComputation(total);
                    for (x = 0; x < inputs.length; x++) {
                        if (x == 1) {
                            inputs[x].value = "XB";
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
  
  //When clicking OK on Schedule1 modal
    function sched1OK(hideEffect) {
        if (d.getElementById('frm2200S:chkPymntManner_1').checked) {
            var isValid = $.trim(d.getElementById('frm2200S:txtsched1Atc0').value) == "XB" && $.trim(d.getElementById('frm2200S:txtsched1Desc0').value) == "" && $.trim(d.getElementById('frm2200S:txtsched1TaxBracket0').value) == "" && $.trim(d.getElementById('frm2200S:txtsched1AppTaxRate0').value) == "0.00" && $.trim(d.getElementById('frm2200S:txtsched1SalesValue0').value) == "0.00" && $.trim(d.getElementById('frm2200S:txtsched1VolumeRemovals0').value) == "0.00";
      if (isValid || isValidDataOnSched1()) {
                d.getElementById('frm2200S:txtTax16').value = d.getElementById('frm2200S:totalTaxDue').value;
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

        total = ((NumWithComma(d.getElementById('frm2200S:txtTax17A').value)*1) + (NumWithComma(d.getElementById('frm2200S:txtTax17B').value)*1));

        d.getElementById('frm2200S:txtTax17C').value = roundDownComputation(total);

        compute18(sender);
    }

    function compute18(sender)
    {
        var total = 0.0;

        total = ((NumWithComma(d.getElementById('frm2200S:txtTax16').value)*1) - (NumWithComma(d.getElementById('frm2200S:txtTax17C').value)*1));

        d.getElementById('frm2200S:txtTax18').value = roundDownComputation(total);

        compute20(sender);
    }

    function compute20(sender)
    {
        var total = 0.0;

        total = roundDownComputation((NumWithComma(d.getElementById('frm2200S:txtTax18').value) * 1) - (NumWithComma(d.getElementById('frm2200S:txtTax19').value) * 1));

        d.getElementById('frm2200S:txtTax20').value = total;

        if (total.toString().replace(/-/g, '').length > 18) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Item 22 Tax Still Due/Overpayment.");

            if (typeof sender === "object") {
                sender.value = "0.00";
                sender.onblur();
                sender.focus();
            } else if (d.getElementById('frm2200S:txtTax17A').value !== "0.00") {
                d.getElementById('frm2200S:txtTax17A').value = "0.00";
                d.getElementById('frm2200S:txtTax17A').onblur();
            } else if (!d.getElementById('frm2200S:txtTax19').disabled && d.getElementById('frm2200S:txtTax19').value !== "0.00") {
                d.getElementById('frm2200S:txtTax19').value = "0.00";
                d.getElementById('frm2200S:txtTax19').onblur();
            } 
        } else {
            compute22(sender);
        }
    }
  function compute21D(sender) {

      var total = 0.00;

      total = roundDownComputation(NumWithComma(d.getElementById('frm2200S:txtTax21A').value) * 1 + NumWithComma(d.getElementById('frm2200S:txtTax21B').value) * 1 + NumWithComma(d.getElementById('frm2200S:txtTax21C').value) * 1);
      
        d.getElementById('frm2200S:txtTax21D').value = total;

        if (total.toString().replace(/-/g, '').length > 18 && typeof sender === "object") {
          alert("Exceeded maximum amount of 999,999,999,999.99 on Item 23D Total Penalties.");
          sender.value = "0.00";
          sender.onblur();
          sender.focus();
      } else {
          d.getElementById('frm2200S:PayPenalties').checked = total != 0.00 ? true : false;

          payPenalties(sender);
          compute22(sender);
      }
  }
  function payPenalties(sender)
  {
    if(d.getElementById('frm2200S:PayPenalties').checked){
      d.getElementById('frm2200S:txtTax23B').value = d.getElementById('frm2200S:txtTax21D').value;
    }
    else{
      d.getElementById('frm2200S:txtTax23B').value = "0.00";
    }
    compute23C(sender);
  }
    function compute22(sender)
    {
        var total = 0.0;

        total = ((NumWithComma(d.getElementById('frm2200S:txtTax20').value)*1) + (NumWithComma(d.getElementById('frm2200S:txtTax21D').value)*1));
    //total = formatCurrency((NumWithComma(d.getElementById('frm2200S:txtTax20').value)*1));
        total = roundDownComputation(total);

        d.getElementById('frm2200S:txtTax22').value = total;

        if (total.toString().replace(/-/g, '').length > 18) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Item 24 Amount Payable.");

            if (typeof sender === "object") {
                d.getElementById('frm2200S:txtTax22').value = roundDownComputation((NumWithComma(total) * 1) - (NumWithComma(sender.value) * 1));
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

        total = ((NumWithComma(d.getElementById('frm2200S:txtTax23A').value)*1) + (NumWithComma(d.getElementById('frm2200S:txtTax23B').value)*1));

        d.getElementById('frm2200S:txtTax23C').value = roundDownComputation(total);

        compute24(sender);
    }

    function compute24(sender)
    {
        var total = 0.0;

        total = ((NumWithComma(d.getElementById('frm2200S:txtTax22').value)*1) - (NumWithComma(d.getElementById('frm2200S:txtTax23C').value)*1));

        total = roundDownComputation(total);

        d.getElementById('frm2200S:txtTax24').value = total;
        
        if (total.toString().replace(/-/g, '').length > 18) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Item 26 Balance to be Carried Over to Next Return.");

            if (typeof sender === "object" && sender.id == 'frm2200S:PayPenalties') {
                d.getElementById('frm2200S:txtTax23B').value = "0.00";
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
    var isLeap = new Date(document.getElementById('frm2200S:txtForYr').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm2200S:txtMonth1').value==2 && document.getElementById('frm2200S:txtDate').value==29) {
      alert("Filing year is not a leap year.");
      return;
    }
    if (!isLeap && document.getElementById('frm2200S:txtMonth1').value==2 && document.getElementById('frm2200S:txtDate').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    if (isLeap && document.getElementById('frm2200S:txtMonth1').value==2 && document.getElementById('frm2200S:txtDate').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
        
    if(d.getElementById('frm2200S:txtDate').value == "" || d.getElementById('frm2200S:txtDate').value*1 == 0)
        {
            alert("Please enter valid day on item 1.");
            return;
        }
    if(d.getElementById('frm2200S:txtForYr').value == "")
        {
            alert("Please enter valid year on item 1.");
            return;
        } 
          
        if(d.getElementById('frm2200S:txtForYr').value*1 < 2013)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        } 
        if(d.getElementById('frm2200S:txtDate').value == "")
        {
            alert("Please indicate a valid Day.")
            return;
        }
    if(d.getElementById('frm2200S:txtDate').value.length == 1)
        {
            alert("Please enter a valid day on item 1. Format should be MM/DD/YYYY.")
            return;
        }
    
    
    if(d.getElementById('frm2200S:txtDate').value < 1){
            alert("Please enter a valid day in Item 1.");
            return;
        }


    //Check if valid date
    var month31 = (['01', '03', '05', '07', '08', '10', '12']);
    var month30 = (['04', '06', '09', '11']);
    var month = document.getElementById('frm2200S:txtMonth1').value
    if (month31.contains(month) && document.getElementById('frm2200S:txtDate').value > 31)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    else if (month30.contains(month) && document.getElementById('frm2200S:txtDate').value > 30)
    {
      alert("Invalid date entry on Item no.1.");
      return;
        }

        // Check if date is not future date
          var item1Date = new Date(d.getElementById('frm2200S:txtForYr').value, (d.getElementById('frm2200S:txtMonth1').value) - 1, d.getElementById('frm2200S:txtDate').value);
          if (item1Date > dt) {
            alert("Date on Item 1 cannot be a future date.");
            return;
        }

    //dgarfin 05/17/2012: For phase II only. 
    //Introduce simple form validation for the Background Information Section fields 
    //since this section will be enabled for user input.  No further validation/lookup on these section since it's offline
        if( (d.getElementById('frm2200S:txtTIN1').value == "" || d.getElementById('frm2200S:txtTIN2').value == "" || d.getElementById('frm2200S:txtTIN3').value == "" || d.getElementById('frm2200S:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 4.");
            return;
        }   
           
        if ((d.getElementById('frm2200S:taxpayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 6.");
            return;
        }
         if ((d.getElementById('frm2200S:txtAddress').value == "")) {
            alert("Please enter Taxpayer's Registered Address on Item 7.");
            return;
        }
        if ((d.getElementById('frm2200S:txtZipCode').value == "") || (d.getElementById('frm2200S:txtZipCode').value.length < 4)) {
            alert("Please enter Taxpayer's Zip Code on Item 7A.");
            return;
        }
        if ((d.getElementById('frm2200S:txtTelNum').value == "")) {
            alert("Please enter Contact Number on Item 8.");
            return;
        }
        if( (d.getElementById('frm2200S:txtLineBus').value == "")  )
        {
            alert("Please enter a valid Main Line of Business on Item 9.");
            return;
        }
        if ((d.getElementById('frm2200S:txtPSIC').value == "" || (d.getElementById('frm2200S:txtPSIC').value).length < 4))
        {
            alert("Please enter a valid PSIC on Item 10.");
            return;
        }
        if ((d.getElementById('txtEmail').value == "")) {
            alert("Please enter Email Address on Item 11.");
            return;
        }         
        if(d.getElementById('frm2200SoptRegion').selectedIndex < 1 || d.getElementById('frm2200SoptProvince').selectedIndex < 1 ||
            d.getElementById('frm2200SoptCity').selectedIndex < 1) // || d.getElementById('frm2200S:txtPlaceofProd').value == ""
        {
            alert("Please enter values on item no. 12. All entries must not be empty.")
            return;
        } 
        if(d.getElementById('frm2200SoptRegion1').selectedIndex < 1 || d.getElementById('frm2200SoptProvince1').selectedIndex < 1 ||
            d.getElementById('frm2200SoptCity1').selectedIndex < 1) //|| d.getElementById('frm2200S:txtPlaceofRem').value == ""
        {
            alert("Please enter values on item no. 13. All entries must not be empty.")
            return;
        }

        if (d.getElementById('frm2200S:optTreaty_1').checked && d.getElementById('frm2200S:lstTaxTreaty').value == 0) {
            alert("Please select If yes, please specify on Item 14A.");
            return;
        }

        if(!d.getElementById('frm2200S:chkPymntManner_1').checked && !d.getElementById('frm2200S:chkPymntManner_2').checked) {
            alert("Please select an option on Part II Manner of Payment");
            return;
        }
        if (d.getElementById('frm2200S:chkPymntManner_3').checked && d.getElementById('frm2200S:txtOthMannerofPymnt').value == "") {
            alert("Please enter a value on Item 17.");
            return;
        }
       
        var tax22 =  parseFloat(NumWithComma(d.getElementById("frm2200S:txtTax22").value));
        var tax23A = parseFloat(NumWithComma(d.getElementById("frm2200S:txtTax23A").value));
       
        if (d.getElementById('frm2200S:chkPymntManner_2').checked && tax23A <= 0) { //&& tax22 > 0
            alert("Please enter Tax Payment / Deposit on Item 25A.")
            return;
        }

        //Added as of 05/12/2014 based on SRS new requirement
        var tax24total = parseFloat("" + d.getElementById('frm2200S:txtTax24').value);
        if(tax24total > 0) {
            alert("Payment not sufficient to cover amount payable. Please check amount in Item 25C.");
                d.getElementById("frm2200S:txtTax23A").focus();
            
            return;
        }

        //05/29/2014 Bug #3732
        var isValidSched1 = validateSchedule1();
        if (!isValidSched1) {
            d.getElementById("frm2200S:btnSchedule1").onclick();
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

      d.getElementById('frm2200S:cmdValidate').disabled = false;
      d.getElementById('frm2200S:cmdEdit').disabled = true;
      d.getElementById('frm2200S:btnFinalCopy').disabled = true;
      d.getElementById('btnUpload').disabled = true;
      d.getElementById('btnPrint').disabled = true;
      document.getElementById('frm2200S:btnPrintPreview').disabled = true;
        
        setEnabledBackgroundColor();
    d.getElementById('frm2200S:txtTIN1').disabled = true;
      d.getElementById('frm2200S:txtTIN2').disabled = true;
    d.getElementById('frm2200S:txtTIN3').disabled = true;
    d.getElementById('frm2200S:txtBranchCode').disabled = true; 
    document.getElementById('txtEmail').disabled = true;
    }
    
  var disableElem = true;
  var enableElem = false;
    function enabledDisabled(param)
  {
        
        d.getElementById('frm2200S:amendedRtn_1').disabled = param;
        d.getElementById('frm2200S:amendedRtn_2').disabled = param;
        d.getElementById('frm2200S:txtMonth1').disabled = param;
        d.getElementById('frm2200S:txtDate').disabled = param;
        d.getElementById('frm2200S:txtForYr').disabled = param;
    d.getElementById('frm2200S:txtSheets').disabled = true;
        d.getElementById('frm2200SoptRegion').disabled = param;
        d.getElementById('frm2200SoptProvince').disabled = param;
        d.getElementById('frm2200SoptCity').disabled = param;
        d.getElementById('frm2200SoptRegion1').disabled = param;
        d.getElementById('frm2200SoptProvince1').disabled = param;
        d.getElementById('frm2200SoptCity1').disabled = param;
        d.getElementById('frm2200S:optTreaty_1').disabled = param;
        d.getElementById('frm2200S:optTreaty_2').disabled = param;


        if(d.getElementById('frm2200S:optTreaty_1').checked){
            d.getElementById('frm2200S:lstTaxTreaty').disabled = param;
        }

        d.getElementById('frm2200S:chkPymntManner_1').disabled = param;
        d.getElementById('frm2200S:chkPymntManner_2').disabled = param;

        if (d.getElementById('frm2200S:chkPymntManner_2').checked) {

            d.getElementById('frm2200S:btnSchedule1').disabled = true;
            d.getElementById('frm2200S:PayPenalties').disabled = true;
            dateMonthYear();
        }
        if (d.getElementById('frm2200S:chkPymntManner_2').checked && d.getElementById('frm2200S:chkPymntManner_3').checked) {
            d.getElementById('frm2200S:txtOthMannerofPymnt').disabled = false;
        }
        if (d.getElementById('frm2200S:chkPymntManner_2').checked && !d.getElementById('frm2200S:chkPymntManner_3').checked) {
            d.getElementById('frm2200S:txtOthMannerofPymnt').disabled = true;
        }

        //d.getElementById('frm2200S:btnSchedule1').disabled = param;
        d.getElementById('frm2200S:txtTax17A').disabled = param;

        if (d.getElementById('frm2200S:amendedRtn_2').checked) {
            d.getElementById('frm2200S:txtTax23A').disabled = param;
        }

        d.getElementById("frm2200S:txtTax19").disabled = param;

        if(!param) {
            if(d.getElementById("frm2200S:amendedRtn_1").checked) {
                d.getElementById("frm2200S:txtTax19").disabled = false;
            } else {
                d.getElementById("frm2200S:txtTax19").disabled = true;
            }
        }

        if (param) {
            //Added as of 4/30/2014
            getEnabledText();
            if (!d.getElementById('frm2200S:cmdValidate').disabled) {
                getDisabledText();
            }

            $("input:text", $("#frmMain")).attr("disabled", true);
            $("input:radio", $("#frmMain")).attr("disabled", true);
            $("input:checkbox", $("#frmMain")).attr("disabled", true);
            $("input:button", $("#frmMain")).attr("disabled", true);
            $("select", $("#frmMain")).attr("disabled", true);
            $(".enabledButton").attr("disabled", false);

            if (!gIsReadOnly) {
                d.getElementById('frm2200S:cmdValidate').disabled = true;
                d.getElementById('frm2200S:cmdEdit').disabled = false;
                d.getElementById('frm2200S:btnFinalCopy').disabled = false;
                d.getElementById('btnUpload').disabled = false;
                //Added as of 04/29/2014 (based on 1700's series)
                d.getElementById('btnSave').disabled = false;
                d.getElementById('btnPrint').disabled = false;
                document.getElementById('frm2200S:btnPrintPreview').disabled = false;
            }
            else if (gIsReadOnly) {
                d.getElementById('btnUpload').disabled = false;
                d.getElementById('btnPrint').disabled = false;
                document.getElementById('frm2200S:btnPrintPreview').disabled = false;
            }
        }

    disableElem;
    enableElem;
    
    
    }
  
  function getRdo()
    {
        var data = "<select class='iceSelOneMnu' id='frm2200S:txtRDOCode' name='frm2200S:txtRDOCode' size='1' disabled><option value='000'> </option>";
    
    for(var i = 0; i < rdoList.length; i++) {
        var rdo = rdoList[i];
        data = data + "<option value='" + rdo.rdoCode + "'>" + rdo.description + "</option>";
     
      }
    data = data + "</select>"
    
    $('#rdoSelect').html(data);  
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
    var isLeap = new Date(document.getElementById('frm2200S:txtForYr').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm2200S:txtMonth1').selectedIndex==1 && document.getElementById('frm2200S:txtDate').value>28) {
      alert("Filing year is not a leap year.");
      return;
    }
    
    if (isLeap && document.getElementById('frm2200S:txtMonth1').selectedIndex==1 && document.getElementById('frm2200S:txtDate').value>29) {
      alert("Invalid date entry.");
      return;
    }
    
    if(d.getElementById('frm2200S:txtDate').value == "" || d.getElementById('frm2200S:txtDate').value*1 == 0)
        {
            alert("Please enter valid day on item 1.");
            return;
        }
    if(d.getElementById('frm2200S:txtForYr').value == "")
        {
            alert("Please enter valid year on item 1.");
            return;
        } 
        if(d.getElementById('frm2200S:txtForYr').value*1 < 1900)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        } 
        if(d.getElementById('frm2200S:txtDate').value*1 > 31 || d.getElementById('frm2200S:txtDate').value == "")
        {
            alert("Please indicate a valid Day.")
            return;
        }

    if( (d.getElementById('frm2200S:txtTIN1').value == "" || d.getElementById('frm2200S:txtTIN2').value == "" || d.getElementById('frm2200S:txtTIN3').value == "" || d.getElementById('frm2200S:txtBranchCode').value == "")  )
    {
      alert("Please enter a valid TIN number on Item 4.");
      return false;
        }

        if ((d.getElementById('frm2200S:taxpayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 6.");
            return false;
        }
      
        //Registered Address must be valid
        if (d.getElementById('frm2200S:txtAddress').value === "") {
            alert("Please enter a valid Registered Address on Item 7.");
            return false;
        }

    //ZipCode
    if ((d.getElementById('frm2200S:txtZipCode').value == "") || (d.getElementById('frm2200S:txtZipCode').value.length < 4)) {
            alert("Please enter Taxpayer's Zip Code on Item 7A.");
            return;
        }

        //Contact Number must be valid
        if (d.getElementById('frm2200S:txtTelNum').value === "") {
            alert("Please enter a valid Contact Number on Item 8.");
            return false;
        }

        if ((d.getElementById('frm2200S:txtLineBus').value == "")) {
            alert("Please enter a valid Main Line of Business on Item 9.");
            return false;
        }
    return true;
  } 
  
//enable rdo, name, address, contact number if from main screen, it is empty as of 04/28/2014 (Based on 1700's series)
function enableFieldsIfEmptyFromMainScreen(rdoCode, fullname, address, zipCode, contact, lineOfBusiness) {

    if (rdoCode == "000") {
        d.getElementById('frm2200S:txtRDOCode').disabled = false;
    }

    if (fullname.toString() === "") {
        d.getElementById('frm2200S:taxpayerName').disabled = false;
    }

    if (address.toString() === "") {

        d.getElementById('frm2200S:txtAddress').disabled = false;
    }

    if (zipCode.toString() === "" || (zipCode.length < 4)) {

        d.getElementById('frm2200S:txtZipCode').disabled = false;
    }

    if (contact.toString() === "") {

        d.getElementById('frm2200S:txtTelNum').disabled = false;
    }

    if (lineOfBusiness.toString() === "") {

        d.getElementById('frm2200S:txtLineBus').disabled = false;
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
  if (isSchedule1 && d.getElementById('frm2200SadditionalSched1').rows.length > 1) {
    $('#frm2200SBeverages').hide();
    $('.columnHeader').hide();
    $('#frm2200SadditionalSched1 tr:eq(0)').hide();

    $( "#frm2200SadditionalSched1" ).prepend( '<tr class="modalColumnHeader printColumnHeader"><td align="center"  width="2%">&nbsp;</td><td align="center"  width="6%">&nbsp;</td>' +
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

    $("#frm2200SadditionalSched1 input:disabled").attr("disabled", false);
    $("#frm2200SadditionalSched1 input[type='text']").attr("readonly", true).css({ "background-color": "White" });
    $("#frm2200SadditionalSched1 input[type='checkbox']").attr("disabled", true);
    isPrintingOthers = true;
  } else {
    $('#modalSched1').removeClass("printSignFooterClass");
  }

  $('#bg').hide();
  $('.printSignFooterClass').css({ 'width': '94%', 'margin': 'auto', 'margin-top': '40px', 'display': 'block', 'position': 'relative', 'overflow': 'visible', 'page-break-before': 'always', 'background': '#ffffff' });
  $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
  $('#modalSched1').css({ 'width': '800px', 'left': '-25px', 'margin-top': '-100px', 'top': '0' });

  var elems = d.getElementById(currentPageContent).getElementsByTagName("*");

  var i, len = elems.length, tempElem = {}, tempVal = {};
  for (i = 0; i < len; i++) {

    if (elems[i] !== null && elems[i].type !== "undefined" && elems[i].type !== "hidden" && elems[i].type != 'button' && elems[i].id !== "") {
      var elementID = elems[i].id;
      tempElem = $("#" + ((elems[i].id.indexOf('frm2200S:') != -1) ? elems[i].id : elems[i].id.split("frm2200S")[1]));

      if (typeof (tempElem) !== "undefined" || tempElem !== null) {

        if (elems[i].id.indexOf("txtTax") > -1) {
          tempVal = elems[i].value.split(".");
          if (tempVal.length > 0) {
            $("#" + elementID.split(":")[1]).html(tempVal[0]);
            $("#" + elementID.split(":")[1] + "_2").html(tempVal[1]);
          }
        }
        else if (elementID == 'frm2200S:txtAddress') {
          var address = d.getElementById('frm2200S:txtAddress').value;

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
          var drpValue = (elementID.indexOf("frm2200S:") != -1 && elementID.indexOf("lstTaxTreaty") == -1) ? elems[i].value : ((elementID.indexOf("lstTaxTreaty") != -1) ? $("#frm2200S\\:" + elementID.split("frm2200S:")[1] + " option:selected").text() : $("#" + elementID + " option:selected").text());
          elementID = (elementID.indexOf("frm2200S:") != -1) ? elementID.split("frm2200S:")[1] : elementID.split("frm2200S")[1];

          if (d.getElementById(elementID) != null) {
            d.getElementById(elementID).innerHTML = drpValue;
          }
        }
        else if (elems[i].type === "text") {
          if (d.getElementById(elementID.split(":")[1]) != null) {
              if (elementID.split(":")[1] == "txtsched1Atc0") {
                d.getElementById(elementID.split(":")[1]).innerHTML = elems[i].value;
              }
              else {
                d.getElementById(elementID.split(":")[1]).innerHTML = elems[i].value;
              }
          }
          else if (elementID.indexOf("txtPro") != -1 && parseInt(d.getElementById('frm2200S:txtForYr').value) < 2018) {
            d.getElementById(elementID.split(":")[1] + d.getElementById('frm2200S:txtForYr').value).innerHTML = elems[i].value;
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

  $('#printMenu').show('blind');
  if ($('#formMenu').css('display') != 'none') {
    $('#formMenu').hide('blind');
  }

  
}

// ATC CODES
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
        if (atcStr.indexOf('2200S') >= 0) {
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


    function validateDate() {
        var strmmddyyyy = d.getElementById('frm2200S:txtMonth1').value + "/" + d.getElementById('frm2200S:txtDate').value + "/" + d.getElementById('frm2200S:txtForYr').value;
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
           d.getElementById('frm2200S:txtMonth1').selectedIndex = currentDate.getMonth();
           d.getElementById('frm2200S:txtDate').value = currentDateString;
           d.getElementById('frm2200S:txtForYr').value = currentDate.getFullYear();
       }
       else if (inputDate > currentDate) {
           alert('This date cannot be a future date.');
           d.getElementById('frm2200S:txtMonth1').selectedIndex = currentDate.getMonth();
           d.getElementById('frm2200S:txtDate').value = currentDateString;
           d.getElementById('frm2200S:txtForYr').value = currentDate.getFullYear();
       }
       else if (result[2] < 2013) {
           alert('The year cannot be less than 2013.');
           d.getElementById('frm2200S:txtForYr').value = currentDate.getFullYear();
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
       d.getElementById('frm2200S:txtTax16').value = "0.00";
       compute18();
   }
function recomputePaymentActual() {
       d.getElementById('frm2200S:txtTax16').value = d.getElementById('frm2200S:totalTaxDue').value;
       compute18();
   }

    //decimalPlace - decimal places to be rounded off
    function getBeverage(elementID1, elementID2, outputID, decimalPlace, rowIndex) {
        var element1 = NumWithComma(d.getElementById(elementID1).value) * 1;
        var element2 = NumWithComma(d.getElementById(elementID2).value) * 1;

        var beverage = element1 * element2;
        beverage = (decimalPlace == 0) ? formatCurrencyWOC(beverage) : roundDownComputation(beverage);
        //beverage = (decimalPlace == 0) ? formatCurrencyWOC(beverage.toFixed(decimalPlace)) : formatCurrency(beverage.toFixed(decimalPlace));

        d.getElementById(outputID).value = beverage;

        if ((beverage.toString().indexOf(".") != -1 && beverage.length > 18) ||
            (beverage.toString().indexOf(".") == -1 && beverage.length > 15)) {
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
            var rateFieldID = (outputIDSched1.indexOf('Pro') != -1) ? "frm2200S:hideProAppRate" : "frm2200S:hideInsAppRate";
            var rate = parseFloat(d.getElementById(rateFieldID + outputIDSched1.split("Taxable")[1]).value * 1);
            var basicTaxDueID = (outputIDSched1.indexOf('Pro') != -1) ? "frm2200S:txtProBasicTaxDue" : "frm2200S:txtInsBasicTaxDue";
            var formattedTotal = (decimalPlace == 0) ? formatCurrencyWOC(total) : roundDownComputation(total);
            var sched1Total = roundDownComputation((NumWithComma(d.getElementById('frm2200S:totalTaxDue').value) + (total * rate)) - NumWithComma(d.getElementById(basicTaxDueID + outputIDSched1.split("Taxable")[1]).value));
            var item26Total = (NumWithComma(d.getElementById('frm2200S:txtTax24').value) * 1) + (NumWithComma(sched1Total) * 1);
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
        //Validate Modal
        //get table id from modal
        var tableID = d.getElementById(modalID).childNodes.item(0).childNodes(3).id;

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

                d.getElementById('frm2200S:txt' + modalID + 'DateComputed').value = dateComputed;

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
            $("input[name='frm2200S\\:SelectAll']").removeAttr('checked');

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

            var modalSubTotal = d.getElementById("frm2200S:txtXT" + tableID.split("tblCalculatorXT")[1] + "Total").value;
            
            if (typeof outputSched1ID !== "undefined" && parseFloat(modalSubTotal).toFixed(2) == 0.00) {   
                d.getElementById(outputSched1ID).value = "0.00";
                d.getElementById(outputSched1ID).onblur();   
            } 
        }
    }

    function saveModalRowCount(modalID, tableID) {
        var trMainTable = d.getElementById(tableID).getElementsByTagName('tr');
        d.getElementById("frm2200S:txtCtr" + modalID).value = trMainTable.length;
    }

    
    function renameModalRowInputIDs(tableID) {
        //Get the ATC Number ex. 35, 36, 40, 140, 150
        var atcNumber = tableID.split('tblCalculatorXT')[1]; 
        var table = d.getElementById(tableID);
        var rowCount = table.rows.length;
      
        for (var r = 0; r < rowCount; r++) {
            var inputs = table.rows[r].getElementsByTagName('input');

            for (var c = 0; c < inputs.length; c++) {
                var id = (inputs[c].type == 'checkbox') ? "frm2200S:chkXT" + atcNumber + "Delete_" : "frm2200S:txtXT" + atcNumber + "_";
                d.getElementById(inputs[c].id).id = id + (r + 1) + "C" + (c + 1);
                
                if (c == 2 || c == 3 || c == 5) {
                    inputs[c].onblur = addBlurEventModal(atcNumber, inputs[c], (r + 1));
                }
            }
        }
    }

    //** Select All Checkboxes ====================================================================================*//

    function selectAllCheckbox(sender, tableID) {
        var checkboxes = $("#" + tableID + " input[type=checkbox]");
        if (sender.checked) {
            checkboxes.attr('checked', 'checked');
        } else {
            checkboxes.removeAttr('checked');
        }
    }
    //** Open Modal ====================================================================================*//
    var calculatorTemp = "";
    function openModal(sender, modalID) {
        if (sender.disabled == false) {
            d.getElementById('modalSched1').style.display = "none";
            $('#' + modalID).show();
            calculatorTemp = $("#" + modalID).html();
        }
    }

    //** Close Modal ====================================================================================*//

    function closeModal(senderID) {
        //Validate Modal
        //get table id from modal
        var tableID = d.getElementById(senderID).childNodes.item(0).childNodes(3).id;

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
        var tableID = d.getElementById(modalID).childNodes.item(0).childNodes(3).id;

        if (d.getElementById(tableID).rows.length > 0) {
            //columnsToValidate - column indexes to validate
            var columnsToValidate = (tableID === "tblCalculatorXT36") ? [1, 2, 3] : [1, 2, 3, 5];
            var isValid = validateModal(tableID, columnsToValidate);

            if (isValid) {
                isPrintingModal = true;
                $('#bg').hide();
                $('#' + modalID).removeClass("modalShow");
                $('#' + modalID).removeClass("modalInner");
                $('#modalSched1').removeClass("printSignFooterClass");

                $('#' + modalID).addClass("modalPrint");
                modalIDPrinting = modalID;

                $('.modalAction').css({ 'border': '0 none white', 'background-color': 'transparent' });

                //Display User Details
                var userTIN = d.getElementById('frm2200S:txtTIN1').value + "-" + d.getElementById('frm2200S:txtTIN2').value + "-" + d.getElementById('frm2200S:txtTIN3').value + "-" + d.getElementById('frm2200S:txtBranchCode').value;
                var dateComputed = d.getElementById('frm2200S:txt' + modalID + 'DateComputed').value;

                d.getElementById('frm2200S:lbl' + modalIDPrinting + 'UserTIN').innerHTML = userTIN;
                d.getElementById('frm2200S:lbl' + modalIDPrinting + 'UserName').innerHTML = d.getElementById('frm2200S:taxpayerName').value;
                d.getElementById('frm2200S:lbl' + modalIDPrinting + 'DateComputed').innerHTML = (dateComputed === "undefined") ? "" : dateComputed;
                $("#tbl" + modalIDPrinting).show();

                $("#" + modalIDPrinting + " input:disabled").addClass('disabledInputs');
                //$("#" + modalIDPrinting + " input").attr("disabled", true);
                $("#" + modalIDPrinting + " input[type!='text']").attr("disabled", true);
                $("#" + modalIDPrinting + " input[type='text']:disabled").attr("disabled", false);
                $("#" + modalIDPrinting + " input[type='text']").attr("readonly", true).css({ "background-color": "White" });
                $("#" + modalIDPrinting + " input[type='button']").hide();

                $('#printMenu').show('blind');
                if ($('#formMenu').css('display') != 'none') {
                    $('#formMenu').hide('blind');
                }

                setDisabledBackgroundColor();

                d.getElementById('container').style.display = "none";

                alert("This form must be printed on Legal Size Paper. Please update your Printer Settings (Set Paper Size to Legal under Preferences -> Advanced) to ensure the correct printout of the form.\n\n" +
                      "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166, Enable Shrink-to-Fit must be unchecked, and all Headers & Footers must be set to empty.");
            }
        }
        else {
            if (!d.getElementById('frm2200S:cmdValidate').disabled) {
                alert("Please provide valid data.");
            }
        }
    }
    
    //** Add Background color on focus ====================================================================================*//
    function onFocusIterate(elem) {
        $(elem).css({ 'background': '#ffffcc' });
        $(elem).select();
    }
    
    //** Remove Background color on blur ====================================================================================*//
    function onBlurIterate(elem) {
        $(elem).css({ 'background': '#ffffff' });
    }

    //** Add Background color for disabled fields ====================================================================================*//

    function setDisabledBackgroundColor() {
        $("input[type=text]:disabled, select:disabled").css({ 'background': '#ededed' });
    }

    //** Add Background color for enabled fields ====================================================================================*//

    function setEnabledBackgroundColor() {
        $("input[type=text]:enabled, select:not(:disabled)").css({ 'background': '#ffffff' });
    }

    //** Check if alphanumeric ====================================================================================*//

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
        var frm2200SBeveragesRowCount = d.getElementById('frm2200SBeverages').rows.length;
        // var frm2200SInspectionRowCount = d.getElementById('frm2200SInspection').rows.length;
        var frm2200SadditionalSched1RowCount = d.getElementById('frm2200SadditionalSched1').rows.length;
        var frm2200SBeveragesRow = $('#frm2200SBeverages').find('tr');
        // var frm2200SInspectionRow = $('#frm2200SInspection').find('tr');
        var frm2200SadditionalSched1Row = $('#frm2200SadditionalSched1').find('tr');
        // value = (atc === "XT035") ? parseFloat($.trim(value).split("%")[0]) / 100 : $.trim(value);

        for (var i = 0; i < frm2200SBeveragesRowCount; i++) {
            if (atc == $.trim(frm2200SBeveragesRow[i].cells[0].innerText) && value == $.trim(frm2200SBeveragesRow[i].cells[3].children[0].value)) {
                return true;
            }
        }


        var duplicateCtr = 0;
        for (var i = 0; i < frm2200SadditionalSched1RowCount; i++) {
            var sched1atc = $.trim(frm2200SadditionalSched1Row[i].cells[1].children[0].value);
            var sched1rate =  (sched1atc === "XT035") ? parseFloat($.trim(frm2200SadditionalSched1Row[i].cells[4].children[0].value).split("%")[0]) / 100 : $.trim(frm2200SadditionalSched1Row[i].cells[4].children[0].value);

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
                    if (d.getElementById("frm2200S:txtsched1AppTaxRate" + indexCtr).value === "XT035") {
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
            //ex. modalCalculatorXT35 > item(0) : modalInner > childNodes(2) : 3rd table > Row 1/0 > column N > children[0] : span > text
            //label = (modalTableID.indexOf("3") != -1) ? d.getElementById(modalID).childNodes.item(0).childNodes(2).rows[1].cells[c - 2].children[0].innerHTML : d.getElementById(modalID).childNodes.item(0).childNodes(2).rows[0].cells[c].children[0].innerHTML;
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
        if (d.getElementById('frm2200S:amendedRtn_1').checked) {
            d.getElementById('frm2200S:txtTax23A').disabled = true;
            d.getElementById('frm2200S:txtTax23A').value = '0.00';
            d.getElementById('frm2200S:txtTax23A').style.backgroundColor = '#e2e2e2';
            compute23C();
        }
        else {
            d.getElementById('frm2200S:txtTax23A').disabled = false;
            d.getElementById('frm2200S:txtTax23A').style.backgroundColor = '#ffffff';
        }
    }

    function otherRateCheck(e) {
        if (!isPrintingOthers) {
            var rowOthers = $('#frm2200SadditionalSched1').find('tr');
            var rowBeverage = $('#frm2200SBeverages').find('tr');
            var rowInspection = $('#frm2200SInspection').find('tr');
            var rateArray = new Array();
            var atcArray = new Array();

            var otherText = $(rowOthers[e]).find('input');
            var atc = otherText[1].value;
            var rate = (atc === "XT035") ? parseFloat(otherText[4].value.split("%")[0]) / 100 : otherText[4].value;

            for (i = 0; i < rowBeverage.length; i++) {
                atcArray[i] = rowBeverage[i].cells[0].innerHTML;

            }
            for (i = 0; i < rowInspection.length; i++) {
                atcArray[i + 9] = rowInspection[i].cells[0].innerHTML;
            }

            var year = (parseInt(d.getElementById('frm2200S:txtForYr').value) - 2017);
            var rateXB010 = parseFloat('2.05')
            var rateXT020 = parseFloat('1.75');
            var rateXT036 = parseFloat('5.85');
            var rateXT040 = parseFloat('30.00');
            var rateXT140 = parseFloat('30.00');
            var rateXT150 = parseFloat('30.00');

            for (x = 0; x < year; x++) {
                rateXB010 += rateXB010 * .04;
                rateXT020 += rateXT020 * .04;
                rateXT036 += rateXT036 * .04;
                rateXT040 += rateXT040 * .04;
                rateXT140 += rateXT140 * .04;
                rateXT150 += rateXT150 * .04;
            }
            if (sched1ATCList.length === 0) {
                rateArray[0] = rateXB010.toFixed(2);
                rateArray[1] = rateXB010.toFixed(2);
                rateArray[2] = rateXB010.toFixed(2);
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
            var frm2200SadditionalSched1RowCount = d.getElementById('frm2200SadditionalSched1').rows.length;
            var frm2200SadditionalSched1Row = $('#frm2200SadditionalSched1').find('tr');

            for (var i = 0; i < frm2200SadditionalSched1RowCount; i++) {
                var sched1atc = $.trim(frm2200SadditionalSched1Row[i].cells[1].children[0].value);
                var sched1rate = (sched1atc === "XT035") ? parseFloat($.trim(frm2200SadditionalSched1Row[i].cells[4].children[0].value).split("%")[0]) / 100 : $.trim(frm2200SadditionalSched1Row[i].cells[4].children[0].value);

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
                        
            //Remove all rows excpet first row
            $("#frm2200SadditionalSched1").find("tr:gt(0)").remove();

            $("#modalSched1 input[type=text][maxlength='25']").val("0.00");
            $("#modalSched1 input[type=text][maxlength!='25']").val("");
            $("#frm2200SadditionalSched1 input[id*='sched1Atc']").val("XB");
            $("#frm2200S\\:txtsched1AppTaxRate0").val("0.00");

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

    //New codes for validation of schedule 1
    //as of 2018-04-20
    if($("input[name='frm2200S:chkPymntManner']:checked").val() == "Y")
    {
      var sched1HasValue = false;
      for(i=0; i<=9; i++)
      {
        //not required
        //var val = $("[name='frm2200S:txtSalesValue" + i + "']").val();
        var rem = $("[name='frm2200S:txtVolumeRemovals" + i + "']").val();

        if(parseFloat(rem) > 0)
        {
          return true;
        }
      }

      //not required
      //var othersVal = $("[name='frm2200S:txtsched1SalesValue0']").val();
      var othersRem = $("[name='frm2200S:txtsched1VolumeRemovals0']").val();

      if(parseFloat(othersRem) > 0)
      {
        return true;
      }

      alert("Please fill up Schedule 1.");

          return false;
    }

    return true;
    }

    //** Check ATC if null Schedule 1 ====================================================================================*//
    function checkATCValue(sender) {
        var val = (sender.value.toUpperCase().replace(/-/g, '&mdash;')).split("XB");
        var index = sender.id.split("txtsched1Atc")[1];
        var rate = d.getElementById("frm2200S:txtsched1AppTaxRate" + index).value;

        if ($.trim(sender.value) !== "XB" && ($.trim(sender.value) === "" || (val.length > 0 && (isNaN(val[1]) || val[1] === "" || $.trim(sender.value).length != 5)))) {
            alert("Invalid ATC.");
            sender.value = "XB";
            sender.focus();
      
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

        var field = (elementIdWithoutfrm.indexOf('frm2200S') != -1) ? d.getElementById(elementIdWithoutfrm) : d.getElementById('frm2200S:' + elementIdWithoutfrm);
        
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

        var field = d.getElementById('frm2200S:' + elementIdWithoutfrm);
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

        if (d.getElementById('frm2200S:' + element).checked) {
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
            stringValue = (elementID.indexOf("frm2200S:") != -1 && elementID.indexOf("lstTaxTreaty") == -1) ? field.value : ((elementID.indexOf("lstTaxTreaty") != -1) ? $("#frm2200S\\:" + elementID.split("frm2200S:")[1] + " option:selected").text() : $("#" + elementID + " option:selected").text());
            
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

        var field = d.getElementById("frm2200S:" + id);
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
                save('2200S',data);
                
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
        saveAndExit('2200S',data);
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

        submitAndSave('2200S', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2200S';
    } 
</script>
@endsection