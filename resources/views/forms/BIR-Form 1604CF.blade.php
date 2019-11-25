@extends('layouts.app')
@section('title', '| BIR Form No. 1604CF')

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
        <button type="button" class="btn btn-danger btn-exit" id="1604CF" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1604CF" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1604CF' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 926px;" >
                <div id = "formPaper">
          <div id="mainContent">
                    <table width="926" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="926" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
                                    <tr>
                    <td width="82"  style='padding:0px;' valign="middle" align="center">                    
                        <p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p>
                      </td> 
                                        <td width="184" valign="middle">
                                            <label face="Arial" size="1px">Republika ng Pilipinas
                                            <br/>Kagawaran ng Pananalapi
                                            <br/>Kawanihan ng Rentas
                                            <br/>Internas</label>
                                        </td>
                                        <td width="0" align="center">
                                            <font size="3px" style="font-weight:bold;">
                        Annual Information Return<br/>
                        of Income Taxes Withheld on<br/>
                        Compensation and Final Withholding Taxes
                      </font>
                                        </td>
                                        <td width="184" valign="center">
                      <font face="Arial" size="1px">BIR Form No.<br/></font>
                                            <font face="Arial" size="5px" style="font-weight:bold;">1604-CF<br/></font>
                                            <font face="Arial" size="1px">July 2008(ENCS)</font>
                    </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="920" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="30%" valign="top" class="tblFormTd">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td colspan="2"><font size="1" style="font-size: 11px;">For the Year (YYYY)
                                                            <input type="text" value="" size="5" name="frm1604cf:txtYear" maxlength="4" id="frm1604cf:txtYear" onkeypress="return wholenumber(this, event)" onblur="blockletterWithout2Decimal(this)"/>
                                                        </font></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="36%" valign="top" class="tblFormTd">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="8%"><font size="2" style="font-weight:bold;">2</font></td>
                                                    <td width="32%"><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                    <td width="60%">
                                                        <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1604cf:j_id217" class="iceSelOneRb-dis fieldText1-dis">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="Y" name="frm1604cf:amendedRtn" id="frm1604cf:amendedRtn_1" /><font size="1">Yes</font>&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" value="N"  name="frm1604cf:amendedRtn" id="frm1604cf:amendedRtn_2" checked="checked" /><font size="1">No</font></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                        </fieldset>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="33%" valign="top" class="tblFormTd">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">No. of Sheets Attached?
                                                            <input type="text" value="0" style="text-align: right;" size="4" name="frm1604cf:txtSheets" maxlength="2" id="frm1604cf:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" />
                                                        </font></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="920" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="7%"><font size="2" style="font-weight:bold;">Part I</font></td>
                                                    <td width="93%" align="center">
                                                        <font size="2" style="font-weight:bold;letter-spacing: 3px;">Background Information</font>
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
                                <table width="920" border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                    <tr>
                                        <td width="30%" valign="top" class="tblFormTd">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;4&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="{{$company->tin1}}"  size="2" name="frm1604cf:tinA" maxlength="3" id="frm1604cf:tinA" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin2}}"  size="2" name="frm1604cf:tinB" maxlength="3" id="frm1604cf:tinB" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin3}}"  size="2" name="frm1604cf:tinC" maxlength="3" id="frm1604cf:tinC" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin4}}"  size="2" name="frm1604cf:branchCode" maxlength="3" id="frm1604cf:branchCode" onkeypress="return letternumber(event)" />
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="20%" valign="top" class="tblFormTd">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                    <td id="rdoSelect">
                                                      <select class='iceSelOneMnu' id='frm1604cf:rdoCode' disabled name='frm1604cf:rdoCode' size='1' >
                                                        <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                      </select>
                                                        
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="50%" valign="top" class="tblFormTd">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">Line of Business/Occupation&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="{{$company->line_business}}" size="20" name="frm1604cf:description" maxlength="30" id="frm1604cf:description" onblur="return capital(this, event)" />
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
                                <table width="920" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="79%" valign="top" class="tblFormTd">
                                            <table width="547" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="529">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="11"><font size="2" style="font-weight:bold;">&nbsp;7&nbsp;</font></td>
                                                                <td><font size="1" style="font-size: 11px;">Taxpayer's Name (Last Name, First Name, Middle Name for Individuals)/(Registered Name for Non-Individuals)</font></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="25">&nbsp;</td>
                                                                <td><input type="text" value="{{$company->registered_name}}" disabled size="70" name="frm1604cf:registeredName" maxlength="70" id="frm1604cf:registeredName" onblur="return capital(this, event)" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="21%" valign="top" class="tblFormTd">
                                            <table width="149" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="149"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font><font size="1" style="font-size: 11px;">Telephone
                                                            Number</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" value="{{$company->tel_number}}" disabled  size="15" name="frm1604cf:telephoneNumber" maxlength="20" id="frm1604cf:telephoneNumber" onkeypress="return wholenumber(this, event)" />
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
                                <table width="920" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="70%" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="11"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font></td>
                                                                <td><font size="1"  style="font-size: 11px;">Registered Address</font></td>
                                <td><input type="text" value="{{$company->address}}" disabled  size="70" name="frm1604cf:registeredAddress" maxlength="70" id="frm1604cf:registeredAddress" onblur="return capital(this, event)"/></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="30%" valign="top" class="tblFormTd">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="50%"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font><font size="1"  style="font-size: 11px;">Zip
                                                            Code</font></td>
                                                    <td>
                                                        <div align="left">
                                                            <input type="text" value="{{$company->zip_code}}" disabled=""  size="12" name="frm1604cf:zipCode" maxlength="12" id="frm1604cf:zipCode" onkeypress="return wholenumber(this, event)" />
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="0px" colspan="2" valign="top" class="tblFormTd">
                      <table width="721" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="485">
                            <font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font>
                            <font size="1" style="font-size: 11px;">In case of overwithholding/overremittance after the year-end adjustment on compensation,<br />
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;have you released the refunds to your employees?</font>
                          </td>
                                                    <td width="236">
                            <font size="1" face="Arial" style="font-size: 11px;">If yes, specify the date of refund (mm/dd/yyyy)</font>
                          </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:300px" id="frm1604cf:j_id398" class="iceSelOneRb-dis fieldText1-dis">
                                                                <div align="center" style="padding: 1px 0 1px 0;">
                                                                    <div align="left"></div>
                                                                    <table border="0" align="left" cellpadding="0" cellspacing="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><font size="1" face="Arial">
                                                                                        <input type="radio" value="Y" name="frm1604cf:releasedOfFunds" id="frm1604cf:releasedOfFunds_1"  onclick="changeRefund()" />
                                                                                        <font size="1">Yes</font>
                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
                                                                                <td><font size="1" face="Arial">
                                                                                        <input type="radio" value="N" name="frm1604cf:releasedOfFunds" id="frm1604cf:releasedOfFunds_2"  checked="checked" onclick="changeRefund()" />
                                                                                        <font size="1">No</font>
                                                                                    </font></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                    </td>
                                                    <td>
                                                        <font size="1">
                                                            <select class="iceSelOneMnu-dis" disabled="disabled" id="frm1604cf:txtRefMonth" name="frm1604cf:txtRefMonth" size="1">
                                                                <option selected="selected" value="00"></option>
                                                                <option value="01">01</option>
                                                                <option value="02">02</option>
                                                                <option value="03">03</option>
                                                                <option value="04">04</option>
                                                                <option value="05">05</option>
                                                                <option value="06">06</option>
                                                                <option value="07">07</option>
                                                                <option value="08">08</option>
                                                                <option value="09">09</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                            <input class="iceInpTxt-dis" disabled="true" id="frm1604cf:txtRefDate" maxlength="2" name="frm1604cf:txtRefDate" size="2" type="text" onblur="blockLetterInt(this)" />
                                                            <input class="iceInpTxt-dis" disabled="true" id="frm1604cf:txtRefYear" maxlength="4" name="frm1604cf:txtRefYear" size="4" type="text" onblur="blockLetterInt(this)" />
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
                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="920" height="0px">
                                    <tr>
                                        <td width="38%" height="0px" valign="top" class="tblFormTd">
                                            <table width="300" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="216"><font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font><font size="1" style="font-size: 11px;">Total Amount of Overremittance on Tax Withheld under Compensation </font></td>
                                                    <td width="100">
                                                        <font size="2" face="Arial">
                                                            <input class="iceInpTxt-dis" disabled="true" id="frm1604cf:txt12" maxlength="17" name="frm1604cf:txt12" size="17" style="text-align: right;" type="text" onblur="blockletter(this);round(this,2)" />
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td class="tblFormTd" valign="top" width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="60%" nowrap><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font><font size="1" style="font-size: 11px;">Month of First Crediting of Overremittance</font></td>
                                                    <td width="40%"><font size="2" face="Arial">
                                                            <select class="iceSelOneMnu-dis" disabled="disabled" id="frm1604cf:select13" name="frm1604cf:select13"  size="1">
                                                                <option selected="selected" value="00"></option>
                                                                <option value="01">01</option>
                                                                <option value="02">02</option>
                                                                <option value="03">03</option>
                                                                <option value="04">04</option>
                                                                <option value="05">05</option>
                                                                <option value="06">06</option>
                                                                <option value="07">07</option>
                                                                <option value="08">08</option>
                                                                <option value="09">09</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                        </font></td>
                                                </tr>
                                            </table></td>
                                        <td class="tblFormTd" valign="top" width="36%">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="50%"><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;</font><font size="1" style="font-size: 11px;">Category of Withholding Agent</font></td>
                                                
                                                    <td width="50%">
                                                        <div align="center">
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:100%;" id="frm1604cf:j_id392" >
                                                                <div align="center" style="padding: 0px 0 0px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="radio" value="P" name="frm1604cf:categoryAgent" id="frm1604cf:categoryAgent_1" />
                                                                                    <font size="1">Private</font>
                                                                                </td>
                                                                                <td><input type="radio" value="G" name="frm1604cf:categoryAgent" id="frm1604cf:categoryAgent_2" />
                                                                                    <font size="1">Government</font></td>
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
                                <table width="920" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table width="" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part
                                                            II</font></td>
                                                    <td width="620">
                                                        <div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;">S u m m a r y &nbsp; o f
                                                                &nbsp; R e m i t t a n c e s</font></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tblFormTdPart"><table width="" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Schedule 1</font></td>
                                                    <td width="620"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><font
                                                                    size="2"><b>R e m i t t a n c e &nbsp; p e r &nbsp; B I R &nbsp; F o r m &nbsp; N o. &nbsp; 1 6 0 1 - C</b></font></font></div></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="920" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTd"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                                                <tr>
                        
                                                    <td width="10%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">MONTH</font></div></td>
                                                    <td width="15%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">DATE OF REMITTANCE</font></div></td>
                                                    <td width="15%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">NAME OF BANK/BANK CODE/ROR NO., IF ANY</font></div></td>
                                                    <td width="15%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">TAXES WITHHELD</font></div></td>
                                                    <td width="15%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">ADJUSTMENT</font></div></td>
                                                    <td width="15%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">PENALTIES</font></div></td>
                                                    <td width="15%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">TOTAL AMOUNT REMITTED</font></div></td>                        
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="1px">JAN</font></td>
                                                    <td align="center">
                                                        <font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched1Date1" maxlength="10" name="frm1604cf:txtSched1Date1"
                                                                   size="12" style="background-color: white; color: black; text-align:
                                                                   right;" type="text" />
                                                        </font>
                                                    </td>
                                                    <td align="center">
                                                        <font face="Arial" size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched1BankVal1"
                                                                   maxlength="50" name="frm1604cf:txtSched1BankVal1"  size="12" type="text" />
                                                        </font>
                                                    </td>
                                                    <td>
                                                        <font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched1TaxWheld1" maxlength="25"
                                                                   name="frm1604cf:txtSched1TaxWheld1" size="20" style="text-align: right; font-family:
                                                                   Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('1');computeTotalAmount('1','1')" />
                                                        </font>
                                                    </td>
                                                    <td>
                                                        <font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched1Adj1" maxlength="25"
                                                                   name="frm1604cf:txtSched1Adj1" size="20" style="text-align: right; font-family:
                                                                   Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="negative(); return number(this, event)" value="0.00" type="text" onblur="round(this,2);computeTotalAdjustment();computeTotalAmount('1','1')" />
                                                        </font
                                                        ></td>
                                                    <td>
                                                        <font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched1Pen1" maxlength="25"
                                                                   name="frm1604cf:txtSched1Pen1" size="20" style="text-align: right; font-family:
                                                                   Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('1');computeTotalAmount('1','1')" />
                                                        </font>
                                                    </td>
                                                    <td>
                                                        <font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched1TotalAmt1" maxlength="25"
                                                                   name="frm1604cf:txtSched1TotalAmt1" size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="1px">FEB</font></td>
                                                    <td align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched1Date2" maxlength="10"
                                                                name="frm1604cf:txtSched1Date2" size="12" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></td>
                                                    <td align="center"><font face="Arial"
                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched1BankVal2"
                                                                   maxlength="50" name="frm1604cf:txtSched1BankVal2" size="12" type="text" />
                                                        </font></td>
                                                    <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched1TaxWheld2" maxlength="25"
                                                                name="frm1604cf:txtSched1TaxWheld2" size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('1');computeTotalAmount('1','2')" />
                                                        </font></td>
                                                    <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched1Adj2" maxlength="25"
                                                                name="frm1604cf:txtSched1Adj2" size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="negative(); return number(this, event)" value="0.00" type="text" onblur="round(this,2);computeTotalAdjustment();computeTotalAmount('1','2')" />
                                                        </font></td>
                                                    <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched1Pen2" maxlength="25"
                                                                name="frm1604cf:txtSched1Pen2" size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('1');computeTotalAmount('1','2')" />
                                                        </font></td>
                                                    <td><font face="Arial, Helvetica, sans-serif"
                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched1TotalAmt2" maxlength="25"
                                                                   name="frm1604cf:txtSched1TotalAmt2" size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="1px">MAR</font></td>
                                                    <td align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched1Date3" maxlength="10"
                                                                name="frm1604cf:txtSched1Date3" size="12" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></td>
                                                    <td align="center"><font face="Arial"
                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched1BankVal3"
                                                                   maxlength="50" name="frm1604cf:txtSched1BankVal3" size="12" type="text" />
                                                        </font></td>
                                                    <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched1TaxWheld3" maxlength="25"
                                                                name="frm1604cf:txtSched1TaxWheld3" size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('1');computeTotalAmount('1','3')" />
                                                        </font></td>
                                                    <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched1Adj3" maxlength="25"
                                                                name="frm1604cf:txtSched1Adj3" size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="negative(); return number(this, event)" value="0.00" type="text" onblur="round(this,2);computeTotalAdjustment();computeTotalAmount('1','3')" />
                                                        </font></td>
                                                    <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched1Pen3" maxlength="25"
                                                                name="frm1604cf:txtSched1Pen3" size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('1');computeTotalAmount('1','3')" />
                                                        </font></td>
                                                    <td><font face="Arial, Helvetica, sans-serif"
                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched1TotalAmt3" maxlength="25"
                                                                   name="frm1604cf:txtSched1TotalAmt3" size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="1px">APR</font></td>
                                                    <td align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched1Date4" maxlength="10" name="frm1604cf:txtSched1Date4"
                                                                   size="12" style="background-color: white; color: black;" type="text" />
                                                    </font></td>
                                                <td align="center"><font face="Arial"
                                                          size="2">
                                                        <input class="iceInpTxt" id="frm1604cf:txtSched1BankVal4"
                                                               maxlength="50" name="frm1604cf:txtSched1BankVal4" size="12" type="text" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1TaxWheld4" maxlength="25"
                                                            name="frm1604cf:txtSched1TaxWheld4" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('1');computeTotalAmount('1','4')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Adj4" maxlength="25"
                                                            name="frm1604cf:txtSched1Adj4" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="negative(); return number(this, event)" value="0.00" type="text" onblur="round(this,2);computeTotalAdjustment();computeTotalAmount('1','4')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Pen4" maxlength="25"
                                                            name="frm1604cf:txtSched1Pen4" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('1');computeTotalAmount('1','4')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif"
                                                          size="2">
                                                        <input class="iceInpTxt-dis" disabled="true"
                                                               id="frm1604cf:txtSched1TotalAmt4" maxlength="25"
                                                               name="frm1604cf:txtSched1TotalAmt4" size="20" style="text-align: right;
                                                               font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                               background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                    </font></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">MAY</font></td>
                                                <td align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Date5" maxlength="10"
                                                            name="frm1604cf:txtSched1Date5" size="12" style="background-color: white; color: black; text-align:
                                                            right;" type="text" />
                                                    </font></td>
                                                <td align="center"><font face="Arial"
                                                          size="2">
                                                        <input class="iceInpTxt" id="frm1604cf:txtSched1BankVal5"
                                                               maxlength="50" name="frm1604cf:txtSched1BankVal5"  size="12" type="text" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1TaxWheld5" maxlength="25"
                                                            name="frm1604cf:txtSched1TaxWheld5" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('1');computeTotalAmount('1','5')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Adj5" maxlength="25"
                                                            name="frm1604cf:txtSched1Adj5" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="negative(); return number(this, event)" value="0.00" type="text" onblur="round(this,2);computeTotalAdjustment();computeTotalAmount('1','5')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Pen5" maxlength="25"
                                                            name="frm1604cf:txtSched1Pen5" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('1');computeTotalAmount('1','5')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif"
                                                          size="2">
                                                        <input class="iceInpTxt-dis" disabled="true"
                                                               id="frm1604cf:txtSched1TotalAmt5" maxlength="25"
                                                               name="frm1604cf:txtSched1TotalAmt5" size="20" style="text-align: right;
                                                               font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                               background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                    </font></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">JUN</font></td>
                                                <td align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Date6" maxlength="10"
                                                            name="frm1604cf:txtSched1Date6" size="12" style="background-color: white; color: black; text-align:
                                                            right;" type="text" />
                                                    </font></td>
                                                <td align="center"><font face="Arial"
                                                          size="2">
                                                        <input class="iceInpTxt" id="frm1604cf:txtSched1BankVal6"
                                                               maxlength="50" name="frm1604cf:txtSched1BankVal6"  size="12" type="text" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1TaxWheld6" maxlength="25"
                                                            name="frm1604cf:txtSched1TaxWheld6" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('1');computeTotalAmount('1','6')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Adj6" maxlength="25"
                                                            name="frm1604cf:txtSched1Adj6" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="negative(); return number(this, event)" value="0.00" type="text" onblur="round(this,2);computeTotalAdjustment();computeTotalAmount('1','6')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Pen6" maxlength="25"
                                                            name="frm1604cf:txtSched1Pen6" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('1');computeTotalAmount('1','6')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif"
                                                          size="2">
                                                        <input class="iceInpTxt-dis" disabled="true"
                                                               id="frm1604cf:txtSched1TotalAmt6" maxlength="25"
                                                               name="frm1604cf:txtSched1TotalAmt6" size="20" style="text-align: right;
                                                               font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                               background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                    </font></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">JUL</font></td>
                                                <td align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Date7" maxlength="10"
                                                            name="frm1604cf:txtSched1Date7" size="12" style="background-color: white; color: black; text-align:
                                                            right;" type="text" />
                                                    </font></td>
                                                <td align="center"><font face="Arial"
                                                          size="2">
                                                        <input class="iceInpTxt" id="frm1604cf:txtSched1BankVal7"
                                                               maxlength="50" name="frm1604cf:txtSched1BankVal7" size="12" type="text" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1TaxWheld7" maxlength="25"
                                                            name="frm1604cf:txtSched1TaxWheld7" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('1');computeTotalAmount('1','7')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Adj7" maxlength="25"
                                                            name="frm1604cf:txtSched1Adj7" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="negative(); return number(this, event)" value="0.00" type="text" onblur="round(this,2);computeTotalAdjustment();computeTotalAmount('1','7')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Pen7" maxlength="25"
                                                            name="frm1604cf:txtSched1Pen7" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('1');computeTotalAmount('1','7')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif"
                                                          size="2">
                                                        <input class="iceInpTxt-dis" disabled="true"
                                                               id="frm1604cf:txtSched1TotalAmt7" maxlength="25"
                                                               name="frm1604cf:txtSched1TotalAmt7" size="20" style="text-align: right;
                                                               font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                               background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                    </font></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">AUG</font></td>
                                                <td align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Date8" maxlength="10"
                                                            name="frm1604cf:txtSched1Date8" size="12" style="background-color: white; color: black; text-align:
                                                            right;" type="text" />
                                                    </font></td>
                                                <td align="center"><font face="Arial"
                                                          size="2">
                                                        <input class="iceInpTxt" id="frm1604cf:txtSched1BankVal8"
                                                               maxlength="50" name="frm1604cf:txtSched1BankVal8" size="12" type="text" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1TaxWheld8" maxlength="25"
                                                            name="frm1604cf:txtSched1TaxWheld8" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('1');computeTotalAmount('1','8')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Adj8" maxlength="25"
                                                            name="frm1604cf:txtSched1Adj8" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="negative(); return number(this, event)" value="0.00" type="text" onblur="round(this,2);computeTotalAdjustment();computeTotalAmount('1','8')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Pen8" maxlength="25"
                                                            name="frm1604cf:txtSched1Pen8" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('1');computeTotalAmount('1','8')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif"
                                                          size="2">
                                                        <input class="iceInpTxt-dis" disabled="true"
                                                               id="frm1604cf:txtSched1TotalAmt8" maxlength="25"
                                                               name="frm1604cf:txtSched1TotalAmt8" size="20" style="text-align: right;
                                                               font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                               background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                    </font></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">SEP</font></td>
                                                <td align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Date9" maxlength="10"
                                                            name="frm1604cf:txtSched1Date9" size="12" style="background-color: white; color: black; text-align:
                                                            right;" type="text" />
                                                    </font></td>
                                                <td align="center"><font face="Arial"
                                                          size="2">
                                                        <input class="iceInpTxt" id="frm1604cf:txtSched1BankVal9"
                                                               maxlength="50" name="frm1604cf:txtSched1BankVal9" size="12" type="text" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1TaxWheld9" maxlength="25"
                                                            name="frm1604cf:txtSched1TaxWheld9" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('1');computeTotalAmount('1','9')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Adj9" maxlength="25"
                                                            name="frm1604cf:txtSched1Adj9" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="negative(); return number(this, event)" value="0.00" type="text" onblur="round(this,2);computeTotalAdjustment();computeTotalAmount('1','9')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Pen9" maxlength="25"
                                                            name="frm1604cf:txtSched1Pen9" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('1');computeTotalAmount('1','9')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif"
                                                          size="2">
                                                        <input class="iceInpTxt-dis" disabled="true"
                                                               id="frm1604cf:txtSched1TotalAmt9" maxlength="25"
                                                               name="frm1604cf:txtSched1TotalAmt9" size="20" style="text-align: right;
                                                               font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                               background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                    </font></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">OCT</font></td>
                                                <td align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Date10" maxlength="10"
                                                            name="frm1604cf:txtSched1Date10" size="12" style="background-color: white; color: black; text-align:
                                                            right;" type="text" />
                                                    </font></td>
                                                <td align="center"><font face="Arial"
                                                          size="2">
                                                        <input class="iceInpTxt" id="frm1604cf:txtSched1BankVal10"
                                                               maxlength="50" name="frm1604cf:txtSched1BankVal10" size="12" type="text" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1TaxWheld10" maxlength="25"
                                                            name="frm1604cf:txtSched1TaxWheld10" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('1');computeTotalAmount('1','10')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Adj10" maxlength="25"
                                                            name="frm1604cf:txtSched1Adj10" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="negative(); return number(this, event)" value="0.00" type="text" onblur="round(this,2);computeTotalAdjustment();computeTotalAmount('1','10')" />
