@extends('layouts.app')
@section('title', '| BIR Form No. 0619E')
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
                    <button type="button" class="btn btn-danger btn-exit" id="0619E" company='{{$company->id}}'>No</button>
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
                    <button type="button" class="btn btn-success btn-exit" id="0619E" company='{{$company->id}}'>Okay</button>
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
                        <button type="button" class="btn btn-danger btn-filing-success" form='0619E' company='{{$company->id}}'>Okay</button>
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
                <div id="wrapper" style="margin: 0 auto; position: relative; width: 932px; ">
                    <table border="0" width="836" cellspacing="0" cellpadding="0" align="center" style="background-repeat: repeat-x;">
                    <tr><td>
                    <div id="formPaper">

                        <div id="MainContent" class="noCellSpace" style="display:block;">
                        <table width="" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <!-- top header -->
                                <td>
                                    <table width="836" border="0" cellspacing="0" cellpadding="0" style="height:55px;">
                                        <tr>
                                            <td width="300" valign="bottom"><img width="80" height="25px" src="{{ asset('images/bcs_new.png') }}"/></td>
                                            <td valign="middle" >
                                                <img src="{{ asset('images/header_logo.png') }}" width="210" height="50px"  alt="birlogo" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <!-- header -->
                                <td>
                                    <table width="836" border="2" cellspacing="0" cellpadding="0" style="height:90px;">
                                        <tr>
                                            <td width="150" valign="center" style="text-align:center !important">
                                                <label face="Arial" size="1px">BIR Form No.<br/></label>
                                                <font face="Arial" size="6px" style="font-weight:bold;">0619-E<br/></font>
                                                <label face="Arial" size="1px">January 2018</label><br/>
                                                <label face="Arial" size="1px"><b>Page 1</b></label>
                                            </td>
                                            <td width="580" align="center">
                                                <font size="5" style="font-weight:bold;">Monthly Remittance Form</font><br/>
                                                <font size="3"style="font-weight:bold;">for Creditable Income Taxes Withheld (Expanded)</font><br/>
                                                <label face="Arial" size="1px"><i>Enter all required information in CAPITAL LETTERS using BLACK ink. Mark all applicable boxes with an "X". Two copies MUST be filled with the BIR and one held by the Taxpayer.</i></label>
                                            </td>
                                            <td valign="top"><img width="220" height="75px" src="{{ asset('images/Bar Codes/0619E_p1.png') }}"/></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <!-- Item 1 to 6 -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <!-- Item 1 -->
                                            <td width="160" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">For the Month of <i>(MM/YYYY)</i></font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <select size="1" name="frm0619E:txtMonth" id="frm0619E:txtMonth" class="iceSelOneMnu fieldSelect1" style="width: 44px" onchange="computeDueDate()">
                                                                    @if($action == 'new')
                                                                        <option value="01" selected="selected">01 - January</option>
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
                                                                    @else
                                                                        <option value="01" {{ $data->item1A == '01' ? 'selected' : ''}} >01 - January</option>
                                                                        <option value="02" {{ $data->item1A == '02' ? 'selected' : ''}} >02 - February</option>
                                                                        <option value="03" {{ $data->item1A == '03' ? 'selected' : ''}} >03 - March</option>
                                                                        <option value="04" {{ $data->item1A == '04' ? 'selected' : ''}} >04 - April</option>
                                                                        <option value="05" {{ $data->item1A == '05' ? 'selected' : ''}} >05 - May</option>
                                                                        <option value="06" {{ $data->item1A == '06' ? 'selected' : ''}} >06 - June</option>
                                                                        <option value="07" {{ $data->item1A == '07' ? 'selected' : ''}} >07 - July</option>
                                                                        <option value="08" {{ $data->item1A == '08' ? 'selected' : ''}} >08 - August</option>
                                                                        <option value="09" {{ $data->item1A == '09' ? 'selected' : ''}} >09 - September</option>
                                                                        <option value="10" {{ $data->item1A == '10' ? 'selected' : ''}} >10 - October</option>
                                                                        <option value="11" {{ $data->item1A == '11' ? 'selected' : ''}} >11 - November</option>
                                                                        <option value="12" {{ $data->item1A == '12' ? 'selected' : ''}} >12 - December</option>
                                                                    @endif
                                                            </select>
                                                            <input type="text" value="{{$action == 'new' ? '' : $data->item1B}}" size="4" name="frm0619E:txtYear" maxlength="4" id="frm0619E:txtYear" onkeypress="return wholenumber(this, event)"onblur="computeDueDate()"/>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <!-- Item 2 -->
                                            <td width="160" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Due Date <i>(MM/DD/YYYY)</i></font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <input id="frm0619E:txtDueMonth" value="{{$action == 'new' ? '' : $data->item2A}}"  name="frm0619E:txtDueMonth" maxlength="2" size="2" type="text" onkeypress="return wholenumber(this, event)" disabled />&nbsp;
                                                            <input id="frm0619E:txtDueDay" value="{{$action == 'new' ? '10' : $data->item2B}}" name="frm0619E:txtDueDay" value="10" maxlength="2" size="2" type="text" onkeypress="return wholenumber(this, event)" />&nbsp;
                                                            <input id="frm0619E:txtDueYear" value="{{$action == 'new' ? '' : $data->item2C}}" name="frm0619E:txtDueYear" maxlength="4"  size="3" type="text" onkeypress="return wholenumber(this, event)" disabled />&nbsp;
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <!-- Item 3 -->
                                            <td width="130" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" class="iceSelOneRb-dis fieldText1-dis">
                                                                <div align="center" style="padding: 1px 0 1px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                            <tbody>
                                                                                <tr>
                                                                                    @if($action == 'new')
                                                                                        <td><input style="vertical-align: middle;" type="radio" value="Y" name="frm0619E:optAmend" id="frm0619E:optAmend:Y" onclick="d.getElementById('frm0619E:txtTax15').disabled = false;" /><label for="frm0619E:optAmendYes" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                        <td><input style="vertical-align: middle;" type="radio" value="N"  name="frm0619E:optAmend" id="frm0619E:optAmend:N" onclick="d.getElementById('frm0619E:txtTax15').disabled = true;d.getElementById('frm0619E:txtTax15').value = '0.00';computeNetAmtRem()" checked="true" /><label for="frm0619E:optAmendNo" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >No</label></td>
                                                                                    @else
                                                                                        <td><input style="vertical-align: middle;" {{ $data->item3 == 'Y' ? 'checked' : '' }} type="radio" value="Y" name="frm0619E:optAmend" id="frm0619E:optAmend:Y" onclick="d.getElementById('frm0619E:txtTax15').disabled = false;" /><label for="frm0619E:optAmendYes" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                        <td><input style="vertical-align: middle;" {{ $data->item3 == 'N' ? 'checked' : '' }} type="radio" value="N"  name="frm0619E:optAmend" id="frm0619E:optAmend:N" onclick="d.getElementById('frm0619E:txtTax15').disabled = true;d.getElementById('frm0619E:txtTax15').value = '0.00';computeNetAmtRem()" /><label for="frm0619E:optAmendNo" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >No</label></td>
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
                                            <!-- Item 4 -->
                                            <td width="130" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Any Taxes Withheld?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" class="iceSelOneRb fieldText1">
                                                                <div align="center" style="padding: 1px 0 1px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                        <tbody>
                                                                            <tr>
                                                                                 @if($action == 'new')
                                                                                    <td><input type="radio" style="vertical-align: middle;" value="Y" name="frm0619E:optWithheld" id="frm0619E:optWithheld:Y" onclick="d.getElementById('frm0619E:txtTax14').disabled = false;"/><label for="frm0619E:optWithheld:Y" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                    <td><input type="radio" style="vertical-align: middle;" value="N" name="frm0619E:optWithheld" id="frm0619E:optWithheld:N" onclick="d.getElementById('frm0619E:txtTax14').disabled = true; d.getElementById('frm0619E:txtTax14').value = '0.00'; computeNetAmtRem()" /><label for="frm0619E:optWithheld:N" style="font-size:11px;" >No</label></td>
                                                                                 @else
                                                                                    <td><input type="radio" style="vertical-align: middle;" {{ $data->item4 == 'Y' ? 'checked' : '' }} value="Y" name="frm0619E:optWithheld" id="frm0619E:optWithheld:Y" onclick="d.getElementById('frm0619E:txtTax14').disabled = false;"/><label for="frm0619E:optWithheld:Y" style="font-size:11px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                    <td><input type="radio" style="vertical-align: middle;" {{ $data->item4 == 'N' ? 'checked' : '' }} value="N" name="frm0619E:optWithheld" id="frm0619E:optWithheld:N" onclick="d.getElementById('frm0619E:txtTax14').disabled = true; d.getElementById('frm0619E:txtTax14').value = '0.00'; computeNetAmtRem()" /><label for="frm0619E:optWithheld:N" style="font-size:11px;" >No</label></td>
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
                                            <!-- Item 5 -->
                                            <td width="100" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;5&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">ATC</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" value="WME10" style="text-align: center; font-weight:bold" size="6" name="frm0619E:txtAtc" id="frm0619E:txtAtc" class="iceInpTxt-dis" readonly /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <!-- Item 6 -->
                                            <td width="110" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;6&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Tax Type Code</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" value="WE" style="text-align: center; font-weight:bold" size="4" name="frm0619E:txtTaxTypeCode" id="frm0619E:txtTaxTypeCode" class="iceInpTxt-dis" readonly /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <!-- Part I -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100%" align="center">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;" >Part I - Background Information</font></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <!-- Item 7 & 8 -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="600" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;</font></td>
                                                        <td width="550">
                                                            <font size="1" style="font-size: 11px;">Taxpayer Identification Number (TIN)&nbsp;&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                                <input type="text"  size="3" value="{{$company->tin1}}" name="frm0619E:txtTIN1" maxlength="3" id="frm0619E:txtTIN1" onkeypress="return wholenumber(this, event)" />&nbsp;
                                                                <input type="text"  size="3" value="{{$company->tin2}}" name="frm0619E:txtTIN2" maxlength="3" id="frm0619E:txtTIN2" onkeypress="return wholenumber(this, event)" />&nbsp;
                                                                <input type="text"  size="3" value="{{$company->tin3}}" name="frm0619E:txtTIN3" maxlength="3" id="frm0619E:txtTIN3" onkeypress="return wholenumber(this, event)" />&nbsp;
                                                                <input type="text"  size="6" value="{{$company->tin4}}" name="frm0619E:txtBranchCode" maxlength="5" id="frm0619E:txtBranchCode" onkeypress="return letternumber(event)" />
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="230" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="80"><font size="2" style="font-weight:bold">&nbsp;8&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                        <td width= "150" id="rdoSelect">
                                                            <select style='width:132px' class='iceSelOneMnu' id='frm0619E:txtRDOCode' name='frm0619E:txtRDOCode' size='1' disabled='true'>
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
                                <!-- Item 9 -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="100%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Withholding Agent's Name <i>(Last Name, First Name, Middle Name for Individual OR Registered Name for Non-Individual)</i></font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="20">&nbsp;</td>
                                                                    <td width="800"><input type="text" size="127" value="{{$company->registered_name != '' ? $company->registered_name : $company->lastname.','. $company->firstname.' '.$company->middlename }}" name="frm0619E:txtTaxpayerName" maxlength="50" id="frm0619E:txtTaxpayerName" onblur="return capital(this, event)" /></td>
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
                                <!-- Hidden Line of business -->
                                <td style="display:none"><input type="text" size="90" value="{{$company->line_business}}" name="frm0619E:txtLineBus" maxlength="150" id="frm0619E:txtLineBus" /></td>
                            </tr>
                            <tr>
                                <!-- Item 10 & 10A -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="92%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">&nbsp;Registered Address</font>&nbsp;<font size="1" style="font-size: 11px;"><i>(Indicate complete address. If branch, indicate the branch address. If registered address is different from the current address, go to the RDO to update registered address by using BIR Form No.1905)</i></font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="20">&nbsp;</td>
                                                                    <td><input type="text" size="127" value="{{$company->address}}" name="frm0619E:txtAddress" maxlength="150" id="frm0619E:txtAddress" class="iceInpTxt-dis disabled-dis" onblur="return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="92%" valign="top" class="tblFormTd">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="600" valign="top" class="tblFormTd">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="20">&nbsp;</td>
                                                                    <td><input type="text" size="94" name="frm0619E:txtAddress2" maxlength="150" id="frm0619E:txtAddress2" class="iceInpTxt-dis disabled-dis" onblur="return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="230" valign="top" class="tblFormTd">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <font size="2" style="font-weight:bold;">&nbsp;10A&nbsp;</font><font size="1" style="font-size: 11px;">ZIP Code</font>
                                                                    <input type="text" size="17" value="{{$company->zip_code}}" name="frm0619E:txtZipCode" maxlength="12" id="frm0619E:txtZipCode" onkeypress="return wholenumber(this, event)"/>&nbsp;&nbsp;
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
                                <!-- Item 11 & 12 -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="400" valign="top" class="tblFormTd">
                                                <table width="400" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font><font size="1" style="font-size: 11px;">Contact Number</font>&nbsp;
                                                        <input type="text" size="30" value="{{$company->tel_number}}" name="frm0619E:txtTelNum" maxlength="20" id="frm0619E:txtTelNum" class="iceInpTxt-dis disabled-dis" onkeypress="return wholenumber(this, event)" />
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="400" valign="top" class="tblFormTd">
                                                <table width="400" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font><font size="1" style="font-size: 11px;">Category of Withholding Agent</font>
                                                        @if($action == 'new')
                                                            <input type="radio" value="P" name="frm0619E:optCategory" id="frm0619E:optCategory:P" style="margin-left:2em;vertical-align: middle;" /><label for="Private" class="iceSelOneRb fieldText1" style="font-size:11px;" >Private</label>
                                                            <input type="radio" value="G" name="frm0619E:optCategory" id="frm0619E:optCategory:G" style="margin-left:2em;vertical-align: middle;" /><label for="Government" class="iceSelOneRb fieldText1" style="font-size:11px;" >Government</label>
                                                        @else
                                                            <input type="radio" value="P" {{$data->item12 == 'P' ? 'checked' : ''}} name="frm0619E:optCategory" id="frm0619E:optCategory:P" style="margin-left:2em;vertical-align: middle;" /><label for="Private" class="iceSelOneRb fieldText1" style="font-size:11px;" >Private</label>
                                                            <input type="radio" value="G" {{$data->item12 == 'G' ? 'checked' : ''}} name="frm0619E:optCategory" id="frm0619E:optCategory:G" style="margin-left:2em;vertical-align: middle;" /><label for="Government" class="iceSelOneRb fieldText1" style="font-size:11px;" >Government</label>
                                                        @endif
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <!-- Item 13 -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="830" valign="top" class="tblFormTd">
                                                <table width="800" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font><font size="1" style="font-size: 11px;">Email Address</font>
                                                        <input type="text" value="{{$company->email_address}}" style="margin-left:1em" size="113" name="txtEmail" maxlength="20" id="txtEmail" class="iceInpTxt-dis disabled-dis" />
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <!-- Part II -->
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="830">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table border="0" cellpadding="0" cellspacing="0" >
                                                    <tr>
                                                        <td width="100%" align="center"><font size="2" style="font-weight:bold;">Part II - Tax Remittance</font></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <!-- Item 14 to 18 -->
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="830" border="0" cellspacing="0" cellpadding="0">
                                                    <!-- Item 14 -->
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">&nbsp;Amount of Remittance</font></td>
                                                        <td><div class="spacePadder"></div> </td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="200"></td>
                                                                    <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold"> &nbsp;14</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                        <input type="text" value="{{$action == 'new' ? '0.00' : $data->item14}}" style="color: black; text-align: right;" size="25" name="frm0619E:txtTax14" maxlength="25" id="frm0619E:txtTax14" onblur="round(this,2); computeNetAmtRem()" />
                                                                        </font><font size="2" face="Arial">&nbsp; </font> 
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 15 -->
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;15&nbsp;</font></td>
                                                        <td><font size="2" face="Arial, Helvetica, sans-serif"><font size="1" style="font-size: 11px;">Less: Amount Remitted from Previously Filed Form, if this is an amended form</font></font></td>
                                                        <td><div class="spacePadder"></div> </td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="200"></td>
                                                                    <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;15</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                        <input type="text" value="{{$action == 'new' ? '0.00' : $data->item15}}" style="color: black; text-align: right;" size="25" name="frm0619E:txtTax15" maxlength="25" id="frm0619E:txtTax15" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeNetAmtRem()" />
                                                                        &nbsp;</font> <font size="2" face="Arial">&nbsp; </font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 16 -->
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;16&nbsp;</font></td>
                                                        <td><font size="2" face="Arial, Helvetica, sans-serif" ><font size="1" style="font-size: 11px;">Net Amount of Remittance <i>(Item 14 Less Item 15)</i></font></font></td>
                                                        <td><div class="spacePadder"></div> </td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="200"></td>
                                                                    <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;16</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                        <input type="text" value="{{$action == 'new' ? '0.00' : $data->item16}}" style="color: black; text-align: right;" size="25" name="frm0619E:txtTax16" maxlength="25" id="frm0619E:txtTax16" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" disabled/>
                                                                        &nbsp;</font> <font size="2" face="Arial">&nbsp; </font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 17 -->
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;17&nbsp;</font></td>
                                                        <td><font size="2" face="Arial, Helvetica, sans-serif" ><font size="1" style="font-size: 11px;">Add: Penalties</font></font></td>
                                                        
                                                       
                                                    </tr>
                                                    <!-- Item 17A -->
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2"><font size="2" style="font-weight:bold;margin-left:2em">&nbsp;17A&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;">Surcharge</font></td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="200"></td>
                                                                    <td width="36"><font size="2" face="Arial" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;17A</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item17A}}" style="color: black; text-align: right;" size="25" name="frm0619E:txtTax17A" maxlength="25" id="frm0619E:txtTax17A" onblur="round(this,2);computePenalties()" />
                                                                            <input type="hidden" name="frm0619E:inputSurcharge" id="frm0619E:inputSurcharge" />
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 17B -->
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2"><font size="2" style="font-weight:bold; margin-left:2em">&nbsp;17B&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;">Interest</font></td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="200"></td>
                                                                    <td width="36"><font size="2" face="Arial" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;17B</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item17B}}" style="color: black; text-align: right;" size="25" name="frm0619E:txtTax17B" maxlength="25" id="frm0619E:txtTax17B" onblur="round(this,2);computePenalties()" />
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 17C -->
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2"><font size="2" style="font-weight:bold; margin-left:2em">&nbsp;17C&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;">Compromise</font></td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="200"></td>
                                                                    <td width="36"><font size="2" face="Arial" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;17C</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item17C}}" style="color: black; text-align: right;" size="25" name="frm0619E:txtTax17C" maxlength="25" id="frm0619E:txtTax17C" onblur="round(this,2);computePenalties()" />
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 17D -->
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2"><font size="2" style="font-weight:bold; margin-left:2em">&nbsp;17D&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;">Total Penalties <i>(Sum of Items 17A to 17C)</i></font></td>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="200"></td>
                                                                    <td width="36"><font size="2" face="Arial" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;17D</font>&nbsp;</font></td>
                                                                    <td><font size="1">
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item17D}}" style="background-color: rgb(220, 220, 220); text-align: right;" size="25" name="frm0619E:txtTax17D" maxlength="25" id="frm0619E:txtTax17D" disabled="true" />
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <!-- Item 18 -->
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;</font></td>
                                                        <td colspan="2"><font size="1">&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;">Total Amount of Remittance <i>(Sum of Items 16 and 17D)</i></font></td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td width="200"></td>
                                                                        <td width="36"><font size="2" style="font-weight:bold"><font size="2" style="font-weight:bold;">&nbsp;<font size="2" style="font-weight:bold;">18</font></font>&nbsp;</font></td>
                                                                        <td><font size="1">
                                                                                <input type="text" value="{{$action == 'new' ? '0.00' : $data->item18}}" style="background-color: rgb(220, 220, 220); text-align: right;" size="25" name="frm0619E:txtTax18" maxlength="25" id="frm0619E:txtTax18" disabled="true" class="iceInpTxt-dis" />
                                                                                &nbsp;</font> <font size="2" face="Arial">&nbsp; </font> </td>
                                                                    </tr>
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
                            <!-- bottom part -->
                            <tr>
                                <tr>
                                    <td>
                                        <table width="800" border="1" cellspacing="0" cellpadding="0" style="font-family:arial; font-size:10px; text-align: center; vertical-align: top; table-layout: fixed;">
                                            <tr>
                                                <td colspan="4" style="text-align: left; ">&nbsp;&nbsp;&nbsp;&nbsp;I/We declare under the penalties of perjury that this remittance form has been made in good faith, verified by me/us, and to the best of my/our knowledge and belief, is
                                                true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof. Further, I/we give my/our consent to the processing of my/our information as contemplated under the *Data Privacy Act of 2012 (R.A. No. 10173) for legitimate and lawful purposes. <i>(If Authorized Representative, attach authorization letter)</i><br></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: left; ">For Individual:
                                                    <br><br><br><br>
                                                </td>
                                                <td colspan="2" style="text-align: left; ">For Non-Individual:
                                                    <br><br><br><br></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Signature over Printed Name of Taxpayer/Authorized Representative/Tax Agent<br>
                                                    <i>(Indicate Title/Designation and TIN)</i></td>
                                                <td colspan="2">Signature over Printed Name of President/Vice President/ <br>
                                                    Authorized Officer or Representative/Tax Agent <br> <i>(Indicate Title/Designation and TIN)</i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td>
                                                                Tax Agent Accreditation No./ <br>
                                                                Attorney's Roll No. <i>(If applicable)</i>
                                                            </td>
                                                            <td>
                                                                <input type="text" value="" id="txtTaxAgentNo" name="txtTaxAgentNo" size="25" maxlength="20" disabled/>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td>
                                                                Date of Issue <br>
                                                                <i>(MM/DD/YYYY)</i>
                                                            </td>
                                                            <td>
                                                               <input type="text" size="15" value="" id="txtDateIssue" name="txtDateIssue" maxlength="10" disabled/>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td>
                                                                Date of Expiry <br>
                                                                <i>(MM/DD/YYYY)</i>
                                                            </td>
                                                            <td>
                                                                <input type="text" size="15" value="" id="txtDateExpiry" name="txtDateExpiry" maxlength="10" disabled/>
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
                                        <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                                            <tr>
                                                <td class="tblFormTdPart">
                                                    <table width="799" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="100%">
                                                                <div align="center"><font size="2" style="font-weight:bold;">Part III - Details of Payment</font></div>
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
                                                <td valign="top" class="tblFormTd">
                                                    <table border="1" cellpadding="0" cellspacing="0" width="100%" class="tblForm">
                                                        <tr>
                                                            <td width="20%"><div align="center"><font size="1" style="font-weight:bold;">Particulars </font></div></td>
                                                            <td width="15%"><div align="center"><font size="1" style="font-weight:bold;">Drawee Bank/Agency </font></div></td>
                                                            <td width="20%"><div align="center"><font size="1" style="font-weight:bold;">Number </font></div></td>
                                                            <td width="20%"><div align="center"><font size="1" style="font-weight:bold;">Date (MM/DD/YYYY) </font></div></td>
                                                            <td width="25%"><div align="center"><font size="1" style="font-weight:bold;">Amount </font></div></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;&nbsp;&nbsp;</font><font size="1">Cash/Bank Debit Memo </font></td>
                                                            <td><input type="text" value="" size="23" id="txtAgency19" name="txtAgency19" maxlength="50" disabled/></td>
                                                            <td><input type="text" value="" size="23" id="txtNumber19" name="txtNumber19" maxlength="50" disabled/></td>
                                                            <td><input type="text" value="" size="23" id="txtDate19" name="txtDate19" maxlength="10" disabled/></td>
                                                            <td><input type="text" value="" style="text-align: right" size="20" id="txtAmount19" name="txtAmount19" maxlength="50" disabled/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;&nbsp;&nbsp;</font><font size="1">Check </font></td>
                                                            <td><input type="text" value="" size="23" id="txtAgency20" name="txtAgency20" maxlength="50" disabled/></td>
                                                            <td><input type="text" value="" size="23" id="txtNumber20" name="txtNumber20" maxlength="50" disabled/></td>
                                                            <td><input type="text" value="" size="23" id="txtDate20" name="txtDate20" maxlength="10" disabled/></td>
                                                            <td><input type="text" value="" style="text-align: right" size="20" id="txtAmount20" name="txtAmount20" maxlength="50" disabled/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;&nbsp;&nbsp;</font><font size="1">Tax Debit Memo </font></td>
                                                            <td><input type="text" value="" size="23" id="txtAgency21" name="txtAgency21" maxlength="50" disabled/></td>
                                                            <td><input type="text" value="" size="23" id="txtNumber21" name="txtNumber21" maxlength="50" disabled/></td>
                                                            <td><input type="text" value="" size="23" id="txtDate21" name="txtDate21" maxlength="10" disabled/></td>
                                                            <td><input type="text" value="" style="text-align: right" size="20" id="txtAmount21" name="txtAmount21" maxlength="50" disabled/></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5"><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;&nbsp;&nbsp;</font><font size="1">Others <i>(specify below)</i> </font></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" value="" size="20" id="txtParticular22" name="txtParticular22" maxlength="50" disabled/></td>
                                                            <td><input type="text" value="" size="23" id="txtAgency22" name="txtAgency22" maxlength="50" disabled/></td>
                                                            <td><input type="text" value="" size="23" id="txtNumber22" name="txtNumber22" maxlength="50" disabled/></td>
                                                            <td><input type="text" value="" size="23" id="txtDate22" name="txtDate22" maxlength="10" disabled/></td>
                                                            <td><input type="text" value="" style="text-align: right" size="20" id="txtAmount22" name="txtAmount22" maxlength="50" disabled/></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="1" style="font-size:10px; text-align: left; ">
                                            <tr>
                                                <td width="60%">Machine Validation/Revenue Official Receipt Details<br/><i> (If not filed with an Authorized Agent Bank)</i> <br /><br /><br /><br /><br /></td>
                                                <td width="40%" align="center"><i>Stamp of Receiving Office/AAB and Date of Receipt <br/>(RO's Signature/Bank Teller's Initial)</i><br /><br /><br /><br /><br /></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: left; font-family:arial; font-size:10px;">NOTE: *Please read the BIR Data Privacy Policy found in the BIR website (www.bir.gov.ph)<br></td> 
                            </tr>
                            <!-- all buttons -->
                            <tr>
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table width="820" cellspacing="0" cellpadding="0" border="0">
                                                                <tbody>
                                                                    <tr valign="middle">
                                                                        <td width="55"></td>
                                                                        <td width="697" style="width: 100%;">
                                                                            <div class="icePnlGrp"  style="border-bottom: #AAAAAA 1px solid;">
                                                                                <div align="center">
                                                                                    @if($action != 'view')
                                                                                    <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm0619E:cmdValidate" id="frm0619E:cmdValidate" onclick="validateForm()" />
                                                                                    <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm0619E:cmdEdit" id="frm0619E:cmdEdit" onclick="enableAllControl()"/>
                                                                                    <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                    <input class="printButtonClass" type="button" value="{{$action == 'new' ? 'Save' : 'Update'}}" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printOCR();" />
                                                                                    <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm0619E:btnFinalCopy" id="frm0619E:btnFinalCopy" onclick="submitForm();" />
                                                                                    @else
                                                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printOCR();" />
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

                        </table>
                        <div style='display:none;'>  </div>
                        </div>

                        <!-- ADDED  Print layout -->
                        <div id="PrintMainContent" style="display:none;width:850px; height:1000px;font-family: Arial; margin:0; overflow: hidden;"> 
                            <img src="{{asset('images/Print/0619-E-Pg1.png')}}" style="position: absolute; background-color: white; top: -17px; left: -25px; width: 990px; height: 1300px; margin: 0; padding: 0;" />
                            <div style="position: absolute; top: -9px !important; left: -16px !important;  ">
                                <div style=" float:left; position:absolute; left:75px; top:212px; letter-spacing:8px; "><span id="txtMonth" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:127px; top:212px; letter-spacing:8px;"><span id="txtYear" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:236px; top:212px; letter-spacing:8px;"><span id="txtDueMonth" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:283px; top:212px; letter-spacing:8px;"><span id="txtDueDay" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:336px; top:212px; letter-spacing:8px;"><span id="txtDueYear" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:443px; top:212px; "><span id="optAmend:Y" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:514px; top:212px; "><span id="optAmend:N" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:607px; top:212px; "><span id="optWithheld:Y" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:677px; top:212px; "><span id="optWithheld:N" class='smallBold'></span></div>

                                <div style=" float:left; position:absolute; left:356px; top:269px; letter-spacing:8px;"><span id="txtTIN1" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:456px; top:269px; letter-spacing:8px;"><span id="txtTIN2" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:549px; top:269px; letter-spacing:8px;"><span id="txtTIN3" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:668px; top:269px; letter-spacing:8px;"><span id="txtBranchCode" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:876px; top:269px; letter-spacing:5px;"><span id="txtRDOCode" class='smallBold'></span></div>

                                <div style=" float:left; position:absolute; left:30px; top:314px; width:770px;"><span id="txtTaxpayerName" class='smallBold' style="letter-spacing:2pt;"></span></div>
                                <div style=" float:left; position:absolute; left:30px; top:363px; width:770px;"><span id="txtAddress" class='smallBold' style="letter-spacing:2pt;"></span></div>
                                <div style=" float:left; position:absolute; left:30px; top:330px; width:600px;"><span id="txtAddress2" class='smallBold' style="letter-spacing:2pt;"></span></div>
                                <div style=" float:left; position:absolute; left:883px; top:391px; width:45px;"><span id="txtZipCode" class='smallBold' style="letter-spacing:5px;"></span></div>

                                <div style=" float:left; position:absolute; left:166px; top:422px; "><span id="txtTelNum" class='smallBold'  style="letter-spacing:2pt;"></span></div>
                                <div style=" float:left; position:absolute; left:718px; top:455px; "><span id="optCategory:P" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:833px; top:455px; "><span id="optCategory:G" class='smallBold'></span></div>
                                <div style=" float:left; position:absolute; left:30px; top:470px; "><span id="txtEmail2" class='smallBold' style="letter-spacing:2pt;"></span></div>

                                <div style=" float:left; position:absolute; left:698px; top:528px; width: 175px;text-align: right;"><span id="txtTax14" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:698px; top:557px; width: 175px;text-align: right;"><span id="txtTax15" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:698px; top:588px; width: 175px;text-align: right;"><span id="txtTax16" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:698px; top:636px; width: 175px;text-align: right;"><span id="txtTax17A" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:698px; top:666px; width: 175px;text-align: right;"><span id="txtTax17B" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:698px; top:697px; width: 175px;text-align: right;"><span id="txtTax17C" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:698px; top:728px; width: 175px;text-align: right;"><span id="txtTax17D" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:698px; top:758px; width: 175px;text-align: right;"><span id="txtTax18" class='smallBold' style="letter-spacing:1pt;"></span></div>

                                <!-- DECIMAL PLACES -->
                                <div style=" float:left; position:absolute; left:921px; top:528px; width: 30px;"><span id="txtTax14_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:921px; top:557px; width: 30px;"><span id="txtTax15_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:921px; top:588px; width: 30px;"><span id="txtTax16_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:921px; top:636px; width: 30px;"><span id="txtTax17A_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:921px; top:666px; width: 30px;"><span id="txtTax17B_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:921px; top:697px; width: 30px;"><span id="txtTax17C_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:921px; top:728px; width: 30px;"><span id="txtTax17D_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                                <div style=" float:left; position:absolute; left:921px; top:758px; width: 30px;"><span id="txtTax18_2" class='smallBold' style="letter-spacing:1pt;"></span></div>
                            </div>
                        </div>
                    </div>
                    </td></tr>
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
        </form>
