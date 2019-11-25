@extends('layouts.app')
@section('title', '| BIR Form No. 1604E')
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
                    <button type="button" class="btn btn-danger btn-exit" id="1604E" company='{{$company->id}}'>No</button>
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
                    <button type="button" class="btn btn-success btn-exit" id="1604E" company='{{$company->id}}'>Okay</button>
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
                        <button type="button" class="btn btn-danger btn-filing-success" form='1604E' company='{{$company->id}}'>Okay</button>
                    </div>
                </div>
              </div>
            </div>


    <form id="frmMain" name="frmMain">
    	 @csrf
        <input type="hidden" name="company" value="{{ $company->id}}">
        <input type="hidden" name="form_no" value="{{ $action == 'new' ? $form_no : $data->form_no }}">
        <input type="hidden" name="form_id" value="{{ $action == 'new' ? '' : $data->id }}">
        <div id="container">
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 761px; ">
                <div id="formPaper">
                    <table width="746" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="746" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
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
                                            <font size="4px" style="font-weight:bold;">Annual Information Return of<br/>Creditable Income Taxes Withheld
                                            <br/>(Expanded)/Income Payments
                                            <br/>Exempt from Withholding Tax</font>
                                        </td>
                                        <td width="145" valign="center">
                                            <label face="Arial" size="1px">BIR Form No.<br/></label>
                                            <font face="Arial" size="6px">1604-E<br/></font>
                                            <label face="Arial" size="1px">July 1999 (ENCS)</label>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="740px" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="291" valign="top" class="tblFormTd">
                                            <table width="234" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td colspan="2"><font size="1" style="font-size: 11px;">For the Year (YYYY)
                                                            <input type="text" value="{{$action == 'new' ? '' : $data->item1}}" size="5" name="frm1604e:txtYear" maxlength="4" id="frm1604e:txtYear" onkeypress="return wholenumber(this, event)" onfocus="this.yearValue=this.value; return true;" onchange="yearChanged(this.yearValue)" />
                                                        </font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;
                                                    </td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="214" valign="top" class="tblFormTd">
                                            <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1604e:j_id217" class="iceSelOneRb-dis fieldText1-dis">
                                                            <div align="center" style="padding: 5px 0 5px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <tbody>
                                                                        <tr>
                                                                        	@if($action == 'new')
                                                                            <td><input type="radio" value="Y" name="frm1604e:j_id217" id="frm1604e:j_id217:_1" disabled="disabled" /><label for="frm1604e:j_id217:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" value="N"  name="frm1604e:j_id217" id="frm1604e:j_id217:_2" disabled="disabled" checked="checked" /><label for="frm1604e:j_id217:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >No</label></td>
                                                                        	@else
                                                                        	<td><input type="radio" value="Y" {{$data->item2 == 'Y' ? 'checked' : ''}} name="frm1604e:j_id217" id="frm1604e:j_id217:_1" disabled="disabled" /><label for="frm1604e:j_id217:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                            <td><input type="radio" value="N" {{$data->item2 == 'N' ? 'checked' : ''}}  name="frm1604e:j_id217" id="frm1604e:j_id217:_2" disabled="disabled" /><label for="frm1604e:j_id217:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >No</label></td>
                                                                        	@endif
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="235" valign="top" class="tblFormTd">
                                            <table width="185" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">No. of Sheets Attached?
                                                            <input type="text" value="{{$action == 'new' ? '0' : $data->item3}}" style="text-align: right;" size="4" name="frm1604e:txtSheets" maxlength="2" id="frm1604e:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" />
                                                        </font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table width="" border="0" cellspacing="0" cellpadding="0">
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
                                <table width="733px" border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                    <tr>
                                        <td width="236" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;4&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="{{$company->tin1}}"  size="2" name="frm1604e:txtTIN1" maxlength="3" id="frm1604e:txtTIN1" onkeypress="return wholenumber(this, event)"/>
                                                            <input type="text" value="{{$company->tin2}}"  size="2" name="frm1604e:txtTIN2" maxlength="3" id="frm1604e:txtTIN2" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin3}}"  size="2" name="frm1604e:txtTIN3" maxlength="3" id="frm1604e:txtTIN3" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin4}}"  size="2" name="frm1604e:txtBranchCode" maxlength="3" id="frm1604e:txtBranchCode" onkeypress="return letternumber(event)" />
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="124" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font><font size="1">RDO Code&nbsp;</font></td>
                                                    <td id="rdoSelect">
                                                    	<select class='iceSelOneMnu' id='frm1604e:txtRDOCode' name='frm1604e:txtRDOCode' size='1' disabled>
                                                    		<option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                    	</select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="376" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">Line of Business/Occupation&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" style="width: 220px;" value="{{$company->line_business}}"  size="18" name="frm1604e:txtLineBus" maxlength="30" id="frm1604e:txtLineBus" onblur="return capital(this, event)" disabled/>
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
                                <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="77%" valign="top" class="tblFormTd">
                                            <table width="547" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="529">
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="11"><font size="2" style="font-weight:bold;">&nbsp;7&nbsp;</font></td>
                                                                <td><label size="1" style="font-size: 11px;">Withholding Agent's Name (Last Name, First Name, Middle Name for Individuals) /&nbsp;(Registered Name for Non-Individuals) </label></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="25">&nbsp;</td>
                                                                <td><input type="text" value="{{$company->registered_name}}"  size="70" name="frm1604e:txtAgentname" maxlength="70" id="frm1604e:txtAgentname" onblur="return capital(this, event)" disabled/></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="23%" valign="top" class="tblFormTd">
                                            <table width="149" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="149"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font><font size="1" style="font-size: 11px;">Telephone
                                                            Number</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" value="{{$company->tel_number}}"  size="15" name="frm1604e:txtTelNum" maxlength="20" id="frm1604e:txtTelNum" onkeypress="return wholenumber(this, event)" disabled/>
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
                                <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="77%" valign="top" class="tblFormTd">
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
                                                                <td><input type="text" value="{{$company->address}}"  size="70" name="frm1604e:txtAddress" maxlength="70" id="frm1604e:txtAddress" onblur="return capital(this, event)" disabled/></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="23%" valign="top" class="tblFormTd">
                                            <table width="149" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="149"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font><font size="1" style="font-size: 11px;">Zip
                                                            Code</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" value="{{$company->zip_code}}"  size="12" name="frm1604e:txtZipCode" maxlength="12" id="frm1604e:txtZipCode" onkeypress="return wholenumber(this, event)" disabled/>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="36" colspan="2" valign="top" class="tblFormTd">
                                            <table width="721" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="207"><font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font><font size="1"><font size="1" style="font-size: 11px;">Category of Withholding Agent</font> </font></td>
                                                    <td width="514"><table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                            <tbody>
                                                                <tr>
                                                                	@if($action == 'new')
                                                                    <td>
                                                                        <input type="radio" value="P" name="frm1604e:j_id392" id="frm1604e:j_id392:_1" />
                                                                        <label for="frm1604e:j_id392:_1" class="iceSelOneRb fieldText1" style="font-size:12px;" >Private</label>
                                                                        &nbsp;&nbsp;&nbsp;
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" value="G" name="frm1604e:j_id392" id="frm1604e:j_id392:_2" />
                                                                        <label for="frm1604e:j_id392:_2" class="iceSelOneRb fieldText1" style="font-size:12px;" >Government</label>
                                                                    </td>
                                                                    @else
                                                                    <td>
                                                                        <input type="radio" value="P" {{$data->item11 == 'P' ? 'checked' : ''}} name="frm1604e:j_id392" id="frm1604e:j_id392:_1" />
                                                                        <label for="frm1604e:j_id392:_1" class="iceSelOneRb fieldText1" style="font-size:12px;" >Private</label>
                                                                        &nbsp;&nbsp;&nbsp;
                                                                    </td>
                                                                    <td>
                                                                        <input type="radio" value="G" {{$data->item11 == 'G' ? 'checked' : ''}} name="frm1604e:j_id392" id="frm1604e:j_id392:_2" />
                                                                        <label for="frm1604e:j_id392:_2" class="iceSelOneRb fieldText1" style="font-size:12px;" >Government</label>
                                                                    </td>
                                                                    @endif
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
                                <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
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
                                                                    size="2"><b>R e m i t t a n c e &nbsp; p e r &nbsp; B I R &nbsp; F o r m &nbsp; N o. &nbsp; 1 6 0 1 - E</b></font></font></div></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTd"><table width="730" border="1">
                                                <tr>
                                                    <td width="46"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2" style="font-size: 11px;">MONTH</font></div></td>
                                                    <td width="119"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2" style="font-size: 11px;">DATE OF REMITTANCE</font></div></td>
                                                    <td width="120"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2" style="font-size: 11px;">NAME OF BANK/BANK CODE/ROR NO., IF ANY</font></div></td>
                                                    <td width="133"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2" style="font-size: 11px;">TAXES WITHHELD</font></div></td>
                                                    <td width="134"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2" style="font-size: 11px;">PENALTIES</font></div></td>
                                                    <td width="138"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2" style="font-size: 11px;">TOTAL AMOUNT REMITTED</font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">JAN</font></td>
                                                    <td>
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Date1" maxlength="10"
                                                                    name="frm1604e:txtSched1Date1" value="{{$action == 'new' ? '' : $data->sched1_date1 }}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            <font face="Arial" size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched1BankVal1"
                                                                       maxlength="50" value="{{$action == 'new' ? '' : $data->sched1_bank1 }}" name="frm1604e:txtSched1BankVal1" size="14" type="text" />
                                                            </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1TaxWheld1" maxlength="25"
                                                                    name="frm1604e:txtSched1TaxWheld1" value="{{$action == 'new' ? '0.00' : $data->sched1_withheld1}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld1','frm1604e:txtSched1Pen1','frm1604e:txtSched1TotalAmt1', 1)" />
                                                            </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Pen1" maxlength="25"
                                                                    name="frm1604e:txtSched1Pen1" value="{{$action == 'new' ? '0.00' : $data->sched1_penalties1}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)"  type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld1','frm1604e:txtSched1Pen1','frm1604e:txtSched1TotalAmt1', 1)" />
                                                            </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched1TotalAmt1" maxlength="25"
                                                                       name="frm1604e:txtSched1TotalAmt1" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total1}}" type="text" />
                                                            </font>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">FEB</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Date2" maxlength="10"
                                                                    name="frm1604e:txtSched1Date2" value="{{$action == 'new' ? '' : $data->sched1_date2}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched1BankVal2"
                                                                       maxlength="50" name="frm1604e:txtSched1BankVal2" value="{{$action == 'new' ? '' : $data->sched1_bank2}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1TaxWheld2" maxlength="25"
                                                                    name="frm1604e:txtSched1TaxWheld2"  value="{{$action == 'new' ? '0.00' : $data->sched1_withheld2}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)"  type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld2','frm1604e:txtSched1Pen2','frm1604e:txtSched1TotalAmt2', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Pen2" maxlength="25"
                                                                    name="frm1604e:txtSched1Pen2" value="{{$action == 'new' ? '0.00' : $data->sched1_penalties2}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)"  type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld2','frm1604e:txtSched1Pen2','frm1604e:txtSched1TotalAmt2', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched1TotalAmt2" maxlength="25"
                                                                       name="frm1604e:txtSched1TotalAmt2" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total2}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">MAR</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Date3" maxlength="10"
                                                                    name="frm1604e:txtSched1Date3" value="{{$action == 'new' ? '' : $data->sched1_date3}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched1BankVal3"
                                                                       maxlength="50" name="frm1604e:txtSched1BankVal3" value="{{$action == 'new' ? '' : $data->sched1_bank3}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1TaxWheld3" maxlength="25"
                                                                    name="frm1604e:txtSched1TaxWheld3"  value="{{$action == 'new' ? '0.00' : $data->sched1_withheld3}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld3','frm1604e:txtSched1Pen3','frm1604e:txtSched1TotalAmt3', 1)"/>
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Pen3" maxlength="25"
                                                                    name="frm1604e:txtSched1Pen3" value="{{$action == 'new' ? '0.00' : $data->sched1_penalties3}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)"  type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld3','frm1604e:txtSched1Pen3','frm1604e:txtSched1TotalAmt3', 1)"/>
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched1TotalAmt3" maxlength="25"
                                                                       name="frm1604e:txtSched1TotalAmt3" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total3}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">APR</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Date4" maxlength="10"
                                                                    name="frm1604e:txtSched1Date4" value="{{$action == 'new' ? '' : $data->sched1_date4}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched1BankVal4"
                                                                       maxlength="50" name="frm1604e:txtSched1BankVal4" value="{{$action == 'new' ? '' : $data->sched1_bank4}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1TaxWheld4" maxlength="25"
                                                                    name="frm1604e:txtSched1TaxWheld4"  value="{{$action == 'new' ? '0.00' : $data->sched1_withheld4}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)"  type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld4','frm1604e:txtSched1Pen4','frm1604e:txtSched1TotalAmt4', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Pen4" maxlength="25"
                                                                    name="frm1604e:txtSched1Pen4" value="{{$action == 'new' ? '0.00' : $data->sched1_penalties4}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)"  type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld4','frm1604e:txtSched1Pen4','frm1604e:txtSched1TotalAmt4', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched1TotalAmt4" maxlength="25"
                                                                       name="frm1604e:txtSched1TotalAmt4" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total4}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">MAY</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Date5" maxlength="10"
                                                                    name="frm1604e:txtSched1Date5" value="{{$action == 'new' ? '' : $data->sched1_date5}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched1BankVal5"
                                                                       maxlength="50" name="frm1604e:txtSched1BankVal5" value="{{$action == 'new' ? '' : $data->sched1_bank5}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1TaxWheld5" maxlength="25"
                                                                    name="frm1604e:txtSched1TaxWheld5"  value="{{$action == 'new' ? '0.00' : $data->sched1_withheld5}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld5','frm1604e:txtSched1Pen5','frm1604e:txtSched1TotalAmt5', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Pen5" maxlength="25"
                                                                    name="frm1604e:txtSched1Pen5" value="{{$action == 'new' ? '0.00' : $data->sched1_penalties5}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld5','frm1604e:txtSched1Pen5','frm1604e:txtSched1TotalAmt5', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched1TotalAmt5" maxlength="25"
                                                                       name="frm1604e:txtSched1TotalAmt5" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total5}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">JUN</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Date6" maxlength="10"
                                                                    name="frm1604e:txtSched1Date6" value="{{$action == 'new' ? '' : $data->sched1_date6}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched1BankVal6"
                                                                       maxlength="50" name="frm1604e:txtSched1BankVal6" value="{{$action == 'new' ? '' : $data->sched1_bank6}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1TaxWheld6" maxlength="25"
                                                                    name="frm1604e:txtSched1TaxWheld6"  value="{{$action == 'new' ? '0.00' : $data->sched1_withheld6}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld6','frm1604e:txtSched1Pen6','frm1604e:txtSched1TotalAmt6', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Pen6" maxlength="25"
                                                                    name="frm1604e:txtSched1Pen6" value="{{$action == 'new' ? '0.00' : $data->sched1_penalties6}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld6','frm1604e:txtSched1Pen6','frm1604e:txtSched1TotalAmt6', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched1TotalAmt6" maxlength="25"
                                                                       name="frm1604e:txtSched1TotalAmt6" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total6}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">JUL</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Date7" maxlength="10"
                                                                    name="frm1604e:txtSched1Date7" value="{{$action == 'new' ? '' : $data->sched1_date7}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched1BankVal7"
                                                                       maxlength="50" name="frm1604e:txtSched1BankVal7" value="{{$action == 'new' ? '' : $data->sched1_bank7}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1TaxWheld7" maxlength="25"
                                                                    name="frm1604e:txtSched1TaxWheld7"  value="{{$action == 'new' ? '0.00' : $data->sched1_withheld7}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)"  type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld7','frm1604e:txtSched1Pen7','frm1604e:txtSched1TotalAmt7', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Pen7" maxlength="25"
                                                                    name="frm1604e:txtSched1Pen7" value="{{$action == 'new' ? '0.00' : $data->sched1_penalties7}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld7','frm1604e:txtSched1Pen7','frm1604e:txtSched1TotalAmt7', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched1TotalAmt7" maxlength="25"
                                                                       name="frm1604e:txtSched1TotalAmt7" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total7}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>

                                                    <td><font face="Arial" size="2">AUG</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Date8" maxlength="10"
                                                                    name="frm1604e:txtSched1Date8" value="{{$action == 'new' ? '' : $data->sched1_date8}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched1BankVal8"
                                                                       maxlength="50" name="frm1604e:txtSched1BankVal8"  value="{{$action == 'new' ? '' : $data->sched1_bank8}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1TaxWheld8" maxlength="25"
                                                                    name="frm1604e:txtSched1TaxWheld8"  value="{{$action == 'new' ? '0.00' : $data->sched1_withheld8}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld8','frm1604e:txtSched1Pen8','frm1604e:txtSched1TotalAmt8', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Pen8" maxlength="25"
                                                                    name="frm1604e:txtSched1Pen8" value="{{$action == 'new' ? '0.00' : $data->sched1_penalties8}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld8','frm1604e:txtSched1Pen8','frm1604e:txtSched1TotalAmt8', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched1TotalAmt8" maxlength="25"
                                                                       name="frm1604e:txtSched1TotalAmt8" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total8}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">SEP</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Date9" maxlength="10"
                                                                    name="frm1604e:txtSched1Date9" value="{{$action == 'new' ? '' : $data->sched1_date9}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched1BankVal9"
                                                                       maxlength="50" name="frm1604e:txtSched1BankVal9" value="{{$action == 'new' ? '' : $data->sched1_bank9}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1TaxWheld9" maxlength="25"
                                                                    name="frm1604e:txtSched1TaxWheld9"  value="{{$action == 'new' ? '0.00' : $data->sched1_withheld9}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld9','frm1604e:txtSched1Pen9','frm1604e:txtSched1TotalAmt9', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Pen9" maxlength="25"
                                                                    name="frm1604e:txtSched1Pen9" value="{{$action == 'new' ? '0.00' : $data->sched1_penalties9}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld9','frm1604e:txtSched1Pen9','frm1604e:txtSched1TotalAmt9', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched1TotalAmt9" maxlength="25"
                                                                       name="frm1604e:txtSched1TotalAmt9" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total9}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">OCT</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Date10" maxlength="10"
                                                                    name="frm1604e:txtSched1Date10" value="{{$action == 'new' ? '' : $data->sched1_date10}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched1BankVal10"
                                                                       maxlength="50" name="frm1604e:txtSched1BankVal10" value="{{$action == 'new' ? '' : $data->sched1_bank10}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1TaxWheld10" maxlength="25"
                                                                    name="frm1604e:txtSched1TaxWheld10"  value="{{$action == 'new' ? '0.00' : $data->sched1_withheld10}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld10','frm1604e:txtSched1Pen10','frm1604e:txtSched1TotalAmt10', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Pen10" maxlength="25"
                                                                    name="frm1604e:txtSched1Pen10" value="{{$action == 'new' ? '0.00' : $data->sched1_penalties10}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld10','frm1604e:txtSched1Pen10','frm1604e:txtSched1TotalAmt10', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched1TotalAmt10" maxlength="25"
                                                                       name="frm1604e:txtSched1TotalAmt10" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total10}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">NOV</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Date11" maxlength="10"
                                                                    name="frm1604e:txtSched1Date11" value="{{$action == 'new' ? '' : $data->sched1_date11}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched1BankVal11"
                                                                       maxlength="50" name="frm1604e:txtSched1BankVal11" value="{{$action == 'new' ? '' : $data->sched1_bank11}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1TaxWheld11" maxlength="25"
                                                                    name="frm1604e:txtSched1TaxWheld11"  value="{{$action == 'new' ? '0.00' : $data->sched1_withheld11}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld11','frm1604e:txtSched1Pen11','frm1604e:txtSched1TotalAmt11', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Pen11" maxlength="25"
                                                                    name="frm1604e:txtSched1Pen11" value="{{$action == 'new' ? '0.00' : $data->sched1_penalties11}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld11','frm1604e:txtSched1Pen11','frm1604e:txtSched1TotalAmt11', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched1TotalAmt11" maxlength="25"
                                                                       name="frm1604e:txtSched1TotalAmt11" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total11}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">DEC</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Date12" maxlength="10"
                                                                    name="frm1604e:txtSched1Date12" value="{{$action == 'new' ? '' : $data->sched1_date12}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched1BankVal12"
                                                                       maxlength="50" name="frm1604e:txtSched1BankVal12" value="{{$action == 'new' ? '' : $data->sched1_bank12}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1TaxWheld12" maxlength="25"
                                                                    name="frm1604e:txtSched1TaxWheld12"  value="{{$action == 'new' ? '0.00' : $data->sched1_withheld12}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld12','frm1604e:txtSched1Pen12','frm1604e:txtSched1TotalAmt12', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched1Pen12" maxlength="25"
                                                                    name="frm1604e:txtSched1Pen12" value="{{$action == 'new' ? '0.00' : $data->sched1_penalties12}}" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched1TaxWheld12','frm1604e:txtSched1Pen12','frm1604e:txtSched1TotalAmt12', 1)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched1TotalAmt12" maxlength="25"
                                                                       name="frm1604e:txtSched1TotalAmt12"  size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total12}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">TOTAL</font></td>
                                                    <td><div align="center"></div></td>
                                                    <td><div align="center"></div></td>
                                                    <td><div align="center"><font face="Arial,
                                                                                  Helvetica, sans-serif" size="2">
                                                                <input class="iceInpTxt-dis"
                                                                       disabled="true" id="frm1604e:txtSched1TaxWheldTotal" maxlength="25"
                                                                       name="frm1604e:txtSched1TaxWheldTotal" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total_withheld}}" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt-dis" disabled="true" id="frm1604e:txtSched1PenTotal"
                                                                    maxlength="25" name="frm1604e:txtSched1PenTotal" size="19" style="text-align: right;
                                                                    font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                    background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total_penalties}}" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched1Total" maxlength="25"
                                                                       name="frm1604e:txtSched1Total" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched1_total_amount}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td class="tblFormTd"><table width="" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Schedule 2</font></td>
                                                    <td width="620"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"><font face="Arial, Helvetica, sans-serif" size="1"><font size="2"><b>R e m i t t a n c e&nbsp;&nbsp; p e r&nbsp;&nbsp; B I R&nbsp;&nbsp; F o r m&nbsp;&nbsp; N o.&nbsp;&nbsp; 1 6 0 6</b></font></font></font></div></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td class="tblFormTd"><table width="730" border="1">
                                                <tr>
                                                    <td width="46"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2" style="font-size: 11px;">MONTH</font></div></td>
                                                    <td width="119"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2" style="font-size: 11px;">DATE OF REMITTANCE</font></div></td>
                                                    <td width="120"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">NAME OF BANK/BANK CODE/ROR NO., IF ANY</font></div></td>
                                                    <td width="133"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2" style="font-size: 11px;">TAXES WITHHELD</font></div></td>
                                                    <td width="134"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2" style="font-size: 11px;">PENALTIES</font></div></td>
                                                    <td width="138"><div align="center"><font face="Arial, Helvetica, sans-serif" size="2" style="font-size: 11px;">TOTAL AMOUNT REMITTED</font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">JAN</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Date1" maxlength="10"
                                                                    name="frm1604e:txtSched2Date1" value="{{$action == 'new' ? '' : $data->sched2_date1}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched2BankVal1"
                                                                       maxlength="50" name="frm1604e:txtSched2BankVal1" value="{{$action == 'new' ? '' : $data->sched2_bank1}}"  size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2TaxWheld1" maxlength="25"
                                                                    name="frm1604e:txtSched2TaxWheld1" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_withheld1}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld1','frm1604e:txtSched2Pen1','frm1604e:txtSched2TotalAmt1', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Pen1" maxlength="25"
                                                                    name="frm1604e:txtSched2Pen1" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_penalties1}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld1','frm1604e:txtSched2Pen1','frm1604e:txtSched2TotalAmt1', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched2TotalAmt1" maxlength="25"
                                                                       name="frm1604e:txtSched2TotalAmt1" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total1}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">FEB</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Date2" maxlength="10"
                                                                    name="frm1604e:txtSched2Date2" value="{{$action == 'new' ? '' : $data->sched2_date2}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched2BankVal2"
                                                                       maxlength="50" name="frm1604e:txtSched2BankVal2" value="{{$action == 'new' ? '' : $data->sched2_bank2}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2TaxWheld2" maxlength="25"
                                                                    name="frm1604e:txtSched2TaxWheld2" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_withheld2}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld2','frm1604e:txtSched2Pen2','frm1604e:txtSched2TotalAmt2', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Pen2" maxlength="25"
                                                                    name="frm1604e:txtSched2Pen2" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_penalties2}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld2','frm1604e:txtSched2Pen2','frm1604e:txtSched2TotalAmt2', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched2TotalAmt2" maxlength="25"
                                                                       name="frm1604e:txtSched2TotalAmt2" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total2}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">MAR</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Date3" maxlength="10"
                                                                    name="frm1604e:txtSched2Date3" value="{{$action == 'new' ? '' : $data->sched2_date3}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched2BankVal3"
                                                                       maxlength="50" name="frm1604e:txtSched2BankVal3" value="{{$action == 'new' ? '' : $data->sched2_bank3}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2TaxWheld3" maxlength="25"
                                                                    name="frm1604e:txtSched2TaxWheld3" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_withheld3}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld3','frm1604e:txtSched2Pen3','frm1604e:txtSched2TotalAmt3', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Pen3" maxlength="25"
                                                                    name="frm1604e:txtSched2Pen3" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_penalties3}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld3','frm1604e:txtSched2Pen3','frm1604e:txtSched2TotalAmt3', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched2TotalAmt3" maxlength="25"
                                                                       name="frm1604e:txtSched2TotalAmt3" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total3}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">APR</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Date4" maxlength="10"
                                                                    name="frm1604e:txtSched2Date4" value="{{$action == 'new' ? '' : $data->sched2_date4}}"  size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched2BankVal4"
                                                                       maxlength="50" name="frm1604e:txtSched2BankVal4" value="{{$action == 'new' ? '' : $data->sched2_bank4}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2TaxWheld4" maxlength="25"
                                                                    name="frm1604e:txtSched2TaxWheld4" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_withheld4}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld4','frm1604e:txtSched2Pen4','frm1604e:txtSched2TotalAmt4', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Pen4" maxlength="25"
                                                                    name="frm1604e:txtSched2Pen4" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_penalties4}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld4','frm1604e:txtSched2Pen4','frm1604e:txtSched2TotalAmt4', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched2TotalAmt4" maxlength="25"
                                                                       name="frm1604e:txtSched2TotalAmt4" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total4}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">MAY</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Date5" maxlength="10"
                                                                    name="frm1604e:txtSched2Date5" value="{{$action == 'new' ? '' : $data->sched2_date5}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched2BankVal5"
                                                                       maxlength="50" name="frm1604e:txtSched2BankVal5" value="{{$action == 'new' ? '' : $data->sched2_bank5}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2TaxWheld5" maxlength="25"
                                                                    name="frm1604e:txtSched2TaxWheld5" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_withheld5}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld5','frm1604e:txtSched2Pen5','frm1604e:txtSched2TotalAmt5', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Pen5" maxlength="25"
                                                                    name="frm1604e:txtSched2Pen5" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_penalties5}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld5','frm1604e:txtSched2Pen5','frm1604e:txtSched2TotalAmt5', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched2TotalAmt5" maxlength="25"
                                                                       name="frm1604e:txtSched2TotalAmt5" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total5}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">JUN</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Date6" maxlength="10"
                                                                    name="frm1604e:txtSched2Date6" value="{{$action == 'new' ? '' : $data->sched2_date6}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched2BankVal6"
                                                                       maxlength="50" name="frm1604e:txtSched2BankVal6" value="{{$action == 'new' ? '' : $data->sched2_bank6}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2TaxWheld6" maxlength="25"
                                                                    name="frm1604e:txtSched2TaxWheld6" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_withheld6}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld6','frm1604e:txtSched2Pen6','frm1604e:txtSched2TotalAmt6', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Pen6" maxlength="25"
                                                                    name="frm1604e:txtSched2Pen6" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_penalties6}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld6','frm1604e:txtSched2Pen6','frm1604e:txtSched2TotalAmt6', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched2TotalAmt6" maxlength="25"
                                                                       name="frm1604e:txtSched2TotalAmt6" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total6}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">JUL</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Date7" maxlength="10"
                                                                    name="frm1604e:txtSched2Date7" value="{{$action == 'new' ? '' : $data->sched2_date7}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched2BankVal7"
                                                                       maxlength="50" name="frm1604e:txtSched2BankVal7" value="{{$action == 'new' ? '' : $data->sched2_bank7}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2TaxWheld7" maxlength="25"
                                                                    name="frm1604e:txtSched2TaxWheld7" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_withheld7}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld7','frm1604e:txtSched2Pen7','frm1604e:txtSched2TotalAmt7', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Pen7" maxlength="25"
                                                                    name="frm1604e:txtSched2Pen7" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_penalties7}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld7','frm1604e:txtSched2Pen7','frm1604e:txtSched2TotalAmt7', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched2TotalAmt7" maxlength="25"
                                                                       name="frm1604e:txtSched2TotalAmt7" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total7}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">AUG</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Date8" maxlength="10"
                                                                    name="frm1604e:txtSched2Date8" value="{{$action == 'new' ? '' : $data->sched2_date8}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched2BankVal8"
                                                                       maxlength="50" name="frm1604e:txtSched2BankVal8" value="{{$action == 'new' ? '' : $data->sched2_bank8}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2TaxWheld8" maxlength="25"
                                                                    name="frm1604e:txtSched2TaxWheld8" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_withheld8}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld8','frm1604e:txtSched2Pen8','frm1604e:txtSched2TotalAmt8', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Pen8" maxlength="25"
                                                                    name="frm1604e:txtSched2Pen8" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_penalties8}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld8','frm1604e:txtSched2Pen8','frm1604e:txtSched2TotalAmt8', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched2TotalAmt8" maxlength="25"
                                                                       name="frm1604e:txtSched2TotalAmt8" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total8}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">SEP</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Date9" maxlength="10"
                                                                    name="frm1604e:txtSched2Date9" value="{{$action == 'new' ? '' : $data->sched2_date9}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched2BankVal9"
                                                                       maxlength="50" name="frm1604e:txtSched2BankVal9" value="{{$action == 'new' ? '' : $data->sched2_bank9}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2TaxWheld9" maxlength="25"
                                                                    name="frm1604e:txtSched2TaxWheld9" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_withheld9}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld9','frm1604e:txtSched2Pen9','frm1604e:txtSched2TotalAmt9', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Pen9" maxlength="25"
                                                                    name="frm1604e:txtSched2Pen9" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_penalties9}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld9','frm1604e:txtSched2Pen9','frm1604e:txtSched2TotalAmt9', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched2TotalAmt9" maxlength="25"
                                                                       name="frm1604e:txtSched2TotalAmt9" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total9}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">OCT</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Date10" maxlength="10"
                                                                    name="frm1604e:txtSched2Date10" value="{{$action == 'new' ? '' : $data->sched2_date10}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched2BankVal10"
                                                                       maxlength="50" name="frm1604e:txtSched2BankVal10" value="{{$action == 'new' ? '' : $data->sched2_bank10}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2TaxWheld10" maxlength="25"
                                                                    name="frm1604e:txtSched2TaxWheld10" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_withheld10}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld10','frm1604e:txtSched2Pen10','frm1604e:txtSched2TotalAmt10', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Pen10" maxlength="25"
                                                                    name="frm1604e:txtSched2Pen10" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_penalties10}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld10','frm1604e:txtSched2Pen10','frm1604e:txtSched2TotalAmt10', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched2TotalAmt10" maxlength="25"
                                                                       name="frm1604e:txtSched2TotalAmt10" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total10}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">NOV</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Date11" maxlength="10"
                                                                    name="frm1604e:txtSched2Date11" value="{{$action == 'new' ? '' : $data->sched2_date11}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched2BankVal11"
                                                                       maxlength="50" name="frm1604e:txtSched2BankVal11" value="{{$action == 'new' ? '' : $data->sched2_bank11}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2TaxWheld11" maxlength="25"
                                                                    name="frm1604e:txtSched2TaxWheld11" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_withheld11}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld11','frm1604e:txtSched2Pen11','frm1604e:txtSched2TotalAmt11', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Pen11" maxlength="25"
                                                                    name="frm1604e:txtSched2Pen11" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_penalties11}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld11','frm1604e:txtSched2Pen11','frm1604e:txtSched2TotalAmt11', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched2TotalAmt11" maxlength="25"
                                                                       name="frm1604e:txtSched2TotalAmt11" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total11}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">DEC</font></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Date12" maxlength="10"
                                                                    name="frm1604e:txtSched2Date12" value="{{$action == 'new' ? '' : $data->sched2_date12}}" size="14" style="background-color: white; color: black; text-align:
                                                                    right;" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial"
                                                                                  size="2">
                                                                <input class="iceInpTxt" id="frm1604e:txtSched2BankVal12"
                                                                       maxlength="50" name="frm1604e:txtSched2BankVal12" value="{{$action == 'new' ? '' : $data->sched2_bank12}}" size="14" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2TaxWheld12" maxlength="25"
                                                                    name="frm1604e:txtSched2TaxWheld12" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_withheld12}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld12','frm1604e:txtSched2Pen12','frm1604e:txtSched2TotalAmt12', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt" id="frm1604e:txtSched2Pen12" maxlength="25"
                                                                    name="frm1604e:txtSched2Pen12" size="19" style="text-align: right; font-family:
                                                                    Arial,Helvetica,sans-serif; font-size: 9pt;" onkeypress="return numbersonly(this, event)" value="{{$action == 'new' ? '0.00' : $data->sched2_penalties12}}" type="text" onblur="round(this,2);computeTotalRemitted('frm1604e:txtSched2TaxWheld12','frm1604e:txtSched2Pen12','frm1604e:txtSched2TotalAmt12', 2)" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched2TotalAmt12" maxlength="25"
                                                                       name="frm1604e:txtSched2TotalAmt12" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total12}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial" size="2">TOTAL</font></td>
                                                    <td><div align="center"></div></td>
                                                    <td><div align="center"></div></td>
                                                    <td><div align="center"><font face="Arial,
                                                                                  Helvetica, sans-serif" size="2">
                                                                <input class="iceInpTxt-dis"
                                                                       disabled="true" id="frm1604e:txtSched2TaxWheldTotal" maxlength="25"
                                                                       name="frm1604e:txtSched2TaxWheldTotal" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total_withheld}}" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                <input
                                                                    class="iceInpTxt-dis" disabled="true" id="frm1604e:txtSched2PenTotal"
                                                                    maxlength="25" name="frm1604e:txtSched2PenTotal" size="19" style="text-align: right;
                                                                    font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                    background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total_penalties}}" type="text" />
                                                            </font></div></td>
                                                    <td><div align="center"><font face="Arial, Helvetica, sans-serif"
                                                                                  size="2">
                                                                <input class="iceInpTxt-dis" disabled="true"
                                                                       id="frm1604e:txtSched2Total" maxlength="25"
                                                                       name="frm1604e:txtSched2Total" size="19" style="text-align: right;
                                                                       font-family: Arial,Helvetica,sans-serif; font-size: 9pt;
                                                                       background-color: rgb(220, 220, 220);" value="{{$action == 'new' ? '0.00' : $data->sched2_total_amount}}" type="text" />
                                                            </font></div></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
								<div class="imgClass" align='center' style="display:none; width:740px !important;">
									<br />
									<table style="border-top: 3px solid black; border-collapse: collapse; font-size:11px; font-family:arial; text-align: center; table-layout: fixed;">
									  <col width="40%"/>
									  <col width="40%"/>
									  <col width="20%"/>
									  <tr>
									    <td colspan="2" style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the
									    	<br /> best of my knowledge and belief, is true and correct, pursuant to the provisions of the National Internal Revenue Code,
									    	<br />as amended, and the regulations issued under authority thereof.
									    	<br />&nbsp;</td>
									    <td style="border-left: 3px solid #000;">Stamp of Receiving Office
									    	<br />and Date of Receipt
									    	<br />
									    	<br />&nbsp;</td>
									  </tr>
									  <tr>
									    <td ><b>12</b>_____________________________________________
									    	<br />Taxpayer/Authorized Agent Signature over Printed Name
									    	<br />&nbsp;</td>
									    <td ><b>13</b>_______________________________
									    	<br />Title/Position of Signatory
									    	<br />&nbsp;</td>
									    <td style="border-left: 3px solid #000;">
									    	<br />
									    	<br />&nbsp;</td>
									  </tr>
									</table>
								</div>
                                <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass" style="border-bottom: #AAAAAA 1px solid;">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table width="735" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr valign="middle">
                                                                    <td width="45"></td>
                                                                    <td width="650">
                                                                        <div id="frm1604e:j_id743" class="icePnlGrp" >
                                                                            <div align="center">
                                                                            	 @if($action != 'view')
                                                                                <input class="printButtonClass"  type="button" value="Validate" style="width: 100px;" name="frm1604e:cmdValidate" id="frm1604e:cmdValidate" onclick="validateForm()" />
                                                                                <input class="printButtonClass"  type="button" value="Edit" style="width: 100px;" name="frm1604e:cmdEdit" id="frm1604e:cmdEdit" onclick="editForm()"/>
																				<input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
																				<input class="printButtonClass"  type="button" value="{{$action == 'new' ? 'Save' : 'Update'}}" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
																				<input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
																				<input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1604e:btnFinalCopy" id="frm1604e:btnFinalCopy" onclick="submitForm();" />
																				@else
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                                @endif																			
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td width="40"></td>
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
                                <div class="footer" style="padding:6px; text-align: center; font-size: 11px; background-color: white; width: 100%;">
                                    <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
		
		<div id="hiddenEmail" style="display:none;"  > 
			<input id="txtEmail" value="{{$company->email_address}}" class="emailClass" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60"   />
		</div>

	</form>	
