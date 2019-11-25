@extends('layouts.app')
@section('title', '| BIR Form No. 1800')
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
        <button type="button" class="btn btn-danger btn-exit" id="1800" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1800" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1800' company='{{$company->id}}'>Okay</button>
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
        <div id="container" >
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 906px;">
      
        <table border="0" width="906" cellspacing="0" cellpadding="0" align="center" style="background-repeat: repeat-x;">
        <tr><td>
      
                <div id="formPaper">
                    <table width="906" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="906" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
                                    <tr>
                                        <td width="82"  style='padding:0px;' valign="middle" align="center">                    
                                          <p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p>
                                        </td>
                                        <td valign="middle">
                                            <label face="Arial" size="1px">Republika ng Pilipinas
                                            <br/>Kagawaran ng Pananalapi
                                            <br/>Kawanihan ng Rentas Internas</label>
                                        </td>
                                        <td width="0" valign="top">
                                            <font size="6px" style="font-weight:bold;">&nbsp;&nbsp;Donor's
                                            <br/>Tax Return</font>
                                        </td>
                                        <td valign="top">
                                            <font face="Arial" size="1px">BIR Form No.<br/></font>
                                            <font face="Arial" size="6px">1800<br/></font>
                                            <font face="Arial" size="1px">July 1999(ENCS)</font>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="200" rowspan="2" valign="top" class="tblFormTd">
                                                <table style="height:29px">
                                                    <tr>
                                                        <td width="200" height="23"><table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="15"><font size="2" style="font-weight:bold">&nbsp;1&nbsp;</font></td>
                                                                    <td width="176"><font size="1" style="font-size: 11px;">Date of Donation (MM/DD/YYYY) </font></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="23"><input id="frm1800:txtDateMonth"  name="frm1800:txtDateMonth" maxlength="2"  size="4" style="text-align: right" type="text" value=""  onkeypress="return wholenumber(this, event)" />
                                                            <input id="frm1800:txtDateDay"  name="frm1800:txtDateDay" maxlength="2"  size="4" style="text-align: right" type="text" value=""  onkeypress="return wholenumber(this, event)" />
                                                            <input id="frm1800:txtDateYear" name="frm1800:txtDateYear" maxlength="4"  size="4" style="text-align: right" type="text" value=""  onkeypress="return wholenumber(this, event)" /></td>
                                                    </tr>
                                                </table></td>
                                        <td valign="top" class="tblFormTd">
                                            <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                            <div align="center" style="padding: 5px 0 5px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="Y" name="frm1800:amendedRtn" id="frm1800:amendedRtn_1" onclick="enableDisable26C()" />
                                                                                <label for="frm1800:j_id217:_1" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;
                                                                            </td>
                                                                            <td><input type="radio" value="N"  name="frm1800:amendedRtn" id="frm1800:amendedRtn_2" checked onclick="enableDisable26C()"/>
                                                                                <label for="frm1800:j_id217:_2" style="font-size:12px;" >No</label>
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
                                        <td valign="top" class="tblFormTd">
                                            <table width="152" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">No. of Sheets Attached?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><input type="text" value="0" style="text-align: right;" size="4" name="frm1800:txtSheets" maxlength="2" id="frm1800:txtSheets" onkeypress="return wholenumber(this, event)"  /></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="200" valign="top" class="tblFormTd">
                                            <table width="140" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="43">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="22"><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;</font></td>
                                                                <td width="33"><font size="1" style="font-size: 11px;">ATC&nbsp;</font></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    </tr>
                                                <tr>
                                                    <td width="25">&nbsp;</td>
                                                    <td width="36" height="21" nowrap="nowrap">
                                                        <input disabled id="frm1800:txt4" maxlength="5" name="frm1800:txt4" size="6" style="background-color: rgb(220, 220, 220);" type="text" value="DN 010" />
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
                                <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table width="" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="88">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part I</font></td>
                                                    <td width="565">
                                                        <div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;">Background Information</font></div>
                                                    </td>
                                                    <td width="88">&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table style="width: 900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">TIN (Donor)&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="{{$company->tin1}}" size="4" name="frm1800:txtDonorTIN1" maxlength="3" id="frm1800:txtDonorTIN1" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin2}}" size="4" name="frm1800:txtDonorTIN2" maxlength="3" id="frm1800:txtDonorTIN2" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin3}}" size="4" name="frm1800:txtDonorTIN3" maxlength="3" id="frm1800:txtDonorTIN3" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin4}}" size="4" name="frm1800:txtDonorBranchCode" maxlength="3" id="frm1800:txtDonorBranchCode" onkeypress="return letternumber(event)"/>
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                    <td id="rdoSelect">
                                                        <select class='iceSelOneMnu' disabled id='frm1800:txtRDOCode' name='frm1800:txtRDOCode' size='1' >
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
                                                            <font size="1" style="font-size: 11px;">Telephone Number&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->tel_number}}" disabled size="20" name="frm1800:txtTelNum" maxlength="30" id="frm1800:txtTelNum" onkeypress="return wholenumber(this, event)" />
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
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="900" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Donor's Name (For Individual) (Last Name, First Name, Middle Name/(For Non-Individuals)Registered Name</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->registered_name}}" disabled="" size="80" name="frm1800:txtDonorName" maxlength="80" id="frm1800:txtDonorName" class="iceInpTxt-dis" onblur = "return capital(this, event)" /></td>
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
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="589" valign="top" class="tblFormTd">
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
                                                                    <td><input type="text" value="{{$company->address}}" disabled size="80" name="frm1800:txtAddress1" maxlength="80" id="frm1800:txtAddress1" onblur = "return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="149" valign="top" class="tblFormTd">
                                                <table width="148" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="148"><font size="2" style="font-weight:bold;">&nbsp;9A&nbsp;</font><font size="1" style="font-size: 11px;">Zip
                                                                Code</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <input type="text" value="{{$company->zip_code}}" disabled="" size="12" name="frm1800:txtZipCode1" maxlength="4" id="frm1800:txtZipCode1" onkeypress="return wholenumber(this, event)" />
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
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="589" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Residence Address</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="" size="80" name="frm1800:txtAddress2" maxlength="80" id="frm1800:txtAddress2" onblur = "return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="149" valign="top" class="tblFormTd">
                                                <table width="148" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="148"><font size="2" style="font-weight:bold;">&nbsp;10A&nbsp;</font><font size="1" style="font-size: 11px;">Zip
                                                                Code</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <input type="text" value="" size="12" name="frm1800:txtZipCode2" maxlength="4" id="frm1800:txtZipCode2" onkeypress="return wholenumber(this, event)" />
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
                                <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;11&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">TIN (Donee)&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="" size="4" name="frm1800:txtDonee1TIN1" maxlength="3" id="frm1800:txtDonee1TIN1" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="" size="4" name="frm1800:txtDonee1TIN2" maxlength="3" id="frm1800:txtDonee1TIN2" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="" size="4" name="frm1800:txtDonee1TIN3" maxlength="3" id="frm1800:txtDonee1TIN3" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" size="4" name="frm1800:txtDonee1BranchCode" maxlength="3" value="" id="frm1800:txtDonee1BranchCode" onkeypress="return letternumber(event)"/>
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td valign="top" class="tblFormTd">
                                            <table width="371" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="271"><font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font><font size="1" style="font-size: 11px;">Relationship of Donee to the Donor </font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" value="" size="50" name="frm1800:txtRelationshipDonee1" maxlength="50" id="frm1800:txtRelationshipDonee1" onblur = "return capital(this, event)" />
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
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="900" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Donee's Name (For Individual) (Last Name, First Name, Middle Name/(For Non-Individuals)Registered Name</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="" size="80" name="frm1800:txtDonee1Name" maxlength="80" id="frm1800:txtDonee1Name" class="iceInpTxt-dis" onblur = "return capital(this, event)" /></td>
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
                                <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;14&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">TIN (Donee)&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="" size="4" name="frm1800:txtDonee2TIN1" maxlength="3" id="frm1800:txtDonee2TIN1" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="" size="4" name="frm1800:txtDonee2TIN2" maxlength="3" id="frm1800:txtDonee2TIN2" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="" size="4" name="frm1800:txtDonee2TIN3" maxlength="3" id="frm1800:txtDonee2TIN3" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" size="4" name="frm1800:txtDonee2BranchCode" maxlength="3" value="" id="frm1800:txtDonee2BranchCode" onkeypress="return letternumber(event)"/>
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td valign="top" class="tblFormTd">
                                            <table width="371" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="271"><font size="2" style="font-weight:bold;">&nbsp;15&nbsp;</font><font size="1" style="font-size: 11px;">Relationship of Donee to the Donor </font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" value="" size="50" name="frm1800:txtRelationshipDonee2" maxlength="50" id="frm1800:txtRelationshipDonee2" onblur = "return capital(this, event)" />
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
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="900" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;16&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Donee's Name (For Individual) (Last Name, First Name, Middle Name/(For Non-Individuals)Registered Name</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="" size="80" name="frm1800:txtDonee2Name" maxlength="80" id="frm1800:txtDonee2Name" class="iceInpTxt-dis" onblur = "return capital(this, event)" /></td>
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
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="900" style="height: 23px">
                                        <tr>
                                            <td class="tblFormTd" valign="top" width="51%">
                                                <table width="900" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="500"><font size="2" style="font-weight:bold;">&nbsp;17&nbsp;</font><font size="1" style="font-size: 11px;">Are you availing of tax relief under a Special Law / International Tax Treaty ?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td  style="font-size: 11px;">
                                                            <div align="left" style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:300px;padding: 5px 0 5px 0">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="Y" name="frm1800:rdTreaty" id="frm1800:rdTreaty:_1" onclick="enableTreaty()" /><label for="frm1800:j_id398:_1" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" value="N" name="frm1800:rdTreaty" id="frm1800:rdTreaty:_2" onclick="disableTreaty()" checked /><label for="frm1800:j_id398:_2" style="font-size:11px;" >No</label></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div align="left" style="font-size:9px; width: 300px; padding-top: 5px;">
                              <td>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17A If yes, specify
                                                                <select id="frm1800:selTreaty" name="frm1800:selTreaty" style="background-color: #dcdcdc; font-family: Verdana,Arial,Helvetica; font-size: 8pt;" size="1" disabled >
                                                                    <option value="0" selected="selected"> </option>
                                                                    <option value="1">International Tax Treaty</option>
                                  <option value="2">Special Law</option>
                              </td>
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
                                <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTd">
                                            <table width="" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="88">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part II</font></td>
                                                    <td width="565">
                                                        <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>Computation of Tax</b></font></div>
                                                    </td>
                                                    <td width="88">&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTd">
                                            <table width="900" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                                                     <td></td>
                                                    <td align="center">
                                                        <font size="2" style="font-weight:bold;">Particular</font>
                          </td>
                                                    <td align="center">
                                                        <span><font size="2" style="font-weight:bold;">Stranger</font>&nbsp;</span>
                                                    </td>
                                                    <td align="center">
                                                        <span><font size="2" style="font-weight:bold;">Relative</font>&nbsp;</span>
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td>
                                                        <font size="2" style="font-weight:bold;">&nbsp;18&nbsp;&nbsp;</font>
                                                    </td>
                                                    <td>
                                                        <!--<font size="1" face="Arial, Helvetica, sans-serif">Personal Properties (<input type="button" class="printButtonClass" value="From Schedule A" id="btnSchedA" onclick="showSchedA()" />)</font>-->
                            <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Personal Properties ( <a href="#" id="btnSchedA" onclick="showSchedA()" >From Schedule A</a> )</font>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">18A</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt18A" maxlength="25" id="frm1800:txt18A" onblur="compute20()" disabled />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">18B</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt18B" maxlength="25" id="frm1800:txt18B" onblur="compute20()" disabled />
                                                        </span>
                                                    </td>
                                                </tr>                                                     
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;</font></td>
                                                    <!--<td><font size="1"></font><font size="1" face="Arial, Helvetica, sans-serif">Real Properties (<input type="button" class="printButtonClass" value="From Schedule B" id="btnSchedB" onclick="showSchedB()" />)</font></td>-->
                          <td><font size="1"></font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Real Properties ( <a href="#" id="btnSchedB" onclick="showSchedB()" >From Schedule B</a> )</font></td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">19A</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt19A" maxlength="25" id="frm1800:txt19A" onblur="compute20()" disabled />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">19B</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt19B" maxlength="25" id="frm1800:txt19B" onblur="compute20()" disabled />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;20</font></td>
                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Gifts in this Return (Sum of Items 18A & 19A/18B & 19B)</font></td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">20A</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt20A" maxlength="25" id="frm1800:txt20A" disabled />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">20B</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt20B" maxlength="25" id="frm1800:txt20B" disabled />
                                                        </span>
                                                    </td>
                                                </tr>
                        <tr>
                                                        <td><font size="2" style="font-weight:bold;"> &nbsp;21&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">&nbsp;Less: Deductions</font></td>
                                                        <td>&nbsp;</td>
                                                </tr>
                        <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;21A&nbsp;</font></td>
                                                    <td>
                                                        <span>
                                                            <input type="text" style="color: black; text-align: left;" size="35" name="frm1800:txt21A" maxlength="55" id="frm1800:txt21A" value=""  onblur = "return capital(this, event)" />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">21B</font>&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1800:txt21B" maxlength="25" id="frm1800:txt21B" onblur="round(this,2); compute21()" onkeypress="return numbersonly(this, event)" />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">21C</font>&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1800:txt21C" maxlength="25" id="frm1800:txt21C" onblur="round(this,2); compute21()" onkeypress="return numbersonly(this, event)" />
                                                        </span>
                                                    </td>
                                                </tr>
                        <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;21D&nbsp;</font></td>
                                                    <td>
                                                        <span>
                                                            <input type="text" style="color: black; text-align: left;" size="35" name="frm1800:txt21D" maxlength="55" id="frm1800:txt21D" value=""  onblur = "return capital(this, event)" />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">21E</font>&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1800:txt21E" maxlength="25" id="frm1800:txt21E" onblur="round(this,2); compute21()" onkeypress="return numbersonly(this, event)" />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">21F</font>&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1800:txt21F" maxlength="25" id="frm1800:txt21F" onblur="round(this,2); compute21()" onkeypress="return numbersonly(this, event)" />
                                                        </span>
                                                    </td>
                                                </tr>
                        <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;21G&nbsp;</font></td>
                                                    <td>
                                                        <span>
                                                            <input type="text" style="color: black; text-align: left;" size="35" name="frm1800:txt21G" maxlength="55" id="frm1800:txt21G" value="" onblur = "return capital(this, event)" />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">21H</font>&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1800:txt21H" maxlength="25" id="frm1800:txt21H" onblur="round(this,2); compute21()" onkeypress="return numbersonly(this, event)" />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">21I</font>&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1800:txt21I" maxlength="25" id="frm1800:txt21I" onblur="round(this,2); compute21()" onkeypress="return numbersonly(this, event)" />
                                                        </span>
                                                    </td>
                                                </tr>
                        <tr>
                                                    <td><font size="2" style="font-weight:bold;"> &nbsp;21J&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">&nbsp;Total</font></td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">21K</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt21K" maxlength="25" id="frm1800:txt21K" disabled />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">21L</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt21L" maxlength="25" id="frm1800:txt21L" disabled />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;</font></td>
                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Net Gifts in this Return (Item 20A less 21K/20B less 21L)</font></td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">22A</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt22A" maxlength="25" id="frm1800:txt22A" disabled />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">22B</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt22B" maxlength="25" id="frm1800:txt22B" disabled />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;</font></td>
                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Add: Total Prior Net Gifts During the Calendar Year</font> <font size="1" face="Arial, Helvetica, sans-serif"></font></td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">23A</font>&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1800:txt23A" maxlength="25" id="frm1800:txt23A" onblur="round(this,2); compute24()" onkeypress="return numbersonly(this, event)" />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">23B</font>&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1800:txt23B" maxlength="25" id="frm1800:txt23B" onblur="round(this,2); compute24()" onkeypress="return numbersonly(this, event)" />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;</font></td>
                                                    <td><font size="1" face="Arial, Helvetica,sans-serif" style="font-size: 11px;">Total Net Gifts Subject to Tax (22A plus 23A/22B plus 23B)</font></td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">24A</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt24A" maxlength="25" id="frm1800:txt24A" disabled />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">24B</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt24B" maxlength="25" id="frm1800:txt24B" disabled />
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;25&nbsp;</font></td>
                                                    <td><font size="1" face="Arial, Helvetica,sans-serif" style="font-size: 11px;">Tax Due</font></td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">25A</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt25A" maxlength="25" id="frm1800:txt25A" onblur="compute25C()" disabled />
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span><font size="2" style="font-weight:bold;">25B</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt25B" maxlength="25" id="frm1800:txt25B" onblur="compute25C()" disabled />
                                                        </span>
                                                    </td>
                                                </tr><tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;</font></td>
                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Aggregate Tax Due (Sum of Items 25A & 25B)</font></td>
                                                    <td align="center" colspan="2">
                                                        <span><font size="2" style="font-weight:bold;">25C</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt25C" maxlength="25" id="frm1800:txt25C" disabled />
                                                        </span>
                                                    </td>
                                                </tr>
                        <tr>
                                                        <td><font size="2" style="font-weight:bold;"> &nbsp;26&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">Less: Tax Credits/Payments</font></td>
                                                        <td>&nbsp;</td>
                                                </tr>
                        <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;</font></td>
                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">26A&nbsp; Payments for Prior Gifts During the Calendar Year</font></td>
                                                    <td align="center" colspan="2">
                                                        <span><font size="2" style="font-weight:bold;">26A</font>&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1800:txt26A" maxlength="25" id="frm1800:txt26A" onblur="round(this,2); compute26D()" onkeypress="return numbersonly(this, event) " />
                                                        </span>
                                                    </td>
                                                </tr>
                        <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;</font></td>
                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">26B&nbsp; Foreign Donor's Tax Paid</font></td>
                                                    <td align="center" colspan="2">
                                                        <span><font size="2" style="font-weight:bold;">26B</font>&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1800:txt26B" maxlength="25" id="frm1800:txt26B" onblur="round(this,2); compute26D()" onkeypress="return numbersonly(this, event) " />
                                                        </span>
                                                    </td>
                                                </tr>
                        <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;</font></td>
                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">26C&nbsp; Tax Paid in Return Previously Filed, if this is an Amended Return</font></td>
                                                    <td align="center" colspan="2">
                                                        <span><font size="2" style="font-weight:bold;">26C</font>&nbsp;
                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1800:txt26C" maxlength="25" id="frm1800:txt26C" onblur="round(this,2); compute26D()" onkeypress="return numbersonly(this, event)"  disabled />
                                                        </span>
                                                    </td>
                                                </tr>
                        <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;</font></td>
                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">26D&nbsp; Total Tax Credits/Payments (Sum of Items 26A to 26C)</font></td>
                                                    <td align="center" colspan="2">
                                                        <span><font size="2" style="font-weight:bold;">26D</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt26D" maxlength="25" id="frm1800:txt26D" disabled />
                                                        </span>
                                                    </td>
                                                </tr>
                        <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;27</font></td>
                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Payable/(Overpayment)</font></td>
                                                    <td align="center" colspan="2">
                                                        <span><font size="2" style="font-weight:bold;">27&nbsp;&nbsp;</font>&nbsp;&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt27" maxlength="25" id="frm1800:txt27" disabled />
                                                        </span>
                                                    </td>
                                                </tr>
                        <tr>
                                                        <td><font size="2" style="font-weight:bold;"> &nbsp;28&nbsp;</font></td>
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
                                                                            <font size="2" face="Arial"><b>28A</b>&nbsp;
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="15" name="frm1800:txtSurcharge" maxlength="25" id="frm1800:txtSurcharge" onblur="round(this,2); computeTotalPenalties()" onkeypress="return numbersonly(this, event)"  />
                                                                            </font>
                                                                        </td>
                                                                        <td width="161" align="center">
                                                                            <font size="2" face="Arial"><b>28B</b>&nbsp;
                                                                            <input type="text" value="0.00" style="text-align: right;" size="15" name="frm1800:txtInterest" maxlength="25" id="frm1800:txtInterest" onblur="round(this,2); computeTotalPenalties()" onkeypress="return numbersonly(this, event)"  />
                                                                            </font>
                                                                        </td>
                                                                        <td width="174" align="center">
                                                                            <font size="2" face="Arial"><b>28C</b>&nbsp;
                                                                            <input type="text" value="0.00" style="text-align: right;" size="15" name="frm1800:txtCompromise" maxlength="25" id="frm1800:txtCompromise" onblur="round(this,2); computeTotalPenalties()" onkeypress="return numbersonly(this, event)"  />
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">28D</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txtTotalPenalties" maxlength="15" id="frm1800:txtTotalPenalties" disabled />
                                                            </div>
                                                        </td>
                                                    </tr>
                          <tr>
                                                    <td><font size="2" style="font-weight:bold;">&nbsp;29</font></td>
                                                    <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">&nbsp; Total Amount Payable/(Overpayment) (Sum of Items 27 & 28D)   </font></td>
                                                    <td align="center" colspan="2">
                                                        <span><font size="2" style="font-weight:bold;">29</font>&nbsp;
                                                            <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1800:txt29" maxlength="25" id="frm1800:txt29" disabled />
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
                                <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="250" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="180">
                                                        <table width="230" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td width="24">&nbsp;</td>
                                                                <td width="180"><font size="1" style="font-size: 11px;"> In case of Overpayment, Mark one box only:</font></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="607" valign="top" class="tblFormTd"><table width="599" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="599"><table width="598" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td width="3">&nbsp;</td>
                                                                <td width="110"><input id="frm1800:opt37:_1" name="frm1800:opt37" value="R" type="radio"/>
                                                                    <font size="1">
                                                                        <label for="frm1800:opt37:_1" style="font-size: 11px;">To be refunded</label>
                                                                    </font> </td>
                                                                <td width="221"><input id="frm1800:opt37:_2" name="frm1800:opt37" value="I" type="radio"/>
                                                                    <font size="1">
                                                                        <label for="frm1800:opt37:_2" style="font-size: 11px;">To be issued a Tax Credit Certificate</label>
                                                                    </font> </td>
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
                <div class="imgClass" align='center' style="display:none; width:900px !important;">
                  <!-- <img id="frm1800:jurat" src="../img/jurat/1800.jpg" width="900"/> -->
                  <table  style="border-top: 3px solid black; font-family:arial; font-size:13px; text-align: center; table-layout: fixed;">
                    <col width="50%" />
                      <col width="50%" />
                      <tr>
                        <td colspan="2">I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge and belief,
                            <br/>is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
                            <br/>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><b>30</b>____________________________________________________
                          <br/>Taxpayer/Authorized Agent Signature over Printed Name</td>
                        <td><b>31</b>_______________________________
                          <br/>Title/Position of Signatory</td>
                      </tr>
                  </table>
                </div>
                <div class="imgClass" align='center' style="display:none; width:900px !important;">
                  <img id="frm1800:jurat" src="{{ asset('images/bottom_img/1800_new.jpg') }}" width="900"/>
                </div>
                <div class="imgClass" align='center' style="display:none; width:900px !important;">
                  <table style="font-size:12px; text-align: left; vertical-align: top;">
                    <tr>
                      <td>&nbsp;Machine Validation/Revenue Official Receipt Details (If not filed with the bank)<br/><br/><br/><br/><br/></td>
                    </tr>
                  </table>
                </div>
                                <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                    <tr>
                                        <td class="tblFormTd">
                                            <table width="900" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                    <tr valign="middle">
                                                        <td>
                                                            <input type="hidden" name="frm1800:exempStat" id="frm1800:exempStat" value="" />
                                                            <input type="hidden" name="frm1800:gender" id="frm1800:gender" value="" />
                                                        </td>
                                                        <td>
                                                            <div align="center">
                                                              @if($action != 'view')
                                                                <input type="button" class="printButtonClass" value="Validate" style="width: 100px;" name="frm1800:cmdValidate" id="frm1800:cmdValidate" onclick="validateForm()" />
                                                                <input type="button" class="printButtonClass" value="Edit" style="width: 100px;" name="frm1800:cmdEdit" id="frm1800:cmdEdit" onclick="editForm()" />
                                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1800:btnFinalCopy" id="frm1800:btnFinalCopy" onclick="submitForm();" />
                                                                <div id="msg" class="printButtonClass" style="display:none;"></div>
                                                                @else
                                                                   <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                   <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                               @endif
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <input type="text" name="frm1800:hdnSpsFirstname" id="frm1800:hdnSpsFirstname" value="" style="display: none" />
                                <input type="text" name="frm1800:hdnSpsMidname" id="frm1800:hdnSpsMidname" value="" style="display: none" />
                                <input type="text" name="frm1800:hdnSpsLastname" id="frm1800:hdnSpsLastname" value="" style="display: none" />
                            </td>
                        </tr>
                    </table>
                </div>
        
        </td>
        <td valign="top"><img id="frm1800:bcsImg" src="{{ asset('images/BCS.jpg') }}"/></td>
        </tr>
        <tr>
                                <td>
                                    <div class="footer footer2552" style="padding:6px; text-align: center; font-size: 11px; background-color: white;">
                                        <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                                    </div>
                                </td>
                            </tr>
        </table>
        
            </div>
        </div>
    
   
    <!--Modal schedA-->
    <div id="modalSchedA" class="printSignFooterClass_1800 aBox" style="width:75%; display:none; min-height:400px;margin: auto;position:relative; top:3%; left:0%; right:auto; overflow-y:auto; background:#fff;" align="center"> 
      <br/>
            <br/>     
      <br/>
            <br/>
      <div style="width: 819px">
      <table  style="width: 100%" border="1" cellspacing="0" cellpadding="0">
            <tr class="modalHeader_1800"><td>Schedule A &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Description of Donated Personal Property   </td></tr></table>
            
                <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%" id="tblSchedA">
                    <thead>
                        <tr class="modalColumnHeader_1800">
                            <td width="50%" align="center" colspan="2">&nbsp; </td>
                            <td width='50%' align="center" colspan="3" ><b> Fair Market Value </b></td>
                          
                        </tr>         
                        <tr class="modalColumnHeader_1800">
                            <td width="5%">&nbsp; </td>
                            <td width='45%' align="center" ><b> Particulars </b></td>
                            <td width='25%' align="center" ><b> Stranger </b></td>
              <td width='25%' align="center" ><b> Relative </b></td>
                        </tr>
          </thead>
                    <tbody id="tbodyllistSchedA"><tr><td></td></tr></tbody>
                </table>
                <table  border="1" style="position: static;width: 100%" align="center" cellspacing="0" cellpadding="0">
                    <tr height="30" valign="middle">
            <td width="80%" colspan="2" class="modalColumnHeader_1800" align="left">&nbsp;&nbsp;TOTALS</td>
                        <td width="25%" align="center"><input type="text" size="25" style="background-color: #dcdcdc; text-align:right" disabled="true" id="frm1800:totalStranger" name="frm1800:totalStranger" maxlength="25" value="0.00" /></td>
            <td width="25%" align="center"><input type="text" size="25" style="background-color: #dcdcdc; text-align:right" disabled="true" id="frm1800:totalRelative" name="frm1800:totalRelative" maxlength="25" value="0.00" /></td>
                    </tr>
                </table>
                <table  border="0" style="position: static;width: 100%" align="right" cellspacing="0" cellpadding="0">
          <tr><td colspan="4" width="100%" height="1">&nbsp;</td></tr>
                    <tr>
            <td width="50%" colspan="2">&nbsp;</td>
                        <td width="50%" colspan="2" align="right">
                          <input type='button' style="margin-right: 10px;" class="printButtonClass" id="btnAdd1" value='  Add  ' onclick="addlistSchedA()" />
                          <input type='button' class="printButtonClass" id="btnDelete1" value='Delete' onclick="deletelistSchedA()" />  </td>
                    </tr>
                </table>        
            </div>
            <br/><br/>
      <div align="center">
        <input type="button" class="printButtonClass" name="btnOkPop2" id="btnOkPop2" style="width:120px; height:30px;" value="OK" onclick="getSchedAModal()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" class="printButtonClass" name="btnClearPop2" id="btnClearPop2" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSchedAModal()" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!--<input type="button" name="btnCancelPop2" id="btnCancelPop2" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSchedAModal()" />-->
      </div>
            <br/>
      <br/>     
    </div>
    
    <!--Modal schedB-->
    <div id="modalSchedB" class="printSignFooterClass_1800 aBox" style="width:75%; display:none; min-height:500px; position:relative; top:3%; left:0%;margin:auto; right:auto; overflow-y:auto; background:#fff;" align="center"> 
      <br/>
            <br/>
      <div style="width: 933px">
      <table  style="width: 100%" border="1" cellspacing="0" cellpadding="0">
            <tr class="modalHeader_1800"><td>&nbsp;&nbsp;Schedule B &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Description of Donated Real Property   </td></tr></table>
            
                <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%" id="tblSchedB">
                    <thead>
                        <tr class="modalColumnHeader_1800">
                            <td width="70%" colspan="5">&nbsp; </td>
              <td width='30%' align="center" colspan="2" ><b> Fair Market Value </b></td>
                        </tr>         
                        <tr class="modalColumnHeader_1800">
                            <td width="5%">&nbsp; </td>
                            <td width='15%' align="center" ><b> Classification </b></td>
                            <td width='15%' align="center" ><b> Area </b></td>
                            <td width='20%' align="center" ><b> Location </b></td>
                            <td width='15%' align="center" ><b> TCT/OCT/CCT / Tax Declaration </br> No. for Untitled Real Property </b></td>
                            <td width='15%' align="center" ><b> Stranger </b></td>
                            <td width='15%' align="center" ><b> Relative </b></td>
                        </tr>
          </thead>
                    <tbody id="tbodyllistSchedB"><tr><td></td></tr></tbody>
                </table>        
                <table  border="1" style="position: static;width: 100%" align="center" cellspacing="0" cellpadding="0">
                    <tr height="30" valign="middle">
            <td colspan="5" width="70%" class="modalColumnHeader_1800" align="left">&nbsp;&nbsp;TOTALS</td>
                        <td width="15%" align="center"><input style="background-color: #dcdcdc; text-align:right" type="text" disabled id="frm1800:totalStrangerB" name="frm1800:totalStrangerB" size="18" value="0.00" /></td>
            <td width="15%" align="center"><input style="background-color: #dcdcdc; text-align:right" type="text" disabled id="frm1800:totalRelativeB" name="frm1800:totalRelativeB" size="18" value="0.00" /></td>
                    </tr>
                </table>
                <table  border="0" style="position: static;width: 100%" align="center" cellspacing="0" cellpadding="0">
          <tr><td colspan="8" height="1">&nbsp;</td></tr>
          <tr>
            <td colspan="8" height="1" align="right">
              <input type='button' class="printButtonClass" id="btnAdd2" value='  Add  ' onclick="addlistSchedB()" />
              <input type='button' class="printButtonClass" id="btnDelete2" value='Delete' onclick="deletelistSchedB()" />
            </td>
          </tr>
                </table>        
            </div>
            <br/><br/>
      <div align="center">
        <input type="button" class="printButtonClass" name="btnOkPop2" id="btnOkPop2" style="width:120px; height:30px;" value="OK" onclick="getSchedBModal()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" class="printButtonClass" name="btnClearPop2" id="btnClearPop2" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSchedBModal()" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
            <br/>
      <br/> 
    </div>
  <div id="hiddenEmail" style="display:none;"  > 
          <input value="{{$company->email_address}}" id="txtEmail" class="emailClass" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60"   />
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
    <div id="responseRdo" style="display:none;"><!--loaded files render here--></div> 
