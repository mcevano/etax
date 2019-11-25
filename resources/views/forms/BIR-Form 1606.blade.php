@extends('layouts.app')
@section('title', '| BIR Form No. 1606')

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
        <button type="button" class="btn btn-danger btn-exit" id="1606" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1606" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1606' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0pt auto; position: relative; width: 1075px;">
      
        <table border="0" width="996" cellspacing="0" cellpadding="0" align="center" style=" background-repeat: repeat-x;">
        <tr><td>
      
                <div id="formPaper">
                    <div id="mainContent1606">
                        <table border="0" cellpadding="0" cellspacing="0" width="996">
                            <tbody><tr>
                                <td>
                                    <table style="height: 0px;" border="0" cellpadding="0" cellspacing="0" width="996">
                                        <tr>
                                            <td width="82"  style='padding:0px;' valign="middle" align="center">                    
                                                <p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p>
                                            </td>
                                            <td valign="middle" width="158">
                                                <label face="Arial" size="1px">Republika ng Pilipinas
                                            <br/>Kagawaran ng Pananalapi
                                            <br/>Kawanihan ng Rentas Internas</label>
                                            </td>
                                            <td valign="top" width="323">
                                                <font size="6px" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;Withholding Tax<br/>&nbsp;Remittance Return</font>
                                            </td>
                                            <td valign="center" width="145">
                                                <label face="Arial" size="1px">BIR Form No.</label><br/>
                                                <font face="Arial" size="6px">1606</font><br/>
                                                <label face="Arial" size="1px">July 1999 (ENCS)</label>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="tblForm" border="0" cellpadding="0" cellspacing="0" width="990">
                                        <tbody>
                                        <tr>
                                            <td colspan="4" height="0" style="background-color: rgb(255, 255, 255);"><label size="1px" face="Arial, Helvetica, sans-serif">For Onerous Transfer of Real Property Other<br/>than Capital Asset (Including Taxable and Exempt)</label></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="tblFormTd" valign="top" width="201">
                                                <table style="height: 29px;">
                                                    <tbody><tr>
                                                        <td height="23" width="190"><table border="0" cellpadding="0" cellspacing="0">
                                                                <tbody><tr>
                                                                    <td width="15"><font style="font-weight: bold;" size="2">&nbsp;1&nbsp;</font></td>
                                                                    <td width="176"><font size="1" style="font-size: 11px;">Date of Transaction (MM/DD/YYYY) </font></td>
                                                                </tr>
                                                            </tbody></table>
                            </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="23"><input id="frm1606:txtDateMonth" name="frm1606:txtDateMonth" maxlength="2" size="2" style="text-align: right;" value="" onkeypress="return wholenumber(this, event)" title="Please supply a valid month." type="text">
                                    <input id="frm1606:txtDateDay" name="frm1606:txtDateDay" maxlength="2" size="2" style="text-align: right;" value="" onkeypress="return wholenumber(this, event)" title="Please supply a valid day." type="text">
                                    <input id="frm1606:txtDateYear" name="frm1606:txtDateYear" maxlength="4" size="4" style="text-align: right;" value="" onkeypress="return wholenumber(this, event)" title="Please supply a valid year." type="text">
                            </td>
                                                    </tr>
                                                </tbody></table>
                      </td>
                                            <td class="tblFormTd" valign="top" width="160">
                                                <table border="0" cellpadding="0" cellspacing="0" width="146">
                                                    <tbody><tr>
                                                        <td width="11"><font style="font-weight: bold;" size="2">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1606:j_id217" class="iceSelOneRb-dis fieldText1-dis">
                                                                <div style="padding: 5px 0pt;" align="center">
                                                                    <table class="iceSelOneRb-dis fieldText1-dis" border="0" cellpadding="0" cellspacing="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input value="Y" name="frm1606:j_id217" id="frm1606:j_id217:_1" onclick="document.getElementById('frm1606:txtLess').disabled = false;" type="radio"><label for="frm1606:j_id217:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size: 12px;">Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                <td><input value="N" name="frm1606:j_id217" id="frm1606:j_id217:_2" onclick="document.getElementById('frm1606:txtLess').disabled = true; d.getElementById('frm1606:txtLess').value = '0.00'; computeTaxDue();" checked="checked" type="radio"><label for="frm1606:j_id217:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size: 12px;">No</label></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                            <td class="tblFormTd" valign="top" width="100">
                                                <table border="0" cellpadding="0" cellspacing="0" width="152">
                                                    <tbody><tr>
                                                        <td width="11"><font style="font-weight: bold;" size="2">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">No. of Sheets Attached?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input value="0" style="text-align: right;" size="4" name="frm1606:txtSheets" maxlength="2" id="frm1606:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" type="text"></td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                            <td class="tblFormTd" valign="top" width="150">
                                                <table border="0" cellpadding="0" cellspacing="0" width="140">
                                                    <tbody><tr>
                                                        <td width="11"><font style="font-weight: bold;" size="2">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Any Taxes Withheld?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1606:j_id252" class="iceSelOneRb fieldText1">
                                                                <div style="padding: 5px 0pt;" align="center">
                                                                    <table class="iceSelOneRb fieldText1" border="0" cellpadding="0" cellspacing="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input value="Y" name="frm1606:j_id252" id="frm1606:j_id252:_1" type="radio" onclick="enablePart2()" /><label for="frm1606:j_id252:_1" style="font-size: 12px;">Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                <td><input value="N" name="frm1606:j_id252" id="frm1606:j_id252:_2" type="radio" onclick="disablePart2()" /><label for="frm1606:j_id252:_2" style="font-size: 12px;">No</label></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="tblForm" border="0" cellpadding="0" cellspacing="0" width="990">
                                        <tbody><tr>
                                            <td class="tblFormTdPart">
                                                <table style="height: 22px;" border="0" cellpadding="0" cellspacing="0" width="721">
                                                    <tbody><tr>
                                                        <td width="12%">&nbsp;&nbsp;&nbsp;<font style="font-weight: bold;" size="2">Part I</font></td>
                                                        <td width="88%">
                                                            <div align="center"><font style="font-weight: bold; letter-spacing: 3px;" size="2">Background Information</font></div>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="tblForm" border="0" cellpadding="0" cellspacing="0" width="990">
                                        <tbody><tr>
                                            <td class="tblFormTd" valign="top" width="415">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                        <td width="11"><font style="font-weight: bold;" size="2">&nbsp;5&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">TIN Buyer&nbsp;</font>
                                                            <font face="Arial" size="2">
                                                            <input value="{{$company->tin1}}" disabled="" size="3" name="frm1606:txtTIN1" maxlength="3" id="frm1606:txtTIN1" onkeypress="return wholenumber(this, event)" type="text">
                                                            <input value="{{$company->tin2}}"  disabled="" size="3" name="frm1606:txtTIN2" maxlength="3" id="frm1606:txtTIN2" onkeypress="return wholenumber(this, event)" type="text">
                                                            <input value="{{$company->tin3}}"  disabled="" size="3" name="frm1606:txtTIN3" maxlength="3" id="frm1606:txtTIN3" onkeypress="return wholenumber(this, event)" type="text">
                                                            <input value="{{$company->tin4}}" disabled=""  size="3" name="frm1606:txtBranchCode" maxlength="3" id="frm1606:txtBranchCode" type="text" onkeypress="return letternumber(event)">
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                            <td class="tblFormTd" valign="top" width="200">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                        <td width="100"><font style="font-weight: bold;" size="2">&nbsp;6&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                        <td id="rdoSelect">
                                                            <select class='iceSelOneMnu' disabled=""  id='frm1606:txtRDOCode' name='frm1606:txtRDOCode' size='1' >
                                                            <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                            <td class="tblFormTd" valign="top" width="415">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                        <td width="11"><font style="font-weight: bold;" size="2">&nbsp;7&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">TIN Seller&nbsp;</font>
                                                            <font face="Arial" size="2">
                                                            <input value="" size="4" name="frm1606:txtTINS1" maxlength="3" id="frm1606:txtTINS1" onkeypress="return wholenumber(this, event)" type="text">
                                                            <input value="" size="4" name="frm1606:txtTINS2" maxlength="3" id="frm1606:txtTINS2" onkeypress="return wholenumber(this, event)" type="text">
                                                            <input value="" size="4" name="frm1606:txtTINS3" maxlength="3" id="frm1606:txtTINS3" onkeypress="return wholenumber(this, event)" type="text">
                                                            <input value="" size="3" name="frm1606:txtBranchCodeS" maxlength="3" id="frm1606:txtBranchCodeS" type="text" onkeypress="return letternumber(event)">
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                      <td class="tblFormTd" valign="top" width="200">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                        <td width="100"><font style="font-weight: bold;" size="2">&nbsp;8&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                        <td id="rdoSelect2">
                                                            
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="tblForm" border="0" cellpadding="0" cellspacing="0" width="990">
                                        <tbody><tr>
                                            <td class="tblFormTd" valign="top" width="50%">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tbody><tr>
                                                                    <td width="8"><font style="font-weight: bold;" size="2">&nbsp;9&nbsp;</font></td>
                                                                    <td><label size="1" style="font-size: 11px;">Buyer's Name (Last Name, First Name, Middle Name for Individual) /(Registered Name for Non-Individual)</label></td>
                                                                </tr>
                                                            </tbody></table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tbody><tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input  disabled=""  value="{{$company->registered_name}}" size="60" name="frm1606:txtBuyerName" maxlength="50" id="frm1606:txtBuyerName" onblur="return capital(this, event)" type="text"></td>
                                                                </tr>
                                                            </tbody></table>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                            <td class="tblFormTd" valign="top" width="50%">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tbody><tr>
                                                                    <td width="8"><font style="font-weight: bold;" size="2">&nbsp;10&nbsp;</font></td>
                                                                    <td><label size="1" style="font-size: 11px;">Seller's Name (Last Name, First Name, Middle Name for Individual) /(Registered Name for Non-Individual)</label></td>
                                                                </tr>
                                                            </tbody></table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tbody><tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input value="" size="60" name="frm1606:txtSellerName" maxlength="50" id="frm1606:txtSellerName" onblur="return capital(this, event)" type="text"></td>
                                                                </tr>
                                                            </tbody></table>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="tblForm" border="0" cellpadding="0" cellspacing="0" width="990">
                                        <tbody><tr>
                                            <td class="tblFormTd" valign="top" width="50%">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tbody><tr>
                                                                    <td width="11"><font style="font-weight: bold;" size="2">&nbsp;11&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Buyer's Registered Address</font></td>
                                                                </tr>
                                                            </tbody></table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tbody><tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input  disabled=""  value="{{$company->address}}" size="60" name="frm1606:txtBuyerAddress" maxlength="70" id="frm1606:txtBuyerAddress" onblur="return capital(this, event)" type="text"></td>
                                                                </tr>
                                                            </tbody></table>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                            <td class="tblFormTd" valign="top" width="50%">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tbody><tr>
                                                                    <td width="11"><font style="font-weight: bold;" size="2">&nbsp;12&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Seller's Registered Address</font></td>
                                                                </tr>
                                                            </tbody></table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0">
                                                                <tbody><tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input value="" size="60" name="frm1606:txtSellerAddress" maxlength="70" id="frm1606:txtSellerAddress" onblur="return capital(this, event)" type="text"></td>
                                                                </tr>
                                                            </tbody></table>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="tblForm" style="height: 23px;" border="0" cellpadding="0" cellspacing="0" width="990">
                                        <tbody><tr>
                    <td class="tblFormTd" valign="top" width="204">
                                            <table border="0" cellpadding="0" cellspacing="0" width="174">
                                                <tbody><tr>
                                                    <td width="43">
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tbody><tr>
                                                                <td width="22"><font style="font-weight: bold;" size="2">&nbsp;13&nbsp;</font></td>
                                                                <td width="33"><font size="1" style="font-size: 11px;">ATC&nbsp;</font></td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                                <tr>
                        <td width="25">&nbsp;</td>
                                                    <td height="21" nowrap="nowrap" width="36">
                                                        <input disabled="disabled" id="frm1606:txt13" name="frm1606:txt13" maxlength="5" size="6" style="background-color: rgb(220, 220, 220);" value="WI155" type="text">
                                                    </td>
                                                    <td><font size="1" style="font-size: 11px;">&nbsp;Individual&nbsp;</font></td>
                                                    <td>
                                                        <input id="frm1606:optATC13_2" name="frm1606:optATC13" value="WI155" type="radio">
                                                        <label for="frm1606:optATC13_2"> </label>
                                                    </td>
                                                <td width="25">&nbsp;&nbsp;&nbsp;</td>
                                                    <td height="21" nowrap="nowrap" width="36">
                                                        <input class="iceInpTxt-dis" disabled="true" name="frm1606:txt13C" id="frm1606:txt13C" maxlength="5" size="6" style="background-color: rgb(220, 220, 220);" value="WC155" type="text">
                                                    </td>
                                                    <td><font size="1" style="font-size: 11px;">&nbsp;Corporation&nbsp;</font></td>
                                                    <td>
                                                        <input id="frm1606:optATC13_3" name="frm1606:optATC13" value="WC155" type="radio">
                                                        <label for="frm1606:optATC13_3"> </label>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                            <td class="tblFormTd" valign="top" width="50%">
                                                <table border="0" cellpadding="0" cellspacing="0" width="174">
                                                    <tbody><tr>
                                                        <td width="174"><font style="font-weight: bold;" size="2">&nbsp;14&nbsp;</font><font size="1" style="font-size: 11px;">Category
                                                            of Withholding Agent</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width: 200px;" id="frm1606:j_id392" class="iceSelOneRb fieldText1">
                                                                    <div style="padding: 5px 0pt;" align="center">
                                                                        <table class="iceSelOneRb fieldText1" border="0" cellpadding="0" cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><input value="P" name="frm1606:j_id392" id="frm1606:j_id392:_1" type="radio"><label for="frm1606:j_id392:_1" class="iceSelOneRb fieldText1" style="font-size: 11px;">Private</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                    <td><input value="G" name="frm1606:j_id392" id="frm1606:j_id392:_2" type="radio"><label for="frm1606:j_id392:_2" class="iceSelOneRb fieldText1" style="font-size: 11px;">Government</label></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
              <tr>
                <td>
                                    <table class="tblForm" border="0" cellpadding="0" cellspacing="0" width="990">
                                        <tbody><tr><td class="tblFormTd" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0">
                                                <tbody><tr>
                                                    <td width="160">&nbsp;<font style="font-weight: bold;" size="2">15&nbsp;</font><font size="1" style="font-size: 11px;">Classification of Property</font></td></tr>
                          <tr>
                            <td>
                                                            <div align="left">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width: 800px;" id="frm1606:j_id393" class="iceSelOneRb fieldText1">
                                                                    <div style="padding: 5px 0pt;" align="left">
                                                                        <table class="iceSelOneRb fieldText1" border="0" cellpadding="0" cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>&nbsp;&nbsp;<input value="R" name="frm1606:j_id393" id="frm1606:j_id393:_1" onclick="document.getElementById('frm1606:j_id393_7').disabled = true;" type="radio"><label for="frm1606:j_id393:_1" class="iceSelOneRb fieldText1" style="font-size: 11px;">&nbsp;Residential&nbsp;</label>&nbsp;</td>
                                          <td><input value="C" name="frm1606:j_id393" id="frm1606:j_id393:_3" onclick="document.getElementById('frm1606:j_id393_7').disabled = true;" type="radio"><label for="frm1606:j_id393:_3" class="iceSelOneRb fieldText1" style="font-size: 11px;">&nbsp;Commercial&nbsp;&nbsp;</label></td>
                                          <td><input value="CR" name="frm1606:j_id393" id="frm1606:j_id393:_5" onclick="document.getElementById('frm1606:j_id393_7').disabled = true;" type="radio"><label for="frm1606:j_id393:_5" class="iceSelOneRb fieldText1" style="font-size: 11px;">&nbsp;Condominium Residential&nbsp;</label></td>
                                          <td><label style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Others (Specify)&nbsp;<input id="frm1606:j_id393_8" name="frm1606:j_id393" value="O" onclick="document.getElementById('frm1606:j_id393_7').disabled = false;" type="radio"></label></td>
                                          <td>&nbsp;<input id="frm1606:j_id393_7" maxlength="60" name="frm1606:j_id393_other" size="30" value="" disabled="disabled" type="text"></td>
                                          </tr><tr>
                                            <td>&nbsp;&nbsp;<input value="A" name="frm1606:j_id393" id="frm1606:j_id393:_2" onclick="document.getElementById('frm1606:j_id393_7').disabled = true;" type="radio"><label for="frm1606:j_id393:_2" class="iceSelOneRb fieldText1" style="font-size: 11px;">&nbsp;Agricultural&nbsp;&nbsp;</label></td>
                                            <td><input value="I" name="frm1606:j_id393" id="frm1606:j_id393:_4" onclick="document.getElementById('frm1606:j_id393_7').disabled = true;" type="radio"><label for="frm1606:j_id393:_4" class="iceSelOneRb fieldText1" style="font-size: 11px;">&nbsp;Industrial&nbsp;&nbsp;</label></td>
                                            <td><input value="CC" name="frm1606:j_id393" id="frm1606:j_id393:_6" onclick="document.getElementById('frm1606:j_id393_7').disabled = true;" type="radio"><label for="frm1606:j_id393:_6" class="iceSelOneRb fieldText1" style="font-size: 11px;">&nbsp;Condominium Commercial&nbsp;</label></td>
                                          </tr>
                                        
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </td>
                          </tr>
                                            </tbody></table>
                                        </td>
                                    </tr></tbody>
                  </table>
                </td>
              </tr> 
              <tr>
              </tr></tbody></table>
                            <table class="tblForm" border="0" cellpadding="0" cellspacing="0" width="990">                 
                <tbody>
                                   <tr>
                                        <td class="tblFormTd" valign="top" width="85%">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tbody><tr>
                                                    <td>
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tbody><tr>
                                                                <td width="8"><font style="font-weight: bold;" size="2">&nbsp;16&nbsp;</font></td>
                                                                <td><font size="1" style="font-size: 11px;">Location of the Property</font></td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tbody><tr>
                                                                <td width="25">&nbsp;</td>
                                                                <td><input value="" size="100" name="frm1606:txtLocation" maxlength="125" id="frm1606:txtLocation" onblur="return capital(this, event)" type="text"></td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                        <td class="tblFormTd" valign="top" width="15%">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tbody><tr>
                                                    <td>
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tbody><tr>
                                                                <td width="8"><font style="font-weight: bold;" size="2">&nbsp;16A&nbsp;</font></td>
                                                                <td><font size="1" style="font-size: 11px;">RDO Code</font></td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                            <tbody><tr>
                                                                <td width="25">&nbsp;</td>
                                                                <td id="rdoSelect3"></td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr>
                </tbody></table>
              
                <table class="tblForm" border="0" cellpadding="0" cellspacing="0" width="990">                 
                  <tbody><tr><td class="tblFormTd" valign="top" width="50%">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tbody><tr>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td width="11"><font style="font-weight: bold;" size="2">&nbsp;17&nbsp;</font></td>
                                                            <td><font size="1" style="font-size: 11px;">Brief Description of the Property</font></td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                        <tr><td>
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td width="25">&nbsp;</td>
                              <td><font size="1" style="font-size: 11px;">TCT/OCT/CCT No.&nbsp;</font></td>
                                                            <td><input value="" size="15" name="frm1606:txtTCT" maxlength="20" id="frm1606:txtTCT" onblur="return capital(this, event)" type="text"></td>
                              <td><font size="1" style="font-size: 11px;">&nbsp;&nbsp;Area Sold (sq. m)&nbsp;</font></td>
                                                            <td><input value="" size="15" name="frm1606:txtArea" maxlength="20" id="frm1606:txtArea" onkeypress="return numbersonly(this, event)" type="text"></td>
                              <td><font size="1" style="font-size: 11px;">&nbsp;&nbsp;Tax Dec. No.&nbsp;</font></td>
                                                            <td><input value="" size="15" name="frm1606:txtTaxDC" maxlength="25" id="frm1606:txtTaxDC" onkeypress="return numbersonly(this, event)" type="text"></td>
                              <td><font size="1" style="font-size: 11px;">&nbsp;&nbsp;Others&nbsp;</font></td>
                                                            <td><input value="" size="15" name="frm1606:txtOthers" maxlength="25" id="frm1606:txtOthers" onblur="return capital(this, event)" type="text"></td>
                                                        </tr>
                          </tbody></table>
                                                </td>
                                        </tr></tbody></table>
                                    </td>
                </tr></tbody></table>
              
              
                                
                                    <table class="tblForm" style="height: 23px;" border="0" cellpadding="0" cellspacing="0" width="990">
                                        <tbody><tr>
                                            <td class="tblFormTd" valign="top" width="49%">
                                                <table border="0" cellpadding="0" cellspacing="0" width="270">
                                                    <tbody><tr>
                                                        <td width="250"><font style="font-weight: bold;" size="2">&nbsp;18&nbsp;</font><font size="1" style="font-size: 11px;">Does the selling price cover more than one property?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="left">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width: 160px;" id="frm1606:j_id394" class="iceSelOneRb fieldText1">
                                                                    <div style="padding: 5px 0pt;" align="center">
                                                                        <table class="iceSelOneRb fieldText1" border="0" cellpadding="0" cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><input style="margin-left: 7px;" value="Y" name="frm1606:j_id394" id="frm1606:j_id394:_1" type="radio"><label for="frm1606:j_id394:_1" class="iceSelOneRb fieldText1" style="font-size: 11px;">Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                    <td><input value="N" name="frm1606:j_id394" id="frm1606:j_id394:_2" type="radio"><label for="frm1606:j_id394:_2" class="iceSelOneRb fieldText1" style="font-size: 11px;">No</label></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                            <td class="tblFormTd" valign="top" width="51%">
                                                <table border="0" cellpadding="0" cellspacing="0" width="395">
                                                    <tbody><tr>
                                                        <td width="382"><font style="font-weight: bold;" size="2">&nbsp;19&nbsp;</font><font size="1" style="font-size: 11px;">Are