@endsection

@section('scripts')
<script type="text/javascript">
    //Declare global variable
	var isSubmitFinal = false;
	var isSubmit = false;
	
	var gIsReadOnly = false;
    var str;
	var fileName = "";
	var existingXMLFileName = "";
	var fileNameToExport = "";

	var savedReturn = "";
	var p3FilingDate = "";
	var p3ReturnPeriod = "";
	var p3ReturnPeriodEnd = "";
	
	
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
		
		d.getElementById('frm1604e:txtTIN1').disabled = true;
	    d.getElementById('frm1604e:txtTIN2').disabled = true;
		d.getElementById('frm1604e:txtTIN3').disabled = true;
		d.getElementById('frm1604e:txtBranchCode').disabled = true;	
   }
	
	function rdoPropertyJS(rdoCode, description) 
	{
		this.rdoCode=rdoCode;
		this.description=description;
	}
		
	var rdoList = new Array();

    var d=document,XMLBGFile='',data='',XMLFile='',msg = d.getElementById('msg');
	var loader=d.getElementById('loader');
	
	function isItAnAmendedReturn(xmlFile) {	
		if(d.getElementById('frm1604e:j_id217:_1').checked) {
			return true;
		} else {
			return false;
		}		
	}

    function init()
    {
        var year = new Date();

        @if($action == 'new')
		d.getElementById('frm1604e:txtYear').value = year.getFullYear() - 1;
		@endif

		@if($action != 'view')	
		d.getElementById('btnPrint').disabled = true;
		d.getElementById('frm1604e:cmdEdit').disabled = true;
		d.getElementById('frm1604e:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;	
        d.getElementById('frm1604e:txtSheets').disabled = false;
        @else
			enabledDisabledCtrl(true);
		@endif
        
        d.getElementById('frm1604e:j_id217:_1').disabled = false;
        d.getElementById('frm1604e:j_id217:_2').disabled = false;

        
    
        var x = 1;
        while(x <= 12){
            d.getElementById('frm1604e:txtSched1TotalAmt' + x).disabled = true;
            d.getElementById('frm1604e:txtSched2TotalAmt' + x).disabled = true;
            x++;
        }
        
        d.getElementById('frm1604e:txtSched1TaxWheldTotal').disabled = true;
        d.getElementById('frm1604e:txtSched1PenTotal').disabled = true;
        d.getElementById('frm1604e:txtSched1Total').disabled = true;

        d.getElementById('frm1604e:txtSched2TaxWheldTotal').disabled = true;
        d.getElementById('frm1604e:txtSched2PenTotal').disabled = true;
        d.getElementById('frm1604e:txtSched2Total').disabled = true;
	
    }

    function blockletter(e)
    {
        if(e.value < 0){
            e.value = (0).toFixed(2);
        }else {
            var number = parseFloat(e.value).toFixed(2);
            if(isNaN(number))
            {
                var zero = 0;
                e.value = parseFloat(zero).toFixed(2);
            }else {
                e.value = '' + number;
            }
        }
    }

    function validateForm()
    {
        var dt = new Date();

        if((d.getElementById('frm1604e:txtYear').value == ""))
        {
            alert("Please enter a valid year on Item 1.");
            return;
        }
      
        if(d.getElementById('frm1604e:txtYear').value*1 < 1900)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }

		if( (d.getElementById('frm1604e:txtTIN1').value == "" || d.getElementById('frm1604e:txtTIN2').value == "" || d.getElementById('frm1604e:txtTIN3').value == "" || d.getElementById('frm1604e:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 4.");
            return;
        }		
      		
        if( (d.getElementById('frm1604e:txtLineBus').value == "")  )
        {
            alert("Please enter a valid Line of Business on Item 6.");
            return;
        }			
		if( (d.getElementById('frm1604e:txtAgentname').value == "")  )
        {
            alert("Please enter a valid Withholding Agent's Name on Item 7.");
            return;
        }	
		if( (d.getElementById('frm1604e:txtTelNum').value == "")  )
        {
            alert("Please enter Taxpayer's Telephone Number on Item 8.");
            return;
        }
		if( (d.getElementById('frm1604e:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 9.");
            return;
        }	
		if( (d.getElementById('frm1604e:txtZipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip Code on Item 10.");
            return;
        }
		
        if(d.getElementById('frm1604e:j_id392:_1').checked == false && d.getElementById('frm1604e:j_id392:_2').checked == false )
        {
            alert("Please select an option for Item 11.")
            return;
        }

        if(!isEmptyRow()){
            d.getElementById('frm1604e:cmdValidate').disabled = true;
            d.getElementById('btnPrint').disabled = false;
            d.getElementById('frm1604e:cmdEdit').disabled = false;
            d.getElementById('btnUpload').disabled = false;

            enabledDisabledCtrl(true);

            alert("Validation successful. Click on 'Edit' if you wish to modify your entries.");
			return;
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
					return true;
				}
				else if( result[1].length != 2 || (result[1] > 31 || result[1] < 1) ){
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
	/*for contains function*/
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
    function editForm()
    {
        d.getElementById('frm1604e:cmdValidate').disabled = false;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1604e:cmdEdit').disabled = true;
        d.getElementById('btnUpload').disabled = true;

        enabledDisabledCtrl(false);
		d.getElementById('frm1604e:txtTIN1').disabled = true;
	    d.getElementById('frm1604e:txtTIN2').disabled = true;
		d.getElementById('frm1604e:txtTIN3').disabled = true;
		d.getElementById('frm1604e:txtBranchCode').disabled = true;	
    }

	var disableElem = true;
	var enableElem = false;
    function enabledDisabledCtrl(param)
    {
        d.getElementById('frm1604e:j_id217:_1').disabled = param;
        d.getElementById('frm1604e:j_id217:_2').disabled = param;
        d.getElementById('frm1604e:txtYear').disabled = param;
        d.getElementById('frm1604e:j_id392:_1').disabled = param;
        d.getElementById('frm1604e:j_id392:_2').disabled = param;
		d.getElementById('frm1604e:txtSheets').disabled = param;
        d.getElementById('frm1604e:txtTIN1').disabled = param;
        d.getElementById('frm1604e:txtTIN2').disabled = param;
        d.getElementById('frm1604e:txtTIN3').disabled = param;
        d.getElementById('frm1604e:txtBranchCode').disabled = param;
		d.getElementById('frm1604e:txtRDOCode').disabled = param;
		d.getElementById('frm1604e:txtLineBus').disabled = param;
        d.getElementById('frm1604e:txtAgentname').disabled = param;
        d.getElementById('frm1604e:txtTelNum').disabled = param;
        d.getElementById('frm1604e:txtAddress').disabled = param;
        d.getElementById('frm1604e:txtZipCode').disabled = param;

        @if($action != 'view')
		d.getElementById('frm1604e:btnFinalCopy').disabled = false;
		@endif
        var x = 1;
        while(x <= 12){
            d.getElementById('frm1604e:txtSched1Date' + x).disabled = param;
            d.getElementById('frm1604e:txtSched1BankVal' + x).disabled = param;
            d.getElementById('frm1604e:txtSched1TaxWheld' + x).disabled = param;
            d.getElementById('frm1604e:txtSched1Pen' + x).disabled = param;
            //Schedule 2
            d.getElementById('frm1604e:txtSched2Date' + x).disabled = param;
            d.getElementById('frm1604e:txtSched2BankVal' + x).disabled = param;
            d.getElementById('frm1604e:txtSched2TaxWheld' + x).disabled = param;
            d.getElementById('frm1604e:txtSched2Pen' + x).disabled = param;

            x++;
        }
		
		if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
		d.getElementById('frm1604e:txtYear').disabled = true;	
		}
		
		disableElem;
		enableElem;
    }

    function computeTotalRemitted(withheldId, penaltiesId, totalRemId, flag)
    {
        d.getElementById(totalRemId).value = formatCurrency(NumWithComma(d.getElementById(withheldId).value)*1 + NumWithComma(d.getElementById(penaltiesId).value)*1);

        computeTotal(flag);
		capital();
    }

    function computeTotal(y)
    {
        var x = 1;
        var totalWithheld = 0;
        var totalPenalties = 0;
        var totalRemitted = 0;
        while (x <= 12) {
            totalWithheld = totalWithheld + NumWithComma(d.getElementById('frm1604e:txtSched' + y + 'TaxWheld' + x).value)*1;
            totalPenalties = totalPenalties + NumWithComma(d.getElementById('frm1604e:txtSched' + y + 'Pen' + x).value)*1;
            totalRemitted = totalRemitted + NumWithComma(d.getElementById('frm1604e:txtSched' + y + 'TotalAmt' + x).value)*1;

            x++;
        }

        d.getElementById('frm1604e:txtSched' + y + 'TaxWheldTotal').value = formatCurrency(totalWithheld);
        d.getElementById('frm1604e:txtSched' + y + 'PenTotal').value = formatCurrency(totalPenalties);
        d.getElementById('frm1604e:txtSched' + y + 'Total').value = formatCurrency(totalRemitted);
		capital();
    }

    function isEmptyRow()
    {
        var y = 1;
        var x = 1;
        while(y <= 2){
            x = 1;
            while(x <= 12) {
                if(d.getElementById('frm1604e:txtSched' + y + 'TotalAmt' + x).value != 0){
                    if(d.getElementById('frm1604e:txtSched' + y + 'Date' + x).value == ""){
                        alert("Incomplete values on Schedule " + y + ", Row " + x + ".");
                        return true;
                    }else if(d.getElementById('frm1604e:txtSched' + y + 'BankVal' + x).value == ""){
                        alert("Incomplete values on Schedule " + y + ", Row " + x + ".");
                        return true;
                    }
                }
                if(d.getElementById('frm1604e:txtSched' + y + 'BankVal' + x).value != "" || d.getElementById('frm1604e:txtSched' + y + 'Date' + x).value != ""){
                    if(d.getElementById('frm1604e:txtSched' + y + 'Date' + x).value == "" || d.getElementById('frm1604e:txtSched' + y + 'BankVal' + x).value == ""){
                        alert("Incomplete values on Schedule " + y + ", Row " + x + ".");
                        return true;
                    }
                }
                if(d.getElementById('frm1604e:txtSched' + y + 'Date' + x).value != ""){
                    if(validateMonthDayYearDate(d.getElementById('frm1604e:txtSched' + y + 'Date' + x).value)){
                        alert("Invalid date entry on Schedule " + y + ", Column 1 Row " + x + ". Format is mm/dd/yyyy.");
                        return true;
                    }
                }
                x++;
            }
            y++;
        }
        return false;
    }

	function initialValidateBeforeSave() {
			if( (d.getElementById('frm1604e:txtTIN1').value == "" || d.getElementById('frm1604e:txtTIN2').value == "" || d.getElementById('frm1604e:txtTIN3').value == "" || d.getElementById('frm1604e:txtBranchCode').value == "")  )
			{
				alert("Please enter a valid TIN number on Item 4.");
				return false;
			}	
			if ((d.getElementById('frm1604e:txtRDOCode').value == "000")) {
			    alert("Please enter a valid RDO Code on Item 5.");
			    return false;
			}
			if( (d.getElementById('frm1604e:txtAgentname').value == "")  )
			{
				alert("Please enter a valid Withholding Agent's Name on Item 7.");
				return false;
			}		
			return true;
	}	
	
	function yearChanged(yearVal) {
		if (yearVal!="") {
			if (confirm('You are about to change the Year Ended. Doing so will clear all fields, Do you wish to proceed?')) {
				var x = 1;
				while(x <= 12) {
					d.getElementById('frm1604e:txtSched1Date' + x).value = "";
					d.getElementById('frm1604e:txtSched1BankVal' + x).value = "";
					d.getElementById('frm1604e:txtSched1TaxWheld' + x).value = formatCurrency(0.00);
					d.getElementById('frm1604e:txtSched1Pen' + x).value = formatCurrency(0.00);
					
					d.getElementById('frm1604e:txtSched2Date' + x).value = "";
					d.getElementById('frm1604e:txtSched2BankVal' + x).value = "";
					d.getElementById('frm1604e:txtSched2TaxWheld' + x).value = formatCurrency(0.00);
					d.getElementById('frm1604e:txtSched2Pen' + x).value = formatCurrency(0.00);
					
					d.getElementById('frm1604e:txtSched1TotalAmt' + x).value = formatCurrency(0.00);
					d.getElementById('frm1604e:txtSched2TotalAmt' + x).value = formatCurrency(0.00);
					computeTotal(1);
					computeTotal(2);
					x++;
				}
			} else {
				d.getElementById('frm1604e:txtYear').value = yearVal;
			}
		}
	}

var disabledItems = new Array();
function printme() {

	$('#bg').hide(); //740
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
			if(elem[i].type == 'select-one'){
				$( elem[i] ).hide();
				var label = "<div class='labels'>".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</div>");
				$( elem[i] ).after(label);
			}
		}
    }	
	
	$('.printButtonClass').hide();
    $("#formPaper").show();
    
    window.print();

    $('.printButtonClass').show();
    $('#formPaper').css({'border':'#a7a7a7 1px solid' });


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
                save('1604E',data);
                
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
        saveAndExit('1604E',data);
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

        submitAndSave('1604E', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1604E';
    }
</script>
@endsection