@endsection

@section('scripts')
<script type="text/javascript">
    var isSubmitFinal = false;
    var isSubmit = false;

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
    var p3TPEmail = "";
    var p3TPAddress = "";
    var p3TPZip = "";

    var fileName = "";
    var existingXMLFileName = "";

    var str;
   
    var d=document,data='',XMLBGFile='',XMLFile='', XMLATCFile='',msg = d.getElementById('msg');
    var loader=d.getElementById('loader');
    
    str = setInterval("sleeptime()", 300);
    var globalEmail = "";

  function sleeptime(){
        clearInterval(str);
        init();

        document.getElementById('frm0619E:txtTIN1').disabled = true; 
        document.getElementById('frm0619E:txtTIN2').disabled = true; 
        document.getElementById('frm0619E:txtTIN3').disabled = true; 
        document.getElementById('frm0619E:txtBranchCode').disabled = true;

        if(d.getElementById('frm0619E:optAmend:Y').checked == true){
            d.getElementById('frm0619E:txtTax15').disabled = false;
        } else {
            d.getElementById('frm0619E:txtTax15').disabled = true;
        }
    }

    function init(){
        var month = new Date();
        var year = new Date();
        @if($action == 'new')
            d.getElementById('frm0619E:txtYear').value = year.getFullYear();
            d.getElementById('frm0619E:txtMonth').selectedIndex = month.getMonth() - 1; 
            computeDueDate();

            d.getElementById('frm0619E:cmdEdit').disabled = true;
            d.getElementById('frm0619E:btnFinalCopy').disabled = true;
            d.getElementById('btnPrint').disabled = true;
        @endif

        @if($action == 'view')
            disableAllControl();
        @endif
       
        d.getElementById('frm0619E:optAmend:Y').disabled = false;
        d.getElementById('frm0619E:optAmend:N').disabled = false;
        d.getElementById('frm0619E:txtTIN1').disabled = true;
        d.getElementById('frm0619E:txtTIN2').disabled = true;
        d.getElementById('frm0619E:txtTIN3').disabled = true;
        d.getElementById('frm0619E:txtBranchCode').disabled = true;
        d.getElementById('frm0619E:txtTaxpayerName').disabled = true;
        d.getElementById('frm0619E:txtAddress').disabled = true;
        d.getElementById('frm0619E:txtAddress2').disabled = true;
        d.getElementById('frm0619E:txtTelNum').disabled = true;
        d.getElementById('frm0619E:txtZipCode').disabled = true;
        d.getElementById('txtEmail').disabled = true;

    }

    function isItAnAmendedReturn(xmlFile) {
        if(d.getElementById('frm0619E:optAmend:Y').checked) {
            return true;
        } else {
            return false;
        }
    }

    function checkiftaxwheldisYes(){
        if(d.getElementById('frm0619E:optWithheld:Y').checked == false && d.getElementById('frm0619E:optWithheld:N').checked == false)
        {
            return "Please select an option for Item 4.";
        }
        else if( d.getElementById('frm0619E:optCategory:P').checked == false && d.getElementById('frm0619E:optcategory:G').checked == false)
        {
            return "Please select an option for Item 12.";
        }
    }


    function setInputTextControl_HorizontalAlignment(id,align) {
        if (d.getElementById(id) != null) {
       
        d.getElementById(id).style.textAlign = "right";
        }
    }
    function setInputTextControl_NumberFormatter(id,limit,deci) {
        d.getElementById(id).size = parseInt(limit);
        d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed( parseInt(deci) );
    }

    function computeNetAmtRem(){
        d.getElementById('frm0619E:txtTax16').value = formatCurrency(NumWithComma(d.getElementById('frm0619E:txtTax14').value) - NumWithComma(d.getElementById('frm0619E:txtTax15').value));
        computeTotalAmtRem();
    }

    function computePenalties() {
        var tax17D = NumWithComma(d.getElementById("frm0619E:txtTax17A").value) + NumWithComma(d.getElementById("frm0619E:txtTax17B").value) + NumWithComma(d.getElementById("frm0619E:txtTax17C").value);
        d.getElementById("frm0619E:txtTax17D").value = formatCurrency(tax17D);
        computeTotalAmtRem();
    }

    function computeTotalAmtRem(){
        d.getElementById('frm0619E:txtTax18').value = formatCurrency(NumWithComma(d.getElementById('frm0619E:txtTax16').value) + NumWithComma(d.getElementById("frm0619E:txtTax17D").value));
        
    }
    
    function computeDueDate() {
        var month = d.getElementById('frm0619E:txtMonth').value;
        var year = d.getElementById('frm0619E:txtYear').value;

        if (month < 9) {
            month = month.substring(1,2);   //remove 0 at the beginning to not mistake as octal
            d.getElementById('frm0619E:txtDueMonth').value = "0" +  (parseInt(month) + 1);
            d.getElementById('frm0619E:txtDueYear').value = year;
        } else if (month == 9) {
            month = month.substring(1,2);   //remove 0 at the beginning to not mistake as octal
            d.getElementById('frm0619E:txtDueMonth').value = parseInt(month) + 1;
            d.getElementById('frm0619E:txtDueYear').value = year;
        } else if (month > 9 && month < 12) {
            d.getElementById('frm0619E:txtDueMonth').value = parseInt(month) + 1;
            d.getElementById('frm0619E:txtDueYear').value = year;
        } else if (month == 12) {
            d.getElementById('frm0619E:txtDueMonth').value = "01";
            d.getElementById('frm0619E:txtDueYear').value = parseInt(year) + 1;
        }
    }
   
    var dt = new Date();
    function validateForm(){
        if((d.getElementById('frm0619E:txtMonth').value == "")){
            alert("Please enter a valid month on Item 1.");
            return false;
        }else if(d.getElementById('frm0619E:txtMonth').value == dt.getMonth()+1){
            alert("Invalid month on Item 1. Month should not be a current Date");
            d.getElementById('frm0619E:txtMonth').selectedIndex = dt.getMonth() - 1; 
            computeDueDate();
            return false;
        }else if(d.getElementById('frm0619E:txtMonth').value > dt.getMonth()+1 && d.getElementById('frm0619E:txtYear').value == dt.getFullYear()){
            alert("Invalid month on Item 1. Month should not be a future Date");
            d.getElementById('frm0619E:txtMonth').selectedIndex = dt.getMonth() - 1; 
            computeDueDate();
            return false;
        }

        //validate Year
        if( (d.getElementById('frm0619E:txtYear').value == "")){
            alert("Please enter a valid year on Item 1.");
            d.getElementById('frm0619E:txtYear').focus();
            return false;
        }else if( d.getElementById('frm0619E:txtYear').value > dt.getFullYear()){
            alert("Invalid year on Item 1. Year should not be a future Date.");
            d.getElementById('frm0619E:txtYear').value = dt.getFullYear();
            d.getElementById('frm0619E:txtYear').focus();
            computeDueDate();
            return false;
        }else if( d.getElementById('frm0619E:txtYear').value < 2018){
            alert("Invalid entry on Item 1. Entry should not be a previous year from 2018.")
            d.getElementById('frm0619E:txtYear').value = "";
            d.getElementById('frm0619E:txtYear').focus();
            computeDueDate();
            return false;
        }

        //validate due date
        var month = d.getElementById('frm0619E:txtDueMonth').value;
        var day = d.getElementById('frm0619E:txtDueDay').value;
        var year = d.getElementById('frm0619E:txtDueYear').value;
        var isLeap = new Date(year, 1, 29).getMonth() === 1;
        var month31 = (['01', '1', '03', '3', '05', '5', '07', '7', '08', '8', '10', '12']);
        var month30 = (['04', '4', '06', '6', '09', '9', '11']);

        if(month == "" || day == "" || year == ""){
            alert("Please enter a valid Date on Item 2");
            return false;
        }else if(month > 12 || month < 1){
            alert("Please enter a valid Month on Item 2");
            return false;
        }else if(day > 31 || day < 1){
            alert("Please enter a valid Day on Item 2");
            return false;
        }else if(year > dt.getFullYear()){
            alert("Year should not be a future Date. Please enter a valid Year on Item 2");
            return false;
        }else if(year < 2018 ){
            alert("Previous year from 2018 is not applicable for this Form. Please enter a valid Year on Item 2");
            return false;
        }else if ((month == 2 || month == 02) && (!isLeap && day == 29)) {
            alert("Please enter a valid Day on Item 2");
            return false;
        }else if ((month == 2 || month == 02) && (!isLeap && day > 29)) {
            alert("Please enter a valid Day on Item 2");
            return false;
        }else if ((month == 2 || month == 02) && (isLeap && day > 29)) {
            alert("Please enter a valid Day on Item 2");
            return false;
        }else if (month31.includes(month) && day > 31) {
            alert("Please enter a valid Day on Item 2");
            return false;
        }else if (month30.includes(month) && day > 30) {
            alert("Please enter a valid Day on Item 2");
            return false;
        }

        //this will pad 0 to single digit month and day
        if (month.length == 1) {
            d.getElementById('frm0619E:txtDueMonth').value = "0" + month;
        }
        if (day.length == 1) {
            d.getElementById('frm0619E:txtDueDay').value = "0" + day;
        }
     
        if(d.getElementById('frm0619E:optWithheld:Y').checked == false && d.getElementById('frm0619E:optWithheld:N').checked == false){
            alert("Please select an option for Item 4.")
            return false;
        }
        if(d.getElementById('frm0619E:optCategory:P').checked == false && d.getElementById('frm0619E:optCategory:G').checked == false){
            alert("Please select an option for Item 12.");
            return false;
        }
        
        if((d.getElementById('frm0619E:txtTIN1').value == "" || d.getElementById('frm0619E:txtTIN2').value == "" || d.getElementById('frm0619E:txtTIN3').value == "" || d.getElementById('frm0619E:txtBranchCode').value == "")){
            alert("Please enter a valid TIN number on Item 7.");
            return false;
        }
       
        if((d.getElementById('frm0619E:txtTaxpayerName').value == "")){
            alert("Please enter a valid Taxpayer Name on Item 9.");
            return false;
        }
        if((d.getElementById('frm0619E:txtTelNum').value == "")){
            alert("Please enter a valid Contact Number on Item 11.");
            return false;
        }
        if((d.getElementById('frm0619E:txtAddress').value == "")){
            alert("Please enter Taxpayer's Registered Address on Item 10.");
            return false;
        }
        if((d.getElementById('frm0619E:txtZipCode').value == "")){
            alert("Please enter Taxpayer's Zip Code on Item 10A.");
            return false;
        }
        if((d.getElementById('txtEmail').value == "")){
            alert("Please enter valid Email Address on Item 13.");
            return false;
        }
        if (d.getElementById('frm0619E:optWithheld:Y').checked == true) {
            if (d.getElementById('frm0619E:txtTax14').value == 0) {
                alert("Please fill up Part II - Tax Remittance if item 4 is set to Yes.");
                return false;
            }
        }

        d.getElementById('frm0619E:cmdValidate').disabled = true;
        d.getElementById('frm0619E:cmdEdit').disabled = false;
        d.getElementById('btnUpload').disabled = false;

        disableAllControl();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
        return;
    }

    var disableElem = true;
    var enableElem = false;

    function disableAllControl()
    {
        //buttons
        @if($action != 'view')
            d.getElementById('frm0619E:btnFinalCopy').disabled = false;
        @endif
        //Part I Header
        d.getElementById('frm0619E:txtMonth').disabled = true;
        d.getElementById('frm0619E:txtYear').disabled = true;
        d.getElementById('frm0619E:txtDueMonth').disabled = true;
        d.getElementById('frm0619E:txtDueDay').disabled = true;
        d.getElementById('frm0619E:txtDueYear').disabled = true;
        d.getElementById('frm0619E:optAmend:Y').disabled = true;
        d.getElementById('frm0619E:optAmend:N').disabled = true;
        d.getElementById('frm0619E:optWithheld:Y').disabled = true;
        d.getElementById('frm0619E:optWithheld:N').disabled = true;
        d.getElementById('frm0619E:txtAtc').disabled = true;
        d.getElementById('frm0619E:txtTaxTypeCode').disabled = true;

        //Part I BG Info
        d.getElementById('frm0619E:txtTIN1').disabled = true;
        d.getElementById('frm0619E:txtTIN2').disabled = true;
        d.getElementById('frm0619E:txtTIN3').disabled = true;
        d.getElementById('frm0619E:txtBranchCode').disabled = true;
        d.getElementById('frm0619E:txtRDOCode').disabled = true;
        d.getElementById('frm0619E:txtTaxpayerName').disabled = true;
        d.getElementById('frm0619E:txtAddress').disabled = true;
        d.getElementById('frm0619E:txtAddress2').disabled = true;
        d.getElementById('frm0619E:txtZipCode').disabled = true;
        d.getElementById('frm0619E:txtTelNum').disabled = true;
        d.getElementById('txtEmail').disabled = true;
        d.getElementById('frm0619E:optCategory:P').disabled = true;
        d.getElementById('frm0619E:optCategory:G').disabled = true;

        //Part II tax remittance
        d.getElementById('frm0619E:txtTax14').disabled = true;
        d.getElementById('frm0619E:txtTax15').disabled = true;
        d.getElementById('frm0619E:txtTax17A').disabled = true;
        d.getElementById('frm0619E:txtTax17B').disabled = true;
        d.getElementById('frm0619E:txtTax17C').disabled = true;

        d.getElementById('btnPrint').disabled = false;
        disableElem;
        enableElem;
    } // end disabled all


    function enableAllControl(){
        d.getElementById('frm0619E:txtMonth').disabled = false;
        d.getElementById('frm0619E:txtYear').disabled = false;
        d.getElementById('frm0619E:txtDueMonth').disabled = false;
        d.getElementById('frm0619E:txtDueDay').disabled = false;
        d.getElementById('frm0619E:txtDueYear').disabled = false;
        d.getElementById('frm0619E:optAmend:Y').disabled = false;
        d.getElementById('frm0619E:optAmend:N').disabled = false;
        d.getElementById('frm0619E:optWithheld:Y').disabled = false;
        d.getElementById('frm0619E:optWithheld:N').disabled = false;

        d.getElementById('frm0619E:optCategory:P').disabled = false;
        d.getElementById('frm0619E:optCategory:G').disabled = false;
        d.getElementById('frm0619E:txtAtc').disabled = false;
        d.getElementById('frm0619E:txtTaxTypeCode').disabled = false;

        d.getElementById('frm0619E:txtTax14').disabled = false;
        d.getElementById('frm0619E:txtTax15').disabled = false;
        d.getElementById('frm0619E:txtTax17A').disabled = false;
        d.getElementById('frm0619E:txtTax17B').disabled = false;
        d.getElementById('frm0619E:txtTax17C').disabled = false;
              
        if(d.getElementById('frm0619E:optWithheld:Y').checked == true){
            d.getElementById('frm0619E:txtTax14').disabled = false;
        }else{
            d.getElementById('frm0619E:txtTax14').disabled = true;
        }

        if(d.getElementById('frm0619E:optAmend:Y').checked == true){
            d.getElementById('frm0619E:txtTax15').disabled = false;
        } else {
            d.getElementById('frm0619E:txtTax15').disabled = true;
        }
        d.getElementById('frm0619E:cmdValidate').disabled = false;
        d.getElementById('frm0619E:cmdEdit').disabled = true;
        d.getElementById('frm0619E:btnFinalCopy').disabled = true;
        d.getElementById('btnPrint').disabled = true;

        disableElem;
        enableElem;
        document.getElementById('frm0619E:txtTIN1').disabled = true; document.getElementById('frm0619E:txtTIN2').disabled = true; document.getElementById('frm0619E:txtTIN3').disabled = true; document.getElementById('frm0619E:txtBranchCode').disabled = true;
    }

    function initialValidateBeforeSave() {
            if( (d.getElementById('frm0619E:txtTIN1').value == "" || d.getElementById('frm0619E:txtTIN2').value == "" || d.getElementById('frm0619E:txtTIN3').value == "" || d.getElementById('frm0619E:txtBranchCode').value == "")  )
            {
                alert("Please enter a valid TIN number on Item 7.");
                return false;
            }
            if ((d.getElementById('frm0619E:txtRDOCode').value == "000")) {
                alert("Please enter a valid RDO Code on Item 8.");
                return false;
            }
            if( (d.getElementById('frm0619E:txtTaxpayerName').value == "")  )
            {
                alert("Please enter a valid Withholding Agent's Name on Item 9.");
                return false;
            }
            return true;
    }
 
    var disabledItems = new Array();

    function printOCR() {

        alert("This form must be printed on A4 Size Paper. Please update your Printer Settings (Set Paper Size to A4 under Preferences -> Advanced) to ensure the correct printout of the form.\n\n" +
            "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to A4, all Margins must be 0.166, Enable Shrink-to-Fit must be unchecked, and all Headers & Footers must be set to empty.");

        $("#formPaper").show();
           
        var currentPrintContent = "PrintMainContent";

        var printElems = d.getElementById("PrintMainContent").getElementsByTagName("span");
        var indexCtr, printElemsLen = printElems.length;
        for (indexCtr = 0; indexCtr < printElemsLen; indexCtr++) {
            printElems[indexCtr].innerHTML = "";
        }

        $('#bg').hide();
        $('body').css({'margin-top': '-30px'});

        $("#MainContent").hide();

        var elems = d.getElementById("MainContent").getElementsByTagName("*");

        var i, len = elems.length, tempElem = {}, tempVal = {}, a=0;
        for (i = 0; i < len; i++) {
           if (elems[i] !== null && elems[i].type !== "undefined" && elems[i].type !== "hidden" && elems[i].type != 'button' && elems[i].id !== "") {
                var elementID = elems[i].id;
                if(elementID === 'txtEmail'){
                    d.getElementById('txtEmail2').innerHTML = elems[i].value;
                    if(a<29){a++;}                
                }else{
                    elementID = (elementID.indexOf("frm0619E:") != -1) ? elementID.split("frm0619E:")[1] : elementID.split("frm0619E")[1];
                    if (elementID == printElems[a].id){
                        if (elems[i].type === "radio" || elems[i].type === "checkbox") {
                            if (d.getElementById(elementID) != null) {
                                d.getElementById(elementID).innerHTML = (elems[i].checked) ? "X" : "";
                            }
                        }
                        else if (elems[i].type === "select-one") {
                            var drpValue = $("#frm0619E\\:" + elementID + " option:selected").text();

                            if (d.getElementById(elementID) != null) {
                                d.getElementById(elementID).innerHTML = (elementID === "txtMonth") ? drpValue.split(" - ")[0] : drpValue;
                            }
                        }
                        else if (elementID == 'txtAddress') {
                            var address = d.getElementById('frm0619E:txtAddress').value + d.getElementById('frm0619E:txtAddress2').value;

                            if (address.length > 70) {
                                d.getElementById('txtAddress').innerHTML = address.substring(0, 70);
                                d.getElementById('txtAddress2').innerHTML = address.substring(70, (address.length <= 132) ? address.length : 132);
                            } else {
                                d.getElementById('txtAddress').innerHTML = address;
                            }
                        }
                        else if(elementID == 'txtAddress2'){
                            // alert("No need to display the value");
                        }
                        else if(elementID == 'txtTaxpayerName'){
                            d.getElementById(elementID).innerHTML = elems[i].value;
                        }
                        else if (elems[i].id.indexOf("txtTax") > -1) {
                            tempVal = elems[i].value.split(".");
                            if (tempVal.length > 0) {
                                $("#" + elementID).html(tempVal[0]);
                                $("#" + elementID + "_2").html(tempVal[1]);
                            }
                        }
                        else if (elems[i].type === "text") {
                            d.getElementById(elementID).innerHTML = elems[i].value;
                        }
                        
                        
                        if(a<29){a++;} 
                    }
                }
            }
        }

        $("#PrintMainContent").show();
        window.print();

        $('body').css({'margin-top': '0px' });

        $("#PrintMainContent").hide();
        $("#formPaper").show();
        $("#MainContent").show();
        $('.defaultBtns').show();

        $('#printMenu').show('blind');
        if ($('#formMenu').css('display') != 'none') {
            $('#formMenu').hide('blind');
        }
    }

    function cancelPrintOCR() {
        $("#PrintMainContent").hide();
        $("#MainContent").show();

        $('#bg').show();
        $('body').css({ 'background': '#FFF', 'zoom': '1' });

        $('input').each(function () {
            if (this.type == 'button') {
                if (this.id != 'test') {
                    $(this).removeClass('previewButtonClass');
                }
            }
        });

        $('#formMenu').show('blind');
            if ($('#printMenu').css('display') != 'none') {
                $('#printMenu').hide('blind');
            }

    }

    function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                var data = form.serialize();
                save('0619E',data);
                
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
        saveAndExit('0619E',data);
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

        submitAndSave('0619E', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/0619E';
    }
</script>


@endsection