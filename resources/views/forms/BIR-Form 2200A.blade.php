@extends('layouts.app')
@section('title', '| BIR Form No. 2200A')

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
        <button type="button" class="btn btn-danger btn-exit" id="2200A" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="2200A" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='2200A' company='{{$company->id}}'>Okay</button>
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
                <div id="wrapper" style="margin: 0 auto; position: relative; width: 806px; ">
                    <div id="formPaper">
                        <!-- ADDED -->
                        <div id="MainContent" class="noCellSpace" style="display:block;">
                            <table width="806px" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <table style="width:804px" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
                                            <tr>
                                                <td width="82"  style='padding:0px;' valign="middle" align="center">                                        
                                                        <img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" />
                                                    </td>
                                                <td width="160" valign="middle" nowrap>
                                                    <label face="Arial" size="1px">Republika ng Pilipinas
                                                    <br/>Kagawaran ng Pananalapi
                                                    <br/>Kawanihan ng Rentas Internas</label>
                                                </td>
                                                <td width="374" align="center" nowrap>
                                                    <font size="4px" style="font-weight:bold;">EXCISE TAX
                                                    <br/>RETURN
                                                    <br/>for ALCOHOL PRODUCTS</font>
                                                </td>
                                                <td width="200" valign="center">
                                                    <font face="Arial" size="1px">BIR Form No.<br/></font>
                                                    <font face="Arial" size="6px">2200-A<br/></font>
                                                    <font face="Arial" size="1px">April 2014 (ENCS)</font>
                                                </td>   
                                            </tr>                                   
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table style="width:804px" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td width="336" valign="top" class="tblFormTd">
                                                    <table width="254" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="10%"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                            <td width="20%" nowrap><font size="1" style="font-size: 11px;">Date (MM/DD/YYYY)</font></td>
                                                            <td width="70%" nowrap>
                                                            <font color="black" face="Arial" size="2">
                                                                    <select id="frm2200A:txtMonth1" name="frm2200A:txtMonth1" size="1" onblur="validateDate();"
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
                                                                <input id="frm2200A:txtDate" maxlength="2" name="frm2200A:txtDate" size="1" style="" type="text" value="" onblur="validateDate();blockLetterInt(this);" onkeypress="return wholenumber(this, event)" />
                                                                <input id="frm2200A:txtForYr" maxlength="4" name="frm2200A:txtForYr" size="3" style="" type="text" value="" onblur="setATCSchedule1();blockLetterInt(this);" onkeypress="return wholenumber(this, event)" />                                                    
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="183" valign="top" class="tblFormTd">
                                                    <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="10" nowrap><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                            <td width="30" nowrap><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                            <td>
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm2200A:j_id217">
                                                                    <div align="center" style="padding: 0px 0 0px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><input type="radio" value="Y" name="frm2200A:amendedRtn" id="frm2200A:amendedRtn_1" onclick="changeAmendedReturn();" disabled class="isDisabled" /><label for="frm2200A:j_id217_1" style="font-size:10px;" >Yes</label>&nbsp;</td>
                                                                                    <td><input type="radio" value="N"  name="frm2200A:amendedRtn" id="frm2200A:amendedRtn_2" onclick="changeAmendedReturn();" disabled checked /><label for="frm2200A:j_id217_2" style="font-size:10px;" >No</label></td>
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
                                                            <td width="8" nowrap><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;</font></td>
                                                            <td>
                                                                <font size="1" style="font-size: 11px;">Number of Sheet/s Attached</font>
                                                                <input type="text" value="0" style="text-align: right;" size="4" name="frm2200A:txtSheets" maxlength="2" id="frm2200A:txtSheets" onkeypress="return wholenumber(this, event)" disabled class="isDisabled" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="0">
                                        <table style="width:804px" border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                            <tr>
                                                <td width="100%" class="tblFormTd">
                                                
                                                            <div align="center"><font face="Arial, Helvetica, sans-serif" size="2px" style="font-weight:bold;letter-spacing: 1px;">Part I - Background Information</font></div>
                                                                                                        
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>           
                                <tr>
                                    <td>
                                        <table style="width:804px" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td valign="top" class="tblFormTd">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="11"><font size="2" style="font-weight:bold">&nbsp;4&nbsp;</font></td>
                                                            <td>
                                                                <font size="1" style="font-size: 11px;">Taxpayer Identification Number (TIN)&nbsp;</font>
                                                                <font size="2" face="Arial">
                                                                    <input type="text" value="{{$company->tin1}}" size="2" name="frm2200A:txtTIN1" maxlength="3" id="frm2200A:txtTIN1" onkeypress="return wholenumber(this, event)" disabled class="isDisabled" />
                                                                    <input type="text" value="{{$company->tin2}}" size="2" name="frm2200A:txtTIN2" maxlength="3" id="frm2200A:txtTIN2" onkeypress="return wholenumber(this, event)" disabled class="isDisabled" />
                                                                    <input type="text" value="{{$company->tin3}}" size="2" name="frm2200A:txtTIN3" maxlength="3" id="frm2200A:txtTIN3" onkeypress="return wholenumber(this, event)" disabled class="isDisabled" />
                                                                    <input type="text" value="{{$company->tin4}}" size="2" name="frm2200A:txtBranchCode" maxlength="3" id="frm2200A:txtBranchCode" onkeypress="return letternumber(event)" disabled class="isDisabled" />
                                                                </font>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="160" valign="top" class="tblFormTd">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="80"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                            <td id="rdoSelect"> 
                                                                <select class='iceSelOneMnu' id='frm2200A:txtRDOCode' name='frm2200A:txtRDOCode' size='1' disabled>
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
                                        <table style="width:804px" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td  valign="top" class="tblFormTd">                                                
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td style="width:11px"><font size="2" style="font-weight:bold;">&nbsp;6&nbsp;</font></td>
                                                            <td><font size="1" style="font-size: 11px;">Taxpayer's Name (Last Name, First Name, Middle Name for Individuals) / (Registered Name for Non-Individual)</font></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tblFormTd">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td  style="width:5px">&nbsp;</td>
                                                            <td><input type="text" value="{{$company->registered_name}}"  style="width:98%" name="frm2200A:txtTaxPayerName" maxlength="70" id="frm2200A:txtTaxPayerName" onblur="return capitalize(this), checkIfValidValues(this)" disabled class="isDisabled" /></td>
                                                        </tr>
                                                    </table>                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table style="width:804px" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td class="tblFormTd">
                                                    <table style="width:583px">
                                                        <tr>
                                                            <td width="11"><font size="2" style="font-weight:bold;">&nbsp;7&nbsp;</font></td>
                                                            <td >
                                                                <font size="1" style="font-size: 11px;">Registered Address <span style="font-style: italic;">(indicate complete registered address)</span></font>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td colspan="2">&nbsp;<input type="text" value="{{$company->address}}" style="width:98%" name="frm2200A:txtAddress" maxlength="70" id="frm2200A:txtAddress" onblur="return capitalize(this), checkIfValidValues(this)" disabled class="isDisabled" /></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="tblFormTd">
                                                    <table style="width:148px" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td ><font size="1" style="font-size: 11px;">&nbsp;<span style="font-weight:bold;">7A</span> ZIP Code</font></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" value="{{$company->zip_code}}" disabled size="20" name="frm2200A:txtZipCode" maxlength="4" id="frm2200A:txtZipCode" onblur="checkIfValidValues(this)" onkeypress="return wholenumber(this, event)" disabled class="isDisabled" />
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
                                        <table style="width:804px" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td style="width:230px" valign="top" class="tblFormTd">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td>
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font></td>
                                                                        <td><font size="1" style="font-size: 11px;">Contact Number</font></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>                                                                    
                                                                        <td colspan="2"> 
                                                                            &nbsp;<input type="text" style="width:95%" value="{{$company->tel_number}}" name="frm2200A:txtContactNum" maxlength="20" id="frm2200A:txtContactNum" onblur="checkIfValidValues(this)" onkeypress="return wholenumber(this, event)" disabled class="isDisabled" />
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="width:407px" valign="top" class="tblFormTd">
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font><font size="1" style="font-size: 11px;">Main Line of Business&nbsp;</font></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" style="width:95%" value="{{$company->line_business}}" style="margin-left: 5px; width: 410px;" name="frm2200A:txtLineBus" maxlength="30" id="frm2200A:txtLineBus" onblur="return capitalize(this), checkIfValidValues(this)" disabled class="isDisabled" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="width:163px" valign="top" class="tblFormTd">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td>
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font></td>
                                                                        <td><font size="1" style="font-size: 11px;">PSIC</font></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td colspan="2"><input type="text" value="" style="width:95%" name="frm2200A:txtPSIC" maxlength="6" id="frm2200A:txtPSIC" onblur="checkIfValidValues(this)" onkeypress="return wholenumber(this, event)" /></td>
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
                                        <table style="width:804px" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td valign="top" class="tblFormTd">
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font><font size="1" style="font-size: 11px;">Email Address</font></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                &nbsp;<input type="text" value="{{$company->email_address}}" style="width:98%" name="frm2200A:txtEmailAddress" maxlength="70" id="frm2200A:txtEmailAddress" onkeypress="return emailAddress(this);" disabled="disabled" onblur="validateEmail(), checkIfValidValues(this);" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="tblForm">
                                <tr>
                                    <td>
                                        <table  border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="2" valign="top" class="tblFormTd">
                                                    <table border="0" cellpadding="0" cellspacing="0" >
                                                        <tr>
                                                            <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><font size="2"><strong>&nbsp;12&nbsp;</strong></font>Place of Production</font></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" valign="top" class="tblFormTd">
                                        <table border="0" cellpadding="0" cellspacing="0" width="735" >
                                            <tr>
                                                <!--<td width="3%"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">&nbsp; &nbsp;</font></strong></font></td> -->
                                                <td width="31%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;Region<br /></font>&nbsp;
                                                    <select id="frm2200A:txt12optRegion" name="frm2200A:txt12optRegion" size="1" style="width: 200px" onchange="getProvince(this.value, 'frm2200A:txt12optProvince', 'frm2200A:txt12optCity');">
                                                        <option value="00">(Select Region)</option>
                                                    </select>
                                                </td>
                                                <td width="32%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Province<br /></font>
                                                    <select id="frm2200A:txt12optProvince" name="frm2200A:txt12optProvince" size="1" style="width: 195px" onchange="getCity('frm2200A:txt12optRegion', 'frm2200A:txt12optProvince', 'frm2200A:txt12optCity');">
                                                        <option value="00">(Select Province)</option>
                                                    </select>
                                                </td>
                                                <td width="31%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">City<br /></font>
                                                    <select id="frm2200A:txt12optCity" name="frm2200A:txt12optCity" size="1" style="width: 190px">
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
                                        <table width="850" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td colspan="2" valign="top" class="tblFormTd">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="850">
                                                        <tr>
                                                            <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><font size="2"><strong>13&nbsp;</strong></font>Place of Removal</font></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" valign="top" class="tblFormTd">
                                        <table border="0" cellpadding="0" cellspacing="0" width="735">
                                            <tr>
                                                <td width="31%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;Region<br /></font>&nbsp;
                                                    <select id="frm2200A:txt13optRegion1" name="frm2200A:txt13optRegion1" size="1" style="width:200px" onchange="getProvince(this.value, 'frm2200A:txt13optProvince1', 'frm2200A:txt13optCity1')">
                                                        <option value="00">(Select Region)</option>
                                                    </select>                                       
                                                </td>
                                                <td width="32%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Province<br /></font>
                                                    <select id="frm2200A:txt13optProvince1" name="frm2200A:txt13optProvince1" size="1" style="width: 195px" onchange="getCity('frm2200A:txt13optRegion1', 'frm2200A:txt13optProvince1', 'frm2200A:txt13optCity1')">
                                                        <option value="00">(Select Province)</option>
                                                    </select>
                                                </td>
                                                <td width="31%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">City<br /></font>
                                                    <select id="frm2200A:txt13optCity1" name="frm2200A:txt13optCity1" size="1" style="width: 190px">
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
                                        <table border="0" bordercolor="black" cellpadding="0" cellspacing="0" width="800">
                                            <tr>
                                                <td width="20"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">14</font></strong></font></td>
                                                <td width="198"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Are you availing of tax relief under Special Law or International Tax Treaty?</font></td>
                                                <td width="159">
                                                    <fieldset id="frm2200A:optTreaty" style="font-family: Arial, Helvetica, sans-serif; font-size : 10px;">
                                                        <table border="0" cellpadding="0" cellspacing="0" class="iceSelOneRb">
                                                            <tr>
                                                                <td>
                                                                    <input id="frm2200A:optTreaty_1" name="frm2200A:optTreaty" type="radio" value="Y" onclick="changeTreaty()" /><label for="frm2200A:optTreaty_1">Yes</label>
                                                                </td>
                                                                <td>
                                                                    <input checked id="frm2200A:optTreaty_2" name="frm2200A:optTreaty" type="radio" value="N" onclick="changeTreaty()" /><label for="frm2200A:optTreaty_2">No</label>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </fieldset>
                                                </td>
                                                <td width="19"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">14A</font></strong></font></td>
                                                <td width="67"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">If yes, specify</font></td>
                                                <td width="238">
                                                    <select disabled="disabled" id="frm2200A:lstTaxTreaty" name="frm2200A:lstTaxTreaty" size="1" style="background-color: white; font-family: Arial, Helvetica, sans-serif;" >
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
                                    <td height="0" colspan="2" valign="top" class="tblFormTd">
                                        <table height="0" border="0" cellpadding="0" cellspacing="0" width="800">
                                            <tr>
                                                <td height="0" width="100%">
                                                
                                                    <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="5%" nowrap>&nbsp;&nbsp;<font size="1.5px" style="font-weight:bold;"></font></td>
                                                            <td width="95%">
                                                                <div align="center"><font face="Arial, Helvetica, sans-serif" size="2px" style="font-weight:bold;letter-spacing: 1px;">Part II - Manner Of Payment</font></div>
                                                            </td>
                                                        </tr>
                                                    </table>                                            
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>                   
                                <tr>
                                    <td colspan="2" valign="top" class="tblFormTd" style="font-family: Arial, Helvetica, sans-serif; font-size : 10px;">
                                        <table width="800" height="25" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td width="3%" nowrap><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">15</font></strong></font></td>
                                                <td colspan="2" width="47%" nowrap>
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td>
                                                                <input name="frm2200A:chkPymntManner" type="radio" id="frm2200A:chkPymntManner_1" onclick="changeMannerOfPayment();" value="Removal" />
                                                                <label for="frm2200A:chkPymntManner_1" style="font-size: 11px;">Payment on Actual Removal</label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="50%" nowrap>
                                                    <font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">16</font></strong></font>
                                                    <input id="frm2200A:chkPymntManner_2" name="frm2200A:chkPymntManner" type="radio" value="Deposit" onclick="changeMannerOfPayment();" />
                                                    <label for="frm2200A:chkPymntManner_2" style="font-size: 11px;">Prepayment / Advance Deposit</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="3%" nowrap><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">17</font></strong></font></td>
                                                <td colspan="3"  nowrap>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="font-family: Arial, Helvetica, sans-serif; font-size : 10px;">
                                                        <tr>
                                                            <td>
                                                                <input name="frm2200A:chkPymntMannerother" type="checkbox" id="frm2200A:chkPymntManner_3" value="Other"  onclick="changeMannerOfPayment();" disabled="disabled" />
                                                                <label for="frm2200A:chkPymntManner_3" style="font-size: 11px;">Other Similar Schemes (specify)</label>
                                                                <font face="Arial, Helvetica, sans-serif" size="1" style="margin-left: 10px;">
                                                                <input disabled id="frm2200A:txt17OthMannerofPymnt" name="frm2200A:txt17OthMannerofPymnt" maxlength="50" size="25" type="text" value="" onblur="return capitalize(this)" style="background-color: rgb(220, 220, 220);" />
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
                                    <td height="0px">
                                        <table height="0px" width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td height="0px" class="tblFormTdPart">
                                                    <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="5%" nowrap>&nbsp;&nbsp;<font size="1.5px" style="font-weight:bold;"></font></td>
                                                            <td width="95%">
                                                                <div align="center"><font face="Arial, Helvetica, sans-serif" size="2px" style="font-weight:bold;letter-spacing: 1px;">Part III - Payments and Application</font></div>
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
                                                            <td width="26"><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;&nbsp;</font></td>
                                                            <td width="355"><font color="black" face="Arial" size="1" style="font-size: 11px;">Excise Tax Due </font>
                                                                <font color="black" face="Arial" size="1">
                                                                    <a href="#" id="frm2200A:btnSched1" onclick="showSched1();loadSched1();" style="font-style: italic;">(from Schedule 1)</a>
                                                                </font>
                                                            </td>
                                                            <td width="163">
                                                                <div class="spacePadder"></div>
                                                            </td>
                                                            <td width="194">
                                                                <span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 15px;">18</font>
                                                                    <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" name="frm2200A:txtTax18" maxlength="25" id="frm2200A:txtTax18"  />
                                                                </span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;</font></td>
                                                            <td colspan="2"><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: <font size="2" style="font-weight:bold;">19A</font> Balance Carried Over from Previous Return</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                                                            <td>
                                                                <font size="2" style="font-weight:bold;margin-right: 6px;">19A</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200A:txtTax19A" maxlength="25" id="frm2200A:txtTax19A" onblur="roundDownWithAlert(this); compute19C(this);" onkeypress="return numbersonly(this, event)" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">19B</font> Creditable Excise Tax, if applicable</font></td>
                                                            <td>
                                                                <span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 6px;">19B</font>
                                                                    <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200A:txtTax19B" maxlength="25" id="frm2200A:txtTax19B" disabled class="isDisabled" />
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">19C</font> Total <span style="font-style: italic;">(Sum of Items 19A and 19B)</span></font></td>
                                                            <td>
                                                                <div align="justify">
                                                                    <span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 6px;">19C</font>
                                                                        <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200A:txtTax19C" maxlength="25" id="frm2200A:txtTax19C" disabled class="isDisabled" />
                                                                    </span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font></td>
                                                            <td colspan="2"><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Net Tax Due / (Overpayment)</font> <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"><span style="font-style: italic;">(Item 18 less Item 19C)</span></font>
                                                            </td>
                                                            <td><div align="justify"><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 15px;">20</font>
                                                                        <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200A:txtTax20" maxlength="25" id="frm2200A:txtTax20" disabled class="isDisabled" />
                                                                    </span></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font></td>
                                                            <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: Payment on Returns Previously Filed for the Same Period, if amended return</font></td>
                                                            <td><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 15px;">21</font>
                                                                    <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200A:txtTax21" maxlength="25" id="frm2200A:txtTax21" onkeypress="return numbersonly(this, event)" onblur="roundDownWithAlert(this);compute22(this);" disabled class="isDisabled" />
                                                                </span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;</font></td>
                                                            <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Tax Still Due / (Overpayment) <span style="font-style: italic;">(Item 20 less Item 21)</span></font></td>
                                                            <td><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 15px;">22</font>
                                                                    <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200A:txtTax22" maxlength="25" id="frm2200A:txtTax22" disabled class="isDisabled" />
                                                                </span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;</font></td>
                                                            <td colspan="2"><font size="1" style="font-size: 11px;">&nbsp;Add: Penalties</font></td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td colspan="2">
                                                                <font color="black" face="Arial" size="1" style="font-size: 11px;"><font size="2" style="font-weight:bold;">23A</font> Surcharge</font>
                                                            </td>
                                                            <td>
                                                                <font size="2" style="font-weight:bold;margin-right: 6px;">23A</font>
                                                                <input type="text" value="0.00" style=" text-align: right;" size="20" name="frm2200A:txtTax23A" maxlength="15" id="frm2200A:txtTax23A" onblur="roundDownWithAlert(this); compute23D(this);" onkeypress="return numbersonly(this, event)" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td colspan="2">
                                                                <font color="black" face="Arial" size="1" style="font-size: 11px;"><font size="2" style="font-weight:bold;">23B</font> Interest</font>
                                                            </td>
                                                            <td>
                                                                <font size="2" style="font-weight:bold;margin-right: 6px;">23B</font>
                                                                <input type="text" value="0.00" style=" text-align: right;" size="20" name="frm2200A:txtTax23B" maxlength="15" id="frm2200A:txtTax23B" onblur="roundDownWithAlert(this); compute23D(this);" onkeypress="return numbersonly(this, event)" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td colspan="2">
                                                                <font color="black" face="Arial" size="1" style="font-size: 11px;"><font size="2" style="font-weight:bold;">23C</font> Compromise</font>
                                                            </td>
                                                            <td>
                                                                <font size="2" style="font-weight:bold;margin-right: 6px;">23C</font>
                                                                <input type="text" value="0.00" style=" text-align: right;" size="20" name="frm2200A:txtTax23C" maxlength="15" id="frm2200A:txtTax23C" onblur="roundDownWithAlert(this); compute23D(this);" onkeypress="return numbersonly(this, event)" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td colspan="2">
                                                                <font color="black" face="Arial" size="1" style="font-size: 11px;"><font size="2" style="font-weight:bold;">23D</font> Total Penalties <span style="font-style: italic;">(Sum of Items 23A to 23C)</span></font>
                                                            </td>
                                                            <td>
                                                                <font size="2" style="font-weight:bold;margin-right: 6px;">23D</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200A:txtTax23D" maxlength="25" id="frm2200A:txtTax23D" disabled class="isDisabled" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;</font></td>
                                                            <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Amount Payable <span style="font-style: italic;">(Sum of Items 22 and 23D)</span></font></td>
                                                            <td>
                                                                <font size="2" style="font-weight:bold;margin-right: 15px;">24</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200A:txtTax24" maxlength="25" id="frm2200A:txtTax24" disabled class="isDisabled" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;25&nbsp;</font></td>
                                                            <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Less: Payment Made Today</font></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td colspan="2"><font color="black" face="Arial" size="1"></font>
                                                                <font color="black" face="Arial" size="1" style="font-size: 11px;"><font size="2" style="font-weight:bold;">25A</font> Tax Payment / Deposit</font>
                                                            </td>
                                                            <td valign="bottom">
                                                                <span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 6px;">25A</font>
                                                                    <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2200A:txtTax25A" maxlength="25" id="frm2200A:txtTax25A" onblur="roundDownWithAlert(this); compute25C(this);" onkeypress="return numbersonly(this, event)" />
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td colspan="2"><font color="black" face="Arial" size="1"></font>
                                                                <font color="black" face="Arial" size="1" style="font-size: 11px;"><font size="2" style="font-weight:bold;">25B</font> Penalties (from Item 23D)</font>
                                                                <input id="frm2200A:chkPenalties" name="frm2200A:chkPenalties" value="Y" type="checkbox" onclick="payPenalties()" disabled />
                                                                <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><label for="frm2200A:chkPenalties">Pay Penalties?</label></font>
                                                            </td>
                                                            <td valign="bottom">
                                                                <span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 6px;">25B</font>
                                                                    <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200A:txtTax25B" maxlength="25" id="frm2200A:txtTax25B" disabled class="isDisabled" />
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td colspan="2"><font color="black" face="Arial" size="1"></font>
                                                                <font color="black" face="Arial" size="1" style="font-size: 11px;"><font size="2" style="font-weight:bold;">25C</font> Total Payment Made Today <span style="font-style: italic;">(Sum of Items 25A & 25B)</span></font>
                                                            </td>
                                                            <td valign="bottom">
                                                                <span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 6px;">25C</font>
                                                                    <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200A:txtTax25C" maxlength="25" id="frm2200A:txtTax25C" disabled class="isDisabled" />
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;26&nbsp;</font></td>
                                                            <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Balance to be Carried Over to Next Return <span style="font-style: italic;">(Item 24 less Item 25C)</span></font></td>
                                                            <td><span class="spacePadder"><font size="2" style="font-weight:bold;margin-right: 15px;">26</font>
                                                                    <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2200A:txtTax26" maxlength="25" id="frm2200A:txtTax26" disabled class="isDisabled" />
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
                                        <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                            <tr>
                                                <td class="tblFormTdPart">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td>
                                                                <table width="800" cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr valign="middle">
                                                                            <td width="88"></td>
                                                                            <td width="625">
                                                                                <div id="frm2200A:j_id743">
                                                                                    <div align="center">
                                                                                        @if($action != 'view')
                                                                                        <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm2200A:cmdValidate" id="frm2200A:cmdValidate" onclick="validateForm()" />
                                                                                        <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm2200A:cmdEdit" id="frm2200A:cmdEdit" onclick="editForm()"/>
                                                                                        <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                        <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                        <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printOCR();" /> 
                                                                                        <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2200A:btnFinalCopy" id="frm2200A:btnFinalCopy" onclick="submitForm();" />
                                                                                        @else
                                                                                        <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printOCR();" />
                                                                                        <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                                        @endif
                                                                                        <div id="msg" class="printButtonClass" style="display:none;"></div>
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

                        <!-- ADDED -->
                        <div id="PrintMainContent" style="display:none;width:850px; height:1300px;font-family: Arial; margin:0; overflow: hidden;"> 
                            <img src="{{ asset('images/Print/2200-A-Pg1.png') }}" style="position: absolute; background-color: white; top: -17px; left: -25px; width: 850px; height: 1300px; margin: 0; padding: 0;" />
                            <div style="position: absolute; top: -8px !important; left: -16px !important;  ">                                    
                                <div style=" float:left; position:absolute; left:161px; top:145px; letter-spacing:8px; "><span id="txtMonth1" class='smallBold'></span></div>           
                                <div style=" float:left; position:absolute; left:225px; top:145px; letter-spacing:8px; right: -225px;"><span id="txtDate" class='smallBold'></span></div>   
                                <div style=" float:left; position:absolute; left:287px; top:145px; letter-spacing:12px;"><span id="txtForYr" class='smallBold'></span></div>    
                                <div style=" float:left; position:absolute; left:495px; top:143px; "><span id="amendedRtn_1" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:543px; top:143px; right: -539px;"><span id="amendedRtn_2" class='smallBold'></span></div>  
                                <div style=" float:left; position:absolute; top:145px; letter-spacing:5px; width: 8px; left: 776px;"><span id="txtSheets" class='smallBold'></span></div>   
                            
                                <div style=" float:left; position:absolute; left:303px; top:184px; letter-spacing:13px;"><span id="txtTIN1" class='smallBold'></span></div> 
                                <div style=" float:left; position:absolute; left:389px; top:184px; letter-spacing:13px; right: -389px;"><span id="txtTIN2" class='smallBold'></span></div>  
                                <div style=" float:left; position:absolute; left:472px; top:184px; letter-spacing:13px;"><span id="txtTIN3" class='smallBold'></span></div> 
                                <div style=" float:left; position:absolute; left:570px; top:184px; letter-spacing:13px; width: 57px;"><span id="txtBranchCode" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:758px; top:184px; letter-spacing:5px; width: 35px;"><span id="txtRDOCode" class='smallBold'></span></div>
                            
                                <div style=" float:left; position:absolute; left:35px; top:219px; width:770px; overflow:hidden; white-space: nowrap;"><span id="txtTaxPayerName" class='smallBold' style="letter-spacing:2pt;"></span></div>
                            
                                <div style=" float:left; position:absolute; left:35px; top:256px; width:770px; overflow:hidden; white-space: nowrap;"><span id="txtAddress" class='smallBold' style="letter-spacing:2pt;"></span></div>
                            
                                <div style=" float:left; position:absolute; left:35px; top:276px; width:600px; overflow:hidden; white-space: nowrap;"><span id="txtAddress2" class='smallBold' style="letter-spacing:2pt;"></span></div>
                                <div style=" float:left; position:absolute; left:743px; top:276px; width:45px; overflow:hidden; white-space: nowrap;"><span id="txtZipCode" class='smallBold' style="letter-spacing:5px;"></span></div>
                            
                                <div style=" float:left; position:absolute; left:35px; top:317px; width:220px;"><span id="txtContactNum" class='smallBold'  style="letter-spacing:2pt;"></span></div>
                                <div style=" float:left; position:absolute; left:285px; top:317px; width:380px; overflow:hidden; white-space: nowrap;  "><span id="txtLineBus" class='smallBold' style="letter-spacing:2pt;"></span></div>
                                <div style=" float:left; position:absolute; left:690px; top:317px; "><span id="txtPSIC" class='smallBold' style="letter-spacing:5px;"></span></div>
                            
                                <div style=" float:left; position:absolute; left:27px; top:353px; width:770px; overflow:hidden; white-space: nowrap; "><span id="txtEmailAddress" class='smallBold' style="letter-spacing:2pt;"></span></div>
                            
                                <div style=" float:left; position:absolute; left:25px;  top:406px; width:95px; overflow:hidden; white-space: nowrap; "><span id="txt12optRegion" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:140px; top:406px; width:378px; overflow:hidden; white-space: nowrap; "><span id="txt12optProvince" class='smallBold' style="letter-spacing:2pt;"></span></div>
                                <div style=" float:left; position:absolute; left:525px; top:406px; width:270px; overflow:hidden; white-space: nowrap; "><span id="txt12optCity" class='smallBold' style="letter-spacing:2pt;"></span></div>
                            
                                <div style=" float:left; position:absolute; left:25px;  top:458px; width:95px; overflow:hidden; white-space: nowrap; "><span id="txt13optRegion1" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:140px; top:458px; width:378px; overflow:hidden; white-space: nowrap; "><span id="txt13optProvince1" class='smallBold' style="letter-spacing:2pt;"></span></div>
                                <div style=" float:left; position:absolute; left:523px; top:458px; width:270px; overflow:hidden; white-space: nowrap; "><span id="txt13optCity1" class='smallBold' style="letter-spacing:2pt;"></span></div>
                            
                                <div style=" float:left; position:absolute; left:207px; top:491px; right: -204px;"><span id="optTreaty_1" class='smallBold' style="letter-spacing:8px;"></span></div>
                                <div style=" float:left; position:absolute; left:265px; top:492px; "><span id="optTreaty_2" class='smallBold' style="letter-spacing:8px;"></span></div>
                                <div style=" float:left; position:absolute; left:345px; top:497px; width:448px; overflow:hidden; white-space: nowrap; "><span id="lstTaxTreaty" class='smallBold' style="letter-spacing:2pt;"></span></div>
                            
                                <div style=" float:left; position:absolute; left:57px; top:535px; right: -51px;"><span id="chkPymntManner_1" class='smallBold' style="letter-spacing:8px;"></span></div>
                                <div style=" float:left; position:absolute; left:290px; top:537px; "><span id="chkPymntManner_2" class='smallBold' style="letter-spacing:8px;"></span></div>
                            
                                <div style=" float:left; position:absolute; left:57px; top:560px; right: -51px;"><span  id="chkPymntManner_3" class='smallBold' style="letter-spacing:8px;"></span></div>
                                <div style=" float:left; position:absolute; left:262px; top:561px; width:535px; overflow:hidden; white-space: nowrap; "><span  id="txt17OthMannerofPymnt" class='smallBold' style="letter-spacing:2pt;"></span></div>
                            
                            
                                <div style=" float:left; position:absolute; left:559px; top:600px; width: 175px;text-align: right;"><span id="txtTax18" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:622px; width: 175px;text-align: right;"><span id="txtTax19A" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:643px; width: 175px;text-align: right;"><span id="txtTax19B" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:665px; width: 175px;text-align: right;"><span id="txtTax19C" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:686px; width: 175px;text-align: right;"><span id="txtTax20" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:708px; width: 175px;text-align: right;"><span id="txtTax21" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:728px; width: 175px;text-align: right;"><span id="txtTax22" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:749px; width: 175px;text-align: right;"><span id="txtTax23A" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:770px; width: 175px;text-align: right;"><span id="txtTax23B" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:790px; width: 175px;text-align: right;"><span id="txtTax23C" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:812px; width: 175px;text-align: right;"><span id="txtTax23D" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:832px; width: 175px;text-align: right;"><span id="txtTax24" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:855px; width: 175px;text-align: right;"><span id="txtTax25A" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:876px; width: 175px;text-align: right;"><span id="txtTax25B" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:897px; width: 175px;text-align: right;"><span id="txtTax25C" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:559px; top:918px; width: 175px;text-align: right;"><span id="txtTax26" class='smallBold' style="letter-spacing:1pt;"></span></div>
                            
                                <!-- DECIMAL PLACES -->
                                <div style=" float:left; position:absolute; left:764px; top:600px; width: 30px;"><span id="txtTax18_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:622px; width: 30px;"><span id="txtTax19A_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:643px; width: 30px;"><span id="txtTax19B_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:665px; width: 30px;"><span id="txtTax19C_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:686px; width: 30px;"><span id="txtTax20_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:708px; width: 30px;"><span id="txtTax21_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:728px; width: 30px;"><span id="txtTax22_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:749px; width: 30px;"><span id="txtTax23A_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:770px; width: 30px;"><span id="txtTax23B_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:790px; width: 30px;"><span id="txtTax23C_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:812px; width: 30px;"><span id="txtTax23D_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:832px; width: 30px;"><span id="txtTax24_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:855px; width: 30px;"><span id="txtTax25A_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:876px; width: 30px;"><span id="txtTax25B_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:897px; width: 30px;"><span id="txtTax25C_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:764px; top:918px; width: 30px;"><span id="txtTax26_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                            </div>
                        </div>
                        
                        <!-- Print layout for Schedule 1 modal -->
                        <div id="PrintmodalSched1" style="display:none; width:995px; height:1300px;font-family: Arial; margin:0; overflow: hidden;">
                            <img src="{{ asset('images/Print/2200-A-Pg2.png') }}"  style="position: absolute; background-color: white; top: -17px !important; left: -22px !important; width: 850px; height: 1300px; margin: 0; padding: 0;" />
                            <div style="position: absolute; left:425px; top:95px; height: 16px; width: 106px;">
                                <!-- XA035 EXEMPT -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:77px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exempt12013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:77px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exempt12014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:90px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exempt12015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:103px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exempt12016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:116px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exempt12017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:130px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exempt12018" class="smallBold" style="font-size:12px;">000</span></div>

                                <!-- XA036 EXEMPT -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:170px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exempt22013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:170px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exempt22014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:183px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exempt22015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:196px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exempt22016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:209px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exempt22017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:223px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exempt22018" class="smallBold" style="font-size:12px;">000</span></div>

                                <!-- XA061 EXEMPT -->
                                <div>
                                    <!-- <div style=" float:left; position:absolute; left:-1px; top:315px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt12013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                    <div style=" float:left; position:absolute; left:-1px; top:315px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt12014" class="smallBold" style="font-size:12px;">000</span></div>
                                    <div style=" float:left; position:absolute; left:-1px; top:328px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt12015" class="smallBold" style="font-size:12px;">000</span></div>
                                    <div style=" float:left; position:absolute; left:-1px; top:342px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt12016" class="smallBold" style="font-size:12px;">000</span></div>
                                    <div style=" float:left; position:absolute; left:-1px; top:355px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt12017" class="smallBold" style="font-size:12px;">000</span></div>
                                    <div style=" float:left; position:absolute; left:-1px; top:368px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt12018" class="smallBold" style="font-size:12px;">000</span></div>
                                </div>
                                
                                <!-- XA062 EXEMPT -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:395px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt22013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:395px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt22014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:408px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt22015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:422px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt22016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:435px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt22017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:449px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt22018" class="smallBold" style="font-size:12px;">000</span></div>

                                <!-- XA070 EXEMPT -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:488px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt32013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:488px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt32014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:502px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt32015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:516px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt32016" class="smallBold" style="font-size:12px;">000</span></div>                                
                                <div style=" float:left; position:absolute; left:-1px; top:528px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt32017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:542px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt32018" class="smallBold" style="font-size:12px;">000</span></div>

                                <!-- XA080 EXEMPT -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:608px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt42013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:608px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt42014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:621px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt42015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:635px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt42016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:648px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt42017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:662px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt42018" class="smallBold" style="font-size:12px;">000</span></div>

                                <!-- XA090 EXEMPT -->
                                <div style=" float:left; position:absolute; left:-1px; top:689px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exempt5" class="smallBold" style="font-size:12px;">000</span></div>
                                
                                <!-- XA055 EXEMPT -->
                                <!--<div style=" float:left; position:absolute; left:-1px; top:765px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt112013" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:779px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt122013" class='smallBold' style="font-size:12px;"></span></div>-->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:767px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt12013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:781px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exemptXA05522013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:767px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt12014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:781px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt12015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:794px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt12016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:807px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt12017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:820px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt12018" class="smallBold" style="font-size:12px;">000</span></div>
                                
                                <!-- XA056 EXEMPT -->
                                <!--<div style=" float:left; position:absolute; left:-1px; top:859px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt212013" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:873px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt222013" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:886px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt212014" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:899px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt222014" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:912px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt212015" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:925px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt222015" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:939px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt212016" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:953px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt222016" class='smallBold' style="font-size:12px;"></span></div>-->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:861px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt22013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:875px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exemptXA05622013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:847px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt22014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:861px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exemptXA05622014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:875px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt22015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:888px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exemptXA05622015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:901px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt22016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:914px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exemptXA05622016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:927px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt22017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:941px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt22018" class="smallBold" style="font-size:12px;">000</span></div>
                                
                                <!-- XA057 EXEMPT -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:1021px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt32013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:996px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt32014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1009px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt32015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1022px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt32016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1035px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt32017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1048px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exempt32018" class="smallBold" style="font-size:12px;">000</span></div>                                
                            </div>

                            <!-- TAXABLE -->
                            <div style="position: absolute; left:548px; top:95px; height: 16px; width: 106px;">
                                <!-- XA035 TAXABLE -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:77px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_taxable12013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:77px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_taxable12014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:90px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_taxable12015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:103px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_taxable12016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:116px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_taxable12017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:130px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_taxable12018" class="smallBold" style="font-size:12px;">000</span></div>

                                <!-- XA036 TAXABLE -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:170px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_taxable22013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:170px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_taxable22014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:183px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_taxable22015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:196px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_taxable22016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:209px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_taxable22017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:223px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_taxable22018" class="smallBold" style="font-size:12px;">000</span></div>

                                <div>
                                    <!-- XA061 TAXABLE -->
                                    <!-- <div style=" float:left; position:absolute; left:-1px; top:315px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable12013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                    <div style=" float:left; position:absolute; left:-1px; top:315px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable12014" class="smallBold" style="font-size:12px;">000</span></div>
                                    <div style=" float:left; position:absolute; left:-1px; top:328px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable12015" class="smallBold" style="font-size:12px;">000</span></div>
                                    <div style=" float:left; position:absolute; left:-1px; top:342px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable12016" class="smallBold" style="font-size:12px;">000</span></div>
                                    <div style=" float:left; position:absolute; left:-1px; top:355px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable12017" class="smallBold" style="font-size:12px;">000</span></div>
                                    <div style=" float:left; position:absolute; left:-1px; top:368px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable12018" class="smallBold" style="font-size:12px;">000</span></div>
                                </div>

                                <!-- XA062 TAXABLE -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:395px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable22013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:395px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable22014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:408px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable22015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:422px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable22016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:435px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable22017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:449px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable22018" class="smallBold" style="font-size:12px;">000</span></div>

                                <!-- XA070 TAXABLE -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:488px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable32013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:488px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable32014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:502px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable32015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:516px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable32016" class="smallBold" style="font-size:12px;">000</span></div>                                
                                <div style=" float:left; position:absolute; left:-1px; top:528px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable32017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:542px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable32018" class="smallBold" style="font-size:12px;">000</span></div>

                                <!-- XA080 TAXABLE -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:608px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable42013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:608px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable42014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:621px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable42015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:635px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable42016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:648px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable42017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:662px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable42018" class="smallBold" style="font-size:12px;">000</span></div>

                                <!-- XA090 TAXABLE -->
                                <div style=" float:left; position:absolute; left:-1px; top:689px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_taxable5" class="smallBold" style="font-size:12px;">000</span></div>
                                
                                <!-- XA055 TAXABLE -->
                                <!--<div style=" float:left; position:absolute; left:-1px; top:765px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable112013" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:779px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable122013" class='smallBold' style="font-size:12px;"></span></div>-->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:767px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable12013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:781px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxableXA05522013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:767px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable12014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:781px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable12015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:794px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable12016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:807px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable12017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:820px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable12018" class="smallBold" style="font-size:12px;">000</span></div>
                                
                                <!-- XA056 TAXABLE -->
                                <!--<div style=" float:left; position:absolute; left:-1px; top:859px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable212013" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:873px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable222013" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:886px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable212014" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:899px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable222014" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:912px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable212015" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:925px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable222015" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:939px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable212016" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:953px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable222016" class='smallBold' style="font-size:12px;"></span></div>-->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:861px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable22013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:875px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxableXA05622013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:847px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable22014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:861pX;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxableXA05622014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:875px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable22015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:888px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxableXA05622015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:901px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable22016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:914px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxableXA05622016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:927px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable22017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:941px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable22018" class="smallBold" style="font-size:12px;">000</span></div>
                                
                                <!-- XA057 TAXABLE -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:1021px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable32013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:996px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable32014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1009px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable32015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1022px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable32016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1035px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable32017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1048px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_taxable32018" class="smallBold" style="font-size:12px;">000</span></div>                       
                            </div>

                            <!-- TAX DUE -->
                            <div style="position: absolute; left:673px; top:95px; height: 16px; width: 106px;">
                                <!-- XA035 TAX DUE -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:77px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exciseTaxDue12013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:77px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exciseTaxDue12014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:90px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exciseTaxDue12015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:103px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exciseTaxDue12016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:116px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exciseTaxDue12017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:130px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exciseTaxDue12018" class="smallBold" style="font-size:12px;">000</span></div>

                                <!-- XA036 TAX DUE -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:170px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exciseTaxDue22013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:170px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exciseTaxDue22014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:183px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exciseTaxDue22015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:196px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exciseTaxDue22016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:209px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exciseTaxDue22017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:223px;  width: 106px; text-align: right; height: 15px;"><span id="xa1_exciseTaxDue22018" class="smallBold" style="font-size:12px;">000</span></div>

                                <div>
                                    <!-- XA061 TAX DUE -->
                                    <!-- <div style=" float:left; position:absolute; left:-1px; top:315px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue12013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                    <div style=" float:left; position:absolute; left:-1px; top:315px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue12014" class="smallBold" style="font-size:12px;">000</span></div>
                                    <div style=" float:left; position:absolute; left:-1px; top:328px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue12015" class="smallBold" style="font-size:12px;">000</span></div>
                                    <div style=" float:left; position:absolute; left:-1px; top:342px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue12016" class="smallBold" style="font-size:12px;">000</span></div>
                                    <div style=" float:left; position:absolute; left:-1px; top:355px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue12017" class="smallBold" style="font-size:12px;">000</span></div>
                                    <div style=" float:left; position:absolute; left:-1px; top:368px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue12018" class="smallBold" style="font-size:12px;">000</span></div>
                                </div>

                                <!-- XA062 TAX DUE -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:395px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue22013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:395px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue22014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:408px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue22015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:422px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue22016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:435px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue22017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:449px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue22018" class="smallBold" style="font-size:12px;">000</span></div>

                                <!-- XA070 TAX DUE -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:488px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue32013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:488px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue32014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:502px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue32015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:516px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue32016" class="smallBold" style="font-size:12px;">000</span></div>                                
                                <div style=" float:left; position:absolute; left:-1px; top:528px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue32017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:542px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue32018" class="smallBold" style="font-size:12px;">000</span></div>

                                <!-- XA080 TAX DUE -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:608px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue42013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:608px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue42014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:621px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue42015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:635px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue42016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:648px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue42017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:662px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue42018" class="smallBold" style="font-size:12px;">000</span></div>

                                <!-- XA090 TAX DUE -->
                                <div style=" float:left; position:absolute; left:-1px; top:689px;  width: 106px; text-align: right; height: 15px;"><span id="xa2_exciseTaxDue5" class="smallBold" style="font-size:12px;">000</span></div>
                                
                                <!-- XA055 TAX DUE -->
                                <!--<div style=" float:left; position:absolute; left:-1px; top:765px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue112013" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:779px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue122013" class='smallBold' style="font-size:12px;"></span></div>-->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:767px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue12013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:781px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDueXA05522013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:767px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue12014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:781px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue12015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:794px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue12016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:807px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue12017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:820px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue12018" class="smallBold" style="font-size:12px;">000</span></div>
                                
                                <!-- XA056 TAX DUE -->
                                <!--<div style=" float:left; position:absolute; left:-1px; top:859px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue212013" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:873px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue222013" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:886px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue212014" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:899px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue222014" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:912px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue212015" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:925px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue222015" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:939px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue212016" class='smallBold' style="font-size:12px;"></span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:953px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue222016" class='smallBold' style="font-size:12px;"></span></div>-->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:861px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue22013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:875px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDueXA05622013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:847px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue22014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:861px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDueXA05622014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:875px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue22015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:888px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDueXA05622015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:901px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue22016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:914px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDueXA05622016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:927px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue22017" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:941px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue22018" class="smallBold" style="font-size:12px;">000</span></div>
                                
                                <!-- XA057 TAX DUE -->
                                <!-- <div style=" float:left; position:absolute; left:-1px; top:1021px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue32013" class="smallBold" style="font-size:12px;">000</span></div> -->
                                <div style=" float:left; position:absolute; left:-1px; top:996px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue32014" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1009px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue32015" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1022px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue32016" class="smallBold" style="font-size:12px;">000</span></div>
                                <div style=" float:left; position:absolute; left:-1px; top:1035px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue32017" class="smallBold" style="font-size:12px;">000</span></div>  
                                <div style=" float:left; position:absolute; left:-1px; top:1048px;  width: 106px; text-align: right; height: 15px;"><span id="xa3_exciseTaxDue32018" class="smallBold" style="font-size:12px;">000</span></div>                              
                            </div> 

                            <!-- OTHER SPECIFY -->
                            <div style="position: absolute; left:15px; top:1171px; height: 16px; width: 106px;">
                                <div style=" float:left; position:absolute; left:16px; top:0px;  width: 14px; height: 15px;"><span id="sched1Atc0" class="smallBold" style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:40px; top:0px;  width: 196px; height: 13px;"><span id="sched1Desc0" class="smallBold" style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:241px; top:0px;  width: 89px; text-align: center; height: 12px;"><span id="sched1TaxBracket0" class="smallBold" style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:336px; top:0px;  width: 56px; text-align: center; height: 12px;"><span id="sched1AppRate0" class="smallBold" style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:399px; top:0px;  width: 119px; text-align: right; height: 14px;"><span id="sched1Exempt0" class="smallBold" style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:521px; top:0px;  width: 122px; text-align: right; height: 12px;"><span id="sched1Taxable0" class="smallBold" style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:646px; top:0px;  width: 118px; text-align: right; height: 11px;"><span id="sched1ExciseTaxDue0" class="smallBold" style="font-size:11px;">000</span></div>
                                <div style=" float:left; position:absolute; left:647px; top:19px;  width: 117px; text-align: right; height: 16px;"><span id="totalTaxDue" class="smallBold" style="font-size:11px;">000</span></div>
                            </div>
                            <div id="DummyTxt" style='display:none;'>  </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Start Modal for Schedule 1-->
            <div id="modalSched1" class="printSignFooterClass schedule1" style="padding: 5px; margin: auto; width: 77%; display: none; background: #fff; position: relative;"> 
                <br/>            
                <table class="tblSched1_2200A" border="1" style="width: 800px; margin: 0px auto;">
                    <tr class="modalHeader">
                        <td style="text-align: center; font-weight: bold;" nowrap>
                            SCHEDULE 1                          
                        </td>
                        <td colspan="6" style="text-align: center; font-weight: bold;">                         
                            SUMMARY OF REMOVALS AND EXCISE TAX DUE ON ALCOHOL PRODUCTS CHARGEABLE AGAINST PAYMENT
                        </td>
                    </tr>
                    <tr name="sched1Print">
                        <td colspan="7">&nbsp;</td>
                    </tr>           
                    <tr class="modalColumnHeader">
                        <td rowspan="2" style="text-align: center;">ATC</td>
                        <td rowspan="2" style="text-align: center;">Description</td>
                        <td rowspan="2" style="text-align: center;">Tax Bracket / Unit of Measure</td>
                        <td rowspan="2" style="text-align: center;">Applicable Tax Rate</td>
                        <td colspan="2" style="text-align: center;">Tax Base (Value / Volume of Removal)</td>
                        <td rowspan="2" style="text-align: center;">Basic Excise Tax Due</td>
                    </tr>
                    <tr class="modalColumnHeader">
                        <td style="text-align: center;">Export / Exempt</td>
                        <td style="text-align: center;">Taxable</td>
                    </tr>
                    
                    <!-- DISTILLED SPIRITS START -->
                    <tr id="frm2200A:distilledHeader" class="modalColumnHeader" name="sched1Print">
                        <td>&nbsp;</td>
                        <td colspan="6" style="text-align:left" ><b>1. Distilled Spirits</b></td>
                    </tr>
                    <tr id="frm2200A:XA035" name="sched1Print">
                        <td class="modalContent" style="text-align:center"></td>
                        <td class="modalContent" style="text-align:left; width: 200px;"></td>
                    <td class="modalContent" style="text-align:center">NRP Per Proof <br /><a href='#' onclick="openDialogForATC3536('#CalculatorXA035Bottle')">Calculator (Bottle)</a>
                                                                        <br /> <a href='#' onclick="openDialogForATC3536('#CalculatorXA035Bulk')">Calculator (Bulk)</a></td>
                        <td class="modalContent" style="text-align:center" id="frm2200A:xa1_taxable1rate"></td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa1_exempt1" id="frm2200A:xa1_exempt1" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this)" onkeypress="return numbersonly(this, event)" />
                        </td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa1_taxable1" id="frm2200A:xa1_taxable1" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this); computeSched1Alcohol(this, 'frm2200A:xa1_exciseTaxDue1')" onkeypress="return numbersonly(this, event)" />
                            <input type="hidden" name="frm2200A:xa1_taxable1ratehidden" id="frm2200A:xa1_taxable1ratehidden" />
                            <input type="text" id="CalcSubTotalXA035" name="CalcSubTotalXA035" style="display: none;" />
                        </td>
                        <td align="center">
                            <input type="text" name="frm2200A:xa1_exciseTaxDue1" id="frm2200A:xa1_exciseTaxDue1" style="background-color: rgb(220, 220, 220); text-align:right" size="19" maxlength="25" value="0.00" />
                        </td>
                    </tr>
                    <tr id="frm2200A:XA036" name="sched1Print">
                        <td class="modalContent" style="text-align:center"></td>
                        <td class="modalContent" style="text-align:left; width: 200px;"></td>
                        <td class="modalContent" style="text-align:center">
                                Per Proof Liter
                                <br /><a href='#' onclick="openDialogForATC3536('#CalculatorXA036Bottle')"> Calculator (Bottle) </a>
                                <br /><a href='#' onclick="openDialogForATC3536('#CalculatorXA036Bulk')"> Calculator (Bulk) </a>
                        </td>
                        <td class="modalContent" style="text-align:center" id="frm2200A:xa1_taxable2rate"></td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa1_exempt2" id="frm2200A:xa1_exempt2" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this)" onkeypress="return numbersonly(this, event)" />
                        </td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa1_taxable2" id="frm2200A:xa1_taxable2" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this); computeSched1Alcohol(this, 'frm2200A:xa1_exciseTaxDue2')" onkeypress="return numbersonly(this, event)" />
                            <input type="hidden" name="frm2200A:xa1_taxable2ratehidden" id="frm2200A:xa1_taxable2ratehidden" />
                            <input type="text" id="CalcSubTotalXA036" name="CalcSubTotalXA036" style="display: none;" />
                        </td>
                        <td align="center">
                            <input type="text" name="frm2200A:xa1_exciseTaxDue2" id="frm2200A:xa1_exciseTaxDue2" style="background-color: rgb(220, 220, 220); text-align:right" size="19" maxlength="25" value="0.00" />
                        </td>
                    </tr>
                    <!-- DISTILLED SPIRITS END -->
                    
                    <!-- WINES START -->
                    <tr id="frm2200A:winesHeader" class="modalColumnHeader" name="sched1Print">
                        <td>&nbsp;</td>
                        <td colspan="6" style="text-align:left" ><b>2. Wines</b></td>
                    </tr>
                    <tr id="frm2200A:XA061" name="sched1Print">
                        <td class="modalContent" style="text-align:center"></td>
                        <td class="modalContent" style="text-align:left; width: 200px;"></td>
                        <td class="modalContent" style="text-align:center">Per Liter <br /><a href='#' onclick="openDialog('#CalculatorXA061')"> Calculator </a></td>
                        <td class="modalContent" style="text-align:center" id="frm2200A:xa2_taxable1rate"></td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa2_exempt1" id="frm2200A:xa2_exempt1" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this)" onkeypress="return numbersonly(this, event)" />
                        </td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa2_taxable1" id="frm2200A:xa2_taxable1" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this); computeSched1Alcohol(this, 'frm2200A:xa2_exciseTaxDue1')" onkeypress="return numbersonly(this, event)" />
                            <input type="hidden" name="frm2200A:xa2_taxable1ratehidden" id="frm2200A:xa2_taxable1ratehidden" />
                        </td>
                        <td align="center">
                            <input type="text" name="frm2200A:xa2_exciseTaxDue1" id="frm2200A:xa2_exciseTaxDue1" style="background-color: rgb(220, 220, 220); text-align:right" size="19" maxlength="25" value="0.00" />
                        </td>
                    </tr>
                    <tr id="frm2200A:XA062" name="sched1Print">
                        <td class="modalContent" style="text-align:center"></td>
                        <td class="modalContent" style="text-align:left; width: 200px;"></td>
                        <td class="modalContent" style="text-align:center">Per Liter <br /><a href='#' onclick="openDialog('#CalculatorXA062')"> Calculator </a></td>
                        <td class="modalContent" style="text-align:center" id="frm2200A:xa2_taxable2rate"></td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa2_exempt2" id="frm2200A:xa2_exempt2" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this)" onkeypress="return numbersonly(this, event)" />
                        </td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa2_taxable2" id="frm2200A:xa2_taxable2" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this); computeSched1Alcohol(this, 'frm2200A:xa2_exciseTaxDue2')" onkeypress="return numbersonly(this, event)" />
                            <input type="hidden" name="frm2200A:xa2_taxable2ratehidden" id="frm2200A:xa2_taxable2ratehidden" />
                        </td>
                        <td align="center">
                            <input type="text" name="frm2200A:xa2_exciseTaxDue2" id="frm2200A:xa2_exciseTaxDue2" style="background-color: rgb(220, 220, 220); text-align:right" size="19" maxlength="25" value="0.00" />
                        </td>
                    </tr>
                    <tr id="frm2200A:XA070" name="sched1Print">
                        <td class="modalContent" style="text-align:center"></td>
                        <td class="modalContent" style="text-align:left; width: 200px;"></td>
                        <td class="modalContent" style="text-align:center">Per Liter <br /><a href='#' onclick="openDialog('#CalculatorXA070')"> Calculator </a></td>
                        <td class="modalContent" style="text-align:center" id="frm2200A:xa2_taxable3rate"></td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa2_exempt3" id="frm2200A:xa2_exempt3" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this)" onkeypress="return numbersonly(this, event)" />
                        </td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa2_taxable3" id="frm2200A:xa2_taxable3" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this); computeSched1Alcohol(this, 'frm2200A:xa2_exciseTaxDue3')" onkeypress="return numbersonly(this, event)" />
                            <input type="hidden" name="frm2200A:xa2_taxable3ratehidden" id="frm2200A:xa2_taxable3ratehidden" />
                        </td>
                        <td align="center">
                            <input type="text" name="frm2200A:xa2_exciseTaxDue3" id="frm2200A:xa2_exciseTaxDue3" style="background-color: rgb(220, 220, 220); text-align:right" size="19" maxlength="25" value="0.00" />
                        </td>
                    </tr>
                    <tr id="frm2200A:XA080" name="sched1Print">
                        <td class="modalContent" style="text-align:center"></td>
                        <td class="modalContent" style="text-align:left; width: 200px;"></td>
                        <td class="modalContent" style="text-align:center">Per Liter <br /><a href='#' onclick="openDialog('#CalculatorXA080')"> Calculator </a></td>
                        <td class="modalContent" style="text-align:center" id="frm2200A:xa2_taxable4rate"></td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa2_exempt4" id="frm2200A:xa2_exempt4" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this)" onkeypress="return numbersonly(this, event)" />
                        </td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa2_taxable4" id="frm2200A:xa2_taxable4" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this); computeSched1Alcohol(this, 'frm2200A:xa2_exciseTaxDue4')" onkeypress="return numbersonly(this, event)" />
                            <input type="hidden" name="frm2200A:xa2_taxable4ratehidden" id="frm2200A:xa2_taxable4ratehidden" />
                        </td>
                        <td align="center">
                            <input type="text" name="frm2200A:xa2_exciseTaxDue4" id="frm2200A:xa2_exciseTaxDue4" style="background-color: rgb(220, 220, 220); text-align:right" size="19" maxlength="25" value="0.00" />
                        </td>
                    </tr>
                    <tr id="frm2200A:XA090" name="sched1Print">
                        <td class="modalContent" style="text-align:center">XA090</td>
                        <td class="modalContent" style="text-align:left; width: 200px;">d.) Fortified wines containing more than 25% of alcohol by volume</td>
                        <td class="modalContent" style="text-align:center">Per Proof Liter</td>
                        <td class="modalContent" style="text-align:center">
                            Tax as Distilled Spirits
                            <!-- <input type="text" name="frm2200A:xa2_rate5" id="frm2200A:xa2_rate5" style="text-align:right" size="17" maxlength="15" value="0.00" onblur="round(this,2); computeXA090()" onkeypress="return numbersonly(this, event)" /> -->
                        </td>
                        <td align="center">
                            <input type="text" name="frm2200A:xa2_exempt5" id="frm2200A:xa2_exempt5" style="text-align:right" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this)" onkeypress="return numbersonly(this, event)" />
                        </td>
                        <td align="center">
                            <input type="text" name="frm2200A:xa2_taxable5" id="frm2200A:xa2_taxable5" style="text-align:right" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this);" onkeypress="return numbersonly(this, event)" />
                            <input type="hidden" name="frm2200A:xa2_taxable5ratehidden" id="frm2200A:xa2_taxable5ratehidden" value="0.00" />
                            <!-- <input type="text" name="frm2200A:xa2_taxable5" id="frm2200A:xa2_taxable5" style="text-align:right" size="17" maxlength="15" value="0.00" onblur="round(this,2); computeXA090()" onkeypress="return numbersonly(this, event)" /> -->
                        </td>
                        <td align="center">
                            <input type="text" name="frm2200A:xa2_exciseTaxDue5" id="frm2200A:xa2_exciseTaxDue5" style="text-align:right" size="19" maxlength="15" value="0.00" onblur="roundDownWithAlert(this); computeSched1TotalTaxDue(this);" onkeypress="return numbersonly(this, event)" />
                        </td>
                    </tr>           
                    <!-- WINES END -->
                    
                    <!-- FERMENTED LIQUORS START -->
                    <tr id="frm2200A:fermentedHeader" class="modalColumnHeader" name="sched1Print">
                        <td>&nbsp;</td>
                        <td colspan="6" style="text-align:left" ><b>3. Fermented Liquors</b></td>
                    </tr>
                    <tr id="frm2200A:XA055" name="sched1Print">
                        <td class="modalContent" style="text-align:center"></td>
                        <td class="modalContent" style="text-align:left; width: 200px;"></td>
                        <td class="modalContent" style="text-align:center">Per Liter <br /><a href='#' onclick="openDialog('#CalculatorXA055')"> Calculator </a></td>
                        <td class="modalContent" style="text-align:center" id="frm2200A:xa3_taxable1rate"></td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa3_exempt1" id="frm2200A:xa3_exempt1" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this)" onkeypress="return numbersonly(this, event)" />
                        </td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa3_taxable1" id="frm2200A:xa3_taxable1" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this); computeSched1Alcohol(this, 'frm2200A:xa3_exciseTaxDue1')" onkeypress="return numbersonly(this, event)" />
                            <input type="hidden" name="frm2200A:xa3_taxable1ratehidden" id="frm2200A:xa3_taxable1ratehidden" />
                        </td>
                        <td align="center">
                            <input type="text" name="frm2200A:xa3_exciseTaxDue1" id="frm2200A:xa3_exciseTaxDue1" style="background-color: rgb(220, 220, 220); text-align:right" size="19" maxlength="25" value="0.00" />
                        </td>
                    </tr>
                    <tr id="frm2200A:XA056" name="sched1Print">
                        <td class="modalContent" style="text-align:center"></td>
                        <td class="modalContent" style="text-align:left; width: 200px;"></td>
                        <td class="modalContent" style="text-align:center">Per Liter <br /><a href='#' onclick="openDialog('#CalculatorXA056')"> Calculator </a></td>
                        <td class="modalContent" style="text-align:center" id="frm2200A:xa3_taxable2rate"></td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa3_exempt2" id="frm2200A:xa3_exempt2" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this)" onkeypress="return numbersonly(this, event)" />
                        </td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa3_taxable2" id="frm2200A:xa3_taxable2" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this); computeSched1Alcohol(this, 'frm2200A:xa3_exciseTaxDue2')" onkeypress="return numbersonly(this, event)" />
                            <input type="hidden" name="frm2200A:xa3_taxable2ratehidden" id="frm2200A:xa3_taxable2ratehidden" />
                        </td>
                        <td align="center">
                            <input type="text" name="frm2200A:xa3_exciseTaxDue2" id="frm2200A:xa3_exciseTaxDue2" style="background-color: rgb(220, 220, 220); text-align:right" size="19" maxlength="25" value="0.00" />
                        </td>
                    </tr>
                    <tr id="frm2200A:XA057" name="sched1Print">
                        <td class="modalContent" style="text-align:center"></td>
                        <td class="modalContent" style="text-align:left; width: 200px;"></td>
                        <td class="modalContent" style="text-align:center">Per Liter <br /><a href='#' onclick="openDialog('#CalculatorXA057')"> Calculator </a></td>
                        <td class="modalContent" style="text-align:center" id="frm2200A:xa3_taxable3rate"></td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa3_exempt3" id="frm2200A:xa3_exempt3" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this)" onkeypress="return numbersonly(this, event)" />
                        </td>
                        <td align="center">
                            <input type="text" style="text-align:right" name="frm2200A:xa3_taxable3" id="frm2200A:xa3_taxable3" size="17" maxlength="15" value="0.00" onblur="roundDownWithAlert(this); computeSched1Alcohol(this, 'frm2200A:xa3_exciseTaxDue3')" onkeypress="return numbersonly(this, event)" />
                            <input type="hidden" name="frm2200A:xa3_taxable3ratehidden" id="frm2200A:xa3_taxable3ratehidden" />
                        </td>
                        <td align="center">
                            <input type="text" name="frm2200A:xa3_exciseTaxDue3" id="frm2200A:xa3_exciseTaxDue3" style="background-color: rgb(220, 220, 220); text-align:right" size="19" maxlength="25" value="0.00" />
                        </td>
                    </tr>
                    <!-- FERMENTED LIQUORS END -->
                    
                    <!-- OTHERS -->
                    <tr>
                        <td>&nbsp;</td>
                        <td class="modalColumnHeader" colspan="6" style="text-align:left" ><b>4. Others (Please specify)</b></td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <table id="frm2200AadditionalSched1" class="tblSched1_2200A" border="1" style="width: 798px;">
                                <tr id="frm2200A:additionalSched1Row0" style="text-align: center;" name="sched1Print">
                                    <td><input type="checkbox" name="frm2200A:sched1Chk0" id="frm2200A:sched1Chk0" value="1" style="display: none;" /></td>
                                    <td><input size="4" type="text" style="text-align:center;" name="frm2200A:sched1Atc[]" id="frm2200A:sched1Atc0" value="XA" maxlength="5" onchange="capitalize(this);checkATCValue(this);checkUniqueRate(0);" onkeypress="return letternumber(event)"/></td>
                                    <td><input size="24" type="text" name="frm2200A:sched1Desc[]" id="frm2200A:sched1Desc0" value="" maxlength="255" /></td>
                                    <td><input size="15" type="text" name="frm2200A:sched1TaxBracket[]" id="frm2200A:sched1TaxBracket0" maxlength="20" /></td>
                                    <td><input size="8" type="text" style="text-align:right" name="frm2200A:sched1AppRate[]" id="frm2200A:sched1AppRate0" maxlength="6" value="0.00" onblur="setApplicableTaxrate(this); checkUniqueRate(0); computeDynamicSched1(0)" onkeypress="return numbersonly(this, event)" /></td>
                                    <td><input size="17" type="text" style="text-align:right" name="frm2200A:sched1Exempt[]" id="frm2200A:sched1Exempt0"  maxlength="15" value="0.00" onblur="roundDownWithAlert(this)" onkeypress="return numbersonly(this, event)" /></td>
                                    <td><input size="17" type="text" style="text-align:right" name="frm2200A:sched1Taxable[]" id="frm2200A:sched1Taxable0" maxlength="15" value="0.00" onblur="roundDownWithAlert(this); computeDynamicSched1(0)" onkeypress="return numbersonly(this, event)" /></td>
                                    <td><input size="19" type="text" style="text-align:right" name="frm2200A:sched1ExciseTaxDue[]" id="frm2200A:sched1ExciseTaxDue0" style="background-color: rgb(220, 220, 220);" maxlength="25" value="0.00" /></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <table id="frm2200A:sched1Footer" style="width: 800px; margin: 0px auto;" name="sched1Print">
                    <tr>
                        <td colspan="7" height="10">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="7" style="text-align: right;">
                            <input style="width: 80px;" type="button" name="frm2200A:btnAdd" id="frm2200A:btnAdd" value="Add" onClick="addFieldsForSched1()" />
                        
                            <input style="width: 80px;" type="button" name="frm2200A:btnDelete" id="frm2200A:btnDelete" value="Delete" onClick="deleteFieldForSched1()" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" height="10">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align: left;" class="modalColumnHeader"><b>TOTAL TAX DUE (to Item 18)</b></td>
                        <td style="text-align: right;">
                            <input type="text" name="frm2200A:totalTaxDue" style="background-color: rgb(220, 220, 220); text-align:right" id="frm2200A:totalTaxDue" size="21" maxlength="25" value="0.00" />                            
                        </td>               
                    </tr>
                    <tr>
                        <td style="text-align: center;" colspan="7">
                            <input type="button" class="printButtonClass" name="frm2200A:btnPrintSched1" id="frm2200A:btnPrintSched1" value="PRINT PREVIEW" onClick="printOCR()" disabled />
                            <input style="width: 80px;" type="button" class="printButtonClass" name="frm2200A:btnOK" id="frm2200A:btnOK" value="OK" onClick="sched1OK()" />
                            <input style="width: 80px;" type="button" class="printButtonClass" name="frm2200A:btnClear" id="frm2200A:btnClear" value="CLEAR" onClick="clearSched1(false);" />
                            <input style="width: 80px;" type="button" class="printButtonClass" name="frm2200A:btnCancelSched1" id="frm2200A:btnCancelSched1" value="CANCEL" onClick="cancelSched1(); hideSched1();" />
                        </td>
                    </tr>
                </table>
                <br/>
            </div>
            <!--End Modal for Schedule 1-->

            <!-- MODAL CALCULATOR -->

            <!-- start of modal calculator XA035 Bottle -->
            <div id="CalculatorXA035Bottle" class="modalShow" style="display: none; text-align:center;margin: auto;">
                <br />
                <div class="SubPageDiv">
                    <div id="TitleCalculatorXA035Bottle" style="display: none; text-align: left; font-size: 12px;">
                        TIN: <span name="calcTIN"></span>
                        <br />Date computed: <span id="dateComputedXA035Bottle"></span>
                        <br />
                    </div>
                    <div style="text-align:center;">
                        <table id="tblCalcHeaderXA035Bottle" class="RowSubTable tblForm tblCalcHeader" style="width: 98%;margin: auto; text-align:center; font-size: 12px;">
                            <tr>
                                <th width="45px"></th>
                                <th width="155px"></th>
                                <th width="100px"></th>
                                <th width="100px"></th>
                                <th width="120px"></th>
                                <th width="120px"></th>
                                <th width="50px"></th>
                                <th width="65px"></th>
                                <th width="150px"></th>
                            </tr>
                            <tr>
                                <td colspan="9">A. AD VALOREM TAX (XA035) - BOTTLE CALCULATOR</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="3">QUANTITY</td>
                                <td rowspan="2">NRP Per Bottle</td>
                                <td rowspan="2">Alc.<br/>Strength<br/>(%)</td>
                                <td rowspan="2">Proof</td>
                                <td rowspan="2">Tax Base</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td rowspan="2">BRAND</td>
                                <td>Cases</td>
                                <td>Bottles
                                    <br/>Per Case</td>
                                <td>Total
                                    <br/>Bottles</td>

                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="CalcCheckXA035Bottle" name='CalcCheckXA035Bottle' onclick="selectAll(this, '#divCalculatorXA035Bottle')">
                                </td>
                                <td>A</td>
                                <td>B</td>
                                <td>C = [A][B]</td>
                                <td>D</td>
                                <td>E</td>
                                <td>F = [E x 2]</td>
                                <td>C x D x F</td>
                            </tr>
                        </table>
                    </div>
                    <div id="divCalculatorXA035Bottle" class="tblForm noCellSpace schedule1 divCalcBody" border="0" style="width: 100%">
                    </div>
                    <div style="text-align:center;">
                        <table id="tblCalcTotalTableXA035Bottle" class="RowSubTable, tblForm" style="width: 98%;margin:auto; text-align:left; border: 1px solid #3B3131;">
                            <tr>
                                <td colspan="2" style="text-align:left; border: 1px solid #3B3131;">

                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value=" Add " onclick="AddRowXA035Bottle(false)" />
                                        <input type="button" value=" Delete " onclick="deleteRows('#divCalculatorXA035Bottle', ['XA035', 'xa1_taxable1', 'CalculatorXA035Bottle', 'XA035Bottle']), FixId('#divCalculatorXA035Bottle','XA035Bottle', 9)" />
                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="width:800px; text-align:left; border: 1px solid #3B3131;">
                                    
                                        <span style="font-weight: bold; font-size: small; text-align:left;">Total Tax Base: </span>
                                    
                                </td>
                                <td style="text-align:right; border: 1px solid #3B3131;">
                                    <input type="text" id="CalcSubTotalXA035Bottle" name="CalcSubTotalXA035Bottle" disabled="disabled" class="isDisabled" style="text-align:right;" value="0.00" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Compute " onclick="computeToSchedule1('XA035', 'xa1_taxable1', 'CalculatorXA035Bottle', 'XA035Bottle'), setCalcDate('XA035Bottle')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Print " onclick="printModal('CalculatorXA035Bottle');" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Close " onclick="cancelCalcu('#CalculatorXA035Bottle')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Clear " onclick="clearCalc('#divCalculatorXA035Bottle',['XA035', 'xa1_taxable1', 'CalculatorXA035Bottle', 'XA035Bottle'])" />&nbsp;&nbsp;&nbsp;

                            <br />

                        
                    </div>
                </div>
                <br />
            </div>
            <!-- end of modal calculator XA035 Bottle -->

            <!-- start of modal calculator XA035 Bulk-->
            <div id="CalculatorXA035Bulk" class="modalShow" style="display: none; text-align:center;margin: auto;">
                <br />
                <div class="SubPageDiv">
                    <div id="TitleCalculatorXA035Bulk" style="display: none; text-align: left; font-size: 12px;">
                        TIN: <span name="calcTIN"></span>
                        <br />Date computed: <span id="dateComputedXA035Bulk"></span>
                        <br />
                    </div>
                    <div style="text-align:center;">
                        <table id="tblCalcHeaderXA035" class="RowSubTable tblForm tblCalcHeader" style="width:700px; margin:auto; text-align:center; font-size: 12px;">
                            <tr>
                                <td colspan="6">A. AD VALOREM TAX (XA035) - BULK CALCULATOR</td>
                            </tr>
                            <tr>
                                <td style="width: 20px;" rowspan="2">
                                    <input type="checkbox" id="CalcCheckXA035Bulk" name='CalcCheckXA035Bulk' onclick="selectAll(this, '#divCalculatorXA035Bulk')">
                                </td>
                                <td rowspan="2">BRAND</td>
                                <td style="width: 180px;">NRP</td>
                                <td style="width: 70px;">Alcohol Strength (%)</td>
                                <td style="width: 70px;">Proof</td>
                                <td style="width: 180px;">Tax Base</td>
                            </tr>
                            <tr>
                                <td>A</td>
                                <td>B</td>
                                <td>C = [B * 2]</td>
                                <td>D = [A * C]</td>
                            </tr>
                        </table>
                    </div>

                    <div id="divCalculatorXA035Bulk" class="tblForm noCellSpace schedule1 divCalcBody" border="0" style="width:700px;margin:auto;">
                    </div>

                    <div style="text-align:center;">
                        <table id="tblCalcTotalTableXA035Bulk" class="RowSubTable, tblForm" style="margin:auto;width: 700px; text-align:left; border: 1px solid #3B3131;">
                            <tr>
                                <td colspan="2" style="text-align:left; border: 1px solid #3B3131;">

                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value=" Add " onclick="AddRowXA035Bulk(false)" />
                                        <input type="button" value=" Delete " onclick="deleteRows('#divCalculatorXA035Bulk', ['XA035', 'xa1_taxable1', 'CalculatorXA035Bulk', 'XA035Bulk']), FixId('#divCalculatorXA035Bulk','XA035Bulk', 6)" />
                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="width:800px; text-align:left; border: 1px solid #3B3131;">
                                    
                                        <span style="font-weight: bold; font-size: small; text-align:left;">Total Tax Base: </span>
                                    
                                </td>
                                <td style="text-align:right; border: 1px solid #3B3131;">
                                    <input type="text" id="CalcSubTotalXA035Bulk" name="CalcSubTotalXA035Bulk" disabled="disabled" class="isDisabled" style="text-align: right;" value="0.00" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Compute " onclick="computeToSchedule1('XA035', 'xa1_taxable1', 'CalculatorXA035Bulk', 'XA035Bulk'), setCalcDate('XA035Bulk');" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Print " onclick="printModal('CalculatorXA035Bulk');" />&nbsp;&nbsp;&nbsp;                        
                            <input type="button" value=" Close " onclick="cancelCalcu('#CalculatorXA035Bulk')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Clear " onclick="clearCalc('#divCalculatorXA035Bulk', ['XA035', 'xa1_taxable1', 'CalculatorXA035Bulk', 'XA035Bulk'])" />&nbsp;&nbsp;&nbsp;

                            <br />
                        
                    </div>
                </div>
                <br />
            </div>
            <!-- end of modal calculator XA035 Bulk -->

            <!-- start of modal calculator XA036 Bottle-->
            <div id="CalculatorXA036Bottle" class="modalShow" style="display: none; text-align:center;margin: auto;">
                <br />
                <div class="SubPageDiv">
                    <div id="TitleCalculatorXA036Bottle" style="display: none; text-align: left; font-size: 12px;">
                        TIN: <span name="calcTIN"></span>
                        <br />Date computed: <span id="dateComputedXA036Bottle"></span>
                        <br />
                    </div>
                    <div style="text-align:center;">
                        <table id="tblCalcHeaderXA036" class="RowSubTable tblForm tblCalcHeader" style="width: 98%; text-align:center; font-size: 12px;margin:auto;">
                            <tr>
                                <th width="20px"></th>
                                <th width="155px"></th>
                                <th width="100px"></th>
                                <th width="100px"></th>
                                <th width="120px"></th>
                                <th width="120px"></th>
                                <th width="50px"></th>
                                <th width="65px"></th>
                                <th width="130px"></th>
                                <th width="150px"></th>
                            </tr>
                            <tr>
                                <td colspan="10">B. SPECIFIC TAX (XA036) - BOTTLE CALCULATOR</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="3">QUANTITY</td>
                                <td rowspan="2">Bottle Content
                                    <br />(in L)</td>
                                <td rowspan="2">Alcohol Strength (%)</td>
                                <td rowspan="2">Proof</td>
                                <td rowspan="2">Proof per Bottle</td>
                                <td rowspan="2">Tax Base</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td rowspan="2">BRAND</td>
                                <td>Cases</td>
                                <td>Bottles per Case</td>
                                <td>Total Bottles</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="CalcCheckXA036Bottle" name='CalcCheckXA036Bottle' onclick="selectAll(this, '#divCalculatorXA036Bottle')">
                                </td>
                                <td>A</td>
                                <td>B</td>
                                <td>C = [A * B]</td>
                                <td>D</td>
                                <td>E</td>
                                <td>F = [E * 2]</td>
                                <td>G = [D * F]</td>
                                <td>C * G</td>
                            </tr>
                        </table>
                    </div>

                    <div id="divCalculatorXA036Bottle" class="tblForm noCellSpace schedule1 divCalcBody" border="0" style="width: 98%;margin:auto;">
                    </div>

                    <div style="text-align:center;">
                        <table id="tblCalcTotalTableXA036Bottle" class="RowSubTable, tblForm" style="width: 98%;margin:auto; text-align:left; border: 1px solid #3B3131;">
                            <tr>
                                <td colspan="2" style="text-align:left; border: 1px solid #3B3131;">

                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value=" Add " onclick="AddRowXA036('Bottle',false)" />
                                        <input type="button" value=" Delete " onclick="deleteRows('#divCalculatorXA036Bottle', ['XA036', 'xa1_taxable2', 'CalculatorXA036Bottle', 'XA036Bottle']), FixId('#divCalculatorXA036Bottle','XA036Bottle', 10)" />
                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="width:800px; text-align:left; border: 1px solid #3B3131;">
                                    
                                        <span style="font-weight: bold; font-size: small; text-align:left;">Total Tax Base: </span>
                                    
                                </td>
                                <td style="text-align:right; border: 1px solid #3B3131;">
                                    <input type="text" id="CalcSubTotalXA036Bottle" name="CalcSubTotalXA036Bottle" disabled="disabled" class="isDisabled" style="text-align: right;" value="0.00" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Compute " onclick="computeToSchedule1('XA036', 'xa1_taxable2', 'CalculatorXA036Bottle', 'XA036Bottle'), setCalcDate('XA036Bottle');" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Print " onclick="printModal('CalculatorXA036Bottle')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Close " onclick="cancelCalcu('#CalculatorXA036Bottle')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Clear " onclick="clearCalc('#divCalculatorXA036Bottle', ['XA036', 'xa1_taxable2', 'CalculatorXA036Bottle', 'XA036Bottle'])" />&nbsp;&nbsp;&nbsp;
                            <br />
                        
                    </div>
                </div>
                <br />
            </div>
            <!-- end of modal calculator XA036 Bottle -->

            <!-- start of modal calculator XA036 Bulk-->
            <div id="CalculatorXA036Bulk" class="modalShow" style="display: none; text-align:center;margin: auto;">
                <br />
                <div class="SubPageDiv">
                    <div id="TitleCalculatorXA036Bulk" style="display: none; text-align: left; font-size: 12px;">
                        TIN: <span name="calcTIN"></span>
                        <br />Date computed: <span id="dateComputedXA036Bulk"></span>
                        <br />
                    </div>
                    <div style="text-align:center;">
                        <table id="tblCalcHeaderXA036" class="RowSubTable tblForm tblCalcHeader" style="width:700px;margin:auto; text-align:center; font-size: 12px;">
                            <tr>
                                <td colspan="6">B. SPECIFIC TAX (XA036) - BULK CALCULATOR</td>
                            </tr>
                            <tr>
                                <td style="width: 20px;" rowspan="2">
                                    <input type="checkbox" id="CalcCheckXA036Bulk"  name='CalcCheckXA036Bulk' onclick="selectAll(this, '#divCalculatorXA036Bulk')">
                                </td>
                                <td rowspan="2">BRAND</td>
                                <td style="width: 120px;">Content (in L)</td>
                                <td style="width: 70px;">Alcohol Strength (%)</td>
                                <td style="width: 70px;">Proof</td>
                                <td style="width: 180px;">Tax Base</td>
                            </tr>
                            <tr>
                                <td>A</td>
                                <td>B</td>
                                <td>C = [B * 2]</td>
                                <td>D = [A * C]</td>
                            </tr>
                        </table>
                    </div>

                    <div id="divCalculatorXA036Bulk" class="tblForm noCellSpace schedule1 divCalcBody" border="0" style="width:700px;margin:auto">
                    </div>

                    <div style="text-align:center;">
                        <table id="tblCalcTotalTableXA036Bulk" class="RowSubTable, tblForm" style="width: 700px;margin:auto; text-align:left; border: 1px solid #3B3131;">
                            <tr>
                                <td colspan="2" style="text-align:left; border: 1px solid #3B3131;">

                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value=" Add " onclick="AddRowXA036('Bulk',false)" />
                                        <input type="button" value=" Delete " onclick="deleteRows('#divCalculatorXA036Bulk', ['XA036', 'xa1_taxable2', 'CalculatorXA036Bulk', 'XA036Bulk']), FixId('#divCalculatorXA036Bulk','XA036Bulk', 6)" />
                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="width:800px; text-align:left; border: 1px solid #3B3131;">
                                    
                                        <span style="font-weight: bold; font-size: small; text-align:left;">Total Tax Base: </span>
                                    
                                </td>
                                <td style="text-align:right; border: 1px solid #3B3131;">
                                    <input type="text" id="CalcSubTotalXA036Bulk" name="CalcSubTotalXA036Bulk" disabled="disabled" class="isDisabled" style="text-align: right;" value="0.00" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Compute " onclick="computeToSchedule1('XA036', 'xa1_taxable2', 'CalculatorXA036Bulk', 'XA036Bulk'), setCalcDate('XA036Bulk');" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Print " onclick="printModal('CalculatorXA036Bulk')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Close " onclick="cancelCalcu('#CalculatorXA036Bulk')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Clear " onclick="clearCalc('#divCalculatorXA036Bulk', ['XA036', 'xa1_taxable2', 'CalculatorXA036Bulk', 'XA036Bulk'])" />&nbsp;&nbsp;&nbsp;
                            <br />
                        
                    </div>
                </div>
                <br />
            </div>
            <!-- end of modal calculator XA036 Bulk -->

            <!-- start of modal calculator XA061 -->
            <div id="CalculatorXA061" class="modalShow" style="display: none; text-align:center;margin: auto;">
                <br />
                <div class="SubPageDiv">
                    <div id="TitleCalculatorXA061" style="display: none; text-align: left; font-size: 12px;">
                        TIN: <span name="calcTIN"></span>
                        <br />Date computed: <span id="dateComputedXA061"></span>
                        <br />
                    </div>
                    <div style="text-align:center;">
                        <table id="tblCalcHeaderXA061" class="RowSubTable tblForm tblCalcHeader" style="width:700px;margin:auto; text-align:center; font-size: 12px;">
                            <tr>
                                <td colspan="7">TAXABLE CALCULATOR FOR XA061</td>
                            </tr>
                            <tr>
                                <td style="width: 20px;" rowspan="2">
                                    <input type="checkbox" id="CalcCheckXA061" name='CalcCheckXA061' onclick="selectAll(this, '#divCalculatorXA061')">
                                </td>
                                <td>DESCRIPTION</td>
                                <td style="width: 100px;">No. of Cases</td>
                                <td style="width: 100px;">Bottles per Case</td>
                                <td style="width: 100px;">Total No. of Bottles</td>
                                <td style="width: 100px;">Volume Content (in L)</td>
                                <td style="width: 120px;">Tax Base</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>A</td>
                                <td>B</td>
                                <td>C = [A][B]</td>
                                <td>D</td>
                                <td>E = C * D</td>
                            </tr>
                        </table>
                    </div>

                    <div id="divCalculatorXA061" class="tblForm noCellSpace schedule1 divCalcBody" border="0" style="width:700px;margin:auto">
                    </div>

                    <div style="text-align:center;">
                        <table id="tblCalcTotalTableXA061" class="RowSubTable, tblForm" style="width: 700px;margin:auto; text-align:left; border: 1px solid #3B3131;">
                            <tr>
                                <td colspan="2" style="text-align:left; border: 1px solid #3B3131;">

                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value=" Add " onclick="AddRowOthers('XA061',false)" />
                                        <input type="button" value=" Delete " onclick="deleteRows('#divCalculatorXA061', ['XA061', 'xa2_taxable1', 'CalculatorXA061']), FixId('#divCalculatorXA061','XA061', 7)" />
                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="width:800px; text-align:left; border: 1px solid #3B3131;">
                                    
                                        <span style="font-weight: bold; font-size: small; text-align:left;">Total Tax Base: </span>
                                    
                                </td>
                                <td style="text-align:right; border: 1px solid #3B3131;">
                                    <input type="text" id="CalcSubTotalXA061" name="CalcSubTotalXA061" disabled="disabled" class="isDisabled" style="text-align: right;" value="0.00" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Compute " onclick="computeToSchedule1('XA061', 'xa2_taxable1', 'CalculatorXA061'), setCalcDate('XA061');" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Print " onclick="printModal('CalculatorXA061')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Close " onclick="cancelCalcu('#CalculatorXA061')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Clear " onclick="clearCalc('#divCalculatorXA061', ['XA061', 'xa2_taxable1', 'CalculatorXA061']), computeSum('XA061')" />&nbsp;&nbsp;&nbsp;
                            <br />
                        
                    </div>
                </div>
                <br />
            </div>
            <!-- end of modal calculator XA061 -->

            <!-- start of modal calculator XA062 -->
            <div id="CalculatorXA062" class="modalShow" style="display: none; text-align:center;margin: auto;">
                <br />
                <div class="SubPageDiv">
                    <div id="TitleCalculatorXA062" style="display: none; text-align: left; font-size: 12px;">
                        TIN: <span name="calcTIN"></span>
                        <br />Date computed: <span id="dateComputedXA062"></span>
                        <br />
                    </div>
                    <div style="text-align:center;">
                        <table id="tblCalcHeaderXA062" class="RowSubTable tblForm tblCalcHeader" style="width:700px;margin:auto; text-align:center; font-size: 12px;">
                            <tr>
                                <td colspan="7">TAXABLE CALCULATOR FOR XA062</td>
                            </tr>
                            <tr>
                                <td style="width: 20px;" rowspan="2">
                                    <input type="checkbox" id="CalcCheckXA062" name='CalcCheckXA062' onclick="selectAll(this, '#divCalculatorXA062')">
                                </td>
                                <td>DESCRIPTION</td>
                                <td style="width: 100px;">No. of Cases</td>
                                <td style="width: 100px;">Bottles per Case</td>
                                <td style="width: 100px;">Total No. of Bottles</td>
                                <td style="width: 100px;">Volume Content (in L)</td>
                                <td style="width: 120px;">Tax Base</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>A</td>
                                <td>B</td>
                                <td>C = [A][B]</td>
                                <td>D</td>
                                <td>E = C * D</td>
                            </tr>
                        </table>
                    </div>

                    <div id="divCalculatorXA062" class="tblForm noCellSpace schedule1 divCalcBody" border="0" style="width:700px;margin:auto;">
                    </div>

                    <div style="text-align:center;">
                        <table id="tblCalcTotalTableXA062" class="RowSubTable, tblForm" style="width:700px;margin:auto; text-align:left; border: 1px solid #3B3131;">
                            <tr>
                                <td colspan="2" style="text-align:left; border: 1px solid #3B3131;">

                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value=" Add " onclick="AddRowOthers('XA062',false)" />
                                        <input type="button" value=" Delete " onclick="deleteRows('#divCalculatorXA062', ['XA062', 'xa2_taxable2', 'CalculatorXA062']), FixId('#divCalculatorXA062','XA062', 7)" />
                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="width:800px; text-align:left; border: 1px solid #3B3131;">
                                    
                                        <span style="font-weight: bold; font-size: small; text-align:left;">Total Tax Base: </span>
                                    
                                </td>
                                <td style="text-align:right; border: 1px solid #3B3131;">
                                    <input type="text" id="CalcSubTotalXA062" name="CalcSubTotalXA062" disabled="disabled" class="isDisabled" style="text-align: right;" value="0.00" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Compute " onclick="computeToSchedule1('XA062', 'xa2_taxable2', 'CalculatorXA062'), setCalcDate('XA062');" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Print " onclick="printModal('CalculatorXA062')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Close " onclick="cancelCalcu('#CalculatorXA062')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Clear " onclick="clearCalc('#divCalculatorXA062', ['XA062', 'xa2_taxable2', 'CalculatorXA062']), computeSum('XA062')" />&nbsp;&nbsp;&nbsp;
                            <br />
                        
                    </div>
                </div>
                <br />
            </div>
            <!-- end of modal calculator XA062 -->

            <!-- start of modal calculator XA070 -->
            <div id="CalculatorXA070" class="modalShow" style="display: none; text-align:center;margin: auto;">
                <br />
                <div class="SubPageDiv">
                    <div style="text-align:center;">
                        <div id="TitleCalculatorXA070" style="display: none; text-align: left; font-size: 12px;">
                            TIN: <span name="calcTIN"></span>
                            <br />Date computed: <span id="dateComputedXA070"></span>
                            <br />
                        </div>
                        <table id="tblCalcHeaderXA070" class="RowSubTable tblForm tblCalcHeader" style="width:700px;margin:auto; text-align:center; font-size: 12px;">
                            <tr>
                                <td colspan="7">TAXABLE CALCULATOR FOR XA070</td>
                            </tr>
                            <tr>
                                <td style="width: 20px;" rowspan="2">
                                    <input type="checkbox" id="CalcCheckXA070" name='CalcCheckXA070' onclick="selectAll(this, '#divCalculatorXA070')">
                                </td>
                                <td>DESCRIPTION</td>
                                <td style="width: 100px;">No. of Cases</td>
                                <td style="width: 100px;">Bottles per Case</td>
                                <td style="width: 100px;">Total No. of Bottles</td>
                                <td style="width: 100px;">Volume Content (in L)</td>
                                <td style="width: 120px;">Tax Base</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>A</td>
                                <td>B</td>
                                <td>C = [A][B]</td>
                                <td>D</td>
                                <td>E = C * D</td>
                            </tr>
                        </table>
                    </div>

                    <div id="divCalculatorXA070" class="tblForm noCellSpace schedule1 divCalcBody" border="0" style="width:700px;margin:auto;">
                    </div>

                    <div style="text-align:center;">
                        <table id="tblCalcTotalTableXA070" class="RowSubTable, tblForm" style="width:700px;margin:auto; text-align:left; border: 1px solid #3B3131;">
                            <tr>
                                <td colspan="2" style="text-align:left; border: 1px solid #3B3131;">

                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value=" Add " onclick="AddRowOthers('XA070',false)" />
                                        <input type="button" value=" Delete " onclick="deleteRows('#divCalculatorXA070', ['XA070', 'xa2_taxable3', 'CalculatorXA070']), FixId('#divCalculatorXA070','XA070', 7)" />
                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="width:800px; text-align:left; border: 1px solid #3B3131;">
                                    
                                        <span style="font-weight: bold; font-size: small; text-align:left;">Total Tax Base: </span>
                                    
                                </td>
                                <td style="text-align:right; border: 1px solid #3B3131;">
                                    <input type="text" id="CalcSubTotalXA070" name="CalcSubTotalXA070" disabled="disabled" class="isDisabled" style="text-align: right;" value="0.00" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Compute " onclick="computeToSchedule1('XA070', 'xa2_taxable3', 'CalculatorXA070'), setCalcDate('XA070');" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Print " onclick="printModal('CalculatorXA070')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Close " onclick="cancelCalcu('#CalculatorXA070')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Clear " onclick="clearCalc('#divCalculatorXA070', ['XA070', 'xa2_taxable3', 'CalculatorXA070']), computeSum('XA070')" />&nbsp;&nbsp;&nbsp;
                            <br />
                        
                    </div>
                </div>
                <br />
            </div>
            <!-- end of modal calculator XA070  -->

            <!-- start of modal calculator XA080 -->
            <div id="CalculatorXA080" class="modalShow" style="display: none; text-align:center;margin: auto;">
                <br />
                <div class="SubPageDiv">
                    <div id="TitleCalculatorXA080" style="display: none; text-align: left; font-size: 12px;">
                        TIN: <span name="calcTIN"></span>
                        <br />Date computed: <span id="dateComputedXA080"></span>
                        <br />
                    </div>
                    <div style="text-align:center;">
                        <table id="tblCalcHeaderXA080" class="RowSubTable tblForm tblCalcHeader" style="width:700px;margin:auto; text-align:center; font-size: 12px;">
                            <tr>
                                <td colspan="7">TAXABLE CALCULATOR FOR XA080</td>
                            </tr>
                            <tr>
                                <td style="width: 20px;" rowspan="2">
                                    <input type="checkbox" id="CalcCheckXA080" name='CalcCheckXA080' onclick="selectAll(this, '#divCalculatorXA080')">
                                </td>
                                <td>DESCRIPTION</td>
                                <td style="width: 100px;">No. of Cases</td>
                                <td style="width: 100px;">Bottles per Case</td>
                                <td style="width: 100px;">Total No. of Bottles</td>
                                <td style="width: 100px;">Volume Content (in L)</td>
                                <td style="width: 120px;">Tax Base</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>A</td>
                                <td>B</td>
                                <td>C = [A][B]</td>
                                <td>D</td>
                                <td>E = C * D</td>
                            </tr>
                        </table>
                    </div>

                    <div id="divCalculatorXA080" class="tblForm noCellSpace schedule1 divCalcBody" border="0" style="width:700px;margin:auto">
                    </div>

                    <div style="text-align:center;">
                        <table id="tblCalcTotalTableXA080" class="RowSubTable, tblForm" style="width:700px;margin:auto; text-align:left; border: 1px solid #3B3131;">
                            <tr>
                                <td colspan="2" style="text-align:left; border: 1px solid #3B3131;">

                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value=" Add " onclick="AddRowOthers('XA080',false)" />
                                        <input type="button" value=" Delete " onclick="deleteRows('#divCalculatorXA080', ['XA080', 'xa2_taxable4', 'CalculatorXA080']), FixId('#divCalculatorXA080','XA080', 7)" />
                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="width:800px; text-align:left; border: 1px solid #3B3131;">
                                    
                                        <span style="font-weight: bold; font-size: small; text-align:left;">Total Tax Base: </span>
                                    
                                </td>
                                <td style="text-align:right; border: 1px solid #3B3131;">
                                    <input type="text" id="CalcSubTotalXA080" name="CalcSubTotalXA080" disabled="disabled" class="isDisabled" style="text-align: right;" value="0.00" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Compute " onclick="computeToSchedule1('XA080', 'xa2_taxable4', 'CalculatorXA080'), setCalcDate('XA080');" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Print " onclick="printModal('CalculatorXA080')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Close " onclick="cancelCalcu('#CalculatorXA080')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Clear " onclick="clearCalc('#divCalculatorXA080', ['XA080', 'xa2_taxable4', 'CalculatorXA080']), computeSum('XA080')" />&nbsp;&nbsp;&nbsp;
                            <br />
                        
                    </div>
                </div>
                <br />
            </div>
            <!-- end of modal calculator XA080 -->

            <!-- start of modal calculator XA055 -->
            <div id="CalculatorXA055" class="modalShow" style="display: none; text-align:center;margin: auto;">
                <br />
                <div class="SubPageDiv">
                    <div id="TitleCalculatorXA055" style="display: none; text-align: left; font-size: 12px;">
                        TIN: <span name="calcTIN"></span>
                        <br />Date computed: <span id="dateComputedXA055"></span>
                        <br />
                    </div>
                    <div style="text-align:center;">
                        <table id="tblCalcHeaderXA055" class="RowSubTable tblForm tblCalcHeader" style="width:700px;margin:auto; text-align:center; font-size: 12px;">
                            <tr>
                                <td colspan="7">TAXABLE CALCULATOR FOR XA055</td>
                            </tr>
                            <tr>
                                <td style="width: 20px;" rowspan="2">
                                    <input type="checkbox" id="CalcCheckXA055" name='CalcCheckXA055' onclick="selectAll(this, '#divCalculatorXA055')">
                                </td>
                                <td>DESCRIPTION</td>
                                <td style="width: 100px;">No. of Cases</td>
                                <td style="width: 100px;">Bottles per Case</td>
                                <td style="width: 100px;">Total No. of Bottles</td>
                                <td style="width: 100px;">Volume Content (in L)</td>
                                <td style="width: 120px;">Tax Base</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>A</td>
                                <td>B</td>
                                <td>C = [A][B]</td>
                                <td>D</td>
                                <td>E = C * D</td>
                            </tr>
                        </table>
                    </div>

                    <div id="divCalculatorXA055" class="tblForm noCellSpace schedule1 divCalcBody" border="0" style="width:700px;margin:auto">
                    </div>

                    <div style="text-align:center;">
                        <table id="tblCalcTotalTableXA055" class="RowSubTable, tblForm" style="width:700px;margin:auto; text-align:left; border: 1px solid #3B3131;">
                            <tr>
                                <td colspan="2" style="text-align:left; border: 1px solid #3B3131;">

                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value=" Add " onclick="AddRowOthers('XA055',false)" />
                                        <input type="button" value=" Delete " onclick="deleteRows('#divCalculatorXA055', ['XA055', 'xa3_taxable1', 'CalculatorXA055']), FixId('#divCalculatorXA055','XA055', 7)" />
                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="width:800px; text-align:left; border: 1px solid #3B3131;">
                                    
                                        <span style="font-weight: bold; font-size: small; text-align:left;">Total Tax Base: </span>
                                    
                                </td>
                                <td style="text-align:right; border: 1px solid #3B3131;">
                                    <input type="text" id="CalcSubTotalXA055" name="CalcSubTotalXA055" disabled="disabled" class="isDisabled" style="text-align: right;" value="0.00" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Compute " onclick="computeToSchedule1('XA055', 'xa3_taxable1', 'CalculatorXA055'), setCalcDate('XA055');" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Print " onclick="printModal('CalculatorXA055')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Close " onclick="cancelCalcu('#CalculatorXA055')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Clear " onclick="clearCalc('#divCalculatorXA055', ['XA055', 'xa3_taxable1', 'CalculatorXA055']), computeSum('XA055')" />&nbsp;&nbsp;&nbsp;
                            <br />
                        
                    </div>
                </div>
                <br />
            </div>
            <!-- end of modal calculator XA055 -->

            <!-- satrt of modal calculator XA0552 -->
            <div id="CalculatorXA0552" class="modalShow" style="display: none; text-align:center;margin: auto;">
                <br />
                <div class="SubPageDiv">
                    <div id="TitleCalculatorXA0552" style="display: none; text-align: left; font-size: 12px;">
                        TIN: <span name="calcTIN"></span>
                        <br />Date computed: <span id="dateComputedXA0552"></span>
                        <br />
                    </div>
                    <div style="text-align:center;">
                        <table id="tblCalcHeaderXA0552" class="RowSubTable tblForm tblCalcHeader" style="width:700px; text-align:center; font-size: 12px;">
                            <tr>
                                <td colspan="7">TAXABLE CALCULATOR FOR XA055</td>
                            </tr>
                            <tr>
                                <td style="width: 20px;" rowspan="2">
                                    <input type="checkbox" id="CalcCheckXA0552" name='frm2200A:SelectAll' onclick="selectAll(this, '#divCalculatorXA0552')">
                                </td>
                                <td>DESCRIPTION</td>
                                <td style="width: 100px;">No. of Cases</td>
                                <td style="width: 100px;">Bottles per Case</td>
                                <td style="width: 100px;">Total No. of Bottles</td>
                                <td style="width: 100px;">Volume Content (in L)</td>
                                <td style="width: 120px;">Tax Base</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>A</td>
                                <td>B</td>
                                <td>C = [A][B]</td>
                                <td>D</td>
                                <td>E = C * D</td>
                            </tr>
                        </table>
                    </div>
    
                    <div id="divCalculatorXA0552" class="tblForm noCellSpace schedule1 divCalcBody" border="0" style="width:700px">
                    </div>
    
                    <div style="text-align:center;">
                        <table id="tblCalcTotalTableXA0552" class="RowSubTable, tblForm" style="width:700px; text-align:left; border: 1px solid #3B3131;">
                            <tr>
                                <td colspan="2" style="text-align:left; border: 1px solid #3B3131;">
    
                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value=" Add " onclick="AddRowOthers('XA0552',false)" />
                                        <input type="button" value=" Delete " onclick="deleteRows('#divCalculatorXA0552', ['XA0552', 'xa3_taxableXA0552', 'CalculatorXA0552']), FixId('#divCalculatorXA0552','XA0552', 7)" />
                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="width:800px; text-align:left; border: 1px solid #3B3131;">
                                    
                                        <span style="font-weight: bold; font-size: small; text-align:left;">Total Tax Base: </span>
                                    
                                </td>
                                <td style="text-align:right; border: 1px solid #3B3131;">
                                    <input type="text" id="CalcSubTotalXA0552" name="CalcSubTotalXA0552" disabled="disabled" class="isDisabled" style="text-align: right;" value="0.00" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Compute " onclick="computeToSchedule1('XA0552', 'xa3_taxableXA0552', 'CalculatorXA0552'), setCalcDate('XA0552');" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Print " onclick="printModal('CalculatorXA0552')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Close " onclick="cancelCalcu('#CalculatorXA0552')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Clear " onclick="clearCalc('#divCalculatorXA0552', ['XA0552', 'xa3_taxableXA0552', 'CalculatorXA0552']), computeSum('XA0552')" />&nbsp;&nbsp;&nbsp;
                            <br />
                        
                    </div>
                </div>
                <br />
            </div>
            <!-- end of modal calculator XA0552 -->

            <!-- start of modal calculator XA056 -->
            <div id="CalculatorXA056" class="modalShow" style="display: none; text-align:center;margin: auto;">
                <br />
                <div class="SubPageDiv">
                    <div id="TitleCalculatorXA056" style="display: none; text-align: left; font-size: 12px;">
                        TIN: <span name="calcTIN"></span>
                        <br />Date computed: <span id="dateComputedXA056"></span>
                        <br />
                    </div>
                    <div style="text-align:center;">
                        <table id="tblCalcHeaderXA056" class="RowSubTable tblForm tblCalcHeader" style="width:700px;margin:auto; text-align:center; font-size: 12px;">
                            <tr>
                                <td colspan="7">TAXABLE CALCULATOR FOR XA056</td>
                            </tr>
                            <tr>
                                <td style="width: 20px;" rowspan="2">
                                    <input type="checkbox" id="CalcCheckXA056" name='CalcCheckXA056' onclick="selectAll(this, '#divCalculatorXA056')">
                                </td>
                                <td>DESCRIPTION</td>
                                <td style="width: 100px;">No. of Cases</td>
                                <td style="width: 100px;">Bottles per Case</td>
                                <td style="width: 100px;">Total No. of Bottles</td>
                                <td style="width: 100px;">Volume Content (in L)</td>
                                <td style="width: 120px;">Tax Base</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>A</td>
                                <td>B</td>
                                <td>C = [A][B]</td>
                                <td>D</td>
                                <td>E = C * D</td>
                            </tr>
                        </table>
                    </div>

                    <div id="divCalculatorXA056" class="tblForm noCellSpace schedule1 divCalcBody" border="0" style="width:700px;margin:auto;">
                    </div>

                    <div style="text-align:center;">
                        <table id="tblCalcTotalTableXA056" class="RowSubTable, tblForm" style="width:700px;margin:auto; text-align:left; border: 1px solid #3B3131;">
                            <tr>
                                <td colspan="2" style="text-align:left; border: 1px solid #3B3131;">

                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value=" Add " onclick="AddRowOthers('XA056',false)" />
                                        <input type="button" value=" Delete " onclick="deleteRows('#divCalculatorXA056', ['XA056', 'xa3_taxable2', 'CalculatorXA056']), FixId('#divCalculatorXA056','XA056', 7)" />
                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="width:800px; text-align:left; border: 1px solid #3B3131;">
                                    
                                        <span style="font-weight: bold; font-size: small; text-align:left;">Total Tax Base: </span>
                                    
                                </td>
                                <td style="text-align:right; border: 1px solid #3B3131;">
                                    <input type="text" id="CalcSubTotalXA056" name="CalcSubTotalXA056" disabled="disabled" class="isDisabled" style="text-align: right;" value="0.00" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Compute " onclick="computeToSchedule1('XA056', 'xa3_taxable2', 'CalculatorXA056'), setCalcDate('XA056');" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Print " onclick="printModal('CalculatorXA056')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Close " onclick="cancelCalcu('#CalculatorXA056')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Clear " onclick="clearCalc('#divCalculatorXA056', ['XA056', 'xa3_taxable2', 'CalculatorXA056']), computeSum('XA056')" />&nbsp;&nbsp;&nbsp;
                            <br />
                        
                    </div>
                </div>
                <br />
            </div> 
            <!-- end of modal calculator XA056 -->

            <!-- start of modal calculator XA0562 -->
            <div id="CalculatorXA0562" class="modalShow" style="display: none; text-align:center;margin: auto;">
                <br />
                <div class="SubPageDiv">
                    <div id="TitleCalculatorXA0562" style="display: none; text-align: left; font-size: 12px;">
                        TIN: <span name="calcTIN"></span>
                        <br />Date computed: <span id="dateComputedXA0562"></span>
                        <br />
                    </div>
                    <div style="text-align:center;">
                        <table id="tblCalcHeaderXA0562" class="RowSubTable tblForm tblCalcHeader" style="width:700px; text-align:center; font-size: 12px;">
                            <tr>
                                <td colspan="7">TAXABLE CALCULATOR FOR XA056</td>
                            </tr>
                            <tr>
                                <td style="width: 20px;" rowspan="2">
                                    <input type="checkbox" id="CalcCheckXA0562" name='frm2200A:SelectAll' onclick="selectAll(this, '#divCalculatorXA0562')">
                                </td>
                                <td>DESCRIPTION</td>
                                <td style="width: 100px;">No. of Cases</td>
                                <td style="width: 100px;">Bottles per Case</td>
                                <td style="width: 100px;">Total No. of Bottles</td>
                                <td style="width: 100px;">Volume Content (in L)</td>
                                <td style="width: 120px;">Tax Base</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>A</td>
                                <td>B</td>
                                <td>C = [A][B]</td>
                                <td>D</td>
                                <td>E = C * D</td>
                            </tr>
                        </table>
                    </div>
    
                    <div id="divCalculatorXA0562" class="tblForm noCellSpace schedule1 divCalcBody" border="0" style="width:700px">
                    </div>
    
                    <div style="text-align:center;">
                        <table id="tblCalcTotalTableXA0562" class="RowSubTable, tblForm" style="width:700px; text-align:left; border: 1px solid #3B3131;">
                            <tr>
                                <td colspan="2" style="text-align:left; border: 1px solid #3B3131;">
    
                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value=" Add " onclick="AddRowOthers('XA0562',false)" />
                                        <input type="button" value=" Delete " onclick="deleteRows('#divCalculatorXA0562', ['XA0562', 'xa3_taxableXA0562', 'CalculatorXA0562']), FixId('#divCalculatorXA0562','XA0562', 7)" />
                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="width:800px; text-align:left; border: 1px solid #3B3131;">
                                    
                                        <span style="font-weight: bold; font-size: small; text-align:left;">Total Tax Base: </span>
                                    
                                </td>
                                <td style="text-align:right; border: 1px solid #3B3131;">
                                    <input type="text" id="CalcSubTotalXA0562" name="CalcSubTotalXA0562" disabled="disabled" class="isDisabled" style="text-align: right;" value="0.00" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Compute " onclick="computeToSchedule1('XA0562', 'xa3_taxableXA0562', 'CalculatorXA0562'), setCalcDate('XA0562');" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Print " onclick="printModal('CalculatorXA0562')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Close " onclick="cancelCalcu('#CalculatorXA0562')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Clear " onclick="clearCalc('#divCalculatorXA0562', ['XA0562', 'xa3_taxableXA0562', 'CalculatorXA0562']), computeSum('XA0562')" />&nbsp;&nbsp;&nbsp;
                            <br />
                        
                    </div>
                </div>
                <br />
            </div>
            <!-- end of modal calculator XA0562 -->

            <!-- start of modal calculator XA057 -->
            <div id="CalculatorXA057" class="modalShow" style="display: none; text-align:center;margin: auto;">
                <br />
                <div class="SubPageDiv">
                    <div id="TitleCalculatorXA057" style="display: none; text-align: left; font-size: 12px;">
                        TIN: <span name="calcTIN"></span>
                        <br />Date computed: <span id="dateComputedXA057"></span>
                        <br />
                    </div>
                    <div style="text-align:center;">
                        <table id="tblCalcHeaderXA057" class="RowSubTable tblForm tblCalcHeader" style="width:700px;margin:auto; text-align:center; font-size: 12px;">
                            <tr>
                                <td colspan="7">TAXABLE CALCULATOR FOR XA057</td>
                            </tr>
                            <tr>
                                <td style="width: 20px;" rowspan="2">
                                    <input type="checkbox" id="CalcCheckXA057" name='CalcCheckXA057' onclick="selectAll(this, '#divCalculatorXA057')">
                                </td>
                                <td>DESCRIPTION</td>
                                <td style="width: 100px;">No. of Cases</td>
                                <td style="width: 100px;">Bottles per Case</td>
                                <td style="width: 100px;">Total No. of Bottles</td>
                                <td style="width: 100px;">Volume Content (in L)</td>
                                <td style="width: 120px;">Tax Base</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>A</td>
                                <td>B</td>
                                <td>C = [A][B]</td>
                                <td>D</td>
                                <td>E = C * D</td>
                            </tr>
                        </table>
                    </div>
        
                    <div id="divCalculatorXA057" class="tblForm noCellSpace schedule1 divCalcBody" border="0" style="width:700px;margin:auto;">
                    </div>
        
                    <div style="text-align:center;">
                        <table id="tblCalcTotalTableXA057" class="RowSubTable, tblForm" style="width:700px;margin:auto; text-align:left; border: 1px solid #3B3131;">
                            <tr>
                                <td colspan="2" style="text-align:left; border: 1px solid #3B3131;">
        
                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="button" value=" Add " onclick="AddRowOthers('XA057',false)" />
                                        <input type="button" value=" Delete " onclick="deleteRows('#divCalculatorXA057', ['XA057', 'xa3_taxable3', 'CalculatorXA057']), FixId('#divCalculatorXA057','XA057', 7)" />
                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="width:800px; text-align:left; border: 1px solid #3B3131;">
                                    
                                        <span style="font-weight: bold; font-size: small; text-align:left;">Total Tax Base: </span>
                                    
                                </td>
                                <td style="text-align:right; border: 1px solid #3B3131;">
                                    <input type="text" id="CalcSubTotalXA057" name="CalcSubTotalXA057" disabled="disabled" class="isDisabled" style="text-align: right;" value="0.00" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        
                            &nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Compute " onclick="computeToSchedule1('XA057', 'xa3_taxable3', 'CalculatorXA057'), setCalcDate('XA057');" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Print " onclick="printModal('CalculatorXA057')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Close " onclick="cancelCalcu('#CalculatorXA057')" />&nbsp;&nbsp;&nbsp;
                            <input type="button" value=" Clear " onclick="clearCalc('#divCalculatorXA057', ['XA057', 'xa3_taxable3', 'CalculatorXA057']), computeSum('XA057')" />&nbsp;&nbsp;&nbsp;
                            <br />
                        
                    </div>
                </div>
                <br />
            </div>
            <!-- end of modal calculator XA057 -->

            <div id="modalRowCounter" style="display:none;">    
                <input type="text" size="10" id="frm2200A:txtCtrmodalCalculatorXA035Bottle"  name="frm2200A:txtCtrmodalCalculatorXA035Bottle" value="0" />
                <input type="text" size="10" id="frm2200A:txtCtrmodalCalculatorXA035Bulk"  name="frm2200A:txtCtrmodalCalculatorXA035Bulk" value="0" />
                <input type="text" size="10" id="frm2200A:txtCtrmodalCalculatorXA036Bottle"  name="frm2200A:txtCtrmodalCalculatorXA036Bottle" value="0" / >
                <input type="text" size="10" id="frm2200A:txtCtrmodalCalculatorXA036Bulk" name="frm2200A:txtCtrmodalCalculatorXA036Bulk" value="0" />
                <input type="text" size="10" id="frm2200A:txtCtrmodalCalculatorXA061" name="frm2200A:txtCtrmodalCalculatorXA061" value="0" />
                <input type="text" size="10" id="frm2200A:txtCtrmodalCalculatorXA062" name="frm2200A:txtCtrmodalCalculatorXA062" value="0" />
                <input type="text" size="10" id="frm2200A:txtCtrmodalCalculatorXA070" name="frm2200A:txtCtrmodalCalculatorXA070" value="0" />
                <input type="text" size="10" id="frm2200A:txtCtrmodalCalculatorXA080" name="frm2200A:txtCtrmodalCalculatorXA080" value="0" />
                <input type="text" size="10" id="frm2200A:txtCtrmodalCalculatorXA055" name="frm2200A:txtCtrmodalCalculatorXA055" value="0" />
                <input type="text" size="10" id="frm2200A:txtCtrmodalCalculatorXA0552" name="frm2200A:txtCtrmodalCalculatorXA0552" value="0" />
                <input type="text" size="10" id="frm2200A:txtCtrmodalCalculatorXA056" name="frm2200A:txtCtrmodalCalculatorXA056" value="0" />
                <input type="text" size="10" id="frm2200A:txtCtrmodalCalculatorXA0562" name="frm2200A:txtCtrmodalCalculatorXA0562" value="0" />
                <input type="text" size="10" id="frm2200A:txtCtrmodalCalculatorXA057" name="frm2200A:txtCtrmodalCalculatorXA057" value="0" />
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
<script src="{{ asset('js/forms/2200A.js') }}" ></script>
<script type="text/javascript">
    var isSubmitFinal = false;

    var gIsReadOnly = false;
    var showFillupSched1Alert = true;
    var fileNameToExport = "";  var fileName = "";
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

    function setPercentage(e, decimalPlaces) {
        var eValue = (e.value.indexOf("%") > -1) ? e.value.split("%")[0] : e.value,
            isNumber = isNumeric(eValue);

        if (($.trim(eValue) === "") || !isNumber) {
            alert("Invalid value for percentage.");
            e.value = "0.00";
            e.select();
        }
        else if ((convertToNumber(eValue) < 0) || (convertToNumber(eValue) > 100)) {
            alert("Invalid value for percentage.");
            e.value = "0.00";
            e.onblur();
            e.select();
        }
        else {
            var temp = eValue.split('.');
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

    str = setInterval("sleeptime()", 400);
    function sleeptime() {
        loadXMLATC('/xml/atcCodes.xml');
        clearInterval(str);
        init();
        loadXMLProvince('/xml/province.xml');
        loadArrayCity();


        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;

        if (fileName != null && fileName.indexOf('.xml') > -1) {
            loadXML(fileName);   

            if (gIsReadOnly) {
                window.setTimeout(callWhenFinalCopy, 1000);
            }
        } else {
            window.setTimeout("$('#loader').hide('blind');", 100);
        }
        if ($('#printMenu').css('display') != 'none') {
            $('#printMenu').hide('blind');
        }
        selectChangeMannerOfPayment();
        d.getElementById('frm2200A:txtTIN1').disabled = true;
        d.getElementById('frm2200A:txtTIN2').disabled = true;
        d.getElementById('frm2200A:txtTIN3').disabled = true;
        d.getElementById('frm2200A:txtBranchCode').disabled = true;
        d.getElementById('frm2200A:txtEmailAddress').disabled = true;
    }
    //Disable pasting
    $(document).ready(function () {
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

    function callWhenFinalCopy() {
        //edithere
        disableAllElementIDs();
        d.getElementById('frm2200A:cmdValidate').disabled = true;
        d.getElementById('frm2200A:cmdEdit').disabled = true;
        d.getElementById('frm2200A:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = false;
        //Added as of 04/29/2014 (based on 1700's series)
        d.getElementById('btnPrint').disabled = false;
        d.getElementById('lnkPrintPreview').disabled = false;
        d.getElementById('frm2200A:btnSched1').disabled = false;
        d.getElementById('frm2200A:btnCancelSched1').disabled = false;

        enabledDisabled(true);
    }

    function rdoPropertyJS(rdoCode, description) {
        this.rdoCode = rdoCode;
        this.description = description;
    }

    var rdoList = new Array();

    function regionPropertyJS(regionCode, description) {
        this.regionCode = regionCode;
        this.description = description;
    }

    function provincePropertyJS(regionCode, provinceCode, description) {
        this.regionCode = regionCode;
        this.provinceCode = provinceCode;
        this.description = description;
    }

    function cityPropertyJS(regionCode, provinceCode, cityCode, description) {
        this.regionCode = regionCode;
        this.provinceCode = provinceCode;
        this.cityCode = cityCode;
        this.description = description;
    }

    var regionList = new Array();
    var provinceList = new Array();
    var cityList = new Array();

    /*----------------------------------*/
    var d = document, XMLBGFile = '', data = '', XMLFile = '', XMLRegionFile = '', XMLProvinceFile = '', XMLCityFile = '', msg = d.getElementById('msg'), flag1 = true;
    var loader = d.getElementById('loader');
    /*----------------------------------*/

    function setInputTextControl_HorizontalAlignment(id, align) {
        //d.getElementById(id).textIndent = parseInt(align);
        var elem = d.getElementById(id);

        if (typeof (elem) !== "undefined" && elem !== null) {
            elem.style.textAlign = "right";
        }
    }
    function setInputTextControl_NumberFormatter(id, limit, deci) {
        d.getElementById(id).size = parseInt(limit);
        d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed(parseInt(deci));
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
                flag1 = false;
                var count1 = 0;
                var responses1 = d.getElementById('response').getElementsByTagName('div');
                var sPar1 = 'frm2200A:sched1Chk';

                do {
                    if (responses1.item(count1).innerHTML.indexOf(sPar1) != -1) {
                        var temp = String(responses1.item(count1).innerHTML);
                        temp = temp.substring(0, sPar1.length + 1); //substring to length of search param for index - check files
                        temp = temp.substring(sPar1.length, sPar1.length + 1); //get the last character for checking
                        if (!isNaN(temp) && temp != 0) {
                            addFieldsForSched1Reload();
                        } //if last char is a number, add modal section
                    } count1++;
                } while (count1 != responses1.length);

                flag1 = true;
                selectChangeMannerOfPayment();
                setATCSchedule1();
                loadData();

                /*--------------------------------------------------------------------------------------*/

                //window.setTimeout("loadDataATCRow();onchangeSelect();",750); //for select-one onchange events

                window.setTimeout("$('#loader').hide('blind');", 2000);
            }
            if (response.innerHTML.indexOf("All Rights Reserved BIR 2014.0") >= 0) {
                gIsReadOnly = true;
            }

            if (gIsReadOnly) {
                d.getElementById('frm2200A:cmdValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
            }
    }

    function loadDataATCRow() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");
        var elem = document.getElementById('frmMain').elements;
        for (var i = 0; i < elem.length; i++) {

            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String($("#response").html()).split(elem[i].id + '=');
                    elem[i].value = ''; elem[i].selectedIndex = 0;
                    if (elem[i].id == 'frm2200A:txtTaxPayerName' || elem[i].id == 'frm2200A:txtLineBus' || elem[i].id == 'frm2200A:txtAddress') {
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
                    else {
                        elem[i].value = fieldVal[1]; //all select-one and text values               
                    }
                }
            }
        }
    }

    function onchangeSelect() {
        /*This will programatically fire onchange for Select-one in Region, Province and City*/
        var response = d.getElementById("response");
        var elem = document.getElementById('frmMain').elements;
        for (var i = 0; i < elem.length; i++) {
            if ((elem[i].id).indexOf('frm2200A:txt12optRegion') != -1 || String(elem[i].id).indexOf('frm2200A:txt12optProvince') != -1 || String(elem[i].id).indexOf('frm2200A:txt13optRegion1') != -1 || String(elem[i].id).indexOf('frm2200A:txt13optProvince1') != -1) {
                elem[i].onchange();
            }
        }
    }

    function getGrossSales() {
        var sum = 0;

        if (d.getElementById("frm2200A:chkPymntManner_1").checked) {
            $(".tblSched1_2200A input[id*='taxable'][type='text']").each(function () {
                sum = sum + NumWithComma($.trim($(this).attr('value')));
            });

            $(".tblSched1_2200A input[id*='sched1Taxable'][type='text']").each(function () {
                sum = sum + NumWithComma($.trim($(this).attr('value')));
            });
        }

        return sum;
    }

    function loadData() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");
        var modalRowCounter = d.getElementById('modalRowCounter').getElementsByTagName('input');
        var counter = 0;

        for (var i = 0; i < modalRowCounter.length; i++) {

            if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1 && i == 0) {
                counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRowXA035Bottle(true);

                }
            }
            else if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1 && i == 1) {
                counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRowXA035Bulk(true);
                }
            }
            else if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1 && i == 2) {
                counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRowXA036('Bottle', true);
                }
            }
            else if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1 && i == 3) {
                counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRowXA036('Bulk', true);
                }
            }
            else if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1 && i == 4) {
                counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRowOthers('XA061', true);
                }
            }
            else if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1 && i == 5) {
                counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRowOthers('XA062', true);
                }
            }
            else if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1 && i == 6) {
                counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRowOthers('XA070', true);
                }
            }
            else if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1 && i == 7) {
                counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRowOthers('XA080', true);
                }
            }
            else if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1 && i == 8) {
                counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRowOthers('XA055', true);
                }
            }
            else if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1 && i == 9) {
                counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRowOthers('XA056', true);
                }
            }
            else if ((response.innerHTML).indexOf(modalRowCounter[i].id) != -1 && i == 10) {
                counter = (response.innerHTML).split(modalRowCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRowOthers('XA057', true);
                }
            }

        }

        var elem = document.getElementById('frmMain').elements;
        for (var i = 0; i < elem.length; i++) {
            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&           
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String($("#response").html()).split(elem[i].id + '=');
                    elem[i].value = ''; elem[i].selectedIndex = 0;
                    if (elem[i].id == 'frm2200A:txtTaxPayerName' || elem[i].id == 'frm2200A:txtLineBus' || elem[i].id == 'frm2200A:txtAddress') {
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    else {
                        elem[i].value = unescape(fieldVal[1]); //all select-one and text values               
                    }

                    if (String(elem[i].id).indexOf('frm2200A:txt12optRegion') != -1 || String(elem[i].id).indexOf('frm2200A:txt12optProvince') != -1 || String(elem[i].id).indexOf('frm2200A:txt13optRegion1') != -1 || String(elem[i].id).indexOf('frm2200A:txt13optProvince1') != -1) {
                        elem[i].onchange();
                    }
                    else if (elem[i].id.indexOf("drpXA055") > -1) {
                        isNewRate["XA055"] = (elem[i].selectedIndex === 1) ? true : false;

                        elem[i].onchange();
                    }
                    else if (elem[i].id.indexOf("drpXA056") > -1) {
                        isNewRate["XA056"] = (elem[i].selectedIndex === 1) ? true : false;

                        elem[i].onchange();
                    }
                }

                if (elem[i].type == 'radio') {
                    var rdoVal = String($("#response").html()).split(elem[i].id + '=');
                    if (rdoVal[1] == 'true') {
                        elem[i].checked = rdoVal[1];
                       //if ( String(elem[i].id).indexOf('frm2200A:chkPymntManner_1') == -1 || String(elem[i].id).indexOf('frm2200A:chkPymntManner_2') == -1 ) {
                       //  changeMannerOfPaymentReload();
                       //  //elem[i].onclick();
                       //} 
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
        if (d.getElementById('frm2200A:amendedRtn_1').checked){
        
            d.getElementById('frm2200A:txtTax21').disabled = false;
            d.getElementById('frm2200A:txtTax21').style.backgroundColor = "#FFFFFF"
        }

    }

   
    var XMLrdoFile = '';

    function loadXMLrdo(fileLocation) {
        try {
            //This will load the Region file with filename 'fileLocation' if it exists
            var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
            XMLrdoFile = fsoXML.OpenTextFile(fileLocation, 1);

            if (XMLrdoFile.AtEndOfStream)
                data = "";
            else {
                var responseRdo = d.getElementById('responseRdo'); //render file and write to hidden div
                responseRdo.innerHTML = XMLrdoFile.ReadAll(); //remove XML tag
                //responseRdo = replaceHtml(responseRdo, XMLrdoFile.ReadAll()); //Pattern:  el = replaceHtml(el, newHtml)
            }
            XMLrdoFile.Close(); //alert( responseRdo.innerHTML ); //Debug           
            loadRdo();  /*This will load ATC onto an array*/
        } catch (e) {
            msg.innerHTML = ""; //"Region File not Found.";
        } //this will Alert File not Found if it doesn't exist
    }

    var rdoCount = 0;

    function init() {
   
        var year = new Date();
        d.getElementById('frm2200A:txtMonth1').selectedIndex = year.getMonth();
        
        dd = "" + year.getDate();
        if (dd.length == 1) {
            dd = "0" + dd;
            d.getElementById('frm2200A:txtDate').value = dd;
        }
        else {
            d.getElementById('frm2200A:txtDate').value = year.getDate();
        }
        d.getElementById('frm2200A:txtForYr').value = year.getFullYear();

        d.getElementById('frm2200A:amendedRtn_1').disabled = false;
        d.getElementById('frm2200A:amendedRtn_2').disabled = false;
        d.getElementById('frm2200A:txtTIN1').disabled = true;
        d.getElementById('frm2200A:txtTIN2').disabled = true;
        d.getElementById('frm2200A:txtTIN3').disabled = true;
        d.getElementById('frm2200A:txtBranchCode').disabled = true;
        d.getElementById('frm2200A:txtLineBus').disabled = true;
        d.getElementById('frm2200A:txtTaxPayerName').disabled = true;
        d.getElementById('frm2200A:txtContactNum').disabled = true;
        d.getElementById('frm2200A:txtAddress').disabled = true;
        d.getElementById('frm2200A:txtZipCode').disabled = true;
        d.getElementById('frm2200A:txt17OthMannerofPymnt').disabled = true;
        d.getElementById('frm2200A:optTreaty_2').checked = true;
        d.getElementById('frm2200A:lstTaxTreaty').disabled = true;

        d.getElementById('frm2200A:txtTax18').disabled = true;
        d.getElementById('frm2200A:txtTax19A').disabled = false;
        d.getElementById('frm2200A:txtTax19B').disabled = true;
        d.getElementById('frm2200A:txtTax19C').disabled = true;
        d.getElementById('frm2200A:txtTax20').disabled = true;
        d.getElementById('frm2200A:txtTax21').disabled = true;
        d.getElementById('frm2200A:txtTax22').disabled = true;
        d.getElementById('frm2200A:txtTax23D').disabled = true;
        d.getElementById('frm2200A:txtTax24').disabled = true;
        d.getElementById('frm2200A:txtTax25B').disabled = true;
        d.getElementById('frm2200A:txtTax25C').disabled = true;
        d.getElementById('frm2200A:txtTax26').disabled = true;
        @if($action != 'view')
        d.getElementById('frm2200A:cmdEdit').disabled = true;
        d.getElementById('frm2200A:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @endif
        loadXMLRegion('/xml/region.xml');
        getRegion();
        loadXMLrdo('/xml/rdo.xml');
   
         d.getElementById('frm2200A:txtEmailAddress').disabled = true;
        
    }

    function blockletter(e) {
        var number = parseFloat(e.value);
        if (isNaN(number)) {
            var zero = 0;
            e.value = parseFloat(zero);
        } else {
            e.value = '' + number;
        }
    }

    function blockletterWithout2Decimal(e) {
        var number = parseFloat(e.value);
        if (isNaN(number)) {
            e.value = "";
        } else {
            e.value = '' + number.toFixed(0);
        }
    }

    function changeTreaty() {
        if (d.getElementById('frm2200A:optTreaty_1').checked) {
            d.getElementById('frm2200A:lstTaxTreaty').disabled = false;
        } else {
            d.getElementById('frm2200A:lstTaxTreaty').disabled = true;
            d.getElementById('frm2200A:lstTaxTreaty').selectedIndex = 0;
        }
    }

    function selectChangeMannerOfPayment() {
        if (flag1) {
            changeMannerOfPaymentReload();
        } else {
            changeMannerOfPayment();
        }

    }

    function changeMannerOfPaymentReload() {
        if (d.getElementById('frm2200A:chkPymntManner_3').checked) {
            d.getElementById('frm2200A:txt17OthMannerofPymnt').disabled = false;
            d.getElementById('frm2200A:txt17OthMannerofPymnt').style.background = "ffffff";
        }
        if (d.getElementById('frm2200A:chkPymntManner_2').checked) {
            d.getElementById('frm2200A:txtMonth1').disabled = true;
            d.getElementById('frm2200A:txtTax18').value = '0.00';
            compute20();

            setTax23(true);
            d.getElementById('frm2200A:btnSched1').disabled = true;

            //Set Item 17
            d.getElementById('frm2200A:chkPymntManner_3').disabled = false;

        }
        else if (d.getElementById('frm2200A:chkPymntManner_1').checked) {
            //new
            setTax23(false);
            d.getElementById('frm2200A:btnSched1').disabled = false;
            setATCSchedule1();

            if (sched1Mess) {
                sched1Mess = false;
            }
        }

        dateMonthYear();
    }

    function changeMannerOfPayment() {
        if (d.getElementById('frm2200A:chkPymntManner_3').checked) {
            d.getElementById('frm2200A:txt17OthMannerofPymnt').disabled = false;
            d.getElementById('frm2200A:txt17OthMannerofPymnt').style.background = "ffffff";
            d.getElementById('frm2200A:txt17OthMannerofPymnt').focus();
        }
        if (d.getElementById('frm2200A:chkPymntManner_2').checked && !d.getElementById('frm2200A:chkPymntManner_3').checked) {
            //clearSched1(true);
            d.getElementById('frm2200A:txtMonth1').disabled = true;
            d.getElementById('frm2200A:txtTax18').value = '0.00';
            compute20();

            setTax23(true);
            d.getElementById('frm2200A:btnSched1').disabled = true;

            //Set Item 17
            d.getElementById('frm2200A:chkPymntManner_3').disabled = false;
            d.getElementById('frm2200A:txt17OthMannerofPymnt').disabled = true;
            d.getElementById('frm2200A:txt17OthMannerofPymnt').value = "";
            d.getElementById('frm2200A:txt17OthMannerofPymnt').style.background = "ededed";
            
            d.getElementById('frm2200A:txtTax25A').focus();
        }
         
        else if (d.getElementById('frm2200A:chkPymntManner_1').checked) {
            //new
            setTax23(false);
            d.getElementById('frm2200A:btnSched1').disabled = false;
            setATCSchedule1();

            //Set Item 17
            d.getElementById('frm2200A:chkPymntManner_3').disabled = true;
            d.getElementById('frm2200A:txt17OthMannerofPymnt').disabled = true;
            d.getElementById('frm2200A:txt17OthMannerofPymnt').value = "";
            d.getElementById('frm2200A:txt17OthMannerofPymnt').style.background = "ededed";
            d.getElementById('frm2200A:chkPymntManner_3').checked = false;

            if (showFillupSched1Alert) {
                alert("Please fill up the fields for Schedule 1.");
                showSched1();
                loadSched1();
            }
            if (sched1Mess) {
                alert("Please fill up the fields for Schedule 1.");
                sched1Mess = false;
            }
        }
        
        dateMonthYear();
    }

    //new
    function setTax23(isDisabled) {
        d.getElementById('frm2200A:txtTax23A').disabled = isDisabled;
        d.getElementById('frm2200A:txtTax23B').disabled = isDisabled;
        d.getElementById('frm2200A:txtTax23C').disabled = isDisabled;
        
        if (isDisabled) {
            d.getElementById('frm2200A:txtTax23A').value = "0.00";
            d.getElementById('frm2200A:txtTax23B').value = "0.00";
            d.getElementById('frm2200A:txtTax23C').value = "0.00";
        }

        compute23D();
    }
    function dateMonthYear() {
        if (d.getElementById('frm2200A:chkPymntManner_2').checked) {
            var month = new Date();
            var date1 = new Date();
            var year = new Date();
            d.getElementById('frm2200A:txtMonth1').selectedIndex = month.getMonth();
            d.getElementById('frm2200A:txtMonth1').disabled = true;
            dd = "" + year.getDate();
            if (dd.length == 1) {
                dd = "0" + dd;
                d.getElementById('frm2200A:txtDate').value = dd;
            }
            else {
                d.getElementById('frm2200A:txtDate').value = year.getDate();
            }
            d.getElementById('frm2200A:txtDate').disabled = true;
            d.getElementById('frm2200A:txtForYr').value = year.getFullYear();
            d.getElementById('frm2200A:txtForYr').disabled = true;
        }
        else {
            d.getElementById('frm2200A:txtMonth1').disabled = false;
            d.getElementById('frm2200A:txtDate').disabled = false;
            d.getElementById('frm2200A:txtForYr').disabled = false;
        }
    }
    function showSched1() {
        if (d.getElementById('frm2200A:chkPymntManner_1').checked) {

                setATCSchedule1();
                $('#formPaper').hide();
                $('#MainContent').hide('blind');
                $('#modalSched1').show('fade');
                var y = 1;
                var x = 1;
                while (y < 3) {
                    // 2 for Distilled Spirits, 4 for Wines
                    var tempVar = (y === 1) ? 2 : 4;
                    x = 1;
                    while (x <= tempVar) {
                        waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm2200A:xa" + y + "_exempt" + x + "', 4)", 100);
                        waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm2200A:xa" + y + "_taxable" + x + "', 4)", 100);
                        waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm2200A:xa" + y + "_exciseTaxDue" + x + "', 4);d.getElementById('frm2200A:xa" + y + "_exciseTaxDue" + x + "').disabled = true", 100);

                        if (disableFieldModal) {
                            waitstr = setTimeout("d.getElementById('frm2200A:xa" + y + "_exempt" + x + "', 4).disabled = true;", 100);
                            waitstr = setTimeout("d.getElementById('frm2200A:xa" + y + "_taxable" + x + "', 4).disabled = true;", 100);
                        }

                        x++;
                    }
                    y++;
                }

                y = 1;
                while (y < 4) {
                    waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm2200A:xa3_exempt" + y + "', 4)", 100);
                    waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm2200A:xa3_taxable" + y + "', 4)", 100);
                    waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm2200A:xa3_exciseTaxDue" + y + "', 4);d.getElementById('frm2200A:xa3_exciseTaxDue" + y + "').disabled = true", 100);

                    if (disableFieldModal) {
                        waitstr = setTimeout("d.getElementById('frm2200A:xa3_exempt" + y + "', 4).disabled = true;", 100);
                        waitstr = setTimeout("d.getElementById('frm2200A:xa3_taxable" + y + "', 4).disabled = true;", 100);
                    }
                    y++;
                }

                var rsize = d.getElementById("frm2200AadditionalSched1").rows.length;
                for (y = 0; y < rsize; y++) {
                    waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm2200A:sched1AppRate" + y + "', 4)", 100);
                    waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm2200A:sched1Exempt" + y + "', 4)", 100);
                    waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm2200A:sched1Taxable" + y + "', 4)", 100);
                    waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm2200A:sched1ExciseTaxDue" + y + "', 4);d.getElementById('frm2200A:sched1ExciseTaxDue" + y + "').disabled = true", 100);
                    if (disableFieldModal) {
                        waitstr = setTimeout("d.getElementById('frm2200A:sched1Atc" + y + "', 4).disabled = true;", 100);
                        waitstr = setTimeout("d.getElementById('frm2200A:sched1Desc" + y + "', 4).disabled = true;", 100);
                        waitstr = setTimeout("d.getElementById('frm2200A:sched1TaxBracket" + y + "', 4).disabled = true;", 100);
                        waitstr = setTimeout("d.getElementById('frm2200A:sched1AppRate" + y + "', 4).disabled = true;", 100);
                        waitstr = setTimeout("d.getElementById('frm2200A:sched1Exempt" + y + "', 4).disabled = true;", 100);
                        waitstr = setTimeout("d.getElementById('frm2200A:sched1Taxable" + y + "', 4).disabled = true;", 100);
                    }
                }

                waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm2200A:totalTaxDue', 4);d.getElementById('frm2200A:totalTaxDue').disabled = true", 100);
                if (disableFieldModal) {
                    setTimeout("d.getElementById('frm2200A:btnAdd').disabled = true;", 100);
                    setTimeout("d.getElementById('frm2200A:btnDelete').disabled = true;", 100);
                }
            } else if (d.getElementById('frm2200A:chkPymntManner_2').checked) {
                alert("Schedule 1 is not required for Prepayment/Advance Deposit.");
                return;
            } else {
                alert("Choose Manner of Payment.");
                return;
            }
    }
    //global var for schedule1 html
    var mainSched1 = "";

    function loadSched1() {
        mainSched1 = $('#modalSched1').html();

        $('input[type="text"]').focus(function () {
            $(this).css({ 'background': '#ffffcc' });
            this.select();
        });

        $('input[type="text"]').blur(function () {
            $(this).css({ 'background': '#ffffff' });
        });

    }
    function cancelSched1() {
        $('#modalSched1').html(mainSched1);

        $("#modalSched1 input").bind('paste drag drop', function (e) {
            e.preventDefault();
        });
    }

    function hideSched1() {
        $('#formPaper').show();
        $('#MainContent').show();
        if ($('#modalSched1').css('display') != 'none') {
            $('#modalSched1').hide('fade');
        }
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
    }

    function clearSched1(noDisplayMessage) {
        if (noDisplayMessage || confirm('Values inputted will be deleted. Do you want to continue?')) {
            //Remove all rows except first row
            $("#frm2200AadditionalSched1").find("tr:gt(0)").remove();

            $("#modalSched1 input[type=text]").val("");
            $("#modalSched1 input[type=text][maxlength='15']").val("0.00");
            $("#modalSched1 input[type=text][maxlength='25']").val("0.00");
            $("#modalSched1 input[type=text][maxlength='6']").val("0.00");

            clearModalCalculators();

            d.getElementById('frm2200A:sched1Atc0').value = 'XA';

        }
    }

    function addFieldsForSched1Reload() {
        var sched1Field = d.getElementById('frm2200AadditionalSched1');
        addRow(sched1Field, sched1Fields());
        sched1Mess = false;
    }

    function addFieldsForSched1() {
        var sched1Field = d.getElementById('frm2200AadditionalSched1');
        if (isValidDataOnSched1()) {
            addRow(sched1Field, sched1Fields());
        }
    }

    function addRow(tbody, text) {

        $('#frm2200AadditionalSched1').append(text);
        $("#frm2200AadditionalSched1 tr:last input").bind('paste drag drop', function (e) {
            e.preventDefault();
        });
    }

    function deleteFieldForSched1() {
        var sched1Field = d.getElementById('frm2200AadditionalSched1'),
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
        }
    }

    function sched1Input() {
        var sched1Field = d.getElementById('frm2200AadditionalSched1'),
            sched1FieldRows = sched1Field.rows.length, indexCtr;

        for (indexCtr = 1; indexCtr < sched1FieldRows; indexCtr++) {
            var sched1FieldInputs = sched1Field.rows[indexCtr].getElementsByTagName('input');

            // Checkbox
            sched1FieldInputs[0].id = "frm2200A:sched1Chk" + indexCtr;

            // ATC textbox
            sched1FieldInputs[1].id = "frm2200A:sched1Atc" + indexCtr;
            sched1FieldInputs[1].onblur = atcCodeOthersBlur(sched1FieldInputs[1], indexCtr);

            // Description textbox
            sched1FieldInputs[2].id = "frm2200A:sched1Desc" + indexCtr;

            // Tax Bracket textbox
            sched1FieldInputs[3].id = "frm2200A:sched1TaxBracket" + indexCtr;

            // Applicable Rate textbox
            sched1FieldInputs[4].id = "frm2200A:sched1AppRate" + indexCtr;
            sched1FieldInputs[4].onblur = callWhenChange(sched1FieldInputs[4], indexCtr);

            // Exempt textbox
            sched1FieldInputs[5].id = "frm2200A:sched1Exempt" + indexCtr;

            // Taxable textbox
            sched1FieldInputs[6].id = "frm2200A:sched1Taxable" + indexCtr;
            sched1FieldInputs[6].onblur = callWhenChange(sched1FieldInputs[6], indexCtr);

            // Excise Tax Due textbox
            sched1FieldInputs[7].id = "frm2200A:sched1ExciseTaxDue" + indexCtr;
        }

        computeSched1TotalTaxDue();
    }

    function callWhenChange(elem, indexCtr) {
        return function () {
            var returnFunction = "";

            if (elem.id.toString().indexOf("AppRate") > -1) {
                returnFunction = checkUniqueRate(indexCtr);
            }

            round(elem, 2);
            computeDynamicSched1(indexCtr);
            onBlurIterate(elem);
            returnFunction;
        };
    }

    function atcCodeOthersBlur(elem, indexCtr) {
        return function () {
            capitalize(elem);
            checkATCValue(elem);
            checkUniqueRate(indexCtr);
            onBlurIterate(elem);
        };
    }

    function sched1Fields() {
        var sched1FieldRows = d.getElementById('frm2200AadditionalSched1').rows.length;
        sched1Index = sched1FieldRows;


        var fields = "";
        fields = "<tr style='text-align: center;'><td><input type='checkbox' name='frm2200A:sched1Chk" + sched1Index + "' id='frm2200A:sched1Chk" + sched1Index + "' value='1' /></td>" +
            "<td><input type='text' style='text-align:center' size='4' name='frm2200A:sched1Atc[]' id='frm2200A:sched1Atc" + sched1Index + "' value='XA' maxlength='5' onchange='capitalize(this); checkATCValue(this); checkUniqueRate(" + sched1Index + "); onBlurIterate(this);' onfocus='onFocusIterate(this)' onkeypress='return letternumber(event)' /></td>" +
            "<td><input type='text' size='25' name='frm2200A:sched1Desc[]'  id='frm2200A:sched1Desc" + sched1Index + "' maxlength='255' onblur='onBlurIterate(this);' onfocus='onFocusIterate(this)' /></td>" +
            "<td><input type='text' size='15' name='frm2200A:sched1TaxBracket[]'  id='frm2200A:sched1TaxBracket" + sched1Index + "' maxlength='20' onblur='onBlurIterate(this);' onfocus='onFocusIterate(this)' /></td>" +
            "<td><input type='text' style='text-align:right' size='8' name='frm2200A:sched1AppRate[]'  id='frm2200A:sched1AppRate" + sched1Index + "' maxlength='6' value='0.00' onblur='setApplicableTaxrate(this); checkUniqueRate(" + sched1Index + "); computeDynamicSched1(" + sched1Index + "); onBlurIterate(this);' onkeypress='return numbersonly(this, event)' onfocus='onFocusIterate(this)' /></td>" +
            "<td><input type='text' style='text-align:right' size='17' name='frm2200A:sched1Exempt[]'  id='frm2200A:sched1Exempt" + sched1Index + "' maxlength='15' value='0.00' onblur='roundDownWithAlert(this); onBlurIterate(this);' onkeypress='return numbersonly(this, event);' onfocus='onFocusIterate(this)'/></td>" +
            "<td><input type='text' style='text-align:right' size='17' name='frm2200A:sched1Taxable[]'  id='frm2200A:sched1Taxable" + sched1Index + "' maxlength='15' value='0.00' onblur='roundDownWithAlert(this); computeDynamicSched1(" + sched1Index + "); onBlurIterate(this);' onkeypress='return numbersonly(this, event)' onfocus='onFocusIterate(this)' /></td>" +
            "<td><input type='text' style='text-align:right' size='19'  name='frm2200A:sched1ExciseTaxDue[]' id='frm2200A:sched1ExciseTaxDue" + sched1Index + "' style='background-color: rgb(220, 220, 220)' maxlength='25' value='0.00' /></td></tr>";

        setTimeout("d.getElementById('frm2200A:sched1ExciseTaxDue" + sched1Index + "').disabled = true;", 100);

        return fields;
    }

    function checkUniqueRate(elemIndex) {
        var i = 0; len = sched1ATCList.length,
            rateToCheck = d.getElementById("frm2200A:sched1AppRate" + elemIndex),
            atcCodeToCheck = d.getElementById("frm2200A:sched1Atc" + elemIndex).value.toUpperCase().toString(),
            newRate = (atcCodeToCheck === "XA035") ? ((rateToCheck.value.split("%")[0] * 1) / 100) : (rateToCheck.value * 1),
            isUniqueInNonOthers = true;
            
        for (i = 0; i < len; i++) {
            if ((atcCodeToCheck === sched1ATCList[i].atcCode) && ((sched1ATCList[i].rate * 1) === newRate)) {
                isUniqueInNonOthers = false;

                alert("Rates should be unique per ATC.");
                rateToCheck.value = (atcCodeToCheck === "XA035") ? "0.00%" : "0.00";
                rateToCheck.focus();

                break;
            }
        }

        if (!!isUniqueInNonOthers) {
            var sched1FieldRows = d.getElementById('frm2200AadditionalSched1').rows.length;

            for (i = 0; i < sched1FieldRows; i++) {
                var atcCodeInTable = d.getElementById("frm2200A:sched1Atc" + i).value.toUpperCase().toString(),
                    rateInTable = d.getElementById("frm2200A:sched1AppRate" + i),                   
                    oldRate = (atcCodeInTable === "XA035") ? ((rateInTable.value.split("%")[0] * 1) / 100) : (rateInTable.value * 1);

                if ((rateToCheck !== rateInTable) && (atcCodeToCheck === atcCodeInTable) && (oldRate === newRate)) {
                    alert("Rates should be unique per ATC.");
                    rateToCheck.value = (atcCodeToCheck === "XA035") ? "0.00%" : "0.00";
                    rateToCheck.focus();

                    break;
                }
            }
        }
    }

    var rowIndexCalculatorG = -1, isARowCleared = false, sched1LastElemFocus = {};

    function computeSched1Alcohol(taxable, taxDue) {
        var appRate = d.getElementById(taxable.id + "ratehidden").value,
            basicExciseTaxDue = (appRate * NumWithComma(taxable.value));

        d.getElementById(taxDue).value = roundDownComputation(basicExciseTaxDue);

        if ((computeSched1TotalTaxDue() >= 1000000000000) || (basicExciseTaxDue >= 1000000000000)) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Basic Excise Tax Due/Total Tax Due.");

            d.getElementById(taxDue).value = "0.00";
            $(taxable).parents().eq(1).find("input[id*=exempt]").val("0.00");

            taxable.value = "0.00";
            taxable.focus();

            computeSched1TotalTaxDue();

            if ($("div[id*='Calculator']").is(":visible")) {
                var visibleCalculator = $("div[id*='Calculator']:visible").attr("id").split("Calculator")[1];

                clearCalculatorRow(visibleCalculator, rowIndexCalculatorG);
                computeSum(visibleCalculator);

                rowIndexCalculatorG = -1;
                isARowCleared = true;
            }
        }

        sched1LastElemFocus = taxable;
    }

    function computeXA090() {
        d.getElementById('frm2200A:xa2_exciseTaxDue5').value = roundDownComputation(NumWithComma(d.getElementById('frm2200A:xa2_rate5').value) * 1 * NumWithComma(d.getElementById('frm2200A:xa2_taxable5').value) * 1);
        computeSched1TotalTaxDue();
    }

    function computeDynamicSched1(index) {
        var atc = d.getElementById("frm2200A:sched1Atc" + index),
            app = d.getElementById("frm2200A:sched1AppRate" + index),
            tax = d.getElementById("frm2200A:sched1Taxable" + index),
            eciseTaxElem = d.getElementById("frm2200A:sched1ExciseTaxDue" + index);

        var appValue = (atc.value === "XA035") ? NumWithComma(app.value.split("%")[0]) / 100 : NumWithComma(app.value);
        basicExciseTaxDue = (appValue * NumWithComma(tax.value));

        eciseTaxElem.value = roundDownComputation(basicExciseTaxDue);

        if ((computeSched1TotalTaxDue() >= 1000000000000) || (basicExciseTaxDue >= 1000000000000)) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Basic Excise Tax Due/Total Tax Due.");

            clearRowDynamicSched1(index);
            tax.focus();

            computeSched1TotalTaxDue();
        }

        sched1LastElemFocus = tax;
    }

    function clearRowDynamicSched1(index) {

        d.getElementById("frm2200A:sched1Atc" + index).value = "XA";
        d.getElementById("frm2200A:sched1Desc" + index).value = "";
        d.getElementById("frm2200A:sched1TaxBracket" + index).value = "";
        d.getElementById("frm2200A:sched1Exempt" + index).value = "0.00";
        d.getElementById("frm2200A:sched1AppRate" + index).value = "0.00";
        d.getElementById("frm2200A:sched1Taxable" + index).value = "0.00";
        d.getElementById("frm2200A:sched1ExciseTaxDue" + index).value = "0.00";
    }

    function computeSched1TotalTaxDue() {
        var totalTaxDue = 0, year = d.getElementById("frm2200A:txtForYr").value,
            xa090Elem = d.getElementById('frm2200A:xa2_exciseTaxDue5');

        var y = 1;
        var x = 1;
        while (y < 3) {
            // 2 for Distilled Spirits, 4 for Wines
            var tempVar = (y === 1) ? 2 : 4;
            x = 1;
            while (x <= tempVar) {
                var appRate = d.getElementById("frm2200A:xa" + y + "_taxable" + x + "ratehidden").value,
                    taxableColumn = NumWithComma(d.getElementById("frm2200A:xa" + y + "_taxable" + x).value),
                    exciseTaxDue = appRate * taxableColumn;

                d.getElementById("frm2200A:xa" + y + "_exciseTaxDue" + x).value = roundDownComputation(exciseTaxDue);

                totalTaxDue += exciseTaxDue;
                x++;
            }
            y++;
        }

        y = 1;
        while (y < 4) {
            var appRate = d.getElementById("frm2200A:xa3_taxable" + y + "ratehidden").value,
                taxableColumn = NumWithComma(d.getElementById("frm2200A:xa3_taxable" + y).value),
                exciseTaxDue = appRate * taxableColumn;

            d.getElementById("frm2200A:xa3_exciseTaxDue" + y).value = roundDownComputation(exciseTaxDue);

            totalTaxDue += exciseTaxDue;
            y++;
        }

        // Bug #3918
        if (year < 2014) {
            totalTaxDue += NumWithComma(d.getElementById("frm2200A:xa3_exciseTaxDueXA0552").value);
        }
        if (year < 2017) {
            totalTaxDue += NumWithComma(d.getElementById("frm2200A:xa3_exciseTaxDueXA0562").value);
        }

        var sched1Field = d.getElementById('frm2200AadditionalSched1');
        x = 0;
        while (x < sched1Field.rows.length) {
            totalTaxDue += (NumWithComma(d.getElementById("frm2200A:sched1ExciseTaxDue" + x).value) * 1);
            x++;
        }

        if (arguments.length > 0 && ((totalTaxDue + NumWithComma(arguments[0].value)) >= 1000000000000)) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Total Tax Due.");

            arguments[0].value = "0.00";

            $(arguments[0]).parents().eq(1).find("input[id*=exempt]").val("0.00");
            $(arguments[0]).parents().eq(1).find("input[id*=taxable]").val("0.00");

            arguments[0].focus();
        }
        else {
            totalTaxDue += NumWithComma(xa090Elem.value);
        }

        d.getElementById('frm2200A:totalTaxDue').value = roundDownComputation(totalTaxDue);

        return totalTaxDue;
    }

    function sched1OK() {

        var isOk = true;
        //For checking of XA035 and XA036
        if ($.trim(d.getElementById('frm2200A:xa1_taxable1').value) !== "0.00" && $.trim(d.getElementById('frm2200A:xa1_taxable2').value) === "0.00") {// || ($.trim(xa035exempt.value) !== "0.00" && $.trim(xa036exempt.value) === "0.00")) {
            alert("Tax Base column for XA036 must have a value.");
            d.getElementById('frm2200A:xa1_taxable2').focus();
            isOk = false;
        }
        else if ($.trim(d.getElementById('frm2200A:xa1_taxable2').value) !== "0.00" && $.trim(d.getElementById('frm2200A:xa1_taxable1').value) === "0.00") {// || ($.trim(xa036exempt.value) !== "0.00" && $.trim(xa035exempt.value) === "0.00")) {
            alert("Tax Base column for XA035 must have a value.");
            d.getElementById('frm2200A:xa1_taxable1').focus();
            isOk = false;
        }


        if (isOk) {
            var isValid = $.trim(d.getElementById('frm2200A:sched1Atc0').value) == "XA" && $.trim(d.getElementById('frm2200A:sched1Desc0').value) == "" && $.trim(d.getElementById('frm2200A:sched1TaxBracket0').value) == "" && $.trim(d.getElementById('frm2200A:sched1AppRate0').value) == "0.00" && d.getElementById('frm2200A:sched1Exempt0').value == "0.00" && $.trim(d.getElementById('frm2200A:sched1Taxable0').value) == "0.00";

            if (isValid || isValidDataOnSched1()) {
                d.getElementById('frm2200A:txtTax18').value = d.getElementById('frm2200A:totalTaxDue').value;

                hideSched1();

                compute20(sched1LastElemFocus);
            }
        }
    }

    function compute19C(elem) {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm2200A:txtTax19A').value) * 1) + (NumWithComma(d.getElementById('frm2200A:txtTax19B').value) * 1);

        if (total >= 1000000000000 || total <= -1000000000000) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Item 19C (Total).");

            elem.value = "0.00";
            elem.focus();
        }
        else {
            d.getElementById('frm2200A:txtTax19C').value = roundDownComputation((total));
        }

        compute20(elem);
    }

    function compute20() {
        var total = 0;

        total = (NumWithComma(d.getElementById('frm2200A:txtTax18').value) * 1) - (NumWithComma(d.getElementById('frm2200A:txtTax19C').value) * 1);

        d.getElementById('frm2200A:txtTax20').value = roundDownComputation((total));

        if (arguments.length > 0) {
            compute22(arguments[0]);
        }
        else {
            compute22();
        }
    }

    function compute22() {
        var total = 0;

        total = (NumWithComma(d.getElementById('frm2200A:txtTax20').value) * 1) - (NumWithComma(d.getElementById('frm2200A:txtTax21').value) * 1);

        if (total >= 1000000000000 || total <= -1000000000000) {
            if (arguments.length > 0) {
                alert("Exceeded maximum amount of 999,999,999,999.99 on Item 22 (Tax Still Due / Overpayment).");

                if (arguments[0].id.toLowerCase().indexOf("taxable") > -1) {
                    d.getElementById('frm2200A:txtTax19A').value = "0.00";
                    compute19C(d.getElementById('frm2200A:txtTax19A'));
                }
                else {
                    arguments[0].value = "0.00";
                    arguments[0].focus();
                }
                //alert(arguments[0].id);
            }
        }
        else {
            d.getElementById('frm2200A:txtTax22').value = roundDownComputation((total));
        }

        if (arguments.length > 0) {
            compute24(arguments[0]);
        }
        else {
            compute24();
        }
    }
    function compute23D() {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm2200A:txtTax23A').value) * 1) + (NumWithComma(d.getElementById('frm2200A:txtTax23B').value) * 1) + (NumWithComma(d.getElementById('frm2200A:txtTax23C').value) * 1);

        if (total >= 1000000000000 || total <= -1000000000000) {
            if (arguments.length > 0) {
                alert("Exceeded maximum amount of 999,999,999,999.99 on Item 23D (Total Penalties).");

                arguments[0].value = "0.00";
                arguments[0].focus();
            }
        }
        else {
            d.getElementById('frm2200A:txtTax23D').value = roundDownComputation((total));
        }

        if (arguments.length > 0) {
            compute24(arguments[0]);
        }
        else {
            compute24();
        }

        d.getElementById('frm2200A:chkPenalties').checked = (total > 0);
        
        payPenalties();
    }
    function payPenalties() {
        if (d.getElementById('frm2200A:chkPenalties').checked) {
            d.getElementById('frm2200A:txtTax25B').value = d.getElementById('frm2200A:txtTax23D').value;
        }
        else {
            d.getElementById('frm2200A:txtTax25B').value = "0.00";
        }
        compute25C(d.getElementById('frm2200A:txtTax25A'));
    }
    function compute24() {
        var total = 0;

        total = (NumWithComma(d.getElementById('frm2200A:txtTax22').value) * 1) + (NumWithComma(d.getElementById('frm2200A:txtTax23D').value) * 1);

        if (total >= 1000000000000 || total <= -1000000000000) {
            if (arguments.length > 0) {
                alert("Exceeded maximum amount of 999,999,999,999.99 on Item 24 (Amount Payable).");

                arguments[0].value = "0.00";
                arguments[0].onblur();

                if (arguments[0].id.toLowerCase().indexOf("taxable") > -1) {
                    clearSched1(true);
                    d.getElementById('frm2200A:txtTax18').value = d.getElementById('frm2200A:totalTaxDue').value;
                    compute20();
                    //clearRowDynamicSched1(arguments[0].id.split("frm2200A:sched1Taxable")[1]);
                }
                else {
                    arguments[0].focus();
                }
            }
        }
        else {
            d.getElementById('frm2200A:txtTax24').value = roundDownComputation((total));
        }

        if (arguments.length > 0) {
            compute26(arguments[0]);
        }
        else {
            compute26();
        }
    }

    function compute25C() {
        var total = 0;

        total = (NumWithComma(d.getElementById('frm2200A:txtTax25A').value) * 1) + (NumWithComma(d.getElementById('frm2200A:txtTax25B').value) * 1);

        if (total >= 1000000000000 || total <= -1000000000000) {
            if (arguments.length > 0) {
                alert("Exceeded maximum amount of 999,999,999,999.99 on Item 25C (Total Payments Made Today).");

                arguments[0].value = "0.00";
                arguments[0].focus();
                arguments[0].onblur();
            }
        }
        else {
            d.getElementById('frm2200A:txtTax25C').value = roundDownComputation((total));
        }

        if (arguments.length > 0) {
            compute26(arguments[0]);
        }
        else {
            compute26();
        }
    }

    function compute26() {
        var total = 0;

        total = (NumWithComma(d.getElementById('frm2200A:txtTax24').value) * 1) - (NumWithComma(d.getElementById('frm2200A:txtTax25C').value) * 1);

        if (total >= 1000000000000 || total <= -1000000000000) {
            if (arguments.length > 0) {
                alert("Exceeded maximum amount of 999,999,999,999.99 on Item 25C (Total Payments Made Today).");

                arguments[0].value = "0.00";
                arguments[0].focus();
                arguments[0].onblur();
            }
        }
        else {
            d.getElementById('frm2200A:txtTax26').value = roundDownComputation((total));
        }
    }
    function validateBeforeSave() {
        var dt = new Date();
        var isLeap = new Date(document.getElementById('frm2200A:txtForYr').value, 1, 29).getMonth() == 1;

        if (!isLeap && document.getElementById('frm2200A:txtMonth1').value == 2 && document.getElementById('frm2200A:txtDate').value == 29) {
            alert("Filing year is not a leap year.");
            return;
        }
        if (!isLeap && document.getElementById('frm2200A:txtMonth1').value == 2 && document.getElementById('frm2200A:txtDate').value > 29) {
            alert("Invalid date entry on item 1.");
            return;
        }
        if (isLeap && document.getElementById('frm2200A:txtMonth1').value == 2 && document.getElementById('frm2200A:txtDate').value > 29) {
            alert("Invalid date entry on item 1.");
            return;
        }
        if (d.getElementById('frm2200A:txtDate').value == "" || d.getElementById('frm2200A:txtDate').value * 1 == 0) {
            alert("Please enter valid day on item 1.");
            return;
        }
        if (d.getElementById('frm2200A:txtForYr').value == "") {
            alert("Please enter valid year on item 1.");
            return;
        }
        if (d.getElementById('frm2200A:txtForYr').value * 1 < 1900) {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }

        if (d.getElementById('frm2200A:txtDate').value < 1) {
            alert("Please enter a valid day in Item 1.");
            return;
        }

        //Check if valid date-benjie manalaysay
        var month31 = (['01', '03', '05', '07', '08', '10', '12']);
        var month30 = (['04', '06', '09', '11']);
        var month = document.getElementById('frm2200A:txtMonth1').value
        if (month31.contains(month) && document.getElementById('frm2200A:txtDate').value > 31) {
            alert("Invalid date entry on Item no.1.");
            return;
        }
        else if (month30.contains(month) && document.getElementById('frm2200A:txtDate').value > 30) {
            alert("Invalid date entry on Item no.1.");
            return;
        }

        if ((d.getElementById('frm2200A:txtTIN1').value == "" || d.getElementById('frm2200A:txtTIN2').value == "" || d.getElementById('frm2200A:txtTIN3').value == "" || d.getElementById('frm2200A:txtBranchCode').value == "")) {
            alert("Please enter a valid TIN on Item 4.");
            return false;
        }

        
        if ((d.getElementById('frm2200A:txtTaxPayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 6.");
            return false;
        }

        //Registered Address must be valid
        if (d.getElementById('frm2200A:txtAddress').value === "") {
            alert("Please enter a valid Registered Address on Item 7.");
            return false;
        }

        if ((d.getElementById('frm2200A:txtZipCode').value == "") || (d.getElementById('frm2200A:txtZipCode').value.length < 4)) {
            alert("Please enter Taxpayer's Zip Code on Item 7A.");
            return false;
        }

        //Contact Number must be valid
        if (d.getElementById('frm2200A:txtContactNum').value === "") {
            alert("Please enter a valid Contact Number on Item 8.");
            return false;
        }

        if ((d.getElementById('frm2200A:txtLineBus').value == "")) {
            alert("Please enter a valid Line of Business/Occupation on Item 9.");
            return false;
        }

        //
        return true;
    }

    function validateForm() {
        setATCSchedule1();

        var dt = new Date();
        var isLeap = new Date(document.getElementById('frm2200A:txtForYr').value, 1, 29).getMonth() == 1;

        if (document.getElementById('frm2200A:txtMonth1').selectedIndex == 1 && document.getElementById('frm2200A:txtDate').value > 29) {
            alert("Invalid date entry on Item 1.");
            return;
        }

        if (!isLeap && document.getElementById('frm2200A:txtMonth1').selectedIndex == 1 && document.getElementById('frm2200A:txtDate').value > 28) {
            alert("Filing year is not a leap year.");
            return;
        }

        if (isLeap && document.getElementById('frm2200A:txtMonth1').selectedIndex == 1 && document.getElementById('frm2200A:txtDate').value > 29) {
            alert("Invalid date entry on Item 1.");
            return;
        }

        if (d.getElementById('frm2200A:txtDate').value == "" || d.getElementById('frm2200A:txtDate').value * 1 == 0) {
            alert("Please enter valid day on Item 1.");
            return;
        }
        if (d.getElementById('frm2200A:txtForYr').value == "") {
            alert("Please enter valid year on Item 1.");
            return;
        }
        
        if (d.getElementById('frm2200A:txtForYr').value * 1 < 1900) {
            alert("Invalid date entry on Item 1. Entry should not be lower than 1900.")
            return;
        }

        if (d.getElementById('frm2200A:txtDate').value < 1) {
            alert("Please enter a valid day on Item 1.");
            return;
        }

        //Check if valid date -Benjie Manalaysay
        var month31 = (['01', '03', '05', '07', '08', '10', '12']);
        var month30 = (['04', '06', '09', '11']);
        var month = document.getElementById('frm2200A:txtMonth1').value
        if (month31.contains(month) && document.getElementById('frm2200A:txtDate').value > 31) {
            alert("Invalid date entry on Item 1.");
            return;
        }
        else if (month30.contains(month) && document.getElementById('frm2200A:txtDate').value > 30) {
            alert("Invalid date entry on Item 1.");
            return;
        }


        if (d.getElementById('frm2200A:txtDate').value.length == 1) {
            alert("Please enter a valid day on item 1. Format should be MM/DD/YYYY.")
            return;
        }

        if ((d.getElementById('frm2200A:txtTIN1').value == "" || d.getElementById('frm2200A:txtTIN2').value == "" || d.getElementById('frm2200A:txtTIN3').value == "" || d.getElementById('frm2200A:txtBranchCode').value == "")) {
            alert("Please enter a valid TIN on Item 4.");
            return;
        }
        
        if ((d.getElementById('frm2200A:txtTaxPayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 6.");
            return;
        }

        if ((d.getElementById('frm2200A:txtAddress').value == "")) {
            alert("Please enter Taxpayer's Registered Address on Item 7.");
            return;
        }
        if ((d.getElementById('frm2200A:txtZipCode').value == "") || (d.getElementById('frm2200A:txtZipCode').value.length < 4)) {
            alert("Please enter Taxpayer's Zip Code on Item 7A.");
            return;
        }

        if ((d.getElementById('frm2200A:txtContactNum').value == "")) {
            alert("Please enter Contact Number on Item 8.");
            return;
        }
        if ((d.getElementById('frm2200A:txtLineBus').value == "")) {
            alert("Please enter a valid Line of Business/Occupation on Item 9.");
            return;
        }
        if ((d.getElementById('frm2200A:txtPSIC').value == "") || (d.getElementById('frm2200A:txtPSIC').value.length < 4)) {
            alert("Please enter a valid PSIC on Item 10.");
            return;
        }
        if ((d.getElementById('frm2200A:txtEmailAddress').value == "")) {
            alert("Please enter Email Address on Item 11.");
            return;
        }

        if (d.getElementById('frm2200A:txt12optRegion').selectedIndex < 1 || d.getElementById('frm2200A:txt12optProvince').selectedIndex < 1 ||
            d.getElementById('frm2200A:txt12optCity').selectedIndex < 1) // || d.getElementById('frm2200A:txt12PlaceofProd').value == ""
        {
            alert("Please enter values on Item 12. All entries must not be empty.")
            return;
        }
        if (d.getElementById('frm2200A:txt13optRegion1').selectedIndex < 1 || d.getElementById('frm2200A:txt13optProvince1').selectedIndex < 1 ||
            d.getElementById('frm2200A:txt13optCity1').selectedIndex < 1) // || d.getElementById('frm2200A:txt13PlaceofRem').value == ""
        {
            alert("Please enter values on Item 13. All entries must not be empty.")
            return;
        }
        if (d.getElementById('frm2200A:optTreaty_1').checked && d.getElementById('frm2200A:lstTaxTreaty').value == 0) {
            alert("Please choose value on Item 14A");
            return;
        }
        if (!d.getElementById('frm2200A:chkPymntManner_1').checked && !d.getElementById('frm2200A:chkPymntManner_2').checked) {
            alert("Please select an option on Part II Manner of Payment");
            return;
        }
        if (d.getElementById('frm2200A:chkPymntManner_3').checked && d.getElementById('frm2200A:txt17OthMannerofPymnt').value == "") {
            alert("Please enter a value on Item 17.");
            return;
        }

        //Added as of 06/04/2014 based on SRS Bug #3785
        var tax25A = parseFloat(NumWithComma(d.getElementById("frm2200A:txtTax25A").value));
        //if (d.getElementById('frm2200A:chkPymntManner_2').checked && d.getElementById('frm2200A:amendedRtn_2').checked && tax25A <= 0) { //&& tax22 > 0
        // 2014/07/11 - Bug #4229
        if (d.getElementById('frm2200A:chkPymntManner_2').checked && tax25A <= 0) { //&& tax22 > 0
            alert("Please enter Tax Payment / Deposit on Item 25A.")
            return;
        }

        var tax24total = parseFloat("" + d.getElementById('frm2200A:txtTax26').value);
        if (tax24total > 0) {
            //alert("Please click Schedule 1.");
        if(d.getElementById('frm2200A:amendedRtn_1').checked){
        alert("Payment not sufficient to cover amount payable. Please check amount in item 26.");
        d.getElementById('frm2200A:txtTax21').focus();
            }
        else{
        alert("Payment not sufficient to cover amount payable. Please check amount in item 25C.");
        d.getElementById('frm2200A:txtTax25A').focus();
        }
        return;
        }

        //05/29/2014 Bug #3732
        var isValidSched1 = validateSchedule1();
        if (!isValidSched1) {
            return;
        }

        d.getElementById('frm2200A:cmdValidate').disabled = true;
        d.getElementById('frm2200A:cmdEdit').disabled = false;
        d.getElementById('frm2200A:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;
        //Added as of 04/29/2014 (based on 1700's series)
        d.getElementById('btnPrint').disabled = false;
        d.getElementById('lnkPrintPreview').disabled = false;
        d.getElementById('frm2200A:btnSched1').disabled = false;

        d.getElementById('frm2200A:chkPymntManner_3').disabled = true;
        d.getElementById('frm2200A:txt17OthMannerofPymnt').disabled = true;
        d.getElementById('frm2200A:txt17OthMannerofPymnt').style.background = "ededed";

        enabledDisabled(true);
        d.getElementById('CloseGuidlinesPage').disabled = false;
        alert("Validation successful. Click on Edit if you wish to modify your entries.");
        return;
    }

    function editForm() {
        d.getElementById('frm2200A:cmdValidate').disabled = false;
        d.getElementById('frm2200A:cmdEdit').disabled = true;
        d.getElementById('frm2200A:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;

        //Added as of 04/29/2014 (based on 1700's series)
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('lnkPrintPreview').disabled = true;
        d.getElementById('lnkSave').disabled = false;
        enabledDisabled(false);
        selectChangeMannerOfPayment();
        changeAmendedReturn();

        d.getElementById('frm2200A:txtTIN1').disabled = true;
        d.getElementById('frm2200A:txtTIN2').disabled = true;
        d.getElementById('frm2200A:txtTIN3').disabled = true;
        d.getElementById('frm2200A:txtBranchCode').disabled = true;
        d.getElementById('frm2200A:txtEmailAddress').disabled = true;

    }

    var disableElem = true;
    var enableElem = false;
    function enabledDisabled(param) {

       
        d.getElementById('frm2200A:amendedRtn_1').disabled = param;
        d.getElementById('frm2200A:amendedRtn_2').disabled = param;
        d.getElementById('frm2200A:txtMonth1').disabled = param;
        d.getElementById('frm2200A:txtDate').disabled = param;
        d.getElementById('frm2200A:txtForYr').disabled = param;
        
        d.getElementById('frm2200A:txtEmailAddress').disabled = param;
        d.getElementById('frm2200A:txtPSIC').disabled = param;
        d.getElementById('frm2200A:txt12optRegion').disabled = param;
        d.getElementById('frm2200A:txt12optProvince').disabled = param;
        d.getElementById('frm2200A:txt12optCity').disabled = param;
        d.getElementById('frm2200A:txt13optRegion1').disabled = param;
        d.getElementById('frm2200A:txt13optProvince1').disabled = param;
        d.getElementById('frm2200A:txt13optCity1').disabled = param;
        d.getElementById('frm2200A:optTreaty_1').disabled = param;
        d.getElementById('frm2200A:optTreaty_2').disabled = param;
        d.getElementById('frm2200A:txtTax23A').disabled = param;
        d.getElementById('frm2200A:txtTax23B').disabled = param;
        d.getElementById('frm2200A:txtTax23C').disabled = param;

        if (d.getElementById('frm2200A:optTreaty_1').checked) {
            d.getElementById('frm2200A:lstTaxTreaty').disabled = param;
        }

        d.getElementById('frm2200A:chkPymntManner_1').disabled = param;
        d.getElementById('frm2200A:chkPymntManner_2').disabled = param;

        
        d.getElementById('frm2200A:txtTax25A').disabled = param;

        d.getElementById('frm2200A:txtTax19A').disabled = param;

        d.getElementById('frm2200A:txtTax21').disabled = param;

        if (!param) {
            if (d.getElementById('frm2200A:amendedRtn_1').checked) {
                d.getElementById('frm2200A:txtTax21').disabled = false;
            } else {
                d.getElementById('frm2200A:txtTax21').disabled = true;
            }
        }

        d.getElementById('frm2200A:btnOK').disabled = param;
        d.getElementById('frm2200A:btnClear').disabled = param;
        d.getElementById('frm2200A:btnPrintSched1').disabled = !param;

        $("input:text, input:checkbox, select-one", $("#modalSched1")).not(".isDisabled").prop("disabled", param);
        $("input:text, input:checkbox, select-one", $("div[id^=CalculatorXA]")).not(".isDisabled").prop("disabled", param);

        $("input[value*=Add], input[value*=Delete], input[value*=Clear], input[value*=Compute]").prop("disabled", param);

        disableElem;
        enableElem;
    }

    function getRdo() {
        var data = "<select class='iceSelOneMnu' id='frm2200A:txtRDOCode' name='frm2200A:txtRDOCode' size='1' disabled><option value=''> </option>";

        for (var i = 0; i < rdoList.length; i++) {
            var rdo = rdoList[i];
            data = data + "<option value='" + rdo.rdoCode + "'>" + rdo.description + "</option>";

        }
        data = data + "</select>"

        $('#rdoSelect').html(data);

    }

    
    function isValidDataOnSched1() {
        var result = true,
            sched1FieldRows = d.getElementById('frm2200AadditionalSched1').rows.length;

        if (sched1FieldRows > 0) {
            var index = 0;

            while (index < sched1FieldRows) {
                var atcCodeOthers = d.getElementById('frm2200A:sched1Atc' + index).value,
                    appDescription = d.getElementById('frm2200A:sched1Desc' + index).value,
                    appTaxBracket = d.getElementById('frm2200A:sched1TaxBracket' + index).value,
                    appRateOthersElem = d.getElementById('frm2200A:sched1AppRate' + index).value,
                    appRateOthers = (appRateOthersElem.indexOf("%") > -1) ? appRateOthersElem.split("%")[0] : appRateOthersElem;

                if (atcCodeOthers == "" || $.trim(atcCodeOthers) == 'XA') {
                    alert("Please enter a valid ATC at Row " + (index + 1) + ".");
                    return false;
                }
                else if (atcCodeOthers != "") {
                    d.getElementById('frm2200A:sched1Atc' + index).value = atcCodeOthers.toUpperCase();

                    if (atcCodeOthers.toUpperCase().substring(0, 2) != "XA") {
                        alert("The supplied ATC code at Row " + (index + 1) + " should start with 'XA'.");
                        return false;
                    }
                }

                
                if ($.trim(appDescription) == "") {
                    alert("Please enter a valid Description at Row " + (index + 1) + ".");
                    return false;
                }
                else if ($.trim(appTaxBracket) == "") {
                    alert("Please enter a valid Tax Bracket at Row " + (index + 1) + ".");
                    return false;
                }
                else if (NumWithComma(appRateOthers) === 0) {
                    alert("Please enter a valid Applicable rate at Row " + (index + 1) + ".");
                    return false;
                }
                else if ((d.getElementById('frm2200A:sched1Taxable' + index).value * 1) === 0) {
                    alert("Please enter a valid Tax Base at Row " + (index + 1) + ".");
                    return false;
                }
                

                index++;
            }
        }

        return result;
    }

    function blockLetterInt(e) {
        var number = e.value;
        if (isNaN(number)) {
            e.value = "";
        } else {
            e.value = '' + number;
        }
    }

    Array.prototype.contains = Array.prototype.indexOf ?
    function (val) {
        return this.indexOf(val) > -1;
    } :
    function (val) {
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
        if ($("div[id*='Calculator']").is(":visible")) {
            printModal($("div[id*='Calculator']:visible").attr("id"));
        } else {
            $('#bg').hide();
            $('.printSignFooterClass').css({ 'width': '94%', 'margin': 'auto', 'margin-top': '15px', 'display': 'block', 'position': 'relative', 'overflow': 'visible', 'page-break-before': 'always', 'background': '#ffffff' });
            $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
            $('body').css('background', '#FFF');

            $('#formPaper').css({ 'max-width': '8.3in !important', 'border': '#000 3px solid' });
            $('#wrapper').css({ 'max-width': '8.3in !important' });
            $('#container').css({ 'max-width': '8.3in !important' });

            var elem = document.getElementById('frmMain').elements;
            var x = 0;
            disabledItems = new Array();
            for (var i = 0; i < elem.length; i++) {
                if (elem[i].type != 'hidden') { // && elem[i].type != 'undefined' 
                    if (elem[i].type == 'text') {
                        if (document.getElementById(elem[i].id).disabled) {
                            disabledItems[x] = elem[i].id;
                            x++;
                        }
                        document.getElementById(elem[i].id).disabled = false;
                        document.getElementById(elem[i].id).readOnly = true;
                        document.getElementById(elem[i].id).style.backgroundColor = '#FFFFFF';
                        document.getElementById(elem[i].id).style.color = '#000000';
                    }
                    if (elem[i].type == 'radio' || elem[i].type == 'checkbox') {
                        if (document.getElementById(elem[i].id).disabled) {
                            disabledItems[x] = elem[i].id;
                            x++;
                        }
                        document.getElementById(elem[i].id).disabled = true;
                    }
                    if (elem[i].type == 'select-one') {
                        if (elem[i].id === "frm2200A:txtMonth1") {
                            $(elem[i]).hide();
                            var label = "<div class='labels'>" + elem[i].options[elem[i].selectedIndex].innerHTML.split(" - ")[0] + "&nbsp;</div>";
                            $(elem[i]).after(label);
                        }
                        else {
                            $(elem[i]).hide();
                            var label = "<div class='labels'>" + elem[i].options[elem[i].selectedIndex].innerHTML + "&nbsp;</div>";
                            $(elem[i]).after(label);
                        }
                    }
                }
            }

            // Hide link to Schedule 1 and Calculators
            $("a[href='']").hide();

            $('input').each(function () {
                if (this.type == 'button') {
                    if (this.id != 'test') {
                        $(this).addClass('previewButtonClass');
                    }
                }
            });

            $('a').each(function () {
                if (this.id.length > 1) {
                    d.getElementById(this.id).disabled = true;
                }
            });

            $('#printMenu').show('blind');
            if ($('#formMenu').css('display') != 'none') {
                $('#formMenu').hide('blind');
            }
        }
    }

    function printOCR() {
        $("#formPaper").show();
        isPrintingModal = false;

        if ($("div[id*='Calculator']").is(":visible")) {
            $("#MainContent").hide();
            printModal($("div[id*='Calculator']:visible").attr("id"));
        }
        else {
            var isSchedule1 = ($('#modalSched1').is(":visible")) ? true : false;

            var currentPageContent = (isSchedule1) ? "modalSched1" : "MainContent";
            var currentPrintContent = "Print" + currentPageContent;

            var printElems = d.getElementById("Print" + currentPageContent).getElementsByTagName("span");
            var indexCtr, printElemsLen = printElems.length;
            for (indexCtr = 0; indexCtr < printElemsLen; indexCtr++) {
                printElems[indexCtr].innerHTML = "";
            }

            $("#" + currentPageContent).hide();
            $("#" + currentPrintContent).show();

            //Others
            if (isSchedule1 && d.getElementById('frm2200AadditionalSched1').rows.length > 1) {
                // Hide rows not needed when form is printed for display in UI
                $("[name=sched1Print]").hide();
                $('#modalSched1').css({ 'width': '94%', 'margin': 'auto', 'margin-top': '60p    x', 'display': 'block', 'position': 'relative', 'overflow': 'visible', 'page-break-before': 'always', 'background': '#ffffff' });

                $("#frm2200AadditionalSched1 input:disabled").attr("disabled", false);
            }
            else {
                $('#modalSched1').removeClass("printSignFooterClass");
            }

            $('#bg').hide();

            var elems = d.getElementById(currentPageContent).getElementsByTagName("*");

            var i, len = elems.length, tempElem = {}, tempVal = {},
            tempVarFilingYear = (d.getElementById('frm2200A:txtForYr').value * 1);
            for (i = 0; i < len; i++) {

                if (elems[i] !== null && elems[i].type !== "undefined" && elems[i].type !== "hidden" && elems[i].type != 'button' && elems[i].id !== "") {
                    var elementID = elems[i].id;

                    tempElem = $("#" + ((elems[i].id.indexOf('frm2200A:') != -1) ? elems[i].id : elems[i].id.split("frm2200A")[1]));

                    if (typeof (tempElem) !== "undefined" || tempElem !== null) {
                        var tempPrintID = elementID.split(":")[1];

                        if (elems[i].id.indexOf("txtTax") > -1) {
                            tempVal = elems[i].value.split(".");
                            if (tempVal.length > 0) {
                                $("#" + tempPrintID).html(tempVal[0]);
                                $("#" + tempPrintID + "_2").html(tempVal[1]);
                            }
                        }
                        else if (elementID == 'frm2200A:txtAddress') {
                            var address = d.getElementById('frm2200A:txtAddress').value;

                            if (address.length > 66) {
                                d.getElementById('txtAddress').innerHTML = address.substring(0, 66);
                                d.getElementById('txtAddress2').innerHTML = address.substring(66, (address.length <= 132) ? address.length : 132);
                            } else {
                                d.getElementById('txtAddress').innerHTML = address;
                            }
                        }
                        else if (elems[i].type === "radio" || elems[i].type === "checkbox") {
                            if (d.getElementById(tempPrintID) != null) {
                                d.getElementById(tempPrintID).innerHTML = (elems[i].checked) ? "X" : "";
                            }
                        }
                        else if (elems[i].type === "select-one") {
                            var drpValue = $("#frm2200A\\:" + elementID.split("frm2200A:")[1] + " option:selected").text();
                            elementID = (elementID.indexOf("frm2200A:") != -1) ? elementID.split("frm2200A:")[1] : elementID.split("frm2200A")[1];

                            if (d.getElementById(elementID) != null) {
                                d.getElementById(elementID).innerHTML = (elementID === "txtMonth1") ? drpValue.split(" - ")[0] : drpValue;
                            }
                        }
                        else if (elems[i].type === "text") {
                            if (d.getElementById(tempPrintID) != null) {
                                if (tempPrintID == "sched1Atc0") {
                                    d.getElementById(tempPrintID).innerHTML = elems[i].value.split("XA")[1];
                                }
                                else {
                                    d.getElementById(tempPrintID).innerHTML = elems[i].value;
                                }
                            }
                            else if (/^frm2200A:xa[123].*$/.test(elementID) && tempVarFilingYear < 2019) {
                                d.getElementById(tempPrintID + tempVarFilingYear).innerHTML = elems[i].value;

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


    function displaySchedule1Print(show) {

    }

    function validateEmail() {
        //var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var mailformat = /\b[a-zA-Z0-9._%+-]+@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}\b/;
        if (document.getElementById('frm2200A:txtEmailAddress').value.match(mailformat) || document.getElementById('frm2200A:txtEmailAddress').value == '') {
            return true;
        }
        else
            alert("Please enter a valid e-mail address on Item 11.");
        document.getElementById('frm2200A:txtEmailAddress').value = '';
        document.getElementById('frm2200A:txtEmailAddress').focus();
        return false;
    }

    function enableEmpty() {
        enable("frm2200A:txtAddress");
        enable("frm2200A:txtContactNum");
        enable("frm2200A:txtZipCode");
        enable("frm2200A:txtTaxPayerName");
        enable("frm2200A:txtLineBus");
        enable("frm2200A:txtRDOCode");

        function enable(elem) {
            if (($.trim(document.getElementById(elem).value) === "") || (elem === "frm2200A:txtZipCode" && document.getElementById(elem).value.length < 4)) {
                document.getElementById(elem).disabled = false;
            }
            // alert(document.getElementById(elem).value + " " + elem);
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
            if (atcStr.indexOf('2200A') >= 0) {
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

    function setATCSchedule1() {
        if (validateDate() && !!d.getElementById("frm2200A:chkPymntManner_1").checked) {
            var i = 0; len = atcList.length, year = d.getElementById("frm2200A:txtForYr").value;

            sched1ATCList = [];

            for (i = 0; i < len; i++) {
                var atcDescYear = atcList[i].description.split("==");

                if (atcDescYear.length === 2 && atcDescYear[1].toString() === year.toString()) {
                    var filteredATC = new filteredATCPropertyJS(atcList[i].atcCode, atcDescYear[0], atcDescYear[1], atcList[i].rate);

                    sched1ATCList.push(filteredATC);
                }
                // IF YEAR IS 2019 AND BEYOND // this computation of rate display when year ends and no rate is release yet.
                else if ((atcDescYear.length === 2) && (atcDescYear[1].toString() === "2018") && (year > 2018)) {
                    var yearDifference = (year - 2018),
                        yearRate = (atcList[i].rate) > 1 ? (atcList[i].rate * Math.pow(1.04, yearDifference)) : atcList[i].rate,
                        filteredATC = new filteredATCPropertyJS(atcList[i].atcCode, atcDescYear[0], year, yearRate);

                    sched1ATCList.push(filteredATC);
                }
            }
            populateSchedule1(year);
            
        }
    }

    function populateSchedule1(year) {
        var i = 0; len = sched1ATCList.length, previousATC = "";

        for (i = 0; i < len; i++) {
            var atcHTML = d.getElementById("frm2200A:" + sched1ATCList[i].atcCode);

            if (typeof (atcHTML) !== "undefined" && atcHTML !== null) {

                if (previousATC !== sched1ATCList[i].atcCode) {
                    atcHTML.cells[0].innerHTML = sched1ATCList[i].atcCode;
                    atcHTML.cells[1].innerHTML = sched1ATCList[i].description;
                    atcHTML.cells[3].innerHTML = (sched1ATCList[i].rate > 1) ? "P " + sched1ATCList[i].rate : (sched1ATCList[i].rate * 100) + "%";
                    if (atcHTML.cells[3].id !== "") {
                        d.getElementById(atcHTML.cells[3].id + "hidden").value = sched1ATCList[i].rate * 1;
                    }

                    // Bug #3918
                    if (year > 2013) {
                        $("#frm2200A\\:XA0552").remove();
                    }
                    if (year > 2016) {
                        $("#frm2200A\\:XA0562").remove();
                    }

                    previousATC = sched1ATCList[i].atcCode;
                }

                else {
                    var rowIndex = atcHTML.rowIndex,
                        atcCode = sched1ATCList[i].atcCode,
                        atcRate = sched1ATCList[i].rate,
                        taxableElem = d.getElementById("frm2200A:xa3_taxable" + atcCode + "2"),
                        exemptElem = d.getElementById("frm2200A:xa3_exempt" + atcCode + "2"),
                        currentExempt = (exemptElem !== null) ? exemptElem.value : "0.00",
                        currentTaxable = (taxableElem !== null) ? taxableElem.value : "0.00",
                        disabledAttribute = (d.getElementById('frm2200A:cmdValidate').disabled === true) ? "disabled='disabled'" : ""; ;

                    // Will remove row first if it exists
                    $("#frm2200A\\:" + atcCode + "2").remove();

                    // Insert row with duplicate atc
                    $(atcHTML.parentNode).find("tr").eq(rowIndex).after("<tr id='frm2200A:" + atcCode + "2' name='sched1Print'>" +
                                    "<td class='modalContent' style='text-align:center'>" + atcCode + "</td>" +
                                    "<td class='modalContent' style='text-align:left; width: 200px;'>" + sched1ATCList[i].description + "</td>" +
                                    "<td class='modalContent' style='text-align:center'>Per Liter <br /><a href='' onclick='openDialog(\"#Calculator" + atcCode + "2\")'> Calculator </a></td>" +
                                    "<td class='modalContent' style='text-align:center'>P " + atcRate + "</td>" +
                                    "<td align='center'>" +
                                        "<input type='text' style='text-align:right' id='frm2200A:xa3_exempt" + atcCode + "2' size='17' maxlength='15' value=" + currentExempt + " onblur='roundDownWithAlert(this)' onkeypress='return numbersonly(this, event)' " + disabledAttribute + " />" +
                                    "</td>" +
                                    "<td align='center'>" +
                                        "<input type='text' style='text-align:right' id='frm2200A:xa3_taxable" + atcCode + "2' size='17' maxlength='15' value=" + currentTaxable + " onblur='roundDownWithAlert(this); computeSched1Alcohol(this, \"frm2200A:xa3_exciseTaxDue" + atcCode + "2\")' onkeypress='return numbersonly(this, event)' " + disabledAttribute + " />" +
                                        "<input type='hidden' id='frm2200A:xa3_taxable" + atcCode + "2ratehidden' value='" + atcRate + "' />" +
                                    "</td>" +
                                    "<td align='center'>" +
                                        "<input type='text' id='frm2200A:xa3_exciseTaxDue" + atcCode + "2' style='background-color: rgb(220, 220, 220); text-align:right' size='19' maxlength='25' value='0.00' disabled class='isDisabled' />" +
                                    "</td> </tr>");

                    $("#" + atcCode + "2 input").bind('paste drag drop', function (e) {
                        e.preventDefault();
                    });

                    if (taxableElem !== null) {
                        taxableElem.onblur();
                    }
                }
            }
        }

        computeSched1TotalTaxDue();
        sched1OK();
    }

    var isNewRate = {};
    // USED FOR ONCHANGE OR ONCLICK FOR XA055 or XA056 RATES
    function changeRate(sender, atcCode, inputId) {

        // CODE FOR DROPDOWN LIST
        isNewRate[atcCode] = (sender.selectedIndex === 1) ? true : false;

        // CODE FOR RADIO BUTTON
        //isNewRate[atcCode] = !!sender.checked && (sender.id.indexOf("NewRate") > -1) ? true : false;

        d.getElementById("frm2200A:" + inputId + "ratehidden").value = sender.value;
        d.getElementById("frm2200A:" + inputId).onblur();
    }

    function changeAmendedReturn() {
        var txtTax21Elem = d.getElementById('frm2200A:txtTax21'),
            txtTax25CElem = d.getElementById('frm2200A:txtTax25A');

        if (!!d.getElementById("frm2200A:amendedRtn_1").checked) {
            txtTax21Elem.style.backgroundColor = "#FFFFFF"
            txtTax21Elem.disabled = false;

        }
        else {
            txtTax21Elem.style.backgroundColor = "#DCDCDC"
            txtTax21Elem.disabled = true;
            txtTax21Elem.value = '0.00';

            txtTax25CElem.disabled = false;

            compute22();
        }
    }

    function validateDate() {
        var strmmddyyyy = d.getElementById('frm2200A:txtMonth1').value + "/" + d.getElementById('frm2200A:txtDate').value + "/" + d.getElementById('frm2200A:txtForYr').value;
        var isValid = true;
        var currentDate = new Date();
        var inputDate = new Date();
        var result = strmmddyyyy.split("/");
        var itemToFocus = "";

        if (strmmddyyyy != "") {
            var isLeap = new Date(result[2], 1, 29).getMonth() === 1;
            var month31 = (['01', '03', '05', '07', '08', '10', '12']);
            var month30 = (['04', '06', '09', '11']);
            var month = result[0];
            var day = result[1];
            if (result.length === 3) {
                if (isNaN(result[0]) || isNaN(result[1]) || isNaN(result[2])) {
                    isValid = false;
                }
                else if ((result[0].length != 2 || (result[0] > 12 || result[0] < 1))) {
                    // numeric check if greater not than 31 - Month.
                    isValid = false;
                }
                else if (result[1].length != 2 || (result[1] > 31 || result[1] < 1)) {
                    // numeric check if Date.
                    itemToFocus = "date";
                    isValid = false;
                }
                else if (result[2].length != 4) {
                    isValid = false;
                }
                else if (month == 2) {
                    if (!isLeap && day == 29) {
                        itemToFocus = "date";
                        isValid = false;
                    }
                    else if (!isLeap && day > 29) {
                        itemToFocus = "date";
                        isValid = false;
                    }
                    else if (isLeap && day > 29) {
                        itemToFocus = "date";
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

            if (itemToFocus === "date") {
                d.getElementById('frm2200A:txtDate').value = currentDateString;
                d.getElementById('frm2200A:txtDate').focus();
            }
            else {
                
                d.getElementById('frm2200A:txtMonth1').selectedIndex = currentDate.getMonth();
                d.getElementById('frm2200A:txtDate').value = currentDateString;
                d.getElementById('frm2200A:txtForYr').value = currentDate.getFullYear();
            }
        }
        else if (inputDate > currentDate) {
            alert('This date cannot be a future date.');
            if (result[2] > currentDate.getFullYear()) {
                d.getElementById('frm2200A:txtForYr').value = currentDate.getFullYear().toString();
                d.getElementById('frm2200A:txtForYr').focus();
            }
            else if (result[1] > currentDate.getDate()) {
                d.getElementById('frm2200A:txtDate').value = currentDateString;
                d.getElementById('frm2200A:txtDate').focus();
            }
            else {
                d.getElementById('frm2200A:txtMonth1').focus();
            }
        }
        else if (result[2] < 2013) {
            alert('The year cannot be less than 2013.');
            d.getElementById('frm2200A:txtForYr').value = currentDate.getFullYear().toString();
            d.getElementById('frm2200A:txtForYr').focus();
        }

        return isValid;
    }

    var mainCalcu = "";

    //calculator
    function openDialog(element) {
        $('#modalSched1').hide();
        $(element).show('fade');
        // centerMe(element);
        mainCalcu = $(element).html();
    }

    function cancelCalcu(element) {
        //$(element).html(mainCalcu);
        $('#modalSched1').show();
        //$(element).hide('clip');
        closeDialog(element);
    }


    function closeDialog(element) {
        $('#modalSched1').show();
        $(element).hide();
        
        d.getElementById('frm2200A:txtCtrmodal' + element.substring(1)).value = $("#div" + element.substring(1) + " div").length;

    }
    function openDialogForATC3536(element) { 
        var XA35BottleEmpty =  $("#divCalculatorXA035Bottle div").length < 1;
        var XA35BulkEmpty =  $("#divCalculatorXA035Bulk div").length < 1;
        var XA36BottleEmpty =  $("#divCalculatorXA036Bottle div").length < 1;
        var XA36BulkEmpty =  $("#divCalculatorXA036Bulk div").length < 1;
        
        if(element.indexOf("XA035Bottle") > -1){
        
            if(XA35BottleEmpty && !XA35BulkEmpty && XA36BottleEmpty && XA36BulkEmpty){
                alert("Please fill up XA036 Specific Tax (Bulk) Calculator first.");
            }
            else if(XA35BottleEmpty && XA35BulkEmpty && XA36BottleEmpty && !XA36BulkEmpty){
                alert("Please fill up XA035 Ad Valorem Tax (Bulk) Calculator first.");
            }
            else{
                $('#modalSched1').hide();
                $(element).show('fade');
                mainCalcu = $(element).html();
                
            }
        
        }
        
        else if(element.indexOf("XA035Bulk") > -1){
        
            if(!XA35BottleEmpty && XA35BulkEmpty && XA36BottleEmpty && XA36BulkEmpty){
                alert("Please fill up XA036 Specific Tax (Bottle) Calculator first.");
            }
            else if(XA35BottleEmpty && XA35BulkEmpty && !XA36BottleEmpty && XA36BulkEmpty){
                alert("Please fill up XA035 Ad Valorem Tax (Bottle) Calculator first.");
            }
            else{
                $('#modalSched1').hide();
                $(element).show('fade');
                mainCalcu = $(element).html();
                
            }
        
        }
        
        else if(element.indexOf("XA036Bottle") > -1){
        
            if(XA35BottleEmpty && XA35BulkEmpty && XA36BottleEmpty && !XA36BulkEmpty){
                alert("Please fill up XA035 Ad Valorem Tax (Bulk) Calculator first.");
            }
            else if(XA35BottleEmpty && !XA35BulkEmpty && XA36BottleEmpty && XA36BulkEmpty){
                alert("Please fill up XA036 Specific Tax (Bulk) Calculator first.");
            }
            else{
                $('#modalSched1').hide();
                $(element).show('fade');
                mainCalcu = $(element).html();
                
            }
        
        }
        
        else if(element.indexOf("XA036Bulk") > -1){
        
            if(XA35BottleEmpty && XA35BulkEmpty && !XA36BottleEmpty && XA36BulkEmpty){
                alert("Please fill up XA035 Ad Valorem Tax (Bottle) Calculator first.");
            }
            else if(!XA35BottleEmpty && XA35BulkEmpty && XA36BottleEmpty && XA36BulkEmpty){
                alert("Please fill up XA036 Specific Tax (Bottle) Calculator first.");
            }
            else{
                $('#modalSched1').hide();
                $(element).show('fade');
                mainCalcu = $(element).html();
                
            }
        
        }
        
    }

    function onFocusIterate(elem) {
        $(elem).css({ 'background': '#ffffcc' });
        $(elem).select();
    }
    function onBlurIterate(elem) {
        $(elem).css({ 'background': '#ffffff' });
    }


    function selectAll(elem, divId) {
        var checkboxes = $(divId + " input[type=checkbox]");
        if (elem.checked) {
            checkboxes.attr('checked', 'checked');
        } else {
            checkboxes.removeAttr('checked');
        }
    }

    function deleteRows(divId, paramArray) {
        
        $(divId + ' input[type="checkbox"]:checked').closest("div").remove();
        $("input[name='frm2200A\\:SelectAll']").removeAttr('checked');
        if ($(divId + " div").length === 0) {
            if(paramArray.length > 3){
                computeToSchedule1WithNoAlertAndPrint(paramArray[0], paramArray[1], paramArray[2], paramArray[3]);
            }
            else {
                computeToSchedule1WithNoAlertAndPrint(paramArray[0], paramArray[1], paramArray[2]);
            }
        }
    }
    
    function clearCalc(divId, paramArray) {

        if ($(divId + " div").length > 0) {
            if (confirm('Values inputted will be deleted. Do you want to continue?')) {
                $(divId + " div").remove();
                    if ($(divId + " div").length === 0) {
                        
                        if(paramArray.length > 3){
                            computeToSchedule1WithNoAlertAndPrint(paramArray[0], paramArray[1], paramArray[2], paramArray[3]);
                        }
                        else {
                            computeToSchedule1WithNoAlertAndPrint(paramArray[0], paramArray[1], paramArray[2]);
                        }
                        
                    }   
            } 
        }
    }
  

    function clearModalCalculators() {
        var year = d.getElementById("frm2200A:txtForYr").value * 1;


        $('#divCalculatorXA035Bottle div').remove();
        $('#divCalculatorXA035Bulk div').remove();
        $('#divCalculatorXA036Bottle div').remove();
        $('#divCalculatorXA036Bulk div').remove();
        $('#divCalculatorXA061 div').remove();
        $('#divCalculatorXA062 div').remove();
        $('#divCalculatorXA070 div').remove();
        $('#divCalculatorXA080 div').remove();
        $('#divCalculatorXA055 div').remove();
        $('#divCalculatorXA056 div').remove();
        $('#divCalculatorXA057 div').remove();

        if (year < 2014) {
            $('#divCalculatorXA0552 div').remove();
        }
        if (year < 2017) {
            $('#divCalculatorXA0562 div').remove();
        }

        computeSum('XA035Bottle');
        computeSum('XA035Bulk');
        computeSum('XA036Bottle');
        computeSum('XA036Bulk');
        computeSum('XA061');
        computeSum('XA062');
        computeSum('XA070');
        computeSum('XA080');
        computeSum('XA055');
        computeSum('XA056');
        computeSum('XA057');

        if (year < 2014) {
            computeSum('XA0552');
        }
        if (year < 2017) {
            computeSum('XA0562');
        }

    }

    function AddRowXA035Bottle(isFromLoad) {
        if (isFromLoad === true || ValidateTable('#divCalculatorXA035Bottle', "add")) {
            i = $("#divCalculatorXA035Bottle div").length;

            $('#divCalculatorXA035Bottle').append('<div>'
                                + '<table id="tblCalcHeaderXA035Bottle" class="RowSubTable tblForm" style="width: 98%;margin:auto; text-align:center; ">'

                        + ' <tr style="text-align: center;">'
                        + '<td style="width: 45px"> <input type="checkbox" name="frm2200A:CalXA035Bottle_' + (i + 1) + '_Col1" id="frm2200A:CalXA035Bottle_' + (i + 1) + '_Col1" /> </td>'
                        + '<td style="width: 156px"> <input type="text" style="width:90%" maxlength="25" name="frm2200A:CalXA035Bottle_Col2[]" id="frm2200A:CalXA035Bottle_' + (i + 1) + '_Col2" onfocus="onFocusIterate(this)"  onblur="onBlurIterate(this),capitalize(this), checkIfValidValues(this);"/></td>'

                        + '<td style="width: 100px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return wholenumber(this, event);" maxlength="12" value="0" name="frm2200A:CalXA035Bottle_Col3[]"  id="frm2200A:CalXA035Bottle_' + (i + 1) + '_Col3" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), formatDisplayAmount(this), computeXA035Bottle(' + "'" + (i + 1) + "'" + ')"/></td>'

                        + '<td style="width: 100px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return wholenumber(this, event);" maxlength="12" value="0" name="frm2200A:CalXA035Bottle_Col4[]"    id="frm2200A:CalXA035Bottle_' + (i + 1) + '_Col4" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), formatDisplayAmount(this), computeXA035Bottle(' + "'" + (i + 1) + "'" + ')"/></td>'

                        + '<td style="width: 120px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return wholenumber(this, event);" maxlength="12" value="0" name="frm2200A:CalXA035Bottle_Col5[]"    id="frm2200A:CalXA035Bottle_' + (i + 1) + '_Col5"  disabled class="isDisabled" /></td>'

                        + '<td style="width: 120px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return numbersonly(this, event);" maxlength="15" value="0.00" name="frm2200A:CalXA035Bottle_Col6[]"    id="frm2200A:CalXA035Bottle_' + (i + 1) + '_Col6" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), roundDownWithAlert(this), computeXA035Bottle(' + "'" + (i + 1) + "'" + ')"/></td>'

                        + '<td style="width: 57px"> <input type="text" style="width:100%; text-align:right;" onkeypress="return numbersonly(this, event);" maxlength="5" value="0.00%" name="frm2200A:CalXA035Bottle_Col7[]"    id="frm2200A:CalXA035Bottle_' + (i + 1) + '_Col7" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), setPercentage(this,2), computeXA035Bottle(' + "'" + (i + 1) + "'" + ')"/></td>'

                        + '<td style="width: 65px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return numbersonly(this, event);" maxlength="12" value="0.00" name="frm2200A:CalXA035Bottle_Col8[]"    id="frm2200A:CalXA035Bottle_' + (i + 1) + '_Col8"  disabled class="isDisabled" /></td>'

                        + '<td style="width: 150px"> <input type="text" style="width:90%; text-align:right;" value="0.00" name="frm2200A:CalXA035Bottle_Col9[]"  id="frm2200A:CalXA035Bottle_' + (i + 1) + '_Col9" class="XA035BottleTotalTaxBase isDisabled" disabled /></td>'
                        + '</tr> </table> </div>');


            $("#divCalculatorXA035Bottle div:eq(" + i + ") input").bind('paste drag drop', function (e) {
                e.preventDefault();
            });
        }

    }

    function AddRowXA035Bulk(isFromLoad) {
        if (isFromLoad === true || ValidateTable('#divCalculatorXA035Bulk', "add")) {
            i = $("#divCalculatorXA035Bulk div").length;

            $('#divCalculatorXA035Bulk').append('<div>'
                                    + '<table id="tblCalcHeaderXA035Bulk" class="RowSubTable tblForm" style="width: 700px; text-align:center; ">'

                            + ' <tr style="text-align: center;">'
                            + '<td style="width: 20px"> <input type="checkbox" name="frm2200A:CalXA035Bulk_' + (i + 1) + '_Col1" id="frm2200A:CalXA035Bulk_' + (i + 1) + '_Col1" /> </td>'

                            + '<td> <input type="text" style="width:90%" maxlength="25" name="frm2200A:CalXA035Bulk_Col2[]" id="frm2200A:CalXA035Bulk_' + (i + 1) + '_Col2" onfocus="onFocusIterate(this)"  onblur="onBlurIterate(this),capitalize(this), checkIfValidValues(this);"/></td>'

                            + '<td style="width: 180px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return numbersonly(this, event);" maxlength="15" value="0.00" name="frm2200A:CalXA035Bulk_Col3[]"   id="frm2200A:CalXA035Bulk_' + (i + 1) + '_Col3" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), roundDownWithAlert(this), computeXA035Bulk(' + "'" + (i + 1) + "'" + ')"/></td>'

                            + '<td style="width: 70px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return numbersonly(this, event);" maxlength="5" value="0.00%" name="frm2200A:CalXA035Bulk_Col4[]"   id="frm2200A:CalXA035Bulk_' + (i + 1) + '_Col4" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), setPercentage(this, 2), computeXA035Bulk(' + "'" + (i + 1) + "'" + ')"/></td>'

                            + '<td style="width: 70px"> <input type="text" style="width:90%; text-align:right;" value="0.00" name="frm2200A:CalXA035Bulk_Col5[]"   id="frm2200A:CalXA035Bulk_' + (i + 1) + '_Col5" disabled class="isDisabled" /></td>'

                            + '<td style="width: 180px"> <input type="text" style="width:90%; text-align:right;" value="0.00"  name="frm2200A:CalXA035Bulk_Col6[]"  id="frm2200A:CalXA035Bulk_' + (i + 1) + '_Col6" class="XA035BulkTotalTaxBase isDisabled" disabled /></td>'

                            + '</tr> </table> </div>');
            $("#divCalculatorXA035Bulk div:eq(" + i + ") input").bind('paste drag drop', function (e) {
                e.preventDefault();
            });
        }
    }

    function AddRowXA036(type, isFromLoad) {
        if (type === "Bottle") {
            if (isFromLoad === true || ValidateTable('#divCalculatorXA036Bottle', "add")) {
                i = $("#divCalculatorXA036Bottle div").length;

                $('#divCalculatorXA036Bottle').append('<div>'
                                    + '<table id="tblCalcHeaderXA036Bottle" class="RowSubTable tblForm" style="width: 100%;">'

                            + ' <tr style="text-align: center;">'
                            + '<td style="width: 20px"> <input type="checkbox" name="frm2200A:CalXA036Bottle_' + (i + 1) + '_Col1" id="frm2200A:CalXA036Bottle_' + (i + 1) + '_Col1" /> </td>'

                            + '<td style="width: 155px"> <input type="text" style="width:90%" maxlength="25" name="frm2200A:CalXA036Bottle_Col2[]" id="frm2200A:CalXA036Bottle_' + (i + 1) + '_Col2" onfocus="onFocusIterate(this)"  onblur="onBlurIterate(this),capitalize(this), checkIfValidValues(this);"/></td>'

                            + '<td style="width: 100px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return wholenumber(this, event);" maxlength="12" value="0" name="frm2200A:CalXA036Bottle_Col3[]"  id="frm2200A:CalXA036Bottle_' + (i + 1) + '_Col3" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), formatDisplayAmount(this), computeXA036Bottle(' + "'" + (i + 1) + "'" + ')"/></td>'

                            + '<td style="width: 107px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return wholenumber(this, event);" maxlength="12" value="0" name="frm2200A:CalXA036Bottle_Col4[]"  id="frm2200A:CalXA036Bottle_' + (i + 1) + '_Col4" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), formatDisplayAmount(this), computeXA036Bottle(' + "'" + (i + 1) + "'" + ')"/></td>'

                            + '<td style="width: 121px"> <input type="text" style="width:90%; text-align:right;" value="0" name="frm2200A:CalXA036Bottle_Col5[]"   id="frm2200A:CalXA036Bottle_' + (i + 1) + '_Col5" disabled class="isDisabled" /></td>'

                            + '<td style="width: 125px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return numbersonly(this, event);" maxlength="16" value="0.000" name="frm2200A:CalXA036Bottle_Col6[]"   id="frm2200A:CalXA036Bottle_' + (i + 1) + '_Col6" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), xa036VolumeChecker(this), computeXA036Bottle(' + "'" + (i + 1) + "'" + ')"/></td>'

                            + '<td style="width: 65px"> <input type="text" style="width:100%; text-align:right;" onkeypress="return numbersonly(this, event);" maxlength="5" value="0.00%" name="frm2200A:CalXA036Bottle_Col7[]"   id="frm2200A:CalXA036Bottle_' + (i + 1) + '_Col7" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), setPercentage(this,2), computeXA036Bottle(' + "'" + (i + 1) + "'" + ')"/></td>'

                            + '<td style="width: 65px"> <input type="text" style="width:90%; text-align:right;" value="0.00"  name="frm2200A:CalXA036Bottle_Col8[]"  id="frm2200A:CalXA036Bottle_' + (i + 1) + '_Col8" disabled class="isDisabled" /></td>'

                            + '<td style="width: 130px"> <input type="text" style="width:90%; text-align:right;" value="0.000"  name="frm2200A:CalXA036Bottle_Col9[]"  id="frm2200A:CalXA036Bottle_' + (i + 1) + '_Col9" disabled class="isDisabled" /></td>'

                            + '<td style="width: 150px"> <input type="text" style="width:90%; text-align:right;" value="0.00"  name="frm2200A:CalXA036Bottle_Col10[]"  id="frm2200A:CalXA036Bottle_' + (i + 1) + '_Col10" class="XA036BottleTotalTaxBase isDisabled" disabled /></td>'

                            + '</tr> </table> </div>');
                $("#divCalculatorXA036Bottle div:eq(" + i + ") input").bind('paste drag drop', function (e) {
                    e.preventDefault();
                });
            }
        }
        else if (type === "Bulk") {
            if (isFromLoad === true || ValidateTable('#divCalculatorXA036Bulk', "add")) {
                i = $("#divCalculatorXA036Bulk div").length;

                $('#divCalculatorXA036Bulk').append('<div>'
                                    + '<table id="tblCalcHeaderXA036Bulk" class="RowSubTable tblForm" style="width: 700px; text-align:center; ">'

                            + ' <tr style="text-align: center;">'
                            + '<td style="width: 20px"> <input type="checkbox" name="frm2200A:CalXA036Bulk_' + (i + 1) + '_Col1" id="frm2200A:CalXA036Bulk_' + (i + 1) + '_Col1" /> </td>'

                            + '<td> <input type="text" style="width:90%" maxlength="25" name="frm2200A:CalXA036Bulk_Col2[]" id="frm2200A:CalXA036Bulk_' + (i + 1) + '_Col2" onfocus="onFocusIterate(this)"  onblur="onBlurIterate(this),capitalize(this), checkIfValidValues(this);"/></td>'

                            + '<td style="width: 120px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return numbersonly(this, event);" maxlength="16" value="0.000" name="frm2200A:CalXA036Bulk_Col3[]"   id="frm2200A:CalXA036Bulk_' + (i + 1) + '_Col3" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), xa036VolumeChecker(this), computeXA036Bulk(' + "'" + (i + 1) + "'" + ')"/></td>'

                            + '<td style="width: 70px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return numbersonly(this, event);" maxlength="5" value="0.00%" name="frm2200A:CalXA036Bulk_Col4[]"   id="frm2200A:CalXA036Bulk_' + (i + 1) + '_Col4" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), setPercentage(this, 2), computeXA036Bulk(' + "'" + (i + 1) + "'" + ')"/></td>'

                            + '<td style="width: 70px"> <input type="text" style="width:90%; text-align:right;" value="0.00" name="frm2200A:CalXA036Bulk_Col5[]"   id="frm2200A:CalXA036Bulk_' + (i + 1) + '_Col5" disabled class="isDisabled" /></td>'

                            + '<td style="width: 180px"> <input type="text" style="width:90%; text-align:right;" value="0.00"  name="frm2200A:CalXA036Bulk_Col6[]"  id="frm2200A:CalXA036Bulk_' + (i + 1) + '_Col6" class="XA036BulkTotalTaxBase isDisabled" disabled /></td>'

                            + '</tr> </table> </div>');
                $("#divCalculatorXA036Bulk div:eq(" + i + ") input").bind('paste drag drop', function (e) {
                    e.preventDefault();
                });
            }
        }
    }

    function AddRowOthers(CalXA, isFromLoad) {
        console.log(CalXA);
        if (isFromLoad === true || ValidateTable('#divCalculator' + CalXA, "add")) {
            i = $('#divCalculator' + CalXA + ' div').length;

            $('#divCalculator' + CalXA).append('<div>'
                                + '<table id="tblCalcHeader' + CalXA + '" class="RowSubTable tblForm" style="width: 700px; text-align:center; ">'

                        + ' <tr style="text-align: center;">'
                        + '<td style="width: 20px"> <input type="checkbox" name="frm2200A:Cal' + CalXA + '_' + (i + 1) + '_Col1" id="frm2200A:Cal' + CalXA + '_' + (i + 1) + '_Col1" /> </td>'

                        + '<td> <input type="text" style="width:90%" maxlength="25" name="frm2200A:Cal' + CalXA + '_Col2[]" id="frm2200A:Cal' + CalXA + '_' + (i + 1) + '_Col2" onfocus="onFocusIterate(this)"  onblur="onBlurIterate(this),capitalize(this), checkIfValidValues(this);"/></td>'

                        + '<td style="width: 100px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return wholenumber(this, event);" maxlength="12" value="0" name="frm2200A:Cal' + CalXA + '_Col3[]"  id="frm2200A:Cal' + CalXA + '_' + (i + 1) + '_Col3" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), formatDisplayAmount(this), computeOthers(' + "'" + CalXA + "'" + ', ' + "'" + (i + 1) + "'" + ')"/></td>'

                        + '<td style="width: 100px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return wholenumber(this, event);" maxlength="12" value="0" name="frm2200A:Cal' + CalXA + '_Col4[]"  id="frm2200A:Cal' + CalXA + '_' + (i + 1) + '_Col4" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), formatDisplayAmount(this), computeOthers(' + "'" + CalXA + "'" + ', ' + "'" + (i + 1) + "'" + ')"/></td>'

                        + '<td style="width: 100px"> <input type="text" style="width:90%; text-align:right;" value="0" name="frm2200A:Cal' + CalXA + '_Col5[]"   id="frm2200A:Cal' + CalXA + '_' + (i + 1) + '_Col5" disabled class="isDisabled" /></td>'

                        + '<td style="width: 100px"> <input type="text" style="width:90%; text-align:right;" onkeypress="return numbersonly(this, event);" maxlength="12" value="0.00"  name="frm2200A:Cal' + CalXA + '_Col6[]"  id="frm2200A:Cal' + CalXA + '_' + (i + 1) + '_Col6" onfocus="onFocusIterate(this)" onblur="onBlurIterate(this), roundDownWithAlert(this), computeOthers(' + "'" + CalXA + "'" + ', ' + "'" + (i + 1) + "'" + ')"/></td>'

                        + '<td style="width: 120px"> <input type="text" style="width:90%; text-align:right;" value="0.00"  name="frm2200A:Cal' + CalXA + '_Col7[]"   id="frm2200A:Cal' + CalXA + '_' + (i + 1) + '_Col7" class="' + CalXA + 'TotalTaxBase isDisabled" disabled /></td>'

                        + '</tr> </table> </div>');
            $('#divCalculator' + CalXA + " div:last input").bind('paste drag drop', function (e) {
                e.preventDefault();
            });

        }
    }

    function FixId(CalDiv, CalXA, inputNums) {
        var length = $(CalDiv + ' div').length;

        for (i = 0; i < length; i++) {
            var currentDivTable = $(CalDiv + ' div').eq(i).find('table');

            for (x = 1; x <= inputNums; x++) {
                var inputElem = currentDivTable.eq(0).find("tr input")[(x - 1)];
                inputElem.setAttribute("id", "frm2200A:Cal" + CalXA + "_" + (i + 1) + "_Col" + x);

                if ((inputElem.maxLength <= 12) && (inputElem.disabled === false)) {
                    inputElem.onblur = functionReturn(CalXA, i + 1, x);
                }
            }
        }

        computeSum(CalXA);
    }

    function ValidateTable(CalDiv, method) {
        isValid = true;
        if ($(CalDiv + ' div').length > 0) {
            $(CalDiv + ' input[type="text"]').each(function () {

                var rowNumber = $(this).parents().eq(4).index() + 1; //$(CalDiv + ' div').length;//this.parentNode.parentNode.rowIndex + 1;
                inputValue = (this.value.indexOf("%") > -1) ? this.value.split("%")[0] : this.value;

                if ((this.maxLength < "25") && (inputValue == 0 || inputValue.length == 0)) {
                    //alert('Cannot ' + method + '. Please fill in all data.');
                    alert(getLabel(this.id) + " at Row " + rowNumber + " should be greater than zero.");

                    isValid = false;
                    return false;
                }
                else if (this.maxLength >= "25" && $.trim(inputValue) == "") {
                    //alert('Cannot ' + method + '. Please fill in all data.');
                    alert("Please enter a valid Description at Row " + rowNumber + ".");

                    isValid = false;
                    return false;
                }
            });
        }

        return isValid;
    }

    function getLabel(id) {
        var returnLabel = "", columnNumber = id.slice(-1);

        if (id.indexOf("Bottle") > -1) {
            // For Bottle calculator
            switch (columnNumber) {
                case "3": returnLabel = "Cases";
                    break;
                case "4": returnLabel = "Bottles per Case";
                    break;
                case "6": returnLabel = (id.indexOf("XA035") > -1) ? "NRP Per Bottle" : "Bottle Content";
                    break;
                case "7": returnLabel = "Alcohol Strength";
                    break;
                default: returnLabel = "Description";
                    break;
            }
        }
        else if (id.indexOf("Bulk") > -1) {
            // For Bulk calculator
            switch (columnNumber) {
                case "3": returnLabel = (id.indexOf("XA035") > -1) ? "NRP" : "Content";
                    break;
                case "4": returnLabel = "Alcohol Strength";
                    break;
                default: returnLabel = "Description";
                    break;
            }
        }
        // For non-XA035 and non-XA036 ATC
        else {//(id.indexOf("Bottle") === -1 && id.indexOf("Bulk") === -1) {
            switch (columnNumber) {
                case "3": returnLabel = "No. of Cases";
                    break;
                case "4": returnLabel = "Bottles per Case";
                    break;
                case "6": returnLabel = "Volume Content";
                    break;
                default: returnLabel = "Description";
                    break;
            }
        }

        return returnLabel;
    }

    function functionReturn(CalXA, i, columnNumber) {
        return function () {
            var returnFunction;

            switch (CalXA) {
                case "XA035Bottle": returnFunction = computeXA035Bottle(i);
                    break;
                case "XA035Bulk": returnFunction = computeXA035Bulk(i);
                    break;
                case "XA036Bottle": returnFunction = computeXA036Bottle(i);
                    break
                case "XA036Bulk": returnFunction = computeXA036Bulk(i);
                    break;
                default: returnFunction = computeOthers(CalXA, i);
                    break;
            }

            if (((CalXA.indexOf("XA036Bottle") > -1) && (columnNumber === 6)) || ((CalXA.indexOf("XA036Bulk") > -1) && (columnNumber === 3))) {
                xa036VolumeChecker(this);
            }
            // For Alcohol Strength (%) Column
            else if ((CalXA.indexOf("Bottle") > -1 && columnNumber === 7) || (CalXA.indexOf("Bulk") > -1 && columnNumber === 4)) {
                setPercentage(this, 2);
            }
            else if (CalXA.indexOf("Bulk") > -1 || columnNumber > 4) {
                roundDownWithAlert(this);
            }
            else {//if (columnNumber === 3 || columnNumber === 4) {
                formatDisplayAmount(this);
            }

            onBlurIterate(this);
            returnFunction;
        }
    }
    
    function xa036VolumeChecker(number) {
        var amount = number.value.toString().replace(/\$|\,/g, '');
    
        if (isNaN(Number(amount))) {
            number.value = '0.000';
        } else {
            if (isAmountWithinAllowedPrecision(number)) {           
                if (amount.indexOf('.') > -1) {
                    var parts = amount.toString().split('.');

                    if (parts[1].length > 2) {
                        amount = addCommas(Number(parts[0])) + '.' + parts[1].substring(0, 3);

                        number.value = amount;
                    } else if (parts[1].length > 1) {
                        amount = addCommas(Number(parts[0])) + '.' + parts[1] + '0';

                        number.value = amount;
                    } else if (parts[1].length > 0) {
                        amount = addCommas(Number(parts[0])) + '.' + parts[1] + '00';

                        number.value = amount;
                    } else {
                        number.value = addCommas(Number(amount)) + ".000";
                    }
                } else {
                    number.value = addCommas(Number(amount)) + ".000";
                }
            } else {
                alert("Value should not exceed Billion");
                number.value = "0.000";
                number.focus();
            }
        }
        
        return number.value;
    }

    function computeToSchedule1() {//(source, target, divId) {
        var CalXA = arguments.length == 3 ? arguments[0] : arguments[3],
            source = arguments[0],
            target = arguments[1],
            divId = arguments[2];

        var isNotEmpty = $('#divCalculator' + CalXA + ' div').length != 0,
            targetElem = d.getElementById("frm2200A:" + target),
            hasNotExceeded = false;

        if (isNotEmpty) {
            if (ValidateTable('#divCalculator' + CalXA, "compute")) {
                targetElem.value = d.getElementById("CalcSubTotal" + source).value;
                hasNotExceeded = (NumWithComma(targetElem.value) < 1000000000000);

                targetElem.onblur();

                if (hasNotExceeded && !isARowCleared) {
                    if (confirm('You are advised to print this computation.')) {
                        printModal("Calculator" + CalXA);
                    }
                }

                isARowCleared = false;
            }
        }
        else {
            alert("Please provide valid data.");
        }
    }
    function computeToSchedule1WithNoAlertAndPrint() {//(source, target, divId) 'XA035' {
        var CalXA = arguments.length == 3 ? arguments[0] : arguments[3],
            source = arguments[0],
            target = arguments[1],
            divId = arguments[2];

        var isNotEmpty = $('#divCalculator' + CalXA + ' div').length != 0;
            targetElem = d.getElementById("frm2200A:" + target);
            hasNotExceeded = false;

        computeSum(CalXA);
        targetElem.value = d.getElementById("CalcSubTotal" + source).value;
        hasNotExceeded = (NumWithComma(targetElem.value) < 1000000000000);
        targetElem.onblur();

    }

    function bottlesPerCaseFilter(elem) {
        if (NumWithComma(elem.value) > 1000) {
            alert("Bottles per case cannot exceed 1,000.");
            elem.value = 0;
            elem.select();
        }
        else {
            elem.value = formatCurrencyWOC(elem.value);
        }
    }

    function computeXA035Bottle(i) {
        var cases = NumWithComma(d.getElementById("frm2200A:CalXA035Bottle_" + (i) + "_Col3").value),
            bottlesPerCase = NumWithComma(d.getElementById("frm2200A:CalXA035Bottle_" + (i) + "_Col4").value),
            totalBottles = cases * bottlesPerCase,
            nrpPerBottle = NumWithComma(d.getElementById("frm2200A:CalXA035Bottle_" + (i) + "_Col6").value),
            alcoholStrength = NumWithComma(d.getElementById("frm2200A:CalXA035Bottle_" + (i) + "_Col7").value),
            proof = (alcoholStrength * 2) / 100,
            taxBase = totalBottles * nrpPerBottle * proof,
            loopCtr = 1;

        d.getElementById("frm2200A:CalXA035Bottle_" + (i) + "_Col5").value = formatCurrencyWOC(totalBottles);
        d.getElementById("frm2200A:CalXA035Bottle_" + (i) + "_Col8").value = roundDownComputation(proof);
        d.getElementById("frm2200A:CalXA035Bottle_" + (i) + "_Col9").value = roundDownComputation(taxBase);

        if (totalBottles >= 1000000000000 || computeSum("XA035Bottle") >= 1000000000000 || taxBase >= 1000000000000) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Tax Base/Total Tax Base.");

            clearCalculatorRow("XA035Bottle", i);
            computeSum("XA035Bottle");
        }

        rowIndexCalculatorG = i;
    }

    function computeXA035Bulk(i) {
        var NRP = NumWithComma(d.getElementById("frm2200A:CalXA035Bulk_" + (i) + "_Col3").value),
            alcoholStrength = NumWithComma(d.getElementById("frm2200A:CalXA035Bulk_" + (i) + "_Col4").value),
            proof = (alcoholStrength * 2) / 100,
            taxBase = NRP * proof;

        d.getElementById("frm2200A:CalXA035Bulk_" + (i) + "_Col5").value = roundDownComputation(proof);
        d.getElementById("frm2200A:CalXA035Bulk_" + (i) + "_Col6").value = roundDownComputation(taxBase);

        if (computeSum("XA035Bulk") >= 1000000000000 || taxBase >= 1000000000000) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Tax Base/Total Tax Base.");

            clearCalculatorRow("XA035Bulk", i);
            computeSum("XA035Bulk");
        }

        rowIndexCalculatorG = i;
    }

    function computeXA036Bottle(i) {
        var cases = NumWithComma(d.getElementById("frm2200A:CalXA036Bottle_" + (i) + "_Col3").value),
            bottlesPerCase = NumWithComma(d.getElementById("frm2200A:CalXA036Bottle_" + (i) + "_Col4").value),
            totalBottles = cases * bottlesPerCase,
            bottleContent = NumWithComma(d.getElementById("frm2200A:CalXA036Bottle_" + (i) + "_Col6").value),
            alcoholStrength = NumWithComma(d.getElementById("frm2200A:CalXA036Bottle_" + (i) + "_Col7").value),
            proof = (alcoholStrength * 2) / 100,
            proofPerBottle = { value : bottleContent * proof },
            taxBase = totalBottles * proofPerBottle.value;

        d.getElementById("frm2200A:CalXA036Bottle_" + (i) + "_Col5").value = formatCurrencyWOC(totalBottles);
        d.getElementById("frm2200A:CalXA036Bottle_" + (i) + "_Col8").value = roundDownComputation(proof);       
        d.getElementById("frm2200A:CalXA036Bottle_" + (i) + "_Col9").value = xa036VolumeChecker(proofPerBottle);        
        d.getElementById("frm2200A:CalXA036Bottle_" + (i) + "_Col10").value = roundDownComputation(taxBase);

        if (totalBottles >= 1000000000000 || computeSum("XA036Bottle") >= 1000000000000 || taxBase >= 1000000000000) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Tax Base/Total Tax Base.");

            clearCalculatorRow("XA036Bottle", i);
            computeSum("XA036Bottle");
        }

        rowIndexCalculatorG = i;
    }

    function computeXA036Bulk(i) {
        var content = NumWithComma(d.getElementById("frm2200A:CalXA036Bulk_" + (i) + "_Col3").value),
            alcoholStrength = NumWithComma(d.getElementById("frm2200A:CalXA036Bulk_" + (i) + "_Col4").value),
            proof = (alcoholStrength * 2) / 100,
            taxBase = content * proof;

        d.getElementById("frm2200A:CalXA036Bulk_" + (i) + "_Col5").value = roundDownComputation(proof);
        d.getElementById("frm2200A:CalXA036Bulk_" + (i) + "_Col6").value = roundDownComputation(taxBase);

        if (computeSum("XA036Bulk") >= 1000000000000 || taxBase >= 1000000000000) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Tax Base/Total Tax Base.");

            clearCalculatorRow("XA036Bulk", i);
            computeSum("XA036Bulk");
        }

        rowIndexCalculatorG = i;
    }

    function computeOthers(CalXA, i) {
        var noOfCases = NumWithComma(d.getElementById("frm2200A:Cal" + CalXA + "_" + (i) + "_Col3").value),
            bottlesPerCase = NumWithComma(d.getElementById("frm2200A:Cal" + CalXA + "_" + (i) + "_Col4").value),
            totalBottles = noOfCases * bottlesPerCase,
            volumeContent = NumWithComma(d.getElementById("frm2200A:Cal" + CalXA + "_" + (i) + "_Col6").value),
            taxBase = totalBottles * volumeContent;

        d.getElementById("frm2200A:Cal" + CalXA + "_" + (i) + "_Col5").value = formatCurrencyWOC(totalBottles);
        d.getElementById("frm2200A:Cal" + CalXA + "_" + (i) + "_Col7").value = roundDownComputation(taxBase);

        if (totalBottles >= 1000000000000 || computeSum(CalXA) >= 1000000000000 || taxBase >= 1000000000000) {
            alert("Exceeded maximum amount of 999,999,999,999.99 on Tax Base/Total Tax Base of " + CalXA + ".");

            clearCalculatorRow(CalXA, i);
            computeSum(CalXA);
        }

        rowIndexCalculatorG = i;
    }

    function clearCalculatorRow(calcATC, rowIndex) {

        if (rowIndex > -1) {
            d.getElementById("frm2200A:Cal" + calcATC + "_" + (rowIndex) + "_Col2").value = "";

            if (calcATC.indexOf("XA035Bottle") > -1) {
                d.getElementById("frm2200A:CalXA035Bottle_" + (rowIndex) + "_Col3").value = "0";
                d.getElementById("frm2200A:CalXA035Bottle_" + (rowIndex) + "_Col4").value = "0";
                d.getElementById("frm2200A:CalXA035Bottle_" + (rowIndex) + "_Col5").value = "0";
                d.getElementById("frm2200A:CalXA035Bottle_" + (rowIndex) + "_Col6").value = "0.00";
                d.getElementById("frm2200A:CalXA035Bottle_" + (rowIndex) + "_Col7").value = "0.00";
                d.getElementById("frm2200A:CalXA035Bottle_" + (rowIndex) + "_Col8").value = "0.00";
                d.getElementById("frm2200A:CalXA035Bottle_" + (rowIndex) + "_Col9").value = "0.00";
            }
            else if (calcATC.indexOf("XA036Bottle") > -1) {
                d.getElementById("frm2200A:CalXA036Bottle_" + (rowIndex) + "_Col3").value = "0";
                d.getElementById("frm2200A:CalXA036Bottle_" + (rowIndex) + "_Col4").value = "0";
                d.getElementById("frm2200A:CalXA036Bottle_" + (rowIndex) + "_Col5").value = "0";
                d.getElementById("frm2200A:CalXA036Bottle_" + (rowIndex) + "_Col6").value = "0.00";
                d.getElementById("frm2200A:CalXA036Bottle_" + (rowIndex) + "_Col7").value = "0.00";
                d.getElementById("frm2200A:CalXA036Bottle_" + (rowIndex) + "_Col8").value = "0.00";
                d.getElementById("frm2200A:CalXA036Bottle_" + (rowIndex) + "_Col9").value = "0.00";
                d.getElementById("frm2200A:CalXA036Bottle_" + (rowIndex) + "_Col10").value = "0.00";
            }
            else if (calcATC.indexOf("Bulk") > -1) {
                d.getElementById("frm2200A:Cal" + calcATC + "_" + (rowIndex) + "_Col3").value = "0.00";
                d.getElementById("frm2200A:Cal" + calcATC + "_" + (rowIndex) + "_Col4").value = "0.00";
                d.getElementById("frm2200A:Cal" + calcATC + "_" + (rowIndex) + "_Col5").value = "0.00";
                d.getElementById("frm2200A:Cal" + calcATC + "_" + (rowIndex) + "_Col6").value = "0.00";
            }
            else {
                d.getElementById("frm2200A:Cal" + calcATC + "_" + (rowIndex) + "_Col3").value = "0";
                d.getElementById("frm2200A:Cal" + calcATC + "_" + (rowIndex) + "_Col4").value = "0";
                d.getElementById("frm2200A:Cal" + calcATC + "_" + (rowIndex) + "_Col5").value = "0";
                d.getElementById("frm2200A:Cal" + calcATC + "_" + (rowIndex) + "_Col6").value = "0.00";
                d.getElementById("frm2200A:Cal" + calcATC + "_" + (rowIndex) + "_Col7").value = "0.00";
            }
        }
    }

    function computeSum(CalXA) {
        var taxSum = 0,
            bottleBulkTotal = 0;

        $("." + CalXA + "TotalTaxBase").each(function () {
            taxSum += NumWithComma(this.value);
        });

        d.getElementById("CalcSubTotal" + CalXA).value = roundDownComputation(taxSum);

        if (CalXA.toString().indexOf("XA035") > -1) {
            bottleBulkTotal = roundDownComputation(NumWithComma(d.getElementById("CalcSubTotalXA035Bottle").value) + NumWithComma(d.getElementById("CalcSubTotalXA035Bulk").value));

            d.getElementById("CalcSubTotalXA035").value = bottleBulkTotal; //(bottleBulkTotal >= 1000000000000) ? 0 : bottleBulkTotal;
            taxSum = bottleBulkTotal;
        }
        else if (CalXA.toString().indexOf("XA036") > -1) {
            bottleBulkTotal = roundDownComputation(NumWithComma(d.getElementById("CalcSubTotalXA036Bottle").value) + NumWithComma(d.getElementById("CalcSubTotalXA036Bulk").value));

            d.getElementById("CalcSubTotalXA036").value = bottleBulkTotal; //(bottleBulkTotal >= 1000000000000) ? 0 : bottleBulkTotal;
            taxSum = bottleBulkTotal;
        }

        return (taxSum);
    }

    function setCalcDate(CalXA) {

        var now = dateToday();

        d.getElementById("dateComputed" + CalXA).innerHTML = now;
    }

    function dateToday() {
        var today = new Date();
        var yyyy = today.getFullYear().toString();
        var mm = (today.getMonth() + 1).toString();
        var dd = today.getDate().toString();
        // var time = today.getHours() + ":" + today.getMinutes();
        var thisTime = formatTime(today);
        var dateComputed = mm + "/" + dd + "/" + yyyy + "  " + thisTime;

        return dateComputed;

        function formatTime(today) {
            var formatted = '';

            if (today) {
                var hours24 = today.getHours();
                var hours = ((hours24 + 11) % 12) + 1;
                formatted = [formatted, [addZero(hours), addZero(today.getMinutes())].join(":"), hours24 > 11 ? "pm" : "am"].join(" ");
            }
            return formatted;


            function addZero(num) {
                return (num >= 0 && num < 10) ? "0" + num : num + "";
            }


        }

    }
    //** Modal Printing ====================================================================================*//
    //isPrintingModal - Set to true if printing Calculator Modal 
    var isPrintingModal = false;
    var modalIDPrinting = "";

    function printModal(modalID) {
        var CalXA = modalID.split('Calculator')[1];

        var isValid = ValidateTable('#divCalculator' + CalXA, "print");
        var isNotEmpty = $('#divCalculator' + CalXA + ' div').length != 0;
        if (isNotEmpty) {
            if (isValid) {
                isPrintingModal = true;
                $('#bg').hide();
                $('#modalSched1').removeClass("printSignFooterClass"); //add on cancel
                $('#' + modalID).removeClass("modalShow");

                $('#' + modalID).addClass("modalPrint");
                modalIDPrinting = modalID;

                //Display User Details

                var tinNumber = d.getElementById('frm2200A:txtTIN1').value + "-" + d.getElementById('frm2200A:txtTIN2').value + "-" + d.getElementById('frm2200A:txtTIN3').value + "-" + d.getElementById('frm2200A:txtBranchCode').value;

                $('span[name="calcTIN"]').html(tinNumber);

                $("#Title" + modalID).css({
                    'display': 'block'
                });

                $("#" + modalIDPrinting + " input[type='button']").hide();

                $('#printMenu').show('blind');
                if ($('#formMenu').css('display') != 'none') {
                    $('#formMenu').hide('blind');
                }

                alert("This form must be printed on Legal Size Paper. Please update your Printer Settings (Set Paper Size to Legal under Preferences -> Advanced) to ensure the correct printout of the form.\n\n" +
                      "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166, Enable Shrink-to-Fit must be unchecked, and all Headers & Footers must be set to empty.");

                d.getElementById('container').style.display = "none";

                window.print();

                d.getElementById('container').style.display = "block";

                $("#" + modalIDPrinting + " input[type='button']").show();
            }
        }
        else {
            alert("Please provide valid data.");
        }
    }

    //** Check values for Schedule 1 ====================================================================================*//

    function checkTextboxValues(inputID) {
        var input = $(".tblSched1_2200A input[id*='" + inputID + "'][type='text']");

        for (var i = 0; i < input.length; i++) {
            if ($.trim(input[i].value) !== "0.00") {
                return true;
            }
        }

        return false;
    }

    //** Validate Schedule 1 Others(Row 1) values if Payment on Actual Removal ====================================================================================*//

    function validateSchedule1() {
        //05/26/2014 Schedule 1 is mandatory
        if (d.getElementById('frm2200A:chkPymntManner_1').checked) {
            var isValid = checkTextboxValues("_exempt") || checkTextboxValues("_taxable") || d.getElementById('frm2200A:xa2_exciseTaxDue5').value !== "0.00";
            var isValidOthersRow1 = d.getElementById("frm2200A:sched1AppRate0").value !== "0.00" && (d.getElementById("frm2200A:sched1Exempt0").value !== "0.00" || d.getElementById("frm2200A:sched1Taxable0").value !== "0.00");

            if (!isValid && !isValidOthersRow1) {
                alert("Please fill up Schedule 1.");
                return false;
            }
        }

        return true;
    }

    //** Check ATC if null Schedule 1 ====================================================================================*//
    function checkATCValue(sender) {
        var val = (sender.value.replace(/-/g, '&mdash;')).split("XA"),
            index = sender.id.split("sched1Atc")[1],
            indexRateElem = d.getElementById("frm2200A:sched1AppRate" + index);
        indexRate = indexRateElem.value;

        if ($.trim(sender.value) !== "XA" && ($.trim(sender.value) === "" || (val.length > 0 && (isNaN(val[1]) || val[1] === "" || $.trim(sender.value).length != 5)))) {
            alert("Invalid ATC.");

            sender.value = "XA";
            indexRateElem.onblur = function () { setApplicableTaxrate(this); checkUniqueRate(index); computeDynamicSched1(index); onBlurIterate(this); }
            indexRateElem.value = indexRate.replace(/%/g, '');
            setTimeout(sender.focus, 30);
        }
        else if ($.trim(sender.value) === "XA035") {
            indexRateElem.maxLength = 5;
            indexRateElem.onblur = function () { setPercentage(this, 2); checkUniqueRate(index); computeDynamicSched1(index); onBlurIterate(this); }
            indexRateElem.value = indexRate.replace(/%/g, '') + "%";
            indexRateElem.onblur();
        }
        else {
            indexRateElem.maxLength = 6;
            indexRateElem.onblur = function () { setApplicableTaxrate(this); checkUniqueRate(index); computeDynamicSched1(index); onBlurIterate(this); }
            indexRateElem.value = (indexRate.indexOf("%") > -1) ? "0.00" : indexRate;
            indexRateElem.onblur();
        }
    }

    //**
    function checkIfValidValues(sender) {
        var value = sender.value;

        if (sender.maxLength == 4 || sender.maxLength == 6 || sender.maxLength == 20) {
            var isNumeric = !isNaN(sender.value);
            value = (!isNumeric) ? "" : value;
        } else {
            value = value.replace(/[^a-zA-Z 0-9.,#@'()_-]/g, "");
        }

        sender.value = value;
    }
    function getValAmount(param) {
        var num = 0, obj = document.getElementById('frm2200A:' + param);

        if (obj === null || typeof (obj) === "undefined" || obj === "undefined") {
            num = 0;
        }
        else {
            num = isNaN(obj.value.replace(/[\,]+/gi, "")) ? 0 : obj.value.replace(/[\,]+/gi, "");
        }

        return num;
    }

    function getValString(param) {
        var alpha = '', obj = document.getElementById('frm2200A:' + param);

        if (obj === null || typeof (obj) === "undefined" || obj === "undefined") {
            alpha = '';
        }
        else {
            if (obj.className.indexOf("dateInput") > -1) {
                var dateArray = obj.value.split('/');

                if (dateArray.length === 3) {
                    alpha = dateArray[2] + '-' + dateArray[0] + '-' + dateArray[1];
                }
            }
            else {
                alpha = obj.value;
            }
        }

        return alpha;
    }
    function saveData()
    {
        var valid = validateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                console.log(form.serializeArray());
                var data = form.serialize();
                save('2200A',data);
                
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
        saveAndExit('2200A',data);
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

        submitAndSave('2200A', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2200A';
    } 
</script>
@endsection