you availing of tax relief under an International Tax Treaty or Special
Law?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div style="padding: 5px 0pt; font-family: Verdana,Arial,Helvetica; font-size: 8pt; width: 300px;" align="left">
                                                                <table class="iceSelOneRb-dis fieldText1-dis" border="0" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input value="Y" name="frm1606:rdTreaty" id="frm1606:rdTreaty:_1" onclick="enableSelTreaty();" type="radio"><label for="frm1606:rdTreaty:_1" style="font-size: 11px;">Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input value="N" name="frm1606:rdTreaty" id="frm1606:rdTreaty:_2" onclick="disableSelTreaty();" checked="checked" type="radio"><label for="frm1606:rdTreaty:_2" style="font-size: 11px;">No</label></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div style="font-size: 11px;" align="left">
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If yes, specify
                                                                <select id="frm1606:selTreaty" name="frm1606:selTreaty" style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" size="1" disabled="disabled"><option value="" selected="selected"></option><option value="0">International Tax Treaty</option><option value="1">Special Law</option></select>
                                                            </div>
                            </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                
                            
              
                                
                                    <table class="tblForm" style="height: 23px;" border="0" cellpadding="0" cellspacing="0" width="990">
                                        <tbody><tr>
                                            <td class="tblFormTd" valign="top" width="49%">
                                                <table border="0" cellpadding="0" cellspacing="0" width="250">
                                                    <tbody><tr>
                                                        <td width="250"><font style="font-weight: bold;" size="2">&nbsp;20&nbsp;</font><font size="1" style="font-size: 11px;">Description of Transaction (Mark one box only)</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="left">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width: 380px;" id="frm1606:j_id395" class="iceSelOneRb fieldText1">
                                                                    <div style="padding: 5px 0pt;" align="left">
                                                                        <table class="iceSelOneRb fieldText1" border="0" cellpadding="0" cellspacing="0">
                                                                            <tbody>
                                        <tr>
                                                                                    <td>&nbsp;&nbsp;<input value="CS" name="frm1606:j_id395" id="frm1606:j_id395:_1" onclick="cashSale()" type="radio"><label for="frm1606:j_id395:_1" class="iceSelOneRb fieldText1" style="font-size: 11px;">&nbsp;Cash Sale</label>&nbsp;&nbsp;&nbsp;</td>
                                          <td>&nbsp;&nbsp;<input value="FS" name="frm1606:j_id395" id="frm1606:j_id395:_4" onclick="foreclosure()" type="radio"><label for="frm1606:j_id395:_4" class="iceSelOneRb fieldText1" style="font-size: 11px;">&nbsp;Foreclosure Sale</label></td>
                                                                                    </tr><tr>
                                            <td>&nbsp;&nbsp;<input value="E" name="frm1606:j_id395" id="frm1606:j_id395:_2" onclick="enableExempt()" type="radio"><label for="frm1606:j_id395:_2" class="iceSelOneRb fieldText1" style="font-size: 11px;">&nbsp;Exempt</label></td>
                                            <td>&nbsp;&nbsp;<input value="O" name="frm1606:j_id395" id="frm1606:j_id395:_5" onclick="enableExempt()" type="radio"><label for="frm1606:j_id395:_5" class="iceSelOneRb fieldText1" style="font-size: 11px;">&nbsp;Others</label></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;&nbsp;<input value="IS" name="frm1606:j_id395" id="frm1606:j_id395:_3" onclick="enableInstallment()" type="radio"><label for="frm1606:j_id395:_3" class="iceSelOneRb fieldText1" style="font-size: 11px;">&nbsp;Installment Sale</label></td>
                                          </tr>
                                          
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </td>
                                                    </tr>
                          <tr>
                                                        <td><font  size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If Exempt, or Others, specify&nbsp;&nbsp;</font><input id="frm1606:txtOthers20" maxlength="60" name="frm1606:txtOthers20" size="30" value="" disabled="disabled" type="text"></td>
                          </tr>
                                                </tbody></table>
                      </td>
                                            <td class="tblFormTd" valign="top" width="51%">
                                                <table border="0" cellpadding="0" cellspacing="0" width="382">
                                                    <tbody><tr>
                                                        <td width="382"><font style="font-weight: bold;" size="2">&nbsp;&nbsp;</font><font size="1" style="font-size: 11px;">For Installment Sale:</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div style="padding: 5px 0pt; font-family: Verdana,Arial,Helvetica; font-size: 8pt; width: 450px;" align="left">
                                                                <table class="iceSelOneRb-dis fieldText1-dis" border="0" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                      <td><font style="font-weight: bold;" size="2">&nbsp;21&nbsp;</font><font size="1" style="font-size: 11px;">&nbsp;Selling Price&nbsp;</font></td><td><input id="frm1606:txtSelling" style="text-align: right;" maxlength="40" name="frm1606:txtSelling" size="20" value="" disabled="disabled" onblur="round(this,2); document.getElementById('frm1606:txtGross').value = document.getElementById('frm1606:txtSelling').value"  type="text"></td>
                                    </tr>
                                    <tr>
                                      <td><font style="font-weight: bold;" size="2">&nbsp;22&nbsp;</font><font size="1" style="font-size: 11px;">&nbsp;Cost and Other Expenses&nbsp;</font></td><td><input id="frm1606:txtCost" style="text-align: right;" maxlength="40" name="frm1606:txtCost" size="20" value="" onblur="round(this,2)"  disabled="disabled" type="text"></td>
                                    </tr>
                                    <tr>
                                      <td><font style="font-weight: bold;" size="2">&nbsp;23&nbsp;</font><font  size="1" style="font-size: 11px;">&nbsp;Mortgage Assumed&nbsp;</font></td><td><input id="frm1606:txtMortgage" style="text-align: right;" maxlength="40" name="frm1606:txtMortgage" size="20" value="" onblur="round(this,2)"  disabled="disabled" type="text"></td>
                                    </tr>
                                    <tr>
                                      <td><font style="font-weight: bold;" size="2">&nbsp;24&nbsp;</font><font  size="1" style="font-size: 11px;">&nbsp;Total Payments during the Initial Year&nbsp;</font></td><td><input id="frm1606:txtTotalP" style="text-align: right;" maxlength="40" name="frm1606:txtTotalP" onblur="round(this,2)"  size="20" value="" disabled="disabled" type="text"></td>
                                    </tr>
                                    <tr>
                                      <td><font style="font-weight: bold;" size="2">&nbsp;25&nbsp;</font><font  size="1" style="font-size: 11px;">&nbsp;Amount of Installment this Month&nbsp;</font></td><td><input id="frm1606:txtAmount" style="text-align: right;" maxlength="40" name="frm1606:txtAmount" size="20" onblur="round(this,2)"  value="" disabled="disabled" type="text"></td>
                                    </tr>
                                    <tr>
                                      <td><font style="font-weight: bold;" size="2">&nbsp;26&nbsp;</font><font  size="1" style="font-size: 11px;">&nbsp;Total No. of Installments in the Contract&nbsp;&nbsp;</font></td><td><input id="frm1606:txtTotalN" style="text-align: right;" maxlength="20" name="frm1606:txtTotalN" onblur="round(this,2)"  size="10" value="" disabled="disabled" type="text"></td>
                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                            </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                
                            
              
                                
                                    <table class="tblForm" style="height: 23px;" border="0" cellpadding="0" cellspacing="0" width="990">
                                        <tbody><tr>
                      <td class="tblFormTd" valign="top" width="990">
                        <table border="0" cellpadding="0" cellspacing="0" width="990">
                          <tbody><tr>
                            <td colspan="2">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                  <td width="350"><font style="font-weight: bold;" size="2">&nbsp;27&nbsp;</font><font size="1" style="font-size: 11px;">Fair Market Value (FMV) - Valuation at the time of the Contract</font></td>
                                </tr>
                              </tbody></table>
                            </td>
                                                    </tr>
                          <tr>
                            <td>
                              <font size="1">&nbsp;&nbsp;27A&nbsp;&nbsp;</font><input id="frm1606:opt27A" name="frm1606:opt27A" type="checkbox"><label for="frm1606:opt27A"> </label>
                              <font  size="1" style="font-size: 11px;">&nbsp;FMV of Land per latest Tax Declaration&nbsp;</font></td><td><input id="frm1606:txtFMVLand" style="text-align: right" maxlength="40" name="frm1606:txtFMVLand" size="15" value="" onkeypress="return numbersonly(this, event)" type="text" onblur="tickCheckboxWithValue(this);round(this,2);computeFMVLI()"></td>
                            
                                                        <td>
                              <font size="1">&nbsp;27C&nbsp;</font><input id="frm1606:opt27C" name="frm1606:opt27C" type="checkbox"><label for="frm1606:opt27C"> </label>
                              <font  size="1" style="font-size: 11px;">FMV of Land as determined by BIR Commissioner (zonal value)&nbsp;</font></td><td><input id="frm1606:txtFMVZonal" style="text-align: right" maxlength="40" name="frm1606:txtFMVZonal" size="15" value="" onkeypress="return numbersonly(this, event)" type="text" onblur="tickCheckboxWithValue(this);round(this,2);computeFMVLI()"></td>
                            
                          </tr>
                          <tr>
                            <td>
                              <font size="1">&nbsp;&nbsp;27B&nbsp;&nbsp;</font><input id="frm1606:opt27B" name="frm1606:opt27B" type="checkbox"><label for="frm1606:opt27B"> </label>
                              <font  size="1" style="font-size: 11px;">&nbsp;FMV of Improvements per latest Tax Dec.&nbsp;</font></td><td><input id="frm1606:txtFMVImprovements" style="text-align: right" maxlength="40" name="frm1606:txtFMVImprovements" size="15" value="" onkeypress="return numbersonly(this, event)" type="text" onblur="tickCheckboxWithValue(this);round(this,2);computeFMVLI()"></td>
                            
                            <td>
                              <font size="1">&nbsp;27D&nbsp;</font><input id="frm1606:opt27D" name="frm1606:opt27D" type="checkbox"><label for="frm1606:opt27D"> </label>
                              <font  size="1" style="font-size: 11px;">&nbsp;FMV of Improvements as determined by BIR Commissioner (BIR Rules)&nbsp;</font></td><td><input id="frm1606:txtFMVBIR" style="text-align: right" maxlength="40" name="frm1606:txtFMVBIR" size="15" value="" onkeypress="return numbersonly(this, event)" type="text" onblur="tickCheckboxWithValue(this);round(this,2);computeFMVLI()"></td>
                            
                          </tr>
                        </tbody></table>
                      </td>
                                        </tr>
                                    </tbody></table>
                                
                            
              
                                
                                    <table class="tblForm" style="height: 23px;" border="0" cellpadding="0" cellspacing="0" width="990">
                                        <tbody><tr>
                      <td class="tblFormTd" valign="top" width="990">
                        <table border="0" cellpadding="0" cellspacing="0" width="990">
                          <tbody><tr>
                            <td width="350">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                  <td width="350"><font style="font-weight: bold;" size="2">&nbsp;28&nbsp;</font><font size="1" style="font-size: 11px;">Determination of Taxable Base&nbsp;</font></td>
                                </tr>
                              </tbody></table>
                            </td>
                                                    </tr>
                          <tr>
                            <td>
                              <font size="1">&nbsp;&nbsp;28A&nbsp;</font><input id="frm1606:opt28A" name="frm1606:opt28" value="Gross" onclick="document.getElementById('frm1606:txtGross').disabled = false;" type="radio"><label for="frm1606:opt28A:_1"> </label>
                              <font  size="1" style="font-size: 11px;">&nbsp;Gross Selling Price&nbsp;</font></td><td><input id="frm1606:txtGross" maxlength="40" name="frm1606:txtGross" style="text-align: right" size="15" value="0.00" onblur="round(this,2);computeTaxableBase()"  type="text"></td>
                                                
                            <td>
                              <font size="1">&nbsp;28D&nbsp;</font><input id="frm1606:opt28D" name="frm1606:opt28" value="Installment" onclick="document.getElementById('frm1606:txtInstallment').disabled = false;" type="radio"><label for="frm1606:opt28D:_1"> </label>
                              <font  size="1" style="font-size: 11px;">&nbsp;Installment Collected (For &nbsp;Installment Sale excluding interest)&nbsp;</font></td><td><input id="frm1606:txtInstallment" style="text-align: right" maxlength="40" name="frm1606:txtInstallment" onblur="round(this,2);computeTaxableBase()"  size="15" value="0.00" type="text"></td>
                            
                          </tr>
                          <tr>
                            <td>
                              <font size="1">&nbsp;&nbsp;28B&nbsp;</font><input id="frm1606:opt28B" name="frm1606:opt28" value="Fair" type="radio"><label for="frm1606:opt28B:_1"> </label>
                              <font  size="1" style="font-size: 11px;">&nbsp;Fair Market Value of Land and Improvement&nbsp;</font></td><td><input id="frm1606:txtFMVLI" maxlength="40" name="frm61606:txtFMVLI" style="text-align: right" size="15" value="0.00" onblur="round(this,2);computeTaxableBase()"  onmousemove="computeFMVLI()" type="text"></td>
                            
                            
                                                        <td>
                              <font size="1">&nbsp;&nbsp;28E&nbsp;</font><input id="frm1606:opt28E" name="frm1606:opt28" value="Others" onclick="document.getElementById('frm1606:txtOthers28E').disabled = false;" type="radio"><label for="frm1606:opt28E:_1"> </label>
                              <font  size="1" style="font-size: 11px;">&nbsp;Others (Specify)&nbsp;</font></td><td><input id="frm1606:txtOtherss28E" maxlength="40" name="frm1606:txtOtherss28E" size="15" value="" type="text"></td><td><input id="frm1606:txtOthers28E" maxlength="40" name="frm1606:txtOthers28E" style="text-align: right" size="15" value="0.00" onblur="round(this,2);computeTaxableBase()" type="text"></td>
                            
                                                    </tr>
                          <tr>
                            <td><label  size="1" style="font-size: 11px;">&nbsp;&nbsp;(Sum of 27A &amp; 27B/ 27C &amp; 27D/ 27B &amp; 27C/27A &amp; 27D, whichever is higher)&nbsp;</label></td>
                          </tr>
                          <tr>
                            <td>
                              <font size="1">&nbsp;&nbsp;28C&nbsp;</font><input id="frm1606:opt28C" name="frm1606:opt28" value="Bid" onclick="document.getElementById('frm1606:txtBid').disabled = false;" type="radio"><label for="frm1606:opt28C:_1"> </label>
                                                            <font  size="1" style="font-size: 11px;">&nbsp;Bid Price (For Foreclosure Sale)&nbsp;</font></td><td><input id="frm1606:txtBid" style="text-align: right" maxlength="40" name="frm1606:txtBid" size="15" value="0.00" onblur="round(this,2);computeTaxableBase()" type="text"></td>  
                                                                                  
                                                    </tr>
                        </tbody></table>
                      </td>
                                        </tr>
                                    </tbody></table>
                                
                            
              
                            
                                <table class="tblForm" border="0" cellpadding="0" cellspacing="0" width="990">
                                    <tbody><tr>
                                        <td class="tblFormTd" valign="top" width="800">
                                            <table border="0" cellpadding="0" cellspacing="0" width="382">
                                                <tbody><tr>
                                                    <td width="382"><font style="font-weight: bold;" size="2">&nbsp;29&nbsp;</font><font size="1" style="font-size: 11px;">Is
                                                            the seller habitually engaged in real estate business?</font>
                          </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div style="padding: 5px 0pt;" align="center">
                                                            <table class="iceSelOneRb-dis fieldText1-dis" border="0" cellpadding="0" cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="width: 50%"><input style="margin-left: 18px;" value="Y" name="frm1606:SpecialLaw" id="frm1606:Habitual_1" type="radio"><label for="frm1606:Habitual_1" style="font-size: 12px;">Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                        <td><input value="N" name="frm1606:SpecialLaw" id="frm1606:Habitual_2" type="radio"><label for="frm1606:Habitual_2" style="font-size: 12px;">No</label></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                          </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr>
                                </tbody></table>
                            
              
              
                                
                                    <table class="tblForm" border="0" cellpadding="0" cellspacing="0" width="990">
                                        <tbody><tr>
                                            <td class="tblFormTd" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                        <td width="250">&nbsp;&nbsp;&nbsp;<font style="font-weight: bold;" size="2">Part II</font></td>
                                                        <td width="250"> <font style="font-weight: bold; letter-spacing: 3px; text-align: center;" size="2">Computation of Tax</font></td>
                                                        
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                
                            
                            
                                
                                    <table class="tblForm" border="0" cellpadding="0" cellspacing="0" width="990">
                                        <tbody><tr>
                                            <td class="tblFormTd">
                                                <table border="0" cellpadding="0" cellspacing="0" width="987">
                                                    <tbody><tr>
                                                        <td width="18"><font style="font-weight: bold;" size="2">&nbsp;30&nbsp;&nbsp;</font></td>
                                                        <td width="485"><font size="1">&nbsp;</font><label face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">
                                                        Taxable Base (Item 28A or 28B, whichever is higher, for cash sale, or item 28C, or 28D, or 28E, whichever is applicable)
                                                        </label></td>
                                                        <td width="202"><div class="spacePadder"></div></td>
                                                        <td width="199"><span class="spacePadder"><font style="font-weight: bold;" size="2">30</font>&nbsp;&nbsp;&nbsp;<input value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm1606:txtTax" maxlength="25" id="frm1606:txtTax" onmousemove="computeTaxableBase()" type="text" disabled ></span></td>
                                                    </tr>
                          <tr>
                                                        <td width="18"><font style="font-weight: bold;" size="2">&nbsp;31&nbsp;</font></td>
                                                        <td width="317"><font size="1">&nbsp;</font><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Rate</font></td>
                                                        <td width="202"><div class="spacePadder"></div></td>
                                                        <td width="199"><span class="spacePadder"><font style="font-weight: bold;margin-right:4px; " size="2">31</font>&nbsp;&nbsp;<select id="frm1606:txtTaxRate" name="frm1606:txtTaxRate" maxlength="20" onblur="computeOfTaxRequired()" title="Please select Tax Rate"><option value="">Select Tax Rate</option><option value="0">0%</option><option value="1.5">1.5%</option><option value="3">3%</option><option value="5">5%</option><option value="6">6%</option></select></span></td>
                                                    </tr>
                          <tr>
                                                        <td width="18"><font style="font-weight: bold;" size="2">&nbsp;32&nbsp;&nbsp;</font></td>
                                                        <td width="317"><font size="1">&nbsp;</font><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Required to be Withheld</font></td>
                                                        <td width="202"><div class="spacePadder"></div></td>
                                                        <td width="199"><span class="spacePadder"><font style="font-weight: bold;" size="2">32</font>&nbsp;&nbsp;&nbsp;<input value="0.00" disabled style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm1606:txtTaxR" maxlength="25" id="frm1606:txtTaxR" onmousemove="computeOfTaxRequired()" type="text"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font style="font-weight: bold;" size="2">&nbsp;33&nbsp;</font></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"> Less: Tax Remitted in Return Previously Filed, if this is an amended return</font></td>
                                                        <td><div class="spacePadder"></div></td>
                                                        <td><span class="spacePadder"><font style="font-weight: bold;" size="2">33</font>&nbsp;&nbsp;&nbsp;<input value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm1606:txtLess" maxlength="25" id="frm1606:txtLess" disabled="disabled" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTaxDue()" type="text"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font style="font-weight: bold;" size="2">&nbsp;34&nbsp;</font></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Still Due / (Overremittance)</font></td>
                                                        <td><div class="spacePadder"></div></td>
                                                        <td><span class="spacePadder"><font style="font-weight: bold;" size="2">34</font>&nbsp;&nbsp;&nbsp;<input value="0.00" disabled style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm1606:txtTaxDue" maxlength="25" id="frm1606:txtTaxDue" onmousemove="computeTaxDue()" type="text"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font style="font-weight: bold;" size="2"> &nbsp;35&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">&nbsp;Add: Penalties</font></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <table width="511">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="center" width="161"><font face="Arial" size="1" style="font-size: 11px;">Surcharge</font></td>
                                                                        <td align="center" width="160"><font face="Arial" size="1" style="font-size: 11px;">Interest</font></td>
                                                                        <td align="center" width="174"><font face="Arial" size="1" style="font-size: 11px;">Compromise</font></td>
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
                                                                        <td align="center" width="161">
                                                                            <font face="Arial" size="2"><b>35A</b>&nbsp;
                                                                            <input value="0.00" style="color: black; text-align: right;" size="15" name="frm1606:txtSurcharge" maxlength="25" id="frm1606:txtSurcharge" onblur="round(this,2);computePenalties()" type="text">
                                                                            </font>
                                                                        </td>
                                                                        <td align="center" width="161">
                                                                            <font face="Arial" size="2"><b>35B</b>&nbsp;
                                                                            <input value="0.00" style="text-align: right;" size="15" name="frm1606:txtInterest" maxlength="25" id="frm1606:txtInterest" onblur="round(this,2);computePenalties()" type="text">
                                                                            </font>
                                                                        </td>
                                                                        <td align="center" width="174">
                                                                            <font face="Arial" size="2"><b>35C</b>&nbsp;
                                                                            <input value="0.00" style="text-align: right;" size="15" name="frm1606:txtCompromise" maxlength="25" id="frm1606:txtCompromise" onblur="round(this,2);computePenalties()" type="text">
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font style="font-weight: bold;" size="2">35D</font>&nbsp;
                                                                <input value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm1606:txtTotalPenalties" maxlength="15" id="frm1606:txtTotalPenalties" disabled="true" type="text">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font style="font-weight: bold;" size="2">&nbsp;36&nbsp;</font></td>
                                                        <td colspan="2"><font size="1">&nbsp;</font><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Total Amount Still Due/(Overremittance) (Sum of items 34 &amp; 35D)</font></td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font style="font-weight: bold;" size="2">36</font>&nbsp;&nbsp;&nbsp;
                                                                <input value="0.00" disabled style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm1606:txtTotal" maxlength="15" id="frm1606:txtTotal" class="iceInpTxt-dis" onmousemove="computeOfTotalAmtDue()" type="text">
                                                            </div>
                                                        </td>
                                                    </tr>
                        </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                
                            
              
                            
                                <table class="tblForm" border="0" cellpadding="0" cellspacing="0" width="990">
                                    <tbody><tr>
                                        <td class="tblFormTd" valign="top" width="134">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tbody><tr>
                                                    <td width="132">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="180">
                                                            <tbody><tr>
                                                                <td width="24">&nbsp;</td>
                                                                <td width="150"><font size="1" style="font-size: 11px;"> If overremittance mark one box only:</font></td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                        <td class="tblFormTd" valign="top" width="607"><table border="0" cellpadding="0" cellspacing="0" width="599">
                                                <tbody><tr>
                                                    <td width="599"><table border="0" cellpadding="0" cellspacing="0" width="598">
                                                            <tbody><tr>
                                                                <td width="3">&nbsp;</td>
                                                                <td width="110"><input id="frm1606:opt37:_1" name="frm1606:opt37" value="R" type="radio" disabled>
                                                                    <font size="1">
                                                                        <label for="frm1606:opt37:_1">To be refunded</label>
                                                                    </font>
                                </td>
                                                                <td width="221"><input id="frm1606:opt37:_2" name="frm1606:opt37" value="I" type="radio" disabled>
                                                                    <font size="1">
                                                                        <label for="frm1606:opt37:_2">To be issued a Tax Credit Certificate</label>
                                                                    </font>
                                </td>
                                                            </tr>
                                                        </tbody></table>
                          </td>
                                                </tr>
                                            </tbody></table>
                    </td>
                                    </tr>
                                </tbody></table>
                            
                    <table style="border-top: 3px solid black; font-family:arial; font-size:10px; text-align: center; vertical-align: top; table-layout: fixed;">
                      <tr>
                          <td>I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge and belief,
                          is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.</td>
                        </tr>
                      </table>
                  </div>
                  <div class="imgClass" align='center' style="display:none; width:990px !important;">
                    <img id="frm1606:jurat" src="{{ asset('images/bottom_img/1606_new.jpg') }}" width="990"/>
                  </div>
                  <div class="imgClass" align='center' style="display:none; width:990px !important;">
                    <table style="font-size:13px; text-align: left; vertical-align: top;">
                      <tr>
                        <td>Machine Validation/Revenue Official Receipt Details (If not filed with the bank)<br/><br/><br/></td>
                      </tr>
                    </table>
                  </div>
                                    <table class="tblForm printButtonClass" border="0" cellpadding="0" cellspacing="0" width="940">
                                        <tbody><tr>
                                            <td class="tblFormTdPart">
                                                <table border="0" cellpadding="0" cellspacing="0" width="940">
                                                    <tbody><tr>
                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0" width="990">
                                                                <tbody>
                                                                    <tr valign="middle">
                                                                        <td width="148"></td>
                                                                        <td width="710">
                                                                            <div align="center">
                                                                                @if($action != 'view')
                                                                                <input value="Validate" class="printButtonClass" style="width: 100px;" name="frm1606:cmdValidate" id="frm1606:cmdValidate" onclick="window.setTimeout('computeFMVLI();computeTaxableBase();computeOfTaxRequired();computeTaxDue();computeOfTotalAmtDue();', 300); validate()" type="button">
                                                                                <input value="Edit" class="printButtonClass" style="width: 100px;" name="frm1606:cmdEdit" id="frm1606:cmdEdit" onclick="enableAllControl()" type="button">
                                                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                <input value="Save" class="printButtonClass" style="width: 100px;" name="btnSave" id="btnSave" type="button" onclick="saveData()">
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1606:btnFinalCopy" id="frm1606:btnFinalCopy" onclick="submitForm();" />
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
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>                                                                                                                               
            <div id="DummyTxt" style='display:none;'>  </div>
          </div>
        </div>
        
        </td>
        <td valign="top"><img id="frm1606:bcsImg" src="{{ asset('images/BCS.jpg') }}"/></td>
        </tr>
        <tr>
            <td>
                <div class="footer" style="padding:6px; text-align: center; font-size: 11px; background-color: white;width: 991px">
                    <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                </div>
            </td>
        </tr>
        </table>
        
      </div>
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
    <div id="responseRdo" style="display:none;"><!--loaded files render here--></div>
