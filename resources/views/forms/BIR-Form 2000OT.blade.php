@extends('layouts.app')
@section('title', '| BIR Form No. 2000OT')
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
        <button type="button" class="btn btn-danger btn-exit" id="2000OT" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="2000OT" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='2000OT' company='{{$company->id}}'>Okay</button>
        </div>
    </div>
  </div>
</div>
<form id="frmMain" name="frmMain">
@csrf
        <input type="hidden" name="company" value="{{ $company->id }}">
        <input type="hidden" name="form_no" value="{{ $action == 'new' ? $form_no : $data->form_no }}">
        <input type="hidden" name="form_id" value="{{ $action == 'new' ? '' : $data->id }}">
        <input type="hidden" name="file_name" id="file_name" value="{{ $action == 'new' ? '' : '/savefile/'.$xml[0]->file_name }}">

        <div id="container">
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 858px; ">
                <div id="formPaper">
                    <div id="Content">
                        <table width="858" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table width="858" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
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
                                                <font size="4px" style="font-weight:bold;">DocumentaryStamp<br /></font>
                        <font size="4px" style="font-weight:bold;">Tax Declaration/Return<br /></font>
                        <font size="4px" style="font-weight:bold;">(ONE - TIME TRANSACTIONS)</font>
                      </td>
                                            <td width="145" valign="center">
                                                <font face="Arial" size="1px">BIR Form No.<br/></font>
                                                <font face="Arial" size="6px">2000-OT<br/></font>
                                                <font face="Arial" size="1px">June 2006 (ENCS)</font>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="852" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="180" rowspan="2" valign="top" class="tblFormTd">
                                                <table style="height:0px">
                                                    <tr>
                                                        <td width="190" height="0px"><table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="15"><font size="2" style="font-weight:bold">&nbsp;1&nbsp;</font></td>
                                                                    <td width="176"><font size="1" style="font-size: 11px;">Date of Transaction (MM/DD/YYYY) </font></td>
                                                                </tr>
                                                            </table>
                            </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="0px">&nbsp;<input type="text" id="frm2000_OT:txtDateMonth" name="frm2000OT:txtDateMonth" maxlength="2" size="2" style="text-align: right" value="" onKeyPress="return wholenumber(this, event)" title="Please supply a valid month." />
                                        <input type="text" id="frm2000_OT:txtDateDay" name="frm2000OT:txtDateDay" maxlength="2" size="2" style="text-align: right" value="" onKeyPress="return wholenumber(this, event)" title="Please supply a valid day." />
                                        <input type="text" id="frm2000_OT:txtDateYear" name="frm2000OT:txtDateYear" maxlength="4" size="4" style="text-align: right" value="" onKeyPress="return wholenumber(this, event)" title="Please supply a valid year." />
                            </td>
                                                    </tr>
                                                </table>
                      </td>
                                            <td width="153" valign="top" class="tblFormTd">
                                                <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm2000OT:j_id217" class="iceSelOneRb-dis fieldText1-dis">
                                                                <div align="center" style="padding: 1px 0 1px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="radio" value="Y" name="frm2000OT:AmendedRtn" id="frm2000OT:AmendedRtn_1" onclick="document.getElementById('frm2000OT:txtLess').disabled = false;" /><label for="frm2000OT:AmendedRtn_1" class=" fieldText1-dis-dis" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                <td><input type="radio" value="N"  name="frm2000OT:AmendedRtn" id="frm2000OT:AmendedRtn_2" onclick="document.getElementById('frm2000OT:txtLess').disabled = true;d.getElementById('frm2000OT:txtLess').value = '0.00';computeOverpayment();" checked="checked" /><label for="frm2000OT:AmendedRtn_2" class=" fieldText1-dis-dis" style="font-size:12px;" >No</label></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="158" valign="top" class="tblFormTd">
                                                <table width="152" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">No. of Sheets Attached?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" value="0" style="text-align: right;" size="4" name="frm2000OT:txtSheets" maxlength="2" id="frm2000OT:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="147" valign="top" class="tblFormTd">
                                                <table width="140" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><a href="#" id="btnATC" onclick="showATCDiv()" style="font-size: 11px;">ATC<!--<input type="button" class="printButtonClass" id="btnATC" onclick="showATCDiv()"  value="ATC" />--> </a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <div align="center" style="padding: 1px 0 1px 0;">
                                <div align="left"><font color="black" face="Arial" size="2">
                                  <input  disabled="true" id="frm2000OT:txtATC" maxlength="5" name="frm2000OT:txtATC" size="8" style="background-color: #dcdcdc;" type="text" value="" />
                                                                        </font></div>
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
                                    <table width="852" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="739" height="0px" border="0" cellpadding="0" cellspacing="0">
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
                                    <table style="width: 852" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="300" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->tin1}}" size="4"  maxlength="3" id="frm2000OT:txtTIN1" name="frm2000OT:txtTIN1" onKeyPress="return wholenumber(this, event)" />
                                                                <input type="text" value="{{$company->tin2}}" size="4"  maxlength="3" id="frm2000OT:txtTIN2" name="frm2000OT:txtTIN2"  onKeyPress="return wholenumber(this, event)" />
                                                                <input type="text" value="{{$company->tin3}}" size="4"  maxlength="3" id="frm2000OT:txtTIN3" name="frm2000OT:txtTIN3"  onKeyPress="return wholenumber(this, event)" />
                                                                <input type="text" value="{{$company->tin4}}" size="4" maxlength="3" id="frm2000OT:txtBranchCode" name="frm2000OT:txtBranchCode"  onKeyPress="return letternumber(event)" />
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="150" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                        <td id="rdoSelect">
                                                            <select class='iceSelOneMnu' id='frm2000OT:txtRDOCode' disabled="" name='frm2000OT:txtRDOCode' size='1' >
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
                                                                <input type="text" value="{{$company->tel_number}}"  disabled=""  size="20" name="frm2000OT:txtTelNum" maxlength="30" id="frm2000OT:txtTelNum" onKeyPress="return wholenumber(this, event)" />
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
                                    <table width="852" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="852" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Taxpayer's Name (For Individual) (Last Name, First Name, Middle Name/(For Non-individuals) Registered Name</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text"  disabled=""  value="{{$company->registered_name}}" size="80" name="frm2000OT:txtTaxpayerName" maxlength="80" id="frm2000OT:txtTaxpayerName" class="iceInpTxt-dis" onblur="return capital(this, event)" /></td>
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
                                    <table width="852" border="0" cellspacing="0" cellpadding="0" class="tblForm">
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
                                                                    <td><input type="text"  disabled=""  value="{{$company->address}}" size="80" name="frm2000OT:txtAddress" maxlength="80" id="frm2000OT:txtAddress" onblur="return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="149" valign="top" class="tblFormTd">
                                                <table width="148" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="148"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font><font size="1" style="font-size: 11px;">Zip
                                                                Code</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <input type="text"  disabled=""  value="{{$company->zip_code}}" size="10" name="frm2000OT:txtZipCode" maxlength="5" id="frm2000OT:txtZipCode" onKeyPress="return wholenumber(this, event)" />
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
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="852" height="0px">
                                        <tr>
                                            <td valign="top" class="tblFormTd"><table border="0" width="718">
                                                    <tr>
                                                        <td width="66"><font color="black" face="Arial, Helvetica, sans-serif" size="2"><b>Part II</b></font></td>
                                                        <td align="center"><font color="black" face="Arial, Helvetica, sans-serif" size="2"><b>D e t a i l s&nbsp; o f&nbsp; T r a n s a c t i o n s</b></font></td>
                                                    </tr>
                                                </table>                                                                    </td>
                                        </tr>
                                        <tr>
                                            <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="852">
                                        <td class="tblFormTd" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="150">&nbsp;<font size="2" style="font-weight:bold;">11&nbsp;</font><font size="1" style="font-size: 11px;">Nature of Transaction</font></td>
                                                </tr>
                          <tr>
                            <td>
                                                            <div align="left">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:840px;" id="frm2000OT:j_id393" class="iceSelOneRb fieldText1">
                                                                    <div align="left" style="padding: 1px 0 1px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                            <tbody>
                                                                                <tr>
                                          <tr>
                                            <td width="250" colspan="2">&nbsp;&nbsp;<label><font size="1" style="font-weight:bold;" >11A&nbsp;</font></label><input type="radio" value="C" name="frm2000OT:NatureOfTrans" id="frm2000OT:NatureOfTrans_1" onclick="transferOfRealProperty()" /><label for="frm2000OT:j_id393:_1" class="iceSelOneRb fieldText1" style="font-size:10px;" >Transfer of Real Property classified as capital asset&nbsp;</label>&nbsp;</td>
                                            
                                            <td width="280" colspan="2">
                                            <input type="radio" value="S" name="frm2000OT:NatureOfTrans" id="frm2000OT:NatureOfTrans_3" onclick="transferOfShares()" />
                                            <label for="frm2000OT:j_id393:_3" class="iceSelOneRb fieldText1" style="font-size:10px;width: 358px;vertical-align: inherit;" >&nbsp;Transfer of shares of stock not traded through the local stock exchange (Does not include original issue of shares of stock by the issuing corporation)&nbsp;&nbsp;</label></td>
                                          </tr>
                                          <tr>
                                            <td colspan="2" style="margin-left: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="O" style="margin-left: 3px;" name="frm2000OT:NatureOfTrans" id="frm2000OT:NatureOfTrans_2" onclick="transferOfRealProperty()" /><label for="frm2000OT:j_id393:_2"  class="iceSelOneRb fieldText1" style="font-size:10px;" >&nbsp;Transfer of Real Property classified as ordinary asset&nbsp;&nbsp;</label></td>
                                          </tr>
                                          
                                          <tr>
                                            <td><font size="1" style="font-weight:bold;">&nbsp;11B&nbsp;</font><font size="1" style="font-weight:;font-size: 10px;">&nbsp;(Seller/Transferror)&nbsp;<td></font><input id="frm2000OT:txtSeller" maxlength="30" name="frm2000OT:txtSeller" size="25" type="text" value="" onblur="return capital(this, event)" /></td></td>
                                            <td><font size="1" style="font-weight:bold;">&nbsp;11C&nbsp;</font><font size="1" style="font-weight:;font-size: 10px;">&nbsp;(Buyer/Transferee)&nbsp;<td></font><input id="frm2000OT:txtBuyer" maxlength="30" name="frm2000OT:txtBuyer" size="25" type="text" value="" onblur="return capital(this, event)" /></td></td>
                                          </tr>
                                          <tr>
                                            <td><font size="1" style="font-weight:bold;">&nbsp;11D&nbsp;</font><font size="1" style="font-weight:;font-size: 10px;">&nbsp;Taxpayer Identification Number&nbsp;<td></font><input id="frm2000OT:txtTINS" maxlength="12" name="frm2000OT:txtTINS" size="25" type="text" value="" onkeypress="return numbersonly(this, event)" /></td></td>
                                            <td><font size="1" style="font-weight:bold;">&nbsp;11E&nbsp;</font><font size="1" style="font-weight:;font-size: 10px;">&nbsp;Taxpayer Identification Number&nbsp;<td></font><input id="frm2000OT:txtTINB" maxlength="12" name="frm2000OT:txtTINB" size="25" type="text" value="" onkeypress="return numbersonly(this, event)" /></td></td>
                                          </tr>
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
                                    </table>
                </td>
                                        </tr>
                    <tr>
                <table width="852" border="0" cellspacing="0" cellpadding="0" class="tblForm">                 
                  <td width="50%" valign="top" class="tblFormTd">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="11"><font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font></td>
                                                            <td><font size="1" style="font-size: 11px;">Brief Description of the Property Sold  (attach additional sheet/s if necessary)</font></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                      <td>
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="3">&nbsp;</td>
                                                        <td width="110"><input id="frm2000OT:opt12_1" name="frm2000OT:opt12" value="R" type="radio"/>
                                                            <font size="1">
                                                                <label for="frm2000OT:opt12_1" style="font-size: 11px;">Real Property</label>
                                                            </font>
                            </td>
                                                    </tr>
                          <tr>
                                                        <td width="25">&nbsp;</td>
                            <td><label size="1" style="font-size: 11px;">Location of Real Property&nbsp;</label></td>
                                                        <td><input type="text" value="" size="50" name="frm2000OT:txtLRP" maxlength="50" id="frm2000OT:txtLRP" /></td>
                            <td><font size="1" style="font-size: 11px;">&nbsp;&nbsp;RDO Code of Location of Property</font></td>
                                                        <td><input type="text" value="" size="10" name="frm2000OT:txtRDOLP" maxlength="3" id="frm2000OT:txtRDOLP" /></td>
                          </tr>
                        </table>
                                            </td>
                                        </table>
              <tr>
                <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="852">
                                        <td class="tblFormTd" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="160">&nbsp;<font size="2" style="font-weight:bold;">12A&nbsp;</font><font size="1" style="font-size: 11px;">Classification of Real Property</font></td>
                                                </tr>
                          <tr>
                            <td>
                                                            <div align="left">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:800px;" id="frm2000OT:j_id393" class="iceSelOneRb fieldText1">
                                                                    <div align="left" style="padding: 1px 0 1px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>&nbsp;&nbsp;<input type="radio" value="R" name="frm2000OT:ClassRealProp" id="frm2000OT:ClassRealProp_1" onclick="disableClassRealProptxt()" /><label for="frm2000OT:j_id393:_1" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Residential&nbsp;</label>&nbsp;</td>
                                          <td><input type="radio" value="C" name="frm2000OT:ClassRealProp" id="frm2000OT:ClassRealProp_3" onclick="disableClassRealProptxt()" /><label for="frm2000OT:j_id393:_3"  class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Commercial&nbsp;&nbsp;</label></td>
                                          <td><input type="radio" value="CR" name="frm2000OT:ClassRealProp" id="frm2000OT:ClassRealProp_5" onclick="disableClassRealProptxt()"  /><label for="frm2000OT:j_id393:_5" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Condominium Residential&nbsp;</label></td>
                                          <td><label style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Others (Specify)&nbsp;</><input id="frm2000OT:ClassRealProp_7" name="frm2000OT:ClassRealProp" type="radio" value="1" onclick="enableClassRealProptxt()"/></td>
                                          <td>&nbsp;<input id="frm2000OT:ClassRealProptxt" maxlength="60" name="frm2000OT:ClassRealProptxt" size="30" type="text" value="" /></td>
                                          <tr>
                                            <td>&nbsp;&nbsp;<input type="radio" value="A" name="frm2000OT:ClassRealProp" id="frm2000OT:ClassRealProp_2" onclick="disableClassRealProptxt()" /><label for="frm2000OT:j_id393:_2"  class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Agricultural&nbsp;&nbsp;</label></td>
                                            <td><input type="radio" value="I" name="frm2000OT:ClassRealProp" id="frm2000OT:ClassRealProp_4" onclick="disableClassRealProptxt()" /><label for="frm2000OT:j_id393:_4"  class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Industrial&nbsp;&nbsp;</label></td>
                                            <td><input type="radio" value="CC" name="frm2000OT:ClassRealProp" id="frm2000OT:ClassRealProp_6" onclick="disableClassRealProptxt()" /><label for="frm2000OT:j_id393:_6"  class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Condominium Commercial&nbsp;</label></td>
                                          </tr>
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
                                    </table>
                </td>
              </tr>
              <tr>
                <table width="852" border="0" cellspacing="0" cellpadding="0" class="tblForm">                 
                  <td width="50%" valign="top" class="tblFormTd">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>
                                                    <table border="0" cellspacing="0" cellpadding="0"></table>
                                                </td>
                                            </tr>
                        <td>
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="25">&nbsp;</td>
                              <td><font size="1" style="font-weight:bold;">&nbsp;12B</font><font size="1" style="font-size: 11px;"> Area of Property Sold (sq. m.)&nbsp;</font></td>
                                                            <td><input type="text" value=""  size="15" name="frm2000OT:txt12B" maxlength="20" id="frm2000OT:txt12B" style="text-align:right" /></td>
                              <td><font size="1" style="font-weight:bold;">&nbsp;&nbsp;12C&nbsp;</font><font size="1" style="font-size: 11px;">TCT/OCT/CCT No.&nbsp;</font></td>
                                                            <td><input type="text" value=""  size="15" name="frm2000OT:txt12C" maxlength="20" id="frm2000OT:txt12C" /></td>
                              <td><font size="1" style="font-weight:bold;">&nbsp;&nbsp;12D&nbsp;</font><font size="1" style="font-size: 11px;">Tax Dec. No.&nbsp;</font></td>
                                                            <td><input type="text" value=""  size="15" name="frm2000OT:txt12D" maxlength="20" id="frm2000OT:txt12D" /></td>
                            </tr>
                          </table>
                                                </td>
                                        </table>
                                    </td>
                </table>
              </tr>
              <tr>
                <table width="852" border="0" cellspacing="0" cellpadding="0" class="tblForm">                 
                  <td width="50%" valign="top" class="tblFormTd">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>
                                                    <table border="0" cellspacing="0" cellpadding="0"></table>
                                                </td>
                                            </tr>
                        <td>
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="25">&nbsp;</td>
                              <td><font size="1" style="font-weight:bold;">&nbsp;12E</font><font size="1" style="font-size: 11px;"> Selling Price&nbsp;</font></td>
                                                            <td><input type="text" value="" size="20" name="frm2000OT:txt12E" maxlength="40" id="frm2000OT:txt12E" style="text-align:right" onkeypress="return numbersonly(this, event)" onblur="round(this,2); TaxBaseRealProperty()" /></td> <!--;TaxBaseRealProperty()-->
                              <td><font size="1" style="font-weight:bold;">&nbsp;&nbsp;12F&nbsp;</font><font size="1" style="font-size: 11px;"> Fair Market Value of Property Sold (<a href="#" id="btnSched1" onclick="showSched1ATCDiv()">Schedule 1<!--<input type="button" class="printButtonClass" value="Schedule 1" id="btnSched1" onclick="showSched1ATCDiv()"  />-->)&nbsp;</a></font></td>
                                                            <td><input type="text" value="0.00" size="20" name="frm2000OT:txt12F" maxlength="40" style="text-align:right" id="frm2000OT:txt12F" onblur="TaxBaseRealProperty()" disabled /></td><!-- -->
                            </tr>
                          </table>
                                                </td>
                                        </table>
                                    </td>
                </table>
              </tr>
              <td>
                                <table width="852" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        
                                        <td width="852" valign="top" class="tblFormTd"><table width="400" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="800"><table width="852" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td width="3">&nbsp;</td>
                                                                <td width="110"><input id="frm2000OT:opt12_2" name="frm2000OT:opt12G" value="R" type="radio"/>
                                                                    <font size="1">
                                                                        <label for="frm2000OT:opt12_2" style="font-size: 11px;">Shares of Stocks not Traded in the Local Stock Exchange</label>
                                                                    </font> </td>
                                                            </tr>
                                                        </table>
                          </td>
                                                </tr>
                                            </table>
                    </td>
                    <tr>
                      <td><font size="1" style="font-weight:bold;">&nbsp;12G&nbsp;</font><font size="1" style="font-weight:;font-size: 11px;">&nbsp;Name of Corporate Stock&nbsp;</font><input id="frm2000OT:txt12G" maxlength="60" name="frm2000OT:txt12G" size="60" type="text" value="" /></td>
                    </tr>
                  </tr>
                                </table>
                            </td>
              <tr>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="852" style="height: 0px">
                                        <tr>
                                            <td class="tblFormTd" valign="top" width="100%">
                                                <table width="800" border="0" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                        <td>
                                                            <div align="left" style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:800px;padding: 1px 0 1px 0">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <tbody>
                                                                        <tr>
                                      <td><font size="1" style="font-weight:bold;">&nbsp;12H&nbsp;</font><font size="1" style="font-weight:;font-size: 11px;">&nbsp;Taxpayer Identification Number&nbsp;<td></font><input id="frm2000OT:txt12H" maxlength="12" name="frm2000OT:txt12H" size="20" type="text" value="" onkeypress="return numbersonly(this, event)" /></td></td>
                                    </tr>
                                    <tr>
                                      <td><font size="1" style="font-weight:bold;">&nbsp;12I&nbsp;</font><font size="1" style="font-weight:;font-size: 11px;">&nbsp;No. of Shares Sold&nbsp;<td></font><input id="frm2000OT:txt12I" maxlength="40" name="frm2000OT:txt12I" size="20" type="text" value="" onkeypress="return wholenumber(this, event)" /></td></td>
                                      <td><font size="1" style="font-weight:bold;">&nbsp;12J&nbsp;</font><font size="1" style="font-weight:;font-size: 11px;">&nbsp;Stock Certificate No. (attach additional sheet/s if necessary)&nbsp;<td></font><input id="frm2000OT:txt12J" maxlength="40" name="frm2000OT:txt12J" size="20" type="text" value="" onkeypress="return numbersonly(this, event)" /></td></td>
                                    </tr>
                                    <tr>
                                      
                                    </tr>
                                    <tr>
                                      <td><font size="1" style="font-weight:bold;">&nbsp;12K&nbsp;</font><font size="1" style="font-weight:;font-size: 11px;">&nbsp;Par Value of Shares (for shares of stock with par value)&nbsp;<td></font><input id="frm2000OT:txt12K" maxlength="40" name="frm2000OT:txt12K" size="20" type="text" style="text-align:right" value="" onkeypress="return numbersonly(this, event)" onblur="round(this,2);TaxBaseStocks()" /></td></td>
                                      <td><font size="1" style="font-weight:bold;">&nbsp;12L&nbsp;</font><font size="1" style="font-weight:;font-size: 11px;">&nbsp;DST paid upon original issue of Shares of Stock sold (for shares of stock without par value)&nbsp;<td></font><input id="frm2000OT:txt12L" maxlength="40" name="frm2000OT:txt12L" size="20" type="text" style="text-align:right" value="" onkeypress="return numbersonly(this, event)" onblur="round(this,2);TaxBaseStocks()" /></td></td>
                                    </tr>
                                    
                                                                    </tbody>
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
              </tr>
                                        
                                            
                            <tr>
                                <td>
                                    <table width="852" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part
                                                                III</font></td>
                                                        <td width="618">
                                                            <div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;">C o m p u t a t i o n &nbsp;
                                                          o f &nbsp; T a x</font></div>
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
                                    <table width="852" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="816" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="27"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;&nbsp;</font></td>
                                                        <td width="449"><font color="black" face="Arial" size="1" style="font-size: 11px;">Taxable Base - Real Property (Item 12E or 12F, whichever is applicable)</font></td>
                                                        <td width="147">
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td width="193"><span class="spacePadder"><font size="2" style="font-weight:bold;">13</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2000OT:txtTax13" maxlength="25" id="frm2000OT:txtTax13" onmousemove="TaxBaseRealProperty()" disabled />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;</font></td>
                                                        <td><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Taxable Base - Shares of Stock (Item 12K or 12L, whichever is applicable)</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                                                        <td>
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">14</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" disabled value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2000OT:txtTax14" maxlength="25" id="frm2000OT:txtTax14" onmousemove="TaxBaseStocks()" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;15&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Tax Rate</font>
                                                          <div class="spacePadder">                                                    </div></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">15</font>&nbsp;&nbsp;&nbsp;
                                                          <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="10" name="frm2000OT:txtTax15" maxlength="20" id="frm2000OT:txtTax15" disabled/>
                                                        </span></td>
                                                    </tr>
                          <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;16&nbsp;</font></td>
                                                        <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Tax Due</font>
                                                          <div class="spacePadder">                                                    </div></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">16</font>&nbsp;&nbsp;&nbsp;
                                                          <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2000OT:txtTax16" maxlength="25" id="frm2000OT:txtTax16" onmouseover="computeTaxDueProperty();computeTaxDueStocks()" disabled />
                                                        </span></td>
                                                    </tr>
                          <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;17&nbsp;</font></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"> Less: Tax Paid in Return previously filed, if this is an amended return</font></td>
                                                        <td><div class="spacePadder"></div></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">17</font>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="0.00" style="background-color: #dcdcdc;text-align:right;" size="20" name="frm2000OT:txtLess" maxlength="25" id="frm2000OT:txtLess" onblur="round(this,2);computeOverpayment()" onkeypress="return numbersonly(this, event)" disabled /></span></td>
                                                    </tr>
                          <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;</font></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Still Due/(Overpayment)</font></td>
                                                        <td><div class="spacePadder"></div></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">18</font>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm2000OT:txtTaxDue" maxlength="25" id="frm2000OT:txtTaxDue" onmousemove="computeOverpayment()" /></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;</font></td>
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
                                                                            <font size="2" face="Arial"><b>19A</b>&nbsp;
                                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm2000OT:txtTax19A" name="frm2000OT:txtTax19A" onblur="round(this,2);compute19D()" />
                                      </font>
                                                                        </td>
                                                                        <td width="161" align="center">
                                                                            <font size="2" face="Arial"><b>19B</b>&nbsp;
                                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2000OT:txtTax19B" maxlength="25" id="frm2000OT:txtTax19B" onblur="round(this,2);compute19D()" />
                                                                            </font>
                                                                        </td>
                                                                        <td width="174" align="center">
                                                                            <font size="2" face="Arial"><b>19C</b>&nbsp;
                                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2000OT:txtTax19C" maxlength="25" id="frm2000OT:txtTax19C" onblur="round(this,2);compute19D()" />
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">19D</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2000OT:txtTax19D" maxlength="25" id="frm2000OT:txtTax19D" disabled="true" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font></td>
                                                        <td colspan="2"><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Total Amount Payable/(overpayment) (Sum of Items 18 and 19D)</font></td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">20</font>&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20"  maxlength="25" id="frm2000OT:txtTax20" name="frm2000OT:txtTax20" disabled="true" class="iceInpTxt-dis" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                    <tr>
                            <td>
                                <table width="852" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="40%" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="132">
                                                        <table width="180" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td width="24">&nbsp;</td>
                                                                <td width="180"><font size="1" style="font-size: 11px;"> If case of Overpayment, mark one box only:</font></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="60%" valign="top" class="tblFormTd"><table width="507" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="507"><table width="507" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td width="3">&nbsp;</td>
                                                                <td width="110"><input id="frm2000OT:opt21:_1" name="frm2000OT:opt21" value="R" type="radio"/>
                                                                    <font size="1">
                                                                        <label for="frm2000OT:opt21:_1" style="font-size: 11px;">To be refunded</label>
                                                                    </font> </td>
                                                                <td width="220"><input id="frm2000OT:opt21:_2" name="frm2000OT:opt21" value="I" type="radio"/>
                                                                    <font size="1">
                                                                        <label for="frm2000OT:opt21:_2" style="font-size: 11px;">To be issued a Tax Credit Certificate</label>
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
                  <div class="imgClass" align='center' style="display:none; width:852px !important;">
                    <table  style="border-top: 3px solid black; border-collapse: collapse; font-family:arial; font-size:10px; text-align: center; table-layout: fixed; background-color: white;">
                      <col width="29%" />
                        <col width="14%" />
                      <col width="14%" />
                        <col width="23%" />
                      <col width="20%" />
                        <tr>
                          <td colspan="4" style="text-align: left;border-top: 3px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my
                            <br/>&nbsp;&nbsp;knowledge and belief, is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the
                            <br/>&nbsp;&nbsp;regulations issued under authority thereof.
                            <br/>&nbsp;</td>
                          <td rowspan="2" style="border-left: 3px solid black;border-top: 3px solid black;">Stamp of Receiving
                            <br/>Office/AAB and
                            <br/>Date of Receipt
                            <br/>(RO's Signature/
                            <br/>Bank Teller's Initial)
                            <br/><br/><br/>&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3"><b>21</b>________________________________________________________________________&nbsp;&nbsp;&nbsp;&nbsp;
                            <br/>President/Vice President/Principal Officer/Accredited Tax Agent/
                            <br/>Authorized Representative/Taxpayer
                            <br/>(Signature Over Printed Name)</td>
                          <td><b>22</b>_____________________________
                            <br/>Treasurer/Assistant Treasurer
                            <br/>(Signature Over Printed Name)
                            <br/>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>_____________________________________
                            <br/>Title/Position of Signatory</td>
                          <td colspan="2">___________________________________
                            <br/>TIN of Signatory</td>
                          <td>______________________________
                            <br/>Title/Position of Signatory</td>
                          <td style="border-left: 3px solid black;">&nbsp;</td>
                        </tr>
                        <tr>
                          <td>_____________________________________
                            <br/>Tax Agent Acc. No./Atty's Roll No.(if applicable)</td>
                          <td>_______________
                            <br/>Date of Issuance</td>
                          <td>_______________
                            <br/>Date of Expiry</td>
                          <td>______________________________
                            <br/>TIN of Signatory</td>
                          <td style="border-left: 3px solid black;">&nbsp;</td>
                        </tr>
                    </table>
                  </div>
                  <div class="imgClass" align='center' style="display:none; width:852px !important;">
                    <img id="frm2000OT:jurat" src="{{ asset('images/bottom_img/2000OT_new.jpg') }}" width="852"/>
                  </div>
                  <div class="imgClass" align='center' style="display:none; width:852px !important;">
                    <table style="font-size:12px; text-align: left; vertical-align: top;background-color: white;">
                      <tr>
                        <td>&nbsp;Machine Validation/Revenue Official Receipt Details (If not filed with the bank)<br/><br/><br/><br/><br/></td>
                      </tr>
                    </table>
                  </div>
                                    <table width="852" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
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
                                                                            <div>
                                                                                <div align="center">
                                                                                 @if($action != 'view')
                                                                                    <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm2000OT:cmdValidate" id="frm2000OT:cmdValidate" onclick="window.setTimeout('TaxBaseRealProperty();TaxBaseStocks();computeTaxDueProperty();computeTotalAmountPayable();computeTaxDueStocks();computeOverpayment();compute19D();',300);validate()" />
                                                                                    <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm2000OT:cmdEdit" id="frm2000OT:cmdEdit" onclick="enableAllControl()"/>
                                                                                    <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                    <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                    <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2000OT:btnFinalCopy" id="frm2000OT:btnFinalCopy" onclick="submitForm();" />
                                                                                    <div id="msg" class="printButtonClass" style="display:none;"></div> 
                                                                                   @else
                                                                                       <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                       <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                                   @endif
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <div id="DummyTxt" style='display:none;'>  </div>
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
                                    <div class="footer footer2000OT" style="padding:6px; text-align: center; font-size: 11px; background-color: white;">
                                        <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- Lovell modal ATC  -->
        <div id="modalAtc" class="aBox" style="width:80%; display:none;padding: 10px; height:auto; position:relative; top:3%; left:10%; right:10%; overflow-y:auto; overflow-x:hidden; background:#fff;" align="left"> 
            <br/>
            <br/>
            <table border="0" cellspacing="3" cellpadding="3" style="position: static" width="100%">
                <tr>
                    <td class="modalHeader" colspan="2"></td>
                </tr>
                <tr class="modalColumnHeader" align="center">
                    <td width="10%"><b> ATC </b></td>
                    <td width="60%"> <b> Description </b> </td>
                    <td width="30%"> <b> Rate </b> </td>
                </tr>
                <tr>
                    <td colspan="3"> <hr/></td>
                </tr>

            </table>

            <div class="modalContent" style="height:auto;overflow:auto;width: 100%">
                <table id="tbllistAtcCode"  cellspacing="0" cellpadding="0" width="100%">
                    <tr><td></td></tr>
                </table>
            </div>
      <div align="center">
            <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getATCCode()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop" id="btnCancelPop" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelATC()" />
            </div>
      <br />
        </div>

        <!-- modal Sched1 ATC  -->    
    <div id="modalSched1" class="printSignFooterClass" style="width:70%; display:none; height:45%; position:relative; top:3%;margin: auto; right:auto; overflow-y:auto; background:#fff;padding: 10px;" align="left"> 
      <br/>
      <br/>
      <table border="1" cellspacing="0" cellpadding="0" style="position: static" width="90%" align="center">
        <tr>
          <td>
            <table width="100%" border="1" cellspacing="0" cellpadding="0" class="tblForm">
              <tr>
                <td class="tblFormTdPart modalHeader">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="20%">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Schedule
                        1</font></td>
                      <td width="80%">
                        <div align="center"><font size="2" style="font-weight:bold;">Fair market Value of Property Sold<br/>(attach additional sheet/s if necessary)&nbsp;
                        &nbsp;</font></div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
                    <td class="tblFormTd">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;</font></td>
                <td class="modalContent" colspan="2"><font size="1" style="font-size: 11px;">&nbsp;Fair Market Value as determined by BIR Commissioner (Zonal Value/BIR Rules)</font></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2">
                  <table width="511">
                    <tbody>
                      <tr class="modalColumnHeader">
                        <td width="161" align="center"><font size="1" face="Arial" style="font-size: 11px;">LAND</font></td>
                        <td width="160" align="center"><font size="1" face="Arial" style="font-size: 11px;">IMPROVEMENT</font></td>
                        <td width="174" align="center"><font size="1" face="Arial" style="font-size: 11px;">TOTAL</font></td>
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
                      <tr class="modalContent">
                        <td width="161" align="center">
                          <font size="2" face="Arial"><b>1A</b>&nbsp;
                          <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" name="frm2000OT:txtSched1A" id="frm2000OT:txtSched1A" onblur="round(this,2);compute1C();compute3A()" onkeypress="return numbersonly(this, event)" />
                          </font>
                        </td>
                        <td width="161" align="center">
                          <font size="2" face="Arial"><b>1B</b>&nbsp;
                          <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2000OT:txtSched1B" maxlength="25" id="frm2000OT:txtSched1B" onblur="round(this,2);compute1C();compute4A()" onkeypress="return numbersonly(this, event)" />
                          </font>
                        </td>
                        <td width="161" align="center">
                          <font size="2" face="Arial"><b>1C</b>&nbsp;
                          <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2000OT:txtSched1C" maxlength="25" id="frm2000OT:txtSched1C" disabled="true" />
                          </font>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr class="modalContent">
                <td><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;</font></td>
                <td colspan="2"><font size="1" style="font-size: 11px;">&nbsp;Fair Market Value as determined by Provincial/City Assessor's(per latest Tax Declaration)</font></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2">
                  <table width="511">
                    <tbody>
                            
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
                      <tr class="modalContent">
                        <td width="161" align="center">
                          <font size="2" face="Arial"><b>2A</b>&nbsp;
                          <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2000OT:txtSched2A" maxlength="25" id="frm2000OT:txtSched2A" onblur="round(this,2);compute2C();compute4A()" onkeypress="return numbersonly(this, event)"/>
                          </font>
                        </td>
                        <td width="161" align="center">
                          <font size="2" face="Arial"><b>2B</b>&nbsp;
                          <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2000OT:txtSched2B" maxlength="25" id="frm2000OT:txtSched2B" onblur="round(this,2);compute2C();compute3A()" onkeypress="return numbersonly(this, event)" />
                          </font>
                        </td>
                        <td width="161" align="center">
                          <font size="2" face="Arial"><b>2C</b>&nbsp;
                          <input type="text" value="0.00" style="text-align: right;" size="20" name="frm2000OT:txtSched2C" maxlength="25" id="frm2000OT:txtSched2C" disabled="true" />
                          </font>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr class="modalContent">
                <td width="27"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;</font></td>
                <td width="449"><font color="black" face="Arial" size="1" style="font-size: 11px;">Sum of Item 1A & 2B</font></td>
                <td width="147">
                  <div class="spacePadder">                                                    </div>
                </td>
                <td width="193"><span class="spacePadder"><font size="2" style="font-weight:bold;">3A</font>
                  <input type="text" value="0.00" style="color: black; background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2000OT:txtSched3A" maxlength="25" id="frm2000OT:txtSched3A" disabled="true" />
                  </span></td>
              </tr>
              <tr class="modalContent">
                <td><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;</font></td>
                <td><font size="1">&nbsp;</font><font color="black" face="Arial" size="1" style="font-size: 11px;">Sum of Item 1B & 2A</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                <td>
                  <div class="spacePadder">                                                    </div>
                </td>
                <td><span class="spacePadder"><font size="2" style="font-weight:bold;">4A</font>
                  <input type="text" value="0.00" style="color: black; background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2000OT:txtSched4A" maxlength="25" id="frm2000OT:txtSched4A" disabled="true" />
                  </span></td>
              </tr>
              <tr class="modalContent">
                <td><font size="2" style="font-weight:bold;">&nbsp;5&nbsp;</font></td>
                <td colspan="2"><font color="black" face="Arial" size="1" style="font-size: 11px;">Fair Market Value of Property Sold (The highest amount among the figures reflected under Items 1C, 2C, 3A & 4A)(to Item 12F)</font>
                  <div class="spacePadder">                                                    </div></td>
                <td><span class="spacePadder"><font size="2" style="font-weight:bold;">5A</font>
                  <input type="text" value="0.00" style="color: black; background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm2000OT:txtSched5A" maxlength="20" id="frm2000OT:txtSched5A" disabled="true" />
                  </span></td>
              </tr>
            </table>
            <br/>
            <div align="center">
            <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getSched1ATCCode()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop" id="btnCancelPop" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched1ATC()" />
            </div>
          </td>
        </tr>
      </table>  
    </div>
    <div id="hiddenEmail" style="display:none;"  > 
          <input id="txtEmail" value="{{$company->email_address}}" class="emailClass" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60"   />
    </div>
  </form> 
  <textarea id='responsetext' style="display:none;"></textarea>
        <input type="hidden" id="hATCSelectedIndex" style="width: 0px" />
    <textarea id='responsetext' style="display:none;"></textarea>
    <!-- XML retrieval -->
        <div style="display:none;">
            <xmp id='xmlFormat'>  
            </xmp> <!--format the doc -->
            <span id='xmlClose'>All Rights Reserved BIR 2012.</span>
        </div>
     <div id="responseBG" style="display:none;"><!--loaded files render here--></div>
        <div id="response" style="display:none;"><!--loaded files render here--></div>  
    <div id="responseATC" style="display:none;"><!--loaded files render here--></div>
    <div id="responseRdo" style="display:none;"><!--loaded files render here--></div> 
@endsection
@section('scripts')
<script type="text/javascript">
  var isSubmitFinal = false;
  var isSubmit = false;
  
  var fileName = "";
  var existingXMLFileName = "";
    setTimeout("sleeptime()", 300);
  var atcList = new Array();
  var gIsReadOnly = false;
  var fileNameToExport = "";
  
  var savedReturn = "";
  var p3Compromise = "";
  var p3Surcharge = "";
  var p3Interest = "";
  var p3IsAmended = "";
  var p3FilingDate = "";
  var p3ReturnPeriod = "";
  var p3ReturnPeriodEnd = "";
  var p3ReturnPeriodEndMonth = "";
  var p3ReturnPeriodEndYear = ""; 
  
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
    
  function atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum, formatRate)
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
    this.formatRate=formatRate;
  }
  /*----------------------------------*/
    var d=document,XMLBGFile='',data='',XMLFile='', XMLATCFile='',msg = d.getElementById('msg'),flag=true;
  var loader=d.getElementById('loader');
  
  /*----------------------------------*/
  
    function sleeptime()
    {   
      init();     

      var xmlFileName = document.getElementById('file_name').value;        
      fileName = xmlFileName;
      if (fileName != null && fileName.indexOf('.xml') > -1) {
        loadXML(fileName);  

        d.getElementById('frm2000_OT:txtDateMonth').disabled = true;
        d.getElementById('frm2000_OT:txtDateDay').disabled = true;
        d.getElementById('frm2000_OT:txtDateYear').disabled = true;
        
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
      
      d.getElementById('frm2000OT:txtTIN1').disabled = true;
      d.getElementById('frm2000OT:txtTIN2').disabled = true;
      d.getElementById('frm2000OT:txtTIN3').disabled = true;
      d.getElementById('frm2000OT:txtBranchCode').disabled = true;
    
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
          d.getElementById('frm2000_OT:txtDateMonth').value = mm;
        }
        else
        {
          d.getElementById('frm2000_OT:txtDateMonth').value = year.getMonth() +1;
        }
        dd = "" + year.getDate();
        if (dd.length == 1) 
        { 
          dd = "0" + dd; 
          d.getElementById('frm2000_OT:txtDateDay').value = dd;
        }
        else
        {
          d.getElementById('frm2000_OT:txtDateDay').value = year.getDate();
        }
        d.getElementById('frm2000_OT:txtDateYear').value = year.getFullYear();
        d.getElementById('frm2000OT:AmendedRtn_1').disabled = false;
        d.getElementById('frm2000OT:AmendedRtn_2').disabled = false;
        d.getElementById('frm2000OT:txtSheets').disabled = false;
        d.getElementById('frm2000OT:txtATC').disabled = true;
        d.getElementById('frm2000OT:ClassRealProptxt').disabled = true;
        d.getElementById('frm2000OT:txtTaxDue').disabled = true;
        @if($action != 'view')
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2000OT:cmdEdit').disabled = true;
        d.getElementById('frm2000OT:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @endif

        loadXMLATC('/xml/atcCodes.xml');
        ATCList();
    }
  
  /*--------------------------------------------------------------*/
  //Added By dgarfin
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
      
      //Ensure that before writing to atcPropertyJS the formType 2000OT is traceable in atcStr
      if (atcStr.indexOf('2000OT') >= 0) {
          var atcValues = atcStr.split('~');        
        
        var formType = "2000OT";
        var atcCode = atcValues[0];
        var description = atcValues[1];
        var rate = atcValues[2];
        var category = atcValues[3];    
        
        //dgarfin todo: must be included in atcCodes.xml
        var base = atcValues[4];  
        var compType = atcValues[5];  
        var constTaxDue = atcValues[6]; 
        var minimum = atcValues[7]; 
        var maximum = atcValues[8]; 
        var formatRate = atcValues[9];  
        
        var objATC = new atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum, formatRate);
        atcList[j] = objATC; 
        j++;
        //alert('2000-OT successfully created array #'+i);
        
      } else {    
        //alert('2000=OT not found in array #'+i);
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
        if (loadWhere != null && loadWhere != "") {     
          loadData(); /*This will load data onto fields*/     
          
          if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
          }

          if (gIsReadOnly) {
            d.getElementById('frm2000OT:cmdValidate').disabled = true;
            d.getElementById('btnSave').disabled = true;
          }  
        }        
  }
  
  function loadData() {
    /*This will load data onto fields*/
    var response = d.getElementById("response");
    
        var elem = d.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
      
      if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
        if (elem[i].type == 'text' || elem[i].type == 'select-one') {
          var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
          if (fieldVal != null && fieldVal.length > 1) {
            if(elem[i].id == 'frm2000OT:txtTaxpayerName' || elem[i].id == 'frm2000OT:txtAddress'){
              elem[i].value = unescape(fieldVal[1]);
            }
            else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
              }
            else{
              elem[i].value = fieldVal[1]; //all select-one and text values       
            }
          }         
        }
        if (elem[i].type == 'radio') {
          var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');       
          if (rdoVal[1] == 'true') {
            elem[i].checked = rdoVal[1];
            //elem[i].onclick();
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
  
  function loadDataATCRow() {
    /*This will load data onto fields*/
    var response = d.getElementById("response");    
        var elem = d.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++) {
      
      if (elem[i].type != 'hidden' && elem[i].type != 'undefined') { 
        if (elem[i].type == 'text' || elem[i].type == 'select-one') {
          var fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
          elem[i].value = ''; elem[i].selectedIndex = 0;
          if(elem[i].id == 'frm2000OT:txtTaxpayerName' || elem[i].id == 'frm2000OT:txtAddress'){
            elem[i].value = unescape(fieldVal[1]);
          }
          else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
          else{
            elem[i].value = fieldVal[1]; //all select-one and text values       
          }
        }       
      }
        }
  } 
  
  
  function isItAnAmendedReturn(xmlFile) { 
    if(d.getElementById('frm2000OT:AmendedRtn_1').checked) {
      return true;
    } else {
      return false;
    }   
  }
  
  function isItAFinalCopy(xmlFile) {  
      var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
      fn = fsoXML.OpenTextFile(xmlFile,1);
      var fnContent = fn.ReadAll();
      fn.Close(); 

      if (fnContent.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
        return true;
      } else {
        return false;
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
  
  function getPopulateATC()
    {
        ATCnameCode = new Array();
        NaturePayment = new Array();
        AtcRate = new Array();
        AtcBase = new Array();
        AtcFormatRate = new Array();
        AtcCompType = new Array();
        AtcConstantTaxDue = new Array();
        AtcMaximum = new Array();
        AtcMinimum = new Array();

        //var atcSize = atcList.getSize();
        var atcSize = atcList.length; 
        var i = 0;
        var j = 1;
        
        for(i = 0; i < atcSize; i++) {
            //var atc = atcList.get(i);  
            var atc = atcList[i];  
            if(atc.formType == "2000OT") {
               
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                AtcFormatRate[j] = atc.formatRate;
                AtcBase[j] = atc.base;
                AtcCompType[j] = atc.compType;
                AtcConstantTaxDue[j] = atc.constTaxDue;
                AtcMaximum[j] = atc.maximum;
                AtcMinimum[j] = atc.minimum;
                AtcRate[j++] = atc.rate;
            }
        }        
    }

    function ATCList()
    {
        var i;
        getPopulateATC();
        
        $('#tbllistAtcCode').html("");
        $('#tbllistSched1').html(""); 
        for(i = 1 ; i < ATCnameCode.length ; i++ )
        {   
          $('#tbllistAtcCode').html(  d.getElementById('tbllistAtcCode').innerHTML +
                "<tr class='atc'><td width='10%' class='atc' style='font-size:11px;'> <input id='AtcCode"+i+"' name='AtcCode' type='radio' value='"+ATCnameCode[i]+"' /> "+ATCnameCode[i]+ " </td> <td width='65%' class='atc atcNames' id='AtcNaturePayment"+i+"'  style='font-size:11px;'>"+ NaturePayment[i]+ " </td><td width='25%' class='atc' id='AtcRate"+i+"'  style='font-size:11px;'> "+ AtcFormatRate[i]+ " </td> <td> <input type='hidden' width='0px' id='atcComputeRate"+i+"'  value='"+AtcRate[i]+"' /> <input type='hidden' width='0px' id='atcComputeBase"+i+"'  value='"+AtcBase[i]+"' /> <input type='hidden' width='0px' id='AtcComputeCompType"+i+"'  value='"+AtcCompType[i]+"' /> <input type='hidden' width='0px' id='AtcComputeConstaxDue"+i+"'  value='"+AtcConstantTaxDue[i]+"' /> <input type='hidden' width='0px' id='AtcComputeMaximum"+i+"'  value='"+AtcMaximum[i]+"' /> <input type='hidden' width='0px' id='AtcComputeMinimum"+i+"'  value='"+AtcMinimum[i]+"' />  </td> </tr>");
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

    function showATCDiv()
    {
         d.getElementById('Content').style.display = "none";
        $('#modalAtc').show('blind');
        $('#wrapper').css({'display':'none'});
    }

    var tempATC = new Array();
    var tempDateFrom = new Array();
    var tempDateTo = new Array();
    var tempATCTaxbase = new Array();
  
    function showSched1ATCDiv()
    {
        
      d.getElementById('Content').style.display = "none";
      $('#modalSched1').show('blind'); 
      $('#wrapper').css({'display':'none'});     
    }

    function cancelSched1ATC()
    {
       
      d.getElementById('Content').style.display = 'block';
      $('#modalSched1').hide('blind');
      $('#wrapper').css({'display':'block'});

    $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");      
    }

    function cancelATC()
    {
      
        d.getElementById('Content').style.display = 'block';
        $('#modalAtc').hide('blind');
        $('#wrapper').css({'display':'block'});
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");    
    }


    function getATCCode()
    {
        var listATCtable = d.getElementById('tbllistAtcCode');

        for(i = 1 ; i <= listATCtable.rows.length; i++ )
        {

            if(d.getElementById('AtcCode'+i) != null)
            {
                // check if checked id'ed ATC
                if (d.getElementById('AtcCode'+i).checked == true )
                {         
                    d.getElementById('frm2000OT:txtATC').value = d.getElementById('AtcCode'+i).value;       
          /* original code */
          d.getElementById('frm2000OT:txtTax15').value = d.getElementById('AtcRate'+i).innerHTML;
          /* replaced with */
          if(d.getElementById('frm2000OT:txtATC').value == "DS125"){
            d.getElementById('frm2000OT:txtTax15').value = 0.50;
          } else{   
                    d.getElementById('frm2000OT:txtTax15').value = d.getElementById('AtcRate'+i).innerHTML; 
          }

          
                    d.getElementById('hATCSelectedIndex').value = (i*1 - 1);      
                    cancelATC();      
                    return;
                }
            }
        }
        cancelATC();
    }
  
    var ATCCodeList = new Array();
    function getSched1ATCCode() {
    
    //dgarfin: modal's 5A to be populated to 12F parent form
    d.getElementById('frm2000OT:txt12F').value = d.getElementById('frm2000OT:txtSched5A').value;      
    TaxBaseRealProperty();
        cancelSched1ATC();
        
    }
  
  function transferOfRealProperty()
  { 
    d.getElementById('frm2000OT:txtSeller').disabled = false;
    d.getElementById('frm2000OT:txtBuyer').disabled = false;
    d.getElementById('frm2000OT:txtTINS').disabled = false;
    d.getElementById('frm2000OT:txtTINB').disabled = false;
    d.getElementById('frm2000OT:opt12_1').disabled = false;
    d.getElementById('frm2000OT:opt12_1').checked = true;
    d.getElementById('frm2000OT:txtLRP').disabled = false;
    d.getElementById('frm2000OT:txtRDOLP').disabled = false;
    d.getElementById('frm2000OT:ClassRealProp_1').disabled = false;
    d.getElementById('frm2000OT:ClassRealProp_2').disabled = false;
    d.getElementById('frm2000OT:ClassRealProp_3').disabled = false;
    d.getElementById('frm2000OT:ClassRealProp_4').disabled = false;
    d.getElementById('frm2000OT:ClassRealProp_5').disabled = false;
    d.getElementById('frm2000OT:ClassRealProp_6').disabled = false;
    d.getElementById('frm2000OT:ClassRealProp_7').disabled = false;
    d.getElementById('frm2000OT:txt12B').disabled = false;
    d.getElementById('frm2000OT:txt12C').disabled = false;
    d.getElementById('frm2000OT:txt12D').disabled = false;
    d.getElementById('frm2000OT:txt12E').disabled = false;
    d.getElementById('frm2000OT:opt12_2').disabled = true;
    d.getElementById('frm2000OT:opt12_2').checked = false;
    d.getElementById('frm2000OT:txt12G').disabled = true;
    d.getElementById('frm2000OT:txt12H').disabled = true;
    d.getElementById('frm2000OT:txt12I').disabled = true;
    d.getElementById('frm2000OT:txt12J').disabled = true;
    d.getElementById('frm2000OT:txt12K').disabled = true;
    d.getElementById('frm2000OT:txt12L').disabled = true;
    d.getElementById('frm2000OT:txtTax14').disabled = true;
    d.getElementById('frm2000OT:txtTax13').disabled = true;
    d.getElementById('frm2000OT:txtTax14').value = "";  
    d.getElementById('frm2000OT:txt12K').value = "";
    d.getElementById('frm2000OT:txt12L').value = "";
    d.getElementById('frm2000OT:txt12E').value = "0.00";
    d.getElementById('frm2000OT:txt12F').value = "0.00";
  }
  
  function transferOfShares()
  { 
    d.getElementById('frm2000OT:txtSeller').disabled = false;
    d.getElementById('frm2000OT:txtBuyer').disabled = false;
    d.getElementById('frm2000OT:txtTINS').disabled = false;
    d.getElementById('frm2000OT:txtTINB').disabled = false;
    d.getElementById('frm2000OT:opt12_1').disabled = true;
    d.getElementById('frm2000OT:opt12_1').checked = false;
    d.getElementById('frm2000OT:txtLRP').disabled = true;
    d.getElementById('frm2000OT:txtRDOLP').disabled = true;
    d.getElementById('frm2000OT:ClassRealProp_1').disabled = true;
    d.getElementById('frm2000OT:ClassRealProp_2').disabled = true;
    d.getElementById('frm2000OT:ClassRealProp_3').disabled = true;
    d.getElementById('frm2000OT:ClassRealProp_4').disabled = true;
    d.getElementById('frm2000OT:ClassRealProp_5').disabled = true;
    d.getElementById('frm2000OT:ClassRealProp_6').disabled = true;
    d.getElementById('frm2000OT:ClassRealProp_7').disabled = true;
    d.getElementById('frm2000OT:ClassRealProp_1').checked = false;
    d.getElementById('frm2000OT:ClassRealProp_2').checked = false;
    d.getElementById('frm2000OT:ClassRealProp_3').checked = false;
    d.getElementById('frm2000OT:ClassRealProp_4').checked = false;
    d.getElementById('frm2000OT:ClassRealProp_5').checked = false;
    d.getElementById('frm2000OT:ClassRealProp_6').checked = false;
    d.getElementById('frm2000OT:ClassRealProp_7').checked = false;
    d.getElementById('frm2000OT:ClassRealProptxt').disabled = true;
    d.getElementById('frm2000OT:txt12B').disabled = true;
    d.getElementById('frm2000OT:txt12C').disabled = true;
    d.getElementById('frm2000OT:txt12D').disabled = true;
    d.getElementById('frm2000OT:txt12E').disabled = true;
    d.getElementById('frm2000OT:opt12_2').disabled = false;
    d.getElementById('frm2000OT:opt12_2').checked = true;
    d.getElementById('frm2000OT:txt12G').disabled = false;
    d.getElementById('frm2000OT:txt12H').disabled = false;
    d.getElementById('frm2000OT:txt12I').disabled = false;
    d.getElementById('frm2000OT:txt12J').disabled = false;
    d.getElementById('frm2000OT:txt12K').disabled = false;
    d.getElementById('frm2000OT:txt12L').disabled = false;
    d.getElementById('frm2000OT:txtTax14').disabled = true;
    d.getElementById('frm2000OT:txtTax13').disabled = true;
    d.getElementById('frm2000OT:txtTax13').value = "";
    d.getElementById('frm2000OT:txt12E').value = "";
    d.getElementById('frm2000OT:txt12F').value = "";
    d.getElementById('frm2000OT:txt12K').value = "0.00";
    d.getElementById('frm2000OT:txt12L').value = "0.00";
  }
  
  function enableClassRealProptxt()
  {
    d.getElementById('frm2000OT:ClassRealProptxt').disabled = false;
  }

  function disableClassRealProptxt()
  {
    d.getElementById('frm2000OT:ClassRealProptxt').disabled = true;
    d.getElementById('frm2000OT:ClassRealProptxt').value = "";
  }
  
  function compute1C()
  {
    d.getElementById("frm2000OT:txtSched1C").value = formatCurrency(NumWithComma(d.getElementById("frm2000OT:txtSched1A").value) *1 + NumWithComma(d.getElementById("frm2000OT:txtSched1B").value) *1);
    compute5A();
  }
  
  function compute2C()
  {
    d.getElementById("frm2000OT:txtSched2C").value = formatCurrency(NumWithComma(d.getElementById("frm2000OT:txtSched2A").value) *1 + NumWithComma(d.getElementById("frm2000OT:txtSched2B").value) *1);
    compute5A();
  }
  
  function compute3A()
  {
    d.getElementById("frm2000OT:txtSched3A").value = formatCurrency(NumWithComma(d.getElementById("frm2000OT:txtSched1A").value) *1 + NumWithComma(d.getElementById("frm2000OT:txtSched2B").value) *1);
    compute5A();
  }
  
  function compute4A()
  {
    var LandB = (1 * d.getElementById("frm2000OT:txtSched1B").value).toFixed(2);
    var Land2A = (1 * d.getElementById("frm2000OT:txtSched2A").value).toFixed(2);
    d.getElementById("frm2000OT:txtSched4A").value = formatCurrency(NumWithComma(d.getElementById("frm2000OT:txtSched1B").value) *1 + NumWithComma(d.getElementById("frm2000OT:txtSched2A").value) *1);
    compute5A();
  }
  
  function compute5A()
  {
    var total1C = NumWithComma(d.getElementById('frm2000OT:txtSched1A').value) + NumWithComma(d.getElementById('frm2000OT:txtSched1B').value);
    var total2C = NumWithComma(d.getElementById('frm2000OT:txtSched2A').value) + NumWithComma(d.getElementById('frm2000OT:txtSched2B').value);
    var total3A = NumWithComma(d.getElementById('frm2000OT:txtSched1A').value) + NumWithComma(d.getElementById('frm2000OT:txtSched2B').value);
    var total4A = NumWithComma(d.getElementById('frm2000OT:txtSched1B').value) + NumWithComma(d.getElementById('frm2000OT:txtSched2A').value);

    
    if(( total1C >= total2C) && (total1C >= total3A) && (total1C >= total4A))
    {
      d.getElementById('frm2000OT:txtSched5A').value = formatCurrency(total1C);
      d.getElementById('frm2000OT:txt12F').value = formatCurrency(total1C);
    }
    else if( (total2C >= total3A) && (total2C >= total4A) && (total2C >= total1C))
    {
      d.getElementById('frm2000OT:txtSched5A').value = formatCurrency(total2C);
      d.getElementById('frm2000OT:txt12F').value = formatCurrency(total2C);
    }
    else if( (total3A >= total4A) && (total3A >= total1C) && (total3A >= total2C))
    {
      d.getElementById('frm2000OT:txtSched5A').value = formatCurrency(total3A);
      d.getElementById('frm2000OT:txt12F').value = formatCurrency(total3A);
    }
    else if( (total4A >= total1C) && (total4A >= total2C) && (total4A >= total3A))
    {
      d.getElementById('frm2000OT:txtSched5A').value = formatCurrency(total4A);
      d.getElementById('frm2000OT:txt12F').value = formatCurrency(total4A);
    }
   
    computeTotalAmountPayable();
  }
  
  function compute19D()
  {
 
    d.getElementById("frm2000OT:txtTax19D").value =  formatCurrency(NumWithComma(d.getElementById("frm2000OT:txtTax19A").value)*1 + NumWithComma(d.getElementById("frm2000OT:txtTax19B").value) * 1 + NumWithComma(d.getElementById("frm2000OT:txtTax19C").value) * 1);
    computeTotalAmountPayable();
  } 
  
  function computeTotalAmountPayable()
  {
    d.getElementById("frm2000OT:txtTax20").value = formatCurrency(NumWithComma(d.getElementById("frm2000OT:txtTax19D").value)*1 + NumWithComma(d.getElementById("frm2000OT:txtTaxDue").value) * 1);
    capital();
  } 

    function validate() {
        var dt = new Date();
        var day = d.getElementById("frm2000_OT:txtDateDay").value;
        var year =  parseInt(d.getElementById("frm2000_OT:txtDateYear").value);
    var isLeap = new Date(document.getElementById('frm2000_OT:txtDateYear').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm2000_OT:txtDateMonth').value==2 && document.getElementById('frm2000_OT:txtDateDay').value==29) {
      alert("Filing year is not a leap year.");
      return;
    }
    if (!isLeap && document.getElementById('frm2000_OT:txtDateMonth').value==2 && document.getElementById('frm2000_OT:txtDateDay').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    if (isLeap && document.getElementById('frm2000_OT:txtDateMonth').value==2 && document.getElementById('frm2000_OT:txtDateDay').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    
        if(d.getElementById("frm2000_OT:txtDateMonth").value == "00"){
            alert("Please select a valid month in Item 1.");
            return;
        }
        if(d.getElementById("frm2000_OT:txtDateDay").value.length == 0){
            alert("Please enter a valid day in Item 1.");
            return;
        }else if(day < 1){
            alert("Please enter a valid day in Item 1.");
            return;
        }
        if(d.getElementById("frm2000_OT:txtDateDay").value.length == 1 || d.getElementById("frm2000_OT:txtDateMonth").value.length == 1){
            alert("Please enter a valid day/month on item 1. Format should be MM/DD/YYYY.");
            return;
        }
    if(d.getElementById("frm2000_OT:txtDateYear").value.length ==0){
            alert("Please enter a valid year in Item 1.");
            return;
        }else if(year < 1900 || year > (dt.getYear() + 1901)){
            alert("Please enter a valid year in Item 1.");
            return;
        }
    
    //Check if valid date - Benjie Manalaysay 11/5/2013
    var month31 = (['01', '03', '05', '07', '08', '10', '12']);
    var month30 = (['04', '06', '09', '11']);
    var month = document.getElementById('frm2000_OT:txtDateMonth').value
    if (month31.contains(month) && document.getElementById('frm2000_OT:txtDateDay').value > 31)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    else if (month30.contains(month) && document.getElementById('frm2000_OT:txtDateDay').value > 30)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    
    
    if( (d.getElementById('frm2000OT:txtTIN1').value == "" || d.getElementById('frm2000OT:txtTIN2').value == "" || d.getElementById('frm2000OT:txtTIN3').value == "" || d.getElementById('frm2000OT:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 5.");
            return;
        }   
        
    if( (d.getElementById('frm2000OT:txtTaxpayerName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 8.");
            return;
        } 
    if( (d.getElementById('frm2000OT:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 9.");
            return;
        }
    if( (d.getElementById('frm2000OT:txtZipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip Code on Item 10.");
            return;
        }
    
    if( d.getElementById('frm2000OT:NatureOfTrans_1').checked == false && d.getElementById('frm2000OT:NatureOfTrans_2').checked == false && d.getElementById('frm2000OT:NatureOfTrans_3').checked == false) 
        {
            alert("Please choose Nature of Transaction on Item 11A.");
            return; 
        }   
    
    if( d.getElementById('frm2000OT:NatureOfTrans_1').checked == true || d.getElementById('frm2000OT:NatureOfTrans_2').checked == true) 
        {
      if( d.getElementById('frm2000OT:ClassRealProp_1').checked == false && d.getElementById('frm2000OT:ClassRealProp_2').checked == false&& d.getElementById('frm2000OT:ClassRealProp_3').checked == false&& d.getElementById('frm2000OT:ClassRealProp_4').checked == false&& d.getElementById('frm2000OT:ClassRealProp_5').checked == false&& d.getElementById('frm2000OT:ClassRealProp_6').checked == false&& d.getElementById('frm2000OT:ClassRealProp_7').checked == false) 
      {   
        alert("Please choose Classification of Real Property on Item 12A.");
        return; 
      } 
        }
    
        disableAllControl();

        alert("Validation successful. Click on Edit if you wish to modify your entries."); 
    return;
    }

  var disableElem = true;
  var enableElem = false;
    function disableAllControl(){
        d.getElementById('frm2000OT:AmendedRtn_1').disabled = true;
        d.getElementById('frm2000OT:AmendedRtn_2').disabled = true;
        d.getElementById("frm2000OT:cmdValidate").disabled = true;
        d.getElementById('btnPrint').disabled = false;
        d.getElementById("frm2000OT:cmdEdit").disabled = false;
        d.getElementById('frm2000OT:btnFinalCopy').disabled = false;
        d.getElementById("btnUpload").disabled = false;

        d.getElementById("frm2000_OT:txtDateMonth").disabled = true;
        d.getElementById("frm2000_OT:txtDateDay").disabled = true;
        d.getElementById("frm2000_OT:txtDateYear").disabled = true;
        d.getElementById("frm2000OT:txtTIN1").disabled = true;
        d.getElementById("frm2000OT:txtTIN2").disabled = true;
        d.getElementById("frm2000OT:txtTIN3").disabled = true;
        d.getElementById("frm2000OT:txtBranchCode").disabled = true;
        d.getElementById("frm2000OT:txtRDOCode").disabled = true;
        
        d.getElementById("frm2000OT:txtSheets").disabled = true;
        d.getElementById("btnATC").disabled = true;
        d.getElementById("frm2000OT:txtTelNum").disabled = true;
        d.getElementById("frm2000OT:txtTaxpayerName").disabled = true;
        d.getElementById("frm2000OT:txtAddress").disabled = true;
        d.getElementById("frm2000OT:txtZipCode").disabled = true;
        d.getElementById("frm2000OT:NatureOfTrans_1").disabled = true;
        d.getElementById("frm2000OT:NatureOfTrans_2").disabled = true;
        d.getElementById("frm2000OT:NatureOfTrans_3").disabled = true;
        d.getElementById("frm2000OT:txtSeller").disabled = true;
        d.getElementById("frm2000OT:txtBuyer").disabled = true;
        d.getElementById("frm2000OT:txtTINS").disabled = true;
        d.getElementById("frm2000OT:txtTINB").disabled = true;
        d.getElementById("frm2000OT:opt12_1").disabled = true;
        d.getElementById("frm2000OT:txtLRP").disabled = true;
        d.getElementById("frm2000OT:txtRDOLP").disabled = true;
        d.getElementById("frm2000OT:ClassRealProp_1").disabled = true;
        d.getElementById("frm2000OT:ClassRealProp_2").disabled = true;
        d.getElementById("frm2000OT:ClassRealProp_3").disabled = true;
        d.getElementById("frm2000OT:ClassRealProp_4").disabled = true;
        d.getElementById("frm2000OT:ClassRealProp_5").disabled = true;
        d.getElementById("frm2000OT:ClassRealProp_6").disabled = true;
        d.getElementById("frm2000OT:ClassRealProp_7").disabled = true;
        d.getElementById("frm2000OT:ClassRealProptxt").disabled = true;
        d.getElementById("frm2000OT:txt12B").disabled = true;
        d.getElementById("frm2000OT:txt12C").disabled = true;
        d.getElementById("frm2000OT:txt12D").disabled = true;
        d.getElementById("frm2000OT:txt12E").disabled = true;
        d.getElementById("btnSched1").disabled = true;
        //d.getElementById("frm2000OT:txt12F").disabled = true;
        d.getElementById("frm2000OT:opt12_2").disabled = true;
        d.getElementById("frm2000OT:txt12G").disabled = true;
        d.getElementById("frm2000OT:txt12H").disabled = true;
        d.getElementById("frm2000OT:txt12I").disabled = true;
        d.getElementById("frm2000OT:txt12J").disabled = true;
        d.getElementById("frm2000OT:txt12K").disabled = true;
        d.getElementById("frm2000OT:txt12L").disabled = true;
        d.getElementById("frm2000OT:txtTax19A").disabled = true;
        d.getElementById("frm2000OT:txtTax19B").disabled = true;
        d.getElementById("frm2000OT:txtTax19C").disabled = true;
       
    disableElem;
    enableElem;
    }

    function enableAllControl()
    {
        d.getElementById('frm2000OT:AmendedRtn_1').disabled = false;
        d.getElementById('frm2000OT:AmendedRtn_2').disabled = false;
        d.getElementById("frm2000OT:cmdValidate").disabled = false;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById("frm2000OT:cmdEdit").disabled = true;
        d.getElementById('frm2000OT:btnFinalCopy').disabled = true;
        d.getElementById("btnUpload").disabled = true;

        d.getElementById("frm2000_OT:txtDateMonth").disabled = false;
        d.getElementById("frm2000_OT:txtDateDay").disabled = false;
        d.getElementById("frm2000_OT:txtDateYear").disabled = false;
        d.getElementById("frm2000OT:txtTIN1").disabled = false;
        d.getElementById("frm2000OT:txtTIN2").disabled = false;
        d.getElementById("frm2000OT:txtTIN3").disabled = false;
        d.getElementById("frm2000OT:txtBranchCode").disabled = false;
        d.getElementById("frm2000OT:txtRDOCode").disabled = false;
    
        d.getElementById("frm2000OT:txtSheets").disabled = false;
        d.getElementById("btnATC").disabled = false;
        d.getElementById("frm2000OT:txtTelNum").disabled = false;
        d.getElementById("frm2000OT:txtTaxpayerName").disabled = false;
        d.getElementById("frm2000OT:txtAddress").disabled = false;
        d.getElementById("frm2000OT:txtZipCode").disabled = false;
        d.getElementById("frm2000OT:NatureOfTrans_1").disabled = false;
        d.getElementById("frm2000OT:NatureOfTrans_2").disabled = false;
        d.getElementById("frm2000OT:NatureOfTrans_3").disabled = false;
        d.getElementById("frm2000OT:txtSeller").disabled = false;
        d.getElementById("frm2000OT:txtBuyer").disabled = false;
        d.getElementById("frm2000OT:txtTINS").disabled = false;
        d.getElementById("frm2000OT:txtTINB").disabled = false;
        d.getElementById("frm2000OT:opt12_1").disabled = false;
        d.getElementById("frm2000OT:txtLRP").disabled = false;
        d.getElementById("frm2000OT:txtRDOLP").disabled = false;
        d.getElementById("frm2000OT:ClassRealProp_1").disabled = false;
        d.getElementById("frm2000OT:ClassRealProp_2").disabled = false;
        d.getElementById("frm2000OT:ClassRealProp_3").disabled = false;
        d.getElementById("frm2000OT:ClassRealProp_4").disabled = false;
        d.getElementById("frm2000OT:ClassRealProp_5").disabled = false;
        d.getElementById("frm2000OT:ClassRealProp_6").disabled = false;
        d.getElementById("frm2000OT:ClassRealProp_7").disabled = false;
        d.getElementById("frm2000OT:ClassRealProptxt").disabled = false;
        d.getElementById("frm2000OT:txt12B").disabled = false;
        d.getElementById("frm2000OT:txt12C").disabled = false;
        d.getElementById("frm2000OT:txt12D").disabled = false;
        d.getElementById("frm2000OT:txt12E").disabled = false;
        d.getElementById("btnSched1").disabled = false;
        //d.getElementById("frm2000OT:txt12F").disabled = false;
        d.getElementById("frm2000OT:opt12_2").disabled = false;
        d.getElementById("frm2000OT:txt12G").disabled = false;
        d.getElementById("frm2000OT:txt12H").disabled = false;
        d.getElementById("frm2000OT:txt12I").disabled = false;
        d.getElementById("frm2000OT:txt12J").disabled = false;
        d.getElementById("frm2000OT:txt12K").disabled = false;
        d.getElementById("frm2000OT:txt12L").disabled = false;
        d.getElementById("frm2000OT:txtTax19A").disabled = false;
        d.getElementById("frm2000OT:txtTax19B").disabled = false;
        d.getElementById("frm2000OT:txtTax19C").disabled = false;
       
        if(d.getElementById('frm2000OT:AmendedRtn_1').checked) {
            d.getElementById("frm2000OT:txtTax16").disabled = false;
        } else {
            d.getElementById("frm2000OT:txtTax16").disabled = true;
        }
    if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
      d.getElementById('frm2000_OT:txtDateMonth').disabled = true;
      d.getElementById('frm2000_OT:txtDateDay').disabled = true;
      d.getElementById('frm2000_OT:txtDateYear').disabled = true; 
    }
    disableElem;
    enableElem;
    d.getElementById('frm2000OT:txtTIN1').disabled = true;
    d.getElementById('frm2000OT:txtTIN2').disabled = true;
    d.getElementById('frm2000OT:txtTIN3').disabled = true;
      d.getElementById('frm2000OT:txtBranchCode').disabled = true;
    }
  
  
  function computeOverpayment()
  {
  
    document.getElementById('frm2000OT:txtTaxDue').value = formatCurrency(NumWithComma(document.getElementById('frm2000OT:txtTax16').value)*1 - NumWithComma(document.getElementById('frm2000OT:txtLess').value)*1 );
    computeTotalAmountPayable();
  }
  
  function TaxBaseRealProperty()
  {
    var txtTax12E = NumWithComma(document.getElementById('frm2000OT:txt12E').value);
    var txtTax12F = NumWithComma(document.getElementById('frm2000OT:txt12F').value);
    
    if( txtTax12E > txtTax12F)
    {
      document.getElementById('frm2000OT:txtTax13').value = formatCurrency(txtTax12E);
    }
    else if( txtTax12F > txtTax12E)
    {
      document.getElementById('frm2000OT:txtTax13').value = formatCurrency(txtTax12F);
    }
    else if( txtTax12F == txtTax12E)
    {
      document.getElementById('frm2000OT:txtTax13').value = formatCurrency(txtTax12F);
    }
    computeTaxDueProperty();
  }
  
  function TaxBaseStocks()
  {
    var txtTax12K = NumWithComma(document.getElementById('frm2000OT:txt12K').value);
    var txtTax12L = NumWithComma(document.getElementById('frm2000OT:txt12L').value);
    
    if( txtTax12K > txtTax12L)
    {
      document.getElementById('frm2000OT:txtTax14').value = formatCurrency(txtTax12K);
    }
    else if( txtTax12L > txtTax12K)
    {
      document.getElementById('frm2000OT:txtTax14').value = formatCurrency(txtTax12L);
    }
    else if( txtTax12L == txtTax12K)
    {
      document.getElementById('frm2000OT:txtTax14').value = formatCurrency(txtTax12L);
    }
    computeTaxDueStocks();
  }
  
  function computeTaxDueProperty()
  {   
 
    if( document.getElementById('frm2000OT:NatureOfTrans_1').checked == true || document.getElementById('frm2000OT:NatureOfTrans_2').checked == true)
    {
      var atcInputTaxbase = NumWithComma(d.getElementById('frm2000OT:txtTax13').value);
      if (atcInputTaxbase>0) {
        if (d.getElementById('frm2000OT:txtTax15').value == "P1.50/P200 ") {
          document.getElementById('frm2000OT:txtTax16').value = formatCurrency((NumWithComma(document.getElementById('frm2000OT:txtTax13').value) / 200 ) * 1.50 );
        }
        else if (d.getElementById('frm2000OT:txtTax15').value == "P15/1000 "){
          document.getElementById('frm2000OT:txtTax16').value = formatCurrency(Math.ceil(NumWithComma(document.getElementById('frm2000OT:txtTax13').value) / 1000) * 15);
        }
        else if (d.getElementById('frm2000OT:txtTax15').value == "0.5") {
          document.getElementById('frm2000OT:txtTax16').value = formatCurrency(NumWithComma(document.getElementById('frm2000OT:txtTax13').value) * 0.50);
        }
        else if (!isNaN(d.getElementById('frm2000OT:txtTax15').value)) {
          alert("Undefined Tax Rate, please select an ATC!");
          document.getElementById('frm2000OT:txtTax16').value = "0.00";
          
        }
      }
    }
    computeOverpayment();
  }
  
  function computeTaxDueStocks()
  {
  
    if( document.getElementById('frm2000OT:NatureOfTrans_3').checked == true )
    {
      var atcInputTaxbase = NumWithComma(d.getElementById('frm2000OT:txtTax14').value);
      if (atcInputTaxbase>0) {
        
        if(d.getElementById('frm2000OT:txtTax15').value == "P1.50/P200 "){
          document.getElementById('frm2000OT:txtTax16').value = formatCurrency((NumWithComma(document.getElementById('frm2000OT:txtTax14').value) / 200 ) * 1.50 );
        }
        else if (d.getElementById('frm2000OT:txtTax15').value == "P15/1000 "){
          document.getElementById('frm2000OT:txtTax16').value = formatCurrency(Math.ceil(formatCurrency(NumWithComma(document.getElementById('frm2000OT:txtTax14').value) / 1000)) * 15);
        } 
        else if (d.getElementById('frm2000OT:txtTax15').value == "0.5") {
          document.getElementById('frm2000OT:txtTax16').value = formatCurrency(NumWithComma(document.getElementById('frm2000OT:txtTax14').value) * 0.50);
        }
        else if (!isNaN(d.getElementById('frm2000OT:txtTax15').value)) {
          alert("Undefined Tax Rate, please select an ATC!");
          document.getElementById('frm2000OT:txtTax16').value = "0.00";
        }
      }
    }
    computeOverpayment();
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
  
  function initialValidateBeforeSave() {
      if( (d.getElementById('frm2000OT:txtTIN1').value == "" || d.getElementById('frm2000OT:txtTIN2').value == "" || d.getElementById('frm2000OT:txtTIN3').value == "" || d.getElementById('frm2000OT:txtBranchCode').value == "")  )
      {
        alert("Please enter a valid TIN number on Item 5.");
        return false;
      } 
      
      if( (d.getElementById('frm2000OT:txtTaxpayerName').value == "")  )
      {
        alert("Please enter a valid Stockbroker Name on Item 8.");
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

  $('#bg').hide(); //852
  $('.printSignFooterClass').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always', 'background':'#ffffff' });  
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
    $('#formPaper').css({'margin-top':'-80px' });

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
                save('2000OT',data);
                
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
        saveAndExit('2000OT',data);
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

        submitAndSave('2000OT', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2000OT';
    }
</script>
@endsection
