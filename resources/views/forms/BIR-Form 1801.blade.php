@extends('layouts.app')
@section('title', '| BIR Form No. 1801')
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
        <button type="button" class="btn btn-danger btn-exit" id="1801" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1801" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1801' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 891px;">
      
        <table border="0" width="891" cellspacing="0" cellpadding="0" align="center" style="background-repeat: repeat-x;">
        <tr><td>
      
                <div id="formPaper">
                    <div id="mainContent">
                        <table width="891" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                  <table width="100%" style="border-bottom: #AAAAAA 1px solid;">
                    <tr>
                      <td>
                       (To be  filled up by the BIR)
                      </td>
                    </tr>
                    <tr>
                      <td>
                        > DLN:
                      </td>
                      <td>
                        &nbsp;
                      </td>
                      <td>
                        &nbsp;
                      </td>
                      <td>
                       > PSIC:
                      </td>
                    </tr>
                  </table>
                                    <table width="891" border="0" cellspacing="0" cellpadding="0" style="height:0px;border-bottom: 1px solid #a7a7a7;">
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
                                                <font size="6px" style="font-weight:bold;">Estate
                                                <br/>Tax Return</font>
                                            </td>
                                            <td width="145" valign="center">
                                                <font face="Arial" size="1px">BIR Form No.<br/></font>
                                                <font face="Arial" size="6px">1801<br/></font>
                                                <font face="Arial" size="1px">July 2003(ENCS)</font>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
              <tr>
                            <td>
                                <table width="885" border="0" cellspacing="0" cellpadding="0" class="tblForm1801">
                                    <tr>
                                        <td width="200" rowspan="2" valign="top" class="tblFormTd1801">
                                                <table style="height:29px">
                                                    <tr>
                                                        <td width="200" height="23"><table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="15"><font size="2" style="font-weight:bold">&nbsp;1&nbsp;</font></td>
                                                                    <td width="176"><font size="1" style="font-size: 11px;">Date of Death (MM/DD/YYYY) </font></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="23"><input id="frm1801:txtDateMonth" name="frm1801:txtDateMonth" maxlength="2" size="2" style="text-align: right" type="text" onKeyPress="return wholenumber(this, event)" value="" />
                                    <input id="frm1801:txtDateDay" name="frm1801:txtDateDay" maxlength="2" size="2" style="text-align: right" type="text" onKeyPress="return wholenumber(this, event)" value="" />
                                    <input id="frm1801:txtDateYear" name="frm1801:txtDateYear" maxlength="4" size="4" style="text-align: right" type="text" onKeyPress="return wholenumber(this, event)" value="" /></td>
                                                    </tr>
                                                </table>
                    </td>
                                        <td valign="top" class="tblFormTd1801">
                                            <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <!--<fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1801:j_id217" >-->
                                                            <div align="center" style="padding: 5px 0 5px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="Y" name="frm1801:amendedRtn" id="frm1801:amendedRtn_1" onclick="document.getElementById('frm1801:txt32B').disabled = false;" />
                                                                                <label for="frm1801:amendedRtn_1" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;
                                                                            </td>
                                                                            <td><input type="radio" value="N"  name="frm1801:amendedRtn" id="frm1801:amendedRtn_2" onclick="document.getElementById('frm1801:txt32B').disabled = true;d.getElementById('frm1801:txt32B').value = '0.00';compute32C();" checked />
                                                                                <label for="frm1801:amendedRtn_2" style="font-size:12px;" >No</label>
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
                                        <td valign="top" class="tblFormTd1801">
                                            <table width="152" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">No. of Sheets Attached?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><input type="text" value="0" style="text-align: right;" size="4" name="frm1801:txtSheets" maxlength="2" id="frm1801:txtSheets" onkeypress="return wholenumber(this, event)" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="210" valign="top" class="tblFormTd1801">
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
                                                        <input disabled id="frm1801:txt4" maxlength="5" name="frm1801:txt4" size="6" style="background-color: rgb(220, 220, 220);" type="text" value="ES 010" />
                                                    </td>
                                                </tr>
                                            </table>
                    </td>
                                    </tr>
                                </table>
                            </td>
              <tr>
                <td>
                  <table width="885" border="0" cellspacing="0" cellpadding="0" class="tblForm1801">
                      <tr>
                        <td width="780" colspan="2" class="tblFormTdPart1801">
                          <table width="81%" border="0" cellspacing="0" cellpadding="0" height="20">
                            <tr>
                              <td width="7%" height="20">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part I</font>
                              </td>
                              <td width="93%" height="20" align="center">
                                <div align="center"><font size="2" style="font-weight:bold;letter-spacing:2px;">Background Information</font></div>
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
                                <table style="width: 885" border="0" cellspacing="0" cellpadding="0" class="tblForm1801">
                                    <tr>
                                        <td valign="top" class="tblFormTd1801">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">TIN of the Taxpayer&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="{{$company->tin1}}" size="2" name="frm1801:txtTIN1" maxlength="3" id="frm1801:txtTIN1" onKeyPress="return wholenumber(this, event)"  />
                                                            <input type="text" value="{{$company->tin2}}" size="2" name="frm1801:txtTIN2" maxlength="3" id="frm1801:txtTIN2" onKeyPress="return wholenumber(this, event)"  />
                                                            <input type="text" value="{{$company->tin3}}" size="2" name="frm1801:txtTIN3" maxlength="3" id="frm1801:txtTIN3" onKeyPress="return wholenumber(this, event)"  />
                                                            <input type="text" value="{{$company->tin4}}" size="2" name="frm1801:txtBranchCode" maxlength="3" id="frm1801:txtBranchCode" onkeypress="return letternumber(event)" />
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td valign="top" class="tblFormTd1801">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="90"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                    <td id="rdoSelect">
                                                        <select class='iceSelOneMnu' id='frm1801:txtRDOCode' disabled name='frm1801:txtRDOCode' size='1' >
                                                          <option value='{{$company->rdo_code}}' selected="">{{$company->rdo_code}}</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                    <td width="412" valign="top" class="tblFormTd1801">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">TIN of the Executor/Administrator&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="" size="2" name="frm1801:txtTINE1" maxlength="3" id="frm1801:txtTINE1" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="" size="2" name="frm1801:txtTINE2" maxlength="3" id="frm1801:txtTINE2" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="" size="2" name="frm1801:txtTINE3" maxlength="3" id="frm1801:txtTINE3" onKeyPress="return wholenumber(this, event)" />
                                                            <input type="text" value="" size="2" name="frm1801:txtBranchCodeE" maxlength="3" id="frm1801:txtBranchCodeE" onkeypress="return letternumber(event)"/>
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
                                    <table width="885" border="0" cellspacing="0" cellpadding="0" class="tblForm1801">
                                        <tr>
                                            <td width="442" valign="top" class="tblFormTd1801">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Taxpayer's Name</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->registered_name}}" size="60" name="frm1801:txtTaxpayer" maxlength="60" id="frm1801:txtTaxpayer" onblur="return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="442" valign="top" class="tblFormTd1801">
                                                <table width="400" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="148"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font><font size="1" style="font-size: 11px;">Name of Executor/Administrator
                                                                </font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <input type="text" value="" size="50" name="frm1801:txtExecutor" maxlength="50" id="frm1801:txtExecutor" onblur="return capital(this, event)" />
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
                                    <table width="885" border="0" cellspacing="0" cellpadding="0" class="tblForm1801">
                                        <tr>
                                            <td width="442" valign="top" class="tblFormTd1801">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Residence of Decedent at the Time of Death</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->address}}" size="60" name="frm1801:txtResidence" maxlength="60" id="frm1801:txtResidence" onblur="return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="442" valign="top" class="tblFormTd1801">
                                                <table width="400" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="220"><font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font><font size="1" style="font-size: 11px;">Registered Address (Executor/Administrator)
                                                                </font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <input type="text" value="" size="50" name="frm1801:txtAddress" maxlength="50" id="frm1801:txtAddress" onblur="return capital(this, event)" />
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
                                    <table border="0" cellpadding="0" cellspacing="0" class="tblForm1801" style="width: 885;">
                                        <tr>
                                            <td width="150" valign="top" class="tblFormTd1801"><table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;12&nbsp;</font></td>
                                                        <td width="60"><font size="1" style="font-size: 11px;">Zip Code</font></td>
                                                        <td width="123"><font size="1">
                                                                <input name="frm1801:txtZip" value="{{$company->zip_code}}" type="text" id="frm1801:txtZip" value="" size="5" maxlength="4" onKeyPress="return wholenumber(this, event)" /></font></td>
                                                    </tr>
                                                </table>
                      </td>
                                            <td width="227" valign="top" class="tblFormTd1801"><table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="22"><font size="2" style="font-weight:bold">&nbsp;13&nbsp;</font></td>
                                                        <td width="80"><font size="1" style="font-size: 11px;">Telephone No.</font></td>
                                                        <td width="80"><font size="1">
                                                                <input name="frm1801:txtTelephone" type="text" id="frm1801:txtTelephone" value="{{$company->tel_number}}" size="16" maxlength="20" onKeyPress="return wholenumber(this, event)" />
                                                            </font></td>
                                                    </tr>
                                                </table></td>
                                            <td width="220" valign="top" class="tblFormTd1801"><table width="228" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;14&nbsp;</font></td>
                                                        <td width="88"><label size="1" style="font-size: 11px;">Residence Address (Executor/Administrator)</label></td>
                                                        <td width="120"><span class="normal">
                                                                <input type="text" id="frm1801:txtRAddress" name="frm1801:txtRAddress" value="" size="35" maxlength="50" onblur="return capital(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                </table>
                                            </td>
                                    </table>
                                </td>
                            </tr>
              <tr>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm1801" width="885" height="74">
                                        <tr>
                                            <td height="30" valign="top" class="tblFormTd1801">
                                                <table width="735" border="0" cellpadding="0" cellspacing="0">
                                                    <tr height="30">
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;15&nbsp;</font></td>
                                                        <td width="350"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Are you availing of tax relief under Special Law/ International Tax Treaty?</font></td>
                                                        <td width="96">
                                                            <!--<fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1801:j_id217">-->
                                                                <table border="0" cellpadding="0" cellspacing="0" >
                                                                    <tr>
                                                                        <td><input id="frm1801:optTreaty:_1" name="frm1801:optTreaty" type="radio" value="Y" onclick="enableSelTreaty()" />
                                                                            <label  for="frm1801:optTreaty:_1"><font size="1" style="font-size: 11px;">Yes</font></label></td>
                                                                        <td><input id="frm1801:optTreaty:_2" name="frm1801:optTreaty" type="radio" value="N" onclick="disableSelTreaty()" checked />
                                                                            <label  for="frm1801:optTreaty:_2"><font size="1" style="font-size: 11px;">No</font></label></td>
                                                                    </tr>
                                                                </table>
                                                            <!--</fieldset>-->
                                                        </td>
                                                        <td width="86"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">If yes, specify</font></td>
                                                        <td width="39"><font face="Arial, Helvetica, sans-serif" size="2"><b>15A</b></font></td>
                                                        <td width="216"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <select id="frm1801:lstTaxTreaty" name="frm1801:lstTaxTreaty"  size="1" disabled >
                                                                    <option selected="selected" value="0"> </option>
                                                                    <option value="1">Special Rate</option>
                                                                    <option value="2">International Tax Treaty</option>
                                                                </select>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="24" class="tblFormTd1801">
                                                <table border="0" cellspacing="0" cellpadding="0" width="100%" >
                                                    <tr valign="middle">
                                                        <td width="18"> <font size="2" face="Arial, Helvetica, sans-serif"><b>16</b></font> </td>
                                                        <td width="300"> <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Mark applicable Box</font></td>
                                                        <td></td><td><font face="Arial, Helvetica, sans-serif" size="1">
                                                            Yes&nbsp;
                                                            No</font>
                                                        </td><td></td><td><font face="Arial, Helvetica, sans-serif" size="1">
                                                            Yes
                                                            &nbsp;&nbsp;No</font></td>
                                                    </tr>
                          <tr><td></td><td width="90"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Has a Notice of Death been filed?</font></td><td></td><td><input id="frm1801:Notice:_1" name="frm1801:Notice" type="radio" value="Y" />&nbsp;&nbsp;&nbsp;<input id="frm1801:Notice:_2" name="frm1801:Notice" type="radio" value="N" /></td>
                            <td width="300"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Has the estate been settled judicially?&nbsp;&nbsp;&nbsp;</font></td><td><input id="frm1801:Judicially:_1" name="frm1801:Judicially" type="radio" value="Y" />&nbsp;&nbsp;&nbsp;&nbsp;<input id="frm1801:Judicially:_2" name="frm1801:Judicially" type="radio" value="N" /></td>
                          </tr>
                          <tr><td></td><td width="300"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Has an extension to file return been granted?</font></td><td></td><td><input id="frm1801:Return:_1" name="frm1801:Return" type="radio" value="Y" />&nbsp;&nbsp;&nbsp;<input id="frm1801:Return:_2" name="frm1801:Return" type="radio" value="N" /></td>
                            <td width="300"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Has an extension to pay the tax been granted?&nbsp;&nbsp;&nbsp;</font></td><td><input id="frm1801:PayTax:_1" name="frm1801:PayTax" type="radio" value="Y" />&nbsp;&nbsp;&nbsp;&nbsp;<input id="frm1801:PayTax:_2" name="frm1801:PayTax" type="radio" value="N" /></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                                    </table>
                                </td>
                            </tr>
              <tr>
                                <td>
                                    <table width="885" border="0" cellspacing="0" cellpadding="0" class="tblForm1801">
                                        <tr>
                                            <td class="tblFormTd1801">
                                                <table width="100%" height="20" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="7%" height="20">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part II</font></td>
                                                        <td width="93%" height="20" align="center">
                                                            <div align="center"><font size="2" style="font-weight:bold;letter-spacing:2px;">Computation of Tax</font></div>
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
                                    <table width="885" border="0" cellspacing="0" cellpadding="0" class="tblForm1801">
                                        <tr>
                                            <td class="tblFormTd1801"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr valign="middle">
                                                        <td colspan="3" height="10"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><b>Particulars</b></font></div></td>
                                                        <td colspan="2" height="10"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><b>Exclusive</b></font></div></td>
                            <td colspan="3" height="10"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><b>Conjugal/Communal</b></font></div></td>
                            <td colspan="1" height="10" width="100"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">TOTAL</font></div></td>
                                                    </tr>
                                                    <tr valign="middle">
                                                        <td colspan="3" height="14"></td>
                                                        <td colspan="2" height="14"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">(a)</font></div></td>
                                                        <td height="14" width="51"></td>
                                                        <td height="14" width="115"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">(b)</font></div></td>
                                                        <td height="14" width="48"></td>
                                                        
                            <td height="14" width="118"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">(c)</font></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="31" width="18"><div align="left"><font face="Arial, Helvetica, sans-serif" size="2"><b>17</b></font></div></td>
                                                        <td colspan="2" height="31"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Real Properties excluding Family Home ( 
                                                                <!--<input type="button" class="printButtonClass" value="Sch.1" id="btnSched1" onclick="showSched1()" />-->
                                <a href="#" id="btnSched1" onclick="showSched1()" >Sch.1</a>
                                                                )</font></td>
                                                        <td height="31" valign="middle" width="36"><div align="right"><b><font face="Arial, Helvetica, sans-serif" size="2">17A</font></b></div></td>
                                                        <td height="31" valign="middle" width="116"><input disabled="true" id="frm1801:txt17A" name="frm1801:txt17A" maxlength='25' size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00"  /></td>
                                                        <td valign="middle" width="36"><div align="center"><b><font face="Arial, Helvetica, sans-serif" size="2">17B</font></b></div></td>
                                                        <td height="31" valign="middle" width="115"><div align="left">
                                                                <input  disabled="true" id="frm1801:txt17B" name="frm1801:txt17B" maxlength='25' size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" />
                                                            </div></td>
                                                        <td valign="middle" width="36"><div align="center"><b><font face="Arial, Helvetica, sans-serif" size="2">17C</font></b></div></td>
                                                        <td height="31" valign="middle" width="118"><input   id="frm1801:txt17C" name="frm1801:txt17C" maxlength='25' size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute17c();" disabled /></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="18"><div align="left"><font face="Arial, Helvetica, sans-serif" size="2"><b>18</b></font></div></td>
                                                        <td width="190" colspan="2"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Personal Properties (
                                                                <!--<input type="button" class="printButtonClass" value="Sch.2/3" id="btnSched2and3" onclick="showSched2and3()" />-->
                                <a href="#" id="btnSched2and3" onclick="showSched2and3()" >Sch.2/3</a>
                                                                )</font></td>
                                                        <td valign="middle" width="36"><div align="right"><b><font face="Arial, Helvetica, sans-serif" size="2">18A</font></b></div></td>
                                                        <td valign="middle" width="116"><input disabled="true" id="frm1801:txt18A" maxlength='25' name="frm1801:txt18A" size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onblur="compute18c()"  /></td>
                                                        <td valign="middle" width="36"><div align="center"><b><font face="Arial, Helvetica, sans-serif" size="2">18B</font></b></div></td>
                                                        <td valign="middle" width="115"><input  disabled="true" id="frm1801:txt18B" name="frm1801:txt18B" maxlength='25' size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onblur="compute18c()" /></td>
                                                        <td valign="middle" width="36"><div align="center"><b><font face="Arial, Helvetica, sans-serif" size="2">18C</font></b></div></td>
                                                        <td valign="middle" width="118"><input  id="frm1801:txt18C" name="frm1801:txt18C" maxlength='25'  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute18c();" disabled /></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="18"><div align="left"><b><font face="Arial, Helvetica, sans-serif" size="2">19</font></b></div></td>
                                                        <!--<td colspan="2"><font face="Arial, Helvetica, sans-serif" size="1">Family Home ( <input type="button" class="printButtonClass" value="Sch.1" id="btnSched1" onclick="showSched1X()" />)</font></td>-->
                            <td colspan="2"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Family Home ( <a href="#" id="btnSched1b" onclick="showSched1X()" >Sch.1</a> )</font></td>
                                                        <td valign="middle" width="36"><div align="right"><b><font face="Arial, Helvetica, sans-serif" size="2">19A</font></b></div></td>
                                                        <td valign="middle" width="116"><input disabled="true" id="frm1801:txt19A"  maxlength='25' name="frm1801:txt19A"   size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onblur="compute19c()" /></td>
                                                        <td valign="middle" width="36"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>19B</b></font></div></td>
                                                        <td valign="middle" width="115"><input  disabled="true" id="frm1801:txt19B" maxlength='25' name="frm1801:txt19B"  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onblur="compute19c()" /></td>
                                                        <td valign="middle" width="36"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>19C</b></font></div></td>
                                                        <td valign="middle" width="118"><input  id="frm1801:txt19C" maxlength='25' name="frm1801:txt19C"  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute19c();" disabled /></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="18"><div align="left"><font face="Arial, Helvetica, sans-serif" size="2"><b>20</b></font></div></td>
                                                        <!--<td><font face="Arial, Helvetica, sans-serif" size="1"> Taxable Transfer ( <input type="button" class="printButtonClass" value="Sch.4" id="btnSched4" onclick="showSched4()" />  )</font></td>-->
                            <td colspan="2"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"> Taxable Transfer ( <a href="#" id="btnSched4" onclick="showSched4()" >Sch.4</a>  )</font></td>
                                                        <td valign="middle" width="36"><div align="right"><b><font face="Arial, Helvetica, sans-serif" size="2">20A</font></b></div></td>
                                                        <td valign="middle" width="116"><input disabled="true"  id="frm1801:txt20A" name="frm1801:txt20A" maxlength='25'   size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onblur="compute20c()" /></td>
                                                        <td valign="middle" width="36"><div align="center"><b><font face="Arial, Helvetica, sans-serif" size="2">20B</font></b></div></td>
                                                        <td valign="middle" width="115"><input  disabled="true" id="frm1801:txt20B" name="frm1801:txt20B" maxlength='25'  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onblur="compute20c()" /></td>
                            <td valign="middle" width="36"><div align="center"><b><font face="Arial, Helvetica, sans-serif" size="2">20C</font></b></div></td>
                                                        <td valign="middle" width="118"><input   id="frm1801:txt20C" name="frm1801:txt20C" maxlength='25'  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute20c()" disabled /></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="18"><font face="Arial, Helvetica, sans-serif" size="2"><b>21</b></font></td>
                                                        <td colspan="2"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">GROSS ESTATE</font></td>
                                                        <td valign="middle" width="36"><div align="right"><b><font face="Arial, Helvetica, sans-serif" size="2">21A</font></b></div></td>
                                                        <td valign="middle" width="116"><input   id="frm1801:txt21A" name="frm1801:txt21A" maxlength='25'    size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc"  type="text" value="0.00" onblur="round(this,2); compute21c()" disabled /></td>
                                                        <td valign="middle" width="36"><div align="center"><b><font face="Arial, Helvetica, sans-     serif" size="2">21B</font></b></div></td>
                                                        <td valign="middle" width="115"><input   id="frm1801:txt21B" name="frm1801:txt21B" maxlength='25'   size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc"  type="text" value="0.00" onblur="round(this,2); compute21c()" disabled /></td>
                                                        <td valign="middle" width="36"><div align="center"><b><font face="Arial, Helvetica, sans-serif" size="2">21C</font></b></div></td>
                                                        <td valign="middle" width="118"><input   id="frm1801:txt21C" name="frm1801:txt21C" maxlength='25'  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute21c()" disabled /></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="18"><font face="Arial, Helvetica, sans-serif" size="2"><b>22</b></font></td>
                                                        <td>
                                                          <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Less: Deductions (<a href="#" id="btnSched5" onclick="showSched5()" >Sch.5</a>)</font>
                                                        </td>
                                                        <td></td>
                                                    
                                                        <td valign="middle" width="36"><div align="right"><b><font face="Arial, Helvetica, sans-serif" size="2">22A</font></b></div></td>
                                                        <td valign="middle" width="116"><input disabled="true"  id="frm1801:txt22A" name="frm1801:txt22A"  maxlength='25'   size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" /></td>
                                                        <td valign="middle" width="36"><div align="center"><b><font face="Arial, Helvetica, sans-serif" size="2">22B</font></b></div></td>
                                                        <td valign="middle" width="115"><input disabled="true"  id="frm1801:txt22B"  name="frm1801:txt22B" maxlength='25'   size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" /></td>
                                                        <td valign="middle" width="36"><div align="center"><b><font face="Arial, Helvetica, sans-serif" size="2">22C</font></b></div></td>
                                                        <td valign="middle" width="118"><input  id="frm1801:txt22C"  name="frm1801:txt22C" maxlength='25'   size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute22c()" disabled /></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="16" valign="middle" width="18"><font face="Arial, Helvetica, sans-serif" size="2"><b>23</b></font></td>
                                                        <td colspan="2" height="16"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Estate after Deductions</font></td>
                                                        <td  valign="middle" width="36"><div align="right"><font face="Arial, Helvetica, sans-serif" size="2"><b>23A</b></font></div></td>
                                                        <td  valign="middle" width="116"><input   id="frm1801:txt23A" name="frm1801:txt23A" maxlength='25'  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute23a()" disabled /></td>
                                                        <td  valign="middle" width="36"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>23B</b></font></div></td>
                                                        <td  valign="middle" width="115"><input   id="frm1801:txt23B" name="frm1801:txt23B" maxlength='25'  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute23b()" disabled /></td>
                            <td  valign="middle" width="36"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>23C</b></font></div></td>
                                                        <td  valign="middle" width="118"><input   id="frm1801:txt23C" name="frm1801:txt23C" maxlength='25'  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute23c()" disabled /></td>
                                                    </tr>
                          <tr>
                                                        <td width="20"><font face="Arial, Helvetica, sans-serif" size="2"><b>24</b></font></td>
                                                        <td colspan="3"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Family Home </font></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                                                        <td valign="middle" width="43"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>24</b></font></div></td>
                                                        <td valign="middle" width="118"><input  id="frm1801:txt24" name="frm1801:txt24" maxlength='17'  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif; "  type="text" value="0.00" onblur="round(this,2); compute28()" onkeypress="return numbersonly(this, event)" /></td>
                                                    </tr>
                          <tr>
                                                        <td width="20" ><font face="Arial, Helvetica, sans-serif" size="2"><b>25</b></font></td>
                                                        <td height="22" width="20" colspan="3"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Standard Deduction equivalent to P1M </font></td>
                                                        <td ></td><td>&nbsp;</td><td>&nbsp;</td>
                                                        <td valign="middle" width="43"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>25</b></font></div></td>
                                                        <td valign="middle" width="118"><input id="frm1801:txt25" name="frm1801:txt25"  maxlength='17'  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif; "  type="text" value="0.00" onblur="round(this,2); compute28()" onkeypress="return numbersonly(this, event)" /></td>
                                                    </tr>
                          <tr>
                                                        <td width="20"><font face="Arial, Helvetica, sans-serif" size="2"><b>26</b></font></td>
                                                        <td height="22" width="20" colspan="3"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Medical Expenses not to Exceed P500,000 </font></td>
                                                        <td></td><td>&nbsp;</td><td>&nbsp;</td>
                                                        <td valign="middle" width="43"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>26</b></font></div></td>
                                                        <td valign="middle" width="118"><input id="frm1801:txt26" name="frm1801:txt26"  maxlength='17'  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif; "  type="text" value="0.00" onblur="round(this,2); compute28()" onkeypress="return numbersonly(this, event)" /></td>
                                                    </tr>
                          <tr>
                                                        <td width="20"><font face="Arial, Helvetica, sans-serif" size="2"><b>27</b></font></td>
                                                        <td height="22" width="100"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Others (specify)</font></td>
                                                        <td colspan="3"><input type="text" value="" size="40" name="frm1801:txtOthers27a" maxlength="60" id="frm1801:txtOthers27a" onblur="return capital(this, event)" /></td><td>&nbsp;</td><td>&nbsp;</td>
                                                        <td valign="middle" width="43"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>27A</b></font></div></td>
                            <td valign="middle" width="118"><input id="frm1801:txt27A" name="frm1801:txt27A" maxlength='17'  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif; "  type="text" value="0.00" onblur="round(this,2); compute28()" onkeypress="return numbersonly(this, event)" /></td>
                                                    </tr>
                          <tr>
                            <td width="20"><font face="Arial, Helvetica, sans-serif" size="2"><b></b></font></td><td height="22" width="20"></td>
                                                        <td colspan="3"><font size="1" face="Arial, Helvetica, sans-serif"></font><input type="text" size="40" value="" name="frm1801:txtOthers27b" maxlength="60" id="frm1801:txtOthers27b" onblur="return capital(this, event)" /></td><td>&nbsp;</td><td>&nbsp;</td>
                                                        <td valign="middle" width="43"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>27B</b></font></div></td>
                            <td valign="middle" width="118"><input id="frm1801:txt27B" name="frm1801:txt27B" maxlength='17'  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif; "  type="text" value="0.00" onblur="round(this,2); compute28()" onkeypress="return numbersonly(this, event)" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="27" width="18"><font face="Arial, Helvetica, sans-serif" size="2"><b>28</b></font></td>
                                                        <td colspan="4" height="27"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">NET ESTATE</font></td>
                                                        <td>&nbsp;</td><td>&nbsp;</td>
                                                        <td height="27" valign="middle" width="48"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>28</b></font></div></td>
                                                        <td height="27" valign="middle" width="118"><input  id="frm1801:txt28" name="frm1801:txt28" maxlength='25' size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="round(this,2); compute28()" onkeypress="return numbersonly(this, event)"  disabled />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="27" width="18"><font face="Arial, Helvetica, sans-serif" size="2"><b>29</b></font></td>
                                                        <td colspan="4" height="27"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Less: Share of Surviving Spouse (Net Conjugal Estate divided by 2)</font></td>
                                                        <td>&nbsp;</td><td>&nbsp;</td>
                                                        <td height="27" valign="middle" width="48"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>29</b></font></div></td>
                                                        <td height="27" valign="middle" width="118"><input  id="frm1801:txt29" name="frm1801:txt29" maxlength='17' size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif; " type="text" value="0.00" onblur="round(this,2); compute30()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="27" width="18"><font face="Arial, Helvetica, sans-serif" size="2"><b>30</b></font></td>
                                                        <td colspan="4" height="27"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">NET TAXABLE ESTATE</font></td>
                                                        <td>&nbsp;</td><td>&nbsp;</td>
                                                        <td height="27" valign="middle" width="48"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>30</b></font></div></td>
                                                        <td height="27" valign="middle" width="118"><input  id="frm1801:txt30" name="frm1801:txt30" maxlength='25' size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute30()" disabled />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="27" width="18"><font face="Arial, Helvetica, sans-serif" size="2"><b>31</b></font></td>
                                                        <td colspan="4" height="27"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">ESTATE TAX DUE</font></td>
                                                        <td>&nbsp;</td><td>&nbsp;</td>
                                                        <td height="27" valign="middle" width="48"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>31</b></font></div></td>
                                                        <td height="27" valign="middle" width="118"><input  id="frm1801:txt31" name="frm1801:txt31" maxlength='25' size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute31()" disabled />
                                                    </tr>
                                                    <tr>
                                                        <td height="24" width="18"><font face="Arial, Helvetica, sans-serif" size="2"><b>32</b></font></td>
                                                        <td colspan="8" height="24"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Less: Tax Credits/Payments</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="26" width="18"></td>
                                                        <td height="26" width="23"><div align="left"><font face="Arial, Helvetica, sans-serif" size="2"><b>32A</b></font></div></td>
                                                        <td colspan="5" height="26"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Foreign Estate Tax Paid</font></td>
                                                        <td height="26" valign="middle" width="48"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>32A</b></font></div></td>
                                                        <td height="26" valign="middle" width="118"><input id="frm1801:txt32A" name="frm1801:txt32A" maxlength='17' size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif; "  type="text" value="0.00" onblur="round(this,2); compute32C();compute33();compute35()" onkeypress="return numbersonly(this, event)"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="26" width="18"></td>
                                                        <td height="26" width="23"><div align="left"><font face="Arial, Helvetica, sans-serif" size="2"><b>32B</b></font></div></td>
                                                        <td colspan="5" height="26"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Paid in Return Previously Filed, if this is an Amended Return</font></td>
                                                        <td height="26" valign="middle" width="48"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>32B</b></font></div></td>
                                                        <td height="26" valign="middle" width="118"><input  disabled="true" id="frm1801:txt32B" name="frm1801:txt32B" maxlength='17' size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif; "  type="text" value="0.00" onblur="round(this,2); compute32C();compute33();compute35()" onkeypress="return numbersonly(this, event)"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="18" width="18"></td>
                                                        <td height="18" width="23"><div align="left"><font face="Arial, Helvetica, sans-serif" size="2"><b>32C</b></font></div></td>
                                                        <td colspan="5" height="18"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total</font></td>
                                                        <td height="18" valign="middle" width="48"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><b>32C</b></font></div></td>
                                                        <td height="18" valign="middle" width="118"><input id="frm1801:txt32C" maxlength='25' name="frm1801:txt32C"  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute32C()" disabled /></td>
                                                    </tr>
                          </table></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td height="27" width="18"><font face="Arial, Helvetica, sans-serif" size="2"><b>33</b></font></td>
                                                        <td colspan="6" height="27"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax payable/(Overpayment)(Item 31 less Item 32C)</font></td>
                                                        
                                                        <td height="27" valign="middle" width="8%"><div align="right"><font face="Arial, Helvetica, sans-serif" size="2"><b>33</b></font></div></td>
                                                        <td height="27" valign="middle" width="145" align="right"><input id="frm1801:txt33" name="frm1801:txt33" maxlength='25' size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute33()" disabled /></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20"><font face="Arial, Helvetica, sans-serif" size="2"><b>34</b></font></td>
                                                        <td colspan="8"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Add: Penalties</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2" width="20"></td>
                                                        <td colspan="3" rowspan="2"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td></td>
                                                                    <td><div align="center"><font face="Arial" size="1" style="font-size: 11px;">Surcharge</font></div></td>
                                                                    <td></td>
                                                                    <td><div align="center"><font face="Arial" size="1" style="font-size: 11px;">Interest</font></div></td>
                                                                    <td></td>
                                                                    <td><div align="center"><font face="Arial" size="1" style="font-size: 11px;">Compromise</font></div></td>
                                                                </tr>
                                                                <tr valign="middle">
                                                                    <td><div align="right"><font face="Arial, Helvetica, sans-serif" size="2"><b>34A</b></font></div></td>
                                                                    <td><div align="center">
                                                                            <input  id="frm1801:txtSurcharge" name="frm1801:txtSurcharge" maxlength='17'   size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif; " type="text" value="0.00" onblur="round(this,2); computeTotalPenalties()" onkeypress="return numbersonly(this, event)"/>
                                                                        </div></td>
                                                                    <td><div align="right"><font face="Arial, Helvetica, sans-serif" size="2"><b>34B</b></font></div></td>
                                                                    <td><div align="center">
                                                                            <input  id="frm1801:txtCompromise" maxlength='17' name="frm1801:txtCompromise"  size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif; " type="text" value="0.00" onblur="round(this,2); computeTotalPenalties()" onkeypress="return numbersonly(this, event)" />
                                                                        </div></td>
                                                                    <td><div align="right"><font face="Arial, Helvetica, sans-serif" size="2"><b>34C</b></font></div></td>
                                                                    <td><div align="center">
                                                                            <input  id="frm1801:txtInterest" name="frm1801:txtInterest" maxlength='17'   size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif; " type="text" value="0.00" onblur="round(this,2); computeTotalPenalties()" onkeypress="return numbersonly(this, event)" />
                                                                        </div></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="35" valign="middle" width="8%" colspan="4" ><div align="right"><font face="Arial, Helvetica, sans-serif" size="2"><b>34D</b></font></div></td>
                                                        <td height="35" valign="middle" width="145" align="right"><input disabled="true" id="frm1801:txtTotalPenalties" name="frm1801:txtTotalPenalties" maxlength='25' size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20"><font face="Arial, Helvetica, sans-serif" size="2"><b>35</b></font></td>
                                                        <td colspan="6"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Amount Payable</font></td>
                                                        <td valign="middle" width="8%" ><div align="right"><font face="Arial, Helvetica, sans-serif" size="2"><b>35</b></font></div></td>
                                                        <td valign="middle" width="145" align="right"><input  id="frm1801:txt35" name="frm1801:txt35" maxlength='25' size="20" style="text-align: right; font-family: Arial, Helvetica, sans-serif;  background-color:#dcdcdc" type="text" value="0.00" onmousemove="compute35()" disabled /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                    <tr>
                    <td>
                    <div class="imgClass" align='center' style="display:none; width:885px !important;">
                      <table  style="border-top: 3px solid black; font-family:arial; font-size:13px; text-align: center; table-layout: fixed; background-color: white;">
                        <col width="50%" />
                          <col width="50%" />
                          <tr>
                            <td colspan="2">I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge and belief,
                                <br/>is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
                                </td>
                          </tr>
                          <tr>
                            <td><b>36</b>____________________________________________________
                              <br/>Taxpayer/Authorized Agent Signature over Printed Name
                              </td>
                            <td><b>37</b>_____________________________________
                              <br/>Title/Position of Signatory
                              </td>
                          </tr>
                          <tr>
                            <td>______________________________________________________
                              <br/>TIN of Tax Agent (if applicable)</td>
                            <td>_______________________________________
                              <br/>Tax Agent Accreditation No.(if applicable)</td>
                          </tr>
                      </table>
                    </div>
                    <div class="imgClass" align='center' style="display:none; width:885px !important;">
                      <img id="frm1801:jurat" src="{{ asset('images/bottom_img/1801_new.jpg') }}" width="885"/>
                    </div>
                    <div class="imgClass" align='center' style="display:none; width:885px !important;">
                      <table style="font-size:11px; text-align: left; vertical-align: top;background-color: white;">
                        <tr>
                          <td>&nbsp;Machine Validation/Revenue Official Receipt Details (If not filed with the bank)<br/><br/><br/></td>
                        </tr>
                      </table>
                      <div style="font-size:5px;">&nbsp;</div>
                    </div>
                    <table width="885" border="0" cellspacing="0" cellpadding="0" class="tblForm1801 printButtonClass">
                      <tr>
                        <td class="tblFormTdPart1801">
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td>
                                <table width="885" cellspacing="0" cellpadding="0" border="0">
                                  <tbody>
                                    <tr valign="middle">
                                      <td width="40"></td>
                                      <td width="616">
                                        <div>
                                          <div align="center">
                                            @if($action != 'view')
                                            <input type="button" class="printButtonClass" value="Validate" style="width: 100px;" name="frm1801:cmdValidate" id="frm1801:cmdValidate" onclick="window.setTimeout('compute17c();compute18c();compute19c();compute20c();compute21c();compute22c();compute23a();compute23b();compute23c();compute28();compute30();compute31();compute32C();compute33();compute35();',300);validate()" />
                                            <input type="button" class="printButtonClass" value="Edit" style="width: 100px;" name="frm1801:cmdEdit" id="frm1801:cmdEdit" disabled onclick="AllControlDisabled()"/>
                                            <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                            <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                            <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                            <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1801:btnFinalCopy" id="frm1801:btnFinalCopy" onclick="submitForm();" />
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
                                        </tbody>
                    
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>            
                    </div>
                </div>
        
        </td>
        <td valign="top"><img id="frm2550Q:bcsImg" src="{{ asset('images/BCS.jpg') }}"/></td>
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
    
    
     <!-- modal Sched1 (excluding Family Home) -->  
  
    <div id="modalSched1" class="printSignFooterClass_1801" style="width:98%; display:none; min-height:400px; position:relative;margin: auto;padding: 10px; overflow-y:auto; background:#fff;" align="center"> 
      
            <br/>
            <br/>
      <table border="1" cellspacing="0" cellpadding="0" style="position: static" width="100%">
            <tr class="modalHeader"><td>DETAILS OF PROPERTY <br/>Schedule 1 - REAL PROPERTIES  </td></tr></table>
            
                <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%;" id="tblSched1">
                    <thead>
                        <tr class="modalColumnHeader">
                            <td width="70%" colspan="8">&nbsp;</td>
              <td width='30%' align='center' colspan="2"><b>FMV whichever is higher</b></td>
                        </tr>           
                        <tr class="modalColumnHeader">
                            <td width="2%">&nbsp;</td>
              <td width="3%"><b>&nbsp;OCT/TCT <br>CCT No.</b></td>
                            <td width='10%' align='center' ><b>Tax Declaration No. (TD)</b></td>
              <td width='15%' align='center' ><b> LOCATION </b></td>
              <td width='10%' align='center' ><b> CLASS </b></td>
              <td width='10%' align='center' ><b> AREA </b></td>
              <td width='10%' align='center' ><b>Zonal Value (ZV)<br> FMV per BIR</b></td>
                            <td width='10%' align='center' ><b>Fair Market Value <br>(FMV) per TD</b></td>
              <td width='15%' align='center' ><b>CONJUGAL</b></td>
                            <td width='15%' align='center' ><b>EXCLUSIVE</b></td>
                        </tr>
          </thead>
                    <tbody id="tbodyllistSched1" class="text-center"><tr><td></td></tr></tbody>
          <tr>
            <td colspan="8" align="right" class="modalHeader">TOTAL&nbsp;&nbsp;</td>
                        <td width='15%' align="center"><input type="text" style="background-color:#dcdcdc; text-align: right" disabled id="frm1801:totalSch1AmountConj" name="frm1801:totalSch1AmountConj" size="15" value="0.00" /></td>
            <td width='15%' align="center"><input type="text" style="background-color:#dcdcdc; text-align: right" disabled id="frm1801:totalSch1AmountExc" name="frm1801:totalSch1AmountExc" size="15" value="0.00" /></td>
          </tr>
                </table>
                <table style="position: static;width: 100%" align="center" cellspacing="0" cellpadding="0">
                    <tr>
                        <td colspan="10" align="right"><input type='button' class="printButtonClass" id="btnAdd1" value='  Add  ' onclick="addlistSched1()" />&nbsp;<input type='button' class="printButtonClass" id="btnDelete1" value='Delete' onclick="deletelistSched1()" />&nbsp;</td>
                    </tr>
                </table>
            <br/><br/>
      <div align="center">
        <input type="button" class="printButtonClass" name="btnOkPop1" id="btnOkPop1" style="width:120px; height:30px;" value="OK" onclick="getSched1Modal();computeGrossEstateTotalA();computeGrossEstateTotalB();"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" class="printButtonClass" name="btnClearPop1" id="btnClearPop1" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSched1Modal()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!--<input type="button" class="printButtonClass" name="btnCancelPop1" id="btnCancelPop1" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched1Modal()" />-->
      </div>
            <br/>
      <br/>     
      
    </div>  
    
    <!--modal Sched1 (Family Home)-->
    <div id="modalSched1X" class="printSignFooterClass_1801" style="width:98%; display:none; min-height:400px;margin:auto;padding: 10px; position:relative; top:3%; right:auto; overflow-y:auto; background:#fff;" align="center"> 
      
            <br/>
            <br/>
      <table border="1" cellspacing="0" cellpadding="0" style="position: static" width="100%">
            <tr class="modalHeader"><td>DETAILS OF PROPERTY <br/>Schedule 1 - FAMILY HOME  </td></tr></table>
            
                <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%" id="tblSched1X">
                    <thead>
                        <!--<tr class="modalColumnHeader">
                            <td width="70%" colspan="8">&nbsp;</td>
              <td width='30%' align='center' colspan="2"><b>FMV whichever is higher</b></td>
                        </tr>-->            
                        <tr class="modalColumnHeader">
                            <td width="2%">&nbsp;</td>
              <td width="3%"><b>&nbsp;OCT/TCT <br>CCT No.</b></td>
                            <td width='10%' align='center' ><b>Tax Declaration No. <br>(TD)</b></td>
              <td width='15%' align='center' ><b> LOCATION </b></td>
              <td width='10%' align='center' ><b> CLASS </b></td>
              <td width='10%' align='center' ><b> AREA </b></td>
              <td width='10%' align='center' ><b>Zonal Value (ZV)<br> FMV per BIR</b></td>
                            <td width='10%' align='center' ><b>Fair Market Value <br>(FMV) per TD</b></td>
              <td width='15%' align='center' ><b>CONJUGAL</b></td>
                            <td width='15%' align='center' ><b>EXCLUSIVE</b></td>
                        </tr>
          </thead>
                    <tbody id="tbodyllistSched1X" class="text-center"><tr><td></td></tr></tbody>
                </table>

                <table  border="1" style="position: static;width: 100%" align="center" cellspacing="0" cellpadding="0">
                    <tr height="30" valign="middle">
            <td width="2%">&nbsp;</td>
            <td colspan="7" align="right" class="modalHeader">TOTAL&nbsp;&nbsp;</td>
                        <td width='15%' align="center"><input type="text" style="background-color:#dcdcdc; text-align: right" disabled id="frm1801:totalSch1XAmountConj" name="frm1801:totalSch1XAmountConj" size="15" value="0.00" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td width='15%' align="center"><input type="text" style="background-color:#dcdcdc; text-align: right" disabled id="frm1801:totalSch1XAmountExc" name="frm1801:totalSch1XAmountExc"  size="15" value="0.00" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                </table>
                <table  style="position: static;width: 100%" align="center" cellspacing="0" cellpadding="0">
                    <tr>
                        <td colspan="10" align="right"><input type='button' class="printButtonClass" id="btnAdd1" value='  Add  ' onclick="addlistSched1X()" />&nbsp;<input type='button' class="printButtonClass" id="btnDelete1" value='Delete' onclick="deletelistSched1X()" />&nbsp;</td>
                    </tr>
                </table>
            <br/><br/>
      <div align="center">
        <input type="button" class="printButtonClass" name="btnOkPop1" id="btnOkPop1" style="width:120px; height:30px;" value="OK" onclick="getSched1XModal();computeGrossEstateTotalA();computeGrossEstateTotalB();"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" class="printButtonClass" name="btnClearPop1" id="btnClearPop1" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSched1XModal()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!--<input type="button" class="printButtonClass" name="btnCancelPop1" id="btnCancelPop1" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched1XModal()" />-->
      </div>
            <br/>
      <br/>     
      
    </div>      
    
    <!-- modal Sched2and3  -->  
    
    <div id="modalSched2and3" class="printSignFooterClass_1801" style="width:98%; display:none; min-height:400px; position:relative; right:auto; margin: auto; overflow-y:auto; background:#fff;padding: 10px;" align="center"> 
      
            <br/>
            <br/>
      <table border="1" cellspacing="0" cellpadding="0" style="position: static" width="100%">
            <tr class="modalHeader"><td>PERSONAL PROPERTIES Schedule 2 - &nbsp;
                SHARES OF STOCKS   </td></tr></table>
            
                <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%" id="tblSched2">
                    <thead>
                        <tr class="modalColumnHeader">
                            <td width="70%" colspan="5">&nbsp;</td>
              <td width='30%' align='center' colspan="2"><b>Total Fair Market Value</b></td>
                        </tr>           
                        <tr class="modalColumnHeader">
                            <td width="5%">&nbsp;</td>
              <td width="25%"><b>&nbsp;Name of Corp.</b></td>
                            <td width='15%' align='center' ><b>Stock Cert. No.</b></td>
              <td width='10%' align='center' ><b>No. of <br> Shares</b></td>
              <td width='15%' align='center' ><b>Fair Market Value <br> per Share</b></td>
              <td width='15%' align='center' ><b>CONJUGAL</b></td>
                            <td width='15%' align='center' ><b>EXCLUSIVE</b></td>

                        </tr>
          </thead>
                    <tbody id="tbodyllistSched2" class="text-center"><tr><td></td></tr></tbody>
                </table>

                <table  border="1" style="position: static;width: 100%" align="center" cellspacing="0" cellpadding="0">
                    <tr height="30" valign="middle">
            <td width="5%">&nbsp;</td>
            <td colspan="4" align="right" class="modalHeader">TOTAL&nbsp;&nbsp;</td>
            <td width='15%' align="center"><input type="text" style="background-color:#dcdcdc; text-align: right" disabled id="frm1801:totalSch2AmountConj" name="frm1801:totalSch2AmountConj" size="18" value="0.00" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td width='15%' align="center"><input type="text" style="background-color:#dcdcdc; text-align: right" disabled id="frm1801:totalSch2AmountExc" name="frm1801:totalSch2AmountExc" size="18" value="0.00" />&nbsp;&nbsp;&nbsp;&nbsp;</td> 
                    </tr>

                </table>
                <table style="position: static;width: 100%" align="center" cellspacing="0" cellpadding="0">
                    <tr>
                        <td colspan="7" align="right"><input type='button' class="printButtonClass" id="btnAdd2" value='  Add  ' onclick="addlistSched2()" />&nbsp;<input type='button' class="printButtonClass" id="btnDelete2" value='Delete' onclick="deletelistSched2()" />&nbsp;</td>
                    </tr>
                </table>        
            <br/><br/>
      
            <br/>
      <br/>     
      
      
      
       <br/>
            <br/>
      <table border="1" cellspacing="0" cellpadding="0" style="position: static" width="100%">
            <tr class="modalHeader"><td>Schedule 3 - OTHER PERSONAL PROPERTIES  &nbsp;
                   </td></tr></table>
            
                <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%" id="tblSched3">
                    <thead>
                        <tr class="modalColumnHeader">
                            <td width="60%" colspan="2">&nbsp;</td>
              <td width='40%' align='center' colspan="2"><b>Fair Market Value</b></td>
                        </tr>           
                        <tr class="modalColumnHeader">
                            <td width="5%">&nbsp;</td>
              <td width="55%"><b>&nbsp;Particulars</b></td>
                            <td width='20%' align='center' ><b>Exclusive</b></td>
              <td width='20%' align='center' ><b>Conjugal/Communal</b></td>
                        </tr>
          </thead>
                    <tbody id="tbodyllistSched3" class="text-center"><tr><td></td></tr></tbody>
                </table>

                <table border="1" style="position: static;width: 100%" align="center" cellspacing="0" cellpadding="0">
                    <tr height="30" valign="middle">
            <td width="5%">&nbsp;</td>
            <td width="55%" align="right" class="modalHeader">TOTAL&nbsp;&nbsp;</td>
            <td width='20%' align="center"><input type="text" style="background-color:#dcdcdc; text-align: right" disabled id="frm1801:totalSch3AmountExc" name="frm1801:totalSch3AmountExc" size="20" value="0.00" /></td>
            <td width='20%' align="center"><input type="text" style="background-color:#dcdcdc; text-align: right" disabled id="frm1801:totalSch3AmountConj" name="frm1801:totalSch3AmountConj" size="20" value="0.00" /></td>  
          </tr>
                </table>
                <table style="position: static;width: 100%" align="center" cellspacing="0" cellpadding="0">
                    <tr>
            <td colspan="4" align="right"><input type='button' class="printButtonClass" id="btnAdd3" value='  Add  ' onclick="addlistSched3()" />&nbsp;<input type='button' class="printButtonClass" id="btnDelete3" value='Delete' onclick="deletelistSched3()" />&nbsp;</td>
                    </tr>
                </table>
            <br/><br/>
      <div align="center">
        <input type="button" class="printButtonClass" name="btnOkPop3" id="btnOkPop3" style="width:120px; height:30px;" value="OK" onclick="getSched2Modal();getSched3Modal();addsched2and3();computeGrossEstateTotalA();computeGrossEstateTotalB();"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" class="printButtonClass" name="btnClearPop3" id="btnClearPop3" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSched2Modal();clearSched3Modal()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!--<input type="button" class="printButtonClass" name="btnCancelPop3" id="btnCancelPop3" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched2Modal();cancelSched3Modal" />-->
            </div>
      <br/>
      <br/>
      
    </div>  
    
    
    <div id="modalSched4" class="printSignFooterClass_1801" style="width: 98%; display:none; min-height:400px; position:relative; top:3%;margin:auto;  right:auto; overflow-y:auto; background:#fff;" align="center"> 
         <br/>
            <br/>
      <table border="1" cellspacing="0" cellpadding="0" style="position: static" width="98%">
            <tr class="modalHeader"><td>Schedule 4 - TAXABLE TRANSFERS  &nbsp;
                   </td></tr></table>
            
                <table border="1" cellspacing="0" cellpadding="0" style="position: static" width="98%" id="tblSched4">
                    <thead>
                        <tr class="modalColumnHeader">
                            <td width="60%" colspan="2">&nbsp;</td>
              <td width='40%' align='center' colspan="2"><b>Fair Market Value</b></td>
                        </tr>           
                        <tr class="modalColumnHeader">
                            <td width="5%">&nbsp;</td>
              <td width="55%"><b>&nbsp;Particulars</b></td>
                            <td width='20%' align='center' ><b>Exclusive</b></td>
              <td width='20%' align='center' ><b>Conjugal/Communal</b></td>
                        </tr>
          </thead>
                    <tbody id="tbodyllistSched4" class="text-center"><tr><td></td></tr></tbody>
                </table>
  
                <table border="1" style="width: 98%" align="center" cellspacing="0" cellpadding="0">
                    <tr height="30" valign="middle">
            <td colspan='2' align="right" class="modalHeader" width="60%">TOTAL&nbsp;&nbsp;</td>
            <td width='20%'><input type="text" style="background-color:#dcdcdc; text-align: right" disabled id="frm1801:totalSch4AmountExc" name="frm1801:totalSch4AmountExc" size="20" value="0.00" /></td>
            <td width='20%'><input type="text" style="background-color:#dcdcdc; text-align: right" disabled id="frm1801:totalSch4AmountConj" name="frm1801:totalSch4AmountConj" size="20" value="0.00" /></td> 
          </tr>

                </table>
                <table border="1" style="width: 98%" align="center" cellspacing="0" cellpadding="0">
                    <tr>
            <td colspan="4" align="right"><input type='button' class="printButtonClass" id="btnAdd4" value='  Add  ' onclick="addlistSched4()" />&nbsp;<input type='button' class="printButtonClass" id="btnDelete3" value='Delete' onclick="deletelistSched4()" />&nbsp;</td>
                    </tr>
                </table>
            <br/><br/>
      <div align="center">
        <input type="button" class="printButtonClass" name="btnOkPop4" id="btnOkPop4" style="width:120px; height:30px;" value="OK" onclick="getSched4Modal();computeGrossEstateTotalA();computeGrossEstateTotalB();"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" class="printButtonClass" name="btnClearPop4" id="btnClearPop4" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSched4Modal()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!--<input type="button" class="printButtonClass" name="btnCancelPop4" id="btnCancelPop4" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched4Modal()" />-->
      </div>
            <br/>
      <br/>
      
    </div>  
        
        

        <!-- Modal Sched 5 -->
        <div id="modalSched5" class="printSignFooterClass_1801 aBox1801Sched5" style="width: 98%; display:none; min-height:400px; position:relative; top:3%; margin:auto; right:auto; overflow-y:auto; background:#fff;" align="center">
            <br /><br />
            <table border="1" cellspacing="0" cellpadding="0" style="position: static" width="100%">
                <tr>
                    <td>
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td class="modalHeader">&nbsp;&nbsp;&nbsp;Schedule 5 - DEDUCTIONS</td>
                            </tr>
                        </table>
                    </td>
                </tr>
        <table border="1" width="100%" cellspacing="0" cellpadding="0">
        <tr class="modalColumnHeader">
                    <td><div align="center">&nbsp;</div></td> <!--Particulars-->
          <td><div align="center">EXCLUSIVE</div></td>
          <td><div align="center">CONJUGAL/COMMUNAL</div></td>
        </tr>
        <tr>
          <td class="modalContent"
            ><div align="left" style="font-size: 11px;">&nbsp;&nbsp;Actual Funeral Expenses or 5% of gross estate whichever is lower but not to exceed P200,000.00</div></td>
          <td  align="center"><input  id="frm1801:txtSc5Conjugal1" name="frm1801:txtSc5Conjugal1"  maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5()" onkeypress="return numbersonly(this, event)" /></td>
          <td  align="center"><input  id="frm1801:txtSc5Exclusive1" name="frm1801:txtSc5Exclusive1" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5conjugal()" onkeypress="return numbersonly(this, event)" /></td>
        </tr>
        <tr>
          <td class="modalContent"
            ><div align="left" style="font-size: 11px;">&nbsp;&nbsp;Judicial Expenses of the Testamentary or Intestate Proceedings/Administration Expenses</div></td>
          <td  align="center"><input  id="frm1801:txtSc5Conjugal2" name="frm1801:txtSc5Conjugal2" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5()" onkeypress="return numbersonly(this, event)" /></td>
          <td  align="center"><input  id="frm1801:txtSc5Exclusive2" name="frm1801:txtSc5Exclusive2" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5conjugal()" onkeypress="return numbersonly(this, event)" /></td>
        </tr>
        <tr>
          <td class="modalContent"
            ><div align="left" style="font-size: 11px;">&nbsp;&nbsp;Claims against the Estate</div></td>
          <td  align="center"><input  id="frm1801:txtSc5Conjugal3" name="frm1801:txtSc5Conjugal3" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5()" onkeypress="return numbersonly(this, event)" /></td>
          <td  align="center"><input  id="frm1801:txtSc5Exclusive3" name="frm1801:txtSc5Exclusive3" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5conjugal()" onkeypress="return numbersonly(this, event)" /></td>
        </tr>
        <tr>
          <td class="modalContent"
            ><div align="left" style="font-size: 11px;">&nbsp;&nbsp;Claims against Insolvent Persons</div></td>
          <td  align="center"><input  id="frm1801:txtSc5Conjugal4" name="frm1801:txtSc5Conjugal4" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5()" onkeypress="return numbersonly(this, event)" /></td>
          <td  align="center"><input  id="frm1801:txtSc5Exclusive4" name="frm1801:txtSc5Exclusive4" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5conjugal()" onkeypress="return numbersonly(this, event)" /></td>
        </tr>
        <tr>
          <td class="modalContent"
            ><div align="left" style="font-size: 11px;">&nbsp;&nbsp;Unpaid Mortgages</div></td>
          <td  align="center"><input  id="frm1801:txtSc5Conjugal5" name="frm1801:txtSc5Conjugal5" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5()" onkeypress="return numbersonly(this, event)" /></td>
          <td  align="center"><input  id="frm1801:txtSc5Exclusive5" name="frm1801:txtSc5Exclusive5" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5conjugal()" onkeypress="return numbersonly(this, event)" /></td>
        </tr>
        <tr>
          <td class="modalContent"
            ><div align="left" style="font-size: 11px;">&nbsp;&nbsp;Property Previously Taxed (Vanishing Deduction)</div></td>
          <td  align="center"><input  id="frm1801:txtSc5Conjugal6" name="frm1801:txtSc5Conjugal6" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5()" onkeypress="return numbersonly(this, event)" /></td>
          <td  align="center"><input  id="frm1801:txtSc5Exclusive6" name="frm1801:txtSc5Exclusive6" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5conjugal()" onkeypress="return numbersonly(this, event)" /></td>
        </tr>
        <tr>
          <td class="modalContent"
            ><div align="left" style="font-size: 11px;">&nbsp;&nbsp;Transfers for Public Use</div></td>
          <td  align="center"><input  id="frm1801:txtSc5Conjugal7" name="frm1801:txtSc5Conjugal7" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5()" onkeypress="return numbersonly(this, event)" /></td>
          <td  align="center"><input  id="frm1801:txtSc5Exclusive7" name="frm1801:txtSc5Exclusive7" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5conjugal()" onkeypress="return numbersonly(this, event)" /></td>
        </tr>
        <tr>
          <td class="modalContent" style="font-size: 11px;"><div align="left">&nbsp;&nbsp;Others (specify) &nbsp;&nbsp;&nbsp;<input  id="frm1801:txtSc5Desc8" name="frm1801:txtSc5Desc8" maxlength='50'  size="40" style="font-family: Arial, Helvetica, sans-serif;" type="text"/></div></td>
          <td  align="center"><input  id="frm1801:txtSc5Conjugal8" name="frm1801:txtSc5Conjugal8" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5()" onkeypress="return numbersonly(this, event)" /></td>
          <td  align="center"><input  id="frm1801:txtSc5Exclusive8" name="frm1801:txtSc5Exclusive8" maxlength='17'   size="18" style="text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" onblur="round(this,2); computesched5conjugal()" onkeypress="return numbersonly(this, event)" /></td>
        </tr>
        <tr height="30" valign="middle">
          <td  align="right" class="modalHeader" style="font-size: 11px;">TOTAL&nbsp;&nbsp;</td>
          <td  align="center"><input  id="frm1801:txtSc5TotalConjugal" name="frm1801:txtSc5TotalConjugal" maxlength='25'   size="18" style="background-color:#dcdcdc; text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" disabled /></td>
          <td  align="center"><input  id="frm1801:txtSc5TotalExclusive" name="frm1801:txtSc5TotalExclusive" maxlength='25'   size="18" style="background-color:#dcdcdc; text-align: right; font-family: Arial, Helvetica, sans-serif;" type="text" value="0.00" disabled /></td>
        </tr>
      </table>
      </table>
            <br/><br/>
            <input type="button" class="printButtonClass" name="frm1801:Sched5btnOk" id="frm1801:Sched5btnOk" style="width:120px; height:30px;" value="OK" onclick="getSched5Modal()"  />
            <br/><br/>
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
  
  var fileName = "";
  var existingXMLFileName = "";
  var gIsReadOnly = false; 
  var fileNameToExport = "";

    var str;
  var d=document,XMLBGFile='',data='',XMLFile='',msg = d.getElementById('msg'),flag1=true,flag1X=true,flag23=true,flag4;

  var isModalTurnOn = false;
    
  var sched1 = new Array();
  var sched1ToCommit = new Array(); 
  var tempRowSizeSched1 = 0;
  var temptxtOCTSched1 = new Array();
    var temptxtSched1TaxDeclaration = new Array();
  var temptxtSched1Location = new Array();
    var temptxtClass = new Array();
  var temptxtArea = new Array();
    var temptxtZV = new Array();
  var temptxtFMV = new Array();
    var temptxtFMVConjugal = new Array();
  var temptxtFMVExclusive = new Array();
  
  var sched1X = new Array();
  var sched1XToCommit = new Array();  
  var tempRowSizeSched1X = 0;
  var temptxtOCTSched1X = new Array();
    var temptxtSched1XTaxDeclaration = new Array();
  var temptxtSched1XLocation = new Array();
    var temptxtClassX = new Array();
  var temptxtAreaX = new Array();
    var temptxtZVX = new Array();
  var temptxtFMVX = new Array();
    var temptxtFMVConjugalX = new Array();
  var temptxtFMVExclusiveX = new Array(); 
  
  
  var sched2ToCommit = new Array();
  var isModalTurnOn = false;
    
  var sched2 = new Array();
  var sched2ToCommit = new Array(); 
  var tempRowSizeSched2 = 0;
  var temptxtNameCorp = new Array();
    var temptxtStockCert = new Array();
  var temptxtShares = new Array();
    var temptxtFMVS = new Array();
    var temptxtFMVConjugal2 = new Array();
  var temptxtFMVExclusive2 = new Array();
  
  
  var sched3ToCommit = new Array();
  var isModalTurnOn = false;
    
  var sched3 = new Array();
  var sched3ToCommit = new Array(); 
  var tempRowSizeSched3 = 0;
  var temptxtParticulars = new Array();
    var temptxtFMVConjugal3 = new Array();
  var temptxtFMVExclusive3 = new Array();
  
  
  var sched4ToCommit = new Array();
  var isModalTurnOn = false;
    
  var sched4 = new Array();
  var sched4ToCommit = new Array(); 
  var tempRowSizeSched4 = 0;
  var temptxtParticulars4 = new Array();
    var temptxtFMVConjugal4 = new Array();
  var temptxtFMVExclusive4 = new Array();
  
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
  
  str = setInterval("sleeptime()", 1000); 
  function sleeptime()
    {
        clearInterval(str);
        init();
        
        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
          loadXML(fileName); 

          d.getElementById('frm1801:txtDateMonth').disabled = true;
          d.getElementById('frm1801:txtDateYear').disabled = true;
          d.getElementById('frm1801:txtDateDay').disabled = true;
          
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
        d.getElementById('frm1801:txtTIN1').disabled = true;
        d.getElementById('frm1801:txtTIN2').disabled = true;
        d.getElementById('frm1801:txtTIN3').disabled = true;
        d.getElementById('frm1801:txtBranchCode').disabled = true;
        
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
      d.getElementById('frm1801:txtDateMonth').value = mm;
    }
    else
    {
      d.getElementById('frm1801:txtDateMonth').value = year.getMonth() +1;
    }
    d.getElementById('frm1801:txtDateYear').value = year.getFullYear();
    dd = "" + year.getDate();
    if (dd.length == 1) 
    { 
      dd = "0" + dd; 
      d.getElementById('frm1801:txtDateDay').value = dd;
    }
    else
    {
      d.getElementById('frm1801:txtDateDay').value = year.getDate();
    }
    @if($action != 'view')
    d.getElementById('btnPrint').disabled = true;
    d.getElementById('frm1801:cmdEdit').disabled = true;
    d.getElementById('frm1801:btnFinalCopy').disabled = true;
    d.getElementById('btnUpload').disabled = true;
    @endif
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
        document.getElementById("response").innerHTML=xmlHTTP.responseText;                       
        
        if (loadWhere != null && loadWhere != "") {
        loadData(); /*This will load data onto fields*/ 
        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
        gIsReadOnly = true;
        }
      
        if (gIsReadOnly) {
          d.getElementById('frm1801:cmdValidate').disabled = true;
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
        
        /*------------- modalSched1X -----------*/
        flag1X=false;
        var count1X=0;
        var responses1X = d.getElementById('response').getElementsByTagName('div');
        var sPar1X = 'chxSched1X';    
        
        do {
          if (responses1X.item(count1X).innerHTML.indexOf(sPar1X) != -1) {
            var temp = String(responses1X.item(count1X).innerHTML);
            temp = temp.substring(0,sPar1X.length+1); //substring to length of search param for index - check files
            temp = temp.substring(sPar1X.length,sPar1X.length+1); //get the last character for checking
            if ( !isNaN(temp) ) addlistSched1XReload(); //if last char is a number, add modal section
          } count1X++;
        } while (count1X!=responses1X.length);
        window.setTimeout("loadData();getSched1XModal();flag1X=true;",510); 
        /*--------------------------------------------------------------------------------------*/          

        /*------------- modalSched 2 and 3 (2550m as reference) -----------*/
        flag23=false;
        var count23=0;
        var responses23 = d.getElementById('response').getElementsByTagName('div');
        var sPar23 = 'chxSched2';             
        do {
          if (responses23.item(count23).innerHTML.indexOf(sPar23) != -1) {
            var temp = String(responses23.item(count23).innerHTML);
            temp = temp.substring(0,sPar23.length+1); //substring to length of search param for index - check files
            temp = temp.substring(sPar23.length,sPar23.length+1); //get the last character for checking
            if ( !isNaN(temp) ) addlistSched2Reload(); //if last char is a number, add modal section
          } count23++;
        } while (count23!=responses23.length);
        
        flag32=false;
        var count32=0;
        var responses32 = d.getElementById('response').getElementsByTagName('div');
        var sPar32 = 'chxSched3';             
        do {
          if (responses32.item(count32).innerHTML.indexOf(sPar32) != -1) {
            var temp = String(responses32.item(count32).innerHTML);
            temp = temp.substring(0,sPar32.length+1); //substring to length of search param for index - check files
            temp = temp.substring(sPar32.length,sPar32.length+1); //get the last character for checking
            if ( !isNaN(temp) ) addlistSched3Reload(); //if last char is a number, add modal section
          } count32++;
        } while (count32!=responses32.length);        
        
        window.setTimeout("loadData();getSched2Modal();getSched3Modal();flag23=true;flag32=true;",510);         
        /*-----------------------------------------------------------------*/ 
        
        /*------------- modalSched4 -----------*/
        flag4=false;
        var count=0;
        var responses = d.getElementById('response').getElementsByTagName('div');
        var sPar = 'chxSched4';     
        
        do {
          if (responses.item(count).innerHTML.indexOf(sPar) != -1) {
            var temp = String(responses.item(count).innerHTML);
            temp = temp.substring(0,sPar.length+1); //substring to length of search param for index - check files
            temp = temp.substring(sPar.length,sPar.length+1); //get the last character for checking
            if ( !isNaN(temp) ) addlistSched4Reload(); //if last char is a number, add modal section
          } count++;
        } while (count!=responses.length);
        window.setTimeout("loadData();getSched4Modal();flag4=true;",510); 
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
          if(elem[i].id == 'frm1801:txtTaxpayer' || elem[i].id == 'frm1801:txtResidence' || elem[i].id == 'frm1801:txtExecutor' 
          || elem[i].id == 'frm1801:txtAddress' || elem[i].id == 'frm1801:txtRAddress'){
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
            if (elem[i].id == 'frm1801:optTreaty:_1' || elem[i].id == 'frm1801:optTreaty:_2') {
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
   
  }
  
  function isItAnAmendedReturn(xmlFile) { 
    if(d.getElementById('frm1801:amendedRtn_1').checked) {
      return true;
    } else {
      return false;
    }   
  }
  
  function validate()
    {
    var taxpayer = d.getElementById('frm1801:txtTIN1').value + d.getElementById('frm1801:txtTIN2').value + d.getElementById('frm1801:txtTIN3').value + d.getElementById('frm1801:txtBranchCode').value;
    var executor = d.getElementById('frm1801:txtTINE1').value + d.getElementById('frm1801:txtTINE2').value + d.getElementById('frm1801:txtTINE3').value + d.getElementById('frm1801:txtBranchCodeE').value;
    
    var dt = new Date();
    var isLeap = new Date(document.getElementById('frm1801:txtDateYear').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm1801:txtDateMonth').value==2 && document.getElementById('frm1801:txtDateDay').value==29) {
      alert("Filing year is not a leap year.");
      return;
    }
    if (!isLeap && document.getElementById('frm1801:txtDateMonth').value==2 && document.getElementById('frm1801:txtDateDay').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    if (isLeap && document.getElementById('frm1801:txtDateMonth').value==2 && document.getElementById('frm1801:txtDateDay').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    
    
        if( document.getElementById('frm1801:txtDateMonth').value*1 > 12   )
        {
            alert("Invalid month entry on Item no.1. Please enter a valid month.")
            return;
        }
        if( (document.getElementById('frm1801:txtDateMonth').value == "")  )
        {
            alert("Please enter a valid month on Item 1.");
            return;
        }
      if(document.getElementById('frm1801:txtDateMonth').value.length == 1 || document.getElementById('frm1801:txtDateDay').value.length == 1)
      {
        alert("Please enter a valid day/month on item 1. Format should be MM/DD/YYYY.")
              return;
      }
      if( (document.getElementById('frm1801:txtDateDay').value == "")  )
          {
              alert("Please enter a valid day on Item 1.");
              return;
          }
      if( (document.getElementById('frm1801:txtDateYear').value == "")  )
        {
            alert("Please enter a valid year on Item 1.");
            return;
        }
    
    
    if(document.getElementById('frm1801:txtDateDay').value < 1){
            alert("Please enter a valid day in Item 1.");
            return;
        }
    
    
    //Check if valid date - Benjie Manalaysay 11/5/2013
    var month31 = (['01', '03', '05', '07', '08', '10', '12']);
    var month30 = (['04', '06', '09', '11']);
    var month = document.getElementById('frm1801:txtDateMonth').value
    if (month31.contains(month) && document.getElementById('frm1801:txtDateDay').value > 31)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    else if (month30.contains(month) && document.getElementById('frm1801:txtDateDay').value > 30)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
        
        if( document.getElementById('frm1801:txtDateYear').value*1 < 1904   )
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1904.")
            return;
        }
  
        
    if( (document.getElementById('frm1801:txtTIN1').value == "")  )
    {
      alert("Please enter the Taxpayer's TIN.")
      return;
    }
    if( (document.getElementById('frm1801:txtTIN2').value == "")  )
    {
      alert("Please enter the Taxpayer's TIN.")
      return;
    }
    if( (document.getElementById('frm1801:txtTIN3').value == "")  )
    {
      alert("Please enter the Taxpayer's TIN.")
      return;
    }
    if( (document.getElementById('frm1801:txtBranchCode').value == "")  )
    {
      alert("Please enter the Taxpayer's TIN.")
      return;
    }
    if( (document.getElementById('frm1801:txtTINE1').value == "")  )
    {
      alert("Please enter the TIN of the Executor/Administrator.")
      return;
    }
    if( (document.getElementById('frm1801:txtTINE2').value == "")  )
    {
      alert("Please enter the TIN of the Executor/Administrator.")
      return;
    }
    if( (document.getElementById('frm1801:txtTINE3').value == "")  )
    {
      alert("Please enter the TIN of the Executor/Administrator.")
      return;
    }
    if( (document.getElementById('frm1801:txtBranchCodeE').value == "")  )
    {
      alert("Please enter the TIN of the Executor/Administrator.")
      return;
    }
    if(taxpayer.localeCompare(executor) == 0)
    {
      alert("TIN for Taxpayer and Executor/Administrator should be different.")
      return;
    }
    if( (document.getElementById('frm1801:txtTaxpayer').value == "")  )
    {
      alert("Please enter the Taxpayer's Name.")
      return;
    }
    if( (document.getElementById('frm1801:txtExecutor').value == "")  )
    {
      alert("Please enter the Executor's Name.")
      return;
    }
    
    if( (document.getElementById('frm1801:txtZip').value == "")  )
    {
      alert("Please enter Zip Code on item 12.")
      return;
    }
    
    if( (document.getElementById('frm1801:txtTelephone').value == "")  )
    {
      alert("Please enter Zip Code on item 13.")
      return;
    }
    
    if( (document.getElementById('frm1801:txtRAddress').value == "")  )
    {
      alert("Please enter the Address of the Executor.")
      return;
    }
    
      
    if( document.getElementById('frm1801:optTreaty:_1').checked == false && document.getElementById('frm1801:optTreaty:_2').checked == false)
        {
            alert("Please select an option for Item 15.");
            return;
        }
        if(d.getElementById('frm1801:optTreaty:_1').checked == true )
        {
            if(d.getElementById('frm1801:lstTaxTreaty').value == 0)
            {
                alert("Invalid entry on Item No.15A. Please specify a treaty."); 
                return;
            }
        }   
    if(NumWithComma(document.getElementById('frm1801:txt26').value) > 500000)
    {
      alert("Medical expenses should not exceed P500, 000.00")
      return;
    }
    if(document.getElementById('frm1801:txtOthers27a').value != "" && document.getElementById('frm1801:txt27A').value == 0)
    {
      alert("Please fill up item 27A.");
      return;
    }
    
    if(document.getElementById('frm1801:txtOthers27a').value == "" && document.getElementById('frm1801:txt27A').value != 0)
    {
      alert("Please fill up item 27 Others(specify) 1st row.");
      return;
    }
    
    if(document.getElementById('frm1801:txtOthers27b').value != "" && document.getElementById('frm1801:txt27B').value == 0)
    {
      alert("Please fill up item 27B.");
      return;
    }
    
    if(document.getElementById('frm1801:txtOthers27b').value == "" && document.getElementById('frm1801:txt27B').value != 0)
    {
      alert("Please fill up item 27 Others(specify) 2nd row.");
      return;
    }
                      
        // all forms validate with entry

        document.getElementById('frm1801:cmdValidate').disabled = true;
        document.getElementById('frm1801:cmdEdit').disabled = false;
        //document.getElementById('btnSave').disabled = false;

        disableAllControl();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
    return;
    }
  
  var disableElem = true;
  var enableElem = false;
  function disableAllControl()
  {
    
    document.getElementById('btnSched1').disabled = true;
    document.getElementById('btnSched2and3').disabled = true;
    document.getElementById('btnSched1b').disabled = true;
    document.getElementById('btnSched4').disabled = true;
    document.getElementById('btnSched5').disabled = true;
  
      var elem = document.getElementById('frmMain').elements;
      for(var i = 0; i < elem.length; i++)
      {
        if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&   
        
        
          var elemId = elem[i].id;
          document.getElementById(elemId).disabled = true;          
            
          
        }
      }     
        document.getElementById('frm1801:cmdValidate').disabled = true;
        document.getElementById('frm1801:cmdEdit').disabled = false;  
        d.getElementById('frm1801:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;
        document.getElementById('btnSave').disabled = false;    
        document.getElementById('btnPrint').disabled = false;    
    disableElem;
    enableElem;
  }
  
  function AllControlDisabled()
  {
    
    document.getElementById('btnSched1').disabled = false;
    document.getElementById('btnSched2and3').disabled = false;
    document.getElementById('btnSched1b').disabled = false;
    document.getElementById('btnSched4').disabled = false;
    document.getElementById('btnSched5').disabled = false;
    
    

      var elem = document.getElementById('frmMain').elements;
      for(var i = 0; i < elem.length; i++)
      {
        if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&   
        
          if (elem[i].id == "frm1801:txt4" || elem[i].id == "frm1801:txt17A" || elem[i].id == "frm1801:txt17B" || elem[i].id == "frm1801:txt17C"
             || elem[i].id == "frm1801:txt18A" || elem[i].id == "frm1801:txt18B" || elem[i].id == "frm1801:txt18C"
             || elem[i].id == "frm1801:txt19A" || elem[i].id == "frm1801:txt19B" || elem[i].id == "frm1801:txt19C"
             || elem[i].id == "frm1801:txt20A" || elem[i].id == "frm1801:txt20B" || elem[i].id == "frm1801:txt20C"
             || elem[i].id == "frm1801:txt21A" || elem[i].id == "frm1801:txt21B" || elem[i].id == "frm1801:txt21C"
             || elem[i].id == "frm1801:txt22A" || elem[i].id == "frm1801:txt22B" || elem[i].id == "frm1801:txt22C"
             || elem[i].id == "frm1801:txt23A" || elem[i].id == "frm1801:txt23B" || elem[i].id == "frm1801:txt23C"
             || elem[i].id == "frm1801:txt24A" || elem[i].id == "frm1801:txt24B" || elem[i].id == "frm1801:txt24C"
             || elem[i].id == "frm1801:txt28" || elem[i].id == "frm1801:txt30" || elem[i].id == "frm1801:txt31"
             || elem[i].id == "frm1801:txt32B" || elem[i].id == "frm1801:txt32C" || elem[i].id == "frm1801:txt35"
             || elem[i].id == "frm1801:txt33" || elem[i].id == "frm1801:txtTotalPenalties"
             || elem[i].id == "frm1801:totalSch1AmountConj" || elem[i].id == "frm1801:totalSch1AmountExc"
             || elem[i].id == "frm1801:totalSch1XAmountConj" || elem[i].id == "frm1801:totalSch1XAmountExc"
             || elem[i].id == "frm1801:totalSch2AmountConj" || elem[i].id == "frm1801:totalSch2AmountExc"
             || elem[i].id == "frm1801:totalSch3AmountExc" || elem[i].id == "frm1801:totalSch3AmountConj"
             || elem[i].id == "frm1801:totalSch4AmountExc" || elem[i].id == "frm1801:totalSch4AmountConj"
             || elem[i].id == "frm1801:txtSc5TotalConjugal" || elem[i].id == "frm1801:txtSc5TotalExclusive"
             //|| elem[i].id == "frm1801:txtSurcharge" || elem[i].id == "frm1801:txtCompromise" || elem[i].id == "frm1801:txtInterest" || elem[i].id == "frm1801:txtTotalPenalties"
          ) {
            var elemId = elem[i].id;
            document.getElementById(elemId).disabled = true;          
          } else {
            var elemId = elem[i].id;
            document.getElementById(elemId).disabled = false;             
          }
        }
      }   
      
    enableDisable32BonEdit(); 
    enableDisable15AonEdit(); 
    
    document.getElementById('frm1801:cmdValidate').disabled = false;
    document.getElementById('frm1801:cmdEdit').disabled = true;
    d.getElementById('frm1801:btnFinalCopy').disabled = true;
    d.getElementById('btnUpload').disabled = true;
    document.getElementById('btnSave').disabled = false;    
    document.getElementById('btnPrint').disabled = true;  
    if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
      d.getElementById('frm1801:txtDateMonth').disabled = true;
      d.getElementById('frm1801:txtDateYear').disabled = true;
      d.getElementById('frm1801:txtDateDay').disabled = true; 
    }
    disableElem;
    enableElem;
    d.getElementById('frm1801:txtTIN1').disabled = true;
      d.getElementById('frm1801:txtTIN2').disabled = true;
    d.getElementById('frm1801:txtTIN3').disabled = true;
    d.getElementById('frm1801:txtBranchCode').disabled = true;  
  }
  
  function enableDisable15AonEdit() 
  {
    if (d.getElementById('frm1801:optTreaty:_1').checked == true)
    {
      d.getElementById('frm1801:lstTaxTreaty').disabled = false;
      d.getElementById('frm1801:lstTaxTreaty').style.backgroundColor = "#ffffff";
    }
    else if (d.getElementById('frm1801:optTreaty:_2').checked == true)
    {
      d.getElementById('frm1801:lstTaxTreaty').disabled = true;
      d.getElementById('frm1801:lstTaxTreaty').selectedIndex = 0; 
      d.getElementById('frm1801:lstTaxTreaty').style.backgroundColor = "#e2e2e2";
    }

  } 
  
  function enableDisable32BonEdit() 
  {
    if (d.getElementById('frm1801:amendedRtn_1').checked == true)
    {
      d.getElementById('frm1801:txt32B').disabled = false;
    }
    else if (d.getElementById('frm1801:amendedRtn_2').checked == true)
    {
      d.getElementById('frm1801:txt32B').disabled = true;
      d.getElementById('frm1801:txt32B').value = 0.00;
    }

  }
  
  function enableSelTreaty()
    {
            document.getElementById('frm1801:lstTaxTreaty').disabled = false;
            document.getElementById('frm1801:lstTaxTreaty').selectedIndex = 0;      
      document.getElementById('frm1801:lstTaxTreaty').style.backgroundColor = "#ffffff";
    }

    function disableSelTreaty()
    {
        document.getElementById('frm1801:lstTaxTreaty').disabled = true;
        document.getElementById('frm1801:lstTaxTreaty').selectedIndex = 0;
    document.getElementById('frm1801:lstTaxTreaty').style.backgroundColor = "#e2e2e2";
    }
  
  function computeTotalPenalties()
  {
    var tax34a = (NumWithComma(d.getElementById('frm1801:txtSurcharge').value)*1);
        var tax34b = (NumWithComma(d.getElementById('frm1801:txtInterest').value)*1);
        var tax34c = (NumWithComma(d.getElementById('frm1801:txtCompromise').value)*1);
        document.getElementById('frm1801:txtTotalPenalties').value =   formatCurrency(tax34a  + tax34b + tax34c);
    compute35();
  }
  
  function compute32C()
  {
    var tax32A = (NumWithComma(d.getElementById('frm1801:txt32A').value)*1);
        var tax32B = (NumWithComma(d.getElementById('frm1801:txt32B').value)*1);
        document.getElementById('frm1801:txt32C').value =  formatCurrency(tax32A  + tax32B)
    compute33();
  }
  
  function compute33()
  {
    var tax31 = (NumWithComma(d.getElementById('frm1801:txt31').value)*1);
        var tax32C = (NumWithComma(d.getElementById('frm1801:txt32C').value)*1);
        document.getElementById('frm1801:txt33').value =  formatCurrency(tax31  - tax32C);
    compute35();
  }
  
  function compute35()
  {
    var tax33 = (NumWithComma(d.getElementById('frm1801:txt33').value)*1);
    var tax34D = (NumWithComma(d.getElementById('frm1801:txtTotalPenalties').value)*1);
    document.getElementById('frm1801:txt35').value = formatCurrency(tax33 + tax34D);
    //document.getElementById('frm1801:txt35').value = formatCurrency(tax33);
    capital();
  }
  
  function computesched5()
  {
    var exclusive1 = (NumWithComma(d.getElementById('frm1801:txtSc5Conjugal1').value)*1);
    var exclusive2 = (NumWithComma(d.getElementById('frm1801:txtSc5Conjugal2').value)*1);
    var exclusive3 = (NumWithComma(d.getElementById('frm1801:txtSc5Conjugal3').value)*1);
    var exclusive4 = (NumWithComma(d.getElementById('frm1801:txtSc5Conjugal4').value)*1);
    var exclusive5 = (NumWithComma(d.getElementById('frm1801:txtSc5Conjugal5').value)*1);
    var exclusive6 = (NumWithComma(d.getElementById('frm1801:txtSc5Conjugal6').value)*1);
    var exclusive7 = (NumWithComma(d.getElementById('frm1801:txtSc5Conjugal7').value)*1);
    var exclusive8 = (NumWithComma(d.getElementById('frm1801:txtSc5Conjugal8').value)*1);
    d.getElementById('frm1801:txtSc5TotalConjugal').value = formatCurrency(exclusive1 + exclusive2 + exclusive3 + exclusive4 + exclusive5 + exclusive6 + exclusive7 + exclusive8);
    d.getElementById('frm1801:txt22A').value = d.getElementById('frm1801:txtSc5TotalConjugal').value
  }

  function computesched5conjugal()
  {
    var conjugal1 = (NumWithComma(d.getElementById('frm1801:txtSc5Exclusive1').value)*1);
    var conjugal2 = (NumWithComma(d.getElementById('frm1801:txtSc5Exclusive2').value)*1);
    var conjugal3 = (NumWithComma(d.getElementById('frm1801:txtSc5Exclusive3').value)*1);
    var conjugal4 = (NumWithComma(d.getElementById('frm1801:txtSc5Exclusive4').value)*1);
    var conjugal5 = (NumWithComma(d.getElementById('frm1801:txtSc5Exclusive5').value)*1);
    var conjugal6 = (NumWithComma(d.getElementById('frm1801:txtSc5Exclusive6').value)*1);
    var conjugal7 = (NumWithComma(d.getElementById('frm1801:txtSc5Exclusive7').value)*1);
    var conjugal8 = (NumWithComma(d.getElementById('frm1801:txtSc5Exclusive8').value)*1);
    d.getElementById('frm1801:txtSc5TotalExclusive').value = formatCurrency(conjugal1 + conjugal2 + conjugal3 + conjugal4 + conjugal5 + conjugal6 + conjugal7 + conjugal8);
    d.getElementById('frm1801:txt22B').value = d.getElementById('frm1801:txtSc5TotalExclusive').value
  } 
  
  function compute17c()
  {
    var tax17a = (NumWithComma(d.getElementById('frm1801:txt17A').value)*1);
    var tax17b = (NumWithComma(d.getElementById('frm1801:txt17B').value)*1);
    d.getElementById('frm1801:txt17C').value = formatCurrency(tax17a + tax17b);
  }
  
  function compute18c()
  {
    var tax18a = (NumWithComma(d.getElementById('frm1801:txt18A').value)*1);
    var tax18b = (NumWithComma(d.getElementById('frm1801:txt18B').value)*1);
    d.getElementById('frm1801:txt18C').value = formatCurrency(tax18a + tax18b);
  }
  
  function compute19c()
  {
    var tax19a = (NumWithComma(d.getElementById('frm1801:txt19A').value)*1);
    var tax19b = (NumWithComma(d.getElementById('frm1801:txt19B').value)*1);
    d.getElementById('frm1801:txt19C').value = formatCurrency(tax19a + tax19b);
  }
  
  function compute20c()
  {
    var tax20a = (NumWithComma(d.getElementById('frm1801:txt20A').value)*1);
    var tax20b = (NumWithComma(d.getElementById('frm1801:txt20B').value)*1);
    d.getElementById('frm1801:txt20C').value = formatCurrency(tax20a + tax20b);
  }
  
  function computeGrossEstateTotalA() {

    var txt17A = (NumWithComma(d.getElementById('frm1801:txt17A').value)*1);
    var txt18A = (NumWithComma(d.getElementById('frm1801:txt18A').value)*1);
    var txt19A = (NumWithComma(d.getElementById('frm1801:txt19A').value)*1);
    var txt20A = (NumWithComma(d.getElementById('frm1801:txt20A').value)*1);
    d.getElementById('frm1801:txt21A').value = formatCurrency(txt17A + txt18A + txt19A + txt20A);
    
    compute21c();
  }
  function computeGrossEstateTotalB() {

    var txt17B = (NumWithComma(d.getElementById('frm1801:txt17B').value)*1);
    var txt18B = (NumWithComma(d.getElementById('frm1801:txt18B').value)*1);
    var txt19B = (NumWithComma(d.getElementById('frm1801:txt19B').value)*1);
    var txt20B = (NumWithComma(d.getElementById('frm1801:txt20B').value)*1);
    d.getElementById('frm1801:txt21B').value = formatCurrency(txt17B + txt18B + txt19B + txt20B);
    
    compute21c();
  } 
  
  function compute21c()
  {
    var tax21a = (NumWithComma(d.getElementById('frm1801:txt21A').value)*1);
    var tax21b = (NumWithComma(d.getElementById('frm1801:txt21B').value)*1);
    d.getElementById('frm1801:txt21C').value = formatCurrency(tax21a + tax21b);
    
    compute22c();
    compute23a();
    compute23b(); 
    compute23c(); 
  }
  
  function compute22c()
  {
    var tax22a = (NumWithComma(d.getElementById('frm1801:txt22A').value)*1);
    var tax22b = (NumWithComma(d.getElementById('frm1801:txt22B').value)*1);
    d.getElementById('frm1801:txt22C').value = formatCurrency(tax22a + tax22b);
  }
  
  function compute23a()
  {
    var tax21a = (NumWithComma(d.getElementById('frm1801:txt21A').value)*1);
    var tax22a = (NumWithComma(d.getElementById('frm1801:txt22A').value)*1);
    d.getElementById('frm1801:txt23A').value = formatCurrency(tax21a - tax22a);
  }
  
  function compute23b()
  {
    var tax21b = (NumWithComma(d.getElementById('frm1801:txt21B').value)*1);
    var tax22b = (NumWithComma(d.getElementById('frm1801:txt22B').value)*1);
    d.getElementById('frm1801:txt23B').value = formatCurrency(tax21b - tax22b);
  }
  
  function compute23c()
  {
    var tax23a = (NumWithComma(d.getElementById('frm1801:txt23A').value)*1);
    var tax23b = (NumWithComma(d.getElementById('frm1801:txt23B').value)*1);
    d.getElementById('frm1801:txt23C').value = formatCurrency(tax23a + tax23b);
    
    compute28();
  }
  
  function compute28()
  {
    var tax23c = (NumWithComma(d.getElementById('frm1801:txt23C').value)*1);
    var tax24 = (NumWithComma(d.getElementById('frm1801:txt24').value)*1);
    var tax25 = (NumWithComma(d.getElementById('frm1801:txt25').value)*1);
    var tax26 = (NumWithComma(d.getElementById('frm1801:txt26').value)*1);
    var tax27a = (NumWithComma(d.getElementById('frm1801:txt27A').value)*1);
    var tax27b = (NumWithComma(d.getElementById('frm1801:txt27B').value)*1);
    d.getElementById('frm1801:txt28').value = formatCurrency((tax23c) - (tax24 + tax25 + tax26 + tax27a + tax27b));
    
    compute30();
  } 
  
  function compute30()
  {
    var tax28 = (NumWithComma(d.getElementById('frm1801:txt28').value)*1);
    var tax29 = (NumWithComma(d.getElementById('frm1801:txt29').value)*1);
    d.getElementById('frm1801:txt30').value = formatCurrency(tax28 - tax29);
    
    compute31();
  }
  
  function compute31()
  {
    var tax30 = (NumWithComma(d.getElementById('frm1801:txt30').value)*1); 
  
    if (tax30 < 200000) {
      d.getElementById('frm1801:txt31').value = formatCurrency(0);
    } 
    /*else if( tax30 > 0 && tax30 <= 200000)
    {
      d.getElementById('frm1801:txt31').value = formatCurrency(tax30);
    }*/
    else if( tax30 >= 200000 && tax30 <= 500000)
    {
      d.getElementById('frm1801:txt31').value = formatCurrency((1 * tax30 - 200000)*0.05);
    }
    else if( tax30 > 500000 && tax30 <= 2000000)
    {
      d.getElementById('frm1801:txt31').value = formatCurrency(15000 + (1 * tax30 - 500000)*0.08);
    }
    else if( tax30 > 2000000 && tax30 <= 5000000)
    {
      d.getElementById('frm1801:txt31').value = formatCurrency(135000 + (1 * tax30 - 2000000)*0.11);
    }
    else if( tax30 > 5000000 && tax30 <= 10000000)
    {
      d.getElementById('frm1801:txt31').value = formatCurrency(465000 + (1 * tax30 - 5000000)*0.15);
    }
    else if( tax30 > 10000000)
    {
      d.getElementById('frm1801:txt31').value = formatCurrency(1215000 + (1 * tax30 - 10000000)*0.20);
    }
    
    compute32C();
    compute33();
    compute35();      
  }

  
  function showSched1()
  {
    saveTempSched1Data();
      d.getElementById('mainContent').style.display = "none";
      $('#modalSched1').show('blind');  
      $('#wrapper').css({'display':'none'});
  }
  function showSched1X()
  {
    saveTempSched1XData();
      d.getElementById('mainContent').style.display = "none";
      $('#modalSched1X').show('blind');
      $('#wrapper').css({'display':'none'});
  }
  
    function saveTempSched1Data() {
        tempRowSizeSched1 = d.getElementById("tblSched1").rows.length - 2;
        temptxtOCTSched1 = new Array();
        temptxtSched1TaxDeclaration = new Array();
    temptxtSched1Location = new Array();
        temptxtClass = new Array();
    temptxtArea = new Array();
        temptxtZV = new Array();
    temptxtFMV = new Array();
        temptxtFMVConjugal = new Array();
    temptxtFMVExclusive = new Array();
        
        for(var x = 0; x < tempRowSizeSched1; x++){
      if (d.getElementById('txtOCTSched1'+ (x)) != null) { 
        temptxtOCTSched1[x] = d.getElementById('txtOCTSched1'+ (x)).value;
      }
      if (d.getElementById('txtSched1TaxDeclaration'+ (x)) != null) { 
        temptxtSched1TaxDeclaration[x] = d.getElementById('txtSched1TaxDeclaration'+ (x)).value;
      }
      if (d.getElementById('txtSched1Location'+ (x)) != null) { 
        temptxtSched1Location[x] = d.getElementById('txtSched1Location'+ (x)).value;
      }
      if (d.getElementById('txtClass'+ (x)) != null) { 
        temptxtClass[x] = d.getElementById('txtClass'+ (x)).value;
      }
      if (d.getElementById('txtArea'+ (x)) != null) { 
        temptxtArea[x] = d.getElementById('txtArea'+ (x)).value;
      }
            if (d.getElementById('txtZV'+ (x)) != null) { 
        temptxtZV[x] = d.getElementById('txtZV'+ (x)).value;
      }
      if (d.getElementById('txtFMV'+ (x)) != null) { 
        temptxtFMV[x] = d.getElementById('txtFMV'+ (x)).value;
      }
      if (d.getElementById('txtFMVConjugal'+ (x)) != null) { 
        temptxtFMVConjugal[x] = d.getElementById('txtFMVConjugal'+ (x)).value;
      }
      if (d.getElementById('txtFMVExclusive'+ (x)) != null) { 
        temptxtFMVExclusive[x] = d.getElementById('txtFMVExclusive'+ (x)).value;
      }
            
        }
    } 
    function saveTempSched1XData() {
        tempRowSizeSched1X = d.getElementById("tblSched1X").rows.length - 2;
        temptxtOCTSched1X = new Array();
        temptxtSched1XTaxDeclaration = new Array();
    temptxtSched1XLocation = new Array();
        temptxtClassX = new Array();
    temptxtAreaX = new Array();
        temptxtZVX = new Array();
    temptxtFMVX = new Array();
        temptxtFMVConjugalX = new Array();
    temptxtFMVExclusiveX = new Array();
        
        for(var x = 0; x < tempRowSizeSched1X; x++){ 
            temptxtOCTSched1X[x] = d.getElementById('txtOCTSched1X'+ (x)).value;
            temptxtSched1XTaxDeclaration[x] = d.getElementById('txtSched1XTaxDeclaration'+ (x)).value;
      temptxtSched1XLocation[x] = d.getElementById('txtSched1XLocation'+ (x)).value;
            temptxtClassX[x] = d.getElementById('txtClassX'+ (x)).value;
      temptxtAreaX[x] = d.getElementById('txtAreaX'+ (x)).value;
            temptxtZVX[x] = d.getElementById('txtZVX'+ (x)).value;
      temptxtFMVX[x] = d.getElementById('txtFMVX'+ (x)).value;
            temptxtFMVConjugalX[x] = d.getElementById('txtFMVConjugalX'+ (x)).value;
      temptxtFMVExclusiveX[x] = d.getElementById('txtFMVExclusiveX'+ (x)).value;
            
        }
    } 

    function addlistSched1Reload()
    {
            var size = sched1ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
        sched1ToCommit[i].txtOCTSched1 = d.getElementById('txtOCTSched1'+i).value;
                sched1ToCommit[i].txtSched1TaxDeclaration = d.getElementById('txtSched1TaxDeclaration'+i).value;
                sched1ToCommit[i].txtSched1Location = d.getElementById('txtSched1Location'+i).value;
        sched1ToCommit[i].txtClass = d.getElementById('txtClass'+i).value;
        sched1ToCommit[i].txtArea = d.getElementById('txtArea'+i).value;
        sched1ToCommit[i].txtZV = d.getElementById('txtZV'+i).value;
        sched1ToCommit[i].txtFMV = d.getElementById('txtFMV'+i).value;
        sched1ToCommit[i].txtFMVConjugal = d.getElementById('txtFMVConjugal'+i).value;
        sched1ToCommit[i].txtFMVExclusive = d.getElementById('txtFMVExclusive'+i).value;
            }
            i = sched1ToCommit.length;
            sched1ToCommit[i] = new Schedule1();

      $('#tbodyllistSched1').html("");
      
            for(i = 0; i < sched1ToCommit.length; i++) {

         $('#tbodyllistSched1').html(  d.getElementById('tbodyllistSched1').innerHTML + "<tr>" + 
          "<td width='2%' align='center' nowrap> <input class='printButtonClass' type='checkbox' id='chxSched1"+i+"' /> </td>" +
                    "<td width='3%' nowrap> <input type='text' size='4' id='txtOCTSched1"+i+"' value='"+ sched1ToCommit[i].txtOCTSched1 +"' maxlength='10' /> </td>" +
                    "<td width='10%' nowrap><input type='text' size='10' id='txtSched1TaxDeclaration"+i+"' value='"+ sched1ToCommit[i].txtSched1TaxDeclaration +"'  maxlength='10' > </td> " +
          "<td width='15%' nowrap><input type='text' size='18' id='txtSched1Location"+i+"' value='"+ sched1ToCommit[i].txtSched1Location +"'  maxlength='60' /> </td> " +
                    "<td width='10%' nowrap><input type='text' size='12' id='txtClass"+i+"' value='"+ sched1ToCommit[i].txtClass +"' maxlength='10' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='12' id='txtArea"+i+"' value='"+ sched1ToCommit[i].txtArea +"' style='text-align: right' onkeypress='return numbersonly(this, event)' maxlength='10' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='15' id='txtZV"+i+"' value='"+ sched1ToCommit[i].txtZV +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='15' id='txtFMV"+i+"' value='"+ sched1ToCommit[i].txtFMV +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " + 
          "<td width='15%' nowrap><input type='text' size='15' id='txtFMVConjugal"+i+"' value='"+ sched1ToCommit[i].txtFMVConjugal +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax("+i+")' maxlength='18' />&nbsp;</td> " +
          "<td width='15%' nowrap><input type='text' size='15' id='txtFMVExclusive"+i+"' value='"+ sched1ToCommit[i].txtFMVExclusive +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax1("+i+")' maxlength='18' />&nbsp;</td> </tr>");
            
               // setTimeout("setInputTextControl_HorizontalAlignment('txtSched1Location"+i+"',4 );setInputTextControl_NumberFormatterNonNegative('txtSched1Location"+i+"',12,2);d.getElementById('txtSched1Location"+i+"').value=d.getElementById('txtSched1Location"+i+"').value;",100);
            }
    } 
    function addlistSched1XReload() 
    {
            var size = sched1XToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
        sched1XToCommit[i].txtOCTSched1X = d.getElementById('txtOCTSched1X'+i).value;
                sched1XToCommit[i].txtSched1XTaxDeclaration = d.getElementById('txtSched1XTaxDeclaration'+i).value;
                sched1XToCommit[i].txtSched1XLocation = d.getElementById('txtSched1XLocation'+i).value;
        sched1XToCommit[i].txtClassX = d.getElementById('txtClassX'+i).value;
        sched1XToCommit[i].txtAreaX = d.getElementById('txtAreaX'+i).value;
        sched1XToCommit[i].txtZVX = d.getElementById('txtZVX'+i).value;
        sched1XToCommit[i].txtFMVX = d.getElementById('txtFMVX'+i).value;
        sched1XToCommit[i].txtFMVConjugalX = d.getElementById('txtFMVConjugalX'+i).value;
        sched1XToCommit[i].txtFMVExclusiveX = d.getElementById('txtFMVExclusiveX'+i).value;
            }
            i = sched1XToCommit.length;
            sched1XToCommit[i] = new Schedule1X();  

      $('#tbodyllistSched1X').html("");
      
            for(i = 0; i < sched1XToCommit.length; i++) {

         $('#tbodyllistSched1X').html(  d.getElementById('tbodyllistSched1X').innerHTML + "<tr>" + 
          "<td width='2%' align='center' nowrap> <input class='printButtonClass' type='checkbox' id='chxSched1X"+i+"' /> </td>" + 
                    "<td width='3%' nowrap> <input type='text' size='4' id='txtOCTSched1X"+i+"' value='"+ sched1XToCommit[i].txtOCTSched1X +"' maxlength='10' /> </td>" +
                    "<td width='10%' nowrap><input type='text' size='10' id='txtSched1XTaxDeclaration"+i+"' value='"+ sched1XToCommit[i].txtSched1XTaxDeclaration +"'  maxlength='10' > </td> " +
          "<td width='15%' nowrap><input type='text' size='18' id='txtSched1XLocation"+i+"' value='"+ sched1XToCommit[i].txtSched1XLocation +"'  maxlength='60' /> </td> " +
                    "<td width='10%' nowrap><input type='text' size='12' id='txtClassX"+i+"' value='"+ sched1XToCommit[i].txtClassX +"' maxlength='10' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='12' id='txtAreaX"+i+"' value='"+ sched1XToCommit[i].txtAreaX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' maxlength='10' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='15' id='txtZVX"+i+"' value='"+ sched1XToCommit[i].txtZVX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='15' id='txtFMVX"+i+"' value='"+ sched1XToCommit[i].txtFMVX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " + 
          "<td width='15%' nowrap><input type='text' size='15' id='txtFMVConjugalX"+i+"' value='"+ sched1XToCommit[i].txtFMVConjugalX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTaxX("+i+")' maxlength='18' />&nbsp;</td> " +
          "<td width='15%' nowrap><input type='text' size='15' id='txtFMVExclusiveX"+i+"' value='"+ sched1XToCommit[i].txtFMVExclusiveX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax1X("+i+")' maxlength='18' />&nbsp;</td> </tr>");

            }
    }
  function addlistSched1X() 
    {
    if(checkifEmptyFieldSched1X()) {
            var size = sched1XToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
        sched1XToCommit[i].txtOCTSched1X = d.getElementById('txtOCTSched1X'+i).value;
                sched1XToCommit[i].txtSched1XTaxDeclaration = d.getElementById('txtSched1XTaxDeclaration'+i).value;
                sched1XToCommit[i].txtSched1XLocation = d.getElementById('txtSched1XLocation'+i).value;
        sched1XToCommit[i].txtClassX = d.getElementById('txtClassX'+i).value;
        sched1XToCommit[i].txtAreaX = d.getElementById('txtAreaX'+i).value;
        sched1XToCommit[i].txtZVX = d.getElementById('txtZVX'+i).value;
        sched1XToCommit[i].txtFMVX = d.getElementById('txtFMVX'+i).value;
        sched1XToCommit[i].txtFMVConjugalX = d.getElementById('txtFMVConjugalX'+i).value;
        sched1XToCommit[i].txtFMVExclusiveX = d.getElementById('txtFMVExclusiveX'+i).value;
            }
            i = sched1XToCommit.length;
            sched1XToCommit[i] = new Schedule1X(); 

      $('#tbodyllistSched1X').html("");
      
            for(i = 0; i < sched1XToCommit.length; i++) {

         $('#tbodyllistSched1X').html(  d.getElementById('tbodyllistSched1X').innerHTML + "<tr>" + 
          "<td width='2%' align='center' nowrap> <input class='printButtonClass' type='checkbox' id='chxSched1X"+i+"' name='chxSched1X"+i+"' /> </td>" + 
                    "<td width='3%' nowrap> <input type='text' size='4' id='txtOCTSched1X"+i+"' name='txtOCTSched1X[]' value='"+ sched1XToCommit[i].txtOCTSched1X +"' maxlength='10' /> </td>" +
                    "<td width='10%' nowrap><input type='text' size='10' id='txtSched1XTaxDeclaration"+i+"' name='txtSched1XTaxDeclaration[]'  value='"+ sched1XToCommit[i].txtSched1XTaxDeclaration +"'  maxlength='10' > </td> " +
          "<td width='15%' nowrap><input type='text' size='18' id='txtSched1XLocation"+i+"' name='txtSched1XLocation[]'  value='"+ sched1XToCommit[i].txtSched1XLocation +"'  maxlength='60' /> </td> " +
                    "<td width='10%' nowrap><input type='text' size='12' id='txtClassX"+i+"' name='txtClassX[]'  value='"+ sched1XToCommit[i].txtClassX +"' maxlength='10' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='12' id='txtAreaX"+i+"' name='txtAreaX[]'  value='"+ sched1XToCommit[i].txtAreaX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' maxlength='10' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='15' id='txtZVX"+i+"' name='txtZVX[]'  value='"+ sched1XToCommit[i].txtZVX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='15' id='txtFMVX"+i+"' name='txtFMVX[]'  value='"+ sched1XToCommit[i].txtFMVX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " + 
          "<td width='15%' nowrap><input type='text' size='15' id='txtFMVConjugalX"+i+"' name='txtFMVConjugalX[]'  value='"+ sched1XToCommit[i].txtFMVConjugalX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTaxX("+i+")' maxlength='18' />&nbsp;</td> " +
          "<td width='15%' nowrap><input type='text' size='15' id='txtFMVExclusiveX"+i+"' name='txtFMVExclusiveX[]'  value='"+ sched1XToCommit[i].txtFMVExclusiveX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax1X("+i+")' maxlength='18' />&nbsp;</td> </tr>");
      
            }
    } 
    } 
  
    function addlistSched1()
    {
        if(checkifEmptyFieldSched1()) {
            var size = sched1ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
        sched1ToCommit[i].txtOCTSched1 = d.getElementById('txtOCTSched1'+i).value;
                sched1ToCommit[i].txtSched1TaxDeclaration = d.getElementById('txtSched1TaxDeclaration'+i).value;
                sched1ToCommit[i].txtSched1Location = d.getElementById('txtSched1Location'+i).value;
        sched1ToCommit[i].txtClass = d.getElementById('txtClass'+i).value;
        sched1ToCommit[i].txtArea = d.getElementById('txtArea'+i).value;
        sched1ToCommit[i].txtZV = d.getElementById('txtZV'+i).value;
        sched1ToCommit[i].txtFMV = d.getElementById('txtFMV'+i).value;
        sched1ToCommit[i].txtFMVConjugal = d.getElementById('txtFMVConjugal'+i).value;
        sched1ToCommit[i].txtFMVExclusive = d.getElementById('txtFMVExclusive'+i).value;
            }
            i = sched1ToCommit.length;
            sched1ToCommit[i] = new Schedule1();

      $('#tbodyllistSched1').html("");
      
            for(i = 0; i < sched1ToCommit.length; i++) {

         $('#tbodyllistSched1').html(  d.getElementById('tbodyllistSched1').innerHTML + "<tr>" + 
          "<td width='2%' align='center' nowrap> <input class='printButtonClass' type='checkbox' id='chxSched1"+i+"' name='chxSched1"+i+"' /> </td>" +
                    "<td width='3%' nowrap> <input type='text' size='4' id='txtOCTSched1"+i+"' name='txtOCTSched1[]' value='"+ sched1ToCommit[i].txtOCTSched1 +"' maxlength='10' /> </td>" +
                    "<td width='10%' nowrap><input type='text' size='10' id='txtSched1TaxDeclaration"+i+"' name='txtSched1TaxDeclaration[]'  value='"+ sched1ToCommit[i].txtSched1TaxDeclaration +"'  maxlength='10' > </td> " +
          "<td width='15%' nowrap><input type='text' size='18' id='txtSched1Location"+i+"' name='txtSched1Location[]'  value='"+ sched1ToCommit[i].txtSched1Location +"'  maxlength='60' /> </td> " +
                    "<td width='10%' nowrap><input type='text' size='12' id='txtClass"+i+"' name='txtClass[]'  value='"+ sched1ToCommit[i].txtClass +"' maxlength='10' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='12' id='txtArea"+i+"' name='txtArea[]'  value='"+ sched1ToCommit[i].txtArea +"' style='text-align: right' onkeypress='return numbersonly(this, event)' maxlength='10' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='15' id='txtZV"+i+"' name='txtZV[]'  value='"+ sched1ToCommit[i].txtZV +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='15' id='txtFMV"+i+"' name='txtFMV[]'  value='"+ sched1ToCommit[i].txtFMV +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " + 
          "<td width='15%' nowrap><input type='text' size='15' id='txtFMVConjugal"+i+"' name='txtFMVConjugal[]'  value='"+ sched1ToCommit[i].txtFMVConjugal +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax("+i+")' maxlength='18' />&nbsp;</td> " +
          "<td width='15%' nowrap><input type='text' size='15' id='txtFMVExclusive"+i+"' name='txtFMVExclusive[]'  value='"+ sched1ToCommit[i].txtFMVExclusive +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax1("+i+")' maxlength='18' />&nbsp;</td> </tr>");
                  
               // setTimeout("setInputTextControl_HorizontalAlignment('txtSched1Location"+i+"',4 );setInputTextControl_NumberFormatterNonNegative('txtSched1Location"+i+"',12,2);d.getElementById('txtSched1Location"+i+"').value=d.getElementById('txtSched1Location"+i+"').value;",100);
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
      sched1ToCommit[i].txtOCTSched1 = d.getElementById('txtOCTSched1'+i).value;
            sched1ToCommit[i].txtSched1TaxDeclaration = d.getElementById('txtSched1TaxDeclaration'+i).value;
            sched1ToCommit[i].txtSched1Location = d.getElementById('txtSched1Location'+i).value;
      sched1ToCommit[i].txtClass = d.getElementById('txtClass'+i).value;
      sched1ToCommit[i].txtArea = d.getElementById('txtArea'+i).value;
      sched1ToCommit[i].txtZV = d.getElementById('txtZV'+i).value;
      sched1ToCommit[i].txtFMV = d.getElementById('txtFMV'+i).value;
      sched1ToCommit[i].txtFMVConjugal = d.getElementById('txtFMVConjugal'+i).value;
      sched1ToCommit[i].txtFMVExclusive = d.getElementById('txtFMVExclusive'+i).value;
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
                //d.getElementById("tbodyllistSched1").innerHTML += "<tr>" +
        $('#tbodyllistSched1').html(  d.getElementById('tbodyllistSched1').innerHTML + "<tr>" + 
          "<td width='2%' align='center' nowrap> <input class='printButtonClass' type='checkbox' id='chxSched1"+i+"' /> </td>" +
                    "<td width='3%' nowrap> <input type='text' size='4' id='txtOCTSched1"+i+"' value='"+ sched1ToCommit[i].txtOCTSched1 +"' maxlength='10' /> </td>" +
                    "<td width='10%' nowrap><input type='text' size='10' id='txtSched1TaxDeclaration"+i+"' value='"+ sched1ToCommit[i].txtSched1TaxDeclaration +"'  maxlength='10' > </td> " +
          "<td width='15%' nowrap><input type='text' size='18' id='txtSched1Location"+i+"' value='"+ sched1ToCommit[i].txtSched1Location +"'  maxlength='60' /> </td> " +
                    "<td width='10%' nowrap><input type='text' size='12' id='txtClass"+i+"' value='"+ sched1ToCommit[i].txtClass +"' maxlength='10' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='12' id='txtArea"+i+"' value='"+ sched1ToCommit[i].txtArea +"' style='text-align: right' onkeypress='return numbersonly(this, event)' maxlength='10' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='15' id='txtZV"+i+"' value='"+ sched1ToCommit[i].txtZV +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='15' id='txtFMV"+i+"' value='"+ sched1ToCommit[i].txtFMV +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " + 
          "<td width='15%' nowrap><input type='text' size='15' id='txtFMVConjugal"+i+"' value='"+ sched1ToCommit[i].txtFMVConjugal +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax("+i+")' maxlength='18' />&nbsp;</td> " +
          "<td width='15%' nowrap><input type='text' size='15' id='txtFMVExclusive"+i+"' value='"+ sched1ToCommit[i].txtFMVExclusive +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax1("+i+")' maxlength='18' />&nbsp;</td> </tr>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtSched1Location"+i+"',4 );",100);

            }
        } else {
            sched1ToCommit = new Array();
      $('#tbodyllistSched1').html("");
        }
        computeSumTax();
    computeSumTax1();
    } 
  
    function deletelistSched1X()
    {
        var sched1XTemp = new Array();
        var i = 0;
        var size = sched1XToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
      sched1XToCommit[i].txtOCTSched1X = d.getElementById('txtOCTSched1X'+i).value;
            sched1XToCommit[i].txtSched1XTaxDeclaration = d.getElementById('txtSched1XTaxDeclaration'+i).value;
            sched1XToCommit[i].txtSched1XLocation = d.getElementById('txtSched1XLocation'+i).value;
      sched1XToCommit[i].txtClassX = d.getElementById('txtClassX'+i).value;
      sched1XToCommit[i].txtAreaX = d.getElementById('txtAreaX'+i).value;
      sched1XToCommit[i].txtZVX = d.getElementById('txtZVX'+i).value;
      sched1XToCommit[i].txtFMVX = d.getElementById('txtFMVX'+i).value;
      sched1XToCommit[i].txtFMVConjugalX = d.getElementById('txtFMVConjugalX'+i).value;
      sched1XToCommit[i].txtFMVExclusiveX = d.getElementById('txtFMVExclusiveX'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched1X" + j).checked) {
                sched1XTemp[i++] = sched1XToCommit[j];
            }
        }

        if(sched1XTemp.length > 0) {
            sched1XToCommit = new Array();
            sched1XToCommit = sched1XTemp;
      $('#tbodyllistSched1X').html("");

            for(i = 0; i < sched1XTemp.length; i++) {
                sched1XToCommit[i] = sched1XTemp[i];
                //d.getElementById("tbodyllistSched1").innerHTML += "<tr>" +
        $('#tbodyllistSched1X').html(  d.getElementById('tbodyllistSched1X').innerHTML + "<tr>" + 
          "<td width='2%' align='center' nowrap> <input class='printButtonClass' type='checkbox' id='chxSched1X"+i+"' /> </td>" +
                    "<td width='3%' nowrap> <input type='text' size='4' id='txtOCTSched1X"+i+"' value='"+ sched1XToCommit[i].txtOCTSched1X +"' maxlength='10' /> </td>" +
                    "<td width='10%' nowrap><input type='text' size='10' id='txtSched1XTaxDeclaration"+i+"' value='"+ sched1XToCommit[i].txtSched1XTaxDeclaration +"'  maxlength='10' > </td> " +
          "<td width='15%' nowrap><input type='text' size='18' id='txtSched1XLocation"+i+"' value='"+ sched1XToCommit[i].txtSched1XLocation +"'  maxlength='60' /> </td> " +
                    "<td width='10%' nowrap><input type='text' size='12' id='txtClassX"+i+"' value='"+ sched1XToCommit[i].txtClassX +"' maxlength='10' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='12' id='txtAreaX"+i+"' value='"+ sched1XToCommit[i].txtAreaX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' maxlength='10' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='15' id='txtZVX"+i+"' value='"+ sched1XToCommit[i].txtZVX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " +
          "<td width='10%' nowrap><input type='text' size='15' id='txtFMVX"+i+"' value='"+ sched1XToCommit[i].txtFMVX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " + 
          "<td width='15%' nowrap><input type='text' size='15' id='txtFMVConjugalX"+i+"' value='"+ sched1XToCommit[i].txtFMVConjugalX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax("+i+")' maxlength='18' />&nbsp;</td> " +
          "<td width='15%' nowrap><input type='text' size='15' id='txtFMVExclusiveX"+i+"' value='"+ sched1XToCommit[i].txtFMVExclusiveX +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax1("+i+")' maxlength='18' />&nbsp;</td> </tr>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtSched1XLocation"+i+"',4 );",100);

            }
        } else {
            sched1XToCommit = new Array();
      $('#tbodyllistSched1X').html("");
        }
        computeSumTaxX();
    computeSumTax1X();
    }     
  
    function checkifEmptyFieldSched1() {

        var size = sched1ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
            //if(d.getElementById('txtOCTSched1'+ i).value == "") {
            //    alert("Please enter valid row " + (i + 1) + " data for Schedule 1.\n" +
            //        "Empty fields are not allowed."); return ;
            //} 
      if(d.getElementById('txtSched1TaxDeclaration'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 1.\n" +
                    "Empty fields are not allowed."); return ;
            }
      if(d.getElementById('txtSched1Location'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 1.\n" +
                    "Empty fields are not allowed."); return ;
            }
      if(d.getElementById('txtClass'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 1.\n" +
                    "Empty fields are not allowed."); return ;
            }
    
      if(d.getElementById('txtZV'+ i).value <= 0) {
                alert("Please enter a valid amount on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }if(d.getElementById('txtFMV'+ i).value <= 0 ) {
                alert("Please enter a valid amount on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( d.getElementById('txtFMVConjugal'+ i).value <= 0 && d.getElementById('txtFMVExclusive'+ i).value <= 0) {
                alert("Please enter a valid amount on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
      
        }

        return true;
    }
  
    function checkifEmptyFieldSched1X() {

        var size = sched1XToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
        
      if(d.getElementById('txtSched1XTaxDeclaration'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 1.\n" +
                    "Empty fields are not allowed."); return ;
            }
      if(d.getElementById('txtSched1XLocation'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 1.\n" +
                    "Empty fields are not allowed."); return ;
            }
      if(d.getElementById('txtClassX'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 1.\n" +
                    "Empty fields are not allowed."); return ;
            }
   
      if(d.getElementById('txtZVX'+ i).value <= 0) {
                alert("Please enter a valid amount on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }if(d.getElementById('txtFMVX'+ i).value <= 0 ) {
                alert("Please enter a valid amount on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( d.getElementById('txtFMVConjugalX'+ i).value <= 0 && d.getElementById('txtFMVExclusiveX'+ i).value <= 0) {
                alert("Please enter a valid amount on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
   
        }

        return true;
    } 
  
  function Schedule1()
    {
    this.txtOCTSched1 = '';
        this.txtSched1TaxDeclaration = '';
        this.txtSched1Location = '';
    this.txtClass = '';
    this.txtArea = '';
    this.txtZV = '';
    this.txtFMV = '';
    this.txtFMVConjugal = '';
    this.txtFMVExclusive = '';
    } 
  
  function Schedule1X()
    {
    this.txtOCTSched1X = '';
        this.txtSched1XTaxDeclaration = '';
        this.txtSched1XLocation = '';
    this.txtClassX = '';
    this.txtAreaX = '';
    this.txtZVX = '';
    this.txtFMVX = '';
    this.txtFMVConjugalX = '';
    this.txtFMVExclusiveX = '';
    }   
  function computeSumTax(){
        var size = sched1ToCommit.length;
        var totalAmountTax = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtFMVConjugal' + i).value)*1 ;
        }
        d.getElementById('frm1801:totalSch1AmountConj').value = formatCurrency(totalAmountTax);
    }
  function computeSumTaxX(){
        var size = sched1XToCommit.length;
        var totalAmountTaxX = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTaxX = totalAmountTaxX*1 + NumWithComma(d.getElementById('txtFMVConjugalX' + i).value)*1 ;
        }
        d.getElementById('frm1801:totalSch1XAmountConj').value = formatCurrency(totalAmountTaxX); 
    }
  
  function computeSumTax1(){
        var size = sched1ToCommit.length;
        var totalAmountTax = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtFMVExclusive' + i).value)*1 ;
        }
        d.getElementById('frm1801:totalSch1AmountExc').value = formatCurrency(totalAmountTax);
    }
  function computeSumTax1X(){
        var size = sched1XToCommit.length;
        var totalAmountTaxX = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTaxX = totalAmountTaxX*1 + NumWithComma(d.getElementById('txtFMVExclusiveX' + i).value)*1 ;
        }
        d.getElementById('frm1801:totalSch1XAmountExc').value = formatCurrency(totalAmountTaxX);
    } 
  
  function getSched1Modal(){
        if (checkifEmptyFieldSched1() )
        {
       d.getElementById('mainContent').style.display = 'block';
       if ( $('#modalSched1').css('display') != 'none' ) {
        $('#modalSched1').hide('blind');
        $('#wrapper').css({'display':'block'});  
       }
       $('#DummyTxt').html("Creator");
       $('#DummyTxt').html("");     

            d.getElementById('frm1801:txt17A').value  = d.getElementById('frm1801:totalSch1AmountExc').value;
      d.getElementById('frm1801:txt17B').value  = d.getElementById('frm1801:totalSch1AmountConj').value;
     
            compute17c();
    
            isModalTurnOn = false;
        }
    }
  function getSched1XModal(){
        if (checkifEmptyFieldSched1X() )
        {
       d.getElementById('mainContent').style.display = 'block';
       if ( $('#modalSched1X').css('display') != 'none' ) {
        $('#modalSched1X').hide('blind');
        $('#wrapper').css({'display':'block'});  
       }
       $('#DummyTxt').html("Creator");
       $('#DummyTxt').html("");     
        d.getElementById('frm1801:txt19A').value  = d.getElementById('frm1801:totalSch1XAmountExc').value;
        d.getElementById('frm1801:txt19B').value  = d.getElementById('frm1801:totalSch1XAmountConj').value;

        compute19c();
            isModalTurnOn = false;
        }
    } 
  
   function clearSched1Modal() {
        var rowSizeSched1 = d.getElementById("tblSched1").rows.length - 1;

        for(var x = 0; x < rowSizeSched1; x++){
            if (d.getElementById('txtOCTSched1'+ (x)) != null) { d.getElementById('txtOCTSched1'+ (x)).value = ""};
      if (d.getElementById('txtSched1TaxDeclaration'+ (x)) != null) { d.getElementById('txtSched1TaxDeclaration'+ (x)).value = ""};
      if (d.getElementById('txtSched1Location'+ (x)) != null) { d.getElementById('txtSched1Location'+ (x)).value = ""};
      if (d.getElementById('txtClass'+ (x)) != null) { d.getElementById('txtClass'+ (x)).value = ""};
      if (d.getElementById('txtArea'+ (x)) != null) { d.getElementById('txtArea'+ (x)).value = ""};
            if (d.getElementById('txtZV'+ (x)) != null) { d.getElementById('txtZV'+ (x)).value = "0.00"};
      if (d.getElementById('txtFMV'+ (x)) != null) { d.getElementById('txtFMV'+ (x)).value = "0.00"};
      if (d.getElementById('txtFMVConjugal'+ (x)) != null) { d.getElementById('txtFMVConjugal'+ (x)).value = "0.00"};
      if (d.getElementById('txtFMVExclusive'+ (x)) != null) { d.getElementById('txtFMVExclusive'+ (x)).value = "0.00"};
    }
    }
  function clearSched1XModal() {
        var rowSizeSched1 = d.getElementById("tblSched1X").rows.length - 1;

        for(var x = 0; x < rowSizeSched1; x++){
            if (d.getElementById('txtOCTSched1X'+ (x)) != null) { d.getElementById('txtOCTSched1X'+ (x)).value = ""};
      if (d.getElementById('txtSched1XTaxDeclaration'+ (x)) != null) { d.getElementById('txtSched1XTaxDeclaration'+ (x)).value = ""};
      if (d.getElementById('txtSched1XLocation'+ (x)) != null) { d.getElementById('txtSched1XLocation'+ (x)).value = ""};
      if (d.getElementById('txtClassX'+ (x)) != null) { d.getElementById('txtClassX'+ (x)).value = ""};
      if (d.getElementById('txtAreaX'+ (x)) != null) { d.getElementById('txtAreaX'+ (x)).value = ""};
            if (d.getElementById('txtZVX'+ (x)) != null) { d.getElementById('txtZVX'+ (x)).value = "0.00"};
      if (d.getElementById('txtFMVX'+ (x)) != null) { d.getElementById('txtFMVX'+ (x)).value = "0.00"};
      if (d.getElementById('txtFMVConjugalX'+ (x)) != null) { d.getElementById('txtFMVConjugalX'+ (x)).value = "0.00"};
      if (d.getElementById('txtFMVExclusiveX'+ (x)) != null) { d.getElementById('txtFMVExclusiveX'+ (x)).value = "0.00"};
    }
    } 
  
  function cancelSched1Modal() {
       
    d.getElementById('mainContent').style.display = 'block';
  
    if ( $('#modalSched1').css('display') != 'none' ) {
      $('#modalSched1').hide('blind');    
    }
    $('#DummyTxt').html("Creator");
    $('#DummyTxt').html("");    
        isModalTurnOn = false;  
    } 
  function cancelSched1XModal() {
       
    d.getElementById('mainContent').style.display = 'block';
  
    if ( $('#modalSched1X').css('display') != 'none' ) {
      $('#modalSched1X').hide('blind');   
    }
    $('#DummyTxt').html("Creator");
    $('#DummyTxt').html("");    
        isModalTurnOn = false;  
    }   
  
  function showSched2and3()
  {
      d.getElementById('mainContent').style.display = "none";
      $('#modalSched2and3').show('blind');  
      $('#wrapper').css({'display':'none'});     
  }
  
  function saveTempSched2Data() {
        tempRowSizeSched2 = d.getElementById("tblSched2").rows.length - 2;
        temptxtNameCorp = new Array();
    temptxtStockCert = new Array();
        temptxtShares = new Array();
    temptxtFMVS = new Array();
        temptxtFMVConjugal2 = new Array();
    temptxtFMVExclusive2 = new Array();
        
        for(var x = 0; x < tempRowSizeSched2; x++){
            temptxtNameCorp[x] = d.getElementById('txtNameCorp'+ (x)).value;
            temptxtStockCert[x] = d.getElementById('txtStockCert'+ (x)).value;
      temptxtShares[x] = d.getElementById('txtShares'+ (x)).value;
            temptxtFMVS[x] = d.getElementById('txtFMVS'+ (x)).value;
      temptxtFMVConjugal2[x] = d.getElementById('txtFMVConjugal2'+ (x)).value;
      temptxtFMVExclusive2[x] = d.getElementById('txtFMVExclusive2'+ (x)).value;
            
        }
    } 

    function addlistSched2Reload()
    {
            var size = sched2ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
        sched2ToCommit[i].txtNameCorp = d.getElementById('txtNameCorp'+i).value;
                sched2ToCommit[i].txtStockCert = d.getElementById('txtStockCert'+i).value;
                sched2ToCommit[i].txtShares = d.getElementById('txtShares'+i).value;
        sched2ToCommit[i].txtFMVS = d.getElementById('txtFMVS'+i).value;
        sched2ToCommit[i].txtFMVConjugal2 = d.getElementById('txtFMVConjugal2'+i).value;
        sched2ToCommit[i].txtFMVExclusive2 = d.getElementById('txtFMVExclusive2'+i).value;
            }
            i = sched2ToCommit.length;
            sched2ToCommit[i] = new Schedule2();

      $('#tbodyllistSched2').html("");
      
            for(i = 0; i < sched2ToCommit.length; i++) {

         $('#tbodyllistSched2').html(  d.getElementById('tbodyllistSched2').innerHTML + "<tr>" + 
          "<td width='5%' align='center'> <input class='printButtonClass' type='checkbox' id='chxSched2"+i+"' /> </td>" +
                    "<td width='25%'> <input type='text' size='44' id='txtNameCorp"+i+"' value='"+ sched2ToCommit[i].txtNameCorp +"' maxlength='50' /> </td>" +
                    "<td width='15%'><input type='text' size='20' id='txtStockCert"+i+"' value='"+ sched2ToCommit[i].txtStockCert +"' style='text-align: right;' maxlength='20' > </td> " +
          "<td width='10%'><input type='text' size='10' id='txtShares"+i+"' value='"+ sched2ToCommit[i].txtShares +"' style='text-align: right;' onkeypress='return numbersonly(this, event)'  maxlength='20' /> </td> " +
                    "<td width='15%'><input type='text' size='15' id='txtFMVS"+i+"' value='"+ sched2ToCommit[i].txtFMVS +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " + 
          "<td width='15%'><input type='text' size='18' id='txtFMVConjugal2"+i+"' value='"+ sched2ToCommit[i].txtFMVConjugal2 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax2("+i+")' maxlength='17' />&nbsp;</td> " +
          "<td width='15%'><input type='text' size='18' id='txtFMVExclusive2"+i+"' value='"+ sched2ToCommit[i].txtFMVExclusive2 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax2a("+i+")' maxlength='17' />&nbsp;</td> </tr>");
            
            }
    } 
  
    function addlistSched2()
    {
        if(checkifEmptyFieldSched2()) {
            var size = sched2ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
        sched2ToCommit[i].txtNameCorp = d.getElementById('txtNameCorp'+i).value;
                sched2ToCommit[i].txtStockCert = d.getElementById('txtStockCert'+i).value;
                sched2ToCommit[i].txtShares = d.getElementById('txtShares'+i).value;
        sched2ToCommit[i].txtFMVS = d.getElementById('txtFMVS'+i).value;
        sched2ToCommit[i].txtFMVConjugal2 = d.getElementById('txtFMVConjugal2'+i).value;
        sched2ToCommit[i].txtFMVExclusive2 = d.getElementById('txtFMVExclusive2'+i).value;
            }
            i = sched2ToCommit.length;
            sched2ToCommit[i] = new Schedule2();

      $('#tbodyllistSched2').html("");
      
            for(i = 0; i < sched2ToCommit.length; i++) {

         $('#tbodyllistSched2').html(  d.getElementById('tbodyllistSched2').innerHTML + "<tr>" + 
          "<td width='5%' align='center'> <input class='printButtonClass' type='checkbox' id='chxSched2"+i+"' name='chxSched2"+i+"' /> </td>" +
                    "<td width='25%'> <input type='text' size='44' id='txtNameCorp"+i+"' name='txtNameCorp[]' value='"+ sched2ToCommit[i].txtNameCorp +"' maxlength='50' /> </td>" +
                    "<td width='15%'><input type='text' size='20' id='txtStockCert"+i+"' name='txtStockCert[]'  value='"+ sched2ToCommit[i].txtStockCert +"' style='text-align: right;' maxlength='20' > </td> " +
          "<td width='10%'><input type='text' size='10' id='txtShares"+i+"' name='txtShares[]'  value='"+ sched2ToCommit[i].txtShares +"' style='text-align: right;' onkeypress='return numbersonly(this, event)'  maxlength='20' /> </td> " +
                    "<td width='15%'><input type='text' size='15' id='txtFMVS"+i+"' name='txtFMVS[]'  value='"+ sched2ToCommit[i].txtFMVS +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " + 
          "<td width='15%'><input type='text' size='18' id='txtFMVConjugal2"+i+"' name='txtFMVConjugal2[]'  value='"+ sched2ToCommit[i].txtFMVConjugal2 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax2("+i+")' maxlength='17' />&nbsp;</td> " +
          "<td width='15%'><input type='text' size='18' id='txtFMVExclusive2"+i+"' name='txtFMVExclusive2[]'  value='"+ sched2ToCommit[i].txtFMVExclusive2 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax2a("+i+")' maxlength='17' />&nbsp;</td> </tr>");
            
             //   setTimeout("setInputTextControl_HorizontalAlignment('txtShares"+i+"',4 );setInputTextControl_NumberFormatterNonNegative('txtShares"+i+"',12,2);d.getElementById('txtShares"+i+"').value=d.getElementById('txtShares"+i+"').value;",100);
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
      sched2ToCommit[i].txtNameCorp = d.getElementById('txtNameCorp'+i).value;
            sched2ToCommit[i].txtStockCert = d.getElementById('txtStockCert'+i).value;
            sched2ToCommit[i].txtShares = d.getElementById('txtShares'+i).value;
      sched2ToCommit[i].txtFMVS = d.getElementById('txtFMVS'+i).value;
      sched2ToCommit[i].txtFMVConjugal2 = d.getElementById('txtFMVConjugal2'+i).value;
      sched2ToCommit[i].txtFMVExclusive2 = d.getElementById('txtFMVExclusive2'+i).value;
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
          "<td width='5%' align='center'> <input class='printButtonClass' type='checkbox' id='chxSched2"+i+"' /> </td>" +
                    "<td width='25%'> <input type='text' size='44' id='txtNameCorp"+i+"' value='"+ sched2ToCommit[i].txtNameCorp +"' maxlength='50' /> </td>" +
                    "<td width='15%'><input type='text' size='20' id='txtStockCert"+i+"' value='"+ sched2ToCommit[i].txtStockCert +"' onkeypress='return numbersonly(this, event)'  maxlength='20' > </td> " +
          "<td width='10%'><input type='text' size='10' id='txtShares"+i+"' value='"+ sched2ToCommit[i].txtShares +"' style='text-align: right;' maxlength='20' /> </td> " +
                    "<td width='15%'><input type='text' size='15' id='txtFMVS"+i+"' value='"+ sched2ToCommit[i].txtFMVS +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2);' maxlength='15' />&nbsp;</td> " + 
          "<td width='15%'><input type='text' size='18' id='txtFMVConjugal2"+i+"' value='"+ sched2ToCommit[i].txtFMVConjugal2 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax2("+i+")' maxlength='17' />&nbsp;</td> " +
          "<td width='15%'><input type='text' size='18' id='txtFMVExclusive2"+i+"' value='"+ sched2ToCommit[i].txtFMVExclusive2 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax2a("+i+")' maxlength='17' />&nbsp;</td> </tr>");


                setTimeout("setInputTextControl_HorizontalAlignment('txtShares"+i+"',4 );",100);

            }
        } else {
            sched2ToCommit = new Array();
      $('#tbodyllistSched2').html("");
        }
        computeSumTax2();
    computeSumTax2a();
    } 
  
  function computeSumTax2(){
        var size = sched2ToCommit.length;
        var totalAmountTax = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtFMVConjugal2' + i).value)*1 ;
        }
        d.getElementById('frm1801:totalSch2AmountConj').value = formatCurrency(totalAmountTax);
    }
  
  function computeSumTax2a(){
        var size = sched2ToCommit.length;
        var totalAmountTax = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtFMVExclusive2' + i).value)*1 ;
        }
        d.getElementById('frm1801:totalSch2AmountExc').value = formatCurrency(totalAmountTax);
    }
  
    function checkifEmptyFieldSched2() {

        var size = sched2ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtNameCorp'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 2.\n" +
                    "Empty fields are not allowed."); 
          return;
            } 
      if(d.getElementById('txtStockCert'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 2.\n" +
                    "Empty fields are not allowed."); 
          return;
            }
      if(d.getElementById('txtShares'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 2.\n" +
                    "Empty fields are not allowed."); 
          return;
            }
      if(d.getElementById('txtFMVS'+ i).value <= 0 ) {
                alert("Please enter a valid amount on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); 
          return;
            }
            if( d.getElementById('txtFMVConjugal2'+ i).value <= 0 && d.getElementById('txtFMVExclusive2'+ i).value <= 0) {
                alert("Please enter a valid amount on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); 
          return;
            }
     
        }

        return true;
    }
  
  function Schedule2()
    {
    this.txtNameCorp = '';
        this.txtStockCert = '';
        this.txtShares = '';
    this.txtFMVS = '';
    this.txtFMVConjugal2 = '';
    this.txtFMVExclusive2 = '';
    } 
  
   function getSched2Modal(){
        if (checkifEmptyFieldSched2() && checkifEmptyFieldSched3())
        {
       d.getElementById('mainContent').style.display = 'block';
       if ( $('#modalSched2and3').css('display') != 'none' ) {
        $('#modalSched2and3').hide('blind');
        $('#wrapper').css({'display':'block'});  
       }
       $('#DummyTxt').html("Creator");
       $('#DummyTxt').html("");     


            isModalTurnOn = false;
        }
    }
  
   function clearSched2Modal() {
        var rowSizeSched2 = d.getElementById("tblSched2").rows.length - 1;

        for(var x = 0; x < rowSizeSched2; x++){
            if (d.getElementById('txtNameCorp'+ (x)) != null) { d.getElementById('txtNameCorp'+ (x)).value = ""};
      if (d.getElementById('txtStockCert'+ (x)) != null) { d.getElementById('txtStockCert'+ (x)).value = ""};
      if (d.getElementById('txtShares'+ (x)) != null) { d.getElementById('txtShares'+ (x)).value = ""};
      if (d.getElementById('txtFMVS'+ (x)) != null) { d.getElementById('txtFMVS'+ (x)).value = "0.00"};
      if (d.getElementById('txtFMVConjugal2'+ (x)) != null) { d.getElementById('txtFMVConjugal2'+ (x)).value = "0.00"};
      if (d.getElementById('txtFMVExclusive2'+ (x)) != null) { d.getElementById('txtFMVExclusive2'+ (x)).value = "0.00"};
    }
    }
  
  function cancelSched2Modal() {
        //restoreTempSched2Data();
    d.getElementById('mainContent').style.display = 'block';
  
    if ( $('#modalSched2and3').css('display') != 'none' ) {
      $('#modalSched2and3').hide('blind');    
    }
    $('#DummyTxt').html("Creator");
    $('#DummyTxt').html("");    
        isModalTurnOn = false;  
    
  } 

   function saveTempSched3Data() {
        tempRowSizeSched3 = d.getElementById("tblSched3").rows.length - 2;
        temptxtParticulars = new Array();
    temptxtFMVConjugal3 = new Array();
    temptxtFMVExclusive3 = new Array();
        
        for(var x = 0; x < tempRowSizeSched3; x++){
            temptxtParticulars[x] = d.getElementById('txtParticulars'+ (x)).value;
            temptxtFMVConjugal3[x] = d.getElementById('txtFMVConjugal3'+ (x)).value;
      temptxtFMVExclusive3[x] = d.getElementById('txtFMVExclusive3'+ (x)).value;
            
        }
    } 

    function addlistSched3Reload()
    {
            var size = sched3ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
        sched3ToCommit[i].txtParticulars = d.getElementById('txtParticulars'+i).value;
                sched3ToCommit[i].txtFMVConjugal3 = d.getElementById('txtFMVConjugal3'+i).value;
        sched3ToCommit[i].txtFMVExclusive3 = d.getElementById('txtFMVExclusive3'+i).value;
            }
            i = sched3ToCommit.length;
            sched3ToCommit[i] = new Schedule3();

      $('#tbodyllistSched3').html("");
      
            for(i = 0; i < sched3ToCommit.length; i++) {

         $('#tbodyllistSched3').html(  d.getElementById('tbodyllistSched3').innerHTML + "<tr>" + 
          "<td width='5%' align='center'> <input class='printButtonClass' type='checkbox' id='chxSched3"+i+"' /> </td>" +
                    "<td width='55%'> <input type='text' size='100' id='txtParticulars"+i+"' value='"+ sched3ToCommit[i].txtParticulars +"' maxlength='50' /> </td>" +
                    "<td width='20%'><input type='text' size='20' id='txtFMVExclusive3"+i+"' value='"+ sched3ToCommit[i].txtFMVExclusive3 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3a("+i+")' maxlength='17' />&nbsp;</td> " +
          "<td width='20%'><input type='text' size='20' id='txtFMVConjugal3"+i+"' value='"+ sched3ToCommit[i].txtFMVConjugal3 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3("+i+")' maxlength='17' />&nbsp;</td> </tr>");
        }
    } 
  
    function addlistSched3()
    {
        if(checkifEmptyFieldSched3()) {
            var size = sched3ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
        sched3ToCommit[i].txtParticulars = d.getElementById('txtParticulars'+i).value;
                sched3ToCommit[i].txtFMVConjugal3 = d.getElementById('txtFMVConjugal3'+i).value;
        sched3ToCommit[i].txtFMVExclusive3 = d.getElementById('txtFMVExclusive3'+i).value;
            }
            i = sched3ToCommit.length;
            sched3ToCommit[i] = new Schedule3();

      $('#tbodyllistSched3').html("");
      
            for(i = 0; i < sched3ToCommit.length; i++) {

         $('#tbodyllistSched3').html(  d.getElementById('tbodyllistSched3').innerHTML + "<tr>" + 
          "<td width='5%' align='center'> <input class='printButtonClass' type='checkbox' id='chxSched3"+i+"' name='chxSched3"+i+"' /> </td>" +
                    "<td width='55%'> <input type='text' size='100' id='txtParticulars"+i+"' name='txtParticulars[]' value='"+ sched3ToCommit[i].txtParticulars +"' maxlength='50' /> </td>" +
                    "<td width='20%'><input type='text' size='20' id='txtFMVExclusive3"+i+"' name='txtFMVExclusive3[]' value='"+ sched3ToCommit[i].txtFMVExclusive3 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3a("+i+")' maxlength='17' />&nbsp;</td> " +
          "<td width='20%'><input type='text' size='20' id='txtFMVConjugal3"+i+"' name='txtFMVConjugal3[]'  value='"+ sched3ToCommit[i].txtFMVConjugal3 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3("+i+")' maxlength='17' />&nbsp;</td> </tr>");

            
               // setTimeout("setInputTextControl_HorizontalAlignment('txtShares"+i+"',4 );setInputTextControl_NumberFormatterNonNegative('txtShares"+i+"',12,2);d.getElementById('txtShares"+i+"').value=d.getElementById('txtShares"+i+"').value;",100);
            }
        }
    }

    function deletelistSched3()
    {
        var sched3Temp = new Array();
        var i = 0;
        var size = sched3ToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
      sched3ToCommit[i].txtParticulars = d.getElementById('txtParticulars'+i).value;
            sched3ToCommit[i].txtFMVConjugal3 = d.getElementById('txtFMVConjugal3'+i).value;
      sched3ToCommit[i].txtFMVExclusive3 = d.getElementById('txtFMVExclusive3'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched3" + j).checked) {
                sched3Temp[i++] = sched3ToCommit[j];
            }
        }

        if(sched3Temp.length > 0) {
            sched3ToCommit = new Array();
            sched3ToCommit = sched3Temp;
      $('#tbodyllistSched3').html("");

            for(i = 0; i < sched3Temp.length; i++) {
                sched3ToCommit[i] = sched3Temp[i];
                //d.getElementById("tbodyllistSched3").innerHTML += "<tr>" +
        $('#tbodyllistSched3').html(  d.getElementById('tbodyllistSched3').innerHTML + "<tr>" + 
          "<td width='5%' align='center'> <input class='printButtonClass' type='checkbox' id='chxSched3"+i+"' /> </td>" +
                    "<td width='55%'> <input type='text' size='100' id='txtParticulars"+i+"' value='"+ sched3ToCommit[i].txtParticulars +"' maxlength='50' /> </td>" +
                    "<td width='20%'><input type='text' size='20' id='txtFMVExclusive3"+i+"' value='"+ sched3ToCommit[i].txtFMVExclusive3 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3a("+i+")' maxlength='17' />&nbsp;</td>" +
          "<td width='20%'><input type='text' size='20' id='txtFMVConjugal3"+i+"' value='"+ sched3ToCommit[i].txtFMVConjugal3 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3("+i+")' maxlength='17' />&nbsp;</td> </tr>");
           

              //  setTimeout("setInputTextControl_HorizontalAlignment('txtShares"+i+"',4 );",100);

            }
        } else {
            sched3ToCommit = new Array();
      $('#tbodyllistSched3').html("");
        }
        computeSumTax3();
    computeSumTax3a();
    } 
   
  function computeSumTax3(){
        var size = sched3ToCommit.length;
        var totalAmountTax = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtFMVConjugal3' + i).value)*1 ;
        }
        d.getElementById('frm1801:totalSch3AmountConj').value = formatCurrency(totalAmountTax);
    }
  
  function computeSumTax3a(){
        var size = sched3ToCommit.length;
        var totalAmountTax = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtFMVExclusive3' + i).value)*1 ;
        }
        d.getElementById('frm1801:totalSch3AmountExc').value = formatCurrency(totalAmountTax);
    }
  
    function checkifEmptyFieldSched3() {

        var size = sched3ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtParticulars'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 3.\n" +
                    "Empty fields are not allowed."); 
        return;
            } 
      if( d.getElementById('txtFMVConjugal3'+ i).value <= 0 && d.getElementById('txtFMVExclusive3'+ i).value <= 0) {
                alert("Please enter a valid amount on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); 
        return;
            }
      
        }

        return true;
    }
  
  function Schedule3()
    {
    this.txtParticulars = '';
        this.txtFMVConjugal3 = '';
    this.txtFMVExclusive3 = '';
    } 
  
   function getSched3Modal(){
        if (checkifEmptyFieldSched3() && checkifEmptyFieldSched2())
        {
       d.getElementById('mainContent').style.display = 'block';
       if ( $('#modalSched2and3').css('display') != 'none' ) {
        $('#modalSched2and3').hide('blind');
        $('#wrapper').css({'display':'block'});  
       }      
       $('#DummyTxt').html("Creator");
       $('#DummyTxt').html("");     

          
            isModalTurnOn = false;
        }
    }
  
   function clearSched3Modal() {
        var rowSizeSched3 = d.getElementById("tblSched3").rows.length - 1;

        for(var x = 0; x < rowSizeSched3; x++){
            if (d.getElementById('txtParticulars'+ (x)) != null) {d.getElementById('txtParticulars'+ (x)).value = ""};
      if (d.getElementById('txtFMVConjugal3'+ (x)) != null) {d.getElementById('txtFMVConjugal3'+ (x)).value = "0.00"};
      if (d.getElementById('txtFMVExclusive3'+ (x)) != null) {d.getElementById('txtFMVExclusive3'+ (x)).value = "0.00"};
    }
    }
  
  function cancelSched3Modal() {
       
    d.getElementById('mainContent').style.display = 'block';
  
    if ( $('#modalSched2and3').css('display') != 'none' ) {
      $('#modalSched2and3').hide('blind');    
    }
    $('#DummyTxt').html("Creator");
    $('#DummyTxt').html("");    
        isModalTurnOn = false;  
    } 
  
  function addsched2and3()
  {
    var sch2exc = NumWithComma(d.getElementById('frm1801:totalSch2AmountExc').value)*1;
    var sch2conj = NumWithComma(d.getElementById('frm1801:totalSch2AmountConj').value)*1;
    var sch3exc = NumWithComma(d.getElementById('frm1801:totalSch3AmountExc').value)*1;
    var sch3conj = NumWithComma(d.getElementById('frm1801:totalSch3AmountConj').value)*1;
    d.getElementById('frm1801:txt18A').value = formatCurrency(sch2exc + sch3exc);
    d.getElementById('frm1801:txt18B').value = formatCurrency(sch2conj + sch3conj);
    
    compute18c();
  }
  
  
  function showSched4()
  {
    d.getElementById('mainContent').style.display = "none";
      $('#modalSched4').show('blind'); 
      $('#wrapper').css({'display':'none'});   
    }
  
   function saveTempSched4Data() {
        tempRowSizeSched4 = d.getElementById("tblSched4").rows.length - 2;
        temptxtParticulars4 = new Array();
    temptxtFMVConjugal4 = new Array();
    temptxtFMVExclusive4 = new Array();
        
        for(var x = 0; x < tempRowSizeSched4; x++){
            temptxtParticulars4[x] = d.getElementById('txtParticulars4'+ (x)).value;
            temptxtFMVConjugal4[x] = d.getElementById('txtFMVConjugal4'+ (x)).value;
      temptxtFMVExclusive4[x] = d.getElementById('txtFMVExclusive4'+ (x)).value;
            
        }
    } 

    function addlistSched4Reload()
    {
            var size = sched4ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
        sched4ToCommit[i].txtParticulars4 = d.getElementById('txtParticulars4'+i).value;
                sched4ToCommit[i].txtFMVConjugal4 = d.getElementById('txtFMVConjugal4'+i).value;
        sched4ToCommit[i].txtFMVExclusive4 = d.getElementById('txtFMVExclusive4'+i).value;
            }
            i = sched4ToCommit.length;
            sched4ToCommit[i] = new Schedule4();

      $('#tbodyllistSched4').html("");
      
            for(i = 0; i < sched4ToCommit.length; i++) {

         $('#tbodyllistSched4').html(  d.getElementById('tbodyllistSched4').innerHTML + "<tr>" + 
          "<td width='5%' align='center'> <input class='printButtonClass' type='checkbox' id='chxSched4"+i+"' /> </td>" +
                    "<td width='55%'> <input type='text' size='100' id='txtParticulars4"+i+"' value='"+ sched4ToCommit[i].txtParticulars4 +"' maxlength='50' /> </td>" +
                    "<td width='20%'><input type='text' size='20' id='txtFMVExclusive4"+i+"' value='"+ sched4ToCommit[i].txtFMVExclusive4 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax4a("+i+")' maxlength='17' />&nbsp;</td> " +
          "<td width='20%'><input type='text' size='20' id='txtFMVConjugal4"+i+"' value='"+ sched4ToCommit[i].txtFMVConjugal4 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax4("+i+")' maxlength='17' />&nbsp;</td> </tr>");

            
               // setTimeout("setInputTextControl_HorizontalAlignment('txtShares"+i+"',4 );setInputTextControl_NumberFormatterNonNegative('txtShares"+i+"',12,2);d.getElementById('txtShares"+i+"').value=d.getElementById('txtShares"+i+"').value;",100);
            }
    } 
  
    function addlistSched4()
    {
        if(checkifEmptyFieldSched4()) {
            var size = sched4ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
        sched4ToCommit[i].txtParticulars4 = d.getElementById('txtParticulars4'+i).value;
                sched4ToCommit[i].txtFMVConjugal4 = d.getElementById('txtFMVConjugal4'+i).value;
        sched4ToCommit[i].txtFMVExclusive4 = d.getElementById('txtFMVExclusive4'+i).value;
            }
            i = sched4ToCommit.length;
            sched4ToCommit[i] = new Schedule4();

      $('#tbodyllistSched4').html("");
      
            for(i = 0; i < sched4ToCommit.length; i++) {

         $('#tbodyllistSched4').html(  d.getElementById('tbodyllistSched4').innerHTML + "<tr>" + 
          "<td width='5%' align='center'> <input class='printButtonClass' type='checkbox' id='chxSched4"+i+"' name='chxSched4"+i+"' /> </td>" +
                    "<td width='55%'> <input type='text' size='100' id='txtParticulars4"+i+"' name='txtParticulars4[]'  value='"+ sched4ToCommit[i].txtParticulars4 +"' maxlength='50' /> </td>" +
                    "<td width='20%'><input type='text' size='20' id='txtFMVExclusive4"+i+"' name='txtFMVExclusive4[]'  value='"+ sched4ToCommit[i].txtFMVExclusive4 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax4a("+i+")' maxlength='17' />&nbsp;</td> " +
          "<td width='20%'><input type='text' size='20' id='txtFMVConjugal4"+i+"' name='txtFMVConjugal4[]'  value='"+ sched4ToCommit[i].txtFMVConjugal4 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax4("+i+")' maxlength='17' />&nbsp;</td> </tr>");
           }
        }
    }

    function deletelistSched4()
    {
        var sched4Temp = new Array();
        var i = 0;
        var size = sched4ToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
      sched4ToCommit[i].txtParticulars4 = d.getElementById('txtParticulars4'+i).value;
            sched4ToCommit[i].txtFMVConjugal4 = d.getElementById('txtFMVConjugal4'+i).value;
      sched4ToCommit[i].txtFMVExclusive4 = d.getElementById('txtFMVExclusive4'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched4" + j).checked) {
                sched4Temp[i++] = sched4ToCommit[j];
            }
        }

        if(sched4Temp.length > 0) {
            sched4ToCommit = new Array();
            sched4ToCommit = sched4Temp;
      $('#tbodyllistSched4').html("");

            for(i = 0; i < sched4Temp.length; i++) {
                sched4ToCommit[i] = sched4Temp[i];
                //d.getElementById("tbodyllistSched4").innerHTML += "<tr>" +
        $('#tbodyllistSched4').html(  d.getElementById('tbodyllistSched4').innerHTML + "<tr>" + 
          "<td width='5%' align='center'> <input class='printButtonClass' type='checkbox' id='chxSched4"+i+"' /> </td>" +
                    "<td width='55%'> <input type='text' size='100' id='txtParticulars4"+i+"' value='"+ sched4ToCommit[i].txtParticulars4 +"' maxlength='50' /> </td>" +
                    "<td width='20%'><input type='text' size='20' id='txtFMVExclusive4"+i+"' value='"+ sched4ToCommit[i].txtFMVExclusive4 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax4a("+i+")' maxlength='17' />&nbsp;</td>" +
          "<td width='20%'><input type='text' size='20' id='txtFMVConjugal4"+i+"' value='"+ sched4ToCommit[i].txtFMVConjugal4 +"' style='text-align: right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax4("+i+")' maxlength='17' />&nbsp;</td> </tr>");
           


                //setTimeout("setInputTextControl_HorizontalAlignment('txtShares"+i+"',4 );",100);

            }
        } else {
            sched4ToCommit = new Array();
      $('#tbodyllistSched4').html("");
        }
        computeSumTax4();
    computeSumTax4a();
    } 
   
  function computeSumTax4(){
        var size = sched4ToCommit.length;
        var totalAmountTax = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtFMVConjugal4' + i).value)*1 ;
        }
        d.getElementById('frm1801:totalSch4AmountConj').value = formatCurrency(totalAmountTax);
    }
  
  function computeSumTax4a(){
        var size = sched4ToCommit.length;
        var totalAmountTax = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtFMVExclusive4' + i).value)*1 ;
        }
        d.getElementById('frm1801:totalSch4AmountExc').value = formatCurrency(totalAmountTax);
    }
  
    function checkifEmptyFieldSched4() {

        var size = sched4ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtParticulars4'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 4.\n" +
                    "Empty fields are not allowed."); return ;
            } 
      if( d.getElementById('txtFMVConjugal4'+ i).value <= 0 && d.getElementById('txtFMVExclusive4'+ i).value <= 0) {
                alert("Please enter a valid amount on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
     
        }

        return true;
    }
  
  function Schedule4()
    {
    this.txtParticulars4 = '';
        this.txtFMVConjugal4 = '';
    this.txtFMVExclusive4 = '';
    } 
  
   function getSched4Modal(){
        if (checkifEmptyFieldSched4() )
        {
       d.getElementById('mainContent').style.display = 'block';
       if ( $('#modalSched4').css('display') != 'none' ) {
        $('#modalSched4').hide('blind');
        $('#wrapper').css({'display':'block'});
       }
       $('#DummyTxt').html("Creator");
       $('#DummyTxt').html("");     

            d.getElementById('frm1801:txt20A').value  = d.getElementById('frm1801:totalSch4AmountExc').value;
      d.getElementById('frm1801:txt20B').value  = d.getElementById('frm1801:totalSch4AmountConj').value;

            compute20c();

            isModalTurnOn = false;
        }
    }
  
   function clearSched4Modal() {
        var rowSizeSched4 = d.getElementById("tblSched4").rows.length - 1;

        for(var x = 0; x < rowSizeSched4; x++){
            if (d.getElementById('txtParticulars4'+ (x)) != null) {d.getElementById('txtParticulars4'+ (x)).value = ""};
      if (d.getElementById('txtFMVConjugal4'+ (x)) != null) {d.getElementById('txtFMVConjugal4'+ (x)).value = "0.00"};
      if (d.getElementById('txtFMVExclusive4'+ (x)) != null) {d.getElementById('txtFMVExclusive4'+ (x)).value = "0.00"};
    }
    }
  
  function cancelSched4Modal() {
        //restoreTempSched2Data();
    d.getElementById('mainContent').style.display = 'block';
  
    if ( $('#modalSched4').css('display') != 'none' ) {
      $('#modalSched4').hide('blind');    
    }
    $('#DummyTxt').html("Creator");
    $('#DummyTxt').html("");    
        isModalTurnOn = false;  
    } 
  
  function cancelSched5Modal() {
    d.getElementById('mainContent').style.display = 'block';
  
    if ( $('#modalSched5').css('display') != 'none' ) {
      $('#modalSched5').hide('blind');    
    }
    $('#DummyTxt').html("Creator");
    $('#DummyTxt').html("");    
        isModalTurnOn = false;  
    } 
  
  function showSched5()
  {
    d.getElementById('mainContent').style.display = "none";
      $('#modalSched5').show('blind');  
      $('#wrapper').css({'display':'none'});
    }
  
  function getSched5Modal()
  {
      d.getElementById('mainContent').style.display = 'block';
      $('#modalSched5').hide('blind');
      $('#DummyTxt').html("Creator");
      $('#wrapper').css({'display':'block'});
      $('#DummyTxt').html("");  
      
      compute22c();
      compute23a();
      compute23b(); 
      compute23c();     
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
    if( (document.getElementById('frm1801:txtTIN1').value == "")  )
    {
      alert("Please enter the Taxpayer's TIN.")
      return false;
    }
    if( (document.getElementById('frm1801:txtTIN2').value == "")  )
    {
      alert("Please enter the Taxpayer's TIN.")
      return false;
    }
    if( (document.getElementById('frm1801:txtTIN3').value == "")  )
    {
      alert("Please enter the Taxpayer's TIN.")
      return false;
    }
    if( (document.getElementById('frm1801:txtBranchCode').value == "")  )
    {
      alert("Please enter the Taxpayer's TIN.")
      return false;
    }
    if ((document.getElementById('frm1801:txtRDOCode').value == "000")) {
        alert("Please enter a valid Taxpayer's RDO Code.")
        return false;
    }
    if( (document.getElementById('frm1801:txtTaxpayer').value == "")  )
    {
      alert("Please enter the Taxpayer's Name.")
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
  cancelSched1Modal();
  cancelSched1XModal();
  cancelSched2Modal();
  cancelSched3Modal();
  cancelSched4Modal();
  cancelSched5Modal();
  
  $('#bg').hide();
  $('.printSignFooterClass_1801').css({ 'width':'800px','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always', 'background':'#ffffff' }); 
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

    $("#modalSched1").hide();
    $("#modalSched1X").hide();
    $("#modalSched2and3").hide();
    $("#modalSched4").hide();
    $("#modalSched5").hide();

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
                    save('1801',data);
                    
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
            saveAndExit('1801',data);
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

            submitAndSave('1801', data, company_id);
            
            disabled.attr('disabled','disabled');
            return false;
        }

        function gotoMain(){
            var company_id = $('#frmMain').find('input[name="company"]').val();
            window.location = '/companies/'+ company_id +'/histories/1801';
        }

</script>
@endsection