</font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Pen10" maxlength="25"
                                                            name="frm1604cf:txtSched1Pen10" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('1');computeTotalAmount('1','10')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif"
                                                          size="2">
                                                        <input class="iceInpTxt-dis" disabled="true"
                                                               id="frm1604cf:txtSched1TotalAmt10" maxlength="25"
                                                               name="frm1604cf:txtSched1TotalAmt10" size="20" style="text-align: right;
                                                               font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                               background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                    </font></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">NOV</font></td>
                                                <td align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Date11" maxlength="10"
                                                            name="frm1604cf:txtSched1Date11" size="12" style="background-color: white; color: black; text-align:
                                                            right;" type="text" />
                                                    </font></td>
                                                <td align="center"><font face="Arial"
                                                          size="2">
                                                        <input class="iceInpTxt" id="frm1604cf:txtSched1BankVal11"
                                                               maxlength="50" name="frm1604cf:txtSched1BankVal11"  size="12" type="text" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1TaxWheld11" maxlength="25"
                                                            name="frm1604cf:txtSched1TaxWheld11" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('1');computeTotalAmount('1','11')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Adj11" maxlength="25"
                                                            name="frm1604cf:txtSched1Adj11" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="negative(); return number(this, event)" value="0.00" type="text" onblur="round(this,2);computeTotalAdjustment();computeTotalAmount('1','11')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Pen11" maxlength="25"
                                                            name="frm1604cf:txtSched1Pen11" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('1');computeTotalAmount('1','11')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif"
                                                          size="2">
                                                        <input class="iceInpTxt-dis" disabled="true"
                                                               id="frm1604cf:txtSched1TotalAmt11" maxlength="25"
                                                               name="frm1604cf:txtSched1TotalAmt11" size="20" style="text-align: right;
                                                               font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                               background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                    </font></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">DEC</font></td>
                                                <td align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Date12" maxlength="10"
                                                            name="frm1604cf:txtSched1Date12" size="12" style="background-color: white; color: black; text-align:
                                                            right;" type="text" />
                                                    </font></td>
                                                <td align="center"><font face="Arial"
                                                          size="2">
                                                        <input class="iceInpTxt" id="frm1604cf:txtSched1BankVal12"
                                                               maxlength="50" name="frm1604cf:txtSched1BankVal12" size="12" type="text" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1TaxWheld12" maxlength="25"
                                                            name="frm1604cf:txtSched1TaxWheld12" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('1');computeTotalAmount('1','12')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Adj12" maxlength="25"
                                                            name="frm1604cf:txtSched1Adj12" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="negative(); return number(this, event)" value="0.00" type="text" onblur="round(this,2);computeTotalAdjustment();computeTotalAmount('1','12')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt" id="frm1604cf:txtSched1Pen12" maxlength="25"
                                                            name="frm1604cf:txtSched1Pen12" size="20" style="text-align: right; font-family:
                                                            Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('1');computeTotalAmount('1','12')" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif"
                                                          size="2">
                                                        <input class="iceInpTxt-dis" disabled="true"
                                                               id="frm1604cf:txtSched1TotalAmt12" maxlength="25"
                                                               name="frm1604cf:txtSched1TotalAmt12" size="20" style="text-align: right;
                                                               font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                               background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                    </font></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">TOTAL</font></td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td><font face="Arial,
                                                          Helvetica, sans-serif" size="2">
                                                        <input class="iceInpTxt-dis"
                                                               disabled="true" id="frm1604cf:txtSched1TaxWheldTotal" maxlength="25"
                                                               name="frm1604cf:txtSched1TaxWheldTotal" size="20" style="text-align: right;
                                                               font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                               background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt-dis" disabled="true" id="frm1604cf:txtSched1AdjTotal"
                                                            maxlength="25" name="frm1604cf:txtSched1AdjTotal" size="20" style="text-align: right;
                                                            font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                            background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                            class="iceInpTxt-dis" disabled="true" id="frm1604cf:txtSched1PenTotal"
                                                            maxlength="25" name="frm1604cf:txtSched1PenTotal" size="20" style="text-align: right;
                                                            font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                            background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                    </font></td>
                                                <td><font face="Arial, Helvetica, sans-serif"
                                                          size="2">
                                                        <input class="iceInpTxt-dis" disabled="true"
                                                               id="frm1604cf:txtSched1Total" maxlength="25"
                                                               name="frm1604cf:txtSched1Total" size="20" style="text-align: right;
                                                               font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                               background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                    </font></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr>
                                    <td class="tblFormTd"><table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="100">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Schedule 2</font></td>
                                                <td width="620"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><font face="Arial, Helvetica, sans-serif" size="1"><font size="2"><b>R e m i t t a n c e&nbsp;&nbsp; p e r&nbsp;&nbsp; B I R&nbsp;&nbsp; F o r m&nbsp;&nbsp; N o.&nbsp;&nbsp; 1 6 0 1 - F</b></font></font><font
                                                                size="2"></font></font></div></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr>
                                    <td class="tblFormTd"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="10%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">MONTH</font></div></td>
                                                <td width="18%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">DATE OF REMITTANCE</font></div></td>
                                                <td width="18%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">NAME OF BANK/BANK CODE/ROR NO., IF ANY</font></div></td>
                                                <td width="18%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">TAXES WITHHELD</font></div></td>
                                                <td width="18%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">PENALTIES</font></div></td>
                                                <td width="18%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">TOTAL AMOUNT REMITTED</font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">JAN</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Date1" maxlength="10"
                                                                name="frm1604cf:txtSched2Date1" size="14" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched2BankVal1"
                                                                   maxlength="50" name="frm1604cf:txtSched2BankVal1" size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2TaxWheld1" maxlength="25"
                                                                name="frm1604cf:txtSched2TaxWheld1"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('2');computeTotalAmount('2','1')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Pen1" maxlength="25"
                                                                name="frm1604cf:txtSched2Pen1"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('2');computeTotalAmount('2','1')" />
                                                        </font></div></td>
                                                <td><div align="center">
                                                        <font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched2TotalAmt1" maxlength="25"
                                                                   name="frm1604cf:txtSched2TotalAmt1" size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">FEB</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Date2" maxlength="10"
                                                                name="frm1604cf:txtSched2Date2"
                                                                size="14" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched2BankVal2"
                                                                   maxlength="50" name="frm1604cf:txtSched2BankVal2" size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2TaxWheld2" maxlength="25"
                                                                name="frm1604cf:txtSched2TaxWheld2"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('2');computeTotalAmount('2','2')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Pen2" maxlength="25"
                                                                name="frm1604cf:txtSched2Pen2"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('2');computeTotalAmount('2','2')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched2TotalAmt2" maxlength="25"
                                                                   name="frm1604cf:txtSched2TotalAmt2" size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">MAR</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Date3" maxlength="10"
                                                                name="frm1604cf:txtSched2Date3" size="14" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched2BankVal3"
                                                                   maxlength="50" name="frm1604cf:txtSched2BankVal3" size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2TaxWheld3" maxlength="25"
                                                                name="frm1604cf:txtSched2TaxWheld3"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('2');computeTotalAmount('2','3')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Pen3" maxlength="25"
                                                                name="frm1604cf:txtSched2Pen3"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('2');computeTotalAmount('2','3')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched2TotalAmt3" maxlength="25"
                                                                   name="frm1604cf:txtSched2TotalAmt3"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">APR</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Date4" maxlength="10"
                                                                name="frm1604cf:txtSched2Date4"
                                                                size="14" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched2BankVal4"
                                                                   maxlength="50" name="frm1604cf:txtSched2BankVal4"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2TaxWheld4" maxlength="25"
                                                                name="frm1604cf:txtSched2TaxWheld4"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('2');computeTotalAmount('2','4')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Pen4" maxlength="25"
                                                                name="frm1604cf:txtSched2Pen4"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('2');computeTotalAmount('2','4')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched2TotalAmt4" maxlength="25"
                                                                   name="frm1604cf:txtSched2TotalAmt4"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">MAY</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Date5" maxlength="10"
                                                                name="frm1604cf:txtSched2Date5"
                                                                size="14" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched2BankVal5"
                                                                   maxlength="50" name="frm1604cf:txtSched2BankVal5"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2TaxWheld5" maxlength="25"
                                                                name="frm1604cf:txtSched2TaxWheld5"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('2');computeTotalAmount('2','5')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Pen5" maxlength="25"
                                                                name="frm1604cf:txtSched2Pen5"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('2');computeTotalAmount('2','5')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched2TotalAmt5" maxlength="25"
                                                                   name="frm1604cf:txtSched2TotalAmt5" size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">JUN</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Date6" maxlength="10"
                                                                name="frm1604cf:txtSched2Date6" size="14" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched2BankVal6"
                                                                   maxlength="50" name="frm1604cf:txtSched2BankVal6" size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2TaxWheld6" maxlength="25"
                                                                name="frm1604cf:txtSched2TaxWheld6" size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('2');computeTotalAmount('2','6')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Pen6" maxlength="25"
                                                                name="frm1604cf:txtSched2Pen6" size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('2');computeTotalAmount('2','6')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched2TotalAmt6" maxlength="25"
                                                                   name="frm1604cf:txtSched2TotalAmt6"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">JUL</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Date7" maxlength="10"
                                                                name="frm1604cf:txtSched2Date7"
                                                                size="14" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched2BankVal7"
                                                                   maxlength="50" name="frm1604cf:txtSched2BankVal7"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2TaxWheld7" maxlength="25"
                                                                name="frm1604cf:txtSched2TaxWheld7"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('2');computeTotalAmount('2','7')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Pen7" maxlength="25"
                                                                name="frm1604cf:txtSched2Pen7"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('2');computeTotalAmount('2','7')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched2TotalAmt7" maxlength="25"
                                                                   name="frm1604cf:txtSched2TotalAmt7"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">AUG</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Date8" maxlength="10"
                                                                name="frm1604cf:txtSched2Date8"
                                                                size="14" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched2BankVal8"
                                                                   maxlength="50" name="frm1604cf:txtSched2BankVal8"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2TaxWheld8" maxlength="25"
                                                                name="frm1604cf:txtSched2TaxWheld8"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('2');computeTotalAmount('2','8')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Pen8" maxlength="25"
                                                                name="frm1604cf:txtSched2Pen8"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('2');computeTotalAmount('2','8')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched2TotalAmt8" maxlength="25"
                                                                   name="frm1604cf:txtSched2TotalAmt8"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">SEP</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Date9" maxlength="10"
                                                                name="frm1604cf:txtSched2Date9"
                                                                size="14" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched2BankVal9"
                                                                   maxlength="50" name="frm1604cf:txtSched2BankVal9"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2TaxWheld9" maxlength="25"
                                                                name="frm1604cf:txtSched2TaxWheld9"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('2');computeTotalAmount('2','9')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Pen9" maxlength="25"
                                                                name="frm1604cf:txtSched2Pen9"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('2');computeTotalAmount('2','9')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched2TotalAmt9" maxlength="25"
                                                                   name="frm1604cf:txtSched2TotalAmt9"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">OCT</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Date10" maxlength="10"
                                                                name="frm1604cf:txtSched2Date10"
                                                                size="14" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched2BankVal10"
                                                                   maxlength="50" name="frm1604cf:txtSched2BankVal10"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2TaxWheld10" maxlength="25"
                                                                name="frm1604cf:txtSched2TaxWheld10"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('2');computeTotalAmount('2','10')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Pen10" maxlength="25"
                                                                name="frm1604cf:txtSched2Pen10"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('2');computeTotalAmount('2','10')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched2TotalAmt10" maxlength="25"
                                                                   name="frm1604cf:txtSched2TotalAmt10"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">NOV</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Date11" maxlength="10"
                                                                name="frm1604cf:txtSched2Date11"
                                                                size="14" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched2BankVal11"
                                                                   maxlength="50" name="frm1604cf:txtSched2BankVal11"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2TaxWheld11" maxlength="25"
                                                                name="frm1604cf:txtSched2TaxWheld11"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('2');computeTotalAmount('2','11')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Pen11" maxlength="25"
                                                                name="frm1604cf:txtSched2Pen11"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('2');computeTotalAmount('2','11')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched2TotalAmt11" maxlength="25"
                                                                   name="frm1604cf:txtSched2TotalAmt11" size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">DEC</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Date12" maxlength="10"
                                                                name="frm1604cf:txtSched2Date12"
                                                                size="14" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched2BankVal12"
                                                                   maxlength="50" name="frm1604cf:txtSched2BankVal12"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2TaxWheld12" maxlength="25"
                                                                name="frm1604cf:txtSched2TaxWheld12"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('2');computeTotalAmount('2','12')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched2Pen12" maxlength="25"
                                                                name="frm1604cf:txtSched2Pen12"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('2');computeTotalAmount('2','12')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched2TotalAmt12" maxlength="25"
                                                                   name="frm1604cf:txtSched2TotalAmt12"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">TOTAL</font></td>
                                                <td><div align="center"></div></td>
                                                <td><div align="center"></div></td>
                                                <td><div align="center"><font face="Arial,
                                                                              Helvetica, sans-serif" size="2">
                                                            <input class="iceInpTxt-dis"
                                                                   disabled="true" id="frm1604cf:txtSched2TaxWheldTotal" maxlength="25"
                                                                   name="frm1604cf:txtSched2TaxWheldTotal"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt-dis" disabled="true" id="frm1604cf:txtSched2PenTotal"
                                                                maxlength="25" name="frm1604cf:txtSched2PenTotal"
                                                                size="20" style="text-align: right;
                                                                font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched2Total" maxlength="25"
                                                                   name="frm1604cf:txtSched2Total"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr>
                                    <td class="tblFormTd"><table width="" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="100">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Schedule 3</font></td>
                                                <td width="632"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><font face="Arial, Helvetica, sans-serif" size="1"><font face="Arial, Helvetica, sans-serif" size="1"><font size="2"><b>R e m i t t a n c e&nbsp;&nbsp; p e r&nbsp;&nbsp; B I R&nbsp;&nbsp; F o r m&nbsp;&nbsp; N o.&nbsp;&nbsp; 1 6 0 2</b></font></font><font size="2"></font></font><font
                                                                size="2"></font></font></div></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr>
                                    <td class="tblFormTd"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="10%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">MONTH</font></div></td>
                                                <td width="18%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">DATE OF REMITTANCE</font></div></td>
                                                <td width="18%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">NAME OF BANK/BANK CODE/ROR NO., IF ANY</font></div></td>
                                                <td width="18%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">TAXES WITHHELD</font></div></td>
                                                <td width="18%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">PENALTIES</font></div></td>
                                                <td width="18%"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">TOTAL AMOUNT REMITTED</font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">JAN</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Date1" maxlength="10"
                                                                name="frm1604cf:txtSched3Date1"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched3BankVal1"
                                                                   maxlength="50" name="frm1604cf:txtSched3BankVal1"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3TaxWheld1" maxlength="25"
                                                                name="frm1604cf:txtSched3TaxWheld1"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('3');computeTotalAmount('3','1')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Pen1" maxlength="25"
                                                                name="frm1604cf:txtSched3Pen1"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('3');computeTotalAmount('3','1')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched3TotalAmt1" maxlength="25"
                                                                   name="frm1604cf:txtSched3TotalAmt1"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">FEB</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Date2" maxlength="10"
                                                                name="frm1604cf:txtSched3Date2"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched3BankVal2"
                                                                   maxlength="50" name="frm1604cf:txtSched3BankVal2"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3TaxWheld2" maxlength="25"
                                                                name="frm1604cf:txtSched3TaxWheld2"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('3');computeTotalAmount('3','2')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Pen2" maxlength="25"
                                                                name="frm1604cf:txtSched3Pen2"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('3');computeTotalAmount('3','2')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched3TotalAmt2" maxlength="25"
                                                                   name="frm1604cf:txtSched3TotalAmt2"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">MAR</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Date3" maxlength="10"
                                                                name="frm1604cf:txtSched3Date3"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched3BankVal3"
                                                                   maxlength="50" name="frm1604cf:txtSched3BankVal3"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3TaxWheld3" maxlength="25"
                                                                name="frm1604cf:txtSched3TaxWheld3"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('3');computeTotalAmount('3','3')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Pen3" maxlength="25"
                                                                name="frm1604cf:txtSched3Pen3"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('3');computeTotalAmount('3','3')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched3TotalAmt3" maxlength="25"
                                                                   name="frm1604cf:txtSched3TotalAmt3"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">APR</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Date4" maxlength="10"
                                                                name="frm1604cf:txtSched3Date4"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched3BankVal4"
                                                                   maxlength="50" name="frm1604cf:txtSched3BankVal4"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3TaxWheld4" maxlength="25"
                                                                name="frm1604cf:txtSched3TaxWheld4"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('3');computeTotalAmount('3','4')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Pen4" maxlength="25"
                                                                name="frm1604cf:txtSched3Pen4"

                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('3');computeTotalAmount('3','4')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched3TotalAmt4" maxlength="25"
                                                                   name="frm1604cf:txtSched3TotalAmt4"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">MAY</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Date5" maxlength="10"
                                                                name="frm1604cf:txtSched3Date5"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched3BankVal5"
                                                                   maxlength="50" name="frm1604cf:txtSched3BankVal5"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3TaxWheld5" maxlength="25"
                                                                name="frm1604cf:txtSched3TaxWheld5"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('3');computeTotalAmount('3','5')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Pen5" maxlength="25"
                                                                name="frm1604cf:txtSched3Pen5"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('3');computeTotalAmount('3','5')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched3TotalAmt5" maxlength="25"
                                                                   name="frm1604cf:txtSched3TotalAmt5"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">JUN</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Date6" maxlength="10"
                                                                name="frm1604cf:txtSched3Date6"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched3BankVal6"
                                                                   maxlength="50" name="frm1604cf:txtSched3BankVal6"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3TaxWheld6" maxlength="25"
                                                                name="frm1604cf:txtSched3TaxWheld6"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('3');computeTotalAmount('3','6')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Pen6" maxlength="25"
                                                                name="frm1604cf:txtSched3Pen6" size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('3');computeTotalAmount('3','6')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched3TotalAmt6" maxlength="25"
                                                                   name="frm1604cf:txtSched3TotalAmt6"  size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">JUL</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Date7" maxlength="10"
                                                                name="frm1604cf:txtSched3Date7"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched3BankVal7"
                                                                   maxlength="50" name="frm1604cf:txtSched3BankVal7"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3TaxWheld7" maxlength="25"
                                                                name="frm1604cf:txtSched3TaxWheld7"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('3');computeTotalAmount('3','7')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Pen7" maxlength="25"
                                                                name="frm1604cf:txtSched3Pen7"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('3');computeTotalAmount('3','7')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched3TotalAmt7" maxlength="25"
                                                                   name="frm1604cf:txtSched3TotalAmt7"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">AUG</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Date8" maxlength="10"
                                                                name="frm1604cf:txtSched3Date8"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched3BankVal8"
                                                                   maxlength="50" name="frm1604cf:txtSched3BankVal8"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3TaxWheld8" maxlength="25"
                                                                name="frm1604cf:txtSched3TaxWheld8"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('3');computeTotalAmount('3','8')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Pen8" maxlength="25"
                                                                name="frm1604cf:txtSched3Pen8"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('3');computeTotalAmount('3','8')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched3TotalAmt8" maxlength="25"
                                                                   name="frm1604cf:txtSched3TotalAmt8"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">SEP</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Date9" maxlength="10"
                                                                name="frm1604cf:txtSched3Date9"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched3BankVal9"
                                                                   maxlength="50" name="frm1604cf:txtSched3BankVal9"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3TaxWheld9" maxlength="25"
                                                                name="frm1604cf:txtSched3TaxWheld9"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('3');computeTotalAmount('3','9')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Pen9" maxlength="25"
                                                                name="frm1604cf:txtSched3Pen9"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('3');computeTotalAmount('3','9')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched3TotalAmt9" maxlength="25"
                                                                   name="frm1604cf:txtSched3TotalAmt9"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">OCT</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Date10" maxlength="10"
                                                                name="frm1604cf:txtSched3Date10"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched3BankVal10"
                                                                   maxlength="50" name="frm1604cf:txtSched3BankVal10"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3TaxWheld10" maxlength="25"
                                                                name="frm1604cf:txtSched3TaxWheld10"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('3');computeTotalAmount('3','10')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Pen10" maxlength="25"
                                                                name="frm1604cf:txtSched3Pen10"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('3');computeTotalAmount('3','10')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched3TotalAmt10" maxlength="25"
                                                                   name="frm1604cf:txtSched3TotalAmt10"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">NOV</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Date11" maxlength="10"
                                                                name="frm1604cf:txtSched3Date11"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched3BankVal11"
                                                                   maxlength="50" name="frm1604cf:txtSched3BankVal11"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3TaxWheld11" maxlength="25"
                                                                name="frm1604cf:txtSched3TaxWheld11"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('3');computeTotalAmount('3','11')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Pen11" maxlength="25"
                                                                name="frm1604cf:txtSched3Pen11"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('3');computeTotalAmount('3','11')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched3TotalAmt11" maxlength="25"
                                                                   name="frm1604cf:txtSched3TotalAmt11"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">DEC</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Date12" maxlength="10"
                                                                name="frm1604cf:txtSched3Date12"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched3BankVal12"
                                                                   maxlength="50" name="frm1604cf:txtSched3BankVal12"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3TaxWheld12" maxlength="25"
                                                                name="frm1604cf:txtSched3TaxWheld12"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('3');computeTotalAmount('3','12')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched3Pen12" maxlength="25"
                                                                name="frm1604cf:txtSched3Pen12"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('3');computeTotalAmount('3','12')" />
