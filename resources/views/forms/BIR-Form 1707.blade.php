@extends('layouts.app')
@section('title', '| BIR Form No. 1707')

@section('content')
<div class="loader"></div> 
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
        <button type="button" class="btn btn-danger btn-exit" id="1707" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1707" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1707' company='{{$company->id}}'>Okay</button>
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
                                                <font size="6px" style="font-weight:bold;">Capital Gains<br/>Tax Return</font>
                                            </td>
                                            <td width="145" valign="center">
                                                <font face="Arial" size="1px">BIR Form No.<br/></font>
                                                <font face="Arial" size="6px">1707<br/></font>
                                                <font face="Arial" size="1px">July 1999 (ENCS)</font>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="990" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td colspan="4" valign="top" style="background-color:#FFFFFF " ><div align="left"><label size="1px" face="Arial, Helvetica, sans-serif">For Onerous Transfer of Shares of Stocks Not<br/>Traded Through the Local Stock Exchange</label></div></td>
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
                                                        <td height="23"><input type="text" id="frm1707:txtDateMonth" name="frm1707:txtDateMonth" maxlength="2" size="2" style="text-align: right" value="" onKeyPress="return wholenumber(this, event)" title="Please supply a valid month." />
                                    <input type="text" id="frm1707:txtDateDay" name="frm1707:txtDateDay" maxlength="2" size="2" style="text-align: right" value="" onKeyPress="return wholenumber(this, event)" title="Please supply a valid day." />
                                    <input type="text" id="frm1707:txtDateYear" name="frm1707:txtDateYear" maxlength="4" size="4" style="text-align: right" value="" onKeyPress="return wholenumber(this, event)" title="Please supply a valid year." />
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
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; border: 0px" id="frm1707:j_id217" class="iceSelOneRb-dis fieldText1-dis">
                                                                <div align="center" style="padding: 5px 0 5px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="radio" value="Y" name="frm1707:j_id217" id="frm1707:j_id217:_1" onclick="enableDisable23()" /><label for="frm1707:j_id217:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                <td><input type="radio" value="N" name="frm1707:j_id217" id="frm1707:j_id217:_2" onclick="enableDisable23();computeTaxPayable()" /><label for="frm1707:j_id7:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >No</label></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
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
                                                        <td><input type="text" value="0" style="text-align: right;" size="4" name="frm1707:txtSheets" maxlength="2" id="frm1707:txtSheets" class="iceInpTxt-dis"onkeypress="return wholenumber(this, event)" /></td>
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
                              <input disabled id="frm1707:txt4" maxlength="5" name="frm1707:txt4" size="6" style="background-color: rgb(220, 220, 220);" type="text" value="II030" />
                            </td>
                            <td><font size="1" style="font-size: 11px;">&nbsp;Individual&nbsp;</font></td>
                            <td>
                               <input id="frm1707:opt4" name="frm1707:opt4"
                                   value="II030"
                                   type="radio"/>
                              <label for="frm1707:optATC4"></label> 
                            </td>
                          </tr>
                          <tr>
                            <td width="43">&nbsp;</td>
                            <td width="36" height="21" nowrap="nowrap">
                              <input class="iceInpTxt-dis" disabled="true" id="frm1707:txt4C" name="frm1707:txt4C" maxlength="5"  size="6" style="background-color: rgb(220, 220, 220);" type="text" value="IC110" />
                            </td>
                            <td><font size="1" style="font-size: 11px;">&nbsp;Corporation&nbsp;</font></td>
                            <td>
                              <input id="frm1707:opt4C" name="frm1707:opt4"
                                   value="IC110"
                                   type="radio"/>
                              <label  for="frm1707:opt4C"> </label>
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
                                                            <input type="text" value="{{$company->tin1}}" size="4" name="frm1707:txtTIN1" maxlength="3" id="frm1707:txtTIN1" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin2}}" size="4" name="frm1707:txtTIN2" maxlength="3" id="frm1707:txtTIN2" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin3}}" size="4" name="frm1707:txtTIN3" maxlength="3" id="frm1707:txtTIN3" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin4}}" size="4" name="frm1707:txtBranchCode" maxlength="3" id="frm1707:txtBranchCode" onkeypress="return letternumber(event)"/>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="200" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                        <td id="rdoSelect">
                                                            <select class='iceSelOneMnu' id='frm1707:txtRDOCode' name='frm1707:txtRDOCode' size='1' >
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
                                                            <input type="text" value="" size="4" name="frm1707:txtTINB1" maxlength="3" id="frm1707:txtTINB1" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="" size="4" name="frm1707:txtTINB2" maxlength="3" id="frm1707:txtTINB2" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="" size="4" name="frm1707:txtTINB3" maxlength="3" id="frm1707:txtTINB3" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="" size="4" name="frm1707:txtBranchCodeB" maxlength="3" id="frm1707:txtBranchCodeB" onkeypress="return letternumber(event)"/>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                      <td width="200" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100"><font size="2" style="font-weight:bold">&nbsp;8&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
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
                                                                    <td><input type="text" value="{{$company->registered_name}}" disabled size="60" name="frm1707:txtSellerName" maxlength="50" id="frm1707:txtSellerName" onblur="return capital(this, event)" /></td>
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
                                                                    <td><input type="text" value="" size="60" name="frm1707:txtBuyerName" maxlength="50" id="frm1707:txtBuyerName" onblur="return capital(this, event)" /></td>
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
                                                                    <td><input type="text" value="{{$company->address}}" disabled size="60" name="frm1707:txtSellerAddress" maxlength="70" id="frm1707:txtSellerAddress" onblur="return capital(this, event)" /></td>
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
                                                                    <td><input type="text" value=""  size="60" name="frm1707:txtBuyerAddress" maxlength="70" id="frm1707:txtBuyerAddress" onblur="return capital(this, event)" /></td>
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
                                                                    <td><font size="1" style="font-size: 11px;">Zip Code</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->zip_code}}" disabled  size="10" name="frm1707:txtSellerZipCode" maxlength="4" id="frm1707:txtSellerZipCode" onblur="return capital(this, event)" onkeypress="return wholenumber(this, event)" /></td>
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
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Zip Code</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value=""  size="10" name="frm1707:txtBuyerZipCode" maxlength="4" id="frm1707:txtBuyerZipCode" onblur="return capital(this, event)" onkeypress="return wholenumber(this, event)" /></td>
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
                                                    <td width="500">&nbsp;<font size="2" style="font-weight:bold;">15&nbsp;</font><font size="1" style="font-size: 11px;">Are you availing of tax relief under an International Tax Treaty or Special Law? If yes, specify</font></td>
                                                </tr>
                          <tr>
                            <td>
                                                            <div align="left">
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:800px; border:0px" id="frm1707:j_id391" class="iceSelOneRb fieldText1">
                                                                    <div align="left" style="padding: 5px 0 5px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>&nbsp;&nbsp;<input type="radio" value="Y" name="frm1707:TaxRelief" id="frm1707:TaxRelief_Y" onclick="d.getElementById('frm1707:txtSpecify').disabled = false;" /><label for="frm1707:j_id391:_1" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Yes&nbsp;</label>&nbsp;</td>
                                          <td><input type="radio" value="N" name="frm1707:TaxRelief" id="frm1707:TaxRelief_N" onclick="d.getElementById('frm1707:txtSpecify').disabled = true; d.getElementById('frm1707:txtSpecify').value = '';" checked="true" /><label for="frm1707:j_id391:_3" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;No&nbsp;&nbsp;</label></td>
                                          <td><select id="frm1707:txtSpecify" name="frm1707:txtSpecify" style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" size="1" disabled >
                                            <option value="0" selected="selected"> </option>
                                            <option value="1">International Tax Treaty</option>
                                            <option value="2">Special Law</option>
                                          </select></td>
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
                                                            <td><font size="1" style="font-size: 11px;">Description of Transaction</font></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                        <td>
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><input type="radio" value="CS" name="frm1707:Transaction" id="frm1707:TaxRelief_CS" onclick="disableInstallmentSection();enableSched1();d.getElementById('frm1707:txt16Specify').disabled = true; d.getElementById('frm1707:txt16Specify').value = '';" /><label for="frm1707:TaxRelief_CS" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Cash Sale&nbsp;</label>&nbsp;</td>
                              <td><input type="radio" value="IS" name="frm1707:Transaction" id="frm1707:TaxRelief_IS" onclick="enableInstallmentSection();disableSched1();d.getElementById('frm1707:txt16Specify').disabled = true; d.getElementById('frm1707:txt16Specify').value = '';" /><label for="frm1707:TaxRelief_IS" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Installment Sale&nbsp;&nbsp;</label></td>
                              <td><input type="radio" value="FS" name="frm1707:Transaction" id="frm1707:TaxRelief_FS" onclick="disableInstallmentSection();enableSched1();d.getElementById('frm1707:txt16Specify').disabled = true; d.getElementById('frm1707:txt16Specify').value = '';" /><label for="frm1707:TaxRelief_FS" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Foreclosure Sale&nbsp;</label>&nbsp;</td>
                              <td><input type="radio" value="O" name="frm1707:Transaction" id="frm1707:TaxRelief_O" onclick="disableInstallmentSection();disableSched1();d.getElementById('frm1707:txt16Specify').disabled = false;" /><label for="frm1707:TaxRelief_O" class="iceSelOneRb fieldText1" style="font-size:11px;" >&nbsp;Others (specify)&nbsp;&nbsp;</label></td>
                              <td><input id="frm1707:txt16Specify" maxlength="60" name="frm1707:txt16Specify" size="30" type="text" value="" disabled /></td>
                            </tr>
                          </table>
                        </td>
                    </table>
                  </td>
                </table>
              </tr>
              <tr>
                <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="990">
                                        <tr>
                                            <td class="tblFormTd" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="900">
                                                    <tr>
                                                        <td>&nbsp;<font size="2" style="font-weight:bold;">17&nbsp;</font><font size="1" style="font-size: 11px;">Details of Installment Sale:</font></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                          <tr>
                            <td><font size="1" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17A&nbsp;</font><font size="1" style="font-size: 11px;">Selling Price/Fair Market Value</font></td>
                            <td align="right"><input id="frm1707:txt17SellingPrice" maxlength="60" name="frm1707:txt17SellingPrice" size="30" style="text-align: right" type="text" value="0.00" onblur="; round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                          </tr>
                          <tr>
                            <td><font size="1" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17B&nbsp;</font><font size="1" style="font-size: 11px;">Cost and Expenses</font></td>
                            <td align="right"><input id="frm1707:txt17Cost" maxlength="60" name="frm1707:txt17Cost" size="30" style="text-align: right" type="text" value="0.00" onblur="; round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                          </tr>
                          <tr>
                            <td><font size="1" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17C&nbsp;</font><font size="1" style="font-size: 11px;">Mortgage Assumed</font></td>
                            <td align="right"><input id="frm1707:txt17Mortgage" maxlength="60" name="frm1707:txt17Mortgage" size="30" style="text-align: right" type="text" value="0.00" onblur="; round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                          </tr>
                          <tr>
                            <td><font size="1" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17D&nbsp;</font><font size="1" style="font-size: 11px;">No. of installments</font></td>
                            <td align="right"><input id="frm1707:txt17NumberInstallment" maxlength="60" name="frm1707:txt17NumberInstallment" size="10" style="text-align: right" type="text" value="" onblur="; round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                          </tr>
                          <tr>
                            <td><font size="1" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17E&nbsp;</font><font size="1" style="font-size: 11px;">Amount of Installment for this Payment Period</font></td>
                            <td align="right"><input id="frm1707:txt17Amount" maxlength="60" name="frm1707:txt17Amount" size="30" style="text-align: right"type="text" value="0.00" onblur="; round(this,2)" onkeypress="return numbersonly(this, event)" /></td>
                          </tr>
                          <tr>
                            <td><font size="1" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17F&nbsp;</font><font size="1" style="font-size: 11px;">Date of Collection of Installment for this Payment Period   (MM/DD/YYYY)</font></td>
                            <td align="right"><input type="text" id="frm1707:txt17DateMonth" name="frm1707:txt17DateMonth" maxlength="2" size="2" style="text-align: right" value="" onKeyPress="return numbersonly(this, event)" title="Please supply a valid month." />
                                    <input type="text" id="frm1707:txt17DateDay" name="frm1707:txt17DateDay" maxlength="2" size="2" style="text-align: right" value="" onKeyPress="return numbersonly(this, event)" title="Please supply a valid day." />
                                    <input type="text" id="frm1707:txt17DateYear" name="frm1707:txt17DateYear" maxlength="4" size="4" style="text-align: right" value="" onKeyPress="return numbersonly(this, event)" title="Please supply a valid year." />
                            </td>
                          </tr>
                          <tr>
                            <td><font size="1" style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17G&nbsp;</font><font size="1" style="font-size: 11px;">Total Collection (Downpayment and Installments) during the Year of Sale</font></td>
                            <td align="right"><input id="frm1707:txt17Total" maxlength="60" name="frm1707:txt17Total" size="30" style="text-align: right" type="text" value="0.00" onblur="round(this,2); valueToItem22()" onkeypress="return numbersonly(this, event)" /></td>
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
                                                <table style="height: 22px" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="200">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part II</font></td>
                                                        <td width="300" > <font size="2" style="font-weight:bold;letter-spacing: 3px;text-align:center">Computation of Tax</font></td>
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
                                                        <td width="18"><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;&nbsp;</font></td>
                                                        <td>
                             <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Taxable Base - For Cash Sale/ Foreclosure Sale (Schedule 1)</font>
                            </td>
                                                        <td width="202"><div class="spacePadder"></div></td>
                                                        <td width="199" ><span class="spacePadder"><font size="2" style="font-weight:bold;">18</font>&nbsp;&nbsp;&nbsp;<input type="text" value="0.00" style="background-color: #dcdcdc;  text-align: right;" size="20" name="frm1707:txtTax" maxlength="25" id="frm1707:txtTax" onmousemove="computeTaxableBase()" disabled/></span></td>
                                                    </tr>
                          <tr>
                                                        <td width="18"><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;&nbsp;</font></td>
                                                         <td>
                              <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"> Less:  Cost and Other Allowable Expenses ( <a href="#" id="btnSchedB" onclick="showSched2()" >Schedule 2</a> )</font>
                            </td>
                                                        <td width="202"><div class="spacePadder"></div></td>
                                                        <td width="199" ><span class="spacePadder"><font size="2" style="font-weight:bold;">19</font>&nbsp;&nbsp;&nbsp;<input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1707:txtLess" maxlength="25" id="frm1707:txtLess" onblur="computeOfTaxDue()" disabled/></span></td>
                                                    </tr>
                          <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Net Capital Gain/(Loss)</font></td>
                                                        <td><div class="spacePadder"></div></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">20</font>&nbsp;&nbsp;&nbsp;<input type="text" value="0.00" style="background-color: #dcdcdc;text-align:right;" size="20" name="frm1707:txtNetCap" maxlength="25" id="frm1707:txtNetCap" disabled /></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Due on the Entire Transaction  (5% on the first 100,000 ; 10% over 100,000)(Cash Sale/Foreclosure Sale); or</font></td>
                                                        <td><div class="spacePadder"></div></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">21</font>&nbsp;&nbsp;&nbsp;<input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1707:txtTaxDue" maxlength="25" id="frm1707:txtTaxDue" onmousemove="computeTaxPayable()" onblur="computeTaxPayable(); round(this,2)" onkeypress="return numbersonly(this, event)" enabled /></span></td>
                                                    </tr>
                          <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;</font></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Due for this Payment Period</font></td>
                                                        <td><div class="spacePadder"></div></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">22</font>&nbsp;&nbsp;&nbsp;<input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1707:txtTaxDue2" maxlength="25" id="frm1707:txtTaxDue2" disabled /></span></td>
                                                    </tr>
                          <tr>
                                                        <td></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Computation of the Tax Due (If tax is payable under the installment method of computation)</font></td>
                                                        <td><div class="spacePadder"></div></td>
                                                        <td></td>
                                                    </tr>
                          <tr>
                                                        <td></td>
                                                        <td><input id="frm1707:txt22CompTaxDue" maxlength="60" name="frm1707:txt22CompTaxDue" size="66" type="text" value="" onkeypress="return numbersonly(this, event)" /></td>
                                                        <td><div class="spacePadder"></div></td>
                                                        <td></td>
                                                    </tr>
                          <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;</font></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Less:  Tax Paid in Return Previously Filed, if this is an Amended Return</font></td>
                                                        <td><div class="spacePadder"></div></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">23</font>&nbsp;&nbsp;&nbsp;<input type="text" value="0.00" style="text-align: right;" size="20" name="frm1707:txtLess2" maxlength="25" id="frm1707:txtLess2" onmousemove="computeTaxPayable()" onblur="computeTaxPayable(); round(this,2)" onkeypress="return numbersonly(this, event)" /></span></td>
                                                    </tr>
                          <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;</font></td>
                                                        <td><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Payable/(Overpayment)(Item 21 or 22 less Item 23)</font></td>
                                                        <td><div class="spacePadder"></div></td>
                                                        <td><span class="spacePadder"><font size="2" style="font-weight:bold;">24</font>&nbsp;&nbsp;&nbsp;<input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;" size="20" name="frm1707:txtTaxPayable" maxlength="25" id="frm1707:txtTaxPayable" onmousemove="computeTaxPayable()" disabled /></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;"> &nbsp;25&nbsp;</font></td>
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
                                                                            <font size="2" face="Arial"><b>25A</b>&nbsp;
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="15" name="frm1707:txtSurcharge" maxlength="25" id="frm1707:txtSurcharge" onblur="computePenalties(); round(this,2)" onkeypress="return numbersonly(this, event)" />
                                                                            </font>
                                                                        </td>
                                                                        <td width="161" align="center">
                                                                            <font size="2" face="Arial"><b>25B</b>&nbsp;
                                                                            <input type="text" value="0.00" style="text-align: right;" size="15" name="frm1707:txtInterest" maxlength="25" id="frm1707:txtInterest" onblur="computePenalties(); round(this,2)" onkeypress="return numbersonly(this, event)" />
                                                                            </font>
                                                                        </td>
                                                                        <td width="174" align="center">
                                                                            <font size="2" face="Arial"><b>25C</b>&nbsp;
                                                                            <input type="text" value="0.00" style="text-align: right;" size="15" name="frm1707:txtCompromise" maxlength="25" id="frm1707:txtCompromise" onblur="computePenalties(); round(this,2)" onkeypress="return numbersonly(this, event)" />
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">25D</font>
                                                                <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;width: 171px;" size="19" name="frm1707:txtTotalPenalties" maxlength="15" id="frm1707:txtTotalPenalties" disabled="true" />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;26&nbsp;</font></td>
                                                        <td colspan="2"><font size="1">&nbsp;</font><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Total Amount Payable/(Overpayment) (Sum of Items 24 & 25D)</font></td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;margin-right: 9px;">26</font>
                                                                <input type="text" value="0.00" style="background-color: #dcdcdc; text-align: right;width: 171px;" size="" name="frm1707:txtTotal" maxlength="15" id="frm1707:txtTotal" onmousemove="computeOfTotalAmtDue()" class="iceInpTxt-dis" disabled />
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
                  <table border="1" cellspacing="1" cellpadding="1" width="100%" class="tblForm">
                  <tr class="modalHeader"><td>Schedule 1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Description of Shares of Stock (attach additional sheets, if necessary) </td></tr></table>
                
                  <table border="1" cellspacing="1" cellpadding="1" style="position: static;width: 100%" id="tblSched1" class="tblForm">
                    <thead>
                      <tr class="modalColumnHeader">
                        <td width="5%">&nbsp; </td>
                        <td width='30%' align="center" >Name of Corporate Stock</td>
                        <td width='20%' align="center" >Stock Certificate No.</td>
                        <td width='20%' align="center" >No. of Shares </td>
                        <td width='20%' align="center" >Taxable Base<br/> Selling Price or FMV whichever is higher</td>
                        <td width="5%">&nbsp; </td>
                      </tr>
                    </thead>
                    <tbody id="tbodyllistSched1"><tr><td></td></tr></tbody>
                  </table>
                  <table  style="position: static;width: 100%" align="center" class="tblForm">
                    <tr>
                        <td width="5%">&nbsp; </td>
                        <td width="30%">&nbsp; </td>
                        <td width="20%">&nbsp; </td>
                        <td width="20%">&nbsp; </td>
                        <td width="20%">&nbsp; </td>
                        <td width="5%">&nbsp; </td>         
                    </tr>
                    
                    <tr>
                      <td class="modalColumnHeader" align="left" colspan="4" width="75%">&nbsp;27&nbsp;&nbsp;&nbsp;Total (To Item 18)</td>
                      <td align="right" width="20%"><input type="text" disabled id="frm1707:totalAmount1" name="frm1707:totalAmount1" size="20" style="background-color: #dcdcdc; text-align: right" value="0.00" /></td>
                      <td width="5%">&nbsp; </td> 
                    </tr>
                    
                    <tr>
                      <td colspan="6" width="100%">&nbsp;</td>
                    </tr>
                    
                    <tr>
                      <td align="right" colspan="6" width="100%"><input type='button' style="width:80px;" class="printButtonClass" id="btnAddSch1" value='Add' onclick="addlistSched1()" />&nbsp;&nbsp;<input type='button' style="width:80px;" class="printButtonClass" id="btnDeleteSch1" value='Delete' onclick="deletelistSched1()" />  </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                                <td>
                  <div class="imgClass" align='center' style="display:none; width:990px !important;">
                    <table  style="border-top: 3px solid black; font-family:arial; font-size:14px; text-align: center; table-layout: fixed;">
                      <col width="50%" />
                        <col width="50%" />
                        <tr>
                          <td colspan="2">I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge and belief,
                              <br/>is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
                              <br/>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><b>28</b>____________________________________________________
                            <br/>Taxpayer/Authorized Agent Signature over Printed Name</td>
                          <td><b>29</b>_______________________________
                            <br/>Title/Position of Signatory</td>
                        </tr>
                    </table>
                  </div>
                  <div class="imgClass" align='center' style="display:none; width:990px !important;">
                    <img id="frm1707:jurat" src="{{ asset('images/bottom_img/1707_new.jpg') }}" width="990"/>
                  </div>
                  <div class="imgClass" align='center' style="display:none; width:990px !important;">
                    <table style="font-size:14px; text-align: left; vertical-align: top;">
                      <tr>
                        <td>&nbsp;Machine Validation/Revenue Official Receipt Details (If not filed with the bank)<br/><br/><br/><br/></td>
                      </tr>
                    </table>
                    <div style="font-size:12px;">&nbsp;</div>
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
                                                                                <input type="button" class="printButtonClass" value="Validate" style="width: 100px;" name="frm1707:cmdValidate" id="frm1707:cmdValidate" onclick="window.setTimeout('computeTaxPayable();computePenalties();computeOfTotalAmtDue();',300);validate()" />
                                                                                <input type="button" class="printButtonClass" value="Edit" style="width: 100px;" name="frm1707:cmdEdit" id="frm1707:cmdEdit" onclick="enableAllControl()"/>
                                                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1707:btnFinalCopy" id="frm1707:btnFinalCopy" onclick="submitForm();" />
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
    
    <!--Modal Sched2-->
    <div id="modalSched2" class="printSignFooterClass_1707 aBox" style="width:94%; display:none; min-height:400px; position:relative; top:3%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="center"> 
            <br/>
      <div style="width: 90%">
      <table border="1" cellspacing="0" cellpadding="0" width="100%">
            <tr class="modalHeader_1707"><td><b>Schedule 2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Schedule of  Cost and Other  Allowable Expenses   </b></td></tr></table>
            
                <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%" id="tblSched2">
                    <thead>
                        <tr class="modalColumnHeader_1707">
                            <td width="10%">&nbsp; </td>
                            <td width='55%' align="center" ><b> Particulars </b></td>
                            <td width='25%' align="center" ><b> Amount </b></td>
                            <td width='10%' align="center" >&nbsp;</td>

                        </tr>
          </thead>
                    <tbody class="modalContent_1707" id="tbodyllistSched2"><tr><td></td></tr></tbody>
                </table>
                <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%" align="center">
          <tr>
                        <td width="100%" colspan="4" >&nbsp; </td>
                    </tr>
                    <tr>
            <td class="modalColumnHeader_1707" align="left" colspan="2" width="65%"><b>&nbsp;34</b>&nbsp;&nbsp;&nbsp;Total (To Item 19)</td>
                        <td class="modalContent_1707" align="center" width="25%"><input type="text" disabled id="frm1707:totalAmount" name="frm1707:totalAmount" style="background-color: #dcdcdc; text-align: right" size="40" value="0.00" /></td>
            <td width='10%' align="center" >&nbsp;</td>
                    </tr>

                    <tr>
            <td class="modalColumnHeader_1707" align="left" colspan="2" width="65%">&nbsp;</td>
                        <td align="center" width="25%"><input type='button' style="width:80px; " class="printButtonClass" id="btnAdd1" value='Add' onclick="addlistSched2()" />&nbsp;&nbsp;<input type='button' style="width:80px; " class="printButtonClass" id="btnDelete1" value='Delete' onclick="deletelistSched2()" /></td>
            <td width='10%' align="center" >&nbsp;</td>           
                    </tr>
                </table>
            </div>
            <br/><br/>
      <div align="center">
        <input type="button" class="printButtonClass" name="btnOkPop2" id="btnOkPop2" style="width:120px;" value="OK" onclick="getSched2Modal()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" class="printButtonClass" name="btnClearPop2" id="btnClearPop2" style="width:120px;" value="CLEAR"  onclick="clearSched2Modal()" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
            <br/>   
      
      </div>
      
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
    <div id="responseRdo" style="display:none;"><!--loaded files render here--></div> 