@endsection

@section('scripts')
<script type="text/javascript">
      var isSubmitFinal = false;
      var isSubmit = false;

      var gIsReadOnly = false;
      var fileName = "";
      var existingXMLFileName = "";
      var fileNameToExport = "";

      var savedReturn = "";
      var p3Compromise = "";
      var p3Surcharge = "";
      var p3Interest = "";
      var p3IsAmended = "";
      var p3FilingDate = "";
      var p3ReturnPeriod = "";
      var p3ReturnPeriodEnd = "";
      var p3ReturnPeriodMonth = "";
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
      var p3TPZip = "";

      /*----------------------------------*/
      var d = document, XMLBGFile = '', data = '', XMLFile = '', msg = d.getElementById('msg'), flag = true;
      var loader = d.getElementById('loader');
      
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
        loadData(); /*This will load data onto fields*/     

        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
        }

        if (gIsReadOnly) {
          d.getElementById('frm1606:cmdValidate').disabled = true;
          d.getElementById('btnSave').disabled = true;
        }
      }

      function loadData() {
          /*This will load data onto fields*/
          var response = d.getElementById("response");

          var elem = document.getElementById('frmMain').elements;
          for (var i = 0; i < elem.length; i++) {

              if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {
                  if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                      var fieldVal = String($("#response").html()).split(elem[i].id + '=');
                      if (elem[i].id == 'frm1606:txtBuyerName' || elem[i].id == 'frm1606:txtBuyerAddress' || elem[i].id == 'frm1606:txtSellerName' || elem[i].id == 'frm1606:txtSellerAddress') {
                          elem[i].value = unescape(fieldVal[1]);
                      }
                    else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        //elem[i].value = typeof (fieldVal[1]) === "undefined" ? "0" : fieldVal[1];
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
                      else {
                          elem[i].value = fieldVal[1]; //all select-one and text values       
                      }
                  }
                  if (elem[i].type == 'radio') {
                      var fVal = String($("#response").html()).split(elem[i].id + '=');
                      if (fVal[1] == 'true') {
                          elem[i].checked = fVal[1];
                          //elem[i].onclick();
                      }
                  }
                  if (elem[i].type == 'checkbox') {
                      var chkboxVal = String($("#response").html()).split(elem[i].id + '=');
                      if (chkboxVal[1] == 'true') {
                          elem[i].checked = chkboxVal[1];
                      }
                  }
                  if (elem[i].type == 'button' && elem[i].id == 'frm1606:cmdValidate') {
                      flag = false;
                      //elem[i].onclick(); //display computations
                  }
              }

          }
          document.getElementById('txtEmail').value = globalEmail;
      }
      var XMLrdoFile = '';

      function loadXMLrdo(fileLocation) {
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
        var responseRdo = d.getElementById('responseRdo'); //render file and write to hidden div
        responseRdo.innerHTML = xmlHTTP.responseText; //remove XML tag
        loadRdo();

      }

      var rdoCount = 0;

      function loadRdo() {
          /*This will load data onto an array*/
          var response = d.getElementById("responseRdo");

          var rdoCnt = String(response.innerHTML).split('rdoCount=');
          rdoCount = rdoCnt[1];

          var k = 0;
          //loads rdoList from xml
          for (var i = 1; i <= rdoCount; i++) {

              var rdo = String(response.innerHTML).split('rdo' + i + ':');
              var rdoStr = rdo[1];

              //Ensure that before writing to rdoPropertyJS the formType 1606 is traceable in rdoStr
              if (rdoStr.indexOf('1606') >= 0) {
                  var rdoValues = rdoStr.split('~');
                  var rdoCode = rdoValues[0];
                  var description = rdoValues[1];

                  var objRdo = new rdoPropertyJS(rdoCode, description);
                  rdoList[k] = objRdo;
                  k++;
                  //alert('1606 successfully created array #'+i);

              } else {
                  //alert('1606 not found in array #'+i);
                  continue;
              }
          }
      }

      

      var str;
      var globalEmail = "";
      str = setTimeout("sleeptime()", 300);


      function sleeptime() { 
          init();

          var xmlFileName = document.getElementById('file_name').value;        
          fileName = xmlFileName;

          if (fileName != null && fileName.indexOf('.xml') > -1) {
             
              loadXML(fileName);

              d.getElementById('frm1606:txtDateMonth').disabled = true;
              d.getElementById('frm1606:txtDateDay').disabled = true;
              d.getElementById('frm1606:txtDateYear').disabled = true;
              d.getElementById('frm1606:txtTCT').disabled = true;

              existingXMLFileName = fileName;
              if (gIsReadOnly) {
                  window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false;", 1000);
              }
          } else {
              window.setTimeout("$('#loader').hide('blind');", 100);
          }
          if ($('#printMenu').css('display') != 'none') {
              $('#printMenu').hide('blind');
          }
       document.getElementById('frm1606:txtTIN1').disabled = true; document.getElementById('frm1606:txtTIN2').disabled = true; document.getElementById('frm1606:txtTIN3').disabled = true; document.getElementById('frm1606:txtBranchCode').disabled = true;
      
     }

      function rdoPropertyJS(rdoCode, description) {
          this.rdoCode = rdoCode;
          this.description = description;
      }

      var rdoList = new Array();

      function init() {
          var year = new Date();
          mm = "" + (year.getMonth() + 1);
          if (mm.length == 1) {
              mm = "0" + mm;
              d.getElementById('frm1606:txtDateMonth').value = mm;
          }
          else {
              d.getElementById('frm1606:txtDateMonth').value = year.getMonth() + 1;
          }
          d.getElementById('frm1606:txtDateYear').value = year.getFullYear();
          dd = "" + year.getDate();
          if (dd.length == 1) {
              dd = "0" + dd;
              d.getElementById('frm1606:txtDateDay').value = dd;
          }
          else {
              d.getElementById('frm1606:txtDateDay').value = year.getDate();
          }
        
          @if($action != 'view')
          document.getElementById('btnPrint').disabled = true;
          document.getElementById('frm1606:cmdEdit').disabled = true;
          d.getElementById('frm1606:btnFinalCopy').disabled = true;
          d.getElementById('btnUpload').disabled = true;
          @endif

          loadXMLrdo('/xml/rdo.xml');
          getRdo();
      }

      var disableElem = true;
      var enableElem = false;
      function disableAllControl() {
          document.getElementById('frm1606:txtLess').disabled = true;
          document.getElementById('frm1606:j_id217:_1').disabled = true;
          document.getElementById('frm1606:j_id217:_2').disabled = true;
          document.getElementById('frm1606:j_id252:_1').disabled = true;
          document.getElementById('frm1606:j_id252:_2').disabled = true;
          document.getElementById('frm1606:j_id392:_1').disabled = true;
          document.getElementById('frm1606:j_id392:_2').disabled = true;
          document.getElementById('frm1606:rdTreaty:_1').disabled = true;
          document.getElementById('frm1606:rdTreaty:_2').disabled = true;
          document.getElementById('frm1606:selTreaty').disabled = true;
          document.getElementById('frm1606:txtDateMonth').disabled = true;
          document.getElementById('frm1606:txtDateDay').disabled = true;
          document.getElementById('frm1606:txtDateYear').disabled = true;
          document.getElementById('frm1606:cmdEdit').disabled = false;
          document.getElementById('btnPrint').disabled = false;
          document.getElementById('frm1606:btnFinalCopy').disabled = false;

          document.getElementById('frm1606:txtSheets').disabled = true;
          document.getElementById('frm1606:txtTIN1').disabled = true;
          document.getElementById('frm1606:txtTIN2').disabled = true;
          document.getElementById('frm1606:txtTIN3').disabled = true;
          document.getElementById('frm1606:txtBranchCode').disabled = true;
          document.getElementById('frm1606:txtRDOCode').disabled = true;
          document.getElementById('frm1606:txtTINS1').disabled = true;
          document.getElementById('frm1606:txtTINS2').disabled = true;
          document.getElementById('frm1606:txtTINS3').disabled = true;
          document.getElementById('frm1606:txtBranchCodeS').disabled = true;
          document.getElementById('frm1606:txtRDOCodeS').disabled = true;
          document.getElementById('frm1606:txtBuyerName').disabled = true;
          document.getElementById('frm1606:txtSellerName').disabled = true;
          document.getElementById('frm1606:txtBuyerAddress').disabled = true;
          document.getElementById('frm1606:txtSellerAddress').disabled = true;
          document.getElementById('frm1606:optATC13_2').disabled = true;
          document.getElementById('frm1606:optATC13_3').disabled = true;
          document.getElementById('frm1606:j_id393:_1').disabled = true;
          document.getElementById('frm1606:j_id393:_2').disabled = true;
          document.getElementById('frm1606:j_id393:_3').disabled = true;
          document.getElementById('frm1606:j_id393:_4').disabled = true;
          document.getElementById('frm1606:j_id393:_5').disabled = true;
          document.getElementById('frm1606:j_id393:_6').disabled = true;
          document.getElementById('frm1606:j_id393_7').disabled = true;
          document.getElementById('frm1606:j_id393_8').disabled = true;
          document.getElementById('frm1606:txtLocation').disabled = true;
            document.getElementById('frm1606:txtRDOCode16A').disabled = true;
          document.getElementById('frm1606:txtTCT').disabled = true;
          document.getElementById('frm1606:txtArea').disabled = true;
          document.getElementById('frm1606:txtTaxDC').disabled = true;
          document.getElementById('frm1606:txtOthers').disabled = true;
          document.getElementById('frm1606:j_id394:_1').disabled = true;
          document.getElementById('frm1606:j_id394:_2').disabled = true;
          document.getElementById('frm1606:j_id395:_1').disabled = true;
          document.getElementById('frm1606:j_id395:_2').disabled = true;
          document.getElementById('frm1606:j_id395:_3').disabled = true;
          document.getElementById('frm1606:j_id395:_4').disabled = true;
          document.getElementById('frm1606:j_id395:_5').disabled = true;
          document.getElementById('frm1606:txtOthers20').disabled = true;
          document.getElementById('frm1606:txtSelling').disabled = true;
          document.getElementById('frm1606:txtCost').disabled = true;
          document.getElementById('frm1606:txtMortgage').disabled = true;
          document.getElementById('frm1606:txtTotalP').disabled = true;
          document.getElementById('frm1606:txtAmount').disabled = true;
          document.getElementById('frm1606:txtTotalN').disabled = true;
          document.getElementById('frm1606:txtFMVLand').disabled = true;
          document.getElementById('frm1606:txtFMVZonal').disabled = true;
          document.getElementById('frm1606:txtFMVImprovements').disabled = true;
          document.getElementById('frm1606:txtFMVBIR').disabled = true;
          document.getElementById('frm1606:opt28A').disabled = true;
          document.getElementById('frm1606:opt28B').disabled = true;
          document.getElementById('frm1606:opt28C').disabled = true;
          document.getElementById('frm1606:opt28D').disabled = true;
          document.getElementById('frm1606:opt28E').disabled = true;
          document.getElementById('frm1606:txtGross').disabled = true;
          document.getElementById('frm1606:txtInstallment').disabled = true;
          document.getElementById('frm1606:txtFMVLI').disabled = true;
          document.getElementById('frm1606:txtOthers28E').disabled = true;
          document.getElementById('frm1606:txtOtherss28E').disabled = true;
          document.getElementById('frm1606:txtBid').disabled = true;
          document.getElementById('frm1606:Habitual_1').disabled = true;
          document.getElementById('frm1606:Habitual_2').disabled = true;
          document.getElementById('frm1606:txtTaxRate').disabled = true;
          document.getElementById('frm1606:txtSurcharge').disabled = true;
          document.getElementById('frm1606:txtInterest').disabled = true;
          document.getElementById('frm1606:txtCompromise').disabled = true;
          disableElem;
          enableElem;
      }

      function enableAllControl() {
          document.getElementById('frm1606:j_id217:_1').disabled = false;
          document.getElementById('frm1606:j_id217:_2').disabled = false;
          document.getElementById('frm1606:j_id252:_1').disabled = false;
          document.getElementById('frm1606:j_id252:_2').disabled = false;
          document.getElementById('frm1606:j_id392:_1').disabled = false;
          document.getElementById('frm1606:j_id392:_2').disabled = false;
          document.getElementById('frm1606:rdTreaty:_1').disabled = false;
          document.getElementById('frm1606:txtDateMonth').disabled = false;
          document.getElementById('frm1606:txtDateDay').disabled = false;
          document.getElementById('frm1606:txtDateYear').disabled = false;
          document.getElementById('frm1606:rdTreaty:_2').disabled = false;
          if (document.getElementById('frm1606:rdTreaty:_1').checked) {
              document.getElementById('frm1606:selTreaty').disabled = false;
          }


          if (document.getElementById('frm1606:j_id217:_1').checked) {
              document.getElementById('frm1606:txtLess').disabled = false;
          } else {
              document.getElementById('frm1606:txtLess').disabled = true;
          }

          document.getElementById('frm1606:cmdValidate').disabled = false;
          document.getElementById('btnPrint').disabled = true;
          document.getElementById('frm1606:cmdEdit').disabled = true;
          d.getElementById('frm1606:btnFinalCopy').disabled = true;
          d.getElementById('btnUpload').disabled = true;

          document.getElementById('frm1606:txtSheets').disabled = false;
          document.getElementById('frm1606:txtTIN1').disabled = false;
          document.getElementById('frm1606:txtTIN2').disabled = false;
          document.getElementById('frm1606:txtTIN3').disabled = false;
          document.getElementById('frm1606:txtBranchCode').disabled = false;
          document.getElementById('frm1606:txtRDOCode').disabled = false;
          document.getElementById('frm1606:txtTINS1').disabled = false;
          document.getElementById('frm1606:txtTINS2').disabled = false;
          document.getElementById('frm1606:txtTINS3').disabled = false;
          document.getElementById('frm1606:txtBranchCodeS').disabled = false;
          document.getElementById('frm1606:txtRDOCodeS').disabled = false;
          document.getElementById('frm1606:txtBuyerName').disabled = false;
          document.getElementById('frm1606:txtSellerName').disabled = false;
          document.getElementById('frm1606:txtBuyerAddress').disabled = false;
          document.getElementById('frm1606:txtSellerAddress').disabled = false;
          document.getElementById('frm1606:optATC13_2').disabled = false;
          document.getElementById('frm1606:optATC13_3').disabled = false;
          document.getElementById('frm1606:j_id393:_1').disabled = false;
          document.getElementById('frm1606:j_id393:_2').disabled = false;
          document.getElementById('frm1606:j_id393:_3').disabled = false;
          document.getElementById('frm1606:j_id393:_4').disabled = false;
          document.getElementById('frm1606:j_id393:_5').disabled = false;
          document.getElementById('frm1606:j_id393:_6').disabled = false;
          if (document.getElementById('frm1606:j_id393_8').checked) {
              document.getElementById('frm1606:j_id393_7').disabled = false;
          }
          else {
              document.getElementById('frm1606:j_id393_7').disabled = true;
          }
          document.getElementById('frm1606:j_id393_8').disabled = false;
          document.getElementById('frm1606:txtLocation').disabled = false;
            document.getElementById('frm1606:txtRDOCode16A').disabled = false;
          document.getElementById('frm1606:txtTCT').disabled = false;
          document.getElementById('frm1606:txtArea').disabled = false;
          document.getElementById('frm1606:txtTaxDC').disabled = false;
          document.getElementById('frm1606:txtOthers').disabled = false;
          document.getElementById('frm1606:j_id394:_1').disabled = false;
          document.getElementById('frm1606:j_id394:_2').disabled = false;
          document.getElementById('frm1606:j_id395:_1').disabled = false;
          document.getElementById('frm1606:j_id395:_2').disabled = false;
          document.getElementById('frm1606:j_id395:_3').disabled = false;
          document.getElementById('frm1606:j_id395:_4').disabled = false;
          document.getElementById('frm1606:j_id395:_5').disabled = false;
          if (document.getElementById('frm1606:j_id395:_5').checked || document.getElementById('frm1606:j_id395:_2').checked) {
              document.getElementById('frm1606:txtOthers20').disabled = false;
          }
          else {
              document.getElementById('frm1606:txtOthers20').disabled = true;
          }
          if (document.getElementById('frm1606:j_id395:_3').checked) {
              document.getElementById('frm1606:txtSelling').disabled = false;
              document.getElementById('frm1606:txtCost').disabled = false;
              document.getElementById('frm1606:txtMortgage').disabled = false;
              document.getElementById('frm1606:txtTotalP').disabled = false;
              document.getElementById('frm1606:txtAmount').disabled = false;
              document.getElementById('frm1606:txtTotalN').disabled = false;
          }
          else {
              document.getElementById('frm1606:txtSelling').disabled = true;
              document.getElementById('frm1606:txtCost').disabled = true;
              document.getElementById('frm1606:txtMortgage').disabled = true;
              document.getElementById('frm1606:txtTotalP').disabled = true;
              document.getElementById('frm1606:txtAmount').disabled = true;
              document.getElementById('frm1606:txtTotalN').disabled = true;
          }
          document.getElementById('frm1606:txtFMVLand').disabled = false;
          document.getElementById('frm1606:txtFMVZonal').disabled = false;
          document.getElementById('frm1606:txtFMVImprovements').disabled = false;
          document.getElementById('frm1606:txtFMVBIR').disabled = false;
          document.getElementById('frm1606:opt28A').disabled = false;
          document.getElementById('frm1606:opt28B').disabled = false;
          document.getElementById('frm1606:opt28C').disabled = false;
          document.getElementById('frm1606:opt28D').disabled = false;
          document.getElementById('frm1606:opt28E').disabled = false;
          document.getElementById('frm1606:txtGross').disabled = false;
          document.getElementById('frm1606:txtInstallment').disabled = false;
          document.getElementById('frm1606:txtFMVLI').disabled = false;
          document.getElementById('frm1606:txtOthers28E').disabled = false;
          document.getElementById('frm1606:txtOtherss28E').disabled = false;
          document.getElementById('frm1606:txtBid').disabled = false;
          document.getElementById('frm1606:Habitual_1').disabled = false;
          document.getElementById('frm1606:Habitual_2').disabled = false;
          document.getElementById('frm1606:txtTaxRate').disabled = false;
          document.getElementById('frm1606:txtSurcharge').disabled = false;
          document.getElementById('frm1606:txtInterest').disabled = false;
          document.getElementById('frm1606:txtCompromise').disabled = false;

          if (NumWithComma(document.getElementById('frm1606:txtTotal').value) < 0) {
              document.getElementById('frm1606:opt37:_1').disabled = false;
              document.getElementById('frm1606:opt37:_2').disabled = false;
          }
          else {
              document.getElementById('frm1606:opt37:_1').disabled = true;
              document.getElementById('frm1606:opt37:_2').disabled = true;
          }

          if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
              d.getElementById('frm1606:txtDateMonth').disabled = true;
              d.getElementById('frm1606:txtDateDay').disabled = true;
              d.getElementById('frm1606:txtDateYear').disabled = true;
              d.getElementById('frm1606:txtTCT').disabled = true;
          }

          disableElem;
          enableElem;
       document.getElementById('frm1606:txtTIN1').disabled = true; document.getElementById('frm1606:txtTIN2').disabled = true; document.getElementById('frm1606:txtTIN3').disabled = true; document.getElementById('frm1606:txtBranchCode').disabled = true;
      }

      function getRdo() {
          var data2 = "<select class='iceSelOneMnu' id='frm1606:txtRDOCodeS' name='frm1606:txtRDOCodeS' size='1'><option value='000'> </option>";
          var data3 = "<select class='iceSelOneMnu' id='frm1606:txtRDOCode16A' name='frm1606:txtRDOCode16A' size='1'><option value='000'> </option>";

          for (var i = 0; i < rdoList.length; i++) {
              var rdo = rdoList[i];
              data2 = data2 + "<option value='" + rdo.rdoCode + "'>" + rdo.description + "</option>";
              data3 = data3 + "<option value='" + rdo.rdoCode + "'>" + rdo.description + "</option>";
          }
         
          data2 = data2 + "</select>";
          data3 = data3 + "</select>";

          $('#rdoSelect2').html(data2);
          $('#rdoSelect3').html(data3);
      }

      function validate() {
          var buyer = d.getElementById('frm1606:txtTIN1').value + d.getElementById('frm1606:txtTIN2').value + d.getElementById('frm1606:txtTIN3').value + d.getElementById('frm1606:txtBranchCode').value;
          var seller = d.getElementById('frm1606:txtTINS1').value + d.getElementById('frm1606:txtTINS2').value + d.getElementById('frm1606:txtTINS3').value + d.getElementById('frm1606:txtBranchCodeS').value;

          m1 = "" + d.getElementById('frm1606:txtDateMonth').value;
          d1 = "" + d.getElementById('frm1606:txtDateDay').value;
          var dt = new Date();
          if (m1.length == 1) {
              alert("Please enter a valid month on item 1. Format should be MM/DD/YYYY.")
              return;
          }
          if (d1.length == 1) {
              alert("Please enter a valid day on item 1. Format should be MM/DD/YYYY.")
              return;
          }
          var isLeap = new Date(document.getElementById('frm1606:txtDateYear').value, 1, 29).getMonth() == 1;

          if (!isLeap && document.getElementById('frm1606:txtDateMonth').value == 2 && document.getElementById('frm1606:txtDateDay').value == 29) {
              alert("Filing year is not a leap year.");
              return;
          }
          if (!isLeap && document.getElementById('frm1606:txtDateMonth').value == 2 && document.getElementById('frm1606:txtDateDay').value > 29) {
              alert("Invalid date entry on item 1.");
              return;
          }
          if (isLeap && document.getElementById('frm1606:txtDateMonth').value == 2 && document.getElementById('frm1606:txtDateDay').value > 29) {
              alert("Invalid date entry on item 1.");
              return;
          }
          var month31 = (['01', '03', '05', '07', '08', '10', '12']);
          var month30 = (['04', '06', '09', '11']);
          var month = document.getElementById('frm1606:txtDateMonth').value
          if (month31.contains(month) && document.getElementById('frm1606:txtDateDay').value > 31) {
              alert("Invalid date entry on item 1.");
              return;
          }
          else if (month30.contains(month) && document.getElementById('frm1606:txtDateDay').value > 30) {
              alert("Invalid date entry on item 1.");
              return;
          }
         
          if (document.getElementById('frm1606:txtDateMonth').value * 1 > 12) {
              alert("Invalid month entry on Item no.1. Please enter a valid month.")
              return;
          }
          if ((document.getElementById('frm1606:txtDateMonth').value == "")) {
              alert("Please enter a valid month on Item 1.");
              return;
          }
          
          if ((document.getElementById('frm1606:txtDateDay').value == "")) {
              alert("Please enter a valid day on Item 1.");
              return;
          }
          if ((document.getElementById('frm1606:txtDateYear').value == "")) {
              alert("Please enter a valid year on Item 1.");
              return;
          }
         
          if (document.getElementById('frm1606:txtDateYear').value * 1 < 1904) {
              alert("Invalid year entry on Item no.1. Year should not be lower than 1904.")
              return;
          }

          if (document.getElementById('frm1606:j_id217:_1').checked == false && document.getElementById('frm1606:j_id217:_2').checked == false) {
              alert("Please choose amended return on item 2.")
              return;
          }
          if (document.getElementById('frm1606:j_id252:_1').checked == false && document.getElementById('frm1606:j_id252:_2').checked == false) {
              alert("Please select an option for Item 4.")
              return;
          }
          if ((document.getElementById('frm1606:txtTIN1').value == "")) {
              alert("Please enter the Buyer's TIN.")
              return;
          }
          if ((document.getElementById('frm1606:txtTIN2').value == "")) {
              alert("Please enter the Buyer's TIN.")
              return;
          }
          if ((document.getElementById('frm1606:txtTIN3').value == "")) {
              alert("Please enter the Buyer's TIN.")
              return;
          }
          if ((document.getElementById('frm1606:txtBranchCode').value == "")) {
              alert("Please enter the Buyer's TIN.")
              return;
          }
         
          if ((document.getElementById('frm1606:txtTINS1').value == "")) {
              alert("Please enter the Seller's TIN.")
              return;
          }
          if ((document.getElementById('frm1606:txtTINS2').value == "")) {
              alert("Please enter the Seller's TIN.")
              return;
          }
          if ((document.getElementById('frm1606:txtTINS3').value == "")) {
              alert("Please enter the Seller's TIN.")
              return;
          }
          if ((document.getElementById('frm1606:txtBranchCodeS').value == "")) {
              alert("Please enter the Seller's TIN.")
              return;
          }
          if (buyer.localeCompare(seller) == 0) {
              alert("TIN for Buyer and Seller should be different.")
              return;
          }
          if ((document.getElementById('frm1606:txtRDOCodeS').selectedIndex == 0)) {
              alert("Please enter the Seller's RDO Code.")
              return;
          }
          if ((document.getElementById('frm1606:txtBuyerName').value == "")) {
              alert("Please enter the Buyer's Name.")
              return;
          }
          if ((document.getElementById('frm1606:txtSellerName').value == "")) {
              alert("Please enter the Seller's Name.")
              return;
          }
          if ((document.getElementById('frm1606:txtBuyerAddress').value == "")) {
              alert("Please enter the Buyer's Address.")
              return;
          }
          if (document.getElementById('frm1606:optATC13_2').checked == false && document.getElementById('frm1606:optATC13_3').checked == false) {
              alert("Please select an option for Item 13.");
              return;
          }
          if (document.getElementById('frm1606:j_id392:_1').checked == false && document.getElementById('frm1606:j_id392:_2').checked == false) {
              alert("Please select an option for Item 14.");
              return;
          }
          if (document.getElementById('frm1606:j_id393:_1').checked == false && document.getElementById('frm1606:j_id393:_2').checked == false && document.getElementById('frm1606:j_id393:_3').checked == false && document.getElementById('frm1606:j_id393:_4').checked == false && document.getElementById('frm1606:j_id393:_5').checked == false && document.getElementById('frm1606:j_id393:_6').checked == false && document.getElementById('frm1606:j_id393_8').checked == false) {
              alert("Please select an option for Item 15.");
              return;
          }
          if ((document.getElementById('frm1606:txtLocation').value == "")) {
              alert("Please enter the Location of the Property on Item 16.")
              return;
          }
       if ((document.getElementById('frm1606:txtRDOCode16A').selectedIndex == 0)) {
              alert("Please enter the RDO Code on Item 16A.")
              return;
          }
          if ((document.getElementById('frm1606:txtTCT').value == "")) {
              alert("Please enter the TCT/OCT/CCT No.")
              return;
          }
         
          if (document.getElementById('frm1606:rdTreaty:_1').checked == true && (document.getElementById('frm1606:selTreaty').selectedIndex == 0)) {
              alert("Please select a tax relief for Item 19.")
              return;
          }

          document.getElementById('frm1606:cmdValidate').disabled = true;
          document.getElementById('frm1606:cmdEdit').disabled = false;
          d.getElementById('btnUpload').disabled = false;
          
          disableAllControl();
          //if (flag) {
              alert("Validation successful. Click on 'Edit' if you wish to modify your entries.");
              return;
          //}
      }

      function enableSelTreaty() {
          if (document.getElementById('frm1606:j_id392:_1').checked == false && document.getElementById('frm1606:j_id392:_2').checked == false) {
              alert("Please select an option for Item 14."); return;
              document.getElementById('frm1606:rdTreaty:_2').checked = true;
          } else {
              document.getElementById('frm1606:selTreaty').disabled = false;
              document.getElementById('frm1606:selTreaty').selectedIndex = 0;


          }
      }

      function disableSelTreaty() {
          document.getElementById('frm1606:selTreaty').disabled = true;
          document.getElementById('frm1606:selTreaty').selectedIndex = 0;
      }


      function computeOfTaxRequired() {
          
          document.getElementById('frm1606:txtTaxR').value = formatCurrency(NumWithComma(document.getElementById('frm1606:txtTax').value) * NumWithComma(document.getElementById('frm1606:txtTaxRate').value) * 1 / 100);
          computeTaxDue();
      }
      function computeTaxDue() {
          
          document.getElementById('frm1606:txtTaxDue').value = formatCurrency(NumWithComma(document.getElementById('frm1606:txtTaxR').value) - NumWithComma(document.getElementById('frm1606:txtLess').value));
          computeOfTotalAmtDue();
      }

      function computePenalties() {
          document.getElementById('frm1606:txtTotalPenalties').value = formatCurrency(NumWithComma(document.getElementById('frm1606:txtSurcharge').value) * 1 + NumWithComma(document.getElementById('frm1606:txtInterest').value) * 1 + NumWithComma(document.getElementById('frm1606:txtCompromise').value) * 1);
          computeOfTotalAmtDue();
      }
      function computeOfTotalAmtDue() {
          document.getElementById('frm1606:txtTotal').value = formatCurrency(NumWithComma(document.getElementById('frm1606:txtTotalPenalties').value) * 1 + NumWithComma(document.getElementById('frm1606:txtTaxDue').value) * 1);
          if (NumWithComma(document.getElementById('frm1606:txtTotal').value) < 0) {
              document.getElementById('frm1606:opt37:_1').disabled = false;
              document.getElementById('frm1606:opt37:_2').disabled = false;
          }
          else {
              document.getElementById('frm1606:opt37:_1').disabled = true;
              document.getElementById('frm1606:opt37:_2').disabled = true;
              document.getElementById('frm1606:opt37:_1').checked = false;
              document.getElementById('frm1606:opt37:_2').checked = false;
          }
          capital();
      }



      function checkTIN(e) {
         
          if (isNaN(e.value)) {
              alert("Please enter a valid TIN");
              e.value = "";
              return;
          }
          if (e.value.length < 12) {
              alert("TIN should not be less 12 digits.")
              return;
          }

      }

      function checkiftaxwheldisYes() {
          if (document.getElementById('frm1606:j_id252:_1').checked == false && document.getElementById('frm1606:j_id252:_2').checked == false) {
              return "Please select an option for Item 4.";
          }
          else if (document.getElementById('frm1606:j_id392:_1').checked == false && document.getElementById('frm1606:j_id392:_2').checked == false) {
              return "Please select an option for Item 14.";
          }
          else if (document.getElementById('frm1606:j_id252:_1').checked == true) {
              return true;
          }
      }


      function checkTINlength(e) {

          if (e.length < 12) {
              alert("TIN not valid"); return;
              e.onfocus;
          }
      }

      function enableInstallment() {
          document.getElementById('frm1606:txtSelling').disabled = false;
          document.getElementById('frm1606:txtCost').disabled = false;
          document.getElementById('frm1606:txtMortgage').disabled = false;
          document.getElementById('frm1606:txtTotalP').disabled = false;
          document.getElementById('frm1606:txtAmount').disabled = false;
          document.getElementById('frm1606:txtTotalN').disabled = false;
          document.getElementById('frm1606:txtOthers20').disabled = true;
          document.getElementById('frm1606:opt28D').disabled = false;
          document.getElementById('frm1606:txtInstallment').disabled = false;
          document.getElementById('frm1606:opt28C').disabled = false;
          document.getElementById('frm1606:txtBid').disabled = false;
          document.getElementById('frm1606:opt28E').disabled = false;
          document.getElementById('frm1606:txtOthers28E').disabled = false;
         
      }

      function enableExempt() {
          document.getElementById('frm1606:txtSelling').disabled = true;
          document.getElementById('frm1606:txtCost').disabled = true;
          document.getElementById('frm1606:txtMortgage').disabled = true;
          document.getElementById('frm1606:txtTotalP').disabled = true;
          document.getElementById('frm1606:txtAmount').disabled = true;
          document.getElementById('frm1606:txtTotalN').disabled = true;
          document.getElementById('frm1606:txtOthers20').disabled = false;
          
          document.getElementById('frm1606:txtSelling').value = "";
          document.getElementById('frm1606:txtCost').value = "";
          document.getElementById('frm1606:txtMortgage').value = "";
          document.getElementById('frm1606:txtTotalP').value = "";
          document.getElementById('frm1606:txtAmount').value = "";
          document.getElementById('frm1606:txtTotalN').value = "";
      }

      function cashSale() {
          document.getElementById('frm1606:txtSelling').disabled = true;
          document.getElementById('frm1606:txtCost').disabled = true;
          document.getElementById('frm1606:txtMortgage').disabled = true;
          document.getElementById('frm1606:txtTotalP').disabled = true;
          document.getElementById('frm1606:txtAmount').disabled = true;
          document.getElementById('frm1606:txtTotalN').disabled = true;
          document.getElementById('frm1606:txtSelling').value = "";
          document.getElementById('frm1606:txtCost').value = "";
          document.getElementById('frm1606:txtMortgage').value = "";
          document.getElementById('frm1606:txtTotalP').value = "";
          document.getElementById('frm1606:txtAmount').value = "";
          document.getElementById('frm1606:txtTotalN').value = "";
          document.getElementById('frm1606:txtOthers20').disabled = true;
          document.getElementById('frm1606:opt28D').disabled = true;
          document.getElementById('frm1606:txtInstallment').disabled = true;
          document.getElementById('frm1606:opt28C').disabled = true;
          document.getElementById('frm1606:txtBid').disabled = true;
          document.getElementById('frm1606:opt28E').disabled = true;
          document.getElementById('frm1606:txtOthers28E').disabled = true;
          document.getElementById('frm1606:opt28B').disabled = false;
          document.getElementById('frm1606:txtFMVLI').disabled = false;
          document.getElementById('frm1606:opt28A').disabled = false;
          document.getElementById('frm1606:txtGross').disabled = false;
          document.getElementById('frm1606:opt27A').disabled = false;
          document.getElementById('frm1606:txtFMVLand').disabled = false;
          document.getElementById('frm1606:opt27C').disabled = false;
          document.getElementById('frm1606:txtFMVZonal').disabled = false;
          document.getElementById('frm1606:opt27B').disabled = false;
          document.getElementById('frm1606:txtFMVImprovements').disabled = false;
          document.getElementById('frm1606:opt27D').disabled = false;
          document.getElementById('frm1606:txtFMVBIR').disabled = false;
          document.getElementById('frm1606:txtInstallment').value = "";
          document.getElementById('frm1606:txtBid').value = "";
          document.getElementById('frm1606:txtOthers28E').value = "";
          document.getElementById('frm1606:txtOtherss28E').value = "";
      }

      function foreclosure() {
          document.getElementById('frm1606:txtSelling').disabled = true;
          document.getElementById('frm1606:txtCost').disabled = true;
          document.getElementById('frm1606:txtMortgage').disabled = true;
          document.getElementById('frm1606:txtTotalP').disabled = true;
          document.getElementById('frm1606:txtAmount').disabled = true;
          document.getElementById('frm1606:txtTotalN').disabled = true;
          document.getElementById('frm1606:txtOthers20').disabled = true;
         
          document.getElementById('frm1606:txtInstallment').value = "";
          document.getElementById('frm1606:txtOthers28E').value = "";
          document.getElementById('frm1606:txtOtherss28E').value = "";
          document.getElementById('frm1606:txtFMVLI').value = "";
          document.getElementById('frm1606:txtGross').value = "";
          document.getElementById('frm1606:txtFMVLand').value = "";
          document.getElementById('frm1606:txtFMVZonal').value = "";
          document.getElementById('frm1606:txtFMVImprovements').value = "";
          document.getElementById('frm1606:txtFMVBIR').value = "";
          document.getElementById('frm1606:txtSelling').value = "";
          document.getElementById('frm1606:txtCost').value = "";
          document.getElementById('frm1606:txtMortgage').value = "";
          document.getElementById('frm1606:txtTotalP').value = "";
          document.getElementById('frm1606:txtAmount').value = "";
          document.getElementById('frm1606:txtTotalN').value = "";
      }



      function computeFMVLI() {
          var tax27aa = (1 * document.getElementById('frm1606:txtFMVLand').value).toFixed(2);
          var tax27bb = (1 * document.getElementById('frm1606:txtFMVZonal').value).toFixed(2);
          var tax27cc = (1 * document.getElementById('frm1606:txtFMVImprovements').value).toFixed(2);
          var tax27dd = (1 * document.getElementById('frm1606:txtFMVBIR').value).toFixed(2);
          //document.getElementById('frm1606:txtFMVLI').value =   (1 * tax27aa  + tax27bb*1 + tax27cc*1 + tax27dd*1).toFixed(2);
          compareFMVLI();
      }
      function compareFMVLI() {

          var FMV27ab = NumWithComma(document.getElementById('frm1606:txtFMVLand').value) + NumWithComma(document.getElementById('frm1606:txtFMVImprovements').value);
          var FMV27cd = NumWithComma(document.getElementById('frm1606:txtFMVZonal').value) + NumWithComma(document.getElementById('frm1606:txtFMVBIR').value);
          
          if ((FMV27ab > FMV27cd)) {
              document.getElementById('frm1606:txtFMVLI').value = formatCurrency(FMV27ab);
          }
          else {
              document.getElementById('frm1606:txtFMVLI').value = formatCurrency(FMV27cd);
          }
          computeTaxableBase();

      }
      
      function computeTaxableBase() {
          if (document.getElementById('frm1606:j_id395:_3').checked)
              document.getElementById('frm1606:txtSelling').value = document.getElementById('frm1606:txtGross').value;

          var TaxBase = NumWithComma(document.getElementById('frm1606:txtTax').value);
          var Gross = NumWithComma(document.getElementById('frm1606:txtGross').value);
          var FMVLI = NumWithComma(document.getElementById('frm1606:txtFMVLI').value);
          var Bid = NumWithComma(document.getElementById('frm1606:txtBid').value);
          var Installment = NumWithComma(document.getElementById('frm1606:txtInstallment').value);
          var Others = NumWithComma(document.getElementById('frm1606:txtOthers28E').value);

          if (Gross >= FMVLI) {
              document.getElementById('frm1606:txtTax').value = formatCurrency(Gross);
          }
          if (FMVLI >= Gross) {
              document.getElementById('frm1606:txtTax').value = formatCurrency(FMVLI);
          }
          if (document.getElementById('frm1606:j_id395:_4').checked == true && FMVLI >= Bid) {
              document.getElementById('frm1606:txtTax').value = formatCurrency(FMVLI);
          }
          if (document.getElementById('frm1606:j_id395:_4').checked == true && Bid >= FMVLI) {
              document.getElementById('frm1606:txtTax').value = formatCurrency(Bid);
          }
          if (document.getElementById('frm1606:j_id395:_3').checked == true) {
              document.getElementById('frm1606:txtTax').value = formatCurrency(Installment);
          }
          if (document.getElementById('frm1606:j_id395:_2').checked == true || document.getElementById('frm1606:j_id395:_5').checked == true) {
              document.getElementById('frm1606:txtTax').value = formatCurrency(Others);
          }
          computeOfTaxRequired();
      }

      function tickCheckboxWithValue(obj) {

          if (obj.id == 'frm1606:txtFMVLand') {
              document.getElementById('frm1606:opt27A').checked = true;
          }
          else if (obj.id == 'frm1606:txtFMVImprovements') {
              document.getElementById('frm1606:opt27B').checked = true;
          }
          else if (obj.id == 'frm1606:txtFMVZonal') {
              document.getElementById('frm1606:opt27C').checked = true;
          }
          else if (obj.id == 'frm1606:txtFMVBIR') {
              document.getElementById('frm1606:opt27D').checked = true;
          }
      }

      function blockletter(e) {
          var number = parseFloat(e.value).toFixed(2);
          if (isNaN(number)) {
              var zero = 0;
              e.value = parseFloat(zero).toFixed(2);
          } else {
              e.value = '' + number;
          }
      }

      function disablePart2() {
          document.getElementById('frm1606:txtTax').disabled = true;
          document.getElementById('frm1606:txtTaxRate').disabled = true;
          document.getElementById('frm1606:txtTaxR').disabled = true;
          document.getElementById('frm1606:txtLess').disabled = true;
          document.getElementById('frm1606:txtTaxDue').disabled = true;
          document.getElementById('frm1606:txtSurcharge').disabled = true;
          document.getElementById('frm1606:txtInterest').disabled = true;
          document.getElementById('frm1606:txtCompromise').disabled = true;
          document.getElementById('frm1606:txtTotalPenalties').disabled = true;
          document.getElementById('frm1606:txtTotal').disabled = true;
          document.getElementById('frm1606:opt37:_1').disabled = true;
          document.getElementById('frm1606:opt37:_2').disabled = true;
          document.getElementById('frm1606:opt37:_1').checked = false;
          document.getElementById('frm1606:opt37:_2').checked = false;
      }

      function enablePart2() {
          document.getElementById('frm1606:txtTax').disabled = true;
          document.getElementById('frm1606:txtTaxRate').disabled = false;
          document.getElementById('frm1606:txtTaxR').disabled = true;
          document.getElementById('frm1606:txtLess').disabled = true;
          document.getElementById('frm1606:txtTaxDue').disabled = true;
          document.getElementById('frm1606:txtSurcharge').disabled = false;
          document.getElementById('frm1606:txtInterest').disabled = false;
          document.getElementById('frm1606:txtCompromise').disabled = false;
          document.getElementById('frm1606:txtTotalPenalties').disabled = true;
          document.getElementById('frm1606:txtTotal').disabled = true;
          document.getElementById('frm1606:opt37:_1').disabled = true;
          document.getElementById('frm1606:opt37:_2').disabled = true;
          document.getElementById('frm1606:opt37:_1').checked = false;
          document.getElementById('frm1606:opt37:_2').checked = false;
      }

      function initialValidateBeforeSave() {
          if ((d.getElementById('frm1606:txtTIN1').value == "" || d.getElementById('frm1606:txtTIN2').value == "" || d.getElementById('frm1606:txtTIN3').value == "" || d.getElementById('frm1606:txtBranchCode').value == "")) {
              alert("Please enter a valid TIN number on Item 5.");
              return false;
          }
          if ((d.getElementById('frm1606:txtRDOCode').value == "000")) {
              alert("Please enter a valid Buyer's RDO Code on Item 6.");
              return false;
          }
          if ((d.getElementById('frm1606:txtBuyerName').value == "")) {
              alert("Please enter a valid Buyer's Name on Item 9.");
              return false;
          }
          if ((document.getElementById('frm1606:txtTCT').value == "")) {
              alert("Please enter the TCT/OCT/CCT No.")
              return false;
          }
          return true;
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

          $('#bg').hide();//990
          $('.printSignFooterClass').css({ 'width': '94%', 'margin': 'auto', 'margin-top': '15px', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
          $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
          
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
          $('#formPaper').css({'margin-top':'-110px' });

          window.print();

          $('.printButtonClass').show();
          $("#formPaper").show();
          $('#formPaper').css({'border':'#a7a7a7 1px solid','margin-top':'0px' });
          $('.imgClass').css({ 'display':'none'});

          $('#printMenu').show('blind');
          if ($('#formMenu').css('display') != 'none') {
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
                save('1606',data);
                
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
        saveAndExit('1606',data);
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

        submitAndSave('1606', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1606';
    } 
</script>
@endsection