</font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched3TotalAmt12" maxlength="25"
                                                                   name="frm1604cf:txtSched3TotalAmt12"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">TOTAL</font></td>
                                                <td><div align="center"></div></td>
                                                <td><div align="center"></div></td>
                                                <td>
                                                    <div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input class="iceInpTxt-dis"
                                                                   disabled="true" id="frm1604cf:txtSched3TaxWheldTotal" maxlength="25"
                                                                   name="frm1604cf:txtSched3TaxWheldTotal"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div align="center">
                                                        <font face="Arial, Helvetica, sans-serif" size="2">
                                                        <input
                                                                class="iceInpTxt-dis" disabled="true" id="frm1604cf:txtSched3PenTotal"
                                                                maxlength="25" name="frm1604cf:txtSched3PenTotal"
                                                                size="20" style="text-align: right;
                                                                font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                background-color: rgb(220, 220, 220);" value="0.00" type="text" />
</font>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div align="center">
                                                        <font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched3Total" maxlength="25"
                                                                   name="frm1604cf:txtSched3Total"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tblFormTd"><table width="" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="100">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Schedule 4</font></td>
                                                <td width="632"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><font face="Arial, Helvetica, sans-serif" size="1"><font face="Arial, Helvetica, sans-serif" size="1"><font face="Arial, Helvetica, sans-serif" size="1"><font size="2"><b>R e m i t t a n c e&nbsp;&nbsp; p e r&nbsp;&nbsp; B I R&nbsp;&nbsp; F o r m&nbsp;&nbsp; N o.&nbsp;&nbsp; 1 6 0 3</b></font></font><font size="2"></font></font><font size="2"></font></font><font
                                                                size="2"></font></font></div></td>
                                            </tr>
                                        </table></td>
                                </tr>
                                <tr>
                                    <td class="tblFormTd"><table width="920" border="1" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="62"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">QUARTER</font></div></td>
                                                <td width="105"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">DATE OF REMITTANCE</font></div></td>
                                                <td width="121"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">NAME OF BANK/BANK CODE/ROR NO., IF ANY</font></div></td>
                                                <td width="130"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">TAXES WITHHELD</font></div></td>
                                                <td width="136"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">PENALTIES</font></div></td>
                                                <td width="136"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px">TOTAL AMOUNT REMITTED</font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">1ST QTR</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched4Date1" maxlength="10"
                                                                name="frm1604cf:txtSched4Date1"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched4BankVal1"
                                                                   maxlength="50" name="frm1604cf:txtSched4BankVal1"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched4TaxWheld1" maxlength="25"
                                                                name="frm1604cf:txtSched4TaxWheld1"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('4');computeTotalAmount('4','1')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched4Pen1" maxlength="25"
                                                                name="frm1604cf:txtSched4Pen1"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('4');computeTotalAmount('4','1')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched4TotalAmt1" maxlength="25"
                                                                   name="frm1604cf:txtSched4TotalAmt1"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">2ND QTR</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched4Date2" maxlength="10"
                                                                name="frm1604cf:txtSched4Date2"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched4BankVal2"
                                                                   maxlength="50" name="frm1604cf:txtSched4BankVal2"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched4TaxWheld2" maxlength="25"
                                                                name="frm1604cf:txtSched4TaxWheld2"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('4');computeTotalAmount('4','2')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched4Pen2" maxlength="25"
                                                                name="frm1604cf:txtSched4Pen2"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('4');computeTotalAmount('4','2')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched4TotalAmt2" maxlength="25"
                                                                   name="frm1604cf:txtSched4TotalAmt2"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">3RD QTR</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched4Date3" maxlength="10"
                                                                name="frm1604cf:txtSched4Date3"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched4BankVal3"
                                                                   maxlength="50" name="frm1604cf:txtSched4BankVal3"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched4TaxWheld3" maxlength="25"
                                                                name="frm1604cf:txtSched4TaxWheld3"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('4');computeTotalAmount('4','3')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched4Pen3" maxlength="25"
                                                                name="frm1604cf:txtSched4Pen3"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('4');computeTotalAmount('4','3')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched4TotalAmt3" maxlength="25"
                                                                   name="frm1604cf:txtSched4TotalAmt3"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">4TH QTR</font></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched4Date4" maxlength="10"
                                                                name="frm1604cf:txtSched4Date4"
                                                                size="13" style="background-color: white; color: black; text-align:
                                                                right;" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial"
                                                                              size="2">
                                                            <input class="iceInpTxt" id="frm1604cf:txtSched4BankVal4"
                                                                   maxlength="50" name="frm1604cf:txtSched4BankVal4"  size="20" type="text" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched4TaxWheld4" maxlength="25"
                                                                name="frm1604cf:txtSched4TaxWheld4"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalWithheld('4');computeTotalAmount('4','4')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt" id="frm1604cf:txtSched4Pen4" maxlength="25"
                                                                name="frm1604cf:txtSched4Pen4"
                                                                size="20" style="text-align: right; font-family:
                                                                Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);blockNegativeNumber(this);computeTotalPenalties('4');computeTotalAmount('4','4')" />
                                                        </font></div></td>
                                                <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                              size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched4TotalAmt4" maxlength="25"
                                                                   name="frm1604cf:txtSched4TotalAmt4"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font></div></td>
                                            </tr>
                                            <tr>
                                                <td><font face="Arial" size="1px">TOTAL</font></td>
                                                <td><div align="center"></div></td>
                                                <td><div align="center"></div></td>
                                                <td>
                                                    <div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input class="iceInpTxt-dis"
                                                                   disabled="true" id="frm1604cf:txtSched4TaxWheldTotal" maxlength="25"
                                                                   name="frm1604cf:txtSched4TaxWheldTotal"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div align="center">
                                                        <font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input
                                                                class="iceInpTxt-dis" disabled="true" id="frm1604cf:txtSched4PenTotal"
                                                                maxlength="25" name="frm1604cf:txtSched4PenTotal"
                                                                size="20" style="text-align: right;
                                                                font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div align="center">
                                                        <font face="Arial, Helvetica, sans-serif" size="2">
                                                            <input class="iceInpTxt-dis" disabled="true"
                                                                   id="frm1604cf:txtSched4Total" maxlength="25"
                                                                   name="frm1604cf:txtSched4Total"
                                                                   size="20" style="text-align: right;
                                                                   font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                   background-color: rgb(220, 220, 220);" value="0.00" type="text" />
                                                        </font>
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
              <div class="imgClass" align='center' style="display:none; width:920px !important;">
                <!-- <img id="frm1604CF:jurat" src="../img/jurat/1604CF.jpg" width="920" height="150"/> -->
                <br />
                <table style="border-top: 3px solid black;border-collapse: collapse; font-family:arial; font-size:9px; text-align: center; vertical-align: top; table-layout: fixed;">
                  <col width="15%"/>
                  <col width="15%" />
                    <col width="15%" />
                    <col width="15%" />
                    <col width="20%" />
                    <col width="20%" />
                  <tr>
                    <td colspan="5">We declare, under the penalties of perjury, that this return has been made in good faith, verified by us, and to the best of our knowledge and belief,
                      <br />is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.</td>
                    <td style="border-left: 3px solid #000;">Stamp of Receiving Office and
                      <br />Date of Receipt<br /></td>
                  </tr>
                  <tr>
                    <td colspan="4"><b>15</b>______________________________________________________________
                      <br />President/Vice President/Principal Officer/Accredited Tax
                      <br />Agent/Authorized Representative/Taxpayer
                      <br />(Signature over printed Name)</td>
                    <td><b>16</b>___________________________
                      <br />Treasurer/Asst. Treasurer
                      <br />(Signature over printed Name)
                      <br />&nbsp;</td>
                    <td rowspan="3" style="border-left: 3px solid #000;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">_____________________________________________
                      <br />Title/Position of Signatory</td>
                    <td colspan="2">_____________________________________________
                      <br />TIN of Signatory
                      <br /></td>
                    <td>___________________________
                      <br />Title/Position of the Signatory</td>
                  </tr>
                  <tr>
                    <td colspan="2">_____________________________________________
                      <br />Tax Agent Acc. No./ Atty's Roll No. (If Applicable)</td>
                    <td>_________________
                      <br />Date of Issuance</td>
                    <td>_________________
                      <br />Date of Expiry</td>
                    <td>___________________________
                      <br />TIN of Signatory</td>
                  </tr>
                </table>
              </div>
                            <table width="920" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                <tr>
                                    <td class="tblFormTdPart">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>
                                                    <table width="920" cellspacing="0" cellpadding="0" border="0">
                                                        <tbody>
                                                            <tr valign="middle">
                                                                <td width="70"></td>
                                                                <td width="760">
                                                                    <div id="frm1604cf:j_id743" class="icePnlGrp">
                                                                        <div align="center">
                                                                            @if($action != 'view')
                                                                            <input class="printButtonClass"  type="button" value="Validate" style="width: 100px;" name="frm1604cf:cmdValidate" id="frm1604cf:cmdValidate" onclick="validateForm()" />
                                                                            <input class="printButtonClass"  type="button" value="Edit" style="width: 100px;" name="frm1604cf:cmdEdit" id="frm1604cf:cmdEdit" onclick="editForm()"/>
                                                                            
                                                                              <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                              <input class="printButtonClass"  type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                              <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                              <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1604cf:btnFinalCopy" id="frm1604cf:btnFinalCopy" onclick="submitForm();" />
                                                                              <div id="msg" class="printButtonClass" style="display:none;"></div>
                                                                            @else
                                                                                   <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                   <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width="105"></td>
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
                            <div class="footer" style="padding:6px; text-align: center; font-size: 11px; background-color: white;width: 914px">
                                <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                            </div>
                        </td>
                    </tr>
                </table>
        </div>
            </div>
        </div>
    </div>
  
  <div id="hiddenEmail" style="display:none;"  > 
          <input id="txtEmail" class="emailClass" value="{{$company->email_address}}" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60"   />
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
    //Declare global variable
  var isSubmitFinal = false;
  var isSubmit = false;
  
    var str;
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
  
  
    str = setInterval("sleeptime()", 300);
    function sleeptime()
    {
        clearInterval(str);
        init();
    
    var xmlFileName = document.getElementById('file_name').value;        
    fileName = xmlFileName;
    if (fileName != null && fileName.indexOf('.xml') > -1) {
      loadXML(fileName);  

      d.getElementById('frm1604cf:txtYear').disabled = true;
      
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
    d.getElementById('frm1604cf:tinA').disabled = true; 
      d.getElementById('frm1604cf:tinB').disabled = true; 
    d.getElementById('frm1604cf:tinC').disabled = true; 
    d.getElementById('frm1604cf:branchCode').disabled = true;
  }
  
  function rdoPropertyJS(rdoCode, description) 
  {
    this.rdoCode=rdoCode;
    this.description=description;
  }
    
  var rdoList = new Array();

  /*----------------------------------*/
  //Added by MPISCOSO
    var d=document,XMLBGFile='',data='',XMLFile='',msg = d.getElementById('msg');
  var loader=d.getElementById('loader');
  /*----------------------------------*/  
  


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
            d.getElementById('frm1604cf:cmdValidate').disabled = true;
            d.getElementById('btnSave').disabled = true;
          }

  }
  
  function loadData() {
    /*This will load data onto fields*/
    var response = d.getElementById("response");

        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
      try{
        if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
          if (elem[i].type == 'text' || elem[i].type == 'select-one') {
            var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
            if(elem[i].id == 'frm1604cf:registeredName' || elem[i].id == 'frm1604cf:description' || elem[i].id == 'frm1604cf:registeredAddress'){
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
      } catch(e) {
        //alert('exception thrown : e : '+e.description);
      }

        }       
  }
  
  var XMLrdoFile='';
  
  function init()
    {
        var date = new Date();

        d.getElementById('frm1604cf:txtYear').value = date.getFullYear() - 1;
    
    
        d.getElementById('frm1604cf:amendedRtn_1').disabled = false;
        d.getElementById('frm1604cf:amendedRtn_2').disabled = false;
        
        d.getElementById('frm1604cf:txtSheets').disabled = false;
    
        d.getElementById('frm1604cf:txtRefMonth').disabled = true;
        d.getElementById('frm1604cf:txtRefDate').disabled = true;
        d.getElementById('frm1604cf:txtRefYear').disabled = true;
       
        d.getElementById('frm1604cf:select13').disabled = true;
        @if($action != 'view')
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1604cf:cmdEdit').disabled = true;
        d.getElementById('frm1604cf:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @else
        
        d.getElementById('frm1604cf:txt12').disabled = true;
        disable11and12();
        enabledDisabledControls(true);

        @endif
        
        var x = 1;
        while(x < 4){
            var y = 1;
            while(y <= 12){
                d.getElementById('frm1604cf:txtSched' + x + 'TotalAmt' + y).disabled = true;
                y++;
            }
            x++;
        }

        x = 1;
        while(x < 5){
            if(x == 1){
                d.getElementById('frm1604cf:txtSched' + x + 'AdjTotal').disabled = true;
            }
            d.getElementById('frm1604cf:txtSched' + x + 'TaxWheldTotal').disabled = true;
            d.getElementById('frm1604cf:txtSched' + x + 'PenTotal').disabled = true;
            d.getElementById('frm1604cf:txtSched' + x + 'Total').disabled = true;

            d.getElementById('frm1604cf:txtSched4TotalAmt' + x).disabled = true;
            x++;
        }
    
    }

    function changeRefund()
    {
        if(d.getElementById('frm1604cf:releasedOfFunds_1').checked == true){
            //refundFields(false);
      d.getElementById('frm1604cf:txtRefMonth').disabled = false;
      d.getElementById('frm1604cf:txtRefDate').disabled = false;
      d.getElementById('frm1604cf:txtRefYear').disabled = false;
      d.getElementById('frm1604cf:txt12').disabled = false;
      d.getElementById('frm1604cf:select13').disabled = false;
    }else {
            //refundFields(true);
      d.getElementById('frm1604cf:txtRefMonth').disabled = true;
      d.getElementById('frm1604cf:txtRefDate').disabled = true;
      d.getElementById('frm1604cf:txtRefYear').disabled = true;
      d.getElementById('frm1604cf:txt12').disabled = true;
      d.getElementById('frm1604cf:select13').disabled = true;
    
      d.getElementById('frm1604cf:txtRefMonth').value = "00";
      d.getElementById('frm1604cf:txtRefDate').value = "";
      d.getElementById('frm1604cf:txtRefYear').value = "";
      d.getElementById('frm1604cf:txt12').value = "";
      d.getElementById('frm1604cf:select13').value = "00";
    }
    }

    function disable11and12()
    {
        d.getElementById('frm1604cf:txtRefMonth').disabled = true;
        d.getElementById('frm1604cf:txtRefDate').disabled = true;
        d.getElementById('frm1604cf:txtRefYear').disabled = true;
        d.getElementById('frm1604cf:txt12').disabled = true;
        d.getElementById('frm1604cf:select13').disabled = true;
    }
  
  function enable11and12()
    {
    if(d.getElementById('frm1604cf:releasedOfFunds_1').checked == true){
      d.getElementById('frm1604cf:txtRefMonth').disabled = false;
      d.getElementById('frm1604cf:txtRefDate').disabled = false;
      d.getElementById('frm1604cf:txtRefYear').disabled = false;
      d.getElementById('frm1604cf:txt12').disabled = false;
      d.getElementById('frm1604cf:select13').disabled = false;
    }else {
            d.getElementById('frm1604cf:txtRefMonth').disabled = true;
      d.getElementById('frm1604cf:txtRefDate').disabled = true;
      d.getElementById('frm1604cf:txtRefYear').disabled = true;
      d.getElementById('frm1604cf:txt12').disabled = true;
      d.getElementById('frm1604cf:select13').disabled = true;
    }
    }

    function computeTotalWithheld(sched)
    {
        var x = 1;
        var totalWithheld = 0;
        if(sched == '4'){
            while(x <= 4){
                totalWithheld = (totalWithheld*1) + (NumWithComma(d.getElementById('frm1604cf:txtSched' + sched + 'TaxWheld' + x).value)*1);

                x++;
            }
        }else {
            while(x <= 12){
                totalWithheld = (totalWithheld*1) + (NumWithComma(d.getElementById('frm1604cf:txtSched' + sched + 'TaxWheld' + x).value)*1);

                x++;
            }
        }
        d.getElementById('frm1604cf:txtSched' + sched + 'TaxWheldTotal').value = formatCurrency(totalWithheld);

        computeTotal(sched);
    }

    function computeTotalPenalties(sched)
    {
        var x = 1;
        var totalPenalties = 0;
        if(sched == '4'){
            while(x <= 4){
                totalPenalties = (totalPenalties*1) + (NumWithComma(d.getElementById('frm1604cf:txtSched' + sched + 'Pen' + x).value)*1);

                x++;
            }
        }else {
            while(x <= 12){
                totalPenalties = (totalPenalties*1) + (NumWithComma(d.getElementById('frm1604cf:txtSched' + sched + 'Pen' + x).value)*1);

                x++;
            }
        }
        d.getElementById('frm1604cf:txtSched' + sched + 'PenTotal').value = formatCurrency(totalPenalties);

        computeTotal(sched);
    capital();
    }

    function computeTotal(sched)
    {
        var total = 0;
        if(sched == '1'){
            var x = 1;
            var amt = 0;
            while(x <= 12){
                amt = NumWithComma(d.getElementById('frm1604cf:txtSched' + sched + 'TotalAmt' + x).value);
                if(amt > 0){
                    total = (total*1) + (amt*1);
                }
                x++;
            }
        }else {
            total = (NumWithComma(d.getElementById('frm1604cf:txtSched' + sched + 'TaxWheldTotal').value)*1) + (NumWithComma(d.getElementById('frm1604cf:txtSched' + sched + 'PenTotal').value)*1);
        }
        
        d.getElementById('frm1604cf:txtSched' + sched + 'Total').value = formatCurrency(total);
    capital();
    }

    function computeTotalAdjustment(){
        var x = 1;
        var totalAdjustment = 0;
        while(x <= 12){
            totalAdjustment = (totalAdjustment*1) + NumWithComma(d.getElementById('frm1604cf:txtSched1Adj' + x).value)*1;

            x++;
        }
        d.getElementById('frm1604cf:txtSched1AdjTotal').value = formatCurrency(totalAdjustment);

        computeTotal('1');
    capital();
    }

    function computeTotalAmount(a,b)
    {
        var totalRemit = 0;
        totalRemit = NumWithComma(d.getElementById('frm1604cf:txtSched' + a + 'TaxWheld' + b).value)*1 + NumWithComma(d.getElementById('frm1604cf:txtSched' + a + 'Pen' + b).value)*1;
        if(a == '1'){
            totalRemit = (totalRemit*1) + NumWithComma(d.getElementById('frm1604cf:txtSched' + a + 'Adj' + b).value)*1;
        }
        d.getElementById('frm1604cf:txtSched' + a + 'TotalAmt' + b).value = formatCurrency(totalRemit);

        computeTotal(a);
    capital();
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

    function blockNegativeNumber(e)
    {
        if(e.value < 0){
            e.value = "0.00";
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

    function validateForm()
    {
        var dt = new Date();

        if((d.getElementById('frm1604cf:txtYear').value == ""))
        {
            alert("Please enter a valid year on Item 1.");
            return;
        }
        
        if(d.getElementById('frm1604cf:txtYear').value*1 < 1900)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }

    if( (d.getElementById('frm1604cf:tinA').value == "" || d.getElementById('frm1604cf:tinB').value == "" || d.getElementById('frm1604cf:tinC').value == "" || d.getElementById('frm1604cf:branchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 4.");
            return;
        }   
        
      
        if( (d.getElementById('frm1604cf:description').value == "")  )
        {
            alert("Please enter a valid Line of Business on Item 6.");
            return;
        }     
    if( (d.getElementById('frm1604cf:registeredName').value == "")  )
        {
            alert("Please enter a valid Taxpayer's Name on Item 7.");
            return;
        }
    if( (d.getElementById('frm1604cf:telephoneNumber').value == "")  )
        {
            alert("Please enter a valid Telephone Number on Item 8.");
            return;
        }
    if( (d.getElementById('frm1604cf:registeredAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 9.");
            return;
        }     
    if( (d.getElementById('frm1604cf:zipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip Code on Item 10.");
            return;
        }
        if(d.getElementById('frm1604cf:releasedOfFunds_1').checked){
            var mm = d.getElementById('frm1604cf:txtRefMonth').value;
            var dd = d.getElementById('frm1604cf:txtRefDate').value;
            var yyyy = d.getElementById('frm1604cf:txtRefYear').value;
            var mmddyyyy = mm + "/" + dd + "/" + yyyy;
            if(validateMonthDayYearDate(mmddyyyy)){
                alert("Invalid date entry on Item 11.");
                return;
            }
      if(dd.length == 1)
      {
        alert("Please enter a valid day on item 11. Format should be MM/DD/YYYY.")
        return;
      }
            if(d.getElementById('frm1604cf:txt12').value == ""){
                alert("Please enter Amount of Overremittance in Item 12.");
                return;
            }
            if(d.getElementById('frm1604cf:select13').value == "00"){
                alert("Please select a month from the list on Item 13.");
                return;
            }
        }
        if(d.getElementById('frm1604cf:categoryAgent_1').checked == false && d.getElementById('frm1604cf:categoryAgent_2').checked == false)
        {
            alert("Please select an option for Item 14.");
            return;
        }

        var x = 1;
        var y;
        while(x <= 4){
            if(x == 1){
                y = 1;
                while(y <= 12){
                    if(NumWithComma(d.getElementById('frm1604cf:txtSched' + x + 'TaxWheld' + y).value) > 0 || NumWithComma(d.getElementById('frm1604cf:txtSched' + x + 'Pen' + y).value) > 0 || NumWithComma(d.getElementById('frm1604cf:txtSched1Adj' + y).value) > 0){
                        if(d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value == "" || d.getElementById('frm1604cf:txtSched' + x + 'BankVal' + y).value == ""){
                            alert("Incomplete values on Schedule " + x + ", Row " + y + ".");
                            return;
                        }
                    }
                    if(d.getElementById('frm1604cf:txtSched' + x + 'BankVal' + y).value != "" || d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value != ""){
                        if(d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value == "" || d.getElementById('frm1604cf:txtSched' + x + 'BankVal' + y).value == ""){
                            alert("Incomplete values on Schedule " + x + ", Row " + y + ".");
                            return;
                        }
                    }
                    if(d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value != ""){
                        if(validateMonthDayYearDate(d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value)){
                            alert("Invalid date entry on Schedule " + x + ", Column 1 Row " + y + ". Format is mm/dd/yyyy.");
                            return;
                        }
                    }
                    y++;
                }
            }else if(x == 4){
                y = 1;
                while(y <= 4){
                    if(NumWithComma(d.getElementById('frm1604cf:txtSched' + x + 'TaxWheld' + y).value) > 0 || NumWithComma(d.getElementById('frm1604cf:txtSched' + x + 'Pen' + y).value) > 0){
                        if(d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value == "" || d.getElementById('frm1604cf:txtSched' + x + 'BankVal' + y).value == ""){
                            alert("Incomplete values on Schedule " + x + ", Row " + y + ".");
                            return;
                        }
                    }
                    if(d.getElementById('frm1604cf:txtSched' + x + 'BankVal' + y).value != "" || d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value != ""){
                        if(d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value == "" || d.getElementById('frm1604cf:txtSched' + x + 'BankVal' + y).value == ""){
                            alert("Incomplete values on Schedule " + x + ", Row " + y + ".");
                            return;
                        }
                    }
                    if(d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value != ""){
                        if(validateMonthDayYearDate(d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value)){
                            alert("Invalid date entry on Schedule " + x + ", Column 1 Row " + y + ". Format is mm/dd/yyyy.");
                            return;
                        }
                    }
                    y++;
                }
            }else {
                y = 1;
                while(y <= 12){
                    if(NumWithComma(d.getElementById('frm1604cf:txtSched' + x + 'TaxWheld' + y).value) > 0 || NumWithComma(d.getElementById('frm1604cf:txtSched' + x + 'Pen' + y).value) > 0){
                        if(d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value == "" || d.getElementById('frm1604cf:txtSched' + x + 'BankVal' + y).value == ""){
                            alert("Incomplete values on Schedule " + x + ", Row " + y + ".");
                            return;
                        }
                    }
                    if(d.getElementById('frm1604cf:txtSched' + x + 'BankVal' + y).value != "" || d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value != ""){
                        if(d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value == "" || d.getElementById('frm1604cf:txtSched' + x + 'BankVal' + y).value == ""){
                            alert("Incomplete values on Schedule " + x + ", Row " + y + ".");
                            return;
                        }
                    }
                    if(d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value != ""){
                        if(validateMonthDayYearDate(d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).value)){
                            alert("Invalid date entry on Schedule " + x + ", Column 1 Row " + y + ". Format is mm/dd/yyyy.");
                            return;
                        }
                    }
                    y++;
                }
            }
            
            x++;
        }

        d.getElementById('frm1604cf:cmdValidate').disabled = true;
        d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm1604cf:cmdEdit').disabled = false;
        d.getElementById('btnUpload').disabled = false;
    disable11and12();
    
    enabledDisabledControls(true);

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
    return;
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
    function editForm()
    {
        d.getElementById('frm1604cf:cmdValidate').disabled = false;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1604cf:cmdEdit').disabled = true;
        d.getElementById('btnUpload').disabled = true;
    enable11and12();
        enabledDisabledControls(false);
    
    d.getElementById('frm1604cf:tinA').disabled = true; 
      d.getElementById('frm1604cf:tinB').disabled = true; 
    d.getElementById('frm1604cf:tinC').disabled = true; 
    d.getElementById('frm1604cf:branchCode').disabled = true;
    }

  var disableElem = true;
  var enableElem = false;
    function enabledDisabledControls(param)
    {
        d.getElementById('frm1604cf:amendedRtn_1').disabled = param;
        d.getElementById('frm1604cf:amendedRtn_2').disabled = param;
        d.getElementById('frm1604cf:txtYear').disabled = param;
        d.getElementById('frm1604cf:categoryAgent_1').disabled = param;
        d.getElementById('frm1604cf:categoryAgent_2').disabled = param;
        d.getElementById('frm1604cf:releasedOfFunds_1').disabled = param;
        d.getElementById('frm1604cf:releasedOfFunds_2').disabled = param;
        d.getElementById('frm1604cf:txtSheets').disabled = param;
        d.getElementById('frm1604cf:tinA').disabled = param;
        d.getElementById('frm1604cf:tinB').disabled = param;
        d.getElementById('frm1604cf:tinC').disabled = param;
        d.getElementById('frm1604cf:branchCode').disabled = param;
        d.getElementById('frm1604cf:rdoCode').disabled = param;
        d.getElementById('frm1604cf:description').disabled = param;
        d.getElementById('frm1604cf:registeredName').disabled = param;
        d.getElementById('frm1604cf:telephoneNumber').disabled = param;
        d.getElementById('frm1604cf:registeredAddress').disabled = param;
        d.getElementById('frm1604cf:zipCode').disabled = param;
        @if($action != 'view')  
        d.getElementById('frm1604cf:btnFinalCopy').disabled = false;
        @endif
        //changeRefund();

        var x = 1;
        var y;
        while(x <= 4){
            if(x == 4){
                y = 1;
                while(y <= 4){
                    d.getElementById('frm1604cf:txtSched' + x + 'TaxWheld' + y).disabled = param;
                    d.getElementById('frm1604cf:txtSched' + x + 'Pen' + y).disabled = param;
                    d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).disabled = param;
                    d.getElementById('frm1604cf:txtSched' + x + 'BankVal' + y).disabled = param;
                    y++;
                }
            }else {
                y = 1;
                while(y <= 12){
                    d.getElementById('frm1604cf:txtSched' + x + 'TaxWheld' + y).disabled = param;
                    d.getElementById('frm1604cf:txtSched' + x + 'Pen' + y).disabled = param;
                    d.getElementById('frm1604cf:txtSched' + x + 'Date' + y).disabled = param;
                    d.getElementById('frm1604cf:txtSched' + x + 'BankVal' + y).disabled = param;
                    if(x == 1){
                        d.getElementById('frm1604cf:txtSched1Adj' + y).disabled = param;
                    }
                    y++;
                }
            }
            x++;
        }
    
    if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
    d.getElementById('frm1604cf:txtYear').disabled = true;
    }
    
    disableElem;
    enableElem;
    }
  
  
  function initialValidateBeforeSave() {
      if( (d.getElementById('frm1604cf:tinA').value == "" || d.getElementById('frm1604cf:tinB').value == "" || d.getElementById('frm1604cf:tinC').value == "" || d.getElementById('frm1604cf:branchCode').value == "")  )
      {
        alert("Please enter a valid TIN number on Item 4.");
        return false;
      } 
     
      if( (d.getElementById('frm1604cf:registeredName').value == "")  )
      {
        alert("Please enter a valid Taxpayer Name on Item 7.");
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
  $('#bg').hide(); //920
  $('.printSignFooterClass').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always' });  
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
        document.getElementById(elem[i].id).style.height="17px";
        document.getElementById(elem[i].id).style.fontSize="12px";
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
                save('1604CF',data);
                
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
        saveAndExit('1604CF',data);
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

        submitAndSave('1604CF', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1604CF';
    }
</script>
@endsection