@endsection

@section('scripts')
<script type="text/javascript">
  var isSubmitFinal = false;
  var isSubmit = false;
  
  var fileNameToExport = "";
  var fileName = "";
  var existingXMLFileName = "";
  var gIsReadOnly = false; 
  var isModalTurnOn = false;

    var sched1 = new Array();
    var sched1ToCommit = new Array(); 
    var tempRowSizeSched1 = 0;
    var tempSchd1CorpStockName = new Array();
    var tempSchd1StockCertNum = new Array();
    var tempSchd1NumOfShares = new Array();
    var tempSchd1TaxableBase = new Array();
  
    var sched2 = new Array();
    var sched2ToCommit = new Array(); 
    var tempRowSizeSched2 = 0;
    var tempSchd2Particulars = new Array();
    var tempSchd2Amt = new Array();
  
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
  
  /*----------------------------------*/
  var d=document,data='',XMLFile='',msg = d.getElementById('msg'),flag=true;
  var loader=d.getElementById('loader');
  
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
          d.getElementById('frm1707:cmdValidate').disabled = true;
          d.getElementById('btnSave').disabled = true;
        } 
        
        /*------------- modalSched1 -----------*/
        flag1=false;
        var count1=0;
        var responses1 = d.getElementById('response').getElementsByTagName('div');
        var sPar1 = 'chxSched1';    
        
        do {
          if (responses1.item(count1).innerHTML.indexOf(sPar1) != -1) {
            var temp = String(responses1.item(count1).innerHTML);
            temp = temp.substring(0,sPar1.length+1); //substring to length of search param for index - check files
            temp = temp.substring(sPar1.length,sPar1.length+1); //get the last character for checking
            if ( !isNaN(temp) ) addlistSched1Reload(); //if last char is a number, add modal section
          } count1++;
        } while (count1!=responses1.length);
        window.setTimeout("loadData();getSched1Modal();flag1=true;",510); 
        /*--------------------------------------------------------------------------------------*/  

        /*------------- modalSched2 -----------*/
        flag2=false;
        var count=0;
        var responses = d.getElementById('response').getElementsByTagName('div');
        var sPar = 'chxSched2';     
        
        do {
          if (responses.item(count).innerHTML.indexOf(sPar) != -1) {
            var temp = String(responses.item(count).innerHTML);
            temp = temp.substring(0,sPar.length+1); //substring to length of search param for index - check files
            temp = temp.substring(sPar.length,sPar.length+1); //get the last character for checking
            if ( !isNaN(temp) ) addlistSched2Reload(); //if last char is a number, add modal section
          } count++;
        } while (count!=responses.length);
        window.setTimeout("loadData();getSched2Modal();flag2=true;",510); 
        /*--------------------------------------------------------------------------------------*/  
        
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
          if(elem[i].id == 'frm1707:txtSellerName' || elem[i].id == 'frm1707:txtSellerAddress'
          || elem[i].id == 'frm1707:txtBuyerName' || elem[i].id == 'frm1707:txtBuyerAddress'){
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
          elem[i].onclick(); //display computations
        }
      }

        }
    if (d.getElementById('frm1707:TaxRelief_CS').checked || d.getElementById('frm1707:TaxRelief_FS').checked){
      d.getElementById('btnAddSch1').disabled = false;
      d.getElementById('btnDeleteSch1').disabled = false;
    }
    else if (d.getElementById('frm1707:TaxRelief_IS').checked || d.getElementById('frm1707:TaxRelief_O').checked){
      d.getElementById('btnAddSch1').disabled = true;
      d.getElementById('btnDeleteSch1').disabled = true;
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
    
      //Ensure that before writing to rdoPropertyJS the formType 1707 is traceable in rdoStr
      if (rdoStr.indexOf('1707') >= 0) {
          var rdoValues = rdoStr.split('~');              
        var rdoCode = rdoValues[0];
        var description = rdoValues[1];       
        
        var objRdo = new rdoPropertyJS(rdoCode, description);
        rdoList[k] = objRdo; 
        k++;
        //alert('1707 successfully created array #'+i);
        
      } else {    
        //alert('1707 not found in array #'+i);
        continue;
      }
    }         
  }
  
    var d=document,XMLBGFile='',data='',XMLFile='',msg = d.getElementById('msg'),flag=true,flag1=true,flag2=true;
    
    var str;
    str = setTimeout("sleeptime()", 300);


    function sleeptime()
    {
        init();
    
    var xmlFileName = document.getElementById('file_name').value;        
    fileName = xmlFileName;

    if (fileName != null && fileName.indexOf('.xml') > -1) {
      loadXML(fileName);   

      d.getElementById('frm1707:txtDateMonth').disabled = true;
      d.getElementById('frm1707:txtDateDay').disabled = true;
      d.getElementById('frm1707:txtDateYear').disabled = true;
      
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
    
          d.getElementById('frm1707:txtTIN1').disabled = true;
          d.getElementById('frm1707:txtTIN2').disabled = true;
          d.getElementById('frm1707:txtTIN3').disabled = true;
      d.getElementById('frm1707:txtBranchCode').disabled = true;
     window.setTimeout("checkFinalCopyBtn('1707')", 2000);
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
      d.getElementById('frm1707:txtDateMonth').value = mm;
    }
    else
    {
      d.getElementById('frm1707:txtDateMonth').value = year.getMonth() +1;
    }
    d.getElementById('frm1707:txtDateYear').value = year.getFullYear();
    dd = "" + year.getDate();
    if (dd.length == 1) 
    { 
      dd = "0" + dd; 
      d.getElementById('frm1707:txtDateDay').value = dd;
    }
    else
    {
      d.getElementById('frm1707:txtDateDay').value = year.getDate();
    }
    @if($action != 'view')
    d.getElementById('btnPrint').disabled = true;
    d.getElementById('frm1707:cmdEdit').disabled = true;
    d.getElementById('frm1707:btnFinalCopy').disabled = true;
    d.getElementById('btnUpload').disabled = true;
    @endif
    d.getElementById('frm1707:txtLess2').disabled = true;
    d.getElementById('btnAddSch1').disabled = true;
    d.getElementById('btnDeleteSch1').disabled = true;
    
    if (d.getElementById('frm1707:TaxRelief_IS').checked == true ) {
      enableInstallmentSection();
    } else {
      disableInstallmentSection();
    }
    loadXMLrdo('/xml/rdo.xml');
    getRdo();
    }
  function enableDisable23()
  {
    if(d.getElementById('frm1707:j_id217:_1').checked == true)
    {
      d.getElementById('frm1707:txtLess2').disabled = false;
    }
    else if(d.getElementById('frm1707:j_id217:_2').checked == true)
    {
      d.getElementById('frm1707:txtLess2').disabled = true;
      d.getElementById('frm1707:txtLess2').value = '0.00';
    }
  }
  
    var disableElem = true;
  var enableElem = false;
    function disableAllControl()
    {
    d.getElementById('frm1707:txtLess2').disabled = true;
        d.getElementById('frm1707:txtLess').disabled = true;
        d.getElementById('frm1707:j_id217:_1').disabled = true;
        d.getElementById('frm1707:j_id217:_2').disabled = true;
      
        d.getElementById('frm1707:TaxRelief_Y').disabled = true;
        d.getElementById('frm1707:TaxRelief_N').disabled = true;
        d.getElementById('frm1707:txtSpecify').disabled = true;
    d.getElementById('frm1707:txtDateMonth').disabled = true;
        d.getElementById('frm1707:txtDateDay').disabled = true;
        d.getElementById('frm1707:txtDateYear').disabled = true;
    d.getElementById('frm1707:opt4').disabled = true;
        d.getElementById('frm1707:opt4C').disabled = true;
    d.getElementById('frm1707:txtSheets').disabled = true;
    d.getElementById('frm1707:txtTIN1').disabled = true;
    d.getElementById('frm1707:txtTIN2').disabled = true;
    d.getElementById('frm1707:txtTIN3').disabled = true;
    d.getElementById('frm1707:txtBranchCode').disabled = true;
    d.getElementById('frm1707:txtRDOCode').disabled = true;
    d.getElementById('frm1707:txtTINB1').disabled = true;
    d.getElementById('frm1707:txtTINB2').disabled = true;
    d.getElementById('frm1707:txtTINB3').disabled = true;
    d.getElementById('frm1707:txtBranchCodeB').disabled = true;
    d.getElementById('frm1707:txtRDOCodeB').disabled = true;
    d.getElementById('frm1707:txtSellerName').disabled = true;
    d.getElementById('frm1707:txtBuyerName').disabled = true;
    d.getElementById('frm1707:txtSellerAddress').disabled = true;
    d.getElementById('frm1707:txtBuyerAddress').disabled = true;
    d.getElementById('frm1707:txtSellerZipCode').disabled = true;
    d.getElementById('frm1707:txtBuyerZipCode').disabled = true;
    d.getElementById('frm1707:TaxRelief_CS').disabled = true;
    d.getElementById('frm1707:TaxRelief_IS').disabled = true;
    d.getElementById('frm1707:TaxRelief_FS').disabled = true;
    d.getElementById('frm1707:TaxRelief_O').disabled = true;
    d.getElementById('frm1707:txt16Specify').disabled = true;
    d.getElementById('frm1707:txt17SellingPrice').disabled = true;
    d.getElementById('frm1707:txt17Cost').disabled = true;
    d.getElementById('frm1707:txt17Mortgage').disabled = true;
    d.getElementById('frm1707:txt17NumberInstallment').disabled = true;
    d.getElementById('frm1707:txt17Amount').disabled = true;
    d.getElementById('frm1707:txt17DateMonth').disabled = true;
    d.getElementById('frm1707:txt17DateDay').disabled = true;
    d.getElementById('frm1707:txt17DateYear').disabled = true;
    d.getElementById('frm1707:txt17Total').disabled = true;
    //d.getElementById('btnSchedA').disabled = true;
    d.getElementById('btnSchedB').disabled = true;
    d.getElementById('frm1707:txt22CompTaxDue').disabled = true;
    d.getElementById('frm1707:txtSurcharge').disabled = true;
    d.getElementById('frm1707:txtInterest').disabled = true;
    d.getElementById('frm1707:txtCompromise').disabled = true;
    d.getElementById('btnAddSch1').disabled = true;
    d.getElementById('btnDeleteSch1').disabled = true;
    
    var size = sched1ToCommit.length;
        for(var i = 0 ; i < size ; i++){
            d.getElementById('chxSched1' + i).disabled = true;
      d.getElementById('txtSched1CorpStockName' + i).disabled = true;
      d.getElementById('txtSched1StockCertNum' + i).disabled = true;
      d.getElementById('txtSched1NumOfShares' + i).disabled = true;
      d.getElementById('txtSched1TaxableBase' + i).disabled = true;
    }

    d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm1707:cmdEdit').disabled = false;
    d.getElementById('frm1707:btnFinalCopy').disabled = false;
    
    disableElem;
    enableElem;
  }

    function enableAllControl()
    {
    if(d.getElementById('frm1707:j_id217:_1').checked)
    {
      d.getElementById('frm1707:txtLess2').disabled = false;
    }
    else
    {
      d.getElementById('frm1707:txtLess2').disabled = true;
    }
    d.getElementById('frm1707:txtDateMonth').disabled = false;
        d.getElementById('frm1707:txtDateDay').disabled = false;
        d.getElementById('frm1707:txtDateYear').disabled = false;
        d.getElementById('frm1707:j_id217:_1').disabled = false;
        d.getElementById('frm1707:j_id217:_2').disabled = false;
        d.getElementById('frm1707:TaxRelief_Y').disabled = false;
        d.getElementById('frm1707:TaxRelief_N').disabled = false;
    d.getElementById('frm1707:opt4').disabled = false;
        d.getElementById('frm1707:opt4C').disabled = false;
    d.getElementById('frm1707:txtTIN1').disabled = false;
    d.getElementById('frm1707:txtTIN2').disabled = false;
    d.getElementById('frm1707:txtTIN3').disabled = false;
    d.getElementById('frm1707:txtBranchCode').disabled = false;
    d.getElementById('frm1707:txtRDOCode').disabled = false;
    d.getElementById('frm1707:txtTINB1').disabled = false;
    d.getElementById('frm1707:txtTINB2').disabled = false;
    d.getElementById('frm1707:txtTINB3').disabled = false;
    d.getElementById('frm1707:txtBranchCodeB').disabled = false;
    d.getElementById('frm1707:txtRDOCodeB').disabled = false;
    d.getElementById('frm1707:txtSellerName').disabled = false;
    d.getElementById('frm1707:txtBuyerName').disabled = false;
    d.getElementById('frm1707:txtSellerAddress').disabled = false;
    d.getElementById('frm1707:txtBuyerAddress').disabled = false;
    d.getElementById('frm1707:txtSellerZipCode').disabled = false;
    d.getElementById('frm1707:txtBuyerZipCode').disabled = false;
    d.getElementById('frm1707:TaxRelief_CS').disabled = false;
    d.getElementById('frm1707:TaxRelief_IS').disabled = false;
    d.getElementById('frm1707:TaxRelief_FS').disabled = false;
    d.getElementById('frm1707:TaxRelief_O').disabled = false;
    d.getElementById('frm1707:txt16Specify').disabled = false;
    if(d.getElementById('frm1707:TaxRelief_IS').checked)
    {
      d.getElementById('frm1707:txt17SellingPrice').disabled = false;
      d.getElementById('frm1707:txt17Cost').disabled = false;
      d.getElementById('frm1707:txt17Mortgage').disabled = false;
      d.getElementById('frm1707:txt17NumberInstallment').disabled = false;
      d.getElementById('frm1707:txt17Amount').disabled = false;
      d.getElementById('frm1707:txt17DateMonth').disabled = false;
      d.getElementById('frm1707:txt17DateDay').disabled = false;
      d.getElementById('frm1707:txt17DateYear').disabled = false;
      d.getElementById('frm1707:txt17Total').disabled = false;
    }
    else
    {
      d.getElementById('frm1707:txt17SellingPrice').disabled = true;
      d.getElementById('frm1707:txt17Cost').disabled = true;
      d.getElementById('frm1707:txt17Mortgage').disabled = true;
      d.getElementById('frm1707:txt17NumberInstallment').disabled = true;
      d.getElementById('frm1707:txt17Amount').disabled = true;
      d.getElementById('frm1707:txt17DateMonth').disabled = true;
      d.getElementById('frm1707:txt17DateDay').disabled = true;
      d.getElementById('frm1707:txt17DateYear').disabled = true;
      d.getElementById('frm1707:txt17Total').disabled = true;
    }
    //d.getElementById('btnSchedA').disabled = false;
    d.getElementById('btnSchedB').disabled = false;
    d.getElementById('frm1707:txt22CompTaxDue').disabled = false;
    d.getElementById('frm1707:txtSurcharge').disabled = false;
    d.getElementById('frm1707:txtInterest').disabled = false;
    d.getElementById('frm1707:txtCompromise').disabled = false;
    if (d.getElementById('frm1707:TaxRelief_CS').checked || d.getElementById('frm1707:TaxRelief_FS').checked){
      d.getElementById('btnAddSch1').disabled = false;
      d.getElementById('btnDeleteSch1').disabled = false;
    }
    else if (d.getElementById('frm1707:TaxRelief_IS').checked || d.getElementById('frm1707:TaxRelief_O').checked){
      d.getElementById('btnAddSch1').disabled = true;
      d.getElementById('btnDeleteSch1').disabled = true;
    }

        if(d.getElementById('frm1707:TaxRelief_Y').checked)
        {
            d.getElementById('frm1707:txtSpecify').disabled = false;
        }
       
      

        d.getElementById('frm1707:cmdValidate').disabled = false;
    d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1707:cmdEdit').disabled = true;
    d.getElementById('frm1707:btnFinalCopy').disabled = true;
    d.getElementById('btnUpload').disabled = true;
      
    var size = sched1ToCommit.length;
        for(var i = 0 ; i < size ; i++){
            d.getElementById('chxSched1' + i).disabled = false;
      d.getElementById('txtSched1CorpStockName' + i).disabled = false;
      d.getElementById('txtSched1StockCertNum' + i).disabled = false;
      d.getElementById('txtSched1NumOfShares' + i).disabled = false;
      d.getElementById('txtSched1TaxableBase' + i).disabled = false;
    }
    
    if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
      d.getElementById('frm1707:txtDateMonth').disabled = true;
      d.getElementById('frm1707:txtDateDay').disabled = true;
      d.getElementById('frm1707:txtDateYear').disabled = true;
    }
    
    disableElem;
    enableElem;
    d.getElementById('frm1707:txtTIN1').disabled = true;
          d.getElementById('frm1707:txtTIN2').disabled = true;
          d.getElementById('frm1707:txtTIN3').disabled = true;
      d.getElementById('frm1707:txtBranchCode').disabled = true;
    }
  
  function getRdo()
    {
        var data2 = "<select class='iceSelOneMnu' id='frm1707:txtRDOCodeB' name='frm1707:txtRDOCodeB' size='1'><option value='000'> </option>";
        
        for(var i = 0; i < rdoList.length; i++) {
                var rdo = rdoList[i];
                data2 = data2 + "<option value='" + rdo.rdoCode + "'>" + rdo.description + "</option>";
            }
        data2 = data2 + "</select>"
        
        $('#rdoSelect2').html(data2);   
    }
  
    function showSched2(){
      saveTempSched2Data();
      
      d.getElementById('formPaper').style.display = "none";
      $('#modalSched2').show('blind');            
      setTimeout("d.getElementById('frm1707:totalAmount').disabled = true; setInputTextControl_HorizontalAlignment('frm1707:totalAmount', 4);", 100);
        
    }
    

    function saveTempSched2Data() {
        tempRowSizeSched2 = d.getElementById("tblSched2").rows.length - 2;
        tempSchd2Particulars = new Array();
        tempSchd2Amt = new Array();
        for(var x = 0; x < tempRowSizeSched2; x++){
            tempSchd2Particulars[x] = d.getElementById('txtSched2Particulars'+ (x)).value;
            tempSchd2Amt[x] = d.getElementById('txtSched2Amt'+ (x)).value;
        }
    } 

    function addlistSched2Reload()
    {
            var size = sched2ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched2ToCommit[i].txtSched2Particulars = d.getElementById('txtSched2Particulars'+i).value;
                sched2ToCommit[i].txtSched2Amt = d.getElementById('txtSched2Amt'+i).value;
            }
            i = sched2ToCommit.length;
            sched2ToCommit[i] = new Schedule2();

      $('#tbodyllistSched2').html("");
      
            for(i = 0; i < sched2ToCommit.length; i++) {

         $('#tbodyllistSched2').html(  d.getElementById('tbodyllistSched2').innerHTML + "<tr>" +        
                    "<td width='10%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched2"+i+"' name='chxSched2"+i+"' /> </td>" +
                    "<td width='55%' align='center'> <input type='text'  id='txtSched2Particulars"+i+"' name='txtSched2Particulars[]' value='"+ sched2ToCommit[i].txtSched2Particulars +"'  maxlength='130' size='100'> </td> " +
          "<td width='25%' align='center'><input type='text' id='txtSched2Amt"+i+"' name='txtSched2Amt[]' value='"+ sched2ToCommit[i].txtSched2Amt +"' onblur='computeSumTax(); round(this,2)' onkeypress='return numbersonly(this, event)' maxlength='17' size='40' /> </td> " +
                    "<td width='10%'>&nbsp;</td></tr>");
            
                //setTimeout("setInputTextControl_HorizontalAlignment('txtSched2Amt"+i+"',4 );setInputTextControl_NumberFormatterNonNegative('txtSched2Amt"+i+"',12,2);d.getElementById('txtSched2Amt"+i+"').value=d.getElementById('txtSched2Amt"+i+"').value;",100);
        setTimeout("setInputTextControl_HorizontalAlignment('txtSched2Amt"+i+"',4 );d.getElementById('txtSched2Amt"+i+"').value=d.getElementById('txtSched2Amt"+i+"').value;",100);
            }
    } 
  
    function addlistSched2()
    {
        if(checkifEmptyFieldSched2()) {
            var size = sched2ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched2ToCommit[i].txtSched2Particulars = d.getElementById('txtSched2Particulars'+i).value;
                sched2ToCommit[i].txtSched2Amt = d.getElementById('txtSched2Amt'+i).value;
            }
            i = sched2ToCommit.length;
            sched2ToCommit[i] = new Schedule2();

      $('#tbodyllistSched2').html("");
      
            for(i = 0; i < sched2ToCommit.length; i++) {

         $('#tbodyllistSched2').html(  d.getElementById('tbodyllistSched2').innerHTML + "<tr>" +        
                    "<td width='10%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched2"+i+"' name='chxSched2"+i+"' /> </td>" +
                    "<td width='55%' align='center'> <input type='text'  id='txtSched2Particulars"+i+"' name='txtSched2Particulars[]'  value='"+ sched2ToCommit[i].txtSched2Particulars +"'  maxlength='130' size='100'> </td> " +
          "<td width='25%' align='center'><input type='text' id='txtSched2Amt"+i+"' name='txtSched2Amt[]'  value='"+ sched2ToCommit[i].txtSched2Amt +"' onblur='computeSumTax(); round(this,2)' onkeypress='return numbersonly(this, event)' maxlength='17' size='40' /> </td> " +
                    "<td width='10%'>&nbsp;</td></tr>");
            
                //setTimeout("setInputTextControl_HorizontalAlignment('txtSched2Amt"+i+"',4 );setInputTextControl_NumberFormatterNonNegative('txtSched2Amt"+i+"',12,2);d.getElementById('txtSched2Amt"+i+"').value=d.getElementById('txtSched2Amt"+i+"').value;",100);
        setTimeout("setInputTextControl_HorizontalAlignment('txtSched2Amt"+i+"',4 );d.getElementById('txtSched2Amt"+i+"').value=d.getElementById('txtSched2Amt"+i+"').value;",100);
            }
        }
    }

    function deletelistSched2()
    {
        var sched2Temp = new Array();
        var i = 0;
        var size = sched2ToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            sched2ToCommit[i].txtSched2Particulars = d.getElementById('txtSched2Particulars'+i).value;
            sched2ToCommit[i].txtSched2Amt = d.getElementById('txtSched2Amt'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched2" + j).checked) {
                sched2Temp[i++] = sched2ToCommit[j];
            }
        }

        if(sched2Temp.length > 0) {
            sched2ToCommit = new Array();
            sched2ToCommit = sched2Temp;
      $('#tbodyllistSched2').html("");

            for(i = 0; i < sched2Temp.length; i++) {
                sched2ToCommit[i] = sched2Temp[i];
                //d.getElementById("tbodyllistSched2").innerHTML += "<tr>" +
        $('#tbodyllistSched2').html(  d.getElementById('tbodyllistSched2').innerHTML + "<tr>" + 
                    "<td width='10%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched2"+i+"' /> </td>" +
                    "<td width='55%' align='center'> <input type='text'  id='txtSched2Particulars"+i+"' value='"+ sched2ToCommit[i].txtSched2Particulars +"'  maxlength='130' size='100'> </td> " +
          "<td width='25%' align='center'><input type='text' id='txtSched2Amt"+i+"' value='"+ sched2ToCommit[i].txtSched2Amt +"' onblur='computeSumTax(); round(this,2)' onkeypress='return numbersonly(this, event)' maxlength='17' size='40'/> </td> " +
                    "<td width='10%'>&nbsp;</td></tr>");


                setTimeout("setInputTextControl_HorizontalAlignment('txtSched2Amt"+i+"',4 );",100);

            }
        } else {
            sched2ToCommit = new Array();
      $('#tbodyllistSched2').html("");
        }
        computeSumTax();
    } 
  
    function computeSumTax(){
        var size = sched2ToCommit.length;
        var totalAmountTax = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtSched2Amt' + i).value)*1 ;
        }
        d.getElementById('frm1707:totalAmount').value = formatCurrency(totalAmountTax);
    } 
  
    function checkifEmptyFieldSched2() {

        var size = sched2ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtSched2Particulars'+ i).value == "") {
                alert("Please enter a valid row " + (i + 1) + " data for Schedule 2.\n" +
                    "Empty fields are not allowed."); return ;
            } 
            if( d.getElementById('txtSched2Amt'+ i).value <= 0 ) {
                alert("Please enter a valid amount on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
        }

        return true;
    } 
  
    function getSched2Modal(){
        if (checkifEmptyFieldSched2() )
        {
       d.getElementById('formPaper').style.display = 'block';
       if ( $('#modalSched2').css('display') != 'none' ) {
        $('#modalSched2').hide('blind');
       }
       $('#DummyTxt').html("Creator");
       $('#DummyTxt').html("");     

            d.getElementById('frm1707:txtLess').value  = d.getElementById('frm1707:totalAmount').value;

      computeOfTaxDue();
      //compute18P();

            isModalTurnOn = false;
        }
    }

    function clearSched2Modal() {
        var rowSizeSched2 = d.getElementById("tblSched2").rows.length - 1;

        for(var x = 0; x < rowSizeSched2; x++){
      if (d.getElementById('txtSched2Particulars'+ (x)) != null)
        d.getElementById('txtSched2Particulars'+ (x)).value = "";
            if (d.getElementById('txtSched2Amt'+ (x)) != null)
        d.getElementById('txtSched2Amt'+ (x)).value = "0.00";

        }
    }

    function cancelSched2Modal() {
        restoreTempSched2Data();
    d.getElementById('formPaper').style.display = 'block';
  
    if ( $('#modalSched2').css('display') != 'none' ) {
      $('#modalSched2').hide('blind');    
    }
    $('#DummyTxt').html("Creator");
    $('#DummyTxt').html("");    
        isModalTurnOn = false;  
    } 
  
    function restoreTempSched2Data() {
        try { 
            if(tempRowSizeSched2 > 0) {
                sched2ToCommit = new Array();
        $('#tbodyllistSched2').html("");
                var x = 0;

                for(x = 0; x < tempRowSizeSched2; x++){
                    addlistSched2();
                    
                    d.getElementById('txtSched2Particulars'+ (x)).value = tempSchd2Particulars[x];
                    d.getElementById('txtSched2Amt'+ (x)).value = tempSchd2Amt[x];

                }

                setTimeout("getSched2Modal();", 100);
            }
        } catch (e) {
            alert("Error on loading data.\n\nException:\n" + e.toString());
      return;
        }
    } 
  
    function Schedule1()
    {
    this.txtSched1CorpStockName = '';
        this.txtSched1StockCertNum = '';
    this.txtSched1NumOfShares = '0.00';
        this.txtSched1TaxableBase = '0.00';
    }   
  
    function Schedule2()
    {
        this.txtSched2Particulars = '';
        this.txtSched2Amt = '0.00';
    } 

    function showSched1(){
    //if(d.getElementById('btnSchedA').disabled == false && d.getElementById('btnSchedB').disabled == false){
    if(d.getElementById('btnSchedB').disabled == false){
        //if(!isModalTurnOn) {
            saveTempSched1Data();
      
      d.getElementById('formPaper').style.display = "none";
      $('#modalSched1').show('blind');            
            //setTimeout("d.getElementById('frm1707:totalAmount1').disabled = true; setInputTextControl_HorizontalAlignment('frm1707:totalAmount1', 4);setInputTextControl_NumberFormatter('frm1707:totalAmount1', 12, 2);", 100);
      setTimeout("d.getElementById('frm1707:totalAmount1').disabled = true; setInputTextControl_HorizontalAlignment('frm1707:totalAmount1', 4);", 100);
            //isModalTurnOn = true;
            
        //}
    }
    else
    {
      return false;
    }

    }
    

    function saveTempSched1Data() {
        tempRowSizeSched1 = d.getElementById("tblSched1").rows.length - 2;
        tempSchd1CorpStockName = new Array();
        tempSchd1StockCertNum = new Array();
    tempSchd1NumOfShares = new Array();
    tempSchd1TaxableBase = new Array();
    
        for(var x = 0; x < tempRowSizeSched1; x++){
            tempSchd1CorpStockName[x] = d.getElementById('txtSched1CorpStockName'+ (x)).value;
            tempSchd1StockCertNum[x] = d.getElementById('txtSched1StockCertNum'+ (x)).value;
            tempSchd1NumOfShares[x] = d.getElementById('txtSched1NumOfShares'+ (x)).value;
            tempSchd1TaxableBase[x] = d.getElementById('txtSched1TaxableBase'+ (x)).value;      
        }
    } 

    function addlistSched1Reload()
    {

            var size = sched1ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched1ToCommit[i].txtSched1CorpStockName = d.getElementById('txtSched1CorpStockName'+i).value;
                sched1ToCommit[i].txtSched1StockCertNum = d.getElementById('txtSched1StockCertNum'+i).value;
                sched1ToCommit[i].txtSched1NumOfShares = d.getElementById('txtSched1NumOfShares'+i).value;
                sched1ToCommit[i].txtSched1TaxableBase = d.getElementById('txtSched1TaxableBase'+i).value;        
            }
            i = sched1ToCommit.length;
            sched1ToCommit[i] = new Schedule1();

      $('#tbodyllistSched1').html("");
      
            for(i = 0; i < sched1ToCommit.length; i++) {

         $('#tbodyllistSched1').html(  d.getElementById('tbodyllistSched1').innerHTML + "<tr>" +        
                    "<td width='5%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched1"+i+"' name='chxSched1"+i+"' /> </td>" +
                    "<td width='30%' align='center'> <input type='text' size='50' id='txtSched1CorpStockName"+i+"' name='txtSched1CorpStockName[]' value='"+ sched1ToCommit[i].txtSched1CorpStockName +"'  maxlength='50'/> </td> " +
          "<td width='20%' align='center'><input type='text' style='text-align: right' size='20' id='txtSched1StockCertNum"+i+"' name='txtSched1StockCertNum[]'  value='"+ sched1ToCommit[i].txtSched1StockCertNum +"' maxlength='40'/> </td> " +
          "<td width='20%' align='center'><input type='text' style='text-align: right' size='10' id='txtSched1NumOfShares"+i+"' name='txtSched1NumOfShares[]'  value='"+ sched1ToCommit[i].txtSched1NumOfShares +"' maxlength='40' onkeypress='return numbersonly(this, event)'/> </td> " +
          "<td width='20%' align='right'><input type='text' style='text-align: right' size='20' id='txtSched1TaxableBase"+i+"' name='txtSched1TaxableBase[]'  value='"+ sched1ToCommit[i].txtSched1TaxableBase +"' onblur='computeSumTax1(); round(this,2)' onkeypress='return numbersonly(this, event)' maxlength='17' /> </td> " +
                    "<td width='5%'>&nbsp;</td></tr>");   
      
                //setTimeout("setInputTextControl_HorizontalAlignment('txtSched1TaxableBase"+i+"',4 );setInputTextControl_NumberFormatterNonNegative('txtSched1TaxableBase"+i+"',12,2);d.getElementById('txtSched1TaxableBase"+i+"').value=d.getElementById('txtSched1TaxableBase"+i+"').value;",100);
        setTimeout("setInputTextControl_HorizontalAlignment('txtSched1TaxableBase"+i+"',4 );d.getElementById('txtSched1TaxableBase"+i+"').value=d.getElementById('txtSched1TaxableBase"+i+"').value;",100);
        setTimeout("setInputTextControl_HorizontalAlignment('txtSched1NumOfShares"+i+"',4 );d.getElementById('txtSched1NumOfShares"+i+"').value=d.getElementById('txtSched1NumOfShares"+i+"').value;",100);
        setTimeout("setInputTextControl_HorizontalAlignment('txtSched1StockCertNum"+i+"',4 );d.getElementById('txtSched1StockCertNum"+i+"').value=d.getElementById('txtSched1StockCertNum"+i+"').value;",100);
            }

    } 
  
    function addlistSched1()
    {
        if(checkifEmptyFieldSched1()) {
            var size = sched1ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched1ToCommit[i].txtSched1CorpStockName = d.getElementById('txtSched1CorpStockName'+i).value;
                sched1ToCommit[i].txtSched1StockCertNum = d.getElementById('txtSched1StockCertNum'+i).value;
                sched1ToCommit[i].txtSched1NumOfShares = d.getElementById('txtSched1NumOfShares'+i).value;
                sched1ToCommit[i].txtSched1TaxableBase = d.getElementById('txtSched1TaxableBase'+i).value;        
            }
            i = sched1ToCommit.length;
            sched1ToCommit[i] = new Schedule1();

      $('#tbodyllistSched1').html("");
      
            for(i = 0; i < sched1ToCommit.length; i++) {

         $('#tbodyllistSched1').html(  d.getElementById('tbodyllistSched1').innerHTML + "<tr>" +        
                    "<td width='5%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched1"+i+"' name='chxSched1"+i+"' /> </td>" +
                    "<td width='30%' align='center'> <input type='text' size='50'  id='txtSched1CorpStockName"+i+"' name='txtSched1CorpStockName[]' value='"+ sched1ToCommit[i].txtSched1CorpStockName +"'  maxlength='50' /> </td> " +
          "<td width='20%' align='center'><input type='text' style='text-align: right' size='20' id='txtSched1StockCertNum"+i+"' name='txtSched1StockCertNum[]'  value='"+ sched1ToCommit[i].txtSched1StockCertNum +"' maxlength='40' /> </td> " +
          "<td width='20%' align='center'><input type='text' style='text-align: right' size='10' id='txtSched1NumOfShares"+i+"' name='txtSched1NumOfShares[]'  value='"+ sched1ToCommit[i].txtSched1NumOfShares +"' maxlength='40' onkeypress='return numbersonly(this, event)'/> </td> " +
          "<td width='20%' align='right'><input type='text' style='text-align: right' size='20' id='txtSched1TaxableBase"+i+"' name='txtSched1TaxableBase[]'  value='"+ sched1ToCommit[i].txtSched1TaxableBase +"' onblur='computeSumTax1(); round(this,2)' onkeypress='return numbersonly(this, event)' maxlength='17' /> </td> " +
                    "<td width='5%'>&nbsp;</td></tr>");   
      
                //setTimeout("setInputTextControl_HorizontalAlignment('txtSched1TaxableBase"+i+"',4 );setInputTextControl_NumberFormatterNonNegative('txtSched1TaxableBase"+i+"',12,2);d.getElementById('txtSched1TaxableBase"+i+"').value=d.getElementById('txtSched1TaxableBase"+i+"').value;",100);
        setTimeout("setInputTextControl_HorizontalAlignment('txtSched1TaxableBase"+i+"',4 );d.getElementById('txtSched1TaxableBase"+i+"').value=d.getElementById('txtSched1TaxableBase"+i+"').value;",100);
        setTimeout("setInputTextControl_HorizontalAlignment('txtSched1NumOfShares"+i+"',4 );d.getElementById('txtSched1NumOfShares"+i+"').value=d.getElementById('txtSched1NumOfShares"+i+"').value;",100);
        setTimeout("setInputTextControl_HorizontalAlignment('txtSched1StockCertNum"+i+"',4 );d.getElementById('txtSched1StockCertNum"+i+"').value=d.getElementById('txtSched1StockCertNum"+i+"').value;",100);
            }
        }
    }

    function deletelistSched1()
    {
        var sched1Temp = new Array();
        var i = 0;
        var size = sched1ToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            sched1ToCommit[i].txtSched1CorpStockName = d.getElementById('txtSched1CorpStockName'+i).value;
            sched1ToCommit[i].txtSched1StockCertNum = d.getElementById('txtSched1StockCertNum'+i).value;
            sched1ToCommit[i].txtSched1NumOfShares = d.getElementById('txtSched1NumOfShares'+i).value;
            sched1ToCommit[i].txtSched1TaxableBase = d.getElementById('txtSched1TaxableBase'+i).value;  
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched1" + j).checked) {
                sched1Temp[i++] = sched1ToCommit[j];
            }
        }

        if(sched1Temp.length > 0) {
            sched1ToCommit = new Array();
            sched1ToCommit = sched1Temp;
      $('#tbodyllistSched1').html("");

            for(i = 0; i < sched1Temp.length; i++) {
                sched1ToCommit[i] = sched1Temp[i];
        $('#tbodyllistSched1').html(  d.getElementById('tbodyllistSched1').innerHTML + "<tr>" + 
                    "<td width='5%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched1"+i+"' /> </td>" +
                    "<td width='30%' align='center'> <input type='text' size='50'  id='txtSched1CorpStockName"+i+"' value='"+ sched1ToCommit[i].txtSched1CorpStockName +"'  maxlength='50' /> </td> " +
          "<td width='20%' align='center'><input type='text' style='text-align: right' size='20' id='txtSched1StockCertNum"+i+"' value='"+ sched1ToCommit[i].txtSched1StockCertNum +"' maxlength='40' /> </td> " +
          "<td width='20%' align='center'><input type='text' style='text-align: right' size='10' id='txtSched1NumOfShares"+i+"' value='"+ sched1ToCommit[i].txtSched1NumOfShares +"' maxlength='40' onkeypress='return numbersonly(this, event)'/> </td> " +
          "<td width='20%' align='right'><input type='text' style='text-align: right' size='20' id='txtSched1TaxableBase"+i+"' value='"+ sched1ToCommit[i].txtSched1TaxableBase +"' onblur='computeSumTax1(); round(this,2)' onkeypress='return numbersonly(this, event)'maxlength='17' /> </td> " +
                    "<td width='5%'>&nbsp;</td></tr>"); 


                setTimeout("setInputTextControl_HorizontalAlignment('txtSched1TaxableBase"+i+"',4 );",100);
        

            }
        } else {
            sched1ToCommit = new Array();
      $('#tbodyllistSched1').html("");
        }
        computeSumTax1();
    } 
  
    function computeSumTax1(){
        var size = sched1ToCommit.length;
        var totalAmountTax1 = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTax1 = totalAmountTax1*1 + NumWithComma(d.getElementById('txtSched1TaxableBase' + i).value)*1 ;
        }
        d.getElementById('frm1707:totalAmount1').value = formatCurrency(totalAmountTax1);
    d.getElementById('frm1707:txtTax').value  = d.getElementById('frm1707:totalAmount1').value;
    computeOfTaxDue();
    } 
  
    function checkifEmptyFieldSched1() {

        var size = sched1ToCommit.length;
        for(var i = 0 ; i < size ; i++) 
        {
            if(d.getElementById('txtSched1CorpStockName'+ i).value == "") {
                alert("Please enter valid Name of Corporate Stock on row " + (i + 1) + " data for Schedule 1.\n"); return ;
            } 
            if(d.getElementById('txtSched1StockCertNum'+ i).value == "") {
                alert("Please enter valid Stock Certificate Number on row " + (i + 1) + " data for Schedule 1.\n"); return ;
            }       
            if( d.getElementById('txtSched1NumOfShares'+ i).value <= 0 ) {
                alert("Please enter a valid Number of Shares on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }     
            if( d.getElementById('txtSched1TaxableBase'+ i).value <= 0 ) {
                alert("Please enter a valid Tax Base on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
        }

        return true;
    } 
  
    function getSched1Modal(){
        if (checkifEmptyFieldSched1() )
        { 
       d.getElementById('formPaper').style.display = 'block';
       if ( $('#modalSched1').css('display') != 'none' ) {
        $('#modalSched1').hide('blind');
       }
       $('#DummyTxt').html("Creator");
       $('#DummyTxt').html("");     

            d.getElementById('frm1707:txtTax').value  = d.getElementById('frm1707:totalAmount1').value;

            computeOfTaxDue();     

            isModalTurnOn = false;
        }
    }

    function clearSched1Modal() {
        var rowSizeSched1 = d.getElementById("tblSched1").rows.length - 1;

        for(var x = 0; x < rowSizeSched1; x++){
      if (d.getElementById('txtSched1CorpStockName'+ (x)) != null)
        d.getElementById('txtSched1CorpStockName'+ (x)).value = "";
      if (d.getElementById('txtSched1StockCertNum'+ (x)) != null)
        d.getElementById('txtSched1StockCertNum'+ (x)).value = "";
      if (d.getElementById('txtSched1NumOfShares'+ (x)) != null)
        d.getElementById('txtSched1NumOfShares'+ (x)).value = "0";
      if (d.getElementById('txtSched1TaxableBase'+ (x)) != null)
        d.getElementById('txtSched1TaxableBase'+ (x)).value = "0.00";

        }
    }

    function cancelSched1Modal() {
        restoreTempSched1Data();
    d.getElementById('formPaper').style.display = 'block';
  
    if ( $('#modalSched1').css('display') != 'none' ) {
      $('#modalSched1').hide('blind');    
    }
    $('#DummyTxt').html("Creator");
    $('#DummyTxt').html("");    
        isModalTurnOn = false;  
    } 
  
    function restoreTempSched1Data() {
        try { 
            if(tempRowSizeSched1 > 0) {
                sched1ToCommit = new Array();
        $('#tbodyllistSched1').html("");
                var x = 0;

                for(x = 0; x < tempRowSizeSched1; x++){
                    addlistSched1();
                    
                    d.getElementById('txtSched1CorpStockName'+ (x)).value = tempSchd1CorpStockName[x];
          d.getElementById('txtSched1StockCertNum'+ (x)).value = tempSchd1StockCertNum[x];
                    d.getElementById('txtSched1NumOfShares'+ (x)).value = tempSchd1NumOfShares[x];
          d.getElementById('txtSched1TaxableBase'+ (x)).value = tempSchd1TaxableBase[x];

                }

                setTimeout("getSched1Modal();", 100);
            }
        } catch (e) {
            alert("Error on loading data.\n\nException:\n" + e.toString());
      return;
        }
    } 

//--------------------------------------------------- 
  
    function validate()
    {
    var seller = d.getElementById('frm1707:txtTIN1').value + d.getElementById('frm1707:txtTIN2').value + d.getElementById('frm1707:txtTIN3').value + d.getElementById('frm1707:txtBranchCode').value;
    var buyer = d.getElementById('frm1707:txtTINB1').value + d.getElementById('frm1707:txtTINB2').value + d.getElementById('frm1707:txtTINB3').value + d.getElementById('frm1707:txtBranchCodeB').value;
    
    var dt = new Date();
    var isLeap = new Date(document.getElementById('frm1707:txtDateYear').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm1707:txtDateMonth').value==2 && document.getElementById('frm1707:txtDateDay').value==29) {
      alert("Filing year is not a leap year.");
      return;
    }
    if (!isLeap && document.getElementById('frm1707:txtDateMonth').value==2 && document.getElementById('frm1707:txtDateDay').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    if (isLeap && document.getElementById('frm1707:txtDateMonth').value==2 && document.getElementById('frm1707:txtDateDay').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    
    if( (d.getElementById('frm1707:txtDateMonth').value == "")  )
        {
            alert("Please enter a valid month on Item 1.");
            return;
        }     
        if( d.getElementById('frm1707:txtDateMonth').value*1 > 12   )
        {
            alert("Invalid month entry on Item no.1. Please enter a valid month.")
            return;
        }   
    if(document.getElementById('frm1707:txtDateMonth').value.length == 1 || document.getElementById('frm1707:txtDateDay').value.length == 1)
    {
      alert("Please enter a valid day/month on item 1. Format should be MM/DD/YYYY.")
            return;
    }
     
    if( (d.getElementById('frm1707:txtDateDay').value == "")  )
        {
            alert("Please enter a valid day on Item 1.");
            return;
        }     
    if( (d.getElementById('frm1707:txtDateYear').value == "")  )
        {
            alert("Please enter a valid year on Item 1.");
            return;
        }     
      
        if( d.getElementById('frm1707:txtDateYear').value*1 < 1904   )
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1904.")
            return;
        }   
    
    if(d.getElementById('frm1707:txtDateDay').value < 1){
            alert("Please enter a valid day in Item 1.");
            return;
        }
    
    //Check if valid date - Benjie Manalaysay 11/5/2013
    var month31 = (['01', '03', '05', '07', '08', '10', '12']);
    var month30 = (['04', '06', '09', '11']);
    var month = document.getElementById('frm1707:txtDateMonth').value
    if (month31.contains(month) && document.getElementById('frm1707:txtDateDay').value > 31)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    else if (month30.contains(month) && document.getElementById('frm1707:txtDateDay').value > 30)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }


    if(d.getElementById('frm1707:j_id217:_1').checked == false && d.getElementById('frm1707:j_id217:_2').checked == false )
        {
            alert("Please choose Amended Y/N on item 2.")
            return;
        }   
        if(d.getElementById('frm1707:opt4').checked == false && d.getElementById('frm1707:opt4C').checked == false )
        {
            alert("Please select an option for Item 4.")
            return;
        }   
    if( (d.getElementById('frm1707:txtTIN1').value == "")  )
    {
      alert("Please enter the Seller's TIN.")
      return;
    }   
    if( (d.getElementById('frm1707:txtTIN2').value == "")  )
    {
      alert("Please enter the Seller's TIN.")
      return;
    }   
    if( (d.getElementById('frm1707:txtTIN3').value == "")  )
    {
      alert("Please enter the Seller's TIN.")
      return;
    }
    if( (d.getElementById('frm1707:txtBranchCode').value == "")  )
    {
      alert("Please enter the Seller's TIN.")
      return;
    }
    
    if( (d.getElementById('frm1707:txtTINB1').value == "")  )
    {
      alert("Please enter the Buyer's TIN.")
      return;
    }
    if( (d.getElementById('frm1707:txtTINB2').value == "")  )
    {
      alert("Please enter the Buyer's TIN.")
      return;
    }
    if( (d.getElementById('frm1707:txtTINB3').value == "")  )
    {
      alert("Please enter the Buyer's TIN.")
      return;
    }
    if( (d.getElementById('frm1707:txtBranchCodeB').value == "")  )
    {
      alert("Please enter the Buyer's TIN.")
      return;
    }
    if(seller.localeCompare(buyer) == 0)
    {
      alert("TIN for Buyer and Seller should be different.")
      return;
    }
    if( (d.getElementById('frm1707:txtRDOCodeB').selectedIndex == 0)  )
    {
      alert("Please enter the Buyer's RDO Code.")
      return;
    }
    if( (d.getElementById('frm1707:txtSellerName').value == "")  )
    {
      alert("Please enter the Seller's Name.")
      return;
    }   
    if( (d.getElementById('frm1707:txtBuyerName').value == "")  )
    {
      alert("Please enter the Buyer's Name.")
      return;
    }
    if( (d.getElementById('frm1707:txtSellerAddress').value == "")  )
    {
      alert("Please enter the Seller's Address.")
      return;
    }   
    if( (d.getElementById('frm1707:txtBuyerAddress').value == "")  )
    {
      alert("Please enter the Buyer's Address.")
      return;
    }
    
    if( (d.getElementById('frm1707:txtSellerZipCode').value == "")  )
    {
      alert("Please enter Zip Code on item 13.")
      return;
    }
    
    if( (d.getElementById('frm1707:txtBuyerZipCode').value == "")  )
    {
      alert("Please enter Zip Code on item 14.")
      return;
    }

    if( d.getElementById('frm1707:TaxRelief_Y').checked == true && d.getElementById('frm1707:txtSpecify').value == 0)
        {
            alert("Please specify treaty or law for Item 15.");
            return;
        }
    
    if( !d.getElementById('frm1707:TaxRelief_CS').checked && !d.getElementById('frm1707:TaxRelief_IS').checked && !d.getElementById('frm1707:TaxRelief_FS').checked && !d.getElementById('frm1707:TaxRelief_O').checked )
    {
      alert("Please choose your description of transaction (Item 16).");
      return;
    }
  
        if( d.getElementById('frm1707:TaxRelief_IS').checked == true && d.getElementById('frm1707:txt17SellingPrice').value == "" ) //|| d.getElementById('frm1707:txt17SellingPrice').value == 0)  )
        {
            alert("Please provide a valid Selling Price/FMV on Item 17A.");
            return;
        }
    
    if( d.getElementById('frm1707:TaxRelief_O').checked == true && d.getElementById('frm1707:txt16Specify').value == "" ) 
        {
            alert("Please provide a valid description on item 16.");
            return;
        }
    
        if( d.getElementById('frm1707:TaxRelief_IS').checked == true && d.getElementById('frm1707:txt17Cost').value == "") //|| d.getElementById('frm1707:txt17Cost').value == 0)  )
        {
            alert("Please provide a valid Cost and Expenses on Item 17B.");
            return;
        }
        if( d.getElementById('frm1707:TaxRelief_IS').checked == true && d.getElementById('frm1707:txt17Mortgage').value == "") //|| d.getElementById('frm1707:txt17Mortgage').value == 0 )  )
        {
            alert("Please provide a valid Mortgaged Assumed on Item 17C.");
            return;
        }
        if( d.getElementById('frm1707:TaxRelief_IS').checked == true && d.getElementById('frm1707:txt17NumberInstallment').value == "") // || d.getElementById('frm1707:txt17NumberInstallment').value == 0 )  )
        {
            alert("Please provide a valid Number of Installment(s) on Item 17D.");
            return;
        }
        if( d.getElementById('frm1707:TaxRelief_IS').checked == true && d.getElementById('frm1707:txt17Amount').value == "") // || d.getElementById('frm1707:txt17Amount').value == 0)  )
        {
            alert("Please provide a valid Amount of Installment on Item 17E.");
            return;
        }
    
   
        if( d.getElementById('frm1707:TaxRelief_IS').checked == true && d.getElementById('frm1707:txt17DateMonth').value != "" && d.getElementById('frm1707:txt17DateDay').value != "" && d.getElementById('frm1707:txt17DateYear').value != ""  )
        {
                if(validateMonthDayYearDate(d.getElementById('frm1707:txt17DateMonth').value + "/" + d.getElementById('frm1707:txt17DateDay').value + "/" + d.getElementById('frm1707:txt17DateYear').value)){
                    alert("Invalid Installment Collection date on Item 17F.");
                    return true;
                }
        }
   
        if( d.getElementById('frm1707:TaxRelief_IS').checked == true && d.getElementById('frm1707:txt17Total').value == "") // || d.getElementById('frm1707:txt17Total').value == 0)  )
        {
            alert("Please provide a valid Total Collection on Item 17G.");
            return;
        }

        // all forms validate with entry
    if(d.getElementById('frm1707:TaxRelief_CS').checked || d.getElementById('frm1707:TaxRelief_FS').checked){
      if( (d.getElementById('frm1707:txtTax').value == "") || (d.getElementById('frm1707:txtTax').value <= 0) )
      {
        alert("Item 18 should have a value.  Kindly accomplish Schedule 1.")
        return;
      } 
    }
  
        d.getElementById('frm1707:cmdValidate').disabled = true;
        d.getElementById('frm1707:cmdEdit').disabled = false;
    d.getElementById('frm1707:btnFinalCopy').disabled = false;
    d.getElementById('btnUpload').disabled = false;
        //d.getElementById('btnSave').disabled = false;
        disableAllControl();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
    return;
    }

    function validateMonthDayYearDate(dateID)
    {
        strmmddyyy = dateID;
    //--Benjie Manalaysay             
    if(strmmddyyy != ""){
      var result = strmmddyyy.split("/")
      if(result.length == 3 ){
        //Variables
        var month = result[0];
        var day = result[1];
        var year = result[2];
        
        var isLeap = new Date(year, 1, 29).getMonth() == 1;
          
        if(isNaN(month) || isNaN(day) || isNaN(year)){
          return true;
        return;
        }else{ // Validate of valid Day for the month             
          //Check if valid date
          var month31 = (['01', '03', '05', '07', '08', '10', '12']);
          var month30 = (['04', '06', '09', '11']);     
          if (month31.contains(month) && day > 31)
          {
            return true;
          }
          else if (month30.contains(month) && day > 30)
          {
            return true;
          }else if(month == 2){
              //Special Handling for Leap Year
              if (!isLeap && day == 29) {
                return true;
              }
              if (!isLeap && day > 29) {
                return true;
              }
              if (isLeap && day >29) {
                return true;
              }
              
          }else{
            //No Error              
          }
        }
      }else{
      return true;
      }
    }
        
    } 
  function valueToItem22() {
    d.getElementById('frm1707:txtTaxDue2').value = formatCurrency(d.getElementById('frm1707:txt17Total').value);  
    computeTaxPayable();
  }
   
    function computeOfTaxDue()
    {
        var txtTax = NumWithComma(d.getElementById('frm1707:txtTax').value)*1;
    var txtLess = NumWithComma(d.getElementById('frm1707:txtLess').value)*1;
    d.getElementById('frm1707:txtNetCap').value = formatCurrency(txtTax - txtLess);
    
   
    computeTaxPayable();
    computeOfTotalAmtDue();
    
    
    }
  
  function computeNetCap(netCap) {
    var rate = 0;
    var a = 0;
    if (netCap > 100000) {
      a = ((1 * netCap) - 100000) * 0.1
      d.getElementById('frm1707:txtTaxDue').value = formatCurrency((1 * a) + 5000);
    } else {
      d.getElementById('frm1707:txtTaxDue').value = formatCurrency((1 * netCap) * 0.05);
    }
    
    computeTaxPayable();
    computeOfTotalAmtDue();
    }
  
  function computeTaxPayable()
  {
    var txtTaxDue21 = NumWithComma(d.getElementById('frm1707:txtTaxDue').value)*1;
    var txtTaxDue22 = NumWithComma(d.getElementById('frm1707:txtTaxDue2').value)*1;
    
    var txtLess2 = NumWithComma(d.getElementById('frm1707:txtLess2').value)*1;
    
    if (d.getElementById('frm1707:TaxRelief_IS').checked == true) {
      d.getElementById('frm1707:txtTaxPayable').value = formatCurrency(NumWithComma(d.getElementById('frm1707:txtTaxDue2').value)*1 - NumWithComma(d.getElementById('frm1707:txtLess2').value)*1);
    } else {
      d.getElementById('frm1707:txtTaxPayable').value = formatCurrency(NumWithComma(d.getElementById('frm1707:txtTaxDue').value)*1 - NumWithComma(d.getElementById('frm1707:txtLess2').value)*1);
    } 
    computeOfTotalAmtDue();
  }
  
  function computePenalties()
    {
        var tax20a = NumWithComma(d.getElementById('frm1707:txtSurcharge').value)*1;
        var tax20b = NumWithComma(d.getElementById('frm1707:txtInterest').value)*1;
        var tax20c = NumWithComma(d.getElementById('frm1707:txtCompromise').value)*1;
        d.getElementById('frm1707:txtTotalPenalties').value =   formatCurrency(tax20a  + tax20b + tax20c);
    
        computeOfTotalAmtDue();
    }
    function computeOfTotalAmtDue()
    {
        var taxTotalPenalties = NumWithComma(d.getElementById('frm1707:txtTotalPenalties').value)*1;
        var taxTaxDue = NumWithComma(d.getElementById('frm1707:txtTaxPayable').value)*1;
        d.getElementById('frm1707:txtTotal').value = formatCurrency(taxTotalPenalties + taxTaxDue);
    //d.getElementById('frm1707:txtTotal').value = formatCurrency(taxTaxDue);
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
        if(d.getElementById('frm1707:j_id252:_1').checked == false && d.getElementById('frm1707:j_id252:_2').checked == false )
        {
            return "Please select an option for Item 4.";
        }
       
        else if( d.getElementById('frm1707:j_id252:_1').checked == true )
        {
            return true;
        }
    }

    function checkTINlength(e){

        if(e.length < 12){
            alert("TIN not valid");
            e.onfocus;
      return;
        }
    }
  
  function enableIndividual()
  {
    d.getElementById('frm1707:opt30E').disabled = false;
    d.getElementById('frm1707:txtOthers30E').disabled = false;
  }
  
  function enableInstallment() 
  {
          d.getElementById('frm1707:txtSelling').disabled = false;
      d.getElementById('frm1707:txtCost').disabled = false;
      d.getElementById('frm1707:txtMortgage').disabled = false;
      d.getElementById('frm1707:txtTotalP').disabled = false;
      d.getElementById('frm1707:txtAmount').disabled = false;
      d.getElementById('frm1707:txtTotalN').disabled = false;
      d.getElementById('frm1707:txtOthers21').disabled = true;
      d.getElementById('frm1707:txtDateMonthI').disabled = false;
      d.getElementById('frm1707:txtDateDayI').disabled = false;
      d.getElementById('frm1707:txtDateYearI').disabled = false;
      d.getElementById('frm1707:opt30D').disabled = false;
      d.getElementById('frm1707:txtInstallment').disabled = false;
      d.getElementById('frm1707:opt30B').disabled = true;
      d.getElementById('frm1707:txtBid').disabled = true;
      d.getElementById('frm1707:opt30F').disabled = true;
      d.getElementById('frm1707:txtOthers30F').disabled = true;
      d.getElementById('frm1707:opt30C').disabled = true;
      d.getElementById('frm1707:txtFMVLI').disabled = true;
      d.getElementById('frm1707:opt30A').disabled = true;
      d.getElementById('frm1707:txtGross').disabled = true;
      d.getElementById('frm1707:opt30E').disabled = true;
      d.getElementById('frm1707:txtOthers30E').disabled = true;
      d.getElementById('frm1707:opt29A').disabled = true;
      d.getElementById('frm1707:txtFMVLand').disabled = true;
      d.getElementById('frm1707:opt29C').disabled = true;
      d.getElementById('frm1707:txtFMVZonal').disabled = true;
      d.getElementById('frm1707:opt29B').disabled = true;
      d.getElementById('frm1707:txtFMVImprovements').disabled = true;
      d.getElementById('frm1707:opt29D').disabled = true;
      d.getElementById('frm1707:txtFMVBIR').disabled = true;
  }
  
  function enableExempt()
  {
      d.getElementById('frm1707:txtSelling').disabled = true;
      d.getElementById('frm1707:txtCost').disabled = true;
      d.getElementById('frm1707:txtMortgage').disabled = true;
      d.getElementById('frm1707:txtTotalP').disabled = true;
      d.getElementById('frm1707:txtAmount').disabled = true;
      d.getElementById('frm1707:txtTotalN').disabled = true;
      d.getElementById('frm1707:txtOthers21').disabled = false;
      d.getElementById('frm1707:txtDateMonthI').disabled = true;
      d.getElementById('frm1707:txtDateDayI').disabled = true;
      d.getElementById('frm1707:txtDateYearI').disabled = true;
      d.getElementById('frm1707:opt30D').disabled = true;
      d.getElementById('frm1707:txtInstallment').disabled = true;
      d.getElementById('frm1707:opt30B').disabled = true;
      d.getElementById('frm1707:txtBid').disabled = true;
      d.getElementById('frm1707:opt30F').disabled = false;
      d.getElementById('frm1707:txtOthers30F').disabled = false;
      d.getElementById('frm1707:txtOtherss30F').disabled = false;
      d.getElementById('frm1707:opt30C').disabled = true;
      d.getElementById('frm1707:txtFMVLI').disabled = true;
      d.getElementById('frm1707:opt30A').disabled = true;
      d.getElementById('frm1707:txtGross').disabled = true;
      d.getElementById('frm1707:opt30E').disabled = true;
      d.getElementById('frm1707:txtOthers30E').disabled = true;
      d.getElementById('frm1707:opt29A').disabled = true;
      d.getElementById('frm1707:txtFMVLand').disabled = true;
      d.getElementById('frm1707:opt29C').disabled = true;
      d.getElementById('frm1707:txtFMVZonal').disabled = true;
      d.getElementById('frm1707:opt29B').disabled = true;
      d.getElementById('frm1707:txtFMVImprovements').disabled = true;
      d.getElementById('frm1707:opt29D').disabled = true;
      d.getElementById('frm1707:txtFMVBIR').disabled = true;
  }
  
  function cashSale()
  {
      d.getElementById('frm1707:txtSelling').disabled = true;
      d.getElementById('frm1707:txtCost').disabled = true;
      d.getElementById('frm1707:txtMortgage').disabled = true;
      d.getElementById('frm1707:txtTotalP').disabled = true;
      d.getElementById('frm1707:txtAmount').disabled = true;
      d.getElementById('frm1707:txtTotalN').disabled = true;
      d.getElementById('frm1707:txtOthers21').disabled = true;
      d.getElementById('frm1707:txtDateMonthI').disabled = true;
      d.getElementById('frm1707:txtDateDayI').disabled = true;
      d.getElementById('frm1707:txtDateYearI').disabled = true;
      d.getElementById('frm1707:opt30D').disabled = true;
      d.getElementById('frm1707:txtInstallment').disabled = true;
      d.getElementById('frm1707:opt30B').disabled = true;
      d.getElementById('frm1707:txtBid').disabled = true;
      d.getElementById('frm1707:opt30F').disabled = true;
      d.getElementById('frm1707:txtOthers30F').disabled = true;
      d.getElementById('frm1707:opt30C').disabled = false;
      d.getElementById('frm1707:txtFMVLI').disabled = false;
      d.getElementById('frm1707:opt30A').disabled = false;
      d.getElementById('frm1707:txtGross').disabled = false;
      d.getElementById('frm1707:opt30E').disabled = true;
      d.getElementById('frm1707:txtOthers30E').disabled = true;
      d.getElementById('frm1707:opt29A').disabled = false;
      d.getElementById('frm1707:txtFMVLand').disabled = false;
      d.getElementById('frm1707:opt29C').disabled = false;
      d.getElementById('frm1707:txtFMVZonal').disabled = false;
      d.getElementById('frm1707:opt29B').disabled = false;
      d.getElementById('frm1707:txtFMVImprovements').disabled = false;
      d.getElementById('frm1707:opt29D').disabled = false;
      d.getElementById('frm1707:txtFMVBIR').disabled = false;
  }
  
  function foreclosure()
  {
      d.getElementById('frm1707:txtSelling').disabled = true;
      d.getElementById('frm1707:txtCost').disabled = true;
      d.getElementById('frm1707:txtMortgage').disabled = true;
      d.getElementById('frm1707:txtTotalP').disabled = true;
      d.getElementById('frm1707:txtAmount').disabled = true;
      d.getElementById('frm1707:txtTotalN').disabled = true;
      d.getElementById('frm1707:txtOthers21').disabled = true;
      d.getElementById('frm1707:txtDateMonthI').disabled = true;
      d.getElementById('frm1707:txtDateDayI').disabled = true;
      d.getElementById('frm1707:txtDateYearI').disabled = true;
      d.getElementById('frm1707:opt30D').disabled = true;
      d.getElementById('frm1707:txtInstallment').disabled = true;
      d.getElementById('frm1707:opt30C').disabled = true;
      d.getElementById('frm1707:txtFMVLI').disabled = true;
      d.getElementById('frm1707:opt30A').disabled = true;
      d.getElementById('frm1707:txtGross').disabled = true;
      d.getElementById('frm1707:opt30E').disabled = true;
      d.getElementById('frm1707:txtOthers30E').disabled = true;
      d.getElementById('frm1707:opt30F').disabled = true;
      d.getElementById('frm1707:txtOthers30F').disabled = true;
      d.getElementById('frm1707:opt30B').disabled = false;
      d.getElementById('frm1707:txtBid').disabled = false;
      d.getElementById('frm1707:opt29A').disabled = true;
      d.getElementById('frm1707:txtFMVLand').disabled = true;
      d.getElementById('frm1707:opt29C').disabled = true;
      d.getElementById('frm1707:txtFMVZonal').disabled = true;
      d.getElementById('frm1707:opt29B').disabled = true;
      d.getElementById('frm1707:txtFMVImprovements').disabled = true;
      d.getElementById('frm1707:opt29D').disabled = true;
      d.getElementById('frm1707:txtFMVBIR').disabled = true;
  }
  
  function computeFMVLI()
    {
        var tax29aa = (1 * d.getElementById('frm1707:txtFMVLand').value).toFixed(2);
        var tax29bb = (1 * d.getElementById('frm1707:txtFMVZonal').value).toFixed(2);
        var tax29cc = (1 * d.getElementById('frm1707:txtFMVImprovements').value).toFixed(2);
    var tax29dd = (1 * d.getElementById('frm1707:txtFMVBIR').value).toFixed(2);
        //d.getElementById('frm1707:txtFMVLI').value =   (1 * tax29aa  + tax29bb*1 + tax29cc*1 + tax29dd*1).toFixed(2);
        compareFMVLI();
    }
    function compareFMVLI()
    {
       
    var FMV29ab = ((1 * d.getElementById('frm1707:txtFMVLand').value)  + (1 * d.getElementById('frm1707:txtFMVImprovements').value)); 
    var FMV29cd = ((1 * d.getElementById('frm1707:txtFMVZonal').value)  + (1 * d.getElementById('frm1707:txtFMVBIR').value));
    var FMV29bc = ((1 * d.getElementById('frm1707:txtFMVImprovements').value)  + (1 * d.getElementById('frm1707:txtFMVZonal').value));
    var FMV29ad = ((1 * d.getElementById('frm1707:txtFMVLand').value)  + (1 * d.getElementById('frm1707:txtFMVBIR').value));
    
    
    if(( FMV29ab > FMV29cd) || (FMV29ab > FMV29bc) || (FMV29ab > FMV29ad) )
    {
      d.getElementById('frm1707:txtFMVLI').value = (FMV29ab);
    }
    else if( (FMV29cd > FMV29bc) || (FMV29cd > FMV29ad) || (FMV29cd > FMV29ab) )
    {
      d.getElementById('frm1707:txtFMVLI').value = (FMV29cd);
    }
    else if( (FMV29bc > FMV29ad) || (FMV29bc > FMV29ab) || (FMV29bc > FMV29cd) )
    {
      d.getElementById('frm1707:txtFMVLI').value = (FMV29bc);
    }
    else if( (FMV29ad > FMV29ab) || (FMV29ad > FMV29cd) || (FMV29ad > FMV29bc) )
    {
      d.getElementById('frm1707:txtFMVLI').value = (FMV29ad);
    }
        
    } 
  
  function computeTaxableBase()
  {
    
  }
  function setInputTextControl_HorizontalAlignment(id,align) {
    if (d.getElementById(id) != null) {
      
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
  function enableInstallmentSection() {
    d.getElementById('frm1707:txt17SellingPrice').disabled = false;
    d.getElementById('frm1707:txt17Cost').disabled = false;
    d.getElementById('frm1707:txt17Mortgage').disabled = false;
    d.getElementById('frm1707:txt17NumberInstallment').disabled = false;
    d.getElementById('frm1707:txt17Amount').disabled = false;
    d.getElementById('frm1707:txt17DateMonth').disabled = false;
    d.getElementById('frm1707:txt17DateDay').disabled = false;
    d.getElementById('frm1707:txt17DateYear').disabled = false;
    d.getElementById('frm1707:txt17Total').disabled = false;
    
    d.getElementById('frm1707:txt17SellingPrice').style.backgroundColor = '#FFFFFF';
    d.getElementById('frm1707:txt17Cost').style.backgroundColor = '#FFFFFF';
    d.getElementById('frm1707:txt17Mortgage').style.backgroundColor = '#FFFFFF';
    d.getElementById('frm1707:txt17NumberInstallment').style.backgroundColor = '#FFFFFF';
    d.getElementById('frm1707:txt17Amount').style.backgroundColor = '#FFFFFF';
    d.getElementById('frm1707:txt17DateMonth').style.backgroundColor = '#FFFFFF';
    d.getElementById('frm1707:txt17DateDay').style.backgroundColor = '#FFFFFF';
    d.getElementById('frm1707:txt17DateYear').style.backgroundColor = '#FFFFFF';
    d.getElementById('frm1707:txt17Total').style.backgroundColor = '#FFFFFF';
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
  
  
  function disableInstallmentSection() {
      d.getElementById('frm1707:txt17SellingPrice').disabled = true;
      d.getElementById('frm1707:txt17Cost').disabled = true;
      d.getElementById('frm1707:txt17Mortgage').disabled = true;
      d.getElementById('frm1707:txt17NumberInstallment').disabled = true;
      d.getElementById('frm1707:txt17Amount').disabled = true;
      d.getElementById('frm1707:txt17DateMonth').disabled = true;
      d.getElementById('frm1707:txt17DateDay').disabled = true;
      d.getElementById('frm1707:txt17DateYear').disabled = true;
      d.getElementById('frm1707:txt17Total').disabled = true; 
      
      d.getElementById('frm1707:txt17SellingPrice').value = "";
      d.getElementById('frm1707:txt17Cost').value = "";
      d.getElementById('frm1707:txt17Mortgage').value = "";
      d.getElementById('frm1707:txt17NumberInstallment').value = "";
      d.getElementById('frm1707:txt17Amount').value = "";
      d.getElementById('frm1707:txt17DateMonth').value = "";
      d.getElementById('frm1707:txt17DateDay').value = "";
      d.getElementById('frm1707:txt17DateYear').value = "";
      d.getElementById('frm1707:txt17Total').value = "";  
      
      d.getElementById('frm1707:txt17SellingPrice').style.backgroundColor = '#CCCCCC';
      d.getElementById('frm1707:txt17Cost').style.backgroundColor = '#CCCCCC';
      d.getElementById('frm1707:txt17Mortgage').style.backgroundColor = '#CCCCCC';
      d.getElementById('frm1707:txt17NumberInstallment').style.backgroundColor = '#CCCCCC';
      d.getElementById('frm1707:txt17Amount').style.backgroundColor = '#CCCCCC';
      d.getElementById('frm1707:txt17DateMonth').style.backgroundColor = '#CCCCCC';
      d.getElementById('frm1707:txt17DateDay').style.backgroundColor = '#CCCCCC';
      d.getElementById('frm1707:txt17DateYear').style.backgroundColor = '#CCCCCC';
      d.getElementById('frm1707:txt17Total').style.backgroundColor = '#CCCCCC';
  }
  
  function enableSched1(){
    d.getElementById('btnAddSch1').disabled = false;
    d.getElementById('btnDeleteSch1').disabled = false;
  }
  function disableSched1(){
    d.getElementById('btnAddSch1').disabled = true;
    d.getElementById('btnDeleteSch1').disabled = true;
    
    var size = sched1ToCommit.length;
        for(var j = 0; j < size ; j++) {
            d.getElementById("chxSched1" + j).checked = true;
        }
    deletelistSched1();
  }
  function initialValidateBeforeSave() {
    if( (d.getElementById('frm1707:txtTIN1').value == "")  )
    {
      alert("Please enter the Seller's TIN.")
      return false;
    }   
    if( (d.getElementById('frm1707:txtTIN2').value == "")  )
    {
      alert("Please enter the Seller's TIN.")
      return false;
    }   
    if( (d.getElementById('frm1707:txtTIN3').value == "")  )
    {
      alert("Please enter the Seller's TIN.")
      return false;
    }
    if( (d.getElementById('frm1707:txtBranchCode').value == "")  )
    {
      alert("Please enter the Seller's TIN.")
      return false;
    }
    if ((d.getElementById('frm1707:txtRDOCode').value == "000")) {
        alert("Please enter a valid Seller's RDO Code.")
        return false;
    }
    if( (d.getElementById('frm1707:txtSellerName').value == "")  )
    {
      alert("Please enter the Seller's Name.")
      return false;
    }
    
    if( (d.getElementById('frm1707:txtTINB1').value == "")  )
    {
      alert("Please enter the Buyer's TIN.")
      return false;
    }   
    if( (d.getElementById('frm1707:txtTINB2').value == "")  )
    {
      alert("Please enter the Buyer's TIN.")
      return false;
    }   
    if( (d.getElementById('frm1707:txtTINB3').value == "")  )
    {
      alert("Please enter the Buyer's TIN.")
      return false;
    }
    if( (d.getElementById('frm1707:txtBranchCodeB').value == "")  )
    {
      alert("Please enter the Buyer's TIN.")
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
  $('.printSignFooterClass_1707').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'avoid',  'background':'#ffffff' }); 
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
    $('#formPaper').css({'border':'#a7a7a7 1px solid','margin-top':'0px' });
    $('.imgClass').css({ 'display':'none'});

    $("#modalSched2").hide();

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
                save('1707',data);
                
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
        saveAndExit('1707',data);
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

        submitAndSave('1707', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1707';
    }


</script>
@endsection