@endsection

@section('scripts')
<script type="text/javascript" >
  var isSubmitFinal = false;
  var isSubmit = false;

  var fileNameToExport = "";
  var fileName = "";
  var existingXMLFileName = "";
  var gIsReadOnly = false; 
    var str;
    var sched1Index = 0;
    var hasSpouse = false;
    var enabledItem31 = true;
  
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
  
  var isModalTurnOn = false;
  
  var schedA = new Array();
    var schedAToCommit = new Array(); 
    var tempRowSizeSchedA = 0;
  
  var schedB = new Array();
    var schedBToCommit = new Array(); 
    var tempRowSizeSchedB = 0;

  var d=document,XMLBGFile='',data='',XMLFile='',XMLRegionFile='',XMLProvinceFile='',XMLCityFile='',msg = d.getElementById('msg'),flag1=true,flag2=true;
  var loader=d.getElementById('loader');
  
    str = setInterval("sleeptime()", 300);
    
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
                
        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
        }

        if (gIsReadOnly) {
          d.getElementById('frm2000:cmdValidate').disabled = true;
          d.getElementById('btnSave').disabled = true;
        }

        if (loadWhere != null && loadWhere != "") {
  
          loadData(); /*This will load data onto fields*/ 
          if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
          }
        
          if (gIsReadOnly) {
            d.getElementById('frm1800:cmdValidate').disabled = true;
            d.getElementById('btnSave').disabled = true;
          }
      
          /*------------- modalSchedA -----------*/
          flag1=false;
          var count1=0;
          var responses1 = d.getElementById('response').getElementsByTagName('div');
          var sPar1 = 'chxschedA';    
      
          do {
            if (responses1.item(count1).innerHTML.indexOf(sPar1) != -1) { 
              var temp = String(responses1.item(count1).innerHTML);   
              temp = temp.substring(0,sPar1.length+1); //substring to length of search param for index - check files  
              temp = temp.substring(sPar1.length,sPar1.length+1); //get the last character for checking 
              if ( !isNaN(temp) ) addlistSchedAReload(); //if last char is a number, add modal section    
            } count1++;
          } while (count1!=responses1.length);
          window.setTimeout("loadData();getSchedAModal();flag1=true;",510); 
        
          /*--------------------------------------------------------------------------------------*/  

          /*------------- modalSchedB -----------*/
          flag2=false;
          var count=0;
          var responses = d.getElementById('response').getElementsByTagName('div');
          var sPar = 'chxschedB';     
      
          do {
            if (responses.item(count).innerHTML.indexOf(sPar) != -1) {
              var temp = String(responses.item(count).innerHTML);
              temp = temp.substring(0,sPar.length+1); //substring to length of search param for index - check files
              temp = temp.substring(sPar.length,sPar.length+1); //get the last character for checking
              if ( !isNaN(temp) ) addlistSchedBReload(); //if last char is a number, add modal section
            } count++;
          } while (count!=responses.length);
          window.setTimeout("loadData();getSchedBModal();flag2=true;",510); 
          /*--------------------------------------------------------------------------------------*/  
    
          window.setTimeout("$('#loader').hide('blind');",2000);  
        }

  }
  
  function loadData() {
    /*This will load data onto fields*/
    var response = d.getElementById("response");
    
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
      
      if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {        
        if (elem[i].type == 'text' || elem[i].type == 'select-one') {
          var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
          if(elem[i].id == 'frm1800:txtDonorName' || elem[i].id == 'frm1800:txtAddress1' || elem[i].id == 'frm1800:txtAddress2' 
          || elem[i].id == 'frm1800:txtRelationshipDonee1' || elem[i].id == 'frm1800:txtRelationshipDonee2' || elem[i].id == 'frm1800:txtDonee1Name' 
          || elem[i].id == 'frm1800:txtDonee2Name'){
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
          var fVal = String( $("#response").html() ).split(elem[i].id+'=');
          if (fVal[1] == 'true') {
            elem[i].checked = fVal[1];
            
            if (elem[i].id == 'frm1800:rdTreaty:_1' || elem[i].id == 'frm1800:rdTreaty:_2') {
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
        if (elem[i].type == 'button' && elem[i].id == 'frm1706:cmdValidate') {
          flag = false;
          elem[i].onclick(); //display computations
        }
      }

        }       
    document.getElementById('txtEmail').value = globalEmail;
  }
  
  function sleeptime()
    {
        clearInterval(str);
        init();
   
    var xmlFileName = document.getElementById('file_name').value;        
    fileName = xmlFileName;
    if (fileName != null && fileName.indexOf('.xml') > -1) {  
      loadXML(fileName); 

      d.getElementById('frm1800:txtDateMonth').disabled = true;
      d.getElementById('frm1800:txtDateYear').disabled = true;
      d.getElementById('frm1800:txtDateDay').disabled = true;
      
      existingXMLFileName = fileName;
      if (gIsReadOnly) { 
      window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false;",1000); 
      }
    } else {
      window.setTimeout("$('#loader').hide('blind');",100); 
    }     
    if ( $('#printMenu').css('display') != 'none' ) { 
      $('#printMenu').hide('blind');
    }
    d.getElementById('frm1800:txtDonorTIN1').disabled = true;
      d.getElementById('frm1800:txtDonorTIN2').disabled = true;
    d.getElementById('frm1800:txtDonorTIN3').disabled = true;
    d.getElementById('frm1800:txtDonorBranchCode').disabled = true;
  }
  
  function rdoPropertyJS(rdoCode, description) 
  {
    this.rdoCode=rdoCode;
    this.description=description;
  }
    
  var rdoList = new Array();

  function init()
  { 
    var year = new Date();
    
    mm = "" + (year.getMonth() + 1); 
    if (mm.length == 1) 
    {
      mm = "0" + mm; 
      d.getElementById('frm1800:txtDateMonth').value = mm;
    }
    else
    {
      d.getElementById('frm1800:txtDateMonth').value = year.getMonth() +1;
    }
    d.getElementById('frm1800:txtDateYear').value = year.getFullYear();
    dd = "" + year.getDate();
    if (dd.length == 1) 
    { 
      dd = "0" + dd; 
      d.getElementById('frm1800:txtDateDay').value = dd;
    }
    else
    {
      d.getElementById('frm1800:txtDateDay').value = year.getDate();
    }
    
    @if($action != 'view')
    d.getElementById('btnPrint').disabled = true;
    d.getElementById('frm1800:cmdEdit').disabled = true;
    d.getElementById('frm1800:btnFinalCopy').disabled = true;
    d.getElementById('btnUpload').disabled = true;
    @endif
  }
        
  function enableDisable26C()
  {
    if (d.getElementById('frm1800:amendedRtn_1').checked == true)
    {
      d.getElementById('frm1800:txt26C').disabled = false;
    }
    else if (d.getElementById('frm1800:amendedRtn_2').checked == true)
    {
      d.getElementById('frm1800:txt26C').disabled = true;
      d.getElementById('frm1800:txt26C').value = 0.00;
    }
    compute26D();
    compute27();
  }
  function enableTreaty()
  {
    d.getElementById('frm1800:selTreaty').disabled = false;
    d.getElementById('frm1800:selTreaty').selectedIndex = 0;
    d.getElementById('frm1800:selTreaty').style.backgroundColor = "#ffffff";
  }
  
  function disableTreaty() 
  {
    d.getElementById('frm1800:selTreaty').disabled = true;
    d.getElementById('frm1800:selTreaty').selectedIndex = 0;
    d.getElementById('frm1800:selTreaty').style.backgroundColor = "#e2e2e2";
  }
  
  function showSchedA()
  { 
    saveTempSchedAData();
      
      d.getElementById('formPaper').style.display = "none";
      $('#modalSchedA').show('blind');
      $('#wrapper').css({ 'display':'none' });
      setTimeout("d.getElementById('frm1800:totalStranger').disabled = true; setInputTextControl_HorizontalAlignment('frm1800:totalStranger', 4);", 100);
      setTimeout("d.getElementById('frm1800:totalRelative').disabled = true; setInputTextControl_HorizontalAlignment('frm1800:totalRelative', 4);", 100);
  }
  
  function saveTempSchedAData() {
    try {
      tempRowSizeSchedA = d.getElementById("tblSchedA").rows.length - 2;
      tempSchdAParticulars = new Array();
      tempSchdAStranger = new Array();
      tempSchdARelative = new Array();
      for(var x = 0; x < tempRowSizeSchedA; x++){
        if (d.getElementById('txtSchedAParticulars'+ (x)) != null)
          tempSchdAParticulars[x] = d.getElementById('txtSchedAParticulars'+ (x)).value;
        if (d.getElementById('txtSchedAStranger'+ (x)) != null)
          tempSchdAStranger[x] = d.getElementById('txtSchedAStranger'+ (x)).value;
        if (d.getElementById('txtSchedARelative'+ (x)) != null)
          tempSchdARelative[x] = d.getElementById('txtSchedARelative'+ (x)).value;
      }
    } catch(e) {
      alert(e.message);
    }
    } 

    function addlistSchedAReload()
    { 
            var size = schedAToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                schedAToCommit[i].txtSchedAParticulars = d.getElementById('txtSchedAParticulars'+i).value;
                schedAToCommit[i].txtSchedAStranger = d.getElementById('txtSchedAStranger'+i).value;
        schedAToCommit[i].txtSchedARelative = d.getElementById('txtSchedARelative'+i).value;
            }
    
            i = schedAToCommit.length;
            schedAToCommit[i] = new ScheduleA();
      $('#tbodyllistSchedA').html("");
    
            for(i = 0; i < schedAToCommit.length; i++) {
         $('#tbodyllistSchedA').html(  d.getElementById('tbodyllistSchedA').innerHTML + "<tr height='25'>" +        
                    "<td width='5%' align='center'><input type='checkbox' class='printButtonClass' id='chxschedA"+i+"' name='chxschedA"+i+"' /> </td>" +
                    "<td width='45%' align='center'><input type='text' size='70' id='txtSchedAParticulars"+i+"' name='txtSchedAParticulars[]' value='"+ schedAToCommit[i].txtSchedAParticulars +"'  maxlength='70' > </td> " +
          "<td width='25%' align='center'><input style='text-align:right' type='text' size='25' id='txtSchedAStranger"+i+"' name='txtSchedAStranger[]' value='"+ schedAToCommit[i].txtSchedAStranger +"'  onblur='blockletter(this);round(this,2); computeSumTax()' maxlength='25' onkeypress='return numbersonly(this, event)' /> </td> " +
          "<td width='25%' align='center'><input style='text-align:right' type='text' size='25' id='txtSchedARelative"+i+"' name='txtSchedARelative[]' value='"+ schedAToCommit[i].txtSchedARelative +"'  onblur='blockletter(this);round(this,2); computeSumTax2()' maxlength='25' onkeypress='return numbersonly(this, event)' /> </td> " +
                    "</tr>"); 
          }
    } 
  
    function addlistSchedA()
    {
        if(checkifEmptyFieldSchedA()) {
            var size = schedAToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                schedAToCommit[i].txtSchedAParticulars = d.getElementById('txtSchedAParticulars'+i).value;
                schedAToCommit[i].txtSchedAStranger = d.getElementById('txtSchedAStranger'+i).value;
        schedAToCommit[i].txtSchedARelative = d.getElementById('txtSchedARelative'+i).value;
            }
            i = schedAToCommit.length;
            schedAToCommit[i] = new ScheduleA();

      $('#tbodyllistSchedA').html("");
      
            for(i = 0; i < schedAToCommit.length; i++) {

         $('#tbodyllistSchedA').html(  d.getElementById('tbodyllistSchedA').innerHTML + "<tr height='25'>" +        
                    "<td width='5%' align='center'><input type='checkbox' class='printButtonClass' id='chxschedA"+i+"' name='chxschedA"+i+"' /> </td>" +
                    "<td width='45%' align='center'><input type='text' size='70' id='txtSchedAParticulars"+i+"' name='txtSchedAParticulars[]' value='"+ schedAToCommit[i].txtSchedAParticulars +"'  maxlength='70' > </td> " +
          "<td width='25%' align='center'><input style='text-align:right' type='text' size='25' id='txtSchedAStranger"+i+"' name='txtSchedAStranger[]'  value='"+ schedAToCommit[i].txtSchedAStranger +"'  onblur='blockletter(this);round(this,2); computeSumTax()' maxlength='25' onkeypress='return numbersonly(this, event)' /> </td> " +
          "<td width='25%' align='center'><input style='text-align:right' type='text' size='25' id='txtSchedARelative"+i+"' name='txtSchedARelative[]'  value='"+ schedAToCommit[i].txtSchedARelative +"'  onblur='blockletter(this);round(this,2); computeSumTax2()' maxlength='25' onkeypress='return numbersonly(this, event)' /> </td> " +
                    "</tr>"); 
            
                 setTimeout("setInputTextControl_HorizontalAlignment('txtSchedAStranger"+i+"',4 );d.getElementById('txtSchedAStranger"+i+"').value=d.getElementById('txtSchedAStranger"+i+"').value;",100);
              setTimeout("setInputTextControl_HorizontalAlignment('txtSchedARelative"+i+"',4 );d.getElementById('txtSchedARelative"+i+"').value=d.getElementById('txtSchedARelative"+i+"').value;",100);
            }
        }
    }

    function deletelistSchedA()
    {
        var schedATemp = new Array();
        var i = 0;
        var size = schedAToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            schedAToCommit[i].txtSchedAParticulars = d.getElementById('txtSchedAParticulars'+i).value;
            schedAToCommit[i].txtSchedAStranger = d.getElementById('txtSchedAStranger'+i).value;
      schedAToCommit[i].txtSchedARelative = d.getElementById('txtSchedARelative'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxschedA" + j).checked) {
                schedATemp[i++] = schedAToCommit[j];
            }
        }

        if(schedATemp.length > 0) {
            schedAToCommit = new Array();
            schedAToCommit = schedATemp;
      $('#tbodyllistSchedA').html("");

            for(i = 0; i < schedATemp.length; i++) {
                schedAToCommit[i] = schedATemp[i];
                //d.getElementById("tbodyllistSchedA").innerHTML += "<tr>" +
        $('#tbodyllistSchedA').html(  d.getElementById('tbodyllistSchedA').innerHTML + "<tr height='25'>" + 
                    "<td width='5%' align='center'><input type='checkbox' class='printButtonClass' id='chxschedA"+i+"' /> </td>" +
                    "<td width='45%' align='center'><input type='text' size='70' id='txtSchedAParticulars"+i+"' value='"+ schedAToCommit[i].txtSchedAParticulars +"'  maxlength='70' > </td> " +
          "<td width='25%' align='center'><input style='text-align:right' type='text' size='25' id='txtSchedAStranger"+i+"' value='"+ schedAToCommit[i].txtSchedAStranger +"'  onblur='blockletter(this);round(this,2); computeSumTax()' maxlength='25' onkeypress='return numbersonly(this, event)' /> </td> " +
          "<td width='25%' align='center'><input style='text-align:right' type='text' size='25' id='txtSchedARelative"+i+"' value='"+ schedAToCommit[i].txtSchedARelative +"'  onblur='blockletter(this);round(this,2); computeSumTax2()' maxlength='25' onkeypress='return numbersonly(this, event)' /> </td> " +
                    "</tr>"); 


                setTimeout("setInputTextControl_HorizontalAlignment('txtSchedAStranger"+i+"',4 );",100);
        setTimeout("setInputTextControl_HorizontalAlignment('txtSchedARelative"+i+"',4 );",100);

            }
        } else {
            schedAToCommit = new Array();
      $('#tbodyllistSchedA').html("");
        }
        computeSumTax();
    computeSumTax2();
    } 
  
    function computeSumTax(){
        var size = schedAToCommit.length;
        var totalAmountTax = 0;
    
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtSchedAStranger' + i).value)*1 ;
    }
        d.getElementById('frm1800:totalStranger').value = formatCurrency(totalAmountTax);
        compute20();
    } 
  
  function computeSumTax2(){
        var size = schedAToCommit.length;
        var totalAmountTax = 0;
    
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtSchedARelative' + i).value)*1 ;
    }
        d.getElementById('frm1800:totalRelative').value = formatCurrency(totalAmountTax);
    compute20();
    } 
  
    function checkifEmptyFieldSchedA() {

        var size = schedAToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtSchedAParticulars'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 2.\n" +
                    "Empty fields are not allowed."); return ;
            } 
            if(  (d.getElementById('txtSchedAStranger'+ i).value == 0 ||d.getElementById('txtSchedAStranger'+ i).value == "") && (d.getElementById('txtSchedARelative'+ i).value == 0 || d.getElementById('txtSchedARelative'+ i).value == "") ) {
                alert("Please enter a valid amount on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
        }

        return true;
    } 
  
    function getSchedAModal(){
        if (checkifEmptyFieldSchedA() )
        {
           d.getElementById('formPaper').style.display = 'block';
           if ( $('#modalSchedA').css('display') != 'none' ) {
            $('#modalSchedA').hide('blind');
            $('#wrapper').css({ 'display':'block' });
           }
           $('#DummyTxt').html("Creator");
           $('#DummyTxt').html("");     

            d.getElementById('frm1800:txt18A').value  = d.getElementById('frm1800:totalStranger').value;
            d.getElementById('frm1800:txt18B').value  = d.getElementById('frm1800:totalRelative').value;

          compute20();
            isModalTurnOn = false;
        }
    }

    function clearSchedAModal() {
        var rowSizeschedA = d.getElementById("tblSchedA").rows.length - 1;

        for(var x = 0; x < rowSizeschedA; x++){
      if (d.getElementById('txtSchedAParticulars'+ (x)) != null)
        d.getElementById('txtSchedAParticulars'+ (x)).value = "";
            if (d.getElementById('txtSchedAStranger'+ (x)) != null)
        d.getElementById('txtSchedAStranger'+ (x)).value = "0.00";
      if (d.getElementById('txtSchedARelative'+ (x)) != null)
        d.getElementById('txtSchedARelative'+ (x)).value = "0.00";
      
        }
    }

    function cancelSchedAModal() {
    d.getElementById('formPaper').style.display = 'block';
  
    if ( $('#modalSchedA').css('display') != 'none' ) {
      $('#modalSchedA').hide('blind');    
    }
    $('#DummyTxt').html("Creator");
    $('#DummyTxt').html("");    
        isModalTurnOn = false;  
    } 
  
  function ScheduleA()
    {
        this.txtSchedAParticulars = '';
        this.txtSchedAStranger = '0.00';
    this.txtSchedARelative = '0.00';
    }
  
  function hideSchedA()
  {
    d.getElementById('formPaper').style.display = 'block';
        $('#modalSchedA').hide('blind');
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
  }
  
  function showSchedB()
  { 
      saveTempSchedBData();
      
      d.getElementById('formPaper').style.display = "none";
      $('#modalSchedB').show('blind');
      $('#wrapper').css({ 'display':'none' });
      setTimeout("d.getElementById('frm1800:totalStrangerB').disabled = true; setInputTextControl_HorizontalAlignment('frm1800:totalStrangerB', 4);", 100);
      setTimeout("d.getElementById('frm1800:totalRelativeB').disabled = true; setInputTextControl_HorizontalAlignment('frm1800:totalRelativeB', 4);", 100);
  }
  
  function saveTempSchedBData() {
        try {
      tempRowSizeSchedB = d.getElementById("tblSchedB").rows.length - 2;
      tempSchdBClassification = new Array();
      tempSchdBArea = new Array();
      tempSchdBLocation = new Array();
      tempSchdBTaxDeclaration = new Array();
      tempSchdBStranger = new Array();
      tempSchdBRelative = new Array();
      for(var x = 0; x < tempRowSizeSchedB; x++){
        if (d.getElementById('txtSchedBClassification'+ (x)) != null)
          tempSchdBClassification[x] = d.getElementById('txtSchedBClassification'+ (x)).value;
        if (d.getElementById('txtSchedBArea'+ (x)) != null)
          tempSchdBArea[x] = d.getElementById('txtSchedBArea'+ (x)).value;
        if (d.getElementById('txtSchedBLocation'+ (x)) != null)
          tempSchdBLocation[x] = d.getElementById('txtSchedBLocation'+ (x)).value;
        if (d.getElementById('txtSchedBTaxDeclaration'+ (x)) != null)
          tempSchdBTaxDeclaration[x] = d.getElementById('txtSchedBTaxDeclaration'+ (x)).value;
        if (d.getElementById('txtSchedBStranger'+ (x)) != null)
          tempSchdBStranger[x] = d.getElementById('txtSchedBStranger'+ (x)).value;
        if (d.getElementById('txtSchedBRelative'+ (x)) != null)
          tempSchdBRelative[x] = d.getElementById('txtSchedBRelative'+ (x)).value;
      }
    } catch(e) {
      alert(e.message);
    }
    } 

    function addlistSchedBReload()
    {
            var size = schedBToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                schedBToCommit[i].txtSchedBClassification = d.getElementById('txtSchedBClassification'+i).value;
        schedBToCommit[i].txtSchedBArea = d.getElementById('txtSchedBArea'+i).value;
        schedBToCommit[i].txtSchedBLocation = d.getElementById('txtSchedBLocation'+i).value;
        schedBToCommit[i].txtSchedBTaxDeclaration = d.getElementById('txtSchedBTaxDeclaration'+i).value;
                schedBToCommit[i].txtSchedBStranger = d.getElementById('txtSchedBStranger'+i).value;
        schedBToCommit[i].txtSchedBRelative = d.getElementById('txtSchedBRelative'+i).value;
            }
            i = schedBToCommit.length;
            schedBToCommit[i] = new ScheduleB();

      $('#tbodyllistSchedB').html("");
      
            for(i = 0; i < schedBToCommit.length; i++) {

         $('#tbodyllistSchedB').html(  d.getElementById('tbodyllistSchedB').innerHTML + "<tr height='25'>" +        
                    "<td width='5%' align='center'> <input type='checkbox' class='printButtonClass' id='chxschedB"+i+"' name='chxschedB"+i+"'/> </td>" +
                    "<td width='15%' align='center'> <input type='text' size='20'  id='txtSchedBClassification"+i+"' name='txtSchedBClassification[]' value='"+ schedBToCommit[i].txtSchedBClassification +"'  maxlength='50' > </td> " +
          "<td width='15%' align='center'> <input type='text' size='20' style='text-align: right' id='txtSchedBArea"+i+"' name='txtSchedBArea[]'  value='"+ schedBToCommit[i].txtSchedBArea +"'  maxlength='50' onkeypress='return numbersonly(this, event)' > </td> " +
          "<td width='20%' align='center'> <input type='text' size='30'  id='txtSchedBLocation"+i+"' name='txtSchedBLocation[]'  value='"+ schedBToCommit[i].txtSchedBLocation +"'  maxlength='50' > </td> " +
          "<td width='15%' align='center'> <input type='text' size='19'  id='txtSchedBTaxDeclaration"+i+"' name='txtSchedBTaxDeclaration[]'  value='"+ schedBToCommit[i].txtSchedBTaxDeclaration +"'  maxlength='50' > </td> " +
          "<td width='15%' align='center'><input type='text' style='text-align:right' size='18' id='txtSchedBStranger"+i+"' name='txtSchedBStranger[]'  value='"+ schedBToCommit[i].txtSchedBStranger +"'  onblur='round(this,2); computeSumTaxB()' maxlength='25' onkeypress='return numbersonly(this, event)'/> </td> " +
          "<td width='15%' align='center'><input type='text' style='text-align:right' size='18' id='txtSchedBRelative"+i+"' name='txtSchedBRelative[]'  value='"+ schedBToCommit[i].txtSchedBRelative +"'  onblur='round(this,2); computeSumTaxB2()' maxlength='25' onkeypress='return numbersonly(this, event)'/> </td> " +
                    "</tr>");     
         setTimeout("setInputTextControl_HorizontalAlignment('txtSchedBStranger"+i+"',4 );d.getElementById('txtSchedBStranger"+i+"').value=d.getElementById('txtSchedBStranger"+i+"').value;",100);
        setTimeout("setInputTextControl_HorizontalAlignment('txtSchedBRelative"+i+"',4 );d.getElementById('txtSchedBRelative"+i+"').value=d.getElementById('txtSchedBRelative"+i+"').value;",100);
            }
    } 
  
    function addlistSchedB()
    {
        if(checkifEmptyFieldSchedB()) {
            var size = schedBToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                schedBToCommit[i].txtSchedBClassification = d.getElementById('txtSchedBClassification'+i).value;
        schedBToCommit[i].txtSchedBArea = d.getElementById('txtSchedBArea'+i).value;
        schedBToCommit[i].txtSchedBLocation = d.getElementById('txtSchedBLocation'+i).value;
        schedBToCommit[i].txtSchedBTaxDeclaration = d.getElementById('txtSchedBTaxDeclaration'+i).value;
                schedBToCommit[i].txtSchedBStranger = d.getElementById('txtSchedBStranger'+i).value;
        schedBToCommit[i].txtSchedBRelative = d.getElementById('txtSchedBRelative'+i).value;
            }
            i = schedBToCommit.length;
            schedBToCommit[i] = new ScheduleB();

      $('#tbodyllistSchedB').html("");
      
            for(i = 0; i < schedBToCommit.length; i++) {

         $('#tbodyllistSchedB').html(  d.getElementById('tbodyllistSchedB').innerHTML + "<tr height='25'>" +        
                    "<td width='5%' align='center'> <input type='checkbox' class='printButtonClass' id='chxschedB"+i+"' name='chxschedB"+i+"' /> </td>" +
                    "<td width='15%' align='center'> <input type='text' size='20'  id='txtSchedBClassification"+i+"' name='txtSchedBClassification[]' value='"+ schedBToCommit[i].txtSchedBClassification +"'  maxlength='50' > </td> " +
          "<td width='15%' align='center'> <input type='text' size='20' style='text-align: right' id='txtSchedBArea"+i+"' name='txtSchedBArea[]'  value='"+ schedBToCommit[i].txtSchedBArea +"'  maxlength='50' onkeypress='return numbersonly(this, event)' > </td> " +
          "<td width='20%' align='center'> <input type='text' size='30'  id='txtSchedBLocation"+i+"' name='txtSchedBLocation[]'  value='"+ schedBToCommit[i].txtSchedBLocation +"'  maxlength='50' > </td> " +
          "<td width='15%' align='center'> <input type='text' size='19'  id='txtSchedBTaxDeclaration"+i+"' name='txtSchedBTaxDeclaration[]'  value='"+ schedBToCommit[i].txtSchedBTaxDeclaration +"'  maxlength='50' > </td> " +
          "<td width='15%' align='center'><input type='text' style='text-align:right' size='18' id='txtSchedBStranger"+i+"' name='txtSchedBStranger[]'  value='"+ schedBToCommit[i].txtSchedBStranger +"'  onblur='round(this,2); computeSumTaxB()' maxlength='25' onkeypress='return numbersonly(this, event)'/> </td> " +
          "<td width='15%' align='center'><input type='text' style='text-align:right' size='18' id='txtSchedBRelative"+i+"' name='txtSchedBRelative[]'  value='"+ schedBToCommit[i].txtSchedBRelative +"'  onblur='round(this,2); computeSumTaxB2()' maxlength='25' onkeypress='return numbersonly(this, event)'/> </td> " +
                    "</tr>");         
            
                //setTimeout("setInputTextControl_HorizontalAlignment('txtSchedBStranger"+i+"',4 );setInputTextControl_NumberFormatterNonNegative('txtSchedBStranger"+i+"',12,2);d.getElementById('txtSchedBStranger"+i+"').value=d.getElementById('txtSchedBStranger"+i+"').value;",100);
        //setTimeout("setInputTextControl_HorizontalAlignment('txtSchedBRelative"+i+"',4 );setInputTextControl_NumberFormatterNonNegative('txtSchedBRelative"+i+"',12,2);d.getElementById('txtSchedBRelative"+i+"').value=d.getElementById('txtSchedBRelative"+i+"').value;",100);
        setTimeout("setInputTextControl_HorizontalAlignment('txtSchedBStranger"+i+"',4 );d.getElementById('txtSchedBStranger"+i+"').value=d.getElementById('txtSchedBStranger"+i+"').value;",100);
        setTimeout("setInputTextControl_HorizontalAlignment('txtSchedBRelative"+i+"',4 );d.getElementById('txtSchedBRelative"+i+"').value=d.getElementById('txtSchedBRelative"+i+"').value;",100);
            }
        }
    }

    function deletelistSchedB()
    {
        var schedBTemp = new Array();
        var i = 0;
        var size = schedBToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            schedBToCommit[i].txtSchedBClassification = d.getElementById('txtSchedBClassification'+i).value;
            schedBToCommit[i].txtSchedBArea = d.getElementById('txtSchedBArea'+i).value;
            schedBToCommit[i].txtSchedBLocation = d.getElementById('txtSchedBLocation'+i).value;
            schedBToCommit[i].txtSchedBTaxDeclaration = d.getElementById('txtSchedBTaxDeclaration'+i).value;
            schedBToCommit[i].txtSchedBStranger = d.getElementById('txtSchedBStranger'+i).value;
            schedBToCommit[i].txtSchedBRelative = d.getElementById('txtSchedBRelative'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxschedB" + j).checked) {
                schedBTemp[i++] = schedBToCommit[j];
            }
        }

        if(schedBTemp.length > 0) {
            schedBToCommit = new Array();
            schedBToCommit = schedBTemp;
      $('#tbodyllistSchedB').html("");

            for(i = 0; i < schedBTemp.length; i++) {
                schedBToCommit[i] = schedBTemp[i];
                //d.getElementById("tbodyllistSchedB").innerHTML += "<tr>" +
        $('#tbodyllistSchedB').html(  d.getElementById('tbodyllistSchedB').innerHTML + "<tr height='25'>" + 
                    "<td width='5%' align='center'> <input type='checkbox' class='printButtonClass' id='chxschedB"+i+"' /> </td>" +
                    "<td width='15%' align='center'> <input type='text' size='20'  id='txtSchedBClassification"+i+"' value='"+ schedBToCommit[i].txtSchedBClassification +"'  maxlength='50' > </td> " +
          "<td width='15%' align='center'> <input type='text' size='20' style='text-align: right' id='txtSchedBArea"+i+"' value='"+ schedBToCommit[i].txtSchedBArea +"'  maxlength='50' onkeypress='return numbersonly(this, event)' > </td> " +
          "<td width='20%' align='center'> <input type='text' size='30'  id='txtSchedBLocation"+i+"' value='"+ schedBToCommit[i].txtSchedBLocation +"'  maxlength='50' > </td> " +
          "<td width='15%' align='center'> <input type='text' size='19'  id='txtSchedBTaxDeclaration"+i+"' value='"+ schedBToCommit[i].txtSchedBTaxDeclaration +"'  maxlength='50' > </td> " +
          "<td width='15%' align='center'><input type='text' style='text-align:right' size='18' id='txtSchedBStranger"+i+"' value='"+ schedBToCommit[i].txtSchedBStranger +"'  onblur='round(this,2); computeSumTaxB()' maxlength='25' onkeypress='return numbersonly(this, event)'/> </td> " +
          "<td width='15%' align='center'><input type='text' style='text-align:right' size='18' id='txtSchedBRelative"+i+"' value='"+ schedBToCommit[i].txtSchedBRelative +"'  onblur='round(this,2); computeSumTaxB2()' maxlength='25' onkeypress='return numbersonly(this, event)'/> </td> " +
                    "</tr>");


                setTimeout("setInputTextControl_HorizontalAlignment('txtSchedBStranger"+i+"',4 );",100);
        setTimeout("setInputTextControl_HorizontalAlignment('txtSchedBRelative"+i+"',4 );",100);

            }
        } else {
            schedBToCommit = new Array();
      $('#tbodyllistSchedB').html("");
        }
        computeSumTaxB();
    computeSumTaxB2();
    } 
  
    function computeSumTaxB(){
        var size = schedBToCommit.length;
        var totalAmountTax = 0;
    
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtSchedBStranger' + i).value)*1 ;
    }
        d.getElementById('frm1800:totalStrangerB').value = formatCurrency(totalAmountTax);
    compute20();
    } 
  
  function computeSumTaxB2(){
        var size = schedBToCommit.length;
        var totalAmountTax = 0;
    
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtSchedBRelative' + i).value)*1 ;
    }
        d.getElementById('frm1800:totalRelativeB').value = formatCurrency(totalAmountTax);
    compute20();
    } 
  
    function checkifEmptyFieldSchedB() {

        var size = schedBToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtSchedBClassification'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 2.\n" +
                    "Empty fields are not allowed."); return ;
            } 
      if(d.getElementById('txtSchedBArea'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 2.\n" +
                    "Empty fields are not allowed."); return ;
            } 
      if(d.getElementById('txtSchedBLocation'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 2.\n" +
                    "Empty fields are not allowed."); return ;
            } 
      if(d.getElementById('txtSchedBTaxDeclaration'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 2.\n" +
                    "Empty fields are not allowed."); return ;
            } 
            if( d.getElementById('txtSchedBStranger'+ i).value <= 0 && d.getElementById('txtSchedBRelative'+ i).value <= 0) {
                alert("Please enter a valid amount on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
    }

        return true;
    } 
  
    function getSchedBModal(){
        if (checkifEmptyFieldSchedB() )
        {
       d.getElementById('formPaper').style.display = 'block';
       if ( $('#modalSchedB').css('display') != 'none' ) {
        $('#modalSchedB').hide('blind');
        $('#wrapper').css({ 'display':'block' });
       }
       $('#DummyTxt').html("Creator");
       $('#DummyTxt').html("");     

            d.getElementById('frm1800:txt19A').value  = d.getElementById('frm1800:totalStrangerB').value;
      d.getElementById('frm1800:txt19B').value  = d.getElementById('frm1800:totalRelativeB').value;

            //compute18P();
      compute20();
            isModalTurnOn = false;
        }
    }

    function clearSchedBModal() {
        var rowSizeschedB = d.getElementById("tblSchedB").rows.length - 1;

        for(var x = 0; x < rowSizeschedB; x++){
      if (d.getElementById('txtSchedBClassification'+ (x)) != null)
        d.getElementById('txtSchedBClassification'+ (x)).value = "";
      if (d.getElementById('txtSchedBArea'+ (x)) != null)
        d.getElementById('txtSchedBArea'+ (x)).value = "";
      if (d.getElementById('txtSchedBLocation'+ (x)) != null)
        d.getElementById('txtSchedBLocation'+ (x)).value = "";
      if (d.getElementById('txtSchedBTaxDeclaration'+ (x)) != null)
        d.getElementById('txtSchedBTaxDeclaration'+ (x)).value = "";
            if (d.getElementById('txtSchedBStranger'+ (x)) != null)
        d.getElementById('txtSchedBStranger'+ (x)).value = "0.00";
      if (d.getElementById('txtSchedBRelative'+ (x)) != null)
        d.getElementById('txtSchedBRelative'+ (x)).value = "0.00";
        }
    }

    function cancelSchedBModal() {
        //restoreTempschedAData();
    d.getElementById('formPaper').style.display = 'block';
  
    if ( $('#modalSchedB').css('display') != 'none' ) {
      $('#modalSchedB').hide('blind');    
    }
    $('#DummyTxt').html("Creator");
    $('#DummyTxt').html("");    
        isModalTurnOn = false;  
    } 
  
  function ScheduleB()
    {
        this.txtSchedBClassification = '';
    this.txtSchedBArea = '';
    this.txtSchedBLocation = '';
    this.txtSchedBTaxDeclaration = '';
        this.txtSchedBStranger = '0.00';
    this.txtSchedBRelative = '0.00';
    }
  
  function hideSchedB()
  {
    d.getElementById('formPaper').style.display = 'block';
        $('#modalSchedB').hide('blind');
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
  }


    //Validate Functions
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
        } else {
            e.value = '' + number.toFixed(0);
        }
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
    
  function compute20()
  {
    var tax18A = (NumWithComma(d.getElementById('frm1800:txt18A').value)*1);
        var tax19A = (NumWithComma(d.getElementById('frm1800:txt19A').value)*1);
    d.getElementById('frm1800:txt20A').value = formatCurrency(tax18A + tax19A);
    
    var tax18B = (NumWithComma(d.getElementById('frm1800:txt18B').value)*1);
        var tax19B = (NumWithComma(d.getElementById('frm1800:txt19B').value)*1);
    d.getElementById('frm1800:txt20B').value = formatCurrency(tax18B  + tax19B);  
    
    compute22();
  }
  
  function compute21()
  {
    var tax21B = (NumWithComma(d.getElementById('frm1800:txt21B').value)*1);
        var tax21E = (NumWithComma(d.getElementById('frm1800:txt21E').value)*1);
    var tax21H = (NumWithComma(d.getElementById('frm1800:txt21H').value)*1);
    d.getElementById('frm1800:txt21K').value = formatCurrency(tax21B  + tax21E + tax21H);
    
    var tax21C = (NumWithComma(d.getElementById('frm1800:txt21C').value)*1);
        var tax21F = (NumWithComma(d.getElementById('frm1800:txt21F').value)*1);
    var tax21I = (NumWithComma(d.getElementById('frm1800:txt21I').value)*1);
    d.getElementById('frm1800:txt21L').value = formatCurrency(tax21C  + tax21F + tax21I);
    
    compute22();
  }
  
  function compute22()
  {
    var tax20A = (NumWithComma(d.getElementById('frm1800:txt20A').value)*1);
        var tax21K = (NumWithComma(d.getElementById('frm1800:txt21K').value)*1);
    d.getElementById('frm1800:txt22A').value = formatCurrency(tax20A - tax21K);
    
    var tax20B = (NumWithComma(d.getElementById('frm1800:txt20B').value)*1);
        var tax21L = (NumWithComma(d.getElementById('frm1800:txt21L').value)*1);
    d.getElementById('frm1800:txt22B').value = formatCurrency(tax20B - tax21L);
    
    compute24();
  }
  
  function compute24()
  {
    var tax22A = (NumWithComma(d.getElementById('frm1800:txt22A').value)*1);
        var tax23A = (NumWithComma(d.getElementById('frm1800:txt23A').value)*1);
    d.getElementById('frm1800:txt24A').value = formatCurrency(tax22A  + tax23A);
    
    var tax22B = (NumWithComma(d.getElementById('frm1800:txt22B').value)*1);
        var tax23B = (NumWithComma(d.getElementById('frm1800:txt23B').value)*1);
    d.getElementById('frm1800:txt24B').value = formatCurrency(tax22B + tax23B); 
    
    compute25AB();
  }
  
  function compute25AB()
  {
    var tax24B = (NumWithComma(d.getElementById('frm1800:txt24B').value)*1);
    var tax24A = (NumWithComma(d.getElementById('frm1800:txt24A').value)*1);
    
    if (tax24B <= 0)
    {
      d.getElementById('frm1800:txt25B').value = 0;
    }
    else if (tax24B > 0 && tax24B <= 100000)
    {
        //d.getElementById('frm1800:txt25B').value = formatCurrency(tax24B);
        d.getElementById('frm1800:txt25B').value = 0;//formatCurrency(tax24B);
    }
    else if (tax24B > 100000 && tax24B <= 200000)
    {
      d.getElementById('frm1800:txt25B').value =  formatCurrency((1 * tax24B - 100000)*0.02);
    }
    else if(tax24B > 200000 && tax24B <= 500000)
    {
      d.getElementById('frm1800:txt25B').value =  formatCurrency(2000 + (1 * tax24B - 200000)*0.04);
    }
    else if(tax24B > 500000 && tax24B <= 1000000)
    {
      d.getElementById('frm1800:txt25B').value =  formatCurrency(14000 + (1 * tax24B - 500000)*0.06);
    }
    else if(tax24B > 1000000 && tax24B <= 3000000)
    {
      d.getElementById('frm1800:txt25B').value =  formatCurrency(44000 + (1 * tax24B - 1000000)*0.08);
    }
    else if(tax24B > 3000000 && tax24B <= 5000000)
    {
      d.getElementById('frm1800:txt25B').value =  formatCurrency(204000 + (1 * tax24B - 3000000)*0.1);
    }
    else if(tax24B > 5000000 && tax24B <= 10000000)
    {
      d.getElementById('frm1800:txt25B').value =  formatCurrency(404000 + (1 * tax24B - 5000000)*0.12);
    }
    else if(tax24B > 10000000)
    {
      d.getElementById('frm1800:txt25B').value =  formatCurrency(1004000 + (1 * tax24B - 10000000)*0.15);
    }
    if(tax24A <= 0)
    {
      d.getElementById('frm1800:txt25A').value = 0;
    }
    else if(tax24A > 0)
    d.getElementById('frm1800:txt25A').value = formatCurrency(1 * tax24A * 0.3);
    compute25C();
  }
  
  function compute25C()
  {
    var tax25A = NumWithComma(d.getElementById('frm1800:txt25A').value)*1;
        var tax25B = NumWithComma(d.getElementById('frm1800:txt25B').value)*1;
    d.getElementById('frm1800:txt25C').value = formatCurrency(tax25A  + tax25B);
    compute27();
  }
  
  function compute26D()
  {
    var tax26A = NumWithComma(d.getElementById('frm1800:txt26A').value)*1;
        var tax26B = NumWithComma(d.getElementById('frm1800:txt26B').value)*1;
    var tax26C = NumWithComma(d.getElementById('frm1800:txt26C').value)*1;
    d.getElementById('frm1800:txt26D').value = formatCurrency(tax26A  + tax26B + tax26C);
    compute27();
  }
  function compute27()
  {
    var tax25C = NumWithComma(d.getElementById('frm1800:txt25C').value)*1;
        var tax26D = NumWithComma(d.getElementById('frm1800:txt26D').value)*1;
    d.getElementById('frm1800:txt27').value = formatCurrency(tax25C - tax26D);
    compute29();
  }
  function computeTotalPenalties()
  {
    var tax28a = NumWithComma(d.getElementById('frm1800:txtSurcharge').value)*1;
        var tax28b = NumWithComma(d.getElementById('frm1800:txtInterest').value)*1;
        var tax28c = NumWithComma(d.getElementById('frm1800:txtCompromise').value)*1;
        d.getElementById('frm1800:txtTotalPenalties').value =   formatCurrency(tax28a  + tax28b + tax28c);
    
    compute29();
  }
  
  function compute29()
  {
    var tax27 = NumWithComma(d.getElementById('frm1800:txt27').value)*1;
        var tax28D = NumWithComma(d.getElementById('frm1800:txtTotalPenalties').value)*1;
    d.getElementById('frm1800:txt29').value = formatCurrency(tax27  + tax28D);
    //d.getElementById('frm1800:txt29').value = formatCurrency(tax27);
    
    if (NumWithComma(d.getElementById('frm1800:txt29').value)*1 < 0) {
      enableRadiosIf29IsPosi();
    } else {
      disableRadiosIf29IsNega();
    }
    
    capital();
  }
  
  function disableRadiosIf29IsNega() { 
    d.getElementById('frm1800:opt37:_1').disabled = true;
    d.getElementById('frm1800:opt37:_2').disabled = true;   
    d.getElementById('frm1800:opt37:_1').checked = false;
    d.getElementById('frm1800:opt37:_2').checked = false;     
  }
  function enableRadiosIf29IsPosi() { 
    d.getElementById('frm1800:opt37:_1').disabled = false;
    d.getElementById('frm1800:opt37:_2').disabled = false;    
  }    

    //Validate, Edit, Submit
    function validateForm()
    {
        var dt = new Date();
    var strDonor  = d.getElementById('frm1800:txtDonorTIN1').value + d.getElementById('frm1800:txtDonorTIN2').value + d.getElementById('frm1800:txtDonorTIN3').value + d.getElementById('frm1800:txtDonorBranchCode').value;
    var strDonee1 = d.getElementById('frm1800:txtDonee1TIN1').value + d.getElementById('frm1800:txtDonee1TIN2').value + d.getElementById('frm1800:txtDonee1TIN3').value + d.getElementById('frm1800:txtDonee1BranchCode').value;
    var strDonee2 = d.getElementById('frm1800:txtDonee2TIN1').value + d.getElementById('frm1800:txtDonee2TIN2').value + d.getElementById('frm1800:txtDonee2TIN3').value + d.getElementById('frm1800:txtDonee2BranchCode').value;
    var isLeap = new Date(document.getElementById('frm1800:txtDateYear').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm1800:txtDateMonth').value==2 && document.getElementById('frm1800:txtDateDay').value==29) {
      alert("Filing year is not a leap year.");
      return;
    }
    if (!isLeap && document.getElementById('frm1800:txtDateMonth').value==2 && document.getElementById('frm1800:txtDateDay').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    if (isLeap && document.getElementById('frm1800:txtDateMonth').value==2 && document.getElementById('frm1800:txtDateDay').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    
          if( d.getElementById('frm1800:txtDateMonth').value*1 > 12   )
        {
            alert("Invalid month entry on Item no.1. Please enter a valid month.")
            return;
        }
    if( (d.getElementById('frm1800:txtDateMonth').value == "")  )
        {
            alert("Please enter a valid month on Item 1.");
            return;
        }
    if(document.getElementById('frm1800:txtDateMonth').value.length == 1 || document.getElementById('frm1800:txtDateDay').value.length == 1)
    {
      alert("Please enter a valid day/month on item 1. Format should be MM/DD/YYYY.")
            return;
    }
  
    if( (d.getElementById('frm1800:txtDateDay').value == "")  )
        {
            alert("Please enter a valid day on Item 1.");
            return;
        }
    if( (d.getElementById('frm1800:txtDateYear').value == "")  )
        {
            alert("Please enter a valid year on Item 1.");
            return;
        }
    
    
    if(d.getElementById('frm1800:txtDateDay').value < 1){
            alert("Please enter a valid day in Item 1.");
            return;
        }
    
    //Check if valid date - Benjie Manalaysay 11/5/2013
    var month31 = (['01', '03', '05', '07', '08', '10', '12']);
    var month30 = (['04', '06', '09', '11']);
    var month = document.getElementById('frm1800:txtDateMonth').value
    if (month31.contains(month) && document.getElementById('frm1800:txtDateDay').value > 31)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    else if (month30.contains(month) && document.getElementById('frm1800:txtDateDay').value > 30)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    
        if( d.getElementById('frm1800:txtDateYear').value*1 < 1904   )
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1904.")
            return;
        }
    
    if( (d.getElementById('frm1800:txtDonorTIN1').value == "")  )
    {
      alert("Please enter the Donor's TIN.")
      return;
    }
    if( (d.getElementById('frm1800:txtDonorTIN2').value == "")  )
    {
      alert("Please enter the Donor's TIN.")
      return;
    }
    if( (d.getElementById('frm1800:txtDonorTIN3').value == "")  )
    {
      alert("Please enter the Donor's TIN.")
      return;
    }
    if( (d.getElementById('frm1800:txtDonorBranchCode').value == "")  )
    {
      alert("Please enter the Donor's TIN.")
      return;
    }
    
    if (strDonor.length < 12) {
      alert("Please enter a valid TIN on item 5.")
      return;   
    }
    
    
    if( (d.getElementById('frm1800:txtTelNum').value == "")  )
    {
      alert("Please enter Telephone Number on item 7.")
      return;
    }
    
    if( (d.getElementById('frm1800:txtDonorName').value == "")  )
    {
      alert("Please enter the Donor's Name.")
      return;
    }
    if( (d.getElementById('frm1800:txtAddress1').value == "")  )
    {
      alert("Please enter the Donor's Address.")
      return;
    }
    
    if( (d.getElementById('frm1800:txtZipCode1').value == "")  )
    {
      alert("Please enter Zip Code on item 9A.")
      return;
    }
    
    if (strDonee1.length < 12 && strDonee2.length == 0) {
      alert("Please enter a valid TIN on item 11.")
      return;   
    }   
    if( (d.getElementById('frm1800:txtDonee1TIN1').value != "" && d.getElementById('frm1800:txtDonee1TIN2').value != "" && d.getElementById('frm1800:txtDonee1TIN3').value != "" && d.getElementById('frm1800:txtDonee1BranchCode').value != "")  
    && (d.getElementById('frm1800:txtRelationshipDonee1').value == "" || d.getElementById('frm1800:txtDonee1Name').value == "" ))
    {
      alert("Please fill up items 12 and 13.")
      return;
    }
    if( (d.getElementById('frm1800:txtDonee2TIN1').value != "" || d.getElementById('frm1800:txtDonee2TIN2').value != "" || d.getElementById('frm1800:txtDonee2TIN3').value != "" || d.getElementById('frm1800:txtDonee2BranchCode').value != "")  ) 
    {
      if (strDonee2.length < 12) {
        alert("Please enter a valid TIN on item 14.")
        return;   
      }
      if( (d.getElementById('frm1800:txtDonee2TIN1').value != "" && d.getElementById('frm1800:txtDonee2TIN2').value != "" && d.getElementById('frm1800:txtDonee2TIN3').value != "" && d.getElementById('frm1800:txtDonee2BranchCode').value != "")  
      && (d.getElementById('frm1800:txtRelationshipDonee2').value == "" || d.getElementById('frm1800:txtDonee2Name').value == "" ))
      {
        alert("Please fill up items 15 and 16.")
        return;
      }
    }
    if( (d.getElementById('frm1800:txtDonee2TIN1').value == "" && d.getElementById('frm1800:txtDonee2TIN2').value == "" && d.getElementById('frm1800:txtDonee2TIN3').value == "" && d.getElementById('frm1800:txtDonee2BranchCode').value == "")  
      && (d.getElementById('frm1800:txtRelationshipDonee2').value != "" || d.getElementById('frm1800:txtDonee2Name').value != "" ))
      {
        alert("Please fill up item 14.")
        return;
      }
    

    if (strDonor.localeCompare(strDonee1) == 0 || strDonor.localeCompare(strDonee2) == 0 ) {
      alert("TIN for Donor and Donee should be different.")
      return;   
    }
    
    if(d.getElementById('frm1800:rdTreaty:_1').checked && d.getElementById('frm1800:selTreaty').selectedIndex == 0)
    {
      alert("Please specify your Tax Relief on item 17.");
      return;
    }
    
    if (d.getElementById('frm1800:txt20A').value == 0 && d.getElementById('frm1800:txt20B').value == 0)
    {
      alert("Please fill up Schedule A/B.")
      return;
    }
    if (((d.getElementById('frm1800:txt21A').value != "") && (d.getElementById('frm1800:txt21B').value <= 0 && d.getElementById('frm1800:txt21C').value <= 0))
    || ((d.getElementById('frm1800:txt21A').value == "") && (d.getElementById('frm1800:txt21B').value > 0 || d.getElementById('frm1800:txt21C').value > 0)))
    {
      alert("Please enter a description or amount on items 21A/21B/21C.")
      return;
    }
    if (((d.getElementById('frm1800:txt21D').value != "") && (d.getElementById('frm1800:txt21E').value <= 0 && d.getElementById('frm1800:txt21F').value <= 0))
    || ((d.getElementById('frm1800:txt21D').value == "") && (d.getElementById('frm1800:txt21E').value > 0 || d.getElementById('frm1800:txt21F').value > 0)))
    {
      alert("Please enter a description or amount on items 21D/21E/21F.")
      return;
    }
    if (((d.getElementById('frm1800:txt21G').value != "") && (d.getElementById('frm1800:txt21H').value <= 0 && d.getElementById('frm1800:txt21I').value <= 0))
    || ((d.getElementById('frm1800:txt21G').value == "") && (d.getElementById('frm1800:txt21H').value > 0 || d.getElementById('frm1800:txt21I').value > 0)))
    {
      alert("Please enter a description or amount on items 21G/21H/21I.")
      return;
    }
    if((d.getElementById('frm1800:txt29').value < 0) && (!d.getElementById('frm1800:opt37:_1').checked && !d.getElementById('frm1800:opt37:_2').checked))
    {
      alert("Please select if it's 'To be refunded' or 'To be issued a Tax Credit Certificate'.")
      return;
    }
    
    d.getElementById('frm1800:cmdValidate').disabled = true;
    d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm1800:cmdEdit').disabled = false;
    d.getElementById('frm1800:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;
  
    disableForm();  
    alert("Validation successful. Click on Edit if you wish to modify your entries.");
    return;

  }
  
  var disableElem = true;
  var enableElem = false;
  function disableForm()
  {
    d.getElementById('frm1800:txtDateMonth').disabled = true;
    d.getElementById('frm1800:txtDateDay').disabled = true;
    d.getElementById('frm1800:txtDateYear').disabled = true;
    d.getElementById('frm1800:amendedRtn_1').disabled = true;
    d.getElementById('frm1800:amendedRtn_2').disabled = true;
    d.getElementById('frm1800:txtSheets').disabled = true;
    d.getElementById('frm1800:txtDonorTIN1').disabled = true;
    d.getElementById('frm1800:txtDonorTIN2').disabled = true;
    d.getElementById('frm1800:txtDonorTIN3').disabled = true;
    d.getElementById('frm1800:txtDonorBranchCode').disabled = true;
    d.getElementById('frm1800:txtRDOCode').disabled = true;
    d.getElementById('frm1800:txtTelNum').disabled = true;
    d.getElementById('frm1800:txtDonorName').disabled = true;
    d.getElementById('frm1800:txtAddress1').disabled = true;
    d.getElementById('frm1800:txtZipCode1').disabled = true;
    d.getElementById('frm1800:txtAddress2').disabled = true;
    d.getElementById('frm1800:txtZipCode2').disabled = true;
    d.getElementById('frm1800:txtDonee1TIN1').disabled = true;
    d.getElementById('frm1800:txtDonee1TIN2').disabled = true;
    d.getElementById('frm1800:txtDonee1TIN3').disabled = true;
    d.getElementById('frm1800:txtDonee1BranchCode').disabled = true;
    d.getElementById('frm1800:txtRelationshipDonee1').disabled = true;
    d.getElementById('frm1800:txtDonee1Name').disabled = true;
    d.getElementById('frm1800:txtDonee2TIN1').disabled = true;
    d.getElementById('frm1800:txtDonee2TIN2').disabled = true;
    d.getElementById('frm1800:txtDonee2TIN3').disabled = true;
    d.getElementById('frm1800:txtDonee2BranchCode').disabled = true;
    d.getElementById('frm1800:txtRelationshipDonee2').disabled = true;
    d.getElementById('frm1800:txtDonee2Name').disabled = true;
    d.getElementById('frm1800:rdTreaty:_1').disabled = true;
    d.getElementById('frm1800:rdTreaty:_2').disabled = true;
    d.getElementById('frm1800:selTreaty').disabled = true;
    d.getElementById('btnSchedA').disabled = true;
    d.getElementById('btnSchedB').disabled = true;
   
    d.getElementById('frm1800:txt21A').disabled = true;
    d.getElementById('frm1800:txt21B').disabled = true;
    d.getElementById('frm1800:txt21C').disabled = true;
    d.getElementById('frm1800:txt21D').disabled = true;
    d.getElementById('frm1800:txt21E').disabled = true;
    d.getElementById('frm1800:txt21F').disabled = true;
    d.getElementById('frm1800:txt21G').disabled = true;
    d.getElementById('frm1800:txt21H').disabled = true;
    d.getElementById('frm1800:txt21I').disabled = true;
    d.getElementById('frm1800:txt23A').disabled = true;
    d.getElementById('frm1800:txt23B').disabled = true;
    d.getElementById('frm1800:txt26A').disabled = true;
    d.getElementById('frm1800:txt26B').disabled = true;
    d.getElementById('frm1800:txt26C').disabled = true;
    d.getElementById('frm1800:txtSurcharge').disabled = true;
    d.getElementById('frm1800:txtInterest').disabled = true;
    d.getElementById('frm1800:txtCompromise').disabled = true;
    d.getElementById('frm1800:opt37:_1').disabled = true;
    d.getElementById('frm1800:opt37:_2').disabled = true;
    disableElem;
    enableElem;
  }
  
    function editForm()
    {
        d.getElementById('frm1800:cmdValidate').disabled = false;
    d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1800:cmdEdit').disabled = true;
    d.getElementById('frm1800:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
    enableForm();
    d.getElementById('frm1800:txtDonorTIN1').disabled = true;
      d.getElementById('frm1800:txtDonorTIN2').disabled = true;
    d.getElementById('frm1800:txtDonorTIN3').disabled = true;
    d.getElementById('frm1800:txtDonorBranchCode').disabled = true;
  }
  
  function enableForm()
  {
    d.getElementById('frm1800:txtDateMonth').disabled = false;
    d.getElementById('frm1800:txtDateDay').disabled = false;
    d.getElementById('frm1800:txtDateYear').disabled = false;
    d.getElementById('frm1800:amendedRtn_1').disabled = false;
    d.getElementById('frm1800:amendedRtn_2').disabled = false;
    d.getElementById('frm1800:txtSheets').disabled = false;
    d.getElementById('frm1800:txtDonorTIN1').disabled = false;
    d.getElementById('frm1800:txtDonorTIN2').disabled = false;
    d.getElementById('frm1800:txtDonorTIN3').disabled = false;
    d.getElementById('frm1800:txtDonorBranchCode').disabled = false;
    d.getElementById('frm1800:txtRDOCode').disabled = false;
    d.getElementById('frm1800:txtTelNum').disabled = false;
    d.getElementById('frm1800:txtDonorName').disabled = false;
    d.getElementById('frm1800:txtAddress1').disabled = false;
    d.getElementById('frm1800:txtZipCode1').disabled = false;
    d.getElementById('frm1800:txtAddress2').disabled = false;
    d.getElementById('frm1800:txtZipCode2').disabled = false;
    d.getElementById('frm1800:txtDonee1TIN1').disabled = false;
    d.getElementById('frm1800:txtDonee1TIN2').disabled = false;
    d.getElementById('frm1800:txtDonee1TIN3').disabled = false;
    d.getElementById('frm1800:txtDonee1BranchCode').disabled = false;
    d.getElementById('frm1800:txtRelationshipDonee1').disabled = false;
    d.getElementById('frm1800:txtDonee1Name').disabled = false;
    d.getElementById('frm1800:txtDonee2TIN1').disabled = false;
    d.getElementById('frm1800:txtDonee2TIN2').disabled = false;
    d.getElementById('frm1800:txtDonee2TIN3').disabled = false;
    d.getElementById('frm1800:txtDonee2BranchCode').disabled = false;
    d.getElementById('frm1800:txtRelationshipDonee2').disabled = false;
    d.getElementById('frm1800:txtDonee2Name').disabled = false;
    d.getElementById('frm1800:rdTreaty:_1').disabled = false;
    d.getElementById('frm1800:rdTreaty:_2').disabled = false;
    if(d.getElementById('frm1800:rdTreaty:_1').checked){
      d.getElementById('frm1800:selTreaty').disabled = false;
    }
    else{
      d.getElementById('frm1800:selTreaty').disabled = true;
    }
    d.getElementById('btnSchedA').disabled = false;
    d.getElementById('btnSchedB').disabled = false;
    d.getElementById('frm1800:txt21A').disabled = false;
    d.getElementById('frm1800:txt21B').disabled = false;
    d.getElementById('frm1800:txt21C').disabled = false;
    d.getElementById('frm1800:txt21D').disabled = false;
    d.getElementById('frm1800:txt21E').disabled = false;
    d.getElementById('frm1800:txt21F').disabled = false;
    d.getElementById('frm1800:txt21G').disabled = false;
    d.getElementById('frm1800:txt21H').disabled = false;
    d.getElementById('frm1800:txt21I').disabled = false;
    d.getElementById('frm1800:txt23A').disabled = false;
    d.getElementById('frm1800:txt23B').disabled = false;
    d.getElementById('frm1800:txt26A').disabled = false;
    d.getElementById('frm1800:txt26B').disabled = false;
    
    enableDisable26ConEdit();
    //d.getElementById('frm1800:txt26C').disabled = false;    
    
    d.getElementById('frm1800:txtSurcharge').disabled = false;
    d.getElementById('frm1800:txtInterest').disabled = false;
    d.getElementById('frm1800:txtCompromise').disabled = false;
    if (NumWithComma(d.getElementById('frm1800:txt29').value)*1 < 0) {
      d.getElementById('frm1800:opt37:_1').disabled = false;
      d.getElementById('frm1800:opt37:_2').disabled = false;  
    }
    else{
      d.getElementById('frm1800:opt37:_1').disabled = true;
      d.getElementById('frm1800:opt37:_2').disabled = true;
    }
    if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
      d.getElementById('frm1800:txtDateMonth').disabled = true;
      d.getElementById('frm1800:txtDateYear').disabled = true;
      d.getElementById('frm1800:txtDateDay').disabled = true; 
    }
    disableElem;
    enableElem;
  }
  
  
  function enableDisable26ConEdit()
  {
    if (d.getElementById('frm1800:amendedRtn_1').checked == true)
    {
      d.getElementById('frm1800:txt26C').disabled = false;
    }
    else if (d.getElementById('frm1800:amendedRtn_2').checked == true)
    {
      d.getElementById('frm1800:txt26C').disabled = true;
      d.getElementById('frm1800:txt26C').value = 0.00;
    }

  } 

  function setInputTextControl_HorizontalAlignment(id,align) {
    if (d.getElementById(id) != null) {
      //d.getElementById(id).textIndent = parseInt(align);
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
  
  function initialValidateBeforeSave() {
    if( (d.getElementById('frm1800:txtDonorTIN1').value == "")  )
    {
      alert("Please enter the Donor's TIN.")
      return false;
    }
    if( (d.getElementById('frm1800:txtDonorTIN2').value == "")  )
    {
      alert("Please enter the Donor's TIN.")
      return false;
    }
    if( (d.getElementById('frm1800:txtDonorTIN3').value == "")  )
    {
      alert("Please enter the Donor's TIN.")
      return false;
    }
    if( (d.getElementById('frm1800:txtDonorBranchCode').value == "")  )
    {
      alert("Please enter the Donor's TIN.")
      return false;
    }
    
    if( (d.getElementById('frm1800:txtDonorName').value == "")  )
    {
      alert("Please enter the Donor's Name.")
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
  $('.printSignFooterClass_1800').css({ 'width':'100%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'avoid', 'background':'#ffffff' });  
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
      
    }
    } 
    
    $('.printButtonClass').hide();
    $("#formPaper").show();
    $('#formPaper').css({'margin-top':'-100px' });

    window.print();

    $('.printButtonClass').show();
    $("#formPaper").show();
    $("#modalSchedA").hide();
    $("#modalSchedB").hide();
    $('#formPaper').css({'border':'#a7a7a7 1px solid','margin-top':'0px' });
    $('.imgClass').css({ 'display':'none'});
    $('.printSignFooterClass_1800').css({ 'width':'75%'});

}

    function saveData()
        {
            var valid = initialValidateBeforeSave();
            if(valid == true){
                    var form = $('#frmMain');
                    var disabled = form.find(':input:disabled').removeAttr('disabled');
                    
                    var data = form.serialize();
                    save('1800',data);
                    
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
            saveAndExit('1800',data);
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

            submitAndSave('1800', data, company_id);
            
            disabled.attr('disabled','disabled');
            return false;
        }

        function gotoMain(){
            var company_id = $('#frmMain').find('input[name="company"]').val();
            window.location = '/companies/'+ company_id +'/histories/1800';
        }

</script>
@endsection