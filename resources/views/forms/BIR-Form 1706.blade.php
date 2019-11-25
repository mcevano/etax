@extends('layouts.app')
@section('title', '| BIR Form No. 1706')

@section('content')
<!-- <div class="loader"></div>  -->
<!-- Styles -->
<link href="{{ asset('css/forms.css') }}" rel="stylesheet">
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
        <button type="button" class="btn btn-danger btn-exit" id="1706" company='{{$company->id}}'>No</button>
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
      <div class="modal-body message">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-exit" id="1706" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1706' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 996px; ">
                <div id="formPaper">
                    <div id="mainContent">
                        <table width="996" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table width="996" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
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
                                                <font size="6px" style="font-weight:bold;">Capital Gains Tax Return</font>
                                            </td>
                                            <td width="145" valign="center">
                                                <font face="Arial" size="1px">BIR Form No.<br/></font>
                                                <font face="Arial" size="6px">1706<br/></font>
                                                <font face="Arial" size="1px">July 1999 (ENCS)</font>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="990" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td colspan="4" valign="top" style="background-color:#FFFFFF " ><div align="left"><label size="1px" face="Arial, Helvetica, sans-serif">For Onerous Transfer of Real Property Classified as<br> Capital Asset (both Taxable and Exempt)</label></div></td>
                                        </tr>
                    
                                        <tr>
                                            <td width="180" rowspan="2" valign="top" class="tblFormTd">
                                                <table style="height:29px">
                                                    <tr>
                                                        <td width="190" height="23"><table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="15"><font size="2" style="font-weight:bold">&nbsp;1&nbsp;</font></td>
                                                                    <td width="176"><font size="1" style="font-size: 11px;">Date of Transaction (MM/DD/YYYY) </font></td>
                                                                </tr>
                                                            </table>
                            </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="23"><input type="text" id="frm1706:txtDateMonth" name="frm1706:txtDateMonth" maxlength="2" size="2" style="text-align: right" value="" onKeyPress="return wholenumber(this, event)" title="Please supply a valid month." />
                                                              <input type="text" id="frm1706:txtDateDay" name="frm1706:txtDateDay" maxlength="2" size="2" style="text-align: right" value="" onKeyPress="return wholenumber(this, event)" title="Please supply a valid day." />
                                                              <input type="text" id="frm1706:txtDateYear" name="frm1706:txtDateYear" maxlength="4" size="4" style="text-align: right" value="" onKeyPress="return wholenumber(this, event)" title="Please supply a valid year." />
                                                      </td>
                                                    </tr>
                                                </table>
                      </td>
                                            <td width="160" valign="top" class="tblFormTd">
                                                <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <div align="center" style="padding: 5px 0 5px 0;">
                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                  <tbody>
                                    <tr>
                                      <td><input type="radio" value="Y" name="frm1706:j_id217" id="frm1706:j_id217:_1" onclick="document.getElementById('frm1706:txtLess').disabled = false;" /><label for="frm1706:j_id217:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                      <td><input type="radio" value="N" name="frm1706:j_id217" id="frm1706:j_id217:_2" onclick="document.getElementById('frm1706:txtLess').disabled = true;d.getElementById('frm1706:txtLess').value='0.00';computeTaxPayable();" checked="checked" /><label for="frm1706:j_id7:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >No</label></td>
                                    </tr>
                                  </tbody>
                                </table>
                                                             </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="100" valign="top" class="tblFormTd">
                                                <table width="152" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">No. of Sheets Attached?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" value="0" style="text-align: right;" size="4" name="frm1706:txtSheets" maxlength="2" id="frm1706:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="150" valign="top" class="tblFormTd">
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
                              <input disabled id="frm1706:txt4" maxlength="5" name="frm1706:txt4" size="6" style="background-color: rgb(220, 220, 220);" type="text" value="II420" />
                            </td>
                            <td><font size="1" style="font-size: 11px;">&nbsp;Individual&nbsp;</font></td>
                            <td>
                               <input id="frm1706:opt4" name="frm1706:opt4"
                                   value="II420"
                                   type="radio" onclick="enable17and18()"/>
                              <label for="frm1706:optATC4"></label> 
                            </td>
                          </tr>
                          <tr>
                            <td width="43">&nbsp;</td>
                            <td width="36" height="21" nowrap="nowrap">
                              <input class="iceInpTxt-dis" disabled="true" id="frm1706:txt4C" name="frm1706:txt4C" maxlength="5"  size="6" style="background-color: rgb(220, 220, 220);" type="text" value="IC420" />
                            </td>
                            <td><font size="1" style="font-size: 11px;">&nbsp;Corporation&nbsp;</font></td>
                            <td>
                              <input id="frm1706:opt4C" name="frm1706:opt4"
                                   value="IC420"
                                   type="radio" onclick="disable17and18()"/>
                              <label  for="frm1706:opt4C"> </label>
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
                                                            <font size="1" style="font-size: 11px;">TIN Seller&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                            <input type="text" value="{{$company->tin1}}" size="4" name="frm1706:txtTIN1" maxlength="3" id="frm1706:txtTIN1" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin2}}" size="4" name="frm1706:txtTIN2" maxlength="3" id="frm1706:txtTIN2" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin3}}" size="4" name="frm1706:txtTIN3" maxlength="3" id="frm1706:txtTIN3" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin4}}" size="4" name="frm1706:txtBranchCode" maxlength="3" id="frm1706:txtBranchCode" onkeypress="return letternumber(event)" />
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="200" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font><font size="1">RDO Code&nbsp;</font></td>
                                                        <td id="rdoSelect">
                                                            <select class='iceSelOneMnu' disabled id='frm1706:txtRDOCode' name='frm1706:txtRDOCode' size='1' >
                                                              <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="415" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">TIN Buyer&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                            <input type="text" value="" size="4" name="frm1706:txtTINB1" maxlength="3" id="frm1706:txtTINB1" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="" size="4" name="frm1706:txtTINB2" maxlength="3" id="frm1706:txtTINB2" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="" size="4" name="frm1706:txtTINB3" maxlength="3" id="frm1706:txtTINB3" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="" size="4" name="frm1706:txtBranchCodeB" maxlength="3" id="frm1706:txtBranchCodeB" onkeypress="return letternumber(event)" />
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                      <td width="200" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100"><font size="2" style="font-weight:bold">&nbsp;8&nbsp;</font><font size="1">RDO Code&nbsp;</font></td>
                                                        <td id="rdoSelect2">
                                                            
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
                                            <td width="50%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="8"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Seller's Name (et al)</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" disabled value="{{$company->registered_name}}" size="50" name="frm1706:txtSellerName" maxlength="50" id="frm1706:txtSellerName" onblur="return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="50%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="8"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Buyer's Name (et al)</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="" size="50" name="frm1706:txtBuyerName" maxlength="50" id="frm1706:txtBuyerName" onblur="return capital(this, event)" /></td>
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
                                    <table width="990" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="50%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Seller's Registered Address</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" disabled="" value="{{$company->address}}"  size="50" name="frm1706:txtSellerAddress" maxlength="70" id="frm1706:txtSellerAddress" onblur="return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="50%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Buyer's Registered Address</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value=""  size="50" name="frm1706:txtBuyerAddress" maxlength="70" id="frm1706:txtBuyerAddress" onblur="return capital(this, event)" /></td>
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
                                    <table width="990" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="50%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Seller's Residence Address (For Individual)</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value=""  size="50" name="frm1706:txtSellerRAddress" maxlength="70" id="frm1706:txtSellerRAddress" onblur="return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="40%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Location of Property</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value=""  size="50" name="frm1706:txtLocation" maxlength="70" id="frm1706:txtLocation" onblur="return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="10%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;14A&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">RDO Code</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="90">&nbsp;</td>
                                                                    <td id="rdoSelect3"></td>
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
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="990">
                                        <td class="tblFormTd" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="160">&nbsp;<font size="2" style="font-weight:bold;">15&nbsp;</font><font size="1" style="font-size: 11px;">Classification of Property</font></td>
                                                </tr>
                          <tr>
                            <td>
                                                            <div align="left">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:800px;" id="frm1706:j_id391" class="iceSelOneRb fieldText1">
                                                                    <div align="left" style="padding: 5px 0 5px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                            <tbody>
                                                                                <tr>
                                                                                   <td>&nbsp;&nbsp;<input type="radio" value="R" name="frm1706:j_id391" id="frm1706:j_id391:_1" onclick="document.getElementById('frm1706:j_id391:_7').disabled = true; document.getElementById('frm1706:j_id391:_7').value = '';" /><label for="frm1706:j_id391:_1" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Residential&nbsp;</label>&nbsp;</td>
                                          <td><input type="radio" value="C" name="frm1706:j_id391" id="frm1706:j_id391:_3" onclick="document.getElementById('frm1706:j_id391:_7').disabled = true; document.getElementById('frm1706:j_id391:_7').value = '';" /><label for="frm1706:j_id391:_3" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Commercial&nbsp;&nbsp;</label></td>
                                          <td><input type="radio" value="CR" name="frm1706:j_id391" id="frm1706:j_id391:_5" onclick="document.getElementById('frm1706:j_id391:_7').disabled = true; document.getElementById('frm1706:j_id391:_7').value = '';" /><label for="frm1706:j_id391:_5" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Condominium Residential&nbsp;</label></td>
                                          <td><label style="font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Others (Specify)&nbsp;</><input id="frm1706:j_id391:_8" name="frm1706:j_id391" value="O" type="radio" value="1" onclick="document.getElementById('frm1706:j_id391:_7').disabled = false;" /></td>
                                          <td>&nbsp;<input id="frm1706:j_id391:_7" maxlength="60" name="frm1706:j_id391:_7" size="30" type="text" value="" disabled /></td>
                                          <tr>
                                            <td>&nbsp;&nbsp;<input type="radio" value="A" name="frm1706:j_id391" id="frm1706:j_id391:_2" onclick="document.getElementById('frm1706:j_id391:_7').disabled = true; document.getElementById('frm1706:j_id391:_7').value = '';" /><label for="frm1706:j_id391:_2"  class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Agricultural&nbsp;&nbsp;</label></td>
                                            <td><input type="radio" value="I" name="frm1706:j_id391" id="frm1706:j_id391:_4" onclick="document.getElementById('frm1706:j_id391:_7').disabled = true; document.getElementById('frm1706:j_id391:_7').value = '';" /><label for="frm1706:j_id391:_4" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Industrial&nbsp;&nbsp;</label></td>
                                            <td><input type="radio" value="CC" name="frm1706:j_id391" id="frm1706:j_id391:_6" onclick="document.getElementById('frm1706:j_id391:_7').disabled = true; document.getElementById('frm1706:j_id391:_7').value = '';" /><label for="frm1706:j_id391:_6" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Condominium Commercial&nbsp;</label></td>
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
                <table width="990" border="0" cellspacing="0" cellpadding="0" class="tblForm">                 
                  <td width="50%" valign="top" class="tblFormTd">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="11"><font size="2" style="font-weight:bold;">&nbsp;16&nbsp;</font></td>
                                                            <td><font size="1" style="font-size: 11px;">Brief Description of the Property</font></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                        <td>
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="25">&nbsp;</td>
                              <td><font size="1" style="font-size: 11px;">TCT/OCT/CCT No.&nbsp;</font></td>
                              <td><input type="text" value="" size="15" name="frm1706:txtTCT" maxlength="20" id="frm1706:txtTCT" onblur="return capital(this, event)" /></td>
                              <td><font size="1" style="font-size: 11px;">&nbsp;&nbsp;Area Sold (sq. m)&nbsp;</font></td>
                              <td><input style="text-align:right" type="text" value="" size="15" name="frm1706:txtArea" maxlength="20" id="frm1706:txtArea" onKeyPress="return numbersonly(this, event)" /></td>
                              <td><font size="1" style="font-size: 11px;">&nbsp;&nbsp;Tax Dec. No.&nbsp;</font></td>
                              <td><input type="text" value="" size="15" name="frm1706:txtTaxDC" maxlength="25" id="frm1706:txtTaxDC" onKeyPress="return numbersonly(this, event)" /></td>
                              <td><font size="1" style="font-size: 11px;">&nbsp;&nbsp;Others&nbsp;</font></td>
                              <td><input type="text" value="" size="15" name="frm1706:txtOthers" maxlength="25" id="frm1706:txtOthers" onblur="return capital(this, event)" /></td>
                            </tr>
                          </table>
                        </td>
                                            </tr>
                    </table>
                  </td>
                </table>
              </tr>
              <tr>
                <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="990">
                                        <tr>
                                            <td class="tblFormTd" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="450">&nbsp;<font size="2" style="font-weight:bold;">17&nbsp;</font><font size="1" style="font-size: 11px;">Is the Property being sold your principal residence? (For individual sellers only)</font></td>
                                                        <td>
                                                            <div align="center">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:140px; border: 0;" id="frm1706:j_id392" class="iceSelOneRb fieldText1">
                                                                    <div align="left" style="padding: 5px 0 5px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><input type="radio" value="Y" name="frm1706:j_id392" id="frm1706:j_id392:_1" onclick="enableIndividual()" /><label for="frm1706:j_id392:_1" class="iceSelOneRb fieldText1" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;</td>
                                                                                    <td><input type="radio" value="N" name="frm1706:j_id392" id="frm1706:j_id392:_2" onclick="disableIndividual()" /><label for="frm1706:j_id392:_2"  class="iceSelOneRb fieldText1" style="font-size:11px;" >No&nbsp;</label></td>
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
                                                        <td width="650">&nbsp;<font size="2" style="font-weight:bold;">18&nbsp;</font><font size="1" style="font-size: 11px;">Do you intend to construct or acquire a new principal residence within 18 months from the date of disposition/sale? (For Individuals)</font></td>
                                                        <td>
                                                            <div align="left">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:140px; border: 0;" id="frm1706:j_id393" class="iceSelOneRb fieldText1">
                                                                    <div align="left" style="padding: 5px 0 5px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><input type="radio" value="Y" name="frm1706:j_id393" id="frm1706:j_id393:_1" onclick="enableIndividual()" /><label for="frm1706:j_id393:_1" class="iceSelOneRb fieldText1" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;</td>
                                                                                    <td><input type="radio" value="N" name="frm1706:j_id393" id="frm1706:j_id393:_2" onclick="disableIndividual()" /><label for="frm1706:j_id393:_2"  class="iceSelOneRb fieldText1" style="font-size:11px;" >No&nbsp;</label></td>
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
                                        </tr>
                                    </table>
                                </td>
              </tr>
              <tr>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="990" style="height: 23px">
                                        <tr>
                                            <td class="tblFormTd" valign="top" width="40%">
                                                <table width="270" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="250"><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;</font><font size="1" style="font-size: 11px;">Does the selling price cover more than one property?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:160px; border: 0;" id="frm1706:j_id394" class="iceSelOneRb fieldText1">
                                                                    <div align="center" style="padding: 5px 0 5px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><input type="radio" value="Y" name="frm1706:j_id394" id="frm1706:j_id394:_1" /><label for="frm1706:j_id394:_1" class="iceSelOneRb fieldText1" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                    <td><input type="radio" value="N" name="frm1706:j_id394" id="frm1706:j_id394:_2" /><label for="frm1706:j_id394:_2"  class="iceSelOneRb fieldText1" style="font-size:11px;" >No</label></td>
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
                                                <table width="395" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="400"><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font><font size="1"  style="font-size: 11px;">Are
                                                            you availing of tax relief under an International Tax Treaty or Special Law?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="left" style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:300px;padding: 5px 0 5px 0">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="Y" name="frm1706:rdTreaty" id="frm1706:rdTreaty:_1" onclick="enableSelTreaty()" /><label for="frm1706:j_id398:_1" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" value="N" name="frm1706:rdTreaty" id="frm1706:rdTreaty:_2" onclick="disableSelTreaty();" checked /><label for="frm1706:j_id398:_2" style="font-size:11px;" >No</label></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div align="left" style= "font-size:11px;width: 300px; padding-top: 5px;">
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If yes, specify
                                                                <select id="frm1706:selTreaty" name="frm1706:selTreaty" style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" size="1" disabled >
                                  <option value="0" selected="selected"> </option>
                                                                    <option value="1">International Tax Treaty</option>
                                                                    <option value="2">Special Law</option>
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
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="990" style="height: 23px">
                                        <tr>
                                            <td class="tblFormTd" valign="top" width="40%">
                                                <table width="250" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="250"><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font><font size="1" style="font-size: 11px;">Description of Transaction (Mark one box only)</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="left">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:380px; border:none" id="frm1706:j_id395" class="iceSelOneRb fieldText1">
                                                                    <div align="left" style="padding: 5px 0 5px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                            <tbody>
                                        <tr>
                                                                                    <td>&nbsp;&nbsp;<input type="radio" value="CS" name="frm1706:j_id395" id="frm1706:j_id395:_1" onclick="cashSale()" /><label for="frm1706:j_id395:_1" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Cash Sale</label>&nbsp;&nbsp;&nbsp;</td>
                                          <td>&nbsp;&nbsp;<input type="radio" value="FS" name="frm1706:j_id395" id="frm1706:j_id395:_4" onclick="foreclosure()" /><label for="frm1706:j_id395:_4"  class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Foreclosure Sale</label></td>
                                                                                    <tr>
                                            <td>&nbsp;&nbsp;<input type="radio" value="E" name="frm1706:j_id395" id="frm1706:j_id395:_2" onclick="enableExempt()" /><label for="frm1706:j_id395:_2"  class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Exempt</label></td>
                                            <td>&nbsp;&nbsp;<input type="radio" value="O" name="frm1706:j_id395" id="frm1706:j_id395:_5" onclick="enableExempt()" /><label for="frm1706:j_id395:_5"  class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Others</label></td>
                                          </tr>
                                          <tr>
                                            <td>&nbsp;&nbsp;<input type="radio" value="IS" name="frm1706:j_id395" id="frm1706:j_id395:_3" onclick="enableInstallment()" /><label for="frm1706:j_id395:_3"  class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Installment Sale</label></td>
                                          </tr>
                                        </tr> 
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </td>
                                                    </tr>
                          <tr>
                                                        <td><font size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If Exempt, or Others, specify&nbsp;&nbsp;</font><input id="frm1706:txtOthers21" maxlength="60" name="frm1706:txtOthers21" size="30" type="text" value="" disabled /></td>
                          </tr>
                                                </table>
                      </td>
                                            <td class="tblFormTd" valign="top" width="51%">
                                                <table width="382" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="382"><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font><font size="1" style="font-size: 11px;">For Installment Sale:</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="left" style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:450px;padding: 5px 0 5px 0">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <tbody>
                                                                        <tr>
                                      <td><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;</font><font size="1" style="font-size: 10px;">&nbsp;Selling Price&nbsp;<td></font><input id="frm1706:txtSelling" style="text-align:right" maxlength="50" name="frm1706:txtSelling" size="25" type="text" value="" onkeypress="return numbersonly(this, event)" onblur="round(this,2)" disabled /></td></td>
                                    </tr>
                                    <tr>
                                      <td><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;</font><font size="1" style="font-size: 10px;">&nbsp;Cost and Other Expenses&nbsp;<td></font><input id="frm1706:txtCost" style="text-align:right" maxlength="50" name="frm1706:txtCost" size="25" type="text" value="" onkeypress="return numbersonly(this, event)" onblur="round(this,2)" disabled /></td></td>
                                    </tr>
                                    <tr>
                                      <td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;</font><font size="1" style="font-size: 10px;">&nbsp;Mortgage Assumed&nbsp;<td></font><input id="frm1706:txtMortgage" style="text-align:right" maxlength="50" name="frm1706:txtMortgage" size="25" type="text" value="" onkeypress="return numbersonly(this, event)" onblur="round(this,2)" disabled /></td></td>
                                    </tr>
                                    <tr>
                                      <td><font size="2" style="font-weight:bold;">&nbsp;25&nbsp;</font><font size="1" style="font-size: 10px;">&nbsp;Total Payments during the Initial Year&nbsp;<td></font><input id="frm1706:txtTotalP" style="text-align:right" maxlength="50" name="frm1706:txtTotalP" size="25" type="text" value="" onkeypress="return numbersonly(this, event)" onblur="round(this,2)" disabled /></td></td>
                                    </tr>
                                    <tr>
                                      <td><font size="2" style="font-weight:bold;">&nbsp;26&nbsp;</font><font size="1" style="font-size: 10px;">&nbsp;Amount of Installment this Month&nbsp;<td></font><input id="frm1706:txtAmount" style="text-align:right" maxlength="50" name="frm1706:txtAmount" size="25" type="text" value="" onkeypress="return numbersonly(this, event)" onblur="round(this,2)" disabled /></td></td>
                                    </tr>
                                    <tr>
                                      <td><font size="2" style="font-weight:bold;">&nbsp;27&nbsp;</font><font size="1" style="font-size: 10px;">&nbsp;No. of Installments in the Contract&nbsp;&nbsp;<td></font><input id="frm1706:txtTotalN" style="text-align:right" maxlength="10" name="frm1706:txtTotalN" size="5" type="text" value="" onkeypress="return numbersonly(this, event)" onblur="round(this,2)" disabled /></td></td>
                                    </tr>
                                    <tr>
                                      <td><font size="2" style="font-weight:bold">&nbsp;28&nbsp;</font><font size="1" style="font-size: 10px;">&nbsp;Date of Installment (MM/DD/YYYY)&nbsp;</font></td><td><input id="frm1706:txtDateMonthI" name="frm1706:txtDateMonthI" maxlength="2" size="2" style="text-align: right" type="text" value="" onKeyPress="return numbersonly(this, event)" disabled />
                                        <input id="frm1706:txtDateDayI"  name="frm1706:txtDateDayI" maxlength="2" size="2" style="text-align: right" type="text" value="" onKeyPress="return numbersonly(this, event)" disabled />
                                        <input id="frm1706:txtDateYearI" name="frm1706:txtDateYearI" maxlength="4" size="4" style="text-align: right" type="text" value="" onKeyPress="return numbersonly(this, event)" disabled /></td>
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
              <tr>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="990" style="height: 23px">
                                        <tr>
                      <td width="990" valign="top" class="tblFormTd">
                        <table width="990" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="250"  colspan="2">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="350"><font size="2" style="font-weight:bold;">&nbsp;29&nbsp;</font><font size="1" style="font-size: 11px;">Fair Market Value (FMV) - Valuation at the time of the Contract</font></td>
                                </tr>
                              </table>
                            </td>
                                                    </tr>
                          <tr>
                            <td>
                              <font size="1">&nbsp;&nbsp;29A&nbsp;&nbsp;</font><input id="frm1706:opt29A" name="frm1706:opt29A" value="Land TD" type="checkbox"/><label for="frm1706:opt29A"> </label>
                              <font size="1" >&nbsp;FMV of Land per latest Tax Declaration&nbsp;</font><td><input id="frm1706:txtFMVLand" style="text-align: right" maxlength="40" name="frm1706:txtFMVLand" size="20" type="text" value="" onkeypress="return numbersonly(this, event)" onblur="blockletter(this);tickCheckboxWithValue(this);round(this,2);computeFMVLI()" /></td>
                            </td>
                                                        <td>
                              <font size="1">&nbsp;29C&nbsp;</font><input id="frm1706:opt29C" name="frm1706:opt29C" value="Determined BC" type="checkbox"/><label for="frm1706:opt29C"> </label>
                              <font size="1">FMV of Land as determined by BIR Commissioner (zonal value)&nbsp;</font><td><input id="frm1706:txtFMVZonal" style="text-align: right" maxlength="40" name="frm1706:txtFMVZonal" size="20" type="text" value="" onkeypress="return numbersonly(this, event)" onblur="blockletter(this);tickCheckboxWithValue(this);round(this,2);computeFMVLI()" /></td>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <font size="1">&nbsp;&nbsp;29B&nbsp;&nbsp;</font><input id="frm1706:opt29B" value="Improvements TD" name="frm1706:opt29B" type="checkbox"/><label for="frm1706:opt29B"> </label>
                              <font size="1" >&nbsp;FMV of Improvements per latest Tax Declaration&nbsp;</font><td><input id="frm1706:txtFMVImprovements" style="text-align: right" maxlength="40" name="frm1706:txtFMVImprovements" size="20" type="text" value="" onkeypress="return numbersonly(this, event)" onblur="blockletter(this);tickCheckboxWithValue(this);round(this,2);computeFMVLI()" /></td>
                            </td>
                            <td>
                              <font size="1">&nbsp;29D&nbsp;</font><input id="frm1706:opt29D" name="frm1706:opt29D" value="Improvements BC" type="checkbox"/><label for="frm1706:opt29D"> </label>
                              <font size="1">&nbsp;FMV of Improvements as determined by BIR Commissioner (BIR Rules)&nbsp;</font><td><input id="frm1706:txtFMVBIR" style="text-align: right" maxlength="40" name="frm1706:txtFMVBIR" size="20" type="text" value="" onkeypress="return numbersonly(this, event)" onblur="blockletter(this);tickCheckboxWithValue(this);round(this,2);computeFMVLI()" /></td>
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
                      <td width="990" valign="top" class="tblFormTd">
                        <table width="990" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="300" colspan="5">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="200" ><font size="2" style="font-weight:bold;">&nbsp;30&nbsp;</font><font size="1"   style="font-size: 11px;">Determination of Taxable Base&nbsp;</font></td>
                                </tr>
                              </table>
                            </td>
                                                    </tr>
                          <tr>
                            <td>
                              <font size="1">&nbsp;&nbsp;30A&nbsp;</font><input id="frm1706:opt30A" name="frm1706:opt30" value="A" type="radio" onclick="document.getElementById('frm1706:txtGross').disabled = false;" /><label  for="frm1706:opt30A"> </label>
                              <font size="1"   style="font-size: 10px;">&nbsp;Gross Selling Price&nbsp;</font><td><input id="frm1706:txtGross" maxlength="40" name="frm1706:txtGross" style="text-align: right" size="20" type="text" value="0.00" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTaxableBase()" /></td>
                            </td>
                            <td colspan="2">
                              <font size="1">&nbsp;&nbsp;30B&nbsp;</font><input id="frm1706:opt30B" name="frm1706:opt30" value="B" type="radio" onclick="document.getElementById('frm1706:txtBid').disabled = false;" /><label for="frm1706:opt30B"> </label>
                                                            <font size="1"   style="font-size: 10px;">&nbsp;Bid Price (For Foreclosure Sale)&nbsp;</font><td><input id="frm1706:txtBid" maxlength="40" name="frm1706:txtBid" style="text-align: right" size="20" type="text" value="0.00" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTaxableBase()" /></td>  
                                                        </td>
                            
                          </tr>
                          <tr>
                            <td style="width: 257px;">
                              <font size="1">&nbsp;&nbsp;30C&nbsp;</font><input id="frm1706:opt30C" name="frm1706:opt30" value="C" type="radio"/>
                              <font size="1"  style="font-size: 10px;" >&nbsp;Fair Market Value of Land and Improvement&nbsp;</font>
                              <td valign="center"><input id="frm1706:txtFMVLI" maxlength="40" name="frm61706:txtFMVLI" style="text-align: right" size="20" type="text" value="0.00" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTaxableBase()" onblur="computeFMVLI()" />&nbsp;</td>
                              
                            </td>
                            <td colspan="2">
                              <font size="1" >&nbsp;&nbsp;30D&nbsp;</font><input id="frm1706:opt30D" name="frm1706:opt30" value="D" type="radio" onclick="document.getElementById('frm1706:txtInstallment').disabled = false;" /><label for="frm1706:opt30D"> </label>
                              <font size="1"   style="font-size: 10px;">&nbsp;Taxable Installment Collected (For &nbsp;Installment Sale Excluding Interest)&nbsp;</font><td><input id="frm1706:txtInstallment" style="text-align: right" maxlength="40" name="frm1706:txtInstallment" size="20" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTaxableBase()" value="0.00" /></td>
                            </td>   
                                                    </tr>
                          <tr>
                            <td  colspan="4"><font size="1"   style="font-size: 11px;">&nbsp;&nbsp;(Sum of 29A & 29B/ 29C & 29D/ 29A & 29D/29B & 29C, whichever is higher)&nbsp;</font></td>
                          </tr>
                          <tr>
                            <td>
                              <font size="1">&nbsp;&nbsp;30E&nbsp;</font><input id="frm1706:opt30E" name="frm1706:opt30" value="E" type="radio" onclick="document.getElementById('frm1706:txtOthers30E').disabled = false;" disabled /><label for="frm1706:opt30E"> </label>
                              <font size="1" >&nbsp;On the Unutilized Portion of Sales Proceeds (in case nos. 17 & 18 are applicable) (see <a href="#" id="btnSched1" onclick="showSched1()" >Schedule 1</a> at the back)&nbsp;</font><td><input id="frm1706:txtOthers30E" style="text-align: right" maxlength="40" name="frm1706:txtOthers30E" size="20" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTaxableBase()" value="" /></td>
                            </td>
                            <td>
                              <font size="1">&nbsp;&nbsp;30F&nbsp;</font><input id="frm1706:opt30F" name="frm1706:opt30" value="F" type="radio"/><label for="frm1706:opt30F"> </label>
                              <font size="1" style="font-weight:;">&nbsp;Others (Specify)&nbsp;</font><td><input id="frm1706:txtOtherss30F" style="text-align: right" maxlength="40" name="frm1706:txtOtherss30F" size="20" type="text" value="" /></td><td><input id="frm1706:txtOthers30F" style="text-align: right" maxlength="40" name="frm1706:txtOthers30F" size="20" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTaxableBase()" value="" /></td>
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
                                                        <td width="40%">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part II</font></td>
                                                        <td width="60%" align="left"> <font size="2" style="font-weight:bold;letter-spacing: 3px">Computation of Tax</font></td>
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
                                            <td class="tblFormTd">
                                                <table width="987" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="18"><font size="2" style="font-weight:bold;">&nbsp;31&nbsp;&nbsp;</font></td>
                                                        <td width="485"><label face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Taxable Base (Item 30A or 30C, whichever is higher, for cash sale, or item 30B, or item 30D, or Item 30E, or Item 30F, whichever is applicable</label></td>
                                                        <td width="202"><div class="spacePadder"></div></td>
                                                        <td width="199" ><span class="spacePadder"><font size="2" style="font-weight:bold;">31</font>&nbsp;&nbsp;&nbsp;<input type="text" value="0.00" style="background-color: #dcdcdc;  text-align: right;" size="20" name="frm1706:txtTax" maxlength="25" id="frm1706:txtTax" onblur="computeTaxableBase()" disabled /></span></td>
                                                    </tr>
                          <tr>
                                                        <td width="18"><font size="2" style="font-weight:bold;">&nbsp;32&nbsp;&nbsp;</font></td>
                                                        <td width="317"><font size="1"></font><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">6% Tax Due</font></td>
                                                        <td width="202"><div class="spacePadder"></div></td>
                                                        <td width="199" ><span class="spacePadder"><font size="2" style="font-weight:bold;">32</font>&nbsp;&nbsp;&nbsp;<input type="text" disabled value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1706:txtRate" maxlength="25" id="frm1706:txtRate" onblur="computeOfTaxDue()" /></span></td>
                                                    </tr>
                          <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;33&nbsp;</font></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"> Less: Tax Paid in Return Previously Filed, if this is an Amended Return</font></td>
                                                        <td><div class="spacePadder"></div></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">33</font>&nbsp;&nbsp;&nbsp;<input type="text" value="0.00" style="background-color: #ffffff;text-align:right;" size="20" name="frm1706:txtLess" maxlength="25" id="frm1706:txtLess" onblur="round(this,2);computeTaxPayable()" onkeypress="return numbersonly(this, event)" disabled /></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;34&nbsp;</font></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Payable/(Overpayment)</font></td>
                                                        <td><div class="spacePadder"></div></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">34</font>&nbsp;&nbsp;&nbsp;<input disabled type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1706:txtTaxDue" maxlength="25" id="frm1706:txtTaxDue" onblur="computeTaxPayable()" /></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;"> &nbsp;35&nbsp;</font></td>
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
                                                                            <font size="2" face="Arial"><b>35A</b>&nbsp;
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="15" name="frm1706:txtSurcharge" maxlength="25" id="frm1706:txtSurcharge" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                                            </font>
                                                                        </td>
                                                                        <td width="161" align="center">
                                                                            <font size="2" face="Arial"><b>35B</b>&nbsp;
                                                                            <input type="text" value="0.00" style="text-align: right;" size="15" name="frm1706:txtInterest" maxlength="25" id="frm1706:txtInterest" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                                            </font>
                                                                        </td>
                                                                        <td width="174" align="center">
                                                                            <font size="2" face="Arial"><b>35C</b>&nbsp;
                                                                            <input type="text" value="0.00" style="text-align: right;" size="15" name="frm1706:txtCompromise" maxlength="25" id="frm1706:txtCompromise" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">35D</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1706:txtTotalPenalties" maxlength="15" id="frm1706:txtTotalPenalties" disabled="true" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;36&nbsp;</font></td>
                                                        <td colspan="2"><font size="1">&nbsp;</font><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Total Amount Payable/(Overpayment)(Sum of items 34 & 35D)</font></td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">36</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" disabled value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1706:txtTotal" maxlength="15" id="frm1706:txtTotal" onblur="computeOfTotalAmtDue()" class="iceInpTxt-dis" />
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
                                        <td width="134" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="132">
                                                        <table width="180" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td width="24">&nbsp;</td>
                                                                <td width="150"><font size="1" style="font-size: 11px;"> If Overpayment mark one box only:</font></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="400" valign="top" class="tblFormTd"><table width="599" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="599"><table width="598" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td width="3">&nbsp;</td>
                                                                <td width="110"><input id="frm1706:opt37:_1" name="frm1706:opt37" value="R" type="radio" disabled />
                                                                    <font size="1">
                                                                        <label for="frm1706:opt37:_1">To be refunded</label>
                                                                    </font> </td>
                                                                <td width="221"><input id="frm1706:opt37:_2" name="frm1706:opt37" value="I" type="radio" disabled />
                                                                    <font size="1">
                                                                        <label for="frm1706:opt37:_2">To be issued a Tax Credit Certificate</label>
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
                  <div class="imgClass" align='center' style="display:none; width:990px !important;">
                    <!-- <img id="frm1706:jurat" src="../img/jurat/1706.jpg" width="990"/> -->
                    <table  style="border-top: 3px solid black; font-family:arial; font-size:13px; text-align: center; table-layout: fixed;">
                      <col width="50%" />
                        <col width="50%" />
                        <tr>
                          <td colspan="2">I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge and belief,
                              <br/>is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
                              <br/>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><b>37</b>____________________________________________________
                            <br/>Taxpayer/Authorized Agent Signature over Printed Name</td>
                          <td><b>38</b>_______________________________
                            <br/>Title/Position of Signatory</td>
                        </tr>
                    </table>
                  </div>
                  <div class="imgClass" align='center' style="display:none; width:990px !important;">
                    <img id="frm1706:jurat" src="{{ asset('images/bottom_img/1706_new.jpg') }}" width="990"/>
                  </div>
                  <div class="imgClass" align='center' style="display:none; width:990px !important;">
                    <table style="font-size:10px; text-align: left; vertical-align: top;">
                      <tr>
                        <td>&nbsp;Machine Validation/Revenue Official Receipt Details (If not filed with the bank)<br/><br/><br/><br/></td>
                      </tr>
                    </table>
                    <div style="font-size:2px;">&nbsp;</div>
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
                                                                                <input type="button" class="printButtonClass" value="Validate" style="width: 100px;" name="frm1706:cmdValidate" id="frm1706:cmdValidate" onclick="validate()" />
                                                                                <input type="button" class="printButtonClass" value="Edit" style="width: 100px;" name="frm1706:cmdEdit" id="frm1706:cmdEdit" onclick="enableAllControl()"/>
                                                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                <input value="Save" class="printButtonClass" style="width: 100px;" name="btnSave" id="btnSave" type="button" onclick="saveData();">
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1706:btnFinalCopy" id="frm1706:btnFinalCopy" onclick="submitForm();" />
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
                            <tr>
                                <td>
                                    <div class="footer footer1707" style="padding:6px; text-align: center; font-size: 11px; background-color: white;">
                                        <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div id="DummyTxt" style='display:none;'>  </div>
                    </div>
                </div>
            </div>
        </div>  
    <!-- schedule 1 -->
    <div id="modalSched1" class="printSignFooterClass_1706 aBox1706Sched1" style="width: 90%; display:none; min-height:400px; position:relative; top:3%; left:3%; right:auto; overflow-y:auto;  overflow-x:hidden; background:#fff;" align="center">
      <br /><br />
            <table border="1" cellspacing="0" cellpadding="0" style="position: static" width="90%">
                <tr>
                    <td>
                        <table border="0" cellspacing="0" cellpadding="0" width="90%">
                            <tr>
                                <td class="modalHeader">Schedule 1 Computation of Tax Base on the Unutilized Portion of Sales Proceeds (if box nos. 17 and 18 are applicable)</td>
                            </tr>
                        </table>
                    </td>
                </tr>
        <table border="1" width="90%">
        <tr>
          <td  align="center"><input  id="frm1706:txtSchedModal1" name="frm1706:txtSchedModal1" maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
          <td  align="center"><input  id="frm1706:txtSchedModal2" name="frm1706:txtSchedModal2"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
        </tr>
        <tr>
          <td  align="center"><input  id="frm1706:txtSchedModal3" name="frm1706:txtSchedModal3"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
          <td  align="center"><input  id="frm1706:txtSchedModal4" name="frm1706:txtSchedModal4"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
        </tr>
        <tr>
          <td  align="center"><input  id="frm1706:txtSchedModal5" name="frm1706:txtSchedModal5"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
          <td  align="center"><input  id="frm1706:txtSchedModal6" name="frm1706:txtSchedModal6"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
        </tr>
        <tr>
          <td  align="center"><input  id="frm1706:txtSchedModal7" name="frm1706:txtSchedModal7"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
          <td  align="center"><input  id="frm1706:txtSchedModal8" name="frm1706:txtSchedModal8"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
        </tr>
        <tr>
          <td  align="center"><input  id="frm1706:txtSchedModal9" name="frm1706:txtSchedModal9"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
          <td  align="center"><input  id="frm1706:txtSchedModal10" name="frm1706:txtSchedModal10"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
        </tr>
        <tr>
          <td  align="center"><input  id="frm1706:txtSchedModal11" name="frm1706:txtSchedModal11"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
          <td  align="center"><input  id="frm1706:txtSchedModal12" name="frm1706:txtSchedModal12"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
        </tr>
        <tr>
          <td  align="center"><input  id="frm1706:txtSchedModal13" name="frm1706:txtSchedModal13" maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
          <td  align="center"><input  id="frm1706:txtSchedModal14" name="frm1706:txtSchedModal14"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
        </tr>
        <tr>
          <td  align="center"><input  id="frm1706:txtSchedModal15" name="frm1706:txtSchedModal15"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
          <td  align="center"><input  id="frm1706:txtSchedModal16" name="frm1706:txtSchedModal16"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
        </tr>
        <tr>
          <td  align="center"><input  id="frm1706:txtSchedModal17" name="frm1706:txtSchedModal17"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
          <td  align="center"><input  id="frm1706:txtSchedModal18" name="frm1706:txtSchedModal18"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
        </tr>
        <tr>
          <td  align="center"><input  id="frm1706:txtSchedModal19" name="frm1706:txtSchedModal19"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
          <td  align="center"><input  id="frm1706:txtSchedModal20" name="frm1706:txtSchedModal20"  maxlength='17'   size="60" style="text-align: left; font-family: Arial, Helvetica, sans-serif; font-size: 9pt;" type="text" value="" /></td>
        </tr>
      </table>
      </table>
            <br/><br/>
            <input type="button" class="printButtonClass" name="frm1706:Sched5btnOk" id="frm1706:Sched5btnOk" style="width:120px; height:30px;" value="OK" onclick="getSched1()"  />
      <input type="button" class="printButtonClass" style="width: 120px; height: 30px;" id="frm1706:modalCancel" name="frm1706:modalCancel" value="CANCEL" onclick="hideSchedule1()"/>
            <br/><br/>
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
    <div id="responseRdo" style="display:none;"><!--loaded files render here--></div> 
@endsection

@section('scripts')
<script type="text/javascript">

  /*----------------------------------*/
    var d=document,XMLBGFile='',data='',XMLFile='',msg = d.getElementById('msg'),flag=true;
  var loader=d.getElementById('loader');
  /*----------------------------------*/   
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
  var p3ReturnPeriodMonthI = "";
  var p3ReturnPeriodYearI = ""; 
  
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
        loadData();

        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
        }

        if (gIsReadOnly) {
          d.getElementById('frm1706:cmdValidate').disabled = true;
          d.getElementById('btnSave').disabled = true;
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
          if(elem[i].id == 'frm1706:txtSellerName' || elem[i].id == 'frm1706:txtSellerAddress' || elem[i].id == 'frm1706:txtSellerRAddress' 
          || elem[i].id == 'frm1706:txtBuyerName' || elem[i].id == 'frm1706:txtBuyerAddress' || elem[i].id == 'frm1706:txtLocation'){
            elem[i].value = unescape(fieldVal[1]);
          }
          else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
          else{
              elem[i].value = (typeof(fieldVal[1]) === "undefined") ? '' : fieldVal[1]; //all select-one and text values        
          }
        }
        if (elem[i].type == 'radio') {
          var fVal = String( $("#response").html() ).split(elem[i].id+'=');
          if (fVal[1] == 'true') {
            elem[i].checked = fVal[1];
            //elem[i].onclick();
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
          //elem[i].onclick(); //display computations
        }
      }

        }       
  }
  
  
  var XMLrdoFile='';

  function loadXMLrdo(fileLocation) {
    var url = document.getElementsByName('base_url')[0].getAttribute('content');
      console.log(url + fileLocation);
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
        var responseRdo = d.getElementById('responseRdo');
        responseRdo.innerHTML = xmlHTTP.responseText; //remove XML tag
        loadRdo();
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
    
      //Ensure that before writing to rdoPropertyJS the formType 1706 is traceable in rdoStr
      if (rdoStr.indexOf('1706') >= 0) {
          var rdoValues = rdoStr.split('~');              
        var rdoCode = rdoValues[0];
        var description = rdoValues[1];       
        
        var objRdo = new rdoPropertyJS(rdoCode, description);
        rdoList[k] = objRdo; 
        k++;
        //alert('1706 successfully created array #'+i);
        
      } else {    
        //alert('1706 not found in array #'+i);
        continue;
      }
    }         
  }
  
    var str;
    str = setTimeout("sleeptime()", 300);


    function sleeptime()
    {
        init();
    
        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;

        if (fileName != null && fileName.indexOf('.xml') > -1) {
          loadXML(fileName);   

          d.getElementById('frm1706:txtDateMonth').disabled = true;
          d.getElementById('frm1706:txtDateDay').disabled = true;
          d.getElementById('frm1706:txtDateYear').disabled = true;
          d.getElementById('frm1706:txtTCT').disabled = true;
          
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
        
        d.getElementById('frm1706:txtTIN1').disabled = true;
        d.getElementById('frm1706:txtTIN2').disabled = true;
        d.getElementById('frm1706:txtTIN3').disabled = true;
        d.getElementById('frm1706:txtBranchCode').disabled = true;  
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
    mm = "" + (year.getMonth()+1);
    if (mm.length == 1) 
    { 
      mm = "0" + mm; 
      d.getElementById('frm1706:txtDateMonth').value = mm;
    }
    else
    {
      d.getElementById('frm1706:txtDateMonth').value = year.getMonth()+1;
    }
    d.getElementById('frm1706:txtDateYear').value = year.getFullYear();
    dd = "" + year.getDate();
    if (dd.length == 1) 
    { 
      dd = "0" + dd; 
      d.getElementById('frm1706:txtDateDay').value = dd;
    }
    else
    {
      d.getElementById('frm1706:txtDateDay').value = year.getDate();
    }
    @if($action != 'view')
    d.getElementById('btnPrint').disabled = true;
    d.getElementById('frm1706:cmdEdit').disabled = true;
    d.getElementById('frm1706:btnFinalCopy').disabled = true;
    d.getElementById('btnUpload').disabled = true;
    @endif
    d.getElementById('frm1706:j_id392:_1').disabled = true;
    d.getElementById('frm1706:j_id392:_2').disabled = true;
    d.getElementById('frm1706:j_id393:_1').disabled = true;
    d.getElementById('frm1706:j_id393:_2').disabled = true;
    
    loadXMLrdo('/xml/rdo.xml');
    getRdo();
    }
  
  function showSched1()
  {
    d.getElementById('formPaper').style.display = "none";
      $('#modalSched1').show('blind');
  }
  
  var sched1Values = new Array();
  function getSched1()
  {
    for (var i=1; i<21; i++) {
      sched1Values[i]=d.getElementById('frm1706:txtSchedModal'+i).value;
    }
    d.getElementById('formPaper').style.display = 'block';
    $('#modalSched1').hide('blind');
    $('#DummyTxt').html("Creator");
    $('#DummyTxt').html("");
  }
  function hideSchedule1()
  {
        for (var i=1; i<21; i++) {
      if (sched1Values[i] != null)
        d.getElementById('frm1706:txtSchedModal'+i).value=sched1Values[i];
      else
        d.getElementById('frm1706:txtSchedModal'+i).value="";
    }
    d.getElementById('formPaper').style.display = 'block';
    if ( $('#modalSched1').css('display') != 'none' ) {
      $('#modalSched1').hide('blind');
    }
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");      
    }
  
  function disable17and18()
  {
    document.getElementById('frm1706:j_id392:_1').disabled = true;
    document.getElementById('frm1706:j_id392:_2').disabled = true;
    document.getElementById('frm1706:j_id393:_1').disabled = true;
    document.getElementById('frm1706:j_id393:_2').disabled = true;
    
    document.getElementById('frm1706:j_id392:_1').checked = false;
    document.getElementById('frm1706:j_id392:_2').checked = false;
    document.getElementById('frm1706:j_id393:_1').checked = false;
    document.getElementById('frm1706:j_id393:_2').checked = false;
  }
  
  function enable17and18()
  {
    document.getElementById('frm1706:j_id392:_1').disabled = false;
    document.getElementById('frm1706:j_id392:_2').disabled = false;
    document.getElementById('frm1706:j_id393:_1').disabled = false;
    document.getElementById('frm1706:j_id393:_2').disabled = false;
  }
    
  var disableElem = true;
  var enableElem = false;
  function disableAllControl()
    {
        document.getElementById('frm1706:txtSheets').disabled = true;
        document.getElementById('frm1706:txtTIN1').disabled = true;
        document.getElementById('frm1706:txtTIN2').disabled = true;
        document.getElementById('frm1706:txtTIN3').disabled = true;
        document.getElementById('frm1706:txtBranchCode').disabled = true;
        document.getElementById('frm1706:txtRDOCode').disabled = true;
        document.getElementById('frm1706:txtTINB1').disabled = true;
        document.getElementById('frm1706:txtTINB2').disabled = true;
    document.getElementById('frm1706:txtTINB3').disabled = true;
        document.getElementById('frm1706:txtBranchCodeB').disabled = true;
        document.getElementById('frm1706:txtRDOCodeB').disabled = true;
    document.getElementById('frm1706:txtSellerName').disabled = true;
        document.getElementById('frm1706:txtBuyerName').disabled = true;
    document.getElementById('frm1706:txtSellerAddress').disabled = true;
        document.getElementById('frm1706:txtBuyerAddress').disabled = true;
    document.getElementById('frm1706:txtSellerRAddress').disabled = true;
        document.getElementById('frm1706:txtLocation').disabled = true;
    document.getElementById('btnSched1').disabled = true;
    
    document.getElementById('frm1706:txtLess').disabled = true;
        document.getElementById('frm1706:j_id217:_1').disabled = true;
        document.getElementById('frm1706:j_id217:_2').disabled = true;
        document.getElementById('frm1706:j_id392:_1').disabled = true;
        document.getElementById('frm1706:j_id392:_2').disabled = true;
    document.getElementById('frm1706:rdTreaty:_1').disabled = true;
        document.getElementById('frm1706:rdTreaty:_2').disabled = true;
        document.getElementById('frm1706:selTreaty').disabled = true;
    document.getElementById('frm1706:txtDateMonth').disabled = true;
        document.getElementById('frm1706:txtDateDay').disabled = true;
        document.getElementById('frm1706:txtDateYear').disabled = true;
    document.getElementById('frm1706:opt4').disabled = true;
        document.getElementById('frm1706:opt4C').disabled = true;
    d.getElementById('btnPrint').disabled = false;
    d.getElementById('frm1706:cmdEdit').disabled = false;
    d.getElementById('frm1706:btnFinalCopy').disabled = false;
    d.getElementById('btnUpload').disabled = false;
    
    document.getElementById('frm1706:j_id393:_1').disabled = true;
        document.getElementById('frm1706:j_id393:_2').disabled = true;
    //document.getElementById('frm1706:j_id391').disabled = true;
    document.getElementById('frm1706:j_id391:_1').disabled = true;
    document.getElementById('frm1706:j_id391:_2').disabled = true;
    document.getElementById('frm1706:j_id391:_3').disabled = true;
    document.getElementById('frm1706:j_id391:_4').disabled = true;
    document.getElementById('frm1706:j_id391:_5').disabled = true;
    document.getElementById('frm1706:j_id391:_6').disabled = true;
    document.getElementById('frm1706:j_id391:_7').disabled = true;
    document.getElementById('frm1706:j_id391:_8').disabled = true;
    document.getElementById('frm1706:txtTCT').disabled = true;
    document.getElementById('frm1706:txtArea').disabled = true;
    document.getElementById('frm1706:txtTaxDC').disabled = true;
    document.getElementById('frm1706:txtOthers').disabled = true;
    document.getElementById('frm1706:txtRDOCode14A').disabled = true;
    document.getElementById('frm1706:j_id394').disabled = true;
    document.getElementById('frm1706:j_id395').disabled = true;
    document.getElementById('frm1706:txtSelling').disabled = true;
    document.getElementById('frm1706:txtCost').disabled = true;
    document.getElementById('frm1706:txtMortgage').disabled = true;
    document.getElementById('frm1706:txtTotalP').disabled = true;
    document.getElementById('frm1706:txtAmount').disabled = true;
    document.getElementById('frm1706:txtTotalN').disabled = true;
    document.getElementById('frm1706:txtDateMonthI').disabled = true;
    document.getElementById('frm1706:txtDateDayI').disabled = true;
    document.getElementById('frm1706:txtDateYearI').disabled = true;
    document.getElementById('frm1706:opt29A').disabled = true;
    document.getElementById('frm1706:txtFMVLand').disabled = true;
    document.getElementById('frm1706:opt29C').disabled = true;
    document.getElementById('frm1706:txtFMVZonal').disabled = true;
    document.getElementById('frm1706:opt29B').disabled = true;
    document.getElementById('frm1706:txtFMVImprovements').disabled = true;
    document.getElementById('frm1706:opt29D').disabled = true;
    document.getElementById('frm1706:txtFMVBIR').disabled = true;

    document.getElementById('frm1706:opt30A').disabled = true;
    document.getElementById('frm1706:txtGross').disabled = true;
    document.getElementById('frm1706:opt30B').disabled = true;
    document.getElementById('frm1706:txtBid').disabled = true;
    document.getElementById('frm1706:opt30C').disabled = true;
    document.getElementById('frm1706:txtFMVLI').disabled = true;
    document.getElementById('frm1706:opt30D').disabled = true;
    document.getElementById('frm1706:txtInstallment').disabled = true;
    document.getElementById('frm1706:opt30E').disabled = true;
    document.getElementById('frm1706:txtOthers30E').disabled = true;
    document.getElementById('frm1706:opt30F').disabled = true;
    document.getElementById('frm1706:txtOthers30F').disabled = true;
    document.getElementById('frm1706:txtOtherss30F').disabled = true;

    document.getElementById('frm1706:txtSurcharge').disabled = true;
    document.getElementById('frm1706:txtInterest').disabled = true;
    document.getElementById('frm1706:txtCompromise').disabled = true;
    document.getElementById('frm1706:txtOthers21').disabled = true;
    document.getElementById('frm1706:opt37:_1').disabled = true;
    document.getElementById('frm1706:opt37:_2').disabled = true;
    disableElem;
    enableElem;
  }

    function enableAllControl()
    {
    document.getElementById('frm1706:txtSheets').disabled = false;
        document.getElementById('frm1706:txtTIN1').disabled = false;
        document.getElementById('frm1706:txtTIN2').disabled = false;
        document.getElementById('frm1706:txtTIN3').disabled = false;
        document.getElementById('frm1706:txtBranchCode').disabled = false;
        document.getElementById('frm1706:txtRDOCode').disabled = false;
        document.getElementById('frm1706:txtTINB1').disabled = false;
        document.getElementById('frm1706:txtTINB2').disabled = false;
    document.getElementById('frm1706:txtTINB3').disabled = false;
        document.getElementById('frm1706:txtBranchCodeB').disabled = false;
        document.getElementById('frm1706:txtRDOCodeB').disabled = false;
    document.getElementById('frm1706:txtSellerName').disabled = false;
        document.getElementById('frm1706:txtBuyerName').disabled = false;
    document.getElementById('frm1706:txtSellerAddress').disabled = false;
        document.getElementById('frm1706:txtBuyerAddress').disabled = false;
    document.getElementById('frm1706:txtSellerRAddress').disabled = false;
        document.getElementById('frm1706:txtLocation').disabled = false;
    
    document.getElementById('frm1706:txtDateMonth').disabled = false;
        document.getElementById('frm1706:txtDateDay').disabled = false;
        document.getElementById('frm1706:txtDateYear').disabled = false;
    
        document.getElementById('frm1706:j_id217:_1').disabled = false;
        document.getElementById('frm1706:j_id217:_2').disabled = false;
    if(document.getElementById('frm1706:opt4').checked)
    {
      document.getElementById('frm1706:j_id392:_1').disabled = false;
      document.getElementById('frm1706:j_id392:_2').disabled = false;
    }
    else
    {
      document.getElementById('frm1706:j_id392:_1').disabled = true;
      document.getElementById('frm1706:j_id392:_2').disabled = true;
    }
        document.getElementById('frm1706:rdTreaty:_1').disabled = false;
        document.getElementById('frm1706:rdTreaty:_2').disabled = false;
    document.getElementById('frm1706:opt4').disabled = false;
        document.getElementById('frm1706:opt4C').disabled = false;
    document.getElementById('btnSched1').disabled = false;
        if(document.getElementById('frm1706:rdTreaty:_1').checked)
        {
            document.getElementById('frm1706:selTreaty').disabled = false;
        }
       
        if(document.getElementById('frm1706:j_id217:_1').checked) {
            document.getElementById('frm1706:txtLess').disabled = false;
        } else {
            document.getElementById('frm1706:txtLess').disabled = true;
        }
    
    if(document.getElementById('frm1706:j_id395:_5').checked || document.getElementById('frm1706:j_id395:_2').checked)
    {
      document.getElementById('frm1706:txtOthers21').disabled = false;
    }
    else {
            document.getElementById('frm1706:txtOthers21').disabled = true;
        }

        document.getElementById('frm1706:cmdValidate').disabled = false;
    d.getElementById('btnPrint').disabled = true;
        document.getElementById('frm1706:cmdEdit').disabled = true;
    d.getElementById('frm1706:btnFinalCopy').disabled = true;
    d.getElementById('btnUpload').disabled = true;
        //document.getElementById('btnSave').disabled = true;
    
    if(document.getElementById('frm1706:opt4').checked)
    {
      document.getElementById('frm1706:j_id393:_1').disabled = false;
      document.getElementById('frm1706:j_id393:_2').disabled = false;
    }
    else
    {
      document.getElementById('frm1706:j_id393:_1').disabled = true;
      document.getElementById('frm1706:j_id393:_2').disabled = true;
    }
    //document.getElementById('frm1706:j_id391').disabled = false;
    document.getElementById('frm1706:j_id391:_1').disabled = false;
    document.getElementById('frm1706:j_id391:_2').disabled = false;
    document.getElementById('frm1706:j_id391:_3').disabled = false;
    document.getElementById('frm1706:j_id391:_4').disabled = false;
    document.getElementById('frm1706:j_id391:_5').disabled = false;
    document.getElementById('frm1706:j_id391:_6').disabled = false;
    document.getElementById('frm1706:j_id391:_8').disabled = false;
    if(document.getElementById('frm1706:j_id391:_8').checked)
    {
      document.getElementById('frm1706:j_id391:_7').disabled = false;
    }
    document.getElementById('frm1706:txtTCT').disabled = false;
    document.getElementById('frm1706:txtArea').disabled = false;
    document.getElementById('frm1706:txtTaxDC').disabled = false;
    document.getElementById('frm1706:txtOthers').disabled = false;
    document.getElementById('frm1706:txtRDOCode14A').disabled = false;
    document.getElementById('frm1706:j_id394').disabled = false;
    document.getElementById('frm1706:j_id395').disabled = false;
    document.getElementById('frm1706:txtSelling').disabled = false;
    document.getElementById('frm1706:txtCost').disabled = false;
    document.getElementById('frm1706:txtMortgage').disabled = false;
    document.getElementById('frm1706:txtTotalP').disabled = false;
    document.getElementById('frm1706:txtAmount').disabled = false;
    document.getElementById('frm1706:txtTotalN').disabled = false;
    document.getElementById('frm1706:txtDateMonthI').disabled = false;
    document.getElementById('frm1706:txtDateDayI').disabled = false;
    document.getElementById('frm1706:txtDateYearI').disabled = false;
    document.getElementById('frm1706:opt29A').disabled = false;
    document.getElementById('frm1706:txtFMVLand').disabled = false;
    document.getElementById('frm1706:opt29C').disabled = false;
    document.getElementById('frm1706:txtFMVZonal').disabled = false;
    document.getElementById('frm1706:opt29B').disabled = false;
    document.getElementById('frm1706:txtFMVImprovements').disabled = false;
    document.getElementById('frm1706:opt29D').disabled = false;
    document.getElementById('frm1706:txtFMVBIR').disabled = false;

    document.getElementById('frm1706:opt30A').disabled = false;
    document.getElementById('frm1706:txtGross').disabled = false;
    document.getElementById('frm1706:opt30B').disabled = false;
    document.getElementById('frm1706:txtBid').disabled = false;
    document.getElementById('frm1706:opt30C').disabled = false;
    document.getElementById('frm1706:txtFMVLI').disabled = false;
    document.getElementById('frm1706:opt30D').disabled = false;
    document.getElementById('frm1706:txtInstallment').disabled = false;
    document.getElementById('frm1706:opt30E').disabled = false;
    document.getElementById('frm1706:txtOthers30E').disabled = false;
    document.getElementById('frm1706:opt30F').disabled = false;
    document.getElementById('frm1706:txtOthers30F').disabled = false;
    document.getElementById('frm1706:txtOtherss30F').disabled = false;

    document.getElementById('frm1706:txtSurcharge').disabled = false;
    document.getElementById('frm1706:txtInterest').disabled = false;
    document.getElementById('frm1706:txtCompromise').disabled = false;
    if(NumWithComma(document.getElementById('frm1706:txtTotal').value) < 0)
    {
      document.getElementById('frm1706:opt37:_1').disabled = false;
      document.getElementById('frm1706:opt37:_2').disabled = false;
    }
    else
    {
      document.getElementById('frm1706:opt37:_1').disabled = true;
      document.getElementById('frm1706:opt37:_2').disabled = true;
    }
    if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
      d.getElementById('frm1706:txtDateMonth').disabled = true;
      d.getElementById('frm1706:txtDateDay').disabled = true;
      d.getElementById('frm1706:txtDateYear').disabled = true;  
      d.getElementById('frm1706:txtTCT').disabled = true;
    }
    disableElem;
    enableElem;
    d.getElementById('frm1706:txtTIN1').disabled = true;
      d.getElementById('frm1706:txtTIN2').disabled = true;
    d.getElementById('frm1706:txtTIN3').disabled = true;
    d.getElementById('frm1706:txtBranchCode').disabled = true;    
    }
  
  function getRdo()
    {
        var data2 = "<select class='iceSelOneMnu' id='frm1706:txtRDOCodeB' name='frm1706:txtRDOCodeB' size='1'><option value='000'> </option>";
        var data3 = "<select class='iceSelOneMnu' id='frm1706:txtRDOCode14A' name='frm1706:txtRDOCode14A' size='1'><option value='000'> </option>";
    
    for(var i = 0; i < rdoList.length; i++) {
            var rdo = rdoList[i];
            data2 = data2 + "<option value='" + rdo.rdoCode + "'>" + rdo.description + "</option>";
            data3 = data3 + "<option value='" + rdo.rdoCode + "'>" + rdo.description + "</option>";
        }
    data2 = data2 + "</select>";
    data3 = data3 + "</select>";
    
    $('#rdoSelect2').html(data2);
    $('#rdoSelect3').html(data3);
    }
  
    function validate()
    { 
    var seller = d.getElementById('frm1706:txtTIN1').value + d.getElementById('frm1706:txtTIN2').value + d.getElementById('frm1706:txtTIN3').value + d.getElementById('frm1706:txtBranchCode').value;
    var buyer = d.getElementById('frm1706:txtTINB1').value + d.getElementById('frm1706:txtTINB2').value + d.getElementById('frm1706:txtTINB3').value + d.getElementById('frm1706:txtBranchCodeB').value;
  
    var year = new Date();
    
    if(d.getElementById('frm1706:txtDateMonth').value != "" || d.getElementById('frm1706:txtDateDay').value != "" || d.getElementById('frm1706:txtDateYear').value != ""){
                if(validateMonthDayYearDate(d.getElementById('frm1706:txtDateMonth').value + "/" + d.getElementById('frm1706:txtDateDay').value + "/" + d.getElementById('frm1706:txtDateYear').value)){
                    alert("Invalid date entry on item 1.");
                    return true;
                }
        }else {
                alert("Please indicate date of transaction on item 1.");
                return true;
        }
    
        
        if( document.getElementById('frm1706:txtDateYear').value*1 < 1904   )
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1904.")
            return;
        }
    if(document.getElementById('frm1706:j_id217:_1').checked == false && document.getElementById('frm1706:j_id217:_2').checked == false )
        {
            alert("Please choose amended return on item 2.")
            return;
        }
        if(document.getElementById('frm1706:opt4').checked == false && document.getElementById('frm1706:opt4C').checked == false )
        {
            alert("Please select an option for Item 4.")
            return;
        }
    if( (document.getElementById('frm1706:txtTIN1').value == "")  )
    {
      alert("Please enter the Seller's TIN.")
      return;
    }
    if( (document.getElementById('frm1706:txtTIN2').value == "")  )
    {
      alert("Please enter the Seller's TIN.")
      return;
    }
    if( (document.getElementById('frm1706:txtTIN3').value == "")  )
    {
      alert("Please enter the Seller's TIN.")
      return;
    }
    if( (document.getElementById('frm1706:txtBranchCode').value == "")  )
    {
      alert("Please enter the Seller's TIN.")
      return;
    }
    if( (document.getElementById('frm1706:txtTINB1').value == "")  )
    {
      alert("Please enter the Buyer's TIN.")
      return;
    }
    if( (document.getElementById('frm1706:txtTINB2').value == "")  )
    {
      alert("Please enter the Buyer's TIN.")
      return;
    }
    if( (document.getElementById('frm1706:txtTINB3').value == "")  )
    {
      alert("Please enter the Buyer's TIN.")
      return;
    }
    if( (document.getElementById('frm1706:txtBranchCodeB').value == "")  )
    {
      alert("Please enter the Buyer's TIN.")
      return;
    }
    if(seller.localeCompare(buyer) == 0)
    {
      alert("TIN for Buyer and Seller should be different.")
      return;
    }
    if( (document.getElementById('frm1706:txtRDOCodeB').selectedIndex == 0)  )
    {
      alert("Please enter the Buyer's RDO Code.")
      return;
    }
    if( (document.getElementById('frm1706:txtSellerName').value == "")  )
    {
      alert("Please enter the Seller's Name.")
      return;
    }
    if( (document.getElementById('frm1706:txtBuyerName').value == "")  )
    {
      alert("Please enter the Buyer's Name.")
      return;
    }
    if( (document.getElementById('frm1706:txtSellerAddress').value == "")  )
    {
      alert("Please enter the Seller's Address.")
      return;
    }
    if( (document.getElementById('frm1706:txtBuyerAddress').value == "")  )
    {
      alert("Please enter the Buyer's address.")
      return;
    }
    if( (document.getElementById('frm1706:txtLocation').value == "")  )
    {
      alert("Please enter the Location of the Property.")
      return;
    } 
    if ((document.getElementById('frm1706:txtRDOCode14A').selectedIndex <= 0)) {
        alert("Please enter the RDO Code on Item 14A.")
        return;
    }
    if( document.getElementById('frm1706:j_id391:_1').checked == false && document.getElementById('frm1706:j_id391:_2').checked == false && document.getElementById('frm1706:j_id391:_3').checked == false && document.getElementById('frm1706:j_id391:_4').checked == false && document.getElementById('frm1706:j_id391:_5').checked == false && document.getElementById('frm1706:j_id391:_6').checked == false && document.getElementById('frm1706:j_id391:_8').checked == false) 
        {
            alert("Please select an option for Item 15.");
            return;
        }
   
    if( (document.getElementById('frm1706:txtTCT').value == "")  )
    {
      alert("Please enter the TCT/OCT/CCT No.")
      return;
    }
    
    if(document.getElementById('frm1706:opt4').checked == true)
      {if( document.getElementById('frm1706:j_id392:_1').checked == false && document.getElementById('frm1706:j_id392:_2').checked == false  )
      {
        alert("Please select an option for Item 17.");
        return;
      }
      
      if( document.getElementById('frm1706:j_id393:_1').checked == false && document.getElementById('frm1706:j_id393:_2').checked == false  )
      {
        alert("Please select an option for Item 18.");
        return;
      }
    }
    
    if(!document.getElementById('frm1706:j_id394:_1').checked && !document.getElementById('frm1706:j_id394:_2').checked)
    {
      alert("Please select an option for Item 19.");
      return;
    }
    if(!document.getElementById('frm1706:j_id395:_1').checked && !document.getElementById('frm1706:j_id395:_2').checked && !document.getElementById('frm1706:j_id395:_3').checked && !document.getElementById('frm1706:j_id395:_4').checked && !document.getElementById('frm1706:j_id395:_5').checked)
    {
      alert("Please select an option for Item 21.");
      return;
    }
    if(document.getElementById('frm1706:rdTreaty:_1').checked && document.getElementById('frm1706:selTreaty').selectedIndex == 0)
    {
      alert("Please specify tax relief you are availing for Item 20.");
      return;
    }
    
    if (( document.getElementById('frm1706:j_id395:_2').checked == true || document.getElementById('frm1706:j_id395:_5').checked == true ) && document.getElementById('frm1706:txtOthers21').value == '')
    {
      alert("Please specify a valid description of transaction in item 21.")
      return;     
    }
    
    if(!document.getElementById('frm1706:opt30A').checked && !document.getElementById('frm1706:opt30B').checked && !document.getElementById('frm1706:opt30C').checked && !document.getElementById('frm1706:opt30D').checked && !document.getElementById('frm1706:opt30E').checked && !document.getElementById('frm1706:opt30F').checked)
    {
      alert("Please choose Determination of taxable base in Item 30");
      return;
    }
    
    if(NumWithComma(document.getElementById('frm1706:txtTotal').value) < 0 && (!document.getElementById('frm1706:opt37:_1').checked && !document.getElementById('frm1706:opt37:_2').checked))
    {
      alert("Please choose if to be refunded or to be issued a Tax Credit Certificate.")
      return;
    }
         
        // all forms validate with entry

        document.getElementById('frm1706:cmdValidate').disabled = true;
        document.getElementById('frm1706:cmdEdit').disabled = false;
        
        disableAllControl();
        alert("Validation successful. Click on 'Edit' if you wish to modify your entries.");
        return;
    }

    function enableSelTreaty()
    {
        if( document.getElementById('frm1706:j_id394:_1').checked == false && document.getElementById('frm1706:j_id394:_2').checked == false  )
        {
            alert("Please select an option for Item 19."); return;
            document.getElementById('frm1706:rdTreaty:_2').checked = true;
        } else {
            document.getElementById('frm1706:selTreaty').disabled = false;
            document.getElementById('frm1706:selTreaty').selectedIndex = 0;
           
        }
    }

    function disableSelTreaty()
    {
        document.getElementById('frm1706:selTreaty').disabled = true;
        document.getElementById('frm1706:selTreaty').selectedIndex = 0;
    }
   
    function computeOfTaxDue()
    {
      document.getElementById('frm1706:txtRate').value = formatCurrency(NumWithComma(document.getElementById('frm1706:txtTax').value) * (6 / 100) );
    
    computeTaxPayable();
    }
  
  function computeTaxPayable()
  {
  
    document.getElementById('frm1706:txtTaxDue').value = formatCurrency(NumWithComma(document.getElementById('frm1706:txtRate').value) - NumWithComma(document.getElementById('frm1706:txtLess').value) );
    
    computeOfTotalAmtDue();
  }
  
  function computePenalties()
    {
     
        document.getElementById('frm1706:txtTotalPenalties').value = formatCurrency(NumWithComma(document.getElementById('frm1706:txtSurcharge').value)*1  + NumWithComma(document.getElementById('frm1706:txtInterest').value)*1 + NumWithComma(document.getElementById('frm1706:txtCompromise').value)*1);
    computeOfTotalAmtDue();
    

        
    }
    function computeOfTotalAmtDue()
    {
      document.getElementById('frm1706:txtTotal').value = formatCurrency(NumWithComma(document.getElementById('frm1706:txtTotalPenalties').value)*1 + NumWithComma(document.getElementById('frm1706:txtTaxDue').value)*1);
      var item36 = NumWithComma(document.getElementById('frm1706:txtTotal').value)
      if (item36 < 0)
      {
        document.getElementById('frm1706:opt37:_1').disabled = false;
        document.getElementById('frm1706:opt37:_2').disabled = false;
      }
    else
    {
      document.getElementById('frm1706:opt37:_1').disabled = true;
      document.getElementById('frm1706:opt37:_2').disabled = true;
      document.getElementById('frm1706:opt37:_1').checked = false;
      document.getElementById('frm1706:opt37:_2').checked = false;
    }
    capital();
  }

    

    function checkTIN(e)
    {
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
    
    function checkiftaxwheldisYes()
    {
        if(document.getElementById('frm1706:j_id252:_1').checked == false && document.getElementById('frm1706:j_id252:_2').checked == false )
        {
            return "Please select an option for Item 4.";
        }
        else if( document.getElementById('frm1706:j_id392:_1').checked == false && document.getElementById('frm1706:j_id392:_2').checked == false  )
        {
            return "Please select an option for Item 12.";
        }
        else if( document.getElementById('frm1706:j_id252:_1').checked == true )
        {
            return true;
        }
    }

    function checkTINlength(e){

        if(e.length < 12){
            alert("TIN not valid"); return;
            e.onfocus;
        }
    }
  
  function enableIndividual()
  {
    if (document.getElementById('frm1706:j_id392:_1').checked == true && document.getElementById('frm1706:j_id393:_1').checked == true)  
    {
      document.getElementById('frm1706:opt30E').disabled = false;
      document.getElementById('frm1706:txtOthers30E').disabled = false;
    } 
  }
  
  function disableIndividual()
  {
      document.getElementById('frm1706:opt30E').disabled = true;
      document.getElementById('frm1706:opt30E').checked = false;
      document.getElementById('frm1706:txtOthers30E').disabled = true;  
  }
  
  function enableInstallment() 
  {
          document.getElementById('frm1706:txtSelling').disabled = false;
      document.getElementById('frm1706:txtCost').disabled = false;
      document.getElementById('frm1706:txtMortgage').disabled = false;
      document.getElementById('frm1706:txtTotalP').disabled = false;
      document.getElementById('frm1706:txtAmount').disabled = false;
      document.getElementById('frm1706:txtTotalN').disabled = false;
      document.getElementById('frm1706:txtOthers21').disabled = true;
      document.getElementById('frm1706:txtOthers21').value = "";
      document.getElementById('frm1706:txtDateMonthI').disabled = false;
      document.getElementById('frm1706:txtDateDayI').disabled = false;
      document.getElementById('frm1706:txtDateYearI').disabled = false;
      
      document.getElementById('frm1706:txtSelling').style.backgroundColor = '#FFFFFF';
      document.getElementById('frm1706:txtCost').style.backgroundColor = '#FFFFFF';
      document.getElementById('frm1706:txtMortgage').style.backgroundColor = '#FFFFFF';
      document.getElementById('frm1706:txtTotalP').style.backgroundColor = '#FFFFFF';
      document.getElementById('frm1706:txtAmount').style.backgroundColor = '#FFFFFF';
      document.getElementById('frm1706:txtTotalN').style.backgroundColor = '#FFFFFF';
      document.getElementById('frm1706:txtDateMonthI').style.backgroundColor = '#FFFFFF';
      document.getElementById('frm1706:txtDateDayI').style.backgroundColor = '#FFFFFF';
      document.getElementById('frm1706:txtDateYearI').style.backgroundColor = '#FFFFFF';
         
  }
  
  function enableExempt()
  {
      document.getElementById('frm1706:txtSelling').disabled = true;
      document.getElementById('frm1706:txtCost').disabled = true;
      document.getElementById('frm1706:txtMortgage').disabled = true;
      document.getElementById('frm1706:txtTotalP').disabled = true;
      document.getElementById('frm1706:txtAmount').disabled = true;
      document.getElementById('frm1706:txtTotalN').disabled = true;
      document.getElementById('frm1706:txtOthers21').disabled = false;
      document.getElementById('frm1706:txtDateMonthI').disabled = true;
      document.getElementById('frm1706:txtDateDayI').disabled = true;
      document.getElementById('frm1706:txtDateYearI').disabled = true;
      
      document.getElementById('frm1706:txtSelling').value = "";
      document.getElementById('frm1706:txtCost').value = "";
      document.getElementById('frm1706:txtMortgage').value = "";
      document.getElementById('frm1706:txtTotalP').value = "";
      document.getElementById('frm1706:txtAmount').value = "";
      document.getElementById('frm1706:txtTotalN').value = "";
      document.getElementById('frm1706:txtDateMonthI').value = "";
      document.getElementById('frm1706:txtDateDayI').value = "";
      document.getElementById('frm1706:txtDateYearI').value = "";
      
      document.getElementById('frm1706:txtSelling').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtCost').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtMortgage').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtTotalP').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtAmount').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtTotalN').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtDateMonthI').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtDateDayI').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtDateYearI').style.backgroundColor = '#CCCCCC';
      
      document.getElementById('frm1706:txtInstallment').value = "";
      document.getElementById('frm1706:txtBid').value = "";
      
      document.getElementById('frm1706:txtGross').value = "";
      
  }
  
  function cashSale()
  {
      document.getElementById('frm1706:txtSelling').disabled = true;
      document.getElementById('frm1706:txtCost').disabled = true;
      document.getElementById('frm1706:txtMortgage').disabled = true;
      document.getElementById('frm1706:txtTotalP').disabled = true;
      document.getElementById('frm1706:txtAmount').disabled = true;
      document.getElementById('frm1706:txtTotalN').disabled = true;
      document.getElementById('frm1706:txtOthers21').disabled = true;
      document.getElementById('frm1706:txtOthers21').value = "";
      document.getElementById('frm1706:txtDateMonthI').disabled = true;
      document.getElementById('frm1706:txtDateDayI').disabled = true;
      document.getElementById('frm1706:txtDateYearI').disabled = true;
      
      document.getElementById('frm1706:txtSelling').value = "";
      document.getElementById('frm1706:txtCost').value = "";
      document.getElementById('frm1706:txtMortgage').value = "";
      document.getElementById('frm1706:txtTotalP').value = "";
      document.getElementById('frm1706:txtAmount').value = "";
      document.getElementById('frm1706:txtTotalN').value = "";
      document.getElementById('frm1706:txtDateMonthI').value = "";
      document.getElementById('frm1706:txtDateDayI').value = "";
      document.getElementById('frm1706:txtDateYearI').value = "";
      
      document.getElementById('frm1706:txtSelling').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtCost').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtMortgage').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtTotalP').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtAmount').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtTotalN').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtDateMonthI').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtDateDayI').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtDateYearI').style.backgroundColor = '#CCCCCC';

      //dgarfin: sec29 fields
      document.getElementById('frm1706:opt29A').disabled = false;
      document.getElementById('frm1706:txtFMVLand').disabled = false;
      document.getElementById('frm1706:opt29C').disabled = false;
      document.getElementById('frm1706:txtFMVZonal').disabled = false;
      document.getElementById('frm1706:opt29B').disabled = false;
      document.getElementById('frm1706:txtFMVImprovements').disabled = false;
      document.getElementById('frm1706:opt29D').disabled = false;
      document.getElementById('frm1706:txtFMVBIR').disabled = false;
          
      //dgarfin: sec30 fields
      document.getElementById('frm1706:opt30D').disabled = true;
      document.getElementById('frm1706:txtInstallment').disabled = true;
      document.getElementById('frm1706:opt30B').disabled = true;
      document.getElementById('frm1706:txtBid').disabled = true;
      document.getElementById('frm1706:opt30F').disabled = true;
      document.getElementById('frm1706:txtOthers30F').disabled = true;  
      document.getElementById('frm1706:txtOtherss30F').disabled = true;       
      document.getElementById('frm1706:opt30C').disabled = false;
      document.getElementById('frm1706:txtFMVLI').disabled = false;
      document.getElementById('frm1706:opt30A').disabled = false;
      document.getElementById('frm1706:txtGross').disabled = false;
      document.getElementById('frm1706:opt30E').disabled = true;
      document.getElementById('frm1706:txtInstallment').value = "";
      document.getElementById('frm1706:txtBid').value = "";
      document.getElementById('frm1706:txtOthers30F').value = ""; 
      document.getElementById('frm1706:txtOtherss30F').value = "";  
      

  }
  
  function foreclosure()
  {
      document.getElementById('frm1706:txtSelling').disabled = true;
      document.getElementById('frm1706:txtCost').disabled = true;
      document.getElementById('frm1706:txtMortgage').disabled = true;
      document.getElementById('frm1706:txtTotalP').disabled = true;
      document.getElementById('frm1706:txtAmount').disabled = true;
      document.getElementById('frm1706:txtTotalN').disabled = true;
      document.getElementById('frm1706:txtOthers21').disabled = true;
      document.getElementById('frm1706:txtOthers21').value = "";
      document.getElementById('frm1706:txtDateMonthI').disabled = true;
      document.getElementById('frm1706:txtDateDayI').disabled = true;
      document.getElementById('frm1706:txtDateYearI').disabled = true;
      
      document.getElementById('frm1706:txtSelling').value = "";
      document.getElementById('frm1706:txtCost').value = "";
      document.getElementById('frm1706:txtMortgage').value = "";
      document.getElementById('frm1706:txtTotalP').value = "";
      document.getElementById('frm1706:txtAmount').value = "";
      document.getElementById('frm1706:txtTotalN').value = "";
      document.getElementById('frm1706:txtDateMonthI').value = "";
      document.getElementById('frm1706:txtDateDayI').value = "";
      document.getElementById('frm1706:txtDateYearI').value = "";
      
      document.getElementById('frm1706:txtSelling').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtCost').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtMortgage').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtTotalP').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtAmount').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtTotalN').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtDateMonthI').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtDateDayI').style.backgroundColor = '#CCCCCC';
      document.getElementById('frm1706:txtDateYearI').style.backgroundColor = '#CCCCCC';
      
      //dgarfin: sec30 fields
      document.getElementById('frm1706:opt30D').disabled = true;
      document.getElementById('frm1706:txtInstallment').disabled = true;
      document.getElementById('frm1706:opt30C').disabled = true;
      document.getElementById('frm1706:txtFMVLI').disabled = true;
      document.getElementById('frm1706:opt30A').disabled = false;
      document.getElementById('frm1706:txtGross').disabled = false;
      document.getElementById('frm1706:opt30E').disabled = true;
      //document.getElementById('frm1706:txtOthers30E').disabled = true;
      document.getElementById('frm1706:opt30F').disabled = true;
      document.getElementById('frm1706:txtOthers30F').disabled = true;
      document.getElementById('frm1706:txtOtherss30F').disabled = true;
      document.getElementById('frm1706:opt30B').disabled = false;
      document.getElementById('frm1706:txtBid').disabled = false;
      
      document.getElementById('frm1706:txtInstallment').value = "";
      document.getElementById('frm1706:txtOthers30F').value = ""; 
      document.getElementById('frm1706:txtOtherss30F').value = "";  
      document.getElementById('frm1706:txtFMVLI').value = ""; 
      document.getElementById('frm1706:txtGross').value = "";
      
      document.getElementById('frm1706:txtFMVLand').value = "";
      document.getElementById('frm1706:txtFMVZonal').value = "";
      document.getElementById('frm1706:txtFMVImprovements').value = "";
      document.getElementById('frm1706:txtFMVBIR').value = "";      
  }
  
  function computeFMVLI()
    {
        var tax29aa = (1 * document.getElementById('frm1706:txtFMVLand').value).toFixed(2);
        var tax29bb = (1 * document.getElementById('frm1706:txtFMVZonal').value).toFixed(2);
        var tax29cc = (1 * document.getElementById('frm1706:txtFMVImprovements').value).toFixed(2);
        var tax29dd = (1 * document.getElementById('frm1706:txtFMVBIR').value).toFixed(2);
        compareFMVLI();
    }
    function compareFMVLI()
    {
       
    var FMV29ab = NumWithComma(document.getElementById('frm1706:txtFMVLand').value)  + NumWithComma(document.getElementById('frm1706:txtFMVImprovements').value); 
    var FMV29cd = NumWithComma(document.getElementById('frm1706:txtFMVZonal').value)  + NumWithComma(document.getElementById('frm1706:txtFMVBIR').value);
    var FMV29bc = NumWithComma(document.getElementById('frm1706:txtFMVImprovements').value)  + NumWithComma(document.getElementById('frm1706:txtFMVZonal').value);
    var FMV29ad = NumWithComma(document.getElementById('frm1706:txtFMVLand').value)  + NumWithComma(document.getElementById('frm1706:txtFMVBIR').value);
    
    
    if(( FMV29ab > FMV29cd) && (FMV29ab > FMV29bc) && (FMV29ab > FMV29ad) )
    {
      document.getElementById('frm1706:txtFMVLI').value = formatCurrency(FMV29ab);
    }
    else if( (FMV29cd > FMV29bc) && (FMV29cd > FMV29ad) && (FMV29cd > FMV29ab) )
    {
      document.getElementById('frm1706:txtFMVLI').value = formatCurrency(FMV29cd);
    }
    else if( (FMV29bc > FMV29ad) && (FMV29bc > FMV29ab) && (FMV29bc > FMV29cd) )
    {
      document.getElementById('frm1706:txtFMVLI').value = formatCurrency(FMV29bc);
    }
    else if( (FMV29ad > FMV29ab) && (FMV29ad > FMV29cd) && (FMV29ad > FMV29bc) )
    {
      document.getElementById('frm1706:txtFMVLI').value = formatCurrency(FMV29ad);
    }
        
    computeTaxableBase();
    } 
  
  function computeTaxableBase()
  {
    var TaxBase = NumWithComma(document.getElementById('frm1706:txtTax').value);
    var Gross = NumWithComma(document.getElementById('frm1706:txtGross').value);
    var FMVLI = NumWithComma(document.getElementById('frm1706:txtFMVLI').value);
    var Bid = NumWithComma(document.getElementById('frm1706:txtBid').value);
    var Installment = NumWithComma(document.getElementById('frm1706:txtInstallment').value);
    var Others = NumWithComma(document.getElementById('frm1706:txtOthers30F').value);
    var Otherss = NumWithComma(document.getElementById('frm1706:txtOthers30E').value);
    
    
    if( Gross >= FMVLI)
    {
      document.getElementById('frm1706:txtTax').value = formatCurrency(Gross);
    }
    if( FMVLI >= Gross)
    {
      document.getElementById('frm1706:txtTax').value = formatCurrency(FMVLI);
    }
    if( document.getElementById('frm1706:j_id395:_4').checked == true  && FMVLI >= Bid && FMVLI >= Gross)
    {
      document.getElementById('frm1706:txtTax').value = formatCurrency(FMVLI);
    }
    if( document.getElementById('frm1706:j_id395:_4').checked == true  && Bid >= FMVLI && Bid >= Gross)
    {
      document.getElementById('frm1706:txtTax').value = formatCurrency(Bid);
    }
    if( document.getElementById('frm1706:j_id395:_4').checked == true  && Gross >= FMVLI && Gross >= Bid)
    {
      document.getElementById('frm1706:txtTax').value = formatCurrency(Gross);
    }
    if( document.getElementById('frm1706:j_id395:_3').checked == true )
    {
      document.getElementById('frm1706:txtTax').value = formatCurrency(Installment);
    }
    if( document.getElementById('frm1706:j_id395:_2').checked == true || document.getElementById('frm1706:j_id395:_5').checked == true )
    {
      document.getElementById('frm1706:txtTax').value = formatCurrency(Others);
    }
    if( document.getElementById('frm1706:opt30E').checked == true )
    {
      document.getElementById('frm1706:txtTax').value = formatCurrency(Otherss);
    }
    computeOfTaxDue();
  }
  
  function tickCheckboxWithValue(obj) {
    if (obj.value>0) {
      if (obj.id == 'frm1706:txtFMVLand') {
        document.getElementById('frm1706:opt29A').checked=true;     
      }
      else if (obj.id == 'frm1706:txtFMVImprovements') {
        document.getElementById('frm1706:opt29B').checked=true;
      }
      else if (obj.id == 'frm1706:txtFMVZonal') {
        document.getElementById('frm1706:opt29C').checked=true;
      }
      else if (obj.id == 'frm1706:txtFMVBIR') {
        document.getElementById('frm1706:opt29D').checked=true;
      }
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
  function validateMonthDayYearDate(dateID)
  {
    strmmddyyyy = dateID;

    if(strmmddyyyy != "")
    {
      var result = strmmddyyyy.split("/");
      var isLeap = new Date(result[2], 1, 29).getMonth() == 1;
      var month31 = (['01', '03', '05', '07', '08', '10', '12']);
      var month30 = (['04', '06', '09', '11']);
      var month = result[0];
      var day = result[1];
      if(result.length == 3 )
      {
        if(isNaN(result[0] || result[1] || result[2]))
        {
          return true;
        } 
        else if(( result[0].length != 2 || (result[0] > 12 || result[0] < 0) )){
          // numeric check if greater not than 31 - Month.
          return true;
        }
        else if( result[1].length != 2 || (result[1] > 31 || result[1] < 1) ){
          // numeric check if Date.
          return true;
        }
        else if( result[2].length != 4 ){
          return true;
        }
        else if(month==2){
          if (!isLeap && day==29) {
            return true;
          }
          else if (!isLeap && day>29) {
            return true;
          }
          else if (isLeap && day>29) {
            return true;
          }
        }
        else if (month31.contains(month) && day > 31)
        {
          return true;
        }
        else if (month30.contains(month) && day > 30)
        {
          return true;
        }
      } else {
        return true;
      }
    }
  }
  function initialValidateBeforeSave() {
      if( (d.getElementById('frm1706:txtTIN1').value == "" || d.getElementById('frm1706:txtTIN2').value == "" || d.getElementById('frm1706:txtTIN3').value == "" || d.getElementById('frm1706:txtBranchCode').value == "")  )
      {
        alert("Please enter a valid TIN number on Item 5.");
        return false;
      } 
      if ((d.getElementById('frm1706:txtRDOCode').value == "000")) {
          alert("Please enter a valid Seller's RDO Code on Item 6.");
          return false;
      }
      if( (d.getElementById('frm1706:txtSellerName').value == "")  )
      {
        alert("Please enter a valid Seller's Name on Item 9.");
        return false;
      } 
      if( (document.getElementById('frm1706:txtTCT').value == "")  )
      {
        alert("Please enter the TCT/OCT/CCT No.")
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

  $('#bg').hide(); //990
  $('.printSignFooterClass_1706').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always' }); 
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
    $('#formPaper').css({'margin-top':'-110px' });

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
                
                var data = form.serialize();
                save('1706',data);
                
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
        saveAndExit('1706',data);
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

        submitAndSave('1706', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1706';
    }
</script>
@endsection